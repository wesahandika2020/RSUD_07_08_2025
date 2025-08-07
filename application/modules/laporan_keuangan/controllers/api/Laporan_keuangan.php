<?php

defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

class Laporan_keuangan extends REST_Controller
{
	function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->datetime = date('Y-m-d H:i:s');
		$this->limit    = 10;
		$this->load->model('Laporan_keuangan_model', 'm_ku');

		$id_translucent = $this->session->userdata('id_translucent');
		if (empty($id_translucent)) :
			$this->response(array('error' => 'Anda belum login'), REST_Controller::HTTP_UNAUTHORIZED);
			exit();
		endif;
	}

	function periode($search)
	{
		$periode = '';
		if ($search["periode_laporan"] == 'Harian') {
			$periode = 'Harian (' . $search["tanggal_harian"] . ')';
		} else if ($search["periode_laporan"] == 'Bulanan') {
			if ($search["bulan"] == '01') {
				$periode = "Bulanan (Januari " . $search["tahun"] . ')';
			} elseif ($search["bulan"] == '02') {
				$periode = "Bulanan (Februari " . $search["tahun"] . ')';
			} elseif ($search["bulan"] == '03') {
				$periode = "Bulanan (Maret " . $search["tahun"] . ')';
			} elseif ($search["bulan"] == '04') {
				$periode = "Bulanan (April " . $search["tahun"] . ')';
			} elseif ($search["bulan"] == '05') {
				$periode = "Bulanan (Mei " . $search["tahun"] . ')';
			} elseif ($search["bulan"] == '06') {
				$periode = "Bulanan (Juni " . $search["tahun"] . ')';
			} elseif ($search["bulan"] == '07') {
				$periode = "Bulanan (Juli " . $search["tahun"] . ')';
			} elseif ($search["bulan"] == '08') {
				$periode = "Bulanan (Agustus " . $search["tahun"] . ')';
			} elseif ($search["bulan"] == '09') {
				$periode = "Bulanan (September " . $search["tahun"] . ')';
			} elseif ($search["bulan"] == '10') {
				$periode = "Bulanan (Oktober " . $search["tahun"] . ')';
			} elseif ($search["bulan"] == '11') {
				$periode = "Bulanan (November " . $search["tahun"] . ')';
			} elseif ($search["bulan"] == '12') {
				$periode = "Bulanan (Desember " . $search["tahun"] . ')';
			}
		} else if ($search["periode_laporan"] == 'Rentang Waktu') {
			$periode = 'Rentang Waktu (' . $search["tanggal_awal"] . ' sd ' . $search["tanggal_akhir"] . ')';
		}
		return $periode;
	}

	private function start($page)
	{
		return (($page - 1) * $this->limit);
	}

	function dokter_lain_auto_get()
	{
		$q = safe_get('q');
		$page = safe_get('page');
		$start = $this->start($page);
		// $key = 'dokter_lain_auto_'.$q.'_'.$page;
		// if (!$this->redis->get($key)) :
		$data = $this->m_ku->getPetugas($q, $start, $this->limit);
		if ((safe_get('page') == 1) & ($q == '')) :
			$pilih[] = array(
				'id' => '',
				'nama' => '',
			);
			$data['data'] = array_merge($pilih, $data['data']);
			$data['total'] += 1;
		endif;
		// $this->redis->setex($key, 86400, json_encode($data));
		$this->response($data, REST_Controller::HTTP_OK);
		// else :
		//     exit($this->redis->get($key));
		// endif;
	}

	function get_list_laporan_keuangan_01_get()
	{

		if (!$this->get('page')) :
			$this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
		endif;

		$search = [
			'jenis_laporan'   => safe_get('jenis_laporan'),
			'periode_laporan' => safe_get('periode_laporan'),
			'tanggal_harian'  => safe_get('tanggal_harian'),
			'bulan'           => safe_get('bulan'),
			'tahun'           => safe_get('tahun'),
			'tanggal_awal'    => safe_get('tanggal_awal'),
			'tanggal_akhir'   => safe_get('tanggal_akhir'),
			'jenis_jaminan'   => safe_get('jenis_jaminan'),
			'id_dokter'  	  => safe_get('id_dokter'),
		];

		$data['periode'] 	= $this->periode($search);
		$data['penjamin'] = $search["jenis_jaminan"] <> '' ? $this->db->select('nama')->from('sm_penjamin')->where('id', $search["jenis_jaminan"])->get()->row()->nama : '';
		$data['dokter']   = $search["id_dokter"] <> '' ? $this->db->select('pg.nama')->from('sm_pegawai pg')->join('sm_tenaga_medis tm', 'pg.id = tm.id_pegawai')->where('tm.id', $search["id_dokter"])->get()->row()->nama : '';

		$data['data'] 		= [];
		$dokter = $this->db->query($this->m_ku->getListLaporanKeuangan01_Dokter($search))->result();
		foreach ($dokter as $i_dok => $v_dok) {
			$nama_dokter = str_replace(' ', '_', $v_dok->nama);

			$penjamin = $this->db->query($this->m_ku->getListLaporanKeuangan01_Penjamin($search, $v_dok->id_tenaga_medis))->result();
			foreach ($penjamin as $i_pj => $v_pj) {
				$nama_penjamin = str_replace(' ', '_', $v_pj->penjamin);

				$jen_lay = $this->db->query($this->m_ku->getListLaporanKeuangan_JenLay($search, $v_dok->id_tenaga_medis, $v_pj->id_penjamin))->result();
				foreach ($jen_lay as $i_jenlay => $v_jenlay) {
					$jenis_layanan = str_replace(' ', '_', $v_jenlay->jenis_layanan);
					$alllayanan = $this->db->query($this->m_ku->getListLaporanKeuangan_Poliklinik('dpjp', $search, $v_dok->id_tenaga_medis, $v_pj->id_penjamin, $v_jenlay->jenis_layanan))->result();
					$data['data'][$nama_dokter][$nama_penjamin][$jenis_layanan]   = $alllayanan;
				}

				$resep = $this->db->query($this->m_ku->getListLaporanKeuangan_Resep('dpjp', $search, $v_dok->id_tenaga_medis, $v_pj->id_penjamin))->result();
				$data['data'][$nama_dokter][$nama_penjamin]['Resep'] = $resep;

				$bhp = $this->db->query($this->m_ku->getListLaporanKeuangan_Bhp('dpjp', $search, $v_dok->id_tenaga_medis, $v_pj->id_penjamin))->result();
				$data['data'][$nama_dokter][$nama_penjamin]['Bhp'] = $bhp;
			}
		}

		if ($data) :
			$this->response($data, REST_Controller::HTTP_OK); // (200)
		else :
			$this->response(array('error' => 'Data is Not Found'), REST_Controller::HTTP_NOT_FOUND);
		endif;
	}

	function get_list_laporan_keuangan_02_get()
	{

		if (!$this->get('page')) :
			$this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
		endif;

		$search = [
			'jenis_laporan'   => safe_get('jenis_laporan'),
			'periode_laporan' => safe_get('periode_laporan'),
			'tanggal_harian'  => safe_get('tanggal_harian'),
			'bulan'           => safe_get('bulan'),
			'tahun'           => safe_get('tahun'),
			'tanggal_awal'    => safe_get('tanggal_awal'),
			'tanggal_akhir'   => safe_get('tanggal_akhir'),
			'jenis_jaminan'   => safe_get('jenis_jaminan'),
			'id_dokter'  	  => safe_get('id_dokter'),
		];

		$data['periode'] 	= $this->periode($search);
		$data['penjamin'] = $search["jenis_jaminan"] <> '' ? $this->db->select('nama')->from('sm_penjamin')->where('id', $search["jenis_jaminan"])->get()->row()->nama : '';
		$data['dokter']   = $search["id_dokter"] <> '' ? $this->db->select('pg.nama')->from('sm_pegawai pg')->join('sm_tenaga_medis tm', 'pg.id = tm.id_pegawai')->where('tm.id', $search["id_dokter"])->get()->row()->nama : '';

		$data['data'] 		= [];
		$dokter = $this->db->query($this->m_ku->getListLaporanKeuangan02_Dokter($search))->result();

		foreach ($dokter as $i_dok => $v_dok) {
			$nama_dokter = str_replace(' ', '_', $v_dok->nama);
			$penjamin = $this->db->query($this->m_ku->getListLaporanKeuangan02_Penjamin($search, $v_dok->id_tenaga_medis))->result();

			foreach ($penjamin as $i_pj => $v_pj) {
				$nama_penjamin = str_replace(' ', '_', $v_pj->penjamin);

				$jen_lay = $this->db->query($this->m_ku->getListLaporanKeuangan_JenLay($search, $v_dok->id_tenaga_medis, $v_pj->id_penjamin))->result();
				foreach ($jen_lay as $i_jenlay => $v_jenlay) {
					$jenis_layanan = str_replace(' ', '_', $v_jenlay->jenis_layanan);
					$alllayanan = $this->db->query($this->m_ku->getListLaporanKeuangan_Poliklinik('raber', $search, $v_dok->id_tenaga_medis, $v_pj->id_penjamin, $v_jenlay->jenis_layanan))->result();
					$data['data'][$nama_dokter][$nama_penjamin][$jenis_layanan]   = $alllayanan;
				}

				$resep = $this->db->query($this->m_ku->getListLaporanKeuangan_Resep('raber', $search, $v_dok->id_tenaga_medis, $v_pj->id_penjamin))->result();
				$data['data'][$nama_dokter][$nama_penjamin]['Resep'] = $resep;
			}
		}

		if ($data) :
			$this->response($data, REST_Controller::HTTP_OK); // (200)
		else :
			$this->response(array('error' => 'Data is Not Found'), REST_Controller::HTTP_NOT_FOUND);
		endif;
	}

	function get_list_laporan_keuangan_03_get()
	{

		if (!$this->get('page')) :
			$this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
		endif;

		$search = [
			'jenis_laporan'   => safe_get('jenis_laporan'),
			'periode_laporan' => safe_get('periode_laporan'),
			'tanggal_harian'  => safe_get('tanggal_harian'),
			'bulan'           => safe_get('bulan'),
			'tahun'           => safe_get('tahun'),
			'tanggal_awal'    => safe_get('tanggal_awal'),
			'tanggal_akhir'   => safe_get('tanggal_akhir'),
			'jenis_jaminan'   => safe_get('jenis_jaminan'),
			'id_dokter'  	  => safe_get('id_petugas'),
		];

		$data['periode'] 	= $this->periode($search);
		$data['penjamin'] = $search["jenis_jaminan"] <> '' ? $this->db->select('nama')->from('sm_penjamin')->where('id', $search["jenis_jaminan"])->get()->row()->nama : '';
		$data['dokter']   = $search["id_dokter"] <> '' ? $this->db->select('pg.nama')->from('sm_pegawai pg')->join('sm_tenaga_medis tm', 'pg.id = tm.id_pegawai')->where('tm.id', $search["id_dokter"])->get()->row()->nama : '';

		$data['data'] 		= [];
		$dokter = $this->db->query($this->m_ku->getListLaporanKeuangan03_Dokter($search))->result();

		foreach ($dokter as $i_dok => $v_dok) {
			$nama_dokter = str_replace(' ', '_', $v_dok->nama);

			$penjamin = $this->db->query($this->m_ku->getListLaporanKeuangan03_Penjamin($search, $v_dok->id_tenaga_medis))->result();
			foreach ($penjamin as $i_pj => $v_pj) {
				$nama_penjamin = str_replace(' ', '_', $v_pj->penjamin);

				$jen_lay = $this->db->query($this->m_ku->getListLaporanKeuangan_JenLay($search, $v_dok->id_tenaga_medis, $v_pj->id_penjamin))->result();
				foreach ($jen_lay as $i_jenlay => $v_jenlay) {
					$jenis_layanan = str_replace(' ', '_', $v_jenlay->jenis_layanan);
					$alllayanan = $this->db->query($this->m_ku->getListLaporanKeuangan_Poliklinik('raber', $search, $v_dok->id_tenaga_medis, $v_pj->id_penjamin, $v_jenlay->jenis_layanan))->result();
					$data['data'][$nama_dokter][$nama_penjamin][$jenis_layanan]   = $alllayanan;
				}

				$resep = $this->db->query($this->m_ku->getListLaporanKeuangan_Resep('raber', $search, $v_dok->id_tenaga_medis, $v_pj->id_penjamin))->result();
				$data['data'][$nama_dokter][$nama_penjamin]['Resep'] = $resep;
			}
		}

		if ($data) :
			$this->response($data, REST_Controller::HTTP_OK);
		else :
			$this->response(array('error' => 'Data is Not Found'), REST_Controller::HTTP_NOT_FOUND);
		endif;
	}

	function get_list_laporan_keuangan_04_get()
	{

		if (!$this->get('page')) :
			$this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
		endif;

		$search = [
			'jenis_laporan'   => safe_get('jenis_laporan'),
			'periode_laporan' => safe_get('periode_laporan'),
			'tanggal_harian'  => safe_get('tanggal_harian'),
			'bulan'           => safe_get('bulan'),
			'tahun'           => safe_get('tahun'),
			'tanggal_awal'    => safe_get('tanggal_awal'),
			'tanggal_akhir'   => safe_get('tanggal_akhir'),
			'jenis_jaminan'   => safe_get('jenis_jaminan'),
			'id_dokter'  	  => safe_get('id_petugas'),
		];

		$data['periode'] 	= $this->periode($search);
		$data['penjamin'] = $search["jenis_jaminan"] <> '' ? $this->db->select('nama')->from('sm_penjamin')->where('id', $search["jenis_jaminan"])->get()->row()->nama : '';
		$data['dokter']   = $search["id_dokter"] <> '' ? $this->db->select('pg.nama')->from('sm_pegawai pg')->join('sm_tenaga_medis tm', 'pg.id = tm.id_pegawai')->where('tm.id', $search["id_dokter"])->get()->row()->nama : '';

		$data['data'] 		= [];

		// LAB
		$dokterLab = $this->db->query($this->m_ku->getListLaporanKeuangan04_DokterLab($search))->result();
		foreach ($dokterLab as $i_dok => $v_dok) {
			$nama_dokter = str_replace(' ', '_', $v_dok->nama);
			$penjamin = $this->db->query($this->m_ku->getListLaporanKeuangan04_PenjaminLab($search, $v_dok->id_tenaga_medis))->result();
			foreach ($penjamin as $i_pj => $v_pj) {
				$nama_penjamin = str_replace(' ', '_', $v_pj->penjamin);
				$Lab = $this->db->query($this->m_ku->getListLaporanKeuangan04_Lab($search, $v_dok->id_tenaga_medis, $v_pj->id_penjamin))->result();
				$data['data']['lab'][$nama_dokter][$nama_penjamin] = $Lab;
			}
		}

		// RAD
		$dokterRad = $this->db->query($this->m_ku->getListLaporanKeuangan04_DokterRad($search))->result();
		foreach ($dokterRad as $i_dok => $v_dok) {
			$nama_dokter = str_replace(' ', '_', $v_dok->nama);
			$penjamin = $this->db->query($this->m_ku->getListLaporanKeuangan04_PenjaminRad($search, $v_dok->id_tenaga_medis))->result();
			foreach ($penjamin as $i_pj => $v_pj) {
				$nama_penjamin = str_replace(' ', '_', $v_pj->penjamin);
				$Lab = $this->db->query($this->m_ku->getListLaporanKeuangan04_Rad($search, $v_dok->id_tenaga_medis, $v_pj->id_penjamin))->result();
				$data['data']['rad'][$nama_dokter][$nama_penjamin] = $Lab;
			}
		}

		// OK
		$dokterOk = $this->db->query($this->m_ku->getListLaporanKeuangan04_DokterOk($search))->result();
		foreach ($dokterOk as $i_dok => $v_dok) {
			$nama_dokter = str_replace(' ', '_', $v_dok->nama);
			$penjamin = $this->db->query($this->m_ku->getListLaporanKeuangan04_PenjaminOk($search, $v_dok->id_tenaga_medis))->result();
			foreach ($penjamin as $i_pj => $v_pj) {
				$nama_penjamin = str_replace(' ', '_', $v_pj->penjamin);
				$Lab = $this->db->query($this->m_ku->getListLaporanKeuangan04_Ok($search, $v_dok->id_tenaga_medis, $v_pj->id_penjamin))->result();
				$data['data']['ok'][$nama_dokter][$nama_penjamin] = $Lab;
			}
		}

		// VK
		$dokterVk = $this->db->query($this->m_ku->getListLaporanKeuangan04_DokterVk($search))->result();
		foreach ($dokterVk as $i_dok => $v_dok) {
			$nama_dokter = str_replace(' ', '_', $v_dok->nama);
			$penjamin = $this->db->query($this->m_ku->getListLaporanKeuangan04_PenjaminVk($search, $v_dok->id_tenaga_medis))->result();
			foreach ($penjamin as $i_pj => $v_pj) {
				$nama_penjamin = str_replace(' ', '_', $v_pj->penjamin);
				$Lab = $this->db->query($this->m_ku->getListLaporanKeuangan04_Vk($search, $v_dok->id_tenaga_medis, $v_pj->id_penjamin))->result();
				$data['data']['vk'][$nama_dokter][$nama_penjamin] = $Lab;
			}
		}

		if ($data) :
			$this->response($data, REST_Controller::HTTP_OK);
		else :
			$this->response(array('error' => 'Data is Not Found'), REST_Controller::HTTP_NOT_FOUND);
		endif;
	}

	function get_list_laporan_keuangan_05_get()
	{
		if (!$this->get('page')) :
			$this->response(null, REST_Controller::HTTP_BAD_REQUEST); // (400)
		endif;

		$start  = ($this->get('page') - 1) * 20;

		$search = [
			'jenis_laporan'   => safe_get('jenis_laporan'),
			'periode_laporan' => safe_get('periode_laporan'),
			'tanggal_harian'  => safe_get('tanggal_harian'),
			'bulan'           => safe_get('bulan'),
			'tahun'           => safe_get('tahun'),
			'tanggal_awal'    => safe_get('tanggal_awal'),
			'tanggal_akhir'   => safe_get('tanggal_akhir'),
			'kelas_rawat'   	=> safe_get('kelas_rawat'),
			'jenis_rawat'   	=> safe_get('jenis_rawat'),
			'jenis_jaminan'   => safe_get('jenis_jaminan'),
			'id_dokter'  	  	=> safe_get('id_dokter'),
		];

		$data          		= $this->m_ku->getListLaporanKeuangan05(20, $start, $search);
		$data['periode'] 	= $this->periode($search);
		$data['penjamin'] = $search["jenis_jaminan"] <> '' ? $this->db->select('nama')->from('sm_penjamin')->where('id', $search["jenis_jaminan"])->get()->row()->nama : '';
		$data['kelas_rawat'] = $search["kelas_rawat"] <> '' ? $this->db->select('nama')->from('sm_kelas')->where('id', $search["kelas_rawat"])->get()->row()->nama : '';
		$data['jenis_rawat'] = $search["jenis_rawat"];
		$data['dokter']   = $search["id_dokter"] <> '' ? $this->db->select('pg.nama')->from('sm_pegawai pg')->join('sm_tenaga_medis tm', 'pg.id = tm.id_pegawai')->where('tm.id', $search["id_dokter"])->get()->row()->nama : '';

		// $data['data'] 		= $this->m_ku->getListLaporanKeuangan05($search)->result();
		// $data          = $this->m_ku->getListLaporanKeuangan05(20, $start, $search);
		$data['page']  = (int) $this->get('page');
		$data['limit'] = 20;

		if ($data) :
			$this->response($data, REST_Controller::HTTP_OK);
		else :
			$this->response(array('error' => 'Data is Not Found'), REST_Controller::HTTP_NOT_FOUND);
		endif;
	}
}
