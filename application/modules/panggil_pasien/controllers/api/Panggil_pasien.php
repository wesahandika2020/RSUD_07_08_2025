<?php

defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH.'/libraries/REST_Controller.php';
// require_once 'vendor/autoload.php';

use Restserver\Libraries\REST_Controller;
use \LZCompressor\LZString as LZString;

/**
 * @package         CodeIgniter
 * @subpackage      Rest Server
 * @category        Controller
 * @author          Faiz Muhammad Syam
 * @license         Syams Corporation
 */
class Panggil_pasien extends REST_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->batas = 10;
        date_default_timezone_set('Asia/Jakarta');
        $this->datetime = date('Y-m-d H:i:s');
        $this->load->model('App_model', 'm_default');
        $this->load->model('Panggil_pasien_model', 'call');

        
        $this->code = 400;
        $this->message = "Tidak terhubung dengan Server BPJS, Server BPJS sedang bermasalah. Silahkan Hubungi Pihak IT BPJS";

        //dev
        $this->bpjs_config = $this->call->getConfigBPJSV2();


        $id_translucent = $this->session->userdata('id_translucent');
        if (empty($id_translucent)) :
            $this->response(array('error' => 'Anda belum login'), REST_Controller::HTTP_UNAUTHORIZED);
            exit();
        endif;
    }

    private function mulai($page)
    {
        return (((int)$page - 1) * (int)$this->batas);
    }

    function data_panggil_pasien_get()
    {
        
        if ($this->get('page') === null){

            $page = 1;

        } else {

            $page = (int)$this->get('page');
        
        }

        $search = [
            'tanggal_awal'      => safe_get('tanggal_awal'),
            'tanggal_akhir'     => safe_get('tanggal_akhir'),
            'no_kode_booking'   => safe_get('no_kode_booking'),
            'no_antrean'        => safe_get('no_antrean'),
            'nm_poli'           => safe_get('nm_poli'),
            'nm_dokter'         => safe_get('nm_dokter'),
            'status_antrean'    => safe_get('status_antrean'),
        ];

        if(safe_get('loket') !== 'undefined'){
            if(safe_get('loket') !== ''){
                $search['loket'] = safe_get('loket');
            }
        }
        
        $start = $this->mulai((int)$page);

        $data = $this->call->dataPanggilPasien((int)$this->batas, (int)$start, $search);

        $data['page'] = (int) $page;
        $data['limit'] = (int)$this->batas;

        if ($data) :
            $this->response($data, REST_Controller::HTTP_OK);
        endif;
    }

    function detail_panggilan_get()
    {
        
        if (!$this->get('id_detail')) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST);
        endif;

        $id_detail = $this->get('id_detail');

        $data = $this->call->dataDetailPanggilan($id_detail);

        if ($data) :
            $this->response($data, REST_Controller::HTTP_OK);
        endif;
    }

    function updateStatusAntrian_put()
    {
        $idAntrean = $this->put("id", true);

        $updateStatusPanggil=array(
            "status_panggil" => 'ok'
        );

        $this->db->where('id', $idAntrean)->update('sm_antrian_bpjs', $updateStatusPanggil);
        $this->response(NULL, REST_Controller::HTTP_OK);

    }    

    function panggil_antrian_get()
    {
        
        $dataTrans = (int)$this->get('trans');
        
        $data = $this->call->panggilAntrian();

        if($data !== null){

            if($data->waktu_panggil === null | $data->waktu_panggil === ''){

                if((int)$data->user_create === $dataTrans){

                    date_default_timezone_set('Asia/Jakarta');
                    $waktuPanggil = round(microtime(true) * 1000);

                    $idAntrean = (int)$data->id_antrian;

                    $callAudio = $this->call->panggilAudio($idAntrean);
                    $angkaAudio = (int)$callAudio->urutan;

                    if($angkaAudio < 12){

                        $jarakPanggil = 2000;

                    } else if($angkaAudio > 11 &&  $angkaAudio < 101){

                        $jarakPanggil = 6000;

                    } else if($angkaAudio > 100){

                        $jarakPanggil = 7000;

                    }

                    $antrean=array(
                                    "waktu_panggil" => $waktuPanggil,
                                    "jarak_panggil" => $jarakPanggil
                                );

                    $this->db->where('id', (int)$data->id)->update('sm_panggilan_antrian', $antrean);

                    $decode = ["metaData" => ["code" => 201,"message" => "Masuk Antrian Pemanggilan"]];
                    $this->response($decode, REST_Controller::HTTP_OK);

                } else {

                    $decode = ["metaData" => ["code" => 201,"message" => "Panggilan Antrian Berjalan"]];
                    $this->response($decode, REST_Controller::HTTP_OK);

                }

            } else {

                if((int)$data->user_create === $dataTrans){

                    $data = $this->call->panggilAntrian();

                    $sudah = $data->sudah;

                    if($sudah === 'Sudah'){

                        $dataWaktu = (int)$data->waktu_panggil;
                        $jarakPanggil = (int)$data->jarak_panggil;

                        $totalWaktu = $dataWaktu + $jarakPanggil;


                        date_default_timezone_set('Asia/Jakarta');
                        $waktuPanggil = round(microtime(true) * 1000);

                        $idAntrean = (int)$data->id_antrian;

                        if((int)$waktuPanggil > (int)$totalWaktu){

                            $this->call->deleteAntrean((int)$data->id);

                        } else {

                            $decode = ["metaData" => ["code" => 201,"message" => "Pemanggilan Pasien Ditunda"]];
                            $this->response($decode, REST_Controller::HTTP_OK);

                        }

                    } else {

                        $dataWaktu = (int)$data->waktu_panggil;
                        $jarakPanggil = (int)$data->jarak_panggil;

                        $totalWaktu = $dataWaktu + $jarakPanggil;


                        date_default_timezone_set('Asia/Jakarta');
                        $waktuPanggil = round(microtime(true) * 1000);

                        $idAntrean = (int)$data->id_antrian;

                        if((int)$waktuPanggil > (int)$totalWaktu){

                            $call_audio = $this->call->panggilAudio($idAntrean);

                            $a_loket = (int)$call_audio->loket_antrean;

                            $b_loket = $this->audio_huruf($a_loket);

                            // $no_urut = '<source src="'.resource_url().'audio/nourut.wav" type="audio/wav">';

                            $c = '<source src="'.resource_url().'audio/'.$b_loket.'.wav" type="audio/wav">';

                            $s_loket = '<source src="'.resource_url().'audio/loket.wav" type="audio/wav">';



                            $huruf_audio = $call_audio->huruf_antrean;

                            $b = '<source src="'.resource_url().'audio/'.$huruf_audio.'.wav" type="audio/wav">';

                            $angka_audio = (int)$call_audio->urutan;
                            // $angka_audio = 789;

                            $urutan_audio = $this->audio_huruf($angka_audio);

                            $split_audio = explode(' ', $urutan_audio);

                            $a = array();

                            foreach ($split_audio as $key) {

                                $e[] = $key;
                                
                            }

                            $decode = ["metaData" => ["code" => 200,"message" => "Pemanggilan Pasien Berhasil","c" => $b_loket, "huruf_audio" => $huruf_audio, "angka_audio" => $angka_audio, "urutan_audio" => $e, "idAntrean" => $idAntrean]];
                            $this->response($decode, REST_Controller::HTTP_OK);

                            $antrean=array(
                                        "sudah" => 'Sudah'
                                    );

                            $this->db->where('id', (int)$data->id)->update('sm_panggilan_antrian', $antrean);

                        } else {

                            $decode = ["metaData" => ["code" => 201,"message" => "Pemanggilan Pasien Ditunda"]];
                            $this->response($decode, REST_Controller::HTTP_OK);

                        }

                    }

                } else {

                    $decode = ["metaData" => ["code" => 201,"message" => "Pemanggilan Pasien Ditunda"]];
                        $this->response($decode, REST_Controller::HTTP_OK);

                }

            }

        } else {

            $decode = ["metaData" => ["code" => 201,"message" => "Tidak Ada Data Panggilan"]];
            $this->response($decode, REST_Controller::HTTP_OK);

        }

    }

    function panggil_antrian_lantai_dua_get()
    {
        
        $dataTrans = (int)$this->get('trans');
        
        $data = $this->call->panggilAntrianLantaiDua();

        if($data !== null){

            if($data->waktu_panggil === null | $data->waktu_panggil === ''){

                if((int)$data->user_create === $dataTrans){

                    date_default_timezone_set('Asia/Jakarta');
                    $waktuPanggil = round(microtime(true) * 1000);

                    $idAntrean = (int)$data->id_antrian;

                    $callAudio = $this->call->panggilAudio($idAntrean);
                    $angkaAudio = (int)$callAudio->urutan;

                    if($angkaAudio < 12){

                        $jarakPanggil = 2000;

                    } else if($angkaAudio > 11 &&  $angkaAudio < 101){

                        $jarakPanggil = 6000;

                    } else if($angkaAudio > 100){

                        $jarakPanggil = 7000;

                    }

                    $antrean=array(
                                    "waktu_panggil" => $waktuPanggil,
                                    "jarak_panggil" => $jarakPanggil
                                );

                    $this->db->where('id', (int)$data->id)->update('sm_antrian_lantai_dua', $antrean);

                    $decode = ["metaData" => ["code" => 201,"message" => "Masuk Antrian Pemanggilan"]];
                    $this->response($decode, REST_Controller::HTTP_OK);

                } else {

                    $decode = ["metaData" => ["code" => 201,"message" => "Panggilan Antrian Berjalan"]];
                    $this->response($decode, REST_Controller::HTTP_OK);

                }

            } else {

                if((int)$data->user_create === $dataTrans){

                    $data = $this->call->panggilAntrianLantaiDua();

                    $sudah = $data->sudah;

                    if($sudah === 'Sudah'){

                        $dataWaktu = (int)$data->waktu_panggil;
                        $jarakPanggil = (int)$data->jarak_panggil;

                        $totalWaktu = $dataWaktu + $jarakPanggil;


                        date_default_timezone_set('Asia/Jakarta');
                        $waktuPanggil = round(microtime(true) * 1000);

                        $idAntrean = (int)$data->id_antrian;

                        if((int)$waktuPanggil > (int)$totalWaktu){

                            $this->call->deleteAntreanLantaiDua((int)$data->id);

                        } else {

                            $decode = ["metaData" => ["code" => 201,"message" => "Pemanggilan Pasien Ditunda"]];
                            $this->response($decode, REST_Controller::HTTP_OK);

                        }

                    } else {

                        $dataWaktu = (int)$data->waktu_panggil;
                        $jarakPanggil = $data->jarak_panggil;

                        $totalWaktu = $dataWaktu + $jarakPanggil;


                        date_default_timezone_set('Asia/Jakarta');
                        $waktuPanggil = round(microtime(true) * 1000);

                        $idAntrean = (int)$data->id_antrian;

                        if((int)$waktuPanggil >= $totalWaktu){

                            $call_audio = $this->call->panggilAudio($idAntrean);

                            $a_loket = (int)$call_audio->loket_antrean;

                            $b_loket = $this->audio_huruf($a_loket);

                            // $no_urut = '<source src="'.resource_url().'audio/nourut.wav" type="audio/wav">';

                            $c = '<source src="'.resource_url().'audio/'.$b_loket.'.wav" type="audio/wav">';

                            $s_loket = '<source src="'.resource_url().'audio/loket.wav" type="audio/wav">';



                            $huruf_audio = $call_audio->huruf_antrean;

                            $b = '<source src="'.resource_url().'audio/'.$huruf_audio.'.wav" type="audio/wav">';

                            $angka_audio = (int)$call_audio->urutan;
                            // $angka_audio = 789;

                            $urutan_audio = $this->audio_huruf($angka_audio);

                            $split_audio = explode(' ', $urutan_audio);

                            $a = array();

                            foreach ($split_audio as $key) {

                                $e[] = $key;
                                
                            }

                            $decode = ["metaData" => ["code" => 200,"message" => "Pemanggilan Pasien Berhasil","c" => $b_loket, "huruf_audio" => $huruf_audio, "angka_audio" => $angka_audio, "urutan_audio" => $e, "idAntrean" => $idAntrean]];
                            $this->response($decode, REST_Controller::HTTP_OK);

                            $antrean=array(

                                        "sudah" => 'Sudah'
                                    );

                            $this->db->where('id', (int)$data->id)->update('sm_antrian_lantai_dua', $antrean);

                        } else {

                            $decode = ["metaData" => ["code" => 201,"message" => "Pemanggilan Pasien Ditunda"]];
                            $this->response($decode, REST_Controller::HTTP_OK);

                        }

                    }

                    

                } else {

                    $decode = ["metaData" => ["code" => 201,"message" => "Pemanggilan Pasien Ditunda"]];
                        $this->response($decode, REST_Controller::HTTP_OK);

                }

            }

        } else {

            $decode = ["metaData" => ["code" => 201,"message" => "Tidak Ada Data Panggilan"]];
            $this->response($decode, REST_Controller::HTTP_OK);

        }

    }



    function simpan_call_antrean_post()
    {
        $this->db->trans_begin();

        if (safe_post('waktu_panggil') === '' | safe_post('id_antrean') === '') :
            $response = array('status' => false, 'message' => 'Parameter tidak lengkap, silahkan hubungi bagian IT.');
            $this->response($response, REST_Controller::HTTP_OK);
        endif;

        date_default_timezone_set('Asia/Jakarta');
        $waktu_panggil = round(microtime(true) * 1000);
        $id_antrean = safe_post('id_antrean');
        $loket_antrean = safe_post('loket_antrean');
        $call_antrean = safe_post('call_antrean');
        $kode_pangggil_dokter = safe_post('kode_pangggil_dokter');
        $kode_pangggil_poli = safe_post('kode_pangggil_poli');



        date_default_timezone_set('Asia/Jakarta');
        $konversi_waktu_panggil = date('Y-m-d H:i:s', $waktu_panggil/1000);
        $konversi_tanggal_kunjungan = date('Y-m-d', $waktu_panggil/1000);

        $user = (int)$this->session->userdata('id_translucent');

        $cekUser = $this->call->cekUser($user);

        if($cekUser < 5){

            if($call_antrean === 'Belum Dipanggil'){

                $panggil_pasien = 'Call';

            } else {

                $panggil_pasien = 'Recall';
            }

        
            if($panggil_pasien === 'Recall'){

                $dataHitung = $this->call->cekHitungPanggilan($id_antrean);
                $hitungPanggil = $dataHitung->hitung_panggil;

                if($hitungPanggil !== null && $hitungPanggil !== ''){

                    $totalPanggil = (int)$hitungPanggil + 1;

                } else {

                    $totalPanggil = 1;
                }

            } else {

                $totalPanggil = 1;
                
            }

            $antrean=array(
                            "panggilan_pasien" => $panggil_pasien,
                            "waktu_panggil" => $konversi_waktu_panggil,
                            "loket_antrean" => $loket_antrean,
                            "hitung_panggil" => $totalPanggil,
                            "status_panggil" => 'x'
                        );

            $data = $this->db->where('id', $id_antrean)->update('sm_antrian_bpjs', $antrean);

            $call_detail =array(
                            "jenis_panggilan" => $panggil_pasien,
                            "waktu" => $konversi_waktu_panggil,
                            "loket" => $loket_antrean,
                            "id_antrian" => $id_antrean,
                            "tanggal_kunjung" => $konversi_tanggal_kunjungan,
                            "kode_bpjs_dokter" => $kode_pangggil_dokter,
                            "kode_bpjs_poli" => $kode_pangggil_poli,
                            "user_create" => $this->session->userdata('id_translucent'),
                        );

            $id_panggil = $this->call->simpanPanggilPasien($call_detail);

            $call_audio = $this->call->panggilAudio($id_antrean);

            $panggilanAntrean =array(
                            "huruf_antrean" => $call_audio->huruf_antrean,
                            "urutan"        => (int)$call_audio->urutan,
                            "loket_antrean" => $loket_antrean,
                            "id_antrian"    => (int)$id_antrean,
                            "create_date"   => $this->datetime,
                            "user_create"   => $user
                        );

            if($call_audio->huruf_antrean === 'F'){

                $idPanggilAntrian = $this->call->simpanPanggilLantaiDua($panggilanAntrean);

            } else {

                $idPanggilAntrian = $this->call->simpanPanggilAntrean($panggilanAntrean);   

            }

            

            $decode = ["metaData" => ["code" => 200,"message" => "Pemanggilan Pasien Berhasil"]];

        } else {

            $decode = ["metaData" => ["code" => 201,"message" => "Anda Sudah Memanggil Antrian Sebanyak 5 Kali"]];

        }

        if ($this->db->trans_status() === false) :
            $this->db->trans_rollback();
            $decode['status'] = false;
        else :
            $this->db->trans_commit();
            $decode['status'] = true;
        endif;

        $this->response($decode, REST_Controller::HTTP_OK);

    }

    function audio_huruf($bilangan) {

      $angka = array('0','0','0','0','0','0','0','0','0','0',
                     '0','0','0','0','0','0');
      $kata = array('','satu','dua','tiga','empat','lima',
                    'enam','tujuh','delapan','sembilan');
      $tingkat = array('','ribu','juta','milyar','triliun');

      $panjang_bilangan = strlen($bilangan);

      /* pengujian panjang bilangan */
      if ($panjang_bilangan > 15) {
        $kalimat = "Diluar Batas";
        return $kalimat;
      }

      /* mengambil angka-angka yang ada dalam bilangan,
         dimasukkan ke dalam array */
      for ($i = 1; $i <= $panjang_bilangan; $i++) {
        $angka[$i] = substr($bilangan,-($i),1);
      }

      $i = 1;
      $j = 0;
      $kalimat = "";


      /* mulai proses iterasi terhadap array angka */
      while ($i <= $panjang_bilangan) {

        $subkalimat = "";
        $kata1 = "";
        $kata2 = "";
        $kata3 = "";

        /* untuk ratusan */
        if ($angka[$i+2] != "0") {
          if ($angka[$i+2] == "1") {
            $kata1 = "seratus";
          } else {
            $kata1 = $kata[$angka[$i+2]] . " ratus";
          }
        }

        /* untuk puluhan atau belasan */
        if ($angka[$i+1] != "0") {
          if ($angka[$i+1] == "1") {
            if ($angka[$i] == "0") {
              $kata2 = "sepuluh";
            } elseif ($angka[$i] == "1") {
              $kata2 = "sebelas";
            } else {
              $kata2 = $kata[$angka[$i]] . " belas";
            }
          } else {
            $kata2 = $kata[$angka[$i+1]] . " puluh";
          }
        }

        /* untuk satuan */
        if ($angka[$i] != "0") {
          if ($angka[$i+1] != "1") {
            $kata3 = $kata[$angka[$i]];
          }
        }

        /* pengujian angka apakah tidak nol semua,
           lalu ditambahkan tingkat */
        if (($angka[$i] != "0") OR ($angka[$i+1] != "0") OR
            ($angka[$i+2] != "0")) {
          $subkalimat = "$kata1 $kata2 $kata3 " . $tingkat[$j] . " ";
        }

        /* gabungkan variabe sub kalimat (untuk satu blok 3 angka)
           ke variabel kalimat */
        $kalimat = $subkalimat . $kalimat;
        $i = $i + 3;
        $j = $j + 1;

      }

      /* mengganti satu ribu jadi seribu jika diperlukan */
      if (($angka[5] == "0") AND ($angka[6] == "0")) {
        $kalimat = str_replace("satu ribu","seribu",$kalimat);
      }

      return trim($kalimat);

    } 

    function simpan_kehadiran_pasien_post()
    {
        $this->db->trans_begin();

        if (safe_post('id_hadir') === '') :
            $response = array('status' => false, 'message' => 'Parameter tidak lengkap, silahkan hubungi bagian IT.');
            $this->response($response, REST_Controller::HTTP_OK);
        endif;

        $id_hadir = safe_post('id_hadir');
        $kode_booking = safe_post('kode');
        
        date_default_timezone_set('Asia/Jakarta');
        $waktuHadir = (round(microtime(true) * 1000));
        $konversiWaktuHadir = date('Y-m-d H:i:s', $waktuHadir/1000);

        $kehadiran=array(
                        "pasien_hadir" => 'Hadir',
                        "waktu_hadir" => $konversiWaktuHadir,
                    );

        $data = $this->db->where('id', $id_hadir)->update('sm_antrian_bpjs', $kehadiran);

        if($data !== false){

            $cekStatusTanggal = $this->call->cekStatusTanggal($id_hadir);

            if($cekStatusTanggal->huruf_antrean !== 'D' && $cekStatusTanggal->huruf_antrean !== 'C'){

                $update = ["task_dua" => $konversiWaktuHadir];

                $this->db->where('id', $id_hadir)->update('sm_antrian_bpjs', $update);

                $data_response = array( "nomor_task"        => 2,
                                        "waktu_task"        => $waktuHadir,
                                        "kode_booking"      => $kode_booking,
                                        "id_antrian"        => $id_hadir,
                                        "konversi_waktu"    => $konversiWaktuHadir,
                );

                $this->db->insert('sm_update_task_bpjs', $data_response);

            } else {

                $update = ["task_dua" => $konversiWaktuHadir];

                $this->db->where('id', $id_hadir)->update('sm_antrian_bpjs', $update);
                
            }

            $decode = ["metaData" => ["code" => 200,"message" => 'Berhasil Menyimpan Kehadiran']];

        } else {

            $decode = ["metaData" => ["code" => 201,"message" => 'Gagal Menyimpan Kehadiran']];
        
        }

        if ($this->db->trans_status() === false) :
            $this->db->trans_rollback();
            $decode['status'] = false;
        else :
            $this->db->trans_commit();
            $decode['status'] = true;
        endif;

        $this->response($decode, REST_Controller::HTTP_OK);

    }

    function cekAllx_post(){

        $data = $this->call->dataCekAllx();
        if(isset($data->waktu_panggil)){
            $waktuPanggil = $data->waktu_panggil;

            
            date_default_timezone_set('Asia/Jakarta');
            $saatIni = round(microtime(true) * 1000) + 15000;
            $estimate = new DateTime($waktuPanggil);
            $nwEst = $estimate->getTimestamp();
            $nwEstOne = $nwEst*1000;
            $konversiWaktuPanggil = date('Y-m-d H:i:s', (int)$nwEstOne/1000);
            $hitungWaktu = (int)$saatIni - (int)$nwEstOne;

            $cekPanggilanAntrian = $this->call->dataCekPanggilan($data->huruf_antrean, $data->urutan, $data->tanggal_kunjungan);

            if(!isset($cekPanggilanAntrian->id)){

                if((int)$hitungWaktu > 0){
                    $idAntrean = $data->id;
                    $updateStatusPanggil=array(
                        "status_panggil" => 'ok'
                    );

                    $this->db->where('id', $idAntrean)->update('sm_antrian_bpjs', $updateStatusPanggil);
                    $this->response(NULL, REST_Controller::HTTP_OK);
                }

            }

            
        }

    }

}
