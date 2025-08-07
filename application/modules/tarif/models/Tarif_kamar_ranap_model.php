<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Tarif_kamar_ranap_model extends CI_Model {

	function __construct()
	{
		parent::__construct();
		$this->table = 'sm_tarif_kamar_ranap as tkr';
	}
	
	function simpanDataTarifKamarRanap($data)
    {
        $this->db->insert($this->table, $data);
        $id = $this->db->insert_id();
        return $id;
    }

    function updateDataTarifKamarRanap($data, $id)
    {
        $this->db->where('id', $id, true)->update($this->table, $data);
        return $id;
    }
    
    private function sqlTarifKamarRanap($search)
    {
        $this->db->select("tkr.id, tkr.id_bangsal, tkr.id_kelas, tkr.nominal, tkr.keterangan, COALESCE(k.nama, 'Semua') as kelas, b.nama, b.kode")
                ->from($this->table)
                ->join('sm_bangsal as b', 'b.id = tkr.id_bangsal')
                ->join('sm_kelas as k', 'k.id = tkr.id_kelas', 'left');

        if ($search['pencarian'] !== '') :
            $this->db->like('LOWER(b.nama)', strtolower($search['pencarian']));
            $this->db->or_like('LOWER(k.nama)', strtolower($search['pencarian']));
        endif;

        return  $this->db->order_by('b.nama asc');
    }

    private function _listTarifKamarRanap($limit = 0, $start = 0, $search)
    {
        $this->sqlTarifKamarRanap($search);
        if ($limit !== 0) :
            $this->db->limit($limit, $start);
        endif;

        return $this->db->get()->result();
        // $this->db->get(); echo $this->db->last_query(); exit();
    }

    function getListDataTarifKamarRanap($limit = 0, $start = 0, $search)
    {
        $result['data'] = $this->_listTarifKamarRanap($limit, $start, $search);
        $result['jumlah'] = $this->sqlTarifKamarRanap($search)->get()->num_rows();
        return $result;

        $this->db->close();
    }

    function getDataTarifKamarRanapById($id)
    {
        $this->db->select("tkr.id, tkr.id_bangsal, tkr.id_kelas, tkr.nominal, tkr.keterangan, COALESCE(k.nama, 'Semua') as kelas, b.nama, b.kode")
                ->from($this->table)
                ->join('sm_bangsal as b', 'b.id = tkr.id_bangsal')
                ->join('sm_kelas as k', 'k.id = tkr.id_kelas', 'left') 
                ->where('tkr.id', $id);
        return $this->db->get()->row();
        // echo $this->db->last_query(); die;
	}
	
	function deleteDataTarifKamarRanap($id)
    {
        $this->db->where('id', $id)->delete($this->table);
    }
}

/* End of file Tarif_kamar_ranap_model.php */
