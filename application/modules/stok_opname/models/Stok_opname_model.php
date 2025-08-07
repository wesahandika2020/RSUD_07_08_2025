<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Stok_opname_model extends CI_Model {

	function __construct()
	{
		parent::__construct();
		$this->unit = $this->session->userdata('id_unit');
		$this->user = $this->session->userdata('id_translucent');
		
	}

	private function sqlStokOpname($search)
	{
		$this->db->select("
			s.id, s.waktu, s.masuk, s.ed, s.no_batch, b.nama_lengkap as nama_barang, s.id_barang, tr.account, coalesce(pgu.nama, '') as nama_account
		");
		$this->db->from('sm_stok as s');
		$this->db->join('sm_barang as b', 'b.id = s.id_barang');
		$this->db->join('sm_translucent as tr', 'tr.id = s.id_users', 'left');
		$this->db->join('sm_pegawai as pgu', 'pgu.id = s.id_users', 'left');
		$this->db->where('s.transaksi', 'Stok Opname', true);
		$this->db->where('s.id_unit', $this->unit, true);

		if (($search['tanggal_awal'] !== '') & ($search['tanggal_akhir'] !== '')) :
			$this->db->where("s.waktu BETWEEN '" . date2mysql($search['tanggal_awal']) . " 00:00:00' AND '" . date2mysql($search['tanggal_akhir']) . " 23:59:59'");
		endif;
		if ($search['id_barang'] !== '') :
			$this->db->where('b.id', $search['id_barang'], true);
		endif;
		if ($search['id_kategori'] !== '') :
			$this->db->where('b.id_kategori', $search['id_kategori'], true);
		endif;

		return $this->db->order_by('s.id', 'desc');
	}

	private function _listStokOpname($limit = 0, $start = 0, $search)
	{
		$this->sqlStokOpname($search);
		if ($limit !== 0) :
			$this->db->limit($limit, $start);
		endif;

		$result = $this->db->get()->result();
		foreach ($result as $i => $val) :
			$sql_child = "select coalesce(s.nama, '') as nama
						from sm_kemasan_barang as kb
						join sm_satuan as s on (kb.id_kemasan = s.id) 
						where kb.id_barang = '".$val->id_barang."' 
						and kb.default_kemasan = '1'";
			$child = $this->db->query($sql_child)->row_array();
			$result[$i]->satuan = $child['nama'];
		endforeach;
		return $result;	
	}

	function getListDataStokOpname($limit = 0, $start = 0, $search)
	{
		$result['data'] = $this->_listStokOpname($limit, $start, $search);
		$result['jumlah'] = $this->sqlStokOpname($search)->get()->num_rows();
		$this->db->close();
		return $result;
	}

	function simpanDataStokOpname()
	{
		$id_barang = safe_post('id_barang');
		$id_kemasan = safe_post('id_kemasan');
		$no_batch = safe_post('no_batch');
		$ed = safe_post('ed');
		$jumlah = safe_post('jumlah');
		$alasan = safe_post('alasan');
		foreach ($id_barang as $i => $barang) :
			$this->db->trans_begin();
			$row = $this->db->get_where('sm_kemasan_barang', ['id_barang' => $barang, 'id_kemasan' => $id_kemasan[$i]])->row();
			$data = array(
				'waktu' => date('Y-m-d H:i:s'),
				'transaksi' => 'Stok Opname',
				'no_batch' => $no_batch[$i],
				'id_barang' => $barang,
				'ed' => $ed[$i],
				'masuk' => $jumlah[$i] * $row->isi * $row->isi_satuan,
				'keterangan' => $alasan[$i],
				'id_unit' => $this->unit,
				'id_users' => $this->user
			);
			$this->db->insert('sm_stok', $data);
			if ($this->db->trans_status() === false) :
				$this->db->trans_rollback();
				return ['status' => false, 'message' => 'Gagal menyimpan data stok opname'];
			else :
				$this->db->trans_commit();
				return ['status' => true, 'message' => 'Berhasil menyimpan data stok opname'];
			endif;
		endforeach;
	}

	function updateDataStokOpname($id, $param)
	{
		$this->db->trans_begin();
		$this->db->where('id', $id, true)->update('sm_stok', $param);
		if ($this->db->trans_status() === false) :
			$this->db->trans_rollback();
			return ['status' => false, 'message' => 'Gagal mengubah data stok opname'];
		else :
			$this->db->trans_commit();
			return ['status' => true, 'message' => 'Berhasil mengubah data stok opname'];
		endif;
	}

	function deleteDataStokOpname($id)
	{
		$this->db->trans_begin();
		$this->db->where('id', $id, true)->delete('sm_stok');
		if ($this->db->trans_status() === false) :
			$this->db->trans_rollback();
			return ['status' => false, 'message' => 'Gagal menghapus data stok opname'];
		else :
			$this->db->trans_commit();
			return ['status' => true, 'message' => 'Berhasil menghapus data stok opname'];
		endif;
	}
}