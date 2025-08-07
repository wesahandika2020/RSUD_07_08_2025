<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kota_kabupaten_model extends CI_Model
{
    function getListDataKotaKabupaten($start, $limit, $search)
    {
        $this->db->select('kk.*, p.nama as provinsi');
        $this->db->from('sm_kota_kabupaten as kk');
        $this->db->join('sm_provinsi as p', 'kk.id_provinsi = p.id');
        $this->db->where('kk.id IS NOT NULL');
        $this->db->order_by('kk.nama', 'asc');
        $this->db->limit($limit, $start);

        if ($search['keyword'] !== '') :
            $this->db->like('LOWER(kk.nama)', strtolower($search['keyword']));
            $this->db->or_like('LOWER(p.nama)', strtolower($search['keyword']));
        endif;

        $result['data'] = $this->db->get()->result();
        $result['jumlah'] = $this->db->count_all_results('sm_kota_kabupaten');
        return $result;
    }

    function simpanData($data)
    {
        return $this->db->insert('sm_kota_kabupaten', $data);
    }

    function updateData($data)
    {
        $id = $data['id'];
        $this->db->where('id', $id, true)->update('sm_kota_kabupaten', $data);

        return $id;
    }

    function getDataKotaKabupatenById($id)
    {
        $this->db->select('kk.*, p.nama as provinsi');
        $this->db->from('sm_kota_kabupaten as kk');
        $this->db->join('sm_provinsi as p', 'kk.id_provinsi = p.id');
        $this->db->where('kk.id', $id, true);
        return $this->db->get()->row();
    }

    function deleteKotaKabupaten($id)
    {
        $this->db->where('id', $id, true);
        return $this->db->delete('sm_kota_kabupaten');
    }


}
