<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Rekening_model extends CI_Model {

    
    function __construct()
    {
        parent::__construct();
        $this->table = 'sm_rekening as r';    
    }

    private function getChild($params)
    {
        $sql = "select *,
                (null) as child, 
                cast(replace(kode, '.', '') as integer) as coding 
                from " . $this->table . " 
                where id_parent = '" . $params . "' 
                order by coding asc";
        return $this->db->query($sql)->result();
    }
    function getListDataRekening($limit = null, $start = null, $search = null)
    {
        $params = '';

        if (isset($search['id'])) :
            $params .= " and id = '" . $search['id'] . "'";
        endif;

        if (isset($search['nama']) and $search['nama'] !== '') :
            $params .= " and nama = '" . $search['nama'] . "'";
        endif;

        if ($limit != null) :
            $limit = " limit " . $limit . " offset " . $start; 
        else :
            $limit = '';
        endif;

        $sql = "select *,
                (null) as child
                from " . $this->table . " 
                where id_parent is null $params 
                order by kode asc";
        $root = $this->db->query($sql . $limit)->result();
        
        foreach ($root as $key => $val) :
            $child = $this->getChild($val->id);

            // child
            if (count($child) > 0) :
                $root[$key]->child = $child;

                foreach ($child as $key2 => $val2) :
                    $child2 = $this->getChild($val2->id);

                    // child
                    if (count($child2) > 0) :
                        $root[$key]->child[$key2]->child = $child2;

                        foreach ($child2 as $key3 => $val3) :
                            $child3 = $this->getChild($val3->id);

                            if (count($child3) > 0) :
                                $root[$key]->child[$key2]->child[$key3]->child = $child3;

                                foreach ($child3 as $key4 => $val4) :
                                    $child4 = $this->getChild($val4->id);

                                    if (count($child4) > 0) :
                                        $root[$key]->child[$key2]->child[$key3]->child[$key4]->child = $child4;

                                        foreach ($child4 as $key5 => $val5) :
                                            $child5 = $this->getChild($val5->id);

                                            if (count($child5) > 0) :
                                                $root[$key]->child[$key2]->child[$key3]->child[$key4]->child[$key5]->child = $child5;

                                                foreach ($child5 as $key6 => $val6) :
                                                    $child6 = $this->getChild($val6->id);

                                                    if (count($child6) > 0) :
                                                        $root[$key]->child[$key2]->child[$key3]->child[$key4]->child[$key5]->child[$key6]->child = $child6;

                                                        foreach ($child6 as $key7 => $val7) :
                                                            $child7 = $this->getChild($val7->id);

                                                            if (count($child7) > 0) :
                                                                $root[$key]->child[$key2]->child[$key3]->child[$key4]->child[$key5]->child[$key6]->child[$key7]->child = $child7; 

                                                                foreach ($child7 as $key8 => $val8) :
                                                                    $child8 = $this->getChild($val8->id);

                                                                    if (count($child8) > 0) :
                                                                        $root[$key]->child[$key2]->child[$key3]->child[$key4]->child[$key5]->child[$key6]->child[$key7]->child[$key8]->child = $child8;
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
                            endif;
                        endforeach;
                    endif;
                endforeach;
            endif;
        endforeach;

        $result['data']   = $root;
        $result['jumlah'] = $this->db->query($sql)->num_rows();
        return $result;
    }

    function getAllListDataRekening($limit, $start, $search)
    {
        $params = NULL;

        if ($search['kode'] !== '') :
            $params .= " and (replace(r.kode, '.', '') ilike '" . $search['kode'] . "%' or r.kode ilike '" . $search['kode'] . "%')";
        endif;

        if ($search['nama'] !== '') :
            $params .= " and r.nama ilike '%" . $search['nama'] . "%'";
        endif;

        $select = "select r.*,
                    rr.kode as kode_parent,
                    rr.nama as nama_parent ";
        $count = "select count(*) as count ";
        $sql = "from " . $this->table . " 
                left join sm_rekening as rr on (r.id_parent = rr.id) 
                where r.id is not null $params";
        $limitation = " limit " . $limit . " offset " . $start;
        $result['data']   = $this->db->query($select . $sql . $limitation)->result();
        $result['jumlah'] = $this->db->query($count . $sql)->num_rows();
        return $result;
    }

    function simpanData($data)
    {
        return $this->db->insert($this->table, $data);
    }

    function updateData($data, $id)
    {
        return $this->db->where('id', $id, true)->update($this->table, $data);
    }
    
    function deleteDataRekening($id)
    {
        return $this->db->where('id', $id)->delete($this->table);
    }

    function getDataRekeningById($id)
    {
        $this->db->select("r.*, 
                        COALESCE(NULLIF(rr.kode, ''), '') as kode_parent, 
                        COALESCE(NULLIF(rr.nama, ''), '') as nama_parent");
        $this->db->from($this->table);
        $this->db->join('sm_rekening as rr', 'r.id_parent = rr.id', 'left');
        $this->db->where('r.id', $id);
        return $this->db->get()->row();
    }

    function aktifasiDataRekening($params)
    {
        // var_dump($params['is_active']); die;
        $rows = $this->db->get_where($this->table, array('id_parent' => $params['id']))->result();

        $this->db->where('id', $params['id']);
        $this->db->update($this->table, array('is_active' => $params['is_active']));

        $this->db->where('id_parent', $params['id']);
        $this->db->update($this->table, array('is_active' => $params['is_active']));
        if (count($rows) > 0) :
            foreach ($rows as $key => $value) :
                $parameter = [
                    'id' => $value->id,
                    'is_active' => $params['is_active']
                ];
                return $this->aktifasiDataRekening($parameter);
            endforeach;
        endif;
    }
    
}