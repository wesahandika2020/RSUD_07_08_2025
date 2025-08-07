<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Waktu_pemberian_obat_model extends CI_Model {


	function __construct()
	{
		parent::__construct();
		$this->table = 'sm_waktu_pemberian_obat as wpo';
	}

	function getListDataWaktuPemberianObat($start, $limit, $search)
	{
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->limit($limit, $start);

		if ($search['keyword'] !== '') :
			$this->db->like('LOWER(waktu_pemberian)', strtolower($search['keyword']));
			$this->db->or_like('LOWER(keterangan)', strtolower($search['keyword']));
		endif;

		$result['data'] = $this->db->get()->result();
		$result['jumlah'] = $this->db->count_all_results($this->table);
		return $result;
	}

	function simpanDataWaktuPemberianObat($data)
	{
		return $this->db->insert($this->table, $data);
	}

	function updateDataWaktuPemberianObat($data, $id)
	{
		$this->db->where('id', $id, true)->update($this->table, $data);

		return $id;
	}

	function getDataWaktuPemberianObatById($id)
	{
		return $this->db->get_where($this->table, ['id' => $id])->row();
	}

	function deleteDataWaktuPemberianObat($id)
	{
		$this->db->where('id', $id, true);
		return $this->db->delete($this->table);
	}


}
