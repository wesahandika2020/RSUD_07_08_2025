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
class Vclaim_bpjs_v2_tester extends REST_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->limit = 20;
        $this->date = date('Y-m-d');
        $this->datetime = date('Y-m-d H:i:s');
        $this->load->model('Sep_v2_model_tester', 'm_sep_v2');
        $this->load->model('App_model', 'm_default');
        $this->bpjs_config = $this->default->getConfigBPJSV2();
    }

    function get_peserta_get()
    {
        if (!$this->get('nokartu', true)) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST);
        endif;
        $no_kartu = $this->get('nokartu', true);
        $url = $this->bpjs_config->server . "/Peserta/nokartu/" . $no_kartu . "/tglSEP/" . date("Y-m-d");
        $header = $this->m_sep_v2->createHeader($this->bpjs_config);
        $output = getCurl($url, $header);
        $decode = json_decode($output);
		$decode->response = $this->m_sep_v2->decryptResponse($decode->response);

        if (isset($decode->response) && $decode->metaData->code === "200") :
            $jenis_peserta = $decode->response->peserta->jenisPeserta->keterangan;
            $this->m_sep_v2->updateKepesertaanBPJS($no_kartu, $jenis_peserta);
        endif;
        
		$this->response($decode, REST_Controller::HTTP_OK);
    }

    function get_peserta_by_nik_get()
    {
        if (!$this->get('nik', true)) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST);
        endif;
        $nik    = $this->get('nik', true);
        $url    = $this->bpjs_config->server . "/Peserta/nik/" . $nik . "/tglSEP/" . date("Y-m-d");
        $header = $this->m_sep_v2->createHeader($this->bpjs_config);
        $output = getCurl($url, $header);
        $decode = json_decode($output);
		$decode->response = $this->m_sep_v2->decryptResponse($decode->response);

        if (isset($decode->response) && $decode->metaData->code === "200") :
            $jenis_peserta = $decode->response->peserta->jenisPeserta->keterangan;
            $this->m_sep_v2->updateKepesertaanBPJS($nik, $jenis_peserta);
        endif;

        $this->response($decode, REST_Controller::HTTP_OK);
    }

    function get_diagnosa_get()
    {
        if (!isset($_GET['q'])) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST);
        endif;
        $icdx   = str_replace(' ', '+', safe_get('q'));
        $url    = $this->bpjs_config->server . "/referensi/diagnosa/" . $icdx;
        $header = $this->m_sep_v2->createHeader($this->bpjs_config);
        $output = getCurl($url, $header);
        $decode = json_decode($output);
		$decode->response = $this->m_sep_v2->decryptResponse($decode->response);

        $diagnosa = array();
        if (isset($decode->response) && ($decode->response !== null)) :
            $temp = $decode->response->diagnosa;
            foreach ($temp as $key => $value) :
                array_push($diagnosa, array('id' => $value->kode, 'kode' => $value->kode, 'nama' => $value->nama));
            endforeach;
        endif;

        $this->response($diagnosa, REST_Controller::HTTP_OK);
    }

    function get_poli_get()
    {
        if (!isset($_GET['q'])) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST);
        endif;
        $poli   = str_replace(' ', '+', safe_get('q'));
        $url    = $this->bpjs_config->server . "/referensi/poli/" . $poli;
        $header = $this->m_sep_v2->createHeader($this->bpjs_config);
        $output = getCurl($url, $header);
        $decode = json_decode($output);
		$decode->response = $this->m_sep_v2->decryptResponse($decode->response);

        $poli = array();
        if (isset($decode->response) && ($decode->response !== null)) :
            $temp = $decode->response->poli;
            foreach ($temp as $key => $value) :
                array_push($poli, array('id' => $value->kode, 'kode' => $value->kode, 'nama' => $value->nama));
            endforeach;
        endif;

        $this->response($poli, REST_Controller::HTTP_OK);
    }

    function get_faskes_get()
    {
        if (!isset($_GET['q'])) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST);
        endif;
        $nama   = str_replace(' ', '+', safe_get('q'));
        $faskes = str_replace(' ', '+', safe_get('faskes'));
        $url    = $this->bpjs_config->server . "/referensi/faskes/" . $nama . "/" . $faskes;
        $header = $this->m_sep_v2->createHeader($this->bpjs_config);
        $output = getCurl($url, $header);
        $decode = json_decode($output);
		$decode->response = $this->m_sep_v2->decryptResponse($decode->response);

        $faskes = array();
        if (isset($decode->response) && ($decode->response !== null)) :
            $temp = $decode->response->faskes;
            foreach ($temp as $key => $value) :
                array_push($faskes, array('id' => $value->kode, 'kode' => $value->kode, 'nama' => $value->nama));
            endforeach;
        endif;

        $this->response($faskes, REST_Controller::HTTP_OK);
    }

    function get_dokter_dpjp_get()
    {
        $jenis     = str_replace(' ', '+', safe_get('jenis')); // (1. Rawat Inap, 2. Rawat Jalan)
        $spesialis = str_replace(' ', '+', safe_get('spesialis'));
        $url       = $this->bpjs_config->server . "/referensi/dokter/pelayanan/" . $jenis . "/tglPelayanan/" . date("Y-m-d") . "/spesialis/" . $spesialis;
        $header    = $this->m_sep_v2->createHeader($this->bpjs_config);
        $output    = getCurl($url, $header);
        $decode    = json_decode($output);
		$decode->response = $this->m_sep_v2->decryptResponse($decode->response);
        
        $dokter = array();
        if (isset($decode->response) && ($decode->response !== null)) :
            $temp = $decode->response->list;
            foreach ($temp as $key => $value) :
                array_push($dokter, array('id' => $value->kode, 'kode' => $value->kode, 'nama' => $value->nama));
            endforeach;
        endif;

        $this->response($dokter, REST_Controller::HTTP_OK);
    }

    function get_ruang_rawat_get()
    {
        $url    = $this->bpjs_config->server . "/referensi/ruangrawat";
        $header = $this->m_sep_v2->createHeader($this->bpjs_config);
        $output = getCurl($url, $header);
		$decode = json_decode($output);
		$decode->response = $this->m_sep_v2->decryptResponse($decode->response);

        $this->response($decode, REST_Controller::HTTP_OK);
    }

    function get_spesialistik_get()
    {
        $url    = $this->bpjs_config->server . "/referensi/spesialistik";
        $header = $this->m_sep_v2->createHeader($this->bpjs_config);
        $output = getCurl($url, $header);
		$decode = json_decode($output);
		$decode->response = $this->m_sep_v2->decryptResponse($decode->response);

        $this->response($decode, REST_Controller::HTTP_OK);
    }

    function get_kelas_rawat_get()
    {
        $url    = $this->bpjs_config->server . "/referensi/kelasrawat";
        $header = $this->m_sep_v2->createHeader($this->bpjs_config);
        $output = getCurl($url, $header);
		$decode = json_decode($output);
		$decode->response = $this->m_sep_v2->decryptResponse($decode->response);

        $this->response($decode, REST_Controller::HTTP_OK);
    }

    function get_cara_keluar_get()
    {
        $url    = $this->bpjs_config->server . "/referensi/carakeluar";
        $header = $this->m_sep_v2->createHeader($this->bpjs_config);
        $output = getCurl($url, $header);
		$decode = json_decode($output);
		$decode->response = $this->m_sep_v2->decryptResponse($decode->response);

		$this->response($decode, REST_Controller::HTTP_OK);
    }

    function get_pasca_pulang_get()
    {
        $url    = $this->bpjs_config->server . "/referensi/pascapulang";
        $header = $this->m_sep_v2->createHeader($this->bpjs_config);
        $output = getCurl($url, $header);
		$decode = json_decode($output);
		$decode->response = $this->m_sep_v2->decryptResponse($decode->response);

        $this->response($decode, REST_Controller::HTTP_OK);
    }

    function get_provinsi_get()
    {
        $url    = $this->bpjs_config->server . "/referensi/propinsi";
        $header = $this->m_sep_v2->createHeader($this->bpjs_config);
        $output = getCurl($url, $header);
        $decode = json_decode($output);
		$decode->response = $this->m_sep_v2->decryptResponse($decode->response);

        $provinsi = array();
        if (isset($decode->response) && ($decode->response !== null)) :
            $temp = $decode->response->list;
            foreach ($temp as $key => $value) :
                array_push($provinsi, array('id' => $value->kode, 'kode' => $value->kode, 'nama' => $value->nama));
            endforeach;
        endif;

        $this->response($provinsi, REST_Controller::HTTP_OK);
    }

    function get_kabupaten_get()
    {
        $kd_provinsi = safe_get('kd_provinsi');

        $url    = $this->bpjs_config->server . "/referensi/kabupaten/propinsi/" . $kd_provinsi;
        $header = $this->m_sep_v2->createHeader($this->bpjs_config);
        $output = getCurl($url, $header);
        $decode = json_decode($output);
		$decode->response = $this->m_sep_v2->decryptResponse($decode->response);

        $kabupaten = array();
        if (isset($decode->response) && ($decode->response !== null)) :
            $temp = $decode->response->list;
            foreach ($temp as $key => $value) :
                array_push($kabupaten, array('id' => $value->kode, 'kode' => $value->kode, 'nama' => $value->nama));
            endforeach;
        endif;

        $this->response($kabupaten, REST_Controller::HTTP_OK);
    }

    function get_kecamatan_get()
    {
        $kd_kabupaten = safe_get('kd_kabupaten');

        $url    = $this->bpjs_config->server . "/referensi/kecamatan/kabupaten/" . $kd_kabupaten;
        $header = $this->m_sep_v2->createHeader($this->bpjs_config);
        $output = getCurl($url, $header);
        $decode = json_decode($output);
		$decode->response = $this->m_sep_v2->decryptResponse($decode->response);

        $kecamatan = array();
        if (isset($decode->response) && ($decode->response !== null)) :
            $temp = $decode->response->list;
            foreach ($temp as $key => $value) :
                array_push($kecamatan, array('id' => $value->kode, 'kode' => $value->kode, 'nama' => $value->nama));
            endforeach;
        endif;

        $this->response($kecamatan, REST_Controller::HTTP_OK);
    }

    function get_history_sep_get()
    {
        $nokartu  = $this->get('nokartu');
        $tglAwal  = "2017-01-01";
        $tglAkhir = date('Y-m-d'); //safe_get('akhir');

        $url    = $this->bpjs_config->server . "/monitoring/HistoriPelayanan/NoKartu/" . $nokartu . "/tglAwal/" . $tglAwal . "/tglAkhir/" . $tglAkhir;
        $header = $this->m_sep_v2->createHeader($this->bpjs_config);
        $output = getCurl($url, $header);
		$decode = json_decode($output);
		$decode->response = $this->m_sep_v2->decryptResponse($decode->response);

        $this->response($decode, REST_Controller::HTTP_OK);
    }

    function create_no_sep_post()
    {
        $url        = $this->bpjs_config->server . "/SEP/2.0/insert";
        $no_rm      = (safe_post('no_rm') != '') ? safe_post('no_rm') : NULL;
        $id_layanan = safe_post('id_layanan_pendaftaran');
        $no_rujukan = safe_post('no_rujukan');

        $tanggal_sep = $this->date;
        if (safe_post('tanggal_sep') !== '') :
            // $tanggal_sep = date2mysql(safe_post('tanggal_sep')) . " " . date('H:i:s');
            $tanggal_sep = date2mysql(safe_post('tanggal_sep'));
        else :
            $tanggal_sep = $this->date;
        endif;

        $poli_vip = '';
        if (safe_post('kode_poli') !== '') :
            $poli_vip = isset($_POST['klinik_eksekutif']) ? safe_post('klinik_eksekutif') : 0;
        endif;

        $request = array(
            "request" => array(
                "t_sep" => array(
                    "noKartu" => safe_post("no_kartu"),
                    "tglSep" => $tanggal_sep,
                    "ppkPelayanan" => $this->bpjs_config->no_ppk,
                    "jnsPelayanan" => safe_post("jenis_pelayanan"),
                    "klsRawat" => array(
                        "klsRawatHak" => safe_post("kelas"),
                        "klsRawatNaik" => safe_post('kelas_rawat'),
                        "pembiayaan" => safe_post('pembiayaan'),
                        "penanggungJawab" => safe_post('penanggung_jawab'),
                    ),
                    "noMR" => $no_rm,
                    "rujukan" => array(
                        "asalRujukan" => safe_post("asal_rujukan"),
                        // "tglRujukan" => date2mysql(safe_post("tanggal_rujukan"))." ".date("H:i:s"),
                        "tglRujukan" => date2mysql(safe_post("tanggal_rujukan")),
                        "noRujukan" => $no_rujukan,
                        "ppkRujukan" => safe_post("ppk_rujukan")
                    ),
                    "catatan" => safe_post("catatan"),
                    "diagAwal" => safe_post("diag_awal"),
                    "poli" => array(
                        "tujuan" => safe_post("kode_poli"),
                        "eksekutif" => $poli_vip
                    ),
                    "cob" => array(
                        "cob" => isset($_POST['cob']) ? safe_post('cob') : 0,
                    ),
                    "katarak" => array(
                        "katarak" => isset($_POST['katarak']) ? safe_post('katarak') : 0,
                    ),
                    "jaminan" => array(
                        "lakaLantas" => safe_post("laka_lantas"),
                        "noLP" => safe_post("no_laporan_polisi"),
                        "penjamin" => array(
                            "tglKejadian" => date2mysql(safe_post("tanggal_kejadian")),
                            "keterangan" => safe_post("keterangan_kll"),
                            "suplesi" => array(
                                "suplesi" => safe_post("suplesi"),
                                "noSepSuplesi" => safe_post("no_sep_suplesi"),
                                "lokasiLaka" => array(
                                    "kdPropinsi" => safe_post("kd_provinsi"),
                                    "kdKabupaten" => safe_post("kd_kabupaten"),
                                    "kdKecamatan" => safe_post("kd_kecamatan")
                                )
                            )
                        )
                    ),
                    "tujuanKunj" => safe_post('tujuan_kunjungan'),
                    "flagProcedure" => safe_post('prosedur'),
                    "kdPenunjang" => safe_post('penunjang'),
                    "assesmentPel" => safe_post('assessment_pelayanan'),
                    "skdp" => array(
                        "noSurat" => safe_post("no_skdp"),
                        "kodeDPJP" => safe_post("dokter_dpjp")
                    ),
                    "dpjpLayan" => (safe_post('jenis_pelayanan') != 1 ? safe_post('dokter_dpjp') : ''),
                    "noTelp" => safe_post("no_telp_pasien"),
                    "user" => $this->session->userdata("account")
                )
            )
        );

        // var_dump($request); die;

        $header     = $this->m_sep_v2->createHeader($this->bpjs_config);
        $header[4]  = 'Content-type: application/x-www-form-urlencoded';
        $output     = postCurl($url, json_encode($request), $header);
        $decode     = json_decode($output);
		$decode->response = $this->m_sep_v2->decryptResponse($decode->response);

        $nosep = NULL;
        if ($decode->metaData->code == "200" && $decode->response !== NULL) :
            if ($decode->response->sep !== NULL) :
                $nosep = strtoupper($decode->response->sep->noSep);
                if ($nosep != NULL) :
                    $insert_history = [
                        'no_sep' => $nosep,
                        'no_rm' => $no_rm,
                        'tanggal_sep' => $this->datetime
                    ];
    
                    $this->db->insert('sm_history_sep', $insert_history);
    
                    if ($id_layanan != '') :
                        $this->db->trans_begin();
    
                        $update_lp = array(
                            'no_sep' => $nosep,
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
                            // Insert rujukan
                            $insert = [
                                'tanggal_terbit' => date('Y-m-d'),
                                'id_pasien' => $no_rm,
                                'no_rujukan' => $no_rujukan,
                                'jenis' => 'asli'
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

        $this->response(array($decode, 'token' => $this->security->get_csrf_hash()),  REST_Controller::HTTP_OK);
    }

    function get_detail_sep_get()
    {
        if (!$this->get("no_sep", true)) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST);
        endif;
        $url    = $this->bpjs_config->server . "/SEP/";
        $no_sep = $this->get("no_sep");
        $header = $this->m_sep_v2->createHeader($this->bpjs_config);
        $output = getCurl($url . $no_sep, $header);
		$decode = json_decode($output);
		$decode->response = $this->m_sep_v2->decryptResponse($decode->response);

        $this->response($decode, REST_Controller::HTTP_OK);
    }

    function update_sep_put()
    {
        $url   = $this->bpjs_config->server . "/SEP/2.0/update";
        $no_rm = ($this->put('no_rm', true) !== '') ? $this->put('no_rm', true) : NULL;
        
        $poli_vip = '';
        if ($this->put('kode_poli', true) !== '') :
            $poli_vip = $poli_vip = isset($this->put['klinik_eksekutif']) ? $this->put('klinik_eksekutif', true) : 0; 
        endif;

        $request = array(
            "request" => array(
                "t_sep" => array(
                    "noSep" => $this->put("no_sep", true),
                    "klsRawat" => array(
                        "klsRawatHak" => $this->put("kelas", true),
                        "klsRawatNaik" => "",
                        "pembiayaan" => "",
                        "penanggungJawab" => ""
                    ),
                    "noMR" => $no_rm,
                    "catatan" => $this->put("catatan", true),
                    "diagAwal" => $this->put("diag_awal", true),
                    "poli" => array(
                        "tujuan" => $this->put("kode_poli", true),
                        "eksekutif" => $poli_vip
                    ),
                    "cob" => array(
                        "cob" => isset($this->put['cob']) ? $this->put("cob", true) : 0,
                    ),
                    "katarak" => array(
                        "katarak" => isset($this->put['katarak']) ? $this->put("katarak", true) : 0,
                    ),
                    "jaminan" => array(
                        "lakaLantas" => $this->put("laka_lantas", true),
                        "penjamin" => array(
                            "tglKejadian" => $this->put("tanggal_kejadian", true) !== "" ? date2mysql($this->put("tanggal_kejadian", true)) : "",
                            "keterangan" => $this->put("keterangan_kll", true),
                            "suplesi" => array(
                                "suplesi" => $this->put("suplesi", true),
                                "noSepSuplesi" => $this->put("no_sep_suplesi", true),
                                "lokasiLaka" => array(
                                        "kdPropinsi" => $this->put("kd_provinsi", true),
                                        "kdKabupaten" => $this->put("kd_kabupaten", true),
                                        "kdKecamatan" => $this->put("kd_kecamatan", true)
                                )
                            )
                        )
                    ),
                    "dpjpLayan" => $this->put("dokter_dpjp", true),
                    "noTelp" => $this->put("no_telp_pasien", true),
                    "user" => $this->session->userdata("account")
                )     
            )
        );
        
        $header     = $this->m_sep_v2->createHeader($this->bpjs_config);
        $header[4]  = 'Content-type: application/x-www-form-urlencoded';
        $output     = customCurl('PUT', $url, json_encode($request), $header);
        $decode     = json_decode($output);
		$decode->response = $this->m_sep_v2->decryptResponse($decode->response);

        $this->response(array($decode, 'token' => $this->security->get_csrf_hash()),  REST_Controller::HTTP_OK);
    }

    function hapus_sep_delete()
    {
        if (!$this->delete("no_sep", true) & (!$this->delete("id_pendaftaran", true))) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST);
        endif;
        $no_sep = $this->delete('no_sep', true);
        $id_pendaftaran = $this->delete('id_pendaftaran', true);
        $url = $this->bpjs_config->server . "/SEP/2.0/delete";

        $request = [
            "request" => [
                "t_sep" => [
                    "noSep" => $no_sep,
                    "user" => $this->session->userdata("account"),
                ]
            ]
        ];
        
        $header     = $this->m_sep_v2->createHeader($this->bpjs_config);
        $header[4]  = 'Content-type: application/x-www-form-urlencoded';
        $output     = customCurl('DELETE', $url, json_encode($request), $header);
        $decode     = json_decode($output);

        if ($decode->metaData->code === "200") :
            if (isset($decode->response) && ($decode->response !== null)) :
                // Hapus History SEP
                $this->db->where('no_sep', $decode->response)->delete('sm_history_sep');
                $this->db->where('no_sep', $decode->response)->update('sm_layanan_pendaftaran', array('no_sep' => NULL, 'id_users_sep' => NULL));

                $this->db->where('no_sep', $decode->response)->update('sm_pendaftaran', array('no_sep' => NULL));
                $data = $this->db->select('id_pasien')->get_where('sm_pendaftaran', ['id' => $id_pendaftaran])->row();
                $this->db->where('id_pasien', $data->id_pasien)->delete('sm_rujukan');
            endif;
        endif;

        $this->response(array($decode), REST_Controller::HTTP_OK);
    }

    // UPDATE TANGGAL PULANG SEP
    function update_tgl_pulang_sep_put()
    {
        $no_sep = $this->put('no_sep', true);
        $status_pulang = $this->put('status_pulang', true);
        $no_surat_meninggal = $this->put('no_surat_meninggal', true);
        $tanggal_meninggal = $this->put('tanggal_meninggal', true);
        $tanggal_pulang = $this->put('tanggal_pulang', true);
        $no_lp_manual = $this->put('no_lp_manual', true);
        $user = $this->session->userdata("account");
        if (isset($_POST['user'])) :
            $user = safe_post('user');
        endif;
        $url = $this->bpjs_config->server . "/Sep/updtglplg";
        $request = [
            "request" => [
                "t_sep" => [
                    "noSep" => $no_sep,
                    "statusPulang" => $status_pulang,
                    "noSuratMeninggal" => ($no_surat_meninggal !== '' ? $no_surat_meninggal : ''),
                    "tglMeninggal" => ($tanggal_meninggal !== '' ? date2mysql($tanggal_pulang) : ''),
                    "tglPulang" => date2mysql($tanggal_pulang),
                    "noLPManual" => ($no_lp_manual !== '' ? $no_lp_manual : ''),
                    "user" => $user,
                ]
            ]
        ];

        $header     = $this->m_sep_v2->createHeader($this->bpjs_config);
        $header[4]  = 'Content-type: application/x-www-form-urlencoded';
        $output     = customCurl('PUT', $url, json_encode($request), $header);
        $decode = json_decode($output);
        $decode->response = $this->m_sep_v2->decryptResponse($decode->response);

        if ($decode->metaData->code === "200") :
            if (isset($decode->response) && ($decode->response !== null)) :
                // Hapus History SEP
                $this->db->where('no_sep', $decode->response)->update('sm_history_sep', [
                    'update_tanggal_pulang' => date2mysql($tanggal_pulang) . ' ' .date('H:i:s'),
                    'status_pulang' => $status_pulang,
                    'no_surat_meninggal' => ($no_surat_meninggal !== '' ? $no_surat_meninggal : ''),
                    'tanggal_meninggal' => ($tanggal_meninggal !== '' ? date2mysql($tanggal_pulang) : ''),
                    'no_lp_manual' => ($no_lp_manual !== '' ? $no_lp_manual : ''),
                ]);
            endif;
        endif;

        $this->response(array($decode), REST_Controller::HTTP_OK);
    }
    
    // GET RUJUKAN
    function get_rujukan_get()
    {
        if (!$this->get("norujukan")) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST);
        endif;
        $url = $this->bpjs_config->server . "/Rujukan/";
        $no_kartu = $this->get("norujukan");
        $header = $this->m_sep_v2->createHeader($this->bpjs_config);
        $output = getCurl($url . $no_kartu, $header);
        $decode = json_decode($output);
		$decode->response = $this->m_sep_v2->decryptResponse($decode->response);

        $this->response($decode, REST_Controller::HTTP_OK);
    }

    function get_rujukan_keluar_get()
    {
        if (!$this->get("norujukan")) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST);
        endif;
        $url = $this->bpjs_config->server . "/Rujukan/Keluar/";
        $no_kartu = $this->get("norujukan");
        $header = $this->m_sep_v2->createHeader($this->bpjs_config);
        $output = getCurl($url . $no_kartu, $header);
        $decode = json_decode($output);
		$decode->response = $this->m_sep_v2->decryptResponse($decode->response);

        $this->response($decode, REST_Controller::HTTP_OK);
    }

    function get_rujukan_by_pcare_get()
    {
        if (!$this->get("nokartu", true)) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST);
        endif;
        $url = $this->bpjs_config->server . "/Rujukan/Peserta/";
        $no_kartu = $this->get("nokartu");
        $header = $this->m_sep_v2->createHeader($this->bpjs_config);
        $output = getCurl($url . $no_kartu, $header);
		$decode = json_decode($output);
		$decode->response = $this->m_sep_v2->decryptResponse($decode->response);

        $this->response($decode, REST_Controller::HTTP_OK);
    }

    function list_rujukan_by_pcare_get()
    {
        if (!$this->get("nokartu", true)) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST);
        endif;
        $url = $this->bpjs_config->server . "/Rujukan/List/Peserta/";
        $no_kartu = $this->get("nokartu");
        $header = $this->m_sep_v2->createHeader($this->bpjs_config);
        $output = getCurl($url . $no_kartu, $header);
        $decode = json_decode($output);
		$decode->response = $this->m_sep_v2->decryptResponse($decode->response);

        $this->response($decode, REST_Controller::HTTP_OK);
    }

    function get_rujukan_by_rs_get()
    {
        if (!$this->get("nokartu")) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST);
        endif;
        $url = $this->bpjs_config->server . "/Rujukan/RS/Peserta/";
        $no_kartu = $this->get("nokartu");
        $header = $this->m_sep_v2->createHeader($this->bpjs_config);
        $output = getCurl($url . $no_kartu, $header);
        $decode = json_decode($output);
		$decode->response = $this->m_sep_v2->decryptResponse($decode->response);

        $this->response($decode, REST_Controller::HTTP_OK);
    }

    function list_rujukan_by_rs_get()
    {
        if (!$this->get("nokartu", true)) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST);
        endif;
        $url = $this->bpjs_config->server . "/Rujukan/RS/List/Peserta/";
        $no_kartu = $this->get("nokartu");
        $header = $this->m_sep_v2->createHeader($this->bpjs_config);
        $output = getCurl($url . $no_kartu, $header);
        $decode = json_decode($output);
		$decode->response = $this->m_sep_v2->decryptResponse($decode->response);

        $this->response($decode, REST_Controller::HTTP_OK);
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
            $update = array(
                "no_sep" => ($no_sep !== "" ? $no_sep : NULL),
                // "id_users_sep" => $this->session->userdata('id_translucent')
            );
            $this->db->where("id", $id_layanan_pendaftaran)->update("sm_layanan_pendaftaran", $update);
            $id = $this->db->select("id_pendaftaran")->where("id", $id_layanan_pendaftaran)->get("sm_layanan_pendaftaran")->row()->id_pendaftaran;
            $this->db->where("id", $id)->update("sm_pendaftaran", array("no_sep" => ($no_sep !== "" ? $no_sep : NULL)));
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
    function update_rujukan_post()
    {
        $tipe = safe_post("tipe");
        $no_sep = safe_post("no_sep");
        $no_rujukan = safe_post("no_rujukan");
        $tgl_rujuk = date2mysql(safe_post("tanggal_dirujuk"));
        $tgl_rencana_kunjungan = date2mysql(safe_post("tanggal_rencana_kunjungan"));
        $ppk_rujukan = safe_post("ppk_rujukan");
        $jenis_pelayanan = safe_post("jenis_pelayanan");
        $tipe_rujukan = safe_post("tipe_rujukan");
        $poli = safe_post("poli");
        $diagnosa = safe_post("diagnosa");
        $catatan = safe_post("catatan");
        if ($tipe === "create") :
            $url = $this->bpjs_config->server . "/Rujukan/2.0/insert";
            $req = array(
                "request" => array(
                    "t_rujukan" => array(
                        "noSep" => $no_sep, 
                        "tglRujukan" => $tgl_rujuk, 
                        "tglRencanaKunjungan" => $tgl_rencana_kunjungan,
                        "ppkDirujuk" => $ppk_rujukan,
                        "jnsPelayanan" => $jenis_pelayanan, 
                        "catatan" => $catatan, 
                        "diagRujukan" => $diagnosa,
                        "tipeRujukan" => $tipe_rujukan, 
                        "poliRujukan" => $poli, 
                        "user" => $this->session->userdata("account")
                    )
                )
            );
        else :
            $url = $this->bpjs_config->server . "/Rujukan/2.0/Update";
            $req = array(
                "request" => array(
                    "t_rujukan" => array(
                        "noRujukan" => $no_rujukan, 
                        "tglRujukan" => $tgl_rujuk, 
                        "tglRencanaKunjungan" => $tgl_rencana_kunjungan,
                        "ppkDirujuk" => $ppk_rujukan,
                        "jnsPelayanan" => $jenis_pelayanan, 
                        "catatan" => $catatan, 
                        "diagRujukan" => $diagnosa,
                        "tipeRujukan" => $tipe_rujukan, 
                        "poliRujukan" => $poli, 
                        "user" => $this->session->userdata("account")
                    )
                )
            );
        endif;

        $header = $this->m_sep_v2->createHeader($this->bpjs_config);
        $header[4] = "Content-type: application/x-www-form-urlencoded";
        if ($tipe === "create") :
            $output = postCurl($url, json_encode($req), $header);
        else :
            $output = customCurl("PUT", $url, json_encode($req), $header);
        endif;
        $decode = json_decode($output);
        $decode->response = $this->m_sep_v2->decryptResponse($decode->response);

        if ($tipe === "create" && isset($decode->response) && $decode->metaData->code === "200") :
            if ($decode->response !== NULL) :
                $update_lp = array("no_rujukan" => $decode->response->rujukan->noRujukan);
                $this->db->where("no_sep", $no_sep)->update("sm_layanan_pendaftaran", $update_lp);
            endif;
        endif;

        $this->response($decode, REST_Controller::HTTP_OK);
    }

    function hapus_rujukan_post()
    {
        $no_rujukan = safe_post("no_rujukan");
        
        $url = $this->bpjs_config->server . "/Rujukan/delete";
        $header = $this->m_sep_v2->createHeader($this->bpjs_config);
        $req = array(
            "request" => array(
                "t_rujukan" => array(
                    "noRujukan" => $no_rujukan, 
                    "user" => $this->session->userdata("account")
                )
            )
        );

        $header[4] = "Content-type: application/x-www-form-urlencoded";
        $output = customCurl("DELETE", $url, json_encode($req), $header);
        $decode = json_decode($output);
        $message = "";
        
        if ($decode->metaData->code === "200") :
            $message = "Berhasil menghapus rujukan dari database BPJS";

            $this->db->trans_begin();
            $lp = $this->db->select(array("id"))->where("no_rujukan", $no_rujukan)->get("sm_layanan_pendaftaran")->row();
            if (0 < count((array)$lp)) :
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
        $this->response($response, REST_Controller::HTTP_OK);
    }

    // monitoring
    function get_data_monitoring_kunjungan_get()
    {
        if (!$this->get('tanggal', true) && !$this->get('jenis_pelayanan', true)) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST);
        endif;
        $tanggal = date2mysql($this->get('tanggal', true));
        $jenis_pelayanan = $this->get('jenis_pelayanan', true);
        $url = $this->bpjs_config->server . "/Monitoring/Kunjungan/Tanggal/".$tanggal."/JnsPelayanan/".$jenis_pelayanan;
        $header = $this->m_sep_v2->createHeader($this->bpjs_config);
        $output = getCurl($url, $header);
        $decode = json_decode($output);
		$decode->response = $this->m_sep_v2->decryptResponse($decode->response);
        
		$this->response($decode, REST_Controller::HTTP_OK);
    }

    function get_data_monitoring_klaim_get()
    {
        if (!$this->get('tanggal', true) && !$this->get('jenis_pelayanan', true) && !$this->get('status_klaim', true)) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST);
        endif;
        $tanggal = date2mysql($this->get('tanggal', true));
        $jenis_pelayanan = $this->get('jenis_pelayanan', true);
        $status_klaim = $this->get('status_klaim', true);
        $url = $this->bpjs_config->server . "/Monitoring/Klaim/Tanggal/".$tanggal."/JnsPelayanan/".$jenis_pelayanan."/status/".$status_klaim;
        $header = $this->m_sep_v2->createHeader($this->bpjs_config);
        $output = getCurl($url, $header);
        $decode = json_decode($output);
		$decode->response = $this->m_sep_v2->decryptResponse($decode->response);

        if (isset($decode->response) && $decode->metaData->code === "200") :
            foreach ($decode->response->klaim as $i => $klaim) :
                $klaim->Inacbg = '<b>Kode : </b>'.$klaim->Inacbg->kode.'<br><b>Nama : </b>'.$klaim->Inacbg->nama;
                $klaim->biaya = '<b>Pengajuan : </b>'.rupiah($klaim->biaya->byPengajuan).'<br><b>Setujui : </b>'.rupiah($klaim->biaya->bySetujui).'<br><b>Tarif Gruper : </b>'.rupiah($klaim->biaya->byTarifGruper).'<br><b>Tarif RS : </b>'.rupiah($klaim->biaya->byTarifRS).'<br><b>Topup : </b>'.rupiah($klaim->biaya->byTopup);
                $klaim->peserta = '<b>Nama : </b>'.$klaim->peserta->nama.'<br><b>No. Kartu : </b>'.$klaim->peserta->noKartu.'<br><b>No. MR : </b>'.$klaim->peserta->noMR;
            endforeach;
        endif;
        
		$this->response($decode, REST_Controller::HTTP_OK);
    }

    function get_data_monitoring_histori_pelayanan_get()
    {
        if (!$this->get('tanggal_awal', true) && !$this->get('tanggal_akhir', true) && !$this->get('no_kartu', true)) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST);
        endif;
        $tanggal_awal = date2mysql($this->get('tanggal_awal', true));
        $tanggal_akhir = date2mysql($this->get('tanggal_akhir', true));
        $no_kartu = $this->get('no_kartu', true);
        $url = $this->bpjs_config->server . "/Monitoring/HistoriPelayanan/NoKartu/".$no_kartu."/tglMulai/".$tanggal_awal."/tglAkhir/".$tanggal_akhir;
        $header = $this->m_sep_v2->createHeader($this->bpjs_config);
        $output = getCurl($url, $header);
        $decode = json_decode($output);
		$decode->response = $this->m_sep_v2->decryptResponse($decode->response);
        
		$this->response($decode, REST_Controller::HTTP_OK);
    }

    function get_data_monitoring_klaim_jaminan_raharja_get()
    {
        if (!$this->get('tanggal_awal', true) && !$this->get('tanggal_akhir', true)) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST);
        endif;
        $tanggal_awal = date2mysql($this->get('tanggal_awal', true));
        $tanggal_akhir = date2mysql($this->get('tanggal_akhir', true));
        $url = $this->bpjs_config->server . "/Monitoring/JasaRaharja/tglMulai/".$tanggal_awal."/tglAkhir/".$tanggal_akhir;
        $header = $this->m_sep_v2->createHeader($this->bpjs_config);
        $output = getCurl($url, $header);
        $decode = json_decode($output);
		$decode->response = $this->m_sep_v2->decryptResponse($decode->response);

        if (isset($decode->response) && $decode->metaData->code === "200") :
            foreach ($decode->response->jaminan as $i => $jaminan) :
                $jaminan->sep->noKartu = $jaminan->sep->peserta->noKartu;
                $jaminan->sep->namaPeserta = $jaminan->sep->peserta->nama;
            endforeach;
        endif;

		$this->response($decode, REST_Controller::HTTP_OK);
    }
    // end monitoring

    // rencana kontrol 
    function get_data_rencana_kontrol_by_no_sep_get()
    {
        if (!$this->get('no_sep', true)) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST);
        endif;
        $no_sep = $this->get('no_sep', true);
        $url = $this->bpjs_config->server . "/RencanaKontrol/nosep/" . $no_sep;
        $header = $this->m_sep_v2->createHeader($this->bpjs_config);
        $output = getCurl($url, $header);
        $decode = json_decode($output);
		$decode->response = $this->m_sep_v2->decryptResponse($decode->response);
		$this->response($decode, REST_Controller::HTTP_OK);
    }

    function get_spesialistik_kontrol_get()
    {
        if (!$this->get('jenis_kontrol', true) && !$this->get('nomor', true) && !$this->get('tgl_rencana', true)) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST);
        endif;
        $jenis_kontrol = $this->get('jenis_kontrol', true);
        $nomor = $this->get('nomor', true);
        $tgl_kontrol = date2mysql($this->get('tgl_kontrol', true));
        $url = $this->bpjs_config->server . "/RencanaKontrol/ListSpesialistik/JnsKontrol/".$jenis_kontrol."/nomor/".$nomor."/TglRencanaKontrol/".$tgl_kontrol;
        $header = $this->m_sep_v2->createHeader($this->bpjs_config);
        $header[4]  = 'Content-type: application/x-www-form-urlencoded';
        $output = getCurl($url, $header);
        $decode = json_decode($output);
		$decode->response = $this->m_sep_v2->decryptResponse($decode->response);
		$this->response($decode, REST_Controller::HTTP_OK);
    }

    function get_dokter_kontrol_get()
    {
        if (!$this->get('jenis_kontrol', true) && !$this->get('nomor', true) && !$this->get('tgl_rencana', true)) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST);
        endif;
        $jenis_kontrol = $this->get('jenis_kontrol', true);
        $kode_poli = $this->get('kode_poli', true);
        $tgl_kontrol = date2mysql($this->get('tgl_kontrol', true));
        $url = $this->bpjs_config->server . "/RencanaKontrol/JadwalPraktekDokter/JnsKontrol/".$jenis_kontrol."/KdPoli/".$kode_poli."/TglRencanaKontrol/".$tgl_kontrol;
        $header = $this->m_sep_v2->createHeader($this->bpjs_config);
        $header[4]  = 'Content-type: application/x-www-form-urlencoded';
        $output = getCurl($url, $header);
        $decode = json_decode($output);
		$decode->response = $this->m_sep_v2->decryptResponse($decode->response);
		$this->response($decode, REST_Controller::HTTP_OK);
    }

    function update_surat_kontrol_post()
    {
        $tipe = safe_post("tipe");
        $jenis_pelayanan = safe_post("jenis_pelayanan");
        $tgl_rencana_kontrol = date2mysql(safe_post("tgl_rencana_kontrol"));
        $nomor = safe_post("nomor");
        $no_surat = safe_post("no_surat");
        $kode_poli = safe_post("kode_poli");
        $kode_dpjp = safe_post("kode_dpjp");

        if ($tipe === "create") :
            if ($jenis_pelayanan === "2") :
                $url = $this->bpjs_config->server."/RencanaKontrol/insert";
                $request = array(
                    "request" => array(
                        "noSEP" => $nomor,
                        "kodeDokter" => $kode_dpjp,
                        "poliKontrol" => $kode_poli,
                        "tglRencanaKontrol" => $tgl_rencana_kontrol,
                        "user" => $this->session->userdata("account")
                    )
                );
            elseif ($jenis_pelayanan === "1") :
                $url = $this->bpjs_config->server."/RencanaKontrol/InsertSPRI";
                $request = array(
                    "request" => array(
                        "noKartu" => $nomor,
                        "kodeDokter" => $kode_dpjp,
                        "poliKontrol" => $kode_poli,
                        "tglRencanaKontrol" => $tgl_rencana_kontrol,
                        "user" => $this->session->userdata("account")
                    )
                );
            endif;
        else :
            if ($jenis_pelayanan === "2") :
                $url = $this->bpjs_config->server."/RencanaKontrol/Update";
                $request = array(
                    "request" => array(
                        "noSuratKontrol" => $no_surat,
                        "noSEP" => $nomor,
                        "kodeDokter" => $kode_dpjp,
                        "poliKontrol" => $kode_poli,
                        "tglRencanaKontrol" => $tgl_rencana_kontrol,
                        "user" => $this->session->userdata("account"),
                    )
                );
            elseif ($jenis_pelayanan === "1") :
                $url = $this->bpjs_config->server."/RencanaKontrol/UpdateSPRI";
                $request = array(
                    "request" => array(
                        "noSPRI" => $no_surat,
                        "kodeDokter" => $kode_dpjp,
                        "poliKontrol" => $kode_poli,
                        "tglRencanaKontrol" => $tgl_rencana_kontrol,
                        "user" => $this->session->userdata("account"),
                    )
                );
            endif;
        endif;

        $header = $this->m_sep_v2->createHeader($this->bpjs_config);
        $header[4] = "Content-type: application/x-www-form-urlencoded";
        // var_dump($header); die;
        if ($tipe === "create") :
            $output = postCurl($url, json_encode($request), $header);
        else :
            $output = customCurl("PUT", $url, json_encode($request), $header);
        endif;
        $decode = json_decode($output);
        $decode->response = $this->m_sep_v2->decryptResponse($decode->response);

        if ($tipe === "create" && isset($decode->response) && $decode->metaData->code === "200") :
            if ($decode->response !== NULL) :
                $penjamin = $this->db->select('id_pasien')->from('sm_penjamin_pasien')->where('no_polish', $decode->response->noKartu, true)->get()->row();
                $data_insert = array(
                    'id_pasien' => isset($penjamin) ? $penjamin->id_pasien : NULL,
                    'jenis' => $jenis_pelayanan,
                    'tgl_rencana_kontrol' => $decode->response->tglRencanaKontrol,
                    'dokter' => $decode->response->namaDokter,
                    'no_kartu' => $decode->response->noKartu,
                    'id_user' => $this->session->userdata("id_translucent"),
                    'created_date' => $this->datetime,
                );
                if ($jenis_pelayanan === "2") :
                    $data_insert['no_surat'] = $decode->response->noSuratKontrol;
                elseif ($jenis_pelayanan === "1") :
                    $data_insert['no_surat'] = $decode->response->noSPRI;
                endif;  
                $this->db->insert('sm_surat_kontrol_bpjs', $data_insert);
            endif;
        endif;

        $this->response($decode, REST_Controller::HTTP_OK);
    }

    function get_list_surat_kontrol_get()
    {
        $tanggal_awal = date2mysql(safe_get("tanggal_awal"));
        $tanggal_akhir = date2mysql(safe_get("tanggal_akhir"));
        $filter = safe_get("filter");

        if ($tanggal_awal === '' && $tanggal_akhir === '') {
            $tanggal_awal = date('Y-m-d');
            $tanggal_akhir = date('Y-m-d');
        }

        if ($filter === '') {
            $filter = "1";
        }

        $url = $this->bpjs_config->server . "/RencanaKontrol/ListRencanaKontrol/tglAwal/".$tanggal_awal."/tglAkhir/".$tanggal_akhir."/filter/".$filter;
        $header = $this->m_sep_v2->createHeader($this->bpjs_config);
        $header[4]  = 'Content-type: application/x-www-form-urlencoded';
        $output = getCurl($url, $header);
        $decode = json_decode($output);
		$decode->response = $this->m_sep_v2->decryptResponse($decode->response);
		$this->response($decode, REST_Controller::HTTP_OK);
    }

    function delete_surat_kontrol_delete()
    {
        $no_surat_kontrol = $this->delete("no_surat_kontrol", true);
        $url = $this->bpjs_config->server . "/RencanaKontrol/Delete";
        $header = $this->m_sep_v2->createHeader($this->bpjs_config);
        $req = array(
            "request" => array(
                "t_suratkontrol" => array(
                    "noSuratKontrol" => $no_surat_kontrol,
                    "user" => $this->session->userdata("account"),
                )
            )
        );

        $header[4] = "Content-type: application/x-www-form-urlencoded";
        $output = customCurl("DELETE", $url, json_encode($req), $header);
        $decode = json_decode($output);
        $message = "";
        // var_dump($decode); die;
        if ($decode->metaData->code === "200") :
            $message = "Berhasil menghapus surat kontrol dari database BPJS";

            $this->db->trans_begin();
            $this->db->where("no_surat", $no_surat_kontrol)->delete("sm_surat_kontrol_bpjs");

            if ($this->db->trans_status() === false) :
                $this->db->trans_rollback();
                $message .= " dan gagal menghapus surat kontrol dari rumah sakit";
            else :
                $this->db->trans_commit();
                $message .= " dan berhasil menghapus surat kontrol dari rumah sakit";
            endif;

            $decode->metaData->message = $message;
        endif;
        $this->response($decode, REST_Controller::HTTP_OK);
    }

    function get_list_surat_kontrol_by_no_kartu_get()
    {
        $no_kartu = safe_get("no_kartu");
        $url = $this->bpjs_config->server . "/RencanaKontrol/ListRencanaKontrol/Bulan/".date('m')."/Tahun/".date('Y')."/Nokartu/".$no_kartu."/filter/2";
        $header = $this->m_sep_v2->createHeader($this->bpjs_config);
        $header[4]  = 'Content-type: application/x-www-form-urlencoded';
        $output = getCurl($url, $header);
        $decode = json_decode($output);
		$decode->response = $this->m_sep_v2->decryptResponse($decode->response);
		$this->response($decode, REST_Controller::HTTP_OK);
    }

    function get_surat_kontrol_by_no_surat_get()
    {
        $no_surat = safe_get("no_surat");
        $url = $this->bpjs_config->server . "/RencanaKontrol/noSuratKontrol/".$no_surat;
        $header = $this->m_sep_v2->createHeader($this->bpjs_config);
        $header[4]  = 'Content-type: application/x-www-form-urlencoded';
        $output = getCurl($url, $header);
        $decode = json_decode($output);
		$decode->response = $this->m_sep_v2->decryptResponse($decode->response);
		$this->response($decode, REST_Controller::HTTP_OK);
    }

    function get_surat_kontrol_by_no_surat_v2_get()
    {
        if (!$this->get('no_surat', true)) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST);
        endif;
        $no_surat    = $this->get('no_surat', true);
        $url    = $this->bpjs_config->server . "/RencanaKontrol/noSuratKontrol/".$no_surat;
        $header = $this->m_sep_v2->createHeader($this->bpjs_config);
        $output = getCurl($url, $header);
        $decode = json_decode($output);
		$decode->response = $this->m_sep_v2->decryptResponse($decode->response);
        $this->response($decode, REST_Controller::HTTP_OK);
    }
    // end rencana kontrol 
}