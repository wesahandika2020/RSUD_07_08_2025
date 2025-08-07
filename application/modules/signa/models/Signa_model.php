<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Signa_model extends CI_Model {


    function __construct()
    {
        parent::__construct();
        $this->table = 'sm_aturan_pakai_obat as apo';
    }

    function getListDataSignaObat($start, $limit, $search)
    {
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->where('id IS NOT NULL');
        $this->db->order_by('signa', 'asc');
        $this->db->limit($limit, $start);

        if ($search['keyword'] !== '') :
            $this->db->like('LOWER(signa)', strtolower($search['keyword']));
            $this->db->or_like('LOWER(keterangan)', strtolower($search['keyword']));
        endif;

        $result['data'] = $this->db->get()->result();
        $result['jumlah'] = $this->db->count_all_results($this->table);
        return $result;
    }

    function simpanDataSignaObat($data)
    {
        return $this->db->insert($this->table, $data);
    }

    function updateDataSignaObat($data, $id)
    {
        $this->db->where('id', $id, true)->update($this->table, $data);

        return $id;
    }

    function getDataSignaObatById($id)
    {
        return $this->db->get_where($this->table, ['id' => $id])->row();
    }

    function deleteDataSignaObat($id)
    {
        $this->db->where('id', $id, true);
        return $this->db->delete($this->table);
    }
    

}

/* End of file Signa.php */
