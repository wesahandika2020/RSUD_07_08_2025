<?php defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

/**
 * @package         CodeIgniter
 * @subpackage      Rest Server
 * @category        Controller
 * @author          Faiz Muhammad Syam
 * @license         Syams Corporation
 */
class Eklaim_bpjs extends REST_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->limit = 10;
        $this->datetime = date('Y-m-d H:i:s');
        $this->load->model('Eklaim_bpjs_model', 'eklaim_bpjs');
        $this->load->model('Eklaim_bpjs_auto_model', 'eklaim_bpjs_auto');
        $this->load->model('Eklaim_bpjs_detail_model', 'm_detail_eklaim');
        $this->load->model('App_model', 'default');
        $this->load->model('pengkodean_icd_x/Pengkodean_icd_x_model', 'm_pengkodean_icd_x');

        // $this->eclaim_config = $this->default->getConfigEklaim();
    }


    function get_laporan_eklaim_get()
    {
        if (!$this->get('page')) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
        endif;

        $start  = ($this->get('page') - 1) * $this->limit;
        $search = [
            'jenis_rawat'           => safe_get('jenis_rawat_lap'),
            'periode'               => safe_get('periode_lap'),
            'tanggal_awal'          => safe_get('tanggal_awal_lap'),
            'tanggal_akhir'         => safe_get('tanggal_akhir_lap'),
            'metode_bayar'          => safe_get('metode_bayar_lap'),
            'kelas_rawat'           => safe_get('kelas_rawat_lap'),
            'cara_pulang'           => safe_get('cara_pulang_lap'),
            'jenis_tarif'           => safe_get('jenis_tarif_lap'),
            'cob'                   => safe_get('cob_lap'),
            'tanggal_awal_grouper'  => safe_get('tanggal_awal_grouper'),
            'tanggal_akhir_grouper' => safe_get('tanggal_akhir_grouper'),
            'petugas_klaim'         => safe_get('petugas_klaim'),
            'order_by'              => safe_get('order_by'),
        ];

        $data   = $this->eklaim_bpjs->getLaporanEklaim($this->limit, $start, $search);
        $data['page']    = (int) $this->get('page');
        $data['limit']   = $this->limit;

        if ($data) :
            $this->response($data, REST_Controller::HTTP_OK); // (200)
        else :
            $this->response(array('error' => 'Data is Not Found'), REST_Controller::HTTP_NOT_FOUND);
        endif;
    }

    function get_list_eklaim_get()
    {
        if (!$this->get('page')) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
        endif;

        $start  = ($this->get('page') - 1) * $this->limit;
        $search = [
            'jenis_rawat'       => safe_get('jenis_rawat'),
            'periode'           => safe_get('periode'),
            'tanggal_awal'      => safe_get('tanggal_awal'),
            'tanggal_akhir'     => safe_get('tanggal_akhir'),
            'metode_bayar'      => safe_get('metode_bayar'),
            'kelas_rawat'       => safe_get('kelas_rawat'),
            'status_klaim'      => safe_get('status_klaim'),
            "keyword"           => safe_get("keyword")
        ];

        $data   = $this->eklaim_bpjs->getDataEklaim($this->limit, $start, $search);
        $data['page']    = (int) $this->get('page');
        $data['limit']   = $this->limit;

        if ($data) :
            $this->response($data, REST_Controller::HTTP_OK); // (200)
        else :
            $this->response(array('error' => 'Data is Not Found'), REST_Controller::HTTP_NOT_FOUND);
        endif;
    }

    function new_claim_post()
    {
        $data = [
            'nomor_kartu'   => safe_post('nomor_kartu'),
            'nomor_sep'     => safe_post('nomor_sep'),
            'nomor_rm'      => safe_post('nomor_rm'),
            'nama_pasien'   => safe_post('nama_pasien'),
            'tgl_lahir'     => safe_post('tgl_lahir'), // Format tgl lahir YYYY-MM-DD hh:mm:ss
            'gender'        => safe_post('gender'), // Gender 1=laki-laki, 2=perempuan
        ];

        $data = $this->eklaim_bpjs->newClaim($data);

        if ($data) :
            $this->response($data, REST_Controller::HTTP_OK); // (200)
        endif;
    }

    function update_patient_post()
    {
        $data = [
            'nomor_kartu'   => safe_post('nomor_kartu'),
            'nomor_sep'     => safe_post('nomor_sep'),
            'nomor_rm'      => safe_post('nomor_rm'),
            'nama_pasien'   => safe_post('nama_pasien'),
            'tgl_lahir'     => safe_post('tgl_lahir'), // Format tgl lahir YYYY-MM-DD hh:mm:ss
            'gender'        => safe_post('gender'), // Gender 1=laki-laki, 2=perempuan
        ];

        $data = $this->eklaim_bpjs->updatePatient($data);

        if ($data) :
            $this->response($data, REST_Controller::HTTP_OK); // (200)
        endif;
    }

    function delete_patient_get()
    {
        $data = [
            'nomor_rm'      => safe_get('nomor_rm'),
            'coder_nik'     => safe_get('coder_nik') // NIK Koder
        ];

        $data = $this->eklaim_bpjs->deletePatient($data);

        if ($data) :
            $this->response($data, REST_Controller::HTTP_OK); // (200)
        endif;
    }

    function simpan_data_eklaim_post()
    {
        $checkDataEklaim = '';
        $checkDataEklaim =  $this->m_detail_eklaim->getEklaim(safe_post('id_pendaftaran'));

        $num_array = [];

        foreach ($_POST as $key => $value) {
            if (preg_match('/^num_\d+$/', $key)) {
                $num_array[] = $value;
                unset($_POST[$key]);
            }
        }
        $_POST['num'] = $num_array;

        if (safe_post('jenis_rawat_type') == 'inap') {
            $jenis_rawat = 1;
        } else {
            $jenis_rawat = 2;
        }

        if (safe_post('tariff_class') == 'kelas_1') {
            $hak_kelas = 1;
        } else if (safe_post('tariff_class') == 'kelas_2') {
            $hak_kelas = 2;
        } else {
            $hak_kelas = 3;
        }

        $id_pendaftaran = safe_post('id_pendaftaran');
        $id_layanan_pendaftaran = safe_post('id_layanan_pendaftaran');
        $is_persalinan = safe_post('is_persalinan');
        $is_apgar = safe_post('is_apgar');

        // $this->_validasi();
        $data = array(
            'id_pendaftaran'                => safe_post('id_pendaftaran'),
            'id_layanan_pendaftaran'        => safe_post('id_layanan_pendaftaran'),
            'nomor_kartu'                   => safe_post('nomor_kartu'),
            'nomor_sep'                     => safe_post('nomor_sep'),
            'nomor_rm'                      => safe_post('nomor_rm'),
            'nama_pasien'                   => safe_post('nama_pasien'),
            'tgl_lahir'                     => safe_post('tgl_lahir'),
            'gender'                        => safe_post('gender'),
            'tgl_masuk'                     => safe_post('tgl_masuk'),
            'tgl_pulang'                    => safe_post('tgl_pulang'),
            'cara_masuk'                    => safe_post('gpr_cara_masuk'), // new update
            'jenis_rawat'                   => $jenis_rawat,
            'kelas_rawat'                   => $hak_kelas,
            'adl_sub_acute'                 => safe_post('gpr_sub_acute'),
            'adl_chronic'                   => safe_post('gpr_chronic'),
            'sistole'                       => safe_post('jkn_sistole') ?? NULL, // new update
            'diastole'                      => safe_post('jkn_diastole') ?? NULL, // new update
            'icu_indikator'                 => !empty(safe_post('icu_ind')) ? '1' : '0',
            'icu_los'                       => safe_post('gpr_icu_los'),
            // 'ventilator_hour'               => '0',
            'birth_weight'                  => safe_post('gpr_berat_lahir') == "" ? NULL : safe_post('gpr_berat_lahir'),
            'discharge_status'              => safe_post('gpr_cara_pulang'),
            'diagnosa'                      => safe_post('gpr_diagnosis'),
            'procedure'                     => safe_post('gpr_procedure'),
            'diagnosa_inagrouper'           => safe_post('gpr_diagnosis_inagrouper'), // new update
            'procedure_inagrouper'          => safe_post('gpr_procedure_inagrouper'), // new update
            'prosedur_non_bedah'            => str_replace('.', '', safe_post('prosedur_non_bedah')),
            'prosedur_bedah'                => str_replace('.', '', safe_post('prosedur_bedah')),
            'konsultasi'                    => str_replace('.', '', safe_post('konsultasi')),
            'tenaga_ahli'                   => str_replace('.', '', safe_post('tenaga_ahli')),
            'keperawatan'                   => str_replace('.', '', safe_post('keperawatan')),
            'penunjang'                     => str_replace('.', '', safe_post('penunjang')),
            'radiologi'                     => str_replace('.', '', safe_post('radiologi')),
            'laboratorium'                  => str_replace('.', '', safe_post('laboratorium')),
            'pelayanan_darah'               => str_replace('.', '', safe_post('pelayanan_darah')),
            'rehabilitasi'                  => str_replace('.', '', safe_post('rehabilitasi')),
            'kamar'                         => str_replace('.', '', safe_post('kamar')),
            'rawat_intensif'                => str_replace('.', '', safe_post('rawat_intensif')),
            'obat'                          => str_replace('.', '', safe_post('obat')),
            'obat_kronis'                   => str_replace('.', '', safe_post('obat_kronis')),
            'obat_kemoterapi'               => str_replace('.', '', safe_post('obat_kemoterapi')),
            'alkes'                         => str_replace('.', '', safe_post('alkes')),
            'bmhp'                          => str_replace('.', '', safe_post('bmhp')),
            'sewa_alat'                     => str_replace('.', '', safe_post('sewa_alat')),
            'nama_dokter'                   => safe_post('gpr_nama_dokter'),
            // 'is_pasien_tb'                  => !empty(safe_post('gpr_is_pasien_tb')) ? '1' : NULL, // new update
            // 'jkn_sitb_noreg'                => (safe_post('gpr_is_pasien_tb') == '1' ? safe_post('jkn_sitb_noreg') : NULL), // new update
            'is_apgar'                      => safe_post('is_apgar'), // new update
            'is_persalinan'                 => safe_post('is_persalinan'), // new update
            'cob_cd'                        => safe_post('gpr_cob') ?? null, // new update
            'is_hd'                         => 0, // new update
            'is_pasien_covid'               => !empty(safe_post('gpr_is_pasien_covid')) ? '1' : NULL, // new update
            'covid19_no_sep'                => (safe_post('gpr_is_pasien_covid') == '1' ? safe_post('covid19_no_sep') : NULL), // new update
            'kode_tarif'                    => safe_post('gpr_jenis_tarif'),
            'payor_id'                      => safe_post('gpr_cara_bayar'),
            'payor_cd'                      => $this->eklaim_bpjs_auto->getPayorCD(safe_post('gpr_cara_bayar')), //'JKN',
            'coder_nik'                     => $this->session->userdata('nik'),
            'created_at'                    => $this->datetime,
        );

        if ($jenis_rawat == '2' && !empty(safe_post('executive_class_ind'))) {
            $data['executive_class_ind'] = safe_post('executive_class_ind');
            $data['billing_amount_pex'] = safe_post('billing_amount_pex');
        }

        if ($jenis_rawat == '1') {
            if (!empty(safe_post('upgrade_class_ind'))) {
                $data['upgrade_class_ind'] = !empty(safe_post('upgrade_class_ind')) ? '1' : '0';
                $data['upgrade_class_class'] = safe_post('upgrade_class');
                $data['upgrade_class_los'] = safe_post('upgrade_class_los');
                $data['add_payment_pct'] = '0';
                $data['upgrade_class_payor'] = 'peserta';
            }
            if (!empty(safe_post('icu_ind'))) {
                $data['icu_indikator'] = safe_post('icu_ind') == '1' ? '1' : '0';
                $data['use_ind'] = !empty(safe_post('ventilator_use')) ? '1' : '0';
                $data['start_dttm'] = safe_post('ventilator_start_dttm');
                $data['stop_dttm'] = safe_post('ventilator_stop_dttm');
            }
        }

        if ($is_persalinan) {
            $data['usia_kehamilan'] = safe_post('jkn_usia_kehamilan') ?? 0;
            $data['gravida'] = safe_post('jkn_gravida') ?? 0;
            $data['partus'] = safe_post('jkn_partus') ?? 0;
            $data['abortus'] = safe_post('jkn_abortus') ?? 0;
            $data['onset_kontraksi'] = safe_post('jkn_onset_kontraksi');
            $deliveryData = null;

            if (!empty(safe_post('id_detail_kelahiran')) && is_array(safe_post('id_detail_kelahiran'))) {
                foreach (safe_post('id_detail_kelahiran') as $index => $id) {
                    $deliveryData[] = [
                        'id_detail_kelahiran' => safe_post('id_detail_kelahiran')[$index],
                        'delivery_sequence' => safe_post('num')[$index],
                        'delivery_method' => safe_post('delivery_method')[$index],
                        'delivery_dttm' => safe_post('delivery_dttm')[$index],
                        'use_manual' => safe_post('use_manual')[$index],
                        'use_forcep' => safe_post('use_forcep')[$index],
                        'use_vacuum' => safe_post('use_vacuum')[$index],
                        'letak_janin' => safe_post('letak_janin')[$index],
                        'kondisi' => safe_post('kondisi')[$index],
                        'shk_spesimen_ambil' => safe_post('shk_spesimen_ambil')[$index],
                        'shk_lokasi' => safe_post('shk_lokasi')[$index] ?: null, // Kosong jadi null
                        'shk_alasan' => safe_post('shk_alasan')[$index] ?: null,
                        'shk_spesimen_dttm' => safe_post('shk_spesimen_dttm')[$index] ?: null,
                    ];
                }
            }
            $data['deliveryData'] = $deliveryData;
        }

        if ($is_apgar) {
            $data['appearance_1'] = safe_post('jkn_apgar_1_appearance');
            $data['pulse_1'] = safe_post('jkn_apgar_1_pulse');
            $data['grimace_1'] = safe_post('jkn_apgar_1_grimace');
            $data['activity_1'] = safe_post('jkn_apgar_1_activity');
            $data['respiration_1'] = safe_post('jkn_apgar_1_respiration');
            $data['appearance_5'] = safe_post('jkn_apgar_5_appearance');
            $data['pulse_5'] = safe_post('jkn_apgar_5_pulse');
            $data['grimace_5'] = safe_post('jkn_apgar_5_grimace');
            $data['activity_5'] = safe_post('jkn_apgar_5_activity');
            $data['respiration_5'] = safe_post('jkn_apgar_5_respiration');
        }

        // Start Simpan HD (Dializer Use + Kantong Darah)
        $gpr_procedure_inagrouper = safe_post('gpr_procedure_inagrouper');
        $gpr_procedure = safe_post('gpr_procedure');

        $codes_inagrouper = explode("#", $gpr_procedure_inagrouper);
        $codes_procedure = explode("#", $gpr_procedure);

        $all_codes = array_merge($codes_inagrouper, $codes_procedure);

        if (in_array("39.95", $all_codes) || in_array(["99.04", "99.03"], $all_codes)) {
            if (in_array("39.95", $all_codes)) {
                $data['dializer_single_use'] = 1;
                $data['kantong_darah'] = $this->m_detail_eklaim->getJumlahKantongDarah($id_pendaftaran);
                $data['is_hd'] = 1;
            } else if (in_array("99.04", $all_codes) || in_array("99.03", $all_codes)) {
                $data['kantong_darah'] = safe_post('kantong_darah');
            }
        }
        // End simpan HD

        $status = false;
        $message = "Tidak terhubung ke server eKlaim.";

        $newClaim = $this->eklaim_bpjs->newClaim($data);

        if ($newClaim['metadata']['code'] == '200' || ($newClaim['metadata']['code'] == '400' && $newClaim['metadata']['message'] == 'Duplikasi nomor SEP')) {
            $setClaimData = $this->eklaim_bpjs->setClaimData($data);

            if ($setClaimData['metadata']['code'] != '200') {
                $status = false;
                $message = $setClaimData['metadata']['message'];

                $this->response(array('status' => $status, 'message' => $message), REST_Controller::HTTP_OK);
            } else {

                $update = array(
                    'no_sep'      => safe_post('nomor_sep'),
                    'no_polish'   => safe_post('nomor_kartu')
                );

                $this->db->where("id", $id_layanan_pendaftaran)->update("sm_layanan_pendaftaran", $update);
                $this->db->where("id", $id_pendaftaran)->update("sm_pendaftaran", $update);

                if (empty($checkDataEklaim)) :
                    $this->m_detail_eklaim->simpanDataeklaim($data);
                    $message = [
                        'status'  => TRUE,
                        'message' => 'Data Berhasil disimpan ke Server.'
                    ];

                    $this->response($message, REST_Controller::HTTP_OK);
                else :
                    if ($is_persalinan) {
                        $this->m_detail_eklaim->simpanDataPersalinan($data, $checkDataEklaim->id);
                    }
                    $dataGrouper =  $this->db->get_where('sm_grouper_eklaim', ['id_pendaftaran' => ($id_pendaftaran)])->row();
                    if (!empty($dataGrouper)) {
                        $this->db->where("id", $dataGrouper->id)->delete("sm_grouper_eklaim");
                        $this->db->where("id_pendaftaran", $id_pendaftaran)->update("sm_eklaim", ['response' => null]);
                    }
                    $id = $this->m_detail_eklaim->updateDataeklaim($data, safe_post('id_pendaftaran'));
                    $message = [
                        'id_pendaftaran'    => convert_hash($id),
                        'status'            => true,
                        'message'           => 'Data Berhasil diupdate ke Server.'
                    ];

                    $this->response($message, REST_Controller::HTTP_OK);
                endif;
            }
        } else {
            $status = false;
            $message = $newClaim['metadata']['message'];

            $this->response(array('status' => $status, 'message' => $message), REST_Controller::HTTP_OK);
        }
    }

    // Khusus semua fungsi harus setclaim data terlebih dahulu
    private function set_claim_data_update()
    {
        $checkDataEklaim = '';
        $checkDataEklaim =  $this->m_detail_eklaim->getEklaim(safe_post('id_pendaftaran'));

        $num_array = [];

        foreach ($_POST as $key => $value) {
            if (preg_match('/^num_\d+$/', $key)) {
                $num_array[] = $value;
                unset($_POST[$key]);
            }
        }
        $_POST['num'] = $num_array;

        if (safe_post('jenis_rawat_type') == 'inap') {
            $jenis_rawat = 1;
        } else {
            $jenis_rawat = 2;
        }

        if (safe_post('tariff_class') == 'kelas_1') {
            $hak_kelas = 1;
        } else if (safe_post('tariff_class') == 'kelas_2') {
            $hak_kelas = 2;
        } else {
            $hak_kelas = 3;
        }

        $id_pendaftaran = safe_post('id_pendaftaran');
        $id_layanan_pendaftaran = safe_post('id_layanan_pendaftaran');
        $is_persalinan = safe_post('is_persalinan');
        $is_apgar = safe_post('is_apgar');

        // $this->_validasi();
        $data = array(
            'id_pendaftaran'                => safe_post('id_pendaftaran'),
            'id_layanan_pendaftaran'        => safe_post('id_layanan_pendaftaran'),
            'nomor_kartu'                   => safe_post('nomor_kartu'),
            'nomor_sep'                     => safe_post('nomor_sep'),
            'nomor_rm'                      => safe_post('nomor_rm'),
            'nama_pasien'                   => safe_post('nama_pasien'),
            'tgl_lahir'                     => safe_post('tgl_lahir'),
            'gender'                        => safe_post('gender'),
            'tgl_masuk'                     => safe_post('tgl_masuk'),
            'tgl_pulang'                    => safe_post('tgl_pulang'),
            'cara_masuk'                    => safe_post('gpr_cara_masuk'), // new update
            'jenis_rawat'                   => $jenis_rawat,
            'kelas_rawat'                   => $hak_kelas,
            'adl_sub_acute'                 => safe_post('gpr_sub_acute'),
            'adl_chronic'                   => safe_post('gpr_chronic'),
            'sistole'                       => safe_post('jkn_sistole') ?? NULL, // new update
            'diastole'                      => safe_post('jkn_diastole') ?? NULL, // new update
            'icu_indikator'                 => !empty(safe_post('icu_ind')) ? '1' : '0',
            'icu_los'                       => safe_post('gpr_icu_los'),
            // 'ventilator_hour'               => '0',
            'birth_weight'                  => safe_post('gpr_berat_lahir') == "" ? NULL : safe_post('gpr_berat_lahir'),
            'discharge_status'              => safe_post('gpr_cara_pulang'),
            'diagnosa'                      => safe_post('gpr_diagnosis'),
            'procedure'                     => safe_post('gpr_procedure'),
            'diagnosa_inagrouper'           => safe_post('gpr_diagnosis_inagrouper'), // new update
            'procedure_inagrouper'          => safe_post('gpr_procedure_inagrouper'), // new update
            'prosedur_non_bedah'            => str_replace('.', '', safe_post('prosedur_non_bedah')),
            'prosedur_bedah'                => str_replace('.', '', safe_post('prosedur_bedah')),
            'konsultasi'                    => str_replace('.', '', safe_post('konsultasi')),
            'tenaga_ahli'                   => str_replace('.', '', safe_post('tenaga_ahli')),
            'keperawatan'                   => str_replace('.', '', safe_post('keperawatan')),
            'penunjang'                     => str_replace('.', '', safe_post('penunjang')),
            'radiologi'                     => str_replace('.', '', safe_post('radiologi')),
            'laboratorium'                  => str_replace('.', '', safe_post('laboratorium')),
            'pelayanan_darah'               => str_replace('.', '', safe_post('pelayanan_darah')),
            'rehabilitasi'                  => str_replace('.', '', safe_post('rehabilitasi')),
            'kamar'                         => str_replace('.', '', safe_post('kamar')),
            'rawat_intensif'                => str_replace('.', '', safe_post('rawat_intensif')),
            'obat'                          => str_replace('.', '', safe_post('obat')),
            'obat_kronis'                   => str_replace('.', '', safe_post('obat_kronis')),
            'obat_kemoterapi'               => str_replace('.', '', safe_post('obat_kemoterapi')),
            'alkes'                         => str_replace('.', '', safe_post('alkes')),
            'bmhp'                          => str_replace('.', '', safe_post('bmhp')),
            'sewa_alat'                     => str_replace('.', '', safe_post('sewa_alat')),
            'nama_dokter'                   => safe_post('gpr_nama_dokter'),
            // 'is_pasien_tb'                  => !empty(safe_post('gpr_is_pasien_tb')) ? '1' : NULL, // new update
            // 'jkn_sitb_noreg'                => (safe_post('gpr_is_pasien_tb') == '1' ? safe_post('jkn_sitb_noreg') : NULL), // new update
            'is_apgar'                      => safe_post('is_apgar'), // new update
            'is_persalinan'                 => safe_post('is_persalinan'), // new update
            'cob_cd'                        => safe_post('gpr_cob') ?? null, // new update
            'is_hd'                         => 0, // new update
            'is_pasien_covid'               => !empty(safe_post('gpr_is_pasien_covid')) ? '1' : NULL, // new update
            'covid19_no_sep'                => (safe_post('gpr_is_pasien_covid') == '1' ? safe_post('covid19_no_sep') : NULL), // new update
            'kode_tarif'                    => safe_post('gpr_jenis_tarif'),
            'payor_id'                      => safe_post('gpr_cara_bayar'),
            'payor_cd'                      => $this->eklaim_bpjs_auto->getPayorCD(safe_post('gpr_cara_bayar')), //'JKN',
            'coder_nik'                     => $this->session->userdata('nik'),
            'created_at'                    => $this->datetime,
        );

        if ($jenis_rawat == '2' && !empty(safe_post('executive_class_ind'))) {
            $data['executive_class_ind'] = safe_post('executive_class_ind');
            $data['billing_amount_pex'] = safe_post('billing_amount_pex');
        }

        if ($jenis_rawat == '1') {
            if (!empty(safe_post('upgrade_class_ind'))) {
                $data['upgrade_class_ind'] = !empty(safe_post('upgrade_class_ind')) ? '1' : '0';
                $data['upgrade_class_class'] = safe_post('upgrade_class');
                $data['upgrade_class_los'] = safe_post('upgrade_class_los');
                $data['add_payment_pct'] = '0';
                $data['upgrade_class_payor'] = 'peserta';
            }
            if (!empty(safe_post('icu_ind'))) {
                $data['icu_indikator'] = safe_post('icu_ind') == '1' ? '1' : '0';
                $data['use_ind'] = !empty(safe_post('ventilator_use')) ? '1' : '0';
                $data['start_dttm'] = safe_post('ventilator_start_dttm');
                $data['stop_dttm'] = safe_post('ventilator_stop_dttm');
            }
        }

        if ($is_persalinan) {
            $data['usia_kehamilan'] = safe_post('jkn_usia_kehamilan') ?? 0;
            $data['gravida'] = safe_post('jkn_gravida') ?? 0;
            $data['partus'] = safe_post('jkn_partus') ?? 0;
            $data['abortus'] = safe_post('jkn_abortus') ?? 0;
            $data['onset_kontraksi'] = safe_post('jkn_onset_kontraksi');
            $deliveryData = [];

            if (!empty(safe_post('id_detail_kelahiran')) && is_array(safe_post('id_detail_kelahiran'))) {
                foreach (safe_post('id_detail_kelahiran') as $index => $id) {
                    $deliveryData[] = [
                        'id_detail_kelahiran' => safe_post('id_detail_kelahiran')[$index],
                        'delivery_sequence' => safe_post('num')[$index],
                        'delivery_method' => safe_post('delivery_method')[$index],
                        'delivery_dttm' => safe_post('delivery_dttm')[$index],
                        'use_manual' => safe_post('use_manual')[$index],
                        'use_forcep' => safe_post('use_forcep')[$index],
                        'use_vacuum' => safe_post('use_vacuum')[$index],
                        'letak_janin' => safe_post('letak_janin')[$index],
                        'kondisi' => safe_post('kondisi')[$index],
                        'shk_spesimen_ambil' => safe_post('shk_spesimen_ambil')[$index],
                        'shk_lokasi' => safe_post('shk_lokasi')[$index] ?: null, // Kosong jadi null
                        'shk_alasan' => safe_post('shk_alasan')[$index] ?: null,
                        'shk_spesimen_dttm' => safe_post('shk_spesimen_dttm')[$index] ?: null,
                    ];
                }
            }
            $data['deliveryData'] = $deliveryData;
        }

        if ($is_apgar) {
            $data['appearance_1'] = safe_post('jkn_apgar_1_appearance');
            $data['pulse_1'] = safe_post('jkn_apgar_1_pulse');
            $data['grimace_1'] = safe_post('jkn_apgar_1_grimace');
            $data['activity_1'] = safe_post('jkn_apgar_1_activity');
            $data['respiration_1'] = safe_post('jkn_apgar_1_respiration');
            $data['appearance_5'] = safe_post('jkn_apgar_5_appearance');
            $data['pulse_5'] = safe_post('jkn_apgar_5_pulse');
            $data['grimace_5'] = safe_post('jkn_apgar_5_grimace');
            $data['activity_5'] = safe_post('jkn_apgar_5_activity');
            $data['respiration_5'] = safe_post('jkn_apgar_5_respiration');
        }

        // Start Simpan HD (Dializer Use + Kantong Darah)
        $gpr_procedure_inagrouper = safe_post('gpr_procedure_inagrouper');
        $gpr_procedure = safe_post('gpr_procedure');

        $codes_inagrouper = explode("#", $gpr_procedure_inagrouper);
        $codes_procedure = explode("#", $gpr_procedure);

        $all_codes = array_merge($codes_inagrouper, $codes_procedure);

        if (in_array("39.95", $all_codes) || in_array(["99.04", "99.03"], $all_codes)) {
            if (in_array("39.95", $all_codes)) {
                $data['dializer_single_use'] = 1;
                $data['kantong_darah'] = $this->m_detail_eklaim->getJumlahKantongDarah($id_pendaftaran);
                $data['is_hd'] = 1;
            } else if (in_array("99.04", $all_codes) || in_array("99.03", $all_codes)) {
                $data['kantong_darah'] = safe_post('kantong_darah');
            }
        }
        // End simpan HD

        $status = false;
        $message = "Tidak terhubung ke server eKlaim.";

        // $newClaim = $this->eklaim_bpjs->newClaim($data);

        // if ($newClaim['metadata']['code'] == '200' || ($newClaim['metadata']['code'] == '400' && $newClaim['metadata']['message'] == 'Duplikasi nomor SEP')) {
        $setClaimData = $this->eklaim_bpjs->setClaimData($data);

        if ($setClaimData['metadata']['code'] != '200') {
            $status = false;
            $message = $setClaimData['metadata']['message'];

            $response = array('status' => $status, 'message' => $message);
            return $response;
        } else {

            $update = array(
                'no_sep'      => safe_post('nomor_sep'),
                'no_polish'   => safe_post('nomor_kartu')
            );

            $this->db->where("id", $id_layanan_pendaftaran)->update("sm_layanan_pendaftaran", $update);
            $this->db->where("id", $id_pendaftaran)->update("sm_pendaftaran", $update);

            if (empty($checkDataEklaim)) :
                $this->m_detail_eklaim->simpanDataeklaim($data);
                $status  = TRUE;
                $message = 'Data Berhasil disimpan ke Server.';

                $response = array('status' => $status, 'message' => $message);
                return $response;
            else :
                if ($is_persalinan) {
                    $this->m_detail_eklaim->simpanDataPersalinan($data, $checkDataEklaim->id);
                }
                $dataGrouper =  $this->db->get_where('sm_grouper_eklaim', ['id_pendaftaran' => ($id_pendaftaran)])->row();
                if (!empty($dataGrouper)) {
                    $this->db->where("id", $dataGrouper->id)->delete("sm_grouper_eklaim");
                    $this->db->where("id_pendaftaran", $id_pendaftaran)->update("sm_eklaim", ['response' => null]);
                }
                $id = $this->m_detail_eklaim->updateDataeklaim($data, safe_post('id_pendaftaran'));
                $status  = TRUE;
                $message = 'Data Berhasil diupdate ke Server.';

                $response = array('status' => $status, 'message' => $message);
                return $response;
            endif;
        }
        // } else {
        //     $status = false;
        //     $message = $newClaim['metadata']['message'];

        //     $response = array('status' => $status, 'message' => $message);
        //     return $response;
        // }
    }

    function set_kantong_darah_post()
    {
        $id_pendaftaran = safe_post('id_pendaftaran');
        $nomor_sep      = safe_post('nomor_sep');
        $kantong_darah  = safe_post('kantong_darah');
        $coder_nik      = $this->session->userdata('nik');

        if (!$id_pendaftaran || !$nomor_sep) {
            return $this->response([
                'status'  => false,
                'message' => 'ID pendaftaran dan Nomor SEP wajib diisi.'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }

        $data = [
            'nomor_sep'     => $nomor_sep,
            'coder_nik'     => $coder_nik,
            'payor_id'      => safe_post('gpr_cara_bayar'),
            'kantong_darah' => $kantong_darah
        ];

        // Set klaim data ke e-Klaim
        $setClaimData = $this->eklaim_bpjs->setClaimData($data);
        if (!isset($setClaimData['metadata']['code']) || $setClaimData['metadata']['code'] != '200') {
            return $this->response([
                'status'  => false,
                'message' => $setClaimData['metadata']['message'] ?? 'Gagal menyimpan data klaim.'
            ], REST_Controller::HTTP_OK);
        }

        // Grouping stage 1
        $grouperStage1 = $this->eklaim_bpjs->groupingStage1($nomor_sep);
        if (!isset($grouperStage1['metadata']['code']) || $grouperStage1['metadata']['code'] != '200') {
            return $this->response([
                'status'  => false,
                'message' => $grouperStage1['metadata']['message'] ?? 'Gagal grouping stage 1.'
            ], REST_Controller::HTTP_OK);
        }

        // Simpan ke database
        $this->db->trans_start();
        $this->db->where("id_pendaftaran", $id_pendaftaran)
            ->update("sm_eklaim", ['kantong_darah' => $kantong_darah]);
        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE) {
            return $this->response([
                'status'  => false,
                'message' => 'Gagal menyimpan data ke database.'
            ], REST_Controller::HTTP_OK);
        }

        return $this->response([
            'status'  => true,
            'message' => 'Klaim berhasil difinalisasi.'
        ], REST_Controller::HTTP_OK);
    }

    function grouping_stage_1_post()
    {
        if (!safe_post('id_pendaftaran')) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
        endif;

        // $data = safe_post();
        $setClaimData = $this->set_claim_data_update();

        if ($setClaimData['status'] === false) {
            $this->response($setClaimData, REST_Controller::HTTP_OK);
            return;
        }

        $id_pendaftaran = safe_post('id_pendaftaran');
        $nomor_sep = safe_post('nomor_sep');
        $coder_nik = $this->session->userdata('nik');
        $coder_name = $this->db->where("nik", $coder_nik)->get("sm_pegawai")->row()->nama;

        // $data = [
        //     'nomor_sep' => safe_post('nomor_sep'),
        //     'coder_nik' => $this->session->userdata('nik'),
        // ];

        $grouperStage1 = $this->eklaim_bpjs->groupingStage1($nomor_sep);

        if ($grouperStage1['metadata']['code'] == '200') {

            $this->db->where("id_pendaftaran", $id_pendaftaran)->update("sm_eklaim", [
                'method_status' => 'grouper',
                'response' => json_encode($grouperStage1)
            ]);

            $cekGroupingData = $this->db->where("id_pendaftaran", $id_pendaftaran)->get("sm_grouper_eklaim")->row();

            $data_respon = array(
                'id_pendaftaran'            => $id_pendaftaran,
                'id_eklaim'                 => safe_post('id_eklaim'),
                'cbg'                       => isset($grouperStage1['response']['cbg']) ? json_encode($grouperStage1['response']['cbg']) : NULL,
                'sub_acute'                 => isset($grouperStage1['response']['sub_acute']) ? json_encode($grouperStage1['response']['sub_acute']) : NULL,
                'chronic'                   => isset($grouperStage1['response']['chronic']) ? json_encode($grouperStage1['response']['chronic']) : NULL,
                'special_procedure'         => isset($grouperStage1['response']['special_procedure']) ? json_encode($grouperStage1['response']['special_procedure']) : NULL,
                'special_prosthesis'        => isset($grouperStage1['response']['special_prosthesis']) ? json_encode($grouperStage1['response']['special_prosthesis']) : NULL,
                'special_investigation'     => isset($grouperStage1['response']['special_investigation']) ? json_encode($grouperStage1['response']['special_investigation']) : NULL,
                'special_drug'              => isset($grouperStage1['response']['special_drug']) ? json_encode($grouperStage1['response']['special_drug']) : NULL,
                'status_dc'                 => isset($grouperStage1['response']['status_dc']) ? json_encode($grouperStage1['response']['status_dc']) : NULL,
                'kelas'                     => $grouperStage1['response']['kelas'] ?? NULL,
                'add_payment_amt'           => $grouperStage1['response']['add_payment_amt'] ?? NULL,
                'inacbg_version'            => $grouperStage1['response']['inacbg_version'] ?? NULL,
                'covid19_data'              => isset($grouperStage1['response']['covid19_data']) ? json_encode($grouperStage1['response']['covid19_data']) : NULL,
                'response_inagrouper'       => isset($grouperStage1['response_inagrouper']) ? json_encode($grouperStage1['response_inagrouper']) : NULL,
                'special_cmg_option'        => isset($grouperStage1['special_cmg_option']) ? json_encode($grouperStage1['special_cmg_option']) : NULL,
                'tarif_alt'                 => isset($grouperStage1['tarif_alt']) ? json_encode($grouperStage1['tarif_alt']) : NULL,
                'is_grouper_stage'          => 'stage_1',
                // 'special_cmg'               => isset($grouperStage1['response']['special_cmg']) ? json_encode($grouperStage1['response']['special_cmg']) : NULL,
                'cbg_code'                  => isset($grouperStage1['response']['cbg']['code']) ? $grouperStage1['response']['cbg']['code'] : NULL,
                'cbg_tarif'                 => isset($grouperStage1['response']['cbg']['tariff']) ? $grouperStage1['response']['cbg']['tariff'] : NULL,
                'created_at'                => $this->datetime,
                'coder_nik'                 => $coder_nik,
                'coder_name'                => $coder_name
            );

            if (!empty($cekGroupingData)) {
                $this->db->where("id_pendaftaran", $id_pendaftaran)->update("sm_grouper_eklaim", $data_respon);
            } else {
                $this->db->insert('sm_grouper_eklaim', $data_respon);
            }

            // if (!empty($data_respon['special_cmg_option'])) {
            //     $code = array_column($grouperStage1['special_cmg_option'], 'code');
            //     $special_cmg = count($code) > 1 ? implode('#', $code) : reset($code);

            //     $this->grouping_stage_2($id_pendaftaran, $nomor_sep, $special_cmg);
            // }

            $message = [
                'status'  => TRUE,
                'message' => 'Data klaim berhasil di Grouper.'
            ];

            $this->response($message, REST_Controller::HTTP_OK);
        } else {

            $status = false;
            $message = $grouperStage1['metadata']['message'];

            $this->response(array('status' => $status, 'message' => $message), REST_Controller::HTTP_OK);
        }
    }

    function grouping_stage_2_post()
    {
        $id_pendaftaran = safe_post('id_pendaftaran');
        $no_sep = safe_post('no_sep');
        $special_cmg = safe_post('special_cmg');
        $item_special = safe_post('item_special');

        $coder_nik = $this->session->userdata('nik');
        $coder_name = $this->db->where("nik", $coder_nik)->get("sm_pegawai")->row()->nama;
        $dataGrouper = $this->db->where("id_pendaftaran", $id_pendaftaran)->get("sm_grouper_eklaim")->row();

        $gpr_special_procedure = $dataGrouper->gpr_special_procedure;
        $gpr_special_prosthesis = $dataGrouper->gpr_special_prosthesis;
        $gpr_special_investigation = $dataGrouper->gpr_special_investigation;
        $gpr_special_drug = $dataGrouper->gpr_special_drug;

        if ($item_special == "YY") {
            $gpr_special_procedure = empty($special_cmg) ? NULL : $special_cmg;
        }
        if ($item_special == "RR") {
            $gpr_special_prosthesis = empty($special_cmg) ? NULL : $special_cmg;
        }
        if ($item_special == "ZZ") {
            $gpr_special_investigation = empty($special_cmg) ? NULL : $special_cmg;
        }
        if ($item_special == "DD") {
            $gpr_special_drug = empty($special_cmg) ? NULL : $special_cmg;
        }

        $special_cmg_option = implode("#", array_filter([
            $gpr_special_procedure,
            $gpr_special_investigation,
            $gpr_special_prosthesis,
            $gpr_special_drug
        ], 'strlen'));

        $grouperStage2 = $this->eklaim_bpjs->groupingStage2($no_sep, $special_cmg_option);

        if ($grouperStage2['metadata']['code'] == '200') {

            $specialCmgOptions = $grouperStage2['response']['special_cmg'] ?? []; // Pastikan tidak null
            if (is_array($specialCmgOptions) && count($specialCmgOptions) > 0) {

                if ($item_special == 'YY') {
                    $filteredCMGOption = array_filter($specialCmgOptions, function ($item) {
                        return strpos($item['code'], "YY") === 0; // Cek apakah kode diawali "YY"
                    });

                    if (!empty($filteredCMGOption)) {
                        $firstItem = reset($filteredCMGOption); // Ambil elemen pertama

                        $special_procedure = [
                            "code"          => $firstItem['code'],
                            "description"   => $firstItem['description'],
                            "tariff"        => $firstItem['tariff'],
                            "type"          => $firstItem['type']
                        ];
                        $code = $firstItem['code'];
                        $base_tariff = $firstItem['tariff'];
                    } else {
                        $special_procedure = null; // Jika tidak ada data
                        $code = '-';
                        $base_tariff = '0';
                    }
                }

                if ($item_special == 'RR') {
                    $filteredCMGOption = array_filter($specialCmgOptions, function ($item) {
                        return strpos($item['code'], "RR") === 0; // Cek apakah kode diawali "RR"
                    });

                    if (!empty($filteredCMGOption)) {
                        $firstItem = reset($filteredCMGOption); // Ambil elemen pertama

                        $special_prosthesis = [
                            "code"          => $firstItem['code'],
                            "description"   => $firstItem['description'],
                            "tariff"        => $firstItem['tariff'],
                            "type"          => $firstItem['type']
                        ];
                        $code = $firstItem['code'];
                        $base_tariff = $firstItem['tariff'];
                    } else {
                        $special_prosthesis = null; // Jika tidak ada data
                        $code = '-';
                        $base_tariff = '0';
                    }
                }

                if ($item_special == 'ZZ') {
                    $filteredCMGOption = array_filter($specialCmgOptions, function ($item) {
                        return strpos($item['code'], "ZZ") === 0; // Cek apakah kode diawali "ZZ"
                    });

                    if (!empty($filteredCMGOption)) {
                        $firstItem = reset($filteredCMGOption); // Ambil elemen pertama

                        $special_investigation = [
                            "code"          => $firstItem['code'],
                            "description"   => $firstItem['description'],
                            "tariff"        => $firstItem['tariff'],
                            "type"          => $firstItem['type']
                        ];
                        $code = $firstItem['code'];
                        $base_tariff = $firstItem['tariff'];
                    } else {
                        $special_investigation = null; // Jika tidak ada data
                        $code = '-';
                        $base_tariff = '0';
                    }
                }

                if ($item_special == 'DD') {
                    $filteredCMGOption = array_filter($specialCmgOptions, function ($item) {
                        return strpos($item['code'], "DD") === 0; // Cek apakah kode diawali "DD"
                    });

                    if (!empty($filteredCMGOption)) {
                        $firstItem = reset($filteredCMGOption); // Ambil elemen pertama

                        $special_drug = [
                            "code"          => $firstItem['code'],
                            "description"   => $firstItem['description'],
                            "tariff"        => $firstItem['tariff'],
                            "type"          => $firstItem['type']
                        ];
                        $code = $firstItem['code'];
                        $base_tariff = $firstItem['tariff'];
                    } else {
                        $special_drug = null; // Jika tidak ada data
                        $code = '-';
                        $base_tariff = '0';
                    }
                }
            } else {
                $special_procedure = null;
                $special_prosthesis = null;
                $special_investigation = null;
                $special_drug = null;
                $code = '-';
                $base_tariff = '0';
            }

            $this->db->where("id_pendaftaran", $id_pendaftaran)->update("sm_eklaim", [
                'response' => json_encode($grouperStage2)
            ]);

            $data_respon = array(
                'id_pendaftaran'            => $id_pendaftaran,
                'id_eklaim'                 => $dataGrouper->id_eklaim,
                'cbg'                       => isset($grouperStage2['response']['cbg']) ? json_encode($grouperStage2['response']['cbg']) : NULL,
                'sub_acute'                 => isset($grouperStage2['response']['sub_acute']) ? json_encode($grouperStage2['response']['sub_acute']) : NULL,
                'chronic'                   => isset($grouperStage2['response']['chronic']) ? json_encode($grouperStage2['response']['chronic']) : NULL,
                'special_procedure'         => !empty($special_procedure) ? json_encode($special_procedure) : NULL,
                'special_prosthesis'        => !empty($special_prosthesis) ? json_encode($special_prosthesis) : NULL,
                'special_investigation'     => !empty($special_investigation) ? json_encode($special_investigation) : NULL,
                'special_drug'              => !empty($special_drug) ? json_encode($special_drug) : NULL,
                'status_dc'                 => isset($grouperStage2['response']['status_dc']) ? json_encode($grouperStage2['response']['status_dc']) : NULL,
                'kelas'                     => $grouperStage2['response']['kelas'] ?? NULL,
                'add_payment_amt'           => $grouperStage2['response']['add_payment_amt'] ?? NULL,
                'inacbg_version'            => $grouperStage2['response']['inacbg_version'] ?? NULL,
                'covid19_data'              => isset($grouperStage2['response']['covid19_data']) ? json_encode($grouperStage2['response']['covid19_data']) : NULL,
                'response_inagrouper'       => isset($grouperStage2['response_inagrouper']) ? json_encode($grouperStage2['response_inagrouper']) : NULL,
                'special_cmg_option'        => isset($grouperStage2['special_cmg_option']) ? json_encode($grouperStage2['special_cmg_option']) : NULL,
                'tarif_alt'                 => isset($grouperStage2['tarif_alt']) ? json_encode($grouperStage2['tarif_alt']) : NULL,
                'is_grouper_stage'          => 'stage_2',
                'special_cmg'               => isset($grouperStage2['response']['special_cmg']) ? json_encode($grouperStage2['response']['special_cmg']) : NULL,
                'cbg_code'                  => isset($grouperStage2['response']['cbg']['code']) ? $grouperStage2['response']['cbg']['code'] : NULL,
                'cbg_tarif'                 => isset($grouperStage2['response']['cbg']['tariff']) ? $grouperStage2['response']['cbg']['tariff'] : NULL,
                'gpr_special_procedure'     => $gpr_special_procedure,
                'gpr_special_investigation' => $gpr_special_investigation,
                'gpr_special_prosthesis'    => $gpr_special_prosthesis,
                'gpr_special_drug'          => $gpr_special_drug
            );

            $this->db->where("id_pendaftaran", $id_pendaftaran)->update("sm_grouper_eklaim", $data_respon);

            $message = [
                'status'  => TRUE,
                'message' => 'Data klaim berhasil di Grouper.',
                'code' => $code,
                'tariff' => $data_respon['cbg_tarif'],
                'base_tariff' => $base_tariff
            ];

            $this->response($message, REST_Controller::HTTP_OK);
        } else {

            $status = false;
            $message = $grouperStage2['metadata']['message'];

            $this->response(array('status' => $status, 'message' => $message), REST_Controller::HTTP_OK);
        }
    }

    function claim_final_post()
    {
        $id_pendaftaran = safe_post('id_pendaftaran');
        if (!$id_pendaftaran) {
            return $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST);
        }

        $nomor_sep = safe_post('nomor_sep');
        $coder_nik = $this->session->userdata('nik');

        $claimFinal = $this->eklaim_bpjs->claimFinal($nomor_sep, $coder_nik);

        if ($claimFinal['metadata']['code'] != '200') {
            return $this->response([
                'status' => false,
                'message' => $claimFinal['metadata']['message']
            ], REST_Controller::HTTP_OK);
        }

        // Mulai transaksi database
        $this->db->trans_start();

        $this->db->where("id_pendaftaran", $id_pendaftaran)->update("sm_eklaim", [
            'status_bridging' => 'final',
            'method_status' => 'final'
        ]);

        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) {
            return $this->response([
                'status' => false,
                'message' => 'Gagal finalisasi data klaim.'
            ], REST_Controller::HTTP_OK);
        }

        return $this->response([
            'status'  => true,
            'message' => 'Final klaim berhasil.'
        ], REST_Controller::HTTP_OK);
    }

    function reedit_claim_post()
    {
        $nomor_sep     = safe_post('nomor_sep');
        $id_pendaftaran = safe_post('id_pendaftaran');
        if (!$nomor_sep) {
            return $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST);
        }

        $reeditClaim = $this->eklaim_bpjs->reeditClaim($nomor_sep);

        if ($reeditClaim['metadata']['code'] != '200') {
            return $this->response([
                'status' => false,
                'message' => $reeditClaim['metadata']['message']
            ], REST_Controller::HTTP_OK);
        }

        // Mulai transaksi database
        $this->db->trans_start();

        $this->db->where("id_pendaftaran", $id_pendaftaran)->update("sm_eklaim", [
            'status_bridging' => 'normal',
            'method_status' => 'grouper'
        ]);

        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) {
            return $this->response([
                'status' => false,
                'message' => 'Gagal edit ulang data klaim.'
            ], REST_Controller::HTTP_OK);
        }

        return $this->response([
            'status'  => true,
            'message' => 'Edit ulang data klaim berhasil.'
        ], REST_Controller::HTTP_OK);
    }

    function send_claim_individual_post()
    {
        $nomor_sep     = safe_post('nomor_sep');
        $id_pendaftaran = safe_post('id_pendaftaran');
        if (!$nomor_sep) {
            return $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST);
        }

        $sendClaimIndividual = $this->eklaim_bpjs->sendClaimIndividual($nomor_sep);

        if ($sendClaimIndividual['metadata']['code'] != '200') {
            return $this->response([
                'status' => false,
                'message' => $sendClaimIndividual['metadata']['message']
            ], REST_Controller::HTTP_OK);
        }

        // Mulai transaksi database
        $this->db->trans_start();

        $this->db->where("id_pendaftaran", $id_pendaftaran)->update("sm_eklaim", [
            'status_bridging'   => 'terkirim',
            'method_status'     => 'send_claim_individual',
            'response'          => json_encode($sendClaimIndividual)
        ]);

        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) {
            return $this->response([
                'status' => false,
                'message' => 'Gagal edit ulang data klaim.'
            ], REST_Controller::HTTP_OK);
        }

        return $this->response([
            'status'  => true,
            'message' => 'Edit ulang data klaim berhasil.'
        ], REST_Controller::HTTP_OK);
    }

    function sitb_validate_post()
    {
        $id_pendaftaran = safe_post('id_pendaftaran');
        if (!$id_pendaftaran) {
            return $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST);
        }

        $nomor_sep = safe_post('no_sep');
        $no_register = safe_post('no_reg_sitb');
        $val_validasi = safe_post('val_validasi');

        $validasiSITB = $this->eklaim_bpjs->sitbValidate($nomor_sep, $no_register);

        if ($validasiSITB['response']['status'] != 'VALID') {
            return $this->response([
                'status' => false,
                'message' => $validasiSITB['response']['detail']
            ], REST_Controller::HTTP_OK);
        }

        // Mulai transaksi database
        $this->db->trans_start();

        $this->db->where("id_pendaftaran", $id_pendaftaran)->update("sm_eklaim", [
            'is_pasien_tb' => '1',
            'jkn_sitb_noreg' => $no_register,
            'validasi_sitb' => $val_validasi
        ]);

        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) {
            return $this->response([
                'status' => false,
                'message' => 'Gagal simpan validasi SITB.'
            ], REST_Controller::HTTP_OK);
        }

        return $this->response([
            'status'  => true,
            'message' => 'Validasi No. Register SITB berhasil.',
            'data' => $validasiSITB['response']['validation']['data']
        ], REST_Controller::HTTP_OK);
    }

    function sitb_invalidate_post()
    {
        $id_pendaftaran = safe_post('id_pendaftaran');
        if (!$id_pendaftaran) {
            return $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST);
        }

        $nomor_sep = safe_post('no_sep');
        $no_register = safe_post('no_reg_sitb');

        $invalidasiSITB = $this->eklaim_bpjs->sitbInvalidate($nomor_sep, $no_register);

        if ($invalidasiSITB['metadata']['code'] != '200') {
            return $this->response([
                'status' => false,
                'message' => $invalidasiSITB['response']['detail']
            ], REST_Controller::HTTP_OK);
        }

        // Mulai transaksi database
        $this->db->trans_start();

        $this->db->where("id_pendaftaran", $id_pendaftaran)->update("sm_eklaim", [
            'is_pasien_tb' => null,
            'jkn_sitb_noreg' => $no_register,
            'validasi_sitb' => null
        ]);

        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) {
            return $this->response([
                'status' => false,
                'message' => 'Gagal simpan invalidasi SITB.'
            ], REST_Controller::HTTP_OK);
        }

        return $this->response([
            'status'  => true,
            'message' => 'Pembatalan validasi No. Register SITB berhasil.'
        ], REST_Controller::HTTP_OK);
    }

    function send_claim_get()
    {
        $data = [
            'start_dt'      => safe_get('start_dt'),
            'stop_dt'       => safe_get('stop_dt'),
            'jenis_rawat'   => safe_get('jenis_rawat'),
            'date_type'     => safe_get('date_type'),
        ];

        $data = $this->eklaim_bpjs->sendClaim($data);

        if ($data) :
            $this->response($data, REST_Controller::HTTP_OK); // (200)
        endif;
    }



    function get_claim_status_get()
    {
        $sep = $this->get('no_sep');
        $post = ['nomor_sep' => $sep];

        $data = $this->eklaim_bpjs->getClaimStatus($post);

        if ($data) :
            $this->response($data, REST_Controller::HTTP_OK); // (200)
        endif;
    }

    public function cetak_klaim_post()
    {
        $nomor_sep = $this->post('nomor_sep');

        if (empty($nomor_sep)) {
            return $this->response([
                'status' => false,
                'message' => 'Nomor SEP harus diisi'
            ], REST_Controller::HTTP_BAD_REQUEST); // (400)
        }

        $claim_print = $this->eklaim_bpjs->cetakKlaim($nomor_sep);

        if (!isset($claim_print['metadata']) || $claim_print['metadata']['code'] != '200') {
            return $this->response([
                'status' => false,
                'message' => $claim_print['metadata']['message'] ?? 'Terjadi kesalahan saat mencetak klaim'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }

        return $this->response([
            'status' => true,
            'message' => 'Cetak klaim berhasil',
            'data' => $claim_print['data']
        ], REST_Controller::HTTP_OK);
    }


    function pull_claim_get()
    {
        $data = [
            'start_dt'      => safe_get('tanggal_awal'),
            'stop_dt'       => safe_get('tanggal_akhir'),
            'jenis_rawat'   => safe_get('jenis_rawat'),
        ];

        $data = $this->eklaim_bpjs->pullClaim($data);

        highlight_string("<?php\n " . var_export($data, true) . "?>");
        die;

        if ($data) :
            $this->response($data, REST_Controller::HTTP_OK); // (200)
        endif;
    }



    function search_diagnosa_get()
    {
        $data = [
            'keyword'      => safe_get('keyword')
        ];

        $data = $this->eklaim_bpjs_auto->searchDiagnosis($data);

        highlight_string("<?php\n " . var_export($data, true) . "?>");
        die;

        if ($data) :
            $this->response($data, REST_Controller::HTTP_OK); // (200)
        endif;
    }

    function search_prosedur_get()
    {
        $data = [
            'keyword'      => safe_get('keyword')
        ];

        $data = $this->eklaim_bpjs_auto->searchProcedures($data);

        highlight_string("<?php\n " . var_export($data, true) . "?>");
        die;

        if ($data) :
            $this->response($data, REST_Controller::HTTP_OK); // (200)
        endif;
    }


    function get_detail_layanan_eclaim_get()
    {

        $this->load->model('pendaftaran/Pendaftaran_model', 'm_pendaftaran');
        $this->load->model('keuangan/Keuangan_model', 'm_keuangan');
        $this->load->model('rekap_billing/Rekap_billing_model', 'm_rekap_billing');
        $this->load->model('pengkodean_icd_x/Pengkodean_icd_x_model', 'm_pengkodean_icd_x');

        $data['pendaftaran'] = [];
        $data['eclaim'] = [];
        $data['pendaftaran'] = $this->m_detail_eklaim->getPendaftaranByIdPendaftaran($this->get('id'));
        $data['status_eklaim'] = $this->m_detail_eklaim->getEklaim($this->get('id'));
        $data['status_eklaim']->response = json_decode($data['status_eklaim']->response, true);
        $data['status_grouper'] = $this->m_detail_eklaim->getDataGrouper($this->get('id'));
        $data['apgar_score'] = $this->db->get_where('sm_apgar_score', ['id_pendaftaran' => ($this->get('id'))])->row();
        $data['data_kelahiran'] = $this->m_detail_eklaim->getKelahiranEklaim($this->get('id'));
        $data['eclaim'] = $this->m_detail_eklaim->getDetailEkalim($this->get('id'));
        // $data['diagnosa_full'] = $this->m_pengkodean_icd_x->getDiagnosa($this->get('id_layanan_pendaftaran'));
        // $data['kode_diagnosa'] = $this->m_pengkodean_icd_x->getKodeDiagnosa($this->get('id'));
        // $data['diagnosa_utama'] = $this->m_pengkodean_icd_x->getDiagnosaUtama($this->get('id'));
        // $data['diagnosa_sekunder'] = $this->m_pengkodean_icd_x->getDiagnosaSekunder($this->get('id'));
        // TAG BARU
        $data['diagnosa'] = $this->m_detail_eklaim->getDiagnosa($this->get('id'));
        $data['procedure'] = $this->m_detail_eklaim->getProsedur($this->get('id'));
        // $data['kode_prosedur_tindakan'] = $this->m_pengkodean_icd_x->getKodeProsedurTindakan($this->get('id'));
        // $data['prosedur_tindakan'] = $this->m_pengkodean_icd_x->getProsedurTindakan($this->get('id'));
        $data['tindakan_ok'] = $this->m_pengkodean_icd_x->getProsedureTindakanOK($this->get('id'));
        $data['tindakan_lab'] = $this->m_pengkodean_icd_x->getProsedureTindakanLab($this->get('id'));
        $data['tindakan_rad'] = $this->m_pengkodean_icd_x->getProsedureTindakanRad($this->get('id'));

        if ($data) :
            $this->response($data, REST_Controller::HTTP_OK); // (200)
        endif;
    }
    
    private function getEklaimComponent($type, $source, $prefix = 'UNU', $isINA = false)
    {
        $result = [];
        // $this->load->driver('cache');
        $this->load->driver('cache', ['adapter' => 'file']);


        if (empty($source)) {
            return $result;
        }

        // Bersihkan dan pecah kode
        $source = str_replace('*', '', $source);
        $codes = array_unique(explode('#', $source));

        foreach ($codes as $index => $code) {
            $cleanCode = str_replace(['*', '+', ' '], '', $code);
            $cacheKey = "{$type}_" . md5($cleanCode);
            $nama = $this->cache->get($cacheKey);

            if (!$nama) {
                $param = ['keyword' => $cleanCode];

                if ($type === 'diagnosa') {
                    $search = $this->eklaim_bpjs_auto->searchDiagnosis($param);
                    if (!empty($search['response']['data']) && $search['response']['data'] !== 'EMPTY') {
                        $nama = $search['response']['data'][0][0];
                    } elseif ($isINA) {
                        $alt = $this->eklaim_bpjs_auto->searchDiagnosisINA($param);
                        $nama = !empty($alt['response']['data'][0]['description']) ? $alt['response']['data'][0]['description'] : '-';
                    }
                } elseif ($type === 'prosedur') {
                    $search = $this->eklaim_bpjs_auto->searchProcedures($param);
                    if (!empty($search['response']['data']) && $search['response']['data'] !== 'EMPTY') {
                        $nama = $search['response']['data'][0][0];
                    } elseif ($isINA) {
                        $alt = $this->eklaim_bpjs_auto->searchProceduresINA($param);
                        $nama = !empty($alt['response']['data'][0]['description']) ? $alt['response']['data'][0]['description'] : '-';
                    }
                }

                // Simpan cache jika ditemukan nama
                if (!empty($nama)) {
                    $this->cache->save($cacheKey, $nama, 600); // 10 menit
                } else {
                    $nama = '-';
                }
            }

            $result[] = [
                'id' => $prefix . ($index + 1),
                'code' => $code,
                'nama' => $nama
            ];
        }

        return $result;
    }

    public function get_all_eklaim_data_get()
    {
        $id = $this->get('id');
        $status_klaim = $this->get('status_klaim');

        if (!$id) {
            return $this->response(['error' => 'ID tidak ditemukan'], REST_Controller::HTTP_BAD_REQUEST);
        }

        $data_eklaim = $this->m_detail_eklaim->getEklaim($id);
        $isKlaim = !empty($status_klaim);

        // Diagnosa & Prosedur dari field e-Klaim (jika tersedia)
        $diagnosa_unu = $isKlaim
            ? $this->getEklaimComponent('diagnosa', $data_eklaim->diagnosa ?? '', 'UNU', false)
            : $this->m_detail_eklaim->getDiagnosa($id);

        $diagnosa_ina = $isKlaim
            ? $this->getEklaimComponent('diagnosa', $data_eklaim->diagnosa_inagrouper ?? '', 'INA', true)
            : $this->m_detail_eklaim->getDiagnosa($id);

        $prosedur_unu = $isKlaim
            ? $this->getEklaimComponent('prosedur', $data_eklaim->procedure ?? '', 'UNU', false)
            : $this->m_detail_eklaim->getProsedur($id);

        $prosedur_ina = $isKlaim
            ? $this->getEklaimComponent('prosedur', $data_eklaim->procedure_inagrouper ?? '', 'INA', true)
            : $this->m_detail_eklaim->getProsedur($id);

        $response = [
            'diagnosa_unu' => $diagnosa_unu,
            'diagnosa_ina' => $diagnosa_ina,
            'prosedur_unu' => $prosedur_unu,
            'prosedur_ina' => $prosedur_ina,
        ];

        return $this->response($response, REST_Controller::HTTP_OK);
    }

    function get_diagnosa_unu_get()
    {
        if (!$this->get('id')) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
        endif;

        $id = $this->get('id');
        $status_klaim = $this->get('status_klaim');

        if (!empty($status_klaim)) {
            $data = $this->m_detail_eklaim->getDiagnosaEklaim($id);
        } else {
            $data = $this->m_detail_eklaim->getDiagnosa($id);
        }

        $this->response($data, REST_Controller::HTTP_OK); // (200)
    }

    function get_prosedur_unu_get()
    {
        if (!$this->get('id')) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
        endif;

        $id = $this->get('id');
        $status_klaim = $this->get('status_klaim');

        if (!empty($status_klaim)) {
            $data = $this->m_detail_eklaim->getProsedurEklaim($id);
        } else {
            $data = $this->m_detail_eklaim->getProsedur($id);
        }

        $this->response($data, REST_Controller::HTTP_OK); // (200)
    }

    function get_diagnosa_ina_get()
    {
        if (!$this->get('id')) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
        endif;

        $id = $this->get('id');
        $status_klaim = $this->get('status_klaim');

        if (!empty($status_klaim)) {
            $data = $this->m_detail_eklaim->getDiagnosaEklaimINA($id);
        } else {
            $data = $this->m_detail_eklaim->getDiagnosa($id);
        }

        $this->response($data, REST_Controller::HTTP_OK); // (200)
    }

    function get_prosedur_ina_get()
    {
        if (!$this->get('id')) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
        endif;

        $id = $this->get('id');
        $status_klaim = $this->get('status_klaim');

        if (!empty($status_klaim)) {
            $data = $this->m_detail_eklaim->getProsedurEklaimINA($id);
        } else {
            $data = $this->m_detail_eklaim->getProsedur($id);
        }

        $this->response($data, REST_Controller::HTTP_OK); // (200)
    }

    function backToSetClaimData($id_pendaftaran)
    {
        $this->db->where('id_pendaftaran', $id_pendaftaran)->update('sm_eklaim', [
            'status_bridging'   => 'normal',
            'method_status'     => 'set_claim_data',
        ]);
    }

    // Diagnosa
    function tambah_diagnosa_post()
    {
        if (!safe_post('id_pendaftaran')) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
        endif;

        $id_pendaftaran = safe_post('id_pendaftaran');
        $listDiagnosa = safe_post('list_diagnosa');
        $kode = safe_post('kode');

        if ($listDiagnosa !== "" && in_array($kode, explode('#', $listDiagnosa))) {
            $this->response([
                'status' => false,
                'message' => 'Kode diagnosa sudah ada dalam daftar.',
                'ket' => 'Info',
                'listDiagnosa' => $listDiagnosa
            ], REST_Controller::HTTP_OK);
            return;
        }
        $addDiagnosa = empty($listDiagnosa) ? $kode : $listDiagnosa . '#' . $kode;

        if (safe_post('jenis') == 'unu') {
            $tambahDiagnosa = $this->db->where("id_pendaftaran", $id_pendaftaran)->update("sm_eklaim", ['diagnosa' => $addDiagnosa]);
        } else {
            $tambahDiagnosa = $this->db->where("id_pendaftaran", $id_pendaftaran)->update("sm_eklaim", ['diagnosa_inagrouper' => $addDiagnosa]);
        }

        if ($tambahDiagnosa) :
            $this->backToSetClaimData($id_pendaftaran);

            $this->response(array(
                'status' => true,
                'message' => 'Data Diagnosa berhasil ditambahkan.',
                'ket' => 'Success',
                'listDiagnosa' => $addDiagnosa
            ), REST_Controller::HTTP_OK);
        else :
            $this->response(array(
                'status' => false,
                'message' => 'Data Diagnosa gagal ditambahkan.',
                'ket' => 'Error'
            ), REST_Controller::HTTP_OK);
        endif;
    }

    function ubah_diagnosa_post()
    {
        if (!safe_post('id_pendaftaran')) {
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
            return;
        }

        $id_pendaftaran = safe_post('id_pendaftaran');
        $listDiagnosa = safe_post('list_diagnosa');
        $kode = safe_post('kode');
        $listNo = (int) safe_post('list_no') - 1;

        $diagnosaArray = $listDiagnosa !== "" ? explode('#', $listDiagnosa) : [];

        if (!isset($diagnosaArray[$listNo])) {
            $this->response([
                'status' => false,
                'message' => 'Nomor diagnosa tidak valid.',
                'ket' => 'Info',
                'listDiagnosa' => $listDiagnosa
            ], REST_Controller::HTTP_OK);
            return;
        }

        if (in_array($kode, $diagnosaArray)) {
            $this->response([
                'status' => false,
                'message' => 'Kode diagnosa sudah ada dalam daftar.',
                'ket' => 'Info',
                'listDiagnosa' => $listDiagnosa
            ], REST_Controller::HTTP_OK);
            return;
        }

        $diagnosaArray[$listNo] = $kode;
        $ubahDiagnosa = implode('#', $diagnosaArray);

        if (safe_post('jenis') == 'unuUNU') {
            $diagnosa = $this->db->where("id_pendaftaran", $id_pendaftaran)->update("sm_eklaim", ['diagnosa' => $ubahDiagnosa]);
        } else {
            $diagnosa = $this->db->where("id_pendaftaran", $id_pendaftaran)->update("sm_eklaim", ['diagnosa_inagrouper' => $ubahDiagnosa]);
        }

        if ($diagnosa) {
            $this->backToSetClaimData($id_pendaftaran);

            $this->response([
                'status' => true,
                'message' => 'Data Diagnosa berhasil diubah.',
                'ket' => 'Success',
                'listDiagnosa' => $ubahDiagnosa
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'status' => false,
                'message' => 'Data Diagnosa gagal diubah.',
                'ket' => 'Error'
            ], REST_Controller::HTTP_OK);
        }
    }

    function hapus_diagnosa_post()
    {
        if (!safe_post('id_pendaftaran')) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
        endif;

        $id_pendaftaran = safe_post('id_pendaftaran');
        $listDiagnosa = safe_post('list_diagnosa');
        $hapusDiagnosa = safe_post('kode');
        $diagnosa_array = explode('#', $listDiagnosa);

        $diagnosa_array = array_filter($diagnosa_array, function ($kode) use ($hapusDiagnosa) {
            return $kode !== $hapusDiagnosa;
        });
        $updateDiagnosa = implode('#', $diagnosa_array);

        if (safe_post('jenis') == 'unu') {
            $diagnosa = $this->db->where("id_pendaftaran", $id_pendaftaran)->update("sm_eklaim", ['diagnosa' => $updateDiagnosa]);
        } else {
            $diagnosa = $this->db->where("id_pendaftaran", $id_pendaftaran)->update("sm_eklaim", ['diagnosa_inagrouper' => $updateDiagnosa]);
        }

        if ($diagnosa) :
            $this->backToSetClaimData($id_pendaftaran);

            $this->response(array('status' => true, 'message' => 'Data Diagnosa berhasil dihapus.', 'listDiagnosa' => $updateDiagnosa), REST_Controller::HTTP_OK);
        else :
            $this->response(array('status' => false, 'message' => 'Data Diagnosa gagal dihapus.'), REST_Controller::HTTP_OK);
        endif;
    }

    function set_primary_diagnosa_post()
    {
        if (!safe_post('id_pendaftaran')) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
        endif;

        $id_pendaftaran = safe_post('id_pendaftaran');
        $listDiagnosa = safe_post('list_diagnosa');
        $setDiagnosaPrimary = safe_post('kode');
        $diagnosa_array = explode('#', $listDiagnosa);

        $index = array_search($setDiagnosaPrimary, $diagnosa_array);
        if ($index !== false) {
            unset($diagnosa_array[$index]);
        }
        array_unshift($diagnosa_array, $setDiagnosaPrimary);
        $updateDiagnosa = implode('#', $diagnosa_array);

        if (safe_post('jenis') == 'unu') {
            $diagnosa = $this->db->where("id_pendaftaran", $id_pendaftaran)->update("sm_eklaim", ['diagnosa' => $updateDiagnosa]);
        } else {
            $diagnosa = $this->db->where("id_pendaftaran", $id_pendaftaran)->update("sm_eklaim", ['diagnosa_inagrouper' => $updateDiagnosa]);
        }

        if ($diagnosa) :
            $this->backToSetClaimData($id_pendaftaran);

            $this->response(array('status' => true, 'message' => 'Data Diagnosa Primer berhasil diubah.', 'listDiagnosa' => $updateDiagnosa), REST_Controller::HTTP_OK);
        else :
            $this->response(array('status' => false, 'message' => 'Data Diagnosa Primer gagal diubah.'), REST_Controller::HTTP_OK);
        endif;
    }

    // Prosedur
    function tambah_prosedur_post()
    {
        if (!safe_post('id_pendaftaran')) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
        endif;

        $id_pendaftaran = safe_post('id_pendaftaran');
        $listProsedur = safe_post('list_prosedur');
        $kode = safe_post('kode');

        if ($listProsedur !== "" && in_array($kode, explode('#', $listProsedur))) {
            $this->response([
                'status' => false,
                'message' => 'Kode Prosedur sudah ada dalam daftar.',
                'ket' => 'Info',
                'listProsedur' => $listProsedur
            ], REST_Controller::HTTP_OK);
            return;
        }
        $addProsedur = empty($listProsedur) ? $kode : $listProsedur . '#' . $kode;

        if (safe_post('jenis') == 'unu') {
            $tambahProsedur = $this->db->where("id_pendaftaran", $id_pendaftaran)->update("sm_eklaim", ['procedure' => $addProsedur]);
        } else {
            $tambahProsedur = $this->db->where("id_pendaftaran", $id_pendaftaran)->update("sm_eklaim", ['procedure_inagrouper' => $addProsedur]);
        }

        if ($tambahProsedur) :
            $this->backToSetClaimData($id_pendaftaran);

            $this->response(array(
                'status' => true,
                'message' => 'Data Prosedur berhasil ditambahkan.',
                'ket' => 'Success',
                'listProsedur' => $addProsedur
            ), REST_Controller::HTTP_OK);
        else :
            $this->response(array(
                'status' => false,
                'message' => 'Data Prosedur gagal ditambahkan.',
                'ket' => 'Error'
            ), REST_Controller::HTTP_OK);
        endif;
    }

    function ubah_prosedur_post()
    {
        if (!safe_post('id_pendaftaran')) {
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
            return;
        }

        $id_pendaftaran = safe_post('id_pendaftaran');
        $listProsedur = safe_post('list_prosedur');
        $kode = safe_post('kode');
        $listNo = (int) safe_post('list_no') - 1;

        $prosedurArray = $listProsedur !== "" ? explode('#', $listProsedur) : [];

        if (!isset($prosedurArray[$listNo])) {
            $this->response([
                'status' => false,
                'message' => 'Nomor prosedur tidak valid.',
                'ket' => 'Info',
                'listProsedur' => $listProsedur
            ], REST_Controller::HTTP_OK);
            return;
        }

        if (in_array($kode, $prosedurArray)) {
            $this->response([
                'status' => false,
                'message' => 'Kode prosedur sudah ada dalam daftar.',
                'ket' => 'Info',
                'listProsedur' => $listProsedur
            ], REST_Controller::HTTP_OK);
            return;
        }

        $prosedurArray[$listNo] = $kode;
        $ubahProsedur = implode('#', $prosedurArray);

        if (safe_post('jenis') == 'unuUNU') {
            $prosedur = $this->db->where("id_pendaftaran", $id_pendaftaran)->update("sm_eklaim", ['procedure' => $ubahProsedur]);
        } else {
            $prosedur = $this->db->where("id_pendaftaran", $id_pendaftaran)->update("sm_eklaim", ['procedure_inagrouper' => $ubahProsedur]);
        }

        if ($prosedur) {
            $this->backToSetClaimData($id_pendaftaran);

            $this->response([
                'status' => true,
                'message' => 'Data Prosedur berhasil diubah.',
                'ket' => 'Success',
                'listProsedur' => $ubahProsedur
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'status' => false,
                'message' => 'Data Prosedur gagal diubah.',
                'ket' => 'Error'
            ], REST_Controller::HTTP_OK);
        }
    }

    function hapus_prosedur_post()
    {
        if (!safe_post('id_pendaftaran')) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
        endif;

        $id_pendaftaran = safe_post('id_pendaftaran');
        $listProsedur = safe_post('list_prosedur');
        $hapusProsedur = safe_post('kode');
        $prosedur_array = explode('#', $listProsedur);

        $prosedur_array = array_filter($prosedur_array, function ($kode) use ($hapusProsedur) {
            return $kode !== $hapusProsedur;
        });
        $updateProsedur = implode('#', $prosedur_array);

        if (safe_post('jenis') == 'unu') {
            $prosedur = $this->db->where("id_pendaftaran", $id_pendaftaran)->update("sm_eklaim", ['procedure' => $updateProsedur]);
        } else {
            $prosedur = $this->db->where("id_pendaftaran", $id_pendaftaran)->update("sm_eklaim", ['procedure_inagrouper' => $updateProsedur]);
        }

        if ($prosedur) :
            $this->backToSetClaimData($id_pendaftaran);

            $this->response(array('status' => true, 'message' => 'Data Prosedur berhasil dihapus.', 'listProsedur' => $updateProsedur), REST_Controller::HTTP_OK);
        else :
            $this->response(array('status' => false, 'message' => 'Data Prosedur gagal dihapus.'), REST_Controller::HTTP_OK);
        endif;
    }

    function set_primary_prosedur_post()
    {
        if (!safe_post('id_pendaftaran')) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
        endif;

        $id_pendaftaran = safe_post('id_pendaftaran');
        $listProsedur = safe_post('list_prosedur');
        $setProsedurPrimary = safe_post('kode');
        $prosedur_array = explode('#', $listProsedur);

        $index = array_search($setProsedurPrimary, $prosedur_array);
        if ($index !== false) {
            unset($prosedur_array[$index]);
        }
        array_unshift($prosedur_array, $setProsedurPrimary);
        $updateProsedur = implode('#', $prosedur_array);

        if (safe_post('jenis') == 'unu') {
            $prosedur = $this->db->where("id_pendaftaran", $id_pendaftaran)->update("sm_eklaim", ['procedure' => $updateProsedur]);
        } else {
            $prosedur = $this->db->where("id_pendaftaran", $id_pendaftaran)->update("sm_eklaim", ['procedure_inagrouper' => $updateProsedur]);
        }

        if ($prosedur) :
            $this->backToSetClaimData($id_pendaftaran);

            $this->response(array('status' => true, 'message' => 'Data Prosedur Primer berhasil diubah.', 'listProsedur' => $updateProsedur), REST_Controller::HTTP_OK);
        else :
            $this->response(array('status' => false, 'message' => 'Data Prosedur Primer gagal diubah.'), REST_Controller::HTTP_OK);
        endif;
    }
    // end Prosedur

    public function hapus_data_eklaim_post()
    {
        $id_pendaftaran = safe_post('id_pendaftaran');
        if (!$id_pendaftaran) {
            return $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST);
        }

        $data = [
            'nomor_sep' => safe_post('nomor_sep'),
            'coder_nik' => $this->session->userdata('nik'),
        ];

        $hapusClaim = $this->eklaim_bpjs->deleteClaim($data);

        if ($hapusClaim['metadata']['code'] != '200') {
            return $this->response([
                'status' => false,
                'message' => $hapusClaim['metadata']['message']
            ], REST_Controller::HTTP_OK);
        }

        // Mulai transaksi database
        $this->db->trans_start();

        $dataPersalinan = $this->db->get_where('sm_kelahiran_eklaim', ['id_pendaftaran' => $id_pendaftaran])->row();
        $dataGrouper = $this->db->get_where('sm_grouper_eklaim', ['id_pendaftaran' => $id_pendaftaran])->row();

        if (isset($dataPersalinan->id)) {
            $cekDetailPersalinan = $this->db->get_where('sm_detail_kelahiran_eklaim', ['id_kelahiran_eklaim' => $dataPersalinan->id])->num_rows();

            if ($cekDetailPersalinan > 0) {
                $this->db->where("id_kelahiran_eklaim", $dataPersalinan->id)->delete("sm_detail_kelahiran_eklaim");
            }

            $this->db->where("id_pendaftaran", $id_pendaftaran)->delete("sm_kelahiran_eklaim");
        }
        if (isset($dataGrouper->id)) {
            $this->db->where("id", $dataGrouper->id)->delete("sm_grouper_eklaim");
            $this->db->where("id_pendaftaran", $id_pendaftaran)->update("sm_eklaim", ['response' => null]);
        }
        $this->db->where("id_pendaftaran", $id_pendaftaran)->delete("sm_eklaim");

        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) {
            return $this->response([
                'status' => false,
                'message' => 'Gagal menghapus data klaim.'
            ], REST_Controller::HTTP_OK);
            // ], REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
        }

        return $this->response([
            'status'  => true,
            'message' => 'Data klaim berhasil dihapus.'
        ], REST_Controller::HTTP_OK);
    }

    public function import_coding_post()
    {
        $id_pendaftaran        = safe_post('id_pendaftaran');
        $id_layanan_pendaftaran = safe_post('id_layanan_pendaftaran');
        $nomor_sep             = safe_post('nomor_sep');
        $diagnosa              = safe_post('gpr_diagnosis');
        $procedure             = safe_post('gpr_procedure');
        $cara_bayar            = safe_post('gpr_cara_bayar');
        $coder_nik             = $this->session->userdata('nik');

        if (empty($id_pendaftaran)) {
            return $this->response([
                'status' => false,
                'message' => 'ID Pendaftaran wajib diisi.'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }

        $data = [
            'id_pendaftaran'         => $id_pendaftaran,
            'id_layanan_pendaftaran' => $id_layanan_pendaftaran,
            'nomor_sep'              => $nomor_sep,
            'diagnosa_inagrouper'    => $diagnosa,
            'procedure_inagrouper'   => $procedure,
            'payor_id'               => $cara_bayar,
            'payor_cd'               => $this->eklaim_bpjs_auto->getPayorCD($cara_bayar),
            'coder_nik'              => $coder_nik
        ];

        // $setClaimData = $this->eklaim_bpjs->setClaimData($data);

        $setClaimData = $this->set_claim_data_update();

        if ($setClaimData['status'] === false) {
            $this->response($setClaimData, REST_Controller::HTTP_OK);
            return;
        }

        // if (empty($setClaimData)) {
        //     $this->response([
        //         'status' => false,
        //         'message' => 'Respons kosong dari server eKlaim.'
        //     ], REST_Controller::HTTP_OK);
        //     return;
        // }

        // if ($setClaimData['metadata']['code'] != '200') {
        //     $this->response([
        //         'status' => false,
        //         'message' => $setClaimData['metadata']['message']
        //     ], REST_Controller::HTTP_OK);
        //     return;
        // }

        // Jika sampai sini, berarti sukses
        $status = true;
        $message = 'Import Coding Berhasil diupdate ke Server.';

        // Simpan ke DB
        $insert = [
            'diagnosa_inagrouper'   => safe_post('gpr_diagnosis'),
            'procedure_inagrouper'  => safe_post('gpr_procedure'),
        ];

        $updateStatus = $this->db->where("id_pendaftaran", $id_pendaftaran)->update("sm_eklaim", $insert);

        if (!$updateStatus) {
            $status = false;
            $message = 'Import Coding Gagal diupdate ke Server.';
        } else {
            $this->backToSetClaimData($id_pendaftaran);
        }

        $this->response([
            'status' => $status,
            'message' => $message,
            'data' => $insert
        ], REST_Controller::HTTP_OK);
    }

    function hapus_detail_kelahiran_post()
    {
        $id = safe_post('id');

        $this->db->where("id", $id)->delete("sm_detail_kelahiran_eklaim");

        $message = [
            'status'  => TRUE,
            'message' => 'Data klaim berhasil dihapus.'
        ];

        $this->response($message, REST_Controller::HTTP_OK);
    }
}
