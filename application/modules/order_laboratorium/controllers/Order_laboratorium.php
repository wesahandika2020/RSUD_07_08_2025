<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Order_laboratorium extends SYAM_Controller 
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('App_model', 'default');
        $this->load->model('Masterdata_model', 'm_masterdata');
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

    function page_order_laboratorium()
    {
		$data['jenis_laboratorium'] = $this->m_masterdata->getJenisLaboratorium();
        $data['jenis_tindakan'] = 'Rawat Jalan';
        $this->load->view('index',$data);
    }

	function cetak_worksheet_laboratorium( $id ) {
		if ( ! $id ) {
			$this->response( null, REST_Controller::HTTP_BAD_REQUEST );
		}
		$this->load->model('Order_laboratorium_model', 'm_order_laboratorium');

		$data = $this->m_order_laboratorium->getExportDataDetailOrderLaboratorium($id);
		$this->load->view( 'printing/cetak-worksheet-laboratorium.php', $data );
	}
}
