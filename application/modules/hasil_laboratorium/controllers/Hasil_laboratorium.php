<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Hasil_laboratorium extends SYAM_Controller 
{
    function __construct()
    {
        parent::__construct();
        $this->waktu_cetak = date('d/m/Y H:i');
        $this->load->model('App_model', 'default');
        $this->load->model('Masterdata_model', 'm_masterdata');
        $this->load->model('Hasil_laboratorium_pa_model', 'lab_pa');
        $this->load->model('Hasil_laboratorium_model', 'lab_model');

        $this->load->model('pelayanan/Pelayanan_model', 'm_pelayanan');
        $data_lis = $this->m_pelayanan->getLIS();

        $this->url = $data_lis->url;
        $this->user = $data_lis->user;
        $this->pass = $data_lis->pass;

    }

    function index()
    {
        $data['active'] = 'Pelayanan';
        $data['modules'] = $this->default->getDataModules($this->session->userdata('id_account_group'));
        $is_login = $this->session->userdata('is_login');

        if ($is_login === true) :
            $data['hospital'] = $this->default->getDataHospital();
            $this->load->view('layouts/index', $data);

        else :
            redirect('/');

        endif;
    }

    function page_hasil_laboratorium()
    {
        $data['jenis_laboratorium'] = $this->m_masterdata->getJenisLaboratorium();
        $data['kelas_tindakan'] = '1';
        $data['jenis_tindakan'] = 'Rawat Jalan';
        $data['jenis'] = 'Laboratorium';
        $data['jenis_tindak_lanjut'] = '';
        $data['kondisi_keluar'] = $this->m_masterdata->getKondisiKeluar();
        $data['tindak_lanjut']  = $this->m_pelayanan->getTindakLanjut();
        $data['jenis_igd'] = $this->m_masterdata->getJenisIGD();
		$data['jenis_layanan'] = $this->m_masterdata->getJenisPelayanan();
        $data['jenis_layanan'] += array('Laboratorium' => 'Laboratorium', 'Hemodialisa' => 'Hemodialisa');
        $data['keterangan_hasil'] = $this->m_masterdata->getKeteranganHasilLab();
		$data['status_hasil'] = $this->m_masterdata->getStatusHasil(true);
        $data['jenis_pemeriksaan'] = $this->lab_pa->jenisHasilPemeriksaan();
        $this->load->view('index',$data);
    }

	function printing_hasil_laboratorium($id_laboratorium, $type = "print")
	{
		if ($id_laboratorium === NULL) {
			exit;
		}

		$this->load->model('pelayanan/Pelayanan_model', 'm_pelayanan');
		$this->load->model('pendaftaran/Pendaftaran_model', 'm_pendaftaran');
		$this->load->model('hasil_laboratorium/Hasil_laboratorium_model', 'm_hasil_laboratorium');

		$dataLaboratorium = $this->m_pelayanan->get_pemeriksaan_laboratorium($id_laboratorium, 'detail');
		if (count((array)$dataLaboratorium) < 1) {
			exit;
		}

		$data['title'] = 'Hasil Laboratorium Patologi Klinik';
		$data['hospital'] = $this->default->getDataHospital();
		$data['pendaftaran'] = $this->m_pendaftaran->getPendaftaranDetail($dataLaboratorium->id_pendaftaran, $dataLaboratorium->id_layanan_pendaftaran);
		$data['laboratorium'] = $dataLaboratorium;
		$data['type'] = $type;
		$data['cetakan_lab'] = $this->lab_model->getCetakanLab($dataLaboratorium->id);
		$data['diagnosa'] = $this->lab_model->diagnosisLab($dataLaboratorium->id_layanan_pendaftaran);
		$data['waktu_cetak'] = $this->waktu_cetak;

		$ch = curl_init();
		curl_setopt_array($ch, array(
			CURLOPT_URL => $this->url.'/api/result/ono/'.$dataLaboratorium->kode.'/view/' ,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_USERAGENT,'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13',
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 120,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "GET",
			CURLOPT_HTTPHEADER => array('x-username: '.$this->user.'',
				'x-password: '.$this->pass.''),
		));
		$response = curl_exec($ch);
		$response_status = curl_getinfo($ch, CURLINFO_RESPONSE_CODE);
		$outputJSON = json_decode($response);
		curl_close($ch);

		if ($response !== '') :
			if (($outputJSON !== null) && ($response_status === 200)) :

				$gabung_item = array();

				foreach ($outputJSON->detail as $j => $key) {

					$gabung_item[$j]['flag'] = $key->flag;
					$gabung_item[$j]['order_testnm'] = $key->order_testnm;
					$gabung_item[$j]['test_comment'] = $key->test_comment;
					$gabung_item[$j]['test_cd'] = $key->test_cd;
					$gabung_item[$j]['test_group'] = $key->test_group;
					$gabung_item[$j]['nama'] = $this->m_hasil_laboratorium->getDataItemPemeriksaan($key->test_cd);
					$gabung_item[$j]['result_value'] = $key->result_value;
					$gabung_item[$j]['ref_range'] = $key->ref_range;
					$gabung_item[$j]['unit'] = $key->unit;
					$gabung_item[$j]['disp_seq'] = $key->disp_seq;

				}
				$data['lab'] = $gabung_item;
				$data['lab_value'] = $outputJSON;

				if ($type === 'json') :
					die(json_encode($data));
				else :
					$this->load->view('hasil_laboratorium/printing/cetak_hasil_laboratorium', $data);
				endif;
			else :
				echo "Koneksi bermasalah atau ONO tidak ditemukan";
			endif;
		else :
			echo "timeout";
		endif;
	}

    function cetak_pdf_laboratorium($ono)
    {        
        $data['ono'] = $ono;
        $data['noRm'] = $this->lab_model->getDataRmPasien($ono);
        $this->load->view('hasil_laboratorium/printing/cetak_pdf', $data);
    }

    function rekam_medis_hasil_laboratorium($id_laboratorium, $type = "print")
    {
        if ($id_laboratorium === NULL) {
            exit;
        }

        $this->load->model('pelayanan/Pelayanan_model', 'm_pelayanan');
        $this->load->model('pendaftaran/Pendaftaran_model', 'm_pendaftaran');
        $this->load->model('hasil_laboratorium/Hasil_laboratorium_model', 'm_hasil_laboratorium');

        $dataLaboratorium = $this->m_pelayanan->get_pemeriksaan_laboratorium($id_laboratorium, 'detail');
        if (count((array)$dataLaboratorium) < 1) {
            exit;
        }

        $data['title'] = 'Hasil Laboratorium Patologi Klinik';
        $data['hospital'] = $this->default->getDataHospital();
        $data['pendaftaran'] = $this->m_pendaftaran->getPendaftaranDetail($dataLaboratorium->id_pendaftaran, $dataLaboratorium->id_layanan_pendaftaran);
        $data['laboratorium'] = $dataLaboratorium;
        $data['type'] = $type;
        $data['cetakan_lab'] = $this->lab_model->getCetakanLab($dataLaboratorium->id);
        $data['waktu_cetak'] = $this->waktu_cetak;


        
        $ch = curl_init();
        curl_setopt_array($ch, array(
            CURLOPT_URL => $this->url.'/api/result/ono/'.$dataLaboratorium->kode.'/view/' ,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_USERAGENT,'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13',
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 120,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array('x-username: '.$this->user.'',
                'x-password: '.$this->pass.''),
        ));
        $response = curl_exec($ch);
        $response_status = curl_getinfo($ch, CURLINFO_RESPONSE_CODE);
        $outputJSON = json_decode($response);
        curl_close($ch);

        if ($response !== '') :
            if (($outputJSON !== null) && ($response_status === 200)) :

                $gabung_item = array();

                    foreach ($outputJSON->detail as $j => $key) {

                        $gabung_item[$j]['flag'] = $key->flag;
                        $gabung_item[$j]['order_testnm'] = $key->order_testnm;
                        $gabung_item[$j]['test_comment'] = $key->test_comment;
                        $gabung_item[$j]['test_cd'] = $key->test_cd;
                        $gabung_item[$j]['test_group'] = $key->test_group;
                        $gabung_item[$j]['nama'] = $this->m_hasil_laboratorium->getDataItemPemeriksaan($key->test_cd);
                        $gabung_item[$j]['result_value'] = $key->result_value;
                        $gabung_item[$j]['ref_range'] = $key->ref_range;
                        $gabung_item[$j]['unit'] = $key->unit;
                        $gabung_item[$j]['disp_seq'] = $key->disp_seq;
                        
                    }
                $data['lab'] = $gabung_item;
                $data['lab_value'] = $outputJSON;

                if ($type === 'json') :
                    die(json_encode($data));
                else :
                    $this->load->view('hasil_laboratorium/printing/rekam_medis_hasil_laboratorium', $data);
                endif;
            else :
                echo "Koneksi bermasalah atau ONO tidak ditemukan";
            endif;
        else :
            echo "timeout";
        endif;

    }

    function printing_hasil_laboratorium_pa($id_laboratorium, $type = null)
    {
        if ($id_laboratorium === NULL) {
            exit;
        }

        $this->load->model('pelayanan/Pelayanan_model', 'm_pelayanan');
        $this->load->model('pendaftaran/Pendaftaran_model', 'm_pendaftaran');
        $dataLaboratorium = $this->m_pelayanan->get_pemeriksaan_laboratorium($id_laboratorium, 'detail');
        if (count((array)$dataLaboratorium) < 1) {
            exit;
        }

        $dataLaboratorium->detail = NULL;
        $detail = $this->m_pelayanan->cetak_pemeriksaan_laboratorium_pa_detail($dataLaboratorium->id);
        if (0 < count((array)$detail)) {
            $dataLaboratorium->detail = $detail;
        }

        $input = $dataLaboratorium->nip_dokter_pjwb; 
        $regex = "/\//"; 
        preg_match_all($regex, $input, $hasil); 
        $nip_char = in_array("/", $hasil[0]); 

        if($nip_char === true){

            $data['x_char'] = "SIP. ";
        
        } else {

            $data['x_char'] = "NIP. ";
                
        }

        $data['title'] = 'Hasil Laboratorium Patologi Anatomi';
        $data['hospital'] = $this->default->getDataHospital();
        $data['pendaftaran'] = $this->m_pendaftaran->getPendaftaranDetail($dataLaboratorium->id_pendaftaran, $dataLaboratorium->id_layanan_pendaftaran);
        $data['laboratorium'] = $dataLaboratorium;
        $data['cetakan_lab'] = $this->lab_model->getCetakanLab($dataLaboratorium->id);
        $data['waktu_cetak'] = $this->waktu_cetak;
        
        if ($type !== 'data') {
            $this->load->view('hasil_laboratorium/printing/cetak_hasil_laboratorium_pa', $data);
        } else {
            return $data;
        }
    }

    function printing_hasil_laboratorium_mb($id_laboratorium, $type = "print")
    {
        if ($id_laboratorium === NULL) {
            exit;
        }

        $this->load->model('pelayanan/Pelayanan_model', 'm_pelayanan');
        $this->load->model('pendaftaran/Pendaftaran_model', 'm_pendaftaran');
        $dataLaboratorium = $this->m_pelayanan->get_pemeriksaan_laboratorium($id_laboratorium, 'detail');
        if (count((array)$dataLaboratorium) < 1) {
            exit;
        }

        $dataLaboratorium->detail = $this->m_pelayanan->cetak_pemeriksaan_laboratorium_detail($dataLaboratorium->id);
        $data['title'] = 'Hasil Laboratorium Mikrobiologi';
        $data['hospital'] = $this->default->getDataHospital();
        $data['pendaftaran'] = $this->m_pendaftaran->getPendaftaranDetail($dataLaboratorium->id_pendaftaran, $dataLaboratorium->id_layanan_pendaftaran);
        $data['laboratorium'] = $dataLaboratorium;
        $data['type'] = $type;
        
        if ($type !== 'data') {
            $this->load->view('hasil_laboratorium/printing/cetak_hasil_laboratorium_mb', $data);
        } else {
            return $data;
        }
    }

    function printing_list_pemeriksaan_laboratorium($id)
    {
        if ($id === NULL) {
            exit;
        }
        
        $this->load->model('pelayanan/Pelayanan_model', 'm_pelayanan');
        $this->load->model('pendaftaran/Pendaftaran_model', 'm_pendaftaran');
        $sql = "select id from sm_laboratorium where id = '" . $id . "' ";
        $lab_data = $this->db->query($sql)->row();
        if (count((array)$lab_data) < 1) {
            exit;
        }

        $id_laboratorium = $lab_data->id;
        $lab = $this->m_pelayanan->get_pemeriksaan_laboratorium($id_laboratorium, "detail");
        if (count((array)$lab) < 1) {
            exit;
        }
        $lab->detail 	= $this->m_pelayanan->cetak_pemeriksaan_laboratorium_detail($lab->id);		
        $lab->diagnosa  = $this->lab_model->getDiagnosaByIdLayananPendaftaran($lab->id_layanan_pendaftaran);
        $data["tipe"] 	= "konfirm";
        $data["title"] 	= "List Pemeriksaan Laboratorium";
        $data["pendaftaran"]  = $this->m_pendaftaran->getPendaftaranDetail($lab->id_pendaftaran, $lab->id_layanan_pendaftaran);
        $data["laboratorium"] = $lab;

        $this->load->view("printing/cetak_list_pemeriksaan_laboratorium", $data);
    }

    
}
