<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Deposit_model extends CI_Model {

	function __construct()
	{
		parent::__construct();

	}
	
	private function sqlDeposit($search)
    {
        $this->db->select("dp.*, CONCAT_WS(' ', p.nama, COALESCE(p.status_pasien, '')) as pasien, p.id as no_rm, tr.account as user");
        $this->db->from('sm_deposit as dp')
				->join('sm_pasien as p', 'p.id = dp.id_pasien')
				->join('sm_translucent as tr', 'tr.id = dp.id_users', 'left')
				->join('sm_pegawai as pg', 'pg.id = tr.id', 'left');

        if (($search['tanggal_awal'] !== '') & ($search['tanggal_akhir'] !== '')) :
            $this->db->where("dp.waktu BETWEEN '" . date2mysql($search['tanggal_awal']) . " 00:00:00' AND '" . date2mysql($search['tanggal_akhir']) . " 23:59:59'");
        endif;

        if ($search['no_rm'] !== '') :
            $this->db->like('p.id', $search['no_rm'], 'before', true);
        endif;

        if ($search['nama'] !== '') :
            $this->db->where("p.nama ilike '%" . strtolower($search['nama']) . "%' ");
		endif;
		
        if ($search['keyword'] !== '') :
            $this->db->where("p.nama ilike '%" . strtolower($search['keyword']) . "%'");
        endif;

        return $this->db->order_by('dp.waktu', 'desc');    
    }

    private function _listDeposit($limit = 0, $start = 0, $search)
    {
        $this->sqlDeposit($search);
        if ($limit !== 0) :
            $this->db->limit($limit, $start);
        endif;

		// $this->db->get(); echo $this->db->last_query(); die;
        return $this->db->get()->result();
    }

    function getListDataDeposit($limit = 0, $start = 0, $search)
    {
        $result['data'] = $this->_listDeposit($limit, $start, $search);
        $result['jumlah'] = $this->sqlDeposit($search)->get()->num_rows();
        return $result;

		$this->db->close();
    }

	function getDataHistoryDepositPasien($id_pasien)
	{
		$data = NULL;
		$data_pasien = $this->db->select("p.*, 0 as sisa_deposit")->from('sm_pasien as p')->where('p.id', $id_pasien, true)->get()->row();
		if ($data_pasien !== NULL) :
			$data['pasien'] = $data_pasien;
			$data['history_deposit'] = $this->db->select("depo.*, coalesce(pg.nama, '') as petugas")->from('sm_deposit as depo')
											->join('sm_translucent as tr', 'tr.id = depo.id_users', 'left')->join('sm_pegawai as pg', 'pg.id = tr.id', 'left')
											->where('depo.id_pasien', $id_pasien, true)->get()->result();
			$data['pasien']->sisa_deposit = $this->db->select("coalesce((sum(masuk) - sum(keluar)), 0) as sisa_deposit")->from('sm_deposit')
											->where('id_pasien', $id_pasien, true)->get()->row()->sisa_deposit;
		endif;
		return $data;
	}

	function simpanDataDeposit($data, $jenis_transaksi)
	{
		$status = false;
		$message = '';
		$sisa_deposit = (int) $this->db->select("coalesce((sum(masuk) - sum(keluar)), 0) as sisa_deposit")->from('sm_deposit')
						->where('id_pasien', $data['id_pasien'], true)->get()->row()->sisa_deposit;
		$query_max = $this->db->select("depo.saldo")->from('sm_deposit as depo')
						->join('(select max(id) as id_max, id from sm_deposit group by id) as dpm', 'dpm.id_max = depo.id', 'inner')
						->get()->row();
		$saldo = 0;
		if (0 < count((array)$query_max)) :
			$saldo = (double) $query_max->saldo;
		endif;
		$saldo = (double) $saldo + (double) $data['masuk'] - (double) $data['keluar'];
		$data['saldo'] = $saldo;
		if ($jenis_transaksi === 'ambil') :
			if ($sisa_deposit < (int) $data['keluar']) :
				$message = 'Transaksi ditolak, Deposit yang diambil lebih besar dari sisa deposit';
			else :
				$this->db->insert('sm_deposit', $data);
				$status = true;
				$message = 'Berhasil menyimpan data deposit';
			endif;
		else :
			$this->db->insert('sm_deposit', $data);
			$status = true;
			$message = 'Berhasil menyimpan data deposit';
		endif;
		return array('status' => $status, 'message' => $message);
	}

	function getDataSummaryDeposit()
	{
		$saldo = $this->db->select("coalesce(sum(masuk - keluar), 0) as saldo")->from('sm_deposit')->get()->row()->saldo;
		$today = $this->db->select("coalesce(sum(masuk), 0) as masuk, coalesce(sum(keluar), 0) as keluar")->from('sm_deposit')
						->where('date(waktu)', date('Y-m-d'), true)->get()->row();
		$setor_today = 0;
		$ambil_today = 0;

		if (0 < count((array)$today)) :
			$setor_today = $today->masuk;
			$ambil_today = $today->keluar;
		endif;

		return array('saldo' => $saldo, 'setor_today' => $setor_today, 'ambil_today' => $ambil_today);
	}

	function depositPasien($id)
	{
		return $this->db->get_where('sm_deposit', ['id' => $id])->row();
	}
}
