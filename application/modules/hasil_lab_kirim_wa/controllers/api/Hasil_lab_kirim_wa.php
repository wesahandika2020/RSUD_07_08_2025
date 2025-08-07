<?php

defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Hasil_lab_kirim_wa extends REST_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->limit = 10;
        $this->load->model('Hasil_lab_kirim_wa_model', 'm_lab_wa');
        $this->datetime = date('Y-m-d H:i:s');
        $this->id_translucent = $this->session->userdata('id_translucent');

        if (empty( $this->id_translucent)) :
            $this->response(array('error' => 'Anda belum login'), REST_Controller::HTTP_UNAUTHORIZED);
            exit();
        endif;
    }

    function update_notlp_put()
    {
        $this->db->trans_begin();
        $id        = $this->put('id', true);
        $id_pasien = $this->put('id_pasien', true);
        $telp      = $this->put('telp', true);
        $pendaftaran = $this->m_lab_wa->getPendaftaranById($id);

        $id_layanan_pendaftaran = $pendaftaran->id_layanan_pendaftaran;
        $catatan = 'Pendaftaran : ' . $pendaftaran->id;
        $catatan .= '<br>Sebelum edit Telp : ' . $pendaftaran->telp;

        $update = ['telp' => $telp];
        $this->db->where('id', $id_pasien)->update('sm_pasien', $update);

        $after = $this->m_lab_wa->getPendaftaranById($id);
        $catatan .= '<br>Setelah edit Telp : ' . $after->telp;

        if ($this->db->trans_status() === false) :
            $this->db->trans_rollback();
            $status = false;
        else :
            $this->db->trans_commit();
            $this->load->model('logs/Logs_model', 'm_logs');
            $this->m_logs->recordAdminLogs($id_layanan_pendaftaran, 'Edit No Telp dari LAB', $catatan);
            $status = true;
        endif;

        $message = array('status' => $status, 'id_layanan_pendaftaran' => $id_layanan_pendaftaran);
        $this->response($message, REST_Controller::HTTP_OK);
    }

    function get_list_hasil_lab_get()
    {
        $page = $this->get('page');

        if (!$page) {
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // 400
            return;
        }

        $start = ($page - 1) * $this->limit;

        $search = [            
			'jenis_tanggal'   => safe_get('jenis_tanggal'),
            'tanggal_awal'  => safe_get('tanggal_awal'),
            'tanggal_akhir' => safe_get('tanggal_akhir'),
            'no_rm'         => safe_get('no_rm'),
            'no_register'   => safe_get('no_register'),
            'nama'          => safe_get('nama'),
            'notlp'         => safe_get('notlp'),
            'jenis_rawat'   => safe_get('jenis_rawat'),
            'jenis_pendaftaran' => safe_get('jenis_pendaftaran'),
            'status_wa'     => safe_get('status_wa'),
        ];

        $data = $this->db->query($this->m_lab_wa->getListDataHasilLab($search, $start, $this->limit))->result();

        foreach ($data as $v) {
            $fileComplate  = true;
            $orderComplate = true;
            $data_layanan = [];
            if (!empty($v->id)) {
                $data_layanan = $this->db->query($this->m_lab_wa->getLayananLab($v->id))->result();
                foreach ($data_layanan as $index => $layanan) {
                    $cek_is_exist = $layanan->is_exist;
                    if($fileComplate == true){
                        if ($layanan->status == 'batal'){ $cek_is_exist = "1"; }
                        if ($layanan->status_hasil == 'Batal'){ $cek_is_exist = "1"; }
                        $cek_is_exist == "0" ? $fileComplate = false : $fileComplate = true;
                    }
                    if($orderComplate == true){
                        $layanan->status == "request" ? $orderComplate = false : $orderComplate = true;
                    }
                    // if($orderComplate == true){
                    //     $layanan->status_hasil == "Order" ? $orderComplate = false : $orderComplate = true;
                    // }
                    $dataTarif = json_decode($layanan->item);
                    $item = '';
                    if ($dataTarif !== null) {
                        foreach ($dataTarif as $tarif) {
                            $this->db->select("l.nama as layanan ");
                            $this->db->from("sm_tarif_pelayanan as tp");
                            $this->db->join("sm_layanan as l", "l.id = tp.id_layanan");
                            $this->db->where("tp.id", $tarif->item);
                            $order = $this->db->get()->row()->layanan ?? '';
                            $item == '' ? $item =$order : $item = $item . ', '. $order;
                        }
                    }
                    $layanan->item = $item;
                }
            }
            $v->data_layanan  = $data_layanan;
            $v->fileComplate  = $fileComplate;
            $v->orderComplate = $orderComplate;
            $v->tgl_layanan   = get_day($v->tanggal_daftar) .", ". get_date_format($v->tanggal_daftar);
        }
        
        $response = [
            'jumlah'=> $this->db->query($this->m_lab_wa->getListDataHasilLab($search, 0, 0))->num_rows(), 
            'data'  => $data,
            'page'  => (int) $page,
            'limit' => $this->limit,            
        ];

        $this->response($response, REST_Controller::HTTP_OK);
    }

    function get_hasil_lab_get()
    {
        $data = $this->db->query($this->m_lab_wa->getHasilLabById($this->get('id')))->row();
        if (!empty($data->id)) {
            $data_layanan = $this->db->query($this->m_lab_wa->getLayananLab($data->id))->result();
            foreach ($data_layanan as $index => $layanan) {
                $dataTarif = json_decode($layanan->item);
                $item = '';
                if ($dataTarif !== null) {
                    foreach ($dataTarif as $tarif) {
                        $this->db->select("l.nama as layanan ");
                        $this->db->from("sm_tarif_pelayanan as tp");
                        $this->db->join("sm_layanan as l", "l.id = tp.id_layanan");
                        $this->db->where("tp.id", $tarif->item);
                        $order = $this->db->get()->row()->layanan ?? '';
                        $item == '' ? $item =$order : $item = $item . ', '. $order;
                    }
                }
                $layanan->item = $item;
            }
        }
        $data->data_layanan = $data_layanan;

        $this->simpanDataHasilLab($data);
    }

    function simpanDataHasilLab($data)
    {
        $checkData = $this->m_lab_wa->getLabWaByIdPend($data->id);
        $checkDataBerhasil = $this->m_lab_wa->getLabWaByIdPendBerhasil($data->id);
        $this->db->trans_begin();

        $insert = array(
            'id_pendaftaran' => $data->id, 
            'no_hp'          => $data->telp, 
            'id_pasien'      => $data->id_pasien, 
            'nama_pasien'    => $data->nama, 
            'pass'           => $data->pass,
            'id_user'        => $this->id_translucent,
        );

		if ($checkData == null) {
            
            $insert['waktu_cek_file'] = $this->datetime;
			$this->db->insert('sm_lab_kirim_wa', $insert);

            $id_lab_wa = $this->db->insert_id();
            foreach ( $data->data_layanan as $index => $detail) {
                $insert_detail = array(
                    'id_lab_wa' => $id_lab_wa, 
                    'id_pasien' => $data->id_pasien, 
                    'kode'      => $detail->kode,
                    'is_exist'  => '0',
                    'is_kirim'  => '0',
                    'id_user'   => $this->id_translucent,
                    'waktu'     => $this->datetime,
                );
                $this->db->insert('sm_lab_kirim_wa_detail', $insert_detail);
            } 

            $this->get_file_detail($id_lab_wa);

            if ($this->db->trans_status() === FALSE) :
                $this->db->trans_rollback();
                $status  = FALSE;
                $message = 'Gagal cek file Hasil Lab';
            else :
                $this->db->trans_commit();
                $status  = TRUE;
                $message = 'Berhasil cek file Hasil Lab';
            endif;

            $this->response(array('status' => $status, 'message' => $message, 'data' => $data), REST_Controller::HTTP_OK);
            
		} else {

            if ($checkDataBerhasil == null) {
            
                $id_lab_wa = $checkData->id;
                $insert['id_lama'] = $id_lab_wa;
                $this->db->insert('sm_lab_kirim_wa_log', $insert);

                unset($insert['id_lama']);
                $insert['waktu_kirim'] = $this->datetime;
                $this->db->where('id', $id_lab_wa);
                $this->db->update('sm_lab_kirim_wa', $insert);

                $this->db->delete('sm_lab_kirim_wa_detail', ['id_lab_wa' => $id_lab_wa]);
                foreach ( $data->data_layanan as $index => $detail) {
                    $insert_detail = array(
                        'id_lab_wa' => $id_lab_wa, 
                        'id_pasien' => $data->id_pasien, 
                        'kode'      => $detail->kode,
                        'id_user'   => $this->id_translucent,
                        'waktu'     => $this->datetime,
                    );
                    $this->db->insert('sm_lab_kirim_wa_detail', $insert_detail);
                } 

                $this->get_file_detail($id_lab_wa);

                if ($this->db->trans_status() === FALSE) :
                    $this->db->trans_rollback();
                    $status  = FALSE;
                    $message = 'Gagal cek file Hasil Lab';
                else :
                    $this->db->trans_commit();
                    $status  = TRUE;
                    $message = 'Berhasil cek file Hasil Lab';
                endif;

                $this->response(array('status' => $status, 'message' => $message, 'data' => $data), REST_Controller::HTTP_OK);
           
            } else {
                $this->response(array('status' => FALSE, 'message' => 'Gagal kirim, tidak bisa mengirim data lebih dari sekali.', 'data' => $data), REST_Controller::HTTP_OK);           
            }

		}        
    }

    function get_file_detail($id_lab_wa)
    {
        $detail = $this->m_lab_wa->getFileDetailById($id_lab_wa);
        foreach ( $detail as $index => $value) {            
            $id_pasien = $value->id_pasien;
            $kode    = $value->kode;
            $fileUrl = "https://10.10.10.11/rsud/".$id_pasien."_".$kode.".pdf";  

			
			
            $ch = curl_init($fileUrl);
            curl_setopt($ch, CURLOPT_NOBODY, true);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_TIMEOUT, 10);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
            curl_exec($ch);
            $statusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
			
			
			$response = curl_exec($ch);

				// Cek apakah ada error
				if (curl_errno($ch)) {
					$error_message = curl_error($ch);
					log_message('error', 'cURL Error: ' . $error_message); // Logging di CodeIgniter
					echo 'Error: ' . $error_message; // Atau tampilkan langsung
				}
	
            curl_close($ch);
			
            if ($statusCode !== 200) {
                $update = array( 'is_exist' => 0 );
            } else {
                $update = array( 'is_exist' => 1 );
            }

			$this->db->where('id', $value->id);
			$this->db->update('sm_lab_kirim_wa_detail', $update);
        } 

        $this->response($detail, REST_Controller::HTTP_OK);
    }

    function respon_kirim_lab_wa_get()
    {
        $id_pendaftaran = $this->get('id_pendaftaran');
        $status         = $this->get('status');
        $respon         = $this->get('respon');
        $response = $this->m_lab_wa->responKirimLabWa($id_pendaftaran, $status, $respon);
        $this->response($response, 200);
    }

    function respon_kirim_lab_email_get()
    {
        $id_pendaftaran = $this->get('id_pendaftaran');
        $status_email   = $this->get('status_email');
        $respon         = $this->get('respon');
        $response = $this->m_lab_wa->responKirimLabEmail($id_pendaftaran, $status_email, $respon);
        $this->response($response, 200);
    }

    public function kirim_ulang_lab_wa_get()
    {
        $id_pendaftaran = $this->get('id_pendaftaran');
        if (empty($id_pendaftaran)) {
            $this->response(['status' => false, 'message' => 'ID pendaftaran kosong'], REST_Controller::HTTP_BAD_REQUEST);
            return;
        }

        $this->db->where('id_pendaftaran', $id_pendaftaran);
        $updated = $this->db->update('sm_lab_kirim_wa', ['status' => 'Ubah']);

        if ($updated) {
            $this->response(['status' => true, 'message' => 'Data berhasil diperbarui'], REST_Controller::HTTP_OK);
        } else {
            $this->response(['status' => false, 'message' => 'Gagal memperbarui data'], REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
        }

    }


    function get_file_terpilih_get()
    {
        $id_pendaftaran = $this->get('id_pendaftaran');
        $response = [
            'jumlah'=> $this->db->query($this->m_lab_wa->getfileTerpilih($id_pendaftaran))->num_rows(), 
            'data'  => $this->db->query($this->m_lab_wa->getfileTerpilih($id_pendaftaran))->result(),
        ];

        $this->response($response, REST_Controller::HTTP_OK);

    }

    function update_kirim_file_post()
    {
        $param = [
            'id_lab_wa'   => safe_post('id_lab_wa'),
            'id_labdt_wa' => safe_post('id_labdt_wa'),
            'is_kirim'    => safe_post('is_kirim')
        ];

        $data = $this->m_lab_wa->updateKirimFile($param);
        if ($data) {
            $this->response(['status' => true, 'message' => 'Berhasil mengubah status kirim.'], REST_Controller::HTTP_OK);
        } else {
            $this->response(['status' => false, 'message' => 'Gagal mengubah status kirim.'], REST_Controller::HTTP_OK);
        }
    }
}
