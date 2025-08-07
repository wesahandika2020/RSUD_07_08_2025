<?php

class List_booking_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->datetime = date('Y-m-d');
	}

	public function listBooking($limit = 0, $start = 0, $search)
	{
		$result['data']   = $this->listListBooking($limit, $start, $search);
		$result['jumlah'] = $this->sqlListBooking($search)->get()->num_rows();

		return $result;
	}

	private function listListBooking($limit = 0, $start = 0, $search)
	{
		$this->sqlListBooking($search);
		if ($limit !== 0) {
			$this->db->limit($limit, $start);
		}

		return $this->db->get()->result();
	}

	private function sqlListBooking($search)
	{
		$this->db->select("ab.id as id_antrian_bpjs, ab.lokasi_data, ab.status as status_booking, ab.usia_pasien, ab.id_skd, ab.idskb, p.nama, p.no_identitas, p.id as no_rm, ab.nama_dokter, ab.id_dokter, ab.tanggal_kunjungan, s.nama as nama_poli, ab.kode_booking, p.telp, ab.nama_poli as id_poli, ab.id_penjamin, pj.nama nama_penjamin, lp.status_terlayani, pp.no_polish,
						ab.no_referensi, case when ab.jenis_kunjungan=1 then 'Rujukan FKTP' when ab.jenis_kunjungan=2 then 'Rujukan Internal' when ab.jenis_kunjungan=3 then 'Kontrol' when ab.jenis_kunjungan=4 then 'Rujukan Antar RS' Else NULL END jenis_kunjungan, case when ab.is_kontrol_pasca_ranap=1 then 'Ya' else 'Tidak' END pasca_ranap,
						(SELECT nama from sm_pegawai where id = ab.user_batal) user_batal, ab.waktu_batal, ab.id_jadwal_dokter, jd.shift_poli  ")
		         ->from('sm_antrian_bpjs ab')
		         ->join('sm_pasien p', 'ab.no_rm = p.id','left')
		         ->join('sm_spesialisasi s', 'ab.nama_poli = s.id')
		         ->join('sm_penjamin pj', 'ab.id_penjamin = pj.id','left')
				 ->join('sm_layanan_pendaftaran lp', 'lp.id_pendaftaran = ab.id_pendaftaran and lp.konsul=0', 'left')
				 ->join('sm_penjamin_pasien pp', 'pp.id_pasien = p.id and pp.id_penjamin=1', 'left')
				 ->join('sm_jadwal_dokter jd', 'jd.id = ab.id_jadwal_dokter', 'left');

		if($search['lokasi'] !== ''){
			$this->db->where('ab.lokasi_data', $search['lokasi']);
		}else{
			$this->db->where('ab.lokasi_data', 'APM');
		}
		
		if (($search['tanggal_awal'] !== '') & ($search['tanggal_akhir'] !== '')) {
			$this->db->where("ab.tanggal_kunjungan BETWEEN '".date2mysql($search['tanggal_awal'])."' AND '".date2mysql($search['tanggal_akhir'])."'");
		}

		if ($search['kode_booking'] !== '') {
			$this->db->like('ab.kode_booking', $search['kode_booking'], true);
		}

		if ($search['no_rm'] !== '') {
			$this->db->where('ab.no_rm', $search['no_rm'], true);
		}

		if ($search['nik'] !== '') {
			$this->db->where('p.no_identitas', $search['nik'], true);
		}

		if ($search['nm_poli'] !== '') {
			$this->db->where('ab.nama_poli', $search['nm_poli'], true);
		}

		if ($search['nm_dokter'] !== '') {
			$this->db->where('ab.id_dokter', $search['nm_dokter'], true);
		}

		if ($search['shift'] !== '') {
			$this->db->where('jd.shift_poli', $search['shift'], true);
		}
		
		$this->db->order_by('ab.tanggal_kunjungan', 'desc');
		return $this->db->order_by('p.id', 'asc');
	}

	public function save_log($data)
	{
		$this->db->insert('sm_list_booking_logs', $data);
	}
	
	function sqlListBookingExport($search)
	{
		$this->db->select("ab.id AS id_antrian_bpjs, ab.kode_booking, ab.tanggal_kunjungan, ab.create_date tgl_booking, ab.lokasi_data, ab.status AS status_booking, pj.nama penjamin, 
							s.nama AS nama_poli, jd.shift_poli, ab.nama_dokter, 
							p.no_identitas no_ktp, ab.no_kartu no_bpjs, ab.no_referensi, case when p.id is null then '(pasien baru)' else p.id end no_rm, p.nama,
							ab.no_hp, case when ab.no_hp <> p.telp then p.telp else null end no_hp2,
							case when ab.no_hp <>'' then CONCAT('https://wa.me/62', RIGHT(ab.no_hp, LENGTH(ab.no_hp) - 1)) else null end link_hp1,
							case when (p.telp <>'' AND ab.no_hp <> p.telp)  then CONCAT('https://wa.me/62', RIGHT(p.telp, LENGTH(p.telp) - 1)) else null end link_hp2, lp2.jenis_layanan  ", false)
		         ->from('sm_antrian_bpjs ab')
		         ->join('sm_pasien p', 'ab.no_rm = p.id','left')
		         ->join('sm_spesialisasi s', 'ab.nama_poli = s.id')
		         ->join('sm_penjamin pj', 'ab.id_penjamin = pj.id','left')
				 ->join('sm_layanan_pendaftaran lp', "(lp.id_pendaftaran = ab.id_pendaftaran and lp.konsul=0 AND lp.jenis_layanan='Poliklinik')", 'left')
				 ->join('sm_penjamin_pasien pp', 'pp.id_pasien = p.id and pp.id_penjamin=1', 'left')
				 ->join('sm_surat_kontrol sk', 'ab.id_skd=sk.id', 'left')
				 ->join('sm_layanan_pendaftaran lp2', 'sk.id_layanan_pendaftaran=lp2.id', 'left')
				 ->join('sm_jadwal_dokter jd', 'ab.id_jadwal_dokter=jd.id', 'left');
		
		if (($search['tanggal_awal'] !== '') & ($search['tanggal_akhir'] !== '')) {
			$this->db->where("ab.tanggal_kunjungan BETWEEN '".date2mysql($search['tanggal_awal'])."' AND '".date2mysql($search['tanggal_akhir'])."'");
		}

		if ($search['kode_booking'] !== '') {
			$this->db->like('ab.kode_booking', $search['kode_booking'], true);
		}

		if ($search['no_rm'] !== '') {
			$this->db->where('ab.no_rm', $search['no_rm'], true);
		}

		if ($search['nik'] !== '') {
			$this->db->where('p.no_identitas', $search['nik'], true);
		}

		if ($search['nm_poli'] !== '') {
			$this->db->where('ab.nama_poli', $search['nm_poli'], true);
		}

		if ($search['nm_dokter'] !== '') {
			$this->db->where('ab.id_dokter', $search['nm_dokter'], true);
		}
		
		if ($search['shift'] !== '') {
			$this->db->where('jd.shift_poli', $search['shift'], true);
		}
		
		$this->db->where("ab.status != 'Batal'");
		$this->db->order_by('s.nama', 'asc');
		$this->db->order_by('ab.kode_booking', 'asc');
		return $this->db->get()->result() ;
	}
}
