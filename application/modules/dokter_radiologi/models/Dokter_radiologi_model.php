<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dokter_radiologi_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
        $this->table = 'sm_dokter_radiologi as sd';
    }

    function ambilDataDokter($start, $limit, $search)
    {
        $this->db->select('sd.*, sp.nama');
        $this->db->from($this->table);
        $this->db->join('sm_tenaga_medis as tm', 'tm.id = sd.id_dokter', 'left');
        $this->db->join('sm_pegawai as sp', 'sp.id = tm.id_pegawai', 'left');
        $this->db->order_by('sp.nama', 'asc');
        $this->db->limit($limit, $start);

        if ($search['keyword'] !== '') {
            $this->db->like('LOWER(sd.username)', strtolower($search['keyword']));
            $this->db->or_like('LOWER(sp.nama)', strtolower($search['keyword']));
        }                    

        $result['data'] = $this->db->get()->result();
        $result['jumlah'] = $this->db->count_all_results($this->table);
        return $result;
    }

    function simpanUserDokter($params)
    {
        $this->db->insert('sm_dokter_radiologi', $params);
        $id = $this->db->insert_id();

        return $id;

    }

    function cekDataUsername($id)
    {
        return $this->db->select('sd.*, sp.nama, tm.id as idDokter')
                    ->from($this->table)
                    ->join('sm_tenaga_medis as tm', 'tm.id = sd.id_dokter', 'left')
                    ->join('sm_pegawai as sp', 'sp.id = tm.id_pegawai', 'left')
                    ->where('sd.id', $id)
                    ->get()
                    ->row();
        $this->db->close();
    }

    function deleteUsername($id)
    {
        $this->db->where('id', $id, true);
        return $this->db->delete($this->table);
    }

    function userDokter($q, $start, $limit)
    {
        $limit = " limit " . $limit . " offset " . $start;
        $w = " (nama ilike ('%$q%')) ";
        $sql = "select tm.id, sp.nama
                from sm_tenaga_medis tm
                left join sm_pegawai sp on tm.id_pegawai = sp.id
                where (tm.id_spesialisasi = 33 or tm.id_spesialisasi = 53)
                and $w order by nama";

        $data['data'] = $this->db->query($sql . $limit)->result();
        $data['total'] = $this->db->query($sql)->num_rows();
        return $data;
    }
    
}

/* End of file Diet_model.php */
