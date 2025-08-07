<?php

defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

class Antrian_radiologi extends REST_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->limit = 10;
        date_default_timezone_set('Asia/Jakarta');
		$this->datetime = date('Y-m-d H:i:s');
        $this->load->model('App_model', 'default');
        $this->load->model('Antrian_radiologi_model', 'antrian_rad_model');

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
    
    function get_detail_antrian_pasien_get()
    {
        if (!$this->get('id_pendaftaran', true)) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST);
        endif;

        if (!$this->get('id_layanana_pendaftaran', true)) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST);
        endif;

        if (!$this->get('id_order_radiologi', true)) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST);
        endif;

        $id_pendaftaran          =$this->get('id_pendaftaran', true);
        $id_layanana_pendaftaran =$this->get('id_layanana_pendaftaran', true);
        $id_order_radiologi      =$this->get('id_order_radiologi', true);
        
        $data = $this->antrian_rad_model->getDetailAntrianPasien($id_pendaftaran,$id_layanana_pendaftaran,$id_order_radiologi);
        $this->response($data, REST_Controller::HTTP_OK);
    }

    function get_cek_antrian_byruangan_get()
    {
        if (safe_get('id_pendaftaran') === '')         : $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); endif;
        if (safe_get('id_layanan_pendaftaran') === '') : $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); endif;
        if (safe_get('id_order_radiologi') === '')     : $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); endif;
        if (safe_get('id_ruangan_rad') === '')         : $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); endif;

        $id_pendaftaran          = (int)safe_get('id_pendaftaran');
        $id_layanana_pendaftaran = (int)safe_get('id_layanan_pendaftaran');
        $id_order_radiologi      = (int)safe_get('id_order_radiologi');
        $id_ruangan_rad          = (int)safe_get('id_ruangan_rad');

        $cekRuangan = $this->antrian_rad_model->getCekAntrianByRuangan($id_pendaftaran,$id_layanana_pendaftaran,$id_order_radiologi,$id_ruangan_rad);
        $this->response($cekRuangan, REST_Controller::HTTP_OK);
    }

    function simpan_antrianrad_post()
    {
        $id_ruang_radiologi =  safe_post('id_ruangan_rad');
        $ruang_radiologi = $this->db->get_where('sm_ruang_radiologi', ['id' => $id_ruang_radiologi])->row();

        if ($ruang_radiologi && isset($ruang_radiologi->nama_ruangan) && $ruang_radiologi->nama_ruangan !== null) {
			$nama_ruangan = $ruang_radiologi->nama_ruangan;
		} else {
			$nama_ruangan = NULL;
		}

        $cek_antrian     = $this->antrian_rad_model->cekAntrianRadiologi(date('Y-m-d'),  $ruang_radiologi->kode_ruangan);
        $tambah_nol      = sprintf("%03d", $cek_antrian);
        $nomor_antrian   = $tambah_nol .'-'. $ruang_radiologi->kode_ruangan;

        $dataAntrian = array(
            'id_pendaftaran'        => safe_post('id_pendaftaran'),
            'id_layanan_pendaftaran'=> safe_post('id_layanan_pendaftaran'),
            'id_order_radiologi'    => safe_post('id_order_radiologi'),            
            'id_ruang_radiologi'    => safe_post('id_ruangan_rad'),
            'ruang_radiologi'       => $nama_ruangan,
            'tanggal_kunjungan'     => date('Y-m-d'),
            'kode_ruangan'          => $ruang_radiologi->kode_ruangan,
            'urutan'                => $cek_antrian,
            'nomor_antrian'         => $nomor_antrian,
            'status_antrian'        => 'Belum',
            'created_date'          => date('Y-m-d H:i:s'),
            'id_user'               => $this->session->userdata('id_translucent'),
        );

        $this->db->insert('sm_antrian_radiologi', $dataAntrian);
        
        if ($this->db->trans_status() === FALSE) :
            $this->db->trans_rollback();
            $status = FALSE;
            $id     = '';
        else :
            $this->db->trans_commit();
            $status = TRUE;
            $id     = $this->db->insert_id();
        endif;

        $message = [
            'status'=> $status,
            'id'    => $id,
            'token' => $this->security->get_csrf_hash()
        ];

        $this->response($message, REST_Controller::HTTP_OK);
    }

    function get_list_detail_antrian_radiologi_get()
    {
        $limit=50;
        if (!$this->get('page')) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
        endif;

        $start          = ($this->get('page') - 1) * $limit;
        $search         = [
            'id_pendaftaran'        => safe_get('id_pendaftaran'),
            'id_layanan_pendaftaran'=> safe_get('id_layanan_pendaftaran'),
            'id_order_radiologi'    => safe_get('id_order_radiologi'),      
        ];

        $data           = $this->antrian_rad_model->getListDetailAntrianRad($start, $limit, $search);
        $data['page']   = (int) $this->get('page');
        $data['limit']  = $limit;

        if ($data) :
            $this->response($data, REST_Controller::HTTP_OK); // (200)
        endif;
    }

    function antrian_radiologi_byid_get()
    {
        if (safe_get('id') === '') :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST);
        endif;

        $idAntrian = (int)safe_get('id');

        $cekCetak = $this->antrian_rad_model->antrianRadiologiById($idAntrian);

        $this->response($cekCetak, REST_Controller::HTTP_OK);
    }

    function tambah_cetak_antrian_radiologi_post()
    {
        if (safe_post('id') === '') :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST);
        endif;

        $this->db->trans_begin();

        $idAntrian = (int)safe_post('id');

        $data = $this->antrian_rad_model->tambahCetakAntrianRadiologi($idAntrian);

        if ($this->db->trans_status() === FALSE) :
            $this->db->trans_rollback();
            $status = FALSE;
        else :
            $this->db->trans_commit();
            $status = TRUE;
        endif;

        $this->response($data, REST_Controller::HTTP_OK);
    }

    function simpan_batal_antrian_radiologi_post()
	{
		if (safe_post('id_antrian') === '') :
			$this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
		endif;

        $data = array(  'status_antrian'    => 'Batal', 
                        'keterangan_batal'  => safe_post('keterangan'),
                        'cancel_date'       => date('Y-m-d H:i:s'),
                        'id_user_cancel'    => $this->session->userdata('id_translucent')
                     );

		$status = $this->antrian_rad_model->pembatalanAntrianRadiologi(safe_post('id_antrian'), $data);
		$this->response($status, REST_Controller::HTTP_OK); // (200)
    }

    function get_list_antrian_radiologi_get()
    {
        $limit=10;
        if (!$this->get('page')) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
        endif;

        $start          = ($this->get('page') - 1) * $limit;
        $search         = [
            'ruang_radiologi'   => safe_get('ruang_radiologi'),
            'tanggal'           => safe_get('tanggal'),
            'filter_panggil'    => safe_get('filter_panggil'),
            'status_antrian'    => safe_get('status_antrian'),
            'keyword'           => safe_get('keyword'),
        ];

        $data           = $this->antrian_rad_model->getListAntrianRadiologi($start, $limit, $search);
        $data['page']   = (int) $this->get('page');
        $data['limit']  = $limit;

        if ($data) :
            $this->response($data, REST_Controller::HTTP_OK); // (200)
        endif;
    }

    function detail_order_radiologi_get()
    {
        $id = safe_get('id');
        $type = safe_get('type');
        
        if ($id !== '' && $type !== '') {
            $data = $this->antrian_rad_model->getDetailOrderRadiologi($id, $type)->result();
        } else {
            $data = NULL;
        }
        echo json_encode($data);
    }

    function delay_panggilan_get()
	{
        $waktu_sekarang = date('Y-m-d H:i:s');
		$data = $this->antrian_rad_model->dataDelayPanggilan($waktu_sekarang);
        echo json_encode($data);
	}

    function simpan_antrian_pasien_post()
    {
        
        if (safe_post('id') === '') :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST);
        endif;

        $this->db->trans_begin();
        $idAntrian  = (int)safe_post('id');
        $type       = safe_post('type');
        
        $user = $this->db->where('id_antrian', $idAntrian, true)->select('nama_user')->get('sm_tunda_panggilan_radiologi')->row()->nama_user ?? NULL;
        $panggil = array(
            "id_antrian"     => $idAntrian,
            "waktu_panggil"  => date('Y-m-d H:i:s'),
            "jenis_panggil"  => $type,
            "nama_user"      => $user
        );
        $this->db->insert('sm_panggil_pasien_radiologi', $panggil);


        if($type=='Call'){
            $call = array(
				"waktu_panggil"   => date('Y-m-d H:i:s'),
				"jumlah_panggil"  => 1
			);
			$this->db->where('id', $idAntrian)->update('sm_antrian_radiologi', $call);
        } else {

            $updateTunda = " UPDATE sm_antrian_radiologi 
                             SET jumlah_panggil = ( SELECT jumlah_panggil FROM sm_antrian_radiologi WHERE id= '" . $idAntrian . "' ) + 1 , waktu_panggil  = '".date('Y-m-d H:i:s')."'
                             WHERE id = '" . $idAntrian . "' ";
            $this->db->query($updateTunda);            
        }

        $updateAntrian = "UPDATE sm_tunda_panggilan_radiologi SET status_panggil = 0 WHERE id_antrian = '" . $idAntrian . "' ";
            $this->db->query($updateAntrian);

        $data = '';
        if ($this->db->trans_status() === FALSE) :
            $this->db->trans_rollback();
            $status = FALSE;
        else :
            $this->db->trans_commit();
            $status = TRUE;
        endif;

        $this->response($data, REST_Controller::HTTP_OK);
    }
    
    function panggil_antrian_get()
    {
        $idAntrian = (int)safe_get('id');
        $data = $this->antrian_rad_model->antrianRadiologiById($idAntrian);

        if($data !== null){
            $a_loket = (int)$data->no_ruangan;
            $b_loket = $this->audio_huruf($a_loket);
            $c       = '<source src="'.resource_url().'audio2/'.$b_loket.'.wav" type="audio/wav">';
            $s_loket = '<source src="'.resource_url().'audio2/ruang.wav" type="audio/wav">';

            if($data->id_ruang_radiologi=='7'){
                $huruf_audio = 'A';
            } else if($data->id_ruang_radiologi=='1'){
                $huruf_audio = 'B';
            } else {
                $huruf_audio = '';
            }

            $b = '<source src="'.resource_url().'audio2/'.$huruf_audio.'.wav" type="audio/wav">';
            $angka_audio = (int)$data->urutan;
            $urutan_audio = $this->audio_huruf($angka_audio);
            $split_audio = explode(' ', $urutan_audio);

            $a = array();
            foreach ($split_audio as $key) {
                $e[] = $key;                    
            }

            $decode = ["metaData" => ["code" => 200,"message" => "Pemanggilan Pasien Berhasil","c" => $b_loket, "huruf_audio" => $huruf_audio, "angka_audio" => $angka_audio, "urutan_audio" => $e]];
            $this->response($decode, REST_Controller::HTTP_OK);

        } else {
            $decode = ["metaData" => ["code" => 201,"message" => "Tidak Ada Data Panggilan"]];
            $this->response($decode, REST_Controller::HTTP_OK);
        }
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

    
    function get_monitor_antrian_radiologi_get()
	{
		$data['panggil']      = $this->antrian_rad_model->dataPanggilAntrianAktif();
		$data['ruang1']       = $this->antrian_rad_model->dataPanggilPerRuang(5,'panggil');
		$data['ruang2a']      = $this->antrian_rad_model->dataPanggilPerRuang(7,'panggil');
		$data['ruang2b']      = $this->antrian_rad_model->dataPanggilPerRuang(1,'panggil');
		$data['ruang3']       = $this->antrian_rad_model->dataPanggilPerRuang(4,'panggil');
		$data['ruang4']       = $this->antrian_rad_model->dataPanggilPerRuang(8,'panggil');
		$data['ruang5']       = $this->antrian_rad_model->dataPanggilPerRuang(3,'panggil');
		$data['ruang1_tunda'] = $this->antrian_rad_model->dataPanggilPerRuang(5,'tunda');
		$data['ruang2a_tunda']= $this->antrian_rad_model->dataPanggilPerRuang(7,'tunda');
		$data['ruang2b_tunda']= $this->antrian_rad_model->dataPanggilPerRuang(1,'tunda');
		$data['ruang3_tunda'] = $this->antrian_rad_model->dataPanggilPerRuang(4,'tunda');
		$data['ruang4_tunda'] = $this->antrian_rad_model->dataPanggilPerRuang(8,'tunda');
		$data['ruang5_tunda'] = $this->antrian_rad_model->dataPanggilPerRuang(3,'tunda');

		if ($data) {
			$this->response($data, REST_Controller::HTTP_OK);
			return;
		}

		$this->response(['message' => 'Terjadi kesalahan pada server'], REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
	}
	
    function status_panggil_get()
    {
        $data = $this->antrian_rad_model->dataPanggilAntrian();
        echo json_encode($data);
    }

	function get_call_arduino_get()
    {
        echo "Koneksi Arduino Berhasil";
    }

    function get_data_antrian_get()
	{
        $id = (int)safe_get('id');
		$data['call']   = $this->antrian_rad_model->getAntrianCall($id);
		$data['recall'] = $this->antrian_rad_model->getAntrianReCall($id);
		$data['sisa']   = $this->antrian_rad_model->getAntrianSisa($id);
		if ($data) {
			$this->response($data, REST_Controller::HTTP_OK);
			return;
		}

		$this->response(['message' => 'Terjadi kesalahan pada server'], REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
	}
}
