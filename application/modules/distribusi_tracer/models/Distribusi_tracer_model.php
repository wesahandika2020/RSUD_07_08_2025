<?php
defined( 'BASEPATH' ) or exit( 'No direct script access allowed' );

class Distribusi_tracer_model extends CI_Model {

	function __construct() {
		parent::__construct();
		$this->date     = date( 'Y-m-d' );
		$this->datetime = date( 'Y-m-d H:i:s' );
		$this->unit     = $this->session->userdata( 'id_unit' );
		$this->user     = $this->session->userdata( 'id_translucent' );
	}

	function getListDataDistribusiTracer( $limit = 0, $start = 0, $search ) {
		$result['data']   = $this->_listDistribusiTracer( $limit, $start, $search );
		$result['jumlah'] = $this->sqlDistribusiTracer( $search )->get()->num_rows();
		$this->db->close();

		return $result;
	}

	private function _listDistribusiTracer( $limit, $start, $search ) {
		$this->sqlDistribusiTracer( $search );
		if ( $limit !== 0 ) :
			$this->db->limit( $limit, $start );
		endif;
		$result = $this->db->get()->result();
		foreach ( $result as $i => $val ) :
			if ( $val->waktu_order !== null && $val->waktu_ready ) :
				$val->waiting_exam_time = get_duration_indo( $val->waktu_order, $val->waktu_ready );
			endif;
			if ( $val->waktu_ready !== null && $val->waktu_distribusi !== null ) :
				$val->waiting_ready_time = get_duration_indo( $val->waktu_ready, $val->waktu_distribusi );
			endif;
		endforeach;

		return $result;
	}

	private function sqlDistribusiTracer( $search ) {
		$this->db->select( " DISTINCT ON (tr.waktu_order)
		tr.*, ('-') as waiting_exam_time, ('-') as waiting_ready_time, pd.status as status_pasien
		" );
		$this->db->from( 'sm_tracer as tr' );
		$this->db->join( 'sm_pasien as p', 'p.id = tr.no_rm' );
		$this->db->join( 'sm_pendaftaran as pd', 'pd.id_pasien = p.id' );
		$this->db->where( 'tr.id is NOT NULL' );
		if ( isset( $search['tanggal_awal'] ) && isset( $search['tanggal_akhir'] ) ) :
			if ( ( $search['tanggal_awal'] !== '' ) & ( $search['tanggal_akhir'] !== '' ) ) :
				$this->db->where( "tr.waktu_order BETWEEN '" . date2mysql( $search['tanggal_awal'] ) . " 00:00:00' AND '" . date2mysql( $search['tanggal_akhir'] ) . " 23:59:59'" );
			endif;
		endif;
		if ( isset( $search['no_register'] ) && $search['no_register'] !== '' ) :
			$this->db->where( 'tr.no_register', $search['no_register'] );
		endif;
		if ( isset( $search['no_rm'] ) && $search['no_rm'] !== '' ) :
			$this->db->where( 'tr.no_rm', $search['no_rm'] );
		endif;
		if ( isset( $search['pasien'] ) && $search['pasien'] !== '' ) :
			$this->db->where( "tr.nama_pasien ilike '%" . $search["pasien"] . "%'" );
		endif;
		if ( isset( $search['status'] ) && $search['status'] !== '' ) :
			$this->db->where( 'tr.status', $search['status'] );
		endif;
		if ( isset( $search['ranap'] ) && $search['ranap'] !== '' ) :
			$this->db->where( 'tr.inpatient', $search['ranap'] );
		endif;
		if ( isset( $search['unit'] ) ) {
			if ( $search['unit'] === "1" ) {
				$this->db->where( 'tr.inpatient', 'no' );
				$this->db->where_not_in( 'tr.destination', ['IGD', 'Hemodialisa', 'Laboratorium', 'Radiologi'] );
			} elseif ( $search["unit"] === "2" ) {
				$this->db->where( 'tr.destination', 'IGD' );
			} elseif( $search["unit"] === "3" ){
				$this->db->where_in( 'tr.destination', ['Hemodialisa', 'Laboratorium', 'Radiologi'] );
			}
		}

		return $this->db->order_by( 'tr.waktu_order', 'desc' );
	}

	function getDataSummaryTracer() {
		$status = [
			(object) [
				"status" => "order",
				"query"  => " (tr.status = 'order' or tr.status = 'pending')"
			],
			(object) [
				"status" => "ready",
				"query"  => " tr.status = 'ready'"
			],
			(object) [
				"status" => "distributed",
				"query"  => " tr.status = 'distributed'"
			],
			(object) [
				"status" => "returned",
				"query"  => " tr.status = 'returned'"
			],
		];

		$this->db->select( "count(tr.id) as jumlah" )->from( 'sm_tracer as tr' );
		$this->db->where( 'date(tr.waktu_order)', $this->date );
		$count = $this->db->get()->row()->jumlah;
		$data  = array();
		foreach ( $status as $i => $val ) :
			$this->db->select( "count(tr.id) as jumlah, (0) as persentase" )->from( 'sm_tracer as tr' );
			$this->db->where( 'date(tr.waktu_order)', $this->date );
			$this->db->where( $val->query );
			$query = $this->db->get()->row();
			if ( 0 < $count ) :
				$query->persentase = round( (int) $query->jumlah / (int) $count * 100, 1 ) . '%';
			else :
				$query->persentase = 0;
			endif;
			$data[ $val->status ] = $query;
		endforeach;

		return array( 'list' => $data, 'total' => $count );
	}

	function updateStatusDocumentTracer( $no_rm ) {
		// 43 is id_klinik = 'IGD'
		$status       = true;
		$sql_last_igd = "select tr.* 
						from sm_tracer as tr 
						where tr.no_rm = '" . $no_rm . "' 
						and tr.id_klinik = '43' 
						and tr.status != 'returned' 
						and tr.inpatient = 'no' 
						order by tr.waktu_order desc 
						limit 1";
		$tracer       = $this->db->query( $sql_last_igd )->row();
		if ( 0 < count( (array) $tracer ) ) :
			$status = true;
		else :
			$sql_last_igd_inap = "select tr.* 
								from sm_tracer as tr 
								where tr.no_rm = '" . $no_rm . "' 
								and tr.id_klinik = '43' 
								and tr.status != 'returned' 
								and tr.inpatient = 'yes' 
								order by tr.waktu_order desc 
								limit 1";
			$tracer            = $this->db->query( $sql_last_igd_inap )->row();
			if ( 0 < count( (array) $tracer ) ) :
				$status = true;
			else :
				$sql_last_poli = "select tr.* 
								from sm_tracer as tr 
								where tr.no_rm = '" . $no_rm . "' 
								and tr.id_klinik != '43' 
								and tr.status != 'returned' 
								and tr.inpatient = 'no' 
								and date(tr.waktu_order) = '" . date( "Y-m-d" ) . "' ";
				$tracer        = $this->db->query( $sql_last_poli )->row();
				if ( count( (array) $tracer ) < 1 ) :
					$sql_last_poli_inap = "select tr.* 
										from sm_tracer as tr 
										where tr.no_rm = '" . $no_rm . "' 
										and tr.id_klinik != '43' 
										and tr.status != 'returned' 
										and tr.inpatient = 'yes' 
										order by tr.waktu_order desc 
										limit 1";
					$tracer             = $this->db->query( $sql_last_poli_inap )->row();
					if ( 0 < count( (array) $tracer ) ) :
						$status = true;
					else :
						$status = false;
					endif;
				endif;
			endif;
		endif;
		$last_position = "";
		if ( $status && 0 < count( (array) $tracer ) ) :
			$doupdate      = true;
			$status_tracer = "ready";
			$last_position = $tracer->position;
			if ( $tracer->status === "order" ) :
				$status_tracer = "ready";
			else :
				if ( $tracer->status === "pending" ) :
					$status_tracer = "ready";
				else :
					if ( $tracer->status === "ready" ) :
						$doupdate = false;
					else :
						$status_tracer = "returned";
					endif;
				endif;
			endif;
			if ( $doupdate ) :
				$tracer->status = $status_tracer;
				$update         = array( "status" => $status_tracer );
				if ( $status_tracer === "returned" ) :
					$update["position"]     = "Rekam Medik";
					$update["waktu_return"] = date( "Y-m-d H:i:s" );
				endif;
				if ( $status_tracer === "ready" ) :
					$update["waktu_ready"] = date( "Y-m-d H:i:s" );
				endif;
				$this->db->where( "id", $tracer->id )->update( "sm_tracer", $update );
				$status  = true;
				$message = "Berhasil mengubah status tracer";
			else :
				$status  = false;
				$message = "Tidak dapat mengubah status tracer, dokumen harus didistribusikan ke poliklinik terlebih dahulu.";
			endif;
		else :
			$status  = false;
			$message = "Gagal mengubah status tracer, No. RM tidak ditemukan atau Pasien yang disebutkan tidak sedang dalam kunjungan";
		endif;

		return array( "status" => $status, "message" => $message, "tracer" => $tracer, "last_position" => $last_position );
	}

	function updateStatusTracer( $id, $status ) {
		$tracer_before    = $this->db->where( 'id', $id )->get( 'sm_tracer' )->row();
		$update           = array();
		$update['status'] = $status;
		if ( $status === 'pending' | $status === 'order' ) {
			$update['waktu_ready']      = null;
			$update['waktu_distribusi'] = null;
			$update['waktu_return']     = null;
		} else {
			if ( $status === 'ready' ) {
				$update['waktu_distribusi'] = null;
				$update['waktu_return']     = null;
			} else {
				if ( $status === 'distributed' ) {
					$update['waktu_return'] = null;
				}
			}
		}
		if($status === 'returned'){
			$update["position"]     = "Rekam Medik";
		}
		$this->db->where( 'id', $id )->update( 'sm_tracer', $update );

		return array( 'status' => true, 'message' => 'Berhasil mengubah status tracer menjadi ' . $status );
	}

	function getFormNoRegTracer( $id ) {

		$sql = "select pj.*, pa.alamat , pd.tanggal_daftar, coalesce(pg.nama, '-') as nama_dokter, pd.jenis_pendaftaran
        from sm_tracer as pj
		left join sm_pasien as pa on pa.id = pj.no_rm
        left join sm_pendaftaran as pd on pd.id_pasien = pa.id
        left join sm_layanan_pendaftaran as lp on lp.id_pendaftaran = pd.id 
        left join sm_spesialisasi as sp on  sp.id = lp.id_unit_layanan 
		left join sm_tenaga_medis as tm on  tm.id = lp.id_dokter 
		left join sm_pegawai as pg on  pg.id = tm.id_pegawai 
        where pj.id = '" . $id . "'";

		return $this->db->query( $sql )->row();
	}
}
