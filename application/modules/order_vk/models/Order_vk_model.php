<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Order_vk_model extends CI_Model
{


	public function __construct()
	{
		parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
		$this->datetime = date('Y-m-d H:i:s');
		$this->user = $this->session->userdata('id_translucent');
		$this->unit = $this->session->userdata('id_unit');
	}

	private function sqlOrderVK($search)
	{
		$this->db->select("DISTINCT ON (jko.id) 
			jko.*, lp.jenis_layanan,
			p.kelamin, p.tanggal_lahir, p.nama as nama_pasien, lp.id_pendaftaran
		");
		$this->db->from('sm_jadwal_kamar_operasi as jko');
		$this->db->join('sm_layanan_pendaftaran as lp', 'lp.id = jko.id_layanan_pendaftaran', 'left');
		$this->db->join('sm_pasien as p', 'p.id = jko.id_pasien', 'left');
		$this->db->where('jko.layanan', 'VK', true);

		if (($search['tanggal_awal'] !== '') && ($search['tanggal_akhir'] !== '')) :
			$this->db->where("jko.waktu BETWEEN '" . date2mysql($search['tanggal_awal']) . " 00:00:00' AND '" . date2mysql($search['tanggal_akhir']) . " 23:59:59'");
		endif;
		if (isset($search['status']) && $search['status'] !== '') :
			$this->db->where('jko.status', $search['status'], true);
		endif;
		if (isset($search['pasien']) && $search['pasien'] !== '') :
			$this->db->where('p.id', $search['pasien'], true);
		endif;

		$this->db->order_by('jko.id', 'desc');
		return $this->db->order_by('jko.waktu', 'desc');
	}

	private function _listOrderVK($limit, $start, $search)
	{
		$this->sqlOrderVK($search);
		if ($limit !== 0) :
			$this->db->limit($limit, $start);
		endif;
		$result = $this->db->get()->result();
		return $result;
	}

	function getListDataOrderVK($limit = 0, $start = 0, $search)
	{
		$result['data'] = $this->_listOrderVK($limit, $start, $search);
		$result['jumlah'] = $this->sqlOrderVK($search)->get()->num_rows();
		return $result;
		$this->db->close();
	}

	function simpanPelayananVK()
	{
		$this->db->trans_begin();
		$this->load->model('pelayanan/Pelayanan_model', 'm_pelayanan');
		$id_pendaftaran = safe_post('id_pendaftaran');
		$id_jadwal_vk = safe_post('id_jadwal_vk');
		$id_layanan_pendaftaran = safe_post('id_layanan_pendaftaran');
		// $diag_pra = safe_post('diagpra');
		// $diag_pasca = safe_post('diagpasca');
		$dokter_bedah = safe_post('dokter_bedah');
		$dokter_anesthesi = safe_post('dokter_anesthesi');
		// $dokter_pendamping = safe_post('dokter_pendamping');
		$asisten_operator = safe_post('asisten_operator');
		$sirkuler = safe_post('sirkuler');
		$instrumental = safe_post('instrumental');
		$perawat = safe_post('perawat');
		$id_user = $this->session->userdata('id_translucent');
		$id_unit = $this->session->userdata('id_unit');
		// $id_tarif = safe_post('tarif_vk');
		// $id_tarif_asli = safe_post('id_tarif_vk_asli');
		$operator = safe_post('id_operator');
		$tindakan = safe_post('id_tindakan');
		$tindakan_icd9 = safe_post('id_tindakan_icd9');
		$id_vk = safe_post('id_vk');
		$total = 0;
		$reimburse = 0;

		// update table sm_jadwal_kamar_operasi
		$this->db->where('id', $id_jadwal_vk, true);
		$this->db->update('sm_jadwal_kamar_operasi', [
			'id_layanan_pendaftaran' => $id_layanan_pendaftaran,
			// 'id_tarif' => $id_tarif,
			'status' => 'Confirmed',
			'diperiksa' => 'Sudah',
		]);
		if ($this->db->trans_status() === false) :
			$this->db->trans_rollback();
			$response['status']	= false;
		endif;

		// get data tarif
		// if ($id_tarif === $id_tarif_asli) :
		// 	$sql_tarif = "SELECT tp.*, pj.id as id_penjamin, 
		// 			COALESCE(pj.diskon, 0) as reimburse, lp.no_polish
		// 			FROM sm_jadwal_kamar_operasi as jko 
		// 			JOIN sm_tarif_pelayanan as tp ON (tp.id = jko.id_tarif) 
		// 			LEFT JOIN sm_layanan_pendaftaran as lp ON (lp.id = jko.id_layanan_pendaftaran) 
		// 			LEFT JOIN sm_penjamin as pj ON (pj.id = lp.id_penjamin) 
		// 			WHERE jko.id = '".$id_jadwal_vk."'";
		// 	$tarif = $this->db->query($sql_tarif)->row();
		// else :
		// 	$tarif = $this->db->where('id', $id_tarif)->get('sm_tarif_pelayanan')->row();
		// endif;
		// get data layanan pendaftaran
		// $data_lp = $this->db->query("SELECT lp.id_penjamin, lp.cara_bayar, 
		// 			lp.no_polish, COALESCE(pj.diskon, 0) as reimburse
		// 			FROM sm_layanan_pendaftaran as lp
		// 			LEFT JOIN sm_penjamin as pj ON (pj.id = lp.id_penjamin) 
		// 			WHERE lp.id = '".$id_layanan_pendaftaran."'
		// ")->row();
		// $reimburse_operasi = $data_lp->reimburse / 100 * $tarif->total;

		// query data BHP
		// $sql_bhp = "SELECT b.*, (b.hpp + (b.hpp * (b.margin_non_resep / 100))) * (kb.isi * kb.isi_satuan * tb.jumlah) as harga_jual 
		// 	FROM sm_tarif_bhp as tb
		// 	JOIN sm_kemasan_barang as kb ON (kb.id = tb.id_kemasan_barang) 
		// 	JOIN sm_barang as b ON (b.id = kb.id_barang) 
		// 	WHERE tb.id_tarif = '".$tarif->id."'";
		// $data_bhp = $this->db->query($sql_bhp);
		// $list_bhp = $this->getTotalBHPHarga($tarif->id);
		// // not use
		// if (0 < $data_bhp->num_rows()) :
		// 	$this->db->insert('sm_penjualan', array(
		// 		'waktu' => $this->datetime,
		// 		'id_layanan_pendaftaran' => $id_layanan_pendaftaran,
		// 		'total' => $list_bhp->harga_jual,
		// 		'jenis' => 'BHP',
		// 		'id_unit' => $id_unit,
		// 		'id_users' => $id_user,
		// 	));
		// 	$id_penjualan = $this->db->insert_id();
		// 	if ($this->db->trans_status() === false) :
		// 		$this->db->trans_rollback();
		// 		$response['status'] = false;
		// 	endif;
		// 	foreach ($data_bhp->result() as $data) :
		// 		$this->db->insert('sm_detail_penjualan', array(
		// 			'id_penjualan' => $id_penjualan,
		// 			'id_kemasan' => $data->id_kemasan_barang,
		// 			'qty' => $data->jumlah,
		// 			'hna' => $data->hna * $data->isi * $data->isi_satuan * $data->jumlah,
		// 			'hpp' => $data->hpp * $data->isi * $data->isi_satuan * $data->jumlah,
		// 			'harga_jual' => $data->harga_jual,
		// 		));
		// 		if ($this->db->trans_status() === false) :
		// 			$this->db->trans_rollback();
		// 			$response['status'] = false;
		// 		endif;
		// 	endforeach;
		// endif;
		// // end not use

		// // area diagnosis operasi
		// $this->db->delete('sm_diagnosa_operasi', array('id_jadwal_operasi' => $id_jadwal_vk));
		// if ($this->db->trans_status() === false) :
		// 	$this->db->trans_rollback();
		// 	$response['status'] = false;
		// endif;
		$this->db->delete('sm_tim_vk', array('id_jadwal_operasi' => $id_jadwal_vk));
		if ($this->db->trans_status() === false) :
			$this->db->trans_rollback();
			$response['status'] = false;
		endif;
		// if ($diag_pra) :
		// 	foreach ($diag_pra as $data_pra) :
		// 		if ($data_pra !== "") :
		// 			$this->db->insert('sm_diagnosa_operasi', array(
		// 				'id_jadwal_operasi' => $id_jadwal_vk,
		// 				'id_golongan_sebab_sakit_pra' => $data_pra,
		// 			));
		// 			if ($this->db->trans_status() === false) :
		// 				$this->db->trans_rollback();
		// 				$response['status'] = false;
		// 			endif;
		// 		endif;
		// 	endforeach;
		// endif;
		// if ($diag_pasca) :
		// 	foreach ($diag_pasca as $data_pasca) :
		// 		if ($data_pasca !== "") :
		// 			$this->db->insert('sm_diagnosa_operasi', array(
		// 				'id_jadwal_operasi' => $id_jadwal_vk,
		// 				'id_golongan_sebab_sakit_pasca' => $data_pasca,
		// 			));
		// 			if ($this->db->trans_status() === false) :
		// 				$this->db->trans_rollback();
		// 				$response['status'] = false;
		// 			endif;
		// 		endif;
		// 	endforeach;
		// endif;
		// // end diagnosis operasi

		// area tenaga kesehatan operasi
		if ($dokter_bedah) :
			$this->simpanDataTenagaKesehatanVK($dokter_bedah, $id_jadwal_vk, 'Dokter Operator');
		endif;
		if ($dokter_anesthesi) :
			$this->simpanDataTenagaKesehatanVK($dokter_anesthesi, $id_jadwal_vk, 'Dokter Anesthesi');
		endif;
		// if ($dokter_pendamping) :
		// 	$this->simpanDataTenagaKesehatanVK($dokter_pendamping, $id_jadwal_vk, $tarif->jasa_para_no_medis, 'Dokter Pendamping');
		// endif;
		if ($asisten_operator) :
			$this->simpanDataTenagaKesehatanVK($asisten_operator, $id_jadwal_vk, 'Asisten Operator');
		endif;
		if ($perawat) :
			$this->simpanDataTenagaKesehatanVK($perawat, $id_jadwal_vk, 'Perawat Anesthesi');
		endif;
		if ($instrumental) :
			$this->simpanDataTenagaKesehatanVK($instrumental, $id_jadwal_vk, 'Instrumental');
		endif;
		if ($sirkuler) :
			$this->simpanDataTenagaKesehatanVK($sirkuler, $id_jadwal_vk, 'Sirkuler');
		endif;
		// end area tenaga kesehatan operasi

		// $check_tarif_operasi = $this->db->get_where('sm_tarif_operasi', ['id_operasi' => $id_jadwal_vk])->num_rows();
		// $data_tarif_operasi = array(
		// 	'waktu' => $this->datetime,
		// 	'id_operasi' => $id_jadwal_vk,
		// 	'id_tarif' => $tarif->id,
		// 	'id_penjamin' => $data_lp->id_penjamin !== NULL ? $data_lp->id_penjamin : NULL,
		// 	'no_polish' => isset($data_lp->no_polish) ? $data_lp->no_polish : '',
		// 	'jasa_nadis' => $tarif->jasa_nadis,
		// 	'jasa_klinik' => $tarif->jasa_klinik,
		// 	'bobot' => $tarif->bobot,
		// 	'bhp' => isset($list_bhp->harga_jual) ? $list_bhp->harga_jual : 0,
		// 	'bahan_alat' => $tarif->bahan_alat,
		// 	'jasa_dokter_anesthesi' => $tarif->jasa_dokter_anasthesi,
		// 	'jasa_penata_anesthesi' => $tarif->jasa_penata_anasthesi,
		// 	'jasa_instrument' => $tarif->jasa_instrument,
		// 	'jasa_para_no_medis' => $tarif->jasa_para_no_medis,
		// 	'total' => $tarif->total,
		// 	'reimburse' => $reimburse_operasi,
		// 	'is_operasi' => 'Ya'
		// );
		// if ($check_tarif_operasi === 0) :
		// 	$this->db->insert('sm_tarif_operasi', $data_tarif_operasi);
		// else :
		// 	$this->db->where(['id_operasi' => $id_jadwal_vk, 'is_operasi' => 'Ya']);
		// 	$this->db->update('sm_tarif_operasi', $data_tarif_operasi);
		// endif;
		// if ($this->db->trans_status() === false) :
		// 	$this->db->trans_rollback();
		// 	$response['status'] = false;
		// endif;

		// // ambil semua data layanan pendaftaran
		// $lp = $this->db->get_where('sm_layanan_pendaftaran', ['id' => $id_layanan_pendaftaran])->row();
		// if ($lp->jenis_layanan === 'Poliklinik') :
		// 	$jenis_transaksi = "Operasi";
		// 	$check_op = $this->db->query("SELECT id, total 
		// 					FROM sm_pembayaran 
		// 					WHERE id_operasi = '".$id_jadwal_vk."'")->row();
		// 	if (!isset($check_op->id)) :
		// 		$this->m_pelayanan->updatePembayaran($id_pendaftaran, $id_jadwal_vk, $id_layanan_pendaftaran, $jenis_transaksi, $tarif->total, $reimburse_operasi);
		// 	else :
		// 		if ($id_tarif !== $id_tarif_asli) :
		// 			$tarif_before = $this->db->query("SELECT total FROM sm_tarif_pelayanan WHERE id = '".$id_tarif_asli."'")->row();
		// 			$tarif_after = $this->db->query("SELECT total FROM sm_tarif_pelayanan WHERE id = '".$id_tarif."'")->row();
		// 			$this->m_pelayanan->deletePembayaran($id_jadwal_vk, $tarif_before->total, $reimburse_operasi, $jenis_transaksi);
		// 			$this->m_pelayanan->updatePembayaran($id_pendaftaran, $id_jadwal_vk, $id_layanan_pendaftaran, $jenis_transaksi, $tarif_after->total, $reimburse_operasi);
		// 		endif;
		// 	endif;
		// endif;
		// if ($lp->jenis_layanan === 'IGD') :
		// 	$jenis_transaksi = "IGD";
		// 	if ($check_tarif_operasi === 0) :
		// 		$this->m_pelayanan->updatePembayaran($id_pendaftaran, $id_layanan_pendaftaran, $id_layanan_pendaftaran, $jenis_transaksi, $tarif->total, $reimburse_operasi);
		// 	else :
		// 		if ($id_tarif !== $id_tarif_asli) :
		// 			$tarif_before = $this->db->query("SELECT total FROM sm_tarif_pelayanan WHERE id = '".$id_tarif_asli."'")->row();
		// 			$tarif_after = $this->db->query("SELECT total FROM sm_tarif_pelayanan WHERE id = '".$id_tarif."'")->row();
		// 			$this->m_pelayanan->deletePembayaran($id_jadwal_vk, $tarif_before->total, $reimburse_operasi, $jenis_transaksi);
		// 			$this->m_pelayanan->updatePembayaran($id_pendaftaran, $id_jadwal_vk, $id_layanan_pendaftaran, $jenis_transaksi, $tarif_after->total, $reimburse_operasi);
		// 		endif;
		// 	endif;
		// endif;
		// if ($lp->jenis_layanan === 'Rawat Inap') :
		// 	$jenis_transaksi = "Rawat Inap";
		// 	if ($check_tarif_operasi === 0) :
		// 		$this->m_pelayanan->updatePembayaran($id_pendaftaran, $id_layanan_pendaftaran, $id_layanan_pendaftaran, $jenis_transaksi, $tarif->total, $reimburse_operasi);
		// 	else :
		// 		if ($id_tarif !== $id_tarif_asli) :
		// 			$tarif_before = $this->db->query("SELECT total FROM sm_tarif_pelayanan WHERE id = '".$id_tarif_asli."'")->row();
		// 			$tarif_after = $this->db->query("SELECT total FROM sm_tarif_pelayanan WHERE id = '".$id_tarif."'")->row();
		// 			$this->m_pelayanan->deletePembayaran($id_jadwal_vk, $tarif_before->total, $reimburse_operasi, $jenis_transaksi);
		// 			$this->m_pelayanan->updatePembayaran($id_pendaftaran, $id_jadwal_vk, $id_layanan_pendaftaran, $jenis_transaksi, $tarif_after->total, $reimburse_operasi);
		// 		endif;
		// 	endif;
		// endif;
		// $total = 0;
		// $reimburse = 0;
		// $this->db->delete('sm_tarif_operasi', ['id_operasi' => $id_jadwal_vk, 'is_operasi' => 'Tidak']);
		// if ($this->db->trans_status() === false) :
		// 	$this->db->trans_rollback();
		// 	$response['status'] = false;
		// endif;

		// area tindakan operasi
		$tarif = $this->db->get_where('sm_layanan_pendaftaran', ['id' => $id_layanan_pendaftaran])->row();
		if ($tindakan) :
			if ($this->db->trans_status() === false) :
				$this->db->trans_rollback();
				$response['status'] = false;
			endif;
			foreach ($tindakan as $i => $value) :
				
				$id_icd9 = NULL;
				foreach ($tindakan_icd9 as $key => $val) :
					if($key==$i){
						$val != '' ? $id_icd9=$val : NULL;
					}					
				endforeach;
				
				$tarif_tindakan = $this->db->get_where('sm_tarif_pelayanan', ['id' => $value])->row();
				if ($id_vk[$i] === "") :
					$this->db->insert('sm_tarif_operasi', array(
						'waktu' => $this->datetime,
						'id_operasi' => $id_jadwal_vk,
						'id_nadis' => $operator[$i],
						'jasa_nadis' => $tarif_tindakan->jasa_nadis,
						'jasa_klinik' => $tarif_tindakan->jasa_klinik,
						'total' => $tarif_tindakan->total,
						'bhp' => 0,
						'id_tarif' => $tarif_tindakan->id,
						'id_penjamin' => $tarif->id_penjamin !== NULL ? $tarif->id_penjamin : NULL,
						'no_polish' => isset($tarif->no_polish) ? $tarif->no_polish : '',
						'bobot' => $tarif_tindakan->bobot,
						'reimburse' => 0,
						'is_operasi' => 'Tidak',
						'id_icd9' => $id_icd9,
						'id_users' => $this->user
					));
					$result['log'][] = array('key' => $i, 'tindakan' => $value, 'status' => true);
				else :
					$result['log'][] = array('key' => $i, 'tindakan' => $value, 'status' => false);
				endif;
				if ($this->db->trans_status() === false) :
					$this->db->trans_rollback();
					$response['status'] = false;
				endif;
				$total = $total + $tarif_tindakan->total;
			// $reimburse = $reimburse + $tarif->reimburse / 100 * $tarif_tindakan->total;
			endforeach;
		endif;
		// end area tindakan operasi

		// if ($lp->jenis_layanan === 'Poliklinik') :
		// 	$jenis_transaksi = "Operasi";
		// 	$this->m_pelayanan->updatePembayaran($id_pendaftaran, $id_jadwal_vk, $id_layanan_pendaftaran, $jenis_transaksi, $total, $reimburse_operasi);
		// endif;
		// if ($lp->jenis_layanan === 'IGD') :
		// 	$jenis_transaksi = "IGD";
		// 	$this->m_pelayanan->updatePembayaran($id_pendaftaran, $id_layanan_pendaftaran, $id_layanan_pendaftaran, $jenis_transaksi, $total, $reimburse_operasi);
		// endif;
		// if ($lp->jenis_layanan === 'Rawat Inap') :
		// 	$jenis_transaksi = "Rawat Inap";
		// 	$this->m_pelayanan->updatePembayaran($id_pendaftaran, $id_layanan_pendaftaran, $id_layanan_pendaftaran, $jenis_transaksi, $total, $reimburse_operasi);
		// endif;
		// if ($this->db->trans_status() === false) :
		// 	$this->db->trans_rollback();
		// 	$response['status'] = false;
		// endif;

		// area BHP
		// cek penjualan
		$check_penjualan = $this->db->query("SELECT id FROM sm_penjualan WHERE id_operasi = '" . $id_jadwal_vk . "'")->row();
		if (!isset($check_penjualan->id)) :
			$data_penjualan = array(
				'waktu' => $this->datetime,
				'id_operasi' => $id_jadwal_vk,
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
				'id_operasi' => $id_jadwal_vk,
				'total' => (safe_post('total') !== '' ? safe_post('total') : 0),
				'id_unit' => $id_unit,
				'id_users' => $id_user,
			);
			$this->db->where('id_operasi', $id_jadwal_vk);
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
				$barangs = $this->db->query("SELECT hna, hpp FROM sm_barang WHERE id = '" . $id_barang[$i] . "'")->row();
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
						'id_barang'    => $barangs->id,
						'ed'           => isset($val->ed) ? $val->ed : NULL,
						'keluar'       => $keluar,
						'keterangan'   => 'BHP VK' . $this->m_pelayanan->pasienName($id_layanan_pendaftaran),
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

	function simpanDataTenagaKesehatanVK($data, $id_jadwal_vk, $status)
	{
		// $jasa = $tarif / count((array)$data);
		// var_dump($data);die;
		foreach ($data as $val) :
			if ($val !== "") :
				$this->db->insert('sm_tim_vk', array(
					'id_jadwal_operasi' => $id_jadwal_vk,
					'id_nadis' => $val,
					'status' => $status,
					'id_users' => $this->session->userdata('id_translucent'),
				));
				if ($this->db->trans_status() === false) :
					$this->db->trans_rollback();
					$response['status'] = false;
				endif;
			endif;
		endforeach;
	}

	function getDataTindakanTambahanVK($id_jadwal_vk)
	{
		$this->db->select("
			tp.*, pg.nama as nadis, 
			to.id_nadis, to.id_tarif, l.nama as nama_tarif, 
			to.waktu as waktu_tindakan, to.id as id_vk,
            to.id_icd9, case when icd.icd9 <> '' THEN concat('[', icd.icd9, '] ', icd.nama )  else null end icd9,
			to.id_users, pg2.nama users
		");
		$this->db->from('sm_tarif_operasi as to');
		$this->db->join('sm_tarif_pelayanan as tp', 'tp.id = to.id_tarif');
		$this->db->join('sm_tenaga_medis as n', 'n.id = to.id_nadis');
		$this->db->join('sm_pegawai as pg', 'pg.id = n.id_pegawai');
		$this->db->join('sm_layanan as l', 'l.id = tp.id_layanan');
		$this->db->join('sm_icd_ix as icd', 'to.id_icd9 = icd.id', 'left');
		$this->db->join('sm_pegawai as pg2', 'pg2.id = to.id_users', 'left');
		$this->db->where('to.id_operasi', $id_jadwal_vk, true);
		$this->db->where('to.is_operasi', 'Tidak');
		return $this->db->get();
	}

	function getDataDiagnosisVK($id_jadwal_vk)
	{
		$this->db->select("
			do.*, gss.nama as diagnosis, gss.no_dtd, 
			gss.kode_icdx, gss.kode_icdx_rinci
		");
		$this->db->from('sm_diagnosa_operasi as do');
		$this->db->join('sm_golongan_sebab_sakit as gss', 'gss.id = do.id_golongan_sebab_sakit_pra or gss.id = do.id_golongan_sebab_sakit_pasca');
		$this->db->where('do.id_jadwal_operasi', $id_jadwal_vk, true);
		return $this->db->get();
	}

	function getDataTimVK($id_jadwal_vk)
	{
		$this->db->select("top.*, pg.nama as nadis, sp.nama as spesialisasi");
		$this->db->from('sm_tim_vk as top');
		$this->db->join('sm_tenaga_medis as tm', 'tm.id = top.id_nadis', 'left');
		$this->db->join('sm_pegawai as pg', 'pg.id = tm.id_pegawai', 'left');
		$this->db->join('sm_spesialisasi as sp', 'sp.id = tm.id_spesialisasi', 'left');
		$this->db->where('top.id_jadwal_operasi', $id_jadwal_vk, true);
		return $this->db->get();
	}

	function getdataBHPTambahanVK($id_jadwal_vk)
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
				WHERE penj.id_operasi = '" . $id_jadwal_vk . "' 
				ORDER BY id DESC";
		return $this->db->query($sql);
	}

	function deleteDetailBHPVK($id_detail, $id_operasi)
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

	function deleteTindakanVk($id_vk)
	{
		return $this->db->where("id", $id_vk)->delete("sm_tarif_operasi");
	}
}