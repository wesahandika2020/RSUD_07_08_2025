<?php

defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;
use function GuzzleHttp\json_decode;

/**
 * @package         CodeIgniter
 * @subpackage      Rest Server
 * @category        Controller
 * @author          Faiz Muhammad Syam
 * @license         Syams Corporation
 */
class Rekonsiliasi_obat extends REST_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->limit = 10;
        $this->load->model('Masterdata_model', 'masterdata');
        $this->load->model('Rekonsiliasi_obat_model', 'rekonsiliasi');
        
        $id_translucent = $this->session->userdata('id_translucent');
        if (empty($id_translucent)) :
            $this->response(array('error' => 'Anda belum login'), REST_Controller::HTTP_UNAUTHORIZED);
            exit();
        endif;
    }

    private function start($page)
    {
        return (((int)$page - 1) * (int)$this->limit);
    }

    function data_kunjungan_get()
    {

        if (!$this->get('page')) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST);
        endif;

        $search = [
            'keyword'       => safe_get('keyword'),
            'tgl_search'    => safe_get('tgl_search'),
            'jenis_rawat'   => safe_get('jenis')
        ];

        $limit = (int)$this->limit;
        $start = ((int)($this->get('page') - 1) * (int)$limit);
        $data = $this->rekonsiliasi->ambilDataKunjungan((int)$limit, (int)$start, $search);

        $data['page'] = (int)$this->get('page');
        $data['limit'] = (int)$limit;

        if ($data) :
            $this->response($data, REST_Controller::HTTP_OK);
        endif;
    }

    function rekon_form_get()
    {

        $idPendaftaran = $this->get('id_pendaftaran');
        $idLayanan     = $this->get('id_layanan');
        $noRm          = $this->get('no_rm');

        if (!$idPendaftaran && !$idLayanan && !$noRm) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST);
        endif;

        $this->load->model('pendaftaran/Pendaftaran_model', 'm_pendaftaran');
        $data = $this->m_pendaftaran->getPendaftaranDetail((int)$idPendaftaran, (int)$idLayanan);

        $search = [
            'tgl_awal'       => safe_get('tgl_rekon_awal'),
            'tgl_akhir'    => safe_get('tgl_rekon_akhir'),
        ];

        $data['resep'] = $this->rekonsiliasi->ambilDataResep((int)$idLayanan, $search);
        $data['apoteker'] = $this->rekonsiliasi->ambilUserApoteker((int)$idLayanan);
        $data['pernah_alergi'] = $this->rekonsiliasi->ambilDataPernahAlergi((int)$idPendaftaran);

        if ($data) :
            $this->response($data, REST_Controller::HTTP_OK); // (200)
        else :
            $this->response(array('error' => 'Data is Not Found'), REST_Controller::HTTP_NOT_FOUND);
        endif;
    }

    function simpan_rekonsiliasi_post() 
    {

        $statusRiwayat = $this->input->post('riwayat');

        $this->db->trans_begin();

        if($statusRiwayat !== null && $statusRiwayat !== ''){

            $idPendaftaranRekon = $this->input->post('id_pendaftaran_rekon');
        
            $dataPernahAlergi = $this->rekonsiliasi->ambilDataPernahAlergi((int)$idPendaftaranRekon);

            $rekonPernahAlergi = array(
                'pernah_alergi' => $statusRiwayat,
                'id_pendaftaran' => (int)$idPendaftaranRekon
            );

            if($dataPernahAlergi !== null){

                $idPernahAlergi = $dataPernahAlergi->id;

                $this->db->where('id', (int)$idPernahAlergi)->update('sm_rekonsiliasi_pernah_alergi', $rekonPernahAlergi);

            } else {

                $this->db->insert('sm_rekonsiliasi_pernah_alergi', $rekonPernahAlergi);

            }
        }

        if($this->input->post('no_length') !== '' && $this->input->post('no_length') !== null){

            $no = $this->input->post('no_length');

            $noLength = (int)$no;

            $alergiObat = $this->input->post('alergi_obat');
            $kriteriaAlergi = $this->input->post('kriteria_alergi');
            $reaksiAlergi = $this->input->post('reaksi_alergi');
            $idPendaftaran = $this->input->post('id_pendaftaran');

            for ($x = 0; (int)$x < (int)$noLength; (int)$x++){

                date_default_timezone_set('Asia/Jakarta');

                $dataAlergi = array(
                    'id_pendaftaran' => (int)$idPendaftaran[(int)$x],
                    'alergi_obat' => $alergiObat[(int)$x],
                    'kriteria_alergi' => $kriteriaAlergi[(int)$x],
                    'reaksi_alergi' => $reaksiAlergi[(int)$x],
                    'create_user' => $this->session->userdata("account"),
                    'tanggal_create' => date('Y-m-d H:i:s')

                );

                $this->db->insert('sm_rekonsiliasi_alergi', $dataAlergi);
                
            }

        }

        if($this->input->post('apoteker') !== '' && $this->input->post('apoteker') !== null){

            $apoteker = $this->input->post('apoteker');
            $idLayananRekon = $this->input->post('id_layanan_rekon');

            $rekonApoteker = array(
                'id_layanan_pendaftaran' => (int)$idLayananRekon,
                'id_apoteker' => (int)$apoteker
            );

            $dataApoteker = $this->rekonsiliasi->ambilUserApoteker((int)$idLayananRekon);

            if(isset($dataApoteker->id)){

                $idApoteker = $dataApoteker->id;

                $this->db->where('id', (int)$idApoteker)->update('sm_rekonsiliasi_user', $rekonApoteker);

            } else {

                $this->db->insert('sm_rekonsiliasi_user', $rekonApoteker);

            }

        }
        
        if($this->input->post('jml_rekon') !== null){

            $jml = $this->input->post('jml_rekon');

            $jmlRekon = (int)$jml;

            $countI = 0;

            for ($i = 0; (int)$i <= (int)$jmlRekon; (int)$i++){

                $statusResep = $this->input->post('status_resep'.$i);

                $idResepDetail = $this->input->post('id_resep_detail'.$i);
                $idResep = $this->input->post('id_resep'.$i);
                $idLayanan = $this->input->post('id_layanan_pendaftaran'.$i);
                $brpLama = $this->input->post('berapa_lama'.$i);
                $alasanMinum = $this->input->post('alasan_minum'.$i);
                $lanjutan = $this->input->post('lanjutan'.$i);

                date_default_timezone_set('Asia/Jakarta');

                $cekIdResepDetail = $this->rekonsiliasi->ambilResepRDetail((int)$idResepDetail);


                if($statusResep === '1'){

                    $tanggalResepLain = $this->input->post('tanggal_resep_lain'.$i);
                    $obatLain = $this->input->post('obat_lain'.$i);
                    $dosisLain = $this->input->post('dosis_lain'.$i);
                    $namaUser = $this->input->post('nama_user'.$i);

                    $countI = (int)$countI+1;

                    //buat validasi $tanggalResepLain, $obatLain, $namaUser

                    if($tanggalResepLain !== '' && $tanggalResepLain !== null){

                        if($obatLain === '' | $obatLain === null){

                            $decode = ["metaData" => ["code" => 201, "message" => 'Silakan isi Data Obat/Resep terlebih dahulu', 'x' => $i, 'param' => 'obat']];

                            if ($this->db->trans_status() === FALSE) :
                                $this->db->trans_rollback();
                                $status = FALSE;
                            else :
                                $this->db->trans_commit();
                                $status = TRUE;
                            endif;

                            die(json_encode($decode));

                            break;

                        }

                        if($dosisLain === '' | $dosisLain === null){

                            $decode = ["metaData" => ["code" => 201, "message" => 'Silakan isi Dosis terlebih dahulu', 'x' => $i, 'param' => 'dosis']];

                            if ($this->db->trans_status() === FALSE) :
                                $this->db->trans_rollback();
                                $status = FALSE;
                            else :
                                $this->db->trans_commit();
                                $status = TRUE;
                            endif;

                            die(json_encode($decode));

                            break;

                        }

                        $dataRekon = array(
                            'id_layanan_pendaftaran' => (int)$idLayanan,
                            'tanggal_resep_lain' => datetopg($tanggalResepLain),
                            'obat_lain' => $obatLain,
                            'dosis_lain' => $dosisLain,
                            'lama_pakai' => $brpLama,
                            'user_lain' => $namaUser,
                            'alasan_minum' => $alasanMinum,
                            'status_resep' => 1,
                            'lanjutan' => $lanjutan,
                            'create_user' => $this->session->userdata("account"),
                            'tanggal_create' => date('Y-m-d H:i:s')

                        );

                        if($idResepDetail !== null){

                            $this->db->where('id', (int)$idResepDetail)->update('sm_rekonsiliasi_obat', $dataRekon);

                        } else {

                            $this->db->insert('sm_rekonsiliasi_obat', $dataRekon);

                        }

                    }

                } else {

                    date_default_timezone_set('Asia/Jakarta');

                    $dataRekon = array(
                        'id_detail_resep' => (int)$idResepDetail,
                        'id_resep' => (int)$idResep,
                        'id_layanan_pendaftaran' => (int)$idLayanan,
                        'lama_pakai' => $brpLama,
                        'alasan_minum' => $alasanMinum,
                        'status_resep' => 0,
                        'lanjutan' => $lanjutan,
                        'create_user' => $this->session->userdata("account"),
                        'tanggal_create' => date('Y-m-d H:i:s')

                    );


                    if($cekIdResepDetail !== null){

                        $idDetailResep = $cekIdResepDetail->id;

                        $this->db->where('id', (int)$idDetailResep)->update('sm_rekonsiliasi_obat', $dataRekon);

                    } else {

                        $this->db->insert('sm_rekonsiliasi_obat', $dataRekon);

                    }

                }


            }

            $decode = ["metaData" => ["code" => 200, "message" => 'Data Rekonsiliasi berhasil Disimpan', 'x' => (int)$countI, 'param' => (int)$jmlRekon]];

            if ($this->db->trans_status() === FALSE) :
                $this->db->trans_rollback();
                $status = FALSE;
            else :
                $this->db->trans_commit();
                $status = TRUE;
            endif;

            die(json_encode($decode));

        }

        $decode = ["metaData" => ["code" => 200, "message" => 'Data Rekonsiliasi berhasil Disimpan']];
        if ($this->db->trans_status() === FALSE) :
            $this->db->trans_rollback();
            $status = FALSE;
        else :
            $this->db->trans_commit();
            $status = TRUE;
        endif;

        $this->response($decode, REST_Controller::HTTP_OK);

    }

    function hapus_riwayat_alergi_delete()
    {
        $id = $this->delete('id');

        $hapusRiwayat = $this->rekonsiliasi->hapusRiwayatAlergi((int)$id);

        if ($hapusRiwayat) :
            $response = array('status' => $hapusRiwayat, 'message' => 'Berhasil menghapus Riwayat Alergi!');
        else :
            $response = array('status' => $hapusRiwayat, 'message' => 'Gagal menghapus Riwayat Alergi!');
        endif;
        
        $this->response($response, REST_Controller::HTTP_OK);
    }

    function hapus_rekonsiliasi_delete()
    {
        $id = $this->delete('id');

        $hapusRekon = $this->rekonsiliasi->hapusRekonsiliasiObat((int)$id);

        if ($hapusRekon) :
            $response = array('status' => $hapusRekon, 'message' => 'Berhasil menghapus Rekonsiliasi Obat!');
        else :
            $response = array('status' => $hapusRekon, 'message' => 'Gagal menghapus Rekonsiliasi Obat!');
        endif;
        
        $this->response($response, REST_Controller::HTTP_OK);
    }

    function riwayat_alergi_get()
    {

        $idPendaftaran = $this->get('id');
        
        if (!$idPendaftaran) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST);
        endif;

        $data = $this->rekonsiliasi->getRiwayatAlergi((int)$idPendaftaran);

        if ($data) :
            $this->response($data, REST_Controller::HTTP_OK); // (200)
        endif;
    }

    
}
