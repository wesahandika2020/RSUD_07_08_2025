<?php

defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';
require_once APPPATH . 'libraries/EscposPrinter/EscposPrint.php';
require_once APPPATH . 'libraries/EscposPrinter/NetworkConnector.php';

use Restserver\Libraries\REST_Controller;
use Mike42\Escpos\Printer;

class Antrian_lab extends REST_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->limit    = 10;
		$this->datetime = date('Y-m-d H:i:s');
		$this->load->model('Antrian_lab_model', 'm_antrian_lab');
        $this->load->model('logs/Logs_model', 'm_logs');
    }

	/*  ==== TAMBAH ANTRIAN LAB ====  */

    public function indentitas_post()
	{
		$jenis_identitas  = safe_post('jenis_identitas');
		$no_identitas     = safe_post('no_identitas');
		$penjamin         = safe_post('penjamin');
		$penjamin_lainnya = safe_post('penjamin_lainnya');

		$responseIdentitas = [];
		if ($jenis_identitas === 'no_rm') {
			$responseIdentitas = ['status' => FALSE, 'message' => 'No RM Tidak Ditemukan'];
		} elseif ($jenis_identitas === 'nik') {
			$responseIdentitas = ['status' => FALSE, 'message' => 'NIK Tidak Ditemukan'];
		}

		$data_pasien = $this->m_antrian_lab->getDataPasien($no_identitas, $jenis_identitas, $penjamin, $penjamin_lainnya);
		if (!$data_pasien) {
			$this->response($responseIdentitas, self::HTTP_NOT_FOUND);

			return;
		}

		$this->response(
			[
				'status'  => TRUE,
				'message' => 'Sukses melakukan pengecekan data',
				'data'    => $data_pasien,
			],
			self::HTTP_OK
		);
	}

	function get_antrian_lab_order_get()
    {
        $search = [
			'jenis_identitas' => safe_get('jenis_identitas'),
            'no_identitas'	  => safe_get('norm'),
            'layanan'   	  => safe_get('layanan'),
        ];

        $data = $this->m_antrian_lab->getAntrianLabByOrder($search);

        if ($data) :
            $this->response($data, REST_Controller::HTTP_OK); // (200)
        endif;
    }

    function get_antrian_lab_tiket_get()
    {
        $search = [
			'jenis_identitas' => safe_get('jenis_identitas'),
            'no_identitas'	  => safe_get('norm'),
        ];        
        
        $data = $this->m_antrian_lab->getAntrianLabByTiket($search);

        if ($data) :
            $this->response($data, REST_Controller::HTTP_OK); // (200)
        endif;
    }

	function simpan_antrianlab_post()
    {
		safe_post('isCito')	     == 'true' ? $is_Cito='1' : $is_Cito='0';
		safe_post('isPrioritas') == 'true' ? $is_prioritas='1' : $is_prioritas='0';
		
		safe_post('id_poli') == 'null' ? $id_poli=null : $id_poli=safe_post('id_poli');

		$kode_antrian	= safe_post('kode');
        $urutan         = $this->m_antrian_lab->cekAntrianLab(date('Y-m-d'), $kode_antrian);
        $tambah_nol     = sprintf("%03d", $urutan);
        $nomor_antrian  = $kode_antrian .'-'. $tambah_nol;

        $dataAntrian = array(			
            'id_pasien'             => safe_post('id_pasien'),
            'tanggal_kunjungan'     => date('Y-m-d'),
            'id_layanan_pendaftaran'=> safe_post('id_lay_pend'),
            'id_order_laboratorium' => safe_post('id_order_lab'),   
            'id_poli'				=> $id_poli,
            'is_cito'				=> $is_Cito,
            'is_prioritas'			=> $is_prioritas,
            'is_sampling'  			=> 0,
            'jml_panggil_admin'     => 0,
            'jml_panggil_sampling'  => 0,
            'ruang_laboratorium'    => 'Admin',
            'kode_antrian' 			=> $kode_antrian,    
            'urutan'                => $urutan,
            'nomor_antrian'         => $nomor_antrian,     
            'status_antrian'        => 'Aktif',
            'created_date'          => date('Y-m-d H:i:s'),
            'id_user'               => $this->session->userdata('id_translucent'),
            'cetak'                 => 0,
        );

		/* 
			highlight_string("<?php\n " . var_export($dataAntrian, true) . "?>"); die;
		*/

        $this->db->insert('sm_antrian_laboratorium', $dataAntrian);
        
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

    function simpan_antrianlab_hasil_post()
    {
		$id_antrian	    = safe_post('id_antrian');   
        $urutan         = $this->m_antrian_lab->cekAntrianLab(date('Y-m-d'), 'E');
        $tambah_nol     = sprintf("%03d", $urutan);
        $nomor_antrian  = 'E'.'-'. $tambah_nol;
        
        $data_antrian = $this->m_antrian_lab->antrianLaboratoriumById($id_antrian);
        $dataAntrian = array(			
            'id_pasien'             => $data_antrian->id_pasien,
            'tanggal_kunjungan'     => date('Y-m-d'),
            'id_layanan_pendaftaran'=> $data_antrian->id_layanan_pendaftaran,
            'id_order_laboratorium' => $data_antrian->id_order_laboratorium,   
            'id_poli'				=> $data_antrian->id_poli, 
            'is_cito'				=> 0,
            'is_prioritas'			=> 0,
            'is_sampling'  			=> 0,
            'jml_panggil_admin'     => 0,
            'jml_panggil_sampling'  => 0,
            'ruang_laboratorium'    => 'Admin',
            'kode_antrian' 			=> 'E',    
            'urutan'                => $urutan,
            'nomor_antrian'         => $nomor_antrian,     
            'status_antrian'        => 'Aktif',
            'created_date'          => date('Y-m-d H:i:s'),
            'id_user'               => $this->session->userdata('id_translucent'),
            'cetak'                 => 0,
            'id_antrian_sebelum'    => $data_antrian->id,
        );

        $this->db->insert('sm_antrian_laboratorium', $dataAntrian);
        
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

    function tambah_cetak_antrian_lab_post()
    {
        if (safe_post('id') === '') :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST);
        endif;

        $this->db->trans_begin();

        $idAntrian = (int)safe_post('id');

        $data = $this->m_antrian_lab->tambahCetakAntrianLab($idAntrian);

        if ($this->db->trans_status() === FALSE) :
            $this->db->trans_rollback();
            $status = FALSE;
        else :
            $this->db->trans_commit();
            $status = TRUE;
        endif;

        $this->response($data, REST_Controller::HTTP_OK);
    }

	function tes_get()
    {
        $data = $this->m_antrian_lab->tes();

        if ($data) :
            $this->response('selecrt * from sm_layanan_pebndaftaran were id  in ('.implode(',', json_decode($data->id_layanan_pendaftaran)).')', REST_Controller::HTTP_OK); // (200)
        endif;
    }



	/*  ==== LIST ANTRIAN LAB ====  */

	function get_list_antrian_lab_get()
    {
        $limit=10;
        if (!$this->get('page')) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
        endif;

        $start          = ($this->get('page') - 1) * $limit;
        $search         = [
            'tanggal'        => safe_get('tanggal'),
            'ruang_lab'      => safe_get('ruang_lab'),
            'kode_antrian'   => safe_get('kode_antrian'),
            'status_antrian' => safe_get('status_antrian'),
            'keyword'        => safe_get('keyword'),
        ];

        $data           = $this->m_antrian_lab->getListAntrianLab($start, $limit, $search);
        $data['page']   = (int) $this->get('page');
        $data['limit']  = $limit;

        if ($data) :
            $this->response($data, REST_Controller::HTTP_OK); // (200)
        endif;
    }

	function antrian_lab_byid_get()
    {
        if (safe_get('id') === '') :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST);
        endif;

        $idAntrian = (int)safe_get('id');
        $cekCetak = $this->m_antrian_lab->antrianLabById($idAntrian);

        $this->response($cekCetak, REST_Controller::HTTP_OK);
    }

	function simpan_batal_antrian_lab_post()
	{
		if (safe_post('id_antrian') === '') :
			$this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
		endif;

        $data = array(  'status_antrian'    => 'Batal', 
                        'keterangan_batal'  => safe_post('keterangan'),
                        'cancel_date'       => date('Y-m-d H:i:s'),
                        'id_user_cancel'    => $this->session->userdata('id_translucent')
                     );
		$status = $this->m_antrian_lab->pembatalanAntrianLab(safe_post('id_antrian'), $data);      

        $data_idLayPend = safe_post('id_layanan_pendaftaran');
        $array_idLayPend = explode(',', $data_idLayPend);
        foreach ($array_idLayPend as $item_idLayPend) {
            $this->m_logs->recordAdminLogs($item_idLayPend, 'Batal Antrian Laboratorium ('.$item_idLayPend.')' , safe_post('keterangan'));
        }

		$this->response($status, REST_Controller::HTTP_OK); // (200)
    }

    function get_call_lab_get()
    {
        $ruang        = $this->get('ruang', true);
        $kode_antrian = $this->get('kode_antrian', true);
        $user         = $this->get('user', true);
        $respon       = $this->m_antrian_lab->getCallLab($ruang,$kode_antrian,$user);
        $this->response($respon, REST_Controller::HTTP_OK);
        return;
    }

    function get_recall_lab_get()
    {
        $ruang        = $this->get('ruang', true);
        $kode_antrian = $this->get('kode_antrian', true);
        $user         = $this->get('user', true);
        $respon       = $this->m_antrian_lab->getReCallLab($ruang,$kode_antrian,$user);
        $this->response($respon, REST_Controller::HTTP_OK);
        return;
		
    }

    function cek_tunda_aktif_get()
    {
        $id  = $this->get('id', true);
        $cek_tunda = $this->db->where(array('id_antrian' => $id, 'status_panggil' => '1' ))->select('id')->get('sm_tunda_panggilan_laboratorium')->row()->id ?? NULL;

        if($cek_tunda == NULL){
            $status = true;
			$message = 'Berhasil Pasien bisa di batalkan';
        } else {
            $status = false;
			$message = 'Gagal Pasien masih dalam antrian. Silahkan di batatalkan ketika pasien sudah tidak dalam antrian.';
        }

		$respon = array('status' => $status, 'message' => $message);        
        $this->response($respon, REST_Controller::HTTP_OK);
        return;
    }

    function update_sampling_get()
    {
        $id          = $this->get('id', true);
        $is_sampling = $this->get('is_sampling', true);
        if($is_sampling == 1){
            $setSampling = 0;
            $setRuang    = 'Admin';
        } else {
            $setSampling = 1;
            $setRuang    = 'Sampling';
        }
        $this->db->trans_begin();
        $this->db->where("id", $id)->update("sm_antrian_laboratorium", array('is_sampling' => $setSampling, 'ruang_laboratorium' => $setRuang));
        if ($this->db->trans_status() === false) :
			$this->db->trans_rollback();
			$status = false;
			$message = 'Gagal Ubah Panggilan Ruang Sampling';
		else :
			$this->db->trans_commit();
			$status = true;
			$message = 'Berhasil Ubah Panggilan Ruang Sampling';
		endif;

		$respon = array('status' => $status, 'message' => $message);        
        $this->response($respon, REST_Controller::HTTP_OK);
        return;
    
    }


    /*  ==== MONITOR ANTRIAN LAB ====  */

    function get_monitor_antrian_lab_get()
	{
		// $data['panggil']             = $this->m_antrian_lab->dataPanggilAntrianAktif();
		$data['panggil_admin']       = $this->m_antrian_lab->dataPanggilAntrianAktifByRuang('Admin');
		$data['panggil_sampling']    = $this->m_antrian_lab->dataPanggilAntrianAktifByRuang('Sampling');
		
		// $data['ruang_admin']         = $this->m_antrian_lab->dataPanggilPerRuang('Admin');
		$data['ruang_admin_a']       = $this->m_antrian_lab->dataPanggilPerRuangKode('Admin','A');
		$data['ruang_admin_b']       = $this->m_antrian_lab->dataPanggilPerRuangKode('Admin','B');
		$data['ruang_admin_c']       = $this->m_antrian_lab->dataPanggilPerRuangKode('Admin','C');
		$data['ruang_admin_d']       = $this->m_antrian_lab->dataPanggilPerRuangKode('Admin','D');
		$data['ruang_admin_e']       = $this->m_antrian_lab->dataPanggilPerRuangKode('Admin','E');

        // $data['ruang_admin_sisa']    = $this->m_antrian_lab->dataPanggilPerRuangSisa('Admin');
        $data['ruang_admin_a_sisa']  = $this->m_antrian_lab->dataPanggilPerRuangKodeSisa('Admin','A');
        $data['ruang_admin_b_sisa']  = $this->m_antrian_lab->dataPanggilPerRuangKodeSisa('Admin','B');
        $data['ruang_admin_c_sisa']  = $this->m_antrian_lab->dataPanggilPerRuangKodeSisa('Admin','C');
        $data['ruang_admin_d_sisa']  = $this->m_antrian_lab->dataPanggilPerRuangKodeSisa('Admin','D');
        $data['ruang_admin_e_sisa']  = $this->m_antrian_lab->dataPanggilPerRuangKodeSisa('Admin','E');

		// $data['ruang_sampling']      = $this->m_antrian_lab->dataPanggilPerRuang('Sampling');
		$data['ruang_sampling_a']    = $this->m_antrian_lab->dataPanggilPerRuangKode('Sampling','A');
		$data['ruang_sampling_b']    = $this->m_antrian_lab->dataPanggilPerRuangKode('Sampling','B');
		$data['ruang_sampling_c']    = $this->m_antrian_lab->dataPanggilPerRuangKode('Sampling','C');
		$data['ruang_sampling_d']    = $this->m_antrian_lab->dataPanggilPerRuangKode('Sampling','D');
        
		// $data['ruang_sampling_sisa']  = $this->m_antrian_lab->dataPanggilPerRuangSisa('Sampling');
        $data['ruang_sampling_a_sisa']= $this->m_antrian_lab->dataPanggilPerRuangKodeSisa('Sampling','A');
        $data['ruang_sampling_b_sisa']= $this->m_antrian_lab->dataPanggilPerRuangKodeSisa('Sampling','B');
        $data['ruang_sampling_c_sisa']= $this->m_antrian_lab->dataPanggilPerRuangKodeSisa('Sampling','C');
        $data['ruang_sampling_d_sisa']= $this->m_antrian_lab->dataPanggilPerRuangKodeSisa('Sampling','D');

		if ($data) {
			$this->response($data, REST_Controller::HTTP_OK);
			return;
		}

		$this->response(['message' => 'Terjadi kesalahan pada server'], REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
	}

    function status_panggil_get()
    {
        $data = $this->m_antrian_lab->dataPanggilAntrian();
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
        $ruang      = safe_post('ruang');
        
        $user = $this->db->where('id_antrian', $idAntrian, true)->select('nama_user')->get('sm_tunda_panggilan_laboratorium')->row()->nama_user ?? NULL;
        $panggil = array(
            "id_antrian"     => $idAntrian,
            "waktu_panggil"  => date('Y-m-d H:i:s'),
            "jenis_panggil"  => $type,
            "nama_user"      => $user
        );
        $this->db->insert('sm_panggil_pasien_laboratorium', $panggil);


        if($ruang=='Admin'){
            if($type=='Call'){
                $call = array(
                    "waktu_panggil"      => date('Y-m-d H:i:s'),
                    "jml_panggil_admin"  => 1
                );
                $this->db->where('id', $idAntrian)->update('sm_antrian_laboratorium', $call);
            } else {
    
                $updateTunda = " UPDATE sm_antrian_laboratorium 
                                 SET jml_panggil_admin = ( SELECT jml_panggil_admin FROM sm_antrian_laboratorium WHERE id= '" . $idAntrian . "' ) + 1 , waktu_panggil  = '".date('Y-m-d H:i:s')."'
                                 WHERE id = '" . $idAntrian . "' ";
                $this->db->query($updateTunda);            
            }
        } else {
            if($type=='Call'){
                $call = array(
                    "waktu_panggil"      => date('Y-m-d H:i:s'),
                    "jml_panggil_sampling"  => 1
                );
                $this->db->where('id', $idAntrian)->update('sm_antrian_laboratorium', $call);
            } else {
    
                $updateTunda = " UPDATE sm_antrian_laboratorium 
                                 SET jml_panggil_sampling = ( SELECT jml_panggil_sampling FROM sm_antrian_laboratorium WHERE id= '" . $idAntrian . "' ) + 1 , waktu_panggil  = '".date('Y-m-d H:i:s')."'
                                 WHERE id = '" . $idAntrian . "' ";
                $this->db->query($updateTunda);            
            }
        }

        $updateAntrian = "UPDATE sm_tunda_panggilan_laboratorium SET status_panggil = 0 WHERE id_antrian = '" . $idAntrian . "' ";
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
        $data = $this->m_antrian_lab->antrianLaboratoriumById($idAntrian);

        if($data !== null){
            $ruang_lab = $data->ruang_laboratorium;
            $huruf_audio = $data->kode_antrian;
            
            

            $b = '<source src="'.resource_url().'audio/'.$huruf_audio.'.wav" type="audio/wav">';
            $angka_audio = (int)$data->urutan;
            $urutan_audio = $this->audio_huruf($angka_audio);
            $split_audio = explode(' ', $urutan_audio);

            $a = array();
            foreach ($split_audio as $key) {
                $e[] = $key;                    
            }

            $decode = ["metaData" => ["code" => 200,"message" => "Pemanggilan Pasien Berhasil","ruang" => $ruang_lab, "huruf_audio" => $huruf_audio, "angka_audio" => $angka_audio, "urutan_audio" => $e]];
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
}