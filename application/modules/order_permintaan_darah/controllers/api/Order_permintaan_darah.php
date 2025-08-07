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
class Order_permintaan_darah extends REST_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->limit = 10;
		$this->datetime = date('Y-m-d H:i:s');
		$this->load->model('Order_permintaan_darah_model', 'm_order_permintaan_darah');

		$id_translucent = $this->session->userdata('id_translucent');
		if (empty($id_translucent)) :
			$this->response(array('error' => 'Anda belum login'), REST_Controller::HTTP_UNAUTHORIZED);
			exit();
		endif;

		$data_lis = $this->m_order_permintaan_darah->getDarahLIS();

        $this->url = $data_lis->url;
        $this->user = $data_lis->user;
        $this->pass = $data_lis->pass;

	}

	function get_list_data_get()
    {
        if (!$this->get('page')) :
			$this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
		endif;

		$start = ($this->get('page') - 1) * $this->limit;
		$search = [
			'tanggal_awal' => safe_get('tanggal_awal'),
			'tanggal_akhir' => safe_get('tanggal_akhir'),
			'pasien' => safe_get('pasien'),
		];

		$data = $this->m_order_permintaan_darah->getListData($this->limit, $start, $search);
		$data['page'] = (int) $this->get('page');
		$data['limit'] = $this->limit;

		if ($data) :
			$this->response($data, REST_Controller::HTTP_OK); // (200)
		else :
			$this->response(array('error' => 'Data is Not Found'), REST_Controller::HTTP_NOT_FOUND);
		endif;
	}

	function simpan_pelayanan_post()
	{
		$id_order_bank_darah = safe_post('id_order_bank_darah');
		$check_bayar = $this->db->select('count(*) as count')->from('sm_order_bank_darah')->where('id_history_pembayaran is not null')->where('id', $id_order_bank_darah, true)->get()->row()->count;
		if (0 < $check_bayar) :
			$data['status'] = false;
			$data['message'] = "Gagal melakukan perubahan karena sudah dilakukan pembayaran!";
		else :
			$id_layanan_pendaftaran = $this->db->select("id_layanan_pendaftaran")->from('sm_order_bank_darah')->where('id', $id_order_bank_darah, true)->get()->row()->id_layanan_pendaftaran;
			$catatan_tindakan = "<strong>Sebelum Edit : </strong><br>";
			$operator_before = isset($_POST['id_operator_before']) ? safe_post('id_operator_before') : NULL;
			$tindakan_before = isset($_POST['id_tindakan_before']) ? safe_post('id_tindakan_before') : NULL;
			if ($tindakan_before !== NULL) :
				foreach ($tindakan_before as $i => $value) :
					$catatan_tindakan .= "&nbsp;* " . $operator_before[$i] . " - " . $value . "<br>";
				endforeach;
			else :
				$catatan_tindakan .= "- <br>";
			endif;
			
			$data = $this->m_order_permintaan_darah->simpanPelayanan();
			if ($data['status']) :
				// record logs
                $this->load->model('logs/Logs_model', 'logs');
                $this->logs->recordAdminLogs($id_layanan_pendaftaran, 'Edit Tindakan Bank Darah', $catatan_tindakan);
			endif;
		endif;
		$this->response($data, REST_Controller::HTTP_OK);
	}

	function simpan_order_lis_post()
	{
		$id_order_bank_darah = safe_post('id_order_bank_darah');
		$check_bayar = $this->db->select('count(*) as count')->from('sm_order_bank_darah')->where('id_history_pembayaran is not null')->where('id', $id_order_bank_darah, true)->get()->row()->count;
		if (0 < $check_bayar) :
			$data['status'] = false;
			$data['message'] = "Gagal melakukan perubahan karena sudah dilakukan pembayaran!";
		else :
			$id_layanan_pendaftaran = $this->db->select("id_layanan_pendaftaran")->from('sm_order_bank_darah')->where('id', $id_order_bank_darah, true)->get()->row()->id_layanan_pendaftaran;
			$catatan_tindakan = "<strong>Sebelum Edit : </strong><br>";
			$operator_before = isset($_POST['id_operator_before']) ? safe_post('id_operator_before') : NULL;
			$tindakan_before = isset($_POST['id_tindakan_before']) ? safe_post('id_tindakan_before') : NULL;
			if ($tindakan_before !== NULL) :
				foreach ($tindakan_before as $i => $value) :
					$catatan_tindakan .= "&nbsp;* " . $operator_before[$i] . " - " . $value . "<br>";
				endforeach;
			else :
				$catatan_tindakan .= "- <br>";
			endif;
			
			$data = $this->m_order_permintaan_darah->simpanPelayananONO();
			if ($data['status']) :
				// record logs
                $this->load->model('logs/Logs_model', 'logs');
                $this->logs->recordAdminLogs($id_layanan_pendaftaran, 'Edit Tindakan Bank Darah', $catatan_tindakan);
			endif;
		endif;
		$this->response($data, REST_Controller::HTTP_OK);
	}

	function get_tindakan_tambahan_get()
	{
		$id_order_bank_darah = $this->get('id', true);
		$data = $this->m_order_permintaan_darah->getDataTindakanTambahan($id_order_bank_darah)->result();
		exit(json_encode($data));
	}

	function hapusTindakanDarah_delete($id_tarif_darah)
    {

        if ($id_tarif_darah === null) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST);
        endif;

        $this->db->trans_begin();
        

        $status = $this->m_order_permintaan_darah->hapusOrderTindakan($id_tarif_darah);

        if ($this->db->trans_status() === false) :
            $this->db->trans_rollback();
            $status = false;
            $message = 'Gagal menghapus Tindakan!';
        else :
            $this->db->trans_commit();
            $status = true;
            $message = 'Berhasil membatalkan Tindakan!';
        endif;
        $response = array('status' => $status, 'message' => $message);
        $this->response($response, REST_Controller::HTTP_OK);
    }

	function get_darah_tambahan_get()
	{
		$id_layanan_pendaftaran = $this->get('id_layanan_pendaftaran', true);
		$data['list'] = $this->m_order_permintaan_darah->getDataDarahTambahan($id_layanan_pendaftaran)->result();
		$data['total'] = $this->m_order_permintaan_darah->getDataDarahTambahan($id_layanan_pendaftaran)->row();
		exit(json_encode($data));
	}

	function konfirmasi_permintaan_darah_post()
	{
		$id_detail_penjualan = safe_post('id_detail_penjualan');
		$id_layanan_pendaftaran = safe_post('id_layanan_pendaftaran');
		$id_barang = safe_post('id_barang');
		$id_kemasan = safe_post('id_kemasan');
		$data = $this->m_order_permintaan_darah->konfirmasiPermintaanDarah($id_detail_penjualan, $id_layanan_pendaftaran, $id_barang, $id_kemasan);
		$this->response($data, REST_Controller::HTTP_OK);
	}

	function orderDarahLIS_post()
	{
	    $this->load->library('Curl');

	    $kode_ono = $this->post('ono');
	    $id_layanan_pendaftaran = $this->post('id_layanan');
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

	        $order_darah = $this->m_order_permintaan_darah->get_order_darah($kode_ono);


	        if($order_darah !== null)
	        {
	            if (is_array($order_darah)) 
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

	                $test_item = [];
	                $key_ono = [];

	                foreach($order_darah as $key){

	                	$cito = "R";

	                    $a = $key->id_tarif;

	                    if($a === '9427' || $a === '9426'){

		                    $la = "select coalesce(la.test_code, '') as nama_kode
		                            from sm_layanan la
		                            left join sm_tarif_pelayanan tp on (tp.id_layanan = la.id) 
		                            where tp.id = '" . $a . "' ";
		                            $code_name = $this->db->query($la)->row();

		                            $test_code = $code_name->nama_kode;
		                            $test_item[] = $test_code;

		                            $key_ono[] = $key->kode_ono;

	                    }
	                    
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

	                        $id_bangsal = $bangsal_name->id_bangsal;;
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

	                        $id_bangsal = $bangsal_name->id_bangsal;;
	                        $bangsal = $bangsal_name->bangsal;
	                        $no_ruang = $bangsal_name->no_ruang;

	                    }

	                } else if($inap === "IGD"){

	                    $id_bangsal = 45;
                        $bangsal = 'IGD';
                        $no_ruang = "";

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

	                    $q = "select ss.nama as bangsal, ss.kode as id_bangsal, ss.id_unit as no_ruang
	                        from sm_layanan_pendaftaran lp
	                        left join sm_spesialisasi ss on (lp.id_unit_layanan = ss.id) 
	                        where lp.id = '" . $id_layanan_pendaftaran . "' ";
	                    $bangsal_name = $this->db->query($q)->row();

	                    $id_bangsal = $bangsal_name->id_bangsal;
	                    $bangsal = $bangsal_name->bangsal;
	                    $no_ruang = $bangsal_name->no_ruang;

	                }

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
	                                            "address4"=> $order_darah[0]->nip,
	                                            "birth_dt"=> $t_lahir,
	                                            "sex"=> $jenis_kelamin
	                                        ),
	                        "ono"=> $key_ono[0],
	                        "ptype"=> $jenis_rawat,
	                        "request_dt"=> "".date("YmdHis")."",
	                        "source"=> array(
	                                            "code"=> $id_bangsal,
	                                            "name"=> $bangsal,
	                                            "room_no"=> $no_ruang
	                                        ),
	                        "clinician"=> array(
	                                            "code"=> $order_darah[0]->id_nadis,
	                                            "name"=> $order_darah[0]->nama_dokter
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

	                    $response_order_darah = "select rbd.id as id_response
	                        from sm_respon_bank_darah rbd
	                        where rbd.kode = '" . $key_ono[0] . "' ";
	                        $create_response = $this->db->query($response_order_darah)->row();

	                        if($create_response !== null)
	                        {

	                            $id_response = $create_response->id_response;
	                            $response_order_darah = array(
	                            'id_layanan_pendaftaran' => (int)$this->post('id_layanan'),
	                            'id_order_bank_darah' => (int)$order_darah[0]->id_order_bank_darah,
	                            'status' => 503
	                            );

	                            $this->m_order_permintaan_darah->update_response_order_darah($response_order_darah, $id_response);

	                        } else {

	                            $response_order_darah = array(
	                            'id_layanan_pendaftaran' => (int)$this->post('id_layanan'),
	                            'id_order_bank_darah' => (int)$order_darah[0]->id_order_bank_darah,
	                            'status' => 503,
	                            'kode'	=> "'".$key_ono[0]."'"
	                            );

	                            $this->m_order_permintaan_darah->respon_order_darah($response_order_darah);
	                        }

	                } else {

	                    $response_getinfo = curl_getinfo($ch, CURLINFO_RESPONSE_CODE);
	                    $response_http = curl_getinfo($ch, CURLINFO_HTTP_CODE);
	                    $outputJSON = json_decode($api_result);

	                    curl_close($ch); // close cURL handler

	                    if ($response_http !== null) 
	                    {

	                        $response_order_darah = "select rbd.id as id_response
	                        from sm_respon_bank_darah rbd
	                        where rbd.kode = '" . $key_ono[0] . "' ";
	                        $create_response = $this->db->query($response_order_darah)->row();

	                        if($create_response !== null)
	                        {

	                            $id_response = $create_response->id_response;
	                            $response_order_darah = array(
	                            'id_layanan_pendaftaran' => (int)$this->post('id_layanan'),
	                            'id_order_bank_darah' => (int)$order_darah[0]->id_order_bank_darah,
	                            'status' => (int)$response_getinfo
	                            );

	                            $this->m_order_permintaan_darah->update_response_order_darah($response_order_darah, $id_response);

	                        } else {

	                            $response_order_darah = array(
	                            'id_layanan_pendaftaran' => (int)$this->post('id_layanan'),
	                            'id_order_bank_darah' => (int)$order_darah[0]->id_order_bank_darah,
	                            'status' => (int)$response_getinfo,
	                            'kode'	=> "'".$key_ono[0]."'"
	                            );

	                            $this->m_order_permintaan_darah->respon_order_darah($response_order_darah);
	                        }

	                        if ($response_getinfo === 201) 
	                        {
	                            $respon = 201;
	                            $status = true;
	                            $message = "Berhasil melakukan Order ke LIS";

	                        } else if($response_getinfo === 400){

	                            if(isset($outputJSON->order_testid)){

	                                $function = $outputJSON->order_testid;

	                                if($function !== null){

	                                    foreach ($function as $key => $value) {
	                                        
	                                        $get_respon = $value[0];
	                                    }

	                                } else {

	                                    $get_respon = false;

	                                }

	                            }

	                            if(isset($get_respon)){

	                                if($get_respon === 'This field may not be blank.'){

	                                    $respon = 400;
	                                    $status = false;
	                                    $message = "Mohon Tidak Menggunakan item pemeriksaan selain dari Laboratorium Sysmex";
	                                }

	                            } else {

	                                if(isset($outputJSON->source->code[0])){

	                                    if($outputJSON->source->code[0] === 'This field may not be null.'){

	                                        $respon = 400;
	                                        $status = false;
	                                        $message = "Test Code tidak boleh kosong atau nama dokter tidak boleh kosong, silakan isi diagnosis terlebih dahulu";

	                                    } else if($outputJSON->source->code[0] === 'This field may not be blank.'){

	                                        $respon = 400;
	                                        $status = false;
	                                        $message = "Kode pada Spesialisasi Tidak Boleh Kosong";
	                                    }

	                                } else {

	                                    if(isset($outputJSON->content)){
	                                        $getJSON = $outputJSON->content;

	                                        if($getJSON === "Duplicate ONO. Order not created"){

	                                            $response_order_darah = "select rbd.id as id_response
						                        from sm_respon_bank_darah rbd
						                        where rbd.kode = '" . $key_ono[0] . "' ";
	                                            $create_response = $this->db->query($response_order_darah)->row();

	                                            if($create_response !== null)
	                                            {

	                                                $id_response = $create_response->id_response;
	                                                $response_order_darah = array(
	                                                'id_layanan_pendaftaran' => (int)$this->post('id_layanan'),
	                                                'id_order_bank_darah' => (int)$order_darah[0]->id_order_bank_darah,
	                                                'status' => 201
	                                                );

	                                                $this->m_order_permintaan_darah->update_response_order_darah($response_order_darah, $id_response);

	                                            } else {

	                                                $response_order_darah = array(
	                                                'id_layanan_pendaftaran' => (int)$this->post('id_layanan'),
	                                                'id_order_bank_darah' => (int)$order_darah[0]->id_order_bank_darah,
	                                                'status' => 201,
						                            'kode'	=> "'".$key_ono[0]."'"
						                            );

	                                                $this->m_order_permintaan_darah->respon_order_darah($response_order_darah);
	                                            }

	                                            $respon = 201;
	                                            $status = true;
	                                            $message = "Berhasil melakukan Order ke LIS";
	                                        }

	                                    } else {

	                                        $respon = 400;
	                                        $status = false;
	                                        $message = "Test Code tidak boleh kosong atau nama dokter tidak boleh kosong, silakan isi diagnosis terlebih dahulu";

	                                    }
	                                }

	                            }
	                        
	                        } else {

	                            $respon = 503;
	                            $status = false;
	                            $message = "Gagal post ke service LIS";
	                        }

	                    } else {

	                        $response_order_darah = "select rbd.id as id_response
	                        from sm_respon_bank_darah rbd where rbd.kode = '" . $key_ono[0] . "' ";
	                        $create_response = $this->db->query($response_order_darah)->row();

	                        if($create_response !== null)
	                        {

	                            $id_response = $create_response->id_response;
	                            $response_order_darah = array(
	                            'id_layanan_pendaftaran' => (int)$this->post('id_layanan'),
	                            'id_order_bank_darah' => (int)$order_darah[0]->id_order_bank_darah,
	                            'status' => (int)$response_getinfo
	                            );

	                            $this->m_order_permintaan_darah->update_response_order_darah($response_order_darah, $id_response);

	                        } else {

	                            $response_order_darah = array(
	                            'id_layanan_pendaftaran' => (int)$this->post('id_layanan'),
	                            'id_order_bank_darah' => (int)$order_darah[0]->id_order_bank_darah,
	                            'status' => (int)$response_getinfo,
	                            'kode'	=> "'".$key_ono[0]."'"
	                            );

	                            $this->m_order_permintaan_darah->respon_order_darah($response_order_darah);
	                        }

	                        if ($response_getinfo === 201) 
	                        {

	                            $respon = 201;
	                            $status = true;
	                            $message = "Berhasil melakukan Order ke LIS";

	                        } else if($response_getinfo === 400){

	                            $respon = 400;
	                            $status = false;
	                            $message = "Gagal post ke service LIS atau nama dokter tidak boleh kosong, silakan isi diagnosis terlebih dahulu";
	                        
	                        } else {

	                            $respon = 404;
	                            $status = false;
	                            $message = "Gagal post ke service LIS";
	                        }
	                    }

	                }
	            
	            } else {

	                $respon = 404;
	                $status = false;
	                $message = "Tidak ada Item Pemeriksaan";
	                
	            }

	        } else {

	                $respon = 404;
	                $status = false;
	                $message = "Tidak Ada Data Order Darah";
	                
	        }

	    } else {

	            $respon = 404;
	            $status = false;
	            $message = "Tidak ada Data Pasien";
	            
	    }

	   $data = array("status" => $status, "message" => $message);
	   $this->response($data, $respon);

	}

}