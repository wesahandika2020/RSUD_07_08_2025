<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Salinan_resep_model extends CI_Model
{

	function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->datetime = date('Y-m-d H:i:s');
	}

	private function sqlSalinanResep1()
	{
		$this->db->select("DISTINCT ON (r.id)
			r.id, rt.id as id_resep_tebus, date(r.waktu) as tanggal,
			pj.id as id_penjualan, pj.waktu_diserahkan, pg.nama as dokter, p.nama as pasien,
			p.alamat as alamat_pasien, p.id as no_rm, p.tanggal_lahir, lp.jenis_layanan, 
			CASE WHEN lp.cara_bayar = 'Tunai' THEN 'Umum' ELSE pjn.nama END as cara_bayar, 
			lp.id_penjamin, pjn.nama as nama_penjamin, lp.id_dokter, sp.nama as spesialisasi,
			jko.layanan as layanan_ok, 0 as is_log
		");
		$this->db->from('sm_resep as r');
		$this->db->join('sm_resep_tebus as rt', 'rt.id_resep = r.id', 'left');
		$this->db->join('sm_pasien as p', 'p.id = r.id_pasien');
		$this->db->join('sm_layanan_pendaftaran as lp', 'lp.id = r.id_layanan_pendaftaran');
		$this->db->join('sm_jadwal_kamar_operasi as jko', 'jko.id_layanan_pendaftaran = lp.id', 'left');
		$this->db->join('sm_tenaga_medis as tm', 'tm.id = r.id_dokter', 'left');
		$this->db->join('sm_pegawai as pg', 'pg.id = tm.id_pegawai', 'left');
		$this->db->join('sm_spesialisasi as sp', 'sp.id = lp.id_unit_layanan', 'left');
		$this->db->join('sm_unit as u', 'u.id = sp.id_unit', 'left');
		$this->db->join('sm_penjamin as pjn', 'pjn.id = lp.id_penjamin', 'left');
		$this->db->join('sm_penjualan as pj', 'pj.id_resep = r.id', 'left');

		return $this->db->get_compiled_select();
	}

	private function sqlSalinanResep2()
	{
		$this->db->select("DISTINCT ON (rl.resep->>'id')
			(rl.resep->>'id')::int as id, (rl.resep_tebus->>'id')::int as id_resep_tebus, date(rl.resep->>'waktu') as tanggal,
			pj.id as id_penjualan, pj.waktu_diserahkan, pg.nama as dokter, p.nama as pasien,
			p.alamat as alamat_pasien, p.id as no_rm, p.tanggal_lahir, lp.jenis_layanan,
			CASE WHEN lp.cara_bayar = 'Tunai' THEN 'Umum' ELSE pjn.nama END as cara_bayar,
			lp.id_penjamin, pjn.nama as nama_penjamin, lp.id_dokter, sp.nama as spesialisasi,
			jko.layanan as layanan_ok, 1 as is_log
		", false);
		$this->db->from('sm_resep_logs rl');
		$this->db->join('sm_pasien as p', "p.id = rl.resep->>'id_pasien'");
		$this->db->join('sm_layanan_pendaftaran as lp', "lp.id = (rl.resep->>'id_layanan_pendaftaran')::int");
		$this->db->join('sm_jadwal_kamar_operasi as jko', 'jko.id_layanan_pendaftaran = lp.id', 'left');
		$this->db->join('sm_tenaga_medis as tm', "tm.id = (rl.resep->>'id_dokter')::int", 'left');
		$this->db->join('sm_pegawai as pg', 'pg.id = tm.id_pegawai', 'left');
		$this->db->join('sm_spesialisasi as sp', 'sp.id = lp.id_unit_layanan', 'left');
		$this->db->join('sm_unit as u', 'u.id = sp.id_unit', 'left');
		$this->db->join('sm_penjamin as pjn', 'pjn.id = lp.id_penjamin', 'left');
		$this->db->join('sm_penjualan as pj', "pj.id_resep = (rl.resep->>'id')::int", 'left');
		$this->db->where('rl.aksi', 'Hapus');

		return $this->db->get_compiled_select();
	}

	private function _listSalinanResep($limit = 0, $start = 0, $search)
	{
		$this->sqlListSalinanResep($search);
		if ($limit !== 0) :
			$this->db->limit($limit, $start);
		endif;

		return $this->db->get()->result();
	}

	private function sqlListSalinanResep($search)
	{
		$query1 = $this->sqlSalinanResep1();
		$query2 = $this->sqlSalinanResep2();

		$this->db->select('*')->from("($query1 UNION $query2) as r");

		if (isset($search['id']) && !empty($search['id'])) {
			$this->db->where('r.id', $search['id'], TRUE);
		}

		if ($search['tanggal_awal'] !== '' && $search['tanggal_akhir'] !== '') {
			$this->db->where("r.tanggal BETWEEN '" . date2mysql($search['tanggal_awal']) . " 00:00:00' AND '" . date2mysql($search['tanggal_akhir']) . " 23:59:59'");
		}
		if ($search['dokter'] !== '') {
			$this->db->where('r.id_dokter', $search['dokter'], TRUE);
		}
		if ($search['pasien'] !== '') {
			$this->db->where('r.no_rm', $search['pasien'], TRUE);
		}
		if ($search['jenis_pelayanan'] !== '') {
			if ($search['jenis_pelayanan'] === 'OK Central') {
				$this->db->where('r.layanan_ok', 'OK', TRUE);
			} else if ($search['jenis_pelayanan'] === 'Poliklinik') {
				$this->db->where("r.jenis_layanan in ('Poliklinik','IGD','Kemoterapi', 'Medical Check Up')");
			} else {
				$this->db->where('r.jenis_layanan', $search['jenis_pelayanan'], TRUE);
			}
		}
		if ($search['no_resep'] !== '') {
			$this->db->where('r.id', $search['no_resep'], TRUE);
		}

		if ($search['status_penyerahan'] === 'Sudah') {
			$this->db->where('r.waktu_diserahkan is not null');
		} elseif ($search['status_penyerahan'] === 'Belum') {
			$this->db->where('r.waktu_diserahkan is null');
		}

		return $this->db->order_by('r.id, r.tanggal', 'desc');
	}

	function getListDataSalinanResep($limit = 0, $start = 0, $search)
	{
		$result['data']   = $this->_listSalinanResep($limit, $start, $search);
		$result['jumlah'] = $this->sqlListSalinanResep($search)->get()->num_rows();

		return $result;
	}

	function autentikasi_user_post()
    {

        $this->load->model('satu_sehat/Satu_sehat_model', 'sehat');

        $idUser = $this->session->userdata('id_translucent');

        $dataAkses = $this->sehat->aksesSatuSehat($idUser);

        $xKonfigurasi = $this->sehat->getConfigSatuSehat();

        if(empty($dataAkses)){

            $cekTimeissued = $this->sehat->aksesTimeissued();

            $waktu = (int)$cekTimeissued->timeissued;

            date_default_timezone_set('Asia/Jakarta');
            $tanggalTunggu = (round(microtime(true) * 1000));
            $satuJam = 120000;
            $tglWaktu = (int)$tanggalTunggu - (int)$waktu;

            if((int)$tglWaktu === (int)$satuJam || (int)$tglWaktu > (int)$satuJam){

                $url = $xKonfigurasi->auth."accesstoken?grant_type=client_credentials";

                $header = $this->sehat->authHeader();

                $params=array(
                                "client_id" => $xKonfigurasi->clientid,
                                "client_secret" => $xKonfigurasi->clientsecret
                            );
                
                $data_api = http_build_query($params);

                $output = $this->sehat->postCurl($url, $data_api, $header);

                if($output['result'] !== false){

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

                    } else {

                        date_default_timezone_set('Asia/Jakarta');

                        $dataResponse = array(

                            "userakses"         => (int)$idUser,
                            "nama"              => $this->session->userdata('nama'),
                            "token"             => $cekTimeissued->token,
                            "timeissued"        => $cekTimeissued->timeissued,
                            "app_name"          => $cekTimeissued->app_name,
                            "tanggal"           => date('Y-m-d H:i:s')

                        );

                        $this->db->insert('sm_akses_satu_sehat', $dataResponse);

                        $xDetailData = ["kategori" => "Autentikasi", "param" => $idUser, "message" => $output['result'], "jenis_data" => 'error', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama'), "respon" => $output['respon'], "function" => 'autentikasi_user_post Salinan Resep Model'];
                        $this->db->insert('sm_satu_sehat_log', $xDetailData);

                    }

                } else {

                    date_default_timezone_set('Asia/Jakarta');

                    $dataResponse = array(

                        "userakses"         => (int)$idUser,
                        "nama"              => $this->session->userdata('nama'),
                        "token"             => $cekTimeissued->token,
                        "timeissued"        => $cekTimeissued->timeissued,
                        "app_name"          => $cekTimeissued->app_name,
                        "tanggal"           => date('Y-m-d H:i:s')

                    );

                    $this->db->insert('sm_akses_satu_sehat', $dataResponse);

                    $xDetailData = ["kategori" => "Autentikasi", "param" => $idUser, "message" => 'false', "jenis_data" => 'error', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama'), "function" => 'autentikasi_user_post Salinan Resep Model'];
                    $this->db->insert('sm_satu_sehat_log', $xDetailData);

                }

            } else {

                date_default_timezone_set('Asia/Jakarta');

                $dataResponse = array(

                    "userakses"         => (int)$idUser,
                    "nama"              => $this->session->userdata('nama'),
                    "token"             => $cekTimeissued->token,
                    "timeissued"        => $cekTimeissued->timeissued,
                    "app_name"          => $cekTimeissued->app_name,
                    "tanggal"           => date('Y-m-d H:i:s')

                );

                $this->db->insert('sm_akses_satu_sehat', $dataResponse);

            }

        } else {

            $cekTimeissued = $this->sehat->aksesTimeissued();

            if(isset($dataAkses->timeissued) && !is_null($dataAkses->timeissued)){

                $waktu = (int)$cekTimeissued->timeissued;

                date_default_timezone_set('Asia/Jakarta');
                $tanggalTunggu = (round(microtime(true) * 1000));
                $satuJam = 120000;
                $tglWaktu = (int)$tanggalTunggu - (int)$waktu;

                if((int)$tglWaktu === (int)$satuJam || (int)$tglWaktu > (int)$satuJam){

                    $url = $xKonfigurasi->auth."accesstoken?grant_type=client_credentials";

                    $header = $this->sehat->authHeader();

                    $params=array(
                                    "client_id" => $xKonfigurasi->clientid,
                                    "client_secret" => $xKonfigurasi->clientsecret
                                );
                    
                    $data_api = http_build_query($params);

                    $output = $this->sehat->postCurl($url, $data_api, $header);

                    if($output['result'] !== false){

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

                        } else {

                            date_default_timezone_set('Asia/Jakarta');

                            $dataResponse = array(

                                "userakses"         => (int)$idUser,
                                "nama"              => $this->session->userdata('nama'),
                                "token"             => $cekTimeissued->token,
                                "timeissued"        => $cekTimeissued->timeissued,
                                "app_name"          => $cekTimeissued->app_name,
                                "tanggal"           => date('Y-m-d H:i:s')

                            );

                            $this->db->insert('sm_akses_satu_sehat', $dataResponse);

                            $xDetailData = ["kategori" => "Autentikasi", "param" => $idUser, "message" => $output['result'], "jenis_data" => 'error', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama'), "respon" => $output['respon'], "function" => 'autentikasi_user_post Salinan Resep Model'];
                            $this->db->insert('sm_satu_sehat_log', $xDetailData);

                        }

                    } else {

                        date_default_timezone_set('Asia/Jakarta');

                        $dataResponse = array(

                            "userakses"         => (int)$idUser,
                            "nama"              => $this->session->userdata('nama'),
                            "token"             => $cekTimeissued->token,
                            "timeissued"        => $cekTimeissued->timeissued,
                            "app_name"          => $cekTimeissued->app_name,
                            "tanggal"           => date('Y-m-d H:i:s')

                        );

                        $this->db->insert('sm_akses_satu_sehat', $dataResponse);

                        $xDetailData = ["kategori" => "Autentikasi", "param" => $idUser, "message" => 'false', "jenis_data" => 'error', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama'), "function" => 'autentikasi_user_post Salinan Resep Model'];
                        $this->db->insert('sm_satu_sehat_log', $xDetailData);

                    }

                } else {

                    date_default_timezone_set('Asia/Jakarta');

                    $update = ["token" => $cekTimeissued->token,"timeissued" => $cekTimeissued->timeissued,"app_name" => $cekTimeissued->app_name,"tanggal" => date('Y-m-d H:i:s')];

                    $id = (int)$idUser;

                    $this->db->where('userakses', $id)->update('sm_akses_satu_sehat', $update);

                }

            } else {

                $url = $xKonfigurasi->auth."accesstoken?grant_type=client_credentials";

                $header = $this->sehat->authHeader();

                $params=array(
                                "client_id" => $xKonfigurasi->clientid,
                                "client_secret" => $xKonfigurasi->clientsecret
                            );
                
                $data_api = http_build_query($params);

                $output = $this->sehat->postCurl($url, $data_api, $header);

                if($output['result'] !== false){

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

                    } else {

                        date_default_timezone_set('Asia/Jakarta');

                        $dataResponse = array(

                            "userakses"         => (int)$idUser,
                            "nama"              => $this->session->userdata('nama'),
                            "token"             => $cekTimeissued->token,
                            "timeissued"        => $cekTimeissued->timeissued,
                            "app_name"          => $cekTimeissued->app_name,
                            "tanggal"           => date('Y-m-d H:i:s')

                        );

                        $this->db->insert('sm_akses_satu_sehat', $dataResponse);

                        $xDetailData = ["kategori" => "Autentikasi", "param" => $idUser, "message" => $output['result'], "jenis_data" => 'error', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama'), "respon" => $output['respon'], "function" => 'autentikasi_user_post Salinan Resep Model'];
                        $this->db->insert('sm_satu_sehat_log', $xDetailData);

                    }

                } else {

                    date_default_timezone_set('Asia/Jakarta');

                    $dataResponse = array(

                        "userakses"         => (int)$idUser,
                        "nama"              => $this->session->userdata('nama'),
                        "token"             => $cekTimeissued->token,
                        "timeissued"        => $cekTimeissued->timeissued,
                        "app_name"          => $cekTimeissued->app_name,
                        "tanggal"           => date('Y-m-d H:i:s')

                    );

                    $this->db->insert('sm_akses_satu_sehat', $dataResponse);

                    $xDetailData = ["kategori" => "Autentikasi", "param" => $idUser, "message" => 'false', "jenis_data" => 'error', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama'), "function" => 'autentikasi_user_post Salinan Resep Model'];
                    $this->db->insert('sm_satu_sehat_log', $xDetailData);

                }
                
            }

        }

    }

	public function integrasiMedicationDispense($idPenjualan){

		if(!isset($idPenjualan)){

			date_default_timezone_set('Asia/Jakarta');
            $xDetailDataRequest = ["kategori" => "MedicationDispense", "message" => 'Tidak Ada ID Penjualan', "jenis_data" => 'error', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama'), "function" => 'integrasiMedicationDispense'];
            $this->db->insert('sm_satu_sehat_log', $xDetailDataRequest);

			return;

		}

		$dataDetailPenjualan = $this->db->select('p.id_resep, p.id_layanan_pendaftaran')
                ->from('sm_penjualan as p')
                ->where('p.id', (int)$idPenjualan, true)
                ->get()
                ->row();

         if(isset($dataDetailPenjualan->id_resep)){

         	$dataResepTebus = $this->db->select('r.id')
                ->from('sm_resep_tebus as r')
                ->where('r.id_resep', (int)$dataDetailPenjualan->id_resep, true)
                ->get()
                ->row();

            if(isset($dataResepTebus->id)){

            	$dataResepTebusR = $this->db->select('r.id, r.id_integrasi_resep, r.id_medication_request, b.id as id_barang, b.nama_lengkap as nama_obat, r.jumlah_pakai, tm.ihs_number as ihs_dokter, pg.nama as nama_pegawai, r.id as id_resep_item, rr.aturan_pakai, rs.id as id_resep_tebus, rs.id_resep as id_resep, sr.id_pasien as no_rm, p.nama as nama_pasien, p.ihsn, l.id_encounter, ro.code as roa_code, ro.display as roa_display, r.dosis_racik, r.jumlah_pakai, uom.code as code_ucum, s.ingredient')
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
                ->where('rs.id', (int)$dataResepTebus->id, true)
                ->get()
                ->result();

                foreach ($dataResepTebusR as $a => $b) {

                	$lokasi = $this->db->select("integrasi_baru")->from("sm_lokasi")->where("nama", 'Apotek Rawat Jalan', true)->get()->row();

                	$cekSequence = $this->db->select('r.id, rr.sequence')
		                ->from('sm_resep_r_detail as r')
		                ->join('sm_resep_r as rr', 'rr.id = r.id_resep_r', 'left')
		                ->join('sm_resep as rs', 'rs.id = rr.id_resep', 'left')
		                ->where('r.id_barang', (int)$b->id_barang, true)
		                ->where('rs.id', (int)$b->id_resep, true)
		                ->get()
		                ->row();

		            if(isset($b->id_integrasi_resep) && isset($b->id_medication_request)){

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
                        ->where('apo.signa', $b->aturan_pakai, true)
                        ->where('apo.is_active', 1, true)
                        ->get()
                        ->row();

                        if(isset($cekRelasiAturan->jml_pemberian)){

                            $frequencyPeriod = $cekRelasiAturan->jml_pemberian;

                        } else {

                            date_default_timezone_set('Asia/Jakarta');
                            $xDetailDataRequest = ["kategori" => "MedicationDispense","no_rm" => $b->no_rm, "message" => 'Tidak Ada data jumlah pemberian di sm resep r', "jenis_data" => 'error', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama'), "param" => $cekSequence->id.' id Resep R', "function" => 'integrasiMedicationDispense'];
                            $this->db->insert('sm_satu_sehat_log', $xDetailDataRequest);

                            return;

                        }

		                $paramDispense = array(
						   "resourceType"=> "MedicationDispense",
						   "identifier"=> [
						       array(
						           "system"=> "http://sys-ids.kemkes.go.id/prescription/".$xKonfigurasi->organization,
						           "use"=> "official",
						           "value"=> $b->id_resep
						       ),
						       array(
						           "system"=> "http://sys-ids.kemkes.go.id/prescription-item/".$xKonfigurasi->organization,
						           "use"=> "official",
						           "value"=> $b->id
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
						       "reference"=> "Medication/".$b->id_integrasi_resep,
						       "display"=> $b->nama_obat
						   ),
						   "subject"=> array(
						       "reference"=> "Patient/".$b->ihsn,
						       "display"=> $b->nama_pasien
						   ),
						   "context"=> array(
						       "reference"=> "Encounter/".$b->id_encounter
						   ),
						   "location"=> array(
						       "reference"=> "Location/".$lokasi->integrasi_baru,
						       "display"=> "Apotek Rawat Jalan"
						   ),
						   "authorizingPrescription"=> [
						       array(
						           "reference"=> "MedicationRequest/".$b->id_medication_request
						       )
						   ],
						   "quantity"=> array(
						       "system"=> "http://terminology.hl7.org/CodeSystem/v3-orderableDrugForm",
						       "code"=> $b->ingredient,
						       "value"=> (int)$b->jumlah_pakai
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
						                       "value"=>(int)$b->dosis_racik,
												"unit"=>$b->code_ucum,
												"system"=>"http://unitsofmeasure.org",
												"code"=>$b->code_ucum
						                   )
						               )
						           ]
						       )
						   ]
						);

						$dataApi = json_encode($paramDispense);

            			$output = $this->sehat->postEncounter($url, $dataApi, $header);

                        if($output['result'] !== false){

                			if($output['respon'] === 201){

    			                $result = json_decode($output['result']);

    			                date_default_timezone_set('Asia/Jakarta');

    			                $update = ["id_medication_dispense" => $result->id];

    			                $this->db->where('id', (int)$b->id)->update('sm_resep_tebus_r_detail', $update);

    			                $xDetailData = ["kategori" => "Medication Dispense", "no_rm" => $b->no_rm, "message" => json_encode($paramDispense), "jenis_data" => 'ok', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama'), "respon" => $output['respon'], "function" => 'integrasiMedicationDispense'];

    			                $this->db->insert('sm_satu_sehat_log', $xDetailData);

    			            } else {

    			                date_default_timezone_set('Asia/Jakarta');
    			                    $xDetailData = ["kategori" => "Update Medication","no_rm" => $b->no_rm, "message" => $output['result'], "jenis_data" => 'error', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama'), "param" => json_encode($paramDispense), "respon" => $output['respon'], "function" => 'integrasiMedicationDispense'];
    			                    $this->db->insert('sm_satu_sehat_log', $xDetailData);
    			                    $decode = ["metaData" => ["code" => 202,"message" => 'error']];

    			            }

                        }

	                } else {

	                	if($b->id_integrasi_resep === null){
	                		
	                		date_default_timezone_set('Asia/Jakarta');
                            $xDetailDataRequest = ["kategori" => "MedicationDispense","no_rm" => $b->no_rm, "message" => 'Tidak Ada data id_integrasi_resep', "jenis_data" => 'error', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama'), "param" => $cekSequence->id.' id Resep R', "function" => 'integrasiMedicationDispense'];
                            $this->db->insert('sm_satu_sehat_log', $xDetailDataRequest);

                        }

                        if($b->id_medication_request === null){
	                		
	                		date_default_timezone_set('Asia/Jakarta');
                            $xDetailDataRequest = ["kategori" => "MedicationDispense","no_rm" => $b->no_rm, "message" => 'Tidak Ada data id_medication_request', "jenis_data" => 'error', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama'), "param" => $cekSequence->id.' id Resep R', "function" => 'integrasiMedicationDispense'];
                            $this->db->insert('sm_satu_sehat_log', $xDetailDataRequest);

                        }
	                }

	            }

	        }

         } else {

         	date_default_timezone_set('Asia/Jakarta');
            $xDetailDataRequest = ["kategori" => "MedicationDispense", "message" => 'Tidak Ada ID Resep', "jenis_data" => 'error', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama'), "function" => 'integrasiMedicationDispense'];
            $this->db->insert('sm_satu_sehat_log', $xDetailDataRequest);

         }

	}

	function validasiPenyerahanResep($id_penjualan)
	{
		$this->db->trans_begin();
		$this->db->where('id', $id_penjualan)->update('sm_penjualan', ['waktu_diserahkan' => $this->datetime]);

		$pendaftaran = $this->db->select('lp.id_pendaftaran, lp.jenis_layanan')
			->from('sm_penjualan p')
			->join('sm_layanan_pendaftaran lp', 'p.id_layanan_pendaftaran = lp.id')
			->where('p.id', $id_penjualan)
			->get()->row();

		if(isset($pendaftaran->jenis_layanan)){

			if($pendaftaran->jenis_layanan === 'Poliklinik'){

                $this->load->model('satu_sehat/Satu_sehat_model', 'sehat');

                $cekOnOff = $this->sehat->cekSatuSehatOnOff();

                if($cekOnOff->onoff === '1'){

				    $this->integrasiMedicationDispense($id_penjualan);

                }

			}

		}

		// update task tujuh
		$this->lakukan_task_tujuh($pendaftaran);

		if ($this->db->trans_status() === false) :
			$this->db->trans_rollback();
			$response['status'] = false;
			$response['message'] = 'Gagal menyerahkan resep';
		else :
			$this->db->trans_commit();
			$response['status'] = true;
			$response['message'] = 'Berhasil menyerahkan resep';
		endif;
		return $response;
	}

	private function lakukan_task_tujuh($pendaftaran)
	{
		$this->load->model('pelayanan/Pelayanan_model', 'm_pelayanan');
		$cekBooking = $this->m_pelayanan->cekBookingPendaftaran($pendaftaran->id_pendaftaran);

		if (isset($cekBooking->kode_booking)) {

			$kodeBookingBPJS = $cekBooking->kode_booking;

			if (!empty($kodeBookingBPJS)) {

				if ($pendaftaran->jenis_layanan === 'Poliklinik') {

					$cek_booking_pendaftaran = $this->m_pelayanan->cekBookingPendaftaran($pendaftaran->id_pendaftaran);

					if (isset($cek_booking_pendaftaran->kode_booking)) {

						$kode_booking_bpjs = $cek_booking_pendaftaran->kode_booking;

						if (!empty($kode_booking_bpjs)) {

							date_default_timezone_set('Asia/Jakarta');
							$tanggalTunggu = (round(microtime(true) * 1000));
							$new_estimasi  = date('Y-m-d H:i:s', $tanggalTunggu / 1000);

							$update = ["task_tujuh" => $new_estimasi];

							$get_id_antrian = $this->m_pelayanan->getIdAntrean($kode_booking_bpjs);
							$id_antrian     = (int) $get_id_antrian->id;

							$get_task_tujuh = $this->db->select('task_tujuh')->from('sm_antrian_bpjs')->where('id', $id_antrian)->get()->row();

							if ($get_task_tujuh->task_tujuh === null) {

								$data_antrian = $this->db->where('id', $id_antrian)->update('sm_antrian_bpjs', $update);

								if ($data_antrian !== false) {

									$data_response = array(
										"nomor_task"     => 7,
										"waktu_task"     => $tanggalTunggu,
										"kode_booking"   => $kode_booking_bpjs,
										"id_antrian"     => $id_antrian,
										"konversi_waktu" => $new_estimasi,
									);

									$cek_respon_bpjs = $this->m_pelayanan->getResponseBPJS($kode_booking_bpjs, 7);

									if (!isset($cek_respon_bpjs->id)) {

										$this->db->insert('sm_update_task_bpjs', $data_response);
									}
								}
							}
						}
					}
				}
			}
		}
	}
}
