<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Rekap_billing extends SYAM_Controller 
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('App_model', 'm_default');
        $this->load->model('Masterdata_model', 'm_masterdata');
        $this->load->model('keuangan/Keuangan_model', 'm_keuangan');
        $this->load->model('Rekap_billing_model', 'm_rekap_billing');
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

    function page_rekap_billing()
    {
		$data['cara_bayar'] = $this->m_masterdata->getCaraBayar(true);
		$data['jenis_layanan'] = $this->m_masterdata->getJenisLayanan();
		$data['status_bayar'] = $this->m_keuangan->statusPembayaran();
        $this->load->view('index', $data);
    }

    function printing_rincian_billing($id_pendaftaran = NULL, $type = NULL, $id_layanan_pendaftaran = NULL)
    {
        if ($id_pendaftaran !== NULL) :
            $total_bayar_pasien = 0;
            $total_tagihan_pasien = 0;
            $data = $this->m_keuangan->getPendaftaranDetail($id_pendaftaran, $id_layanan_pendaftaran);
            $data['title'] = 'Rincian Billing';
            $data['hospital'] =  $data['hospital'] = $this->m_default->getDataHospital();
            $data['id_layanan_pendaftaran'] = $id_layanan_pendaftaran;
            if (count((array)$data['pasien']) < 1) :
                exit;
            endif;
            foreach ($data['layanan'] as $i => $val) :
                $val->pendaftaran = $this->m_rekap_billing->getListTarifTindakan($val->id, 'Ya');
                $val->item_billing += count((array)$val->pendaftaran);
                $val->tindakan = $this->m_rekap_billing->getListTarifTindakan($val->id, 'Tidak');
                $val->item_billing += count((array)$val->tindakan);
                $val->laboratorium = $this->m_rekap_billing->getListTarifLaboratoriumGroup($val->id);
                $val->item_billing += count((array)$val->laboratorium);
                $val->radiologi = $this->m_rekap_billing->getListTarifRadiologiGroup($val->id);
                $val->item_billing += count((array)$val->radiologi);
                $val->fisioterapi = $this->m_rekap_billing->getListTarifFisioterapiGroup($val->id);
                $val->item_billing += count((array)$val->fisioterapi);
                $val->barang = $this->m_rekap_billing->getListTarifBarang($val->id);
                $val->item_billing += count((array)$val->barang);
                $val->barang_operasi = $this->m_rekap_billing->getListTarifBarangOperasi($val->id);
                $val->item_billing += count((array)$val->barang_operasi);
                $val->rawat_inap = $this->m_rekap_billing->getListTarifKamar($val->id);
                $val->item_billing += count((array)$val->rawat_inap);
                $val->intensive_care = $this->m_rekap_billing->getListTarifKamarIcare($val->id);
                $val->item_billing += count((array)$val->intensive_care);
                $val->operasi = $this->m_rekap_billing->getListTarifOperasi($val->id, 'OK'); // Operatie Kamer
                $val->item_billing += count((array)$val->operasi);
                $val->vk = $this->m_rekap_billing->getListTarifOperasi($val->id, 'VK'); // Verlos Kamer
                $val->item_billing += count((array)$val->vk);
                $val->bank_darah = $this->m_rekap_billing->getListTarifBankDarah($val->id);
                $val->item_billing += count((array)$val->bank_darah);
                $val->barang_bank_darah = $this->m_rekap_billing->getListTarifBarangBankDarah($val->id);
                $val->item_billing += count((array)$val->barang_bank_darah);
                $val->retur_barang = $this->m_rekap_billing->getListReturBarang($val->id);
                $val->item_billing += count((array)$val->retur_barang);
                $val->hemodialisa = $this->m_rekap_billing->getListTarifHemodialisa($val->id);
                $val->item_billing += count((array)$val->hemodialisa);
                $val->pkrt = $this->m_rekap_billing->getListTarifPKRT($val->id);
                $val->item_billing += count((array)$val->pkrt);
            endforeach;
            $data['list_rincian_barang'] = $this->m_keuangan->getPenggunaanBarangPasien($id_pendaftaran);
            $data['petugas'] = $this->session->userdata('nama');
            $data['waktu'] = indo_time($this->datetime, true);
            $data['type'] = $type;
            $data['id_pendaftaran'] = $id_pendaftaran;
            if ($_SESSION['account'] == 'faizmsyam') :
                // echo '<pre>';
                // print_r($data); die;
                // echo '</pre>';
            endif;
            $view = 'printing/cetak_rincian_billing';
            if ($type === 'download') :
                $view = 'printing/download_rincian_billing';
            else :
                if ($type === 'json') :
                    exit(json_encode($data));
                endif;
                if ($type === 'data') :
                    return $data;
                endif;
            endif;
            $this->load->view($view, $data);
        endif;
    }
}