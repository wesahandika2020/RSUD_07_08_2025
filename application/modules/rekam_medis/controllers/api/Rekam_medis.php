<?php

defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;
use Zxing\Result;

/**
 * @package         CodeIgniter
 * @subpackage      Rest Server
 * @category        Controller
 * @author          Faiz Muhammad Syam
 * @license         Syams Corporation
 */
class Rekam_medis extends REST_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->limit = 10;
		$this->load->model('pasien/Pasien_model', 'pasien');
		$this->load->model('Rekam_medis_model', 'rekam_medis');
		$this->load->model('Rekam_medis_baru_model', 'rekam_medis_baru');	
		$this->load->model('rawat_inap/Rawat_inap_model', 'm_rawat_inap');
		$this->load->model('pendaftaran/Pendaftaran_model', 'm_pendaftaran');

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

	function get_data_pasien_get()
	{
		if (!$this->get('id', true)) :
			$this->response(null, REST_Controller::HTTP_BAD_REQUEST); // (400)
		endif;

		$no_rm          = $this->get('id', true);
		$data['pasien'] = $this->pasien->getDataPasienById($no_rm);
		$kunjungan      = $this->rekam_medis->getListDataKunjungan($no_rm);

		foreach ($kunjungan as $row) :
			$row->tanggal_kunjungan = indo_tgl($row->tanggal_kunjungan);
			$row->layanan           = $this->rekam_medis->getLayananRuangan($row->id);
			$row->dpjp              = $this->rekam_medis->getDokterDPJP($row->id);
		endforeach;

		$data['kunjungan'] = $kunjungan;

		if ($data) :
			$this->response($data, REST_Controller::HTTP_OK); // (200)
		endif;
	}

	function get_riwayat_kunjungan_pasien_get()
	{
		if (!$this->get('id', true)) :
			$this->response(null, REST_Controller::HTTP_BAD_REQUEST); // (400)
		endif;
		$id_pendaftaran          = $this->get('id', true);
		$data                    = $this->rekam_medis->getDataKunjungan($id_pendaftaran);
		$data->tanggal_kunjungan = indo_tgl($data->tanggal_kunjungan);
		$data->layanan           = $this->rekam_medis->getLayananKunjungan($data->id);
		// var_dump($data->layanan);die;
		$this->response($data, REST_Controller::HTTP_OK);
	}

	function get_detail_obat_get()
	{
		if (!$this->get("id")) :
			$this->response(null, REST_Controller::HTTP_BAD_REQUEST);
		endif;
		$id_penjualan = $this->get("id");
		// $data         = $this->rekam_medis->getDetailObat($id_penjualan, $this->get("log"));
		$data         = $this->rekam_medis->getDetailObatRM($id_penjualan, $this->get("log"));
		$this->response($data, REST_Controller::HTTP_OK);
	}

	function get_detail_anamnesa_get()
	{
		if (!$this->get('id', true)) :
			$this->response(null, REST_Controller::HTTP_BAD_REQUEST); // (400)
		endif;

		$id   = $this->get('id', true);
		$data = $this->rekam_medis->getDetailAnamnesa($id);

		if ($data) :
			$this->response($data, REST_Controller::HTTP_OK); // (200)
		endif;
	}












	// FPTD
	function check_penolakan_tindakan_kedokteran_get(){
		$data = [];
		$data = $this->rekam_medis->getPenolakanTindakanKedokteranById($this->get('id'));

		if ($data != null) {
			$this->response($data[0], REST_Controller::HTTP_OK);
		} else {
			$this->response($data, REST_Controller::HTTP_OK);
		}
	}

	// FPTD
	function simpan_penolakan_tindakan_kedokteran_post(){
		$checkData = '';
		$checkData = $this->rekam_medis->getPenolakanTindakanKedokteranById(safe_post('id_layanan_pendaftaran'));

		$this->db->trans_begin();
		if ($checkData == null) {
			$data = array(
				'id_layanan_pendaftaran' => safe_post('id_layanan_pendaftaran'),
				'id_saksi_1'             => safe_post('id_saksi_1') == '' ? null : safe_post('id_saksi_1'),
				'id_saksi_2'             => safe_post('id_saksi_2') == '' ? null : safe_post('id_saksi_2'),
				'nama_keluarga'          => safe_post('nama_keluarga') == '' ? null : safe_post('nama_keluarga'),
				'tanggal_lahir'          => safe_post('tanggal_lahir') == '' ? null : date2mysql(safe_post('tanggal_lahir')),
				'jenis_kelamin'          => safe_post('jenis_kelamin') == '' ? null : safe_post('jenis_kelamin'),
				'alamat'                 => safe_post('alamat_form_rekam_medis') == '' ? null : safe_post('alamat_form_rekam_medis'),
				'hubungan_keluarga'      => safe_post('hubungan_keluarga') == '' ? null : safe_post('hubungan_keluarga'),
				'tindakan'               => safe_post('tindakan') == '' ? null : safe_post('tindakan'),
				'updated_on'             => $this->datetime,
				'is_pasien'              => safe_post('is_pasien') == 'ya' ? 1 : 0,
			);

			$this->db->insert('sm_form_penolakan_tindakan_kedokteran', $data);
		} else {
			$data = array(
				'id_saksi_1'        => safe_post('id_saksi_1') == '' ? null : safe_post('id_saksi_1'),
				'id_saksi_2'        => safe_post('id_saksi_2') == '' ? null : safe_post('id_saksi_2'),
				'nama_keluarga'     => safe_post('nama_keluarga') == '' ? null : safe_post('nama_keluarga'),
				'tanggal_lahir'     => safe_post('tanggal_lahir') == '' ? null : date2mysql(safe_post('tanggal_lahir')),
				'jenis_kelamin'     => safe_post('jenis_kelamin') == '' ? null : safe_post('jenis_kelamin'),
				'alamat'            => safe_post('alamat_form_rekam_medis') == '' ? null : safe_post('alamat_form_rekam_medis'),
				'hubungan_keluarga' => safe_post('hubungan_keluarga') == '' ? null : safe_post('hubungan_keluarga'),
				'tindakan'          => safe_post('tindakan') == '' ? null : safe_post('tindakan'),
				'updated_on'        => $this->datetime,
				'is_pasien'         => safe_post('is_pasien') == 'ya' ? 1 : 0,
			);

			$this->db->where('id_layanan_pendaftaran', safe_post('id_layanan_pendaftaran'));
			$this->db->update('sm_form_penolakan_tindakan_kedokteran', $data);
		}

		if ($this->db->trans_status() === false) :
			$this->db->trans_rollback();
			$status  = false;
			$message = 'Gagal simpan form penolakan tindakan kedokteran';
		else :
			$this->db->trans_commit();
			$status  = true;
			$message = 'Berhasil simpan form penolakan tindakan kedokteran';
		endif;

		$this->response(array('status' => $status, 'message' => $message), REST_Controller::HTTP_OK);
	}
























	function check_persetujuan_tindakan_anestesi_get()
	{
		$data = [];
		$data = $this->rekam_medis->getPersetujuanTindakanAnestesiById($this->get('id'));

		if ($data != null) {
			$this->response($data[0], REST_Controller::HTTP_OK);
		} else {
			$this->response($data, REST_Controller::HTTP_OK);
		}
	}

	function simpan_persetujuan_tindakan_anestesi_post()
	{
		$checkData = '';
		$checkData = $this->rekam_medis->getPersetujuanTindakanAnestesiById(safe_post('id_layanan_pendaftaran'));

		$this->db->trans_begin();
		if ($checkData == null) {
			$data = array(
				'id_layanan_pendaftaran' => safe_post('id_layanan_pendaftaran'),
				'id_saksi_1'             => safe_post('id_saksi_1_mpta') == '' ? null : safe_post('id_saksi_1_mpta'),
				'id_saksi_2'             => safe_post('id_saksi_2_mpta') == '' ? null : safe_post('id_saksi_2_mpta'),
				'nama_keluarga'          => safe_post('nama_keluarga_mpta') == '' ? null : safe_post('nama_keluarga_mpta'),
				'tanggal_lahir'          => safe_post('tanggal_lahir_mpta') == '' ? null : date2mysql(safe_post('tanggal_lahir_mpta')),
				'jenis_kelamin'          => safe_post('jenis_kelamin_mpta') == '' ? null : safe_post('jenis_kelamin_mpta'),
				'alamat'                 => safe_post('alamat_form_rekam_medis_mpta') == '' ? null : safe_post('alamat_form_rekam_medis_mpta'),
				'hubungan_keluarga'      => safe_post('hubungan_keluarga_mpta') == '' ? null : safe_post('hubungan_keluarga_mpta'),
				'tindakan'               => safe_post('tindakan_mpta') == '' ? null : safe_post('tindakan_mpta'),
				'updated_on'             => $this->datetime,
				'is_pasien'              => safe_post('is_pasien_mpta') == 'ya' ? 1 : 0,
			);

			$this->db->insert('sm_form_persetujuan_tindakan_anestesi', $data);
		} else {
			$data = array(
				'id_saksi_1'        => safe_post('id_saksi_1_mpta') == '' ? null : safe_post('id_saksi_1_mpta'),
				'id_saksi_2'        => safe_post('id_saksi_2_mpta') == '' ? null : safe_post('id_saksi_2_mpta'),
				'nama_keluarga'     => safe_post('nama_keluarga_mpta') == '' ? null : safe_post('nama_keluarga_mpta'),
				'tanggal_lahir'     => safe_post('tanggal_lahir_mpta') == '' ? null : date2mysql(safe_post('tanggal_lahir_mpta')),
				'jenis_kelamin'     => safe_post('jenis_kelamin_mpta') == '' ? null : safe_post('jenis_kelamin_mpta'),
				'alamat'            => safe_post('alamat_form_rekam_medis_mpta') == '' ? null : safe_post('alamat_form_rekam_medis_mpta'),
				'hubungan_keluarga' => safe_post('hubungan_keluarga_mpta') == '' ? null : safe_post('hubungan_keluarga_mpta'),
				'tindakan'          => safe_post('tindakan_mpta') == '' ? null : safe_post('tindakan_mpta'),
				'updated_on'        => $this->datetime,
				'is_pasien'         => safe_post('is_pasien_mpta') == 'ya' ? 1 : 0,
			);

			$this->db->where('id_layanan_pendaftaran', safe_post('id_layanan_pendaftaran'));
			$this->db->update('sm_form_persetujuan_tindakan_anestesi', $data);
		}

		if ($this->db->trans_status() === false) :
			$this->db->trans_rollback();
			$status  = false;
			$message = 'Gagal simpan form persetujuan tindakan anestesi';
		else :
			$this->db->trans_commit();
			$status  = true;
			$message = 'Berhasil simpan form persetujuan tindakan anestesi';
		endif;

		$this->response(array('status' => $status, 'message' => $message), REST_Controller::HTTP_OK);
	}

	function check_checklist_penerimaan_pasien_rawat_inap_get()
	{
		$data = [];
		$data = $this->rekam_medis->getChecklistPenerimaanPasienRawatInapById($this->get('id'));

		if ($data != null) {
			$this->response($data[0], REST_Controller::HTTP_OK);
		} else {
			$this->response($data, REST_Controller::HTTP_OK);
		}
	}

	function simpan_checklist_penerimaan_pasien_rawat_inap_post()
	{
		$checkData = '';
		$checkData = $this->rekam_medis->getChecklistPenerimaanPasienRawatInapById(safe_post('id_layanan_pendaftaran'));

		$this->db->trans_begin();
		if ($checkData == null) {
			$data = array(
				'id_layanan_pendaftaran'          => safe_post('id_layanan_pendaftaran'),
				'is_pasien'                       => safe_post('is_pasien') == '' ? null : safe_post('is_pasien'),
				'nama_keluarga'                   => safe_post('nama_keluarga') == '' ? null : safe_post('nama_keluarga'),
				'perawat_yang_merawat'            => safe_post('informasi_tentang_perawat_yang_merawat_hari_ini') == '' ? null : safe_post('informasi_tentang_perawat_yang_merawat_hari_ini'),
				'dokter_yang_merawat'             => safe_post('informasi_tentang_dokter_yang_merawat') == '' ? null : safe_post('informasi_tentang_dokter_yang_merawat'),
				'nurse_station'                   => safe_post('nurse_station') == '' ? null : safe_post('nurse_station'),
				'kamar_mandi_pasien'              => safe_post('kamar_mandi_pasien') == '' ? null : safe_post('kamar_mandi_pasien'),
				'bel_pasien'                      => safe_post('bel_di_kamar_mandi') == '' ? null : safe_post('bel_di_kamar_mandi'),
				'tempat_tidur_pasien'             => safe_post('tempat_tidur_pasien') == '' ? null : safe_post('tempat_tidur_pasien'),
				'remote'                          => safe_post('remote_tv_ac') == '' ? null : safe_post('remote_tv_ac'),
				'tempat_ibadah'                   => safe_post('tempat_ibadah') == '' ? null : safe_post('tempat_ibadah'),
				'tempat_sampah'                   => safe_post('tempat_sampah_infeksi_dan_non_infeksi') == '' ? null : safe_post('tempat_sampah_infeksi_dan_non_infeksi'),
				'jadwal_pembagian'                => safe_post('jadwal_pembagian_makan_dari_rumah_sakit') == '' ? null : safe_post('jadwal_pembagian_makan_dari_rumah_sakit'),
				'jadwal_visit'                    => safe_post('jadwal_visit_dokter') == '' ? null : safe_post('jadwal_visit_dokter'),
				'jadwal_jam_berkunjung'           => safe_post('jadwal_jam_berkunjung') == '' ? null : safe_post('jadwal_jam_berkunjung'),
				'jadwal_ganti_linen'              => safe_post('jadwal_ganti_linen') == '' ? null : safe_post('jadwal_ganti_linen'),
				'membawa_barang_sesuai_keperluan' => safe_post('perawat_menjelaskan_untuk_membawa_barang_sesuai_keperluan') == '' ? null : safe_post('perawat_menjelaskan_untuk_membawa_barang_sesuai_keperluan'),
				'mematuhi_peraturan'              => safe_post('perawat_menghimbau_untuk_mematuhi_peraturan_yang_tertempel_di_ruangan') == '' ? null : safe_post('perawat_menghimbau_untuk_mematuhi_peraturan_yang_tertempel_di_ruangan'),
				'tidak_duduk_ditempat_tidur'      => safe_post('menghimbau_tidak_duduk_ditempat_tidur') == '' ? null : safe_post('menghimbau_tidak_duduk_ditempat_tidur'),
				'menyimpan_barang_berharga'       => safe_post('tidak_diperkenankan_menyimpan_barang_berharga') == '' ? null : safe_post('tidak_diperkenankan_menyimpan_barang_berharga'),
				'dapat_kartu_penunggu'            => safe_post('mendapat_kartu_penunggu') == '' ? null : safe_post('mendapat_kartu_penunggu'),
				'menghargai_privasi_pasien'       => safe_post('untuk_selalu_menghargai_privasi_pasien') == '' ? null : safe_post('untuk_selalu_menghargai_privasi_pasien'),
				'gelang'                          => safe_post('pemasangan_dan_fungsi_gelang') == '' ? null : safe_post('pemasangan_dan_fungsi_gelang'),
				'cuci_tangan'                     => safe_post('cara_cuci_tangan') == '' ? null : safe_post('cara_cuci_tangan'),
				'updated_on'                      => $this->datetime,
			);

			$this->db->insert('sm_form_checklist_penerimaan_pasien_rawat_inap', $data);
		} else {
			$data = array(
				'is_pasien'                       => safe_post('is_pasien') == '' ? null : safe_post('is_pasien'),
				'nama_keluarga'                   => safe_post('nama_keluarga') == '' ? null : safe_post('nama_keluarga'),
				'perawat_yang_merawat'            => safe_post('informasi_tentang_perawat_yang_merawat_hari_ini') == '' ? null : safe_post('informasi_tentang_perawat_yang_merawat_hari_ini'),
				'dokter_yang_merawat'             => safe_post('informasi_tentang_dokter_yang_merawat') == '' ? null : safe_post('informasi_tentang_dokter_yang_merawat'),
				'nurse_station'                   => safe_post('nurse_station') == '' ? null : safe_post('nurse_station'),
				'kamar_mandi_pasien'              => safe_post('kamar_mandi_pasien') == '' ? null : safe_post('kamar_mandi_pasien'),
				'bel_pasien'                      => safe_post('bel_di_kamar_mandi') == '' ? null : safe_post('bel_di_kamar_mandi'),
				'tempat_tidur_pasien'             => safe_post('tempat_tidur_pasien') == '' ? null : safe_post('tempat_tidur_pasien'),
				'remote'                          => safe_post('remote_tv_ac') == '' ? null : safe_post('remote_tv_ac'),
				'tempat_ibadah'                   => safe_post('tempat_ibadah') == '' ? null : safe_post('tempat_ibadah'),
				'tempat_sampah'                   => safe_post('tempat_sampah_infeksi_dan_non_infeksi') == '' ? null : safe_post('tempat_sampah_infeksi_dan_non_infeksi'),
				'jadwal_pembagian'                => safe_post('jadwal_pembagian_makan_dari_rumah_sakit') == '' ? null : safe_post('jadwal_pembagian_makan_dari_rumah_sakit'),
				'jadwal_visit'                    => safe_post('jadwal_visit_dokter') == '' ? null : safe_post('jadwal_visit_dokter'),
				'jadwal_jam_berkunjung'           => safe_post('jadwal_jam_berkunjung') == '' ? null : safe_post('jadwal_jam_berkunjung'),
				'jadwal_ganti_linen'              => safe_post('jadwal_ganti_linen') == '' ? null : safe_post('jadwal_ganti_linen'),
				'membawa_barang_sesuai_keperluan' => safe_post('perawat_menjelaskan_untuk_membawa_barang_sesuai_keperluan') == '' ? null : safe_post('perawat_menjelaskan_untuk_membawa_barang_sesuai_keperluan'),
				'mematuhi_peraturan'              => safe_post('perawat_menghimbau_untuk_mematuhi_peraturan_yang_tertempel_di_ruangan') == '' ? null : safe_post('perawat_menghimbau_untuk_mematuhi_peraturan_yang_tertempel_di_ruangan'),
				'tidak_duduk_ditempat_tidur'      => safe_post('menghimbau_tidak_duduk_ditempat_tidur') == '' ? null : safe_post('menghimbau_tidak_duduk_ditempat_tidur'),
				'menyimpan_barang_berharga'       => safe_post('tidak_diperkenankan_menyimpan_barang_berharga') == '' ? null : safe_post('tidak_diperkenankan_menyimpan_barang_berharga'),
				'dapat_kartu_penunggu'            => safe_post('mendapat_kartu_penunggu') == '' ? null : safe_post('mendapat_kartu_penunggu'),
				'menghargai_privasi_pasien'       => safe_post('untuk_selalu_menghargai_privasi_pasien') == '' ? null : safe_post('untuk_selalu_menghargai_privasi_pasien'),
				'gelang'                          => safe_post('pemasangan_dan_fungsi_gelang') == '' ? null : safe_post('pemasangan_dan_fungsi_gelang'),
				'cuci_tangan'                     => safe_post('cara_cuci_tangan') == '' ? null : safe_post('cara_cuci_tangan'),
				'updated_on'                      => $this->datetime,
			);

			$this->db->where('id_layanan_pendaftaran', safe_post('id_layanan_pendaftaran'));
			$this->db->update('sm_form_checklist_penerimaan_pasien_rawat_inap', $data);
		}

		if ($this->db->trans_status() === false) :
			$this->db->trans_rollback();
			$status  = false;
			$message = 'Gagal simpan form checklist penerimaan pasien rawat inap';
		else :
			$this->db->trans_commit();
			$status  = true;
			$message = 'Berhasil simpan form checklist penerimaan pasien rawat inap';
		endif;

		$this->response(array('status' => $status, 'message' => $message), REST_Controller::HTTP_OK);
	}



	// PWHI 
	function check_pemberian_informasi_get(){
		$data['pendaftaran_detail'] = "";
		$data['list_pemberian_informasi'] = [];
		$data = $this->rekam_medis->getPendaftaranDetailTindakan($this->get('id_pendaftaran', true), $this->get('id_layanan', true));
		$data['pendaftaran_detail'] = $this->rekam_medis->getPendaftaranDetailRekamMedis($this->get('id_layanan_pendaftaran'));
		$data ['list_pemberian_informasi'] = $this->rekam_medis->getPemberianInformasi($this->get('id_pendaftaran', true), $this->get('id_layanan_pendaftaran', true));
		$data['list_pemberian_informasi_logs'] = $this->rekam_medis->getPemberianInformasiLogs($this->get('id_pendaftaran'));	
		if ($data != null) {
			$this->response($data, REST_Controller::HTTP_OK);
		} else {
			$this->response($data, REST_Controller::HTTP_OK);
		}
	}

	// PWHI LOGS
	function simpan_pemberian_informasi_post(){
		$checkDataPemberianInformasi = '';
		if (safe_post('id_pi') !== '') {
			$checkDataPemberianInformasi = $this->rekam_medis->getPemberianInformasiById(safe_post('id_pi'));
		}
		$this->db->trans_begin();
	
		if (empty($checkDataPemberianInformasi)) {
			// INSERT DATA
			$data = array(
				'id_pendaftaran'			   => safe_post('id_pendaftaran'),
				'id_layanan_pendaftaran'       => safe_post('id_layanan_pendaftaran'),
				'is_pasien'                    => safe_post('is_pasien') == '' ? null : safe_post('is_pasien'),
				'id_dokter_pelaksana_tindakan' => safe_post('id_dokter_pelaksana_tindakan') == '' ? null : safe_post('id_dokter_pelaksana_tindakan'),
				'tanggal_jam_pi' 			   => (safe_post('tanggal_jam_pi') !== '' ? datetime2mysql(safe_post('tanggal_jam_pi')) : NULL),
				'pemberi_informasi'            => safe_post('pemberi_informasi') == '' ? null : safe_post('pemberi_informasi'),
				'penerima_informasi'           => safe_post('penerima_informasi') == '' ? null : safe_post('penerima_informasi'),
				'diagnosis_kerja'              => safe_post('diagnosis_kerja') == '' ? null : safe_post('diagnosis_kerja'),
				'diagnosis_kerja_check'        => safe_post('diagnosis_kerja_check') == '' ? null : safe_post('diagnosis_kerja_check'),
				'dasar_diagnosis'              => safe_post('dasar_diagnosis') == '' ? null : safe_post('dasar_diagnosis'),
				'dasar_diagnosis_check'        => safe_post('dasar_diagnosis_check') == '' ? null : safe_post('dasar_diagnosis_check'),
				'tindakan_kedokteran'          => safe_post('tindakan_kedokteran') == '' ? null : safe_post('tindakan_kedokteran'),
				'tindakan_kedokteran_check'    => safe_post('tindakan_kedokteran_check') == '' ? null : safe_post('tindakan_kedokteran_check'),
				'indikasi_tindakan'            => safe_post('indikasi_tindakan') == '' ? null : safe_post('indikasi_tindakan'),
				'indikasi_tindakan_check'      => safe_post('indikasi_tindakan_check') == '' ? null : safe_post('indikasi_tindakan_check'),
				'tata_cara'                    => safe_post('tata_cara') == '' ? null : safe_post('tata_cara'),
				'tata_cara_check'              => safe_post('tata_cara_check') == '' ? null : safe_post('tata_cara_check'),
				'tujuan'                       => safe_post('tujuan') == '' ? null : safe_post('tujuan'),
				'tujuan_check'                 => safe_post('tujuan_check') == '' ? null : safe_post('tujuan_check'),
				'risiko_komplikasi'            => safe_post('risiko_komplikasi') == '' ? null : safe_post('risiko_komplikasi'),
				'risiko_komplikasi_check'      => safe_post('risiko_komplikasi_check') == '' ? null : safe_post('risiko_komplikasi_check'),
				'prognosis'                    => safe_post('prognosis') == '' ? null : safe_post('prognosis'),
				'prognosis_check'              => safe_post('prognosis_check') == '' ? null : safe_post('prognosis_check'),
				'alternatif_resiko'            => safe_post('alternatif_resiko') == '' ? null : safe_post('alternatif_resiko'),
				'alternatif_resiko_check'      => safe_post('alternatif_resiko_check') == '' ? null : safe_post('alternatif_resiko_check'),
				'menyelamatkan_pasien'         => safe_post('menyelamatkan_pasien') == '' ? null : safe_post('menyelamatkan_pasien'),
				'menyelamatkan_pasien_check'   => safe_post('menyelamatkan_pasien_check') == '' ? null : safe_post('menyelamatkan_pasien_check'),
				'penggunaan_darah'             => safe_post('penggunaan_darah') == '' ? null : safe_post('penggunaan_darah'),
				'penggunaan_darah_check'       => safe_post('penggunaan_darah_check') == '' ? null : safe_post('penggunaan_darah_check'),
				'analgesia'                    => safe_post('analgesia') == '' ? null : safe_post('analgesia'),
				'analgesia_check'              => safe_post('analgesia_check') == '' ? null : safe_post('analgesia_check'),
				'nama_keluarga'                => safe_post('nama_keluarga') == '' ? null : safe_post('nama_keluarga'),
				'id_users'					   => $this->session->userdata('id_translucent'),
				'created_date'				   => $this->datetime,
				'updated_on'             	   => $this->datetime	
			);
			$this->db->insert('sm_form_pemberian_informasi', $data);
	
		} else {
			// UPDATE DATA
			$data = array(
				'is_pasien'                    => safe_post('is_pasien') == '' ? null : safe_post('is_pasien'),
				'id_dokter_pelaksana_tindakan' => safe_post('id_dokter_pelaksana_tindakan') == '' ? null : safe_post('id_dokter_pelaksana_tindakan'),
				'tanggal_jam_pi' 			   => (safe_post('tanggal_jam_pi') !== '' ? datetime2mysql(safe_post('tanggal_jam_pi')) : NULL),
				'pemberi_informasi'            => safe_post('pemberi_informasi') == '' ? null : safe_post('pemberi_informasi'),
				'penerima_informasi'           => safe_post('penerima_informasi') == '' ? null : safe_post('penerima_informasi'),
				'diagnosis_kerja'              => safe_post('diagnosis_kerja') == '' ? null : safe_post('diagnosis_kerja'),
				'diagnosis_kerja_check'        => safe_post('diagnosis_kerja_check') == '' ? null : safe_post('diagnosis_kerja_check'),
				'dasar_diagnosis'              => safe_post('dasar_diagnosis') == '' ? null : safe_post('dasar_diagnosis'),
				'dasar_diagnosis_check'        => safe_post('dasar_diagnosis_check') == '' ? null : safe_post('dasar_diagnosis_check'),
				'tindakan_kedokteran'          => safe_post('tindakan_kedokteran') == '' ? null : safe_post('tindakan_kedokteran'),
				'tindakan_kedokteran_check'    => safe_post('tindakan_kedokteran_check') == '' ? null : safe_post('tindakan_kedokteran_check'),
				'indikasi_tindakan'            => safe_post('indikasi_tindakan') == '' ? null : safe_post('indikasi_tindakan'),
				'indikasi_tindakan_check'      => safe_post('indikasi_tindakan_check') == '' ? null : safe_post('indikasi_tindakan_check'),
				'tata_cara'                    => safe_post('tata_cara') == '' ? null : safe_post('tata_cara'),
				'tata_cara_check'              => safe_post('tata_cara_check') == '' ? null : safe_post('tata_cara_check'),
				'tujuan'                       => safe_post('tujuan') == '' ? null : safe_post('tujuan'),
				'tujuan_check'                 => safe_post('tujuan_check') == '' ? null : safe_post('tujuan_check'),
				'risiko_komplikasi'            => safe_post('risiko_komplikasi') == '' ? null : safe_post('risiko_komplikasi'),
				'risiko_komplikasi_check'      => safe_post('risiko_komplikasi_check') == '' ? null : safe_post('risiko_komplikasi_check'),
				'prognosis'                    => safe_post('prognosis') == '' ? null : safe_post('prognosis'),
				'prognosis_check'              => safe_post('prognosis_check') == '' ? null : safe_post('prognosis_check'),
				'alternatif_resiko'            => safe_post('alternatif_resiko') == '' ? null : safe_post('alternatif_resiko'),
				'alternatif_resiko_check'      => safe_post('alternatif_resiko_check') == '' ? null : safe_post('alternatif_resiko_check'),
				'menyelamatkan_pasien'         => safe_post('menyelamatkan_pasien') == '' ? null : safe_post('menyelamatkan_pasien'),
				'menyelamatkan_pasien_check'   => safe_post('menyelamatkan_pasien_check') == '' ? null : safe_post('menyelamatkan_pasien_check'),
				'penggunaan_darah'             => safe_post('penggunaan_darah') == '' ? null : safe_post('penggunaan_darah'),
				'penggunaan_darah_check'       => safe_post('penggunaan_darah_check') == '' ? null : safe_post('penggunaan_darah_check'),
				'analgesia'                    => safe_post('analgesia') == '' ? null : safe_post('analgesia'),
				'analgesia_check'              => safe_post('analgesia_check') == '' ? null : safe_post('analgesia_check'),
				'nama_keluarga'                => safe_post('nama_keluarga') == '' ? null : safe_post('nama_keluarga'),
				'id_users'                 	   => $this->session->userdata('id_translucent'),
				'updated_on'                   => $this->datetime
			);
	
			// HANYA SIMPAN FIELD VALID KE DALAM LOG
			$logData = array(
				'id_pendaftaran'      			=> $checkDataPemberianInformasi->id_pendaftaran,
				'id_layanan_pendaftaran'  		=> $checkDataPemberianInformasi->id_layanan_pendaftaran,
				'is_pasien'             		=> $checkDataPemberianInformasi->is_pasien,
				'id_dokter_pelaksana_tindakan'  => $checkDataPemberianInformasi->id_dokter_pelaksana_tindakan,
				'tanggal_jam_pi'             	=> $checkDataPemberianInformasi->tanggal_jam_pi,
				'pemberi_informasi'            	=> $checkDataPemberianInformasi->pemberi_informasi,
				'penerima_informasi'            => $checkDataPemberianInformasi->penerima_informasi,
				'diagnosis_kerja'             	=> $checkDataPemberianInformasi->diagnosis_kerja,
				'diagnosis_kerja_check'         => $checkDataPemberianInformasi->diagnosis_kerja_check,
				'dasar_diagnosis'             	=> $checkDataPemberianInformasi->dasar_diagnosis,
				'dasar_diagnosis_check'        	=> $checkDataPemberianInformasi->dasar_diagnosis_check,
				'tindakan_kedokteran'           => $checkDataPemberianInformasi->tindakan_kedokteran,
				'tindakan_kedokteran_check'     => $checkDataPemberianInformasi->tindakan_kedokteran_check,
				'indikasi_tindakan'            	=> $checkDataPemberianInformasi->indikasi_tindakan,
				'indikasi_tindakan_check'       => $checkDataPemberianInformasi->indikasi_tindakan_check,
				'tata_cara'             		=> $checkDataPemberianInformasi->tata_cara,
				'tata_cara_check'             	=> $checkDataPemberianInformasi->tata_cara_check,
				'tujuan'             			=> $checkDataPemberianInformasi->tujuan,
				'tujuan_check'             		=> $checkDataPemberianInformasi->tujuan_check,
				'risiko_komplikasi'            	=> $checkDataPemberianInformasi->risiko_komplikasi,
				'risiko_komplikasi_check'       => $checkDataPemberianInformasi->risiko_komplikasi_check,
				'prognosis'             		=> $checkDataPemberianInformasi->prognosis,
				'prognosis_check'             	=> $checkDataPemberianInformasi->prognosis_check,
				'alternatif_resiko'             => $checkDataPemberianInformasi->alternatif_resiko,
				'alternatif_resiko_check'       => $checkDataPemberianInformasi->alternatif_resiko_check,
				'menyelamatkan_pasien'          => $checkDataPemberianInformasi->menyelamatkan_pasien,
				'menyelamatkan_pasien_check'    => $checkDataPemberianInformasi->menyelamatkan_pasien_check,
				'penggunaan_darah'             	=> $checkDataPemberianInformasi->penggunaan_darah,
				'penggunaan_darah_check'        => $checkDataPemberianInformasi->penggunaan_darah_check,
				'analgesia'             		=> $checkDataPemberianInformasi->analgesia,
				'analgesia_check'             	=> $checkDataPemberianInformasi->analgesia_check,
				'nama_keluarga'             	=> $checkDataPemberianInformasi->nama_keluarga,
				'id_users'                		=> $checkDataPemberianInformasi->id_users,
				'created_date'            		=> $checkDataPemberianInformasi->created_date, // ✅ ini yang penting
				'updated_on'            		=> $this->datetime,
				'log_action'              		=> 'update'
			);
			$this->db->insert('sm_form_pemberian_informasi_logs', $logData);
	
			$this->db->where('id', safe_post('id_pi'));
			$this->db->update('sm_form_pemberian_informasi', $data);
		}
	
		if ($this->db->trans_status() === false) {
			$this->db->trans_rollback();
			$status = false;
			$message = 'Gagal simpan Data';
		} else {
			$this->db->trans_commit();
			$status = true;
			$message = 'Berhasil simpan Data';
		}
	
		$this->response(array('status' => $status, 'message' => $message), REST_Controller::HTTP_OK);
	}

	// PWHI LOGS
	function hapus_pemberian_informasi_post(){
		if (!safe_post('id', true)) :
			$this->response(null, REST_Controller::HTTP_BAD_REQUEST);
		endif;
	
		// Ambil data sebelum dihapus
		$iPHapus = $this->db->where('id', safe_post('id'))->get('sm_form_pemberian_informasi')->row();
	
		$this->db->trans_begin();
	
		if ($iPHapus) {
			// Simpan ke log
			$logDataPi = array(
				'id_pendaftaran'          		=> $iPHapus->id_pendaftaran,
				'id_layanan_pendaftaran'  		=> $iPHapus->id_layanan_pendaftaran,
				'is_pasien'             		=> $iPHapus->is_pasien,
				'id_dokter_pelaksana_tindakan'  => $iPHapus->id_dokter_pelaksana_tindakan,
				'tanggal_jam_pi'             	=> $iPHapus->tanggal_jam_pi,
				'pemberi_informasi'            	=> $iPHapus->pemberi_informasi,
				'penerima_informasi'            => $iPHapus->penerima_informasi,
				'diagnosis_kerja'             	=> $iPHapus->diagnosis_kerja,
				'diagnosis_kerja_check'         => $iPHapus->diagnosis_kerja_check,
				'dasar_diagnosis'             	=> $iPHapus->dasar_diagnosis,
				'dasar_diagnosis_check'        	=> $iPHapus->dasar_diagnosis_check,
				'tindakan_kedokteran'           => $iPHapus->tindakan_kedokteran,
				'tindakan_kedokteran_check'     => $iPHapus->tindakan_kedokteran_check,
				'indikasi_tindakan'            	=> $iPHapus->indikasi_tindakan,
				'indikasi_tindakan_check'       => $iPHapus->indikasi_tindakan_check,
				'tata_cara'             		=> $iPHapus->tata_cara,
				'tata_cara_check'             	=> $iPHapus->tata_cara_check,
				'tujuan'             			=> $iPHapus->tujuan,
				'tujuan_check'             		=> $iPHapus->tujuan_check,
				'risiko_komplikasi'            	=> $iPHapus->risiko_komplikasi,
				'risiko_komplikasi_check'       => $iPHapus->risiko_komplikasi_check,
				'prognosis'             		=> $iPHapus->prognosis,
				'prognosis_check'             	=> $iPHapus->prognosis_check,
				'alternatif_resiko'             => $iPHapus->alternatif_resiko,
				'alternatif_resiko_check'       => $iPHapus->alternatif_resiko_check,
				'menyelamatkan_pasien'          => $iPHapus->menyelamatkan_pasien,
				'menyelamatkan_pasien_check'    => $iPHapus->menyelamatkan_pasien_check,
				'penggunaan_darah'             	=> $iPHapus->penggunaan_darah,
				'penggunaan_darah_check'        => $iPHapus->penggunaan_darah_check,
				'analgesia'             		=> $iPHapus->analgesia,
				'analgesia_check'             	=> $iPHapus->analgesia_check,
				'nama_keluarga'             	=> $iPHapus->nama_keluarga,
				'id_users'                		=> $iPHapus->id_users,
				'created_date'            		=> $iPHapus->created_date, // ✅ ini yang penting
				'updated_on'            		=> $this->datetime,
				'log_action'              		=> 'delete'
			);
			$this->db->insert('sm_form_pemberian_informasi_logs', $logDataPi);
		}
	
		// Hapus data utama
		$this->db->where('id', safe_post('id'))->delete('sm_form_pemberian_informasi');
	
		if ($this->db->trans_status() === false) :
			$this->db->trans_rollback();
			$status = false;
			$message = 'Gagal Hapus Data';
		else :
			$this->db->trans_commit();
			$status = true;
			$message = 'Berhasil Hapus Data';
		endif;
	
		$this->response(array('status' => $status, 'message' => $message), REST_Controller::HTTP_OK);
	}
	
	// PWHI
	function edit_pemberian_informasi_get(){
		$data['pendaftaran_detail'] = "";
		$data['edit_pemberian_informasi'] = "";
		$data['pendaftaran_detail'] = $this->rekam_medis->getPendaftaranDetailRekamMedis($this->get('id_layanan_pendaftaran'));
		$data['edit_pemberian_informasi'] = $this->rekam_medis->getPemberianInformasiById($this->get('id'));
		if ($data != null) {
			$this->response($data, REST_Controller::HTTP_OK);
		} else {
			$this->response($data, REST_Controller::HTTP_OK);
		}
	}



	function check_skrining_resiko_jatuh_rajal_get()
	{
		$data = [];
		$data = $this->rekam_medis->getSkriningResikoJatuhRajalById($this->get('id'));

		if ($data != null) {
			$this->response($data[0], REST_Controller::HTTP_OK);
		} else {
			$this->response($data, REST_Controller::HTTP_OK);
		}
	}

	function simpan_skrining_resiko_jatuh_rajal_post()
	{
		$checkData = '';
		$checkData = $this->rekam_medis->getSkriningResikoJatuhRajalById(safe_post('id_layanan_pendaftaran'));
		$tanggal_skrining = safe_post('tanggal_skrining');
		$tanggal_skrining = str_replace('/', '-', $tanggal_skrining);
		$tanggal_skrining = date('Y-m-d H:i', strtotime($tanggal_skrining));

		$this->db->trans_begin();
		if ($checkData == null) {
			$data = array(
				'id_layanan_pendaftaran'       => safe_post('id_layanan_pendaftaran'),
				'id_petugas'          		   => safe_post('id_petugas') !== '' ? safe_post('id_petugas') : NULL,
				'check_1'                      => safe_post('check_1') !== '' ? safe_post('check_1') : NULL,
				'check_2'                      => safe_post('check_2') !== '' ? safe_post('check_2') : NULL,
				'check_3'                      => safe_post('check_3') !== '' ? safe_post('check_3') : NULL,
				'check_4'                      => safe_post('check_4') !== '' ? safe_post('check_4') : NULL,
				'check_5'                      => safe_post('check_5') !== '' ? safe_post('check_5') : NULL,
				'check_6'                      => safe_post('check_6') !== '' ? safe_post('check_6') : NULL,
				'check_7'                      => safe_post('check_7') !== '' ? safe_post('check_7') : NULL,
				'check_8'                      => safe_post('check_8') !== '' ? safe_post('check_8') : NULL,
				'check_9'                      => safe_post('check_9') !== '' ? safe_post('check_9') : NULL,
				'check_10'                     => safe_post('check_10') !== '' ? safe_post('check_10') : NULL,
				'check_11'                     => safe_post('check_11') !== '' ? safe_post('check_11') : NULL,
				'check_12'                     => safe_post('check_12') !== '' ? safe_post('check_12') : NULL,
				'check_13'                     => safe_post('check_13') !== '' ? safe_post('check_13') : NULL,
				'check_14'                     => safe_post('check_14') !== '' ? safe_post('check_14') : NULL,
				'check_15'                     => safe_post('check_15') !== '' ? safe_post('check_15') : NULL,
				'resiko_jatuh'                 => safe_post('resiko_jatuh') !== '' ? safe_post('resiko_jatuh') : NULL,
				'tidak_resiko_jatuh'           => safe_post('tidak_resiko_jatuh') !== '' ? safe_post('tidak_resiko_jatuh') : NULL,
				'tanggal_skrining'         	   => $tanggal_skrining,
				'id_users'              	   => safe_post('id_users') !== '' ? safe_post('id_users') : NULL,
				'tanda_tangan'                 => safe_post('tanda_tangan') !== '' ? safe_post('tanda_tangan') : NULL,
				'stiker'                 	   => safe_post('stiker') !== '' ? safe_post('stiker') : NULL,
				'edukasi_resiko_jatuh'         => safe_post('edukasi_resiko_jatuh') !== '' ? safe_post('edukasi_resiko_jatuh') : NULL,
				'edukasi_lokasi'         	   => safe_post('edukasi_lokasi') !== '' ? safe_post('edukasi_lokasi') : NULL,
				'edukasi_pencegahan'           => safe_post('edukasi_pencegahan') !== '' ? safe_post('edukasi_pencegahan') : NULL,
				'created_date'                 => $this->datetime,
			);

			$this->db->insert('sm_skrining_resiko_jatuh_rajal', $data);
		} else {
			$data = array(
				'id_petugas'          		   => safe_post('id_petugas') !== '' ? safe_post('id_petugas') : NULL,
				'check_1'                      => safe_post('check_1') !== '' ? safe_post('check_1') : NULL,
				'check_2'                      => safe_post('check_2') !== '' ? safe_post('check_2') : NULL,
				'check_3'                      => safe_post('check_3') !== '' ? safe_post('check_3') : NULL,
				'check_4'                      => safe_post('check_4') !== '' ? safe_post('check_4') : NULL,
				'check_5'                      => safe_post('check_5') !== '' ? safe_post('check_5') : NULL,
				'check_6'                      => safe_post('check_6') !== '' ? safe_post('check_6') : NULL,
				'check_7'                      => safe_post('check_7') !== '' ? safe_post('check_7') : NULL,
				'check_8'                      => safe_post('check_8') !== '' ? safe_post('check_8') : NULL,
				'check_9'                      => safe_post('check_9') !== '' ? safe_post('check_9') : NULL,
				'check_10'                     => safe_post('check_10') !== '' ? safe_post('check_10') : NULL,
				'check_11'                     => safe_post('check_11') !== '' ? safe_post('check_11') : NULL,
				'check_12'                     => safe_post('check_12') !== '' ? safe_post('check_12') : NULL,
				'check_13'                     => safe_post('check_13') !== '' ? safe_post('check_13') : NULL,
				'check_14'                     => safe_post('check_14') !== '' ? safe_post('check_14') : NULL,
				'check_15'                     => safe_post('check_15') !== '' ? safe_post('check_15') : NULL,
				'resiko_jatuh'                 => safe_post('resiko_jatuh') !== '' ? safe_post('resiko_jatuh') : NULL,
				'tidak_resiko_jatuh'           => safe_post('tidak_resiko_jatuh') !== '' ? safe_post('tidak_resiko_jatuh') : NULL,
				'tanggal_skrining'             => $tanggal_skrining,
				'id_users'              	   => safe_post('id_users') !== '' ? safe_post('id_users') : NULL,
				'tanda_tangan'                 => safe_post('tanda_tangan') !== '' ? safe_post('tanda_tangan') : NULL,
				'stiker'                 	   => safe_post('stiker') !== '' ? safe_post('stiker') : NULL,
				'edukasi_resiko_jatuh'         => safe_post('edukasi_resiko_jatuh') !== '' ? safe_post('edukasi_resiko_jatuh') : NULL,
				'edukasi_lokasi'         	   => safe_post('edukasi_lokasi') !== '' ? safe_post('edukasi_lokasi') : NULL,
				'edukasi_pencegahan'           => safe_post('edukasi_pencegahan') !== '' ? safe_post('edukasi_pencegahan') : NULL,
				'updated_on'                   => $this->datetime,
			);

			$this->db->where('id_layanan_pendaftaran', safe_post('id_layanan_pendaftaran'));
			$this->db->update('sm_skrining_resiko_jatuh_rajal', $data);
		}

		if ($this->db->trans_status() === false) :
			$this->db->trans_rollback();
			$status  = false;
			$message = 'Gagal simpan form checklist penerimaan pasien rawat inap';
		else :
			$this->db->trans_commit();
			$status  = true;
			$message = 'Berhasil simpan form checklist penerimaan pasien rawat inap';
		endif;

		$this->response(array('status' => $status, 'message' => $message), REST_Controller::HTTP_OK);
	}

	// PTK BARU
	function check_persetujuan_tindakan_kedokteran_get(){
		$data = [];
		$data = $this->rekam_medis->getPersetujuanTindakanKedokteranById($this->get('id'));

		if ($data != null) {
			$this->response($data[0], REST_Controller::HTTP_OK);
		} else {
			$this->response($data, REST_Controller::HTTP_OK);
		}
	}

	// PTK BARU
	function simpan_persetujuan_tindakan_kedokteran_post(){
		$checkData = '';
		$checkData = $this->rekam_medis->getPersetujuanTindakanKedokteranById(safe_post('id_layanan_pendaftaran'));

		$this->db->trans_begin();
		if ($checkData == null) {
			$data = array(
				'id_layanan_pendaftaran' => safe_post('id_layanan_pendaftaran'),
				'id_saksi_1'             => safe_post('id_saksi_1') == '' ? null : safe_post('id_saksi_1'),
				'id_keluwarga'             => safe_post('id_keluwarga') == '' ? null : safe_post('id_keluwarga'),
				'nama_keluarga'          => safe_post('nama_keluarga') == '' ? null : safe_post('nama_keluarga'),
				'tanggal_lahir'          => safe_post('tanggal_lahir') == '' ? null : date2mysql(safe_post('tanggal_lahir')),
				'jenis_kelamin'          => safe_post('jenis_kelamin') == '' ? null : safe_post('jenis_kelamin'),
				'alamat'                 => safe_post('alamat_form_rekam_medis') == '' ? null : safe_post('alamat_form_rekam_medis'),
				'hubungan_keluarga'      => safe_post('hubungan_keluarga') == '' ? null : safe_post('hubungan_keluarga'),
				'tindakan'               => safe_post('tindakan') == '' ? null : safe_post('tindakan'),
				'updated_on'             => $this->datetime,
				'is_pasien'              => safe_post('is_pasien') == 'ya' ? 1 : 0,
			);

			$this->db->insert('sm_form_persetujuan_tindakan_kedokteran', $data);
		} else {
			$data = array(
				'id_saksi_1'        => safe_post('id_saksi_1') == '' ? null : safe_post('id_saksi_1'),
				'id_keluwarga'        => safe_post('id_keluwarga') == '' ? null : safe_post('id_keluwarga'),
				'nama_keluarga'     => safe_post('nama_keluarga') == '' ? null : safe_post('nama_keluarga'),
				'tanggal_lahir'     => safe_post('tanggal_lahir') == '' ? null : date2mysql(safe_post('tanggal_lahir')),
				'jenis_kelamin'     => safe_post('jenis_kelamin') == '' ? null : safe_post('jenis_kelamin'),
				'alamat'            => safe_post('alamat_form_rekam_medis') == '' ? null : safe_post('alamat_form_rekam_medis'),
				'hubungan_keluarga' => safe_post('hubungan_keluarga') == '' ? null : safe_post('hubungan_keluarga'),
				'tindakan'          => safe_post('tindakan') == '' ? null : safe_post('tindakan'),
				'updated_on'        => $this->datetime,
				'is_pasien'         => safe_post('is_pasien') == 'ya' ? 1 : 0,
			);

			$this->db->where('id_layanan_pendaftaran', safe_post('id_layanan_pendaftaran'));
			$this->db->update('sm_form_persetujuan_tindakan_kedokteran', $data);
		}

		if ($this->db->trans_status() === false) :
			$this->db->trans_rollback();
			$status  = false;
			$message = 'Gagal simpan form persetujuan tindakan kedokteran';
		else :
			$this->db->trans_commit();
			$status  = true;
			$message = 'Berhasil simpan form persetujuan tindakan kedokteran';
		endif;

		$this->response(array('status' => $status, 'message' => $message), REST_Controller::HTTP_OK);
	}

	function check_persetujuan_tindakan_operasi_get()
	{
		$data = [];
		$data = $this->rekam_medis->getPersetujuanTindakanOperasiById($this->get('id'));

		if ($data != null) {
			$this->response($data[0], REST_Controller::HTTP_OK);
		} else {
			$this->response($data, REST_Controller::HTTP_OK);
		}
	}

	function simpan_persetujuan_tindakan_operasi_post(){
		$checkData = '';
		$checkData = $this->rekam_medis->getPersetujuanTindakanOperasiById(safe_post('id_layanan_pendaftaran'));

		$this->db->trans_begin();
		if ($checkData == null) {
			$data = array(
				'id_layanan_pendaftaran' => safe_post('id_layanan_pendaftaran'),
				'id_saksi_1'             => safe_post('saksi_1') == '' ? null : safe_post('saksi_1'),
				'id_saksi_2'             => safe_post('saksi_2') == '' ? null : safe_post('saksi_2'),
				'nama_keluarga'          => safe_post('nama_keluarga') == '' ? null : safe_post('nama_keluarga'),
				'tanggal_lahir'          => safe_post('tanggal_lahir') == '' ? null : date2mysql(safe_post('tanggal_lahir')),
				'jenis_kelamin'          => safe_post('jenis_kelamin') == '' ? null : safe_post('jenis_kelamin'),
				'alamat'                 => safe_post('alamat_form_rekam_medis') == '' ? null : safe_post('alamat_form_rekam_medis'),
				'hubungan_keluarga'      => safe_post('hubungan_keluarga') == '' ? null : safe_post('hubungan_keluarga'),
				'tindakan'               => safe_post('tindakan') == '' ? null : safe_post('tindakan'),
				'updated_on'             => $this->datetime,
				'is_pasien'              => safe_post('is_pasien') == 'ya' ? 1 : 0,
			);

			$this->db->insert('sm_form_persetujuan_tindakan_operasi', $data);
		} else {
			$data = array(
				'id_saksi_1'        => safe_post('saksi_1') == '' ? null : safe_post('saksi_1'),
				'id_saksi_2'        => safe_post('saksi_2') == '' ? null : safe_post('saksi_2'),
				'nama_keluarga'     => safe_post('nama_keluarga') == '' ? null : safe_post('nama_keluarga'),
				'tanggal_lahir'     => safe_post('tanggal_lahir') == '' ? null : date2mysql(safe_post('tanggal_lahir')),
				'jenis_kelamin'     => safe_post('jenis_kelamin') == '' ? null : safe_post('jenis_kelamin'),
				'alamat'            => safe_post('alamat_form_rekam_medis') == '' ? null : safe_post('alamat_form_rekam_medis'),
				'hubungan_keluarga' => safe_post('hubungan_keluarga') == '' ? null : safe_post('hubungan_keluarga'),
				'tindakan'          => safe_post('tindakan') == '' ? null : safe_post('tindakan'),
				'updated_on'        => $this->datetime,
				'is_pasien'         => safe_post('is_pasien') == 'ya' ? 1 : 0,
			);

			$this->db->where('id_layanan_pendaftaran', safe_post('id_layanan_pendaftaran'));
			$this->db->update('sm_form_persetujuan_tindakan_operasi', $data);
		}

		if ($this->db->trans_status() === false) :
			$this->db->trans_rollback();
			$status  = false;
			$message = 'Gagal simpan form persetujuan tindakan operasi';
		else :
			$this->db->trans_commit();
			$status  = true;
			$message = 'Berhasil simpan form persetujuan tindakan operasi';
		endif;

		$this->response(array('status' => $status, 'message' => $message), REST_Controller::HTTP_OK);
	}

	function check_tata_tertib_get()
	{
		$data = [];
		$data = $this->rekam_medis->getTataTertibById($this->get('id'));

		if ($data != null) {
			$this->response($data[0], REST_Controller::HTTP_OK);
		} else {
			$this->response($data, REST_Controller::HTTP_OK);
		}
	}

	function simpan_tata_tertib_post()
	{
		$checkData = '';
		$checkData = $this->rekam_medis->getTataTertibById(safe_post('id_layanan_pendaftaran'));

		$this->db->trans_begin();
		if ($checkData == null) {
			$data = array(
				'id_layanan_pendaftaran' => safe_post('id_layanan_pendaftaran'),
				'is_pasien'              => safe_post('is_pasien') == '' ? null : safe_post('is_pasien'),
				'nama_keluarga'          => safe_post('nama_keluarga') == '' ? null : safe_post('nama_keluarga'),
				'no_telp'                => safe_post('no_telp') == '' ? null : safe_post('no_telp'),
				'updated_on'             => $this->datetime,
			);

			$this->db->insert('sm_form_tata_tertib', $data);
		} else {
			$data = array(
				'is_pasien'     => safe_post('is_pasien') == '' ? null : safe_post('is_pasien'),
				'nama_keluarga' => safe_post('nama_keluarga') == '' ? null : safe_post('nama_keluarga'),
				'no_telp'       => safe_post('no_telp') == '' ? null : safe_post('no_telp'),
				'updated_on'    => $this->datetime,
			);

			$this->db->where('id_layanan_pendaftaran', safe_post('id_layanan_pendaftaran'));
			$this->db->update('sm_form_tata_tertib', $data);
		}

		if ($this->db->trans_status() === false) :
			$this->db->trans_rollback();
			$status  = false;
			$message = 'Gagal simpan form tata tertib';
		else :
			$this->db->trans_commit();
			$status  = true;
			$message = 'Berhasil simpan form tata tertib';
		endif;

		$this->response(array('status' => $status, 'message' => $message), REST_Controller::HTTP_OK);
	}

	function check_surat_keterangan_kematian_get()
	{
		$data = [];
		
		$data= $this->m_pendaftaran->getPendaftaranDetail($this->get('id', true), $this->get('id_layanan_pendaftaran', true));
		$data['surat_keterangan_kematian'] = $this->rekam_medis->getSuratKeteranganKematianById($this->get('id'));

		if ($data != null) {
			$this->response($data, REST_Controller::HTTP_OK);
		} else {
			$this->response($data, REST_Controller::HTTP_OK);
		}
	}

	function simpan_surat_keterangan_kematian_post()
	{
		$checkData = '';
		$checkData = $this->rekam_medis->getSuratKeteranganKematianById(safe_post('id_pendaftaran'));

		$this->db->trans_begin();
		if ($checkData == null) {
			$data = array(
				'id_layanan_pendaftaran'       => safe_post('id_layanan_pendaftaran'),
				'nomor_surat_kematian' => safe_post('nomor_surat_kematian') == '' ? null : safe_post('nomor_surat_kematian'),
				'nomor_urut_kematian'  => safe_post('nomor_urut_kematian') == '' ? null : safe_post('nomor_urut_kematian'),
				'nomor_kk'             => safe_post('nomor_kk') == '' ? null : safe_post('nomor_kk'),
				'waktu_meninggal'    => safe_post('waktu_meninggal') == '' ? null : datetime2mysql(safe_post('waktu_meninggal')),
				'tempat_meninggal'     => safe_post('tempat_meninggal') == '' ? null : safe_post('tempat_meninggal'),
				'alamat_meninggal'     => safe_post('alamat_meninggal') == '' ? null : safe_post('alamat_meninggal'),
				'waktu_pemeriksaan'    => safe_post('waktu_pemeriksaan') == '' ? null : datetime2mysql(safe_post('waktu_pemeriksaan')),
				'jenis_pemeriksaan'    => safe_post('jenis_pemeriksaan') == '' ? null : safe_post('jenis_pemeriksaan'),
				'sebab_kematian'       => safe_post('sebab_kematian') == '' ? null : safe_post('sebab_kematian'),
				'kode_kematian'        => safe_post('kode_kematian') == '' ? null : safe_post('kode_kematian'),
				'dikubur'              => safe_post('dikubur') == '' ? null : safe_post('dikubur'),
				'awetkan'              => safe_post('diawetkan') == '' ? null : safe_post('diawetkan'),
				'yang_melapor'         => safe_post('yang_melapor') == '' ? null : safe_post('yang_melapor'),
				'ktp'                  => safe_post('ktp') == '' ? null : safe_post('ktp'),
				'id_pemeriksa'         => safe_post('id_dokter_pemeriksa') == '' ? null : safe_post('id_dokter_pemeriksa'),
				'updated_on'           => $this->datetime,
			);

			$this->db->insert('sm_form_surat_keterangan_kematian', $data);
		} else {
			$data = array(
				'nomor_surat_kematian' => safe_post('nomor_surat_kematian') == '' ? null : safe_post('nomor_surat_kematian'),
				'nomor_urut_kematian'  => safe_post('nomor_urut_kematian') == '' ? null : safe_post('nomor_urut_kematian'),
				'nomor_kk'             => safe_post('nomor_kk') == '' ? null : safe_post('nomor_kk'),
				'waktu_meninggal'    => safe_post('waktu_meninggal') == '' ? null : datetime2mysql(safe_post('waktu_meninggal')),
				'tempat_meninggal'     => safe_post('tempat_meninggal') == '' ? null : safe_post('tempat_meninggal'),
				'alamat_meninggal'     => safe_post('alamat_meninggal') == '' ? null : safe_post('alamat_meninggal'),
				'waktu_pemeriksaan'    => safe_post('waktu_pemeriksaan') == '' ? null : datetime2mysql(safe_post('waktu_pemeriksaan')),
				'jenis_pemeriksaan'    => safe_post('jenis_pemeriksaan') == '' ? null : safe_post('jenis_pemeriksaan'),
				'sebab_kematian'       => safe_post('sebab_kematian') == '' ? null : safe_post('sebab_kematian'),
				'kode_kematian'        => safe_post('kode_kematian') == '' ? null : safe_post('kode_kematian'),
				'dikubur'              => safe_post('dikubur') == '' ? null : safe_post('dikubur'),
				'awetkan'              => safe_post('diawetkan') == '' ? null : safe_post('diawetkan'),
				'yang_melapor'         => safe_post('yang_melapor') == '' ? null : safe_post('yang_melapor'),
				'ktp'                  => safe_post('ktp') == '' ? null : safe_post('ktp'),
				'id_pemeriksa'         => safe_post('id_dokter_pemeriksa') == '' ? null : safe_post('id_dokter_pemeriksa'),
				'updated_on'           => $this->datetime,
			);

			$this->db->where('id_layanan_pendaftaran', safe_post('id_layanan_pendaftaran'));
			$this->db->update('sm_form_surat_keterangan_kematian', $data);
		}

		if ($this->db->trans_status() === false) :
			$this->db->trans_rollback();
			$status  = false;
			$message = 'Gagal simpan form surat keterangan kematian';
		else :
			$this->db->trans_commit();
			$status  = true;
			$message = 'Berhasil simpan form surat keterangan kematian';
		endif;

		$this->response(array('status' => $status, 'message' => $message), REST_Controller::HTTP_OK);
	}

	function check_visum_et_repertum_get()
	{
		$data = [];
		$data = $this->rekam_medis->getVisumEtRepertumById($this->get('id'));

		if ($data != null) {
			$this->response($data[0], REST_Controller::HTTP_OK);
		} else {
			$this->response($data, REST_Controller::HTTP_OK);
		}
	}

	function simpan_visum_et_repertum_post()
	{
		$checkData = '';
		$checkData = $this->rekam_medis->getVisumEtRepertumById(safe_post('id_pendaftaran'));

		$this->db->trans_begin();
		if ($checkData == null) {
			$data = array(
				'id_pendaftaran'             => safe_post('id_pendaftaran'),
				'nomor_visum'                => safe_post('nomor_visum'),
				'nomor_surat'                => safe_post('nomor_surat'),
				'bulan_surat'                => safe_post('bulan_surat'),
				'tahun_surat'                => safe_post('tahun_surat'),
				'diperiksa'                  => datetime2mysql(safe_post('diperiksa')),
				'diterima'                   => datetime2mysql(safe_post('diterima')),
				'nomor_polisi'               => safe_post('nomor_polisi'),
				'ditandatangani_oleh'        => safe_post('ditandatangani_oleh'),
				'pangkat'                    => safe_post('pangkat'),
				'nrp'                        => safe_post('nrp'),
				'berat_badan'                => safe_post('berat_badan'),
				'panjang_badan'              => safe_post('panjang_badan'),
				'warna_kulit'                => safe_post('warna_kulit'),
				'warna_pelangi_mata'         => safe_post('warna_pelangi_mata'),
				'ciri_rambut'                => safe_post('ciri_rambut'),
				'keadaan_gizi'               => safe_post('keadaan_gizi'),
				'warna_rambut'               => safe_post('warna_rambut'),
				'tato'                       => safe_post('tato'),
				'posisi_tato'                => safe_post('posisi_tato') == '' ? null : safe_post('posisi_tato'),
				'tahi_lalat'                 => safe_post('tahi_lalat'),
				'posisi_tahi_lalat'          => safe_post('posisi_tahi_lalat') == '' ? null : safe_post('posisi_tahi_lalat'),
				'cacat_fisik'                => safe_post('cacat_fisik'),
				'posisi_cacat_fisik'         => safe_post('posisi_cacat_fisik') == '' ? null : safe_post('posisi_cacat_fisik'),
				'jaringan_parut'             => safe_post('jaringan_parut'),
				'posisi_jaringan_parut'      => safe_post('posisi_jaringan_parut') == '' ? null : safe_post('posisi_jaringan_parut'),
				'tanda_lahir'                => safe_post('tanda_lahir'),
				'posisi_tanda_lahir'         => safe_post('posisi_tanda_lahir') == '' ? null : safe_post('posisi_tanda_lahir'),
				'pakaian'                    => safe_post('pakaian'),
				'warna_pakaian'              => safe_post('warna_pakaian'),
				'bahan_pakaian'              => safe_post('bahan_pakaian'),
				'merk_pakaian'               => safe_post('merk_pakaian'),
				'ukuran_pakaian'             => safe_post('ukuran_pakaian'),
				'gambar_lambang_pakaian'     => safe_post('gambar_lambang_pakaian'),
				'tampak_pakaian'             => safe_post('tampak_pakaian'),
				'celana'                     => safe_post('celana'),
				'warna_celana'               => safe_post('warna_celana'),
				'ukuran_celana'              => safe_post('ukuran_celana'),
				'merk_celana'                => safe_post('merk_celana'),
				'perhiasan'                  => safe_post('perhiasan'),
				'lain_lain_identitas_pasien' => safe_post('lain_lain_identitas_pasien') == '' ? null : safe_post('lain_lain_identitas_pasien'),
				'tubuh'                      => safe_post('tubuh'),
				'daerah_berambut'            => safe_post('daerah_berambut'),
				'kelainan_daerah_rambut'     => safe_post('kelainan_daerah_berambut'),
				'bentuk_kepala'              => safe_post('bentuk_kepala'),
				'kelainan_bentuk_kepala'     => safe_post('kelainan_bentuk_kepala'),
				'wajah'                      => safe_post('wajah'),
				'kelainan_wajah'             => safe_post('kelainan_wajah'),
				'leher'                      => safe_post('leher'),
				'kelainan_leher'             => safe_post('kelainan_leher'),
				'bahu'                       => safe_post('bahu'),
				'kelainan_bahu'              => safe_post('kelainan_bahu'),
				'dada'                       => safe_post('dada'),
				'kelainan_dada'              => safe_post('kelainan_dada'),
				'punggung'                   => safe_post('punggung'),
				'kelainan_punggung'          => safe_post('kelainan_punggung'),
				'perut'                      => safe_post('perut'),
				'kelainan_perut'             => safe_post('kelainan_perut'),
				'bokong'                     => safe_post('bokong'),
				'kelainan_bokong'            => safe_post('kelainan_bokong'),
				'dubur'                      => safe_post('dubur'),
				'kelainan_dubur'             => safe_post('kelainan_dubur'),
				'anggota_gerak_atas_kanan'   => safe_post('anggota_gerak_atas_kanan'),
				'anggota_gerak_atas_kiri'    => safe_post('anggota_gerak_atas_kiri'),
				'anggota_gerak_bawah_kanan'  => safe_post('anggota_gerak_bawah_kanan'),
				'anggota_gerak_bawah_kiri'   => safe_post('anggota_gerak_bawah_kiri'),
				'alis_mata'                  => safe_post('alis_mata'),
				'bulu_mata'                  => safe_post('bulu_mata'),
				'selaput_kelopak_mata'       => safe_post('selaput_kelopak_mata'),
				'selaput_biji_mata'          => safe_post('selaput_biji_mata'),
				'selaput_bening_mata'        => safe_post('selaput_bening_mata'),
				'bentuk_pupil'               => safe_post('bentuk_pupil_mata'),
				'ukuran_pupil'               => safe_post('ukuran_pupil_mata'),
				'garis_tengah'               => safe_post('garis_tengah_pupil_mata'),
				'garis_kanan'                => safe_post('garis_kanan_pupil_mata'),
				'garis_kiri'                 => safe_post('garis_kiri_pupil_mata'),
				'pelangi_mata'               => safe_post('pelangi_mata'),
				'bentuk_hidung'              => safe_post('bentuk_hidung'),
				'permukaan_kulit_hidung'     => safe_post('permukaan_kulit_hidung'),
				'lubang_hidung'              => safe_post('lubang_hidung'),
				'bentuk_telinga'             => safe_post('bentuk_telinga'),
				'permukaan_telinga'          => safe_post('permukaan_telinga'),
				'lubang_telinga'             => safe_post('lubang_telinga'),
				'bibir_atas'                 => safe_post('bibir_atas'),
				'kesimpulan'                 => safe_post('kesimpulan'),
				'id_dokter_igd'              => safe_post('id_dokter_jaga_igd'),
				'updated_on'                 => $this->datetime,
			);

			$this->db->insert('sm_form_visum_et_repertum', $data);
		} else {
			$data = array(
				'nomor_visum'                => safe_post('nomor_visum'),
				'nomor_surat'                => safe_post('nomor_surat'),
				'bulan_surat'                => safe_post('bulan_surat'),
				'tahun_surat'                => safe_post('tahun_surat'),
				'diperiksa'                  => datetime2mysql(safe_post('diperiksa')),
				'diterima'                   => datetime2mysql(safe_post('diterima')),
				'nomor_polisi'               => safe_post('nomor_polisi'),
				'ditandatangani_oleh'        => safe_post('ditandatangani_oleh'),
				'pangkat'                    => safe_post('pangkat'),
				'nrp'                        => safe_post('nrp'),
				'berat_badan'                => safe_post('berat_badan'),
				'panjang_badan'              => safe_post('panjang_badan'),
				'warna_kulit'                => safe_post('warna_kulit'),
				'warna_pelangi_mata'         => safe_post('warna_pelangi_mata'),
				'ciri_rambut'                => safe_post('ciri_rambut'),
				'keadaan_gizi'               => safe_post('keadaan_gizi'),
				'warna_rambut'               => safe_post('warna_rambut'),
				'tato'                       => safe_post('tato'),
				'posisi_tato'                => safe_post('posisi_tato') == '' ? null : safe_post('posisi_tato'),
				'tahi_lalat'                 => safe_post('tahi_lalat'),
				'posisi_tahi_lalat'          => safe_post('posisi_tahi_lalat') == '' ? null : safe_post('posisi_tahi_lalat'),
				'cacat_fisik'                => safe_post('cacat_fisik'),
				'posisi_cacat_fisik'         => safe_post('posisi_cacat_fisik') == '' ? null : safe_post('posisi_cacat_fisik'),
				'jaringan_parut'             => safe_post('jaringan_parut'),
				'posisi_jaringan_parut'      => safe_post('posisi_jaringan_parut') == '' ? null : safe_post('posisi_jaringan_parut'),
				'tanda_lahir'                => safe_post('tanda_lahir'),
				'posisi_tanda_lahir'         => safe_post('posisi_tanda_lahir') == '' ? null : safe_post('posisi_tanda_lahir'),
				'pakaian'                    => safe_post('pakaian'),
				'warna_pakaian'              => safe_post('warna_pakaian'),
				'bahan_pakaian'              => safe_post('bahan_pakaian'),
				'merk_pakaian'               => safe_post('merk_pakaian'),
				'ukuran_pakaian'             => safe_post('ukuran_pakaian'),
				'gambar_lambang_pakaian'     => safe_post('gambar_lambang_pakaian'),
				'tampak_pakaian'             => safe_post('tampak_pakaian'),
				'celana'                     => safe_post('celana'),
				'warna_celana'               => safe_post('warna_celana'),
				'ukuran_celana'              => safe_post('ukuran_celana'),
				'merk_celana'                => safe_post('merk_celana'),
				'perhiasan'                  => safe_post('perhiasan'),
				'lain_lain_identitas_pasien' => safe_post('lain_lain_identitas_pasien') == '' ? null : safe_post('lain_lain_identitas_pasien'),
				'tubuh'                      => safe_post('tubuh'),
				'daerah_berambut'            => safe_post('daerah_berambut'),
				'kelainan_daerah_rambut'     => safe_post('kelainan_daerah_berambut'),
				'bentuk_kepala'              => safe_post('bentuk_kepala'),
				'kelainan_bentuk_kepala'     => safe_post('kelainan_bentuk_kepala'),
				'wajah'                      => safe_post('wajah'),
				'kelainan_wajah'             => safe_post('kelainan_wajah'),
				'leher'                      => safe_post('leher'),
				'kelainan_leher'             => safe_post('kelainan_leher'),
				'bahu'                       => safe_post('bahu'),
				'kelainan_bahu'              => safe_post('kelainan_bahu'),
				'dada'                       => safe_post('dada'),
				'kelainan_dada'              => safe_post('kelainan_dada'),
				'punggung'                   => safe_post('punggung'),
				'kelainan_punggung'          => safe_post('kelainan_punggung'),
				'perut'                      => safe_post('perut'),
				'kelainan_perut'             => safe_post('kelainan_perut'),
				'bokong'                     => safe_post('bokong'),
				'kelainan_bokong'            => safe_post('kelainan_bokong'),
				'dubur'                      => safe_post('dubur'),
				'kelainan_dubur'             => safe_post('kelainan_dubur'),
				'anggota_gerak_atas_kanan'   => safe_post('anggota_gerak_atas_kanan'),
				'anggota_gerak_atas_kiri'    => safe_post('anggota_gerak_atas_kiri'),
				'anggota_gerak_bawah_kanan'  => safe_post('anggota_gerak_bawah_kanan'),
				'anggota_gerak_bawah_kiri'   => safe_post('anggota_gerak_bawah_kiri'),
				'alis_mata'                  => safe_post('alis_mata'),
				'bulu_mata'                  => safe_post('bulu_mata'),
				'selaput_kelopak_mata'       => safe_post('selaput_kelopak_mata'),
				'selaput_biji_mata'          => safe_post('selaput_biji_mata'),
				'selaput_bening_mata'        => safe_post('selaput_bening_mata'),
				'bentuk_pupil'               => safe_post('bentuk_pupil_mata'),
				'ukuran_pupil'               => safe_post('ukuran_pupil_mata'),
				'garis_tengah'               => safe_post('garis_tengah_pupil_mata'),
				'garis_kanan'                => safe_post('garis_kanan_pupil_mata'),
				'garis_kiri'                 => safe_post('garis_kiri_pupil_mata'),
				'pelangi_mata'               => safe_post('pelangi_mata'),
				'bentuk_hidung'              => safe_post('bentuk_hidung'),
				'permukaan_kulit_hidung'     => safe_post('permukaan_kulit_hidung'),
				'lubang_hidung'              => safe_post('lubang_hidung'),
				'bentuk_telinga'             => safe_post('bentuk_telinga'),
				'permukaan_telinga'          => safe_post('permukaan_telinga'),
				'lubang_telinga'             => safe_post('lubang_telinga'),
				'bibir_atas'                 => safe_post('bibir_atas'),
				'kesimpulan'                 => safe_post('kesimpulan'),
				'id_dokter_igd'              => safe_post('id_dokter_jaga_igd'),
				'updated_on'                 => $this->datetime,
			);

			$this->db->where('id_pendaftaran', safe_post('id_pendaftaran'));
			$this->db->update('sm_form_visum_et_repertum', $data);
		}

		if ($this->db->trans_status() === false) :
			$this->db->trans_rollback();
			$status  = false;
			$message = 'Gagal simpan form visum et repertum';
		else :
			$this->db->trans_commit();
			$status  = true;
			$message = 'Berhasil simpan form visum et repertum';
		endif;

		$this->response(array('status' => $status, 'message' => $message), REST_Controller::HTTP_OK);
	}

	function get_data_pasien_sirms_lama_get()
	{
		if (!$this->get('id', true)) :
			$this->response(null, REST_Controller::HTTP_BAD_REQUEST); // (400)
		endif;

		// $noKtp = $this->get('noKtp', true);
		$noRm = $this->get('noRm', true);
		$nama = $this->get('nama', true);
		$umur = $this->get('umur', true);

		$data = $this->rekam_medis->getPasienSimrsLama($noRm, $nama, $umur);

		if (empty($data)) {
			$this->response(array('status' => false, 'message' => 'Data Pasien Tidak Ditemukan!'), REST_Controller::HTTP_OK);
		} else {
			$this->response(array('status' => true, 'id' => $data[0]->id), REST_Controller::HTTP_OK);
		}
	}

	function check_resume_medis_get()
	{
		$data = [];

		$data['detail_pendaftaran'] = $this->db->select('pe.no_register, pe.id_pasien, pa.nama, pa.telp')->from('sm_layanan_pendaftaran as lp')->join(
			'sm_pendaftaran as pe',
			'pe.id = lp.id_pendaftaran'
		)->join('sm_pasien as pa', 'pa.id = pe.id_pasien')->where('lp.id', $this->get('id_layanan_pendaftaran'), true)->get()->row();

		$data['rawat_inap'] = $this->db->select('ri.*, bg.nama as nama_bangsal, k.nama as nama_kelas, pj.nama as penjamin')->from('sm_rawat_inap as ri')->join(
			'sm_layanan_pendaftaran as lp',
			'lp.id = ri.id_layanan_pendaftaran'
		)->join('sm_bangsal as bg', 'bg.id = ri.id_bangsal')->join('sm_kelas as k', 'k.id = ri.id_kelas')->join(
			'sm_penjamin as pj',
			'pj.id = ri.id_penjamin',
			'left'
		)->where('ri.id_layanan_pendaftaran', $this->get('id_layanan_pendaftaran'), true)->get()->row();

		$data['kajian_medis'] = $this->m_rawat_inap->getKajianMedis($this->get('id_layanan_pendaftaran'));

		$data['kajian_perawatan'] = $this->m_rawat_inap->getKajianKeperawatan($this->get('id_layanan_pendaftaran'));

		if ($data != null) {
			$this->response($data, REST_Controller::HTTP_OK);
		} else {
			$this->response($data, REST_Controller::HTTP_OK);
		}
	}

	// SSCRJ
	function surgical_safety_ceklist_rawat_jalan_get()
	{
		$data = [];
		$data = $this->rekam_medis->getSurgicalSafetyCeklistRawatJalanById($this->get('id'));

		if ($data != null) {
			$this->response($data[0], REST_Controller::HTTP_OK);
		} else {
			$this->response($data, REST_Controller::HTTP_OK);
		}
	}

	// SSCRJ
	function simpan_surgical_safety_ceklist_rawat_jalan_post()
	{
		$checkDataSurgicalSafetyCeklisRawatJalan = '';
		$checkDataSurgicalSafetyCeklisRawatJalan = $this->rekam_medis->getSurgicalSafetyCeklistRawatJalanById(safe_post('id_layanan_pendaftaran'));

		$this->db->trans_begin();
		if ($checkDataSurgicalSafetyCeklisRawatJalan == null) {
			$data = array(
				'id_layanan_pendaftaran'  	=> safe_post('id_layanan_pendaftaran'),
				'id_users'       	 	 	=> $this->session->userdata('id_translucent'),
				'sscrj_gelang'          	=> safe_post('sscrj_gelang') == '' ? null : safe_post('sscrj_gelang'),
				'sscrj_lengkap'          	=> safe_post('sscrj_lengkap') == '' ? null : safe_post('sscrj_lengkap'),
				'sscrj_nama_tindakan'       => safe_post('sscrj_nama_tindakan') == '' ? null : safe_post('sscrj_nama_tindakan'),
				'sscrj_informed_concent'    => safe_post('sscrj_informed_concent') == '' ? null : safe_post('sscrj_informed_concent'),
				'sscrj_tidak_lengkap'       => safe_post('sscrj_tidak_lengkap') == '' ? null : safe_post('sscrj_tidak_lengkap'),
				'sscrj_alasan_2'          	=> safe_post('sscrj_alasan_2') == '' ? null : safe_post('sscrj_alasan_2'),
				'sscrj_dokter_bedah'        => safe_post('sscrj_dokter_bedah') == '' ? null : safe_post('sscrj_dokter_bedah'),
				'sscrj_instrument'          => safe_post('sscrj_instrument') == '' ? null : safe_post('sscrj_instrument'),
				'sscrj_nama_operator'       => safe_post('sscrj_nama_operator') == '' ? null : safe_post('sscrj_nama_operator'),
				'sscrj_instrumentt'         => safe_post('sscrj_instrumentt') == '' ? null : safe_post('sscrj_instrumentt'),
				'sscrj_kassa'          		=> safe_post('sscrj_kassa') == '' ? null : safe_post('sscrj_kassa'),
				'sscrj_nama_anastesi'       => safe_post('sscrj_nama_anastesi') == '' ? null : safe_post('sscrj_nama_anastesi'),
				'sscrj_kassaa'          	=> safe_post('sscrj_kassaa') == '' ? null : safe_post('sscrj_kassaa'),
				'sscrj_jarum'          		=> safe_post('sscrj_jarum') == '' ? null : safe_post('sscrj_jarum'),
				'sscrj_nama_tindakann'      => safe_post('sscrj_nama_tindakann') == '' ? null : safe_post('sscrj_nama_tindakann'),
				'sscrj_jarumm'          	=> safe_post('sscrj_jarumm') == '' ? null : safe_post('sscrj_jarumm'),
				'sscrj_lokasi'          	=> safe_post('sscrj_lokasi') == '' ? null : safe_post('sscrj_lokasi'),
				'sscrj_tanggal_tindakan'    => safe_post('sscrj_tanggal_tindakan') == '' ? null : safe_post('sscrj_tanggal_tindakan'),
				'sscrj_preparat'          	=> safe_post('sscrj_preparat') == '' ? null : safe_post('sscrj_preparat'),
				'sscrj_tekanan_darah'       => safe_post('sscrj_tekanan_darah') == '' ? null : safe_post('sscrj_tekanan_darah'),
				'sscrj_identitas_pasien'    => safe_post('sscrj_identitas_pasien') == '' ? null : safe_post('sscrj_identitas_pasien'),
				'sscrj_preparat_pa'         => safe_post('sscrj_preparat_pa') == '' ? null : safe_post('sscrj_preparat_pa'),
				'sscrj_naddi'          		=> safe_post('sscrj_naddi') == '' ? null : safe_post('sscrj_naddi'),
				'sscrj_nama_tindakkan'      => safe_post('sscrj_nama_tindakkan') == '' ? null : safe_post('sscrj_nama_tindakkan'),
				'sscrj_preparat_kultur'     => safe_post('sscrj_preparat_kultur') == '' ? null : safe_post('sscrj_preparat_kultur'),
				'sscrj_perrnafasan'         => safe_post('sscrj_perrnafasan') == '' ? null : safe_post('sscrj_perrnafasan'),
				'sscrj_prosedur_tindakan'   => safe_post('sscrj_prosedur_tindakan') == '' ? null : safe_post('sscrj_prosedur_tindakan'),
				'sscrj_preparat_sitologi'   => safe_post('sscrj_preparat_sitologi') == '' ? null : safe_post('sscrj_preparat_sitologi'),
				'sscrj_saturasi_o2'         => safe_post('sscrj_saturasi_o2') == '' ? null : safe_post('sscrj_saturasi_o2'),
				'sscrj_lokasi_tindakan'     => safe_post('sscrj_lokasi_tindakan') == '' ? null : safe_post('sscrj_lokasi_tindakan'),
				'sscrj_suhu'          		=> safe_post('sscrj_suhu') == '' ? null : safe_post('sscrj_suhu'),
				'sscrj_informed_consent'    => safe_post('sscrj_informed_consent') == '' ? null : safe_post('sscrj_informed_consent'),
				'sscrj_formulir_permintaan' => safe_post('sscrj_formulir_permintaan') == '' ? null : safe_post('sscrj_formulir_permintaan'),
				'sscrj_telah_dilengkapi'    => safe_post('sscrj_telah_dilengkapi') == '' ? null : safe_post('sscrj_telah_dilengkapi'),
				'sscrj_keterangan'          => safe_post('sscrj_keterangan') == '' ? null : safe_post('sscrj_keterangan'),
				'sscrj_penjelasan'          => safe_post('sscrj_penjelasan') == '' ? null : safe_post('sscrj_penjelasan'),
				'sscrj_alasan'          	=> safe_post('sscrj_alasan') == '' ? null : safe_post('sscrj_alasan'),
				'sscrj_ya'          		=> safe_post('sscrj_ya') == '' ? null : safe_post('sscrj_ya'),
				'sscrj_local'          		=> safe_post('sscrj_local') == '' ? null : safe_post('sscrj_local'),
				'sscrj_nama_obat'          	=> safe_post('sscrj_nama_obat') == '' ? null : safe_post('sscrj_nama_obat'),
				'sscrj_diberikan'          	=> safe_post('sscrj_diberikan') == '' ? null : safe_post('sscrj_diberikan'),
				'sscrj_aalasan'          	=> safe_post('sscrj_aalasan') == '' ? null : safe_post('sscrj_aalasan'),
				'sscrj_dosis_obat'          => safe_post('sscrj_dosis_obat') == '' ? null : safe_post('sscrj_dosis_obat'),
				'sscrj_tidak_diberikan'     => safe_post('sscrj_tidak_diberikan') == '' ? null : safe_post('sscrj_tidak_diberikan'),
				'sscrj_allasan'          	=> safe_post('sscrj_allasan') == '' ? null : safe_post('sscrj_allasan'),
				'sscrj_jam_di_berikan_obat' => safe_post('sscrj_jam_di_berikan_obat') == '' ? null : safe_post('sscrj_jam_di_berikan_obat'),
				// 'sscrj_tidak'          		=> safe_post('sscrj_tidak') == '' ? null : safe_post('sscrj_tidak'),
				'sscrj_kesaddaran'          => safe_post('sscrj_kesaddaran') == '' ? null : safe_post('sscrj_kesaddaran'),
				'sscrj_tekanann_darah'      => safe_post('sscrj_tekanann_darah') == '' ? null : safe_post('sscrj_tekanann_darah'),
				'sscrj_dipasang'          	=> safe_post('sscrj_dipasang') == '' ? null : safe_post('sscrj_dipasang'),
				'sscrj_tidak_dipasang'      => safe_post('sscrj_tidak_dipasang') == '' ? null : safe_post('sscrj_tidak_dipasang'),
				'sscrj_nadii'          		=> safe_post('sscrj_nadii') == '' ? null : safe_post('sscrj_nadii'),
				'sscrj_pernaffasan'         => safe_post('sscrj_pernaffasan') == '' ? null : safe_post('sscrj_pernaffasan'),
				'sscrj_saturasi'          	=> safe_post('sscrj_saturasi') == '' ? null : safe_post('sscrj_saturasi'),
				'sscrj_ssuhu'          		=> safe_post('sscrj_ssuhu') == '' ? null : safe_post('sscrj_ssuhu'),
				'sscrj_skala_nyeri'         => safe_post('sscrj_skala_nyeri') == '' ? null : safe_post('sscrj_skala_nyeri'),
				'sscrj_ada_rembesan'        => safe_post('sscrj_ada_rembesan') == '' ? null : safe_post('sscrj_ada_rembesan'),
				'sscrj_tidak_ada_rembesan'  => safe_post('sscrj_tidak_ada_rembesan') == '' ? null : safe_post('sscrj_tidak_ada_rembesan'),
				'created_date'              => $this->datetime,
				'sscrj_tanggal_sign_in'		=> (safe_post('sscrj_tanggal_sign_in') !== '' ? datetime2mysql(safe_post('sscrj_tanggal_sign_in')) : NULL),
				'sscrj_paraf_perawat_sign_in'        => safe_post('sscrj_paraf_perawat_sign_in', true) !== 'on' ? 0 : 1,
				'sscrj_paraf_perawat_time_out'       => safe_post('sscrj_paraf_perawat_time_out', true) !== 'on' ? 0 : 1,
				'sscrj_paraf_perawat_sign_out'       => safe_post('sscrj_paraf_perawat_sign_out', true) !== 'on' ? 0 : 1,
				'sscrj_perawat_sign_in'      => safe_post('sscrj_perawat_sign_in') == '' ? null : safe_post('sscrj_perawat_sign_in'),
				'sscrj_perawat_time_out'     => safe_post('sscrj_perawat_time_out') == '' ? null : safe_post('sscrj_perawat_time_out'),
				'sscrj_perawat_sign_out'     => safe_post('sscrj_perawat_sign_out') == '' ? null : safe_post('sscrj_perawat_sign_out'),
				'sscrj_paraf_dokter_operator_sign_in'      => safe_post('sscrj_paraf_dokter_operator_sign_in', true) !== 'on' ? 0 : 1,
				'sscrj_paraf_dokter_operator_time_out'     => safe_post('sscrj_paraf_dokter_operator_time_out', true) !== 'on' ? 0 : 1,
				'sscrj_paraf_dokter_operator_sign_out'     => safe_post('sscrj_paraf_dokter_operator_sign_out', true) !== 'on' ? 0 : 1,
				'sscrj_dokter_operator_sign_in'        => safe_post('sscrj_dokter_operator_sign_in') == '' ? null : safe_post('sscrj_dokter_operator_sign_in'),
				'sscrj_dokter_operator_time_out'       => safe_post('sscrj_dokter_operator_time_out') == '' ? null : safe_post('sscrj_dokter_operator_time_out'),
				'sscrj_dokter_operator_sign_out'       => safe_post('sscrj_dokter_operator_sign_out') == '' ? null : safe_post('sscrj_dokter_operator_sign_out'),
			);

			$this->db->insert('sm_surgical_safety_ceklist_rawat_jalan', $data);
		} else {
			$data = array(
				'id_users'       	 	 	=> $this->session->userdata('id_translucent'),
				'sscrj_gelang'          	=> safe_post('sscrj_gelang') == '' ? null : safe_post('sscrj_gelang'),
				'sscrj_lengkap'          	=> safe_post('sscrj_lengkap') == '' ? null : safe_post('sscrj_lengkap'),
				'sscrj_nama_tindakan'       => safe_post('sscrj_nama_tindakan') == '' ? null : safe_post('sscrj_nama_tindakan'),
				'sscrj_informed_concent'    => safe_post('sscrj_informed_concent') == '' ? null : safe_post('sscrj_informed_concent'),
				'sscrj_tidak_lengkap'       => safe_post('sscrj_tidak_lengkap') == '' ? null : safe_post('sscrj_tidak_lengkap'),
				'sscrj_alasan_2'          	=> safe_post('sscrj_alasan_2') == '' ? null : safe_post('sscrj_alasan_2'),
				'sscrj_dokter_bedah'        => safe_post('sscrj_dokter_bedah') == '' ? null : safe_post('sscrj_dokter_bedah'),
				'sscrj_instrument'          => safe_post('sscrj_instrument') == '' ? null : safe_post('sscrj_instrument'),
				'sscrj_nama_operator'       => safe_post('sscrj_nama_operator') == '' ? null : safe_post('sscrj_nama_operator'),
				'sscrj_instrumentt'         => safe_post('sscrj_instrumentt') == '' ? null : safe_post('sscrj_instrumentt'),
				'sscrj_kassa'          		=> safe_post('sscrj_kassa') == '' ? null : safe_post('sscrj_kassa'),
				'sscrj_nama_anastesi'       => safe_post('sscrj_nama_anastesi') == '' ? null : safe_post('sscrj_nama_anastesi'),
				'sscrj_kassaa'          	=> safe_post('sscrj_kassaa') == '' ? null : safe_post('sscrj_kassaa'),
				'sscrj_jarum'          		=> safe_post('sscrj_jarum') == '' ? null : safe_post('sscrj_jarum'),
				'sscrj_nama_tindakann'      => safe_post('sscrj_nama_tindakann') == '' ? null : safe_post('sscrj_nama_tindakann'),
				'sscrj_jarumm'          	=> safe_post('sscrj_jarumm') == '' ? null : safe_post('sscrj_jarumm'),
				'sscrj_lokasi'          	=> safe_post('sscrj_lokasi') == '' ? null : safe_post('sscrj_lokasi'),
				'sscrj_tanggal_tindakan'    => safe_post('sscrj_tanggal_tindakan') == '' ? null : safe_post('sscrj_tanggal_tindakan'),
				'sscrj_preparat'          	=> safe_post('sscrj_preparat') == '' ? null : safe_post('sscrj_preparat'),
				'sscrj_tekanan_darah'       => safe_post('sscrj_tekanan_darah') == '' ? null : safe_post('sscrj_tekanan_darah'),
				'sscrj_identitas_pasien'    => safe_post('sscrj_identitas_pasien') == '' ? null : safe_post('sscrj_identitas_pasien'),
				'sscrj_preparat_pa'         => safe_post('sscrj_preparat_pa') == '' ? null : safe_post('sscrj_preparat_pa'),
				'sscrj_naddi'          		=> safe_post('sscrj_naddi') == '' ? null : safe_post('sscrj_naddi'),
				'sscrj_nama_tindakkan'      => safe_post('sscrj_nama_tindakkan') == '' ? null : safe_post('sscrj_nama_tindakkan'),
				'sscrj_preparat_kultur'     => safe_post('sscrj_preparat_kultur') == '' ? null : safe_post('sscrj_preparat_kultur'),
				'sscrj_perrnafasan'         => safe_post('sscrj_perrnafasan') == '' ? null : safe_post('sscrj_perrnafasan'),
				'sscrj_prosedur_tindakan'   => safe_post('sscrj_prosedur_tindakan') == '' ? null : safe_post('sscrj_prosedur_tindakan'),
				'sscrj_preparat_sitologi'   => safe_post('sscrj_preparat_sitologi') == '' ? null : safe_post('sscrj_preparat_sitologi'),
				'sscrj_saturasi_o2'         => safe_post('sscrj_saturasi_o2') == '' ? null : safe_post('sscrj_saturasi_o2'),
				'sscrj_lokasi_tindakan'     => safe_post('sscrj_lokasi_tindakan') == '' ? null : safe_post('sscrj_lokasi_tindakan'),
				'sscrj_suhu'          		=> safe_post('sscrj_suhu') == '' ? null : safe_post('sscrj_suhu'),
				'sscrj_informed_consent'    => safe_post('sscrj_informed_consent') == '' ? null : safe_post('sscrj_informed_consent'),
				'sscrj_formulir_permintaan' => safe_post('sscrj_formulir_permintaan') == '' ? null : safe_post('sscrj_formulir_permintaan'),
				'sscrj_telah_dilengkapi'    => safe_post('sscrj_telah_dilengkapi') == '' ? null : safe_post('sscrj_telah_dilengkapi'),
				'sscrj_keterangan'          => safe_post('sscrj_keterangan') == '' ? null : safe_post('sscrj_keterangan'),
				'sscrj_penjelasan'          => safe_post('sscrj_penjelasan') == '' ? null : safe_post('sscrj_penjelasan'),
				'sscrj_alasan'          	=> safe_post('sscrj_alasan') == '' ? null : safe_post('sscrj_alasan'),
				'sscrj_ya'          		=> safe_post('sscrj_ya') == '' ? null : safe_post('sscrj_ya'),
				'sscrj_local'          		=> safe_post('sscrj_local') == '' ? null : safe_post('sscrj_local'),
				'sscrj_nama_obat'          	=> safe_post('sscrj_nama_obat') == '' ? null : safe_post('sscrj_nama_obat'),
				'sscrj_diberikan'          	=> safe_post('sscrj_diberikan') == '' ? null : safe_post('sscrj_diberikan'),
				'sscrj_aalasan'          	=> safe_post('sscrj_aalasan') == '' ? null : safe_post('sscrj_aalasan'),
				'sscrj_dosis_obat'          => safe_post('sscrj_dosis_obat') == '' ? null : safe_post('sscrj_dosis_obat'),
				'sscrj_tidak_diberikan'     => safe_post('sscrj_tidak_diberikan') == '' ? null : safe_post('sscrj_tidak_diberikan'),
				'sscrj_allasan'          	=> safe_post('sscrj_allasan') == '' ? null : safe_post('sscrj_allasan'),
				'sscrj_jam_di_berikan_obat' => safe_post('sscrj_jam_di_berikan_obat') == '' ? null : safe_post('sscrj_jam_di_berikan_obat'),
				// 'sscrj_tidak'          		=> safe_post('sscrj_tidak') == '' ? null : safe_post('sscrj_tidak'),
				'sscrj_kesaddaran'          => safe_post('sscrj_kesaddaran') == '' ? null : safe_post('sscrj_kesaddaran'),
				'sscrj_tekanann_darah'      => safe_post('sscrj_tekanann_darah') == '' ? null : safe_post('sscrj_tekanann_darah'),
				'sscrj_dipasang'          	=> safe_post('sscrj_dipasang') == '' ? null : safe_post('sscrj_dipasang'),
				'sscrj_tidak_dipasang'      => safe_post('sscrj_tidak_dipasang') == '' ? null : safe_post('sscrj_tidak_dipasang'),
				'sscrj_nadii'          		=> safe_post('sscrj_nadii') == '' ? null : safe_post('sscrj_nadii'),
				'sscrj_pernaffasan'         => safe_post('sscrj_pernaffasan') == '' ? null : safe_post('sscrj_pernaffasan'),
				'sscrj_saturasi'          	=> safe_post('sscrj_saturasi') == '' ? null : safe_post('sscrj_saturasi'),
				'sscrj_ssuhu'          		=> safe_post('sscrj_ssuhu') == '' ? null : safe_post('sscrj_ssuhu'),
				'sscrj_skala_nyeri'         => safe_post('sscrj_skala_nyeri') == '' ? null : safe_post('sscrj_skala_nyeri'),
				'sscrj_ada_rembesan'        => safe_post('sscrj_ada_rembesan') == '' ? null : safe_post('sscrj_ada_rembesan'),
				'sscrj_tidak_ada_rembesan'  => safe_post('sscrj_tidak_ada_rembesan') == '' ? null : safe_post('sscrj_tidak_ada_rembesan'),
				'updated_on'                => $this->datetime,
				'sscrj_tanggal_sign_in'		=> (safe_post('sscrj_tanggal_sign_in') !== '' ? datetime2mysql(safe_post('sscrj_tanggal_sign_in')) : NULL),
				'sscrj_paraf_perawat_sign_in'           => safe_post('sscrj_paraf_perawat_sign_in', true) !== 'on' ? 0 : 1,
				'sscrj_paraf_perawat_time_out'          => safe_post('sscrj_paraf_perawat_time_out', true) !== 'on' ? 0 : 1,
				'sscrj_paraf_perawat_sign_out'          => safe_post('sscrj_paraf_perawat_sign_out', true) !== 'on' ? 0 : 1,
				'sscrj_perawat_sign_in'       => safe_post('sscrj_perawat_sign_in') == '' ? null : safe_post('sscrj_perawat_sign_in'),
				'sscrj_perawat_time_out'      => safe_post('sscrj_perawat_time_out') == '' ? null : safe_post('sscrj_perawat_time_out'),
				'sscrj_perawat_sign_out'      => safe_post('sscrj_perawat_sign_out') == '' ? null : safe_post('sscrj_perawat_sign_out'),
				'sscrj_paraf_dokter_operator_sign_in'       => safe_post('sscrj_paraf_dokter_operator_sign_in', true) !== 'on' ? 0 : 1,
				'sscrj_paraf_dokter_operator_time_out'      => safe_post('sscrj_paraf_dokter_operator_time_out', true) !== 'on' ? 0 : 1,
				'sscrj_paraf_dokter_operator_sign_out'      => safe_post('sscrj_paraf_dokter_operator_sign_out', true) !== 'on' ? 0 : 1,
				'sscrj_dokter_operator_sign_in'       => safe_post('sscrj_dokter_operator_sign_in') == '' ? null : safe_post('sscrj_dokter_operator_sign_in'),
				'sscrj_dokter_operator_time_out'      => safe_post('sscrj_dokter_operator_time_out') == '' ? null : safe_post('sscrj_dokter_operator_time_out'),
				'sscrj_dokter_operator_sign_out'      => safe_post('sscrj_dokter_operator_sign_out') == '' ? null : safe_post('sscrj_dokter_operator_sign_out'),
			);

			$this->db->where('id_layanan_pendaftaran', safe_post('id_layanan_pendaftaran'));
			$this->db->update('sm_surgical_safety_ceklist_rawat_jalan', $data);
		}

		if ($this->db->trans_status() === false) :
			$this->db->trans_rollback();
			$status  = false;
			$message = 'Gagal simpan form surgical safety ceklist rawat jalan';
		else :
			$this->db->trans_commit();
			$status  = true;
			$message = 'Berhasil simpan form surgical safety ceklist rawat jalan';
		endif;

		$this->response(array('status' => $status, 'message' => $message), REST_Controller::HTTP_OK);
	}


	// SPR +++
	function surat_pengantar_rawat_get()
	{
		$data = [];
		$data = $this->rekam_medis->getSuratPengantarRawatById($this->get('id'));
		if ($data != null) {
			$this->response($data[0], REST_Controller::HTTP_OK);
		} else {
			$this->response($data, REST_Controller::HTTP_OK);
		}
	}

	// SPR +++
	// function simpan_surat_pengantar_rawat_post($id_pendaftaran, $id_layanan_pendaftaran)
	// {
	// 	$checkDataSuratPengantarRawat = '';
	// 	$checkDataSuratPengantarRawat = $this->rekam_medis->getSuratPengantarRawatById($id_pendaftaran);
	// 	$id_layanan_db = $checkDataSuratPengantarRawat[0]->id_layanan_pendaftaran;

	// 	$this->db->trans_begin();
	// 	if ($id_layanan_db !== null && $id_layanan_db == $id_layanan_pendaftaran) {
	// 		$data = array(
	// 			'id_users'       	 	 	=> $this->session->userdata('id_translucent'),
	// 			'operasi_spr'          		=> safe_post('operasi_spr') == '' ? null : safe_post('operasi_spr'),
	// 			'odc_spr'          			=> safe_post('odc_spr') == '' ? null : safe_post('odc_spr'),
	// 			'rawat_inap_spr'          	=> safe_post('rawat_inap_spr') == '' ? null : safe_post('rawat_inap_spr'),
	// 			'is_pasien_spr'          	=> safe_post('is_pasien_spr') == '' ? null : safe_post('is_pasien_spr'),
	// 			'nama_pasien_spr'          	=> safe_post('nama_pasien_spr') == '' ? null : safe_post('nama_pasien_spr'),
	// 			'j_spr'          			=> safe_post('j_spr') == '' ? null : safe_post('j_spr'),
	// 			'no_rm_spr'          		=> safe_post('no_rm_spr') == '' ? null : safe_post('no_rm_spr'),
	// 			'umur_spr'          		=> safe_post('umur_spr') == '' ? null : safe_post('umur_spr'),
	// 			'diagnosis_spr'          	=> safe_post('diagnosis_spr') == '' ? null : safe_post('diagnosis_spr'),
	// 			'infeksi_spr'   			=> safe_post('infeksi_spr') == '' ? null : safe_post('infeksi_spr'),
	// 			'non_infeksi_spr'   		=> safe_post('non_infeksi_spr') == '' ? null : safe_post('non_infeksi_spr'),
	// 			'dokter_spr'          		=> safe_post('dokter_spr') == '' ? null : safe_post('dokter_spr'),
	// 			'jto_spr'          			=> safe_post('jto_spr') == '' ? null : safe_post('jto_spr'),
	// 			'gto_spr'       			=> safe_post('gto_spr') == '' ? null : safe_post('gto_spr'),
	// 			'cito_spr'        			=> safe_post('cito_spr') == '' ? null : safe_post('cito_spr'),
	// 			'tidak_cito_spr'        	=> safe_post('tidak_cito_spr') == '' ? null : safe_post('tidak_cito_spr'),
	// 			'icu_spr'      				=> safe_post('icu_spr') == '' ? null : safe_post('icu_spr'),
	// 			'hcu_spr'       			=> safe_post('hcu_spr') == '' ? null : safe_post('hcu_spr'),
	// 			'pcu_spr'          			=> safe_post('pcu_spr') == '' ? null : safe_post('pcu_spr'),
	// 			'nicu_spr'          		=> safe_post('nicu_spr') == '' ? null : safe_post('nicu_spr'),
	// 			'vk_spr'   					=> safe_post('vk_spr') == '' ? null : safe_post('vk_spr'),
	// 			'perinatologi_spr'    		=> safe_post('perinatologi_spr') == '' ? null : safe_post('perinatologi_spr'),
	// 			'ruang_perawatan_spr'    	=> safe_post('ruang_perawatan_spr') == '' ? null : safe_post('ruang_perawatan_spr'),
	// 			'rp_spr'     				=> safe_post('rp_spr') == '' ? null : safe_post('rp_spr'),
	// 			'isolasi_spr'   			=> safe_post('isolasi_spr') == '' ? null : safe_post('isolasi_spr'),
	// 			'lain_lain_spr'    			=> safe_post('lain_lain_spr') == '' ? null : safe_post('lain_lain_spr'),
	// 			'll_spr'    				=> safe_post('ll_spr') == '' ? null : safe_post('ll_spr'),
	// 			'tanggal_dokter_spr'        => safe_post('tanggal_dokter_spr') !== '' ? date('Y-m-d', strtotime(str_replace('/', '-', safe_post('tanggal_dokter_spr')))) : NULL,
	// 			'ttd_dokter_spr'          	=> safe_post('ttd_dokter_spr') == '' ? null : safe_post('ttd_dokter_spr'),
	// 			'ceklis_dokter_spr'        	=> safe_post('ceklis_dokter_spr') == '' ? null : safe_post('ceklis_dokter_spr'),
	// 			'catatan_pendaftaran_spr'   => safe_post('catatan_pendaftaran_spr') == '' ? null : safe_post('catatan_pendaftaran_spr'),
	// 			'tanggal_petugas_spr'       => safe_post('tanggal_petugas_spr') !== '' ? date('Y-m-d', strtotime(str_replace('/', '-', safe_post('tanggal_petugas_spr')))) : NULL,
	// 			'ceklis_petugas_spr'        => safe_post('ceklis_petugas_spr') == '' ? null : safe_post('ceklis_petugas_spr'),
	// 			// 'id_petugas_pendaftaran_spr'        => safe_post('id_petugas_pendaftaran_spr') == '' ? null : safe_post('id_petugas_pendaftaran_spr'),
	// 			'updated_on'                => $this->datetime,
	// 		);
	// 		// var_dump('update');
	// 		// var_dump($data);die;
			
	// 		$this->db->where('id_layanan_pendaftaran', $id_layanan_pendaftaran);
	// 		$this->db->update('sm_form_surat_pengantar_rawat', $data);
	// 	} else {
	// 		$data = array(
	// 			'id_pendaftaran'  			=> $id_pendaftaran,
	// 			'id_layanan_pendaftaran'  	=> $id_layanan_pendaftaran,
	// 			'id_users'       	 	 	=> $this->session->userdata('id_translucent'),
	// 			'operasi_spr'          		=> safe_post('operasi_spr') == '' ? null : safe_post('operasi_spr'),
	// 			'odc_spr'          			=> safe_post('odc_spr') == '' ? null : safe_post('odc_spr'),
	// 			'rawat_inap_spr'          	=> safe_post('rawat_inap_spr') == '' ? null : safe_post('rawat_inap_spr'),
	// 			'is_pasien_spr'          	=> safe_post('is_pasien_spr') == '' ? null : safe_post('is_pasien_spr'),
	// 			'nama_pasien_spr'          	=> safe_post('nama_pasien_spr') == '' ? null : safe_post('nama_pasien_spr'),
	// 			'j_spr'          			=> safe_post('j_spr') == '' ? null : safe_post('j_spr'),
	// 			'no_rm_spr'          		=> safe_post('no_rm_spr') == '' ? null : safe_post('no_rm_spr'),
	// 			'umur_spr'          		=> safe_post('umur_spr') == '' ? null : safe_post('umur_spr'),
	// 			'diagnosis_spr'          	=> safe_post('diagnosis_spr') == '' ? null : safe_post('diagnosis_spr'),
	// 			'infeksi_spr'   			=> safe_post('infeksi_spr') == '' ? null : safe_post('infeksi_spr'),
	// 			'non_infeksi_spr'   		=> safe_post('non_infeksi_spr') == '' ? null : safe_post('non_infeksi_spr'),
	// 			'dokter_spr'          		=> safe_post('dokter_spr') == '' ? null : safe_post('dokter_spr'),
	// 			'jto_spr'          			=> safe_post('jto_spr') == '' ? null : safe_post('jto_spr'),
	// 			'gto_spr'       			=> safe_post('gto_spr') == '' ? null : safe_post('gto_spr'),
	// 			'cito_spr'        			=> safe_post('cito_spr') == '' ? null : safe_post('cito_spr'),
	// 			'tidak_cito_spr'        	=> safe_post('tidak_cito_spr') == '' ? null : safe_post('tidak_cito_spr'),
	// 			'icu_spr'      				=> safe_post('icu_spr') == '' ? null : safe_post('icu_spr'),
	// 			'hcu_spr'       			=> safe_post('hcu_spr') == '' ? null : safe_post('hcu_spr'),
	// 			'pcu_spr'          			=> safe_post('pcu_spr') == '' ? null : safe_post('pcu_spr'),
	// 			'nicu_spr'          		=> safe_post('nicu_spr') == '' ? null : safe_post('nicu_spr'),
	// 			'vk_spr'   					=> safe_post('vk_spr') == '' ? null : safe_post('vk_spr'),
	// 			'perinatologi_spr'    		=> safe_post('perinatologi_spr') == '' ? null : safe_post('perinatologi_spr'),
	// 			'ruang_perawatan_spr'    	=> safe_post('ruang_perawatan_spr') == '' ? null : safe_post('ruang_perawatan_spr'),
	// 			'rp_spr'     				=> safe_post('rp_spr') == '' ? null : safe_post('rp_spr'),
	// 			'isolasi_spr'   			=> safe_post('isolasi_spr') == '' ? null : safe_post('isolasi_spr'),
	// 			'lain_lain_spr'    			=> safe_post('lain_lain_spr') == '' ? null : safe_post('lain_lain_spr'),
	// 			'll_spr'    				=> safe_post('ll_spr') == '' ? null : safe_post('ll_spr'),
	// 			'tanggal_dokter_spr'        => safe_post('tanggal_dokter_spr') !== '' ? date('Y-m-d', strtotime(str_replace('/', '-', safe_post('tanggal_dokter_spr')))) : NULL,
	// 			'ttd_dokter_spr'          	=> safe_post('ttd_dokter_spr') == '' ? null : safe_post('ttd_dokter_spr'),
	// 			'ceklis_dokter_spr'        	=> safe_post('ceklis_dokter_spr') == '' ? null : safe_post('ceklis_dokter_spr'),
	// 			'catatan_pendaftaran_spr'   => safe_post('catatan_pendaftaran_spr') == '' ? null : safe_post('catatan_pendaftaran_spr'),
	// 			'tanggal_petugas_spr'       => safe_post('tanggal_petugas_spr') !== '' ? date('Y-m-d', strtotime(str_replace('/', '-', safe_post('tanggal_petugas_spr')))) : NULL,
	// 			'ceklis_petugas_spr'        => safe_post('ceklis_petugas_spr') == '' ? null : safe_post('ceklis_petugas_spr'),
	// 			// 'id_petugas_pendaftaran_spr'        => safe_post('id_petugas_pendaftaran_spr') == '' ? null : safe_post('id_petugas_pendaftaran_spr'),
	// 			'created_date'              => $this->datetime,
	// 		);
	// 		// var_dump('simpan');
	// 		// var_dump($data);die;

	// 		$this->db->insert('sm_form_surat_pengantar_rawat', $data);
	// 	}

	// 	if ($this->db->trans_status() === false) :
	// 		$this->db->trans_rollback();
	// 		$status  = false;
	// 		$message = 'Gagal simpan form surat pengantar rawat';
	// 	else :
	// 		$this->db->trans_commit();
	// 		$status  = true;
	// 		$message = 'Berhasil simpan form surat pengantar rawat';
	// 	endif;

	// 	$this->response(array('status' => $status, 'message' => $message), REST_Controller::HTTP_OK);
	// }

	function simpan_surat_pengantar_rawat_post($id_pendaftaran, $id_layanan_pendaftaran){
		$checkDataSuratPengantarRawat = $this->rekam_medis->getSuratPengantarRawatById($id_pendaftaran);
	
		// Tambahkan pengecekan apakah $checkDataSuratPengantarRawat tidak kosong
		$id_layanan_db = !empty($checkDataSuratPengantarRawat) ? $checkDataSuratPengantarRawat[0]->id_layanan_pendaftaran : null;
	
		$this->db->trans_begin();
	
		if ($id_layanan_db !== null && $id_layanan_db == $id_layanan_pendaftaran) {
			$data = array(
				'id_users'       	 	 	=> $this->session->userdata('id_translucent'),
				'operasi_spr'          		=> safe_post('operasi_spr') == '' ? null : safe_post('operasi_spr'),
				'odc_spr'          			=> safe_post('odc_spr') == '' ? null : safe_post('odc_spr'),
				'rawat_inap_spr'          	=> safe_post('rawat_inap_spr') == '' ? null : safe_post('rawat_inap_spr'),
				'is_pasien_spr'          	=> safe_post('is_pasien_spr') == '' ? null : safe_post('is_pasien_spr'),
				'nama_pasien_spr'          	=> safe_post('nama_pasien_spr') == '' ? null : safe_post('nama_pasien_spr'),
				'j_spr'          			=> safe_post('j_spr') == '' ? null : safe_post('j_spr'),
				'no_rm_spr'          		=> safe_post('no_rm_spr') == '' ? null : safe_post('no_rm_spr'),
				'umur_spr'          		=> safe_post('umur_spr') == '' ? null : safe_post('umur_spr'),
				'diagnosis_spr'          	=> safe_post('diagnosis_spr') == '' ? null : safe_post('diagnosis_spr'),
				'infeksi_spr'   			=> safe_post('infeksi_spr') == '' ? null : safe_post('infeksi_spr'),
				'non_infeksi_spr'   		=> safe_post('non_infeksi_spr') == '' ? null : safe_post('non_infeksi_spr'),
				'dokter_spr'          		=> safe_post('dokter_spr') == '' ? null : safe_post('dokter_spr'),
				'jto_spr'          			=> safe_post('jto_spr') == '' ? null : safe_post('jto_spr'),
				'gto_spr'       			=> safe_post('gto_spr') == '' ? null : safe_post('gto_spr'),
				'cito_spr'        			=> safe_post('cito_spr') == '' ? null : safe_post('cito_spr'),
				'tidak_cito_spr'        	=> safe_post('tidak_cito_spr') == '' ? null : safe_post('tidak_cito_spr'),
				'icu_spr'      				=> safe_post('icu_spr') == '' ? null : safe_post('icu_spr'),
				'hcu_spr'       			=> safe_post('hcu_spr') == '' ? null : safe_post('hcu_spr'),
				'pcu_spr'          			=> safe_post('pcu_spr') == '' ? null : safe_post('pcu_spr'),
				'nicu_spr'          		=> safe_post('nicu_spr') == '' ? null : safe_post('nicu_spr'),
				'vk_spr'   					=> safe_post('vk_spr') == '' ? null : safe_post('vk_spr'),
				'perinatologi_spr'    		=> safe_post('perinatologi_spr') == '' ? null : safe_post('perinatologi_spr'),
				'ruang_perawatan_spr'    	=> safe_post('ruang_perawatan_spr') == '' ? null : safe_post('ruang_perawatan_spr'),
				'rp_spr'     				=> safe_post('rp_spr') == '' ? null : safe_post('rp_spr'),
				'isolasi_spr'   			=> safe_post('isolasi_spr') == '' ? null : safe_post('isolasi_spr'),
				'lain_lain_spr'    			=> safe_post('lain_lain_spr') == '' ? null : safe_post('lain_lain_spr'),
				'll_spr'    				=> safe_post('ll_spr') == '' ? null : safe_post('ll_spr'),
				'tanggal_dokter_spr'        => safe_post('tanggal_dokter_spr') !== '' ? date('Y-m-d', strtotime(str_replace('/', '-', safe_post('tanggal_dokter_spr')))) : NULL,
				'ttd_dokter_spr'          	=> safe_post('ttd_dokter_spr') == '' ? null : safe_post('ttd_dokter_spr'),
				'ceklis_dokter_spr'        	=> safe_post('ceklis_dokter_spr') == '' ? null : safe_post('ceklis_dokter_spr'),
				'catatan_pendaftaran_spr'   => safe_post('catatan_pendaftaran_spr') == '' ? null : safe_post('catatan_pendaftaran_spr'),
				'tanggal_petugas_spr'       => safe_post('tanggal_petugas_spr') !== '' ? date('Y-m-d', strtotime(str_replace('/', '-', safe_post('tanggal_petugas_spr')))) : NULL,
				'ceklis_petugas_spr'        => safe_post('ceklis_petugas_spr') == '' ? null : safe_post('ceklis_petugas_spr'),
				'id_petugas_pendaftaran_spr'        => safe_post('id_petugas_pendaftaran_spr') == '' ? null : safe_post('id_petugas_pendaftaran_spr'),
				'updated_on'                => $this->datetime,
			);		
			$this->db->where('id_layanan_pendaftaran', $id_layanan_pendaftaran);
			$this->db->update('sm_form_surat_pengantar_rawat', $data);
		} else {
			$data = array(
				'id_pendaftaran'  			=> $id_pendaftaran,
				'id_layanan_pendaftaran'  	=> $id_layanan_pendaftaran,
				'id_users'       	 	 	=> $this->session->userdata('id_translucent'),
				'operasi_spr'          		=> safe_post('operasi_spr') == '' ? null : safe_post('operasi_spr'),
				'odc_spr'          			=> safe_post('odc_spr') == '' ? null : safe_post('odc_spr'),
				'rawat_inap_spr'          	=> safe_post('rawat_inap_spr') == '' ? null : safe_post('rawat_inap_spr'),
				'is_pasien_spr'          	=> safe_post('is_pasien_spr') == '' ? null : safe_post('is_pasien_spr'),
				'nama_pasien_spr'          	=> safe_post('nama_pasien_spr') == '' ? null : safe_post('nama_pasien_spr'),
				'j_spr'          			=> safe_post('j_spr') == '' ? null : safe_post('j_spr'),
				'no_rm_spr'          		=> safe_post('no_rm_spr') == '' ? null : safe_post('no_rm_spr'),
				'umur_spr'          		=> safe_post('umur_spr') == '' ? null : safe_post('umur_spr'),
				'diagnosis_spr'          	=> safe_post('diagnosis_spr') == '' ? null : safe_post('diagnosis_spr'),
				'infeksi_spr'   			=> safe_post('infeksi_spr') == '' ? null : safe_post('infeksi_spr'),
				'non_infeksi_spr'   		=> safe_post('non_infeksi_spr') == '' ? null : safe_post('non_infeksi_spr'),
				'dokter_spr'          		=> safe_post('dokter_spr') == '' ? null : safe_post('dokter_spr'),
				'jto_spr'          			=> safe_post('jto_spr') == '' ? null : safe_post('jto_spr'),
				'gto_spr'       			=> safe_post('gto_spr') == '' ? null : safe_post('gto_spr'),
				'cito_spr'        			=> safe_post('cito_spr') == '' ? null : safe_post('cito_spr'),
				'tidak_cito_spr'        	=> safe_post('tidak_cito_spr') == '' ? null : safe_post('tidak_cito_spr'),
				'icu_spr'      				=> safe_post('icu_spr') == '' ? null : safe_post('icu_spr'),
				'hcu_spr'       			=> safe_post('hcu_spr') == '' ? null : safe_post('hcu_spr'),
				'pcu_spr'          			=> safe_post('pcu_spr') == '' ? null : safe_post('pcu_spr'),
				'nicu_spr'          		=> safe_post('nicu_spr') == '' ? null : safe_post('nicu_spr'),
				'vk_spr'   					=> safe_post('vk_spr') == '' ? null : safe_post('vk_spr'),
				'perinatologi_spr'    		=> safe_post('perinatologi_spr') == '' ? null : safe_post('perinatologi_spr'),
				'ruang_perawatan_spr'    	=> safe_post('ruang_perawatan_spr') == '' ? null : safe_post('ruang_perawatan_spr'),
				'rp_spr'     				=> safe_post('rp_spr') == '' ? null : safe_post('rp_spr'),
				'isolasi_spr'   			=> safe_post('isolasi_spr') == '' ? null : safe_post('isolasi_spr'),
				'lain_lain_spr'    			=> safe_post('lain_lain_spr') == '' ? null : safe_post('lain_lain_spr'),
				'll_spr'    				=> safe_post('ll_spr') == '' ? null : safe_post('ll_spr'),
				'tanggal_dokter_spr'        => safe_post('tanggal_dokter_spr') !== '' ? date('Y-m-d', strtotime(str_replace('/', '-', safe_post('tanggal_dokter_spr')))) : NULL,
				'ttd_dokter_spr'          	=> safe_post('ttd_dokter_spr') == '' ? null : safe_post('ttd_dokter_spr'),
				'ceklis_dokter_spr'        	=> safe_post('ceklis_dokter_spr') == '' ? null : safe_post('ceklis_dokter_spr'),
				'catatan_pendaftaran_spr'   => safe_post('catatan_pendaftaran_spr') == '' ? null : safe_post('catatan_pendaftaran_spr'),
				'tanggal_petugas_spr'       => safe_post('tanggal_petugas_spr') !== '' ? date('Y-m-d', strtotime(str_replace('/', '-', safe_post('tanggal_petugas_spr')))) : NULL,
				'ceklis_petugas_spr'        => safe_post('ceklis_petugas_spr') == '' ? null : safe_post('ceklis_petugas_spr'),
				'id_petugas_pendaftaran_spr'        => safe_post('id_petugas_pendaftaran_spr') == '' ? null : safe_post('id_petugas_pendaftaran_spr'),
				'created_date'              => $this->datetime,
			);
			$this->db->insert('sm_form_surat_pengantar_rawat', $data);
		}
	
		if ($this->db->trans_status() === false) {
			$this->db->trans_rollback();
			$status  = false;
			$message = 'Gagal simpan form surat pengantar rawat';
		} else {
			$this->db->trans_commit();
			$status  = true;
			$message = 'Berhasil simpan form surat pengantar rawat';
		}
	
		$this->response(array('status' => $status, 'message' => $message), REST_Controller::HTTP_OK);
	}
	

	// SKPM
	function surat_keterangan_pemeriksaan_mata_get()
	{
		$data = [];
		$data = $this->rekam_medis->getSuratKeteranganPemeriksaanMataById($this->get('id'));
		if ($data != null) {
			$this->response($data[0], REST_Controller::HTTP_OK);
		} else {
			$this->response($data, REST_Controller::HTTP_OK);
		}
	}

	// SKPM
	function simpan_surat_keterangan_pemeriksaan_mata_post()
	{
		$checkDataSuratKeteranganPemeriksaanMata = '';
		$checkDataSuratKeteranganPemeriksaanMata = $this->rekam_medis->getSuratKeteranganPemeriksaanMataById(safe_post('id_layanan_pendaftaran'));
		$this->db->trans_begin();
		if ($checkDataSuratKeteranganPemeriksaanMata == null) {
			$data = array(
				'id_layanan_pendaftaran'  	=> safe_post('id_layanan_pendaftaran'),
				'id_users'       	 	 	=> $this->session->userdata('id_translucent'),
				'ya_skpm'          			=> safe_post('ya_skpm') == '' ? null : safe_post('ya_skpm'),
				'nama_skpm'          		=> safe_post('nama_skpm') == '' ? null : safe_post('nama_skpm'),
				'skpm'          			=> safe_post('skpm') == '' ? null : safe_post('skpm'),
				'no_rm_skpm'          		=> safe_post('no_rm_skpm') == '' ? null : safe_post('no_rm_skpm'),
				'usia_skpm'          		=> safe_post('usia_skpm') == '' ? null : safe_post('usia_skpm'),
				'ktp_skpm'          		=> safe_post('ktp_skpm') == '' ? null : safe_post('ktp_skpm'),
				'alamat_skpm'          		=> safe_post('alamat_skpm') == '' ? null : safe_post('alamat_skpm'),
				'tlp_skpm'          		=> safe_post('tlp_skpm') == '' ? null : safe_post('tlp_skpm'),
				'tajam_pengelihatan_skpm'   => safe_post('tajam_pengelihatan_skpm') == '' ? null : safe_post('tajam_pengelihatan_skpm'),
				'mata_kanan_skpm'          	=> safe_post('mata_kanan_skpm') == '' ? null : safe_post('mata_kanan_skpm'),
				'mata_kiri_skpm'          	=> safe_post('mata_kiri_skpm') == '' ? null : safe_post('mata_kiri_skpm'),
				'anterior_kanan_skpm'       => safe_post('anterior_kanan_skpm') == '' ? null : safe_post('anterior_kanan_skpm'),
				'anterior_kiri_skpm'        => safe_post('anterior_kiri_skpm') == '' ? null : safe_post('anterior_kiri_skpm'),
				'posterior_kanan_skpm'      => safe_post('posterior_kanan_skpm') == '' ? null : safe_post('posterior_kanan_skpm'),
				'posterior_kiri_skpm'       => safe_post('posterior_kiri_skpm') == '' ? null : safe_post('posterior_kiri_skpm'),
				'p_warna_skpm'          	=> safe_post('p_warna_skpm') == '' ? null : safe_post('p_warna_skpm'),
				'catatan_skpm'          	=> safe_post('catatan_skpm') == '' ? null : safe_post('catatan_skpm'),
				'tanpa_kacamata_kanan_skpm'   => safe_post('tanpa_kacamata_kanan_skpm') == '' ? null : safe_post('tanpa_kacamata_kanan_skpm'),
				'tanpa_kacamata_kiri_skpm'    => safe_post('tanpa_kacamata_kiri_skpm') == '' ? null : safe_post('tanpa_kacamata_kiri_skpm'),
				'anterior_mata_kanan_skpm'    => safe_post('anterior_mata_kanan_skpm') == '' ? null : safe_post('anterior_mata_kanan_skpm'),
				'anterior_mata_kiri_skpm'     => safe_post('anterior_mata_kiri_skpm') == '' ? null : safe_post('anterior_mata_kiri_skpm'),
				'posterior_mata_kanan_skpm'   => safe_post('posterior_mata_kanan_skpm') == '' ? null : safe_post('posterior_mata_kanan_skpm'),
				'posterior_mata_kiri_skpm'    => safe_post('posterior_mata_kiri_skpm') == '' ? null : safe_post('posterior_mata_kiri_skpm'),
				'tanggal_skpm'              => safe_post('tanggal_skpm') !== '' ? date('Y-m-d', strtotime(str_replace('/', '-', safe_post('tanggal_skpm')))) : NULL,
				'ttd_dokter_skpm'          	=> safe_post('ttd_dokter_skpm') == '' ? null : safe_post('ttd_dokter_skpm'),
				'ceklis_dokter_skpm'        => safe_post('ceklis_dokter_skpm') == '' ? null : safe_post('ceklis_dokter_skpm'),
				'created_date'              => $this->datetime,
			);

			$this->db->insert('sm_surat_keterangan_pemeriksaan_mata', $data);
		} else {
			$data = array(
				'id_users'       	 	 	=> $this->session->userdata('id_translucent'),
				'ya_skpm'          			=> safe_post('ya_skpm') == '' ? null : safe_post('ya_skpm'),
				'nama_skpm'          		=> safe_post('nama_skpm') == '' ? null : safe_post('nama_skpm'),
				'skpm'          			=> safe_post('skpm') == '' ? null : safe_post('skpm'),
				'no_rm_skpm'          		=> safe_post('no_rm_skpm') == '' ? null : safe_post('no_rm_skpm'),
				'usia_skpm'          		=> safe_post('usia_skpm') == '' ? null : safe_post('usia_skpm'),
				'ktp_skpm'          		=> safe_post('ktp_skpm') == '' ? null : safe_post('ktp_skpm'),
				'alamat_skpm'          		=> safe_post('alamat_skpm') == '' ? null : safe_post('alamat_skpm'),
				'tlp_skpm'          		=> safe_post('tlp_skpm') == '' ? null : safe_post('tlp_skpm'),
				'tajam_pengelihatan_skpm'   => safe_post('tajam_pengelihatan_skpm') == '' ? null : safe_post('tajam_pengelihatan_skpm'),
				'mata_kanan_skpm'          	=> safe_post('mata_kanan_skpm') == '' ? null : safe_post('mata_kanan_skpm'),
				'mata_kiri_skpm'          	=> safe_post('mata_kiri_skpm') == '' ? null : safe_post('mata_kiri_skpm'),
				'anterior_kanan_skpm'       => safe_post('anterior_kanan_skpm') == '' ? null : safe_post('anterior_kanan_skpm'),
				'anterior_kiri_skpm'        => safe_post('anterior_kiri_skpm') == '' ? null : safe_post('anterior_kiri_skpm'),
				'posterior_kanan_skpm'      => safe_post('posterior_kanan_skpm') == '' ? null : safe_post('posterior_kanan_skpm'),
				'posterior_kiri_skpm'       => safe_post('posterior_kiri_skpm') == '' ? null : safe_post('posterior_kiri_skpm'),
				'p_warna_skpm'          	=> safe_post('p_warna_skpm') == '' ? null : safe_post('p_warna_skpm'),
				'catatan_skpm'          	=> safe_post('catatan_skpm') == '' ? null : safe_post('catatan_skpm'),
				'tanpa_kacamata_kanan_skpm'   => safe_post('tanpa_kacamata_kanan_skpm') == '' ? null : safe_post('tanpa_kacamata_kanan_skpm'),
				'tanpa_kacamata_kiri_skpm'    => safe_post('tanpa_kacamata_kiri_skpm') == '' ? null : safe_post('tanpa_kacamata_kiri_skpm'),
				'anterior_mata_kanan_skpm'    => safe_post('anterior_mata_kanan_skpm') == '' ? null : safe_post('anterior_mata_kanan_skpm'),
				'anterior_mata_kiri_skpm'     => safe_post('anterior_mata_kiri_skpm') == '' ? null : safe_post('anterior_mata_kiri_skpm'),
				'posterior_mata_kanan_skpm'   => safe_post('posterior_mata_kanan_skpm') == '' ? null : safe_post('posterior_mata_kanan_skpm'),
				'posterior_mata_kiri_skpm'    => safe_post('posterior_mata_kiri_skpm') == '' ? null : safe_post('posterior_mata_kiri_skpm'),
				'tanggal_skpm'              => safe_post('tanggal_skpm') !== '' ? date('Y-m-d', strtotime(str_replace('/', '-', safe_post('tanggal_skpm')))) : NULL,
				'ttd_dokter_skpm'          	=> safe_post('ttd_dokter_skpm') == '' ? null : safe_post('ttd_dokter_skpm'),
				'ceklis_dokter_skpm'        => safe_post('ceklis_dokter_skpm') == '' ? null : safe_post('ceklis_dokter_skpm'),
				'updated_on'                => $this->datetime,
			);

			$this->db->where('id_layanan_pendaftaran', safe_post('id_layanan_pendaftaran'));
			$this->db->update('sm_surat_keterangan_pemeriksaan_mata', $data);
		}

		if ($this->db->trans_status() === false) :
			$this->db->trans_rollback();
			$status  = false;
			$message = 'Gagal simpan form surat keterangan pemeriksaan mata';
		else :
			$this->db->trans_commit();
			$status  = true;
			$message = 'Berhasil simpan form surat keterangan pemeriksaan mata';
		endif;

		$this->response(array('status' => $status, 'message' => $message), REST_Controller::HTTP_OK);
	}
	
	function get_data_pasien_baru_get()
	{
		if (!$this->get('id', true)) :
			$this->response(null, REST_Controller::HTTP_BAD_REQUEST); // (400)
		endif;

		$limit			= 5;
		$start          = ((int) $this->get('page') - 1) * $limit;		
		$no_rm          = $this->get('id', true);
		$data['page']   = $this->get('page');
		$data['limit']  = $limit;
		$data['pasien'] = $this->rekam_medis_baru->getDataPasienById($no_rm);
		if($this->get('type') == 'lab'){
			$data['jumlah'] = $this->db->query($this->rekam_medis_baru->getListDataKunjunganLab($no_rm))->num_rows();
			$kunjungan      = $this->db->query($this->rekam_medis_baru->getListDataKunjunganLab($no_rm) ." LIMIT ".$limit." OFFSET ".$start)->result();
		} else {
			$data['jumlah'] = $this->db->query($this->rekam_medis_baru->getListDataKunjungan($no_rm))->num_rows();
			$kunjungan      = $this->db->query($this->rekam_medis_baru->getListDataKunjungan($no_rm) ." LIMIT ".$limit." OFFSET ".$start)->result();
		}

		foreach ($kunjungan as $row) :
			$row->layanan           = $this->rekam_medis_baru->getListLayanan($row->id);
		endforeach;

		$data['kunjungan'] = $kunjungan;

		if ($data) :
			$this->response($data, REST_Controller::HTTP_OK); // (200)
		endif;
	}
	
	function get_data_anamnesa_get()
	{
		if (!$this->get('id', true)) :
			$this->response(null, REST_Controller::HTTP_BAD_REQUEST); // (400)
		endif;	
		$id_layanan_pendaftran = $this->get('id', true);
		$data['data'] = $this->rekam_medis_baru->getAnamnesa($id_layanan_pendaftran);

		if ($data) :
			$this->response($data, REST_Controller::HTTP_OK); // (200)
		endif;
	}

	// SPPPMK LOGS PERBAIKAN
	function get_surat_pernyataan_persetujuan_pmk_get(){
		$data['pendaftaran_detail'] = "";
		$data['list_surat_pernyataan_persetujuan_penolakan_medis_khusus'] = [];
		$data = $this->rekam_medis->getPendaftaranDetailTindakan($this->get('id_pendaftaran', true), $this->get('id_layanan', true));
		$data['pendaftaran_detail'] = $this->rekam_medis->getPendaftaranDetailRekamMedis($this->get('id_layanan_pendaftaran'));
		$data['list_surat_pernyataan_persetujuan_penolakan_medis_khusus'] = $this->rekam_medis->getSuratPernyataanPersetujuanPenolakanMedisKhusus($this->get('id_pendaftaran'));	
		$data['list_surat_pernyataan_persetujuan_penolakan_medis_khusus_logs'] = $this->rekam_medis->getSuratPernyataanPersetujuanPenolakanMedisKhususLogs($this->get('id_pendaftaran'));	
		if ($data != null) {
			$this->response($data, REST_Controller::HTTP_OK);
		} else {
			$this->response($data, REST_Controller::HTTP_OK);
		}
	}

	// SPPPMK LOGS PERBAIKAN
	function simpan_surat_pernyataan_persetujuan_pmk_post(){
		$checkDataSpppmk = '';
		if (safe_post('id_spppmk') !== '') {
			$checkDataSpppmk = $this->rekam_medis->getSuratPernyataanPersetujuanPenolakanMedisKhususById(safe_post('id_spppmk'));
		}
		$this->db->trans_begin();
	
		if (empty($checkDataSpppmk)) {
			// INSERT DATA
			$data = array(
				'id_pendaftaran'			=> safe_post('id_pendaftaran'),
				'id_layanan_pendaftaran'    => safe_post('id_layanan_pendaftaran'),
				'is_pasien'                 => safe_post('is_pasien') == '' ? null : safe_post('is_pasien'),		
				'namaspppmk'                => safe_post('namaspppmk') == '' ? null : safe_post('namaspppmk'),
				'jkpenangungjawabspppmk'    => safe_post('jkpenangungjawabspppmk') == '' ? null : safe_post('jkpenangungjawabspppmk'),
				'umurttlspppmk' 	    	=> safe_post('umurttlspppmk') == '' ? null : date2mysql(safe_post('umurttlspppmk')),
				'nikspppmk'                 => safe_post('nikspppmk') == '' ? null : safe_post('nikspppmk'),
				'alamatspppmk'              => safe_post('alamatspppmk') == '' ? null : safe_post('alamatspppmk'),
				'notelponspppmk'            => safe_post('notelponspppmk') == '' ? null : safe_post('notelponspppmk'),
				'sayasendirispppmk' 		=> safe_post('sayasendirispppmk') == '' ? null : safe_post('sayasendirispppmk'),
				'sebagaiorangtuaspppmk' 	=> safe_post('sebagaiorangtuaspppmk') == '' ? null : safe_post('sebagaiorangtuaspppmk'),
				'keluargaspppmk' 			=> safe_post('keluargaspppmk') == '' ? null : safe_post('keluargaspppmk'),
				'walispppmk' 				=> safe_post('walispppmk') == '' ? null : safe_post('walispppmk'),
				'darispppmk' 				=> safe_post('darispppmk') == '' ? null : safe_post('darispppmk'),
				'setujuspppmk' 				=> safe_post('setujuspppmk') == '' ? null : safe_post('setujuspppmk'),
				'menolakspppmk' 			=> safe_post('menolakspppmk') == '' ? null : safe_post('menolakspppmk'),
				'pmitujuanspppmk' 			=> safe_post('pmitujuanspppmk') == '' ? null : safe_post('pmitujuanspppmk'),
				'dokterspppmk' 				=> safe_post('dokterspppmk') == '' ? null : safe_post('dokterspppmk'),
				'tanggalspppmk' 	    	=> safe_post('tanggalspppmk') == '' ? null : date2mysql(safe_post('tanggalspppmk')),
				'id_user'					=> $this->session->userdata('id_translucent'),
				'created_at'				=> $this->datetime,
				'updated_on'             	=> $this->datetime	
			);
			$this->db->insert('sm_surat_pernyataan_persetujuan_pmk', $data);
	
		} else {
			// UPDATE DATA
			$data = array(				
				'is_pasien'                 => safe_post('is_pasien') == '' ? null : safe_post('is_pasien'),
				'namaspppmk'                => safe_post('namaspppmk') == '' ? null : safe_post('namaspppmk'),
				'jkpenangungjawabspppmk'    => safe_post('jkpenangungjawabspppmk') == '' ? null : safe_post('jkpenangungjawabspppmk'),
				'umurttlspppmk' 	    	=> safe_post('umurttlspppmk') == '' ? null : date2mysql(safe_post('umurttlspppmk')),
				'nikspppmk'                 => safe_post('nikspppmk') == '' ? null : safe_post('nikspppmk'),
				'alamatspppmk'              => safe_post('alamatspppmk') == '' ? null : safe_post('alamatspppmk'),
				'notelponspppmk'            => safe_post('notelponspppmk') == '' ? null : safe_post('notelponspppmk'),
				'sayasendirispppmk' 		=> safe_post('sayasendirispppmk') == '' ? null : safe_post('sayasendirispppmk'),
				'sebagaiorangtuaspppmk' 	=> safe_post('sebagaiorangtuaspppmk') == '' ? null : safe_post('sebagaiorangtuaspppmk'),
				'keluargaspppmk' 			=> safe_post('keluargaspppmk') == '' ? null : safe_post('keluargaspppmk'),
				'walispppmk' 				=> safe_post('walispppmk') == '' ? null : safe_post('walispppmk'),
				'darispppmk' 				=> safe_post('darispppmk') == '' ? null : safe_post('darispppmk'),
				'setujuspppmk' 				=> safe_post('setujuspppmk') == '' ? null : safe_post('setujuspppmk'),
				'menolakspppmk' 			=> safe_post('menolakspppmk') == '' ? null : safe_post('menolakspppmk'),
				'pmitujuanspppmk' 			=> safe_post('pmitujuanspppmk') == '' ? null : safe_post('pmitujuanspppmk'),
				'dokterspppmk' 				=> safe_post('dokterspppmk') == '' ? null : safe_post('dokterspppmk'),
				'tanggalspppmk' 	    	=> safe_post('tanggalspppmk') == '' ? null : date2mysql(safe_post('tanggalspppmk')),
				'id_user'                 	=> $this->session->userdata('id_translucent'),
				'updated_on'                => $this->datetime
			);
	
			// HANYA SIMPAN FIELD VALID KE DALAM LOG
			$logData = array(
				'id_pendaftaran'		=> $checkDataSpppmk->id_pendaftaran,
				'id_layanan_pendaftaran'=> $checkDataSpppmk->id_layanan_pendaftaran,
				'is_pasien'            	=> $checkDataSpppmk->is_pasien,
				'namaspppmk'           	=> $checkDataSpppmk->namaspppmk,
				'jkpenangungjawabspppmk'=> $checkDataSpppmk->jkpenangungjawabspppmk,
				'umurttlspppmk'         => $checkDataSpppmk->umurttlspppmk,
				'nikspppmk'            	=> $checkDataSpppmk->nikspppmk,
				'alamatspppmk'          => $checkDataSpppmk->alamatspppmk,
				'notelponspppmk'        => $checkDataSpppmk->notelponspppmk,
				'sayasendirispppmk'     => $checkDataSpppmk->sayasendirispppmk,
				'sebagaiorangtuaspppmk' => $checkDataSpppmk->sebagaiorangtuaspppmk,
				'keluargaspppmk'    	=> $checkDataSpppmk->keluargaspppmk,
				'walispppmk'   			=> $checkDataSpppmk->walispppmk,
				'darispppmk'     		=> $checkDataSpppmk->darispppmk,
				'setujuspppmk'          => $checkDataSpppmk->setujuspppmk,
				'menolakspppmk'      	=> $checkDataSpppmk->menolakspppmk,
				'pmitujuanspppmk'     	=> $checkDataSpppmk->pmitujuanspppmk,
				'dokterspppmk'    		=> $checkDataSpppmk->dokterspppmk,
				'tanggalspppmk'      	=> $checkDataSpppmk->tanggalspppmk,
				'id_user'              	=> $checkDataSpppmk->id_user,
				'created_at'          	=> $checkDataSpppmk->created_at,
				'updated_on'          	=> $this->datetime,
				'log_action'            => 'update'
			);
			$this->db->insert('sm_surat_pernyataan_persetujuan_pmk_logs', $logData);
	
			$this->db->where('id', safe_post('id_spppmk'));
			$this->db->update('sm_surat_pernyataan_persetujuan_pmk', $data);
		}
	
		if ($this->db->trans_status() === false) {
			$this->db->trans_rollback();
			$status = false;
			$message = 'Gagal simpan Data';
		} else {
			$this->db->trans_commit();
			$status = true;
			$message = 'Berhasil simpan Data';
		}
	
		$this->response(array('status' => $status, 'message' => $message), REST_Controller::HTTP_OK);
	}

	// SPPPMK LOGS PERBAIKAN
	function hapus_surat_pernyataan_persetujuan_pmk_post(){
		if (!safe_post('id', true)) :
			$this->response(null, REST_Controller::HTTP_BAD_REQUEST);
		endif;
	
		// Ambil data sebelum dihapus
		$SpppmkHapus = $this->db->where('id', safe_post('id'))->get('sm_surat_pernyataan_persetujuan_pmk')->row();
	
		$this->db->trans_begin();
	
		if ($SpppmkHapus) {
			// Simpan ke log
			$logDataSpppmk = array(
				'id_pendaftaran'        => $SpppmkHapus->id_pendaftaran,
				'id_layanan_pendaftaran'=> $SpppmkHapus->id_layanan_pendaftaran,
				'is_pasien'            	=> $SpppmkHapus->is_pasien,
				'namaspppmk'           	=> $SpppmkHapus->namaspppmk,
				'jkpenangungjawabspppmk'=> $SpppmkHapus->jkpenangungjawabspppmk,
				'umurttlspppmk'         => $SpppmkHapus->umurttlspppmk,
				'nikspppmk'            	=> $SpppmkHapus->nikspppmk,
				'alamatspppmk'          => $SpppmkHapus->alamatspppmk,
				'notelponspppmk'        => $SpppmkHapus->notelponspppmk,
				'sayasendirispppmk'     => $SpppmkHapus->sayasendirispppmk,
				'sebagaiorangtuaspppmk' => $SpppmkHapus->sebagaiorangtuaspppmk,
				'keluargaspppmk'    	=> $SpppmkHapus->keluargaspppmk,
				'walispppmk'   			=> $SpppmkHapus->walispppmk,
				'darispppmk'     		=> $SpppmkHapus->darispppmk,
				'setujuspppmk'          => $SpppmkHapus->setujuspppmk,
				'menolakspppmk'      	=> $SpppmkHapus->menolakspppmk,
				'pmitujuanspppmk'     	=> $SpppmkHapus->pmitujuanspppmk,
				'dokterspppmk'    		=> $SpppmkHapus->dokterspppmk,
				'tanggalspppmk'      	=> $SpppmkHapus->tanggalspppmk,
				'id_user'              	=> $SpppmkHapus->id_user,
				'created_at'          	=> $SpppmkHapus->created_at,
				'updated_on'          	=> $this->datetime,
				'log_action'            => 'delete'
			);
			$this->db->insert('sm_surat_pernyataan_persetujuan_pmk_logs', $logDataSpppmk);
		}
	
		// Hapus data utama
		$this->db->where('id', safe_post('id'))->delete('sm_surat_pernyataan_persetujuan_pmk');
	
		if ($this->db->trans_status() === false) :
			$this->db->trans_rollback();
			$status = false;
			$message = 'Gagal Hapus Data';
		else :
			$this->db->trans_commit();
			$status = true;
			$message = 'Berhasil Hapus Data';
		endif;
	
		$this->response(array('status' => $status, 'message' => $message), REST_Controller::HTTP_OK);
	}
	
	// SPPPMK PERBAIKAN
	function get_edit_surat_pernyataan_persetujuan_pmk_get(){
		$data['pendaftaran_detail'] = "";
		$data['edit_surat_pernyataan_persetujuan_penolakan_medis_khusus'] = "";
		$data['pendaftaran_detail'] = $this->rekam_medis->getPendaftaranDetailRekamMedis($this->get('id_layanan_pendaftaran'));
		$data['edit_surat_pernyataan_persetujuan_penolakan_medis_khusus'] = $this->rekam_medis->getSuratPernyataanPersetujuanPenolakanMedisKhususById($this->get('id'));
		if ($data != null) {
			$this->response($data, REST_Controller::HTTP_OK);
		} else {
			$this->response($data, REST_Controller::HTTP_OK);
		}
	}

	// KPEGD LOGS PERBAIKAN
	function get_keterangan_pasien_emergency_get(){
		$data['pendaftaran_detail'] = "";
		$data['list_keterangan_pasien_emergency'] = [];
		$data = $this->rekam_medis->getPendaftaranDetailTindakan($this->get('id_pendaftaran', true), $this->get('id_layanan', true));
		$data['pendaftaran_detail'] = $this->rekam_medis->getPendaftaranDetailRekamMedis($this->get('id_layanan_pendaftaran'));
		$data['list_keterangan_pasien_emergency'] = $this->rekam_medis->getSuratKeteranganPasienEmergency($this->get('id_pendaftaran'));	
		$data['list_keterangan_pasien_emergency_logs'] = $this->rekam_medis->getSuratKeteranganPasienEmergencyLogs($this->get('id_pendaftaran'));	

		$data['ds_manual_utama'] = [];
        $ds_manual_utamas = $this->m_pelayanan->getDiagnosaManualUtamaKPEGD($this->get('id_pendaftaran', true));
        if (!empty($ds_manual_utamas)) {
            $data['ds_manual_utama'] = $ds_manual_utamas;
        }
		// var_dump($data['ds_manual_utama']);die;

		$data['ds_manual_sekunder'] = [];
        $ds_manual_sekunders = $this->m_pelayanan->getDiagnosaManualSekunderKPEGD($this->get('id_pendaftaran', true));
        if (!empty($ds_manual_sekunders)) {
            $data['ds_manual_sekunder'] = $ds_manual_sekunders;
        }
		// var_dump($data['ds_manual_sekunder']);die;

        $data['diagnosa_utama'] = [];
         $diagnosa_utamas = $this->m_pelayanan->getDiagnosa($this->get('id_pendaftaran', true));
        if (!empty($diagnosa_utamas)) {
            $data['diagnosa_utama'] = $diagnosa_utamas;
        } 
		// var_dump($data['diagnosa_utama']);die;

        $data['diagnosa_sekunder'] = [];
        $diagnosa_sekunders = $this->m_pelayanan->getDiagnosaSekunder($this->get('id_pendaftaran', true));
        if (!empty($diagnosa_sekunders)) {
            $data['diagnosa_sekunder'] = $diagnosa_sekunders;
        }
		// var_dump($data['diagnosa_sekunder']);die;

		if ($data != null) {
			$this->response($data, REST_Controller::HTTP_OK);
		} else {
			$this->response($data, REST_Controller::HTTP_OK);
		}
	}

	// KPEGD LOGS PERBAIKAN
	function simpan_keterangan_pasien_emergency_post(){
		$checkDataKpegd = '';
		if (safe_post('id_kpegd') !== '') {
			$checkDataKpegd = $this->rekam_medis->getSuratKeteranganPasienEmergencyById(safe_post('id_kpegd'));
		}
		$this->db->trans_begin();
	
		if (empty($checkDataKpegd)) {
			// INSERT DATA
			$data = array(
				'id_pendaftaran'			=> safe_post('id_pendaftaran'),
				'id_layanan_pendaftaran'    => safe_post('id_layanan_pendaftaran'),
				'bpjskpegd'                 => safe_post('bpjskpegd') == '' ? null : safe_post('bpjskpegd'),
				'umumkpegd'                	=> safe_post('umumkpegd') == '' ? null : safe_post('umumkpegd'),
				'lainkpegd'                	=> safe_post('lainkpegd') == '' ? null : safe_post('lainkpegd'),
				'doktertriasekpegd'         => safe_post('doktertriasekpegd') == '' ? null : safe_post('doktertriasekpegd'),
				'gawatdaruratkpegd'         => safe_post('gawatdaruratkpegd') == '' ? null : safe_post('gawatdaruratkpegd'),
				'tgawatdaruratkpegd'        => safe_post('tgawatdaruratkpegd') == '' ? null : safe_post('tgawatdaruratkpegd'),
				'datangsendirikpegd'        => safe_post('datangsendirikpegd') == '' ? null : safe_post('datangsendirikpegd'),
				'klinikkpegd'               => safe_post('klinikkpegd') == '' ? null : safe_post('klinikkpegd'),
				'puskesmaskpegd'            => safe_post('puskesmaskpegd') == '' ? null : safe_post('puskesmaskpegd'),
				'rslainkpegd'               => safe_post('rslainkpegd') == '' ? null : safe_post('rslainkpegd'),
				'danlainkpegd'              => safe_post('danlainkpegd') == '' ? null : safe_post('danlainkpegd'),
				'danlainlainkpegd'          => safe_post('danlainlainkpegd') == '' ? null : safe_post('danlainlainkpegd'),
				'tanggalkpegd' 	    		=> safe_post('tanggalkpegd') == '' ? null : date2mysql(safe_post('tanggalkpegd')),
				'id_user'					=> $this->session->userdata('id_translucent'),
				'created_at'				=> $this->datetime,
				'updated_on'             	=> $this->datetime	
			);
			$this->db->insert('sm_keterangan_pasien_emergency', $data);
	
		} else {
			// UPDATE DATA
			$data = array(				
				'bpjskpegd'                 => safe_post('bpjskpegd') == '' ? null : safe_post('bpjskpegd'),
				'umumkpegd'                	=> safe_post('umumkpegd') == '' ? null : safe_post('umumkpegd'),
				'lainkpegd'                	=> safe_post('lainkpegd') == '' ? null : safe_post('lainkpegd'),
				'doktertriasekpegd'         => safe_post('doktertriasekpegd') == '' ? null : safe_post('doktertriasekpegd'),
				'gawatdaruratkpegd'         => safe_post('gawatdaruratkpegd') == '' ? null : safe_post('gawatdaruratkpegd'),
				'tgawatdaruratkpegd'        => safe_post('tgawatdaruratkpegd') == '' ? null : safe_post('tgawatdaruratkpegd'),
				'datangsendirikpegd'        => safe_post('datangsendirikpegd') == '' ? null : safe_post('datangsendirikpegd'),
				'klinikkpegd'               => safe_post('klinikkpegd') == '' ? null : safe_post('klinikkpegd'),
				'puskesmaskpegd'            => safe_post('puskesmaskpegd') == '' ? null : safe_post('puskesmaskpegd'),
				'rslainkpegd'               => safe_post('rslainkpegd') == '' ? null : safe_post('rslainkpegd'),
				'danlainkpegd'              => safe_post('danlainkpegd') == '' ? null : safe_post('danlainkpegd'),
				'danlainlainkpegd'          => safe_post('danlainlainkpegd') == '' ? null : safe_post('danlainlainkpegd'),
				'tanggalkpegd' 	    		=> safe_post('tanggalkpegd') == '' ? null : date2mysql(safe_post('tanggalkpegd')),
				'id_user'                 	=> $this->session->userdata('id_translucent'),
				'updated_on'                => $this->datetime
			);
	
			// HANYA SIMPAN FIELD VALID KE DALAM LOG
			$logData = array(
				'id_pendaftaran'		=> $checkDataKpegd->id_pendaftaran,
				'id_layanan_pendaftaran'=> $checkDataKpegd->id_layanan_pendaftaran,
				'bpjskpegd'            	=> $checkDataKpegd->bpjskpegd,
				'umumkpegd'            	=> $checkDataKpegd->umumkpegd,
				'lainkpegd'            	=> $checkDataKpegd->lainkpegd,
				'doktertriasekpegd'     => $checkDataKpegd->doktertriasekpegd,
				'gawatdaruratkpegd'     => $checkDataKpegd->gawatdaruratkpegd,
				'tgawatdaruratkpegd'    => $checkDataKpegd->tgawatdaruratkpegd,
				'datangsendirikpegd'    => $checkDataKpegd->datangsendirikpegd,
				'klinikkpegd'           => $checkDataKpegd->klinikkpegd,
				'puskesmaskpegd'        => $checkDataKpegd->puskesmaskpegd,
				'rslainkpegd'           => $checkDataKpegd->rslainkpegd,
				'danlainkpegd'          => $checkDataKpegd->danlainkpegd,
				'danlainlainkpegd'      => $checkDataKpegd->danlainlainkpegd,
				'tanggalkpegd'          => $checkDataKpegd->tanggalkpegd,
				'id_user'              	=> $checkDataKpegd->id_user,
				'created_at'          	=> $checkDataKpegd->created_at,
				'updated_on'          	=> $this->datetime,
				'log_action'            => 'update'
			);
			$this->db->insert('sm_keterangan_pasien_emergency_logs', $logData);
	
			$this->db->where('id', safe_post('id_kpegd'));
			$this->db->update('sm_keterangan_pasien_emergency', $data);
		}
	
		if ($this->db->trans_status() === false) {
			$this->db->trans_rollback();
			$status = false;
			$message = 'Gagal simpan Data';
		} else {
			$this->db->trans_commit();
			$status = true;
			$message = 'Berhasil simpan Data';
		}
	
		$this->response(array('status' => $status, 'message' => $message), REST_Controller::HTTP_OK);
	}

	// KPEGD LOGS PERBAIKAN
	function hapus_keterangan_pasien_emergency_post(){
		if (!safe_post('id', true)) :
			$this->response(null, REST_Controller::HTTP_BAD_REQUEST);
		endif;
	
		// Ambil data sebelum dihapus
		$KpegdHapus = $this->db->where('id', safe_post('id'))->get('sm_keterangan_pasien_emergency')->row();
	
		$this->db->trans_begin();
	
		if ($KpegdHapus) {
			// Simpan ke log
			$logDataKpegd = array(
				'id_pendaftaran'        => $KpegdHapus->id_pendaftaran,
				'id_layanan_pendaftaran'=> $KpegdHapus->id_layanan_pendaftaran,
				'bpjskpegd'            	=> $KpegdHapus->bpjskpegd,
				'umumkpegd'            	=> $KpegdHapus->umumkpegd,
				'lainkpegd'            	=> $KpegdHapus->lainkpegd,
				'doktertriasekpegd'     => $KpegdHapus->doktertriasekpegd,
				'gawatdaruratkpegd'     => $KpegdHapus->gawatdaruratkpegd,
				'tgawatdaruratkpegd'    => $KpegdHapus->tgawatdaruratkpegd,
				'datangsendirikpegd'    => $KpegdHapus->datangsendirikpegd,
				'klinikkpegd'           => $KpegdHapus->klinikkpegd,
				'puskesmaskpegd'        => $KpegdHapus->puskesmaskpegd,
				'rslainkpegd'           => $KpegdHapus->rslainkpegd,
				'danlainkpegd'          => $KpegdHapus->danlainkpegd,
				'danlainlainkpegd'      => $KpegdHapus->danlainlainkpegd,
				'tanggalkpegd'          => $KpegdHapus->tanggalkpegd,
				'id_user'              	=> $KpegdHapus->id_user,
				'created_at'          	=> $KpegdHapus->created_at,
				'updated_on'          	=> $this->datetime,
				'log_action'            => 'delete'
			);
			$this->db->insert('sm_keterangan_pasien_emergency_logs', $logDataKpegd);
		}
	
		// Hapus data utama
		$this->db->where('id', safe_post('id'))->delete('sm_keterangan_pasien_emergency');
	
		if ($this->db->trans_status() === false) :
			$this->db->trans_rollback();
			$status = false;
			$message = 'Gagal Hapus Data';
		else :
			$this->db->trans_commit();
			$status = true;
			$message = 'Berhasil Hapus Data';
		endif;
	
		$this->response(array('status' => $status, 'message' => $message), REST_Controller::HTTP_OK);
	}
	
	// KPEGD PERBAIKAN
	function get_edit_keterangan_pasien_emergency_get(){
		$data['pendaftaran_detail'] = "";
		$data['edit_list_keterangan_pasien_emergency'] = "";
		$data['pendaftaran_detail'] = $this->rekam_medis->getPendaftaranDetailRekamMedis($this->get('id_layanan_pendaftaran'));
		$data['edit_list_keterangan_pasien_emergency'] = $this->rekam_medis->getSuratKeteranganPasienEmergencyById($this->get('id'));
		if ($data != null) {
			$this->response($data, REST_Controller::HTTP_OK);
		} else {
			$this->response($data, REST_Controller::HTTP_OK);
		}
	}



}
