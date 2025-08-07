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
class Pendaftaran_poli extends REST_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->limit = 10;
        $this->datetime = date('Y-m-d H:i:s');
        $this->load->model('Pendaftaran_poli_model', 'klinik');
        $this->load->model('pendaftaran/Pendaftaran_model', 'm_pendaftaran');

        $id_translucent = $this->session->userdata('id_translucent');
        if (empty($id_translucent)) :
            $this->response(array('error' => 'Anda belum login'), REST_Controller::HTTP_UNAUTHORIZED);
            exit();
        endif;
    }

    private function start($page)
    {
        return (($page - 1) * $this->limit);
    }

    function get_antrian_poli_get()
    {
        $data = array(
            'id_unit' => safe_get('id_unit'),
            'tanggal' => (safe_get('tanggal') !== '') ? date2mysql(safe_get('tanggal')) : date('Y-m-d'),
        );

        $no_antrian = $this->klinik->getNextNoAntrian($data);
        die(json_encode(array('no_antrian' => $no_antrian)));
    }

    function data_pasien_antrean_get()
    {
        if (!$this->get('id')) {
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST);
        }

        $noRM = $this->get('id');

        $data = $this->klinik->getDataPasienAntrean($noRM);

        if ($data) {
            $this->response($data, REST_Controller::HTTP_OK); // 200 being the HTTP response code
        } else {
            $this->response(array('error' => 'Tidak ada data'), REST_Controller::HTTP_BAD_REQUEST);
        }
    }



    function entri_antrian_post($tipe)
    {
        $this->db->trans_begin();
        $id_pendaftaran = safe_post('id_pendaftaran');
        if ($tipe == 'poliklinik') {
            $layanan = (safe_post('layanan_antri') != '') ? safe_post('layanan_antri') : NULL;
            $jenis_layanan = 'Poliklinik';
            $no_antrian = $this->klinik->getNextNoAntrian(array('id_unit' => safe_post('layanan_antri'), 'tanggal' => date('Y-m-d')));
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

        $id = $this->klinik->simpanDataLayananPendaftaran($data_layanan_pendaftaran);
        // Insert Tarif Pendaftaran
        if (($id !== null) & ($tipe == 'poliklinik')) :
            $this->load->model('spesialisasi/Spesialisasi_model', 'sp');
            $this->load->model('pelayanan/Pelayanan_model', 'pelayanan');
            $jenis_transaksi = 'Rawat Jalan';

            // Insert
            $spesialiasi = $this->sp->getDataSpesialisasiById($layanan);
            if ($spesialiasi->id_tarif !== null) :
                $tindakan = [
                    'operator' => array(''),
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

    function get_list_pendaftaran_poli_get()
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
            'cara_bayar'        => safe_get('cara_bayar'),
            'status_dilayani'   => safe_get('status_dilayani'),
            'user'              => safe_get('user'),
            'penjamin'          => safe_get('penjamin_search'),
            'shifpoli'          => safe_get('shifpoli'),
        ];

        $start = $this->start($this->get('page'));

        $data = $this->klinik->getListDataPendaftaranPoliklinik($this->limit, $start, $search);
        $data['page'] = (int) $this->get('page');
        $data['limit'] = $this->limit;

        if ($data) :
            $this->response($data, REST_Controller::HTTP_OK);
        endif;
    }

    function edit_klinik_post()
    {
        $dpjp = safe_post('dpjp');
        $id_unit_layanan = safe_post('layanan');
        $id_layanan_pendaftaran = safe_post('id_layanan_pendaftaran');

        if (($id_layanan_pendaftaran === '') & ($id_unit_layanan === '')) :
            $message = array('status' => false);
        else :
            $data = array(
                'tanggal' => date('Y-m-d'),
                'id_unit' => $id_unit_layanan
            );

            if ($id_unit_layanan === '44') {
                $update = array(
                    'tanggal_layanan'   => $this->datetime,
                    'id_unit_layanan'   => $id_unit_layanan,
                    'id_dokter'         => $dpjp,
                    'no_antrian'        => $this->klinik->getNextNoAntrian($data),
                    'jenis_layanan'     => 'Medical Check Up'
                );
            } else {
                $update = array(
                    'tanggal_layanan'   => $this->datetime,
                    'id_unit_layanan'   => $id_unit_layanan,
                    'id_dokter'         => $dpjp,
                    'no_antrian'        => $this->klinik->getNextNoAntrian($data),
                    'jenis_layanan'     => 'Poliklinik'
                );
            }

            $status = $this->klinik->simpanEditKlinik($id_layanan_pendaftaran, $update);
            $message = array('status' => $status, 'token' => $this->security->get_csrf_hash());
        endif;

        $this->response($message, REST_Controller::HTTP_OK);
    }

    function edit_no_rujukan_post()
    {
        $id_pendaftaran = safe_post('id_pendaftaran');
        $no_rujukan = safe_post('no_rujukan');

        if (($id_pendaftaran === '') & ($no_rujukan === '')) {
            $message = array('status' => false, 'token' => $this->security->get_csrf_hash());
        } else {
            $this->db->trans_begin();
            $update = array(
                'no_rujukan' => $no_rujukan
            );

            $this->db->where('id', $id_pendaftaran)->update('sm_pendaftaran', $update);
            $this->db->where('id_pendaftaran', $id_pendaftaran)->update('sm_layanan_pendaftaran', $update);


            if ($this->db->trans_status() === FALSE) {
                $this->db->trans_rollback();
                $status = FALSE;
            } else {
                $this->db->trans_commit();
                $status = TRUE;
            }

            $message = array('status' => $status, 'token' => $this->security->get_csrf_hash());
        }

        $message['no_rujukan'] = $no_rujukan;
        $this->response($message, REST_Controller::HTTP_OK);
    }

    function data_jenis_penjamin_get()
    {
        $id_penjamin = safe_get('id');

        $data = $this->klinik->dataJenisPenjamin($id_penjamin);

        $this->response($data, REST_Controller::HTTP_OK);
    }

    function get_dokter_spesialisasi_get()
    {
        $q         = safe_get('q');
        $id_dokter = safe_get('id_dokter');
        $page      = safe_get('page');
        $start     = $this->start($page);
        $data      = $this->klinik->getAutoDokterSpesialisasi($q, $id_dokter, $start, $this->limit);
        if ((safe_get('page') == 1) && ($q == '') && count($data) <= 0) :
            $pilih[]       = array(
                'nama'         => '-',
                'spesialisasi' => '-',
                'id'           => '',
                'kode_bpjs'    => ''
            );
            $data['data']  = array_merge($pilih, $data['data']);
            $data['total'] += 1;
        endif;
        $this->response($data, REST_Controller::HTTP_OK);
    }

    public function get_persetujuan_rawat_inap_get()
    {
        $data['data'] = $this->klinik->getSuratPersetujuanRawatInap($this->get('id'));

        if ($this->get('is_pasien') === 'ya') {
            $layananPendaftaran = $this->db->where('id', $this->get('id'))->get('sm_layanan_pendaftaran')->row();
            $data['data']  = $this->m_pendaftaran->getPendaftaranDetail($layananPendaftaran->id_pendaftaran);
        }
        $data['penanggung_jawab'] = $this->penanggung_jawab($this->get('id'));

        $this->response($data, REST_Controller::HTTP_OK);
    }

    private function penanggung_jawab($id)
    {
        return $this->db->select('p.nama_pjwb, p.telp_pjwb, p.alamat_pjwb, p.nik_pjwb, p.kelamin_pjwb, p.tgl_lahir_pjwb, p.hubungan_pjwb')
            ->from('sm_layanan_pendaftaran lp')
            ->join('sm_pendaftaran p', 'p.id = lp.id_pendaftaran')
            ->where('lp.id', $id)->get()->row();
    }

    function cetak_manual_surat_persetujuan_rawat_inap_post()
    {
        $checkData = $this->klinik->getSuratPersetujuanRawatInap(safe_post('id_layanan_pendaftaran'));

        $this->db->trans_begin();

        if ($checkData == null) {
            $data = array(
                'nama'                   => safe_post('nama') == '' ? null : safe_post('nama'),
                'tanggal_lahir'          => safe_post('tanggal_lahir') == '' ? null : safe_post('tanggal_lahir'),
                'jenis_kelamin'          => safe_post('jenis_kelamin') == '' ? null : safe_post('jenis_kelamin'),
                'identitas'              => safe_post('identitas') == '' ? null : safe_post('identitas'),
                'alamat'                 => safe_post('alamat') == '' ? null : safe_post('alamat'),
                'id_layanan_pendaftaran' => safe_post('id_layanan_pendaftaran') == '' ? null : safe_post('id_layanan_pendaftaran'),
                'hubungan_keluarga'      => safe_post('hubungan_keluarga') == '' ? null : safe_post('hubungan_keluarga'),
                'updated_at'             => $this->datetime,
                'created_at'             => $this->datetime,
                'id_user'                => $this->session->userdata('id_translucent'),
                'dirawat_di'             => safe_post('dirawat_id') == '' ? null : safe_post('dirawat_id'),
            );

            $this->db->insert('sm_form_persetujuan_rawat_inap', $data);
        } else {
            $data = array(
                'nama'              => safe_post('nama') == '' ? null : safe_post('nama'),
                'tanggal_lahir'     => safe_post('tanggal_lahir') == '' ? null : safe_post('tanggal_lahir'),
                'jenis_kelamin'     => safe_post('jenis_kelamin') == '' ? null : safe_post('jenis_kelamin'),
                'identitas'         => safe_post('identitas') == '' ? null : safe_post('identitas'),
                'alamat'            => safe_post('alamat') == '' ? null : safe_post('alamat'),
                'hubungan_keluarga' => safe_post('hubungan_keluarga') == '' ? null : safe_post('hubungan_keluarga'),
                'updated_at'        => $this->datetime,
                'id_user'           => $this->session->userdata('id_translucent'),
                'dirawat_di'        => safe_post('dirawat_id') == '' ? null : safe_post('dirawat_id'),
            );

            $this->db->where('id_layanan_pendaftaran', safe_post('id_layanan_pendaftaran'));
            $this->db->update('sm_form_persetujuan_rawat_inap', $data);
        }

        if ($this->db->trans_status() === FALSE) :
            $this->db->trans_rollback();
            $status  = FALSE;
            $message = 'Gagal simpan form persetujuan rawat inap';
        else :
            $this->db->trans_commit();
            $status  = TRUE;
            $message = 'Berhasil simpan form persetujuan rawat inap';
        endif;

        $this->response(array('status' => $status, 'message' => $message), REST_Controller::HTTP_OK);
    }

    function check_persetujuan_umum_get()
    {
        $data['data'] = $this->klinik->getPersetujuanUmumById($this->get('id'));
        $data['penanggung_jawab'] = $this->penanggung_jawab($this->get('id'));

        $this->response($data, REST_Controller::HTTP_OK);
    }

    function simpan_persetujuan_umum_post()
    {
        $checkData = $this->klinik->getPersetujuanUmumById(safe_post('id_layanan_pendaftaran'));

        $this->db->trans_begin();
        if ($checkData == NULL) {
            $data = array(
                'id_layanan_pendaftaran' => safe_post('id_layanan_pendaftaran'),
                'nama_keluarga'          => safe_post('nama_keluarga') == '' ? NULL : safe_post('nama_keluarga'),
                'tanggal_lahir'          => safe_post('tanggal_lahir') == '' ? NULL : date2mysql(safe_post('tanggal_lahir')),
                'jenis_kelamin'          => safe_post('jenis_kelamin') == '' ? NULL : safe_post('jenis_kelamin'),
                'alamat'                 => safe_post('alamat_form_rekam_medis') == '' ? NULL : safe_post('alamat_form_rekam_medis'),
                'hubungan_keluarga'      => safe_post('hubungan_keluarga') == '' ? NULL : safe_post('hubungan_keluarga'),
                'created_at'             => $this->datetime,
                'updated_at'             => $this->datetime,
                'is_pasien'              => safe_post('is_pasien') == 'ya' ? 1 : 0,
                'no_rt'                  => safe_post('no_rt') == '' ? NULL : safe_post('no_rt'),
                'no_rw'                  => safe_post('no_rw') == '' ? NULL : safe_post('no_rw'),
                'kelurahan'              => safe_post('kelurahan') == '' ? NULL : safe_post('kelurahan'),
                'kecamatan'              => safe_post('kecamatan') == '' ? NULL : safe_post('kecamatan'),
                'kota'                   => safe_post('kabupaten') == '' ? NULL : safe_post('kabupaten'),
                'provinsi'               => safe_post('provinsi') == '' ? NULL : safe_post('provinsi'),
                'no_identitas'           => safe_post('no_identitas') == '' ? NULL : safe_post('no_identitas'),
                'no_hp'                  => safe_post('no_hp') == '' ? NULL : safe_post('no_hp'),
                'id_user'                => $this->session->userdata('id_translucent'),
            );

            $this->db->insert('sm_form_persetujuan_umum', $data);
        } else {
            $data = array(
                'nama_keluarga'     => safe_post('nama_keluarga') == '' ? NULL : safe_post('nama_keluarga'),
                'tanggal_lahir'     => safe_post('tanggal_lahir') == '' ? NULL : date2mysql(safe_post('tanggal_lahir')),
                'jenis_kelamin'     => safe_post('jenis_kelamin') == '' ? NULL : safe_post('jenis_kelamin'),
                'alamat'            => safe_post('alamat_form_rekam_medis') == '' ? NULL : safe_post('alamat_form_rekam_medis'),
                'hubungan_keluarga' => safe_post('hubungan_keluarga') == '' ? NULL : safe_post('hubungan_keluarga'),
                'updated_at'        => $this->datetime,
                'is_pasien'         => safe_post('is_pasien') == 'ya' ? 1 : 0,
                'no_rt'             => safe_post('no_rt') == '' ? NULL : safe_post('no_rt'),
                'no_rw'             => safe_post('no_rw') == '' ? NULL : safe_post('no_rw'),
                'kelurahan'         => safe_post('kelurahan') == '' ? NULL : safe_post('kelurahan'),
                'kecamatan'         => safe_post('kecamatan') == '' ? NULL : safe_post('kecamatan'),
                'kota'              => safe_post('kabupaten') == '' ? NULL : safe_post('kabupaten'),
                'provinsi'          => safe_post('provinsi') == '' ? NULL : safe_post('provinsi'),
                'no_identitas'      => safe_post('no_identitas') == '' ? NULL : safe_post('no_identitas'),
                'no_hp'             => safe_post('no_hp') == '' ? NULL : safe_post('no_hp'),
                'id_user'           => $this->session->userdata('id_translucent'),
            );

            $this->db->where('id_layanan_pendaftaran', safe_post('id_layanan_pendaftaran'));
            $this->db->update('sm_form_persetujuan_umum', $data);
        }

        if ($this->db->trans_status() === FALSE) :
            $this->db->trans_rollback();
            $status  = FALSE;
            $message = 'Gagal simpan form persetujuan tindakan operasi';
        else :
            $this->db->trans_commit();
            $status  = TRUE;
            $message = 'Berhasil simpan form persetujuan tindakan operasi';
        endif;

        $this->response(array('status' => $status, 'message' => $message), REST_Controller::HTTP_OK);
    }

    public function check_ringkasan_riwayat_masuk_dan_keluar_get()
    {
        $data = [];
        $data = $this->klinik->getRingkasanRiwayatMasukDanKeluarById($this->get('id'));

        if ($data != NULL) {
            $this->response($data[0], REST_Controller::HTTP_OK);
        } else {
            $this->response($data, REST_Controller::HTTP_OK);
        }
    }

    public function simpan_ringkasan_riwayat_masuk_dan_keluar_post()
    {
        $checkData = $this->klinik->getRingkasanRiwayatMasukDanKeluarById(safe_post('id_layanan_pendaftaran'));

        $this->db->trans_begin();
        if ($checkData == NULL) {
            $data = array(
                'id_layanan_pendaftaran' => safe_post('id_layanan_pendaftaran'),
                'indikasi'               => safe_post('indikasi') == '' ? NULL : safe_post('indikasi'),
                'keterangan_khusus'      => safe_post('keterangan_khusus') == '' ? NULL : safe_post('keterangan_khusus'),
                'dpjp_utama_1'           => !isset(safe_post('dpjp_utama')[0]) ? NULL : safe_post('dpjp_utama')[0],
                'dpjp_utama_2'           => !isset(safe_post('dpjp_utama')[1]) ? NULL : safe_post('dpjp_utama')[1],
                'dpjp_utama_3'           => !isset(safe_post('dpjp_utama')[2]) ? NULL : safe_post('dpjp_utama')[2],
                'dpjp_utama_4'           => !isset(safe_post('dpjp_utama')[3]) ? NULL : safe_post('dpjp_utama')[3],
                'dpjp_tambahan_1'        => !isset(safe_post('dpjp_tambahan')[0]) ? NULL : safe_post('dpjp_tambahan')[0],
                'dpjp_tambahan_2'        => !isset(safe_post('dpjp_tambahan')[1]) ? NULL : safe_post('dpjp_tambahan')[1],
                'dpjp_tambahan_3'        => !isset(safe_post('dpjp_tambahan')[2]) ? NULL : safe_post('dpjp_tambahan')[2],
                'dpjp_tambahan_4'        => !isset(safe_post('dpjp_tambahan')[3]) ? NULL : safe_post('dpjp_tambahan')[3],
                'tgl_alih_rawat_1'       => !isset(safe_post('tgl_alih_rawat')[0]) ? NULL : date2mysql(safe_post('tgl_alih_rawat')[0]),
                'tgl_alih_rawat_2'       => !isset(safe_post('tgl_alih_rawat')[1]) ? NULL : date2mysql(safe_post('tgl_alih_rawat')[1]),
                'tgl_alih_rawat_3'       => !isset(safe_post('tgl_alih_rawat')[2]) ? NULL : date2mysql(safe_post('tgl_alih_rawat')[2]),
                'tgl_alih_rawat_4'       => !isset(safe_post('tgl_alih_rawat')[3]) ? NULL : date2mysql(safe_post('tgl_alih_rawat')[3]),
                'id_user'                => $this->session->userdata('id_translucent'),
                'created_at'             => $this->datetime,
                'updated_at'             => $this->datetime,
            );

            $this->db->insert('sm_form_ringkasan_riwayat_masuk_dan_keluar', $data);
        } else {
            $data = array(
                'indikasi'          => safe_post('indikasi') == '' ? NULL : safe_post('indikasi'),
                'keterangan_khusus' => safe_post('keterangan_khusus') == '' ? NULL : safe_post('keterangan_khusus'),
                'dpjp_utama_1'      => !isset(safe_post('dpjp_utama')[0]) ? NULL : safe_post('dpjp_utama')[0],
                'dpjp_utama_2'      => !isset(safe_post('dpjp_utama')[1]) ? NULL : safe_post('dpjp_utama')[1],
                'dpjp_utama_3'      => !isset(safe_post('dpjp_utama')[2]) ? NULL : safe_post('dpjp_utama')[2],
                'dpjp_utama_4'      => !isset(safe_post('dpjp_utama')[3]) ? NULL : safe_post('dpjp_utama')[3],
                'dpjp_tambahan_1'   => !isset(safe_post('dpjp_tambahan')[0]) ? NULL : safe_post('dpjp_tambahan')[0],
                'dpjp_tambahan_2'   => !isset(safe_post('dpjp_tambahan')[1]) ? NULL : safe_post('dpjp_tambahan')[1],
                'dpjp_tambahan_3'   => !isset(safe_post('dpjp_tambahan')[2]) ? NULL : safe_post('dpjp_tambahan')[2],
                'dpjp_tambahan_4'   => !isset(safe_post('dpjp_tambahan')[3]) ? NULL : safe_post('dpjp_tambahan')[3],
                'tgl_alih_rawat_1'  => !isset(safe_post('tgl_alih_rawat')[0]) ? NULL : date2mysql(safe_post('tgl_alih_rawat')[0]),
                'tgl_alih_rawat_2'  => !isset(safe_post('tgl_alih_rawat')[1]) ? NULL : date2mysql(safe_post('tgl_alih_rawat')[1]),
                'tgl_alih_rawat_3'  => !isset(safe_post('tgl_alih_rawat')[2]) ? NULL : date2mysql(safe_post('tgl_alih_rawat')[2]),
                'tgl_alih_rawat_4'  => !isset(safe_post('tgl_alih_rawat')[3]) ? NULL : date2mysql(safe_post('tgl_alih_rawat')[3]),
                'id_user'           => $this->session->userdata('id_translucent'),
                'updated_at'        => $this->datetime,
            );

            $this->db->where('id_layanan_pendaftaran', safe_post('id_layanan_pendaftaran'));
            $this->db->update('sm_form_ringkasan_riwayat_masuk_dan_keluar', $data);
        }

        if ($this->db->trans_status() === FALSE) :
            $this->db->trans_rollback();
            $status  = FALSE;
            $message = 'Gagal simpan form ringkasan riwayat masuk dan keluar';
        else :
            $this->db->trans_commit();
            $status  = TRUE;
            $message = 'Berhasil simpan form ringkasan riwayat masuk dan keluar';
        endif;

        $this->response(array('status' => $status, 'message' => $message), REST_Controller::HTTP_OK);
    }

    function check_tata_tertib_get()
    {
        $data['data'] = $this->klinik->getTataTertibById($this->get('id'));
        $data['penanggung_jawab'] = $this->penanggung_jawab($this->get('id'));

        $this->response($data, REST_Controller::HTTP_OK);
    }

    public function get_edukasi_pasien_get()
    {
        $data = $this->m_pendaftaran->getPendaftaranDetail($this->get('id', true), $this->get('id_layanan', true));
        $data['edukasi'] = $this->klinik->getEdukasi($this->get('id'));
        $this->response($data);
    }
	
	function edit_data_rujukan_post()
    {
        $id_pendaftaran = safe_post('id_pendaftaran');
        $no_rujukan = safe_post('no_rujukan');

        if (($id_pendaftaran === '') & ($no_rujukan === '')) {
            $message = array('status' => false, 'token' => $this->security->get_csrf_hash());
        } else {
            $this->db->trans_begin();
            $update = array(
                'no_rujukan' => $no_rujukan
            );

            $this->db->where('id', $id_pendaftaran)->update('sm_pendaftaran', $update);
            $this->db->where('id_pendaftaran', $id_pendaftaran)->update('sm_layanan_pendaftaran', $update);


            if ($this->db->trans_status() === FALSE) {
                $this->db->trans_rollback();
                $status = FALSE;
            } else {
                $this->db->trans_commit();
                $status = TRUE;
            }

            $message = array('status' => $status, 'token' => $this->security->get_csrf_hash());
        }

        $message['no_rujukan'] = $no_rujukan;
        $this->response($message, REST_Controller::HTTP_OK);
    }

    function edit_norujukan_bridging_get()
    {
        $data = [
            'no_rujukan' => safe_get('no_rujukan'),
            'id_pendaftaran' => safe_get('id_pendaftaran'),
            'asal_faskes' => safe_get('asal_faskes'),
            'asal_faskes' => safe_get('asal_faskes'),
            'kadaluarsa_rujukan' => safe_get('tgl_rujukan_exp'),
            'kode_bpjs_poli_rujukan' => safe_get('kode_poli_rujukan'),
        ];            
        
        $this->load->model('logs/Logs_model', 'logs');
        $id = $this->logs->updateNoRujukanBridging($data);

        $message = [
            'id'     => $id,
            'status' => true,
            'token'  => $this->security->get_csrf_hash()
        ];
        $this->set_response($message, REST_Controller::HTTP_CREATED);
    }
}
