<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Hasil_radiologi extends SYAM_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('App_model', 'default');
		$this->load->model('Masterdata_model', 'm_masterdata');
		$this->load->model('pelayanan/Pelayanan_model', 'm_pelayanan');

	}

	function index()
	{
		$data['active']  = 'Pelayanan';
		$data['modules'] = $this->default->getDataModules($this->session->userdata('id_account_group'));
		$is_login        = $this->session->userdata('is_login');

		if ($is_login === true) :
			$data['hospital'] = $this->default->getDataHospital();
			$this->load->view('layouts/index', $data);

		else :
			redirect('/');

		endif;
	}

	function page_hasil_radiologi()
	{
		$data['hospital']            = $this->default->getDataHospital();
		$data['jenis_radiologi']     = $this->m_masterdata->getJenisRadiologi();
		$data['kelas_tindakan']      = 'III';
		$data['jenis_layanan']       = $this->m_masterdata->getJenisPelayanan();
		$data['jenis_tindak_lanjut'] = '';
		$data['kondisi_keluar']      = $this->m_masterdata->getKondisiKeluar();
		$data['tindak_lanjut']       = $this->m_pelayanan->getTindakLanjut();
		$data['jenis_igd']           = $this->m_masterdata->getJenisIGD();
		$data['jenis']               = 'Penunjang';
		$data['jenis_layanan']       += array('Radiologi' => 'Radiologi', 'Hemodialisa' => 'Hemodialisa');
		$dokter_radiologi            = $this->db->select('sp.nama, stm.id')->from('sm_tenaga_medis stm')
		->join('sm_pegawai sp', 'stm.id_pegawai = sp.id')
		->where('stm.id_spesialisasi in (53,33)')->get()->result();
		$data['dokter_radiologi']    = ['' => 'Pilih Dokter Radiologi'];
		foreach ($dokter_radiologi as $item) {
			$data['dokter_radiologi'][$item->id] = $item->nama;
		}
		$data['status_hasil'] = $this->m_masterdata->getStatusHasil(true);
		$this->load->view('index', $data);
	}

	function printing_hasil_radiologi($id_radiologi, $type = 'print')
	{
		if ($id_radiologi === null) :
			exit();
		endif;

		$this->load->model('pelayanan/Pelayanan_model', 'm_pelayanan');
		$this->load->model('pendaftaran/Pendaftaran_model', 'm_pendaftaran');
		$this->load->model('Hasil_radiologi_model', 'm_hasil_radiologi');
		
		$dataRadiologi         = $this->m_pelayanan->get_pemeriksaan_radiologi((int)$id_radiologi, 'detail');
		$dataRadiologi->detail = $this->m_pelayanan->cetak_pemeriksaan_radiologi_detail((int)$dataRadiologi->id);
		$data['title']         = 'Hasil Radiologi';
		$data['hospital']      = $this->default->getDataHospital();
		$data['pendaftaran']   = $this->m_pendaftaran->getPendaftaranDetail($dataRadiologi->id_pendaftaran, $dataRadiologi->id_layanan_pendaftaran);
		$data['radiologi']     = $dataRadiologi;
		$data['diagnosa']      = $this->m_hasil_radiologi->getDiagnosaRadiologi($dataRadiologi->id_layanan_pendaftaran);
		$data['type']          = $type;

		foreach ($dataRadiologi->detail as $key => $value) {

			$xid = $value->id;

			$this->pacs = $this->m_hasil_radiologi->getConfigPacs();
			$this->getPacs = $this->m_hasil_radiologi->getConfigGetPacs();

			$url = $this->pacs->url;

			$uid = $value->accessnumber;

	        $header = $this->m_hasil_radiologi->authHeader();

	        $params=array(
	                    "UserName" => $this->pacs->usr,
	                    "Password" => $this->pacs->pas
	                );
	            
	        $output = $this->m_hasil_radiologi->postCurl($url, $params, $header);

	        $result = json_decode($output['result']);

	        if(isset($result->token)){

		        $tokenBearer = $result->token;

		        $getUrl = $this->getPacs->url.'/'.$uid;

				$tokenHeader = $this->m_hasil_radiologi->authBearer($tokenBearer);

		        $xoutput = getCurl($getUrl, $tokenHeader);

		        $arrX = json_decode($xoutput);

		        if(isset($arrX[0]->expertiseHtml)){

		        	if($arrX[0]->expertiseHtml !== null && $arrX[0]->expertiseHtml !== ''){

		        		$data['pacs'] = ["code" => 200,"message" => $arrX[0]->expertiseHtml];

			        } else {

			        	$hasilPacs = $this->m_hasil_radiologi->getHasilPACS((int)$xid);

						if($hasilPacs !== null && $hasilPacs !== ''){

							if($hasilPacs->html !== null && $hasilPacs->html !== ''){

								$data['pacs'] = ["code" => 200,"message" => $hasilPacs->html];

							} else {

								$data['pacs'] = ["code" => 201,"message" => 'Hasil Exspertise dari PACS Belum Tersedia'];

							}

						} else {

							$data['pacs'] = ["code" => 201,"message" => 'Hasil Exspertise dari PACS Belum Tersedia'];

						}

			        }

		        } else {

		        	$data['pacs'] = ["code" => 201,"message" => 'Hasil Exspertise dari PACS Belum Tersedia'];

		        }

		    } else {

		    	$data['pacs'] = ["code" => 201,"message" => 'Gagal ambil Token, Akses Integrasi Ke Pacs Gagal'];

		    }

	        break;

	    }

		if ($type !== 'data') {
			$this->load->view('hasil_radiologi/printing/cetak_hasil_radiologi', $data);
		} else {
			return $data;
		}
	}
}
