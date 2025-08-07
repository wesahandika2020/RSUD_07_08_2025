<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pemakaian_peralatan_medis_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->datetime = date('Y-m-d H:i:s');
    }

    public function getDataDropdownBangsal()
    {
        // $id_unit = "";
        if ($_SESSION['account_group'] == "Admin PPI" || $_SESSION['account_group'] == "Admin") {
            $id_unit = NULL;
        } else {
            $id_unit = $this->session->userdata("id_unit");
        }

        $where = " where is_active = 'Ya' ";
        if ($id_unit !== NULL) {
            if ($_SESSION['account_group'] == "Intensive Care") {
                $where .= " and keterangan = 'Intensive Care' ";
                // $where .= " and keterangan IN ('Intensive Care' , 'ISOLASI Covid 19') ";
            } else {
                $where .= " and id_unit = '" . $id_unit . "' ";
            }
        }

        $sql = "select id, nama from sm_bangsal " . $where . " order by nama";

        $bangsal = $this->db->query($sql)->result();
        if ($_SESSION['account_group'] == "Admin PPI" || $_SESSION['account_group'] == "Admin") {
            $data[""] = "Semua Bangsal...";
            foreach ($bangsal as $key => $value) {
                $data[$value->id] = $value->nama;
            }
        } else {
            foreach ($bangsal as $key => $value) {
                $data[$value->id] = $value->nama;
            }
        }

        return $data;
    }

    public function getDataDropdownKultur()
    {
        $sql = "SELECT *
		FROM sm_kultur_ppi
        where id != '0'";

        $query = $this->db->query($sql)->result();
        $data =  array();
        $data[''] = '-- Pilih Kultur --';
        foreach ($query as $key => $value) :
            $data[$value->id] = $value->nama;
        endforeach;

        return $data;
    }

    public function getDataDropdownAntiobika()
    {
        $sql = "SELECT *
		FROM sm_antiobika_ppi
        where id != '0'";

        $query = $this->db->query($sql)->result();
        $data =  array();
        $data[''] = '-- Pilih Antiobika --';
        foreach ($query as $key => $value) :
            $data[$value->id] = $value->nama;
        endforeach;

        return $data;
    }

    public function getKultur($q, $start, $limit)
    {

        // $limit = " limit " . $limit . " offset " . $start;
        $select = "select * ";
        $count = "select count(id) as count ";
        $sql = "from sm_kultur_ppi
                where nama ilike ('%$q%') ";
        $order = " order by id asc ";

        // echo $select . $sql; die;
        // $data['0']       = '-- Pilih Kultur --';
        $data['data']   = $this->db->query($select . $sql . $order)->result();
        $data['total']  = $this->db->query($count . $sql)->row()->count;
        return $data;
    }

    public function getAntiobika($q, $start, $limit)
    {

        // $limit = " limit " . $limit . " offset " . $start;
        $select = "select * ";
        $count = "select count(id) as count ";
        $sql = "from sm_antiobika_ppi
                where nama ilike ('%$q%') ";
        $order = " order by id asc ";

        // echo $select . $sql; die;
        // $data['0']       = '-- Pilih Antiobika';
        $data['data']   = $this->db->query($select . $sql . $order)->result();
        $data['total']  = $this->db->query($count . $sql)->row()->count;
        return $data;
    }

    public function getDataPasienKeluar()
    {
        return array(
            ''          => 'Semua Pasien',
            'Sudah'     => 'Pasien Sudah Pulang',
            'Belum'     => 'Pasien Belum Pulang',
        );
    }

    public function getListPemakaianPeralatanMedis($limit, $start, $search)
    {
        $param = "";

        if ($search["pasien_keluar"] === "Sudah") {
            $search["tanggal_masuk"] !== "" ? $param .= " and to_char( ri.waktu_masuk, 'yyyy-mm-dd' ) <= '" . $search["tanggal_masuk"] . "'  and (to_char( ri.waktu_keluar, 'yyyy-mm-dd' ) >= '" . $search["tanggal_masuk"] . "') " : "";
        } else if ($search["pasien_keluar"] === "Belum") {
            $search["tanggal_masuk"] !== "" ? $param .= " and to_char( ri.waktu_masuk, 'yyyy-mm-dd' ) <= '" . $search["tanggal_masuk"] . "' and ri.waktu_keluar is null " : "";
        } else if ($search["pasien_keluar"] === "") {
            $search["tanggal_masuk"] !== "" ? $param .= " and to_char( ri.waktu_masuk, 'yyyy-mm-dd' ) <= '" . $search["tanggal_masuk"] . "' and (ri.waktu_keluar IS NULL or to_char( ri.waktu_keluar, 'yyyy-mm-dd' ) >= '" . $search["tanggal_masuk"] . "') " : "";
        }

        $search["keyword"] !== "" ? $param .= " and (p.nama ilike '%" . $search["keyword"] . "%' or p.id ilike '%" . $search["keyword"] . "%') " : "";
        $search["bangsal_search"] !== "" ? $param .= " and bg.id = '" . $search["bangsal_search"] . "' " : "";

        $query_ranap    = "";
        $query_icare    = "";
        // $limitation     = "";

        $select = "select lp.id id_layanan, lp.id_pendaftaran, ri.id as id_rawat_inap, ri.waktu_masuk, 
                ri.waktu_keluar, pd.id_pasien, CONCAT_WS(' ', COALESCE(p.status_pasien), p.nama, '') as nama, 
                p.kelamin, concat (EXTRACT ( YEAR FROM AGE( P.tanggal_lahir ) ),' thn') umur, 
                concat(bg.nama, '<br><i>Ruang ', ri.no_ruang, ' No.Bed ', ri.no_bed, '</i>') as bangsal, bg.id id_bangsal, 
                k.nama as kelas, COALESCE ( pg.nama, '' ) AS dokter, ppi.id id_ppi, 
                ppi.ett, ppi.cvl, ppi.ivl, ppi.uc, ppi.tirah_baring, ppi.vap, ppi.iadp, ppi.isk, 
                ppi.dekubitus, ppi.plebitis, ppi.operasi, ppi.ido, ppi.keterangan ";

        $count  = "select count(*) as count from ( " . $select;
        // $total_pasien = "select count(*) as count from (select distinct on (pd.id) pd.* ";
        $sql_ranap    = "from sm_layanan_pendaftaran as lp 
                left join sm_form_ppi as ppi on (lp.id = ppi.id_layanan_pendaftaran and to_char(ppi.tanggal_input, 'yyyy-mm-dd') = '" . $search["tanggal_masuk"] . "')
                join sm_rawat_inap as ri on (ri.id_layanan_pendaftaran = lp.id) 
                join sm_bangsal as bg on (ri.id_bangsal = bg.id)
                join sm_kelas as k on (k.id = ri.id_kelas) 
                join sm_pendaftaran as pd on (pd.id = lp.id_pendaftaran) 
                join sm_pasien as p on (p.id = pd.id_pasien) 
                left join sm_penjamin as pj on (pj.id = lp.id_penjamin) 
                left join sm_spesialisasi as sp on (sp.id = lp.id_unit_layanan) 
                left join sm_tenaga_medis as tm on (tm.id = lp.id_dokter) 
                left join sm_pegawai as pg on (pg.id = tm.id_pegawai) 
                left join sm_translucent as tr on (tr.id = lp.id_users_sep) 
                left join sm_order_rawat_inap as odri on (odri.id_rawat_inap = ri.id) 
                left join sm_tenaga_medis as tmdpjp on (tmdpjp.id = odri.id_dokter_dpjp) 
                left join sm_pegawai as pgdpjp on (pgdpjp.id = tmdpjp.id_pegawai) 
                where lp.jenis_layanan = 'Rawat Inap' 
                and lp.status_terlayani != 'Batal'
                and ri.konfirmasi_ranap = 'Ya' " . $param;

        $sql_icare    = "from sm_layanan_pendaftaran as lp 
                left join sm_form_ppi as ppi on (lp.id = ppi.id_layanan_pendaftaran and to_char(ppi.tanggal_input, 'yyyy-mm-dd') = '" . $search["tanggal_masuk"] . "')
                join sm_intensive_care as ri on (ri.id_layanan_pendaftaran = lp.id) 
                join sm_bangsal as bg on (ri.id_bangsal = bg.id)
                join sm_kelas as k on (k.id = ri.id_kelas) 
                join sm_pendaftaran as pd on (pd.id = lp.id_pendaftaran) 
                join sm_pasien as p on (p.id = pd.id_pasien) 
                left join sm_penjamin as pj on (pj.id = lp.id_penjamin) 
                left join sm_spesialisasi as sp on (sp.id = lp.id_unit_layanan) 
                left join sm_tenaga_medis as tm on (tm.id = lp.id_dokter) 
                left join sm_pegawai as pg on (pg.id = tm.id_pegawai) 
                left join sm_translucent as tr on (tr.id = lp.id_users_sep) 
                left join sm_order_rawat_inap as odri on (odri.id_rawat_inap = ri.id) 
                left join sm_tenaga_medis as tmdpjp on (tmdpjp.id = odri.id_dokter_dpjp) 
                left join sm_pegawai as pgdpjp on (pgdpjp.id = tmdpjp.id_pegawai) 
                where lp.jenis_layanan = 'Intensive Care' 
                and lp.status_terlayani != 'Batal'
                and ri.konfirmasi_icare = 'Ya' " . $param;

        // $group_by = " GROUP BY b.id, b.id_golongan, b.nama_lengkap, b.harga_satuan, b.kategori ";
        $order = " order by ri.waktu_masuk asc ";

        $query_ranap = $this->db->query($select . $sql_ranap . $order)->result();
        $query_icare = $this->db->query($select . $sql_icare . $order)->result();
        $marge = array_merge($query_ranap, $query_icare);

        if ($limit !== 0) :
            // $limitation = " limit " . $limit . " offset " . $start;
            $marge = array_slice($marge, $start, $limit);
        endif;

        $result = $marge;

        foreach ($result as $i => $val) :
            if ($val->id_ppi != null) {
                $select_kultur = "SELECT kul.nama ";
                $select_antiobika = "SELECT ant.nama ";

                $query = "FROM sm_detail_form_ppi dppi
                    JOIN sm_form_ppi ppi on dppi.id_ppi = ppi.id
                    LEFT JOIN sm_kultur_ppi kul on dppi.id_kultur = kul.id
                    LEFT JOIN sm_antiobika_ppi ant on dppi.id_antiobika = ant.id
                    JOIN sm_pegawai pg on dppi.id_user = pg.id
                    WHERE ppi.id = '" . $val->id_ppi . "' ";

                $order_by = "ORDER BY dppi.created_at asc";

                $result[$i]->kultur = $this->db->query($select_kultur . $query . " AND dppi.id_kultur is not null " . $order_by)->result();
                $result[$i]->antiobika = $this->db->query($select_antiobika . $query . " AND dppi.id_antiobika is not null " . $order_by)->result();
            } else {
                $result[$i]->kultur = [];
                $result[$i]->antiobika = [];
            }
        endforeach;

        $param_sum = "";

        $search["keyword"] !== "" ? $param_sum = " and (p.nama ilike '%" . $search["keyword"] . "%' or p.id ilike '%" . $search["keyword"] . "%') " : "";
        $search["bangsal_search"] !== "" ? $param_sum = " and bg.id = '" . $search["bangsal_search"] . "' " : "";
        if ($search["pasien_keluar"] === "Sudah") {
            $search["tanggal_masuk"] !== "" ? $param_sum .= " and to_char( ri.waktu_masuk, 'yyyy-mm-dd' ) <= '" . $search["tanggal_masuk"] . "'  and (to_char( ri.waktu_keluar, 'yyyy-mm-dd' ) >= '" . $search["tanggal_masuk"] . "') " : "";
        } else if ($search["pasien_keluar"] === "Belum") {
            $search["tanggal_masuk"] !== "" ? $param_sum .= " and to_char( ri.waktu_masuk, 'yyyy-mm-dd' ) <= '" . $search["tanggal_masuk"] . "' and ri.waktu_keluar is null " : "";
        } else if ($search["pasien_keluar"] === "") {
            $search["tanggal_masuk"] !== "" ? $param_sum .= " and to_char( ri.waktu_masuk, 'yyyy-mm-dd' ) <= '" . $search["tanggal_masuk"] . "' and (ri.waktu_keluar IS NULL or to_char( ri.waktu_keluar, 'yyyy-mm-dd' ) >= '" . $search["tanggal_masuk"] . "') " : "";
        }

        $sum_select = "SELECT count (ppi.id) jumlah_pasien, coalesce (sum(ppi.ett::INT), '0') sum_ett,
                coalesce (sum(ppi.cvl::INT), '0') sum_cvl, coalesce (sum(ppi.ivl::INT), '0') sum_ivl, coalesce (sum(ppi.uc::INT), '0') sum_uc,
                coalesce (sum(ppi.tirah_baring::INT), '0') sum_tirah_baring, coalesce (sum(ppi.vap::INT), '0') sum_vap,
                coalesce (sum(ppi.iadp::INT), '0') sum_iadp, coalesce (sum(ppi.isk::INT), '0') sum_isk,
                coalesce (sum(ppi.dekubitus::INT), '0') sum_dekubitus, coalesce (sum(ppi.plebitis::INT), '0') sum_plebitis,
                coalesce (sum(ppi.operasi::INT), '0') sum_operasi, coalesce (sum(ppi.ido::INT), '0') sum_ido,
                (SELECT count(dppi.id) as count_kultur FROM sm_detail_form_ppi dppi JOIN sm_form_ppi ppi ON dppi.id_ppi = ppi.ID WHERE dppi.id_kultur is not null AND ppi.tanggal_input = '" . $search["tanggal_masuk"] . "' ) count_kultur,
	            (SELECT count(dppi.id) as count_antiobika FROM sm_detail_form_ppi dppi JOIN sm_form_ppi ppi ON dppi.id_ppi = ppi.ID WHERE dppi.id_antiobika is not null AND ppi.tanggal_input = '" . $search["tanggal_masuk"] . "' ) count_antiobika ";

        $_ranap = "FROM sm_form_ppi as ppi
                JOIN sm_layanan_pendaftaran as lp on ppi.id_layanan_pendaftaran = lp.id
                JOIN sm_pendaftaran as pd on lp.id_pendaftaran = pd.id
                JOIN sm_pasien as p on pd.id_pasien = p.id
                JOIN sm_rawat_inap as ri on ri.id_layanan_pendaftaran = lp.id
                JOIN sm_bangsal as bg on ri.id_bangsal = bg.id
                
                where (ppi.ett::INT+ppi.cvl::INT+ppi.ivl::INT+ppi.uc::INT+ppi.tirah_baring::INT+
                ppi.vap::INT+ppi.iadp::INT+ppi.isk::INT+ppi.dekubitus::INT+ppi.plebitis::INT+
                ppi.operasi::INT+ppi.ido::INT) != 0 
                and lp.status_terlayani != 'Batal'
                and ri.konfirmasi_ranap = 'Ya'
                and ppi.tanggal_input = '" . $search["tanggal_masuk"] . "' " . $param_sum;

        $_icare = "FROM sm_form_ppi as ppi
                JOIN sm_layanan_pendaftaran as lp on ppi.id_layanan_pendaftaran = lp.id
                JOIN sm_pendaftaran as pd on lp.id_pendaftaran = pd.id
                JOIN sm_pasien as p on pd.id_pasien = p.id
                JOIN sm_intensive_care as ri on ri.id_layanan_pendaftaran = lp.id
                JOIN sm_bangsal as bg on ri.id_bangsal = bg.id
                
                where (ppi.ett::INT+ppi.cvl::INT+ppi.ivl::INT+ppi.uc::INT+ppi.tirah_baring::INT+
                ppi.vap::INT+ppi.iadp::INT+ppi.isk::INT+ppi.dekubitus::INT+ppi.plebitis::INT+
                ppi.operasi::INT+ppi.ido::INT) != 0 
                and lp.status_terlayani != 'Batal'
                and ri.konfirmasi_icare = 'Ya'
                and ppi.tanggal_input = '" . $search["tanggal_masuk"] . "' " . $param_sum;

        $sum_ranap = $this->db->query($sum_select . $_ranap)->result();
        $sum_icare = $this->db->query($sum_select . $_icare)->result();
        $sum_marge = array_merge($sum_ranap, $sum_icare);

        $search["bangsal_search"] !== "" ? $unit = $this->db->where('id', $search['bangsal_search'], true)->select('nama')->get('sm_bangsal')->row()->nama :  $unit = "Semua Unit";

        $count_ranap = $this->db->query($count . $sql_ranap . ") as jml")->row()->count;
        $count_icare = $this->db->query($count . $sql_icare . ") as jml")->row()->count;

        $data["unit"]       = $unit;
        $data["data"]       = $result;
        $data["sum_data"]   = $sum_marge;
        $data["jumlah"]     = $count_ranap + $count_icare;
        $this->db->close();

        return $data;
    }

    public function getDataPPIbyID($id_layanan_pendaftaran, $tanggal_search, $id_ppi = null)
    {
        $param = "";
        $id_ppi !== "null" ? $param .= " and ppi.id ='" . $id_ppi . "'" : $param .= " and lp.id ='" . $id_layanan_pendaftaran . "'";

        $select = "select lp.id id_layanan, lp.id_pendaftaran, ri.id as id_rawat_inap, ri.waktu_masuk, 
                ri.waktu_keluar, pd.id_pasien, CONCAT_WS(' ', COALESCE(p.status_pasien), p.nama, '') as nama, 
                p.kelamin, concat (EXTRACT ( YEAR FROM AGE( P.tanggal_lahir ) ),' thn') umur, 
                concat(bg.nama, ' <i>Ruang ', ri.no_ruang, ' No.Bed ', ri.no_bed, '</i>') as bangsal, bg.id id_bangsal, 
                k.nama as kelas, COALESCE ( pg.nama, '' ) AS dokter, ppi.id id_ppi, 
                ppi.ett, ppi.cvl, ppi.ivl, ppi.uc, ppi.tirah_baring, ppi.vap, ppi.iadp, ppi.isk, 
                ppi.dekubitus, ppi.plebitis, ppi.operasi, ppi.ido, ppi.keterangan ";

        $sql_ranap    = "from sm_layanan_pendaftaran as lp 
                left join sm_form_ppi as ppi on (lp.id = ppi.id_layanan_pendaftaran and to_char(ppi.tanggal_input, 'yyyy-mm-dd') = '" . $tanggal_search . "')
                join sm_rawat_inap as ri on (ri.id_layanan_pendaftaran = lp.id) 
                join sm_bangsal as bg on (ri.id_bangsal = bg.id)
                join sm_kelas as k on (k.id = ri.id_kelas) 
                join sm_pendaftaran as pd on (pd.id = lp.id_pendaftaran) 
                join sm_pasien as p on (p.id = pd.id_pasien) 
                left join sm_penjamin as pj on (pj.id = lp.id_penjamin) 
                left join sm_spesialisasi as sp on (sp.id = lp.id_unit_layanan) 
                left join sm_tenaga_medis as tm on (tm.id = lp.id_dokter) 
                left join sm_pegawai as pg on (pg.id = tm.id_pegawai) 
                left join sm_translucent as tr on (tr.id = lp.id_users_sep) 
                left join sm_order_rawat_inap as odri on (odri.id_rawat_inap = ri.id) 
                left join sm_tenaga_medis as tmdpjp on (tmdpjp.id = odri.id_dokter_dpjp) 
                left join sm_pegawai as pgdpjp on (pgdpjp.id = tmdpjp.id_pegawai) 
                where lp.jenis_layanan = 'Rawat Inap'
                and ri.konfirmasi_ranap = 'Ya' " . $param;

        $sql_icare    = "from sm_layanan_pendaftaran as lp 
                left join sm_form_ppi as ppi on (lp.id = ppi.id_layanan_pendaftaran and to_char(ppi.tanggal_input, 'yyyy-mm-dd') = '" . $tanggal_search . "')
                join sm_intensive_care as ri on (ri.id_layanan_pendaftaran = lp.id) 
                join sm_bangsal as bg on (ri.id_bangsal = bg.id)
                join sm_kelas as k on (k.id = ri.id_kelas) 
                join sm_pendaftaran as pd on (pd.id = lp.id_pendaftaran) 
                join sm_pasien as p on (p.id = pd.id_pasien) 
                left join sm_penjamin as pj on (pj.id = lp.id_penjamin) 
                left join sm_spesialisasi as sp on (sp.id = lp.id_unit_layanan) 
                left join sm_tenaga_medis as tm on (tm.id = lp.id_dokter) 
                left join sm_pegawai as pg on (pg.id = tm.id_pegawai) 
                left join sm_translucent as tr on (tr.id = lp.id_users_sep) 
                left join sm_order_rawat_inap as odri on (odri.id_rawat_inap = ri.id) 
                left join sm_tenaga_medis as tmdpjp on (tmdpjp.id = odri.id_dokter_dpjp) 
                left join sm_pegawai as pgdpjp on (pgdpjp.id = tmdpjp.id_pegawai) 
                where lp.jenis_layanan = 'Intensive Care'
                and ri.konfirmasi_icare = 'Ya' " . $param;

        $queryRanap = $this->db->query($select . $sql_ranap)->result_array();
        $queryIcare = $this->db->query($select . $sql_icare)->result_array();
        $result = array_merge($queryRanap, $queryIcare);
        $data['data'] = $result;

        return $data;
    }

    public function cek_nama_masterdataPPI($jenis, $nama_data)
    {
        if ($jenis === 'kultur') {
            $this->db->where('nama', $nama_data);
            $query = $this->db->get('sm_kultur_ppi');
        } else {
            $this->db->where('nama', $nama_data);
            $query = $this->db->get('sm_antiobika_ppi');
        }

        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function getListKulturAntiobika($id_ppi)
    {
        $this->db->select('dppi.id, dppi.id_ppi, to_char(dppi.created_at, \'dd-mm-yyyy HH24:MI:SS\') as tanggal, kul.nama as kultur, ant.nama as antiobika, pg.nama as operator')
            ->from('sm_detail_form_ppi dppi')
            ->join('sm_form_ppi ppi', 'dppi.id_ppi = ppi.id')
            ->join('sm_pegawai pg', 'dppi.id_user = pg.id')
            ->join('sm_kultur_ppi kul', 'dppi.id_kultur = kul.id', 'left')
            ->join('sm_antiobika_ppi ant', 'dppi.id_antiobika = ant.id', 'left')
            ->where('ppi.id', $id_ppi)
            ->where('dppi.id_kultur is not null')
            ->order_by('dppi.created_at', 'asc');
        $query_kultur = $this->db->get()->result();

        $this->db->select('dppi.id, dppi.id_ppi, to_char(dppi.created_at, \'dd-mm-yyyy HH24:MI:SS\') as tanggal, kul.nama as kultur, ant.nama as antiobika, pg.nama as operator')
            ->from('sm_detail_form_ppi dppi')
            ->join('sm_form_ppi ppi', 'dppi.id_ppi = ppi.id')
            ->join('sm_pegawai pg', 'dppi.id_user = pg.id')
            ->join('sm_kultur_ppi kul', 'dppi.id_kultur = kul.id', 'left')
            ->join('sm_antiobika_ppi ant', 'dppi.id_antiobika = ant.id', 'left')
            ->where('ppi.id', $id_ppi)
            ->where('dppi.id_antiobika is not null')
            ->order_by('dppi.created_at', 'asc');
        $query_antiobika = $this->db->get()->result();

        $data['data_kultur']        = $query_kultur;
        $data['data_antiobika']     = $query_antiobika;

        return $data;
    }

    function simpanDataPPI($data)
    {
        return $this->db->insert('sm_form_ppi', $data);
    }

    function updateDataPPI($data, $id)
    {
        $this->db->trans_begin();
        $user_log = $this->session->userdata('id_translucent');

        $sql_log = "INSERT INTO sm_form_ppi_log (id_lama, id_layanan_pendaftaran, update_at, id_user, ett, cvl, ivl, uc, vap, iadp, isk, dekubitus, plebitis, tirah_baring, operasi, ido, keterangan, user_update, aksi, tanggal_input, id_bangsal)
        
                    SELECT id, id_layanan_pendaftaran, '" . $data['update_at'] . "' update_at, id_user, ett, cvl, ivl, uc, vap, iadp, isk, dekubitus, plebitis, tirah_baring, operasi, ido, keterangan,'" . $user_log . "' user_update, 'Edit' aksi, tanggal_input, id_bangsal
                    FROM sm_form_ppi
                    WHERE id = '" . $id . "'";

        $this->db->query($sql_log);
        $this->db->where('id', $id, true)->update('sm_form_ppi', $data);

        if ($this->db->trans_status() === false) :
            $this->db->trans_rollback();
        else :
            $this->db->trans_commit();
        endif;

        return $id;
    }

    public function getLapHarianPPI($limit, $start, $search)
    {
        $param = "";

        $search["tanggal_masuk"] !== "" ? $param .= " and to_char( ppi.tanggal_input, 'yyyy-mm-dd' ) = '" . $search["tanggal_masuk"] . "' " : "";
        $search["keyword"] !== "" ? $param .= " and (p.nama ilike '%" . $search["keyword"] . "%' or p.id ilike '%" . $search["keyword"] . "%') " : "";
        $search["bangsal_search"] !== "" ? $param .= " and bg.id = '" . $search["bangsal_search"] . "' " : "";
        if ($search["pasien_keluar"] === "Sudah") {
            $search["tanggal_masuk"] !== "" ? $param .= " and to_char( ri.waktu_masuk, 'yyyy-mm-dd' ) <= '" . $search["tanggal_masuk"] . "'  and (to_char( ri.waktu_keluar, 'yyyy-mm-dd' ) >= '" . $search["tanggal_masuk"] . "') " : "";
        } else if ($search["pasien_keluar"] === "Belum") {
            $search["tanggal_masuk"] !== "" ? $param .= " and to_char( ri.waktu_masuk, 'yyyy-mm-dd' ) <= '" . $search["tanggal_masuk"] . "' and ri.waktu_keluar is null " : "";
        } else if ($search["pasien_keluar"] === "") {
            $search["tanggal_masuk"] !== "" ? $param .= " and to_char( ri.waktu_masuk, 'yyyy-mm-dd' ) <= '" . $search["tanggal_masuk"] . "' and (ri.waktu_keluar IS NULL or to_char( ri.waktu_keluar, 'yyyy-mm-dd' ) >= '" . $search["tanggal_masuk"] . "') " : "";
        }

        $query_ranap    = "";
        $query_icare    = "";

        $select = "select ppi.id as id_ppi, lp.id id_layanan, lp.id_pendaftaran, ri.id as id_rawat_inap, ri.waktu_masuk, 
                ri.waktu_keluar, concat('''', pd.id_pasien) id_pasien, CONCAT_WS(' ', COALESCE(p.status_pasien), p.nama, '') as nama, 
                p.kelamin, concat (EXTRACT ( YEAR FROM AGE( P.tanggal_lahir ) ),' thn') umur, 
                concat(bg.nama, '<br><i>Ruang ', ri.no_ruang, ' No.Bed ', ri.no_bed, '</i>') as bangsal, 
                k.nama as kelas, ppi.id id_ppi, ppi.ett, ppi.cvl, ppi.ivl, ppi.uc, ppi.tirah_baring, ppi.vap, ppi.iadp, 
                ppi.isk, ppi.dekubitus, ppi.plebitis, ppi.operasi, ppi.ido, ppi.keterangan ";

        $count  = "select count(*) as count from ( " . $select;
        $sql_ranap    = "FROM sm_form_ppi AS ppi
                    JOIN sm_layanan_pendaftaran AS lp ON ppi.id_layanan_pendaftaran = lp.ID 
                    JOIN sm_pendaftaran AS pd ON lp.id_pendaftaran = pd.ID 
                    JOIN sm_pasien AS P ON pd.id_pasien = P.ID 
                    JOIN sm_rawat_inap AS ri ON ri.id_layanan_pendaftaran = lp.ID 
                    JOIN sm_bangsal AS bg ON ri.id_bangsal = bg.ID 
                    join sm_kelas as k on (k.id = ri.id_kelas) 
                    WHERE (ppi.ett :: INT + ppi.cvl :: INT + ppi.ivl :: INT + ppi.uc :: INT + ppi.tirah_baring :: INT + ppi.vap :: INT + ppi.iadp :: INT + ppi.isk :: INT + ppi.dekubitus :: INT + ppi.plebitis :: INT + ppi.operasi :: INT + ppi.ido :: INT) != 0 
                    AND lp.status_terlayani != 'Batal' 
                    AND ri.konfirmasi_ranap = 'Ya' " . $param;

        $sql_icare    = "FROM sm_form_ppi AS ppi
                    JOIN sm_layanan_pendaftaran AS lp ON ppi.id_layanan_pendaftaran = lp.ID 
                    JOIN sm_pendaftaran AS pd ON lp.id_pendaftaran = pd.ID 
                    JOIN sm_pasien AS P ON pd.id_pasien = P.ID 
                    JOIN sm_intensive_care AS ri ON ri.id_layanan_pendaftaran = lp.ID 
                    JOIN sm_bangsal AS bg ON ri.id_bangsal = bg.ID 
                    join sm_kelas as k on (k.id = ri.id_kelas) 
                    WHERE (ppi.ett :: INT + ppi.cvl :: INT + ppi.ivl :: INT + ppi.uc :: INT + ppi.tirah_baring :: INT + ppi.vap :: INT + ppi.iadp :: INT + ppi.isk :: INT + ppi.dekubitus :: INT + ppi.plebitis :: INT + ppi.operasi :: INT + ppi.ido :: INT) != 0 
                    AND lp.status_terlayani != 'Batal' 
                    AND ri.konfirmasi_icare = 'Ya' " . $param;

        $order = " order by ri.waktu_masuk asc ";

        $query_ranap = $this->db->query($select . $sql_ranap . $order)->result();
        $query_icare = $this->db->query($select . $sql_icare . $order)->result();
        $marge = array_merge($query_ranap, $query_icare);

        if ($limit !== 0) :
            $marge = array_slice($marge, $start, $limit);
        endif;

        $result = $marge;
        foreach ($result as $i => $val) :
            $select_kultur = "SELECT kul.nama ";
            $select_antiobika = "SELECT ant.nama ";

            $query = "FROM sm_detail_form_ppi dppi
                    JOIN sm_form_ppi ppi on dppi.id_ppi = ppi.id
                    LEFT JOIN sm_kultur_ppi kul on dppi.id_kultur = kul.id
                    LEFT JOIN sm_antiobika_ppi ant on dppi.id_antiobika = ant.id
                    JOIN sm_pegawai pg on dppi.id_user = pg.id
                    WHERE ppi.id = '" . $val->id_ppi . "' ";

            $order_by = "ORDER BY dppi.created_at asc";

            $result[$i]->kultur = $this->db->query($select_kultur . $query . " AND dppi.id_kultur is not null " . $order_by)->result();
            $result[$i]->antiobika = $this->db->query($select_antiobika . $query . " AND dppi.id_antiobika is not null " . $order_by)->result();
        endforeach;

        $search["bangsal_search"] !== "" ? $unit = $this->db->where('id', $search['bangsal_search'], true)->select('nama')->get('sm_bangsal')->row()->nama :  $unit = "Semua Unit";

        $count_ranap = $this->db->query($count . $sql_ranap . ") as jml")->row()->count;
        $count_icare = $this->db->query($count . $sql_icare . ") as jml")->row()->count;

        $data["unit"]       = $unit;
        $data["data"]       = $result;
        $data["jumlah"]     = $count_ranap + $count_icare;
        $this->db->close();

        return $data;
    }

    function deleteDataPPI($id_ppi)
    {
        $this->db->trans_begin();
        $user_log = $this->session->userdata('id_translucent');

        $sql_log = "INSERT INTO sm_form_ppi_log (id_lama, id_layanan_pendaftaran, update_at, id_user, ett, cvl, ivl, uc, vap, iadp, isk, dekubitus, plebitis, tirah_baring, operasi, ido, keterangan, user_update, aksi, tanggal_input, id_bangsal)
        
                    SELECT id, id_layanan_pendaftaran, '" . $this->datetime . "' update_at, id_user, ett, cvl, ivl, uc, vap, iadp, isk, dekubitus, plebitis, tirah_baring, operasi, ido, keterangan,'" . $user_log . "' user_update, 'Hapus' aksi, tanggal_input, id_bangsal
                    FROM sm_form_ppi
                    WHERE id = '" . $id_ppi . "'";

        $this->db->query($sql_log);
        $this->db->where("id", $id_ppi)->delete("sm_form_ppi");

        if ($this->db->trans_status() === false) :
            return $this->db->trans_rollback();
        else :
            return $this->db->trans_commit();
        endif;
    }

    function deleteKulturAntiobika($id = null, $id_ppi)
    {
        // var_dump($id);
        // die();
        if (!empty($id)) {
            $param = " WHERE id = '" . $id . "'";
        } else {
            $param = " WHERE id_ppi = '" . $id_ppi . "'";
        }

        $this->db->trans_begin();
        $user_log = $this->session->userdata('id_translucent');

        $sql_log = "INSERT INTO sm_detail_form_ppi_log (id_lama, id_ppi, created_at, id_kultur, id_antiobika, id_user, aksi)
        
                    SELECT id, id_ppi, '" . $this->datetime . "' created_at, id_kultur, id_antiobika, '" . $user_log . "' id_user, 'Hapus' aksi
                    FROM sm_detail_form_ppi " . $param;

        $this->db->query($sql_log);
        if (!empty($id)) {
            $this->db->where("id", $id)->delete("sm_detail_form_ppi");
        } else {
            $this->db->where("id_ppi", $id_ppi)->delete("sm_detail_form_ppi");
        }

        if ($this->db->trans_status() === false) :
            return $this->db->trans_rollback();
        else :
            return $this->db->trans_commit();
        endif;
    }
}
