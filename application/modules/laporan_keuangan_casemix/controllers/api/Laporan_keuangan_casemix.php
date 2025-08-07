<?php

defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

class Laporan_keuangan_casemix extends REST_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->limit    = 10;
        $this->datetime = date('Y-m-d H:i:s');
        $this->load->model('Laporan_keuangan_casemix_model', 'm_kc');
		$this->load->model('keuangan/Keuangan_ver2_model', 'm_keuangan_ver2');

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

	function penjamin_auto_get()
    {
        $q 			   = safe_get('q');
        $page 		   = safe_get('page');
        $start 		   = $this->start($page);
		$jenis_laporan = safe_get('jenis_laporan');
		$data 	= $this->m_kc->getJaminan($q, $jenis_laporan, $start, $this->limit);
		if ((safe_get('page') == 1) & ($q == '')) :
			$pilih[] = array(
				'id' => '', 
				'nama' => '', 
			);
			$data['data'] = array_merge($pilih, $data['data']);
			$data['total'] += 1;
		endif;
		$this->response($data, REST_Controller::HTTP_OK);
    }

	function jenis_pendaftaran_auto_get()
    {
        $q 			   = safe_get('q');
        $page 		   = safe_get('page');
        $start 		   = $this->start($page);
		$data 	= $this->m_kc->getJenisPendaftaran($q, $start, $this->limit);
		if ((safe_get('page') == 1) & ($q == '')) :
			$pilih[] = array(
				'id' => '', 
				'nama' => '', 
			);
			$data['data'] = array_merge($pilih, $data['data']);
			$data['total'] += 1;
		endif;
		$this->response($data, REST_Controller::HTTP_OK);
    }
	
	function periode($search){
		$periode = '';
        if($search["periode_laporan"] == 'Harian'){
			$periode = 'Harian ('.$search["tanggal_harian"].')' ;
		} else if($search["periode_laporan"] == 'Bulanan'){
			if ($search["bulan"] == '01') {
                $periode = "Bulanan (Januari " . $search["tahun"] . ')';
            } elseif ($search["bulan"] == '02') {
                $periode = "Bulanan (Februari " . $search["tahun"] . ')';
            } elseif ($search["bulan"] == '03') {
                $periode = "Bulanan (Maret " . $search["tahun"] . ')';
            } elseif ($search["bulan"] == '04') {
                $periode = "Bulanan (April " . $search["tahun"] . ')';
            } elseif ($search["bulan"] == '05') {
                $periode = "Bulanan (Mei " . $search["tahun"] . ')';
            } elseif ($search["bulan"] == '06') {
                $periode = "Bulanan (Juni " . $search["tahun"] . ')';
            } elseif ($search["bulan"] == '07') {
                $periode = "Bulanan (Juli " . $search["tahun"] . ')';
            } elseif ($search["bulan"] == '08') {
                $periode = "Bulanan (Agustus " . $search["tahun"] . ')';
            } elseif ($search["bulan"] == '09') {
                $periode = "Bulanan (September " . $search["tahun"] . ')';
            } elseif ($search["bulan"] == '10') {
                $periode = "Bulanan (Oktober " . $search["tahun"] . ')';
            } elseif ($search["bulan"] == '11') {
                $periode = "Bulanan (November " . $search["tahun"] . ')';
            } elseif ($search["bulan"] == '12') {
                $periode = "Bulanan (Desember " . $search["tahun"] . ')';
            }
		} else if($search["periode_laporan"] == 'Rentang Waktu'){
			$periode = 'Rentang Waktu ('.$search["tanggal_awal"].' sd '.$search["tanggal_akhir"].')' ;
		}
		return $periode;
	}

	function get_list_kunjungan_get()
	{
		if ( ! $this->get('page')) :
			$this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
		endif;

		$page  = $this->get('page') === null ? 1 : (int)$this->get('page');
		$start = ((int)$page - 1) * (int)$this->limit;

		$search = [
			'periode_laporan' => safe_get('periode_laporan'),
			'tanggal_harian'  => safe_get('tanggal_harian'),
			'bulan'           => safe_get('bulan'),
			'tahun'           => safe_get('tahun'),
			'tanggal_awal'    => safe_get('tanggal_awal'),
			'tanggal_akhir'   => safe_get('tanggal_akhir'),
			'jenis_tanggal'   => safe_get('jenis_tanggal'),
			'id_penjamin'  	  => safe_get('id_penjamin'),		
			'jenis_pendaftaran' => safe_get('jenis_pendaftaran'),	
			'id_pasien' 	  => safe_get('id_pasien'),	
		];		

		$data = $this->m_kc->getListKunjungan((int)$this->limit, (int)$start, $search);
		foreach ($data["data"]  as $value){
			$value->tagihan   = $this->m_keuangan_ver2->hitungTagihan($value->id);
			$value->kunjungan = $this->m_kc->getListKunjunganDetail($value->id);
		}	

		$pasien = '';
		if($search["id_pasien"] != ''){
			$pasien = $this->db->select('id, nama')->from('sm_pasien')->where("id ='". $search["id_pasien"] ."'")->get()->row();
		}

		$data['jns_tgl']  = $search["jenis_tanggal"] == 'keluar' ? 'Tanggal Keluar' : 'Tanggal Daftar' ;		
		$data['periode']  = $this->periode($search);		
		$data['penjamin'] = $search["id_penjamin"] <>'' ? $this->db->select('nama')->from('sm_penjamin')->where('id', intval($search["id_penjamin"]))->get()->row()->nama : '';		
		$data['pasien']   = $search["id_pasien"] <>'' ? $pasien->id . ' - ' . $pasien->nama : '';	
		$data['page']     = $page;
		$data['limit']    = $this->limit;

		if ($data) :
			$this->response($data, REST_Controller::HTTP_OK); // (200)
		else :
			$this->response(array('error' => 'Data is Not Found'), REST_Controller::HTTP_NOT_FOUND);
		endif;
	}

    function get_list_keuangan_get()
	{
        if (!$this->get('id')) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
        endif;

        $id_pendaftaran = $this->get('id');

        $data = []  ;
		// $data['admin']  		= ;
		$data['barang_obat']  		= $this->m_kc->getBarangObat($id_pendaftaran);
		$data['barang_obat_retur']  = $this->m_kc->getBarangObatRetur($id_pendaftaran);
		$data['barang_alkes'] 		= $this->m_kc->getBarangAlkes($id_pendaftaran);
		$data['barang_alkes_retur'] = $this->m_kc->getBarangAlkesRetur($id_pendaftaran);
		$data['tarif_kamar']  		= $this->m_kc->getTarifKamar($id_pendaftaran);
		$data['tarif_kamar_icare']  = $this->m_kc->getTarifKamarIcare($id_pendaftaran);
		$data['igd'] 				= $this->m_kc->getTindakanIgd($id_pendaftaran);

		$data['dokter']  			= $this->m_kc->getKonsulDokter($id_pendaftaran);
		$data['lab']  				= $this->m_kc->getLaboratorium($id_pendaftaran);
		$data['rad']  				= $this->m_kc->getRadiologi($id_pendaftaran);
		$data['operatif']  			= $this->m_kc->getTindakanOperatif($id_pendaftaran);
		$data['non_operatif'] 		= $this->m_kc->getTindakanNonOperatif($id_pendaftaran);
		$data['keperawatan']  		= $this->m_kc->getKeperawatan($id_pendaftaran);
		
		$data['darah']  			= $this->m_kc->getDarah($id_pendaftaran);
		$data['ambulan']  			= $this->m_kc->getAmbulan($id_pendaftaran);
		$data['alat_bantu']  		= $this->m_kc->getAlatBantu($id_pendaftaran);
		// $data['rehab']  		= ;
		



		if ($data) :
			$this->response($data, REST_Controller::HTTP_OK); // (200)
		else :
			$this->response(array('error' => 'Data is Not Found'), REST_Controller::HTTP_NOT_FOUND);
		endif;
	}

	function get_detail_keuangan_get()
	{
        if (!$this->get('id')) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
        endif;

        $id_pendaftaran = $this->get('id');
        $type = $this->get('type');

		       if($type == '2') { $data = $this->m_kc->getBarangObat($id_pendaftaran);
		} else if($type == '3') { $data = $this->m_kc->getBarangAlkes($id_pendaftaran);
		} else if($type == '4') { $data = $this->m_kc->getTarifKamar($id_pendaftaran);
		} else if($type == '5') { $data = $this->m_kc->getTarifKamarIcare($id_pendaftaran);
		} else if($type == '6') { $data = $this->m_kc->getTindakanIgd($id_pendaftaran);
		} else if($type == '7') { $data = $this->m_kc->getKonsulDokter($id_pendaftaran);
		} else if($type == '8') { $data = $this->m_kc->getLaboratorium($id_pendaftaran);
		} else if($type == '9') { $data = $this->m_kc->getRadiologi($id_pendaftaran);
		} else if($type == '10'){ $data = $this->m_kc->getTindakanOperatif($id_pendaftaran);
		} else if($type == '11'){ $data = $this->m_kc->getTindakanNonOperatif($id_pendaftaran);
		} else if($type == '12'){ $data = $this->m_kc->getKeperawatan($id_pendaftaran);
		} else if($type == '13'){ $data = $this->m_kc->getDarah($id_pendaftaran);
		} else if($type == '14'){ $data = $this->m_kc->getAmbulan($id_pendaftaran);
		} else if($type == '15'){ $data = $this->m_kc->getAlatBantu($id_pendaftaran);
		} else if($type == '16'){ $data = $this->m_kc->getBarangObatRetur($id_pendaftaran);
		} else if($type == '17'){ $data = $this->m_kc->getBarangAlkesRetur($id_pendaftaran);
		}

		if ($data) :
			$this->response($data, REST_Controller::HTTP_OK); // (200)
		else :
			$this->response(array('error' => 'Data is Not Found'), REST_Controller::HTTP_NOT_FOUND);
		endif;
	}

}