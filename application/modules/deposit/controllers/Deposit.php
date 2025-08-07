<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Deposit extends SYAM_Controller 
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('App_model', 'm_default');
        $this->load->model('Masterdata_model', 'm_masterdata');
        $this->load->model('keuangan/Keuangan_model', 'm_keuangan');
        $this->load->model('deposit/Deposit_model', 'm_deposit');
        $this->load->model('pasien/Pasien_model', 'm_pasien');
        $this->load->model('pendaftaran/Pendaftaran_model', 'm_pendaftaran');
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

    function page_deposit()
    {
		$data['jenis_transaksi'] = ['' => 'Pilih', 'setor' => 'Setor', 'ambil' => 'Ambil'];
		$data['kelamin'] = $this->m_masterdata->getKelamin(); 
        $this->load->view('index', $data);
    }

    function printing_kwitansi_deposit($id_deposit = NULL)
    {
        if ($id_deposit !== NULL) :
            $data['title'] = 'Cetak Kwitansi Deposit';
            $data['hospital'] = $this->m_default->getDataHospital();
            $deposit = $this->m_deposit->depositPasien($id_deposit);
            if (count((array)$deposit) === 0) :
                exit;
            endif;
            $data['pasien'] = $data['pasien'] = $this->m_pasien->getDataPasienById($deposit->id_pasien);
            $data['deposit'] = $deposit;
            $data['petugas_kasir'] = $this->session->userdata('nama');
            $data['keterangan'] = '';
            if (0 < $deposit->masuk) :
                $data['nominal'] = $deposit->masuk;
            else :
                $data['nominal'] = $deposit->keluar;
                if ($deposit->id_history_pembayaran === NULL) :
                    $data['keterangan'] = 'Retur';
                endif;
            endif;

            $this->load->view('printing/cetak_kwitansi_deposit', $data);
        endif;
    }
}