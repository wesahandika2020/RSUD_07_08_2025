<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Laporan_code_blue_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->datetime = date('Y-m-d H:i:s');
        // $this->load->model('keuangan/Keuangan_ver2_model', 'm_keuangan_ver2');
        // $this->load->model('keuangan/Keuangan_model', 'm_keuangan');

    }

    public function getPeriodeLaporan()
    {
        return array(
            'Bulanan'       => 'Bulanan',
            'Rentang Waktu' => 'Rentang Waktu',
            'Harian'        => 'Harian',
        );
    }

    public function getDokter($q, $start, $limit)
    {

        $limit = " limit " . $limit . " offset " . $start;
        $select = "select n.*,pg.id as id_pegawai, null as tindakan, pg.nama, COALESCE(s.nama , '') as spesialisasi ";
        $count = "select count(n.id) as count ";
        $sql = "from sm_tenaga_medis n
                join sm_pegawai pg on (pg.id = n.id_pegawai)
                left join sm_spesialisasi s on (s.id = n.id_spesialisasi)
                left join sm_profesi_nadis prn on (prn.id = n.id_profesi)
                where pg.nama ilike ('%$q%') and n.id is not null";

        // echo $select . $sql; die;
        // $data[''] = 'Semua Dokter / Pegawai';
        $data['data'] = $this->db->query($select . $sql . $limit)->result();
        $data['total'] = $this->db->query($count . $sql)->row()->count;
        return $data;
    }

    public function getListLaporanCodeBlue($limit, $start, $search)
    {
        $param = "";
        $query      = "";
        $limitation = "";

        $search["nama_pasien"] !== "" ? $param .= " AND p.id = '" . $search["nama_pasien"] . "' " : "";
        // $search["id_dokter"] !== "" ? $param .= " AND lp.id_dokter = '" . $search["id_dokter"] . "' " : "";

        if ($search["periode_laporan"] === "Harian") {
            if ($search["tanggal_harian"] !== "") :
                $param .= " and to_char( cb.tgl_jam_fcb, 'yyyy-mm-dd' ) ilike '%" . date2mysql($search['tanggal_harian']) . "' ";
            endif;
        } elseif ($search["periode_laporan"] === "Bulanan" & $search["bulan"] !== "" & $search["tahun"] !== "") {
            $param .= " and to_char( cb.tgl_jam_fcb, 'yyyy/mm' ) = '" . $search["tahun"] . "/" . $search["bulan"] . "' ";
        } elseif ($search["periode_laporan"] === "Rentang Waktu" & $search["tanggal_awal"] !== "" & $search["tanggal_akhir"] !== "") {
            if ($search["tanggal_awal"] !== "" & $search["tanggal_akhir"] !== "") :
                $param .= " and cb.tgl_jam_fcb BETWEEN '" . date2mysql($search['tanggal_awal']) . " 00:00:00' AND '" . date2mysql($search['tanggal_akhir']) . " 23:59:59'";
            endif;
        }

        // if ($search["jenis_pasien"] === "Rawat Inap") {
        //     $param .= " AND (lp.jenis_layanan IN ('Rawat Inap', 'Intensive Care')) ";
        // } elseif ($search["jenis_pasien"] === "Langsung") {
        //     $param .= " AND (lp.jenis_layanan IN ('Laboratorium', 'Radiologi', 'Fisioterapi')) ";
        // } elseif ($search["jenis_pasien"] === "IGD") {
        //     $param .= " AND (lp.jenis_layanan = 'IGD') ";
        // }

        // if ($search["cara_bayar"] !== "") {
        //     $param .= " AND lp.cara_bayar = '" . $search["cara_bayar"] . "' ";
        // }
        // if ($search["penjamin"] !== "") {
        //     $param .= " AND lp.id_penjamin = '" . $search["penjamin"] . "' ";
        // }

        // if ($search["ruangan_rajal"] !== "") {
        //     $param .= " AND sp.id = '" . $search['ruangan_rajal'] . "' ";
        // }

        if ($search['ruangan_ranap'] !== "") {
            $param .= " AND bg.id = '" . $search['ruangan_ranap'] . "' ";
        }

        if ($limit !== 0) {
            $limitation = " LIMIT " . $limit . " OFFSET " . $start;
        }

        $select = "SELECT p.nama as nama_pasien, p.id as no_rm, p.tanggal_lahir, p.kelamin, bg.nama as nama_bangsal, pg.nama as leader_code_blue, cb.* ";

        $sql = "FROM sm_code_blue as cb 
                JOIN sm_pendaftaran as pd on cb.id_pendaftaran = pd.id
                JOIN sm_pasien as p on p.id = pd.id_pasien 
                JOIN sm_layanan_pendaftaran as lp on cb.id_layanan_pendaftaran = lp.id 
	            LEFT JOIN sm_bangsal AS bg ON cb.bansal_fcb = bg.id 
                JOIN sm_tenaga_medis AS tm ON cb.dokter_fcb = tm.id
                JOIN sm_pegawai AS pg ON tm.id_pegawai = pg.id
                WHERE pd.id IS NOT NULL" . $param . " 
                ORDER BY cb.tgl_jam_fcb ASC ";

        // $order = " ORDER BY cb.created_date ASC ";

        $count = "SELECT COUNT(*) as count FROM (SELECT cb.* ";

        // $total_pasien = "SELECT COUNT(*) as count FROM (SELECT DISTINCT ON (pd.id) pd.* ";

        $query = $this->db->query($select . $sql . $limitation)->result();

        foreach ($query as $i => $val) {
            $query_lembar_monitoring = " SELECT * 
                                        FROM sm_lembar_monitoring
                                        WHERE id_pendaftaran = '" . $val->id_pendaftaran . "'
                                        AND id_layanan_pendaftaran = '" . $val->id_layanan_pendaftaran . "' 
                                        ORDER BY id ASC ";

            $query[$i]->lembar_monitoring = $this->db->query($query_lembar_monitoring)->result();
        }
        // var_dump($query);die;

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

        $data["periode"] = $periode;
        $data["data"]    = $query;
        // $data["jumlah_total"]  = $this->db->query($total_pasien . $sql . ") as jml")->row()->count;
        $data["jumlah"]  = $this->db->query($count . $sql . ") as jml")->row()->count;

        // var_dump($data["total_tagihan"]);die;


        $this->db->close();
        return $data;
    }

    public function getJenisPasien()
    {
        return array(
            ''              => 'Semua Pasien',
            'Langsung'      => 'Langsung',
            'Rawat Inap'    => 'Rawat Inap',
            'Rawat Jalan'   => 'Rawat Jalan',
            'IGD'           => 'IGD',
        );
    }
}
