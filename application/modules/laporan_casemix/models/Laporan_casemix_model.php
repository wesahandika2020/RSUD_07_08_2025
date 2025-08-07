<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Laporan_casemix_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->datetime = date('Y-m-d H:i:s');
        $this->load->model('keuangan/Keuangan_ver2_model', 'm_keuangan_ver2');
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
        $param_from = "";
        $query      = "";
        $limitation = "";

        $search["nama_pasien"] !== "" ? $param .= " AND p.id = '" . $search["nama_pasien"] . "' " : "";
        // $search["id_dokter"] !== "" ? $param .= " AND lp.id_dokter = '" . $search["id_dokter"] . "' " : "";

        if ($search["periode_laporan"] === "Harian") {
            if ($search["tanggal_harian"] !== "") :
                $param .= " and to_char( pd.tanggal_daftar, 'yyyy-mm-dd' ) ilike '%" . date2mysql($search['tanggal_harian']) . "' ";
            endif;
        } elseif ($search["periode_laporan"] === "Bulanan" & $search["bulan"] !== "" & $search["tahun"] !== "") {
            $param .= " and to_char( pd.tanggal_daftar, 'yyyy/mm' ) = '" . $search["tahun"] . "/" . $search["bulan"] . "' ";
        } elseif ($search["periode_laporan"] === "Rentang Waktu" & $search["tanggal_awal"] !== "" & $search["tanggal_akhir"] !== "") {
            if ($search["tanggal_awal"] !== "" & $search["tanggal_akhir"] !== "") :
                $param .= " and pd.tanggal_daftar BETWEEN '" . date2mysql($search['tanggal_awal']) . " 00:00:00' AND '" . date2mysql($search['tanggal_akhir']) . " 23:59:59'";
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
            $param_from .= " AND b.id = '" . $search['ruangan_ranap'] . "' ";
        }

        if ($limit !== 0) {
            $limitation = " LIMIT " . $limit . " OFFSET " . $start;
        }

        $select = " SELECT * ";

        $sql = "FROM (  WITH 
                diagnosa_non_manual AS (SELECT DISTINCT d.id_layanan_pendaftaran, CONCAT_WS('. ', 
                    (SELECT gss.kode_icdx_rinci FROM sm_golongan_sebab_sakit AS gss WHERE gss.id = d.id_pengkodean), 
                    (SELECT gss.kode_icdx_rinci FROM sm_golongan_sebab_sakit AS gss WHERE gss.id = d.id_pengkodean_asterik), 
                    gss.nama) AS nama 
                    FROM sm_diagnosa d
                    LEFT JOIN sm_golongan_sebab_sakit gss ON gss.id = d.id_golongan_sebab_sakit
                    WHERE d.prioritas = 'Utama' AND d.diagnosa_manual <> '1'),
                diagnosa_manual AS (SELECT DISTINCT id_layanan_pendaftaran, CONCAT_WS('. ', 
                    (SELECT gss.kode_icdx_rinci FROM sm_golongan_sebab_sakit AS gss WHERE gss.id = id_pengkodean), 
                    (SELECT gss.kode_icdx_rinci FROM sm_golongan_sebab_sakit AS gss WHERE gss.id = id_pengkodean_asterik), 
                    golongan_sebab_sakit_lain) AS nama
                    FROM sm_diagnosa
                    WHERE prioritas = 'Utama' AND diagnosa_manual = '1'),
                pasienRanap AS (
                    SELECT p.id id_pasien
                    FROM sm_pendaftaran pd
                    JOIN sm_pasien p ON pd.id_pasien = p.id
                    WHERE pd.jenis_rawat = 'Inap'
                    AND pd.status != 'Batal' " . $param . " 
                    GROUP BY p.id
                    HAVING COUNT(*) > 1 ) 

                SELECT DISTINCT ON (pd.id) pd.id, pd.tanggal_daftar, pd.tanggal_keluar, pd.no_register, p.id as no_rm, p.nama,
                pg.nama AS dpjp, b.nama AS ruangan, lp.jenis_layanan, lp.id AS id_layanan,
                COALESCE((SELECT nama FROM diagnosa_non_manual WHERE id_layanan_pendaftaran = lp.id limit 1),
                (SELECT nama FROM diagnosa_manual WHERE id_layanan_pendaftaran = lp.id limit 1)) AS nama_diagnosa, 0 as tagihan
                
                FROM sm_pendaftaran pd
                JOIN sm_pasien p ON pd.id_pasien = p.id
                JOIN pasienRanap dn ON p.id = dn.id_pasien
                JOIN sm_layanan_pendaftaran lp ON pd.id = lp.id_pendaftaran
                LEFT JOIN sm_rawat_inap ri ON lp.id = ri.id_layanan_pendaftaran
                LEFT JOIN sm_intensive_care ic ON lp.id = ic.id_layanan_pendaftaran
                LEFT JOIN sm_order_rawat_inap ori ON ri.id = ori.id_rawat_inap
                LEFT JOIN sm_order_intensive_care oic ON ic.id = oic.id_intensive_care
                LEFT JOIN sm_tenaga_medis tm ON ori.id_dokter_dpjp = tm.id OR oic.id_dokter_dpjp = tm.id
                LEFT JOIN sm_pegawai pg ON tm.id_pegawai = pg.id
                LEFT JOIN sm_bangsal b ON ri.id_bangsal = b.id OR ic.id_bangsal = b.id
                WHERE pd.jenis_rawat = 'Inap'
                AND pd.status != 'Batal' 
                AND lp.jenis_layanan IN ('Rawat Inap', 'Intensive Care') 
                AND lp.tindak_lanjut NOT IN ('Rawat Inap', 'Intensive Care') " . $param . $param_from . " 
                ORDER BY pd.id, p.nama ASC, pd.tanggal_daftar ASC ) AS data";

        $order = " ORDER BY data.nama ASC, data.tanggal_daftar ASC ";

        $count = " SELECT COALESCE(COUNT ( * ), 0) AS COUNT ";

        $query = $this->db->query($select . $sql . $order . $limitation)->result();

        foreach ($query as $i => $val) {
            $tagihan = $this->m_keuangan_ver2->hitungTagihan($val->id);
            $val->tagihan = $tagihan;

            $tindak_lanjut_values = ['Pulang', 'Pemulasaran Jenazah', 'Atas izin Dokter', 'Pulang APS', 'RS Lain'];
            $last_layanan = $this->db->select('lp.*')
                ->from('sm_layanan_pendaftaran lp')
                ->where('lp.id_pendaftaran', $val->id)
                ->where_in('LOWER(lp.tindak_lanjut)', array_map('strtolower', $tindak_lanjut_values))
                ->get()->row();

            $last_layananID = $last_layanan->id ?? 0;
            $sql_ds = " select distinct concat_ws ('. ', 
                        (SELECT gss.kode_icdx_rinci FROM sm_golongan_sebab_sakit AS gss WHERE gss.ID = d.id_pengkodean), 
                        (SELECT gss.kode_icdx_rinci FROM sm_golongan_sebab_sakit AS gss WHERE gss.ID = d.id_pengkodean_asterik), 
                        gss.nama, d.golongan_sebab_sakit_lain ) AS nama 

                        from sm_diagnosa as d
                        left join sm_golongan_sebab_sakit as gss on gss.id = d.id_golongan_sebab_sakit
                        left join sm_layanan_pendaftaran as lp on lp.id = d.id_layanan_pendaftaran
                        left join sm_pendaftaran as pd on pd.id = lp.id_pendaftaran
                        where lp.id = '" . $last_layananID . "'
                        and d.prioritas = 'Sekunder' ";
            $val->diagnosa_sekunder = $this->db->query($sql_ds)->result();

            $sql_tindakan_ok = "SELECT l.nama
                                FROM sm_jadwal_kamar_operasi jko
                                JOIN sm_layanan_pendaftaran lp on jko.id_layanan_pendaftaran = lp.id
                                JOIN sm_tarif_pelayanan tp on jko.id_tarif = tp.id
                                JOIN sm_layanan l on tp.id_layanan = l.id
                                
                                WHERE lp.id_pendaftaran = '" . $val->id . "' ";
            $val->tindakan_ok = $this->db->query($sql_tindakan_ok)->result();
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
        $data["jumlah"]  = $this->db->query($count . $sql)->row()->count;

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
