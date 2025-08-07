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
class Pendaftaran_igd extends REST_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->limit = 10;
		$this->datetime = date('Y-m-d H:i:s');
		$this->load->model('Pendaftaran_igd_model', 'klinik');
		$this->load->model('rekam_medis/Rekam_medis_model', 'rekam_medis');
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

	function get_list_pendaftaran_igd_get()
	{
		if (!$this->get('page')) :
			$this->response(NULL, REST_Controller::HTTP_BAD_REQUEST);
		endif;

		$search = [
			'id'                => safe_get('id'),
			'tanggal_awal'      => safe_get('tanggal_awal'),
			'tanggal_akhir'     => safe_get('tanggal_akhir'),
			'jenis_pendaftaran' => $this->get('jenis_pendaftaran'),
			'no_register'       => safe_get('no_register'),
			'no_rm'             => safe_get('no_rm'),
			'nik'               => safe_get('nik'),
			'nama'              => safe_get('nama'),
			'tanggal_lahir'     => safe_get('tanggal_lahir'),
			'alamat'            => safe_get('alamat'),
			'jenis_igd'         => safe_get('jenis_igd'),
			'carabayar'         => safe_get('carabayar'),
			'status_dilayani'   => safe_get('status_dilayani'),
			'user'              => safe_get('user'),
            'penjamin'          => safe_get('penjamin_search'),
		];

		$start = $this->start($this->get('page'));

		$data = $this->klinik->getListDataPendaftaranIGD($this->limit, $start, $search);
		$data['page'] = (int) $this->get('page');
		$data['limit'] = $this->limit;

		if ($data) :
			$this->response($data, REST_Controller::HTTP_OK);
		endif;
	}

	function edit_no_rujukan_post()
	{
		$id_pendaftaran = safe_post('id_pendaftaran');
		$no_rujukan = safe_post('no_rujukan');

		if (($id_pendaftaran === '') & ($no_rujukan === '')) {
			$message = array('status' => false, 'token' => $this->security->get_csrf_hash());
		} else {
			$this->db->trans_begin();
			$update = array(
				'no_rujukan' => $no_rujukan
			);

			$this->db->where('id', $id_pendaftaran)->update('sm_pendaftaran', $update);
			$this->db->where('id_pendaftaran', $id_pendaftaran)->update('sm_layanan_pendaftaran', $update);


			if ($this->db->trans_status() === FALSE) {
				$this->db->trans_rollback();
				$status = FALSE;
			} else {
				$this->db->trans_commit();
				$status = TRUE;
			}

			$message = array('status' => $status, 'token' => $this->security->get_csrf_hash());
		}

		$message['no_rujukan'] = $no_rujukan;
		$this->response($message, REST_Controller::HTTP_OK);
	}

	function edit_jenis_igd_post()
	{
		$id_pendaftaran    = safe_post('id_pendaftaran_jenisigd');
		$jenis_igd_baru     = safe_post('jenis_igd_baru');

		if (($id_pendaftaran === '') & ($jenis_igd_baru === '')) {
			$message = array('status' => false, 'token' => $this->security->get_csrf_hash());
		} else {
			$this->db->trans_begin();
			$update = array(
				'jenis_igd' => $jenis_igd_baru
			);

			$this->db->where('id', $id_pendaftaran)->update('sm_pendaftaran', $update);

			if ($this->db->trans_status() === FALSE) {
				$this->db->trans_rollback();
				$status = FALSE;
			} else {
				$this->db->trans_commit();
				$status = TRUE;
			}

			$message = array('status' => $status, 'token' => $this->security->get_csrf_hash());
		}

		$message['jenis_igd'] = $jenis_igd_baru;
		$this->response($message, REST_Controller::HTTP_OK);
	}

	function edit_dokter_igd_post()
	{
		$id_lay_pendaftaran    = safe_post('id_layanan_pendaftaran_dokterigd');
		$dokter_igd_baru       = safe_post('dokter_edit');

		if (($id_lay_pendaftaran === '') & ($dokter_igd_baru === '')) {
			$message = array('status' => false, 'token' => $this->security->get_csrf_hash());
		} else {
			$this->db->trans_begin();
			$update = array(
				'id_dokter'       => $dokter_igd_baru
			);

			$this->db->where('id', $id_lay_pendaftaran)->update('sm_layanan_pendaftaran', $update);


			if ($this->db->trans_status() === FALSE) {
				$this->db->trans_rollback();
				$status = FALSE;
			} else {
				$this->db->trans_commit();
				$status = TRUE;
			}

			$message = array('status' => $status, 'token' => $this->security->get_csrf_hash());
		}

		$message['dokter_igd'] = $dokter_igd_baru;
		$this->response($message, REST_Controller::HTTP_OK);
	}

	function check_persetujuan_umum_get()
	{
		$data['data'] = $this->klinik->getPersetujuanUmumById($this->get('id'));
		$data['penanggung_jawab'] = $this->penanggung_jawab($this->get('id'));

		$this->response($data, REST_Controller::HTTP_OK);
	}

	function check_tata_tertib_get()
	{
		$data['data'] = $this->klinik->getTataTertibById($this->get('id'));
		$data['penanggung_jawab'] = $this->penanggung_jawab($this->get('id'));

		$this->response($data, REST_Controller::HTTP_OK);
	}

	private function penanggung_jawab($id)
	{
		return $this->db->select('p.nama_pjwb, p.telp_pjwb, p.alamat_pjwb, p.nik_pjwb, p.kelamin_pjwb, p.tgl_lahir_pjwb, p.hubungan_pjwb')
			->from('sm_layanan_pendaftaran lp')
			->join('sm_pendaftaran p', 'p.id = lp.id_pendaftaran')
			->where('lp.id', $id)->get()->row();
	}

	public function check_ringkasan_riwayat_masuk_dan_keluar_get()
	{
		$data = [];
		$data = $this->klinik->getRingkasanRiwayatMasukDanKeluarById($this->get('id'));

		if ($data != NULL) {
			$this->response($data[0], REST_Controller::HTTP_OK);
		} else {
			$this->response($data, REST_Controller::HTTP_OK);
		}
	}

	public function get_persetujuan_rawat_inap_get()
	{
		$layananPendaftaran = $this->db->where('id', $this->get('id'))->get('sm_layanan_pendaftaran')->row();
		$data['data'] = $this->klinik->getSuratPersetujuanRawatInap($layananPendaftaran->id_pendaftaran);
		$data['pendaftaran']  = $this->m_pendaftaran->getPendaftaranDetail($layananPendaftaran->id_pendaftaran);
		$data['penanggung_jawab'] = $this->penanggung_jawab($this->get('id'));

		$this->response($data, REST_Controller::HTTP_OK);
	}

	function simpan_persetujuan_umum_post()
	{
		$checkData = $this->klinik->getPersetujuanUmumById(safe_post('id_layanan_pendaftaran'));

		$this->db->trans_begin();
		if ($checkData == NULL) {
			$data = array(
				'id_layanan_pendaftaran' => safe_post('id_layanan_pendaftaran'),
				'nama_keluarga'          => safe_post('nama_keluarga') == '' ? NULL : safe_post('nama_keluarga'),
				'tanggal_lahir'          => safe_post('tanggal_lahir') == '' ? NULL : date2mysql(safe_post('tanggal_lahir')),
				'jenis_kelamin'          => safe_post('jenis_kelamin') == '' ? NULL : safe_post('jenis_kelamin'),
				'alamat'                 => safe_post('alamat_form_rekam_medis') == '' ? NULL : safe_post('alamat_form_rekam_medis'),
				'hubungan_keluarga'      => safe_post('hubungan_keluarga') == '' ? NULL : safe_post('hubungan_keluarga'),
				'created_at'             => $this->datetime,
				'updated_at'             => $this->datetime,
				'is_pasien'              => safe_post('is_pasien') == 'ya' ? 1 : 0,
				'no_rt'                  => safe_post('no_rt') == '' ? NULL : safe_post('no_rt'),
				'no_rw'                  => safe_post('no_rw') == '' ? NULL : safe_post('no_rw'),
				'kelurahan'              => safe_post('kelurahan') == '' ? NULL : safe_post('kelurahan'),
				'kecamatan'              => safe_post('kecamatan') == '' ? NULL : safe_post('kecamatan'),
				'kota'                   => safe_post('kabupaten') == '' ? NULL : safe_post('kabupaten'),
				'provinsi'               => safe_post('provinsi') == '' ? NULL : safe_post('provinsi'),
				'no_identitas'           => safe_post('no_identitas') == '' ? NULL : safe_post('no_identitas'),
				'no_hp'                  => safe_post('no_hp') == '' ? NULL : safe_post('no_hp'),
				'id_user'                => $this->session->userdata('id_translucent'),
			);

			$this->db->insert('sm_form_persetujuan_umum', $data);
		} else {
			$data = array(
				'nama_keluarga'     => safe_post('nama_keluarga') == '' ? NULL : safe_post('nama_keluarga'),
				'tanggal_lahir'     => safe_post('tanggal_lahir') == '' ? NULL : date2mysql(safe_post('tanggal_lahir')),
				'jenis_kelamin'     => safe_post('jenis_kelamin') == '' ? NULL : safe_post('jenis_kelamin'),
				'alamat'            => safe_post('alamat_form_rekam_medis') == '' ? NULL : safe_post('alamat_form_rekam_medis'),
				'hubungan_keluarga' => safe_post('hubungan_keluarga') == '' ? NULL : safe_post('hubungan_keluarga'),
				'updated_at'        => $this->datetime,
				'is_pasien'         => safe_post('is_pasien') == 'ya' ? 1 : 0,
				'no_rt'             => safe_post('no_rt') == '' ? NULL : safe_post('no_rt'),
				'no_rw'             => safe_post('no_rw') == '' ? NULL : safe_post('no_rw'),
				'kelurahan'         => safe_post('kelurahan') == '' ? NULL : safe_post('kelurahan'),
				'kecamatan'         => safe_post('kecamatan') == '' ? NULL : safe_post('kecamatan'),
				'kota'              => safe_post('kabupaten') == '' ? NULL : safe_post('kabupaten'),
				'provinsi'          => safe_post('provinsi') == '' ? NULL : safe_post('provinsi'),
				'no_identitas'      => safe_post('no_identitas') == '' ? NULL : safe_post('no_identitas'),
				'no_hp'             => safe_post('no_hp') == '' ? NULL : safe_post('no_hp'),
				'id_user'           => $this->session->userdata('id_translucent'),
			);

			$this->db->where('id_layanan_pendaftaran', safe_post('id_layanan_pendaftaran'));
			$this->db->update('sm_form_persetujuan_umum', $data);
		}

		if ($this->db->trans_status() === FALSE) :
			$this->db->trans_rollback();
			$status  = FALSE;
			$message = 'Gagal simpan form persetujuan tindakan operasi';
		else :
			$this->db->trans_commit();
			$status  = TRUE;
			$message = 'Berhasil simpan form persetujuan tindakan operasi';
		endif;

		$this->response(array('status' => $status, 'message' => $message), REST_Controller::HTTP_OK);
	}

	public function simpan_ringkasan_riwayat_masuk_dan_keluar_post()
	{
		$checkData = $this->klinik->getRingkasanRiwayatMasukDanKeluarById(safe_post('id_layanan_pendaftaran'));

		$this->db->trans_begin();
		if ($checkData == NULL) {
			$data = array(
				'id_layanan_pendaftaran' => safe_post('id_layanan_pendaftaran'),
				'indikasi'               => safe_post('indikasi') == '' ? NULL : safe_post('indikasi'),
				'keterangan_khusus'      => safe_post('keterangan_khusus') == '' ? NULL : safe_post('keterangan_khusus'),
				'dpjp_utama_1'           => !isset(safe_post('dpjp_utama')[0]) ? NULL : safe_post('dpjp_utama')[0],
				'dpjp_utama_2'           => !isset(safe_post('dpjp_utama')[1]) ? NULL : safe_post('dpjp_utama')[1],
				'dpjp_utama_3'           => !isset(safe_post('dpjp_utama')[2]) ? NULL : safe_post('dpjp_utama')[2],
				'dpjp_utama_4'           => !isset(safe_post('dpjp_utama')[3]) ? NULL : safe_post('dpjp_utama')[3],
				'dpjp_tambahan_1'        => !isset(safe_post('dpjp_tambahan')[0]) ? NULL : safe_post('dpjp_tambahan')[0],
				'dpjp_tambahan_2'        => !isset(safe_post('dpjp_tambahan')[1]) ? NULL : safe_post('dpjp_tambahan')[1],
				'dpjp_tambahan_3'        => !isset(safe_post('dpjp_tambahan')[2]) ? NULL : safe_post('dpjp_tambahan')[2],
				'dpjp_tambahan_4'        => !isset(safe_post('dpjp_tambahan')[3]) ? NULL : safe_post('dpjp_tambahan')[3],
				'tgl_alih_rawat_1'       => !isset(safe_post('tgl_alih_rawat')[0]) ? NULL : date2mysql(safe_post('tgl_alih_rawat')[0]),
				'tgl_alih_rawat_2'       => !isset(safe_post('tgl_alih_rawat')[1]) ? NULL : date2mysql(safe_post('tgl_alih_rawat')[1]),
				'tgl_alih_rawat_3'       => !isset(safe_post('tgl_alih_rawat')[2]) ? NULL : date2mysql(safe_post('tgl_alih_rawat')[2]),
				'tgl_alih_rawat_4'       => !isset(safe_post('tgl_alih_rawat')[3]) ? NULL : date2mysql(safe_post('tgl_alih_rawat')[3]),
				'id_user'                => $this->session->userdata('id_translucent'),
				'created_at'             => $this->datetime,
				'updated_at'             => $this->datetime,
			);

			$this->db->insert('sm_form_ringkasan_riwayat_masuk_dan_keluar', $data);
		} else {
			$data = array(
				'indikasi'          => safe_post('indikasi') == '' ? NULL : safe_post('indikasi'),
				'keterangan_khusus' => safe_post('keterangan_khusus') == '' ? NULL : safe_post('keterangan_khusus'),
				'dpjp_utama_1'      => !isset(safe_post('dpjp_utama')[0]) ? NULL : safe_post('dpjp_utama')[0],
				'dpjp_utama_2'      => !isset(safe_post('dpjp_utama')[1]) ? NULL : safe_post('dpjp_utama')[1],
				'dpjp_utama_3'      => !isset(safe_post('dpjp_utama')[2]) ? NULL : safe_post('dpjp_utama')[2],
				'dpjp_utama_4'      => !isset(safe_post('dpjp_utama')[3]) ? NULL : safe_post('dpjp_utama')[3],
				'dpjp_tambahan_1'   => !isset(safe_post('dpjp_tambahan')[0]) ? NULL : safe_post('dpjp_tambahan')[0],
				'dpjp_tambahan_2'   => !isset(safe_post('dpjp_tambahan')[1]) ? NULL : safe_post('dpjp_tambahan')[1],
				'dpjp_tambahan_3'   => !isset(safe_post('dpjp_tambahan')[2]) ? NULL : safe_post('dpjp_tambahan')[2],
				'dpjp_tambahan_4'   => !isset(safe_post('dpjp_tambahan')[3]) ? NULL : safe_post('dpjp_tambahan')[3],
				'tgl_alih_rawat_1'  => !isset(safe_post('tgl_alih_rawat')[0]) ? NULL : date2mysql(safe_post('tgl_alih_rawat')[0]),
				'tgl_alih_rawat_2'  => !isset(safe_post('tgl_alih_rawat')[1]) ? NULL : date2mysql(safe_post('tgl_alih_rawat')[1]),
				'tgl_alih_rawat_3'  => !isset(safe_post('tgl_alih_rawat')[2]) ? NULL : date2mysql(safe_post('tgl_alih_rawat')[2]),
				'tgl_alih_rawat_4'  => !isset(safe_post('tgl_alih_rawat')[3]) ? NULL : date2mysql(safe_post('tgl_alih_rawat')[3]),
				'id_user'           => $this->session->userdata('id_translucent'),
				'updated_at'        => $this->datetime,
			);

			$this->db->where('id_layanan_pendaftaran', safe_post('id_layanan_pendaftaran'));
			$this->db->update('sm_form_ringkasan_riwayat_masuk_dan_keluar', $data);
		}

		if ($this->db->trans_status() === FALSE) :
			$this->db->trans_rollback();
			$status  = FALSE;
			$message = 'Gagal simpan form ringkasan riwayat masuk dan keluar';
		else :
			$this->db->trans_commit();
			$status  = TRUE;
			$message = 'Berhasil simpan form ringkasan riwayat masuk dan keluar';
		endif;

		$this->response(array('status' => $status, 'message' => $message), REST_Controller::HTTP_OK);
	}

	function cetak_manual_surat_persetujuan_rawat_inap_post()
	{
		$checkData = $this->klinik->getSuratPersetujuanRawatInap(safe_post('id_pendaftaran'));

		$this->db->trans_begin();

		if ($checkData == null) {
			$data = array(
				'nama'                   => safe_post('nama') == '' ? null : safe_post('nama'),
				'tanggal_lahir'          => safe_post('tanggal_lahir') == '' ? null : safe_post('tanggal_lahir'),
				'jenis_kelamin'          => safe_post('jenis_kelamin') == '' ? null : safe_post('jenis_kelamin'),
				'identitas'              => safe_post('identitas') == '' ? null : safe_post('identitas'),
				'alamat'                 => safe_post('alamat') == '' ? null : safe_post('alamat'),
				'id_layanan_pendaftaran' => safe_post('id_layanan_pendaftaran') == '' ? null : safe_post('id_layanan_pendaftaran'),
				'hubungan_keluarga'      => safe_post('hubungan_keluarga') == '' ? null : safe_post('hubungan_keluarga'),
				'updated_at'             => $this->datetime,
				'created_at'             => $this->datetime,
				'id_user'                => $this->session->userdata('id_translucent'),
				'dirawat_di'             => safe_post('dirawat_id') == '' ? null : safe_post('dirawat_id'),
				'id_saksi'             	 => safe_post('saksi') == '' ? null : safe_post('saksi'),
			);

			$this->db->insert('sm_form_persetujuan_rawat_inap', $data);
		} else {
			$data = array(
				'nama'              => safe_post('nama') == '' ? null : safe_post('nama'),
				'tanggal_lahir'     => safe_post('tanggal_lahir') == '' ? null : safe_post('tanggal_lahir'),
				'jenis_kelamin'     => safe_post('jenis_kelamin') == '' ? null : safe_post('jenis_kelamin'),
				'identitas'         => safe_post('identitas') == '' ? null : safe_post('identitas'),
				'alamat'            => safe_post('alamat') == '' ? null : safe_post('alamat'),
				'hubungan_keluarga' => safe_post('hubungan_keluarga') == '' ? null : safe_post('hubungan_keluarga'),
				'updated_at'        => $this->datetime,
				'id_user'           => $this->session->userdata('id_translucent'),
				'dirawat_di'        => safe_post('dirawat_id') == '' ? null : safe_post('dirawat_id'),
				'id_saksi'             	 => safe_post('saksi') == '' ? null : safe_post('saksi'),
			);

			$this->db->where('id_layanan_pendaftaran', safe_post('id_layanan_pendaftaran'));
			$this->db->update('sm_form_persetujuan_rawat_inap', $data);
		}

		if ($this->db->trans_status() === FALSE) :
			$this->db->trans_rollback();
			$status  = FALSE;
			$message = 'Gagal simpan form persetujuan rawat inap';
		else :
			$this->db->trans_commit();
			$status  = TRUE;
			$message = 'Berhasil simpan form persetujuan rawat inap';
		endif;

		$this->response(array('status' => $status, 'message' => $message), REST_Controller::HTTP_OK);
	}

	function sep_asal_post()
	{
		$data = array(
			'id_pendaftaran' => $this->get('id_pendaftaran'),
			'is_rajal' 		 => $this->get('rajal'),
			'is_ranap'		 => $this->get('ranap'),
			'id_user'        => $this->session->userdata('id_translucent'),
			'created_date'   => $this->datetime,
		);

		$checkData = $this->klinik->getDataSepAsal($this->get('id_pendaftaran'));

		$this->db->trans_begin();

		if ($checkData == null) {
			$this->db->insert('sm_asal_sep', $data);
		} else {
			$this->klinik->ubahDataSep($this->get('id_pendaftaran'), $this->session->userdata('id_translucent'));

			$this->db->where('id_pendaftaran', $this->get('id_pendaftaran'));
			$this->db->update('sm_asal_sep', $data);
		}

		if ($this->db->trans_status() === FALSE) :
			$this->db->trans_rollback();
			$status  = FALSE;
			$message = 'Gagal simpan form persetujuan rawat inap';
		else :
			$this->db->trans_commit();
			$status  = TRUE;
			$message = 'Berhasil simpan form persetujuan rawat inap';
		endif;

		$this->response(array('status' => $status, 'message' => $message), REST_Controller::HTTP_OK);
	}

	// public function pegawai_pendaftaran_igd_get()
	// {
	// 	$list_pegawai = $this->db->select('sp.id, sp.nama')
	// 		->from('sm_pegawai sp')
	// 		->join('sm_translucent st', 'sp.id = st.id')
	// 		->join('sm_account_group sag', 'st.id_account_group = sag.id')
	// 		->where('sag.id', 31)->get()->result();

	// 	$count = $this->db->select('count(*)')
	// 		->from('sm_pegawai sp')
	// 		->join('sm_translucent st', 'sp.id = st.id')
	// 		->join('sm_account_group sag', 'st.id_account_group = sag.id')
	// 		->where('sag.id', 31)->get()->row();

	// 	$this->response(['data' => $list_pegawai, 'total' => $count->count]);
	// }

	// Ambil semua nama" Pegawai x WH
	public function pegawai_pendaftaran_igd_get(){
		$q=$this->get('q');
			$list_pegawai = $this->db->select('sp.id, sp.nama')
			->from('sm_pegawai sp')
			->join('sm_translucent st', 'sp.id = st.id')
			->where("sp.nama ilike '%$q%'")
			->get()
			->result();
		$count = $this->db->select('count(*)')
			->from('sm_pegawai sp')
			->join('sm_translucent st', 'sp.id = st.id')
			->where("sp.nama ilike '%$q%'")
			->get()->row();
		$this->response(['data' => $list_pegawai, 'total' => $count->count]);
	}

	public function get_edukasi_pasien_get()
	{
		$data = $this->m_pendaftaran->getPendaftaranDetail($this->get('id', true), $this->get('id_layanan', true));
		$data['edukasi'] = $this->klinik->getEdukasi($this->get('id'));
		$this->response($data);
	}

	function edit_hak_kelas_post()
	{
		$id_pendaftaran    = safe_post('id_pendaftaran_hakkelas');
		$hak_kelas_baru       = safe_post('hak_kelas_edit');

		if (($id_pendaftaran === '') & ($hak_kelas_baru === '')) {
			$message = array('status' => false, 'token' => $this->security->get_csrf_hash());
		} else {
			$this->db->trans_begin();
			$update = array(
				'hak_kelas'		=> $hak_kelas_baru
			);

			$this->db->where('id', $id_pendaftaran)->update('sm_pendaftaran', $update);


			if ($this->db->trans_status() === FALSE) {
				$this->db->trans_rollback();
				$status = FALSE;
			} else {
				$this->db->trans_commit();
				$status = TRUE;
			}

			$message = array('status' => $status, 'token' => $this->security->get_csrf_hash());
		}

		$message['hak_kelas'] = $hak_kelas_baru;
		$this->response($message, REST_Controller::HTTP_OK);
	}

	// SPPIP
	public function form_sppip_get(){
		$data['data'] = $this->klinik->getSuratPeryataanPembaharuanIdentitasPasien($this->get('id'));
		$layananPendaftaran = $this->db->where('id', $this->get('id'))->get('sm_layanan_pendaftaran')->row();
		$data['pendaftaran']  = $this->m_pendaftaran->getPendaftaranDetail($layananPendaftaran->id_pendaftaran);
		$data['penanggung_jawab'] = $this->penanggung_jawab($this->get('id'));
		$this->response($data, REST_Controller::HTTP_OK);
	}

	// SPPIP
	function simpan_cetak_sppip_post(){
		$checkData = $this->klinik->getSuratPeryataanPembaharuanIdentitasPasien(safe_post('id_layanan_pendaftaran'));
		$this->db->trans_begin();
		if ($checkData == null) {
			$data = array(
				'id_user'                		=> $this->session->userdata('id_translucent'),
				'id_layanan_pendaftaran' 		=> safe_post('id_layanan_pendaftaran') == '' ? null : safe_post('id_layanan_pendaftaran'),
				'nama_sppip'                   	=> safe_post('nama_sppip') == '' ? null : safe_post('nama_sppip'),
				'tgl_lahir_sppip'          		=> safe_post('tgl_lahir_sppip') == '' ? null : safe_post('tgl_lahir_sppip'),
				'umur_sppip'          			=> safe_post('umur_sppip') == '' ? null : safe_post('umur_sppip'),
				'jk_sppip'              		=> safe_post('jk_sppip') == '' ? null : safe_post('jk_sppip'),		
				'no_hp_sppip'      				=> safe_post('no_hp_sppip') == '' ? null : safe_post('no_hp_sppip'),		
				'alamat_sppip'      			=> safe_post('alamat_sppip') == '' ? null : safe_post('alamat_sppip'),
				'no_ktp_sppip'      				=> safe_post('no_ktp_sppip') == '' ? null : safe_post('no_ktp_sppip'),
				'hubungan_pasien_sppip'         => safe_post('hubungan_pasien_sppip') == '' ? null : safe_post('hubungan_pasien_sppip'),				
				'tgl_sppip'      				=> safe_post('tgl_sppip') == '' ? null : safe_post('tgl_sppip'),				
				'updated_at'             		=> $this->datetime,
				'created_at' 					=> $this->datetime,
			);
			$this->db->insert('sm_form_sppip_recall_implant', $data);
		} else {
			$data = array(
				'nama_sppip'                   	=> safe_post('nama_sppip') == '' ? null : safe_post('nama_sppip'),
				'tgl_lahir_sppip'          		=> safe_post('tgl_lahir_sppip') == '' ? null : safe_post('tgl_lahir_sppip'),
				'umur_sppip'          			=> safe_post('umur_sppip') == '' ? null : safe_post('umur_sppip'),
				'jk_sppip'              		=> safe_post('jk_sppip') == '' ? null : safe_post('jk_sppip'),		
				'no_hp_sppip'      				=> safe_post('no_hp_sppip') == '' ? null : safe_post('no_hp_sppip'),		
				'alamat_sppip'      			=> safe_post('alamat_sppip') == '' ? null : safe_post('alamat_sppip'),
				'no_ktp_sppip'      			=> safe_post('no_ktp_sppip') == '' ? null : safe_post('no_ktp_sppip'),
				'hubungan_pasien_sppip'         => safe_post('hubungan_pasien_sppip') == '' ? null : safe_post('hubungan_pasien_sppip'),				
				'tgl_sppip'      				=> safe_post('tgl_sppip') == '' ? null : safe_post('tgl_sppip'),
				'updated_at'             		=> $this->datetime,
			);
			$this->db->where('id_layanan_pendaftaran', safe_post('id_layanan_pendaftaran'));
			$this->db->update('sm_form_sppip_recall_implant', $data);			
		}
		// var_dump($data);die;
		if ($this->db->trans_status() === FALSE) :
			$this->db->trans_rollback();
			$status  = FALSE;
			$message = 'Gagal simpan form surat peryataan pembaharuan identitas pasien';
		else :
			$this->db->trans_commit();
			$status  = TRUE;
			$message = 'Berhasil simpan form surat peryataan pembaharuan identitas pasien';
		endif;

		$this->response(array('status' => $status, 'message' => $message), REST_Controller::HTTP_OK);
	}

	

	// PRDNR
	public function form_penolakan_resusitas_get(){
		$data = [];
		$data['data'] = $this->klinik->getSuratPenolakanResusitas($this->get('id'));
		$layananPendaftaran = $this->db->where('id', $this->get('id'))->get('sm_layanan_pendaftaran')->row();
		$data['pendaftaran']  = $this->m_pendaftaran->getPendaftaranDetail($layananPendaftaran->id_pendaftaran);
		if ($data != null) {
			$this->response($data[0], REST_Controller::HTTP_OK);
		} else {
			$this->response($data, REST_Controller::HTTP_OK);
		}
	}


	// PRDNR 
	function simpan_cetak_penolakan_resusitas_post() {
		$checkData = $this->klinik->getSuratPenolakanResusitas(safe_post('id_layanan_pendaftaran'));
		$this->db->trans_begin();
	
		// Data umum
		$data = array(
			'dokter_pelaksana'                   	=> safe_post('dokter_pelaksana') == '' ? null : safe_post('dokter_pelaksana'),
			'dokter_pemberi'                   	=> safe_post('dokter_pemberi') == '' ? null : safe_post('dokter_pemberi'),
			'penerima_form_1'                   	=> safe_post('penerima_form_1') == '' ? null : safe_post('penerima_form_1'),
			'diagnosis_form'                   	=> safe_post('diagnosis_form') == '' ? null : safe_post('diagnosis_form'),
			'tanda_form_1'                   	=> safe_post('tanda_form_1') == '' ? null : safe_post('tanda_form_1'),				
			'alasan_form'                   	=> safe_post('alasan_form') == '' ? null : safe_post('alasan_form'),
			'tanda_form_2'                   	=> safe_post('tanda_form_2') == '' ? null : safe_post('tanda_form_2'),
			'tata_form'                   	=> safe_post('tata_form') == '' ? null : safe_post('tata_form'),
			'tanda_form_3'                   	=> safe_post('tanda_form_3') == '' ? null : safe_post('tanda_form_3'),
			'tujuan_form'                   	=> safe_post('tujuan_form') == '' ? null : safe_post('tujuan_form'),
			'tanda_form_4'                   	=> safe_post('tanda_form_4') == '' ? null : safe_post('tanda_form_4'),
			'resiko_form'                   	=> safe_post('resiko_form') == '' ? null : safe_post('resiko_form'),
			'tanda_form_5'                   	=> safe_post('tanda_form_5') == '' ? null : safe_post('tanda_form_5'),
			'prognosis_form'                   	=> safe_post('prognosis_form') == '' ? null : safe_post('prognosis_form'),
			'tanda_form_6'                   	=> safe_post('tanda_form_6') == '' ? null : safe_post('tanda_form_6'),
			'alternatif_form'                   	=> safe_post('alternatif_form') == '' ? null : safe_post('alternatif_form'),
			'tanda_form_7'                   	=> safe_post('tanda_form_7') == '' ? null : safe_post('tanda_form_7'),
			'hal_form'                   	=> safe_post('hal_form') == '' ? null : safe_post('hal_form'),
			'tanda_form_8'                   	=> safe_post('tanda_form_8') == '' ? null : safe_post('tanda_form_8'),
		);
	
		if ($checkData == null) {
			// INSERT
			$data['id_user']                 = $this->session->userdata('id_translucent');
			$data['id_pendaftaran']         = safe_post('id_pendaftaran') == '' ? null : safe_post('id_pendaftaran');
			$data['id_layanan_pendaftaran'] = safe_post('id_layanan_pendaftaran') == '' ? null : safe_post('id_layanan_pendaftaran');
			$data['created_at']             = $this->datetime;
	
			$this->db->insert('sm_penolakan_resusitas_dnr', $data);
	
		} else {
			// UPDATE
			$data['updated_on'] = $this->datetime;
	
			$this->db->where('id_layanan_pendaftaran', safe_post('id_layanan_pendaftaran'));
			$this->db->update('sm_penolakan_resusitas_dnr', $data);
	
			// Tambah ke log
			$data_log = $data;
			unset($data_log['updated_on']); // Jangan simpan updated_on ke log, ganti pakai created_at
			$data_log['id_layanan_pendaftaran'] = safe_post('id_layanan_pendaftaran');
			$data_log['id_user'] = $this->session->userdata('id_translucent');
			$data_log['created_at'] = $this->datetime;
			$this->db->insert('sm_penolakan_resusitas_dnr_logs', $data_log);
		}
	
		if ($this->db->trans_status() === false) {
			$this->db->trans_rollback();
			$status  = false;
			$message = 'Gagal simpan form surat penolakan resusitas';
		} else {
			$this->db->trans_commit();
			$status  = true;
			$message = 'Berhasil simpan form surat penolakan resusitas';
		}
	
		$this->response(array('status' => $status, 'message' => $message), REST_Controller::HTTP_OK);
	}

	// PRDNR FORM
	function simpan_form_cetak_penolakan_resusitas_post() {
		$checkData = $this->klinik->getSuratPenolakanResusitas(safe_post('id_layanan_pendaftaran'));
		$this->db->trans_begin();
	
		// Data umum
		$data = array(
			'pr_prdnr'              		=> safe_post('pr_prdnr') == 'ya' ? 1 : 0,
			'nama_prdnr'          			=> safe_post('nama_prdnr') == '' ? null : safe_post('nama_prdnr'),
			'tgl_lahir_prdnr'          		=> safe_post('tgl_lahir_prdnr') == '' ? null : safe_post('tgl_lahir_prdnr'),
			'jk_prdnr'              		=> safe_post('jk_prdnr') == '' ? null : safe_post('jk_prdnr'),		
			'alamat_prdnr'      			=> safe_post('alamat_prdnr') == '' ? null : safe_post('alamat_prdnr'),
			'tindakan_prdnr'      			=> safe_post('tindakan_prdnr') == '' ? null : safe_post('tindakan_prdnr'),
			'hubungan_keluarga_prdnr'      	=> safe_post('hubungan_keluarga_prdnr') == '' ? null : safe_post('hubungan_keluarga_prdnr'),	
			'dokter_prdnr'      			=> safe_post('dokter_prdnr') == '' ? null : safe_post('dokter_prdnr'),	
			'perawat_prdnr_1'      			=> safe_post('perawat_prdnr_1') == '' ? null : safe_post('perawat_prdnr_1'),	
			'perawat_prdnr_2'      			=> safe_post('perawat_prdnr_2') == '' ? null : safe_post('perawat_prdnr_2'),
		);
	
		if ($checkData == null) {
			// INSERT
			$data['id_user']                 = $this->session->userdata('id_translucent');
			$data['id_pendaftaran']         = safe_post('id_pendaftaran') == '' ? null : safe_post('id_pendaftaran');
			$data['id_layanan_pendaftaran'] = safe_post('id_layanan_pendaftaran') == '' ? null : safe_post('id_layanan_pendaftaran');
			$data['created_at']             = $this->datetime;
	
			$this->db->insert('sm_penolakan_resusitas_dnr', $data);
	
		} else {
			// UPDATE
			$data['updated_on'] = $this->datetime;
	
			$this->db->where('id_layanan_pendaftaran', safe_post('id_layanan_pendaftaran'));
			$this->db->update('sm_penolakan_resusitas_dnr', $data);
	
			// Tambah ke log
			$data_log = $data;
			unset($data_log['updated_on']); // Jangan simpan updated_on ke log, ganti pakai created_at
			$data_log['id_layanan_pendaftaran'] = safe_post('id_layanan_pendaftaran');
			$data_log['id_user'] = $this->session->userdata('id_translucent');
			$data_log['created_at'] = $this->datetime;
			$this->db->insert('sm_penolakan_resusitas_dnr_logs', $data_log);
		}
	
		if ($this->db->trans_status() === false) {
			$this->db->trans_rollback();
			$status  = false;
			$message = 'Gagal simpan form surat penolakan resusitas';
		} else {
			$this->db->trans_commit();
			$status  = true;
			$message = 'Berhasil simpan form surat penolakan resusitas';
		}
	
		$this->response(array('status' => $status, 'message' => $message), REST_Controller::HTTP_OK);
	}
	





	

	// TPERS / OPAT
	public function form_transfer_pasien_exstra_rs_get(){
		$data = [];
		$data['data'] = $this->klinik->getTransferPasienExstraRS($this->get('id'));
		$layananPendaftaran = $this->db->where('id', $this->get('id'))->get('sm_layanan_pendaftaran')->row();
		$data['pendaftaran']  = $this->m_pendaftaran->getPendaftaranDetail($layananPendaftaran->id_pendaftaran);
		if ($data != null) {
			$this->response($data[0], REST_Controller::HTTP_OK);
		} else {
			$this->response($data, REST_Controller::HTTP_OK);
		}
	}

	// TPERS
	function simpan_cetak_transfer_pasien_ekstra_rs_post() {
		$checkData = $this->klinik->getTransferPasienExstraRS(safe_post('id_layanan_pendaftaran'));
		$this->db->trans_begin();
		$data = array(
			'tgl_masuk_tpers'        => safe_post('tgl_masuk_tpers') == '' ? null : safe_post('tgl_masuk_tpers'),
			'tgl_pindah_tpers'              => safe_post('tgl_pindah_tpers') == '' ? null : safe_post('tgl_pindah_tpers'),
			'unit_tpers'                   	=> safe_post('unit_tpers') == '' ? null : safe_post('unit_tpers'),
			'staf_tpers'      				=> (safe_post('staf_tpers') !== '' ? datetime2mysql(safe_post('staf_tpers')) : NULL),
			'nama_tpers'                   	=> safe_post('nama_tpers') == '' ? null : safe_post('nama_tpers'),
			'transportasi_tpers_1'            => safe_post('transportasi_tpers_1') == '' ? null : safe_post('transportasi_tpers_1'),
			'transportasi_tpers_2'            => safe_post('transportasi_tpers_2') == '' ? null : safe_post('transportasi_tpers_2'),
			'transportasi_tpers_3'            => safe_post('transportasi_tpers_3') == '' ? null : safe_post('transportasi_tpers_3'),
			'alasan_tpers_1'            => safe_post('alasan_tpers_1') == '' ? null : safe_post('alasan_tpers_1'),
			'alasan_tpers_2'            => safe_post('alasan_tpers_2') == '' ? null : safe_post('alasan_tpers_2'),
			'alasan_tpers_3'            => safe_post('alasan_tpers_3') == '' ? null : safe_post('alasan_tpers_3'),
			'alasan_tpers_4'            => safe_post('alasan_tpers_4') == '' ? null : safe_post('alasan_tpers_4'),
			'alasan_tpers_5'                => safe_post('alasan_tpers_5') == '' ? null : safe_post('alasan_tpers_5'),
			'alasan_tpers_6'               	=> safe_post('alasan_tpers_6') == '' ? null : safe_post('alasan_tpers_6'),
			'dokter_dpjp_tpers'             => safe_post('dokter_dpjp_tpers') == '' ? null : safe_post('dokter_dpjp_tpers'),				
			'ceklis_tpers_1'                => safe_post('ceklis_tpers_1') == '' ? null : safe_post('ceklis_tpers_1'),
			'rs_dituju_tpers'               => safe_post('rs_dituju_tpers') == '' ? null : safe_post('rs_dituju_tpers'),
			'ceklis_tpers_2'                => safe_post('ceklis_tpers_2') == '' ? null : safe_post('ceklis_tpers_2'),
			'ruang_tpers'                	=> safe_post('ruang_tpers') == '' ? null : safe_post('ruang_tpers'),
			'ceklis_tpers_3'                => safe_post('ceklis_tpers_3') == '' ? null : safe_post('ceklis_tpers_3'),
			'dokter_sp_tpers'               => safe_post('dokter_sp_tpers') == '' ? null : safe_post('dokter_sp_tpers'),
			'nama_staf_tpers'               => safe_post('nama_staf_tpers') == '' ? null : safe_post('nama_staf_tpers'),
			'no_staf_tpers'                	=> safe_post('no_staf_tpers') == '' ? null : safe_post('no_staf_tpers'),
			'jika_staf_tpers'               => safe_post('jika_staf_tpers') == '' ? null : safe_post('jika_staf_tpers'),
			'tiba_staf_tpers'               => safe_post('tiba_staf_tpers') == '' ? null : safe_post('tiba_staf_tpers'),
			'ceklis_tpers_4'                => safe_post('ceklis_tpers_4') == '' ? null : safe_post('ceklis_tpers_4'),
			'dokter_pendamping_tpers'       => safe_post('dokter_pendamping_tpers') == '' ? null : safe_post('dokter_pendamping_tpers'),
			'ceklis_tpers_5'                => safe_post('ceklis_tpers_5') == '' ? null : safe_post('ceklis_tpers_5'),
			'perawat_pendamping_tpers'      => safe_post('perawat_pendamping_tpers') == '' ? null : safe_post('perawat_pendamping_tpers'),
			'kel_tpers'                		=> safe_post('kel_tpers') == '' ? null : safe_post('kel_tpers'),
			'tidak_ada_tpers'               => safe_post('tidak_ada_tpers') == '' ? null : safe_post('tidak_ada_tpers'),
			'indikasi_tpers'                => safe_post('indikasi_tpers') == '' ? null : safe_post('indikasi_tpers'),
			'riwayat_kesehatan_tpers'       => safe_post('riwayat_kesehatan_tpers') == '' ? null : safe_post('riwayat_kesehatan_tpers'),
			'alergi_tpers_1'                => safe_post('alergi_tpers_1') == '' ? null : safe_post('alergi_tpers_1'),
			'alergi_tpers_2'                => safe_post('alergi_tpers_2') == '' ? null : safe_post('alergi_tpers_2'),
			'alergi_tpers_3'                => safe_post('alergi_tpers_3') == '' ? null : safe_post('alergi_tpers_3'),
			'terapi_tpers_1'                => safe_post('terapi_tpers_1') == '' ? null : safe_post('terapi_tpers_1'),
			'terapi_tpers_2'                => safe_post('terapi_tpers_2') == '' ? null : safe_post('terapi_tpers_2'),
			'terapi_tpers_3'                => safe_post('terapi_tpers_3') == '' ? null : safe_post('terapi_tpers_3'),
			'diagnosa_medis_tpers'          => safe_post('diagnosa_medis_tpers') == '' ? null : safe_post('diagnosa_medis_tpers'),
			'diagnosa_sek_tpers'            => safe_post('diagnosa_sek_tpers') == '' ? null : safe_post('diagnosa_sek_tpers'),
			'no_tpers'            => safe_post('no_tpers') == '' ? null : safe_post('no_tpers'),
			'nama_obat_tpers'            => safe_post('nama_obat_tpers') == '' ? null : safe_post('nama_obat_tpers'),
			'rute_tpers'            => safe_post('rute_tpers') == '' ? null : safe_post('rute_tpers'),
			'dosis_tpers'            => safe_post('dosis_tpers') == '' ? null : safe_post('dosis_tpers'),
			'frekuensi_tpers'            => safe_post('frekuensi_tpers') == '' ? null : safe_post('frekuensi_tpers'),
			'jam_pemberian_tpers'            => safe_post('jam_pemberian_tpers') == '' ? null : safe_post('jam_pemberian_tpers'),
			'jml_sisa_obat_tpers'            => safe_post('jml_sisa_obat_tpers') == '' ? null : safe_post('jml_sisa_obat_tpers'),

			'rw_penyakit_tpers'             => safe_post('rw_penyakit_tpers') == '' ? null : safe_post('rw_penyakit_tpers'),
			'rw_penyakit_tpers_1'           => safe_post('rw_penyakit_tpers_1') == '' ? null : safe_post('rw_penyakit_tpers_1'),
			'rw_penyakit_tpers_2'           => safe_post('rw_penyakit_tpers_2') == '' ? null : safe_post('rw_penyakit_tpers_2'),
			'rw_penyakit_tpers_3'           => safe_post('rw_penyakit_tpers_3') == '' ? null : safe_post('rw_penyakit_tpers_3'),
			'intake_tpers'                	=> safe_post('intake_tpers') == '' ? null : safe_post('intake_tpers'),
			'E_tpers'                		=> safe_post('E_tpers') == '' ? null : safe_post('E_tpers'),
			'V_tpers'                		=> safe_post('V_tpers') == '' ? null : safe_post('V_tpers'),
			'M_tpers'                		=> safe_post('M_tpers') == '' ? null : safe_post('M_tpers'),
			'pupil_tpers'                	=> safe_post('pupil_tpers') == '' ? null : safe_post('pupil_tpers'),
			'reflek_tpers_1'                => safe_post('reflek_tpers_1') == '' ? null : safe_post('reflek_tpers_1'),
			'reflek_tpers_2'                => safe_post('reflek_tpers_2') == '' ? null : safe_post('reflek_tpers_2'),
			'td_tpers_1'                	=> safe_post('td_tpers_1') == '' ? null : safe_post('td_tpers_1'),
			'td_tpers_2'                	=> safe_post('td_tpers_2') == '' ? null : safe_post('td_tpers_2'),
			'nadi_tpers'                	=> safe_post('nadi_tpers') == '' ? null : safe_post('nadi_tpers'),
			'suhu_tpers'                	=> safe_post('suhu_tpers') == '' ? null : safe_post('suhu_tpers'),
			'pf_tpers'                		=> safe_post('pf_tpers') == '' ? null : safe_post('pf_tpers'),
			'pasien_mmberi_tpers_1'           => safe_post('pasien_mmberi_tpers_1') == '' ? null : safe_post('pasien_mmberi_tpers_1'),
			'pasien_mmberi_tpers_2'           => safe_post('pasien_mmberi_tpers_2') == '' ? null : safe_post('pasien_mmberi_tpers_2'),
			'infus_tpers'                	=> safe_post('infus_tpers') == '' ? null : safe_post('infus_tpers'),
			'ett_tpers'                		=> safe_post('ett_tpers') == '' ? null : safe_post('ett_tpers'),
			'oksigen_tpers'                	=> safe_post('oksigen_tpers') == '' ? null : safe_post('oksigen_tpers'),
			'cvc_tpers'                		=> safe_post('cvc_tpers') == '' ? null : safe_post('cvc_tpers'),
			'kateter_tpers'                	=> safe_post('kateter_tpers') == '' ? null : safe_post('kateter_tpers'),
			'bidai_tpers'                	=> safe_post('bidai_tpers') == '' ? null : safe_post('bidai_tpers'),
			'pupm_tpers'                	=> safe_post('pupm_tpers') == '' ? null : safe_post('pupm_tpers'),
			'lain_tpers'                	=> safe_post('lain_tpers') == '' ? null : safe_post('lain_tpers'),
			'peralatan_tpers'               => safe_post('peralatan_tpers') == '' ? null : safe_post('peralatan_tpers'),
			'pp_dianostik_1'                	=> safe_post('pp_dianostik_1') == '' ? null : safe_post('pp_dianostik_1'),
			'pp_dianostik_2'                	=> safe_post('pp_dianostik_2') == '' ? null : safe_post('pp_dianostik_2'),
			'pp_dianostik_3'                => safe_post('pp_dianostik_3') == '' ? null : safe_post('pp_dianostik_3'),
			'pj_shift_tpers'                => safe_post('pj_shift_tpers') == '' ? null : safe_post('pj_shift_tpers'),
			'dokter_pem_tpers'       => safe_post('dokter_pem_tpers') == '' ? null : safe_post('dokter_pem_tpers'),
			'updated_on'             => $this->datetime,
		);
	
		if ($checkData == null) {
			// Data baru → INSERT ke sm_form_tpers
			$data['id_user']                = $this->session->userdata('id_translucent');
			$data['id_pendaftaran']        = safe_post('id_pendaftaran') == '' ? null : safe_post('id_pendaftaran');
			$data['id_layanan_pendaftaran'] = safe_post('id_layanan_pendaftaran') == '' ? null : safe_post('id_layanan_pendaftaran');
			$data['created_at']            = $this->datetime;
	
			$this->db->insert('sm_form_tpers', $data);
	
		} else {
			// Data sudah ada → UPDATE ke sm_form_tpers
			$this->db->where('id_layanan_pendaftaran', safe_post('id_layanan_pendaftaran'));
			$this->db->update('sm_form_tpers', $data);
	
			// Tambahkan juga log ke sm_form_tpers_logs
			$data_log = $data;
			$data_log['id_layanan_pendaftaran'] = safe_post('id_layanan_pendaftaran');
			$data_log['id_user'] = $this->session->userdata('id_translucent');
			$data_log['created_at'] = $this->datetime;
			$this->db->insert('sm_form_tpers_logs', $data_log);
		}
	
		if ($this->db->trans_status() === false) {
			$this->db->trans_rollback();
			$status  = false;
			$message = 'Gagal simpan form cetak transfer pasien ekstra RS';
		} else {
			$this->db->trans_commit();
			$status  = true;
			$message = 'Berhasil simpan form cetak transfer pasien ekstra RS';
		}
	
		$this->response(array('status' => $status, 'message' => $message), REST_Controller::HTTP_OK);
	}
	
	// OPAT
	function simpan_cetak_observasi_pasien_saat_transfer_post() {
		$checkData = $this->klinik->getTransferPasienExstraRS(safe_post('id_layanan_pendaftaran'));
		$this->db->trans_begin();
		$data = array(
			'tgl_opst_1'      				=> (safe_post('tgl_opst_1') !== '' ? datetime2mysql(safe_post('tgl_opst_1')) : NULL),
			'keadaan_opst_1'                => safe_post('keadaan_opst_1') == '' ? null : safe_post('keadaan_opst_1'),
			'td_opst_1'                   	=> safe_post('td_opst_1') == '' ? null : safe_post('td_opst_1'),
			'n_opst_1'                   	=> safe_post('n_opst_1') == '' ? null : safe_post('n_opst_1'),
			'rr_opst_1'                   	=> safe_post('rr_opst_1') == '' ? null : safe_post('rr_opst_1'),
			's_opst_1'                   	=> safe_post('s_opst_1') == '' ? null : safe_post('s_opst_1'),
			'sp02_opst_1'                  	=> safe_post('sp02_opst_1') == '' ? null : safe_post('sp02_opst_1'),
			'oksigen_opst_1'                => safe_post('oksigen_opst_1') == '' ? null : safe_post('oksigen_opst_1'),
			'tindakan_opst_1'               => safe_post('tindakan_opst_1') == '' ? null : safe_post('tindakan_opst_1'),
			'evaluasi_opst_1'               => safe_post('evaluasi_opst_1') == '' ? null : safe_post('evaluasi_opst_1'),
			'petugas_opst_1'                => safe_post('petugas_opst_1') == '' ? null : safe_post('petugas_opst_1'),
			'tgl_opst_2'      				=> (safe_post('tgl_opst_2') !== '' ? datetime2mysql(safe_post('tgl_opst_2')) : NULL),
			'keadaan_opst_2'                => safe_post('keadaan_opst_2') == '' ? null : safe_post('keadaan_opst_2'),
			'td_opst_2'                   	=> safe_post('td_opst_2') == '' ? null : safe_post('td_opst_2'),
			'n_opst_2'                   	=> safe_post('n_opst_2') == '' ? null : safe_post('n_opst_2'),
			'rr_opst_2'                   	=> safe_post('rr_opst_2') == '' ? null : safe_post('rr_opst_2'),
			's_opst_2'                   	=> safe_post('s_opst_2') == '' ? null : safe_post('s_opst_2'),
			'sp02_opst_2'                  	=> safe_post('sp02_opst_2') == '' ? null : safe_post('sp02_opst_2'),
			'oksigen_opst_2'                => safe_post('oksigen_opst_2') == '' ? null : safe_post('oksigen_opst_2'),
			'tindakan_opst_2'               => safe_post('tindakan_opst_2') == '' ? null : safe_post('tindakan_opst_2'),
			'evaluasi_opst_2'               => safe_post('evaluasi_opst_2') == '' ? null : safe_post('evaluasi_opst_2'),
			'petugas_opst_2'                => safe_post('petugas_opst_2') == '' ? null : safe_post('petugas_opst_2'),
			

			'tgl_opst_3'      				=> (safe_post('tgl_opst_3') !== '' ? datetime2mysql(safe_post('tgl_opst_3')) : NULL),
			'keadaan_opst_3'                => safe_post('keadaan_opst_3') == '' ? null : safe_post('keadaan_opst_3'),
			'td_opst_3'                   	=> safe_post('td_opst_3') == '' ? null : safe_post('td_opst_3'),
			'n_opst_3'                   	=> safe_post('n_opst_3') == '' ? null : safe_post('n_opst_3'),
			'rr_opst_3'                   	=> safe_post('rr_opst_3') == '' ? null : safe_post('rr_opst_3'),
			's_opst_3'                   	=> safe_post('s_opst_3') == '' ? null : safe_post('s_opst_3'),
			'sp02_opst_3'                  	=> safe_post('sp02_opst_3') == '' ? null : safe_post('sp02_opst_3'),
			'oksigen_opst_3'                => safe_post('oksigen_opst_3') == '' ? null : safe_post('oksigen_opst_3'),
			'tindakan_opst_3'               => safe_post('tindakan_opst_3') == '' ? null : safe_post('tindakan_opst_3'),
			'evaluasi_opst_3'               => safe_post('evaluasi_opst_3') == '' ? null : safe_post('evaluasi_opst_3'),
			'petugas_opst_3'                => safe_post('petugas_opst_3') == '' ? null : safe_post('petugas_opst_3'),
			

			'tgl_opst_4'      				=> (safe_post('tgl_opst_4') !== '' ? datetime2mysql(safe_post('tgl_opst_4')) : NULL),
			'keadaan_opst_4'                => safe_post('keadaan_opst_4') == '' ? null : safe_post('keadaan_opst_4'),
			'td_opst_4'                   	=> safe_post('td_opst_4') == '' ? null : safe_post('td_opst_4'),
			'n_opst_4'                   	=> safe_post('n_opst_4') == '' ? null : safe_post('n_opst_4'),
			'rr_opst_4'                   	=> safe_post('rr_opst_4') == '' ? null : safe_post('rr_opst_4'),
			's_opst_4'                   	=> safe_post('s_opst_4') == '' ? null : safe_post('s_opst_4'),
			'sp02_opst_4'                  	=> safe_post('sp02_opst_4') == '' ? null : safe_post('sp02_opst_4'),
			'oksigen_opst_4'                => safe_post('oksigen_opst_4') == '' ? null : safe_post('oksigen_opst_4'),
			'tindakan_opst_4'               => safe_post('tindakan_opst_4') == '' ? null : safe_post('tindakan_opst_4'),
			'evaluasi_opst_4'               => safe_post('evaluasi_opst_4') == '' ? null : safe_post('evaluasi_opst_4'),
			'petugas_opst_4'                => safe_post('petugas_opst_4') == '' ? null : safe_post('petugas_opst_4'),
			

			'tgl_opst_5'      				=> (safe_post('tgl_opst_5') !== '' ? datetime2mysql(safe_post('tgl_opst_5')) : NULL),
			'keadaan_opst_5'                => safe_post('keadaan_opst_5') == '' ? null : safe_post('keadaan_opst_5'),
			'td_opst_5'                   	=> safe_post('td_opst_5') == '' ? null : safe_post('td_opst_5'),
			'n_opst_5'                   	=> safe_post('n_opst_5') == '' ? null : safe_post('n_opst_5'),
			'rr_opst_5'                   	=> safe_post('rr_opst_5') == '' ? null : safe_post('rr_opst_5'),
			's_opst_5'                   	=> safe_post('s_opst_5') == '' ? null : safe_post('s_opst_5'),
			'sp02_opst_5'                  	=> safe_post('sp02_opst_5') == '' ? null : safe_post('sp02_opst_5'),
			'oksigen_opst_5'                => safe_post('oksigen_opst_5') == '' ? null : safe_post('oksigen_opst_5'),
			'tindakan_opst_5'               => safe_post('tindakan_opst_5') == '' ? null : safe_post('tindakan_opst_5'),
			'evaluasi_opst_5'               => safe_post('evaluasi_opst_5') == '' ? null : safe_post('evaluasi_opst_5'),
			'petugas_opst_5'                => safe_post('petugas_opst_5') == '' ? null : safe_post('petugas_opst_5'),
			

			'tgl_opst_6'      				=> (safe_post('tgl_opst_6') !== '' ? datetime2mysql(safe_post('tgl_opst_6')) : NULL),
			'keadaan_opst_6'                => safe_post('keadaan_opst_6') == '' ? null : safe_post('keadaan_opst_6'),
			'td_opst_6'                   	=> safe_post('td_opst_6') == '' ? null : safe_post('td_opst_6'),
			'n_opst_6'                   	=> safe_post('n_opst_6') == '' ? null : safe_post('n_opst_6'),
			'rr_opst_6'                   	=> safe_post('rr_opst_6') == '' ? null : safe_post('rr_opst_6'),
			's_opst_6'                   	=> safe_post('s_opst_6') == '' ? null : safe_post('s_opst_6'),
			'sp02_opst_6'                  	=> safe_post('sp02_opst_6') == '' ? null : safe_post('sp02_opst_6'),
			'oksigen_opst_6'                => safe_post('oksigen_opst_6') == '' ? null : safe_post('oksigen_opst_6'),
			'tindakan_opst_6'               => safe_post('tindakan_opst_6') == '' ? null : safe_post('tindakan_opst_6'),
			'evaluasi_opst_6'               => safe_post('evaluasi_opst_6') == '' ? null : safe_post('evaluasi_opst_6'),
			'petugas_opst_6'                => safe_post('petugas_opst_6') == '' ? null : safe_post('petugas_opst_6'),
			

			'tgl_opst_7'      				=> (safe_post('tgl_opst_7') !== '' ? datetime2mysql(safe_post('tgl_opst_7')) : NULL),
			'keadaan_opst_7'                => safe_post('keadaan_opst_7') == '' ? null : safe_post('keadaan_opst_7'),
			'td_opst_7'                   	=> safe_post('td_opst_7') == '' ? null : safe_post('td_opst_7'),
			'n_opst_7'                   	=> safe_post('n_opst_7') == '' ? null : safe_post('n_opst_7'),
			'rr_opst_7'                   	=> safe_post('rr_opst_7') == '' ? null : safe_post('rr_opst_7'),
			's_opst_7'                   	=> safe_post('s_opst_7') == '' ? null : safe_post('s_opst_7'),
			'sp02_opst_7'                  	=> safe_post('sp02_opst_7') == '' ? null : safe_post('sp02_opst_7'),
			'oksigen_opst_7'                => safe_post('oksigen_opst_7') == '' ? null : safe_post('oksigen_opst_7'),
			'tindakan_opst_7'               => safe_post('tindakan_opst_7') == '' ? null : safe_post('tindakan_opst_7'),
			'evaluasi_opst_7'               => safe_post('evaluasi_opst_7') == '' ? null : safe_post('evaluasi_opst_7'),
			'petugas_opst_7'                => safe_post('petugas_opst_7') == '' ? null : safe_post('petugas_opst_7'),
			
			'tgl_opst_8'      				=> (safe_post('tgl_opst_8') !== '' ? datetime2mysql(safe_post('tgl_opst_8')) : NULL),
			'keadaan_opst_8'                => safe_post('keadaan_opst_8') == '' ? null : safe_post('keadaan_opst_8'),
			'td_opst_8'                   	=> safe_post('td_opst_8') == '' ? null : safe_post('td_opst_8'),
			'n_opst_8'                   	=> safe_post('n_opst_8') == '' ? null : safe_post('n_opst_8'),
			'rr_opst_8'                   	=> safe_post('rr_opst_8') == '' ? null : safe_post('rr_opst_8'),
			's_opst_8'                   	=> safe_post('s_opst_8') == '' ? null : safe_post('s_opst_8'),
			'sp02_opst_8'                  	=> safe_post('sp02_opst_8') == '' ? null : safe_post('sp02_opst_8'),
			'oksigen_opst_8'                => safe_post('oksigen_opst_8') == '' ? null : safe_post('oksigen_opst_8'),
			'tindakan_opst_8'               => safe_post('tindakan_opst_8') == '' ? null : safe_post('tindakan_opst_8'),
			'evaluasi_opst_8'               => safe_post('evaluasi_opst_8') == '' ? null : safe_post('evaluasi_opst_8'),
			'petugas_opst_8'                => safe_post('petugas_opst_8') == '' ? null : safe_post('petugas_opst_8'),
			
			'tgl_opst_9'      				=> (safe_post('tgl_opst_9') !== '' ? datetime2mysql(safe_post('tgl_opst_9')) : NULL),
			'keadaan_opst_9'                => safe_post('keadaan_opst_9') == '' ? null : safe_post('keadaan_opst_9'),
			'td_opst_9'                   	=> safe_post('td_opst_9') == '' ? null : safe_post('td_opst_9'),
			'n_opst_9'                   	=> safe_post('n_opst_9') == '' ? null : safe_post('n_opst_9'),
			'rr_opst_9'                   	=> safe_post('rr_opst_9') == '' ? null : safe_post('rr_opst_9'),
			's_opst_9'                   	=> safe_post('s_opst_9') == '' ? null : safe_post('s_opst_9'),
			'sp02_opst_9'                  	=> safe_post('sp02_opst_9') == '' ? null : safe_post('sp02_opst_9'),
			'oksigen_opst_9'                => safe_post('oksigen_opst_9') == '' ? null : safe_post('oksigen_opst_9'),
			'tindakan_opst_9'               => safe_post('tindakan_opst_9') == '' ? null : safe_post('tindakan_opst_9'),
			'evaluasi_opst_9'               => safe_post('evaluasi_opst_9') == '' ? null : safe_post('evaluasi_opst_9'),
			'petugas_opst_9'                => safe_post('petugas_opst_9') == '' ? null : safe_post('petugas_opst_9'),
			
			'tgl_opst_10'      				=> (safe_post('tgl_opst_10') !== '' ? datetime2mysql(safe_post('tgl_opst_10')) : NULL),
			'keadaan_opst_10'                => safe_post('keadaan_opst_10') == '' ? null : safe_post('keadaan_opst_10'),
			'td_opst_10'                   	=> safe_post('td_opst_10') == '' ? null : safe_post('td_opst_10'),
			'n_opst_10'                   	=> safe_post('n_opst_10') == '' ? null : safe_post('n_opst_10'),
			'rr_opst_10'                   	=> safe_post('rr_opst_10') == '' ? null : safe_post('rr_opst_10'),
			's_opst_10'                   	=> safe_post('s_opst_10') == '' ? null : safe_post('s_opst_10'),
			'sp02_opst_10'                  	=> safe_post('sp02_opst_10') == '' ? null : safe_post('sp02_opst_10'),
			'oksigen_opst_10'                => safe_post('oksigen_opst_10') == '' ? null : safe_post('oksigen_opst_10'),
			'tindakan_opst_10'               => safe_post('tindakan_opst_10') == '' ? null : safe_post('tindakan_opst_10'),
			'evaluasi_opst_10'               => safe_post('evaluasi_opst_10') == '' ? null : safe_post('evaluasi_opst_10'),
			'petugas_opst_10'                => safe_post('petugas_opst_10') == '' ? null : safe_post('petugas_opst_10'),
			
			'tgl_opst_11'      				=> (safe_post('tgl_opst_11') !== '' ? datetime2mysql(safe_post('tgl_opst_11')) : NULL),
			'keadaan_opst_11'                => safe_post('keadaan_opst_11') == '' ? null : safe_post('keadaan_opst_11'),
			'td_opst_11'                   	=> safe_post('td_opst_11') == '' ? null : safe_post('td_opst_11'),
			'n_opst_11'                   	=> safe_post('n_opst_11') == '' ? null : safe_post('n_opst_11'),
			'rr_opst_11'                   	=> safe_post('rr_opst_11') == '' ? null : safe_post('rr_opst_11'),
			's_opst_11'                   	=> safe_post('s_opst_11') == '' ? null : safe_post('s_opst_11'),
			'sp02_opst_11'                  	=> safe_post('sp02_opst_11') == '' ? null : safe_post('sp02_opst_11'),
			'oksigen_opst_11'                => safe_post('oksigen_opst_11') == '' ? null : safe_post('oksigen_opst_11'),
			'tindakan_opst_11'               => safe_post('tindakan_opst_11') == '' ? null : safe_post('tindakan_opst_11'),
			'evaluasi_opst_11'               => safe_post('evaluasi_opst_11') == '' ? null : safe_post('evaluasi_opst_11'),
			'petugas_opst_11'                => safe_post('petugas_opst_11') == '' ? null : safe_post('petugas_opst_11'),
			
			'tgl_opst_12'      				=> (safe_post('tgl_opst_12') !== '' ? datetime2mysql(safe_post('tgl_opst_12')) : NULL),
			'keadaan_opst_12'                => safe_post('keadaan_opst_12') == '' ? null : safe_post('keadaan_opst_12'),
			'td_opst_12'                   	=> safe_post('td_opst_12') == '' ? null : safe_post('td_opst_12'),
			'n_opst_12'                   	=> safe_post('n_opst_12') == '' ? null : safe_post('n_opst_12'),
			'rr_opst_12'                   	=> safe_post('rr_opst_12') == '' ? null : safe_post('rr_opst_12'),
			's_opst_12'                   	=> safe_post('s_opst_12') == '' ? null : safe_post('s_opst_12'),
			'sp02_opst_12'                  	=> safe_post('sp02_opst_12') == '' ? null : safe_post('sp02_opst_12'),
			'oksigen_opst_12'                => safe_post('oksigen_opst_12') == '' ? null : safe_post('oksigen_opst_12'),
			'tindakan_opst_12'               => safe_post('tindakan_opst_12') == '' ? null : safe_post('tindakan_opst_12'),
			'evaluasi_opst_12'               => safe_post('evaluasi_opst_12') == '' ? null : safe_post('evaluasi_opst_12'),
			'petugas_opst_12'                => safe_post('petugas_opst_12') == '' ? null : safe_post('petugas_opst_12'),
			
			'tgl_opst_13'      				=> (safe_post('tgl_opst_13') !== '' ? datetime2mysql(safe_post('tgl_opst_13')) : NULL),
			'keadaan_opst_13'                => safe_post('keadaan_opst_13') == '' ? null : safe_post('keadaan_opst_13'),
			'td_opst_13'                   	=> safe_post('td_opst_13') == '' ? null : safe_post('td_opst_13'),
			'n_opst_13'                   	=> safe_post('n_opst_13') == '' ? null : safe_post('n_opst_13'),
			'rr_opst_13'                   	=> safe_post('rr_opst_13') == '' ? null : safe_post('rr_opst_13'),
			's_opst_13'                   	=> safe_post('s_opst_13') == '' ? null : safe_post('s_opst_13'),
			'sp02_opst_13'                  	=> safe_post('sp02_opst_13') == '' ? null : safe_post('sp02_opst_13'),
			'oksigen_opst_13'                => safe_post('oksigen_opst_13') == '' ? null : safe_post('oksigen_opst_13'),
			'tindakan_opst_13'               => safe_post('tindakan_opst_13') == '' ? null : safe_post('tindakan_opst_13'),
			'evaluasi_opst_13'               => safe_post('evaluasi_opst_13') == '' ? null : safe_post('evaluasi_opst_13'),
			'petugas_opst_13'                => safe_post('petugas_opst_13') == '' ? null : safe_post('petugas_opst_13'),
			
			'tgl_opst_14'      				=> (safe_post('tgl_opst_14') !== '' ? datetime2mysql(safe_post('tgl_opst_14')) : NULL),
			'keadaan_opst_14'                => safe_post('keadaan_opst_14') == '' ? null : safe_post('keadaan_opst_14'),
			'td_opst_14'                   	=> safe_post('td_opst_14') == '' ? null : safe_post('td_opst_14'),
			'n_opst_14'                   	=> safe_post('n_opst_14') == '' ? null : safe_post('n_opst_14'),
			'rr_opst_14'                   	=> safe_post('rr_opst_14') == '' ? null : safe_post('rr_opst_14'),
			's_opst_14'                   	=> safe_post('s_opst_14') == '' ? null : safe_post('s_opst_14'),
			'sp02_opst_14'                  	=> safe_post('sp02_opst_14') == '' ? null : safe_post('sp02_opst_14'),
			'oksigen_opst_14'                => safe_post('oksigen_opst_14') == '' ? null : safe_post('oksigen_opst_14'),
			'tindakan_opst_14'               => safe_post('tindakan_opst_14') == '' ? null : safe_post('tindakan_opst_14'),
			'evaluasi_opst_14'               => safe_post('evaluasi_opst_14') == '' ? null : safe_post('evaluasi_opst_14'),
			'petugas_opst_14'                => safe_post('petugas_opst_14') == '' ? null : safe_post('petugas_opst_14'),
			
			'tgl_opst_15'      				=> (safe_post('tgl_opst_15') !== '' ? datetime2mysql(safe_post('tgl_opst_15')) : NULL),
			'keadaan_opst_15'                => safe_post('keadaan_opst_15') == '' ? null : safe_post('keadaan_opst_15'),
			'td_opst_15'                   	=> safe_post('td_opst_15') == '' ? null : safe_post('td_opst_15'),
			'n_opst_15'                   	=> safe_post('n_opst_15') == '' ? null : safe_post('n_opst_15'),
			'rr_opst_15'                   	=> safe_post('rr_opst_15') == '' ? null : safe_post('rr_opst_15'),
			's_opst_15'                   	=> safe_post('s_opst_15') == '' ? null : safe_post('s_opst_15'),
			'sp02_opst_15'                  	=> safe_post('sp02_opst_15') == '' ? null : safe_post('sp02_opst_15'),
			'oksigen_opst_15'                => safe_post('oksigen_opst_15') == '' ? null : safe_post('oksigen_opst_15'),
			'tindakan_opst_15'               => safe_post('tindakan_opst_15') == '' ? null : safe_post('tindakan_opst_15'),
			'evaluasi_opst_15'               => safe_post('evaluasi_opst_15') == '' ? null : safe_post('evaluasi_opst_15'),
			'petugas_opst_15'                => safe_post('petugas_opst_15') == '' ? null : safe_post('petugas_opst_15'),
			
			'tanggal_opst'      			=> (safe_post('tanggal_opst') !== '' ? datetime2mysql(safe_post('tanggal_opst')) : NULL),
			'pasien_opst'                   => safe_post('pasien_opst') == '' ? null : safe_post('pasien_opst'),
			'petugas_menerima'              => safe_post('petugas_menerima') == '' ? null : safe_post('petugas_menerima'),
			'petugas_melakukan'             => safe_post('petugas_melakukan') == '' ? null : safe_post('petugas_melakukan'),
			'updated_on'             => $this->datetime,
		);
	
		if ($checkData == null) {
			// Data baru → INSERT ke sm_form_tpers
			$data['id_user']                = $this->session->userdata('id_translucent');
			$data['id_pendaftaran']        = safe_post('id_pendaftaran') == '' ? null : safe_post('id_pendaftaran');
			$data['id_layanan_pendaftaran'] = safe_post('id_layanan_pendaftaran') == '' ? null : safe_post('id_layanan_pendaftaran');
			$data['created_at']            = $this->datetime;
	
			$this->db->insert('sm_form_tpers', $data);
	
		} else {
			// Data sudah ada → UPDATE ke sm_form_tpers
			$this->db->where('id_layanan_pendaftaran', safe_post('id_layanan_pendaftaran'));
			$this->db->update('sm_form_tpers', $data);
	
			// Tambahkan juga log ke sm_form_tpers_logs
			$data_log = $data;
			$data_log['id_layanan_pendaftaran'] = safe_post('id_layanan_pendaftaran');
			$data_log['id_user'] = $this->session->userdata('id_translucent');
			$data_log['created_at'] = $this->datetime;
			$this->db->insert('sm_form_tpers_logs', $data_log);
		}
	
		if ($this->db->trans_status() === false) {
			$this->db->trans_rollback();
			$status  = false;
			$message = 'Gagal simpan form cetak observasi pasien saat transfer';
		} else {
			$this->db->trans_commit();
			$status  = true;
			$message = 'Berhasil simpan form cetak observasi pasien saat transfer';
		}
	
		$this->response(array('status' => $status, 'message' => $message), REST_Controller::HTTP_OK);
	}
	







	// DOA_D_O_A
	public function form_doa_get(){
		$data['data'] = $this->klinik->getSuratKeteranganDOA($this->get('id'));
		$layananPendaftaran = $this->db->where('id', $this->get('id'))->get('sm_layanan_pendaftaran')->row();
		$data['pendaftaran']  = $this->m_pendaftaran->getPendaftaranDetail($layananPendaftaran->id_pendaftaran);
		$data['penanggung_jawab'] = $this->penanggung_jawab($this->get('id'));
		$this->response($data, REST_Controller::HTTP_OK);
	}

	// DOA_D_O_A
	function simpan_cetak_form_doa_post(){
		$checkData = $this->klinik->getSuratKeteranganDOA(safe_post('id_layanan_pendaftaran'));
		$this->db->trans_begin();
		if ($checkData == null) {
			$data = array(
				'id_user'                	=> $this->session->userdata('id_translucent'),
				'id_layanan_pendaftaran' 	=> safe_post('id_layanan_pendaftaran') == '' ? null : safe_post('id_layanan_pendaftaran'),
				'tanggal_doa'      			=> safe_post('tanggal_doa') == '' ? null : safe_post('tanggal_doa'),
				'pukul_doa'         		=> safe_post('pukul_doa') == '' ? null : safe_post('pukul_doa'),
				'tanggal_surat_doa'      	=> safe_post('tanggal_surat_doa') == '' ? null : safe_post('tanggal_surat_doa'),
				'dokter_doa'      			=> safe_post('dokter_doa') == '' ? null : safe_post('dokter_doa'),
				'updated_at'             		=> $this->datetime,
				'created_at' 					=> $this->datetime,
			);
			$this->db->insert('sm_form_doa', $data);	
		} else {
			$data = array(
				'tanggal_doa'      			=> safe_post('tanggal_doa') == '' ? null : safe_post('tanggal_doa'),
				'pukul_doa'         		=> safe_post('pukul_doa') == '' ? null : safe_post('pukul_doa'),
				'tanggal_surat_doa'      	=> safe_post('tanggal_surat_doa') == '' ? null : safe_post('tanggal_surat_doa'),
				'dokter_doa'      			=> safe_post('dokter_doa') == '' ? null : safe_post('dokter_doa'),
				'updated_at'             		=> $this->datetime,
				// 'updated_on'                   => $this->datetime,
			);
			$this->db->where('id_layanan_pendaftaran', safe_post('id_layanan_pendaftaran'));			
			$this->db->update('sm_form_doa', $data);
		}
		// var_dump($data);die;
		if ($this->db->trans_status() === FALSE) :
			$this->db->trans_rollback();
			$status  = FALSE;
			$message = 'Gagal simpan form surat keterangan DOA';
		else :
			$this->db->trans_commit();
			$status  = TRUE;
			$message = 'Berhasil simpan form surat keterangan DOA';
		endif;
		$this->response(array('status' => $status, 'message' => $message), REST_Controller::HTTP_OK);
	}

	// ICPMK
	public function get_form_informed_consent_pmk_get(){
		$data['data'] = $this->klinik->getSuratInformedConsentPMK($this->get('id'));
		$layananPendaftaran = $this->db->where('id', $this->get('id'))->get('sm_layanan_pendaftaran')->row();
		$data['pendaftaran']  = $this->m_pendaftaran->getPendaftaranDetail($layananPendaftaran->id_pendaftaran);
		$data['penanggung_jawab'] = $this->penanggung_jawab($this->get('id'));
		$this->response($data, REST_Controller::HTTP_OK);
	}

	// ICPMK
	function simpan_cetak_form_icpmk_post(){
		$checkData = $this->klinik->getSuratInformedConsentPMK(safe_post('id_layanan_pendaftaran'));
		$this->db->trans_begin();
		if ($checkData == null) {
			$data = array(
				'id_user'                	=> $this->session->userdata('id_translucent'),
				'id_layanan_pendaftaran' 	=> safe_post('id_layanan_pendaftaran') == '' ? null : safe_post('id_layanan_pendaftaran'),
				'nama_ort_icpmk'      		=> safe_post('nama_ort_icpmk') == '' ? null : safe_post('nama_ort_icpmk'),
				'alamat_icpmk'         		=> safe_post('alamat_icpmk') == '' ? null : safe_post('alamat_icpmk'),
				'hubungan_ayah_icpmk'      	=> safe_post('hubungan_ayah_icpmk') == '' ? null : safe_post('hubungan_ayah_icpmk'),
				'hubungan_ibu_icpmk'      	=> safe_post('hubungan_ibu_icpmk') == '' ? null : safe_post('hubungan_ibu_icpmk'),
				'hubungan_nenek_icpmk'      => safe_post('hubungan_nenek_icpmk') == '' ? null : safe_post('hubungan_nenek_icpmk'),
				'hubungan_kakek_icpmk'      => safe_post('hubungan_kakek_icpmk') == '' ? null : safe_post('hubungan_kakek_icpmk'),
				'hubungan_lainya_icpmk'     => safe_post('hubungan_lainya_icpmk') == '' ? null : safe_post('hubungan_lainya_icpmk'),
				'nama_by_icpmk'      		=> safe_post('nama_by_icpmk') == '' ? null : safe_post('nama_by_icpmk'),
				'usia_by_icpmk'      		=> safe_post('usia_by_icpmk') == '' ? null : safe_post('usia_by_icpmk'),
				'tanggal_icpmk'      		=> safe_post('tanggal_icpmk') == '' ? null : safe_post('tanggal_icpmk'),
				'dokter_icpmk'      		=> safe_post('dokter_icpmk') == '' ? null : safe_post('dokter_icpmk'),
				'perawat_1_icpmk'      		=> safe_post('perawat_1_icpmk') == '' ? null : safe_post('perawat_1_icpmk'),
				'perawat_2_icpmk'      		=> safe_post('perawat_2_icpmk') == '' ? null : safe_post('perawat_2_icpmk'),
				'updated_at'             	=> $this->datetime,
				'created_at' 				=> $this->datetime,
			);
			$this->db->insert('sm_form_informed_consent_pmk', $data);	
		} else {
			$data = array(
				'nama_ort_icpmk'      		=> safe_post('nama_ort_icpmk') == '' ? null : safe_post('nama_ort_icpmk'),
				'alamat_icpmk'         		=> safe_post('alamat_icpmk') == '' ? null : safe_post('alamat_icpmk'),
				'hubungan_ayah_icpmk'      	=> safe_post('hubungan_ayah_icpmk') == '' ? null : safe_post('hubungan_ayah_icpmk'),
				'hubungan_ibu_icpmk'      	=> safe_post('hubungan_ibu_icpmk') == '' ? null : safe_post('hubungan_ibu_icpmk'),
				'hubungan_nenek_icpmk'      => safe_post('hubungan_nenek_icpmk') == '' ? null : safe_post('hubungan_nenek_icpmk'),
				'hubungan_kakek_icpmk'      => safe_post('hubungan_kakek_icpmk') == '' ? null : safe_post('hubungan_kakek_icpmk'),
				'hubungan_lainya_icpmk'     => safe_post('hubungan_lainya_icpmk') == '' ? null : safe_post('hubungan_lainya_icpmk'),
				'nama_by_icpmk'      		=> safe_post('nama_by_icpmk') == '' ? null : safe_post('nama_by_icpmk'),
				'usia_by_icpmk'      		=> safe_post('usia_by_icpmk') == '' ? null : safe_post('usia_by_icpmk'),
				'tanggal_icpmk'      		=> safe_post('tanggal_icpmk') == '' ? null : safe_post('tanggal_icpmk'),
				'dokter_icpmk'      		=> safe_post('dokter_icpmk') == '' ? null : safe_post('dokter_icpmk'),
				'perawat_1_icpmk'      		=> safe_post('perawat_1_icpmk') == '' ? null : safe_post('perawat_1_icpmk'),
				'perawat_2_icpmk'      		=> safe_post('perawat_2_icpmk') == '' ? null : safe_post('perawat_2_icpmk'),
				'updated_at'             	=> $this->datetime,
				// 'updated_on'             => $this->datetime,
			);
			$this->db->where('id_layanan_pendaftaran', safe_post('id_layanan_pendaftaran'));			
			$this->db->update('sm_form_informed_consent_pmk', $data);
		}
		// var_dump($data);die;
		if ($this->db->trans_status() === FALSE) :
			$this->db->trans_rollback();
			$status  = FALSE;
			$message = 'Gagal simpan form surat Informed Consent PMK';
		else :
			$this->db->trans_commit();
			$status  = TRUE;
			$message = 'Berhasil simpan form surat Informed Consent PMK';
		endif;
		$this->response(array('status' => $status, 'message' => $message), REST_Controller::HTTP_OK);
	}

	// SKKM
	public function get_surat_keterangan_kesediaan_membayar_get(){
		$data['data'] = $this->klinik->getSuratKeteranganKesediaanMembayar($this->get('id'));
		$layananPendaftaran = $this->db->where('id', $this->get('id'))->get('sm_layanan_pendaftaran')->row();
		$data['pendaftaran']  = $this->m_pendaftaran->getPendaftaranDetail($layananPendaftaran->id_pendaftaran);
		$data['penanggung_jawab'] = $this->penanggung_jawab($this->get('id'));
		$this->response($data, REST_Controller::HTTP_OK);
	}

	// SKKM
	function simpan_cetak_form_surat_keterangan_kesediaan_membayar_post(){
		$id_layanan_pendaftaran = safe_post('id_layanan_pendaftaran');
		$id_pendaftaran = safe_post('id_pendaftaran');
		$checkData = $this->klinik->getSuratKeteranganKesediaanMembayar($id_layanan_pendaftaran);
	
		// Dapatkan datetime saat ini
		$datetime_now = date('Y-m-d H:i:s');
	
		// Buat array data dengan updated_on dan created_at
		$data = array(
			'id_user'                	=> $this->session->userdata('id_translucent'),
			'id_layanan_pendaftaran' 	=> $id_layanan_pendaftaran ?: null,
			'id_pendaftaran' 		 	=> $id_pendaftaran ?: null,
			'suamiskkm'              	=> safe_post('suamiskkm') ?: null,
			'istriskkm'              	=> safe_post('istriskkm') ?: null,
			'ayahskkm'              	=> safe_post('ayahskkm') ?: null,
			'ibuskkm'      				=> safe_post('ibuskkm') ?: null,
			'waliskkm'      			=> safe_post('waliskkm') ?: null,
			'anakskkm'     				=> safe_post('anakskkm') ?: null,
			'penanggungjawabskkm'     	=> safe_post('penanggungjawabskkm') ?: null,
			'sebutkanskkm'            	=> safe_post('sebutkanskkm') ?: null,
			'tanggalskkm'         		=> safe_post('tanggalskkm') ?: null,
			'updated_on'             	=> $datetime_now, // Waktu saat ini untuk updated_on
		);
	
		$this->db->trans_begin();
	
		if ($checkData == null) {
			// Set created_at hanya saat insert data baru
			$data['created_at'] = $datetime_now; 
			$this->db->insert('sm_surat_pernyataan_kesediaan_membayar', $data);
		} else {
			// Hanya update tanpa mengubah created_at
			$this->db->where('id_layanan_pendaftaran', $id_layanan_pendaftaran)
						->update('sm_surat_pernyataan_kesediaan_membayar', $data);
		}
	
		if ($this->db->trans_status() === FALSE) {
			$this->db->trans_rollback();
			$status  = FALSE;
			$message = 'Gagal simpan form surat Keterangan Kesediaan Membayar';
		} else {
			$this->db->trans_commit();
			$status  = TRUE;
			$message = 'Berhasil simpan form surat Keterangan Kesediaan Membayar';
		}
	
		$this->response(array('status' => $status, 'message' => $message), REST_Controller::HTTP_OK);
	}

	// // SPPPMK
	// public function get_surat_pernyataan_persetujuan_pmk_get(){
	// 	$data['data'] = $this->klinik->getSuratPernyataanPersetujuanPenolakanMedisKhusus($this->get('id'));
	// 	$layananPendaftaran = $this->db->where('id', $this->get('id'))->get('sm_layanan_pendaftaran')->row();
	// 	$data['pendaftaran']  = $this->m_pendaftaran->getPendaftaranDetail($layananPendaftaran->id_pendaftaran);
	// 	$data['penanggung_jawab'] = $this->penanggung_jawab($this->get('id'));
	// 	$this->response($data, REST_Controller::HTTP_OK);
	// }

	// // SPPPMK
	// function simpan_cetak_form_surat_pernyataan_persetujuan_pmk_post(){
	// 	$id_layanan_pendaftaran = safe_post('id_layanan_pendaftaran');
	// 	$id_pendaftaran = safe_post('id_pendaftaran');
	// 	$checkData = $this->klinik->getSuratPernyataanPersetujuanPenolakanMedisKhusus($id_layanan_pendaftaran);
	
	// 	// Dapatkan datetime saat ini
	// 	$datetime_now = date('Y-m-d H:i:s');
	
	// 	// Buat array data dengan updated_on dan created_at
	// 	$data = array(
	// 		'id_user'                	=> $this->session->userdata('id_translucent'),
	// 		'id_layanan_pendaftaran' 	=> $id_layanan_pendaftaran ?: null, // Jika $id_layanan_pendaftaran ada nilainya, gunakan. Jika tidak, set ke null
	// 		'id_pendaftaran' 		 	=> $id_pendaftaran ?: null,
	// 		'sayasendirispppmk' 		=> safe_post('sayasendirispppmk') ?: null, // Ambil nilai dari safe_post('sayasendirispppmk'), jika ada, gunakan nilainya, kalau tidak, gunakan null
	// 		'sebagaiorangtuaspppmk'     => safe_post('sebagaiorangtuaspppmk') ?: null,
	// 		'keluargaspppmk'            => safe_post('keluargaspppmk') ?: null,
	// 		'walispppmk'            	=> safe_post('walispppmk') ?: null,
	// 		'darispppmk'            	=> safe_post('darispppmk') ?: null,
	// 		'setujuspppmk'      		=> safe_post('setujuspppmk') ?: null,
	// 		'menolakspppmk'      		=> safe_post('menolakspppmk') ?: null,
	// 		'pmitujuanspppmk'     		=> safe_post('pmitujuanspppmk') ?: null,
	// 		'dokterspppmk'     			=> safe_post('dokterspppmk') ?: null,
	// 		'tanggalspppmk'            	=> safe_post('tanggalspppmk') ?: null,
	// 		'updated_on'             	=> $datetime_now, // Waktu saat ini untuk updated_on
	// 	);
	
	// 	$this->db->trans_begin();
	
	// 	if ($checkData == null) {
	// 		// Set created_at hanya saat insert data baru
	// 		$data['created_at'] = $datetime_now; 
	// 		$this->db->insert('sm_surat_pernyataan_persetujuan_pmk', $data);
	// 	} else {
	// 		// Hanya update tanpa mengubah created_at
	// 		$this->db->where('id_layanan_pendaftaran', $id_layanan_pendaftaran)
	// 					->update('sm_surat_pernyataan_persetujuan_pmk', $data);
	// 	}
	
	// 	if ($this->db->trans_status() === FALSE) {
	// 		$this->db->trans_rollback();
	// 		$status  = FALSE;
	// 		$message = 'Gagal simpan form surat Pernyataan Persetujuan Penolakan Medis Khusus';
	// 	} else {
	// 		$this->db->trans_commit();
	// 		$status  = TRUE;
	// 		$message = 'Berhasil simpan form surat Pernyataan Persetujuan Penolakan Medis Khusus';
	// 	}
	
	// 	$this->response(array('status' => $status, 'message' => $message), REST_Controller::HTTP_OK);
	// }

	
	// SP_WE
	public function get_form_surat_pernyataan_get(){
		$data['data'] = $this->klinik->getSuratPernyataan($this->get('id'));
		$layananPendaftaran = $this->db->where('id', $this->get('id'))->get('sm_layanan_pendaftaran')->row();
		$data['pendaftaran']  = $this->m_pendaftaran->getPendaftaranDetail($layananPendaftaran->id_pendaftaran);
		$data['penanggung_jawab'] = $this->penanggung_jawab($this->get('id'));
		$this->response($data, REST_Controller::HTTP_OK);
	}

	// SP_WE
	function simpan_cetak_form_surat_pernyataan_post(){
		$checkData = $this->klinik->getSuratPernyataan(safe_post('id_layanan_pendaftaran'));
		$this->db->trans_begin();
		if ($checkData == null) {
			$data = array(
				'id_user'                	=> $this->session->userdata('id_translucent'),
				'id_layanan_pendaftaran' 	=> safe_post('id_layanan_pendaftaran') == '' ? null : safe_post('id_layanan_pendaftaran'),
				'nama_kel_sp'      		=> safe_post('nama_kel_sp') == '' ? null : safe_post('nama_kel_sp'),
				'umur_kel_sp'         	=> safe_post('umur_kel_sp') == '' ? null : safe_post('umur_kel_sp'),
				'jk_kel_sp'      		=> safe_post('jk_kel_sp') == '' ? null : safe_post('jk_kel_sp'),
				'alamat_kel_sp'      	=> safe_post('alamat_kel_sp') == '' ? null : safe_post('alamat_kel_sp'),
				'no_ktp_kel_sp'      	=> safe_post('no_ktp_kel_sp') == '' ? null : safe_post('no_ktp_kel_sp'),
				'saya_sendiri_kel_sp'   => safe_post('saya_sendiri_kel_sp') == '' ? null : safe_post('saya_sendiri_kel_sp'),
				'anak_kel_sp'     		=> safe_post('anak_kel_sp') == '' ? null : safe_post('anak_kel_sp'),
				'istri_kel_sp'      	=> safe_post('istri_kel_sp') == '' ? null : safe_post('istri_kel_sp'),
				'suami_kel_sp'      	=> safe_post('suami_kel_sp') == '' ? null : safe_post('suami_kel_sp'),
				'ayah_kel_sp'      		=> safe_post('ayah_kel_sp') == '' ? null : safe_post('ayah_kel_sp'),
				'ibu_kel_sp'      		=> safe_post('ibu_kel_sp') == '' ? null : safe_post('ibu_kel_sp'),
				'lainya_kel_sp'      	=> safe_post('lainya_kel_sp') == '' ? null : safe_post('lainya_kel_sp'),
				'mengajukan_sp'      	=> safe_post('mengajukan_sp') == '' ? null : safe_post('mengajukan_sp'),
				'menolak_sp'      		=> safe_post('menolak_sp') == '' ? null : safe_post('menolak_sp'),
				'dirawat_sp'      		=> safe_post('dirawat_sp') == '' ? null : safe_post('dirawat_sp'),
				'perawatan_sp'      	=> safe_post('perawatan_sp') == '' ? null : safe_post('perawatan_sp'),
				'perawatan_dgn_sp'     	=> safe_post('perawatan_dgn_sp') == '' ? null : safe_post('perawatan_dgn_sp'),
				'menolak_pp_sp'      	=> safe_post('menolak_pp_sp') == '' ? null : safe_post('menolak_pp_sp'),
				'lainya_sp'      		=> safe_post('lainya_sp') == '' ? null : safe_post('lainya_sp'),
				'dg_alasan_sp'      	=> safe_post('dg_alasan_sp') == '' ? null : safe_post('dg_alasan_sp'),
				'dg_alasan_sp_1'      	=> safe_post('dg_alasan_sp_1') == '' ? null : safe_post('dg_alasan_sp_1'),
				'tgl_sp'      			=> safe_post('tgl_sp') == '' ? null : safe_post('tgl_sp'),
				'saksi_1_sp'      		=> safe_post('saksi_1_sp') == '' ? null : safe_post('saksi_1_sp'),
				'saksi_2_sp'      		=> safe_post('saksi_2_sp') == '' ? null : safe_post('saksi_2_sp'),
				'dokter_sp'      		=> safe_post('dokter_sp') == '' ? null : safe_post('dokter_sp'),
				'updated_at'            => $this->datetime,
				'created_at' 			=> $this->datetime,
			);
			$this->db->insert('sm_form_surat_pernyataan_72_01', $data);	
		} else {
			$data = array(
				'nama_kel_sp'      		=> safe_post('nama_kel_sp') == '' ? null : safe_post('nama_kel_sp'),
				'umur_kel_sp'         	=> safe_post('umur_kel_sp') == '' ? null : safe_post('umur_kel_sp'),
				'jk_kel_sp'      		=> safe_post('jk_kel_sp') == '' ? null : safe_post('jk_kel_sp'),
				'alamat_kel_sp'      	=> safe_post('alamat_kel_sp') == '' ? null : safe_post('alamat_kel_sp'),
				'no_ktp_kel_sp'      	=> safe_post('no_ktp_kel_sp') == '' ? null : safe_post('no_ktp_kel_sp'),
				'saya_sendiri_kel_sp'   => safe_post('saya_sendiri_kel_sp') == '' ? null : safe_post('saya_sendiri_kel_sp'),
				'anak_kel_sp'     		=> safe_post('anak_kel_sp') == '' ? null : safe_post('anak_kel_sp'),
				'istri_kel_sp'      	=> safe_post('istri_kel_sp') == '' ? null : safe_post('istri_kel_sp'),
				'suami_kel_sp'      	=> safe_post('suami_kel_sp') == '' ? null : safe_post('suami_kel_sp'),
				'ayah_kel_sp'      		=> safe_post('ayah_kel_sp') == '' ? null : safe_post('ayah_kel_sp'),
				'ibu_kel_sp'      		=> safe_post('ibu_kel_sp') == '' ? null : safe_post('ibu_kel_sp'),
				'lainya_kel_sp'      	=> safe_post('lainya_kel_sp') == '' ? null : safe_post('lainya_kel_sp'),
				'mengajukan_sp'      	=> safe_post('mengajukan_sp') == '' ? null : safe_post('mengajukan_sp'),
				'menolak_sp'      		=> safe_post('menolak_sp') == '' ? null : safe_post('menolak_sp'),
				'dirawat_sp'      		=> safe_post('dirawat_sp') == '' ? null : safe_post('dirawat_sp'),
				'perawatan_sp'      	=> safe_post('perawatan_sp') == '' ? null : safe_post('perawatan_sp'),
				'perawatan_dgn_sp'     	=> safe_post('perawatan_dgn_sp') == '' ? null : safe_post('perawatan_dgn_sp'),
				'menolak_pp_sp'      	=> safe_post('menolak_pp_sp') == '' ? null : safe_post('menolak_pp_sp'),
				'lainya_sp'      		=> safe_post('lainya_sp') == '' ? null : safe_post('lainya_sp'),
				'dg_alasan_sp'      	=> safe_post('dg_alasan_sp') == '' ? null : safe_post('dg_alasan_sp'),
				'dg_alasan_sp_1'      	=> safe_post('dg_alasan_sp_1') == '' ? null : safe_post('dg_alasan_sp_1'),
				'tgl_sp'      			=> safe_post('tgl_sp') == '' ? null : safe_post('tgl_sp'),
				'saksi_1_sp'      		=> safe_post('saksi_1_sp') == '' ? null : safe_post('saksi_1_sp'),
				'saksi_2_sp'      		=> safe_post('saksi_2_sp') == '' ? null : safe_post('saksi_2_sp'),
				'dokter_sp'      		=> safe_post('dokter_sp') == '' ? null : safe_post('dokter_sp'),
				'updated_at'            => $this->datetime,
			);
			$this->db->where('id_layanan_pendaftaran', safe_post('id_layanan_pendaftaran'));			
			$this->db->update('sm_form_surat_pernyataan_72_01', $data);
		}
		// var_dump($data);die;
		if ($this->db->trans_status() === FALSE) :
			$this->db->trans_rollback();
			$status  = FALSE;
			$message = 'Gagal simpan form surat pernyataan';
		else :
			$this->db->trans_commit();
			$status  = TRUE;
			$message = 'Berhasil simpan form surat pernyataan';
		endif;
		$this->response(array('status' => $status, 'message' => $message), REST_Controller::HTTP_OK);
	}

	// TPI BARU
	public function get_data_travelling_patient_information_get(){
		$data = [];
		$data['data'] = $this->klinik->getTravellingPatientInformation($this->get('id'));
		$layananPendaftaran = $this->db->where('id', $this->get('id'))->get('sm_layanan_pendaftaran')->row();
		$data['pendaftaran']  = $this->m_pendaftaran->getPendaftaranDetail($layananPendaftaran->id_pendaftaran);
		if ($data != null) {
			$this->response($data[0], REST_Controller::HTTP_OK);
		} else {
			$this->response($data, REST_Controller::HTTP_OK);
		}
	}

	// TPI B
	function simpan_cetak_travelling_patient_information_post() {
		$idLayananPendaftaran = safe_post('id_layanan_pendaftaran');
		$checkData = $this->klinik->getTravellingPatientInformation($idLayananPendaftaran);
	
		$this->db->trans_begin();
	
		$data = array(
			'id_user' => $this->session->userdata('id_translucent'),
			'id_layanan_pendaftaran' => $idLayananPendaftaran ?: null,
			'dialysis' => safe_post('dialysis') ?: null,
			'duration' => safe_post('duration') ?: null,
			'dialisat' => safe_post('dialisat') ?: null,
			'dry_weight' => safe_post('dry_weight') ?: null,
			'acces_vascular' => safe_post('acces_vascular') ?: null,
			'average_weight' => safe_post('average_weight') ?: null,
			'average_blood_pre' => safe_post('average_blood_pre') ?: null,
			'average_blood_post' => safe_post('average_blood_post') ?: null,
			'dialyser_type' => safe_post('dialyser_type') ?: null,
			'blood_flow' => safe_post('blood_flow') ?: null,
			'heparinitation' => safe_post('heparinitation') ?: null,
			'loading_dose' => safe_post('loading_dose') ?: null,
			'maintenance_dose' => safe_post('maintenance_dose') ?: null,
			'blood_group' => safe_post('blood_group') ?: null,
			'blood_tranfusion' => safe_post('blood_tranfusion') ?: null,
			'date_of_laboratorium' => safe_post('date_of_laboratorium') ?: null,
			'hb_ereum_pre' => safe_post('hb_ereum_pre') ?: null,
			'hb_ureum_post' => safe_post('hb_ureum_post') ?: null,
			'cratine_pre' => safe_post('cratine_pre') ?: null,
			'kalium' => safe_post('kalium') ?: null,
			'phospor' => safe_post('phospor') ?: null,
			'hbsag' => safe_post('hbsag') ?: null,
			'anti_hcv' => safe_post('anti_hcv') ?: null,
			'anti_hiv' => safe_post('anti_hiv') ?: null,
			'problem_during' => safe_post('problem_during') ?: null,
			'tanggal_tpi' => safe_post('tanggal_tpi') ?: null,
			'nephrologist_consultant' => safe_post('nephrologist_consultant') ?: null,
			'nama_medication_1' => safe_post('nama_medication_1') ?: null,
			'nama_medication_2' => safe_post('nama_medication_2') ?: null,
			'nama_medication_3' => safe_post('nama_medication_3') ?: null,
			'nama_medication_4' => safe_post('nama_medication_4') ?: null,
			'nama_medication_5' => safe_post('nama_medication_5') ?: null,
			'nama_medication_6' => safe_post('nama_medication_6') ?: null,
			'nama_medication_7' => safe_post('nama_medication_7') ?: null,
			'nama_medication_8' => safe_post('nama_medication_8') ?: null,
			'nama_medication_9' => safe_post('nama_medication_9') ?: null,
			'nama_medication_10' => safe_post('nama_medication_10') ?: null,
			'nama_medication_11' => safe_post('nama_medication_11') ?: null,
			'nama_medication_12' => safe_post('nama_medication_12') ?: null,
			'nama_medication_13' => safe_post('nama_medication_13') ?: null,
			'nama_medication_14' => safe_post('nama_medication_14') ?: null,
			'nama_medication_15' => safe_post('nama_medication_15') ?: null,
			'dosis_1' => safe_post('dosis_1') ?: null,
			'dosis_2' => safe_post('dosis_2') ?: null,
			'dosis_3' => safe_post('dosis_3') ?: null,
			'dosis_4' => safe_post('dosis_4') ?: null,
			'dosis_5' => safe_post('dosis_5') ?: null,
			'dosis_6' => safe_post('dosis_6') ?: null,
			'dosis_7' => safe_post('dosis_7') ?: null,
			'dosis_8' => safe_post('dosis_8') ?: null,
			'dosis_9' => safe_post('dosis_9') ?: null,
			'dosis_10' => safe_post('dosis_10') ?: null,
			'dosis_11' => safe_post('dosis_11') ?: null,
			'dosis_12' => safe_post('dosis_12') ?: null,
			'dosis_13' => safe_post('dosis_13') ?: null,
			'dosis_14' => safe_post('dosis_14') ?: null,
			'dosis_15' => safe_post('dosis_15') ?: null,
			'updated_on' => date('Y-m-d H:i:s'),
		);
	
		if ($checkData == null) {
			$data['created_at'] = date('Y-m-d H:i:s');
			$this->db->insert('sm_travelling_patient_information', $data);
		} else {
			$this->db->where('id_layanan_pendaftaran', $idLayananPendaftaran);
			$this->db->update('sm_travelling_patient_information', $data);
		}
	
		if ($this->db->trans_status() === false) {
			$this->db->trans_rollback();
			$status = false;
			$message = 'Gagal simpan form surat Travelling Patient Information';
		} else {
			$this->db->trans_commit();
			$status = true;
			$message = 'Berhasil simpan form surat Travelling Patient Information';
		}
	
		$this->response(array('status' => $status, 'message' => $message), REST_Controller::HTTP_OK);
	}

}
