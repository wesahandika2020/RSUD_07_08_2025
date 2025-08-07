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
class Pendaftaran extends REST_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->limit = 10;
        $this->datetime = date('Y-m-d H:i:s');
        $this->load->model('Pendaftaran_model', 'pendaftaran');
        $this->bpjs_config = $this->pendaftaran->getConfigBPJSV2();

        $id_translucent = $this->session->userdata('id_translucent');
        if (empty($id_translucent)) :
            $this->response(array('error' => 'Anda belum login'), REST_Controller::HTTP_UNAUTHORIZED);
            exit();
        endif;

        $this->load->model('booking_poliklinik/Booking_poliklinik_model', 'm_booking');
    }

    private function start($page)
    {
        return (($page - 1) * $this->limit);
    }

    private function _validasi()
    {
        $this->load->library('form_validation');
        $this->config->set_item('language', 'indonesia');

        $this->form_validation->set_rules('no_identitas', 'no identitas', 'required|is_numeric');
        $this->form_validation->set_rules('nama', 'nama pasien', 'required');
        $this->form_validation->set_rules('kelamin', 'kelamin', 'required');
        $this->form_validation->set_rules('tanggal_lahir', 'tanggal lahir', 'required');
        $this->form_validation->set_rules('alamat', 'alamat', 'required');
        $this->form_validation->set_rules('agama', 'agama', 'required');
        $this->form_validation->set_rules('provinsi', 'provinsi', 'required');
        $this->form_validation->set_rules('kabupaten', 'kabupaten', 'required');
        $this->form_validation->set_rules('kecamatan', 'kecamatan', 'required');
        $this->form_validation->set_rules('kelurahan', 'kelurahan', 'required');
        $this->form_validation->set_rules('pendidikan', 'pendidikan', 'required');
        $this->form_validation->set_rules('telp', 'telp', 'required|is_numeric');
        $this->form_validation->set_rules('etnis', 'etnis', 'required');
        $this->form_validation->set_rules('dokter', 'dokter', 'required');

        if ($this->post('jenis_pendaftaran') === 'Poliklinik') :
            $this->form_validation->set_rules('layanan', 'klinik tujuan', 'required');
        endif;

        if ($this->post('jenis_pendaftaran') === 'IGD') :
            $this->form_validation->set_rules('jenis_igd', 'Jenis IGD', 'required');
            $this->form_validation->set_rules('hak_kelas', 'Hak Kelas', 'required');
        endif;

        if ($this->post('cara_bayar') !== 'Tunai') :
            $this->form_validation->set_rules('penjamin', 'penjamin', 'required');
        endif;

        if ($this->form_validation->run()) return TRUE;

        $data                = $error                = array();
        $data['error_class'] = $data['error_string'] = array();
        $data['status']      = TRUE;

        if (form_error('no_identitas')) $error[]  = 'no_identitas';
        if (form_error('nama')) $error[]          = 'nama';
        if (form_error('kelamin')) $error[]       = 'kelamin';
        if (form_error('tanggal_lahir')) $error[] = 'tanggal_lahir';
        if (form_error('alamat')) $error[]        = 'alamat';
        if (form_error('agama')) $error[]         = 'agama';
        if (form_error('provinsi')) $error[]      = 'provinsi';
        if (form_error('kabupaten')) $error[]     = 'kabupaten';
        if (form_error('kecamatan')) $error[]     = 'kecamatan';
        if (form_error('kelurahan')) $error[]     = 'kelurahan';
        if (form_error('pendidikan')) $error[]    = 'pendidikan';
        if (form_error('telp')) $error[]          = 'telp';
        if (form_error('etnis')) $error[]         = 'etnis';
        if (form_error('layanan')) $error[]       = 'layanan';
        if (form_error('dokter')) $error[]        = 'dokter';
        if (form_error('jenis_igd')) $error[]     = 'jenis_igd';
        if (form_error('hak_kelas')) $error[]     = 'hak_kelas';
        if (form_error('penjamin')) $error[]      = 'penjamin';

        if ($error) :
            foreach ($error as $row) :
                $data['error_string'][$row] = form_error($row);
            endforeach;

            $data['validasi'] = FALSE;
            $data['token'] = $this->security->get_csrf_hash();
            echo json_encode($data);
            exit();
        endif;
    }

    function simpan_pendaftaran_post()
    {

        $kode_booking_bpjs = safe_post('kode_booking_bpjs');

        $id_wa = safe_post('id_wa');

        $jenis_pendaftaran = safe_post('jenis_pendaftaran');

        $cek_kode_booking = empty($kode_booking_bpjs);

        $checkInOnsite = safe_post('check_in');

        $is_pegawai_rsud = safe_post('is_pegawai_rsud') !== '' ? 1 : 0;

        if ($checkInOnsite !== '') {

            if ($checkInOnsite === '1') {

                $this->load->model('Antrian_bpjs/Antrian_bpjs_model', 'antrian');
                $dataPasien = $this->antrian->getListBookingPasien($kode_booking_bpjs);

                if ($dataPasien->nosep === null | $dataPasien->nosep === '') {

                    $data = [
                        'id'      => null,
                        'status'  => false,
                        'message' => 'SEP belum dibuat, Silakan buat SEP di form SEP terlebih dahulu',
                        'token'   => $this->security->get_csrf_hash()
                    ];

                    echo json_encode($data);
                    exit();
                }
            }
        }

        if ($jenis_pendaftaran === 'Poliklinik' && $cek_kode_booking === true && empty($id_wa)) {

            $data = [
                'id'      => null,
                'status'  => false,
                'message' => 'Kode Booking Tidak ada, Silakan daftar Antrean onsite RSUD atau melalui mobile JKN',
                'token'   => $this->security->get_csrf_hash()
            ];

            echo json_encode($data);
            exit();
        }

        if ($jenis_pendaftaran === 'Poliklinik' && safe_post('telp') === '') {

            $data = [
                'id'      => null,
                'status'  => false,
                'message' => 'No. Telepon Tidak ada, Silakan isi No. Telepon terlebih dahulu dengan benar',
                'token'   => $this->security->get_csrf_hash()
            ];

            echo json_encode($data);
            exit();
        }

        if ($jenis_pendaftaran === 'Poliklinik' && safe_post('penjamin') !== '') {

            $penjamin = safe_post('penjamin');
            $noPolish = safe_post('no_polish');
            $noRujuk = safe_post('no_rujukan');

            if ($penjamin === '1') {

                if ($noPolish === '') {

                    $data = [
                        'id'      => null,
                        'status'  => false,
                        'message' => 'Silakan isi no Polish terlebih dahulu dengan benar',
                        'token'   => $this->security->get_csrf_hash()
                    ];

                    echo json_encode($data);
                    exit();
                }

                if ($noRujuk === '') {

                    $data = [
                        'id'      => null,
                        'status'  => false,
                        'message' => 'Silakan isi No Rujukan terlebih dahulu dengan benar',
                        'token'   => $this->security->get_csrf_hash()
                    ];

                    echo json_encode($data);
                    exit();
                }
            }
        }

        if ($jenis_pendaftaran === 'Poliklinik') {

            $cekKodeBooking = $this->pendaftaran->getKodeBookingPendaftaran($kode_booking_bpjs);

            if($cekKodeBooking !== null){

                $data = [
                    'id'      => null,
                    'status'  => false,
                    'message' => 'Kode Booking Sudah digunakan oleh pasien '.$cekKodeBooking->nama,
                    'token'   => $this->security->get_csrf_hash()
                ];

                echo json_encode($data);
                exit();

            }

        }

        $this->_validasi();
        $this->db->trans_begin();
        $pasien = 'Lama';

        // Data Pasien
        if (safe_post('no_rm') == '') :
            $id_pasien = false;
            $pasien = 'Baru';
        else :
            $id_pasien = safe_post('no_rm');

            if ($jenis_pendaftaran === 'Poliklinik') {

                date_default_timezone_set('Asia/Jakarta');

                $this->load->model('antrian_bpjs/Antrian_bpjs_model', 'antrian');

                $checkValidasi = $this->antrian->cekValidasiDataPasien($id_pasien, date('Y-m-d'));

                $caraBayar = safe_post('cara_bayar');

                $penjamin = safe_post('penjamin');

                if($caraBayar !== 'Tunai'){
                
                    if($penjamin === '1' | $penjamin === '11'){

                        if(!empty($checkValidasi)){

                            $hasilValidasi = array();

                            // Perulangan untuk mencari nilai yang sesuai
                            foreach ($checkValidasi as $a => $b) {
                                if ($b->nama === "BPJS") {
                                    if($b->status !== 'Batal'){

                                        $hasilValidasi[] = $a;

                                    }
                                }
                            }

                            if(count($hasilValidasi) > 0){

                                $data = [
                                'id'      => null,
                                'status'  => false,
                                'message' => 'Anda Sudah Pernah Terdaftar menggunakan BPJS pada hari ini',
                                'token'   => $this->security->get_csrf_hash()
                                ];

                                echo json_encode($data);
                                exit();

                            }

                        }

                    }

                }

            }

            // Cek status pasien apakah masih dalam kunjungan atau tidak
            $cek_pasien_active = $this->pendaftaran->cekStatusKunjunganPasien($id_pasien);

            if ($cek_pasien_active === 'Aktif') :
                // Tambahan jenis pendaftaran pada pasien di alert
                $jenis_pendaftaran_pasien = $this->pendaftaran->getJenisPendaftaranPasien($id_pasien);
                $cek_jenis_pendaftaran_pasien = $jenis_pendaftaran_pasien->keterangan ?? '-';
                $tanggal_daftar = $jenis_pendaftaran_pasien->tanggal_daftar ?? '-';
                $cek_tanggal_daftar = date('d/m/Y H:i:s', strtotime($tanggal_daftar));
                $status_terlayani = $jenis_pendaftaran_pasien->status_terlayani ?? '-';

                if ($status_terlayani == 'Sudah') :
                    $status_Kunj_pasien = 'Pasien MASIH dalam kunjungan ';
                elseif ($status_terlayani == 'Belum') :
                    $status_Kunj_pasien = 'Pasien BELUM dilayani (belum dibatalkan) ';
                elseif ($status_terlayani == 'Batal') :
                    $status_Kunj_pasien = 'Pasien BATAL berkunjungan ';
                else :
                    $status_Kunj_pasien = 'Pasien dalam kunjungan ';
                endif;


                $data = [
                    'id'      => null,
                    'status'  => false,
                    'message' => $status_Kunj_pasien . " di ($cek_jenis_pendaftaran_pasien) Tanggal daftar: $cek_tanggal_daftar",
                    'token'   => $this->security->get_csrf_hash()
                ];

                echo json_encode($data);
                exit();
            endif;

        // if (safe_post('kunjungan') === 'Pasca Rawat') :
        //     $pasien .= " " . safe_post('kunjungan') . " ";
        // elseif (safe_post('kunjungan') === 'Penunjang') :
        //     $pasien = safe_post('kunjungan');
        // elseif (safe_post('kunjungan') === 'Tindakan') :
        //     $pasien .= " " . safe_post('kunjungan') . " ";
        // endif;
        endif;

        if (safe_post('cara_bayar') !== 'Tunai') :
            if (safe_post('penjamin') !== '') :
                $penjamin = safe_post('penjamin');
            else :
                // $penjamin = NULL;
                // $penjamin = 9;
                $message = [
                    'id'      => null,
                    'status'  => false,
                    'token'   => $this->security->get_csrf_hash(),
                    'message' => 'Silahkan pilih penjamin terlebih dahulu.'
                ];

                echo json_encode($message);
                exit();
            endif;
        else :
            $penjamin = 9;
        endif;

        if (safe_post('tanggal_lahir') !== '') :
            //            $tanggal_lahir = date2mysql(safe_post('tanggal_lahir'));
            $tanggal_lahir = safe_post('tanggal_lahir');
        endif;

        if (safe_post('no_rm') == '') :
            $params_pasien = [
                'no_identitas'  => safe_post('no_identitas'),
                'nama'          => safe_post('nama'),
                'kelamin'       => safe_post('kelamin'),
                'tanggal_lahir' => $tanggal_lahir,
                'telp'          => safe_post('telp'),
            ];

            $status_pasien = $this->pendaftaran->checkPasien($params_pasien);

            if ($status_pasien['status'] === true) :
                $message = [
                    'id'      => null,
                    'status'  => false,
                    'token'   => $this->security->get_csrf_hash(),
                    'message' => $status_pasien['message']
                ];

                echo json_encode($message);
                exit();
            endif;
        endif;

        $no_rm_lama = safe_post('no_rm_lama');
        $data_pasien = [
            'id'             => $id_pasien,
            'rm_lama'        => $no_rm_lama,
            'tanggal_daftar' => $this->datetime,
            'no_identitas'   => safe_post('no_identitas'),
            'nama'           => strtoupper(trim(safe_post('nama'))),
            'status_pasien'  => (safe_post('statuspasien') != '') ? safe_post('statuspasien') : NULL,
            'kelamin'        => safe_post('kelamin'),
            'tempat_lahir'   => safe_post('tempat_lahir'),
            'tanggal_lahir'  => $tanggal_lahir,
            'alamat'         => safe_post('alamat'),
            'no_prop'        => (safe_post('provinsi') != '') ? safe_post('provinsi') : NULL,
            'nama_prop'      => (safe_post('nama_provinsi') != '') ? safe_post('nama_provinsi') : NULL,
            'no_kab'         => (safe_post('kabupaten') != '') ? safe_post('kabupaten') : NULL,
            'nama_kab'       => (safe_post('nama_kabupaten') != '') ? safe_post('nama_kabupaten') : NULL,
            'no_kec'         => (safe_post('kecamatan') != '') ? safe_post('kecamatan') : NULL,
            'nama_kec'       => (safe_post('nama_kecamatan') != '') ? safe_post('nama_kecamatan') : NULL,
            'no_kel'         => (safe_post('kelurahan') != '') ? safe_post('kelurahan') : NULL,
            'nama_kel'       => (safe_post('nama_kelurahan') != '') ? safe_post('nama_kelurahan') : NULL,
            'agama'          => (safe_post('agama') !== '') ? safe_post('agama') : 'Lain-lain',
            'gol_darah'      => (safe_post('goldarah') !== '') ? safe_post('goldarah') : NULL,
            'id_pendidikan'  => (safe_post('pendidikan') !== '') ? safe_post('pendidikan') : NULL,
            'id_pekerjaan'   => (safe_post('pekerjaan') !== '') ? safe_post('pekerjaan') : NULL,
            'status_kawin'   => (safe_post('pernikahan') !== '') ? safe_post('pernikahan') : 'Belum Kawin',
            'nama_ayah'      => (safe_post('ayah') !== '') ? safe_post('ayah') : NULL,
            'nama_ibu'       => (safe_post('ibu') !== '') ? safe_post('ibu') : NULL,
            'telp'           => safe_post('telp'),
            'id_etnis'       => (safe_post('etnis') !== '') ? safe_post('etnis') : NULL,
            'etnis_lainnya'  => (safe_post('etnis_lainnya') !== '') ? safe_post('etnis_lainnya') : NULL,
            'hamkom'         => safe_post('hamkom'),
            'hamkom_lainnya' => (safe_post('hamkom_lainnya') !== '') ? safe_post('hamkom_lainnya') : NULL,
            'status'         => 'Hidup',
            'disabilitas'    => (safe_post('disabilitas') !== '') ? safe_post('disabilitas') : 0,
            'no_rw'          => (safe_post('no_rw') !== '') ? safe_post('no_rw') : NULL,
            'no_rt'          => (safe_post('no_rt') !== '') ? safe_post('no_rt') : NULL,
            'no_rumah'       => (safe_post('no_rumah') !== '') ? safe_post('no_rumah') : NULL,
            'kode_pos'       => (safe_post('kode_pos') !== '') ? safe_post('kode_pos') : NULL,
            'is_pegawai_rsud' => $is_pegawai_rsud,
            'email'          => (safe_post('email') != '') ? safe_post('email') : NULL,
        ];

        // Validasi Data Pasien
        $this->load->model('pasien/Pasien_model', 'pasien');
        $no_rm = $this->pasien->updateDataPasien($data_pasien, true);

        $this->load->model('spesialisasi/Spesialisasi_model', 'sp');
        $id_spesialisasi = (safe_post('layanan') != '') ? safe_post('layanan') : NULL;
        $klinik = '';
        $id_tarif = null;

        if ($id_spesialisasi !== null) :
            $spesialiasi = $this->sp->getDataSpesialisasiById($id_spesialisasi);
            $klinik = $spesialiasi->nama;
            $id_tarif = $spesialiasi->id_tarif;
        endif;

        if ($jenis_pendaftaran === 'Poliklinik' && $is_pegawai_rsud === 1 && intval($penjamin) === 9) {
            $hospital = $this->m_default->getDataHospital();
            $is_dev = strpos($hospital->nama, 'Developement') !== false;
            $id_tarif = $is_dev ? 9398 : 9523;
        }

        if (safe_post('jenis_pendaftaran') === 'MCU') :
            $langsung = 1;
        elseif (safe_post('jenis_pendaftaran') === 'Laboratorium') :
            $langsung = 1;
        elseif (safe_post('jenis_pendaftaran') === 'Radiologi') :
            $langsung = 1;
        elseif (safe_post('jenis_pendaftaran') === 'Fisioterapi') :
            $langsung = 1;
        else :
            $langsung = 0;
        endif;

        $jenisLayanan = '';
        if ($klinik == 'Medical Check Up') {
            $jenisLayanan = $klinik;
        } else {
            $jenisLayanan = safe_post('jenis_pendaftaran');
        }

        $data_pendaftaran = [
            'no_register'           => $this->pendaftaran->generateNoRegister(),
            'id_pasien'             => $no_rm,
            'tanggal_daftar'        => $this->datetime,
            'jenis_pendaftaran'     => safe_post('jenis_pendaftaran'),
            'jenis_igd'             => safe_post('jenis_igd'),
            'hak_kelas'             => safe_post('hak_kelas'),
            'jenis_rawat'           => 'Jalan',
            'domisili'              => (safe_post('domisili') != '') ? safe_post('domisili') : NULL,
            'id_instansi_perujuk'   => (safe_post('instansi_rujukan') != '') ? safe_post('instansi_rujukan') : NULL,
            'nadis_perujuk'         => (safe_post('nadis_perujuk') != '') ? safe_post('nadis_perujuk') : NULL,
            'nik_pjwb'              => safe_post('nik_pjwb'),
            'nama_pjwb'             => safe_post('nama_pjwb'),
            'kelamin_pjwb'          => safe_post('kelamin_pjwb'),
            'telp_pjwb'             => safe_post('telp_pjwb'),
            'alamat_pjwb'           => safe_post('alamat_pjwb'),
            'tgl_lahir_pjwb'        => safe_post('tgl_lahir_pjwb') ? safe_post('tgl_lahir_pjwb') : NULL,
            'hubungan_pjwb'         => safe_post('hubungan_pjwb'),
            'nik_pjwb_finansial'    => safe_post('nik_pjwb_finansial'),
            'nama_pjwb_finansial'   => safe_post('nama_pjwb_finansial'),
            'kelamin_pjwb_finansial' => safe_post('kelamin_pjwb_finansial'),
            'telp_pjwb_finansial'   => safe_post('telp_pjwb_finansial'),
            'alamat_pjwb_finansial' => safe_post('alamat_pjwb_finansial'),
            'id_penjamin'           => $penjamin,
            'no_polish'             => (safe_post('no_polish') !== '') ? safe_post('no_polish') : NULL,
            'no_sep'                => (safe_post('no_sep') !== '') ? strtoupper(safe_post('no_sep')) : NULL,
            'no_rujukan'            => (safe_post('no_rujukan') !== '') ? strtoupper(safe_post('no_rujukan')) : NULL,
            'status'                => $this->pendaftaran->getStatusPasien($no_rm),
            'doa'                   => (safe_post('doa') !== '') ? safe_post('doa') : NULL,
            'id_users'              => $this->session->userdata('id_translucent'),
            'pendaftaran_langsung'  => $langsung,
            'lunas'                 => 'Belum',
            'keterangan'            => safe_post('jenis_pendaftaran') . ' ' . $klinik,
            'merge'                 => 0,
            'id_asal_masuk'         => (safe_post('asal_masuk') !== '' ? safe_post('asal_masuk') : 2),
            'keterangan_asal_masuk' => safe_post('keterangan_asal_masuk'),
            'kode_booking'          => (safe_post('kode_booking_bpjs') !== '' ? safe_post('kode_booking_bpjs') : NULL),
        ];

        // Insert Pendaftaran
        $id_pendaftaran = $this->pendaftaran->simpanDataPendaftaran($data_pendaftaran);

        if(!empty($data_pendaftaran['no_polish'])){
            // tambahan charis
            $data_pendaftaran['no_kartu'] = $data_pendaftaran['no_polish'];
            $data_pendaftaran['no_rm'] = $data_pendaftaran['id_pasien'];
            $this->m_booking->updateHakKelasPasien($data_pendaftaran);
        }

        // Start tambahan wahyu
        $this->load->model('vclaim_bpjs/Vclaim_v2_model', 'm_vclaim');
        $noRujukan = (safe_post('no_rujukan') !== '') ? strtoupper(safe_post('no_rujukan')) : NULL;

        if ($noRujukan !== NULL) :
            $dataRujukan = $this->m_vclaim->get_rujukan_rs($noRujukan);
            $kodePerujuk = $dataRujukan->response->rujukan->provPerujuk->kode ?? NULL;
            $namaPerujuk = $dataRujukan->response->rujukan->provPerujuk->nama ?? NULL;

            date_default_timezone_set('Asia/Jakarta');
            $insert = [
                'tanggal_terbit' => date('Y-m-d'),
                'id_pasien' => $no_rm,
                'no_rujukan' => $noRujukan,
                // 'jenis' => 'asli',
                'id_pendaftaran' => $id_pendaftaran,
                'kode_perujuk' => $kodePerujuk ?? NULL,
                'nama_perujuk' => $namaPerujuk ?? NULL
            ];

            $cek_rujukan = $this->db->where('no_rujukan', $noRujukan)->get('sm_rujukan')->row();
            if (!$cek_rujukan) :
                $this->db->insert('sm_rujukan', $insert);
            else :
                unset($insert['no_rujukan']);
                unset($insert['tanggal_terbit']);
                $this->db->where('no_rujukan', $noRujukan)->update('sm_rujukan', $insert);
            endif;
        endif;
        // End

        $data_layanan_pendaftaran = [
            'id_pendaftaran'  => $id_pendaftaran,
            'tanggal_layanan' => $this->datetime,
            'id_unit_layanan' => $id_spesialisasi,
            'id_dokter'       => safe_post('dokter'),
            'no_antrian'      => (safe_post('jenis_pendaftaran') === 'Poliklinik') ? $this->pendaftaran->getNextNoAntrian(['id_unit' => safe_post('layanan'), 'tanggal' => date('Y-m-d')]) : NULL,
            'jenis_layanan'   => $jenisLayanan,
            'kondisi'         => 'Hidup',
            'resusitasi'      => 0,
            'cara_bayar'      => safe_post('cara_bayar'),
            'id_penjamin'     => $penjamin,
            'no_polish'       => (safe_post('no_polish') !== '') ? safe_post('no_polish') : NULL,
            'no_sep'          => (safe_post('no_sep') !== '') ? strtoupper(safe_post('no_sep')) : NULL,
            'terklaim'        => (safe_post('cara_bayar') === 'Tunai') ? 1 : 0,
            'status_terlayani' => 'Belum',
            'id_users'        => $this->session->userdata('id_translucent')
        ];

        if ($data_pendaftaran['jenis_pendaftaran'] !== 'Poliklinik') :
            $data_layanan_pendaftaran['no_antrian'] = NULL;
        endif;

        $data_penjamin = [
            'id_pasien'   => $no_rm,
            'id_penjamin' => $penjamin,
            'no_polish'   => safe_post('no_polish')
        ];

        // Insert Layanan Pendaftaran
        $id_layanan_pendaftaran = $this->pendaftaran->simpanDataLayananPendaftaran($data_layanan_pendaftaran);

        if (!empty($kode_booking_bpjs)) {

            date_default_timezone_set('Asia/Jakarta');

            $tanggal_tunggu = (round(microtime(true) * 1000));
            $new_estimasi = date('Y-m-d H:i:s', $tanggal_tunggu / 1000);
            $tanggalKehadiran = $tanggal_tunggu - 120000;
            $newKehadiran = date('Y-m-d H:i:s', $tanggalKehadiran / 1000);

            if (safe_post('penjamin') !== '') {

                $penjamin = safe_post('penjamin');

                $noKa = null;
                $noReferen = null;

                if ($penjamin === '1') {

                    $noKa = safe_post('no_polish');
                    $noReferen = strtoupper(safe_post('no_rujukan'));
                }
            } else {

                $noKa = null;
                $noReferen = null;
            }

            if (safe_post('lokasi_data') !== "" && safe_post('lokasi_data') !== null) {

                if (safe_post('lokasi_data') === 'mobile') {

                    $getIDAntrian = $this->pendaftaran->getIdAntrean($kode_booking_bpjs);

                    $taskDua = $getIDAntrian->task_dua;

                    if ($taskDua === null) {

                        $updateTaskDua = ["task_dua" => $newKehadiran, "pasien_hadir" => 'Hadir', "waktu_hadir" => $newKehadiran];

                        $idAntrian = (int)$getIDAntrian->id;

                        $this->db->where('id', $idAntrian)->update('sm_antrian_bpjs', $updateTaskDua);

                        $dataResponse = array(
                            "nomor_task"         => 2,
                            "waktu_task"        => $tanggalKehadiran,
                            "kode_booking"      => $kode_booking_bpjs,
                            "id_antrian"        => $idAntrian,
                            "konversi_waktu"    => $newKehadiran,
                        );

                        $cekResponBPJS = $this->m_pelayanan->getResponseBPJS($kode_booking_bpjs, 2);

                        if (!isset($cekResponBPJS->id)) {

                            $this->db->insert('sm_update_task_bpjs', $dataResponse);

                            $message['decode'] = ["metaData" => ["code" => 200, "message" => 'Berhasil Update Task 2']];
                        } else {

                            $message['decode'] = ["metaData" => ["code" => 201, "message" => 'Gagal Update Task 2']];
                        }
                    }
                }
            }

            $update = ["nik" => safe_post('no_identitas'), "tanggal_lahir" => $tanggal_lahir, "no_kartu" => $noKa, "no_referensi" => $noReferen, "no_hp" => safe_post('telp'), "jenis_bayar" => safe_post('cara_bayar'), "jenis_penjamin" => $penjamin, "task_tiga" => $new_estimasi, "id_pendaftaran" => $id_pendaftaran, "no_rm" => $no_rm];

            $get_id_antrian = $this->pendaftaran->getIdAntrean($kode_booking_bpjs);
            $id_antrian = (int)$get_id_antrian->id;

            $this->db->where('id', $id_antrian)->update('sm_antrian_bpjs', $update);

            $data_response = array(
                "nomor_task"        => 3,
                "waktu_task"        => $tanggal_tunggu,
                "kode_booking"      => $kode_booking_bpjs,
                "id_antrian"        => $id_antrian,
                "konversi_waktu"    => $new_estimasi,
            );

            $cek_respon_bpjs = $this->m_pelayanan->getResponseBPJS($kode_booking_bpjs, 3);

            if (!isset($cek_respon_bpjs->id)) {

                $this->db->insert('sm_update_task_bpjs', $data_response);

                $message['decode'] = ["metaData" => ["code" => 200, "message" => 'Berhasil Update Task 3']];
            } else {

                $message['decode'] = ["metaData" => ["code" => 201, "message" => 'Gagal Update Task 3']];
            }
        }

        // Insert Tarif Pendaftaran
        if ($id_layanan_pendaftaran !== null) :
            $this->load->model('Masterdata_model', 'masterdata');
            $this->load->model('pelayanan/Pelayanan_model', 'pelayanan');
            $jenis_transaksi = 'Pendaftaran';

            if ($data_pendaftaran['jenis_pendaftaran'] === 'Poliklinik' && $jenisLayanan != 'Medical Check Up') :
                // Insert
                $spesialiasi = $this->sp->getDataSpesialisasiById($id_spesialisasi);
                if ($id_tarif !== null) :
                    $tindakan = [
                        'operator' => array((safe_post('dokter') !== '') ? safe_post('dokter') : NULL),
                        'tindakan' => array($id_tarif),
                        'qty'      => array(1)
                    ];

                    $this->pelayanan->simpanTindakanPemeriksaan($id_layanan_pendaftaran, $tindakan, $jenis_transaksi);
                endif;
            endif;
        endif;

        // Hapus data pasien lama
        $this->pendaftaran->deletePasienLama($no_rm_lama);

        // simpan penjamin
        if ($penjamin !== null) :
            $this->pendaftaran->updatePenjaminPasien($data_penjamin);
        endif;

        // Update history SEP
        if (safe_post('no_sep') !== '') :
            $sep = [
                'no_rm'   => $no_rm,
                'dipakai' => '1',
                'id_pendaftaran' => $id_pendaftaran
            ];

            $this->db->where('no_sep', strtoupper(safe_post('no_sep')))->update('sm_history_sep', $sep);
        endif;

        // insert tracer
        $this->load->model('Tracer_model', 'tracer');
        $status_tracer = $this->tracer->insertTracer($id_layanan_pendaftaran);

        if ($this->db->trans_status() === FALSE) :
            $this->db->trans_rollback();
            $status = FALSE;
        else :
            $this->db->trans_commit();
            $status = TRUE;
        endif;

        $message = [
            'id' => $id_pendaftaran,
            'status' => $status,
            'status_tracer' => $status_tracer,
            'token' => $this->security->get_csrf_hash()
        ];

        $this->response($message, REST_Controller::HTTP_OK);
    }

    //Wa Security
    function simpan_daftar_wa_post()
    {
        $id_wa = safe_post('id_wa');
        $this->db->trans_begin();
        $data_wa = [
            'dilayani'        => 'Sudah',
        ];
        // Insert Pendaftaran       
        $this->db->where('id', $id_wa)->update('sm_pendaftaran_wa', $data_wa);

        if ($this->db->trans_status() === FALSE) :
            $this->db->trans_rollback();
            $status = FALSE;
        else :
            $this->db->trans_commit();
            $status = TRUE;
        endif;
        $message = [
            'status' => $status,
            'token' => $this->security->get_csrf_hash()
        ];
        $this->response($message, REST_Controller::HTTP_OK);
    }

    function entri_antrian_post($tipe)
    {
        $this->db->trans_begin();
        $id_pendaftaran = safe_post('id_pendaftaran');
        if ($tipe == 'poliklinik') {
            $layanan = (safe_post('layanan_antri') != '') ? safe_post('layanan_antri') : NULL;
            $jenis_layanan = 'Poliklinik';
            $no_antrian = $this->pendaftaran->getNextNoAntrian(array('id_unit' => safe_post('layanan_antri'), 'tanggal' => date('Y-m-d')));
        } else {
            $layanan = NULL;
            $jenis_layanan = 'IGD';
            $no_antrian = NULL;
        }

        $last_lp = $this->db->select('*')
            ->from('sm_layanan_pendaftaran as lp')
            ->where('lp.id_pendaftaran', $id_pendaftaran)
            ->order_by('id')
            ->limit(1, 0)
            ->get()
            ->row();

        $data_layanan_pendaftaran = [
            'id_pendaftaran'  => $id_pendaftaran,
            'tanggal_layanan' => $this->datetime,
            'id_unit_layanan' => $layanan,
            'id_dokter'       => (safe_post('dokter_antri') !== '') ? safe_post('dokter_antri') : NULL,
            'no_antrian'      => $no_antrian,
            'jenis_layanan'   => $jenis_layanan,
            'kondisi'         => 'Hidup',
            'resusitasi'      => 0,
            'konsul'          => 1,
            'cara_bayar'      => $last_lp->cara_bayar,
            'id_penjamin'     => $last_lp->id_penjamin,
            'no_polish'       => $last_lp->no_polish,
            'no_sep'          => strtoupper($last_lp->no_sep),
            'id_users'        => $this->session->userdata('id_translucent')
        ];

        $id = $this->pendaftaran->simpanDataLayananPendaftaran($data_layanan_pendaftaran);
        // Insert Tarif Pendaftaran
        if (($id !== null) & ($tipe == 'poliklinik')) :
            $this->load->model('spesialisasi/Spesialisasi_model', 'sp');
            $this->load->model('pelayanan/Pelayanan_model', 'pelayanan');
            $jenis_transaksi = 'Rawat Jalan';

            // Insert
            $spesialiasi = $this->sp->getDataSpesialisasiById($layanan);
            if ($spesialiasi->id_tarif !== null) :
                $tindakan = [
                    'operator' => array((safe_post('dokter') !== '') ? safe_post('dokter') : NULL),
                    'tindakan' => array($spesialiasi->id_tarif),
                    'qty'      => array(1)
                ];

                $this->pelayanan->simpanTindakanPemeriksaan($id, $tindakan, $jenis_transaksi);
            endif;
        endif;

        if ($this->db->trans_status() === FALSE) :
            $this->db->trans_rollback();
            $status = FALSE;
        else :
            $this->db->trans_commit();
            $status = TRUE;
        endif;

        $message = [
            'id' => $data_layanan_pendaftaran['id_pendaftaran'],
            'status' => $status,
            'token' => $this->security->get_csrf_hash()
        ];

        $this->response($message, REST_Controller::HTTP_OK);
    }

    function get_pasien_antrian_get()
    {
        if (!$this->get('id', true)) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
        endif;

        $data['data'] = $this->pendaftaran->getPasienAntrian($this->get('id', true));
        $data['page'] = 1;
        $data['limit'] = $this->limit;

        if ($data) :
            $this->response($data, REST_Controller::HTTP_OK); // (200)
        endif;
    }

    function get_id_antrian_get()
    {
        if (!$this->get('id')) {
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST);
        }

        $kode_booking_bpjs = $this->get('id');

        $data = $this->pendaftaran->getIdAntrean($kode_booking_bpjs);

        if ($data) {
            $this->response($data, REST_Controller::HTTP_OK); // 200 being the HTTP response code
        } else {
            $this->response(array('error' => 'Tidak ada data'), REST_Controller::HTTP_BAD_REQUEST);
        }
    }

    function get_bpjs_spesialisasi_get()
    {
        $id_spesialisasi = $this->get('id_spesialisasi');
        $id_dokter = $this->get('id_dokter');

        $data = $this->pendaftaran->getAutoBPJSSpesialisasi($id_spesialisasi, $id_dokter);
        $this->response($data, REST_Controller::HTTP_OK);
    }

    function get_pendaftaran_detail_get()
    {
        if (!$this->get('id')) {
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST);
        }

        $id_layanan_pendaftaran = null;
        if ($this->get('id_layanan_pendaftaran')) {
            $id_layanan_pendaftaran = $this->get('id_layanan_pendaftaran');
        }

        $data = $this->pendaftaran->getPendaftaranDetail($this->get('id'), $id_layanan_pendaftaran);
        if ($data) {
            $this->response($data, REST_Controller::HTTP_OK); // 200 being the HTTP response code
        } else {
            $this->response(array('error' => 'Tidak ada data'), REST_Controller::HTTP_BAD_REQUEST);
        }
    }

    function batal_pendaftaran_delete()
    {
        if (!$this->get('id')) {
            $this->response(array('status' => false), 200);
        }
        $response = $this->pendaftaran->batalPendaftaran($this->get('id'));
        $this->response($response, 200);
    }

    function reset_batal_pendaftaran_post()
    {
        if (!$this->get('id')) {
            $this->response(array('status' => false), 200);
        }
        $id = $this->get('id');

        $this->db->trans_begin();

        $dataLayanan = $this->db->get_where('sm_layanan_pendaftaran', ['id_pendaftaran' => $id])->row();
        $this->db->where('id', $id)->update('sm_pendaftaran', ['status' => 'Lama']);
        $this->db->where('id', $dataLayanan->id)->update('sm_layanan_pendaftaran', ['status_terlayani' => 'Belum', 'tindak_lanjut' => null]);
        $this->db->where('id_layanan_pendaftaran', $dataLayanan->id)->update('sm_pembayaran', ['status' => 'Tagihan']);

        if ($dataLayanan->id !== NULL) :
            $this->load->model('logs/Logs_model', 'logs');
            $this->logs->recordAdminLogs($dataLayanan->id, 'Reset Batal Kunjungan');
        endif;

        if ($this->db->trans_status() === FALSE) :
            $this->db->trans_rollback();
            $status = false;
            $message = "Gagal melakukan pembatalan pendaftaran";
        else :
            $this->db->trans_commit();
            $status = true;
            $message = "Berhasil melakukan pembatalan pendaftaran";
        endif;

        $response = array('status' => $status, 'message' => $message);
        $this->response($response, 200);
    }

    function batal_pendaftaran_ket_post()
    {
        if (!$this->get('id')) {
            $this->response(array('status' => false), 200);
        }
        $response = $this->pendaftaran->batalPendaftaranKet(safe_post('id'), safe_post('keterangan_batal'));
        $this->response($response, 200);
    }

    function edit_penanggung_jawab_post($id = NULL)
    {
        if ($id === NULL) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST);
        endif;

        $data_pjawab = array(
            "id"                     => $id,
            "id_instansi_perujuk"    => safe_post("instansi_rujukan") != "" ? safe_post("instansi_rujukan") : NULL,
            "nadis_perujuk"          => safe_post("nadis_perujuk"),
            "nik_pjwb"               => safe_post("nik_pjwb"),
            "nama_pjwb"              => safe_post("nama_pjwb"),
            "tgl_lahir_pjwb"         => safe_post("tgl_lahir_pjwb"),
            "hubungan_pjwb"          => safe_post("hubungan_pjwb"),
            "kelamin_pjwb"           => safe_post("kelamin_pjwb"),
            "alamat_pjwb"            => safe_post("alamat_pjwb"),
            "telp_pjwb"              => safe_post("telp_pjwb"),
            "nik_pjwb_finansial"     => safe_post("nik_pjwb_finansial"),
            "nama_pjwb_finansial"    => safe_post("nama_pjwb_finansial"),
            "kelamin_pjwb_finansial" => safe_post("kelamin_pjwb_finansial"),
            "alamat_pjwb_finansial"  => safe_post("alamat_pjwb_finansial"),
            "telp_pjwb_finansial"    => safe_post("telp_pjwb_finansial")
        );

        $data["status"] = $this->pendaftaran->updatePenanggungJawabPasien($id, $data_pjawab);
        $data["pjawab"] = $data_pjawab;
        $data['token']  = $this->security->get_csrf_hash();
        if ($data["status"] == false) {
            $data["pjawab"] = NULL;
            $data['token'] = $data['token'];
        }
        $this->response($data, 200);
    }

    // Get Antrian Pendaftaran
    function get_antrian_pendaftaran_get()
    {
        $data = $this->pendaftaran->getDataAntrianPendaftaran();
        $this->response($data, REST_Controller::HTTP_OK);
    }

    function get_list_pendaftaran_get()
    {
        if (!$this->get('page')) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST);
        endif;

        $search = [
            'id'                => safe_get('id'),
            'tanggal_awal'      => safe_get('tanggal_awal'),
            'tanggal_akhir'     => safe_get('tanggal_akhir'),
            'jenis_pendaftaran' => $this->get('jenis_pendaftaran'),
            'no_register'       => safe_get('no_register'),
            'no_rm'             => safe_get('no_rm'),
            'nik'               => safe_get('nik'),
            'nama'              => safe_get('nama'),
            'tanggal_lahir'     => safe_get('tanggal_lahir'),
            'alamat'            => safe_get('alamat'),
            'layanan'           => safe_get('layanan'),
            'jenis_igd'         => safe_get('jenis_igd'),
            'user'              => safe_get('user'),
            'penjamin'          => safe_get('penjamin_search'),
        ];

        $start = $this->start($this->get('page'));

        $data = $this->pendaftaran->getListDataPendaftaran($this->limit, $start, $search);
        $data['page'] = (int) $this->get('page');
        $data['limit'] = $this->limit;

        if ($data) :
            $this->response($data, REST_Controller::HTTP_OK);
        endif;
    }
}
