<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Instalasi_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->table = 'sm_instalasi as i';
    }

    private function sqlInstalasi($search)
    {
        $this->db->select('i.*');
        $this->db->select('p.nama as kepala_instalasi');
        $this->db->from($this->table);
        $this->db->join('sm_pegawai as p', 'i.id_pegawai = p.id', 'left');
        $this->db->where('i.id IS NOT NULL');

        if ($search['keyword'] !== '') :
            $this->db->like('LOWER(i.nama)', strtolower($search['keyword']));
            $this->db->or_like('LOWER(p.nama)', strtolower($search['keyword']));
        endif;
        return $this->db->order_by('i.nama', 'asc');
    }

    private function _listInstalasi($start, $limit, $search)
    {
        $this->sqlInstalasi($search);
        if ($limit !== 0) :
            $this->db->limit($limit, $start);
        endif;
        return $this->db->get()->result();
    }

    function getListDataInstalasi($start, $limit, $search)
    {
        $result['data'] = $this->_listInstalasi($start, $limit, $search);
        $result['jumlah'] = $this->sqlInstalasi($search)->get()->num_rows();
        $this->db->close();
        return $result;
    }

    function simpanData($data)
    {
        return $this->db->insert($this->table, $data);
    }

    function updateData($data)
    {
        $id = $data['id'];
        $this->db->where('id', $id, true)->update($this->table, $data);

        return $id;
    }

    function getDataInstalasiById($id)
    {
        $this->db->select('i.*');
        $this->db->select('p.nama as kepala_instalasi');
        $this->db->from($this->table);
        $this->db->join('sm_pegawai as p', 'i.id_pegawai = p.id', 'left');
        $this->db->where(['i.id' => $id]);
        return $this->db->get()->row();
    }

    function deleteInstalasi($id)
    {
        $this->db->where('id', $id, true);
        return $this->db->delete($this->table);
    }


    
}
