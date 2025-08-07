<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Master_form_rekam_medis_model extends CI_Model
{


    function __construct()
    {
        parent::__construct();
        $this->table = 'sm_form_rekam_medis_pasien as l';
    }

    private function getChild($params)
    {
        $sql = "select *, 
                (null) as child, 
                '' as jenis_formulir
                from " . $this->table . " 
                where id_parent='" . $params . "'";
        // order by cast(kode as varchar)";
        return $this->db->query($sql)->result();
    }

    function getListDataFormRekamMedis($limit = null, $start = null)
    {

        $q = '';

        if ($limit != null) :
            $limit = " limit " . $limit . " offset " . $start;
        else :
            $limit = '';
        endif;

        $sql_jenis_formulir = "select jf.*,  jf.nama,
                            (null) as child, 
                            '' as kode_formulir, 
                            '' as jenis_formulir
                            from sm_jenis_formulir jf
                            where jf.id is not null order by jf.nama";
        $root = $this->db->query($sql_jenis_formulir . $limit)->result();

        foreach ($root as $key => $val) :

            $sql_root = "select l.*,
                        COALESCE(l.kode_formulir, '') as kode_formulir,
                        jf.nama as jenis_formulir 
                        from sm_form_rekam_medis_pasien as l 
                        join sm_jenis_formulir jf on (jf.id = l.id_jenis_formulir)
                        where l.id_parent is null $q
                        and l.id_jenis_formulir = '" . $val->id . "'            
                        order by cast(kode_formulir as int4)";
            $child0 = $this->db->query($sql_root)->result();

            if (count($child0) > 0) :
                $root[$key]->child = $child0;
                foreach ($child0 as $key1 => $val1) :
                    $child = $this->getChild($val1->id);

                    if (count($child) > 0) :
                        $root[$key]->child[$key1]->child = $child;
                        foreach ($child as $key2 => $val2) :
                            $child2 = $this->getChild($val2->id);

                            if (count($child2) > 0) :
                                $root[$key]->child[$key1]->child[$key2]->child = $child2;
                                foreach ($child2 as $key3 => $val3) :
                                    $child3 = $this->getChild($val3->id);

                                    if (count($child3) > 0) :
                                        $root[$key]->child[$key1]->child[$key2]->child[$key3]->child = $child3;
                                        foreach ($child3 as $key4 => $val4) :
                                            $child4 = $this->getChild($val4->id);

                                            if (count($child4) > 0) :
                                                $root[$key]->child[$key1]->child[$key2]->child[$key3]->child[$key4]->child = $child4;
                                            endif;

                                        endforeach;
                                    endif;

                                endforeach;
                            endif;

                        endforeach;
                    endif;

                endforeach;
            endif;
        endforeach;

        // echo json_encode($root); die;
        $result['data'] = $root;
        $result['jumlah'] = $this->db->query($sql_jenis_formulir)->num_rows();
        return $result;
    }

    public function getDataFormRekamMedisByID($id, $id_jenis_formulir)
    {
        $dataByID = $this->db->select('frm.*, jf.nama as jenis_formulir')
            ->from('sm_form_rekam_medis_pasien frm')
            ->join('sm_jenis_formulir jf', 'frm.id_jenis_formulir = jf.id')
            ->where('frm.id', $id)
            ->get()->row();

        if ($dataByID->id_parent !== NULL) {
            $id_parent = $dataByID->id_parent;
            $dataByID->form_parent = $this->db->get_where('sm_form_rekam_medis_pasien', ['id' => $id_parent])->row()->nama;
        } else {
            $dataByID->form_parent = '';
        }

        return $dataByID;
    }

    function simpanDataFormulir($data)
    {
        if ($data['id_parent'] !== null) :
            $jenis = $this->db->where('id', $data['id_parent'], true)
                ->get($this->table)
                ->row();
            if ((!empty($jenis)) & ($data['id_jenis_formulir'] === null)) :
                $data['id_jenis_formulir'] = $jenis->id_jenis_formulir;
            endif;
        endif;
        return $this->db->insert($this->table, $data);
    }

    function updateDataFormulir($data)
    {
        // update
        $id = $data['id'];
        return $this->db->where('id', $id, true)->update($this->table, $data);
    }

    function deleteDataFormulir($id)
    {
        return $this->db->where('id', $id)->delete($this->table);
    }

    function getListDataFormRekamMedisSearch($limit, $start, $search)
    {
        $q = '';

        if ($search['nama'] !== '') {
            $q .= " and l.nama ilike '%" . $search['nama'] . "%' ";
        }

        if ($search['jenis_formulir'] !== '') {
            $q .= " and jf.id = '" . $search['jenis_formulir'] . "' ";
        }

        $limit = " limit " . $limit . " offset " . $start;

        $select = "select l.*, 
                    COALESCE(rmp.nama, '') as parent, 
                    u.nama as jenis_formulir ";
        $count = "select count(*) as count ";
        $sql = "from " . $this->table . "
                left join sm_form_rekam_medis_pasien rmp on (rmp.id = l.id_parent) 
                join sm_jenis_formulir jf on (jf.id = l.id_jenis_formulir)
                join sm_unit u on jf.id_unit = u.id
                where l.id is not null $q";
        $order = " order by l.kode_formulir";
        $query = $this->db->query($select . $sql . $order . $limit);
        $result['data'] = $query->result();
        $result['jumlah'] = $this->db->query($count . $sql . $q)->row()->count;
        return $result;
    }

    // function getTglKunjungan($q, $start, $limit) {

    //     var_dump('zzz'); exit(1);
    //     $limit = " limit " . $limit . " offset " . $start;
    //     $where = "";
    //     if ($q !== "") :
    //         $where = "where id_pasien= ".$q;
    //         // if (is_numeric($q)) :
    //         //     $where .= "id ilike ('%".$q."')";
    //         // else :
    //         //     $where .= "p.nama ilike ('".$q."%')";
    //         // endif;
    //     endif;

    //     $count = "select count(id) as count ";
    //     $select = "select * ";
    //     $sql = "from sm_pendaftaran .$where ";
    //     $order = " order by p.id";

    //     $data['data'] = $this->db->query($select.$sql.$order.$limit)->result();
    //     $data['total'] = $this->db->query($count.$sql)->row()->count;
    //     $this->db->close();
    //     return $data;
    // }

    function getTglKunjungan($idpasien)
    {
        $sql = "SELECT p.ID,to_char(p.tanggal_daftar, 'DD-MM-YYYY' ) tanggal,
                case when s.nama is null then p.jenis_pendaftaran else concat( p.jenis_pendaftaran, ' (', s.nama ,')') end jenis_pendaftaran
                FROM sm_pendaftaran p
                join sm_layanan_pendaftaran lp on p.id=lp.id_pendaftaran
                left join sm_spesialisasi s on lp.id_unit_layanan=s.id
                WHERE p.status != 'Batal' AND p.id_pasien = '" . $idpasien . "' 
                GROUP BY p.ID, tanggal, s.nama ORDER BY p.tanggal_daftar DESC ";
        $query = $this->db->query($sql);
        $this->db->close();
        return $query;
    }

    function getListDataLayananPendaftaran($limit = 0, $start = 0, $search)
    {
        $result['hasil']['igd']     = $this->sqlDataLayananIGD($search);
        $result['hasil']['ranap']   = $this->sqlDataLayananRanap($search);

        return $result;
        $this->db->close();
    }

    function sqlDataLayananIGD($search)
    {
        $this->db->select("p.id id_pendaftaran,lp.id id_layanan_pendaftaran, 
                            case when s.nama <> ''
                            then s.nama else lp.jenis_layanan end nama_unit,
                            lp.jenis_layanan ")
            ->from('sm_pendaftaran p ')
            ->join('sm_layanan_pendaftaran lp', 'p.id=lp.id_pendaftaran')
            ->join('sm_spesialisasi s', 'lp.id_unit_layanan=s.id', 'left')
            ->where('lp.jenis_layanan', 'IGD', true)
            ->where('p.id', $search['id_pendaftaran'], true);
        return $this->db->get()->result();
    }

    function sqlDataLayananRanap($search)
    {
        $this->db->select("p.id,lp.id, 
                            case when s.nama <> ''
                            then s.nama else lp.jenis_layanan end nama_unit,
                            lp.jenis_layanan ")

            ->from('sm_pendaftaran p ')
            ->join('sm_layanan_pendaftaran lp', 'p.id=lp.id_pendaftaran')
            ->join('sm_spesialisasi s', 'lp.id_unit_layanan=s.id', 'left')
            ->where('lp.jenis_layanan', 'Rawat Inap', true)
            ->where('p.id', $search['id_pendaftaran'], true)
            ->order_by('lp.id', 'DESC')
            ->limit(1);
        return $this->db->get()->result();
    }

    function get_table_forms()
    {
        $this->db->select('*')
            ->from('sm_form_rekam_medis_pasien')
            ->where('table_name !=', '');

        return $this->db->get()->result();
    }

    function updateStatus($data)
    {
        if ($data['status'] == 1) {
            $this->db->where('id', $data['id'], true);
            $this->db->update('sm_form_rekam_medis_pasien', ['is_active' => 0]);
        } else if ($data['status'] == 0) {
            $this->db->where('id', $data['id'], true);
            $this->db->update('sm_form_rekam_medis_pasien', ['is_active' => 1]);
        }
        return $this->db->affected_rows();
    }
}
