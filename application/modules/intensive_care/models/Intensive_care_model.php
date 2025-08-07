<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Intensive_care_model extends CI_Model
{


	function __construct()
	{
		parent::__construct();
		$this->datetime = date('Y-m-d H:i:s');
		$this->load->model('pelayanan/Pelayanan_model', 'm_pelayanan');
	}

	function getListDataIntensiveCare($limit = 0, $start = 0, $search)
	{
		$query = "";
		$limitation = "";
		if ($limit !== 0) :
			$limitation = " limit " . $limit . " offset " . $start;
		endif;

		$select = "select lp.*, ri.id as id_intensive_care, ri.waktu_masuk, 
					ri.waktu_keluar, pd.id_pasien, pd.no_register, 
					p.nama, p.tanggal_lahir, pd.tanggal_daftar, p.telp,
					COALESCE(sp.nama, '') as layanan,
					COALESCE(pg.nama, '') as dokter, 
					(select bg.id from sm_bangsal as bg where bg.id = ri.id_bangsal) as id_bangsal,
					(select bg.nama from sm_bangsal as bg where bg.id = ri.id_bangsal) as bangsal,
					k.nama as kelas, ri.no_ruang, ri.no_bed, ri.checkout, ri.konfirmasi_icare, 
					ri.waktu_konfirmasi_icare, pj.nama as cara_bayar,
					odri.id_dokter_dpjp, pgdpjp.nama as dokter_dpjp,
					COALESCE(tr.account, '') as user_sep, 
					COALESCE((select case when va.visited_at is not null then '1' else '0' end from sm_visit_anestesi va where va.id_layanan_pendaftaran = lp.id and va.id_pegawai = '" . $this->session->userdata("id_translucent") . "' LIMIT 1 ), '0') as visit_anestesi ";
		$count = "select count(*) as count ";
		$sql = " from sm_layanan_pendaftaran as lp 
				join sm_intensive_care as ri on (ri.id_layanan_pendaftaran = lp.id) 
				join sm_kelas as k on (k.id = ri.id_kelas) ";
		$sqlCount = $sql;
		$sequence[0] = "join sm_pendaftaran as pd on (pd.id = lp.id_pendaftaran) ";
		$sequence[1] = "join sm_pasien as p on (p.id = pd.id_pasien) ";
		$sequence[2] = "left join sm_penjamin as pj on (pj.id = lp.id_penjamin) ";
		$sequence[3] = "left join sm_spesialisasi as sp on (sp.id = lp.id_unit_layanan) ";
		$sequence[4] = "left join sm_tenaga_medis as tm on (tm.id = lp.id_dokter) ";
		$sequence[5] = "left join sm_pegawai as pg on (pg.id = tm.id_pegawai) ";
		$sequence[6] = "left join sm_translucent as tr on (tr.id = lp.id_users_sep) ";
		$sequence[7] = "left join sm_order_intensive_care as odri on (odri.id_intensive_care = ri.id) ";
		$sequence[8] = "left join sm_tenaga_medis as tmdpjp on (tmdpjp.id = odri.id_dokter_dpjp) ";
		$sequence[9] = "left join sm_pegawai as pgdpjp on (pgdpjp.id = tmdpjp.id_pegawai) ";
		$where = " where lp.jenis_layanan = 'Intensive Care' ";
		$order = " order by ri.id desc ";
		$arraySequence = array();

		if ($search["tanggal_awal"] !== "" & $search["tanggal_akhir"] !== "") :
			$query .= " and lp.tanggal_layanan BETWEEN '" . date2mysql($search['tanggal_awal']) . " 00:00:00' AND '" . date2mysql($search['tanggal_akhir']) . " 23:59:59'";
		endif;

		if ($search["key"] !== "") :
			$query .= " and (p.nama ilike '" . $search["key"] . "%' or p.id ilike '%" . $search["key"] . "')";
			if (!in_array(0, $arraySequence)) :
				$sqlCount .= $sequence[0];
				array_push($arraySequence, 0);
			endif;
			if (!in_array(1, $arraySequence)) :
				$sqlCount .= $sequence[1];
				array_push($arraySequence, 1);
			endif;
		endif;

		if ($search["bangsal"] !== "") :
			$query .= " and ri.id_bangsal = '" . $search["bangsal"] . "' ";
		endif;

		// if ($search["kelas"] !== "") :
		// 	$query .= " and ri.id_kelas = '" . $search["kelas"] . "' ";
		// endif;

		if ($search["dokter"] !== "") :
			$query .= " and odri.id_dokter_dpjp = '" . $search["dokter"] . "' ";
		endif;

		if ($search["no_register"] !== "") :
			$query .= " and pd.no_register = '" . $search["no_register"] . "' ";
			if (!in_array(0, $arraySequence)) :
				$sqlCount .= $sequence[0];
				array_push($arraySequence, 0);
			endif;
		endif;

		if ($search["no_sep"] !== "") :
			$query .= " and pd.no_sep = '" . $search["no_sep"] . "' ";
			if (!in_array(0, $arraySequence)) :
				$sqlCount .= $sequence[0];
				array_push($arraySequence, 0);
			endif;
			if (!in_array(1, $arraySequence)) :
				$sqlCount .= $sequence[1];
				array_push($arraySequence, 1);
			endif;
		endif;

		if ($search["no_rm"] !== "") :
			$query .= " and p.id ilike '%" . $search["no_rm"] . "' ";
			if (!in_array(0, $arraySequence)) :
				$sqlCount .= $sequence[0];
				array_push($arraySequence, 0);
			endif;
			if (!in_array(1, $arraySequence)) :
				$sqlCount .= $sequence[1];
				array_push($arraySequence, 1);
			endif;
		endif;

		if ($search["nama"] !== "") :
			$query .= " and p.nama ilike '%" . $search["nama"] . "' ";
			if (!in_array(0, $arraySequence)) :
				$sqlCount .= $sequence[0];
				array_push($arraySequence, 0);
			endif;
			if (!in_array(1, $arraySequence)) :
				$sqlCount .= $sequence[1];
				array_push($arraySequence, 1);
			endif;
		endif;

		if ($search["status_icare"] !== NULL) :
			if ($search["status_icare"] === "Masih Dirawat") :
				$query .= " and ri.checkout = '0' ";
			else :
				if ($search["status_icare"] === "Pulang") :
					$query .= " and ri.checkout = '1' ";
				endif;
			endif;
		endif;

		if ($search['status_pasien_icare'] === 'Sudah') :
			$query .= " AND lp.tindak_lanjut <> '' ";
		elseif ($search['status_pasien_icare'] === 'Belum') :
			$query .= " AND lp.tindak_lanjut is null";
		endif;


		// if ($search["list_admin"] === "Ya" && $this->session->userdata("account_group") !== "Admin") :
		// 	$query .= " and ri.checkout = '0' and lp.status_terlayani != 'Batal' ";
		// endif;

		if ($search["status_keluar"] !== "") :
			$query .= " and lp.tindak_lanjut = '" . $search["status_keluar"] . "' ";
		endif;

		// if (isset($search["status_keluar_not"])) :
		// 	$query .= " and lp.status_terlayani != '" . $search["status_keluar_not"] . "' ";
		// endif;

		$result = $this->db->query($select . $sql . implode("", $sequence) . $where . $query . $order . $limitation)->result();
		foreach ($result as $i => $value) :
			$sqlChild = "select count(*) as jml_resep from sm_resep where id_layanan_pendaftaran = '" . $value->id . "'";
			$result[$i]->jml_resep = $this->db->query($sqlChild)->row()->jml_resep;
			$result[$i]->before = $this->m_pelayanan->getLayananSpesialisasiBefore($value->id);
		endforeach;

		$data["data"] = $result;
		$data["jumlah"] = $this->db->query($count . $sqlCount . $sequence[7] . $where . $query)->row()->count;
		$this->db->close();
		return $data;
	}

	function pembatalanIntensiveCare($id_layanan_pendaftaran)
	{
		$this->db->trans_begin();
		$this->m_pelayanan->updateLastLayanan($id_layanan_pendaftaran);
		$dataIntensiveCare = $this->db->select("id_bed")->where("id_layanan_pendaftaran", $id_layanan_pendaftaran, true)->get("sm_intensive_care")->row();
		if ($dataIntensiveCare) :
			$id_bed = $dataIntensiveCare->id_bed;
			// ubah status bed nya
			$dataUpdateBed = array('keterangan' => 'Tersedia');
			$this->db->where("id", $id_bed, true)->update("sm_bed", $dataUpdateBed);
		else :
			// catat log transaksi error
			$this->load->model('logs/Logs_model', 'm_logs');
			$this->m_logs->recordAdminLogs($id_layanan_pendaftaran, 'Error Status Bed', $id_layanan_pendaftaran);
		endif;

		// ubah juga status terlayani dan tindak lanjut nya jadi batal
		$dataUpdateLayananPendaftaran = array(
			'status_terlayani' => 'Batal',
			'tindak_lanjut' => 'Batal'
		);
		$this->db->where("id", $id_layanan_pendaftaran, true)->update('sm_layanan_pendaftaran', $dataUpdateLayananPendaftaran);

		// ubah data intensive carenya juga
		$dataUpdateIntensiveCare = array(
			'waktu_keluar' => $this->datetime,
			'total_hari' => 0,
			'nominal' => 0,
			'checkout' => '1'
		);
		$this->db->where('id_layanan_pendaftaran', $id_layanan_pendaftaran)->update('sm_intensive_care', $dataUpdateIntensiveCare);

		if ($this->db->trans_status() === false) :
			$this->db->trans_rollback();
			$status = false;
		else :
			$this->db->trans_commit();
			$status = true;
		endif;

		return $status;
	}

	function updateWaktuIntensiveCare($id_layanan_pendaftaran, $data)
	{
		$this->db->trans_begin();
		$this->load->model('pelayanan/Pelayanan_model', 'm_pelayanan');
		// update tanggal layanan ditable layanan pendaftaran
		// $this->db->where('id', $id_layanan_pendaftaran, true)->update('sm_layanan_pendaftaran', array('tanggal_layanan' => $data['waktu_masuk']));

		if ($data['waktu_keluar'] !== NULL) :
			// jika waktu keluar ada
			// $this->db->where('id_layanan_pendaftaran', $id_layanan_pendaftaran, true)->update('sm_intensive_care', array('waktu_masuk' => $data['waktu_masuk']));
			$this->db->where('id_layanan_pendaftaran', $id_layanan_pendaftaran, true)->update('sm_intensive_care', array('waktu_konfirmasi_icare' => $data['waktu_konfirmasi_icare']));
			$statusPulang = $this->db->select('tindak_lanjut')->where('id', $id_layanan_pendaftaran, true)->get('sm_layanan_pendaftaran')->row()->tindak_lanjut;
			$dataLayananPendaftaran = $this->db->where('id', $id_layanan_pendaftaran, true)->get('sm_layanan_pendaftaran')->row();
			$this->m_pelayanan->pembatalanStatusKeluarIcare($dataLayananPendaftaran->id_pendaftaran, $id_layanan_pendaftaran);
			$this->m_pelayanan->dischargeToIntensiveCare($id_layanan_pendaftaran, $data['waktu_keluar']);
			$this->m_pelayanan->insertAdministrasiIntensiveCare($dataLayananPendaftaran->id_pendaftaran, $id_layanan_pendaftaran);
			$dataTindakLanjut = array('tindak_lanjut' => $statusPulang, 'kondisi' => 'Hidup');
			$this->m_pelayanan->updateTindakLanjut($dataLayananPendaftaran->id, $dataTindakLanjut);
			$dataPendaftaran = array('kondisi_keluar' => 'Hidup', 'tanggal_keluar' => $data['waktu_keluar']);
			$this->db->where('id', $dataLayananPendaftaran->id_pendaftaran)->update('sm_pendaftaran', $dataPendaftaran);
		else :
			// jika waktu keluar kosong, update table intensive care
			$this->db->where('id_layanan_pendaftaran', $id_layanan_pendaftaran, true)->update('sm_intensive_care', $data);
		endif;

		if ($this->db->trans_status() === false) :
			$this->db->trans_rollback();
			$status = false;
		else :
			$this->db->trans_commit();
			$status = true;
		endif;

		return $status;
	}

	function resetStatusBed($id_intensive_care)
	{
		$this->db->trans_begin();
		$data_icare = $this->db->where('id', $id_intensive_care, true)->get('sm_intensive_care')->row();
		$checkout = array('checkout' => 1);
		$this->db->where('id', $id_intensive_care, true)->update('sm_intensive_care', $checkout);
		if ($data_icare !== NULL) :
			$update = array('keterangan' => 'Tersedia', 'penghuni' => NULL);
			$this->db->where('id', $data_icare->id_bed)->update('sm_bed', $update);
		endif;

		if ($this->db->trans_status() === false) :
			$this->db->trans_rollback();
			$status = false;
		else :
			$this->db->trans_commit();
			$status = true;
		endif;

		return $status;
	}

	// pengkajian awal icare
	function updatePengkajianAwalIcare($data_kajian_keperawatan, $data_kajian_medis, $id_kajian_keperawatan, $id_kajian_medis)
	{
		$this->db->trans_begin();
		if ($id_kajian_keperawatan === '' || $id_kajian_medis === '') :
			$data_kajian_keperawatan['created_date'] = $this->datetime;
			$this->db->insert('sm_kajian_keperawatan_icare', $data_kajian_keperawatan);
			$data_kajian_medis['created_date'] = $this->datetime;
			$this->db->insert('sm_kajian_medis_icare', $data_kajian_medis);

			if ($this->db->trans_status() === false) :
				$this->db->trans_rollback();
				$status = false;
				$message = 'Gagal menambahkan pengkajian awal pasien intensive care';
			else :
				$this->db->trans_commit();
				$status = true;
				$message = 'Berhasil menambahkan pengkajian awal pasien intensive care';
			endif;
		else :
			// ambil data kajian keperawatan sebelumnya
			$data_before_keperawatan = $this->db->select("*, '' as id_users, '' as tanggal_ubah")->from('sm_kajian_keperawatan_icare')->where('id', $id_kajian_keperawatan)->get()->row();
			unset($data_before_keperawatan->id);
			$data_before_keperawatan->id_users = $this->session->userdata('id_translucent');
			$data_before_keperawatan->tanggal_ubah = $this->datetime;

			// store ke sm_kajian_keperawatan_icare_logs sebelum ada perubahan
			$this->db->insert('sm_kajian_keperawatan_icare_logs', $data_before_keperawatan);

			// ambil data kajian medis sebelumnya
			$data_before_medis = $this->db->select("*, '' as id_users, '' as tanggal_ubah")->from('sm_kajian_medis_icare')->where('id', $id_kajian_medis)->get()->row();
			unset($data_before_medis->id);
			$data_before_medis->id_users = $this->session->userdata('id_translucent');
			$data_before_medis->tanggal_ubah = $this->datetime;

			// store ke sm_kajian_medis_icare_logs sebelum ada perubahan
			$this->db->insert('sm_kajian_medis_icare_logs', $data_before_medis);

			unset($data_kajian_keperawatan['waktu_pengkajian']);
			$data_kajian_keperawatan['updated_date'] = $this->datetime;
			$this->db->where('id', $id_kajian_keperawatan, true)->update('sm_kajian_keperawatan_icare', $data_kajian_keperawatan);
			$data_kajian_medis['updated_date'] = $this->datetime;
			$this->db->where('id', $id_kajian_medis, true)->update('sm_kajian_medis_icare', $data_kajian_medis);

			// record logs
			$this->load->model('logs/Logs_model', 'm_logs');
			$this->m_logs->recordAdminLogs($data_kajian_keperawatan['id_layanan_pendaftaran'], 'Ubah Pengkajian Awal Intensive Care');

			if ($this->db->trans_status() === false) :
				$this->db->trans_rollback();
				$status = false;
				$message = 'Gagal mengubah pengkajian awal pasien intensive care';
			else :
				$this->db->trans_commit();
				$status = true;
				$message = 'Berhasil mengubah pengkajian awal pasien intensive care';
			endif;
		endif;

		return array('status' => $status, 'message' => $message);
	}

	function getKajianKeperawatan($id_layanan_pendaftaran)
	{
		return $this->db->select('kkr.*, pgp.nama as perawat, pgd.nama as verifikator_dpjp')
			->from('sm_kajian_keperawatan_icare as kkr')
			->join('sm_tenaga_medis as tmp', 'tmp.id = kkr.id_perawat', 'left')
			->join('sm_pegawai as pgp', 'pgp.id = tmp.id_pegawai', 'left')
			->join('sm_tenaga_medis as tmd', 'tmd.id = kkr.id_verifikasi_dokter_dpjp', 'left')
			->join('sm_pegawai as pgd', 'pgd.id = tmd.id_pegawai', 'left')
			->where('kkr.id_layanan_pendaftaran', $id_layanan_pendaftaran, true)
			->get()
			->row();
	}

	function getKajianMedis($id_layanan_pendaftaran)
	{
		return $this->db->select('kmr.*, pgd.nama as dokter_dpjp, pgdp.nama as dokter_pengkajian')
			->from('sm_kajian_medis_icare as kmr')
			->join('sm_tenaga_medis as tmd', 'tmd.id = kmr.id_dokter_dpjp', 'left')
			->join('sm_pegawai as pgd', 'pgd.id = tmd.id_pegawai', 'left')
			->join('sm_tenaga_medis as tmdp', 'tmdp.id = kmr.id_dokter_pengkajian', 'left')
			->join('sm_pegawai as pgdp', 'pgdp.id = tmdp.id_pegawai', 'left')
			->where('kmr.id_layanan_pendaftaran', $id_layanan_pendaftaran, true)
			->get()
			->row();
	}

	function getKajianKeperawatanLogs($id_layanan_pendaftaran)
	{
		return $this->db->select('kkr.*, pgp.nama as perawat, pgd.nama as verifikator_dpjp, pgu.nama as user')
			->from('sm_kajian_keperawatan_icare_logs as kkr')
			->join('sm_tenaga_medis as tmp', 'tmp.id = kkr.id_perawat', 'left')
			->join('sm_pegawai as pgp', 'pgp.id = tmp.id_pegawai', 'left')
			->join('sm_tenaga_medis as tmd', 'tmd.id = kkr.id_verifikasi_dokter_dpjp', 'left')
			->join('sm_pegawai as pgd', 'pgd.id = tmd.id_pegawai', 'left')
			->join('sm_translucent as tr', 'tr.id = kkr.id_users', 'left')
			->join('sm_pegawai as pgu', 'pgu.id = tr.id', 'left')
			->where('kkr.id_layanan_pendaftaran', $id_layanan_pendaftaran, true)
			->get()
			->result();
	}

	function getKajianMedisLogs($id_layanan_pendaftaran)
	{
		return $this->db->select('kmr.*, pgd.nama as dokter_dpjp, pgdp.nama as dokter_pengkajian, pgu.nama as user')
			->from('sm_kajian_medis_icare_logs as kmr')
			->join('sm_tenaga_medis as tmd', 'tmd.id = kmr.id_dokter_dpjp', 'left')
			->join('sm_pegawai as pgd', 'pgd.id = tmd.id_pegawai', 'left')
			->join('sm_tenaga_medis as tmdp', 'tmdp.id = kmr.id_dokter_pengkajian', 'left')
			->join('sm_pegawai as pgdp', 'pgdp.id = tmdp.id_pegawai', 'left')
			->join('sm_translucent as tr', 'tr.id = kmr.id_users', 'left')
			->join('sm_pegawai as pgu', 'pgu.id = tr.id', 'left')
			->where('kmr.id_layanan_pendaftaran', $id_layanan_pendaftaran, true)
			->get()
			->result();
	}

	// surat kontrol
	function updateSuratKontrol($data)
	{
		$this->db->trans_begin();
		$id = safe_post('id_surat_kontrol');
		if (!$id) :
			$data['created_date'] = $this->datetime;
			$this->db->insert('sm_surat_kontrol', $data);
			$id = $this->db->insert_id();

			if ($this->db->trans_status() === false) :
				$this->db->trans_rollback();
				$response = array('status' => false, 'message' => 'Gagal menyimpan data.');
			else :
				$this->db->trans_commit();
				$response = array('id' => $id, 'status' => true, 'message' => 'Berhasil menyimpan data.');
			endif;

			return $response;
		else :
			$data['updated_date'] = $this->datetime;
			$this->db->where('id', $id, true)->update('sm_surat_kontrol', $data);

			if ($this->db->trans_status() === false) :
				$this->db->trans_rollback();
				$response = array('status' => false, 'message' => 'Gagal mengubah data.');
			else :
				$this->db->trans_commit();
				$response = array('id' => $id, 'status' => true, 'message' => 'Berhasil mengubah data.');
			endif;

			return $response;
		endif;
	}

	function getDataSuratKontrol($id_pendaftaran, $id_layanan_pendaftaran)
	{
		$data['surat'] = $this->db->select("sk.*, sp.nama as poli")
			->from('sm_surat_kontrol as sk')
			->join('sm_spesialisasi as sp', 'sp.id = sk.id_spesialisasi', 'left')
			->where('sk.id_pendaftaran', $id_pendaftaran, true)
			->where('sk.id_layanan_pendaftaran', $id_layanan_pendaftaran, true)
			->get()
			->row();
		$data['pasien'] = $this->db->select("p.nama, p.tanggal_lahir, p.alamat, p.kelamin")
			->from('sm_pasien as p')
			->join('sm_pendaftaran as pd', 'pd.id_pasien = p.id')
			->where('pd.id', $id_pendaftaran, true)
			->get()
			->row();
		$this->load->model('pelayanan/Pelayanan_model', 'm_pelayanan');
		$this->load->model('rekam_medis/Rekam_medis_model', 'm_rekam_medis');
		$data['diagnosa'] = $this->m_pelayanan->getDiagnosaPemeriksaan($id_layanan_pendaftaran);

		$penjualan = $this->m_rekam_medis->getObat($id_layanan_pendaftaran);
		if (count((array)$penjualan) > 0) :

			foreach ($penjualan as $val) {
				$data['obat'][] = $this->m_rekam_medis->getDetailObat($val->id, 0);
			}
		// $data['obat'] = $this->m_rekam_medis->getDetailObat($penjualan->id);
		//$data['obat'] = $this->m_rekam_medis->getDetailObat('512');




		endif;
		return $data;
	}
	// end surat kontrol

	function getPemeriksaanIcare($q, $start, $limit)
	{
		$this->db->select("l.id, l.nama as layanan, 
                        coalesce(ll.nama, '<i>Tidak ada parent layanan</i>', concat_ws('', '<i>',ll.nama,'</i>')) as layanan_parent")
			->from('sm_layanan as l')
			->join('sm_layanan as ll', 'll.id = l.id_parent', 'left')
			->join('sm_jenis_pemeriksaan as jp', 'jp.id = l.id_jenis_pemeriksaan', 'left');

		$this->db->where('l.nama ilike ', "%" . $q . "%");
		$this->db->where('l.id_jenis_pemeriksaan', 14);
		$this->db->group_start();
		$this->db->like('jp.nama', 'Pemeriksaan dan Konsultasi');
		$this->db->or_like('jp.nama', 'Tindakan Poliklinik');
		$this->db->or_like('jp.nama', 'Tindakan Rawat Darurat');
		$this->db->or_like('jp.nama', 'Pelayanan Rawat Inap');
		$this->db->or_like('jp.nama', 'Pelayanan Intensive Care');
		$this->db->or_like('jp.nama', 'Pelayanan Pemulasaran Jenazah');
		$this->db->or_like('jp.nama', 'Pelayanan Rehabilitasi Medik');
		$this->db->group_end();

		$this->db->limit($limit, $start);
		$this->db->order_by('l.nama');

		$data['data'] = $this->db->get()->result();
		$data['total'] = $this->db->get('sm_layanan')->num_rows();

		return $data;
	}

	function cekDaftar($id)
	{
		return $this->db->select("lp.*")
			->from('sm_layanan_pendaftaran as lp')
			->join('sm_pendaftaran as pd', 'pd.id = lp.id_pendaftaran')
			->where('pd.id', $id, true)
			->where('lp.jenis_layanan', 'IGD')
			->order_by('lp.id', 'asc')
			->get()
			->result();
		$this->db->close();
	}

	function getDiagnosaUtama($id_layanan_pendaftaran)
	{
		$sql = " select concat_ws ('. ', ( SELECT gss.kode_icdx_rinci FROM sm_golongan_sebab_sakit AS gss WHERE gss.id = d.id_pengkodean ), ( SELECT gss.kode_icdx_rinci FROM sm_golongan_sebab_sakit AS gss WHERE gss.id = d.id_pengkodean_asterik ), gss.nama ) AS nama 
			from sm_diagnosa d
			left join sm_golongan_sebab_sakit gss ON gss.id = d.id_golongan_sebab_sakit
			where d.id_layanan_pendaftaran = '" . $id_layanan_pendaftaran . "' 
			and d.prioritas = 'Utama'";
		return $this->db->query($sql)->result();
	}

	function getDiagnosaManualAwal($id_layanan_pendaftaran)
	{
		$sql = " select concat_ws ('. ', ( SELECT gss.kode_icdx_rinci FROM sm_golongan_sebab_sakit AS gss WHERE gss.id = d.id_pengkodean ), ( SELECT gss.kode_icdx_rinci FROM sm_golongan_sebab_sakit AS gss WHERE gss.id = d.id_pengkodean_asterik ), d.golongan_sebab_sakit_lain ) AS nama_manual 
			from sm_diagnosa d
			left join sm_golongan_sebab_sakit gss ON gss.id = d.id_golongan_sebab_sakit
			where d.id_layanan_pendaftaran = '" . $id_layanan_pendaftaran . "' 
			and d.prioritas = 'Utama'
			and d.diagnosa_manual = '1'";
		return $this->db->query($sql)->result();
	}

	function getDiagnosa($id_daftar)
	{
		$sql = " select d.*, concat_ws ('. ', ( SELECT gss.kode_icdx_rinci FROM sm_golongan_sebab_sakit AS gss WHERE gss.id = d.id_pengkodean ), ( SELECT gss.kode_icdx_rinci FROM sm_golongan_sebab_sakit AS gss WHERE gss.id = d.id_pengkodean_asterik ), gss.nama ) AS nama  , lp.id as id_layanan_pendaftaran
			from sm_diagnosa d
			left join sm_golongan_sebab_sakit gss ON gss.id = d.id_golongan_sebab_sakit 
			join sm_layanan_pendaftaran lp ON lp.id = d.id_layanan_pendaftaran 
			join sm_pendaftaran pd ON pd.id = lp.id_pendaftaran 
			where lp.id_pendaftaran = '" . $id_daftar . "' 
			and d.prioritas = 'Utama'
			and d.diagnosa_manual <> '1'
			order by lp.id desc limit 1";

		return $this->db->query($sql)->result();
	}

	function getDiagnosaManualUtama($id_daftar)
	{
		$sql = " select concat_ws ('. ', ( SELECT gss.kode_icdx_rinci FROM sm_golongan_sebab_sakit AS gss WHERE gss.id = d.id_pengkodean ), ( SELECT gss.kode_icdx_rinci FROM sm_golongan_sebab_sakit AS gss WHERE gss.id = d.id_pengkodean_asterik ), d.golongan_sebab_sakit_lain ) AS nama  , lp.id as id_layanan_pendaftaran
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

	public function getDiagnosaUtamaUnitLainnya($id_daftar, $dsu, $dsmu)
	{
		$sql = " select concat_ws ('. ', ( SELECT gss.kode_icdx_rinci FROM sm_golongan_sebab_sakit AS gss WHERE gss.id = d.id_pengkodean ), ( SELECT gss.kode_icdx_rinci FROM sm_golongan_sebab_sakit AS gss WHERE gss.id = d.id_pengkodean_asterik ), d.golongan_sebab_sakit_lain ) AS nama  , lp.id as id_layanan_pendaftaran
			from sm_diagnosa d
			join sm_layanan_pendaftaran lp ON lp.id = d.id_layanan_pendaftaran 
			join sm_pendaftaran pd ON pd.id = lp.id_pendaftaran 
			where lp.id_pendaftaran = '" . $id_daftar . "'
			and lp.jenis_layanan not in('Poliklinik', 'IGD')
			and d.prioritas = 'Utama'";

		$layananDeleted = $dsu[0]->id_layanan_pendaftaran ?? $dsmu[0]->id_layanan_pendaftaran ?? null;

		$data = $this->db->query($sql)->result();
		return array_values(array_filter($data, function ($value) use ($layananDeleted) {
			return $value->id_layanan_pendaftaran != $layananDeleted;
		}));
	}

	function getDiagnosaSekunder($id_daftar)
	{
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

	function getDiagnosaManualSekunder($id_daftar)
	{
		$sql = " select distinct concat_ws ('. ', ( SELECT gss.kode_icdx_rinci FROM sm_golongan_sebab_sakit AS gss WHERE gss.ID = d.id_pengkodean ), ( SELECT gss.kode_icdx_rinci FROM sm_golongan_sebab_sakit AS gss WHERE gss.ID = d.id_pengkodean_asterik ), d.golongan_sebab_sakit_lain ) AS nama 
			from sm_diagnosa d
			left join sm_layanan_pendaftaran lp ON lp.id = d.id_layanan_pendaftaran 
			left join sm_pendaftaran pd ON pd.id = lp.id_pendaftaran 
			where lp.id_pendaftaran = '" . $id_daftar . "'
			and d.prioritas = 'Sekunder'
			and d.diagnosa_manual = '1'";

		return $this->db->query($sql)->result();
	}

	function cekLaboratorium($id)
	{
		return $this->db->select("lb.*")
			->from('sm_laboratorium as lb')
			->join('sm_layanan_pendaftaran as lp', 'lp.id = lb.id_layanan_pendaftaran')
			->join('sm_pendaftaran as pd', 'pd.id = lp.id_pendaftaran')
			->where('pd.id', $id, true)
			->group_by('lb.id', 'asc')
			->get()
			->result();
		$this->db->close();
	}

	function cekRadiologi($id)
	{
		return $this->db->select("sr.kode, sdr.hasil, sdr.html, sl.nama as layanan")
			->from('sm_detail_radiologi as sdr')
			->join('sm_tarif_pelayanan as stp', 'stp.id = sdr.id_tarif', 'left')
			->join('sm_layanan as sl', 'sl.id = stp.id_layanan', 'left')
			->join('sm_radiologi as sr', 'sr.id = sdr.id_radiologi', 'left')
			->join('sm_layanan_pendaftaran as lp', 'lp.id = sr.id_layanan_pendaftaran')
			->join('sm_pendaftaran as pd', 'pd.id = lp.id_pendaftaran')
			->where('pd.id', $id, true)
			->group_by('sdr.id, sr.kode, sl.nama')
			->get()
			->result();
		$this->db->close();
	}

	function getPengobatan($id_daftar)
	{
		return $this->db->distinct("concat ( br.nama, ' (', rs.aturan_pakai, ')', CASE WHEN rs.keterangan_resep IS NULL THEN '' ELSE concat(' Keterangan Resep: ', rs.keterangan_resep) END ) AS nama")
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
		$this->db->close();
	}

	function getPengobatanNew($id_daftar)
	{
		return $this->db->select("concat ( br.nama_lengkap, ' (', case when rs.aturan_pakai_manual is not null and rs.aturan_pakai_manual != '0' then rs.ket_aturan_pakai_manual else rs.aturan_pakai end, ')' ) AS nama")
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
		$this->db->close();
	}

	function getResumeMedis($id)
	{
		$sql = "select pd.id_pasien,
			pd.status as kunjungan,
			p.nama as nama_pasien,
			p.alamat,
			p.nama_kec,
			concat (EXTRACT(year FROM AGE(p.tanggal_lahir)), ' thn ', EXTRACT(month FROM AGE(p.tanggal_lahir)), ' bln ', EXTRACT(day FROM AGE(p.tanggal_lahir)), ' hari') as umur,
			p.kelamin,
			pj.nama as penjamin,
			kl.nama as kelas,
			b.nama as ruangan,
			ra.no_ruang,
			ra.no_bed,
			ra.waktu_masuk as tgl_masuk,
			ra.waktu_keluar as tgl_keluar,
			rmr.id as id_rmr,
			concat(concat(case when gs2.kode_icdx_rinci is null then '' else ' [' end, gs2.kode_icdx_rinci, gs3.kode_icdx_rinci, case when gs2.kode_icdx_rinci is null then '' else '] ' end), case when d.id_golongan_sebab_sakit is not null then gs.nama else d.golongan_sebab_sakit_lain end) AS icdx_diagnosa,
			pg.nama as nama_dokter,
			an.keluhan_utama, an.riwayat_penyakit_sekarang, an.riwayat_penyakit_dahulu, an.riwayat_penyakit_keluarga, an.anamnesa_sosial, an.pemeriksaan_penunjang, an.keadaan_umum, an.kesadaran, an.gcs, an.rr, an.suhu, an.tensi_sistolik as sistolik, an.tensi_diastolik as diastolik, an.nadi, an.nps, pp.tinggi_badan as tinggi_badan_ranap, pp.berat_badan as berat_badan_ranap, an.tinggi_badan, an.berat_badan, an.kepala, an.leher, an.thorax, an.pulmo, an.cor, an.abdomen, an.genitalia, an.ekstrimitas, an.usul_tindak_lanjut,
			so.subject, so.objective, so.assessment, so.plan, so.keterangan as ket_soap, rmr.*, rmkr.*

			from sm_pasien p
			join sm_profil_pasien as pp on (p.id = pp.id_pasien)
			left join sm_pendaftaran as pd on (pd.id_pasien = p.id)
			left join sm_penjamin as pj on (pj.id = pd.id_penjamin)
			left join sm_layanan_pendaftaran as lp on (lp.id_pendaftaran = pd.id)
			left join sm_order_intensive_care as ori on (ori.id_pendaftaran = pd.id)
			left join sm_tenaga_medis as tm on (tm.id = ori.id_dokter_dpjp)
			left join sm_pegawai as pg on (pg.id = tm.id_pegawai)
			left join sm_unit as un on (un.id = lp.id_unit_layanan)
			left join sm_intensive_care as ra on (ra.id_layanan_pendaftaran = lp.id)
			left join sm_kelas as kl on (kl.id = ra.id_kelas)
			left join sm_bangsal as b on (b.id = ra.id_bangsal)
			left join sm_spesialisasi as sp on (sp.id = lp.id_unit_layanan)
			left join sm_diagnosa as d on (d.id_layanan_pendaftaran = lp.id)
			left join sm_golongan_sebab_sakit as gs on (gs.id = d.id_golongan_sebab_sakit) 
			left join sm_golongan_sebab_sakit as gs2 on (gs2.id = d.id_pengkodean) 
			left join sm_golongan_sebab_sakit as gs3 on (gs3.id = d.id_pengkodean_asterik)
			left join sm_anamnesa as an on (an.id_layanan_pendaftaran = lp.id)
			left join sm_soap as so on (so.id_layanan_pendaftaran = lp.id )
			Left join sm_resume_medis_intensive_care as rmr on (rmr.id_pendaftaran = pd.id)
			left join sm_resume_medis_kontrol_ranap rmkr on (rmkr.id_layanan_pendaftaran = lp.id)			
	
			where pd.id = '" . $id . "'
			order by rmr.id desc";
		return $this->db->query($sql)->result();
	}

	function getTindakanLaboratorium($id_layanan_pendaftaran)
	{
		$sql = " SELECT concat( case when dlab.id_pengkodean is null then '' else '[' end, ( SELECT tp.code FROM sm_icd_ix AS tp WHERE tp.ID = dlab.id_pengkodean ), case when dlab.id_pengkodean is null then '' else '] ' end, pl.nama) as nama 
					
			from sm_detail_laboratorium as dlab
			join sm_laboratorium as lab ON ( lab.id = dlab.id_laboratorium )
			join sm_order_laboratorium as olab ON ( olab.id = lab.id_order_laboratorium )
			join sm_tarif_pelayanan as tpl ON (tpl.id = dlab.id_tarif)
			join sm_layanan as pl ON (pl.id = tpl.id_layanan)
			where lab.id_layanan_pendaftaran = '" . $id_layanan_pendaftaran . "'";
		return $this->db->query($sql)->result();
	}

	function getTindakanRadiologi($id_layanan_pendaftaran)
	{
		$sql = " SELECT concat( case when drad.id_pengkodean is null then '' else '[' end, ( SELECT tp.code FROM sm_icd_ix AS tp WHERE tp.ID = drad.id_pengkodean ), case when drad.id_pengkodean is null then '' else '] ' end, pl.nama) as nama 
					
			from sm_detail_radiologi as drad
			join sm_radiologi as rad ON ( rad.id = drad.id_radiologi )
			join sm_order_radiologi as orad ON ( orad.id = rad.id_order_radiologi )
			join sm_tarif_pelayanan as tpl ON (tpl.id = drad.id_tarif)
			join sm_layanan as pl ON (pl.id = tpl.id_layanan)
			where rad.id_layanan_pendaftaran = '" . $id_layanan_pendaftaran . "'";
		return $this->db->query($sql)->result();
	}

	function getTindakanOperasi($id_daftar)
	{
		$sql = " SELECT concat( case when too.id_pengkodean is null then '' else '[' end, ( SELECT tp.code FROM sm_icd_ix AS tp WHERE tp.ID = too.id_pengkodean ), case when too.id_pengkodean is null then '' else '] ' end, pl.nama) as nama 
					
			from sm_tarif_operasi as too
			left join sm_jadwal_kamar_operasi as jko ON ( jko.id = too.id_operasi )
			left join sm_tarif_pelayanan as tpl ON (tpl.id = too.id_tarif)

			left join sm_tenaga_medis as tm ON (too.id_nadis = tm.id)
			left join sm_profesi_nadis as pn ON (tm.id_profesi = pn.id)

			left join sm_layanan as pl ON (pl.id = tpl.id_layanan)
			left join sm_layanan_pendaftaran lp ON lp.id = jko.id_layanan_pendaftaran 
			left join sm_pendaftaran pd ON pd.id = lp.id_pendaftaran 
			where (tm.id_profesi IN ('8', '10') or tm.id_profesi is null) and lp.id_pendaftaran = '" . $id_daftar . "'";
		return $this->db->query($sql)->result();
	}

	function getTindakan($id_daftar)
	{
		$sql = " SELECT DISTINCT concat( case when ttp.id_pengkodean is null then '' else '[' end, ( SELECT tp.code FROM sm_icd_ix AS tp WHERE tp.ID = ttp.id_pengkodean ), case when ttp.id_pengkodean is null then '' else '] ' end, pl.nama) as nama 
					
			from sm_tarif_tindakan_pasien as ttp
			left join sm_tarif_pelayanan as tpl ON (tpl.id = ttp.id_tarif_pelayanan)
						
			left join sm_tenaga_medis as tm ON (ttp.id_operator = tm.id)
			left join sm_profesi_nadis as pn ON (tm.id_profesi = pn.id)
			
			left join sm_layanan as pl ON (pl.id = tpl.id_layanan)
			left join sm_layanan_pendaftaran lp ON lp.id = ttp.id_layanan_pendaftaran 
			left join sm_pendaftaran pd ON pd.id = lp.id_pendaftaran 
			where (tm.id_profesi IN ('8', '10') or tm.id_profesi is null) and lp.id_pendaftaran = '" . $id_daftar . "'";
		return $this->db->query($sql)->result();
	}

	function getResumeMedisKontrol($id)
	{
		return $this->db->select("sjkk.*, COALESCE(pg.nama, '') as dokter, COALESCE(ga.nama, '') as akun_user, CASE
        WHEN to_char(sjkk.tanggal, 'd')='2' THEN 'Senin'
        WHEN to_char(sjkk.tanggal, 'd')='3' THEN 'Selasa'
        WHEN to_char(sjkk.tanggal, 'd')='4' THEN 'Rabu'
        WHEN to_char(sjkk.tanggal, 'd')='5' THEN 'Kamis'
        WHEN to_char(sjkk.tanggal, 'd')='6' THEN 'Jumat'
        WHEN to_char(sjkk.tanggal, 'd')='7' THEN 'Sabtu'
        WHEN to_char(sjkk.tanggal, 'd')='1' THEN 'Minggu'
        END as hari")
			->from('sm_jadwal_kontrol_keperawatan as sjkk')
			->join('sm_layanan_pendaftaran as lp', 'lp.id = sjkk.id_layanan_pendaftaran')
			->join('sm_pendaftaran as pd', 'pd.id = lp.id_pendaftaran')
			->join('sm_tenaga_medis as tm', 'tm.id = sjkk.id_ek_nama_dokter')
			->join('sm_pegawai as pg', 'pg.id = tm.id_pegawai')
			->join('sm_translucent as st', 'st.id = sjkk.user', 'left')
			->join('sm_pegawai as ga', 'ga.id = st.id', 'left')
			->where('pd.id', $id, true)
			->group_by('sjkk.id, pg.nama, ga.nama')
			->get()
			->result();
		$this->db->close();
	}

	function getResumeTerapiPulang($id)
	{
		$sql = "select tpr.*,  COALESCE(sb.nama_lengkap, '') as obat_rm, COALESCE(pg.nama, '') as akun_user
				from sm_resume_medis_terapi_pulang tpr				
				left join sm_barang as sb on sb.id = tpr.obat
				left join sm_translucent as st on st.id = tpr.id_users
				left join sm_pegawai as pg on pg.id = st.id
				where tpr.id_layanan_pendaftaran = '" . $id . "' ";
		return $this->db->query($sql)->result();
	}

	function getObatTerapiPulang($id)
	{
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

	function updateTerapiPulangRM($data)
	{
		if (is_array($data['obat'])) :
			foreach ($data['obat'] as $i => $value) :
				$jam_pemberian       = null;
				$jam_pemberian_satu  = null;
				$jam_pemberian_dua   = null;
				$jam_pemberian_tiga  = null;
				$jam_pemberian_empat = null;
				$jam_pemberian_lima  = null;

				if (!empty($data['ek_jam_pemberian'][$i])) {
					$date          = new DateTime($data['ek_jam_pemberian'][$i]);
					$jam_pemberian = $date->format('H:i:s');
				}
				if (!empty($data['ek_jam_pemberian_satu'][$i])) {
					$date          = new DateTime($data['ek_jam_pemberian_satu'][$i]);
					$jam_pemberian_satu = $date->format('H:i:s');
				}
				if (!empty($data['ek_jam_pemberian_dua'][$i])) {
					$date          = new DateTime($data['ek_jam_pemberian_dua'][$i]);
					$jam_pemberian_dua = $date->format('H:i:s');
				}
				if (!empty($data['ek_jam_pemberian_tiga'][$i])) {
					$date          = new DateTime($data['ek_jam_pemberian_tiga'][$i]);
					$jam_pemberian_tiga = $date->format('H:i:s');
				}
				if (!empty($data['ek_jam_pemberian_empat'][$i])) {
					$date          = new DateTime($data['ek_jam_pemberian_empat'][$i]);
					$jam_pemberian_empat = $date->format('H:i:s');
				}
				if (!empty($data['ek_jam_pemberian_lima'][$i])) {
					$date          = new DateTime($data['ek_jam_pemberian_lima'][$i]);
					$jam_pemberian_lima = $date->format('H:i:s');
				}

				$data_terapi_rm = array(
					'id_layanan_pendaftaran' => $data['id_layanan_pendaftaran'],
					'obat'                   => $value,
					'jumlah_obat'            => $data['jumlah_obat'][$i],
					'dosis'                  => $data['dosis'][$i],
					'frekuensi'              => $data['frekuensi'][$i],
					'cara_pemberian'         => $data['cara_pemberian'][$i],
					'ek_jam_pemberian'       => $jam_pemberian,
					'ek_jam_pemberian_satu'  => $jam_pemberian_satu,
					'ek_jam_pemberian_dua'   => $jam_pemberian_dua,
					'ek_jam_pemberian_tiga'  => $jam_pemberian_tiga,
					'ek_jam_pemberian_empat' => $jam_pemberian_empat,
					'ek_jam_pemberian_lima'  => $jam_pemberian_lima,
					'petunjuk_khusus'        => $data['petunjuk_khusus'][$i],
					'id_users'               => $data['id_users'][$i],
					'created_date'           => date('Y-m-d H:i:s'),
				);

				$this->db->insert('sm_resume_medis_terapi_pulang', $data_terapi_rm);
			endforeach;
		endif;
	}

	function deleteTerapiPulangRM($id)
	{
		return $this->db->where("id", $id)->delete("sm_resume_medis_terapi_pulang");
	}
	function deleteTerapiPulangKeperawatan($id)
	{
		return $this->db->where("id", $id)->delete("sm_terapi_pulang");
	}

	function updateJadwalKontrolResumeMedis($data)
	{
		if (is_array($data['tanggal_kontrol'])) :
			foreach ($data['tanggal_kontrol'] as $i => $value) :
				$data_kontrol = array(
					'id_layanan_pendaftaran' => $data['id_layanan_pendaftaran'],
					'id_pendaftaran'         => $data['id_pendaftaran'],
					'tanggal_kontrol'        => $value,
					'id_ek_nama_dokter'      => $data['id_ek_nama_dokter'][$i],
					'id_users'               => $data['id_users'][$i],
					'tempat_kontrol'         => $data['tempat_kontrol'][$i],
					'created_date'           => $this->datetime,
				);

				$this->db->insert('sm_resume_medis_kontrol_ranap', $data_kontrol);
			endforeach;
		endif;
	}

	function insertJadwalKontrolKeperawatan($data)
	{
		foreach ($data['tanggal_kontrol'] as $i => $value) {
			$data_kontrol = [
				'id_layanan_pendaftaran' => $data['id_layanan_pendaftaran'],
				'tanggal'                => $value,
				'id_ek_nama_dokter'      => $data['id_ek_nama_dokter'][$i],
				'user'                   => $data['id_users'][$i],
				'tempat_kontrol'         => $data['tempat_kontrol'][$i],
				'created_date'           => $this->datetime,
			];
			$this->db->insert('sm_jadwal_kontrol_keperawatan', $data_kontrol);
		}
	}

	function insertTerapiPulangKeperawatan($data)
	{
		if (is_array($data['obat'])) :
			foreach ($data['obat'] as $i => $value) :
				$jam_pemberian       = null;
				$jam_pemberian_satu  = null;
				$jam_pemberian_dua   = null;
				$jam_pemberian_tiga  = null;
				$jam_pemberian_empat = null;
				$jam_pemberian_lima  = null;
				if (!empty($data['ek_jam_pemberian'][$i])) {
					$date1         = new DateTime($data['ek_jam_pemberian'][$i]);
					$jam_pemberian = $date1->format('H:i:s');
				}
				if (!empty($data['ek_jam_pemberian_satu'][$i])) {
					$date2              = new DateTime($data['ek_jam_pemberian_satu'][$i]);
					$jam_pemberian_satu = $date2->format('H:i:s');
				}
				if (!empty($data['ek_jam_pemberian_dua'][$i])) {
					$date3             = new DateTime($data['ek_jam_pemberian_dua'][$i]);
					$jam_pemberian_dua = $date3->format('H:i:s');
				}
				if (!empty($data['ek_jam_pemberian_tiga'][$i])) {
					$date4              = new DateTime($data['ek_jam_pemberian_tiga'][$i]);
					$jam_pemberian_tiga = $date4->format('H:i:s');
				}
				if (!empty($data['ek_jam_pemberian_empat'][$i])) {
					$date5               = new DateTime($data['ek_jam_pemberian_empat'][$i]);
					$jam_pemberian_empat = $date5->format('H:i:s');
				}
				if (!empty($data['ek_jam_pemberian_lima'][$i])) {
					$date6              = new DateTime($data['ek_jam_pemberian_lima'][$i]);
					$jam_pemberian_lima = $date6->format('H:i:s');
				}
				$data_terapi_rm = array(
					'id_layanan_pendaftaran' => $data['id_layanan_pendaftaran'],
					'obat'                   => $value,
					'jumlah_obat'            => $data['jumlah_obat'][$i],
					'dosis'                  => $data['dosis'][$i],
					'frekuensi'              => $data['frekuensi'][$i],
					'cara_pemberian'         => $data['cara_pemberian'][$i],
					'ek_jam_pemberian'       => $jam_pemberian,
					'ek_jam_pemberian_satu'  => $jam_pemberian_satu,
					'ek_jam_pemberian_dua'   => $jam_pemberian_dua,
					'ek_jam_pemberian_tiga'  => $jam_pemberian_tiga,
					'ek_jam_pemberian_empat' => $jam_pemberian_empat,
					'ek_jam_pemberian_lima'  => $jam_pemberian_lima,
					'petunjuk_khusus'        => $data['petunjuk_khusus'][$i],
					'id_users'               => $data['id_users'][$i],
					'created_date'           => date('Y-m-d H:i:s'),
				);

				$this->db->insert('sm_terapi_pulang', $data_terapi_rm);
			endforeach;
		endif;
	}

	function getKeperawatanKontrol($id)
	{
		$sql = "select rmtr.*,  COALESCE(pg.nama, '') as dokter, COALESCE(pgst.nama, '') as akun_user
				from sm_jadwal_kontrol_keperawatan rmtr				
				join sm_tenaga_medis as tm on tm.id = rmtr.id_ek_nama_dokter 
				join sm_pegawai as pg on pg.id = tm.id_pegawai
				left join sm_translucent as st on st.id = rmtr.user
				left join sm_pegawai as pgst on pgst.id = st.id
				where rmtr.id_layanan_pendaftaran = '" . $id . "' ";
		return $this->db->query($sql)->result();
	}

	function getKeperawatanPulang($id)
	{
		$sql = "select tpr.*,  COALESCE(sb.nama_lengkap, '') as obat_rm, COALESCE(pg.nama, '') as akun_user
				from sm_terapi_pulang tpr				
				left join sm_barang as sb on sb.id = tpr.obat
				left join sm_translucent as st on st.id = tpr.id_users
				left join sm_pegawai as pg on pg.id = st.id
				where tpr.id_layanan_pendaftaran = '" . $id . "' ";
		return $this->db->query($sql)->result();
	}

	// CPPRI WH IC
	function getChecklistPenerimaanPasienRawatInapById($id)
	{
		$sql = "select fcpri.*, pa.nama as nama_pasien, pa.kelamin as kelamin_pasien, pd.id_pasien, pa.tanggal_lahir as tanggal_lahir_pasien, pa.telp, (SELECT CONCAT(bg.nama, ' kelas ', k.nama, ' ruang ', ri.no_ruang, ' No. Bed ', ri.no_bed) FROM sm_rawat_inap as ri JOIN sm_layanan_pendaftaran as lpd ON lpd.id = ri.id_layanan_pendaftaran JOIN sm_bangsal as bg ON bg.id = ri.id_bangsal JOIN sm_kelas as k ON k.id= ri.id_kelas WHERE ri.id_layanan_pendaftaran = '" . $id . "') AS asal_ruangan
				from sm_form_checklist_penerimaan_pasien_rawat_inap fcpri 							
				join sm_layanan_pendaftaran lp ON fcpri.id_layanan_pendaftaran = lp.id
				join sm_pendaftaran pd ON lp.id_pendaftaran = pd.id
				join sm_pasien pa ON pd.id_pasien = pa.id
				where fcpri.id_layanan_pendaftaran = '" . $id . "' ";

		return $this->db->query($sql)->result();
	}

	public function cekCPPT($id_pendaftaran)
	{
		$this->db->select('cpt.id');
		$this->db->from('sm_cppt AS cpt');
		$this->db->join('sm_layanan_pendaftaran AS lp', 'cpt.id_layanan_pendaftaran = lp.id', 'left');
		$this->db->where('lp.id_pendaftaran', $id_pendaftaran);
		$this->db->limit(1);

		$query = $this->db->get();

		if ($query->num_rows() > 0) {
			return $query->row()->id;
		} else {
			return NULL;
		}
	}

	public function cekHasilRadiologi($id_pendaftaran)
	{
		$this->db->select('rd.id');
		$this->db->from('sm_radiologi AS rd');
		$this->db->join('sm_layanan_pendaftaran AS lp', 'rd.id_layanan_pendaftaran = lp.id', 'left');
		$this->db->where('lp.id_pendaftaran', $id_pendaftaran);
		$this->db->limit(1);

		$query = $this->db->get();

		if ($query->num_rows() > 0) {
			return $query->row()->id;
		} else {
			return NULL;
		}
	}

	public function cekHasilLaboratorium($id_pendaftaran)
	{
		$sql = "
        SELECT DISTINCT itdl.ono, lb.*
        FROM sm_laboratorium AS lb
        JOIN sm_layanan_pendaftaran AS lp ON lb.id_layanan_pendaftaran = lp.id
        LEFT JOIN sm_item_detail_laboratorium AS itdl ON itdl.id_lab = lb.id
        WHERE lp.id_pendaftaran = ?
        LIMIT 1
    ";

		$query = $this->db->query($sql, array($id_pendaftaran));

		if ($query->num_rows() > 0) {
			return $query->row()->id;
		} else {
			return NULL;
		}
	}
}
