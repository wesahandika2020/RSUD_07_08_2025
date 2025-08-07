<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Report_tracer_model extends CI_Model {

	function __construct()
	{
		parent::__construct();
		
	}
	
	// List Average Ready
	function countAverageReadyBRM($tanggal)
	{
		$sql = "select COALESCE(round(SUM(DATE_PART('minute', tr.waktu_order::timestamp - tr.waktu_ready::timestamp)) / COUNT (tr.ID)), 0) as avg 
				from sm_tracer as tr 
				where date(tr.waktu_order) = '" . $tanggal . "' 
				and tr.waktu_ready is NOT NULL ";
		$query = $this->db->query($sql)->row();
		return (double) $query->avg;
	}

	private function sqlAverageReadyBRM($search)
	{
		$this->db->select("DISTINCT ON (tr.waktu_order)
			date(tr.waktu_order) as tanggal, 0 as avg
		");
		$this->db->from('sm_tracer as tr');
		$this->db->where('tr.id is NOT NULL');
		if (($search['tanggal_awal'] !== '') & ($search['tanggal_akhir'] !== '')) :
			$this->db->where("date(tr.waktu_order) BETWEEN '" . $search['tanggal_awal'] . "' AND '" . $search['tanggal_akhir'] . "'");
		endif;
		// $this->db->group_by('tr.waktu_order');
		return $this->db->order_by('tr.waktu_order', 'desc');
	}

	private function _listAverageReadyBRM($limit, $start, $search)
	{
		$this->sqlAverageReadyBRM($search);
		if ($limit !== 0) :
			$this->db->limit($limit, $start);
		endif;
		$result = $this->db->get()->result();
		foreach ($result as $i => $val) :
			$val->avg = $this->countAverageReadyBRM($val->tanggal);
			$val->tanggal = get_day($val->tanggal) . ", " . indo_tgl($val->tanggal);
		endforeach;
		return $result;
	}

	function getListDataAverageReadyBRM($limit = 0, $start = 0, $search)
	{
		$result['data'] = $this->_listAverageReadyBRM($limit, $start, $search);
		$result['jumlah'] = $this->sqlAverageReadyBRM($search)->get()->num_rows();
		$this->db->close();
		return $result;
	}
	// End List Average Ready

	function countBerkasByStatus($tanggal, $status = NULL, $query = NULL)
	{
		$sql = "select COALESCE(count(id), 0) as jumlah
				from sm_tracer as tr
				where tr.id is NOT NULL  and date(tr.waktu_order) = '" . $tanggal . "' ";
		if ($status != NULL) :
			$sql .= " and tr.status = '" . $status . "' ";
		else :
			$sql .= $query;
		endif;
		$result = $this->db->query($sql)->row();
		return $result->jumlah;
	}

	// List Inout 
	private function sqlInOutBRM($search)
	{
		$this->db->select("
			date(tr.waktu_order) as tanggal, ('') as tanggal_app, 
			(0) as keluar, (0) as kembali, (0) as ranap, (0) as nokembali
		");
		$this->db->from('sm_tracer as tr');
		$this->db->where('tr.id is NOT NULL');
		if (($search['tanggal_awal'] !== '') & ($search['tanggal_akhir'] !== '')) :
			$this->db->where("date(tr.waktu_order) BETWEEN '" . $search['tanggal_awal'] . "' AND '" . $search['tanggal_akhir'] . "'");
		endif;
		$this->db->group_by('tr.waktu_order');
		return $this->db->order_by('tr.waktu_order', 'desc');
	}

	private function _listInOutBRM($limit, $start, $search)
	{
		$this->sqlInOutBRM($search);
		if ($limit !== 0) :
			$this->db->limit($limit, $start);
		endif;
		$result = $this->db->get()->result();
		$query_keluar = " and (tr.status = 'ready' or tr.status = 'distributed' or tr.status = 'returned') ";
		$query_ranap = " and (tr.status = 'ready' or tr.status = 'distributed') and tr.inpatient = 'yes' ";
		$query_nokembali = " and (tr.status = 'ready' or tr.status = 'distributed') and tr.inpatient = 'no' ";
		foreach ($result as $i => $val) :
			$val->keluar = $this->countBerkasByStatus($val->tanggal, NULL, $query_keluar);
			$val->kembali = $this->countBerkasByStatus($val->tanggal, 'returned');
			$val->ranap = $this->countBerkasByStatus($val->tanggal, NULL, $query_ranap);
			$val->nokembali = $this->countBerkasByStatus($val->tanggal, NULL, $query_nokembali);
			$val->tanggal_app = get_day($val->tanggal) . ', ' . indo_tgl($val->tanggal);
		endforeach;
		return $result;
	}

	function getListDataInOutBRM($limit = 0, $start = 0, $search)
	{
		$result['data'] = $this->_listInOutBRM($limit, $start, $search);
		$result['jumlah'] = $this->sqlInOutBRM($search)->get()->num_rows();
		$this->db->close();
		return $result;
	}
	// End List Inout

	// List Inout 
	private function sqlInOutPoliBRM($search)
	{
		$this->db->select("
			s.id, s.nama as klinik, (0) as keluar, (0) as kembali, (0) as ranap, (0) as kembali
		");
		$this->db->from('sm_spesialisasi as s');
		$this->db->where('s.id !=', '0');
		$this->db->where('s.show_data', '1');
		return $this->db->order_by('s.nama', 'asc');
	}

	private function _listInOutPoliBRM($limit, $start, $search)
	{
		$this->sqlInOutPoliBRM($search);
		if ($limit !== 0) :
			$this->db->limit($limit, $start);
		endif;
		$result = $this->db->get()->result();
		$query_keluar = " and (tr.status = 'ready' or tr.status = 'distributed' or tr.status = 'returned') ";
		$query_ranap = " and (tr.status = 'ready' or tr.status = 'distributed') and tr.inpatient = 'yes' ";
		$query_nokembali = " and (tr.status = 'ready' or tr.status = 'distributed') and tr.inpatient = 'no' ";
		$query_kembali = " and tr.status = 'returned' ";
		foreach ($result as $i => $val) :
			$val->keluar = $this->countBerkasByStatus($search['tanggal'], NULL, $query_keluar . " and tr.id_klinik = '" . $val->id . "' ");
			$val->kembali = $this->countBerkasByStatus($search['tanggal'], NULL, $query_kembali . " and tr.id_klinik = '" . $val->id . "' ");
			$val->ranap = $this->countBerkasByStatus($search['tanggal'], NULL, $query_ranap . " and tr.id_klinik = '" . $val->id . "' ");
			$val->nokembali = $this->countBerkasByStatus($search['tanggal'], NULL, $query_nokembali . " and tr.id_klinik = '" . $val->id . "' ");
		endforeach;
		return $result;
	}

	function getListDataInOutPoliBRM($limit = 0, $start = 0, $search)
	{
		$result['data'] = $this->_listInOutPoliBRM($limit, $start, $search);
		$result['jumlah'] = $this->sqlInOutPoliBRM($search)->get()->num_rows();
		$this->db->close();
		return $result;
	}
	// End List Inout
}