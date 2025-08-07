<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Layanan_model extends CI_Model {

    
    function __construct()
    {
        parent::__construct();
        $this->table = 'sm_layanan as l';
    }
    
    private function getChild($params)
    {
        $sql = "select *, 
                (null) as child, 
                COALESCE(icd_ix, '') as icd_ix, 
                '' as jenis_pemeriksaan, 
                replace(kode, '.', '') as coding
                from " . $this->table . " 
                where id_parent='" . $params . "'";
                // order by cast(kode as varchar)";
        return $this->db->query($sql)->result();
    }

    function getListDataLayanan($limit=null, $start=null)
    {
        $q = '';

        if ($limit != null) :
            $limit = " limit " . $limit . " offset " . $start;
        else :
            $limit = '';
        endif;

        $sql_jenis_pemeriksaan = "select *, 
                        '' as kode, (null) as child, 
                        '' as icd_ix, 
                        '' as jenis_pemeriksaan 
                        from sm_jenis_pemeriksaan 
                        where id is not null order by nama";
        $root = $this->db->query($sql_jenis_pemeriksaan . $limit)->result();
        
        foreach ($root as $key => $val) :

            $sql_root = "select l.*, 
                        (null) as child, 
                        COALESCE(l.icd_ix, '') as icd_ix, 
                        COALESCE(jp.nama, '') as jenis_pemeriksaan 
                        from " . $this->table . " 
                        join sm_jenis_pemeriksaan jp on (jp.id = l.id_jenis_pemeriksaan) 
                        where l.id_parent is null $q 
                        and l.id_jenis_pemeriksaan = '" . $val->id . "' 
                        order by cast(kode as int4)";
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
        $result['jumlah'] = $this->db->query($sql_jenis_pemeriksaan)->num_rows();
        return $result;
    }

    function getListDataLayananSearch($limit, $start, $search)
    {
        $q = '';

        if ($search['nama'] !== '') {
            $q .= " and l.nama ilike '%" . $search['nama'] . "%' ";
        }

        if ($search['jenis_pemeriksaan'] !== '') {
            $q .= " and jp.id = '" . $search['jenis_pemeriksaan'] . "' ";
        }

        $limit = " limit " . $limit . " offset " . $start;

        $select = "select l.*, 
                    COALESCE(ll.nama, '') as parent, 
                    jp.nama as jenis_pemeriksaan ";
        $count = "select count(*) as count ";
        $sql = "from " . $this->table . "
                left join sm_layanan ll on (ll.id = l.id_parent) 
                join sm_jenis_pemeriksaan jp on (jp.id = l.id_jenis_pemeriksaan)
                where l.id is not null $q";
        $order = " order by l.kode";
        $query = $this->db->query($select . $sql . $order . $limit);
        $result['data'] = $query->result();
        $result['jumlah'] = $this->db->query($count . $sql . $q)->row()->count;
        return $result;
    }

    function simpanDataLayanan($data)
    {
        if ($data['id_parent'] !== null) :
            $jenis = $this->db->where('id', $data['id_parent'], true)
                ->get($this->table)
                ->row();
            if ((!empty($jenis)) & ($data['id_jenis_pemeriksaan'] === null)) :
                $data['id_jenis_pemeriksaan'] = $jenis->id_jenis_pemeriksaan;
            endif;
        endif;

        return $this->db->insert($this->table, $data);
        
    }

    function updateDataLayanan($data)
    {
       
        // update
        $id = $data['id'];
        return $this->db->where('id', $id, true)->update($this->table, $data);
    }

    function getDataLayananById($id)
    {
        $this->db->select("l.*, NULLIF(jp.nama, '') as jenis_pemeriksaan, NULLIF(lp.nama, '') as parent");
        $this->db->from($this->table);
        $this->db->join('sm_jenis_pemeriksaan as jp', 'jp.id = l.id_jenis_pemeriksaan', 'left');
        $this->db->join('sm_layanan as lp', 'lp.id = l.id_parent', 'left');
        $this->db->where('l.id', $id);
        return $this->db->get()->row();
    }

    function deleteDataLayanan($id)
    {
        return $this->db->where('id', $id)->delete($this->table);
    }
}
