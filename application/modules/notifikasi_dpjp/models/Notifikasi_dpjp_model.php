<?php

class Notifikasi_dpjp_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->datetime = date('Y-m-d');
	}

	public function getPeriodeLaporan()
    {
        return array(
			'Default'		=> '',
			'Harian'        => 'Harian',
            'Bulanan'       => 'Bulanan',
            'Rentang Waktu' => 'Rentang Waktu',
        );
    }

	public function listDpjp($limit = 0, $start = 0, $search)
    {
        // Hitung jumlah data
        $query = $this->sqlNotifikasiDpjp($search);
        $result['jumlah'] = $query->count_all_results('', false); // False untuk menjaga query

        // Ambil data dengan paginasi
        $result['data'] = $this->listNotifikasiDpjp($limit, $start, $search);

		// untuk lihat query terakhir
		// echo $this->db->last_query();die;
        
		return $result;
    }

	public function listNotifikasiDpjp($limit = 0, $start = 0, $search)
	{
		$query = $this->sqlNotifikasiDpjp($search);

		if ($limit !== 0) {
			$query->limit($limit, $start);
		}

		// $this->db->last_query();die;

		// Kembalikan hasil
		return $query->get()->result();
	}

	public function sqlNotifikasiDpjp($search)
	{
		// Bersihkan query builder
		$this->db->reset_query();

		// Menentukan periode laporan
		$periode = "";
		if ($search["periode_laporan"] === "Bulanan") {
			$bulanArray = [
				'01' => 'Januari', '02' => 'Februari', '03' => 'Maret',
				'04' => 'April', '05' => 'Mei', '06' => 'Juni',
				'07' => 'Juli', '08' => 'Agustus', '09' => 'September',
				'10' => 'Oktober', '11' => 'November', '12' => 'Desember'
			];
			if (!empty($search["bulan"]) && !empty($search["tahun"])) {
				$periode = $bulanArray[$search["bulan"]] . " " . $search["tahun"];
			}
		} elseif ($search["periode_laporan"] === "Harian") {
			$periode = get_date_format(date2mysql($search['tanggal_harian']));
		} elseif ($search["periode_laporan"] === "Rentang Waktu") {
			$periode = get_date_format(date2mysql($search['tanggal_awal'])) . " s.d " . get_date_format(date2mysql($search['tanggal_akhir']));
		}

		// Menghitung kemarin jam 07:00 dan hari ini jam 06:59
		$kemarinJam7 = date('Y-m-d 07:00:00', strtotime('yesterday'));
		$hariIniJam6_59 = date('Y-m-d 06:59:59', strtotime('today'));

		// Menyiapkan subquery untuk mengambil dokter dengan tanggal layanan terakhir
		$this->db->select('
			lp.id_dokter,
			d.nama AS nama_dokter,
			d.hp AS hp_dokter,
			n.status as status_kirim,
			MAX(lp.tanggal_layanan) AS tanggal_layanan
		');
		$this->db->from('sm_rawat_inap AS r');
		$this->db->join('sm_layanan_pendaftaran AS lp', 'lp.id = r.id_layanan_pendaftaran');
		$this->db->join('sm_pendaftaran AS pd', 'pd.id = lp.id_pendaftaran');
		$this->db->join('sm_tenaga_medis AS tm', 'tm.id = lp.id_dokter', 'left');
		$this->db->join('sm_pegawai AS d', 'd.id = tm.id_pegawai', 'left');
		$this->db->join('sm_notif_dpjp AS n', 'n.id_dokter = lp.id_dokter', 'left');

		// Filter dokter
		if (!empty($search['id_dokter'])) {
			$this->db->where('lp.id_dokter', $search['id_dokter']);
		}

		// Filter berdasarkan periode jika ada
		if ($search["periode_laporan"] === "Default") {
			// Cek jika periode_laporan adalah Default, gunakan rentang waktu default
			$this->db->where("r.waktu_masuk BETWEEN '" . $kemarinJam7 . "' AND '" . $hariIniJam6_59 . "'");
		} elseif ($search["periode_laporan"] === "Rentang Waktu" && !empty($search['tanggal_awal']) && !empty($search['tanggal_akhir'])) {
			$this->db->where("DATE(r.waktu_masuk) BETWEEN '" . date2mysql($search['tanggal_awal']) . "' AND '" . date2mysql($search['tanggal_akhir']) . "'");
		} elseif ($search["periode_laporan"] === "Bulanan" && !empty($search["bulan"]) && !empty($search["tahun"])) {
			$this->db->where("EXTRACT(MONTH FROM r.waktu_masuk) = " . $search["bulan"]);
			$this->db->where("EXTRACT(YEAR FROM r.waktu_masuk) = " . $search["tahun"]);
		} elseif ($search["periode_laporan"] === "Harian" && !empty($search['tanggal_harian'])) {
			$this->db->where('DATE(r.waktu_masuk)', date2mysql($search['tanggal_harian']));
		}

		$this->db->group_by('lp.id_dokter, d.nama, d.hp, n.status');
		$this->db->order_by('tanggal_layanan', 'DESC');

		return $this->db;
	}

	public function getPasienNotifDpjp($id_dokter, $tanggal)
	{
		// Bersihkan query builder
		$this->db->reset_query();

		// Mengambil jam dari parameter $tanggal
		$jam = date('H', strtotime($tanggal));

		if ($jam >= 7) {
			// Jika waktu sudah lewat jam 7:00, ambil data mulai jam 07:00 pada tanggal yang diberikan
			$mulaiJam = date('Y-m-d 07:00:00', strtotime($tanggal));  // Tanggal mulai: jam 07:00 pada tanggal yang diberikan
			$selesaiJam = date('Y-m-d 06:59:59', strtotime($tanggal . ' +1 day'));  // Tanggal selesai: jam 06:59 pada hari berikutnya
		} else {
			// Jika waktu sebelum jam 7:00, ambil data mulai jam 07:00 pada tanggal sebelumnya
			$mulaiJam = date('Y-m-d 07:00:00', strtotime($tanggal . ' -1 day'));  // Tanggal mulai: jam 07:00 pada hari sebelumnya
			$selesaiJam = date('Y-m-d 06:59:59', strtotime($tanggal));  // Tanggal selesai: jam 06:59 pada tanggal yang diberikan
		}

		// Menyiapkan query
		$this->db->select('
			lp.id AS id_layanan,
			r.waktu_masuk AS tanggal,
			lp.id_dokter,
			d.nama AS nama_dokter,
			d.hp AS hp_dokter,
			p.id AS nomor_rm,
			p.nama AS nama_pasien,
			b.nama AS kamar
		');
		$this->db->from('sm_rawat_inap AS r');
		$this->db->join('sm_layanan_pendaftaran AS lp', 'lp.id = r.id_layanan_pendaftaran');
		$this->db->join('sm_pendaftaran AS pd', 'pd.id = lp.id_pendaftaran');
		$this->db->join('sm_pasien AS p', 'p.id = pd.id_pasien');
		$this->db->join('sm_tenaga_medis AS tm', 'tm.id = lp.id_dokter', 'left');
		$this->db->join('sm_pegawai AS d', 'd.id = tm.id_pegawai', 'left');
		$this->db->join('sm_bangsal AS b', 'b.id = r.id_bangsal', 'left');

		// Tambahkan filter berdasarkan id dokter dan rentang waktu
		$this->db->where('lp.id_dokter', $id_dokter);
		$this->db->where('r.waktu_masuk >=', $mulaiJam);  // Waktu mulai
		$this->db->where('r.waktu_masuk <=', $selesaiJam);  // Waktu selesai

		$this->db->order_by('r.waktu_masuk', 'DESC');

		// Kembalikan query
		return $this->db->get()->result();
	}


	// public function save_log($data)
	// {
	// 	$this->db->insert('sm_notifikasi_dpjp_logs', $data);
	// }
	
	// function sqlNotifikasiDpjpExport($search)
	// {
	// 	$this->db->select("ab.id AS id_antrian_bpjs, ab.kode_booking, ab.tanggal_kunjungan, ab.create_date tgl_booking, ab.lokasi_data, ab.status AS status_booking, pj.nama penjamin, s.nama AS nama_poli, ab.nama_dokter, 
	// 						p.no_identitas no_ktp, pp.no_polish no_bpjs, case when p.id is null then '(pasien baru)' else p.id end no_rm, p.nama,
	// 						ab.no_hp, case when ab.no_hp <> p.telp then p.telp else null end no_hp2,
	// 						case when ab.no_hp <>'' then CONCAT('https://wa.me/62', RIGHT(ab.no_hp, LENGTH(ab.no_hp) - 1)) else null end link_hp1,
	// 						case when (p.telp <>'' AND ab.no_hp <> p.telp)  then CONCAT('https://wa.me/62', RIGHT(p.telp, LENGTH(p.telp) - 1)) else null end link_hp2  ", false)
	// 	         ->from('sm_antrian_bpjs ab')
	// 	         ->join('sm_pasien p', 'ab.no_rm = p.id')
	// 	         ->join('sm_spesialisasi s', 'ab.nama_poli = s.id')
	// 	         ->join('sm_penjamin pj', 'ab.id_penjamin = pj.id','left')
	// 			 ->join('sm_layanan_pendaftaran lp', 'lp.id_pendaftaran = ab.id_pendaftaran and lp.konsul=0', 'left')
	// 			 ->join('sm_penjamin_pasien pp', 'pp.id_pasien = p.id and pp.id_penjamin=1', 'left');
		
	// 	if (($search['tanggal_awal'] !== '') & ($search['tanggal_akhir'] !== '')) {
	// 		$this->db->where("ab.tanggal_kunjungan BETWEEN '".date2mysql($search['tanggal_awal'])."' AND '".date2mysql($search['tanggal_akhir'])."'");
	// 	}

	// 	if ($search['kode_booking'] !== '') {
	// 		$this->db->like('ab.kode_booking', $search['kode_booking'], true);
	// 	}

	// 	if ($search['no_rm'] !== '') {
	// 		$this->db->where('ab.no_rm', $search['no_rm'], true);
	// 	}

	// 	if ($search['nik'] !== '') {
	// 		$this->db->where('p.no_identitas', $search['nik'], true);
	// 	}

	// 	if ($search['nm_poli'] !== '') {
	// 		$this->db->where('ab.nama_poli', $search['nm_poli'], true);
	// 	}

	// 	if ($search['nm_dokter'] !== '') {
	// 		$this->db->where('ab.id_dokter', $search['nm_dokter'], true);
	// 	}
		
	// 	$this->db->order_by('ab.create_date', 'asc');
	// 	return $this->db->get()->result() ;
	// }
}
