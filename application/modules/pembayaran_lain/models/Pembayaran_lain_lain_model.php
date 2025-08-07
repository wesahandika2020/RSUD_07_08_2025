<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembayaran_lain_model extends CI_Model 
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('keuangan/Pembayaran_model', 'm_pembayaran');
	}
	
	function simpanPembayaranLain($data) 
	{
		$this->db->trans_begin();
		$id = NULL;
		$no_kwitansi = $this->m_pembayaran->generateNoKwitansiPembayaran($data['unit_kasir']);
		$data_history_pembayaran = array(
			'id_unit_kasir' => $data['unit_kasir'],
			'no_kwitansi' => $no_kwitansi,
			'jenis_transaksi' => 'Lain - Lain',
			'waktu' => $this->datetime,
			'id_users' => $this->user,
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
		);
		$this->db->insert('sm_history_pembayaran', $data_history_pembayaran);
		$id_history_pembayaran = $this->db->insert_id();
		$data_pembayaran_lain = array(
			'nama' => $data['nama'],
			'id_tarif_pelayanan' => $data['id_tarif_pelayanan'],
			'jumlah' => $data['jumlah'],
			'satuan' => $data['satuan'],
			'total' => $data['total'],
			'keterangan' => $data['keterangan'],
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
		return array('status' => $status, 'message' => $message, 'id' => $id);
	}
}