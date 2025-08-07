<?php

class Antrian_farmasi_model extends CI_Model {
	function __construct() {
		parent::__construct();
		date_default_timezone_set( 'Asia/Jakarta' );
		$this->datetime = date( 'Y-m-d' );
	}

	public function cekNoRm( $noRm ) {
		return $this->db->select( 'id' )->from( 'sm_pasien' )->where( 'id', $noRm )->get()->row();
	}

	public function getPoli( $noRm ) {
		return $this->db->select( 'distinct on (slp.id) slp.id as id_layanan_pendaftaran, slp.tindak_lanjut, sp2.nama as poli, p.nama as nama_dokter, s.tanggal_keluar, sp.nama as nama_pasien, sp2.id as id_poli, saf.id as id_antrian_farmasi, s.id as id_pendaftaran, s.lunas, saf.status_antrean, slp.id_penjamin as penjamin' )
		                ->from( 'sm_pasien sp' )
		                ->join( 'sm_pendaftaran s', 'sp.id = s.id_pasien' )
		                ->join( 'sm_layanan_pendaftaran slp', 's.id = slp.id_pendaftaran' )
		                ->join( 'sm_spesialisasi sp2', 'slp.id_unit_layanan = sp2.id' )
		                ->join( 'sm_tenaga_medis stm', 'slp.id_dokter = stm.id' )
		                ->join( 'sm_pegawai p', 'stm.id_pegawai = p.id' )
		                ->join( 'sm_resep sr', 'slp.id = sr.id_layanan_pendaftaran' )
		                ->join( 'sm_antrian_farmasi saf', "sp.id = saf.no_rm and date(waktu_hadir) = '" . date( 'Y-m-d' ) . "' and id_poli = sp2.id", 'left' )
		                ->where( 'sp.id', $noRm )
		                ->where( 'date(s.tanggal_daftar)', date( 'Y-m-d' ) )
		                ->where( 's.status !=', 'Batal' )
		                ->get()->result();
	}

	public function checkIsResepRacikan( $idLayanan ) {
		$data = $this->db->select( 'rr.racik' )
		                 ->from( 'sm_resep r' )
		                 ->join( 'sm_resep_r rr', 'r.id = rr.id_resep' )
		                 ->join( 'sm_layanan_pendaftaran lp', 'lp.id = r.id_layanan_pendaftaran' )
		                 ->where( 'lp.id', $idLayanan )
		                 ->get()->result();

		$isRacik = false;
		foreach ( $data as $d ) {
			if ( $d->racik == 1 ) {
				$isRacik = true;
				break;
			}
		}

		return $isRacik;
	}

	public function cekAntrianFarmasi( $tanggal, $isRacik, $is_prioritas, $is_pasien_cemara ) {
		if($is_prioritas || $is_pasien_cemara){
			$query = $this->db->select( "max(urutan) as urutan" )
			                  ->from( 'sm_antrian_farmasi' )
			                  ->where( 'tanggal_kunjungan', $tanggal )
			                  ->where( 'huruf_antrean', 'C' )
			                  ->get();
		}else{
			$query = $this->db->select( "max(urutan) as urutan" )
			                  ->from( 'sm_antrian_farmasi' )
			                  ->where( 'tanggal_kunjungan', $tanggal )
			                  ->where( 'racik', $isRacik ? 1 : 0 )
							  ->where( 'huruf_antrean !=', 'C' )
			                  ->get();
		}

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

	public function cekTerdaftar( $noRm, $idPoli, $tanggalKunjungan ) {
		return $this->db->select( '*' )
		                ->from( 'sm_antrian_farmasi' )
		                ->where( 'no_rm', $noRm )
		                ->where( 'id_poli', $idPoli )
//		                ->where( 'id_resep', $idResep )
		                ->where( 'tanggal_kunjungan', $tanggalKunjungan )
		                ->get()->row();
	}

	public function dataAntrianFarmasi( $limit = 0, $start = 0, $search ) {
		$result['data']   = $this->listDataAntrianFarmasi( $limit, $start, $search );

		foreach ($result['data'] as $data){
			$waktuPanggil = $data->waktu_panggil === null ? null : datetime2mysql($data->waktu_panggil);

			$select = "";
			if($waktuPanggil !== null){
				$select = "EXTRACT(EPOCH FROM (pen.waktu_diserahkan - '{$waktuPanggil}')) as durasi_dilayani, ";
			}else{
				$select = "'-' as durasi_dilayani, ";
			}

			$resep = $this->db->select("to_char(pen.waktu_diserahkan, 'DD/MM/YYYY HH24:MI:SS') as waktu_diserahkan, 
			 {$select} rt.cetakan_ke")
				->from('sm_resep r')
				->join('sm_resep_tebus rt', 'r.id = rt.id_resep')
				->join( 'sm_penjualan pen', 'r.id = pen.id_resep' )
				->where('r.id_layanan_pendaftaran', $data->id_layanan_pendaftaran)
				->get()->result();

			foreach ($resep as $r){
				$data->waktu_diserahkan = $r->waktu_diserahkan;
				if($r->waktu_diserahkan != null){
					break;
				}
			}

			foreach ($resep as $r){
				$data->durasi_dilayani = $r->durasi_dilayani;
				if($r->durasi_dilayani != null){
					break;
				}
			}

			$cetakanKe = [];
			foreach ($resep as $r){
				$cetakanKe[] = $r->cetakan_ke;
			}

			$data->is_cetak_semua = !in_array('0', $cetakanKe);
		}


		$result['jumlah'] = $this->sqlDataAntrianFarmasi( $search )->get()->num_rows();

		return $result;
	}

	private function listDataAntrianFarmasi( $limit = 0, $start = 0, $search ) {
		$this->sqlDataAntrianFarmasi( $search );
		if ( $limit !== 0 ) :
			$this->db->limit( $limit, $start );
		endif;

		return $this->db->get()->result();
	}

//	private function sqlDataAntrianFarmasi( $search ) {
//		$this->db->select( "saf.*, to_char(saf.waktu_hadir, 'DD/MM/YYYY HH24:MI:SS') as waktu_hadir, to_char(saf.waktu_panggil, 'DD/MM/YYYY HH24:MI:SS') as waktu_panggil,
//		spes.nama as poli, peg.nama as nama_dokter, sp.nama as nama_pasien, s.lunas, slp.id_penjamin as penjamin, srt.id as id_resep_tebus,
//		to_char(pen.waktu_diserahkan, 'DD/MM/YYYY HH24:MI:SS') as waktu_diserahkan, EXTRACT(EPOCH FROM (saf.waktu_panggil - saf.waktu_hadir)) as durasi_tunggu,
//		EXTRACT(EPOCH FROM (pen.waktu_diserahkan - saf.waktu_panggil)) as durasi_dilayani" )
//		         ->from( 'sm_antrian_farmasi saf' )
//		         ->join( 'sm_pasien sp', 'saf.no_rm = sp.id' )
//		         ->join( 'sm_layanan_pendaftaran slp', 'saf.id_layanan_pendaftaran = slp.id' )
//		         ->join( 'sm_pendaftaran s', 'slp.id_pendaftaran = s.id' )
//		         ->join( 'sm_spesialisasi spes', 'saf.id_poli = spes.id' )
//		         ->join( 'sm_tenaga_medis stm', 'slp.id_dokter = stm.id' )
//		         ->join( 'sm_pegawai peg', 'stm.id_pegawai = peg.id' )
//		         ->join( 'sm_resep sr', 'saf.id_resep = sr.id' )
//		         ->join( 'sm_resep_tebus srt', 'sr.id = srt.id_resep' )
//		         ->join( 'sm_penjualan pen', 'sr.id = pen.id_resep' );
//
//		if ( ( $search['tanggal_awal'] !== '' ) & ( $search['tanggal_akhir'] !== '' ) )
//		{
//			$this->db->where( "saf.tanggal_kunjungan BETWEEN '" . date2mysql( $search['tanggal_awal'] ) . "' AND '" . date2mysql( $search['tanggal_akhir'] ) . "'" );
//		}
//
//		if ( $search['no_antrean'] !== '' )
//		{
//			$this->db->like( 'saf.nomor_antrean', $search['no_antrean'], TRUE );
//		}
//
//		if ( $search['no_rm'] !== '' )
//		{
//			$this->db->where( 'saf.no_rm', $search['no_rm'], TRUE );
//		}
//
//		if ( $search['nm_poli'] !== '' )
//		{
//			$this->db->where( 'saf.id_poli', $search['nm_poli'], TRUE );
//		}
//
//		if ( $search['nm_dokter'] !== '' )
//		{
//			$this->db->like( 'stm.id', $search['nm_dokter'], TRUE );
//		}
//
//		if ( $search['status_antrean'] !== '' )
//		{
//			$this->db->where( 'saf.status_antrean', $search['status_antrean'] );
//		}
//
//		return $this->db->order_by( 'saf.id', 'desc' );
//	}

	private function sqlDataAntrianFarmasi( $search ) {
		$this->db->select( "saf.*, to_char(saf.waktu_hadir, 'DD/MM/YYYY HH24:MI:SS') as waktu_hadir, to_char(saf.waktu_panggil, 'DD/MM/YYYY HH24:MI:SS') as waktu_panggil,
		spes.nama as poli, peg.nama as nama_dokter, sp.nama as nama_pasien, s.lunas, EXTRACT(EPOCH FROM (saf.waktu_panggil - saf.waktu_hadir)) as durasi_tunggu" )
		         ->from( 'sm_antrian_farmasi saf' )
		         ->join( 'sm_pasien sp', 'saf.no_rm = sp.id' )
		         ->join( 'sm_layanan_pendaftaran slp', 'saf.id_layanan_pendaftaran = slp.id' )
		         ->join( 'sm_pendaftaran s', 'slp.id_pendaftaran = s.id' )
		         ->join( 'sm_spesialisasi spes', 'saf.id_poli = spes.id' )
		         ->join( 'sm_tenaga_medis stm', 'slp.id_dokter = stm.id' )
		         ->join( 'sm_pegawai peg', 'stm.id_pegawai = peg.id' );

		if ( ( $search['tanggal_awal'] !== '' ) & ( $search['tanggal_akhir'] !== '' ) )
		{
			$this->db->where( "saf.tanggal_kunjungan BETWEEN '" . date2mysql( $search['tanggal_awal'] ) . "' AND '" . date2mysql( $search['tanggal_akhir'] ) . "'" );
		}

		if ( $search['no_antrean'] !== '' )
		{
			$this->db->like( 'saf.nomor_antrean', $search['no_antrean'], TRUE );
		}

		if ( $search['no_rm'] !== '' )
		{
			$this->db->where( 'saf.no_rm', $search['no_rm'], TRUE );
		}

		if ( $search['nm_poli'] !== '' )
		{
			$this->db->where( 'saf.id_poli', $search['nm_poli'], TRUE );
		}

		if ( $search['nm_dokter'] !== '' )
		{
			$this->db->like( 'stm.id', $search['nm_dokter'], TRUE );
		}

		if ( $search['status_antrean'] !== '' )
		{
			$this->db->where( 'saf.status_antrean', $search['status_antrean'] );
		}

		if ($search['status_resep'] === '1')
		{
			$this->db->where("not exists(select 1 from sm_resep r join sm_resep_tebus rt on r.id = rt.id_resep where r.id_layanan_pendaftaran = saf.id_layanan_pendaftaran and rt.cetakan_ke = '0')");
		}

		$this->db->group_by( 'saf.id, spes.nama, peg.nama, sp.nama, s.lunas' );
		return $this->db->order_by( 'saf.id', 'desc' );
	}

	public function getKodeBPJS( $q, $start, $limit ) {
		$limit = " limit " . $limit . " offset " . $start;
		$w     = " (nama ilike ('%$q%') or kode ilike ('%$q%')) ";
		$sql   = "select *, coalesce(kode, '') as kode 
                from sm_spesialisasi 
                where $w and kode_bpjs != '' order by nama";


		$data['data']  = $this->db->query( $sql . $limit )->result();
		$data['total'] = $this->db->query( $sql )->num_rows();

		return $data;
	}

	public function getAutoSpesialisasi( $id_spesialisasi ) {
		$this->db->select( "tm.*, pg.nama as dokter, coalesce(sp.nama, '-') as spesialisasi, case when jml.jml_terlayani<>'' then jml.jml_terlayani else '(0/0)' end jml_terlayani" )
		         ->from( 'sm_tenaga_medis as tm' )
		         ->join( 'sm_pegawai as pg', 'pg.id = tm.id_pegawai' )
		         ->join( 'sm_spesialisasi as sp', 'sp.id = tm.id_spesialisasi', 'left' )
		         ->join( " (select id_dokter,
                concat('(',count(status_terlayani) FILTER (where status_terlayani='Sudah'),
                '/',count(status_terlayani),')' ) jml_terlayani
                from sm_layanan_pendaftaran where to_char(tanggal_layanan, 'DD-MM-YYYY')=to_char(NOW(), 'DD-MM-YYYY')
                and konsul=0 and id_unit_layanan=$id_spesialisasi and jenis_layanan='Poliklinik'
                GROUP BY id_dokter) as jml", 'jml.id_dokter=tm.id', 'left' )
		         ->where( 'tm.id_spesialisasi', $id_spesialisasi );

		return $this->db->get()->result();
	}

	public function getDataBooking( $id ) {
		return $this->db->select( "saf.*, spes.nama as poli, peg.nama as nama_dokter, sp.nama as nama_pasien" )
		                ->from( 'sm_antrian_farmasi as saf' )
		                ->join( 'sm_pasien sp', 'saf.no_rm = sp.id' )
		                ->join( 'sm_pendaftaran s', 'sp.id = s.id_pasien' )
		                ->join( 'sm_layanan_pendaftaran slp', 's.id = slp.id_pendaftaran' )
		                ->join( 'sm_spesialisasi spes', 'saf.id_poli = spes.id' )
		                ->join( 'sm_tenaga_medis stm', 'slp.id_dokter = stm.id' )
		                ->join( 'sm_pegawai peg', 'stm.id_pegawai = peg.id' )
		                ->where( 'saf.id', $id )
		                ->get()->row();
	}

	public function getIdResep( $idResep ) {
		return $this->db->select( 'sr.id' )
		                ->from( 'sm_antrian_farmasi saf' )
		                ->join( 'sm_pasien sp ', 'saf.no_rm = sp.id' )
		                ->join( 'sm_pendaftaran s ', ' sp.id = s.id_pasien' )
		                ->join( 'sm_layanan_pendaftaran slp ', ' s.id = slp.id_pendaftaran' )
		                ->join( 'sm_resep sr ', ' slp.id = sr.id_layanan_pendaftaran' )
		                ->where( 'saf.id', $idResep )
		                ->where( 'date(s.tanggal_daftar)', date( 'Y-m-d' ) )
		                ->where( 's.status !=', 'Batal' )
		                ->get()->row();
	}

	public function dataPanggilPasien( $limit = 0, $start = 0, $search ) {
		$result['data']   = $this->listDataPanggilPasien( $limit, $start, $search );
		$result['jumlah'] = $this->sqlDataPanggilPasien( $search )->get()->num_rows();

		return $result;
	}

	private function listDataPanggilPasien( $limit = 0, $start = 0, $search ) {
		$this->sqlDataPanggilPasien( $search );
		if ( $limit !== 0 ) :
			$this->db->limit( $limit, $start );
		endif;

		return $this->db->get()->result();
	}

	private function sqlDataPanggilPasien( $search ) {
		$this->db->select( "distinct on (saf.id) saf.*, to_char(saf.waktu_panggil, 'DD/MM/YYYY HH24:MI:SS') as waktu_panggil, spes.nama as poli, peg.nama as nama_dokter, sp.nama as nama_pasien" )
		         ->from( 'sm_antrian_farmasi saf' )
		         ->join( 'sm_pasien sp', 'saf.no_rm = sp.id' )
		         ->join( 'sm_pendaftaran s', 'sp.id = s.id_pasien' )
		         ->join( 'sm_layanan_pendaftaran slp', 's.id = slp.id_pendaftaran' )
		         ->join( 'sm_spesialisasi spes', 'saf.id_poli = spes.id' )
		         ->join( 'sm_tenaga_medis stm', 'slp.id_dokter = stm.id' )
		         ->join( 'sm_pegawai peg', 'stm.id_pegawai = peg.id' )
		         ->where( 'saf.status_antrean', 'Process' )
		         ->where( 'saf.pasien_hadir', 'Hadir' );


		if ( ( $search['tanggal_awal'] !== '' ) & ( $search['tanggal_akhir'] !== '' ) )
		{
			$this->db->where( "saf.tanggal_kunjungan BETWEEN '" . date2mysql( $search['tanggal_awal'] ) . "' AND '" . date2mysql( $search['tanggal_akhir'] ) . "'" );
		}

		if ( $search['no_antrean'] !== '' )
		{
			$this->db->like( 'saf.nomor_antrean', $search['no_antrean'], TRUE );
		}

		if ( $search['nm_poli'] !== '' )
		{
			$this->db->where( 'saf.id_poli', $search['nm_poli'], TRUE );
		}

		if ( $search['nm_dokter'] !== '' )
		{
			$this->db->like( 'stm.id', $search['nm_dokter'], TRUE );
		}

		if ( $search['jenis_antrian'] !== '' )
		{
			$this->db->where( 'saf.huruf_antrean', strtoupper($search['jenis_antrian']), TRUE );
		}

		return $this->db->order_by( 'saf.id' );
	}

	public function dataDelayPanggilan() {
		return $this->db->select( "*" )
		                ->from( 'sm_tunda_panggilan_farmasi' )
		                ->where( 'id', 1 )
		                ->get()->row();
	}

	public function simpanPanggilPasien( $params ) {
		$this->db->insert( 'sm_panggil_pasien_farmasi', $params );

		return $this->db->insert_id();
	}

	public function panggilAudio( $id ) {
		$this->db->select( "huruf_antrean, urutan, loket" )
		         ->from( 'sm_antrian_farmasi' )
		         ->where( 'id', $id, TRUE );

		return $this->db->get()->row();
	}

	public function dataPanggilAntrian() {
		return $this->db->select( "saf.nomor_antrean, ppf.*" )
		                ->from( 'sm_panggil_pasien_farmasi as ppf' )
		                ->join( 'sm_antrian_farmasi as saf', 'saf.id = ppf.id_antrian', 'left' )
		                ->where( "ppf.waktu BETWEEN '" . $this->datetime . " 00:00:00' AND '" . $this->datetime . " 23:59:59'" )
		                ->where( 'ppf.id is not null' )
		                ->order_by( 'ppf.id', 'desc' )
		                ->limit( 1 )->get()->result();
	}

	public function dataPanggilSatu() {
		return $this->db->select( "saf.nomor_antrean, ppf.*" )
		                ->from( 'sm_panggil_pasien_farmasi as ppf' )
		                ->join( 'sm_antrian_farmasi as saf', 'saf.id = ppf.id_antrian', 'left' )
		                ->where( "ppf.waktu BETWEEN '" . $this->datetime . " 00:00:00' AND '" . $this->datetime . " 23:59:59'" )
		                ->where( 'ppf.id is not null' )
		                ->where( 'ppf.loket', '1' )
		                ->order_by( 'ppf.id', 'desc' )
		                ->limit( 1 )->get()->row();
	}

	public function dataPanggilDua() {
		return $this->db->select( "saf.nomor_antrean, ppf.*" )
		                ->from( 'sm_panggil_pasien_farmasi as ppf' )
		                ->join( 'sm_antrian_farmasi as saf', 'saf.id = ppf.id_antrian', 'left' )
		                ->where( "ppf.waktu BETWEEN '" . $this->datetime . " 00:00:00' AND '" . $this->datetime . " 23:59:59'" )
		                ->where( 'ppf.id is not null' )
		                ->where( 'ppf.loket', '2' )
		                ->order_by( 'ppf.id', 'desc' )
		                ->limit( 1 )->get()->row();
	}

	public function dataPanggilTiga() {
		return $this->db->select( "saf.nomor_antrean, ppf.*" )
		                ->from( 'sm_panggil_pasien_farmasi as ppf' )
		                ->join( 'sm_antrian_farmasi as saf', 'saf.id = ppf.id_antrian', 'left' )
		                ->where( "ppf.waktu BETWEEN '" . $this->datetime . " 00:00:00' AND '" . $this->datetime . " 23:59:59'" )
		                ->where( 'ppf.id is not null' )
		                ->where( 'ppf.loket', '3' )
		                ->order_by( 'ppf.id', 'desc' )
		                ->limit( 1 )->get()->row();
	}

	public function dataPanggilEmpat() {
		return $this->db->select( "saf.nomor_antrean, ppf.*" )
		                ->from( 'sm_panggil_pasien_farmasi as ppf' )
		                ->join( 'sm_antrian_farmasi as saf', 'saf.id = ppf.id_antrian', 'left' )
		                ->where( "ppf.waktu BETWEEN '" . $this->datetime . " 00:00:00' AND '" . $this->datetime . " 23:59:59'" )
		                ->where( 'ppf.id is not null' )
		                ->where( 'ppf.loket', '4' )
		                ->order_by( 'ppf.id', 'desc' )
		                ->limit( 1 )->get()->row();
	}

	public function getIdPenjualanByIdResep( $id ) {
		return $this->db->select( 'id' )
		                ->from( 'sm_penjualan' )
		                ->where( 'id_resep', $id )
		                ->get()->row();
	}
	
	function getStatusAntrean()
    {
        return array(
            '' => 'Pilih Status Antrean',
            'Selesai' => 'Selesai',
            'Process' => 'Process',
            'Dilayani' => 'Dilayani'
        );
    }

	public function checkResepPrioritas( $idLayanan ) {
		$data = $this->db->select( 'r.is_prioritas' )
		                 ->from( 'sm_resep r' )
		                 ->join( 'sm_layanan_pendaftaran lp', 'lp.id = r.id_layanan_pendaftaran' )
		                 ->where( 'lp.id', $idLayanan )
		                 ->get()->result();

		$data = array_column($data, 'is_prioritas');

		return in_array('1', $data);
	}

	public function checkPasienCemara( $idLayanan ) {
		$data = $this->db->select( 'id_unit_layanan' )
		                 ->from( 'sm_layanan_pendaftaran' )
		                 ->where( 'id', $idLayanan )
		                 ->get()->row();

		return $data->id_unit_layanan == '45';
	}
}
