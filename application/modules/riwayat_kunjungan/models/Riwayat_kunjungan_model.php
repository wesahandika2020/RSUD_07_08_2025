<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Riwayat_kunjungan_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->datetime = date('Y-m-d H:i:s');
	}

	private function sqlDataKunjunganPasien($search)
	{
		$this->db->select("DISTINCT ON (lp.id) lp.*, p.nama as nama_pasien, pd.id_pasien as no_rm", false);

		$this->db->from('sm_layanan_pendaftaran as lp')
			->join('sm_pendaftaran as pd', 'pd.id = lp.id_pendaftaran')
			->join('sm_pasien as p', 'p.id = pd.id_pasien')
			->join('sm_tenaga_medis as tm', 'tm.id = lp.id_dokter')
			->where('tm.id_pegawai', $this->session->userdata('id_pegawai'));

		if (($search['tanggal'] !== '')) :
			$this->db->where("DATE(lp.tanggal_pelayanan)", $search['tanggal']);
		endif;

		if ($search['kunjungan'] !== '') :
			$this->db->where('pd.jenis_rawat', $search['kunjungan'], true);
		endif;

		if ($search['no_rm'] !== '') :
			$this->db->like('p.id', $search['no_rm'], 'before', true);
		endif;

		return $this->db->order_by('lp.id', 'desc');
	}

	private function _listDataKunjunganPasien($limit = 0, $start = 0, $search)
	{
		$this->sqlDataKunjunganPasien($search);
		if ($limit !== 0) :
			$this->db->limit($limit, $start);
		endif;

		return $this->db->get()->result();
		$this->db->get();
		echo $this->db->last_query();
		exit();
	}

	function getListDataKunjunganPasien($limit = 0, $start = 0, $search)
	{
		$result['data'] = $this->_listDataKunjunganPasien($limit, $start, $search);
		$result['jumlah'] = $this->sqlDataKunjunganPasien($search)->get()->num_rows();
		return $result;

		$this->db->close();
	}

}
