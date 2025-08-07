<?php

defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

/**
 * @package         CodeIgniter
 * @subpackage      Rest Server
 * @category        Controller
 * @author          Faiz Muhammad Syam
 * @license         Syams Corporation
 */
class Apotek_bpjs extends REST_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->limit = 20;
        $this->date = date('Y-m-d');
        $this->datetime = date('Y-m-d H:i:s');
        $this->load->model('Apotek_bpjs_model', 'm_apotek_bpjs');
        $this->load->model('App_model', 'm_default');
        $this->today = date('Y-m-d');
        $this->historySepData = [];

        $this->code = 400;
        $this->message = "Tidak terhubung dengan Server BPJS, Server BPJS sedang bermasalah. Silahkan Hubungi Pihak IT BPJS";

        $this->bpjs_config = $this->default->getConfigApotekBPJS();
    }

    function referensi_dpho_get()
    {
        $url = $this->bpjs_config->server . "/referensi/dpho";
        $header = $this->m_apotek_bpjs->createHeader($this->bpjs_config);
        $output = getCurl($url, $header);
        $decode = json_decode($output);
        $decode->response = $this->m_apotek_bpjs->decryptResponse($decode->response);

        // $list = array();
        // if (isset($decode->response) && ($decode->response !== null)) :
        //     $temp = $decode->response->list;
        //     foreach ($temp as $key => $value) :
        //         array_push($list, array('id' => $value->kodeobat, 'kode' => $value->kodeobat, 'nama' => $value->namaobat));
        //         $insert = array(
        //             'kode_obat' => $value->kodeobat,
        //             'nama_obat' => $value->namaobat,
        //             'prb' => $value->prb,
        //             'kronis' => $value->kronis,
        //             'kemo' => $value->kemo,
        //             'harga' => $value->harga,
        //             'restriksi' => $value->restriksi,
        //             'generik' => $value->generik,
        //             'aktif' => $value->aktif,
        //         );

        //         $this->db->insert('sm_referensi_dpho', $insert);
        //     endforeach;
        // endif;

        // $this->response($list, REST_Controller::HTTP_OK);

        $this->response($decode, REST_Controller::HTTP_OK);
    }

    function referensi_settingppk_get()
    {
        $url = $this->bpjs_config->server . "/referensi/settingppk/read/0223A032";
        $header = $this->m_apotek_bpjs->createHeader($this->bpjs_config);
        $output = getCurl($url, $header);
        $decode = json_decode($output);
        $decode->response = $this->m_apotek_bpjs->decryptResponse($decode->response);

        $this->response($decode, REST_Controller::HTTP_OK);
    }

    function referensi_spesialistik_get()
    {
        $url = $this->bpjs_config->server . "/referensi/spesialistik";
        $header = $this->m_apotek_bpjs->createHeader($this->bpjs_config);
        $output = getCurl($url, $header);
        $decode = json_decode($output);
        $decode->response = $this->m_apotek_bpjs->decryptResponse($decode->response);

        $this->response($decode, REST_Controller::HTTP_OK);
    }

    function referensi_obat_get()
    {
        $KodeJenisObat      = '1'; // 1. Obat PRB, 2. Obat Kronis Blm Stabil, 3. Obat Kemoterapi
        $TglResep           = '2025-07-15';
        $FilterPencarian    = rawurlencode('Amlodipin 5 SK tab 5 mg');
        // $KodeJenisObat = $this->get('kode_jenis_obat');
        // $TglResep = $this->get('tgl_resep');
        // $FilterPencarian = $this->get('filter');

        $data = $this->m_apotek_bpjs->getReferensiObat($KodeJenisObat, $TglResep, $FilterPencarian);

        $this->response($data, REST_Controller::HTTP_OK);
    }

    function referensi_ppk_get()
    {
        $jenisFaskes      = '2'; //1. Faskes 1, 2. Faskes 2/RS
        $namaFaskes       = rawurlencode('rsud kota tangerang');
        // $jenisFaskes = $this->get('kode_jenis_obat');
        // $namaFaskes = $this->get('tgl_resep');

        $data = $this->m_apotek_bpjs->getReferensiPPK($jenisFaskes, $namaFaskes);

        $this->response($data, REST_Controller::HTTP_OK);
    }

    // Obat
    function simpan_obat_non_racikan_get()
    {
        $noSJP          = $this->get('no_sjp');
        $noResep        = $this->get('no_resep');
        $KodeJenisObat  = $this->get('kode_jenis_obat');
        $namaObat       = $this->get('nama_obat');
        $signa1Obat     = $this->get('signa1_obat');
        $signa2Obat     = $this->get('signa2_obat');
        $jumlahObat     = $this->get('jumlah_obat');
        $jho            = $this->get('jho');
        $catKhsObt      = $this->get('cat_khs_obt');

        $insert = array(
            "NOSJP"         => "0223A03207250000002",
            "NORESEP"       => "A022I",
            "KDOBT"         => "15241000016",
            "NMOBAT"        => "Kalsium Karbonat 500 SK tab 500 mg",
            "SIGNA1OBT"     => 1,
            "SIGNA2OBT"     => 1,
            "JMLOBT"        => 1,
            "JHO"           => 1,
            "CatKhsObt"     => "TES"
        );

        $data = $this->m_apotek_bpjs->simpanObatNonRacikan($insert);

        $this->response($data, REST_Controller::HTTP_OK);
    }

    function simpan_obat_racikan_get()
    {
        $noSJP      = $this->get('no_sjp');
        $noResep    = $this->get('no_resep');
        $KodeJenisObat      = $this->get('kode_jenis_obat');
        $namaObat           = $this->get('nama_obat');
        $signa1Obat        = $this->get('signa1_obat');
        $signa2Obat        = $this->get('signa2_obat');
        $permintaan    = $this->get('permintaan');
        $jumlahObat        = $this->get('jumlah_obat');
        $jho              = $this->get('jho');
        $catKhsObt         = $this->get('cat_khs_obt');

        $insert = array(
            "NOSJP"         => "0223A03207250000002",
            "NORESEP"       => "A022I",
	        "JNSROBT"       =>"R.01",
            "KDOBT"         => "15241002209",
            "NMOBAT"        => "Gabapentin 100 SK kaps 100 mg",
            "SIGNA1OBT"     => 1,
            "SIGNA2OBT"     => 1,
            "PERMINTAAN"    => 1,
            "JMLOBT"        => 1,
            "JHO"           => 1,
            "CatKhsObt"     => "TES racikan",
        );

        $data = $this->m_apotek_bpjs->simpanObatRacikan($insert);

        $this->response($data, REST_Controller::HTTP_OK);
    }

    // Pelayanan Obat
    function hapus_pelayanan_obat_get()
    {
        $no_sep_apotek  = $this->get('no_sep_apotek');
        $no_resep       = $this->get('no_resep');
        $kode_obat      = $this->get('kode_obat');
        $tipe_obat      = $this->get('tipe_obat');

        $insert = array(
            "nosepapotek"   => "1801A00104190000001",
            "noresep"       => "12345",
            "kodeobat"      => "25180404057",
            "tipeobat"      => "N"
        );

        $data = $this->m_apotek_bpjs->hapusPelayananObat($insert);

        $this->response($data, REST_Controller::HTTP_OK);
    }

    function daftar_pelayanan_obat_get()
    {
        $sep  = '0223R0380725V000001';
        // $sep  = $this->get('sep');
        $data = $this->m_apotek_bpjs->daftarPelayananObat($sep);

        $this->response($data, REST_Controller::HTTP_OK);
    }

    function riwayat_pelayanan_obat_get()
    {
        // $tanggal_awal  = $this->get('tanggal_awal');
        // $tanggal_akhir  = $this->get('tanggal_akhir');
        // $no_kartu  = $this->get('no_kartu');
        $tanggal_awal   = '2025-06-17';
        $tanggal_akhir  = '2025-07-21';
        $no_kartu       = '0002051145055';

        $data = $this->m_apotek_bpjs->riwayatrPelayananObat($tanggal_awal, $tanggal_akhir, $no_kartu);

        $this->response($data, REST_Controller::HTTP_OK);
    }

    // Resep
    function simpan_resep_get()
    {
        $tgl_sjp            = $this->get('tgl_sjp');
        $ref_asal_sjp       = $this->get('ref_asal_sjp');
        $poli_resep         = $this->get('poli_resep');
        $kode_jenis_obat    = $this->get('kode_jenis_obat'); // (1. Obat PRB, 2. Obat Kronis Blm Stabil, 3. Obat Kemoterapi)
        $no_resep           = $this->get('no_resep');
        $id_user_sjp        = $this->get('id_user_sjp');
        $tgl_resep          = $this->get('tgl_resep');
        $tgl_pel_resep      = $this->get('tgl_pel_resep');
        $kode_dokter        = $this->get('kode_dokter');
        $iterasi            = $this->get('iterasi'); // (0. Non Iterasi, 1. Iterasi)

        $insert = array(
            "TGLSJP"        => "2025-07-17 02:50:00",
            "REFASALSJP"    => "0223R0380725V000001",
            "POLIRSP"       => "IGD",
            "KDJNSOBAT"     => "2", // (1. Obat PRB, 2. Obat Kronis Blm Stabil, 3. Obat Kemoterapi)
            "NORESEP"       => "A022I",
            "IDUSERSJP"     => "USR-01",
            "TGLRSP"        => "2025-07-17 02:40:00",
            "TGLPELRSP"     => "2025-07-17 02:50:00",
            "KdDokter"      => "37704",
            "iterasi"       => "0" // (0. Non Iterasi, 1. Iterasi)
        );

        $data = $this->m_apotek_bpjs->simpanResep($insert);

        $this->response($data, REST_Controller::HTTP_OK);
    }

    function hapus_resep_get()
    {
        $no_sjp         = $this->get('no_sjp');
        $ref_asal_sjp   = $this->get('ref_asal_sjp');
        $no_resep       = $this->get('no_resep');

        $insert = array(
            "nosjp"         => "0223A03207250000001",
            "refasalsjp"    => "0223R0380725V000001",
            "noresep"       => "12345"
        );

        $data = $this->m_apotek_bpjs->hapusResep($insert);

        $this->response($data, REST_Controller::HTTP_OK);
    }

    function daftar_resep_get()
    {
        $kode_ppk           = $this->get('kode_ppk');
        $kode_jenis_obat    = $this->get('kode_jenis_obat');
        $jenis_tanggal      = $this->get('jenis_tanggal');
        $tanggal_mulai      = $this->get('tanggal_mulai');
        $tanggal_akhir      = $this->get('tanggal_akhir');

        $insert = array(
            "kdppk"         => "0223A032",
            "KdJnsObat"     => "0", // (1. Obat PRB, 2. Obat Kronis Blm Stabil, 3. Obat Kemoterapi)
            "JnsTgl"        => "TGLRSP", //format -> TGLPELSJP,TGLRSP
            "TglMulai"      => "2025-07-17",
            "TglAkhir"      => "2025-07-17"
        );

        $data = $this->m_apotek_bpjs->daftarResep($insert);

        $this->response($data, REST_Controller::HTTP_OK);
    }

    // SEP
    function kunjungan_by_sep_get()
    {
        $sep           = '0223R0380725V000001';
        // $sep           = $this->get('sep');
        $data = $this->m_apotek_bpjs->getKunjunganSEP($sep);

        $this->response($data, REST_Controller::HTTP_OK);
    }

    // MONITORING
    function monitoring_apotek_get()
    {
        $bulan           = $this->get('bulan');
        $tahun           = $this->get('tahun');
        $jenis_obat      = $this->get('jenis_obat'); // (0. Semua 1. Obat PRB 2. Obat Kronis Blm Stabil 3. Obat Kemoterapi)
        $status          = $this->get('status'); // (1. Belum diverifikasi 2. Sudah Verifikasi)

        $bulan           = '7';
        $tahun           = '2025';
        $jenis_obat      = '0'; // (0. Semua 1. Obat PRB 2. Obat Kronis Blm Stabil 3. Obat Kemoterapi)
        $status          = '0'; // (0. Belum diverifikasi 1. Sudah Verifikasi)

        $data = $this->m_apotek_bpjs->getMonitoring($bulan, $tahun, $jenis_obat, $status);

        $this->response($data, REST_Controller::HTTP_OK);
    }
}
