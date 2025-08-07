<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Item_lab extends SYAM_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('App_model', 'default');
        $this->load->model('Item_lab_model', 'item_lab');
    }

    function index()
    {
        $data['active'] = 'Masterdata';
        $data['modules'] = $this->default->getDataModules($this->session->userdata('id_account_group'));
        $is_login = $this->session->userdata('is_login');

        if ($is_login === true) :
            $data['hospital'] = $this->default->getDataHospital();
            $this->load->view('layouts/index', $data);

        else :
            redirect('/');

        endif;
    }

    function page_item_lab()
    {
        $data["kategori"] = $this->item_lab->get_kelamin_kategori();
        $data["operator"] = $this->item_lab->get_operator();
        $this->load->view('index', $data);
    }
}
