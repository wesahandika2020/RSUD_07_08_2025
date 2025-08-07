<?php

use LZCompressor\LZString;

defined('BASEPATH') or exit('No direct script access allowed');

class Antrian_lab_model extends CI_Model
{
	private $timestamp;

	function __construct()
	{
		parent::__construct();
		$this->datetime = date('Y-m-d H:i:s');
        $this->date     = date('Y-m-d');
		$this->timestamp = strval(time());
	}

    public function getDataPasien($no_identitas, $jenis_dentitas, $penjamin, $penjamin_lainnya = null)
	{
		if ($jenis_dentitas === 'no_rm') {
			$this->db->where('p.id', sprintf("%08s", (string) ((int) ($no_identitas))));
		} elseif ($jenis_dentitas === 'nik') {
			$this->db->where('p.no_identitas', $no_identitas);
		}

		$data = $this->db->get('sm_pasien as p')->row();
		return $data;

	}

	private function sqlAntrianLabByOrder($type, $search)
    {
		
        $this->db->from('sm_order_laboratorium ol');
        $this->db->join('sm_layanan_pendaftaran lp', 'ol.id_layanan_pendaftaran = lp.id', 'left');
        $this->db->join('sm_pendaftaran pd', 'lp.id_pendaftaran=pd.id', 'left');
        $this->db->join('sm_spesialisasi sp', 'lp.id_unit_layanan=sp.id', 'left');
        $this->db->join('sm_pasien p', 'pd.id_pasien=p.id', 'left');
		$this->db->where("to_char(ol.waktu_order, 'yyyy-mm-dd')=to_char(NOW(), 'yyyy-mm-dd')");

		if($type=='unit'){
			$this->db->select(" DISTINCT lp.id_unit_layanan, sp.nama nama_poli, pg.nama nama_dokter,pd.id_pasien, lp.id_penjamin, (select nama from sm_penjamin where id=lp.id_penjamin) penjamin,
								(select id from sm_antrian_laboratorium where ol.id = ANY(id_order_laboratorium::INTEGER[]) and status_antrian <> 'Batal' Order by urutan desc limit 1 ) id_antrian,
								(select nomor_antrian from sm_antrian_laboratorium where ol.id = ANY(id_order_laboratorium::INTEGER[]) and status_antrian <> 'Batal' AND kode_antrian <> 'E' Order by urutan desc limit 1 ) nomor_antrian,
								COALESCE((ol.item::jsonb -> 0 ->> 'cito'), 'tidak') AS cito, COALESCE((ol.item::jsonb -> 0 ->> 'prioritas'), 'tidak') AS prioritas  ",false);
			$this->db->join('sm_tenaga_medis tm', 'lp.id_dokter=tm.id', 'left');
			$this->db->join('sm_pegawai pg', 'tm.id_pegawai=pg.id', 'left');
		} elseif($type=='antrian'){
			$this->db->select(" ol.id, ol.id_layanan_pendaftaran, lp.id_unit_layanan, sp.nama nama_poli, 
								COALESCE((ol.item::jsonb -> 0 ->> 'cito'), 'tidak') AS cito, COALESCE((ol.item::jsonb -> 0 ->> 'prioritas'), 'tidak') AS prioritas, ol.item",false);
		} else {
			$this->db->select(" * ",false);
		}

		if ($search['jenis_identitas'] === 'no_rm' && $search['no_identitas'] !== '') {
			$this->db->where('p.id', sprintf("%08s", (string) ((int) ($search['no_identitas']))));
			
		} elseif ($search['jenis_identitas'] === 'nik' && $search['no_identitas'] !== '') {
			$this->db->where('p.no_identitas', $search['no_identitas']);
		}

		if (isset($search['layanan']) && $search['layanan'] !== '' && $search['layanan'] !== 'undefined') :
        	$this->db->where("lp.id_unit_layanan",$search['layanan']);
        endif;

        return $this->db->order_by('lp.id_unit_layanan', 'asc');        
    }

    function getAntrianLabByOrder($search)
    {        
        $result['jml_unit']   = $this->sqlAntrianLabByOrder('unit',$search)->get()->num_rows();
        $result['data_unit']  = $this->sqlAntrianLabByOrder('unit',$search)->get()->result();
        $result['jml_order']  = $this->sqlAntrianLabByOrder('antrian',$search)->get()->num_rows();
		$result['data_order'] = $this->sqlAntrianLabByOrder('antrian',$search)->get()->result();
        $this->db->close();
        return $result;
    }

	private function sqlAntrianLabByTiket($search)
    {		
        $this->db->select(' alab.id, alab.id_antrian_sebelum, alab.tanggal_kunjungan,
							array_to_json(alab.id_layanan_pendaftaran) AS id_layanan_pendaftaran,
							alab.nomor_antrian, lp.id_pendaftaran, pd.tanggal_keluar,
							(select id from sm_antrian_laboratorium where id_antrian_sebelum=alab.id ) id_antrian_hasil',false);
		$this->db->from('sm_antrian_laboratorium alab');
        $this->db->join('sm_pasien p', 'alab.id_pasien=p.id', 'left');			
        $this->db->join('sm_layanan_pendaftaran lp', 'lp.id IN (SELECT CAST(json_array_elements_text(array_to_json(alab.id_layanan_pendaftaran)) AS bigint))', 'left');			
        $this->db->join('sm_pendaftaran pd', 'pd.id =  lp.id_pendaftaran', 'left');		
		$this->db->where("alab.kode_antrian <> 'E' ");

		if ($search['jenis_identitas'] === 'no_rm' && $search['no_identitas'] !== '') {
			$this->db->where('p.id', sprintf("%08s", (string) ((int) ($search['no_identitas']))));
			
		} elseif ($search['jenis_identitas'] === 'nik' && $search['no_identitas'] !== '') {
			$this->db->where('p.no_identitas', $search['no_identitas']);
		}
		
        $this->db->group_by('alab.id,lp.id_pendaftaran,pd.tanggal_keluar');        
        return $this->db->order_by('alab.id', 'desc');        
    }

	function getAntrianLabByTiket($search)
    {        
        $result['jumlah']   	= $this->sqlAntrianLabByTiket($search,'')->get()->num_rows();
        $result['data']  		= $this->sqlAntrianLabByTiket($search,'')->get()->result();
        $this->db->close();
        return $result;
    }

	public function cekAntrianLab( $tanggal, $kode_antrian ) {
		$query = $this->db->select( "max(urutan) as urutan" )
		                  ->from( 'sm_antrian_laboratorium' )
		                  ->where( 'tanggal_kunjungan', $tanggal )
		                  ->where( 'kode_antrian', $kode_antrian )
		                  ->get();

		if ( $query !== NULL )
		{
			$unit         = $query->row();
			$next_antrian = $unit->urutan + 1;
		} else
		{
			$next_antrian = 1;
		}

		return $next_antrian;
	}   

	function tambahCetakAntrianLab($id = 0) 
    {
        $print_number = 0;
        $data = $this->db->where('id', $id, true)->select('cetak')->get('sm_antrian_laboratorium')->row();
        if (0 < count((array)$data)) :
            $status = true;
            $print_number = $data->cetak + 1;
            $data_update = array('cetak' => $print_number);
            $this->db->where('id', $id, true)->update('sm_antrian_laboratorium', $data_update);
        else :
            $status = false;
        endif;

        return array('status' => $status, 'cetakan' => $print_number);
    }

	function tes()
    {   
		$this->db->select(" id, array_to_json(id_layanan_pendaftaran) id_layanan_pendaftaran, array_length(id_layanan_pendaftaran, 1) jml ",false);	
		$this->db->from('antrian_lab');

		return $this->db->get()->row();  
    }



	/*  ==== LIST ANTRIAN LAB ====  */

	function getListAntrianLab($start, $limit, $search)
    {
        $result['data'] = $this->_listAntrianLab($start, $limit, $search);
        $result['jumlah'] = $this->sqlListAntrianLab($search)->get()->num_rows();
		$result['ruang_admin_a_sisa']  = $this->dataPanggilPerRuangKodeSisa('Admin','A');
        $result['ruang_admin_b_sisa']  = $this->dataPanggilPerRuangKodeSisa('Admin','B');
        $result['ruang_admin_c_sisa']  = $this->dataPanggilPerRuangKodeSisa('Admin','C');
        $result['ruang_admin_d_sisa']  = $this->dataPanggilPerRuangKodeSisa('Admin','D');
        $result['ruang_admin_e_sisa']  = $this->dataPanggilPerRuangKodeSisa('Admin','E');
		
        $this->db->close();
        return $result;
    }

    private function _listAntrianLab($start, $limit, $search)
    {
        $this->sqlListAntrianLab($search);
        if ($limit !== 0) :
            $this->db->limit($limit, $start);
        endif;
        return $this->db->get()->result();
    }
    
    private function sqlListAntrianLab($search)
    {
        $this->db->select(" alab.id, alab.tanggal_kunjungan, alab.id_pasien, ps.nama nama_pasien, sp.nama nama_poli, alab.ruang_laboratorium ruang_panggil,
							pgc.nama user_cancel, alab.is_sampling, alab.jml_panggil_admin, alab.jml_panggil_sampling,
							alab.id_layanan_pendaftaran,alab.id_order_laboratorium,alab.is_cito,alab.is_prioritas,alab.id_poli,alab.kode_antrian,
							alab.urutan,alab.nomor_antrian,alab.status_antrian,alab.created_date,alab.id_user,alab.cetak,
							alab.keterangan_batal,alab.cancel_date,alab.id_user_cancel ", false);

        $this->db->from('sm_antrian_laboratorium alab')
                 ->join('sm_pasien ps', 'alab.id_pasien=ps.id', 'left')
                 ->join('sm_spesialisasi as sp', 'alab.id_poli = sp.id', 'left')				 
                 ->join('sm_pegawai pgc', 'alab.id_user_cancel=pgc.id', 'left');

        $this->db->where('alab.id is not null');

        if ($search['tanggal'] !== '' && isset($search['tanggal'])) :        
            $this->db->where(" alab.tanggal_kunjungan " , date2mysql($search['tanggal']));
        endif;

		if ($search['ruang_lab'] !== '' && isset($search['ruang_lab'])) :
            $search['ruang_lab'] == '1' ? $this->db->where('alab.ruang_laboratorium','Admin')  : '' ; //Admin
            $search['ruang_lab'] == '2' ? $this->db->where('alab.ruang_laboratorium','Sampling')  : '' ; //Sampling        
        endif;

		if ($search['kode_antrian'] !== '' && isset($search['kode_antrian'])) :
			if($search['kode_antrian'] == 'ABCD'){
				$this->db->where("alab.kode_antrian != 'E' ");  
			} else {
				$this->db->where('alab.kode_antrian', $search['kode_antrian']);        
			}
        endif;

        if ($search['status_antrian'] !== '' && isset($search['status_antrian'])) :
            $search['status_antrian'] == '1' ? $this->db->where("alab.jml_panggil_admin >= 1 AND alab.status_antrian != 'Batal' ") : '' ; // Sudah
            $search['status_antrian'] == '2' ? $this->db->where("alab.jml_panggil_admin <= 0 AND alab.status_antrian != 'Batal' ") : '' ; // Belum     
            $search['status_antrian'] == '3' ? $this->db->where("alab.status_antrian = 'Batal' ") : '' ;  //Batal             
        endif;	

        if ($search['keyword'] !== '' && isset($search['keyword'])) :
			if (is_numeric($search['keyword'])) :
				$this->db->where("ps.id ilike ('%" . $search["keyword"] . "')");
			else :
				$this->db->where("ps.nama ilike ('%" . $search["keyword"] . "%')");
			endif;
        endif;
	
        $this->db->order_by('alab.created_date', 'desc');
        return $this->db->order_by('ps.nama', 'asc');
    }

	function antrianLabById($id)
    {
        return $this->db->select("alab.id, alab.tanggal_kunjungan, alab.id_pasien, ps.nama nama_pasien, sp.nama nama_poli, alab.ruang_laboratorium ruang_panggil,
								alab.jml_panggil_admin, alab.jml_panggil_sampling, alab.id_layanan_pendaftaran,alab.id_order_laboratorium,alab.is_cito,alab.is_prioritas,alab.id_poli,alab.kode_antrian,
								alab.urutan,alab.nomor_antrian,alab.status_antrian,to_char(alab.created_date, 'dd/mm/yyyy HH24:MI') created_date,alab.id_user,alab.cetak,
								alab.keterangan_batal,alab.cancel_date,alab.id_user_cancel, ps.telp", false)
                    ->from('sm_antrian_laboratorium alab')
					->join('sm_pasien ps', 'alab.id_pasien=ps.id', 'left')
					->join('sm_spesialisasi as sp', 'alab.id_poli = sp.id', 'left')
                    ->where('alab.id', $id)
                    ->get()
                    ->row();
        $this->db->close();
    }

	function pembatalanAntrianLab($id_antrian, $data)
    {
        $this->db->trans_begin();
        $this->db->where("id", $id_antrian)->update("sm_antrian_laboratorium", $data);
        if ($this->db->trans_status() === false) :
			$this->db->trans_rollback();
			$status = false;
			$message = 'Gagal melakukan pembatalan antrian laboratorium';
		else :
			$this->db->trans_commit();
			$status = true;
			$message = 'Berhasil melakukan pembatalan antrian laboratorium';
		endif;

		return array('status' => $status, 'message' => $message);
    }

	function getCallLab($ruang_panggil,$kode_antrian,$user)
    {		
		////////////////// and jenis_panggil='Call'
		$sqlJmlTunda = "SELECT count(*) jml FROM sm_tunda_panggilan_laboratorium where status_panggil='1' 
						and to_char(waktu_panggil,'YYYY-MM-DD')='".date('Y-m-d')."' and ruang_laboratorium='".$ruang_panggil."' and kode_antrian='".$kode_antrian."'  "; 
		$jmlTunda    = $this->db->query($sqlJmlTunda)->row()->jml;

		// MASIH ADA
		if($jmlTunda >= 1 ){
			$status  = false;
			$message = 'Gagal Call Antrian '.$ruang_panggil.' Kode '.$kode_antrian.'. Masih menunggu Antrian panggil';

		} else {  
			// get id antrian terlama (awal)
			$ruang_panggil == 'Admin' ?
				$where_jml = 'and (jml_panggil_admin is null or jml_panggil_admin=0)' :
				$where_jml = 'and (jml_panggil_sampling is null or jml_panggil_sampling=0)';

			$sqlUrutan  = "SELECT id id_antrian FROM sm_antrian_laboratorium where to_char(tanggal_kunjungan,'YYYY-MM-DD')='".date('Y-m-d')."' 
						  ".$where_jml." and ruang_laboratorium='".$ruang_panggil."' and kode_antrian='".$kode_antrian."' order by urutan asc limit 1";  
			$id_antrian =  $this->db->query($sqlUrutan)->row()->id_antrian ?? NULL;
			
			$status  = false;
			$message = 'Gagal Call Antrian '.$ruang_panggil.' Kode '.$kode_antrian.'. List Antrian Kosong';

			if($id_antrian != NULL){	

				$sqlInsert = "INSERT INTO sm_tunda_panggilan_laboratorium (id_antrian, ruang_laboratorium, kode_antrian, waktu_panggil, jenis_panggil, status_panggil, nama_user, created_date) 
								VALUES ( '".$id_antrian."', '".$ruang_panggil."', '".$kode_antrian."', '".$this->date."', 'Call', '1' ,'".$user."','".$this->datetime."')
								ON CONFLICT (ruang_laboratorium, kode_antrian,waktu_panggil) DO UPDATE
								SET id_antrian = '".$id_antrian."', waktu_panggil = '".$this->date."', status_panggil = '1', nama_user = '".$user."', created_date = '".$this->datetime."' ";
				$this->db->query($sqlInsert);	
				$status = true;
				$message = 'Berhasil Call Antrian Laboratorium '.$ruang_panggil.' Kode '.$kode_antrian;	
			}
		}

        // return $respon;
		return array('status' => $status, 'action' => 'Call', 'message' => $message);
    }

	function getReCallLab($ruang_panggil,$kode_antrian,$user)
    {
        //cek sudah pernah di panggil
		$sqlJmlTunda = "SELECT count(*) jml FROM sm_tunda_panggilan_laboratorium where status_panggil='1' 
						and to_char(waktu_panggil,'YYYY-MM-DD')='".date('Y-m-d')."' and ruang_laboratorium='".$ruang_panggil."' and kode_antrian='".$kode_antrian."'  "; 
		$jmlTunda    = $this->db->query($sqlJmlTunda)->row()->jml;

		if($jmlTunda >= 1 ){
			$status  = false;
			$message = 'Gagal ReCall Antrian '.$ruang_panggil.' Kode '.$kode_antrian.'. Masih menunggu Antrian panggil';

		} else {  
			// get id antrian tunda terlama (awal)
			$sqlUrutan  = "SELECT id_antrian FROM sm_tunda_panggilan_laboratorium where to_char(waktu_panggil,'YYYY-MM-DD')='".date('Y-m-d')."' 
							and ruang_laboratorium='".$ruang_panggil."' and kode_antrian='".$kode_antrian."' order by id desc limit 1";  
			$id_antrian =  $this->db->query($sqlUrutan)->row()->id_antrian ?? NULL;
			
			$status  = false;
			$message = 'Gagal ReCall Antrian '.$ruang_panggil.' Kode '.$kode_antrian.'. List Antrian Kosong';

			if($id_antrian != NULL){	

				$update    = array( 'status_panggil' => '1', 
                                    'jenis_panggil'  => 'ReCall', 
                                    'nama_user'      => $user, 
                                    'created_date'   => $this->datetime);
                $this->db->where('id_antrian', $id_antrian)->update('sm_tunda_panggilan_laboratorium', $update);
				$status  = true;
				$message = 'Berhasil ReCall Antrian Laboratorium '.$ruang_panggil.' Kode '.$id_antrian;	
			}
		}
        return array('status' => $status, 'action' => 'ReCall', 'message' => $message);
    }

	// function updateSampling($id, $is_sampling)
    // {
	// 	$is_sampling == 1 ? $setSampling = 0 : $setSampling = 1;
    //     $this->db->trans_begin();
    //     $this->db->where("id", $id)->update("sm_antrian_laboratorium", array('is_sampling' => $setSampling));
    //     if ($this->db->trans_status() === false) :
	// 		$this->db->trans_rollback();
	// 		$status = false;
	// 		$message = 'Gagal Ubah Panggilan Ruang Sampling';
	// 	else :
	// 		$this->db->trans_commit();
	// 		$status = true;
	// 		$message = 'Berhasil Ubah Panggilan Ruang Sampling';
	// 	endif;

	// 	return array('status' => $status, 'message' => $message);
    // }

	/*  ==== MONITOR ANTRIAN LAB ====  */

	function dataPanggilAntrianAktif() {
		return $this->db->select( "alab.id, alab.nomor_antrian, alab.ruang_laboratorium, tlab.jenis_panggil",false )
		                ->from( 'sm_antrian_laboratorium alab' )
		                ->join( 'sm_tunda_panggilan_laboratorium tlab', 'alab.id = tlab.id_antrian', 'left' )
		                ->where( "tlab.waktu_panggil BETWEEN '" . $this->date . "' AND '" . $this->date . "' " )
		                ->where( 'tlab.id is not null' )
		                ->where( 'tlab.status_panggil','0' )
		                ->where( 'alab.status_antrian !=','Batal' )
		                ->order_by( 'tlab.created_date', 'DESC' )
		                ->limit( 1 )->get()->row();
	}

	function dataPanggilAntrianAktifByRuang($ruang) {
		return $this->db->select( "alab.id, alab.nomor_antrian, tlab.ruang_laboratorium, tlab.jenis_panggil",false )
		                ->from( 'sm_antrian_laboratorium alab' )
		                ->join( 'sm_tunda_panggilan_laboratorium tlab', 'alab.id = tlab.id_antrian', 'left' )
		                ->where( "tlab.waktu_panggil BETWEEN '" . $this->date . "' AND '" . $this->date . "' " )
		                ->where( 'tlab.id is not null' )
		                ->where( 'tlab.status_panggil','0' )
		                ->where( 'alab.status_antrian !=','Batal' )
		                ->where( 'tlab.ruang_laboratorium',$ruang )
		                ->order_by( 'tlab.created_date', 'DESC' )
		                ->limit( 1 )->get()->row();
	}
	
	// function dataPanggilPerRuang($ruang) {
	// 	$this->db->select( "alab.id, alab.nomor_antrian" )
    //              ->from( 'sm_antrian_laboratorium alab' )
    //              ->join( 'sm_tunda_panggilan_laboratorium tlab', ' alab.id = tlab.id_antrian ', 'left' )
    //              ->where( "tlab.waktu_panggil BETWEEN '" . $this->date . "' AND '" . $this->date . "' " )
    //              ->where( 'tlab.id is not null' )
    //              ->where( 'alab.ruang_laboratorium', $ruang )     
    //         	 ->where( 'tlab.status_panggil', '0' )
    //         	 ->order_by( 'alab.id', 'desc' );
	// 	return  $this->db->limit( 1 )->get()->row();
	// }

	// function dataPanggilPerRuangKode($ruang,$kode) {
	// 	$this->db->select( "alab.id, alab.nomor_antrian" )
    //              ->from( 'sm_antrian_laboratorium alab' )
    //              ->where( 'alab.tanggal_kunjungan', $this->date)
    //              ->where( 'alab.ruang_laboratorium', $ruang )    
	// 			 ->where( 'alab.kode_antrian', $kode )
	// 			 ->order_by( 'alab.id', 'desc' );
	// 	$ruang=='Admin' ? $this->db->where( 'alab.jml_panggil_admin >= 1') : $this->db->where( 'alab.jml_panggil_sampling >= 1');
	// 	return  $this->db->limit( 1 )->get()->row();
	// }

	function dataPanggilPerRuangKode($ruang,$kode) {
		$this->db->select( "alab.id, alab.nomor_antrian" )
                 ->from( 'sm_antrian_laboratorium alab' )
				 ->join( 'sm_tunda_panggilan_laboratorium tlab', 'alab.id = tlab.id_antrian', 'left' )
                 ->where( 'alab.tanggal_kunjungan', $this->date)
                 ->where( 'tlab.ruang_laboratorium', $ruang )    
				 ->where( 'alab.kode_antrian', $kode )
				 ->order_by( 'alab.id', 'desc' );
		$ruang=='Admin' ? $this->db->where( 'alab.jml_panggil_admin >= 1') : $this->db->where( 'alab.jml_panggil_sampling >= 1');
		return  $this->db->limit( 1 )->get()->row();
	}
	
	// function dataPanggilPerRuangSisa($ruang) {
	// 	$this->db->select( "alab.id, alab.nomor_antrian " )
    //              ->from( 'sm_antrian_laboratorium alab' )
    //              ->join( 'sm_tunda_panggilan_laboratorium tlab', 'alab.id =tlab.id_antrian', 'left' )
    //              ->where( "tlab.waktu_panggil BETWEEN '" . $this->date . "' AND '" . $this->date . "' " )
    //              ->where( 'tlab.id is not null' )
    //              ->where( 'alab.ruang_laboratorium', $ruang )
	// 			 ->where( 'tlab.status_panggil', '1' );        
	// 	return  $this->db->order_by( 'alab.id', 'asc')->get()->num_rows();
	// }

	function dataPanggilPerRuangKodeSisa($ruang,$kode) {
		$this->db->select( "alab.id, alab.nomor_antrian" )
                 ->from( 'sm_antrian_laboratorium alab' )
                 ->where( 'alab.tanggal_kunjungan', $this->date)
                 ->where( 'alab.ruang_laboratorium', $ruang )     
				 ->where( 'alab.kode_antrian', $kode );
		$ruang=='Admin' ? $this->db->where( 'alab.jml_panggil_admin = 0 ') : $this->db->where( 'alab.jml_panggil_sampling = 0 ');
		return  $this->db->order_by( 'alab.id', 'asc')->get()->num_rows();
	}

	function dataPanggilAntrian() {
		return $this->db->select( "alab.id, alab.nomor_antrian, alab.ruang_laboratorium, tlab.jenis_panggil " )
		                ->from( 'sm_antrian_laboratorium alab' )
		                ->join( 'sm_tunda_panggilan_laboratorium tlab', 'alab.id =tlab.id_antrian', 'left' )
		                ->where( "tlab.waktu_panggil BETWEEN '" . $this->date . "' AND '" . $this->date . "' " )
		                ->where( 'tlab.id is not null' )
		                ->where( 'tlab.status_panggil','1' )
		                ->where( 'alab.status_antrian !=','Batal' )
		                ->order_by( 'tlab.created_date', 'ASC' )
		                ->limit( 1 )->get()->row();
	}

	function antrianLaboratoriumById($id)
    {
        return $this->db->select(" alab.id, alab.id_layanan_pendaftaran, alab.id_order_laboratorium, alab.id_poli, alab.ruang_laboratorium, alab.kode_antrian, alab.ruang_laboratorium, alab.tanggal_kunjungan,
                                    alab.urutan, alab.nomor_antrian, alab.status_antrian, alab.waktu_panggil, alab.jml_panggil_admin, alab.jml_panggil_sampling, alab.cetak, alab.created_date, alab.id_user, 
                                    to_char(alab.created_date, 'DD/MM/YYYY HH:MM:SS') created_date2, ps.id id_pasien, ps.nama nama_pasien")
                    ->from('sm_antrian_laboratorium alab')
                    ->join('sm_pasien ps', 'alab.id_pasien=ps.id', 'left')
                    ->where('alab.id', $id)                        
                    ->get()->row();
        $this->db->close();
    }
}