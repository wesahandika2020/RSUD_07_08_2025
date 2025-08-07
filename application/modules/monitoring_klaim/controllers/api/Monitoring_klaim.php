<?php

defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

class Monitoring_klaim extends REST_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->limit = 10;        
        $this->load->model('vclaim_bpjs/Sep_v2_model', 'm_sep_v2');
        $this->load->model('Monitoring_klaim_model', 'klaim_model');
        $this->load->model('App_model', 'm_default');
        $this->code         = 400;
        $this->message      = "Tidak terhubung dengan Server BPJS, Server BPJS sedang bermasalah. Silahkan Hubungi Pihak IT BPJS";
        $this->bpjs_config  = $this->default->getConfigBPJSV2();
        
    }

    private function start($page)
    {
        return (($page - 1) * $this->limit);
    }

    function download_klaim_get()
    {
        $respon          = false;
        $tanggal         = date2mysql($this->get('tanggal', true));
        $jenis_pelayanan = $this->get('jenis_pelayanan', true);
        $status_klaim    = $this->get('status_klaim', true); 
        
        $url    = $this->bpjs_config->server . "/Monitoring/Klaim/Tanggal/" . $tanggal . "/JnsPelayanan/" . $jenis_pelayanan . "/status/" . $status_klaim;
        $header = $this->m_sep_v2->createHeader($this->bpjs_config);
        $output = getCurl($url, $header);
        $decode = json_decode($output);
        if ($decode == NULL) :
            $decode = ["metaData" => ["code" => $this->code, "message" => $this->message]];
            die(json_encode($decode));
        endif;
        $decode->response = $this->m_sep_v2->decryptResponse($decode->response);

        if (isset($decode->response) && $decode->metaData->code === "200"){
            foreach ($decode->response->klaim as $i => $klaim) :
                $nosep           = $klaim->noSEP;
                $tgl_sep         = $klaim->tglSep;
                $tgl_pulang      = $klaim->tglPulang;
                $status          = $klaim->status;
                $kelas_rawat     = $klaim->kelasRawat;
                $nofpk           = $klaim->noFPK;
                $poli            = $klaim->poli;
                $peserta_norm    = $klaim->peserta->noMR;
                $peserta_nama    = $klaim->peserta->nama;
                $peserta_nokartu = $klaim->peserta->noKartu;
                $inacbg_kode     = $klaim->Inacbg->kode;
                $inacbg_nama     = $klaim->Inacbg->nama;
                $biaya_pengajuan = $klaim->biaya->byPengajuan;
                $biaya_setujui   = $klaim->biaya->bySetujui;
                $biaya_tarif_gruper = $klaim->biaya->byTarifGruper;
                $biaya_tarif_rs  = $klaim->biaya->byTarifRS;
                $biaya_topup     = $klaim->biaya->byTopup;

                $data = array(
                    'tanggal'         => $tanggal,
                    'status_klaim'    => $status_klaim,
                    'jenis_pelayanan' => $jenis_pelayanan,
                    'nosep'           => $nosep,
                    'tgl_sep'         => $tgl_sep,
                    'tgl_pulang'      => $tgl_pulang,
                    'status'          => $status,
                    'kelas_rawat'     => $kelas_rawat,
                    'nofpk'           => $nofpk,
                    'poli'            => $poli,
                    'peserta_norm'    => $peserta_norm,
                    'peserta_nama'    => $peserta_nama,
                    'peserta_nokartu' => $peserta_nokartu,
                    'inacbg_kode'     => $inacbg_kode,
                    'inacbg_nama'     => $inacbg_nama,
                    'biaya_pengajuan' => $biaya_pengajuan,
                    'biaya_setujui'   => $biaya_setujui,
                    'biaya_tarif_gruper' => $biaya_tarif_gruper,
                    'biaya_tarif_rs'  => $biaya_tarif_rs,
                    'biaya_topup'     => $biaya_topup,
                );
                
                $respon = $this->klaim_model->downloadKlaim($data);
            endforeach;
        } else {
            $respon = array('status' => false, 'tanggal' =>  $tanggal, 'jenis_pelayanan' => $jenis_pelayanan, 'status_klaim' => $status_klaim, 'message' => 'Tidak ada data Monitoring Klaim');
        }

        $this->response($respon, REST_Controller::HTTP_OK);
        return;
    }

    function list_monitoring_klaim_get()
    {
        $search         = [
            'tanggal'         => date2mysql($this->get('tanggal', true)),
            'jenis_pelayanan' => $this->get('jenis_pelayanan', true),
            'status_klaim'    => $this->get('status_klaim', true), 
        ];

        $data['data']           = $this->klaim_model->getListMonitoringKlaim($search);
        $this->response($data, REST_Controller::HTTP_OK);
        return;
    }

}