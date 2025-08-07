<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Kepegawaian extends SYAM_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('App_model', 'default');
		$this->load->model('Masterdata_model', 'auto');
	}

	function index()
	{
		$data['active']  = 'Masterdata';
		$data['modules'] = $this->default->getDataModules($this->session->userdata('id_account_group'));
		$is_login        = $this->session->userdata('is_login');

		if ($is_login === TRUE) :
			$data['hospital'] = $this->default->getDataHospital();
			$this->load->view('layouts/index', $data);
		else :
			redirect('/');
		endif;
	}

	function page_pegawai()
	{
		$this->load->view('index');
	}

	function tambah_pegawai()
	{
		$data = [
			'pendidikan' => $this->auto->getPendidikan()
		];
		$this->load->view('tambah_pegawai', $data);
	}

	function edit_pegawai($id)
	{
		$data_pegawai = $this->db
			->select("peg.*,kkp.*,peg.id, kkp.id as id_kk, jb.nama as jabatan, 
					  jb.id as id_jabatan, pr.nama as profesi,pr.id as id_profesi, 
					  kk.nama as nama_kota_kabupaten")
			->from('sm_pegawai peg')
			->join('sm_jabatan jb', 'peg.id_jabatan = jb.id', 'left')
			->join('sm_profesi pr', 'peg.id_profesi = pr.id', 'left')
			->join('sm_kk_pegawai kkp', 'peg.id = kkp.id_pegawai', 'left')
			->join('sm_kota_kabupaten kk', 'peg.id_kota_kabupaten = kk.id', 'left')
			->where('peg.id', $id)
			->get()->row();

		$data_kk_pegawai = $this->db->select('kkp.*')
		                            ->from('sm_pegawai peg')
		                            ->join('sm_kk_pegawai kkp', 'peg.id = kkp.id_pegawai', 'left')
		                            ->where('peg.id', $id)
		                            ->get()->row();

		$data_kk_pegawai_detail = $this->db->select('kkpd.*, kk.nama as tmp_lahir')
		                                   ->from('sm_pegawai peg')
		                                   ->join('sm_kk_pegawai kkp', 'peg.id = kkp.id_pegawai', 'left')
		                                   ->join('sm_kk_pegawai_detail kkpd', 'kkp.id = kkpd.id_kk')
		                                   ->join('sm_kota_kabupaten kk', 'kkpd.tempat_lahir = kk.id')
		                                   ->where('peg.id', $id)
		                                   ->get()->result();

		$data_riwayat_jabatan_pegawai = $this->db->select('rjp.*, uk.*, rjp.id')
		                                         ->from('sm_pegawai peg')
		                                         ->join('sm_riwayat_jabatan_pegawai rjp', 'peg.id = rjp.id_pegawai', 'left')
		                                         ->join('sm_unit_kerja uk', 'rjp.id_unit_kerja = uk.id')
		                                         ->where('peg.id', $id)
		                                         ->get()->result();

		$data_sk_kepangkatan_pegawai = $this->db->select('fskk.*, p.*, gas.*,fskk.id')
		                                        ->from('sm_pegawai peg')
		                                        ->join('sm_form_sk_kepangkatan fskk', 'peg.id = fskk.id_pegawai', 'left')
		                                        ->join('sm_pangkat p', 'fskk.id_pangkat = p.id')
		                                        ->join('sm_golongan_asn gas', 'p.id_golongan_asn = gas.id')
		                                        ->where('peg.id', $id)
		                                        ->get()->result();

		$this->load->view('edit_pegawai', [
			'data_pegawai'                 => $data_pegawai,
			'data_kk_pegawai'              => $data_kk_pegawai,
			'data_kk_pegawai_detail'       => $data_kk_pegawai_detail,
			'data_riwayat_jabatan_pegawai' => $data_riwayat_jabatan_pegawai,
			'data_sk_kepangkatan_pegawai'  => $data_sk_kepangkatan_pegawai,
			'pendidikan'                   => $this->auto->getPendidikan()
		]);
	}

	function detail_pegawai($id)
	{
		$data_pegawai = $this->db
			->select("peg.*,kkp.*,peg.id, kkp.id as id_kk, jb.nama as jabatan, 
					  jb.id as id_jabatan, pr.nama as profesi,pr.id as id_profesi, 
					  kk.nama as nama_kota_kabupaten")
			->from('sm_pegawai peg')
			->join('sm_jabatan jb', 'peg.id_jabatan = jb.id', 'left')
			->join('sm_profesi pr', 'peg.id_profesi = pr.id', 'left')
			->join('sm_kk_pegawai kkp', 'peg.id = kkp.id_pegawai', 'left')
			->join('sm_kota_kabupaten kk', 'peg.id_kota_kabupaten = kk.id', 'left')
			->where('peg.id', $id)
			->get()->row();

		$data_kk_pegawai = $this->db->select('kkp.*')
		                            ->from('sm_pegawai peg')
		                            ->join('sm_kk_pegawai kkp', 'peg.id = kkp.id_pegawai', 'left')
		                            ->where('peg.id', $id)
		                            ->get()->row();

		$data_kk_pegawai_detail = $this->db->select('kkpd.*, kk.nama as tmp_lahir')
		                                   ->from('sm_pegawai peg')
		                                   ->join('sm_kk_pegawai kkp', 'peg.id = kkp.id_pegawai', 'left')
		                                   ->join('sm_kk_pegawai_detail kkpd', 'kkp.id = kkpd.id_kk')
		                                   ->join('sm_kota_kabupaten kk', 'kkpd.tempat_lahir = kk.id')
		                                   ->where('peg.id', $id)
		                                   ->get()->result();

		$data_riwayat_jabatan_pegawai = $this->db->select('rjp.*, uk.*')
		                                         ->from('sm_pegawai peg')
		                                         ->join('sm_riwayat_jabatan_pegawai rjp', 'peg.id = rjp.id_pegawai', 'left')
		                                         ->join('sm_unit_kerja uk', 'rjp.id_unit_kerja = uk.id')
		                                         ->where('peg.id', $id)
		                                         ->order_by('rjp.tmt', 'desc')
		                                         ->get()->result();

		$data_sk_kepangkatan_pegawai = $this->db->select('fskk.*, p.*, gas.*')
		                                        ->from('sm_pegawai peg')
		                                        ->join('sm_form_sk_kepangkatan fskk', 'peg.id = fskk.id_pegawai', 'left')
		                                        ->join('sm_pangkat p', 'fskk.id_pangkat = p.id')
		                                        ->join('sm_golongan_asn gas', 'p.id_golongan_asn = gas.id')
		                                        ->where('peg.id', $id)
		                                        ->order_by('fskk.tmt', 'desc')
		                                        ->get()->result();

		$this->load->view('detail_pegawai', [
			'data_pegawai'                 => $data_pegawai,
			'data_kk_pegawai'              => $data_kk_pegawai,
			'data_kk_pegawai_detail'       => $data_kk_pegawai_detail,
			'data_riwayat_jabatan_pegawai' => $data_riwayat_jabatan_pegawai,
			'data_sk_kepangkatan_pegawai'  => $data_sk_kepangkatan_pegawai,
			'pendidikan'                   => $this->auto->getPendidikan()
		]);
	}
}
