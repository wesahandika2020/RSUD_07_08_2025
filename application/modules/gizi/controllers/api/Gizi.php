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
class Gizi extends REST_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->limit = 10;
        $this->load->model('Gizi_model', 'gizi');
        $this->datetime = date('Y-m-d H:i:s');

        $id_translucent = $this->session->userdata('id_translucent');
        if (empty($id_translucent)) :
            $this->response(array('error' => 'Anda belum login'), REST_Controller::HTTP_UNAUTHORIZED);
            exit();
        endif;
    }

    function ambil_hasil_lab_get()
    {
        if (!$this->get("id_layanan")) {
            $this->response(NULL, 400);
        }

        $data = $this->gizi->cekHasilLab($this->get("id_layanan"));
        
        $this->response($data, 200);
    }

    private function start($page)
    {
        return (($page - 1) * $this->limit);
    }

    function get_list_permintaan_makanan_pasien_get()
    {
        if (!$this->get('page')) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
        endif;
        
        $start          = ($this->get('page') - 1) * $this->limit;
        $search         = [
            'tanggal_awal'      => safe_get('tanggal_awal'),
            'tanggal_akhir'     => safe_get('tanggal_akhir'),
            'bangsal'           => safe_get('bangsal'),
            'no_register'       => safe_get('no_register'),
            'nama'              => safe_get('nama'),
            'no_rm'             => safe_get('no_rm'),
            'bed'               => safe_get('bed'),
            'status'            => safe_get('status'),
            'id_dokter'         => safe_get('id_dokter'),
            'status_pasien'     => safe_get('status_pasien'),
        ];
        
        $data            = $this->gizi->getListPermintaanMakanPasien($this->limit, $start, $search);
        $data['page']    = (int) $this->get('page');
        $data['limit']   = $this->limit;

        if ($data) :
            $this->response($data, REST_Controller::HTTP_OK); // (200)
        endif;
    }

    function cetak_etiket_get()
    {
        $search         = [
            'tanggal_awal'      => safe_get('tanggal_awal'),
            'tanggal_akhir'     => safe_get('tanggal_akhir'),
            'nama'              => safe_get('nama'),
            'no_rm'             => safe_get('no_rm'),
            'diet_cetak'        => safe_get('diet_cetak'),
            'jam_cetak'         => safe_get('jam_cetak'),
            'ruangan_diet'      => safe_get('ruangan_diet'),
        ];
        
        $data = $search;

        if ($data) :
            $this->response($data, REST_Controller::HTTP_OK); // (200)
        endif;
    }

    function get_list_dpmp_get()
    {
        if (!$this->get('page', true)) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
        endif;
        $limit = 5;
        $start  = ($this->get('page') - 1) * $limit;
        $search = [
            'keyword' => safe_get('keyword'),
            'waktu' => date2mysql(safe_get('waktu')),
            'id_layanan_pendaftaran'  => $this->get('id_layanan_pendaftaran', true),
        ];
        
        $data            = $this->gizi->getListDataDPMP($limit, $start, $search);
        $data['page']    = (int) $this->get('page');
        $data['limit']   = $limit;

        if ($data) :
            $this->response($data, REST_Controller::HTTP_OK); // (200)
        endif;
    }

    function cek_pindah_ruang_pasien_ranap_get()
    {
        if (!$this->get('id_layanan', true)) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
        endif;

        $data = $this->gizi->cekPindahRuangPasienRanap($this->get("id_layanan"));
        $this->response($data, REST_Controller::HTTP_OK);
    }

    function cek_pindah_ruang_pasien_icare_get()
    {
        if (!$this->get('id_layanan', true)) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
        endif;

        $data = $this->gizi->cekPindahRuangPasienIcare($this->get("id_layanan"));
        $this->response($data, REST_Controller::HTTP_OK);
    }

    function item_diet_get()
    {
        $params['q'] = safe_get('q');
        $start = $this->start(safe_get('page'));
        $params['jenis'] = safe_get('jenis');
        $data = $this->gizi->getItemDiet($params, $start, $this->limit);
        if ((safe_get('page') == 1) & ($params['q'] == '')) {
            $pilih[] = array(
                'id' => '', 
                'nama' => '', 
            );

            $data['data'] = array_merge($pilih, $data['data']);
            $data['total'] += 1;
        }
        $this->response($data, REST_Controller::HTTP_OK);
    }

    function order_dpmp_post()
    {

        if (safe_post('id_order') === '') :
            $response = array('status' => false, 'message' => 'Parameter tidak lengkap, silahkan hubungi bagian IT.');
            $this->response($response, REST_Controller::HTTP_OK);
        endif;

        $id = safe_post('id_order');

        $status = 'Konfirm';

        $update = ["status" => $status];
        
        $data = $this->db->where('id', $id)->update('sm_order_dpmp', $update);

        if ($this->db->trans_status() === false) :
            $this->db->trans_rollback();
            $status = false;
            $pesan = 'Konfirmasi DPMP Gagal';
        else :
            $this->db->trans_commit();
            $status = true;
            $pesan = 'Konfirmasi DPMP Berhasil';
        endif;

        $message = array(
            'status' => $status,
            'pesan'  => $pesan, 
            'token'  => $this->security->get_csrf_hash(),
        );

        $this->response($message, REST_Controller::HTTP_OK);

    }

    function batal_order_dpmp_post()
    {

        if (safe_post('id_order') === '') :
            $response = array('status' => false, 'message' => 'Parameter tidak lengkap, silahkan hubungi bagian IT.');
            $this->response($response, REST_Controller::HTTP_OK);
        endif;

        $id = safe_post('id_order');
        
        $status = 'Batal';

        $update = ["status" => $status, "updated_user" => $this->session->userdata('id_translucent'), "update_time" => $this->datetime];
        
        $data = $this->db->where('id', $id)->update('sm_order_dpmp', $update);

        if ($this->db->trans_status() === false) :
            $this->db->trans_rollback();
            $status = false;
            $pesan = 'Pembatalan Order DPMP Gagal';
        else :
            $this->db->trans_commit();
            $status = true;
            $pesan = 'Pembatalan Order DPMP Berhasil';
        endif;

        $message = array(
            'status' => $status,
            'pesan'  => $pesan, 
            'token'  => $this->security->get_csrf_hash(),
        );

        $this->response($message, REST_Controller::HTTP_OK);

    }

    function simpan_dpmp_post()
    {
        if (!safe_post('id_layanan_pendaftaran')) :
            $this->response(array('status' => false, 'message' => 'Parameter tidak lengkap'), REST_Controller::HTTP_BAD_REQUEST);
        endif;

        $layanan = array('id' => safe_post('id_layanan_pendaftaran'));

        $data_diet = array(
            'id' => safe_post('id_dpmp'),
            'id_layanan_pendaftaran' => $layanan['id'],
            'waktu_dpmp' => (safe_post('waktu_dpmp') !== '' ? datetime2mysql(safe_post('waktu_dpmp')) : NULL),
            'profesi' => safe_post('profesi') !== '' ? safe_post('profesi') : NULL,
            'nadis' => safe_post('nadis') !== '' ? safe_post('nadis') : NULL,
            'ttd_nadis' => (safe_post('ttd_nadis') !== '' ? safe_post('ttd_nadis') : NULL),
            'status_ruang' => (safe_post('status_ruang') !== '' ? safe_post('status_ruang') : NULL),
            'dpmp_dm' => (safe_post('dpmp_dm') !== '' ? safe_post('dpmp_dm') : NULL),
            'dpmp_rg' => (safe_post('dpmp_rg') !== '' ? safe_post('dpmp_rg') : NULL),
            'dpmp_rl' => (safe_post('dpmp_rl') !== '' ? safe_post('dpmp_rl') : NULL),
            'dpmp_dj' => (safe_post('dpmp_dj') !== '' ? safe_post('dpmp_dj') : NULL),
            'dpmp_rs' => (safe_post('dpmp_rs') !== '' ? safe_post('dpmp_rs') : NULL),
            'dpmp_dl' => (safe_post('dpmp_dl') !== '' ? safe_post('dpmp_dl') : NULL),
            'dpmp_ts' => (safe_post('dpmp_ts') !== '' ? safe_post('dpmp_ts') : NULL),
            'dpmp_dh' => (safe_post('dpmp_dh') !== '' ? safe_post('dpmp_dh') : NULL),
            'dpmp_tktp' => (safe_post('dpmp_tktp') !== '' ? safe_post('dpmp_tktp') : NULL),
            'dpmp_tkal' => (safe_post('dpmp_tkal') !== '' ? safe_post('dpmp_tkal') : NULL),
            'dpmp_rkal' => (safe_post('dpmp_rkal') !== '' ? safe_post('dpmp_rkal') : NULL),
            'dpmp_rp' => (safe_post('dpmp_rp') !== '' ? safe_post('dpmp_rp') : NULL),
            'dpmp_rpur' => (safe_post('dpmp_rpur') !== '' ? safe_post('dpmp_rpur') : NULL),
            'dpmp_b' => (safe_post('dpmp_b') !== '' ? safe_post('dpmp_b') : NULL),
            'dpmp_sonde' => (safe_post('dpmp_sonde') !== '' ? safe_post('dpmp_sonde') : NULL),
            'dpmp_c' => (safe_post('dpmp_c') !== '' ? safe_post('dpmp_c') : NULL),
            'dpmp_p' => (safe_post('dpmp_p') !== '' ? safe_post('dpmp_p') : NULL),
            'jns_diet_mp' => (safe_post('jns_diet_mp') !== '' ? safe_post('jns_diet_mp') : NULL),
            'jns_diet_sp' => (safe_post('jns_diet_sp') !== '' ? safe_post('jns_diet_sp') : NULL),
            'jns_diet_ms' => (safe_post('jns_diet_ms') !== '' ? safe_post('jns_diet_ms') : NULL),
            'jns_diet_ss' => (safe_post('jns_diet_ss') !== '' ? safe_post('jns_diet_ss') : NULL),
            'jns_diet_mm' => (safe_post('jns_diet_mm') !== '' ? safe_post('jns_diet_mm') : NULL),
            'jns_diet_sm' => (safe_post('jns_diet_sm') !== '' ? safe_post('jns_diet_sm') : NULL),
            'btk_mkn_mp' => (safe_post('btk_mkn_mp') !== '' ? safe_post('btk_mkn_mp') : NULL),
            'btk_mkn_sp' => (safe_post('btk_mkn_sp') !== '' ? safe_post('btk_mkn_sp') : NULL),
            'btk_mkn_ms' => (safe_post('btk_mkn_ms') !== '' ? safe_post('btk_mkn_ms') : NULL),
            'btk_mkn_ss' => (safe_post('btk_mkn_ss') !== '' ? safe_post('btk_mkn_ss') : NULL),
            'btk_mkn_mm' => (safe_post('btk_mkn_mm') !== '' ? safe_post('btk_mkn_mm') : NULL),
            'btk_mkn_sm' => (safe_post('btk_mkn_sm') !== '' ? safe_post('btk_mkn_sm') : NULL),
            'mp_makan_pasien' => (safe_post('mp_makan_pasien') !== '' ? safe_post('mp_makan_pasien') : NULL),
            'sp_makan_pasien' => (safe_post('sp_makan_pasien') !== '' ? safe_post('sp_makan_pasien') : NULL),
            'ms_makan_pasien' => (safe_post('ms_makan_pasien') !== '' ? safe_post('ms_makan_pasien') : NULL),
            'ss_makan_pasien' => (safe_post('ss_makan_pasien') !== '' ? safe_post('ss_makan_pasien') : NULL),
            'mm_makan_pasien' => (safe_post('mm_makan_pasien') !== '' ? safe_post('mm_makan_pasien') : NULL),
            'sm_makan_pasien' => (safe_post('sm_makan_pasien') !== '' ? safe_post('sm_makan_pasien') : NULL),
            'ket_makan_pasien' => (safe_post('ket_makan_pasien') !== '' ? safe_post('ket_makan_pasien') : NULL),
            'mp_diet_cair' => (safe_post('mp_diet_cair') !== '' ? safe_post('mp_diet_cair') : NULL),
            'ms_diet_cair' => (safe_post('ms_diet_cair') !== '' ? safe_post('ms_diet_cair') : NULL),
            'mm_diet_cair' => (safe_post('mm_diet_cair') !== '' ? safe_post('mm_diet_cair') : NULL),
            'sp_diet_cair' => (safe_post('sp_diet_cair') !== '' ? safe_post('sp_diet_cair') : NULL),
            'ss_diet_cair' => (safe_post('ss_diet_cair') !== '' ? safe_post('ss_diet_cair') : NULL),
            'sm_diet_cair' => (safe_post('sm_diet_cair') !== '' ? safe_post('sm_diet_cair') : NULL),
        ); 
        
        if ($data_diet['id'] === '') {
            unset($data_diet['id']);
            $data_diet['created_date'] = $this->datetime;
            $data_diet['id_user'] = $this->session->userdata('id_translucent');

            $this->db->insert('sm_dpmp', $data_diet);
            $idDPMP = $this->db->insert_id();
            $dpmp_item = safe_post('dpmp_item');

            if ($idDPMP !== null && ($dpmp_item !== '' || $dpmp_item !== null)) {
                // Reusable function to process dpmp_jam_* fields
                function processDpmpJam($jamField) {
                    $jamData = safe_post($jamField);

                    if (!is_array($jamData) || empty($jamData)) {
                        return null;
                    }

                    foreach ($jamData as $key => $value) {
                        if ($value === 'null') {
                            $jamData[$key] = null;
                        } else {
                            $date = new DateTime($value);
                            $jamData[$key] = $date->format('H:i:s');
                        }
                    }

                    return $jamData;
                }

                $dpmp_satu = processDpmpJam('dpmp_jam_satu');
                $dpmp_dua = processDpmpJam('dpmp_jam_dua');
                $dpmp_tiga = processDpmpJam('dpmp_jam_tiga');
                $dpmp_empat = processDpmpJam('dpmp_jam_empat');
                $dpmp_lima = processDpmpJam('dpmp_jam_lima');
                $dpmp_enam = processDpmpJam('dpmp_jam_enam');
                $dpmp_tujuh = processDpmpJam('dpmp_jam_tujuh');
                $dpmp_delapan = processDpmpJam('dpmp_jam_delapan');

                $created_date = safe_post('created_date');
                if (!is_array($created_date) || empty($created_date)) {
                    $date_created = null;
                } else {
                    $date_created = [];
                    foreach ($created_date as $key => $value) {
                        $date = new DateTime($value);
                        $date_created[$key] = $date->format('Y-m-d H:i:s');
                    }
                }

                $data_diet_cair = array(
                    'id_layanan_pendaftaran' => $layanan['id'],
                    'dpmp_item' => $dpmp_item !== '' ? $dpmp_item : null,
                    'dpmp_diet' => safe_post('dpmp_diet') !== '' ? safe_post('dpmp_diet') : null,
                    'dpmp_jam_satu' => $dpmp_satu,
                    'dpmp_jam_dua' => $dpmp_dua,
                    'dpmp_jam_tiga' => $dpmp_tiga,
                    'dpmp_jam_empat' => $dpmp_empat,
                    'dpmp_jam_lima' => $dpmp_lima,
                    'dpmp_jam_enam' => $dpmp_enam,
                    'dpmp_jam_tujuh' => $dpmp_tujuh,
                    'dpmp_jam_delapan' => $dpmp_delapan,
                    'keterangan_diet_cair' => safe_post('keterangan_diet_cair') !== '' ? safe_post('keterangan_diet_cair') : null,
                    'dpmp_gram' => safe_post('dpmp_gram') !== '' ? safe_post('dpmp_gram') : null,
                    'id_users' => safe_post('user_account') !== '' ? safe_post('user_account') : null,
                    'id_dpmp' => $idDPMP,
                    'created_date' => $date_created,
                );

                $this->gizi->simpanDataDietCair($data_diet_cair);
            }
        } else {
            $data_diet['updated_date'] = $this->datetime;
            $data_diet['updated_user'] = $this->session->userdata('id_translucent');

            $this->db->where('id', $data_diet['id'], true)->update('sm_dpmp', $data_diet);
            $dpmp_item = safe_post('dpmp_item');

            if ($dpmp_item) {
                $dpmp_satu = processDpmpJam('dpmp_jam_satu');
                $dpmp_dua = processDpmpJam('dpmp_jam_dua');
                $dpmp_tiga = processDpmpJam('dpmp_jam_tiga');
                $dpmp_empat = processDpmpJam('dpmp_jam_empat');
                $dpmp_lima = processDpmpJam('dpmp_jam_lima');
                $dpmp_enam = processDpmpJam('dpmp_jam_enam');
                $dpmp_tujuh = processDpmpJam('dpmp_jam_tujuh');
                $dpmp_delapan = processDpmpJam('dpmp_jam_delapan');

                $created_date = safe_post('created_date');
                if (!is_array($created_date) || empty($created_date)) {
                    $date_created = null;
                } else {
                    $date_created = [];
                    foreach ($created_date as $key => $value) {
                        $date = new DateTime($value);
                        $date_created[$key] = $date->format('Y-m-d H:i:s');
                    }
                }

                $data_diet_cair = array(
                    'id_layanan_pendaftaran' => $layanan['id'],
                    'dpmp_item' => $dpmp_item !== '' ? $dpmp_item : null,
                    'dpmp_diet' => safe_post('dpmp_diet') !== '' ? safe_post('dpmp_diet') : null,
                    'dpmp_jam_satu' => $dpmp_satu,
                    'dpmp_jam_dua' => $dpmp_dua,
                    'dpmp_jam_tiga' => $dpmp_tiga,
                    'dpmp_jam_empat' => $dpmp_empat,
                    'dpmp_jam_lima' => $dpmp_lima,
                    'dpmp_jam_enam' => $dpmp_enam,
                    'dpmp_jam_tujuh' => $dpmp_tujuh,
                    'dpmp_jam_delapan' => $dpmp_delapan,
                    'keterangan_diet_cair' => safe_post('keterangan_diet_cair') !== '' ? safe_post('keterangan_diet_cair') : null,
                    'dpmp_gram' => safe_post('dpmp_gram') !== '' ? safe_post('dpmp_gram') : null,
                    'id_users' => safe_post('user_account') !== '' ? safe_post('user_account') : null,
                    'id_dpmp' => $data_diet['id'],
                    'created_date' => $date_created,
                );

                $this->gizi->simpanDataDietCair($data_diet_cair);
            }
        }

        if ($this->db->trans_status() === false) :
            $this->db->trans_rollback();
            $status = false;
            $pesan = 'Entri Data DPMP Gagal';
        else :
            $this->db->trans_commit();
            $status = true;
            $pesan = 'Entri Data DPMP Berhasil';
        endif;

        $message = array(
            'status' => $status,
            'pesan'  => $pesan, 
            'token'  => $this->security->get_csrf_hash(),
            'id'     => $layanan['id'],
        );

        $this->response($message, REST_Controller::HTTP_OK);


    }

    function simpan_print_dpmp_post()
    {

        $id = safe_post('id');

        // Memulai transaksi
        $this->db->trans_begin();

        // Menyiapkan data untuk di-update
        $data = [
            'dpmp_print' => safe_post('checked') !== '' ? safe_post('checked') : NULL,
        ];

        // Melakukan update pada database
        $this->db->where('id', $id)->update('sm_dpmp', $data);

        if ($this->db->trans_status() === false) :
            $this->db->trans_rollback();
            $status = false;
            $pesan = 'Entri Data DPMP Gagal';
        else :
            $this->db->trans_commit();
            $status = true;
            $pesan = 'Entri Data DPMP Berhasil';
        endif;

        $message = array(
            'status' => $status,
            'pesan'  => $pesan, 
            'token'  => $this->security->get_csrf_hash(),
            'id_dpmp'=> $id,
        );

        $this->response($message, REST_Controller::HTTP_OK);
    }

    function simpan_ceklist_post()
    {

        if (safe_post('id_layanan') === '' | safe_post('id') === '') :
            $response = array('status' => false, 'message' => 'Parameter tidak lengkap, silahkan hubungi bagian IT.');
            $this->response($response, REST_Controller::HTTP_OK);
        endif;

        $id = safe_post('id');
        $id_layanan = safe_post('id_layanan');
        
        $status = 1;

        $update = ["ceklist" => $status];
        
        $data = $this->db->where('id', $id)->update('sm_dpmp', $update);

        if ($this->db->trans_status() === false) :
            $this->db->trans_rollback();
            $status = false;
            $pesan = 'Ceklist DPMP Gagal';
        else :
            $this->db->trans_commit();
            $status = true;
            $pesan = 'Ceklist DPMP Berhasil';
        endif;

        $message = array(
            'status' => $status,
            'pesan'  => $pesan, 
            'token'  => $this->security->get_csrf_hash(),
            'id'     => $id_layanan,
        );

        $this->response($message, REST_Controller::HTTP_OK);

    }

    function batal_ceklist_post()
    {

        if (safe_post('id_layanan') === '' | safe_post('id') === '') :
            $response = array('status' => false, 'message' => 'Parameter tidak lengkap, silahkan hubungi bagian IT.');
            $this->response($response, REST_Controller::HTTP_OK);
        endif;

        $id = safe_post('id');
        $id_layanan = safe_post('id_layanan');
        
        $status = null;

        $update = ["ceklist" => $status];
        
        $data = $this->db->where('id', $id)->update('sm_dpmp', $update);

        if ($this->db->trans_status() === false) :
            $this->db->trans_rollback();
            $status = false;
            $pesan = 'Ceklist DPMP Gagal';
        else :
            $this->db->trans_commit();
            $status = true;
            $pesan = 'Ceklist DPMP Berhasil';
        endif;

        $message = array(
            'status' => $status,
            'pesan'  => $pesan, 
            'token'  => $this->security->get_csrf_hash(),
            'id'     => $id_layanan,
        );

        $this->response($message, REST_Controller::HTTP_OK);

    }

    function ambil_data_dpmp_get()
    {
        if (!$this->get('id') && !$this->get('id_layanan')) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
        endif;

        $data['dpmp'] = $this->gizi->getDetailDPMP($this->get('id', true));
        $data['diet_cair'] = $this->gizi->getDataDietCair($this->get('id', true));
        
        if ($data) :
            $this->response($data, REST_Controller::HTTP_OK); // (200)
        endif;
    }

    function auto_form_dpmp_get()
    {
        if (!$this->get('id_layanan')) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
        endif;

        $data['dpmp'] = $this->gizi->getAutoDetailDPMP($this->get('id_layanan', true));
        
        if ($data) :
            $this->response($data, REST_Controller::HTTP_OK); // (200)
        endif;
    }

    function edit_form_dpmp_get()
    {
        if (!$this->get('id')) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
        endif;

        $data['dpmp'] = $this->gizi->getEditFormDPMP($this->get('id', true));
        
        if ($data) :
            $this->response($data, REST_Controller::HTTP_OK); // (200)
        endif;
    }

    function auto_form_diet_cair_get()
    {
        if (!$this->get('id')) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
        endif;

        $data['diet_cair'] = $this->gizi->getAutoDataDietCair($this->get('id', true));
        
        if ($data) :
            $this->response($data, REST_Controller::HTTP_OK); // (200)
        endif;
    }

    function edit_form_diet_cair_get()
    {
        if (!$this->get('id')) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
        endif;

        $data['diet_cair'] = $this->gizi->getEditFormDietCair($this->get('id', true));
        
        if ($data) :
            $this->response($data, REST_Controller::HTTP_OK); // (200)
        endif;
    }

    function edit_detail_diet_cair_get()
    {
        if (!$this->get('id')) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
        endif;

        $data['diet_cair'] = $this->gizi->getEditDetailDietCair($this->get('id', true));
        
        if ($data) :
            $this->response($data, REST_Controller::HTTP_OK); // (200)
        endif;
    }

    function update_diet_cair_put()
    {

        if (!$this->put('id', true)) :
            $this->response(array('status' => false), REST_Controller::HTTP_OK);
        endif; 

        $dpmp_jam_satu = $this->put('dpmp_jam_satu');

        if($dpmp_jam_satu === "" || $dpmp_jam_satu === null){

                $dpmp_satu = null;        
        
        } else {

             $date = new DateTime($dpmp_jam_satu);
                $new = $date->format('H:i:s');


                $dpmp_satu = $new;

            

        }

        $dpmp_jam_dua = $this->put('dpmp_jam_dua');

        if($dpmp_jam_dua === "" || $dpmp_jam_dua === null){

                $dpmp_dua = null;        
        
        } else {

                $date = new DateTime($dpmp_jam_dua);
                $new = $date->format('H:i:s');


                $dpmp_dua = $new;

            

        }

        $dpmp_jam_tiga = $this->put('dpmp_jam_tiga');

        if($dpmp_jam_tiga === "" || $dpmp_jam_tiga === null){

                $dpmp_tiga = null;        
        
        } else {

         
                $date = new DateTime($dpmp_jam_tiga);
                $new = $date->format('H:i:s');


                $dpmp_tiga = $new;


        }

        $dpmp_jam_empat = $this->put('dpmp_jam_empat');

        if($dpmp_jam_empat === "" || $dpmp_jam_empat === null){

                $dpmp_empat = null;        
        
        } else {

                $date = new DateTime($dpmp_jam_empat);
                $new = $date->format('H:i:s');


                $dpmp_empat = $new;

            
        }

        $dpmp_jam_lima = $this->put('dpmp_jam_lima');

        if($dpmp_jam_lima === "" || $dpmp_jam_lima === null){

                $dpmp_lima = null;        
        
        } else {

                $date = new DateTime($dpmp_jam_lima);
                $new = $date->format('H:i:s');


                $dpmp_lima = $new;

            
        }

        $dpmp_jam_enam = $this->put('dpmp_jam_enam');

        if($dpmp_jam_enam === "" || $dpmp_jam_enam === null){

                $dpmp_enam = null;        
        
        } else {

            

                $date = new DateTime($dpmp_jam_enam);
                $new = $date->format('H:i:s');


                $dpmp_enam = $new;

            

        }

        $dpmp_jam_tujuh = $this->put('dpmp_jam_tujuh');

        if($dpmp_jam_tujuh === "" || $dpmp_jam_tujuh === null){

                $dpmp_tujuh = null;        
        
        } else {

            
                $date = new DateTime($dpmp_jam_tujuh);
                $new = $date->format('H:i:s');


                $dpmp_tujuh = $new;

            
        }

        $dpmp_jam_delapan = $this->put('dpmp_jam_delapan');

        if($dpmp_jam_delapan === "" || $dpmp_jam_delapan === null){

                $dpmp_delapan = null;        
        
        } else {

            
                $date = new DateTime($dpmp_jam_delapan);
                $new = $date->format('H:i:s');


                $dpmp_delapan = $new;

            
        }


        

                    

        $data_diet_cair = array(
                'id'                        => $this->put('id', true),
                'dpmp_item'                 => $this->put('dpmp_item', true),
                'dpmp_diet'                 => $this->put('dpmp_diet', true),
                'dpmp_jam_satu'             => $dpmp_satu,
                'dpmp_jam_dua'              => $dpmp_dua,
                'dpmp_jam_tiga'             => $dpmp_tiga,
                'dpmp_jam_empat'            => $dpmp_empat,
                'dpmp_jam_lima'             => $dpmp_lima,
                'dpmp_jam_enam'             => $dpmp_enam,
                'dpmp_jam_tujuh'            => $dpmp_tujuh,
                'dpmp_jam_delapan'          => $dpmp_delapan,
                'keterangan_diet_cair'      => $this->put('dpmp_keterangan', true),
                'dpmp_gram'                 => $this->put('dpmp_gram', true),
                'updated_user'              => $this->put('user_account', true),
                'updated_date'              => $this->datetime,
            );

        $status = $this->gizi->editDataDietCair($data_diet_cair); 
        $this->response(array('status' => $status), REST_Controller::HTTP_OK);

    }

    function hapus_diet_cair_delete($id)
    {
        $status = $this->gizi->deleteDietCair($id);
        if ($status) :
            $response = array('status' => $status, 'message' => 'Berhasil menghapus Diet Cair!');
        else :
            $response = array('status' => $status, 'message' => 'Gagal menghapus Diet Cair!');
        endif;
        $this->response($response, REST_Controller::HTTP_OK);
    }

    function hapus_dpmp_delete($id)
    {
        $status = $this->gizi->deleteDPMP($id);
        if ($status) :
            $response = array('status' => $status, 'message' => 'Berhasil menghapus DPMP!');
        else :
            $response = array('status' => $status, 'message' => 'Gagal menghapus DPMP!');
        endif;
        $this->response($response, REST_Controller::HTTP_OK);
    }

    function simpan_gizi_anak_post()
	{   
        $checkData = safe_post('id_ga');
        $ga_tgl_masuk = safe_post('ga_tgl_masuk');
        if ($ga_tgl_masuk !== '') {
            $ga_tgl_masuk = str_replace('/', '-', $ga_tgl_masuk);
            $ga_tgl_masuk = date('Y-m-d', strtotime($ga_tgl_masuk));
        }
        $ga_tgl_skrining = safe_post('ga_tgl_skrining');
        if ($ga_tgl_skrining !== '') {
            $ga_tgl_skrining = str_replace('/', '-', $ga_tgl_skrining);
            $ga_tgl_skrining = date('Y-m-d', strtotime($ga_tgl_skrining));
        }
        $ga_tgl_monev_1 = safe_post('ga_tgl_monev_1');
        if ($ga_tgl_monev_1 !== '') {
            $ga_tgl_monev_1 = str_replace('/', '-', $ga_tgl_monev_1);
            $ga_tgl_monev_1 = date('Y-m-d', strtotime($ga_tgl_monev_1));
        }
        $ga_tgl_monev_2 = safe_post('ga_tgl_monev_2');
        if ($ga_tgl_monev_2 !== '') {
            $ga_tgl_monev_2 = str_replace('/', '-', $ga_tgl_monev_2);
            $ga_tgl_monev_2 = date('Y-m-d', strtotime($ga_tgl_monev_2));
        }
        $ga_tgl_monev_3 = safe_post('ga_tgl_monev_3');
        if ($ga_tgl_monev_3 !== '') {
            $ga_tgl_monev_3 = str_replace('/', '-', $ga_tgl_monev_3);
            $ga_tgl_monev_3 = date('Y-m-d', strtotime($ga_tgl_monev_3));
        }
        $ga_tgl_monev_4 = safe_post('ga_tgl_monev_4');
        if ($ga_tgl_monev_4 !== '') {
            $ga_tgl_monev_4 = str_replace('/', '-', $ga_tgl_monev_4);
            $ga_tgl_monev_4 = date('Y-m-d', strtotime($ga_tgl_monev_4));
        }

        $ga_tgl_petugas = safe_post('ga_tgl_petugas');
        if ($ga_tgl_petugas !== '') {
            $ga_tgl_petugas = str_replace('/', '-', $ga_tgl_petugas);
            $ga_tgl_petugas = date('Y-m-d H:i', strtotime($ga_tgl_petugas));
        }


		$this->db->trans_begin();
		if ($checkData != '') {

            $user_log         = $this->session->userdata('id_translucent');
            $created_date_log = $this->datetime;
            $sqlLog = "INSERT INTO sm_gizi_anak_log (
                            id_ga_lama,id_pendaftaran,id_layanan_pendaftaran,id_pasien,id_users,ga_ruang,ga_tgl_masuk,ga_tgl_skrining,ga_usia,ga_diagnosa_medis,ga_risiko,
                            ga_bb,ga_bbu,ga_kesan,ga_pb,ga_pbu,ga_bbi,ga_bbpb,ga_lla,ga_ha,ga_biokimia,ga_klinis,ga_telur,ga_udang,ga_sapi,ga_ikan,ga_kedelai,ga_almond,
                            ga_gandum,ga_alergi_lainnya,ga_pola_makan,ga_tindak,ga_problem,ga_etiologi,ga_gejala,ga_preskripsi,ga_energi,ga_lemak,ga_protein,ga_karbohidrat,
                            ga_cairan,ga_makanan,ga_route,ga_cara_makan,ga_frekuensi,ga_monitoring,ga_tgl_monev_1,ga_tgl_monev_2,ga_tgl_monev_3,ga_tgl_monev_4,
                            ga_antropometri_1,ga_antropometri_2,ga_antropometri_3,ga_antropometri_4,ga_biokimia_1,ga_biokimia_2,ga_biokimia_3,ga_biokimia_4,
                            ga_klinis_1,ga_klinis_2,ga_klinis_3,ga_klinis_4,ga_asupan_1,ga_asupan_2,ga_asupan_3,ga_asupan_4,ga_monitoring_lain,ga_monitoring_lain_1,
                            ga_monitoring_lain_2,ga_monitoring_lain_3,ga_monitoring_lain_4,ga_tgl_petugas,ga_petugas,ga_ttd,created_at,updated_at,ga_dokter,ga_ttd_dokter,
                            created_date_log,user_log,status_log)
                        SELECT id_ga,id_pendaftaran,id_layanan_pendaftaran,id_pasien,id_users,ga_ruang,ga_tgl_masuk,ga_tgl_skrining,ga_usia,ga_diagnosa_medis,ga_risiko,
                            ga_bb,ga_bbu,ga_kesan,ga_pb,ga_pbu,ga_bbi,ga_bbpb,ga_lla,ga_ha,ga_biokimia,ga_klinis,ga_telur,ga_udang,ga_sapi,ga_ikan,ga_kedelai,ga_almond,
                            ga_gandum,ga_alergi_lainnya,ga_pola_makan,ga_tindak,ga_problem,ga_etiologi,ga_gejala,ga_preskripsi,ga_energi,ga_lemak,ga_protein,ga_karbohidrat,
                            ga_cairan,ga_makanan,ga_route,ga_cara_makan,ga_frekuensi,ga_monitoring,ga_tgl_monev_1,ga_tgl_monev_2,ga_tgl_monev_3,ga_tgl_monev_4,
                            ga_antropometri_1,ga_antropometri_2,ga_antropometri_3,ga_antropometri_4,ga_biokimia_1,ga_biokimia_2,ga_biokimia_3,ga_biokimia_4,
                            ga_klinis_1,ga_klinis_2,ga_klinis_3,ga_klinis_4,ga_asupan_1,ga_asupan_2,ga_asupan_3,ga_asupan_4,ga_monitoring_lain,ga_monitoring_lain_1,
                            ga_monitoring_lain_2,ga_monitoring_lain_3,ga_monitoring_lain_4,ga_tgl_petugas,ga_petugas,ga_ttd,created_at,updated_at,ga_dokter,ga_ttd_dokter,
                            '$created_date_log' , '$user_log', 'Edit' from sm_gizi_anak where id_ga = " . safe_post('id_ga');
            $this->db->query($sqlLog);

            $data = array(
                'id_ga'                         => safe_post('id_ga'),
                'id_pendaftaran'                => safe_post('id_pendaftaran'),
                'id_layanan_pendaftaran'        => safe_post('id_layanan_pendaftaran'),
				'id_pasien'                     => safe_post('id_pasien'),
                'id_users'              	    => safe_post('id_users'),

                'ga_ruang'                      => safe_post('ga_ruang') !== '' ? safe_post('ga_ruang'): NULL,
                'ga_tgl_masuk'                  => $ga_tgl_masuk !== '' ? $ga_tgl_masuk : NULL,
                'ga_tgl_skrining'               => $ga_tgl_skrining !== '' ? $ga_tgl_skrining : NULL,
                'ga_usia'                       => safe_post('ga_usia') !== '' ? safe_post('ga_usia'): NULL,
                'ga_diagnosa_medis'             => safe_post('ga_diagnosa_medis') !== '' ? safe_post('ga_diagnosa_medis'): NULL,
                'ga_risiko'                     => safe_post('ga_risiko') !== '' ? safe_post('ga_risiko'): NULL,

                // ASESMEN GIZI
                'ga_bb'                         => safe_post('ga_bb') !== '' ? safe_post('ga_bb'): NULL,
                'ga_bbu'                        => safe_post('ga_bbu') !== '' ? safe_post('ga_bbu'): NULL,
                'ga_kesan'                      => safe_post('ga_kesan') !== '' ? safe_post('ga_kesan'): NULL,
                'ga_pb'                         => safe_post('ga_pb') !== '' ? safe_post('ga_pb'): NULL,
                'ga_pbu'                        => safe_post('ga_pbu') !== '' ? safe_post('ga_pbu'): NULL,
                'ga_bbi'                        => safe_post('ga_bbi') !== '' ? safe_post('ga_bbi'): NULL,
                'ga_bbpb'                       => safe_post('ga_bbpb') !== '' ? safe_post('ga_bbpb'): NULL,
                'ga_lla'                        => safe_post('ga_lla') !== '' ? safe_post('ga_lla'): NULL,
                'ga_ha'                         => safe_post('ga_ha') !== '' ? safe_post('ga_ha'): NULL,
                'ga_biokimia'                   => safe_post('ga_biokimia') !== '' ? safe_post('ga_biokimia'): NULL,
                'ga_klinis'                     => safe_post('ga_klinis') !== '' ? safe_post('ga_klinis'): NULL,
                'ga_telur'                      => safe_post('ga_telur') !== '' ? safe_post('ga_telur'): NULL,
                'ga_udang'                      => safe_post('ga_udang') !== '' ? safe_post('ga_udang'): NULL,
                'ga_sapi'                       => safe_post('ga_sapi') !== '' ? safe_post('ga_sapi'): NULL,
                'ga_ikan'                       => safe_post('ga_ikan') !== '' ? safe_post('ga_ikan'): NULL,
                'ga_kedelai'                    => safe_post('ga_kedelai') !== '' ? safe_post('ga_kedelai'): NULL,
                'ga_almond'                     => safe_post('ga_almond') !== '' ? safe_post('ga_almond'): NULL,
                'ga_gandum'                     => safe_post('ga_gandum') !== '' ? safe_post('ga_gandum'): NULL,
                'ga_alergi_lainnya'             => safe_post('ga_alergi_lainnya') !== '' ? safe_post('ga_alergi_lainnya'): NULL,
                'ga_pola_makan'                 => safe_post('ga_pola_makan') !== '' ? safe_post('ga_pola_makan'): NULL,
                'ga_tindak'                     => safe_post('ga_tindak') !== '' ? safe_post('ga_tindak'): NULL,

                // DIAGNOSIS GIZI 
                'ga_problem'                    => safe_post('ga_problem') !== '' ? safe_post('ga_problem'): NULL,
                'ga_etiologi'                   => safe_post('ga_etiologi') !== '' ? safe_post('ga_etiologi'): NULL,
                'ga_gejala'                     => safe_post('ga_gejala') !== '' ? safe_post('ga_gejala'): NULL,

                // INTERVENSI GIZI
                'ga_preskripsi'                 => safe_post('ga_preskripsi') !== '' ? safe_post('ga_preskripsi'): NULL,
                'ga_energi'                     => safe_post('ga_energi') !== '' ? safe_post('ga_energi'): NULL,
                'ga_lemak'                      => safe_post('ga_lemak') !== '' ? safe_post('ga_lemak'): NULL,
                'ga_protein'                    => safe_post('ga_protein') !== '' ? safe_post('ga_protein'): NULL,
                'ga_karbohidrat'                => safe_post('ga_karbohidrat') !== '' ? safe_post('ga_karbohidrat'): NULL,
                'ga_cairan'                     => safe_post('ga_cairan') !== '' ? safe_post('ga_cairan'): NULL,
                'ga_makanan'                    => safe_post('ga_makanan') !== '' ? safe_post('ga_makanan'): NULL,
                'ga_route'                      => safe_post('ga_route') !== '' ? safe_post('ga_route'): NULL,
                'ga_cara_makan'                 => safe_post('ga_cara_makan') !== '' ? safe_post('ga_cara_makan'): NULL,
                'ga_frekuensi'                  => safe_post('ga_frekuensi') !== '' ? safe_post('ga_frekuensi'): NULL,

                // RENCANA MONITORING DAN EVALUASI
                'ga_monitoring'                 => safe_post('ga_monitoring') !== '' ? safe_post('ga_monitoring'): NULL,

                // MONITORING DAN EVALUASI
                'ga_tgl_monev_1'                  => $ga_tgl_monev_1 !== '' ? $ga_tgl_monev_1 : NULL,
                'ga_tgl_monev_2'                  => $ga_tgl_monev_2 !== '' ? $ga_tgl_monev_2 : NULL,
                'ga_tgl_monev_3'                  => $ga_tgl_monev_3 !== '' ? $ga_tgl_monev_3 : NULL,
                'ga_tgl_monev_4'                  => $ga_tgl_monev_4 !== '' ? $ga_tgl_monev_4 : NULL,

                'ga_antropometri_1'               => safe_post('ga_antropometri_1') !== '' ? safe_post('ga_antropometri_1'): NULL,
                'ga_antropometri_2'               => safe_post('ga_antropometri_2') !== '' ? safe_post('ga_antropometri_2'): NULL,
                'ga_antropometri_3'               => safe_post('ga_antropometri_3') !== '' ? safe_post('ga_antropometri_3'): NULL,
                'ga_antropometri_4'               => safe_post('ga_antropometri_4') !== '' ? safe_post('ga_antropometri_4'): NULL,

                'ga_biokimia_1'                   => safe_post('ga_biokimia_1') !== '' ? safe_post('ga_biokimia_1'): NULL,
                'ga_biokimia_2'                   => safe_post('ga_biokimia_2') !== '' ? safe_post('ga_biokimia_2'): NULL,
                'ga_biokimia_3'                   => safe_post('ga_biokimia_3') !== '' ? safe_post('ga_biokimia_3'): NULL,
                'ga_biokimia_4'                   => safe_post('ga_biokimia_4') !== '' ? safe_post('ga_biokimia_4'): NULL,
                
                'ga_klinis_1'                     => safe_post('ga_klinis_1') !== '' ? safe_post('ga_klinis_1'): NULL,
                'ga_klinis_2'                     => safe_post('ga_klinis_2') !== '' ? safe_post('ga_klinis_2'): NULL,
                'ga_klinis_3'                     => safe_post('ga_klinis_3') !== '' ? safe_post('ga_klinis_3'): NULL,
                'ga_klinis_4'                     => safe_post('ga_klinis_4') !== '' ? safe_post('ga_klinis_4'): NULL,

                'ga_asupan_1'                     => safe_post('ga_asupan_1') !== '' ? safe_post('ga_asupan_1'): NULL,
                'ga_asupan_2'                     => safe_post('ga_asupan_2') !== '' ? safe_post('ga_asupan_2'): NULL,
                'ga_asupan_3'                     => safe_post('ga_asupan_3') !== '' ? safe_post('ga_asupan_3'): NULL,
                'ga_asupan_4'                     => safe_post('ga_asupan_4') !== '' ? safe_post('ga_asupan_4'): NULL,

                'ga_monitoring_lain'              => safe_post('ga_monitoring_lain') !== '' ? safe_post('ga_monitoring_lain'): NULL,
                'ga_monitoring_lain_1'            => safe_post('ga_monitoring_lain_1') !== '' ? safe_post('ga_monitoring_lain_1'): NULL,
                'ga_monitoring_lain_2'            => safe_post('ga_monitoring_lain_2') !== '' ? safe_post('ga_monitoring_lain_2'): NULL,
                'ga_monitoring_lain_3'            => safe_post('ga_monitoring_lain_3') !== '' ? safe_post('ga_monitoring_lain_3'): NULL,
                'ga_monitoring_lain_4'            => safe_post('ga_monitoring_lain_4') !== '' ? safe_post('ga_monitoring_lain_4'): NULL,

                'ga_tgl_petugas'                  => $ga_tgl_petugas !== '' ? $ga_tgl_petugas : NULL,
                'ga_petugas'                      => safe_post('ga_petugas') !== '' ? safe_post('ga_petugas'): NULL,
                'ga_ttd'                          => safe_post('ga_ttd') !== '' ? safe_post('ga_ttd'): NULL,
                'ga_dokter'                      => safe_post('ga_dokter') !== '' ? safe_post('ga_dokter'): NULL,
                'ga_ttd_dokter'                          => safe_post('ga_ttd_dokter') !== '' ? safe_post('ga_ttd_dokter'): NULL,

                'updated_at'                        => $this->datetime,
            );
            $this->db->where('id_ga', safe_post('id_ga'));
			$this->db->update('sm_gizi_anak', $data);
		} else {
			$data = array(
                'id_pendaftaran'                => safe_post('id_pendaftaran'),
                'id_layanan_pendaftaran'        => safe_post('id_layanan_pendaftaran'),
				'id_pasien'                     => safe_post('id_pasien'),
                'id_users'              	    => safe_post('id_users'),

                'ga_ruang'                      => safe_post('ga_ruang') !== '' ? safe_post('ga_ruang'): NULL,
                'ga_tgl_masuk'                  => $ga_tgl_masuk !== '' ? $ga_tgl_masuk : NULL,
                'ga_tgl_skrining'               => $ga_tgl_skrining !== '' ? $ga_tgl_skrining : NULL,
                'ga_usia'                       => safe_post('ga_usia') !== '' ? safe_post('ga_usia'): NULL,
                'ga_diagnosa_medis'             => safe_post('ga_diagnosa_medis') !== '' ? safe_post('ga_diagnosa_medis'): NULL,
                'ga_risiko'                     => safe_post('ga_risiko') !== '' ? safe_post('ga_risiko'): NULL,

                // ASESMEN GIZI
                'ga_bb'                         => safe_post('ga_bb') !== '' ? safe_post('ga_bb'): NULL,
                'ga_bbu'                        => safe_post('ga_bbu') !== '' ? safe_post('ga_bbu'): NULL,
                'ga_kesan'                      => safe_post('ga_kesan') !== '' ? safe_post('ga_kesan'): NULL,
                'ga_pb'                         => safe_post('ga_pb') !== '' ? safe_post('ga_pb'): NULL,
                'ga_pbu'                        => safe_post('ga_pbu') !== '' ? safe_post('ga_pbu'): NULL,
                'ga_bbi'                        => safe_post('ga_bbi') !== '' ? safe_post('ga_bbi'): NULL,
                'ga_bbpb'                       => safe_post('ga_bbpb') !== '' ? safe_post('ga_bbpb'): NULL,
                'ga_lla'                        => safe_post('ga_lla') !== '' ? safe_post('ga_lla'): NULL,
                'ga_ha'                         => safe_post('ga_ha') !== '' ? safe_post('ga_ha'): NULL,
                'ga_biokimia'                   => safe_post('ga_biokimia') !== '' ? safe_post('ga_biokimia'): NULL,
                'ga_klinis'                     => safe_post('ga_klinis') !== '' ? safe_post('ga_klinis'): NULL,
                'ga_telur'                      => safe_post('ga_telur') !== '' ? safe_post('ga_telur'): NULL,
                'ga_udang'                      => safe_post('ga_udang') !== '' ? safe_post('ga_udang'): NULL,
                'ga_sapi'                       => safe_post('ga_sapi') !== '' ? safe_post('ga_sapi'): NULL,
                'ga_ikan'                       => safe_post('ga_ikan') !== '' ? safe_post('ga_ikan'): NULL,
                'ga_kedelai'                    => safe_post('ga_kedelai') !== '' ? safe_post('ga_kedelai'): NULL,
                'ga_almond'                     => safe_post('ga_almond') !== '' ? safe_post('ga_almond'): NULL,
                'ga_gandum'                     => safe_post('ga_gandum') !== '' ? safe_post('ga_gandum'): NULL,
                'ga_alergi_lainnya'             => safe_post('ga_alergi_lainnya') !== '' ? safe_post('ga_alergi_lainnya'): NULL,
                'ga_pola_makan'                 => safe_post('ga_pola_makan') !== '' ? safe_post('ga_pola_makan'): NULL,
                'ga_tindak'                     => safe_post('ga_tindak') !== '' ? safe_post('ga_tindak'): NULL,

                // DIAGNOSIS GIZI 
                'ga_problem'                    => safe_post('ga_problem') !== '' ? safe_post('ga_problem'): NULL,
                'ga_etiologi'                   => safe_post('ga_etiologi') !== '' ? safe_post('ga_etiologi'): NULL,
                'ga_gejala'                     => safe_post('ga_gejala') !== '' ? safe_post('ga_gejala'): NULL,

                // INTERVENSI GIZI
                'ga_preskripsi'                 => safe_post('ga_preskripsi') !== '' ? safe_post('ga_preskripsi'): NULL,
                'ga_energi'                     => safe_post('ga_energi') !== '' ? safe_post('ga_energi'): NULL,
                'ga_lemak'                      => safe_post('ga_lemak') !== '' ? safe_post('ga_lemak'): NULL,
                'ga_protein'                    => safe_post('ga_protein') !== '' ? safe_post('ga_protein'): NULL,
                'ga_karbohidrat'                => safe_post('ga_karbohidrat') !== '' ? safe_post('ga_karbohidrat'): NULL,
                'ga_cairan'                     => safe_post('ga_cairan') !== '' ? safe_post('ga_cairan'): NULL,
                'ga_makanan'                    => safe_post('ga_makanan') !== '' ? safe_post('ga_makanan'): NULL,
                'ga_route'                      => safe_post('ga_route') !== '' ? safe_post('ga_route'): NULL,
                'ga_cara_makan'                 => safe_post('ga_cara_makan') !== '' ? safe_post('ga_cara_makan'): NULL,
                'ga_frekuensi'                  => safe_post('ga_frekuensi') !== '' ? safe_post('ga_frekuensi'): NULL,

                // RENCANA MONITORING DAN EVALUASI
                'ga_monitoring'                 => safe_post('ga_monitoring') !== '' ? safe_post('ga_monitoring'): NULL,

                // MONITORING DAN EVALUASI
                'ga_tgl_monev_1'                  => $ga_tgl_monev_1 !== '' ? $ga_tgl_monev_1 : NULL,
                'ga_tgl_monev_2'                  => $ga_tgl_monev_2 !== '' ? $ga_tgl_monev_2 : NULL,
                'ga_tgl_monev_3'                  => $ga_tgl_monev_3 !== '' ? $ga_tgl_monev_3 : NULL,
                'ga_tgl_monev_4'                  => $ga_tgl_monev_4 !== '' ? $ga_tgl_monev_4 : NULL,

                'ga_antropometri_1'               => safe_post('ga_antropometri_1') !== '' ? safe_post('ga_antropometri_1'): NULL,
                'ga_antropometri_2'               => safe_post('ga_antropometri_2') !== '' ? safe_post('ga_antropometri_2'): NULL,
                'ga_antropometri_3'               => safe_post('ga_antropometri_3') !== '' ? safe_post('ga_antropometri_3'): NULL,
                'ga_antropometri_4'               => safe_post('ga_antropometri_4') !== '' ? safe_post('ga_antropometri_4'): NULL,

                'ga_biokimia_1'                   => safe_post('ga_biokimia_1') !== '' ? safe_post('ga_biokimia_1'): NULL,
                'ga_biokimia_2'                   => safe_post('ga_biokimia_2') !== '' ? safe_post('ga_biokimia_2'): NULL,
                'ga_biokimia_3'                   => safe_post('ga_biokimia_3') !== '' ? safe_post('ga_biokimia_3'): NULL,
                'ga_biokimia_4'                   => safe_post('ga_biokimia_4') !== '' ? safe_post('ga_biokimia_4'): NULL,
                
                'ga_klinis_1'                     => safe_post('ga_klinis_1') !== '' ? safe_post('ga_klinis_1'): NULL,
                'ga_klinis_2'                     => safe_post('ga_klinis_2') !== '' ? safe_post('ga_klinis_2'): NULL,
                'ga_klinis_3'                     => safe_post('ga_klinis_3') !== '' ? safe_post('ga_klinis_3'): NULL,
                'ga_klinis_4'                     => safe_post('ga_klinis_4') !== '' ? safe_post('ga_klinis_4'): NULL,

                'ga_asupan_1'                     => safe_post('ga_asupan_1') !== '' ? safe_post('ga_asupan_1'): NULL,
                'ga_asupan_2'                     => safe_post('ga_asupan_2') !== '' ? safe_post('ga_asupan_2'): NULL,
                'ga_asupan_3'                     => safe_post('ga_asupan_3') !== '' ? safe_post('ga_asupan_3'): NULL,
                'ga_asupan_4'                     => safe_post('ga_asupan_4') !== '' ? safe_post('ga_asupan_4'): NULL,

                'ga_monitoring_lain'              => safe_post('ga_monitoring_lain') !== '' ? safe_post('ga_monitoring_lain'): NULL,
                'ga_monitoring_lain_1'            => safe_post('ga_monitoring_lain_1') !== '' ? safe_post('ga_monitoring_lain_1'): NULL,
                'ga_monitoring_lain_2'            => safe_post('ga_monitoring_lain_2') !== '' ? safe_post('ga_monitoring_lain_2'): NULL,
                'ga_monitoring_lain_3'            => safe_post('ga_monitoring_lain_3') !== '' ? safe_post('ga_monitoring_lain_3'): NULL,
                'ga_monitoring_lain_4'            => safe_post('ga_monitoring_lain_4') !== '' ? safe_post('ga_monitoring_lain_4'): NULL,

                'ga_tgl_petugas'                  => $ga_tgl_petugas !== '' ? $ga_tgl_petugas : NULL,
                'ga_petugas'                      => safe_post('ga_petugas') !== '' ? safe_post('ga_petugas'): NULL,
                'ga_ttd'                          => safe_post('ga_ttd') !== '' ? safe_post('ga_ttd'): NULL,
                'ga_dokter'                      => safe_post('ga_dokter') !== '' ? safe_post('ga_dokter'): NULL,
                'ga_ttd_dokter'                          => safe_post('ga_ttd_dokter') !== '' ? safe_post('ga_ttd_dokter'): NULL,

                'created_at'                      => $this->datetime,

            );
            $this->db->insert('sm_gizi_anak', $data);
		}

		if ($this->db->trans_status() === false) :
			$this->db->trans_rollback();
			$status  = false;
			$message = 'Gagal simpan form gizi anak';
		else :
			$this->db->trans_commit();
			$status  = true;
			$message = 'Berhasil simpan form gizi anak';
		endif;

		$this->response(array('status' => $status, 'message' => $message), REST_Controller::HTTP_OK);
	}

    function get_gizi_anak_get($id_pendaftaran, $id_layanan)
	{
		$data = [];
		$data['gizi'] = $this->gizi->getGiziAnak($id_pendaftaran);
		if ($data != null) {
			$this->response($data, REST_Controller::HTTP_OK);
		} else {
			$this->response($data, REST_Controller::HTTP_OK);
		}
	}

    function simpan_gizi_dietetik_post()
	{   
        $checkData = safe_post('id_gd');

        $gd_tgl_petugas = safe_post('gd_tgl_petugas');
        if ($gd_tgl_petugas !== '') {
            $gd_tgl_petugas = str_replace('/', '-', $gd_tgl_petugas);
            $gd_tgl_petugas = date('Y-m-d H:i', strtotime($gd_tgl_petugas));
        }

		$this->db->trans_begin();
		if ($checkData != '') {
            $user_log         = $this->session->userdata('id_translucent');
            $created_date_log = $this->datetime;
    
            $sqlLog = "INSERT INTO sm_gizi_dietetik_log (
                            id_gd_lama,id_pendaftaran,id_layanan_pendaftaran,id_pasien,id_users,created_at,updated_at,gd_medis,gd_risiko,gd_kondisi,gd_alergi,gd_alergi_lainnya,
                            gd_makanan,gd_asuhan,gd_bb,gd_lila,gd_tb,gd_tilut,gd_imt,gd_status_gizi,gd_kesulitan,gd_setengah,gd_tigaperempat,gd_penurunan,gd_perubahan,gd_mual,
                            gd_muntah,gd_gangguan,gd_perlu,gd_sering,gd_masalah,gd_diare,gd_konstipati,gd_pendarahan,gd_bersendawa,gd_intoleransi,gd_diet,gd_ngt,gd_dirawat,
                            gd_tigakg,gd_enamkg,gd_penyakit,gd_penyakit_lainnya,gd_laboratorium,gd_klinis,gd_problem,gd_etiologi,gd_gejala,gd_preskripsi,gd_jenis_makanan,
                            gd_energi,gd_lemak,gd_protein,gd_karbohidrat,gd_cairan,gd_route,gd_cara_makan,gd_frekuensi,gd_monitoring,gd_tgl_petugas,gd_petugas,gd_ttd,
                            gd_lemah,gd_dokter,gd_ttd_dokter,created_date_log,user_log,status_log)    
                        SELECT id_gd,id_pendaftaran,id_layanan_pendaftaran,id_pasien,id_users,created_at,updated_at,gd_medis,gd_risiko,gd_kondisi,gd_alergi,gd_alergi_lainnya,
                        gd_makanan,gd_asuhan,gd_bb,gd_lila,gd_tb,gd_tilut,gd_imt,gd_status_gizi,gd_kesulitan,gd_setengah,gd_tigaperempat,gd_penurunan,gd_perubahan,gd_mual,
                        gd_muntah,gd_gangguan,gd_perlu,gd_sering,gd_masalah,gd_diare,gd_konstipati,gd_pendarahan,gd_bersendawa,gd_intoleransi,gd_diet,gd_ngt,gd_dirawat,
                        gd_tigakg,gd_enamkg,gd_penyakit,gd_penyakit_lainnya,gd_laboratorium,gd_klinis,gd_problem,gd_etiologi,gd_gejala,gd_preskripsi,gd_jenis_makanan,
                        gd_energi,gd_lemak,gd_protein,gd_karbohidrat,gd_cairan,gd_route,gd_cara_makan,gd_frekuensi,gd_monitoring,gd_tgl_petugas,gd_petugas,gd_ttd,
                        gd_lemah,gd_dokter,gd_ttd_dokter,'$created_date_log' , '$user_log', 'Edit' from sm_gizi_dietetik where id_gd = " . safe_post('id_gd');
            $this->db->query($sqlLog);

            $data = array(
                'id_gd'                     => safe_post('id_gd'),
                'id_pendaftaran'            => safe_post('id_pendaftaran'),
                'id_layanan_pendaftaran'    => safe_post('id_layanan_pendaftaran'),
				'id_pasien'                 => safe_post('id_pasien'),
                'id_users'                  => safe_post('id_users'),

                'gd_medis'                  => safe_post('gd_medis') !== '' ? safe_post('gd_medis'): NULL,
                'gd_risiko'                 => safe_post('gd_risiko') !== '' ? safe_post('gd_risiko'): NULL,
                'gd_kondisi'                => safe_post('gd_kondisi') !== '' ? safe_post('gd_kondisi'): NULL,
                'gd_alergi'                 => safe_post('gd_alergi') !== '' ? safe_post('gd_alergi'): NULL,
                'gd_alergi_lainnya'         => safe_post('gd_alergi_lainnya') !== '' ? safe_post('gd_alergi_lainnya'): NULL,
                'gd_makanan'                => safe_post('gd_makanan') !== '' ? safe_post('gd_makanan'): NULL,
                'gd_asuhan'                 => safe_post('gd_asuhan') !== '' ? safe_post('gd_asuhan'): NULL,
                'gd_bb'                     => safe_post('gd_bb') !== '' ? safe_post('gd_bb'): NULL,
                'gd_lila'                   => safe_post('gd_lila') !== '' ? safe_post('gd_lila'): NULL,
                'gd_tb'                     => safe_post('gd_tb') !== '' ? safe_post('gd_tb'): NULL,
                'gd_tilut'                  => safe_post('gd_tilut') !== '' ? safe_post('gd_tilut'): NULL,
                'gd_imt'                    => safe_post('gd_imt') !== '' ? safe_post('gd_imt'): NULL,
                'gd_status_gizi'            => safe_post('gd_status_gizi') !== '' ? safe_post('gd_status_gizi'): NULL,
                'gd_kesulitan'              => safe_post('gd_kesulitan') !== '' ? safe_post('gd_kesulitan'): NULL,
                'gd_setengah'               => safe_post('gd_setengah') !== '' ? safe_post('gd_setengah'): NULL,
                'gd_tigaperempat'           => safe_post('gd_tigaperempat') !== '' ? safe_post('gd_tigaperempat'): NULL,
                'gd_penurunan'              => safe_post('gd_penurunan') !== '' ? safe_post('gd_penurunan'): NULL,
                'gd_perubahan'              => safe_post('gd_perubahan') !== '' ? safe_post('gd_perubahan'): NULL,
                'gd_mual'                   => safe_post('gd_mual') !== '' ? safe_post('gd_mual'): NULL,
                'gd_muntah'                 => safe_post('gd_muntah') !== '' ? safe_post('gd_muntah'): NULL,
                'gd_gangguan'               => safe_post('gd_gangguan') !== '' ? safe_post('gd_gangguan'): NULL,
                'gd_perlu'                  => safe_post('gd_perlu') !== '' ? safe_post('gd_perlu'): NULL,
                'gd_sering'                 => safe_post('gd_sering') !== '' ? safe_post('gd_sering'): NULL,
                'gd_masalah'                => safe_post('gd_masalah') !== '' ? safe_post('gd_masalah'): NULL,
                'gd_diare'                  => safe_post('gd_diare') !== '' ? safe_post('gd_diare'): NULL,
                'gd_konstipati'             => safe_post('gd_konstipati') !== '' ? safe_post('gd_konstipati'): NULL,
                'gd_pendarahan'             => safe_post('gd_pendarahan') !== '' ? safe_post('gd_pendarahan'): NULL,
                'gd_bersendawa'             => safe_post('gd_bersendawa') !== '' ? safe_post('gd_bersendawa'): NULL,
                'gd_intoleransi'            => safe_post('gd_intoleransi') !== '' ? safe_post('gd_intoleransi'): NULL,
                'gd_diet'                   => safe_post('gd_diet') !== '' ? safe_post('gd_diet'): NULL,
                'gd_lemah'                  => safe_post('gd_lemah') !== '' ? safe_post('gd_lemah'): NULL,
                'gd_ngt'                    => safe_post('gd_ngt') !== '' ? safe_post('gd_ngt'): NULL,
                'gd_dirawat'                => safe_post('gd_dirawat') !== '' ? safe_post('gd_dirawat'): NULL,
                'gd_tigakg'                 => safe_post('gd_tigakg') !== '' ? safe_post('gd_tigakg'): NULL,
                'gd_enamkg'                 => safe_post('gd_enamkg') !== '' ? safe_post('gd_enamkg'): NULL,
                'gd_penyakit'               => safe_post('gd_penyakit') !== '' ? safe_post('gd_penyakit'): NULL,
                'gd_penyakit_lainnya'       => safe_post('gd_penyakit_lainnya') !== '' ? safe_post('gd_penyakit_lainnya'): NULL,
                'gd_laboratorium'           => safe_post('gd_laboratorium') !== '' ? safe_post('gd_laboratorium'): NULL,
                'gd_klinis'                 => safe_post('gd_klinis') !== '' ? safe_post('gd_klinis'): NULL,

                // DIAGNOSIS GIZI
                'gd_problem'                => safe_post('gd_problem') !== '' ? safe_post('gd_problem'): NULL,
                'gd_etiologi'               => safe_post('gd_etiologi') !== '' ? safe_post('gd_etiologi'): NULL,
                'gd_gejala'                 => safe_post('gd_gejala') !== '' ? safe_post('gd_gejala'): NULL,
                'gd_preskripsi'             => safe_post('gd_preskripsi') !== '' ? safe_post('gd_preskripsi'): NULL,

                // INTERVENSI GIZI
                'gd_jenis_makanan'          => safe_post('gd_jenis_makanan') !== '' ? safe_post('gd_jenis_makanan'): NULL,
                'gd_energi'                 => safe_post('gd_energi') !== '' ? safe_post('gd_energi'): NULL,
                'gd_lemak'                  => safe_post('gd_lemak') !== '' ? safe_post('gd_lemak'): NULL,
                'gd_protein'                => safe_post('gd_protein') !== '' ? safe_post('gd_protein'): NULL,
                'gd_karbohidrat'            => safe_post('gd_karbohidrat') !== '' ? safe_post('gd_karbohidrat'): NULL,
                'gd_cairan'                 => safe_post('gd_cairan') !== '' ? safe_post('gd_cairan'): NULL,
                'gd_route'                  => safe_post('gd_route') !== '' ? safe_post('gd_route'): NULL,
                'gd_cara_makan'             => safe_post('gd_cara_makan') !== '' ? safe_post('gd_cara_makan'): NULL,
                'gd_frekuensi'              => safe_post('gd_frekuensi') !== '' ? safe_post('gd_frekuensi'): NULL,

                // MONITORING DAN EVALUASI
                'gd_monitoring'             => safe_post('gd_monitoring') !== '' ? safe_post('gd_monitoring'): NULL,

                'gd_tgl_petugas'            => $gd_tgl_petugas !== '' ? $gd_tgl_petugas : NULL,
                'gd_petugas'                => safe_post('gd_petugas') !== '' ? safe_post('gd_petugas'): NULL,
                'gd_ttd'                    => safe_post('gd_ttd') !== '' ? safe_post('gd_ttd'): NULL,
                'gd_dokter'                => safe_post('gd_dokter') !== '' ? safe_post('gd_dokter'): NULL,
                'gd_ttd_dokter'                    => safe_post('gd_ttd_dokter') !== '' ? safe_post('gd_ttd_dokter'): NULL,

                'updated_at'                => $this->datetime,
            );
            $this->db->where('id_gd', safe_post('id_gd'));
			$this->db->update('sm_gizi_dietetik', $data);
		} else {
			$data = array(
                'id_pendaftaran'            => safe_post('id_pendaftaran'),
                'id_layanan_pendaftaran'    => safe_post('id_layanan_pendaftaran'),
				'id_pasien'                 => safe_post('id_pasien'),
                'id_users'                  => safe_post('id_users'),

                'gd_medis'                  => safe_post('gd_medis') !== '' ? safe_post('gd_medis'): NULL,
                'gd_risiko'                 => safe_post('gd_risiko') !== '' ? safe_post('gd_risiko'): NULL,
                'gd_kondisi'                => safe_post('gd_kondisi') !== '' ? safe_post('gd_kondisi'): NULL,
                'gd_alergi'                 => safe_post('gd_alergi') !== '' ? safe_post('gd_alergi'): NULL,
                'gd_alergi_lainnya'         => safe_post('gd_alergi_lainnya') !== '' ? safe_post('gd_alergi_lainnya'): NULL,
                'gd_makanan'                => safe_post('gd_makanan') !== '' ? safe_post('gd_makanan'): NULL,
                'gd_asuhan'                 => safe_post('gd_asuhan') !== '' ? safe_post('gd_asuhan'): NULL,
                'gd_bb'                     => safe_post('gd_bb') !== '' ? safe_post('gd_bb'): NULL,
                'gd_lila'                   => safe_post('gd_lila') !== '' ? safe_post('gd_lila'): NULL,
                'gd_tb'                     => safe_post('gd_tb') !== '' ? safe_post('gd_tb'): NULL,
                'gd_tilut'                  => safe_post('gd_tilut') !== '' ? safe_post('gd_tilut'): NULL,
                'gd_imt'                    => safe_post('gd_imt') !== '' ? safe_post('gd_imt'): NULL,
                'gd_status_gizi'            => safe_post('gd_status_gizi') !== '' ? safe_post('gd_status_gizi'): NULL,
                'gd_kesulitan'              => safe_post('gd_kesulitan') !== '' ? safe_post('gd_kesulitan'): NULL,
                'gd_setengah'               => safe_post('gd_setengah') !== '' ? safe_post('gd_setengah'): NULL,
                'gd_tigaperempat'           => safe_post('gd_tigaperempat') !== '' ? safe_post('gd_tigaperempat'): NULL,
                'gd_penurunan'              => safe_post('gd_penurunan') !== '' ? safe_post('gd_penurunan'): NULL,
                'gd_perubahan'              => safe_post('gd_perubahan') !== '' ? safe_post('gd_perubahan'): NULL,
                'gd_mual'                   => safe_post('gd_mual') !== '' ? safe_post('gd_mual'): NULL,
                'gd_muntah'                 => safe_post('gd_muntah') !== '' ? safe_post('gd_muntah'): NULL,
                'gd_gangguan'               => safe_post('gd_gangguan') !== '' ? safe_post('gd_gangguan'): NULL,
                'gd_perlu'                  => safe_post('gd_perlu') !== '' ? safe_post('gd_perlu'): NULL,
                'gd_sering'                 => safe_post('gd_sering') !== '' ? safe_post('gd_sering'): NULL,
                'gd_masalah'                => safe_post('gd_masalah') !== '' ? safe_post('gd_masalah'): NULL,
                'gd_diare'                  => safe_post('gd_diare') !== '' ? safe_post('gd_diare'): NULL,
                'gd_konstipati'             => safe_post('gd_konstipati') !== '' ? safe_post('gd_konstipati'): NULL,
                'gd_pendarahan'             => safe_post('gd_pendarahan') !== '' ? safe_post('gd_pendarahan'): NULL,
                'gd_bersendawa'             => safe_post('gd_bersendawa') !== '' ? safe_post('gd_bersendawa'): NULL,
                'gd_intoleransi'            => safe_post('gd_intoleransi') !== '' ? safe_post('gd_intoleransi'): NULL,
                'gd_diet'                   => safe_post('gd_diet') !== '' ? safe_post('gd_diet'): NULL,
                'gd_lemah'                   => safe_post('gd_lemah') !== '' ? safe_post('gd_lemah'): NULL,
                'gd_ngt'                    => safe_post('gd_ngt') !== '' ? safe_post('gd_ngt'): NULL,
                'gd_dirawat'                => safe_post('gd_dirawat') !== '' ? safe_post('gd_dirawat'): NULL,
                'gd_tigakg'                 => safe_post('gd_tigakg') !== '' ? safe_post('gd_tigakg'): NULL,
                'gd_enamkg'                 => safe_post('gd_enamkg') !== '' ? safe_post('gd_enamkg'): NULL,
                'gd_penyakit'               => safe_post('gd_penyakit') !== '' ? safe_post('gd_penyakit'): NULL,
                'gd_penyakit_lainnya'       => safe_post('gd_penyakit_lainnya') !== '' ? safe_post('gd_penyakit_lainnya'): NULL,
                'gd_laboratorium'           => safe_post('gd_laboratorium') !== '' ? safe_post('gd_laboratorium'): NULL,
                'gd_klinis'                 => safe_post('gd_klinis') !== '' ? safe_post('gd_klinis'): NULL,

                // DIAGNOSIS GIZI
                'gd_problem'                => safe_post('gd_problem') !== '' ? safe_post('gd_problem'): NULL,
                'gd_etiologi'               => safe_post('gd_etiologi') !== '' ? safe_post('gd_etiologi'): NULL,
                'gd_gejala'                 => safe_post('gd_gejala') !== '' ? safe_post('gd_gejala'): NULL,
                'gd_preskripsi'             => safe_post('gd_preskripsi') !== '' ? safe_post('gd_preskripsi'): NULL,

                // INTERVENSI GIZI
                'gd_jenis_makanan'          => safe_post('gd_jenis_makanan') !== '' ? safe_post('gd_jenis_makanan'): NULL,
                'gd_energi'                 => safe_post('gd_energi') !== '' ? safe_post('gd_energi'): NULL,
                'gd_lemak'                  => safe_post('gd_lemak') !== '' ? safe_post('gd_lemak'): NULL,
                'gd_protein'                => safe_post('gd_protein') !== '' ? safe_post('gd_protein'): NULL,
                'gd_karbohidrat'            => safe_post('gd_karbohidrat') !== '' ? safe_post('gd_karbohidrat'): NULL,
                'gd_cairan'                 => safe_post('gd_cairan') !== '' ? safe_post('gd_cairan'): NULL,
                'gd_route'                  => safe_post('gd_route') !== '' ? safe_post('gd_route'): NULL,
                'gd_cara_makan'             => safe_post('gd_cara_makan') !== '' ? safe_post('gd_cara_makan'): NULL,
                'gd_frekuensi'              => safe_post('gd_frekuensi') !== '' ? safe_post('gd_frekuensi'): NULL,

                // MONITORING DAN EVALUASI
                'gd_monitoring'             => safe_post('gd_monitoring') !== '' ? safe_post('gd_monitoring'): NULL,

                'gd_tgl_petugas'            => $gd_tgl_petugas !== '' ? $gd_tgl_petugas : NULL,
                'gd_petugas'                => safe_post('gd_petugas') !== '' ? safe_post('gd_petugas'): NULL,
                'gd_ttd'                    => safe_post('gd_ttd') !== '' ? safe_post('gd_ttd'): NULL,
                'gd_dokter'                => safe_post('gd_dokter') !== '' ? safe_post('gd_dokter'): NULL,
                'gd_ttd_dokter'                    => safe_post('gd_ttd_dokter') !== '' ? safe_post('gd_ttd_dokter'): NULL,

                'created_at'                => $this->datetime,

            );
            $this->db->insert('sm_gizi_dietetik', $data);
		}

		if ($this->db->trans_status() === false) :
			$this->db->trans_rollback();
			$status  = false;
			$message = 'Gagal simpan form gizi dietetik';
		else :
			$this->db->trans_commit();
			$status  = true;
			$message = 'Berhasil simpan form gizi dietetik';
		endif;

		$this->response(array('status' => $status, 'message' => $message), REST_Controller::HTTP_OK);
	}

    function get_gizi_dietetik_get($id_pendaftaran, $id_layanan)
	{
		$data = [];
		$data['dietetik'] = $this->gizi->getGiziDietetik($id_pendaftaran);
		if ($data != null) {
			$this->response($data, REST_Controller::HTTP_OK);
		} else {
			$this->response($data, REST_Controller::HTTP_OK);
		}
	}

    function simpan_konsultasi_gizi_post()
	{   
        $checkData = safe_post('id_kg');

        $kg_tgl_petugas = safe_post('kg_tgl_petugas');
        if ($kg_tgl_petugas !== '') {
            $kg_tgl_petugas = str_replace('/', '-', $kg_tgl_petugas);
            $kg_tgl_petugas = date('Y-m-d H:i', strtotime($kg_tgl_petugas));
        }


		$this->db->trans_begin();
		if ($checkData != '') {
            $data = array(
                'id_kg'                     => safe_post('id_kg'),
                'id_pendaftaran'            => safe_post('id_pendaftaran'),
                'id_layanan_pendaftaran'    => safe_post('id_layanan_pendaftaran'),
				'id_pasien'                 => safe_post('id_pasien'),
                'id_users'                  => safe_post('id_users'),

                'kg_bb'                     => safe_post('kg_bb') !== '' ? safe_post('kg_bb'): NULL,
                'kg_lla'                    => safe_post('kg_lla') !== '' ? safe_post('kg_lla'): NULL,
                'kg_pbb'                    => safe_post('kg_pbb') !== '' ? safe_post('kg_pbb'): NULL,
                'kg_tb'                     => safe_post('kg_tb') !== '' ? safe_post('kg_tb'): NULL,
                'kg_imt'                    => safe_post('kg_imt') !== '' ? safe_post('kg_imt'): NULL,
                'kg_biokimia'               => safe_post('kg_biokimia') !== '' ? safe_post('kg_biokimia'): NULL,
                'kg_klinis'                 => safe_post('kg_klinis') !== '' ? safe_post('kg_klinis'): NULL,
                'kg_gizi'                   => safe_post('kg_gizi') !== '' ? safe_post('kg_gizi'): NULL,
                'kg_personal'               => safe_post('kg_personal') !== '' ? safe_post('kg_personal'): NULL,
                'kg_diagnosis'              => safe_post('kg_diagnosis') !== '' ? safe_post('kg_diagnosis'): NULL,
                'kg_tujuan'                 => safe_post('kg_tujuan') !== '' ? safe_post('kg_tujuan'): NULL,
                'kg_intervensi'             => safe_post('kg_intervensi') !== '' ? safe_post('kg_intervensi'): NULL,
                'kg_konseling'              => safe_post('kg_konseling') !== '' ? safe_post('kg_konseling'): NULL,
                'kg_evaluasi'               => safe_post('kg_evaluasi') !== '' ? safe_post('kg_evaluasi'): NULL,

                // petugas
                'kg_tgl_petugas'            => $kg_tgl_petugas !== '' ? $kg_tgl_petugas : NULL,
                'kg_petugas'                => safe_post('kg_petugas') !== '' ? safe_post('kg_petugas'): NULL,
                'kg_ttd'                    => safe_post('kg_ttd') !== '' ? safe_post('kg_ttd'): NULL,
                'kg_dokter'                => safe_post('kg_dokter') !== '' ? safe_post('kg_dokter'): NULL,
                'kg_ttd_dokter'                    => safe_post('kg_ttd_dokter') !== '' ? safe_post('kg_ttd_dokter'): NULL,

                'updated_at'                => $this->datetime,
            );
            $this->db->where('id_kg', safe_post('id_kg'));
			$this->db->update('sm_konsultasi_gizi', $data);
		} else {
			$data = array(
                'id_pendaftaran'            => safe_post('id_pendaftaran'),
                'id_layanan_pendaftaran'    => safe_post('id_layanan_pendaftaran'),
				'id_pasien'                 => safe_post('id_pasien'),
                'id_users'                  => safe_post('id_users'),

                'kg_bb'                     => safe_post('kg_bb') !== '' ? safe_post('kg_bb'): NULL,
                'kg_lla'                    => safe_post('kg_lla') !== '' ? safe_post('kg_lla'): NULL,
                'kg_pbb'                    => safe_post('kg_pbb') !== '' ? safe_post('kg_pbb'): NULL,
                'kg_tb'                     => safe_post('kg_tb') !== '' ? safe_post('kg_tb'): NULL,
                'kg_imt'                    => safe_post('kg_imt') !== '' ? safe_post('kg_imt'): NULL,
                'kg_biokimia'               => safe_post('kg_biokimia') !== '' ? safe_post('kg_biokimia'): NULL,
                'kg_klinis'                 => safe_post('kg_klinis') !== '' ? safe_post('kg_klinis'): NULL,
                'kg_gizi'                   => safe_post('kg_gizi') !== '' ? safe_post('kg_gizi'): NULL,
                'kg_personal'               => safe_post('kg_personal') !== '' ? safe_post('kg_personal'): NULL,
                'kg_diagnosis'              => safe_post('kg_diagnosis') !== '' ? safe_post('kg_diagnosis'): NULL,
                'kg_tujuan'                 => safe_post('kg_tujuan') !== '' ? safe_post('kg_tujuan'): NULL,
                'kg_intervensi'             => safe_post('kg_intervensi') !== '' ? safe_post('kg_intervensi'): NULL,
                'kg_konseling'              => safe_post('kg_konseling') !== '' ? safe_post('kg_konseling'): NULL,
                'kg_evaluasi'               => safe_post('kg_evaluasi') !== '' ? safe_post('kg_evaluasi'): NULL,

                // petugas
                'kg_tgl_petugas'            => $kg_tgl_petugas !== '' ? $kg_tgl_petugas : NULL,
                'kg_petugas'                => safe_post('kg_petugas') !== '' ? safe_post('kg_petugas'): NULL,
                'kg_ttd'                    => safe_post('kg_ttd') !== '' ? safe_post('kg_ttd'): NULL,
                'kg_dokter'                => safe_post('kg_dokter') !== '' ? safe_post('kg_dokter'): NULL,
                'kg_ttd_dokter'                    => safe_post('kg_ttd_dokter') !== '' ? safe_post('kg_ttd_dokter'): NULL,

                'created_at'                => $this->datetime,

            );
            $this->db->insert('sm_konsultasi_gizi', $data);
		}

		if ($this->db->trans_status() === false) :
			$this->db->trans_rollback();
			$status  = false;
			$message = 'Gagal simpan form gizi dietetik';
		else :
			$this->db->trans_commit();
			$status  = true;
			$message = 'Berhasil simpan form gizi dietetik';
		endif;

		$this->response(array('status' => $status, 'message' => $message), REST_Controller::HTTP_OK);
	}

    function get_konsultasi_gizi_get($id_pendaftaran, $id_layanan)
	{
		$data = [];
		$data['konsul'] = $this->gizi->getKonsulGizi($id_pendaftaran);
		if ($data != null) {
			$this->response($data, REST_Controller::HTTP_OK);
		} else {
			$this->response($data, REST_Controller::HTTP_OK);
		}
	}

    // dpmp New
    function simpan_dpmp_2_post()
    {
        if (!safe_post('id_layanan_pendaftaran')) :
            $this->response(array('status' => false, 'message' => 'Parameter tidak lengkap'), REST_Controller::HTTP_BAD_REQUEST);
        endif;

        $layanan = array('id' => safe_post('id_layanan_pendaftaran'));       
        $pilih_diet = safe_post('dpmp_pd');
        
        $data_dpmp = array(
            'id'                        => safe_post('id_dpmp'),
            'id_layanan_pendaftaran'    => $layanan['id'],
            'dpmp_waktu'                => (safe_post('dpmp_waktu') !== '' ? datetime2mysql(safe_post('dpmp_waktu')) : NULL),
            'dpmp_profesi'              => safe_post('dpmp_profesi') !== '' ? safe_post('dpmp_profesi') : NULL,
            'dpmp_nadis'                => safe_post('dpmp_nadis') !== '' ? safe_post('dpmp_nadis') : NULL,
            'dpmp_ttd_nadis'            => safe_post('dpmp_ttd_nadis') !== '' ? safe_post('dpmp_ttd_nadis') : NULL,
            'dpmp_status_ruang'         => safe_post('dpmp_status_ruang') !== '' ? safe_post('dpmp_status_ruang') : NULL,
            'dpmp_mp'                   => safe_post('dpmp_mp') !== '' ? safe_post('dpmp_mp') : NULL,
            'dpmp_sp'                   => safe_post('dpmp_sp') !== '' ? safe_post('dpmp_sp') : NULL,
            'dpmp_ms'                   => safe_post('dpmp_ms') !== '' ? safe_post('dpmp_ms') : NULL,
            'dpmp_ss'                   => safe_post('dpmp_ss') !== '' ? safe_post('dpmp_ss') : NULL,
            'dpmp_mm'                   => safe_post('dpmp_mm') !== '' ? safe_post('dpmp_mm') : NULL,
            'dpmp_sm'                   => safe_post('dpmp_sm') !== '' ? safe_post('dpmp_sm') : NULL,
            'dpmp_ket'                  => safe_post('dpmp_ket') !== '' ? safe_post('dpmp_ket') : NULL,
            'dpmp_pd'                   => $pilih_diet !== '' ? $pilih_diet : NULL,
            'dpmp_print'                => '1'
        );

        if ($data_dpmp['id'] !== ''){
            $data_dpmp['updated_date'] = $this->datetime;
            $data_dpmp['updated_user'] = $this->session->userdata('id_translucent');
            
            $this->db->where('id', $data_dpmp['id'], true)->update('sm_dpmp_2', $data_dpmp);
            $idDPMP = $data_dpmp['id'];
        } else {
            unset($data_dpmp['id']);
            $data_dpmp['created_date'] = $this->datetime;
            $data_dpmp['id_user'] = $this->session->userdata('id_translucent');

            $this->db->insert('sm_dpmp_2', $data_dpmp);
            $idDPMP = $this->db->insert_id();
        }
        
        if ($pilih_diet === '1') {
            $data_dm = array(
                'id'                        => safe_post('id_dm'),
                'id_layanan_pendaftaran'    => $layanan['id'],
                'id_dpmp'                   => $idDPMP,
                
                'dm_biasa'                  => safe_post('dm_biasa') !== '' ? safe_post('dm_biasa') : NULL,
                'dm_p'                      => safe_post('dm_p') !== '' ? safe_post('dm_p') : NULL,
                'dm_rs'                     => safe_post('dm_rs') !== '' ? safe_post('dm_rs') : NULL,
                'dm_cr'                     => safe_post('dm_cr') !== '' ? safe_post('dm_cr') : NULL,
                'dm_rg'                     => safe_post('dm_rg') !== '' ? safe_post('dm_rg') : NULL,
                'dm_sd'                     => safe_post('dm_sd') !== '' ? safe_post('dm_sd') : NULL,
                'dm_dm'                     => safe_post('dm_dm') !== '' ? safe_post('dm_dm') : NULL,
                'dm_rk'                     => safe_post('dm_rk') !== '' ? safe_post('dm_rk') : NULL,
                'dm_tk'                     => safe_post('dm_tk') !== '' ? safe_post('dm_tk') : NULL,
                'dm_dh'                     => safe_post('dm_dh') !== '' ? safe_post('dm_dh') : NULL,
                'dm_rl'                     => safe_post('dm_rl') !== '' ? safe_post('dm_rl') : NULL,
                'dm_tktp'                   => safe_post('dm_tktp') !== '' ? safe_post('dm_tktp') : NULL,
                'dm_dj'                     => safe_post('dm_dj') !== '' ? safe_post('dm_dj') : NULL,
                'dm_rp'                     => safe_post('dm_rp') !== '' ? safe_post('dm_rp') : NULL,
                'dm_ts'                     => safe_post('dm_ts') !== '' ? safe_post('dm_ts') : NULL,
                'dm_dl'                     => safe_post('dm_dl') !== '' ? safe_post('dm_dl') : NULL,
                'dm_rpn'                    => safe_post('dm_rpn') !== '' ? safe_post('dm_rpn') : NULL,

                'dm_jd_mp'                  => safe_post('dm_jd_mp') !== '' ? safe_post('dm_jd_mp') : NULL,
                'dm_bm_mp'                  => safe_post('dm_bm_mp') !== '' ? safe_post('dm_bm_mp') : NULL,
                'dm_jd_sp'                  => safe_post('dm_jd_sp') !== '' ? safe_post('dm_jd_sp') : NULL,
                'dm_bm_sp'                  => safe_post('dm_bm_sp') !== '' ? safe_post('dm_bm_sp') : NULL,
                'dm_jd_ms'                  => safe_post('dm_jd_ms') !== '' ? safe_post('dm_jd_ms') : NULL,
                'dm_bm_ms'                  => safe_post('dm_bm_ms') !== '' ? safe_post('dm_bm_ms') : NULL,
                'dm_jd_ss'                  => safe_post('dm_jd_ss') !== '' ? safe_post('dm_jd_ss') : NULL,
                'dm_bm_ss'                  => safe_post('dm_bm_ss') !== '' ? safe_post('dm_bm_ss') : NULL,
                'dm_jd_mm'                  => safe_post('dm_jd_mm') !== '' ? safe_post('dm_jd_mm') : NULL,
                'dm_bm_mm'                  => safe_post('dm_bm_mm') !== '' ? safe_post('dm_bm_mm') : NULL,
                'dm_jd_sm'                  => safe_post('dm_jd_sm') !== '' ? safe_post('dm_jd_sm') : NULL,
                'dm_bm_sm'                  => safe_post('dm_bm_sm') !== '' ? safe_post('dm_bm_sm') : NULL,
            );
            

            if ($data_dm['id'] !== ''){
                $data_dm['updated_date'] = $this->datetime;
                $data_dm['updated_user'] = $this->session->userdata('id_translucent');
                
                $this->db->where('id', $data_dm['id'], true)->update('sm_diet_makan', $data_dm);
            } else {
                unset($data_dm['id']);
                $data_dm['created_date'] = $this->datetime;
                $data_dm['id_user'] = $this->session->userdata('id_translucent');

                $this->db->insert('sm_diet_makan', $data_dm);
            }
        }

        if ($pilih_diet === '2') {
            $data_dc = array(
                'id'                        => safe_post('id_dc'),
                'id_layanan_pendaftaran'    => $layanan['id'],
                'id_dpmp'                   => $idDPMP,
                
                'dc_diet'                   => safe_post('dc_diet') !== '' ? safe_post('dc_diet') : NULL,
                'dc_item'                   => safe_post('dc_item') !== '' ? safe_post('dc_item') : NULL,
                'dc_jam_1'                  => safe_post('dc_jam_1') !== '' ? safe_post('dc_jam_1') : NULL,
                'dc_jam_2'                  => safe_post('dc_jam_2') !== '' ? safe_post('dc_jam_2') : NULL,
                'dc_jam_3'                  => safe_post('dc_jam_3') !== '' ? safe_post('dc_jam_3') : NULL,
                'dc_jam_4'                  => safe_post('dc_jam_4') !== '' ? safe_post('dc_jam_4') : NULL,
                'dc_jam_5'                  => safe_post('dc_jam_5') !== '' ? safe_post('dc_jam_5') : NULL,
                'dc_jam_6'                  => safe_post('dc_jam_6') !== '' ? safe_post('dc_jam_6') : NULL,
                'dc_jam_7'                  => safe_post('dc_jam_7') !== '' ? safe_post('dc_jam_7') : NULL,
                'dc_jam_8'                  => safe_post('dc_jam_8') !== '' ? safe_post('dc_jam_8') : NULL,
                'dc_keterangan'             => safe_post('dc_keterangan') !== '' ? safe_post('dc_keterangan') : NULL,
                'dc_gram'                   => safe_post('dc_gram') !== '' ? safe_post('dc_gram') : NULL,
                'dc_mp'                     => safe_post('dc_mp') !== '' ? safe_post('dc_mp') : NULL,
                'dc_ms'                     => safe_post('dc_ms') !== '' ? safe_post('dc_ms') : NULL,
                'dc_mm'                     => safe_post('dc_mm') !== '' ? safe_post('dc_mm') : NULL,
                'dc_sp'                     => safe_post('dc_sp') !== '' ? safe_post('dc_sp') : NULL,
                'dc_ss'                     => safe_post('dc_ss') !== '' ? safe_post('dc_ss') : NULL,
                'dc_sm'                     => safe_post('dc_sm') !== '' ? safe_post('dc_sm') : NULL,
            );
            
            if ($data_dc['id'] !== ''){
                $data_dc['updated_date'] = $this->datetime;
                $data_dc['updated_user'] = $this->session->userdata('id_translucent');
                
                $this->db->where('id', $data_dc['id'], true)->update('sm_diet_cair_2', $data_dc);
            } else {
                unset($data_dc['id']);
                $data_dc['created_date'] = $this->datetime;
                $data_dc['id_user'] = $this->session->userdata('id_translucent');

                $this->db->insert('sm_diet_cair_2', $data_dc);
            }
        }

        if ($pilih_diet === '3') {
            $data_ds = array(
                'id'                        => safe_post('id_ds'),
                'id_layanan_pendaftaran'    => $layanan['id'],
                'id_dpmp'                   => $idDPMP,
                
                'ds_biasa'                  => safe_post('ds_biasa') !== '' ? safe_post('ds_biasa') : NULL,
                'ds_p'                      => safe_post('ds_p') !== '' ? safe_post('ds_p') : NULL,
                'ds_rs'                     => safe_post('ds_rs') !== '' ? safe_post('ds_rs') : NULL,
                'ds_cr'                     => safe_post('ds_cr') !== '' ? safe_post('ds_cr') : NULL,
                'ds_rg'                     => safe_post('ds_rg') !== '' ? safe_post('ds_rg') : NULL,
                'ds_sd'                     => safe_post('ds_sd') !== '' ? safe_post('ds_sd') : NULL,
                'ds_dm'                     => safe_post('ds_dm') !== '' ? safe_post('ds_dm') : NULL,
                'ds_rk'                     => safe_post('ds_rk') !== '' ? safe_post('ds_rk') : NULL,
                'ds_tk'                     => safe_post('ds_tk') !== '' ? safe_post('ds_tk') : NULL,
                'ds_dh'                     => safe_post('ds_dh') !== '' ? safe_post('ds_dh') : NULL,
                'ds_rl'                     => safe_post('ds_rl') !== '' ? safe_post('ds_rl') : NULL,
                'ds_tktp'                   => safe_post('ds_tktp') !== '' ? safe_post('ds_tktp') : NULL,
                'ds_dj'                     => safe_post('ds_dj') !== '' ? safe_post('ds_dj') : NULL,
                'ds_rp'                     => safe_post('ds_rp') !== '' ? safe_post('ds_rp') : NULL,
                'ds_ts'                     => safe_post('ds_ts') !== '' ? safe_post('ds_ts') : NULL,
                'ds_dl'                     => safe_post('ds_dl') !== '' ? safe_post('ds_dl') : NULL,
                'ds_rpn'                    => safe_post('ds_rpn') !== '' ? safe_post('ds_rpn') : NULL,
                
                'ds_jd_mp'                  => safe_post('ds_jd_mp') !== '' ? safe_post('ds_jd_mp') : NULL,
                'ds_bm_mp'                  => safe_post('ds_bm_mp') !== '' ? safe_post('ds_bm_mp') : NULL,
                'ds_jd_sp'                  => safe_post('ds_jd_sp') !== '' ? safe_post('ds_jd_sp') : NULL,
                'ds_bm_sp'                  => safe_post('ds_bm_sp') !== '' ? safe_post('ds_bm_sp') : NULL,
                'ds_jd_ms'                  => safe_post('ds_jd_ms') !== '' ? safe_post('ds_jd_ms') : NULL,
                'ds_bm_ms'                  => safe_post('ds_bm_ms') !== '' ? safe_post('ds_bm_ms') : NULL,
                'ds_jd_ss'                  => safe_post('ds_jd_ss') !== '' ? safe_post('ds_jd_ss') : NULL,
                'ds_bm_ss'                  => safe_post('ds_bm_ss') !== '' ? safe_post('ds_bm_ss') : NULL,
                'ds_jd_mm'                  => safe_post('ds_jd_mm') !== '' ? safe_post('ds_jd_mm') : NULL,
                'ds_bm_mm'                  => safe_post('ds_bm_mm') !== '' ? safe_post('ds_bm_mm') : NULL,
                'ds_jd_sm'                  => safe_post('ds_jd_sm') !== '' ? safe_post('ds_jd_sm') : NULL,
                'ds_bm_sm'                  => safe_post('ds_bm_sm') !== '' ? safe_post('ds_bm_sm') : NULL,
                
                'ds_diet'                   => safe_post('ds_diet') !== '' ? safe_post('ds_diet') : NULL,
                'ds_item'                   => safe_post('ds_item') !== '' ? safe_post('ds_item') : NULL,
                
                'ds_jam_1'                  => safe_post('ds_jam_1') !== '' ? safe_post('ds_jam_1') : NULL,
                'ds_jam_2'                  => safe_post('ds_jam_2') !== '' ? safe_post('ds_jam_2') : NULL,
                'ds_jam_3'                  => safe_post('ds_jam_3') !== '' ? safe_post('ds_jam_3') : NULL,
                'ds_jam_4'                  => safe_post('ds_jam_4') !== '' ? safe_post('ds_jam_4') : NULL,
                'ds_jam_5'                  => safe_post('ds_jam_5') !== '' ? safe_post('ds_jam_5') : NULL,
                'ds_jam_6'                  => safe_post('ds_jam_6') !== '' ? safe_post('ds_jam_6') : NULL,
                'ds_jam_7'                  => safe_post('ds_jam_7') !== '' ? safe_post('ds_jam_7') : NULL,
                'ds_jam_8'                  => safe_post('ds_jam_8') !== '' ? safe_post('ds_jam_8') : NULL,
                'ds_keterangan'             => safe_post('ds_keterangan') !== '' ? safe_post('ds_keterangan') : NULL,
                'ds_gram'                   => safe_post('ds_gram') !== '' ? safe_post('ds_gram') : NULL,
                
                'ds_mp'                     => safe_post('ds_mp') !== '' ? safe_post('ds_mp') : NULL,
                'ds_ms'                     => safe_post('ds_ms') !== '' ? safe_post('ds_ms') : NULL,
                'ds_mm'                     => safe_post('ds_mm') !== '' ? safe_post('ds_mm') : NULL,
                'ds_sp'                     => safe_post('ds_sp') !== '' ? safe_post('ds_sp') : NULL,
                'ds_ss'                     => safe_post('ds_ss') !== '' ? safe_post('ds_ss') : NULL,
                'ds_sm'                     => safe_post('ds_sm') !== '' ? safe_post('ds_sm') : NULL,
            );

            if ($data_ds['id'] !== ''){
                $data_ds['updated_date'] = $this->datetime;
                $data_ds['updated_user'] = $this->session->userdata('id_translucent');
                
                $this->db->where('id', $data_ds['id'], true)->update('sm_diet_sharing', $data_ds);
            } else {
                unset($data_ds['id']);
                $data_ds['created_date'] = $this->datetime;
                $data_ds['id_user'] = $this->session->userdata('id_translucent');

                $this->db->insert('sm_diet_sharing', $data_ds);
            }
        }

        if ($this->db->trans_status() === false) :
            $this->db->trans_rollback();
            $status = false;
            $pesan = 'Entri Data DPMP Gagal';
        else :
            $this->db->trans_commit();
            $status = true;
            $pesan = 'Entri Data DPMP Berhasil';
        endif;

        $message = array(
            'status' => $status,
            'pesan'  => $pesan, 
            'token'  => $this->security->get_csrf_hash(),
            'id'     => $layanan['id'],
        );

        $this->response($message, REST_Controller::HTTP_OK);

    }

    function get_list_dpmp_2_get()
    {
        if (!$this->get('page', true)) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
        endif;
        $limit = 5;
        $start  = ($this->get('page') - 1) * $limit;
        $search = [
            'keyword' => safe_get('keyword'),
            'waktu' => date2mysql(safe_get('waktu')),
            'id_layanan_pendaftaran'  => $this->get('id_layanan_pendaftaran', true),
        ];
        
        $data            = $this->gizi->getListDataDPMP2($limit, $start, $search);
        $data['page']    = (int) $this->get('page');
        $data['limit']   = $limit;

        if ($data) :
            $this->response($data, REST_Controller::HTTP_OK); // (200)
        endif;
    }

    function simpan_ceklist_2_post()
    {

        if (safe_post('id_layanan') === '' | safe_post('id') === '') :
            $response = array('status' => false, 'message' => 'Parameter tidak lengkap, silahkan hubungi bagian IT.');
            $this->response($response, REST_Controller::HTTP_OK);
        endif;

        $id = safe_post('id');
        $id_layanan = safe_post('id_layanan');
        
        $status = 1;

        $update = ["ceklist" => $status];
        
        $data = $this->db->where('id', $id)->update('sm_dpmp_2', $update);

        if ($this->db->trans_status() === false) :
            $this->db->trans_rollback();
            $status = false;
            $pesan = 'Ceklist DPMP Gagal';
        else :
            $this->db->trans_commit();
            $status = true;
            $pesan = 'Ceklist DPMP Berhasil';
        endif;

        $message = array(
            'status' => $status,
            'pesan'  => $pesan, 
            'token'  => $this->security->get_csrf_hash(),
            'id'     => $id_layanan,
        );

        $this->response($message, REST_Controller::HTTP_OK);

    }

    function batal_ceklist_2_post()
    {

        if (safe_post('id_layanan') === '' | safe_post('id') === '') :
            $response = array('status' => false, 'message' => 'Parameter tidak lengkap, silahkan hubungi bagian IT.');
            $this->response($response, REST_Controller::HTTP_OK);
        endif;

        $id = safe_post('id');
        $id_layanan = safe_post('id_layanan');
        
        $status = null;

        $update = ["ceklist" => $status];
        
        $data = $this->db->where('id', $id)->update('sm_dpmp_2', $update);

        if ($this->db->trans_status() === false) :
            $this->db->trans_rollback();
            $status = false;
            $pesan = 'Ceklist DPMP Gagal';
        else :
            $this->db->trans_commit();
            $status = true;
            $pesan = 'Ceklist DPMP Berhasil';
        endif;

        $message = array(
            'status' => $status,
            'pesan'  => $pesan, 
            'token'  => $this->security->get_csrf_hash(),
            'id'     => $id_layanan,
        );

        $this->response($message, REST_Controller::HTTP_OK);

    }

    function hapus_dpmp_2_delete($id)
    {
        $status = $this->gizi->deleteDPMP2($id);
        if ($status) :
            $response = array('status' => $status, 'message' => 'Berhasil menghapus DPMP!');
        else :
            $response = array('status' => $status, 'message' => 'Gagal menghapus DPMP!');
        endif;
        $this->response($response, REST_Controller::HTTP_OK);
    }

    function ambil_data_dpmp_2_get()
    {
        if (!$this->get('id') && !$this->get('id_layanan')) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
        endif;

        $data['dpmp'] = $this->gizi->getDetailDPMP2($this->get('id', true));
        
        if ($data) :
            $this->response($data, REST_Controller::HTTP_OK); // (200)
        endif;
    }

    function simpan_print_dpmp_2_post()
    {

        $id = safe_post('id');

        // Memulai transaksi
        $this->db->trans_begin();

        // Menyiapkan data untuk di-update
        $data = [
            'dpmp_print' => safe_post('checked') !== '' ? safe_post('checked') : NULL,
        ];

        // Melakukan update pada database
        $this->db->where('id', $id)->update('sm_dpmp_2  ', $data);

        if ($this->db->trans_status() === false) :
            $this->db->trans_rollback();
            $status = false;
            $pesan = 'Entri Data DPMP Gagal';
        else :
            $this->db->trans_commit();
            $status = true;
            $pesan = 'Entri Data DPMP Berhasil';
        endif;

        $message = array(
            'status' => $status,
            'pesan'  => $pesan, 
            'token'  => $this->security->get_csrf_hash(),
            'id_dpmp'=> $id,
        );

        $this->response($message, REST_Controller::HTTP_OK);
    }


    function cetak_etiket_2_get()
    {
        $search         = [
            'tanggal_awal_2'      => safe_get('tanggal_awal_2'),
            'tanggal_akhir_2'     => safe_get('tanggal_akhir_2'),
            'no_rm_2'             => safe_get('no_rm_2'),
            'nama_2'              => safe_get('nama_2'),
            'diet_cetak_2'        => safe_get('diet_cetak_2'),
            'jam_cetak_2'         => safe_get('jam_cetak_2'),
            'ruangan_diet_2'      => safe_get('ruangan_diet_2'),
        ];
        
        $data = $search;

        if ($data) :
            $this->response($data, REST_Controller::HTTP_OK); // (200)
        endif;
    }

    function get_data_layanan_pasien_get()
    {
        if (!$this->get('id')) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
        endif;

        $this->load->model('pendaftaran/Pendaftaran_model', 'm_pendaftaran');
        $data = $this->m_pendaftaran->getPendaftaranDetail($this->get('id', true), $this->get('id_layanan', true));
        if ($data) :
            $this->response($data, REST_Controller::HTTP_OK); // (200)
        endif;
    }

    function get_list_data_gizi_dietetik_get()
    {
        if (!$this->get('id')) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
        endif;
        $data['gd'] = $this->gizi->getListGiziDietetik($this->get('id'));

        if ($data) :
            $this->response($data, REST_Controller::HTTP_OK); // (200)
        endif;
    }

    function get_gizi_dietetik_byid_get()
    {
        if (!$this->get('id')) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
        endif;
        $data = $this->gizi->getGdByID($this->get('id'));

        if ($data) :
            $this->response($data, REST_Controller::HTTP_OK); // (200)
        endif;
    }

    function hapus_gizi_dietetik_post()
	{
		if (!safe_post('id', true)) :
			$this->response(null, REST_Controller::HTTP_BAD_REQUEST);
		endif;

		$this->db->trans_begin();

        $id = safe_post('id');
        $this->gizi->deleteGiziDietetik($id);

		if ($this->db->trans_status() === false) :
			$this->db->trans_rollback();
			$status = false;
			$message = 'Gagal Hapus Formulir Asuhan Gizi dan Destetik';
		else :
			$this->db->trans_commit();
			$status = true;
			$message = 'Berhasil Hapus Formulir Asuhan Gizi dan Destetik';
		endif;

		$this->response(array('status' => $status, 'message' => $message), REST_Controller::HTTP_OK);
	}

    function get_list_data_gizi_konsultasi_get()
    {
        if (!$this->get('id')) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
        endif;
        $data['kg'] = $this->gizi->getListKonsulGizi($this->get('id'));

        if ($data) :
            $this->response($data, REST_Controller::HTTP_OK); // (200)
        endif;
    }

    function get_gizi_konsultasi_byid_get()
    {
        if (!$this->get('id')) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
        endif;
        $data = $this->gizi->getKonsulGiziByID($this->get('id'));

        if ($data) :
            $this->response($data, REST_Controller::HTTP_OK); // (200)
        endif;
    }

    function hapus_gizi_konsultasi_post()
	{
		if (!safe_post('id', true)) :
			$this->response(null, REST_Controller::HTTP_BAD_REQUEST);
		endif;

		$this->db->trans_begin();

        $id = safe_post('id');

        $this->load->model('satu_sehat/Satu_sehat_model', 'sehat');
        $cekDataLayananGizi = $this->sehat->cekDataGizi((int)$id);

        if(isset($cekDataLayananGizi->id_layanan_pendaftaran)){

            $cekDataGizi = $this->sehat->cekLayananGizi((int)$cekDataLayananGizi->id_layanan_pendaftaran);

            if(isset($cekDataGizi->jenis_layanan)){

                if($cekDataGizi->jenis_layanan === 'Poliklinik'){

                    if($cekDataGizi->id_kg === $id){

                        $this->sehat->integrasiComposition($cekDataGizi->id_kg, 'hapus');

                    }

                }

          }

        }

        $this->gizi->deleteGiziKonsultasi($id);

		if ($this->db->trans_status() === false) :
			$this->db->trans_rollback();
			$status = false;
			$message = 'Gagal Hapus Formulir Konsultasi Gizi';
		else :
			$this->db->trans_commit();
			$status = true;
			$message = 'Berhasil Hapus Formulir Konsultasi Gizi';
		endif;

		$this->response(array('status' => $status, 'message' => $message), REST_Controller::HTTP_OK);
	}

    function get_list_data_gizi_anak_get()
    {
        if (!$this->get('id')) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
        endif;
        $data['ga'] = $this->gizi->getListGiziAnak($this->get('id'));

        if ($data) :
            $this->response($data, REST_Controller::HTTP_OK); // (200)
        endif;
    }

    function get_gizi_anak_byid_get()
    {
        if (!$this->get('id')) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
        endif;
        $data = $this->gizi->getGaByID($this->get('id'));

        if ($data) :
            $this->response($data, REST_Controller::HTTP_OK); // (200)
        endif;
    }

    function hapus_gizi_anak_post()
	{
		if (!safe_post('id', true)) :
			$this->response(null, REST_Controller::HTTP_BAD_REQUEST);
		endif;

		$this->db->trans_begin();

        $id = safe_post('id');
        $this->gizi->deleteGiziAnak($id);

		if ($this->db->trans_status() === false) :
			$this->db->trans_rollback();
			$status = false;
			$message = 'Gagal Hapus Formulir Asuhan Gizi Anak';
		else :
			$this->db->trans_commit();
			$status = true;
			$message = 'Berhasil Hapus Formulir Asuhan Gizi Anak';
		endif;

		$this->response(array('status' => $status, 'message' => $message), REST_Controller::HTTP_OK);
	}
    
}
