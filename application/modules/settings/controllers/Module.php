<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Module extends SYAM_Controller {
    
    function __construct()
    {
        parent::__construct();
        $this->load->model('App_model', 'default');
    }

    function index()
    {
        $data['active'] = 'Settings';
        $data['modules'] = $this->default->getDataModules($this->session->userdata('id_account_group'));
        $is_login = $this->session->userdata('is_login');
        
        if ($is_login === true) :
            $data['hospital'] = $this->default->getDataHospital();
            $this->load->view('layouts/index', $data);
        
        else :
            redirect('/');
        
        endif;
    }

    function page_module()
    {
        $this->load->view('module/index');
    }

}
