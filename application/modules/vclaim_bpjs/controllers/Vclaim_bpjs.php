<?php
defined('BASEPATH') or exit('No direct script access allowed');

class vclaim_bpjs extends SYAM_Controller
{
    function __construct()
    {
        parent::__construct();
    }

    // BPJS
    function nota_sep($no_sep, $format = 'print')
    {
        $this->load->model('vclaim_bpjs/Sep_model', 'sep');
        $this->load->model('pasien/Pasien_model', 'pasien');

        $bpjs_config = $this->default->getConfigBPJS();
        $data['hospital'] = $this->default->getDataHospital();

        $data['title']    = 'Nota SEP';
        $output           = null;
        $result           = null;
        $data['no_rm']    = '';

        // Cek history SEP
        $sep_history = $this->db->get_where('sm_history_sep', array('no_sep' => $no_sep))->row();
        $data['sep_history'] = $sep_history;
        if ((count((array) $sep_history) > 0) && ($sep_history->no_rm !== null)) :
            // Jika SEP sudah tersimpan
            $data['no_rm'] = $sep_history->no_rm;
        endif;

        $url    = $bpjs_config->server . "/SEP/";
        $header = $this->sep->createHeader($bpjs_config);
        $output = getCurl($url . $no_sep, $header);
        $result = json_decode($output);

        if ($output !== '') :
            if (($result !== null) && ($result->metaData->code === '200')) :
                $data['sep'] = $result->response;
                $data['pasien'] = $this->pasien->getDataPasienById($result->response->peserta->noMr);
				
                if ($format === 'json') :
                    die(json_encode($data));
                else :
                    $this->load->view('vclaim_bpjs/printing/nota_sep', $data);
                endif;
            else :
                echo "Koneksi bermasalah atau SEP tidak ditemukan";
            endif;
        else :
            echo "timeout";
        endif;
    }
}