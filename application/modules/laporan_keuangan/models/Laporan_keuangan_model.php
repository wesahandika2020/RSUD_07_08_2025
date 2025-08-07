<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Laporan_keuangan_model extends CI_Model
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
            ''  => '-- Pilih Laporan Keuangan --',
            '1' => 'Laporan Pendapatan Berdasarkan Layanan Dokter DPJP',
            '2' => 'Laporan Pendapatan Berdasarkan Layanan Dokter RABER',
            '3' => 'Laporan Pendapatan Berdasarkan Layanan Selain Dokter Spesialis dan Umum',
            '4' => 'Laporan Pendapatan Berdasarkan Layanan Penunjang',
            '5' => 'Laporan Kunjungan Rawat Inap',
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

    function getPetugas($q, $start, $limit)
    {
        $limit = " limit " . $limit . " offset " . $start;
        $select = "SELECT tm.ID, pg.ID id_pegawai, pg.nama  ";
        $count = "SELECT count(tm.ID) as count ";
        $sql = "FROM sm_tenaga_medis tm JOIN sm_pegawai pg ON tm.id_pegawai = pg.ID JOIN sm_translucent tr ON pg.id=tr.id
                WHERE tm.id_profesi NOT IN ( 8, 10 ) AND tr.is_active=1 AND pg.nama ilike ('%$q%') ";
        $order = "ORDER BY pg.nama ASC ";
        // echo $select . $sql; die;
        $data['data'] = $this->db->query($select . $sql . $order . $limit)->result();
        $data['total'] = $this->db->query($count . $sql)->row()->count;
        return $data;
    }

    public function getJenisLayanan()
    {
        $sql = "select DISTINCT jenis_layanan nama from sm_layanan_pendaftaran order by jenis_layanan ASC ";
        $query = $this->db->query($sql)->result();
        $data =  array();
        $data[''] = '- Semua Jenis Layanan -';
        foreach ($query as $key => $value) :
            $data[$value->nama] = $value->nama;
        endforeach;

        return $data;
    }

    function getListLaporanKeuangan01_Dokter($search)
    {
        $param = "";
        if ($search["periode_laporan"] === "Harian") {
            if ($search["tanggal_harian"] !== "") :
                $param .= " AND to_char(lp.tanggal_layanan, 'yyyy-mm-dd' ) = '" . date2mysql($search['tanggal_harian']) . "' ";
            endif;
        } elseif ($search["periode_laporan"] === "Bulanan" & $search["bulan"] !== "" & $search["tahun"] !== "") {
            $param .= " AND to_char(lp.tanggal_layanan, 'YYYY-MM'::text) = '" . $search["tahun"] . "-" . $search["bulan"] . "' ";
        } elseif ($search["periode_laporan"] === "Rentang Waktu" & $search["tanggal_awal"] !== "" & $search["tanggal_akhir"] !== "") {
            if ($search["tanggal_awal"] !== "" & $search["tanggal_akhir"] !== "") :
                $param .= " AND lp.tanggal_layanan BETWEEN '" . date2mysql($search['tanggal_awal']) . " 00:00:00' AND '" . date2mysql($search['tanggal_akhir']) . " 23:59:59'";
            endif;
        }

        $param_id_dokter = "";
        if ($search["id_dokter"] !== "") {
            $param_id_dokter  = " AND tm.ID=" . $search["id_dokter"];
        }

        $sql = " SELECT DISTINCT pg.id, tm.id id_tenaga_medis, pg.nama
                FROM sm_tenaga_medis tm 
                JOIN sm_pegawai pg ON tm.id_pegawai = pg.id 
                JOIN sm_translucent tr ON pg.id=tr.id 
                JOIN (
                    SELECT DISTINCT tm.id id_tenaga_medis, pj.id id_penjamin
                    FROM sm_tenaga_medis tm 
                    JOIN sm_tarif_tindakan_pasien ttp ON tm.id=ttp.id_operator
                    JOIN sm_layanan_pendaftaran lp ON ttp.id_layanan_pendaftaran = lp.id
                    JOIN sm_penjamin pj ON lp.id_penjamin=pj.id
                    WHERE tm.id_profesi IN ( 8, 10 ) AND lp.id_dokter=tm.id $param
                        UNION
                    SELECT DISTINCT tm.id id_tenaga_medis, pj.id id_penjamin
                    FROM sm_tenaga_medis tm 
                    JOIN (SELECT rs.id_dokter,pnj.id_layanan_pendaftaran FROM sm_penjualan pnj JOIN sm_resep rs ON pnj.id_resep=rs.id ) resep ON tm.id=resep.id_dokter
                    JOIN sm_layanan_pendaftaran lp ON resep.id_layanan_pendaftaran = lp.id
                    JOIN sm_penjamin pj ON lp.id_penjamin=pj.id
                    WHERE tm.id_profesi IN ( 8, 10 ) AND lp.id_dokter=resep.id_dokter $param
                ) kunj ON tm.id= kunj.id_tenaga_medis
                JOIN sm_penjamin pj ON kunj.id_penjamin=pj.id
                WHERE tm.id_profesi IN ( 8, 10 ) AND tr.is_active=1 $param_id_dokter ORDER BY pg.nama ASC; ";
        return $sql;
    }

    function getListLaporanKeuangan01_Penjamin($search, $id_dokter)
    {
        $param = "";
        if ($search["periode_laporan"] === "Harian") {
            if ($search["tanggal_harian"] !== "") :
                $param .= " AND to_char(lp.tanggal_layanan, 'yyyy-mm-dd' ) = '" . date2mysql($search['tanggal_harian']) . "' ";
            endif;
        } elseif ($search["periode_laporan"] === "Bulanan" & $search["bulan"] !== "" & $search["tahun"] !== "") {
            $param .= " AND to_char(lp.tanggal_layanan, 'YYYY-MM'::text) = '" . $search["tahun"] . "-" . $search["bulan"] . "' ";
        } elseif ($search["periode_laporan"] === "Rentang Waktu" & $search["tanggal_awal"] !== "" & $search["tanggal_akhir"] !== "") {
            if ($search["tanggal_awal"] !== "" & $search["tanggal_akhir"] !== "") :
                $param .= " AND lp.tanggal_layanan BETWEEN '" . date2mysql($search['tanggal_awal']) . " 00:00:00' AND '" . date2mysql($search['tanggal_akhir']) . " 23:59:59'";
            endif;
        }

        $param_id_penjamin = "";
        if ($search["jenis_jaminan"] !== "") {
            $param_id_penjamin  = " AND pd.id_penjamin=" . $search["jenis_jaminan"];
        }

        $sql = " SELECT DISTINCT pj.id id_penjamin, pj.nama penjamin
                FROM sm_tenaga_medis tm 
                JOIN sm_pegawai pg ON tm.id_pegawai = pg.id 
                JOIN sm_translucent tr ON pg.id=tr.id 
                JOIN (
                    SELECT DISTINCT tm.id id_tenaga_medis, pj.id id_penjamin
                    FROM sm_tenaga_medis tm 
                    JOIN sm_tarif_tindakan_pasien ttp ON tm.id=ttp.id_operator
                    JOIN sm_layanan_pendaftaran lp ON ttp.id_layanan_pendaftaran = lp.id
                    JOIN sm_penjamin pj ON lp.id_penjamin=pj.id
                    WHERE tm.id_profesi IN ( 8, 10 ) AND lp.id_dokter=tm.id AND lp.id_dokter = $id_dokter $param
                        UNION
                    SELECT DISTINCT tm.id id_tenaga_medis, pj.id id_penjamin
                    FROM sm_tenaga_medis tm 
                    JOIN (SELECT rs.id_dokter,pnj.id_layanan_pendaftaran FROM sm_penjualan pnj JOIN sm_resep rs ON pnj.id_resep=rs.id ) resep ON tm.id=resep.id_dokter
                    JOIN sm_layanan_pendaftaran lp ON resep.id_layanan_pendaftaran = lp.id
                    JOIN sm_penjamin pj ON lp.id_penjamin=pj.id
                    WHERE tm.id_profesi IN ( 8, 10 ) AND lp.id_dokter=resep.id_dokter AND lp.id_dokter = $id_dokter $param
                ) kunj ON tm.id= kunj.id_tenaga_medis                
                JOIN sm_penjamin pj ON kunj.id_penjamin=pj.id
                WHERE tm.id_profesi IN ( 8, 10 ) AND tr.is_active=1 $param_id_penjamin ORDER BY pj.nama ASC; ";
        return $sql;
    }

    function getListLaporanKeuangan_JenLay($search, $id_dokter, $id_penjamin)
    {
        $param = "";
        if ($search["periode_laporan"] === "Harian") {
            if ($search["tanggal_harian"] !== "") :
                $param .= " AND to_char(lp.tanggal_layanan, 'yyyy-mm-dd' ) = '" . date2mysql($search['tanggal_harian']) . "' ";
            endif;
        } elseif ($search["periode_laporan"] === "Bulanan" & $search["bulan"] !== "" & $search["tahun"] !== "") {
            $param .= " AND to_char(lp.tanggal_layanan, 'YYYY-MM'::text) = '" . $search["tahun"] . "-" . $search["bulan"] . "' ";
        } elseif ($search["periode_laporan"] === "Rentang Waktu" & $search["tanggal_awal"] !== "" & $search["tanggal_akhir"] !== "") {
            if ($search["tanggal_awal"] !== "" & $search["tanggal_akhir"] !== "") :
                $param .= " AND lp.tanggal_layanan BETWEEN '" . date2mysql($search['tanggal_awal']) . " 00:00:00' AND '" . date2mysql($search['tanggal_akhir']) . " 23:59:59'";
            endif;
        }

        $sql = " SELECT DISTINCT lp.jenis_layanan, pd.id_penjamin FROM sm_pendaftaran pd
                JOIN sm_layanan_pendaftaran lp on pd.id=lp.id_pendaftaran
                WHERE lp.status_terlayani <> 'Batal' $param AND lp.id_dokter=" . $id_dokter . " AND pd.id_penjamin=" . $id_penjamin;
        return $sql;
    }

    function getListLaporanKeuangan_Poliklinik($jenis_dokter, $search, $id_dokter, $id_penjamin, $JenLay)
    {
        $param = "";
        if ($search["periode_laporan"] === "Harian") {
            if ($search["tanggal_harian"] !== "") :
                $param .= " AND to_char(lp.tanggal_layanan, 'yyyy-mm-dd' ) = '" . date2mysql($search['tanggal_harian']) . "' ";
            endif;
        } elseif ($search["periode_laporan"] === "Bulanan" & $search["bulan"] !== "" & $search["tahun"] !== "") {
            $param .= " AND to_char(lp.tanggal_layanan, 'YYYY-MM'::text) = '" . $search["tahun"] . "-" . $search["bulan"] . "' ";
        } elseif ($search["periode_laporan"] === "Rentang Waktu" & $search["tanggal_awal"] !== "" & $search["tanggal_akhir"] !== "") {
            if ($search["tanggal_awal"] !== "" & $search["tanggal_akhir"] !== "") :
                $param .= " AND lp.tanggal_layanan BETWEEN '" . date2mysql($search['tanggal_awal']) . " 00:00:00' AND '" . date2mysql($search['tanggal_akhir']) . " 23:59:59'";
            endif;
        }

        if ($jenis_dokter == 'dpjp') {
            $setDokter = " AND lp.id_dokter=" . $id_dokter . " AND lp.id_dokter=ttp.id_operator ";
        } else {
            $setDokter = " AND ttp.id_operator=" . $id_dokter . " AND lp.id_dokter<>ttp.id_operator ";
        }

        $sql = " SELECT count(id) jml, COALESCE(round(SUM(total)),0) total FROM (
                SELECT pd.id, sum(ttp.total) total FROM sm_pendaftaran pd
                JOIN sm_layanan_pendaftaran lp on pd.id=lp.id_pendaftaran
                LEFT JOIN sm_tarif_tindakan_pasien ttp ON lp.id=ttp.id_layanan_pendaftaran
                WHERE lp.status_terlayani <> 'Batal' $param $setDokter  AND pd.id_penjamin=" . $id_penjamin . " AND lp.jenis_layanan='" . $JenLay . "'
                GROUP BY pd.id ) z ";
        return $sql;
    }

    function getListLaporanKeuangan_Resep($jenis_dokter, $search, $id_dokter, $id_penjamin)
    {
        $param = "";
        if ($search["periode_laporan"] === "Harian") {
            if ($search["tanggal_harian"] !== "") :
                $param .= " AND to_char(lp.tanggal_layanan, 'yyyy-mm-dd' ) = '" . date2mysql($search['tanggal_harian']) . "' ";
            endif;
        } elseif ($search["periode_laporan"] === "Bulanan" & $search["bulan"] !== "" & $search["tahun"] !== "") {
            $param .= " AND to_char(lp.tanggal_layanan, 'YYYY-MM'::text) = '" . $search["tahun"] . "-" . $search["bulan"] . "' ";
        } elseif ($search["periode_laporan"] === "Rentang Waktu" & $search["tanggal_awal"] !== "" & $search["tanggal_akhir"] !== "") {
            if ($search["tanggal_awal"] !== "" & $search["tanggal_akhir"] !== "") :
                $param .= " AND lp.tanggal_layanan BETWEEN '" . date2mysql($search['tanggal_awal']) . " 00:00:00' AND '" . date2mysql($search['tanggal_akhir']) . " 23:59:59'";
            endif;
        }

        if ($jenis_dokter == 'dpjp') {
            $setDokter = " AND lp.id_dokter=" . $id_dokter . " AND lp.id_dokter=resep.id_dokter ";
        } else {
            $setDokter = " AND resep.id_dokter=" . $id_dokter . " AND lp.id_dokter<>resep.id_dokter ";
        }

        $sql = " SELECT COALESCE(round(SUM(resep.total)),0) total 
                FROM sm_pendaftaran pd
                JOIN sm_layanan_pendaftaran lp ON pd.ID = lp.id_pendaftaran
                LEFT JOIN (SELECT rs.id_dokter, pnj.total, pnj.id_layanan_pendaftaran, pnj.jenis FROM sm_penjualan pnj JOIN sm_resep rs ON pnj.id_resep=rs.id ) resep ON lp.id=resep.id_layanan_pendaftaran
                WHERE lp.status_terlayani <> 'Batal' 
                AND resep.jenis='Resep' AND resep.total<>'NaN'               
                $param  $setDokter AND pd.id_penjamin=" . $id_penjamin . " ";
        return $sql;
    }

    function getListLaporanKeuangan_Bhp($jenis_dokter, $search, $id_dokter, $id_penjamin)
    {
        $param = "";
        if ($search["periode_laporan"] === "Harian") {
            if ($search["tanggal_harian"] !== "") :
                $param .= " AND to_char(lp.tanggal_layanan, 'yyyy-mm-dd' ) = '" . date2mysql($search['tanggal_harian']) . "' ";
            endif;
        } elseif ($search["periode_laporan"] === "Bulanan" & $search["bulan"] !== "" & $search["tahun"] !== "") {
            $param .= " AND to_char(lp.tanggal_layanan, 'YYYY-MM'::text) = '" . $search["tahun"] . "-" . $search["bulan"] . "' ";
        } elseif ($search["periode_laporan"] === "Rentang Waktu" & $search["tanggal_awal"] !== "" & $search["tanggal_akhir"] !== "") {
            if ($search["tanggal_awal"] !== "" & $search["tanggal_akhir"] !== "") :
                $param .= " AND lp.tanggal_layanan BETWEEN '" . date2mysql($search['tanggal_awal']) . " 00:00:00' AND '" . date2mysql($search['tanggal_akhir']) . " 23:59:59'";
            endif;
        }

        if ($jenis_dokter == 'dpjp') {
            $setDokter = "AND lp.id_dokter = " . $id_dokter;
        } else {
            $setDokter = "AND lp.id_dokter <> " . $id_dokter . "";
        }

        $sql = " SELECT COALESCE(round(SUM(pjual.total)),0) total 
                FROM sm_pendaftaran pd
                JOIN sm_layanan_pendaftaran lp ON pd.ID = lp.id_pendaftaran
                JOIN sm_penjualan pjual ON lp.id=pjual.id_layanan_pendaftaran AND pjual.jenis='BHP'
                WHERE lp.status_terlayani <> 'Batal' 
                $param $setDokter AND pd.id_penjamin = " . $id_penjamin . " ";
        return $sql;
    }

    ////////////////////////////////////////////////////////////////////////////

    function getListLaporanKeuangan02_Dokter($search)
    {
        $param = "";
        if ($search["periode_laporan"] === "Harian") {
            if ($search["tanggal_harian"] !== "") :
                $param .= " AND to_char(lp.tanggal_layanan, 'yyyy-mm-dd' ) = '" . date2mysql($search['tanggal_harian']) . "' ";
            endif;
        } elseif ($search["periode_laporan"] === "Bulanan" & $search["bulan"] !== "" & $search["tahun"] !== "") {
            $param .= " AND to_char(lp.tanggal_layanan, 'YYYY-MM'::text) = '" . $search["tahun"] . "-" . $search["bulan"] . "' ";
        } elseif ($search["periode_laporan"] === "Rentang Waktu" & $search["tanggal_awal"] !== "" & $search["tanggal_akhir"] !== "") {
            if ($search["tanggal_awal"] !== "" & $search["tanggal_akhir"] !== "") :
                $param .= " AND lp.tanggal_layanan BETWEEN '" . date2mysql($search['tanggal_awal']) . " 00:00:00' AND '" . date2mysql($search['tanggal_akhir']) . " 23:59:59'";
            endif;
        }

        $param_id_dokter = "";
        if ($search["id_dokter"] !== "") {
            $param_id_dokter  = " AND tm.ID=" . $search["id_dokter"];
        }

        $sql = " SELECT DISTINCT pg.id, tm.id id_tenaga_medis, pg.nama
                FROM sm_tenaga_medis tm 
                JOIN sm_pegawai pg ON tm.id_pegawai = pg.id 
                JOIN sm_translucent tr ON pg.id=tr.id 
                JOIN (
                    SELECT DISTINCT tm.id id_tenaga_medis, pj.id id_penjamin
                    FROM sm_tenaga_medis tm 
                    JOIN sm_tarif_tindakan_pasien ttp ON tm.id=ttp.id_operator
                    JOIN sm_layanan_pendaftaran lp ON ttp.id_layanan_pendaftaran = lp.id
                    JOIN sm_penjamin pj ON lp.id_penjamin=pj.id
                    WHERE tm.id_profesi IN ( 8, 10 ) AND lp.id_dokter<>tm.id $param
                        UNION
                    SELECT DISTINCT tm.id id_tenaga_medis, pj.id id_penjamin
                    FROM sm_tenaga_medis tm 
                    JOIN (SELECT rs.id_dokter,pnj.id_layanan_pendaftaran FROM sm_penjualan pnj JOIN sm_resep rs ON pnj.id_resep=rs.id ) resep ON tm.id=resep.id_dokter
                    JOIN sm_layanan_pendaftaran lp ON resep.id_layanan_pendaftaran = lp.id
                    JOIN sm_penjamin pj ON lp.id_penjamin=pj.id
                    WHERE tm.id_profesi IN ( 8, 10 ) AND lp.id_dokter<>resep.id_dokter $param
                ) kunj ON tm.id= kunj.id_tenaga_medis
                JOIN sm_penjamin pj ON kunj.id_penjamin=pj.id
                WHERE tm.id_profesi IN ( 8, 10 ) AND tr.is_active=1 $param_id_dokter ORDER BY pg.nama ASC; ";
        return $sql;
    }

    function getListLaporanKeuangan02_Penjamin($search, $id_dokter)
    {
        $param = "";
        if ($search["periode_laporan"] === "Harian") {
            if ($search["tanggal_harian"] !== "") :
                $param .= " AND to_char(lp.tanggal_layanan, 'yyyy-mm-dd' ) = '" . date2mysql($search['tanggal_harian']) . "' ";
            endif;
        } elseif ($search["periode_laporan"] === "Bulanan" & $search["bulan"] !== "" & $search["tahun"] !== "") {
            $param .= " AND to_char(lp.tanggal_layanan, 'YYYY-MM'::text) = '" . $search["tahun"] . "-" . $search["bulan"] . "' ";
        } elseif ($search["periode_laporan"] === "Rentang Waktu" & $search["tanggal_awal"] !== "" & $search["tanggal_akhir"] !== "") {
            if ($search["tanggal_awal"] !== "" & $search["tanggal_akhir"] !== "") :
                $param .= " AND lp.tanggal_layanan BETWEEN '" . date2mysql($search['tanggal_awal']) . " 00:00:00' AND '" . date2mysql($search['tanggal_akhir']) . " 23:59:59'";
            endif;
        }

        $param_id_penjamin = "";
        if ($search["jenis_jaminan"] !== "") {
            $param_id_penjamin  = " AND pd.id_penjamin=" . $search["jenis_jaminan"];
        }

        $sql = " SELECT DISTINCT pj.id id_penjamin, pj.nama penjamin
                FROM sm_tenaga_medis tm 
                JOIN sm_pegawai pg ON tm.id_pegawai = pg.id 
                JOIN sm_translucent tr ON pg.id=tr.id 
                JOIN (
                    SELECT DISTINCT tm.id id_tenaga_medis, pj.id id_penjamin
                    FROM sm_tenaga_medis tm 
                    JOIN sm_tarif_tindakan_pasien ttp ON tm.id=ttp.id_operator
                    JOIN sm_layanan_pendaftaran lp ON ttp.id_layanan_pendaftaran = lp.id
                    JOIN sm_penjamin pj ON lp.id_penjamin=pj.id
                    WHERE tm.id_profesi IN ( 8, 10 ) AND lp.id_dokter<>tm.id AND lp.id_dokter = $id_dokter $param
                        UNION
                    SELECT DISTINCT tm.id id_tenaga_medis, pj.id id_penjamin
                    FROM sm_tenaga_medis tm 
                    JOIN (SELECT rs.id_dokter,pnj.id_layanan_pendaftaran FROM sm_penjualan pnj JOIN sm_resep rs ON pnj.id_resep=rs.id ) resep ON tm.id=resep.id_dokter
                    JOIN sm_layanan_pendaftaran lp ON resep.id_layanan_pendaftaran = lp.id
                    JOIN sm_penjamin pj ON lp.id_penjamin=pj.id
                    WHERE tm.id_profesi IN ( 8, 10 ) AND lp.id_dokter<>resep.id_dokter AND lp.id_dokter = $id_dokter $param
                ) kunj ON tm.id= kunj.id_tenaga_medis                
                JOIN sm_penjamin pj ON kunj.id_penjamin=pj.id
                WHERE tm.id_profesi IN ( 8, 10 ) AND tr.is_active=1 $param_id_penjamin ORDER BY pj.nama ASC; ";
        return $sql;
    }

    ////////////////////////////////////////////////////////////////////////////

    function getListLaporanKeuangan03_Dokter($search)
    {
        $param = "";
        if ($search["periode_laporan"] === "Harian") {
            if ($search["tanggal_harian"] !== "") :
                $param .= " AND to_char(lp.tanggal_layanan, 'yyyy-mm-dd' ) = '" . date2mysql($search['tanggal_harian']) . "' ";
            endif;
        } elseif ($search["periode_laporan"] === "Bulanan" & $search["bulan"] !== "" & $search["tahun"] !== "") {
            $param .= " AND to_char(lp.tanggal_layanan, 'YYYY-MM'::text) = '" . $search["tahun"] . "-" . $search["bulan"] . "' ";
        } elseif ($search["periode_laporan"] === "Rentang Waktu" & $search["tanggal_awal"] !== "" & $search["tanggal_akhir"] !== "") {
            if ($search["tanggal_awal"] !== "" & $search["tanggal_akhir"] !== "") :
                $param .= " AND lp.tanggal_layanan BETWEEN '" . date2mysql($search['tanggal_awal']) . " 00:00:00' AND '" . date2mysql($search['tanggal_akhir']) . " 23:59:59'";
            endif;
        }

        $param_id_dokter = "";
        if ($search["id_dokter"] !== "") {
            $param_id_dokter  = " AND tm.ID=" . $search["id_dokter"];
        }

        $sql = " SELECT DISTINCT pg.id, tm.id id_tenaga_medis, pg.nama
                FROM sm_tenaga_medis tm 
                JOIN sm_pegawai pg ON tm.id_pegawai = pg.id 
                JOIN sm_translucent tr ON pg.id=tr.id 
                JOIN (
                    SELECT DISTINCT tm.id id_tenaga_medis, pj.id id_penjamin
                    FROM sm_tenaga_medis tm 
                    JOIN sm_tarif_tindakan_pasien ttp ON tm.id=ttp.id_operator
                    JOIN sm_layanan_pendaftaran lp ON ttp.id_layanan_pendaftaran = lp.id
                    JOIN sm_penjamin pj ON lp.id_penjamin=pj.id
                    WHERE tm.id_profesi NOT IN ( 8, 10 ) AND lp.id_dokter<>tm.id $param
                        UNION
                    SELECT DISTINCT tm.id id_tenaga_medis, pj.id id_penjamin
                    FROM sm_tenaga_medis tm 
                    JOIN (SELECT rs.id_dokter,pnj.id_layanan_pendaftaran FROM sm_penjualan pnj JOIN sm_resep rs ON pnj.id_resep=rs.id ) resep ON tm.id=resep.id_dokter
                    JOIN sm_layanan_pendaftaran lp ON resep.id_layanan_pendaftaran = lp.id
                    JOIN sm_penjamin pj ON lp.id_penjamin=pj.id
                    WHERE tm.id_profesi NOT IN ( 8, 10 ) AND lp.id_dokter<>resep.id_dokter $param
                ) kunj ON tm.id= kunj.id_tenaga_medis
                JOIN sm_penjamin pj ON kunj.id_penjamin=pj.id
                WHERE tm.id_profesi NOT IN ( 8, 10 ) AND tr.is_active=1 $param_id_dokter ORDER BY pg.nama ASC; ";
        return $sql;
    }

    function getListLaporanKeuangan03_Penjamin($search, $id_dokter)
    {
        $param = "";
        if ($search["periode_laporan"] === "Harian") {
            if ($search["tanggal_harian"] !== "") :
                $param .= " AND to_char(lp.tanggal_layanan, 'yyyy-mm-dd' ) = '" . date2mysql($search['tanggal_harian']) . "' ";
            endif;
        } elseif ($search["periode_laporan"] === "Bulanan" & $search["bulan"] !== "" & $search["tahun"] !== "") {
            $param .= " AND to_char(lp.tanggal_layanan, 'YYYY-MM'::text) = '" . $search["tahun"] . "-" . $search["bulan"] . "' ";
        } elseif ($search["periode_laporan"] === "Rentang Waktu" & $search["tanggal_awal"] !== "" & $search["tanggal_akhir"] !== "") {
            if ($search["tanggal_awal"] !== "" & $search["tanggal_akhir"] !== "") :
                $param .= " AND lp.tanggal_layanan BETWEEN '" . date2mysql($search['tanggal_awal']) . " 00:00:00' AND '" . date2mysql($search['tanggal_akhir']) . " 23:59:59'";
            endif;
        }

        $param_id_penjamin = "";
        if ($search["jenis_jaminan"] !== "") {
            $param_id_penjamin  = " AND pd.id_penjamin=" . $search["jenis_jaminan"];
        }

        $sql = " SELECT DISTINCT pj.id id_penjamin, pj.nama penjamin
                FROM sm_tenaga_medis tm 
                JOIN sm_pegawai pg ON tm.id_pegawai = pg.id 
                JOIN sm_translucent tr ON pg.id=tr.id 
                JOIN (
                    SELECT DISTINCT tm.id id_tenaga_medis, pj.id id_penjamin
                    FROM sm_tenaga_medis tm 
                    JOIN sm_tarif_tindakan_pasien ttp ON tm.id=ttp.id_operator
                    JOIN sm_layanan_pendaftaran lp ON ttp.id_layanan_pendaftaran = lp.id
                    JOIN sm_penjamin pj ON lp.id_penjamin=pj.id
                    WHERE tm.id_profesi NOT IN ( 8, 10 ) AND lp.id_dokter<>tm.id AND lp.id_dokter = $id_dokter $param
                        UNION
                    SELECT DISTINCT tm.id id_tenaga_medis, pj.id id_penjamin
                    FROM sm_tenaga_medis tm 
                    JOIN (SELECT rs.id_dokter,pnj.id_layanan_pendaftaran FROM sm_penjualan pnj JOIN sm_resep rs ON pnj.id_resep=rs.id ) resep ON tm.id=resep.id_dokter
                    JOIN sm_layanan_pendaftaran lp ON resep.id_layanan_pendaftaran = lp.id
                    JOIN sm_penjamin pj ON lp.id_penjamin=pj.id
                    WHERE tm.id_profesi NOT IN ( 8, 10 ) AND lp.id_dokter<>resep.id_dokter AND lp.id_dokter = $id_dokter $param
                ) kunj ON tm.id= kunj.id_tenaga_medis                
                JOIN sm_penjamin pj ON kunj.id_penjamin=pj.id
                WHERE tm.id_profesi NOT IN ( 8, 10 ) AND tr.is_active=1 $param_id_penjamin ORDER BY pj.nama ASC; ";
        return $sql;
    }

    // ===== START Laporan 04 Laborarotium =====
    function getListLaporanKeuangan04_DokterLab($search)
    {
        $param_date_lab = "";
        if ($search["periode_laporan"] === "Harian") {
            if ($search["tanggal_harian"] !== "") :
                $param_date_lab .= " AND to_char(lab.waktu_konfirm, 'yyyy-mm-dd' ) = '" . date2mysql($search['tanggal_harian']) . "' ";
            endif;
        } elseif ($search["periode_laporan"] === "Bulanan" & $search["bulan"] !== "" & $search["tahun"] !== "") {
            $param_date_lab .= " AND to_char(lab.waktu_konfirm, 'YYYY-MM'::text) = '" . $search["tahun"] . "-" . $search["bulan"] . "' ";
        } elseif ($search["periode_laporan"] === "Rentang Waktu" & $search["tanggal_awal"] !== "" & $search["tanggal_akhir"] !== "") {
            if ($search["tanggal_awal"] !== "" & $search["tanggal_akhir"] !== "") :
                $param_date_lab .= " AND lab.waktu_konfirm BETWEEN '" . date2mysql($search['tanggal_awal']) . " 00:00:00' AND '" . date2mysql($search['tanggal_akhir']) . " 23:59:59'";
            endif;
        }

        $param_id_dokter = "";
        if ($search["id_dokter"] !== "") {
            $param_id_dokter  = " AND tm.ID=" . $search["id_dokter"];
        }

        $sql = " SELECT DISTINCT pg.id, lab.id_dokter_pjwb id_tenaga_medis, pg.nama 
                FROM sm_pendaftaran pd
                JOIN sm_layanan_pendaftaran lp on pd.id=lp.id_pendaftaran
                JOIN sm_laboratorium lab ON lp.id=lab.id_layanan_pendaftaran
                JOIN sm_detail_laboratorium dlab ON lab.id=dlab.id_laboratorium
                JOIN sm_tenaga_medis tm ON lab.id_dokter_pjwb=tm.id
                JOIN sm_pegawai pg ON tm.id_pegawai=pg.id
                WHERE lp.status_terlayani <> 'Batal' $param_date_lab $param_id_dokter 
                GROUP BY lab.id_dokter_pjwb,pg.ID
                ORDER BY pg.nama  ASC ";
        return $sql;
    }

    function getListLaporanKeuangan04_PenjaminLab($search, $id_dokter)
    {
        $param_date_lab = "";
        if ($search["periode_laporan"] === "Harian") {
            if ($search["tanggal_harian"] !== "") :
                $param_date_lab .= " AND to_char(lab.waktu_konfirm, 'yyyy-mm-dd' ) = '" . date2mysql($search['tanggal_harian']) . "' ";
            endif;
        } elseif ($search["periode_laporan"] === "Bulanan" & $search["bulan"] !== "" & $search["tahun"] !== "") {
            $param_date_lab .= " AND to_char(lab.waktu_konfirm, 'YYYY-MM'::text) = '" . $search["tahun"] . "-" . $search["bulan"] . "' ";
        } elseif ($search["periode_laporan"] === "Rentang Waktu" & $search["tanggal_awal"] !== "" & $search["tanggal_akhir"] !== "") {
            if ($search["tanggal_awal"] !== "" & $search["tanggal_akhir"] !== "") :
                $param_date_lab .= " AND lab.waktu_konfirm BETWEEN '" . date2mysql($search['tanggal_awal']) . " 00:00:00' AND '" . date2mysql($search['tanggal_akhir']) . " 23:59:59'";
            endif;
        }

        $param_id_penjamin = "";
        if ($search["jenis_jaminan"] !== "") {
            $param_id_penjamin  = " AND pd.id_penjamin=" . $search["jenis_jaminan"];
        }

        $sql = " SELECT pj.id id_penjamin, pj.nama penjamin
                FROM sm_pendaftaran pd
                JOIN sm_layanan_pendaftaran lp on pd.id=lp.id_pendaftaran 
                JOIN sm_penjamin pj on pd.id_penjamin=pj.id
                JOIN sm_laboratorium lab ON lp.id=lab.id_layanan_pendaftaran
                JOIN sm_detail_laboratorium dlab ON lab.id=dlab.id_laboratorium
                WHERE lp.status_terlayani <> 'Batal' AND lab.id_dokter_pjwb=$id_dokter $param_date_lab $param_id_penjamin 
                GROUP BY pj.id ";
        return $sql;
    }

    function getListLaporanKeuangan04_Lab($search, $id_dokter, $id_penjamin)
    {
        $param = "";
        if ($search["periode_laporan"] === "Harian") {
            if ($search["tanggal_harian"] !== "") :
                $param .= " AND to_char(lab.waktu_konfirm, 'yyyy-mm-dd' ) = '" . date2mysql($search['tanggal_harian']) . "' ";
            endif;
        } elseif ($search["periode_laporan"] === "Bulanan" & $search["bulan"] !== "" & $search["tahun"] !== "") {
            $param .= " AND to_char(lab.waktu_konfirm, 'YYYY-MM'::text) = '" . $search["tahun"] . "-" . $search["bulan"] . "' ";
        } elseif ($search["periode_laporan"] === "Rentang Waktu" & $search["tanggal_awal"] !== "" & $search["tanggal_akhir"] !== "") {
            if ($search["tanggal_awal"] !== "" & $search["tanggal_akhir"] !== "") :
                $param .= " AND lab.waktu_konfirm BETWEEN '" . date2mysql($search['tanggal_awal']) . " 00:00:00' AND '" . date2mysql($search['tanggal_akhir']) . " 23:59:59'";
            endif;
        }

        $sql = " SELECT id_dokter, id_penjamin, count(id) jml, COALESCE(round(SUM(total)),0) total FROM (
                SELECT lab.id_dokter_pjwb id_dokter, pd.id_penjamin, pd.id, sum(dlab.total) total FROM sm_pendaftaran pd
                JOIN sm_layanan_pendaftaran lp on pd.id=lp.id_pendaftaran
                JOIN sm_penjamin pj on pd.id_penjamin=pj.id
                JOIN sm_laboratorium lab ON lp.id=lab.id_layanan_pendaftaran
                JOIN sm_detail_laboratorium dlab ON lab.id=dlab.id_laboratorium
                WHERE lp.status_terlayani <> 'Batal' $param AND lab.id_dokter_pjwb=$id_dokter AND pd.id_penjamin=$id_penjamin
                GROUP BY pd.id,lab.id_dokter_pjwb ) z GROUP BY id_dokter, id_penjamin ";
        return $sql;
    }
    // ===== END Laporan 04 Laborarotium =====



    // ===== START Laporan 04 Radiologi =====
    function getListLaporanKeuangan04_DokterRad($search)
    {
        $param_date_rad = "";
        if ($search["periode_laporan"] === "Harian") {
            if ($search["tanggal_harian"] !== "") :
                $param_date_rad .= " AND to_char(rad.waktu_konfirm, 'yyyy-mm-dd' ) = '" . date2mysql($search['tanggal_harian']) . "' ";
            endif;
        } elseif ($search["periode_laporan"] === "Bulanan" & $search["bulan"] !== "" & $search["tahun"] !== "") {
            $param_date_rad .= " AND to_char(rad.waktu_konfirm, 'YYYY-MM'::text) = '" . $search["tahun"] . "-" . $search["bulan"] . "' ";
        } elseif ($search["periode_laporan"] === "Rentang Waktu" & $search["tanggal_awal"] !== "" & $search["tanggal_akhir"] !== "") {
            if ($search["tanggal_awal"] !== "" & $search["tanggal_akhir"] !== "") :
                $param_date_rad .= " AND rad.waktu_konfirm BETWEEN '" . date2mysql($search['tanggal_awal']) . " 00:00:00' AND '" . date2mysql($search['tanggal_akhir']) . " 23:59:59'";
            endif;
        }

        $param_id_dokter = "";
        if ($search["id_dokter"] !== "") {
            $param_id_dokter  = " AND tm.ID=" . $search["id_dokter"];
        }

        $sql = " SELECT DISTINCT pg.id, rad.id_dokter_pjwb id_tenaga_medis, pg.nama 
                FROM sm_pendaftaran pd
                JOIN sm_layanan_pendaftaran lp on pd.id=lp.id_pendaftaran 
                JOIN sm_radiologi rad ON lp.id=rad.id_layanan_pendaftaran
                JOIN sm_detail_radiologi drad ON rad.id=drad.id_radiologi
                JOIN sm_tenaga_medis tm ON rad.id_dokter_pjwb=tm.id
                JOIN sm_pegawai pg ON tm.id_pegawai=pg.id
                WHERE lp.status_terlayani <> 'Batal' $param_date_rad $param_id_dokter
                GROUP BY rad.id_dokter_pjwb,pg.ID
                ORDER BY pg.nama  ASC ";
        return $sql;
    }

    function getListLaporanKeuangan04_PenjaminRad($search, $id_dokter)
    {
        $param_date_rad = "";
        if ($search["periode_laporan"] === "Harian") {
            if ($search["tanggal_harian"] !== "") :
                $param_date_rad .= " AND to_char(rad.waktu_konfirm, 'yyyy-mm-dd' ) = '" . date2mysql($search['tanggal_harian']) . "' ";
            endif;
        } elseif ($search["periode_laporan"] === "Bulanan" & $search["bulan"] !== "" & $search["tahun"] !== "") {
            $param_date_rad .= " AND to_char(rad.waktu_konfirm, 'YYYY-MM'::text) = '" . $search["tahun"] . "-" . $search["bulan"] . "' ";
        } elseif ($search["periode_laporan"] === "Rentang Waktu" & $search["tanggal_awal"] !== "" & $search["tanggal_akhir"] !== "") {
            if ($search["tanggal_awal"] !== "" & $search["tanggal_akhir"] !== "") :
                $param_date_rad .= " AND rad.waktu_konfirm BETWEEN '" . date2mysql($search['tanggal_awal']) . " 00:00:00' AND '" . date2mysql($search['tanggal_akhir']) . " 23:59:59'";
            endif;
        }

        $param_id_penjamin = "";
        if ($search["jenis_jaminan"] !== "") {
            $param_id_penjamin  = " AND pd.id_penjamin=" . $search["jenis_jaminan"];
        }

        $sql = " SELECT pj.id id_penjamin, pj.nama penjamin
                FROM sm_pendaftaran pd
                JOIN sm_layanan_pendaftaran lp on pd.id=lp.id_pendaftaran 
                JOIN sm_penjamin pj on pd.id_penjamin=pj.id
                JOIN sm_radiologi rad ON lp.id=rad.id_layanan_pendaftaran
                JOIN sm_detail_radiologi drad ON rad.id=drad.id_radiologi
                WHERE lp.status_terlayani <> 'Batal' AND rad.id_dokter_pjwb=$id_dokter $param_date_rad $param_id_penjamin 
                GROUP BY pj.id ";
        return $sql;
    }

    function getListLaporanKeuangan04_Rad($search, $id_dokter, $id_penjamin)
    {
        $param = "";
        if ($search["periode_laporan"] === "Harian") {
            if ($search["tanggal_harian"] !== "") :
                $param .= " AND to_char(rad.waktu_konfirm, 'yyyy-mm-dd' ) = '" . date2mysql($search['tanggal_harian']) . "' ";
            endif;
        } elseif ($search["periode_laporan"] === "Bulanan" & $search["bulan"] !== "" & $search["tahun"] !== "") {
            $param .= " AND to_char(rad.waktu_konfirm, 'YYYY-MM'::text) = '" . $search["tahun"] . "-" . $search["bulan"] . "' ";
        } elseif ($search["periode_laporan"] === "Rentang Waktu" & $search["tanggal_awal"] !== "" & $search["tanggal_akhir"] !== "") {
            if ($search["tanggal_awal"] !== "" & $search["tanggal_akhir"] !== "") :
                $param .= " AND rad.waktu_konfirm BETWEEN '" . date2mysql($search['tanggal_awal']) . " 00:00:00' AND '" . date2mysql($search['tanggal_akhir']) . " 23:59:59'";
            endif;
        }

        $sql = " SELECT id_dokter, id_penjamin, count(id) jml, COALESCE(round(SUM(total)),0) total FROM (
                SELECT rad.id_dokter_pjwb id_dokter, pd.id_penjamin, pd.id, sum(drad.total) total FROM sm_pendaftaran pd
                JOIN sm_layanan_pendaftaran lp on pd.id=lp.id_pendaftaran
                JOIN sm_penjamin pj on pd.id_penjamin=pj.id
                JOIN sm_radiologi rad ON lp.id=rad.id_layanan_pendaftaran
                JOIN sm_detail_radiologi drad ON rad.id=drad.id_radiologi
                WHERE lp.status_terlayani <> 'Batal' $param AND rad.id_dokter_pjwb=$id_dokter AND pd.id_penjamin=$id_penjamin
                GROUP BY pd.id,rad.id_dokter_pjwb ) z GROUP BY id_dokter, id_penjamin ";
        return $sql;
    }
    // ===== END Laporan 04 Radiologi =====


    // ===== START Laporan 04 OK =====
    function getListLaporanKeuangan04_DokterOk($search)
    {
        $param_date = "";
        if ($search["periode_laporan"] === "Harian") {
            if ($search["tanggal_harian"] !== "") :
                $param_date .= " AND to_char(op.waktu, 'yyyy-mm-dd' ) = '" . date2mysql($search['tanggal_harian']) . "' ";
            endif;
        } elseif ($search["periode_laporan"] === "Bulanan" & $search["bulan"] !== "" & $search["tahun"] !== "") {
            $param_date .= " AND to_char(op.waktu, 'YYYY-MM'::text) = '" . $search["tahun"] . "-" . $search["bulan"] . "' ";
        } elseif ($search["periode_laporan"] === "Rentang Waktu" & $search["tanggal_awal"] !== "" & $search["tanggal_akhir"] !== "") {
            if ($search["tanggal_awal"] !== "" & $search["tanggal_akhir"] !== "") :
                $param_date .= " AND op.waktu BETWEEN '" . date2mysql($search['tanggal_awal']) . " 00:00:00' AND '" . date2mysql($search['tanggal_akhir']) . " 23:59:59'";
            endif;
        }

        $param_id_dokter = "";
        if ($search["id_dokter"] !== "") {
            $param_id_dokter  = " AND tm.ID=" . $search["id_dokter"];
        }

        $sql = " SELECT DISTINCT pg.id, op.id_nadis id_tenaga_medis, pg.nama 
                FROM sm_pendaftaran pd
                JOIN sm_layanan_pendaftaran lp on pd.id=lp.id_pendaftaran 
                JOIN sm_jadwal_kamar_operasi ko on lp.id=ko.id_layanan_pendaftaran
                JOIN sm_tarif_operasi op on ko.id=op.id_operasi
                JOIN sm_tenaga_medis tm ON op.id_nadis=tm.id
                JOIN sm_pegawai pg ON tm.id_pegawai=pg.id
                WHERE lp.status_terlayani <> 'Batal' AND ko.status='Confirmed' AND ko.layanan='OK' $param_date $param_id_dokter
                GROUP BY op.id_nadis,pg.ID
                ORDER BY pg.nama  ASC ";
        return $sql;
    }

    function getListLaporanKeuangan04_PenjaminOk($search, $id_dokter)
    {
        $param_date = "";
        if ($search["periode_laporan"] === "Harian") {
            if ($search["tanggal_harian"] !== "") :
                $param_date .= " AND to_char(op.waktu, 'yyyy-mm-dd' ) = '" . date2mysql($search['tanggal_harian']) . "' ";
            endif;
        } elseif ($search["periode_laporan"] === "Bulanan" & $search["bulan"] !== "" & $search["tahun"] !== "") {
            $param_date .= " AND to_char(op.waktu, 'YYYY-MM'::text) = '" . $search["tahun"] . "-" . $search["bulan"] . "' ";
        } elseif ($search["periode_laporan"] === "Rentang Waktu" & $search["tanggal_awal"] !== "" & $search["tanggal_akhir"] !== "") {
            if ($search["tanggal_awal"] !== "" & $search["tanggal_akhir"] !== "") :
                $param_date .= " AND op.waktu BETWEEN '" . date2mysql($search['tanggal_awal']) . " 00:00:00' AND '" . date2mysql($search['tanggal_akhir']) . " 23:59:59'";
            endif;
        }

        $param_id_penjamin = "";
        if ($search["jenis_jaminan"] !== "") {
            $param_id_penjamin  = " AND pd.id_penjamin=" . $search["jenis_jaminan"];
        }

        $sql = " SELECT pj.id id_penjamin, pj.nama penjamin
                FROM sm_pendaftaran pd
                JOIN sm_layanan_pendaftaran lp on pd.id=lp.id_pendaftaran 
                JOIN sm_penjamin pj on pd.id_penjamin=pj.id
                JOIN sm_jadwal_kamar_operasi ko on lp.id=ko.id_layanan_pendaftaran
                JOIN sm_tarif_operasi op on ko.id=op.id_operasi
                JOIN sm_tenaga_medis tm ON op.id_nadis=tm.id
                WHERE lp.status_terlayani <> 'Batal'  AND ko.status='Confirmed' AND ko.layanan='OK' AND op.id_nadis=$id_dokter $param_date $param_id_penjamin 
                GROUP BY pj.id ";
        return $sql;
    }

    function getListLaporanKeuangan04_Ok($search, $id_dokter, $id_penjamin)
    {
        $param = "";
        if ($search["periode_laporan"] === "Harian") {
            if ($search["tanggal_harian"] !== "") :
                $param .= " AND to_char(op.waktu, 'yyyy-mm-dd' ) = '" . date2mysql($search['tanggal_harian']) . "' ";
            endif;
        } elseif ($search["periode_laporan"] === "Bulanan" & $search["bulan"] !== "" & $search["tahun"] !== "") {
            $param .= " AND to_char(op.waktu, 'YYYY-MM'::text) = '" . $search["tahun"] . "-" . $search["bulan"] . "' ";
        } elseif ($search["periode_laporan"] === "Rentang Waktu" & $search["tanggal_awal"] !== "" & $search["tanggal_akhir"] !== "") {
            if ($search["tanggal_awal"] !== "" & $search["tanggal_akhir"] !== "") :
                $param .= " AND op.waktu BETWEEN '" . date2mysql($search['tanggal_awal']) . " 00:00:00' AND '" . date2mysql($search['tanggal_akhir']) . " 23:59:59'";
            endif;
        }

        $sql = " SELECT id_dokter, id_penjamin, count(id) jml, COALESCE(round(SUM(total)),0) total FROM (
                SELECT op.id_nadis id_dokter, pd.id_penjamin, pd.id, sum(op.total) total FROM sm_pendaftaran pd
                JOIN sm_layanan_pendaftaran lp on pd.id=lp.id_pendaftaran
                JOIN sm_penjamin pj on pd.id_penjamin=pj.id
                JOIN sm_jadwal_kamar_operasi ko on lp.id=ko.id_layanan_pendaftaran
                JOIN sm_tarif_operasi op on ko.id=op.id_operasi
                WHERE lp.status_terlayani <> 'Batal' $param  AND ko.status='Confirmed' AND ko.layanan='OK' AND op.id_nadis=$id_dokter AND pd.id_penjamin=$id_penjamin
                GROUP BY pd.id,op.id_nadis ) z GROUP BY id_dokter, id_penjamin ";
        return $sql;
    }
    // ===== END Laporan 04 OK =====

    // ===== START Laporan 04 VK =====
    function getListLaporanKeuangan04_DokterVk($search)
    {
        $param_date = "";
        if ($search["periode_laporan"] === "Harian") {
            if ($search["tanggal_harian"] !== "") :
                $param_date .= " AND to_char(op.waktu, 'yyyy-mm-dd' ) = '" . date2mysql($search['tanggal_harian']) . "' ";
            endif;
        } elseif ($search["periode_laporan"] === "Bulanan" & $search["bulan"] !== "" & $search["tahun"] !== "") {
            $param_date .= " AND to_char(op.waktu, 'YYYY-MM'::text) = '" . $search["tahun"] . "-" . $search["bulan"] . "' ";
        } elseif ($search["periode_laporan"] === "Rentang Waktu" & $search["tanggal_awal"] !== "" & $search["tanggal_akhir"] !== "") {
            if ($search["tanggal_awal"] !== "" & $search["tanggal_akhir"] !== "") :
                $param_date .= " AND op.waktu BETWEEN '" . date2mysql($search['tanggal_awal']) . " 00:00:00' AND '" . date2mysql($search['tanggal_akhir']) . " 23:59:59'";
            endif;
        }

        $param_id_dokter = "";
        if ($search["id_dokter"] !== "") {
            $param_id_dokter  = " AND tm.ID=" . $search["id_dokter"];
        }

        $sql = " SELECT DISTINCT pg.id, op.id_nadis id_tenaga_medis, pg.nama 
                FROM sm_pendaftaran pd
                JOIN sm_layanan_pendaftaran lp on pd.id=lp.id_pendaftaran 
                JOIN sm_jadwal_kamar_operasi ko on lp.id=ko.id_layanan_pendaftaran
                JOIN sm_tarif_operasi op on ko.id=op.id_operasi
                JOIN sm_tenaga_medis tm ON op.id_nadis=tm.id
                JOIN sm_pegawai pg ON tm.id_pegawai=pg.id
                WHERE lp.status_terlayani <> 'Batal' AND ko.status='Confirmed' AND ko.layanan='VK' $param_date $param_id_dokter
                GROUP BY op.id_nadis,pg.ID
                ORDER BY pg.nama  ASC ";
        return $sql;
    }

    function getListLaporanKeuangan04_PenjaminVk($search, $id_dokter)
    {
        $param_date = "";
        if ($search["periode_laporan"] === "Harian") {
            if ($search["tanggal_harian"] !== "") :
                $param_date .= " AND to_char(op.waktu, 'yyyy-mm-dd' ) = '" . date2mysql($search['tanggal_harian']) . "' ";
            endif;
        } elseif ($search["periode_laporan"] === "Bulanan" & $search["bulan"] !== "" & $search["tahun"] !== "") {
            $param_date .= " AND to_char(op.waktu, 'YYYY-MM'::text) = '" . $search["tahun"] . "-" . $search["bulan"] . "' ";
        } elseif ($search["periode_laporan"] === "Rentang Waktu" & $search["tanggal_awal"] !== "" & $search["tanggal_akhir"] !== "") {
            if ($search["tanggal_awal"] !== "" & $search["tanggal_akhir"] !== "") :
                $param_date .= " AND op.waktu BETWEEN '" . date2mysql($search['tanggal_awal']) . " 00:00:00' AND '" . date2mysql($search['tanggal_akhir']) . " 23:59:59'";
            endif;
        }

        $param_id_penjamin = "";
        if ($search["jenis_jaminan"] !== "") {
            $param_id_penjamin  = " AND pd.id_penjamin=" . $search["jenis_jaminan"];
        }

        $sql = " SELECT pj.id id_penjamin, pj.nama penjamin
                FROM sm_pendaftaran pd
                JOIN sm_layanan_pendaftaran lp on pd.id=lp.id_pendaftaran 
                JOIN sm_penjamin pj on pd.id_penjamin=pj.id
                JOIN sm_jadwal_kamar_operasi ko on lp.id=ko.id_layanan_pendaftaran
                JOIN sm_tarif_operasi op on ko.id=op.id_operasi
                JOIN sm_tenaga_medis tm ON op.id_nadis=tm.id
                WHERE lp.status_terlayani <> 'Batal'  AND ko.status='Confirmed' AND ko.layanan='VK' AND op.id_nadis=$id_dokter $param_date $param_id_penjamin 
                GROUP BY pj.id ";
        return $sql;
    }

    function getListLaporanKeuangan04_Vk($search, $id_dokter, $id_penjamin)
    {
        $param = "";
        if ($search["periode_laporan"] === "Harian") {
            if ($search["tanggal_harian"] !== "") :
                $param .= " AND to_char(op.waktu, 'yyyy-mm-dd' ) = '" . date2mysql($search['tanggal_harian']) . "' ";
            endif;
        } elseif ($search["periode_laporan"] === "Bulanan" & $search["bulan"] !== "" & $search["tahun"] !== "") {
            $param .= " AND to_char(op.waktu, 'YYYY-MM'::text) = '" . $search["tahun"] . "-" . $search["bulan"] . "' ";
        } elseif ($search["periode_laporan"] === "Rentang Waktu" & $search["tanggal_awal"] !== "" & $search["tanggal_akhir"] !== "") {
            if ($search["tanggal_awal"] !== "" & $search["tanggal_akhir"] !== "") :
                $param .= " AND op.waktu BETWEEN '" . date2mysql($search['tanggal_awal']) . " 00:00:00' AND '" . date2mysql($search['tanggal_akhir']) . " 23:59:59'";
            endif;
        }

        $sql = " SELECT id_dokter, id_penjamin, count(id) jml, COALESCE(round(SUM(total)),0) total FROM (
                SELECT op.id_nadis id_dokter, pd.id_penjamin, pd.id, sum(op.total) total FROM sm_pendaftaran pd
                JOIN sm_layanan_pendaftaran lp on pd.id=lp.id_pendaftaran
                JOIN sm_penjamin pj on pd.id_penjamin=pj.id
                JOIN sm_jadwal_kamar_operasi ko on lp.id=ko.id_layanan_pendaftaran
                JOIN sm_tarif_operasi op on ko.id=op.id_operasi
                WHERE lp.status_terlayani <> 'Batal'  AND ko.status='Confirmed' AND ko.layanan='VK' $param AND op.id_nadis=$id_dokter AND pd.id_penjamin=$id_penjamin
                GROUP BY pd.id,op.id_nadis ) z GROUP BY id_dokter, id_penjamin ";
        return $sql;
    }
    // ===== END Laporan 04 VK =====

    public function getListLaporanKeuangan05($limit, $start, $search)
    {
        $param = "";

        if ($search["jenis_jaminan"] !== "") :
            $param .= " and lp.id_penjamin = '" . $search["jenis_jaminan"] . "' ";
        endif;

        if ($search["id_dokter"] !== "") :
            $param .= " and lp.id_dokter = '" . $search["id_dokter"] . "' ";
        endif;

        if ($search["kelas_rawat"] !== "") :
            $param .= " and (ra.id_kelas = '" . $search["kelas_rawat"] . "' ";
            $param .= " or ic.id_kelas = '" . $search["kelas_rawat"] . "') ";
        endif;

        if ($search["jenis_rawat"] !== "") :
            if ($search["jenis_rawat"] == "Rawat Inap") {
                $param .= " AND ra.waktu_masuk is not null ";
            } else if ($search["jenis_rawat"] == "Intensive Care") {
                $param .= " AND ic.waktu_masuk is not null ";
            }
        endif;

        if ($search["periode_laporan"] === "Harian") {
            if ($search["tanggal_harian"] !== "") :
                $param .= " and (to_char( ra.waktu_masuk, 'yyyy-mm-dd' ) ilike '%" . date2mysql($search['tanggal_harian']) . "' ";
                $param .= " or to_char( ic.waktu_masuk, 'yyyy-mm-dd' ) ilike '%" . date2mysql($search['tanggal_harian']) . "') ";
            endif;
        } elseif ($search["periode_laporan"] === "Bulanan" & $search["bulan"] !== "" & $search["tahun"] !== "") {
            $param .= " and (to_char( ra.waktu_masuk, 'mm/yyyy' ) ilike '%" . $search["bulan"] . "/" . $search["tahun"] . "' ";
            $param .= " or to_char( ic.waktu_masuk, 'mm/yyyy' ) ilike '%" . $search["bulan"] . "/" . $search["tahun"] . "') ";
        } elseif ($search["periode_laporan"] === "Rentang Waktu" & $search["tanggal_awal"] !== "" & $search["tanggal_akhir"] !== "") {
            if ($search["tanggal_awal"] !== "" & $search["tanggal_akhir"] !== "") :
                $param .= " and (ra.waktu_masuk BETWEEN '" . date2mysql($search['tanggal_awal']) . " 00:00:00' AND '" . date2mysql($search['tanggal_akhir']) . " 23:59:59'";
                $param .= " or ic.waktu_masuk BETWEEN '" . date2mysql($search['tanggal_awal']) . " 00:00:00' AND '" . date2mysql($search['tanggal_akhir']) . " 23:59:59')";
            endif;
        }

        $query      = "";
        $limitation = "";
        if ($limit !== 0) :
            $limitation = " limit " . $limit . " offset " . $start;
        endif;

        $select = "select distinct on (lp.id) pd.id,
	    pd.id_pasien,
	    p.nama AS nama_pasien,
        coalesce(ra.waktu_masuk, ic.waktu_masuk) AS waktu_masuk,
        coalesce(ra.waktu_keluar, ic.waktu_keluar) AS waktu_keluar,
        coalesce(ra.total_hari, ic.total_hari) AS total_hari,
	    concat(date_part('year'::text, age(p.tanggal_lahir::timestamp with time zone)), ' thn ', date_part('month'::text, age(p.tanggal_lahir::timestamp with time zone)), ' bln ', date_part('day'::text, age(p.tanggal_lahir::timestamp with time zone)), ' hari') AS umur,
		coalesce(kl.nama, kl2.nama) AS kelas,
	    coalesce(b2.nama, b.nama) AS bangsal,
	    pj.nama AS penjamin,
	    coalesce(pg.nama, pg2.nama) AS nama_dokter ";

        $count = "select count(*) as count from (select distinct on (lp.id) pd.* ";
        $sql   = " FROM sm_pasien p
	     JOIN sm_pendaftaran pd ON pd.id_pasien::text = p.id::text
	     LEFT JOIN sm_penjamin pj ON pj.id = pd.id_penjamin
	     LEFT JOIN sm_layanan_pendaftaran lp ON lp.id_pendaftaran = pd.id
	     LEFT JOIN sm_spesialisasi spes ON lp.id_unit_layanan = spes.id
	     LEFT JOIN sm_unit un ON un.id = lp.id_unit_layanan
	     LEFT JOIN sm_rawat_inap ra ON ra.id_layanan_pendaftaran = lp.id
	     LEFT JOIN sm_intensive_care ic ON lp.id = ic.id_layanan_pendaftaran
		 LEFT JOIN sm_kelas kl ON kl.id = ra.id_kelas
		 LEFT JOIN sm_kelas kl2 ON kl2.id = ic.id_kelas
	     LEFT JOIN sm_order_rawat_inap ori ON ori.id_pendaftaran = pd.id
	     LEFT JOIN sm_order_intensive_care orc ON orc.id_pendaftaran = pd.id
	     LEFT JOIN sm_tenaga_medis tm ON tm.id = ori.id_dokter_dpjp
	     LEFT JOIN sm_tenaga_medis tm2 ON tm2.id = orc.id_dokter_dpjp
	     LEFT JOIN sm_pegawai pg ON pg.id = tm.id_pegawai
	     LEFT JOIN sm_pegawai pg2 ON pg2.id = tm2.id_pegawai
	     LEFT JOIN sm_bangsal b ON b.id = ra.id_bangsal
	     LEFT JOIN sm_bangsal b2 ON b2.id = ic.id_bangsal
	     LEFT JOIN sm_spesialisasi sp ON sp.id = lp.id_unit_layanan
	     LEFT JOIN sm_diagnosa d ON d.id_layanan_pendaftaran = lp.id
	     LEFT JOIN sm_golongan_sebab_sakit gs ON gs.id = d.id_pengkodean
	     
	     WHERE pd.status <> 'Batal'
         AND (ra.total_hari > 0 OR ic.total_hari > 0) 
         AND pd.jenis_rawat = 'Inap' $param ";

        $order = " order by lp.id, ra.waktu_masuk ASC, ic.waktu_masuk ASC ";

        $query = $this->db->query($select . $sql . $order . $limitation)->result();

        $total_hari_sql = "SELECT SUM(COALESCE(ra.total_hari, ic.total_hari, 0)) AS total_hari 
                   FROM sm_pasien p
                   JOIN sm_pendaftaran pd ON pd.id_pasien = p.id
                   LEFT JOIN sm_layanan_pendaftaran lp ON lp.id_pendaftaran = pd.id
                   LEFT JOIN sm_rawat_inap ra ON ra.id_layanan_pendaftaran = lp.id
                   LEFT JOIN sm_intensive_care ic ON ic.id_layanan_pendaftaran = lp.id
                   WHERE pd.status <> 'Batal'
                   AND pd.jenis_rawat = 'Inap'
                   AND (ra.total_hari > 0 OR ic.total_hari > 0) $param";

        $data["data"]       = $query;
        $data["total_hari"] = $this->db->query($total_hari_sql)->row()->total_hari;
        $data["jumlah"]     = $this->db->query($count . $sql . ") as jml")->row()->count;
        // $this->db->close();

        return $data;
    }
}
