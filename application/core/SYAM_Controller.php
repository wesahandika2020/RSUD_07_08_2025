<?php 

class SYAM_Controller extends MX_Controller {
    
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helpers(array('url', 'xss', 'form', 'utility', 'syams', 'why', 'security', 'cookie'));
        $this->load->library(array('session', 'form_validation', 'running_text'));
        $this->load->model('App_model', 'default');

        $this->date = date('d/m/Y');
        $this->datetime = date('Y-m-d H:i:s');
        $this->user = $this->session->userdata('id_translucent');
        $this->avatar = $this->avatar();

        header("Expires: Tue, 01 Jan 2000 00:00:00 GMT");
        header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
        header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
        header("Cache-Control: post-check=0, pre-check=0", false);
        header("Pragma: no-cache");

        // $this->output->set_header('X-Powered-By: Cafeweb Indonesia');
        // $this->output->enable_profiler(TRUE);
    }

    private function avatar()
    {
        if ($this->user !== NULL) {
            $sql = "SELECT CONCAT_WS('.', profil, type) AS avatar FROM sm_pegawai WHERE id = " . $this->user;
            return $this->db->query($sql)->row()->avatar;
        } else {
            return '';
        }
    }

    function fms_signature()
	{
		if (fms_signature()) {
			$this->load->view('lock');
			$this->output->_display();
			exit;
		}
	}
    
}