<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Laporan_keuangan_casemix_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->datetime = date('Y-m-d H:i:s');
    }

    public function getJenisLaporan()
    {
        return array(
            ''  => '-- Pilih Laporan Keuangan Casemix--',
            '1' => 'Laporan Rincian Tagihan',
        );
    }

    function getJaminan($q, $jenis_laporan, $start, $limit)
    {
        $where = '';
        // $jenis_laporan == 1 ? $where=' AND id in (11,17)' : $where='';
        $limit  = " limit " . $limit . " offset " . $start;
        $select = " SELECT id, nama  ";
        $count  = " SELECT count(id) as count ";
        $sql    = " FROM sm_penjamin WHERE is_active=1 AND nama ilike ('%$q%') $where ";
        $order  = " ORDER BY nama ASC ";
        $data['data'] = $this->db->query($select . $sql . $order . $limit)->result();
        $data['total'] = $this->db->query($count . $sql)->row()->count;
        return $data;
    }

    function getJenisPendaftaran($q, $start, $limit)
    {
        $limit  = " limit " . $limit . " offset " . $start;
        $select = " SELECT DISTINCT jenis_pendaftaran id, jenis_pendaftaran nama ";
        $count  = " SELECT count(DISTINCT jenis_pendaftaran) as count ";
        $sql    = " FROM sm_pendaftaran ";
        $order  = " ORDER BY jenis_pendaftaran ASC ";
        $data['data'] = $this->db->query($select . $sql . $order . $limit)->result();
        $data['total'] = $this->db->query($count . $sql)->row()->count;
        return $data;
    }

    function getListKunjungan($limit, $start, $search)
	{
        if ($search["jenis_tanggal"] == "keluar") {
			$tanggal = " pd.tanggal_keluar ";
        }else {            
			$tanggal = " pd.tanggal_daftar ";
        }

		$param = "";
		if ($search["periode_laporan"] === "Harian") {
			if ($search["tanggal_harian"] !== "") :
				$param .= " AND to_char( $tanggal, 'yyyy-mm-dd' ) = '" . date2mysql($search['tanggal_harian']) . "' ";
			endif;
		} elseif ($search["periode_laporan"] === "Bulanan" & $search["bulan"] !== "" & $search["tahun"] !== "") {
			$param .= " AND to_char( $tanggal, 'mm/yyyy' ) ilike '%" . $search["bulan"] . "/" . $search["tahun"] . "' ";
		} elseif ($search["periode_laporan"] === "Rentang Waktu" & $search["tanggal_awal"] !== "" & $search["tanggal_akhir"] !== "") {
			if ($search["tanggal_awal"] !== "" & $search["tanggal_akhir"] !== "") :
				$param .= " AND $tanggal BETWEEN '" . date2mysql($search['tanggal_awal']) . " 00:00:00' AND '" . date2mysql($search['tanggal_akhir']) . " 23:59:59'";
			endif;
		}

		if ($search["id_penjamin"] !== "") :
			$param .= " AND pd.id_penjamin = '" . $search["id_penjamin"] . "' ";
		endif;		

        if ($search["jenis_pendaftaran"] !== "") :
			$param .= " AND pd.jenis_pendaftaran = '" . $search["jenis_pendaftaran"] . "' ";
		endif;	

        if ($search["id_pasien"] !== "") :
			$param .= " AND pd.id_pasien = '" . $search["id_pasien"] . "' ";
		endif;	

        // $param = " AND pd.id_pasien='00354892'" ;
        // $param = " AND pd.id_pasien='00342918'" ;
        // $param = " AND pd.id_pasien='00352491'" ;
		$select = " SELECT pd.id, pd.no_register, pd.id_pasien, ps.nama nama_pasien, pd.tanggal_daftar, pd.tanggal_keluar, pd.jenis_pendaftaran, pd.jenis_rawat, pd.id_penjamin, pj.nama penjamin  ";
		$count  = " SELECT count(pd.id) as count ";
		$sql    = " FROM sm_pendaftaran pd
                    JOIN sm_pasien ps on pd.id_pasien=ps.id
                    LEFT JOIN sm_penjamin pj on pd.id_penjamin=pj.id
                    WHERE pd.id is not null $param ";
		$order  = " ORDER BY pd.id asc ";

		$limitation = "";
		if ($limit !== 0) :
			$limitation = " limit " . $limit . " offset " . $start;
		endif;

		$data["sql"]       = $select . $sql . $order . $limitation;
		$data["data"]      = $this->db->query($select . $sql . $order . $limitation)->result();
		$data["jml_data"]  = $this->db->query($count . $sql)->row()->count;
		$this->db->close();

		return $data;
	}

    function getListKunjunganDetail($id_pendaftaran)
	{
		$sql = " SELECT * FROM (
                    SELECT lp.id, lp.tanggal_layanan, 
                    case when lp.jenis_layanan = 'Poliklinik' then concat(lp.jenis_layanan,' ',sp.nama) 
                    when lp.jenis_layanan = 'Rawat Inap' then concat(lp.jenis_layanan,' ',bs.nama)  
                    else lp.jenis_layanan end ruang, lp.tindak_lanjut, '-' Ket
                    FROM sm_layanan_pendaftaran lp
                    LEFT JOIN sm_spesialisasi sp on lp.id_unit_layanan=sp.id
                    LEFT JOIN sm_rawat_inap ri on lp.id=ri.id_layanan_pendaftaran
                    LEFT JOIN sm_bangsal bs on ri.id_bangsal=bs.id
                    WHERE lp.id_pendaftaran='$id_pendaftaran'
                        UNION
                    SELECT olab.id, olab.waktu_order, concat('Lab ', olab.jenis) ruang, olab.status, (select jenis_layanan from sm_layanan_pendaftaran where id=lp.id ) Ket
                    FROM sm_order_laboratorium olab
                    JOIN sm_layanan_pendaftaran lp on olab.id_layanan_pendaftaran=lp.id
                    WHERE lp.id_pendaftaran='$id_pendaftaran'
                        UNION
                    SELECT orad.id, orad.waktu_order, 'Radiologi' ruang, orad.status, (select jenis_layanan from sm_layanan_pendaftaran where id=lp.id ) Ket
                    FROM sm_order_radiologi orad
                    JOIN sm_layanan_pendaftaran lp on orad.id_layanan_pendaftaran=lp.id
                    WHERE lp.id_pendaftaran='$id_pendaftaran'
                        UNION
                    SELECT jko.id, jko.waktu, jko.layanan ruangan, jko.status, (select jenis_layanan from sm_layanan_pendaftaran where id=lp.id ) Ket
                    FROM sm_jadwal_kamar_operasi jko
                    JOIN sm_layanan_pendaftaran lp on jko.id_layanan_pendaftaran=lp.id
                    WHERE lp.id_pendaftaran='$id_pendaftaran'
                        UNION
                    SELECT obd.id, obd.waktu, obd.layanan, obd.diperiksa, (select jenis_layanan from sm_layanan_pendaftaran where id=lp.id ) Ket
                    FROM sm_order_bank_darah obd
                    JOIN sm_layanan_pendaftaran lp on obd.id_layanan_pendaftaran=lp.id
                    WHERE lp.id_pendaftaran='$id_pendaftaran'
                ) z ORDER BY tanggal_layanan ASC ";
		return $this->db->query($sql)->result();
	}

    // 2
    public function getBarangObat($id_pendaftaran)
    {
        $data = []  ;
        $sql  ="SELECT pjd.id, lp.tanggal_layanan,  case when lp.jenis_layanan = 'Poliklinik' then concat(lp.jenis_layanan,' ',sp.nama) 
                when lp.jenis_layanan = 'Rawat Inap' then concat(lp.jenis_layanan,' ',bs.nama)  
                else lp.jenis_layanan end ruang, pjd.waktu tanggal, concat('[',pj.id_resep_tebus,'] ', b.nama_lengkap) nama,
                ROUND( CAST ( ( CEIL ( pjd.harga_jual ) * pjd.qty ) AS NUMERIC ), 2 ) AS total
                FROM sm_detail_penjualan AS pjd
                JOIN sm_penjualan pj ON pj.id = pjd.id_penjualan
                JOIN sm_layanan_pendaftaran lp ON pj.id_layanan_pendaftaran=lp.id
                JOIN sm_kemasan_barang AS kb ON kb.id = pjd.id_kemasan
                JOIN sm_barang AS b ON b.id = kb.id_barang
                LEFT JOIN sm_spesialisasi sp on lp.id_unit_layanan=sp.id
                LEFT JOIN sm_rawat_inap ri on lp.id=ri.id_layanan_pendaftaran
                LEFT JOIN sm_bangsal bs on ri.id_bangsal=bs.id
                WHERE pjd.qty >0 AND b.id_kategori=1 AND lp.id_pendaftaran = $id_pendaftaran
                ORDER BY lp.tanggal_layanan, pjd.waktu ";
        $detail   = $this->db->query($sql)->result();        
        $totalSum = 0;
        
        foreach ($detail as $item) {
            $totalSum += floatval($item->total);
        }
        $data['total']  = $totalSum;
        $data['detail'] = $detail;

        return $data;
    }

    public function getBarangObatRetur($id_pendaftaran)
    {
        $data = []  ;
        $sql  ="SELECT pj.id, concat ( '[', pj.id_resep_tebus, '] ', b.nama_lengkap ) nama, dp.qty, dp.harga_jual, (dp.qty * dp.harga_jual) total
                FROM sm_detail_penjualan AS pjd 
                JOIN sm_penjualan pj ON pj.id = pjd.id_penjualan 
                JOIN sm_retur_penjualan rpj ON rpj.id_penjualan = pj.id
                JOIN sm_detur_penjualan as dp ON dp.id_retur_penjualan = rpj.id
                JOIN sm_kemasan_barang as kb ON kb.id = dp.id_kemasan_barang
                JOIN sm_barang as b ON b.id = kb.id_barang
                JOIN sm_resep_tebus as rt ON rt.id = pj.id_resep_tebus
                JOIN sm_resep as r ON r.id = rt.id_resep
                JOIN sm_layanan_pendaftaran as lp ON lp.id = r.id_layanan_pendaftaran
                WHERE pjd.qty >0 AND b.id_kategori=1 AND lp.id_pendaftaran = $id_pendaftaran
                GROUP BY pj.id, rpj.id, dp.id, b.id ";
        $detail   = $this->db->query($sql)->result();        
        $totalSum = 0;
        
        foreach ($detail as $item) {
            $totalSum += floatval($item->total);
        }
        $data['total']  = $totalSum;
        $data['detail'] = $detail;

        return $data;
    }

    // 3
    public function getBarangAlkes($id_pendaftaran) 
    {
        $data = []  ;
        $sql  ="SELECT pjd.id, lp.tanggal_layanan,  case when lp.jenis_layanan = 'Poliklinik' then concat(lp.jenis_layanan,' ',sp.nama) 
                when lp.jenis_layanan = 'Rawat Inap' then concat(lp.jenis_layanan,' ',bs.nama)  
                else lp.jenis_layanan end ruang, pjd.waktu tanggal, concat('[',pj.id_resep_tebus,'] ', b.nama_lengkap) nama,
                ROUND( CAST ( ( CEIL ( pjd.harga_jual ) * pjd.qty ) AS NUMERIC ), 2 ) AS total
                FROM sm_detail_penjualan AS pjd
                JOIN sm_penjualan pj ON pj.id = pjd.id_penjualan
                JOIN sm_layanan_pendaftaran lp ON pj.id_layanan_pendaftaran=lp.id
                JOIN sm_kemasan_barang AS kb ON kb.id = pjd.id_kemasan
                JOIN sm_barang AS b ON b.id = kb.id_barang
                LEFT JOIN sm_spesialisasi sp on lp.id_unit_layanan=sp.id
                LEFT JOIN sm_rawat_inap ri on lp.id=ri.id_layanan_pendaftaran
                LEFT JOIN sm_bangsal bs on ri.id_bangsal=bs.id
                WHERE pjd.qty >0 AND b.id_kategori in (2,26) AND lp.id_pendaftaran = $id_pendaftaran
                ORDER BY lp.tanggal_layanan, pjd.waktu ";
        $detail   = $this->db->query($sql)->result();        
        $totalSum = 0;
        
        foreach ($detail as $item) {
            $totalSum += floatval($item->total);
        }
        $data['total']  = $totalSum;
        $data['detail'] = $detail;

        return $data;
    }

    public function getBarangAlkesRetur($id_pendaftaran)
    {
        $data = []  ;
        $sql  ="SELECT pj.id, concat ( '[', pj.id_resep_tebus, '] ', b.nama_lengkap ) nama, dp.qty, dp.harga_jual, (dp.qty * dp.harga_jual) total
                FROM sm_detail_penjualan AS pjd 
                JOIN sm_penjualan pj ON pj.id = pjd.id_penjualan 
                JOIN sm_retur_penjualan rpj ON rpj.id_penjualan = pj.id
                JOIN sm_detur_penjualan as dp ON dp.id_retur_penjualan = rpj.id
                JOIN sm_kemasan_barang as kb ON kb.id = dp.id_kemasan_barang
                JOIN sm_barang as b ON b.id = kb.id_barang
                JOIN sm_resep_tebus as rt ON rt.id = pj.id_resep_tebus
                JOIN sm_resep as r ON r.id = rt.id_resep
                JOIN sm_layanan_pendaftaran as lp ON lp.id = r.id_layanan_pendaftaran
                WHERE pjd.qty >0 AND b.id_kategori in (2,26) AND lp.id_pendaftaran = $id_pendaftaran
                GROUP BY pj.id, rpj.id, dp.id, b.id ";
        $detail   = $this->db->query($sql)->result();        
        $totalSum = 0;
        
        foreach ($detail as $item) {
            $totalSum += floatval($item->total);
        }
        $data['total']  = $totalSum;
        $data['detail'] = $detail;

        return $data;
    }

    // 4
    public function getTarifKamar($id_pendaftaran) 
    {
        $data = []  ;
        $sql  ="SELECT ri.id, lp.tanggal_layanan, bs.nama ruang, ri.waktu_masuk tanggal, ri.nominal,
                CASE WHEN ri.waktu_keluar IS NULL 
                    THEN CASE WHEN DATE_PART( 'day', MAX ( NOW( ) ) - MIN ( waktu_masuk ) ) = 0  THEN 1
                        ELSE DATE_PART( 'day', MAX ( NOW( ) ) - MIN ( waktu_masuk ) ) 
                        END ELSE total_hari 
                    END AS durasi,
                ( CASE WHEN ri.waktu_keluar IS NULL THEN
                    CASE WHEN DATE_PART( 'day', MAX ( NOW( ) ) - MIN ( waktu_masuk ) ) = 0 THEN 1
                        ELSE DATE_PART( 'day', MAX ( NOW( ) ) - MIN ( waktu_masuk ) ) 
                        END ELSE total_hari 
                    END * ri.nominal  ) AS total
                FROM sm_pendaftaran AS pd
                JOIN sm_layanan_pendaftaran AS lp ON ( lp.id_pendaftaran = pd.ID )
                JOIN sm_rawat_inap AS ri ON ( ri.id_layanan_pendaftaran = lp.ID )
                LEFT JOIN sm_bangsal bs on ri.id_bangsal=bs.id
                WHERE lp.status_terlayani != 'Batal' AND lp.jenis_layanan='Rawat Inap' AND lp.id_pendaftaran = $id_pendaftaran
                GROUP BY ri.id, lp.id, bs.id ";
        $detail   = $this->db->query($sql)->result();        
        $totalSum = 0;
        
        foreach ($detail as $item) {
            $totalSum += floatval($item->total);
        }
        $data['total']  = $totalSum;
        $data['detail'] = $detail;
        return $data;
    }

    //5
    public function getTarifKamarIcare($id_pendaftaran)
    {
        $data = []  ;
        $sql  ="SELECT ri.id, lp.tanggal_layanan, bs.nama ruang, ri.waktu_masuk tanggal, ri.nominal,
                CASE WHEN ri.waktu_keluar IS NULL 
                    THEN CASE WHEN DATE_PART( 'day', MAX ( NOW( ) ) - MIN ( waktu_masuk ) ) = 0  THEN 1
                        ELSE DATE_PART( 'day', MAX ( NOW( ) ) - MIN ( waktu_masuk ) ) 
                        END ELSE total_hari 
                    END AS durasi,
                ( CASE WHEN ri.waktu_keluar IS NULL THEN
                    CASE WHEN DATE_PART( 'day', MAX ( NOW( ) ) - MIN ( waktu_masuk ) ) = 0 THEN 1
                        ELSE DATE_PART( 'day', MAX ( NOW( ) ) - MIN ( waktu_masuk ) ) 
                        END ELSE total_hari 
                END * ri.nominal  ) AS total
                FROM sm_pendaftaran AS pd
                JOIN sm_layanan_pendaftaran AS lp ON ( lp.id_pendaftaran = pd.ID )
                JOIN sm_intensive_care AS ri ON ( ri.id_layanan_pendaftaran = lp.ID )
                LEFT JOIN sm_bangsal bs on ri.id_bangsal=bs.id
                WHERE lp.status_terlayani != 'Batal' AND lp.jenis_layanan='Intensive Care' AND lp.id_pendaftaran = $id_pendaftaran
                GROUP BY ri.id, lp.id, bs.id ";
        $detail   = $this->db->query($sql)->result();        
        $totalSum = 0;
        
        foreach ($detail as $item) {
            $totalSum += floatval($item->total);
        }
        $data['total']  = $totalSum;
        $data['detail'] = $detail;
        return $data;
    }
    
    // 6
    public function getTindakanIgd($id_pendaftaran)
    {
        $data = []  ;
        $sql  ="SELECT ttp.id,lp.tanggal_layanan,  case when lp.jenis_layanan = 'Poliklinik' then concat(lp.jenis_layanan,' ',sp.nama) 
                    when lp.jenis_layanan = 'Rawat Inap' then concat(lp.jenis_layanan,' ',bs.nama) else lp.jenis_layanan end ruang, ttp.tanggal, ly.nama, ttp.total
                FROM sm_tarif_tindakan_pasien ttp
                JOIN sm_tarif_pelayanan tp ON ttp.id_tarif_pelayanan=tp.id
                JOIN sm_layanan ly on tp.id_layanan=ly.id
                JOIN sm_layanan_pendaftaran lp ON ttp.id_layanan_pendaftaran=lp.id
                LEFT JOIN sm_spesialisasi sp on lp.id_unit_layanan=sp.id
                LEFT JOIN sm_rawat_inap ri on lp.id=ri.id_layanan_pendaftaran
                LEFT JOIN sm_bangsal bs on ri.id_bangsal=bs.id
                WHERE ly.id_jenis_pemeriksaan <> 16 AND ly.id not in (1734,4644,4732,4764,4765) AND lp.jenis_layanan='IGD' AND lp.id_pendaftaran= $id_pendaftaran 
                GROUP BY ttp.ID, lp.id, sp.id, bs.id, ly.id ORDER BY lp.tanggal_layanan, ttp.tanggal  ";
        $detail   = $this->db->query($sql)->result();        
        $totalSum = 0;
        
        foreach ($detail as $item) {
            $totalSum += floatval($item->total);
        }
        $data['total']  = $totalSum;
        $data['detail'] = $detail;  

        return $data;
    }

    // 7
    public function getKonsulDokter($id_pendaftaran)
    {
        $data = []  ;
        $sql  ="SELECT ttp.id,lp.tanggal_layanan,  case when lp.jenis_layanan = 'Poliklinik' then concat(lp.jenis_layanan,' ',sp.nama) 
                    when lp.jenis_layanan = 'Rawat Inap' then concat(lp.jenis_layanan,' ',bs.nama) else lp.jenis_layanan end ruang, ttp.tanggal, ly.nama, ttp.total
                FROM sm_tarif_tindakan_pasien ttp
                JOIN sm_tarif_pelayanan tp ON ttp.id_tarif_pelayanan=tp.id
                JOIN sm_layanan ly on tp.id_layanan=ly.id
                JOIN sm_layanan_pendaftaran lp ON ttp.id_layanan_pendaftaran=lp.id
                LEFT JOIN sm_spesialisasi sp on lp.id_unit_layanan=sp.id
                LEFT JOIN sm_rawat_inap ri on lp.id=ri.id_layanan_pendaftaran
                LEFT JOIN sm_bangsal bs on ri.id_bangsal=bs.id
                WHERE ly.id_jenis_pemeriksaan = 16 AND lp.id_pendaftaran= $id_pendaftaran 
                GROUP BY ttp.id, lp.id, sp.id, bs.id, ly.id ORDER BY lp.tanggal_layanan, ttp.tanggal  ";
        $detail   = $this->db->query($sql)->result();        
        $totalSum = 0;
        
        foreach ($detail as $item) {
            $totalSum += floatval($item->total);
        }
        $data['total']  = $totalSum;
        $data['detail'] = $detail;  

        return $data;
    }

    // 8
    public function getLaboratorium($id_pendaftaran)
    {
        $data = []  ;
        $sql  ="SELECT dlab.id,lp.tanggal_layanan, case when lp.jenis_layanan = 'Poliklinik' then concat(lp.jenis_layanan,' ',sp.nama) 
                    when lp.jenis_layanan = 'Rawat Inap' then concat(lp.jenis_layanan,' ',bs.nama) else lp.jenis_layanan end ruang, lab.waktu_konfirm tanggal, ly.nama, dlab.total
                FROM sm_order_laboratorium olab
                JOIN sm_layanan_pendaftaran lp ON olab.id_layanan_pendaftaran=lp.id
                JOIN sm_laboratorium lab on olab.id = lab.id_order_laboratorium
                JOIN sm_detail_laboratorium dlab ON lab.id = dlab.id_laboratorium
                LEFT JOIN sm_spesialisasi sp on lp.id_unit_layanan=sp.id
                LEFT JOIN sm_rawat_inap ri on lp.id=ri.id_layanan_pendaftaran
                LEFT JOIN sm_bangsal bs on ri.id_bangsal=bs.id
	            LEFT JOIN sm_tarif_pelayanan tp ON dlab.id_tarif=tp.id
                LEFT JOIN sm_layanan ly on tp.id_layanan=ly.id
                WHERE olab.status='konfirm' AND lp.id_pendaftaran= $id_pendaftaran
                GROUP BY dlab.id, lab.id, ly.id, lp.ID, sp.ID, bs.ID  ORDER BY lp.tanggal_layanan, lab.waktu_konfirm";
        $detail   = $this->db->query($sql)->result();        
        $totalSum = 0;
        
        foreach ($detail as $item) {
            $totalSum += floatval($item->total);
        }
        $data['total']  = $totalSum;
        $data['detail'] = $detail;  

        return $data;
    }

    // 9
    public function getRadiologi($id_pendaftaran)
    {
        $data = []  ;
        $sql  ="SELECT drad.id, lp.tanggal_layanan, case when lp.jenis_layanan = 'Poliklinik' then concat(lp.jenis_layanan,' ',sp.nama) 
                    when lp.jenis_layanan = 'Rawat Inap' then concat(lp.jenis_layanan,' ',bs.nama) else lp.jenis_layanan end ruang, rad.waktu_konfirm tanggal, ly.nama, drad.total
                FROM sm_order_radiologi orad
                JOIN sm_layanan_pendaftaran lp ON orad.id_layanan_pendaftaran=lp.id
                JOIN sm_radiologi rad on orad.id = rad.id_order_radiologi
                JOIN sm_detail_radiologi drad ON rad.id = drad.id_radiologi
                LEFT JOIN sm_spesialisasi sp on lp.id_unit_layanan=sp.id
                LEFT JOIN sm_rawat_inap ri on lp.id=ri.id_layanan_pendaftaran
                LEFT JOIN sm_bangsal bs on ri.id_bangsal=bs.id
	            LEFT JOIN sm_tarif_pelayanan tp ON drad.id_tarif=tp.id
                LEFT JOIN sm_layanan ly on tp.id_layanan=ly.id
                WHERE orad.status='konfirm' AND lp.id_pendaftaran = $id_pendaftaran
                GROUP BY drad.id, rad.id, ly.id, lp.ID, sp.ID, bs.ID  ORDER BY lp.tanggal_layanan, rad.waktu_konfirm ";
        $detail   = $this->db->query($sql)->result();        
        $totalSum = 0;
        
        foreach ($detail as $item) {
            $totalSum += floatval($item->total);
        }
        $data['total']  = $totalSum;
        $data['detail'] = $detail;  

        return $data;
    }   

    // 10
    public function getTindakanOperatif($id_pendaftaran)
    {
        $data = []  ;
        $sql  ="SELECT jko.id,lp.tanggal_layanan,  case when lp.jenis_layanan = 'Poliklinik' then concat(lp.jenis_layanan,' ',sp.nama) 
                when lp.jenis_layanan = 'Rawat Inap' then concat(lp.jenis_layanan,' ',bs.nama) else lp.jenis_layanan end ruang, top.waktu tanggal, ly.nama, tp.total 
                FROM sm_jadwal_kamar_operasi jko
                join sm_tarif_operasi top ON jko.id=top.id_operasi
                JOIN sm_tarif_pelayanan tp ON top.id_tarif=tp.id
                JOIN sm_layanan ly on tp.id_layanan=ly.id
                JOIN sm_layanan_pendaftaran lp ON jko.id_layanan_pendaftaran=lp.id
                LEFT JOIN sm_spesialisasi sp on lp.id_unit_layanan=sp.id
                LEFT JOIN sm_rawat_inap ri on lp.id=ri.id_layanan_pendaftaran
                LEFT JOIN sm_bangsal bs on ri.id_bangsal=bs.id
                WHERE top.is_operasi = 'Ya' AND lp.id_pendaftaran = $id_pendaftaran 
                ORDER BY lp.tanggal_layanan, top.waktu ";
        $detail   = $this->db->query($sql)->result();        
        $totalSum = 0;
        
        foreach ($detail as $item) {
            $totalSum += floatval($item->total);
        }
        $data['total']  = $totalSum;
        $data['detail'] = $detail;  

        return $data;
    }

    // 11
    public function getTindakanNonOperatif($id_pendaftaran)
    {
        $data = []  ;
        $sql  ="SELECT jko.id,lp.tanggal_layanan,  case when lp.jenis_layanan = 'Poliklinik' then concat(lp.jenis_layanan,' ',sp.nama) 
                when lp.jenis_layanan = 'Rawat Inap' then concat(lp.jenis_layanan,' ',bs.nama) else lp.jenis_layanan end ruang, top.waktu tanggal, ly.nama, tp.total 
                FROM sm_jadwal_kamar_operasi jko
                join sm_tarif_operasi top ON jko.id=top.id_operasi
                JOIN sm_tarif_pelayanan tp ON top.id_tarif=tp.id
                JOIN sm_layanan ly on tp.id_layanan=ly.id
                JOIN sm_layanan_pendaftaran lp ON jko.id_layanan_pendaftaran=lp.id
                LEFT JOIN sm_spesialisasi sp on lp.id_unit_layanan=sp.id
                LEFT JOIN sm_rawat_inap ri on lp.id=ri.id_layanan_pendaftaran
                LEFT JOIN sm_bangsal bs on ri.id_bangsal=bs.id
                WHERE top.is_operasi != 'Ya' AND lp.id_pendaftaran = $id_pendaftaran 
                ORDER BY lp.tanggal_layanan, top.waktu ";
        $detail   = $this->db->query($sql)->result();        
        $totalSum = 0;
        
        foreach ($detail as $item) {
            $totalSum += floatval($item->total);
        }
        $data['total']  = $totalSum;
        $data['detail'] = $detail;  

        return $data;
    }

    // 12
    public function getKeperawatan($id_pendaftaran)
    {
        $data  = []  ;
        $param = '';
        // Alat Bantu
        $param .= " AND ly.id not in (4862,4863,4864,4865,4866,4867,4868,4869,4870,4871,4872,4873,4874,4875,4876,4877,4878,4884)";
        // Ambulan
        $param .= " AND ly.id not in (1734,4644,4732,4764,4765)";
        // Konsul Dokter
        $param .= " AND ly.id_jenis_pemeriksaan <> 16";        
        // Administrasi Pasien Rawat Inap
        $param .= " AND ly.id <> 1673 ";     
        // Administrasi Pasien Intensive Care
        $param .= " AND ly.id <> 1968 ";

        $sql  ="SELECT ttp.ID,lp.tanggal_layanan,  case when lp.jenis_layanan = 'Poliklinik' then concat(lp.jenis_layanan,' ',sp.nama) 
                when lp.jenis_layanan = 'Rawat Inap' then concat(lp.jenis_layanan,' ',bs.nama)  
                else lp.jenis_layanan end ruang, ttp.tanggal, ly.nama, ttp.total
                FROM sm_tarif_tindakan_pasien ttp
                JOIN sm_tarif_pelayanan tp ON ttp.id_tarif_pelayanan=tp.id
                JOIN sm_layanan ly on tp.id_layanan=ly.id
                JOIN sm_layanan_pendaftaran lp ON ttp.id_layanan_pendaftaran=lp.id
                LEFT JOIN sm_spesialisasi sp on lp.id_unit_layanan=sp.id
                LEFT JOIN sm_rawat_inap ri on lp.id=ri.id_layanan_pendaftaran
                LEFT JOIN sm_bangsal bs on ri.id_bangsal=bs.id
                WHERE lp.jenis_layanan != 'IGD' AND lp.id_pendaftaran= $id_pendaftaran $param  GROUP BY ttp.id, ly.id, lp.id, sp.id, bs.id  ";
        $detail   = $this->db->query($sql)->result();        
        $totalSum = 0;
        
        foreach ($detail as $item) {
            $totalSum += floatval($item->total);
        }
        
        $data['total']  = $totalSum;
        $data['detail'] = $detail;  

        return $data;
    }

    //13
    public function getDarah($id_pendaftaran)
    {
        $data = []  ;
        $sql  ="SELECT obd.id,lp.tanggal_layanan,  case when lp.jenis_layanan = 'Poliklinik' then concat(lp.jenis_layanan,' ',sp.nama) 
                when lp.jenis_layanan = 'Rawat Inap' then concat(lp.jenis_layanan,' ',bs.nama) else lp.jenis_layanan end ruang, 
                tbd.waktu tanggal, l.nama, ((tbd.total) - (tbd.reimburse)) as total
                FROM sm_layanan_pendaftaran as lp 
                JOIN sm_order_bank_darah as obd ON obd.id_layanan_pendaftaran = lp.id
                JOIN sm_tarif_bank_darah as tbd ON tbd.id_order_bank_darah = obd.id
                JOIN sm_tarif_pelayanan as tp ON tp.id = tbd.id_tarif
                JOIN sm_layanan as l ON l.id = tp.id_layanan
                LEFT JOIN sm_spesialisasi sp on lp.id_unit_layanan=sp.id
                LEFT JOIN sm_rawat_inap ri on lp.id=ri.id_layanan_pendaftaran
                LEFT JOIN sm_bangsal bs on ri.id_bangsal=bs.id
                where obd.layanan='Bank Darah' AND lp.id_pendaftaran = $id_pendaftaran 
                ORDER BY lp.tanggal_layanan, tbd.waktu ";
        $detail   = $this->db->query($sql)->result();        
        $totalSum = 0;
        
        foreach ($detail as $item) {
            $totalSum += floatval($item->total);
        }
        $data['total']  = $totalSum;
        $data['detail'] = $detail;  

        return $data;
    }

    //14
    public function getAmbulan($id_pendaftaran)
    {
        $data = []  ;
        $sql  ="SELECT ttp.id,lp.tanggal_layanan,  case when lp.jenis_layanan = 'Poliklinik' then concat(lp.jenis_layanan,' ',sp.nama) 
                    when lp.jenis_layanan = 'Rawat Inap' then concat(lp.jenis_layanan,' ',bs.nama) else lp.jenis_layanan end ruang, ttp.tanggal, ly.nama, ttp.total
                FROM sm_tarif_tindakan_pasien ttp
                JOIN sm_tarif_pelayanan tp ON ttp.id_tarif_pelayanan=tp.id
                JOIN sm_layanan ly on tp.id_layanan=ly.id
                JOIN sm_layanan_pendaftaran lp ON ttp.id_layanan_pendaftaran=lp.id
                LEFT JOIN sm_spesialisasi sp on lp.id_unit_layanan=sp.id
                LEFT JOIN sm_rawat_inap ri on lp.id=ri.id_layanan_pendaftaran
                LEFT JOIN sm_bangsal bs on ri.id_bangsal=bs.id
                WHERE ly.id in (1734,4644,4732,4764,4765) AND lp.id_pendaftaran= $id_pendaftaran 
                GROUP BY ttp.id, lp.id, sp.id, bs.id, ly.id ORDER BY lp.tanggal_layanan, ttp.tanggal ";
        $detail   = $this->db->query($sql)->result();        
        $totalSum = 0;
        
        foreach ($detail as $item) {
            $totalSum += floatval($item->total);
        }
        $data['total']  = $totalSum;
        $data['detail'] = $detail;  

        return $data;
    }

    // 15
    public function getAlatBantu($id_pendaftaran)
    {
        $data  = []  ;
        $param = '';

        // Alat Bantu
        $param .= "AND ly.id in (4862,4863,4864,4865,4866,4867,4868,4869,4870,4871,4872,4873,4874,4875,4876,4877,4878,4884)";
        // Ambulan
        $param .= "AND ly.id not in (1734,4644,4732,4764,4765)";
        // Konsul Dokter
        $param .= "AND ly.id_jenis_pemeriksaan <> 16";

        $sql  ="SELECT ttp.id,lp.tanggal_layanan,  case when lp.jenis_layanan = 'Poliklinik' then concat(lp.jenis_layanan,' ',sp.nama) 
                    when lp.jenis_layanan = 'Rawat Inap' then concat(lp.jenis_layanan,' ',bs.nama) else lp.jenis_layanan end ruang, ttp.tanggal, ly.nama,  ttp.total
                FROM sm_tarif_tindakan_pasien ttp
                JOIN sm_tarif_pelayanan tp ON ttp.id_tarif_pelayanan=tp.id
                JOIN sm_layanan ly on tp.id_layanan=ly.id
                JOIN sm_layanan_pendaftaran lp ON ttp.id_layanan_pendaftaran=lp.id
                LEFT JOIN sm_spesialisasi sp on lp.id_unit_layanan=sp.id
                LEFT JOIN sm_rawat_inap ri on lp.id=ri.id_layanan_pendaftaran
                LEFT JOIN sm_bangsal bs on ri.id_bangsal=bs.id
                WHERE lp.jenis_layanan != 'IGD' AND lp.id_pendaftaran= $id_pendaftaran $param 
                GROUP BY ttp.id, lp.id, sp.id, bs.id, ly.id ORDER BY lp.tanggal_layanan, ttp.tanggal ";
        $detail   = $this->db->query($sql)->result();        
        $totalSum = 0;
        
        foreach ($detail as $item) {
            $totalSum += floatval($item->total);
        }
        $data['total']  = $totalSum;
        $data['detail'] = $detail;  

        return $data;
    }

    

}
