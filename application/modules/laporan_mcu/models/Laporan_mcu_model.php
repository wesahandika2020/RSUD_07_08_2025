<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Laporan_mcu_model extends CI_Model
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
            ''      => '-- Pilih Laporan --',
            '1'     => 'Laporan Konsul Medical Check Up',
            '2'     => 'Laporan Medical Check Up Order Laboratorium',
            '3'     => 'Laporan Medical Check Up Order Radiologi',
            '4'     => 'Laporan Tindakan Dokter Medical Check Up',
        );
    }

    public function getJaminan()
    {
        $sql = "select * from sm_penjamin where is_active=1 order by nama asc";
        $query = $this->db->query($sql)->result();
        $data =  array();
        $data[''] = '- Semua Penjamin -';
        foreach ($query as $key => $value) :
            $data[$value->nama] = $value->nama;
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

    function getDokterMcu($q, $start, $limit)
    {
        $limit = " limit " . $limit . " offset " . $start;
        $select = "select n.*,pg.id as id_pegawai, pg.nama, COALESCE(s.nama , '') as spesialisasi ";
        $count = "select count(n.id) as count ";
        $sql = "from sm_tenaga_medis n
                join sm_pegawai pg on (pg.id = n.id_pegawai)
                left join sm_spesialisasi s on (s.id = n.id_spesialisasi)
                left join sm_profesi_nadis prn on (prn.id = n.id_profesi)
                where pg.nama ilike ('%$q%')
                and (prn.nama = 'Dokter Umum' or prn.nama = 'Dokter Spesialis' or prn.nama = 'Dokter')
                and pg.status = '1' AND s.id=44 ";

        // echo $select . $sql; die;
        $data['data'] = $this->db->query($select . $sql . $limit)->result();
        $data['total'] = $this->db->query($count . $sql)->row()->count;
        return $data;
    }

    function getPeriode($search)
	{
        $periode = '';
        if($search["periode_laporan"] == 'Harian'){
			$periode = 'Harian ('.$search["tanggal_harian"].')' ;
		} else if($search["periode_laporan"] == 'Bulanan'){
			if ($search["bulan"] == '01') {
                $periode = "Bulanan (Januari " . $search["tahun"] . ')';
            } elseif ($search["bulan"] == '02') {
                $periode = "Bulanan (Februari " . $search["tahun"] . ')';
            } elseif ($search["bulan"] == '03') {
                $periode = "Bulanan (Maret " . $search["tahun"] . ')';
            } elseif ($search["bulan"] == '04') {
                $periode = "Bulanan (April " . $search["tahun"] . ')';
            } elseif ($search["bulan"] == '05') {
                $periode = "Bulanan (Mei " . $search["tahun"] . ')';
            } elseif ($search["bulan"] == '06') {
                $periode = "Bulanan (Juni " . $search["tahun"] . ')';
            } elseif ($search["bulan"] == '07') {
                $periode = "Bulanan (Juli " . $search["tahun"] . ')';
            } elseif ($search["bulan"] == '08') {
                $periode = "Bulanan (Agustus " . $search["tahun"] . ')';
            } elseif ($search["bulan"] == '09') {
                $periode = "Bulanan (September " . $search["tahun"] . ')';
            } elseif ($search["bulan"] == '10') {
                $periode = "Bulanan (Oktober " . $search["tahun"] . ')';
            } elseif ($search["bulan"] == '11') {
                $periode = "Bulanan (November " . $search["tahun"] . ')';
            } elseif ($search["bulan"] == '12') {
                $periode = "Bulanan (Desember " . $search["tahun"] . ')';
            }
		} else if($search["periode_laporan"] == 'Rentang Waktu'){
			$periode = 'Rentang Waktu ('.$search["tanggal_awal"].' sd '.$search["tanggal_akhir"].')' ;
		}
        return $periode;
    }

    function getListLaporanMcu01($limit, $start, $search)
	{
        $param = "";
        $dokter = "";
        $param_poli = "";

		if ($search["periode_laporan"] === "Harian") {
			if ($search["tanggal_harian"] !== "") :
				$param .= " and to_char(lp.tanggal_layanan, 'yyyy-mm-dd' ) = '" . date2mysql($search['tanggal_harian']) . "' ";
			endif;
		} elseif ($search["periode_laporan"] === "Bulanan" & $search["bulan"] !== "" & $search["tahun"] !== "") {
			$param .= " and to_char(lp.tanggal_layanan, 'YYYY-MM'::text) = '" . $search["tahun"] . "-" . $search["bulan"] . "' ";
		} elseif ($search["periode_laporan"] === "Rentang Waktu" & $search["tanggal_awal"] !== "" & $search["tanggal_akhir"] !== "") {
			if ($search["tanggal_awal"] !== "" & $search["tanggal_akhir"] !== "") :
				$param .= " and lp.tanggal_layanan BETWEEN '" . date2mysql($search['tanggal_awal']) . " 00:00:00' AND '" . date2mysql($search['tanggal_akhir']) . " 23:59:59'";
			endif;
		}

        if ($search["jenis_jaminan"] != "") {
            $param .= " AND pj.nama = '" . $search["jenis_jaminan"] . "' ";
        }

        if ($search["dokter_mcu"] != "") {
            $dokter .= " AND lp.id_dokter = '" . $search["dokter_mcu"] . "' ";
        }
        
        if ($search["poliklinik"] != "") {
            $param_poli .= " AND lp.id_unit_layanan = '" . $search["poliklinik"] . "' ";
        }

        $sql = " SELECT DISTINCT a.id_pendaftaran, a.id_layanan_pendaftran, a.no_register, a.tanggal_daftar, a.id_pasien, a.nama_pasien, a.dokter_mcu
                FROM (SELECT 
                    pd.ID id_pendaftaran, lp.ID id_layanan_pendaftran,pd.no_register, pd.tanggal_daftar,
                    pd.id_pasien, ps.nama nama_pasien, pg.nama dokter_mcu
                    FROM sm_pendaftaran pd
                    JOIN sm_layanan_pendaftaran lp on pd.id=lp.id_pendaftaran
                    JOIN sm_pasien ps on pd.id_pasien=ps.id
                    LEFT JOIN sm_tenaga_medis tm on lp.id_dokter=tm.id
                    LEFT JOIN sm_pegawai pg on tm.id_pegawai = pg.id 
                    LEFT JOIN sm_penjamin pj on lp.id_penjamin=pj.id
                    WHERE lp.id_unit_layanan=44 AND lp.status_terlayani <> 'Batal' $param $dokter ) a
                JOIN (
                    SELECT lp.id_pendaftaran,pg.nama nama_dokter, sp.nama nama_poli, pj.nama nama_penjamin 
                    FROM sm_pendaftaran pd
                    JOIN sm_layanan_pendaftaran lp on pd.id=lp.id_pendaftaran
                    LEFT JOIN sm_tenaga_medis tm on lp.id_dokter=tm.id
                    LEFT JOIN sm_pegawai pg on tm.id_pegawai = pg.id 
                    LEFT JOIN sm_spesialisasi sp on lp.id_unit_layanan=sp.id
                    LEFT JOIN sm_penjamin pj on lp.id_penjamin=pj.id
                    WHERE lp.konsul=1 AND lp.status_terlayani <> 'Batal'  $param $param_poli ORDER BY lp.id ASC
                )b on a.id_pendaftaran = b.id_pendaftaran 
                ORDER BY a.id_pendaftaran ASC, a.tanggal_daftar ASC, a.id_pasien ASC ";

        $limitation ='';
        if ($limit !== 0) {
            $limitation = " LIMIT " . $limit . " OFFSET " . $start;
        }

        $result_mcu = $this->db->query($sql.$limitation)->result();
        
        foreach($result_mcu as $val){            

            $sql_konsul = "SELECT lp.id_pendaftaran,pg.nama nama_dokter, sp.nama nama_poli, pj.nama nama_penjamin 
                            FROM sm_pendaftaran pd
                            JOIN sm_layanan_pendaftaran lp on pd.id=lp.id_pendaftaran
                            LEFT JOIN sm_tenaga_medis tm on lp.id_dokter=tm.id
                            LEFT JOIN sm_pegawai pg on tm.id_pegawai = pg.id 
                            LEFT JOIN sm_spesialisasi sp on lp.id_unit_layanan=sp.id
                            LEFT JOIN sm_penjamin pj on lp.id_penjamin=pj.id 
                            WHERE lp.konsul=1 AND lp.status_terlayani <> 'Batal' and pd.id=$val->id_pendaftaran $param $param_poli ORDER BY lp.id ASC";
            $val->konsul = $this->db->query($sql_konsul)->result();
        }        

		$data['data']      = $result_mcu;
		$data['jml_data']  = $this->db->query($sql)->num_rows();      
        $data['periode']   = $this->getPeriode($search);
		$data['penjamin']  = $search["jenis_jaminan"];
        $data['dokter']    = $search["dokter_mcu"] <>'' ? $this->db->query("SELECT nama FROM sm_pegawai WHERE id = (SELECT id_pegawai FROM sm_tenaga_medis WHERE id = ?)", array($search["dokter_mcu"]))->row()->nama : '';   
        $data['poliklinik']= $search["poliklinik"] <>'' ? $this->db->select('nama')->from('sm_spesialisasi')->where('id', $search["poliklinik"])->get()->row()->nama : '';	

		return $data;
	}

    function getListLaporanMcu02($limit, $start, $search)
	{
        $param = "";
        $dokter = "";
		if ($search["periode_laporan"] === "Harian") {
			if ($search["tanggal_harian"] !== "") :
				$param .= " and to_char(lp.tanggal_layanan, 'yyyy-mm-dd' ) = '" . date2mysql($search['tanggal_harian']) . "' ";
			endif;
		} elseif ($search["periode_laporan"] === "Bulanan" & $search["bulan"] !== "" & $search["tahun"] !== "") {
			$param .= " and to_char(lp.tanggal_layanan, 'YYYY-MM'::text) = '" . $search["tahun"] . "-" . $search["bulan"] . "' ";
		} elseif ($search["periode_laporan"] === "Rentang Waktu" & $search["tanggal_awal"] !== "" & $search["tanggal_akhir"] !== "") {
			if ($search["tanggal_awal"] !== "" & $search["tanggal_akhir"] !== "") :
				$param .= " and lp.tanggal_layanan BETWEEN '" . date2mysql($search['tanggal_awal']) . " 00:00:00' AND '" . date2mysql($search['tanggal_akhir']) . " 23:59:59'";
			endif;
		}

        if ($search["jenis_jaminan"] != "") {
            $param .= " AND pj.nama = '" . $search["jenis_jaminan"] . "' ";
        }

        if ($search["dokter_mcu"] != "") {
            $dokter .= " AND lp.id_dokter = '" . $search["dokter_mcu"] . "' ";
        }

        $sql = " SELECT DISTINCT pd.id id_pendaftaran, lp.id id_layanan_pendaftran, pd.no_register, pd.tanggal_daftar, pd.id_pasien, ps.nama nama_pasien, pg.nama dokter_mcu, pj.nama nama_penjamin , ol.id id_order_lab
                    FROM sm_pendaftaran pd
                    JOIN sm_layanan_pendaftaran lp ON pd.id = lp.id_pendaftaran
                    JOIN sm_pasien ps ON pd.id_pasien = ps.id
                    LEFT JOIN sm_tenaga_medis tm ON lp.id_dokter = tm.id
                    LEFT JOIN sm_pegawai pg ON tm.id_pegawai = pg.id
                    LEFT JOIN sm_penjamin pj ON lp.id_penjamin = pj.id
                    JOIN sm_order_laboratorium ol ON (lp.id = ol.id_layanan_pendaftaran AND ol.status='konfirm')
                    JOIN sm_laboratorium lb ON (ol.id=lb.id_order_laboratorium AND lb.status_hasil <> 'Batal')
                    WHERE	lp.id_unit_layanan = 44 
                    AND lp.status_terlayani <> 'Batal' $param $dokter
                    ORDER BY pd.id ASC, pd.tanggal_daftar ASC, pd.id_pasien ASC ";

        $limitation ='';
        if ($limit !== 0) {
            $limitation = " LIMIT " . $limit . " OFFSET " . $start;
        }

        $result_mcu = $this->db->query($sql.$limitation)->result();
        
        foreach($result_mcu as $val){
            $sql_konsul = "SELECT ly.nama nama_tindakan from sm_laboratorium lb 
                            JOIN sm_detail_laboratorium dlb on lb.id = dlb.id_laboratorium
                            JOIN sm_tarif_pelayanan tp on dlb.id_tarif=tp.id
                            JOIN sm_layanan ly on tp.id_layanan=ly.id
                            where lb.id_order_laboratorium =$val->id_order_lab AND lb.status_hasil <> 'Batal' ORDER BY ly.nama ASC";
            $val->konsul = $this->db->query($sql_konsul)->result();
        }        

		$data['data']      = $result_mcu;
		$data['jml_data']  = $this->db->query($sql)->num_rows();      
        $data['periode']   = $this->getPeriode($search);
		$data['penjamin']  = $search["jenis_jaminan"];
        $data['dokter']    = $search["dokter_mcu"] <>'' ? $this->db->query("SELECT nama FROM sm_pegawai WHERE id = (SELECT id_pegawai FROM sm_tenaga_medis WHERE id = ?)", array($search["dokter_mcu"]))->row()->nama : '';   

		return $data;
	}

    function getListLaporanMcu03($limit, $start, $search)
	{
        $param = "";
        $dokter = "";
		if ($search["periode_laporan"] === "Harian") {
			if ($search["tanggal_harian"] !== "") :
				$param .= " and to_char(lp.tanggal_layanan, 'yyyy-mm-dd' ) = '" . date2mysql($search['tanggal_harian']) . "' ";
			endif;
		} elseif ($search["periode_laporan"] === "Bulanan" & $search["bulan"] !== "" & $search["tahun"] !== "") {
			$param .= " and to_char(lp.tanggal_layanan, 'YYYY-MM'::text) = '" . $search["tahun"] . "-" . $search["bulan"] . "' ";
		} elseif ($search["periode_laporan"] === "Rentang Waktu" & $search["tanggal_awal"] !== "" & $search["tanggal_akhir"] !== "") {
			if ($search["tanggal_awal"] !== "" & $search["tanggal_akhir"] !== "") :
				$param .= " and lp.tanggal_layanan BETWEEN '" . date2mysql($search['tanggal_awal']) . " 00:00:00' AND '" . date2mysql($search['tanggal_akhir']) . " 23:59:59'";
			endif;
		}

        if ($search["jenis_jaminan"] != "") {
            $param .= " AND pj.nama = '" . $search["jenis_jaminan"] . "' ";
        }

        if ($search["dokter_mcu"] != "") {
            $dokter .= " AND lp.id_dokter = '" . $search["dokter_mcu"] . "' ";
        }

        $sql = " SELECT DISTINCT pd.id id_pendaftaran, lp.id id_layanan_pendaftran, pd.no_register, pd.tanggal_daftar, pd.id_pasien, ps.nama nama_pasien, pg.nama dokter_mcu, pj.nama nama_penjamin , orad.id id_order_lab
                    FROM sm_pendaftaran pd
                    JOIN sm_layanan_pendaftaran lp ON pd.id = lp.id_pendaftaran
                    JOIN sm_pasien ps ON pd.id_pasien = ps.id
                    LEFT JOIN sm_tenaga_medis tm ON lp.id_dokter = tm.id
                    LEFT JOIN sm_pegawai pg ON tm.id_pegawai = pg.id
                    LEFT JOIN sm_penjamin pj ON lp.id_penjamin = pj.id
                    JOIN sm_order_radiologi orad ON lp.id = orad.id_layanan_pendaftaran AND orad.status='konfirm'
                    JOIN sm_radiologi rad ON orad.id=rad.id_order_radiologi
                    WHERE lp.id_unit_layanan = 44 
                    AND lp.status_terlayani <> 'Batal' $param $dokter
                    ORDER BY pd.id ASC, pd.tanggal_daftar ASC, pd.id_pasien ASC ";

        $limitation ='';
        if ($limit !== 0) {
            $limitation = " LIMIT " . $limit . " OFFSET " . $start;
        }

        $result_mcu = $this->db->query($sql.$limitation)->result();
        
        foreach($result_mcu as $val){
            $sql_konsul = "SELECT ly.nama nama_tindakan from sm_radiologi rad 
                            JOIN sm_detail_radiologi drad on rad.id = drad.id_radiologi
                            JOIN sm_tarif_pelayanan tp on drad.id_tarif=tp.id
                            JOIN sm_layanan ly on tp.id_layanan=ly.id
                            where rad.id_order_radiologi =$val->id_order_lab ORDER BY ly.nama ASC";
            $val->konsul = $this->db->query($sql_konsul)->result();
        }        

		$data['data']      = $result_mcu;
		$data['jml_data']  = $this->db->query($sql)->num_rows();      
        $data['periode']   = $this->getPeriode($search);
		$data['penjamin']  = $search["jenis_jaminan"];
        $data['dokter']    = $search["dokter_mcu"] <>'' ? $this->db->query("SELECT nama FROM sm_pegawai WHERE id = (SELECT id_pegawai FROM sm_tenaga_medis WHERE id = ?)", array($search["dokter_mcu"]))->row()->nama : '';   

		return $data;
	}

    function getListLaporanMcu04($limit, $start, $search)
	{
        $param = "";
        $dokter = "";
		if ($search["periode_laporan"] === "Harian") {
			if ($search["tanggal_harian"] !== "") :
				$param .= " and to_char(lp.tanggal_layanan, 'yyyy-mm-dd' ) = '" . date2mysql($search['tanggal_harian']) . "' ";
			endif;
		} elseif ($search["periode_laporan"] === "Bulanan" & $search["bulan"] !== "" & $search["tahun"] !== "") {
			$param .= " and to_char(lp.tanggal_layanan, 'YYYY-MM'::text) = '" . $search["tahun"] . "-" . $search["bulan"] . "' ";
		} elseif ($search["periode_laporan"] === "Rentang Waktu" & $search["tanggal_awal"] !== "" & $search["tanggal_akhir"] !== "") {
			if ($search["tanggal_awal"] !== "" & $search["tanggal_akhir"] !== "") :
				$param .= " and lp.tanggal_layanan BETWEEN '" . date2mysql($search['tanggal_awal']) . " 00:00:00' AND '" . date2mysql($search['tanggal_akhir']) . " 23:59:59'";
			endif;
		}

        if ($search["jenis_jaminan"] != "") {
            $param .= " AND pj.nama = '" . $search["jenis_jaminan"] . "' ";
        }

        if ($search["dokter_mcu"] != "") {
            $dokter .= " AND lp.id_dokter = '" . $search["dokter_mcu"] . "' ";
        }

        $sql = " SELECT DISTINCT pg.nama dokter_mcu
                    FROM sm_pendaftaran pd
                    JOIN sm_layanan_pendaftaran lp on pd.id=lp.id_pendaftaran
                    JOIN sm_pasien ps on pd.id_pasien=ps.id
                    LEFT JOIN sm_tenaga_medis tm on lp.id_dokter=tm.id
                    LEFT JOIN sm_pegawai pg on tm.id_pegawai = pg.id 
                    LEFT JOIN sm_penjamin pj on lp.id_penjamin=pj.id
                    LEFT JOIN sm_tarif_tindakan_pasien ttp ON lp.id=ttp.id_layanan_pendaftaran
                    LEFT JOIN sm_tarif_pelayanan tp ON ttp.id_tarif_pelayanan = tp.id
                    LEFT JOIN sm_layanan ly on tp.id_layanan = ly.id
                    WHERE lp.id_unit_layanan=44 AND lp.status_terlayani <> 'Batal' AND ly.nama is not null $param $dokter
                    GROUP BY pg.nama,ly.nama, pj.nama
                    ORDER BY pg.nama ASC ";

        $limitation ='';
        if ($limit !== 0) {
            $limitation = " LIMIT " . $limit . " OFFSET " . $start;
        }

        $result_mcu = $this->db->query($sql.$limitation)->result();
        
        foreach($result_mcu as $val){
            $sql_tindakan = "SELECT pg.nama dokter_mcu, ly.nama tindakan, count(ly.nama) jml_tindakan, pj.nama penjamin
                            FROM sm_pendaftaran pd
                            JOIN sm_layanan_pendaftaran lp on pd.id=lp.id_pendaftaran
                            JOIN sm_pasien ps on pd.id_pasien=ps.id
                            LEFT JOIN sm_tenaga_medis tm on lp.id_dokter=tm.id
                            LEFT JOIN sm_pegawai pg on tm.id_pegawai = pg.id 
                            LEFT JOIN sm_penjamin pj on lp.id_penjamin=pj.id
                            LEFT JOIN sm_tarif_tindakan_pasien ttp ON lp.id=ttp.id_layanan_pendaftaran
                            LEFT JOIN sm_tarif_pelayanan tp ON ttp.id_tarif_pelayanan = tp.id
                            LEFT JOIN sm_layanan ly on tp.id_layanan = ly.id
                            WHERE lp.id_unit_layanan = 44 AND lp.status_terlayani <> 'Batal' AND ly.nama is not null $param AND pg.nama = '$val->dokter_mcu'
                            GROUP BY pg.nama,ly.nama, pj.nama
                            ORDER BY pg.nama ASC,ly.nama ASC, pj.nama ASC ";
            $val->tindakan = $this->db->query($sql_tindakan)->result();
        }        

		$data['data']      = $result_mcu;
		$data['jml_data']  = $this->db->query($sql)->num_rows();      
        $data['periode']   = $this->getPeriode($search);
		$data['penjamin']  = $search["jenis_jaminan"];
        $data['dokter']    = $search["dokter_mcu"] <>'' ? $this->db->query("SELECT nama FROM sm_pegawai WHERE id = (SELECT id_pegawai FROM sm_tenaga_medis WHERE id = ?)", array($search["dokter_mcu"]))->row()->nama : '';   

		return $data;
	}
    
}
