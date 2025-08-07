<?php defined('BASEPATH') or exit('No direct script access allowed');

class Tarif_perbekalan_kesehatan_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
        $this->table = 'sm_tarif_perbekalan_kesehatan as tpk';
    }

    function simpanDataTarifPKRT($data)
    {
        $this->db->insert($this->table, $data);
        $id = $this->db->insert_id();
        return $id;
    }

    function updateDataTarifPKRT($data, $id)
    {
        $this->db->where('id', $id, true)->update($this->table, $data);
        return $id;
    }

    function getListDataTarifPKRT($start, $limit, $search)
    {
        $this->db->select("tpk.id, tpk.id_perbekalan_kesehatan, tpk.id_kelas, tpk.nominal, tpk.keterangan, COALESCE(k.nama, 'Semua') as kelas, pk.nama")
            ->from($this->table)
            ->join('sm_perbekalan_kesehatan as pk', 'pk.id = tpk.id_perbekalan_kesehatan')
            ->join('sm_kelas as k', 'k.id = tpk.id_kelas', 'left') 
            ->order_by('pk.nama asc');

        if ($limit !== null) :
            $this->db->limit($limit, $start);
        endif;

        if ($search['pencarian'] !== '') :
            $this->db->like('LOWER(pk.nama)', strtolower($search['pencarian']));
        // $this->db->or_like('LOWER(k.nama)', strtolower($search['pencarian']));
        endif;

        $query = $this->db->get();
        $result['data'] = $query->result();
        $result['jumlah'] = $query->num_rows();
        return $result;
    }

    function getDataTarifPKRTById($id)
    {
        $this->db->select("tpk.id, tpk.id_perbekalan_kesehatan, tpk.id_kelas, tpk.nominal, tpk.keterangan, COALESCE(k.nama, 'Semua') as kelas, pk.nama")
            ->from($this->table)
            ->join('sm_perbekalan_kesehatan as pk', 'pk.id = tpk.id_perbekalan_kesehatan')
            ->join('sm_kelas as k', 'k.id = tpk.id_kelas', 'left') 
            ->where('tpk.id', $id);
        return $this->db->get()->row();
    }

    function deleteDataTarifPKRT($id)
    {
        $this->db->where('id', $id)->delete($this->table);
    }
}
