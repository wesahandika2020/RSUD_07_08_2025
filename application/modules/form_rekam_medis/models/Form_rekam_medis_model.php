<?php

use LDAP\Result;

defined('BASEPATH') or exit('No direct script access allowed');

class Form_rekam_medis_model extends CI_Model
{


    function __construct()
    {
        parent::__construct();
        $this->table = 'sm_form_rekam_medis_pasien as l';
    }

    public function getDataKunjunganPasien($limit, $start, $search)
    {
        $param = '';
        if ($search["keyword"] !== "") :
            $param .= " and (p.nama ilike '%" . $search["keyword"] . "%' or p.id ilike '%" . $search["keyword"] . "%') ";
        endif;

        if ($search["tgl_search"] !== "") :
            $param .= " and pd.id = '" . $search["tgl_search"] . "' ";
        endif;

        if ($search["jenis_rawat"] !== "") :
            $param .= " and pd.jenis_rawat = '" . $search["jenis_rawat"] . "' ";
        endif;

        $limit = " limit " . $limit . " offset " . $start;

        $select = "SELECT DISTINCT ON (pd.id, pd.tanggal_daftar) pd.id, lp.id as id_layanan_pendaftaran, pd.id_pasien, p.nama, pd.tanggal_daftar, pd.tanggal_keluar, 
                   pd.jenis_pendaftaran, pd.jenis_rawat, pd.status as jenis_pasien ";
        $count = "SELECT count(*) as count FROM (";
        $sql = "FROM sm_pendaftaran pd 
                JOIN sm_pasien p on pd.id_pasien = p.id
                LEFT JOIN sm_layanan_pendaftaran lp on pd.id = lp.id_pendaftaran
                WHERE pd.id is not null 
                AND pd.status != 'Batal' " . $param;
        $order = " ORDER BY pd.tanggal_daftar DESC";
        $query = $this->db->query($select . $sql . $order . $limit);
        $result = $query->result();

        foreach ($result as $i => $val) :

            $query_layanan = "SELECT lp.id, lp.id_pendaftaran, pd.id_pasien as no_rm, lp.tanggal_layanan, 
                            case when lp.id_unit_layanan is not null then concat(lp.jenis_layanan, ' (', sp.nama, ') ') else lp.jenis_layanan end as jenis_layanan, 
                            pg.nama as nama_dokter, lp.cara_bayar, lp.status_terlayani, lp.tindak_lanjut as status_keluar

                            FROM sm_layanan_pendaftaran lp 
                            JOIN sm_pendaftaran pd on lp.id_pendaftaran = pd.id 
                            LEFT JOIN sm_spesialisasi sp on lp.id_unit_layanan = sp.id 
                            LEFT JOIN sm_tenaga_medis tm on lp.id_dokter = tm.id 
                            LEFT JOIN sm_pegawai pg on tm.id_pegawai = pg.id 
                            
                            WHERE lp.status_terlayani != 'Batal' 
                            AND lp.id_pendaftaran = '" . $val->id . "' 
                            ORDER BY lp.tanggal_layanan ASC";

            $result[$i]->layanan = $this->db->query($query_layanan)->result();
        endforeach;

        $data['data'] = $result;
        $data['jumlah'] = $this->db->query($count . $select . $sql . $param . ") AS subquery")->row()->count;
        return $data;
    }

    public function ListMasterFormRM()
    {
        $this->db->select('*')
            ->from('sm_form_rekam_medis_pasien')
            ->where('no_formulir IS NOT NULL')
            ->where('table_name !=', '')
            ->order_by('nama', 'ASC');

        $data = $this->db->get()->result();

        return $data;
    }

    public function getListFormRM($id_pendaftaran, $id, $no_rm)
    {
        $jenis_form = $this->ListMasterFormRM();

        // var_dump($jenis_form);
        // die;

        foreach ($jenis_form as $i => $val) :
            $tables = explode(", ", $val->table_name);
            // $id_form = [];

            $jenis_form[$i]->id_pendaftaran = $id_pendaftaran;
            $jenis_form[$i]->id_layanan_pendaftaran = $id;
            $jenis_form[$i]->id_pasien = $no_rm;
            if (count($tables) === 1) {
                if ($val->no_formulir == 'FORM-KEP-120-00' || $val->no_formulir == 'FORM-REM-09-04' || $val->no_formulir == 'FORM-PMD-42-00' || $val->no_formulir == 'FORM-KEP-111-00') { // Pengkajian Spriritual Pasien Muslim (Pulang)
                    $this->db->select('master.*');
                    $this->db->from($val->table_name . ' as master');
                    $this->db->join('sm_pendaftaran as p', 'master.id_pendaftaran = p.id');
                    $this->db->where('p.id', $id_pendaftaran);

                    $jenis_form[$i]->id_form = $this->db->get()->row()->id ?? null;
                    // $jenis_form[$i]->id_form  = $this->db->get_where($val->table_name, ['id_pendaftaran' => $id_pendaftaran])->row()->id ?? null;
                } elseif ($val->no_formulir == 'FORM-GZ-15-00') {
                    $this->db->select('master.*');
                    $this->db->from($val->table_name . ' as master');
                    $this->db->join('sm_layanan_pendaftaran as lp', 'lp.id = master.id_layanan_pendaftaran');
                    $this->db->join('sm_pendaftaran as p', 'lp.id_pendaftaran = p.id');
                    $this->db->where('p.id', $id_pendaftaran);

                    $jenis_form[$i]->id_form = $this->db->get()->row()->id_kg ?? null;
                } elseif ($val->no_formulir == 'FORM-GZ-02-02') {
                    $this->db->select('master.*');
                    $this->db->from($val->table_name . ' as master');
                    $this->db->join('sm_layanan_pendaftaran as lp', 'lp.id = master.id_layanan_pendaftaran');
                    $this->db->join('sm_pendaftaran as p', 'lp.id_pendaftaran = p.id');
                    $this->db->where('p.id', $id_pendaftaran);

                    $jenis_form[$i]->id_form = $this->db->get()->row()->id_gd ?? null;
                } elseif ($val->no_formulir == 'FORM-GZ-03-01') {
                    $this->db->select('master.*');
                    $this->db->from($val->table_name . ' as master');
                    $this->db->join('sm_layanan_pendaftaran as lp', 'lp.id = master.id_layanan_pendaftaran');
                    $this->db->join('sm_pendaftaran as p', 'lp.id_pendaftaran = p.id');
                    $this->db->where('p.id', $id_pendaftaran);

                    $jenis_form[$i]->id_form = $this->db->get()->row()->id_ga ?? null;
                } else {
                    $this->db->select('master.*');
                    $this->db->from($val->table_name . ' as master');
                    $this->db->join('sm_layanan_pendaftaran as lp', 'lp.id = master.id_layanan_pendaftaran');
                    $this->db->join('sm_pendaftaran as p', 'lp.id_pendaftaran = p.id');
                    $this->db->where('p.id', $id_pendaftaran);

                    $jenis_form[$i]->id_form = $this->db->get()->row()->id ?? null;
                    // $jenis_form[$i]->id_form  = $this->db->get_where($val->table_name, ['id_layanan_pendaftaran' => $id])->row()->id ?? null;
                }
            } else {

                $id_form = null;

                foreach ($tables as $table) {
                    $this->db->select('master.*');
                    $this->db->from($table . ' as master');
                    $this->db->join('sm_layanan_pendaftaran as lp', 'lp.id = master.id_layanan_pendaftaran');
                    $this->db->join('sm_pendaftaran as p', 'lp.id_pendaftaran = p.id');
                    $this->db->where('p.id', $id_pendaftaran);

                    $id_forms = $this->db->get()->row()->id ?? null;

                    // $id_forms = $this->db->get_where($table, ['id_layanan_pendaftaran' => $id])->row()->id ?? null;
                    // $table_form = $this->db->get_where('sm_table_form_rekam_medis', ['nama_tabel' => $table])->row()->jenis_form_rm ?? null;
                    $result = [
                        "id_form" => $id_forms,
                        "nama_form" => $val->nama,
                        "table_name" => $table,
                    ];

                    if ($id_forms !== null) {
                        $id_form[] = $result;
                    }
                }
                $jenis_form[$i]->id_form = $id_form;
            }

        endforeach;

        return $jenis_form;
    }

    public function getListTambahFormRM($id_pendaftaran, $id, $no_rm)
    {
        $list_form = $this->ListMasterFormRM();

        foreach ($list_form as $i => $val) :
            $tables = explode(", ", $val->table_name);

            if (count($tables) === 1) {
                if ($val->no_formulir == 'FORM-KEP-120-00') { // Pengkajian Spriritual Pasien Muslim (Pulang)
                    $list_form[$i]->id_form  = $this->db->get_where($val->table_name, ['id_pendaftaran' => $id_pendaftaran])->row()->id ?? null;
                } else {
                    $list_form[$i]->id_form  = $this->db->get_where($val->table_name, ['id_layanan_pendaftaran' => $id])->row()->id ?? null;
                }
            } else {

                $id_form = null;

                foreach ($tables as $table) {
                    $id_forms = $this->db->get_where($table, ['id_layanan_pendaftaran' => $id])->row()->id ?? null;
                    // $table_form = $this->db->get_where('sm_table_form_rekam_medis', ['nama_tabel' => $table])->row()->jenis_form_rm ?? null;
                    $result = [
                        "id_form" => $id_forms,
                        "nama_form" => $val->nama,
                        "table_name" => $table,
                    ];

                    if ($id_forms !== null) {
                        $id_form[] = $result;
                    }
                }
                $list_form[$i]->id_form = $id_form;
            }

        endforeach;

        return $list_form;
    }

    function getAutoPasien($q, $start, $limit)
    {
        $limit = " limit " . $limit . " offset " . $start;
        $where = "";
        if ($q !== "") :
            $where = "where ";
            if (is_numeric($q)) :
                $where .= "p.id ilike ('%" . $q . "')";
            else :
                $where .= "p.nama ilike ('" . $q . "%')";
            endif;
        endif;

        $count = "select count(p.id) as count ";
        $select = "select p.*, 
                pd.nama as pendidikan, 
                pk.nama as pekerjaan, 
                et.nama as etnis,
                pp.is_died, 
                pp.is_hiv, 
                pp.is_alergi, 
                pp.is_gonorrhea, 
                pp.is_hepatitis, 
                pp.is_kusta,
                pp.is_tbc, 
                pp.is_potensi_komplain, 
                pp.is_pasien_pejabat, 
                pp.is_pemilik_rs ";
        $sql = "from sm_pasien as p 
                left join sm_pendidikan as pd on pd.id = p.id_pendidikan
                left join sm_pekerjaan as pk on pk.id = p.id_pekerjaan 
                left join sm_etnis as et on et.id = p.id_etnis 
                left join sm_profil_pasien as pp on pp.id_pasien = p.id
                $where ";
        $order = " order by p.id";

        $data['data'] = $this->db->query($select . $sql . $order . $limit)->result();
        $data['total'] = $this->db->query($count . $sql)->row()->count;
        $this->db->close();
        return $data;
    }

    // resep kaca mata
    function getRkmByID($id)
    {
        return $this->db
            ->select("rkm.*, COALESCE(sp_dokter.nama, '') as nama_dokter, sp_dokter.tanda_tangan")
            ->from('sm_resep_kaca_mata as rkm')
            ->join('sm_layanan_pendaftaran as lp', 'lp.id = rkm.id_layanan_pendaftaran')
            ->join('sm_pendaftaran as pd', 'pd.id = lp.id_pendaftaran')
            ->join('sm_tenaga_medis as stm_dokter', 'stm_dokter.id = rkm.rkm_dokter', 'left')
            ->join('sm_pegawai as sp_dokter', 'sp_dokter.id = stm_dokter.id_pegawai', 'left')
            ->where('rkm.id', $id)
            ->get()
            ->row();
        $this->db->close();
    }

    function getAutoSaksi($q, $start, $limit)
    {
        $limit = " limit " . $limit . " offset " . $start;
        $select = "select pg.id, pg.nama, ag.name as account_group ";
        $count = "select count(pg.id) as count ";
        $sql = "from sm_translucent tr
                join sm_pegawai pg on (pg.id = tr.id)
                join sm_account_group ag on (tr.id_account_group = ag.id)
                where pg.nama ilike ('%$q%')
                and tr.id_account_group in ('31', '14')
                and pg.status = '1' ";

        // echo $select . $sql; die;
        $data['data'] = $this->db->query($select . $sql . $limit)->result();
        $data['total'] = $this->db->query($count . $sql)->row()->count;
        return $data;
    }

    // Kelaikan bekerja
    function getKbByID($id)
    {
        return $this->db
            // ->select("kb.*, COALESCE(sp_dokter.nama, '') as nama_dokter, sp_dokter.tanda_tangan")
            ->select("kb.*")
            ->from('sm_mcu_16_00 as kb')
            ->join('sm_layanan_pendaftaran as lp', 'lp.id = kb.id_layanan_pendaftaran')
            ->join('sm_pendaftaran as pd', 'pd.id = lp.id_pendaftaran')
            // ->join('sm_tenaga_medis as stm_dokter', 'stm_dokter.id = 90', 'left')
            // ->join('sm_pegawai as sp_dokter', 'sp_dokter.id = stm_dokter.id_pegawai', 'left')
            ->where('kb.id', $id)
            ->get()
            ->row();
        $this->db->close();
    }
}
