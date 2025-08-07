<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kamar_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->table = 'sm_ruang as r';
    }

    private function sqlKamar($search)
    {
        $this->db->select("r.*, concat(kkb.kode, ' (', kkb.nama, ')') as kode_kelas, b.nama as bangsal, COALESCE(r.penghuni, '') as penghuni, k.nama as kelas");
        $this->db->from($this->table);
        $this->db->join('sm_bangsal as b', 'b.id = r.id_bangsal');
        $this->db->join('sm_kelas as k', 'k.id = r.id_kelas');
        $this->db->join('sm_kode_kelas_bed as kkb', 'r.id_kode_kelas = kkb.id');
        
        if ($search['keyword'] !== '') :
            $this->db->like('LOWER(b.nama)', strtolower($search['keyword']));
        endif;
        
        return  $this->db->order_by('b.nama, r.no_ruang', 'asc');
    }

    private function _listKamar($start, $limit, $search)
    {
        $this->sqlKamar($search);
        if ($limit !== 0) :
            $this->db->limit($limit, $start);
        endif;

        return $this->db->get()->result();
    }

    function getListDataKamar($start, $limit, $search)
    {
        $result['data'] = $this->_listKamar($start, $limit, $search);
        $result['jumlah'] = $this->sqlKamar($search)->get()->num_rows();
        return $result;

        $this->db->close();
    }

    function updateDataKamar($data, $jumlah_ruang)
    {
        if (!$this->input->post('id')) :
            $jml = $this->cekNoKamar($data["id_bangsal"], $data["id_kelas"]);
            if ($jumlah_ruang !== "") :
                for ($i = $jml + 1; $i <= $jml + $jumlah_ruang; $i++) :
                    $data["no_ruang"] = $i;
                    $this->db->insert("sm_ruang", $data);
                endfor;
            endif;
            $id = NULL;
        else :
            $id = $this->input->post('id');
            $data['id'] = $id;
            $this->db->where("id", $data["id"])->update("sm_ruang", $data);
        endif;
        return $id;
    }

    function getDataKamarById($id)
    {
        $this->db->select("r.*, b.nama as bangsal, COALESCE(r.penghuni, '') as penghuni, k.nama as kelas");
        $this->db->from($this->table);
        $this->db->join('sm_bangsal as b', 'b.id = r.id_bangsal');
        $this->db->join('sm_kelas as k', 'k.id = r.id_kelas');
        $this->db->where('r.id', $id, true);
        return $this->db->get()->row();
    }

    function deleteDataKamar($id)
    {
        $this->db->where('id', $id, true);
        return $this->db->delete($this->table);
    }

    function getNoKamar($bangsal, $kelas)
    {
        $sql = "select (max(no_ruang) + 1) as no
                from sm_ruang
                where id_bangsal = '" . $bangsal . "'
                and id_kelas = '" . $kelas . "'";
        $no = $this->db->query($sql)->row()->no;
        if ($no === NULL) :
            $no = 1;
        endif;
        return $no;
    }

    function cekNoKamar($bangsal, $kelas)
    {
        $sql = "select max(no_ruang) as jumlah
                from sm_ruang
                where id_bangsal = '" . $bangsal . "' 
                and id_kelas = '" . $kelas . "' ";
        $num = $this->db->query($sql)->row()->jumlah;
        return (int) $num;
    }
}

