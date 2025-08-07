<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pembayaran_lain_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->datetime = date('Y-m-d H:i:s');
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

	function simpanPembayaranLain($data)
	{
		$this->load->model('pendaftaran/Pendaftaran_model', 'klinik');
		$pendaftaran = $this->klinik->getPendaftaranDetail($data['id_pendaftaran']);

		$this->db->trans_begin();
		$id = NULL;
		$data_history_pembayaran = array(
			'id_unit_kasir' => $data['unit_kasir'],
			'no_kwitansi' => $data['no_kwitansi'],
			'jenis_transaksi' => 'Lain - Lain',
			'waktu' => $this->datetime,
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
		$data_pembayaran_lain = array(
			'waktu' => $this->datetime,
			'nama' => $data['nama'],
			'id_tarif_pelayanan' => $data['id_tarif_pelayanan'],
			'tarif_manual' => $data['tarif_manual'],
			'jumlah' => $data['jumlah'],
			'satuan' => $data['satuan'],
			'total' => $data['total'],
			'keterangan' => $data['keterangan'],
			'id_users' => $data['id_users'],
			'id_history_pembayaran' => $id_history_pembayaran,
		);
		$this->db->insert('sm_pembayaran_lain', $data_pembayaran_lain);
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
		return array('status' => $status, 'message' => $message, 'id' => $id, 'data' => $pendaftaran);
	}

	private function sqlPembayaranLain($search)
	{
		$this->db->select("pl.*, pd.no_register, pd.id_pasien, hp.no_kwitansi, hp.nominal,  hp.serah, hp.status, coalesce(pl.tarif_manual, concat_ws(', ', l.nama, ll.nama)) as tarif", false);
		$this->db->from('sm_pembayaran_lain as pl')
			->join('sm_history_pembayaran as hp', 'hp.id = pl.id_history_pembayaran')
			->join('sm_pendaftaran as pd', 'hp.id_pendaftaran = pd.id', 'left')
			->join('sm_tarif_pelayanan as tp', 'tp.id = pl.id_tarif_pelayanan', 'left')
			->join('sm_layanan as l', 'l.id = tp.id_layanan', 'left')
			->join('sm_layanan as ll', 'll.id = l.id_parent', 'left')
			->join('sm_translucent as tr', 'tr.id = pl.id_users', 'left');

		if (($search['tanggal_awal'] !== '') & ($search['tanggal_akhir'] !== '')) :
			$this->db->where("pl.waktu BETWEEN '" . date2mysql($search['tanggal_awal']) . " 00:00:00' AND '" . date2mysql($search['tanggal_akhir']) . " 23:59:59'");
		endif;

		if ($search['no_kwitansi'] !== '') :
			$this->db->like('hp.no_kwitansi', $search['no_kwitansi'], 'before', true);
		endif;

		if ($search['nama'] !== '') :
			$this->db->where("pl.nama ilike '%" . strtolower($search['nama']) . "%'");
		endif;

		if ($search['tarif'] !== '') :
			$this->db->where('pl.id_tarif_pelayanan', $search['tarif']);
		endif;

		return $this->db->order_by('pl.waktu', 'desc');
	}

	private function _listPembayaranLain($limit = 0, $start = 0, $search)
	{
		$this->sqlPembayaranLain($search);
		if ($limit !== 0) :
			$this->db->limit($limit, $start);
		endif;

		return $this->db->get()->result();
		// $this->db->get(); echo $this->db->last_query(); exit();
	}

	function getListDataPembayaranLain($limit = 0, $start = 0, $search)
	{
		$result['data'] = $this->_listPembayaranLain($limit, $start, $search);
		$result['jumlah'] = $this->sqlPembayaranLain($search)->get()->num_rows();
		return $result;

		$this->db->close();
	}

	function getDataPembayaranLain($id)
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
			->where('pl.id', $id, true);
		return $this->db->get()->row();
	}

	function getDataPembayaranLainHistory($id_history)
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
}
