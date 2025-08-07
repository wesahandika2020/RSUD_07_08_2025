<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Lap_rehab_medik_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->datetime = date('Y-m-d H:i:s');
    }

    public function getPeriodeLaporan()
    {
        return array(
            'Bulanan'       => 'Bulanan',
            'Rentang Waktu' => 'Rentang Waktu',
            'Harian'        => 'Harian',
        );
    }

    public function getAccountRehabMedik($q, $start, $limit)
    {

        $limit = " limit " . $limit . " offset " . $start;
        $select = "select tr.id, p.nama, coalesce ( nullif ( jb.nama, '' ), '' ) as jabatan, 
                coalesce ( nullif ( un.nama, '' ), '' ) as unit, ag.name as account_group ";
        $count = "select count(tr.id) as count ";
        $sql = "from sm_translucent tr
                join sm_pegawai as p on p.id = tr.id
                join sm_account_group as ag on ag.id = tr.id_account_group
                left join sm_unit as un on un.id = tr.id_unit
                left join sm_jabatan as jb on jb.id = p.id_jabatan
                where p.nama ilike ('%$q%') and tr.id is not null
                and un.nama = 'Rehab Medik'";

        // echo $select . $sql; die;
        // $data[''] = 'Semua Dokter / Pegawai';
        $data['data'] = $this->db->query($select . $sql . $limit)->result();
        $data['total'] = $this->db->query($count . $sql)->row()->count;
        return $data;
    }

    public function getListLaporanRehabMedik($limit, $start, $search)
    {
        $param = "";

        $search["id_dokter"] !== "" ? $param .= " and pg.id = '" . $search["id_dokter"] . "' " : "";
        $search["nama_pasien"] !== "" ? $param .= " and p.id = '" . $search["nama_pasien"] . "' " : "";

        if ($search["periode_laporan"] === "Harian") {
            if ($search["tanggal_harian"] !== "") :
                $param .= " and to_char( lp.tanggal_layanan, 'yyyy-mm-dd' ) ilike '%" . date2mysql($search['tanggal_harian']) . "' ";
            endif;
        } elseif ($search["periode_laporan"] === "Bulanan" & $search["bulan"] !== "" & $search["tahun"] !== "") {
            $param .= " and to_char( lp.tanggal_layanan, 'yyyy/mm' ) = '" . $search["tahun"] . "/" . $search["bulan"] . "' ";
        } elseif ($search["periode_laporan"] === "Rentang Waktu" & $search["tanggal_awal"] !== "" & $search["tanggal_akhir"] !== "") {
            if ($search["tanggal_awal"] !== "" & $search["tanggal_akhir"] !== "") :
                $param .= " and lp.tanggal_layanan BETWEEN '" . date2mysql($search['tanggal_awal']) . " 00:00:00' AND '" . date2mysql($search['tanggal_akhir']) . " 23:59:59'";
            endif;
        }

        $query      = "";
        $limitation = "";
        if ($limit !== 0) :
            $limitation = " limit " . $limit . " offset " . $start;
        endif;

        $select = "select pd.id, lp.id id_layanan, p.id as no_rm, p.nama, l.nama layanan, pg.nama as operator, pn.nama as profesi, ttp.tanggal ";

        $count  = "select count(*) as count from ( " . $select;
        $total_pasien = "select count(*) as count from (select distinct on (pd.id) pd.* ";
        $sql    = "from sm_layanan_pendaftaran as lp
                join sm_pendaftaran as pd on lp.id_pendaftaran = pd.id
                join sm_pasien as p on pd.id_pasien = p.id
                join sm_spesialisasi as sp on lp.id_unit_layanan = sp.id
                join sm_tarif_tindakan_pasien as ttp on lp.id = ttp.id_layanan_pendaftaran
                join sm_tarif_pelayanan as tp on ttp.id_tarif_pelayanan = tp.id
                join sm_layanan as l on tp.id_layanan = l.id
                join sm_tenaga_medis as tm on ttp.id_operator = tm.id
                join sm_pegawai as pg on tm.id_pegawai = pg.id
                join sm_profesi_nadis as pn on tm.id_profesi = pn.id
                join sm_jabatan as jb on pg.id_jabatan = jb.id
                
                where sp.id = '34' " . $param;

        // $group_by = " GROUP BY b.id, b.id_golongan, b.nama_lengkap, b.harga_satuan, b.kategori ";
        $order = " order by lp.tanggal_periksa asc, lp.id asc ";

        $query = $this->db->query($select . $sql . $order . $limitation)->result();
        $result = $query;

        foreach ($result as $i => $val) :

            $query_ = "select concat(gs.nama, d.golongan_sebab_sakit_lain) nama

            from sm_diagnosa d
            join sm_golongan_sebab_sakit gs on d.id_golongan_sebab_sakit = gs.id
            
            where d.id_layanan_pendaftaran = '".$val->id_layanan."'
            and d.prioritas != 'Utama' ";

            $result[$i]->diagnosa = $this->db->query($query_)->result();

        endforeach;

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
        $data["data"]    = $result;
        $data["jumlah_total"]  = $this->db->query($total_pasien . $sql . ") as jml")->row()->count;
        $data["jumlah"]  = $this->db->query($count . $sql . ") as jml")->row()->count;
        $this->db->close();

        return $data;
    }
}
