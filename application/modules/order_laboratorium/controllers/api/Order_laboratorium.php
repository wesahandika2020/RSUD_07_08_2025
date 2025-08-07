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
class Order_laboratorium extends REST_Controller
{

    function __construct()
    {
        parent::__construct();
		$this->limit = 10;
		$this->datetime = date('Y-m-d H:i:s');
        $this->load->model('Order_laboratorium_model', 'm_order_laboratorium');

        $id_translucent = $this->session->userdata('id_translucent');
        if (empty($id_translucent)) :
            $this->response(array('error' => 'Anda belum login'), REST_Controller::HTTP_UNAUTHORIZED);
            exit();
        endif;

        $data_lis = $this->m_pelayanan->getLIS();

        $this->url = $data_lis->url;
        $this->user = $data_lis->user;
        $this->pass = $data_lis->pass;
    }

    function dokter_penanggung_jawab_get()
    {
        if (!$this->get('page')) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
        endif;

        $q = safe_get('q');
        $page = safe_get('page');
        $start = $this->start($page);
        
        $data = $this->m_order_laboratorium->getDokterPenanggungJawab($q, $start, $this->limit);
        if ((safe_get('page') == 1) & ($q == '')) :
            $pilih[] = array(
                'id' => '', 
                'nama' => '', 
                'spesialisasi' => ''
            );
            $data['data'] = array_merge($pilih, $data['data']);
            $data['total'] += 1;
        endif;
        $this->response($data, REST_Controller::HTTP_OK);
    
    }

    function get_list_order_laboratorium_get()
    {
        if (!$this->get('page')) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
        endif;
        
        $start          = ($this->get('page') - 1) * $this->limit;
        $search         = [
            'tanggal_awal'      => safe_get('tanggal_awal'),
            'tanggal_akhir'     => safe_get('tanggal_akhir'),
            'no_register'       => safe_get('no_register'),
            'no_rm'             => safe_get('no_rm'),
            'nama'              => safe_get('nama'),
            'dokter'            => safe_get('dokter'),
            'jenis'             => safe_get('jenis'),
        ];
        
        $data = $this->m_order_laboratorium->getListDataOrderLaboratorium($this->limit, $start, $search);
        $data['page']    = (int) $this->get('page');
        $data['limit']   = $this->limit;

        if ($data) :
            $this->response($data, REST_Controller::HTTP_OK); // (200)
        endif;
    }

    private function start($page)
    {
        return (($page - 1) * $this->limit);
    }

    function nadis_auto_get()
    {
        $params['q'] = safe_get('q');
        $start = $this->start(safe_get('page'));
        $params['jenis'] = safe_get('jenis');
        $data = $this->m_order_laboratorium->getPegawaiLab($params, $start, $this->limit);
        if ((safe_get('page') == 1) & ($params['q'] == '')) {
            $pilih[] = array(
                'id' => '', 
                'nama' => ' ', 
                'spesialisasi' => '',
            );

            $data['data'] = array_merge($pilih, $data['data']);
            $data['total'] += 1;
        }
        $this->response($data, REST_Controller::HTTP_OK);
    }

    function postLab_put()
    {   
        $this->db->trans_begin();

        $this->load->library('Curl');
        $this->load->model('pelayanan/Pelayanan_model', 'm_pelayanan');

        $status = true;
        $message = "";
        $cito = $this->put('cito');
        $item_post = $this->put('tindakan_lab');
        $item_lab = $this->put('item_lab');
        $item_lab_label = $this->put('item_lab_label');
        $keterangan = $this->put('keterangan');
        $order = $this->put('order');
        $jenis = $this->put('jenis_lab');
        $no_ono = $this->put('ono');
        $id_dokter_rujuk = $this->put('id_dokter_rujuk');
        $dokter_rujuk = $this->put('dokter_rujuk');

        $id_layanan_pendaftaran = $this->put('id_layanan');
        $n_sql = "select pas.*, concat_ws(' ', pas.no_rumah, concat('Rt.', pas.no_rt, '/', pas.no_rw), pas.nama_kel, pas.nama_kec, pas.nama_kab, pas.nama_prop, pas.kode_pos) as alamat_tambahan, sp.nama as dokt_name, lp.jenis_layanan, p.jenis_rawat, p.id_pasien as rm_pasien, gss.nama as diagnosis, pj.nama as penjamin, dg.golongan_sebab_sakit_lain as sebab_sakit, lp.cara_bayar
            from sm_layanan_pendaftaran lp
            left join sm_pendaftaran p on (p.id = lp.id_pendaftaran) 
            left join sm_penjamin pj on (pj.id = lp.id_penjamin) 
            left join sm_diagnosa dg on (dg.id_layanan_pendaftaran = lp.id)
            left join sm_golongan_sebab_sakit as gss on (gss.id = dg.id_golongan_sebab_sakit)
            left join sm_tenaga_medis tm on (tm.id = lp.id_dokter) 
            left join sm_pegawai sp on (sp.id = tm.id_pegawai) 
            left join sm_pasien pas on (p.id_pasien = pas.id)  
                where lp.id = '" . $id_layanan_pendaftaran . "' ";
        $n_pendaftaran = $this->db->query($n_sql)->row();

        $sql = "select lp.*, pj.diskon
                from sm_layanan_pendaftaran lp
                left join sm_penjamin pj on (pj.id = lp.id_penjamin)
                where lp.id = '" . $id_layanan_pendaftaran . "' ";
        $layanan_pendaftaran = $this->db->query($sql)->row();

        if (0 < count((array)$layanan_pendaftaran)) 
        {

            
            $arr_item = array();
            if (is_array($item_post)) 
            {
                
                foreach ($jenis as $j => $vj) {


                    if($vj === '292'){
                        $need_data = 'Patologi Klinik';
                    } else if($vj === '293'){
                        $need_data = 'Patologi Anatomi';
                    } else if($vj === '298'){
                        $need_data = 'Mikrobiologi';
                    }


                    $jenis_lab[$j]            = $need_data;

                     
                    
                }

                foreach ($cito as $c => $cit) {


                    $cito_val[$c]            = $cit;

                     
                    
                }

                foreach ($item_lab as $i => $il) {


                    $item_lab_val[$i]   = $il;

                    $penjamin_val[$i] = (int)0;

                    if($item_lab_val[$i] !== ''){

                        $cek[$i] = $this->m_pelayanan->cek_penjaminan_tarif($item_lab_val[$i], $layanan_pendaftaran->id_penjamin);

                        if (0 < $cek[$i]) {
                                $penjamin_val[$i] = $layanan_pendaftaran->id_penjamin;
                            } 
                    }


               }

               foreach ($item_lab_label as $ilb => $ilabel) {


                    $item_lab_label_val[$ilb]            = $ilabel;

                     
                    
                }

                foreach ($id_dokter_rujuk as $idr => $idrj) {


                    $id_dokter_rujuk_val[$idr]            = $idrj;

                     
                    
                }

                foreach ($dokter_rujuk as $dr => $drj) {


                    $dokter_rujuk_val[$dr]            = $drj;

                     
                    
                }

                

                foreach ($keterangan as $k => $ket) {


                    $keterangan_val[$k]            = $ket;

                     
                    
                }

                
                   
                $val_order = array_unique($order);
                $id_order = (int)$order[0];
                
                $arr_item = array();
                foreach ($item_post as $key => $value) {

                    $arr_item[$key]['jenis']            = $jenis_lab[$key];
                    $arr_item[$key]['layanan']          = $value;
                    $arr_item[$key]['cito']             = $cito_val[$key];
                    $arr_item[$key]['item_lab']         = $item_lab_val[$key];
                    $arr_item[$key]['item_lab_label']   = $item_lab_label_val[$key];
                    $arr_item[$key]['keterangan']       = $keterangan_val[$key];
                    $arr_item[$key]['penjamin']         = (int)$penjamin_val[$key];
                    $arr_item[$key]['id_dokter_rujuk']  = (int)$id_dokter_rujuk_val[$key];
                    $arr_item[$key]['dokter_rujuk']     = $dokter_rujuk_val[$key];


                    


                }


                

                $item = "[";

                foreach($arr_item as $n => $value){

                    $get_arr = $value['jenis'];
                    $get_id_dokter = $value['id_dokter_rujuk'];
                    $get_dokter = $value['dokter_rujuk'];
                    
                    $item .= "{\"item\":\"" . $value['layanan'] . "\", \"penjamin\":\"" . $value['penjamin'] . "\", \"cito\":\"" . $value['cito'] . "\", \"item_lab\":" . ($value['item_lab'] !== "" ? $value['item_lab'] : "[]") . " , \"item_lab_label\":\"" . $value['item_lab_label'] . "\", \"keterangan\":\"" . $value['keterangan'] . "\"}";
                    if ($n < sizeof($item_lab) - 1) {
                        $item .= ",";
                    }

                }
                
                $item .= "]";



                $request = array(

                        'id_dokter' => $get_id_dokter,
                        'item' => $item,
                        'jenis' => $get_arr

                    );

                $this->db->where('id', $id_order)->update('sm_order_laboratorium',$request);

                $status = true;
                $message = "Berhasil order laboratorium";
                
                

                if($order !== null)
                {   

                    $ono = $this->put('ono');

                    $curl_item = array();
                    foreach ($item_post as $key => $value) {
                        if ($value !== '') {
                            $curl_item[$key]['layanan'] = $value;
                            $curl_item[$key]['cito'] = $cito[$key];
                        }
                    }

                    if (is_array($curl_item)) 
                        {
                            $alamat = substr($n_pendaftaran->alamat,50,50);

                            if(is_string($alamat)){

                                $max_alamat = substr($n_pendaftaran->alamat,0,50);
                                $max_alamat_satu = $alamat;

                            } else {

                                $alamat_utama = strlen(substr($n_pendaftaran->alamat,0,50));

                                $hitung_alamat = 50 - $alamat_utama;

                                $alternatif_alamat = $n_pendaftaran->alamat_tambahan;

                                if($hitung_alamat > 0){

                                    if(($hitung_alamat > 0 || $hitung_alamat < 0  ) && $hitung_alamat < 2 ){

                                        $hitung_ulang_a = 0;

                                    } else {

                                        $hitung_ulang_a = $hitung_alamat - 2;

                                    }

                                    $alamat_awal = substr($n_pendaftaran->alamat,0,50);

                                    $satu_alamat = substr($alternatif_alamat,0,($hitung_ulang_a));

                                    $max_alamat = $alamat_awal.' '.$satu_alamat;

                                    $hitung_satu_alamat = strlen($satu_alamat);

                                    $max_alamat_satu = substr($n_pendaftaran->alamat_tambahan,$hitung_satu_alamat,50);

                                } else {

                                    $max_alamat = substr($n_pendaftaran->alamat,0,50);

                                    $opsi_alamat = substr($alternatif_alamat,0,50);

                                    if(is_string($opsi_alamat)){

                                        $max_alamat_satu = $opsi_alamat;

                                    } else {

                                        $max_alamat_satu = null;

                                    }

                                }

                            }

                            if(isset($n_pendaftaran->penjamin)){

                                $penjamin = $n_pendaftaran->penjamin;

                            } else {

                                $penjamin = $n_pendaftaran->cara_bayar;

                            }

                            if(isset($n_pendaftaran->diagnosis)){

                                $sebab_sakit_lain = $n_pendaftaran->diagnosis;

                            } else {

                                $s_sebab = substr($n_pendaftaran->sebab_sakit,0,100);

                                if(is_string($s_sebab)){

                                    $sebab_sakit_lain = $s_sebab;

                                } else {

                                    $sebab_sakit_lain = null;
                                }

                            }

                            $t_lahir = str_replace("-", "",$n_pendaftaran->tanggal_lahir);
                            $j_kel = $n_pendaftaran->kelamin;
                            if($j_kel === 'L'){

                                $jenis_kelamin = 1;
                                
                            } else {

                                $jenis_kelamin = 2;
                            }

                            $jenis_rawat = "OP";

                            $get_pjwb = "select sp.nip
                                    from sm_tenaga_medis tm 
                                    left join sm_pegawai sp on (sp.id = tm.id_pegawai) 
                                    where tm.id = '" . $arr_item[0]['id_dokter_rujuk'] . "' ";
                            $n_pjwb = $this->db->query($get_pjwb)->row();
                            
                            
                                foreach ($curl_item as $key => $value) {
                                    if ($value !== '') {

                                        $code_value = array($value['layanan']);
                                        $code_cito = array($value['cito']);


                                        foreach ($code_value as $a) {

                                            

                                            $la = "select coalesce(la.test_code, '') as nama_kode
                                            from sm_layanan la
                                            left join sm_tarif_pelayanan tp on (tp.id_layanan = la.id) 
                                            where tp.id = '" . $a . "' ";
                                            $code_name = $this->db->query($la)->row();

                                            $test_code = $code_name->nama_kode;
                                            $test_item[] = $test_code;

                                        } 

                                        foreach ($code_cito as $b) {

                                            
                                            $get_cito = $b;
                                            $test_cito[] = $get_cito;
                                            

                                        }

                                        

                                    }

                                }



                            $cito_search = array_search("ya", $test_cito);

                            if($cito_search !== false){

                                $cito = "U";

                            } else {

                                $cito = "R";

                            }

                            $id_bangsal = 109;
                            $bangsal = 'Laboratorium';
                            $no_ruang = "";

                            

                            

                            $params=array(
                                    "message_dt"=> "".date("YmdHis")."",
                                    "order_control"=> "NW",
                                    "patient"=> array(  
                                                        "pid"=> $n_pendaftaran->id,
                                                        "apid"=> "",
                                                        "name"=> $n_pendaftaran->nama,
                                                        "address1"=> $max_alamat,
                                                        "address2"=> $max_alamat_satu,
                                                        "address3"=> $penjamin,
                                                        "address4"=> $n_pjwb->nip,
                                                        "birth_dt"=> $t_lahir,
                                                        "sex"=> $jenis_kelamin
                                                    ),
                                    "ono"=> $ono,
                                    "ptype"=> $jenis_rawat,
                                    "request_dt"=> "".date("YmdHis")."",
                                    "source"=> array(
                                                        "code"=> $id_bangsal,
                                                        "name"=> $bangsal,
                                                        "room_no"=> $no_ruang
                                                    ),
                                    "clinician"=> array(
                                                        "code"=> $get_id_dokter,
                                                        "name"=> $get_dokter
                                                    ),
                                    "priority"=> $cito,
                                    "diagnose"=> $sebab_sakit_lain,
                                    "pstatus"=> "",
                                    "comment"=> "",
                                    "visitno"=> "",
                                    "order_testid"=> $test_item
                                );

                            
                            $data_api = json_encode($params);

                            $ch = curl_init();

                            if (!$ch) {
                                die("Couldn't initialize a cURL handle");
                            }
                            curl_setopt_array($ch, array(
                            CURLOPT_URL => $this->url.'/api/order/create/',
                            CURLOPT_POST => 1,
                            CURLOPT_POSTFIELDS => $data_api,
                            CURLOPT_RETURNTRANSFER => true,
                            CURLOPT_HTTPHEADER => array('x-username: '.$this->user.'',
                                    'x-password: '.$this->pass.''),
                            ));

                            $api_result = curl_exec($ch);

                            if($api_result === false){

                                curl_close($ch); // close cURL handler
                                $status = false;
                                $message = "Gagal Menghubungi LIS";
                                $respon = 503;

                                $response_lab = "select jl.id as id_response
                                                from sm_jenis_lab jl
                                                where jl.id_lab = '" . $id_order . "' ";
                                                $create_response = $this->db->query($response_lab)->row();

                                if($create_response !== null)
                                {

                                    $id_response = $create_response->id_response;
                                    $response_lab = array(
                                    'id_layanan_pendaftaran' => (int)$this->put('id_layanan'),
                                    'id_lab' => (int)$id_order,
                                    'status' => 503
                                    );

                                    $this->m_pelayanan->update_response_laboratorium($response_lab, $id_response);

                                } else {

                                    $response_lab = array(
                                    'id_layanan_pendaftaran' => (int)$this->put('id_layanan'),
                                    'id_lab' => (int)$id_order,
                                    'status' => 503
                                    );

                                    $this->m_pelayanan->respon_order_lab($response_lab);
                                }

                            } else {

                                $response_getinfo = curl_getinfo($ch, CURLINFO_RESPONSE_CODE);
                                $response_http = curl_getinfo($ch, CURLINFO_HTTP_CODE);
                                $outputJSON = json_decode($api_result);
                                curl_close($ch); // close cURL handler

                                if ($response_getinfo === 201) {

                                    $respon = 201;
                                    $message = "Berhasil melakukan permintaan Laboratorium ke LIS";
                                    $status = true;

                                } else if($response_getinfo === 400){
                                    $respon = 400;
                                    $message = "Gagal post ke service LIS atau nama dokter tidak boleh kosong, silakan isi diagnosis terlebih dahulu";
                                    $status = false;
                                
                                } else {

                                    $respon = 404;
                                    $status = false;
                                    $message = "Gagal post ke service LIS";
                                }

                                if ($response_http) 
                                {
                                
                                    $response_lab = array(
                                    'id_layanan_pendaftaran' => (int)$this->put('id_layanan'),
                                    'id_lab' => $id_order,
                                    'status' => $response_getinfo
                                    );

                                    $this->m_pelayanan->respon_order_lab($response_lab);

                                }
                            }

                        } else {
                            
                            $respon = 404;
                            $status = false;
                            $message = "Tidak ada Data";
                            
                        }

                } else {
                        
                        $respon = 404;
                        $status = false;
                        $message = "Tidak ada Data";
                        
                }

                                
            } else {
                $respon = 404;
                $status = false;
                $message = "Gagal order laboratorium, anda belum memilih item pemerikaan";
                
            }

        } else {

                $respon = 404;
                $status = false;
                $message = "Gagal order laboratorium, anda belum memilih item pemerikaan";
                
        }  

        if ($this->db->trans_status() === false) :
            $this->db->trans_rollback();
            $status = false;
        else :
            $this->db->trans_commit();
            $status = true;
        endif;

        $data = array("status" => $status, "message" => $message);
        $this->response($data, $respon);

    }

    function simpan_batal_order_laboratorium_post()
    {
        if (safe_post('id_order') === '') :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
        endif;

        $this->load->library('Curl');

        $id_order_lab = $this->post('id_order');

        $this->load->model('pelayanan/Pelayanan_model', 'm_pelayanan');
        $order_lab = $this->m_pelayanan->get_order_laboratorium($id_order_lab);

        $id_layanan_pendaftaran = $order_lab->id_layanan_pendaftaran;

        $n_sql = "select pas.*, concat_ws(' ', pas.no_rumah, concat('Rt.', pas.no_rt, '/', pas.no_rw), pas.nama_kel, pas.nama_kec, pas.nama_kab, pas.nama_prop, pas.kode_pos) as alamat_tambahan, sp.nama as dokt_name, lp.jenis_layanan, p.jenis_rawat, p.id_pasien as rm_pasien, gss.nama as diagnosis, pj.nama as penjamin, dg.golongan_sebab_sakit_lain as sebab_sakit, lp.cara_bayar
                from sm_layanan_pendaftaran lp
                left join sm_pendaftaran p on (p.id = lp.id_pendaftaran) 
                left join sm_penjamin pj on (pj.id = lp.id_penjamin) 
                left join sm_diagnosa dg on (dg.id_layanan_pendaftaran = lp.id)
                left join sm_golongan_sebab_sakit as gss on (gss.id = dg.id_golongan_sebab_sakit)
                left join sm_tenaga_medis tm on (tm.id = lp.id_dokter) 
                left join sm_pegawai sp on (sp.id = tm.id_pegawai) 
                left join sm_pasien pas on (p.id_pasien = pas.id) 
                where lp.id = '" . $id_layanan_pendaftaran . "' ";

        $n_pendaftaran = $this->db->query($n_sql)->row();

        if (0 < count((array)$n_pendaftaran)) 
        {

            $this->load->model('pelayanan/Pelayanan_model', 'm_pelayanan');
            $order_lab = $this->m_pelayanan->get_order_laboratorium($id_order_lab);

            if($order_lab !== null)
            {
                $get_order_value = json_decode($order_lab->item);
                
                if (is_array($get_order_value)) 
                {
                    $alamat = substr($n_pendaftaran->alamat,50,50);

                    if(is_string($alamat)){

                        $max_alamat = substr($n_pendaftaran->alamat,0,50);
                        $max_alamat_satu = $alamat;

                    } else {

                        $alamat_utama = strlen(substr($n_pendaftaran->alamat,0,50));

                        $hitung_alamat = 50 - $alamat_utama;

                        $alternatif_alamat = $n_pendaftaran->alamat_tambahan;

                        if($hitung_alamat > 0){

                            if(($hitung_alamat > 0 || $hitung_alamat < 0  ) && $hitung_alamat < 2 ){

                                $hitung_ulang_a = 0;

                            } else {

                                $hitung_ulang_a = $hitung_alamat - 2;

                            }

                            $alamat_awal = substr($n_pendaftaran->alamat,0,50);

                            $satu_alamat = substr($alternatif_alamat,0,($hitung_ulang_a));

                            $max_alamat = $alamat_awal.' '.$satu_alamat;

                            $hitung_satu_alamat = strlen($satu_alamat);

                            $max_alamat_satu = substr($n_pendaftaran->alamat_tambahan,$hitung_satu_alamat,50);

                        } else {

                            $max_alamat = substr($n_pendaftaran->alamat,0,50);

                            $opsi_alamat = substr($alternatif_alamat,0,50);

                            if(is_string($opsi_alamat)){

                                $max_alamat_satu = $opsi_alamat;

                            } else {

                                $max_alamat_satu = null;

                            }

                        }

                    }

                    if(isset($n_pendaftaran->penjamin)){

                        $penjamin = $n_pendaftaran->penjamin;

                    } else {

                        $penjamin = $n_pendaftaran->cara_bayar;

                    }

                    if(isset($n_pendaftaran->diagnosis)){

                        $sebab_sakit_lain = $n_pendaftaran->diagnosis;

                    } else {

                        $s_sebab = substr($n_pendaftaran->sebab_sakit,0,100);

                        if(is_string($s_sebab)){

                            $sebab_sakit_lain = $s_sebab;

                        } else {

                            $sebab_sakit_lain = null;
                        }

                    }

                    $t_lahir = str_replace("-", "",$n_pendaftaran->tanggal_lahir);
                    $j_kel = $n_pendaftaran->kelamin;
                    if($j_kel === 'L'){

                        $jenis_kelamin = 1;
                        
                    } else {

                        $jenis_kelamin = 2;
                    }

                    $j_rawat = $n_pendaftaran->jenis_rawat;
                    if($j_rawat === 'Inap'){

                        $jenis_rawat = "IP";
                        
                    } else {

                        $jenis_rawat = "OP";
                    }
                            
                    foreach($get_order_value as $key){

                        $cito_value = $key->cito;

                        if($cito_value === "ya"){

                            $cito = "U";
                        
                        } else {

                            $cito = "R";
                        }

                        $a = $key->item;

                        $la = "select coalesce(la.test_code, '') as nama_kode
                                from sm_layanan la
                                left join sm_tarif_pelayanan tp on (tp.id_layanan = la.id) 
                                where tp.id = '" . $a . "' ";
                                $code_name = $this->db->query($la)->row();

                                $test_code = $code_name->nama_kode;
                                $test_item[] = $test_code;
                        
                    }
                           
                    $inap = $n_pendaftaran->jenis_layanan;
                    if($inap === "Rawat Inap"){

                        $q = "select coalesce(bg.nama, '') as bangsal, ri.no_ruang as no_ruang, ri.id_bangsal as id_bangsal
                            from sm_layanan_pendaftaran lp
                            left join sm_rawat_inap ri on (ri.id_layanan_pendaftaran = lp.id) 
                            left join sm_bangsal bg on (bg.id = ri.id_bangsal) 
                            where lp.id = '" . $id_layanan_pendaftaran . "' ";
                        $bangsal_name = $this->db->query($q)->row();

                        $source_code = $bangsal_name->id_bangsal;

                        if(isset($bangsal_name->id_bangsal)){

                            if($source_code === '2'){

                                //Meranti

                                $id_bangsal = 2;
                                $bangsal = 'Meranti';
                                $no_ruang = $bangsal_name->no_ruang;

                            } else if($source_code === '3'){

                                //Cendana

                                $id_bangsal = 155;
                                $bangsal = 'Cendana';
                                $no_ruang = $bangsal_name->no_ruang;
                            
                            } else if($source_code === '4'){

                                //Cendana II

                                $id_bangsal = 184;
                                $bangsal = 'Cendana II';
                                $no_ruang = $bangsal_name->no_ruang;

                            } else if($source_code === '5'){

                                //Jati

                                $id_bangsal = 37;
                                $bangsal = 'Jati';
                                $no_ruang = $bangsal_name->no_ruang;

                            } else if($source_code === '6'){

                                //Mahoni I

                                // $id_bangsal = 107;
                                // $bangsal = 'Mahoni I';
                                // $no_ruang = $bangsal_name->no_ruang;

                                //Albasia 2

                                $id_bangsal = 209;
                                $bangsal = 'Albasia 2';
                                $no_ruang = $bangsal_name->no_ruang;

                            } else if($source_code === '7'){

                                //Mahoni II

                                $id_bangsal = 190;
                                $bangsal = 'Mahoni II';
                                $no_ruang = $bangsal_name->no_ruang;

                            } else if($source_code === '8'){

                                //Eboni

                                $id_bangsal = 38;
                                $bangsal = 'Eboni';
                                $no_ruang = $bangsal_name->no_ruang;

                            } else if($source_code === '9'){

                                //Pinus

                                $id_bangsal = 9;
                                $bangsal = 'Pinus';
                                $no_ruang = $bangsal_name->no_ruang;

                            } else if($source_code === '16'){

                                //Isolasi Ulin 1

                                $id_bangsal = 212;
                                $bangsal = 'Isolasi Ulin 1';
                                $no_ruang = $bangsal_name->no_ruang;

                            } else if($source_code === '17'){

                                //Isolasi Ulin 2

                                $id_bangsal = 213;
                                $bangsal = 'Isolasi Ulin 2';
                                $no_ruang = $bangsal_name->no_ruang;

                            } else if($source_code === '18'){

                                //Albasia

                                $id_bangsal = 18;
                                $bangsal = 'Albasia';
                                $no_ruang = $bangsal_name->no_ruang;

                            } else if($source_code === '19'){

                                //Albasia 2

                                $id_bangsal = 209;
                                $bangsal = 'Albasia 2';
                                $no_ruang = $bangsal_name->no_ruang;

                            } else if($source_code === '20'){

                                //Kamar Bersalin

                                $id_bangsal = 72;
                                $bangsal = 'Kamar Bersalin';
                                $no_ruang = $bangsal_name->no_ruang;

                            } else if($source_code === '24'){

                                //Rawat Gabung Bayi

                                $id_bangsal = 185;
                                $bangsal = 'Rawat Gabung Bayi';
                                $no_ruang = $bangsal_name->no_ruang;

                            } else {

                                $id_bangsal = $bangsal_name->id_bangsal;
                                $bangsal = $bangsal_name->bangsal;
                                $no_ruang = $bangsal_name->no_ruang;

                            }

                        } else {

                            $id_bangsal = $bangsal_name->id_bangsal;
                            $bangsal = $bangsal_name->bangsal;
                            $no_ruang = $bangsal_name->no_ruang;

                        }

                    } else if($inap === "Intensive Care"){

                        $q = "select coalesce(bg.nama, '') as bangsal, ri.no_ruang as no_ruang, ri.id_bangsal as id_bangsal
                            from sm_layanan_pendaftaran lp
                            left join sm_intensive_care ri on (ri.id_layanan_pendaftaran = lp.id) 
                            left join sm_bangsal bg on (bg.id = ri.id_bangsal) 
                            where lp.id = '" . $id_layanan_pendaftaran . "' ";
                        $bangsal_name = $this->db->query($q)->row();

                        $source_code = $bangsal_name->id_bangsal;

                        if(isset($bangsal_name->id_bangsal)){

                            if($source_code === '10'){

                                //HCU

                                $id_bangsal = 36;
                                $bangsal = 'HCU';
                                $no_ruang = $bangsal_name->no_ruang;

                            } else if($source_code === '11'){

                                //ICU

                                $id_bangsal = 33;
                                $bangsal = 'ICU';
                                $no_ruang = $bangsal_name->no_ruang;

                            } else if($source_code === '12'){

                                //NICU

                                $id_bangsal = 70;
                                $bangsal = 'NICU';
                                $no_ruang = $bangsal_name->no_ruang;

                            } else if($source_code === '13'){

                                //PICU

                                $id_bangsal = 35;
                                $bangsal = 'PICU';
                                $no_ruang = $bangsal_name->no_ruang;

                            } else {

                                $id_bangsal = $bangsal_name->id_bangsal;
                                $bangsal = $bangsal_name->bangsal;
                                $no_ruang = $bangsal_name->no_ruang;

                            }

                        } else {

                            $id_bangsal = $bangsal_name->id_bangsal;
                            $bangsal = $bangsal_name->bangsal;
                            $no_ruang = $bangsal_name->no_ruang;

                        }

                    } else if($inap === "IGD"){

                        $q = "select coalesce(sp.jenis_igd, '') as bangsal, sp.jenis_pendaftaran as id_bangsal
                            from sm_layanan_pendaftaran lp
                            left join sm_pendaftaran sp on (lp.id_pendaftaran = sp.id) 
                            where lp.id = '" . $id_layanan_pendaftaran . "' ";
                        $bangsal_name = $this->db->query($q)->row();

                        $source_code = $bangsal_name->id_bangsal;

                        if(isset($bangsal_name->id_bangsal)){

                            if($source_code === 'IGD'){

                                //IGD

                                $id_bangsal = 45;
                                $bangsal = 'IGD';
                                $no_ruang = "";

                            } else {

                                $id_bangsal = 45;
                                $bangsal = 'IGD';
                                $no_ruang = "";

                            }

                        } else {
                        
                            $id_bangsal = 45;
                            $bangsal = 'IGD';
                            $no_ruang = "";

                        }

                    } else if($inap === "Laboratorium"){

                            $id_bangsal = 109;
                            $bangsal = 'Laboratorium';
                            $no_ruang = "";

                    } else if($inap === "Hemodialisa"){

                        $id_bangsal = 65;
                        $bangsal = 'Hemodialisis(HD)';
                        $no_ruang = "";

                    } else if($inap === "Poliklinik"){

                        $q = "select ss.id as id, ss.nama as bangsal, ss.kode as id_bangsal, ss.id_unit as no_ruang
                            from sm_layanan_pendaftaran lp
                            left join sm_spesialisasi ss on (lp.id_unit_layanan = ss.id) 
                            where lp.id = '" . $id_layanan_pendaftaran . "' ";

                        $bangsal_name = $this->db->query($q)->row();

                        $source_bangsal = $bangsal_name->id;

                        if(isset($bangsal_name->id)){

                            if($source_bangsal === '11'){

                                $id_bangsal = 15;
                                $bangsal = 'ANAK, P';
                                $no_ruang = "";

                            } else if($source_bangsal === '12'){

                                $id_bangsal = 201;
                                $bangsal = 'BEDAH MULUT, P';
                                $no_ruang = "";

                            } else if($source_bangsal === '13'){

                                $id_bangsal = 175;
                                $bangsal = 'BEDAH SYARAF, P';
                                $no_ruang = "";

                            } else if($source_bangsal === '14'){

                                $id_bangsal = 6;
                                $bangsal = 'BEDAH, P';
                                $no_ruang = "";

                            } else if($source_bangsal === '15'){

                                $id_bangsal = 156;
                                $bangsal = 'GIGI, P';
                                $no_ruang = "";

                            } else if($source_bangsal === '16'){

                                $id_bangsal = 186;
                                $bangsal = 'GINJAL HIPERTENSI, P';
                                $no_ruang = "";

                            } else if($source_bangsal === '20'){

                                $id_bangsal = 3;
                                $bangsal = 'JANTUNG,P';
                                $no_ruang = "";

                            } else if($source_bangsal === '21'){

                                $id_bangsal = 12;
                                $bangsal = 'JIWA, P';
                                $no_ruang = "";

                            } else if($source_bangsal === '22'){

                                $id_bangsal = 196;
                                $bangsal = 'KEDOKTERAN GIGI ANAK, P';
                                $no_ruang = "";

                            } else if($source_bangsal === '23'){

                                $id_bangsal = 197;
                                $bangsal = 'KONSERVASI GIGI, P';
                                $no_ruang = "";

                            } else if($source_bangsal === '24'){

                                $id_bangsal = 11;
                                $bangsal = 'KULIT KELAMIN, P';
                                $no_ruang = "";

                            } else if($source_bangsal === '25'){

                                $id_bangsal = 4;
                                $bangsal = 'MATA,P';
                                $no_ruang = "";

                            } else if($source_bangsal === '26'){

                                $id_bangsal = 8;
                                $bangsal = 'OBGYN, P';
                                $no_ruang = "";

                            } else if($source_bangsal === '27'){

                                $id_bangsal = 198;
                                $bangsal = 'ORTHODONTI, P';
                                $no_ruang = "";

                            } else if($source_bangsal === '28'){

                                $id_bangsal = 170;
                                $bangsal = 'ORTHOPAEDI, P';
                                $no_ruang = "";

                            } else if($source_bangsal === '29'){

                                $id_bangsal = 5;
                                $bangsal = 'PARU, P';
                                $no_ruang = "";

                            } else if($source_bangsal === '30'){

                                $id_bangsal = 17;
                                $bangsal = 'PENYAKIT DALAM, P';
                                $no_ruang = "";

                            } else if($source_bangsal === '31'){

                                $id_bangsal = 200;
                                $bangsal = 'PENYAKIT MULUT, P';
                                $no_ruang = "";

                            } else if($source_bangsal === '32'){

                                $id_bangsal = 199;
                                $bangsal = 'PERIODONTI, P';
                                $no_ruang = "";

                            } else if($source_bangsal === '34'){

                                $id_bangsal = 16;
                                $bangsal = 'REHAB MEDIK';
                                $no_ruang = "";

                            } else if($source_bangsal === '35'){

                                $id_bangsal = 7;
                                $bangsal = 'SYARAF, P';
                                $no_ruang = "";

                            } else if($source_bangsal === '36'){

                                $id_bangsal = 10;
                                $bangsal = 'THT, P';
                                $no_ruang = "";

                            } else if($source_bangsal === '37'){

                                $id_bangsal = 171;
                                $bangsal = 'UROLOGI, P';
                                $no_ruang = "";

                            } else {
                            
                                $id_bangsal = $bangsal_name->id_bangsal;
                                $bangsal = $bangsal_name->bangsal;
                                $no_ruang = "";

                            }

                        } else {
                            
                                $id_bangsal = $bangsal_name->id_bangsal;
                                $bangsal = $bangsal_name->bangsal;
                                $no_ruang = "";

                        }

                    } else {

                        $q = "select ss.nama as bangsal, ss.kode as id_bangsal, ss.id_unit as no_ruang
                            from sm_layanan_pendaftaran lp
                            left join sm_spesialisasi ss on (lp.id_unit_layanan = ss.id) 
                            where lp.id = '" . $id_layanan_pendaftaran . "' ";
                        $bangsal_name = $this->db->query($q)->row();

                        $id_bangsal = $bangsal_name->id_bangsal;
                        $bangsal = $bangsal_name->bangsal;
                        $no_ruang = $bangsal_name->no_ruang;

                    }

                    $nomer_urut = $order_lab->ono;

                    $params=array(
                        "message_dt"=> "".date("YmdHis")."",
                        "order_control"=> "CA",
                        "patient"=> array(  
                                            "pid"=> $n_pendaftaran->id,
                                            "apid"=> "",
                                            "name"=> $n_pendaftaran->nama,
                                            "address1"=> $max_alamat,
                                            "address2"=> $max_alamat_satu,
                                            "address3"=> $penjamin,
                                            "address4"=> "",
                                            "birth_dt"=> $t_lahir,
                                            "sex"=> $jenis_kelamin
                                        ),
                        "ono"=> $nomer_urut,
                        "ptype"=> $jenis_rawat,
                        "request_dt"=> "".date("YmdHis")."",
                        "source"=> array(
                                            "code"=> $id_bangsal,
                                            "name"=> $bangsal,
                                            "room_no"=> $no_ruang
                                        ),
                        "clinician"=> array(
                                            "code"=> $order_lab->id_dokter,
                                            "name"=> $order_lab->nama_dokter
                                        ),
                        "priority"=> $cito,
                        "diagnose"=> $sebab_sakit_lain,
                        "pstatus"=> "",
                        "comment"=> "",
                        "visitno"=> "",
                        "order_testid"=> $test_item
                    );

                    $data_api = json_encode($params);

                    $ch = curl_init();

                    if (!$ch) {
                        die("Couldn't initialize a cURL handle");
                    }
                    curl_setopt_array($ch, array(
                    CURLOPT_URL => $this->url.'/api/order/ono/'.$nomer_urut.'/delete/',
                    CURLOPT_POST => 1,
                    CURLOPT_POSTFIELDS => $data_api,
                    CURLOPT_FOLLOWLOCATION => 1,
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_CUSTOMREQUEST => "DELETE",
                    CURLOPT_HTTPHEADER => array('x-username: '.$this->user.'',
                            'x-password: '.$this->pass.''),
                    ));

                    $api_result = curl_exec($ch);

                    
                    $response_getinfo = curl_getinfo($ch, CURLINFO_RESPONSE_CODE);
                    $response_http = curl_getinfo($ch, CURLINFO_HTTP_CODE);
                    if($api_result === false){

                        curl_close($ch); // close cURL handler
                        $status = false;
                        $message = "Gagal Menghubungi LIS";
                        $respon = 503;

                        $response_lab = "select jl.id as id_response
                            from sm_jenis_lab_delete jl
                            where jl.id_lab = '" . $id_order_lab . "' ";
                            $create_response = $this->db->query($response_lab)->row();

                            if($create_response !== null)
                            {

                                $id_response = $create_response->id_response;
                                $response_lab = array(
                                'id_layanan_pendaftaran' => (int)$id_layanan_pendaftaran,
                                'id_lab' => (int)$order_lab->id,
                                'status' => 503
                                );

                                $this->m_pelayanan->update_rspn_laboratorium($response_lab, $id_response);

                            } else {

                                $response_lab = array(
                                'id_layanan_pendaftaran' => (int)$id_layanan_pendaftaran,
                                'id_lab' => (int)$order_lab->id,
                                'status' => 503
                                );

                                $this->m_pelayanan->delete_rspn_laboratorium($response_lab);
                            }

                    } else {

                        $response_getinfo = curl_getinfo($ch, CURLINFO_RESPONSE_CODE);
                        $response_http = curl_getinfo($ch, CURLINFO_HTTP_CODE);
                        $outputJSON = json_decode($api_result);

                        curl_close($ch); // close cURL handler



                        if ($response_http !== null) 
                        {

                            $response_lab = "select jl.id as id_response
                            from sm_jenis_lab_delete jl
                            where jl.id_lab = '" . $id_order_lab . "' ";
                            $create_response = $this->db->query($response_lab)->row();

                            if($create_response !== null)
                            {

                                $id_response = $create_response->id_response;
                                $response_lab = array(
                                'id_layanan_pendaftaran' => (int)$id_layanan_pendaftaran,
                                'id_lab' => (int)$order_lab->id,
                                'status' => (int)$response_getinfo
                                );

                                $this->m_pelayanan->update_rspn_laboratorium($response_lab, $id_response);

                            
                            } else {

                                $response_lab = array(
                                'id_layanan_pendaftaran' => (int)$id_layanan_pendaftaran,
                                'id_lab' => (int)$order_lab->id,
                                'status' => (int)$response_getinfo
                                );

                                $this->m_pelayanan->delete_rspn_laboratorium($response_lab);


                            }


                            if ($response_getinfo === 201) 
                            {
                                $respon = 201;
                                $status = true;
                                $message = "Berhasil melakukan pembatalan order ke LIS";

                                $data_batal = array('status' => 'batal', 'keterangan' => safe_post('keterangan'));
                                $status = $this->m_order_laboratorium->updatePembatalanOrderLaboratorium(safe_post('id_order'), $data_batal);

                            } else if($response_getinfo === 400){

                                $g_ord_l = "select ol.id as id_order_lab, sl.id as id_lab, sl.status_lis
                                            from sm_order_laboratorium ol
                                            left join sm_laboratorium sl on(ol.id = sl.id_order_laboratorium)
                                            where ol.id = '" . $order_lab->id . "' ";
                                            $get_order = $this->db->query($g_ord_l)->row();

                                if($get_order->id_lab === null && $get_order->status_lis === null){

                                    $respon = 201;
                                    $status = true;
                                    $message = "Berhasil melakukan pembatalan order ke LIS";

                                    $data_batal = array('status' => 'batal', 'keterangan' => safe_post('keterangan'));
                                    $status = $this->m_order_laboratorium->updatePembatalanOrderLaboratorium(safe_post('id_order'), $data_batal);

                                } else {

                                    $respon = 503;
                                    $status = false;
                                    $message = var_dump($api_result);
                                }

                            } else if($response_getinfo === 404){

                                $sentence = $api_result;
                                $sentence_search = 'The requested resource was not found on this server';
                                if(preg_match("/$sentence_search/i", $sentence)) {
                                    $data_batal = array('status' => 'batal', 'keterangan' => safe_post('keterangan'));
                                    $status = $this->m_order_laboratorium->updatePembatalanOrderLaboratorium(safe_post('id_order'), $data_batal);

                                    $respon = 201;
                                    $status = true;
                                    $message = "Berhasil melakukan pembatalan order ke LIS";

                                } else {

                                    $respon = 404;
                                    $status = true;
                                    $message = var_dump($api_result);
                                }

                                

                            } else {

                                $respon = 503;
                                $status = false;
                                $message = var_dump($api_result);
                            }

                        } else {

                            $response_lab = "select jl.id as id_response
                            from sm_jenis_lab_delete jl
                            where jl.id_lab = '" . $id_order_lab . "' ";
                            $create_response = $this->db->query($response_lab)->row();

                            if($create_response !== null)
                            {

                                $id_response = $create_response->id_response;
                                $response_lab = array(
                                'id_layanan_pendaftaran' => (int)$id_layanan_pendaftaran,
                                'id_lab' => (int)$order_lab->id,
                                'status' => (int)$response_getinfo
                                );

                                $this->m_pelayanan->update_rspn_laboratorium($response_lab, $id_response);

                            } else {

                                $response_lab = array(
                                'id_layanan_pendaftaran' => (int)$id_layanan_pendaftaran,
                                'id_lab' => (int)$order_lab->id,
                                'status' => (int)$response_getinfo
                                );

                                $this->m_pelayanan->delete_rspn_laboratorium($response_lab);
                            }



                            if ($response_getinfo === 201) 
                            {

                                $respon = 201;
                                $status = true;
                                $message = "Berhasil melakukan pembatalan order ke LIS";

                                $data_batal = array('status' => 'batal', 'keterangan' => safe_post('keterangan'));
                                $status = $this->m_order_laboratorium->updatePembatalanOrderLaboratorium(safe_post('id_order'), $data_batal);

                            } else {

                                $respon = 404;
                                $status = false;
                                $message = "Gagal post ke service LIS";
                            }
                        }

                    }
                
                } else {

                    if($order_lab->jenis_layanan === 'Laboratorium' && $get_order_value === null){

                        $id_order = (int)$order_lab->id;
                        $keterangan = safe_post('keterangan');
                        $batal = null;
                        
                        $this->db->where("id", $id_order)->update("sm_order_laboratorium", array("status" => $batal));
                        $this->db->where("id", $id_order)->update("sm_order_laboratorium", array("status" => 'batal', "keterangan" => $keterangan));
                        
                        $respon = 201;
                        $status = true;
                        $message = "Berhasil melakukan pembatalan order Laboratorium";

                    } else {

                        $respon = 404;
                        $status = false;
                        $message = "Tidak ada Item Pemeriksaan";
                    
                    }
                    
                }

            } else {

                    $respon = 404;
                    $status = false;
                    $message = "Tidak Ada Data Order Laboratorium";
                    
            }

        } else {

                $respon = 404;
                $status = false;
                $message = "Tidak ada Data Pasien";
                
        }

       $data = array("status" => $status, "message" => $message);
       $this->response($data, $respon);

    }

    function get_detail_daftar_lab_get()
    {
        if (!$this->get('id', true)) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST);
        endif;

        $data = $this->m_order_laboratorium->getDataDetailDaftarLAB($this->get('id', true));
        $this->response($data, REST_Controller::HTTP_OK);
    }

    function get_detail_order_laboratorium_get()
    {
        if (!$this->get('id', true)) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST);
        endif;

        $data = $this->m_order_laboratorium->getDataDetailOrderLaboratorium($this->get('id', true));
        $this->response($data, REST_Controller::HTTP_OK);
    }

    //25012022RZ
    function getKategoriPasien($kelamin, $tanggal_lahir)
    {
        $kategori = $kelamin;

        $tgl1 = date_create($tanggal_lahir);
        $tgl2 = date_create(date('Y-m-d'));
        $sql = date_diff($tgl2, $tgl1);
        $hasil = $sql->format('%a');
        $hasil_sql = floor($hasil / 365);

        if ($hasil_sql <= 12) {
            $kategori = "A";
        }
        return $kategori;
    }
    
    function simpan_data_order_laboratorium_post() 
    {
        $this->db->trans_begin();
        if (safe_post('id_order') === '') :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST);
        endif;

        $id_order = safe_post('id_order');
        $this->db->select("orlab.*, orlab.jenis as jenis_laboratorium, lp.jenis_layanan, lp.id_pendaftaran, pd.id, p.kelamin, p.tanggal_lahir");
        $this->db->from("sm_order_laboratorium as orlab");
        $this->db->join("sm_layanan_pendaftaran as lp", "lp.id = orlab.id_layanan_pendaftaran");
        $this->db->join("sm_pendaftaran as pd", "pd.id = lp.id_pendaftaran");
        $this->db->join("sm_pasien as p", "p.id = pd.id_pasien");
        $this->db->where("orlab.id", $id_order, true);
        $dataOrderLaboratorium = $this->db->get()->row();
        if (!$dataOrderLaboratorium) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST);
        endif;

        $this->load->model('pelayanan/Pelayanan_model', 'm_pelayanan');
        $kategoriPasien = $this->getKategoriPasien($dataOrderLaboratorium->kelamin, $dataOrderLaboratorium->tanggal_lahir);
        $dataLaboratorium = array(
            "kode" => "".$dataOrderLaboratorium->ono."",
            "id_layanan_pendaftaran" => $dataOrderLaboratorium->id_layanan_pendaftaran,
            "id_order_laboratorium" => $id_order,
            "jenis" => $dataOrderLaboratorium->jenis_laboratorium,
            "id_dokter" => $dataOrderLaboratorium->id_dokter,
            "analis" => safe_post('analis') ? safe_post('analis') : NULL,
            "id_dokter_pjwb" => safe_post('dokter_pjwb') ? safe_post('dokter_pjwb') : NULL,
            "kategori" => $kategoriPasien,
            "kelamin_anak" => $kategoriPasien === "A" ? $dataOrderLaboratorium->kelamin : NULL,
            "waktu_konfirm" => $this->datetime,
            "id_users" => $this->session->userdata("id_translucent")
        );

        $tindakanLaboratorium = safe_post('id_tarif');
        $id_laboratorium = $this->m_order_laboratorium->simpanDataLaboratorium($dataLaboratorium, $tindakanLaboratorium);
        if ($id_laboratorium !== NULL) :
            $dataDetailLaboratorium = array(
                "id_laboratorium" => $id_laboratorium,
                "tindakan_laboratorium" => safe_post('id_tarif'),
                "id_dokter" => $dataOrderLaboratorium->id_dokter,
                "dokter" => safe_post('dokter'),
                "cito" => safe_post("cito"),
                "item_lab" => safe_post("item_lab"),
                "rujuk" => safe_post("rujuk"),
                "instansi" => safe_post("instansi")
            );

            $jenisLayanan = $dataOrderLaboratorium->jenis_layanan;
            $data = $this->m_order_laboratorium->simpanDataDetailLaboratorium($dataLaboratorium["id_layanan_pendaftaran"], $dataDetailLaboratorium, $jenisLayanan);
        endif;

        $this->db->where("id", $id_order)->update("sm_order_laboratorium", array("status" => "konfirm"));
        $this->m_pelayanan->setBelumLunas($dataOrderLaboratorium->id_pendaftaran);
        if ($this->db->trans_status() === false) :
            $this->db->trans_rollback();
            $status = false;
        else :
            $this->db->trans_commit();
            $status = true;
        endif;

        $result = array("status" => $status, "id_layanan_pendaftaran" => $dataLaboratorium["id_layanan_pendaftaran"]);
        $this->response($result, REST_Controller::HTTP_OK);
    }


    // CPT DK DCT
    function get_data_catatan_pelaksanaan_tranfusi_get(){
        if (!$this->get('id_layanan_pendaftaran')) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
        endif;
        
        $this->load->model('pendaftaran/Pendaftaran_model', 'm_pendaftaran'); 
        $this->load->model('pelayanan/Pelayanan_model', 'm_pelayanan');
        $data                                           = $this->m_pendaftaran->getPendaftaranDetail($this->get('id', true), $this->get('id_layanan', true));
        $data['profil']                                 = $this->m_pelayanan->getProfilPasien($data['pasien']->id_pasien);
        $data['catatan_pelaksanaan_tranfusi']           = $this->m_order_laboratorium->getCatatanPelaksanaanTranfusi($this->get('id', true));
        $data['catatan_kantung']                        = $this->m_order_laboratorium->getKantung($this->get('id', true));
        // var_dump("id 1");
        // var_dump($this->get('id', true));
        // var_dump("id 2");
        // var_dump($this->get('id_layanan', true));die;
        if ($data) :
            $this->response($data, REST_Controller::HTTP_OK); // (200)
        endif;
    }

    // DK
    function hapus_catatan_kantung_delete($id){
        $status = $this->m_order_laboratorium->deleteKantung($id);
        if ($status) :
            $response = array('status' => $status, 'message' => 'Berhasil menghapus Data Kantung !!!');
        else :
            $response = array('status' => $status, 'message' => 'Gagal menghapus Data Kantung !!!');
        endif;
        $this->response($response, REST_Controller::HTTP_OK);
    }

    // DK 
    function get_edit_catatan_kantung_get(){
        if (!$this->get('id') && !$this->get('id_layanan')) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
        endif;
        $data = $this->m_order_laboratorium->getKantungByID($this->get('id', true));
        $this->response($data, REST_Controller::HTTP_OK);
    }

    // DK
    function update_catatan_kantung_put(){   
        if (!$this->put('id', true)) :
            $this->response(array('status' => false), REST_Controller::HTTP_OK);
        endif;
        $tanggal_pengkajian = $this->put('cpt_tanggal_pengkajian', true);
        $tanggal_pengkajian = str_replace('/', '-', $tanggal_pengkajian);
        $tanggal_pengkajian = date('Y-m-d', strtotime($tanggal_pengkajian));
        $nomor_for_cpt              = $this->put('nomor_for_cpt', true);
        $nomor_stok_cpt             = $this->put('nomor_stok_cpt', true);
        $asal_kantong_cpt_1         = $this->put('asal_kantong_cpt_1', true);
        $asal_kantong_cpt_2         = $this->put('asal_kantong_cpt_2', true);
        $hasil_cross_cpt_1          = $this->put('hasil_cross_cpt_1', true);
        $hasil_cross_cpt_2          = $this->put('hasil_cross_cpt_2', true);
        $hasil_cross_cpt_3          = $this->put('hasil_cross_cpt_3', true);
        $hasil_cross_cpt_4          = $this->put('hasil_cross_cpt_4', true);
        $jk_cpt_1                   = $this->put('jk_cpt_1', true);
        $jk_cpt_2                   = $this->put('jk_cpt_2', true);
        $jk_cpt_3                   = $this->put('jk_cpt_3', true);
        $jk_cpt_4                   = $this->put('jk_cpt_4', true);
        $jk_cpt_5                   = $this->put('jk_cpt_5', true);
        $jk_cpt_6                   = $this->put('jk_cpt_6', true);
        $golongan_cpt_1             = $this->put('golongan_cpt_1', true);
        $golongan_cpt_2             = $this->put('golongan_cpt_2', true);
        $golongan_cpt_3             = $this->put('golongan_cpt_3', true);
        $golongan_cpt_4             = $this->put('golongan_cpt_4', true);
        $rh_cpt_1                   = $this->put('rh_cpt_1', true);
        $rh_cpt_2                   = $this->put('rh_cpt_2', true);
        $volume_cpt                 = $this->put('volume_cpt', true);
        $jam_keluar_utd             = $this->put('jam_keluar_utd', true);
        $identifikasi_kantung_cpt_1         = $this->put('identifikasi_kantung_cpt_1', true);
        $identifikasi_kantung_cpt_2         = $this->put('identifikasi_kantung_cpt_2', true);
        $identifikasi_pasien_cpt_1          = $this->put('identifikasi_pasien_cpt_1', true);
        $identifikasi_pasien_cpt_2          = $this->put('identifikasi_pasien_cpt_2', true);
        $keadaan_kantung_cpt_1              = $this->put('keadaan_kantung_cpt_1', true);
        $keadaan_kantung_cpt_2              = $this->put('keadaan_kantung_cpt_2', true);
        $jam_ruangan_cpt                    = $this->put('jam_ruangan_cpt', true);
        $waktu_mulai_cpt                    = $this->put('waktu_mulai_cpt', true);
        $waktu_selesai_cpt                  = $this->put('waktu_selesai_cpt', true);
        $jam_ob_1           = $this->put('jam_ob_1', true);
        $jam_ob_2           = $this->put('jam_ob_2', true);
        $jam_ob_3           = $this->put('jam_ob_3', true);
        $jam_ob_4           = $this->put('jam_ob_4', true);
        $tensi_cpt_1        = $this->put('tensi_cpt_1', true);
        $tensi_cpt_2        = $this->put('tensi_cpt_2', true);
        $tensi_cpt_3        = $this->put('tensi_cpt_3', true);
        $tensi_cpt_4        = $this->put('tensi_cpt_4', true);
        $rr_cpt_1           = $this->put('rr_cpt_1', true);
        $rr_cpt_2           = $this->put('rr_cpt_2', true);
        $rr_cpt_3           = $this->put('rr_cpt_3', true);
        $rr_cpt_4           = $this->put('rr_cpt_4', true);
        $suhu_cpt_1         = $this->put('suhu_cpt_1', true);
        $suhu_cpt_2         = $this->put('suhu_cpt_2', true);
        $suhu_cpt_3         = $this->put('suhu_cpt_3', true);
        $suhu_cpt_4         = $this->put('suhu_cpt_4', true);
        $nadi_cpt_1         = $this->put('nadi_cpt_1', true);
        $nadi_cpt_2         = $this->put('nadi_cpt_2', true);
        $nadi_cpt_3         = $this->put('nadi_cpt_3', true);
        $nadi_cpt_4         = $this->put('nadi_cpt_4', true);
        $reaksi_cpt_1       = $this->put('reaksi_cpt_1', true);
        $reaksi_cpt_2       = $this->put('reaksi_cpt_2', true);
        $reaksi_cpt_3       = $this->put('reaksi_cpt_3', true);
        $reaksi_cpt_4       = $this->put('reaksi_cpt_4', true);
        $petugas_cpt_1      = $this->put('petugas_cpt_1', true);
        $petugas_cpt_2      = $this->put('petugas_cpt_2', true);
        $petugas_cpt_3      = $this->put('petugas_cpt_3', true);
        $petugas_cpt_4      = $this->put('petugas_cpt_4', true);
        $petugas_tambah_I   = $this->put('petugas_tambah_I', true);
        $petugas_tambah_II  = $this->put('petugas_tambah_II', true);

        $data = array(
            'id'                                => $this->put('id', true),
            'tanggal_pengkajian'                => $tanggal_pengkajian,
            'nomor_for_cpt'                     => $nomor_for_cpt !== '' ? $nomor_for_cpt : null,
            'nomor_stok_cpt'                    => $nomor_stok_cpt !== '' ? $nomor_stok_cpt : null,
            'asal_kantong_cpt_1'          		=> $asal_kantong_cpt_1 !== '' ? $asal_kantong_cpt_1 : null,
            'asal_kantong_cpt_2'          		=> $asal_kantong_cpt_2 !== '' ? $asal_kantong_cpt_2 : null,
            'hasil_cross_cpt_1'          		=> $hasil_cross_cpt_1 !== '' ? $hasil_cross_cpt_1 : null,
            'hasil_cross_cpt_2'          		=> $hasil_cross_cpt_2 !== '' ? $hasil_cross_cpt_2 : null,
            'hasil_cross_cpt_3'          		=> $hasil_cross_cpt_3 !== '' ? $hasil_cross_cpt_3 : null,
            'hasil_cross_cpt_4'          		=> $hasil_cross_cpt_4 !== '' ? $hasil_cross_cpt_4 : null,
            'jk_cpt_1'          		        => $jk_cpt_1 !== '' ? $jk_cpt_1 : null,
            'jk_cpt_2'          		        => $jk_cpt_2 !== '' ? $jk_cpt_2 : null,
            'jk_cpt_3'          		        => $jk_cpt_3 !== '' ? $jk_cpt_3 : null,
            'jk_cpt_4'          		        => $jk_cpt_4 !== '' ? $jk_cpt_4 : null,
            'jk_cpt_5'          		        => $jk_cpt_5 !== '' ? $jk_cpt_5 : null,
            'jk_cpt_6'          		        => $jk_cpt_6 !== '' ? $jk_cpt_6 : null,            
            'golongan_cpt_1'          		    => $golongan_cpt_1 !== '' ? $golongan_cpt_1 : null,
            'golongan_cpt_2'          		    => $golongan_cpt_2 !== '' ? $golongan_cpt_2 : null,
            'golongan_cpt_3'          		    => $golongan_cpt_3 !== '' ? $golongan_cpt_3 : null,
            'golongan_cpt_4'          		    => $golongan_cpt_4 !== '' ? $golongan_cpt_4 : null,
            'rh_cpt_1'          		        => $rh_cpt_1 !== '' ? $rh_cpt_1 : null,
            'rh_cpt_2'          		        => $rh_cpt_2 !== '' ? $rh_cpt_2 : null,
            'volume_cpt'                        => $volume_cpt !== '' ? $volume_cpt : null,
            'jam_keluar_utd'                    => $jam_keluar_utd !== '' ? $jam_keluar_utd : null,
            'identifikasi_kantung_cpt_1'        => $identifikasi_kantung_cpt_1 !== '' ? $identifikasi_kantung_cpt_1 : null,
            'identifikasi_kantung_cpt_2'        => $identifikasi_kantung_cpt_2 !== '' ? $identifikasi_kantung_cpt_2 : null,
            'identifikasi_pasien_cpt_1'         => $identifikasi_pasien_cpt_1 !== '' ? $identifikasi_pasien_cpt_1 : null,
            'identifikasi_pasien_cpt_2'         => $identifikasi_pasien_cpt_2 !== '' ? $identifikasi_pasien_cpt_2 : null,
            'keadaan_kantung_cpt_1'             => $keadaan_kantung_cpt_1 !== '' ? $keadaan_kantung_cpt_1 : null,
            'keadaan_kantung_cpt_2'             => $keadaan_kantung_cpt_2 !== '' ? $keadaan_kantung_cpt_2 : null,       
            'jam_ruangan_cpt'                   => $jam_ruangan_cpt !== '' ? $jam_ruangan_cpt : null,
            'waktu_mulai_cpt'                   => $waktu_mulai_cpt !== '' ? $waktu_mulai_cpt : null,
            'waktu_selesai_cpt'                 => $waktu_selesai_cpt !== '' ? $waktu_selesai_cpt : null,
            'jam_ob_1'                          => $jam_ob_1 !== '' ? $jam_ob_1 : null,
            'jam_ob_2'                          => $jam_ob_2 !== '' ? $jam_ob_2 : null,
            'jam_ob_3'                          => $jam_ob_3 !== '' ? $jam_ob_3 : null,
            'jam_ob_4'                          => $jam_ob_4 !== '' ? $jam_ob_4 : null,
            'tensi_cpt_1'                       => $tensi_cpt_1 !== '' ? $tensi_cpt_1 : null,
            'tensi_cpt_2'                       => $tensi_cpt_2 !== '' ? $tensi_cpt_2 : null,
            'tensi_cpt_3'                       => $tensi_cpt_3 !== '' ? $tensi_cpt_3 : null,
            'tensi_cpt_4'                       => $tensi_cpt_4 !== '' ? $tensi_cpt_4 : null,
            'rr_cpt_1'                          => $rr_cpt_1 !== '' ? $rr_cpt_1 : null,
            'rr_cpt_2'                          => $rr_cpt_2 !== '' ? $rr_cpt_2 : null,
            'rr_cpt_3'                          => $rr_cpt_3 !== '' ? $rr_cpt_3 : null,
            'rr_cpt_4'                          => $rr_cpt_4 !== '' ? $rr_cpt_4 : null,
            'suhu_cpt_1'                        => $suhu_cpt_1 !== '' ? $suhu_cpt_1 : null,
            'suhu_cpt_2'                        => $suhu_cpt_2 !== '' ? $suhu_cpt_2 : null,
            'suhu_cpt_3'                        => $suhu_cpt_3 !== '' ? $suhu_cpt_3 : null,
            'suhu_cpt_4'                        => $suhu_cpt_4 !== '' ? $suhu_cpt_4 : null,
            'nadi_cpt_1'                        => $nadi_cpt_1 !== '' ? $nadi_cpt_1 : null,
            'nadi_cpt_2'                        => $nadi_cpt_2 !== '' ? $nadi_cpt_2 : null,
            'nadi_cpt_3'                        => $nadi_cpt_3 !== '' ? $nadi_cpt_3 : null,
            'nadi_cpt_4'                        => $nadi_cpt_4 !== '' ? $nadi_cpt_4 : null,
            'reaksi_cpt_1'                      => $reaksi_cpt_1 !== '' ? $reaksi_cpt_1 : null,
            'reaksi_cpt_2'                      => $reaksi_cpt_2 !== '' ? $reaksi_cpt_2 : null,
            'reaksi_cpt_3'                      => $reaksi_cpt_3 !== '' ? $reaksi_cpt_3 : null,
            'reaksi_cpt_4'                      => $reaksi_cpt_4 !== '' ? $reaksi_cpt_4 : null,
            'petugas_cpt_1'                     => $petugas_cpt_1 !== '' ? $petugas_cpt_1 : null,
            'petugas_cpt_2'                     => $petugas_cpt_2 !== '' ? $petugas_cpt_2 : null,
            'petugas_cpt_3'                     => $petugas_cpt_3 !== '' ? $petugas_cpt_3 : null,
            'petugas_cpt_4'                     => $petugas_cpt_4 !== '' ? $petugas_cpt_4 : null,
            'petugas_tambah_I'                  => $petugas_tambah_I !== '' ? $petugas_tambah_I : null,
            'petugas_tambah_II'                 => $petugas_tambah_II !== '' ? $petugas_tambah_II : null,
            'updated_at'                        => date('Y-m-d H:i:s', time()),
        );
        // var_dump($data);die;
        $status = $this->m_order_laboratorium->editKantung($data);
        $this->response(array('status' => $status), REST_Controller::HTTP_OK);
    }

    
    function get_list_data_catatan_kantung_get(){
        if (!$this->get('id_pendaftaran', true)) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
        endif;
        $data ['data']        = $this->m_order_laboratorium->getListDataCatatanKantungbaru($this->get('id_pendaftaran', true));
        // var_dump('data');die;
        // var_dump($data ['data']);die;
        $data['page']    = (int) $this->get('page');
        // $data['limit']   = $limit;
        if ($data) :
            $this->response($data, REST_Controller::HTTP_OK); // (200)
        endif;
    }

    // CPT DK DCT
    function get_edit_data_catatan_kantung_get(){
        if (!$this->get('id') && !$this->get('id_layanan')) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
        endif;
        $data                      = $this->m_order_laboratorium->getEditDataCatatanKantung($this->get('id', true));
        $data['catatan_kantung']   = $this->m_order_laboratorium->getKantungData($this->get('id', true));
        $data ['data_catatan']     = $this->m_order_laboratorium->getDataCatatanKantung($this->get('id', true));       
        if ($data) :
            $this->response($data, REST_Controller::HTTP_OK); // (200)
        endif;

    }

    // CPT DK DCT
    function apus_catatan_kantung_delete($id){
        $status = $this->m_order_laboratorium->deleteCatatanKantung($id);
        if ($status) :
            $response = array('status' => $status, 'message' => 'Berhasil Menghapus Data!');
        else :
            $response = array('status' => $status, 'message' => 'Gagal Menghapus Data!');
        endif;
        $this->response($response, REST_Controller::HTTP_OK);
    }   


    // CPT DK DCT
    function simpan_data_catatan_pelaksanaan_tranfusi_post(){      
        if (safe_post('id_layanan_pendaftaran') === '') :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST);
        endif;     

        $id_data_catatan_tranfusi = $this->post('id_data_catatan_tranfusi');

        // var_dump($id_data_catatan_tranfusi);die; 

        $id_layanan_pendaftaran = safe_post('id_layanan_pendaftaran');
        $id_pendaftaran = safe_post('id_pendaftaran');
        $data_catatan = array(
            'id_layanan_pendaftaran'    => $id_layanan_pendaftaran,
            'id_pendaftaran'            => $id_pendaftaran,
            'created_at'                => date('Y-m-d H:i:s', time()),
            'updated_at'                => date('Y-m-d H:i:s', time()),
        );
        $this->db->select('dct')
        ->from('sm_data_catatan_tranfusi as dct')     
        ->where('dct.id_layanan_pendaftaran', $id_layanan_pendaftaran)
        ->get()
        ->row();
        $insert_id = $this->m_order_laboratorium->updateDataCatatanTransfusi($data_catatan, $id_pendaftaran, $id_data_catatan_tranfusi);

        // BATAS
        $id_cpt = safe_post('id_cpt');
        $id_users = safe_post('id_user');
        $CatatanPelaksanaanTransfusi = array(		
            'id_layanan_pendaftaran'    => $id_layanan_pendaftaran,
            'id_pendaftaran'            => $id_pendaftaran,
            'id_users'                  => $id_users,
            'id_data_catatan_tranfusi'  => $insert_id, 
            'tanggal_tranfusi_cpt'      => (safe_post('tanggal_tranfusi_cpt') !== '' ? date2mysql(safe_post('tanggal_tranfusi_cpt')) : NULL),
            'diagnosis_cpt'             => safe_post('diagnosis_cpt') !== '' ? safe_post('diagnosis_cpt') : NULL,
            'jenis_darah_cpt'           => safe_post('jenis_darah_cpt') !== '' ? safe_post('jenis_darah_cpt') : NULL,
            'alasan_cpt'                => safe_post('alasan_cpt') !== '' ? safe_post('alasan_cpt') : NULL,
            'target_cpt'                => safe_post('target_cpt') !== '' ? safe_post('target_cpt') : NULL,
            'pemberian_cpt'             => safe_post('pemberian_cpt') !== '' ? safe_post('pemberian_cpt') : NULL,
            'dokter_cpt'                => safe_post('dokter_cpt') !== '' ? safe_post('dokter_cpt') : NULL,
            'ttd_dokter_cpt'            => safe_post('ttd_dokter_cpt') !== '' ? safe_post('ttd_dokter_cpt') : NULL,
            'gol_darah_cpt'             => safe_post('gol_darah_cpt') !== '' ? safe_post('gol_darah_cpt') : NULL,
            'rhesus_cpt'                => safe_post('rhesus_cpt') !== '' ? safe_post('rhesus_cpt') : NULL,
            'pre_cpt'                   => safe_post('pre_cpt') !== '' ? safe_post('pre_cpt') : NULL,   
            'updated_at'                => date('Y-m-d H:i:s', time()),
        );
        // var_dump($insert_id);die;
        // var_dump($id_cpt);die;
        // var_dump($id_users);die;
        // var_dump($CatatanPelaksanaanTransfusi);die;
        // var_dump($id_data_catatan_tranfusi);die;

        // BATAS
        $layanan                    = array('id' => safe_post('id_layanan_pendaftaran'));
        $id_pendaftaran             = safe_post('id_pendaftaran');
        $cpt_tanggal_pengkajian     = safe_post('cpt_tanggal_pengkajian');
        $id_users                   = safe_post('id_user');
        if (!empty($cpt_tanggal_pengkajian)) {
            $catatan_kantung = array(
                'id_pendaftaran'                => $id_pendaftaran,
                'id_data_catatan_tranfusi'      => $insert_id,
                'id_layanan_pendaftaran'        => $layanan['id'],
                'id_user'                       => safe_post('user_pemantauan') !== '' ? safe_post('user_pemantauan') : null,            
                'tanggal_pengkajian'            => safe_post('cpt_tanggal_pengkajian'),
                'nomor_for_cpt'                 => safe_post('nomor_for_cpt') !== '' ? safe_post('nomor_for_cpt') : null,
                'nomor_stok_cpt'                => safe_post('nomor_stok_cpt') !== '' ? safe_post('nomor_stok_cpt') : null,
                'asal_kantong_cpt_1'            => safe_post('asal_kantong_cpt_1') !== '' ? safe_post('asal_kantong_cpt_1') : null,
                'asal_kantong_cpt_2'            => safe_post('asal_kantong_cpt_2') !== '' ? safe_post('asal_kantong_cpt_2') : null,
                'hasil_cross_cpt_1'             => safe_post('hasil_cross_cpt_1') !== '' ? safe_post('hasil_cross_cpt_1') : null,
                'hasil_cross_cpt_2'             => safe_post('hasil_cross_cpt_2') !== '' ? safe_post('hasil_cross_cpt_2') : null,
                'hasil_cross_cpt_3'             => safe_post('hasil_cross_cpt_3') !== '' ? safe_post('hasil_cross_cpt_3') : null,
                'hasil_cross_cpt_4'             => safe_post('hasil_cross_cpt_4') !== '' ? safe_post('hasil_cross_cpt_4') : null,
                'jk_cpt_1'                      => safe_post('jk_cpt_1') !== '' ? safe_post('jk_cpt_1') : null,
                'jk_cpt_2'                      => safe_post('jk_cpt_2') !== '' ? safe_post('jk_cpt_2') : null,
                'jk_cpt_3'                      => safe_post('jk_cpt_3') !== '' ? safe_post('jk_cpt_3') : null,
                'jk_cpt_4'                      => safe_post('jk_cpt_4') !== '' ? safe_post('jk_cpt_4') : null,
                'jk_cpt_5'                      => safe_post('jk_cpt_5') !== '' ? safe_post('jk_cpt_5') : null,
                'jk_cpt_6'                      => safe_post('jk_cpt_6') !== '' ? safe_post('jk_cpt_6') : null,
                'golongan_cpt_1'                => safe_post('golongan_cpt_1') !== '' ? safe_post('golongan_cpt_1') : null,
                'golongan_cpt_2'                => safe_post('golongan_cpt_2') !== '' ? safe_post('golongan_cpt_2') : null,
                'golongan_cpt_3'                => safe_post('golongan_cpt_3') !== '' ? safe_post('golongan_cpt_3') : null,
                'golongan_cpt_4'                => safe_post('golongan_cpt_4') !== '' ? safe_post('golongan_cpt_4') : null,
                'rh_cpt_1'                      => safe_post('rh_cpt_1') !== '' ? safe_post('rh_cpt_1') : null,
                'rh_cpt_2'                      => safe_post('rh_cpt_2') !== '' ? safe_post('rh_cpt_2') : null,
                'volume_cpt'                    => safe_post('volume_cpt') !== '' ? safe_post('volume_cpt') : null,
                'jam_keluar_utd'                => safe_post('jam_keluar_utd') !== '' ? safe_post('jam_keluar_utd') : null,
                'identifikasi_kantung_cpt_1'    => safe_post('identifikasi_kantung_cpt_1') !== '' ? safe_post('identifikasi_kantung_cpt_1') : null,
                'identifikasi_kantung_cpt_2'    => safe_post('identifikasi_kantung_cpt_2') !== '' ? safe_post('identifikasi_kantung_cpt_2') : null,
                'identifikasi_pasien_cpt_1'     => safe_post('identifikasi_pasien_cpt_1') !== '' ? safe_post('identifikasi_pasien_cpt_1') : null,
                'identifikasi_pasien_cpt_2'     => safe_post('identifikasi_pasien_cpt_2') !== '' ? safe_post('identifikasi_pasien_cpt_2') : null,
                'keadaan_kantung_cpt_1'         => safe_post('keadaan_kantung_cpt_1') !== '' ? safe_post('keadaan_kantung_cpt_1') : null,
                'keadaan_kantung_cpt_2'         => safe_post('keadaan_kantung_cpt_2') !== '' ? safe_post('keadaan_kantung_cpt_2') : null,
                'jam_ruangan_cpt'               => safe_post('jam_ruangan_cpt') !== '' ? safe_post('jam_ruangan_cpt') : null,
                'waktu_mulai_cpt'               => safe_post('waktu_mulai_cpt') !== '' ? safe_post('waktu_mulai_cpt') : null,
                'waktu_selesai_cpt'             => safe_post('waktu_selesai_cpt') !== '' ? safe_post('waktu_selesai_cpt') : null,
                'jam_ob_1'                      => safe_post('jam_ob_1') !== '' ? safe_post('jam_ob_1') : null,
                'jam_ob_2'                      => safe_post('jam_ob_2') !== '' ? safe_post('jam_ob_2') : null,
                'jam_ob_3'                      => safe_post('jam_ob_3') !== '' ? safe_post('jam_ob_3') : null,
                'jam_ob_4'                      => safe_post('jam_ob_4') !== '' ? safe_post('jam_ob_4') : null,
                'tensi_cpt_1'                   => safe_post('tensi_cpt_1') !== '' ? safe_post('tensi_cpt_1') : null,
                'tensi_cpt_2'                   => safe_post('tensi_cpt_2') !== '' ? safe_post('tensi_cpt_2') : null,
                'tensi_cpt_3'                   => safe_post('tensi_cpt_3') !== '' ? safe_post('tensi_cpt_3') : null,
                'tensi_cpt_4'                   => safe_post('tensi_cpt_4') !== '' ? safe_post('tensi_cpt_4') : null,
                'rr_cpt_1'                      => safe_post('rr_cpt_1') !== '' ? safe_post('rr_cpt_1') : null,
                'rr_cpt_2'                      => safe_post('rr_cpt_2') !== '' ? safe_post('rr_cpt_2') : null,
                'rr_cpt_3'                      => safe_post('rr_cpt_3') !== '' ? safe_post('rr_cpt_3') : null,
                'rr_cpt_4'                      => safe_post('rr_cpt_4') !== '' ? safe_post('rr_cpt_4') : null,
                'suhu_cpt_1'                    => safe_post('suhu_cpt_1') !== '' ? safe_post('suhu_cpt_1') : null,
                'suhu_cpt_2'                    => safe_post('suhu_cpt_2') !== '' ? safe_post('suhu_cpt_2') : null,
                'suhu_cpt_3'                    => safe_post('suhu_cpt_3') !== '' ? safe_post('suhu_cpt_3') : null,
                'suhu_cpt_4'                    => safe_post('suhu_cpt_4') !== '' ? safe_post('suhu_cpt_4') : null,
                'nadi_cpt_1'                    => safe_post('nadi_cpt_1') !== '' ? safe_post('nadi_cpt_1') : null,
                'nadi_cpt_2'                    => safe_post('nadi_cpt_2') !== '' ? safe_post('nadi_cpt_2') : null,
                'nadi_cpt_3'                    => safe_post('nadi_cpt_3') !== '' ? safe_post('nadi_cpt_3') : null,
                'nadi_cpt_4'                    => safe_post('nadi_cpt_4') !== '' ? safe_post('nadi_cpt_4') : null,
                'reaksi_cpt_1'                  => safe_post('reaksi_cpt_1') !== '' ? safe_post('reaksi_cpt_1') : null,
                'reaksi_cpt_2'                  => safe_post('reaksi_cpt_2') !== '' ? safe_post('reaksi_cpt_2') : null,
                'reaksi_cpt_3'                  => safe_post('reaksi_cpt_3') !== '' ? safe_post('reaksi_cpt_3') : null,
                'reaksi_cpt_4'                  => safe_post('reaksi_cpt_4') !== '' ? safe_post('reaksi_cpt_4') : null,
                'petugas_cpt_1'                 => safe_post('petugas_cpt_1') !== '' ? safe_post('petugas_cpt_1') : null,
                'petugas_cpt_2'                 => safe_post('petugas_cpt_2') !== '' ? safe_post('petugas_cpt_2') : null,
                'petugas_cpt_3'                 => safe_post('petugas_cpt_3') !== '' ? safe_post('petugas_cpt_3') : null,
                'petugas_cpt_4'                 => safe_post('petugas_cpt_4') !== '' ? safe_post('petugas_cpt_4') : null,

                'petugas_tambah_I'                 => safe_post('petugas_tambah_I') !== '' ? safe_post('petugas_tambah_I') : null,
                'petugas_tambah_II'                 => safe_post('petugas_tambah_II') !== '' ? safe_post('petugas_tambah_II') : null,

                'date_created'              => safe_post('pencegahan_date_kantung') !== '' ? safe_post('pencegahan_date_kantung') : null,
            );          
            $this->m_order_laboratorium->insertKantung($catatan_kantung);             
            // var_dump($catatan_kantung);die;           
        }

        $sign = $this->db->select('cpt.dokter_cpt')
        ->from('sm_catatan_pelaksanaan_tranfusit as cpt')     
        ->where('cpt.id_layanan_pendaftaran', $id_layanan_pendaftaran)
        ->get()
        ->row(); 
        $this->m_order_laboratorium->updateCatatanPelaksanaanTransfusi($CatatanPelaksanaanTransfusi, $id_pendaftaran, $id_data_catatan_tranfusi);
        if (!empty($respon)) {
            $response = $respon;
        } else {
            $response = null;
        }
        if ($this->db->trans_status() === false) :
            $this->db->trans_rollback();
            $status = false;
        else :
            $this->db->trans_commit();
            $status = true;
        endif;
        $message = array(
            'status' => $status,
            'token'  => $this->security->get_csrf_hash(),
            'id_pendaftaran' => ('id_pendaftaran'),
            'id_layanan_pendaftaran' => ('id_layanan_pendaftaran'),
            'respon' => $response,
        );
        $this->response($message, REST_Controller::HTTP_OK);
	}

}