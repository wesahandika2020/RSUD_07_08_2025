<?php

use LZCompressor\LZString;

defined('BASEPATH') or exit('No direct script access allowed');

class Antrian_bridging_model extends CI_Model
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
			'Content-type: application/json; charset=utf-8'
		);
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

	public function getDataPasien($no_identitas, $jenis_identitas, $penjamin)
	{
		$this->identitas($jenis_identitas, $no_identitas);

		$data = $this->db->get('sm_pasien as p')->row();

		if ($data === NULL) {
			return FALSE;
		}

		if ($penjamin === 'JKN') {
			$penjamin = $this->db->get_where('sm_penjamin_pasien', ['id_pasien' => $data->id, 'id_penjamin' => 1])->row();

			if ($penjamin !== NULL) {
				$this->identitas($jenis_identitas, $no_identitas, 'JKN');

				return $this->db->get('sm_pasien as p')->row();
			}

			$dataPenjmain = [
				'id_pasien' => $data->id,
				'id_penjamin' => 1,
				'no_polish' => '',
			];

			$this->db->insert('sm_penjamin_pasien', $dataPenjmain);

			$this->identitas($jenis_identitas, $no_identitas, 'JKN');

			return $this->db->get('sm_pasien as p')->row();
		} else {
			return $data;
		}
	}

	private function identitas($jenis_identitas, $no_identitas, $penjamin = NULL): void
	{
		if ($penjamin === 'JKN') {
			$this->db->select("p.*, pp.id as id_penjamin_pasien, pp.no_polish, pp.id_penjamin, date_part('year',age(p.tanggal_lahir)) as umur_pasien");
			$this->db->join('sm_penjamin_pasien as pp', 'p.id = pp.id_pasien');
			$this->db->where('pp.id_penjamin', 1);
		} else {
			$this->db->select("p.*, date_part('year',age(p.tanggal_lahir)) as umur_pasien");
		}

		if ($jenis_identitas === 'no_rm') {
			$this->db->where('p.id', sprintf("%08s", (string) ((int) ($no_identitas))));
		} elseif ($jenis_identitas === 'nik') {
			$this->db->where('p.no_identitas', $no_identitas);
		} elseif ($jenis_identitas === 'no_bpjs') {
			$this->db->where('pp.no_polish', $no_identitas);
		}
	}

	public function checkIdentitasPasien($no_identitas, $jenis_identitas, $penjamin)
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
				and p.id_pendidikan is not null
				and p.telp is not null
				and p.id_etnis is not null";

		$this->db->where($where);

		$this->identitas($jenis_identitas, $no_identitas, $penjamin);

		return $this->db->get('sm_pasien p')->row();
	}

	public function checkPasienBaru($no_identitas, $jenis_identitas, $penjamin)
	{
		$this->identitas($jenis_identitas, $no_identitas, $penjamin);
		
		return $this->db->get('sm_pasien p')->row();
	}

	public function cekDataAntrian($tanggal_periksa, $cek_no_hp, $cek_no_ktp, $cek_no_rm, $cek_no_bpjs)
	{

		$query = "SELECT *
							FROM sm_antrian_bpjs
							WHERE status != 'Batal'
							AND status_jkn = 'JKN'
							AND tanggal_kunjungan = '" . $tanggal_periksa . "' ";
		$limit = " LIMIT 1 ";

		$data = null;

		if ($cek_no_hp) {
			$data = $this->db->query($query . "AND no_hp = '" . $cek_no_hp . "' " . $limit)->row();
		}

		if (!$data && $cek_no_ktp) {
			$data = $this->db->query($query . "AND nik = '" . $cek_no_ktp . "' " . $limit)->row();
		}

		if (!$data && $cek_no_rm) {
			$data = $this->db->query($query . "AND no_rm = '" . $cek_no_rm . "' " . $limit)->row();
		}

		if (!$data && $cek_no_bpjs) {
			$data = $this->db->query($query . "AND no_kartu = '" . $cek_no_bpjs . "' " . $limit)->row();
		}

		return $data;
	}
}
