<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kelurahan_model extends CI_Model
{
    function getListDataKelurahan($start, $limit, $search)
    {
        $this->db->select('kel.*, p.nama as provinsi, kk.nama as kotakabupaten, kec.nama as kecamatan');
        // $this->db->select('kel.*, kec.nama as kecamatan');
        $this->db->from('sm_kelurahan as kel');
        $this->db->join('sm_kecamatan as kec', 'kel.id_kecamatan = kec.id');
        $this->db->join('sm_kota_kabupaten as kk', 'kec.id_kota_kabupaten = kk.id');
        $this->db->join('sm_provinsi as p', 'kk.id_provinsi = p.id');
        $this->db->where('kel.id IS NOT NULL');
        $this->db->order_by('kel.nama', 'asc');

        $this->db->limit($limit, $start);
        
        if ($search['keyword'] !== '') :
            $this->db->like('LOWER(kel.nama)', strtolower($search['keyword']));
            $this->db->or_like('LOWER(kec.nama)', strtolower($search['keyword']));
            $this->db->or_like('LOWER(kk.nama)', strtolower($search['keyword']));
            $this->db->or_like('LOWER(p.nama)', strtolower($search['keyword']));
        endif;

        $result['data'] = $this->db->get()->result();
        $result['jumlah'] = $this->db->count_all_results('sm_kelurahan');
        return $result;
    }

    function simpanData($data)
    {
        return $this->db->insert('sm_kelurahan', $data);
    }

    function updateData($data)
    {
        $id = $data['id'];
        $this->db->where('id', $id, true)->update('sm_kelurahan', $data);

        return $id;
    }

    function getDataKelurahanById($id)
    {
        $this->db->select('kel.*, p.nama as provinsi, kk.nama as kotakabupaten, kec.nama as kecamatan');
        $this->db->from('sm_kelurahan as kel');
        $this->db->join('sm_kecamatan as kec', 'kel.id_kecamatan = kec.id');
        $this->db->join('sm_kota_kabupaten as kk', 'kec.id_kota_kabupaten = kk.id');
        $this->db->join('sm_provinsi as p', 'kk.id_provinsi = p.id');
        $this->db->where('kel.id', $id, true);
        return $this->db->get()->row();
    }

    function deleteKelurahan($id)
    {
        $this->db->where('id', $id, true);
        return $this->db->delete('sm_kelurahan');
    }
}
