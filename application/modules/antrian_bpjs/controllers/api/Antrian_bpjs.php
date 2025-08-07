<?php

defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';
// require_once 'vendor/autoload.php';

use Restserver\Libraries\REST_Controller;
use \LZCompressor\LZString as LZString;

/**
 * @package         CodeIgniter
 * @subpackage      Rest Server
 * @category        Controller
 * @author          Faiz Muhammad Syam
 * @license         Syams Corporation
 */
class Antrian_bpjs extends REST_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->limit = 20;
        $this->batas = 10;
        date_default_timezone_set('Asia/Jakarta');
        $this->date = date('Y-m-d');
        $this->datetime = date('Y-m-d H:i:s');
        $this->load->model('App_model', 'm_default');
        $this->load->model('Antrian_bpjs_model', 'antrian');
        $this->load->model('Pendaftaran/Pendaftaran_model', 'pendaftaran');
        $this->load->model('booking_poliklinik/Booking_poliklinik_model', 'm_booking');
        $this->load->model('Antrian_bridging_model', 'm_antrian_bridging');

        $this->bpjs_config = $this->antrian->getConfigBPJSV2();

        $this->code = 400;
        $this->message = "Tidak terhubung dengan Server BPJS, Server BPJS sedang bermasalah. Silahkan Hubungi Pihak IT BPJS";

        $this->antrean_config = $this->default->getConfigAntrianBPJS();

        $id_translucent = $this->session->userdata('id_translucent');
        if (empty($id_translucent)) :
            $this->response(array('error' => 'Anda belum login'), REST_Controller::HTTP_UNAUTHORIZED);
            exit();
        endif;
    }

    function antrean_list_get()
    {
        if ($this->get('page') === null) {

            $page = 1;
        } else {

            $page = (int)$this->get('page');
        }

        $start = $this->mulai((int)$page);
        $search         = [
            'kode_booking_bpjs' => safe_get('kode_booking_bpjs'),
            'no_antrean_bpjs'   => safe_get('no_antrean_bpjs'),
            'nik_bpjs'          => safe_get('nik_bpjs'),
            'loket'             => safe_get('loket'),
        ];

        $data           = $this->antrian->getAntreanListData((int)$this->batas, (int)$start, $search);
        $data['page']   = (int)$page;
        $data['limit']  = (int)$this->batas;

        $kode = 200;
        $decode = ["respon" => $data];

        if ($data) :
            $this->response($decode, $kode);
        endif;
    }

    function list_booking_pasien_get()
    {

        // bisa buat testing

        // end testing

        if (!$this->get('input_kode')) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
        endif;

        $kodeBooking  = strtoupper($this->get('input_kode'));

        $data           = $this->antrian->getDaftarBookingPasien($kodeBooking);

        if ($data === null) {

            $decode = 'Nodata';
            $kode = 201;

        } else {

            $decode = $data;
            $kode = 200;

        }

        $this->response($decode, $kode);
    }

    function cek_jumlah_cetak_get()
    {
        if (safe_get('id') === '') :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST);
        endif;

        $idAntrean = (int)safe_get('id');

        $cekCetak = $this->antrian->cekStatusTanggal($idAntrean);

        $this->response($cekCetak, REST_Controller::HTTP_OK);
    }

    function tambah_cetak_antrean_post()
    {
        if (safe_post('id') === '') :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST);
        endif;

        $this->db->trans_begin();

        $idAntrean = (int)safe_post('id');

        $data = $this->antrian->tambahCetakAntrean($idAntrean);

        if ($this->db->trans_status() === FALSE) :
            $this->db->trans_rollback();
            $status = FALSE;
        else :
            $this->db->trans_commit();
            $status = TRUE;
        endif;

        $this->response($data, REST_Controller::HTTP_OK);
    }

    function cek_tanggal_periksa_get()
    {

        $tanggal_periksa = $this->get('tanggal');

        $id_dokter = $this->get('id_dokter');

        $cek_jadwal = $this->antrian->cekJadwalDokter($tanggal_periksa, $id_dokter);
        $this->m_booking->logKuota($cek_jadwal, '$cek_jadwal', 'antrian_bpjs', 'cek_tanggal_periksa_get', $this->input->ip_address());

        if ($cek_jadwal === NULL) {

            $response = ["metaData" => ["code" => 201, "message" => 'Tidak ada Jadwal Dokter pada Tanggal Tersebut']];
        } else {

            $response = ["metaData" => ["code" => 200]];
        }

        $this->response($response, REST_Controller::HTTP_OK);
    }

    function booking_ulang_get()
    {

        $id_booking = $this->get('id');

        $data_booking = $this->antrian->getDataBooking($id_booking);

        if ($data_booking === NULL) {

            $response = ["metaData" => ["code" => 201, "respon" => 'Data Kosong, Silakan booking Antrean kembali']];
        } else {

            $response = ["metaData" => ["code" => 200, "respon" => $data_booking]];
        }

        $this->response($response, REST_Controller::HTTP_OK);
    }

    private function mulai($page)
    {
        return (((int)$page - 1) * (int)$this->batas);
    }

    function data_antrian_bpjs_get()
    {

        if ($this->get('page') === null) {

            $page = 1;
        } else {

            $page = (int)$this->get('page');
        }

        $search = [
            'tanggal_awal'      => safe_get('tanggal_awal'),
            'tanggal_akhir'     => safe_get('tanggal_akhir'),
            'no_kode_booking'   => safe_get('no_kode_booking'),
            'no_antrean'        => safe_get('no_antrean'),
            'nm_poli'           => safe_get('nm_poli'),
            'nm_dokter'         => safe_get('nm_dokter'),
            'status_antrean'    => safe_get('status_antrean'),
            'no_kartu'          => safe_get('no_kartu'),
            'filter'            => safe_get('filter')
        ];

        $start = $this->mulai((int)$page);

        $data = $this->antrian->dataAntrianBPJS((int)$this->batas, (int)$start, $search);

        $data['page'] = (int)$page;
        $data['limit'] = (int)$this->batas;

        if ($data) :
            $this->response($data, REST_Controller::HTTP_OK);
        endif;
    }

    function cek_antrian_bpjs_get()
    {

        $tanggal_periksa = $this->get('tanggal_periksa');
        $kebutuhan = $this->get('kebutuhan');
        $usia = $this->get('usia');

        $cek_jenis_pasien = safe_get('cek_jenis_pasien');
        $cek_no_hp = safe_get('cek_no_hp');
        $cek_no_ktp = safe_get('cek_no_ktp');
        $cek_no_rm = safe_get('cek_no_rm');
        $cek_no_bpjs = safe_get('cek_no_bpjs');
        $cek_kode_poli_bpjs = safe_get('cek_kode_poli_bpjs');

        $cek_data_antrian = $this->m_antrian_bridging->cekDataAntrian($tanggal_periksa, $cek_no_hp, $cek_no_ktp, $cek_no_rm, $cek_no_bpjs);
        if (!empty($cek_data_antrian) && $cek_jenis_pasien == "JKN") {
            $response = [
                "metaData" => [],
                "cekData" => [
                    "kodeBooking" => $cek_data_antrian->kode_booking,
                    "statusJKN" => $cek_data_antrian->status_jkn
                ],
                "jenisPasien" => $cek_jenis_pasien
            ];
        } else if (!empty($cek_data_antrian) && $cek_data_antrian->task_lima == null && $cek_kode_poli_bpjs == $cek_data_antrian->kode_bpjs_poli) {
            $response = [
                "metaData" => [],
                "cekData" => [
                    "kodeBooking" => $cek_data_antrian->kode_booking,
                    "statusJKN" => $cek_data_antrian->status_jkn
                ],
                "jenisPasien" => "Duplikat"
            ];
        } else {

            if ($usia === 'Prioritas' || $kebutuhan === 'Ya') {

                $cek_antrian = $this->antrian->cekAntrianBPJS('Prioritas', $tanggal_periksa);

                $ubah_tanggal = str_replace('-', '', $tanggal_periksa);
                $tambah_nol = sprintf("%03d", $cek_antrian);
                $kode_booking = $ubah_tanggal . 'A' . $tambah_nol;
                $huruf_antrean = 'A';
                $nomor_antrean = 'A' . $tambah_nol;

                $response = ["metaData" => ["code" => 200, "response" => ["kode_booking" => $kode_booking, "huruf_antrean" => $huruf_antrean, "nomor_antrean" => $nomor_antrean, "angka_antrean" => $tambah_nol, "urutan" => $cek_antrian, "usia" => 'Prioritas']]];
            } else {

                if ($usia === 'Tunai') {

                    $cek_antrian = $this->antrian->cekAntrianBPJS('Tunai', $tanggal_periksa);

                    $ubah_tanggal = str_replace('-', '', $tanggal_periksa);
                    $tambah_nol = sprintf("%03d", $cek_antrian);
                    $kode_booking = $ubah_tanggal . 'C' . $tambah_nol;
                    $huruf_antrean = 'C';
                    $nomor_antrean = 'C' . $tambah_nol;

                    $response = ["metaData" => ["code" => 200, "response" => ["kode_booking" => $kode_booking, "huruf_antrean" => $huruf_antrean, "nomor_antrean" => $nomor_antrean, "angka_antrean" => $tambah_nol, "urutan" => $cek_antrian, "usia" => 'Tunai']]];
                } else if ($usia === 'Informasi') {

                    $cek_antrian = $this->antrian->cekAntrianBPJS('Informasi', $tanggal_periksa);

                    $ubah_tanggal = str_replace('-', '', $tanggal_periksa);
                    $tambah_nol = sprintf("%03d", $cek_antrian);
                    $kode_booking = $ubah_tanggal . 'D' . $tambah_nol;
                    $huruf_antrean = 'D';
                    $nomor_antrean = 'D' . $tambah_nol;

                    $response = ["metaData" => ["code" => 200, "response" => ["kode_booking" => $kode_booking, "huruf_antrean" => $huruf_antrean, "nomor_antrean" => $nomor_antrean, "angka_antrean" => $tambah_nol, "urutan" => $cek_antrian, "usia" => 'Informasi']]];
                } else if ($usia === 'Antrian APM') {

                    $cek_antrian = $this->antrian->cekAntrianBPJS('Antrian APM', $tanggal_periksa);

                    $ubah_tanggal = str_replace('-', '', $tanggal_periksa);
                    $tambah_nol = sprintf("%03d", $cek_antrian);
                    $kode_booking = $ubah_tanggal . 'I' . $tambah_nol;
                    $huruf_antrean = 'I';
                    $nomor_antrean = 'I' . $tambah_nol;

                    $response = ["metaData" => ["code" => 200, "response" => ["kode_booking" => $kode_booking, "huruf_antrean" => $huruf_antrean, "nomor_antrean" => $nomor_antrean, "angka_antrean" => $tambah_nol, "urutan" => $cek_antrian, "usia" => $usia]]];
                } else if ($usia === 'PK') {

                    $cek_antrian = $this->antrian->cekAntrianBPJS('PK', $tanggal_periksa);

                    $ubah_tanggal = str_replace('-', '', $tanggal_periksa);
                    $tambah_nol = sprintf("%03d", $cek_antrian);
                    $kode_booking = $ubah_tanggal . 'E' . $tambah_nol;
                    $huruf_antrean = 'E';
                    $nomor_antrean = 'E' . $tambah_nol;

                    $response = ["metaData" => ["code" => 200, "response" => ["kode_booking" => $kode_booking, "huruf_antrean" => $huruf_antrean, "nomor_antrean" => $nomor_antrean, "angka_antrean" => $tambah_nol, "urutan" => $cek_antrian, "usia" => 'PK']]];
                } else if ($usia === 'ltempat') {

                    $cek_antrian = $this->antrian->cekAntrianBPJS('ltempat', $tanggal_periksa);

                    $ubah_tanggal = str_replace('-', '', $tanggal_periksa);
                    $tambah_nol = sprintf("%03d", $cek_antrian);
                    $kode_booking = $ubah_tanggal . 'F' . $tambah_nol;
                    $huruf_antrean = 'F';
                    $nomor_antrean = 'F' . $tambah_nol;

                    $response = ["metaData" => ["code" => 200, "response" => ["kode_booking" => $kode_booking, "huruf_antrean" => $huruf_antrean, "nomor_antrean" => $nomor_antrean, "angka_antrean" => $tambah_nol, "urutan" => $cek_antrian, "usia" => 'ltempat']]];
                } else if ($usia === 'Paru') {

                    $cek_antrian = $this->antrian->cekAntrianBPJS('Paru', $tanggal_periksa);

                    $ubah_tanggal = str_replace('-', '', $tanggal_periksa);
                    $tambah_nol = sprintf("%03d", $cek_antrian);
                    $kode_booking = $ubah_tanggal . 'G' . $tambah_nol;
                    $huruf_antrean = 'G';
                    $nomor_antrean = 'G' . $tambah_nol;

                    $response = ["metaData" => ["code" => 200, "response" => ["kode_booking" => $kode_booking, "huruf_antrean" => $huruf_antrean, "nomor_antrean" => $nomor_antrean, "angka_antrean" => $tambah_nol, "urutan" => $cek_antrian, "usia" => 'Paru']]];
                } else if ($usia === 'JKN') {

                    $cek_antrian = $this->antrian->cekAntrianBPJS('JKN', $tanggal_periksa);

                    $ubah_tanggal = str_replace('-', '', $tanggal_periksa);
                    $tambah_nol = sprintf("%03d", $cek_antrian);
                    $kode_booking = $ubah_tanggal . 'H' . $tambah_nol;
                    $huruf_antrean = 'H';
                    $nomor_antrean = 'H' . $tambah_nol;

                    $response = ["metaData" => ["code" => 200, "response" => ["kode_booking" => $kode_booking, "huruf_antrean" => $huruf_antrean, "nomor_antrean" => $nomor_antrean, "angka_antrean" => $tambah_nol, "urutan" => $cek_antrian, "usia" => 'JKN']]];
                } else {

                    $cek_antrian = $this->antrian->cekAntrianBPJS('Asuransi', $tanggal_periksa);

                    $ubah_tanggal = str_replace('-', '', $tanggal_periksa);
                    $tambah_nol = sprintf("%03d", $cek_antrian);
                    $kode_booking = $ubah_tanggal . 'B' . $tambah_nol;
                    $huruf_antrean = 'B';
                    $nomor_antrean = 'B' . $tambah_nol;

                    $response = ["metaData" => ["code" => 200, "response" => ["kode_booking" => $kode_booking, "huruf_antrean" => $huruf_antrean, "nomor_antrean" => $nomor_antrean, "angka_antrean" => $tambah_nol, "urutan" => $cek_antrian, "usia" => 'Asuransi']]];
                }
            }
        }

        $this->response($response, REST_Controller::HTTP_OK);
    }

    function tambah_antrian_bpjs_post()
    {
        $this->db->trans_begin();

        $this->load->model('pelayanan/Pelayanan_model', 'pelayanan');

        $number = (int)safe_post('kode_bpjs_dokter');

        $nik = safe_post('nik_identitas');
        $estimasi = (int)safe_post('estimasi');
        $kode_booking = safe_post('kode_booking');
        $pasien_baru = (int)safe_post('pasien_baru');
        $angka_antrean = safe_post('angka_antrean');
        $nomor_antrean = safe_post('nomor_antrean');
        $huruf_antrean = safe_post('huruf_antrean');
        $id_dokter_bpjs = (int)safe_post('id_dokter_bpjs');
        $id_poli = (int)safe_post('id_poli');
        $usia = safe_post('usia');
        $id_user = $this->session->userdata('id_translucent');
        $kebutuhan = safe_post('kebutuhan_khusus');
        $jenis_pasien = safe_post('jenis_pasien');
        $id_jadwal_dokter = (int)safe_post('id_jadwal_dokter'); // tambahan id_jadwal_dokter

        if ($kebutuhan === 'Ya') {

            $kebutuhan_khusus = 1;
        } else {

            $kebutuhan_khusus = 0;
        }

        if ($pasien_baru === 1) {

            $status_rm = 1;
        } else {

            $status_rm = 0;
        }

        $tanggal_periksa = (safe_post('tanggal_periksa') !== '' ? datetopg(safe_post('tanggal_periksa')) : NULL);

        if ($huruf_antrean === 'D' || $id_poli === 58) {

            date_default_timezone_set('Asia/Jakarta');
            $new_estimasi = date('Y-m-d H:i:s', $estimasi / 1000);

            $antrian = array(

                "kode_booking"      => $kode_booking,
                "urutan"            => $angka_antrean,
                "nomor_antrean"     => $nomor_antrean,
                "huruf_antrean"     => $huruf_antrean,
                "tanggal_kunjungan" => (safe_post('tanggal_periksa') !== '' ? datetopg(safe_post('tanggal_periksa')) : NULL),
                "kebutuhan"         => (int)$kebutuhan_khusus,
                "create_date"       => $this->datetime,
                "status"            => 'Booking',
                "lokasi_data"       => 'rsud',
                "usia_pasien"       => $usia,
                "pasien_baru"       => $pasien_baru,
                "waktu_estimasi"    => $new_estimasi, //waktu estimasi dilayani dalam miliseconds
                "status_rm"         => $status_rm,
                "user_create"       => $id_user,
                // "id_jadwal_dokter"  => $id_jadwal_dokter, // tambahan id_jadwal_dokter
            );

            $id_antrian = $this->antrian->simpanDataAntrian($antrian);

            if ($id_antrian !== NULL) {

                $array_response = ["status_respon" => 200, "pesan_response" => 'Ok.'];
                $this->db->where('id', $id_antrian)->update('sm_antrian_bpjs', $array_response);

                $listAntrian = $this->db->get_where('sm_antrian_bpjs', array('id' => $id_antrian))->row();

                $decode = [
                    "metaData" => ["code" => 200, "message" => "Tambah Antrian Berhasil"],
                    "dataAntrian" => $listAntrian
                ];
            } else {

                $decode = ["metaData" => ["code" => 201, "message" => "Gagal Booking Antrian"]];
            }
        } else if ($huruf_antrean === 'C' && ($id_poli === 0 && $id_dokter_bpjs === 0)) {

            date_default_timezone_set('Asia/Jakarta');
            $new_estimasi = date('Y-m-d H:i:s', $estimasi / 1000);

            $antrian = array(

                "kode_booking"      => $kode_booking,
                "urutan"            => $angka_antrean,
                "nomor_antrean"     => $nomor_antrean,
                "huruf_antrean"     => $huruf_antrean,
                "tanggal_kunjungan" => (safe_post('tanggal_periksa') !== '' ? datetopg(safe_post('tanggal_periksa')) : NULL),
                "kebutuhan"         => (int)$kebutuhan_khusus,
                "create_date"       => $this->datetime,
                "status"            => 'Booking',
                "lokasi_data"       => 'rsud',
                "usia_pasien"       => $usia,
                "pasien_baru"       => $pasien_baru,
                "waktu_estimasi"    => $new_estimasi, //waktu estimasi dilayani dalam miliseconds
                "status_rm"         => $status_rm,
                "user_create"       => $id_user,
                "id_jadwal_dokter"  => $id_jadwal_dokter, // tambahan id_jadwal_dokter
            );

            $id_antrian = $this->antrian->simpanDataAntrian($antrian);

            if ($id_antrian !== NULL) {

                $array_response = ["status_respon" => 200, "pesan_response" => 'Ok.'];
                $this->db->where('id', $id_antrian)->update('sm_antrian_bpjs', $array_response);

                $listAntrian = $this->db->get_where('sm_antrian_bpjs', array('id' => $id_antrian))->row();

                $this->pelayanan->ubahJadwalDokterKuota('tambah', $tanggal_periksa, $id_poli, $id_dokter);

                $decode = [
                    "metaData" => ["code" => 200, "message" => "Tambah Antrian Berhasil"],
                    "dataAntrian" => $listAntrian
                ];
            } else {

                $decode = ["metaData" => ["code" => 201, "message" => "Gagal Booking Antrian"]];
            }
        } else {

            $cek_kuota = $this->antrian->cekKuota($tanggal_periksa, $id_poli);
            $total_kuota = (int)$cek_kuota[0]->sum;
            $pemakaian_kuota = $this->antrian->pakaiKuota($tanggal_periksa, $id_poli);
            $total_pakai = (int)$pemakaian_kuota[0]->sum;
            $sisa_kuota = $total_kuota - $total_pakai;

            if ($sisa_kuota > 0) {

                $cek_jadwal = $this->antrian->cekShiftDokter($tanggal_periksa, $id_jadwal_dokter);
                $shiftPoli = $cek_jadwal->shift_poli;

                $this->m_booking->logKuota($cek_jadwal, '$cek_jadwal', 'antrian_bpjs', 'tambah_antrian_bpjs_post', $this->input->ip_address());

                if (isset($cek_jadwal->kuota) && isset($cek_jadwal->jml_kunjung)) {

                    $kuota_dokter = (int)$cek_jadwal->kuota;
                    $kunjungan_dokter = (int)$cek_jadwal->jml_kunjung;
                    $total_kunjungan_dokter = (int)$kuota_dokter - (int)$kunjungan_dokter;
                } else {

                    $total_kunjungan_dokter = null;
                }

                if ((int)$total_kunjungan_dokter === 0 | $total_kunjungan_dokter === null) {

                    $kuota_ada = $this->antrian->cekAdaKuota($tanggal_periksa, $id_poli);

                    $dokter = array();
                    $id_jadwal = array();
                    foreach ($kuota_ada as $key => $value) {

                        if ($value->hasil > 0) {

                            $dokter[] = $value->id_dokter;
                            $jadwal[] = $value->id;
                            $bpjs[] = $value->bpjs;
                            $nama_dokter[] = $value->nama_dokter;
                            $idPoli[] = $value->id_poli;
                        }
                    }

                    $id_dokter = (int)$dokter[0];
                    $id_jadwal = (int)$jadwal[0];
                    $id_bpjs = $bpjs[0];
                    $id_poli = $idPoli[0];
                    $nama = $nama_dokter[0];
                    $cek_ulang_jadwal = $this->antrian->cekShiftDokter($tanggal_periksa, $id_jadwal_dokter);
                    $this->m_booking->logKuota($cek_ulang_jadwal, '$cek_ulang_jadwal', 'antrian_bpjs', 'tambah_antrian_bpjs_post', $this->input->ip_address());
                    $kunjung_dokter = (int)$cek_ulang_jadwal->jml_kunjung;
                    $kuota_dokter = (int)$cek_ulang_jadwal->kuota;
                    if ($kunjung_dokter < $kuota_dokter) {

                        $tambah_kunjung = $kunjung_dokter + 1;
                        $sisa_kuota_dokter = $kuota_dokter - $tambah_kunjung;

                        $this->pelayanan->ubahJadwalDokterKuota('tambah', $tanggal_periksa, $id_poli, $id_dokter, $shiftPoli);

                        $forlog = $this->db->select('*')
                            ->from('sm_jadwal_dokter')
                            ->where('id', $cek_ulang_jadwal->id)
                            ->get()->row();

                        $this->m_booking->logKuota($forlog, '$update_kunjungan_1', 'antrian_bpjs', 'tambah_antrian_bpjs_post', $this->input->ip_address());

                        date_default_timezone_set('Asia/Jakarta');
                        $new_estimasi = date('Y-m-d H:i:s', $estimasi / 1000);

                        $antrian = array(

                            "kode_booking"      => $kode_booking,
                            "urutan"            => $angka_antrean,
                            "nomor_antrean"     => $nomor_antrean,
                            "huruf_antrean"     => $huruf_antrean,
                            "kode_bpjs_dokter"  => $id_bpjs,
                            "nama_poli"         => $id_poli,
                            "kode_bpjs_poli"    => (safe_post('kode_poli_bpjs') !== '') ? safe_post('kode_poli_bpjs') : NULL,
                            "tanggal_kunjungan" => (safe_post('tanggal_periksa') !== '' ? datetopg(safe_post('tanggal_periksa')) : NULL),
                            "kebutuhan"         => (int)$kebutuhan_khusus,
                            "create_date"       => $this->datetime,
                            "status"            => 'Booking',
                            "lokasi_data"       => 'rsud',
                            "status_jkn"        => (safe_post('jenis_pasien') !== '') ? safe_post('jenis_pasien') : NULL,
                            "usia_pasien"       => $usia,
                            "pasien_baru"       => $pasien_baru,
                            "waktu_estimasi"    => $new_estimasi, //waktu estimasi dilayani dalam miliseconds
                            "id_dokter"         => $id_dokter,
                            "status_rm"         => $status_rm,
                            "nama_dokter"       => $nama,
                            "jenis_kunjungan"   => (safe_post('jenis_kunjungan') !== '') ? safe_post('jenis_kunjungan') : NULL,
                            "sisa_kuota"        => $sisa_kuota_dokter,
                            "total_kuota"       => $kuota_dokter,
                            "user_create"       => $id_user,
                            "id_jadwal_dokter"  => $id_jadwal_dokter, // tambahan id_jadwal_dokter
                        );

                        // tambahan wahyu
                        $tanggalperiksa = safe_post('tanggal_periksa');
                        date_default_timezone_set('Asia/Jakarta');
                        $req = array(
                            "kodebooking"        => $kode_booking,
                            "jenispasien"        => safe_post('jenis_pasien'),
                            "nomorkartu"         => safe_post('no_bpjs_antrian'),
                            "nik"                => safe_post('no_ktp_antrian'),
                            "nohp"               => safe_post('no_hp_antrian'),
                            "kodepoli"           => safe_post('kode_poli_bpjs'),
                            "namapoli"           => safe_post('nama_poli'),
                            "pasienbaru"         => (int)safe_post('pasien_baru'),
                            "norm"               => safe_post('no_rm_antrian'),
                            "tanggalperiksa"     => date('Y-m-d', strtotime(str_replace('/', '-', $tanggalperiksa))),
                            "kodedokter"         => (int)safe_post('kode_bpjs_dokter'),
                            "namadokter"         => safe_post('nama_dokter_bpjs'),
                            "jampraktek"         => "07:30-14:00",
                            "jeniskunjungan"     => (int)safe_post('jenis_kunjungan'),
                            "nomorreferensi"     => safe_post('no_rujukan_antrian'),
                            "nomorantrean"       => safe_post('nomor_antrean'),
                            "angkaantrean"       => (int)safe_post('angka_antrean'),
                            "estimasidilayani"   => (int)safe_post('estimasi'),
                            "sisakuotajkn"       => $sisa_kuota_dokter,
                            "kuotajkn"           => $kuota_dokter,
                            "sisakuotanonjkn"    => $sisa_kuota_dokter,
                            "kuotanonjkn"        => $kuota_dokter,
                            "keterangan"         => "Peserta harap 30 menit lebih awal guna pencatatan administrasi."
                        );

                        $add_antrian = array(
                            "nik"               => str_replace(' ', '', safe_post('no_ktp_antrian')),
                            "no_kartu"          => str_replace(' ', '', safe_post('no_bpjs_antrian')),
                            "no_rm"             => str_replace(' ', '', safe_post('no_rm_antrian')),
                            "no_hp"             => str_replace(' ', '', safe_post('no_hp_antrian')),
                            "no_referensi"      => str_replace(' ', '', safe_post('no_rujukan_antrian')),
                            "tanggal_lahir"     => safe_post('tgl_lahir_antrian')
                        );
                        $antrian_bpjs = array_merge($antrian, $add_antrian);
                        // end

                        if ($jenis_pasien === 'NON JKN') {

                            $id_antrian = $this->antrian->simpanDataAntrian($antrian);

                            if ($id_antrian !== NULL) {

                                $array_response = ["status_respon" => 200, "pesan_response" => 'Ok.'];
                                $this->db->where('id', $id_antrian)->update('sm_antrian_bpjs', $array_response);

                                $listAntrian = $this->db->get_where('sm_antrian_bpjs', array('id' => $id_antrian))->row();

                                $decode = [
                                    "metaData" => ["code" => 200, "message" => "Tambah Antrian Berhasil"],
                                    "dataAntrian" => $listAntrian
                                ];
                            } else {

                                $this->pelayanan->ubahJadwalDokterKuota('kurang', $tanggal_periksa, $id_poli, $id_dokter, $shiftPoli);
                                $decode = ["metaData" => ["code" => 201, "message" => "Gagal Booking Antrian"]];
                            }
                        } else {

                            // bridging

                            $bridging_antrian = $this->add_antrean_bpjs($req);
                            if ($bridging_antrian->metadata->code !== 200) {

                            //end bridging

                            // if ($id_antrian !== NULL) {

                            // end stop bridging

                                $this->pelayanan->ubahJadwalDokterKuota('kurang', $tanggal_periksa, $id_poli, $id_dokter, $shiftPoli);
                                // bridging
                                $decode = ["metaData" => ["code" => $bridging_antrian->metadata->code, "message" => $bridging_antrian->metadata->message]];
                                // end bridging
                                //stop bridging
                                // $decode = ["metaData" => ["code" => 201, "message" => 'tambah antrian gagal']];
                                // end stop bridging
                            } else {

                                // bridging
                                $decode = ["metaData" => ["code" => $bridging_antrian->metadata->code, "message" => $bridging_antrian->metadata->message]];
                                // end bridging

                                //stop bridging
                                // $decode = ["metaData" => ["code" => 200, "message" => 'tambah antrian Berhasil']];
                                // end stop bridging
                                
                                // Tambahan Wahyu:
                                if (!empty(safe_post('no_rujukan_antrian'))) {
                                    $this->load->model('vclaim_bpjs/Vclaim_v2_model', 'm_vclaim');
                                    $dataRujukan = $this->m_vclaim->get_rujukan_rs(safe_post('no_rujukan_antrian'));

                                    $tgl_kunjungan = $dataRujukan->response->rujukan->tglKunjungan;

                                    $antrian_bpjs['asal_faskes'] = $dataRujukan->response->rujukan->provPerujuk->nama; // Asal Faskes
                                    $antrian_bpjs['kode_bpjs_poli_rujukan'] = $dataRujukan->response->rujukan->poliRujukan->kode; // Kode Poli Rujukan
                                    $antrian_bpjs['kadaluarsa_rujukan'] = date('Y-m-d', strtotime($tgl_kunjungan . ' +89 days')); // Masa Berlaku Rujukan Terakhir
                                }
                                // END

                                // tambahan charis
                                if(isset($antrian_bpjs['no_kartu'])){
                                    $this->m_booking->updateHakKelasPasien($antrian_bpjs);
                                }
                                $id_antrian = $this->antrian->simpanDataAntrian($antrian_bpjs);

                                if ($id_antrian !== NULL) {

                                    $array_response = [
                                        "status_respon"     => 200,
                                        "pesan_response"    => 'Ok.',
                                        "kirim_bpjs"        => "Sudah",
                                        // bridging
                                        "respon_bpjs"       => $bridging_antrian->metadata->code,
                                        "ket_bridging"      => $bridging_antrian->metadata->message
                                        // end bridging
                                        //stop bridging
                                        // "respon_bpjs"       => 200,
                                        // "ket_bridging"      => 'Tambah Antrian Berhasil'
                                        // end stop bridging
                                    ];
                                    $this->db->where('id', $id_antrian)->update('sm_antrian_bpjs', $array_response);

                                    $listAntrian = $this->db->get_where('sm_antrian_bpjs', array('id' => $id_antrian))->row();

                                    $decode = [
                                        "metaData" => ["code" => 200, "message" => "Tambah Antrian Berhasil"],
                                        "dataAntrian" => $listAntrian
                                    ];
                                } else {

                                    $decode = ["metaData" => ["code" => 201, "message" => "Gagal Booking Antrian"]];
                                }
                            }
                        }
                    } else {
                        // $decode = ["metaData" => ["code" => 201, "message" => "Kuota Habis"]];	
                        $decode = ["metaData" => ["code" => 201, "message" => "Kuota Habis", "kunjung_dokter" => $kunjung_dokter, "kuota_dokter" => $kuota_dokter]];
                    }
                } else {

                    $cek = $this->antrian->cekShiftDokter($tanggal_periksa, $id_jadwal_dokter);
                    $shiftPoli = $cek_jadwal->shift_poli;

                    $this->m_booking->logKuota($cek, '$cek', 'antrian_bpjs', 'tambah_antrian_bpjs_post', $this->input->ip_address());
                    $kunjungan_dokter = (int)$cek->jml_kunjung;
                    $cek_kuota_dokter = (int)$cek->kuota;
                    $id_jadwal_dokter = (int)$cek->id;

                    if ($kunjungan_dokter < $cek_kuota_dokter) {

                        $tambah_kunjungan = $kunjungan_dokter + 1;
                        $sisa_cek_kuota = $cek_kuota_dokter - $tambah_kunjungan;
                        $idPoli = $cek->id_poli;
                        $idDokter = $cek->id_dokter;

                        $this->pelayanan->ubahJadwalDokterKuota('tambah', $tanggal_periksa, $idPoli, $idDokter, $shiftPoli);

                        $forlog = $this->db->select('*')
                            ->from('sm_jadwal_dokter')
                            ->where('id', $cek->id)
                            ->get()->row();

                        $this->m_booking->logKuota($forlog, '$update_kunjungan_2', 'antrian_bpjs', 'tambah_antrian_bpjs_post', $this->input->ip_address());
                        date_default_timezone_set('Asia/Jakarta');
                        $new_estimasi = date('Y-m-d H:i:s', $estimasi / 1000);

                        $antrian = array(

                            "kode_booking"      => $kode_booking,
                            "urutan"            => $angka_antrean,
                            "nomor_antrean"     => $nomor_antrean,
                            "huruf_antrean"     => $huruf_antrean,
                            "kode_bpjs_dokter"  => $number,
                            "nama_poli"         => $id_poli,
                            "kode_bpjs_poli"    => (safe_post('kode_poli_bpjs') !== '') ? safe_post('kode_poli_bpjs') : NULL,
                            "tanggal_kunjungan" => (safe_post('tanggal_periksa') !== '' ? datetopg(safe_post('tanggal_periksa')) : NULL),
                            "kebutuhan"         => (int)$kebutuhan_khusus,
                            "create_date"       => $this->datetime,
                            "status"            => 'Booking',
                            "lokasi_data"       => 'rsud',
                            "status_jkn"        => (safe_post('jenis_pasien') !== '') ? safe_post('jenis_pasien') : NULL,
                            "usia_pasien"       => $usia,
                            "pasien_baru"       => $pasien_baru,
                            "waktu_estimasi"    => $new_estimasi, //waktu estimasi dilayani dalam miliseconds
                            "id_dokter"         => $id_dokter_bpjs,
                            "status_rm"         => $status_rm,
                            "nama_dokter"       => (safe_post('nama_dokter_bpjs') !== '') ? safe_post('nama_dokter_bpjs') : NULL,
                            "jenis_kunjungan"   => (safe_post('jenis_kunjungan') !== '') ? safe_post('jenis_kunjungan') : NULL,
                            "sisa_kuota"        => $sisa_cek_kuota,
                            "total_kuota"       => $cek_kuota_dokter,
                            "user_create"       => $id_user,
                            "id_jadwal_dokter"  => $id_jadwal_dokter, // tambahan id_jadwal_dokter
                        );

                        // tambahan wahyu
                        $tanggalperiksa = safe_post('tanggal_periksa');
                        date_default_timezone_set('Asia/Jakarta');
                        $req = array(
                            "kodebooking"        => $kode_booking,
                            "jenispasien"        => safe_post('jenis_pasien'),
                            "nomorkartu"         => safe_post('no_bpjs_antrian'),
                            "nik"                => safe_post('no_ktp_antrian'),
                            "nohp"               => safe_post('no_hp_antrian'),
                            "kodepoli"           => safe_post('kode_poli_bpjs'),
                            "namapoli"           => safe_post('nama_poli'),
                            "pasienbaru"         => (int)safe_post('pasien_baru'),
                            "norm"               => safe_post('no_rm_antrian'),
                            "tanggalperiksa"     => date('Y-m-d', strtotime(str_replace('/', '-', $tanggalperiksa))),
                            "kodedokter"         => (int)safe_post('kode_bpjs_dokter'),
                            "namadokter"         => safe_post('nama_dokter_bpjs'),
                            "jampraktek"         => "07:30-14:00",
                            "jeniskunjungan"     => (int)safe_post('jenis_kunjungan'),
                            "nomorreferensi"     => safe_post('no_rujukan_antrian'),
                            "nomorantrean"       => safe_post('nomor_antrean'),
                            "angkaantrean"       => (int)safe_post('angka_antrean'),
                            "estimasidilayani"   => (int)safe_post('estimasi'),
                            "sisakuotajkn"       => $sisa_cek_kuota,
                            "kuotajkn"           => $cek_kuota_dokter,
                            "sisakuotanonjkn"    => $sisa_cek_kuota,
                            "kuotanonjkn"        => $cek_kuota_dokter,
                            "keterangan"         => "Peserta harap 30 menit lebih awal guna pencatatan administrasi."
                        );

                        $add_antrian = array(
                            "nik"               => str_replace(' ', '', safe_post('no_ktp_antrian')),
                            "no_kartu"          => str_replace(' ', '', safe_post('no_bpjs_antrian')),
                            "no_rm"             => str_replace(' ', '', safe_post('no_rm_antrian')),
                            "no_hp"             => str_replace(' ', '', safe_post('no_hp_antrian')),
                            "no_referensi"      => str_replace(' ', '', safe_post('no_rujukan_antrian')),
                            "tanggal_lahir"     => safe_post('tgl_lahir_antrian')
                        );
                        $antrian_bpjs = array_merge($antrian, $add_antrian);

                        if ($jenis_pasien === 'NON JKN') {

                            $id_antrian = $this->antrian->simpanDataAntrian($antrian);

                            if ($id_antrian !== NULL) {

                                $array_response = ["status_respon" => 200, "pesan_response" => 'Ok.'];
                                $this->db->where('id', $id_antrian)->update('sm_antrian_bpjs', $array_response);

                                $listAntrian = $this->db->get_where('sm_antrian_bpjs', array('id' => $id_antrian))->row();

                                $decode = [
                                    "metaData" => ["code" => 200, "message" => "Tambah Antrian Berhasil"],
                                    "dataAntrian" => $listAntrian
                                ];
                            } else {

                                $this->pelayanan->ubahJadwalDokterKuota('kurang', $tanggal_periksa, $idPoli, $idDokter, $shiftPoli);
                                $decode = ["metaData" => ["code" => 201, "message" => "Gagal Booking Antrian"]];
                            }
                        } else {
                            // bridging

                            $bridging_antrian = $this->add_antrean_bpjs($req);

                            // end bridging

                            //stop bridging
                            // if (isset($id_antrian)) {
                            // end stop bridging

                            // bridging
                            if (isset($bridging_antrian->metadata)) {
                                if ($bridging_antrian->metadata->code !== 200) {

                            // end bridging

                                //stop bridging
                                // if ($id_antrian !== NULL) {
                                // end stop bridging

                                    $this->pelayanan->ubahJadwalDokterKuota('kurang', $tanggal_periksa, $idPoli, $idDokter, $shiftPoli);
                                    // bridging
                                    $decode = ["metaData" => ["code" => $bridging_antrian->metadata->code, "message" => $bridging_antrian->metadata->message]];
                                    // end bridging

                                    //stop bridging
                                    // $decode = ["metaData" => ["code" => 201, "message" => "Gagal Booking Antrian"]];
                                    // end stop bridging
                                } else {
                                    // bridging
                                    $decode = ["metaData" => ["code" => $bridging_antrian->metadata->code, "message" => $bridging_antrian->metadata->message]];
                                    // end bridging
                                    //stop bridging
                                    // $decode = ["metaData" => ["code" => 200, "message" => "Berhasil Booking Antrian"]];
                                    // end stop bridging

                                    // Tambahan Wahyu:
                                    if (!empty(safe_post('no_rujukan_antrian'))) {
                                        $this->load->model('vclaim_bpjs/Vclaim_v2_model', 'm_vclaim');
                                        $dataRujukan = $this->m_vclaim->get_rujukan_rs(safe_post('no_rujukan_antrian'));

                                        $tgl_kunjungan = $dataRujukan->response->rujukan->tglKunjungan;

                                        $antrian_bpjs['asal_faskes'] = $dataRujukan->response->rujukan->provPerujuk->nama; // Asal Faskes
                                        $antrian_bpjs['kode_bpjs_poli_rujukan'] = $dataRujukan->response->rujukan->poliRujukan->kode; // Kode Poli Rujukan
                                        $antrian_bpjs['kadaluarsa_rujukan'] = date('Y-m-d', strtotime($tgl_kunjungan . ' +89 days')); // Masa Berlaku Rujukan Terakhir
                                    }
                                    // END

                                    // tambahan charis
                                    if(isset($antrian_bpjs['no_kartu'])){
                                        $this->m_booking->updateHakKelasPasien($antrian_bpjs);
                                    }
                                    $id_antrian = $this->antrian->simpanDataAntrian($antrian_bpjs);

                                    if ($id_antrian !== NULL) {

                                        $array_response = [
                                            "status_respon"     => 200,
                                            "pesan_response"    => 'Ok.',
                                            "kirim_bpjs"        => "Sudah",
                                            // bridging
                                            "respon_bpjs"       => $bridging_antrian->metadata->code,
                                            "ket_bridging"      => $bridging_antrian->metadata->message
                                            // end bridging
                                            //stop bridging
                                            // "respon_bpjs"       => 200,
                                            // "ket_bridging"      => 'Berhasil Booking Antrian'
                                            // end stop bridging
                                        ];
                                        $this->db->where('id', $id_antrian)->update('sm_antrian_bpjs', $array_response);

                                        $listAntrian = $this->db->get_where('sm_antrian_bpjs', array('id' => $id_antrian))->row();

                                        $decode = [
                                            "metaData" => ["code" => 200, "message" => "Tambah Antrian Berhasil"],
                                            "dataAntrian" => $listAntrian
                                        ];
                                    } else {

                                        $decode = ["metaData" => ["code" => 201, "message" => "Gagal Booking Antrian"]];
                                    }
                                }
                            } else {

                                $this->pelayanan->ubahJadwalDokterKuota('kurang', $tanggal_periksa, $idPoli, $idDokter, $shiftPoli);
                                $decode = ["metaData" => ["code" => $this->code, "message" => $this->message]];
                            }
                        }
                    } else {

                        // $decode = ["metaData" => ["code" => 201, "message" => "Kuota Habis"]];	
                        $decode = ["metaData" => ["code" => 201, "message" => "Kuota Habis", "kunjungan_dokter" => $kunjungan_dokter, "cek_kuota_dokter" => $cek_kuota_dokter]];
                    }
                }
            } else {

                //$decode = ["metaData" => ["code" => 201, "message" => "Kuota Habis"]]; 
                $decode = ["metaData" => ["code" => 201, "message" => "Kuota Habis", "sisa_kuota" => $sisa_kuota, "total_kuota" => $total_kuota, "total_pakai" => $total_pakai]];
            }
        }

        if ($this->db->trans_status() === FALSE) :
            $this->db->trans_rollback();
            $status = FALSE;
        else :
            $this->db->trans_commit();
            $status = TRUE;
        endif;

        $this->response($decode, REST_Controller::HTTP_OK);
    }

    // Tambahan wahyu
    public function add_antrean_bpjs($req)
    {
        $url = $this->antrean_config->server . "antrean/add";
        $header = $this->m_antrian_bridging->createHeader($this->antrean_config);
        $output = postCurl($url, json_encode($req), $header);
        $decode = json_decode($output);

        return $decode;
    }
    // end tambahan wahyu

    function booking_kembali_post()
    {

        $this->db->trans_begin();

        $id_booking = $this->get('id');

        $data_booking = $this->antrian->getDataBooking($id_booking);

        $decode = $data_booking;

        $cek_kuota = $this->antrian->cekKuota($data_booking->tanggal_kunjungan, $data_booking->nama_poli);
        $total_kuota = (int)$cek_kuota[0]->sum;
        $pemakaian_kuota = $this->antrian->pakaiKuota($data_booking->tanggal_kunjungan, $data_booking->nama_poli);
        $total_pakai = (int)$pemakaian_kuota[0]->sum;
        $sisa_kuota = $total_kuota - $total_pakai;

        $estimate = new DateTime($data_booking->waktu_estimasi);
        $nw_est = $estimate->getTimestamp();
        $nw_est_one = $nw_est * 1000;

        $url = $this->bpjs_config->server . "antrean/add";

        $header = $this->antrian->createHeader($this->bpjs_config);

        $params = array(
            "kodebooking" => $data_booking->kode_booking,
            "jenispasien" => $data_booking->status_jkn,
            "nomorkartu" => $data_booking->no_kartu,
            "nik" => $data_booking->nik,
            "nohp" => $data_booking->no_hp,
            "kodepoli" => $data_booking->kode_bpjs_poli,
            "namapoli" => $data_booking->poli,
            "pasienbaru" => (int)$data_booking->pasien_baru,
            "norm" => $data_booking->no_rm,
            "tanggalperiksa" => $data_booking->tanggal_kunjungan,
            "kodedokter" => (int)$data_booking->kode_bpjs_dokter,
            "namadokter" => $data_booking->nama_dokter,
            "jampraktek" => "07:30-14:00",
            "jeniskunjungan" => (int)$data_booking->jenis_kunjungan,
            "nomorreferensi" => $data_booking->no_referensi,
            "nomorantrean" => $data_booking->nomor_antrean,
            "angkaantrean" => (int)$data_booking->urutan,
            "estimasidilayani" => $nw_est_one, //waktu estimasi dilayani dalam miliseconds
            "sisakuotajkn" => $sisa_kuota,
            "kuotajkn" => $total_kuota,
            "sisakuotanonjkn" => 0,
            "kuotanonjkn" => 0,
            "keterangan" => "Peserta harap 30 menit lebih awal guna pencatatan administrasi."
        );


        $data_api = json_encode($params);

        $output = postCurl($url, $data_api, $header);
        $decode = json_decode($output);

        if ($decode !== NULL) {

            if (isset($decode->metadata->code)) {

                $pesan = $decode->metadata->code;

                if ($pesan === 200) {

                    $array_response = ["status_respon" => $pesan, "pesan_response" => $decode->metadata->message];
                    $this->db->where('id', $id_booking)->update('sm_antrian_bpjs', $array_response);

                    if (isset($decode->metadata->message)) {

                        $decode = ["metaData" => ["code" => $pesan, "message" => $decode->metadata->message]];
                    }
                } else if ($pesan === 208) {

                    $array_response = ["status_respon" => 200, "pesan_response" => 'Ok.'];
                    $this->db->where('id', $id_booking)->update('sm_antrian_bpjs', $array_response);

                    $decode = ["metaData" => ["code" => 200, "message" => 'Ok.']];
                } else {

                    if (isset($decode->metadata->message)) {

                        $decode = ["metaData" => ["code" => $pesan, "message" => $decode->metadata->message]];
                    }
                }
            } else {

                $decode = ["metaData" => ["code" => $pesan, "message" => $decode->metadata->message]];
            }
        } else {

            $decode = ["metaData" => ["code" => $this->code, "message" => $this->message]];
        }

        if ($this->db->trans_status() === FALSE) :
            $this->db->trans_rollback();
            $status = FALSE;
        else :
            $this->db->trans_commit();
            $status = TRUE;
        endif;

        $this->response($decode, REST_Controller::HTTP_OK);
    }

    private function start($page)
    {
        return (((int)$page - 1) * (int)$this->limit);
    }

    function kode_bpjs_get()
    {
        $q = safe_get('q');
        $page = safe_get('page');
        $start = $this->start($page);
        $data = $this->antrian->getKodeBPJS($q, $start, $this->limit);
        if ((safe_get('page') == 1) & ($q == '')) {
            $pilih[] = array(
                'id' => '',
                'nama' => '',
                'kode' => '',
                'kode_bpjs' => ''
            );
            $data['data'] = array_merge($pilih, $data['data']);
            $data['total'] += 1;
        }
        $this->response($data, REST_Controller::HTTP_OK);
    }

    function get_spesialisasi_get()
    {
        $id_spesialisasi = $this->get('id_spesialisasi');
        $tanggal = $this->get('tanggal');

        $data = $this->antrian->getAutoSpesialisasi($id_spesialisasi, $tanggal);
        $this->response($data, REST_Controller::HTTP_OK);
    }

    function createUsia($TanggalLahir)
    {
        $exTanggalLahir = explode('-', $TanggalLahir);
        date_default_timezone_set('Asia/Jakarta');
        $umur = (int)date('Y') - (int)$exTanggalLahir[0];

        return (int)$umur;
    }

    function lakukan_checkin_post()
    {

        $this->db->trans_begin();

        if (safe_post('kode_booking') === '' | safe_post('id') === '') :
            $response = array('status' => false, 'message' => 'Parameter tidak lengkap, silahkan hubungi bagian IT.');
            $this->response($response, REST_Controller::HTTP_OK);
        endif;

        $id = safe_post('id');

        $cekStatusTanggal = $this->antrian->cekStatusTanggal($id);

        if($cekStatusTanggal->status_jkn === 'JKN' && $cekStatusTanggal->jenis_bayar === 'Asuransi'){

            if($cekStatusTanggal->no_rm !== null && $cekStatusTanggal->no_rm !== ''){

                $checkDataDaftar = $this->antrian->cekDataPendaftaranPasien($cekStatusTanggal->no_rm);

                if(isset($checkDataDaftar)){

                    $cekUlangId = $this->antrian->checkUlangId($checkDataDaftar->kode_booking);

                    if(!empty($cekUlangId)){

                        if($cekUlangId->status_jkn === 'JKN' && $cekUlangId->jenis_bayar === 'Asuransi'){

                            if(!empty($checkDataDaftar)){

                                if($checkDataDaftar->keterangan !== null && $checkDataDaftar->keterangan !== ''){

                                    $decode = ["metaData" => ["code" => 201, "message" => 'Nomor RM Sudah Terdaftar di '.$checkDataDaftar->keterangan.' Hari Ini']];

                                } else {

                                    $decode = ["metaData" => ["code" => 201, "message" => 'Nomor RM Sudah Terdaftar', "p_text" => '<b>NOMOR RM SUDAH TERDAFTAR HARI INI</b>']];

                                }

                                die(json_encode($decode));

                            }

                        }

                    }

                }

            }

        }

        $ambilHari = $this->ambilHari($cekStatusTanggal->tanggal_kunjungan);
        
        date_default_timezone_set('Asia/Jakarta');

        $grupAkun = $this->session->userdata('account_group');

        if($grupAkun !== 'Admin' && $grupAkun !== 'Admin Rekam Medis' && $cekStatusTanggal->huruf_antrean !== 'D' && $cekStatusTanggal->huruf_antrean !== 'I'){
        
            $currentTime = date('H:i');
            
            if ($ambilHari === 'Minggu') {
                $decode = ["metaData" => ["code" => 201, "message" => 'Pendaftaran Tutup (Minggu)', "p_text" => 'Pendaftaran Sudah Tutup']];
                die(json_encode($decode));
            }

            if (isset($cekStatusTanggal->shift_poli)) {
                if ($cekStatusTanggal->shift_poli === 'Pagi') {
                    if (
                        ($ambilHari === 'Jumat' && $currentTime > '11:00') ||
                        ($ambilHari !== 'Jumat' && $currentTime > '12:00')
                    ) {
                        $decode = ["metaData" => ["code" => 201, "message" => 'Pendaftaran pagi sudah tutup', "p_text" => 'Pendaftaran pagi sudah tutup']];
                        die(json_encode($decode));
                    }
                } elseif ($cekStatusTanggal->shift_poli === 'Sore') {
                    if ($currentTime < '15:57' || $currentTime > '19:00') {
                        $decode = ["metaData" => ["code" => 201, "message" => 'Pendaftaran sore hanya diizinkan antara jam 16:00 s/d 19:00', "p_text" => 'Pendaftaran sore belum dibuka atau sudah tutup']];
                        die(json_encode($decode));
                    }
                } else {
                    
                    if (
                        ($ambilHari === 'Jumat' && $currentTime > '11:00') ||
                        ($ambilHari !== 'Jumat' && $currentTime > '12:00')
                    ) {
                        $decode = ["metaData" => ["code" => 201, "message" => 'Pendaftaran pagi sudah tutup', "p_text" => 'Pendaftaran pagi sudah tutup']];
                        die(json_encode($decode));
                    }
                }
            } else {
                
                if (
                    ($ambilHari === 'Jumat' && $currentTime > '11:00') ||
                    ($ambilHari !== 'Jumat' && $currentTime > '12:00')
                ) {
                    $decode = ["metaData" => ["code" => 201, "message" => 'Pendaftaran pagi sudah tutup', "p_text" => 'Pendaftaran pagi sudah tutup']];
                    die(json_encode($decode));
                }
            }
        
        }

        // bridging

        if ($cekStatusTanggal->status_jkn === 'JKN' && ($cekStatusTanggal->usia_pasien !== 'Informasi' && $cekStatusTanggal->usia_pasien !== 'Tunai')) {

            $numeric = is_numeric($this->createUsia($cekStatusTanggal->lahir_pasien));

            if ($numeric === true) {

                if ($this->createUsia($cekStatusTanggal->lahir_pasien) > 17) {

                    if ($cekStatusTanggal->kode_bpjs_poli !== null && $cekStatusTanggal->kode_bpjs_poli !== '') {

                        if (($cekStatusTanggal->nik !== null && $cekStatusTanggal->nik !== '') | ($cekStatusTanggal->no_kartu !== null && $cekStatusTanggal->no_kartu !== '')) {

                            // aktifkan ketika live
                            $url = $this->bpjs_config->server . "ref/poli/fp";
                            $header = $this->antrian->createHeader($this->bpjs_config);

                            $output = getCurl($url, $header);
                            $xdecode = json_decode($output);

                            if ($xdecode === NULL) :
                                $ydecode = ["metaData" => ["code" => $this->code, "message" => $this->message]];
                                die(json_encode($ydecode));
                            endif;

                            // aktifkan ketika live
                            $rDecode = $this->antrian->decryptResponse($xdecode->response);

                            if ($rDecode !== null && $rDecode !== false) {

                                foreach ($rDecode as $key => $value) {

                                    if ($value !== null) {

                                        if (isset($value->kodepoli)) {

                                            $filterDataKontrol = $value->kodepoli;

                                            if ($filterDataKontrol === $cekStatusTanggal->kode_bpjs_poli) {

                                                $url = null;

                                                if ($cekStatusTanggal->nik !== null && $cekStatusTanggal->nik !== '') {

                                                    $noIdentitas = $cekStatusTanggal->nik;
                                                    $jenisIdentitas = 'nik';

                                                    // aktifkan ketika live

                                                    $url = $this->bpjs_config->server . "ref/pasien/fp/identitas/" . $jenisIdentitas . "/noidentitas/" . $noIdentitas;
                                                } else {

                                                    if ($cekStatusTanggal->no_kartu !== null && $cekStatusTanggal->no_kartu !== '') {

                                                        $noIdentitas = $cekStatusTanggal->no_kartu;
                                                        $jenisIdentitas = 'noka';

                                                        // aktifkan ketika live
                                                        $url = $this->bpjs_config->server . "ref/pasien/fp/identitas/" . $jenisIdentitas . "/noidentitas/" . $noIdentitas;
                                                    } else {

                                                        $decode = ["metaData" => ["code" => 201, "message" => 'Pasien Tidak Memiliki Nomor Kartu BPJS dan NIK']];

                                                        die(json_encode($decode));

                                                        break;
                                                    }
                                                }

                                                if ($url !== null) {

                                                    // aktifkan ketika live
                                                    $header = $this->antrian->createHeader($this->bpjs_config);

                                                    $dOutput = getCurl($url, $header);
                                                    $hDecode = json_decode($dOutput);

                                                    if ($hDecode === NULL) :
                                                        $ydecode = ["metaData" => ["code" => $this->code, "message" => $this->message]];
                                                        die(json_encode($ydecode));
                                                        break;
                                                    endif;

                                                    if (isset($hDecode->metadata->code)) {

                                                        if (isset($hDecode->response)) {

                                                            if ($hDecode !== null  && $hDecode !== false) {

                                                                // aktifkan ketika live
                                                                $sDecode = $this->antrian->decryptResponse($hDecode->response);
                                                            } else {

                                                                $decode = ["metaData" => ["code" => 201, "message" => $hDecode->metadata->message]];

                                                                die(json_encode($decode));

                                                                break;
                                                            }

                                                            if ($hDecode->metadata->code === 1) {

                                                                if ($sDecode !== null && $sDecode !== false) {

                                                                    if ($sDecode->daftarfp === 0) {

                                                                        $decode = ["metaData" => ["code" => 201, "message" => 'Pasien Belum Melakukan Finger Print']];

                                                                        die(json_encode($decode));

                                                                        break;
                                                                    } else if ($sDecode->daftarfp === 1) {

                                                                        $dataPasien = $this->antrian->getDataPasien($cekStatusTanggal->kode_booking);

                                                                        if ($dataPasien !== null && $dataPasien !== false) {

                                                                            $noRM = $dataPasien->id;
                                                                            $updateDataBridging = ["status_finger" => 1, "tgl_bridging" => $this->datetime];
                                                                            $xIdSurat = $this->db->where('id', $noRM)->update('sm_pasien', $updateDataBridging);

                                                                            if ($xIdSurat !== false) {

                                                                                $message = 'Data Finger Pasien Berhasil diupdate';

                                                                                $decode = ["metaData" => ["code" => 200, "message" => $message]];

                                                                                $this->response($decode, REST_Controller::HTTP_OK);

                                                                                break;
                                                                            } else {

                                                                                $message = 'Gagal Update Data Pasien, Silakan Checkin Ulang';

                                                                                $decode = ["metaData" => ["code" => 201, "message" => $message]];

                                                                                die(json_encode($decode));

                                                                                break;
                                                                            }
                                                                        } else {

                                                                            $message = 'Data Pasien Tersebut Tidak ada, Silakan cek Data Booking Antrian Anda';

                                                                            $decode = ["metaData" => ["code" => 201, "message" => $message]];

                                                                            die(json_encode($decode));

                                                                            break;
                                                                        }
                                                                    } else {

                                                                        $decode = ["metaData" => ["code" => $this->code, "message" => var_dump($sDecode->daftarfp)]];

                                                                        die(json_encode($decode));

                                                                        break;
                                                                    }
                                                                } else {

                                                                    $decode = ["metaData" => ["code" => $this->code, "message" => $this->message]];

                                                                    die(json_encode($decode));

                                                                    break;
                                                                }
                                                            } else {

                                                                $decode = ["metaData" => ["code" => 201, "message" => 'Pasien Belum Melakukan Perekaman Finger Print']];

                                                                die(json_encode($decode));

                                                                break;
                                                            }
                                                        } else {

                                                            $decode = ["metaData" => ["code" => 201, "message" => $hDecode->metadata->message]];

                                                            die(json_encode($decode));

                                                            break;
                                                        }
                                                    } else {

                                                        $decode = ["metaData" => ["code" => $this->code, "message" => $this->message]];

                                                        die(json_encode($decode));

                                                        break;
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                            } else {

                                $decode = ["metaData" => ["code" => $this->code, "message" => $this->message]];

                                die(json_encode($decode));
                            }
                        }
                    } else {

                        $decode = ["metaData" => ["code" => 201, "message" => 'Poli Tujuan Tidak Ada']];

                        die(json_encode($decode));
                    }
                }
            } else {

                $decode = ["metaData" => ["code" => 201, "message" => 'Format Tanggal Lahir ' . $cekStatusTanggal->lahir_pasien . ' Pasien Tidak Sesuai']];

                die(json_encode($decode));
            }
        }

        // end bridging

        if (isset($cekStatusTanggal->kode_booking)) {

            date_default_timezone_set('Asia/Jakarta');

            if ($cekStatusTanggal->tanggal_kunjungan < date('Y-m-d')) {

                $decode = ["metaData" => ["code" => 201, "message" => 'Tanggal Kunjungan sudah Lewat']];
            } else if ($cekStatusTanggal->tanggal_kunjungan > date('Y-m-d')) {

                $decode = ["metaData" => ["code" => 201, "message" => 'Silakan cek kembali kode Booking tersebut sesuai jadwal']];
            } else {

                $update = ["status" => 'Check In'];

                $data = $this->db->where('id', $id)->update('sm_antrian_bpjs', $update);

                $kode_booking = safe_post('kode_booking');

                if ($data !== false) {

                    if ($cekStatusTanggal->huruf_antrean !== 'D' && $cekStatusTanggal->huruf_antrean !== 'C' && $cekStatusTanggal->huruf_antrean !== 'I') {

                        date_default_timezone_set('Asia/Jakarta');
                        $tanggalTunggu = (round(microtime(true) * 1000));
                        $new_estimasi = date('Y-m-d H:i:s', $tanggalTunggu / 1000);

                        $update = ["task_satu" => $new_estimasi];

                        $data = $this->db->where('id', $id)->update('sm_antrian_bpjs', $update);

                        $data_response = array(
                            "nomor_task"        => 1,
                            "waktu_task"        => $tanggalTunggu,
                            "kode_booking"      => $kode_booking,
                            "id_antrian"        => $id,
                            "konversi_waktu"    => $new_estimasi,
                        );

                        $this->db->insert('sm_update_task_bpjs', $data_response);
                    } else {

                        date_default_timezone_set('Asia/Jakarta');
                        $tanggalTunggu = (round(microtime(true) * 1000));
                        $new_estimasi = date('Y-m-d H:i:s', $tanggalTunggu / 1000);

                        $update = ["task_satu" => $new_estimasi];

                        $data = $this->db->where('id', $id)->update('sm_antrian_bpjs', $update);
                    }

                    $decode = ["metaData" => ["code" => 200, "message" => 'Check In Berhasil']];
                } else {

                    $decode = ["metaData" => ["code" => 201, "message" => 'Check In Gagal']];
                }
            }
        } else {

            $decode = ["metaData" => ["code" => 201, "message" => 'Kode Booking Tidak Terdaftar']];
        }

        if ($this->db->trans_status() === false) :
            $this->db->trans_rollback();
            $status = false;
            $pesan = 'Check In Pasien Gagal';
        else :
            $this->db->trans_commit();
            $status = true;
            $pesan = 'Check In Pasien Berhasil';
        endif;

        $this->response($decode, REST_Controller::HTTP_OK);
    }

    function create_no_sep_post($data, $datapasien, $kdpenunjang, $tujuan, $assest, $flag, $nosurat, $dpjp)
    {

        if (isset($data->rujukan)) {

            $dataRujukan = $data->rujukan;
        } else {

            $data = json_decode($data);

            if (isset($data->rujukan)) {

                $dataRujukan = $data->rujukan;
            } else {

                $decode = ["metaData" => ["code" => 201, "message" => 'Nomer Rujukan Tidak Ada atau Tidak memiliki data']];
                die(json_encode($decode));
            }
        }

        $noRM      = $datapasien->no_rm;
        $idAntrian = (int)$datapasien->id;
        $noRujukan = $dataRujukan->noKunjungan;
        $dataPasien = $datapasien;
        $kodeBooking = $datapasien->kode_booking;
        $tanggalSep = $this->date;
        $poli_vip = '0';
        $catatan = ($dataRujukan->keluhan === null) ? '' : $dataRujukan->keluhan;

        $hivStatus = $dataRujukan->poliRujukan->kode;

        if ($nosurat === null) {

            $noSurat = "";
        } else {

            $noSurat = $nosurat;
        }

        if ($dpjp === null) {

            $dPjp = "";
        } else {

            $dPjp = $dpjp;
        }

        if ($hivStatus !== 'HIV') {

            if ($tujuan === null) {

                $tujuanKunj = "";
            } else if ($tujuan === '0') {

                $tujuanKunj = "0";
            } else if ($tujuan === '2') {

                $tujuanKunj = "2";
            } else {

                $tujuanKunj = $tujuan;
            }
        } else {

            $tujuanKunj = "0";
        }


        if ($kdpenunjang === null) {

            $kdPenunjang = "";
        } else if ($kdpenunjang === '0') {

            $kdPenunjang = "0";
        } else {

            $kdPenunjang = $kdpenunjang;
        }


        if ($hivStatus !== 'HIV') {

            if ($flag === null) {

                $flagProcedure = "";
            } else if ($flag === '0') {

                $flagProcedure = "0";
            } else {

                $flagProcedure = $flag;
            }
        } else {

            $flagProcedure = "0";
        }

        if ($hivStatus !== 'HIV') {

            if ($assest === null) {

                $assesmentPel = "";
            } else if ($assest === '1') {

                $assesmentPel = "1";
            } else if ($assest === '2') {

                $assesmentPel = "2";
            } else if ($assest === '3') {

                $assesmentPel = "3";
            } else if ($assest === '4') {

                $assesmentPel = "4";
            } else if ($assest === '5') {

                $assesmentPel = "5";
            }
        } else {

            $assesmentPel = "";
        }

        if (isset($datapasien->is_pasien_katarak)) {

            if ($datapasien->kode_bpjs_poli === 'MAT' && $datapasien->is_pasien_katarak === '1') {

                $katarak = '1';
            } else {

                $katarak = '0';
            }
        } else {

            $katarak = '0';
        }

        $this->bpjs_vclaim2 = $this->antrian->getConfigVclaim2();

        $request = array(
            "request" => array(
                "t_sep" => array(
                    "noKartu" => $dataRujukan->peserta->noKartu,
                    "tglSep" => $tanggalSep,
                    "ppkPelayanan" => $this->bpjs_vclaim2->no_ppk,
                    "jnsPelayanan" => $dataRujukan->pelayanan->kode,
                    "klsRawat" => array(
                        "klsRawatHak" => $dataRujukan->peserta->hakKelas->kode,
                        "klsRawatNaik" => "",
                        "pembiayaan" => "",
                        "penanggungJawab" => ""
                    ),
                    "noMR" => $noRM,
                    "rujukan" => array(
                        "asalRujukan" => $data->asalFaskes,
                        "tglRujukan" => $dataRujukan->tglKunjungan,
                        "noRujukan" => $dataRujukan->noKunjungan,
                        "ppkRujukan" => $dataRujukan->provPerujuk->kode
                    ),
                    "catatan" => $catatan,
                    "diagAwal" => $dataRujukan->diagnosa->kode,
                    "poli" => array(
                        "tujuan" => $datapasien->kode_bpjs,
                        "eksekutif" => $poli_vip
                    ),
                    "cob" => array(
                        "cob" => "0",
                    ),
                    "katarak" => array(
                        "katarak" => $katarak,
                    ),
                    "jaminan" => array(
                        "lakaLantas" => "0",
                        "noLP" => "",
                        "penjamin" => array(
                            "tglKejadian" => "",
                            "keterangan" => "",
                            "suplesi" => array(
                                "suplesi" => "",
                                "noSepSuplesi" => "",
                                "lokasiLaka" => array(
                                    "kdPropinsi" => "",
                                    "kdKabupaten" => "",
                                    "kdKecamatan" => ""
                                )
                            )
                        )
                    ),
                    "tujuanKunj" => $tujuanKunj,
                    "flagProcedure" => $flagProcedure,
                    "kdPenunjang" => $kdPenunjang,
                    "assesmentPel" => $assesmentPel,
                    "skdp" => array(
                        "noSurat" => $noSurat,
                        "kodeDPJP" => $dPjp
                    ),
                    "dpjpLayan" => $dataPasien->kode_bpjs_dokter,
                    "noTelp" => $dataPasien->no_hp,
                    "user" => $this->session->userdata("account")
                )
            )
        );

        $url        = $this->bpjs_vclaim2->server . "/SEP/2.0/insert";
        $header     = $this->antrian->createHeader($this->bpjs_vclaim2);
        $header[4]  = 'Content-type: Application/x-www-form-urlencoded';
        $output     = postCurl($url, json_encode($request), $header);
        $vdecode     = json_decode($output);

        if ($vdecode === NULL | $vdecode === false) :
            $cdecode = ["metaData" => ["code" => $this->code, "message" => $this->message]];
            die(json_encode($cdecode));
        endif;

        if ($vdecode->metaData->code !== '201') {

            $vdata = $this->antrian->decryptResponseVclaim2($vdecode->response);

            $nosep = NULL;

            if ($vdata !== null) {
                if ($vdata->sep !== null) {
                    $nosep = strtoupper($vdata->sep->noSep);
                    if ($nosep != null) {
                        $insert_history = [
                            'no_sep' => $nosep,
                            'no_rm' => $noRM,
                            'tanggal_sep' => $this->datetime
                        ];

                        $this->db->insert('sm_history_sep', $insert_history);

                        $updateAntrean = array(
                            'nosep' => $nosep,
                        );

                        $this->db->where('kode_booking', $kodeBooking)->update('sm_antrian_bpjs', $updateAntrean);

                        $this->simpan_pendaftaran_post($idAntrian, $nosep);

                        $decode = ["metaData" => ["code" => 200, "message" => $vdecode->metaData->message]];

                        return $decode;
                    }
                }
            } else {

                date_default_timezone_set('Asia/Jakarta');
                $tglAwal = date('Y-m-d', strtotime('-89 days', strtotime(date('Y-m-d'))));
                $tglAkhir = date('Y-m-d'); //safe_get('akhir');
                $xurl    = $this->bpjs_vclaim2->server . "/monitoring/HistoriPelayanan/NoKartu/" . $dataRujukan->peserta->noKartu . "/tglAwal/" . $tglAwal . "/tglAkhir/" . $tglAkhir;
                $xheader = $this->antrian->createHeader($this->bpjs_vclaim2);
                $xoutput = getCurl($xurl, $xheader);
                $xdecode = json_decode($xoutput);

                if ($xdecode === null | $xdecode === false) {
                    $xdecode = ["metaData" => ["code" => $this->code, "message" => $this->message]];
                    die(json_encode($xdecode));
                }

                $xData = $this->antrian->decryptResponseVclaim2($xdecode->response);

                if ($xData !== false && $xData !== null) {

                    date_default_timezone_set('Asia/Jakarta');

                    if ($xData->histori[0]->tglSep === date('Y-m-d')) {

                        $nosep = strtoupper($xData->histori[0]->noSep);

                        $insert_history = [
                            'no_sep' => $nosep,
                            'no_rm' => $noRM,
                            'tanggal_sep' => $this->datetime
                        ];

                        $this->db->insert('sm_history_sep', $insert_history);

                        $updateAntrean = array(
                            'nosep' => $nosep,
                        );

                        $this->db->where('kode_booking', $kodeBooking)->update('sm_antrian_bpjs', $updateAntrean);

                        $this->simpan_pendaftaran_post($idAntrian, $nosep);

                        $decode = ["metaData" => ["code" => 200, "message" => $vdecode->metaData->message]];

                        return $decode;
                    } else {

                        $decode = ["metaData" => ["code" => 201, "message" => $vdecode->metaData->message]];

                        return $decode;
                    }
                } else {

                    $decode = ["metaData" => ["code" => 201, "message" => $vdecode->metaData->message]];

                    return $decode;
                }
            }
        } else {

            $decode = ["metaData" => ["code" => 201, "message" => $vdecode->metaData->message]];

            return $decode;
        }

        $this->response($decode, REST_Controller::HTTP_OK);
    }

    function ambilHari($date)
    {
        date_default_timezone_set('Asia/Jakarta');
        $datetime = new DateTime($date);
        $day = $datetime->format('N');
        $hari = '';
        switch ($day) {
            case '1':
                $hari = 'Senin';
                break;
            case '2':
                $hari = 'Selasa';
                break;
            case '3':
                $hari = 'Rabu';
                break;
            case '4':
                $hari = 'Kamis';
                break;
            case '5':
                $hari = 'Jumat';
                break;
            case '6':
                $hari = 'Sabtu';
                break;
            case '7':
                $hari = 'Minggu';
                break;

            default:
                # code...
                break;
        }

        return $hari;
    }

    function checkin_pasien_get($statusrm = null)
    {

        if (safe_get('id_booking') === '') :
            $response = array('status' => false, 'message' => 'Parameter tidak lengkap, silahkan hubungi bagian IT.');
            $this->response($response, REST_Controller::HTTP_OK);
        endif;

        $id = safe_get('id_booking');

        $checkId = $this->antrian->checkId($id);

        $checkValidasi = $this->antrian->cekValidasiDataPasien($checkId->no_rm, $checkId->tanggal_kunjungan);

        if($checkId->penjamin !== null && $checkId->penjamin !== ''){

            if($checkId->penjamin === 'BPJS'){

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

                        $decode = ["metaData" => ["code" => 201, "message" => 'Anda Sudah Pernah Terdaftar menggunakan BPJS pada hari ini', "p_text" => '<b>Anda Sudah Pernah Terdaftar menggunakan BPJS pada hari ini</b>']];

                        die(json_encode($decode));

                    }

                }

            }

        }

        if($checkId->no_rm !== null && $checkId->no_rm !== ''){

            // $checkDataDaftar = $this->antrian->cekPendaftaranPasien($checkId->no_rm);

            // if(!empty($checkDataDaftar)){

            //     $hasilCheckData = array();
            //     // Perulangan untuk mencari nilai yang sesuai
            //     foreach ($checkDataDaftar as $a => $b) {

            //         if($b->tanggal_keluar === '' | $b->tanggal_keluar === null){

            //             $hasilCheckData[] = $a;

            //         }
                    
            //     }

            //     if(count($hasilCheckData) > 0){

            //         $jenis_pendaftaran_pasien = $this->antrian->getJenisPendaftaranPasien($checkId->no_rm);
            //         $cek_jenis_pendaftaran_pasien = $jenis_pendaftaran_pasien->keterangan ?? '-';
            //         $tanggal_daftar = $jenis_pendaftaran_pasien->tanggal_daftar ?? '-';
            //         $cekKodeBooking = $jenis_pendaftaran_pasien->kode_booking ?? '-';
            //         date_default_timezone_set('Asia/Jakarta');
            //         $cek_tanggal_daftar = date('d/m/Y H:i:s', strtotime($tanggal_daftar));

            //         $decode = ["metaData" => ["code" => 201, "message" => 'Pasien masih dalam kunjungan di (' . $cek_jenis_pendaftaran_pasien . ') Tanggal daftar: ' . $cek_tanggal_daftar . ' dengan Kode Booking: ' . $cekKodeBooking . '', "p_text" => 'Pasien masih dalam kunjungan di (' . $cek_jenis_pendaftaran_pasien . ') Tanggal daftar: ' . $cek_tanggal_daftar . ' dengan Kode Booking: ' . $cekKodeBooking . '']];
            //         die(json_encode($decode));

            //     }

            // }

        } else {

            $decode = ["metaData" => ["code" => 201, "message" => 'Nomor RM Tidak ada', "p_text" => '<b>NOMOR RM TIDAK ADA, SILAKAN MENGAMBIL / CETAK NOMOR ANTRIAN KE SECURITY UNTUK KE LOKET PENDAFTARAN</b>']];

            die(json_encode($decode));

        }

        $ambilHari = $this->ambilHari($checkId->tanggal_kunjungan);
        
        date_default_timezone_set('Asia/Jakarta');

        $grupAkun = $this->session->userdata('account_group');

        if($grupAkun !== 'Admin' && $grupAkun !== 'Admin Rekam Medis'){
        
            $currentTime = date('H:i');
            
            if ($ambilHari === 'Minggu') {
                $decode = ["metaData" => ["code" => 201, "message" => 'Pendaftaran Tutup (Minggu)', "p_text" => 'Pendaftaran Sudah Tutup']];
                die(json_encode($decode));
            }

            if (isset($checkId->shift_poli)) {
                if ($checkId->shift_poli === 'Pagi') {
                    if (
                        ($ambilHari === 'Jumat' && $currentTime > '11:00') ||
                        ($ambilHari !== 'Jumat' && $currentTime > '12:00')
                    ) {
                        $decode = ["metaData" => ["code" => 201, "message" => 'Pendaftaran pagi sudah tutup', "p_text" => 'Pendaftaran pagi sudah tutup']];
                        die(json_encode($decode));
                    }
                } elseif ($checkId->shift_poli === 'Sore') {
                    if ($currentTime < '15:57' || $currentTime > '19:00') {
                        $decode = ["metaData" => ["code" => 201, "message" => 'Pendaftaran sore hanya diizinkan antara jam 16:00 s/d 19:00', "p_text" => 'Pendaftaran sore belum dibuka atau sudah tutup']];
                        die(json_encode($decode));
                    }
                } else {
                    
                    if (
                        ($ambilHari === 'Jumat' && $currentTime > '11:00') ||
                        ($ambilHari !== 'Jumat' && $currentTime > '12:00')
                    ) {
                        $decode = ["metaData" => ["code" => 201, "message" => 'Pendaftaran pagi sudah tutup', "p_text" => 'Pendaftaran pagi sudah tutup']];
                        die(json_encode($decode));
                    }
                }
            } else {
                
                if (
                    ($ambilHari === 'Jumat' && $currentTime > '11:00') ||
                    ($ambilHari !== 'Jumat' && $currentTime > '12:00')
                ) {
                    $decode = ["metaData" => ["code" => 201, "message" => 'Pendaftaran pagi sudah tutup', "p_text" => 'Pendaftaran pagi sudah tutup']];
                    die(json_encode($decode));
                }
            }

        }

        $idPasien = $checkId->no_rm;

        $idPendaftaran = $checkId->id_pendaftaran;

        if ($idPendaftaran !== null && $idPendaftaran !== '') {

            $decode = ["metaData" => ["code" => 201, "message" => 'Kode Booking ini sudah terdaftar', "p_text" => 'Kode Booking ini sudah terdaftar']];

            die(json_encode($decode));
        }

        $cekStatusTanggal = $this->antrian->cekStatusTanggal($id);

        if ($cekStatusTanggal->status_jkn === 'JKN' && ($cekStatusTanggal->usia_pasien !== 'Informasi' && $cekStatusTanggal->usia_pasien !== 'Tunai')) {

            $numeric = is_numeric($this->createUsia($cekStatusTanggal->lahir_pasien));

            if ($numeric === true) {

                if ($this->createUsia($cekStatusTanggal->lahir_pasien) > 17) {

                    if ($cekStatusTanggal->kode_bpjs_poli !== null && $cekStatusTanggal->kode_bpjs_poli !== '') {

                        if (($cekStatusTanggal->nik !== null && $cekStatusTanggal->nik !== '') | ($cekStatusTanggal->no_kartu !== null && $cekStatusTanggal->no_kartu !== '')) {

                            // aktifkan ketika live
                            $url = $this->bpjs_config->server . "ref/poli/fp";
                            $header = $this->antrian->createHeader($this->bpjs_config);

                            $output = getCurl($url, $header);
                            $xdecode = json_decode($output);

                            if ($xdecode === NULL) :
                                $ydecode = ["metaData" => ["code" => $this->code, "message" => $this->message]];
                                die(json_encode($ydecode));
                            endif;


                            if(isset($xdecode->response)){

                                // aktifkan ketika live
                                $xdecode->response = $this->antrian->decryptResponse($xdecode->response);

                                if ($xdecode->response !== null && $xdecode->response !== false) {

                                    foreach ($xdecode->response as $key => $value) {

                                        if ($value !== null) {

                                            if (isset($value->kodepoli)) {

                                                $filterDataKontrol = $value->kodepoli;

                                                if ($filterDataKontrol === $cekStatusTanggal->kode_bpjs_poli) {

                                                    $url = null;

                                                    if ($cekStatusTanggal->nik !== null && $cekStatusTanggal->nik !== '') {

                                                        $noIdentitas = $cekStatusTanggal->nik;
                                                        $jenisIdentitas = 'nik';

                                                        // aktifkan ketika live

                                                        $url = $this->bpjs_config->server . "ref/pasien/fp/identitas/" . $jenisIdentitas . "/noidentitas/" . $noIdentitas;
                                                    } else {

                                                        if ($cekStatusTanggal->no_kartu !== null && $cekStatusTanggal->no_kartu !== '') {

                                                            $noIdentitas = $cekStatusTanggal->no_kartu;
                                                            $jenisIdentitas = 'noka';

                                                            // aktifkan ketika live
                                                            $url = $this->bpjs_config->server . "ref/pasien/fp/identitas/" . $jenisIdentitas . "/noidentitas/" . $noIdentitas;
                                                        } else {

                                                            $decode = ["metaData" => ["code" => 201, "message" => 'Pasien Tidak Memiliki Nomor Kartu BPJS dan NIK']];

                                                            die(json_encode($decode));

                                                            break;
                                                        }
                                                    }

                                                    if ($url !== null) {

                                                        // aktifkan ketika live
                                                        $header = $this->antrian->createHeader($this->bpjs_config);

                                                        $output = getCurl($url, $header);
                                                        $xdecode = json_decode($output);

                                                        if ($xdecode === NULL) :
                                                            $ydecode = ["metaData" => ["code" => $this->code, "message" => $this->message]];
                                                            die(json_encode($ydecode));
                                                            break;
                                                        endif;

                                                        if (isset($xdecode->metadata->code)) {

                                                            if (isset($xdecode->response)) {

                                                                if ($xdecode->response !== null  && $xdecode->response !== false) {

                                                                    // aktifkan ketika live
                                                                    $xdecode->response = $this->antrian->decryptResponse($xdecode->response);
                                                                } else {

                                                                    $decode = ["metaData" => ["code" => 201, "message" => $xdecode->metadata->message]];

                                                                    die(json_encode($decode));

                                                                    break;
                                                                }

                                                                if ($xdecode->response !== null && $xdecode->response !== false) {

                                                                    if ($xdecode->metadata->code === 1) {

                                                                        if ($xdecode->response->daftarfp === 0) {

                                                                            $decode = ["metaData" => ["code" => 201, "message" => 'Pasien Belum Melakukan Finger Print']];

                                                                            die(json_encode($decode));

                                                                            break;
                                                                        } else if ($xdecode->response->daftarfp === 1) {

                                                                            $dataPasien = $this->antrian->getDataPasien($cekStatusTanggal->kode_booking);

                                                                            if ($dataPasien !== null && $dataPasien !== false) {

                                                                                $noRM = $dataPasien->id;
                                                                                $updateDataBridging = ["status_finger" => 1, "tgl_bridging" => $this->datetime];
                                                                                $xIdSurat = $this->db->where('id', $noRM)->update('sm_pasien', $updateDataBridging);

                                                                                if ($xIdSurat !== false) {

                                                                                    $message = 'Data Finger Pasien Berhasil diupdate';

                                                                                    $decode = ["metaData" => ["code" => 200, "message" => $message]];

                                                                                    $this->response($decode, REST_Controller::HTTP_OK);

                                                                                    break;
                                                                                } else {

                                                                                    $message = 'Gagal Update Data Pasien, Silakan Checkin Ulang';

                                                                                    $decode = ["metaData" => ["code" => 201, "message" => $message]];

                                                                                    die(json_encode($decode));

                                                                                    break;
                                                                                }
                                                                            } else {

                                                                                $message = 'Data Pasien Tersebut Tidak ada, Silakan cek Data Booking Antrian Anda';

                                                                                $decode = ["metaData" => ["code" => 201, "message" => $message]];

                                                                                die(json_encode($decode));

                                                                                break;
                                                                            }
                                                                        } else {

                                                                            $decode = ["metaData" => ["code" => $this->code, "message" => var_dump($xdecode->response->daftarfp)]];

                                                                            die(json_encode($decode));

                                                                            break;
                                                                        }
                                                                    } else {

                                                                        $decode = ["metaData" => ["code" => 201, "message" => 'Pasien Belum Melakukan Perekaman Finger Print']];

                                                                        die(json_encode($decode));

                                                                        break;
                                                                    }
                                                                } else {

                                                                    $decode = ["metaData" => ["code" => $this->code, "message" => $this->message]];

                                                                    die(json_encode($decode));

                                                                    break;
                                                                }
                                                            } else {

                                                                $decode = ["metaData" => ["code" => 201, "message" => $xdecode->metadata->message]];

                                                                die(json_encode($decode));

                                                                break;
                                                            }
                                                        } else {

                                                            $decode = ["metaData" => ["code" => $this->code, "message" => $this->message]];

                                                            die(json_encode($decode));

                                                            break;
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    }
                                } else {

                                    $decode = ["metaData" => ["code" => $this->code, "message" => $this->message]];

                                    die(json_encode($decode));
                                }

                            } else {

                                $decode = ["metaData" => ["code" => $this->code, "message" => $this->message]];

                                die(json_encode($decode));

                            }

                        }
                    } else {

                        $decode = ["metaData" => ["code" => 201, "message" => 'Poli Tujuan Tidak Ada']];

                        die(json_encode($decode));
                    }
                }
            } else {

                $decode = ["metaData" => ["code" => 201, "message" => 'Format Tanggal Lahir ' . $cekStatusTanggal->lahir_pasien . ' Pasien Tidak Sesuai']];

                die(json_encode($decode));
            }
        }

        // Cek status pasien apakah masih dalam kunjungan atau tidak
        // $cek_pasien_active = $this->pendaftaran->cekStatusKunjunganPasien($idPasien);

        // if ($cek_pasien_active === 'Aktif') {
            // Tambahan jenis pendaftaran pada pasien di alert
            // $jenis_pendaftaran_pasien = $this->antrian->getJenisPendaftaranPasien($idPasien);
            // $cek_jenis_pendaftaran_pasien = $jenis_pendaftaran_pasien->keterangan ?? '-';
            // $tanggal_daftar = $jenis_pendaftaran_pasien->tanggal_daftar ?? '-';
            // $cekKodeBooking = $jenis_pendaftaran_pasien->kode_booking ?? '-';
            // date_default_timezone_set('Asia/Jakarta');
            // $cek_tanggal_daftar = date('d/m/Y H:i:s', strtotime($tanggal_daftar));

            // $decode = ["metaData" => ["code" => 201, "message" => 'Pasien masih dalam kunjungan di (' . $cek_jenis_pendaftaran_pasien . ') Tanggal daftar: ' . $cek_tanggal_daftar . ' dengan Kode Booking: ' . $cekKodeBooking . '', "p_text" => 'Pasien masih dalam kunjungan di (' . $cek_jenis_pendaftaran_pasien . ') Tanggal daftar: ' . $cek_tanggal_daftar . ' dengan Kode Booking: ' . $cekKodeBooking . '']];
            // die(json_encode($decode));
        // } else {

            $checkJadwal = $this->antrian->checkJadwal($checkId->nama_dokter, $checkId->tanggal_kunjungan);

            $penjamin = $checkId->penjamin;

            if ($checkJadwal !== null) {

                if ($penjamin === 'BPJS') {

                    if ($checkId->rujukanawal !== null && $checkId->rujukanawal !== '') {

                        $rujukAwal = (int)$checkId->rujukanawal;

                        //QUERY PARAMATER KLO SUDAH SELESAI HARUS DIBALIKIN KE DEV

                        $this->bpjs_vclaim2 = $this->antrian->getConfigVclaim2();


                        if ($checkId->is_kontrol_pasca_ranap !== '1') {

                            $noRujuk = $checkId->no_referensi;

                            if ($noRujuk === NULL | $noRujuk === '') :
                                $xdecode = ["metaData" => ["code" => 201, "message" => 'No Rujukan Tidak Ada!!', "p_text" => 'No Rujukan Tidak Ada!!']];
                                die(json_encode($xdecode));
                            endif;

                            for ($i = 0; $i < 5;) {

                                $url = $this->bpjs_vclaim2->server . "/Rujukan/";
                                $header = $this->antrian->createHeader($this->bpjs_vclaim2);
                                $output = getCurl($url . $noRujuk, $header);
                                $sDecode = json_decode($output);

                                if ($sDecode === NULL | $sDecode === false) {

                                    $i++;
                                } else {

                                    if ($sDecode->metaData->code === '201') {
                                        $url = $this->bpjs_vclaim2->server . "/Rujukan/RS/";
                                        $header = $this->antrian->createHeader($this->bpjs_vclaim2);
                                        $output = getCurl($url . $noRujuk, $header);
                                        $rsDecode = json_decode($output);

                                        if(isset($rsDecode->metaData)){

                                            if ($rsDecode->metaData->code !== '200') {

                                                $ydecode = ["metaData" => ["code" => 201, "message" => $rsDecode->metaData->message]];
                                                die(json_encode($ydecode));
                                                break;

                                            } else {

                                                $data = $this->antrian->decryptResponseVclaim2($rsDecode->response);
                                                break;

                                            }

                                        } else {

                                            $ydecode = ["metaData" => ["code" => 201, "message" => 'Koneksi Pengecekan Rujukan RS ke BPJS Gagal!']];
                                            die(json_encode($ydecode));
                                            break;

                                        }

                                    } else {

                                        if ($sDecode->metaData->code === '200' && $sDecode->response === null) {

                                            $i++;
                                        } else {

                                            if ($sDecode->metaData->code === '200' && $this->antrian->decryptResponseVclaim2($sDecode->response) === NULL) {

                                                $i++;
                                            } else {

                                                $data = $this->antrian->decryptResponseVclaim2($sDecode->response);
                                                break;
                                            }
                                        }
                                    }
                                }
                            }
                        }

                        $noRM = $checkId->no_rm;
                        $rmPasien = $this->antrian->cekDataPasien($noRM);

                        if ($rmPasien !== null && $rmPasien !== '') {

                            if ($rujukAwal === 1) {

                                $noRM = $checkId->no_rm;
                                $tanggalKunjungan = $checkId->tanggal_kunjungan;

                                date_default_timezone_set('Asia/Jakarta');

                                if ($tanggalKunjungan < date('Y-m-d')) {

                                    $decode = ["metaData" => ["code" => 201, "message" => 'Tanggal Kunjungan sudah Lewat', "p_text" => 'Tanggal Kunjungan sudah Lewat']];

                                    die(json_encode($decode));
                                } else if ($tanggalKunjungan > date('Y-m-d')) {

                                    $decode = ["metaData" => ["code" => 201, "message" => 'Silakan cek kembali kode Booking tersebut sesuai jadwal', "p_text" => 'Silakan cek kembali kode Booking tersebut sesuai jadwal']];

                                    die(json_encode($decode));
                                } else {

                                    // if((int)$noRM === (int)$data->rujukan->peserta->mr->noMR){
                                    if ((int)$noRM !== null && (int)$noRM !== '') {

                                        $dataPasien = $this->antrian->dataPasien($checkId->id);

                                        if ($dataPasien->nosep !== null && $dataPasien->nosep !== '') {

                                            $noSep = $dataPasien->nosep;
                                            $idAntrian = (int)$dataPasien->id;

                                            $this->simpan_pendaftaran_post($idAntrian, $noSep);

                                            $decode = ["metaData" => ["code" => 200, "message" => 'Check In Berhasil', "p_text" => '<b>A. SILAKAN CETAK BUKTI KUNJUNG DAN CETAK SEP</br>B. SETELAH BERHASIL, SILAKAN MELANJUTKAN KUNJUNGAN KE POLIKLINIK</br>C. BERKAS CETAK SEP WAJIB DITANDATANGANI DAN DISERAHKAN KE PERAWAT POLIKLINIK </br> D. BERKAS CETAK BUKTI KUNJUNG WAJIB DISERAHKAN SAAT MENGAMBIL OBAT DI APOTEK FARMASI</b>']];
                                        } else {

                                            $tujuan = '0';
                                            $assest = null;
                                            $flag = null;
                                            $kdPenunjang = null;
                                            $noSurat = null;
                                            $dpjp = null;

                                            $xPlain = $this->create_no_sep_post($data, $dataPasien, $kdPenunjang, $tujuan, $assest, $flag, $noSurat, $dpjp);

                                            if (isset($xPlain['metaData']['code'])) {

                                                if ($xPlain['metaData']['code'] === 201) {

                                                    $decode = ["metaData" => ["code" => 201, "message" => $xPlain['metaData']['message'], "p_text" => $xPlain['metaData']['message']]];
                                                } else {

                                                    $decode = ["metaData" => ["code" => 200, "message" => 'Check In Berhasil', "p_text" => '<b>A. SILAKAN CETAK BUKTI KUNJUNG DAN CETAK SEP</br>B. SETELAH BERHASIL, SILAKAN MELANJUTKAN KUNJUNGAN KE POLIKLINIK</br>C. BERKAS CETAK SEP WAJIB DITANDATANGANI DAN DISERAHKAN KE PERAWAT POLIKLINIK </br> D. BERKAS CETAK BUKTI KUNJUNG WAJIB DISERAHKAN SAAT MENGAMBIL OBAT DI APOTEK FARMASI</b>']];
                                                }
                                            } else {

                                                $decode = ["metaData" => ["code" => 200, "message" => 'Check In Berhasil', "p_text" => '<b>A. SILAKAN CETAK BUKTI KUNJUNG DAN CETAK SEP</br>B. SETELAH BERHASIL, SILAKAN MELANJUTKAN KUNJUNGAN KE POLIKLINIK</br>C. BERKAS CETAK SEP WAJIB DITANDATANGANI DAN DISERAHKAN KE PERAWAT POLIKLINIK </br> D. BERKAS CETAK BUKTI KUNJUNG WAJIB DISERAHKAN SAAT MENGAMBIL OBAT DI APOTEK FARMASI</b>']];
                                            }
                                        }


                                        $this->response($decode, REST_Controller::HTTP_OK);
                                    } else {

                                        $decode = ["metaData" => ["code" => 201, "message" => 'Nomor RM Tidak Ada', "p_text" => 'Nomor RM Tidak Ada']];

                                        $this->response($decode, REST_Controller::HTTP_OK);
                                    }
                                }
                            } else if ($rujukAwal === 0) {

                                if ($checkId->id_poli_asal !== null && $checkId->id_poli_asal !== '') {

                                    if ($checkId->id_poli_rujukan !== null && $checkId->id_poli_rujukan !== '') {

                                        $poliAsal = (int)$checkId->id_poli_rujukan;
                                    } else {

                                        $poliAsal = (int)$checkId->id_poli_asal;
                                    }

                                    if ($checkId->nama_poli !== null && $checkId->nama_poli !== '') {

                                        $poliTujuan = (int)$checkId->nama_poli;

                                        if ($poliAsal === $poliTujuan) {

                                            // Rujukan Kontrol

                                            $noKartu = $checkId->no_kartu;

                                            date_default_timezone_set('Asia/Jakarta');

                                            $bulan = date('m');
                                            $tahun = date('Y');

                                            $formatBulan = $this->formatBulan($bulan);

                                            //pencarian data surat kontrol 3 bulan terakhir

                                            $bln = $formatBulan;
                                            $thn = (int)$tahun;

                                            $dataKontrol = [];

                                            for ($i = 0; $i < 3;) {

                                                $getBln = $this->intBulan($bln);
                                                $vUrl = $this->bpjs_vclaim2->server . "/RencanaKontrol/ListRencanaKontrol/Bulan/" . $getBln . "/Tahun/" . $thn . "/Nokartu/" . $noKartu . "/filter/2";
                                                $vHeader = $this->antrian->createHeader($this->bpjs_vclaim2);
                                                $vHeader[4]  = 'Content-type: Application/x-www-form-urlencoded';
                                                $vOutput = getCurl($vUrl, $vHeader);
                                                $zdecode = json_decode($vOutput);

                                                if ($zdecode !== null && $zdecode !== false) {

                                                    if ($zdecode->metaData->code === '200' && $zdecode->response === null) {

                                                        if ($bln === 1) {

                                                            $xbln = 1;
                                                            $xthn = $thn;
                                                        } else {

                                                            $xbln = $bln;
                                                            $xthn = $thn;
                                                        }

                                                        $bln = $xbln;
                                                        $thn = $xthn;

                                                        $i;
                                                    } else {

                                                        if ($zdecode->metaData->code === '200' && $this->antrian->decryptResponseVclaim2($zdecode->response) === null) {

                                                            if ($bln === 1) {

                                                                $xbln = 1;
                                                                $xthn = $thn;
                                                            } else {

                                                                $xbln = $bln;
                                                                $xthn = $thn;
                                                            }

                                                            $bln = $xbln;
                                                            $thn = $xthn;

                                                            $i;
                                                        } else {

                                                            $cekDataKontrol[] = $this->antrian->decryptResponseVclaim2($zdecode->response);

                                                            if ($bln === 1) {

                                                                $xbln = 12;
                                                                $xthn = $thn - 1;
                                                            } else {

                                                                $xbln = $bln - 1;
                                                                $xthn = $thn;
                                                            }

                                                            $bln = $xbln;
                                                            $thn = $xthn;

                                                            $i++;
                                                        }
                                                    }
                                                } else {

                                                    if ($bln === 1) {

                                                        $xbln = 1;
                                                        $xthn = $thn;
                                                    } else {

                                                        $xbln = $bln;
                                                        $xthn = $thn;
                                                    }

                                                    $bln = $xbln;
                                                    $thn = $xthn;

                                                    $i;
                                                }
                                            }

                                            $filterDataKontrol = [];

                                            foreach ($cekDataKontrol as $key => $value) {

                                                if ($value !== null) {

                                                    $filterDataKontrol[] = $cekDataKontrol[$key]->list;
                                                }
                                            }

                                            // charis
                                            if($checkId->kode_bpjs_poli === 'HDL'){
                                                foreach ($filterDataKontrol as $value) {
                                                    foreach ($value as $val) {
                                                        if ($val->noSepAsalKontrol === $checkId->no_sep_asal && $val->poliTujuan !== $checkId->kode_bpjs_poli) {
                                                            $val->poliTujuan = $checkId->kode_bpjs_poli;
                                                        }
                                                    }
                                                }
                                            }

                                            if (is_array($filterDataKontrol)) {

                                                if ($filterDataKontrol !== null) {

                                                    foreach ($filterDataKontrol as $key => $value) {

                                                        $h = count($filterDataKontrol[$key]);
                                                        $j = count($filterDataKontrol);

                                                        for ($i = 0; $i < $h;) {

                                                            $hasilFilter = false;

                                                            if ($filterDataKontrol[$key][$i]->noSepAsalKontrol === $checkId->no_sep_asal && $filterDataKontrol[$key][$i]->poliTujuan === $checkId->kode_bpjs_poli) {
                                                                date_default_timezone_set('Asia/Jakarta');
                                                                if ($filterDataKontrol[$key][$i]->tglRencanaKontrol === date('Y-m-d') && $filterDataKontrol[$key][$i]->kodeDokter === $checkId->kode_bpjs_dokter && $filterDataKontrol[$key][$i]->poliTujuan === $checkId->kode_bpjs_poli) {

                                                                    if ($checkId->id_skd !== NULL && $checkId->id_skd !== '') {

                                                                        $kodeDpjp = $checkId->kode_bpjs_dokter;

                                                                        $idAntrian = (int)$checkId->id;

                                                                        $dataPasien = $this->antrian->dataPasien($idAntrian);

                                                                        $tujuan = '2';
                                                                        $flag = null;
                                                                        $kdPenunjang = null;
                                                                        $assest = '2';
                                                                        $noSurat = $filterDataKontrol[$key][$i]->noSuratKontrol;
                                                                        $dpjp = $kodeDpjp;

                                                                        $xPlain = $this->create_no_sep_post($data, $dataPasien, $kdPenunjang, $tujuan, $assest, $flag, $noSurat, $dpjp);

                                                                        if (isset($xPlain['metaData']['code'])) {

                                                                            if ($xPlain['metaData']['code'] === 201) {

                                                                                $decode = ["metaData" => ["code" => 201, "message" => $xPlain['metaData']['message'], "p_text" => $xPlain['metaData']['message']]];

                                                                                die(json_encode($decode));

                                                                                $hasilFilter = true;

                                                                                break;
                                                                            } else {

                                                                                $decode = ["metaData" => ["code" => 200, "message" => 'Check In Berhasil', "p_text" => '<b>A. SILAKAN CETAK BUKTI KUNJUNG DAN CETAK SEP</br>B. SETELAH BERHASIL, SILAKAN MELANJUTKAN KUNJUNGAN KE POLIKLINIK</br>C. BERKAS CETAK SEP WAJIB DITANDATANGANI DAN DISERAHKAN KE PERAWAT POLIKLINIK </br> D. BERKAS CETAK BUKTI KUNJUNG WAJIB DISERAHKAN SAAT MENGAMBIL OBAT DI APOTEK FARMASI</b>']];

                                                                                $this->response($decode, REST_Controller::HTTP_OK);

                                                                                $hasilFilter = true;

                                                                                break;
                                                                            }
                                                                        } else {

                                                                            $decode = ["metaData" => ["code" => 200, "message" => 'Check In Berhasil', "p_text" => '<b>A. SILAKAN CETAK BUKTI KUNJUNG DAN CETAK SEP</br>B. SETELAH BERHASIL, SILAKAN MELANJUTKAN KUNJUNGAN KE POLIKLINIK</br>C. BERKAS CETAK SEP WAJIB DITANDATANGANI DAN DISERAHKAN KE PERAWAT POLIKLINIK </br> D. BERKAS CETAK BUKTI KUNJUNG WAJIB DISERAHKAN SAAT MENGAMBIL OBAT DI APOTEK FARMASI</b>']];

                                                                            $this->response($decode, REST_Controller::HTTP_OK);

                                                                            $hasilFilter = true;

                                                                            break;
                                                                        }
                                                                    } else {

                                                                        $suratKontrol = $filterDataKontrol[$key][$i]->noSuratKontrol;

                                                                        if ($suratKontrol !== NULL && $suratKontrol !== '') {

                                                                            $cekDataSuratKontrol = $this->antrian->cekDataSuratKontrol($suratKontrol);

                                                                            if ($cekDataSuratKontrol !== false && $cekDataSuratKontrol !== null) {

                                                                                $idSuratKontrol = (int)$cekDataSuratKontrol->id;
                                                                                $idAntrian = (int)$checkId->id;

                                                                                $updateSuratKontrol = ["id_skd" => $idSuratKontrol];
                                                                                $xIdSurat = $this->db->where('id', $idAntrian)->update('sm_antrian_bpjs', $updateSuratKontrol);

                                                                                if ($xIdSurat !== false) {

                                                                                    $kodeDpjp = $checkId->kode_bpjs_dokter;

                                                                                    $dataPasien = $this->antrian->dataPasien($idAntrian);

                                                                                    $tujuan = '2';
                                                                                    $flag = null;
                                                                                    $kdPenunjang = null;
                                                                                    $assest = '2';
                                                                                    $noSurat = $filterDataKontrol[$key][$i]->noSuratKontrol;
                                                                                    $dpjp = $kodeDpjp;

                                                                                    $xPlain = $this->create_no_sep_post($data, $dataPasien, $kdPenunjang, $tujuan, $assest, $flag, $noSurat, $dpjp);

                                                                                    if (isset($xPlain['metaData']['code'])) {

                                                                                        if ($xPlain['metaData']['code'] === 201) {

                                                                                            $decode = ["metaData" => ["code" => 201, "message" => $xPlain['metaData']['message'], "p_text" => $xPlain['metaData']['message']]];
                                                                                        } else {

                                                                                            $decode = ["metaData" => ["code" => 200, "message" => 'Check In Berhasil', "p_text" => '<b>A. SILAKAN CETAK BUKTI KUNJUNG DAN CETAK SEP</br>B. SETELAH BERHASIL, SILAKAN MELANJUTKAN KUNJUNGAN KE POLIKLINIK</br>C. BERKAS CETAK SEP WAJIB DITANDATANGANI DAN DISERAHKAN KE PERAWAT POLIKLINIK </br> D. BERKAS CETAK BUKTI KUNJUNG WAJIB DISERAHKAN SAAT MENGAMBIL OBAT DI APOTEK FARMASI</b>']];
                                                                                        }
                                                                                    } else {

                                                                                        $decode = ["metaData" => ["code" => 200, "message" => 'Check In Berhasil', "p_text" => '<b>A. SILAKAN CETAK BUKTI KUNJUNG DAN CETAK SEP</br>B. SETELAH BERHASIL, SILAKAN MELANJUTKAN KUNJUNGAN KE POLIKLINIK</br>C. BERKAS CETAK SEP WAJIB DITANDATANGANI DAN DISERAHKAN KE PERAWAT POLIKLINIK </br> D. BERKAS CETAK BUKTI KUNJUNG WAJIB DISERAHKAN SAAT MENGAMBIL OBAT DI APOTEK FARMASI</b>']];
                                                                                    }

                                                                                    $this->response($decode, REST_Controller::HTTP_OK);

                                                                                    $hasilFilter = true;

                                                                                    break;
                                                                                } else {

                                                                                    $decode = ["metaData" => ["code" => 201, "message" => 'update id SKD Gagal', "p_text" => '<b>SILAKAN MENGAMBIL / CETAK NOMOR ANTRIAN KE SECURITY UNTUK KE LOKET PENDAFTARAN</b>']];

                                                                                    die(json_encode($decode));

                                                                                    $hasilFilter = true;

                                                                                    break;
                                                                                }
                                                                            } else {

                                                                                $decode = ["metaData" => ["code" => 201, "message" => 'Tidak ada Data id SKD di surat kontrol bpjs', "p_text" => '<b>SILAKAN MENGAMBIL / CETAK NOMOR ANTRIAN KE SECURITY UNTUK KE LOKET PENDAFTARAN</b>']];

                                                                                die(json_encode($decode));

                                                                                $hasilFilter = true;

                                                                                break;
                                                                            }
                                                                        } else {

                                                                            $decode = ["metaData" => ["code" => 201, "message" => 'Tidak Ada Nomor Surat Kontrol di Service BPJS', "p_text" => '<b>SILAKAN MENGAMBIL / CETAK NOMOR ANTRIAN KE SECURITY UNTUK KE LOKET PENDAFTARAN</b>']];

                                                                            die(json_encode($decode));

                                                                            $hasilFilter = true;

                                                                            break;
                                                                        }
                                                                    }
                                                                } else {

                                                                    $decode = ["metaData" => ["code" => 201, "message" => 'Data Surat Kontrol Tidak Sesuai, Silakan menuju NS !', "p_text" => '<b>SILAKAN MENGAMBIL / CETAK NOMOR ANTRIAN KE SECURITY UNTUK KE LOKET PENDAFTARAN</b>']];

                                                                    die(json_encode($decode));

                                                                    $hasilFilter = true;

                                                                    break;
                                                                }
                                                            }

                                                            $i++;
                                                            $h;
                                                        }

                                                        if ($hasilFilter === true) {

                                                            die();
                                                            break;
                                                        } else {

                                                            if (($j - 1) === $key && $hasilFilter === false) {

                                                                $noSepAsal = $checkId->no_sep_asal;

                                                                if ($noSepAsal !== NULL && $noSepAsal !== '') {

                                                                    $kodePoli = $checkId->kode_bpjs_poli;

                                                                    if ($kodePoli !== NULL && $kodePoli !== '') {

                                                                        $kodeDpjp = $checkId->kode_bpjs_dokter;

                                                                        if ($kodeDpjp !== NULL && $kodeDpjp !== '') {

                                                                            if ($checkId->iddaftarasal !== null && $checkId->iddaftarasal !== '') {

                                                                                $idPendaftaranAsal = (int)$checkId->iddaftarasal;

                                                                                for ($i = 0; $i < 3;) {

                                                                                    $zRequest = array(
                                                                                        "request" => array(
                                                                                            "noSEP" => $noSepAsal,
                                                                                            "kodeDokter" => $kodeDpjp,
                                                                                            "poliKontrol" => $kodePoli,
                                                                                            "tglRencanaKontrol" => $this->date,
                                                                                            "user" => $this->session->userdata("account")
                                                                                        )
                                                                                    );

                                                                                    $zUrl = $this->bpjs_vclaim2->server . "/RencanaKontrol/insert";
                                                                                    $zHeader = $this->antrian->createHeader($this->bpjs_vclaim2);
                                                                                    $zHeader[4] = "Content-type: Application/x-www-form-urlencoded";
                                                                                    $zOutput = postCurl($zUrl, json_encode($zRequest), $zHeader);
                                                                                    $zDecode = json_decode($zOutput);

                                                                                    if ($zDecode === NULL | $zDecode === false) {

                                                                                        $i++;
                                                                                    } else {

                                                                                        if ($zDecode->metaData->code !== '200') {

                                                                                            $decode = ["metaData" => ["code" => 201, "message" => $zDecode->metaData->message, "p_text" => $zDecode->metaData->message]];

                                                                                            die(json_encode($decode));

                                                                                            break;
                                                                                        } else if ($zDecode->metaData->code === '200' && $this->antrian->decryptResponseVclaim2($zDecode->response) === null) {

                                                                                            date_default_timezone_set('Asia/Jakarta');

                                                                                            for ($x = 0; $x < 2;) {

                                                                                                $sUrl = $this->bpjs_vclaim2->server . "/RencanaKontrol/ListRencanaKontrol/Bulan/" . date('m') . "/Tahun/" . date('Y') . "/Nokartu/" . $noKartu . "/filter/2";
                                                                                                $sHeader = $this->antrian->createHeader($this->bpjs_vclaim2);
                                                                                                $sHeader[4]  = 'Content-type: Application/x-www-form-urlencoded';
                                                                                                $sOutput = getCurl($sUrl, $sHeader);
                                                                                                $sDecode = json_decode($sOutput);

                                                                                                if ($sDecode === NULL | $sDecode === false) {

                                                                                                    $x;
                                                                                                } else {

                                                                                                    if ($sDecode->metaData->code !== '200') {

                                                                                                        $decode = ["metaData" => ["code" => 201, "message" => $sDecode->metaData->message, "p_text" => $sDecode->metaData->message]];

                                                                                                        die(json_encode($decode));

                                                                                                        break;
                                                                                                    } else if ($sDecode->metaData->code === '200' && $this->antrian->decryptResponseVclaim2($sDecode->response) === null) {

                                                                                                        $x;
                                                                                                    } else {

                                                                                                        $sdeData = $this->antrian->decryptResponseVclaim2($sDecode->response);

                                                                                                        break;
                                                                                                    }
                                                                                                }
                                                                                            }

                                                                                            date_default_timezone_set('Asia/Jakarta');
                                                                                            if ($sdeData->list[0]->tglRencanaKontrol === date('Y-m-d') && $sdeData->list[0]->kodeDokter === $checkId->kode_bpjs_dokter && $sdeData->list[0]->poliTujuan === $checkId->kode_bpjs_poli) {

                                                                                                $idAntrian = (int)$checkId->id;

                                                                                                $dataInsert = array(
                                                                                                    'no_surat'  => $sdeData->list[0]->noSuratKontrol,
                                                                                                    'id_pasien' => isset($checkId->no_rm) ? $checkId->no_rm : NULL,
                                                                                                    'jenis' => 2,
                                                                                                    'tgl_rencana_kontrol' => $sdeData->list[0]->tglRencanaKontrol,
                                                                                                    'dokter' => $sdeData->list[0]->namaDokter,
                                                                                                    'no_kartu' => $sdeData->list[0]->noKartu,
                                                                                                    'id_user' => $this->session->userdata("id_translucent"),
                                                                                                    'created_date' => $this->datetime,
                                                                                                    'id_antrian' => $idAntrian,
                                                                                                    'id_pendaftaran_asal' => $idPendaftaranAsal
                                                                                                );

                                                                                                $idSK = $this->antrian->simpanDataSuratKontrol($dataInsert);

                                                                                                if ($idSK !== NULL) {

                                                                                                    $skAntrian = ["no_sk" => $sdeData->list[0]->noSuratKontrol, "idskb" => $idSK];
                                                                                                    $this->db->where('id', $idAntrian)->update('sm_antrian_bpjs', $skAntrian);

                                                                                                    $updateKontrolRanap = ["id_skb" => (int)$idSK];
                                                                                                    $this->db->where('id', (int)$checkId->id_skd)->update('sm_surat_kontrol', $updateKontrolRanap);

                                                                                                    $dataPasien = $this->antrian->dataPasien($idAntrian);

                                                                                                    $tujuan = '2';
                                                                                                    $flag = null;
                                                                                                    $kdPenunjang = null;
                                                                                                    $assest = '2';
                                                                                                    $noSurat = $sdeData->list[0]->noSuratKontrol;
                                                                                                    $dpjp = $kodeDpjp;

                                                                                                    $xPlain = $this->create_no_sep_post($data, $dataPasien, $kdPenunjang, $tujuan, $assest, $flag, $noSurat, $dpjp);

                                                                                                    if (isset($xPlain['metaData']['code'])) {

                                                                                                        if ($xPlain['metaData']['code'] === 201) {

                                                                                                            $decode = ["metaData" => ["code" => 201, "message" => $xPlain['metaData']['message'], "p_text" => $xPlain['metaData']['message']]];

                                                                                                            die(json_encode($decode));

                                                                                                            break;
                                                                                                        } else {

                                                                                                            $decode = ["metaData" => ["code" => 200, "message" => 'Check In Berhasil', "p_text" => '<b>A. SILAKAN CETAK BUKTI KUNJUNG DAN CETAK SEP</br>B. SETELAH BERHASIL, SILAKAN MELANJUTKAN KUNJUNGAN KE POLIKLINIK</br>C. BERKAS CETAK SEP WAJIB DITANDATANGANI DAN DISERAHKAN KE PERAWAT POLIKLINIK </br> D. BERKAS CETAK BUKTI KUNJUNG WAJIB DISERAHKAN SAAT MENGAMBIL OBAT DI APOTEK FARMASI</b>']];
                                                                                                        }
                                                                                                    } else {

                                                                                                        $decode = ["metaData" => ["code" => 200, "message" => 'Check In Berhasil', "p_text" => '<b>A. SILAKAN CETAK BUKTI KUNJUNG DAN CETAK SEP</br>B. SETELAH BERHASIL, SILAKAN MELANJUTKAN KUNJUNGAN KE POLIKLINIK</br>C. BERKAS CETAK SEP WAJIB DITANDATANGANI DAN DISERAHKAN KE PERAWAT POLIKLINIK </br> D. BERKAS CETAK BUKTI KUNJUNG WAJIB DISERAHKAN SAAT MENGAMBIL OBAT DI APOTEK FARMASI</b>']];
                                                                                                    }

                                                                                                    $this->response($decode, REST_Controller::HTTP_OK);

                                                                                                    break;
                                                                                                } else {

                                                                                                    $decode = ["metaData" => ["code" => 201, "message" => "Gagal Menyimpan data Surat Kontrol", "p_text" => '<b>SILAKAN MENGAMBIL / CETAK NOMOR ANTRIAN KE SECURITY UNTUK KE LOKET PENDAFTARAN</b>']];

                                                                                                    die(json_encode($decode));

                                                                                                    break;
                                                                                                }
                                                                                            } else {

                                                                                                $decode = ["metaData" => ["code" => 201, "message" => 'Data Surat Kontrol Tidak Sesuai, Silakan menuju NS !', "p_text" => '<b>SILAKAN MENGAMBIL / CETAK NOMOR ANTRIAN KE SECURITY UNTUK KE LOKET PENDAFTARAN</b>']];

                                                                                                die(json_encode($decode));

                                                                                                break;
                                                                                            }
                                                                                        } else {

                                                                                            $skData = $this->antrian->decryptResponseVclaim2($zDecode->response);

                                                                                            if ($skData !== null) {

                                                                                                $idAntrian = (int)$checkId->id;

                                                                                                $dataInsert = array(
                                                                                                    'no_surat'  => $skData->noSuratKontrol,
                                                                                                    'id_pasien' => isset($checkId->no_rm) ? $checkId->no_rm : NULL,
                                                                                                    'jenis' => 2,
                                                                                                    'tgl_rencana_kontrol' => $skData->tglRencanaKontrol,
                                                                                                    'dokter' => $skData->namaDokter,
                                                                                                    'no_kartu' => $skData->noKartu,
                                                                                                    'id_user' => $this->session->userdata("id_translucent"),
                                                                                                    'created_date' => $this->datetime,
                                                                                                    'id_antrian' => $idAntrian,
                                                                                                    'id_pendaftaran_asal' => $idPendaftaranAsal
                                                                                                );

                                                                                                $idSK = $this->antrian->simpanDataSuratKontrol($dataInsert);

                                                                                                if ($idSK !== NULL) {

                                                                                                    $skAntrian = ["no_sk" => $skData->noSuratKontrol, "idskb" => $idSK];
                                                                                                    $this->db->where('id', $idAntrian)->update('sm_antrian_bpjs', $skAntrian);

                                                                                                    $updateKontrolRanap = ["id_skb" => (int)$idSK];
                                                                                                    $this->db->where('id', (int)$checkId->id_skd)->update('sm_surat_kontrol', $updateKontrolRanap);

                                                                                                    $dataPasien = $this->antrian->dataPasien($idAntrian);

                                                                                                    $tujuan = '2';
                                                                                                    $flag = null;
                                                                                                    $kdPenunjang = null;
                                                                                                    $assest = '2';
                                                                                                    $noSurat = $skData->noSuratKontrol;
                                                                                                    $dpjp = $kodeDpjp;

                                                                                                    $xPlain = $this->create_no_sep_post($data, $dataPasien, $kdPenunjang, $tujuan, $assest, $flag, $noSurat, $dpjp);

                                                                                                    if (isset($xPlain['metaData']['code'])) {

                                                                                                        if ($xPlain['metaData']['code'] === 201) {

                                                                                                            $decode = ["metaData" => ["code" => 201, "message" => $xPlain['metaData']['message'], "p_text" => $xPlain['metaData']['message']]];

                                                                                                            die(json_encode($decode));

                                                                                                            break;
                                                                                                        } else {

                                                                                                            $decode = ["metaData" => ["code" => 200, "message" => 'Check In Berhasil', "p_text" => '<b>A. SILAKAN CETAK BUKTI KUNJUNG DAN CETAK SEP</br>B. SETELAH BERHASIL, SILAKAN MELANJUTKAN KUNJUNGAN KE POLIKLINIK</br>C. BERKAS CETAK SEP WAJIB DITANDATANGANI DAN DISERAHKAN KE PERAWAT POLIKLINIK </br> D. BERKAS CETAK BUKTI KUNJUNG WAJIB DISERAHKAN SAAT MENGAMBIL OBAT DI APOTEK FARMASI</b>']];
                                                                                                        }
                                                                                                    } else {

                                                                                                        $decode = ["metaData" => ["code" => 200, "message" => 'Check In Berhasil', "p_text" => '<b>A. SILAKAN CETAK BUKTI KUNJUNG DAN CETAK SEP</br>B. SETELAH BERHASIL, SILAKAN MELANJUTKAN KUNJUNGAN KE POLIKLINIK</br>C. BERKAS CETAK SEP WAJIB DITANDATANGANI DAN DISERAHKAN KE PERAWAT POLIKLINIK </br> D. BERKAS CETAK BUKTI KUNJUNG WAJIB DISERAHKAN SAAT MENGAMBIL OBAT DI APOTEK FARMASI</b>']];
                                                                                                    }

                                                                                                    $this->response($decode, REST_Controller::HTTP_OK);

                                                                                                    break;
                                                                                                } else {

                                                                                                    $decode = ["metaData" => ["code" => 201, "message" => "Gagal Menyimpan data Surat Kontrol", "p_text" => "Gagal Menyimpan data Surat Kontrol"]];

                                                                                                    die(json_encode($decode));

                                                                                                    break;
                                                                                                }
                                                                                            }
                                                                                        }
                                                                                    }
                                                                                }
                                                                            } else {

                                                                                $decode = ["metaData" => ["code" => 201, "message" => 'Id Pendaftaran Asal Tidak ada', "p_text" => '<b>SILAKAN MENGAMBIL / CETAK NOMOR ANTRIAN KE SECURITY UNTUK KE LOKET PENDAFTARAN</b>']];

                                                                                die(json_encode($decode));

                                                                                break;
                                                                            }
                                                                        } else {

                                                                            $decode = ["metaData" => ["code" => 201, "message" => 'Kode BPJS DPJP Tidak ada', "p_text" => '<b>SILAKAN MENGAMBIL / CETAK NOMOR ANTRIAN KE SECURITY UNTUK KE LOKET PENDAFTARAN</b>']];

                                                                            die(json_encode($decode));

                                                                            break;
                                                                        }
                                                                    } else {

                                                                        $decode = ["metaData" => ["code" => 201, "message" => 'Kode BPJS Poli Tidak ada', "p_text" => '<b>SILAKAN MENGAMBIL / CETAK NOMOR ANTRIAN KE SECURITY UNTUK KE LOKET PENDAFTARAN</b>']];

                                                                        die(json_encode($decode));

                                                                        break;
                                                                    }
                                                                } else {

                                                                    $decode = ["metaData" => ["code" => 201, "message" => 'Nomor SEP Asal Tidak Ada', "p_text" => '<b>SILAKAN MENGAMBIL / CETAK NOMOR ANTRIAN KE SECURITY UNTUK KE LOKET PENDAFTARAN</b>']];

                                                                    die(json_encode($decode));

                                                                    break;
                                                                }

                                                                break;
                                                            }
                                                        }
                                                    }
                                                } else {

                                                    $cdecode = ["metaData" => ["code" => 201, "message" => 'Data Surat Kontrol Tidak Ada', "p_text" => '<b>SILAKAN MENGAMBIL / CETAK NOMOR ANTRIAN KE SECURITY UNTUK KE LOKET PENDAFTARAN</b>']];
                                                    die(json_encode($cdecode));
                                                }
                                            } else {

                                                $cdecode = ["metaData" => ["code" => 201, "message" => 'Data Surat Kontrol Tidak Ada', "p_text" => '<b>SILAKAN MENGAMBIL / CETAK NOMOR ANTRIAN KE SECURITY UNTUK KE LOKET PENDAFTARAN</b>']];
                                                die(json_encode($cdecode));
                                            }
                                        } else if ($poliAsal !== $poliTujuan) {

                                            // Rujukan Internal

                                            $dataPasien = $this->antrian->dataPasien($checkId->id);

                                            $tujuan = '0';
                                            $flag = null;
                                            $kdPenunjang = null;
                                            $assest = '2';
                                            $noSurat = null;
                                            $dpjp = null;

                                            $xPlain = $this->create_no_sep_post($data, $dataPasien, $kdPenunjang, $tujuan, $assest, $flag, $noSurat, $dpjp);

                                            if (isset($xPlain['metaData']['code'])) {

                                                if ($xPlain['metaData']['code'] === 201) {

                                                    $decode = ["metaData" => ["code" => 201, "message" => $xPlain['metaData']['message'], "p_text" => $xPlain['metaData']['message']]];
                                                } else {

                                                    $decode = ["metaData" => ["code" => 200, "message" => 'Check In Berhasil', "p_text" => '<b>A. SILAKAN CETAK BUKTI KUNJUNG DAN CETAK SEP</br>B. SETELAH BERHASIL, SILAKAN MELANJUTKAN KUNJUNGAN KE POLIKLINIK</br>C. BERKAS CETAK SEP WAJIB DITANDATANGANI DAN DISERAHKAN KE PERAWAT POLIKLINIK </br> D. BERKAS CETAK BUKTI KUNJUNG WAJIB DISERAHKAN SAAT MENGAMBIL OBAT DI APOTEK FARMASI</b>']];
                                                }
                                            } else {

                                                $decode = ["metaData" => ["code" => 200, "message" => 'Check In Berhasil', "p_text" => '<b>A. SILAKAN CETAK BUKTI KUNJUNG DAN CETAK SEP</br>B. SETELAH BERHASIL, SILAKAN MELANJUTKAN KUNJUNGAN KE POLIKLINIK</br>C. BERKAS CETAK SEP WAJIB DITANDATANGANI DAN DISERAHKAN KE PERAWAT POLIKLINIK </br> D. BERKAS CETAK BUKTI KUNJUNG WAJIB DISERAHKAN SAAT MENGAMBIL OBAT DI APOTEK FARMASI</b>']];
                                            }

                                            $this->response($decode, REST_Controller::HTTP_OK);
                                        }
                                    } else {

                                        $decode = ["metaData" => ["code" => 201, "message" => 'Poli Tujuan Tidak Terdefinisi', "p_text" => '<b>SILAKAN MENGAMBIL / CETAK NOMOR ANTRIAN KE SECURITY UNTUK KE LOKET PENDAFTARAN</b>']];

                                        $this->response($decode, REST_Controller::HTTP_OK);
                                    }
                                } else {

                                    if ($checkId->is_kontrol_pasca_ranap === '1') {

                                        if ($checkId->id_skd !== NULL && $checkId->id_skd !== '') {

                                            if ($checkId->id_skb !== NULL && $checkId->id_skb !== '') {

                                                $checkNomer = $this->antrian->cekSuratKontrolBpjs($checkId->id_skb);
                                                $dataPasien = $this->antrian->dataPasien($checkId->id);

                                                if ($checkNomer->no_surat !== null && $checkNomer->no_surat !== '') {

                                                    $noSurat = $checkNomer->no_surat;
                                                    $kodeDpjp = $checkId->kode_bpjs_dokter;

                                                    $noSep = $checkId->no_sep_asal;
                                                    $this->bpjs_vclaim2 = $this->antrian->getConfigVclaim2();
                                                    $url    = $this->bpjs_vclaim2->server . "/SEP/";
                                                    $header = $this->antrian->createHeader($this->bpjs_vclaim2);
                                                    $output = getCurl($url . $noSep, $header);
                                                    $decode = json_decode($output);

                                                    $xData = $this->antrian->decryptResponseVclaim2($decode->response);

                                                    if ($decode !== false && $decode !== null) {

                                                        if ($decode->metaData->code === '200') {

                                                            if ($decode->metaData->code === '200' && $decode->response !== null) {

                                                                if ($xData->klsRawat->klsRawatHak !== null && $xData->klsRawat->klsRawatHak !== '') {

                                                                    $cekDataDiagnosa = $this->antrian->cekDiagnosaKontrol($checkId->id_skd);

                                                                    if (isset($cekDataDiagnosa->prioritas)) {

                                                                        if ($cekDataDiagnosa->diagnosa_manual === '1') {

                                                                            if ($cekDataDiagnosa->diag_manual !== null) {

                                                                                $icdx = $cekDataDiagnosa->diag_manual;
                                                                            } else {

                                                                                $icdx = 'Z09.8';
                                                                            }
                                                                        } else {

                                                                            if ($cekDataDiagnosa->diag_auto !== null) {

                                                                                $icdx = $cekDataDiagnosa->diag_auto;
                                                                            } else {

                                                                                $icdx = 'Z09.8';
                                                                            }
                                                                        }
                                                                    } else {

                                                                        $icdx = 'Z09.8';
                                                                    }

                                                                    $kirimData = array(
                                                                        "rujukan" => array(
                                                                            "poliRujukan"   => array(
                                                                                "kode" => $checkId->kode_bpjs_poli
                                                                            ),
                                                                            "peserta"       => array(
                                                                                "noKartu"   => $checkId->no_kartu,
                                                                                "hakKelas"  => array(
                                                                                    "kode" => $xData->klsRawat->klsRawatHak
                                                                                )
                                                                            ),
                                                                            "noKunjungan"   => $xData->noSep,
                                                                            "keluhan"       => "",
                                                                            "pelayanan"     => array(
                                                                                "kode" => "2"
                                                                            ),
                                                                            "tglKunjungan"  => $xData->tglSep,
                                                                            "provPerujuk"   => array(
                                                                                "kode" => "0223R038"
                                                                            ),
                                                                            "diagnosa"   => array(
                                                                                "kode" => $icdx
                                                                            )

                                                                        ),
                                                                        "asalFaskes" => "2"
                                                                    );

                                                                    $data = json_encode($kirimData);

                                                                    $tujuan = '0';
                                                                    $flag = null;
                                                                    $kdPenunjang = null;
                                                                    $assest = null;
                                                                    $noSurat = $noSurat;
                                                                    $dpjp = $kodeDpjp;

                                                                    $xPlain = $this->create_no_sep_post($data, $dataPasien, $kdPenunjang, $tujuan, $assest, $flag, $noSurat, $dpjp);

                                                                    if (isset($xPlain['metaData']['code'])) {

                                                                        if ($xPlain['metaData']['code'] === 201) {

                                                                            $decode = ["metaData" => ["code" => 201, "message" => $xPlain['metaData']['message'], "p_text" => $xPlain['metaData']['message']]];

                                                                            die(json_encode($decode));
                                                                        } else {

                                                                            $decode = ["metaData" => ["code" => 200, "message" => 'Check In Berhasil', "p_text" => '<b>A. SILAKAN CETAK BUKTI KUNJUNG DAN CETAK SEP</br>B. SETELAH BERHASIL, SILAKAN MELANJUTKAN KUNJUNGAN KE POLIKLINIK</br>C. BERKAS CETAK SEP WAJIB DITANDATANGANI DAN DISERAHKAN KE PERAWAT POLIKLINIK </br> D. BERKAS CETAK BUKTI KUNJUNG WAJIB DISERAHKAN SAAT MENGAMBIL OBAT DI APOTEK FARMASI</b>']];
                                                                        }
                                                                    } else {

                                                                        $decode = ["metaData" => ["code" => 200, "message" => 'Check In Berhasil', "p_text" => '<b>A. SILAKAN CETAK BUKTI KUNJUNG DAN CETAK SEP</br>B. SETELAH BERHASIL, SILAKAN MELANJUTKAN KUNJUNGAN KE POLIKLINIK</br>C. BERKAS CETAK SEP WAJIB DITANDATANGANI DAN DISERAHKAN KE PERAWAT POLIKLINIK </br> D. BERKAS CETAK BUKTI KUNJUNG WAJIB DISERAHKAN SAAT MENGAMBIL OBAT DI APOTEK FARMASI</b>']];
                                                                    }

                                                                    $this->response($decode, REST_Controller::HTTP_OK);
                                                                } else {

                                                                    $decode = ["metaData" => ["code" => 201, "message" => 'Data Hak Kelas Rawat Tidak Ada', "p_text" => '<b>Data Hak Kelas Rawat Tidak Ada</b>']];

                                                                    $this->response($decode, REST_Controller::HTTP_OK);
                                                                }
                                                            } else {

                                                                $decode = ["metaData" => ["code" => 201, "message" => 'Pengambilan data Hak Kelas Rawat Gagal Silakan Coba Checkin Kembali', "p_text" => '<b>Pengambilan data Hak Kelas Rawat Gagal Silakan Coba Checkin Kembali</b>']];

                                                                $this->response($decode, REST_Controller::HTTP_OK);
                                                            }
                                                        } else {

                                                            $decode = ["metaData" => ["code" => 201, "message" => $decode->metaData, "p_text" => '<b>' . $decode->metaData . '</b>']];

                                                            $this->response($decode, REST_Controller::HTTP_OK);
                                                        }
                                                    } else {

                                                        $decode = ["metaData" => ["code" => 201, "message" => 'Akses BPJS Lambat atau Gagal Akses BPJS', "p_text" => '<b>Akses BPJS Lambat atau Gagal Akses BPJS</b>']];

                                                        $this->response($decode, REST_Controller::HTTP_OK);
                                                    }
                                                } else {

                                                    $noSepAsal = $checkId->no_sep_asal;

                                                    if ($noSepAsal !== NULL && $noSepAsal !== '') {

                                                        $kodePoli = $checkId->kode_bpjs_poli;

                                                        if ($kodePoli !== NULL && $kodePoli !== '') {

                                                            $kodeDpjp = $checkId->kode_bpjs_dokter;

                                                            if ($kodeDpjp !== NULL && $kodeDpjp !== '') {

                                                                if ($checkId->iddaftarasal !== null && $checkId->iddaftarasal !== '') {

                                                                    $idPendaftaranAsal = (int)$checkId->iddaftarasal;

                                                                    for ($i = 0; $i < 3;) {

                                                                        $zRequest = array(
                                                                            "request" => array(
                                                                                "noSEP" => $noSepAsal,
                                                                                "kodeDokter" => $kodeDpjp,
                                                                                "poliKontrol" => $kodePoli,
                                                                                "tglRencanaKontrol" => $this->date,
                                                                                "user" => $this->session->userdata("account")
                                                                            )
                                                                        );

                                                                        $zUrl = $this->bpjs_vclaim2->server . "/RencanaKontrol/insert";
                                                                        $zHeader = $this->antrian->createHeader($this->bpjs_vclaim2);
                                                                        $zHeader[4] = "Content-type: Application/x-www-form-urlencoded";
                                                                        $zOutput = postCurl($zUrl, json_encode($zRequest), $zHeader);
                                                                        $zDecode = json_decode($zOutput);

                                                                        if ($zDecode === NULL | $zDecode === false) {

                                                                            $i++;
                                                                        } else {

                                                                            if ($zDecode->metaData->code !== '200') {

                                                                                $decode = ["metaData" => ["code" => 201, "message" => $zDecode->metaData->message, "p_text" => $zDecode->metaData->message]];

                                                                                die(json_encode($decode));

                                                                                break;
                                                                            } else if ($zDecode->metaData->code === '200' && $this->antrian->decryptResponseVclaim2($zDecode->response) === null) {

                                                                                date_default_timezone_set('Asia/Jakarta');

                                                                                for ($x = 0; $x < 2;) {

                                                                                    $sUrl = $this->bpjs_vclaim2->server . "/RencanaKontrol/ListRencanaKontrol/Bulan/" . date('m') . "/Tahun/" . date('Y') . "/Nokartu/" . $noKartu . "/filter/2";
                                                                                    $sHeader = $this->antrian->createHeader($this->bpjs_vclaim2);
                                                                                    $sHeader[4]  = 'Content-type: Application/x-www-form-urlencoded';
                                                                                    $sOutput = getCurl($sUrl, $sHeader);
                                                                                    $sDecode = json_decode($sOutput);

                                                                                    if ($sDecode === NULL | $sDecode === false) {

                                                                                        $x;
                                                                                    } else {

                                                                                        if ($sDecode->metaData->code !== '200') {

                                                                                            $decode = ["metaData" => ["code" => 201, "message" => $sDecode->metaData->message, "p_text" => $sDecode->metaData->message]];

                                                                                            die(json_encode($decode));

                                                                                            break;
                                                                                        } else if ($sDecode->metaData->code === '200' && $this->antrian->decryptResponseVclaim2($sDecode->response) === null) {

                                                                                            $x;
                                                                                        } else {

                                                                                            $sdeData = $this->antrian->decryptResponseVclaim2($sDecode->response);

                                                                                            break;
                                                                                        }
                                                                                    }
                                                                                }
                                                                                date_default_timezone_set('Asia/Jakarta');
                                                                                if ($sdeData->list[0]->tglRencanaKontrol === date('Y-m-d') && $sdeData->list[0]->kodeDokter === $checkId->kode_bpjs_dokter && $sdeData->list[0]->poliTujuan === $checkId->kode_bpjs_poli) {

                                                                                    $idAntrian = (int)$checkId->id;

                                                                                    $dataInsert = array(
                                                                                        'no_surat'  => $sdeData->list[0]->noSuratKontrol,
                                                                                        'id_pasien' => isset($checkId->no_rm) ? $checkId->no_rm : NULL,
                                                                                        'jenis' => 2,
                                                                                        'tgl_rencana_kontrol' => $sdeData->list[0]->tglRencanaKontrol,
                                                                                        'dokter' => $sdeData->list[0]->namaDokter,
                                                                                        'no_kartu' => $sdeData->list[0]->noKartu,
                                                                                        'id_user' => $this->session->userdata("id_translucent"),
                                                                                        'created_date' => $this->datetime,
                                                                                        'id_antrian' => $idAntrian,
                                                                                        'id_pendaftaran_asal' => $idPendaftaranAsal
                                                                                    );

                                                                                    $idSK = $this->antrian->simpanDataSuratKontrol($dataInsert);

                                                                                    if ($idSK !== NULL) {

                                                                                        $skAntrian = ["no_sk" => $sdeData->list[0]->noSuratKontrol, "idskb" => $idSK];
                                                                                        $this->db->where('id', $idAntrian)->update('sm_antrian_bpjs', $skAntrian);

                                                                                        $updateKontrolRanap = ["id_skb" => (int)$idSK];
                                                                                        $this->db->where('id', (int)$checkId->id_skd)->update('sm_surat_kontrol', $updateKontrolRanap);

                                                                                        $dataPasien = $this->antrian->dataPasien($idAntrian);

                                                                                        $noSurat = $sdeData->list[0]->noSuratKontrol;
                                                                                        $kodeDpjp = $checkId->kode_bpjs_dokter;
                                                                                        $noSep = $checkId->no_sep_asal;
                                                                                        $this->bpjs_vclaim2 = $this->antrian->getConfigVclaim2();
                                                                                        $url    = $this->bpjs_vclaim2->server . "/SEP/";
                                                                                        $header = $this->antrian->createHeader($this->bpjs_vclaim2);
                                                                                        $output = getCurl($url . $noSep, $header);
                                                                                        $decode = json_decode($output);

                                                                                        $xData = $this->antrian->decryptResponseVclaim2($decode->response);

                                                                                        if ($decode !== false && $decode !== null) {

                                                                                            if ($decode->metaData->code === '200') {

                                                                                                if ($decode->metaData->code === '200' && $decode->response !== null) {

                                                                                                    if ($xData->klsRawat->klsRawatHak !== null && $xData->klsRawat->klsRawatHak !== '') {

                                                                                                        $cekDataDiagnosa = $this->antrian->cekDiagnosaKontrol($checkId->id_skd);

                                                                                                        if (isset($cekDataDiagnosa->prioritas)) {

                                                                                                            if ($cekDataDiagnosa->diagnosa_manual === '1') {

                                                                                                                if ($cekDataDiagnosa->diag_manual !== null) {

                                                                                                                    $icdx = $cekDataDiagnosa->diag_manual;
                                                                                                                } else {

                                                                                                                    $icdx = 'Z09.8';
                                                                                                                }
                                                                                                            } else {

                                                                                                                if ($cekDataDiagnosa->diag_auto !== null) {

                                                                                                                    $icdx = $cekDataDiagnosa->diag_auto;
                                                                                                                } else {

                                                                                                                    $icdx = 'Z09.8';
                                                                                                                }
                                                                                                            }
                                                                                                        } else {

                                                                                                            $icdx = 'Z09.8';
                                                                                                        }

                                                                                                        $kirimData = array(
                                                                                                            "rujukan" => array(
                                                                                                                "poliRujukan"   => array(
                                                                                                                    "kode" => $checkId->kode_bpjs_poli
                                                                                                                ),
                                                                                                                "peserta"       => array(
                                                                                                                    "noKartu"   => $checkId->no_kartu,
                                                                                                                    "hakKelas"  => array(
                                                                                                                        "kode" => $xData->klsRawat->klsRawatHak
                                                                                                                    )
                                                                                                                ),
                                                                                                                "noKunjungan"   => $xData->noSep,
                                                                                                                "keluhan"       => "",
                                                                                                                "pelayanan"     => array(
                                                                                                                    "kode" => "2"
                                                                                                                ),
                                                                                                                "tglKunjungan"  => $xData->tglSep,
                                                                                                                "provPerujuk"   => array(
                                                                                                                    "kode" => "0223R038"
                                                                                                                ),
                                                                                                                "diagnosa"   => array(
                                                                                                                    "kode" => $icdx
                                                                                                                )

                                                                                                            ),
                                                                                                            "asalFaskes" => "2"
                                                                                                        );

                                                                                                        $data = json_encode($kirimData);

                                                                                                        $tujuan = '0';
                                                                                                        $flag = null;
                                                                                                        $kdPenunjang = null;
                                                                                                        $assest = null;
                                                                                                        $noSurat = $noSurat;
                                                                                                        $dpjp = $kodeDpjp;

                                                                                                        $xPlain = $this->create_no_sep_post($data, $dataPasien, $kdPenunjang, $tujuan, $assest, $flag, $noSurat, $dpjp);

                                                                                                        if (isset($xPlain['metaData']['code'])) {

                                                                                                            if ($xPlain['metaData']['code'] === 201) {

                                                                                                                $decode = ["metaData" => ["code" => 201, "message" => $xPlain['metaData']['message'], "p_text" => $xPlain['metaData']['message']]];

                                                                                                                die(json_encode($decode));

                                                                                                                break;
                                                                                                            } else {

                                                                                                                $decode = ["metaData" => ["code" => 200, "message" => 'Check In Berhasil', "p_text" => '<b>A. SILAKAN CETAK BUKTI KUNJUNG DAN CETAK SEP</br>B. SETELAH BERHASIL, SILAKAN MELANJUTKAN KUNJUNGAN KE POLIKLINIK</br>C. BERKAS CETAK SEP WAJIB DITANDATANGANI DAN DISERAHKAN KE PERAWAT POLIKLINIK </br> D. BERKAS CETAK BUKTI KUNJUNG WAJIB DISERAHKAN SAAT MENGAMBIL OBAT DI APOTEK FARMASI</b>']];
                                                                                                            }
                                                                                                        } else {

                                                                                                            $decode = ["metaData" => ["code" => 200, "message" => 'Check In Berhasil', "p_text" => '<b>A. SILAKAN CETAK BUKTI KUNJUNG DAN CETAK SEP</br>B. SETELAH BERHASIL, SILAKAN MELANJUTKAN KUNJUNGAN KE POLIKLINIK</br>C. BERKAS CETAK SEP WAJIB DITANDATANGANI DAN DISERAHKAN KE PERAWAT POLIKLINIK </br> D. BERKAS CETAK BUKTI KUNJUNG WAJIB DISERAHKAN SAAT MENGAMBIL OBAT DI APOTEK FARMASI</b>']];
                                                                                                        }

                                                                                                        $this->response($decode, REST_Controller::HTTP_OK);

                                                                                                        break;
                                                                                                    } else {

                                                                                                        $decode = ["metaData" => ["code" => 201, "message" => 'Data Hak Kelas Rawat Tidak Ada', "p_text" => '<b>Data Hak Kelas Rawat Tidak Ada</b>']];

                                                                                                        die(json_encode($decode));

                                                                                                        break;
                                                                                                    }
                                                                                                } else {

                                                                                                    $decode = ["metaData" => ["code" => 201, "message" => 'Pengambilan data Hak Kelas Rawat Gagal Silakan Coba Checkin Kembali', "p_text" => '<b>Pengambilan data Hak Kelas Rawat Gagal Silakan Coba Checkin Kembali</b>']];

                                                                                                    die(json_encode($decode));

                                                                                                    break;
                                                                                                }
                                                                                            } else {

                                                                                                $decode = ["metaData" => ["code" => 201, "message" => $decode->metaData, "p_text" => '<b>' . $decode->metaData . '</b>']];

                                                                                                die(json_encode($decode));

                                                                                                break;
                                                                                            }
                                                                                        } else {

                                                                                            $decode = ["metaData" => ["code" => 201, "message" => 'Akses BPJS Lambat atau Gagal Akses BPJS', "p_text" => '<b>Akses BPJS Lambat atau Gagal Akses BPJS</b>']];

                                                                                            die(json_encode($decode));

                                                                                            break;
                                                                                        }
                                                                                    } else {

                                                                                        $decode = ["metaData" => ["code" => 201, "message" => "Gagal Menyimpan data Surat Kontrol", "p_text" => '<b>SILAKAN MENGAMBIL / CETAK NOMOR ANTRIAN KE SECURITY UNTUK KE LOKET PENDAFTARAN</b>']];

                                                                                        die(json_encode($decode));

                                                                                        break;
                                                                                    }
                                                                                } else {

                                                                                    $decode = ["metaData" => ["code" => 201, "message" => 'Data Surat Kontrol Tidak Sesuai, Silakan menuju NS !', "p_text" => '<b>SILAKAN MENGAMBIL / CETAK NOMOR ANTRIAN KE SECURITY UNTUK KE LOKET PENDAFTARAN</b>']];

                                                                                    die(json_encode($decode));

                                                                                    break;
                                                                                }
                                                                            } else {

                                                                                $skData = $this->antrian->decryptResponseVclaim2($zDecode->response);

                                                                                if ($skData !== null) {

                                                                                    $idAntrian = (int)$checkId->id;

                                                                                    $dataInsert = array(
                                                                                        'no_surat'  => $skData->noSuratKontrol,
                                                                                        'id_pasien' => isset($checkId->no_rm) ? $checkId->no_rm : NULL,
                                                                                        'jenis' => 2,
                                                                                        'tgl_rencana_kontrol' => $skData->tglRencanaKontrol,
                                                                                        'dokter' => $skData->namaDokter,
                                                                                        'no_kartu' => $skData->noKartu,
                                                                                        'id_user' => $this->session->userdata("id_translucent"),
                                                                                        'created_date' => $this->datetime,
                                                                                        'id_antrian' => $idAntrian,
                                                                                        'id_pendaftaran_asal' => $idPendaftaranAsal
                                                                                    );

                                                                                    $idSK = $this->antrian->simpanDataSuratKontrol($dataInsert);

                                                                                    if ($idSK !== NULL) {

                                                                                        $skAntrian = ["no_sk" => $skData->noSuratKontrol, "idskb" => $idSK];
                                                                                        $this->db->where('id', $idAntrian)->update('sm_antrian_bpjs', $skAntrian);

                                                                                        $updateKontrolRanap = ["id_skb" => (int)$idSK];
                                                                                        $this->db->where('id', (int)$checkId->id_skd)->update('sm_surat_kontrol', $updateKontrolRanap);

                                                                                        $dataPasien = $this->antrian->dataPasien($idAntrian);

                                                                                        $noSurat = $skData->noSuratKontrol;
                                                                                        $kodeDpjp = $checkId->kode_bpjs_dokter;
                                                                                        $noSep = $checkId->no_sep_asal;
                                                                                        $this->bpjs_vclaim2 = $this->antrian->getConfigVclaim2();
                                                                                        $url    = $this->bpjs_vclaim2->server . "/SEP/";
                                                                                        $header = $this->antrian->createHeader($this->bpjs_vclaim2);
                                                                                        $output = getCurl($url . $noSep, $header);
                                                                                        $decode = json_decode($output);

                                                                                        if ($decode !== false && $decode !== null) {

                                                                                            if ($decode->metaData->code === '200') {

                                                                                                if ($decode->metaData->code === '200' && $decode->response !== null) {

                                                                                                    $xData = $this->antrian->decryptResponseVclaim2($decode->response);

                                                                                                    if ($xData->klsRawat->klsRawatHak !== null && $xData->klsRawat->klsRawatHak !== '') {

                                                                                                        $cekDataDiagnosa = $this->antrian->cekDiagnosaKontrol($checkId->id_skd);

                                                                                                        if (isset($cekDataDiagnosa->prioritas)) {

                                                                                                            if ($cekDataDiagnosa->diagnosa_manual === '1') {

                                                                                                                if ($cekDataDiagnosa->diag_manual !== null) {

                                                                                                                    $icdx = $cekDataDiagnosa->diag_manual;
                                                                                                                } else {

                                                                                                                    $icdx = 'Z09.8';
                                                                                                                }
                                                                                                            } else {

                                                                                                                if ($cekDataDiagnosa->diag_auto !== null) {

                                                                                                                    $icdx = $cekDataDiagnosa->diag_auto;
                                                                                                                } else {

                                                                                                                    $icdx = 'Z09.8';
                                                                                                                }
                                                                                                            }
                                                                                                        } else {

                                                                                                            $icdx = 'Z09.8';
                                                                                                        }

                                                                                                        $kirimData = array(
                                                                                                            "rujukan" => array(
                                                                                                                "poliRujukan"   => array(
                                                                                                                    "kode" => $checkId->kode_bpjs_poli
                                                                                                                ),
                                                                                                                "peserta"       => array(
                                                                                                                    "noKartu"   => $checkId->no_kartu,
                                                                                                                    "hakKelas"  => array(
                                                                                                                        "kode" => $xData->klsRawat->klsRawatHak
                                                                                                                    )
                                                                                                                ),
                                                                                                                "noKunjungan"   => $xData->noSep,
                                                                                                                "keluhan"       => "",
                                                                                                                "pelayanan"     => array(
                                                                                                                    "kode" => "2"
                                                                                                                ),
                                                                                                                "tglKunjungan"  => $xData->tglSep,
                                                                                                                "provPerujuk"   => array(
                                                                                                                    "kode" => "0223R038"
                                                                                                                ),
                                                                                                                "diagnosa"   => array(
                                                                                                                    "kode" => $icdx
                                                                                                                )

                                                                                                            ),
                                                                                                            "asalFaskes" => "2"
                                                                                                        );

                                                                                                        $data = json_encode($kirimData);

                                                                                                        $tujuan = null;
                                                                                                        $flag = null;
                                                                                                        $kdPenunjang = null;
                                                                                                        $assest = null;
                                                                                                        $noSurat = $noSurat;
                                                                                                        $dpjp = $kodeDpjp;

                                                                                                        $xPlain = $this->create_no_sep_post($data, $dataPasien, $kdPenunjang, $tujuan, $assest, $flag, $noSurat, $dpjp);

                                                                                                        if (isset($xPlain['metaData']['code'])) {

                                                                                                            if ($xPlain['metaData']['code'] === 201) {

                                                                                                                $decode = ["metaData" => ["code" => 201, "message" => $xPlain['metaData']['message'], "p_text" => $xPlain['metaData']['message']]];

                                                                                                                die(json_encode($decode));

                                                                                                                break;
                                                                                                            } else {

                                                                                                                $decode = ["metaData" => ["code" => 200, "message" => 'Check In Berhasil', "p_text" => '<b>A. SILAKAN CETAK BUKTI KUNJUNG DAN CETAK SEP</br>B. SETELAH BERHASIL, SILAKAN MELANJUTKAN KUNJUNGAN KE POLIKLINIK</br>C. BERKAS CETAK SEP WAJIB DITANDATANGANI DAN DISERAHKAN KE PERAWAT POLIKLINIK </br> D. BERKAS CETAK BUKTI KUNJUNG WAJIB DISERAHKAN SAAT MENGAMBIL OBAT DI APOTEK FARMASI</b>']];
                                                                                                            }
                                                                                                        } else {

                                                                                                            $decode = ["metaData" => ["code" => 200, "message" => 'Check In Berhasil', "p_text" => '<b>A. SILAKAN CETAK BUKTI KUNJUNG DAN CETAK SEP</br>B. SETELAH BERHASIL, SILAKAN MELANJUTKAN KUNJUNGAN KE POLIKLINIK</br>C. BERKAS CETAK SEP WAJIB DITANDATANGANI DAN DISERAHKAN KE PERAWAT POLIKLINIK </br> D. BERKAS CETAK BUKTI KUNJUNG WAJIB DISERAHKAN SAAT MENGAMBIL OBAT DI APOTEK FARMASI</b>']];
                                                                                                        }

                                                                                                        $this->response($decode, REST_Controller::HTTP_OK);

                                                                                                        break;
                                                                                                    } else {

                                                                                                        $decode = ["metaData" => ["code" => 201, "message" => 'Data Hak Kelas Rawat Tidak Ada', "p_text" => '<b>Data Hak Kelas Rawat Tidak Ada</b>']];

                                                                                                        die(json_encode($decode));

                                                                                                        break;
                                                                                                    }
                                                                                                } else {

                                                                                                    $decode = ["metaData" => ["code" => 201, "message" => 'Pengambilan data Hak Kelas Rawat Gagal Silakan Coba Checkin Kembali', "p_text" => '<b>Pengambilan data Hak Kelas Rawat Gagal Silakan Coba Checkin Kembali</b>']];

                                                                                                    die(json_encode($decode));

                                                                                                    break;
                                                                                                }
                                                                                            } else {

                                                                                                $decode = ["metaData" => ["code" => 201, "message" => $decode->metaData, "p_text" => '<b>' . $decode->metaData . '</b>']];

                                                                                                die(json_encode($decode));

                                                                                                break;
                                                                                            }
                                                                                        } else {

                                                                                            $decode = ["metaData" => ["code" => 201, "message" => 'Akses BPJS Lambat atau Gagal Akses BPJS', "p_text" => '<b>Akses BPJS Lambat atau Gagal Akses BPJS</b>']];

                                                                                            die(json_encode($decode));

                                                                                            break;
                                                                                        }
                                                                                    } else {

                                                                                        $decode = ["metaData" => ["code" => 201, "message" => "Gagal Menyimpan data Surat Kontrol", "p_text" => "Gagal Menyimpan data Surat Kontrol"]];

                                                                                        die(json_encode($decode));

                                                                                        break;
                                                                                    }
                                                                                }
                                                                            }
                                                                        }

                                                                        if ($i >= 3) {

                                                                            $decode = ["metaData" => ["code" => 201, "message" => 'Akses BPJS Lambat atau Gagal Akses BPJS', "p_text" => '<b>Akses BPJS Lambat atau Gagal Akses BPJS</b>']];

                                                                            die(json_encode($decode));

                                                                            break;
                                                                        }
                                                                    }
                                                                } else {

                                                                    $decode = ["metaData" => ["code" => 201, "message" => 'Id Pendaftaran Asal Tidak ada', "p_text" => '<b>SILAKAN MENGAMBIL / CETAK NOMOR ANTRIAN KE SECURITY UNTUK KE LOKET PENDAFTARAN</b>']];

                                                                    die(json_encode($decode));
                                                                }
                                                            } else {

                                                                $decode = ["metaData" => ["code" => 201, "message" => 'Kode BPJS DPJP Tidak ada', "p_text" => '<b>SILAKAN MENGAMBIL / CETAK NOMOR ANTRIAN KE SECURITY UNTUK KE LOKET PENDAFTARAN</b>']];

                                                                die(json_encode($decode));
                                                            }
                                                        } else {

                                                            $decode = ["metaData" => ["code" => 201, "message" => 'Kode BPJS Poli Tidak ada', "p_text" => '<b>SILAKAN MENGAMBIL / CETAK NOMOR ANTRIAN KE SECURITY UNTUK KE LOKET PENDAFTARAN</b>']];

                                                            die(json_encode($decode));
                                                        }
                                                    } else {

                                                        $decode = ["metaData" => ["code" => 201, "message" => 'Nomor SEP Asal Tidak Ada', "p_text" => '<b>SILAKAN MENGAMBIL / CETAK NOMOR ANTRIAN KE SECURITY UNTUK KE LOKET PENDAFTARAN</b>']];

                                                        die(json_encode($decode));
                                                    }
                                                }
                                            } else {

                                                $decode = ["metaData" => ["code" => 201, "message" => 'ID SKB Tidak Tersedia di Surat Kontrol', "p_text" => '<b>ID SKB Tidak Tersedia di Surat Kontrol</b>']];

                                                die(json_encode($decode));
                                            }
                                        } else {

                                            $decode = ["metaData" => ["code" => 201, "message" => 'ID SKD pada Surat Kontrol Tidak Ada', "p_text" => '<b>ID SKD pada Surat Kontrol Tidak Ada</b>']];

                                            $this->response($decode, REST_Controller::HTTP_OK);
                                        }
                                    } else {

                                        $decode = ["metaData" => ["code" => 201, "message" => 'Poli Asal Tidak Terdefinisi', "p_text" => '<b>Poli Asal Tidak Terdefinisi</b>']];

                                        $this->response($decode, REST_Controller::HTTP_OK);
                                    }
                                }
                            } else {

                                $decode = ["metaData" => ["code" => 201, "message" => 'Sistem Masih Dalam Pengembangan', "p_text" => '<b>Sistem Masih Dalam Pengembangan</b>']];

                                $this->response($decode, REST_Controller::HTTP_OK);
                            }
                        } else {

                            $decode = ["metaData" => ["code" => 201, "message" => 'Nomor RM Tidak ada', "p_text" => '<b>NOMOR RM TIDAK ADA, SILAKAN MENGAMBIL / CETAK NOMOR ANTRIAN KE SECURITY UNTUK KE LOKET PENDAFTARAN</b>']];

                            $this->response($decode, REST_Controller::HTTP_OK);
                        }
                    } else {

                        $decode = ["metaData" => ["code" => 201, "message" => 'Rujukan Awal Tidak Terdefinisi', "p_text" => '<b>SILAKAN MENGAMBIL / CETAK NOMOR ANTRIAN KE SECURITY UNTUK KE LOKET PENDAFTARAN</b>']];

                        $this->response($decode, REST_Controller::HTTP_OK);
                    }
                } else if ($penjamin === 'Tunai' || $penjamin === 'Jaminan Kesehatan RSUD') {

                    date_default_timezone_set('Asia/Jakarta');

                    $tanggalKunjungan = $checkId->tanggal_kunjungan;

                    if ($tanggalKunjungan < date('Y-m-d')) {

                        $decode = ["metaData" => ["code" => 201, "message" => 'Tanggal Kunjungan sudah Lewat', "p_text" => 'Tanggal Kunjungan sudah Lewat']];

                        die(json_encode($decode));
                    } else if ($tanggalKunjungan > date('Y-m-d')) {

                        $decode = ["metaData" => ["code" => 201, "message" => 'Silakan cek kembali kode Booking tersebut sesuai jadwal', "p_text" => 'Silakan cek kembali kode Booking tersebut sesuai jadwal']];

                        die(json_encode($decode));
                    } else {

                        if($grupAkun !== 'Admin' && $grupAkun !== 'Admin Rekam Medis'){

                            if (date('H:i') > date('H:i', strtotime('12:00'))) {

                                $decode = ["metaData" => ["code" => 201, "message" => 'Pendaftaran Sudah Tutup', "p_text" => 'Pendaftaran Sudah Tutup']];

                                die(json_encode($decode));
                            }

                        }

                        $statusrm = safe_get('statusrm');

                        if ($statusrm === 'null') {

                            $tunai = $this->simpan_pendaftaran_post($id);
                        } else {

                            $tunai = $this->simpan_pendaftaran_post($id, null, $statusrm);
                        }

                        if (is_object($tunai)) {

                            $decode = ["metaData" => ["code" => 202, "message" => $tunai, "konfirm" => 'Data Anda sudah tercatat dengan no. rekam medis ' . $tunai->id, "p_text" => '<b>SILAKAN KONFIRMASI DATA ANDA</b>']];
                        } else if (is_array($tunai)) {

                            $decode = ["metaData" => ["code" => 202, "message" => $tunai, "konfirm" => 'Data Anda sudah tercatat dengan no. rekam medis ' . $tunai['message']->id, "p_text" => '<b>SILAKAN KONFIRMASI DATA ANDA</b>']];
                        } else if ($tunai === 'data') {

                            $decode = ["metaData" => ["code" => 201, "message" => 'Data Pasien pada Aplikasi Whatsapp tidak lengkap', "p_text" => '<b>DATA PASIEN PADA APLIKASI WHATSAPP TIDAK LENGKAP</b>']];
                        } else if ($tunai === 'nik') {

                            $decode = ["metaData" => ["code" => 201, "message" => 'NIK Tidak Ada, Silakan ke Loket Pendaftaran', "p_text" => '<b>NIK TIDAK ADA, SILAKAN KE LOKET PENDAFTARAN</b>']];
                        } else if ($tunai === 'rm') {

                            $decode = ["metaData" => ["code" => 201, "message" => 'NIK Tersebut Tidak memiliki No. RM , Silakan ke Loket Pendaftaran', "p_text" => '<b>NIK TERSEBUT TIDAK MEMILIKI NO. RM, SILAKAN KE LOKET PENDAFTARAN</b>']];
                        } else if ($tunai === 'wa') {

                            $decode = ["metaData" => ["code" => 201, "message" => 'Tidak Memiliki Data Booking Aplikasi Whatsapp , Silakan ke Loket Pendaftaran', "p_text" => '<b>TIDAK MEMILIKI DATA BOOKING APLIKASI WHATSAPP, SILAKAN KE LOKET PENDAFTARAN</b>']];
                        } else if ($tunai === 'tunai') {

                            $decode = ["metaData" => ["code" => 200, "message" => 'Check in Berhasil', "p_text" => '<b>A. SILAKAN CETAK BUKTI KUNJUNG</br>B. MELAKUKAN PEMBAYARAN KE KASIR</br>C. MENGANTRI KUNJUNGAN KE POLIKLINIK</b>']];
                        } else if ($tunai === 'gagal') {

                            $decode = ["metaData" => ["code" => 201, "message" => 'Check In Berhasil']];
                        }

                        $this->response($decode, REST_Controller::HTTP_OK);
                    }
                } else {

                    if ($penjamin === null) {

                        $decode = ["metaData" => ["code" => 201, "message" => 'Jenis Penjamin tidak ada']];
                    } else {

                        $decode = ["metaData" => ["code" => 201, "message" => 'Untuk Jenis penjamin ' . $penjamin . ' Silakan ke Loket Pendaftaran']];
                    }

                    $this->response($decode, REST_Controller::HTTP_OK);
                }
            } else {

                $decode = ["metaData" => ["code" => 201, "message" => 'Jadwal Praktek Dokter Tidak Sesuai, Silakan ubah Jadwal Dokter Anda di NS']];

                $this->response($decode, REST_Controller::HTTP_OK);
            }
        // }
    }

    function simpan_pendaftaran_post($id = null, $nosep = null, $statusrm = null)
    {

        $this->db->trans_begin();

        if ($id !== null && $id !== '') {

            $idAntrian = (int)$id;
        } else {

            if ($this->post('id') !== null && $this->post('id') !== '') {

                $idAntrian = (int)$this->post('id');
                $nosep = $this->post('nosep');
            } else {

                $decode = ["metaData" => ["code" => 201, "message" => 'Antrian tidak terdaftar', "p_text" => '<b>SILAKAN MENGAMBIL / CETAK NOMOR ANTRIAN KE SECURITY UNTUK KE LOKET PENDAFTARAN</b>']];

                $this->response($decode, REST_Controller::HTTP_OK);

                exit();
            }
        }

        $dataPasien = $this->antrian->dataPasien($idAntrian);

        // harus dibalikin..sudah

        if (isset($dataPasien->no_rm)) {

            //harus dibalikin..sudah

            $id_pasien = $dataPasien->no_rm;

            // Cek status pasien apakah masih dalam kunjungan atau tidak
            // $cek_pasien_active = $this->pendaftaran->cekStatusKunjunganPasien($id_pasien);

            // if ($cek_pasien_active === 'Aktif') :
            //     $jenis_pendaftaran_pasien = $this->pendaftaran->getJenisPendaftaranPasien($id_pasien);
            //     $cek_jenis_pendaftaran_pasien = $jenis_pendaftaran_pasien->keterangan ?? '-';
            //     $tanggal_daftar = $jenis_pendaftaran_pasien->tanggal_daftar ?? '-';
            //     date_default_timezone_set('Asia/Jakarta');
            //     $cek_tanggal_daftar = date('d/m/Y H:i:s', strtotime($tanggal_daftar));

            //     $decode = ["metaData" => ["code" => 201, "message" => 'Pasien masih dalam kunjungan di (' . $cek_jenis_pendaftaran_pasien . ') Tanggal daftar: ' . $cek_tanggal_daftar . '', "p_text" => '<b>SILAKAN MENGAMBIL / CETAK NOMOR ANTRIAN KE SECURITY UNTUK KE LOKET PENDAFTARAN</b>']];

            //     $this->response($decode, REST_Controller::HTTP_OK);

            //     exit();
            // endif;

            if ($dataPasien->id_penjamin !== null) :
                $penjamin = (int)$dataPasien->id_penjamin;
            else :

                $decode = ["metaData" => ["code" => 201, "message" => 'Silahkan pilih penjamin terlebih dahulu.', "p_text" => '<b>SILAKAN MENGAMBIL / CETAK NOMOR ANTRIAN KE SECURITY UNTUK KE LOKET PENDAFTARAN</b>']];
                $this->response($decode, REST_Controller::HTTP_OK);

                exit();
            endif;

            $this->load->model('spesialisasi/Spesialisasi_model', 'sp');
            $id_spesialisasi = ($dataPasien->nama_poli !== '') ? $dataPasien->nama_poli : NULL;
            $klinik = '';

            if ($id_spesialisasi !== null) :
                $spesialiasi = $this->sp->getDataSpesialisasiById($id_spesialisasi);
                $klinik = $spesialiasi->nama;
            endif;

            if ($klinik === 'Medical Check Up') :
                $langsung = 1;
            else :
                $langsung = 0;
            endif;

            $jenisLayanan = '';
            if ($klinik === 'Medical Check Up') {
                $jenisLayanan = $klinik;
            } else {

                if($dataPasien->kode_bpjs_poli === 'HDL'){

                    $jenisLayanan = 'Hemodialisa';

                } else {

                    $jenisLayanan = 'Poliklinik';

                }
            }

            $noRm = $id_pasien;

            $rmPasien = $this->antrian->cekDataPasien($noRm);

            if ($rmPasien !== null && $rmPasien !== '') {

                if ($dataPasien->lokasi_data === 'WA' && $dataPasien->pasien_baru === '1') {

                    if ($statusrm === null) {

                        return $rmPasien;
                        die();
                    } else {

                        $no_rm = $id_pasien;
                    }
                } else {

                    $no_rm = $id_pasien;
                }
            } else {

                if ($dataPasien->lokasi_data === 'WA' && $dataPasien->pasien_baru === '1') {

                    if (isset($dataPasien->nik) && $dataPasien->nik !== '') {

                        $nikPasien = $this->antrian->nikIdentitas($dataPasien->nik);

                        if ($nikPasien !== null) {

                            if ($statusrm === null) {

                                return $nikPasien;
                                die();
                            } else {

                                $no_rm = $nikPasien->id;
                            }
                        } else {

                            $cekNoIdentitas = $this->antrian->dataIdentitasWA($dataPasien->nik, $dataPasien->tanggal_lahir);

                            if (!empty($cekNoIdentitas)) {

                                $dataIdentitas = $cekNoIdentitas[0];

                                if (($dataIdentitas->nama !== null && $dataIdentitas->nama !== '') && ($dataPasien->tanggal_lahir !== null && $dataPasien->tanggal_lahir !== '')) {

                                    $paramsPasien = [
                                        'nama'          => $dataIdentitas->nama,
                                        'kelamin'       => $dataIdentitas->kelamin,
                                        'tanggal_lahir' => $dataPasien->tanggal_lahir,
                                        'telp'          => $dataIdentitas->telp,
                                    ];

                                    $statusPasien = $this->antrian->checkPasien($paramsPasien);

                                    if ($statusPasien['status'] === false) {

                                        $dataPasienWA = [
                                            'tanggal_daftar' => $this->datetime,
                                            'no_identitas'   => $dataIdentitas->no_identitas,
                                            'nama'           => strtoupper(trim($dataIdentitas->nama)),
                                            'kelamin'        => $dataIdentitas->kelamin,
                                            'tempat_lahir'   => ($dataIdentitas->tempat_lahir !== null) ? $dataIdentitas->tempat_lahir : NULL,
                                            'tanggal_lahir'  => $dataIdentitas->tanggal_lahir,
                                            'alamat'         => $dataIdentitas->alamat,

                                            'nama_prop'      => ($dataIdentitas->nama_prop !== null) ? $dataIdentitas->nama_prop : NULL,

                                            'nama_kab'       => ($dataIdentitas->nama_kab !== null) ? $dataIdentitas->nama_kab : NULL,

                                            'nama_kec'       => ($dataIdentitas->nama_kec !== null) ? $dataIdentitas->nama_kec : NULL,

                                            'nama_kel'       => ($dataIdentitas->nama_kel !== null) ? $dataIdentitas->nama_kel : NULL,
                                            'agama'          => ($dataIdentitas->agama !== null) ? $dataIdentitas->agama : 'Lain-lain',
                                            'gol_darah'      => ($dataIdentitas->gol_darah !== null) ? $dataIdentitas->gol_darah : NULL,

                                            'telp'           => ($dataIdentitas->telp !== null) ? $dataIdentitas->telp : NULL,

                                            'status'         => 'Hidup',
                                            'no_rw'          => ($dataIdentitas->no_rw !== null) ? $dataIdentitas->no_rw : NULL,
                                            'no_rt'          => ($dataIdentitas->no_rt !== null) ? $dataIdentitas->no_rt : NULL,
                                        ];

                                        if (isset($dataIdentitas->no_prop)) {

                                            $dataPasienWA['no_prop'] = (int)$dataIdentitas->no_prop;
                                        }

                                        if (isset($dataIdentitas->no_kab)) {

                                            $dataPasienWA['no_kab'] = (int)$dataIdentitas->no_kab;
                                        }

                                        if (isset($dataIdentitas->no_kec)) {

                                            $dataPasienWA['no_kec'] = (int)$dataIdentitas->no_kec;
                                        }

                                        if (isset($dataIdentitas->no_kel)) {

                                            $dataPasienWA['no_kel'] = (int)$dataIdentitas->no_kel;
                                        }

                                        if (isset($dataIdentitas->id_pendidikan)) {

                                            $dataPasienWA['id_pendidikan'] = (int)$dataIdentitas->id_pendidikan;
                                        }

                                        if (isset($dataIdentitas->id_pekerjaan)) {

                                            $dataPasienWA['id_pekerjaan'] = (int)$dataIdentitas->id_pekerjaan;
                                        }

                                        if (isset($dataIdentitas->id_etnis)) {

                                            $dataPasienWA['id_etnis'] = (int)$dataIdentitas->id_etnis;
                                        }

                                        $getRM = $this->antrian->updateDataPasien($dataPasienWA);

                                        $no_rm = $getRM;
                                    } else {

                                        if ($statusrm === null) {

                                            return $statusPasien;
                                            die();
                                        } else if ($statusrm === '2') {

                                            $dataPasienWA = [
                                                'tanggal_daftar' => $this->datetime,
                                                'no_identitas'   => $dataIdentitas->no_identitas,
                                                'nama'           => strtoupper(trim($dataIdentitas->nama)),
                                                'kelamin'        => $dataIdentitas->kelamin,
                                                'tempat_lahir'   => ($dataIdentitas->tempat_lahir !== null) ? $dataIdentitas->tempat_lahir : NULL,
                                                'tanggal_lahir'  => $dataIdentitas->tanggal_lahir,
                                                'alamat'         => $dataIdentitas->alamat,

                                                'nama_prop'      => ($dataIdentitas->nama_prop !== null) ? $dataIdentitas->nama_prop : NULL,

                                                'nama_kab'       => ($dataIdentitas->nama_kab !== null) ? $dataIdentitas->nama_kab : NULL,

                                                'nama_kec'       => ($dataIdentitas->nama_kec !== null) ? $dataIdentitas->nama_kec : NULL,

                                                'nama_kel'       => ($dataIdentitas->nama_kel !== null) ? $dataIdentitas->nama_kel : NULL,
                                                'agama'          => ($dataIdentitas->agama !== null) ? $dataIdentitas->agama : 'Lain-lain',
                                                'gol_darah'      => ($dataIdentitas->gol_darah !== null) ? $dataIdentitas->gol_darah : NULL,

                                                'telp'           => ($dataIdentitas->telp !== null) ? $dataIdentitas->telp : NULL,

                                                'status'         => 'Hidup',
                                                'no_rw'          => ($dataIdentitas->no_rw !== null) ? $dataIdentitas->no_rw : NULL,
                                                'no_rt'          => ($dataIdentitas->no_rt !== null) ? $dataIdentitas->no_rt : NULL,
                                            ];

                                            if (isset($dataIdentitas->no_prop)) {

                                                $dataPasienWA['no_prop'] = (int)$dataIdentitas->no_prop;
                                            }

                                            if (isset($dataIdentitas->no_kab)) {

                                                $dataPasienWA['no_kab'] = (int)$dataIdentitas->no_kab;
                                            }

                                            if (isset($dataIdentitas->no_kec)) {

                                                $dataPasienWA['no_kec'] = (int)$dataIdentitas->no_kec;
                                            }

                                            if (isset($dataIdentitas->no_kel)) {

                                                $dataPasienWA['no_kel'] = (int)$dataIdentitas->no_kel;
                                            }

                                            if (isset($dataIdentitas->id_pendidikan)) {

                                                $dataPasienWA['id_pendidikan'] = (int)$dataIdentitas->id_pendidikan;
                                            }

                                            if (isset($dataIdentitas->id_pekerjaan)) {

                                                $dataPasienWA['id_pekerjaan'] = (int)$dataIdentitas->id_pekerjaan;
                                            }

                                            if (isset($dataIdentitas->id_etnis)) {

                                                $dataPasienWA['id_etnis'] = (int)$dataIdentitas->id_etnis;
                                            }

                                            $getRM = $this->antrian->updateDataPasien($dataPasienWA);

                                            $no_rm = $getRM;
                                        } else {

                                            $no_rm = $statusPasien['message']->id;
                                        }
                                    }
                                } else {

                                    return 'data';
                                    die();
                                }
                            } else {

                                return 'wa';
                                die();
                            }
                        }
                    } else {

                        return 'nik';
                        die();
                    }
                } else {

                    $no_rm = $id_pasien;
                }
            }

            if (isset($dataPasien->no_kab)) {
                $noKab = (int)$dataPasien->no_kab;

                if ($noKab === 71) {

                    $domisili = 1;
                } else {

                    $domisili = 2;
                }
            } else {

                $domisili = 2;
            }

            $idInstansiPerujuk = NULL;
            $nadisPerujuk = NULL;

            if ($dataPasien->no_kartu !== null) {

                $noPolish = $dataPasien->no_kartu;
            } else {

                if ($dataPasien->no_polish !== null) {

                    $noPolish = $dataPasien->no_polish;
                } else {

                    $noPolish = '';
                }
            }

            $sep = NULL;
            $noRujukan = NULL;

            if (isset($dataPasien->no_referensi)) {

                $noRujukan = $dataPasien->no_referensi;
            }

            if($dataPasien->kode_bpjs_poli === 'HDL'){

                $namaDaftarPoli = 'Hemodialisa';
                $jenisDaftarIGD = 'Hemodialisa';


            } else {

                $namaDaftarPoli = 'Poliklinik';
                $jenisDaftarIGD = NULL;

            }

            $data_pendaftaran = [
                'no_register'           => $this->pendaftaran->generateNoRegister(),
                'id_pasien'             => $no_rm,
                'tanggal_daftar'        => $this->datetime,
                'jenis_pendaftaran'     => $namaDaftarPoli,
                'jenis_igd'             => $jenisDaftarIGD,
                'jenis_rawat'           => 'Jalan',
                'domisili'              => $domisili,
                'id_instansi_perujuk'   => $idInstansiPerujuk,
                'nadis_perujuk'         => $nadisPerujuk,
                'id_penjamin'           => $penjamin,
                'no_polish'             => $noPolish,
                'no_sep'                => $sep,
                'no_rujukan'            => $noRujukan,
                'status'                => $this->pendaftaran->getStatusPasien($no_rm),
                'doa'                   => NULL,
                'id_users'              => (int)$this->session->userdata('id_translucent'),
                'pendaftaran_langsung'  => $langsung,
                'lunas'                 => 'Belum',
                'keterangan'            => 'Poliklinik ' . $klinik,
                'merge'                 => 0,
                'id_asal_masuk'         => 2,
                'keterangan_asal_masuk' => NULL,
                'kode_booking'          => $dataPasien->kode_booking,
            ];

            $terKlaim = 0;

            $caraBayar = NULL;

            if (isset($dataPasien->penjamin)) {

                if ($dataPasien->penjamin === 'BPJS' | $dataPasien->penjamin === 'Jaminan Kesehatan RSUD') {

                    $caraBayar = 'Asuransi';
                    $terKlaim = 0;
                } else if ($dataPasien->penjamin === 'Tunai') {

                    $caraBayar = 'Tunai';
                    $terKlaim = 1;
                }
            }

            //harus dibalikin..sudah
            // Insert Pendaftaran
            $id_pendaftaran = $this->pendaftaran->simpanDataPendaftaran($data_pendaftaran);

            date_default_timezone_set('Asia/Jakarta');

            $data_layanan_pendaftaran = [
                'id_pendaftaran'  => $id_pendaftaran,
                'tanggal_layanan' => $this->datetime,
                'id_unit_layanan' => (int)$id_spesialisasi,
                'id_dokter'       => (int)$dataPasien->id_dokter,
                'no_antrian'      => $this->pendaftaran->getNextNoAntrian(['id_unit' => $id_spesialisasi, 'tanggal' => date('Y-m-d')]),
                'jenis_layanan'   => $jenisLayanan,
                'kondisi'         => 'Hidup',
                'resusitasi'      => 0,
                'cara_bayar'      => $caraBayar,
                'id_penjamin'     => $penjamin,
                'no_polish'       => $noPolish,
                'no_sep'          => $sep,
                'terklaim'        => $terKlaim,
                'status_terlayani' => 'Belum',
                'id_users'        => (int)$this->session->userdata('id_translucent')
            ];

            $data_penjamin = [
                'id_pasien'   => $no_rm,
                'id_penjamin' => $penjamin,
                'no_polish'   => $noPolish
            ];

            //harus dibalikin..sudah

            // Insert Layanan Pendaftaran
            $id_layanan_pendaftaran = $this->pendaftaran->simpanDataLayananPendaftaran($data_layanan_pendaftaran);

            if ($id_layanan_pendaftaran != '' && $nosep !== null) :
                $update_lp = array(
                    'no_sep' => $nosep,
                    'id_users_sep' => $this->session->userdata('id_translucent')
                );

                $this->db->where('id', $id_layanan_pendaftaran)->update('sm_layanan_pendaftaran', $update_lp);

                // Update sm_rujukan
                $cek_rujukan = $this->db->where('no_rujukan', $noRujukan)->get('sm_rujukan')->row();
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
                    $this->db->where('no_rujukan', $noRujukan)->update('sm_rujukan', $update);
                    $id_rujukan = $cek_rujukan->id;
                else :
                    // Start tambahan wahyu
                    $this->load->model('vclaim_bpjs/Vclaim_v2_model', 'm_vclaim');
                    $dataRujukan = $this->m_vclaim->get_rujukan_rs($noRujukan);
                    
                    $kodePerujuk = $dataRujukan->response->rujukan->provPerujuk->kode ?? NULL;
                    $namaPerujuk = $dataRujukan->response->rujukan->provPerujuk->nama ?? NULL;
                    // End

                    // Insert rujukan
                    date_default_timezone_set('Asia/Jakarta');
                    $insert = [
                        'tanggal_terbit' => date('Y-m-d'),
                        'id_pasien' => $no_rm,
                        'no_rujukan' => $noRujukan,
                        'jenis' => 'asli',
                        // Start tambahan Wahyu
                        'id_pendaftaran' => $id_pendaftaran,
                        'kode_perujuk' => $kodePerujuk ?? NULL,
                        'nama_perujuk' => $namaPerujuk ?? NULL
                        // End
                    ];

                    $this->db->insert('sm_rujukan', $insert);
                    $id_rujukan = $this->db->insert_id();
                endif;

                // Insert mapping transaksi
                $lp = $this->db->select('lp.id_pendaftaran')->from('sm_layanan_pendaftaran as lp')->where('lp.id', $id_layanan_pendaftaran)->get()->row();
                if ($lp) :
                    $update_pendaftaran = [
                        'no_sep' => $nosep,
                        'id_rujukan' => $id_rujukan
                    ];

                    $this->db->where('id', $lp->id_pendaftaran)->update('sm_pendaftaran', $update_pendaftaran);

                endif;

            endif;

            if (!empty($dataPasien->kode_booking)) {

                $cekStatusTanggal = $this->antrian->cekStatusTanggal($idAntrian);

                date_default_timezone_set('Asia/Jakarta');

                $tanggalTask1 = (round(microtime(true) * 1000));
                $newEstimasi1 = date('Y-m-d H:i:s', $tanggalTask1 / 1000);
                $tanggalTask2 = $tanggalTask1 + 60000;
                $newEstimasi2 = date('Y-m-d H:i:s', $tanggalTask2 / 1000);
                $tanggalTask3 = $tanggalTask2 + 60000;
                $newEstimasi3 = date('Y-m-d H:i:s', $tanggalTask3 / 1000);

                if ($dataPasien->nik !== null) {

                    $nik = $dataPasien->nik;
                } else {

                    $nik = $dataPasien->nik_pasien;
                }

                if ($dataPasien->tanggal_lahir !== null) {

                    $tglLahir = $dataPasien->tanggal_lahir;
                } else {

                    $tglLahir = $dataPasien->tgllahir;
                }

                if ($dataPasien->no_hp !== null) {

                    $noHP = $dataPasien->no_hp;
                } else {

                    $noHP = $dataPasien->telp;
                }

                if ($penjamin !== '') {

                    $penjamin = $penjamin;

                    $noKa = null;
                    $noReferen = null;

                    if ($penjamin === 1) {

                        $noKa = $noPolish;
                        $noReferen = strtoupper($noRujukan);
                    }
                } else {

                    $noKa = null;
                    $noReferen = null;
                }

                $update = ["status" => 'Check In', "pasien_hadir" => 'Hadir', "waktu_hadir" => $newEstimasi1, "nik" => $nik, "tanggal_lahir" => $tglLahir, "no_kartu" => $noKa, "no_referensi" => $noReferen, "no_hp" => $noHP, "jenis_bayar" => $caraBayar, "jenis_penjamin" => $penjamin, "id_pendaftaran" => $id_pendaftaran, "no_rm" => $no_rm];

                $data = $this->db->where('id', $idAntrian)->update('sm_antrian_bpjs', $update);

                if ($data !== false) {

                    $this->load->model('pelayanan/Pelayanan_model', 'm_pelayanan');


                    if ($cekStatusTanggal->huruf_antrean !== 'D' && $cekStatusTanggal->huruf_antrean !== 'C') {

                        $kodeBookingBPJS = $dataPasien->kode_booking;

                        $getIDAntrian = $this->pendaftaran->getIdAntrean($dataPasien->kode_booking);

                        $idAntrian = (int)$getIDAntrian->id;

                        $taskSatu = $getIDAntrian->task_satu;
                        $taskDua = $getIDAntrian->task_dua;

                        //harus dibalikin..sudah

                        if ($taskSatu === null) {

                            $updateTaskSatu = ["task_satu" => $newEstimasi1];

                            $this->db->where('id', $idAntrian)->update('sm_antrian_bpjs', $updateTaskSatu);

                            $dataResponse = array(
                                "nomor_task"         => 1,
                                "waktu_task"        => $tanggalTask1,
                                "kode_booking"      => $kodeBookingBPJS,
                                "id_antrian"        => $idAntrian,
                                "konversi_waktu"    => $newEstimasi1,
                            );

                            $cekResponBPJS = $this->m_pelayanan->getResponseBPJS($kodeBookingBPJS, 1);

                            if (!isset($cekResponBPJS->id)) {

                                $this->db->insert('sm_update_task_bpjs', $dataResponse);
                            }
                        }

                        if ($taskDua === null) {

                            $updateTaskDua = ["task_dua" => $newEstimasi2];

                            $this->db->where('id', $idAntrian)->update('sm_antrian_bpjs', $updateTaskDua);

                            $dataResponse = array(
                                "nomor_task"         => 2,
                                "waktu_task"        => $tanggalTask2,
                                "kode_booking"      => $kodeBookingBPJS,
                                "id_antrian"        => $idAntrian,
                                "konversi_waktu"    => $newEstimasi2,
                            );

                            $cekResponBPJS = $this->m_pelayanan->getResponseBPJS($kodeBookingBPJS, 2);

                            if (!isset($cekResponBPJS->id)) {

                                $this->db->insert('sm_update_task_bpjs', $dataResponse);
                            }
                        }

                        $update = ["task_tiga" => $newEstimasi3];

                        //harus dibalikin..sudah

                        $this->db->where('id', $idAntrian)->update('sm_antrian_bpjs', $update);

                        $data_response = array(
                            "nomor_task"        => 3,
                            "waktu_task"        => $tanggalTask3,
                            "kode_booking"      => $kodeBookingBPJS,
                            "id_antrian"        => $idAntrian,
                            "konversi_waktu"    => $newEstimasi3,
                        );

                        $cek_respon_bpjs = $this->m_pelayanan->getResponseBPJS($kodeBookingBPJS, 3);

                        if (!isset($cek_respon_bpjs->id)) {

                            $this->db->insert('sm_update_task_bpjs', $data_response);
                        }
                    } else {

                        $kodeBookingBPJS = $dataPasien->kode_booking;

                        $getIDAntrian = $this->pendaftaran->getIdAntrean($dataPasien->kode_booking);

                        $idAntrian = (int)$getIDAntrian->id;

                        $taskSatu = $getIDAntrian->task_satu;
                        $taskDua = $getIDAntrian->task_dua;

                        //harus dibalikin..sudah

                        if ($taskSatu === null) {

                            $updateTaskSatu = ["task_satu" => $newEstimasi1];

                            $this->db->where('id', $idAntrian)->update('sm_antrian_bpjs', $updateTaskSatu);
                        }

                        if ($taskDua === null) {

                            $updateTaskDua = ["task_dua" => $newEstimasi2];

                            $this->db->where('id', $idAntrian)->update('sm_antrian_bpjs', $updateTaskDua);
                        }

                        $update = ["task_tiga" => $newEstimasi3];

                        //harus dibalikin..sudah

                        $this->db->where('id', $idAntrian)->update('sm_antrian_bpjs', $update);
                    }
                }
            }

            //harus dibalikin..sudah
            // Insert Tarif Pendaftaran
            if ($id_layanan_pendaftaran !== null) :
                $this->load->model('Masterdata_model', 'masterdata');
                $this->load->model('pelayanan/Pelayanan_model', 'pelayanan');
                $jenis_transaksi = 'Pendaftaran';

                //harus dibalikin..sudah

                if ($data_pendaftaran['jenis_pendaftaran'] === 'Poliklinik' && $jenisLayanan !== 'Medical Check Up') :
                    // Insert
                    $spesialiasi = $this->sp->getDataSpesialisasiById($id_spesialisasi);
                    if ($spesialiasi->id_tarif !== null) :
                        $tindakan = [
                            'operator' => array(($dataPasien->id_dokter !== '') ? (int)$dataPasien->id_dokter : NULL),
                            'tindakan' => array((int)$spesialiasi->id_tarif),
                            'qty'      => array(1)
                        ];

                        //harus dibalikin..sudah

                        $this->pelayanan->simpanTindakanPemeriksaan($id_layanan_pendaftaran, $tindakan, $jenis_transaksi);

                    endif;
                endif;
            endif;

            // simpan penjamin
            if ($penjamin !== null) :
                $this->pendaftaran->updatePenjaminPasien($data_penjamin);
            endif;

            // Update history SEP
            if ($sep !== '') :
                $sepHistory = [
                    'no_rm'   => $no_rm,
                    'dipakai' => '1',
                    'id_pendaftaran' => $id_pendaftaran
                ];

                $this->db->where('no_sep', strtoupper($sep))->update('sm_history_sep', $sepHistory);
            endif;

            // insert tracer
            $this->load->model('Tracer_model', 'tracer');
            $status_tracer = $this->tracer->insertTracer($id_layanan_pendaftaran);

            if ($dataPasien->penjamin === 'Tunai' | $dataPasien->lokasi_data === 'WA') {

                if ($id_pendaftaran !== null && $id_pendaftaran !== '') {

                    $decode = ["metaData" => ["code" => 200, "message" => 'Check in Berhasil']];

                    if ($this->db->trans_status() === FALSE) :
                        $this->db->trans_rollback();
                        $status = FALSE;
                    else :
                        $this->db->trans_commit();
                        $status = TRUE;
                    endif;

                    $this->response($decode, REST_Controller::HTTP_OK);

                    return 'tunai';
                } else {

                    $decode = ["metaData" => ["code" => 201, "message" => 'Check in Gagal']];

                    if ($this->db->trans_status() === FALSE) :
                        $this->db->trans_rollback();
                        $status = FALSE;
                    else :
                        $this->db->trans_commit();
                        $status = TRUE;
                    endif;

                    $this->response($decode, REST_Controller::HTTP_OK);

                    return 'gagal';
                }
            } else {

                $decode = ["metaData" => ["code" => 200, "message" => 'Check in Berhasil']];

                if ($this->db->trans_status() === FALSE) :
                    $this->db->trans_rollback();
                    $status = FALSE;
                else :
                    $this->db->trans_commit();
                    $status = TRUE;
                endif;

                $this->response($decode, REST_Controller::HTTP_OK);
            }
        } else {

            $decode = ["metaData" => ["code" => 201, "message" => 'No RM Pasien Belum Ada, Silakan ke Loket Pendaftaran']];

            if ($this->db->trans_status() === FALSE) :
                $this->db->trans_rollback();
                $status = FALSE;
            else :
                $this->db->trans_commit();
                $status = TRUE;
            endif;

            $this->response($decode, REST_Controller::HTTP_OK);
        }
    }

    function formatBulan($m)
    {
        switch ($m) {
            case '01':
                $bulan = 1;
                break;
            case '02':
                $bulan = 2;
                break;
            case '03':
                $bulan = 3;
                break;
            case '04':
                $bulan = 4;
                break;
            case '05':
                $bulan = 5;
                break;
            case '06':
                $bulan = 6;
                break;
            case '07':
                $bulan = 7;
                break;
            case '08':
                $bulan = 8;
                break;
            case '09':
                $bulan = 9;
                break;
            case '10':
                $bulan = 10;
                break;
            case '11':
                $bulan = 11;
                break;
            case '12':
                $bulan = 12;
                break;

            default:
                # code...
                break;
        }

        return $bulan;
    }

    function intBulan($m)
    {
        switch ($m) {
            case 1:
                $bulan = '01';
                break;
            case 2:
                $bulan = '02';
                break;
            case 3:
                $bulan = '03';
                break;
            case 4:
                $bulan = '04';
                break;
            case 5:
                $bulan = '05';
                break;
            case 6:
                $bulan = '06';
                break;
            case 7:
                $bulan = '07';
                break;
            case 8:
                $bulan = '08';
                break;
            case 9:
                $bulan = '09';
                break;
            case 10:
                $bulan = '10';
                break;
            case 11:
                $bulan = '11';
                break;
            case 12:
                $bulan = '12';
                break;

            default:
                # code...
                break;
        }

        return $bulan;
    }

    function cek_data_pasien_get()
    {
        $noRM = $this->get('no_rm');
        $data = $this->antrian->cekDataPasien($noRM);

        if ($data === null) {

            $decode = ["metaData" => ["code" => 201, "message" => 'Tidak ada Data Pasien untuk No. RM tersebut']];
        } else {

            $decode = ["metaData" => ["code" => 200, "data" => $data]];
        }

        $this->response($decode, REST_Controller::HTTP_OK);
    }

    function cek_no_rujukan_post()
    {
        $noRujuk = $this->post('norujuk');

        if ($noRujuk !== null) {

            $statusRujukan = $this->antrian->cekNomorRujukan($noRujuk);

            $kodeBooking = safe_post('kode');

            if ($statusRujukan === null | $statusRujukan === '') {

                $update = ["rujukan" => 'Baru'];

                $data = $this->db->where('kode_booking', $kodeBooking)->update('sm_antrian_bpjs', $update);

                $noRM = safe_post('rm');

                $dataRM = $this->antrian->cekDataPasien($noRM);

                if ($dataRM === null) {

                    $decode = ["metaData" => ["code" => 201, "message" => 'No. RM tidak ada, Status Rujukan Baru, silakan ke loket pendaftaran']];
                } else {

                    $decode = ["metaData" => ["code" => 200, "message" => 'Status Rujukan Baru']];
                }
            } else {

                $update = ["rujukan" => 'Kontrol'];

                $data = $this->db->where('kode_booking', $kodeBooking)->update('sm_antrian_bpjs', $update);

                $decode = ["metaData" => ["code" => 201, "message" => 'Status Rujukan Lama']];
            }
        }

        $this->response($decode, REST_Controller::HTTP_OK);
    }

    function cek_no_sep_post()
    {

        if (!$this->post('id_antrian')) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
        endif;

        $idAntrian = $this->post('id_antrian');
        $idPendaftaran = $this->post('id_pendaftaran');

        $getDataBooking = $this->antrian->checkId($idAntrian);

        $this->bpjs_vclaim2 = $this->antrian->getConfigVclaim2();

        $dataKartu = $getDataBooking->no_kartu;

        $noRM = $getDataBooking->no_rm;

        date_default_timezone_set('Asia/Jakarta');

        $tglAwal = date('Y-m-d', strtotime('-89 days', strtotime(date('Y-m-d'))));
        $tglAkhir = date('Y-m-d'); //safe_get('akhir');
        $xurl    = $this->bpjs_vclaim2->server . "/monitoring/HistoriPelayanan/NoKartu/" . $dataKartu . "/tglAwal/" . $tglAwal . "/tglAkhir/" . $tglAkhir;
        $xheader = $this->antrian->createHeader($this->bpjs_vclaim2);
        $xoutput = getCurl($xurl, $xheader);
        $xdecode = json_decode($xoutput);

        if ($xdecode === null | $xdecode === false) {
            $xdecode = ["metaData" => ["code" => $this->code, "message" => $this->message]];
            die(json_encode($xdecode));
        }

        $xData = $this->antrian->decryptResponseVclaim2($xdecode->response);


        if ($xData !== false && $xData !== null) {

            date_default_timezone_set('Asia/Jakarta');

            if ($xData->histori[0]->tglSep === date('Y-m-d')) {

                $nosep = strtoupper($xData->histori[0]->noSep);

                $cekHistorySep = $this->antrian->cekHistorySep($idPendaftaran);

                if ($cekHistorySep !== null) {


                    $insert_history = [
                        'no_sep' => $nosep,
                    ];

                    $this->db->where('id_pendaftaran', $idPendaftaran)->update('sm_history_sep', $insert_history);
                } else {

                    $insert_history = [
                        'id_pendaftaran' => $idPendaftaran,
                        'no_sep' => $nosep,
                        'no_rm' => $noRM,
                        'tanggal_sep' => $this->datetime
                    ];

                    $this->db->insert('sm_history_sep', $insert_history);
                }

                $updateAntrean = array(
                    'nosep' => $nosep,
                );

                $this->db->where('id', $idAntrian)->update('sm_antrian_bpjs', $updateAntrean);

                $decode = ["metaData" => ["code" => 200, "message" => 'Update SEP Berhasil']];
            } else {

                $decode = ["metaData" => ["code" => 201, "message" => 'Tidak ada Data SEP']];
            }
        } else {

            $decode = ["metaData" => ["code" => 201, "message" => 'Tidak ada Data SEP']];
        }

        $this->response($decode, REST_Controller::HTTP_OK);
    }

    function rujukan_kontrol_post()
    {
        $kodeBooking = safe_post('kode');

        $update = ["rujukan" => 'Kontrol'];

        $data = $this->db->where('kode_booking', $kodeBooking)->update('sm_antrian_bpjs', $update);

        $decode = ["metaData" => ["code" => 201, "message" => 'Status Rujukan Lama']];

        $this->response($decode, REST_Controller::HTTP_OK);
    }

    function get_sep_spesialisasi_get()
    {
        $id_spesialisasi = $this->get('id_spesialisasi');
        $id_dokter = $this->get('id_dokter');

        $data = $this->antrian->getSEPSpesialis($id_spesialisasi, $id_dokter);
        $this->response($data, REST_Controller::HTTP_OK);
    }

    function get_sep_antrian_get()
    {
        date_default_timezone_set('Asia/Jakarta');
        $data = array(
            'id_unit' => safe_get('id_unit'),
            'tanggal' => (safe_get('tanggal') !== '') ? date2mysql(safe_get('tanggal')) : date('Y-m-d'),
        );

        $no_antrian = $this->antrian->getNoAntrian($data);
        die(json_encode(array('no_antrian' => $no_antrian)));
    }

    // Tambahan wahyu
    public function batal_antrean_bpjs($req)
    {
        $url    = $this->antrean_config->server . "antrean/batal";
        $header = $this->m_antrian_bridging->createHeader($this->antrean_config);
        $output = postCurl($url, json_encode($req), $header);
        $decode = json_decode($output);

        return $decode;
    }

    public function cek_antrean_bpjs($kodebooking)
    {
        $kode_booking = $kodebooking;
        $url    = $this->antrean_config->server . "antrean/pendaftaran/kodebooking/{$kode_booking}";
        $header = $this->m_antrian_bridging->createHeader($this->antrean_config);
        $output = getCurl($url, $header);
        $decode = json_decode($output);
        if ($decode == NULL) {
            return FALSE;
        }
        $decode->response = $this->m_antrian_bridging->decryptResponse($decode->response, $this->antrean_config);

        // $this->response($decode, self::HTTP_OK);

        return $decode;
    }
    // end tambahan wahyu

    function batal_antrian_post()
    {
        $this->db->trans_begin();

        $this->load->model('pelayanan/Pelayanan_model', 'pelayanan');

        if (safe_post('waktu_batal') === '' | safe_post('kode_batal_booking') === '' | safe_post('id_batal') === '') :
            $response = array('status' => false, 'message' => 'Parameter tidak lengkap, silahkan hubungi bagian IT.');
            $this->response($response, REST_Controller::HTTP_OK);
        endif;

        $kode_booking = safe_post('kode_batal_booking');
        $tanggal_kunjungan_batal = safe_post('tanggal_kunjungan_batal');
        $kode_batal_dokter = safe_post('kode_batal_dokter');
        $keterangan = safe_post('keterangan_batal');
        $id_batal = safe_post('id_batal');

        $status_antrian = $this->antrian->cekStatusAntrian($id_batal);

        $statusDaftar = $status_antrian->task_empat;

        if ($status_antrian->status !== 'Batal') {

            if ($status_antrian->huruf_antrean === 'D') {

                date_default_timezone_set('Asia/Jakarta');
                $waktu_batal = (round(microtime(true) * 1000));
                $new_estimasi = date('Y-m-d H:i:s', $waktu_batal / 1000);

                $update = ["status" => 'Batal', "keterangan_batal" => $keterangan, "task_batal" => $new_estimasi];

                $data = $this->db->where('id', $id_batal)->update('sm_antrian_bpjs', $update);

                $decode = ["metaData" => ["code" => 200, "message" => 'Antrian Berhasil dibatalkan']];
            } else if ($status_antrian->huruf_antrean === 'C') {

                date_default_timezone_set('Asia/Jakarta');
                $waktu_batal = (round(microtime(true) * 1000));
                $new_estimasi = date('Y-m-d H:i:s', $waktu_batal / 1000);

                if ($kode_batal_dokter !== '' && $kode_batal_dokter !== null) {

                    $update = ["status" => 'Batal', "keterangan_batal" => $keterangan, "task_batal" => $new_estimasi];

                    $data = $this->db->where('id', $id_batal)->update('sm_antrian_bpjs', $update);

                    $cek_jadwal_dokter = $this->antrian->cekJadwalDokter($tanggal_kunjungan_batal, $kode_batal_dokter);
                    $this->m_booking->logKuota($cek_jadwal_dokter, '$cek_jadwal_dokter_1', 'antrian_bpjs', 'batal_antrian_post', $this->input->ip_address());

                    $idPoli = $cek_jadwal_dokter->id_poli;



                    // $id_jadwal_dokter = $cek_jadwal_dokter->id;
                    // $batal_dktr = (int)$cek_jadwal_dokter->jml_kunjung;
                    // $batal_knjng = $batal_dktr - 1;
                    // $batal_kj = ["jml_kunjung" => $batal_knjng];
                    // $batal_kunjungan = $this->antrian->batalKunjunganDokter($batal_kj, $id_jadwal_dokter);

                    $this->pelayanan->batalJadwalDokter($tanggal_kunjungan_batal, $idPoli, $kode_batal_dokter);

                    $decode = ["metaData" => ["code" => 200, "message" => 'Antrian Berhasil dibatalkan']];
                } else {

                    $update = ["status" => 'Batal', "keterangan_batal" => $keterangan, "task_batal" => $new_estimasi];

                    $data = $this->db->where('id', $id_batal)->update('sm_antrian_bpjs', $update);

                    $decode = ["metaData" => ["code" => 200, "message" => 'Antrian Berhasil dibatalkan']];
                }
            } else {

                if ($statusDaftar === null) {

                    date_default_timezone_set('Asia/Jakarta');
                    $waktu_batal = (round(microtime(true) * 1000));
                    $new_estimasi = date('Y-m-d H:i:s', $waktu_batal / 1000);

                    $req = ["kodebooking" => $kode_booking, "keterangan" => $keterangan];
                    $bridging_cek_antrian = $this->cek_antrean_bpjs($kode_booking);
                    $bridging_antrian = $this->batal_antrean_bpjs($req);

                    if (isset($bridging_antrian->metadata)) {

                        $code = $bridging_antrian->metadata->code;
                        $message = $bridging_antrian->metadata->message;
                        $status = $bridging_cek_antrian->response[0]->status;

                        if (($code !== 200) && ($code !== 201 || $status !== 'Batal')) {
                            $decode = ["metaData" => ["code" => $code, "message" => $message]];
                        } else {

                            $update = ["status" => 'Batal', "keterangan_batal" => $keterangan, "task_batal" => $new_estimasi];

                            $data = $this->db->where('id', $id_batal)->update('sm_antrian_bpjs', $update);

                            $data_response = array(
                                "nomor_task"        => 99,
                                "waktu_task"        => $waktu_batal,
                                "kode_booking"      => $kode_booking,
                                "id_antrian"        => $id_batal,
                                "konversi_waktu"    => $new_estimasi,
                                // Tambahan wahyu
                                "response"          => 200,
                                "keterangan_respon" => "Ok.",
                                "kirim_bpjs"        => "Sudah",
                                "respon_bpjs"       => $bridging_antrian->metadata->code,
                                "ket_bridging"      => $bridging_antrian->metadata->message,
                                // End
                                "keterangan"        => $keterangan
                            );

                            $this->db->insert('sm_update_task_bpjs', $data_response);

                            $cek_jadwal_dokter = $this->antrian->cekJadwalDokter($tanggal_kunjungan_batal, $kode_batal_dokter);
                            $this->m_booking->logKuota($cek_jadwal_dokter, '$cek_jadwal_dokter_2', 'antrian_bpjs', 'batal_antrian_post', $this->input->ip_address());

                            if (isset($cek_jadwal_dokter->id_poli)) {

                                $idPoli = $cek_jadwal_dokter->id_poli;

                                $this->pelayanan->batalJadwalDokter($tanggal_kunjungan_batal, $idPoli, $kode_batal_dokter);
                            }

                            $decode = ["metaData" => ["code" => 200, "message" => 'Antrian Berhasil dibatalkan']];
                        }
                    } else {

                        $decode = ["metaData" => ["code" => 201, "message" => $this->message]];
                    }
                } else {

                    $decode = ["metaData" => ["code" => 201, "message" => 'Status Pasien sudah dilayani, tidak dapat dibatalkan']];
                }
            }
        } else {

            $decode = ["metaData" => ["code" => 201, "message" => 'Status Pasien sudah dibatalkan']];
        }

        if ($this->db->trans_status() === false) :
            $this->db->trans_rollback();
            $decode['status'] = false;
            $decode['pesan'] = 'Batal Antrian Pasien Gagal';
        else :
            $this->db->trans_commit();
            $decode['status'] = true;
            $decode['pesan'] = 'Batal Antrian Pasien Berhasil';
        endif;

        $this->response($decode, REST_Controller::HTTP_OK);
    }
}
