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
class Aplicares_bpjs extends REST_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->limit = 50;
        $this->date = date('Y-m-d');
        $this->datetime = date('Y-m-d H:i:s');
        $this->load->model('Aplicares_model', 'm_aplicares');
        $this->load->model('App_model', 'm_default');

        $this->code = 400;
        $this->message = "Tidak terhubung dengan Server BPJS, Server BPJS sedang bermasalah. Silahkan Hubungi Pihak IT BPJS";

        $this->bpjs_config = $this->default->getConfigAplicares();
    }

    function get_bed_tersedia_get()
    {
        $limit  = $this->limit;
        $start  = 1;
        $kodeppk = $this->bpjs_config->no_ppk;

        $url    = $this->bpjs_config->server . "aplicaresws/rest/bed/read/" . $kodeppk . "/" . $start . "/" . $limit;
        $header = $this->m_aplicares->createHeader($this->bpjs_config);
        $output = getCurl($url, $header);
        $decode = json_decode($output);
        if ($decode == NULL) :
            $decode = ["metaData" => ["code" => $this->code, "message" => $this->message]];
            die(json_encode($decode));
        endif;
        $decode->response = $this->m_aplicares->decryptResponse($decode->response);
        $this->response($decode, REST_Controller::HTTP_OK);
    }

    function get_ruang_rawat_get()
    {
        $limit  = $this->limit;
        $start  = 1;
        $kodeppk = $this->bpjs_config->no_ppk;

        $url    = $this->bpjs_config->server . "rest/bed/read/" . $kodeppk . "/" . $start . "/" . $limit;
        $header = $this->m_aplicares->createHeader($this->bpjs_config);
        $output = getCurl($url, $header);
        // die($output);

        $decode    = json_decode($output);
        $bed_tersedia = array();

        if (isset($decode->response) && ($decode->response !== null)) :
            $bed_tersedia = $decode->response->list;
        // $temp = $decode->response->list;
        // foreach ($temp as $key => $value) :
        //     array_push(
        //         $bed_tersedia,
        //         array(
        //             "koderuang"             => $value->koderuang,
        //             "namaruang"             => $value->namaruang,
        //             "kodekelas"             => $value->kodekelas,
        //             "namakelas"             => $value->namakelas,
        //             "kapasitas"             => $value->kapasitas,
        //             "tersedia"              => $value->tersedia,
        //             "tersediapria"          => $value->tersediapria,
        //             "tersediawanita"        => $value->tersediawanita,
        //             "tersediapriawanita"    => $value->tersediapriawanita,
        //             // "lastupdateall"         => $value->lastupdateall,
        //         )
        //     );
        // endforeach;
        endif;

        die(json_encode($bed_tersedia));
        // $decode = json_decode($output);
        // if ($decode == NULL) :
        //     $decode = ["metaData" => ["code" => $this->code, "message" => $this->message]];
        //     die(json_encode($decode));
        // endif;
        // $decode->response = $this->m_aplicares->decryptResponse($decode->response);
        // $this->response($decode, REST_Controller::HTTP_OK);
    }

    public function create_all_bed_post()
    {
        $kodeppk = $this->bpjs_config->no_ppk;
        // $this->load->model('Bed_model', 'm_bed');

        $req = '';
        $url = $this->bpjs_config->server . "rest/bed/create/" . $kodeppk;
        $beds = $this->m_aplicares->DataSummaryBed();
        foreach ($beds as $key => $value) :

            var_dump($value->id); die;
            if (empty($value->id)) {
                $data = array(
                    "kodekelas"             => $value->kodekelas,
                    "koderuang"             => $value->koderuang,
                    "namaruang"             => $value->namaruang,
                    "kapasitas"             => $value->kapasitas,
                    "tersedia"              => $value->tersedia,
                    "tersediapria"          => $value->tersediapria,
                    "tersediawanita"        => $value->tersediawanita,
                    "tersediapriawanita"    => $value->tersediapriawanita,
                    "update_terakhir"       => $this->datetime,
                    "user_log"              => $this->session->userdata('nama')
                );
                $this->db->insert('sm_ketersediaan_bed', $data);
                $kode_ruang_new = $this->db->insert_id();

                $req = array(
                    "kodekelas"             => $value->kodekelas,
                    "koderuang"             => $kode_ruang_new,
                    "namaruang"             => $value->namaruang,
                    "kapasitas"             => $value->kapasitas,
                    "tersedia"              => $value->tersedia,
                    "tersediapria"          => $value->tersediapria,
                    "tersediawanita"        => $value->tersediawanita,
                    "tersediapriawanita"    => $value->tersediapriawanita
                );

                $header = $this->m_aplicares->createHeader($this->bpjs_config);
                $header[3] = "Content-type: application/json";
                // $header[3] = "Content-type: application/www-x-form-urlencoded";

                $output = postCurl($url, json_encode($req), $header);

                $outputJson = json_decode($output);
                // if ($outputJson->metadata->code == "1") {
                //     // $update_lp = array("no_rujukan" => $outputJson->response->rujukan->noRujukan);
                //     // $this->db->where("no_sep", $no_sep)->update("sm_layanan_pendaftaran", $update_lp);
                //     $this->db->insert('sm_ketersediaan_bed', $data);
                // }
            } else {
                $output = [
                    'metadata' => [
                        'code' => 400,
                        'message' => 'Gagal! Data tidak disimpan.'
                    ]
                ];
            }
        endforeach;
        exit($output);
    }

    public function create_bed_post()
    {
        $kode_kelas = $this->get('kodekelas');
        $kode_ruang = $this->get('koderuang');

        $kodeppk = $this->bpjs_config->no_ppk;
        // $this->load->model('Bed_model', 'm_bed');

        // $req = '';
        $url = $this->bpjs_config->server . "rest/bed/create/" . $kodeppk;
        $bed = $this->m_aplicares->DataSummaryBedById($kode_kelas, $kode_ruang);

        // var_dump($bed[0]->id);
        // die;
        if (empty($bed[0]->id)) {
            $data = array(
                "kodekelas"             => $bed[0]->kodekelas,
                "koderuang"             => $bed[0]->koderuang,
                "namaruang"             => $bed[0]->namaruang,
                "kapasitas"             => $bed[0]->kapasitas,
                "tersedia"              => $bed[0]->tersedia,
                "tersediapria"          => $bed[0]->tersediapria,
                "tersediawanita"        => $bed[0]->tersediawanita,
                "tersediapriawanita"    => $bed[0]->tersediapriawanita,
                "update_terakhir"       => $this->datetime,
                "user_log"              => $this->session->userdata('nama')
            );
            $this->db->insert('sm_ketersediaan_bed', $data);
            $kode_ruang_new = $this->db->insert_id();

            $req = array(
                "kodekelas"             => $bed[0]->kodekelas,
                "koderuang"             => $kode_ruang_new,
                "namaruang"             => $bed[0]->namaruang,
                "kapasitas"             => $bed[0]->kapasitas,
                "tersedia"              => $bed[0]->tersedia,
                "tersediapria"          => $bed[0]->tersediapria,
                "tersediawanita"        => $bed[0]->tersediawanita,
                "tersediapriawanita"    => $bed[0]->tersediapriawanita
            );

            $header = $this->m_aplicares->createHeader($this->bpjs_config);
            $header[3] = "Content-type: application/json";
            // $header[3] = "Content-type: application/www-x-form-urlencoded";

            $output = postCurl($url, json_encode($req), $header);

            $outputJson = json_decode($output);
            // if ($outputJson->metadata->code == "1") {
            //     // $update_lp = array("no_rujukan" => $outputJson->response->rujukan->noRujukan);
            //     // $this->db->where("no_sep", $no_sep)->update("sm_layanan_pendaftaran", $update_lp);
            //     $this->db->insert('sm_ketersediaan_bed', $data);
            // }

            // var_dump($outputJson); die;
            // exit($output);
        } else {
            $output = [
                'metadata' => [
                    'code' => 400,
                    'message' => 'Gagal! Data tidak disimpan.'
                ]
            ];
        }
        exit($output);
    }

    public function update_all_bed_post()
    {
        $kodeppk = $this->bpjs_config->no_ppk;

        $req = '';
        $url = $this->bpjs_config->server . "rest/bed/update/" . $kodeppk;
        $beds = $this->m_aplicares->DataSummaryBed();
        foreach ($beds as $key => $value) :
            if (!empty($value->id)) {
                $req = array(
                    "kodekelas"             => $value->kodekelas,
                    "koderuang"             => $value->id,
                    "namaruang"             => $value->namaruang,
                    "kapasitas"             => $value->kapasitas,
                    "tersedia"              => $value->tersedia,
                    "tersediapria"          => $value->tersediapria,
                    "tersediawanita"        => $value->tersediawanita,
                    "tersediapriawanita"    => $value->tersediapriawanita
                );
                $data = array(
                    "kodekelas"             => $value->kodekelas,
                    "koderuang"             => $value->koderuang,
                    "namaruang"             => $value->namaruang,
                    "kapasitas"             => $value->kapasitas,
                    "tersedia"              => $value->tersedia,
                    "tersediapria"          => $value->tersediapria,
                    "tersediawanita"        => $value->tersediawanita,
                    "tersediapriawanita"    => $value->tersediapriawanita,
                    "update_terakhir"       => $this->datetime,
                    "user_log"              => $this->session->userdata('nama')
                );

                $header = $this->m_aplicares->createHeader($this->bpjs_config);
                $header[3] = "Content-type: application/json";
                // $header[3] = "Content-type: application/www-x-form-urlencoded";

                $output = postCurl($url, json_encode($req), $header);

                $outputJson = json_decode($output);
                if ($outputJson->metadata->code == "1") {
                    // $update_lp = array("no_rujukan" => $outputJson->response->rujukan->noRujukan);
                    // $this->db->where("no_sep", $no_sep)->update("sm_layanan_pendaftaran", $update_lp);
                    $this->db->where('id', $value->id, true)->update('sm_ketersediaan_bed', $data);
                }
            }
        endforeach;
        exit($output);
    }

    public function update_bed_post($kode_ruang)
    {
        $kodeppk = $this->bpjs_config->no_ppk;
        $beds = $this->m_aplicares->DataSummaryBedById(null, $kode_ruang);

        $req = '';
        $url = $this->bpjs_config->server . "rest/bed/update/" . $kodeppk;
        // var_dump($beds);
        // die; exit;

        foreach ($beds as $key => $value) :
            $req = array(
                "kodekelas"             => $value->kodekelas,
                "koderuang"             => $value->id,
                "namaruang"             => $value->namaruang,
                "kapasitas"             => $value->kapasitas,
                "tersedia"              => $value->tersedia,
                "tersediapria"          => $value->tersediapria,
                "tersediawanita"        => $value->tersediawanita,
                "tersediapriawanita"    => $value->tersediapriawanita
            );
            $data = array(
                "kodekelas"             => $value->kodekelas,
                "koderuang"             => $value->koderuang,
                "namaruang"             => $value->namaruang,
                "kapasitas"             => $value->kapasitas,
                "tersedia"              => $value->tersedia,
                "tersediapria"          => $value->tersediapria,
                "tersediawanita"        => $value->tersediawanita,
                "tersediapriawanita"    => $value->tersediapriawanita,
                "update_terakhir"       => $this->datetime,
                "user_log"              => $this->session->userdata('nama')
            );

            $header = $this->m_aplicares->createHeader($this->bpjs_config);
            $header[3] = "Content-type: application/json";
            // $header[3] = "Content-type: application/www-x-form-urlencoded";

            $output = postCurl($url, json_encode($req), $header);

            $outputJson = json_decode($output);
            if ($outputJson->metadata->code == "1") {
                // $update_lp = array("no_rujukan" => $outputJson->response->rujukan->noRujukan);
                // $this->db->where("no_sep", $no_sep)->update("sm_layanan_pendaftaran", $update_lp);
                $this->db->where('id', $value->id, true)->update('sm_ketersediaan_bed', $data);
            }
        endforeach;
        exit($output);
    }

    public function delete_bed_post($kodekelas, $koderuang)
    {
        $kodeppk = $this->bpjs_config->no_ppk;
        // $this->load->model('Bed_model', 'm_bed');
        $req = '';
        $url = $this->bpjs_config->server . "rest/bed/delete/" . $kodeppk;
        $bed = $this->m_aplicares->DataSummaryBedById($kodekelas, $koderuang);
        $id_ruang = $bed[0]->id;

        $req = array(
            "kodekelas"             => $kodekelas,
            "koderuang"             => $id_ruang
        );

        $header = $this->m_aplicares->createHeader($this->bpjs_config);
        $header[3] = "Content-type: application/json";
        // $header[3] = "Content-type: application/www-x-form-urlencoded";

        $output = postCurl($url, json_encode($req), $header);

        $outputJson = json_decode($output);
        if ($outputJson->metadata->code == "1") {
            // $update_lp = array("no_rujukan" => $outputJson->response->rujukan->noRujukan);
            // $this->db->where("no_sep", $no_sep)->update("sm_layanan_pendaftaran", $update_lp);
            // $this->db->insert("sm_ketersediaan_bed", $data);
            $this->db->where('id', $id_ruang, true)->delete('sm_ketersediaan_bed');
        }
        exit($output);
    }

    // public function updated_bed_post()
    // {
    //     $tipe            = safe_post("tipe");
    //     $no_sep          = safe_post("no_sep");
    //     $no_rujukan      = safe_post("no_rujukan");
    //     $tglrujuk        = date2mysql(safe_post("tanggal_dirujuk"));
    //     $ppk_rujukan     = safe_post("ppk_rujukan");
    //     $jenis_pelayanan = safe_post("jenis_pelayanan");
    //     $tipe_rujukan    = safe_post("tipe_rujukan");
    //     $poli            = safe_post("poli");
    //     $diagnosa        = safe_post("diagnosa");
    //     $catatan         = safe_post("catatan");
    //     if ($tipe === "create") :
    //         $url = $this->bpjs_config->server . "/Rujukan/insert";
    //         $req = array(
    //             "request"              => array(
    //                 "t_rujukan"        => array(
    //                     "noSep"        => $no_sep,
    //                     "tglRujukan"   => $tglrujuk,
    //                     "ppkDirujuk"   => $ppk_rujukan,
    //                     "jnsPelayanan" => $jenis_pelayanan,
    //                     "catatan"      => $catatan,
    //                     "diagRujukan"  => $diagnosa,
    //                     "tipeRujukan"  => $tipe_rujukan,
    //                     "poliRujukan"  => $poli,
    //                     "user"         => $this->session->userdata("user")
    //                 )
    //             )
    //         );
    //     else :
    //         $url = $this->bpjs_config->server . "/Rujukan/update";
    //         $req = array(
    //             "request"              => array(
    //                 "t_rujukan"        => array(
    //                     "noRujukan"    => $no_rujukan,
    //                     "ppkDirujuk"   => $ppk_rujukan,
    //                     "tipe"         => $tipe_rujukan,
    //                     "jnsPelayanan" => $jenis_pelayanan,
    //                     "catatan"      => $catatan,
    //                     "diagRujukan"  => $diagnosa,
    //                     "tipeRujukan"  => $tipe_rujukan,
    //                     "poliRujukan"  => $poli,
    //                     "user"         => $this->session->userdata("user")
    //                 )
    //             )
    //         );
    //     endif;

    //     $header = $this->sep->createHeader($this->bpjs_config);
    //     $header[3] = "Content-type: application/www-x-form-urlencoded";
    //     if ($tipe === "create") {
    //         $output = postCurl($url, json_encode($req), $header);
    //     } else {
    //         $output = customCurl("PUT", $url, json_encode($req), $header);
    //     }
    //     $outputJson = json_decode($output);
    //     if ($tipe === "create" && isset($outputJson->response) && $outputJson->metaData->code === "200") {
    //         $update_lp = array("no_rujukan" => $outputJson->response->rujukan->noRujukan);
    //         $this->db->where("no_sep", $no_sep)->update("sm_layanan_pendaftaran", $update_lp);
    //     }
    //     exit($output);
    // }
}
