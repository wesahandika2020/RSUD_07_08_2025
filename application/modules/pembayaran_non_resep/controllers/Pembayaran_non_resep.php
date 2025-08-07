<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembayaran_non_resep extends SYAM_Controller 
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('App_model', 'm_default');
        $this->load->model('Masterdata_model', 'm_masterdata');
        $this->load->model('keuangan/Keuangan_model', 'm_keuangan');
        $this->load->model('pelayanan/Pelayanan_model', 'm_pelayanan');
    }

    function index()
    {
        $data['active'] = 'Keuangan';
        $data['modules'] = $this->m_default->getDataModules($this->session->userdata('id_account_group'));
        $is_login = $this->session->userdata('is_login');

        if ($is_login === true) :
            $data['hospital'] = $this->m_default->getDataHospital();
            $this->load->view('layouts/index', $data);

        else :
            redirect('/');

        endif;
    }

    function page_pembayaran_non_resep()
    {
        $data['unit_kasir'] = $this->m_masterdata->getUnitKasir();
        $data['layanan'] = 'Non Resep';
        $this->load->view('index',$data);
	}
	
	function printing_nota_pembayaran_non_resep()
    {
        $id = safe_get('id');
        $data['title'] = 'BUKTI PEMBAYARAN PENJUALAN NON RESEP / BEBAS';
        $data['hospital'] = $this->m_default->getDataHospital();
        $data['list_data'] = $this->m_pelayanan->getPenjualan($id)->result();
        
        $this->db->select("hp.no_kwitansi")->from('sm_history_pembayaran as hp');
        $this->db->join('sm_penjualan as pj', "pj.id_history_pembayaran = hp.id");
        $this->db->where('pj.id', $id);
        $query = $this->db->get()->row();
        $no_kwitansi = '';
        if (count((array)$query)) :
            $no_kwitansi = $query->no_kwitansi;
        endif;
        $data['no_kwitansi'] = $no_kwitansi;
        $this->load->view('printing/cetak_nota_pembayaran_non_resep', $data);
    }
}