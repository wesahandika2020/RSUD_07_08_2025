<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Stok_bank_darah_model extends CI_Model {

	function __construct()
	{
		parent::__construct();
		//Do your magic here
	}
		
	private function sqlStok($search)
    {
		$this->db->select("
			s.id, b.hpp as harga_satuan, s.id_barang, s.ed, 
			s.waktu, s.transaksi, s.masuk, s.keluar, 
			CONCAT('<i>', s.keterangan, '</i>') as keterangan, b.hpp, 
			b.nama_lengkap as nama_barang,
			tr.account
		");
        $this->db->from('sm_stok_bank_darah as s');
		$this->db->join('sm_barang as b', 'b.id = s.id_barang');
		$this->db->join('sm_translucent as tr', 'tr.id = s.id_users', 'left');

		if ($search['id'] !== '') :
			$this->db->where('s.id', $search['id'], true);
		else :
			$this->db->where('s.id IS NOT NULL');
		endif;	
        if (($search['tanggal_awal'] !== '') && ($search['tanggal_akhir'] !== '')) :
            $this->db->where("s.waktu BETWEEN '" . date2mysql($search['tanggal_awal']) . " 00:00:00' AND '" . date2mysql($search['tanggal_akhir']) . " 23:59:59'");
        endif;
        if ($search['id_barang'] !== '') :
            $this->db->where('b.id', $search['id_barang'], true);
        endif;
        if ($search['unit'] !== '') :
			$this->db->where('s.id_unit', $search['unit'], true);
		endif;

		$this->db->where('b.id_kategori', 7, true);
		$this->db->where('s.is_bank_darah', 1, true);
		$this->db->where('s.is_confirm_bank_darah', 'Confirmed', true);
		
        if ($search['jenis'] === 'History') :
			$this->db->order_by('s.waktu', 'asc');
			return $this->db->order_by('s.id', 'asc');
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
		 	$this->db->select("COALESCE(sum(s.masuk) - sum(s.keluar), 0) as awal")
			 	->from('sm_stok_bank_darah as s')
				->where('s.waktu < ', $val->waktu, true)
				->where('s.id_barang', $val->id_barang, true);
				// ->where('s.ed', $val->ed, true);
			if ($search['unit'] !== '') :
				$this->db->where('s.id_unit', $search['unit'], true);
			endif;

			// if ($this->session->userdata('account') == 'faizmsyam') :
			// 	$this->db->get(); echo $this->db->last_query(); exit();
			// endif;
			$result[$i]->awal = $this->db->get()->row()->awal;
			$result[$i]->sisa = $result[$i]->awal + $val->masuk - $val->keluar;
		endforeach;
		return $result;
    }

    function getListDataStok($limit = 0, $start = 0, $search)
    {
        $result['data'] = $this->_listStok($limit, $start, $search);
        $result['jumlah'] = $this->sqlStok($search)->get()->num_rows();
        return $result;
        $this->db->close();

    }
}