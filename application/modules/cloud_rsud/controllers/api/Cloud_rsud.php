<?php

defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';
require APPPATH . '/libraries/Redis.php';

use Restserver\Libraries\REST_Controller;

/**
 * @package         CodeIgniter
 * @subpackage      Rest Server
 * @category        Controller
 * @author          Faiz Muhammad Syam
 * @license         Syams Corporation
 */
class Cloud_rsud extends REST_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->limit = 10;
        $this->load->model('Cloud_rsud_model', 'cloud_rsud');
        $this->datetime = date('Y-m-d H:i:s');
        $this->redis = new CI_Redis();

        $id_translucent = $this->session->userdata('id_translucent');
        if (empty($id_translucent)) :
            $this->response(array('error' => 'Anda belum login'), REST_Controller::HTTP_UNAUTHORIZED);
            exit();
        endif;

        $this->cloud_config = (object) [
            'server'     => 'http://192.168.77.101/api/file-upload/',
            'user_key'   => '80d402801bf7653318ee305235880de8'
        ];
        $this->code = 400;
        $this->message = "Tidak terhubung dengan Server Cloud RSUD, Server Cloud RSUD sedang bermasalah. Silahkan Hubungi Pihak IT RSUD";
        $this->load->helper('url');
    }

    function deleteDirectory($dir)
    {
        if (!file_exists($dir)) {
            return true;
        }

        if (!is_dir($dir)) {
            return unlink($dir);
        }

        foreach (scandir($dir) as $item) {
            if ($item == '.' || $item == '..') {
                continue;
            }

            if (!$this->deleteDirectory($dir . '/' . $item)) {
                return false;
            }
        }

        return rmdir($dir);
    }

    // private function deleteCurl($url)
    // {
    //     $curl = curl_init();

    //     curl_setopt_array($curl, array(
    //         CURLOPT_URL => $url,
    //         CURLOPT_RETURNTRANSFER => true,
    //         CURLOPT_ENCODING => '',
    //         CURLOPT_MAXREDIRS => 10,
    //         CURLOPT_TIMEOUT => 0,
    //         CURLOPT_FOLLOWLOCATION => true,
    //         CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    //         CURLOPT_CUSTOMREQUEST => 'DELETE',
    //     ));

    //     $output = curl_exec($curl);
    //     curl_close($curl);

    //     return $output;
    // }

    function download_image_post()
    {
        $this->load->helper('download');

        $url = $this->input->post('url');
        $filename = $this->input->post('filename');

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $data = curl_exec($ch);
        $path = FCPATH . 'resources/dokumen_rekam_medis/'; // Ubah sesuai dengan folder penyimpanan gambar di server
        if (!is_dir($path)) {
            mkdir($path, 0777, true);
        }

        $file = fopen($path . $filename, 'w');
        fwrite($file, $data);
        fclose($file);

        file_get_contents($path . $filename);

        $dataurl = resource_url() . 'dokumen_rekam_medis/' . $filename;
        $data = ["patch" => $dataurl];

        $this->response($data, REST_Controller::HTTP_OK); // (200)
    }

    function delete_patch_post()
    {
        $filename = $this->input->post('filename');
        $path = FCPATH . 'resources/dokumen_rekam_medis/';

        $this->deleteDirectory($path);
    }

    function deleteCurl($url)
    {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_ENCODING, '');
        curl_setopt($ch, CURLOPT_MAXREDIRS, 10);
        curl_setopt($ch, CURLOPT_TIMEOUT, 0);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');

        $output = curl_exec($ch);
        curl_close($ch);

        return $output;
    }

    // [Start] Bridging Aplikasi CLOUD RSUD
    public function getDataCloudRSUD($id_cloud, $kategori)
    {
        $parameters = array(
            'id' => $id_cloud,
            'aplikasi' => 'simrs',
            'kategori' => $kategori
        );

        $url = $this->cloud_config->server . 'getfile?' . http_build_query($parameters);
        $header = $this->cloud_rsud->createHeader($this->cloud_config);

        $output = getCurl($url, $header);
        $output = json_decode($output);

        return $output;
    }

    public function getDataCloudLain($id_cloud)
    {
        $parameters = array(
            'id' => base64_encode($id_cloud)
        );

        $url = $this->cloud_config->server . 'getpdf-folder?' . http_build_query($parameters);
        $header = $this->cloud_rsud->createHeader($this->cloud_config);

        $output = getCurl($url, $header);
        $output = json_decode($output);

        return $output;
    }

    function postCurlTime($url, $data, $header = null)
    {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US; rv:1.9.1.2) Gecko/20090729 Firefox/3.5.2 GTB5');
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
        curl_setopt($ch, CURLOPT_TIMEOUT, 300);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        if ($header !== null) {
            curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        }
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $output = curl_exec($ch);
        curl_close($ch);

        return $output;
    }

    public function addDataCloudRSUD($data)
    {
        $url = $this->cloud_config->server . 'addfile';

        $output = postCurl($url, $data);
        $output = json_decode($output);

        return $output;
    }

    public function addDataCloudLain($data)
    {
        $url = $this->cloud_config->server . 'addfile-lain';

        $output = $this->postCurlTime($url, $data);
        $output = json_decode($output);

        return $output;
    }

    public function updateDataCloudRSUD($data, $id)
    {
        $url = $this->cloud_config->server . 'updatefile/' . $id;

        $output = postCurl($url, $data);
        $output = json_decode($output);

        return $output;
    }

    public function deleteDataCloudRSUD($id)
    {
        $url = $this->cloud_config->server . 'deletefile/' . $id;

        // $output = $this->deleteCurl($url);
        $output = customCurl('DELETE', $url, $id);
        $output = json_decode($output);

        return $output;
    }

    public function deleteDataCloudLain($id)
    {
        $url = $this->cloud_config->server . 'deletefile-lain/' . $id;

        // $output = $this->deleteCurl($url);
        $output = customCurl('DELETE', $url, $id);
        $output = json_decode($output);

        return $output;
    }
    // [End] Bridging Aplikasi CLOUD RSUD

    public function file_upload_pasien_get()
    {
        if (!$this->get('id')) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
        endif;

        $this->load->model('pendaftaran/Pendaftaran_model', 'm_pendaftaran');
        $data = $this->m_pendaftaran->getPendaftaranDetail($this->get('id', true), $this->get('id_layanan', true));

        $data['file_sitb'] = $this->cloud_rsud->getDataFileRM($this->get('id', true));
        if (!empty($data['file_sitb']->id_cloud)) {

            $id_cloud = $data['file_sitb']->id_cloud;
            $rscloud = $this->getDataCloudRSUD($id_cloud, 'sitb');

            if ($rscloud == NULL) {
                $data = ["metadata" => ["code" => $this->code, "message" => $this->message]];
            }

            $timestamp = strtotime($rscloud->data->updated_at);
            $created_at = date('Y-m-d H:i:s', $timestamp);

            $data['file_sitb']->nama_file = $rscloud->data->nama_file;
            $data['file_sitb']->created_at = $created_at;
            $data['file_sitb']->file_location = $rscloud->data->file_location;
        }

        $data['file_rm_lain'] = $this->cloud_rsud->getDataFileRMLain($this->get('id', true), $this->get('id_pasien', true), $this->get('for_case'));
        foreach ($data['file_rm_lain'] as $i => $val) {
            $data_cloud = $this->getDataCloudLain($val->id_cloud);

            $data['file_rm_lain'][$i]->file_location = $data_cloud->data->file_location ?? null;
        }

        if ($data) :
            $this->response($data, REST_Controller::HTTP_OK); // (200)
        endif;
    }

    public function upload_file_sitb_post()
    {
        if (!$this->get('action')) {
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST);
            return;
        }

        $kategori = 'sitb';

        $cek_data = $this->cloud_rsud->cekDataFileUpload(safe_post('id_pasien_sitb'));

        if ($this->get('action') !== "update" && empty($cek_data)) {
            $imagePath = $_FILES['file_upload_sitb']['tmp_name'];
            $curlFile = new CURLFile($imagePath, $_FILES['file_upload_sitb']['type'], $_FILES['file_upload_sitb']['name']);

            $dataUpload = [
                'nama_file' => $curlFile,
                'aplikasi' => 'simrs',
                'kategori' => $kategori
            ];

            if ($rscloud = $this->addDataCloudRSUD($dataUpload)) {
                if ($rscloud->metadata->success !== true) {

                    $validated = $rscloud->data->nama_file[0] ?? '';
                    $msg_validated = !empty($validated) ? "<br>" . $validated : '';
                    $data = [
                        "metadata" => [
                            "success" => $rscloud->metadata->success,
                            "code" => $rscloud->metadata->code,
                            "message" => $rscloud->metadata->message . $msg_validated
                        ]
                    ];
                } else {
                    $timestamp = strtotime($rscloud->data->updated_at);
                    $created_at = date('Y-m-d H:i:s', $timestamp);

                    $insert = [
                        'id_pendaftaran'    => safe_post('id_pendaftaran_sitb'),
                        'id_layanan'        => safe_post('id_layanan_sitb'),
                        'id_pasien'         => safe_post('id_pasien_sitb'),
                        'no_reg_sitb'       => safe_post('no_reg_sitb'),
                        'keterangan'        => safe_post('keterangan_sitb') !== '' ? safe_post('keterangan_sitb') : null,
                        'id_cloud'          => $rscloud->data->id,
                        'id_user'           => $this->session->userdata('id_translucent'),
                        'created_at'        => $created_at,
                    ];
                    $this->db->insert('sm_file_upload_rm', $insert);

                    $data = [
                        "metadata" => [
                            "success" => $rscloud->metadata->success,
                            "code" => $rscloud->metadata->code,
                            "message" => $rscloud->metadata->message
                        ]
                    ];
                }

                $this->response($data, REST_Controller::HTTP_OK);
                return;
            } else {
                $data = ["metadata" => ["code" => $this->code, "message" => $this->message]];
                $this->response($data, REST_Controller::HTTP_OK);
                return;
            }
        } else {
            if (!empty($_FILES['file_upload_sitb']['name'])) {
                $imagePath = $_FILES['file_upload_sitb']['tmp_name'];
                $curlFile = new CURLFile($imagePath, $_FILES['file_upload_sitb']['type'], $_FILES['file_upload_sitb']['name']);

                $dataUpload = [
                    'nama_file' => $curlFile,
                    'aplikasi' => 'simrs',
                    'kategori' => $kategori
                ];

                if ($rscloud = $this->updateDataCloudRSUD($dataUpload, $cek_data->id_cloud)) {

                    if ($rscloud->metadata->success !== true) {

                        $validated = $rscloud->data->nama_file[0] ?? '';
                        $msg_validated = !empty($validated) ? "<br>" . $validated : '';
                        $data = [
                            "metadata" => [
                                "success" => $rscloud->metadata->success,
                                "code" => $rscloud->metadata->code,
                                "message" => $rscloud->metadata->message . $msg_validated
                            ]
                        ];
                    } else {
                        $timestamp = strtotime($rscloud->data->updated_at);
                        $created_at = date('Y-m-d H:i:s', $timestamp);

                        $update = [
                            'id_pendaftaran'    => safe_post('id_pendaftaran_sitb'),
                            'id_layanan'        => safe_post('id_layanan_sitb'),
                            'id_pasien'         => safe_post('id_pasien_sitb'),
                            'no_reg_sitb'       => safe_post('no_reg_sitb'),
                            'keterangan'        => safe_post('keterangan_sitb') !== '' ? safe_post('keterangan_sitb') : null,
                            'id_user'           => $this->session->userdata('id_translucent'),
                            'created_at'        => $created_at,
                        ];
                        $updateAction = $this->db->where('id', $cek_data->id)->update('sm_file_upload_rm', $update);

                        $insert_log = [
                            'id_file_upload_rm' => $cek_data->id,
                            'id_cloud_log'      => $rscloud->data->id_cloud_log,
                            'id_user_log'       => $cek_data->id_user,
                            'log_created'       => $cek_data->created_at,
                            'no_reg_sitb'       => ($cek_data->no_reg_sitb == safe_post('no_reg_sitb') ? null : $cek_data->no_reg_sitb),
                            'keterangan'        => ($cek_data->keterangan == safe_post('keterangan_sitb') ? null : $cek_data->keterangan)
                        ];
                        if ($updateAction) {
                            $this->db->insert('sm_log_file_upload_rm', $insert_log);
                        }

                        $data = [
                            "metadata" => [
                                "success" => $rscloud->metadata->success,
                                "code" => $rscloud->metadata->code,
                                "message" => $rscloud->metadata->message
                            ]
                        ];
                    }

                    $this->response($data, REST_Controller::HTTP_OK);
                    return;
                } else {
                    $data = ["metadata" => ["code" => $this->code, "message" => $this->message]];
                    $this->response($data, REST_Controller::HTTP_OK);
                    return;
                }
            } else {
                $update = [
                    'id_pendaftaran'    => safe_post('id_pendaftaran_sitb'),
                    'id_layanan'        => safe_post('id_layanan_sitb'),
                    'id_pasien'         => safe_post('id_pasien_sitb'),
                    'no_reg_sitb'       => safe_post('no_reg_sitb'),
                    'keterangan'        => safe_post('keterangan_sitb') !== '' ? safe_post('keterangan_sitb') : null,
                    'id_user'           => $this->session->userdata('id_translucent'),
                    'created_at'        => $this->datetime,
                ];
                $actionUpdate = $this->db->where('id', $cek_data->id)->update('sm_file_upload_rm', $update);

                if ($actionUpdate) {
                    $insert_log = [
                        'id_file_upload_rm' => $cek_data->id,
                        'id_cloud_log'      => null,
                        'id_user_log'       => $cek_data->id_user,
                        'log_created'       => $cek_data->created_at,
                        'no_reg_sitb'       => ($cek_data->no_reg_sitb == safe_post('no_reg_sitb') ? null : $cek_data->no_reg_sitb),
                        'keterangan'        => ($cek_data->keterangan == safe_post('keterangan_sitb') ? null : $cek_data->keterangan),
                    ];

                    if ($cek_data->no_reg_sitb !== safe_post('no_reg_sitb') || $cek_data->keterangan !== safe_post('keterangan_sitb')) {
                        $this->db->insert('sm_log_file_upload_rm', $insert_log);
                    }
                }

                $data = [
                    "metadata" => [
                        "success" => true,
                        "code" => 201,
                        "message" => "Data SITB berhasil diperbaharui."
                    ]
                ];
                $this->response($data, REST_Controller::HTTP_OK);
                return;
            }
        }
    }

    public function deleted_file_sitb_delete()
    {
        if (!$this->get('id')) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
        endif;
        $id = $this->get('id');

        $cek_data = $this->cloud_rsud->cekDataFileDelete($id);
        $log_data = $this->db->get_where('sm_log_file_upload_rm', ['id_file_upload_rm' => $cek_data->id])->result();

        $rscloud = $this->deleteDataCloudRSUD($id);
        if ($rscloud->metadata->success !== false) {

            foreach ($log_data as $log) {
                $this->db->delete('sm_log_file_upload_rm', ['id' => $log->id]);
            }
            $this->db->delete('sm_file_upload_rm', ['id' => $cek_data->id]);

            $data = [
                "metadata" => [
                    "success" => $rscloud->metadata->success,
                    "code" => $rscloud->metadata->code,
                    "message" => $rscloud->metadata->message
                ]
            ];
        } else {

            $data = ["metadata" => ["code" => $this->code, "message" => $this->message]];
        }

        $this->response($data, REST_Controller::HTTP_OK); // (200)
    }

    private function start($page)
    {
        return (($page - 1) * $this->limit);
    }

    function master_upload_get()
    {
        $q = safe_get('q');
        $list = safe_get('list');
        $page = safe_get('page');
        $start = $this->start($page);
        $key = 'master_upload_' . $q . '_' . $list . '_' . $page;
        if (!$this->redis->get($key)) :
            $data = $this->cloud_rsud->getFileLainnya($q, $list, $start, $this->limit);
            if ((safe_get('page') == 1) & ($q == '') & ($list == '')) :
                $pilih[] = array(
                    'id' => '',
                    'nama' => ''
                );
                $data['data'] = array_merge($pilih, $data['data']);
                $data['total'] += 1;
            endif;
            $this->redis->setex($key, 86400, json_encode($data));
            $this->response($data, REST_Controller::HTTP_OK);
        else :
            exit($this->redis->get($key));
        endif;
    }


    public function upload_file_lain_post()
    {

        if (!safe_post('kode_file_lainnya')) {
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST);
            return;
        }

        $kode_file = $this->db->get_where('sm_master_upload_file', ['id' => safe_post('kode_file_lainnya')])->row()->kode;
        $nama_folder_pasien = $kode_file . '_' . safe_post('nama_pasien');

        // var_dump($nama_folder_pasien);
        // die;

        // $cek_data = $this->cloud_rsud->cekDataFileUploadLain(safe_post('id_pasien_sitb'));
        // if (!empty($cek_data)) {
        $imagePath = $_FILES['file_upload_fhl']['tmp_name'];
        $curlFile = new CURLFile($imagePath, $_FILES['file_upload_fhl']['type'], $_FILES['file_upload_fhl']['name']);

        $dataUpload = [
            'nama_folder'   => $curlFile,
            'aplikasi'      => 'SIMRS',
            'kategori'      => $kode_file,
            'nama_pasien'   => $nama_folder_pasien
        ];

        if ($rscloud = $this->addDataCloudLain($dataUpload)) {
            if ($rscloud->metadata->success !== true) {

                $validated = $rscloud->data->nama_file[0] ?? '';
                $msg_validated = !empty($validated) ? "<br>" . $validated : '';
                $data = [
                    "metadata" => [
                        "success" => $rscloud->metadata->success,
                        "code" => $rscloud->metadata->code,
                        "message" => $rscloud->metadata->message . $msg_validated
                    ]
                ];
            } else {
                $timestamp = strtotime($rscloud->data->updated_at);
                $created_at = date('Y-m-d H:i:s', $timestamp);

                $insert = [
                    'id_pendaftaran'        => safe_post('id_pendaftaran_fhl'),
                    'id_layanan'            => safe_post('id_layanan_fhl'),
                    'id_pasien'             => safe_post('id_pasien_fhl'),
                    'id_master_upload_file' => safe_post('kode_file_lainnya'),
                    'keterangan'            => safe_post('keterangan_fhl') !== '' ? safe_post('keterangan_fhl') : null,
                    'id_cloud'              => $rscloud->data->id,
                    'id_user'               => $this->session->userdata('id_translucent'),
                    'created_at'            => $created_at,
                ];
                $this->db->insert('sm_file_upload_lainnya', $insert);

                $data = [
                    "metadata" => [
                        "success" => $rscloud->metadata->success,
                        "code" => $rscloud->metadata->code,
                        "message" => $rscloud->metadata->message
                    ]
                ];
            }

            $this->response($data, REST_Controller::HTTP_OK);
            return;
        } else {
            $data = ["metadata" => ["code" => $this->code, "message" => $this->message]];
            $this->response($data, REST_Controller::HTTP_OK);
            return;
        }
        // }
    }

    public function deleted_file_lain_delete()
    {
        if (!$this->get('id')) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
        endif;
        $id = $this->get('id');
        $id = base64_decode($id);

        $cek_data = $this->cloud_rsud->cekDataFileUploadLain($id);

        if (!empty($cek_data)) {
            $rscloud = $this->deleteDataCloudLain($cek_data->id_cloud);

            if ($rscloud->metadata->success !== false) {
                $insert_log = [
                    'id_file_upload_lainnya' => $id,
                    'user_upload'       => $cek_data->id_user,
                    'tanggal_upload'    => $cek_data->created_at,
                    'keterangan'        => (empty($cek_data->keterangan) ? null : $cek_data->keterangan),
                    'id_user_log'       => $this->session->userdata('id_translucent'),
                    'kode_kategori'     => $cek_data->kode_kategori,
                    'log_created'       => $this->datetime
                ];

                $this->db->insert('sm_log_file_upload_lainnya', $insert_log);
                $this->db->delete('sm_file_upload_lainnya', ['id' => $id]);

                $data = [
                    "metadata" => [
                        "success" => $rscloud->metadata->success,
                        "code" => $rscloud->metadata->code,
                        "message" => $rscloud->metadata->message
                    ]
                ];
            } else {

                $data = ["metadata" => ["code" => $this->code, "message" => $this->message]];
            }

            $this->response($data, REST_Controller::HTTP_OK); // (200)
        }
    }
}
