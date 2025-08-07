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
class Booking_bed extends REST_Controller
{

    function __construct()
    {
        parent::__construct();
		$this->limit = 10;
		$this->datetime = date('Y-m-d H:i:s');
        $this->load->model('Booking_bed_model', 'm_booking_bed');

        $id_translucent = $this->session->userdata('id_translucent');
        if (empty($id_translucent)) :
            $this->response(array('error' => 'Anda belum login'), REST_Controller::HTTP_UNAUTHORIZED);
            exit();
        endif;
    }

    function get_list_booking_bed_get()
    {
        if (!$this->get('page')) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
        endif;
        
        $start          = ($this->get('page') - 1) * $this->limit;
        $search         = [
            'tanggal_awal'      => safe_get('tanggal_awal'),
            'tanggal_akhir'     => safe_get('tanggal_akhir'),
            'no_rm'             => safe_get('no_rm'),
            'nama'              => safe_get('nama'),
            'bangsal'           => safe_get('bangsal'),
            'status'            => safe_get('status'),
        ];
        
        $data            = $this->m_booking_bed->getListDataBookingBed($this->limit, $start, $search);
        $data['page']    = (int) $this->get('page');
        $data['limit']   = $this->limit;

        if ($data) :
            $this->response($data, REST_Controller::HTTP_OK); // (200)
        endif;
	}
    
    function simpan_data_booking_bed_post() 
    {
        $no_rm = $this->post('no_rm', true);
        $id_bed = $this->post('id_bed', true);
        $repeat = $this->post('repeat', true);
        if ($no_rm | $id_bed) :
            $result = array('status' => false, 'message' => 'Parameter tidak lengkap, silahkan menghubungi IT.');
            $this->response($result, REST_Controller::HTTP_OK);
        endif;

        if ($repeat > 2) :
            $repeat = 2;
        else :
            if ($repeat < 0) :
                $repeat = 0;
            endif;
        endif;

        // tampung data booking
        $dataBooking = array(
            'id_pasien' => $no_rm,
            'waktu' => $this->datetime,
            'id_bed' => $id_bed,
            'status' => 'request',
            'id_users' => $this->session->userdata('id_translucent'),
            'repeat' => $repeat
        );

        // check status booking
        $booking = $this->m_booking_bed->checkBookingStatus($no_rm);
        if ($booking) :
            $status = false;
            $message = 'Pasien ini telah melakukan booking bed';
        else :
            $status = $this->m_booking_bed->simpanBookingBed($id_bed, $dataBooking);
            if ($status) :
                $message = 'Berhasil melakukan booking bed';
            else :
                $message = 'Gagal melakukan booking bed';
            endif;
        endif;

        $result = array('status' => $status, 'message' => $message);
        $this->response($result, REST_Controller::HTTP_OK);
    }
    
    function batal_booking_bed_get() 
    {
        if (!$this->get('id', true)) :
            $result = array('status' => false, 'message' => 'Parameter tidak lengkap');
            $this->response($result, REST_Controller::HTTP_OK);
        endif;

        $dataBooking = $this->m_booking_bed->getDataBookingBedById($this->get('id', true));
        if ($dataBooking) :
            if ($dataBooking->status !== 'request') :
                $status = false;
                $message = "Booking bed telah dikonfirmasi atau dibatalkan";
            else :
                $status = $this->m_booking_bed->pembatalanBookingBed($this->get('id', true));
                if ($status) :
                    $message = "Berhasil melakukan pembatalan booking bed";
                else :
                    $message = "Gagal melakukan pembatalan booking bed";
                endif;
            endif;
        else :
            $status = false;
            $message = "Data booking bed tidak ditemukan";
        endif;

        $result = array('status' => $status, 'message' => $message);
        $this->response($result, REST_Controller::HTTP_OK);
    }
}
