<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sisa_stok_gizi extends SYAM_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('App_model', 'm_default');
        $this->load->model('Masterdata_model', 'm_masterdata');
        $this->load->model('inventori_gizi/Inventori_gizi_model', 'inventori');
		$this->load->model('Sisa_stok_gizi_model', 'stok');
    }

    function index()
    {
        $data['active'] = 'Inventory';
        $data['modules'] = $this->m_default->getDataModules($this->session->userdata('id_account_group'));
        $is_login = $this->session->userdata('is_login');

        if ($is_login === true) :
            $data['hospital'] = $this->m_default->getDataHospital();
            $this->load->view('layouts/index', $data);

        else :
            redirect('/');

        endif;
    }

	function page_sisa_stok_gizi() {
		$data['transaksi']       = $this->m_masterdata->getTransaksiInventory();
		$data['kategori_barang'] = $this->inventori->ambilDataKategoriBarang( '' )->result();
		$data['periode_laporan'] = $this->stok->getPeriodeLaporan();
		$data['bulan']           = $this->m_masterdata->getBulan();
		$this->load->view('sisa_stok_gizi/index', $data );
	}

	public function export_sisa_stok_gizi() {
		$search = [
			'periode_laporan' => safe_get( 'periode_laporan' ),
			'tanggal_harian'  => safe_get( 'tanggal_harian' ),
			'bulan'           => safe_get( 'bulan' ),
			'tahun'           => safe_get( 'tahun' ),
			'tanggal_awal'    => safe_get( 'tanggal_awal' ),
			'tanggal_akhir'   => safe_get( 'tanggal_akhir' ),
			'kategori_barang' => safe_get( 'kategori_barang' ),
			'id_barang'       => safe_get( 'barang' ),
			'unit'            => safe_get( 'unit' ),
		];

		$periode = "";
		if ($search["periode_laporan"] === "Bulanan") {
			if ($search["bulan"] == '01') {
				$periode = "Januari " . $search["tahun"];
			} elseif ($search["bulan"] == '02') {
				$periode = "Februari " . $search["tahun"];
			} elseif ($search["bulan"] == '03') {
				$periode = "Maret " . $search["tahun"];
			} elseif ($search["bulan"] == '04') {
				$periode = "April " . $search["tahun"];
			} elseif ($search["bulan"] == '05') {
				$periode = "Mei " . $search["tahun"];
			} elseif ($search["bulan"] == '06') {
				$periode = "Juni " . $search["tahun"];
			} elseif ($search["bulan"] == '07') {
				$periode = "Juli " . $search["tahun"];
			} elseif ($search["bulan"] == '08') {
				$periode = "Agustus " . $search["tahun"];
			} elseif ($search["bulan"] == '09') {
				$periode = "September " . $search["tahun"];
			} elseif ($search["bulan"] == '10') {
				$periode = "Oktober " . $search["tahun"];
			} elseif ($search["bulan"] == '11') {
				$periode = "November " . $search["tahun"];
			} elseif ($search["bulan"] == '12') {
				$periode = "Desember " . $search["tahun"];
			}
		} elseif ($search["periode_laporan"] === "Harian") {
			$periode = get_date_format(date2mysql($search['tanggal_harian']));
		} elseif ($search["periode_laporan"] === "Rentang Waktu") {
			$periode = get_date_format(date2mysql($search['tanggal_awal'])) . " s.d " . get_date_format(date2mysql($search['tanggal_akhir']));
		}

		if ($search['unit'] !== '' ) {
			$unit = $this->db->where('id', $search['unit'], true)->select('nama')->get('sm_unit')->row()->nama;
		} else {
			$unit = "";
		}

		if ($search['kategori_barang'] !== '' ) {
			$kategori = $this->db->where('id', $search['kategori'], true)->select('nama')->get('sm_kategori_barang')->row()->nama;
		} else {
			$kategori = "";
		}

		$data                    = $this->stok->getListDataSisaStok( 0, 0, $search );
		$data['get_date_format'] = $this->m_masterdata->get_date_format();
		$data['parameter']       = $search;
		$data['unit']            = $unit;
		$data['kategori']        = $kategori;
		$data["periode"] = $periode;

		$this->load->view('export/sisa_stok_gizi.php', $data );
	}
}
