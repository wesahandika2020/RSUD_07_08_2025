<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Laporan_hd_model extends CI_Model
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
            ''      => '-- Pilih Laporan Hemodialisa --',
            '1'     => 'Laporan Tindakan Hemodialisa Rawat Jalan dan Rawat Inap',
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

    public function getTindakan()
    {
        return array(
            ''     => '- Semua Tindakan -',
            '4464' => 'HD REGULER',     // id sm_layanan
            '4463' => 'HD NON REGULER', // id sm_layanan
        );
    }

    function getListLaporanHd01($search)
	{
        $param = "";
        $where_tindakan  = "";
		if ($search["periode_laporan"] === "Harian") {
			if ($search["tanggal_harian"] !== "") :
				$param .= " and to_char(lp.tanggal_layanan, 'yyyy-mm-dd' ) ilike '%" . date2mysql($search['tanggal_harian']) . "' ";
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

        $sql = " SELECT DISTINCT ON	( lp.ID ) lp.ID, p.nama AS nama,
                p.id id_pasien, COALESCE ( pg.nama, '' ) AS dokter, COALESCE ( pj.nama, '' ) AS penjamin,
                (select count(*) jml from sm_layanan_pendaftaran where id_pendaftaran=lp.id_pendaftaran) jml_layanan";

        $sql_tindakan = " SELECT p.nama AS nama,
                p.id id_pasien, COALESCE ( pg.nama, '' ) AS dokter, COALESCE ( pj.nama, '' ) AS penjamin,
                (select count(*) jml from sm_layanan_pendaftaran where id_pendaftaran=lp.id_pendaftaran) jml_layanan";

        $tabel = " FROM sm_layanan_pendaftaran AS lp
                    JOIN sm_pendaftaran AS pd ON pd.id = lp.id_pendaftaran
                    JOIN sm_pasien AS p ON p.id = pd.id_pasien
                    LEFT JOIN sm_tenaga_medis AS tm ON tm.id = lp.id_dokter
                    LEFT JOIN sm_pegawai AS pg ON pg.id = tm.id_pegawai
                    LEFT JOIN sm_penjamin AS pj ON pj.id = lp.id_penjamin ";

        $tindakan = " JOIN sm_tarif_tindakan_pasien ttp ON lp.id = ttp.id_layanan_pendaftaran
                          JOIN sm_tarif_pelayanan tp on ttp.id_tarif_pelayanan=tp.id";

        $where = " WHERE lp.jenis_layanan = 'Hemodialisa' AND lp.status_terlayani = 'Sudah' ";
                      
        if ($search["jenis_tindakan"] != "") {
            $where_tindakan .= " AND tp.id_layanan = '" . $search["jenis_tindakan"] . "' ";
        } else {
            $where_tindakan .= " AND tp.id_layanan in (4463,4464) "; // HD NON REGULER - HD REGULER  
        }

        $sql_rajal = " AND (select count(*) jml from sm_layanan_pendaftaran where id_pendaftaran=lp.id_pendaftaran) <= 1 ";
        $sql_ranap = " AND (select count(*) jml from sm_layanan_pendaftaran where id_pendaftaran=lp.id_pendaftaran) > 1 ";
		$order     = " ORDER BY lp.id, p.nama ASC ";

		// $data['rajal']     = $this->db->query($sql.$tabel.$where.$param.$sql_rajal.$order)->result();
        // $data['ranap']     = $this->db->query($sql.$tabel.$where.$param.$sql_ranap.$order)->result();
		$data['rajal']     = $this->db->query($sql.$tabel.$tindakan.$where.$where_tindakan.$param.$sql_rajal.$order)->result();
		$data['jml_rajal'] = $this->db->query($sql_tindakan.$tabel.$tindakan.$where.$where_tindakan.$param.$sql_rajal.$order)->num_rows();
		$data['ranap']     = $this->db->query($sql.$tabel.$tindakan.$where.$where_tindakan.$param.$sql_ranap.$order)->result();
		$data['jml_ranap'] = $this->db->query($sql_tindakan.$tabel.$tindakan.$where.$where_tindakan.$param.$sql_ranap.$order)->num_rows();
		
        // $data['query']     = $param;
		// $data['query2']    = $where_tindakan.$param;
        // $data['query_rajal']     = $sql.$where.$param.$sql_rajal.$order;
		// $data['query_jml_rajal'] = $sql_tindakan.$tindakan.$where.$where_tindakan.$param.$sql_rajal.$order;
        // $data['query_ranap']     = $sql.$where.$param.$sql_ranap.$order;
		// $data['query_jml_ranap'] = $sql_tindakan.$tabel.$tindakan.$where.$where_tindakan.$param.$sql_ranap.$order;

        

		if($search["periode_laporan"] == 'Harian'){
			$data['periode'] = 'Harian ('.$search["tanggal_harian"].')' ;
		} else if($search["periode_laporan"] == 'Bulanan'){
			if ($search["bulan"] == '01') {
                $data['periode'] = "Bulanan (Januari " . $search["tahun"] . ')';
            } elseif ($search["bulan"] == '02') {
                $data['periode'] = "Bulanan (Februari " . $search["tahun"] . ')';
            } elseif ($search["bulan"] == '03') {
                $data['periode'] = "Bulanan (Maret " . $search["tahun"] . ')';
            } elseif ($search["bulan"] == '04') {
                $data['periode'] = "Bulanan (April " . $search["tahun"] . ')';
            } elseif ($search["bulan"] == '05') {
                $data['periode'] = "Bulanan (Mei " . $search["tahun"] . ')';
            } elseif ($search["bulan"] == '06') {
                $data['periode'] = "Bulanan (Juni " . $search["tahun"] . ')';
            } elseif ($search["bulan"] == '07') {
                $data['periode'] = "Bulanan (Juli " . $search["tahun"] . ')';
            } elseif ($search["bulan"] == '08') {
                $data['periode'] = "Bulanan (Agustus " . $search["tahun"] . ')';
            } elseif ($search["bulan"] == '09') {
                $data['periode'] = "Bulanan (September " . $search["tahun"] . ')';
            } elseif ($search["bulan"] == '10') {
                $data['periode'] = "Bulanan (Oktober " . $search["tahun"] . ')';
            } elseif ($search["bulan"] == '11') {
                $data['periode'] = "Bulanan (November " . $search["tahun"] . ')';
            } elseif ($search["bulan"] == '12') {
                $data['periode'] = "Bulanan (Desember " . $search["tahun"] . ')';
            }
		} else if($search["periode_laporan"] == 'Rentang Waktu'){
			$data['periode'] = 'Rentang Waktu ('.$search["tanggal_awal"].' sd '.$search["tanggal_akhir"].')' ;
		}

		$data['penjamin']  = $search["jenis_jaminan"];
		$data['tindakan']  = $search["jenis_tindakan"];

		return $data;
	}

}
