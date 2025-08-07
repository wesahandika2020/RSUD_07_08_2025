<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Sisa_stok_model extends CI_Model {

	function __construct()
	{
		parent::__construct();
		//Do your magic here
	}
		
	private function sqlSisaStok($search)
    {
		$this->db->select("
			b.id, bu.id_unit, bu.id as id_barang_unit, b.hpp,
			CONCAT_WS(' ',b.nama, b.kekuatan, st.nama, COALESCE(sd.nama, ''), '<small><i>',COALESCE(pb.nama, ''),'</i></small>') as nama_barang, un.nama as unit
		");
        $this->db->from('sm_barang as b');
		$this->db->join('sm_barang_unit as bu', 'bu.id_barang = b.id');
		$this->db->join('sm_satuan as st', 'st.id = b.satuan_kekuatan', 'left');
		$this->db->join('sm_sediaan as sd', 'sd.id = b.id_sediaan', 'left');
		$this->db->join('sm_pabrik as pb', 'pb.id = b.id_pabrik', 'left');
		$this->db->join('sm_unit as un', 'un.id = bu.id_unit', 'left');

        if ($search['kategori_barang'] !== '') :
            $this->db->where('b.id_kategori', $search['kategori_barang'], true);
		endif;	
        if ($search['id_barang'] !== '') :
            $this->db->where('b.id', $search['id_barang'], true);
        endif;
        if ($search['unit'] !== '') :
            $this->db->where('bu.id_unit', $search['unit'], true);
		endif;

		$this->db->where('b.id_kategori !=', 7);
		
		if ($search['unit'] === '') :
			$this->db->where('bu.id_unit', $this->session->userdata('id_unit'), true);
			$this->db->group_by('b.id, bu.id_unit, bu.id, st.nama, sd.nama, pb.nama, un.nama');
        endif;
		
		return $this->db->order_by('b.nama', 'asc');
    }

    private function _listSisaStok($limit = 0, $start = 0, $search)
    {
        $this->sqlSisaStok($search);
        if ($limit !== 0) :
            $this->db->limit($limit, $start);
        endif;

		$result = $this->db->get()->result();
/*	    highlight_string("<?php\n\$data =\n" . var_export($result, true) . ";\n?>");;die;*/
		// $this->db->get(); echo $this->db->last_query(); exit();
		foreach ($result as $i => $val) :
			if ($search['unit'] === '') :
				$query = "select nama from sm_unit where id = '{$val->id_unit}'";
				$result[$i]->unit = $this->db->query($query)->row()->nama;
			else :
				$result[$i]->unit = $val->unit;
			endif;

			$paramTanggalStockAwal = "";
			if ($search["periode_laporan"] === "Harian") {
				if ($search["tanggal_harian"] !== "") :
					$paramTanggalStockAwal = " and to_char( waktu, 'yyyy-mm-dd' ) <'" . date2mysql($search['tanggal_harian']) . "' ";
				endif;
			} elseif ($search["periode_laporan"] === "Bulanan" & $search["bulan"] !== "" & $search["tahun"] !== "") {
				$paramTanggalStockAwal = " and to_char( waktu, 'YYYY-MM' ) < '" . $search["tahun"] . "-" . $search["bulan"] . "' ";
			} elseif ($search["periode_laporan"] === "Rentang Waktu" & $search["tanggal_awal"] !== "" & $search["tanggal_akhir"] !== "") {
				if ($search["tanggal_awal"] !== "" & $search["tanggal_akhir"] !== "") :
					$paramTanggalStockAwal = " and waktu < '" . date2mysql($search['tanggal_awal']) . " 00:00:00' ";
				endif;
			}

			// query stok awal
			$query = "select COALESCE(sum(masuk) - sum(keluar), 0) as awal
					from sm_stok
					where id_barang = '{$val->id}'";
			$param = "";
			if ($search['unit'] !== '')
			{
				$param = " and id_unit = '{$search['unit']}'";
			}
			$result[$i]->awal = $this->db->query($query . $param . $paramTanggalStockAwal)->row()->awal;

			// query stok masuk keluar
			if ($search['unit'] !== '') :
				$this->db->where('id_unit', $search['unit'], true);
			else :
				$this->db->where('id_unit', $this->session->userdata('id_unit'), true);
			endif;
			
			$explode = explode('-', date('Y-m'));
			if ($search['tanggal_awal'] !== '') :
				$explode = explode('-', $search['tanggal_awal']);
			endif;

			$param = "";
			if ($search["periode_laporan"] === "Harian") {
				if ($search["tanggal_harian"] !== "") :
					$param .= " and to_char( waktu, 'yyyy-mm-dd' ) ilike '%" . date2mysql($search['tanggal_harian']) . "' ";
				endif;
			} elseif ($search["periode_laporan"] === "Bulanan" & $search["bulan"] !== "" & $search["tahun"] !== "") {
				$param .= " and to_char( waktu, 'YYYY-MM' ) = '" . $search["tahun"] . "-" . $search["bulan"] . "' ";
			} elseif ($search["periode_laporan"] === "Rentang Waktu" & $search["tanggal_awal"] !== "" & $search["tanggal_akhir"] !== "") {
				if ($search["tanggal_awal"] !== "" & $search["tanggal_akhir"] !== "") :
					$param .= " and waktu BETWEEN '" . date2mysql($search['tanggal_awal']) . " 00:00:00' AND '" . date2mysql($search['tanggal_akhir']) . " 23:59:59'";
				endif;
			}
			$query = "select COALESCE(sum(masuk), 0) as masuk, COALESCE(sum(keluar), 0) as keluar
					from sm_stok 
					where id_barang = '{$val->id}'";
			if ($search['unit'] !== '')
			{
				$param .= " and id_unit = {$val->id_unit}";
			}
			$data_mk = $this->db->query($query . $param)->row();
			$result[$i]->masuk = $data_mk->masuk;
			$result[$i]->keluar = $data_mk->keluar;
			$result[$i]->sisa = $result[$i]->awal + $result[$i]->masuk - $result[$i]->keluar;

		endforeach;
		return $result;
    }

    function getListDataSisaStok($limit = 0, $start = 0, $search)
    {
        $result['data'] = $this->_listSisaStok($limit, $start, $search);
        $result['jumlah'] = $this->sqlSisaStok($search)->get()->num_rows();
        return $result;
	}
	
	function getDataSisaStok($id_unit, $id_barang)
	{
		$this->db->select("COALESCE(sum(masuk) - sum(keluar), 0) as sisa")->from('sm_stok');
		return $this->db->where('id_unit', $id_unit)->where('id_barang', $id_barang)->get()->row()->sisa;
	}

	public function getPeriodeLaporan()
	{
		return array(
			'Bulanan'       => 'Bulanan',
			'Rentang Waktu' => 'Rentang Waktu',
			'Harian'        => 'Harian',
		);
	}
}
