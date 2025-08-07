<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Kartu_stok_model extends CI_Model {

	function __construct()
	{
		parent::__construct();
		$this->user = $this->session->userdata('id_translucent');
		$this->unit = $this->session->userdata('id_unit');
		$this->date = date('Y-m-d');
		$this->datetime = date('Y-m-d H:i:s');
	}

	private function sqlKartuStok($search)
	{
		$this->db->select("DISTINCT ON (b.id)
			s.id, s.id_barang, s.ed, s.waktu, date(s.waktu) as tanggal, s.transaksi, s.masuk, s.keluar,
			CONCAT_WS('<i>',s.keterangan,'</i>') as keterangan, b.hpp, b.nama_lengkap as nama_barang, 
			tr.account, un.nama as unit
		");
		$this->db->from('sm_stok as s');
		$this->db->join('sm_barang as b', 'b.id = s.id_barang');
		$this->db->join('sm_satuan as st', 'st.id = b.satuan_kekuatan', 'left');
		$this->db->join('sm_sediaan as sd', 'sd.id = b.id_sediaan', 'left');
		$this->db->join('sm_pabrik as pb', 'pb.id = b.id_pabrik', 'left');
		$this->db->join('sm_translucent as tr', 'tr.id = s.id_users', 'left');
		$this->db->join('sm_unit as un', 'un.id = s.id_unit', 'left');

		if (($search['tanggal_awal'] !== '') & ($search['tanggal_akhir'] !== '')) :
			$this->db->where("s.waktu BETWEEN '" . date2mysql($search['tanggal_awal']) . " 00:00:00' AND '" . date2mysql($search['tanggal_akhir']) . " 23:59:59'");
		endif;
		if ($search['id_barang'] !== '') :
			$this->db->where('b.id', $search['id_barang'], true);
		endif;
		if ($search['kategori_barang'] !== '') :
			$this->db->where('b.id_kategori', $search['kategori_barang'], true);
		endif;
		if ($search['id_unit'] !== '') :
			$this->db->where('s.id_unit', $search['id_unit'], true);
		endif;

		return $this->db->order_by('b.id, s.waktu');
	}

	private function _listKartuStok($limit = 0, $start = 0, $search)
	{
		$this->sqlKartuStok($search);
		if ($limit !== 0) :
			$this->db->limit($limit, $start);
		endif;

		$result = $this->db->get()->result();
		foreach ($result as $i => $val) :
			$where = NULL;
			if ($search['id_unit'] !== '') :
				$where = " and id_unit = '".$search['id_unit']."'";
			endif;
			$where1 = " waktu < '".$val->tanggal." 00:00:00' ";
			$where2 = " date(waktu) = '".$val->tanggal."'";
			// SQL Stok Awal
			$sql_stok_awal = "select coalesce(sum(masuk) - sum(keluar), 0) as awal
							from sm_stok 
							where ".$where1." and id_barang = '".$val->id_barang."' " . $where;
			$result[$i]->awal = $this->db->query($sql_stok_awal)->row()->awal;
			// SQL Stok Masuk Keluar
			$sql_stok_masuk_keluar = "select coalesce(sum(masuk), 0) as masuk, coalesce(sum(keluar), 0) as keluar 
									from sm_stok 
									where ".$where2." and id_barang = '".$val->id_barang."' " . $where;
			$row = $this->db->query($sql_stok_masuk_keluar)->row();
			$result[$i]->masuk = $row->masuk;
			$result[$i]->keluar = $row->keluar;
			$result[$i]->sisa = $result[$i]->awal + $row->masuk - $row->keluar;
			// SQL Satuan
			$sql_satuan = "select count(*), s.nama as kemasan 
							from sm_kemasan_barang as kb 
							join sm_satuan as s on (s.id = kb.id_kemasan) 
							where kb.default_kemasan = '1' 
							and kb.id_barang = '".$val->id_barang."' 
							group by s.nama";
			$result[$i]->nama_kemasan = $this->db->query($sql_satuan)->row()->kemasan;
		endforeach;
		return $result;
		
	}

	function getListDataKartuStok($limit = 0, $start = 0, $search)
	{
		$result['data'] = $this->_listKartuStok($limit, $start, $search);
		$result['jumlah'] = $this->sqlKartuStok($search)->get()->num_rows();
		$this->db->close();
		return $result;
	}
}
