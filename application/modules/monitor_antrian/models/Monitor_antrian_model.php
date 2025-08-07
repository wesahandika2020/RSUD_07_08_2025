<?php
defined('BASEPATH') or exit('No direct script access allowed');
use \LZCompressor\LZString;

class Monitor_antrian_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->datetime = date('Y-m-d');
        $this->load->model('App_model', 'm_default');
        $this->bpjs_config = $this->default->getConfigAntrianBPJS();
    }

    function dataPanggilSatu()
    {
        $this->db->select("ab.nomor_antrean, pp.*");

        $this->db->from('sm_panggil_pasien as pp')
                ->join('sm_antrian_bpjs as ab', 'ab.id = pp.id_antrian', 'left')
                ->where("pp.waktu BETWEEN '" . $this->datetime . " 00:00:00' AND '" . $this->datetime . " 23:59:59'")
                ->where('pp.loket', '1');
            
        
        $this->db->order_by('pp.id', 'desc');
        $this->db->limit(5);
        return $this->db->get()->result();
        $this->db->close();

    }

    function dataPanggilDua()
    {
        $this->db->select("ab.nomor_antrean, pp.*", false);

        $this->db->from('sm_panggil_pasien as pp')
                ->join('sm_antrian_bpjs as ab', 'ab.id = pp.id_antrian', 'left')
                ->where("pp.waktu BETWEEN '" . $this->datetime . " 00:00:00' AND '" . $this->datetime . " 23:59:59'")
                ->where('pp.loket', '2');
            
        
        $this->db->order_by('pp.id', 'desc');
        $this->db->limit(5);
        return $this->db->get()->result();
        $this->db->close();

    }

    function dataPanggilTiga()
    {
        $this->db->select("ab.nomor_antrean, pp.*", false);

        $this->db->from('sm_panggil_pasien as pp')
                ->join('sm_antrian_bpjs as ab', 'ab.id = pp.id_antrian', 'left')
                ->where("pp.waktu BETWEEN '" . $this->datetime . " 00:00:00' AND '" . $this->datetime . " 23:59:59'")
                ->where('pp.loket', '3');
            
        
        $this->db->order_by('pp.id', 'desc');
        $this->db->limit(5);
        return $this->db->get()->result();
        $this->db->close();

    }

    function dataPanggilEmpat()
    {
        $this->db->select("ab.nomor_antrean, pp.*", false);

        $this->db->from('sm_panggil_pasien as pp')
                ->join('sm_antrian_bpjs as ab', 'ab.id = pp.id_antrian', 'left')
                ->where("pp.waktu BETWEEN '" . $this->datetime . " 00:00:00' AND '" . $this->datetime . " 23:59:59'")
                ->where('pp.loket', '4');
            
        
        $this->db->order_by('pp.id', 'desc');
        $this->db->limit(5);
        return $this->db->get()->result();
        $this->db->close();

    }

    function dataPanggilLima()
    {
        $this->db->select("ab.nomor_antrean, pp.*", false);

        $this->db->from('sm_panggil_pasien as pp')
                ->join('sm_antrian_bpjs as ab', 'ab.id = pp.id_antrian', 'left')
                ->where("pp.waktu BETWEEN '" . $this->datetime . " 00:00:00' AND '" . $this->datetime . " 23:59:59'")
                ->where('pp.loket', '5');
            
        
        $this->db->order_by('pp.id', 'desc');
        $this->db->limit(5);
        return $this->db->get()->result();
        $this->db->close();

    }

    function dataPanggilEnam()
    {
        $this->db->select("ab.nomor_antrean, pp.*", false);

        $this->db->from('sm_panggil_pasien as pp')
                ->join('sm_antrian_bpjs as ab', 'ab.id = pp.id_antrian', 'left')
                ->where("pp.waktu BETWEEN '" . $this->datetime . " 00:00:00' AND '" . $this->datetime . " 23:59:59'")
                ->where('pp.loket', '6');
            
        
        $this->db->order_by('pp.id', 'desc');
        $this->db->limit(5);
        return $this->db->get()->result();
        $this->db->close();

    }

    function dataPanggilTujuh()
    {
        $this->db->select("ab.nomor_antrean, pp.*", false);

        $this->db->from('sm_panggil_pasien as pp')
                ->join('sm_antrian_bpjs as ab', 'ab.id = pp.id_antrian', 'left')
                ->where("pp.waktu BETWEEN '" . $this->datetime . " 00:00:00' AND '" . $this->datetime . " 23:59:59'")
                ->where('pp.loket', '7');
            
        
        $this->db->order_by('pp.id', 'desc');
        $this->db->limit(5);
        return $this->db->get()->result();
        $this->db->close();

    }

	function dataPanggilanDelapan()
	{
		$this->db->select("ab.nomor_antrean, pp.*", false);

		$this->db->from('sm_panggil_pasien as pp')
		         ->join('sm_antrian_bpjs as ab', 'ab.id = pp.id_antrian', 'left')
		         ->where("pp.waktu BETWEEN '" . $this->datetime . " 00:00:00' AND '" . $this->datetime . " 23:59:59'")
		         ->where('pp.loket', '8');


		$this->db->order_by('pp.id', 'desc');
		$this->db->limit(5);
        return $this->db->get()->result();
        $this->db->close();
	}

    function dataPanggilanSembilan()
    {
        $this->db->select("ab.nomor_antrean, pp.*", false);

        $this->db->from('sm_panggil_pasien as pp')
                 ->join('sm_antrian_bpjs as ab', 'ab.id = pp.id_antrian', 'left')
                 ->where("pp.waktu BETWEEN '" . $this->datetime . " 00:00:00' AND '" . $this->datetime . " 23:59:59'")
                 ->where('pp.loket', '9');


        $this->db->order_by('pp.id', 'desc');
        $this->db->limit(5);
        return $this->db->get()->result();
        $this->db->close();
    }

    function dataPanggilanSepuluh()
    {
        $this->db->select("ab.nomor_antrean, pp.*", false);

        $this->db->from('sm_panggil_pasien as pp')
                 ->join('sm_antrian_bpjs as ab', 'ab.id = pp.id_antrian', 'left')
                 ->where("pp.waktu BETWEEN '" . $this->datetime . " 00:00:00' AND '" . $this->datetime . " 23:59:59'")
                 ->where('pp.loket', '10');


        $this->db->order_by('pp.id', 'desc');
        $this->db->limit(5);
        return $this->db->get()->result();
        $this->db->close();
    }

}

