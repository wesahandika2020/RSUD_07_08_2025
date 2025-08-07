<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Order_operasi_model extends CI_Model
{

	function __construct()
	{
		parent::__construct();
		$this->datetime = date('Y-m-d H:i:s');
	}

	private function sqlJadwalOperasi($search)
	{
		$this->db->select("DISTINCT ON (jko.id) 
			jko.*, tp.total, k.nama as kelas,
			COALESCE(jko.klasifikasi, '') as klasifikasi,
			COALESCE(ro.nama, '') as ruang_operasi,
			p.kelamin, p.tanggal_lahir, p.nama as nama_pasien, p.agama, p.telp, COALESCE(l.nama, '') as operasi, COALESCE(ll.nama, '') as parent, p.telp,
			top.id as id_tim_operasi, lp.id_pendaftaran, lp.tindak_lanjut tindak_lanjut_pengirim, concat_ws(' | ', icd.icd9, icd.nama) tindakan_icd9
		");
		$this->db->from('sm_jadwal_kamar_operasi as jko');
		$this->db->join('sm_layanan_pendaftaran as lp', 'jko.id_layanan_pendaftaran = lp.id', 'left');
		$this->db->join('sm_tarif_pelayanan as tp', 'tp.id = jko.id_tarif', 'left');
		$this->db->join('sm_ruang_operasi as ro', 'ro.id = jko.id_ruang_operasi', 'left');
		$this->db->join('sm_kelas as k', 'k.id = tp.id_kelas', 'left');
		$this->db->join('sm_pasien as p', 'p.id = jko.id_pasien', 'left');
		$this->db->join('sm_layanan as l', 'l.id = tp.id_layanan', 'left');
		$this->db->join('sm_layanan as ll', 'll.id = l.id_parent', 'left');
		$this->db->join('sm_tim_operasi as top', 'top.id_jadwal_operasi = jko.id', 'left');
		$this->db->join('sm_icd_ix as icd', 'jko.id_icd9 = icd.id', 'left');
		$this->db->where('jko.layanan', 'OK', true);

		if (($search['tanggal_awal'] !== '') && ($search['tanggal_akhir'] !== '')) :
			$this->db->where("jko.waktu BETWEEN '" . date2mysql($search['tanggal_awal']) . " 00:00:00' AND '" . date2mysql($search['tanggal_akhir']) . " 23:59:59'");
		endif;
		if (isset($search['status']) && $search['status'] !== '') :
			$this->db->where('jko.status', $search['status'], true);
		endif;
		if (isset($search['bobot']) && $search['bobot'] !== '') :
			$this->db->where('jko.klasifikasi', $search['bobot'], true);
		endif;
		if (isset($search['timing']) && $search['timing'] !== '') :
			$this->db->where('jko.timing', $search['timing'], true);
		endif;
		if (isset($search['pasien']) && $search['pasien'] !== '') :
			$this->db->where('p.id', $search['pasien'], true);
		endif;
		if (isset($search['operasi']) && $search['operasi'] !== '') :
			$this->db->where('l.id', $search['operasi'], true);
		endif;
		if (isset($search['kamar']) && $search['kamar'] !== '') :
			$this->db->where('jko.id_ruang_operasi', $search['kamar'], true);
		endif;
		if (isset($search['nadis']) && $search['nadis'] !== '') :
			$this->db->where('top.id_nadis', $search['nadis'], true);
		endif;

		if (isset($search['urut']) && $search['urut'] === 'status') :
			$this->db->order_by('jko.id', 'desc');
			return $this->db->order_by('jko.mulai', 'desc');
		else :
			$this->db->order_by('jko.id', 'desc');
			return $this->db->order_by('jko.waktu', 'desc');
		endif;
	}

	private function _listJadwalOperasi($limit, $start, $search)
	{
		$this->sqlJadwalOperasi($search);
		if ($limit !== 0) :
			$this->db->limit($limit, $start);
		endif;
		$result = $this->db->get()->result();
		foreach ($result as $i => $val) :
			$this->db->select("count(*), COALESCE(pj.nama, 'Umum') as nama, pg.nama as dokter, pd.id_pasien, lp.jenis_layanan, lp.id_penjamin, lp.cara_bayar, lp.id_dokter as id_dokter, pd.tanggal_keluar");
			$this->db->from('sm_layanan_pendaftaran as lp');
			$this->db->join('sm_pendaftaran as pd', 'pd.id = lp.id_pendaftaran');
			$this->db->join('sm_tenaga_medis as tm', 'tm.id = lp.id_dokter', 'left');
			$this->db->join('sm_pegawai as pg', 'pg.id = tm.id_pegawai', 'left');
			$this->db->join('sm_penjamin as pj', 'pj.id = lp.id_penjamin', 'left');
			$this->db->where('lp.id', $val->id_layanan_pendaftaran, true);
			$this->db->group_by('pj.nama, pd.tanggal_keluar, pg.nama, pd.id_pasien, lp.id_dokter, lp.jenis_layanan, lp.id_penjamin, lp.cara_bayar');
			$penjamin = $this->db->get()->row();
			$result[$i]->penjamin = $penjamin->nama;
			$result[$i]->tanggal_keluar = $penjamin->tanggal_keluar;
			$result[$i]->id_pasien = $penjamin->id_pasien;
			$result[$i]->id_dokter = $penjamin->id_dokter;
			$result[$i]->dokter = $penjamin->dokter;
			$result[$i]->jenis_layanan = $penjamin->jenis_layanan;
			$result[$i]->id_penjamin = $penjamin->id_penjamin;
			$result[$i]->cara_bayar = $penjamin->cara_bayar;
		endforeach;
		return $result;
	}

	function getListDataJadwalOperasi($limit = 0, $start = 0, $search)
	{
		$result['data'] = $this->_listJadwalOperasi($limit, $start, $search);
		$result['jumlah'] = $this->sqlJadwalOperasi($search)->get()->num_rows();
		return $result;
		$this->db->close();
	}

	function pembatalanJadwalOperasi($id)
	{
		$this->db->trans_begin();
		$this->db->delete('sm_tarif_operasi', ['id_operasi' => $id]);
		if ($this->db->trans_status() === false) :
			$this->db->trans_rollback();
			$result['status'] = false;
		endif;
		$this->db->delete('sm_tim_operasi', ['id_jadwal_operasi' => $id]);
		if ($this->db->trans_status() === false) :
			$this->db->trans_rollback();
			$result['status'] = false;
		endif;
		$this->db->where('id', $id, true);
		$this->db->update('sm_jadwal_kamar_operasi', ['status' => 'Canceled']);
		if ($this->db->trans_status() === false) :
			$this->db->trans_rollback();
			$result['status'] = false;
			$result['message'] = 'Gagal melakukan pembatalan jadwal operasi';
		else :
			$this->db->trans_commit();
			$result['status'] = true;
			$result['message'] = 'Berhasil melakukan pembatalan jadwal operasi';
		endif;
		return $result;
	}

	function simpanKonfirmasiJadwalOperasi()
	{
		$this->db->trans_begin();
		$id = safe_post('id_jadwal_operasi');
		$status = safe_post('status_permintaan');
		$alasan = safe_post('alasan');
		if ($status === 'Confirmed') :
			$awal = datetime2mysql(safe_post('tanggal_awal'));
			$akhir = datetime2mysql(safe_post('tanggal_akhir'));
			$ruang = safe_post('ruang_operasi');
			$bobot = safe_post('bobot');
			$jenis_anastesi = safe_post('jenis_anastesi');
			$data = array(
				'keterangan' => $alasan,
				'status' => $status,
				'id_ruang_operasi' => $ruang,
				'mulai' => $awal,
				'selesai' => $akhir,
				'klasifikasi' => $bobot,
				'jenis_anastesi' => $jenis_anastesi,
			);
		else :
			$data = array('status' => $status, 'keterangan' => $alasan);
		endif;
		$this->db->where('id', $id, true)->update('sm_jadwal_kamar_operasi', $data);
		if ($this->db->trans_status() === false) :
			$this->db->trans_rollback();
			$response['status'] = false;
			$response['message'] = 'Gagal mengkonfirmasi permintaan operasi!';
		else :
			$this->db->trans_commit();
			$response['status'] = true;
			$response['message'] = 'Permintaan Operasi telah berhasil dikonfirmasi!';
		endif;
		return $response;
	}

	function simpanPelayananOperasi()
	{
		$this->db->trans_begin();
		$this->load->model('pelayanan/Pelayanan_model', 'm_pelayanan');
		$id_pendaftaran = safe_post('id_pendaftaran');
		$id_jadwal_operasi = safe_post('id_jadwal_operasi');
		$id_layanan_pendaftaran = safe_post('id_layanan_pendaftaran');
		$diag_pra = safe_post('diagpra');
		$diag_pasca = safe_post('diagpasca');
		$dokter_bedah = safe_post('dokter_bedah');
		$dokter_anesthesi = safe_post('dokter_anesthesi');
		$dokter_resusitasi = safe_post('dokter_resusitasi');
		// $dokter_pendamping = safe_post('dokter_pendamping');
		$asisten_operator = safe_post('asisten_operator');
		$sirkuler = safe_post('sirkuler');
		$instrumental = safe_post('instrumental');
		$perawat = safe_post('perawat');
		$id_user = $this->session->userdata('id_translucent');
		$id_unit = $this->session->userdata('id_unit');
		$id_tarif = safe_post('tarif_operasi');
		$id_tarif_asli = safe_post('id_tarif_operasi_asli');
		$operator = safe_post('id_operator');
		$tindakan = safe_post('id_tindakan');

		// update table sm_jadwal_kamar_operasi
		$this->db->where('id', $id_jadwal_operasi, true);
		$this->db->update('sm_jadwal_kamar_operasi', [
			'id_layanan_pendaftaran' => $id_layanan_pendaftaran,
			'id_tarif' => $id_tarif,
			'diperiksa' => 'Sudah',
		]);
		if ($this->db->trans_status() === false) :
			$this->db->trans_rollback();
			$response['status']	= false;
		endif;

		// get data tarif
		if ($id_tarif === $id_tarif_asli) :
			$sql_tarif = "SELECT tp.*, pj.id as id_penjamin, 
					COALESCE(pj.diskon, 0) as reimburse, lp.no_polish, jko.id_icd9
					FROM sm_jadwal_kamar_operasi as jko 
					JOIN sm_tarif_pelayanan as tp ON (tp.id = jko.id_tarif) 
					LEFT JOIN sm_layanan_pendaftaran as lp ON (lp.id = jko.id_layanan_pendaftaran) 
					LEFT JOIN sm_penjamin as pj ON (pj.id = lp.id_penjamin) 
					WHERE jko.id = '" . $id_jadwal_operasi . "'";
			$tarif = $this->db->query($sql_tarif)->row();
		else :
			$tarif = $this->db->where('id', $id_tarif)->get('sm_tarif_pelayanan')->row();
		endif;
		// get data layanan pendaftaran
		$data_lp = $this->db->query("SELECT lp.id_penjamin, lp.cara_bayar, 
					lp.no_polish, COALESCE(pj.diskon, 0) as reimburse
					FROM sm_layanan_pendaftaran as lp
					LEFT JOIN sm_penjamin as pj ON (pj.id = lp.id_penjamin) 
					WHERE lp.id = '" . $id_layanan_pendaftaran . "'
		")->row();
		$reimburse_operasi = $data_lp->reimburse / 100 * $tarif->total;

		// query data BHP
		$sql_bhp = "SELECT b.*, (b.hpp + (b.hpp * (b.margin_non_resep / 100))) * (kb.isi * kb.isi_satuan * tb.jumlah) as harga_jual 
			FROM sm_tarif_bhp as tb
			JOIN sm_kemasan_barang as kb ON (kb.id = tb.id_kemasan_barang) 
			JOIN sm_barang as b ON (b.id = kb.id_barang) 
			WHERE tb.id_tarif = '" . $tarif->id . "'";
		$data_bhp = $this->db->query($sql_bhp);
		$list_bhp = $this->getTotalBHPHarga($tarif->id);
		// not use
		if (0 < $data_bhp->num_rows()) :
			$this->db->insert('sm_penjualan', array(
				'waktu' => $this->datetime,
				'id_layanan_pendaftaran' => $id_layanan_pendaftaran,
				'total' => $list_bhp->harga_jual,
				'jenis' => 'BHP',
				'id_unit' => $id_unit,
				'id_users' => $id_user,
			));
			$id_penjualan = $this->db->insert_id();
			if ($this->db->trans_status() === false) :
				$this->db->trans_rollback();
				$response['status'] = false;
			endif;
			foreach ($data_bhp->result() as $data) :
				$this->db->insert('sm_detail_penjualan', array(
					'id_penjualan' => $id_penjualan,
					'id_kemasan' => $data->id_kemasan_barang,
					'qty' => $data->jumlah,
					'hna' => $data->hna * $data->isi * $data->isi_satuan * $data->jumlah,
					'hpp' => $data->hpp * $data->isi * $data->isi_satuan * $data->jumlah,
					'harga_jual' => $data->harga_jual,
				));
				if ($this->db->trans_status() === false) :
					$this->db->trans_rollback();
					$response['status'] = false;
				endif;
			endforeach;
		endif;
		// end not use

		// area diagnosis operasi
		$this->db->delete('sm_diagnosa_operasi', array('id_jadwal_operasi' => $id_jadwal_operasi));
		if ($this->db->trans_status() === false) :
			$this->db->trans_rollback();
			$response['status'] = false;
		endif;
		$this->db->delete('sm_tim_operasi', array('id_jadwal_operasi' => $id_jadwal_operasi));
		if ($this->db->trans_status() === false) :
			$this->db->trans_rollback();
			$response['status'] = false;
		endif;
		if ($diag_pra) :
			foreach ($diag_pra as $data_pra) :
				if ($data_pra !== "") :
					$this->db->insert('sm_diagnosa_operasi', array(
						'id_jadwal_operasi' => $id_jadwal_operasi,
						'id_golongan_sebab_sakit_pra' => $data_pra,
					));
					if ($this->db->trans_status() === false) :
						$this->db->trans_rollback();
						$response['status'] = false;
					endif;
				endif;
			endforeach;
		endif;
		if ($diag_pasca) :
			foreach ($diag_pasca as $data_pasca) :
				if ($data_pasca !== "") :
					$this->db->insert('sm_diagnosa_operasi', array(
						'id_jadwal_operasi' => $id_jadwal_operasi,
						'id_golongan_sebab_sakit_pasca' => $data_pasca,
					));
					if ($this->db->trans_status() === false) :
						$this->db->trans_rollback();
						$response['status'] = false;
					endif;
				endif;
			endforeach;
		endif;
		// end diagnosis operasi

		// area tenaga kesehatan operasi
		if ($dokter_bedah) :
			$this->simpanDataTenagaKesehatanOperasi($dokter_bedah, $id_jadwal_operasi, $tarif->jasa_nadis, 'Dokter Operator');
		endif;
		if ($dokter_anesthesi) :
			$this->simpanDataTenagaKesehatanOperasi($dokter_anesthesi, $id_jadwal_operasi, $tarif->jasa_dokter_anasthesi, 'Dokter Anesthesi');
		endif;
		// if ($dokter_pendamping) :
		// 	$this->simpanDataTenagaKesehatanOperasi($dokter_pendamping, $id_jadwal_operasi, $tarif->jasa_para_no_medis, 'Dokter Pendamping');
		// endif;
		if ($asisten_operator) :
			$this->simpanDataTenagaKesehatanOperasi($asisten_operator, $id_jadwal_operasi, $tarif->jasa_para_no_medis, 'Asisten Operator');
		endif;
		if ($perawat) :
			$this->simpanDataTenagaKesehatanOperasi($perawat, $id_jadwal_operasi, $tarif->jasa_penata_anasthesi, 'Perawat Anesthesi');
		endif;
		if ($instrumental) :
			$this->simpanDataTenagaKesehatanOperasi($instrumental, $id_jadwal_operasi, $tarif->jasa_penata_anasthesi, 'Instrumental');
		endif;
		if ($sirkuler) :
			$this->simpanDataTenagaKesehatanOperasi($sirkuler, $id_jadwal_operasi, $tarif->jasa_penata_anasthesi, 'Sirkuler');
		endif;
		if ($dokter_resusitasi) :
			$this->simpanDataTenagaKesehatanOperasi($dokter_resusitasi, $id_jadwal_operasi, $tarif->jasa_penata_anasthesi, 'Dokter Resusitasi');
		endif;
		// end area tenaga kesehatan operasi

		$check_tarif_operasi = $this->db->get_where('sm_tarif_operasi', ['id_operasi' => $id_jadwal_operasi])->num_rows();
		$data_tarif_operasi = array(
			'waktu' => $this->datetime,
			'id_operasi' => $id_jadwal_operasi,
			'id_tarif' => $tarif->id,
			'id_penjamin' => $data_lp->id_penjamin !== NULL ? $data_lp->id_penjamin : NULL,
			'no_polish' => isset($data_lp->no_polish) ? $data_lp->no_polish : '',
			'jasa_nadis' => $tarif->jasa_nadis,
			'jasa_klinik' => $tarif->jasa_klinik,
			'bobot' => $tarif->bobot,
			'bhp' => isset($list_bhp->harga_jual) ? $list_bhp->harga_jual : 0,
			'bahan_alat' => $tarif->bahan_alat,
			'jasa_dokter_anesthesi' => $tarif->jasa_dokter_anasthesi,
			'jasa_penata_anesthesi' => $tarif->jasa_penata_anasthesi,
			'jasa_instrument' => $tarif->jasa_instrument,
			'jasa_para_no_medis' => $tarif->jasa_para_no_medis,
			'total' => $tarif->total,
			'reimburse' => $reimburse_operasi,
			'is_operasi' => 'Ya',
			'id_icd9' => $tarif->id_icd9
		);
		if ($check_tarif_operasi === 0) :
			$this->db->insert('sm_tarif_operasi', $data_tarif_operasi);
		else :
			$this->db->where(['id_operasi' => $id_jadwal_operasi, 'is_operasi' => 'Ya']);
			$this->db->update('sm_tarif_operasi', $data_tarif_operasi);
		endif;
		if ($this->db->trans_status() === false) :
			$this->db->trans_rollback();
			$response['status'] = false;
		endif;

		// ambil semua data layanan pendaftaran
		$lp = $this->db->get_where('sm_layanan_pendaftaran', ['id' => $id_layanan_pendaftaran])->row();
		if ($lp->jenis_layanan === 'Poliklinik') :
			$jenis_transaksi = "Operasi";
			$check_op = $this->db->query("SELECT id, total 
							FROM sm_pembayaran 
							WHERE id_operasi = '" . $id_jadwal_operasi . "'")->row();
			if (!isset($check_op->id)) :
				$this->m_pelayanan->updatePembayaran($id_pendaftaran, $id_jadwal_operasi, $id_layanan_pendaftaran, $jenis_transaksi, $tarif->total, $reimburse_operasi);
			else :
				if ($id_tarif !== $id_tarif_asli) :
					$tarif_before = $this->db->query("SELECT total FROM sm_tarif_pelayanan WHERE id = '" . $id_tarif_asli . "'")->row();
					$tarif_after = $this->db->query("SELECT total FROM sm_tarif_pelayanan WHERE id = '" . $id_tarif . "'")->row();
					$this->m_pelayanan->deletePembayaran($id_jadwal_operasi, $tarif_before->total, $reimburse_operasi, $jenis_transaksi);
					$this->m_pelayanan->updatePembayaran($id_pendaftaran, $id_jadwal_operasi, $id_layanan_pendaftaran, $jenis_transaksi, $tarif_after->total, $reimburse_operasi);
				endif;
			endif;
		endif;
		if ($lp->jenis_layanan === 'IGD') :
			$jenis_transaksi = "IGD";
			if ($check_tarif_operasi === 0) :
				$this->m_pelayanan->updatePembayaran($id_pendaftaran, $id_layanan_pendaftaran, $id_layanan_pendaftaran, $jenis_transaksi, $tarif->total, $reimburse_operasi);
			else :
				if ($id_tarif !== $id_tarif_asli) :
					$tarif_before = $this->db->query("SELECT total FROM sm_tarif_pelayanan WHERE id = '" . $id_tarif_asli . "'")->row();
					$tarif_after = $this->db->query("SELECT total FROM sm_tarif_pelayanan WHERE id = '" . $id_tarif . "'")->row();
					$this->m_pelayanan->deletePembayaran($id_jadwal_operasi, $tarif_before->total, $reimburse_operasi, $jenis_transaksi);
					$this->m_pelayanan->updatePembayaran($id_pendaftaran, $id_jadwal_operasi, $id_layanan_pendaftaran, $jenis_transaksi, $tarif_after->total, $reimburse_operasi);
				endif;
			endif;
		endif;
		if ($lp->jenis_layanan === 'Rawat Inap') :
			$jenis_transaksi = "Rawat Inap";
			if ($check_tarif_operasi === 0) :
				$this->m_pelayanan->updatePembayaran($id_pendaftaran, $id_layanan_pendaftaran, $id_layanan_pendaftaran, $jenis_transaksi, $tarif->total, $reimburse_operasi);
			else :
				if ($id_tarif !== $id_tarif_asli) :
					$tarif_before = $this->db->query("SELECT total FROM sm_tarif_pelayanan WHERE id = '" . $id_tarif_asli . "'")->row();
					$tarif_after = $this->db->query("SELECT total FROM sm_tarif_pelayanan WHERE id = '" . $id_tarif . "'")->row();
					$this->m_pelayanan->deletePembayaran($id_jadwal_operasi, $tarif_before->total, $reimburse_operasi, $jenis_transaksi);
					$this->m_pelayanan->updatePembayaran($id_pendaftaran, $id_jadwal_operasi, $id_layanan_pendaftaran, $jenis_transaksi, $tarif_after->total, $reimburse_operasi);
				endif;
			endif;
		endif;
		$total = 0;
		$reimburse = 0;
		$this->db->delete('sm_tarif_operasi', ['id_operasi' => $id_jadwal_operasi, 'is_operasi' => 'Tidak']);
		if ($this->db->trans_status() === false) :
			$this->db->trans_rollback();
			$response['status'] = false;
		endif;

		// area tindakan operasi
		if ($tindakan) :
			if ($this->db->trans_status() === false) :
				$this->db->trans_rollback();
				$response['status'] = false;
			endif;
			foreach ($tindakan as $i => $value) :
				$tarif_tindakan = $this->db->get_where('sm_tarif_pelayanan', ['id' => $value])->row();
				$this->db->insert('sm_tarif_operasi', array(
					'waktu' => $this->datetime,
					'id_operasi' => $id_jadwal_operasi,
					'id_nadis' => $operator[$i],
					'jasa_nadis' => $tarif_tindakan->jasa_nadis,
					'jasa_klinik' => $tarif_tindakan->jasa_klinik,
					'total' => $tarif_tindakan->total,
					'bhp' => isset($list_bhp->harga_jual) ? $list_bhp->harga_jual : 0,
					'id_tarif' => $tarif_tindakan->id,
					'id_penjamin' => isset($tarif->id_penjamin) ? $tarif->id_penjamin : NULL,
					'no_polish' => isset($tarif->no_polish) ? $tarif->no_polish : '',
					'bobot' => $tarif_tindakan->bobot,
					'reimburse' => isset($tarif->reimburse) ? $tarif->reimburse / 100 * $tarif_tindakan->total : $reimburse_operasi,
					'is_operasi' => 'Tidak'
				));
				if ($this->db->trans_status() === false) :
					$this->db->trans_rollback();
					$response['status'] = false;
				endif;
				$total = $total + $tarif_tindakan->total;
				$reimburse = $reimburse + $tarif->reimburse / 100 * $tarif_tindakan->total;
			endforeach;
		endif;
		// end area tindakan operasi

		if ($lp->jenis_layanan === 'Poliklinik') :
			$jenis_transaksi = "Operasi";
			$this->m_pelayanan->updatePembayaran($id_pendaftaran, $id_jadwal_operasi, $id_layanan_pendaftaran, $jenis_transaksi, $total, $reimburse_operasi);
		endif;
		if ($lp->jenis_layanan === 'IGD') :
			$jenis_transaksi = "IGD";
			$this->m_pelayanan->updatePembayaran($id_pendaftaran, $id_layanan_pendaftaran, $id_layanan_pendaftaran, $jenis_transaksi, $total, $reimburse_operasi);
		endif;
		if ($lp->jenis_layanan === 'Rawat Inap') :
			$jenis_transaksi = "Rawat Inap";
			$this->m_pelayanan->updatePembayaran($id_pendaftaran, $id_layanan_pendaftaran, $id_layanan_pendaftaran, $jenis_transaksi, $total, $reimburse_operasi);
		endif;
		if ($this->db->trans_status() === false) :
			$this->db->trans_rollback();
			$response['status'] = false;
		endif;

		// area BHP
		// cek penjualan
		$check_penjualan = $this->db->query("SELECT id FROM sm_penjualan WHERE id_operasi = '" . $id_jadwal_operasi . "'")->row();
		if (!isset($check_penjualan->id)) :
			$data_penjualan = array(
				'waktu' => $this->datetime,
				'id_operasi' => $id_jadwal_operasi,
				'total' => (safe_post('total') !== '' ? safe_post('total') : 0),
				'jenis' => 'BHP',
				'id_unit' => $id_unit,
				'id_users' => $id_user,
			);
			$this->db->insert('sm_penjualan', $data_penjualan);
			$id_penjualan = $this->db->insert_id();
		else :
			$id_penjualan = $check_penjualan->id;
			if ($this->db->trans_status() === false) :
				$this->db->trans_rollback();
				$response['status'] = false;
			endif;
			$data_penjualan = array(
				'waktu' => $this->datetime,
				'id_operasi' => $id_jadwal_operasi,
				'total' => (safe_post('total') !== '' ? safe_post('total') : 0),
				'id_unit' => $id_unit,
				'id_users' => $id_user,
			);
			$this->db->where('id_operasi', $id_jadwal_operasi);
			$this->db->update('sm_penjualan', $data_penjualan);
			if ($this->db->trans_status() === false) :
				$this->db->trans_rollback();
				$response['status'] = false;
			endif;
		endif;

		$id_barang = safe_post('id_barang');
		$id_kemasan = safe_post('kemasan');
		$jumlah = safe_post('jumlah');
		$hna = safe_post('hna');
		$hja = safe_post('hja');
		$diskon_rp = safe_post('diskon_rp');
		$reimburse_barang = 0;
		if (is_array($id_kemasan)) :
			foreach ($id_kemasan as $i => $kemasan) :
				// get data layanan pendaftaran untuk BHP
				$layanan = $this->db->query("SELECT lp.jenis_layanan, lp.cara_bayar, pj.diskon_barang as reimburse_barang FROM sm_layanan_pendaftaran as lp LEFT JOIN sm_penjamin as pj ON (pj.id = lp.id_penjamin) WHERE lp.id = '" . $id_layanan_pendaftaran . "'")->row();
				if ($layanan->cara_bayar !== 'Tunai') :
					$reimburse_barang = $hja[$i] * $layanan->reimburse_barang / 100;
				endif;
				// get data hna, hpp
				$barangs = $this->db->query("SELECT id, hna, hpp FROM sm_barang WHERE id = '" . $id_barang[$i] . "'")->row();
				// insert data detail penjualan
				$this->db->insert('sm_detail_penjualan', array(
					'waktu' => $this->datetime,
					'id_penjualan' => $id_penjualan,
					'id_kemasan' => $kemasan,
					'qty' => $jumlah[$i],
					'hna' => $hna[$i],
					'hpp' => $barangs->hpp,
					'reimburse' => $reimburse_barang,
					'harga_jual' => $hja[$i],
					'disc_rp' => $diskon_rp[$i] !== '' ? $diskon_rp[$i] : 0,
				));

				$total = $hja[$i] * $jumlah[$i];
				if ($layanan->jenis_layanan === 'Poliklinik') :
					$jenis_transaksi = "Barang";
					$this->m_pelayanan->updatePembayaran($id_pendaftaran, $id_penjualan, $id_layanan_pendaftaran, $jenis_transaksi, $total, $reimburse_barang);
				endif;
				if ($layanan->jenis_layanan === 'IGD') :
					$jenis_transaksi = "IGD";
					$this->m_pelayanan->updatePembayaran($id_pendaftaran, $id_layanan_pendaftaran, $id_layanan_pendaftaran, $jenis_transaksi, $total, $reimburse_barang);
				endif;
				if ($layanan->jenis_layanan === 'Rawat Inap') :
					$jenis_transaksi = "Rawat Inap";
					$this->m_pelayanan->updatePembayaran($id_pendaftaran, $id_layanan_pendaftaran, $id_layanan_pendaftaran, $jenis_transaksi, $total, $reimburse_barang);
				endif;
				if ($this->db->trans_status() === false) :
					$this->db->trans_rollback();
					$response['status'] = false;
				endif;

				// about stok
				$data_kemasan_barang = $this->db->query("select (isi * isi_satuan) as isi 
									from sm_kemasan_barang 
									where id = '" . $kemasan . "'")->row();
				$data_barang = $this->db->query("select sum(masuk) - sum(keluar) as sisa, ed 
									from sm_stok 
									where id_barang = '" . $id_barang[$i] . "' and ed > '" . date("Y-m-d") . "' and id_unit = '" . $id_unit . "' group by ed having sum(masuk) - sum(keluar) > 0 
									order by ed asc")->result();
				$use = $jumlah[$i] * $data_kemasan_barang->isi;
				foreach ($data_barang as $j => $val) :
					$use = $val->sisa - abs($use);
					if ($use <= 0) :
						$keluar = $val->sisa;
					else :
						$keluar = abs($use - $val->sisa);
					endif;

					$data_stok = array(
						'waktu'        => $this->datetime,
						'id_transaksi' => $id_penjualan,
						'transaksi'    => 'Penjualan',
						'id_barang'    => $id_barang[$i],
						'ed'           => isset($val->ed) ? $val->ed : NULL,
						'keluar'       => $keluar,
						'keterangan'   => 'BHP Operasi',
						'id_unit'      => $id_unit,
						'id_users'     => $id_user
					);

					$this->db->insert('sm_stok', $data_stok);
					if ($this->db->trans_status() === false) :
						$this->db->trans_rollback();
						$result['status'] = false;
					endif;

					if (0 <= $use) :
						break;
					endif;
				endforeach;

			endforeach;
		endif;
		// end area BHP

		$this->m_pelayanan->setBelumLunas($id_pendaftaran);
		if ($this->db->trans_status() === false) :
			$this->db->trans_rollback();
			$response['status'] = false;
		else :
			$this->db->trans_commit();
			$response['status'] = true;
		endif;
		return $response;
	}

	function getTotalBHPHarga($id_tarif)
	{
		$sql = "SELECT b.*, sum((b.hpp + (b.hpp * (b.margin_non_resep / 100))) * (kb.isi * kb.isi_satuan * tb.jumlah)) as harga_jual 
			FROM sm_tarif_bhp as tb
			JOIN sm_kemasan_barang as kb ON (kb.id = tb.id_kemasan_barang) 
			JOIN sm_barang as b ON (b.id = kb.id_barang) 
			WHERE tb.id_tarif = '" . $id_tarif . "' 
			GROUP BY b.id";
		return $this->db->query($sql)->row();
	}

	function simpanDataTenagaKesehatanOperasi($data, $id_jadwal_operasi, $tarif, $status)
	{
		$jasa = $tarif / count((array)$data);
		foreach ($data as $val) :
			if ($val !== "") :
				$this->db->insert('sm_tim_operasi', array(
					'id_jadwal_operasi' => $id_jadwal_operasi,
					'id_nadis' => $val,
					'status' => $status,
					'jasa' => $jasa,
					'id_users' => $this->session->userdata('id_translucent'),
				));
				if ($this->db->trans_status() === false) :
					$this->db->trans_rollback();
					$response['status'] = false;
				endif;
			endif;
		endforeach;
	}

	function getDataTindakanTambahanOperasi($id_jadwal_operasi)
	{
		$this->db->select("
			tp.*, pg.nama as nadis, 
			to.id_nadis, to.id_tarif, l.nama as nama_tarif, 
			to.waktu as waktu_tindakan, to.id as id_vk
		");
		$this->db->from('sm_tarif_operasi as to');
		$this->db->join('sm_tarif_pelayanan as tp', 'tp.id = to.id_tarif');
		$this->db->join('sm_tenaga_medis as n', 'n.id = to.id_nadis');
		$this->db->join('sm_pegawai as pg', 'pg.id = n.id_pegawai');
		$this->db->join('sm_layanan as l', 'l.id = tp.id_layanan');
		$this->db->where('to.id_operasi', $id_jadwal_operasi, true);
		$this->db->where('to.is_operasi', 'Tidak');
		return $this->db->get();
	}

	function getDataDiagnosisOperasi($id_jadwal_operasi)
	{
		$this->db->select("
			do.*, gss.nama as diagnosis, gss.no_dtd, 
			gss.kode_icdx, gss.kode_icdx_rinci
		");
		$this->db->from('sm_diagnosa_operasi as do');
		$this->db->join('sm_golongan_sebab_sakit as gss', 'gss.id = do.id_golongan_sebab_sakit_pra or gss.id = do.id_golongan_sebab_sakit_pasca');
		$this->db->where('do.id_jadwal_operasi', $id_jadwal_operasi, true);
		return $this->db->get();
	}

	function getDataTimOperasi($id_jadwal_operasi)
	{
		$this->db->select("top.*, pg.nama as nadis, sp.nama as spesialisasi");
		$this->db->from('sm_tim_operasi as top');
		$this->db->join('sm_tenaga_medis as tm', 'tm.id = top.id_nadis', 'left');
		$this->db->join('sm_pegawai as pg', 'pg.id = tm.id_pegawai', 'left');
		$this->db->join('sm_spesialisasi as sp', 'sp.id = tm.id_spesialisasi', 'left');
		$this->db->where('top.id_jadwal_operasi', $id_jadwal_operasi, true);
		return $this->db->get();
	}

	function getdataBHPTambahanOperasi($id_jadwal_operasi)
	{
		$id_unit = $this->session->userdata('id_unit');
		$sql = "SELECT penj.*, dpenj.id as id_detail_penjualan,
				DATE(penj.waktu) as tanggal, dpenj.qty,
				CONCAT_WS(' ', b.nama, b.kekuatan, stn.nama, COALESCE(sed.nama, ''), '<small><i>', COALESCE(pb.nama, ''), '</i></small>') as nama_barang, 
				st.nama as kemasan, kb.id_barang, kb.id_kemasan, 
				(dpenj.harga_jual * kb.isi * kb.isi_satuan) as harga_jual, dpenj.hna, dpenj.disc_rp, 
				COALESCE((SELECT SUM(masuk) - SUM(keluar) FROM sm_stok WHERE id_barang = b.id AND id_unit = '" . $id_unit . "'), 0.00) as sisa, 
				(SELECT st.nama FROM sm_kemasan_barang as k JOIN sm_satuan as st ON (st.id = k.id_kemasan) WHERE k.id_barang = b.id ORDER BY (k.isi * k.isi_satuan) ASC LIMIT 1) as kemasan_sisa 
				FROM sm_penjualan as penj 
				JOIN sm_detail_penjualan as dpenj ON (dpenj.id_penjualan = penj.id) 
				JOIN sm_kemasan_barang as kb ON (kb.id = dpenj.id_kemasan) 
				JOIN sm_barang as b ON (b.id = kb.id_barang) 
				LEFT JOIN sm_satuan as stn ON (stn.id = b.satuan_kekuatan) 
				LEFT JOIN sm_sediaan as sed ON (sed.id = b.id_sediaan) 
				LEFT JOIN sm_pabrik as pb ON (pb.id = b.id_pabrik) 
				JOIN sm_satuan as st ON (st.id = kb.id_kemasan)
				WHERE penj.id_operasi = '" . $id_jadwal_operasi . "' 
				ORDER BY id DESC";
		return $this->db->query($sql);
	}

	function deleteDetailBHPOperasi($id_detail, $id_operasi)
	{
		$this->db->trans_begin();
		$this->load->model('pelayanan/Pelayanan_model', 'm_pelayanan');
		$tanggal_keluar = $this->db->select('pd.tanggal_keluar')
			->from('sm_jadwal_kamar_operasi as jko')
			->join('sm_layanan_pendaftaran as lp', 'lp.id = jko.id_layanan_pendaftaran')
			->join('sm_pendaftaran as pd', 'pd.id = lp.id_pendaftaran')
			->where('jko.id', $id_operasi, true)
			->get()->row()->tanggal_keluar;
		$check_bayar = $this->db->select('count(*) as count')
			->from('sm_jadwal_kamar_operasi')
			->where('id_history_pembayaran is not null')
			->where('id', $id_operasi, true)
			->get()->row()->count;
		$status = false;
		$message = "Gagal menghapus BHP Operasi";
		if (0 < $check_bayar) :
			$status = false;
			$message = "Gagal menghapus BHP Operasi karena sudah dilakukan transaksi pembayaran, Transaksi telah Dikunci!";
			return array('status' => $status, 'message' => $message);
		endif;

		$get = $this->db->select("(dp.qty * dp.harga_jual) as subtotal, 
								dp.reimburse, dp.id_penjualan, kb.id_barang")
			->from('sm_detail_penjualan as dp')
			->join('sm_kemasan_barang as kb', 'kb.id = dp.id_kemasan')
			->where('dp.id', $id_detail, true)
			->get()->row();
		// hapus transaksi BHP ditabel sm_detail_penjualan
		$this->db->delete('sm_detail_penjualan', ['id' => $id_detail]);
		if ($this->db->trans_status() === false) :
			$this->db->trans_rollback();
		endif;
		$layanan = $this->db->select("lp.jenis_layanan, lp.id_pendaftaran, lp.id")
			->from('sm_jadwal_kamar_operasi as jko')
			->join('sm_layanan_pendaftaran as lp', 'lp.id = jko.id_layanan_pendaftaran')
			->where('jko.id', $id_operasi, true)
			->get()->row();
		if ($layanan->jenis_layanan === 'Poliklinik') :
			$jenis_transaksi = "Barang";
			$this->m_pelayanan->deletePembayaran($get->id_penjualan, $get->subtotal, $get->reimburse, $jenis_transaksi);
		endif;
		if ($layanan->jenis_layanan === 'IGD') :
			$jenis_transaksi = "IGD";
			$this->m_pelayanan->deletePembayaran($layanan->id, $get->subtotal, $get->reimburse, $jenis_transaksi);
		endif;
		if ($layanan->jenis_layanan === 'Rawat Inap') :
			$jenis_transaksi = "Rawat Inap";
			$this->m_pelayanan->deletePembayaran($layanan->id, $get->subtotal, $get->reimburse, $jenis_transaksi);
		endif;
		$this->db->delete('sm_stok', array(
			'id_transaksi' => $get->id_penjualan,
			'transaksi' => 'Penjualan',
			'id_barang' => $get->id_barang,
		));
		if ($this->db->trans_status() === false) :
			$this->db->trans_rollback();
		else :
			$this->db->trans_commit();
			$status = true;
			$message = "Berhasil menghapus BHP Operasi";
		endif;
		return array('status' => $status, 'message' => $message);
	}



	// function getLaporanOperasi($id_pendaftaran)
	// {
	// 	$sql = "select lo.*, pt.nama as nama_user, p.nama as dokter_bedah
	// 			from sm_laporan_operasi lo				
	// 			join sm_layanan_pendaftaran lp ON lo.id_layanan_pendaftaran = lp.id
	// 			join sm_tenaga_medis tm ON lo.id_dokter_bedah = tm.id
	// 			join sm_pegawai p ON tm.id_pegawai = p.id
	// 			join sm_translucent as st on st.id = lo.id_users
	// 			join sm_pegawai as pt on pt.id = st.id

	// 			where lp.id_pendaftaran = '" . $id_pendaftaran . "'
	// 			order by lo.tanggal_operasi asc, lo.mulai_waktu_operasi asc";
	// 	return $this->db->query($sql)->result();
	// }

	// function getLaporanOperasiByID($id_operasi)
	// {

	// 	$sql = "select lo.*, pa.nama as nama_pasien, pd.no_register, pa.telp, p.nama as nama_dokter, p.tanda_tangan, tm.no_sip, pp.nama as asisten, po.nama as instrumentator, pi.nama as sirkuler, pt.nama as nama_user
	// 			from sm_laporan_operasi lo				
	// 			join sm_layanan_pendaftaran lp ON lo.id_layanan_pendaftaran = lp.id
	// 			join sm_pendaftaran pd ON lp.id_pendaftaran = pd.id
	// 			join sm_pasien pa ON pd.id_pasien = pa.id

	// 			left join sm_tenaga_medis tm ON lo.id_dokter_bedah = tm.id
	// 			left join sm_pegawai p ON tm.id_pegawai = p.id

	// 			left join sm_tenaga_medis tmp on lo.id_asisten = tmp.id
	// 			left join sm_pegawai pp on tmp.id_pegawai = pp.id

	// 			left join sm_tenaga_medis tmo on lo.id_instrumentator = tmo.id
	// 			left join sm_pegawai po on tmo.id_pegawai = po.id

	// 			left join sm_tenaga_medis tmi on lo.id_sirkuler = tmi.id
	// 			left join sm_pegawai pi on tmi.id_pegawai = pi.id
				
	// 			left join sm_translucent as st on st.id = lo.id_users
	// 			left join sm_pegawai as pt on pt.id = st.id

	// 			where lo.id = '" . $id_operasi . "'";
	// 	return $this->db->query($sql)->row();
	// }

	// // zulvi
	// // Data Pasien
	// function getProfilPasien($id_pasien)
    // {
    //     return $this->db->query("
	// 		select id, 
	// 		tinggi_badan, 
	// 		berat_badan, 
	// 		is_died, 
	// 		is_hiv, 
	// 		is_alergi, 
	// 		is_gonorrhea, 
	// 		is_hepatitis,
	// 		is_kusta, 
	// 		is_tbc, 
	// 		is_potensi_komplain, 
	// 		is_pasien_pejabat,
	// 		is_pemilik_rs 
	// 		from sm_profil_pasien where id_pasien = '" . $id_pasien . "'")->row();
    // }

	// function getPendaftaranDetailTindakan($id_pendaftaran, $id_layanan_pendaftaran = null)
    // {
    //     // Data Pendaftaran Pasien
    //     $this->db->select("pd.*,
    //                         p.id as no_rm, p.rm_lama, p.nama, p.kelamin, p.alamat, p.telp, p.agama,
    //                         p.no_identitas, p.alergi, p.rm_lama, p.status_kawin,
    //                         p.tanggal_lahir, p.tempat_lahir,
    //                         p.no_rumah, p.no_rt, p.no_rw, p.kode_pos,
    //                         coalesce(p.nama_prop, '') as provinsi,
    //                         coalesce(p.nama_kab, '') as kabupaten,
    //                         coalesce(p.nama_kec, '') as kecamatan,
    //                         coalesce(p.nama_kel, '') as kelurahan,
    //                         coalesce(pk.nama, '') as pekerjaan,
    //                         coalesce(pend.nama, '') as pendidikan,
    //                         coalesce(pj.nama, '') as penjamin,
    //                         coalesce(pj.diskon, '0') as diskon,
    //                         i.nama as instansi_perujuk, pjp.hak_kelas as kelas_rawat,
    //                         pd.jenis_igd, p.gol_darah", true)
    //         ->from('sm_pendaftaran as pd')
    //         ->join('sm_pasien as p', 'p.id = pd.id_pasien')
    //         ->join('sm_instansi as i', 'i.id = pd.id_instansi_perujuk', 'left')
    //         ->join('sm_pekerjaan as pk', 'pk.id = p.id_pekerjaan', 'left')
    //         ->join('sm_pendidikan as pend', 'pend.id = p.id_pendidikan', 'left')
    //         ->join('sm_penjamin as pj', 'pj.id = pd.id_penjamin', 'left')
    //         ->join('sm_penjamin_pasien as pjp', 'pjp.id_pasien = p.id')
    //         ->where('pd.id', $id_pendaftaran, true);
    //     $data['pasien_tindakan'] = $this->db->get()->row();

    //     $this->db->select("lp.*,
    //                         case when lp.jenis_layanan = 'IGD' then 'IGD' else sp.nama end as layanan,
    //                         case when lp.cara_bayar = 'Tunai' then 'UMUM' else pj.nama end as status_pasien,
    //                         coalesce(lp.no_antrian, 0) as no_antrian,
    //                         coalesce(pj.nama, '') as penjamin,
    //                         coalesce(pj.diskon, 0) as diskon,
    //                         coalesce(pg.nama, '') as dokter,
    //                         pg.tanda_tangan as ttd_dokter,
    //                         coalesce(i.nama, '') as instansi_perujuk,
    //                         coalesce(bg.nama, '') as bangsal,
    //                         coalesce(bgic.nama, '') as bangsal_ic,
    //                         coalesce(ri.no_ruang, '') as no_ruang,
    //                         coalesce(ri.no_bed, 0) as no_bed,
    //                         coalesce(ic.no_ruang, '') as no_ruang_ic,
    //                         coalesce(ic.no_bed, 0) as no_bed_ic,
    //                         bgic.id as id_bangsal_ic,
    //                         tm.id_profesi,
    //                         k.nama as kelas,
    //                         kic.nama as kelas_icare,
    //                         ri.waktu_masuk, ri.waktu_keluar, ri.waktu_konfirmasi_ranap, 
    //                         ic.waktu_masuk as waktu_masuk_ic, ic.waktu_keluar as waktu_keluar_ic, ic.waktu_konfirmasi_icare, 
    //                         bg.id as id_bangsal,
    //                         odri.id_dokter_dpjp, odic.id_dokter_dpjp as id_dokter_dpjp_ic, coalesce(pgdpjp.nama, '') as dokter_dpjp, pgdpjp.tanda_tangan as ttd_dokter_dpjp, 
    //                         coalesce(pgicdpjp.nama, '') as dokter_dpjp_ic, u.id as id_unit, u.nama as unit, pd.no_rujukan, peg.nama as petugas, 
    //                         ins.nama as instansi_merujuk, pd.keterangan_rujukan,
    //                         ('') as before")
    //         ->from('sm_layanan_pendaftaran as lp')
    //         ->join('sm_pendaftaran as pd', 'pd.id = lp.id_pendaftaran')
    //         ->join('sm_tenaga_medis as tm', 'tm.id = lp.id_dokter', 'left')
    //         ->join('sm_pegawai as pg', 'pg.id = tm.id_pegawai', 'left')
    //         ->join('sm_pegawai as peg', 'peg.id = lp.id_users', 'left')
    //         ->join('sm_spesialisasi as sp', 'sp.id = lp.id_unit_layanan', 'left')
    //         ->join('sm_penjamin as pj', 'pj.id = lp.id_penjamin', 'left')
    //         ->join('sm_instansi as i', 'i.id = pd.id_instansi_perujuk', 'left')
    //         ->join('sm_unit as u', 'u.id = sp.id_unit', 'left')
    //         ->join('sm_rawat_inap as ri', 'ri.id_layanan_pendaftaran = lp.id', 'left')
    //         ->join('sm_order_rawat_inap as odri', 'odri.id_rawat_inap = ri.id', 'left')
    //         ->join('sm_intensive_care as ic', 'ic.id_layanan_pendaftaran = lp.id', 'left')
    //         ->join('sm_order_intensive_care as odic', 'odic.id_intensive_care = ic.id', 'left')
    //         ->join('sm_tenaga_medis as tmdpjp', 'tmdpjp.id = odri.id_dokter_dpjp', 'left')
    //         ->join('sm_tenaga_medis as icdpjp', 'icdpjp.id = odic.id_dokter_dpjp', 'left')
    //         ->join('sm_pegawai as pgicdpjp', 'pgicdpjp.id = icdpjp.id_pegawai', 'left')
    //         ->join('sm_pegawai as pgdpjp', 'pgdpjp.id = tmdpjp.id_pegawai', 'left')
    //         ->join('sm_bangsal as bg', 'bg.id = ri.id_bangsal', 'left')
    //         ->join('sm_bangsal as bgic', 'bgic.id = ic.id_bangsal', 'left')
    //         ->join('sm_kelas as k', 'k.id = ri.id_kelas', 'left')
    //         ->join('sm_kelas as kic', 'kic.id = ic.id_kelas', 'left')
    //         ->join('sm_instansi as ins', 'ins.id = pd.id_instansi_merujuk', 'left')
    //         ->where('lp.id_pendaftaran', $id_pendaftaran, true)
    //         ->order_by('lp.id', 'asc');

    //     if ($id_layanan_pendaftaran !== null) :
    //         $this->db->where('lp.id', $id_layanan_pendaftaran, true);
    //         $layanan = $this->db->get()->row();
    //         $layanan->before = $this->m_pelayanan->getLayananSpesialisasiBefore($layanan->id);
    //     else :
    //         $layanan = $this->db->get()->result();
    //     endif;

    //     $data['layanan'] = $layanan;
    //     return $data;
    //     $this->db->close();
    // }

	// // Laporan Tindakan
	// function getLT($id_pendaftaran)
    // {

    //     return $this->db
    //         ->select("slt.*, COALESCE(sp_dokter.nama, '') as nama_dokter, COALESCE(sp_bidan.nama, '') as nama_bidan, COALESCE(sp_perawat.nama, '') as nama_perawat, pt.nama as nama_user")
    //         ->from('sm_laporan_tindakan as slt')
    //         ->join('sm_layanan_pendaftaran as lp', 'lp.id = slt.id_layanan_pendaftaran')
    //         ->join('sm_pendaftaran as pd', 'pd.id = lp.id_pendaftaran')
    //         ->join('sm_tenaga_medis as stm_dokter', 'stm_dokter.id = slt.lt_dokter', 'left')
    //         ->join('sm_pegawai as sp_dokter', 'sp_dokter.id = stm_dokter.id_pegawai', 'left')
    //         ->join('sm_tenaga_medis as stm_bidan', 'stm_bidan.id = slt.lt_bidan', 'left')
    //         ->join('sm_pegawai as sp_bidan', 'sp_bidan.id = stm_bidan.id_pegawai', 'left')
    //         ->join('sm_tenaga_medis as stm_perawat', 'stm_perawat.id = slt.lt_perawat', 'left')
    //         ->join('sm_pegawai as sp_perawat', 'sp_perawat.id = stm_perawat.id_pegawai', 'left')
	// 		->join('sm_translucent as st', 'st.id = slt.id_users')
	// 		->join('sm_pegawai as pt', 'pt on pt.id = st.id')
    //         ->where('slt.id_pendaftaran', $id_pendaftaran)
	// 		->order_by('created_date asc')
    //         ->get()
    //         ->result();
    //     $this->db->close();
    // }

	// // Laporan Tindakan by ID
	// function getLTByID($id_tindakan)
    // {
    //     return $this->db
    //         ->select("slt.*, COALESCE(sp_dokter.nama, '') as nama_dokter, COALESCE(sp_bidan.nama, '') as nama_bidan, COALESCE(sp_perawat.nama, '') as nama_perawat, pt.nama as nama_user, sp_dokter.tanda_tangan as ttd_dokter, sp_bidan.tanda_tangan as ttd_bidan, sp_perawat.tanda_tangan as ttd_perawat, stm_dokter.no_sip as sip_dokter, stm_bidan.no_sip as sip_bidan, stm_perawat.no_sip as sip_perawat")
    //         ->from('sm_laporan_tindakan as slt')
    //         ->join('sm_layanan_pendaftaran as lp', 'lp.id = slt.id_layanan_pendaftaran')
    //         ->join('sm_pendaftaran as pd', 'pd.id = lp.id_pendaftaran')
    //         ->join('sm_tenaga_medis as stm_dokter', 'stm_dokter.id = slt.lt_dokter', 'left')
    //         ->join('sm_pegawai as sp_dokter', 'sp_dokter.id = stm_dokter.id_pegawai', 'left')
    //         ->join('sm_tenaga_medis as stm_bidan', 'stm_bidan.id = slt.lt_bidan', 'left')
    //         ->join('sm_pegawai as sp_bidan', 'sp_bidan.id = stm_bidan.id_pegawai', 'left')
    //         ->join('sm_tenaga_medis as stm_perawat', 'stm_perawat.id = slt.lt_perawat', 'left')
    //         ->join('sm_pegawai as sp_perawat', 'sp_perawat.id = stm_perawat.id_pegawai', 'left')
	// 		->join('sm_translucent as st', 'st.id = slt.id_users')
	// 		->join('sm_pegawai as pt', 'pt on pt.id = st.id')
    //         ->where('slt.id', $id_tindakan)
	// 		->order_by('created_date asc')
    //         ->get()
    //         ->row();
    //     $this->db->close();
    // }






	// LAPORAN OPRASI
	function getLaporanOperasi($id_pendaftaran){
		$sql = "select lo.*, pt.nama as nama_user, p.nama as dokter_bedah
				from sm_laporan_operasi lo				
				join sm_layanan_pendaftaran lp ON lo.id_layanan_pendaftaran = lp.id
				join sm_tenaga_medis tm ON lo.id_dokter_bedah = tm.id
				join sm_pegawai p ON tm.id_pegawai = p.id
				join sm_translucent as st on st.id = lo.id_users
				join sm_pegawai as pt on pt.id = st.id
				where lp.id_pendaftaran = '" . $id_pendaftaran . "'
				order by lo.tanggal_operasi asc, lo.mulai_waktu_operasi asc";
		return $this->db->query($sql)->result();
	}

	// LAPORAN OPRASI
	function getLaporanOperasiByID($id_operasi){
		$sql = "select lo.*, pa.nama as nama_pasien, pd.no_register, pa.telp, p.nama as nama_dokter, p.tanda_tangan, tm.no_sip, pp.nama as asisten, po.nama as instrumentator, pi.nama as sirkuler, pt.nama as nama_user
				from sm_laporan_operasi lo				
				join sm_layanan_pendaftaran lp ON lo.id_layanan_pendaftaran = lp.id
				join sm_pendaftaran pd ON lp.id_pendaftaran = pd.id
				join sm_pasien pa ON pd.id_pasien = pa.id
				left join sm_tenaga_medis tm ON lo.id_dokter_bedah = tm.id
				left join sm_pegawai p ON tm.id_pegawai = p.id
				left join sm_tenaga_medis tmp on lo.id_asisten = tmp.id
				left join sm_pegawai pp on tmp.id_pegawai = pp.id
				left join sm_tenaga_medis tmo on lo.id_instrumentator = tmo.id
				left join sm_pegawai po on tmo.id_pegawai = po.id
				left join sm_tenaga_medis tmi on lo.id_sirkuler = tmi.id
				left join sm_pegawai pi on tmi.id_pegawai = pi.id
				left join sm_translucent as st on st.id = lo.id_users
				left join sm_pegawai as pt on pt.id = st.id
				where lo.id = '" . $id_operasi . "'";
		return $this->db->query($sql)->row();
	}

	// LAPORAN OPRASI  INI LOGS YANG DIBIKIN 
	function getLaporanOperasiLogs($id_pendaftaran) { 
		$this->db->where('id_pendaftaran', $id_pendaftaran); 
		$this->db->order_by('created_date', 'desc');
		return $this->db->get('sm_laporan_operasi_logs')->result();
	}

	// zulvi
	// Data Pasien
	function getProfilPasien($id_pasien){
        return $this->db->query("
			select id, 
			tinggi_badan, 
			berat_badan, 
			is_died, 
			is_hiv, 
			is_alergi, 
			is_gonorrhea, 
			is_hepatitis,
			is_kusta, 
			is_tbc, 
			is_potensi_komplain, 
			is_pasien_pejabat,
			is_pemilik_rs 
			from sm_profil_pasien where id_pasien = '" . $id_pasien . "'")->row();
    }

	function getPendaftaranDetailTindakan($id_pendaftaran, $id_layanan_pendaftaran = null){
        // Data Pendaftaran Pasien
        $this->db->select("pd.*,
                            p.id as no_rm, p.rm_lama, p.nama, p.kelamin, p.alamat, p.telp, p.agama,
                            p.no_identitas, p.alergi, p.rm_lama, p.status_kawin,
                            p.tanggal_lahir, p.tempat_lahir,
                            p.no_rumah, p.no_rt, p.no_rw, p.kode_pos,
                            coalesce(p.nama_prop, '') as provinsi,
                            coalesce(p.nama_kab, '') as kabupaten,
                            coalesce(p.nama_kec, '') as kecamatan,
                            coalesce(p.nama_kel, '') as kelurahan,
                            coalesce(pk.nama, '') as pekerjaan,
                            coalesce(pend.nama, '') as pendidikan,
                            coalesce(pj.nama, '') as penjamin,
                            coalesce(pj.diskon, '0') as diskon,
                            i.nama as instansi_perujuk, pjp.hak_kelas as kelas_rawat,
                            pd.jenis_igd, p.gol_darah", true)
            ->from('sm_pendaftaran as pd')
            ->join('sm_pasien as p', 'p.id = pd.id_pasien')
            ->join('sm_instansi as i', 'i.id = pd.id_instansi_perujuk', 'left')
            ->join('sm_pekerjaan as pk', 'pk.id = p.id_pekerjaan', 'left')
            ->join('sm_pendidikan as pend', 'pend.id = p.id_pendidikan', 'left')
            ->join('sm_penjamin as pj', 'pj.id = pd.id_penjamin', 'left')
            ->join('sm_penjamin_pasien as pjp', 'pjp.id_pasien = p.id')
            ->where('pd.id', $id_pendaftaran, true);
        $data['pasien_tindakan'] = $this->db->get()->row();

        $this->db->select("lp.*,
                            case when lp.jenis_layanan = 'IGD' then 'IGD' else sp.nama end as layanan,
                            case when lp.cara_bayar = 'Tunai' then 'UMUM' else pj.nama end as status_pasien,
                            coalesce(lp.no_antrian, 0) as no_antrian,
                            coalesce(pj.nama, '') as penjamin,
                            coalesce(pj.diskon, 0) as diskon,
                            coalesce(pg.nama, '') as dokter,
                            pg.tanda_tangan as ttd_dokter,
                            coalesce(i.nama, '') as instansi_perujuk,
                            coalesce(bg.nama, '') as bangsal,
                            coalesce(bgic.nama, '') as bangsal_ic,
                            coalesce(ri.no_ruang, '') as no_ruang,
                            coalesce(ri.no_bed, 0) as no_bed,
                            coalesce(ic.no_ruang, '') as no_ruang_ic,
                            coalesce(ic.no_bed, 0) as no_bed_ic,
                            bgic.id as id_bangsal_ic,
                            tm.id_profesi,
                            k.nama as kelas,
                            kic.nama as kelas_icare,
                            ri.waktu_masuk, ri.waktu_keluar, ri.waktu_konfirmasi_ranap, 
                            ic.waktu_masuk as waktu_masuk_ic, ic.waktu_keluar as waktu_keluar_ic, ic.waktu_konfirmasi_icare, 
                            bg.id as id_bangsal,
                            odri.id_dokter_dpjp, odic.id_dokter_dpjp as id_dokter_dpjp_ic, coalesce(pgdpjp.nama, '') as dokter_dpjp, pgdpjp.tanda_tangan as ttd_dokter_dpjp, 
                            coalesce(pgicdpjp.nama, '') as dokter_dpjp_ic, u.id as id_unit, u.nama as unit, pd.no_rujukan, peg.nama as petugas, 
                            ins.nama as instansi_merujuk, pd.keterangan_rujukan,
                            ('') as before")
            ->from('sm_layanan_pendaftaran as lp')
            ->join('sm_pendaftaran as pd', 'pd.id = lp.id_pendaftaran')
            ->join('sm_tenaga_medis as tm', 'tm.id = lp.id_dokter', 'left')
            ->join('sm_pegawai as pg', 'pg.id = tm.id_pegawai', 'left')
            ->join('sm_pegawai as peg', 'peg.id = lp.id_users', 'left')
            ->join('sm_spesialisasi as sp', 'sp.id = lp.id_unit_layanan', 'left')
            ->join('sm_penjamin as pj', 'pj.id = lp.id_penjamin', 'left')
            ->join('sm_instansi as i', 'i.id = pd.id_instansi_perujuk', 'left')
            ->join('sm_unit as u', 'u.id = sp.id_unit', 'left')
            ->join('sm_rawat_inap as ri', 'ri.id_layanan_pendaftaran = lp.id', 'left')
            ->join('sm_order_rawat_inap as odri', 'odri.id_rawat_inap = ri.id', 'left')
            ->join('sm_intensive_care as ic', 'ic.id_layanan_pendaftaran = lp.id', 'left')
            ->join('sm_order_intensive_care as odic', 'odic.id_intensive_care = ic.id', 'left')
            ->join('sm_tenaga_medis as tmdpjp', 'tmdpjp.id = odri.id_dokter_dpjp', 'left')
            ->join('sm_tenaga_medis as icdpjp', 'icdpjp.id = odic.id_dokter_dpjp', 'left')
            ->join('sm_pegawai as pgicdpjp', 'pgicdpjp.id = icdpjp.id_pegawai', 'left')
            ->join('sm_pegawai as pgdpjp', 'pgdpjp.id = tmdpjp.id_pegawai', 'left')
            ->join('sm_bangsal as bg', 'bg.id = ri.id_bangsal', 'left')
            ->join('sm_bangsal as bgic', 'bgic.id = ic.id_bangsal', 'left')
            ->join('sm_kelas as k', 'k.id = ri.id_kelas', 'left')
            ->join('sm_kelas as kic', 'kic.id = ic.id_kelas', 'left')
            ->join('sm_instansi as ins', 'ins.id = pd.id_instansi_merujuk', 'left')
            ->where('lp.id_pendaftaran', $id_pendaftaran, true)
            ->order_by('lp.id', 'asc');

        if ($id_layanan_pendaftaran !== null) :
            $this->db->where('lp.id', $id_layanan_pendaftaran, true);
            $layanan = $this->db->get()->row();
            $layanan->before = $this->m_pelayanan->getLayananSpesialisasiBefore($layanan->id);
        else :
            $layanan = $this->db->get()->result();
        endif;

        $data['layanan'] = $layanan;
        return $data;
        $this->db->close();
    }

	// Laporan Tindakan
	function getLT($id_pendaftaran){
        return $this->db
            ->select("slt.*, COALESCE(sp_dokter.nama, '') as nama_dokter, COALESCE(sp_bidan.nama, '') as nama_bidan, COALESCE(sp_perawat.nama, '') as nama_perawat, pt.nama as nama_user")
            ->from('sm_laporan_tindakan as slt')
            ->join('sm_layanan_pendaftaran as lp', 'lp.id = slt.id_layanan_pendaftaran')
            ->join('sm_pendaftaran as pd', 'pd.id = lp.id_pendaftaran')
            ->join('sm_tenaga_medis as stm_dokter', 'stm_dokter.id = slt.lt_dokter', 'left')
            ->join('sm_pegawai as sp_dokter', 'sp_dokter.id = stm_dokter.id_pegawai', 'left')
            ->join('sm_tenaga_medis as stm_bidan', 'stm_bidan.id = slt.lt_bidan', 'left')
            ->join('sm_pegawai as sp_bidan', 'sp_bidan.id = stm_bidan.id_pegawai', 'left')
            ->join('sm_tenaga_medis as stm_perawat', 'stm_perawat.id = slt.lt_perawat', 'left')
            ->join('sm_pegawai as sp_perawat', 'sp_perawat.id = stm_perawat.id_pegawai', 'left')
			->join('sm_translucent as st', 'st.id = slt.id_users')
			->join('sm_pegawai as pt', 'pt on pt.id = st.id')
            ->where('slt.id_pendaftaran', $id_pendaftaran)
			->order_by('created_date asc')
            ->get()
            ->result();
        $this->db->close();
    }

	// Laporan Tindakan by ID
	function getLTByID($id_tindakan){
        return $this->db
            ->select("slt.*, COALESCE(sp_dokter.nama, '') as nama_dokter, COALESCE(sp_bidan.nama, '') as nama_bidan, COALESCE(sp_perawat.nama, '') as nama_perawat, pt.nama as nama_user, sp_dokter.tanda_tangan as ttd_dokter, sp_bidan.tanda_tangan as ttd_bidan, sp_perawat.tanda_tangan as ttd_perawat, stm_dokter.no_sip as sip_dokter, stm_bidan.no_sip as sip_bidan, stm_perawat.no_sip as sip_perawat")
            ->from('sm_laporan_tindakan as slt')
            ->join('sm_layanan_pendaftaran as lp', 'lp.id = slt.id_layanan_pendaftaran')
            ->join('sm_pendaftaran as pd', 'pd.id = lp.id_pendaftaran')
            ->join('sm_tenaga_medis as stm_dokter', 'stm_dokter.id = slt.lt_dokter', 'left')
            ->join('sm_pegawai as sp_dokter', 'sp_dokter.id = stm_dokter.id_pegawai', 'left')
            ->join('sm_tenaga_medis as stm_bidan', 'stm_bidan.id = slt.lt_bidan', 'left')
            ->join('sm_pegawai as sp_bidan', 'sp_bidan.id = stm_bidan.id_pegawai', 'left')
            ->join('sm_tenaga_medis as stm_perawat', 'stm_perawat.id = slt.lt_perawat', 'left')
            ->join('sm_pegawai as sp_perawat', 'sp_perawat.id = stm_perawat.id_pegawai', 'left')
			->join('sm_translucent as st', 'st.id = slt.id_users')
			->join('sm_pegawai as pt', 'pt on pt.id = st.id')
            ->where('slt.id', $id_tindakan)
			->order_by('created_date asc')
            ->get()
            ->row();
        $this->db->close();
    }

	// LAPORAN TINDAKAN  INI LOGS YANG DIBIKIN 
	function getLTLogs($id_pendaftaran) { 
		$this->db->where('id_pendaftaran', $id_pendaftaran); 
		$this->db->order_by('created_date', 'desc');
		return $this->db->get('sm_laporan_tindakan_logs')->result();
	}







	function getPendaftaranDetailOperasi($id_layanan_pendaftaran)
	{
		// Data Pendaftaran Pasien
		$this->db->select("pd.*,
                            p.id as no_rm, p.rm_lama, p.nama, p.kelamin, p.alamat, p.telp, p.agama,
                            p.no_identitas, p.alergi, p.rm_lama, p.status_kawin,
                            p.tanggal_lahir, p.tempat_lahir,
                            coalesce(p.nama_prop, '') as provinsi,
                            coalesce(p.nama_kab, '') as kabupaten,
                            coalesce(p.nama_kec, '') as kecamatan,
                            coalesce(p.nama_kel, '') as kelurahan,
                            coalesce(pk.nama, '') as pekerjaan,
                            coalesce(pend.nama, '') as pendidikan,
                            coalesce(pj.nama, '') as penjamin,
                            coalesce(pj.diskon, '0') as diskon,
                            i.nama as instansi_perujuk,
                            pd.jenis_igd, p.gol_darah", true)
			->from('sm_pendaftaran as pd')
			->join('sm_layanan_pendaftaran as lp', 'pd.id = lp.id_pendaftaran')
			->join('sm_pasien as p', 'p.id = pd.id_pasien')
			->join('sm_instansi as i', 'i.id = pd.id_instansi_perujuk', 'left')
			->join('sm_pekerjaan as pk', 'pk.id = p.id_pekerjaan', 'left')
			->join('sm_pendidikan as pend', 'pend.id = p.id_pendidikan', 'left')
			->join('sm_penjamin as pj', 'pj.id = pd.id_penjamin', 'left')
			->where('lp.id', $id_layanan_pendaftaran, true);
		$data['pasien'] = $this->db->get()->row();

		$this->db->select("lp.*,
                            case when lp.jenis_layanan = 'IGD' then 'IGD' else sp.nama end as layanan,
                            case when lp.cara_bayar = 'Tunai' then 'UMUM' else pj.nama end as status_pasien,
                            coalesce(lp.no_antrian, 0) as no_antrian,
                            coalesce(pj.nama, '') as penjamin,
                            coalesce(pj.diskon, 0) as diskon,
                            coalesce(pg.nama, '') as dokter,
                            coalesce(i.nama, '') as instansi_perujuk,
                            coalesce(bg.nama, '') as bangsal,
                            coalesce(bgic.nama, '') as bangsal_ic,
                            coalesce(ri.no_ruang, '') as no_ruang,
                            coalesce(ri.no_bed, 0) as no_bed,
                            coalesce(ic.no_ruang, '') as no_ruang_ic,
                            coalesce(ic.no_bed, 0) as no_bed_ic,
                            tm.id_profesi,
                            k.nama as kelas,
                            kic.nama as kelas_icare,
                            ri.waktu_masuk, ri.waktu_keluar, ri.waktu_konfirmasi_ranap, 
                            ic.waktu_masuk as waktu_masuk_ic, ic.waktu_keluar as waktu_keluar_ic, ic.waktu_konfirmasi_icare, 
                            bg.id as id_bangsal,
                            odri.id_dokter_dpjp, odic.id_dokter_dpjp as id_dokter_dpjp_ic, coalesce(pgdpjp.nama, '') as dokter_dpjp, 
                            coalesce(pgicdpjp.nama, '') as dokter_dpjp_ic, u.id as id_unit, u.nama as unit, pd.no_rujukan, peg.nama as petugas, 
                            ins.nama as instansi_merujuk, pd.keterangan_rujukan,
                            ('') as before")
			->from('sm_layanan_pendaftaran as lp')
			->join('sm_pendaftaran as pd', 'pd.id = lp.id_pendaftaran')
			->join('sm_tenaga_medis as tm', 'tm.id = lp.id_dokter', 'left')
			->join('sm_pegawai as pg', 'pg.id = tm.id_pegawai', 'left')
			->join('sm_pegawai as peg', 'peg.id = lp.id_users', 'left')
			->join('sm_spesialisasi as sp', 'sp.id = lp.id_unit_layanan', 'left')
			->join('sm_penjamin as pj', 'pj.id = lp.id_penjamin', 'left')
			->join('sm_instansi as i', 'i.id = pd.id_instansi_perujuk', 'left')
			->join('sm_unit as u', 'u.id = sp.id_unit', 'left')
			->join('sm_rawat_inap as ri', 'ri.id_layanan_pendaftaran = lp.id', 'left')
			->join('sm_order_rawat_inap as odri', 'odri.id_rawat_inap = ri.id', 'left')
			->join('sm_intensive_care as ic', 'ic.id_layanan_pendaftaran = lp.id', 'left')
			->join('sm_order_intensive_care as odic', 'odic.id_intensive_care = ic.id', 'left')
			->join('sm_tenaga_medis as tmdpjp', 'tmdpjp.id = odri.id_dokter_dpjp', 'left')
			->join('sm_tenaga_medis as icdpjp', 'icdpjp.id = odic.id_dokter_dpjp', 'left')
			->join('sm_pegawai as pgicdpjp', 'pgicdpjp.id = icdpjp.id_pegawai', 'left')
			->join('sm_pegawai as pgdpjp', 'pgdpjp.id = tmdpjp.id_pegawai', 'left')
			->join('sm_bangsal as bg', 'bg.id = ri.id_bangsal', 'left')
			->join('sm_bangsal as bgic', 'bgic.id = ic.id_bangsal', 'left')
			->join('sm_kelas as k', 'k.id = ri.id_kelas', 'left')
			->join('sm_kelas as kic', 'kic.id = ic.id_kelas', 'left')
			->join('sm_instansi as ins', 'ins.id = pd.id_instansi_merujuk', 'left')
			->where('lp.id', $id_layanan_pendaftaran, true)
			->order_by('lp.id', 'asc');

		if ($id_layanan_pendaftaran !== null) :
			$this->db->where('lp.id', $id_layanan_pendaftaran, true);
			$layanan = $this->db->get()->row();
			$layanan->before = $this->m_pelayanan->getLayananSpesialisasiBefore($layanan->id);
		else :
			$layanan = $this->db->get()->result();
		endif;

		$data['layanan'] = $layanan;
		return $data;
		$this->db->close();
	}

	// RPPPP
	function updateRencanaPelayananPasienPascaPembedahan($rencanaPelayananPasienPascaPembedahan)
	{
		$this->db->trans_begin();

		$rencanaPelayananPasienPascaPembedahan['created_date'] = $this->datetime;

		if ($rencanaPelayananPasienPascaPembedahan['id_rpppp'] !== '') {
			$id_rpppp = $rencanaPelayananPasienPascaPembedahan['id_rpppp'];
			$data_before_rpppp = $this->db->get_where('sm_rencana_pelayanan_pasien_pasca_pembedahan', ['id' => $id_rpppp])->row();

			unset($rencanaPelayananPasienPascaPembedahan['id_rpppp']);
			unset($data_before_rpppp->id);
			$rencanaPelayananPasienPascaPembedahan['updated_date'] = date('Y-m-d H:i:s');


			$this->db->insert('sm_rencana_pelayanan_pasien_pasca_pembedahan_logs', $data_before_rpppp);
			$this->db->where('id', $id_rpppp)->update('sm_rencana_pelayanan_pasien_pasca_pembedahan', $rencanaPelayananPasienPascaPembedahan);
			$message = 'mengupdate Rencana Pelayanan Pasien Pasca Pembedahan';
		} else {
			unset($rencanaPelayananPasienPascaPembedahan['id_rpppp']);
			$this->db->insert('sm_rencana_pelayanan_pasien_pasca_pembedahan', $rencanaPelayananPasienPascaPembedahan);
			$message = 'menambah Rencana Pelayanan Pasien Pasca Pembedahan';
		}


		if ($this->db->trans_status() === false) :
			$this->db->trans_rollback();
			$status = false;
			$message = "Gagal " . $message;
		else :
			$this->db->trans_commit();
			$status = true;
			$message = "Berhasil " . $message;
		endif;
		return array('status' => $status, 'message' => $message);
	}

	// RPPPP
	function getRencanaPelayananPasienPascaPembedahan($id_pendaftaran)
	{
		return $this->db->select('rpppp.*, pgp1.nama as nama_perawat_1, 
												   pgp2.nama as nama_perawat_2, 
												   pgp3.nama as nama_perawat_3, 
												   pgd1.nama as nama_dokter_1, 
												   pgd2.nama as nama_dokter_2, 
												   pgu.nama as user')
			->from('sm_rencana_pelayanan_pasien_pasca_pembedahan as rpppp')
			->join('sm_tenaga_medis as tmp1 ', ' tmp1.id = rpppp.id_perawat_1', 'left')
			->join('sm_tenaga_medis as tmp2 ', ' tmp2.id = rpppp.id_perawat_2', 'left')
			->join('sm_tenaga_medis as tmp3 ', ' tmp3.id = rpppp.id_perawat_3', 'left')
			->join('sm_pegawai as pgp1 ', ' pgp1.id = tmp1.id_pegawai', 'left')
			->join('sm_pegawai as pgp2 ', ' pgp2.id = tmp2.id_pegawai', 'left')
			->join('sm_pegawai as pgp3 ', ' pgp3.id = tmp3.id_pegawai', 'left')
			->join('sm_tenaga_medis as tmd1 ', ' tmd1.id = rpppp.id_dokter_1', 'left')
			->join('sm_tenaga_medis as tmd2 ', ' tmd2.id = rpppp.id_dokter_2', 'left')
			->join('sm_pegawai as pgd1 ', ' pgd1.id = tmd1.id_pegawai', 'left')
			->join('sm_pegawai as pgd2 ', ' pgd2.id = tmd2.id_pegawai', 'left')
			->join('sm_translucent as tr', 'tr.id = rpppp.id_users', 'left')
			->join('sm_pegawai as pgu', 'pgu.id = tr.id', 'left')
			->where('rpppp.id_pendaftaran', $id_pendaftaran, true)
			->get()
			->row();
	}



	// APB
	function updateAssesmentPraBedahh($assesmentPraBedahh)
	{
		$this->db->trans_begin();
		$assesmentPraBedahh['created_date'] = $this->datetime;
		if ($assesmentPraBedahh['id_apb'] !== '') {
			$id_apb = $assesmentPraBedahh['id_apb'];
			$data_before_apb = $this->db->get_where('sm_asessment_pra_bedahh', ['id' => $id_apb])->row();
			unset($assesmentPraBedahh['id_apb']);
			unset($data_before_apb->id);
			$assesmentPraBedahh['updated_date'] = date('Y-m-d H:i:s');
			$this->db->insert('sm_asessment_pra_bedahh_logs', $data_before_apb);
			$this->db->where('id', $id_apb)->update('sm_asessment_pra_bedahh', $assesmentPraBedahh);
			$message = 'mengupdate Assesmen Pra Bedah';
		} else {
			unset($assesmentPraBedahh['id_apb']);
			$this->db->insert('sm_asessment_pra_bedahh', $assesmentPraBedahh);
			$message = 'menambah Assesmen Pra Bedah';
		}
		if ($this->db->trans_status() === false) :
			$this->db->trans_rollback();
			$status = false;
			$message = "Gagal " . $message;
		else :
			$this->db->trans_commit();
			$status = true;
			$message = "Berhasil " . $message;
		endif;
		return array('status' => $status, 'message' => $message);
	}

	// APB
	function getAssesmentPraBedahh($id_pendaftaran)
	{
		return $this->db->select('apb.*, pgd.nama as nama_dokter, pgu.nama as user')
			->from('sm_asessment_pra_bedahh as apb')
			->join('sm_tenaga_medis as tmd ', ' tmd.id = apb.apbwh_dokter', 'left')
			->join('sm_pegawai as pgd ', ' pgd.id = tmd.id_pegawai', 'left')
			->join('sm_translucent as tr', 'tr.id = apb.id_users', 'left')
			->join('sm_pegawai as pgu', 'pgu.id = tr.id', 'left')
			->where('apb.id_pendaftaran', $id_pendaftaran, true)
			->get()
			->row();
	}



	function getLokasiOperasi($id_pendaftaran)
	{
		return $this->db
			->select('lo.*, pg.nama as dokter')
			->from('sm_lokasi_operasi as lo')
			->join('sm_tenaga_medis as tm', 'tm.id = lo.plo_dokter', 'left')
			->join('sm_pegawai as pg', 'pg.id = tm.id_pegawai', 'left')
			->where('lo.id_pendaftaran', $id_pendaftaran)
			->get()
			->row_array();
	}

	// BKS 1 
	function insertBuktiKondisiSterilisasi($data){
        foreach ($data['date_created'] as $key => $value) {
			$tgl_bks_operasi = str_replace('/', '-', $data['tgl_operasi_bks'][$key]);
            $tgl_bks_operasi = date("Y-m-d", strtotime($tgl_bks_operasi));

			$tanggal_bks_steril = str_replace('/', '-', $data['tanggal_steril_bks'][$key]);
            $tanggal_bks_steril = date("Y-m-d", strtotime($tanggal_bks_steril));

			$tgl_steril_bks_0 = str_replace('/', '-', $data['tgl_steril_bks_0'][$key]);
            $tgl_steril_bks_0 = date("Y-m-d", strtotime($tgl_steril_bks_0));

			$tgl_bks_steril_1 = str_replace('/', '-', $data['tgl_steril_bks_1'][$key]);
            $tgl_bks_steril_1 = date("Y-m-d", strtotime($tgl_bks_steril_1));

			$tgl_steril_bks_2 = str_replace('/', '-', $data['tgl_steril_bks_2'][$key]);
            $tgl_steril_bks_2 = date("Y-m-d", strtotime($tgl_steril_bks_2));

			$tgl_steril_bks_3 = str_replace('/', '-', $data['tgl_steril_bks_3'][$key]);
            $tgl_steril_bks_3 = date("Y-m-d", strtotime($tgl_steril_bks_3));

			$tgl_steril_bks_4 = str_replace('/', '-', $data['tgl_steril_bks_4'][$key]);
            $tgl_steril_bks_4 = date("Y-m-d", strtotime($tgl_steril_bks_4));

			$tgl_steril_bks_5 = str_replace('/', '-', $data['tgl_steril_bks_5'][$key]);
            $tgl_steril_bks_5 = date("Y-m-d", strtotime($tgl_steril_bks_5));

			$tgl_steril_bks_6 = str_replace('/', '-', $data['tgl_steril_bks_6'][$key]);
            $tgl_steril_bks_6 = date("Y-m-d", strtotime($tgl_steril_bks_6));

			$tgl_steril_bks_7 = str_replace('/', '-', $data['tgl_steril_bks_7'][$key]);
            $tgl_steril_bks_7 = date("Y-m-d", strtotime($tgl_steril_bks_7));

			$tgl_steril_bks_8 = str_replace('/', '-', $data['tgl_steril_bks_8'][$key]);
            $tgl_steril_bks_8 = date("Y-m-d", strtotime($tgl_steril_bks_8));

			$tgl_steril_bks_9 = str_replace('/', '-', $data['tgl_steril_bks_9'][$key]);
            $tgl_steril_bks_9 = date("Y-m-d", strtotime($tgl_steril_bks_9));

			$tgl_steril_bks_10 = str_replace('/', '-', $data['tgl_steril_bks_10'][$key]);
            $tgl_steril_bks_10 = date("Y-m-d", strtotime($tgl_steril_bks_10));

			$tgl_steril_bks_11 = str_replace('/', '-', $data['tgl_steril_bks_11'][$key]);
            $tgl_steril_bks_11 = date("Y-m-d", strtotime($tgl_steril_bks_11));

			$tgl_steril_bks_12 = str_replace('/', '-', $data['tgl_steril_bks_12'][$key]);
            $tgl_steril_bks_12 = date("Y-m-d", strtotime($tgl_steril_bks_12));

			$tgl_steril_bks_13 = str_replace('/', '-', $data['tgl_steril_bks_13'][$key]);
            $tgl_steril_bks_13 = date("Y-m-d", strtotime($tgl_steril_bks_13));

			$tgl_steril_bks_14 = str_replace('/', '-', $data['tgl_steril_bks_14'][$key]);
            $tgl_steril_bks_14 = date("Y-m-d", strtotime($tgl_steril_bks_14));
            $data_terapi = array(
                'id_pendaftaran'                        => $data['id_pendaftaran'],
                'id_layanan_pendaftaran'                => $data['id_layanan_pendaftaran'],
				'id_user'                               => $data['id_user'][$key],	
				'tgl_operasi_bks'                      	=> $tgl_bks_operasi,	
				'tanggal_steril_bks'                    => $tanggal_bks_steril,

				'tgl_steril_bks_0'                           => $data['tgl_steril_bks_0'][$key] !== '' ? $data['tgl_steril_bks_0'][$key] : null,
				'tgl_steril_bks_1'                           => $data['tgl_steril_bks_1'][$key] !== '' ? $data['tgl_steril_bks_1'][$key] : null,
				'tgl_steril_bks_2'                           => $data['tgl_steril_bks_2'][$key] !== '' ? $data['tgl_steril_bks_2'][$key] : null,
				'tgl_steril_bks_3'                           => $data['tgl_steril_bks_3'][$key] !== '' ? $data['tgl_steril_bks_3'][$key] : null,
				'tgl_steril_bks_4'                           => $data['tgl_steril_bks_4'][$key] !== '' ? $data['tgl_steril_bks_4'][$key] : null,
				'tgl_steril_bks_5'                           => $data['tgl_steril_bks_5'][$key] !== '' ? $data['tgl_steril_bks_5'][$key] : null,
				'tgl_steril_bks_6'                           => $data['tgl_steril_bks_6'][$key] !== '' ? $data['tgl_steril_bks_6'][$key] : null,
				'tgl_steril_bks_7'                           => $data['tgl_steril_bks_7'][$key] !== '' ? $data['tgl_steril_bks_7'][$key] : null,
				'tgl_steril_bks_8'                           => $data['tgl_steril_bks_8'][$key] !== '' ? $data['tgl_steril_bks_8'][$key] : null,
				'tgl_steril_bks_9'                           => $data['tgl_steril_bks_9'][$key] !== '' ? $data['tgl_steril_bks_9'][$key] : null,
				'tgl_steril_bks_10'                           => $data['tgl_steril_bks_10'][$key] !== '' ? $data['tgl_steril_bks_10'][$key] : null,
				'tgl_steril_bks_11'                           => $data['tgl_steril_bks_11'][$key] !== '' ? $data['tgl_steril_bks_11'][$key] : null,
				'tgl_steril_bks_12'                           => $data['tgl_steril_bks_12'][$key] !== '' ? $data['tgl_steril_bks_12'][$key] : null,
				'tgl_steril_bks_13'                           => $data['tgl_steril_bks_13'][$key] !== '' ? $data['tgl_steril_bks_13'][$key] : null,
				'tgl_steril_bks_14'                           => $data['tgl_steril_bks_14'][$key] !== '' ? $data['tgl_steril_bks_14'][$key] : null,

				'alat_item_bks_0'                  			=> $data['alat_item_bks_0'][$key] !== '' ? $data['alat_item_bks_0'][$key] : null, 
				'alat_item_bks_1'                  			=> $data['alat_item_bks_1'][$key] !== '' ? $data['alat_item_bks_1'][$key] : null, 
				'alat_item_bks_2'                  			=> $data['alat_item_bks_2'][$key] !== '' ? $data['alat_item_bks_2'][$key] : null, 
				'alat_item_bks_3'                  			=> $data['alat_item_bks_3'][$key] !== '' ? $data['alat_item_bks_3'][$key] : null, 
				'alat_item_bks_4'                  			=> $data['alat_item_bks_4'][$key] !== '' ? $data['alat_item_bks_4'][$key] : null, 
				'alat_item_bks_5'                  			=> $data['alat_item_bks_5'][$key] !== '' ? $data['alat_item_bks_5'][$key] : null, 
				'alat_item_bks_6'                  			=> $data['alat_item_bks_6'][$key] !== '' ? $data['alat_item_bks_6'][$key] : null, 
				'alat_item_bks_7'                  			=> $data['alat_item_bks_7'][$key] !== '' ? $data['alat_item_bks_7'][$key] : null, 
				'alat_item_bks_8'                  			=> $data['alat_item_bks_8'][$key] !== '' ? $data['alat_item_bks_8'][$key] : null, 
				'alat_item_bks_9'                  			=> $data['alat_item_bks_9'][$key] !== '' ? $data['alat_item_bks_9'][$key] : null, 
				'alat_item_bks_10'                  			=> $data['alat_item_bks_10'][$key] !== '' ? $data['alat_item_bks_10'][$key] : null, 
				'alat_item_bks_11'                  			=> $data['alat_item_bks_11'][$key] !== '' ? $data['alat_item_bks_11'][$key] : null, 
				'alat_item_bks_12'                  			=> $data['alat_item_bks_12'][$key] !== '' ? $data['alat_item_bks_12'][$key] : null, 
				'alat_item_bks_13'                  			=> $data['alat_item_bks_13'][$key] !== '' ? $data['alat_item_bks_13'][$key] : null, 
				'alat_item_bks_14'                  			=> $data['alat_item_bks_14'][$key] !== '' ? $data['alat_item_bks_14'][$key] : null, 
				                             
				'dokter_bks_1'                          => $data['dokter_bks_1'][$key] !== '' ? $data['dokter_bks_1'][$key] : null,
				'dokter_bks_2'                          => $data['dokter_bks_2'][$key] !== '' ? $data['dokter_bks_2'][$key] : null,
				'jenis_nama_operasi_bks'                => $data['jenis_nama_operasi_bks'][$key] !== '' ? $data['jenis_nama_operasi_bks'][$key] : null,	
                'perawat_bks_1'                  		=> $data['perawat_bks_1'][$key] !== '' ? $data['perawat_bks_1'][$key] : null,
                'perawat_bks_2'                  		=> $data['perawat_bks_2'][$key] !== '' ? $data['perawat_bks_2'][$key] : null,
                'perawat_bks_3'                  	    => $data['perawat_bks_3'][$key] !== '' ? $data['perawat_bks_3'][$key] : null,
                'perawat_bks_4'                  		=> $data['perawat_bks_4'][$key] !== '' ? $data['perawat_bks_4'][$key] : null,
                'perawat_bks_5'                 		=> $data['perawat_bks_5'][$key] !== '' ? $data['perawat_bks_5'][$key] : null,             
                'jenis_anastesi_bks'					=> $data['jenis_anastesi_bks'][$key] !== '' ? $data['jenis_anastesi_bks'][$key] : null,            
                'jam_mulai_op_bks'                 	 	=> $data['jam_mulai_op_bks'][$key] !== '' ? $data['jam_mulai_op_bks'][$key] : null,             
                'jam_selesai_op_bks'                  	=> $data['jam_selesai_op_bks'][$key] !== '' ? $data['jam_selesai_op_bks'][$key] : null,             
                'lama_operasi_bks'                  	=> $data['lama_operasi_bks'][$key] !== '' ? $data['lama_operasi_bks'][$key] : null,              
                'indikator_sterilisasi_bks'             => $data['indikator_sterilisasi_bks'][$key] !== '' ? $data['indikator_sterilisasi_bks'][$key] : null,             
                'alat_item_bks'                  		=> $data['alat_item_bks'][$key] !== '' ? $data['alat_item_bks'][$key] : null, 
                'created_at'                 			=> $value, 
            );
            $this->db->insert('sm_bukti_kondisi_sterilisasi', $data_terapi);
        }
    }

	// BKS 2
	function editBuktiKondisiSterilisasi($data){
		return $this->db->where('id', $data['id'], true)->update('sm_bukti_kondisi_sterilisasi', $data);
	}
	
	// BKS 3
	function deleteBuktiKondisiSterilisasi($id){
		return $this->db->where("id", $id)
			->update("sm_bukti_kondisi_sterilisasi", [
				'deleted_at' => date('Y-m-d H:i:s')
			]);
	}

	// BKS 5
    function getBuktiKondisiSterilisasi($id_pendaftaran) {
		return $this->db->select("
			bks.*, 
			COALESCE(spd1.nama, '') as dokter_1,
			COALESCE(spd2.nama, '') as dokter_2,		
		 	l.nama as jenis_nama_operasi, 				
			COALESCE(spg1.nama, '') as perawat_1,
			COALESCE(spg2.nama, '') as perawat_2,
			COALESCE(spg3.nama, '') as perawat_3,
			COALESCE(spg4.nama, '') as perawat_4,  
			COALESCE(spg5.nama, '') as perawat_5,
			COALESCE(wid.nama, '') as akun_user
		")

		->from('sm_bukti_kondisi_sterilisasi as bks')
			// ->join ('sm_pendaftaran as pd', 'bks.id_pendaftaran = pd.id')
		->join('sm_layanan_pendaftaran as lp', 'bks.id_layanan_pendaftaran = lp.id')
		->join('sm_tenaga_medis as tmd1', 'tmd1.id = bks.dokter_bks_1', 'left')
		->join('sm_tenaga_medis as tmd2', 'tmd2.id = bks.dokter_bks_2', 'left')
		->join('sm_pegawai as spd1', 'spd1.id = tmd1.id_pegawai', 'left')
		->join('sm_pegawai as spd2', 'spd2.id = tmd2.id_pegawai', 'left')
		->join('sm_tarif_pelayanan as tp', 'tp.id = bks.jenis_nama_operasi_bks') // Perbaikan di sini		
		->join('sm_layanan l', 'l.id = tp.id_layanan')
		->join('sm_tenaga_medis as tmp1', 'bks.perawat_bks_1 = tmp1.id', 'left')
		->join('sm_tenaga_medis as tmp2', 'bks.perawat_bks_2 = tmp2.id', 'left')
		->join('sm_tenaga_medis as tmp3', 'bks.perawat_bks_3 = tmp3.id', 'left')
		->join('sm_tenaga_medis as tmp4', 'bks.perawat_bks_4 = tmp4.id', 'left')
		->join('sm_tenaga_medis as tmp5', 'bks.perawat_bks_5 = tmp5.id', 'left')
		->join('sm_pegawai as spg1', 'spg1.id = tmp1.id_pegawai', 'left')
		->join('sm_pegawai as spg2', 'spg2.id = tmp2.id_pegawai', 'left')
		->join('sm_pegawai as spg3', 'spg3.id = tmp3.id_pegawai', 'left')
		->join('sm_pegawai as spg4', 'spg4.id = tmp4.id_pegawai', 'left')
		->join('sm_pegawai as spg5', 'spg5.id = tmp5.id_pegawai', 'left')
		->join('sm_translucent as sid', 'bks.id_user = sid.id', 'left')
		->join('sm_pegawai as wid', 'bks.id_user = wid.id', 'left')
		->where('lp.id_pendaftaran', $id_pendaftaran)
		->order_by('bks.tgl_operasi_bks', 'asc')
		->get()
		->result();
    }
    
	// BKS 5
    function getBuktiKondisiSterilisasiByID($id) {
        return $this->db->select("
			bks.*, 	
			COALESCE(spd1.nama, '') as dokter_1,
			COALESCE(spd2.nama, '') as dokter_2,			
			l.nama as jenis_nama_operasi,
			COALESCE(spg1.nama, '') as perawat_1,
			COALESCE(spg2.nama, '') as perawat_2,
			COALESCE(spg3.nama, '') as perawat_3,
			COALESCE(spg4.nama, '') as perawat_4,
			COALESCE(spg5.nama, '') as perawat_5,
			COALESCE(wid.nama, '') as akun_user
		")
		->from('sm_bukti_kondisi_sterilisasi as bks')
		// ->join('sm_layanan_pendaftaran as lp', 'bks.id_layanan_pendaftaran = lp.id')
		// ->join ('sm_pendaftaran as pd', 'bks.id_pendaftaran = pd.id')
		->join('sm_tenaga_medis as tmd1', 'tmd1.id = bks.dokter_bks_1', 'left')
		->join('sm_tenaga_medis as tmd2', 'tmd2.id = bks.dokter_bks_2', 'left')
		->join('sm_pegawai as spd1', 'spd1.id = tmd1.id_pegawai', 'left')
		->join('sm_pegawai as spd2', 'spd2.id = tmd2.id_pegawai', 'left')
		->join('sm_tarif_pelayanan as tp', 'tp.id = bks.jenis_nama_operasi_bks') // Perbaikan di sini		
		->join('sm_layanan l', 'l.id = tp.id_layanan')
		->join('sm_tenaga_medis as tmp1', 'bks.perawat_bks_1 = tmp1.id', 'left')
		->join('sm_tenaga_medis as tmp2', 'bks.perawat_bks_2 = tmp2.id', 'left')
		->join('sm_tenaga_medis as tmp3', 'bks.perawat_bks_3 = tmp3.id', 'left')
		->join('sm_tenaga_medis as tmp4', 'bks.perawat_bks_4 = tmp4.id', 'left')
		->join('sm_tenaga_medis as tmp5', 'bks.perawat_bks_5 = tmp5.id', 'left')
		->join('sm_pegawai as spg1', 'spg1.id = tmp1.id_pegawai', 'left')
		->join('sm_pegawai as spg2', 'spg2.id = tmp2.id_pegawai', 'left')
		->join('sm_pegawai as spg3', 'spg3.id = tmp3.id_pegawai', 'left')
		->join('sm_pegawai as spg4', 'spg4.id = tmp4.id_pegawai', 'left')
		->join('sm_pegawai as spg5', 'spg5.id = tmp5.id_pegawai', 'left')
		->join('sm_translucent as sid', 'bks.id_user = sid.id', 'left')
		->join('sm_pegawai as wid', 'bks.id_user = wid.id', 'left')
		->where('bks.id', $id)
		->order_by('bks.tgl_operasi_bks', 'asc')
		->get()
		->row();
    }

	// BKS 6
	function insertLogBuktiKondisiSterilisasi($log) {
		return $this->db->insert('sm_bukti_kondisi_sterilisasi_logs', $log);
	}

	// PAL 1 
	function insertPemantauanAnestesiLokal($data){
        foreach ($data['date_created'] as $key => $value) {
			$tanggal_pal_pemantauan = str_replace('/', '-', $data['tanggal_pemantauan_pal'][$key]);
            $tanggal_pal_pemantauan = date("Y-m-d", strtotime($tanggal_pal_pemantauan));
            $data_terapi = array(
                'id_pendaftaran'                        => $data['id_pendaftaran'],
                'id_layanan_pendaftaran'                => $data['id_layanan_pendaftaran'],
				'id_user'                               => $data['id_user'][$key],	
				'tanggal_pemantauan_pal'                      => $tanggal_pal_pemantauan,
				'jam_mulai_pal'                 	 	    => $data['jam_mulai_pal'][$key] !== '' ? $data['jam_mulai_pal'][$key] : null,             
                'jam_selesai_pal'                  	    => $data['jam_selesai_pal'][$key] !== '' ? $data['jam_selesai_pal'][$key] : null, 	                             
				'perawat_pal'                           => $data['perawat_pal'][$key] !== '' ? $data['perawat_pal'][$key] : null,
				'dokter_pal'                           => $data['dokter_pal'][$key] !== '' ? $data['dokter_pal'][$key] : null,
                'obat_pal_1'                  		=> $data['obat_pal_1'][$key] !== '' ? $data['obat_pal_1'][$key] : null,
                'obat_pal_2'                  		=> $data['obat_pal_2'][$key] !== '' ? $data['obat_pal_2'][$key] : null,
                'obat_pal_3'                  	    => $data['obat_pal_3'][$key] !== '' ? $data['obat_pal_3'][$key] : null,
                'obat_pal_4'                  		=> $data['obat_pal_4'][$key] !== '' ? $data['obat_pal_4'][$key] : null,
                'obat_pal_5'                 		=> $data['obat_pal_5'][$key] !== '' ? $data['obat_pal_5'][$key] : null,
                'obat_pal_6'                  		=> $data['obat_pal_6'][$key] !== '' ? $data['obat_pal_6'][$key] : null,
                'obat_pal_7'                  		=> $data['obat_pal_7'][$key] !== '' ? $data['obat_pal_7'][$key] : null,
                'obat_pal_8'                  	    => $data['obat_pal_8'][$key] !== '' ? $data['obat_pal_8'][$key] : null,
                'obat_pal_9'                  		=> $data['obat_pal_9'][$key] !== '' ? $data['obat_pal_9'][$key] : null,
                'obat_pal_10'                 		=> $data['obat_pal_10'][$key] !== '' ? $data['obat_pal_10'][$key] : null,

				'jam_pal_1'                  		=> $data['jam_pal_1'][$key] !== '' ? $data['jam_pal_1'][$key] : null,
                'jam_pal_2'                  		=> $data['jam_pal_2'][$key] !== '' ? $data['jam_pal_2'][$key] : null,
                'jam_pal_3'                  	    => $data['jam_pal_3'][$key] !== '' ? $data['jam_pal_3'][$key] : null,
                'jam_pal_4'                  		=> $data['jam_pal_4'][$key] !== '' ? $data['jam_pal_4'][$key] : null,
                'jam_pal_5'                 		=> $data['jam_pal_5'][$key] !== '' ? $data['jam_pal_5'][$key] : null,
                'jam_pal_6'                  		=> $data['jam_pal_6'][$key] !== '' ? $data['jam_pal_6'][$key] : null,
                'jam_pal_7'                  		=> $data['jam_pal_7'][$key] !== '' ? $data['jam_pal_7'][$key] : null,
                'jam_pal_8'                  	    => $data['jam_pal_8'][$key] !== '' ? $data['jam_pal_8'][$key] : null,
                'jam_pal_9'                  		=> $data['jam_pal_9'][$key] !== '' ? $data['jam_pal_9'][$key] : null,
                'jam_pal_10'                 		=> $data['jam_pal_10'][$key] !== '' ? $data['jam_pal_10'][$key] : null,
                'jam_pal_11'                 		=> $data['jam_pal_11'][$key] !== '' ? $data['jam_pal_11'][$key] : null,
                'jam_pal_12'                 		=> $data['jam_pal_12'][$key] !== '' ? $data['jam_pal_12'][$key] : null,

                'dosis_pal_1'                  		=> $data['dosis_pal_1'][$key] !== '' ? $data['dosis_pal_1'][$key] : null,
                'dosis_pal_2'                  		=> $data['dosis_pal_2'][$key] !== '' ? $data['dosis_pal_2'][$key] : null,
                'dosis_pal_3'                  	    => $data['dosis_pal_3'][$key] !== '' ? $data['dosis_pal_3'][$key] : null,
                'dosis_pal_4'                  		=> $data['dosis_pal_4'][$key] !== '' ? $data['dosis_pal_4'][$key] : null,
                'dosis_pal_5'                 		=> $data['dosis_pal_5'][$key] !== '' ? $data['dosis_pal_5'][$key] : null,
                'dosis_pal_6'                  		=> $data['dosis_pal_6'][$key] !== '' ? $data['dosis_pal_6'][$key] : null,
                'dosis_pal_7'                  		=> $data['dosis_pal_7'][$key] !== '' ? $data['dosis_pal_7'][$key] : null,
                'dosis_pal_8'                  	    => $data['dosis_pal_8'][$key] !== '' ? $data['dosis_pal_8'][$key] : null,
                'dosis_pal_9'                  		=> $data['dosis_pal_9'][$key] !== '' ? $data['dosis_pal_9'][$key] : null,
                'dosis_pal_10'                 		=> $data['dosis_pal_10'][$key] !== '' ? $data['dosis_pal_10'][$key] : null,
                'dosis_pal_11'                 		=> $data['dosis_pal_11'][$key] !== '' ? $data['dosis_pal_11'][$key] : null,
                'dosis_pal_12'                 		=> $data['dosis_pal_12'][$key] !== '' ? $data['dosis_pal_12'][$key] : null,
                'dosis_pal_13'                 		=> $data['dosis_pal_13'][$key] !== '' ? $data['dosis_pal_13'][$key] : null,
                'dosis_pal_14'                 		=> $data['dosis_pal_14'][$key] !== '' ? $data['dosis_pal_14'][$key] : null,
                'dosis_pal_15'                 		=> $data['dosis_pal_15'][$key] !== '' ? $data['dosis_pal_15'][$key] : null,
                'dosis_pal_16'                 		=> $data['dosis_pal_16'][$key] !== '' ? $data['dosis_pal_16'][$key] : null,
                'dosis_pal_17'                 		=> $data['dosis_pal_17'][$key] !== '' ? $data['dosis_pal_17'][$key] : null,
                'dosis_pal_18'                 		=> $data['dosis_pal_18'][$key] !== '' ? $data['dosis_pal_18'][$key] : null,
                'dosis_pal_19'                 		=> $data['dosis_pal_19'][$key] !== '' ? $data['dosis_pal_19'][$key] : null,
                'dosis_pal_20'                 		=> $data['dosis_pal_20'][$key] !== '' ? $data['dosis_pal_20'][$key] : null,
				'dosis_pal_21'                 		=> $data['dosis_pal_21'][$key] !== '' ? $data['dosis_pal_21'][$key] : null,
                'dosis_pal_22'                 		=> $data['dosis_pal_22'][$key] !== '' ? $data['dosis_pal_22'][$key] : null,
                'dosis_pal_23'                 		=> $data['dosis_pal_23'][$key] !== '' ? $data['dosis_pal_23'][$key] : null,
                'dosis_pal_24'                 		=> $data['dosis_pal_24'][$key] !== '' ? $data['dosis_pal_24'][$key] : null,
                'dosis_pal_25'                 		=> $data['dosis_pal_25'][$key] !== '' ? $data['dosis_pal_25'][$key] : null,
                'dosis_pal_26'                 		=> $data['dosis_pal_26'][$key] !== '' ? $data['dosis_pal_26'][$key] : null,
                'dosis_pal_27'                 		=> $data['dosis_pal_27'][$key] !== '' ? $data['dosis_pal_27'][$key] : null,
                'dosis_pal_28'                 		=> $data['dosis_pal_28'][$key] !== '' ? $data['dosis_pal_28'][$key] : null,
                'dosis_pal_29'                 		=> $data['dosis_pal_29'][$key] !== '' ? $data['dosis_pal_29'][$key] : null,
                'dosis_pal_30'                 		=> $data['dosis_pal_30'][$key] !== '' ? $data['dosis_pal_30'][$key] : null,

				// 'rr_pal_1'                  		=> $data['rr_pal_1'][$key] !== '' ? $data['rr_pal_1'][$key] : null,
                // 'hr_pal_2'                  		=> $data['hr_pal_2'][$key] !== '' ? $data['hr_pal_2'][$key] : null,
                // 'rr_pal_3'                  	    => $data['rr_pal_3'][$key] !== '' ? $data['rr_pal_3'][$key] : null,
                // 'hr_pal_4'                  		=> $data['hr_pal_4'][$key] !== '' ? $data['hr_pal_4'][$key] : null,
                // 'rr_pal_5'                 			=> $data['rr_pal_5'][$key] !== '' ? $data['rr_pal_5'][$key] : null,
                // 'hr_pal_6'                  		=> $data['hr_pal_6'][$key] !== '' ? $data['hr_pal_6'][$key] : null,
                // 'rr_pal_7'                  		=> $data['rr_pal_7'][$key] !== '' ? $data['rr_pal_7'][$key] : null,
                // 'hr_pal_8'                  	    => $data['hr_pal_8'][$key] !== '' ? $data['hr_pal_8'][$key] : null,
                // 'rr_pal_9'                  		=> $data['rr_pal_9'][$key] !== '' ? $data['rr_pal_9'][$key] : null,
                // 'hr_pal_10'                 		=> $data['hr_pal_10'][$key] !== '' ? $data['hr_pal_10'][$key] : null,
                // 'rr_pal_11'                 		=> $data['rr_pal_11'][$key] !== '' ? $data['rr_pal_11'][$key] : null,
                // 'hr_pal_12'                 		=> $data['hr_pal_12'][$key] !== '' ? $data['hr_pal_12'][$key] : null,
                // 'rr_pal_13'                 		=> $data['rr_pal_13'][$key] !== '' ? $data['rr_pal_13'][$key] : null,
                // 'hr_pal_14'                 		=> $data['hr_pal_14'][$key] !== '' ? $data['hr_pal_14'][$key] : null,
                // 'rr_pal_15'                 		=> $data['rr_pal_15'][$key] !== '' ? $data['rr_pal_15'][$key] : null,
                // 'hr_pal_16'                 		=> $data['hr_pal_16'][$key] !== '' ? $data['hr_pal_16'][$key] : null,
                // 'rr_pal_17'                 		=> $data['rr_pal_17'][$key] !== '' ? $data['rr_pal_17'][$key] : null,
                // 'hr_pal_18'                 		=> $data['hr_pal_18'][$key] !== '' ? $data['hr_pal_18'][$key] : null,
                // 'rr_pal_19'                 		=> $data['rr_pal_19'][$key] !== '' ? $data['rr_pal_19'][$key] : null,
                // 'hr_pal_20'                 		=> $data['hr_pal_20'][$key] !== '' ? $data['hr_pal_20'][$key] : null,

				'stjp_pal_1'                  		=> $data['stjp_pal_1'][$key] !== '' ? $data['stjp_pal_1'][$key] : null,
                'stjp_pal_2'                  		=> $data['stjp_pal_2'][$key] !== '' ? $data['stjp_pal_2'][$key] : null,
                'stjp_pal_3'                  	    => $data['stjp_pal_3'][$key] !== '' ? $data['stjp_pal_3'][$key] : null,
                'stjp_pal_4'                  		=> $data['stjp_pal_4'][$key] !== '' ? $data['stjp_pal_4'][$key] : null,
                'stjp_pal_5'                 		=> $data['stjp_pal_5'][$key] !== '' ? $data['stjp_pal_5'][$key] : null,
                'stjp_pal_6'                  		=> $data['stjp_pal_6'][$key] !== '' ? $data['stjp_pal_6'][$key] : null,
                'stjp_pal_7'                  		=> $data['stjp_pal_7'][$key] !== '' ? $data['stjp_pal_7'][$key] : null,
                'stjp_pal_8'                  	    => $data['stjp_pal_8'][$key] !== '' ? $data['stjp_pal_8'][$key] : null,
                'stjp_pal_9'                  		=> $data['stjp_pal_9'][$key] !== '' ? $data['stjp_pal_9'][$key] : null,
                'stjp_pal_10'                 		=> $data['stjp_pal_10'][$key] !== '' ? $data['stjp_pal_10'][$key] : null,
                'stjp_pal_11'                 		=> $data['stjp_pal_11'][$key] !== '' ? $data['stjp_pal_11'][$key] : null,
                'stjp_pal_12'                 		=> $data['stjp_pal_12'][$key] !== '' ? $data['stjp_pal_12'][$key] : null,
                'stjp_pal_13'                 		=> $data['stjp_pal_13'][$key] !== '' ? $data['stjp_pal_13'][$key] : null,
                'stjp_pal_14'                 		=> $data['stjp_pal_14'][$key] !== '' ? $data['stjp_pal_14'][$key] : null,
                'stjp_pal_15'                 		=> $data['stjp_pal_15'][$key] !== '' ? $data['stjp_pal_15'][$key] : null,
                'stjp_pal_16'                 		=> $data['stjp_pal_16'][$key] !== '' ? $data['stjp_pal_16'][$key] : null,
                'stjp_pal_17'                 		=> $data['stjp_pal_17'][$key] !== '' ? $data['stjp_pal_17'][$key] : null,
                'stjp_pal_18'                 		=> $data['stjp_pal_18'][$key] !== '' ? $data['stjp_pal_18'][$key] : null,
                'stjp_pal_19'                 		=> $data['stjp_pal_19'][$key] !== '' ? $data['stjp_pal_19'][$key] : null,
                'stjp_pal_20'                 		=> $data['stjp_pal_20'][$key] !== '' ? $data['stjp_pal_20'][$key] : null,
				'stjp_pal_21'                 		=> $data['stjp_pal_21'][$key] !== '' ? $data['stjp_pal_21'][$key] : null,
                'stjp_pal_22'                 		=> $data['stjp_pal_22'][$key] !== '' ? $data['stjp_pal_22'][$key] : null,
                'stjp_pal_23'                 		=> $data['stjp_pal_23'][$key] !== '' ? $data['stjp_pal_23'][$key] : null,
                'stjp_pal_24'                 		=> $data['stjp_pal_24'][$key] !== '' ? $data['stjp_pal_24'][$key] : null,
                'stjp_pal_25'                 		=> $data['stjp_pal_25'][$key] !== '' ? $data['stjp_pal_25'][$key] : null,
                'stjp_pal_26'                 		=> $data['stjp_pal_26'][$key] !== '' ? $data['stjp_pal_26'][$key] : null,
                'stjp_pal_27'                 		=> $data['stjp_pal_27'][$key] !== '' ? $data['stjp_pal_27'][$key] : null,
                'stjp_pal_28'                 		=> $data['stjp_pal_28'][$key] !== '' ? $data['stjp_pal_28'][$key] : null,
                'stjp_pal_29'                 		=> $data['stjp_pal_29'][$key] !== '' ? $data['stjp_pal_29'][$key] : null,
                'stjp_pal_30'                 		=> $data['stjp_pal_30'][$key] !== '' ? $data['stjp_pal_30'][$key] : null,

				'stjp_pal_31'                 		=> $data['stjp_pal_31'][$key] !== '' ? $data['stjp_pal_11'][$key] : null,
                'stjp_pal_32'                 		=> $data['stjp_pal_32'][$key] !== '' ? $data['stjp_pal_12'][$key] : null,
                'stjp_pal_33'                 		=> $data['stjp_pal_33'][$key] !== '' ? $data['stjp_pal_13'][$key] : null,
                'stjp_pal_34'                 		=> $data['stjp_pal_34'][$key] !== '' ? $data['stjp_pal_14'][$key] : null,
                'stjp_pal_35'                 		=> $data['stjp_pal_35'][$key] !== '' ? $data['stjp_pal_15'][$key] : null,
                'stjp_pal_36'                 		=> $data['stjp_pal_36'][$key] !== '' ? $data['stjp_pal_16'][$key] : null,
                'stjp_pal_37'                 		=> $data['stjp_pal_37'][$key] !== '' ? $data['stjp_pal_17'][$key] : null,
                'stjp_pal_38'                 		=> $data['stjp_pal_38'][$key] !== '' ? $data['stjp_pal_18'][$key] : null,
                'stjp_pal_39'                 		=> $data['stjp_pal_39'][$key] !== '' ? $data['stjp_pal_19'][$key] : null,
                'stjp_pal_40'                 		=> $data['stjp_pal_40'][$key] !== '' ? $data['stjp_pal_20'][$key] : null,
				'stjp_pal_41'                 		=> $data['stjp_pal_41'][$key] !== '' ? $data['stjp_pal_21'][$key] : null,
                'stjp_pal_42'                 		=> $data['stjp_pal_42'][$key] !== '' ? $data['stjp_pal_22'][$key] : null,
                'stjp_pal_43'                 		=> $data['stjp_pal_43'][$key] !== '' ? $data['stjp_pal_23'][$key] : null,
                'stjp_pal_44'                 		=> $data['stjp_pal_44'][$key] !== '' ? $data['stjp_pal_24'][$key] : null,
                'stjp_pal_45'                 		=> $data['stjp_pal_45'][$key] !== '' ? $data['stjp_pal_25'][$key] : null,
                'stjp_pal_46'                 		=> $data['stjp_pal_46'][$key] !== '' ? $data['stjp_pal_26'][$key] : null,
                'stjp_pal_47'                 		=> $data['stjp_pal_47'][$key] !== '' ? $data['stjp_pal_27'][$key] : null,
                'stjp_pal_48'                 		=> $data['stjp_pal_48'][$key] !== '' ? $data['stjp_pal_28'][$key] : null,
                'stjp_pal_49'                 		=> $data['stjp_pal_49'][$key] !== '' ? $data['stjp_pal_29'][$key] : null,
                'stjp_pal_50'                 		=> $data['stjp_pal_50'][$key] !== '' ? $data['stjp_pal_30'][$key] : null,

				'stjp_pal_51'                 		=> $data['stjp_pal_51'][$key] !== '' ? $data['stjp_pal_51'][$key] : null,
                'stjp_pal_52'                 		=> $data['stjp_pal_52'][$key] !== '' ? $data['stjp_pal_52'][$key] : null,
                'stjp_pal_53'                 		=> $data['stjp_pal_53'][$key] !== '' ? $data['stjp_pal_53'][$key] : null,
                'stjp_pal_54'                 		=> $data['stjp_pal_54'][$key] !== '' ? $data['stjp_pal_54'][$key] : null,
                'stjp_pal_55'                 		=> $data['stjp_pal_55'][$key] !== '' ? $data['stjp_pal_55'][$key] : null,
                'stjp_pal_56'                 		=> $data['stjp_pal_56'][$key] !== '' ? $data['stjp_pal_56'][$key] : null,
                'stjp_pal_57'                 		=> $data['stjp_pal_57'][$key] !== '' ? $data['stjp_pal_57'][$key] : null,
                'stjp_pal_58'                 		=> $data['stjp_pal_58'][$key] !== '' ? $data['stjp_pal_58'][$key] : null,
                'stjp_pal_59'                 		=> $data['stjp_pal_59'][$key] !== '' ? $data['stjp_pal_59'][$key] : null,
                'stjp_pal_60'                 		=> $data['stjp_pal_60'][$key] !== '' ? $data['stjp_pal_60'][$key] : null,
				'stjp_pal_61'                 		=> $data['stjp_pal_61'][$key] !== '' ? $data['stjp_pal_61'][$key] : null,
                'stjp_pal_62'                 		=> $data['stjp_pal_62'][$key] !== '' ? $data['stjp_pal_62'][$key] : null,
                'stjp_pal_63'                 		=> $data['stjp_pal_63'][$key] !== '' ? $data['stjp_pal_63'][$key] : null,
                'stjp_pal_64'                 		=> $data['stjp_pal_64'][$key] !== '' ? $data['stjp_pal_64'][$key] : null,
                'stjp_pal_65'                 		=> $data['stjp_pal_65'][$key] !== '' ? $data['stjp_pal_65'][$key] : null,
                'stjp_pal_66'                 		=> $data['stjp_pal_66'][$key] !== '' ? $data['stjp_pal_66'][$key] : null,
                'stjp_pal_67'                 		=> $data['stjp_pal_67'][$key] !== '' ? $data['stjp_pal_67'][$key] : null,
                'stjp_pal_68'                 		=> $data['stjp_pal_68'][$key] !== '' ? $data['stjp_pal_68'][$key] : null,
                'stjp_pal_69'                 		=> $data['stjp_pal_69'][$key] !== '' ? $data['stjp_pal_69'][$key] : null,
                'stjp_pal_70'                 		=> $data['stjp_pal_70'][$key] !== '' ? $data['stjp_pal_70'][$key] : null,

				'stjp_pal_71'                 		=> $data['stjp_pal_71'][$key] !== '' ? $data['stjp_pal_71'][$key] : null,
                'stjp_pal_72'                 		=> $data['stjp_pal_72'][$key] !== '' ? $data['stjp_pal_72'][$key] : null,
                'stjp_pal_73'                 		=> $data['stjp_pal_73'][$key] !== '' ? $data['stjp_pal_73'][$key] : null,
                'stjp_pal_74'                 		=> $data['stjp_pal_74'][$key] !== '' ? $data['stjp_pal_74'][$key] : null,
                'stjp_pal_75'                 		=> $data['stjp_pal_75'][$key] !== '' ? $data['stjp_pal_75'][$key] : null,
                'stjp_pal_76'                 		=> $data['stjp_pal_76'][$key] !== '' ? $data['stjp_pal_76'][$key] : null,
                'stjp_pal_77'                 		=> $data['stjp_pal_77'][$key] !== '' ? $data['stjp_pal_77'][$key] : null,
                'stjp_pal_78'                 		=> $data['stjp_pal_78'][$key] !== '' ? $data['stjp_pal_78'][$key] : null,
                'stjp_pal_79'                 		=> $data['stjp_pal_79'][$key] !== '' ? $data['stjp_pal_79'][$key] : null,
                'stjp_pal_80'                 		=> $data['stjp_pal_80'][$key] !== '' ? $data['stjp_pal_80'][$key] : null,
				'stjp_pal_81'                 		=> $data['stjp_pal_81'][$key] !== '' ? $data['stjp_pal_81'][$key] : null,
                'stjp_pal_82'                 		=> $data['stjp_pal_82'][$key] !== '' ? $data['stjp_pal_82'][$key] : null,
                'stjp_pal_83'                 		=> $data['stjp_pal_83'][$key] !== '' ? $data['stjp_pal_83'][$key] : null,
                'stjp_pal_84'                 		=> $data['stjp_pal_84'][$key] !== '' ? $data['stjp_pal_84'][$key] : null,
                'stjp_pal_85'                 		=> $data['stjp_pal_85'][$key] !== '' ? $data['stjp_pal_85'][$key] : null,
                'stjp_pal_86'                 		=> $data['stjp_pal_86'][$key] !== '' ? $data['stjp_pal_86'][$key] : null,
                'stjp_pal_87'                 		=> $data['stjp_pal_87'][$key] !== '' ? $data['stjp_pal_87'][$key] : null,
                'stjp_pal_88'                 		=> $data['stjp_pal_88'][$key] !== '' ? $data['stjp_pal_88'][$key] : null,
                'stjp_pal_89'                 		=> $data['stjp_pal_89'][$key] !== '' ? $data['stjp_pal_89'][$key] : null,
                'stjp_pal_90'                 		=> $data['stjp_pal_90'][$key] !== '' ? $data['stjp_pal_90'][$key] : null,

				'stjp_pal_91'                 		=> $data['stjp_pal_91'][$key] !== '' ? $data['stjp_pal_91'][$key] : null,
                'stjp_pal_92'                 		=> $data['stjp_pal_92'][$key] !== '' ? $data['stjp_pal_92'][$key] : null,
                'stjp_pal_93'                 		=> $data['stjp_pal_93'][$key] !== '' ? $data['stjp_pal_93'][$key] : null,
                'stjp_pal_94'                 		=> $data['stjp_pal_94'][$key] !== '' ? $data['stjp_pal_94'][$key] : null,
                'stjp_pal_95'                 		=> $data['stjp_pal_95'][$key] !== '' ? $data['stjp_pal_95'][$key] : null,
                'stjp_pal_96'                 		=> $data['stjp_pal_96'][$key] !== '' ? $data['stjp_pal_96'][$key] : null,
                'stjp_pal_97'                 		=> $data['stjp_pal_97'][$key] !== '' ? $data['stjp_pal_97'][$key] : null,
                'stjp_pal_98'                 		=> $data['stjp_pal_98'][$key] !== '' ? $data['stjp_pal_98'][$key] : null,
                'stjp_pal_99'                 		=> $data['stjp_pal_99'][$key] !== '' ? $data['stjp_pal_99'][$key] : null,
                'stjp_pal_100'                 		=> $data['stjp_pal_100'][$key] !== '' ? $data['stjp_pal_100'][$key] : null,

                'stjp_pal_101'                 		=> $data['stjp_pal_101'][$key] !== '' ? $data['stjp_pal_101'][$key] : null,
                'stjp_pal_102'                 		=> $data['stjp_pal_102'][$key] !== '' ? $data['stjp_pal_102'][$key] : null,
                'stjp_pal_103'                 		=> $data['stjp_pal_103'][$key] !== '' ? $data['stjp_pal_103'][$key] : null,
                'stjp_pal_104'                 		=> $data['stjp_pal_104'][$key] !== '' ? $data['stjp_pal_104'][$key] : null,
                'stjp_pal_105'                 		=> $data['stjp_pal_105'][$key] !== '' ? $data['stjp_pal_105'][$key] : null,
                'stjp_pal_106'                 		=> $data['stjp_pal_106'][$key] !== '' ? $data['stjp_pal_106'][$key] : null,
                'stjp_pal_107'                 		=> $data['stjp_pal_107'][$key] !== '' ? $data['stjp_pal_107'][$key] : null,
                'stjp_pal_108'                 		=> $data['stjp_pal_108'][$key] !== '' ? $data['stjp_pal_108'][$key] : null,
                'stjp_pal_109'                 		=> $data['stjp_pal_109'][$key] !== '' ? $data['stjp_pal_109'][$key] : null,
                'stjp_pal_110'                 		=> $data['stjp_pal_110'][$key] !== '' ? $data['stjp_pal_110'][$key] : null,
                'stjp_pal_111'                 		=> $data['stjp_pal_111'][$key] !== '' ? $data['stjp_pal_111'][$key] : null,
                'stjp_pal_112'                 		=> $data['stjp_pal_112'][$key] !== '' ? $data['stjp_pal_112'][$key] : null,
                'stjp_pal_113'                 		=> $data['stjp_pal_113'][$key] !== '' ? $data['stjp_pal_113'][$key] : null,
                'stjp_pal_114'                 		=> $data['stjp_pal_114'][$key] !== '' ? $data['stjp_pal_114'][$key] : null,
                'stjp_pal_115'                 		=> $data['stjp_pal_115'][$key] !== '' ? $data['stjp_pal_115'][$key] : null,
                'stjp_pal_116'                 		=> $data['stjp_pal_116'][$key] !== '' ? $data['stjp_pal_116'][$key] : null,
                'stjp_pal_117'                 		=> $data['stjp_pal_117'][$key] !== '' ? $data['stjp_pal_117'][$key] : null,
                'stjp_pal_118'                 		=> $data['stjp_pal_118'][$key] !== '' ? $data['stjp_pal_118'][$key] : null,
                'stjp_pal_119'                 		=> $data['stjp_pal_119'][$key] !== '' ? $data['stjp_pal_119'][$key] : null,
                'stjp_pal_120'                 		=> $data['stjp_pal_120'][$key] !== '' ? $data['stjp_pal_120'][$key] : null,
			
				'td_pal_1'                  		=> $data['td_pal_1'][$key] !== '' ? $data['td_pal_1'][$key] : null,
                'td_pal_2'                  		=> $data['td_pal_2'][$key] !== '' ? $data['td_pal_2'][$key] : null,
                'td_pal_3'                  	    => $data['td_pal_3'][$key] !== '' ? $data['td_pal_3'][$key] : null,
                'td_pal_4'                  		=> $data['td_pal_4'][$key] !== '' ? $data['td_pal_4'][$key] : null,
                'td_pal_5'                 			=> $data['td_pal_5'][$key] !== '' ? $data['td_pal_5'][$key] : null,
                'td_pal_6'                  		=> $data['td_pal_6'][$key] !== '' ? $data['td_pal_6'][$key] : null,
                'td_pal_7'                  		=> $data['td_pal_7'][$key] !== '' ? $data['td_pal_7'][$key] : null,
                'td_pal_8'                  	    => $data['td_pal_8'][$key] !== '' ? $data['td_pal_8'][$key] : null,
                'td_pal_9'                  		=> $data['td_pal_9'][$key] !== '' ? $data['td_pal_9'][$key] : null,
                'td_pal_10'                 		=> $data['td_pal_10'][$key] !== '' ? $data['td_pal_10'][$key] : null,
                'td_pal_11'                 		=> $data['td_pal_11'][$key] !== '' ? $data['td_pal_11'][$key] : null,
                'td_pal_12'                 		=> $data['td_pal_12'][$key] !== '' ? $data['td_pal_12'][$key] : null,
                'td_pal_13'                 		=> $data['td_pal_13'][$key] !== '' ? $data['td_pal_13'][$key] : null,
                'td_pal_14'                 		=> $data['td_pal_14'][$key] !== '' ? $data['td_pal_14'][$key] : null,
                'td_pal_15'                 		=> $data['td_pal_15'][$key] !== '' ? $data['td_pal_15'][$key] : null,
                'td_pal_16'                 		=> $data['td_pal_16'][$key] !== '' ? $data['td_pal_16'][$key] : null,
                'td_pal_17'                 		=> $data['td_pal_17'][$key] !== '' ? $data['td_pal_17'][$key] : null,
				
				'so2_pal_1'                  		=> $data['so2_pal_1'][$key] !== '' ? $data['so2_pal_1'][$key] : null,
                'so2_pal_2'                  		=> $data['so2_pal_2'][$key] !== '' ? $data['so2_pal_2'][$key] : null,
                'so2_pal_3'                  	    => $data['so2_pal_3'][$key] !== '' ? $data['so2_pal_3'][$key] : null,
                'so2_pal_4'                  		=> $data['so2_pal_4'][$key] !== '' ? $data['so2_pal_4'][$key] : null,
                'so2_pal_5'                 		=> $data['so2_pal_5'][$key] !== '' ? $data['so2_pal_5'][$key] : null,
                'so2_pal_6'                  		=> $data['so2_pal_6'][$key] !== '' ? $data['so2_pal_6'][$key] : null,
                'so2_pal_7'                  		=> $data['so2_pal_7'][$key] !== '' ? $data['so2_pal_7'][$key] : null,
                'so2_pal_8'                  	    => $data['so2_pal_8'][$key] !== '' ? $data['so2_pal_8'][$key] : null,
                'so2_pal_9'                  		=> $data['so2_pal_9'][$key] !== '' ? $data['so2_pal_9'][$key] : null,
                'so2_pal_10'                 		=> $data['so2_pal_10'][$key] !== '' ? $data['so2_pal_10'][$key] : null,
                'so2_pal_11'                 		=> $data['so2_pal_11'][$key] !== '' ? $data['so2_pal_11'][$key] : null,
                'so2_pal_12'                 		=> $data['so2_pal_12'][$key] !== '' ? $data['so2_pal_12'][$key] : null,
                'so2_pal_13'                 		=> $data['so2_pal_13'][$key] !== '' ? $data['so2_pal_13'][$key] : null,
                'so2_pal_14'                 		=> $data['so2_pal_14'][$key] !== '' ? $data['so2_pal_14'][$key] : null,
                'so2_pal_15'                 		=> $data['so2_pal_15'][$key] !== '' ? $data['so2_pal_15'][$key] : null,
                'so2_pal_16'                 		=> $data['so2_pal_16'][$key] !== '' ? $data['so2_pal_16'][$key] : null,
                'so2_pal_17'                 		=> $data['so2_pal_17'][$key] !== '' ? $data['so2_pal_17'][$key] : null,
				
				'kd_pal_1'                  		=> $data['kd_pal_1'][$key] !== '' ? $data['kd_pal_1'][$key] : null,
                'kd_pal_2'                  		=> $data['kd_pal_2'][$key] !== '' ? $data['kd_pal_2'][$key] : null,
                'kd_pal_3'                  	    => $data['kd_pal_3'][$key] !== '' ? $data['kd_pal_3'][$key] : null,
                'kd_pal_4'                  		=> $data['kd_pal_4'][$key] !== '' ? $data['kd_pal_4'][$key] : null,
                'kd_pal_5'                 			=> $data['kd_pal_5'][$key] !== '' ? $data['kd_pal_5'][$key] : null,
                'kd_pal_6'                  		=> $data['kd_pal_6'][$key] !== '' ? $data['kd_pal_6'][$key] : null,
                'kd_pal_7'                  		=> $data['kd_pal_7'][$key] !== '' ? $data['kd_pal_7'][$key] : null,
                'kd_pal_8'                  	    => $data['kd_pal_8'][$key] !== '' ? $data['kd_pal_8'][$key] : null,
                'kd_pal_9'                  		=> $data['kd_pal_9'][$key] !== '' ? $data['kd_pal_9'][$key] : null,
                'kd_pal_10'                 		=> $data['kd_pal_10'][$key] !== '' ? $data['kd_pal_10'][$key] : null,
                'kd_pal_11'                 		=> $data['kd_pal_11'][$key] !== '' ? $data['kd_pal_11'][$key] : null,
                'kd_pal_12'                 		=> $data['kd_pal_12'][$key] !== '' ? $data['kd_pal_12'][$key] : null,
                'kd_pal_13'                 		=> $data['kd_pal_13'][$key] !== '' ? $data['kd_pal_13'][$key] : null,
                'kd_pal_14'                 		=> $data['kd_pal_14'][$key] !== '' ? $data['kd_pal_14'][$key] : null,
                'kd_pal_15'                 		=> $data['kd_pal_15'][$key] !== '' ? $data['kd_pal_15'][$key] : null,
                'kd_pal_16'                 		=> $data['kd_pal_16'][$key] !== '' ? $data['kd_pal_16'][$key] : null,
                'kd_pal_17'                 		=> $data['kd_pal_17'][$key] !== '' ? $data['kd_pal_17'][$key] : null,
                'created_at'                 		=> $value,
            );
            $this->db->insert('sm_pemantauan_anestesi_lokal', $data_terapi);
            // var_dump($data_terapi);die;
        }
    }

	// PAL 2
	function editPemantauanAnestesiLokal($data){
		return $this->db->where('id', $data['id'], true)->update('sm_pemantauan_anestesi_lokal', $data);
	}

	
	// PAL 3
	function deletePemantauanAnestesiLokal($id){
		return $this->db->where("id", $id)->delete("sm_pemantauan_anestesi_lokal");
	}


	// PAL 4 BELUM
    function getPemantauanAnestesiLokal($id_pendaftaran) {
        return $this->db->select("
			pal.*, 	
			COALESCE(spg1.nama, '') as perawat,
			COALESCE(spd1.nama, '') as dokter,             
			COALESCE(spobt1.nama, '') as obat_1,
			COALESCE(spobt2.nama, '') as obat_2,
			COALESCE(spobt3.nama, '') as obat_3,
			COALESCE(spobt4.nama, '') as obat_4,
			COALESCE(spobt5.nama, '') as obat_5,
			COALESCE(wid.nama, '') as akun_user ")
		->from('sm_pemantauan_anestesi_lokal as pal')
		->join('sm_layanan_pendaftaran as lp', 'pal.id_layanan_pendaftaran = lp.id')
		->join('sm_tenaga_medis as tmp1', 'pal.perawat_pal = tmp1.id', 'left')
		->join('sm_pegawai as spg1', 'spg1.id = tmp1.id_pegawai', 'left')
		->join('sm_tenaga_medis as tmd1', 'tmd1.id = pal.dokter_pal', 'left')
		->join('sm_pegawai as spd1', 'spd1.id = tmd1.id_pegawai', 'left')

		->join('sm_barang spobt1', 'spobt1.id = pal.obat_pal_1', 'left')
		->join('sm_barang spobt2', 'spobt2.id = pal.obat_pal_2', 'left')
		->join('sm_barang spobt3', 'spobt3.id = pal.obat_pal_3', 'left')
		->join('sm_barang spobt4', 'spobt4.id = pal.obat_pal_4', 'left')
		->join('sm_barang spobt5', 'spobt5.id = pal.obat_pal_5', 'left')
		->join('sm_translucent as sid', 'pal.id_user = sid.id', 'left')
		->join('sm_pegawai as wid', 'pal.id_user = wid.id', 'left')
		->where('lp.id_pendaftaran', $id_pendaftaran)
		->order_by('pal.tanggal_pemantauan_pal', 'asc')
		->get()
		->result();
    }
    

	// PAL 5 BELUM
    function getPemantauanAnestesiLokalByID($id) {
        return $this->db->select("
		pal.*, 	
		COALESCE(spg1.nama, '') as perawat,
		COALESCE(spd1.nama, '') as dokter,	   
		COALESCE(spobt1.nama, '') as obat_1,
		COALESCE(spobt2.nama, '') as obat_2,
		COALESCE(spobt3.nama, '') as obat_3,
		COALESCE(spobt4.nama, '') as obat_4,
		COALESCE(spobt5.nama, '') as obat_5,
		COALESCE(wid.nama, '') as akun_user")
		->from('sm_pemantauan_anestesi_lokal as pal')
		->join('sm_tenaga_medis as tmp1', 'pal.perawat_pal = tmp1.id', 'left')
		->join('sm_pegawai as spg1', 'spg1.id = tmp1.id_pegawai', 'left')
		->join('sm_tenaga_medis as tmd1', 'tmd1.id = pal.dokter_pal', 'left')
		->join('sm_pegawai as spd1', 'spd1.id = tmd1.id_pegawai', 'left')
		->join('sm_barang spobt1', 'spobt1.id = pal.obat_pal_1', 'left')
		->join('sm_barang spobt2', 'spobt2.id = pal.obat_pal_2', 'left')
		->join('sm_barang spobt3', 'spobt3.id = pal.obat_pal_3', 'left')
		->join('sm_barang spobt4', 'spobt4.id = pal.obat_pal_4', 'left')
		->join('sm_barang spobt5', 'spobt5.id = pal.obat_pal_5', 'left')
		->join('sm_translucent as sid', 'pal.id_user = sid.id', 'left')
		->join('sm_pegawai as wid', 'pal.id_user = wid.id', 'left')
		->where('pal.id', $id)
		->order_by('pal.tanggal_pemantauan_pal', 'asc')
		->get()
		->row();
	}






	// CKP BARU
	function getCatatanKeperawatanPerioperatif($id_pendaftaran){
		// var_dump($id_pendaftaran);die;
		return $this->db->select('ckp.*, pgp1.nama as nama_perawat_1, 
										pgp1.nama as nama_perawat_1, 
										pgp2.nama as nama_perawat_2,
										pgp3.nama as nama_perawat_3,
										pgp4.nama as nama_perawat_4,
										pgp5.nama as nama_perawat_5,
										pgp6.nama as nama_perawat_6, 
										pgp7.nama as nama_perawat_7,
										pgp8.nama as nama_perawat_8, 
										pgp9.nama as nama_perawat_9, 
										pgp10.nama as nama_perawat_10, 
										pgp11.nama as nama_perawat_11, 
										pgp12.nama as nama_perawat_12,
										pgp13.nama as nama_perawat_13,
										pgp14.nama as nama_perawat_14,
										pgp15.nama as nama_perawat_15,
										pgp16.nama as nama_perawat_16,
										pgp17.nama as nama_perawat_17,			
										pgd1.nama as nama_dokter_1, 
										pgu.nama as user')	
		->from('sm_catatan_keperawatan_perioperatif as ckp')
		->join('sm_tenaga_medis as tmp1 ', ' tmp1.id = ckp.perawat_ruangan_pfp', 'left')
		->join('sm_tenaga_medis as tmp2 ', ' tmp2.id = ckp.perawat_penerima_ot_ppo', 'left')
		->join('sm_tenaga_medis as tmp3 ', ' tmp3.id = ckp.perawat_ot_po', 'left')
		->join('sm_tenaga_medis as tmp4 ', ' tmp4.id = ckp.perawwat_ruangan_pr', 'left')
		->join('sm_tenaga_medis as tmp5 ', ' tmp5.id = ckp.perawwat_anastesi_pa', 'left')
		->join('sm_tenaga_medis as tmp6 ', ' tmp6.id = ckp.perawwat_kamar_bedah', 'left')
		->join('sm_tenaga_medis as tmp7 ', ' tmp7.id = ckp.perawat_instrument_1', 'left')
		->join('sm_tenaga_medis as tmp8 ', ' tmp8.id = ckp.perawat_instrument_2', 'left')
		->join('sm_tenaga_medis as tmp9 ', ' tmp9.id = ckp.perawwat_ruangan_prr', 'left')
		->join('sm_tenaga_medis as tmp10 ', ' tmp10.id = ckp.perawwat_anastesi_paa', 'left')
		->join('sm_tenaga_medis as tmp11 ', ' tmp11.id = ckp.perawwat_kamar_bedahh', 'left')
		->join('sm_tenaga_medis as tmp12 ', ' tmp12.id = ckp.perawat_cpo', 'left')
		->join('sm_tenaga_medis as tmp13 ', ' tmp13.id = ckp.perawatt_cpo', 'left')
		->join('sm_tenaga_medis as tmp14 ', ' tmp14.id = ckp.perawwat_ruangan_prrr', 'left')
		->join('sm_tenaga_medis as tmp15 ', ' tmp15.id = ckp.perawwat_anastesi_paaa', 'left')
		->join('sm_tenaga_medis as tmp16 ', ' tmp16.id = ckp.perawwat_kamar_bedahhh', 'left')
		->join('sm_tenaga_medis as tmp17 ', ' tmp17.id = ckp.perawwat_ruangan_sirkuler', 'left')
		->join('sm_pegawai as pgp1 ', ' pgp1.id = tmp1.id_pegawai', 'left')
		->join('sm_pegawai as pgp2 ', ' pgp2.id = tmp2.id_pegawai', 'left')
		->join('sm_pegawai as pgp3 ', ' pgp3.id = tmp3.id_pegawai', 'left')
		->join('sm_pegawai as pgp4 ', ' pgp4.id = tmp4.id_pegawai', 'left')
		->join('sm_pegawai as pgp5 ', ' pgp5.id = tmp5.id_pegawai', 'left')
		->join('sm_pegawai as pgp6 ', ' pgp6.id = tmp6.id_pegawai', 'left')
		->join('sm_pegawai as pgp7 ', ' pgp7.id = tmp7.id_pegawai', 'left')
		->join('sm_pegawai as pgp8 ', ' pgp8.id = tmp8.id_pegawai', 'left')
		->join('sm_pegawai as pgp9 ', ' pgp9.id = tmp9.id_pegawai', 'left')
		->join('sm_pegawai as pgp10 ', ' pgp10.id = tmp10.id_pegawai', 'left')
		->join('sm_pegawai as pgp11 ', ' pgp11.id = tmp11.id_pegawai', 'left')
		->join('sm_pegawai as pgp12 ', ' pgp12.id = tmp12.id_pegawai', 'left')
		->join('sm_pegawai as pgp13 ', ' pgp13.id = tmp13.id_pegawai', 'left')
		->join('sm_pegawai as pgp14 ', ' pgp14.id = tmp14.id_pegawai', 'left')
		->join('sm_pegawai as pgp15 ', ' pgp15.id = tmp15.id_pegawai', 'left')
		->join('sm_pegawai as pgp16 ', ' pgp16.id = tmp16.id_pegawai', 'left')
		->join('sm_pegawai as pgp17 ', ' pgp17.id = tmp17.id_pegawai', 'left')
		->join('sm_tenaga_medis as tmd1 ', ' tmd1.id = ckp.dokter_operator_ckp', 'left')
		->join('sm_pegawai as pgd1 ', ' pgd1.id = tmd1.id_pegawai', 'left')
		->join('sm_translucent as tr', 'tr.id = ckp.id_users', 'left')
		->join('sm_pegawai as pgu', 'pgu.id = tr.id', 'left')
		->where('ckp.id_pendaftaran', $id_pendaftaran, true)
		->get()
		->row();
	}

	// CKP BARU
	function getListDataCatatanPerioperatifR($id){
		// var_dump($id);die;
		$this->db->select('dcp.*, ckp.*,
								pgp1.nama as nama_perawat_1, 
								pgp2.nama as nama_perawat_2,
								pgp3.nama as nama_perawat_3,
								pgp4.nama as nama_perawat_4,
								pgp5.nama as nama_perawat_5,
								pgp6.nama as nama_perawat_6, 
								pgp7.nama as nama_perawat_7,
								pgp8.nama as nama_perawat_8, 
								pgp9.nama as nama_perawat_9, 
								pgp10.nama as nama_perawat_10, 
								pgp11.nama as nama_perawat_11, 
								pgp12.nama as nama_perawat_12,
								pgp13.nama as nama_perawat_13,
								pgp14.nama as nama_perawat_14,
								pgp15.nama as nama_perawat_15,
								pgp16.nama as nama_perawat_16,
								pgp17.nama as nama_perawat_17,			
								pgd1.nama as nama_dokter_1, 
								pgu.nama as user')
		->from('sm_data_catatan_perioperatif as dcp')
		->join('sm_catatan_keperawatan_perioperatif as ckp', 'dcp.id = ckp.id_data_catatan_perioperatift')
		->join('sm_tenaga_medis as tmp1 ', ' tmp1.id = ckp.perawat_ruangan_pfp', 'left')
		->join('sm_tenaga_medis as tmp2 ', ' tmp2.id = ckp.perawat_penerima_ot_ppo', 'left')
		->join('sm_tenaga_medis as tmp3 ', ' tmp3.id = ckp.perawat_ot_po', 'left')
		->join('sm_tenaga_medis as tmp4 ', ' tmp4.id = ckp.perawwat_ruangan_pr', 'left')
		->join('sm_tenaga_medis as tmp5 ', ' tmp5.id = ckp.perawwat_anastesi_pa', 'left')
		->join('sm_tenaga_medis as tmp6 ', ' tmp6.id = ckp.perawwat_kamar_bedah', 'left')
		->join('sm_tenaga_medis as tmp7 ', ' tmp7.id = ckp.perawat_instrument_1', 'left')
		->join('sm_tenaga_medis as tmp8 ', ' tmp8.id = ckp.perawat_instrument_2', 'left')
		->join('sm_tenaga_medis as tmp9 ', ' tmp9.id = ckp.perawwat_ruangan_prr', 'left')
		->join('sm_tenaga_medis as tmp10 ', ' tmp10.id = ckp.perawwat_anastesi_paa', 'left')
		->join('sm_tenaga_medis as tmp11 ', ' tmp11.id = ckp.perawwat_kamar_bedahh', 'left')
		->join('sm_tenaga_medis as tmp12 ', ' tmp12.id = ckp.perawat_cpo', 'left')
		->join('sm_tenaga_medis as tmp13 ', ' tmp13.id = ckp.perawatt_cpo', 'left')
		->join('sm_tenaga_medis as tmp14 ', ' tmp14.id = ckp.perawwat_ruangan_prrr', 'left')
		->join('sm_tenaga_medis as tmp15 ', ' tmp15.id = ckp.perawwat_anastesi_paaa', 'left')
		->join('sm_tenaga_medis as tmp16 ', ' tmp16.id = ckp.perawwat_kamar_bedahhh', 'left')
		->join('sm_tenaga_medis as tmp17 ', ' tmp17.id = ckp.perawwat_ruangan_sirkuler', 'left')
		->join('sm_pegawai as pgp1 ', ' pgp1.id = tmp1.id_pegawai', 'left')
		->join('sm_pegawai as pgp2 ', ' pgp2.id = tmp2.id_pegawai', 'left')
		->join('sm_pegawai as pgp3 ', ' pgp3.id = tmp3.id_pegawai', 'left')
		->join('sm_pegawai as pgp4 ', ' pgp4.id = tmp4.id_pegawai', 'left')
		->join('sm_pegawai as pgp5 ', ' pgp5.id = tmp5.id_pegawai', 'left')
		->join('sm_pegawai as pgp6 ', ' pgp6.id = tmp6.id_pegawai', 'left')
		->join('sm_pegawai as pgp7 ', ' pgp7.id = tmp7.id_pegawai', 'left')
		->join('sm_pegawai as pgp8 ', ' pgp8.id = tmp8.id_pegawai', 'left')
		->join('sm_pegawai as pgp9 ', ' pgp9.id = tmp9.id_pegawai', 'left')
		->join('sm_pegawai as pgp10 ', ' pgp10.id = tmp10.id_pegawai', 'left')
		->join('sm_pegawai as pgp11 ', ' pgp11.id = tmp11.id_pegawai', 'left')
		->join('sm_pegawai as pgp12 ', ' pgp12.id = tmp12.id_pegawai', 'left')
		->join('sm_pegawai as pgp13 ', ' pgp13.id = tmp13.id_pegawai', 'left')
		->join('sm_pegawai as pgp14 ', ' pgp14.id = tmp14.id_pegawai', 'left')
		->join('sm_pegawai as pgp15 ', ' pgp15.id = tmp15.id_pegawai', 'left')
		->join('sm_pegawai as pgp16 ', ' pgp16.id = tmp16.id_pegawai', 'left')
		->join('sm_pegawai as pgp17 ', ' pgp17.id = tmp17.id_pegawai', 'left')
		->join('sm_tenaga_medis as tmd1 ', ' tmd1.id = ckp.dokter_operator_ckp', 'left')
		->join('sm_pegawai as pgd1 ', ' pgd1.id = tmd1.id_pegawai', 'left')
		->join('sm_translucent as tr', 'tr.id = ckp.id_users', 'left')
		->join('sm_pegawai as pgu', 'pgu.id = tr.id', 'left')
		->where('dcp.id_pendaftaran', $id);	
		$query = $this->db->get();
		return $query->result();
	}

	// CKP BARU
	function getEditDataCatatanPerioperatif($id_pendaftaran) {
		// var_dump($id_pendaftaran);die;
		$this->db->select('dcp.*, ckp.*,
								pgp1.nama as nama_perawat_1, 
								pgp2.nama as nama_perawat_2,
								pgp3.nama as nama_perawat_3,
								pgp4.nama as nama_perawat_4,
								pgp5.nama as nama_perawat_5,
								pgp6.nama as nama_perawat_6, 
								pgp7.nama as nama_perawat_7,
								pgp8.nama as nama_perawat_8, 
								pgp9.nama as nama_perawat_9, 
								pgp10.nama as nama_perawat_10, 
								pgp11.nama as nama_perawat_11, 
								pgp12.nama as nama_perawat_12,
								pgp13.nama as nama_perawat_13,
								pgp14.nama as nama_perawat_14,
								pgp15.nama as nama_perawat_15,
								pgp16.nama as nama_perawat_16,
								pgp17.nama as nama_perawat_17,			
								pgd1.nama as nama_dokter_1, 
								pgu.nama as user')
			->from('sm_data_catatan_perioperatif as dcp')
			->join('sm_catatan_keperawatan_perioperatif as ckp', 'dcp.id = ckp.id_data_catatan_perioperatift')
			->join('sm_tenaga_medis as tmp1 ', ' tmp1.id = ckp.perawat_ruangan_pfp', 'left')
			->join('sm_tenaga_medis as tmp2 ', ' tmp2.id = ckp.perawat_penerima_ot_ppo', 'left')
			->join('sm_tenaga_medis as tmp3 ', ' tmp3.id = ckp.perawat_ot_po', 'left')
			->join('sm_tenaga_medis as tmp4 ', ' tmp4.id = ckp.perawwat_ruangan_pr', 'left')
			->join('sm_tenaga_medis as tmp5 ', ' tmp5.id = ckp.perawwat_anastesi_pa', 'left')
			->join('sm_tenaga_medis as tmp6 ', ' tmp6.id = ckp.perawwat_kamar_bedah', 'left')
			->join('sm_tenaga_medis as tmp7 ', ' tmp7.id = ckp.perawat_instrument_1', 'left')
			->join('sm_tenaga_medis as tmp8 ', ' tmp8.id = ckp.perawat_instrument_2', 'left')
			->join('sm_tenaga_medis as tmp9 ', ' tmp9.id = ckp.perawwat_ruangan_prr', 'left')
			->join('sm_tenaga_medis as tmp10 ', ' tmp10.id = ckp.perawwat_anastesi_paa', 'left')
			->join('sm_tenaga_medis as tmp11 ', ' tmp11.id = ckp.perawwat_kamar_bedahh', 'left')
			->join('sm_tenaga_medis as tmp12 ', ' tmp12.id = ckp.perawat_cpo', 'left')
			->join('sm_tenaga_medis as tmp13 ', ' tmp13.id = ckp.perawatt_cpo', 'left')
			->join('sm_tenaga_medis as tmp14 ', ' tmp14.id = ckp.perawwat_ruangan_prrr', 'left')
			->join('sm_tenaga_medis as tmp15 ', ' tmp15.id = ckp.perawwat_anastesi_paaa', 'left')
			->join('sm_tenaga_medis as tmp16 ', ' tmp16.id = ckp.perawwat_kamar_bedahhh', 'left')
			->join('sm_tenaga_medis as tmp17 ', ' tmp17.id = ckp.perawwat_ruangan_sirkuler', 'left')
			->join('sm_pegawai as pgp1 ', ' pgp1.id = tmp1.id_pegawai', 'left')
			->join('sm_pegawai as pgp2 ', ' pgp2.id = tmp2.id_pegawai', 'left')
			->join('sm_pegawai as pgp3 ', ' pgp3.id = tmp3.id_pegawai', 'left')
			->join('sm_pegawai as pgp4 ', ' pgp4.id = tmp4.id_pegawai', 'left')
			->join('sm_pegawai as pgp5 ', ' pgp5.id = tmp5.id_pegawai', 'left')
			->join('sm_pegawai as pgp6 ', ' pgp6.id = tmp6.id_pegawai', 'left')
			->join('sm_pegawai as pgp7 ', ' pgp7.id = tmp7.id_pegawai', 'left')
			->join('sm_pegawai as pgp8 ', ' pgp8.id = tmp8.id_pegawai', 'left')
			->join('sm_pegawai as pgp9 ', ' pgp9.id = tmp9.id_pegawai', 'left')
			->join('sm_pegawai as pgp10 ', ' pgp10.id = tmp10.id_pegawai', 'left')
			->join('sm_pegawai as pgp11 ', ' pgp11.id = tmp11.id_pegawai', 'left')
			->join('sm_pegawai as pgp12 ', ' pgp12.id = tmp12.id_pegawai', 'left')
			->join('sm_pegawai as pgp13 ', ' pgp13.id = tmp13.id_pegawai', 'left')
			->join('sm_pegawai as pgp14 ', ' pgp14.id = tmp14.id_pegawai', 'left')
			->join('sm_pegawai as pgp15 ', ' pgp15.id = tmp15.id_pegawai', 'left')
			->join('sm_pegawai as pgp16 ', ' pgp16.id = tmp16.id_pegawai', 'left')
			->join('sm_pegawai as pgp17 ', ' pgp17.id = tmp17.id_pegawai', 'left')
			->join('sm_tenaga_medis as tmd1 ', ' tmd1.id = ckp.dokter_operator_ckp', 'left')
			->join('sm_pegawai as pgd1 ', ' pgd1.id = tmd1.id_pegawai', 'left')
			->join('sm_translucent as tr', 'tr.id = ckp.id_users', 'left')
			->join('sm_pegawai as pgu', 'pgu.id = tr.id', 'left')
			->where('dcp.id_pendaftaran', $id_pendaftaran);   
		$query = $this->db->get(); // Eksekusi query    
		$data = array(); // Inisialisasi array data   
		if ($query->num_rows() > 0) {
			$data['data'] = $query->row(); // Dapatkan baris pertama
			$data['jumlah'] = $query->num_rows(); // Dapatkan jumlah baris
		} else {
			$data['data'] = null;
			$data['jumlah'] = 0;
		}   
		return $data;
	}

	// CKP BARU		
	function updateDataCatatanPerioperatif($data_catatan, $id_pendaftaran, $id_data_catatan_perioperatift) {
		// var_dump($id_data_catatan_perioperatift);die;
		// Periksa apakah $id_data_catatan_perioperatift ada
		if ($id_data_catatan_perioperatift) {
		// var_dump($data_catatan);die;	
			// Perbarui data yang ada
			$this->db->where('id', $id_data_catatan_perioperatift);
			$this->db->update('sm_data_catatan_perioperatif', $data_catatan);
			return $id_data_catatan_perioperatift; // Kembalikan ID yang sama
		} else {          
			// Masukkan data baru
			$this->db->insert('sm_data_catatan_perioperatif', $data_catatan);
			return $this->db->insert_id(); // Mengembalikan ID yang dimasukkan
		}
	}

	// CKP BARU
	function updateCatatanKeperawatanPerioperatif($catatanKeperawatanPerioperatif, $id_pendaftaran, $id_data_catatan_perioperatift) {
		// var_dump($catatanKeperawatanPerioperatif);die;
		$datetime = date('Y-m-d H:i:s');			
		if ($id_data_catatan_perioperatift) {
			// Ambil data yang ada di tabel sm_catatan_keperawatan_perioperatif sebelum update
			$this->db->where('id_data_catatan_perioperatift', $id_data_catatan_perioperatift);
			$query = $this->db->get('sm_catatan_keperawatan_perioperatif');
			$dataLog = $query->row_array();
			
			// Tambahkan kolom updated_at ke data log
			$dataLog['updated_at'] = $datetime;
			
			// Simpan data ke tabel sm_catatan_keperawatan_perioperatif_logs
			$this->db->insert('sm_catatan_keperawatan_perioperatif_logs', $dataLog);
			
			// Cek apakah insert berhasil
			if ($this->db->affected_rows() > 0) {
				// Perbarui data di tabel sm_catatan_keperawatan_perioperatif
				$this->db->where('id_data_catatan_perioperatift', $id_data_catatan_perioperatift);
				$this->db->update('sm_catatan_keperawatan_perioperatif', $catatanKeperawatanPerioperatif);
				
				// Cek apakah update berhasil
				if ($this->db->affected_rows() > 0) {
					// Perbarui kolom 'updated_at' di tabel 'sm_data_catatan_perioperatif'
					$this->db->where('id', $id_data_catatan_perioperatift)
						->update('sm_data_catatan_perioperatif', ['updated_at' => $datetime]);
					
					return ['status' => true, 'message' => 'Berhasil memperbarui data!'];
				} else {
					return ['status' => false, 'message' => 'Gagal memperbarui data!'];
				}
			} else {
				return ['status' => false, 'message' => 'Gagal menambahkan log!'];
			}
		} else {
			// Tambahkan data baru jika ID tidak ada
			$catatanKeperawatanPerioperatif['created_date'] = $datetime;
			$this->db->insert('sm_catatan_keperawatan_perioperatif', $catatanKeperawatanPerioperatif);
			
			return ['status' => true, 'message' => 'Berhasil menambahkan data!'];
		}
	}
	
	// CKP BARU
	function deleteCatatanPerioperatif($id){
		// Hapus dari tabel sm_catatan_keperawatan_perioperatif
		$this->db->where("id_data_catatan_perioperatift", $id);
		$this->db->delete("sm_catatan_keperawatan_perioperatif"); 

		// Hapus dari tabel sm_catatan_keperawatan_perioperatif_logs
		$this->db->where("id_data_catatan_perioperatift", $id);
		$this->db->delete("sm_catatan_keperawatan_perioperatif_logs");
	
		// Hapus dari tabel sm_data_catatan_perioperatif
		$this->db->where("id", $id);
		$this->db->delete("sm_data_catatan_perioperatif");

		// Mengembalikan nilai untuk menandakan berhasil atau gagalnya operasi hapus.
		return $this->db->affected_rows() > 0;
	}





	
	// FODTI 1
	function insertFormulirObservasiIGD($data){
		foreach ($data['date_created'] as $key => $value) {

			$tgl_1_fodti = str_replace('/', '-', $data['tanggal_1_fodti'][$key]);
			$tgl_1_fodti = date("Y-m-d", strtotime($tgl_1_fodti));
			
			$tgl_2_fodti = str_replace('/', '-', $data['tanggal_2_fodti'][$key]);
			$tgl_2_fodti = date("Y-m-d", strtotime($tgl_2_fodti));

			$data_terapi = array(
				'id_pendaftaran'        => $data['id_pendaftaran'],
				'id_layanan_pendaftaran'=> $data['id_layanan_pendaftaran'],
				'id_user'               => $data['id_user'][$key],	
				'tanggal_1_fodti'       => $tgl_1_fodti,
				'tanggal_2_fodti'       => $tgl_2_fodti,
				'jam_1_fodti'  			=> $data['jam_1_fodti'][$key] !== '' ? $data['jam_1_fodti'][$key] : null,             
				'bismilah_fodti'  		=> $data['bismilah_fodti'][$key] !== '' ? $data['bismilah_fodti'][$key] : null,             
				'td_s_fodti'  			=> $data['td_s_fodti'][$key] !== '' ? $data['td_s_fodti'][$key] : null,             
				'td_d_fodti'  			=> $data['td_d_fodti'][$key] !== '' ? $data['td_d_fodti'][$key] : null,             
				'nadi_fodti'  			=> $data['nadi_fodti'][$key] !== '' ? $data['nadi_fodti'][$key] : null,             
				'rr_fodti'  			=> $data['rr_fodti'][$key] !== '' ? $data['rr_fodti'][$key] : null,             
				'suhu_fodti'  			=> $data['suhu_fodti'][$key] !== '' ? $data['suhu_fodti'][$key] : null,             
				'sat_o2_fodti'  		=> $data['sat_o2_fodti'][$key] !== '' ? $data['sat_o2_fodti'][$key] : null,             
				'kategori_fodti'  		=> $data['kategori_fodti'][$key] !== '' ? $data['kategori_fodti'][$key] : null,             
				'skala_fodti'  			=> $data['skala_fodti'][$key] !== '' ? $data['skala_fodti'][$key] : null,             
				'resiko_fodti'  		=> $data['resiko_fodti'][$key] !== '' ? $data['resiko_fodti'][$key] : null,             
				'kesadaran_fodti'  		=> $data['kesadaran_fodti'][$key] !== '' ? $data['kesadaran_fodti'][$key] : null,             
				'gcs_e_fodti'  			=> $data['gcs_e_fodti'][$key] !== '' ? $data['gcs_e_fodti'][$key] : null,             
				'gcs_m_fodti'  			=> $data['gcs_m_fodti'][$key] !== '' ? $data['gcs_m_fodti'][$key] : null,             
				'gcs_v_fodti'  			=> $data['gcs_v_fodti'][$key] !== '' ? $data['gcs_v_fodti'][$key] : null,             
				'total_gcs_fodti'  		=> $data['total_gcs_fodti'][$key] !== '' ? $data['total_gcs_fodti'][$key] : null,             
				'pupil_kanan_fodti' 	=> $data['pupil_kanan_fodti'][$key] !== '' ? $data['pupil_kanan_fodti'][$key] : null,             
				'pupil_kiri_fodti'  	=> $data['pupil_kiri_fodti'][$key] !== '' ? $data['pupil_kiri_fodti'][$key] : null,             
				'pemeriksaan_fodti' 	=> $data['pemeriksaan_fodti'][$key] !== '' ? $data['pemeriksaan_fodti'][$key] : null,             
				'jam_2_fodti'  			=> $data['jam_2_fodti'][$key] !== '' ? $data['jam_2_fodti'][$key] : null,             
				'implementasi_fodti'  	=> $data['implementasi_fodti'][$key] !== '' ? $data['implementasi_fodti'][$key] : null,             
				'alhamdulilah_fodti'  	=> $data['alhamdulilah_fodti'][$key] !== '' ? $data['alhamdulilah_fodti'][$key] : null,             
				'ttd_fodti'  			=> $data['ttd_fodti'][$key] !== '' ? $data['ttd_fodti'][$key] : null,             
				'perawat_fodti'  		=> $data['perawat_fodti'][$key] !== '' ? $data['perawat_fodti'][$key] : null,
				'created_at'       		=> $value,
			);
			$this->db->insert('sm_formulir_observasi_igd', $data_terapi);
			// var_dump($data_terapi);die;
		}
	}

	// FODTI 2
	function editFormulirObservasiIGD($data){
		return $this->db->where('id', $data['id'], true)->update('sm_formulir_observasi_igd', $data);
	}

	// FODTI 3
	function deleteFormulirObservasiIGD($id){
		return $this->db->where("id", $id)->delete("sm_formulir_observasi_igd");
	}

	// FODTI 4
	function getFormulirObservasiIGD($id_pendaftaran) {
		return $this->db->select("fodti.*, 	
						COALESCE(spg.nama, '') as perawat,
						COALESCE(wid.nama, '') as akun_user ")
		->from('sm_formulir_observasi_igd as fodti')
		->join('sm_layanan_pendaftaran as lp', 'fodti.id_layanan_pendaftaran = lp.id')
		->join('sm_tenaga_medis as tmp', 'fodti.perawat_fodti = tmp.id', 'left')
		->join('sm_pegawai as spg', 'spg.id = tmp.id_pegawai', 'left')
		->join('sm_translucent as sid', 'fodti.id_user = sid.id', 'left')
		->join('sm_pegawai as wid', 'fodti.id_user = wid.id', 'left')
		->where('lp.id_pendaftaran', $id_pendaftaran)
		->order_by('fodti.tanggal_1_fodti', 'asc')
		->get()
		->result();
	}
	
	// FODTI 5
	function getFormulirObservasiIGDByID($id) {
		return $this->db->select("fodti.*, 	
						COALESCE(spg.nama, '') as perawat,
						COALESCE(wid.nama, '') as akun_user ")
		->from('sm_formulir_observasi_igd as fodti')
		->join('sm_tenaga_medis as tmp', 'fodti.perawat_fodti = tmp.id', 'left')
		->join('sm_pegawai as spg', 'spg.id = tmp.id_pegawai', 'left')
		->join('sm_translucent as sid', 'fodti.id_user = sid.id', 'left')
		->join('sm_pegawai as wid', 'fodti.id_user = wid.id', 'left')
		->where('fodti.id', $id)
		->order_by('fodti.tanggal_1_fodti', 'asc')
		->get()
		->row();
	}

	// AAAS_BARU
	function updateAssesmenAwalAnestesiSedasi($data_aaas){
		$this->db->trans_begin();
		$data_aaas['created_date'] = $this->datetime;
		if ($data_aaas['id_aaasB'] !== '') {
			$id_aaasB = $data_aaas['id_aaasB'];
			$data_before_aaasB = $this->db->get_where('sm_assesmen_awal_anestesi_sedassi', ['id' => $id_aaasB])->row();
			unset($data_aaas['id_aaasB']);
			unset($data_before_aaasB->id);
			$data_aaas['updated_date'] = date('Y-m-d H:i:s');
			$this->db->insert('sm_assesmen_awal_anestesi_sedassi_logs', $data_before_aaasB);
			$this->db->where('id', $id_aaasB)->update('sm_assesmen_awal_anestesi_sedassi', $data_aaas);
			$message = 'mengupdate Assesmen Awal Anestesi Sedasi';
		} else {
			unset($data_aaas['id_aaasB']);
			$this->db->insert('sm_assesmen_awal_anestesi_sedassi', $data_aaas);
			$message = 'menambah Assesmen Awal Anestesi Sedasi';
		}
		if ($this->db->trans_status() === false) :
			$this->db->trans_rollback();
			$status = false;
			$message = "Gagal " . $message;
		else :
			$this->db->trans_commit();
			$status = true;
			$message = "Berhasil " . $message;
		endif;
		return array('status' => $status, 'message' => $message);
	}

	// AAAS_BARU
	function getAssesmenAwalAnestesiSedasi($id_pendaftaran){
		return $this->db->select('aaas.*, pgp1.nama as nama_perawat_1, 
										pgp2.nama as nama_perawat_2, 
										pgu.nama as user')
		->from('sm_assesmen_awal_anestesi_sedassi as aaas')
		->join('sm_tenaga_medis as tmp1 ', ' tmp1.id = aaas.aaas_perawat', 'left')
		->join('sm_tenaga_medis as tmp2 ', ' tmp2.id = aaas.aaas_pemeriksa_asesmen_anestesi', 'left')
		->join('sm_pegawai as pgp1 ', ' pgp1.id = tmp1.id_pegawai', 'left')
		->join('sm_pegawai as pgp2 ', ' pgp2.id = tmp2.id_pegawai', 'left')
		->join('sm_translucent as tr', 'tr.id = aaas.id_users', 'left')
		->join('sm_pegawai as pgu', 'pgu.id = tr.id', 'left')
		->where('aaas.id_pendaftaran', $id_pendaftaran, true)
		->get()
		->row();
	}

	// PADOKB
	function updatePemakaianAlkesDanObatKamarBedah($data_padokb){
		$this->db->trans_begin();
		$data_padokb['created_date'] = $this->datetime;
		if ($data_padokb['id_padokb'] !== '') {
			$id_padokb = $data_padokb['id_padokb'];
			$data_before_padokb = $this->db->get_where('sm_pemakaian_alkes_obat_kamar_bedah', ['id' => $id_padokb])->row();
			unset($data_padokb['id_padokb']);
			unset($data_before_padokb->id);
			$data_padokb['updated_date'] = date('Y-m-d H:i:s');
			$this->db->insert('sm_pemakaian_alkes_obat_kamar_bedah_logs', $data_before_padokb);
			$this->db->where('id', $id_padokb)->update('sm_pemakaian_alkes_obat_kamar_bedah', $data_padokb);
			$message = 'mengupdate Pemakaian Alkes Obat Kamar Bedah';
		} else {
			unset($data_padokb['id_padokb']);
			$this->db->insert('sm_pemakaian_alkes_obat_kamar_bedah', $data_padokb);
			$message = 'menambah Pemakaian Alkes Obat Kamar Bedah';
		}
		if ($this->db->trans_status() === false) :
			$this->db->trans_rollback();
			$status = false;
			$message = "Gagal " . $message;
		else :
			$this->db->trans_commit();
			$status = true;
			$message = "Berhasil " . $message;
		endif;
		return array('status' => $status, 'message' => $message);
	}

	// PADOKB
	function getPemakaianAlkesDanObatKamarBedah($id_pendaftaran) {
		return $this->db->select('padokb.*, 
									pgd1.nama as nama_dokter_operator, 
									pgd2.nama as nama_dokter_anestesi, 							
									pgu.nama as user')
		->from('sm_pemakaian_alkes_obat_kamar_bedah as padokb')
		->join('sm_tenaga_medis as tmd1', 'tmd1.id = padokb.dokter_op_padokb', 'left')
		->join('sm_tenaga_medis as tmd2', 'tmd2.id = padokb.dokter_an_padokb', 'left')
		->join('sm_pegawai as pgd1', 'pgd1.id = tmd1.id_pegawai', 'left')
		->join('sm_pegawai as pgd2', 'pgd2.id = tmd2.id_pegawai', 'left')
		->join('sm_translucent as tr', 'tr.id = padokb.id_users', 'left')
		->join('sm_pegawai as pgu', 'pgu.id = tr.id', 'left')
		->where('padokb.id_pendaftaran', $id_pendaftaran, true)
		->get()
		->row();
	}

	// PADOKB NARIK DATA
	function getTindakanOP($id_layanan_pendaftaran) {
		return $this->db->select('l.nama as tindakan_padokb, lp.id')
		->from('sm_layanan_pendaftaran as lp')
		->join('sm_jadwal_kamar_operasi as jko', 'jko.id_layanan_pendaftaran = lp.id', 'left')
		->join('sm_tarif_pelayanan as tp', 'jko.id_tarif = tp.id', 'left')
		->join('sm_layanan as l', 'l.id = tp.id_layanan', 'left')
		->where('lp.id', $id_layanan_pendaftaran, true)
		->get()
		->row();
	}

	// PADOA
	function updatePemakaianAlkesDanObatAnestesi($data_padoa){
		$this->db->trans_begin();
		$data_padoa['created_date'] = $this->datetime;
		if ($data_padoa['id_padoa'] !== '') {
			$id_padoa = $data_padoa['id_padoa'];
			$data_before_padoa = $this->db->get_where('sm_pemakaian_alkes_obat_anestesi', ['id' => $id_padoa])->row();
			unset($data_padoa['id_padoa']);
			unset($data_before_padoa->id);
			$data_padoa['updated_date'] = date('Y-m-d H:i:s');
			$this->db->insert('sm_pemakaian_alkes_obat_anestesi_logs', $data_before_padoa);
			$this->db->where('id', $id_padoa)->update('sm_pemakaian_alkes_obat_anestesi', $data_padoa);
			$message = 'mengupdate Pemakaian Alkes Obat Anastesi';
		} else {
			unset($data_padoa['id_padoa']);
			$this->db->insert('sm_pemakaian_alkes_obat_anestesi', $data_padoa);
			$message = 'menambah Pemakaian Alkes Obat Anastesi';
		}
		if ($this->db->trans_status() === false) :
			$this->db->trans_rollback();
			$status = false;
			$message = "Gagal " . $message;
		else :
			$this->db->trans_commit();
			$status = true;
			$message = "Berhasil " . $message;
		endif;
		return array('status' => $status, 'message' => $message);
	}

	// PADOA
	function getPemakaianAlkesDanObatAnestesi($id_pendaftaran){
		return $this->db->select('padoa.*, pgd1.nama as nama_dokter_operator, 
											pgd2.nama as nama_dokter_anestesi, 
											pgu.nama as user')
		->from('sm_pemakaian_alkes_obat_anestesi as padoa')

		->join('sm_tenaga_medis as tmd1 ', ' tmd1.id = padoa.dokter_op_padoa', 'left')
		->join('sm_tenaga_medis as tmd2 ', ' tmd2.id = padoa.dokter_an_padoa', 'left')
		->join('sm_pegawai as pgd1 ', ' pgd1.id = tmd1.id_pegawai', 'left')
		->join('sm_pegawai as pgd2 ', ' pgd2.id = tmd2.id_pegawai', 'left')

		->join('sm_translucent as tr', 'tr.id = padoa.id_users', 'left')
		->join('sm_pegawai as pgu', 'pgu.id = tr.id', 'left')
		->where('padoa.id_pendaftaran', $id_pendaftaran, true)
		->get()
		->row();
	}

	// PADOA NARIK DATA
	function getTindakanOPT($id_layanan_pendaftaran) {
		return $this->db->select('l.nama as tindakan_padoa, lp.id')
		->from('sm_layanan_pendaftaran as lp')
		->join('sm_jadwal_kamar_operasi as jko', 'jko.id_layanan_pendaftaran = lp.id', 'left')
		->join('sm_tarif_pelayanan as tp', 'jko.id_tarif = tp.id', 'left')
		->join('sm_layanan as l', 'l.id = tp.id_layanan', 'left')
		->where('lp.id', $id_layanan_pendaftaran, true)
		->get()
		->row();
	}


	// RH
	function getRehabilitasMedik($id_pendaftaran){
		$sql = "select grm.*, pt.nama as nama_user, p.nama as nama_dokter_rh
				from sm_rehabilitas_medik grm				
				join sm_layanan_pendaftaran lp ON grm.id_layanan_pendaftaran = lp.id
				join sm_tenaga_medis tm ON grm.dokter_rehabilitas = tm.id
				join sm_pegawai p ON tm.id_pegawai = p.id
				join sm_translucent as st on st.id = grm.id_users
				join sm_pegawai as pt on pt.id = st.id
				where lp.id_pendaftaran = '" . $id_pendaftaran . "'
				order by grm.tanggal_rehabilitas asc";
		return $this->db->query($sql)->result();
	}

	// RH
	function getRehabilitasMedikByID($id_medik){
		$sql = "select grm.*, pa.nama as nama_pasien, pd.no_register, pa.telp, p.nama as nama_dokter, p.tanda_tangan, tm.no_sip, pt.nama as nama_user
				from sm_rehabilitas_medik grm				
				join sm_layanan_pendaftaran lp ON grm.id_layanan_pendaftaran = lp.id
				join sm_pendaftaran pd ON lp.id_pendaftaran = pd.id
				join sm_pasien pa ON pd.id_pasien = pa.id
				left join sm_tenaga_medis tm ON grm.dokter_rehabilitas = tm.id
				left join sm_pegawai p ON tm.id_pegawai = p.id		
				left join sm_translucent as st on st.id = grm.id_users
				left join sm_pegawai as pt on pt.id = st.id
				where grm.id = '" . $id_medik . "'";
		return $this->db->query($sql)->row();
	}

	// RH LOG
	function getRehabilitasMedikLogs($id_pendaftaran) { 
		$this->db->where('id_pendaftaran', $id_pendaftaran); 
		$this->db->order_by('created_date', 'desc');
		return $this->db->get('sm_rehabilitas_medik_logs')->result();
	}

	// RH
	function getDataRehabilitasDiagnosa($id_pendaftaran){
		$sql = "
			SELECT
				lp.id,
				sd.prioritas,
				sd.golongan_sebab_sakit_lain,
				sg.nama AS nama_sebab_sakit
			FROM sm_layanan_pendaftaran AS lp
			JOIN sm_pendaftaran AS pd ON pd.ID = lp.id_pendaftaran
			LEFT JOIN sm_diagnosa AS sd ON sd.id_layanan_pendaftaran = lp.ID 
			LEFT JOIN sm_golongan_sebab_sakit AS sg ON sg.ID = sd.id_golongan_sebab_sakit
			WHERE pd.id = '". $id_pendaftaran ."'
			ORDER BY 
				CASE 
					WHEN sd.prioritas = 'Utama' THEN 1
					ELSE 2
				END
		";
		return $this->db->query($sql)->result();
	}

	// RH
	function getDataRehabilitasAnamnesa($id_pendaftaran){
		$sql ="
				SELECT
				lp.tanggal_layanan AS tanggal,
				sa.keluhan_utama,
				sa.riwayat_penyakit_sekarang,
				sa.riwayat_penyakit_dahulu,
				sa.riwayat_penyakit_keluarga,
				sa.anamnesa_sosial,
				sa.keadaan_umum,
				sa.kesadaran,
				sa.gcs,
				sa.rr,
				sa.tensi_sistolik,
				sa.tensi_diastolik,
				sa.suhu,
				sa.nadi,
				sa.nps,
				sa.tinggi_badan,
				sa.berat_badan,
				sa.pemeriksaan_penunjang,
				sa.keadaan_umum
			FROM
				sm_layanan_pendaftaran AS lp
				JOIN sm_pendaftaran AS pd ON pd.ID = lp.id_pendaftaran
				LEFT JOIN sm_anamnesa AS sa ON sa.id_layanan_pendaftaran = lp.ID 
			WHERE pd.id ='". $id_pendaftaran ."'
			ORDER BY
				lp.tanggal_layanan DESC;		
		";
		return $this->db->query($sql)->row();
	}

	// RH jangan di hapus ini menampilkan lebih dari 1 data tindakan
	function getDataRehabilitasTindakan($id_pendaftaran) {
		$sql = "
			SELECT
				lp.tanggal_layanan AS tanggal,
				sl.nama AS nama_layanan,
				tp.jenis,
				sk.nama AS nama_kelas
			FROM sm_layanan_pendaftaran AS lp
			JOIN sm_pendaftaran AS pd ON pd.ID = lp.id_pendaftaran
			LEFT JOIN sm_tarif_tindakan_pasien AS ttp ON ttp.id_layanan_pendaftaran = lp.ID
			LEFT JOIN sm_tarif_pelayanan AS tp ON ttp.id_tarif_pelayanan = tp.ID
			LEFT JOIN sm_kelas AS sk ON tp.id_kelas = sk.ID
			LEFT JOIN sm_layanan AS sl ON tp.id_layanan = sl.ID
			WHERE pd.ID = " . $this->db->escape($id_pendaftaran) . "
			ORDER BY lp.tanggal_layanan DESC;
		";
		return $this->db->query($sql)->result(); // Mengambil semua data, bukan hanya satu baris
	}


	// CPKJI
	function updateCatatanPerhitunganKasaJarumInstrumen($catatanPerhitunganKasaJarumInstrumen){
		$this->db->trans_begin();
		$catatanPerhitunganKasaJarumInstrumen['created_date'] = $this->datetime;
		if ($catatanPerhitunganKasaJarumInstrumen['id_cpkji'] !== '') {
			$id_cpkji = $catatanPerhitunganKasaJarumInstrumen['id_cpkji'];
			$data_before_cpkji = $this->db->get_where('sm_catatan_perhitungan_kasa_jarum_instrumen', ['id' => $id_cpkji])->row();
			unset($catatanPerhitunganKasaJarumInstrumen['id_cpkji']);
			unset($data_before_cpkji->id);
			$catatanPerhitunganKasaJarumInstrumen['updated_date'] = date('Y-m-d H:i:s');
			$this->db->insert('sm_catatan_perhitungan_kasa_jarum_instrumen_logs', $data_before_cpkji);
			$this->db->where('id', $id_cpkji)->update('sm_catatan_perhitungan_kasa_jarum_instrumen', $catatanPerhitunganKasaJarumInstrumen);
			$message = 'mengupdate Catatan Perhitungan Kasa Jarum Instrumen';
		} else {
			unset($catatanPerhitunganKasaJarumInstrumen['id_cpkji']);
			$this->db->insert('sm_catatan_perhitungan_kasa_jarum_instrumen', $catatanPerhitunganKasaJarumInstrumen);
			$message = 'menambah Catatan Perhitungan Kasa Jarum Instrumen';
		}
		if ($this->db->trans_status() === false) :
			$this->db->trans_rollback();
			$status = false;
			$message = "Gagal " . $message;
		else :
			$this->db->trans_commit();
			$status = true;
			$message = "Berhasil " . $message;
		endif;
		return array('status' => $status, 'message' => $message);
	}

	// CPKJI
	function getCatatanPerhitunganKasaJarumInstrumen($id_pendaftaran){
		return $this->db->select('cpkji.*,  pgp1.nama as nama_perawat_1, 
											pgp2.nama as nama_perawat_2, 
											pgp3.nama as nama_perawat_3,
											pgd1.nama as nama_dokter_1, 
											pgu.nama as user')
			->from('sm_catatan_perhitungan_kasa_jarum_instrumen as cpkji')
			->join('sm_tenaga_medis as tmp1 ', ' tmp1.id = cpkji.peerawat_1', 'left')
			->join('sm_tenaga_medis as tmp2 ', ' tmp2.id = cpkji.peerawat_2', 'left')
			->join('sm_tenaga_medis as tmp3 ', ' tmp3.id = cpkji.peerawat_3', 'left')
			->join('sm_pegawai as pgp1 ', ' pgp1.id = tmp1.id_pegawai', 'left')
			->join('sm_pegawai as pgp2 ', ' pgp2.id = tmp2.id_pegawai', 'left')
			->join('sm_pegawai as pgp3 ', ' pgp3.id = tmp3.id_pegawai', 'left')
			->join('sm_tenaga_medis as tmd1 ', ' tmd1.id = cpkji.dokterr_1', 'left')
			->join('sm_pegawai as pgd1 ', ' pgd1.id = tmd1.id_pegawai', 'left')
			->join('sm_translucent as tr', 'tr.id = cpkji.id_users', 'left')
			->join('sm_pegawai as pgu', 'pgu.id = tr.id', 'left')
			->where('cpkji.id_pendaftaran', $id_pendaftaran, true)
			->get()
			->row();
	}





}
