<?php

defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH.'/libraries/REST_Controller.php';
// require_once 'vendor/autoload.php';

use Restserver\Libraries\REST_Controller;

use function GuzzleHttp\json_decode;

/**
 * @package         CodeIgniter
 * @subpackage      Rest Server
 * @category        Controller
 * @author          Faiz Muhammad Syam
 * @license         Syams Corporation
 */
class Satu_sehat extends REST_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->batas = 10;
        $this->limit = 20;
        date_default_timezone_set('Asia/Jakarta');
        $this->datetime = date('Y-m-d H:i:s');
        $this->load->model('App_model', 'm_default');
        $this->load->model('Satu_sehat_model', 'sehat');
        
        //dev
        $this->satu_sehat = $this->sehat->getConfigSatuSehat();


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

    private function mulai($page)
    {
        return (($page - 1) * $this->batas);
    }

    function simpan_organisasi_post()
    {
        $id_parent = safe_post('id_induk');

        if ($id_parent !== '') :
            // generate child
            $kode = $this->sehat->organisasiCode('sm_organisasi', $id_parent, 6);
        else :
            // generate parent
            $kode = $this->sehat->execIndukCode('sm_organisasi');
            $id_parent = NULL;
        endif;

        if ($this->get('id')) :
            $data = [
                'id'     => $this->get('id'),
                'nama'   => safe_post('nama_organisasi'),
            ];
            
            $id = $this->sehat->perbaruiDataOrganisasi($data);
            $message = [
                'id'     => $id,
                'status' => true,
                'token'  => $this->security->get_csrf_hash()
            ];
            $this->set_response($message, REST_Controller::HTTP_CREATED);
        else :
            
            $data = [
                'nama' => safe_post('nama_organisasi'),
                'id_parent' => $id_parent,
                'status' => 1,
                'kode' => $kode,
                'id_organisasi' => (safe_post('id_induk_organisasi') !== '') ? safe_post('id_induk_organisasi') : NULL,
            ];
            $id = $this->sehat->simpanDataOrganisasi($data);
            
            $message = [
                'id'     => $id,
                'status' => true,
                'token'  => $this->security->get_csrf_hash()
            ];
            $this->set_response($message, REST_Controller::HTTP_CREATED);

        endif;
    }

    function simpan_lokasi_post()
    {
        $this->db->trans_begin();

        $idParent = safe_post('id_lokasi');

        if(safe_post('id_induk_organisasi') === null | safe_post('id_induk_organisasi') === ''){

            $decode = ["metaData" => ["code" => 201,"message" => 'Induk Organisasi Belum dipilih']];

            die(json_encode($decode));

        }

        if(safe_post('id_induk') === null | safe_post('id_induk') === ''){

            $decode = ["metaData" => ["code" => 201,"message" => 'Sub Induk Organisasi Belum dipilih']];

            die(json_encode($decode));

        }

        if(safe_post('nama_lokasi') === null | safe_post('nama_lokasi') === ''){

            $decode = ["metaData" => ["code" => 201,"message" => 'Nama Lokasi Belum diisi']];

            die(json_encode($decode));

        }

        if ($idParent !== '') :
            // generate child
            $kode = $this->sehat->organisasiCode('sm_lokasi', $idParent, 6);
        else :
            // generate parent
            $kode = $this->sehat->execIndukCode('sm_lokasi');
            $idParent = NULL;
        endif;
        
        $data = [
            'nama' => safe_post('nama_lokasi'),
            'id_parent' => $idParent,
            'status' => 1,
            'kode' => $kode,
            'id_organisasi' => (int)safe_post('id_induk'),
            'id_konfigurasi' => (int)safe_post('id_induk_organisasi'),
        ];

        $id = $this->sehat->simpanDataLokasi($data);

        if($id !== null){

            if (safe_post('tipe_fisik') !== '' && safe_post('tipe_fisik') !== null){
                // generate child
                $kodeFisik = (int)safe_post('tipe_fisik');

                $dataLokasi = [
                    'id'     => $id,
                    'kode_fisik'   => $kodeFisik
                ];

                $this->sehat->perbaruiDataLokasi($dataLokasi);

            }

            if (safe_post('kategori') !== '' && safe_post('kategori') !== null){
                // generate child
                $kategori = safe_post('kategori');
                $lokasiSistem = (int)safe_post('lokasi_sistem');

                $dataLokasi = [
                    'id'     => $id,
                    'nama_tabel'   => $kategori,
                    'id_penghubung'   => $lokasiSistem
                ];

                $this->sehat->perbaruiDataLokasi($dataLokasi);

                if((int)$kategori === 1){

                    $update = ["id_lokasi" => (int)$id];

                    $data = $this->db->where('id', (int)$lokasiSistem)->update('sm_spesialisasi', $update);

                }

            }

            
            

            $decode = ["metaData" => ["code" => 200,"message" => 'Simpan Lokasi Berhasil']];

        } else {

            $decode = ["metaData" => ["code" => 200,"message" => 'Simpan Lokasi Gagal']];

        }

        if ($this->db->trans_status() === false) :
            $this->db->trans_rollback();
            $status = false;
            $pesan = 'Simpan Lokasi Gagal';
        else :
            $this->db->trans_commit();
            $status = true;
            $pesan = 'Simpan Lokasi Berhasil';
        endif;

        $this->response($decode, REST_Controller::HTTP_OK);

        
    }

    function integrasi_lokasi_post()
    {

        $this->db->trans_begin();

        $idLokasi = (int)$this->post('id');

        $dataLok = $this->sehat->cekDataLokasi($idLokasi);

        if($dataLok->id_organisasi !== '' &&  $dataLok->id_organisasi !== null){

            $dataOrganisasi = $this->sehat->dataOrganisasi((int)$dataLok->id_organisasi);

            if($dataOrganisasi->integrasi_baru !== null && $dataOrganisasi->integrasi_baru !== ''){

                    $intOrganisasi = $dataOrganisasi->integrasi_baru;

            } else {

                $decode = ["metaData" => ["code" => 201,"message" => 'Silakan Integrasikan data organisasi ke satu sehat terlebih dahulu']];

                die(json_encode($decode));

            }

        } else {

            $decode = ["metaData" => ["code" => 201,"message" => 'Induk Organisasi Tidak Ada di database']];

            die(json_encode($decode));

        }

        if($dataLok->kode_fisik !== null && $dataLok->kode_fisik !== ''){

            $kodeFisik = $this->sehat->kodeFisik((int)$dataLok->kode_fisik);

            $code = $kodeFisik->code;

            $display = $kodeFisik->display;

        } else {

            $decode = ["metaData" => ["code" => 201,"message" => 'Silakan Update Kembali Kode Fisik Lokasi Anda']];

            die(json_encode($decode));

        }

        $params=array(
                "resourceType"  => "Location",
                "status"        => "active",
                "name"          => $dataLok->nama,
                "physicalType" => array(
                    "coding" => [
                        array(
                        "system" => "http://terminology.hl7.org/CodeSystem/location-physical-type",
                        "code" => $code,
                        "display" => $display
                        )
                    ]
                ),
                "managingOrganization" => array(
                    "reference" => "Organization/".$intOrganisasi
                )
        );

        if($dataLok->id_parent !== null && $dataLok->id_parent !== ''){

            if($dataLok->integrasi_induk !== null && $dataLok->integrasi_induk !== ''){

                $params["partOf"]["reference"] = "Location/".$dataLok->integrasi_induk;

            } else {

                $decode = ["metaData" => ["code" => 201,"message" => 'Silakan Integrasikan data Induk Lokasi ke satu sehat terlebih dahulu']];

                die(json_encode($decode));

            }

        }

        $idUser = $this->session->userdata('id_translucent');

        $getID = $this->sehat->aksesSatuSehat($idUser);

        $tokenBearer = $getID->token;

        $url = $this->satu_sehat->apiurl."Location";

        $header = $this->sehat->authBearer($tokenBearer);

        $dataApi = json_encode($params);

        $output = $this->sehat->postEncounter($url, $dataApi, $header);

        if($output['respon'] === 201){

            $result = json_decode($output['result']);

            $update = ["status" => 1,"integrasi_baru" => $result->id];

            $data = $this->db->where('id', $idLokasi)->update('sm_lokasi', $update);

            $decode = ["metaData" => ["code" => 200,"message" => 'Integrasi Lokasi Berhasil']];

        } else {

            $result = json_decode($output['result']);
            $issued = $result->issue;
            $diagNostic = $issued[0]->diagnostics;
            $details = $issued[0]->details;
            $decode = ["metaData" => ["code" => 202,"message" => $details->text.', '.$diagNostic[0]]];

        }

        if ($this->db->trans_status() === false) :
            $this->db->trans_rollback();
            $status = false;
            $pesan = 'Integrasi Lokasi Gagal';
        else :
            $this->db->trans_commit();
            $status = true;
            $pesan = 'Integrasi Lokasi Berhasil';
        endif;

        $this->response($decode, REST_Controller::HTTP_OK);

    }

    function update_integrasi_lokasi_put()
    {

        $this->db->trans_begin();

        $idLokasi = (int)$this->put('id');
        
        $dataLok = $this->sehat->cekDataLokasi($idLokasi);

        $statusAktif = $dataLok->status;

        if($statusAktif === '1'){

            $active = 'active';
        
        } else {

            $active = 'inactive';    

        }

        $idIntegrasi = $dataLok->integrasi_baru;

        $idUser = $this->session->userdata('id_translucent');

        $getID = $this->sehat->aksesSatuSehat($idUser);

        $tokenBearer = $getID->token;

        $idParams = $dataLok->integrasi_baru;

        $url = $this->satu_sehat->apiurl."Location/".$idParams;

        $header = $this->sehat->authBearer($tokenBearer);

        if($dataLok->id_organisasi !== '' &&  $dataLok->id_organisasi !== null){

            $dataOrganisasi = $this->sehat->dataOrganisasi((int)$dataLok->id_organisasi);

            if($dataOrganisasi->integrasi_baru !== null && $dataOrganisasi->integrasi_baru !== ''){

                    $intOrganisasi = $dataOrganisasi->integrasi_baru;

            } else {

                $decode = ["metaData" => ["code" => 201,"message" => 'Silakan Integrasikan data organisasi ke satu sehat terlebih dahulu']];

                die(json_encode($decode));

            }

        } else {

            $decode = ["metaData" => ["code" => 201,"message" => 'Induk Organisasi Tidak Ada di database']];

            die(json_encode($decode));

        }

        if($dataLok->kode_fisik !== null && $dataLok->kode_fisik !== ''){

            $kodeFisik = $this->sehat->kodeFisik((int)$dataLok->kode_fisik);

            $code = $kodeFisik->code;

            $display = $kodeFisik->display;

        } else {

            $decode = ["metaData" => ["code" => 201,"message" => 'Silakan Update Kembali Kode Fisik Lokasi Anda']];

            die(json_encode($decode));

        }

        $params=array(
                "resourceType"  => "Location",
                "id"            => $idIntegrasi,
                "status"        => $active,
                "name"          => $dataLok->nama,
                "physicalType" => array(
                    "coding" => [
                        array(
                        "system" => "http://terminology.hl7.org/CodeSystem/location-physical-type",
                        "code" => $code,
                        "display" => $display
                        )
                    ]
                ),
                "managingOrganization" => array(
                    "reference" => "Organization/".$intOrganisasi
                )
        );

        if($dataLok->id_parent !== null && $dataLok->id_parent !== ''){

            if($dataLok->integrasi_induk !== null && $dataLok->integrasi_induk !== ''){

                $params["partOf"]["reference"] = "Location/".$dataLok->integrasi_induk;

            } else {

                $decode = ["metaData" => ["code" => 201,"message" => 'Silakan Integrasikan data Induk Lokasi ke satu sehat terlebih dahulu']];

                die(json_encode($decode));

            }

        }

        $data_api = json_encode($params);

        $output = $this->sehat->putEncounter($url, $data_api, $header);

        if($output['respon'] === 200){

            $result = json_decode($output['result']);

            $update = ["integrasi_ulang" => '0'];

            $data = $this->db->where('id', $idLokasi)->update('sm_lokasi', $update);

            $decode = ["metaData" => ["code" => 200,"message" => 'Update Integrasi Lokasi Berhasil']];

        } else {

            $result = json_decode($output['result']);
            $issued = $result->issue;
            $diagNostic = $issued[0]->expression;
            $details = $issued[0]->details;
            $decode = ["metaData" => ["code" => 202,"message" => $details->text.', '.$diagNostic[0]]];

        }

        if ($this->db->trans_status() === false) :
            $this->db->trans_rollback();
            $status = false;
            $pesan = 'Update Integrasi Lokasi Gagal';
        else :
            $this->db->trans_commit();
            $status = true;
            $pesan = 'Update Integrasi Lokasi Berhasil';
        endif;

        $this->response($decode, REST_Controller::HTTP_OK);
    }

    function hapus_lokasi_delete()
    {

        $idLokasi = (int)$this->delete('id');

        $dataLok = $this->sehat->cekDataLokasi($idLokasi);

        $idIntegrasi = $dataLok->integrasi_baru;

        if(empty($idIntegrasi)){

            $dataParent = $this->sehat->cekParentLokasi($idLokasi);

            $countParent = count($dataParent);

            if($countParent > 0){

                $decode = ["metaData" => ["code" => 202,"message" => 'Silakan hapus Sub Organisasi terlebih dahulu']];

            } else {

                $id = $this->db->where('id', $idLokasi)->delete('sm_lokasi');

                $decode = ["metaData" => ["code" => 200,"message" => 'Data Lokasi berhasil dihapus']];

            }

        } else {

            $decode = ["metaData" => ["code" => 202,"message" => 'Data Sudah Terintegrasi, tidak bisa dihapus, silakan dinonaktifkan']];

        }
        
        $this->response($decode, REST_Controller::HTTP_OK);
    }

    function integrasi_organisasi_post()
    {

        $this->db->trans_begin();

        $idOrganisasi = (int)$this->post('id');

        $dataOrg = $this->sehat->cekDataOrganisasi($idOrganisasi);

        if(empty($dataOrg->id_parent)){

            $idOrganization = (int)$dataOrg->kode_organisasi;    

        } else {

            $idParent = (int)$dataOrg->id_parent;

            $dataParent = $this->sehat->cekDataOrganisasi($idParent);

            if(empty($dataParent->integrasi_baru)){

                $idOrganization = null;

            } else {

                $idOrganization = $dataParent->integrasi_baru;

            }
            
        }

        $idUser = $this->session->userdata('id_translucent');

        $getID = $this->sehat->aksesSatuSehat($idUser);

        $tokenBearer = $getID->token;

        $url = $this->satu_sehat->apiurl."Organization";

        $header = $this->sehat->authBearer($tokenBearer);

        if($idOrganization === null){

            $decode = ["metaData" => ["code" => 202,"message" => 'Silakan Integrasikan '.$dataParent->nama.' terlebih dahulu']];


        } else {

            $params=array(
                    "resourceType"  => "Organization",
                    "active"        => true,
                    "type"          => [array(

                                        "coding" => [array(

                                                "system"    => "http://terminology.hl7.org/CodeSystem/organization-type",
                                                "code"      => "dept",
                                                "display"   => "Hospital Department"

                                        )]

                    )],
                    "name"          => $dataOrg->nama,
                    "partOf"=> array(
                        "reference"=> "Organization/".$idOrganization
                    )
            );

            $data_api = json_encode($params);

            $output = $this->sehat->postEncounter($url, $data_api, $header);

            if($output['respon'] === 201){

                $result = json_decode($output['result']);

                $update = ["status" => 1,"integrasi_baru" => $result->id];

                $data = $this->db->where('id', $idOrganisasi)->update('sm_organisasi', $update);

                $decode = ["metaData" => ["code" => 200,"message" => 'Integrasi Organisasi Berhasil']];

            } else {

                $result = json_decode($output['result']);
                $issued = $result->issue;
                $diagNostic = $issued[0]->diagnostics;
                $details = $issued[0]->details;
                $decode = ["metaData" => ["code" => 202,"message" => $details->text.', '.$diagNostic[0]]];

            }

        }

        if ($this->db->trans_status() === false) :
            $this->db->trans_rollback();
            $status = false;
            $pesan = 'Integrasi Organisasi Gagal';
        else :
            $this->db->trans_commit();
            $status = true;
            $pesan = 'Integrasi Organisasi Berhasil';
        endif;

        $this->response($decode, REST_Controller::HTTP_OK);


    }

    function update_integrasi_organisasi_put()
    {

        $this->db->trans_begin();

        $idOrganisasi = (int)$this->put('id');
        
        $dataOrg = $this->sehat->cekDataOrganisasi($idOrganisasi);

        $statusAktif = $dataOrg->status;

        if($statusAktif === '1'){

            $active = true;
        
        } else {

            $active = false;    

        }

        $idIntegrasi = $dataOrg->integrasi_baru;

        if(empty($dataOrg->id_parent)){

            $idOrganization = (int)$dataOrg->kode_organisasi;    

        } else {

            $idParent = (int)$dataOrg->id_parent;

            $dataParent = $this->sehat->cekDataOrganisasi($idParent);

            if(empty($dataParent->integrasi_baru)){

                $idOrganization = null;

            } else {

                $idOrganization = $dataParent->integrasi_baru;

            }
            
        }

        $idUser = $this->session->userdata('id_translucent');

        $getID = $this->sehat->aksesSatuSehat($idUser);

        $tokenBearer = $getID->token;

        $idParams = $dataOrg->integrasi_baru;

        $url = $this->satu_sehat->apiurl."Organization/".$idParams;

        $header = $this->sehat->authBearer($tokenBearer);

        $params=array(
                "resourceType"  => "Organization",
                "id"            => $idIntegrasi,
                "active"        => $active,
                "type"          => [array(

                                    "coding" => [array(

                                            "system"    => "http://terminology.hl7.org/CodeSystem/organization-type",
                                            "code"      => "dept",
                                            "display"   => "Hospital Department"

                                    )]

                )],
                "name"          => $dataOrg->nama,
                "partOf"=> array(
                    "reference"=> "Organization/".$idOrganization
                )
        );

        $data_api = json_encode($params);

        $output = $this->sehat->putEncounter($url, $data_api, $header);

        if($output['respon'] === 200){

            $result = json_decode($output['result']);

            $update = ["integrasi_ulang" => '0'];

            $data = $this->db->where('id', $idOrganisasi)->update('sm_organisasi', $update);

            $decode = ["metaData" => ["code" => 200,"message" => 'Update Integrasi Organisasi Berhasil']];

        } else {

            $result = json_decode($output['result']);
            $issued = $result->issue;
            $diagNostic = $issued[0]->expression;
            $details = $issued[0]->details;
            $decode = ["metaData" => ["code" => 202,"message" => $details->text.', '.$diagNostic[0]]];

        }

        if ($this->db->trans_status() === false) :
            $this->db->trans_rollback();
            $status = false;
            $pesan = 'Update Integrasi Organisasi Gagal';
        else :
            $this->db->trans_commit();
            $status = true;
            $pesan = 'Update Integrasi Integrasi Organisasi Berhasil';
        endif;

        $this->response($decode, REST_Controller::HTTP_OK);
    }

    function hapus_organisasi_delete()
    {

        $idOrganisasi = (int)$this->delete('id');

        $dataOrg = $this->sehat->cekDataOrganisasi($idOrganisasi);

        $idIntegrasi = $dataOrg->integrasi_baru;

        if(empty($idIntegrasi)){

            $dataParent = $this->sehat->cekParentOrganisasi($idOrganisasi);

            $countParent = count($dataParent);

            if($countParent > 0){

                $decode = ["metaData" => ["code" => 202,"message" => 'Silakan hapus Sub Organisasi terlebih dahulu']];

            } else {

                $id = $this->db->where('id', $idOrganisasi)->delete('sm_organisasi');

                $decode = ["metaData" => ["code" => 200,"message" => 'Data Organisasi berhasil dihapus']];

            }

        } else {

            $decode = ["metaData" => ["code" => 202,"message" => 'Data Sudah Terintegrasi, tidak bisa dihapus, silakan dinonaktifkan']];

        }
        
        $this->response($decode, REST_Controller::HTTP_OK);
    }

    function data_organisasi_get()
    {
        
        if (!$this->get('id')) :  
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
            exit(); 
        endif;

        $idOrganisasi = (int)$this->get('id');
        
        $data = $this->sehat->getDataOrganisasi($idOrganisasi);

        if ($data) :
            $this->response($data, REST_Controller::HTTP_OK);
        endif;
    }

    function data_lokasi_get()
    {
        
        if (!$this->get('id')) :  
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
            exit(); 
        endif;

        $idLokasi = (int)$this->get('id');
        
        $data = $this->sehat->getDataLokasi($idLokasi);

        if ($data) :
            $this->response($data, REST_Controller::HTTP_OK);
        endif;
    }

    function simpan_edit_lokasi_put()
    {

        if (!$this->put('id_lokasi')) :  
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
            exit(); 
        endif; 

        $this->db->trans_begin();

        $idLokasi = (int)$this->put('id_lokasi');
        $namaLokasi = $this->put('nama_lokasi');
        $statusAktif = $this->put('status_aktif');

        $update = ["status" => $statusAktif,"nama" => $namaLokasi,"integrasi_ulang" => '1'];

        $data = $this->db->where('id', $idLokasi)->update('sm_lokasi', $update);

        

        if ($this->db->trans_status() === false) :
            $this->db->trans_rollback();
            $status = false;
            $decode = ["metaData" => ["code" => 202,"message" => 'Data Lokasi Gagal diperbaharui']];
        else :
            $this->db->trans_commit();
            $status = true;
            $decode = ["metaData" => ["code" => 200,"message" => 'Data Lokasi Berhasil diubah, silakan Integrasikan Data Lokasi Anda']];
        endif;

        $this->response($decode, REST_Controller::HTTP_OK);

    }

    function simpan_edit_organisasi_put()
    {

        if (!$this->put('id_organisasi')) :  
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
            exit(); 
        endif; 

        $this->db->trans_begin();

        $idOrganisasi = (int)$this->put('id_organisasi');
        $namaOrganisasi = $this->put('nama_organisasi');
        $statusAktif = $this->put('status_aktif');

        $update = ["status" => $statusAktif,"nama" => $namaOrganisasi,"integrasi_ulang" => '1'];

        $data = $this->db->where('id', $idOrganisasi)->update('sm_organisasi', $update);

        

        if ($this->db->trans_status() === false) :
            $this->db->trans_rollback();
            $status = false;
            $decode = ["metaData" => ["code" => 202,"message" => 'Data Organisasi Gagal diperbaharui']];
        else :
            $this->db->trans_commit();
            $status = true;
            $decode = ["metaData" => ["code" => 200,"message" => 'Data Organisasi Berhasil diubah, silakan Integrasikan Data Organisasi Anda']];
        endif;

        $this->response($decode, REST_Controller::HTTP_OK);

    }

    function pilih_induk_organisasi_get()
    {
        $q = safe_get('q');
        $page = safe_get('page');
        $start = $this->start($page);
        $data = $this->sehat->ambilIndukOrganisasi($q, $start, $this->limit);
        if ((safe_get('page') == 1) & ($q == '')) :
            $pilih[] = array(
                'id' => '', 
                'nama' => ' '
            );

            $data['data'] = array_merge($pilih, $data['data']);
            $data['total'] += 1;
        endif;
        
        $this->response($data, REST_Controller::HTTP_OK);
        
    }

    function pilih_induk_get()
    {
        $q = safe_get('q');
        $jenis = safe_get('jenis');
        $id_jenis = safe_get('id_jenis');
        $page = safe_get('page');
        $start = $this->start($page);
        
        $data = $this->sehat->getPilihInduk($q, $id_jenis, $jenis, $start, $this->limit);
        if ((safe_get('page') == 1) & ($q == '')) :
            $pilih[] = array(
                'id' => '', 
                'nama' => 'Pilih Organisasi', 
                'induk' => '', 
                'induk_organisasi' => '', 
                'kode' => ''
            );

            $data['data'] = array_merge($pilih, $data['data']);
            $data['total'] += 1;
        endif;
        $this->response($data, REST_Controller::HTTP_OK);
        
    }

    function pilih_lokasi_get()
    {
        $q = safe_get('q');
        $jenis = safe_get('jenis');
        $id_jenis = safe_get('id_jenis');
        $page = safe_get('page');
        $start = $this->start($page);
        
        $data = $this->sehat->getPilihLokasi($q, $id_jenis, $jenis, $start, $this->limit);
        if ((safe_get('page') == 1) & ($q == '')) :
            $pilih[] = array(
                'id' => '', 
                'nama' => 'Pilih Lokasi', 
                'induk' => '', 
                'induk_organisasi' => '', 
                'kode' => ''
            );

            $data['data'] = array_merge($pilih, $data['data']);
            $data['total'] += 1;
        endif;
        $this->response($data, REST_Controller::HTTP_OK);
        
    }

    function tipe_fisik_get()
    {
        $q = safe_get('q');
        $page = safe_get('page');
        $start = $this->start($page);
        $data = $this->sehat->ambilTipeFisik($q, $start, $this->limit);
        if ((safe_get('page') == 1) & ($q == '')) :
            $pilih[] = array(
                'id' => '', 
                'display' => ' '
            );

            $data['data'] = array_merge($pilih, $data['data']);
            $data['total'] += 1;
        endif;
        
        $this->response($data, REST_Controller::HTTP_OK);
        
    }

    function kategori_get()
    {
        $q = safe_get('q');
        $page = safe_get('page');
        $start = $this->start($page);
        $data = $this->sehat->ambilKategori($q, $start, $this->limit);
        if ((safe_get('page') == 1) & ($q == '')) :
            $pilih[] = array(
                'id' => '', 
                'nama' => ' '
            );

            $data['data'] = array_merge($pilih, $data['data']);
            $data['total'] += 1;
        endif;
        
        $this->response($data, REST_Controller::HTTP_OK);
        
    }

    function lokasi_sistem_get()
    {

        if($this->get('nama') !== ''){

            $namaTabel = $this->get('nama');
            $q = safe_get('q');
            $page = safe_get('page');
            $start = $this->start($page);
            $data = $this->sehat->getLokasiSistem($namaTabel, $q, $start, $this->limit);
            
            if ((safe_get('page') == 1) & ($q == '')) :
                $pilih[] = array(
                    'id' => '', 
                    'nama' => ' '
                );

                $data['data'] = array_merge($pilih, $data['data']);
                $data['total'] += 1;
            endif;
            
            $this->response($data, REST_Controller::HTTP_OK);

        } else {

            $data = ["data" => ["code" => 201,"results" => null]];

            $pilih[] = array(
                    'id' => '', 
                    'nama' => ' '
                );
            $dData = array_merge($pilih, $data['data']);

            $decode = $dData['results'];

            $this->response($decode, REST_Controller::HTTP_OK);

        }
    }

    function daftar_organisasi_get()
    {
        if (!$this->get('page')) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST);
        endif;

        $tipedata = 'daftar';
        $limit = 5;

        if (isset($_GET['tipedata'])) :
            $tipedata = safe_get('tipedata');
        endif;

        $search = [
            'nama' => safe_get('nama'),
            'id_organisasi' => safe_get('id_organisasi')
        ];

        if ($tipedata === 'daftar') :
            $limit = 5;
            $start = (($this->get('page') - 1) * $limit);
            $data = $this->sehat->getDaftarOrganisasi($limit, $start);
        else :
            $limit = $this->limit;
            $start = (($this->get('page') - 1) * $limit);
            $data = $this->sehat->getDaftarCariOrganisasi($limit, $start, $search);
        endif;

        $data['page'] = (int)$this->get('page');
        $data['limit'] = $limit;

        if ($data) :
            $this->response($data, REST_Controller::HTTP_OK);
        endif;
    }

    function daftar_lokasi_get()
    {   

        if (!$this->get('page')) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST);
        endif;

        $tipedata = 'daftar';
        $limit = 5;

        if (isset($_GET['tipedata'])) :
            $tipedata = safe_get('tipedata');
        endif;

        $search = [
            'nama' => safe_get('nama'),
            'id_organisasi' => safe_get('id_organisasi')
        ];

        if ($tipedata === 'daftar') :
            $limit = 5;
            $start = (($this->get('page') - 1) * $limit);
            $data = $this->sehat->getDaftarLokasi($limit, $start);
        else :
            $limit = $this->limit;
            $start = (($this->get('page') - 1) * $limit);
            $data = $this->sehat->getDaftarCariLokasi($limit, $start, $search);
        endif;

        $data['page'] = (int)$this->get('page');
        $data['limit'] = $limit;

        if ($data) :
            $this->response($data, REST_Controller::HTTP_OK);
        endif;
    }

    function ambil_data_pasien_get()
    {
        
        if (!$this->get('page')) :  
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)  
        endif;

        $search = [
            'id'                => $this->get('id'),
            'nama'              => $this->get('nama'),
            'nik'               => $this->get('nik'),
        ];

        $start = $this->mulai($this->get('page'));

        $data = $this->sehat->ambilDataPasien($this->batas, $start, $search);

        $data['page'] = (int) $this->get('page');
        $data['limit'] = $this->batas;

        if ($data) :
            $this->response($data, REST_Controller::HTTP_OK);
        endif;
    }

    function ambil_data_nakes_get()
    {
        
        if (!$this->get('page')) :  
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)  
        endif;

        $search = [
            'nama'              => $this->get('nama'),
            'nik'               => $this->get('nik'),
        ];

        $start = $this->mulai($this->get('page'));

        $data = $this->sehat->ambilDataNakes($this->batas, $start, $search);

        $data['page'] = (int) $this->get('page');
        $data['limit'] = $this->batas;

        if ($data) :
            $this->response($data, REST_Controller::HTTP_OK);
        endif;
    }


    private function set($page)
    {
        return (($page - 1) * $this->batas);
    }

    function data_integrasi_pasien_get()
    {
        
        if (!$this->get('page')) :  
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)  
        endif;
        
        $search = [
            'id'                => $this->get('id'),
            'nama'              => $this->get('nama'),
            'nik'               => $this->get('nik'),
        ];

        $start = $this->set($this->get('page'));

        $data = $this->sehat->dataIntegrasiPasien($this->batas, $start, $search);

        $data['page'] = (int) $this->get('page');
        $data['limit'] = $this->batas;

        if ($data) :
            $this->response($data, REST_Controller::HTTP_OK);
        endif;
    }

    function data_integrasi_nakes_get()
    {
        
        if (!$this->get('page')) :  
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)  
        endif;
        
        $search = [
            
            'nama'              => $this->get('nama'),
            'nik'               => $this->get('nik'),
        ];

        $start = $this->set($this->get('page'));

        $data = $this->sehat->dataIntegrasiNakes($this->batas, $start, $search);

        $data['page'] = (int) $this->get('page');
        $data['limit'] = $this->batas;

        if ($data) :
            $this->response($data, REST_Controller::HTTP_OK);
        endif;
    }


    function ambil_data_encounter_get()
    {
        
        if (!$this->get('page')) :  
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)  
        endif;

        $search = [
            'tanggal_awal'      => safe_get('tanggal_awal'),
            'tanggal_akhir'     => safe_get('tanggal_akhir'),
            'id'                => $this->get('id'),
            'nama'              => $this->get('nama'),
            'poli'               => $this->get('poli'),
        ];

        $start = $this->mulai($this->get('page'));

        $data = $this->sehat->ambilDataEncounter($this->batas, $start, $search);

        $data['page'] = (int) $this->get('page');
        $data['limit'] = $this->batas;

        if ($data) :
            $this->response($data, REST_Controller::HTTP_OK);
        endif;
    }

    function data_integrasi_encounter_get()
    {
        
        if (!$this->get('page')) :  
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)  
        endif;

        $search = [
            'tanggal_awal'      => safe_get('tanggal_awal'),
            'tanggal_akhir'     => safe_get('tanggal_akhir'),
            'id'                => $this->get('id'),
            'nama'              => $this->get('nama'),
            'poli'               => $this->get('poli'),
        ];


        $start = $this->mulai($this->get('page'));

        $data = $this->sehat->dataIntegrasiEncounter($this->batas, $start, $search);

        $data['page'] = (int) $this->get('page');
        $data['limit'] = $this->batas;

        if ($data) :
            $this->response($data, REST_Controller::HTTP_OK);
        endif;
    }

    function ambil_observasi_get()
    {
        
        if (!$this->get('page')) :  
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)  
        endif;

        $search = [
            'id'                => $this->get('id'),
            'nama'              => $this->get('nama'),
            'poli'               => $this->get('poli'),
        ];

        $start = $this->mulai($this->get('page'));

        $data = $this->sehat->ambilObservasi($this->batas, $start, $search);

        $data['page'] = (int) $this->get('page');
        $data['limit'] = $this->batas;

        if ($data) :
            $this->response($data, REST_Controller::HTTP_OK);
        endif;
    }

    function integrasi_observasi_get()
    {
        
        if (!$this->get('page')) :  
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)  
        endif;

        $search = [
            'id'                => $this->get('id'),
            'nama'              => $this->get('nama'),
            'poli'               => $this->get('poli'),
        ];


        $start = $this->mulai($this->get('page'));

        $data = $this->sehat->integrasiObservasi($this->batas, $start, $search);

        $data['page'] = (int) $this->get('page');
        $data['limit'] = $this->batas;

        if ($data) :
            $this->response($data, REST_Controller::HTTP_OK);
        endif;
    }

    function ambil_procedure_get()
    {
        
        if (!$this->get('page')) :  
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)  
        endif;

        $search = [
            'id'                => $this->get('id'),
            'nama'              => $this->get('nama'),
            'poli'               => $this->get('poli'),
        ];

        $start = $this->mulai($this->get('page'));

        $data = $this->sehat->ambilProcedure($this->batas, $start, $search);

        $data['page'] = (int) $this->get('page');
        $data['limit'] = $this->batas;

        if ($data) :
            $this->response($data, REST_Controller::HTTP_OK);
        endif;
    }

    function integrasi_procedure_get()
    {
        
        if (!$this->get('page')) :  
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)  
        endif;

        $search = [
            'id'                => $this->get('id'),
            'nama'              => $this->get('nama'),
            'poli'               => $this->get('poli'),
        ];


        $start = $this->mulai($this->get('page'));

        $data = $this->sehat->integrasiProcedure($this->batas, $start, $search);

        $data['page'] = (int) $this->get('page');
        $data['limit'] = $this->batas;

        if ($data) :
            $this->response($data, REST_Controller::HTTP_OK);
        endif;
    }

    function ambil_condition_primary_get()
    {
        
        if (!$this->get('page')) :  
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)  
        endif;

        $search = [
            'id'                => $this->get('id'),
            'nama'              => $this->get('nama'),
            'poli'               => $this->get('poli'),
        ];

        $start = $this->mulai($this->get('page'));

        $data = $this->sehat->ambilConditionPrimary($this->batas, $start, $search);

        $data['page'] = (int) $this->get('page');
        $data['limit'] = $this->batas;

        if ($data) :
            $this->response($data, REST_Controller::HTTP_OK);
        endif;
    }

    function integrasi_condition_primary_get()
    {
        
        if (!$this->get('page')) :  
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)  
        endif;

        $search = [
            'id'                => $this->get('id'),
            'nama'              => $this->get('nama'),
            'poli'               => $this->get('poli'),
        ];


        $start = $this->mulai($this->get('page'));

        $data = $this->sehat->integrasiConditionPrimary($this->batas, $start, $search);

        $data['page'] = (int) $this->get('page');
        $data['limit'] = $this->batas;

        if ($data) :
            $this->response($data, REST_Controller::HTTP_OK);
        endif;
    }

    function ambil_condition_secondary_get()
    {
        
        if (!$this->get('page')) :  
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)  
        endif;

        $search = [
            'id'                => $this->get('id'),
            'nama'              => $this->get('nama'),
            'poli'               => $this->get('poli'),
        ];

        $start = $this->mulai($this->get('page'));

        $data = $this->sehat->ambilConditionSecondary($this->batas, $start, $search);

        $data['page'] = (int) $this->get('page');
        $data['limit'] = $this->batas;

        if ($data) :
            $this->response($data, REST_Controller::HTTP_OK);
        endif;
    }

    function integrasi_condition_secondary_get()
    {
        
        if (!$this->get('page')) :  
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)  
        endif;

        $search = [
            'id'                => $this->get('id'),
            'nama'              => $this->get('nama'),
            'poli'               => $this->get('poli'),
        ];


        $start = $this->mulai($this->get('page'));

        $data = $this->sehat->integrasiConditionSecondary($this->batas, $start, $search);

        $data['page'] = (int) $this->get('page');
        $data['limit'] = $this->batas;

        if ($data) :
            $this->response($data, REST_Controller::HTTP_OK);
        endif;
    }

    function konverTimeStamp($time){

        $estimate = new DateTime($time);
        $nw_est = $estimate->getTimestamp();
        $nw_est_one = $nw_est*1000;

        return $nw_est_one;

    }

    function integrasi_encounter_post()
    {

        $this->db->trans_begin();

        if($this->post('id') === null){

            $cdecode = ["metaData" => ["code" => 201,"message" => 'ID Layanan Tidak ada, harap refresh kembali']];
            die(json_encode($cdecode));

        }

        $id_layanan = (int)$this->post('id');

        $data = $this->sehat->cekidLayananPendaftaran($id_layanan);

        if($data->id_poli !== null){

            $idSpesial = (int)$data->id_poli;

            $nama = 1;

            $dataPoli = $this->sehat->cekDataPoli($nama, $idSpesial);

            if($dataPoli !== null && $dataPoli !== ''){

                $lokasi = $dataPoli->integrasi_baru;
                $nama = $dataPoli->nama;

            } else {

                $cdecode = ["metaData" => ["code" => 201,"message" => 'Poli Belum di integrasi, Silakan integrasikan ke satu sehat terlebih dahulu']];
                die(json_encode($cdecode));

            }

        } else {

            $cdecode = ["metaData" => ["code" => 201,"message" => 'Id Poli Tidak Ada']];
            die(json_encode($cdecode));     

        }

        if($data->ihsn !== null){

            $dataIhsn = $data->ihsn;
            $namaPasien = $data->nama_pasien;

        } else {

            $cdecode = ["metaData" => ["code" => 201,"message" => 'Silakan Integrasikan Pasien Terlebih Dahulu ke Satu Sehat']];
            die(json_encode($cdecode));     

        }

        if($data->ihs_number !== null){

            $dataIhsDokter = $data->ihs_number;
            $namaDokter = $data->nama_dokter;

        } else {

            $cdecode = ["metaData" => ["code" => 201,"message" => 'Silakan Integrasikan Dokter Terlebih Dahulu ke Satu Sehat']];
            die(json_encode($cdecode));     

        }

        $idOrganization = $this->satu_sehat->organization;

        $idUser = $this->session->userdata('id_translucent');

        $getID = $this->sehat->aksesSatuSehat($idUser);

        $tokenBearer = $getID->token;

        $url = $this->satu_sehat->apiurl."Encounter";

        $header = $this->sehat->authBearer($tokenBearer);

        $waktuStart = $data->task_tiga;

        $waktuEnd = $data->task_empat;

        $konvTimeStart = $this->konverTimeStamp($waktuStart);

        $konvTimeEnd = $this->konverTimeStamp($waktuEnd);

        $timeStart = date('c', $konvTimeStart/1000);

        $timeEnd = date('c', $konvTimeEnd/1000);

        $params=array(
                            "resourceType"  => "Encounter",
                            "identifier"    => [array(
                                                
                                                "system"    => "http://sys-ids.kemkes.go.id/encounter/".$idOrganization,
                                                "value"     => $data->kode_booking
                                
                            )],
                            "status"        => "arrived",
                            "class"         => array(
                                
                                            "system"    => "http://terminology.hl7.org/CodeSystem/v3-ActCode",
                                            "code"      => "AMB",
                                            "display"   => "ambulatory"

                            ),
                            "subject"      => array(
                                
                                            "reference" => "Patient/".$dataIhsn,
                                            "display"   => $namaPasien

                            ),
                            "participant"   => [array(
                                
                                            "type"      => [array(
                                                
                                                        "coding" => [array(
                                                            
                                                                "system"    => "http://terminology.hl7.org/CodeSystem/v3-ParticipationType",
                                                                "code"      => "ATND",
                                                                "display"   => "attender"
                                                            
                                                        )]
                                                
                                            )],

                                            "individual" => array(
                                                "reference" => "Practitioner/".$dataIhsDokter,
                                                "display"   => $namaDokter
                                            )
                            )],
                            "period"    => array(
                                        
                                        "start" => $timeStart

                            ),
                            "location"  => [array(
                                
                                    "location" => array(
                                        "reference"  => "Location/".$lokasi,
                                        "display"    => $nama
                                    )
                                
                            )],
                            "statusHistory" => [array(
                                
                                    "status"    => "arrived",
                                    "period"    => array(

                                        "start"=> $timeStart,
                                        "end"=> $timeEnd
                                    )
                            )],
                            "serviceProvider"=> array(
                                "reference"=> "Organization/".$idOrganization
                            )

                        );

        $data_api = json_encode($params);

        $output = $this->sehat->postEncounter($url, $data_api, $header);

        if($output['respon'] === 201){

            $result = json_decode($output['result']);

            $update = ["id_encounter" => $result->id];

            $data = $this->db->where('id', $id_layanan)->update('sm_layanan_pendaftaran', $update);

            $decode = ["metaData" => ["code" => 200,"message" => $output]];

        } else {

            $result = json_decode($output['result']);
            $issued = $result->issue;
            if(isset($issued[0]->diagnostics)){
                $diagNostic = $issued[0]->diagnostics;
            } else {

                $diagNostic = '';

            }
            $details = $issued[0]->details;
            $decode = ["metaData" => ["code" => 202,"message" => $details->text.', '.$diagNostic]];

            $xDetailData = ["kategori" => "Encounter", "no_rm" => $data->no_rm, "message" => $output['result'], "jenis_data" => 'error', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama'), "param" => json_encode($params)];

            $this->db->insert('sm_satu_sehat_log', $xDetailData);

        }

        if ($this->db->trans_status() === false) :
            $this->db->trans_rollback();
            $status = false;
            $pesan = 'Integrasi Encounter Gagal';
        else :
            $this->db->trans_commit();
            $status = true;
            $pesan = 'Integrasi Encounter Berhasil';
        endif;

        $this->response($decode, REST_Controller::HTTP_OK);


    }

    private function konversiTanggal($tanggal){

        date_default_timezone_set('Asia/Jakarta');

        $konvTanggal = date("Y-m-d\TH:i:sP", strtotime($tanggal));

        return $konvTanggal;

    }

    function kirim_primary_condition_post()
    {

        $this->db->trans_begin();

        $idDiagnosis = (int)$this->post('id');

        $data = $this->sehat->cekPrimaryCondition($idDiagnosis);

        $tanggalLayanan = $this->konversiTanggal($data->tanggal_layanan);

        $idUser = $this->session->userdata('id_translucent');

        $getID = $this->sehat->aksesSatuSehat($idUser);

        $tokenBearer = $getID->token;

        $url = $this->satu_sehat->apiurl."Condition";

        $header = $this->sehat->authBearer($tokenBearer);

        $params=array(
                        "resourceType"=> "Condition",
                        "clinicalStatus"=> array(
                            "coding"=> [
                                        array(
                                           "system"=> "http://terminology.hl7.org/CodeSystem/condition-clinical",
                                           "code"=> "active",
                                           "display"=> "Active"
                                        )
                            ]
                        ),
                        "category"=> [
                            array(
                                "coding"=> [
                                           array(
                                              "system"=> "http://terminology.hl7.org/CodeSystem/condition-category",
                                              "code"=> "encounter-diagnosis",
                                              "display"=> "Encounter Diagnosis"
                                           )
                                ]
                            )
                        ],
                        "code"=> array(
                            "coding"=> [
                                        array(
                                           "system"=> "http://hl7.org/fhir/sid/icd-10",
                                           "code"=> $data->kode_icdx,
                                           "display"=> $data->nama_diagnosis
                                        )
                            ]
                        ),
                        "subject"=> array(
                             "reference"=> "Patient/".$data->ihsn,
                             "display"=> $data->nama_pasien
                        ),
                        "encounter"=> array(
                            "reference"=> "Encounter/".$data->id_encounter
                        ),
                        "onsetDateTime"=> $tanggalLayanan,
                        "recordedDate" => $tanggalLayanan
                            

            );

        $data_api = json_encode($params);

        $output = $this->sehat->postEncounter($url, $data_api, $header);

        if($output['respon'] === 201){

            $result = json_decode($output['result']);

            $update = ["id_kondisi" => $result->id];

            $data = $this->db->where('id', $idDiagnosis)->update('sm_diagnosa', $update);

            $decode = ["metaData" => ["code" => 200,"message" => $output]];

        } else {

            $result = json_decode($output['result']);
            $issued = $result->issue;
            $diagNostic = $issued[0]->diagnostics;
            $details = $issued[0]->details;
            $decode = ["metaData" => ["code" => 202,"message" => $details->text.', '.$diagNostic]];

        }

        if ($this->db->trans_status() === false) :
            $this->db->trans_rollback();
            $status = false;
            $pesan = 'Integrasi Primary Condition Gagal';
        else :
            $this->db->trans_commit();
            $status = true;
            $pesan = 'Integrasi Primary Condition Berhasil';
        endif;

        $this->response($decode, REST_Controller::HTTP_OK);


    }


    function update_condition_primary_put()
    {

        $this->db->trans_begin();

        $idDiagnosis = (int)$this->put('id');

        $data = $this->sehat->cekPrimaryCondition($idDiagnosis);

        $hariLayanan = get_day($data->tanggal_layanan);

        $formatTanggal = get_date_format($data->tanggal_layanan);

        $tanggalLayanan = $this->konversiTanggal($data->tanggal_layanan);

        $idUser = $this->session->userdata('id_translucent');

        $getID = $this->sehat->aksesSatuSehat($idUser);

        $tokenBearer = $getID->token;

        $idParams = $data->id_kondisi;

        $url = $this->satu_sehat->apiurl."Condition/".$idParams;

        $header = $this->sehat->authBearer($tokenBearer);

        $params=array(
                        "resourceType"=> "Condition",
                        "id" => $idParams,
                        "clinicalStatus"=> array(
                            "coding"=> [
                                        array(
                                           "system"=> "http://terminology.hl7.org/CodeSystem/condition-clinical",
                                           "code"=> "remission",
                                           "display"=> "Remission"
                                        )
                            ]
                        ),
                        "category"=> [
                            array(
                                "coding"=> [
                                           array(
                                              "system"=> "http://terminology.hl7.org/CodeSystem/condition-category",
                                              "code"=> "encounter-diagnosis",
                                              "display"=> "Encounter Diagnosis"
                                           )
                                ]
                            )
                        ],
                        "code"=> array(
                            "coding"=> [
                                        array(
                                           "system"=> "http://hl7.org/fhir/sid/icd-10",
                                           "code"=> $data->kode_icdx,
                                           "display"=> $data->nama_diagnosis
                                        )
                            ]
                        ),
                        "subject"=> array(
                             "reference"=> "Patient/".$data->ihsn,
                             "display"=> $data->nama_pasien
                        ),
                        "encounter"=> array(
                            "reference"=> "Encounter/".$data->id_encounter,
                            "display" => "Kunjungan ".$data->nama_pasien." di hari ".$hariLayanan.", ".$formatTanggal
                        ),
                        "onsetDateTime"=> $tanggalLayanan,
                        "recordedDate" => $tanggalLayanan
                            

            );

        $data_api = json_encode($params);

        $output = $this->sehat->putEncounter($url, $data_api, $header);

        if($output['respon'] === 200){

            $result = json_decode($output['result']);

            $update = ["id_kondisi" => $result->id];

            $data = $this->db->where('id', $idDiagnosis)->update('sm_diagnosa', $update);

            $decode = ["metaData" => ["code" => 200,"message" => $output]];

        } else {

            $result = json_decode($output['result']);
            $issued = $result->issue;
            $diagNostic = $issued[0]->expression;
            $details = $issued[0]->details;
            $decode = ["metaData" => ["code" => 202,"message" => $details->text.', '.$diagNostic[0]]];

        }

        if ($this->db->trans_status() === false) :
            $this->db->trans_rollback();
            $status = false;
            $pesan = 'Integrasi Primary Condition Gagal';
        else :
            $this->db->trans_commit();
            $status = true;
            $pesan = 'Integrasi Primary Condition Berhasil';
        endif;

        $this->response($decode, REST_Controller::HTTP_OK);


    }

    function update_condition_secondary_put()
    {

        $this->db->trans_begin();

        $idDiagnosis = (int)$this->put('id');

        $data = $this->sehat->cekSecondaryCondition($idDiagnosis);

        $hariLayanan = get_day($data->tanggal_layanan);

        $formatTanggal = get_date_format($data->tanggal_layanan);

        $tanggalLayanan = $this->konversiTanggal($data->tanggal_layanan);

        $idUser = $this->session->userdata('id_translucent');

        $getID = $this->sehat->aksesSatuSehat($idUser);

        $tokenBearer = $getID->token;

        $idParams = $data->id_kondisi;

        $url = $this->satu_sehat->apiurl."Condition/".$idParams;

        $header = $this->sehat->authBearer($tokenBearer);

        $params=array(
                        "resourceType"=> "Condition",
                        "id" => $idParams,
                        "clinicalStatus"=> array(
                            "coding"=> [
                                        array(
                                           "system"=> "http://terminology.hl7.org/CodeSystem/condition-clinical",
                                           "code"=> "remission",
                                           "display"=> "Remission"
                                        )
                            ]
                        ),
                        "category"=> [
                            array(
                                "coding"=> [
                                           array(
                                              "system"=> "http://terminology.hl7.org/CodeSystem/condition-category",
                                              "code"=> "encounter-diagnosis",
                                              "display"=> "Encounter Diagnosis"
                                           )
                                ]
                            )
                        ],
                        "code"=> array(
                            "coding"=> [
                                        array(
                                           "system"=> "http://hl7.org/fhir/sid/icd-10",
                                           "code"=> $data->kode_icdx,
                                           "display"=> $data->nama_diagnosis
                                        )
                            ]
                        ),
                        "subject"=> array(
                             "reference"=> "Patient/".$data->ihsn,
                             "display"=> $data->nama_pasien
                        ),
                        "encounter"=> array(
                            "reference"=> "Encounter/".$data->id_encounter,
                            "display" => "Kunjungan ".$data->nama_pasien." di hari ".$hariLayanan.", ".$formatTanggal
                        ),
                        "onsetDateTime"=> $tanggalLayanan,
                        "recordedDate" => $tanggalLayanan
                            

            );

        $data_api = json_encode($params);

        $output = $this->sehat->putEncounter($url, $data_api, $header);

        if($output['respon'] === 200){

            $result = json_decode($output['result']);

            $update = ["id_kondisi" => $result->id];

            $data = $this->db->where('id', $idDiagnosis)->update('sm_diagnosa', $update);

            $decode = ["metaData" => ["code" => 200,"message" => $output]];

        } else {

            $result = json_decode($output['result']);
            $issued = $result->issue;
            $diagNostic = $issued[0]->expression;
            $details = $issued[0]->details;
            $decode = ["metaData" => ["code" => 202,"message" => $details->text.', '.$diagNostic[0]]];

        }

        if ($this->db->trans_status() === false) :
            $this->db->trans_rollback();
            $status = false;
            $pesan = 'Integrasi Secondary Condition Gagal';
        else :
            $this->db->trans_commit();
            $status = true;
            $pesan = 'Integrasi Secondary Condition Berhasil';
        endif;

        $this->response($decode, REST_Controller::HTTP_OK);


    }

    function kirim_secondary_condition_post()
    {

        $this->db->trans_begin();

        $idDiagnosis = (int)$this->post('id');

        $data = $this->sehat->cekSecondaryCondition($idDiagnosis);

        $hariLayanan = get_day($data->tanggal_layanan);

        $formatTanggal = get_date_format($data->tanggal_layanan);

        $tanggalLayanan = $this->konversiTanggal($data->tanggal_layanan);

        $idUser = $this->session->userdata('id_translucent');

        $getID = $this->sehat->aksesSatuSehat($idUser);

        $tokenBearer = $getID->token;

        $url = $this->satu_sehat->apiurl."Condition";

        $header = $this->sehat->authBearer($tokenBearer);

        $params=array(
                        "resourceType"=> "Condition",
                        "clinicalStatus"=> array(
                            "coding"=> [
                                        array(
                                           "system"=> "http://terminology.hl7.org/CodeSystem/condition-clinical",
                                           "code"=> "active",
                                           "display"=> "Active"
                                        )
                            ]
                        ),
                        "category"=> [
                            array(
                                "coding"=> [
                                           array(
                                              "system"=> "http://terminology.hl7.org/CodeSystem/condition-category",
                                              "code"=> "encounter-diagnosis",
                                              "display"=> "Encounter Diagnosis"
                                           )
                                ]
                            )
                        ],
                        "code"=> array(
                            "coding"=> [
                                        array(
                                           "system"=> "http://hl7.org/fhir/sid/icd-10",
                                           "code"=> $data->kode_icdx,
                                           "display"=> $data->nama_diagnosis
                                        )
                            ]
                        ),
                        "subject"=> array(
                             "reference"=> "Patient/".$data->ihsn,
                             "display"=> $data->nama_pasien
                        ),
                        "encounter"=> array(
                            "reference"=> "Encounter/".$data->id_encounter,
                            "display" => "Kunjungan ".$data->nama_pasien." di hari ".$hariLayanan.", ".$formatTanggal
                        ),
                        "onsetDateTime"=> $tanggalLayanan,
                        "recordedDate" => $tanggalLayanan
                            

            );

        $data_api = json_encode($params);

        $output = $this->sehat->postEncounter($url, $data_api, $header);

        if($output['respon'] === 201){

            $result = json_decode($output['result']);

            $update = ["id_kondisi" => $result->id];

            $data = $this->db->where('id', $idDiagnosis)->update('sm_diagnosa', $update);

            $decode = ["metaData" => ["code" => 200,"message" => $output]];

        } else {

            $result = json_decode($output['result']);
            $issued = $result->issue;
            $diagNostic = $issued[0]->expression;
            $details = $issued[0]->details;
            $decode = ["metaData" => ["code" => 202,"message" => $details->text.', '.$diagNostic[0]]];

        }

        if ($this->db->trans_status() === false) :
            $this->db->trans_rollback();
            $status = false;
            $pesan = 'Integrasi Primary Condition Gagal';
        else :
            $this->db->trans_commit();
            $status = true;
            $pesan = 'Integrasi Primary Condition Berhasil';
        endif;

        $this->response($decode, REST_Controller::HTTP_OK);


    }

    function update_encounter_put()
    {

        $this->db->trans_begin();

        $idLayanan = (int)$this->put('id');

        $data = $this->sehat->cekidLayananPendaftaran($idLayanan);

        if($data->id_poli !== null){

            $idSpesial = (int)$data->id_poli;

            $nama = 1;

            $dataPoli = $this->sehat->cekDataPoli($nama, $idSpesial);

            if($dataPoli !== null && $dataPoli !== ''){

                $lokasi = $dataPoli->integrasi_baru;
                $nama = $dataPoli->nama;

            } else {

                $cdecode = ["metaData" => ["code" => 201,"message" => 'Poli Belum di integrasi, Silakan integrasikan ke satu sehat terlebih dahulu']];
                die(json_encode($cdecode));

            }

        } else {

            $cdecode = ["metaData" => ["code" => 201,"message" => 'Id Poli Tidak Ada']];
            die(json_encode($cdecode));     

        }

        if($data->ihsn !== null){

            $dataIhsn = $data->ihsn;
            $namaPasien = $data->nama_pasien;

        } else {

            $cdecode = ["metaData" => ["code" => 201,"message" => 'Silakan Integrasikan Pasien Terlebih Dahulu ke Satu Sehat']];
            die(json_encode($cdecode));     

        }

        if($data->ihs_number !== null){

            $dataIhsDokter = $data->ihs_number;
            $namaDokter = $data->nama_dokter;

        } else {

            $cdecode = ["metaData" => ["code" => 201,"message" => 'Silakan Integrasikan Dokter Terlebih Dahulu ke Satu Sehat']];
            die(json_encode($cdecode));     

        }

        $idOrganization = $this->satu_sehat->organization;

        $idUser = $this->session->userdata('id_translucent');

        $getID = $this->sehat->aksesSatuSehat($idUser);

        $tokenBearer = $getID->token;

        $idParams = $data->id_encounter;

        $url = $this->satu_sehat->apiurl."Encounter/".$idParams;

        $header = $this->sehat->authBearer($tokenBearer);

        $waktuStart = $data->task_tiga;

        $waktuProgress = $data->task_empat;

        $waktuEnd = $data->task_lima;

        $konvTimeStart = $this->konverTimeStamp($waktuStart);

        $konvTimeProgress = $this->konverTimeStamp($waktuProgress);

        $konvTimeEnd = $this->konverTimeStamp($waktuEnd);

        $timeStart = date('c', $konvTimeStart/1000);

        $timeProgress = date('c', $konvTimeProgress/1000);

        $timeEnd = date('c', $konvTimeEnd/1000);

        $params=array(

                    "resourceType"    => "Encounter",
                    "id" => $data->id_encounter,
                    "identifier"  => [
                    array(
                        "system"  => "http://sys-ids.kemkes.go.id/encounter/".$idOrganization,
                        "value"   => $data->kode_booking
                        )
                    ],
                    "status"  => "in-progress",
                    "class"   => array(
                        "system"    => "http://terminology.hl7.org/CodeSystem/v3-ActCode",
                        "code"      => "AMB",
                        "display"   => "ambulatory"
                      ),
                    "subject"     => array(
                                
                                    "reference" => "Patient/".$dataIhsn,
                                    "display"   => $namaPasien

                    ),
                  "participant" => [
                    array(
                      "type"    => [
                        array(
                          "coding"  => [
                            array(
                              "system"  => "http://terminology.hl7.org/CodeSystem/v3-ParticipationType",
                              "code"    => "ATND",
                              "display" => "attender"
                            )
                          ]
                        )
                      ],
                        "individual" => array(
                            "reference" => "Practitioner/".$dataIhsDokter,
                            "display"   => $namaDokter
                        )
                    )
                  ],
                  "period"  => array(
                    "start" => $timeStart,
                    "end"   => $timeEnd
                  ),
                  "location"  => [array(
                                
                                    "location" => array(
                                        "reference"  => "Location/".$lokasi,
                                        "display"    => $nama
                                    )
                    )],
                  "statusHistory"   => [
                    array(
                      "status"   => "arrived",
                      "period"   => array(
                        "start"   => $timeStart,
                        "end"   => $timeProgress
                      )
                    ),
                    array(
                      "status"   => "in-progress",
                      "period"   => array(
                        "start"   => $timeProgress
                      )
                    )
                  ],
                  "serviceProvider"   => array(
                    "reference"=> "Organization/".$idOrganization
                  )
        );

        $data_api = json_encode($params);

        $output = $this->sehat->putEncounter($url, $data_api, $header);

        if($output['respon'] === 200){

            $result = json_decode($output['result']);

            $update = ["in_progress" => 'OK'];

            $data = $this->db->where('id', $idLayanan)->update('sm_layanan_pendaftaran', $update);

            $decode = ["metaData" => ["code" => 200,"message" => $output]];

        } else {

            $result = json_decode($output['result']);
            $issued = $result->issue;
            $diagNostic = $issued[0]->expression;
            $details = $issued[0]->details;
            $decode = ["metaData" => ["code" => 201,"message" => $details->text.', '.$diagNostic[0]]];

        }

        if ($this->db->trans_status() === false) :
            $this->db->trans_rollback();
            $status = false;
            $pesan = 'Integrasi Encounter Gagal';
        else :
            $this->db->trans_commit();
            $status = true;
            $pesan = 'Integrasi Encounter Berhasil';
        endif;

        $this->response($decode, REST_Controller::HTTP_OK);
        

    }

    function finish_encounter_put()
    {

        $this->db->trans_begin();

        $idLayanan = (int)$this->put('id');

        $data = $this->sehat->cekidLayananPendaftaran($idLayanan);

        if($data->id_poli !== null){

            $idSpesial = (int)$data->id_poli;

            $nama = 1;

            $dataPoli = $this->sehat->cekDataPoli($nama, $idSpesial);

            if($dataPoli !== null && $dataPoli !== ''){

                $lokasi = $dataPoli->integrasi_baru;
                $nama = $dataPoli->nama;

            } else {

                $cdecode = ["metaData" => ["code" => 201,"message" => 'Poli Belum di integrasi, Silakan integrasikan ke satu sehat terlebih dahulu']];
                die(json_encode($cdecode));

            }

        } else {

            $cdecode = ["metaData" => ["code" => 201,"message" => 'Id Poli Tidak Ada']];
            die(json_encode($cdecode));     

        }

        if($data->ihsn !== null){

            $dataIhsn = $data->ihsn;
            $namaPasien = $data->nama_pasien;

        } else {

            $cdecode = ["metaData" => ["code" => 201,"message" => 'Silakan Integrasikan Pasien Terlebih Dahulu ke Satu Sehat']];
            die(json_encode($cdecode));     

        }

        if($data->ihs_number !== null){

            $dataIhsDokter = $data->ihs_number;
            $namaDokter = $data->nama_dokter;

        } else {

            $cdecode = ["metaData" => ["code" => 201,"message" => 'Silakan Integrasikan Dokter Terlebih Dahulu ke Satu Sehat']];
            die(json_encode($cdecode));     

        }

        $idOrganization = $this->satu_sehat->organization;

        $idUser = $this->session->userdata('id_translucent');

        $getID = $this->sehat->aksesSatuSehat($idUser);

        $tokenBearer = $getID->token;

        $idParams = $data->id_encounter;

        $url = $this->satu_sehat->apiurl."Encounter/".$idParams;

        $header = $this->sehat->authBearer($tokenBearer);

        $waktuStart = $data->task_tiga;

        $waktuProgress = $data->task_empat;

        $waktuEnd = $data->task_lima;

        $konvTimeStart = $this->konverTimeStamp($waktuStart);

        $konvTimeProgress = $this->konverTimeStamp($waktuProgress);

        $konvTimeEnd = $this->konverTimeStamp($waktuEnd);

        $timeStart = date('c', $konvTimeStart/1000);

        $timeProgress = date('c', $konvTimeProgress/1000);

        $timeEnd = date('c', $konvTimeEnd/1000);

        $diagnosis = $this->sehat->cekDiagnosisEncounter($idLayanan);

        $dArray = array();

        foreach ($diagnosis as $key => $value) {

            $dArray[$key]['kondisi'] = $value;

        }

        $item = "[";

        foreach ($dArray as $key => $value) {

            $prioritas = $value['kondisi']->prioritas;

            if($prioritas === 'Utama'){

                $rank = 1;

            } else {

                $rank = (int)$key+1;

            }

            $item .= "{\"condition\": {
                \"reference\":\"Condition/".$value['kondisi']->id_kondisi. "\",
                \"display\": \"".$value['kondisi']->nama_diagnosis. "\"
            },
                    \"use\": {
                    \"coding\": [
                            {
                                \"system\": \"http://terminology.hl7.org/CodeSystem/diagnosis-role\",
                                \"code\": \"DD\",
                                \"display\": \"Discharge diagnosis\"
                            }
                        ]
                    },
                    \"rank\": ".$rank. "
               }";

            if ($key < sizeof($dArray) - 1) {
                $item .= ",";
            }

        }

        $item .= "]";

        $diagArray = json_decode($item);

        $params=array(

                  "resourceType"    => "Encounter",
                  "id" => $data->id_encounter,
                  "identifier"  => [
                    array(
                      "system"  => "http://sys-ids.kemkes.go.id/encounter/".$idOrganization,
                      "value"   => $data->kode_booking
                    )
                  ],
                  "status"  => "finished",
                  "class"   => array(
                    "system"    => "http://terminology.hl7.org/CodeSystem/v3-ActCode",
                    "code"      => "AMB",
                    "display"   => "ambulatory"
                  ),
                  "subject" => array(
                                "reference" => "Patient/".$dataIhsn,
                                "display"   => $namaPasien

                            ),
                  "participant" => [
                    array(
                      "type"    => [
                        array(
                          "coding"  => [
                            array(
                              "system"  => "http://terminology.hl7.org/CodeSystem/v3-ParticipationType",
                              "code"    => "ATND",
                              "display" => "attender"
                            )
                          ]
                        )
                      ],
                      "individual" => array(
                                        "reference" => "Practitioner/".$dataIhsDokter,
                                        "display"   => $namaDokter
                        )
                    )
                  ],
                  "period"  => array(
                    "start" => $timeStart,
                    "end"   => $timeEnd
                  ),
                  "location"  => [array(
                                
                        "location" => array(
                            "reference"  => "Location/".$lokasi,
                            "display"    => $nama
                        )
                                
                    )],

                  "diagnosis"=> $diagArray,
                  "statusHistory"   => [
                    array(
                      "status"   => "arrived",
                      "period"   => array(
                        "start"   => $timeStart,
                        "end"   => $timeProgress
                      )
                    ),
                    array(
                      "status"   => "in-progress",
                      "period"   => array(
                        "start"   => $timeProgress,
                        "end"   => $timeEnd
                      )
                    ),
                    array(
                      "status"   => "finished",
                      "period"   => array(
                        "start"   => $timeEnd,
                        "end"   => $timeEnd
                      )
                    )
                  ],
                  "serviceProvider"   => array(
                    "reference"=> "Organization/".$idOrganization
                  )
        );

        $data_api = json_encode($params);

        $output = $this->sehat->putEncounter($url, $data_api, $header);

        if($output['respon'] === 200){

            $result = json_decode($output['result']);

            $update = ["finish" => 'OK'];

            $data = $this->db->where('id', $idLayanan)->update('sm_layanan_pendaftaran', $update);

            $decode = ["metaData" => ["code" => 200,"message" => $output]];

        } else {

            $result = json_decode($output['result']);
            $issued = $result->issue;
            $diagNostic = $issued[0]->expression;
            $details = $issued[0]->details;
            $decode = ["metaData" => ["code" => 201,"message" => $details->text.', '.$diagNostic[0]]];

        }

        if ($this->db->trans_status() === false) :
            $this->db->trans_rollback();
            $status = false;
            $pesan = 'Integrasi Encounter Gagal';
        else :
            $this->db->trans_commit();
            $status = true;
            $pesan = 'Integrasi Encounter Berhasil';
        endif;

        $this->response($decode, REST_Controller::HTTP_OK);
        
    }

    function cek_inform_consent_get()
    {
        if (!$this->get('id', true)) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
        endif;

        $cekDataPasien = $this->sehat->cekInformPasien($this->get('id'));

        if($cekDataPasien->consentid !== '' && $cekDataPasien->consentid !== null){

            $decode = ["metaData" => ["code" => 200,"message" => 'Pasien Sudah melakukan Consent Satu Sehat']];

        } else {

            $decode = ["metaData" => ["code" => 201,"message" => 'Pasien Belum melakukan Consent Satu Sehat']];

        }

        $this->response($decode, REST_Controller::HTTP_OK);

    }

    function data_satu_sehat_pasien_get()
    {
        
        if (!$this->get('rm', true)) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
        endif;

        $cekDataPasien = $this->sehat->cekInformPasien($this->get('rm'));

        if($cekDataPasien->consentid === null){

            $data = ["message" => 'Pasien Belum melakukan Verifikasi consent untuk Satu Sehat'];

            die(json_encode($data));

        }

    }

    function consent_satu_sehat_pasien_post()
    {
        if (!$this->post('id', true)) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
        endif;

        $cekDataPasien = $this->sehat->cekInformPasien($this->post('id'));

        if(isset($cekDataPasien->ihsn)){

            $x = $this->autentikasi_user_post('ok');

            if($x['metaData']['code'] === 200){

                $idUser = $this->session->userdata('id_translucent');

                $getID = $this->sehat->aksesSatuSehat($idUser);

                $tokenBearer = $getID->token;

                $url = $this->satu_sehat->apiconsent."Consent";

                $header = $this->sehat->authBearer($tokenBearer);

                $params=array(
                                "patient_id"    => $cekDataPasien->ihsn,
                                "action"        => "OPTIN",
                                "agent"         => $getID->nama_user

                            );


                $data_api = json_encode($params);

                $output = $this->sehat->postEncounter($url, $data_api, $header);

                if($output['respon'] === 200){

                    $result = json_decode($output['result']);

                    $update = ["consentid" => $result->id,"petugas_consent" => $getID->nama_user];

                    $data = $this->db->where('id', $this->post('id'), true)->update('sm_pasien', $update);

                    $decode = ["metaData" => ["code" => 200,"message" => 'Integrasi Consent Pasien ke Satu Sehat Berhasil']];

                    $this->response($decode, REST_Controller::HTTP_OK);

                } else {

                    $result = json_decode($output['result']);
                    $issued = $result->issue;
                    $diagNostic = $issued[0]->expression;
                    $details = $issued[0]->details;
                    $decode = ["metaData" => ["code" => 202,"message" => $details->text.', '.$diagNostic[0]]];

                    die(json_encode($decode));

                }

            } else {

                $decode = ["metaData" => ["code" => 201,"message" => 'Autentifikasi ke Satu Sehat Gagal, Silakan Coba Kembali']];

                die(json_encode($decode));

            }



        } else {

            $decode = ["metaData" => ["code" => 201,"message" => 'Pasien belum memiliki Nomor IHSN, Silakan Integrasikan Pasien ke Satu Sehat untuk memperoleh IHSN']];

            die(json_encode($decode));

        }
        
    }

    function list_encounter_pasien_get()
    {

        $this->db->trans_begin();

        $idPasien = $this->get('no_rm');

        $data = $this->sehat->cekIhsnPasien($idPasien);

        $idOrganization = $this->satu_sehat->organization;

        $idUser = $this->session->userdata('id_translucent');

        $getID = $this->sehat->aksesSatuSehat($idUser);

        $tokenBearer = $getID->token;

        $url = $this->satu_sehat->apiurl."Encounter?subject=".$data->ihsn;

        $header = $this->sehat->authBearer($tokenBearer);

        $output = $this->sehat->postBearer($url, $header);

        if($output['respon'] === 200){

            $result = json_decode($output['result']);

            $decode = ["metaData" => ["code" => 200,"message" => 'Cek Encounter Pasien Berhasil',"result" => $result]];

        } else {

            if(!empty($output['result'])){
                
                $result = json_decode($output['result']);
                $issued = $result->issue;
                $diagNostic = $issued[0]->expression;
                $details = $issued[0]->details;
                $decode = ["metaData" => ["code" => 201,"message" => $details->text.', '.$diagNostic[0]]];

            } else {

                $decode = ["metaData" => ["code" => 201,"message" => 'Akses Gagal']];

            }

        }

        if ($this->db->trans_status() === false) :
            $this->db->trans_rollback();
            $status = false;
            $pesan = 'Cek Encounter Pasien Gagal';
        else :
            $this->db->trans_commit();
            $status = true;
            $pesan = 'Cek Encounter Pasien Berhasil';
        endif;

        $this->response($decode, REST_Controller::HTTP_OK);
    
    }

    function list_condition_pasien_get()
    {

        $this->db->trans_begin();

        $idPasien = $this->get('no_rm');

        $data = $this->sehat->cekIhsnPasien($idPasien);

        $idOrganization = $this->satu_sehat->organization;

        $idUser = $this->session->userdata('id_translucent');

        $getID = $this->sehat->aksesSatuSehat($idUser);

        $tokenBearer = $getID->token;

        $url = $this->satu_sehat->apiurl."Condition?subject=".$data->ihsn;

        $header = $this->sehat->authBearer($tokenBearer);

        $output = $this->sehat->postBearer($url, $header);

        if($output['respon'] === 200){

            $result = json_decode($output['result']);

            $decode = ["metaData" => ["code" => 200,"message" => 'Cek Kondisi Pasien Berhasil',"result" => $result]];

        } else {

            $result = json_decode($output['result']);
            $issued = $result->issue;
            $diagNostic = $issued[0]->expression;
            $details = $issued[0]->details;
            $decode = ["metaData" => ["code" => 201,"message" => $details->text.', '.$diagNostic[0]]];

        }

        if ($this->db->trans_status() === false) :
            $this->db->trans_rollback();
            $status = false;
            $pesan = 'Cek Kondisi Pasien Gagal';
        else :
            $this->db->trans_commit();
            $status = true;
            $pesan = 'Cek Kondisi Pasien Berhasil';
        endif;

        $this->response($decode, REST_Controller::HTTP_OK);
        

    }

   function autentikasi_user_post($x = null)
    {

        $this->db->trans_begin();

        $idUser = $this->session->userdata('id_translucent');

        $dataAkses = $this->sehat->aksesSatuSehat($idUser);

        if(empty($dataAkses)){

            $cekTimeissued = $this->sehat->aksesTimeissued();

            $waktu = (int)$cekTimeissued->timeissued;

            date_default_timezone_set('Asia/Jakarta');
            $tanggalTunggu = (round(microtime(true) * 1000));
            $satuJam = 61000;
            $tglWaktu = (int)$tanggalTunggu - (int)$waktu;

            if((int)$tglWaktu === (int)$satuJam || (int)$tglWaktu > (int)$satuJam){

                $url = $this->satu_sehat->auth."accesstoken?grant_type=client_credentials";

                $header = $this->sehat->authHeader();

                $params=array(
                                "client_id" => $this->satu_sehat->clientid,
                                "client_secret" => $this->satu_sehat->clientsecret
                            );
                
                $data_api = http_build_query($params);

                $output = $this->sehat->postCurl($url, $data_api, $header);

                if($output['respon'] === 200){

                    $result = json_decode($output['result']);
                    date_default_timezone_set('Asia/Jakarta');

                    $data_response = array(

                        "userakses"         => (int)$idUser,
                        "nama"              => $this->session->userdata('nama'),
                        "token"             => $result->access_token,
                        "timeissued"        => $result->issued_at,
                        "app_name"          => $result->application_name,
                        "tanggal"           => date('Y-m-d H:i:s')

                    );

                    $this->db->insert('sm_akses_satu_sehat', $data_response);

                    $decode = ["metaData" => ["code" => 200,"message" => 'Autentikasi Berhasil']];

                } else {

                    $xUrl = $this->satu_sehat->auth."accesstoken?grant_type=client_credentials";

                    $xHeader = $this->sehat->authHeader();

                    $xparams=array(
                                    "client_id" => $this->satu_sehat->clientid,
                                    "client_secret" => $this->satu_sehat->clientsecret
                                );
                    
                    $dataApi = http_build_query($xparams);

                    $xOutput = $this->sehat->postCurl($xUrl, $dataApi, $xHeader);

                    if($xOutput['respon'] === 200){

                        $xResult = json_decode($xOutput['result']);
                        date_default_timezone_set('Asia/Jakarta');

                        $dataResponse = array(

                            "userakses"         => (int)$idUser,
                            "nama"              => $this->session->userdata('nama'),
                            "token"             => $xResult->access_token,
                            "timeissued"        => $xResult->issued_at,
                            "app_name"          => $xResult->application_name,
                            "tanggal"           => date('Y-m-d H:i:s')

                        );

                        $this->db->insert('sm_akses_satu_sehat', $dataResponse);

                        $decode = ["metaData" => ["code" => 200,"message" => 'Autentikasi Berhasil']];

                    } else {

                        date_default_timezone_set('Asia/Jakarta');
                        $xDetailDataRequest = ["kategori" => "Authentication", "message" => $xOutput['result'], "jenis_data" => 'error', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama'), "respon" => $xOutput['respon'], "function" => 'autentikasi_user_post satu sehat'];
                        $this->db->insert('sm_satu_sehat_log', $xDetailDataRequest);

                        $decode = ["metaData" => ["code" => 201,"message" => $xOutput['result']]];

                    }

                    

                }

            } else {

                date_default_timezone_set('Asia/Jakarta');

                $update = ["token" => $cekTimeissued->token,"timeissued" => $cekTimeissued->timeissued,"app_name" => $cekTimeissued->app_name,"tanggal" => date('Y-m-d H:i:s')];

                $id = (int)$idUser;

                $data = $this->db->where('userakses', $id)->update('sm_akses_satu_sehat', $update);
                $decode = ["metaData" => ["code" => 200,"message" => 'Autentikasi Berhasil']];

            }

        } else {

            $cekTimeissued = $this->sehat->aksesTimeissued();

            if(isset($dataAkses->timeissued) && !is_null($dataAkses->timeissued)){

                $waktu = (int)$cekTimeissued->timeissued;

                date_default_timezone_set('Asia/Jakarta');
                $tanggalTunggu = (round(microtime(true) * 1000));
                $satuJam = 61000;
                $tglWaktu = (int)$tanggalTunggu - (int)$waktu;

                if((int)$tglWaktu === (int)$satuJam || (int)$tglWaktu > (int)$satuJam){

                    $url = $this->satu_sehat->auth."accesstoken?grant_type=client_credentials";

                    $header = $this->sehat->authHeader();

                    $params=array(
                                    "client_id" => $this->satu_sehat->clientid,
                                    "client_secret" => $this->satu_sehat->clientsecret
                                );
                    
                    $data_api = http_build_query($params);

                    $output = $this->sehat->postCurl($url, $data_api, $header);

                    if($output['respon'] === 200){

                        $result = json_decode($output['result']);

                        $update = ["token" => $result->access_token,"timeissued" => $result->issued_at,"app_name" => $result->application_name];

                        $id = (int)$idUser;

                        $data = $this->db->where('userakses', $id)->update('sm_akses_satu_sehat', $update);

                        $decode = ["metaData" => ["code" => 200,"message" => 'Autentikasi Berhasil']];

                    } else {

                        $xUrl = $this->satu_sehat->auth."accesstoken?grant_type=client_credentials";

                        $xHeader = $this->sehat->authHeader();

                        $xparams=array(
                                        "client_id" => $this->satu_sehat->clientid,
                                        "client_secret" => $this->satu_sehat->clientsecret
                                    );
                        
                        $dataApi = http_build_query($xparams);

                        $xOutput = $this->sehat->postCurl($xUrl, $dataApi, $xHeader);

                        if($xOutput['respon'] === 200){

                            $xResult = json_decode($xOutput['result']);

                            $xUpdate = ["token" => $xResult->access_token,"timeissued" => $xResult->issued_at,"app_name" => $xResult->application_name];

                            $xId = (int)$idUser;

                            $xData = $this->db->where('userakses', $xId)->update('sm_akses_satu_sehat', $xUpdate);

                            $decode = ["metaData" => ["code" => 200,"message" => 'Autentikasi Berhasil']];

                        } else {

                            date_default_timezone_set('Asia/Jakarta');
                            $xDetailDataRequest = ["kategori" => "Authentication", "message" => $xOutput['result'], "jenis_data" => 'error', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama'), "respon" => $xOutput['respon'], "function" => 'autentikasi_user_post satu sehat'];
                            $this->db->insert('sm_satu_sehat_log', $xDetailDataRequest);

                            $decode = ["metaData" => ["code" => 201,"message" => $xOutput['result']]];

                        }

                    }

                } else {

                    date_default_timezone_set('Asia/Jakarta');

                    $update = ["token" => $cekTimeissued->token,"timeissued" => $cekTimeissued->timeissued,"app_name" => $cekTimeissued->app_name,"tanggal" => date('Y-m-d H:i:s')];

                    $id = (int)$idUser;

                    $data = $this->db->where('userakses', $id)->update('sm_akses_satu_sehat', $update);

                    $decode = ["metaData" => ["code" => 200,"message" => 'Autentikasi Berhasil']];

                }

            } else {

                $url = $this->satu_sehat->auth."accesstoken?grant_type=client_credentials";

                $header = $this->sehat->authHeader();

                $params=array(
                                "client_id" => $this->satu_sehat->clientid,
                                "client_secret" => $this->satu_sehat->clientsecret
                            );
                
                $data_api = http_build_query($params);

                $output = $this->sehat->postCurl($url, $data_api, $header);

                if($output['respon'] === 200){

                    $result = json_decode($output['result']);

                    $update = ["token" => $result->access_token,"timeissued" => $result->issued_at,"app_name" => $result->application_name];

                    $id = (int)$idUser;

                    $data = $this->db->where('userakses', $id)->update('sm_akses_satu_sehat', $update);

                    $decode = ["metaData" => ["code" => 200,"message" => 'Autentikasi Berhasil']];

                } else {

                    $xUrl = $this->satu_sehat->auth."accesstoken?grant_type=client_credentials";

                    $xHeader = $this->sehat->authHeader();

                    $xparams=array(
                                    "client_id" => $this->satu_sehat->clientid,
                                    "client_secret" => $this->satu_sehat->clientsecret
                                );
                    
                    $dataApi = http_build_query($xparams);

                    $xOutput = $this->sehat->postCurl($xUrl, $dataApi, $xHeader);

                    if($xOutput['result'] === 200){

                        $xResult = json_decode($xOutput['result']);

                        $xUpdate = ["token" => $xResult->access_token,"timeissued" => $xResult->issued_at,"app_name" => $xResult->application_name];

                        $xId = (int)$idUser;

                        $xData = $this->db->where('userakses', $xId)->update('sm_akses_satu_sehat', $xUpdate);

                        $decode = ["metaData" => ["code" => 200,"message" => 'Autentikasi Berhasil']];

                    } else {

                        date_default_timezone_set('Asia/Jakarta');
                        $xDetailDataRequest = ["kategori" => "Authentication", "message" => $xOutput['result'], "jenis_data" => 'error', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama'), "respon" => $xOutput['respon'], "function" => 'autentikasi_user_post satu sehat'];
                        $this->db->insert('sm_satu_sehat_log', $xDetailDataRequest);

                        $decode = ["metaData" => ["code" => 201,"message" => $xOutput['result']]];

                    }

                }
                
            }

        }

        if ($this->db->trans_status() === false) :
            $this->db->trans_rollback();
            $status = false;
            $pesan = 'Autentikasi Gagal';
        else :
            $this->db->trans_commit();
            $status = true;
            $pesan = 'Autentikasi Berhasil';
        endif;

        if($x !== null){

            return $decode;

        } else {

            $this->response($decode, REST_Controller::HTTP_OK);        

        }

    }

    function integrasi_pasien_get()
    {
        $this->db->trans_begin();

        $identitas = $this->get('nik');
        
        $nama = strtolower(preg_replace('/\xc2\xa0/', ' ', $this->get('nama')));
        
        $idRM = $this->get('id');

        if($identitas !== ""){

            $idUser = $this->session->userdata('id_translucent');

            $getID = $this->sehat->aksesSatuSehat($idUser);

            $tokenBearer = $getID->token;

            $url = $this->satu_sehat->apiurl."Patient?identifier=https://fhir.kemkes.go.id/id/nik|".$identitas;

            $header = $this->sehat->authBearer($tokenBearer);

            $output = $this->sehat->postBearer($url, $header);

            $entryOutput = json_decode($output['result']);

            if(isset($entryOutput->entry)){

                if(!empty($entryOutput->entry)){

                    $entryId = $entryOutput->entry;

                    $idPasien = $entryId[0]->resource->id;

                    $cekNama = $entryId[0]->resource->name;

                    $namaPasien = strtolower(preg_replace('/\xc2\xa0/', ' ', $cekNama[0]->text));

                    $update = ["ihsn" => $idPasien];

                    $data = $this->db->where('id', $idRM)->update('sm_pasien', $update);

                    $decode = ["metaData" => ["code" => 200,"message" => "IHSN Berhasil disimpan"]];

                } else {

                    $decode = ["metaData" => ["code" => 201,"message" => "Tidak ada data Satu Sehat untuk NIK Tersebut"]];

                }

            } else {

                $decode = ["metaData" => ["code" => 201,"message" => "Tidak ada data Satu Sehat untuk NIK Tersebut"]];

            }

        } else {

            $decode = ["metaData" => ["code" => 201,"message" => "NIK Tidak ada, Harap masukkan data NIK terlebih dahulu"]];

        }
        
        if ($this->db->trans_status() === false) :
            $this->db->trans_rollback();
            $status = false;
            $pesan = 'Integrasi Pasien Gagal';
        else :
            $this->db->trans_commit();
            $status = true;
            $pesan = 'Integrasi Pasien Berhasil';
        endif;

        $this->response($decode, REST_Controller::HTTP_OK);

    }

    function integrasi_nakes_get()
    {
        $this->db->trans_begin();

        $identitas = $this->get('nik');
        
        $nama = strtolower(preg_replace('/\xc2\xa0/', ' ', $this->get('nama')));
        
        $idMedis = (int)$this->get('id');

        if($identitas !== ""){

            $idUser = $this->session->userdata('id_translucent');

            $getID = $this->sehat->aksesSatuSehat($idUser);

            $tokenBearer = $getID->token;

            $url = $this->satu_sehat->apiurl."Practitioner?identifier=https://fhir.kemkes.go.id/id/nik|".$identitas;

            $header = $this->sehat->authBearer($tokenBearer);

            $output = $this->sehat->postBearer($url, $header);

            $entryOutput = json_decode($output['result']);

            if(isset($entryOutput->entry)){

                if(!empty($entryOutput->entry)){

                    $entryId = $entryOutput->entry;

                    $idNakes = $entryId[0]->resource->id;

                    $cekNama = $entryId[0]->resource->name;

                    $namaNakes = strtolower(preg_replace('/\xc2\xa0/', ' ', $cekNama[0]->text));

                    // if($namaNakes === $nama){

                    $update = ["ihs_number" => $idNakes];

                    $data = $this->db->where('id', $idMedis)->update('sm_tenaga_medis', $update);

                    $decode = ["metaData" => ["code" => 200,"message" => "IHSN Berhasil disimpan"]];

                    // } else {

                    //     $decode = ["metaData" => ["code" => 201,"message" => "Nama tidak sesuai, ". $nama ." >< ". $namaNakes ." "]];

                    // }

                } else {

                   $decode = ["metaData" => ["code" => 201,"message" => "Tidak ada data Satu Sehat untuk NIK Tersebut"]]; 

                }

            } else {

                $decode = ["metaData" => ["code" => 201,"message" => "Tidak ada data Satu Sehat untuk NIK Tersebut"]];

            }

        } else {

            $decode = ["metaData" => ["code" => 201,"message" => "NIK Tidak ada, Harap masukkan data NIK terlebih dahulu"]];

        }
        
        if ($this->db->trans_status() === false) :
            $this->db->trans_rollback();
            $status = false;
            $pesan = 'Integrasi Nakes Gagal';
        else :
            $this->db->trans_commit();
            $status = true;
            $pesan = 'Integrasi Nakes Berhasil';
        endif;

        $this->response($decode, REST_Controller::HTTP_OK);

    }

    function kirim_procedure_post()
    {

        $this->db->trans_begin();

        $idTindakan = (int)$this->post('id');

        $data = $this->sehat->cekTindakanPasien((int)$idTindakan);

        $idUser = $this->session->userdata('id_translucent');

        $getID = $this->sehat->aksesSatuSehat($idUser);

        $tokenBearer = $getID->token;

        $url = $this->satu_sehat->apiurl."Procedure";

        $header = $this->sehat->authBearer($tokenBearer);

        $params=array(
                        "resourceType"=> "Procedure",
                        "status"=> "completed",
                        "code"=> array(
                            "coding"=> [
                                        array(
                                           "system"=> "http://hl7.org/fhir/sid/icd-9-cm",
                                           "code"=> $data->icd9,
                                           "display"=> $data->nama_icd
                                        )
                            ]
                        ),
                        "subject"=> array(
                             "reference"=> "Patient/".$data->ihsn,
                             "display"=> $data->nama_pasien
                        ),
                        "encounter"=> array(
                            "reference"=> "Encounter/".$data->id_encounter,
                            "display"=> "Tindakan ".$data->nama." ".$data->nama_pasien." pada ".convertDateIndo($data->tanggal_layanan)
                        )
        
            );

        $data_api = json_encode($params);

        $output = $this->sehat->postEncounter($url, $data_api, $header);

        if($output['respon'] === 201){

            $result = json_decode($output['result']);

            $update = ["id_tindakan_satset" => $result->id];

            $this->db->where('id', $idTindakan)->update('sm_tarif_tindakan_pasien', $update);

            date_default_timezone_set('Asia/Jakarta');
            
            $xDetailData = ["kategori" => "Procedure Manual", "no_rm" => $data->no_rm, "message" => json_encode($params), "jenis_data" => 'ok', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama')];
            $this->db->insert('sm_satu_sehat_log', $xDetailData);

            $decode = ["metaData" => ["code" => 200,"message" => $output]];

        } else {

            $result = json_decode($output['result']);
            $issued = $result->issue;
            $details = $issued[0]->details;
            date_default_timezone_set('Asia/Jakarta');
            $xDetailData = ["kategori" => "Procedure Manual","no_rm" => $data->no_rm, "message" => json_encode($details), "jenis_data" => 'error', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama')];
            $this->db->insert('sm_satu_sehat_log', $xDetailData);
            $decode = ["metaData" => ["code" => 202,"message" => $details->text]];

        }

        if ($this->db->trans_status() === false) :
            $this->db->trans_rollback();
            $status = false;
            $pesan = 'Integrasi Procedure Gagal';
        else :
            $this->db->trans_commit();
            $status = true;
            $pesan = 'Integrasi Procedure Berhasil';
        endif;

        $this->response($decode, REST_Controller::HTTP_OK);


    }


    function update_procedure_put()
    {

        $this->db->trans_begin();

        $idTindakan = (int)$this->put('id');

        $data = $this->sehat->cekTindakanPasien((int)$idTindakan);

        $idUser = $this->session->userdata('id_translucent');

        $getID = $this->sehat->aksesSatuSehat($idUser);

        $tokenBearer = $getID->token;

        $idParams = $data->id_tindakan_satset;

        $url = $this->satu_sehat->apiurl."Procedure/".$idParams;

        $header = $this->sehat->authBearer($tokenBearer);

        $params=array(
                    "resourceType"=> "Procedure",
                    "id" => $idParams,
                    "status"=> "completed",
                    "code"=> array(
                        "coding"=> [
                                    array(
                                       "system"=> "http://hl7.org/fhir/sid/icd-9-cm",
                                       "code"=> $data->icd9,
                                       "display"=> $data->nama_icd
                                    )
                        ]
                    ),
                    "subject"=> array(
                         "reference"=> "Patient/".$data->ihsn,
                         "display"=> $data->nama_pasien
                    ),
                    "encounter"=> array(
                        "reference"=> "Encounter/".$data->id_encounter,
                        "display"=> "Tindakan ".$data->nama." ".$data->nama_pasien." pada ".convertDateIndo($data->tanggal_layanan)
                    )
                        

        );

        $data_api = json_encode($params);

        $output = $this->sehat->putEncounter($url, $data_api, $header);

        if($output['respon'] === 200){

             date_default_timezone_set('Asia/Jakarta');
            
            $xDetailData = ["kategori" => "Update Procedure Manual", "no_rm" => $data->no_rm, "message" => json_encode($params), "jenis_data" => 'ok', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama')];
            $this->db->insert('sm_satu_sehat_log', $xDetailData);

            $decode = ["metaData" => ["code" => 200,"message" => $output]];

        } else {

            $result = json_decode($output['result']);
            $issued = $result->issue;
            $details = $issued[0]->details;
            date_default_timezone_set('Asia/Jakarta');
            $xDetailData = ["kategori" => "Procedure Manual","no_rm" => $data->no_rm, "message" => json_encode($details), "jenis_data" => 'error', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama')];
            $this->db->insert('sm_satu_sehat_log', $xDetailData);
            $decode = ["metaData" => ["code" => 202,"message" => $details->text]];

        }

        if ($this->db->trans_status() === false) :
            $this->db->trans_rollback();
            $status = false;
            $pesan = 'Integrasi Procedure Gagal';
        else :
            $this->db->trans_commit();
            $status = true;
            $pesan = 'Integrasi Procedure Berhasil';
        endif;

        $this->response($decode, REST_Controller::HTTP_OK);


    }

    function integrasi_sistolik_post()
    {

        $this->db->trans_begin();

        if($this->post('id') === null){

            $cdecode = ["metaData" => ["code" => 201,"message" => 'ID Layanan Tidak ada, harap refresh kembali']];
            die(json_encode($cdecode));

        }

        $idAnamnesa = (int)$this->post('id');

        $dataAnamnesa = $this->sehat->cekDataAnamnesa($idAnamnesa);

        date_default_timezone_set('Asia/Jakarta');

        $dateString = $dataAnamnesa->waktu;

        $date = new DateTime($dateString);

        $formattedDate = $date->format('Y-m-d\TH:i:s+00:00');

        $xKonfigurasi = $this->sehat->getConfigSatuSehat();

        $idUser = $this->session->userdata('id_translucent');

        $getID = $this->sehat->aksesSatuSehat($idUser);

        $tokenBearer = $getID->token;

        $xKonfigurasi = $this->sehat->getConfigSatuSehat();

        $header = $this->sehat->authBearer($tokenBearer);

        if($dataAnamnesa->id_encounter === null){

            $cdecode = ["metaData" => ["code" => 400,"message" => 'Silakan Integrasikan Encounter Terlebih Dahulu ke Satu Sehat']];
            die(json_encode($cdecode));     

        }

        if($dataAnamnesa->ihsn === null){

            $cdecode = ["metaData" => ["code" => 400,"message" => 'Silakan Integrasikan Pasien Terlebih Dahulu ke Satu Sehat']];
            die(json_encode($cdecode));     

        }

        if($dataAnamnesa->ihs_number === null){

            $cdecode = ["metaData" => ["code" => 400,"message" => 'Silakan Integrasikan Dokter Terlebih Dahulu ke Satu Sehat']];
            die(json_encode($cdecode));     

        }

        $code = '8480-6';
        $display = 'Systolic blood pressure';
        $periksa = 'Sistolik';
        $dataUnit = "mm[Hg]";
        $valueCode = "mm[Hg]";

        if($dataAnamnesa->id_satset_sistolik !== null && $dataAnamnesa->id_satset_sistolik !== ''){

            $type = 'update';
            $idSatset = $dataAnamnesa->id_satset_sistolik;

            if($dataAnamnesa->tensi_sistolik !== '' && $dataAnamnesa->tensi_sistolik !== null){

                $dataValue = (int)$dataAnamnesa->tensi_sistolik;
                $status = 'amended';

            } else {

                $dataValue = 0;
                $status = 'cancelled';

            }


        } else {


            if($dataAnamnesa->tensi_sistolik !== '' && $dataAnamnesa->tensi_sistolik !== null){

                $dataValue = (int)$dataAnamnesa->tensi_sistolik;
                $type = 'new';

            } else {

                $cdecode = ["metaData" => ["code" => 400,"message" => 'Nilai Sistolik Kosong, Silakan periksa kembali']];
                die(json_encode($cdecode));   

            }

        }

        if($type === 'new'){

                $url = $xKonfigurasi->apiurl."Observation";

                $params=array(
                            "resourceType"=> "Observation",
                            "status"=> "final",
                            "category"=> [
                                    array(
                                        "coding"=> [
                                                array(
                                                    "system"=>
                                                    "http://terminology.hl7.org/CodeSystem/observation-category",
                                                    "code"=> "vital-signs",
                                                    "display"=> "Vital Signs"
                                                )
                                        ]
                                    )
                            ],
                            "code"=> array(
                                "coding"=> [
                                        array(
                                            "system"=> "http://loinc.org",
                                            "code"=> $code,
                                            "display"=> $display
                                        )
                                ]
                            ),
                            "subject"=> array(
                                    "reference"=> "Patient/".$dataAnamnesa->ihsn
                            ),
                            "performer"=> [
                                    array(
                                        "reference"=> "Practitioner/".$dataAnamnesa->ihs_number
                                    )
                            ],
                            "encounter"=> array(
                                    "reference"=> "Encounter/".$dataAnamnesa->id_encounter,
                                    "display"=> "Pemeriksaan Fisik ".$periksa." ".$dataAnamnesa->nama_pasien." di hari ".convertDateIndo($dataAnamnesa->waktu)
                            ),
                            "effectiveDateTime"=> $formattedDate,
                            "valueQuantity"=> array(
                                        "value"=> $dataValue,
                                        "unit"=> $dataUnit,
                                        "system"=> "http://unitsofmeasure.org",
                                        "code"=> $valueCode
                            )
                );

                $data_api = json_encode($params);
                $output = $this->sehat->postEncounter($url, $data_api, $header);

            } else {

                $url = $xKonfigurasi->apiurl."Observation/".$idSatset;

                $params=array(
                            "resourceType"=> "Observation",
                            "status"=> $status,
                            "category"=> [
                                    array(
                                        "coding"=> [
                                                array(
                                                    "system"=>
                                                    "http://terminology.hl7.org/CodeSystem/observation-category",
                                                    "code"=> "vital-signs",
                                                    "display"=> "Vital Signs"
                                                )
                                        ]
                                    )
                            ],
                            "code"=> array(
                                "coding"=> [
                                        array(
                                            "system"=> "http://loinc.org",
                                            "code"=> $code,
                                            "display"=> $display
                                        )
                                ]
                            ),
                            "subject"=> array(
                                    "reference"=> "Patient/".$dataAnamnesa->ihsn
                            ),
                            "performer"=> [
                                    array(
                                        "reference"=> "Practitioner/".$dataAnamnesa->ihs_number
                                    )
                            ],
                            "encounter"=> array(
                                    "reference"=> "Encounter/".$dataAnamnesa->id_encounter,
                                    "display"=> "Pemeriksaan Fisik ".$periksa." ".$dataAnamnesa->nama_pasien." di hari ".convertDateIndo($dataAnamnesa->waktu)
                            ),
                            "id" => $idSatset,
                            "effectiveDateTime"=> $formattedDate,
                            "valueQuantity"=> array(
                                        "value"=> $dataValue,
                                        "unit"=> $dataUnit,
                                        "system"=> "http://unitsofmeasure.org",
                                        "code"=> $valueCode
                            )
                );

                $data_api = json_encode($params);
                $output = $this->sehat->putEncounter($url, $data_api, $header);

            }

        if($output['respon'] === 201){

            $result = json_decode($output['result']);

            date_default_timezone_set('Asia/Jakarta');
            
            $xDetailData = ["kategori" => "Integrasi Manual Sistolik", "no_rm" => $dataAnamnesa->no_rm, "message" => json_encode($params), "jenis_data" => 'ok', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama')];

            $this->db->insert('sm_satu_sehat_log', $xDetailData);

            $update = ["id_satset_sistolik" => $result->id];

            $data = $this->db->where('id', $idAnamnesa)->update('sm_anamnesa', $update);

            $decode = ["metaData" => ["code" => 200,"message" => 'Integrasi Sistolik Berhasil']];

        } else if($output['respon'] === 200){

            $result = json_decode($output['result']);

            date_default_timezone_set('Asia/Jakarta');

            $xDetailData = ["kategori" => "Update Manual Sistolik", "no_rm" => $dataAnamnesa->no_rm, "message" => json_encode($params), "jenis_data" => 'ok', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama')];

            $this->db->insert('sm_satu_sehat_log', $xDetailData);

            $decode = ["metaData" => ["code" => 200,"message" => 'Update Integrasi Sistolik Berhasil']];

        } else {

            $result = json_decode($output['result']);

            if($type === 'new'){

                $observation = 'Integrasi Manual Sistolik';

            } else {

                $observation = 'Update Manual Sistolik';

            }

            if(isset($result->issue)){

                $issued = $result->issue;
                $details = $issued[0]->details;
                date_default_timezone_set('Asia/Jakarta');
                $xDetailData = ["kategori" => $observation,"no_rm" => $dataAnamnesa->no_rm, "message" => json_encode($details), "jenis_data" => 'error', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama')];
                $this->db->insert('sm_satu_sehat_log', $xDetailData);

                $decode = ["metaData" => ["code" => 400,"message" => 'Integrasi Sistolik Gagal']];
            
            } else {

                date_default_timezone_set('Asia/Jakarta');
                $xDetailData = ["kategori" => $observation,"no_rm" => $dataAnamnesa->no_rm, "message" => $output['result'], "jenis_data" => 'error', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama')];
                $this->db->insert('sm_satu_sehat_log', $xDetailData);

                $decode = ["metaData" => ["code" => 400,"message" => 'Integrasi Sistolik Gagal']];
            
            }

        }

        if ($this->db->trans_status() === false) :
            $this->db->trans_rollback();
            $status = false;
            $pesan = 'Integrasi Sistolik Gagal';
        else :
            $this->db->trans_commit();
            $status = true;
            $pesan = 'Integrasi Sistolik Berhasil';
        endif;

        $this->response($decode, REST_Controller::HTTP_OK);

    }

    function integrasi_diastolik_post()
    {

        $this->db->trans_begin();

        if($this->post('id') === null){

            $cdecode = ["metaData" => ["code" => 201,"message" => 'ID Layanan Tidak ada, harap refresh kembali']];
            die(json_encode($cdecode));

        }

        $idAnamnesa = (int)$this->post('id');

        $dataAnamnesa = $this->sehat->cekDataAnamnesa($idAnamnesa);

        date_default_timezone_set('Asia/Jakarta');

        $dateString = $dataAnamnesa->waktu;

        $date = new DateTime($dateString);

        $formattedDate = $date->format('Y-m-d\TH:i:s+00:00');

        $xKonfigurasi = $this->sehat->getConfigSatuSehat();

        $idUser = $this->session->userdata('id_translucent');

        $getID = $this->sehat->aksesSatuSehat($idUser);

        $tokenBearer = $getID->token;

        $xKonfigurasi = $this->sehat->getConfigSatuSehat();

        $header = $this->sehat->authBearer($tokenBearer);

        if($dataAnamnesa->id_encounter === null){

            $cdecode = ["metaData" => ["code" => 400,"message" => 'Silakan Integrasikan Encounter Terlebih Dahulu ke Satu Sehat']];
            die(json_encode($cdecode));     

        }

        if($dataAnamnesa->ihsn === null){

            $cdecode = ["metaData" => ["code" => 400,"message" => 'Silakan Integrasikan Pasien Terlebih Dahulu ke Satu Sehat']];
            die(json_encode($cdecode));     

        }

        if($dataAnamnesa->ihs_number === null){

            $cdecode = ["metaData" => ["code" => 400,"message" => 'Silakan Integrasikan Dokter Terlebih Dahulu ke Satu Sehat']];
            die(json_encode($cdecode));     

        }

        $code = '8462-4';
        $display = 'Diastolic blood pressure';
        $periksa = 'Diastolik';
        $dataUnit = "mm[Hg]";
        $valueCode = "mm[Hg]";

        if($dataAnamnesa->id_satset_diastolik !== null && $dataAnamnesa->id_satset_diastolik !== ''){

            $type = 'update';
            $idSatset = $dataAnamnesa->id_satset_diastolik;

            if($dataAnamnesa->tensi_diastolik !== '' && $dataAnamnesa->tensi_diastolik !== null){

                $dataValue = (int)$dataAnamnesa->tensi_diastolik;
                $status = 'amended';

            } else {

                $dataValue = 0;
                $status = 'cancelled';

            }


        } else {

            if($dataAnamnesa->tensi_diastolik !== '' && $dataAnamnesa->tensi_diastolik !== null){

                $dataValue = (int)$dataAnamnesa->tensi_diastolik;
                $type = 'new';

            } else {

                $cdecode = ["metaData" => ["code" => 400,"message" => 'Nilai Diastolik Kosong, Silakan periksa kembali']];
                die(json_encode($cdecode));   

            }    

        }

        if($type === 'new'){

                $url = $xKonfigurasi->apiurl."Observation";

                $params=array(
                            "resourceType"=> "Observation",
                            "status"=> "final",
                            "category"=> [
                                    array(
                                        "coding"=> [
                                                array(
                                                    "system"=>
                                                    "http://terminology.hl7.org/CodeSystem/observation-category",
                                                    "code"=> "vital-signs",
                                                    "display"=> "Vital Signs"
                                                )
                                        ]
                                    )
                            ],
                            "code"=> array(
                                "coding"=> [
                                        array(
                                            "system"=> "http://loinc.org",
                                            "code"=> $code,
                                            "display"=> $display
                                        )
                                ]
                            ),
                            "subject"=> array(
                                    "reference"=> "Patient/".$dataAnamnesa->ihsn
                            ),
                            "performer"=> [
                                    array(
                                        "reference"=> "Practitioner/".$dataAnamnesa->ihs_number
                                    )
                            ],
                            "encounter"=> array(
                                    "reference"=> "Encounter/".$dataAnamnesa->id_encounter,
                                    "display"=> "Pemeriksaan Fisik ".$periksa." ".$dataAnamnesa->nama_pasien." di hari ".convertDateIndo($dataAnamnesa->waktu)
                            ),
                            "effectiveDateTime"=> $formattedDate,
                            "valueQuantity"=> array(
                                        "value"=> $dataValue,
                                        "unit"=> $dataUnit,
                                        "system"=> "http://unitsofmeasure.org",
                                        "code"=> $valueCode
                            )
                );

                $data_api = json_encode($params);
                $output = $this->sehat->postEncounter($url, $data_api, $header);

            } else {

                $url = $xKonfigurasi->apiurl."Observation/".$idSatset;

                $params=array(
                            "resourceType"=> "Observation",
                            "status"=> $status,
                            "category"=> [
                                    array(
                                        "coding"=> [
                                                array(
                                                    "system"=>
                                                    "http://terminology.hl7.org/CodeSystem/observation-category",
                                                    "code"=> "vital-signs",
                                                    "display"=> "Vital Signs"
                                                )
                                        ]
                                    )
                            ],
                            "code"=> array(
                                "coding"=> [
                                        array(
                                            "system"=> "http://loinc.org",
                                            "code"=> $code,
                                            "display"=> $display
                                        )
                                ]
                            ),
                            "subject"=> array(
                                    "reference"=> "Patient/".$dataAnamnesa->ihsn
                            ),
                            "performer"=> [
                                    array(
                                        "reference"=> "Practitioner/".$dataAnamnesa->ihs_number
                                    )
                            ],
                            "encounter"=> array(
                                    "reference"=> "Encounter/".$dataAnamnesa->id_encounter,
                                    "display"=> "Pemeriksaan Fisik ".$periksa." ".$dataAnamnesa->nama_pasien." di hari ".convertDateIndo($dataAnamnesa->waktu)
                            ),
                            "id" => $idSatset,
                            "effectiveDateTime"=> $formattedDate,
                            "valueQuantity"=> array(
                                        "value"=> $dataValue,
                                        "unit"=> $dataUnit,
                                        "system"=> "http://unitsofmeasure.org",
                                        "code"=> $valueCode
                            )
                );

                $data_api = json_encode($params);
                $output = $this->sehat->putEncounter($url, $data_api, $header);

            }

        if($output['respon'] === 201){

            $result = json_decode($output['result']);

            date_default_timezone_set('Asia/Jakarta');
            
            $xDetailData = ["kategori" => "Integrasi Manual Diastolik", "no_rm" => $dataAnamnesa->no_rm, "message" => json_encode($params), "jenis_data" => 'ok', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama')];

            $this->db->insert('sm_satu_sehat_log', $xDetailData);

            $update = ["id_satset_diastolik" => $result->id];

            $data = $this->db->where('id', $idAnamnesa)->update('sm_anamnesa', $update);

            $decode = ["metaData" => ["code" => 200,"message" => 'Integrasi Diastolik Berhasil']];

        } else if($output['respon'] === 200){

            $result = json_decode($output['result']);

            date_default_timezone_set('Asia/Jakarta');

            $xDetailData = ["kategori" => "Update Manual Diastolik", "no_rm" => $dataAnamnesa->no_rm, "message" => json_encode($params), "jenis_data" => 'ok', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama')];

            $this->db->insert('sm_satu_sehat_log', $xDetailData);

            $decode = ["metaData" => ["code" => 200,"message" => 'Update Integrasi Diastolik Berhasil']];

        } else {

            $result = json_decode($output['result']);

            if($type === 'new'){

                $observation = 'Integrasi Manual Diastolik';

            } else {

                $observation = 'Update Manual Diastolik';

            }

            if(isset($result->issue)){

                $issued = $result->issue;
                $details = $issued[0]->details;
                date_default_timezone_set('Asia/Jakarta');
                $xDetailData = ["kategori" => $observation,"no_rm" => $dataAnamnesa->no_rm, "message" => json_encode($details), "jenis_data" => 'error', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama')];
                $this->db->insert('sm_satu_sehat_log', $xDetailData);

                $decode = ["metaData" => ["code" => 400,"message" => 'Integrasi Diastolik Gagal']];
            
            } else {

                date_default_timezone_set('Asia/Jakarta');
                $xDetailData = ["kategori" => $observation,"no_rm" => $dataAnamnesa->no_rm, "message" => $output['result'], "jenis_data" => 'error', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama')];
                $this->db->insert('sm_satu_sehat_log', $xDetailData);

                $decode = ["metaData" => ["code" => 400,"message" => 'Integrasi Diastolik Gagal']];
            
            }

        }

        if ($this->db->trans_status() === false) :
            $this->db->trans_rollback();
            $status = false;
            $pesan = 'Integrasi Diastolik Gagal';
        else :
            $this->db->trans_commit();
            $status = true;
            $pesan = 'Integrasi Diastolik Berhasil';
        endif;

        $this->response($decode, REST_Controller::HTTP_OK);

    }

    function integrasi_nadi_post()
    {

        $this->db->trans_begin();

        if($this->post('id') === null){

            $cdecode = ["metaData" => ["code" => 201,"message" => 'ID Tindakan Tidak ada, harap refresh kembali']];
            die(json_encode($cdecode));

        }

        $idAnamnesa = (int)$this->post('id');

        $dataAnamnesa = $this->sehat->cekDataAnamnesa($idAnamnesa);

        date_default_timezone_set('Asia/Jakarta');

        $dateString = $dataAnamnesa->waktu;

        $date = new DateTime($dateString);

        $formattedDate = $date->format('Y-m-d\TH:i:s+00:00');

        $xKonfigurasi = $this->sehat->getConfigSatuSehat();

        $idUser = $this->session->userdata('id_translucent');

        $getID = $this->sehat->aksesSatuSehat($idUser);

        $tokenBearer = $getID->token;

        $xKonfigurasi = $this->sehat->getConfigSatuSehat();

        $header = $this->sehat->authBearer($tokenBearer);

        if($dataAnamnesa->id_encounter === null){

            $cdecode = ["metaData" => ["code" => 400,"message" => 'Silakan Integrasikan Encounter Terlebih Dahulu ke Satu Sehat']];
            die(json_encode($cdecode));     

        }

        if($dataAnamnesa->ihsn === null){

            $cdecode = ["metaData" => ["code" => 400,"message" => 'Silakan Integrasikan Pasien Terlebih Dahulu ke Satu Sehat']];
            die(json_encode($cdecode));     

        }

        if($dataAnamnesa->ihs_number === null){

            $cdecode = ["metaData" => ["code" => 400,"message" => 'Silakan Integrasikan Dokter Terlebih Dahulu ke Satu Sehat']];
            die(json_encode($cdecode));     

        }

        $code = '8867-4';
        $display = 'Heart rate';
        $periksa = 'Nadi';
        $dataUnit = "beats/minute";
        $valueCode = "/min";

        if($dataAnamnesa->id_satset_nadi !== null && $dataAnamnesa->id_satset_nadi !== ''){

            $type = 'update';
            $idSatset = $dataAnamnesa->id_satset_nadi;

            if($dataAnamnesa->nadi !== '' && $dataAnamnesa->nadi !== null){

                $dataValue = (int)$dataAnamnesa->nadi;
                $status = 'amended';

            } else {

                $dataValue = 0;
                $status = 'cancelled';

            }


        } else {

            if($dataAnamnesa->nadi !== '' && $dataAnamnesa->nadi !== null){

                $dataValue = (int)$dataAnamnesa->nadi;
                $type = 'new';

            } else {

                $cdecode = ["metaData" => ["code" => 400,"message" => 'Nilai Nadi Kosong, Silakan periksa kembali']];
                die(json_encode($cdecode));   

            }    

        }

        if($type === 'new'){

            $url = $xKonfigurasi->apiurl."Observation";

            $params=array(
                        "resourceType"=> "Observation",
                        "status"=> "final",
                        "category"=> [
                                array(
                                    "coding"=> [
                                            array(
                                                "system"=>
                                                "http://terminology.hl7.org/CodeSystem/observation-category",
                                                "code"=> "vital-signs",
                                                "display"=> "Vital Signs"
                                            )
                                    ]
                                )
                        ],
                        "code"=> array(
                            "coding"=> [
                                    array(
                                        "system"=> "http://loinc.org",
                                        "code"=> $code,
                                        "display"=> $display
                                    )
                            ]
                        ),
                        "subject"=> array(
                                "reference"=> "Patient/".$dataAnamnesa->ihsn
                        ),
                        "performer"=> [
                                array(
                                    "reference"=> "Practitioner/".$dataAnamnesa->ihs_number
                                )
                        ],
                        "encounter"=> array(
                                "reference"=> "Encounter/".$dataAnamnesa->id_encounter,
                                "display"=> "Pemeriksaan Fisik ".$periksa." ".$dataAnamnesa->nama_pasien." di hari ".convertDateIndo($dataAnamnesa->waktu)
                        ),
                        "effectiveDateTime"=> $formattedDate,
                        "valueQuantity"=> array(
                                    "value"=> $dataValue,
                                    "unit"=> $dataUnit,
                                    "system"=> "http://unitsofmeasure.org",
                                    "code"=> $valueCode
                        )
            );

            $data_api = json_encode($params);
            $output = $this->sehat->postEncounter($url, $data_api, $header);

        } else {

            $url = $xKonfigurasi->apiurl."Observation/".$idSatset;

            $params=array(
                        "resourceType"=> "Observation",
                        "status"=> $status,
                        "category"=> [
                                array(
                                    "coding"=> [
                                            array(
                                                "system"=>
                                                "http://terminology.hl7.org/CodeSystem/observation-category",
                                                "code"=> "vital-signs",
                                                "display"=> "Vital Signs"
                                            )
                                    ]
                                )
                        ],
                        "code"=> array(
                            "coding"=> [
                                    array(
                                        "system"=> "http://loinc.org",
                                        "code"=> $code,
                                        "display"=> $display
                                    )
                            ]
                        ),
                        "subject"=> array(
                                "reference"=> "Patient/".$dataAnamnesa->ihsn
                        ),
                        "performer"=> [
                                array(
                                    "reference"=> "Practitioner/".$dataAnamnesa->ihs_number
                                )
                        ],
                        "encounter"=> array(
                                "reference"=> "Encounter/".$dataAnamnesa->id_encounter,
                                "display"=> "Pemeriksaan Fisik ".$periksa." ".$dataAnamnesa->nama_pasien." di hari ".convertDateIndo($dataAnamnesa->waktu)
                        ),
                        "id" => $idSatset,
                        "effectiveDateTime"=> $formattedDate,
                        "valueQuantity"=> array(
                                    "value"=> $dataValue,
                                    "unit"=> $dataUnit,
                                    "system"=> "http://unitsofmeasure.org",
                                    "code"=> $valueCode
                        )
            );

            $data_api = json_encode($params);
            $output = $this->sehat->putEncounter($url, $data_api, $header);

        }

        if($output['respon'] === 201){

            $result = json_decode($output['result']);

            date_default_timezone_set('Asia/Jakarta');
            
            $xDetailData = ["kategori" => "Integrasi Manual Nadi", "no_rm" => $dataAnamnesa->no_rm, "message" => json_encode($params), "jenis_data" => 'ok', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama')];

            $this->db->insert('sm_satu_sehat_log', $xDetailData);

            $update = ["id_satset_nadi" => $result->id];

            $data = $this->db->where('id', $idAnamnesa)->update('sm_anamnesa', $update);

            $decode = ["metaData" => ["code" => 200,"message" => 'Integrasi Nadi Berhasil']];

        } else if($output['respon'] === 200){

            $result = json_decode($output['result']);

            date_default_timezone_set('Asia/Jakarta');

            $xDetailData = ["kategori" => "Update Manual Nadi", "no_rm" => $dataAnamnesa->no_rm, "message" => json_encode($params), "jenis_data" => 'ok', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama')];

            $this->db->insert('sm_satu_sehat_log', $xDetailData);

            $decode = ["metaData" => ["code" => 200,"message" => 'Update Integrasi Nadi Berhasil']];

        } else {

            $result = json_decode($output['result']);

            if($type === 'new'){

                $observation = 'Integrasi Manual Nadi';

            } else {

                $observation = 'Update Manual Nadi';

            }

            if(isset($result->issue)){

                $issued = $result->issue;
                $details = $issued[0]->details;
                date_default_timezone_set('Asia/Jakarta');
                $xDetailData = ["kategori" => $observation,"no_rm" => $dataAnamnesa->no_rm, "message" => json_encode($details), "jenis_data" => 'error', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama')];
                $this->db->insert('sm_satu_sehat_log', $xDetailData);

                $decode = ["metaData" => ["code" => 400,"message" => 'Integrasi Nadi Gagal']];
            
            } else {

                date_default_timezone_set('Asia/Jakarta');
                $xDetailData = ["kategori" => $observation,"no_rm" => $dataAnamnesa->no_rm, "message" => $output['result'], "jenis_data" => 'error', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama')];
                $this->db->insert('sm_satu_sehat_log', $xDetailData);

                $decode = ["metaData" => ["code" => 400,"message" => 'Integrasi Nadi Gagal']];
            
            }

        }

        if ($this->db->trans_status() === false) :
            $this->db->trans_rollback();
            $status = false;
            $pesan = 'Integrasi Nadi Gagal';
        else :
            $this->db->trans_commit();
            $status = true;
            $pesan = 'Integrasi Nadi Berhasil';
        endif;

        $this->response($decode, REST_Controller::HTTP_OK);

    }

    function integrasi_respirasi_post()
    {

        $this->db->trans_begin();

        if($this->post('id') === null){

            $cdecode = ["metaData" => ["code" => 201,"message" => 'ID Tindakan Tidak ada, harap refresh kembali']];
            die(json_encode($cdecode));

        }

        $idAnamnesa = (int)$this->post('id');

        $dataAnamnesa = $this->sehat->cekDataAnamnesa($idAnamnesa);

        date_default_timezone_set('Asia/Jakarta');

        $dateString = $dataAnamnesa->waktu;

        $date = new DateTime($dateString);

        $formattedDate = $date->format('Y-m-d\TH:i:s+00:00');

        $xKonfigurasi = $this->sehat->getConfigSatuSehat();

        $idUser = $this->session->userdata('id_translucent');

        $getID = $this->sehat->aksesSatuSehat($idUser);

        $tokenBearer = $getID->token;

        $xKonfigurasi = $this->sehat->getConfigSatuSehat();

        $header = $this->sehat->authBearer($tokenBearer);

        if($dataAnamnesa->ihsn === null){

            $cdecode = ["metaData" => ["code" => 400,"message" => 'Silakan Integrasikan Pasien Terlebih Dahulu ke Satu Sehat']];
            die(json_encode($cdecode));     

        }

        if($dataAnamnesa->ihs_number === null){

            $cdecode = ["metaData" => ["code" => 400,"message" => 'Silakan Integrasikan Dokter Terlebih Dahulu ke Satu Sehat']];
            die(json_encode($cdecode));     

        }

        if($dataAnamnesa->id_encounter === null){

            $cdecode = ["metaData" => ["code" => 400,"message" => 'Silakan Integrasikan Encounter Terlebih Dahulu ke Satu Sehat']];
            die(json_encode($cdecode));     

        }

        $code = '9279-1';
        $display = 'Respiratory rate';
        $periksa = 'Pernafasan';
        $dataUnit = "breaths/minute";
        $valueCode = "/min";

        if($dataAnamnesa->id_satset_rr !== null && $dataAnamnesa->id_satset_rr !== ''){

            $type = 'update';
            $idSatset = $dataAnamnesa->id_satset_rr;

            if($dataAnamnesa->rr !== '' && $dataAnamnesa->rr !== null){

                $dataValue = (int)$dataAnamnesa->rr;
                $status = 'amended';

            } else {

                $dataValue = 0;
                $status = 'cancelled';

            }


        } else {

            if($dataAnamnesa->rr !== '' && $dataAnamnesa->rr !== null){

                $dataValue = (int)$dataAnamnesa->rr;
                $type = 'new';

            } else {

                $cdecode = ["metaData" => ["code" => 400,"message" => 'Nilai Nadi Kosong, Silakan periksa kembali']];
                die(json_encode($cdecode));   

            }    

        }

        if($type === 'new'){

            $url = $xKonfigurasi->apiurl."Observation";

            $params=array(
                        "resourceType"=> "Observation",
                        "status"=> "final",
                        "category"=> [
                                array(
                                    "coding"=> [
                                            array(
                                                "system"=>
                                                "http://terminology.hl7.org/CodeSystem/observation-category",
                                                "code"=> "vital-signs",
                                                "display"=> "Vital Signs"
                                            )
                                    ]
                                )
                        ],
                        "code"=> array(
                            "coding"=> [
                                    array(
                                        "system"=> "http://loinc.org",
                                        "code"=> $code,
                                        "display"=> $display
                                    )
                            ]
                        ),
                        "subject"=> array(
                                "reference"=> "Patient/".$dataAnamnesa->ihsn
                        ),
                        "performer"=> [
                                array(
                                    "reference"=> "Practitioner/".$dataAnamnesa->ihs_number
                                )
                        ],
                        "encounter"=> array(
                                "reference"=> "Encounter/".$dataAnamnesa->id_encounter,
                                "display"=> "Pemeriksaan Fisik ".$periksa." ".$dataAnamnesa->nama_pasien." di hari ".convertDateIndo($dataAnamnesa->waktu)
                        ),
                        "effectiveDateTime"=> $formattedDate,
                        "valueQuantity"=> array(
                                    "value"=> $dataValue,
                                    "unit"=> $dataUnit,
                                    "system"=> "http://unitsofmeasure.org",
                                    "code"=> $valueCode
                        )
            );

            $data_api = json_encode($params);
            $output = $this->sehat->postEncounter($url, $data_api, $header);

        } else {

            $url = $xKonfigurasi->apiurl."Observation/".$idSatset;

            $params=array(
                        "resourceType"=> "Observation",
                        "status"=> $status,
                        "category"=> [
                                array(
                                    "coding"=> [
                                            array(
                                                "system"=>
                                                "http://terminology.hl7.org/CodeSystem/observation-category",
                                                "code"=> "vital-signs",
                                                "display"=> "Vital Signs"
                                            )
                                    ]
                                )
                        ],
                        "code"=> array(
                            "coding"=> [
                                    array(
                                        "system"=> "http://loinc.org",
                                        "code"=> $code,
                                        "display"=> $display
                                    )
                            ]
                        ),
                        "subject"=> array(
                                "reference"=> "Patient/".$dataAnamnesa->ihsn
                        ),
                        "performer"=> [
                                array(
                                    "reference"=> "Practitioner/".$dataAnamnesa->ihs_number
                                )
                        ],
                        "encounter"=> array(
                                "reference"=> "Encounter/".$dataAnamnesa->id_encounter,
                                "display"=> "Pemeriksaan Fisik ".$periksa." ".$dataAnamnesa->nama_pasien." di hari ".convertDateIndo($dataAnamnesa->waktu)
                        ),
                        "id" => $idSatset,
                        "effectiveDateTime"=> $formattedDate,
                        "valueQuantity"=> array(
                                    "value"=> $dataValue,
                                    "unit"=> $dataUnit,
                                    "system"=> "http://unitsofmeasure.org",
                                    "code"=> $valueCode
                        )
            );

            $data_api = json_encode($params);
            $output = $this->sehat->putEncounter($url, $data_api, $header);

        }

        if($output['respon'] === 201){

            $result = json_decode($output['result']);

            date_default_timezone_set('Asia/Jakarta');
            
            $xDetailData = ["kategori" => "Integrasi Manual Respirasi", "no_rm" => $dataAnamnesa->no_rm, "message" => json_encode($params), "jenis_data" => 'ok', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama')];

            $this->db->insert('sm_satu_sehat_log', $xDetailData);

            $update = ["id_satset_rr" => $result->id];

            $data = $this->db->where('id', $idAnamnesa)->update('sm_anamnesa', $update);

            $decode = ["metaData" => ["code" => 200,"message" => 'Integrasi Respirasi Berhasil']];

        } else if($output['respon'] === 200){

            $result = json_decode($output['result']);

            date_default_timezone_set('Asia/Jakarta');

            $xDetailData = ["kategori" => "Update Manual Respirasi", "no_rm" => $dataAnamnesa->no_rm, "message" => json_encode($params), "jenis_data" => 'ok', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama')];

            $this->db->insert('sm_satu_sehat_log', $xDetailData);

            $decode = ["metaData" => ["code" => 200,"message" => 'Update Integrasi Respirasi Berhasil']];

        } else {

            $result = json_decode($output['result']);

            if($type === 'new'){

                $observation = 'Integrasi Manual Respirasi';

            } else {

                $observation = 'Update Manual Respirasi';

            }

            if(isset($result->issue)){

                $issued = $result->issue;
                $details = $issued[0]->details;
                date_default_timezone_set('Asia/Jakarta');
                $xDetailData = ["kategori" => $observation,"no_rm" => $dataAnamnesa->no_rm, "message" => json_encode($details), "jenis_data" => 'error', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama')];
                $this->db->insert('sm_satu_sehat_log', $xDetailData);

                $decode = ["metaData" => ["code" => 400,"message" => 'Integrasi Respirasi Gagal']];
            
            } else {

                date_default_timezone_set('Asia/Jakarta');
                $xDetailData = ["kategori" => $observation,"no_rm" => $dataAnamnesa->no_rm, "message" => $output['result'], "jenis_data" => 'error', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama')];
                $this->db->insert('sm_satu_sehat_log', $xDetailData);

                $decode = ["metaData" => ["code" => 400,"message" => 'Integrasi Respirasi Gagal']];
            
            }

        }

        if ($this->db->trans_status() === false) :
            $this->db->trans_rollback();
            $status = false;
            $pesan = 'Integrasi Respirasi Gagal';
        else :
            $this->db->trans_commit();
            $status = true;
            $pesan = 'Integrasi Respirasi Berhasil';
        endif;

        $this->response($decode, REST_Controller::HTTP_OK);

    }

    function integrasi_suhu_post()
    {

        $this->db->trans_begin();

        if($this->post('id') === null){

            $cdecode = ["metaData" => ["code" => 201,"message" => 'ID Tindakan Tidak ada, harap refresh kembali']];
            die(json_encode($cdecode));

        }

        $idAnamnesa = (int)$this->post('id');

        $dataAnamnesa = $this->sehat->cekDataAnamnesa($idAnamnesa);

        date_default_timezone_set('Asia/Jakarta');

        $dateString = $dataAnamnesa->waktu;

        $date = new DateTime($dateString);

        $formattedDate = $date->format('Y-m-d\TH:i:s+00:00');

        $xKonfigurasi = $this->sehat->getConfigSatuSehat();

        $idUser = $this->session->userdata('id_translucent');

        $getID = $this->sehat->aksesSatuSehat($idUser);

        $tokenBearer = $getID->token;

        $xKonfigurasi = $this->sehat->getConfigSatuSehat();

        $header = $this->sehat->authBearer($tokenBearer);

        if($dataAnamnesa->ihsn === null){

            $cdecode = ["metaData" => ["code" => 400,"message" => 'Silakan Integrasikan Pasien Terlebih Dahulu ke Satu Sehat']];
            die(json_encode($cdecode));     

        }

        if($dataAnamnesa->ihs_number === null){

            $cdecode = ["metaData" => ["code" => 400,"message" => 'Silakan Integrasikan Dokter Terlebih Dahulu ke Satu Sehat']];
            die(json_encode($cdecode));     

        }

        if($dataAnamnesa->id_encounter === null){

            $cdecode = ["metaData" => ["code" => 400,"message" => 'Silakan Integrasikan Encounter Terlebih Dahulu ke Satu Sehat']];
            die(json_encode($cdecode));     

        }

        $code = '8310-5';
        $display = 'Body temperature';
        $periksa = 'Suhu';
        $dataUnit = "C";
        $valueCode = "Cel";

        if($dataAnamnesa->id_satset_suhu !== null && $dataAnamnesa->id_satset_suhu !== ''){

            $type = 'update';
            $idSatset = $dataAnamnesa->id_satset_suhu;

            if($dataAnamnesa->suhu !== '' && $dataAnamnesa->suhu !== null){

                $dataValue = (int)$dataAnamnesa->suhu;
                $status = 'amended';

            } else {

                $dataValue = 0;
                $status = 'cancelled';

            }


        } else {

            if($dataAnamnesa->suhu !== '' && $dataAnamnesa->suhu !== null){

                $dataValue = (int)$dataAnamnesa->suhu;
                $type = 'new';

            } else {

                $cdecode = ["metaData" => ["code" => 400,"message" => 'Nilai Suhu Kosong, Silakan periksa kembali']];
                die(json_encode($cdecode));   

            }    

        }

        if($type === 'new'){

            $url = $xKonfigurasi->apiurl."Observation";

            $params=array(
                        "resourceType"=> "Observation",
                        "status"=> "final",
                        "category"=> [
                                array(
                                    "coding"=> [
                                            array(
                                                "system"=>
                                                "http://terminology.hl7.org/CodeSystem/observation-category",
                                                "code"=> "vital-signs",
                                                "display"=> "Vital Signs"
                                            )
                                    ]
                                )
                        ],
                        "code"=> array(
                            "coding"=> [
                                    array(
                                        "system"=> "http://loinc.org",
                                        "code"=> $code,
                                        "display"=> $display
                                    )
                            ]
                        ),
                        "subject"=> array(
                                "reference"=> "Patient/".$dataAnamnesa->ihsn
                        ),
                        "performer"=> [
                                array(
                                    "reference"=> "Practitioner/".$dataAnamnesa->ihs_number
                                )
                        ],
                        "encounter"=> array(
                                "reference"=> "Encounter/".$dataAnamnesa->id_encounter,
                                "display"=> "Pemeriksaan Fisik ".$periksa." ".$dataAnamnesa->nama_pasien." di hari ".convertDateIndo($dataAnamnesa->waktu)
                        ),
                        "effectiveDateTime"=> $formattedDate,
                        "valueQuantity"=> array(
                                    "value"=> $dataValue,
                                    "unit"=> $dataUnit,
                                    "system"=> "http://unitsofmeasure.org",
                                    "code"=> $valueCode
                        )
            );

            $data_api = json_encode($params);
            $output = $this->sehat->postEncounter($url, $data_api, $header);

        } else {

            $url = $xKonfigurasi->apiurl."Observation/".$idSatset;

            $params=array(
                        "resourceType"=> "Observation",
                        "status"=> $status,
                        "category"=> [
                                array(
                                    "coding"=> [
                                            array(
                                                "system"=>
                                                "http://terminology.hl7.org/CodeSystem/observation-category",
                                                "code"=> "vital-signs",
                                                "display"=> "Vital Signs"
                                            )
                                    ]
                                )
                        ],
                        "code"=> array(
                            "coding"=> [
                                    array(
                                        "system"=> "http://loinc.org",
                                        "code"=> $code,
                                        "display"=> $display
                                    )
                            ]
                        ),
                        "subject"=> array(
                                "reference"=> "Patient/".$dataAnamnesa->ihsn
                        ),
                        "performer"=> [
                                array(
                                    "reference"=> "Practitioner/".$dataAnamnesa->ihs_number
                                )
                        ],
                        "encounter"=> array(
                                "reference"=> "Encounter/".$dataAnamnesa->id_encounter,
                                "display"=> "Pemeriksaan Fisik ".$periksa." ".$dataAnamnesa->nama_pasien." di hari ".convertDateIndo($dataAnamnesa->waktu)
                        ),
                        "id" => $idSatset,
                        "effectiveDateTime"=> $formattedDate,
                        "valueQuantity"=> array(
                                    "value"=> $dataValue,
                                    "unit"=> $dataUnit,
                                    "system"=> "http://unitsofmeasure.org",
                                    "code"=> $valueCode
                        )
            );

            $data_api = json_encode($params);
            $output = $this->sehat->putEncounter($url, $data_api, $header);

        }

        if($output['respon'] === 201){

            $result = json_decode($output['result']);

            date_default_timezone_set('Asia/Jakarta');
            
            $xDetailData = ["kategori" => "Integrasi Manual Suhu", "no_rm" => $dataAnamnesa->no_rm, "message" => json_encode($params), "jenis_data" => 'ok', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama')];

            $this->db->insert('sm_satu_sehat_log', $xDetailData);

            $update = ["id_satset_suhu" => $result->id];

            $data = $this->db->where('id', $idAnamnesa)->update('sm_anamnesa', $update);

            $decode = ["metaData" => ["code" => 200,"message" => 'Integrasi Suhu Berhasil']];

        } else if($output['respon'] === 200){

            $result = json_decode($output['result']);

            date_default_timezone_set('Asia/Jakarta');

            $xDetailData = ["kategori" => "Update Manual Suhu", "no_rm" => $dataAnamnesa->no_rm, "message" => json_encode($params), "jenis_data" => 'ok', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama')];

            $this->db->insert('sm_satu_sehat_log', $xDetailData);

            $decode = ["metaData" => ["code" => 200,"message" => 'Update Integrasi Suhu Berhasil']];

        } else {

            $result = json_decode($output['result']);

            if($type === 'new'){

                $observation = 'Integrasi Manual Suhu';

            } else {

                $observation = 'Update Manual Suhu';

            }

            if(isset($result->issue)){

                $issued = $result->issue;
                $details = $issued[0]->details;
                date_default_timezone_set('Asia/Jakarta');
                $xDetailData = ["kategori" => $observation,"no_rm" => $dataAnamnesa->no_rm, "message" => json_encode($details), "jenis_data" => 'error', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama')];
                $this->db->insert('sm_satu_sehat_log', $xDetailData);

                $decode = ["metaData" => ["code" => 400,"message" => 'Integrasi Suhu Gagal']];
            
            } else {

                date_default_timezone_set('Asia/Jakarta');
                $xDetailData = ["kategori" => $observation,"no_rm" => $dataAnamnesa->no_rm, "message" => $output['result'], "jenis_data" => 'error', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama')];
                $this->db->insert('sm_satu_sehat_log', $xDetailData);

                $decode = ["metaData" => ["code" => 400,"message" => 'Integrasi Suhu Gagal']];
            
            }

        }

        if ($this->db->trans_status() === false) :
            $this->db->trans_rollback();
            $status = false;
            $pesan = 'Integrasi Suhu Gagal';
        else :
            $this->db->trans_commit();
            $status = true;
            $pesan = 'Integrasi Suhu Berhasil';
        endif;

        $this->response($decode, REST_Controller::HTTP_OK);

    }

    function ambil_medication_get()
    {
        
        if (!$this->get('page')) :  
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)  
        endif;

        $search = [
            'tanggal_awal'      => safe_get('tanggal_awal'),
            'tanggal_akhir'     => safe_get('tanggal_akhir'),
            'id'                => $this->get('id'),
            'nama'              => $this->get('nama'),
            'poli'               => $this->get('poli'),
        ];

        $start = $this->mulai($this->get('page'));

        $data = $this->sehat->ambilMedication($this->batas, $start, $search);

        $data['page'] = (int) $this->get('page');
        $data['limit'] = $this->batas;

        if ($data) :
            $this->response($data, REST_Controller::HTTP_OK);
        endif;
    }

    function integrasi_medication_get()
    {
        
        if (!$this->get('page')) :  
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)  
        endif;

        $search = [
            'tanggal_awal'      => safe_get('tanggal_awal'),
            'tanggal_akhir'     => safe_get('tanggal_akhir'),
            'id'                => $this->get('id'),
            'nama'              => $this->get('nama'),
            'poli'               => $this->get('poli'),
        ];


        $start = $this->mulai($this->get('page'));

        $data = $this->sehat->integrasiMedication($this->batas, $start, $search);

        $data['page'] = (int) $this->get('page');
        $data['limit'] = $this->batas;

        if ($data) :
            $this->response($data, REST_Controller::HTTP_OK);
        endif;
        
    }

    function integrasi_medication_auto_get()
    {
        
       $search = [
            'tanggal_awal'      => safe_get('tanggal_awal'),
            'tanggal_akhir'     => safe_get('tanggal_akhir'),
            'id'                => $this->get('id'),
            'nama'              => $this->get('nama'),
            'poli'              => $this->get('poli'),
        ];

        $data = $this->sehat->integrasiMedication(0, 0, $search);

        if ($data) :
            $this->response($data, REST_Controller::HTTP_OK);
        endif;
    }

    function ambil_medication_dispense_get()
    {
        
        if (!$this->get('page')) :  
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)  
        endif;

        $search = [
            'tanggal_awal'      => safe_get('tanggal_awal'),
            'tanggal_akhir'     => safe_get('tanggal_akhir'),
            'id'                => $this->get('id'),
            'nama'              => $this->get('nama'),
            'poli'               => $this->get('poli'),
        ];

        $start = $this->mulai($this->get('page'));

        $data = $this->sehat->ambilMedicationDispense($this->batas, $start, $search);

        $data['page'] = (int) $this->get('page');
        $data['limit'] = $this->batas;

        if ($data) :
            $this->response($data, REST_Controller::HTTP_OK);
        endif;
    }

    function integrasi_medication_dispense_get()
    {
        
        if (!$this->get('page')) :  
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)  
        endif;

        $search = [
            'tanggal_awal'      => safe_get('tanggal_awal'),
            'tanggal_akhir'     => safe_get('tanggal_akhir'),
            'id'                => $this->get('id'),
            'nama'              => $this->get('nama'),
            'poli'               => $this->get('poli'),
        ];


        $start = $this->mulai($this->get('page'));

        $data = $this->sehat->integrasiMedicationDispense($this->batas, $start, $search);

        $data['page'] = (int) $this->get('page');
        $data['limit'] = $this->batas;

        if ($data) :
            $this->response($data, REST_Controller::HTTP_OK);
        endif;
        
    }

    function integrasi_medication_dispense_auto_get()
    {
        $search = [
            'tanggal_awal'      => safe_get('tanggal_awal'),
            'tanggal_akhir'     => safe_get('tanggal_akhir'),
            'id'                => $this->get('id'),
            'nama'              => $this->get('nama'),
            'poli'               => $this->get('poli'),
        ];


        $data = $this->sehat->integrasiMedicationDispense(0,0, $search);

        if ($data) :
            $this->response($data, REST_Controller::HTTP_OK);
        endif;
        
    }

    private function konversiTanggalMedication(){

        date_default_timezone_set('Asia/Jakarta');

        $tglSekarang = new DateTime();

        $ubahFormat = $tglSekarang->format('Y-m-d\TH:i:sP');

        return $ubahFormat;

    }

    function integrasiMedication_post($idR = null)
    {

        if($idR !== null){

            $idResep = $idR;

        } else {

            if (!$this->post('id')) :  
                $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)  
                exit();
            endif;

            $idResep = $this->post('id');

        }
        

        $dataDetailResep = $this->db->select('r.id, rr.id as id_resep_r, b.id as id_barang, b.nama_lengkap as nama_obat, tm.ihs_number as ihs_dokter, pg.nama as nama_pegawai, r.id as id_resep_item, rs.id as id_resep, rs.id_pasien as no_rm, p.nama as nama_pasien, p.ihsn, rr.keterangan_resep, rr.racik, s.code as code_sediaan, s.display as nama_sediaan, l.id_encounter, rr.aturan_pakai, ro.code as roa_code, ro.display as roa_display, r.dosis_racik, r.jumlah_pakai, uom.code as code_ucum')
                ->from('sm_resep_r_detail as r')
                ->join('sm_resep_r as rr', 'rr.id = r.id_resep_r', 'left')
                ->join('sm_resep as rs', 'rs.id = rr.id_resep', 'left')
                ->join('sm_layanan_pendaftaran as l', 'l.id = rs.id_layanan_pendaftaran', 'left')
                ->join('sm_tenaga_medis as tm', 'tm.id = rs.id_dokter', 'left')
                ->join('sm_pegawai as pg', 'pg.id = tm.id_pegawai', 'left')
                ->join('sm_pasien as p', 'p.id = rs.id_pasien', 'left')
                ->join('sm_barang as b', 'b.id = r.id_barang', 'left')
                ->join('sm_satuan as sat', 'sat.id = b.satuan_kekuatan', 'left')
                ->join('sm_unit_of_measure as uom', 'uom.code = sat.code_ucum', 'left')
                ->join('sm_roa as ro', 'ro.roa = b.roa', 'left')
                ->join('sm_sediaan as s', 's.id = b.id_sediaan', 'left')
                ->where('r.id', $idResep, true)
                ->get()
                ->row();

        if(isset($dataDetailResep->racik)){

            $this->autentikasi_user_post();

            $this->load->model('satu_sehat/Satu_sehat_model', 'sehat');

            $xKonfigurasi = $this->sehat->getConfigSatuSehat();

            $idUser = $this->session->userdata('id_translucent');

            $getID = $this->sehat->aksesSatuSehat($idUser);

            $tokenBearer = $getID->token;

            $xKonfigurasi = $this->sehat->getConfigSatuSehat();

            $header = $this->sehat->authBearer($tokenBearer);

            $url = $xKonfigurasi->apiurl."Medication";

            if($dataDetailResep->racik === '0'){

                $codeExtension = 'NC';
                $displayExtension = 'Non-compound';

            } else {

                if($dataDetailResep->keterangan_resep !== '' && $dataDetailResep->keterangan_resep !== null){

                    $codeExtension = 'SD';
                    $displayExtension = 'Gives of such doses';

                } else {

                    $codeExtension = 'EP';
                    $displayExtension = 'Divide into equal parts';

                }

            }

            $params= array(
               "resourceType"=> "Medication",
               "meta"=> array(
                   "profile"=> [
                       "https://fhir.kemkes.go.id/r4/StructureDefinition/Medication"
                   ]
               ),
               "identifier"=> [
                   array(
                       "system"=> "http://sys-ids.kemkes.go.id/medication/".$xKonfigurasi->organization,
                       "use"=> "official",
                       "value"=> $dataDetailResep->id
                   )
               ],
               "status"=> "active",
               "form"=> array(
                   "coding"=> [
                       array(
                           "system"=> "http://terminology.kemkes.go.id/CodeSystem/medication-form",
                           "code"=> $dataDetailResep->code_sediaan,
                           "display"=> $dataDetailResep->nama_sediaan
                       )
                   ]
               ),
               "extension"=> [
                   array(
                       "url"=> "https://fhir.kemkes.go.id/r4/StructureDefinition/MedicationType",
                       "valueCodeableConcept"=> array(
                           "coding"=> [
                               array(
                                   "system"=> "http://terminology.kemkes.go.id/CodeSystem/medication-type",
                                   "code"=> $codeExtension,
                                   "display"=> $displayExtension
                               )
                           ]
                       )
                   )
               ]
            );

            $dataApi = json_encode($params);

            $output = $this->sehat->postEncounter($url, $dataApi, $header);

            if($output['respon'] === 201){

                $result = json_decode($output['result']);

                date_default_timezone_set('Asia/Jakarta');

                $update = ["id_integrasi_resep" => $result->id];

                $this->db->where('id', $idResep)->update('sm_resep_r_detail', $update);
                
                $xDetailData = ["kategori" => "Manual Medication", "no_rm" => $dataDetailResep->no_rm, "message" => json_encode($params), "jenis_data" => 'ok', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama'), "respon" => $output['respon'], "function" => 'integrasiMedication_post'];

                $this->db->insert('sm_satu_sehat_log', $xDetailData);

                if(isset($result->id)){

                    $this->autentikasi_user_post();

                    $this->load->model('satu_sehat/Satu_sehat_model', 'sehat');

                    $xKonfigurasiRequest = $this->sehat->getConfigSatuSehat();

                    $idUserRequest = $this->session->userdata('id_translucent');

                    $getIDRequest = $this->sehat->aksesSatuSehat($idUser);

                    $tokenBearerRequest = $getIDRequest->token;

                    $headerRequest = $this->sehat->authBearer($tokenBearer);

                    $urlRequest = $xKonfigurasi->apiurl."MedicationRequest";

                    if($dataDetailResep->keterangan_resep !== '' && $dataDetailResep->keterangan_resep !== null){

                        $intent = 'instance-order';

                    } else {

                        $intent = 'original-order';

                    }

                    $authoredOn = $this->konversiTanggalMedication();

                    $dataAturanPakai = $this->db->select('rr.id, rr.aturan_pakai, rr.sequence')
                        ->from('sm_resep_r as rr')
                        ->join('sm_resep as rs', 'rs.id = rr.id_resep', 'left')
                        ->where('rs.id', $dataDetailResep->id_resep, true)
                        ->get()
                        ->result();


                    if(!empty($dataAturanPakai)){

                        foreach ($dataAturanPakai as $key => $racik) {
                            $dataRacik[] = $racik->aturan_pakai;
                        }


                                
                                

                        $firstValue = reset($dataRacik); // Fungsi reset mengambil elemen pertama dari array
                        $allSame = true; // Flag untuk menandai apakah semua nilai sama

                        foreach ($dataRacik as $value) {
                            if ($value !== $firstValue) {
                                $allSame = false;
                                break; // Keluar dari loop karena sudah ada nilai yang berbeda
                            }
                        }

                        if ($allSame) {

                            $sequence = 1;

                        } else {

                            $dataDetailResepR = $this->db->select('rr.id, rr.aturan_pakai, rr.sequence')
                            ->from('sm_resep_r as rr')
                            ->where('rr.id', $dataDetailResep->id_resep_r, true)
                            ->get()
                            ->row();
                            
                            if($dataDetailResepR->sequence !== null && $dataDetailResepR->sequence !== ''){
                                
                                $sequence = (int)$dataDetailResepR->sequence;

                            } else {

                                $x = 1;
                                $currentAturanPakai = null;

                                foreach ($dataAturanPakai as $index => $item) {
                                    
                                    if ($item->aturan_pakai !== $currentAturanPakai) {
                                        // Jika 'aturan_pakai' berbeda dari yang sebelumnya, increment sequence
                                        $currentAturanPakai = $item->aturan_pakai;
                                        $dataAturanPakai[$index]->sequence = $x++;
                                    } else {
                                        // Jika sama, gunakan sequence yang sama
                                        $dataAturanPakai[$index]->sequence = $x - 1;
                                    }
                                }

                                foreach ($dataAturanPakai as $x => $y) {

                                    $updateRequest = ["sequence" => (int)$y->sequence];

                                    $this->db->where('id', (int)$y->id)->update('sm_resep_r', $updateRequest);
                                    
                                }

                                $cekUlangResepR = $this->db->select('rr.id, rr.aturan_pakai, rr.sequence')
                                    ->from('sm_resep_r as rr')
                                    ->where('rr.id', $dataDetailResep->id_resep_r, true)
                                    ->get()
                                    ->row();

                                if(isset($cekUlangResepR->sequence)){

                                    $sequence = $cekUlangResepR->sequence;

                                }

                            }

                        }

                        $cekRelasiAturan = $this->db->select('apo.jml_pemberian')
                        ->from('sm_aturan_pakai_obat as apo')
                        ->where('apo.signa', $dataDetailResep->aturan_pakai, true)
                        ->where('apo.is_active', 1, true)
                        ->get()
                        ->row();

                        if(isset($cekRelasiAturan->jml_pemberian)){

                            $frequencyPeriod = $cekRelasiAturan->jml_pemberian;

                        } else {

                            date_default_timezone_set('Asia/Jakarta');
                            $xDetailDataRequest = ["kategori" => "Manual MedicationRequest","no_rm" => $dataDetailResep->no_rm, "message" => 'Tidak Ada data jumlah pemberian di sm resep r', "jenis_data" => 'error', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama'), "param" => $dataDetailResep->id_resep.' Medication '.$result->id, "respon" => $output['respon'], "function" => 'integrasiMedication_post'];
                            $this->db->insert('sm_satu_sehat_log', $xDetailDataRequest);

                            $decodeResponse = ["metaData" => ["code" => 502,"message" => 'Tidak Ada data jumlah pemberian di sm resep r']];

                            $this->response($decodeResponse, REST_Controller::HTTP_OK);
                            exit();

                        }


                    } else {

                        date_default_timezone_set('Asia/Jakarta');
                        $xDetailDataRequest = ["kategori" => "Manual MedicationRequest","no_rm" => $dataDetailResep->no_rm, "message" => 'Tidak Ada Aturan Pakai', "jenis_data" => 'error', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama'), "param" => $dataDetailResep->id_resep.' Medication '.$result->id, "respon" => $output['respon'], "function" => 'integrasiMedication_post'];
                        $this->db->insert('sm_satu_sehat_log', $xDetailDataRequest);

                        $decodeResponse = ["metaData" => ["code" => 502,"message" => 'Tidak Ada Aturan Pakai']];

                        $this->response($decodeResponse, REST_Controller::HTTP_OK);
                        exit();

                    }

                    $paramRequest =  array(
                       "resourceType"=> "MedicationRequest",
                       "identifier"=> [
                           array(
                               "system"=> "http://sys-ids.kemkes.go.id/prescription/".$xKonfigurasi->organization,
                               "use"=> "official",
                               "value"=> $dataDetailResep->id_resep
                           ),
                           array(
                               "system"=> "http://sys-ids.kemkes.go.id/prescription-item/".$xKonfigurasi->organization,
                               "use"=> "official",
                               "value"=> $dataDetailResep->id_resep_item
                           )
                       ],
                       "status"=> "active",
                       "intent"=> $intent,
                       "category"=> [
                           array(
                               "coding"=> [
                                   array(
                                       "system"=> "http://terminology.hl7.org/CodeSystem/medicationrequest-category",
                                       "code"=> "outpatient",
                                       "display"=> "Outpatient"
                                   )
                               ]
                           )
                       ],
                       "medicationReference"=> array(
                           "reference"=> "Medication/".$result->id,
                           "display"=> $dataDetailResep->nama_obat
                       ),
                       "subject"=> array(
                           "reference"=> "Patient/".$dataDetailResep->ihsn,
                           "display"=> $dataDetailResep->nama_pasien
                       ),
                       "encounter"=> array(
                           "reference"=> "Encounter/".$dataDetailResep->id_encounter
                       ),
                       "authoredOn"=> $authoredOn,
                       "requester"=> array(
                           "reference"=> "Practitioner/".$dataDetailResep->ihs_dokter,
                           "display"=> $dataDetailResep->nama_pegawai
                       ),
                       "dosageInstruction"=> [
                           array(
                               "sequence"=> (int)$sequence,
                               "timing"=> array(
                                   "repeat"=> array(
                                       "frequency"=> (int)$frequencyPeriod,
                                       "period"=> (int)$frequencyPeriod,
                                       "periodUnit"=> "d"
                                   )
                               ),
                               "route"=> array(
                                   "coding"=> [
                                       array(
                                           "system"=> "http://www.whocc.no/atc",
                                           "code"=> $dataDetailResep->roa_code,
                                           "display"=> $dataDetailResep->roa_display
                                       )
                                   ]
                               ),
                               "doseAndRate"=> [
                                   array(
                                       "doseQuantity"=> array(
                                           "value"=> (int)$dataDetailResep->dosis_racik,
                                           "unit"=> $dataDetailResep->code_ucum,
                                           "system"=> "http://unitsofmeasure.org",
                                           "code"=> $dataDetailResep->code_ucum
                                       )
                                   )
                               ]
                           )
                       ],
                       "dispenseRequest"=> array(
                           "quantity"=> array(
                               "value"=> (int)$dataDetailResep->jumlah_pakai,
                               "unit"=> $dataDetailResep->code_ucum,
                               "system"=> "http://unitsofmeasure.org",
                               "code"=> $dataDetailResep->code_ucum
                           ),
                           "performer"=> array(
                               "reference"=> "Organization/".$xKonfigurasi->organization
                           )
                       )
                    );

                    $dataApiRequest = json_encode($paramRequest);

                    $outputRequest = $this->sehat->postEncounter($urlRequest, $dataApiRequest, $headerRequest);

                    if($output['respon'] === 201){

                        $resultRequest = json_decode($outputRequest['result']);

                        date_default_timezone_set('Asia/Jakarta');

                        if(isset($resultRequest->id)){

                            $updateRequest = ["id_medication_request" => $resultRequest->id];

                            $this->db->where('id', $idResep)->update('sm_resep_r_detail', $updateRequest);

                            if(isset($dataDetailResep->id_barang)){

                                $dataObatTebus = $this->db->select('r.id')
                                ->from('sm_resep_tebus_r_detail as r')
                                ->join('sm_resep_tebus_r as rr', 'rr.id = r.id_resep_tebus_r', 'left')
                                ->join('sm_resep_tebus as rs', 'rs.id = rr.id_resep_tebus', 'left')
                                ->where('r.id_barang', (int)$dataDetailResep->id_barang, true)
                                ->where('rs.id_resep', (int)$dataDetailResep->id_resep, true)
                                ->get()
                                ->row();

                                if(isset($dataObatTebus->id)){

                                    $updateObatTebus = ["id_integrasi_resep" => $result->id, "id_medication_request" => $resultRequest->id];

                                    $this->db->where('id', (int)$dataObatTebus->id)->update('sm_resep_tebus_r_detail', $updateObatTebus);

                                }

                            }
                            
                            $xDetailDataRequest = ["kategori" => "Manual MedicationRequest", "no_rm" => $dataDetailResep->no_rm, "message" => json_encode($paramRequest), "jenis_data" => 'ok', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama'), "respon" => $output['respon'], "function" => 'integrasiMedication_post'];

                            $this->db->insert('sm_satu_sehat_log', $xDetailDataRequest);

                            $decodeResponse = ["metaData" => ["code" => 201,"message" => 'Integrasi Medication Request Berhasil']];

                            $this->response($decodeResponse, REST_Controller::HTTP_OK);

                        } else {

                            $xDetailDataRequest = ["kategori" => "Manual MedicationRequest", "no_rm" => $dataDetailResep->no_rm, "message" => json_encode($paramRequest), "jenis_data" => 'error', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama'), "respon" => $output['respon'], "param" => $outputRequest['result'], "function" => 'integrasiMedication_post'];

                            $this->db->insert('sm_satu_sehat_log', $xDetailDataRequest);

                            $decodeResponse = ["metaData" => ["code" => 502,"message" => 'Gagal Integrasi Medication Request, Silakan Cek Log Satu Sehat']];

                            $this->response($decodeResponse, REST_Controller::HTTP_OK);

                        }

                    } else {

                        $resultRequest = json_decode($outputRequest['result']);

                        date_default_timezone_set('Asia/Jakarta');
                        $xDetailDataRequest = ["kategori" => "Manual MedicationRequest","no_rm" => $dataDetailResep->no_rm, "message" => $outputRequest['result'], "jenis_data" => 'error', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama'), "param" => json_encode($paramRequest), "respon" => $output['respon'], "function" => 'integrasiMedication_post'];
                        $this->db->insert('sm_satu_sehat_log', $xDetailDataRequest);

                        $decodeResponse = ["metaData" => ["code" => 502,"message" => 'Gagal Integrasi Medication Request, Silakan Cek Log Satu Sehat']];

                        $this->response($decodeResponse, REST_Controller::HTTP_OK);
                        
                    }

                }

            } else {

                $result = json_decode($output['result']);

                if(isset($result->issue)){

                    $issued = $result->issue;
                    $details = $issued[0]->details;
                    date_default_timezone_set('Asia/Jakarta');
                    $xDetailData = ["kategori" => "Manual Medication","no_rm" => $dataDetailResep->no_rm, "message" => $output['result'], "jenis_data" => 'error', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama'), "param" => json_encode($params), "respon" => $output['respon'], "function" => 'integrasiMedication_post'];
                    $this->db->insert('sm_satu_sehat_log', $xDetailData);
                

                    $decodeResponse = ["metaData" => ["code" => 502,"message" => 'Gagal Integrasi Medication Request, Silakan Cek Log Satu Sehat']];

                    $this->response($decodeResponse, REST_Controller::HTTP_OK);

                } else {

                    date_default_timezone_set('Asia/Jakarta');
                    $xDetailData = ["kategori" => "Manual Medication","no_rm" => $dataDetailResep->no_rm, "message" => $output['result'], "jenis_data" => 'error', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama'), "param" => json_encode($params), "respon" => $output['respon'], "function" => 'integrasiMedication_post'];
                    $this->db->insert('sm_satu_sehat_log', $xDetailData);

                    $decodeResponse = ["metaData" => ["code" => 502,"message" => 'Gagal Integrasi Medication Request, Silakan Cek Log Satu Sehat']];

                    $this->response($decodeResponse, REST_Controller::HTTP_OK);
                
                }

            }

        }

    }

    function integrasiMedicationRequest_post()
    {

        if (!$this->post('id')) :  
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)  
        endif;

        $idResep = $this->post('id');

        $dataDetailResep = $this->db->select('r.id, rr.id as id_resep_r, b.id as id_barang, b.nama_lengkap as nama_obat, tm.ihs_number as ihs_dokter, pg.nama as nama_pegawai, r.id as id_resep_item, rs.id as id_resep, rs.id_pasien as no_rm, p.nama as nama_pasien, p.ihsn, rr.keterangan_resep, rr.racik, s.code as code_sediaan, s.display as nama_sediaan, l.id_encounter, rr.aturan_pakai, ro.code as roa_code, ro.display as roa_display, r.dosis_racik, r.jumlah_pakai, uom.code as code_ucum, r.id_integrasi_resep, r.id_medication_request')
                ->from('sm_resep_r_detail as r')
                ->join('sm_resep_r as rr', 'rr.id = r.id_resep_r', 'left')
                ->join('sm_resep as rs', 'rs.id = rr.id_resep', 'left')
                ->join('sm_layanan_pendaftaran as l', 'l.id = rs.id_layanan_pendaftaran', 'left')
                ->join('sm_tenaga_medis as tm', 'tm.id = rs.id_dokter', 'left')
                ->join('sm_pegawai as pg', 'pg.id = tm.id_pegawai', 'left')
                ->join('sm_pasien as p', 'p.id = rs.id_pasien', 'left')
                ->join('sm_barang as b', 'b.id = r.id_barang', 'left')
                ->join('sm_satuan as sat', 'sat.id = b.satuan_kekuatan', 'left')
                ->join('sm_unit_of_measure as uom', 'uom.code = sat.code_ucum', 'left')
                ->join('sm_roa as ro', 'ro.roa = b.roa', 'left')
                ->join('sm_sediaan as s', 's.id = b.id_sediaan', 'left')
                ->where('r.id', (int)$idResep, true)
                ->get()
                ->row();

        if(isset($dataDetailResep->id_medication_request)){

            $decode = ["metaData" => ["code" => 400,"message" => 'Medication Request sudah pernah dilakukan sebelumnya, silakan pilih Update Medication untuk memperbaharui data Medication Request']];

            die(json_encode($decode));

        }

        if(isset($dataDetailResep->id_integrasi_resep)){

            $this->autentikasi_user_post('ok');

            $this->load->model('satu_sehat/Satu_sehat_model', 'sehat');

            $xKonfigurasiRequest = $this->sehat->getConfigSatuSehat();

            $idUserRequest = $this->session->userdata('id_translucent');

            $getIDRequest = $this->sehat->aksesSatuSehat($idUserRequest);

            $tokenBearerRequest = $getIDRequest->token;

            $headerRequest = $this->sehat->authBearer($tokenBearerRequest);

            $urlRequest = $xKonfigurasiRequest->apiurl."MedicationRequest";

            if($dataDetailResep->keterangan_resep !== '' && $dataDetailResep->keterangan_resep !== null){

                $intent = 'instance-order';

            } else {

                $intent = 'original-order';

            }

            $authoredOn = $this->konversiTanggalMedication();

            $dataAturanPakai = $this->db->select('rr.id, rr.aturan_pakai, rr.sequence')
                ->from('sm_resep_r as rr')
                ->join('sm_resep as rs', 'rs.id = rr.id_resep', 'left')
                ->where('rs.id', $dataDetailResep->id_resep, true)
                ->get()
                ->result();

            if(!empty($dataAturanPakai)){

                foreach ($dataAturanPakai as $key => $racik) {
                    $dataRacik[] = $racik->aturan_pakai;
                }


                $firstValue = reset($dataRacik); // Fungsi reset mengambil elemen pertama dari array
                $allSame = true; // Flag untuk menandai apakah semua nilai sama

                foreach ($dataRacik as $value) {
                    if ($value !== $firstValue) {
                        $allSame = false;
                        break; // Keluar dari loop karena sudah ada nilai yang berbeda
                    }
                }

                if ($allSame) {

                    $sequence = 1;

                } else {

                    $dataDetailResepR = $this->db->select('rr.id, rr.aturan_pakai, rr.sequence')
                    ->from('sm_resep_r as rr')
                    ->where('rr.id', $dataDetailResep->id_resep_r, true)
                    ->get()
                    ->row();
                    
                    if($dataDetailResepR->sequence !== null && $dataDetailResepR->sequence !== ''){
                        
                        $sequence = (int)$dataDetailResepR->sequence;

                    } else {

                        $x = 1;
                        $currentAturanPakai = null;

                        foreach ($dataAturanPakai as $index => $item) {
                            
                            if ($item->aturan_pakai !== $currentAturanPakai) {
                                // Jika 'aturan_pakai' berbeda dari yang sebelumnya, increment sequence
                                $currentAturanPakai = $item->aturan_pakai;
                                $dataAturanPakai[$index]->sequence = $x++;
                            } else {
                                // Jika sama, gunakan sequence yang sama
                                $dataAturanPakai[$index]->sequence = $x - 1;
                            }
                        }

                        foreach ($dataAturanPakai as $x => $y) {

                            $updateRequest = ["sequence" => (int)$y->sequence];

                            $this->db->where('id', (int)$y->id)->update('sm_resep_r', $updateRequest);
                            
                        }

                        $cekUlangResepR = $this->db->select('rr.id, rr.aturan_pakai, rr.sequence')
                            ->from('sm_resep_r as rr')
                            ->where('rr.id', $dataDetailResep->id_resep_r, true)
                            ->get()
                            ->row();

                        if(isset($cekUlangResepR->sequence)){

                            $sequence = $cekUlangResepR->sequence;

                        }

                    }

                }

                $cekRelasiAturan = $this->db->select('apo.jml_pemberian')
                ->from('sm_aturan_pakai_obat as apo')
                ->where('apo.signa', $dataDetailResep->aturan_pakai, true)
                ->where('apo.is_active', 1, true)
                ->get()
                ->row();

                if(isset($cekRelasiAturan->jml_pemberian)){

                    $frequencyPeriod = $cekRelasiAturan->jml_pemberian;

                } else {

                    date_default_timezone_set('Asia/Jakarta');
                    $xDetailDataRequest = ["kategori" => "Manual MedicationRequest","no_rm" => $dataDetailResep->no_rm, "message" => 'Tidak Ada data jumlah pemberian di sm resep r', "jenis_data" => 'error', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama'), "param" => $dataDetailResep->id_resep.' Medication '.$dataDetailResep->id_integrasi_resep, "function" => 'integrasiMedicationRequest_post'];
                    $this->db->insert('sm_satu_sehat_log', $xDetailDataRequest);

                    $decode = ["metaData" => ["code" => 400,"message" => 'Tidak Ada data jumlah pemberian di sm resep r']];

                    die(json_encode($decode));

                }


            } else {

                date_default_timezone_set('Asia/Jakarta');
                $xDetailDataRequest = ["kategori" => "Manual MedicationRequest","no_rm" => $dataDetailResep->no_rm, "message" => 'Tidak Ada Aturan Pakai', "jenis_data" => 'error', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama'), "param" => $dataDetailResep->id_resep.' Medication '.$dataDetailResep->id_integrasi_resep, "function" => 'integrasiMedicationRequest_post'];
                $this->db->insert('sm_satu_sehat_log', $xDetailDataRequest);

                $decode = ["metaData" => ["code" => 400,"message" => 'Tidak Ada Aturan Pakai']];

                die(json_encode($decode));

            }

            $paramRequest =  array(
               "resourceType"=> "MedicationRequest",
               "identifier"=> [
                   array(
                       "system"=> "http://sys-ids.kemkes.go.id/prescription/".$xKonfigurasiRequest->organization,
                       "use"=> "official",
                       "value"=> $dataDetailResep->id_resep
                   ),
                   array(
                       "system"=> "http://sys-ids.kemkes.go.id/prescription-item/".$xKonfigurasiRequest->organization,
                       "use"=> "official",
                       "value"=> $dataDetailResep->id_resep_item
                   )
               ],
               "status"=> "active",
               "intent"=> $intent,
               "category"=> [
                   array(
                       "coding"=> [
                           array(
                               "system"=> "http://terminology.hl7.org/CodeSystem/medicationrequest-category",
                               "code"=> "outpatient",
                               "display"=> "Outpatient"
                           )
                       ]
                   )
               ],
               "medicationReference"=> array(
                   "reference"=> "Medication/".$dataDetailResep->id_integrasi_resep,
                   "display"=> $dataDetailResep->nama_obat
               ),
               "subject"=> array(
                   "reference"=> "Patient/".$dataDetailResep->ihsn,
                   "display"=> $dataDetailResep->nama_pasien
               ),
               "encounter"=> array(
                   "reference"=> "Encounter/".$dataDetailResep->id_encounter
               ),
               "authoredOn"=> $authoredOn,
               "requester"=> array(
                   "reference"=> "Practitioner/".$dataDetailResep->ihs_dokter,
                   "display"=> $dataDetailResep->nama_pegawai
               ),
               "dosageInstruction"=> [
                   array(
                       "sequence"=> (int)$sequence,
                       "timing"=> array(
                           "repeat"=> array(
                               "frequency"=> (int)$frequencyPeriod,
                               "period"=> (int)$frequencyPeriod,
                               "periodUnit"=> "d"
                           )
                       ),
                       "route"=> array(
                           "coding"=> [
                               array(
                                   "system"=> "http://www.whocc.no/atc",
                                   "code"=> $dataDetailResep->roa_code,
                                   "display"=> $dataDetailResep->roa_display
                               )
                           ]
                       ),
                       "doseAndRate"=> [
                           array(
                               "doseQuantity"=> array(
                                   "value"=> (int)$dataDetailResep->dosis_racik,
                                   "unit"=> $dataDetailResep->code_ucum,
                                   "system"=> "http://unitsofmeasure.org",
                                   "code"=> $dataDetailResep->code_ucum
                               )
                           )
                       ]
                   )
               ],
               "dispenseRequest"=> array(
                   "quantity"=> array(
                       "value"=> (int)$dataDetailResep->jumlah_pakai,
                       "unit"=> $dataDetailResep->code_ucum,
                       "system"=> "http://unitsofmeasure.org",
                       "code"=> $dataDetailResep->code_ucum
                   ),
                   "performer"=> array(
                       "reference"=> "Organization/".$xKonfigurasiRequest->organization
                   )
               )
            );

            $dataApiRequest = json_encode($paramRequest);

            $outputRequest = $this->sehat->postEncounter($urlRequest, $dataApiRequest, $headerRequest);

            if($outputRequest['respon'] === 201){

                $resultRequest = json_decode($outputRequest['result']);

                date_default_timezone_set('Asia/Jakarta');

                if(isset($resultRequest->id)){

                    $updateRequest = ["id_medication_request" => $resultRequest->id];

                    $this->db->where('id', $idResep)->update('sm_resep_r_detail', $updateRequest);

                    if(isset($dataDetailResep->id_barang)){

                        $dataObatTebus = $this->db->select('r.id')
                        ->from('sm_resep_tebus_r_detail as r')
                        ->join('sm_resep_tebus_r as rr', 'rr.id = r.id_resep_tebus_r', 'left')
                        ->join('sm_resep_tebus as rs', 'rs.id = rr.id_resep_tebus', 'left')
                        ->where('r.id_barang', (int)$dataDetailResep->id_barang, true)
                        ->where('rs.id_resep', (int)$dataDetailResep->id_resep, true)
                        ->get()
                        ->row();

                        if(isset($dataObatTebus->id)){

                            $updateObatTebus = ["id_integrasi_resep" => $dataDetailResep->id_integrasi_resep, "id_medication_request" => $resultRequest->id];

                            $this->db->where('id', (int)$dataObatTebus->id)->update('sm_resep_tebus_r_detail', $updateObatTebus);

                        }

                    }
                    
                    $xDetailDataRequest = ["kategori" => "Manual MedicationRequest", "no_rm" => $dataDetailResep->no_rm, "message" => json_encode($paramRequest), "jenis_data" => 'ok', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama'), "respon" => $outputRequest['respon'], "function" => 'integrasiMedicationRequest_post'];

                    $this->db->insert('sm_satu_sehat_log', $xDetailDataRequest);

                    $decodeResponse = ["metaData" => ["code" => 201,"message" => 'Integrasi Medication Request Berhasil']];

                    $this->response($decodeResponse, REST_Controller::HTTP_OK);


                } else {

                    $xDetailDataRequest = ["kategori" => "Manual MedicationRequest", "no_rm" => $dataDetailResep->no_rm, "message" => json_encode($paramRequest), "jenis_data" => 'error', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama'), "respon" => $output['respon'], "param" => $outputRequest['result'], "function" => 'integrasiMedicationRequest_post'];

                    $this->db->insert('sm_satu_sehat_log', $xDetailDataRequest);

                    $decodeResponse = ["metaData" => ["code" => 502,"message" => 'Gagal Integrasi Medication Request']];

                    $this->response($decodeResponse, REST_Controller::HTTP_OK);

                }

            } else {

                $resultRequest = json_decode($outputRequest['result']);

                date_default_timezone_set('Asia/Jakarta');
                $xDetailDataRequest = ["kategori" => "Manual MedicationRequest","no_rm" => $dataDetailResep->no_rm, "message" => $outputRequest['result'], "jenis_data" => 'error', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama'), "param" => json_encode($paramRequest), "respon" => $outputRequest['respon'], "function" => 'integrasiMedicationRequest_post'];
                $this->db->insert('sm_satu_sehat_log', $xDetailDataRequest);
                
                $decodeResponse = ["metaData" => ["code" => 502,"message" => 'Gagal Integrasi Medication Request']];

                $this->response($decodeResponse, REST_Controller::HTTP_OK);

            }

        }

    }

    function updateMedication_post()
    {

        if (!$this->post('id')) :  
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)  
            exit();
        endif;

        $idResep = (int)$this->post('id');
        $x = $this->post('x');

        $dataDetailResep = $this->db->select('r.id, rs.id as id_rsp, b.id as id_barang, r.id_integrasi_resep, r.id_medication_request, b.nama_lengkap as nama_obat, tm.ihs_number as ihs_dokter, pg.nama as nama_pegawai, r.id as id_resep_item, rs.id as id_resep, rs.id_pasien as no_rm, rr.id as id_resep_r, p.nama as nama_pasien, p.ihsn, rr.keterangan_resep, l.id_encounter, rr.aturan_pakai, rr.racik, s.code as code_sediaan, s.display as nama_sediaan, ro.code as roa_code, ro.display as roa_display, r.dosis_racik, r.jumlah_pakai, uom.code as code_ucum')
                ->from('sm_resep_r_detail as r')
                ->join('sm_resep_r as rr', 'rr.id = r.id_resep_r', 'left')
                ->join('sm_resep as rs', 'rs.id = rr.id_resep', 'left')
                ->join('sm_layanan_pendaftaran as l', 'l.id = rs.id_layanan_pendaftaran', 'left')
                ->join('sm_tenaga_medis as tm', 'tm.id = rs.id_dokter', 'left')
                ->join('sm_pegawai as pg', 'pg.id = tm.id_pegawai', 'left')
                ->join('sm_pasien as p', 'p.id = rs.id_pasien', 'left')
                ->join('sm_barang as b', 'b.id = r.id_barang', 'left')
                ->join('sm_satuan as sat', 'sat.id = b.satuan_kekuatan', 'left')
                ->join('sm_unit_of_measure as uom', 'uom.code = sat.code_ucum', 'left')
                ->join('sm_roa as ro', 'ro.roa = b.roa', 'left')
                ->join('sm_sediaan as s', 's.id = b.id_sediaan', 'left')
                ->where('r.id', (int)$idResep, true)
                ->get()
                ->row();

        if(isset($dataDetailResep->racik)){

            if($x === 'Edit'){

                if(isset($dataDetailResep->id_integrasi_resep)){

                    $idIntegrasiResep = $dataDetailResep->id_integrasi_resep;
                    $idMedicationRequest = $dataDetailResep->id_medication_request;

                    if(isset($dataDetailResep->id_barang)){

                        $dataObatTebus = $this->db->select('r.id')
                        ->from('sm_resep_tebus_r_detail as r')
                        ->join('sm_resep_tebus_r as rr', 'rr.id = r.id_resep_tebus_r', 'left')
                        ->join('sm_resep_tebus as rs', 'rs.id = rr.id_resep_tebus', 'left')
                        ->where('r.id_barang', (int)$dataDetailResep->id_barang, true)
                        ->where('rs.id_resep', (int)$dataDetailResep->id_rsp, true)
                        ->get()
                        ->row();

                        if(isset($dataObatTebus->id)){

                            $updateObatTebus = ["id_integrasi_resep" => $dataDetailResep->id_integrasi_resep, "id_medication_request" => $dataDetailResep->id_medication_request];

                            $this->db->where('id', (int)$dataObatTebus->id)->update('sm_resep_tebus_r_detail', $updateObatTebus);

                        }

                    }

                } else {

                    $this->integrasiMedication_post($idResep);

                    exit();
                }

            } else {

                $idIntegrasiResep = $dataDetailResep->id_integrasi_resep;
                $idMedicationRequest = $dataDetailResep->id_medication_request;

            }

            $this->autentikasi_user_post();

            $this->load->model('satu_sehat/Satu_sehat_model', 'sehat');

            $xKonfigurasi = $this->sehat->getConfigSatuSehat();

            $idUser = $this->session->userdata('id_translucent');

            $getID = $this->sehat->aksesSatuSehat($idUser);

            $tokenBearer = $getID->token;

            $xKonfigurasi = $this->sehat->getConfigSatuSehat();

            $header = $this->sehat->authBearer($tokenBearer);

            $url = $xKonfigurasi->apiurl."Medication/".$dataDetailResep->id_integrasi_resep;

            if($dataDetailResep->racik === '0'){

                $codeExtension = 'NC';
                $displayExtension = 'Non-compound';

            } else {

                if($dataDetailResep->keterangan_resep !== '' && $dataDetailResep->keterangan_resep !== null){

                    $codeExtension = 'SD';
                    $displayExtension = 'Gives of such doses';

                } else {

                    $codeExtension = 'EP';
                    $displayExtension = 'Divide into equal parts';

                }

            }

            if(isset($x)){

                if($x === 'Edit'){

                    $tipeEdit = 'active';
                    $tipeMedication = 'active';
                
                } else {

                    $tipeEdit = 'entered-in-error';
                    $tipeMedication = 'cancelled';
                    
                }

            }

            $params= array(
               "resourceType"=> "Medication",
               "id"=> $idIntegrasiResep,
               "meta"=> array(
                   "profile"=> [
                       "https://fhir.kemkes.go.id/r4/StructureDefinition/Medication"
                   ]
               ),
               "identifier"=> [
                   array(
                       "system"=> "http://sys-ids.kemkes.go.id/medication/".$xKonfigurasi->organization,
                       "use"=> "official",
                       "value"=> $dataDetailResep->id
                   )
               ],
               "status"=> $tipeEdit,
               "form"=> array(
                   "coding"=> [
                       array(
                           "system"=> "http://terminology.kemkes.go.id/CodeSystem/medication-form",
                           "code"=> $dataDetailResep->code_sediaan,
                           "display"=> $dataDetailResep->nama_sediaan
                       )
                   ]
               ),
               "extension"=> [
                   array(
                       "url"=> "https://fhir.kemkes.go.id/r4/StructureDefinition/MedicationType",
                       "valueCodeableConcept"=> array(
                           "coding"=> [
                               array(
                                   "system"=> "http://terminology.kemkes.go.id/CodeSystem/medication-type",
                                   "code"=> $codeExtension,
                                   "display"=> $displayExtension
                               )
                           ]
                       )
                   )
               ]
            );

            $dataApi = json_encode($params);

            $output = $this->sehat->putEncounter($url, $dataApi, $header);

            if($output['respon'] === 200){

                $result = json_decode($output['result']);

                date_default_timezone_set('Asia/Jakarta');

                $update = ["respon_edit" => 'OK'];

                $this->db->where('id_reseprdetaillog', $idResep)->update('sm_reseprdetaillog', $update);

                $xDetailData = ["kategori" => "Update Manual Medication", "no_rm" => $dataDetailResep->no_rm, "message" => json_encode($params), "jenis_data" => 'ok', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama'), "respon" => $output['respon'], "function" => 'updateMedication_post'];

                $this->db->insert('sm_satu_sehat_log', $xDetailData);

                if(isset($result->id)){

                    $this->autentikasi_user_post();

                    $this->load->model('satu_sehat/Satu_sehat_model', 'sehat');

                    $xKonfigurasiRequest = $this->sehat->getConfigSatuSehat();

                    $idUserRequest = $this->session->userdata('id_translucent');

                    $getIDRequest = $this->sehat->aksesSatuSehat($idUserRequest);

                    $tokenBearerRequest = $getIDRequest->token;

                    $headerRequest = $this->sehat->authBearer($tokenBearerRequest);

                    $urlRequest = $xKonfigurasiRequest->apiurl."MedicationRequest";

                    if($dataDetailResep->keterangan_resep !== '' && $dataDetailResep->keterangan_resep !== null){

                        $intent = 'instance-order';

                    } else {

                        $intent = 'original-order';

                    }

                    $authoredOn = $this->konversiTanggalMedication();

                    $dataAturanPakai = $this->db->select('rr.id, rr.aturan_pakai, rr.sequence')
                        ->from('sm_resep_r as rr')
                        ->join('sm_resep as rs', 'rs.id = rr.id_resep', 'left')
                        ->where('rs.id', $dataDetailResep->id_rsp, true)
                        ->get()
                        ->result();


                    if(!empty($dataAturanPakai)){

                        foreach ($dataAturanPakai as $key => $racik) {
                            $dataRacik[] = $racik->aturan_pakai;
                            // $dataSequence['sequence'] = $racik->sequence;
                            // $dataSequence['id'] = $racik->id;
                        }


                        $firstValue = reset($dataRacik); // Fungsi reset mengambil elemen pertama dari array
                        $allSame = true; // Flag untuk menandai apakah semua nilai sama

                        foreach ($dataRacik as $value) {
                            if ($value !== $firstValue) {
                                $allSame = false;
                                break; // Keluar dari loop karena sudah ada nilai yang berbeda
                            }
                        }

                        if ($allSame) {

                            $sequence = 1;

                        } else {

                            $dataDetailResepR = $this->db->select('rr.id, rr.aturan_pakai, rr.sequence')
                            ->from('sm_resep_r as rr')
                            ->where('rr.id', $dataDetailResep->id_resep_r, true)
                            ->get()
                            ->row();
                            
                            if($dataDetailResepR->sequence !== null && $dataDetailResepR->sequence !== ''){
                                
                                $sequence = (int)$dataDetailResepR->sequence;

                            } else {

                                $x = 1;
                                $currentAturanPakai = null;

                                foreach ($dataAturanPakai as $index => $item) {
                                    
                                    if ($item->aturan_pakai !== $currentAturanPakai) {
                                        // Jika 'aturan_pakai' berbeda dari yang sebelumnya, increment sequence
                                        $currentAturanPakai = $item->aturan_pakai;
                                        $dataAturanPakai[$index]->sequence = $x++;
                                    } else {
                                        // Jika sama, gunakan sequence yang sama
                                        $dataAturanPakai[$index]->sequence = $x - 1;
                                    }
                                }

                                foreach ($dataAturanPakai as $x => $y) {

                                    $updateRequest = ["sequence" => $y->sequence];

                                    $this->db->where('id', (int)$y->id)->update('sm_resep_r', $updateRequest);
                                    
                                }

                                $cekUlangResepR = $this->db->select('rr.id, rr.aturan_pakai, rr.sequence')
                                    ->from('sm_resep_r as rr')
                                    ->where('rr.id', $dataDetailResep->id_resep_r, true)
                                    ->get()
                                    ->row();

                                if(isset($cekUlangResepR->sequence)){

                                    $sequence = $cekUlangResepR->sequence;

                                }

                            }

                        }

                        $cekRelasiAturan = $this->db->select('apo.jml_pemberian')
                        ->from('sm_aturan_pakai_obat as apo')
                        ->where('apo.signa', $dataDetailResep->aturan_pakai, true)
                        ->where('apo.is_active', 1, true)
                        ->get()
                        ->row();

                        if(isset($cekRelasiAturan->jml_pemberian)){

                            $frequencyPeriod = $cekRelasiAturan->jml_pemberian;

                        } else {

                            date_default_timezone_set('Asia/Jakarta');
                            $xDetailDataRequest = ["kategori" => "Update Manual Medication","no_rm" => $dataDetailResep->no_rm, "message" => 'Tidak Ada data jumlah pemberian di sm resep r', "jenis_data" => 'error', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama'), "param" => $dataDetailResep->id_resep.' Medication '.$result->id, "respon" => $output['respon'], "function" => 'updateMedication_post'];
                            $this->db->insert('sm_satu_sehat_log', $xDetailDataRequest);

                            $decode = ["metaData" => ["code" => 400,"message" => 'Tidak Ada data jumlah pemberian di sm resep r']];

                            die(json_encode($decode));

                        }


                    } else {

                        date_default_timezone_set('Asia/Jakarta');
                        $xDetailDataRequest = ["kategori" => "Update Manual Medication","no_rm" => $dataDetailResep->no_rm, "message" => 'Tidak Ada Aturan Pakai', "jenis_data" => 'error', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama'), "param" => $dataDetailResep->id_resep.' Medication '.$result->id, "respon" => $output['respon'], "function" => 'updateMedication_post'];
                        $this->db->insert('sm_satu_sehat_log', $xDetailDataRequest);

                        $decode = ["metaData" => ["code" => 400,"message" => 'Tidak Ada Aturan Pakai']];

                        die(json_encode($decode));

                    }

                    $paramRequest =  array(
                       "resourceType"=> "MedicationRequest",
                       "id"=> $idMedicationRequest,
                       "identifier"=> [
                           array(
                               "system"=> "http://sys-ids.kemkes.go.id/prescription/".$xKonfigurasi->organization,
                               "use"=> "official",
                               "value"=> $dataDetailResep->id_resep
                           ),
                           array(
                               "system"=> "http://sys-ids.kemkes.go.id/prescription-item/".$xKonfigurasi->organization,
                               "use"=> "official",
                               "value"=> $dataDetailResep->id_resep_item
                           )
                       ],
                       "status"=> $tipeMedication,
                       "intent"=> $intent,
                       "category"=> [
                           array(
                               "coding"=> [
                                   array(
                                       "system"=> "http://terminology.hl7.org/CodeSystem/medicationrequest-category",
                                       "code"=> "outpatient",
                                       "display"=> "Outpatient"
                                   )
                               ]
                           )
                       ],
                       "medicationReference"=> array(
                           "reference"=> "Medication/".$result->id,
                           "display"=> $dataDetailResep->nama_obat
                       ),
                       "subject"=> array(
                           "reference"=> "Patient/".$dataDetailResep->ihsn,
                           "display"=> $dataDetailResep->nama_pasien
                       ),
                       "encounter"=> array(
                           "reference"=> "Encounter/".$dataDetailResep->id_encounter
                       ),
                       "authoredOn"=> $authoredOn,
                       "requester"=> array(
                           "reference"=> "Practitioner/".$dataDetailResep->ihs_dokter,
                           "display"=> $dataDetailResep->nama_pegawai
                       ),
                       "dosageInstruction"=> [
                           array(
                               "sequence"=> (int)$sequence,
                               "timing"=> array(
                                   "repeat"=> array(
                                       "frequency"=> (int)$frequencyPeriod,
                                       "period"=> (int)$frequencyPeriod,
                                       "periodUnit"=> "d"
                                   )
                               ),
                               "route"=> array(
                                   "coding"=> [
                                       array(
                                           "system"=> "http://www.whocc.no/atc",
                                           "code"=> $dataDetailResep->roa_code,
                                           "display"=> $dataDetailResep->roa_display
                                       )
                                   ]
                               ),
                               "doseAndRate"=> [
                                   array(
                                       "doseQuantity"=> array(
                                           "value"=> (int)$dataDetailResep->dosis_racik,
                                           "unit"=> $dataDetailResep->code_ucum,
                                           "system"=> "http://unitsofmeasure.org",
                                           "code"=> $dataDetailResep->code_ucum
                                       )
                                   )
                               ]
                           )
                       ],
                       "dispenseRequest"=> array(
                           "quantity"=> array(
                               "value"=> (int)$dataDetailResep->jumlah_pakai,
                               "unit"=> $dataDetailResep->code_ucum,
                               "system"=> "http://unitsofmeasure.org",
                               "code"=> $dataDetailResep->code_ucum
                           ),
                           "performer"=> array(
                               "reference"=> "Organization/".$xKonfigurasiRequest->organization
                           )
                       )
                    );

                    $dataApiRequest = json_encode($paramRequest);

                    $outputRequest = $this->sehat->putEncounter($urlRequest, $dataApiRequest, $headerRequest);

                    if($outputRequest['respon'] === 201 | $outputRequest['respon'] === 200){

                        $resultRequest = json_decode($outputRequest['result']);

                        date_default_timezone_set('Asia/Jakarta');

                        $xDetailDataRequest = ["kategori" => "Update Manual Medication", "no_rm" => $dataDetailResep->no_rm, "message" => json_encode($paramRequest), "jenis_data" => 'ok', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama'), "respon" => $outputRequest['respon'], "function" => 'updateMedication_post'];

                        $this->db->insert('sm_satu_sehat_log', $xDetailDataRequest);

                        $decodeResponse = ["metaData" => ["code" => 201,"message" => 'Integrasi Medication Request Berhasil']];

                        $this->response($decodeResponse, REST_Controller::HTTP_OK);

                    } else {

                        $resultRequest = json_decode($outputRequest['result']);

                        date_default_timezone_set('Asia/Jakarta');
                        $xDetailDataRequest = ["kategori" => "Update Manual Medication","no_rm" => $dataDetailResep->no_rm, "message" => $outputRequest['result'], "jenis_data" => 'error', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama'), "param" => json_encode($paramRequest), "respon" => $outputRequest['respon'], "function" => 'updateMedication_post'];
                        $this->db->insert('sm_satu_sehat_log', $xDetailDataRequest);

                        $decodeResponse = ["metaData" => ["code" => 502,"message" => $outputRequest['result']]];

                        $this->response($decodeResponse, REST_Controller::HTTP_OK);

                    }

                }

            } else if($output['respon'] === 201){

                $result = json_decode($output['result']);

                date_default_timezone_set('Asia/Jakarta');

                $xDetailData = ["kategori" => "Update Manual Medication", "no_rm" => $dataDetailResep->no_rm, "message" => json_encode($params), "jenis_data" => 'ok', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama'), "respon" => $output['respon'], "function" => 'updateMedication_post'];

                $this->db->insert('sm_satu_sehat_log', $xDetailData);

                if(isset($result->id)){

                    $this->autentikasi_user_post();

                    $this->load->model('satu_sehat/Satu_sehat_model', 'sehat');

                    $xKonfigurasiRequest = $this->sehat->getConfigSatuSehat();

                    $idUserRequest = $this->session->userdata('id_translucent');

                    $getIDRequest = $this->sehat->aksesSatuSehat($idUser);

                    $tokenBearerRequest = $getIDRequest->token;

                    $headerRequest = $this->sehat->authBearer($tokenBearerRequest);

                    $urlRequest = $xKonfigurasiRequest->apiurl."MedicationRequest";

                    if($dataDetailResep->keterangan_resep !== '' && $dataDetailResep->keterangan_resep !== null){

                        $intent = 'instance-order';

                    } else {

                        $intent = 'original-order';

                    }

                    $authoredOn = $this->konversiTanggal();

                    $dataAturanPakai = $this->db->select('rr.id, rr.aturan_pakai, rr.sequence')
                        ->from('sm_resep_r as rr')
                        ->join('sm_resep as rs', 'rs.id = rr.id_resep', 'left')
                        ->where('rs.id', $dataDetailResep->id_rsp, true)
                        ->get()
                        ->result();


                    if(!empty($dataAturanPakai)){

                        foreach ($dataAturanPakai as $key => $racik) {
                            $dataRacik[] = $racik->aturan_pakai;
                            // $dataSequence['sequence'] = $racik->sequence;
                            // $dataSequence['id'] = $racik->id;
                        }


                        $firstValue = reset($dataRacik); // Fungsi reset mengambil elemen pertama dari array
                        $allSame = true; // Flag untuk menandai apakah semua nilai sama

                        foreach ($dataRacik as $value) {
                            if ($value !== $firstValue) {
                                $allSame = false;
                                break; // Keluar dari loop karena sudah ada nilai yang berbeda
                            }
                        }

                        if ($allSame) {

                            $sequence = 1;

                        } else {

                            $dataDetailResepR = $this->db->select('rr.id, rr.aturan_pakai, rr.sequence')
                            ->from('sm_resep_r as rr')
                            ->where('rr.id', $dataDetailResep->id_resep_r, true)
                            ->get()
                            ->row();
                            
                            if($dataDetailResepR->sequence !== null && $dataDetailResepR->sequence !== ''){
                                
                                $sequence = (int)$dataDetailResepR->sequence;

                            } else {

                                $x = 1;
                                $currentAturanPakai = null;

                                foreach ($dataAturanPakai as $index => $item) {
                                    
                                    if ($item->aturan_pakai !== $currentAturanPakai) {
                                        // Jika 'aturan_pakai' berbeda dari yang sebelumnya, increment sequence
                                        $currentAturanPakai = $item->aturan_pakai;
                                        $dataAturanPakai[$index]->sequence = $x++;
                                    } else {
                                        // Jika sama, gunakan sequence yang sama
                                        $dataAturanPakai[$index]->sequence = $x - 1;
                                    }
                                }

                                foreach ($dataAturanPakai as $x => $y) {

                                    $updateRequest = ["sequence" => $y->sequence];

                                    $this->db->where('id', (int)$y->id)->update('sm_resep_r', $updateRequest);
                                    
                                }

                                $cekUlangResepR = $this->db->select('rr.id, rr.aturan_pakai, rr.sequence')
                                    ->from('sm_resep_r as rr')
                                    ->where('rr.id', $dataDetailResep->id_resep_r, true)
                                    ->get()
                                    ->row();

                                if(isset($cekUlangResepR->sequence)){

                                    $sequence = $cekUlangResepR->sequence;

                                }

                            }

                        }

                        $cekRelasiAturan = $this->db->select('apo.jml_pemberian')
                        ->from('sm_aturan_pakai_obat as apo')
                        ->where('apo.signa', $dataDetailResep->aturan_pakai, true)
                        ->where('apo.is_active', 1, true)
                        ->get()
                        ->row();

                        if(isset($cekRelasiAturan->jml_pemberian)){

                            $frequencyPeriod = $cekRelasiAturan->jml_pemberian;

                        } else {

                            date_default_timezone_set('Asia/Jakarta');
                            $xDetailDataRequest = ["kategori" => "Update Manual Medication","no_rm" => $dataDetailResep->no_rm, "message" => 'Tidak Ada data jumlah pemberian di sm resep r', "jenis_data" => 'error', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama'), "param" => $dataDetailResep->id_resep.' Medication '.$result->id, "function" => 'updateMedication_post'];
                            $this->db->insert('sm_satu_sehat_log', $xDetailDataRequest);

                            $decode = ["metaData" => ["code" => 400,"message" => 'Tidak Ada data jumlah pemberian di sm resep r']];

                            die(json_encode($decode));

                        }


                    } else {

                        date_default_timezone_set('Asia/Jakarta');
                        $xDetailDataRequest = ["kategori" => "Update Manual Medication","no_rm" => $dataDetailResep->no_rm, "message" => 'Tidak Ada Aturan Pakai', "jenis_data" => 'error', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama'), "param" => $dataDetailResep->id_resep.' Medication '.$result->id, "function" => 'updateMedication_post'];
                        $this->db->insert('sm_satu_sehat_log', $xDetailDataRequest);

                        $decode = ["metaData" => ["code" => 400,"message" => 'Tidak Ada Aturan Pakai']];

                        die(json_encode($decode));

                    }

                    $paramRequest =  array(
                       "resourceType"=> "MedicationRequest",
                       "id"=> $idMedicationRequest,
                       "identifier"=> [
                           array(
                               "system"=> "http://sys-ids.kemkes.go.id/prescription/".$xKonfigurasiRequest->organization,
                               "use"=> "official",
                               "value"=> $dataDetailResep->id_resep
                           ),
                           array(
                               "system"=> "http://sys-ids.kemkes.go.id/prescription-item/".$xKonfigurasiRequest->organization,
                               "use"=> "official",
                               "value"=> $dataDetailResep->id_resep_item
                           )
                       ],
                       "status"=> $tipeMedication,
                       "intent"=> $intent,
                       "category"=> [
                           array(
                               "coding"=> [
                                   array(
                                       "system"=> "http://terminology.hl7.org/CodeSystem/medicationrequest-category",
                                       "code"=> "outpatient",
                                       "display"=> "Outpatient"
                                   )
                               ]
                           )
                       ],
                       "medicationReference"=> array(
                           "reference"=> "Medication/".$result->id,
                           "display"=> $dataDetailResep->nama_obat
                       ),
                       "subject"=> array(
                           "reference"=> "Patient/".$dataDetailResep->ihsn,
                           "display"=> $dataDetailResep->nama_pasien
                       ),
                       "encounter"=> array(
                           "reference"=> "Encounter/".$dataDetailResep->id_encounter
                       ),
                       "authoredOn"=> $authoredOn,
                       "requester"=> array(
                           "reference"=> "Practitioner/".$dataDetailResep->ihs_dokter,
                           "display"=> $dataDetailResep->nama_pegawai
                       ),
                       "dosageInstruction"=> [
                           array(
                               "sequence"=> (int)$sequence,
                               "timing"=> array(
                                   "repeat"=> array(
                                       "frequency"=> (int)$frequencyPeriod,
                                       "period"=> (int)$frequencyPeriod,
                                       "periodUnit"=> "d"
                                   )
                               ),
                               "route"=> array(
                                   "coding"=> [
                                       array(
                                           "system"=> "http://www.whocc.no/atc",
                                           "code"=> $dataDetailResep->roa_code,
                                           "display"=> $dataDetailResep->roa_display
                                       )
                                   ]
                               ),
                               "doseAndRate"=> [
                                   array(
                                       "doseQuantity"=> array(
                                           "value"=> (int)$dataDetailResep->dosis_racik,
                                           "unit"=> $dataDetailResep->code_ucum,
                                           "system"=> "http://unitsofmeasure.org",
                                           "code"=> $dataDetailResep->code_ucum
                                       )
                                   )
                               ]
                           )
                       ],
                       "dispenseRequest"=> array(
                           "quantity"=> array(
                               "value"=> (int)$dataDetailResep->jumlah_pakai,
                               "unit"=> $dataDetailResep->code_ucum,
                               "system"=> "http://unitsofmeasure.org",
                               "code"=> $dataDetailResep->code_ucum
                           ),
                           "performer"=> array(
                               "reference"=> "Organization/".$xKonfigurasiRequest->organization
                           )
                       )
                    );

                    $dataApiRequest = json_encode($paramRequest);

                    $outputRequest = $this->sehat->putEncounter($urlRequest, $dataApiRequest, $headerRequest);

                    if($outputRequest['respon'] === 201){

                        $resultRequest = json_decode($outputRequest['result']);

                        date_default_timezone_set('Asia/Jakarta');

                        $xDetailDataRequest = ["kategori" => "Update Manual Medication", "no_rm" => $dataDetailResep->no_rm, "message" => json_encode($paramRequest), "jenis_data" => 'ok', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama'), "respon" => $outputRequest['respon'], "function" => 'updateMedication_post'];

                        $this->db->insert('sm_satu_sehat_log', $xDetailDataRequest);

                        $decodeResponse = ["metaData" => ["code" => 201,"message" => 'Integrasi Medication Request Berhasil']];

                        $this->response($decodeResponse, REST_Controller::HTTP_OK);

                    } else {

                        $resultRequest = json_decode($outputRequest['result']);

                        date_default_timezone_set('Asia/Jakarta');
                        $xDetailDataRequest = ["kategori" => "Update Manual Medication","no_rm" => $dataDetailResep->no_rm, "message" => $outputRequest['result'], "jenis_data" => 'error', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama'), "param" => json_encode($paramRequest), "respon" => $outputRequest['respon'], "function" => 'updateMedication_post'];
                        $this->db->insert('sm_satu_sehat_log', $xDetailDataRequest);

                        $decodeResponse = ["metaData" => ["code" => 502,"message" => $outputRequest['result']]];

                        $this->response($decodeResponse, REST_Controller::HTTP_OK);
                        
                    }

                }

            } else {

                $result = json_decode($output['result']);

                if(isset($result->issue)){

                    $issued = $result->issue;
                    $details = $issued[0]->details;
                    date_default_timezone_set('Asia/Jakarta');
                    $xDetailData = ["kategori" => "Update Manual Medication","no_rm" => $dataDetailResep->no_rm, "message" => json_encode($details), "jenis_data" => 'error', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama'), "param" => json_encode($params), "respon" => $output['respon'], "function" => 'updateMedication_post'];
                    $this->db->insert('sm_satu_sehat_log', $xDetailData);
                    
                    $decodeResponse = ["metaData" => ["code" => 502,"message" => $output['result']]];

                    $this->response($decodeResponse, REST_Controller::HTTP_OK);



                } else {

                    date_default_timezone_set('Asia/Jakarta');
                    $xDetailData = ["kategori" => "Update Manual Medication","no_rm" => $dataDetailResep->no_rm, "message" => $output['result'], "jenis_data" => 'error', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama'), "param" => json_encode($params), "respon" => $output['respon'], "function" => 'updateMedication_post'];
                    $this->db->insert('sm_satu_sehat_log', $xDetailData);
                    $decodeResponse = ["metaData" => ["code" => 502,"message" => $output['result']]];

                    $this->response($decodeResponse, REST_Controller::HTTP_OK);

                }

            }

        }
        
    }

    function integrasiMedicationDispense_post()
    {

        if (!$this->post('id')) :  
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)  
            exit();
        endif;

        $dataResepTebusR = $this->db->select('r.id, r.id_integrasi_resep, r.id_medication_request, b.id as id_barang, b.nama_lengkap as nama_obat, r.jumlah_pakai, tm.ihs_number as ihs_dokter, pg.nama as nama_pegawai, r.id as id_resep_item, rr.aturan_pakai, rs.id as id_resep_tebus, rs.id_resep as id_resep, sr.id_pasien as no_rm, p.nama as nama_pasien, p.ihsn, l.id_encounter, ro.code as roa_code, ro.display as roa_display, r.dosis_racik, r.jumlah_pakai, uom.code as code_ucum, s.ingredient, r.id_medication_dispense')
                ->from('sm_resep_tebus_r_detail as r')
                ->join('sm_resep_tebus_r as rr', 'rr.id = r.id_resep_tebus_r', 'left')
                ->join('sm_resep_tebus as rs', 'rs.id = rr.id_resep_tebus', 'left')
                ->join('sm_resep as sr', 'sr.id = rs.id_resep', 'left')
                ->join('sm_layanan_pendaftaran as l', 'l.id = sr.id_layanan_pendaftaran', 'left')
                ->join('sm_tenaga_medis as tm', 'tm.id = sr.id_dokter', 'left')
                ->join('sm_pegawai as pg', 'pg.id = tm.id_pegawai', 'left')
                ->join('sm_pasien as p', 'p.id = sr.id_pasien', 'left')
                ->join('sm_barang as b', 'b.id = r.id_barang', 'left')
                ->join('sm_satuan as sat', 'sat.id = b.satuan_kekuatan', 'left')
                ->join('sm_unit_of_measure as uom', 'uom.code = sat.code_ucum', 'left')
                ->join('sm_roa as ro', 'ro.roa = b.roa', 'left')
                ->join('sm_sediaan as s', 's.id = b.id_sediaan', 'left')
                ->where('r.id', (int)$this->post('id'), true)
                ->get()
                ->row();

        $lokasi = $this->db->select("integrasi_baru")->from("sm_lokasi")->where("nama", 'Apotek Rawat Jalan', true)->get()->row();

        $cekSequence = $this->db->select('r.id, rr.sequence')
            ->from('sm_resep_r_detail as r')
            ->join('sm_resep_r as rr', 'rr.id = r.id_resep_r', 'left')
            ->join('sm_resep as rs', 'rs.id = rr.id_resep', 'left')
            ->where('r.id_barang', (int)$dataResepTebusR->id_barang, true)
            ->where('rs.id', (int)$dataResepTebusR->id_resep, true)
            ->get()
            ->row();

        if(isset($dataResepTebusR->id_integrasi_resep) && isset($dataResepTebusR->id_medication_request)){

            $this->autentikasi_user_post();

            $this->load->model('satu_sehat/Satu_sehat_model', 'sehat');

            $xKonfigurasi = $this->sehat->getConfigSatuSehat();

            $idUser = $this->session->userdata('id_translucent');

            $getID = $this->sehat->aksesSatuSehat($idUser);

            $tokenBearer = $getID->token;

            $xKonfigurasi = $this->sehat->getConfigSatuSehat();

            $header = $this->sehat->authBearer($tokenBearer);

            $url = $xKonfigurasi->apiurl."MedicationDispense";

            if(isset($cekSequence->sequence)){

                $sequence = $cekSequence->sequence;

            } else {

                $sequence = 1;

            }

            $cekRelasiAturan = $this->db->select('apo.jml_pemberian')
            ->from('sm_aturan_pakai_obat as apo')
            ->where('apo.signa', $dataResepTebusR->aturan_pakai, true)
            ->where('apo.is_active', 1, true)
            ->get()
            ->row();

            if(isset($cekRelasiAturan->jml_pemberian)){

                $frequencyPeriod = $cekRelasiAturan->jml_pemberian;

            } else {

                date_default_timezone_set('Asia/Jakarta');
                $xDetailDataRequest = ["kategori" => "MedicationDispense","no_rm" => $dataResepTebusR->no_rm, "message" => 'Tidak Ada data jumlah pemberian di sm resep r', "jenis_data" => 'error', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama'), "param" => $cekSequence->id.' id Resep R', "function" => 'integrasiMedicationDispense'];
                $this->db->insert('sm_satu_sehat_log', $xDetailDataRequest);

                return;

            }

            $paramDispense = array(
               "resourceType"=> "MedicationDispense",
               "identifier"=> [
                   array(
                       "system"=> "http://sys-ids.kemkes.go.id/prescription/".$xKonfigurasi->organization,
                       "use"=> "official",
                       "value"=> $dataResepTebusR->id_resep
                   ),
                   array(
                       "system"=> "http://sys-ids.kemkes.go.id/prescription-item/".$xKonfigurasi->organization,
                       "use"=> "official",
                       "value"=> $dataResepTebusR->id
                   )
               ],
               "status"=> "completed",
               "category"=> array(
                   "coding"=> [
                       array(
                           "system"=> "http://terminology.hl7.org/fhir/CodeSystem/medicationdispense-category",
                           "code"=> "outpatient",
                           "display"=> "Outpatient"
                       )
                   ]
               ),
               "medicationReference"=> array(
                   "reference"=> "Medication/".$dataResepTebusR->id_integrasi_resep,
                   "display"=> $dataResepTebusR->nama_obat
               ),
               "subject"=> array(
                   "reference"=> "Patient/".$dataResepTebusR->ihsn,
                   "display"=> $dataResepTebusR->nama_pasien
               ),
               "context"=> array(
                   "reference"=> "Encounter/".$dataResepTebusR->id_encounter
               ),
               "location"=> array(
                   "reference"=> "Location/".$lokasi->integrasi_baru,
                   "display"=> "Apotek Rawat Jalan"
               ),
               "authorizingPrescription"=> [
                   array(
                       "reference"=> "MedicationRequest/".$dataResepTebusR->id_medication_request
                   )
               ],
               "quantity"=> array(
                   "system"=> "http://terminology.hl7.org/CodeSystem/v3-orderableDrugForm",
                   "code"=> $dataResepTebusR->ingredient,
                   "value"=> (int)$dataResepTebusR->jumlah_pakai
               ),
               "dosageInstruction"=> [
                   array(
                       "sequence"=>(int)$sequence,
                        "timing"=>array(
                            "repeat"=>array(
                                "frequency"=>(int)$frequencyPeriod,
                                "period"=>(int)$frequencyPeriod,
                                "periodUnit"=>"d")
                        ),
                       "doseAndRate"=> [
                           array(
                               "doseQuantity"=> array(
                                   "value"=>(int)$dataResepTebusR->dosis_racik,
                                    "unit"=>$dataResepTebusR->code_ucum,
                                    "system"=>"http://unitsofmeasure.org",
                                    "code"=>$dataResepTebusR->code_ucum
                               )
                           )
                       ]
                   )
               ]
            );

            $dataApi = json_encode($paramDispense);

            $output = $this->sehat->postEncounter($url, $dataApi, $header);

            if($output['respon'] === 201){

                $result = json_decode($output['result']);

                date_default_timezone_set('Asia/Jakarta');

                $update = ["id_medication_dispense" => $result->id];

                $this->db->where('id', (int)$dataResepTebusR->id)->update('sm_resep_tebus_r_detail', $update);

                $xDetailData = ["kategori" => "Medication Dispense", "no_rm" => $dataResepTebusR->no_rm, "message" => json_encode($paramDispense), "jenis_data" => 'ok', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama'), "respon" => $output['respon'], "function" => 'integrasiMedicationDispense'];

                $this->db->insert('sm_satu_sehat_log', $xDetailData);

                $decodeResponse = ["metaData" => ["code" => 201,"message" => 'Integrasi Medication Dispense Berhasil']];

                $this->response($decodeResponse, REST_Controller::HTTP_OK);

            } else {

                date_default_timezone_set('Asia/Jakarta');
                $xDetailData = ["kategori" => "Update Medication","no_rm" => $dataResepTebusR->no_rm, "message" => $output['result'], "jenis_data" => 'error', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama'), "param" => json_encode($paramDispense), "respon" => $output['respon'], "function" => 'integrasiMedicationDispense'];
                $this->db->insert('sm_satu_sehat_log', $xDetailData);
                $decodeResponse = ["metaData" => ["code" => 502,"message" => $output['result']]];

                $this->response($decodeResponse, REST_Controller::HTTP_OK);

            }

        } else {

            if($dataResepTebusR->id_integrasi_resep === null){
                            
                date_default_timezone_set('Asia/Jakarta');
                $xDetailDataRequest = ["kategori" => "MedicationDispense","no_rm" => $dataResepTebusR->no_rm, "message" => 'Tidak Ada data id_integrasi_resep', "jenis_data" => 'error', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama'), "param" => $cekSequence->id.' id Resep R', "function" => 'integrasiMedicationDispense'];
                $this->db->insert('sm_satu_sehat_log', $xDetailDataRequest);

                $decodeResponse = ["metaData" => ["code" => 502,"message" => 'Tidak Ada data id_integrasi_resep']];

                $this->response($decodeResponse, REST_Controller::HTTP_OK);

            }

            if($dataResepTebusR->id_medication_request === null){
                
                date_default_timezone_set('Asia/Jakarta');
                $xDetailDataRequest = ["kategori" => "MedicationDispense","no_rm" => $dataResepTebusR->no_rm, "message" => 'Tidak Ada data id_medication_request', "jenis_data" => 'error', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama'), "param" => $cekSequence->id.' id Resep R', "function" => 'integrasiMedicationDispense'];
                $this->db->insert('sm_satu_sehat_log', $xDetailDataRequest);

                $decodeResponse = ["metaData" => ["code" => 502,"message" => 'Tidak Ada data id_medication_request']];

                $this->response($decodeResponse, REST_Controller::HTTP_OK);

            }

        }

    }
}
