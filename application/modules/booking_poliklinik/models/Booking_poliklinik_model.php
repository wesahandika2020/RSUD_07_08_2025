<?php

use LZCompressor\LZString;

defined('BASEPATH') or exit('No direct script access allowed');

class Booking_poliklinik_model extends CI_Model
{
	private $timestamp;

	function __construct()
	{
		parent::__construct();
		$this->datetime = date('Y-m-d H:i:s');
		$this->timestamp = strval(time());
	}

	function getSignatureBPJS($config)
	{
		$cid = $config->cons_id;
		$skey = $config->secret_key;

		// get timestamp
		// date_default_timezone_set("Asia/Jakarta");
		// $timestamp = strtotime(date("Y/m/d H:i:s"));

		$timestamp = $this->timestamp;

		// set data value
		$data = $cid . "&" . $timestamp;

		// generate signature
		$signature = hash_hmac('sha256', $data, $skey, true);
		$encodedSignature = base64_encode($signature);

		// urlencode...
		// $encodedSignature = urlencode($encodedSignature);
		$data = array(
			'timestamp' => $timestamp,
			'signature' => $encodedSignature
		);

		return (object)$data;
		//return strtotime(date("Y-m-d H:i:s")) * 1000;
	}

	function createHeader($bpjs_config)
	{
		$sign = $this->getSignatureBPJS($bpjs_config);
		return array(
			'X-Cons-ID:' . $bpjs_config->cons_id,
			'X-Timestamp:' . $sign->timestamp,
			'X-Signature:' . $sign->signature,
			'User_Key:' . $bpjs_config->user_key,
			'Content-type: application/json'
		);
	}

	public function getDataPasien($no_identitas, $jenis_dentitas, $penjamin, $penjamin_lainnya = null)
	{
		$this->identitas($jenis_dentitas, $no_identitas);

		$data = $this->db->get('sm_pasien as p')->row();

		if ($data === NULL) {
			return FALSE;
		}

		if($penjamin === 'tunai'){
			return $data;
		}

		$id_penjamin = 1;
		if ($penjamin !== 'bpjs') {
			$id_penjamin = $penjamin_lainnya;
		}
		$penjamin_pasien = $this->db->get_where('sm_penjamin_pasien', ['id_pasien' => $data->id, 'id_penjamin' => $id_penjamin])->row();

		if ($penjamin_pasien !== NULL) {

			// $this->identitas($jenis_dentitas, $no_identitas, 'bpjs');
			$this->identitas($jenis_dentitas, $no_identitas, $penjamin, $penjamin_lainnya);

			return $this->db->get('sm_pasien as p')->row();
		}

		$dataPenjmain = [
			'id_pasien' => $data->id,
			'id_penjamin' => $id_penjamin,
			'no_polish' => '',
		];

		$this->db->insert('sm_penjamin_pasien', $dataPenjmain);

		$this->identitas($jenis_dentitas, $no_identitas, $penjamin, $penjamin_lainnya);

		return $this->db->get('sm_pasien as p')->row();
	}

	private function identitas($jenis_dentitas, $no_identitas, $penjamin = NULL, $penjamin_lainnya = null): void
	{
		if ($penjamin && $penjamin !== 'tunai') {
			$id_penjamin = 1;
			if ($penjamin !== 'bpjs') {
				$id_penjamin = $penjamin_lainnya;
			}

			$this->db->select("p.*, pp.id as id_penjamin_pasien, pp.no_polish, pp.id_penjamin, date_part('year',age(p.tanggal_lahir)) as umur_pasien");
			$this->db->join('sm_penjamin_pasien as pp', 'p.id = pp.id_pasien');
			$this->db->where('pp.id_penjamin', $id_penjamin);
		} else {
			$this->db->select("p.*, date_part('year',age(p.tanggal_lahir)) as umur_pasien");
		}

		if ($jenis_dentitas === 'no_rm') {
			$this->db->where('p.id', sprintf("%08s", (string) ((int) ($no_identitas))));
		} elseif ($jenis_dentitas === 'nik') {
			$this->db->where('p.no_identitas', $no_identitas);
		}
	}

	public function checkIdentitasPasien($no_identitas, $jenis_dentitas, $penjamin, $penjamin_lainnya = null)
	{
		$where = "p.no_identitas <> '' 
				and p.nama <> ''
				and p.tanggal_lahir is not null
				and p.alamat is not null
				and p.no_prop is not null
				and p.no_kab is not null
				and p.no_kec is not null
				and p.no_kel is not null
				and p.agama <> ''
				and p.id_pendidikan is not null";

		$this->db->where($where);

		$this->identitas($jenis_dentitas, $no_identitas, $penjamin, $penjamin_lainnya);

		return $this->db->get('sm_pasien p')->row();
	}

	function getAutoDokterSpesialisasi($id_spesialisasi, $tanggal)
	{
		is_numeric($id_spesialisasi)
			? $this->db->where('id_poli', $id_spesialisasi)
			: $this->db->where('kode_bpjs_poli', $id_spesialisasi);

		empty(explode("/", $tanggal)[1])
			? $this->db->where('tanggal', $tanggal)
			: $this->db->where('tanggal', date2mysql($tanggal));

		return $this->db->get('sm_jadwal_dokter')->result();
	}

	// function getJadwalDokterBySKDDOkterTujuan($id_dokter, $tanggal, $id_spesialisasi)
	// {
	// 	is_numeric($id_spesialisasi)
	// 		? $this->db->where('id_poli', $id_spesialisasi)
	// 		: $this->db->where('kode_bpjs_poli', $id_spesialisasi);

	// 	return $this->db->where('tanggal', $tanggal)->where('id_dokter', $id_dokter)->get('sm_jadwal_dokter')->row();
	// }

	function getJadwalDokterBySKDDOkterTujuan($id_jadwal_dokter)
	{
		return $this->db->where('id', $id_jadwal_dokter)->get('sm_jadwal_dokter')->row();
	}

	public function checkSkd($no_rm, $tgl_kadaluarsa_rujukan, $kode_poli)
	{
		return $this->db->select("sk.id_spesialisasi ,sk.id , sk.id_pasien, sk.id_spesialisasi_asal, sk.tanggal, sk.id_jadwal_dokter, 
								  sk.id_dokter_tujuan, sp1.nama as poli_asal, sp2.nama as poli_tujuan, pg.nama as nama_dokter,
								  case when sk.tanggal >= '$tgl_kadaluarsa_rujukan' and '$kode_poli' != 'HDL' then 1 else 0 end as is_expired,
								  case when ab.status = 'Booking' then '1' else '0' end as is_booking, 
								  case when ab.status = 'Check In' then '1' else '0' end as is_checkin, 
								  case when ab.id is null then '0' else '1' end as is_antrian,
								  case when ab.status = 'Batal' then '1' else '0' end as is_batal,
								  ab.id as id_antrian, ab.id_pendaftaran,p.status as status_pendaftaran,ab.lokasi_data,
								  sk.id_pendaftaran as id_pendaftaran_skk, p2.no_rujukan as no_rujukan_skk,
								  case when ab.lokasi_data = 'APM' or ab.lokasi_data is null then '1' else '0' end as is_can_apm")
			->from('sm_surat_kontrol sk')
			->join('sm_spesialisasi sp1', 'sp1.id = sk.id_spesialisasi_asal', 'left')
			->join('sm_spesialisasi sp2', 'sp2.id = sk.id_spesialisasi')
			->join('sm_antrian_bpjs ab', 'ab.id_skd = sk.id', 'left')
			->join('sm_tenaga_medis stm', 'stm.id = sk.id_dokter_tujuan', 'left')
			->join('sm_pegawai pg', 'pg.id = stm.id_pegawai', 'left')
			->join('sm_pendaftaran p', 'ab.id_pendaftaran = p.id', 'left')
			->join('sm_pendaftaran p2', 'sk.id_pendaftaran = p2.id', 'left')
			->where('sk.id_pasien', $no_rm)
			->where("(ab.id is null or ab.status = 'Booking')")
			->where("sk.tanggal >=", date('Y-m-d'))
			->order_by('sk.tanggal', 'desc')
			->get()->result();

        // return array_values(array_filter($skd, function ($item) {
        //     return ($item->is_antrian === '0' || $item->is_booking === '1') && $item->tanggal >= date('Y-m-d');;
        // }));
	}

	// public function checkSkd($no_rm, $tgl_kadaluarsa_rujukan)
	// {
	// 	return $this->db->select("sk.id_spesialisasi ,sk.id , sk.id_pasien, sk.id_spesialisasi_asal, sk.tanggal, 
	// 							  sk.id_dokter_tujuan, sp1.nama as poli_asal, sp2.nama as poli_tujuan, pg.nama as nama_dokter,
	// 							  case when sk.tanggal >= '$tgl_kadaluarsa_rujukan' then 1 else 0 end as is_expired,
	// 							  case when ab.id is not null then '1' else '0' end as is_booking, ab.id as id_antrian, ab.id_pendaftaran,
	// 							  p.status as status_pendaftaran")
	// 		->from('sm_surat_kontrol sk')
	// 		->join('sm_spesialisasi sp1', 'sp1.id = sk.id_spesialisasi_asal')
	// 		->join('sm_spesialisasi sp2', 'sp2.id = sk.id_spesialisasi')
	// 		->join('sm_antrian_bpjs ab', 'ab.id_skd = sk.id', 'left')
	// 		->join('sm_tenaga_medis stm', 'stm.id = sk.id_dokter_tujuan', 'left')
	// 		->join('sm_pegawai pg', 'pg.id = stm.id_pegawai', 'left')
	// 		->join('sm_pendaftaran p', 'ab.id_pendaftaran = p.id', 'left')
	// 		->where('sk.id_pasien', $no_rm)
	// 		->order_by('sk.id_spesialisasi', 'desc')
	// 		->get()->result();
	// }

	// public function getDataBooking($id)
	// {
	// 	return $this->db->select("ab.*, spes.nama as poli, peg.nama as nama_dokter, sp.nama as nama_pasien")
	// 	                ->from('sm_antrian_bpjs as ab')
	// 	                ->join('sm_pasien sp', 'ab.no_rm = sp.id')
	// 	                ->join('sm_pendaftaran s', 'sp.id = s.id_pasien')
	// 	                ->join('sm_layanan_pendaftaran slp', 's.id = slp.id_pendaftaran')
	// 	                ->join('sm_spesialisasi spes', 'ab.nama_poli = spes.id')
	// 	                ->join('sm_tenaga_medis stm', 'slp.id_dokter = stm.id')
	// 	                ->join('sm_pegawai peg', 'stm.id_pegawai = peg.id')
	// 	                ->where('ab.id', $id)
	// 	                ->get()->row();
	// }

	// public function getDataBooking($id)
	// {
	// 	return $this->db->select("ab.*, spes.nama as poli, sp.nama as nama_pasien, p.nama as nama_penjamin, jd.shift_poli")
	// 		->from('sm_antrian_bpjs as ab')
	// 		->join('sm_pasien sp', 'ab.no_rm = sp.id')
	// 		->join('sm_spesialisasi spes', 'ab.nama_poli = spes.id')
	// 		->join('sm_penjamin p', 'ab.id_penjamin = p.id')
	// 		->join('sm_jadwal_dokter jd', 'ab.id_jadwal_dokter = jd.id')
	// 		->where('ab.id', $id)
	// 		->get()->row();
	// }

	public function getDataBooking($id)
	{
		return $this->db->select("ab.*, spes.nama as poli, sp.nama as nama_pasien, p.nama as nama_penjamin, jd.shift_poli")
			->from('sm_antrian_bpjs as ab')
			->join('sm_pasien sp', 'ab.no_rm = sp.id', 'left')
			->join('sm_spesialisasi spes', 'ab.nama_poli = spes.id')
			->join('sm_penjamin p', 'ab.id_penjamin = p.id', 'left')
			->join('sm_jadwal_dokter jd', 'ab.id_jadwal_dokter = jd.id')
			->where('ab.id', $id)
			->get()->row();
	}

	public function decryptResponse($string, $config)
	{
		$key           = $config->cons_id . $config->secret_key . $this->timestamp;
		$encryptMethod = 'AES-256-CBC';
		// hash
		$keyHash = hex2bin(hash('sha256', $key));
		// iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
		$iv     = substr(hex2bin(hash('sha256', $key)), 0, 16);
		$output = openssl_decrypt(base64_decode($string), $encryptMethod, $keyHash, OPENSSL_RAW_DATA, $iv);
		$output = LZString::decompressFromEncodedURIComponent($output);
		$output = json_decode($output);

		return $output;
	}

	public function getWaktuEstimasi($id_antrian, $id_poli, $tanggal_kunjungan)
	{
		return $this->db->query("WITH cte AS (
								SELECT *, ROW_NUMBER() OVER (ORDER BY create_date) - 1 AS position,
								          FLOOR((ROW_NUMBER() OVER (ORDER BY create_date) - 1) /
						                        case when nama_poli = 34 then 25 else 10 end) *
						                  case when EXTRACT(DOW FROM tanggal_kunjungan) = 5 then 45 else 60 end AS minutes_offset
								FROM sm_antrian_bpjs
						            where tanggal_kunjungan = '{$tanggal_kunjungan}'
					                and (lokasi_data = 'APM' OR lokasi_data = 'mobile')
					                and nama_poli = {$id_poli}
					            )
								SELECT id,
								       TO_CHAR(DATE_TRUNC('hour', tanggal_kunjungan) +
								               '07:30'::time + minutes_offset * INTERVAL '1 minute', 'HH24:MI') AS estimated_time_start,
							           case
								           when TO_CHAR(DATE_TRUNC('hour', tanggal_kunjungan) +
								                        '07:30'::time + minutes_offset * INTERVAL '1 minute' + INTERVAL '1 hour',
								                        'HH24:MI') > '12:00'
								               then '12:00'
								           else TO_CHAR(DATE_TRUNC('hour', tanggal_kunjungan) +
								                        '07:30'::time + minutes_offset * INTERVAL '1 minute' + INTERVAL '1 hour',
								                        'HH24:MI')
							           end AS estimated_time_end
								FROM cte
								WHERE id = {$id_antrian}")->row();
	}

	public function logKuota($data_log, $aksi, $lokasi, $fungsi, $ip)
	{
		$this->db->insert('sm_log_kuota', [
			'jumlah_kunjung' => !is_array($data_log) && !empty($data_log->jml_kunjung) ? $data_log->jml_kunjung : null,
			'kuota' => !is_array($data_log) && !empty($data_log->kuota) ? $data_log->kuota : null,
			'jadwal_dokter' => json_encode($data_log),
			'aksi' => $aksi,
			'fungsi' => $fungsi,
			'lokasi' => $lokasi,
			'ip' => $ip,
		]);
	}

	public function cekKontrolRawatInap($no_rm)
	{
		return $this->db->select('sk.*, sp.nama as nama_poli')
			->from('sm_surat_kontrol sk')
			->join('sm_spesialisasi sp', 'sp.id = sk.id_spesialisasi')
			->where('sk.id_pasien', $no_rm)
			->where('sk.id_spesialisasi_asal is null')
			->order_by('sk.id', 'desc')
			->get()->row();
	}

	public function checkPasienJKNDaftar($tanggal, $no_rm)
	{
		return $this->db->select('count(*) as jml')
			->from('sm_antrian_bpjs')
			->where('tanggal_kunjungan', $tanggal)
			->where('usia_pasien', 'JKN')
			->where('lokasi_data !=', 'APM')
			->where('jenis_penjamin', '1')
			->where('tanggal_kunjungan', $tanggal)
			->where('no_rm', $no_rm)
			->where('status !=', 'Batal')
			->get()->row();
	}
	
	public function simpanHakKelasPasien($no_rm, $hak_kelas)
	{
		$this->db
		->where('id_pasien', $no_rm)
		->where('id_penjamin', 1)
		->update('sm_penjamin_pasien', ['hak_kelas' => $hak_kelas]);
	}

	public function updateHakKelasPasien($data)
	{
		$penjamin_pasien = $this->getPenjaminPasien($data['no_rm']);

		if ($penjamin_pasien === null) {
			$this->insertPenjaminPasien($data);
		} else if (isset($penjamin_pasien->hak_kelas)) {
			return;
		}
		
		$url = base_url() . "/vclaim_bpjs/api/vclaim_bpjs_v2/get_peserta?nokartu=" . $data['no_kartu'];
		$header[4] = 'Content-type: Application/x-www-form-urlencoded';
		$response = getCurl($url, $header);
		$response = json_decode($response);

		if (isset($response) && $response->metaData->code === "200") {
			$hak_kelas = $response->response->peserta->hakKelas->keterangan;
			$this->simpanHakKelasPasien($data['no_rm'], $hak_kelas);
		}
	}

	private function getPenjaminPasien($no_rm)
	{
		return $this->db->from('sm_penjamin_pasien')
			->where('id_pasien', $no_rm)
			->where('id_penjamin', 1)
			->get()
			->row();
	}

	private function insertPenjaminPasien($data)
	{
		$this->db->insert('sm_penjamin_pasien', [
			'id_pasien' => $data['no_rm'],
			'id_penjamin' => 1,
			'no_polish' => $data['no_kartu']
		]);
	}

	public function saveUnsavedData($no_identitas, $jenis_dentitas, $penjamin, $no_polish, $telp, $etnis, $etnis_lainnya)
	{
		$this->db->trans_begin();
		$this->identitas($jenis_dentitas, $no_identitas);

		$data = $this->db->get('sm_pasien as p')->row();

		if($data === null){
			return false;
		}

		$data_pasien = [
			'telp' => $telp
		];

		if($etnis){
			$data_pasien['id_etnis'] = $etnis;
			$data_pasien['etnis_lainnya'] = $etnis_lainnya;
		}

		$this->db->where('id', $data->id)->update('sm_pasien', $data_pasien);

		if($penjamin !== 'bpjs'){
			return false;
		}

		$penjamin = $this->db->get_where('sm_penjamin_pasien', ['id_pasien' => $data->id, 'id_penjamin' => 1])->row();

		if(!empty($penjamin) && empty($penjamin->no_polish)){
			$this->db->where('id', $penjamin->id)->update('sm_penjamin_pasien', ['no_polish' => $no_polish]);
		}

		if ($this->db->trans_status() === false) {
			$this->db->trans_rollback();
			return false;
		}else {
			$this->db->trans_commit();
			return true;
		}
	}
}
