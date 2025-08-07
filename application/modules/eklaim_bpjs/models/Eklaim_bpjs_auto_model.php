<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Eklaim_bpjs_auto_model extends CI_Model
{

	function __construct()
	{
		parent::__construct();
		$this->eklaim_config = $this->default->getConfigEklaim();
		$this->load->model('eklaim_bpjs/Eklaim_bpjs_model', 'eklaim_bpjs');
	}

	function getKodeTarif()
	{
		$data = [
			// "AP"			=> "TARIF RS KELAS A PEMERINTAH",
			// "AS"			=> "TARIF RS KELAS A SWASTA",
			// "BP"			=> "TARIF RS KELAS B PEMERINTAH",
			// "BS"			=> "TARIF RS KELAS B SWASTA",
			"CP"			=> "TARIF RS KELAS C PEMERINTAH",
			// "CS"			=> "TARIF RS KELAS C SWASTA",
			// "DP"			=> "TARIF RS KELAS D PEMERINTAH",
			// "DS"			=> "TARIF RS KELAS D SWASTA",
			// "RSCM"		=> "TARIF RSUPN CIPTO MANGUNKUSUMO",
			// "RSJP"		=> "TARIF RSJPD HARAPAN KITA",
			// "RSD"			=> "TARIF RS KANKER DHARMAIS",
			// "RSAB"		=> "TARIF RSAB HARAPAN KITA",
		];

		return $data;
	}

	function getCaraMasukEklaim()
	{
		$data = [
			"gp"					=> 'Rujukan FKTP',
			"hosp-trans"	=> 'Rujukan FKRTL',
			"mp"					=> 'Rujukan Spesialis',
			"outp"				=> 'Dari Rawat Jalan',
			"inp"					=> 'Dari Rawat Inap',
			"emd"					=> 'Dari Rawat Darurat',
			"born"				=> 'Lahir di RS',
			"nursing"			=> 'Rujukan Panti Jompo',
			"psych"				=> 'Rujukan dari RS Jiwa',
			"rehab"				=> 'Rujukan Fasilitas Rehab',
			"other"				=> 'Lain-lain'
		];

		return $data;
	}

	function getMetodeBayar()
	{
		$data = [
			'00003' => "JKN",
			'00071' => "JAMINAN COVID-19",
			'00072' => "JAMINAN KIPI",
			'00073' => "JAMINAN BAYI BARU LAHIR",
			'00074' => "JAMINAN PERPANJANGAN MASA RAWAT",
			'00075' => "JAMINAN CO-INSIDENSE",
			'00076' => "JAMPERSAL",
			'00077' => "JAMINAN PEMULIHAN KESEHATAN PRIORITAS",
			'00005' => "JAMKESDA",
			'00001' => "PASIEN BAYAR"
		];

		return $data;
	}

	function getPayorCD($id)
	{
		$data = [
			[
				"id"    => "00003",
				"nama"  => "JKN",
				"kode"  => "JKN"
			],
			[
				"id"    => "00071",
				"nama"  => "JAMINAN COVID-19",
				"kode"  => "COVID-19"
			],
			[
				"id"    => "00072",
				"nama"  => "JAMINAN KIPI",
				"kode"  => "KIPI"
			],
			[
				"id"    => "00073",
				"nama"  => "JAMINAN BAYI BARU LAHIR",
				"kode"  => "BBL"
			],
			[
				"id"    => "00074",
				"nama"  => "JAMINAN PERPANJANGAN MASA RAWAT",
				"kode"  => "PMR"
			],
			[
				"id"    => "00075",
				"nama"  => "JAMINAN CO-INSIDENSE",
				"kode"  => "CO-INS"
			],
			[
				"id"    => "00076",
				"nama"  => "JAMPERSAL",
				"kode"  => "JPS"
			],
			[
				"id"    => "00077",
				"nama"  => "JAMINAN PEMULIHAN KESEHATAN PRIORITAS",
				"kode"  => "JPKP"
			],
			[
				"id"    => "00005",
				"nama"  => "JAMKESDA",
				"kode"  => "001"
			],
			[
				"id"    => "00001",
				"nama"  => "PASIEN BAYAR",
				"kode"  => "999"
			]
		];

		foreach ($data as $item) {
			if ($item['id'] === $id) {
				return $item['kode']; // Kembalikan hanya kode
			}
		}

		return null;
	}

	function getCaraPulang()
	{
		$data = [
			'1' => 'Atas Persetujuan Dokter',
			'2' => 'Dirujuk',
			'3' => 'Atas Permintaan Sendiri',
			'4' => 'Meninggal',
			'5' => 'Lain-lain'
		];

		return $data;
	}

	function getListCOB()
	{
		$data = [
			"" 		=> "-",
			"1" 	=> "MANDIRI INHEALTH",
			"5" 	=> "ASURANSI SINAR MAS",
			"6" 	=> "ASURANSI TUGU MANDIRI",
			"7" 	=> "ASURANSI MITRA MAPARYA",
			"8" 	=> "ASURANSI AXA MANDIRI FINANSIAL SERVICE",
			"9" 	=> "ASURANSI AXA FINANSIAL INDONESIA",
			"10" 	=> "LIPPO GENERAL INSURANCE",
			"11" 	=> "ARTHAGRAHA GENERAL INSURANSE",
			"12" 	=> "TUGU PRATAMA INDONESIA",
			"13" 	=> "ASURANSI BINA DANA ARTA",
			"14" 	=> "ASURANSI JIWA SINAR MAS MSIG",
			"15" 	=> "AVRIST ASSURANCE",
			"16" 	=> "ASURANSI JIWA SRAYA",
			"17" 	=> "ASURANSI JIWA CENTRAL ASIA RAYA",
			"18" 	=> "ASURANSI TAKAFUL KELUARGA",
			"19" 	=> "ASURANSI JIWA GENERALI INDONESIA",
			"20" 	=> "ASURANSI ASTRA BUANA",
			"21" 	=> "ASURANSI UMUM MEGA",
			"22" 	=> "ASURANSI MULTI ARTHA GUNA",
			"23" 	=> "ASURANSI AIA INDONESIA",
			"24" 	=> "ASURANSI JIWA EQUITY LIFE INDONESIA",
			"25" 	=> "ASURANSI JIWA RECAPITAL",
			"26" 	=> "GREAT EASTERN LIFE INDONESIA",
			"27" 	=> "ASURANSI ADISARANA WANAARTHA",
			"28" 	=> "ASURANSI JIWA BRINGIN JIWA SEJAHTERA",
			"29" 	=> "BOSOWA ASURANSI",
			"30" 	=> "MNC LIFE ASSURANCE",
			"31" 	=> "ASURANSI AVIVA INDONESIA",
			"32" 	=> "ASURANSI CENTRAL ASIA RAYA",
			"33" 	=> "ASURANSI ALLIANZ LIFE INDONESIA",
			"34" 	=> "ASURANSI BINTANG",
			"35" 	=> "TOKIO MARINE LIFE INSURANCE INDONESIA",
			"36" 	=> "MALACCA TRUST WUWUNGAN",
			"37" 	=> "ASURANSI JASA INDONESIA",
			"38" 	=> "ASURANSI JIWA MANULIFE INDONESIA",
			"39" 	=> "ASURANSI BANGUN ASKRIDA",
			"40" 	=> "ASURANSI JIWA SEQUIS FINANCIAL",
			"41" 	=> "ASURANSI AXA INDONESIA",
			"42" 	=> "BNI LIFE",
			"43" 	=> "ACE LIFE INSURANCE",
			"44" 	=> "CITRA INTERNATIONAL UNDERWRITERS",
			"45" 	=> "ASURANSI RELIANCE INDONESIA",
			"46" 	=> "HANWHA LIFE INSURANCE INDONESIA",
			"47" 	=> "ASURANSI DAYIN MITRA",
			"48" 	=> "ASURANSI ADIRA DINAMIKA",
			"49" 	=> "PAN PASIFIC INSURANCE",
			"50" 	=> "ASURANSI SAMSUNG TUGU",
			"51" 	=> "ASURANSI UMUM BUMI PUTERA MUDA 1967",
			"52" 	=> "ASURANSI JIWA KRESNA",
			"53" 	=> "ASURANSI RAMAYANA",
			"54" 	=> "VICTORIA INSURANCE",
			"55" 	=> "ASURANSI JIWA BERSAMA BUMIPUTERA 1912",
			"56" 	=> "FWD LIFE INDONESIA",
			"57" 	=> "ASURANSI TAKAFUL KELUARGA",
			"58" 	=> "ASURANSI TUGU KRESNA PRATAMA",
			"59" 	=> "SOMPO INSURANCE",
		];

		return $data;
	}

	function searchDiagnosis($data)
	{
		$ws_query = [
			"metadata" => [
				"method" => 'search_diagnosis'
			],
			"data" => [
				"keyword" 		=> $data['keyword']
			]
		];

		$json_request = json_encode($ws_query);

		// data yang akan dikirimkan dengan method POST adalah encrypted:
		$payload = $this->eklaim_bpjs->inacbg_encrypt($json_request);
		$response = $this->eklaim_bpjs->setUpCURL($payload);

		// hasil decrypt adalah format json, ditranslate kedalam array
		$msg = json_decode($response, true);

		return $msg;
	}

	function searchProcedures($data)
	{
		$ws_query = [
			"metadata" => [
				"method" => 'search_procedures'
			],
			"data" => [
				"keyword" 		=> $data['keyword']
			]
		];

		$json_request = json_encode($ws_query);

		// data yang akan dikirimkan dengan method POST adalah encrypted:
		$payload = $this->eklaim_bpjs->inacbg_encrypt($json_request);
		$response = $this->eklaim_bpjs->setUpCURL($payload);

		// hasil decrypt adalah format json, ditranslate kedalam array
		$msg = json_decode($response, true);

		return $msg;
	}

	function searchDiagnosisINA($data)
	{
		$ws_query = [
			"metadata" => [
				"method" => 'search_diagnosis_inagrouper'
			],
			"data" => [
				"keyword" 		=> $data['keyword']
			]
		];

		$json_request = json_encode($ws_query);

		// data yang akan dikirimkan dengan method POST adalah encrypted:
		$payload = $this->eklaim_bpjs->inacbg_encrypt($json_request);
		$response = $this->eklaim_bpjs->setUpCURL($payload);

		// hasil decrypt adalah format json, ditranslate kedalam array
		$msg = json_decode($response, true);

		return $msg;
	}

	function searchProceduresINA($data)
	{
		$ws_query = [
			"metadata" => [
				"method" => 'search_procedures_inagrouper'
			],
			"data" => [
				"keyword" 		=> $data['keyword']
			]
		];

		$json_request = json_encode($ws_query);

		// data yang akan dikirimkan dengan method POST adalah encrypted:
		$payload = $this->eklaim_bpjs->inacbg_encrypt($json_request);
		$response = $this->eklaim_bpjs->setUpCURL($payload);

		// hasil decrypt adalah format json, ditranslate kedalam array
		$msg = json_decode($response, true);

		return $msg;
	}

	function getAutoPasien($q, $start, $limit)
	{
		$limit = " limit " . $limit . " offset " . $start;
		$where = "";
		if ($q !== "") :
			$keyword = trim($q); // Hapus spasi di awal & akhir

			if (ctype_digit($keyword) && strlen($keyword) === 8) {
				// No. RM: hanya angka dan panjang 8
				$where = " AND p.id ILIKE '%" . $keyword . "%' ";
			} elseif (preg_match('/^[A-Z0-9]{19}$/i', $keyword)) {
				// No. SEP: 19 karakter alfanumerik (huruf & angka)
				$where = " AND pd.no_sep ILIKE '%" . $keyword . "%' ";
			} else {
				// Nama pasien: teks bebas
				$where = " AND p.nama ILIKE '%" . $keyword . "%' ";
			}

		endif;

		$count = "select count(p.id) as count ";
		$select = "select p.*, pd.no_polish ";
		$sql = "FROM sm_eklaim ek
						JOIN sm_pendaftaran pd on ek.id_pendaftaran = pd.id
						JOIN sm_penjamin pj on pd.id_penjamin = pj.id
						JOIN sm_pasien p on pd.id_pasien = p.id
						LEFT JOIN sm_pegawai pg on ek.coder_nik = pg.nik

						WHERE pd.no_sep is not null
						AND pj.id in ('1','16')
						$where ";
		$order = " order by p.id";

		$data['data'] = $this->db->query($select . $sql . $order . $limit)->result();
		$data['total'] = $this->db->query($count . $sql)->row()->count;
		$this->db->close();
		return $data;
	}

	function getDiagnosaEKlaim($limit, $start, $q)
	{
		$keyword = ['keyword' => $q];

		$formattedResponseData = [];
		$totalData = '0';
		$startIndex = '0';
		$endIndex = '0';

		// Ambil data dari searchDiagnosis
		$dataBridging = $this->searchDiagnosis($keyword);
		$totalData = $dataBridging['response']['count'];

		if (!empty($totalData)) {
			$responseData = array_slice($dataBridging['response']['data'], $start, $limit);
			$formattedResponseData = array_map(function ($item) {
				return [
					"nama" => $item[0],
					"kode" => $item[1]
				];
			}, $responseData);

			$startIndex = $start + 1;
			$endIndex = $start + count($formattedResponseData);
		}

		$data['data'] = $formattedResponseData;
		$data['jumlah'] = $totalData;
		$data['startIndex'] = $startIndex;
		$data['endIndex'] = $endIndex;

		// Mengembalikan data
		return $data;
	}

	function getProsedurEKlaim($limit, $start, $q)
	{
		$keyword = ['keyword' => $q];

		$formattedResponseData = [];
		$totalData = '0';
		$startIndex = '0';
		$endIndex = '0';

		// Ambil data dari searchDiagnosis
		$dataBridging = $this->searchProcedures($keyword);
		$totalData = $dataBridging['response']['count'];

		if (!empty($totalData)) {
			$responseData = array_slice($dataBridging['response']['data'], $start, $limit);
			$formattedResponseData = array_map(function ($item) {
				return [
					"nama" => $item[0],
					"kode" => $item[1]
				];
			}, $responseData);

			$startIndex = $start + 1;
			$endIndex = $start + count($formattedResponseData);
		}

		$data['data'] = $formattedResponseData;
		$data['jumlah'] = $totalData;
		$data['startIndex'] = $startIndex;
		$data['endIndex'] = $endIndex;

		// Mengembalikan data
		return $data;
	}

	function getDiagnosaEKlaimINA($limit, $start, $q)
	{
		$keyword = ['keyword' => $q];

		$formattedResponseData = [];
		$totalData = '0';
		$startIndex = '0';
		$endIndex = '0';

		// Ambil data dari searchDiagnosis
		$dataBridging = $this->searchDiagnosisINA($keyword);
		$totalData = $dataBridging['response']['count'];

		if (!empty($totalData)) {
			$responseData = array_slice($dataBridging['response']['data'], $start, $limit);
			$formattedResponseData = array_map(function ($item) {
				return [
					"nama" => $item['description'],
					"kode" => $item['code']
				];
			}, $responseData);

			$startIndex = $start + 1;
			$endIndex = $start + count($formattedResponseData);
		}

		$data['data'] = $formattedResponseData;
		$data['jumlah'] = $totalData;
		$data['startIndex'] = $startIndex;
		$data['endIndex'] = $endIndex;

		// Mengembalikan data
		return $data;
	}

	function getProsedurEKlaimINA($limit, $start, $q)
	{
		$keyword = ['keyword' => $q];

		$formattedResponseData = [];
		$totalData = '0';
		$startIndex = '0';
		$endIndex = '0';

		// Ambil data dari searchDiagnosis
		$dataBridging = $this->searchProceduresINA($keyword);
		$totalData = $dataBridging['response']['count'];

		if (!empty($totalData)) {
			$responseData = array_slice($dataBridging['response']['data'], $start, $limit);
			$formattedResponseData = array_map(function ($item) {
				return [
					"nama" => $item['description'],
					"kode" => $item['code']
				];
			}, $responseData);

			$startIndex = $start + 1;
			$endIndex = $start + count($formattedResponseData);
		}

		$data['data'] = $formattedResponseData;
		$data['jumlah'] = $totalData;
		$data['startIndex'] = $startIndex;
		$data['endIndex'] = $endIndex;

		// Mengembalikan data
		return $data;
	}

	function getAutoPetugasEklaim($q, $start, $limit)
	{
		$limit = " limit " . $limit . " offset " . $start;
		$w = "AND pg.nama ilike ('%$q%')";

		$sql = "SELECT DISTINCT ek.coder_nik AS id, CASE WHEN lower(pg.nama) LIKE 'dr.%' THEN 'dr. ' || INITCAP(TRIM(SUBSTRING(pg.nama FROM 5))) ELSE INITCAP(pg.nama) END AS nama,
						pg.nama as nama_coder
						FROM sm_eklaim AS ek
						JOIN sm_pegawai AS pg ON ek.coder_nik = pg.nik
						WHERE ek.coder_nik != ''
						$w order by pg.nama";
		$data['data'] = $this->db->query($sql . $limit)->result();
		$data['total'] = $this->db->query($sql)->num_rows();
		return $data;
	}
}
