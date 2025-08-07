<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->table = 'sm_pegawai as p';
    }

    function getListDataPegawai($start, $limit, $search)
    {
        $this->db->select("p.*, coalesce(p.nip, '-') as nip, kk.nama as kotakabupaten, coalesce(jab.nama, '-') as jabatan");
        $this->db->from($this->table);
        $this->db->join('sm_kota_kabupaten as kk', 'p.id_kota_kabupaten = kk.id', 'left', true);
        $this->db->join('sm_jabatan as jab', 'p.id_jabatan = jab.id', 'left', true);
        $this->db->where('p.id IS NOT NULL');
        $this->db->order_by('p.nama', 'asc');
        $this->db->limit($limit, $start);

        if ($search['keyword'] !== '') :
            $this->db->like('LOWER(p.nama)', strtolower($search['keyword']));
            $this->db->or_like('LOWER(jab.nama)', strtolower($search['keyword']));
        endif;

        $result['data'] = $this->db->get()->result();
        $result['jumlah'] = $this->db->count_all_results($this->table);
        return $result;
    }

    function getDataPegawaiById($id)
    {
        $this->db->select("p.*, coalesce(p.nip, '-'), kk.nama as kotakabupaten, coalesce(jab.nama, '-') as jabatan");
        $this->db->from($this->table);
        $this->db->join('sm_kota_kabupaten as kk', 'p.id_kota_kabupaten = kk.id', 'left', true);
        $this->db->join('sm_jabatan as jab', 'p.id_jabatan = jab.id', 'left', true);
        $this->db->where('p.id', $id, true);
        return $this->db->get()->row();
    }

    function simpanData($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    function updateData($data)
    {
        $id = $data['id'];
        $this->db->where('id', $id, true)->update($this->table, $data);

        return $id;
    }

    function deletePegawai($id)
    {
        $data = $this->db->get_where($this->table, ['id' => $id])->row();

        if ($data->profil != '' || $data->profil != NULL) :
            unlink('resources/images/avatars/' . $data->profil . '.' . $data->type);
        endif;

        $this->db->where('id', $id, true);
        return $this->db->delete($this->table);
    }

    function getAutoPegawai($q, $start, $limit)
    {
        $limit = " limit " . $limit . " offset " . $start;
        $sql   = "select p.*, jab.nama as jabatan
                  from " . $this->table . "
                  join sm_jabatan jab on (p.id_jabatan = jab.id)
                  where p.nama ilike ('%$q%')  order by p.nama ";
        $data['data'] = $this->db->query($sql . $limit)->result();
        $data['total'] = $this->db->query($sql)->num_rows();
        return $data;
    }

    // @createdBy Berliana Putri Hermawan
    // @createdAt 23-04-2021
    function getDataPegawaiByNip($nip)
    {        
        $this->db->select("p.*");
        $this->db->from($this->table);        
        $this->db->where('p.nip', $nip, true);
        return $this->db->get()->row();
    }
}
