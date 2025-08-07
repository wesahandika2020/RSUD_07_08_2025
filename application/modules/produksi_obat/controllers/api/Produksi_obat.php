<?php

use Restserver\Libraries\REST_Controller;

defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH.'/libraries/REST_Controller.php';

class Produksi_obat extends REST_Controller
{
	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');

		$id_translucent = $this->session->userdata('id_translucent');
		if (empty($id_translucent)) :
			$this->response(array('error' => 'Anda belum login'), REST_Controller::HTTP_UNAUTHORIZED);
			exit();
		endif;

		$this->limit = 20;
		$this->load->model('Produksi_obat_model', 'm_produksi');
	}

	function barang_with_stok2_auto_get()
	{
		$param = array(
			"search"      => safe_get("q"),
			"penjamin"    => safe_get("id_penjamin") !== "" ? safe_get("id_penjamin") : "",
			"cekstok"     => safe_get("cekstok") !== "" ? safe_get("cekstok") : "",
			"is_farmasi"  => safe_get("is_farmasi") !== "" ? safe_get("is_farmasi") : "",
			"id_kategori" => safe_get("id_kategori") !== "" ? safe_get("id_kategori") : "",
		);
		$start = $this->start(safe_get("page"));
		$data  = $this->m_produksi->getAutoBarangStok2($param, $start, $this->limit);
		if (safe_get("page") == 1 & $param["search"] == "") :
			$pilih[]       = array(
				"id"              => "",
				"nama"            => "-",
				"kekuatan"        => "",
				"satuan_kekuatan" => "",
				"sisa"            => "",
				"harga_jual"      => "",
			);
			$data["data"]  = array_merge($pilih, $data["data"]);
			$data["total"] += 1;
		endif;
		$this->response($data, REST_Controller::HTTP_OK);
	}

	private function start($page)
	{
		return (($page - 1) * $this->limit);
	}

	function barang_with_stok3_auto_get()
	{
		$param = array(
			"search"      => safe_get("q"),
			"penjamin"    => safe_get("id_penjamin") !== "" ? safe_get("id_penjamin") : "",
			"cekstok"     => safe_get("cekstok") !== "" ? safe_get("cekstok") : "",
			"is_farmasi"  => safe_get("is_farmasi") !== "" ? safe_get("is_farmasi") : "",
			"id_kategori" => safe_get("id_kategori") !== "" ? safe_get("id_kategori") : "",
		);
		$start = $this->start(safe_get("page"));
		$data  = $this->m_produksi->getAutoBarangStok3($param, $start, $this->limit);
		if (safe_get("page") == 1 & $param["search"] == "") :
			$pilih[]       = array(
				"id"              => "",
				"nama"            => "-",
				"kekuatan"        => "",
				"satuan_kekuatan" => "",
				"sisa"            => "",
				"harga_jual"      => "",
			);
			$data["data"]  = array_merge($pilih, $data["data"]);
			$data["total"] += 1;
		endif;
		$this->response($data, REST_Controller::HTTP_OK);
	}

	public function simpan_produksi_obat_post()
	{
		$produksi = [
			'bahan_produksi' => safe_post('obat_bahan_produksi') !== '' ? safe_post('obat_bahan_produksi') : null,
			'qty_bahan'      => safe_post('quantity_bahan') !== '' ? safe_post('quantity_bahan') : null,
			'hasil_produksi' => safe_post('obat_hasil_produksi') !== '' ? safe_post('obat_hasil_produksi') : null,
			'qty_hasil'      => safe_post('quantity_hasil') !== '' ? safe_post('quantity_hasil') : null,
			'id_stok_bahan'  => safe_post('id_stok_bahan'),
			'id_stok_hasil'  => safe_post('id_stok_hasil'),
		];

		$check = $this->db->query("select id_unit_default from sm_unit where id = '".$this->session->userdata("id_unit")."'")->row();
		if ($check->id_unit_default === null) :
			$id_unit = $this->session->userdata("id_unit");
		else :
			$id_unit = $check->id_unit_default;
		endif;

		// cek stok bahan produksi
		foreach ($produksi['bahan_produksi'] as $key => $bahan_produksi) {
			$stok = $this->db->select('COALESCE(SUM(masuk)-SUM(keluar),0) as sisa')
							 ->from('sm_stok')
							 ->where('id_barang', $bahan_produksi)
							 ->where('ed >', date("Y-m-d"))
							 ->where('id_unit', $id_unit)
							 ->having('COALESCE(SUM(masuk)-SUM(keluar),0) <', $produksi['qty_bahan'][$key])
						  	 ->get()->row();

			if ($stok) {
				$this->response(['status' => false, 'message' => 'Quantity tidak bisa lebih besar dari sisa stok'], REST_Controller::HTTP_OK);

				return;
			}
		}

		$data = $this->m_produksi->simpanProduksiObat($produksi);
		$this->response($data, REST_Controller::HTTP_OK);
	}

	public function get_list_produksi_get()
	{
		if ( ! $this->get('page')) {
			$this->response(null, REST_Controller::HTTP_BAD_REQUEST); // (400)

			return;
		}
		$limit  = 15;
		$start  = ($this->get('page') - 1) * $limit;
		$search = [
			'periode_laporan' => safe_get('periode_laporan'),
			'tanggal_harian'  => safe_get('tanggal_harian'),
			'bulan'           => safe_get('bulan'),
			'tahun'           => safe_get('tahun'),
			'tanggal_awal'    => safe_get('tanggal_awal'),
			'tanggal_akhir'   => safe_get('tanggal_akhir'),
			'no_produksi'     => trim(safe_get('no_produksi')),
		];

		$data          = $this->m_produksi->getListProduksi($limit, $start, $search);
		$data['page']  = (int) $this->get('page');
		$data['limit'] = $limit;

		if ($data) {
			$this->response($data, REST_Controller::HTTP_OK); // (200)
		} else {
			$this->response(array('error' => 'Data is Not Found'), REST_Controller::HTTP_NOT_FOUND);
		}
	}

	public function get_detail_produksi_obat_get()
	{
		if ( ! $this->get('id')) {
			$this->response(null, REST_Controller::HTTP_BAD_REQUEST); // (400)

			return;
		}

		$data['bahan'] = $this->m_produksi->getDetailBahanProduksiObat($this->get('id'));
		$data['hasil'] = $this->m_produksi->getDetailHasilProduksiObat($this->get('id'));

		if ( ! empty($data['bahan']) && ! empty($data['hasil'])) {
			$this->response($data, REST_Controller::HTTP_OK); // (200)
		} else {
			$this->response(array('error' => 'Data is Not Found'), REST_Controller::HTTP_NOT_FOUND);
		}
	}
}
