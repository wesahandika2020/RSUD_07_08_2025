<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengkodean_icd_x extends SYAM_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('App_model', 'm_default');
		$this->load->model('Masterdata_model', 'm_masterdata');

		$this->load->model('Masterdata_model', 'auto');
		$this->load->model('opendata/Opendata_model', 'opendata');
		$this->load->model('pendaftaran/Pendaftaran_model', 'klinik');
		$this->load->model('rekam_medis/Rekam_medis_model', 'rekam_medis');
		$this->load->model('rawat_inap/Rawat_inap_model', 'm_rawat_inap');
		$this->load->model('eklaim_bpjs/Eklaim_bpjs_auto_model', 'eklaim_bpjs_auto');
	}

	function index()
	{
		$data['active'] = 'Pengkodean ICD X';
		$data['modules'] = $this->m_default->getDataModules($this->session->userdata('id_account_group'));
		$is_login = $this->session->userdata('is_login');

		if ($is_login === true) :
			$data['hospital'] = $this->m_default->getDataHospital();
			$this->load->view('layouts/index', $data);
		else :
			redirect('/');
		endif;
	}

	function page_pengkodean_icd_x()
	{
		$data['kunjungan'] = array(
			'Jalan'	=> 'Rawat Jalan',
			'Inap'	=> 'Rawat Inap'
		);
		$data['cara_masuk'] = $this->eklaim_bpjs_auto->getCaraMasukEklaim();
		$data['cob_list'] = $this->eklaim_bpjs_auto->getListCOB();
		$data['metode_bayar'] = $this->eklaim_bpjs_auto->getMetodeBayar();
		$data['cara_pulang'] = $this->eklaim_bpjs_auto->getCaraPulang();
		$data['kode_tarif'] = $this->eklaim_bpjs_auto->getKodeTarif();

		$this->load->view('pengkodean_icd_x/index', $data);
	}

	function page_soapier()
	{
		$this->load->view('pengkodean_icd_x/soapier/index');
	}

	function page_tindakan()
	{
		$this->load->view('pengkodean_icd_x/tindakan/index');
	}

	function page_diagnosa()
	{
		$this->load->view('pengkodean_icd_x/diagnosa/index');
	}

	function page_resep()
	{
		$this->load->view('pengkodean_icd_x/resep/index');
	}

	function page_anamnesa()
	{
		$this->load->view('pengkodean_icd_x/anamnesa/index');
	}


	function filterOlower($text)
	{

		$filter = trim(preg_replace('/[\t\n\r\s]+/', ' ', $text));

		return $filter;
	}

	function cetak_resume_medis_ranap($id, $id_daftar, $type = null)
	{
		$this->load->model('rawat_inap/Rawat_inap_model', 'm_rawat_inap');

		if (!$id && !$id_daftar) :
			exit();
		endif;

		if ($id !== null && $id_daftar !== null) :
			$data['pemeriksaan_fisik'] = '';
			$data['diagnosa_utama'] = '';
			$data['diagnosa_sekunder'] = '';
			$data['diagnosa_manual_utama'] = '';
			$data['diagnosa_manual_sekunder'] = '';
			$data['diagnosa_utama_instalasi_lainnya'] = '';
			$data['pengobatan'] = '';
			$data['s_soap'] = '';
			$data['o_soap'] = '';
			$data['a_soap'] = '';
			$data['p_soap'] = '';
			$data['subject'] = '';
			$data['objective'] = '';
			$data['assessment'] = '';
			$data['plan'] = '';
			$data['keluhan_utama'] = '';
			$data['tindakan'] = '';
			$data['tindakan_ok'] = '';
			$data['tindakan_lab'] = '';
			$data['tindakan_rad'] = '';
			$data['diet'] = '';

			$data['pasien'] = $this->db->select(" ps.id no_rm, ps.nama nama_pasien,ps.tanggal_lahir, case when ps.kelamin='P' then 'Perempuan' else 'Laki-Laki' end kelamin, pd.tanggal_daftar, pd.tanggal_keluar,pj.nama as penjamin, ps.alergi, sp.nama as ruang_asal, pg.nama dokter_dpjp, pg.tanda_tangan, pd.jenis_rawat, lp.tindak_lanjut, lp.jenis_layanan, rms.diagnosa_awal_masuk, rms.hasil_konsultasi, rms.pending_lab ")
				->from('sm_pasien ps')
				->join('sm_pendaftaran pd', 'ps.id=pd.id_pasien')
				->join('sm_layanan_pendaftaran lp', 'pd.id=lp.id_pendaftaran')
				->join('sm_resume_medis_ranap as rms', 'rms.id_layanan_pendaftaran = lp.id', 'left')
				->join('sm_spesialisasi as sp', 'sp.id = lp.id_unit_layanan', 'left')
				->join('sm_penjamin as pj', 'pj.id = pd.id_penjamin', 'left')
				->join('sm_tenaga_medis tm', 'lp.id_dokter = tm.id', 'left')
				->join('sm_pegawai pg', 'tm.id_pegawai = pg.id', 'left')
				->where('lp.id', $id, true)
				->get()
				->row();

			$data['kajian_medis'] = $this->m_rawat_inap->getKajianMedis($id);

			$data['kajian_perawatan'] = $this->m_rawat_inap->getKajianKeperawatan($id);

			$data['rawat_inap'] = $this->db->select('ri.*, bg.nama as nama_bangsal, k.nama as nama_kelas, pj.nama as penjamin, pa.nama as nama_pasien, pd.no_register, pa.tanggal_lahir, pa.kelamin, lp.tindak_lanjut as status, lp.kondisi')
				->from('sm_rawat_inap as ri')
				->join('sm_layanan_pendaftaran as lp', 'lp.id = ri.id_layanan_pendaftaran')
				->join('sm_pendaftaran as pd', 'pd.id = lp.id_pendaftaran')
				->join('sm_pasien as pa', 'pa.id = pd.id_pasien')
				->join('sm_bangsal as bg', 'bg.id = ri.id_bangsal')
				->join('sm_kelas as k', 'k.id = ri.id_kelas')
				->join('sm_penjamin as pj', 'pj.id = ri.id_penjamin', 'left')
				->where('lp.id', $id, true)
				->get()
				->row();

			$data['intensive_care'] = $this->db->select('ri.*, bg.nama as nama_bangsal, k.nama as nama_kelas, pj.nama as penjamin, pa.nama as nama_pasien, pd.no_register, pa.tanggal_lahir, pa.kelamin, lp.tindak_lanjut as status, lp.kondisi')
				->from('sm_intensive_care as ri')
				->join('sm_layanan_pendaftaran as lp', 'lp.id = ri.id_layanan_pendaftaran')
				->join('sm_pendaftaran as pd', 'pd.id = lp.id_pendaftaran')
				->join('sm_pasien as pa', 'pa.id = pd.id_pasien')
				->join('sm_bangsal as bg', 'bg.id = ri.id_bangsal')
				->join('sm_kelas as k', 'k.id = ri.id_kelas')
				->join('sm_penjamin as pj', 'pj.id = ri.id_penjamin', 'left')
				->where('lp.id', $id, true)
				->get()
				->row();

			$data['kajian_ranap'] = $this->db->select('kmr.*, kmr.keluhan_utama, kmr.riwayat_penyakit_sekarang, kmr.riwayat_penyakit_terdahulu, riwayat_penyakit_keluarga, kmr.pengobatan, kmr.riwayat, kmr.hasil_laboratorium, kmr.hasil_radiologi, kmr.hasil_penunjang_lain, kmr.diagnosa_awal ')
				->from('sm_kajian_medis_ranap as kmr')
				->join('sm_layanan_pendaftaran as lp', 'lp.id = kmr.id_layanan_pendaftaran')
				->where('lp.id', $id, true)
				->get()
				->row();

			$data['kajian_icare'] = $this->db->select('kmr.*, kmr.keluhan_utama, kmr.riwayat_penyakit_sekarang, kmr.riwayat_penyakit_terdahulu, riwayat_penyakit_keluarga, kmr.pengobatan, kmr.riwayat, kmr.hasil_laboratorium, kmr.hasil_radiologi, kmr.hasil_penunjang_lain, kmr.diagnosa_awal ')
				->from('sm_kajian_medis_icare as kmr')
				->join('sm_layanan_pendaftaran as lp', 'lp.id = kmr.id_layanan_pendaftaran')
				->where('lp.id', $id, true)
				->get()
				->row();

			$data['anamnesa'] = $this->db->select(" keluhan_utama, riwayat_penyakit_sekarang, riwayat_penyakit_dahulu, riwayat_penyakit_keluarga, anamnesa_sosial, pemeriksaan_penunjang, keadaan_umum, kesadaran, gcs, rr, suhu, tensi_sistolik as sistolik, tensi_diastolik as diastolik, nadi, nps, tinggi_badan, berat_badan, kepala, leher, thorax, pulmo, cor, abdomen, genitalia, ekstrimitas, usul_tindak_lanjut, s_soap, o_soap, a_soap, p_soap ")
				->from('sm_anamnesa an')
				->join('sm_layanan_pendaftaran lp', 'an.id_layanan_pendaftaran=lp.id')
				->join('sm_pendaftaran p', 'p.id=lp.id_pendaftaran', 'left')
				->where('lp.id', $id, true)
				->get()
				->row();

			if ($data['anamnesa'] != NULL) {
				$anam = $data['anamnesa'];
				$data['s_soap'] = 'S: ' . $anam->s_soap;
				$data['o_soap'] = 'O: ' . $anam->o_soap;
				$data['a_soap'] = 'A: ' . $anam->a_soap;
				$data['p_soap'] = 'P: ' . $anam->p_soap;
			}

			//Punya yang baru (Lama)
			$terapi1 = $this->db->select("tp.*, b.nama_lengkap as nama_obat")
				->from('sm_resume_medis_terapi_pulang as tp')
				->join('sm_barang as b', 'b.id = tp.obat')
				->where('tp.id_layanan_pendaftaran', $id, true)
				->get()
				->result();

			// Baru
			$terapi2 = $this->m_rawat_inap->getObatTerapiPulang($id);

			$data['terapi_pulang'] = array_merge($terapi2, $terapi1);

			$data['soap'] = $this->db->select(" subject, objective, assessment, plan ")
				->from('sm_soap so')
				->join('sm_layanan_pendaftaran lp', 'so.id_layanan_pendaftaran=lp.id')
				->join('sm_pendaftaran p', 'p.id=lp.id_pendaftaran', 'left')
				->where('lp.id', $id, true)
				->get()
				->row();

			$data['soap'] = $this->db->select(" subject, objective, assessment, plan ")
				->from('sm_soap so')
				->join('sm_layanan_pendaftaran lp', 'so.id_layanan_pendaftaran=lp.id')
				->join('sm_pendaftaran p', 'p.id=lp.id_pendaftaran', 'left')
				->where('lp.id', $id, true)
				->get()
				->row();

			if ($data['soap'] != NULL) {
				$soap = $data['soap'];
				$data['subject'] = 'S: ' . $soap->subject;
				$data['objective'] = 'O: ' . $soap->objective;
				$data['assessment'] = 'A: ' . $soap->assessment;
				$data['plan'] = 'P: ' . $soap->plan;
			}

			if ($data['kajian_perawatan'] != NULL) {
				if ($data['kajian_perawatan']->alergi != NULL) {
					$data['kajian_perawatan']->alergi == 0 ? $data['kajian_perawatan']->alergi == 'Tidak Ada' : 'Ada';
				}

				$encodeKesadaran = json_decode($data['kajian_perawatan']->kesadaran);

				if ($encodeKesadaran->composmentis == 1) {
					$kesadaran = 'Composmentis';
				} else if ($encodeKesadaran->apatis == 1) {
					$kesadaran = 'Apatis';
				} else if ($encodeKesadaran->samnolen == 1) {
					$kesadaran = 'Samnolen';
				} else if ($encodeKesadaran->sopor == 1) {
					$kesadaran = 'Sopor';
				} else if ($encodeKesadaran->koma == 1) {
					$kesadaran = 'Koma';
				} else if ($encodeKesadaran->koma == NULL) {
					$kesadaran = '';
				}

				$gcs = $encodeKesadaran->gcs_e || $encodeKesadaran->gcs_m || $encodeKesadaran->gcs_v;

				$data['pemeriksaan_fisik'] = 'Kesadaran: ' . $kesadaran . ', GCS: ' . $gcs . ', E: ' . $encodeKesadaran->gcs_e . ', M: ' . $encodeKesadaran->gcs_m . ', V:' . $encodeKesadaran->gcs_v . ', TD: ' . $data['kajian_perawatan']->tensi_sistolik_awal . '/' . $data['kajian_perawatan']->tensi_diastolik_awal . 'mmHg, RR: ' . $data['kajian_perawatan']->nafas_awal . ' x/m, N: ' . $data['kajian_perawatan']->nadi_awal . ' x/m, T: ' . $data['kajian_perawatan']->suhu_awal . 'c';
			}

			$resume_keperawatan = $this->db->select('rk.diet_khusus')
				->from('sm_resume_keperawatan as rk')
				->where('rk.id_layanan_pendaftaran', $id, true)
				->get()
				->row();

			if ($resume_keperawatan != NULL) {
				$encodeDietKhusus = json_decode($resume_keperawatan->diet_khusus);

				$data['diet'] = $encodeDietKhusus->diet_khusus;
			}


			if ($data['pasien']->alergi != NULL) {
				$data['pasien']->alergi == 0 ? $data['pasien']->alergi == 'Tidak Ada' : 'Ada';
			}

			$data['asal_ruangan'] = $this->db->select("");

			if ($data['anamnesa'] != NULL) {
				$anam = $data['anamnesa'];
				$data['pemeriksaan'] = 'Kesadaran: ' . $anam->kesadaran . ', GCS: ' . $anam->gcs;
			}

			$cek_daftar = $this->m_rawat_inap->cekDaftar($id_daftar);

			if (!empty($cek_daftar)) {

				$idLayanan = (int)$cek_daftar[0]->id;
				$diagnosaUtama = $this->m_rawat_inap->getDiagnosaUtama($idLayanan);
				$diagnosaUtamaManual = $this->m_rawat_inap->getDiagnosaManualAwal($idLayanan);

				if (!empty($diagnosaUtama[0]->nama)) {

					$data['diagnosa_awal'] = $diagnosaUtama[0]->nama;
				} else {

					$data['diagnosa_awal'] = null;
				}

				if (isset($diagnosaUtamaManual[0]->nama_manual)) {

					$data['diag_manual'] = $diagnosaUtamaManual[0]->nama_manual;
				} else {

					$data['diag_manual'] = null;
				}
			} else {

				$diagnosaUtama = $this->m_rawat_inap->getDiagnosaUtama($id);
				$diagnosaUtamaManual = $this->m_rawat_inap->getDiagnosaManualAwal($id);

				if (!empty($diagnosaUtama[0]->nama)) {

					$data['diagnosa_awal'] = $diagnosaUtama[0]->nama;
				} else {

					$data['diagnosa_awal'] = null;
				}

				if (isset($diagnosaUtamaManual[0]->nama_manual)) {

					$data['diag_manual'] = $diagnosaUtamaManual[0]->nama_manual;
				} else {

					$data['diag_manual'] = null;
				}
			}

			$diagnosa_utamas = $this->db->select(" concat_ws ('. ', ( SELECT gss.kode_icdx_rinci FROM sm_golongan_sebab_sakit AS gss WHERE gss.ID = d.id_pengkodean ), ( SELECT gss.kode_icdx_rinci FROM sm_golongan_sebab_sakit AS gss WHERE gss.ID = d.id_pengkodean_asterik ), gss.nama ) AS nama, lp.id as id_layanan_pendaftaran ")
				->from('sm_diagnosa as d')
				->join('sm_golongan_sebab_sakit as gss', 'gss.id = d.id_golongan_sebab_sakit', 'left')
				->join('sm_layanan_pendaftaran as lp', 'lp.id = d.id_layanan_pendaftaran', 'left')
				->join('sm_pendaftaran as pd', 'pd.id = lp.id_pendaftaran', 'left')
				->where('lp.id_pendaftaran', $id_daftar, true)
				->where('d.prioritas', 'Utama')
				->where('d.diagnosa_manual <>', '1')
				->order_by('lp.id', 'desc')
				->limit(1)
				->get()
				->result();

			//			foreach ($diagnosa_utamas as $diagnosa_utama) {
			//				$data['diagnosa_utama'] .= $diagnosa_utama->nama . '. ' . '<br>';
			//			}

			$diagnosa_manual_utamas = $this->db->select(" concat_ws ('. ', ( SELECT gss.kode_icdx_rinci FROM sm_golongan_sebab_sakit AS gss WHERE gss.ID = d.id_pengkodean ), ( SELECT gss.kode_icdx_rinci FROM sm_golongan_sebab_sakit AS gss WHERE gss.ID = d.id_pengkodean_asterik ), d.golongan_sebab_sakit_lain ) AS nama, lp.id as id_layanan_pendaftaran ")
				->from('sm_diagnosa as d')
				->join('sm_layanan_pendaftaran as lp', 'lp.id = d.id_layanan_pendaftaran', 'left')
				->join('sm_pendaftaran as pd', 'pd.id = lp.id_pendaftaran', 'left')
				->where('lp.id_pendaftaran', $id_daftar, true)
				->where('d.prioritas', 'Utama')
				->where('d.diagnosa_manual', '1')
				->where("lp.jenis_layanan not in('Poliklinik', 'IGD')")
				->order_by('lp.id', 'desc')
				->limit(1)
				->get()
				->result();

			//			foreach ($diagnosa_manual_utamas as $diagnosa_manual_utama) {
			//				$data['diagnosa_manual_utama'] .= $diagnosa_manual_utama->nama . '. ' . '<br>';
			//			}

			$data['diagnosa_utama'] = array_merge($diagnosa_utamas, $diagnosa_manual_utamas);
			usort($data['diagnosa_utama'], function ($a, $b) {
				return strcmp($b->id_layanan_pendaftaran, $a->id_layanan_pendaftaran);
			});

			$diagnosa_sekunders = $this->db->select("distinct concat_ws ('. ', ( SELECT gss.kode_icdx_rinci FROM sm_golongan_sebab_sakit AS gss WHERE gss.ID = d.id_pengkodean ), ( SELECT gss.kode_icdx_rinci FROM sm_golongan_sebab_sakit AS gss WHERE gss.ID = d.id_pengkodean_asterik ), gss.nama ) AS nama ")
				->from('sm_diagnosa as d')
				->join('sm_golongan_sebab_sakit as gss', 'gss.id = d.id_golongan_sebab_sakit', 'left')
				->join('sm_layanan_pendaftaran as lp', 'lp.id = d.id_layanan_pendaftaran', 'left')
				->join('sm_pendaftaran as pd', 'pd.id = lp.id_pendaftaran', 'left')
				->where('lp.id_pendaftaran', $id_daftar, true)
				->where('d.prioritas', 'Sekunder')
				->where('d.diagnosa_manual <>', '1')
				// ->where('lp.jenis_layanan', 'Rawat Inap')
				->get()
				->result();

			foreach ($diagnosa_sekunders as $diagnosa_sekunder) {
				$data['diagnosa_sekunder'] .= $diagnosa_sekunder->nama . '. ' . '<br>';
			}

			$diagnosa_manual_sekunders = $this->db->select("distinct concat_ws ('. ', ( SELECT gss.kode_icdx_rinci FROM sm_golongan_sebab_sakit AS gss WHERE gss.ID = d.id_pengkodean ), ( SELECT gss.kode_icdx_rinci FROM sm_golongan_sebab_sakit AS gss WHERE gss.ID = d.id_pengkodean_asterik ), d.golongan_sebab_sakit_lain ) AS nama ")
				->from('sm_diagnosa as d')
				->join('sm_layanan_pendaftaran as lp', 'lp.id = d.id_layanan_pendaftaran', 'left')
				->join('sm_pendaftaran as pd', 'pd.id = lp.id_pendaftaran', 'left')
				->where('lp.id_pendaftaran', $id_daftar, true)
				->where('d.prioritas', 'Sekunder')
				->where('d.diagnosa_manual', '1')
				// ->where('lp.jenis_layanan', 'Rawat Inap')
				->get()
				->result();

			foreach ($diagnosa_manual_sekunders as $diagnosa_manual_sekunder) {
				$data['diagnosa_manual_sekunder'] .= $diagnosa_manual_sekunder->nama . '. ' . '<br>';
			}

			$diagnosa_utama_instalasi_lainnya = $this->db->query(" select concat_ws ('. ', ( SELECT gss.kode_icdx_rinci FROM sm_golongan_sebab_sakit AS gss WHERE gss.id = d.id_pengkodean ), ( SELECT gss.kode_icdx_rinci FROM sm_golongan_sebab_sakit AS gss WHERE gss.id = d.id_pengkodean_asterik ), d.golongan_sebab_sakit_lain ) AS nama  , lp.id as id_layanan_pendaftaran
				from sm_diagnosa d
				join sm_layanan_pendaftaran lp ON lp.id = d.id_layanan_pendaftaran 
				join sm_pendaftaran pd ON pd.id = lp.id_pendaftaran 
				where lp.id_pendaftaran = '" . $id_daftar . "'
				and lp.jenis_layanan not in('Poliklinik', 'IGD')
				and d.prioritas = 'Utama'")->result();

			$layananDeleted = $diagnosa_utamas[0]->id_layanan_pendaftaran ?? $diagnosa_manual_utamas[0]->id_layanan_pendaftaran ?? null;

			$filter_duil = array_values(array_filter($diagnosa_utama_instalasi_lainnya, function ($value) use ($layananDeleted) {
				return $value->id_layanan_pendaftaran != $layananDeleted;
			}));

			foreach ($filter_duil as $value) {
				$data['diagnosa_utama_instalasi_lainnya'] .= $value->nama . '. ' . '<br>';
			}

			// $pengobatans = $this->db->distinct("concat ( br.nama_lengkap, ' (', case when rs.aturan_pakai_manual is not null or rs.aturan_pakai_manual != '0' then rs.aturan_pakai_manual else rs.aturan_pakai end, ')', CASE WHEN rs.keterangan_resep IS NULL THEN '' ELSE concat(' Keterangan Resep: ', rs.keterangan_resep) END ) AS nama")
			// 	->from('sm_resep_r_detail as rsd')
			// 	->join('sm_resep_r as rs', 'rs.id = rsd.id_resep_r', 'left')
			// 	->join('sm_resep as rp', 'rp.id = rs.id_resep', 'left')
			// 	->join('sm_barang as br', 'br.id = rsd.id_barang', 'left')
			// 	->join('sm_layanan_pendaftaran as lp', 'lp.id = rp.id_layanan_pendaftaran', 'left')
			// 	->join('sm_pendaftaran as pd', 'pd.id = lp.id_pendaftaran', 'left')
			// 	->where('lp.id_pendaftaran', $id_daftar, true)
			// 	->where('br.id_kategori', '1')
			// 	->get()
			// 	->result();

			$pengobatans = $this->db->select("concat ( br.nama_lengkap, ' (', case when rs.aturan_pakai_manual is not null and rs.aturan_pakai_manual != '0' then rs.ket_aturan_pakai_manual else rs.aturan_pakai end, ')' ) AS nama")
				->from('sm_resep_r_detail as rsd')
				->join('sm_resep_r as rs', 'rs.id = rsd.id_resep_r', 'left')
				->join('sm_resep as rp', 'rp.id = rs.id_resep', 'left')
				->join('sm_barang as br', 'br.id = rsd.id_barang', 'left')
				->join('sm_layanan_pendaftaran as lp', 'lp.id = rp.id_layanan_pendaftaran', 'left')
				->join('sm_pendaftaran as pd', 'pd.id = lp.id_pendaftaran', 'left')
				->where('lp.id_pendaftaran', $id_daftar, true)
				->where('br.id_kategori', '1')
				->get()
				->result();

			foreach ($pengobatans as $pengobatan) {

				$obatKecil = $pengobatan->nama;

				$spasiPengobatan[] = $this->filterOlower($obatKecil);
			}

			if (isset($spasiPengobatan)) {

				if ($spasiPengobatan !== null) {

					$filterNamaObat = array_unique($spasiPengobatan);


					foreach ($filterNamaObat as $obat) {

						$data['pengobatan'] .= $obat . '. ';
					}
				}
			} else {

				$data['pengobatan'] = '';
			}

			$tindakans = $this->db->distinct()->select(" concat( case when ttp.id_pengkodean is null then '' else '[' end, ( SELECT tp.code FROM sm_icd_ix AS tp WHERE tp.ID = ttp.id_pengkodean ), case when ttp.id_pengkodean is null then '' else '] ' end, pl.nama) as nama ")
				->from('sm_tarif_tindakan_pasien as ttp')
				->join('sm_tarif_pelayanan as tpl', 'tpl.id = ttp.id_tarif_pelayanan', 'left')

				->join('sm_tenaga_medis as tm', 'ttp.id_operator = tm.id', 'left')
				->join('sm_profesi_nadis as pn', 'tm.id_profesi = pn.id', 'left')

				->join('sm_layanan as pl', 'pl.id = tpl.id_layanan', 'left')
				->join('sm_layanan_pendaftaran as lp', 'lp.id = ttp.id_layanan_pendaftaran', 'left')
				->join('sm_pendaftaran as pd', 'pd.id = lp.id_pendaftaran', 'left')
				->where('(tm.id_profesi IN (8, 10) OR tm.id_profesi IS NULL)', NULL, FALSE)
				->where('lp.id_pendaftaran', $id_daftar, true)
				->get()
				->result();

			$tindakanNama = [];
			foreach ($tindakans as $tindakan) {
				$huKecil = strtolower($tindakan->nama);
				$tindakanNama[] = $this->filterOlower($huKecil);
			}

			$data['tindakan'] = '';
			if (!empty($tindakanNama)) {
				$filterNama = array_unique($tindakanNama);

				foreach ($filterNama as $key) {
					$data['tindakan'] .= $key . '. ' . '<br>';
				}
			}


			$tindakans_ok = $this->db->select(" concat( case when too.id_pengkodean is null then '' else '[' end, ( SELECT tp.code FROM sm_icd_ix AS tp WHERE tp.ID = too.id_pengkodean ), case when too.id_pengkodean is null then '' else '] ' end, pl.nama) as nama ")
				->from('sm_tarif_operasi as too')
				->join('sm_jadwal_kamar_operasi as jko', 'jko.id = too.id_operasi')
				->join('sm_tarif_pelayanan as tpl', 'tpl.id = too.id_tarif')

				->join('sm_tenaga_medis as tm', 'too.id_nadis = tm.id', 'left')
				->join('sm_profesi_nadis as pn', 'tm.id_profesi = pn.id', 'left')

				->join('sm_layanan as pl', 'pl.id = tpl.id_layanan')
				->join('sm_layanan_pendaftaran as lp', 'lp.id = jko.id_layanan_pendaftaran', 'left')
				->join('sm_pendaftaran as pd', 'pd.id = lp.id_pendaftaran', 'left')
				->where('(tm.id_profesi IN (8, 10) OR tm.id_profesi IS NULL)', NULL, FALSE)
				->where('lp.id_pendaftaran', $id_daftar, true)
				->get()
				->result();

			foreach ($tindakans_ok as $tindakan_ok) {

				$okKecil = strtolower($tindakan_ok->nama);

				$tindakanOK[] = $this->filterOlower($okKecil);
			}

			if (isset($tindakanOK)) {

				if ($tindakanOK !== null) {

					$filterNamaOK = array_unique($tindakanOK);


					foreach ($filterNamaOK as $keyOK) {

						$data['tindakan_ok'] .= '<u>' . $keyOK . '</u>' . '*. ' . '<br>';
					}
				}
			} else {

				$data['tindakan_ok'] = '';
			}





			$tindakans_lab = $this->db->distinct(" concat( case when dlab.id_pengkodean is null then '' else '[' end, ( SELECT tp.code FROM sm_icd_ix AS tp WHERE tp.ID = dlab.id_pengkodean ), case when dlab.id_pengkodean is null then '' else '] ' end, pl.nama) as nama ")
				->from('sm_detail_laboratorium as dlab')
				->join('sm_laboratorium as lab', 'lab.id = dlab.id_laboratorium')
				->join('sm_order_laboratorium as olab', 'olab.id = lab.id_order_laboratorium')
				->join('sm_tarif_pelayanan as tpl', 'tpl.id = dlab.id_tarif')
				->join('sm_layanan as pl', 'pl.id = tpl.id_layanan')
				->where('lab.id_layanan_pendaftaran = ', $id, true)
				->get()
				->result();

			foreach ($tindakans_lab as $tindakan_lab) {
				$data['tindakan_lab'] .= '<u>' . $tindakan_lab->nama . '</u>' . '*. ' . '<br>';
			}

			$tindakans_rad = $this->db->distinct(" concat( case when drad.id_pengkodean is null then '' else '[' end, ( SELECT tp.code FROM sm_icd_ix AS tp WHERE tp.ID = drad.id_pengkodean ), case when drad.id_pengkodean is null then '' else '] ' end, pl.nama) as nama ")
				->from('sm_detail_radiologi as drad')
				->join('sm_radiologi as rad', 'rad.id = drad.id_radiologi')
				->join('sm_order_radiologi as orad', 'orad.id = rad.id_order_radiologi')
				->join('sm_tarif_pelayanan as tpl', 'tpl.id = drad.id_tarif')
				->join('sm_layanan as pl', 'pl.id = tpl.id_layanan')
				->where('rad.id_layanan_pendaftaran', $id, true)
				->get()
				->result();

			foreach ($tindakans_rad as $tindakan_rad) {
				$data['tindakan_rad'] .= '<u>' . $tindakan_rad->nama . '</u>' . '*. ' . '<br>';
			}

			$resume_keperawatan = $this->db->select('rk.diet_khusus')
				->from('sm_resume_keperawatan as rk')
				->where('rk.id_layanan_pendaftaran', $id, true)
				->get()
				->row();

			if ($resume_keperawatan != NULL) {
				$encodeDietKhusus = json_decode($resume_keperawatan->diet_khusus);

				$data['diet'] = $encodeDietKhusus->diet_khusus;
			}

			$layananPendaftaran = $this->db->where('id', $id)->get('sm_layanan_pendaftaran')->row();

			$pendaftaran = $this->klinik->getPendaftaranDetail($layananPendaftaran->id_pendaftaran, $id);

			$cekRadiologi = $this->m_rawat_inap->cekRadiologi($id_daftar);

			if (!empty($cekRadiologi)) {
				$data['cek_radiologi'] = $cekRadiologi;
			}

			$cekLaboratorium = $this->m_rawat_inap->cekLaboratorium($id_daftar);

			$this->load->model('pelayanan/Pelayanan_model', 'm_pelayanan');
			$this->load->model('hasil_laboratorium/Hasil_laboratorium_model', 'm_hasil_laboratorium');
			$data_lis = $this->m_pelayanan->getLIS();

			$this->url = $data_lis->url;
			$this->user = $data_lis->user;
			$this->pass = $data_lis->pass;

			if (!empty($cekLaboratorium)) {

				foreach ($cekLaboratorium as $j => $key) {

					$detail_lab = $this->m_hasil_laboratorium->getDetailLaboratorium($key->id);
					$status_lis = $detail_lab->status_lis;

					$ch = curl_init();
					curl_setopt_array($ch, array(
						CURLOPT_URL => $this->url . '/api/result/ono/' . $key->kode . '/view/',
						CURLOPT_RETURNTRANSFER => true,
						CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13',
						CURLOPT_ENCODING => "",
						CURLOPT_MAXREDIRS => 10,
						CURLOPT_TIMEOUT => 120,
						CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
						CURLOPT_CUSTOMREQUEST => "GET",
						CURLOPT_HTTPHEADER => array(
							'x-username: ' . $this->user . '',
							'x-password: ' . $this->pass . ''
						),
					));
					$response = curl_exec($ch);
					$response_status = curl_getinfo($ch, CURLINFO_RESPONSE_CODE);

					if ($response === false) {

						curl_close($ch); // close cURL handler

						if ($status_lis === "1") {

							$data_lab = $this->m_hasil_laboratorium->getItemDetailLaboratorium($key->id);
							$dataResponse[] = $data_lab;
							$dataOno[] = $key->kode;
							$dataPesan[] = "Gagal Menghubungi LIS, data sinkronisasi";
							$data_status = false;
							$data_laboratorium[] = null;
						} else {

							$dataResponse[] = null;
							$data_status = false;
							$dataOno[] = $key->kode;
							$dataPesan[] = "Gagal Menghubungi LIS, belum ada data sinkronisasi";
							$data_laboratorium[] = null;
						}
					} else {

						$response_getinfo = curl_getinfo($ch, CURLINFO_RESPONSE_CODE);

						if ($response_getinfo === 200) {

							$dataOno[] = $key->kode;
							$dataPesan[] = null;
							$data_laboratorium[] = json_decode($response);
							$data_status[] = true;

							curl_close($ch);
						} else {

							curl_close($ch);
							$dataResponse[] = null;
							$data_status[] = true;
							$dataOno[] = $key->kode;
							$dataPesan[] = "Belum ada Hasil Lab";
							$data_laboratorium[] = null;
						}
					}
				}

				if (!empty($data_laboratorium) && $response !== false) {

					$gabung_item = array();

					foreach ($data_laboratorium as $j => $k) {

						if (!empty($k->ono)) {

							$dataONO[] = $k->ono;

							$dataKdetail[] = $k->detail;
						}
					}

					if (!empty($dataONO)) {

						foreach ($dataONO as $n => $o) {

							foreach ($dataKdetail[$n] as $p => $q) {

								$gabung_item[$n]['flag'] = $q->flag;
								$gabung_item[$n]['order_testnm'] = $q->order_testnm;
								$gabung_item[$n]['test_comment'] = $q->test_comment;
								$gabung_item[$n]['test_cd'] = $q->test_cd;
								$gabung_item[$n]['test_group'] = $q->test_group;
								$gabung_item[$n]['nama'] = $this->m_hasil_laboratorium->getDataItemPemeriksaan($q->test_cd);
								$gabung_item[$n]['result_value'] = $q->result_value;
								$gabung_item[$n]['ref_range'] = $q->ref_range;
								$gabung_item[$n]['unit'] = $q->unit;
								$gabung_item[$n]['disp_seq'] = $q->disp_seq;
								$gabung_item[$n]['ono'] = $o;
								$gabung_item[$n]['release'] = $q->authorise;

								$dataResponse[] = array("ono" => $gabung_item[$n]['ono'], "release" => $gabung_item[$n]['release'], "flag" => $gabung_item[$n]['flag'], "order_testnm" => $gabung_item[$n]['order_testnm'], "test_comment" => $gabung_item[$n]['test_comment'], "test_cd" => $gabung_item[$n]['test_cd'], "test_group" => $gabung_item[$n]['test_group'], "nama" => $gabung_item[$n]['nama'], "result_value" => $gabung_item[$n]['result_value'], "ref_range" => $gabung_item[$n]['ref_range'], "unit" => $gabung_item[$n]['unit'], "disp_seq" => $gabung_item[$n]['disp_seq']);
							}
						}
					}
				}


				$data['resume_lab'] = $dataResponse;
				$data['status_lab'] = $data_status;
				$data['pesan_lab'] = $dataPesan;
			}

			$resumeMedisRanap = $this->m_rawat_inap->getResumeMedis($id_daftar);
			$resumeKontrol = $this->m_rawat_inap->getResumeMedisJadwalKontrol($id_daftar);
			$resumeTerapiPulang = $this->m_rawat_inap->getResumeTerapiPulang($id_daftar);

			$data['resume_medis'] = $resumeMedisRanap[0];
			$data['resume_medis']->cara_keluar = $this->db->get_where('sm_layanan_pendaftaran', ['id' => $id])->row()->tindak_lanjut;
			$data['resume_kontrol'] = $resumeKontrol;
			$data['resume_terapi_pulang'] = $resumeTerapiPulang;
		endif;

		if ($type !== 'data') {
			$this->load->view('pengkodean_icd_x/printing/resume_medis_ri', $data);
		} else {
			return $data;
		}
	}

	function cetak_resume_medis_intensive_care($id, $id_daftar, $type = null)
	{
		$this->load->model('intensive_care/Intensive_care_model', 'm_intensive_care');

		if (!$id && !$id_daftar) {
			exit();
		}

		if ($id !== null && $id_daftar !== null) :
			$data['pemeriksaan_fisik'] = '';
			$data['diagnosa_utama'] = '';
			$data['diagnosa_sekunder'] = '';
			$data['diagnosa_manual_utama'] = '';
			$data['diagnosa_manual_sekunder'] = '';
			$data['diagnosa_utama_instalasi_lainnya'] = '';
			$data['pengobatan'] = '';
			$data['s_soap'] = '';
			$data['o_soap'] = '';
			$data['a_soap'] = '';
			$data['p_soap'] = '';
			$data['subject'] = '';
			$data['objective'] = '';
			$data['assessment'] = '';
			$data['plan'] = '';
			$data['keluhan_utama'] = '';
			$data['tindakan'] = '';
			$data['tindakan_ok'] = '';
			$data['tindakan_lab'] = '';
			$data['tindakan_rad'] = '';
			$data['diet'] = '';

			$data['pasien'] = $this->db->select(" ps.id no_rm, ps.nama nama_pasien,ps.tanggal_lahir, case when ps.kelamin='P' then 'Perempuan' else 'Laki-Laki' end kelamin, pd.tanggal_daftar, pd.tanggal_keluar,pj.nama as penjamin, ps.alergi, sp.nama as ruang_asal, pg.nama dokter_dpjp, pg.tanda_tangan, pd.jenis_rawat, lp.tindak_lanjut, lp.jenis_layanan, rms.diagnosa_awal_masuk, rms.hasil_konsultasi, rms.pending_lab ")
				->from('sm_pasien ps')
				->join('sm_pendaftaran pd', 'ps.id=pd.id_pasien')
				->join('sm_layanan_pendaftaran lp', 'pd.id=lp.id_pendaftaran')
				->join('sm_resume_medis_intensive_care as rms', 'rms.id_layanan_pendaftaran = lp.id', 'left')
				->join('sm_spesialisasi as sp', 'sp.id = lp.id_unit_layanan', 'left')
				->join('sm_penjamin as pj', 'pj.id = pd.id_penjamin', 'left')
				->join('sm_tenaga_medis tm', 'lp.id_dokter = tm.id', 'left')
				->join('sm_pegawai pg', 'tm.id_pegawai = pg.id', 'left')
				->where('lp.id', $id, true)
				->get()
				->row();

			$data['kajian_medis'] = $this->m_intensive_care->getKajianMedis($id);

			$data['kajian_perawatan'] = $this->m_intensive_care->getKajianKeperawatan($id);

			$data['rawat_inap'] = $this->db->select('ri.*, bg.nama as nama_bangsal, k.nama as nama_kelas, pj.nama as penjamin, pa.nama as nama_pasien, pd.no_register, pa.tanggal_lahir, pa.kelamin, lp.tindak_lanjut as status, lp.kondisi')
				->from('sm_rawat_inap as ri')
				->join('sm_layanan_pendaftaran as lp', 'lp.id = ri.id_layanan_pendaftaran')
				->join('sm_pendaftaran as pd', 'pd.id = lp.id_pendaftaran')
				->join('sm_pasien as pa', 'pa.id = pd.id_pasien')
				->join('sm_bangsal as bg', 'bg.id = ri.id_bangsal')
				->join('sm_kelas as k', 'k.id = ri.id_kelas')
				->join('sm_penjamin as pj', 'pj.id = ri.id_penjamin', 'left')
				->where('lp.id', $id, true)
				->get()
				->row();

			$data['intensive_care'] = $this->db->select('ri.*, bg.nama as nama_bangsal, k.nama as nama_kelas, pj.nama as penjamin, pa.nama as nama_pasien, pd.no_register, pa.tanggal_lahir, pa.kelamin, lp.tindak_lanjut as status, lp.kondisi')
				->from('sm_intensive_care as ri')
				->join('sm_layanan_pendaftaran as lp', 'lp.id = ri.id_layanan_pendaftaran')
				->join('sm_pendaftaran as pd', 'pd.id = lp.id_pendaftaran')
				->join('sm_pasien as pa', 'pa.id = pd.id_pasien')
				->join('sm_bangsal as bg', 'bg.id = ri.id_bangsal')
				->join('sm_kelas as k', 'k.id = ri.id_kelas')
				->join('sm_penjamin as pj', 'pj.id = ri.id_penjamin', 'left')
				->where('lp.id', $id, true)
				->get()
				->row();

			$data['kajian_ranap'] = $this->db->select('kmr.*, kmr.keluhan_utama, kmr.riwayat_penyakit_sekarang, kmr.riwayat_penyakit_terdahulu, riwayat_penyakit_keluarga, kmr.pengobatan, kmr.riwayat, kmr.hasil_laboratorium, kmr.hasil_radiologi, kmr.hasil_penunjang_lain, kmr.diagnosa_awal ')
				->from('sm_kajian_medis_ranap as kmr')
				->join('sm_layanan_pendaftaran as lp', 'lp.id = kmr.id_layanan_pendaftaran')
				->where('lp.id', $id, true)
				->get()
				->row();

			//Punya yang baru (Lama)
			$terapi1 = $this->db->select("tp.*, b.nama_lengkap as nama_obat")
				->from('sm_resume_medis_terapi_pulang as tp')
				->join('sm_barang as b', 'b.id = tp.obat')
				->where('tp.id_layanan_pendaftaran', $id, true)
				->get()
				->result();

			// Baru
			$terapi2 = $this->m_rawat_inap->getObatTerapiPulang($id);

			$data['terapi_pulang'] = array_merge($terapi2, $terapi1);

			$data['soap'] = $this->db->select(" subject, objective, assessment, plan ")
				->from('sm_soap so')
				->join('sm_layanan_pendaftaran lp', 'so.id_layanan_pendaftaran=lp.id')
				->join('sm_pendaftaran p', 'p.id=lp.id_pendaftaran', 'left')
				->where('lp.id', $id, true)
				->get()
				->row();

			$data['kajian_icare'] = $this->db->select('kmr.*, kmr.keluhan_utama, kmr.riwayat_penyakit_sekarang, kmr.riwayat_penyakit_terdahulu, riwayat_penyakit_keluarga, kmr.pengobatan, kmr.riwayat, kmr.hasil_laboratorium, kmr.hasil_radiologi, kmr.hasil_penunjang_lain, kmr.diagnosa_awal ')
				->from('sm_kajian_medis_icare as kmr')
				->join('sm_layanan_pendaftaran as lp', 'lp.id = kmr.id_layanan_pendaftaran')
				->where('lp.id', $id, true)
				->get()
				->row();

			$data['anamnesa'] = $this->db->select(" keluhan_utama, riwayat_penyakit_sekarang, riwayat_penyakit_dahulu, riwayat_penyakit_keluarga, anamnesa_sosial, pemeriksaan_penunjang, keadaan_umum, kesadaran, gcs, rr, suhu, tensi_sistolik as sistolik, tensi_diastolik as diastolik, nadi, nps, tinggi_badan, berat_badan, kepala, leher, thorax, pulmo, cor, abdomen, genitalia, ekstrimitas, usul_tindak_lanjut, s_soap, o_soap, a_soap, p_soap ")
				->from('sm_anamnesa an')
				->join('sm_layanan_pendaftaran lp', 'an.id_layanan_pendaftaran=lp.id')
				->join('sm_pendaftaran p', 'p.id=lp.id_pendaftaran', 'left')
				->where('lp.id', $id, true)
				->get()
				->row();

			if ($data['anamnesa'] != NULL) {
				$anam = $data['anamnesa'];
				$data['s_soap'] = 'S: ' . $anam->s_soap;
				$data['o_soap'] = 'O: ' . $anam->o_soap;
				$data['a_soap'] = 'A: ' . $anam->a_soap;
				$data['p_soap'] = 'P: ' . $anam->p_soap;
			}

			$data['soap'] = $this->db->select(" subject, objective, assessment, plan ")
				->from('sm_soap so')
				->join('sm_layanan_pendaftaran lp', 'so.id_layanan_pendaftaran=lp.id')
				->join('sm_pendaftaran p', 'p.id=lp.id_pendaftaran', 'left')
				->where('lp.id', $id, true)
				->get()
				->row();

			if ($data['soap'] != NULL) {
				$soap = $data['soap'];
				$data['subject'] = 'S: ' . $soap->subject;
				$data['objective'] = 'O: ' . $soap->objective;
				$data['assessment'] = 'A: ' . $soap->assessment;
				$data['plan'] = 'P: ' . $soap->plan;
			}

			if ($data['kajian_perawatan'] != NULL) {
				if ($data['kajian_perawatan']->alergi != NULL) {
					$data['kajian_perawatan']->alergi == 0 ? $data['kajian_perawatan']->alergi == 'Tidak Ada' : 'Ada';
				}

				$encodeKesadaran = json_decode($data['kajian_perawatan']->kesadaran);

				if ($encodeKesadaran->composmentis == 1) {
					$kesadaran = 'Composmentis';
				} else if ($encodeKesadaran->apatis == 1) {
					$kesadaran = 'Apatis';
				} else if ($encodeKesadaran->samnolen == 1) {
					$kesadaran = 'Samnolen';
				} else if ($encodeKesadaran->sopor == 1) {
					$kesadaran = 'Sopor';
				} else if ($encodeKesadaran->koma == 1) {
					$kesadaran = 'Koma';
				} else if ($encodeKesadaran->koma == NULL) {
					$kesadaran = '';
				}

				$gcs = $encodeKesadaran->gcs_e || $encodeKesadaran->gcs_m || $encodeKesadaran->gcs_v;

				$data['pemeriksaan_fisik'] = 'Kesadaran: ' . $kesadaran . ', GCS: ' . $gcs . ', E: ' . $encodeKesadaran->gcs_e . ', M: ' . $encodeKesadaran->gcs_m . ', V:' . $encodeKesadaran->gcs_v . ', TD: ' . $data['kajian_perawatan']->tensi_sistolik_awal . '/' . $data['kajian_perawatan']->tensi_diastolik_awal . 'mmHg, RR: ' . $data['kajian_perawatan']->nafas_awal . ' x/m, N: ' . $data['kajian_perawatan']->nadi_awal . ' x/m, T: ' . $data['kajian_perawatan']->suhu_awal . 'c';
			}

			$resume_keperawatan = $this->db->select('rk.diet_khusus')
				->from('sm_resume_keperawatan as rk')
				->where('rk.id_layanan_pendaftaran', $id, true)
				->get()
				->row();

			if ($resume_keperawatan != NULL) {
				$encodeDietKhusus = json_decode($resume_keperawatan->diet_khusus);

				$data['diet'] = $encodeDietKhusus->diet_khusus;
			}


			if ($data['pasien']->alergi != NULL) {
				$data['pasien']->alergi == 0 ? $data['pasien']->alergi == 'Tidak Ada' : 'Ada';
			}

			$data['asal_ruangan'] = $this->db->select("");

			if ($data['anamnesa'] != NULL) {
				$anam = $data['anamnesa'];
				$data['pemeriksaan'] = 'Kesadaran: ' . $anam->kesadaran . ', GCS: ' . $anam->gcs;
			}

			$cek_daftar = $this->m_intensive_care->cekDaftar($id_daftar);

			if (!empty($cek_daftar)) {

				$idLayanan = (int)$cek_daftar[0]->id;
				$diagnosaUtama = $this->m_intensive_care->getDiagnosaUtama($idLayanan);
				$diagnosaUtamaManual = $this->m_intensive_care->getDiagnosaManualAwal($idLayanan);

				if (!empty($diagnosaUtama[0]->nama)) {

					$data['diagnosa_awal'] = $diagnosaUtama[0]->nama;
				} else {

					$data['diagnosa_awal'] = null;
				}

				if (isset($diagnosaUtamaManual[0]->nama_manual)) {

					$data['diag_manual'] = $diagnosaUtamaManual[0]->nama_manual;
				} else {

					$data['diag_manual'] = null;
				}
			} else {

				$diagnosaUtama = $this->m_intensive_care->getDiagnosaUtama($id);
				$diagnosaUtamaManual = $this->m_intensive_care->getDiagnosaManualAwal($id);

				if (!empty($diagnosaUtama[0]->nama)) {

					$data['diagnosa_awal'] = $diagnosaUtama[0]->nama;
				} else {

					$data['diagnosa_awal'] = null;
				}

				if (isset($diagnosaUtamaManual[0]->nama_manual)) {

					$data['diag_manual'] = $diagnosaUtamaManual[0]->nama_manual;
				} else {

					$data['diag_manual'] = null;
				}
			}

			$diagnosa_utamas = $this->db->select(" concat_ws ('. ', ( SELECT gss.kode_icdx_rinci FROM sm_golongan_sebab_sakit AS gss WHERE gss.ID = d.id_pengkodean ), ( SELECT gss.kode_icdx_rinci FROM sm_golongan_sebab_sakit AS gss WHERE gss.ID = d.id_pengkodean_asterik ), gss.nama ) AS nama, lp.id as id_layanan_pendaftaran ")
				->from('sm_diagnosa as d')
				->join('sm_golongan_sebab_sakit as gss', 'gss.id = d.id_golongan_sebab_sakit', 'left')
				->join('sm_layanan_pendaftaran as lp', 'lp.id = d.id_layanan_pendaftaran', 'left')
				->join('sm_pendaftaran as pd', 'pd.id = lp.id_pendaftaran', 'left')
				->where('lp.id_pendaftaran', $id_daftar, true)
				->where('d.prioritas', 'Utama')
				->where('d.diagnosa_manual <>', '1')
				->order_by('lp.id', 'desc')
				->limit(1)
				->get()
				->result();

			//			foreach ($diagnosa_utamas as $diagnosa_utama) {
			//				$data['diagnosa_utama'] .= $diagnosa_utama->nama . '. ' . '<br>';
			//			}

			$diagnosa_manual_utamas = $this->db->select(" concat_ws ('. ', ( SELECT gss.kode_icdx_rinci FROM sm_golongan_sebab_sakit AS gss WHERE gss.ID = d.id_pengkodean ), ( SELECT gss.kode_icdx_rinci FROM sm_golongan_sebab_sakit AS gss WHERE gss.ID = d.id_pengkodean_asterik ), d.golongan_sebab_sakit_lain ) AS nama, lp.id as id_layanan_pendaftaran ")
				->from('sm_diagnosa as d')
				->join('sm_layanan_pendaftaran as lp', 'lp.id = d.id_layanan_pendaftaran', 'left')
				->join('sm_pendaftaran as pd', 'pd.id = lp.id_pendaftaran', 'left')
				->where('lp.id_pendaftaran', $id_daftar, true)
				->where('d.prioritas', 'Utama')
				->where('d.diagnosa_manual', '1')
				->where("lp.jenis_layanan not in('Poliklinik', 'IGD')")
				->order_by('lp.id', 'desc')
				->limit(1)
				->get()
				->result();

			//			foreach ($diagnosa_manual_utamas as $diagnosa_manual_utama) {
			//				$data['diagnosa_manual_utama'] .= $diagnosa_manual_utama->nama . '. ' . '<br>';
			//			}

			$data['diagnosa_utama'] = array_merge($diagnosa_utamas, $diagnosa_manual_utamas);
			usort($data['diagnosa_utama'], function ($a, $b) {
				return strcmp($b->id_layanan_pendaftaran, $a->id_layanan_pendaftaran);
			});

			$diagnosa_sekunders = $this->db->select(" concat_ws ('. ', ( SELECT gss.kode_icdx_rinci FROM sm_golongan_sebab_sakit AS gss WHERE gss.ID = d.id_pengkodean ), ( SELECT gss.kode_icdx_rinci FROM sm_golongan_sebab_sakit AS gss WHERE gss.ID = d.id_pengkodean_asterik ), gss.nama ) AS nama ")
				->from('sm_diagnosa as d')
				->join('sm_golongan_sebab_sakit as gss', 'gss.id = d.id_golongan_sebab_sakit', 'left')
				->join('sm_layanan_pendaftaran as lp', 'lp.id = d.id_layanan_pendaftaran', 'left')
				->join('sm_pendaftaran as pd', 'pd.id = lp.id_pendaftaran', 'left')
				->where('lp.id_pendaftaran', $id_daftar, true)
				->where('d.prioritas', 'Sekunder')
				->where('d.diagnosa_manual <>', '1')
				->where("lp.jenis_layanan not in('Poliklinik', 'IGD')")
				->get()
				->result();

			foreach ($diagnosa_sekunders as $diagnosa_sekunder) {
				$data['diagnosa_sekunder'] .= $diagnosa_sekunder->nama . '. ' . '<br>';
			}

			$diagnosa_manual_sekunders = $this->db->select(" concat_ws ('. ', ( SELECT gss.kode_icdx_rinci FROM sm_golongan_sebab_sakit AS gss WHERE gss.ID = d.id_pengkodean ), ( SELECT gss.kode_icdx_rinci FROM sm_golongan_sebab_sakit AS gss WHERE gss.ID = d.id_pengkodean_asterik ), d.golongan_sebab_sakit_lain ) AS nama ")
				->from('sm_diagnosa as d')
				->join('sm_layanan_pendaftaran as lp', 'lp.id = d.id_layanan_pendaftaran', 'left')
				->join('sm_pendaftaran as pd', 'pd.id = lp.id_pendaftaran', 'left')
				->where('lp.id_pendaftaran', $id_daftar, true)
				->where('d.prioritas', 'Sekunder')
				->where('d.diagnosa_manual', '1')
				->where("lp.jenis_layanan not in('Poliklinik', 'IGD')")
				->get()
				->result();

			foreach ($diagnosa_manual_sekunders as $diagnosa_manual_sekunder) {
				$data['diagnosa_manual_sekunder'] .= $diagnosa_manual_sekunder->nama . '. ' . '<br>';
			}

			$diagnosa_utama_instalasi_lainnya = $this->db->query(" select concat_ws ('. ', ( SELECT gss.kode_icdx_rinci FROM sm_golongan_sebab_sakit AS gss WHERE gss.id = d.id_pengkodean ), ( SELECT gss.kode_icdx_rinci FROM sm_golongan_sebab_sakit AS gss WHERE gss.id = d.id_pengkodean_asterik ), d.golongan_sebab_sakit_lain ) AS nama  , lp.id as id_layanan_pendaftaran
				from sm_diagnosa d
				join sm_layanan_pendaftaran lp ON lp.id = d.id_layanan_pendaftaran 
				join sm_pendaftaran pd ON pd.id = lp.id_pendaftaran 
				where lp.id_pendaftaran = '" . $id_daftar . "'
				and lp.jenis_layanan not in('Poliklinik', 'IGD')
				and d.prioritas = 'Utama'")->result();

			$layananDeleted = $diagnosa_utamas[0]->id_layanan_pendaftaran ?? $diagnosa_manual_utamas[0]->id_layanan_pendaftaran ?? null;

			$filter_duil = array_values(array_filter($diagnosa_utama_instalasi_lainnya, function ($value) use ($layananDeleted) {
				return $value->id_layanan_pendaftaran != $layananDeleted;
			}));

			foreach ($filter_duil as $value) {
				$data['diagnosa_utama_instalasi_lainnya'] .= $value->nama . '. ' . '<br>';
			}

			// $pengobatans = $this->db->distinct("concat ( br.nama_lengkap, ' (', case when rs.aturan_pakai_manual is not null or rs.aturan_pakai_manual != '0' then rs.aturan_pakai_manual else rs.aturan_pakai end, ')', CASE WHEN rs.keterangan_resep IS NULL THEN '' ELSE concat(' Keterangan Resep: ', rs.keterangan_resep) END ) AS nama")
			// 	->from('sm_resep_r_detail as rsd')
			// 	->join('sm_resep_r as rs', 'rs.id = rsd.id_resep_r', 'left')
			// 	->join('sm_resep as rp', 'rp.id = rs.id_resep', 'left')
			// 	->join('sm_barang as br', 'br.id = rsd.id_barang', 'left')
			// 	->join('sm_layanan_pendaftaran as lp', 'lp.id = rp.id_layanan_pendaftaran', 'left')
			// 	->join('sm_pendaftaran as pd', 'pd.id = lp.id_pendaftaran', 'left')
			// 	->where('lp.id_pendaftaran', $id_daftar, true)
			// 	->where('br.id_kategori', '1')
			// 	->get()
			// 	->result();

			$pengobatans = $this->db->select("concat ( br.nama_lengkap, ' (', case when rs.aturan_pakai_manual is not null and rs.aturan_pakai_manual != '0' then rs.ket_aturan_pakai_manual else rs.aturan_pakai end, ')' ) AS nama")
				->from('sm_resep_r_detail as rsd')
				->join('sm_resep_r as rs', 'rs.id = rsd.id_resep_r', 'left')
				->join('sm_resep as rp', 'rp.id = rs.id_resep', 'left')
				->join('sm_barang as br', 'br.id = rsd.id_barang', 'left')
				->join('sm_layanan_pendaftaran as lp', 'lp.id = rp.id_layanan_pendaftaran', 'left')
				->join('sm_pendaftaran as pd', 'pd.id = lp.id_pendaftaran', 'left')
				->where('lp.id_pendaftaran', $id_daftar, true)
				->where('br.id_kategori', '1')
				->get()
				->result();

			foreach ($pengobatans as $pengobatan) {

				$obatKecil = $pengobatan->nama;

				$spasiPengobatan[] = $this->filterOlower($obatKecil);
			}

			if (isset($spasiPengobatan)) {

				if ($spasiPengobatan !== null) {

					$filterNamaObat = array_unique($spasiPengobatan);


					foreach ($filterNamaObat as $obat) {

						$data['pengobatan'] .= $obat . '. ';
					}
				}
			} else {

				$data['pengobatan'] = '';
			}

			$tindakans = $this->db->distinct()->select(" concat( case when ttp.id_pengkodean is null then '' else '[' end, ( SELECT tp.code FROM sm_icd_ix AS tp WHERE tp.ID = ttp.id_pengkodean ), case when ttp.id_pengkodean is null then '' else '] ' end, pl.nama) as nama ")
				->from('sm_tarif_tindakan_pasien as ttp')
				->join('sm_tarif_pelayanan as tpl', 'tpl.id = ttp.id_tarif_pelayanan', 'left')

				->join('sm_tenaga_medis as tm', 'ttp.id_operator = tm.id', 'left')
				->join('sm_profesi_nadis as pn', 'tm.id_profesi = pn.id', 'left')

				->join('sm_layanan as pl', 'pl.id = tpl.id_layanan', 'left')
				->join('sm_layanan_pendaftaran as lp', 'lp.id = ttp.id_layanan_pendaftaran', 'left')
				->join('sm_pendaftaran as pd', 'pd.id = lp.id_pendaftaran', 'left')
				->where('(tm.id_profesi IN (8, 10) OR tm.id_profesi IS NULL)', NULL, FALSE)
				->where('lp.id_pendaftaran', $id_daftar, true)
				->get()
				->result();

			$tindakanNama = [];
			foreach ($tindakans as $tindakan) {
				$huKecil = strtolower($tindakan->nama);
				$tindakanNama[] = $this->filterOlower($huKecil);
			}

			$data['tindakan'] = '';
			if (!empty($tindakanNama)) {
				$filterNama = array_unique($tindakanNama);

				foreach ($filterNama as $key) {
					$data['tindakan'] .= $key . '. ' . '<br>';
				}
			}


			$tindakans_ok = $this->db->select(" concat( case when too.id_pengkodean is null then '' else '[' end, ( SELECT tp.code FROM sm_icd_ix AS tp WHERE tp.ID = too.id_pengkodean ), case when too.id_pengkodean is null then '' else '] ' end, pl.nama) as nama ")
				->from('sm_tarif_operasi as too')
				->join('sm_jadwal_kamar_operasi as jko', 'jko.id = too.id_operasi')
				->join('sm_tarif_pelayanan as tpl', 'tpl.id = too.id_tarif')

				->join('sm_tenaga_medis as tm', 'too.id_nadis = tm.id', 'left')
				->join('sm_profesi_nadis as pn', 'tm.id_profesi = pn.id', 'left')

				->join('sm_layanan as pl', 'pl.id = tpl.id_layanan')
				->join('sm_layanan_pendaftaran as lp', 'lp.id = jko.id_layanan_pendaftaran', 'left')
				->join('sm_pendaftaran as pd', 'pd.id = lp.id_pendaftaran', 'left')
				->where('(tm.id_profesi IN (8, 10) OR tm.id_profesi IS NULL)', NULL, FALSE)
				->where('lp.id_pendaftaran', $id_daftar, true)
				->get()
				->result();

			foreach ($tindakans_ok as $tindakan_ok) {

				$okKecil = strtolower($tindakan_ok->nama);

				$tindakanOK[] = $this->filterOlower($okKecil);
			}

			if (isset($tindakanOK)) {

				if ($tindakanOK !== null) {

					$filterNamaOK = array_unique($tindakanOK);


					foreach ($filterNamaOK as $keyOK) {

						$data['tindakan_ok'] .= '<u>' . $keyOK . '</u>' . '*. ' . '<br>';
					}
				}
			} else {

				$data['tindakan_ok'] = '';
			}

			$tindakans_lab = $this->db->distinct(" concat( case when dlab.id_pengkodean is null then '' else '[' end, ( SELECT tp.code FROM sm_icd_ix AS tp WHERE tp.ID = dlab.id_pengkodean ), case when dlab.id_pengkodean is null then '' else '] ' end, pl.nama) as nama ")
				->from('sm_detail_laboratorium as dlab')
				->join('sm_laboratorium as lab', 'lab.id = dlab.id_laboratorium')
				->join('sm_order_laboratorium as olab', 'olab.id = lab.id_order_laboratorium')
				->join('sm_tarif_pelayanan as tpl', 'tpl.id = dlab.id_tarif')
				->join('sm_layanan as pl', 'pl.id = tpl.id_layanan')
				->where('lab.id_layanan_pendaftaran = ', $id, true)
				->get()
				->result();

			foreach ($tindakans_lab as $tindakan_lab) {
				$data['tindakan_lab'] .= '<u>' . $tindakan_lab->nama . '</u>' . '*. ' . '<br>';
			}

			$tindakans_rad = $this->db->distinct(" concat( case when drad.id_pengkodean is null then '' else '[' end, ( SELECT tp.code FROM sm_icd_ix AS tp WHERE tp.ID = drad.id_pengkodean ), case when drad.id_pengkodean is null then '' else '] ' end, pl.nama) as nama ")
				->from('sm_detail_radiologi as drad')
				->join('sm_radiologi as rad', 'rad.id = drad.id_radiologi')
				->join('sm_order_radiologi as orad', 'orad.id = rad.id_order_radiologi')
				->join('sm_tarif_pelayanan as tpl', 'tpl.id = drad.id_tarif')
				->join('sm_layanan as pl', 'pl.id = tpl.id_layanan')
				->where('rad.id_layanan_pendaftaran', $id, true)
				->get()
				->result();

			foreach ($tindakans_rad as $tindakan_rad) {
				$data['tindakan_rad'] .= '<u>' . $tindakan_rad->nama . '</u>' . '*. ' . '<br>';
			}

			$resume_keperawatan = $this->db->select('rk.diet_khusus')
				->from('sm_resume_keperawatan as rk')
				->where('rk.id_layanan_pendaftaran', $id, true)
				->get()
				->row();

			if ($resume_keperawatan != NULL) {
				$encodeDietKhusus = json_decode($resume_keperawatan->diet_khusus);

				$data['diet'] = $encodeDietKhusus->diet_khusus;
			}

			$layananPendaftaran = $this->db->where('id', $id)->get('sm_layanan_pendaftaran')->row();

			$pendaftaran = $this->klinik->getPendaftaranDetail($layananPendaftaran->id_pendaftaran, $id);

			$cekRadiologi = $this->m_intensive_care->cekRadiologi($id_daftar);

			if (!empty($cekRadiologi)) {
				$data['cek_radiologi'] = $cekRadiologi;
			}

			$cekLaboratorium = $this->m_intensive_care->cekLaboratorium($id_daftar);

			$this->load->model('pelayanan/Pelayanan_model', 'm_pelayanan');
			$this->load->model('hasil_laboratorium/Hasil_laboratorium_model', 'm_hasil_laboratorium');
			$data_lis = $this->m_pelayanan->getLIS();

			$this->url = $data_lis->url;
			$this->user = $data_lis->user;
			$this->pass = $data_lis->pass;

			if (!empty($cekLaboratorium)) {

				foreach ($cekLaboratorium as $j => $key) {

					$detail_lab = $this->m_hasil_laboratorium->getDetailLaboratorium($key->id);
					$status_lis = $detail_lab->status_lis;

					$ch = curl_init();
					curl_setopt_array($ch, array(
						CURLOPT_URL => $this->url . '/api/result/ono/' . $key->kode . '/view/',
						CURLOPT_RETURNTRANSFER => true,
						CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13',
						CURLOPT_ENCODING => "",
						CURLOPT_MAXREDIRS => 10,
						CURLOPT_TIMEOUT => 120,
						CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
						CURLOPT_CUSTOMREQUEST => "GET",
						CURLOPT_HTTPHEADER => array(
							'x-username: ' . $this->user . '',
							'x-password: ' . $this->pass . ''
						),
					));
					$response = curl_exec($ch);
					$response_status = curl_getinfo($ch, CURLINFO_RESPONSE_CODE);

					if ($response === false) {

						curl_close($ch); // close cURL handler

						if ($status_lis === "1") {

							$data_lab = $this->m_hasil_laboratorium->getItemDetailLaboratorium($key->id);
							$dataResponse[] = $data_lab;
							$dataOno[] = $key->kode;
							$dataPesan[] = "Gagal Menghubungi LIS, data sinkronisasi";
							$data_status = false;
							$data_laboratorium[] = null;
						} else {

							$dataResponse[] = null;
							$data_status = false;
							$dataOno[] = $key->kode;
							$dataPesan[] = "Gagal Menghubungi LIS, belum ada data sinkronisasi";
							$data_laboratorium[] = null;
						}
					} else {

						$response_getinfo = curl_getinfo($ch, CURLINFO_RESPONSE_CODE);

						if ($response_getinfo === 200) {

							$dataOno[] = $key->kode;
							$dataPesan[] = null;
							$data_laboratorium[] = json_decode($response);
							$data_status[] = true;

							curl_close($ch);
						} else {

							curl_close($ch);
							$dataResponse[] = null;
							$data_status[] = true;
							$dataOno[] = $key->kode;
							$dataPesan[] = "Belum ada Hasil Lab";
							$data_laboratorium[] = null;
						}
					}
				}

				if (!empty($data_laboratorium) && $response !== false) {

					$gabung_item = array();

					foreach ($data_laboratorium as $j => $k) {

						if (!empty($k->ono)) {

							$dataONO[] = $k->ono;

							$dataKdetail[] = $k->detail;
						}
					}

					foreach ($dataONO as $n => $o) {

						foreach ($dataKdetail[$n] as $p => $q) {

							$gabung_item[$n]['flag'] = $q->flag;
							$gabung_item[$n]['order_testnm'] = $q->order_testnm;
							$gabung_item[$n]['test_comment'] = $q->test_comment;
							$gabung_item[$n]['test_cd'] = $q->test_cd;
							$gabung_item[$n]['test_group'] = $q->test_group;
							$gabung_item[$n]['nama'] = $this->m_hasil_laboratorium->getDataItemPemeriksaan($q->test_cd);
							$gabung_item[$n]['result_value'] = $q->result_value;
							$gabung_item[$n]['ref_range'] = $q->ref_range;
							$gabung_item[$n]['unit'] = $q->unit;
							$gabung_item[$n]['disp_seq'] = $q->disp_seq;
							$gabung_item[$n]['ono'] = $o;
							$gabung_item[$n]['release'] = $q->authorise;

							$dataResponse[] = array("ono" => $gabung_item[$n]['ono'], "release" => $gabung_item[$n]['release'], "flag" => $gabung_item[$n]['flag'], "order_testnm" => $gabung_item[$n]['order_testnm'], "test_comment" => $gabung_item[$n]['test_comment'], "test_cd" => $gabung_item[$n]['test_cd'], "test_group" => $gabung_item[$n]['test_group'], "nama" => $gabung_item[$n]['nama'], "result_value" => $gabung_item[$n]['result_value'], "ref_range" => $gabung_item[$n]['ref_range'], "unit" => $gabung_item[$n]['unit'], "disp_seq" => $gabung_item[$n]['disp_seq']);
						}
					}
				}


				$data['resume_lab'] = array_values(array_filter($dataResponse));
				$data['status_lab'] = $data_status;
				$data['pesan_lab'] = $dataPesan;
			}

			$resumeMedisIntensiveCare = $this->m_intensive_care->getResumeMedis($id_daftar);
			$resumeKontrol = $this->m_intensive_care->getResumeMedisKontrol($id_daftar);
			$resumeTerapiPulang = $this->m_intensive_care->getResumeTerapiPulang($id_daftar);

			$data['resume_medis'] = $resumeMedisIntensiveCare[0];
			$data['resume_medis']->cara_keluar = $this->db->get_where('sm_layanan_pendaftaran', ['id' => $id])->row()->tindak_lanjut;
			$data['resume_kontrol'] = $resumeKontrol;
			$data['resume_terapi_pulang'] = $resumeTerapiPulang;
		endif;

		if ($type !== 'data') {
			$this->load->view('pengkodean_icd_x/printing/resume_medis_intensive_care', $data);
		} else {
			return $data;
		}
	}
}
