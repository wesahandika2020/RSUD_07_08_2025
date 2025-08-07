<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kecamatan_model extends CI_Model
{
    function getListDataKecamatan($start, $limit, $search)
    {
        $this->db->select('kec.*, p.nama as provinsi, kk.nama as kotakabupaten');
        $this->db->from('sm_kecamatan as kec');
        $this->db->join('sm_kota_kabupaten as kk', 'kec.id_kota_kabupaten = kk.id');
        $this->db->join('sm_provinsi as p', 'kk.id_provinsi = p.id');
        $this->db->where('kec.id IS NOT NULL');
        $this->db->order_by('kec.nama', 'asc');
        $this->db->limit($limit, $start);

        if ($search['keyword'] !== '') :
            $this->db->like('LOWER(kec.nama)', strtolower($search['keyword']));
            $this->db->or_like('LOWER(kk.nama)', strtolower($search['keyword']));
            $this->db->or_like('LOWER(p.nama)', strtolower($search['keyword']));
        endif;

        $result['data'] = $this->db->get()->result();
        $result['jumlah'] = $this->db->count_all_results('sm_kecamatan');
        return $result;
    }

    function simpanData($data)
    {
        return $this->db->insert('sm_kecamatan', $data);
    }

    function updateData($data)
    {
        $id = $data['id'];
        $this->db->where('id', $id, true)->update('sm_kecamatan', $data);

        return $id;
    }

    function getDataKecamatanById($id)
    {
        $this->db->select('kec.*, p.nama as provinsi, kk.nama as kotakabupaten');
        $this->db->from('sm_kecamatan as kec');
        $this->db->join('sm_kota_kabupaten as kk', 'kec.id_kota_kabupaten = kk.id');
        $this->db->join('sm_provinsi as p', 'kk.id_provinsi = p.id');
        $this->db->where('kec.id', $id, true);
        return $this->db->get()->row();
    }

    function deleteKecamatan($id)
    {
        $this->db->where('id', $id, true);
        return $this->db->delete('sm_kecamatan');
    }
}
