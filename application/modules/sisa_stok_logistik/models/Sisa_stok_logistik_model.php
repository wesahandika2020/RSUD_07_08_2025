<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Sisa_stok_logistik_model extends CI_Model {

	function __construct()
	{
		parent::__construct();
		
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
		$this->db->where('b.jenis !=', 'Farmasi');
		
		if ($search['unit'] === '') :
			$this->db->where('bu.id_unit', $this->session->userdata('id_unit'), true);
			$this->db->group_by('b.id, bu.id_unit, bu.id, st.nama, sd.nama, pb.nama, un.nama');
        endif;
		
		return $this->db->order_by('b.nama', 'asc');
    }

    private function _listSisaStok($limit = 0, $start = 0, $search)
    {
    	date_default_timezone_set('Asia/Jakarta');

    	$this->sqlSisaStok($search);
        if ($limit !== 0) :
            $this->db->limit($limit, $start);
        endif;

		$result = $this->db->get()->result();

		foreach ($result as $i => $val) :
			if ($search['unit'] === '') :
				$unitQuery = "select nama from sm_unit where id = '{$val->id_unit}'";
				$result[$i]->unit = $this->db->query($unitQuery)->row()->nama;
			else :
				$result[$i]->unit = $val->unit;
			endif;

			$paramTanggalStockAwal = "";
			$paramTglNonEd = "";
			$paramTglEd = "";
			if ($search["periode_laporan"] === "Harian") {
				if ($search["tanggal_harian"] !== "") :
					$paramTanggalStockAwal = " and to_char( waktu, 'yyyy-mm-dd' ) <'" . date2mysql($search['tanggal_harian']) . "' ";
					$paramTglNonEd .= " and (ed IS NULL OR to_char( ed, 'yyyy-mm-dd' ) >= '" . date2mysql($search['tanggal_harian']) . "') ";
					$paramTglEd .= " and to_char( ed, 'yyyy-mm-dd' ) < '" . date2mysql($search['tanggal_harian']) . "' ";
				endif;
			} elseif ($search["periode_laporan"] === "Bulanan" & $search["bulan"] !== "" & $search["tahun"] !== "") {

				$tanggalAkhir = date("Y-m-t", strtotime("".$search["tahun"]."-".$search["bulan"]."-01"));
				$paramTanggalStockAwal = " and to_char( waktu, 'YYYY-MM' ) < '" . $search["tahun"] . "-" . $search["bulan"] . "' ";
    			$splitTanggal = explode("-", $tanggalAkhir);
    			$tanggalPeriode = $search["tahun"]."-".$search["bulan"]."-".$splitTanggal[2];

				if(date('Y-m-d') <= $tanggalPeriode){

					$paramTglNonEd .= " and (ed IS NULL OR to_char( ed, 'yyyy-mm-dd' ) >= '" . date('Y-m-d') . "') ";
					$paramTglEd .= " and to_char( ed, 'yyyy-mm-dd' ) < '" . date('Y-m-d') . "' ";

				} else {

					$paramTglNonEd .= " and (ed IS NULL OR to_char( ed, 'yyyy-mm-dd' ) >= '" . $tanggalPeriode . "') ";
					$paramTglEd .= " and to_char( ed, 'yyyy-mm-dd' ) < '" . $tanggalPeriode . "' ";

				}
			} elseif ($search["periode_laporan"] === "Rentang Waktu" & $search["tanggal_awal"] !== "" & $search["tanggal_akhir"] !== "") {
				if ($search["tanggal_awal"] !== "" & $search["tanggal_akhir"] !== "") :

					$paramTanggalStockAwal = " and waktu < '" . date2mysql($search['tanggal_awal']) . " 00:00:00' ";

					if(date('Y-m-d') <= date2mysql($search['tanggal_akhir'])){

						$paramTglNonEd .= " and (ed IS NULL OR to_char( ed, 'yyyy-mm-dd' ) >= '" . date('Y-m-d') . "') ";
						$paramTglEd .= " and (to_char( ed, 'yyyy-mm-dd' ) < '" . date('Y-m-d') . "') ";

					} else {

						$paramTglNonEd .= " and (ed IS NULL OR to_char( ed, 'yyyy-mm-dd' ) >= '" . date2mysql($search['tanggal_akhir']) . "') ";
						$paramTglEd .= " and to_char( ed, 'yyyy-mm-dd' ) < '" . date2mysql($search['tanggal_akhir']) . "' ";


					}
				
				endif;
			}

			// query stok awal
			$awalQuery = "select COALESCE(sum(masuk) - sum(keluar), 0) as awal
					from sm_invrt_stok
					where id_barang = '{$val->id}'";

			$awalParam = "";

			if ($search['unit'] !== '')
			{
				$awalParam = " and id_unit = '{$search['unit']}'";

			} else {

				$awalParam = " and id_unit = '{$this->session->userdata('id_unit')}'";

			}

			$result[$i]->awal = $this->db->query($awalQuery . $awalParam . $paramTanggalStockAwal)->row()->awal;

			$qAwalNonEd = "select COALESCE(sum(masuk) - sum(keluar), 0) as awal
					from sm_invrt_stok
					where id_barang = '{$val->id}'" ;
			$parAwalNonEd = "";
			if ($search['unit'] !== '')
			{
				$parAwalNonEd = " and id_unit = '{$search['unit']}'";

			} else {

				$parAwalNonEd = " and id_unit = '{$this->session->userdata('id_unit')}'";

			}
			$result[$i]->awalnoned = $this->db->query($qAwalNonEd . $parAwalNonEd . $paramTanggalStockAwal . $paramTglNonEd)->row()->awal;


			$qAwalEd = "select COALESCE(sum(masuk) - sum(keluar), 0) as awal
					from sm_invrt_stok
					where id_barang = '{$val->id}'" ;
			$parAwalEd = "";

			if ($search['unit'] !== '')
			{
				$parAwalEd = " and id_unit = '{$search['unit']}'";

			} else {

				$parAwalEd = " and id_unit = '{$this->session->userdata('id_unit')}'";

			}
			$result[$i]->awaled = $this->db->query($qAwalEd . $parAwalEd . $paramTanggalStockAwal . $paramTglEd)->row()->awal;

			$param = "";
			$paramNonEd = "";
			$paramEd = "";
			if ($search["periode_laporan"] === "Harian") {
				if ($search["tanggal_harian"] !== "") :
					$param .= " and to_char( waktu, 'yyyy-mm-dd' ) ilike '%" . date2mysql($search['tanggal_harian']) . "' ";
					$paramNonEd .= " and (ed IS NULL OR ed >= '" . date2mysql($search['tanggal_harian']) . "') ";
					$paramEd .= " and ed < '" . date2mysql($search['tanggal_harian']) . "' ";
				endif;
			} elseif ($search["periode_laporan"] === "Bulanan" & $search["bulan"] !== "" & $search["tahun"] !== "") {
				$param .= " and to_char( waktu, 'YYYY-MM' ) = '" . $search["tahun"] . "-" . $search["bulan"] . "' ";

				$splitTanggalEx = explode("-", $tanggalAkhir);
    			$tanggalPeriodeEx = $search["tahun"]."-".$search["bulan"]."-".$splitTanggalEx[2];

				if(date('Y-m-d') <= $tanggalPeriodeEx){

					$paramNonEd .= " and (ed IS NULL OR to_char( ed, 'yyyy-mm-dd' ) >= '" . date('Y-m-d') . "') ";
					$paramEd .= " and to_char( ed, 'yyyy-mm-dd' ) < '" . date('Y-m-d') . "' ";

				} else {

					$paramNonEd .= " and (ed IS NULL OR to_char( ed, 'yyyy-mm-dd' ) >= '" . $tanggalPeriodeEx . "') ";
					$paramEd .= " and to_char( ed, 'yyyy-mm-dd' ) < '" . $tanggalPeriodeEx . "' ";

				}
			
			} elseif ($search["periode_laporan"] === "Rentang Waktu" & $search["tanggal_awal"] !== "" & $search["tanggal_akhir"] !== "") {
				if ($search["tanggal_awal"] !== "" & $search["tanggal_akhir"] !== "") :
					$param .= " and (waktu BETWEEN '" . date2mysql($search['tanggal_awal']) . " 00:00:00' AND '" . date2mysql($search['tanggal_akhir']) . " 23:59:59')";
					if(date('Y-m-d') <= date2mysql($search['tanggal_akhir'])){

						$paramNonEd .= " and (ed IS NULL OR to_char( ed, 'yyyy-mm-dd' ) >= '" . date('Y-m-d') . "') ";
						$paramEd .= " and (to_char( ed, 'yyyy-mm-dd' ) < '" . date('Y-m-d') . "') ";

					} else {

						$paramNonEd .= " and (ed IS NULL OR to_char( ed, 'yyyy-mm-dd' ) >= '" . date2mysql($search['tanggal_akhir']) . "') ";
						$paramEd .= " and to_char( ed, 'yyyy-mm-dd' ) < '" . date2mysql($search['tanggal_akhir']) . "' ";


					}
				endif;
			}

			$query = "select COALESCE(sum(masuk), 0) as masuk, COALESCE(sum(keluar), 0) as keluar
					from sm_invrt_stok 
					where id_barang = '{$val->id}'";

			$mkNonEd = "select COALESCE(sum(masuk), 0) as masuk, COALESCE(sum(keluar), 0) as keluar
					from sm_invrt_stok 
					where id_barang = '{$val->id}'";

			$mkEd = "select COALESCE(sum(masuk), 0) as masuk, COALESCE(sum(keluar), 0) as keluar
					from sm_invrt_stok 
					where id_barang = '{$val->id}'";


			if ($search['unit'] !== '')
			{
				$param .= " and id_unit = {$val->id_unit}";
			} else {

				$param .= " and id_unit = '{$this->session->userdata('id_unit')}'";
			}

			$dataMk = $this->db->query($query . $param)->row();

			$dataMkNonEd = $this->db->query($mkNonEd . $param . $paramNonEd)->row();
			$dataMkEd = $this->db->query($mkEd . $param . $paramEd)->row();
			$dataTesting = $this->db->query($mkEd)->row();
			$result[$i]->masuk = $dataMk->masuk;
			$result[$i]->masukmknoned = $dataMkNonEd->masuk;
			$result[$i]->masukmked = $dataMkEd->masuk;
			$result[$i]->keluar = $dataMk->keluar;
			$result[$i]->keluarmknoned = $dataMkNonEd->keluar;
			$result[$i]->keluarmked = $dataMkEd->keluar;
			$result[$i]->sisanoned = $result[$i]->awalnoned + $result[$i]->masukmknoned - $result[$i]->keluarmknoned;
			$result[$i]->sisaed = $result[$i]->awaled + $result[$i]->masukmked - $result[$i]->keluarmked;
			$result[$i]->sisa = $result[$i]->sisanoned - $result[$i]->sisaed;
		
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
		$this->db->select("COALESCE(sum(masuk) - sum(keluar), 0) as sisa")->from('sm_invrt_stok');
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
