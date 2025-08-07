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
class Order_radiologi extends REST_Controller
{

    function __construct()
    {
        parent::__construct();
		$this->limit = 10;
        $this->batas = 20;
        date_default_timezone_set('Asia/Jakarta');
		$this->datetime = date('Y-m-d H:i:s');
        $this->load->model('Order_radiologi_model', 'm_order_radiologi');
        $this->load->model('pelayanan/Pelayanan_model', 'm_pelayanan');
        $this->pacs = $this->m_order_radiologi->getConfigPacs();
        $this->postPacs = $this->m_order_radiologi->getConfigPostPacs();


        $id_translucent = $this->session->userdata('id_translucent');
        if (empty($id_translucent)) :
            $this->response(array('error' => 'Anda belum login'), REST_Controller::HTTP_UNAUTHORIZED);
            exit();
        endif;
    }

    private function start($page)
    {
        return (($page - 1) * $this->batas);
    }

    function data_bb_get()
    {

        if (!$this->get('id_layanan')) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
            die();
        endif;

        $idLayanan = (int)$this->get('id_layanan');

        if($this->get('jenis') !== null && $this->get('jenis') !== ''){

            if($this->get('jenis') === 'Rawat Inap'){

                $dataBb = $this->m_order_radiologi->getDataBbPasienRanap($idLayanan);

            } else if($this->get('jenis') === 'Rawat Jalan'){

                $a = $this->m_order_radiologi->getDataBbPasienRajal($idLayanan);

                if(is_object($a)){

                    if($a->berat_badan !== null && $a->berat_badan !== ''){

                        $dataBb = $a;

                    } else {

                        $dataBb = $this->m_order_radiologi->getDataBbPasienRanap($idLayanan);
                        
                    }

                } else if($a !== null && $a !== ''){

                    $dataBb = $a;

                } else {

                    $dataBb = $this->m_order_radiologi->getDataBbPasienRanap($idLayanan);

                }

            } else {

                $dataBb = $this->m_order_radiologi->getDataBbPasienRanap($idLayanan);

            }

        } else {

            $dataBb = $this->m_order_radiologi->getDataBbPasienRanap($idLayanan);

        }

        if($dataBb !== null && $dataBb !== ''){

            $decode = $dataBb;
            $kode = 200;            

        } else {

            $decode = 'Nodata';
            $kode = 201;

        }
        
        $this->response($decode, $kode);
        
    }

    function dataOrderRadiologi_get()
    {

        if (!$this->get('idOrder')) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
            die();
        endif;

        $idOrder = (int)$this->get('idOrder');

        $dataOrder = $this->m_order_radiologi->getDataOrder($idOrder);

        if($dataOrder->item !== null && $dataOrder->item !== ''){

            $decode = ["metaData" => ["code" => 202, "message" => $dataOrder]];
            $kode = 200;

        } else {

            if($dataOrder->id_dokter === null | $dataOrder->id_dokter === ''){

                $decode = ["metaData" => ["code" => 201, "message" => 'Dokter Pemesan / Perujuk belum diisi']];
                die(json_encode($decode));
                exit();

            }

            if($dataOrder->berat_badan === null | $dataOrder->berat_badan === ''){

                $decode = ["metaData" => ["code" => 201, "message" => 'Berat Badan belum diisi']];
                die(json_encode($decode));
                exit();

            }

            if($dataOrder !== null | $dataOrder !== false){

                $decode = ["metaData" => ["code" => 200, "message" => $dataOrder]];
                $kode = 200;

            } else {

                $decode = ["metaData" => ["code" => 201, "message" => 'Tidak Ada Data']];
                $kode = 201;

            }

        }

        $this->response($decode, $kode);
        
    }

    function update_order_radiologi_post()
    {
        $this->db->trans_begin();

        $status = true;
        $message = "";
        $id_layanan_pendaftaran = $this->post('id_layanan');
        $idOrder = (int)$this->post('idOrder');
        $item_post = $this->post('tindakan_rad');
        $cito = $this->post('cito');
        $item_rad = $this->post('item_rad');
        $item_rad_label = $this->post('item_rad_label');
        $keterangan = $this->post('keterangan');
        $bbRad = $this->post('bb_rad');
        $bb = $this->post('berat_badan');

        if ($bb === null | $bb === '') :
            $this->response(array('error' => 'Berat Badan Tidak Boleh Kosong'), REST_Controller::HTTP_BAD_REQUEST);
            exit();
        endif;

        if($idOrder === null | $idOrder === ''){

            $decode = ["metaData" => ["code" => 201, "message" => 'id Order Tidak Ada']];
            die(json_encode($decode));
            exit();

        }

        $sql = "select lp.*, pj.diskon
                from sm_layanan_pendaftaran lp
                left join sm_penjamin pj on (pj.id = lp.id_penjamin)
                where lp.id = '" . $id_layanan_pendaftaran . "' ";
        $layanan_pendaftaran = $this->db->query($sql)->row();

        if (0 < count((array)$layanan_pendaftaran)) {
            $arr_item = array();
            if (is_array($item_post)) {
                foreach ($item_post as $key => $value) {
                    if ($value !== '') {
                        $arr_item[$key]['layanan'] = $value;
                        $arr_item[$key]['cito'] = $cito[$key];
                        $arr_item[$key]['item_rad'] = $item_rad[$key];
                        $arr_item[$key]['item_rad_label'] = $item_rad_label[$key];
                        $arr_item[$key]['keterangan'] = $keterangan[$key];
                        $arr_item[$key]['berat_badan'] = $bb[$key];
                    }
                }

                if (is_array($arr_item)) {
                    $item = "[";
                    foreach ($arr_item as $key => $value) {
                        if ($value !== '') {
                            $cek = $this->m_order_radiologi->cekPenjaminanTarif($value['layanan'], $layanan_pendaftaran->id_penjamin);
                            $penjamin = 0;
                            $angkaCek = (int)$cek->jumlah;
                            if (0 < $angkaCek) {
                                $penjamin = $layanan_pendaftaran->id_penjamin;
                            }
                            // $item .= "{\"item\":\"" . $value['layanan'] . "\",\"penjamin\":\"" . $penjamin . "\",\"cito\":\"" . $value['cito'] . "\", \"item_rad\":" . ($value['item_rad'] !== "" ? $value['item_rad'] : "[]") . " , \"item_rad_label\":\"" . $value['item_rad_label'] . "\"}";
                            // if ($key < sizeof($arr_item) - 1) {
                            //     $item .= ",";
                            $item .= "{\"item\":\"" . $value['layanan'] . "\",\"penjamin\":\"" . $penjamin . "\",\"cito\":\"" . $value['cito'] . "\", \"item_rad\":" . ($value['item_rad'] !== "" ? $value['item_rad'] : "[]") . " , \"item_rad_label\":\"" . $value['item_rad_label'] . "\" , \"keterangan\":\"" . $value['keterangan'] . "\",\"berat_badan\":\"" . $value['berat_badan'] . "\"}"; //tambahan lina radiologi
                            if ($key < sizeof($arr_item) - 1) {
                                $item .= ",";
                            }
                        }
                    }
                    $item .= "]";
                    $request = array(
                        'jenis' => $this->post('jenis_rad'),
                        'item' => $item
                    );

                    $this->db->where('id', $idOrder)->update('sm_order_radiologi', $request);

                    $decode = ["metaData" => ["code" => 200, "message" => 'Berhasil update order radiologi']];

                } else {
                    
                    $decode = ["metaData" => ["code" => 201, "message" => 'Gagal order radiologi, anda belum memilih item pemeriksaan']];
                    die(json_encode($decode));
                    exit();
                
                }
            } else {

                $decode = ["metaData" => ["code" => 201, "message" => 'Gagal order radiologi, anda belum memilih item pemeriksaan']];
                die(json_encode($decode));
                exit();

            }

        } else {

            $decode = ["metaData" => ["code" => 201, "message" => 'Gagal order radiologi, Kesalahan sistem.<br/>Ulangi transaksi dan mohon segera hubungi admin']];
            die(json_encode($decode));
            exit();
            
        }

        if ($this->db->trans_status() === false) :
            $this->db->trans_rollback();
            
        else :
            $this->db->trans_commit();
        
        endif;

        $this->response($decode, 200);
    }

    function get_list_order_radiologi_get()
    {
        if (!$this->get('page')) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
        endif;
        
        $start          = ($this->get('page') - 1) * $this->limit;
        $search         = [
            'tanggal_awal'      => safe_get('tanggal_awal'),
            'tanggal_akhir'     => safe_get('tanggal_akhir'),
            'no_register'       => safe_get('no_register'),
            'no_rm'             => safe_get('no_rm'),
            'nama'              => safe_get('nama'),
            'dokter'            => safe_get('dokter'),
            'jenis'             => safe_get('jenis'),
            'status_konfirmasi' => safe_get('status_konfirmasi'),
        ];
        
        $data            = $this->m_order_radiologi->getListDataOrderRadiologi($this->limit, $start, $search);
        $data['page']    = (int) $this->get('page');
        $data['limit']   = $this->limit;

        if ($data) :
            $this->response($data, REST_Controller::HTTP_OK); // (200)
        endif;
    }
    
    function simpan_batal_order_radiologi_post()
	{
		if (safe_post('id_order') === '') :
			$this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
		endif;

        $data = array('status' => 'batal', 'keterangan' => safe_post('keterangan'));
		$status = $this->m_order_radiologi->updatePembatalanOrderRadiologi(safe_post('id_order'), $data);
		$this->response($status, REST_Controller::HTTP_OK); // (200)
    }
    
    function get_detail_order_radiologi_get()
    {
        if (!$this->get('id', true)) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST);
        endif;

        $data = $this->m_order_radiologi->getDataDetailOrderRadiologi($this->get('id', true));

        $idOrder = (int)$this->get('id', true);

        $dataOrder = $this->m_order_radiologi->dataOrderRadiologi($idOrder);
        $totalRespon = $this->m_order_radiologi->dataResponRadiologi($idOrder);

        if($dataOrder > 0){

            if($totalRespon === $dataOrder){

                $this->db->where("id", $idOrder)->update("sm_order_radiologi", array("respon_pacs" => "konfirm"));

            }

        }

        $this->response($data, REST_Controller::HTTP_OK);
    }

    function dokterRujukRadiologi_get()
    {
        $q = safe_get('q');
        $page = safe_get('page');
        $start = $this->start($page);
        $data = $this->m_order_radiologi->getDokterPerujuk($q, $start, $this->limit);
        if ((safe_get('page') == 1) & ($q == '')) :
            $pilih[] = array(
                'id' => '', 
                'nama' => '', 
                'spesialisasi' => ''
            );
            $data['data'] = array_merge($pilih, $data['data']);
            $data['total'] += 1;
        endif;
        $this->response($data, REST_Controller::HTTP_OK);
        
    }

    function ruang_sembilan_get()
    {
        $q = safe_get('q');
        $page = safe_get('page');
        $start = $this->start($page);
        $data = $this->m_order_radiologi->ruangSembilan($q, $start, $this->limit);

        if ((safe_get('page') == 1) & ($q == '')) :
            $pilih[] = array(
                'id' => '', 
                'nama' => ''
            );
            $data['data'] = array_merge($pilih, $data['data']);
            $data['total'] += 1;
        endif;

        $this->response($data, REST_Controller::HTTP_OK);
        
    }

    function dokterAuto_get()
    {
        $q = safe_get('q');
        $page = safe_get('page');
        $start = $this->start($page);
        
        $data = $this->m_order_radiologi->getAutoDokter($q, $start, $this->limit);
        if ((safe_get('page') == 1) & ($q == '')) :
            $pilih[] = array(
                'id' => '', 
                'nama' => '', 
                'spesialisasi' => ''
            );
            $data['data'] = array_merge($pilih, $data['data']);
            $data['total'] += 1;
        endif;
        $this->response($data, REST_Controller::HTTP_OK);
        
    }

    function simpan_dokter_perujuk_post(){

        $this->db->trans_begin();
        
        if (safe_post('id_order') === '' | safe_post('id_order') === null) {
            $decode = ["metaData" => ["code" => 201, "message" => 'id order Tidak Terdefinisi']];
                die(json_encode($decode));
                exit();
        }

        if (safe_post('dokter_perujuk_radiologi') === '' | safe_post('dokter_perujuk_radiologi') === null) {
            $decode = ["metaData" => ["code" => 201, "message" => 'Dokter Perujuk Tidak Terdefinisi']];
                die(json_encode($decode));
                exit();
        }

        $dataDokterPerujuk = ["id_dokter" => (int)safe_post('dokter_perujuk_radiologi')];

        $idOrder = (int)safe_post('id_order');

        $this->db->where('id', $idOrder)->update('sm_order_radiologi', $dataDokterPerujuk);

        $decode = ["metaData" => ["code" => 200, "message" => 'Update Dokter Perujuk Berhasil']];

        if ($this->db->trans_status() === false) :
            $this->db->trans_rollback();
            $status = false;
        else :
            $this->db->trans_commit();
            $status = true;
        endif;

        $this->response($decode, REST_Controller::HTTP_OK);
        
    }

    function booking_ulang_pacs_post(){

        if (safe_post('idDetail') === '') :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST);
            exit();
        endif;

        $idDetail = (int)safe_post('idDetail');

        $this->db->select("dr.*, odrad.id as id_order, odrad.berat_badan as bb_odrad, sr.kode, odrad.keterangan, lp.jenis_layanan, lp.id as id_layanan_pendaftaran, sr.id_dokter_pjwb, p.nama as nama_pasien, p.id as no_rm, p.tanggal_lahir, p.kelamin, g.nama as dokter_rujuk");
        $this->db->from("sm_detail_radiologi as dr");
        $this->db->join("sm_radiologi as sr", "sr.id = dr.id_radiologi", 'left');
        $this->db->join("sm_order_radiologi as odrad", "odrad.id = sr.id_order_radiologi", 'left');
        $this->db->join("sm_layanan_pendaftaran as lp", "lp.id = odrad.id_layanan_pendaftaran", 'left');
        $this->db->join("sm_pendaftaran as sp", "sp.id = lp.id_pendaftaran", 'left');
        $this->db->join("sm_pasien as p", "p.id = sp.id_pasien", 'left');
        $this->db->join("sm_tenaga_medis as tm", "tm.id = odrad.id_dokter", 'left');
        $this->db->join("sm_pegawai as g", "g.id = tm.id_pegawai", 'left');
        $this->db->where("dr.id", $idDetail, true);
        $datadetailRadiologi = $this->db->get()->row();

        $id_order = (int)$datadetailRadiologi->id_order;

        if($datadetailRadiologi->jenis_layanan === 'Poliklinik'){

            $this->db->select("sp.nama");
            $this->db->from("sm_order_radiologi as odrad");
            $this->db->join("sm_layanan_pendaftaran as lp", "lp.id = odrad.id_layanan_pendaftaran", 'left');
            $this->db->join("sm_spesialisasi as sp", "sp.id = lp.id_unit_layanan", 'left');
            $this->db->where("odrad.id", $id_order, true);
            $dataRuang = $this->db->get()->row();

            if(isset($dataRuang->nama)){

                if($dataRuang->nama !== null && $dataRuang->nama !== ''){
                    
                    $ruang = 'Poliklinik '.$dataRuang->nama;

                } else {

                    $decode = ["metaData" => ["code" => 201, "message" => 'Data Ruang Poliklinik Belum Tersedia']];
                    die(json_encode($decode));
                    exit();

                }

            } else {

                $decode = ["metaData" => ["code" => 201, "message" => 'Data Ruang Poliklinik Belum Tersedia']];
                die(json_encode($decode));
                exit();

            }

        } else if($datadetailRadiologi->jenis_layanan === 'Rawat Inap'){

            $this->db->select("b.nama");
            $this->db->from("sm_order_radiologi as odrad");
            $this->db->join("sm_layanan_pendaftaran as lp", "lp.id = odrad.id_layanan_pendaftaran", 'left');
            $this->db->join("sm_rawat_inap as ri", "ri.id_layanan_pendaftaran = lp.id", 'left');
            $this->db->join("sm_bangsal as b", "b.id = ri.id_bangsal", 'left');
            $this->db->where("odrad.id", $id_order, true);
            $dataRuang = $this->db->get()->row();

            if(isset($dataRuang->nama)){

                if($dataRuang->nama !== null && $dataRuang->nama !== ''){
                    
                    $ruang = $dataRuang->nama;

                } else {

                    $decode = ["metaData" => ["code" => 201, "message" => 'Data Ruang Rawat Inap Belum Tersedia']];
                    die(json_encode($decode));
                    exit();

                }

            } else {

                $decode = ["metaData" => ["code" => 201, "message" => 'Data Ruang Rawat Inap Belum Tersedia']];
                die(json_encode($decode));
                exit();

            }

        } else if($datadetailRadiologi->jenis_layanan === 'Intensive Care'){

            $this->db->select("b.nama");
            $this->db->from("sm_order_radiologi as odrad");
            $this->db->join("sm_layanan_pendaftaran as lp", "lp.id = odrad.id_layanan_pendaftaran", 'left');
            $this->db->join("sm_intensive_care as ri", "ri.id_layanan_pendaftaran = lp.id", 'left');
            $this->db->join("sm_bangsal as b", "b.id = ri.id_bangsal", 'left');
            $this->db->where("odrad.id", $id_order, true);
            $dataRuang = $this->db->get()->row();

            if(isset($dataRuang->nama)){

                if($dataRuang->nama !== null && $dataRuang->nama !== ''){
                    
                    $ruang = $dataRuang->nama;

                } else {

                    $decode = ["metaData" => ["code" => 201, "message" => 'Data Ruang ICU Belum Tersedia']];
                    die(json_encode($decode));
                    exit();

                }

            } else {

                $decode = ["metaData" => ["code" => 201, "message" => 'Data Ruang ICU Belum Tersedia']];
                die(json_encode($decode));
                exit();

            }

        } else {

            if($datadetailRadiologi->jenis_layanan !== null && $datadetailRadiologi->jenis_layanan !== ''){
                
                $ruang = $datadetailRadiologi->jenis_layanan;

            } else {

                $decode = ["metaData" => ["code" => 201, "message" => 'Jenis Layanan Tidak Tersedia']];
                die(json_encode($decode));
                exit();

            }

        }

        $url = $this->pacs->url;

        $header = $this->m_order_radiologi->authHeader();

        $params=array(
                    "UserName" => $this->pacs->usr,
                    "Password" => $this->pacs->pas
                );
            
        $output = $this->m_order_radiologi->postCurl($url, $params, $header);

        $result = json_decode($output['result']);

        if(isset($result->token)){

            $tokenBearer = $result->token;

            $postUrl = $this->postPacs->url;

            $tokenHeader = $this->m_order_radiologi->authBearer($tokenBearer);

            $accessNumber = $datadetailRadiologi->accessnumber;

            $kodeModality = $this->m_order_radiologi->cekIdRuang((int)$datadetailRadiologi->ruangan);

            $dokterRadiologi = $this->m_order_radiologi->cekDokterRadiologi((int)$datadetailRadiologi->id_dokter_pjwb);

            $namaLayanan = $this->m_order_radiologi->cekNamaLayanan((int)$datadetailRadiologi->id_tarif);

            date_default_timezone_set('Asia/Jakarta');

            $tlahir = date('Y-m-d\TH:i:s', strtotime($datadetailRadiologi->tanggal_lahir));

            if($kodeModality->id === '4'){

                $idLayanan = $namaLayanan->id;

            } else {

                $idLayanan = $namaLayanan->nama;                        

            }

            if($datadetailRadiologi->kelamin === 'L'){

                $jKel = 'M';

            } else if($datadetailRadiologi->kelamin === 'P'){

                $jKel = 'F';

            } else {
                
                $decode = ["metaData" => ["code" => 201, "message" => 'Jenis Kelamin Tidak Terdefinisi']];
                die(json_encode($decode));
                exit();

            }

            if ($datadetailRadiologi->berat_badan === null){

                if($datadetailRadiologi->bb_odrad !== null){

                    $bb = floatval($datadetailRadiologi->bb_odrad);

                } else {

                    $idLayananPendaftaran = (int)$datadetailRadiologi->id_layanan_pendaftaran;

                    $dataBb = $this->m_order_radiologi->getDataBbPasienRanap($idLayananPendaftaran);

                    if($dataBb->berat_badan !== null){

                        $bb = floatval($dataBb->berat_badan);

                    } else {

                        $decode = ["metaData" => ["code" => 201, "message" => 'Berat Badan Pasien Tidak ada']];
                        die(json_encode($decode));
                        exit();

                    }

                }
                
            } else {

                $bb = floatval($datadetailRadiologi->berat_badan);

            }

            $checkProfilPasien = $this->db->query("select * from sm_profil_pasien where id_pasien = '" . $datadetailRadiologi->no_rm . "'")->row();

            $dataProfilPasien = array(
                
                'id_pasien' => $datadetailRadiologi->no_rm,
                'berat_badan'  => $bb !== '' ? $bb : NULL,
            
            );

            
            if ($checkProfilPasien) :
                $this->db->where('id_pasien', $datadetailRadiologi->no_rm, true)->update('sm_profil_pasien', $dataProfilPasien);
            else :
                $this->db->insert('sm_profil_pasien', $dataProfilPasien);
            endif;

            date_default_timezone_set('Asia/Jakarta');

            $waktuKonfirmasi = date('Y-m-d\TH:i:s', strtotime($this->datetime));

            if($datadetailRadiologi->keterangan !== null && $datadetailRadiologi->keterangan !== ''){

                $keterangan = $datadetailRadiologi->keterangan;
            
            } else {

                $keterangan = NULL;

            }

            if($datadetailRadiologi->cito === 'Cito'){

                $cito = 'HIGH';

            } else {

                $cito = 'LOW';

            }

            $username = $dokterRadiologi->username;

            $postRequest = array("item_ID" => 0,
                                 "taG_ACCESSION_NUMBER" => $accessNumber,
                                 "taG_MODALITY" => $kodeModality->code_modality,
                                 "taG_INSTITUTION_NAME" => "RSUD Kota Tangerang",
                                 "taG_REFERRING_PHYSICIAN_NAME" => $datadetailRadiologi->dokter_rujuk,
                                 "taG_PATIENT_NAME" => $datadetailRadiologi->nama_pasien,
                                 "taG_PATIENT_ID" => $datadetailRadiologi->no_rm,
                                 "taG_PATIENT_BIRTH_DATE" => $tlahir,
                                 "taG_PATIENT_SEX" => $jKel,
                                 "taG_PATIENT_WEIGHT" => $bb,
                                 "taG_STUDY_INSTANCE_UID" => $datadetailRadiologi->kode,
                                 "taG_REQUESTING_PHYSICIAN" => $dokterRadiologi->nama,
                                 "taG_REQUESTED_PROCEDURE_DESCRIPTION" => $namaLayanan->nama,
                                 "taG_ADMISSION_ID" => $this->session->userdata("id_translucent"),
                                 "taG_SCHEDULED_STATION_AE_TITLE" => $kodeModality->aetitle,
                                 "taG_SCHEDULED_PROCEDURE_STEP_START_DATE" => $waktuKonfirmasi,
                                 "taG_SCHEDULED_PROCEDURE_STEP_START_TIME" => $waktuKonfirmasi,
                                 "taG_SCHEDULED_PERFORMING_PHYSICIAN_NAME" => NULL,
                                 "taG_SCHEDULED_PROCEDURE_STEP_DESCRIPTION" => $idLayanan,
                                 "taG_SCHEDULED_PROCEDURE_STEP_ID" => $datadetailRadiologi->id_radiologi,
                                 "taG_SCHEDULED_PROCEDURE_STEP_LOCATION" => $kodeModality->nama_ruangan,
                                 "taG_REQUESTED_PROCEDURE_ID" => $datadetailRadiologi->id_radiologi,
                                 "taG_REASON_FOR_THE_REQUESTED_PROCEDURE" => $keterangan,
                                 "taG_REQUESTED_PROCEDURE_PRIORITY" => $cito,
                                 "taG_USERNAME_IN_CHARGE" => $username,
                                 "taG_PATIENT_SOURCE" => $ruang,
                                 "taG_CLINICAL" => $datadetailRadiologi->keterangan_klinis);

            $postOutput = $this->m_order_radiologi->postCurl($postUrl, $postRequest, $tokenHeader);

            if($postOutput !== false){

                if($postOutput['respon'] === 201){

                    $resultHasil = json_decode($postOutput['result']);

                    $decode = ["metaData" => ["code" => 200,"message" => $resultHasil]];

                    $dataRadDetail = ["respon" => $postOutput['respon'],"keterangan_respon" => $postOutput['result']];

                    $this->db->where('id', $idDetail)->update('sm_detail_radiologi', $dataRadDetail);

                } else {

                    $decode = ["metaData" => ["code" => 201,"message" => $postOutput['result']]];

                    $resultHasil = $postOutput['result'];

                    $dataRadDetail = ["respon" => $postOutput['respon'],"keterangan_respon" => $resultHasil];

                    $this->db->where('id', $idDetail)->update('sm_detail_radiologi', $dataRadDetail);

                }

            } else {

                $decode = ["metaData" => ["code" => 201,"message" => 'Bridging Radiologi Gagal']];

                $dataRadDetail = ["respon" => 201,"keterangan_respon" => 'Bridging Radiologi Gagal'];

                $this->db->where('id', $idDetail)->update('sm_detail_radiologi', $dataRadDetail);

            }

            $dataOrder = $this->m_order_radiologi->dataOrderRadiologi($id_order);
            $totalRespon = $this->m_order_radiologi->dataResponRadiologi($id_order);

            if($dataOrder > 0){

                if($totalRespon === $dataOrder){

                    $this->db->where("id", $id_order)->update("sm_order_radiologi", array("respon_pacs" => "konfirm"));

                }

            }

        } else {

            
            $decode = ["metaData" => ["code" => 201,"message" => 'Gagal Mendapatkan Token, Silakan Menghubungi IT']];


        }

        $this->response($decode, REST_Controller::HTTP_OK);

    }

    function validasiString($input) {
        // Menghilangkan spasi di awal dan akhir string
        $trimmedInput = trim($input);

        // Memeriksa apakah string setelah di-trim masih memiliki panjang lebih dari 3 karakter
        if (strlen($trimmedInput) > 3) {
            // String valid
            return true;
        } else {
            // String tidak valid
            return false;
        }
    }

    function simpan_data_order_radiologi_post()
    {
        $this->db->trans_begin();
        
        if (safe_post('id_order') === '') :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST);
            exit();
        endif;

        if (safe_post('idkirim') === '') :
            $decode = ["metaData" => ["code" => 201, "message" => 'Tidak ada Id Kirim']];
            die(json_encode($decode));
            exit();
        endif;

        $idKirim = safe_post('idkirim');

        $idTrf = safe_post('id_tarif'.$idKirim);
        $idOrd = safe_post('id_order');

        $this->db->select("dr.id");
        $this->db->from("sm_detail_radiologi as dr");
        $this->db->join("sm_radiologi as sr", "sr.id = dr.id_radiologi", 'left');
        $this->db->join("sm_order_radiologi as odrad", "odrad.id = sr.id_order_radiologi", 'left');
        $this->db->where("dr.id_tarif", $idTrf, true);
        $this->db->where("odrad.id", $idOrd, true);
        $datadetailRadiologi = $this->db->get()->row();

        if ($datadetailRadiologi !== null) :
            $decode = ["metaData" => ["code" => 201, "message" => 'Tindakan ini sudah pernah diorder pada id order yang sama']];
            die(json_encode($decode));
            exit();
        endif;

        if (safe_post('total') === '') :
            $decode = ["metaData" => ["code" => 201, "message" => 'Tidak ada Data Radiologi']];
            die(json_encode($decode));
            exit();
        endif;

        if (safe_post('dokter'.$idKirim) === '') :
            $decode = ["metaData" => ["code" => 201, "message" => 'Dokter Radiologi Tidak Ada']];
            die(json_encode($decode));
            exit();
        endif;

        if (safe_post('id_tarif'.$idKirim) === '') :
            $decode = ["metaData" => ["code" => 201, "message" => 'Tidak Ada id Tarif']];
            die(json_encode($decode));
            exit();
        endif;

        if (safe_post("ruang_radiologi".$idKirim) === '') :
            $decode = ["metaData" => ["code" => 201, "message" => 'Tidak Ada Ruang Radiologi']];
            die(json_encode($decode));
            exit();
        endif;

        if($this->validasiString(safe_post("keterangan_klinis".$idKirim)) === false){

            $decode = ["metaData" => ["code" => 201, "message" => 'Silakan isi Keterangan Klinis dengan Benar dan lebih dari 3 karakter']];
            die(json_encode($decode));
            exit();

        }

        $id_order = safe_post('id_order');
        $total = (int)safe_post('total');
        $this->db->select("odrad.*, p.nama as nama_pasien, p.id as no_rm, p.tanggal_lahir, p.kelamin, g.nama as dokter_rujuk, odrad.jenis as jenis_radiologi, lp.jenis_layanan, lp.id_pendaftaran");
        $this->db->from("sm_order_radiologi as odrad");
        $this->db->join("sm_layanan_pendaftaran as lp", "lp.id = odrad.id_layanan_pendaftaran", 'left');
        $this->db->join("sm_pendaftaran as sp", "sp.id = lp.id_pendaftaran", 'left');
        $this->db->join("sm_pasien as p", "p.id = sp.id_pasien", 'left');
        $this->db->join("sm_tenaga_medis as tm", "tm.id = odrad.id_dokter", 'left');
        $this->db->join("sm_pegawai as g", "g.id = tm.id_pegawai", 'left');
        $this->db->where("odrad.id", $id_order, true);
        $dataOrderRadiologi = $this->db->get()->row();
        if (!$dataOrderRadiologi) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST);
        endif;
        if ($dataOrderRadiologi->kelamin === '' | $dataOrderRadiologi->kelamin === null) :
            $decode = ["metaData" => ["code" => 201, "message" => 'Jenis Kelamin Pasien Tidak ada']];
            die(json_encode($decode));
            exit();
        endif;

        if (safe_post("berat_badan".$idKirim) === ''){

            if($dataOrderRadiologi->berat_badan !== null){

                $beratBb = $dataOrderRadiologi->berat_badan;

            } else {

                $idLayananPendaftaran = (int)$dataOrderRadiologi->id_layanan_pendaftaran;

                $dataBb = $this->m_order_radiologi->getDataBbPasienRanap($idLayananPendaftaran);

                if($dataBb->berat_badan !== null){

                    $beratBb = $dataBb->berat_badan;

                } else {

                    $decode = ["metaData" => ["code" => 201, "message" => 'Berat Badan Pasien Tidak ada']];
                    die(json_encode($decode));
                    exit();

                }

            }
            
        } else {

            $beratBb = safe_post("berat_badan".$idKirim);

        }

        $checkProfilPasien = $this->db->query("select * from sm_profil_pasien where id_pasien = '" . $dataOrderRadiologi->no_rm . "'")->row();

        $dataProfilPasien = array(
            
            'id_pasien' => $dataOrderRadiologi->no_rm,
            'berat_badan'  => $beratBb !== '' ? $beratBb : NULL,
        
        );

        
        if ($checkProfilPasien) :
            $this->db->where('id_pasien', $dataOrderRadiologi->no_rm, true)->update('sm_profil_pasien', $dataProfilPasien);
        else :
            $this->db->insert('sm_profil_pasien', $dataProfilPasien);
        endif;

        if($dataOrderRadiologi->jenis_layanan === 'Poliklinik'){

            $this->db->select("sp.nama");
            $this->db->from("sm_order_radiologi as odrad");
            $this->db->join("sm_layanan_pendaftaran as lp", "lp.id = odrad.id_layanan_pendaftaran", 'left');
            $this->db->join("sm_spesialisasi as sp", "sp.id = lp.id_unit_layanan", 'left');
            $this->db->where("odrad.id", $id_order, true);
            $dataRuang = $this->db->get()->row();

            if(isset($dataRuang->nama)){

                if($dataRuang->nama !== null && $dataRuang->nama !== ''){
                    
                    $ruang = 'Poliklinik '.$dataRuang->nama;

                } else {

                    $decode = ["metaData" => ["code" => 201, "message" => 'Data Ruang Poliklinik Belum Tersedia']];
                    die(json_encode($decode));
                    exit();

                }

            } else {

                $decode = ["metaData" => ["code" => 201, "message" => 'Data Ruang Poliklinik Belum Tersedia']];
                die(json_encode($decode));
                exit();

            }

        } else if($dataOrderRadiologi->jenis_layanan === 'Rawat Inap'){

            $this->db->select("b.nama");
            $this->db->from("sm_order_radiologi as odrad");
            $this->db->join("sm_layanan_pendaftaran as lp", "lp.id = odrad.id_layanan_pendaftaran", 'left');
            $this->db->join("sm_rawat_inap as ri", "ri.id_layanan_pendaftaran = lp.id", 'left');
            $this->db->join("sm_bangsal as b", "b.id = ri.id_bangsal", 'left');
            $this->db->where("odrad.id", $id_order, true);
            $dataRuang = $this->db->get()->row();

            if(isset($dataRuang->nama)){

                if($dataRuang->nama !== null && $dataRuang->nama !== ''){
                    
                    $ruang = $dataRuang->nama;

                } else {

                    $decode = ["metaData" => ["code" => 201, "message" => 'Data Ruang Rawat Inap Belum Tersedia']];
                    die(json_encode($decode));
                    exit();

                }

            } else {

                $decode = ["metaData" => ["code" => 201, "message" => 'Data Ruang Rawat Inap Belum Tersedia']];
                die(json_encode($decode));
                exit();

            }

        } else if($dataOrderRadiologi->jenis_layanan === 'Intensive Care'){

            $this->db->select("b.nama");
            $this->db->from("sm_order_radiologi as odrad");
            $this->db->join("sm_layanan_pendaftaran as lp", "lp.id = odrad.id_layanan_pendaftaran", 'left');
            $this->db->join("sm_intensive_care as ri", "ri.id_layanan_pendaftaran = lp.id", 'left');
            $this->db->join("sm_bangsal as b", "b.id = ri.id_bangsal", 'left');
            $this->db->where("odrad.id", $id_order, true);
            $dataRuang = $this->db->get()->row();

            if(isset($dataRuang->nama)){

                if($dataRuang->nama !== null && $dataRuang->nama !== ''){
                    
                    $ruang = $dataRuang->nama;

                } else {

                    $decode = ["metaData" => ["code" => 201, "message" => 'Data Ruang ICU Belum Tersedia']];
                    die(json_encode($decode));
                    exit();

                }

            } else {

                $decode = ["metaData" => ["code" => 201, "message" => 'Data Ruang ICU Belum Tersedia']];
                die(json_encode($decode));
                exit();

            }

        } else {

            if($dataOrderRadiologi->jenis_layanan !== null && $dataOrderRadiologi->jenis_layanan !== ''){
                
                $ruang = $dataOrderRadiologi->jenis_layanan;

            } else {

                $decode = ["metaData" => ["code" => 201, "message" => 'Jenis Layanan Tidak Tersedia']];
                die(json_encode($decode));
                exit();

            }

        }

        $this->load->model('pelayanan/Pelayanan_model', 'm_pelayanan');

        $dokter_dpjp = safe_post('dokter'.$idKirim);

        $dataRadiologi = array(
            "id_layanan_pendaftaran" => $dataOrderRadiologi->id_layanan_pendaftaran,
            "id_order_radiologi" => $id_order,
            "jenis" => $dataOrderRadiologi->jenis_radiologi,
            "id_dokter" => $dataOrderRadiologi->id_dokter,
            "id_dokter_pjwb" => $dokter_dpjp,
            "waktu_konfirm" => $this->datetime,
            "id_users" => $this->session->userdata("id_translucent")
        );


        $tindakanRadiologi = safe_post('id_tarif'.$idKirim);
        $idRadiologi = $this->m_order_radiologi->simpanDataRadiologi($dataRadiologi, $tindakanRadiologi);

        $kodeGenerate = $this->m_order_radiologi->generateKodePenunjang((int)$idRadiologi);

        date_default_timezone_set('Asia/Jakarta');

        if ($idRadiologi !== NULL){
            $dataDetailRadiologi = array(
                "id_radiologi" => $idRadiologi,
                "tindakan_radiologi" => safe_post("id_tarif".$idKirim),
                "id_dokter" => $dataOrderRadiologi->id_dokter,
                "dokter" => $this->post("dokter".$idKirim),
                "cito" => safe_post("cito".$idKirim),
                "keterangan_klinis" => safe_post("keterangan_klinis".$idKirim),
                "rujuk" => safe_post("rujuk".$idKirim),
                "berat_badan" => $beratBb,
                "ruangan" => safe_post("ruang_radiologi".$idKirim),
                "accessnumber" => date('Y-m-d').''.$idRadiologi,
                "instansi" => safe_post("instansi")
            );

            $jenisLayanan = $dataOrderRadiologi->jenis_layanan;

            $dataDetail = $this->m_order_radiologi->simpanDataDetailRadiologi($dataRadiologi["id_layanan_pendaftaran"], $dataDetailRadiologi, $jenisLayanan);

            if(isset($dataDetail['metaData'])){

                $url = $this->pacs->url;

                $header = $this->m_order_radiologi->authHeader();

                $params=array(
                            "UserName" => $this->pacs->usr,
                            "Password" => $this->pacs->pas
                        );
                    
                $output = $this->m_order_radiologi->postCurl($url, $params, $header);

                $result = json_decode($output['result']);

                if(isset($result->token)){

                    $tokenBearer = $result->token;

                    $postUrl = $this->postPacs->url;

                    $tokenHeader = $this->m_order_radiologi->authBearer($tokenBearer);

                    date_default_timezone_set('Asia/Jakarta');

                    $accessNumber = date('Y-m-d').''.$idRadiologi;

                    $kodeModality = $this->m_order_radiologi->cekIdRuang(safe_post("ruang_radiologi".$idKirim));

                    $dokterRadiologi = $this->m_order_radiologi->cekDokterRadiologi($dokter_dpjp);

                    $namaLayanan = $this->m_order_radiologi->cekNamaLayanan(safe_post('id_tarif'.$idKirim));

                    date_default_timezone_set('Asia/Jakarta');

                    $tlahir = date('Y-m-d\TH:i:s', strtotime($dataOrderRadiologi->tanggal_lahir));

                    if($kodeModality->id === '4'){

                        $idLayanan = $namaLayanan->id;

                    } else {

                        $idLayanan = $namaLayanan->nama;                        

                    }


                    if($dataOrderRadiologi->kelamin === 'L'){

                        $jKel = 'M';

                    } else if($dataOrderRadiologi->kelamin === 'P'){

                        $jKel = 'F';

                    } else {
                        
                        $decode = ["metaData" => ["code" => 201, "message" => 'Jenis Kelamin Tidak Terdefinisi']];
                        die(json_encode($decode));
                        exit();

                    }

                    $bb = floatval($beratBb);

                    date_default_timezone_set('Asia/Jakarta');

                    $waktuKonfirmasi = date('Y-m-d\TH:i:s', strtotime($this->datetime));

                    if($dataOrderRadiologi->keterangan !== null && $dataOrderRadiologi->keterangan !== ''){

                        $keterangan = $dataOrderRadiologi->keterangan;
                    
                    } else {

                        $keterangan = NULL;

                    }

                    if(safe_post('cito'.$idKirim) === 'ya'){

                        $cito = 'HIGH';

                    } else {

                        $cito = 'LOW';

                    }

                    $username = $dokterRadiologi->username;

                    $postRequest = array("item_ID" => 0,
                                         "taG_ACCESSION_NUMBER" => $accessNumber,
                                         "taG_MODALITY" => $kodeModality->code_modality,
                                         "taG_INSTITUTION_NAME" => "RSUD Kota Tangerang",
                                         "taG_REFERRING_PHYSICIAN_NAME" => $dataOrderRadiologi->dokter_rujuk,
                                         "taG_PATIENT_NAME" => $dataOrderRadiologi->nama_pasien,
                                         "taG_PATIENT_ID" => $dataOrderRadiologi->no_rm,
                                         "taG_PATIENT_BIRTH_DATE" => $tlahir,
                                         "taG_PATIENT_SEX" => $jKel,
                                         "taG_PATIENT_WEIGHT" => $bb,
                                         "taG_STUDY_INSTANCE_UID" => $kodeGenerate,
                                         "taG_REQUESTING_PHYSICIAN" => $dokterRadiologi->nama,
                                         "taG_REQUESTED_PROCEDURE_DESCRIPTION" => $namaLayanan->nama,
                                         "taG_ADMISSION_ID" => $this->session->userdata("id_translucent"),
                                         "taG_SCHEDULED_STATION_AE_TITLE" => $kodeModality->aetitle,
                                         "taG_SCHEDULED_PROCEDURE_STEP_START_DATE" => $waktuKonfirmasi,
                                         "taG_SCHEDULED_PROCEDURE_STEP_START_TIME" => $waktuKonfirmasi,
                                         "taG_SCHEDULED_PERFORMING_PHYSICIAN_NAME" => NULL,
                                         "taG_SCHEDULED_PROCEDURE_STEP_DESCRIPTION" => $idLayanan,
                                         "taG_SCHEDULED_PROCEDURE_STEP_ID" => $idRadiologi,
                                         "taG_SCHEDULED_PROCEDURE_STEP_LOCATION" => $kodeModality->nama_ruangan,
                                         "taG_REQUESTED_PROCEDURE_ID" => $idRadiologi,
                                         "taG_REASON_FOR_THE_REQUESTED_PROCEDURE" => $keterangan,
                                         "taG_REQUESTED_PROCEDURE_PRIORITY" => $cito,
                                         "taG_USERNAME_IN_CHARGE" => $username,
                                         "taG_PATIENT_SOURCE" => $ruang,
                                         "taG_CLINICAL" => safe_post("keterangan_klinis".$idKirim));

                    $postOutput = $this->m_order_radiologi->postCurl($postUrl, $postRequest, $tokenHeader);

                    if($postOutput !== false){

                        if($postOutput['respon'] === 201){

                            $resultHasil = json_decode($postOutput['result']);

                            $decode = ["metaData" => ["code" => 200,"message" => $resultHasil]];

                            $dataRadDetail = ["respon" => $postOutput['respon'],"keterangan_respon" => $postOutput['result']];

                            $idRad = $dataDetail['metaData']['message'];

                            $this->db->where('id', $idRad)->update('sm_detail_radiologi', $dataRadDetail);

                        } else {

                            $decode = ["metaData" => ["code" => 201,"message" => $postOutput['result']]];

                            $resultHasil = $postOutput['result'];

                            $dataRadDetail = ["respon" => $postOutput['respon'],"keterangan_respon" => $resultHasil];

                            $idRad = $dataDetail['metaData']['message'];

                            $this->db->where('id', $idRad)->update('sm_detail_radiologi', $dataRadDetail);

                        }

                    } else {

                        $decode = ["metaData" => ["code" => 201,"message" => 'Bridging Radiologi Gagal']];

                        $dataRadDetail = ["respon" => 201,"keterangan_respon" => 'Bridging Radiologi Gagal'];

                        $idRad = $dataDetail['metaData']['message'];

                        $this->db->where('id', $idRad)->update('sm_detail_radiologi', $dataRadDetail);

                    }

                } else {

            
                    $decode = ["metaData" => ["code" => 201,"message" => 'Gagal Mendapatkan Token, Silakan Menghubungi IT']];


                }

                $data = $this->m_order_radiologi->dataOrderRadiologi($id_order);
                $totalRespon = $this->m_order_radiologi->dataResponRadiologi($id_order);

                if($total === $data){

                    $this->db->where("id", $id_order)->update("sm_order_radiologi", array("status" => "konfirm"));

                }

                if($data > 0){

                    if($totalRespon === $data){

                        $this->db->where("id", $id_order)->update("sm_order_radiologi", array("respon_pacs" => "konfirm"));

                    }

                }

                $this->m_pelayanan->setBelumLunas($dataOrderRadiologi->id_pendaftaran);


            }

        } else {

            $decode = ["metaData" => ["code" => 201, "message" => 'Gagal Simpan Data Radiologi']];

        }

        if ($this->db->trans_status() === false) :
            $this->db->trans_rollback();
            $status = false;
        else :
            $this->db->trans_commit();
            $status = true;
        endif;

        $this->response($decode, REST_Controller::HTTP_OK);
    }
}