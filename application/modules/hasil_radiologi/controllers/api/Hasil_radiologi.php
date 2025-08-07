<?php

defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH.'/libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;
use Dompdf\Dompdf;

/**
 * @package         CodeIgniter
 * @subpackage      Rest Server
 * @category        Controller
 * @author          Faiz Muhammad Syam
 * @license         Syams Corporation
 */
class Hasil_radiologi extends REST_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->limit    = 10;
		date_default_timezone_set('Asia/Jakarta');
		$this->datetime = date('Y-m-d H:i:s');
		$this->load->model('Hasil_radiologi_model', 'm_hasil_radiologi');
		$this->load->model('pelayanan/Pelayanan_model', 'm_pelayanan');

		$this->pacs = $this->m_hasil_radiologi->getConfigPacs();
		$this->getPacs = $this->m_hasil_radiologi->getConfigGetPacs();

		$id_translucent = $this->session->userdata('id_translucent');
		if (empty($id_translucent)) :
			$this->response(array('error' => 'Anda belum login'), REST_Controller::HTTP_UNAUTHORIZED);
			exit();
		endif;
	}

	function get_list_hasil_radiologi_get()
	{
		if ( ! $this->get('page')) :
			$this->response(null, REST_Controller::HTTP_BAD_REQUEST); // (400)
		endif;

		$start  = ($this->get('page') - 1) * $this->limit;
		$search = [
			'tanggal_awal'     => safe_get('tanggal_awal'),
			'tanggal_akhir'    => safe_get('tanggal_akhir'),
			'no_register'      => safe_get('no_register'),
			'no_rm'            => safe_get('no_rm'),
			'nama'             => safe_get('nama'),
			'jenis_layanan'    => safe_get('jenis_layanan'),
			'status_hasil'     => safe_get('status_hasil'),
			'jenis_radiologi'  => safe_get('jenis_radiologi'),
			'dokter_radiologi' => safe_get('dokter_radiologi')
		];

		$data          = $this->m_hasil_radiologi->getListDataHasilRadiologi($this->limit, $start, $search);
		$data['page']  = (int) $this->get('page');
		$data['limit'] = $this->limit;

		if ($data) :
			$this->response($data, REST_Controller::HTTP_OK); // (200)
		endif;
	}

	function ambil_data_acc_get()
    {
        $idDetail = $this->get('id');
        $data = $this->m_hasil_radiologi->cekDataAcc($idDetail);

        if($data === null){

            $decode = ["metaData" => ["code" => 201,"message" => 'Tidak ada Data Username untuk id tersebut']];

        } else {

            $decode = ["metaData" => ["code" => 200,"data" => $data]];
        
        }

        $this->response($decode, REST_Controller::HTTP_OK);
        
    }

    function simpan_accession_number_post(){

        $this->db->trans_begin();

        $idDetail = safe_post('id_detail');

        $dataDetail = $this->m_hasil_radiologi->cekDataAcc((int)$idDetail);

        date_default_timezone_set('Asia/Jakarta');

        $updateAcc = array(

            "nama_pasien"  			=> $dataDetail->nama,
            "no_rm"        			=> $dataDetail->id,
            "acc_lama"     			=> $dataDetail->accessnumber,
            "acc_baru"     			=> $this->input->post('acc_number'),
            "id_users"        		=> $this->session->userdata('id_translucent'),
            "nama_user"        	 	=> $this->session->userdata('nama'),
            "instance_uid"         	=> $dataDetail->kode,
            "id_detail_radiologi"   => $dataDetail->id_detail_radiologi,
            "id_order_radiologi"    => $dataDetail->id_order_radiologi,
            "id_radiologi"         	=> $dataDetail->id_radiologi,
            "waktu"					=> date('Y-m-d H:i:s')
        
        );

        $this->db->insert('sm_radiologi_log_accnumber', $updateAcc);

        $updateOk = ["accessnumber" => $this->input->post('acc_number')];

        $this->db->where("id", (int)$idDetail, true)->update("sm_detail_radiologi", $updateOk);

        if ($this->db->trans_status() === FALSE) :
            $this->db->trans_rollback();
            $status = FALSE;
            $decode = ["status"=>'gagal',"message"=>"Accession Number Gagal diubah","id_pendaftaran" => $dataDetail->id_pendaftaran,"id_layanan" => $dataDetail->id_layanan_pendaftaran,"id_radiologi" => $dataDetail->id_radiologi];
        else :
            $this->db->trans_commit();
            $status = TRUE;
            $decode = ["status"=>'ok',"message"=>"Accession Number Berhasil diubah","id_pendaftaran" => $dataDetail->id_pendaftaran,"id_layanan" => $dataDetail->id_layanan_pendaftaran,"id_radiologi" => $dataDetail->id_radiologi];
        endif;

        $this->response($decode, REST_Controller::HTTP_OK);
    }

	function curlExspertise_get()
	{

		if ( ! $this->get('uid')) :
			$this->response(null, REST_Controller::HTTP_BAD_REQUEST); // (400)
			exit();
		endif;

		if ( ! $this->get('xid')) :
			$this->response(null, REST_Controller::HTTP_BAD_REQUEST); // (400)
			exit();
		endif;

		$url = $this->pacs->url;

		$uid = $this->get('uid');

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

	        	$xid = (int)$this->get('xid');

	        	if($arrX[0]->expertiseHtml !== null && $arrX[0]->expertiseHtml !== ''){

		        	$dataRadDetail = ["html" => $arrX[0]->expertiseHtml,"url_expertise" => $arrX[0]->expertiseUrl];

		            $this->db->where('id', $xid)->update('sm_detail_radiologi', $dataRadDetail);

		        	$decode = ["metaData" => ["code" => 200,"message" => $arrX[0]->expertiseHtml]];

		        } else {

		        	$hasilPacs = $this->m_hasil_radiologi->getHasilPACS($xid);

					if($hasilPacs !== null && $hasilPacs !== ''){

						if($hasilPacs->html !== null && $hasilPacs->html !== ''){

							$decode = ["metaData" => ["code" => 200,"message" => $hasilPacs->html]];

						} else {

							$decode = ["metaData" => ["code" => 201,"message" => 'Hasil Exspertise dari PACS Belum Tersedia']];

						}

					} else {

						$decode = ["metaData" => ["code" => 201,"message" => 'Hasil Exspertise dari PACS Belum Tersedia']];

					}

		        }

	        } else {

	        	$decode = ["metaData" => ["code" => 201,"message" => 'Hasil Exspertise dari PACS Belum Tersedia']];

	        }

	    } else {

            
            $decode = ["metaData" => ["code" => 201,"message" => 'Gagal Mendapatkan Token, Silakan Menghubungi IT']];


        }

        $this->response($decode, REST_Controller::HTTP_OK);

	}

	function viewPacs_get()
	{

		if ( ! $this->get('uid')) :
			$this->response(null, REST_Controller::HTTP_BAD_REQUEST); // (400)
			exit();
		endif;

		if ( ! $this->get('xid')) :
			$this->response(null, REST_Controller::HTTP_BAD_REQUEST); // (400)
			exit();
		endif;

		$url = $this->pacs->url;

		$uid = $this->get('uid');

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

	        if(isset($arrX[0]->imageUrl)){

	        	$xid = (int)$this->get('xid');

	        	if($arrX[0]->imageUrl !== null && $arrX[0]->imageUrl !== ''){

		        	$dataRadDetail = ["url" => $arrX[0]->imageUrl,"html" => $arrX[0]->expertiseHtml,"url_expertise" => $arrX[0]->expertiseUrl];

		            $this->db->where('id', $xid)->update('sm_detail_radiologi', $dataRadDetail);

		        	$decode = ["metaData" => ["code" => 200,"message" => 'Hasil Radiologi Sudah Tersedia, Silakan Klik Sekali Lagi',"url" => $arrX[0]->imageUrl]];

		        } else {

		        	$hasilPacs = $this->m_hasil_radiologi->getHasilPACS($xid);

					if($hasilPacs !== null){

						if($hasilPacs->url !== null && $hasilPacs->url !== ''){

							$decode = ["metaData" => ["code" => 200,"message" => 'Data PACS Sudah Tersedia']];

						} else {

							$decode = ["metaData" => ["code" => 201,"message" => 'Hasil Radiologi dari PACS Belum Tersedia']];

						}

					} else {

						$decode = ["metaData" => ["code" => 201,"message" => 'Hasil Radiologi dari PACS Belum Tersedia']];

					}

		        }

	        } else {

	        	$decode = ["metaData" => ["code" => 201,"message" => 'Hasil Radiologi dari PACS Belum Tersedia']];

	        }

	    } else {

            
            $decode = ["metaData" => ["code" => 201,"message" => 'Gagal Mendapatkan Token, Silakan Menghubungi IT']];


        }
        
        $this->response($decode, REST_Controller::HTTP_OK);

	}

	function viewExpertise_get()
	{

		if ( ! $this->get('uid')) :
			$this->response(null, REST_Controller::HTTP_BAD_REQUEST); // (400)
			exit();
		endif;

		if ( ! $this->get('xid')) :
			$this->response(null, REST_Controller::HTTP_BAD_REQUEST); // (400)
			exit();
		endif;

		$url = $this->pacs->url;

		$uid = $this->get('uid');

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

	        if(isset($arrX[0]->imageUrl)){

	        	$xid = (int)$this->get('xid');

	        	if($arrX[0]->imageUrl !== null && $arrX[0]->imageUrl !== ''){

		        	$dataRadDetail = ["url" => $arrX[0]->imageUrl,"html" => $arrX[0]->expertiseHtml,"url_expertise" => $arrX[0]->expertiseUrl];

		            $this->db->where('id', $xid)->update('sm_detail_radiologi', $dataRadDetail);

		        	$decode = ["metaData" => ["code" => 200,"message" => 'Hasil Radiologi Sudah Tersedia, Silakan Klik Sekali Lagi',"url" => $arrX[0]->expertiseUrl]];

		        } else {

		        	$hasilPacs = $this->m_hasil_radiologi->getHasilPACS($xid);

					if($hasilPacs !== null){

						if($hasilPacs->url !== null && $hasilPacs->url !== ''){

							$decode = ["metaData" => ["code" => 200,"message" => 'Data PACS Sudah Tersedia']];

						} else {

							$decode = ["metaData" => ["code" => 201,"message" => 'Hasil Radiologi dari PACS Belum Tersedia']];

						}

					} else {

						$decode = ["metaData" => ["code" => 201,"message" => 'Hasil Radiologi dari PACS Belum Tersedia']];

					}

		        }

	        } else {

	        	$decode = ["metaData" => ["code" => 201,"message" => 'Hasil Radiologi dari PACS Belum Tersedia']];

	        }

	    } else {

            
            $decode = ["metaData" => ["code" => 201,"message" => 'Gagal Mendapatkan Token, Silakan Menghubungi IT']];


        }
        
        $this->response($decode, REST_Controller::HTTP_OK);

	}

	function get_permintaan_pemeriksaan_radiologi_get()
	{
		if ( ! $this->get('id', true)) :
			$this->response(null, REST_Controller::HTTP_BAD_REQUEST);
		endif;


		$data         = $this->m_pelayanan->get_pemeriksaan_radiologi($this->get('id', true), 'detail');
		$data->detail = $this->m_pelayanan->get_pemeriksaan_radiologi_detail($data->id);

		if ( ! empty($data->id_order_radiologi)) :
			$id_order_radiologi = $data->id_order_radiologi;
			$sql                = "select * from sm_order_radiologi where id = '".$id_order_radiologi."'";
			$data->order        = $this->db->query($sql)->row_array();
		endif;

		$this->response($data, REST_Controller::HTTP_OK);
	}

	private function createAndSavePdf($idDetailRadiologi, $idRadiologi)
	{
	    // Memuat model yang diperlukan
	    $this->load->model('pelayanan/Pelayanan_model', 'm_pelayanan');
	    $this->load->model('pendaftaran/Pendaftaran_model', 'm_pendaftaran');
	    $this->load->model('Hasil_radiologi_model', 'm_hasil_radiologi');

	    // Mengambil data radiologi
	    $dataRadiologiDetail = $this->m_pelayanan->get_pemeriksaan_radiologi((int)$idRadiologi, 'detail');
	    $dataRadiologiDetail->detail = $this->m_pelayanan->cetak_pemeriksaan_radiologi_detail((int)$dataRadiologiDetail->id);
	    $data['title'] = 'Hasil Radiologi';
	    $data['hospital'] = $this->default->getDataHospital();
	    $data['pendaftaran'] = $this->m_pendaftaran->getPendaftaranDetail($dataRadiologiDetail->id_pendaftaran, $dataRadiologiDetail->id_layanan_pendaftaran);
	    $data['radiologi'] = $dataRadiologiDetail;
	    $data['diagnosa'] = $this->m_hasil_radiologi->getDiagnosaRadiologi($dataRadiologiDetail->id_layanan_pendaftaran);
	    $data['type'] = 'data'; // Menghindari tampilan langsung

	    // Proses untuk mengambil data PACS
	    foreach ($dataRadiologiDetail->detail as $key => $value) {

	        $xid = $value->id;

	        $this->pacs = $this->m_hasil_radiologi->getConfigPacs();
	        $this->getPacs = $this->m_hasil_radiologi->getConfigGetPacs();

	        $url = $this->pacs->url;
	        $uid = $value->accessnumber;
	        $header = $this->m_hasil_radiologi->authHeader();

	        $params = array(
	            "UserName" => $this->pacs->usr,
	            "Password" => $this->pacs->pas
	        );

	        $output = $this->m_hasil_radiologi->postCurl($url, $params, $header);
	        $result = json_decode($output['result']);

	        if (isset($result->token)) {

	            $tokenBearer = $result->token;
	            $getUrl = $this->getPacs->url . '/' . $uid;
	            $tokenHeader = $this->m_hasil_radiologi->authBearer($tokenBearer);

	            $xoutput = getCurl($getUrl, $tokenHeader);
	            $arrX = json_decode($xoutput);

	            if (isset($arrX[0]->expertiseHtml)) {

	                if ($arrX[0]->expertiseHtml !== null && $arrX[0]->expertiseHtml !== '') {
	                    $data['pacs'] = ["code" => 200, "message" => $arrX[0]->expertiseHtml];
	                } else {
	                    $hasilPacs = $this->m_hasil_radiologi->getHasilPACS((int)$xid);

	                    if ($hasilPacs !== null && $hasilPacs !== '') {
	                        if ($hasilPacs->html !== null && $hasilPacs->html !== '') {
	                            $data['pacs'] = ["code" => 200, "message" => $hasilPacs->html];
	                        } else {
	                            $data['pacs'] = ["code" => 201, "message" => 'Hasil Exspertise dari PACS Belum Tersedia'];
	                        }
	                    } else {
	                        $data['pacs'] = ["code" => 201, "message" => 'Hasil Exspertise dari PACS Belum Tersedia'];
	                    }
	                }

	            } else {
	                $data['pacs'] = ["code" => 201, "message" => 'Hasil Exspertise dari PACS Belum Tersedia'];
	            }

	        } else {
	            $data['pacs'] = ["code" => 201, "message" => 'Gagal ambil Token, Akses Integrasi Ke Pacs Gagal'];
	        }

	        break; // Hentikan setelah iterasi pertama, sesuai logika yang diberikan
	    }

	    // Ambil konten view sebagai output untuk PDF
	    $html = $this->load->view('hasil_radiologi/printing/cetak_hasil_radiologi', $data, true);

	    // Tentukan nama file yang unik
	    $cekDataAcc = $this->m_hasil_radiologi->cekDataAcc((int)$idDetailRadiologi);

		$uniqueFileName = '' . $cekDataAcc->id . '_' . $cekDataAcc->kode . '.pdf';
	    $filePath = FCPATH . 'resources/pdf_rad/' . $uniqueFileName;

	    // Inisialisasi Dompdf
	    $dompdf = new \Dompdf\Dompdf();
	    $dompdf->set_option('isHtml5ParserEnabled', true); // Enable HTML5 parsing
    	$dompdf->set_option('isRemoteEnabled', true); // Enable fetching remote resources
	    $dompdf->loadHtml($html);
	    $dompdf->setPaper('A4', 'portrait');
	    $dompdf->render();

	    // Simpan output ke file
	    file_put_contents($filePath, $dompdf->output());

	    // Simpan nama file ke database
	    $dataHasilPdf = array(
			"hasil_pdf"             => $uniqueFileName
		);
	    $this->db->where('id', (int)$idDetailRadiologi, true)->update('sm_detail_radiologi', $dataHasilPdf);

	    return $filePath; // Mengembalikan path file untuk digunakan jika diperlukan
	}


	function simpan_hasil_radiologi_post()
	{
		$this->db->trans_begin();
		if (safe_post('id_detail_radiologi') === "" | safe_post('id_radiologi') === "") :
			$message = array("status" => false);
			$this->response($message, REST_Controller::HTTP_OK);
		endif;

		$dataRadiologi = array(
			"id"             => safe_post("id_radiologi"),
			"waktu_hasil"    => $this->datetime,
			"id_radiografer" => safe_post("radiografer") !== "" ? safe_post("radiografer") : null, //tambahan

		);

		$dataHasilRadiologi = array(
			"id"             => safe_post("id_detail_radiologi"),
			"id_dokter"      => safe_post("dokter") !== "" ? safe_post("dokter") : null,
			"id_radiografer" => safe_post("radiografer") !== "" ? safe_post("radiografer") : null,
			"hasil"          => safe_post("hasil"),
			"kesan"          => safe_post("kesan"),
			"anjuran"        => safe_post("anjuran"),
		);

		$this->m_hasil_radiologi->updateHasilRadiologi($dataRadiologi, $dataHasilRadiologi);

		if ($this->db->trans_status() === false) :
			$this->db->trans_rollback();
			$status = false;
		else :
			$this->db->trans_commit();
			$status = true;
			$this->createAndSavePdf((int)safe_post("id_detail_radiologi"), (int)safe_post("id_radiologi"));
		endif;

		$message = array('status' => $status);
		$this->response($message, REST_Controller::HTTP_OK);
	}

	function hapus_pemeriksaan_radiologi_detail_delete($id)
	{
		$status = $this->m_hasil_radiologi->deletePemeriksaanRadiologiDetail($id);
		$this->response($status, REST_Controller::HTTP_OK);
	}

	function simpan_item_pemeriksaan_radiologi_post()
	{
		$this->db->trans_begin();
		if (safe_post('id_radiologi') === '') :
			$response = array('status' => false, 'message' => 'Kesalahan aplikasi, parameter kurang lengkap. segera hubungi bagian IT');
			$this->response($response, REST_Controller::HTTP_OK);
		endif;

		$id_radiologi = safe_post('id_radiologi');
		$tindakan     = safe_post('tindakan_radiologi');
		$cito         = safe_post('cito');

		// ambil data radiologinya
		$dataRadiologi = $this->db->select('rd.*, lp.jenis_layanan, lp.id as id_layanan_pendaftaran')->from('sm_radiologi as rd')->join('sm_layanan_pendaftaran as lp',
			'lp.id = rd.id_layanan_pendaftaran')->where('rd.id', $id_radiologi, true)->get()->row();

		$dataDetailRadiologi = array(
			'id_radiologi'       => $id_radiologi,
			'dokter'             => null,
			'tindakan_radiologi' => $tindakan,
			'cito'               => $cito,
			'rujuk'              => null,
			'instansi'           => null,
		);

		$jenisLayanan = $dataRadiologi->jenis_layanan;
		$this->load->model('order_radiologi/Order_radiologi_model', 'm_order_radiologi');
		$this->m_order_radiologi->simpanDataDetailRadiologi($dataRadiologi->id_layanan_pendaftaran, $dataDetailRadiologi, $jenisLayanan);
		if ($this->db->trans_status() === false) :
			$this->db->trans_rollback();
			$status  = false;
			$message = 'Gagal menambah item pemeriksaan radiologi';
		else :
			$this->db->trans_commit();
			$status  = true;
			$message = 'Berhasil menambah item pemeriksaan radiologi';
		endif;

		$response = array('status' => $status, 'message' => $message);
		$this->response($response, REST_Controller::HTTP_OK);
	}

	function simpan_hasil_echo_post()
	{
		$raw      = file_get_contents('php://input');
		$dataJSON = (object) json_decode($raw, true);

		$result   = $this->m_hasil_radiologi->simpanHasilEcho($dataJSON);
		$response = array('status' => $result['status'], 'message' => $result['message']);
		$this->response($response, REST_Controller::HTTP_OK);
	}

	function get_hasil_echo_get()
	{
		if ( ! $this->get('id', true)) :
			$this->response(null, REST_Controller::HTTP_BAD_REQUEST); // (400)
		endif;

		$data = $this->m_hasil_radiologi->getDataHasilEcho($this->get('id', true));
		if ( ! $data) :
			$data = '404';
		endif;
		$this->response($data, REST_Controller::HTTP_OK);
	}
}
