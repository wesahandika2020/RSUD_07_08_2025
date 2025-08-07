<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Stok_gizi_model extends CI_Model {

	function __construct()
	{
		parent::__construct();
		
	}
		
	private function sqlStok($search)
    {
		$this->db->select("
			s.id, b.hpp as harga_satuan, s.id_barang, s.ed, 
			s.waktu, s.transaksi, s.masuk, s.keluar, 
			CONCAT('<i>', s.keterangan, '</i>') as keterangan, b.hpp, 
			b.nama_lengkap as nama_barang,
			tr.account, coalesce(pgu.nama, '') as nama_account
		");
        $this->db->from('sm_gizi_stok as s');
		$this->db->join('sm_barang as b', 'b.id = s.id_barang');
		$this->db->join('sm_translucent as tr', 'tr.id = s.id_users', 'left');		
		$this->db->join('sm_pegawai as pgu', 'pgu.id = s.id_users', 'left');

		if ($search['id'] !== '') :
			$this->db->where('s.id', $search['id'], true);
		else :
			$this->db->where('s.id IS NOT NULL');
		endif;	
        if (($search['tanggal_awal'] !== '') & ($search['tanggal_akhir'] !== '')) :
            $this->db->where("s.waktu BETWEEN '" . date2mysql($search['tanggal_awal']) . " 00:00:00' AND '" . date2mysql($search['tanggal_akhir']) . " 23:59:59'");
        endif;
        if ($search['kategori_barang'] !== '') :
            $this->db->where('b.id_kategori', $search['kategori_barang'], true);
		else : 
			$this->db->where('b.id_kategori !=', 7);
		endif;	
        if ($search['id_barang'] !== '') :
            $this->db->where('b.id', $search['id_barang'], true);
        endif;
        $this->db->where('s.id_unit', (int)$this->session->userdata('id_unit'));
		if ($search['transaksi'] !== '') :
			$this->db->where('s.transaksi', $search['transaksi']);
		endif;
		
        if ($search['jenis'] === 'History') :
			return $this->db->order_by('s.waktu, s.id', 'desc');
		else :
			return $this->db->order_by('s.waktu', 'desc');
        endif;
		
    }

    private function _listStok($limit = 0, $start = 0, $search)
    {
        $this->sqlStok($search);
        if ($limit !== 0) :
            $this->db->limit($limit, $start);
        endif;

		$result = $this->db->get()->result();
		foreach ($result as $i => $val) :
			$stok_awal = $this->db->select("COALESCE(sum(s.masuk) - sum(s.keluar), 0) as awal")->from('sm_gizi_stok as s')->where('s.waktu < ', $val->waktu, true)->where('s.id_barang', (int)$val->id_barang, true)->where('s.ed', $val->ed, true);
			
			$this->db->where('s.id_unit', (int)$this->session->userdata('id_unit'));
			
			$result[$i]->awal = $this->db->get()->row()->awal;
			$result[$i]->sisa = (int)$result[$i]->awal + (int)$val->masuk - (int)$val->keluar;
		endforeach;
		return $result;
    }

    function getListDataStok($limit = 0, $start = 0, $search)
    {
        $result['data'] = $this->_listStok((int)$limit, (int)$start, $search);
        $result['jumlah'] = $this->sqlStok($search)->get()->num_rows();
        return $result;

        $this->db->close();
    }
}
