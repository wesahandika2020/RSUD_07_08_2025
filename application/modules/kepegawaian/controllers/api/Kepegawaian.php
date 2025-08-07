<?php
defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH.'/libraries/REST_Controller.php';
require APPPATH.'/libraries/Redis.php';

use Restserver\Libraries\REST_Controller;

class Kepegawaian extends REST_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->redis = new CI_Redis();

		$id_translucent = $this->session->userdata('id_translucent');
		if (empty($id_translucent)) :
			$this->response(array('error' => 'Anda belum login'), REST_Controller::HTTP_UNAUTHORIZED);
			exit();
		endif;

		$this->load->model('Kepegawaian_model', 'kepegawaian');
	}

	public function data_pegawai_get()
	{
		$payload = [
			'length' => $this->get('length', TRUE),
			'start'  => $this->get('start', TRUE),
			'search' => $this->get('search', TRUE),
			'order'  => $this->get('order', TRUE)
		];

		$data = $this->kepegawaian->get_data_pegawai($payload);

		if ( ! empty($data))
		{
			$payload = [
				'draw'            => $this->get('draw', TRUE),
				'recordsTotal'    => $data['count_all'],
				'recordsFiltered' => $data['count_filtered'],
				'data'            => $data['data'],
			];
		} else
		{
			$payload = ['data' => []];
		}

		$this->response($payload, self::HTTP_OK);
	}

	public function data_jabatan_get()
	{
		$payload = [
			'length' => $this->get('length', TRUE),
			'start'  => $this->get('start', TRUE),
			'search' => $this->get('search', TRUE),
			'order'  => $this->get('order', TRUE)
		];

		$data = $this->kepegawaian->get_data_jabatan($payload);

		if ( ! empty($data))
		{
			$payload = [
				'draw'            => $this->get('draw', TRUE),
				'recordsTotal'    => $data['count_all'],
				'recordsFiltered' => $data['count_filtered'],
				'data'            => $data['data'],
			];
		} else
		{
			$payload = ['data' => []];
		}

		$this->response($payload, self::HTTP_OK);
	}

	public function data_profesi_get()
	{
		$payload = [
			'length' => $this->get('length', TRUE),
			'start'  => $this->get('start', TRUE),
			'search' => $this->get('search', TRUE),
			'order'  => $this->get('order', TRUE)
		];

		$data = $this->kepegawaian->get_data_profesi($payload);

		if ( ! empty($data))
		{
			$payload = [
				'draw'            => $this->get('draw', TRUE),
				'recordsTotal'    => $data['count_all'],
				'recordsFiltered' => $data['count_filtered'],
				'data'            => $data['data'],
			];
		} else
		{
			$payload = ['data' => []];
		}

		$this->response($payload, self::HTTP_OK);
	}

	public function data_tenaga_medis_get()
	{
		$payload = [
			'length' => $this->get('length', TRUE),
			'start'  => $this->get('start', TRUE),
			'search' => $this->get('search', TRUE),
			'order'  => $this->get('order', TRUE)
		];

		$data = $this->kepegawaian->get_data_tenaga_medis($payload);

		if ( ! empty($data))
		{
			$payload = [
				'draw'            => $this->get('draw', TRUE),
				'recordsTotal'    => $data['count_all'],
				'recordsFiltered' => $data['count_filtered'],
				'data'            => $data['data'],
			];
		} else
		{
			$payload = ['data' => []];
		}

		$this->response($payload, self::HTTP_OK);
	}

	public function data_unit_kerja_get()
	{
		$payload = [
			'length' => $this->get('length', TRUE),
			'start'  => $this->get('start', TRUE),
			'search' => $this->get('search', TRUE),
			'order'  => $this->get('order', TRUE)
		];

		$data = $this->kepegawaian->get_data_unit_kerja($payload);

		if ( ! empty($data))
		{
			$payload = [
				'draw'            => $this->get('draw', TRUE),
				'recordsTotal'    => $data['count_all'],
				'recordsFiltered' => $data['count_filtered'],
				'data'            => $data['data'],
			];
		} else
		{
			$payload = ['data' => []];
		}

		$this->response($payload, self::HTTP_OK);
	}

	public function simpan_pegawai_post()
	{
		$config['upload_path']   = FCPATH.'/resources/images/avatars/';
		$config['allowed_types'] = 'jpg|png|jpeg';
		$config['max_size']      = 1024; //set max size allowed in Kilobyte
		$config['overwrite']     = TRUE;
		$config['encrypt_name']  = TRUE;

		$this->db->trans_begin();

		$pegawai = $this->kepegawaian->tambahPegawai($config);
		if (is_array($pegawai))
		{
			$this->response($pegawai, self::HTTP_BAD_REQUEST);

			return;
		}

		$kk_pegawai = $this->kepegawaian->tambahKartuKeluargaPegawai($config, $pegawai);
		if (is_array($kk_pegawai))
		{
			$this->response($kk_pegawai, self::HTTP_BAD_REQUEST);

			return;
		}

		$jabatan_pegawai = $this->kepegawaian->tambahJabatanPegawai($config, $pegawai);
		if (is_array($jabatan_pegawai))
		{
			$this->response($jabatan_pegawai, self::HTTP_BAD_REQUEST);

			return;
		}

		$pangkat_pegawai = $this->kepegawaian->tambahPangkatPegawai($config, $pegawai);
		if (is_array($pangkat_pegawai))
		{
			$this->response($pangkat_pegawai, self::HTTP_BAD_REQUEST);

			return;
		}

		if ($this->db->trans_status() === FALSE)
		{
			$this->db->trans_rollback();
			$response  = [
				'status'  => FALSE,
				'message' => 'Gagal menambah pegawai baru',
			];
			$http_code = self::HTTP_BAD_REQUEST;
		} else
		{
			$this->db->trans_commit();
			$response  = [
				'status'  => TRUE,
				'message' => 'Sukses menambah pegawai baru',
			];
			$http_code = self::HTTP_OK;
		}

		$this->response($response, $http_code);
	}

	public function update_pegawai_post()
	{
		$config['upload_path']   = FCPATH.'/resources/images/avatars/';
		$config['allowed_types'] = 'jpg|png|jpeg';
		$config['max_size']      = 1024; //set max size allowed in Kilobyte
		$config['overwrite']     = TRUE;
		$config['encrypt_name']  = TRUE;

		$this->db->trans_begin();

		$pegawai = $this->kepegawaian->updatePegawai($config);
		if (is_array($pegawai))
		{
			$this->response($pegawai, self::HTTP_BAD_REQUEST);

			return;
		}

		$kk_pegawai = $this->kepegawaian->updateKartuKeluargaPegawai($config);
		if (is_array($kk_pegawai))
		{
			$this->response($kk_pegawai, self::HTTP_BAD_REQUEST);

			return;
		}

		$pangkat_pegawai = $this->kepegawaian->updatePangkatPegawai($config);
		if (is_array($pangkat_pegawai))
		{
			$this->response($pangkat_pegawai, self::HTTP_BAD_REQUEST);

			return;
		}

		$jabatan_pegawai = $this->kepegawaian->updateJabatanPegawai($config, $pegawai);
		if (is_array($jabatan_pegawai))
		{
			$this->response($jabatan_pegawai, self::HTTP_BAD_REQUEST);

			return;
		}

		if ($this->db->trans_status() === FALSE)
		{
			$this->db->trans_rollback();
			$response  = [
				'status'  => FALSE,
				'message' => 'Gagal mengupdate pegawai',
			];
			$http_code = self::HTTP_BAD_REQUEST;
		} else
		{
			$this->db->trans_commit();
			$response  = [
				'status'  => TRUE,
				'message' => 'Sukses mengupdate pegawai',
			];
			$http_code = self::HTTP_OK;
		}

		$this->response($response, $http_code);
	}

	public function delete_pegawai_post()
	{
		$id_pegawai = safe_post('id');
		if ( ! $this->db->where('id', $id_pegawai)->delete('sm_pegawai'))
		{
			$message = [
				'status'  => FALSE,
				'message' => 'Gagal menghapus pegawai'
			];

			$this->response($message, self::HTTP_BAD_REQUEST);
		}

		$message = [
			'status'  => TRUE,
			'message' => 'Berhasil menghapus pegawai'
		];

		$this->response($message, self::HTTP_OK);
	}

	public function simpan_jabatan_post()
	{
		$this->form_validation->set_rules('nama_jabatan', 'Nama jabatan', 'required');

		if ($this->form_validation->run() !== TRUE)
		{
			$this->response(['status' => FALSE], self::HTTP_BAD_REQUEST);

			return;
		}

		$this->db->insert('sm_jabatan', ['nama' => safe_post('nama_jabatan')]);

		$this->response(['status' => TRUE, 'message' => 'Sukses menambah jabatan baru'], self::HTTP_OK);
	}

	public function update_jabatan_post()
	{
		$id = safe_post('id');
		$this->form_validation->set_rules('id', 'ID jabatan', 'required');
		$this->form_validation->set_rules('nama_jabatan', 'Nama jabatan', 'required');

		if ($this->form_validation->run() !== TRUE)
		{
			$this->response(['status' => FALSE], self::HTTP_BAD_REQUEST);

			return;
		}

		$this->db->where('id', $id)->update('sm_jabatan', ['nama' => safe_post('nama_jabatan')]);

		$this->response(['status' => TRUE, 'message' => 'Sukses menambah jabatan baru'], self::HTTP_OK);
	}

	public function delete_jabatan_post()
	{
		$id_pegawai = safe_post('id');
		if ( ! $this->db->where('id', $id_pegawai)->delete('sm_jabatan'))
		{
			$message = [
				'status'  => FALSE,
				'message' => 'Gagal menghapus pegawai'
			];

			$this->response($message, self::HTTP_BAD_REQUEST);
		}

		$message = [
			'status'  => TRUE,
			'message' => 'Berhasil menghapus pegawai'
		];

		$this->response($message, self::HTTP_OK);
	}

	public function simpan_profesi_post()
	{
		$this->form_validation->set_rules('nama_profesi', 'Nama profesi', 'required');

		if ($this->form_validation->run() !== TRUE)
		{
			$this->response(['status' => FALSE], self::HTTP_BAD_REQUEST);

			return;
		}

		$this->db->insert('sm_profesi', ['nama' => safe_post('nama_profesi')]);

		$this->response(['status' => TRUE, 'message' => 'Sukses menambah profesi baru'], self::HTTP_OK);
	}

	public function update_profesi_post()
	{
		$id = safe_post('id');
		$this->form_validation->set_rules('id', 'ID Profesi', 'required');
		$this->form_validation->set_rules('nama_profesi', 'Nama profesi', 'required');

		if ($this->form_validation->run() !== TRUE)
		{
			$this->response(['status' => FALSE], self::HTTP_BAD_REQUEST);

			return;
		}

		$this->db->where('id', $id)->update('sm_profesi', ['nama' => safe_post('nama_profesi')]);

		$this->response(['status' => TRUE, 'message' => 'Sukses mengubah profesi'], self::HTTP_OK);
	}

	public function delete_profesi_post()
	{
		$id = safe_post('id');
		if ( ! $this->db->where('id', $id)->delete('sm_profesi'))
		{
			$message = [
				'status'  => FALSE,
				'message' => 'Gagal menghapus profesi'
			];

			$this->response($message, self::HTTP_BAD_REQUEST);
		}

		$message = [
			'status'  => TRUE,
			'message' => 'Berhasil menghapus profesi'
		];

		$this->response($message, self::HTTP_OK);
	}

	public function simpan_nadis_post()
	{
		$this->form_validation->set_rules('id_pegawai', 'Nama pegawai', 'required');
		$this->form_validation->set_rules('id_profesi', 'Nama profesi', 'required');
		$this->form_validation->set_rules('tgl_mulai_praktek', 'Nama jabatan', 'required');

		if ($this->form_validation->run() !== TRUE)
		{
			$this->response(['status' => FALSE], self::HTTP_BAD_REQUEST);

			return;
		}

		$data_nadis = [
			'id_pegawai'        => safe_post('id_pegawai'),
			'id_profesi_real'   => safe_post('id_profesi'),
			'id_spesialisasi'   => safe_post('id_spesialisasi') !== '' ? safe_post('id_spesialisasi') : NULL,
			'tgl_mulai_praktek' => safe_post('tgl_mulai_praktek'),
			'kode_bpjs'         => safe_post('kode_bpjs') !== '' ? safe_post('kode_bpjs') : NULL,
			'no_str'            => safe_post('no_str') !== '' ? safe_post('no_str') : NULL,
			'ed_no_str'         => safe_post('masb_nostr') !== '' ? safe_post('masb_nostr') : NULL,
			'no_sip'            => safe_post('no_sip') !== '' ? safe_post('no_sip') : NULL,
			'ed_no_sip'         => safe_post('masb_nosip') !== '' ? safe_post('masb_nosip') : NULL,
			'no_sik'            => safe_post('no_sik') !== '' ? safe_post('no_sik') : NULL,
			'ed_no_sik'         => safe_post('masb_nosik') !== '' ? safe_post('masb_nosik') : NULL,
		];

		$this->db->insert('sm_tenaga_medis', $data_nadis);

		$this->response(['status' => TRUE, 'message' => 'Sukses menambah Tenaga Mendis Baru'], self::HTTP_OK);
	}

	public function update_nadis_post()
	{
		$id = safe_post('id');

		$this->form_validation->set_rules('id_pegawai', 'Nama pegawai', 'required');
		$this->form_validation->set_rules('id_profesi', 'Nama profesi', 'required');
		$this->form_validation->set_rules('tgl_mulai_praktek', 'Nama jabatan', 'required');

		if ($this->form_validation->run() !== TRUE)
		{
			$this->response(['status' => FALSE], self::HTTP_BAD_REQUEST);

			return;
		}

		$data_nadis = [
			'id_pegawai'        => safe_post('id_pegawai'),
			'id_profesi_real'   => safe_post('id_profesi'),
			'id_spesialisasi'   => safe_post('id_spesialisasi') !== '' ? safe_post('id_spesialisasi') : NULL,
			'tgl_mulai_praktek' => safe_post('tgl_mulai_praktek'),
			'kode_bpjs'         => safe_post('kode_bpjs') !== '' ? safe_post('kode_bpjs') : NULL,
			'no_str'            => safe_post('no_str') !== '' ? safe_post('no_str') : NULL,
			'ed_no_str'         => safe_post('masb_nostr') !== '' ? safe_post('masb_nostr') : NULL,
			'no_sip'            => safe_post('no_sip') !== '' ? safe_post('no_sip') : NULL,
			'ed_no_sip'         => safe_post('masb_nosip') !== '' ? safe_post('masb_nosip') : NULL,
			'no_sik'            => safe_post('no_sik') !== '' ? safe_post('no_sik') : NULL,
			'ed_no_sik'         => safe_post('masb_nosik') !== '' ? safe_post('masb_nosik') : NULL,
		];

		$this->db->where('id', $id)->update('sm_tenaga_medis', $data_nadis);

		$this->response(['status' => TRUE, 'message' => 'Sukses mengupdate Tenaga Medis'], self::HTTP_OK);
	}

	public function delete_nadis_post()
	{
		$id = safe_post('id');
		if ( ! $this->db->where('id', $id)->delete('sm_tenaga_medis'))
		{
			$message = [
				'status'  => FALSE,
				'message' => 'Gagal menghapus tenaga medis'
			];

			$this->response($message, self::HTTP_BAD_REQUEST);
		}

		$message = [
			'status'  => TRUE,
			'message' => 'Berhasil menghapus tenaga medis'
		];

		$this->response($message, self::HTTP_OK);
	}

	public function delete_susunan_keluarga_post()
	{
		$id = safe_post('id');
		if ( ! $this->db->where('id', $id)->delete('sm_kk_pegawai_detail'))
		{
			$message = [
				'status'  => FALSE,
				'message' => 'Gagal menghapus daftar keluarga'
			];

			$this->response($message, self::HTTP_BAD_REQUEST);
		}

		$message = [
			'status'  => TRUE,
			'message' => 'Berhasil menghapus daftar keluarga'
		];

		$this->response($message, self::HTTP_OK);
	}

	public function unit_kerja_auto_get()
	{
		$q     = safe_get('q');
		$page  = safe_get('page');
		$start = $this->start($page);
		$key   = 'unit_kerja_auto_'.$q.'_'.$page;
		if ( ! $this->redis->get($key))
		{
			$data = $this->kepegawaian->getAutoUnitKerja($q, $start, 20);
			$this->redis->setex($key, 84600, json_encode($data));
			$this->response($data, REST_Controller::HTTP_OK);
		} else
		{
			exit($this->redis->get($key));
		}
	}

	private function start($page)
	{
		return (($page - 1) * 20);
	}

	public function eselon_auto_get()
	{
		$q     = safe_get('q');
		$page  = safe_get('page');
		$start = $this->start($page);
		$key   = 'eselon_auto_'.$q.'_'.$page;
		if ( ! $this->redis->get($key))
		{
			$data = $this->kepegawaian->getAutoEselon($q, $start, 20);
			$this->redis->setex($key, 84600, json_encode($data));
			$this->response($data, REST_Controller::HTTP_OK);
		} else
		{
			exit($this->redis->get($key));
		}
	}

	public function pangkat_auto_get()
	{
		$q     = safe_get('q');
		$page  = safe_get('page');
		$start = $this->start($page);
		$key   = 'pangkat_auto_'.$q.'_'.$page;
		if ( ! $this->redis->get($key))
		{
			$data = $this->kepegawaian->getAutoPangkat($q, $start, 20);
			$this->redis->setex($key, 84600, json_encode($data));
			$this->response($data, REST_Controller::HTTP_OK);
		} else
		{
			exit($this->redis->get($key));
		}
	}

	public function delete_riwayat_jabatan_pegawai_post()
	{
		$id              = safe_post('id');
		$riwayat_jabatan = $this->db->get_where('sm_riwayat_jabatan_pegawai', ['id' => $id])->row();
		if ($riwayat_jabatan->fc_sk)
		{
			unlink(FCPATH.'/resources/images/avatars/'.$riwayat_jabatan->fc_sk);
		}

		if ( ! $this->db->where('id', $id)->delete('sm_riwayat_jabatan_pegawai'))
		{
			$message = [
				'status'  => FALSE,
				'message' => 'Gagal menghapus riwayat jabatan pegawai'
			];

			$this->response($message, self::HTTP_BAD_REQUEST);
		}

		$message = [
			'status'  => TRUE,
			'message' => 'Berhasil menghapus riwayat jabatan pegawai'
		];

		$this->response($message, self::HTTP_OK);
	}

	public function update_susunan_keluarga_post()
	{
		$id = safe_post('id_kk_detail');
		if (empty($id))
		{
			$this->response(['status' => FALSE, 'message' => 'Parameter tidak lengkap. Silahkan hubungi pihak IT'], self::HTTP_BAD_REQUEST);

			return;
		}

		if (safe_post('jenis_pekerjaan_keluarga_lainnya') !== '')
		{
			$jenis_pekerjaan = safe_post('jenis_pekerjaan_keluarga_lainnya');
		} else
		{
			$jenis_pekerjaan = safe_post('jenis_pekerjaan_keluarga') !== NULL ? safe_post('jenis_pekerjaan_keluarga') : NULL;
		}

		$data_update = [
			'nama_lengkap'    => safe_post('nama_lengkap') !== NULL ? safe_post('nama_lengkap') : NULL,
			'nik'             => safe_post('nik_keluarga') !== NULL ? safe_post('nik_keluarga') : NULL,
			'jenis_kelamin'   => safe_post('jenis_kelamin_keluarga') !== NULL ? safe_post('jenis_kelamin_keluarga') : NULL,
			'tempat_lahir'    => safe_post('tempat_lahir_keluarga') !== NULL ? safe_post('tempat_lahir_keluarga') : NULL,
			'tgl_lahir'       => safe_post('tgl_lahir_keluarga') !== NULL ? safe_post('tgl_lahir_keluarga') : NULL,
			'pendidikan'      => safe_post('pendidikan_keluarga') !== NULL ? safe_post('pendidikan_keluarga') : NULL,
			'jenis_pekerjaan' => $jenis_pekerjaan,
		];

		$this->db->where('id', $id)->update('sm_kk_pegawai_detail', $data_update);

		$this->response(['status' => TRUE, 'message' => 'Berhasil mengupdate daftar keluarga', 'data' => ['id_pegawai' => safe_post('id_pegawai')]], self::HTTP_OK);
	}

	public function update_riwayat_jabatan_pegawai_post()
	{
		$id = safe_post('id_riwayat_jabatan');
		if (empty($id))
		{
			$this->response(['status' => FALSE, 'message' => 'Parameter tidak lengkap. Silahkan hubungi pihak IT'], self::HTTP_BAD_REQUEST);

			return;
		}

		$nama_foto_pegawai    = $_FILES['fc_sk_jabatan']['name'] ?? NULL;
		$data_foto_sk_jabatan = NULL;

		$config['upload_path']   = FCPATH.'/resources/images/avatars/';
		$config['allowed_types'] = 'jpg|png|jpeg';
		$config['max_size']      = 1024; //set max size allowed in Kilobyte
		$config['overwrite']     = TRUE;
		$config['encrypt_name']  = TRUE;

		if ( ! empty($nama_foto_pegawai))
		{
			$this->load->library('upload', $config);

			$riwayat_jabatan = $this->db->get_where('sm_riwayat_jabatan_pegawai', ['id' => $id])->row();
			if ($riwayat_jabatan->fc_sk)
			{
				unlink(FCPATH.'/resources/images/avatars/'.$riwayat_jabatan->fc_sk);
			}

			if ( ! $this->upload->do_upload('foto'))
			{
				$response = [
					'status'  => FALSE,
					'message' => $this->upload->display_errors()
				];
				$this->response($response, self::HTTP_BAD_REQUEST);

				return;
			}

			$data_foto_sk_jabatan = $this->upload->data();
		}

		$daftar_tambah_jabatan = [
			'tmt'              => safe_post('tmt_jabatan') !== '' ? safe_post('tmt_jabatan') : NULL,
			'id_unit_kerja'    => safe_post('unit_kerja') !== '' ? safe_post('unit_kerja') : NULL,
			'no_sk'            => safe_post('no_sk_jabatan') !== '' ? safe_post('no_sk_jabatan') : NULL,
			'tgl_sk'           => safe_post('tgl_sk_jabatan') !== '' ? safe_post('tgl_sk_jabatan') : NULL,
			'penandatangan_sk' => safe_post('pendandatangan_sk_jabatan') !== '' ? safe_post('pendandatangan_sk_jabatan') : NULL,
			'jenis_jabatan'    => safe_post('jenis_jabatan_jabatan') !== '' ? safe_post('jenis_jabatan_jabatan') : NULL,
			'jabatan'          => safe_post('jabatan_jabatan') !== '' ? safe_post('jabatan_jabatan') : NULL,
			'jenjang'          => safe_post('jenjang_jabatan_jabatan') !== '' ? safe_post('jenjang_jabatan_jabatan') : NULL,
			'tugas_tambahan'   => safe_post('tugas_tambahan_jabatan') !== '' ? safe_post('tugas_tambahan_jabatan') : NULL,
		];

		if ($data_foto_sk_jabatan)
		{
			$daftar_tambah_jabatan['fc_sk'] = $data_foto_sk_jabatan ? $data_foto_sk_jabatan['file_name'] : NULL;
		}

		$this->db->where('id', $id)->update('sm_riwayat_jabatan_pegawai', $daftar_tambah_jabatan);

		$this->response(['status' => TRUE, 'message' => 'Berhasil mengupdate daftar keluarga', 'data' => ['id_pegawai' => safe_post('id_pegawai')]], self::HTTP_OK);
	}

	public function data_kepegawaian_dashboard_get()
	{
		$waktu           = $this->get('waktu', TRUE);
		$data_jabatan    = $this->kepegawaian->dataJabatan($waktu);
		$data_unit_kerja = $this->kepegawaian->dataUnitKerja($waktu);
		$data_usia       = $this->kepegawaian->dataUsia($waktu);
		$data_pangkat    = $this->kepegawaian->dataPangkat($waktu);

		$this->response([
			'data_jabatan'    => $data_jabatan,
			'data_unit_kerja' => $data_unit_kerja,
			'data_usia'       => $data_usia,
			'data_pangkat'    => $data_pangkat
		]);
	}

	public function simpan_unit_kerja_post()
	{
		$unit_parent = safe_post('unit_parent');

		if ($unit_parent !== '')
		{
			// generate child
			$kode      = $this->kepegawaian->getNextCode($unit_parent, 6);
			$id_parent = $unit_parent;
		} else
		{
			// generate parent
			$kode      = $this->kepegawaian->generateParentCode();
			$id_parent = NULL;
		}

		$data = [
			'kode'      => $kode,
			'upt'       => safe_post('nama_unit'),
			'nama'      => safe_post('keterangan') !== NULL ? safe_post('keterangan') : NULL,
			'eselon'    => safe_post('eselon_text') !== NULL ? safe_post('eselon_text') : NULL,
			'id_parent' => $id_parent,
		];

		$this->db->insert('sm_unit_kerja', $data);

		$this->response(['status' => TRUE, 'message' => 'Berhasil menambahkan unit kerja']);
	}

	public function delete_unit_kerja_post()
	{
		$id = safe_post('id');
		if ( ! $this->db->where('id', $id)->delete('sm_unit_kerja'))
		{
			$message = [
				'status'  => FALSE,
				'message' => 'Gagal menghapus unit kerja'
			];

			$this->response($message, self::HTTP_BAD_REQUEST);
		}

		$message = [
			'status'  => TRUE,
			'message' => 'Berhasil menghapus unit kerja'
		];

		$this->response($message, self::HTTP_OK);
	}

	public function update_unit_kerja_post()
	{
		$id = safe_post('id');

		if ($id === '')
		{
			$this->response(['status' => FALSE, 'message' => 'Parameter tidak lengkap'], self::HTTP_BAD_REQUEST);

			return;
		}

		$unit_parent = safe_post('unit_parent');

		if ($unit_parent !== '')
		{
			// generate child
			$kode      = $this->kepegawaian->getNextCode($unit_parent, 6);
			$id_parent = $unit_parent;
		} else
		{
			// generate parent
			$kode      = $this->kepegawaian->generateParentCode();
			$id_parent = NULL;
		}

		$data = [
			'kode'      => $kode,
			'upt'       => safe_post('nama_unit'),
			'nama'      => safe_post('keterangan') !== NULL ? safe_post('keterangan') : NULL,
			'eselon'    => safe_post('eselon_text') !== NULL ? safe_post('eselon_text') : NULL,
			'id_parent' => $id_parent,
		];

		$this->db->where('id', $id)->update('sm_unit_kerja', $data);

		$this->response(['status' => TRUE, 'message' => 'Sukses mengupdate Unit Kerja'], self::HTTP_OK);
	}
}
