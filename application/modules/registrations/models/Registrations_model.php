<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

use GuzzleHttp\Client;

class Registrations_model extends CI_Model {

    private $services;

    function __construct()
    {
        parent::__construct();
        $this->services = new Client(array(
            'base_uri' => 'https://service-tlive.tangerangkota.go.id/services/tlive/',
            'auth' => ['r35t4p12', '8540c5ef27b4afdb197405dc551ce5b5bfcb73bb2']
        ));
    }
    
    function getDataPasienByNik($nik)
    {
        $response = $this->services->request('GET', 'ceknik/cek_nik/' . $nik);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result;
    }

    function getNoPolishPasien($no_rm, $pj)
    {
        $data = $this->db->get_where('sm_penjamin_pasien', ['id_pasien' => $no_rm, 'id_penjamin' => $pj])->row();
        $no_polish = '';
        
        if ($data) :
            $no_polish = $data->no_polish;
        endif;

        return $no_polish;
    }

    function getAutoPasien($q, $start, $limit) {
        $limit = " limit " . $limit . " offset " . $start;
        $where = "";
        if ($q !== "") :
            $where = "where ";
            if (is_numeric($q)) :
                $where .= "p.id ilike ('%".$q."')";
            else :
                $where .= "p.nama ilike ('".$q."%')";
            endif;
        endif;

        $count = "select count(p.id) as count ";
        $select = "select p.*, 
                pd.nama as pendidikan, 
                pk.nama as pekerjaan, 
                et.nama as etnis,
                pp.is_died, 
                pp.is_hiv, 
                pp.is_alergi, 
                pp.is_gonorrhea, 
                pp.is_hepatitis, 
                pp.is_kusta,
                pp.is_tbc, 
                pp.is_potensi_komplain, 
                pp.is_pasien_pejabat, 
                pp.is_pemilik_rs ";
        $sql = "from sm_pasien as p 
                left join sm_pendidikan as pd on pd.id = p.id_pendidikan
                left join sm_pekerjaan as pk on pk.id = p.id_pekerjaan 
                left join sm_etnis as et on et.id = p.id_etnis 
                left join sm_profil_pasien as pp on pp.id_pasien = p.id
                $where ";
        $order = " order by p.id";

        $data['data'] = $this->db->query($select.$sql.$order.$limit)->result();
        $data['total'] = $this->db->query($count.$sql)->row()->count;
        $this->db->close();
        return $data;
    }

	function getAutoPasienByNik($id)
    {
        $sql = "select count(p.id) as count   
                from sm_pasien as p 
                left join sm_pendidikan as pd on pd.id = p.id_pendidikan
                left join sm_pekerjaan as pk on pk.id = p.id_pekerjaan 
                left join sm_etnis as et on et.id = p.id_etnis 
                left join sm_profil_pasien as pp on pp.id_pasien = p.id
                where  p.no_identitas  = '" . $id . "'
                ";
        $result = $this->db->query($sql)->row();
        return $result;
    }
	
    function getAutoPasienLama($q, $start, $limit) {
        $limit = " limit " . $limit . " offset " . $start;
        $where = "";
        if ($q !== "") :
            $where = "where p.is_delete = 1 and ";
            if (is_numeric($q)) :
                $where .= "p.id ilike ('%".$q."')";
            else :
                $where .= "p.nama ilike ('".$q."%')";
            endif;
        endif;

        $count = "select count(p.id) as count ";
        $select = "select p.* ";
        $sql = "from sm_pasien_lama as p $where ";
        $order = " order by p.id";

        $data['data'] = $this->db->query($select.$sql.$order.$limit)->result();
        $data['total'] = $this->db->query($count.$sql)->row()->count;
        $this->db->close();
        return $data;
    }
}

/* End of file Registrations_model.php */
