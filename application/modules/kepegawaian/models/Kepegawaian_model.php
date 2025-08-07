<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kepegawaian_model extends CI_Model {
	function __construct()
	{
		parent::__construct();
	}

	public function get_data_pegawai($payload)
	{
		$length = $payload['length'];
		$start  = $payload['start'];

		$this->get_data_pegawai_query($payload['search'], $payload['order']);
		if ($length != -1)
		{
			$this->db->limit($length, $start);
		}

		return [
			'data'           => $this->db->get()->result(),
			'count_all'      => $this->count_all_pegawai(),
			'count_filtered' => $this->count_filtered_pegawai($payload),
		];
	}

	private function get_data_pegawai_query($search, $order)
	{
		$this->query_table_pegawai();

		$column_order  = [NULL, 'peg.nip', 'peg.profil', 'peg.nama', 'peg.kelamin', 'pr.nama', 'jb.nama', 'peg.status', NULL];
		$column_search = ['peg.nip', 'peg.nama', 'peg.kelamin', 'peg.status', 'jb.nama', 'pr.nama'];

		foreach ($column_search as $key => $item) // looping awal
		{
			if ( ! $search['value'])
			{
				break;
			}
			if ($item === 'peg.kelamin')
			{
				$this->db->or_where("case when $item = 'L' then 'laki-laki' else 'perempuan' end ilike",
					"'%{$search['value']}%'", FALSE);
				continue;
			}

			if ($item === 'peg.status')
			{
				$this->db->or_where("case when $item = 1 then 'aktif' else 'tidak aktif' end ilike",
					"'%{$search['value']}%'", FALSE);
				continue;
			}

			$key === 0
				? $this->db->where("$item ilike", "%{$search['value']}%")
				: $this->db->or_where("$item ilike", "%{$search['value']}%");
		}

		if (isset($order))
		{
			$this->db->order_by($column_order[$order['0']['column']], $order['0']['dir']);
		} else
		{
			$this->db->order_by('id');
		}
	}

	private function query_table_pegawai()
	{
		$this->db
			->select("peg.id, coalesce(peg.nip, '-') as nip, peg.nama, peg.kelamin, coalesce(jb.nama, '-') as jabatan, peg.status, coalesce(pr.nama, '-') as profesi, peg.profil, peg.tgl_lahir, kk.nama as tempat_lahir, peg.nik, peg.tmt")
			->from('sm_pegawai peg')
			->join('sm_jabatan jb', 'peg.id_jabatan = jb.id', 'left')
			->join('sm_profesi pr', 'peg.id_profesi = pr.id', 'left')
			->join('sm_kota_kabupaten kk', 'peg.id_kota_kabupaten = kk.id');
	}

	private function count_all_pegawai()
	{
		$this->query_table_pegawai();

		return $this->db->count_all_results();
	}

	private function count_filtered_pegawai($payload)
	{
		$this->get_data_pegawai_query($payload['search'], $payload['order']);
		$query = $this->db->get();

		return $query->num_rows();
	}

	public function get_data_jabatan($payload)
	{
		$length = $payload['length'];
		$start  = $payload['start'];

		$this->get_data_jabatan_query($payload['search'], $payload['order']);
		if ($length != -1)
		{
			$this->db->limit($length, $start);
		}

		return [
			'data'           => $this->db->get()->result(),
			'count_all'      => $this->count_all_jabatan(),
			'count_filtered' => $this->count_filtered_jabatan($payload),
		];
	}

	private function get_data_jabatan_query($search, $order)
	{
		$this->query_table_jabatan();

		$column_order  = [NULL, 'nama', NULL];
		$column_search = ['nama'];

		foreach ($column_search as $key => $item) // looping awal
		{
			$key === 0
				? $this->db->where("$item ilike", "%{$search['value']}%")
				: $this->db->or_where("$item ilike", "%{$search['value']}%");
		}

		if (isset($order))
		{
			$this->db->order_by($column_order[$order['0']['column']], $order['0']['dir']);
		} else
		{
			$this->db->order_by('id');
		}
	}

	private function query_table_jabatan()
	{
		$this->db->from('sm_jabatan');
	}

	private function count_all_jabatan()
	{
		$this->query_table_jabatan();

		return $this->db->count_all_results();
	}

	private function count_filtered_jabatan($payload)
	{
		$this->get_data_jabatan_query($payload['search'], $payload['order']);
		$query = $this->db->get();

		return $query->num_rows();
	}

	public function get_data_profesi($payload)
	{
		$length = $payload['length'];
		$start  = $payload['start'];

		$this->get_data_profesi_query($payload['search'], $payload['order']);
		if ($length != -1)
		{
			$this->db->limit($length, $start);
		}

		return [
			'data'           => $this->db->get()->result(),
			'count_all'      => $this->count_all_profesi(),
			'count_filtered' => $this->count_filtered_profesi($payload),
		];
	}

	private function get_data_profesi_query($search, $order)
	{
		$this->query_table_profesi();

		$column_order  = [NULL, 'nama', NULL];
		$column_search = ['nama'];

		foreach ($column_search as $key => $item) // looping awal
		{
			$key === 0
				? $this->db->where("$item ilike", "%{$search['value']}%")
				: $this->db->or_where("$item ilike", "%{$search['value']}%");
		}

		if (isset($order))
		{
			$this->db->order_by($column_order[$order['0']['column']], $order['0']['dir']);
		} else
		{
			$this->db->order_by('id');
		}
	}

	private function query_table_profesi()
	{
		$this->db->from('sm_profesi');
	}

	private function count_all_profesi()
	{
		$this->query_table_profesi();

		return $this->db->count_all_results();
	}

	private function count_filtered_profesi($payload)
	{
		$this->get_data_profesi_query($payload['search'], $payload['order']);
		$query = $this->db->get();

		return $query->num_rows();
	}

	public function get_data_tenaga_medis($payload)
	{
		$length = $payload['length'];
		$start  = $payload['start'];

		$this->get_data_tenaga_medis_query($payload['search'], $payload['order']);
		if ($length != -1)
		{
			$this->db->limit($length, $start);
		}

		return [
			'data'           => $this->db->get()->result(),
			'count_all'      => $this->count_all_tenaga_medis(),
			'count_filtered' => $this->count_filtered_tenaga_medis($payload),
		];
	}

	private function get_data_tenaga_medis_query($search, $order)
	{
		$this->query_table_tenaga_medis();

		$column_order  = [NULL, 'nama', 'profesi', 'spesialisasi', 'tgl_mulai_praktek', 'kode_bpjs', NULL];
		$column_search = ['pg.nama', 'pr.nama', 'sp.nama', 'tm.kode_bpjs'];

		foreach ($column_search as $key => $item) // looping awal
		{
			$key === 0
				? $this->db->where("$item ilike", "%{$search['value']}%")
				: $this->db->or_where("$item ilike", "%{$search['value']}%");
		}

		if (isset($order))
		{
			$this->db->order_by($column_order[$order['0']['column']], $order['0']['dir']);
		} else
		{
			$this->db->order_by('id');
		}
	}

	private function query_table_tenaga_medis()
	{
		$this->db->select("tm.*, pg.id as id_pegawai, pr.id as id_profesi, sp.id as id_spesialisasi, pg.nama, pg.alamat, pg.telp, pg.kelamin, coalesce(pr.nama,' - ') as profesi, coalesce(sp.nama, '-') as spesialisasi")
		         ->from('sm_tenaga_medis tm')
		         ->join('sm_pegawai pg', 'pg.id = tm.id_pegawai')
		         ->join('sm_profesi pr', 'pr.id = tm.id_profesi_real', 'left')
		         ->join('sm_spesialisasi sp', 'sp.id = tm.id_spesialisasi', 'left');
	}

	private function count_all_tenaga_medis()
	{
		$this->query_table_tenaga_medis();

		return $this->db->count_all_results();
	}

	private function count_filtered_tenaga_medis($payload)
	{
		$this->get_data_tenaga_medis_query($payload['search'], $payload['order']);
		$query = $this->db->get();

		return $query->num_rows();
	}

	public function get_data_unit_kerja($payload)
	{
		$length = $payload['length'];
		$start  = $payload['start'];

		$this->get_data_unit_kerja_query($payload['search'], $payload['order']);
		if ($length != -1)
		{
			$this->db->limit($length, $start);
		}

		return [
			'data'           => $this->db->get()->result(),
			'count_all'      => $this->count_all_unit_kerja(),
			'count_filtered' => $this->count_filtered_unit_kerja($payload),
		];
	}

	private function get_data_unit_kerja_query($search, $order)
	{
		$this->query_table_unit_kerja();

		$column_order  = [NULL, 'kode', 'upt', 'eselon', 'nama', NULL];
		$column_search = ['uk.kode', 'uk.upt', 'uk.eselon', 'uk.nama'];

		foreach ($column_search as $key => $item) // looping awal
		{
			$key === 0
				? $this->db->where("$item ilike", "%{$search['value']}%")
				: $this->db->or_where("$item ilike", "%{$search['value']}%");
		}

		if (isset($order))
		{
			$this->db->order_by($column_order[$order['0']['column']], $order['0']['dir']);
		} else
		{
			$this->db->order_by('id');
		}
	}

	private function query_table_unit_kerja()
	{
		$this->db->select("uk.*, uk2.upt as upt_parent")
		         ->from('sm_unit_kerja uk')
		         ->join('sm_unit_kerja uk2', 'uk.id_parent = uk2.id', 'left');
	}

	private function count_all_unit_kerja()
	{
		$this->query_table_unit_kerja();

		return $this->db->count_all_results();
	}

	private function count_filtered_unit_kerja($payload)
	{
		$this->get_data_unit_kerja_query($payload['search'], $payload['order']);
		$query = $this->db->get();

		return $query->num_rows();
	}

	public function getAutoUnitKerja($q, $start, $limit)
	{
		$limit         = " limit ".$limit." offset ".$start;
		$sql           = "select * from sm_unit_kerja
				where upt is not null
				and eselon is not null
				and nama is not null
				and id_parent is not null
				and (nama ilike '%$q%' or upt ilike '%$q%' or kode ilike '%$q%' or eselon ilike '%$q%')
				order by kode";
		$data['data']  = $this->db->query($sql.$limit)->result();
		$data['total'] = $this->db->query($sql)->num_rows();

		return $data;
	}

	public function getAutoEselon($q, $start, $limit)
	{
		$limit         = " limit ".$limit." offset ".$start;
		$sql           = "select p.id, concat(sga.kode_golongan, upper(p.kode_pangkat)) eselon
				from sm_pangkat p
				join sm_golongan_asn sga on sga.id = p.id_golongan_asn
				and (sga.kode_golongan ilike '%$q%' or p.kode_pangkat ilike '%$q%')";
		$data['data']  = $this->db->query($sql.$limit)->result();
		$data['total'] = $this->db->query($sql)->num_rows();

		return $data;
	}

	public function getAutoPangkat($q, $start, $limit)
	{
		$limit         = " limit ".$limit." offset ".$start;
		$sql           = "select p.id, p.kode_pangkat, p.nama_pangkat, gas.kode_golongan
				from sm_pangkat p
         		join sm_golongan_asn gas on p.id_golongan_asn = gas.id
				where p.kode_pangkat ilike '%$q%' or p.nama_pangkat ilike '%$q%' or gas.kode_golongan ilike '%$q%'
				order by gas.kode_golongan";
		$data['data']  = $this->db->query($sql.$limit)->result();
		$data['total'] = $this->db->query($sql)->num_rows();

		return $data;
	}

	public function tambahPegawai($config)
	{
		$nama_foto_pegawai = $_FILES['foto']['name'] ?? NULL;
		$data_foto_pegawai = NULL;

		if ( ! empty($nama_foto_pegawai))
		{
			$this->load->library('upload', $config);

			if ( ! $this->upload->do_upload('foto'))
			{
				return [
					'status'  => FALSE,
					'message' => $this->upload->display_errors()
				];
			}

			$data_foto_pegawai = $this->upload->data();
		}

		$nama_foto_fc_sk = $_FILES['fc_sk']['name'] ?? NULL;
		$data_foto_fc_sk = NULL;
		if ( ! empty($nama_foto_fc_sk))
		{
			$this->load->library('upload', $config);

			if ( ! $this->upload->do_upload('fc_sk'))
			{
				return [
					'status'  => FALSE,
					'message' => $this->upload->display_errors()
				];

			}

			$data_foto_fc_sk = $this->upload->data();
		}

		$data_pegawai = [
			'nama'              => safe_post('nama'),
			'nip'               => safe_post('nip') !== '' ? safe_post('nip') : NULL,
			'nik'               => safe_post('nik') !== '' ? safe_post('nik') : NULL,
			'email'             => safe_post('email') !== '' ? safe_post('email') : NULL,
			'agama'             => safe_post('agama_pegawai') !== '' ? safe_post('agama_pegawai') : NULL,
			'id_kota_kabupaten' => safe_post('tmp_lahir'),
			'tgl_lahir'         => safe_post('tgl_lahir'),
			'alamat'            => safe_post('alamat') !== '' ? safe_post('alamat') : NULL,
			'kelamin'           => safe_post('jenis_kelamin'),
			'gol_darah'         => safe_post('gol_darah_pegawai') !== '' ? safe_post('gol_darah_pegawai') : NULL,
			'id_profesi'        => safe_post('profesi_pegawai'),
			'id_jabatan'        => safe_post('jabatan_pegawai'),
			'hp'                => safe_post('no_hp') !== '' ? safe_post('no_hp') : NULL,
			'status'            => 1,
			'created_date'      => date('Y-m-d H:i:s'),
			'profil'            => $data_foto_pegawai ? $data_foto_pegawai['file_name'] : NULL,
			'type'              => $data_foto_pegawai ? $data_foto_pegawai['image_type'] : NULL,
			'jenis_asn'         => safe_post('jenis_asn') !== '' ? safe_post('jenis_asn') : NULL,
			'tmt'               => safe_post('tmt') !== '' ? safe_post('tmt') : NULL,
			'no_sk'             => safe_post('no_sk') !== '' ? safe_post('no_sk') : NULL,
			'tgl_sk'            => safe_post('tgl_sk') !== '' ? safe_post('tgl_sk') : NULL,
			'pejabat_penetap'   => safe_post('pejabat_penetap') !== '' ? safe_post('pejabat_penetap') : NULL,
			'golongan'          => safe_post('golongan') !== '' ? safe_post('golongan') : NULL,
			'gaji_pokok'        => safe_post('gaji_pokok') !== '' ? str_replace('.', '', safe_post('gaji_pokok')) : NULL,
			'masa_kerja_cpns'   => json_encode([
				'tahun' => safe_post('tahun') !== '' ? safe_post('tahun') : 0,
				'bulan' => safe_post('bulan') !== '' ? safe_post('bulan') : 0,
			]),
			'fc_sk'             => $data_foto_fc_sk ? $data_foto_fc_sk['file_name'] : NULL,
			'akhir_masa_kerja'  => safe_post('akhir_masa_kerja') !== '' ? safe_post('akhir_masa_kerja') : NULL,
		];

		$this->db->insert('sm_pegawai', $data_pegawai);

		return $this->db->insert_id();
	}

	public function tambahKartuKeluargaPegawai($config, $idPegawai)
	{
		$nama_foto_kk = $_FILES['foto_kk']['name'] ?? NULL;
		$data_foto_kk = NULL;
		if ( ! empty($nama_foto_kk))
		{
			$this->load->library('upload', $config);

			if ( ! $this->upload->do_upload('foto_kk'))
			{
				return [
					'status'  => FALSE,
					'message' => $this->upload->display_errors()
				];
			}

			$data_foto_kk = $this->upload->data();
		}

		$no_kk = safe_post('no_kk');

		if ( ! empty($no_kk))
		{
			$data_kk_pegawai = [
				'no_kk'      => $no_kk,
				'tgl_kk'     => safe_post('tgl_kk') !== '' ? safe_post('tgl_kk') : NULL,
				'foto_kk'    => $data_foto_kk ? $data_foto_kk['file_name'] : NULL,
				'type_foto'  => $data_foto_kk ? $data_foto_kk['image_type'] : NULL,
				'id_pegawai' => $idPegawai,
			];

			$no_susunan_keluarga = safe_post('nomor_susunan_keluarga') !== NULL ? safe_post('nomor_susunan_keluarga') : NULL;

			$this->db->insert('sm_kk_pegawai', $data_kk_pegawai);
			$insert_id_kk = $this->db->insert_id();

			if ($no_susunan_keluarga !== NULL)
			{
				$daftar_susunan_keluarga = [];
				foreach ($no_susunan_keluarga as $key => $value)
				{
					$daftar_susunan_keluarga[] = [
						'nama_lengkap'    => safe_post('nama_lengkap')[$key] !== NULL ? safe_post('nama_lengkap')[$key] : NULL,
						'nik'             => safe_post('nik_keluarga')[$key] !== NULL ? safe_post('nik_keluarga')[$key] : NULL,
						'jenis_kelamin'   => safe_post('jenis_kelamin_keluarga')[$key] !== NULL ? safe_post('jenis_kelamin_keluarga')[$key] : NULL,
						'tempat_lahir'    => safe_post('tempat_lahir_keluarga')[$key] !== NULL ? safe_post('tempat_lahir_keluarga')[$key] : NULL,
						'tgl_lahir'       => safe_post('tgl_lahir_keluarga')[$key] !== NULL ? safe_post('tgl_lahir_keluarga')[$key] : NULL,
						'pendidikan'      => safe_post('pendidikan_keluarga')[$key] !== NULL ? safe_post('pendidikan_keluarga')[$key] : NULL,
						'jenis_pekerjaan' => safe_post('jenis_pekerjaan_keluarga')[$key] !== NULL ? safe_post('jenis_pekerjaan_keluarga')[$key] : NULL,
						'id_kk'           => $insert_id_kk,
					];
				}
				$this->db->insert_batch('sm_kk_pegawai_detail', $daftar_susunan_keluarga);
			}
		}
	}

	public function tambahJabatanPegawai($config, $idPegawai)
	{
		$no_tambah_jabatan = safe_post('nomor_tambah_jabatan') !== '' ? safe_post('nomor_tambah_jabatan') : NULL;

		if ($no_tambah_jabatan === NULL)
		{
			return NULL;
		}

		$daftar_tambah_jabatan = [];
		foreach ($no_tambah_jabatan as $key => $value)
		{
			$nama_foto_fc_sk_jabatan = $_FILES['fc_sk_jabatan']['name'][$key] ?? NULL;
			$data_foto_sk_jabatan    = NULL;
			if ( ! empty($nama_foto_fc_sk_jabatan))
			{
				$_FILES['fc_sk_jabatans']['name']     = $_FILES['fc_sk_jabatan']['name'][$key];
				$_FILES['fc_sk_jabatans']['type']     = $_FILES['fc_sk_jabatan']['type'][$key];
				$_FILES['fc_sk_jabatans']['tmp_name'] = $_FILES['fc_sk_jabatan']['tmp_name'][$key];
				if (isset($_FILES['fc_sk_jabatan']['error'][$key]))
				{
					$_FILES['fc_sk_jabatans']['error'] = $_FILES['fc_sk_jabatan']['error'][$key];
				} else
				{
					$_FILES['fc_sk_jabatans']['error'] = 0;
				}
				if (isset($_FILES['fc_sk_jabatan']['size'][$key]))
				{
					$_FILES['fc_sk_jabatans']['size'] = $_FILES['fc_sk_jabatan']['size'][$key];
				} else
				{
					$_FILES['fc_sk_jabatans']['size'] = 2195;
				}


				$this->load->library('upload', $config);

				if ( ! $this->upload->do_upload('fc_sk_jabatans'))
				{
					return [
						'status'  => FALSE,
						'message' => $this->upload->display_errors()
					];
				}

				$data_foto_sk_jabatan = $this->upload->data();
			}

			$daftar_tambah_jabatan[] = [
				'tmt'              => safe_post('tmt_jabatan')[$key] !== '' ? safe_post('tmt_jabatan')[$key] : NULL,
				'id_unit_kerja'    => safe_post('unit_kerja')[$key] !== '' ? safe_post('unit_kerja')[$key] : NULL,
				'no_sk'            => safe_post('no_sk_jabatan')[$key] !== '' ? safe_post('no_sk_jabatan')[$key] : NULL,
				'tgl_sk'           => safe_post('tgl_sk_jabatan')[$key] !== '' ? safe_post('tgl_sk_jabatan')[$key] : NULL,
				'penandatangan_sk' => safe_post('penandatangan_sk')[$key] !== '' ? safe_post('penandatangan_sk')[$key] : NULL,
				'jenis_jabatan'    => safe_post('jenis_jabatan')[$key] !== '' ? safe_post('jenis_jabatan')[$key] : NULL,
				'jabatan'          => safe_post('jabatan_jabatan')[$key] !== '' ? safe_post('jabatan_jabatan')[$key] : NULL,
				'jenjang'          => safe_post('jenjang_jabatan')[$key] !== '' ? safe_post('jenjang_jabatan')[$key] : NULL,
				'tugas_tambahan'   => safe_post('tugas_tambahan_jabatan')[$key] !== '' ? safe_post('tugas_tambahan_jabatan')[$key] : NULL,
				'fc_sk'            => $data_foto_sk_jabatan ? $data_foto_sk_jabatan['file_name'] : NULL,
				'id_pegawai'       => $idPegawai,
			];
		}
		$this->db->insert_batch('sm_riwayat_jabatan_pegawai', $daftar_tambah_jabatan);
	}

	public function tambahPangkatPegawai($config, $idPegawai)
	{
		$no_tambah_pangkat = safe_post('nomor_tambah_pangkat') !== '' ? safe_post('nomor_tambah_pangkat') : NULL;

		if (empty($no_tambah_pangkat))
		{
			return NULL;
		}

		$list_data_pangkat = [];
		foreach ($no_tambah_pangkat as $key => $value)
		{
			$nama_foto_fc_sk_pangkat = $_FILES['fc_sk_pangkat']['name'][$key] ?? NULL;
			$data_foto_sk_pangkat    = NULL;
			if ( ! empty($nama_foto_fc_sk_pangkat))
			{
				$_FILES['fc_sk_pangkats']['name']     = $_FILES['fc_sk_pangkat']['name'][$key];
				$_FILES['fc_sk_pangkats']['type']     = $_FILES['fc_sk_pangkat']['type'][$key];
				$_FILES['fc_sk_pangkats']['tmp_name'] = $_FILES['fc_sk_pangkat']['tmp_name'][$key];
				if (isset($_FILES['fc_sk_pangkat']['error'][$key]))
				{
					$_FILES['fc_sk_pangkats']['error'] = $_FILES['fc_sk_pangkat']['error'][$key];
				} else
				{
					$_FILES['fc_sk_pangkats']['error'] = 0;
				}
				if (isset($_FILES['fc_sk_pangkat']['size'][$key]))
				{
					$_FILES['fc_sk_pangkats']['size'] = $_FILES['fc_sk_pangkat']['size'][$key];
				} else
				{
					$_FILES['fc_sk_pangkats']['size'] = 2195;
				}


				$this->load->library('upload', $config);

				if ( ! $this->upload->do_upload('fc_sk_pangkats'))
				{
					return [
						'status'  => FALSE,
						'message' => $this->upload->display_errors()
					];
				}

				$data_foto_sk_pangkat = $this->upload->data();
			}

			$list_data_pangkat[] = [
				'tmt'               => safe_post('tmt_pangkat')[$key] !== '' ? safe_post('tmt_pangkat')[$key] : NULL,
				'id_pegawai'        => $idPegawai,
				'no_sk'             => safe_post('no_sk_pangkat')[$key] !== '' ? safe_post('no_sk_pangkat')[$key] : NULL,
				'no_nota_bkn'       => safe_post('no_nota_bkn')[$key] !== '' ? safe_post('no_nota_bkn')[$key] : NULL,
				'id_pangkat'        => safe_post('golongan_pangkat')[$key] !== '' ? safe_post('golongan_pangkat')[$key] : NULL,
				'tgl_sk'            => safe_post('tgl_sk_pangkat')[$key] !== '' ? safe_post('tgl_sk_pangkat')[$key] : NULL,
				'tgl_nota_bkn'      => safe_post('tgl_nota_bkn')[$key] !== '' ? safe_post('tgl_nota_bkn')[$key] : NULL,
				'masa_kerja'        => safe_post('masa_kerja_pangkat')[$key] !== '' ? safe_post('masa_kerja_pangkat')[$key] : NULL,
				'jenis_kenaikan'    => safe_post('kenaikan_pangkat')[$key] !== '' ? safe_post('kenaikan_pangkat')[$key] : NULL,
				'angka_kredit'      => json_encode([
					'utama'    => safe_post('angka_kredit_utama')[$key] !== '' ? safe_post('angka_kredit_utama')[$key] : NULL,
					'tambahan' => safe_post('angka_kredit_tambahan')[$key] !== '' ? safe_post('angka_kredit_tambahan')[$key] : NULL
				]),
				'fc_sk_kepangkatan' => $data_foto_sk_pangkat ? $data_foto_sk_pangkat['file_name'] : NULL,
			];
		}

		$this->db->insert_batch('sm_form_sk_kepangkatan', $list_data_pangkat);
	}

	public function updatePegawai($config)
	{
		$nama_foto = $_FILES['foto']['name'] ?? NULL;
		$data_foto = NULL;
		if ( ! empty($nama_foto))
		{
			$pegawai = $this->db->get_where('sm_pegawai', ['id' => safe_post('id_pegawai')])->row();
			if ($pegawai->profil)
			{
				unlink(FCPATH.'/resources/images/avatars/'.$pegawai->profil);
			}

			if ( ! $this->upload->do_upload('foto'))
			{
				return [
					'status'  => FALSE,
					'message' => $this->upload->display_errors()
				];
			}

			$data_foto = $this->upload->data();
		}

		$nama_foto_fc_sk = $_FILES['fc_sk']['name'] ?? NULL;
		$data_foto_fc_sk = NULL;
		if ( ! empty($nama_foto_fc_sk))
		{
			$this->load->library('upload', $config);

			$pegawai = $this->db->get_where('sm_pegawai', ['id' => safe_post('id_pegawai')])->row();
			if ($pegawai->fc_sk)
			{
				unlink(FCPATH.'/resources/images/avatars/'.$pegawai->fc_sk);
			}

			if ( ! $this->upload->do_upload('fc_sk'))
			{
				return [
					'status'  => FALSE,
					'message' => $this->upload->display_errors()
				];
			}

			$data_foto_fc_sk = $this->upload->data();
		}

		$data_pegawai = [
			'nama'              => safe_post('nama'),
			'nip'               => safe_post('nip') !== '' ? safe_post('nip') : NULL,
			'nik'               => safe_post('nik') !== '' ? safe_post('nik') : NULL,
			'email'             => safe_post('email') !== '' ? safe_post('email') : NULL,
			'agama'             => safe_post('agama_pegawai') !== '' ? safe_post('agama_pegawai') : NULL,
			'id_kota_kabupaten' => safe_post('tmp_lahir'),
			'tgl_lahir'         => safe_post('tgl_lahir'),
			'alamat'            => safe_post('alamat') !== '' ? safe_post('alamat') : NULL,
			'kelamin'           => safe_post('jenis_kelamin'),
			'gol_darah'         => safe_post('gol_darah_pegawai') !== '' ? safe_post('gol_darah_pegawai') : NULL,
			'id_profesi'        => safe_post('profesi_pegawai'),
			'id_jabatan'        => safe_post('jabatan_pegawai'),
			'hp'                => safe_post('no_hp') !== '' ? safe_post('no_hp') : NULL,
			'nama'              => safe_post('nama'),
			'status'            => 1,
			'jenis_asn'         => safe_post('jenis_asn') !== '' ? safe_post('jenis_asn') : NULL,
			'tmt'               => safe_post('tmt') !== '' ? safe_post('tmt') : NULL,
			'no_sk'             => safe_post('no_sk') !== '' ? safe_post('no_sk') : NULL,
			'tgl_sk'            => safe_post('tgl_sk') !== '' ? safe_post('tgl_sk') : NULL,
			'pejabat_penetap'   => safe_post('pejabat_penetap') !== '' ? safe_post('pejabat_penetap') : NULL,
			'golongan'          => safe_post('golongan') !== '' ? safe_post('golongan') : NULL,
			'gaji_pokok'        => safe_post('gaji_pokok') !== '' ? str_replace('.', '', safe_post('gaji_pokok')) : NULL,
			'masa_kerja_cpns'   => json_encode([
				'tahun' => safe_post('tahun') !== '' ? safe_post('tahun') : 0,
				'bulan' => safe_post('bulan') !== '' ? safe_post('bulan') : 0,
			]),
			'akhir_masa_kerja'  => safe_post('akhir_masa_kerja') !== '' ? safe_post('akhir_masa_kerja') : NULL,
		];

		if ($data_foto)
		{
			$data_pegawai['profil'] = $data_foto['file_name'];
			$data_pegawai['type']   = $data_foto['image_type'];
		}

		if ($data_foto_fc_sk)
		{
			$data_pegawai['fc_sk'] = $data_foto_fc_sk['file_name'];
		}

		$this->db->where('id', safe_post('id_pegawai'))->update('sm_pegawai', $data_pegawai);
	}

	public function updateKartuKeluargaPegawai($config)
	{
		$nama_foto_kk = $_FILES['foto_kk']['name'] ?? NULL;
		$data_foto_kk = NULL;
		if ( ! empty($nama_foto_kk))
		{
			$this->load->library('upload', $config);

			$kk_pegawai = $this->db->get_where('sm_kk_pegawai', ['id_pegawai' => safe_post('id_pegawai')])->row();
			if ($kk_pegawai->foto_kk)
			{
				unlink(FCPATH.'/resources/images/avatars/'.$kk_pegawai->foto_kk);
			}

			if ( ! $this->upload->do_upload('foto_kk'))
			{
				return [
					'status'  => FALSE,
					'message' => $this->upload->display_errors()
				];
			}

			$data_foto_kk = $this->upload->data();
		}

		$no_kk = safe_post('no_kk');

		if (empty($no_kk))
		{
			return NULL;
		}
		$data_kk_pegawai = [
			'no_kk'  => $no_kk,
			'tgl_kk' => safe_post('tgl_kk') !== '' ? safe_post('tgl_kk') : NULL
		];

		if ($data_foto_kk)
		{
			$data_kk_pegawai['foto_kk']   = $data_foto_kk['file_name'];
			$data_kk_pegawai['type_foto'] = $data_foto_kk['image_type'];
		}

		$this->db->where('id_pegawai', safe_post('id_pegawai'))->update('sm_kk_pegawai', $data_kk_pegawai);

		$no_susunan_keluarga = safe_post('nomor_susunan_keluarga') !== '' ? safe_post('nomor_susunan_keluarga') : NULL;
		$kk_pegawai          = $this->db->get_where('sm_kk_pegawai', ['id_pegawai' => safe_post('id_pegawai')])->row();

		if ($no_susunan_keluarga !== NULL)
		{
			$daftar_susunan_keluarga = [];
			foreach ($no_susunan_keluarga as $key => $value)
			{
				$daftar_susunan_keluarga[] = [
					'nama_lengkap'    => safe_post('nama_lengkap')[$key] !== NULL ? safe_post('nama_lengkap')[$key] : NULL,
					'nik'             => safe_post('nik_keluarga')[$key] !== NULL ? safe_post('nik_keluarga')[$key] : NULL,
					'jenis_kelamin'   => safe_post('jenis_kelamin_keluarga')[$key] !== NULL ? safe_post('jenis_kelamin_keluarga')[$key] : NULL,
					'tempat_lahir'    => safe_post('tempat_lahir_keluarga')[$key] !== NULL ? safe_post('tempat_lahir_keluarga')[$key] : NULL,
					'tgl_lahir'       => safe_post('tgl_lahir_keluarga')[$key] !== NULL ? safe_post('tgl_lahir_keluarga')[$key] : NULL,
					'pendidikan'      => safe_post('pendidikan_keluarga')[$key] !== NULL ? safe_post('pendidikan_keluarga')[$key] : NULL,
					'jenis_pekerjaan' => safe_post('jenis_pekerjaan_keluarga')[$key] !== NULL ? safe_post('jenis_pekerjaan_keluarga')[$key] : NULL,
					'id_kk'           => $kk_pegawai->id,
				];
			}
			$this->db->insert_batch('sm_kk_pegawai_detail', $daftar_susunan_keluarga);
		}
	}

	public function updatePangkatPegawai($config)
	{
		$no_tambah_pangkat = safe_post('nomor_tambah_pangkat') !== '' ? safe_post('nomor_tambah_pangkat') : NULL;

		if (empty($no_tambah_pangkat))
		{
			return NULL;
		}

		$list_data_pangkat = [];
		foreach ($no_tambah_pangkat as $key => $value)
		{
			$nama_foto_fc_sk_pangkat = $_FILES['fc_sk_pangkat']['name'][$key] ?? NULL;
			$data_foto_sk_pangkat    = NULL;
			if ( ! empty($nama_foto_fc_sk_pangkat))
			{
				$_FILES['fc_sk_pangkats']['name']     = $_FILES['fc_sk_pangkat']['name'][$key];
				$_FILES['fc_sk_pangkats']['type']     = $_FILES['fc_sk_pangkat']['type'][$key];
				$_FILES['fc_sk_pangkats']['tmp_name'] = $_FILES['fc_sk_pangkat']['tmp_name'][$key];
				if (isset($_FILES['fc_sk_pangkat']['error'][$key]))
				{
					$_FILES['fc_sk_pangkats']['error'] = $_FILES['fc_sk_pangkat']['error'][$key];
				} else
				{
					$_FILES['fc_sk_pangkats']['error'] = 0;
				}
				if (isset($_FILES['fc_sk_pangkat']['size'][$key]))
				{
					$_FILES['fc_sk_pangkats']['size'] = $_FILES['fc_sk_pangkat']['size'][$key];
				} else
				{
					$_FILES['fc_sk_pangkats']['size'] = 2195;
				}


				$this->load->library('upload', $config);

				if ( ! $this->upload->do_upload('fc_sk_pangkats'))
				{
					return [
						'status'  => FALSE,
						'message' => $this->upload->display_errors()
					];
				}

				$data_foto_sk_pangkat = $this->upload->data();
			}

			$list_data_pangkat[] = [
				'tmt'               => safe_post('tmt_pangkat')[$key] !== '' ? safe_post('tmt_pangkat')[$key] : NULL,
				'id_pegawai'        => safe_post('id_pegawai'),
				'no_sk'             => safe_post('no_sk_pangkat')[$key] !== '' ? safe_post('no_sk_pangkat')[$key] : NULL,
				'no_nota_bkn'       => safe_post('no_nota_bkn')[$key] !== '' ? safe_post('no_nota_bkn')[$key] : NULL,
				'id_pangkat'        => safe_post('golongan_pangkat')[$key] !== '' ? safe_post('golongan_pangkat')[$key] : NULL,
				'tgl_sk'            => safe_post('tgl_sk_pangkat')[$key] !== '' ? safe_post('tgl_sk_pangkat')[$key] : NULL,
				'tgl_nota_bkn'      => safe_post('tgl_nota_bkn')[$key] !== '' ? safe_post('tgl_nota_bkn')[$key] : NULL,
				'masa_kerja'        => safe_post('masa_kerja_pangkat')[$key] !== '' ? safe_post('masa_kerja_pangkat')[$key] : NULL,
				'jenis_kenaikan'    => safe_post('kenaikan_pangkat')[$key] !== '' ? safe_post('kenaikan_pangkat')[$key] : NULL,
				'angka_kredit'      => json_encode([
					'utama'    => safe_post('angka_kredit_utama')[$key] !== '' ? safe_post('angka_kredit_utama')[$key] : NULL,
					'tambahan' => safe_post('angka_kredit_tambahan')[$key] !== '' ? safe_post('angka_kredit_tambahan')[$key] : NULL
				]),
				'fc_sk_kepangkatan' => $data_foto_sk_pangkat ? $data_foto_sk_pangkat['file_name'] : NULL,
			];
		}

		$this->db->insert_batch('sm_form_sk_kepangkatan', $list_data_pangkat);
	}

	public function updateJabatanPegawai($config, $idPegawai)
	{
		$no_tambah_jabatan = safe_post('nomor_tambah_jabatan') !== '' ? safe_post('nomor_tambah_jabatan') : NULL;

		if ($no_tambah_jabatan === NULL)
		{
			return NULL;
		}

		$daftar_tambah_jabatan = [];
		foreach ($no_tambah_jabatan as $key => $value)
		{
			$nama_foto_fc_sk_jabatan = $_FILES['fc_sk_jabatan']['name'][$key] ?? NULL;
			$data_foto_sk_jabatan    = NULL;
			if ( ! empty($nama_foto_fc_sk_jabatan))
			{
				$_FILES['fc_sk_jabatans']['name']     = $_FILES['fc_sk_jabatan']['name'][$key];
				$_FILES['fc_sk_jabatans']['type']     = $_FILES['fc_sk_jabatan']['type'][$key];
				$_FILES['fc_sk_jabatans']['tmp_name'] = $_FILES['fc_sk_jabatan']['tmp_name'][$key];
				if (isset($_FILES['fc_sk_jabatan']['error'][$key]))
				{
					$_FILES['fc_sk_jabatans']['error'] = $_FILES['fc_sk_jabatan']['error'][$key];
				} else
				{
					$_FILES['fc_sk_jabatans']['error'] = 0;
				}
				if (isset($_FILES['fc_sk_jabatan']['size'][$key]))
				{
					$_FILES['fc_sk_jabatans']['size'] = $_FILES['fc_sk_jabatan']['size'][$key];
				} else
				{
					$_FILES['fc_sk_jabatans']['size'] = 2195;
				}


				$this->load->library('upload', $config);

				if ( ! $this->upload->do_upload('fc_sk_jabatans'))
				{
					return [
						'status'  => FALSE,
						'message' => $this->upload->display_errors()
					];
				}

				$data_foto_sk_jabatan = $this->upload->data();
			}

			$daftar_tambah_jabatan[] = [
				'tmt'              => safe_post('tmt_jabatan')[$key] !== '' ? safe_post('tmt_jabatan')[$key] : NULL,
				'id_unit_kerja'    => safe_post('unit_kerja')[$key] !== '' ? safe_post('unit_kerja')[$key] : NULL,
				'no_sk'            => safe_post('no_sk_jabatan')[$key] !== '' ? safe_post('no_sk_jabatan')[$key] : NULL,
				'tgl_sk'           => safe_post('tgl_sk_jabatan')[$key] !== '' ? safe_post('tgl_sk_jabatan')[$key] : NULL,
				'penandatangan_sk' => safe_post('penandatangan_sk')[$key] !== '' ? safe_post('penandatangan_sk')[$key] : NULL,
				'jenis_jabatan'    => safe_post('jenis_jabatan')[$key] !== '' ? safe_post('jenis_jabatan')[$key] : NULL,
				'jabatan'          => safe_post('jabatan_jabatan')[$key] !== '' ? safe_post('jabatan_jabatan')[$key] : NULL,
				'jenjang'          => safe_post('jenjang_jabatan')[$key] !== '' ? safe_post('jenjang_jabatan')[$key] : NULL,
				'tugas_tambahan'   => safe_post('tugas_tambahan_jabatan')[$key] !== '' ? safe_post('tugas_tambahan_jabatan')[$key] : NULL,
				'id_pegawai'       => safe_post('id_pegawai'),
			];

			if($data_foto_sk_jabatan){
				$daftar_tambah_jabatan[]['fc_sk']   = $data_foto_sk_jabatan['file_name'];
			}
		}
		$this->db->insert_batch('sm_riwayat_jabatan_pegawai', $daftar_tambah_jabatan);
	}

	public function dataJabatan($waktu)
	{
		$struktural = $this->db->from('sm_pegawai p')
		                       ->join('sm_riwayat_jabatan_pegawai rjp', 'p.id = rjp.id_pegawai', 'left')
		                       ->where('rjp.jenis_jabatan', 'jabatan struktural')
		                       ->where('akhir_masa_kerja >=', date('Y-m-t', strtotime($waktu)))
		                       ->get()->num_rows();

		$fungsional_umum = $this->db->from('sm_pegawai p')
		                            ->join('sm_riwayat_jabatan_pegawai rjp', 'p.id = rjp.id_pegawai', 'left')
		                            ->where('rjp.jenis_jabatan', 'jabatan fungsional umum')
		                            ->where('akhir_masa_kerja >=', date('Y-m-t', strtotime($waktu)))
		                            ->get()->num_rows();

		$fungsional_tertentu = $this->db->from('sm_pegawai p')
		                                ->join('sm_riwayat_jabatan_pegawai rjp', 'p.id = rjp.id_pegawai', 'left')
		                                ->where('rjp.jenis_jabatan', 'jabatan fungsional tertentu')
		                                ->where('akhir_masa_kerja >=', date('Y-m-t', strtotime($waktu)))
		                                ->get()->num_rows();

		return [
			'struktural'          => $struktural,
			'fungsional_umum'     => $fungsional_umum,
			'fungsional_tertentu' => $fungsional_tertentu
		];
	}

	public function dataUnitKerja($waktu)
	{
		$waktu = date('Y-m-t', strtotime($waktu));

		return $this->db->query("select uk.upt,
		       count(case when sp.jenis_asn = 'pns' then sp.jenis_asn end) as pns,
		       count(case when sp.jenis_asn = 'cpns' then sp.jenis_asn end) as cpns,
		       count(case when sp.jenis_asn = 'pppk' then sp.jenis_asn end) as pppk,
		       count(case when sp.jenis_asn = 'tkk' then sp.jenis_asn end) as tkk
		from sm_unit_kerja uk
		left join sm_riwayat_jabatan_pegawai srjp on uk.id = srjp.id_unit_kerja
		left join sm_pegawai sp on srjp.id_pegawai = sp.id and sp.akhir_masa_kerja >= '{$waktu}'
		where uk.upt is not null
		group by uk.upt
		order by uk.upt")->result();
	}

	public function dataUsia($waktu)
	{
		$waktu = date('Y-m-t', strtotime($waktu));

		return $this->db->query("SELECT
		    kelompok_umur,
		    COUNT(CASE WHEN kelamin = 'L' THEN 1 END) AS jumlah_laki_laki,
		    COUNT(CASE WHEN kelamin = 'P' THEN 1 END) AS jumlah_perempuan
		FROM (
		    SELECT
		        kelamin,
		        's.d. 25 tahun' AS kelompok_umur
		    FROM sm_pegawai
		    WHERE EXTRACT(YEAR FROM AGE(tgl_lahir)) <= 25
		    AND akhir_masa_kerja >= '{$waktu}'
		    UNION ALL
		    SELECT
		        kelamin,
		        '25 - 34 tahun' AS kelompok_umur
		    FROM sm_pegawai
		    WHERE EXTRACT(YEAR FROM AGE(tgl_lahir)) > 25 AND EXTRACT(YEAR FROM AGE(tgl_lahir)) <= 34
		    AND akhir_masa_kerja >= '{$waktu}'
		    UNION ALL
		    SELECT
		        kelamin,
		        '35 - 44 tahun' AS kelompok_umur
		    FROM sm_pegawai
		    WHERE EXTRACT(YEAR FROM AGE(tgl_lahir)) >= 35 AND EXTRACT(YEAR FROM AGE(tgl_lahir)) <= 44
		    AND akhir_masa_kerja >= '{$waktu}'
		    UNION ALL
		    SELECT
		        kelamin,
		        '45 - 54 tahun' AS kelompok_umur
		    FROM sm_pegawai
		    WHERE EXTRACT(YEAR FROM AGE(tgl_lahir)) >= 45 AND EXTRACT(YEAR FROM AGE(tgl_lahir)) <= 54
		    AND akhir_masa_kerja >= '{$waktu}'
		    UNION ALL
		    SELECT
		        kelamin,
		        '55 -57 tahun' AS kelompok_umur
		    FROM sm_pegawai
		    WHERE EXTRACT(YEAR FROM AGE(tgl_lahir)) >= 55 AND EXTRACT(YEAR FROM AGE(tgl_lahir)) <= 57
		    AND akhir_masa_kerja >= '{$waktu}'
		    UNION ALL
		    SELECT
		        kelamin,
		        'diatas 57 tahun' AS kelompok_umur
		    FROM sm_pegawai
		    WHERE EXTRACT(YEAR FROM AGE(tgl_lahir)) > 57
		    AND akhir_masa_kerja >= '{$waktu}'
		) AS data_umur
		GROUP BY kelompok_umur")->result();
	}

	public function dataPangkat($waktu)
	{
		$waktu = date('Y-m-t', strtotime($waktu));

		return $this->db->query("select concat_ws(',', concat_ws('/', sga.kode_golongan, p.kode_pangkat), p.nama_pangkat) as pangkat,
		       count(case when sp.kelamin = 'L' then 1 end) as jumlah_laki_laki,
		       count(case when sp.kelamin = 'P' then 1 end) as jumlah_perempuan
		from sm_pangkat p
		join sm_golongan_asn sga on p.id_golongan_asn = sga.id
		left join sm_form_sk_kepangkatan sfsk on p.id = sfsk.id_pangkat
		left join sm_pegawai sp on sfsk.id_pegawai = sp.id and sp.akhir_masa_kerja >= '{$waktu}'
		group by sga.kode_golongan, p.kode_pangkat, p.nama_pangkat
		order by sga.kode_golongan")->result();
	}

	public function getNextCode($parent, $max_level)
	{
		$sql   = "select kode from sm_unit_kerja
                where id_parent = '".$parent."' 
                order by id desc limit 1 offset 0";
		$query = $this->db->query($sql)->row();

		$kode = $query !== NULL ? $query->kode : NULL;

		if ($kode === NULL)
		{
			// first child
			$kode       = $this->db->where('id', $parent)
			                       ->get('sm_unit_kerja')
			                       ->row()->kode;
			$kode_split = explode('.', $kode);
			$size       = count($kode_split);

			$new_kode = $size >= $max_level ? NULL : $kode.".01";
		} else
		{
			$kode_split = explode('.', $kode);
			$size       = count($kode_split) - 1;
			$last_kode  = (int) $kode_split[$size];

			$temp_kode = '';
			for ($i = 0; $i < $size; $i++)
			{
				$temp_kode .= $kode_split[$i].'.';
			}

			$last_kode++;
			if ($last_kode < 10)
			{
				$last_kode = '0'.$last_kode;
			}
			$new_kode = $temp_kode.$last_kode;
		}

		return $new_kode;
	}

	public function generateParentCode()
	{
		$this->db->select('kode')
		         ->from('sm_unit_kerja')
		         ->where('id_parent is null')
		         ->order_by('id', 'desc')
		         ->limit(1, 0);
		$row = $this->db->get()->row();

		if ($row)
		{
			$new_kode = $row->kode;
			$new_kode++;
		} else
		{
			$new_kode = '1';
		}

		// add leading zero
		if ($new_kode < 10)
		{
			$new_kode = '0'.$new_kode;
		}

		return $new_kode;
	}
}
