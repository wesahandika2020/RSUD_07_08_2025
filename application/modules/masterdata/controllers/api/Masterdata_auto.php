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
class Masterdata_auto extends REST_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->limit = 20;
        $this->redis = new CI_Redis();
        $this->load->model('Masterdata_model', 'auto');

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

    function jabatan_auto_get()
    {
        $q = safe_get('q');
        $page = safe_get('page');
        $start = $this->start($page);
        $key = 'jabatan_auto_'.$q.'_'.$page;
        if (!$this->redis->get($key)) :
            $data = $this->auto->getAutoJabatan($q, $start, $this->limit);
            if ((safe_get('page') == 1) & ($q == '')) {
                $pilih[] = array('id' => '', 'nama' => ' ');
                $data['data'] = array_merge($pilih, $data['data']);
                $data['total'] += 1;
            }
            $this->redis->setex($key, 84600, json_encode($data));
            $this->response($data, REST_Controller::HTTP_OK);
        else :
            exit($this->redis->get($key));
        endif;
    }

    // tidak terpakai
    function provinsi_auto_get()
    {
        $q = safe_get('q');
        $start = $this->start(safe_get('page'));
        $data = $this->auto->getAutoProvinsi($q, $start, $this->limit);
        if ((safe_get('page') == 1) & ($q == '')) {
            $pilih[] = array(
                'id' => '',
                'nama' => 'Silahkan pilih provinsi'
            );

            $data['data'] = array_merge($pilih, $data['data']);
            $data['total'] += 1;
        }
        $this->response($data, REST_Controller::HTTP_OK);
    }

    function kotakabupaten_auto_get()
    {
        $q = safe_get('q');
        $start = $this->start(safe_get('page'));
        $data = $this->auto->getAutoKotaKabupaten($q, $start, $this->limit);
        if ((safe_get('page') == 1) & ($q == '')) {
            $pilih[] = array('kode' => '', 'nama' => ' ', 'provinsi' => '');
            $data['data'] = array_merge($pilih, $data['data']);
            $data['total'] += 1;
        }
        $this->response($data, REST_Controller::HTTP_OK);
    }

    function kecamatan_auto_get()
    {
        $q = safe_get('q');
        $start = $this->start(safe_get('page'));
        $data = $this->auto->getAutoKecamatan($q, $start, $this->limit);
        if ((safe_get('page') == 1) & ($q == '')) {
            $pilih[] = array('id' => '', 'nama' => ' ', 'kabupaten' => '');
            $data['data'] = array_merge($pilih, $data['data']);
            $data['total'] += 1;
        }
        $this->response($data, REST_Controller::HTTP_OK);
    }

    function kelurahan_auto_get()
    {
        $q = safe_get('q');
        $start = $this->start(safe_get('page'));
        $data = $this->auto->getAutoKelurahan($q, $start, $this->limit);
        if ((safe_get('page') == 1) & ($q == '')) {
            $pilih[] = array(
                'id' => '', 
                'nama' => ' ', 
                'kecamatan' => '',
                'kotakabupaten' => '',
                'provinsi' => ''
            );
            $data['data'] = array_merge($pilih, $data['data']);
            $data['total'] += 1;
        }
        $this->response($data, REST_Controller::HTTP_OK);
    }
    // end tidak terpakai

    function pabrik_auto_get()
    {
        $q = safe_get('q');
        $page = safe_get('page');
        $start = $this->start($page);
        $key = 'pabrik_auto_'.$q.'_'.$page;
        if (!$this->redis->get($key)) :
            $data = $this->auto->getAutoPabrik($q, $start, $this->limit);
            if ((safe_get('page') == 1) & ($q == '')) :
                $pilih[] = array(
                    'id' => '', 
                    'nama' => ' '
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

    function supplier_auto_get()
    {
        $q = safe_get('q');
        $page = safe_get('page');
        $start = $this->start($page);
        $key = 'supplier_auto_'.$q.'_'.$page;
        if (!$this->redis->get($key)) :
            $data = $this->auto->getAutoSupplier($q, $start, $this->limit);
            if ((safe_get('page') == 1) & ($q == '')) :
                $pilih[] = array(
                    'id' => '', 
                    'nama' => ' '
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

    function farmako_terapi_auto_get()
    {
        $q = safe_get('q');
        $page = safe_get('page');
        $start = $this->start($page);
        $key = 'farmako_terapi_auto_'.$q.'_'.$page;
        if (!$this->redis->get($key)) :
            $data = $this->auto->getAutoFarmakoTerapi($q, $start, $this->limit);
            if ((safe_get('page') == 1) & ($q == '')) :
                $pilih[] = array(
                    'id' => '', 
                    'nama' => ' ',
                    'kode' => ''
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

    function jenis_pemeriksaan_auto_get()
    {
        $q = safe_get('q');
        $page = safe_get('page');
        $start = $this->start($page);
        $key = 'jenis_pemeriksaan_auto_'.$q.'_'.$page;
        if (!$this->redis->get($key)) :
            $data = $this->auto->getAutoJenisPemeriksaan($q, $start, $this->limit);
            if ((safe_get('page') == 1) & ($q == '')) :
                $pilih[] = array(
                    'id' => '', 
                    'nama' => ' '
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

    function layanan_auto_get()
    {
        $q = safe_get('q');
        $jenis = safe_get('jenis');
        $id_jenis = safe_get('id_jenis');
        $page = safe_get('page');
        $start = $this->start($page);
        $key = 'layanan_auto_'.$q.'_'.$jenis.'_'.$id_jenis.'_'.$page;
        if (!$this->redis->get($key)) :
            $data = $this->auto->getAutoLayanan($q, $id_jenis, $jenis, $start, $this->limit);
            if ((safe_get('page') == 1) & ($q == '')) :
                $pilih[] = array(
                    'id' => '', 
                    'nama' => 'Pilih Layanan', 
                    'parent' => '', 
                    'layanan_parent' => ' ', 
                    'kode' => ''
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

     //tambahan form resume medis pasien
     function jenis_formulir_auto_get()
     {
         $q = safe_get('q');
         $page = safe_get('page');
         $start = $this->start($page);
         $key = 'jenis_formulir_auto_'.$q.'_'.$page;
         if (!$this->redis->get($key)) :
             $data = $this->auto->getAutoJenisFormulir($q, $start, $this->limit);
             if ((safe_get('page') == 1) & ($q == '')) :
                 $pilih[] = array(
                     'id' => '', 
                     'nama' => ' '
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
 
     //tambahan form resume medis pasien
     function form_auto_get()
     {
         $q = safe_get('q');
         $jenis_formulir = safe_get('jenis_formulir');
         $id_jenis_formulir = safe_get('id_jenis_formulir');
         $page = safe_get('page');
         $start = $this->start($page);
         $key = 'form_auto'.$q.'_'.$jenis_formulir.'_'.$id_jenis_formulir.'_'.$page;
         if (!$this->redis->get($key)) :
             $data = $this->auto->getAutoFormulir($q, $id_jenis_formulir, $jenis_formulir, $start, $this->limit);
             if ((safe_get('page') == 1) & ($q == '')) :
                 $pilih[] = array(
                     'id' => '', 
                     'nama' => 'Pilih Formulir', 
                     'parent' => '', 
                     'formulir_parent' => ' ', 
                     'kode_formulir' => ''
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

    function rekening_auto_get()
    {
        $params = array(
            'q'      => safe_get('q'),
            'parent' => safe_get('parent'),
            'jenis'  => safe_get('jenis'),
        );
        $page = safe_get('page');
        $start = $this->start($page);
        $key = 'rekening_auto_'.safe_get('q').'_'.safe_get('parent').'_'.safe_get('jenis').'_'.$page;
        if (!$this->redis->get($key)) :
            $data = $this->auto->getAutoRekening($params, $start, $this->limit);
            if ((safe_get('page') == 1) & ($params['q'] == '')) :
                $pilih[] = array(
                    'id'        => '',
                    'nama'      => '',
                    'kode'      => '',
                    'id_parent' => '',
                    'parent'    => ''
                );
    
                $data['data']  =  array_merge($pilih, $data['data']);
                $data['total'] += 1;
            endif;
            $this->redis->setex($key, 86400, json_encode($data));
            $this->response($data, REST_Controller::HTTP_OK);
        else :
            exit($this->redis->get($key));
        endif;
    }

    function pegawai_nadis_auto_get()
    {
        $q = safe_get('q');
        $page = safe_get('page');
        $start = $this->start($page);
        $key = 'pegawai_nadis_auto_'.$q.'_'.$page;
        if (!$this->redis->get($key)) :
            $data = $this->auto->getAutoPegawaiNadis($q, $start, $this->limit);
            if ((safe_get('page') == 1) & ($q == '')) :
                $pilih[] = array(
                    'id' => '', 
                    'nama' => ' ', 
                    'jabatan' => ''
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

    function profesi_nadis_auto_get()
    {
        $q = safe_get('q');
        $page = safe_get('page');
        $start = $this->start($page);
        $key = 'profesi_nadis_auto_'.$q.'_'.$page;
        if (!$this->redis->get($key)) :
            $data = $this->auto->getAutoProfesiNadis($q, $start, $this->limit);
            if ((safe_get('page') == 1) & ($q == '')) :
                $pilih[] = array(
                    'id' => '',
                    'nama' => '',
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

    function pegawai_account_auto_get()
    {
        $q = safe_get('q');
        $page = safe_get('page');
        $start = $this->start($page);
        $key = 'pegawai_account_auto_'.$q.'_'.$page;
        if (!$this->redis->get($key)) :
            $data = $this->auto->getAutoPegawaiAccount($q, $start, $this->limit);
            if ((safe_get('page') == 1) & ($q == '')) :
                $pilih[] = array(
                    'id' => '',
                    'nama' => '',
                    'jabatan' => ''
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

    function account_group_auto_get()
    {
        $q = safe_get('q');
        $page = safe_get('page');
        $start = $this->start($page);
        $key = 'account_group_auto_'.$q.'_'.$page;
        if (!$this->redis->get($key)) :
            $data = $this->auto->getAutoAccountGroup($q, $start, $this->limit);
            if ((safe_get('page') == 1) & ($q == '')) :
                $pilih[] = array(
                    'id' => '', 
                    'name' => '');
                $data['data'] = array_merge($pilih, $data['data']);
                $data['total'] += 1;
            endif;
            $this->redis->setex($key, 86400, json_encode($data));
            $this->response($data, REST_Controller::HTTP_OK);
        else :
            exit($this->redis->get($key));
        endif;
    }

    function unit_auto_get()
    {
        $q = safe_get('q');
        $page = safe_get('page');
        $start = $this->start($page);
        $key = 'unit_auto_'.$q.'_'.$page;
        if (!$this->redis->get($key)) :
            $data = $this->auto->getAutoUnit($q, $start, $this->limit);
            if ((safe_get('page') == 1) & ($q == '')) :
                $pilih[] = array(
                    'id' => '',
                    'kode' => '',
                    'nama' => 'Semua Instalasi',
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

    function instansi_auto_get()
    {
        $q = safe_get('q');
        $page = safe_get('page');
        $start = $this->start($page);
        $key = 'instansi_auto_'.$q.'_'.$page;
        if (!$this->redis->get($key)) :
            $data = $this->auto->getAutoInstansi($q, $start, $this->limit);
            if ((safe_get('page') == 1) & ($q == '')) :
                $pilih[] = array('id' => '', 'nama' => ' ');
                $data['data'] = array_merge($pilih, $data['data']);
                $data['total'] += 1;
            endif;
            $this->redis->setex($key, 86400, json_encode($data));
            $this->response($data, REST_Controller::HTTP_OK);
        else :
            exit($this->redis->get($key)); 
        endif;
    }

    function instalasi_auto_get()
    {
        $q = safe_get('q');
        $page = safe_get('page');
        $start = $this->start($page);
        $key = 'instalasi_auto_'.$q.'_'.$page;
        if (!$this->redis->get($key)) :
            $data = $this->auto->getAutoInstalasi($q, $start, $this->limit);
            if ((safe_get('page') == 1) & ($q == '')) :
                $pilih[] = array('id' => '', 'nama' => ' ');
                $data['data'] = array_merge($pilih, $data['data']);
                $data['total'] += 1;
            endif;
            $this->redis->setex($key, 86400, json_encode($data));
            $this->response($data, REST_Controller::HTTP_OK);
        else :
            exit($this->redis->get($key));
        endif;
    }

    function spesialisasi_auto_get()
    {
        $q = safe_get('q');
        $page = safe_get('page');
        $start = $this->start($page);
        $key = 'spesialisasi_auto_'.$q.'_'.$page;
        if (!$this->redis->get($key)) :
            $data = $this->auto->getAutoSpesialisasi($q, $start, $this->limit);
            if ((safe_get('page') == 1) & ($q == '')) :
                $pilih[] = array(
                    'id' => '', 
                    'nama' => '', 
                    'kode' => '', 
                    'kode_bpjs' => ''
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

    function penjamin_auto_get()
    {
        $q = safe_get('q');
        $page = safe_get('page');
        $jenis = $this->get('jenis');
        $start = $this->start($page);
        $key = 'penjamin_auto_'.$q.'_'.$jenis.'_'.$page;
        if (!$this->redis->get($key)) :
            $data = $this->auto->getAutoPenjamin($q, $jenis, $start, $this->limit);
            if ((safe_get('page') == 1) & ($q == '')) :
                $pilih[] = array(
                    'id' => '', 
                    'nama' => '- Semua Penjamin -', 
                    'kode' => '', 
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

    function jenis_laboratorium_get()
    {
        $q = safe_get('q');
        $page = safe_get('page');
        $start = $this->start($page);
        $key = 'jenis_laboratorium_'.$q.'_'.$page;
        if (!$this->redis->get($key)) :
            $data = $this->auto->getJnsLaboratorium($q, $start, $this->limit);
            if ((safe_get('page') == 1) & ($q == '')) :
                $pilih[] = array(
                    'id'            => '', 
                    'id_lab'        => '', 
                    'nama'          => '', 
                    'total'          => '', 
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

    function ambil_id_lab_get()
    {   
        if (!$this->get('get_id_lab', true)) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST);
        endif;
        $data = $this->auto->getIdLab($this->get('get_id_lab', true));
        $this->response($data, REST_Controller::HTTP_OK);
    }

    function tarif_tindakan_lab_auto_get()
    {
        $q = safe_get('q');
        $page = safe_get('page');
        $start = $this->start($page);
        $jenis_pemeriksaan = safe_get('jenis_pemeriksaan');
        $jenis_tindakan = safe_get('jenis_tindakan');
        $id_lab = $this->get('id_lab', true);
        $key = 'tarif_tindakan_lab_auto_'.$q.'_'.$jenis_pemeriksaan.'_'.$jenis_tindakan.'_'.$id_lab.'_'.$page;
        if (!$this->redis->get($key)) :
            $data = $this->auto->getTarifTindakanLab($q, $id_lab, $jenis_pemeriksaan, $jenis_tindakan, $start, $this->limit);
            if ((safe_get('page') == 1) & ($q == '')) :
                $pilih[] = array(
                    'id'             => '', 
                    'layanan'        => '', 
                    'instalasi'      => '', 
                    'jenis'          => '', 
                    'bobot'          => '', 
                    'total'          => '', 
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

    function tarif_pelayanan_auto_get()
    {
        $q = safe_get('q');
        $page = safe_get('page');
        $jenis_pemeriksaan = safe_get('jenis_pemeriksaan');
        $kelas = safe_get('kelas');
        $jenis_tindakan = safe_get('jenis_tindakan');
        $start = $this->start($page);
        $key = 'tarif_pelayanan_auto_'.$q.'_'.$jenis_pemeriksaan.'_'.$kelas.'_'.$jenis_tindakan.'_'.$page;
        if (!$this->redis->get($key)) :
            $data = $this->auto->getAutoTarifPelayanan($q, $jenis_pemeriksaan, $jenis_tindakan, $kelas, $start, $this->limit);
            if ((safe_get('page') == 1) & ($q == '')) :
                $pilih[] = array(
                    'id'             => '', 
                    'layanan'        => '', 
                    'instalasi'      => '', 
                    'jenis'          => '', 
                    'bobot'          => '', 
                    'total'          => '', 
                    'kelas'          => '', 
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

    function tarif_pemeriksaan_auto_get()
    {
        $q = safe_get('q');
        $page = safe_get('page');
        $penjamin = safe_get('penjamin');
        $kelas = safe_get('kelas');
        $unit = safe_get('unit');
        $jenis = $this->get('jenis');
        $start = $this->start($page);
        $key = 'tarif_pemeriksaan_auto_'.$q.'_'.$penjamin.'_'.$kelas.'_'.$unit.'_'.$jenis.'_'.$page;
        if (!$this->redis->get($key)) :
            $data = $this->auto->getAutoTarifPemeriksaanV2($q, $kelas, $penjamin, $jenis, $unit, $start, $this->limit);
            if ((safe_get('page') == 1) & ($q == '')) :
                $pilih[] = array(
                    'id'             => '', 
                    'layanan'        => '', 
                    'layanan_parent' => '', 
                    'instalasi'      => '', 
                    'jenis'          => '', 
                    'bobot'          => '', 
                    'total'          => '', 
                    'kelas'          => null, 
                    'keterangan'     => '', 
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

	function tarif_pemeriksaan_mcu_auto_get()
    {
        $q = safe_get('q');
        $page = safe_get('page');
        $penjamin = safe_get('penjamin');
        $kelas = safe_get('kelas');
        $unit = safe_get('unit');
        $jenis = $this->get('jenis');
        $mcu = safe_get('mcu');
        $start = $this->start($page);
        $key = 'tarif_pemeriksaan_mcu_auto_'.$q.'_'.$penjamin.'_'.$kelas.'_'.$unit.'_'.$jenis.'_'.$mcu.'_'.$page;
        if (!$this->redis->get($key)) :
            $data = $this->auto->getAutoTarifPemeriksaanMcu($q, $kelas, $penjamin, $jenis, $unit, $mcu, $start, $this->limit);
            if ((safe_get('page') == 1) & ($q == '')) :
                $pilih[] = array(
                    'id'             => '', 
                    'layanan'        => '', 
                    'layanan_parent' => '', 
                    'instalasi'      => '', 
                    'jenis'          => '', 
                    'bobot'          => '', 
                    'total'          => '', 
                    'kelas'          => null, 
                    'keterangan'     => '', 
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
	
    function tarif_pemeriksaanigd_auto_get()
    {
        $q = safe_get('q');
        $page = safe_get('page');
        $penjamin = safe_get('penjamin');
        $kelas = safe_get('kelas');
        $unit = safe_get('unit');
        $jenis = $this->get('jenis');
        $start = $this->start($page);
        $key = 'tarif_pemeriksaanigd_auto_'.$q.'_'.$penjamin.'_'.$kelas.'_'.$unit.'_'.$jenis.'_'.$page;
        if (!$this->redis->get($key)) :
            $data = $this->auto->getAutoTarifPemeriksaanV2($q, $kelas, $penjamin, $jenis, $unit, $start, $this->limit);
            if ((safe_get('page') == 1) & ($q == '')) :
                $pilih[] = array(
                    'id'             => '', 
                    'layanan'        => '', 
                    'layanan_parent' => '', 
                    'instalasi'      => '', 
                    'jenis'          => '', 
                    'bobot'          => '', 
                    'total'          => '', 
                    'total'          => '', 
                    'kelas'          => null, 
                    'keterangan'     => '', 
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

    //Wa Security
    function get_dokter_spesialisasi_get()		
    {		
        $id_spesialisasi = $this->get('id_spesialisasi');		
        $id_dokter = $this->get('id_dokter');		
        $data = $this->auto->getAutoDokterSpesialisasi($id_spesialisasi, $id_dokter);		
        $this->response($data, REST_Controller::HTTP_OK);		
    }

	function get_dokter_spesialisasi_jadwal_get()		
    {		
        $id_spesialisasi = $this->get('id_spesialisasi');		
        $id_dokter = $this->get('id_dokter');		
        $data = $this->auto->getAutoDokterSpesialisasiJadwal($id_spesialisasi, $id_dokter);		
        $this->response($data, REST_Controller::HTTP_OK);		
    }
	
    function dokter_auto_get()
    {
        $q = safe_get('q');
        $page = safe_get('page');
        $start = $this->start($page);
        $key = 'dokter_auto_'.$q.'_'.$page;
        if (!$this->redis->get($key)) :
            $data = $this->auto->getAutoDokter($q, $start, $this->limit);
            if ((safe_get('page') == 1) & ($q == '')) :
                $pilih[] = array(
                    'id' => '', 
                    'nama' => '', 
                    'spesialisasi' => ''
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

    function dokter_lab_auto_get()
    {
        $q = safe_get('q');
        $page = safe_get('page');
        $start = $this->start($page);
        $key = 'dokter_lab_auto_'.$q.'_'.$page;
        if (!$this->redis->get($key)) :
            $data = $this->auto->getAutoDokterLab($q, $start, $this->limit);
            if ((safe_get('page') == 1) & ($q == '')) :
                $pilih[] = array(
                    'id' => '', 
                    'nama' => '', 
                    'spesialisasi' => ''
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

    function dokter_auto_spesialisasi_get()
    {
        $q = safe_get('q');
        $page = safe_get('page');
        $start = $this->start($page);
        $key = 'dokter_auto_spesialisasi'.$q.'_'.$page;
        if (!$this->redis->get($key)) :
            $data = $this->auto->getDokterSpesialistAuto($q, $start, $this->limit);
            if ((safe_get('page') == 1) & ($q == '')) :
                $pilih[] = array(
                    'id' => '', 
                    'nama' => '', 
                    'spesialisasi' => ''
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
    
	function listanamnesa_auto_get()
    {
        $q = safe_get('q');
        $id_pendaftaran = safe_get('id_pendaftaran');
        $page = safe_get('page');
        $start = $this->start($page);
        $key = 'listanamnesa_auto_'.$q.'_'.$id_pendaftaran.'_'.$page;
        if (!$this->redis->get($key)) :
            $data = $this->auto->getListAnamnesa($id_pendaftaran, $q, $start, $this->limit);
            if ((safe_get('page') == 1) & ($q == '')) :
                $pilih[] = array(
                    'id' => '',
                    'nm_unit_layanan' => '', 
                    'nm_dokter' => '', 
                    'tanggal_periksa' => '', 
                    'id_pendaftran' => '', 
                    'id_layanan_pendaftaran' => ''
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
	
    function dokteru_auto_get()
    {
        $q = safe_get('q');
        $page = safe_get('page');
        $start = $this->start($page);
        $key = 'dokteru_auto_'.$q.'_'.$page;
        if (!$this->redis->get($key)) :
            $data = $this->auto->getAutoDokterumigd($q, $start, $this->limit);
            if ((safe_get('page') == 1) & ($q == '')) :
                $pilih[] = array(
                    'id' => '', 
                    'nama' => '', 
                    'spesialisasi' => ''
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

    function golongan_sebab_sakit_auto_get()
    {
        $q = safe_get('q');
        $page = safe_get('page');
        $start = $this->start($page);
        $key = 'golongan_sebab_sakit_auto_'.$q.'_'.$page;
        if (!$this->redis->get($key)) :
            $data = $this->auto->getAutoGolonganSebabSakit($q, $start, $this->limit);
            if ((safe_get('page') == 1) & ($q == '')) :
                $pilih[] = array(
                    'id' => '', 
                    'nama' => '', 
                    'kode_icdx' => NULL,
                    'kode_icdx_rinci' => '',
                    'nama_idn' => '',
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

    function nadis_auto_get()
    {
        $params['q'] = safe_get('q');
        $page = safe_get('page');
        $start = $this->start($page);
        $params['jenis'] = safe_get('jenis'); 
        $key = 'nadis_auto_'.$params['q'].'_'.$params['jenis'].'_'.$page;
        if (!$this->redis->get($key)) :
            $data = $this->auto->getAutoNadis($params, $start, $this->limit);
            if ((safe_get('page') == 1) & ($params['q'] == '')) :
                $pilih[] = array(
                    'id' => '', 
                    'nama' => '', 
                    'spesialisasi' => '',
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

    function masalah_keperawatan_auto_get()
    {
        $q = safe_get('q');
        $page = safe_get('page');
        $start = $this->start($page);
        $key = 'masalah_keperawatan_auto_'.$q.'_'.$page;
        if (!$this->redis->get($key)) :
            $data = $this->auto->getStandarDiagnosis($q, $start, $this->limit);
            if ((safe_get('page') == 1) & ($q == '')) :
                $pilih[] = array(
                    'id' => '', 
                    'nama' => '', 
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

    function barang_auto_get()
    {
        $param['search'] = safe_get('q');
        $param["penjamin"] = safe_get("id_penjamin") !== "" ? safe_get("id_penjamin") : "";
        $param["jenissppb"] = safe_get("jenissppb");
        $param["katastropik"] = safe_get("katastropik");
        $param["golongan"] = safe_get("golongan");
        $param["jenis_barang"] = safe_get("jenis_barang");
        $param["aktif"] = safe_get("aktif");
        $page = safe_get('page');
        $start = $this->start($page);
        $param['jenis'] = safe_get('jenis'); 
        $data = $this->auto->getAutoBarang($param, $start, $this->limit);
        if ((safe_get('page') == 1) & (safe_get('q') == '')) :
            $pilih[] = array(
                'id' => '', 
                'nama' => 'Semua Barang',
                'kekuatan' => ' ',
                'satuan_kekuatan' => ' ',
                'golongan_darah' => null,
                'rhesus' => null,
            );

            $data['data'] = array_merge($pilih, $data['data']);
            $data['total'] += 1;
        endif;
        $this->response($data, REST_Controller::HTTP_OK);
    }

    function barang_with_stok_auto_get()
    {
        $param = array(
            "search" => safe_get("q"),
            "penjamin" => safe_get("id_penjamin") !== "" ? safe_get("id_penjamin") : "",
            "cekstok" => safe_get("cekstok") !== "" ? safe_get("cekstok") : "",
            "is_farmasi" => safe_get("is_farmasi") !== "" ? safe_get("is_farmasi") : "",
            "id_kategori" => safe_get("id_kategori") !== "" ? safe_get("id_kategori") : "",
        );
        $start = $this->start(safe_get("page"));
        $data = $this->auto->getAutoBarangStok($param, $start, $this->limit);
        if (safe_get("page") == 1 & $param["search"] == "") :
            $pilih[] = array(
                "id" => "",
                "nama" => "-",
                "kekuatan" => "",
                "satuan_kekuatan" => "",
                "sisa" => "",
                "harga_jual" => "",
            );
            $data["data"] = array_merge($pilih, $data["data"]);
            $data["total"] += 1;
        endif;
        $this->response($data, REST_Controller::HTTP_OK);
    }

    function barang_with_stok2_auto_get()
    {
        $param = array(
            "search" => safe_get("q"),
            "penjamin" => safe_get("id_penjamin") !== "" ? safe_get("id_penjamin") : "",
            "cekstok" => safe_get("cekstok") !== "" ? safe_get("cekstok") : "",
            "is_farmasi" => safe_get("is_farmasi") !== "" ? safe_get("is_farmasi") : "",
            "id_kategori" => safe_get("id_kategori") !== "" ? safe_get("id_kategori") : "",
        );
        $start = $this->start(safe_get("page"));
        $data = $this->auto->getAutoBarangStok2($param, $start, $this->limit);
        if (safe_get("page") == 1 & $param["search"] == "") :
            $pilih[] = array(
                "id" => "",
                "nama" => "-",
                "kekuatan" => "",
                "satuan_kekuatan" => "",
                "sisa" => "",
                "harga_jual" => "",
            );
            $data["data"] = array_merge($pilih, $data["data"]);
            $data["total"] += 1;
        endif;
        $this->response($data, REST_Controller::HTTP_OK);
    }

    function barang_darah_auto_get()
    {
        $param = array(
            "search" => safe_get("q"),
            "penjamin" => safe_get("id_penjamin") !== "" ? safe_get("id_penjamin") : "",
            "cekstok" => safe_get("cekstok") !== "" ? safe_get("cekstok") : "",
            "is_farmasi" => safe_get("is_farmasi") !== "" ? safe_get("is_farmasi") : "",
            "id_kategori" => safe_get("id_kategori") !== "" ? safe_get("id_kategori") : "",
        );
        $start = $this->start(safe_get("page"));
        $data = $this->auto->getAutoBarangDarah($param, $start, $this->limit);
        if (safe_get("page") == 1 & $param["search"] == "") :
            $pilih[] = array(
                "id" => "",
                "nama" => "-",
                "kekuatan" => "",
                "satuan_kekuatan" => "",
                "sisa" => "",
                "harga_jual" => "",
                'golongan_darah' => null,
                'rhesus' => null,
            );
            $data["data"] = array_merge($pilih, $data["data"]);
            $data["total"] += 1;
        endif;
        $this->response($data, REST_Controller::HTTP_OK);
    }

    function obat_untuk_keperawatan_get()
    {
        $param = array("search" => safe_get("q"));
        $page = safe_get("page");
        $start = $this->start($page);
        $key = 'obat_untuk_keperawatan_'.safe_get('q').'_'.$page;
        if (!$this->redis->get($key)) :
            $data = $this->auto->getObatKeperawatan($param, $start, $this->limit);
            if (safe_get("page") == 1 & $param["search"] == "") :
                $pilih[] = array("id" => "",
                    "nama" => "-",
                    "kekuatan" => "",
                    "satuan_kekuatan" => ""
                );
                $data["data"] = array_merge($pilih, $data["data"]);
            endif;
            $this->redis->setex($key, 86400, json_encode($data));
            $this->response($data, REST_Controller::HTTP_OK);
        else :
            exit($this->redis->get($key));
        endif;
    }

    function farmakoterapi_auto_get()
    {
        $params['q'] = safe_get('q');
        $page = safe_get('page');
        $start = $this->start($page);
        $key = 'farmakoterapi_auto_'.$params['q'].'_'.$page;
        if (!$this->redis->get($key)) :
            $data = $this->auto->getAutoFarmakoterapi($params, $start, $this->limit);
            if ((safe_get('page') == 1) & ($params['q'] == '')) :
                $pilih[] = array(
                    'id' => '', 
                    'nama' => '', 
                    'kode' => '',
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

    function aturan_pakai_auto_get()
    {
        $params['search'] = safe_get('q');
        $page = safe_get('page');
        $start = $this->start($page);
        $key = 'aturan_pakai_auto_'.$params['search'].'_'.$page;
        if (!$this->redis->get($key)) :
            $data = $this->auto->getAutoAturanPakai($params, $start, $this->limit);
            if ((safe_get('page') == 1) & ($params['search'] == '')) :
                $pilih[] = [];
                $data['data'] = array_merge($pilih, $data['data']);
                $data['total'] += 1;
            endif;
            $this->redis->setex($key, 86400, json_encode($data));
            $this->response($data, REST_Controller::HTTP_OK);
        else :
            exit($this->redis->get($key));
        endif;
    }

    function bangsal_auto_get()
    {
        $q = safe_get('q');
        $page = safe_get('page');
        $start = $this->start($page);
        $key = 'bangsal_auto_'.$q.'_'.$page;
        if (!$this->redis->get($key)) :
            $data = $this->auto->getAutoBangsal($q, $start, $this->limit);
            if ((safe_get('page') == 1) & ($q == '')) :
                $pilih[] = array(
                    'id' => '',
                    'nama' => ' ',
                    'kode' => ' '
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
	
	function bangsal_ranap_auto_get()
    {
        $q = safe_get('q');
        $page = safe_get('page');
        $start = $this->start($page);
        $key = 'bangsal_ranap_auto_'.$q.'_'.$page;
        if (!$this->redis->get($key)) :
            $data = $this->auto->getAutoBangsalRanap($q, $start, $this->limit);
            if ((safe_get('page') == 1) & ($q == '')) :
                $pilih[] = array(
                    'id' => '',
                    'nama' => ' ',
                    'kode' => ' '
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

    function kamar_auto_get()
    {
        $q = safe_get('q');
        $page = safe_get('page');
        $start = $this->start($page);
        $key = 'kamar_auto_'.$q.'_'.$page;
        if (!$this->redis->get($key)) :
            $data = $this->auto->getAutoKamar($q, $start, $this->limit);
            if ((safe_get('page') == 1) & ($q == '')) :
                $pilih[] = array(
                    'id' => '',
                    'nama' => ' ',
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

    function kamar_operasi_auto_get()
    {
        $q = safe_get('q');
        $page = safe_get('page');
        $start = $this->start($page);
        $key = 'kamar_operasi_auto_'.$q.'_'.$page;
        if (!$this->redis->get($key)) :
            $data = $this->auto->getAutoKamarOperasi($q, $start, $this->limit);
            if ((safe_get('page') == 1) & ($q == '')) :
                $pilih[] = array(
                    'id' => '',
                    'nama' => ' ',
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

    function satuan_auto_get()
    {
        $q = safe_get('q');
        $page = safe_get('page');

        if (!$this->get("view_on")) :
            $view_on = "";
        else :
            $view_on = $this->get($page);
        endif;

        $start = $this->start($page);
        $data = $this->auto->getAutoSatuan($q, $view_on, $start, $this->limit);
        if ((safe_get('page') == 1) & ($q == '')) :
            $pilih[] = array(
                'id' => '',
                'nama' => ' ',
            );
            $data['data'] = array_merge($pilih, $data['data']);
            $data['total'] += 1;
        endif;
        $this->response($data, REST_Controller::HTTP_OK); 
    }

    function topik_edukasi_auto_get()
    {
        $q = safe_get('q');
        $page = safe_get('page');
        $start = $this->start($page);
        $key = 'topik_edukasi_auto_'.$q.'_'.$page;
        if (!$this->redis->get($key)) :
            $data = $this->auto->getAutoTopikEdukasi($q, $start, $this->limit);
            if ((safe_get('page') == 1) & ($q == '')) :
                $pilih[] = array(
                    'id' => '',
                    'nama' => '',
                    'keterangan' => '',
                    'text_input' => '',
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

    function data_pegawai_get()
    {
        $q = safe_get('q');
        $page = safe_get('page');
        $start = $this->start($page);
        $key = 'data_pegawai_'.$q.'_'.$page;
        if (!$this->redis->get($key)) :
            $data = $this->auto->getDataPegawai($q, $start, $this->limit);
            if ((safe_get('page') == 1) & ($q == '')) :
                $pilih[] = array(
                    'id' => '', 
                    'nama' => ' ', 
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

    function paket_mcu_get()
    {
        $q = safe_get('q');
        $page = safe_get('page');
        $start = $this->start($page);
        $key = 'paket_mcu_'.$q.'_'.$page;
        if (!$this->redis->get($key)) :
            $data = $this->auto->getPaketMcu($q, $start, $this->limit);
            if ((safe_get('page') == 1) & ($q == '')) :
                $pilih[] = array(
                    'id' => '', 
                    'nama' => '',
					'harga' => '', 
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

    function profesi_auto_get()
    {
        $q = safe_get('q');
        $page = safe_get('page');
        $start = $this->start($page);
        $key = 'profesi_auto_' . $q . '_' . $page;
        if (!$this->redis->get($key)) :
            $data = $this->auto->getAutoProfesi($q, $start, $this->limit);
            if ((safe_get('page') == 1) & ($q == '')) {
                $pilih[] = array('id' => '', 'nama' => ' ');
                $data['data'] = array_merge($pilih, $data['data']);
                $data['total'] += 1;
            }
            $this->redis->setex($key, 84600, json_encode($data));
            $this->response($data, REST_Controller::HTTP_OK);
        else :
            exit($this->redis->get($key));
        endif;
    }

    function sediaan_auto_get()
    {
        $q = safe_get('q');
        $page = safe_get('page');
        $start = $this->start($page);
        $key = 'sediaan_auto_' . $q . '_' . $page;
        if (!$this->redis->get($key)) :
            $data = $this->auto->getAutoSediaan($q, $start, $this->limit);
            if ((safe_get('page') == 1) & ($q == '')) {
                $pilih[] = array('id' => '', 'nama' => ' ');
                $data['data'] = array_merge($pilih, $data['data']);
                $data['total'] += 1;
            }
            $this->redis->setex($key, 84600, json_encode($data));
            $this->response($data, REST_Controller::HTTP_OK);
        else :
            exit($this->redis->get($key));
        endif;
    }

    function pasien_kunjungan_auto_get()
    {
        $q = $this->get('q');
        $page = safe_get('page');
        
        $start = $this->start($page);
        $key = 'pasien_kunjungan_auto_' . $q . '_' . $page;
        if (!$this->redis->get($key)) :
        $data = $this->auto->getAutoPasienKunjungan($q, $start, $this->limit);
        if ((safe_get('page') == 1) & ($q == '')) :
            $pilih[] = array(
                'id'                        => '',
                'id_layanan_pendaftaran'    => '',
                'id_pasien'                 => '',
                'no_register'               => '',
                'nama'                      => '',
                'tanggal'                   => '',
                'tanggal_keluar'            => '',
                'jenis_layanan'             => '',
                'tindak_lanjut'             => '',
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

    function pasien_kunjungan_regis_auto_get()
    {
        $q = $this->get('q');
        $page = safe_get('page');
        
        $start = $this->start($page);
        $key = 'pasien_kunjungan_regis_auto_' . $q . '_' . $page;
        if (!$this->redis->get($key)) :
        $data = $this->auto->getAutoPasienKunjunganByRegister($q, $start, $this->limit);
        if ((safe_get('page') == 1) & ($q == '')) :
            $pilih[] = array(
                'id'                        => '',
                'id_layanan_pendaftaran'    => '',
                'id_pasien'                 => '',
                'no_register'               => '',
                'nama'                      => '',
                'tanggal'                   => '',
                'tanggal_keluar'            => '',
                'jenis_layanan'             => '',
                'tindak_lanjut'             => '',
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

    function barang_pkrt_auto_get()
    {
        $param = array(
            "search" => safe_get("q"),
        );
        $start = $this->start(safe_get("page"));
        $data = $this->auto->getAutoBarangPKRT($param, $start, $this->limit);
        if (safe_get("page") == 1 & $param["search"] == "") :
            $pilih[] = array(
                "id" => "",
                "nama" => "-",
                "nominal" => "0",
            );
            $data["data"] = array_merge($pilih, $data["data"]);
            $data["total"] += 1;
        endif;
        $this->response($data, REST_Controller::HTTP_OK);
    }
}