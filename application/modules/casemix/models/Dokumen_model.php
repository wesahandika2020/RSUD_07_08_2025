<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Dokumen_model extends CI_Model
{
  public function __construct()
  {
    parent::__construct();
    $this->datetime = date('Y-m-d H:i:s');
    $this->load->model('keuangan/Keuangan_model', 'm_keuangan');
    $this->load->model('Casemix_model', 'm_casemix_billing');

    $this->load->model('pelayanan/Pelayanan_model', 'm_pelayanan');
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
        $val->pendaftaran = $this->m_casemix_billing->getListTarifTindakan($val->id, 'Ya');
        $val->item_billing += count((array)$val->pendaftaran);
        $val->tindakan = $this->m_casemix_billing->getListTarifTindakan($val->id, 'Tidak');
        $val->item_billing += count((array)$val->tindakan);
        $val->laboratorium = $this->m_casemix_billing->getListTarifLaboratoriumGroup($val->id);
        $val->item_billing += count((array)$val->laboratorium);
        $val->radiologi = $this->m_casemix_billing->getListTarifRadiologiGroup($val->id);
        $val->item_billing += count((array)$val->radiologi);
        $val->fisioterapi = $this->m_casemix_billing->getListTarifFisioterapiGroup($val->id);
        $val->item_billing += count((array)$val->fisioterapi);
        $val->barang = $this->m_casemix_billing->getListTarifBarang($val->id);
        $val->item_billing += count((array)$val->barang);
        $val->barang_operasi = $this->m_casemix_billing->getListTarifBarangOperasi($val->id);
        $val->item_billing += count((array)$val->barang_operasi);
        $val->rawat_inap = $this->m_casemix_billing->getListTarifKamar($val->id);
        $val->item_billing += count((array)$val->rawat_inap);
        $val->intensive_care = $this->m_casemix_billing->getListTarifKamarIcare($val->id);
        $val->item_billing += count((array)$val->intensive_care);
        $val->operasi = $this->m_casemix_billing->getListTarifOperasi($val->id, 'OK'); // Operatie Kamer
        $val->item_billing += count((array)$val->operasi);
        $val->vk = $this->m_casemix_billing->getListTarifOperasi($val->id, 'VK'); // Verlos Kamer
        $val->item_billing += count((array)$val->vk);
        $val->bank_darah = $this->m_casemix_billing->getListTarifBankDarah($val->id);
        $val->item_billing += count((array)$val->bank_darah);
        $val->barang_bank_darah = $this->m_casemix_billing->getListTarifBarangBankDarah($val->id);
        $val->item_billing += count((array)$val->barang_bank_darah);
        $val->retur_barang = $this->m_casemix_billing->getListReturBarang($val->id);
        $val->item_billing += count((array)$val->retur_barang);
        $val->hemodialisa = $this->m_casemix_billing->getListTarifHemodialisa($val->id);
        $val->item_billing += count((array)$val->hemodialisa);
      endforeach;
      $data['list_rincian_barang'] = $this->m_keuangan->getPenggunaanBarangPasien($id_pendaftaran);
      $data['petugas'] = $this->session->userdata('nama');
      $data['waktu'] = indo_time($this->datetime, true);
      $data['type'] = $type;
      if ($_SESSION['account'] == 'faizmsyam') :
      // var_dump($data); die;
      endif;
      // $view = 'printing/cetak_rincian_billing';
      // if ($type === 'download') :
      //   $view = 'printing/download_rincian_billing';
      // else :
      //   if ($type === 'json') :
      //     exit(json_encode($data));
      //   endif;
      // endif;
      // $this->load->view($view, $data);
      return $data;
    endif;
  }
}
