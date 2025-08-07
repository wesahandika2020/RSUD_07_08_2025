<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Farmakoterapi_model extends CI_Model
{


    function __construct()
    {
        parent::__construct();
        $this->table = 'sm_farmakoterapi as f';
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

    function getListDataFarmakoterapi($start = NULL, $limit = NULL, $search = NULL)
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
                order by id asc";
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

    function simpanDataFarmakoterapi($data)
    {
        return $this->db->insert($this->table, $data);
    }

    function updateDataFarmakoterapi($data, $id)
    {
        $this->db->where('id', $id, true)->update($this->table, $data);

        return $id;
    }

    function getDataFarmakoterapiById($id)
    {
        return $this->db->get_where($this->table, ['id' => $id])->row();
    }

    function deleteDataFarmakoterapi($id)
    {
        $this->db->where('id', $id, true);
        return $this->db->delete($this->table);
    }
}

/* End of file Signa.php */
