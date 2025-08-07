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
class Vclaim_bpjs extends REST_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->limit = 20;
        $this->datetime = date('Y-m-d H:i:s');
        $this->load->model('Sep_model', 'sep');
        $this->load->model('App_model', 'default');

        $this->bpjs_config = $this->default->getConfigBPJS();
    }

    function get_peserta_get()
    {
        if (!$this->get('nokartu')) {
            $this->response(NULL, 400);
        }

        $no_kartu = $this->get('nokartu');
        $url = $this->bpjs_config->server . "/Peserta/nokartu/" . $no_kartu . "/tglSEP/" . date("Y-m-d");
        $header = $this->sep->createHeader($this->bpjs_config);
        $output = getCurl($url, $header);
        $decode = json_decode($output);

        if ($decode->metaData->code === "200") {
            $jenis_peserta = $decode->response->peserta->jenisPeserta->keterangan;
            $this->sep->updateKepesertaanBPJS($no_kartu, $jenis_peserta);
        }
        die($output);
    }

    function get_peserta_by_nik_get()
    {
        if (!$this->get('nik')) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST);
        endif;

        $nik    = $this->get('nik');
        $url    = $this->bpjs_config->server . "/Peserta/nik/" . $nik . "/tglSEP/" . date("Y-m-d");
        $header = $this->sep->createHeader($this->bpjs_config);
        $output = getCurl($url, $header);
        $decode = json_decode($output);
        if ($decode->metaData->code === "200") :
            $jenis_peserta = $decode->response->peserta->jenisPeserta->keterangan;
            $this->sep->updateKepesertaanBPJS($nik, $jenis_peserta);
        endif;

        die($output);
    }

    function get_diagnosa_get()
    {
        if (!isset($_GET['q'])) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST);
        endif;

        $icdx   = str_replace(' ', '+', safe_get('q'));
        $url    = $this->bpjs_config->server . "/referensi/diagnosa/" . $icdx;
        $header = $this->sep->createHeader($this->bpjs_config);
        $output = getCurl($url, $header);
        $decode = json_decode($output);

        $diagnosa = array();

        if (isset($decode->response) && ($decode->response !== null)) :
            $temp = $decode->response->diagnosa;
            foreach ($temp as $key => $value) :
                array_push($diagnosa, array('id' => $value->kode, 'kode' => $value->kode, 'nama' => $value->nama));
            endforeach;
        endif;

        die(json_encode($diagnosa));
    }

    function get_poli_get()
    {
        if (!isset($_GET['q'])) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST);
        endif;

        $poli   = str_replace(' ', '+', safe_get('q'));
        $url    = $this->bpjs_config->server . "/referensi/poli/" . $poli;
        $header = $this->sep->createHeader($this->bpjs_config);
        $output = getCurl($url, $header);
        $decode = json_decode($output);

        $poli = array();

        if (isset($decode->response) && ($decode->response !== null)) :
            $temp = $decode->response->poli;
            foreach ($temp as $key => $value) :
                array_push($poli, array('id' => $value->kode, 'kode' => $value->kode, 'nama' => $value->nama));
            endforeach;
        endif;

        die(json_encode($poli));
    }

    function get_faskes_get()
    {
        if (!isset($_GET['q'])) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST);
        endif;

        $nama   = str_replace(' ', '+', safe_get('q'));
        $faskes = str_replace(' ', '+', safe_get('faskes'));
        $url    = $this->bpjs_config->server . "/referensi/faskes/" . $nama . "/" . $faskes;
        $header = $this->sep->createHeader($this->bpjs_config);
        $output = getCurl($url, $header);
        $decode = json_decode($output);

        $faskes = array();

        if (isset($decode->response) && ($decode->response !== null)) :
            $temp = $decode->response->faskes;
            foreach ($temp as $key => $value) :
                array_push($faskes, array('id' => $value->kode, 'kode' => $value->kode, 'nama' => $value->nama));
            endforeach;
        endif;

        die(json_encode($faskes));
    }

    function get_dokter_dpjp_get()
    {
        $jenis     = str_replace(' ', '+', safe_get('jenis')); // (1. Rawat Inap, 2. Rawat Jalan)
        $spesialis = str_replace(' ', '+', safe_get('spesialis'));
        $url       = $this->bpjs_config->server . "/referensi/dokter/pelayanan/" . $jenis . "/tglPelayanan/" . date("Y-m-d") . "/spesialis/" . $spesialis;
        $header    = $this->sep->createHeader($this->bpjs_config);
        $output    = getCurl($url, $header);
        $decode    = json_decode($output);

        $dokter = array();

        if (isset($decode->response) && ($decode->response !== null)) :
            $temp = $decode->response->list;
            foreach ($temp as $key => $value) :
                array_push($dokter, array('id' => $value->kode, 'kode' => $value->kode, 'nama' => $value->nama));
            endforeach;
        endif;

        die(json_encode($dokter));
    }

    function get_ruang_rawat_get()
    {
        $url    = $this->bpjs_config->server . "/referensi/ruangrawat/";
        $header = $this->sep->createHeader($this->bpjs_config);
        $output = getCurl($url, $header);
        die($output);
    }

    function get_spesialistik_get()
    {
        $url    = $this->bpjs_config->server . "/referensi/spesialistik/";
        $header = $this->sep->createHeader($this->bpjs_config);
        $output = getCurl($url, $header);
        die($output);
    }

    function get_kelas_rawat_get()
    {
        $url    = $this->bpjs_config->server . "/referensi/kelasrawat/";
        $header = $this->sep->createHeader($this->bpjs_config);
        $output = getCurl($url, $header);
        die($output);
    }

    function get_cara_keluar_get()
    {
        $url    = $this->bpjs_config->server . "/referensi/carakeluar/";
        $header = $this->sep->createHeader($this->bpjs_config);
        $output = getCurl($url, $header);
        die($output);
    }

    function get_pasca_pulang_get()
    {
        $url    = $this->bpjs_config->server . "/referensi/pascapulang/";
        $header = $this->sep->createHeader($this->bpjs_config);
        $output = getCurl($url, $header);
        die($output);
    }

    function get_provinsi_get()
    {
        $url    = $this->bpjs_config->server . "/referensi/propinsi";
        $header = $this->sep->createHeader($this->bpjs_config);
        $output = getCurl($url, $header);
        $decode = json_decode($output);

        $provinsi = array();
        if (isset($decode->response) && ($decode->response !== null)) :
            $temp = $decode->response->list;
            foreach ($temp as $key => $value) :
                array_push($provinsi, array('id' => $value->kode, 'kode' => $value->kode, 'nama' => $value->nama));
            endforeach;
        endif;

        die(json_encode($provinsi));
    }

    function get_kabupaten_get()
    {
        $kd_provinsi = safe_get('kd_provinsi');

        $url    = $this->bpjs_config->server . "/referensi/kabupaten/propinsi/" . $kd_provinsi;
        $header = $this->sep->createHeader($this->bpjs_config);
        $output = getCurl($url, $header);
        $decode = json_decode($output);

        $kabupaten = array();
        if (isset($decode->response) && ($decode->response !== null)) :
            $temp = $decode->response->list;
            foreach ($temp as $key => $value) :
                array_push($kabupaten, array('id' => $value->kode, 'kode' => $value->kode, 'nama' => $value->nama));
            endforeach;
        endif;

        die(json_encode($kabupaten));
    }

    function get_kecamatan_get()
    {
        $kd_kabupaten = safe_get('kd_kabupaten');

        $url    = $this->bpjs_config->server . "/referensi/kecamatan/kabupaten/" . $kd_kabupaten;
        $header = $this->sep->createHeader($this->bpjs_config);
        $output = getCurl($url, $header);
        $decode = json_decode($output);

        $kecamatan = array();
        if (isset($decode->response) && ($decode->response !== null)) :
            $temp = $decode->response->list;
            foreach ($temp as $key => $value) :
                array_push($kecamatan, array('id' => $value->kode, 'kode' => $value->kode, 'nama' => $value->nama));
            endforeach;
        endif;

        die(json_encode($kecamatan));
    }

    // Deprecated
    function get_history_sep_get()
    {
        $nokartu  = $this->get('nokartu');
        $tglAwal = "2019-01-01";
        $tglAkhir = date('Y-m-d'); //safe_get('akhir');

        $url    = $this->bpjs_config->server . "/monitoring/HistoriPelayanan/NoKartu/" . $nokartu . "/tglAwal/" . $tglAwal . "/tglAkhir/" . $tglAkhir;
        $header = $this->sep->createHeader($this->bpjs_config);
        $output = getCurl($url, $header);

        die($output);
    }

    function pembuatan_no_sep_post()
    {
        $url        = $this->bpjs_config->server . "/SEP/1.1/insert";
        $no_rm      = (safe_post('no_rm') != '') ? safe_post('no_rm') : NULL;
        $id_layanan = safe_post('id_layanan_pendaftaran');
        $no_rujukan = safe_post('no_rujukan');

        $tanggal_sep = $this->datetime;
        if (safe_post('tanggal_sep') !== '') :
            $tanggal_sep = date2mysql(safe_post('tanggal_sep')) . " " . date('H:i:s');
        else :
            $tanggal_sep = $this->datetime;
        endif;

        $jaminan = '';
        if (is_array($this->input->post('jaminan', true)) && count($this->input->post('jaminan', true)) > 0) :
            $jaminan = join(',', $this->input->post('jaminan', true));
        endif;

        $poli_vip = '';
        if (safe_post('kode_poli') !== '') :
            $poli_vip = safe_post('klinik_eksekutif');
        endif;

        $request = [
            "request" => [
                "t_sep" => [
                    "noKartu"                     => safe_post("no_kartu"),
                    "tglSep"                      => $tanggal_sep,
                    "ppkPelayanan"                => $this->bpjs_config->no_ppk,
                    "jnsPelayanan"                => safe_post("jenis_pelayanan"),
                    "klsRawat"                    => safe_post("kelas"),
                    "noMR"                        => $no_rm,
                    "rujukan"                     => array(
                        "asalRujukan"             => safe_post("asal_rujukan"),
                        "tglRujukan"              => date2mysql(safe_post("tanggal_rujukan")) . " " . date("H: i: s"),
                        "noRujukan"               => $no_rujukan,
                        "ppkRujukan"              => safe_post("ppk_rujukan")
                    ),
                    "catatan"                     => safe_post("catatan"),
                    "diagAwal"                    => safe_post("diag_awal"),
                    "poli"                        => array(
                        "tujuan"                  => safe_post("kode_poli"),
                        "eksekutif"               => $poli_vip
                    ),
                    "cob"                         => array(
                        "cob"                     => safe_post('cob'),
                    ),
                    "katarak"                     => array(
                        "katarak"                 => safe_post('katarak'),
                    ),
                    "jaminan"                     => array(
                        "lakaLantas"              => safe_post("laka_lantas"),
                        "penjamin"                => array(
                            "penjamin"            => $jaminan,
                            "tglKejadian"         => date2mysql(safe_post("tanggal_kejadian")),
                            "keterangan"          => safe_post("keterangan_kll"),
                            "suplesi"             => array(
                                "suplesi"         => safe_post("suplesi"),
                                "noSepSuplesi"    => safe_post("no_sep_suplesi"),
                                "lokasiLaka"      => array(
                                    "kdPropinsi"  => safe_post("kd_provinsi"),
                                    "kdKabupaten" => safe_post("kd_kabupaten"),
                                    "kdKecamatan" => safe_post("kd_kecamatan")
                                )
                            )
                        )
                    ),
                    "skdp"                        => array(
                        "noSurat"                 => safe_post("no_skdp"),
                        "kodeDPJP"                => safe_post("dokter_dpjp")
                    ),
                    "noTelp"                      => safe_post("no_telp_pasien"),
                    "user"                        => $this->session->userdata("account")
                ]
            ]
        ];

        // echo json_encode($request); die;

        $header     = $this->sep->createHeader($this->bpjs_config);
        $header[3]  = 'Content-type: application/www-x-form-urlencoded';
        $output     = postCurl($url, json_encode($request), $header);
        $outputJSON = json_decode($output);

        $nosep = null;
        if (isset($outputJSON->response)) :
            if ($outputJSON->response->sep !== NULL) :
                $nosep = strtoupper($outputJSON->response->sep->noSep);
                if (($outputJSON->metaData->code === "200") & ($nosep != null)) :
                    $insert_history = [
                        'no_sep'      => $nosep,
                        'no_rm'       => $no_rm,
                        'tanggal_sep' => $this->datetime
                    ];
    
                    $this->db->insert('sm_history_sep', $insert_history);
    
                    if ($id_layanan != '') :
                        $this->db->trans_begin();
    
                        $update_lp = array(
                            'no_sep'       => $nosep,
                            'id_users_sep' => $this->session->userdata('id_translucent')
                        );
    
                        $this->db->where('id', $id_layanan)->update('sm_layanan_pendaftaran', $update_lp);
    
                        // Update sm_rujukan
                        $cek_rujukan = $this->db->where('no_rujukan', $no_rujukan)->get('sm_rujukan')->row();
                        $id_rujukan  = 0;
                        if ($cek_rujukan) :
                            // Update rujukan
                            $used = '1';
                            if ($cek_rujukan->jenis === 'resume_inap') :
                                $used = (int)$cek_rujukan->used + 1;
                            else :
                                $used = '1';
                            endif;
    
                            $update = ['used' => $used];
                            $this->db->where('no_rujukan', $no_rujukan)->update('sm_rujukan', $update);
                            $id_rujukan = $cek_rujukan->id;
                        else :
                            // Start tambahan wahyu
                            $this->load->model('vclaim_bpjs/Vclaim_v2_model', 'm_vclaim');
                            $dataRujukan = $this->m_vclaim->get_rujukan_rs($no_rujukan);

                            $lp = $this->db->select('lp.id_pendaftaran')->from('sm_layanan_pendaftaran as lp')->where('lp.id', $id_layanan)->get()->row();
                            $kodePerujuk = $dataRujukan->response->rujukan->provPerujuk->kode ?? NULL;
                            $namaPerujuk = $dataRujukan->response->rujukan->provPerujuk->nama ?? NULL;
                            // End

                            // Insert rujukan
                            $insert = [
                                'tanggal_terbit' => date('Y-m-d'),
                                'id_pasien' => $no_rm,
                                'no_rujukan' => $no_rujukan,
                                'jenis' => 'asli',
                                // Start tambahan Wahyu
                                'id_pendaftaran' => $lp->id_pendaftaran,
                                'kode_perujuk' => $kodePerujuk ?? NULL,
                                'nama_perujuk' => $namaPerujuk ?? NULL
                                // End
                            ];
    
                            $this->db->insert('sm_rujukan', $insert);
                            $id_rujukan = $this->db->insert_id();
                        endif;
    
                        // Insert mapping transaksi
                        $lp = $this->db->select('lp.id_pendaftaran')->from('sm_layanan_pendaftaran as lp')->where('lp.id', $id_layanan)->get()->row();
                        if ($lp) :
                            $update_pendaftaran = [
                                'no_sep' => $nosep,
                                'id_rujukan' => $id_rujukan
                            ];
    
                            $this->db->where('id', $lp->id_pendaftaran)->update('sm_pendaftaran', $update_pendaftaran);
                        endif;
    
                        if ($this->db->trans_status() === FALSE) :
                            $this->db->trans_rollback();
                        else :
                            $this->db->trans_commit();
                        endif;
                    endif;
                endif;
            endif;
        endif;

        $this->response(array($outputJSON, 'token' => $this->security->get_csrf_hash()));
    }

    function get_detail_sep_get()
    {
        if (!$this->get("no_sep")) {
            $this->response(NULL, 400);
        }
        $url = $this->bpjs_config->server . "/SEP/";
        $no_sep = $this->get("no_sep");
        $header = $this->sep->createHeader($this->bpjs_config);
        $output = getCurl($url . $no_sep, $header);
        exit($output);
    }

    // HAPUS SEP
    function hapus_sep_delete()
    {
        if (!$this->get("no_sep") & (!$this->get("id_pendaftaran"))) {
            $this->response(NULL, 400);
        }

        $no_sep = $this->get('no_sep');
        $id_pendaftaran = $this->get('id_pendaftaran');
        $url = $this->bpjs_config->server . "/SEP/Delete";

        $request = [
            "request" => [
                "t_sep" => [
                    "noSep" => $no_sep,
                    "user" => $this->session->userdata("account")
                ]
            ]
        ];
        
        $header     = $this->sep->createHeader($this->bpjs_config);
        $header[3]  = 'Content-type: application/www-x-form-urlencoded';
        $output     = customCurl('DELETE', $url, json_encode($request), $header);
        $outputJSON = json_decode($output);

        if (isset($outputJSON->response)) :
            if ($outputJSON->metaData->code === "200") :
                // Hapus History SEP
                $this->db->where('no_sep', $outputJSON->response)->delete('sm_history_sep');
                $this->db->where('no_sep', $outputJSON->response)->update('sm_layanan_pendaftaran', array('no_sep' => NULL, 'id_users_sep' => NULL));

                $this->db->where('no_sep', $outputJSON->response)->update('sm_pendaftaran', array('no_sep' => NULL));
                $data = $this->db->select('id_pasien')->get_where('sm_pendaftaran', ['id' => $id_pendaftaran])->row();
                $this->db->where('id_pasien', $data->id_pasien)->delete('sm_rujukan');
            endif;
        endif;

        $this->response(array($outputJSON));
    }

    // UPDATE TANGGAL PULANG SEP
    function update_tgl_pulang_sep_put()
    {
        $no_sep = $this->put('no_sep', true);
        $user = $this->session->userdata("account");
        if (isset($_POST['user'])) :
            $user = safe_post('user');
        endif;
        $url = $this->bpjs_config->server . "/Sep/updtglplg";
        $request = [
            "request" => [
                "t_sep" => [
                    "noSep" => $no_sep,
                    "tglPulang" => date2mysql($this->put("tanggal_pulang", true)),
                    "user" => $user
                ]
            ]
        ];

        $header     = $this->sep->createHeader($this->bpjs_config);
        $header[3]  = 'Content-type: application/www-x-form-urlencoded';
        $output     = customCurl('PUT', $url, json_encode($request), $header);
        $outputJSON = json_decode($output);

        if (isset($outputJSON->response)) :
            if ($outputJSON->metaData->code === "200") :
                // Hapus History SEP
                $this->db->where('no_sep', $outputJSON->response)->update('sm_history_sep', ['update_tanggal_pulang' => $this->put('tanggal_pulang') . ' ' .date('H:i:s')]);
            endif;
        endif;

        $this->response(array($outputJSON));
    }
    
    // GET RUJUKAN
    function get_rujukan_get()
    {
        if (!$this->get("norujukan")) {
            $this->response(NULL, 400);
        }
        $url = $this->bpjs_config->server . "/Rujukan/";
        $no_kartu = $this->get("norujukan");
        $header = $this->sep->createHeader($this->bpjs_config);
        $output = getCurl($url . $no_kartu, $header);
        exit($output);
    }

    function get_rujukan_by_pcare_get()
    {
        if (!$this->get("nokartu")) {
            $this->response(NULL, 400);
        }
        $url = $this->bpjs_config->server . "/Rujukan/Peserta/";
        $no_kartu = $this->get("nokartu");
        $header = $this->sep->createHeader($this->bpjs_config);
        $output = getCurl($url . $no_kartu, $header);
        exit($output);
    }

    function list_rujukan_by_pcare_get()
    {
        if (!$this->get("nokartu")) {
            $this->response(NULL, 400);
        }
        $url = $this->bpjs_config->server . "/Rujukan/List/Peserta/";
        $no_kartu = $this->get("nokartu");
        $header = $this->sep->createHeader($this->bpjs_config);
        $output = getCurl($url . $no_kartu, $header);
        exit($output);
    }

    function get_rujukan_by_rs_get()
    {
        if (!$this->get("nokartu")) {
            $this->response(NULL, 400);
        }
        $url = $this->bpjs_config->server . "/Rujukan/RS/Peserta/";
        $no_kartu = $this->get("nokartu");
        $header = $this->sep->createHeader($this->bpjs_config);
        $output = getCurl($url . $no_kartu, $header);
        exit($output);
    }


    // LOG CETAK SEP
    function log_cetak_sep_post()
    {
        if (safe_post('no_sep') === '') :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST);
        endif;

        $no_sep = safe_post('no_sep');
        
        $this->load->model('General_model', 'general');
        $param['table'] = 'sm_history_sep';
        $param['where']['no_sep'] = $no_sep;
        $cetakan = $this->general->getData($param)->row_array();
        if (!empty($cetakan['no_sep'])) :
            $n = $cetakan['cetakan'] + 1;
            $params['table'] = 'sm_history_sep';
            $params['data']['cetakan'] = $n;
            $params['where']['no_sep'] = $no_sep;
            $update = $this->general->updateData($params);

            $this->response(array('status' => true, 'cetakan' => $n, 'token' => $this->security->get_csrf_hash()), REST_Controller::HTTP_OK);
        else :
            $this->response(array('status' => false, 'token' => $this->security->get_csrf_hash()), REST_Controller::HTTP_OK);
        endif;
    }

    // EDIT NO POLISH
    function update_no_polish_put()
    {
        $id_layanan_pendaftaran = $this->put("id_layanan_pendaftaran", true);
        $nopolish = $this->put("nopolish", true);
        if ($id_layanan_pendaftaran === "" & $nopolish === "") :
            $message = array("status" => false);
        else :
            $this->db->trans_begin();
            $update = array("no_polish" => $nopolish);
            $this->db->where("id", $id_layanan_pendaftaran)->update("sm_layanan_pendaftaran", $update);
            $id = $this->db->select("id_pendaftaran")->where("id", $id_layanan_pendaftaran)->get("sm_layanan_pendaftaran")->row()->id_pendaftaran;
            $this->db->where("id", $id)->update("sm_pendaftaran", array("no_polish" => $nopolish));
            if ($this->db->trans_status() === false) :
                $this->db->trans_rollback();
                $status = false;
            else :
                $this->db->trans_commit();
                $status = true;
            endif;
            $message = array("status" => $status);
        endif;
        $message["nopolish"] = $nopolish;
        $this->response($message, REST_Controller::HTTP_OK);
    }

    // EDIT NO SEP
    function update_no_sep_put()
    {
        $id_layanan_pendaftaran = $this->put("id_layanan_pendaftaran", true);
        $no_sep = $this->put("no_sep", true);
        if ($id_layanan_pendaftaran === "" & $no_sep === "") :
            $message = array("status" => false);
        else :
            $this->db->trans_begin();
            $update = array("no_sep" => $no_sep);
            $this->db->where("id", $id_layanan_pendaftaran)->update("sm_layanan_pendaftaran", $update);
            $id = $this->db->select("id_pendaftaran")->where("id", $id_layanan_pendaftaran)->get("sm_layanan_pendaftaran")->row()->id_pendaftaran;
            $this->db->where("id", $id)->update("sm_pendaftaran", array("no_sep" => $no_sep));
            if ($this->db->trans_status() === false) :
                $this->db->trans_rollback();
                $status = false;
            else :
                $this->db->trans_commit();
                $status = true;
            endif;
            $message = array("status" => $status);
        endif;
        $message["no_sep"] = $no_sep;
        $this->response($message, REST_Controller::HTTP_OK);
    }

    // RUJUKAN
    public function update_rujukan_post()
    {
        $tipe            = safe_post("tipe");
        $no_sep          = safe_post("no_sep");
        $no_rujukan      = safe_post("no_rujukan");
        $tglrujuk        = date2mysql(safe_post("tanggal_dirujuk"));
        $ppk_rujukan     = safe_post("ppk_rujukan");
        $jenis_pelayanan = safe_post("jenis_pelayanan");
        $tipe_rujukan    = safe_post("tipe_rujukan");
        $poli            = safe_post("poli");
        $diagnosa        = safe_post("diagnosa");
        $catatan         = safe_post("catatan");
        if ($tipe === "create") :
            $url = $this->bpjs_config->server . "/Rujukan/insert";
            $req = array(
                "request"              => array(
                    "t_rujukan"        => array(
                        "noSep"        => $no_sep, 
                        "tglRujukan"   => $tglrujuk, 
                        "ppkDirujuk"   => $ppk_rujukan, 
                        "jnsPelayanan" => $jenis_pelayanan, 
                        "catatan"      => $catatan, 
                        "diagRujukan"  => $diagnosa, 
                        "tipeRujukan"  => $tipe_rujukan, 
                        "poliRujukan"  => $poli, 
                        "user"         => $this->session->userdata("user")
                    )
                )
            );
        else :
            $url = $this->bpjs_config->server . "/Rujukan/update";
            $req = array(
                "request"              => array(
                    "t_rujukan"        => array(
                        "noRujukan"    => $no_rujukan, 
                        "ppkDirujuk"   => $ppk_rujukan, 
                        "tipe"         => $tipe_rujukan, 
                        "jnsPelayanan" => $jenis_pelayanan, 
                        "catatan"      => $catatan, 
                        "diagRujukan"  => $diagnosa, 
                        "tipeRujukan"  => $tipe_rujukan, 
                        "poliRujukan"  => $poli, 
                        "user"         => $this->session->userdata("user")
                    )
                )
            );
        endif;

        $header = $this->sep->createHeader($this->bpjs_config);
        $header[3] = "Content-type: application/www-x-form-urlencoded";
        if ($tipe === "create") {
            $output = postCurl($url, json_encode($req), $header);
        } else {
            $output = customCurl("PUT", $url, json_encode($req), $header);
        }
        $outputJson = json_decode($output);
        if ($tipe === "create" && isset($outputJson->response) && $outputJson->metaData->code === "200") {
            $update_lp = array("no_rujukan" => $outputJson->response->rujukan->noRujukan);
            $this->db->where("no_sep", $no_sep)->update("sm_layanan_pendaftaran", $update_lp);
        }
        exit($output);
    }

    function hapus_rujukan_delete()
    {
        $no_rujukan = safe_post("no_rujukan");
        
        $url = $this->bpjs_config->server . "/Rujukan/delete";
        $header = $this->sep->createHeader($this->bpjs_config);
        $req = array("request" => array("t_rujukan" => array("noRujukan" => $no_rujukan, "user" => $this->session->userdata("user"))));

        $header[3] = "Content-type: application/www-x-form-urlencoded";
        $output = customCurl("DELETE", $url, json_encode($req), $header);
        $outputJson = json_decode($output);
        $message = "";
        
        if ($outputJson->metaData->code === "200") :
            $message = "Berhasil menghapus rujukan dari database BPJS";

            $this->db->trans_begin();
            $lp = $this->db->select(array("id"))->where("no_rujukan", $no_rujukan)->get("sm_layanan_pendaftaran")->row();
            if (0 < sizeof($lp)) :
                $update = array("no_rujukan" => NULL);
                $this->db->where("id", $lp->id)->update("sm_layanan_pendaftaran", $update);
            endif;

            if ($this->db->trans_status() === false) :
                $this->db->trans_rollback();
                $message .= " dan gagal menghapus rujukan dari rumah sakit";
            else :
                $this->db->trans_commit();
                $message .= " dan berhasil menghapus rujukan dari rumah sakit";
            endif;

            $status = true;
        else :
            $status = false;
            $message .= " dan berhasil menghapus rujukan dari rumah sakit";
        endif;

        $response = array("status" => $status, "message" => $message);
        exit(json_encode($response));
    }

    
}
