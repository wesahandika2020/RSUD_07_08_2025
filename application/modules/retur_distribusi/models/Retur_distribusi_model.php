<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Retur_distribusi_model extends CI_Model {

	function __construct()
	{
		parent::__construct();
		$this->unit = $this->session->userdata('id_unit');
		$this->user = $this->session->userdata('id_translucent');
		
	}

	private function sqlReturDistribusi($search)
	{
		$this->db->select("
			rd.*, u.nama as unit_penerima, tr.account
		");
		$this->db->from('sm_retur_distribusi as rd');
		$this->db->join('sm_unit as u', 'u.id = rd.id_unit_penerima');
		$this->db->join('sm_translucent as tr', 'tr.id = rd.id_user_retur', 'left');
		$this->db->where('rd.id_unit_retur', $this->unit, true);

		if (($search['tanggal_awal'] !== '') & ($search['tanggal_akhir'] !== '')) :
			$this->db->where("rd.waktu BETWEEN '" . date2mysql($search['tanggal_awal']) . " 00:00:00' AND '" . date2mysql($search['tanggal_akhir']) . " 23:59:59'");
		endif;
		if ($search['no_retur'] !== '') :
			$this->db->where('rd.id', $search['no_retur'], true);
		endif;

		return $this->db->order_by('rd.id', 'asc');
	}

	private function _listReturDistribusi($limit = 0, $start = 0, $search)
	{
		$this->sqlReturDistribusi($search);
		if ($limit !== 0) :
			$this->db->limit($limit, $start);
		endif;

		$result = $this->db->get()->result();
		foreach ($result as $i => $val) :
			$sql_child = "select b.nama_lengkap as nama_barang, 
						dd.jumlah, dd.ed, dd.alasan
						from sm_detur_distribusi as dd
						join sm_barang as b on (b.id = dd.id_barang) 
						where dd.id_retur_distribusi = '".$val->id."'";
			$result[$i]->detail = $this->db->query($sql_child)->result();
		endforeach;
		return $result;	
	}

	function getListDataReturDistribusi($limit = 0, $start = 0, $search)
	{
		$result['data'] = $this->_listReturDistribusi($limit, $start, $search);
		$result['jumlah'] = $this->sqlReturDistribusi($search)->get()->num_rows();
		$this->db->close();
		return $result;
	}

	function simpanReturDistribusi()
	{
		$this->db->trans_begin();
		$id_unit_tujuan = safe_post('unit');
		$data = array(
			'waktu' => date('Y-m-d H:i:s'),
			'id_unit_retur' => $this->unit, 
			'id_unit_penerima' => $id_unit_tujuan, 
			'id_user_retur' => $this->user
		);
		$this->db->insert('sm_retur_distribusi', $data);
		$id_retur_distribusi = $this->db->insert_id();
		if ($this->db->trans_status() === false) :
			$this->db->trans_rollback();
			$result['status'] = false;
		endif;
		$id_barang = safe_post('id_barang');
		$ed = safe_post('ed');
		$jumlah = safe_post('jumlah');
		$alasan = safe_post('alasan');
		foreach ($id_barang as $i => $barang) :
			$row = $this->db->query("select b.id, b.hna, b.hpp from sm_barang as b where b.id = '".$barang."'")->row();
			$detail = array(
				'id_retur_distribusi' =>  $id_retur_distribusi,
				'id_barang' => $barang,
				'jumlah' => $jumlah[$i],
				'hna' => $row->hna,
				'hpp' => $row->hpp,
				'ed' => $ed[$i],
				'alasan' => $alasan[$i],
			);
			$this->db->insert('sm_detur_distribusi', $detail);
			if ($this->db->trans_status() === false) :
				$this->db->trans_rollback();
				$result['status'] = false;
				$result['message'] = 'Gagal menyimpan data detail retur distribusi';
			endif;
			// masuk ke stok
			$stok = array(
				'waktu' => date('Y-m-d H:i:s'),
				'id_transaksi' => $id_retur_distribusi,
				'transaksi' => 'Retur Distribusi',
				'id_barang' => $barang,
				'ed' => $ed[$i],
				'keluar' => $jumlah[$i],
				'id_unit' => $this->unit,
				'id_users' => $this->user,
				'keterangan' => $alasan[$i]
			);
			$this->db->insert('sm_stok', $stok);
			if ($this->db->trans_status() === false) :
				$this->db->trans_rollback();
				$result['status'] = false;
				$result['message'] = 'Gagaal menyimpan data stok retur distribusi';
			endif;
		endforeach;
		if ($this->db->trans_status() === false) :
			$this->db->trans_rollback();
			$result['status'] = false;
			$result['message'] = 'Gagal menyimpan data retur distribusi';
		else :
			$this->db->trans_commit();
			$result['status'] = true;
			$result['message'] = 'Berhasil menyimpan data retur distribusi';
		endif;
		return $result;
	}
}