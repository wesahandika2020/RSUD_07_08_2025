<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pembayaran_selisih_billing_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->datetime = date('Y-m-d H:i:s');
		$this->load->model('keuangan/Keuangan_ver2_model', 'm_keuangan_ver2');
	}
	function generateNoKwitansiPembayaran($id_unit_kasir)
	{
		$sql = "SELECT no_kwitansi FROM sm_history_pembayaran 
				WHERE id_unit_kasir = $id_unit_kasir 
				AND date_part('year', waktu) = " . date('Y') . "  
				AND date_part('month', waktu) = " . date('m') . " 
				AND no_kwitansi IS NOT NULL 
				ORDER BY id DESC 
				LIMIT 1 OFFSET 0";
		$data = $this->db->query($sql)->row();
		$unit_kasir = $this->db->get_where('sm_unit_kasir', ['id' => $id_unit_kasir])->row();
		$last_no = "UNIT-DATE-00000";
		if (0 < count((array)$data)) :
			$last_no = $data->no_kwitansi;
		endif;

		$ex = explode('-', $last_no);
		$no_urut = (int) $ex[2];
		$format = $unit_kasir->kode . '-' . date('d') . date('m') . date('y') . '-';
		return $format . str_pad($no_urut + 1, 5, '0', STR_PAD_LEFT);
	}

	function simpanPembayaranSelisihBilling($data)
	{
		$this->db->trans_begin();
		$id = NULL;
		$data_history_pembayaran = array(
			'id_unit_kasir' => $data['unit_kasir'],
			'no_kwitansi' => $data['no_kwitansi'],
			'jenis_transaksi' => 'Selisih Billing',
			'waktu' => $data['waktu'],
			'id_users' => $data['id_users'],
			'shift' => getShiftNow(),
			'cara_bayar' => 'Tunai',
			'nominal' => $data['total'],
			'tunai' => $data['total'],
			'non_tunai' => 0,
			'reimburse' => 0,
			'serah' => $data['serah'],
			'pembulatan' => $data['pembulatan'] - $data['total'],
			'pembayaran' => 1,
			'status' => 'Konfirm',
			'diklaim' => 1,
			'jumlah_bayar' => $data['total'],
			'id_pendaftaran' => $data['id_pendaftaran'],
			'id_layanan_pendaftaran' => $data['id_layanan_pendaftaran'],
			'id_metode_pembayaran' => $data['id_metode_pembayaran'],
		);
		$this->db->insert('sm_history_pembayaran', $data_history_pembayaran);
		$id_history_pembayaran = $this->db->insert_id();
		$data_pembayaran_selisih_billing = array(
			'waktu' => $data['waktu'],
			'id_history_pembayaran' => $id_history_pembayaran,
			'nama' => $data['nama'],
			'nominal' => $data['total'],
			'status' => 'Sudah',
			'created_at' => $this->datetime,
			'keterangan' => $data['keterangan'],
			'id_users' => $data['id_users'],
		);
		$this->db->insert('sm_pembayaran_selisih_billing', $data_pembayaran_selisih_billing);
		$id = $this->db->insert_id();
		if ($this->db->trans_status() === false) :
			$this->db->trans_rollback();
			$status = false;
			$message = 'Gagal melakukan transaksi pembayaran';
		else :
			$this->db->trans_commit();
			$status = true;
			$message = 'Berhasil melakukan transaksi pembayaran';
		endif;
		return array('status' => $status, 'message' => $message, 'id' => $id_history_pembayaran);
	}

	private function sqlPembayaranSelisihBilling($search)
	{
		$this->db->select('hp.*, psb.waktu, pd.id_pasien, p.nama, pd.no_register, p.kelamin, pj.nama as penjamin, psb.keterangan, p.tanggal_lahir, p.alamat ')
			->from('sm_pembayaran_selisih_billing psb')
			->join('sm_history_pembayaran hp', 'psb.id_history_pembayaran = hp.id')
			->join('sm_pendaftaran pd', 'hp.id_pendaftaran = pd.id')
			->join('sm_pasien p', 'pd.id_pasien = p.id')
			->join('sm_penjamin pj', 'pd.id_penjamin = pj.id');

		if (($search['tanggal_awal'] !== '') & ($search['tanggal_akhir'] !== '')) :
			$this->db->where("psb.waktu BETWEEN '" . date2mysql($search['tanggal_awal']) . " 00:00:00' AND '" . date2mysql($search['tanggal_akhir']) . " 23:59:59'");
		endif;

		if ($search['no_kwitansi'] !== '') :
			$this->db->like('hp.no_kwitansi', $search['no_kwitansi'], 'before', true);
		endif;

		if ($search['nama'] !== '') :
			$this->db->where("psb.nama ilike '%" . strtolower($search['nama']) . "%'");
		endif;

		return $this->db->order_by('psb.created_at', 'desc');
	}

	private function _listPembayaranSelisihBilling($limit = 0, $start = 0, $search)
	{
		$this->sqlPembayaranSelisihBilling($search);
		if ($limit !== 0) :
			$this->db->limit($limit, $start);
		endif;

		$data = $this->db->get()->result();

		foreach ($data as $i => $val) {
			$tagihan = $this->m_keuangan_ver2->hitungTagihan($val->id_pendaftaran);
			$val->tagihan = $tagihan;
			// $id = $val->id;
		}

		return $data;
		// $this->db->get(); echo $this->db->last_query(); exit();
	}

	function getListDataPembayaranSelisihBilling($limit = 0, $start = 0, $search)
	{
		$result['data'] = $this->_listPembayaranSelisihBilling($limit, $start, $search);
		$result['jumlah'] = $this->sqlPembayaranSelisihBilling($search)->get()->num_rows();
		return $result;

		$this->db->close();
	}

	function getDataPembayaranSelisihBilling($id)
	{
		$this->db->select("hp.*, psb.waktu, pd.id_pasien, p.nama, pd.no_register, p.kelamin, pj.nama as penjamin, 
											psb.keterangan, p.tanggal_lahir, p.alamat, pg.nama as petugas, mpb.nama as metode_bayar", false);
		$this->db->from('sm_pembayaran_selisih_billing as psb')
			->join('sm_history_pembayaran as hp', 'hp.id = psb.id_history_pembayaran')
			->join('sm_pendaftaran as pd', 'pd.id = hp.id_pendaftaran')
			->join('sm_pasien as p', 'pd.id_pasien = p.id')
			->join('sm_penjamin pj', 'pd.id_penjamin = pj.id')
			->join('sm_pegawai as pg', 'pg.id = hp.id_users')
			->join('sm_metode_pembayaran as mpb', 'mpb.id = hp.id_metode_pembayaran')
			->where('hp.id', $id, true);
		return $this->db->get()->row();

		// $this->db->select('hp.*, psb.waktu, pd.id_pasien, p.nama, pd.no_register, p.kelamin, pj.nama as penjamin, psb.keterangan, p.tanggal_lahir, p.alamat ')
		// 	->from('sm_pembayaran_selisih_billing psb')
		// 	->join('sm_history_pembayaran hp', 'psb.id_history_pembayaran = hp.id')
		// 	->join('sm_pendaftaran pd', 'hp.id_pendaftaran = pd.id')
		// 	->join('sm_pasien p', 'pd.id_pasien = p.id')
		// 	->join('sm_penjamin pj', 'pd.id_penjamin = pj.id');
	}

	function getDataPembayaranSelisihBillingHistory($id_history)
	{
		$this->db->select("pl.*, hp.no_kwitansi, hp.nominal,  hp.serah, hp.status, 
											concat(pl.tarif_manual, concat_ws ( ', ', l.nama, ll.nama )) AS tarif, pg.nama as petugas, mpb.nama as metode_bayar", false);
		$this->db->from('sm_pembayaran_lain as pl')
			->join('sm_history_pembayaran as hp', 'hp.id = pl.id_history_pembayaran')
			->join('sm_tarif_pelayanan as tp', 'tp.id = pl.id_tarif_pelayanan', 'left')
			->join('sm_layanan as l', 'l.id = tp.id_layanan', 'left')
			->join('sm_layanan as ll', 'll.id = l.id_parent', 'left')
			->join('sm_pegawai as pg', 'pg.id = hp.id_users', 'left')
			->join('sm_metode_pembayaran as mpb', 'mpb.id = hp.id_metode_pembayaran', 'left')
			->join('sm_translucent as tr', 'tr.id = pl.id_users', 'left')
			->where('hp.id', $id_history, true);
		return $this->db->get()->row();
	}

	function batalPembayaranSelisihBilling($id_history_pembayaran)
	{
		$this->db->trans_begin();
		$result['message'] = 'Gagal melakukan pembatalan pembayaran Selisih Billing';
		$data_selisih_billing = array(
			'nominal' => 0,
			// 'akomodasi_billing' => 0,
			'status' => 'Batal',
		);
		$this->db->where('id_history_pembayaran', $id_history_pembayaran)->update('sm_pembayaran_selisih_billing', $data_selisih_billing);
		// $this->db->delete('sm_pembayaran_selisih_billing', ['id_history_pembayaran' => $id_history_pembayaran]);
		if ($this->db->trans_status() === false) :
			$this->db->trans_rollback();
			$result['status'] = false;
		endif;
		$data_history_pembayaran = array(
			'tunai' => 0,
			'non_tunai' => 0,
			'serah' => 0,
			'pembulatan' => 0,
			'status' => 'Batal',
			'jumlah_bayar' => 0,
		);
		$this->db->where('id', $id_history_pembayaran)->update('sm_history_pembayaran', $data_history_pembayaran);
		if ($this->db->trans_status() === false) :
			$this->db->trans_rollback();
			$result['status'] = false;
		endif;
		if ($this->db->trans_status() === false) :
			$this->db->trans_rollback();
			$result['status'] = false;
		else :
			$this->db->trans_commit();
			$result['status'] = true;
			$result['message'] = 'Berhasil melakukan pembatalan pembayaran Selisih Billing';
		endif;
		return $result;
	}
}
