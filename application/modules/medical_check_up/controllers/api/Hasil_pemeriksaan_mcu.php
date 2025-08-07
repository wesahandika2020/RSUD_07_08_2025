<?php

defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

class Hasil_pemeriksaan_mcu extends REST_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->limit = 10;
        $this->load->model('Hasil_pemeriksaan_mcu_model', 'm_hasil_mcu');
        $this->load->model('Medical_check_up_model', 'm_mcu');
        $this->load->model('pendaftaran/Pendaftaran_model', 'm_pendaftaran');
        $this->load->model('pelayanan/Pelayanan_model', 'm_pelayanan');
        $this->load->model('paket_mcu/Paket_mcu_model', 'm_paket_mcu');
        $this->load->model('pendaftaran/Pendaftaran_model', 'klinik');


        $id_translucent = $this->session->userdata('id_translucent');
        if (empty($id_translucent)) :
            $this->response(array('error' => 'Anda belum login'), REST_Controller::HTTP_UNAUTHORIZED);
            exit();
        endif;
    }

    function hasil_pemeriksaan_mcu_get()
    {
        $data = $this->m_pendaftaran->getPendaftaranDetail($this->get('id'), $this->get('id_layanan'));
        $data['hasil_pemeriksaan_mcu'] = $this->m_hasil_mcu->getHasilPemeriksaan($this->get('id'));
        $data['questionnaire_mcu'] = $this->m_hasil_mcu->getDataQuisionerMCU($this->get('id_layanan'));

        if ($data != null) {
            $this->response($data, REST_Controller::HTTP_OK);
        } else {
            $this->response($data, REST_Controller::HTTP_OK);
        }
    }

    function simpan_hasil_pemeriksaan_mcu_post()
    {
        $this->db->trans_begin();

        $is_olahraga = isset($_POST['is_olahraga_aurk']) ? safe_post('is_olahraga_aurk') : 0;
        $is_merokok = isset($_POST['is_merokok_aurk']) ? safe_post('is_merokok_aurk') : 0;
        $is_alkohol = isset($_POST['is_alkohol_aurk']) ? safe_post('is_alkohol_aurk') : 0;

        $data = array(
            'id_pendaftaran'            => (empty(safe_post('id_pendaftaran_hpmcu')) ? null : safe_post('id_pendaftaran_hpmcu')),
            'id_layanan_pendaftaran'    => (empty(safe_post('id_layanan_hpmcu')) ? null : safe_post('id_layanan_hpmcu')),
            'guarantor'                 => (empty(safe_post('guarantor_sksi')) ? null : safe_post('guarantor_sksi')),
            'golongan_darah'            => (empty(safe_post('golongan_darah_sksi')) ? null : safe_post('golongan_darah_sksi')),
            'riwayat_alergi'            => (empty(safe_post('riwayat_alergi_sksi')) ? null : safe_post('riwayat_alergi_sksi')),
            'masalah_kondisi_medis'     => (empty(safe_post('masalah_medis_sksi')) ? null : safe_post('masalah_medis_sksi')),
            'riwayat_konsumsi_obat'     => (empty(safe_post('riwayat_obat_sksi')) ? null : safe_post('riwayat_obat_sksi')),
            'riwayat_penyakit_keluarga' => (empty(safe_post('riwayat_penyakit_sksi')) ? null : safe_post('riwayat_penyakit_sksi')),
            'nama_pjwb'                 => (empty(safe_post('nama_pjwb_sksi')) ? null : safe_post('nama_pjwb_sksi')),
            'hubungan_pjwb'             => (empty(safe_post('hubungan_pjwb_sksi')) ? null : safe_post('hubungan_pjwb_sksi')),
            'telp_pjwb'                 => (empty(safe_post('telp_pjwb_sksi')) ? null : safe_post('telp_pjwb_sksi')),
            'riwayat_penyakit_saat_ini' => (empty(safe_post('riwayat_penyakit_aurk')) ? null : safe_post('riwayat_penyakit_aurk')),
            'obat_obatan'               => (empty(safe_post('obatan_aurk')) ? null : safe_post('obatan_aurk')),
            'vaksinasi'                 => (empty(safe_post('vaksinasi_aurk')) ? null : safe_post('vaksinasi_aurk')),
            'olahraga'                  => (empty(safe_post('is_olahraga_aurk')) ? null : safe_post('is_olahraga_aurk')),
            'merokok'                   => (empty(safe_post('is_merokok_aurk')) ? null : safe_post('is_merokok_aurk')),
            'alkohol'                   => (empty(safe_post('is_alkohol_aurk')) ? null : safe_post('is_alkohol_aurk')),
            'zat_adiktif'               => (empty(safe_post('is_zat_adiktif_aurk')) ? null : safe_post('is_zat_adiktif_aurk')),
            'kesimpulan'                => safe_post('kesimpulan_kds'),
            'saran'                     => safe_post('saran_kds'),
            'treadmil'                  => safe_post('treadmil_kds'),
            'id_dokter'                 => safe_post('dokter_sksi'),
            'created_at'                => $this->datetime,
            'users_id'                  => $this->session->userdata('id_translucent'),
        );

        if (empty(safe_post('id_hpmcu'))) {
            $this->db->insert('sm_hasil_pemeriksaan_mcu', $data);
        } else {
            $this->db->where('id', safe_post('id_hpmcu'));
            $data['update_at'] = $this->datetime;
            $data['users_update_id'] = $this->session->userdata('id_translucent');
            $this->db->update('sm_hasil_pemeriksaan_mcu', $data);
        }

        if ($this->db->trans_status() === false) :
            $this->db->trans_rollback();
            $status = false;
            $message = 'Gagal menyimpan Hasil Pemeriksaan MCU';
        else :
            $this->db->trans_commit();
            $status = true;
            $message = 'Berhasil menyimpan Hasil Pemeriksaan MCU';
        endif;

        $this->response(array('status' => $status, 'message' => $message));
    }

    function simpan_faktor_klinis_mcu_post()
    {
        $this->db->trans_begin();

        $data = array(
            'id_pendaftaran'            => safe_post('id_pendaftaran_hpmcu'),
            'id_layanan_pendaftaran'    => safe_post('id_layanan_hpmcu'),
            'pemeriksaan'               => safe_post('pemeriksaan_aurk'),
            'hasil'                     => safe_post('hasil_klinis_aurk'),
            'keterangan'                => safe_post('keterangan_klinis_aurk'),
            'created_at'                => $this->datetime,
            'users_id'                  => $this->session->userdata('id_translucent'),
        );
        $this->db->insert('sm_faktor_klinis_mcu', $data);
        $id_faktor_klinis = $this->db->insert_id();

        $detail_pemeriksaan_aurk = $this->input->post('detail_pemeriksaan_aurk');
        $detail_hasil_klinis_aurk = $this->input->post('detail_hasil_klinis_aurk');
        $detail_keterangan_klinis_aurk = $this->input->post('detail_keterangan_klinis_aurk');

        if (!empty($detail_pemeriksaan_aurk[0])) {
            foreach ($detail_pemeriksaan_aurk as $key => $value) {
                $detail_data = array(
                    'id_faktor_klinis'          => $id_faktor_klinis,
                    'detail_pemeriksaan'        => $detail_pemeriksaan_aurk[$key],
                    'detail_hasil'              => $detail_hasil_klinis_aurk[$key],
                    'detail_keterangan'         => $detail_keterangan_klinis_aurk[$key]
                );
                $this->db->insert('sm_detail_faktor_klinis_mcu', $detail_data);
            }
        }


        if ($this->db->trans_status() === false) :
            $this->db->trans_rollback();
            $status = false;
            $message = 'Gagal menyimpan Faktor Klinis MCU';
        else :
            $this->db->trans_commit();
            $status = true;
            $message = 'Berhasil menyimpan Faktor Klinis MCU';
        endif;

        $this->response(array('status' => $status, 'message' => $message));
    }

    function hapus_faktor_klinis_mcu_post()
    {
        $this->db->trans_begin();

        $this->db->delete('sm_faktor_klinis_mcu', ['id' => safe_post('id')]);
        $this->db->delete('sm_detail_faktor_klinis_mcu', ['id_faktor_klinis' => safe_post('id')]);

        if ($this->db->trans_status() === false) :
            $this->db->trans_rollback();
            $status = false;
            $message = 'Gagal Menghapus Data Faktor Klinis MCU';
        else :
            $this->db->trans_commit();
            $status = true;
            $message = 'Berhasil Menghapus Data Faktor Klinis MCU';
        endif;

        $this->response(array('status' => $status, 'message' => $message));
    }

    function faktor_klinis_get()
    {
        $this->load->model('pendaftaran/Pendaftaran_model', 'm_pendaftaran');

        $data['faktor_klinis'] = [];
        $faktor_klinis = $this->m_hasil_mcu->getFaktorKlinis($this->get('id'));

        if (!empty($faktor_klinis)) {
            $data['faktor_klinis'] = $faktor_klinis;
        }

        if ($data != null) {
            $this->response($data, REST_Controller::HTTP_OK);
        } else {
            $this->response($data, REST_Controller::HTTP_OK);
        }
    }




    function simpan_skpk_post()
    {

        $checkDataSKPK = '';
        $checkDataSKPK =  $this->m_mcu->getFormSKPK(safe_post('id_pendaftaran'));

        $this->db->trans_begin();
        if ($checkDataSKPK == NULL) {
            $data = array(
                'id_pendaftaran'         => safe_post('id_pendaftaran'),
                'no_surat'              => safe_post('no_surat_skpk'),
                'tahun_surat'           => safe_post('tahun_surat_skpk'),
                'nip'                   => safe_post('nip_skpk'),
                'gol_ruang_skpk'        => safe_post('gol_ruang_skpk'),
                'nama_kecil'            => safe_post('nama_kecil_skpk'),
                'karpeg'                => safe_post('karpeg_skpk'),
                'salinan_hasil_satu'    => safe_post('salinan_hasil_satu'),
                'salinan_hasil_dua'     => safe_post('salinan_hasil_dua'),
                'salinan_hasil_tiga'    => safe_post('salinan_hasil_tiga'),
                'tanggal_surat'         => safe_post('tanggal_surat')  == '' ? null : date2mysql(safe_post('tanggal_surat')),
                'id_dokter'             => safe_post('dokter_penguji_kesahatan'),
            );

            $this->db->insert('sm_form_skpk', $data);
        } else {
            $data = array(
                'no_surat'              => safe_post('no_surat_skpk'),
                'tahun_surat'           => safe_post('tahun_surat_skpk'),
                'nip'                   => safe_post('nip_skpk'),
                'gol_ruang_skpk'        => safe_post('gol_ruang_skpk'),
                'nama_kecil'            => safe_post('nama_kecil_skpk'),
                'karpeg'                => safe_post('karpeg_skpk'),
                'salinan_hasil_satu'    => safe_post('salinan_hasil_satu'),
                'salinan_hasil_dua'     => safe_post('salinan_hasil_dua'),
                'salinan_hasil_tiga'    => safe_post('salinan_hasil_tiga'),
                'tanggal_surat'         => safe_post('tanggal_surat')  == '' ? null : date2mysql(safe_post('tanggal_surat')),
                'id_dokter'             => safe_post('dokter_penguji_kesahatan'),
            );

            $this->db->where('id_pendaftaran', safe_post('id_pendaftaran'));
            $this->db->update('sm_form_skpk', $data);
        }

        if ($this->db->trans_status() === false) :
            $this->db->trans_rollback();
            $status = false;
            $message = 'Gagal simpan form SKPK';
        else :
            $this->db->trans_commit();
            $status = true;
            $message = 'Berhasil simpan form SKPK';
        endif;

        $this->response(array('status' => $status, 'message' => $message), REST_Controller::HTTP_OK);
    }


    function form_sk_dinkes_get()
    {
        $this->load->model('pendaftaran/Pendaftaran_model', 'm_pendaftaran');

        $data['pendaftaran_detail'] = [];
        $data['sk_dinkes'] = [];

        $data['pendaftaran_detail'] = $this->m_pendaftaran->getPendaftaranDetail($this->get('id_pendaftaran', true));

        $sk_dinkes = $this->m_mcu->getSKDinkes($this->get('id_pendaftaran'));

        if (!empty($sk_dinkes)) {
            $data['sk_dinkes'] = $sk_dinkes;
        }


        if ($data != null) {
            $this->response($data, REST_Controller::HTTP_OK);
        } else {
            $this->response($data, REST_Controller::HTTP_OK);
        }
    }

    function simpan_sk_dinkes_post()
    {
        $checkDataSKDinkes = '';
        $checkDataSKDinkes =  $this->m_mcu->getSKDinkes(safe_post('id_pendaftaran'));

        $this->db->trans_begin();
        if ($checkDataSKDinkes == NULL) {
            $data = array(
                'id_pendaftaran'         => safe_post('id_pendaftaran'),
                'nip'                   => safe_post('nip_sk'),
                'gol_ruang'             => safe_post('gol_ruang_sk'),
                'nama_kecil'            => safe_post('nama_kecil_sk'),
                'karpeg'                => safe_post('karpeg_sk'),
                'salinan_satu'          => safe_post('salin_hasil_satu'),
                'salinan_dua'           => safe_post('salin_hasil_dua'),
                'salinan_tiga'          => safe_post('salin_hasil_tiga'),
                'tanggal_surat_dinkes'  => safe_post('tanggal_surat_sk'),
                'id_dokter_dinkes'      => safe_post('dokter_sk_dinkes'),
            );

            $this->db->insert('sm_skpk_dinkes', $data);
        } else {
            $data = array(
                'nip'                   => safe_post('nip_sk'),
                'gol_ruang'             => safe_post('gol_ruang_sk'),
                'nama_kecil'            => safe_post('nama_kecil_sk'),
                'karpeg'                => safe_post('karpeg_sk'),
                'salinan_satu'          => safe_post('salin_hasil_satu'),
                'salinan_dua'           => safe_post('salin_hasil_dua'),
                'salinan_tiga'          => safe_post('salin_hasil_tiga'),
                'tanggal_surat_dinkes'  => safe_post('tanggal_surat_sk'),
                'id_dokter_dinkes'      => safe_post('dokter_sk_dinkes'),
            );

            $this->db->where('id_pendaftaran', safe_post('id_pendaftaran'));
            $this->db->update('sm_skpk_dinkes', $data);
        }

        if ($this->db->trans_status() === false) :
            $this->db->trans_rollback();
            $status = false;
            $message = 'Gagal simpan form SK Kemenkes';
        else :
            $this->db->trans_commit();
            $status = true;
            $message = 'Berhasil simpan form SK Kemenkes';
        endif;

        $this->response(array('status' => $status, 'message' => $message), REST_Controller::HTTP_OK);
    }
}
