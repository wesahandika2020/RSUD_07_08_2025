<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Laporan_radiologi_model extends CI_Model
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
            ''      => '-- Pilih Laporan Radiologi --',
            '1'     => 'Laporan Jumlah Pemeriksaan',
            '2'     => 'Laporan Jumlah Pemeriksaan berdasarkan Penjamin',
            '3'     => 'Laporan Baca Expertise Perbulan',
        );
    }


    public function getJenisPasien()
    {
        return array(
            ''              => 'Semua Pasien',
            'Rawat Inap'    => 'Rawat Inap',
            'Rawat Jalan'   => 'Rawat Jalan',
            'IGD'           => 'IGD',
        );
    }

    public function getJaminan()
    {
        return array(
            ''              => 'Semua Jaminan',
            'Asuransi'      => 'Asuransi',
            'Perusahaan'    => 'Perusahaan',
            'Karyawan'      => 'Karyawan',
            'Gratis'        => 'Gratis',
            'Tunai'         => 'Tunai',
        );
    }

    private function sqlRekapDataHarga($search)
    {
        $this->db->select("orlab.*, null as data_laboratorium, 
                    pd.id_pasien as no_rm, lp.cara_bayar,
                    pd.no_register, p.nama as pasien,
                    COALESCE(lp.jenis_layanan, '') as layanan_lab, 
                    COALESCE(pj.nama, '') as penjamin,
                    COALESCE(pg.nama, '') as dokter, 
                    COALESCE(bg.nama, '') as bangsal, 
                    CONCAT_WS(' ', lp.jenis_layanan, sp.nama) as layanan, 
                    lp.id as id_layanan_pendaftaran, lp.id_pendaftaran, pd.jenis_igd", false);
        $this->db->from("sm_order_laboratorium as orlab");
        $this->db->join("sm_layanan_pendaftaran as lp", "lp.id = orlab.id_layanan_pendaftaran", "left");
        $this->db->join("sm_pendaftaran as pd", "pd.id = lp.id_pendaftaran", "left");
        $this->db->join("sm_pasien as p", "p.id = pd.id_pasien", "left");
        $this->db->join("sm_spesialisasi as sp", "sp.id = lp.id_unit_layanan", "left");
        $this->db->join('sm_penjamin as pj', 'pj.id = lp.id_penjamin', 'left');
        $this->db->join("sm_tenaga_medis as tm", "tm.id = orlab.id_dokter", "left");
        $this->db->join("sm_pegawai as pg", "pg.id = tm.id_pegawai", "left");
        $this->db->join("sm_rawat_inap as ri", "ri.id_layanan_pendaftaran = lp.id", "left");
        $this->db->join("sm_bangsal as bg", "bg.id = ri.id_bangsal", "left");
        $this->db->where("orlab.status", 'konfirm', true);

        if ($search["penjamin"] !== "") {
            $this->db->where("lp.id_penjamin = '" . $search["penjamin"] . "' ");
        }

        if ($search["tempat_layanan"] !== "") {

            if($search["jenis_rawat"] === 'Rawat Jalan'){

                $this->db->where("sp.nama = '" . $search["tempat_layanan"] . "' ");

            } else {

                if ($search["tempat_layanan"] === "IGD") {

                    $this->db->where("lp.jenis_layanan = '" . $search["tempat_layanan"] . "' ");

                } else {

                    $this->db->where("bg.nama = '" . $search["tempat_layanan"] . "' ");

                }

            }

        }

            

        if ($search["periode_laporan"] === "Harian") {
            if ($search["tanggal_harian"] !== "") {
                $this->db->where(" to_char(orlab.waktu_order, 'yyyy-mm-dd') ILIKE '%" . date2mysql($search['tanggal_harian']) . "%' ");
            }
        } elseif ($search["periode_laporan"] === "Bulanan" && $search["bulan"] !== "" && $search["tahun"] !== "") {
            $this->db->where(" to_char(orlab.waktu_order, 'yyyy/mm') = '" . $search["tahun"] . "/" . $search["bulan"] . "' ");
        } elseif ($search["periode_laporan"] === "Rentang Waktu" && $search["tanggal_awal"] !== "" && $search["tanggal_akhir"] !== "") {
            if ($search["tanggal_awal"] !== "" && $search["tanggal_akhir"] !== "") {
                $this->db->where("orlab.waktu_order BETWEEN '" . date2mysql($search['tanggal_awal']) . " 00:00:00' AND '" . date2mysql($search['tanggal_akhir']) . " 23:59:59'");
            }
        }

        return $this->db->order_by('orlab.waktu_order', 'desc');
        
    }

    private function sqlDataLayanan($id)
    {
        
        $this->db->select("tap.total, l.nama");
        $this->db->from("sm_order_laboratorium as orlab");
        $this->db->join("sm_laboratorium as sl", "orlab.id = sl.id_order_laboratorium", "left");
        $this->db->join("sm_detail_laboratorium as sdl", "sdl.id_laboratorium = sl.id", "left");
        $this->db->join("sm_tarif_pelayanan as tap", "tap.id = sdl.id_tarif", "left");
        $this->db->join("sm_layanan as l", "l.id = tap.id_layanan", "left");
        $this->db->where("orlab.id", $id, true);
        
        return $this->db->order_by('orlab.id', 'asc');
        
    }
    //testing

    function getJmlJenisPemeriksaanAll($limit, $start, $search)
    {
        $this->sqlRekapDataHarga($search);

        $data = $this->db->get()->result();

        if(!empty($data)){

            foreach ($data as $a => $b) {

                $this->sqlDataLayanan((int)$b->id);

                $dataLayanan = $this->db->get()->result();

                $x[$a] = $dataLayanan;

                $totalHarga = 0;

                foreach ($x[$a] as $c => $d) {

                    $totalHarga += (int)$d->total;


                }

                $y[$a] = $totalHarga;

                $layanan['detail'] = $data[$a];
                $layanan['datalaboratorium'] = $x[$a];
                $layanan['total_harga'] = $y[$a];

                $rekapLayanan[] = $layanan;

            }

            $periode = "";
            if ($search["periode_laporan"] === "Bulanan") {
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
            } elseif ($search["periode_laporan"] === "Harian") {
                $periode = get_date_format(date2mysql($search['tanggal_harian']));
            } elseif ($search["periode_laporan"] === "Rentang Waktu") {
                $periode = get_date_format(date2mysql($search['tanggal_awal'])) . " s.d " . get_date_format(date2mysql($search['tanggal_akhir']));
            }

            $totalData = count($rekapLayanan);

            $allData = range(1, $totalData);

            $xData = array_slice($allData, $start, $limit);
            
            if(!empty($xData)){
                foreach ($xData as $g => $h) {
                    $i = (int)$h - 1;
                    $dataLimit[] = $rekapLayanan[(int)$i];
                }
            } else {

                $dataLimit = $xData;

            }

            $dataX["periode"] = $periode;
            $dataX["data"]    = $dataLimit;
            $dataX["jumlah"]  = count($rekapLayanan);
            
            $this->db->close();

            return $dataX;

        }

    }

    function getExportRekapDataHarga($search)
    {
        $this->sqlRekapDataHarga($search);

        $data = $this->db->get()->result();

        if(!empty($data)){

            foreach ($data as $a => $b) {

                $this->sqlDataLayanan((int)$b->id);

                $dataLayanan = $this->db->get()->result();

                $x[$a] = $dataLayanan;

                $totalHarga = 0;

                foreach ($x[$a] as $c => $d) {

                    $totalHarga += (int)$d->total;


                }

                $y[$a] = $totalHarga;

                $layanan['detail'] = $data[$a];
                $layanan['datalaboratorium'] = $x[$a];
                $layanan['total_harga'] = $y[$a];


                $rekapLayanan[] = $layanan;

            }

            $periode = "";
            if ($search["periode_laporan"] === "Bulanan") {
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
            } elseif ($search["periode_laporan"] === "Harian") {
                $periode = get_date_format(date2mysql($search['tanggal_harian']));
            } elseif ($search["periode_laporan"] === "Rentang Waktu") {
                $periode = get_date_format(date2mysql($search['tanggal_awal'])) . " s.d " . get_date_format(date2mysql($search['tanggal_akhir']));
            }

            $dataX["periode"] = $periode;
            $dataX["data"]    = $rekapLayanan;
            
            $this->db->close();

            return $dataX;

        }
    }

    function getListDataLaporanRadiologi($limit, $start, $search)
	{
        $param = "";
		if ($search["periode_laporan"] === "Harian") {
			if ($search["tanggal_harian"] !== "") :
				$param .= " and to_char(orad.waktu_order, 'yyyy-mm-dd' ) ilike '%" . date2mysql($search['tanggal_harian']) . "' ";
			endif;
		} elseif ($search["periode_laporan"] === "Bulanan" & $search["bulan"] !== "" & $search["tahun"] !== "") {
			$param .= " and to_char(orad.waktu_order, 'YYYY-MM'::text) = '" . $search["tahun"] . "-" . $search["bulan"] . "' ";
		} elseif ($search["periode_laporan"] === "Rentang Waktu" & $search["tanggal_awal"] !== "" & $search["tanggal_akhir"] !== "") {
			if ($search["tanggal_awal"] !== "" & $search["tanggal_akhir"] !== "") :
				$param .= " and orad.waktu_order BETWEEN '" . date2mysql($search['tanggal_awal']) . " 00:00:00' AND '" . date2mysql($search['tanggal_akhir']) . " 23:59:59'";
			endif;
		}

		$sql1 = "SELECT l.nama as nama_tindakan, count(l.nama) as total_tindakan
                FROM sm_radiologi rad
                JOIN sm_order_radiologi orad on rad.id_order_radiologi=orad.id
                JOIN sm_detail_radiologi drad on rad.id=drad.id_radiologi
                JOIN sm_tarif_pelayanan tpl on drad.id_tarif=tpl.id
                JOIN sm_layanan l on tpl.id_layanan=l.id
                where orad.status = 'konfirm' and l.id_jenis_pemeriksaan = 13  $param
			    group by l.nama";

		$sql2 = "SELECT jenis_layanan, count(*) total FROM (
                    SELECT lp.jenis_layanan,lp.id
                    FROM sm_radiologi rad
                    JOIN sm_order_radiologi orad on rad.id_order_radiologi=orad.id
                    JOIN sm_detail_radiologi drad on rad.id=drad.id_radiologi
                    JOIN sm_tarif_pelayanan tpl on drad.id_tarif=tpl.id
                    JOIN sm_layanan l on tpl.id_layanan=l.id
                    JOIN sm_layanan_pendaftaran lp on rad.id_layanan_pendaftaran=lp.id
                    where orad.status = 'konfirm' and l.id_jenis_pemeriksaan = 13 $param
                    group by lp.jenis_layanan, lp.id
                ) z GROUP BY jenis_layanan ";

		$data['tindakan']    = $this->db->query($sql1)->result();
		$data['layanan'] = $this->db->query($sql2)->result();

		return $data;
	}

    function getListDataLaporanRadiologiByPenjamin($limit, $start, $search)
	{
        $param = "";
		if ($search["periode_laporan"] === "Harian") {
			if ($search["tanggal_harian"] !== "") :
				$param .= " and to_char(orad.waktu_order, 'yyyy-mm-dd' ) ilike '%" . date2mysql($search['tanggal_harian']) . "' ";
			endif;
		} elseif ($search["periode_laporan"] === "Bulanan" & $search["bulan"] !== "" & $search["tahun"] !== "") {
			$param .= " and to_char(orad.waktu_order, 'YYYY-MM'::text) = '" . $search["tahun"] . "-" . $search["bulan"] . "' ";
		} elseif ($search["periode_laporan"] === "Rentang Waktu" & $search["tanggal_awal"] !== "" & $search["tanggal_akhir"] !== "") {
			if ($search["tanggal_awal"] !== "" & $search["tanggal_akhir"] !== "") :
				$param .= " and orad.waktu_order BETWEEN '" . date2mysql($search['tanggal_awal']) . " 00:00:00' AND '" . date2mysql($search['tanggal_akhir']) . " 23:59:59'";
			endif;
		}

		$sql1 = "SELECT l.nama AS tindakan, COUNT(*) AS total,
                SUM(CASE WHEN pj.id = 16 THEN 1 ELSE 0 END) AS jpkmkt,
                SUM(CASE WHEN pj.id = 1 THEN 1 ELSE 0 END) AS bpjs,
                SUM(CASE WHEN pj.id = 9 THEN 1 ELSE 0 END) AS umum,
                SUM(CASE WHEN pj.id = 18 THEN 1 ELSE 0 END) AS jaminan_rsud,
                SUM(CASE WHEN pj.id = 32 THEN 1 ELSE 0 END) AS mcu_pegawai,
                SUM(CASE WHEN pj.id not in (16,1,9,18,32) THEN 1 ELSE 0 END) AS penjamin_lain,
	            SUM ( CASE WHEN pj.ID IS NULL THEN 1 ELSE 0 END ) AS penjamin_kosong
                FROM sm_radiologi rad
                JOIN sm_order_radiologi orad ON rad.id_order_radiologi = orad.id
                JOIN sm_detail_radiologi drad ON rad.id = drad.id_radiologi
                JOIN sm_tarif_pelayanan tpl ON drad.id_tarif = tpl.id
                JOIN sm_layanan l ON tpl.id_layanan = l.id
                JOIN sm_layanan_pendaftaran lp ON rad.id_layanan_pendaftaran = lp.id
                LEFT JOIN sm_penjamin pj ON lp.id_penjamin = pj.id
                WHERE orad.status = 'konfirm' AND l.id_jenis_pemeriksaan = 13
                AND l.id_parent = 99 $param
                GROUP BY l.nama";

		$sql2 = "SELECT l.nama AS tindakan, COUNT(*) AS total,
                SUM(CASE WHEN pj.id = 16 THEN 1 ELSE 0 END) AS jpkmkt,
                SUM(CASE WHEN pj.id = 1 THEN 1 ELSE 0 END) AS bpjs,
                SUM(CASE WHEN pj.id = 9 THEN 1 ELSE 0 END) AS umum,
                SUM(CASE WHEN pj.id = 18 THEN 1 ELSE 0 END) AS jaminan_rsud,
                SUM(CASE WHEN pj.id = 32 THEN 1 ELSE 0 END) AS mcu_pegawai,
                SUM(CASE WHEN pj.id not in (16,1,9,18,32) THEN 1 ELSE 0 END) AS penjamin_lain,
	            SUM ( CASE WHEN pj.ID IS NULL THEN 1 ELSE 0 END ) AS penjamin_kosong
                FROM sm_radiologi rad
                JOIN sm_order_radiologi orad ON rad.id_order_radiologi = orad.id
                JOIN sm_detail_radiologi drad ON rad.id = drad.id_radiologi
                JOIN sm_tarif_pelayanan tpl ON drad.id_tarif = tpl.id
                JOIN sm_layanan l ON tpl.id_layanan = l.id
                JOIN sm_layanan_pendaftaran lp ON rad.id_layanan_pendaftaran = lp.id
                LEFT JOIN sm_penjamin pj ON lp.id_penjamin = pj.id
                WHERE orad.status = 'konfirm' AND l.id_jenis_pemeriksaan = 13
                AND l.id_parent = 100 $param
                GROUP BY l.nama";

        $sql3 = "SELECT l.nama AS tindakan, COUNT(*) AS total,
                SUM(CASE WHEN pj.id = 16 THEN 1 ELSE 0 END) AS jpkmkt,
                SUM(CASE WHEN pj.id = 1 THEN 1 ELSE 0 END) AS bpjs,
                SUM(CASE WHEN pj.id = 9 THEN 1 ELSE 0 END) AS umum,
                SUM(CASE WHEN pj.id = 18 THEN 1 ELSE 0 END) AS jaminan_rsud,
                SUM(CASE WHEN pj.id = 32 THEN 1 ELSE 0 END) AS mcu_pegawai,
                SUM(CASE WHEN pj.id not in (16,1,9,18,32) THEN 1 ELSE 0 END) AS penjamin_lain,
	            SUM ( CASE WHEN pj.ID IS NULL THEN 1 ELSE 0 END ) AS penjamin_kosong
                FROM sm_radiologi rad
                JOIN sm_order_radiologi orad ON rad.id_order_radiologi = orad.id
                JOIN sm_detail_radiologi drad ON rad.id = drad.id_radiologi
                JOIN sm_tarif_pelayanan tpl ON drad.id_tarif = tpl.id
                JOIN sm_layanan l ON tpl.id_layanan = l.id
                JOIN sm_layanan_pendaftaran lp ON rad.id_layanan_pendaftaran = lp.id
                LEFT JOIN sm_penjamin pj ON lp.id_penjamin = pj.id
                WHERE orad.status = 'konfirm' AND l.id_jenis_pemeriksaan = 13
                AND l.id_parent = 101 $param
                GROUP BY l.nama";

        $sql4 = "SELECT l.nama AS tindakan, COUNT(*) AS total,
                SUM(CASE WHEN pj.id = 16 THEN 1 ELSE 0 END) AS jpkmkt,
                SUM(CASE WHEN pj.id = 1 THEN 1 ELSE 0 END) AS bpjs,
                SUM(CASE WHEN pj.id = 9 THEN 1 ELSE 0 END) AS umum,
                SUM(CASE WHEN pj.id = 18 THEN 1 ELSE 0 END) AS jaminan_rsud,
                SUM(CASE WHEN pj.id = 32 THEN 1 ELSE 0 END) AS mcu_pegawai,
                SUM(CASE WHEN pj.id not in (16,1,9,18,32) THEN 1 ELSE 0 END) AS penjamin_lain,
	            SUM ( CASE WHEN pj.ID IS NULL THEN 1 ELSE 0 END ) AS penjamin_kosong
                FROM sm_radiologi rad
                JOIN sm_order_radiologi orad ON rad.id_order_radiologi = orad.id
                JOIN sm_detail_radiologi drad ON rad.id = drad.id_radiologi
                JOIN sm_tarif_pelayanan tpl ON drad.id_tarif = tpl.id
                JOIN sm_layanan l ON tpl.id_layanan = l.id
                JOIN sm_layanan_pendaftaran lp ON rad.id_layanan_pendaftaran = lp.id
                LEFT JOIN sm_penjamin pj ON lp.id_penjamin = pj.id
                WHERE orad.status = 'konfirm' AND l.id_jenis_pemeriksaan = 13
                AND l.id_parent = 4945 $param
                GROUP BY l.nama";

        $sql5 = "SELECT l.nama AS tindakan, COUNT(*) AS total,
                SUM(CASE WHEN pj.id = 16 THEN 1 ELSE 0 END) AS jpkmkt,
                SUM(CASE WHEN pj.id = 1 THEN 1 ELSE 0 END) AS bpjs,
                SUM(CASE WHEN pj.id = 9 THEN 1 ELSE 0 END) AS umum,
                SUM(CASE WHEN pj.id = 18 THEN 1 ELSE 0 END) AS jaminan_rsud,
                SUM(CASE WHEN pj.id = 32 THEN 1 ELSE 0 END) AS mcu_pegawai,
                SUM(CASE WHEN pj.id not in (16,1,9,18,32) THEN 1 ELSE 0 END) AS penjamin_lain,
	            SUM ( CASE WHEN pj.ID IS NULL THEN 1 ELSE 0 END ) AS penjamin_kosong
                FROM sm_radiologi rad
                JOIN sm_order_radiologi orad ON rad.id_order_radiologi = orad.id
                JOIN sm_detail_radiologi drad ON rad.id = drad.id_radiologi
                JOIN sm_tarif_pelayanan tpl ON drad.id_tarif = tpl.id
                JOIN sm_layanan l ON tpl.id_layanan = l.id
                JOIN sm_layanan_pendaftaran lp ON rad.id_layanan_pendaftaran = lp.id
                LEFT JOIN sm_penjamin pj ON lp.id_penjamin = pj.id
                WHERE orad.status = 'konfirm' AND l.id_jenis_pemeriksaan = 13
                AND l.id_parent = 4947 $param
                GROUP BY l.nama";

		$data['radiologi']  = $this->db->query($sql1)->result();
		$data['usg']        = $this->db->query($sql2)->result();
		$data['ctscan']     = $this->db->query($sql3)->result();
		$data['panoramic']  = $this->db->query($sql4)->result();
		$data['fluroscopy'] = $this->db->query($sql5)->result();

		return $data;
	}
    
    function getDataDokterExpertise($limit, $start, $search)
	{
        $param = "";
		$param .= " and to_char(orad.waktu_order, 'YYYY-MM'::text) = '" . $search["tahun"] . "-" . $search["bulan"] . "' ";
		
		$sql1 = "SELECT DISTINCT drad.id_dokter, pg.nama nama_dokter
                FROM sm_radiologi rad
                JOIN sm_order_radiologi orad ON rad.id_order_radiologi = orad.id
                JOIN sm_detail_radiologi drad ON rad.id = drad.id_radiologi
                JOIN sm_tarif_pelayanan tpl ON drad.id_tarif = tpl.id
                JOIN sm_layanan l ON tpl.id_layanan = l.id
                JOIN sm_tenaga_medis tm on drad.id_dokter=tm.id
                JOIN sm_pegawai pg on tm.id_pegawai=pg.id
                JOIN sm_translucent tr on pg.id=tr.id
                WHERE orad.status = 'konfirm' AND l.id_jenis_pemeriksaan = 13 
                AND (drad.html is not null OR drad.url_expertise is not null OR rad.waktu_hasil is not null ) and tr.id_account_group=16 $param
                ORDER BY pg.nama ASC";

		$data  = $this->db->query($sql1)->result();

		return $data;
	}

    function getDataExpertise($limit, $start, $search,$id_dokter)
	{
        $param = "";
		$param .= " and to_char(orad.waktu_order, 'YYYY-MM'::text) = '" . $search["tahun"] . "-" . $search["bulan"] . "' ";
		
		$sql1 = "SELECT CASE WHEN l.id_parent = 99 THEN 'Konven' WHEN l.id_parent = 100 THEN 'Pemeriksaan USG' 
        WHEN l.id_parent = 101 THEN 'Tindakan CT Scan' WHEN l.id_parent = 4945 THEN 'Panoramic' 
        WHEN l.id_parent = 4947 THEN 'Fluroscopy' ELSE '-' END AS pemeriksaan,
        SUM(CASE WHEN to_char(orad.waktu_order, 'dd') = '01' THEN 1 ELSE 0 END) AS tgl_1,
        SUM(CASE WHEN to_char(orad.waktu_order, 'dd') = '02' THEN 1 ELSE 0 END) AS tgl_2,
        SUM(CASE WHEN to_char(orad.waktu_order, 'dd') = '03' THEN 1 ELSE 0 END) AS tgl_3,
        SUM(CASE WHEN to_char(orad.waktu_order, 'dd') = '04' THEN 1 ELSE 0 END) AS tgl_4,
        SUM(CASE WHEN to_char(orad.waktu_order, 'dd') = '05' THEN 1 ELSE 0 END) AS tgl_5,
        SUM(CASE WHEN to_char(orad.waktu_order, 'dd') = '06' THEN 1 ELSE 0 END) AS tgl_6,
        SUM(CASE WHEN to_char(orad.waktu_order, 'dd') = '07' THEN 1 ELSE 0 END) AS tgl_7,
        SUM(CASE WHEN to_char(orad.waktu_order, 'dd') = '08' THEN 1 ELSE 0 END) AS tgl_8,
        SUM(CASE WHEN to_char(orad.waktu_order, 'dd') = '09' THEN 1 ELSE 0 END) AS tgl_9,
        SUM(CASE WHEN to_char(orad.waktu_order, 'dd') = '10' THEN 1 ELSE 0 END) AS tgl_10,
        SUM(CASE WHEN to_char(orad.waktu_order, 'dd') = '11' THEN 1 ELSE 0 END) AS tgl_11,
        SUM(CASE WHEN to_char(orad.waktu_order, 'dd') = '12' THEN 1 ELSE 0 END) AS tgl_12,
        SUM(CASE WHEN to_char(orad.waktu_order, 'dd') = '13' THEN 1 ELSE 0 END) AS tgl_13,
        SUM(CASE WHEN to_char(orad.waktu_order, 'dd') = '14' THEN 1 ELSE 0 END) AS tgl_14,
        SUM(CASE WHEN to_char(orad.waktu_order, 'dd') = '15' THEN 1 ELSE 0 END) AS tgl_15,
        SUM(CASE WHEN to_char(orad.waktu_order, 'dd') = '16' THEN 1 ELSE 0 END) AS tgl_16,
        SUM(CASE WHEN to_char(orad.waktu_order, 'dd') = '17' THEN 1 ELSE 0 END) AS tgl_17,
        SUM(CASE WHEN to_char(orad.waktu_order, 'dd') = '18' THEN 1 ELSE 0 END) AS tgl_18,
        SUM(CASE WHEN to_char(orad.waktu_order, 'dd') = '19' THEN 1 ELSE 0 END) AS tgl_19,
        SUM(CASE WHEN to_char(orad.waktu_order, 'dd') = '20' THEN 1 ELSE 0 END) AS tgl_20,
        SUM(CASE WHEN to_char(orad.waktu_order, 'dd') = '21' THEN 1 ELSE 0 END) AS tgl_21,
        SUM(CASE WHEN to_char(orad.waktu_order, 'dd') = '22' THEN 1 ELSE 0 END) AS tgl_22,
        SUM(CASE WHEN to_char(orad.waktu_order, 'dd') = '23' THEN 1 ELSE 0 END) AS tgl_23,
        SUM(CASE WHEN to_char(orad.waktu_order, 'dd') = '24' THEN 1 ELSE 0 END) AS tgl_24,
        SUM(CASE WHEN to_char(orad.waktu_order, 'dd') = '25' THEN 1 ELSE 0 END) AS tgl_25,
        SUM(CASE WHEN to_char(orad.waktu_order, 'dd') = '26' THEN 1 ELSE 0 END) AS tgl_26,
        SUM(CASE WHEN to_char(orad.waktu_order, 'dd') = '27' THEN 1 ELSE 0 END) AS tgl_27,
        SUM(CASE WHEN to_char(orad.waktu_order, 'dd') = '28' THEN 1 ELSE 0 END) AS tgl_28,
        SUM(CASE WHEN to_char(orad.waktu_order, 'dd') = '29' THEN 1 ELSE 0 END) AS tgl_29,
        SUM(CASE WHEN to_char(orad.waktu_order, 'dd') = '30' THEN 1 ELSE 0 END) AS tgl_30,
        SUM(CASE WHEN to_char(orad.waktu_order, 'dd') = '31' THEN 1 ELSE 0 END) AS tgl_31,

        SUM(CASE WHEN to_char(orad.waktu_order, 'dd') = '01' THEN 1 ELSE 0 END) +
        SUM(CASE WHEN to_char(orad.waktu_order, 'dd') = '02' THEN 1 ELSE 0 END) +
        SUM(CASE WHEN to_char(orad.waktu_order, 'dd') = '03' THEN 1 ELSE 0 END) +
        SUM(CASE WHEN to_char(orad.waktu_order, 'dd') = '04' THEN 1 ELSE 0 END) +
        SUM(CASE WHEN to_char(orad.waktu_order, 'dd') = '05' THEN 1 ELSE 0 END) +
        SUM(CASE WHEN to_char(orad.waktu_order, 'dd') = '06' THEN 1 ELSE 0 END) +
        SUM(CASE WHEN to_char(orad.waktu_order, 'dd') = '07' THEN 1 ELSE 0 END) +
        SUM(CASE WHEN to_char(orad.waktu_order, 'dd') = '08' THEN 1 ELSE 0 END) +
        SUM(CASE WHEN to_char(orad.waktu_order, 'dd') = '09' THEN 1 ELSE 0 END) +
        SUM(CASE WHEN to_char(orad.waktu_order, 'dd') = '10' THEN 1 ELSE 0 END) +
        SUM(CASE WHEN to_char(orad.waktu_order, 'dd') = '11' THEN 1 ELSE 0 END) +
        SUM(CASE WHEN to_char(orad.waktu_order, 'dd') = '12' THEN 1 ELSE 0 END) +
        SUM(CASE WHEN to_char(orad.waktu_order, 'dd') = '13' THEN 1 ELSE 0 END) +
        SUM(CASE WHEN to_char(orad.waktu_order, 'dd') = '14' THEN 1 ELSE 0 END) +
        SUM(CASE WHEN to_char(orad.waktu_order, 'dd') = '15' THEN 1 ELSE 0 END) +
        SUM(CASE WHEN to_char(orad.waktu_order, 'dd') = '16' THEN 1 ELSE 0 END) +
        SUM(CASE WHEN to_char(orad.waktu_order, 'dd') = '17' THEN 1 ELSE 0 END) +
        SUM(CASE WHEN to_char(orad.waktu_order, 'dd') = '18' THEN 1 ELSE 0 END) +
        SUM(CASE WHEN to_char(orad.waktu_order, 'dd') = '19' THEN 1 ELSE 0 END) +
        SUM(CASE WHEN to_char(orad.waktu_order, 'dd') = '20' THEN 1 ELSE 0 END) +
        SUM(CASE WHEN to_char(orad.waktu_order, 'dd') = '21' THEN 1 ELSE 0 END) +
        SUM(CASE WHEN to_char(orad.waktu_order, 'dd') = '22' THEN 1 ELSE 0 END) +
        SUM(CASE WHEN to_char(orad.waktu_order, 'dd') = '23' THEN 1 ELSE 0 END) +
        SUM(CASE WHEN to_char(orad.waktu_order, 'dd') = '24' THEN 1 ELSE 0 END) +
        SUM(CASE WHEN to_char(orad.waktu_order, 'dd') = '25' THEN 1 ELSE 0 END) +
        SUM(CASE WHEN to_char(orad.waktu_order, 'dd') = '26' THEN 1 ELSE 0 END) +
        SUM(CASE WHEN to_char(orad.waktu_order, 'dd') = '27' THEN 1 ELSE 0 END) +
        SUM(CASE WHEN to_char(orad.waktu_order, 'dd') = '28' THEN 1 ELSE 0 END) +
        SUM(CASE WHEN to_char(orad.waktu_order, 'dd') = '29' THEN 1 ELSE 0 END) +
        SUM(CASE WHEN to_char(orad.waktu_order, 'dd') = '30' THEN 1 ELSE 0 END) +
        SUM(CASE WHEN to_char(orad.waktu_order, 'dd') = '31' THEN 1 ELSE 0 END) total

        FROM sm_radiologi rad
        JOIN sm_order_radiologi orad ON rad.id_order_radiologi = orad.id
        JOIN sm_detail_radiologi drad ON rad.id = drad.id_radiologi
        JOIN sm_tarif_pelayanan tpl ON drad.id_tarif = tpl.id
        JOIN sm_layanan l ON tpl.id_layanan = l.id
        JOIN sm_tenaga_medis tm on drad.id_dokter=tm.id
        JOIN sm_pegawai pg on tm.id_pegawai=pg.id
        WHERE orad.status = 'konfirm' AND l.id_jenis_pemeriksaan = 13 and (drad.html is not null OR drad.url_expertise is not null OR rad.waktu_hasil is not null)
        AND drad.id_dokter=$id_dokter $param
        GROUP BY drad.id_dokter,l.id_parent";

		$data  = $this->db->query($sql1)->result();

		return $data;
	}

}
