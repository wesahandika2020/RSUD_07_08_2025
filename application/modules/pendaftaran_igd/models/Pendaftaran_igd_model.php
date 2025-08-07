<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pendaftaran_igd_model extends CI_Model
{

	function __construct()
	{
		parent::__construct();
		$this->datetime = date('Y-m-d H:i:s');
		$this->load->model('pelayanan/Pelayanan_model', 'm_pelayanan');
	}

	private function sqlPendaftaranIGD($search, $baru = null, $lama = null, $batal = null)
	{
		$this->db->select("DISTINCT ON(pd.id)pd.*,
                    CONCAT_WS(' ', COALESCE(p.status_pasien, ''), p.nama) as nama, p.kelamin, p.alamat, p.no_identitas,
					coalesce(sp.nama, '') as klinik,
                    coalesce(tr.account, '') as user,
					coalesce(pgu.nama, '') as nama_user,
                    coalesce(pj.nama, '') as penjamin,
                    lp.cara_bayar, lp.id as id_layanan_pendaftaran, 
                    lp.status_terlayani,
                    sp.kode_bpjs,sep.is_rajal,sep.is_ranap, sep.created_date tgl_sepasal", false);

		$this->db->from('sm_pendaftaran as pd')
			->join('sm_pasien as p', 'p.id = pd.id_pasien')
			->join('sm_layanan_pendaftaran as lp', 'lp.id_pendaftaran = pd.id')
			->join('sm_spesialisasi as sp', 'sp.id = lp.id_unit_layanan', 'left')
			->join('sm_translucent as tr', 'tr.id = pd.id_users')
			->join('sm_pegawai as pgu', 'pgu.id = pd.id_users')
			->join('sm_penjamin as pj', 'pj.id = lp.id_penjamin', 'left')
			->join('sm_asal_sep as sep', 'pd.id = sep.id_pendaftaran', 'left')
			->where('pd.id is not null')
			->where('lp.konsul', 0);

		// var_dump($search['tanggal_awal']); die;
		if (($search['tanggal_awal'] !== '') & ($search['tanggal_akhir'] !== '')) :
			$this->db->where("pd.tanggal_daftar BETWEEN '" . date2mysql($search['tanggal_awal']) . " 00:00:00' AND '" . date2mysql($search['tanggal_akhir']) . " 23:59:59'");
		endif;

		if (isset($search['id']) && $search['id'] !== '' && $search['id'] !== 'undefined') :
			$this->db->where('pd.id', $search['id'], true);
		endif;

		if ($search['jenis_pendaftaran'] !== '') :
			$this->db->where('pd.jenis_pendaftaran', $search['jenis_pendaftaran'], true);
		endif;

		if ($search['jenis_igd'] !== '') :
			$this->db->where('pd.jenis_igd', $search['jenis_igd'], true);
		endif;

		if ($search['no_register'] !== '') :
			$this->db->where('pd.no_register', $search['no_register'], true);
		endif;

		if ($search['no_rm'] !== '') :
			$this->db->like('p.id', $search['no_rm'], 'before', true);
		endif;

		if ($search['nik'] !== '') :
			$this->db->where('p.no_identitas', $search['nik']);
		endif;

		if ($search['nama'] !== '') :
			$this->db->where("p.nama ilike '%" . strtolower($search['nama']) . "%'");
		endif;

		if ($search['tanggal_lahir'] !== '') :
			$this->db->where('p.tanggal_lahir', date2mysql($search['tanggal_lahir']), true);
		endif;

		if ($search['alamat'] !== '') :
			$this->db->where("p.alamat ilike '%" . strtolower($search['alamat']) . "%'");
		endif;

		if ($search['status_dilayani'] !== '') :
			$this->db->where('lp.status_terlayani', $search['status_dilayani']);
		endif;

		if ($search['carabayar'] !== '') :
			$this->db->where("lp.cara_bayar ilike '%" . strtolower($search['carabayar']) . "%'");
			$this->db->or_where("pj.nama ilike '%" . strtolower($search['carabayar']) . "%'"); //penjamin
		endif;

		if ($search['penjamin'] !== '') :
            $this->db->where('pj.id', $search['penjamin']);
        endif;
		
		if ($search['user'] !== '') :
			// $this->db->where('tr.account', $search['user']);
			$this->db->where("pgu.nama ilike '%" . strtolower($search['user']) . "%'");
		endif;

		if ($baru !== null) :
			$this->db->where('pd.status', 'Baru');
		endif;

		if ($lama !== null) :
			$this->db->where('pd.status', 'Lama');
		endif;

		if ($batal !== null) :
			$this->db->where('pd.status', 'Batal');
		endif;

		return $this->db->order_by('pd.id, pd.tanggal_daftar', 'desc');
		// return $this->db->group_by('pd.id, p.nama, p.status_pasien, p.kelamin, p.alamat, sp.nama, tr.account, pj.nama, lp.cara_bayar, lp.no_sep, lp.id, sp.kode_bpjs');
	}

	private function _listPendaftaranIGD($limit, $start, $search)
	{
		$this->sqlPendaftaranIGD($search);
		if ($limit !== 0) :
			$this->db->limit($limit, $start);
		endif;

		return $this->db->get()->result();
	}

	function getListDataPendaftaranIGD($limit, $start, $search)
	{
		$result['data'] = $this->_listPendaftaranIGD($limit, $start, $search);
		$result['jumlah'] = $this->sqlPendaftaranIGD($search)->get()->num_rows();
		$result['pasien_baru'] = $this->sqlPendaftaranIGD($search, $baru = 'Baru', $lama = null, $batal = null)->get()->num_rows();
		$result['pasien_lama'] = $this->sqlPendaftaranIGD($search, $baru = null, $Lama = 'Lama', $batal = null)->get()->num_rows();
		$result['pasien_batal'] = $this->sqlPendaftaranIGD($search, $baru = null, $lama = null, $batal = 'Batal')->get()->num_rows();
		return $result;

		$this->db->close();
	}

	public function getIdentitasPasien($id_pendaftaran)
	{
		return $this->db->select("p.no_identitas as no_ktp,
	       p.nama,
	       p.id as no_rm,
	       case when p.kelamin = 'P' then 'Perempuan' else 'Laki-laki' end as kelamin,
	       p.tempat_lahir,
	       to_char(p.tanggal_lahir, 'DD/MM/YYYY') as tanggal_lahir,
	       p.agama,
	       p.telp      as no_telp,
	       pk.nama     as pekerjaan,
	       p.alamat,
	       p.nama_prop as provinsi,
	       p.nama_kab  as kabupaten,
	       p.nama_kec  as kecamatan,
	       p.nama_kel  as kelurahan,
	       pend.nama   as pendidikan,
	       p.no_rt,
	       p.no_rw,
	       pj.nama     as penjamin,
	       p.status_kawin,
	       sp.jenis_pendaftaran as jenis_pendaftaran,
	       coalesce(p.nama_ibu, p.nama_ayah) as nama_keluarga
	       ")
			->from('sm_pasien p')
			->join('sm_pendaftaran sp', 'p.id = sp.id_pasien')
			->join('sm_pekerjaan pk', 'p.id_pekerjaan = pk.id')
			->join('sm_pendidikan pend', 'p.id_pendidikan = pend.id')
			->join('sm_penjamin pj', 'sp.id_penjamin = pj.id')
			->where('sp.id', $id_pendaftaran)
			->get()->row();
	}

	// case when fpu.is_pasien = '0' then fpu.no_rt else pa.no_rt::integer end as no_rt, 
	// case when fpu.is_pasien = '0' then fpu.no_rw else pa.no_rw::integer end as no_rw,
	public function getPersetujuanUmumById($id){
		$sql = "select fpu.*, pa.nama as nama_pasien, pd.no_register,
       			to_char(pa.tanggal_lahir, 'DD/MM/YYYY') as tanggal_lahir_pasien, 
       			pa.kelamin as kelamin_pasien, pa.id as no_rm,
       			date_part('year',age(pa.tanggal_lahir)) as umur_pasien,
       			case when fpu.is_pasien = '0' then fpu.nama_keluarga else pa.nama end as nama_keluarga,
       			case when fpu.is_pasien = '0' then fpu.jenis_kelamin::varchar else pa.kelamin::varchar end as jenis_kelamin,
       			case when fpu.is_pasien = '0' then fpu.tanggal_lahir else pa.tanggal_lahir end as tanggal_lahir,
       			case when fpu.is_pasien = '0' then date_part('year',age(fpu.tanggal_lahir)) else date_part('year',age(pa.tanggal_lahir)) end as umur,
       			case when fpu.is_pasien = '0' then fpu.alamat else pa.alamat end as alamat,
				case when fpu.is_pasien = '0' then fpu.no_rt::VARCHAR else COALESCE(NULLIF(pa.no_rt, ''), '')::VARCHAR end as no_rt, 
                case when fpu.is_pasien = '0' then fpu.no_rw::VARCHAR else COALESCE(NULLIF(pa.no_rw, ''), '')::VARCHAR end as no_rw,
       			case when fpu.is_pasien = '0' then fpu.provinsi::varchar else pa.nama_prop::varchar end as provinsi,
       			case when fpu.is_pasien = '0' then fpu.kota::varchar else pa.nama_kab::varchar end as kota,
       			case when fpu.is_pasien = '0' then fpu.kecamatan::varchar else pa.nama_kec::varchar end as kecamatan,
       			case when fpu.is_pasien = '0' then fpu.kelurahan::varchar else pa.nama_kel::varchar end as kelurahan,
				case when fpu.is_pasien = '0' then fpu.no_identitas else pa.no_identitas end as no_identitas,
				case when fpu.is_pasien = '0' then fpu.no_hp else pa.telp end as no_hp, fpu.hubungan_keluarga, peg.nama as nama_petugas,
				kab.\"NAMA_KAB\" as nama_kabupaten, kec.\"NAMA_KEC\" as nama_kecamatan, kel.\"NAMA_KEL\" as nama_kelurahan
				from sm_form_persetujuan_umum fpu 
				join sm_layanan_pendaftaran lp ON fpu.id_layanan_pendaftaran = lp.id
				join sm_pendaftaran pd ON lp.id_pendaftaran = pd.id
				join sm_pasien pa ON pd.id_pasien = pa.id
				join sm_pegawai peg ON fpu.id_user = peg.id
				left join sm_opendata_kabupaten kab on fpu.kota = kab.\"NO_KAB\" and kab.\"NO_KAB\" = fpu.kota and kab.\"NO_PROP\" = fpu.provinsi
				left join sm_opendata_kecamatan kec on fpu.kecamatan = kec.\"NO_KEC\" and kec.\"NO_KEC\" = fpu.kecamatan and kec.\"NO_PROP\" = fpu.provinsi and kec.\"NO_KAB\" = fpu.kota
				left join sm_opendata_kelurahan kel on fpu.kelurahan = kel.\"NO_KEL\" and kel.\"NO_KEL\" = fpu.kelurahan and kel.\"NO_PROP\" = fpu.provinsi and kel.\"NO_KAB\" = fpu.kota and kel.\"NO_KEC\" = fpu.kecamatan
				where fpu.id_layanan_pendaftaran = '" . $id . "' ";

		return $this->db->query($sql)->row();
	}

	public function getRingkasanRiwayatMasukDanKeluarById($id)
	{
		$data =  $this->db->select("frrmdk.*, peg.nama as user, peg1.nama as nama_dpjp_utama_1, peg2.nama as nama_dpjp_utama_2, peg3.nama as nama_dpjp_utama_3
		, peg4.nama as nama_dpjp_utama_4, peg5.nama as nama_dpjp_tambahan_1, peg6.nama as nama_dpjp_tambahan_2, peg7.nama as nama_dpjp_tambahan_3, peg8.nama as nama_dpjp_tambahan_4,
		p.nama as nama_pasien, p.id as no_rm, to_char(p.tanggal_lahir, 'DD/MM/YYYY') as tanggal_lahir, ri.waktu_masuk as tanggal_masuk, ri.waktu_keluar as tanggal_keluar,
		date_part('year',age(p.tanggal_lahir)) as umur_pasien, concat (EXTRACT(year FROM AGE(p.tanggal_lahir)), ' thn ', EXTRACT(month FROM AGE(p.tanggal_lahir)), ' bln ', EXTRACT(day FROM AGE(p.tanggal_lahir)), ' hari') as umur,
		p.agama, p.tanggal_lahir, p.status_kawin, p.kelamin, bg.nama as bangsal, k.nama as kelas, pj.nama as penjamin, pp.berat_badan, lp.tindak_lanjut as status_pulang,
		concat_ws ('. ', ( SELECT gss.kode_icdx_rinci FROM sm_golongan_sebab_sakit AS gss WHERE gss.id = d.id_pengkodean ), ( SELECT gss.kode_icdx_rinci FROM sm_golongan_sebab_sakit AS gss WHERE gss.id = d.id_pengkodean_asterik ), gss.nama ) AS diag_awal,
		pp.is_died")
			->from('sm_form_ringkasan_riwayat_masuk_dan_keluar frrmdk')
			->join('sm_pegawai peg', 'frrmdk.id_user = peg.id')
			->join('sm_tenaga_medis tm1', 'frrmdk.dpjp_utama_1 = tm1.id', 'left')
			->join('sm_pegawai peg1', 'tm1.id_pegawai = peg1.id', 'left')
			->join('sm_tenaga_medis tm2', 'frrmdk.dpjp_utama_2 = tm2.id', 'left')
			->join('sm_pegawai peg2', 'tm2.id_pegawai = peg2.id', 'left')
			->join('sm_tenaga_medis tm3', 'frrmdk.dpjp_utama_3 = tm3.id', 'left')
			->join('sm_pegawai peg3', 'tm3.id_pegawai = peg3.id', 'left')
			->join('sm_tenaga_medis tm4', 'frrmdk.dpjp_utama_4 = tm4.id', 'left')
			->join('sm_pegawai peg4', 'tm4.id_pegawai = peg4.id', 'left')
			->join('sm_tenaga_medis tm5', 'frrmdk.dpjp_tambahan_1 = tm5.id', 'left')
			->join('sm_pegawai peg5', 'tm5.id_pegawai = peg5.id', 'left')
			->join('sm_tenaga_medis tm6', 'frrmdk.dpjp_tambahan_2 = tm6.id', 'left')
			->join('sm_pegawai peg6', 'tm6.id_pegawai = peg6.id', 'left')
			->join('sm_tenaga_medis tm7', 'frrmdk.dpjp_tambahan_3 = tm7.id', 'left')
			->join('sm_pegawai peg7', 'tm7.id_pegawai = peg7.id', 'left')
			->join('sm_tenaga_medis tm8', 'frrmdk.dpjp_tambahan_4 = tm8.id', 'left')
			->join('sm_pegawai peg8', 'tm8.id_pegawai = peg8.id', 'left')
			->join('sm_layanan_pendaftaran lp', 'frrmdk.id_layanan_pendaftaran = lp.id')
			->join('sm_penjamin pj', 'lp.id_penjamin = pj.id')
			->join('sm_pendaftaran pd', 'lp.id_pendaftaran = pd.id')
			->join('sm_pasien p', 'pd.id_pasien = p.id')
			->join('sm_rawat_inap ri', 'lp.id = ri.id_layanan_pendaftaran', 'left')
			->join('sm_kelas k', 'ri.id_kelas = k.id', 'left')
			->join('sm_bangsal bg', 'ri.id_bangsal = k.id', 'left')
			->join('sm_profil_pasien pp', 'p.id = pp.id_pasien', 'left')
			->join('sm_diagnosa d', 'lp.id = d.id_layanan_pendaftaran', 'left')
			->join('sm_golongan_sebab_sakit gss', "gss.id = d.id_golongan_sebab_sakit and d.prioritas = 'Utama'", 'left')
			->where('frrmdk.id_layanan_pendaftaran', $id)
			->get()->result();

		foreach ($data as $value) {
			$value->diagnosa_utama             = $this->getDiagnosaListLaporanByIdLayananPendaftaran($value->id_layanan_pendaftaran, 'Utama');
			$value->diagnosa_sekunder          = $this->getDiagnosaListLaporanByIdLayananPendaftaran($value->id_layanan_pendaftaran, 'Sekunder');
			$value->tindakan_utama             = $this->getODCByIdLayananPendaftaran($value->id_layanan_pendaftaran);
			$value->tindakan_sekunder          = $this->getTindakanOperasiByIdLayananPendaftaran($value->id_layanan_pendaftaran);
			$value->layanan_before             = $this->m_pelayanan->getLayananSpesialisasiBefore($value->id_layanan_pendaftaran);
			$value->diagnosa_penyebab_kematian = [];
			if ($value->is_died !== null && $value->is_died === 'Ya') {
				$value->diagnosa_penyebab_kematian = $this->getListDiagnosaPenyebabKematian($value->id_layanan_pendaftaran);
			}
		}

		return $data;
	}

	public function getDiagnosaListLaporanByIdLayananPendaftaran($id_layanan_pendaftaran, $prioritas)
	{
		$sql = "select
				concat(concat(case when gs2.kode_icdx_rinci is null then '' else ' [' end, gs2.kode_icdx_rinci, gs3.kode_icdx_rinci, case when gs2.kode_icdx_rinci is null then '' else '] ' end), case when d.id_golongan_sebab_sakit is not null then gs.nama else d.golongan_sebab_sakit_lain end) AS diagnosa
				FROM sm_layanan_pendaftaran AS lp
				LEFT JOIN sm_diagnosa AS d ON ( d.id_layanan_pendaftaran = lp.ID )
				LEFT JOIN sm_golongan_sebab_sakit AS gs ON ( gs.ID = d.id_golongan_sebab_sakit )
				LEFT JOIN sm_golongan_sebab_sakit AS gs2 ON ( gs2.ID = d.id_pengkodean )
				LEFT JOIN sm_golongan_sebab_sakit AS gs3 ON ( gs3.ID = d.id_pengkodean_asterik )
				WHERE lp.id = $id_layanan_pendaftaran ORDER BY d.prioritas desc";

		return $this->db->query($sql)->result();
	}

	public function getODCByIdLayananPendaftaran($id_layanan_pendaftaran)
	{
		return $this->db->select("l.nama as operasi")
			->from('sm_jadwal_kamar_operasi jko')
			->join('sm_tarif_pelayanan tp', 'tp.id = jko.id_tarif', 'left')
			->join('sm_layanan as l', 'l.id = tp.id_layanan', 'left')
			->where('jko.id_layanan_pendaftaran', $id_layanan_pendaftaran)
			->where('jko.layanan', 'OK')
			->get()->result();
	}

	public function getTindakanOperasiByIdLayananPendaftaran($id_layanan_pendaftaran)
	{
		return $this->db->select("l.nama as layanan")
			->from('sm_tarif_tindakan_pasien ttp')
			->join('sm_tarif_pelayanan tp', 'tp.id = ttp.id_tarif_pelayanan', 'left')
			->join('sm_layanan as l', 'l.id = tp.id_layanan', 'left')
			->where('ttp.id_layanan_pendaftaran', $id_layanan_pendaftaran)
			->get()->result();
	}

	public function getListDiagnosaPenyebabKematian($id_layanan_pendaftaran)
	{
		$sql = "select
				concat(concat(case when gs2.kode_icdx_rinci is null then '' else ' [' end, gs2.kode_icdx_rinci, gs3.kode_icdx_rinci, case when gs2.kode_icdx_rinci is null then '' else '] ' end), case when d.id_golongan_sebab_sakit is not null then gs.nama else d.golongan_sebab_sakit_lain end) AS diagnosa
				FROM sm_layanan_pendaftaran AS lp
				LEFT JOIN sm_diagnosa AS d ON ( d.id_layanan_pendaftaran = lp.ID )
				LEFT JOIN sm_golongan_sebab_sakit AS gs ON ( gs.ID = d.id_golongan_sebab_sakit )
				LEFT JOIN sm_golongan_sebab_sakit AS gs2 ON ( gs2.ID = d.id_pengkodean )
				LEFT JOIN sm_golongan_sebab_sakit AS gs3 ON ( gs3.ID = d.id_pengkodean_asterik )
				WHERE lp.id = $id_layanan_pendaftaran
				AND d.penyebab_kematian = 'on'
				ORDER BY d.prioritas desc";

		return $this->db->query($sql)->result();
	}

	public function getSuratPersetujuanRawatInap($id_pendaftaran)
	{
		return $this->db->select('spri.*, pg.nama as nama_saksi')
			->from('sm_form_persetujuan_rawat_inap as spri')
			->join('sm_layanan_pendaftaran as lp', 'spri.id_layanan_pendaftaran = lp.id')
			->join('sm_pegawai pg', 'spri.id_saksi = pg.id', 'left')
			->where('lp.id_pendaftaran', $id_pendaftaran)
			->order_by('created_at','desc')
			->get()->row();
	}

	public function getDataSepAsal($id_pendaftaran)
	{
		return $this->db->from('sm_asal_sep')->where('id_pendaftaran', $id_pendaftaran)->get()->result();
	}

	function ubahDataSep($id_pendaftaran, $id_user)
	{
		$this->db->query("insert into sm_asal_sep_logs (id_lama, id_pendaftaran,is_rajal,is_ranap,id_user,created_date,id_user_logs,created_date_logs)
							select id, id_pendaftaran,is_rajal,is_ranap,id_user,created_date,'" . $id_user . "', NOW()
							from sm_asal_sep where id_pendaftaran='" . $id_pendaftaran . "'");
	}

	function getTataTertibById($id)
	{
		$sql = "select ftt.*, pa.nama as nama_pasien, pa.kelamin as kelamin_pasien, pd.id_pasien, pa.tanggal_lahir as tanggal_lahir_pasien, pa.telp, (SELECT CONCAT(bg.nama, ' kelas ', k.nama, ' ruang ', ri.no_ruang, ' No. Bed ', ri.no_bed) FROM sm_rawat_inap as ri JOIN sm_layanan_pendaftaran as lpd ON lpd.id = ri.id_layanan_pendaftaran JOIN sm_bangsal as bg ON bg.id = ri.id_bangsal JOIN sm_kelas as k ON k.id= ri.id_kelas WHERE ri.id_layanan_pendaftaran = '" . $id . "') AS asal_ruangan
				from sm_form_tata_tertib ftt 							
				join sm_layanan_pendaftaran lp ON ftt.id_layanan_pendaftaran = lp.id
				join sm_pendaftaran pd ON lp.id_pendaftaran = pd.id
				join sm_pasien pa ON pd.id_pasien = pa.id
				where ftt.id_layanan_pendaftaran = '" . $id . "' ";

		return $this->db->query($sql)->row();
	}

	function getEdukasi($id_layanan_pendaftaran)
	{
		$sql = "select edu.*, ('') as detail,
                tr.account as user
                from sm_edukasi as edu
                join sm_layanan_pendaftaran as lp on (edu.id_layanan_pendaftaran = lp.id) 
                join sm_translucent as tr on (tr.id = edu.id_user)
                where lp.id_pendaftaran = '" . $id_layanan_pendaftaran . "'";

		//	    left join sm_tenaga_medis as tm on (tm.id = edud.id_edukator)

		$data = $this->db->query($sql)->row();
		if ($data) :
			$result = array();
			$sql = "select edud.*, topedu.nama as topik_edukasi, topedu.keterangan, pgedu.nama as edukator
                    from sm_detail_edukasi as edud 
                    join sm_topik_edukasi as topedu on (topedu.id = edud.id_topik_edukasi) 
                    left join sm_pegawai as pgedu on (pgedu.id = edud.id_edukator) 
                    where edud.id_edukasi = '" . $data->id . "' 
                    order by edud.created_date asc";
			$result = $this->db->query($sql)->result();
			if ($result) :
				$data->detail = $result;
			endif;
		endif;

		return $data;
	}

	// SPPIP
	public function getSuratPeryataanPembaharuanIdentitasPasien($id_pendaftaran){
		return $this->db->select('sppip.*')
		->from('sm_form_sppip_recall_implant as sppip')
		->join('sm_layanan_pendaftaran as lp', 'sppip.id_layanan_pendaftaran = lp.id')
		->where('lp.id_pendaftaran', $id_pendaftaran)
		->order_by('created_at','desc')
		->get()->row();
	}

	// PRDNR & FORM 
	function getSuratPenolakanResusitas($id){
		// var_dump($id);die;
		$sql = "select prdnr.*, pa.nama as nama_pasien, pd.id_pasien, 
					pa.kelamin as kelamin_pasien, pa.id as no_rm, 
					date_part('year',age(pa.tanggal_lahir)) as umur_pasien, 
					pa.no_identitas, pa.alamat as alamat_pasien, pa.telp,
					pa.tanggal_lahir as tanggal_lahir_pasien,
					sp.nama as nama_dokter_1,
					sp2.nama as nama_dokter_2,                             
					sp1.nama as dokter,
					spg1.nama as perawat_1,
					spg2.nama as perawat_2,
					tmp.nama as id_user	
        from sm_penolakan_resusitas_dnr prdnr	
        join sm_layanan_pendaftaran lp ON prdnr.id_layanan_pendaftaran = lp.id
		join sm_pendaftaran pd ON lp.id_pendaftaran = pd.id
		join sm_pasien pa ON pd.id_pasien = pa.id      
		left join sm_tenaga_medis tmd ON prdnr.dokter_pelaksana = tmd.id
		left join sm_pegawai sp ON tmd.id_pegawai = sp.id
		left join sm_tenaga_medis tmd2 ON prdnr.dokter_pemberi = tmd2.id
		left join sm_pegawai sp2 ON tmd2.id_pegawai = sp2.id
        left join sm_tenaga_medis tmd1 ON prdnr.dokter_prdnr = tmd1.id
        left join sm_pegawai sp1 ON tmd1.id_pegawai = sp1.id       
        left join sm_tenaga_medis tmp1 ON prdnr.perawat_prdnr_1 = tmp1.id
        left join sm_pegawai spg1 ON tmp1.id_pegawai = spg1.id
        left join sm_tenaga_medis tmp2 ON prdnr.perawat_prdnr_2 = tmp2.id
        left join sm_pegawai spg2 ON tmp2.id_pegawai = spg2.id
        left join sm_translucent st ON prdnr.id_user = st.id
        left join sm_pegawai tmp ON tmp.id = st.id                          
        where lp.id = '" . $id . "' ";		
		return $this->db->query($sql)->row();
	}

	// TPERS UDAH ADA AU PUNYA SIAPA
	function getObatTerapiPulang($id){
		$sql = "select r.*,  COALESCE(sb.nama_lengkap, '') as nama_obat, COALESCE(pg.nama, '') as akun_user,
       			rr.resep_r_jumlah as jumlah_obat, concat_ws(' ', rrd.dosis_racik, sat.nama) as dosis,
       			case when rr.aturan_pakai_manual = '1' then rr.ket_aturan_pakai_manual else rr.aturan_pakai end as frekuensi,
       			sb.roa as cara_pemberian, rr.keterangan_resep as petunjuk_khusus,
       			rr.jam_pemberian_1 as ek_jam_pemberian, rr.jam_pemberian_2 as ek_jam_pemberian_satu, rr.jam_pemberian_3 as ek_jam_pemberian_dua,
       			rr.jam_pemberian_4 as ek_jam_pemberian_tiga, rr.jam_pemberian_5 as ek_jam_pemberian_empat, rr.jam_pemberian_6 as ek_jam_pemberian_lima
				from sm_resep as r
				join sm_resep_r as rr on rr.id_resep = r.id
				join sm_resep_r_detail as rrd on rrd.id_resep_r = rr.id
				left join sm_barang as sb on sb.id = rrd.id_barang
				left join sm_satuan as sat on sat.id = sb.satuan_kekuatan
				left join sm_translucent as st on st.id = r.id_users
				left join sm_pegawai as pg on pg.id = st.id
				where r.id_layanan_pendaftaran = '" . $id . "' 
				and r.is_terapi_pulang = 1";
		return $this->db->query($sql)->result();
	}

	// TPERS + OPAT   
	function getTransferPasienExstraRS($id){
		$sql = "select tpers.*, pa.nama as nama_pasien, pd.id_pasien, 
					pa.kelamin as kelamin_pasien, pa.id as no_rm, 
					date_part('year',age(pa.tanggal_lahir)) as umur_pasien, 
					pa.no_identitas, pa.alamat as alamat_pasien, pa.telp,                 
					pa.tanggal_lahir as tanggal_lahir_pasien,   					
                    spg17.nama as perawat_1,
                    spg18.nama as perawat_2,
                    spg19.nama as perawat_3,
                    spd1.nama as dokter_1,
                    spd2.nama as dokter_2,
                    spd3.nama as dokter_3,		
					spg1.nama as nama_perawat_1,
					spg2.nama as nama_perawat_2,
					spg3.nama as nama_perawat_3,
					spg4.nama as nama_perawat_4,
					spg5.nama as nama_perawat_5,
					spg6.nama as nama_perawat_6,
					spg7.nama as nama_perawat_7,
					spg8.nama as nama_perawat_8,
					spg9.nama as nama_perawat_9,
					spg10.nama as nama_perawat_10,
					spg11.nama as nama_perawat_11,
					spg12.nama as nama_perawat_12,
					spg13.nama as nama_perawat_13,
					spg14.nama as nama_perawat_14,
					spg15.nama as nama_perawat_15,
					spg16.nama as nama_perawat_16,
					tmp.nama as id_user
		from sm_form_tpers tpers	
		join sm_layanan_pendaftaran lp ON tpers.id_layanan_pendaftaran = lp.id
		join sm_pendaftaran pd ON lp.id_pendaftaran = pd.id	
		join sm_pasien pa ON pd.id_pasien = pa.id   
		left join sm_tenaga_medis tmp17 ON tpers.nama_tpers = tmp17.id
        left join sm_pegawai spg17 ON tmp17.id_pegawai = spg17.id
        left join sm_tenaga_medis tmp18 ON tpers.perawat_pendamping_tpers = tmp18.id
        left join sm_pegawai spg18 ON tmp18.id_pegawai = spg18.id
        left join sm_tenaga_medis tmp19 ON tpers.pj_shift_tpers = tmp19.id
        left join sm_pegawai spg19 ON tmp19.id_pegawai = spg19.id  
		left join sm_tenaga_medis tmd1 ON tpers.dokter_dpjp_tpers = tmd1.id
        left join sm_pegawai spd1 ON tmd1.id_pegawai = spd1.id
		left join sm_tenaga_medis tmd2 ON tpers.dokter_pendamping_tpers = tmd2.id
        left join sm_pegawai spd2 ON tmd2.id_pegawai = spd2.id
		left join sm_tenaga_medis tmd3 ON tpers.dokter_pem_tpers = tmd3.id
        left join sm_pegawai spd3 ON tmd3.id_pegawai = spd3.id			
		left join sm_tenaga_medis tmp1 ON tpers.petugas_opst_1 = tmp1.id
        left join sm_pegawai spg1 ON tmp1.id_pegawai = spg1.id
        left join sm_tenaga_medis tmp2 ON tpers.petugas_opst_2 = tmp2.id
        left join sm_pegawai spg2 ON tmp2.id_pegawai = spg2.id
        left join sm_tenaga_medis tmp3 ON tpers.petugas_opst_3 = tmp3.id
        left join sm_pegawai spg3 ON tmp3.id_pegawai = spg3.id
        left join sm_tenaga_medis tmp4 ON tpers.petugas_opst_4 = tmp4.id
        left join sm_pegawai spg4 ON tmp4.id_pegawai = spg4.id
        left join sm_tenaga_medis tmp5 ON tpers.petugas_opst_5 = tmp5.id
        left join sm_pegawai spg5 ON tmp5.id_pegawai = spg5.id
        left join sm_tenaga_medis tmp6 ON tpers.petugas_opst_6 = tmp6.id
        left join sm_pegawai spg6 ON tmp6.id_pegawai = spg6.id
        left join sm_tenaga_medis tmp7 ON tpers.petugas_opst_7 = tmp7.id
        left join sm_pegawai spg7 ON tmp7.id_pegawai = spg7.id
        left join sm_tenaga_medis tmp8 ON tpers.petugas_opst_8 = tmp8.id
        left join sm_pegawai spg8 ON tmp8.id_pegawai = spg8.id
        left join sm_tenaga_medis tmp9 ON tpers.petugas_opst_9 = tmp9.id
        left join sm_pegawai spg9 ON tmp9.id_pegawai = spg9.id
        left join sm_tenaga_medis tmp10 ON tpers.petugas_opst_10 = tmp10.id
        left join sm_pegawai spg10 ON tmp10.id_pegawai = spg10.id
        left join sm_tenaga_medis tmp11 ON tpers.petugas_opst_11 = tmp11.id
        left join sm_pegawai spg11 ON tmp11.id_pegawai = spg11.id
        left join sm_tenaga_medis tmp12 ON tpers.petugas_opst_12 = tmp12.id
        left join sm_pegawai spg12 ON tmp12.id_pegawai = spg12.id
        left join sm_tenaga_medis tmp13 ON tpers.petugas_opst_13 = tmp13.id
        left join sm_pegawai spg13 ON tmp13.id_pegawai = spg13.id
        left join sm_tenaga_medis tmp14 ON tpers.petugas_opst_14 = tmp14.id
        left join sm_pegawai spg14 ON tmp14.id_pegawai = spg14.id
        left join sm_tenaga_medis tmp15 ON tpers.petugas_opst_15 = tmp15.id
        left join sm_pegawai spg15 ON tmp15.id_pegawai = spg15.id
        left join sm_tenaga_medis tmp16 ON tpers.petugas_melakukan = tmp16.id
        left join sm_pegawai spg16 ON tmp16.id_pegawai = spg16.id
		left join sm_translucent st ON tpers.id_user = st.id
		left join sm_pegawai tmp ON tmp.id = st.id                          
		where lp.id = '" . $id . "' ";		
		return $this->db->query($sql)->row();
	}

	// TPERS + OPAT 
	function getDiagnosaManualUtama($id_daftar){
		$sql = " select concat_ws ('. ', ( SELECT gss.kode_icdx_rinci FROM sm_golongan_sebab_sakit AS gss WHERE gss.id = d.id_pengkodean ), ( SELECT gss.kode_icdx_rinci FROM sm_golongan_sebab_sakit AS gss WHERE gss.id = d.id_pengkodean_asterik ), d.golongan_sebab_sakit_lain ) AS nama , lp.id as id_layanan_pendaftaran
			from sm_diagnosa d
			join sm_layanan_pendaftaran lp ON lp.id = d.id_layanan_pendaftaran 
			join sm_pendaftaran pd ON pd.id = lp.id_pendaftaran 
			where lp.id_pendaftaran = '" . $id_daftar . "'
			and lp.jenis_layanan not in('Poliklinik', 'IGD')
			and d.prioritas = 'Utama'
			and d.diagnosa_manual = '1'
			order by lp.id desc limit 1";
		return $this->db->query($sql)->result();
	}

	// TPERS + OPAT 
    function getDiagnosaManualSekunder($id_daftar){
		$sql = " select distinct concat_ws ('. ', ( SELECT gss.kode_icdx_rinci FROM sm_golongan_sebab_sakit AS gss WHERE gss.ID = d.id_pengkodean ), ( SELECT gss.kode_icdx_rinci FROM sm_golongan_sebab_sakit AS gss WHERE gss.ID = d.id_pengkodean_asterik ), d.golongan_sebab_sakit_lain ) AS nama 
			from sm_diagnosa d
			left join sm_layanan_pendaftaran lp ON lp.id = d.id_layanan_pendaftaran 
			left join sm_pendaftaran pd ON pd.id = lp.id_pendaftaran 
			where lp.id_pendaftaran = '" . $id_daftar . "'		 
			and d.prioritas = 'Sekunder'
			and d.diagnosa_manual = '1'";
		return $this->db->query($sql)->result();
	}

	// TPERS + OPAT 
    function getDiagnosaSekunder($id_daftar){
		$sql = " select distinct concat_ws ('. ', ( SELECT gss.kode_icdx_rinci FROM sm_golongan_sebab_sakit AS gss WHERE gss.ID = d.id_pengkodean ), ( SELECT gss.kode_icdx_rinci FROM sm_golongan_sebab_sakit AS gss WHERE gss.ID = d.id_pengkodean_asterik ), gss.nama ) AS nama 
			from sm_diagnosa d
			left join sm_golongan_sebab_sakit gss ON gss.id = d.id_golongan_sebab_sakit 
			left join sm_layanan_pendaftaran lp ON lp.id = d.id_layanan_pendaftaran 
			left join sm_pendaftaran pd ON pd.id = lp.id_pendaftaran 
			where lp.id_pendaftaran = '" . $id_daftar . "'
			and lp.jenis_layanan not in('Poliklinik', 'IGD')
			and d.prioritas = 'Sekunder'
			and d.diagnosa_manual <> '1'";
		return $this->db->query($sql)->result();
	}

	// TPERS + OPAT 
    function getDiagnosa($id_daftar){
		$sql = " select d.*, concat_ws ('. ', ( SELECT gss.kode_icdx_rinci FROM sm_golongan_sebab_sakit AS gss WHERE gss.id = d.id_pengkodean ), ( SELECT gss.kode_icdx_rinci FROM sm_golongan_sebab_sakit AS gss WHERE gss.id = d.id_pengkodean_asterik ), gss.nama ) AS nama , lp.id as id_layanan_pendaftaran
			from sm_diagnosa d
			left join sm_golongan_sebab_sakit gss ON gss.id = d.id_golongan_sebab_sakit 
			join sm_layanan_pendaftaran lp ON lp.id = d.id_layanan_pendaftaran 
			join sm_pendaftaran pd ON pd.id = lp.id_pendaftaran 
			where lp.id_pendaftaran = '" . $id_daftar . "' 
			and lp.jenis_layanan not in('Poliklinik', 'IGD')
			and d.prioritas = 'Utama'
			and d.diagnosa_manual <> '1'
			order by lp.id desc limit 1";
		return $this->db->query($sql)->result();
	}

	
	// DOA_D_O_A
	public function getSuratKeteranganDOA($id_pendaftaran){
		return $this->db->select('sfd.*, spd.nama as nama_dokter,')
		->from('sm_form_doa as sfd')
		->join('sm_layanan_pendaftaran as lp', 'sfd.id_layanan_pendaftaran = lp.id')
		->join('sm_tenaga_medis tmd', 'sfd.dokter_doa = tmd.id', 'left')
		->join('sm_pegawai spd', 'tmd.id_pegawai = spd.id', 'left')
		->where('lp.id_pendaftaran', $id_pendaftaran)
		->order_by('created_at','desc')
		->get()->row();
	}

	// ICPMK
	public function getSuratInformedConsentPMK($id_pendaftaran){
		return $this->db->select('icpmk.*, 	spg1.nama as nama_perawat_1,
											spg2.nama as nama_perawat_2,
											spd.nama as nama_dokter') 
		->from('sm_form_informed_consent_pmk icpmk')
		->join('sm_layanan_pendaftaran as lp', 'icpmk.id_layanan_pendaftaran = lp.id')
		->join('sm_tenaga_medis tmp1', 'icpmk.perawat_1_icpmk = tmp1.id', 'left')
		->join('sm_pegawai spg1', 'tmp1.id_pegawai = spg1.id', 'left')
		->join('sm_tenaga_medis tmp2', 'icpmk.perawat_2_icpmk = tmp2.id', 'left')
		->join('sm_pegawai spg2', 'tmp2.id_pegawai = spg2.id', 'left')
		->join('sm_tenaga_medis tmd', 'icpmk.dokter_icpmk = tmd.id', 'left')
		->join('sm_pegawai spd', 'tmd.id_pegawai = spd.id', 'left')
		->where('lp.id_pendaftaran', $id_pendaftaran)
		->order_by('created_at','desc')
		->get()->row();
	}


	// SKKM
	function getSuratKeteranganKesediaanMembayar($id){
		$sql = "select skkm.*, pa.nama as nama_pasien, pd.id_pasien, 
					pa.kelamin as kelamin_pasien, pa.id as no_rm, 
					date_part('year',age(pa.tanggal_lahir)) as umur_pasien, 
					pa.no_identitas, pa.alamat as alamat_pasien, pa.telp,                 
					pa.tanggal_lahir as tanggal_lahir_pasien,   					
					tmp.nama as id_user
		from sm_surat_pernyataan_kesediaan_membayar skkm	
		join sm_layanan_pendaftaran lp ON skkm.id_layanan_pendaftaran = lp.id
		join sm_pendaftaran pd ON lp.id_pendaftaran = pd.id	
		join sm_pasien pa ON pd.id_pasien = pa.id       
		left join sm_translucent st ON skkm.id_user = st.id
		left join sm_pegawai tmp ON tmp.id = st.id                          
		where lp.id = '" . $id . "' ";		
		return $this->db->query($sql)->row();
	}

	
	// SPPPMK
	// function getSuratPernyataanPersetujuanPenolakanMedisKhusus($id){
	// 	$sql = "select spppmk.*, pa.nama as nama_pasien, pd.id_pasien, 
	// 				pa.kelamin as kelamin_pasien, pa.id as no_rm, 
	// 				date_part('year',age(pa.tanggal_lahir)) as umur_pasien, 
	// 				pa.no_identitas, pa.alamat as alamat_pasien, pa.telp,                 
	// 				pa.tanggal_lahir as tanggal_lahir_pasien,   
	// 				spd1.nama as nama_dokter,					
	// 				tmp.nama as id_user
	// 	from sm_surat_pernyataan_persetujuan_pmk spppmk	
	// 	join sm_layanan_pendaftaran lp ON spppmk.id_layanan_pendaftaran = lp.id
	// 	join sm_pendaftaran pd ON lp.id_pendaftaran = pd.id	
	// 	join sm_pasien pa ON pd.id_pasien = pa.id  
	// 	left join sm_tenaga_medis tmd1 ON spppmk.dokterspppmk = tmd1.id
    //     left join sm_pegawai spd1 ON tmd1.id_pegawai = spd1.id      
	// 	left join sm_translucent st ON spppmk.id_user = st.id
	// 	left join sm_pegawai tmp ON tmp.id = st.id                          
	// 	where lp.id = '" . $id . "' ";		
	// 	return $this->db->query($sql)->row();
	// }
	

	// SP_WE
	public function getSuratPernyataan($id_pendaftaran){
		return $this->db->select('sp.*, 	spg1.nama as nama_perawat_1,
											spg2.nama as nama_perawat_2,
											spd.nama as nama_dokter') 
		->from('sm_form_surat_pernyataan_72_01 sp')
		->join('sm_layanan_pendaftaran as lp', 'sp.id_layanan_pendaftaran = lp.id')
		->join('sm_tenaga_medis tmp1', 'sp.saksi_1_sp = tmp1.id', 'left')
		->join('sm_pegawai spg1', 'tmp1.id_pegawai = spg1.id', 'left')
		->join('sm_tenaga_medis tmp2', 'sp.saksi_2_sp = tmp2.id', 'left')
		->join('sm_pegawai spg2', 'tmp2.id_pegawai = spg2.id', 'left')
		->join('sm_tenaga_medis tmd', 'sp.dokter_sp = tmd.id', 'left')
		->join('sm_pegawai spd', 'tmd.id_pegawai = spd.id', 'left')
		->where('lp.id_pendaftaran', $id_pendaftaran)
		->order_by('created_at','desc')
		->get()->row();
	}

	// TPI B
	function getTravellingPatientInformation($id){
        // var_dump($id);die;
        $sql = "select tpi.*, pa.nama as nama_pasien, pd.id_pasien, 
                pa.kelamin as kelamin_pasien, pa.id as no_rm, 
                date_part('year',age(pa.tanggal_lahir)) as umur_pasien, 
                pa.no_identitas, pa.alamat as alamat_pasien, pa.telp,                 
                pa.tanggal_lahir as tanggal_lahir_pasien,
                spd.nama as dokter,
                COALESCE(sb1.nama_lengkap, '') as obat_1,
                COALESCE(sb2.nama_lengkap, '') as obat_2,
                COALESCE(sb3.nama_lengkap, '') as obat_3,
                COALESCE(sb4.nama_lengkap, '') as obat_4,
                COALESCE(sb5.nama_lengkap, '') as obat_5,
                COALESCE(sb6.nama_lengkap, '') as obat_6,
                COALESCE(sb7.nama_lengkap, '') as obat_7,
                COALESCE(sb8.nama_lengkap, '') as obat_8,
                COALESCE(sb9.nama_lengkap, '') as obat_9,
                COALESCE(sb10.nama_lengkap, '') as obat_10,
                COALESCE(sb11.nama_lengkap, '') as obat_11,
                COALESCE(sb12.nama_lengkap, '') as obat_12,
                COALESCE(sb13.nama_lengkap, '') as obat_13,
                COALESCE(sb14.nama_lengkap, '') as obat_14,
                COALESCE(sb15.nama_lengkap, '') as obat_15,
                tmp.nama as id_user
        from sm_travelling_patient_information as tpi    
        join sm_layanan_pendaftaran lp ON tpi.id_layanan_pendaftaran = lp.id
        join sm_pendaftaran pd ON lp.id_pendaftaran = pd.id 
        join sm_pasien pa ON pd.id_pasien = pa.id    
        left join sm_tenaga_medis tmd ON tpi.nephrologist_consultant = tmd.id       
        left join sm_pegawai spd ON tmd.id_pegawai = spd.id
        left join sm_barang sb1 ON sb1.id = tpi.nama_medication_1
        left join sm_barang sb2 ON sb2.id = tpi.nama_medication_2
        left join sm_barang sb3 ON sb3.id = tpi.nama_medication_3
        left join sm_barang sb4 ON sb4.id = tpi.nama_medication_4
        left join sm_barang sb5 ON sb5.id = tpi.nama_medication_5
        left join sm_barang sb6 ON sb6.id = tpi.nama_medication_6
        left join sm_barang sb7 ON sb7.id = tpi.nama_medication_7
        left join sm_barang sb8 ON sb8.id = tpi.nama_medication_8
        left join sm_barang sb9 ON sb9.id = tpi.nama_medication_9
        left join sm_barang sb10 ON sb10.id = tpi.nama_medication_10
        left join sm_barang sb11 ON sb11.id = tpi.nama_medication_11
        left join sm_barang sb12 ON sb12.id = tpi.nama_medication_12
        left join sm_barang sb13 ON sb13.id = tpi.nama_medication_13
        left join sm_barang sb14 ON sb14.id = tpi.nama_medication_14
        left join sm_barang sb15 ON sb15.id = tpi.nama_medication_15
        left join sm_translucent st ON tpi.id_user = st.id
        left join sm_pegawai tmp ON tmp.id = st.id                          
        where lp.id = '" . $id . "' ";          
        return $this->db->query($sql)->row();
    }


}
