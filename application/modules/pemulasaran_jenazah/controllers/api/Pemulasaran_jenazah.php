<?php

defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

/**
 * @package         CodeIgniter
 * @subpackage      Rest Server
 * @category        Controller
 * @author          Faiz Muhammad Syam
 * @license         Syams Corporation
 */
class Pemulasaran_jenazah extends REST_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->limit = 10;
		$this->load->model('Pemulasaran_jenazah_model', 'm_pemulasaran_jenazah');
		$this->load->model('pegawai/Pegawai_model', 'm_pegawai');


		$id_translucent = $this->session->userdata('id_translucent');
		if (empty($id_translucent)) :
			$this->response(array('error' => 'Anda belum login'), REST_Controller::HTTP_UNAUTHORIZED);
			exit();
		endif;
	}

	private function start($page)
	{
		return (($page - 1) * $this->limit);
	}

	function get_list_pemulasaran_jenazah_get()
	{
		if (!$this->get('page')) :
			$this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
		endif;

		$start          = ($this->get('page') - 1) * $this->limit;
		$search         = [
			'tanggal_awal'      => safe_get('tanggal_awal'),
			'tanggal_akhir'     => safe_get('tanggal_akhir'),
			'jenis_layanan'     => $this->get('jenis'),
			'no_register'       => safe_get('no_register'),
			'no_rm'             => safe_get('no_rm'),
			'nik'               => safe_get('nik'),
			'nama'              => safe_get('nama'),
		];

		$data            = $this->m_pemulasaran_jenazah->getListDataPemulasaranJenazah($this->limit, $start, $search);
		$data['page']    = (int) $this->get('page');
		$data['limit']   = $this->limit;

		if ($data) :
			$this->response($data, REST_Controller::HTTP_OK); // (200)
		endif;
	}

	public function create_no_kematian()
	{
		$monthNow   = date('n');
		// $dateNow 	= date('Y-m-d');
		$year  		= date('Y');
		// $limit 		= date("t", strtotime($year));
		$template1  = '3671208';
		$template2  = 'ipj-rsudkt';
		$convertedMonth = '';
		switch ($monthNow) {
			case 1:
				$convertedMonth = 'I';
				break;
			case 2:
				$convertedMonth = 'II';
				break;
			case 3:
				$convertedMonth = 'III';
				break;
			case 4:
				$convertedMonth = 'IV';
				break;
			case 5:
				$convertedMonth = 'V';
				break;
			case 6:
				$convertedMonth = 'VI';
				break;
			case 7:
				$convertedMonth = 'VIII';
				break;
			case 8:
				$convertedMonth = 'IX';
				break;
			case 9:
				$convertedMonth = 'IX';
				break;
			case 10:
				$convertedMonth = 'X';
				break;
			case 11:
				$convertedMonth = 'XI';
				break;
			case 12:
				$convertedMonth = 'XII';
				break;
			default:
				$convertedMonth = false;
				break;
		}

		$totalDied = $this->m_pemulasaran_jenazah->countTotalMeninggal();
		$getCurrentTotalDied = $this->m_pemulasaran_jenazah->countCurrentTotalMeninggal();
		$currentTotalDied = $getCurrentTotalDied[0]['count'];

		$result = $template1 . '/' . $currentTotalDied . '/' . $convertedMonth . '/' . $totalDied . '/' . $template2 . '/' . $year;

		return $result;
	}

	function fetch_data_jenazah_get()
	{
		if (!$this->get('id')) :
			$this->response(NULL, REST_Controller::HTTP_BAD_REQUEST);
		endif;

		$data['data'] = $this->m_pemulasaran_jenazah->get_data_jenazah($this->get('id'));
		if(!empty($data['data'])) {
			$data['data']->created_at = date('Y-m-d', strtotime($data['data']->created_at));
		}

		$this->response($data, REST_Controller::HTTP_OK);
	}

	function fetch_data_jenazah_tindakan_get()
	{

		$data['data'] = $this->m_pemulasaran_jenazah->get_data_jenazah_tindakan($this->get('id'));

		$this->response($data, REST_Controller::HTTP_OK);
	}

	function store_data_jenazah_post()
	{
		$petugasIpj = $this->m_pegawai->getDataPegawaiByNip($this->session->userdata('nip'));
		if (empty($petugasIpj)) {
			$this->response(NULL, REST_Controller::HTTP_BAD_REQUEST);
		}

		// empty($this->input->post('idPenanggungJawab')) 
		// 	? $idPenanggungJawab = null 
		// 	: $idPenanggungJawab = $this->input->post('idPenanggungJawab');		

		// $this->db->trans_begin();				

		if (empty($this->input->post('idPemulasaranJenazah'))) {
			$data = array(
				'id_layanan_pendaftaran'    => $this->input->post('idLayananPendaftaran'),
				'id_staff_ipj'              => $petugasIpj->id,
				// 'id_penanggung_jawab'       => $idPenanggungJawab,
				'waktu_panggilan'           => $this->input->post('waktuPanggilan'),
				'waktu_meninggal'           => $this->input->post('waktuMeninggal'),
				'waktu_masuk_ruang_jenazah' => $this->input->post('waktuMasukRuangJenazah'),
				'waktu_pengantaran'         => $this->input->post('waktuPengantaran'),
				'id_supir_mobil_jenazah'    => $this->input->post('sopirAmbulance'),
				'jam_tugas'                 => date('H:i:s'),
				// 'surat_kematian'            => $this->create_no_kematian(),
				'surat_kematian'            => $this->input->post('suratKematian'),
				'hubungan_keluarga'         => $this->input->post('hubunganKeluarga'),
				'penyerahan_jenazah'        => $this->input->post('penyerahanJenazah'),
				'no_mobil'					=> $this->input->post('noMobil'),
				'created_at'				=> date('Y-m-d H:i:s'),
				'is_ttd_supir_ambulan'		=> $this->input->post('isSupir'),
				'is_ttd_kerabat_almarhum'	=> $this->input->post('isKerabat'),
				'is_ttd_ka_ipj'				=> $this->input->post('isKa'),
				'is_pemulasaran_jenazah'	=> $this->input->post('isPemulasaran'),
				'is_pengantaran_jenazah'	=> $this->input->post('isPengantaran'),
				'is_pengawetan_jenazah'		=> $this->input->post('isPengawetan'),
				'is_lainnya'				=> $this->input->post('isLain'),
				'keterangan_lainnya'		=> $this->input->post('keteranganLain'),
				'alasan_tidak_bersedia'		=> $this->input->post('keteranganTidakbersedia'),
				'umur_tanggal_lahir_pj'		=> $this->input->post('umurTgllahirPJ'),
				'tempat_lahir_pj'			=> $this->input->post('tempatLahirPJ'),
				'agama_pj'					=> $this->input->post('agamaPJ'),
				'nama_penanggung_jawab'		=> $this->input->post('namaPJ'),
				'no_ktp_pj'					=> $this->input->post('noktpPJ'),
				'alamat_pj'					=> $this->input->post('alamatPJ'),
				'tlp_pj'					=> $this->input->post('tlpPJ'),
				'kelamin_pj'				=> $this->input->post('kelaminPJ'),

			);

			$this->db->insert('sm_pemulasaran_jenazah', $data);
			$idPemulasaranJenazah = $this->db->insert_id();
		} else {
			$data = array(
				'waktu_panggilan'           => $this->input->post('waktuPanggilan'),
				'waktu_meninggal'           => $this->input->post('waktuMeninggal'),
				'waktu_masuk_ruang_jenazah' => $this->input->post('waktuMasukRuangJenazah'),
				'waktu_pengantaran'         => $this->input->post('waktuPengantaran'),
				'id_supir_mobil_jenazah'    => $this->input->post('sopirAmbulance'),
				// 'id_penanggung_jawab'       => $idPenanggungJawab,
				'hubungan_keluarga'         => $this->input->post('hubunganKeluarga'),
				'penyerahan_jenazah'        => $this->input->post('penyerahanJenazah'),
				'no_mobil'					=> $this->input->post('noMobil'),
				'keterangan_lainnya'		=> $this->input->post('keteranganLain'),
				'is_ttd_supir_ambulan'		=> $this->input->post('isSupir'),
				'is_ttd_kerabat_almarhum'	=> $this->input->post('isKerabat'),
				'is_ttd_ka_ipj'				=> $this->input->post('isKa'),
				'is_pemulasaran_jenazah'	=> $this->input->post('isPemulasaran'),
				'is_pengantaran_jenazah'	=> $this->input->post('isPengantaran'),
				'is_pengawetan_jenazah'		=> $this->input->post('isPengawetan'),
				'is_lainnya'				=> $this->input->post('isLain'),
				'alasan_tidak_bersedia'		=> $this->input->post('keteranganTidakbersedia'),
				'umur_tanggal_lahir_pj'		=> $this->input->post('umurTgllahirPJ'),
				'tempat_lahir_pj'			=> $this->input->post('tempatLahirPJ'),
				'agama_pj'					=> $this->input->post('agamaPJ'),
				'nama_penanggung_jawab'		=> $this->input->post('namaPJ'),
				'no_ktp_pj'					=> $this->input->post('noktpPJ'),
				'alamat_pj'					=> $this->input->post('alamatPJ'),
				'tlp_pj'					=> $this->input->post('tlpPJ'),
				'kelamin_pj'				=> $this->input->post('kelaminPJ'),
				'surat_kematian'            => $this->input->post('suratKematian'),


			);

			$this->m_pemulasaran_jenazah->updateDataJenazah($data, $this->input->post('idPemulasaranJenazah'));

			$idPemulasaranJenazah = $this->input->post('idPemulasaranJenazah');
		}

		$this->m_pemulasaran_jenazah->delete_tindakan($idPemulasaranJenazah);
		$tindakan = $this->input->post('tindakan');

		if (!empty($tindakan)) {
			for ($x = 0; $x < count($tindakan); $x++) {
				$data = array(
					'id_pemulasaran_jenazah'    => $idPemulasaranJenazah,
					'id_layanan'                => $tindakan[$x]
				);

				$this->db->insert('sm_pemulasaran_jenazah_tindakan', $data);
			}
		}
		// var_dump($tindakan);exit(1);


		if ($this->db->trans_status() === false) :
			$this->db->trans_rollback();
			$status = false;
			$message = 'Gagal entri data jenazah';
		else :
			$this->db->trans_commit();
			$status = true;
			$message = 'Berhasil entri data jenazah';
		endif;

		$this->response(array('status' => $status, 'message' => $message), REST_Controller::HTTP_OK);
	}

	function simpan_selesai_ipj_get()
	{

		$dataIsPulang = array(
			'is_pulang'           => "1",
		);

		$this->m_pemulasaran_jenazah->updateSelesaiIPJ($dataIsPulang, $this->get('id_layanan_pendaftaran'));

		$this->db->where('id', $this->get('id_layanan_pendaftaran'))->update('sm_layanan_pendaftaran', ['tindak_lanjut' => 'Pulang']);
		$dataUpdateTglKeluar = array(
			'tanggal_keluar' => date('Y-m-d H:i:s'),
			'kondisi_keluar' => 'Meninggal',
		);

		$this->m_pemulasaran_jenazah->updateTanggalKeluar($dataUpdateTglKeluar, $this->get('id_pendaftaran'));

		$this->response(array('status' => true), REST_Controller::HTTP_OK);
	}

	function pembatalan_ipj_get()
	{
		if (!$this->get('id_layanan_pendaftaran', true)) :
			$this->response(NULL, REST_Controller::HTTP_BAD_REQUEST);
		endif;

		$id_layanan_pendaftaran = $this->get('id_layanan_pendaftaran', true);
		$status = $this->m_pemulasaran_jenazah->pembatalanIPJ($id_layanan_pendaftaran);
		// catat log transaksi batalnya
		$this->load->model('logs/Logs_model', 'm_logs');
		$this->m_logs->recordAdminLogs($id_layanan_pendaftaran, 'Batal Pemulasaran Jenazah');
		$this->response(array('status' => $status), REST_Controller::HTTP_OK);
	}
}
