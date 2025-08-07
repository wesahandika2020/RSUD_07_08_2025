<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Laporan_perencanaan_model extends CI_Model
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
            ''  => '-- Pilih Laporan Perencanaan --',
            '1' => 'Laporan Resep Rawat Jalan Lebih dari Rp 50.000,-',
            '2' => 'Laporan Dokter Operasi',
            '3' => 'Laporan DPJP Rawat Inap',
            '4' => 'Laporan Catatan Perkembangan Pasien Terintegrasi (CPPT)',
            '5' => 'Laporan Laboratorium Rawat Jalan Lebih dari Rp 100.000,-',
            '6' => 'Laporan Rata-Rata Waktu Boocin (Booking Checkin) Rajal',
        );
    }

    public function getJaminan()
    {
        $sql = "select * from sm_penjamin where is_active=1 order by nama asc";
        $query = $this->db->query($sql)->result();
        $data =  array();
        $data[''] = '- Semua Penjamin -';
        foreach ($query as $key => $value) :
            $data[$value->id] = $value->nama;
        endforeach;

        return $data;
    }

    public function getPoliklinik()
    {
        $sql = "SELECT * FROM sm_spesialisasi WHERE is_klinik='1' AND id not in (58) ORDER BY nama ASC ";
        $query = $this->db->query($sql)->result();
        $data =  array();
        $data[''] = '- Semua Poliklinik -';
        foreach ($query as $key => $value) :
            $data[$value->id] = $value->nama;
        endforeach;

        return $data;
    }

    public function getBangsalRanap()
    {
        $sql = "SELECT * FROM sm_bangsal where is_active='Ya' and keterangan <> 'Intensive Care' ORDER BY nama ASC ";
        $query = $this->db->query($sql)->result();
        $data =  array();
        $data[''] = '- Semua Bangsal Rawat Inap -';
        foreach ($query as $key => $value) :
            $data[$value->id] = $value->nama;
        endforeach;

        return $data;
    }

    public function getBangsalICare()
    {
        $sql = "SELECT * FROM sm_bangsal where is_active='Ya' and keterangan = 'Intensive Care' ORDER BY nama ASC ";
        $query = $this->db->query($sql)->result();
        $data =  array();
        $data[''] = '- Semua Bangsal ICare -';
        foreach ($query as $key => $value) :
            $data[$value->id] = $value->nama;
        endforeach;

        return $data;
    }


    function getPeriode($search)
	{
        $periode = '';
        if($search["periode_laporan"] == 'Harian'){
            $periode = get_date_format(date2mysql($search['tanggal_harian']));
		} else if($search["periode_laporan"] == 'Bulanan'){
			if ($search["bulan"] == '01') {
                $periode = "Januari " . $search["tahun"];
            } elseif ($search["bulan"] == '02') {
                $periode = "Februari " . $search["tahun"];
            } elseif ($search["bulan"] == '03') {
                $periode = "Maret " . $search["tahun"];
            } elseif ($search["bulan"] == '04') {
                $periode = "April " . $search["tahun"];
            } elseif ($search["bulan"] == '05') {
                $periode = "Mei " . $search["tahun"];
            } elseif ($search["bulan"] == '06') {
                $periode = "Juni " . $search["tahun"];
            } elseif ($search["bulan"] == '07') {
                $periode = "Juli " . $search["tahun"];
            } elseif ($search["bulan"] == '08') {
                $periode = "Agustus " . $search["tahun"];
            } elseif ($search["bulan"] == '09') {
                $periode = "September " . $search["tahun"];
            } elseif ($search["bulan"] == '10') {
                $periode = "Oktober " . $search["tahun"];
            } elseif ($search["bulan"] == '11') {
                $periode = "November " . $search["tahun"];
            } elseif ($search["bulan"] == '12') {
                $periode = "Desember " . $search["tahun"];
            }
		} else if($search["periode_laporan"] == 'Rentang Waktu'){
			$periode = $search["tanggal_awal"].' sd '.$search["tanggal_akhir"];
		}
        return $periode;
    }

    function getListLaporanPrc01($limit, $start, $search)
	{
        $data =  $this->sqlListLaporanPrc01($limit, $start, $search)->result();
        $dataX['data'] = '';

		if (!empty($data)) {
			foreach ($data as $a => $b) {
				$data[$a]->detail =  $this->sqlListLaporanPrcDiag01($b->id_layanan_pendaftaran)->result();
			}   
			$dataX['data'] = $data;
		}
                
        $dataX["jml_data"]      = $this->sqlListLaporanPrc01(0,0, $search)->num_rows();
        $dataX["periode"]       = $this->getPeriode($search);
        $dataX["jenis_layanan"] = $search["jenis_layanan"];
        $dataX['poliklinik']    = $search["poliklinik"] <>'' ?    $this->db->select('nama')->from('sm_spesialisasi')->where('id', $search["poliklinik"])->get()->row()->nama : '';		
        $dataX['penjamin']      = $search["jenis_jaminan"] <>'' ? $this->db->select('nama')->from('sm_penjamin')->where('id', $search["jenis_jaminan"])->get()->row()->nama : '';	        
        $dataX['dokter']        = $search["id_dokter"] <> '' ? $this->db->select('sp.nama')->from('sm_pegawai sp')->join('sm_tenaga_medis stm', 'stm.id_pegawai = sp.id')->where('stm.id', $search["id_dokter"])->get()->row()->nama : '';	
        return $dataX;
    }

    function sqlListLaporanPrc01($limit, $start, $search)
	{
        $param_periode  = "";
        $param_penjamin = "";
        $param_layanan  = "";
        $param_poliklinik= "";
        $param_dokter        = "";

		if ($search["periode_laporan"] === "Harian") {
			if ($search["tanggal_harian"] !== "") :
				$param_periode .= " and to_char(lp.tanggal_layanan, 'yyyy-mm-dd' ) ilike '%" . date2mysql($search['tanggal_harian']) . "' ";
			endif;
		} elseif ($search["periode_laporan"] === "Bulanan" & $search["bulan"] !== "" & $search["tahun"] !== "") {
			$param_periode .= " and to_char(lp.tanggal_layanan, 'YYYY-MM'::text) = '" . $search["tahun"] . "-" . $search["bulan"] . "' ";
		} elseif ($search["periode_laporan"] === "Rentang Waktu" & $search["tanggal_awal"] !== "" & $search["tanggal_akhir"] !== "") {
			if ($search["tanggal_awal"] !== "" & $search["tanggal_akhir"] !== "") :
				$param_periode .= " and lp.tanggal_layanan BETWEEN '" . date2mysql($search['tanggal_awal']) . " 00:00:00' AND '" . date2mysql($search['tanggal_akhir']) . " 23:59:59'";
			endif;
		}

        if ($search["jenis_jaminan"] != "") {
            $param_penjamin .= " AND pj.id = '" . $search["jenis_jaminan"] . "' ";
        }

        if ($search["jenis_layanan"] != "") {
            $param_layanan .= " AND lp.jenis_layanan = '" . $search["jenis_layanan"] . "' ";
        } else {
            $param_layanan .= " AND (lp.jenis_layanan='IGD' OR lp.jenis_layanan='Poliklinik') ";
        }

        if ($search["poliklinik"] != "") {
            $param_poliklinik .= " AND lp.id_unit_layanan = '" . $search["poliklinik"] . "' ";
        }

        if ($search["id_dokter"] != "") {
            $param_dokter .= " AND lp.id_dokter= '" . $search["id_dokter"] . "' ";
        }

        $sql = " SELECT pd.id id_pendaftran,lp.id id_layanan_pendaftaran, pd.id_pasien,ps.nama nama_pasien, 
                pd.tanggal_daftar, lp.tanggal_layanan, lp.id_unit_layanan, lp.jenis_layanan,
                concat(lp.jenis_layanan, case when lp.id_unit_layanan is not null then concat(' ',sp.nama) else '' end) nama_layanan,
                pj.nama penjamin, lp.id_dokter, pg.nama dokter_dpjp, pjl.total,
                (case when d.id_pengkodean is not null then concat('[',gss2.kode_icdx_rinci,'] ', gss2.nama) else 
                 case when d.diagnosa_manual = '1' then d.golongan_sebab_sakit_lain else concat(gss.nama) end end) diagnosa ";

        $tabel = " FROM 
                    (select pjl.id_layanan_pendaftaran, pjl.jenis, FLOOR(sum(pjl.total)) total 
                        from sm_penjualan pjl 
                        JOIN sm_layanan_pendaftaran lp on pjl.id_layanan_pendaftaran=lp.id
                        WHERE jenis='Resep' $param_periode 
                        GROUP BY pjl.id_layanan_pendaftaran,pjl.jenis) pjl
                    JOIN sm_layanan_pendaftaran lp on pjl.id_layanan_pendaftaran=lp.id
                    JOIN sm_pendaftaran pd on lp.id_pendaftaran=pd.id
                    JOIN sm_pasien ps on pd.id_pasien=ps.id
                    LEFT JOIN sm_spesialisasi sp on lp.id_unit_layanan=sp.id
                    LEFT JOIN sm_tenaga_medis tm on lp.id_dokter=tm.id
                    LEFT JOIN sm_pegawai pg on tm.id_pegawai=pg.id
                    LEFT JOIN sm_penjamin AS pj ON pj.id = lp.id_penjamin 
                    LEFT JOIN sm_diagnosa d on lp.id=d.id_layanan_pendaftaran AND d.prioritas='Utama'
                    LEFT JOIN sm_golongan_sebab_sakit gss on d.id_golongan_sebab_sakit=gss.id
                    LEFT JOIN sm_golongan_sebab_sakit gss2 on d.id_pengkodean=gss2.id
                    WHERE pjl.total >= 50000 AND pd.jenis_rawat='Jalan' AND lp.status_terlayani<>'batal'  $param_periode $param_penjamin $param_layanan  $param_poliklinik  $param_dokter";

		$order     = " ORDER BY lp.id ASC ";

        $limitation ='';
        if ($limit !== 0) {
            $limitation = " LIMIT " . $limit . " OFFSET " . $start;
        }
        return  $this->db->query($sql.$tabel.$order.$limitation);
	}

    function sqlListLaporanPrcDiag01($id_layanan_pendaftaran)
    {
        $sql = "SELECT pjl.id, pjl.id_resep, pjl.id_resep_tebus, FLOOR(pjl.total) total, pjl.waktu waktu_penjualan, pg2.nama dokter_resep
                FROM sm_penjualan pjl
                LEFT JOIN sm_resep rs on pjl.id_resep=rs.id
                LEFT JOIN sm_tenaga_medis tm2 on rs.id_dokter=tm2.id
                LEFT JOIN sm_pegawai pg2 on tm2.id_pegawai=pg2.id
                WHERE pjl.id_layanan_pendaftaran=".$id_layanan_pendaftaran;
        return  $this->db->query($sql);
    }

    function getListLaporanPrc02($limit, $start, $search){
        $data =  $this->sqlListLaporanPrc02($limit, $start, $search)->result();
        $dataX['data'] = '';

		if (!empty($data)) {
			foreach ($data as $a => $b) {
				$data[$a]->detail =  $this->sqlListLaporanPrc02Dokter($b->id, $search["dokter_operasi"])->result();
			}   
			$dataX['data'] = $data;
		}

        $dataX["jml_data"]      = $this->sqlListLaporanPrc02(0,0, $search)->num_rows();
        $dataX['periode']       = $this->getPeriode($search);
        $dataX['jenis_layanan'] = $search["jenis_layanan"];
        $dataX['poliklinik']    = $search["poliklinik"] <>'' ?    $this->db->select('nama')->from('sm_spesialisasi')->where('id', $search["poliklinik"])->get()->row()->nama : '';		
        $dataX['penjamin']      = $search["jenis_jaminan"] <>'' ? $this->db->select('nama')->from('sm_penjamin')->where('id', $search["jenis_jaminan"])->get()->row()->nama : '';		
        $dataX['bangsal_ranap'] = $search["bangsal_ranap"] <>'' ? $this->db->select('nama')->from('sm_bangsal')->where('id', $search["bangsal_ranap"])->where('is_active', 'Ya')->where('keterangan<>', 'Intensive Care')->get()->row()->nama : '';		
        $dataX['bangsal_icare'] = $search["bangsal_icare"] <>'' ? $this->db->select('nama')->from('sm_bangsal')->where('id', $search["bangsal_icare"])->where('is_active', 'Ya')->where('keterangan', 'Intensive Care')->get()->row()->nama : '';	
        $dataX['operasi']       = $search["operasi"];
        $dataX['timing']        = $search["timing"];
        $dataX['status_operasi']= $search["status_operasi"];	        
        $dataX['dokter']        = $search["id_dokter"] <> '' ? $this->db->select('sp.nama')->from('sm_pegawai sp')->join('sm_tenaga_medis stm', 'stm.id_pegawai = sp.id')->where('stm.id', $search["id_dokter"])->get()->row()->nama : '';
        $dataX['dokter_operasi']= $search["dokter_operasi"] <> '' ? $this->db->select('sp.nama')->from('sm_pegawai sp')->join('sm_tenaga_medis stm', 'stm.id_pegawai = sp.id')->where('stm.id', $search["dokter_operasi"])->get()->row()->nama : '';
        return $dataX;
    }

    function sqlListLaporanPrc02($limit, $start, $search)
	{
        $param_periode       = "";
        $param_penjamin      = "";
        $param_layanan       = "";
        $param_poliklinik    = "";
        $param_bangsal_ranap = "";
        $param_bangsal_icare = "";
        $param_operasi       = "";
        $param_timing        = "";
        $param_status_operasi= "";
        $param_dokter        = "";
        $param_select_op     = "";
        $param_where_op      = "";
        
		if ($search["periode_laporan"] === "Harian") {
			if ($search["tanggal_harian"] !== "") :
				$param_periode .= " and to_char(jo.waktu, 'yyyy-mm-dd' ) ilike '%" . date2mysql($search['tanggal_harian']) . "' ";
			endif;
		} elseif ($search["periode_laporan"] === "Bulanan" & $search["bulan"] !== "" & $search["tahun"] !== "") {
			$param_periode .= " and to_char(jo.waktu, 'YYYY-MM'::text) = '" . $search["tahun"] . "-" . $search["bulan"] . "' ";
		} elseif ($search["periode_laporan"] === "Rentang Waktu" & $search["tanggal_awal"] !== "" & $search["tanggal_akhir"] !== "") {
			if ($search["tanggal_awal"] !== "" & $search["tanggal_akhir"] !== "") :
				$param_periode .= " and jo.waktu BETWEEN '" . date2mysql($search['tanggal_awal']) . " 00:00:00' AND '" . date2mysql($search['tanggal_akhir']) . " 23:59:59'";
			endif;
		}

        if ($search["jenis_jaminan"] != "") {
            $param_penjamin .= " AND pj.id = '" . $search["jenis_jaminan"] . "' ";
        }

        if ($search["jenis_layanan"] != "") {
            $param_layanan .= " AND lp.jenis_layanan = '" . $search["jenis_layanan"] . "' ";
        } else {
            $param_layanan .= " AND (lp.jenis_layanan='IGD' OR lp.jenis_layanan='Poliklinik' OR lp.jenis_layanan='Intensive Care' OR lp.jenis_layanan='Rawat Inap') ";
        }

        if ($search["poliklinik"] != "") {
            $param_poliklinik .= " AND lp.id_unit_layanan = '" . $search["poliklinik"] . "' ";
        }

        if ($search["bangsal_ranap"] != "") {
            $param_bangsal_ranap .= " AND bri.id= '" . $search["bangsal_ranap"] . "' ";
        }

        if ($search["bangsal_icare"] != "") {
            $param_bangsal_icare .= " AND bic.id= '" . $search["bangsal_icare"] . "' ";
        }

        if ($search["operasi"] != "") {
            $param_operasi .= " AND jo.layanan= '" . $search["operasi"] . "' ";
        }

        if ($search["timing"] != "") {
            $param_timing .= " AND jo.timing= '" . $search["timing"] . "' ";
        }

        if ($search["status_operasi"] != "") {
            $param_status_operasi .= " AND jo.status= '" . $search["status_operasi"] . "' ";
        }

        if ($search["id_dokter"] != "") {
            $param_dokter .= " AND lp.id_dokter= '" . $search["id_dokter"] . "' ";
        }

        if ($search["dokter_operasi"] != "") {
            $param_select_op .= " (SELECT count(tim.id) FROM sm_tim_operasi tim WHERE tim.id_jadwal_operasi=jo.id AND tim.id_nadis=".$search["dokter_operasi"].") ";
            $param_where_op  .= " AND (SELECT count(tim.id) FROM sm_tim_operasi tim WHERE tim.id_jadwal_operasi=jo.id AND tim.id_nadis=".$search["dokter_operasi"].") >=1";
        } else {
            $param_select_op .= 0;
        }
        
        $sql = " SELECT jo.id, jo.id_layanan_pendaftaran, jo.id_pasien, ps.nama nama_pasien, jo.status,jo.layanan, jo.timing, jo.waktu waktu_order, lp.jenis_layanan,                
                ri.id id_ranap, bri.id id_bangsal_ri, bri.nama bangsal_ri,ri.no_ruang no_ruang_ri, ri.no_bed no_bed_ri, 
                ic.id id_ranap, bic.id id_bangsal_ic, bic.nama bangsal_ic,ic.no_ruang no_ruang_ic, ic.no_bed no_bed_ic, sp.nama poliklinik,
                pj.nama penjamin, lp.id_dokter, pg.nama dokter,jo.mulai waktu_mulai, jo.id_tarif, ly.nama tindakan, tp.total,
                $param_select_op jml_tim_dokter ";

        $tabel = " FROM sm_jadwal_kamar_operasi jo
                    JOIN sm_pasien ps on jo.id_pasien = ps.id
                    LEFT JOIN sm_layanan_pendaftaran lp on jo.id_layanan_pendaftaran=lp.id
                    LEFT JOIN sm_penjamin pj on lp.id_penjamin=pj.id
                    LEFT JOIN sm_tenaga_medis tm on lp.id_dokter=tm.id
                    LEFT JOIN sm_pegawai pg on tm.id_pegawai=pg.id
                    LEFT JOIN sm_tarif_pelayanan tp on jo.id_tarif=tp.id
                    LEFT JOIN sm_layanan ly on tp.id_layanan=ly.id 
                    LEFT JOIN sm_rawat_inap ri on jo.id_layanan_pendaftaran=ri.id_layanan_pendaftaran
                    LEFT JOIN sm_bangsal bri on ri.id_bangsal=bri.id
                    LEFT JOIN sm_intensive_care ic on jo.id_layanan_pendaftaran=ic.id_layanan_pendaftaran
                    LEFT JOIN sm_bangsal bic on ic.id_bangsal=bic.id
                    LEFT JOIN sm_spesialisasi sp on lp.id_unit_layanan=sp.id
                    WHERE jo.id is NOT NULL 
                    $param_periode  $param_penjamin $param_layanan $param_poliklinik $param_bangsal_ranap $param_bangsal_icare 
                    $param_operasi $param_timing $param_status_operasi $param_dokter $param_where_op";

		$order     = " ORDER BY jo.waktu DESC ";

        $limitation ='';
        if ($limit !== 0) {
            $limitation = " LIMIT " . $limit . " OFFSET " . $start;
        }
        
        return  $this->db->query($sql.$tabel.$order.$limitation);
    }

    function sqlListLaporanPrc02Dokter($id, $dokter_operasi)
    {
        $param ='';
        if ($dokter_operasi != "") {
            $param = " AND tim.id_nadis=".$dokter_operasi;
        }
        $sql = "SELECT tim.id, tim.id_nadis, pg.nama dokter, 
                case when tim.status = 'Dokter Pendamping' then 'Pendamping Dokter' else tim.status end status,
                tim.jasa, tim.jasa_netto, tim.id_users, pg2.nama petugas
                FROM sm_tim_operasi tim
                LEFT JOIN sm_tenaga_medis tm on tim.id_nadis = tm.id
                LEFT JOIN sm_pegawai pg on tm.id_pegawai = pg.id
                LEFT JOIN sm_pegawai pg2 on tim.id_users = pg2.id
                WHERE tim.id_jadwal_operasi=".$id." $param ORDER BY tim.status ASC";
        return  $this->db->query($sql);
    }

    function getListLaporanPrc03($limit, $start, $search)
	{
        $param_periode       = "";
        $param_penjamin      = "";
        $param_bangsal_ranap = "";
        $param_dokter        = "";

		if ($search["periode_laporan"] === "Harian") {
			if ($search["tanggal_harian"] !== "") :
				$param_periode .= " and to_char(ri.waktu_masuk, 'yyyy-mm-dd' ) ilike '%" . date2mysql($search['tanggal_harian']) . "' ";
			endif;
		} elseif ($search["periode_laporan"] === "Bulanan" & $search["bulan"] !== "" & $search["tahun"] !== "") {
			$param_periode .= " and to_char(ri.waktu_masuk, 'YYYY-MM'::text) = '" . $search["tahun"] . "-" . $search["bulan"] . "' ";
		} elseif ($search["periode_laporan"] === "Rentang Waktu" & $search["tanggal_awal"] !== "" & $search["tanggal_akhir"] !== "") {
			if ($search["tanggal_awal"] !== "" & $search["tanggal_akhir"] !== "") :
				$param_periode .= " and ri.waktu_masuk BETWEEN '" . date2mysql($search['tanggal_awal']) . " 00:00:00' AND '" . date2mysql($search['tanggal_akhir']) . " 23:59:59'";
			endif;
		}

        if ($search["jenis_jaminan"] != "") {
            $param_penjamin .= " AND pj.id = '" . $search["jenis_jaminan"] . "' ";
        }

        if ($search["bangsal_ranap"] != "") {
            $param_bangsal_ranap .= " AND ri.id_bangsal= '" . $search["bangsal_ranap"] . "' ";
        }

        if ($search["id_dokter"] != "") {
            $param_dokter .= " AND lp.id_dokter= '" . $search["id_dokter"] . "' ";
        }
        
        $sql = " SELECT ri.id, pd.id_pasien, ps.nama nama_pasien, ri.waktu_masuk waktu_masuk_ranap, 
                lp.status_terlayani, lp.id_dokter, pg.nama dokter, lp.id_penjamin, pj.nama penjamin,
                ri.id_bangsal, b.nama bangsal,ri.no_ruang, ri.no_bed, pd.tanggal_keluar,lp.tindak_lanjut";

        $tabel = " FROM sm_rawat_inap ri
                    JOIN sm_layanan_pendaftaran lp on ri.id_layanan_pendaftaran=lp.id
                    JOIN sm_pendaftaran pd on lp.id_pendaftaran=pd.id
                    JOIN sm_pasien ps on pd.id_pasien=ps.id
                    JOIN sm_order_rawat_inap ori on ri.id=ori.id_rawat_inap
                    LEFT JOIN sm_tenaga_medis tm ON lp.id_dokter=tm.id
                    LEFT JOIN sm_pegawai pg on tm.id_pegawai=pg.id
                    LEFT JOIN sm_penjamin pj on lp.id_penjamin=pj.id
                    LEFT JOIN sm_bangsal b on ri.id_bangsal=b.id
                    WHERE ori.status='dirawat' $param_periode $param_penjamin $param_bangsal_ranap $param_dokter";

		$order     = " ORDER BY ri.waktu_masuk DESC ";

        $limitation ='';
        if ($limit !== 0) {
            $limitation = " LIMIT " . $limit . " OFFSET " . $start;
        }

        $dataX['data']          =  $this->db->query($sql.$tabel.$order.$limitation)->result(); 
        $dataX['jml_data']      =  $this->db->query($sql.$tabel.$order)->num_rows();
        $dataX['periode']       = $this->getPeriode($search);
        $dataX['penjamin']      = $search["jenis_jaminan"] <>'' ? $this->db->select('nama')->from('sm_penjamin')->where('id', $search["jenis_jaminan"])->get()->row()->nama : '';		
        $dataX['bangsal_ranap'] = $search["bangsal_ranap"] <>'' ? $this->db->select('nama')->from('sm_bangsal')->where('id', $search["bangsal_ranap"])->where('is_active', 'Ya')->where('keterangan<>', 'Intensive Care')->get()->row()->nama : '';		
        $dataX['dokter']        = $search["id_dokter"] <> '' ? $this->db->select('sp.nama')->from('sm_pegawai sp')->join('sm_tenaga_medis stm', 'stm.id_pegawai = sp.id')->where('stm.id', $search["id_dokter"])->get()->row()->nama : '';
        return $dataX;
    }

    function getListLaporanPrc04($limit, $start, $search)
	{
        $param_periode  = "";
        $param_penjamin = "";
        $param_bangsal  = "";

		if ($search["periode_laporan"] === "Harian") {
			if ($search["tanggal_harian"] !== "") :
				$param_periode .= " and to_char(lp.tanggal_layanan, 'yyyy-mm-dd' ) ilike '%" . date2mysql($search['tanggal_harian']) . "' ";
			endif;
		} elseif ($search["periode_laporan"] === "Bulanan" & $search["bulan"] !== "" & $search["tahun"] !== "") {
			$param_periode .= " and to_char(lp.tanggal_layanan, 'YYYY-MM'::text) = '" . $search["tahun"] . "-" . $search["bulan"] . "' ";
		} elseif ($search["periode_laporan"] === "Rentang Waktu" & $search["tanggal_awal"] !== "" & $search["tanggal_akhir"] !== "") {
			if ($search["tanggal_awal"] !== "" & $search["tanggal_akhir"] !== "") :
				$param_periode .= " and lp.tanggal_layanan BETWEEN '" . date2mysql($search['tanggal_awal']) . " 00:00:00' AND '" . date2mysql($search['tanggal_akhir']) . " 23:59:59'";
			endif;
		}

        if ($search["jenis_jaminan"] != "") {
            $param_penjamin .= " AND pd.id_penjamin = '" . $search["jenis_jaminan"] . "' ";
        }

        if ($search["jenis_layanan"] == "IGD") {
            if ($search["jenis_layanan"] != "") {
                $param_bangsal .= " AND lp.jenis_layanan = 'IGD' ";
            }
        } elseif ($search["jenis_layanan"] == "Poliklinik") {
            $param_bangsal .= " AND lp.jenis_layanan = 'Poliklinik' ";
            if ($search["poliklinik"] != "") {
                $param_bangsal .= " AND lp.id_unit_layanan = '" . $search["poliklinik"] . "' ";
            }
        } elseif ($search["jenis_layanan"] == "Rawat Inap") {
            $param_bangsal .= " AND lp.jenis_layanan = 'Rawat Inap' ";
            if ($search["bangsal_ranap"] != "") {
                $param_bangsal .= " AND ri.id_bangsal = '" . $search["bangsal_ranap"] . "' ";
            }
        } elseif ($search["jenis_layanan"] == "Intensive Care") {
            $param_bangsal .= " AND lp.jenis_layanan = 'Intensive Care' ";
            if ($search["bangsal_icare"] != "") {
                $param_bangsal .= " AND ic.id_bangsal = '" . $search["bangsal_icare"] . "' ";
            }
        }      
        
        $param_dokter = "";
        if ($search["id_dokter"] != "") {
            if ($search["kategori_dokter"] == "dpjp") {                
                $param_dokter .= " AND lp.id_dokter= '" . $search["id_dokter"] . "' ";
            } else if ($search["kategori_dokter"] == "verifdpjp") {                
                $param_dokter .= " AND cp.id_dokter_dpjp = '" . $search["id_dokter"] . "' ";
            } else if ($search["kategori_dokter"] == "veriftbak") {                
                $param_dokter .= " AND cp.id_dokter_dpjp_tbak = '" . $search["id_dokter"] . "' ";
            } else if ($search["kategori_dokter"] == "verifraber") {        
                $param_dokter .= " AND cp.waktu_verif_raber IS NOT NULL AND lp.id_dokter = '" . $search["id_dokter"] . "' ";
            }
        }
            
        $sql = " SELECT DISTINCT lp.id_pendaftaran, cp.id_layanan_pendaftaran, lp.tanggal_layanan,
                    pd.id_pasien, ps.nama nama_pasien, 
                    lp.jenis_layanan,
                    ri.id_bangsal id_bangsal_ranap, ic.id_bangsal id_bangsal_icare, lp.id_unit_layanan,
                    CASE WHEN lp.jenis_layanan = 'Rawat Inap' THEN
                            concat('Rawat Inap ' ,(SELECT(SELECT nama FROM sm_bangsal WHERE ID = ri.id_bangsal) FROM sm_rawat_inap ri WHERE ri.id_layanan_pendaftaran = lp.ID ))
                    WHEN lp.jenis_layanan = 'IGD' THEN case when pd.jenis_igd='IGD' THEN pd.jenis_igd ELSE CONCAT(pd.jenis_igd,' ',lp.jenis_layanan) end
                    ELSE lp.jenis_layanan END ruangan, pd.id_penjamin, (SELECT nama FROM sm_penjamin WHERE id=pd.id_penjamin) penjamin,
                    lp.id_dokter id_dokter_dpjp, pg.nama dokter_dpjp ";

        $tabel = " FROM sm_cppt cp
                    JOIN sm_layanan_pendaftaran lp ON cp.id_layanan_pendaftaran=lp.id
                    JOIN sm_pendaftaran pd ON lp.id_pendaftaran=pd.id
                    JOIN sm_pasien ps on pd.id_pasien=ps.id
                    LEFT JOIN sm_tenaga_medis tm ON lp.id_dokter=tm.id
                    LEFT JOIN sm_pegawai pg ON tm.id_pegawai=pg.id
                    LEFT JOIN sm_rawat_inap ri ON ri.id_layanan_pendaftaran = lp.id
                    LEFT JOIN sm_intensive_care ic ON ic.id_layanan_pendaftaran = lp.id
                    WHERE cp.id IS NOT NULL $param_periode $param_penjamin $param_bangsal $param_dokter";

		$order     = " ORDER BY lp.tanggal_layanan DESC, lp.id_pendaftaran, cp.id_layanan_pendaftaran ASC ";

        $limitation ='';
        if ($limit !== 0) {
            $limitation = " LIMIT " . $limit . " OFFSET " . $start;
        }

        $resultData =  $this->db->query($sql.$tabel.$order.$limitation)->result(); 
        foreach ($resultData as $value) {
			$value->cppt = $this->getListLaporanPrc04DetailCppt($value->id_layanan_pendaftaran, $search);
		}

        $kategori_dokter_map     = [ 'dpjp' => 'DPJP', 'verifdpjp' => 'Verifikasi DPJP', 'veriftbak' => 'Verifikasi TBAK', 'verifraber' => 'Verifikasi RABER' ];

		$dataX['data']           = $resultData;
		$dataX['zzzz']           = $param_dokter;
        $dataX['jml_data']       = $this->db->query($sql.$tabel.$order)->num_rows();
        $dataX['periode']        = $this->getPeriode($search);
        $dataX['penjamin']       = $search["jenis_jaminan"] <>'' ? $this->db->select('nama')->from('sm_penjamin')->where('id', $search["jenis_jaminan"])->get()->row()->nama : '';		
        $dataX['bangsal_ranap']  = $search["bangsal_ranap"] <>'' ? $this->db->select('nama')->from('sm_bangsal')->where('id', $search["bangsal_ranap"])->where('is_active', 'Ya')->where('keterangan<>', 'Intensive Care')->get()->row()->nama : '';		 
		$dataX['kategori_dokter']= $kategori_dokter_map[$search["kategori_dokter"]] ?? '';
        $dataX['dokter']         = $search["id_dokter"] <> '' ? $this->db->select('sp.nama')->from('sm_pegawai sp')->join('sm_tenaga_medis stm', 'stm.id_pegawai = sp.id')->where('stm.id', $search["id_dokter"])->get()->row()->nama : '';
        return $dataX;
    }

    function getListLaporanPrc04DetailCppt($id_layanan_pendaftaran, $search)
	{
        $param_dokter = "";
        if ($search["id_dokter"] != "") {
            if ($search["kategori_dokter"] == "verifdpjp") {                
                $param_dokter .= " AND cp.id_dokter_dpjp = '" . $search["id_dokter"] . "' ";
            } else if ($search["kategori_dokter"] == "veriftbak") {                
                $param_dokter .= " AND cp.id_dokter_dpjp_tbak = '" . $search["id_dokter"] . "' ";
            } else if ($search["kategori_dokter"] == "verifraber") {                
                $param_dokter .= " AND cp.waktu_verif_raber IS NOT NULL AND lp.id_dokter = '" . $search["id_dokter"] . "' ";
            }
        }

		$sql = "SELECT cp.id_nadis id_petugas, pg_petugas.nama petugas, cp.id_profesi, pn.nama profesi, cp.waktu_verif_raber,
                    cp.id_dokter_dpjp id_dokter_verifikasi_dpjp, pg_vd.nama dokter_verifikasi_dpjp,
                    cp.id_dokter_dpjp_tbak id_dokter_verifikasi_tbak, pg_vdt.nama dokter_verifikasi_tbak, 
                    cp.waktu_verif_dpjp, cp.waktu_penerima_tbak, cp.waktu
                FROM sm_cppt cp
                JOIN sm_layanan_pendaftaran lp ON cp.id_layanan_pendaftaran = lp.ID
                LEFT JOIN sm_pegawai pg_petugas ON pg_petugas.ID = cp.id_nadis
                LEFT JOIN sm_profesi_nadis pn ON pn.ID = cp.id_profesi
                LEFT JOIN sm_tenaga_medis tm_vd ON tm_vd.ID = cp.id_dokter_dpjp
                LEFT JOIN sm_pegawai pg_vd ON pg_vd.ID = tm_vd.id_pegawai
                LEFT JOIN sm_tenaga_medis tm_vdt ON tm_vdt.ID = cp.id_dokter_dpjp_tbak
                LEFT JOIN sm_pegawai pg_vdt ON pg_vdt.ID = tm_vdt.id_pegawai
                WHERE cp.id IS NOT NULL AND lp.id=$id_layanan_pendaftaran $param_dokter
                ORDER BY cp.id_layanan_pendaftaran, cp.ID ASC  ";
		return $this->db->query($sql)->result();
	}
    

    function getListLaporanPrc05($limit, $start, $search)
	{   
        $data =  $this->sqlListLaporanPrc05($limit, $start, $search)->result();
        $dataX['data'] = '';

        if (!empty($data)) {
			foreach ($data as $i => $v) {
                $tempat_layanan =  $this->sqlListLaporanPrc05TempatLayanan($v->id_layanan_pendaftaran)->result(); 
                $data[$i]->tempat_layanan =  $tempat_layanan; 

                foreach ($tempat_layanan as $i2 => $v2) {
                    $tindakan =  $this->sqlListLaporanPrc05Tindakan($v2->id_layanan_pendaftaran)->result(); 
                    if (!empty($tindakan)) {
                        $tempat_layanan[$i2]->tindakan = $tindakan;
                    }
                }
			}   
			$dataX['data'] = $data;
		}
                
        $dataX["jml_data"]      = $this->sqlListLaporanPrc05(0,0, $search)->num_rows();
        $dataX["periode"]       = $this->getPeriode($search);
        $dataX["jenis_layanan"] = $search["jenis_layanan"];
        $dataX['poliklinik']    = $search["poliklinik"] <>'' ?    $this->db->select('nama')->from('sm_spesialisasi')->where('id', $search["poliklinik"])->get()->row()->nama : '';		
        $dataX['penjamin']      = $search["jenis_jaminan"] <>'' ? $this->db->select('nama')->from('sm_penjamin')->where('id', $search["jenis_jaminan"])->get()->row()->nama : '';	        
        $dataX['dokter']        = $search["id_dokter"] <> '' ? $this->db->select('sp.nama')->from('sm_pegawai sp')->join('sm_tenaga_medis stm', 'stm.id_pegawai = sp.id')->where('stm.id', $search["id_dokter"])->get()->row()->nama : '';	
        return $dataX;
    }

    function sqlListLaporanPrc05($limit, $start, $search)
	{
        $param_periode  = "";

		if ($search["periode_laporan"] === "Harian") {
			if ($search["tanggal_harian"] !== "") :
				$param_periode .= " and to_char(pd.tanggal_daftar, 'yyyy-mm-dd' ) = '" . date2mysql($search['tanggal_harian']) . "' ";
			endif;
		} elseif ($search["periode_laporan"] === "Bulanan" & $search["bulan"] !== "" & $search["tahun"] !== "") {
			$param_periode .= " and to_char(pd.tanggal_daftar, 'YYYY-MM'::text) = '" . $search["tahun"] . "-" . $search["bulan"] . "' ";
		} elseif ($search["periode_laporan"] === "Rentang Waktu" & $search["tanggal_awal"] !== "" & $search["tanggal_akhir"] !== "") {
			if ($search["tanggal_awal"] !== "" & $search["tanggal_akhir"] !== "") :
				$param_periode .= " and pd.tanggal_daftar BETWEEN '" . date2mysql($search['tanggal_awal']) . " 00:00:00' AND '" . date2mysql($search['tanggal_akhir']) . " 23:59:59'";
			endif;
		}

        $param_penjamin = '';
        if ($search["jenis_jaminan"] != "") {
            $param_penjamin .= " AND pd.id_penjamin = '" . $search["jenis_jaminan"] . "' ";
        }

        $param_jenis_layanan = " AND lp.jenis_layanan in ('Poliklinik','IGD','Medical Check Up','Laboratorium')";
        if ($search["jenis_layanan"] != "") {
            $param_jenis_layanan .= " AND lp.jenis_layanan = '" . $search["jenis_layanan"] . "' ";
        }

        $param_poliklinik = "";
        if ($search["jenis_layanan"] == "Poliklinik") {
            if ($search["poliklinik"] != "") {
                $param_poliklinik .= " AND lp.id_unit_layanan = '" . $search["poliklinik"] . "' ";
            }
        }

        $sql   = "  SELECT pd.id, STRING_AGG(lp.id::TEXT, ', ') AS id_layanan_pendaftaran,
                    pd.no_register, pd.id_pasien, ps.nama nama_pasien, pd.tanggal_daftar, pd.tanggal_keluar, vmlab.total
                    FROM vm_lab_lebih_dari_seratus_ribu vmlab
                    JOIN sm_pendaftaran pd on vmlab.id_pendaftaran=pd.id
                    JOIN sm_layanan_pendaftaran lp on pd.id=lp.id_pendaftaran
                    JOIN sm_pasien ps on pd.id_pasien=ps.id
                    JOIN sm_order_laboratorium olab on olab.id_layanan_pendaftaran=lp.id AND olab.status='konfirm'
                    WHERE pd.id IS NOT NULL $param_periode $param_penjamin $param_jenis_layanan $param_poliklinik
                    GROUP BY pd.id , ps.nama, vmlab.total
                    ORDER BY pd.id ";
        return  $this->db->query($sql);
    }

    function sqlListLaporanPrc05TempatLayanan($id_layanan_pendaftaran)
    {
        $sql = "SELECT lp.id id_layanan_pendaftaran, pd.id_penjamin, pj.nama penjamin, lp.jenis_layanan, lp.id_unit_layanan, sp.nama poli	,
                CASE WHEN lp.jenis_layanan = 'Poliklinik' THEN concat(lp.jenis_layanan, ' ', sp.nama) ELSE lp.jenis_layanan END tempat_layanan,
                lp.id_dokter, pg.nama dokter_dpjp 
                FROM sm_pendaftaran pd 
                JOIN sm_layanan_pendaftaran lp on pd.id=lp.id_pendaftaran
                JOIN sm_pasien ps on pd.id_pasien=ps.id
                JOIN sm_order_laboratorium olab on olab.id_layanan_pendaftaran=lp.id AND olab.status='konfirm'
                LEFT JOIN sm_penjamin pj on pd.id_penjamin=pj.id
                LEFT JOIN sm_spesialisasi sp on lp.id_unit_layanan = sp.id
                LEFT JOIN sm_tenaga_medis tm on lp.id_dokter=tm.id
                LEFT JOIN sm_pegawai pg on tm.id_pegawai=pg.id
                WHERE lp.id IS NOT NULL  AND lp.id in  ( $id_layanan_pendaftaran )
                GROUP BY lp.id, pd.id_penjamin, ps.nama , pj.nama, lp.jenis_layanan, lp.id_unit_layanan, sp.nama, lp.id_dokter, pg.nama
                ORDER BY lp.id ASC ";
        return  $this->db->query($sql);
    }

    function sqlListLaporanPrc05Tindakan($id_layanan_pendaftaran)
    {
        $sql = "SELECT lab.kode no_lab, lab.id_dokter, pg.nama dokter, lab.id_dokter_pjwb, pg2.nama dokter_pjwb, dlab.id_tarif, lay.nama tindakan, dlab.total
                FROM sm_order_laboratorium olab 
                JOIN sm_laboratorium lab ON olab.id = lab.id_order_laboratorium
                JOIN sm_detail_laboratorium dlab ON lab.id=dlab.id_laboratorium
                LEFT JOIN sm_tenaga_medis tm on lab.id_dokter = tm.id
                LEFT JOIN sm_pegawai pg ON tm.id_pegawai = pg.id
                LEFT JOIN sm_tenaga_medis tm2 on lab.id_dokter_pjwb = tm2.id
                LEFT JOIN sm_pegawai pg2 ON tm2.id_pegawai = pg2.id
                LEFT JOIN sm_tarif_pelayanan tp on dlab.id_tarif=tp.id
                LEFT JOIN sm_layanan lay on tp.id_layanan=lay.id                    
                WHERE olab.status = 'konfirm'
                AND olab.id_layanan_pendaftaran in ( $id_layanan_pendaftaran )  ";
        return  $this->db->query($sql);
    }

    function getListLaporanPrc06($limit, $start, $search)
	{
        $param_periode = "";
        $param         = "";
		if ($search["periode_laporan"] === "Harian") {
			if ($search["tanggal_harian"] !== "") :
				$param_periode .= " and to_char(ab.tanggal_kunjungan, 'yyyy-mm-dd' ) = '" . date2mysql($search['tanggal_harian']) . "' ";
			endif;
		} elseif ($search["periode_laporan"] === "Bulanan" & $search["bulan"] !== "" & $search["tahun"] !== "") {
			$param_periode .= " and to_char(ab.tanggal_kunjungan, 'YYYY-MM'::text) = '" . $search["tahun"] . "-" . $search["bulan"] . "' ";
		} elseif ($search["periode_laporan"] === "Rentang Waktu" & $search["tanggal_awal"] !== "" & $search["tanggal_akhir"] !== "") {
			if ($search["tanggal_awal"] !== "" & $search["tanggal_akhir"] !== "") :
				$param_periode .= " and ab.tanggal_kunjungan BETWEEN '" . date2mysql($search['tanggal_awal']) . " 00:00:00' AND '" . date2mysql($search['tanggal_akhir']) . " 23:59:59'";
			endif;
		}

        if ($search["jenis_jaminan"] != "") {
            $param .= " AND p.id_penjamin = '" . $search["jenis_jaminan"] . "' ";
        }

        if ($search["poliklinik"] != "") {
            $param .= " AND ab.nama_poli = '" . $search["poliklinik"] . "' ";
        }

        if ($search["boocin"] != "") {
            $param .= " AND ab.lokasi_data = '" . $search["boocin"] . "' ";
        }
        
        $sql = " SELECT ab.kode_booking, ab.tanggal_kunjungan, ps.id, ps.nama AS nama_pasien, pj.nama penjamin, sp.nama AS poliklinik, ab.lokasi_data, ab.waktu_hadir, 
                to_char(ab.task_satu, 'HH:MI:ss') AS task_satu, to_char(ab.task_dua, 'HH:MI:ss') AS task_dua, to_char(ab.task_tiga, 'HH:MI:ss') AS task_tiga,
                to_char((ab.task_dua - ab.task_satu)+( ab.task_tiga - ab.task_dua), 'HH24:MI:SS') AS selisih_waktu,
                EXTRACT(EPOCH FROM ((ab.task_dua - ab.task_satu) + (ab.task_tiga - ab.task_dua))) AS selisih_waktu_detik,
                TO_CHAR(((ab.task_dua - ab.task_satu) + (ab.task_tiga - ab.task_dua)) / 2, 'HH24:MI:SS') AS rata_selisih_waktu ";

        $tabel = " FROM sm_antrian_bpjs ab
                    LEFT JOIN sm_pasien ps ON ab.no_rm = ps.id
                    LEFT JOIN sm_pendaftaran p ON ab.id_pendaftaran = p.id
                    LEFT JOIN sm_spesialisasi sp ON ab.nama_poli = sp.id
                    LEFT JOIN sm_penjamin pj ON p.id_penjamin = pj.id
                    WHERE ab.id IS NOT NULL
                    AND ab.status = 'Check In' $param_periode $param ";

		$order     = " ORDER BY ab.kode_booking ASC ";

        $limitation ='';
        if ($limit !== 0) {
            $limitation = " LIMIT " . $limit . " OFFSET " . $start;
        }
        
        $jumlah_data = $this->db->query($sql.$tabel.$order)->num_rows();
        $rata_rata   = "SELECT TO_CHAR(INTERVAL '1 second' * (SUM(selisih_waktu_detik) / ".$jumlah_data."),'HH24:MI:SS') AS rata_rata_waktu
                        FROM (".$sql.$tabel." ) z";

        $boocin_map         = [ 'APM' => 'APM', 'mobile' => 'Mobile JKN', 'rsud' => 'On Site RSUD', 'WA' => 'WA' ];
        $dataX['data']      = $this->db->query($sql.$tabel.$order.$limitation)->result(); 
        $dataX['jml_data']  = $jumlah_data;        
        $dataX['rata_rata'] = $this->db->query($rata_rata)->row()->rata_rata_waktu == '' ? 0 : $this->db->query($rata_rata)->row()->rata_rata_waktu; 
        $dataX['periode']   = $this->getPeriode($search);
        $dataX['penjamin']  = $search["jenis_jaminan"] <>'' ? $this->db->select('nama')->from('sm_penjamin')->where('id', $search["jenis_jaminan"])->get()->row()->nama : '';		
        $dataX['poliklinik']= $search["poliklinik"] <>'' ? $this->db->select('nama')->from('sm_spesialisasi')->where('id', $search["poliklinik"])->get()->row()->nama : '';		
        $dataX['boocin']    = $boocin_map[$search["boocin"]] ?? '';

        return $dataX;
    }

}
