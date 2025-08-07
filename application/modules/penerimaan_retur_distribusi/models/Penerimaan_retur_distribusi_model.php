<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Penerimaan_retur_distribusi_model extends CI_Model {

	function __construct()
	{
		parent::__construct();
		$this->datetime = date('Y-m-d H:i:s');
	}
		
	private function sqlPenerimaanReturDistribusi($search)
    {
		$this->db->select("rd.*, u.nama as unit_retur, tr.account, coalesce(pgu.nama, '') as nama_account");
		$this->db->from('sm_retur_distribusi as rd');
		$this->db->join('sm_unit as u', 'u.id = rd.id_unit_retur');
		$this->db->join('sm_translucent as tr', 'tr.id = rd.id_user_retur', 'left');
		$this->db->join('sm_pegawai as pgu', 'pgu.id = rd.id_user_retur', 'left');
		$this->db->where('rd.id_unit_penerima', $this->session->userdata('id_unit'), true);
		if (($search['tanggal_awal'] !== '') & ($search['tanggal_akhir'] !== '')) :
            $this->db->where("rd.waktu_diterima BETWEEN '" . date2mysql($search['tanggal_awal']) . " 00:00:00' AND '" . date2mysql($search['tanggal_akhir']) . " 23:59:59'");
		endif;
		if (isset($search['no_distribusi']) && $search['no_distribusi'] !== '') :
			$this->db->where('d.id', $search['no_distribusi'], true);
		endif;
		if (isset($search['unit']) && $search['unit'] !== '') :
			$this->db->where('rd.id_unit_retur', $search['unit'], true);
		endif;
		if (isset($search['id']) && $search['id'] !== '') :
			$this->db->where('rd.id', $search['id'], true);
		endif;
		return $this->db->order_by('rd.id', 'desc');
    }

    private function _listPenerimaanReturDistribusi($limit = 0, $start = 0, $search)
    {
        $this->sqlPenerimaanReturDistribusi($search);
        if ($limit !== 0) :
            $this->db->limit($limit, $start);
        endif;
        $result = $this->db->get()->result();
		foreach ($result as $i => $val) :
			$sql_child = "select b.nama_lengkap as nama_barang, 
						dd.jumlah, dd.ed, dd.alasan
						from sm_detur_distribusi as dd
						join sm_barang as b on (b.id = dd.id_barang) 
						where dd.id_retur_distribusi = '".$val->id."'";
			$result[$i]->detail = $this->db->query($sql_child)->result();
		endforeach;
		return $result;
    }

    function getListDataPenerimaanReturDistribusi($limit = 0, $start = 0, $search)
    {
        $result['data'] = $this->_listPenerimaanReturDistribusi($limit, $start, $search);
        $result['jumlah'] = $this->sqlPenerimaanReturDistribusi($search)->get()->num_rows();
        $this->db->close();
        return $result;
    }

	function getDataPenerimanReturDistribusi($id)
	{
		$q = NULL;
		$select = "select rd.*, u.nama as unit_penerima, us.account ";
		$sql = "from sm_retur_distribusi as rd
				join sm_unit as u on (rd.id_unit_penerima = u.id)
				join sm_translucent as us on (rd.id_user_retur = us.id)
				where rd.id = '" . $id . "' ";
		$limitation = NULL;
		$result = $this->db->query($select . $sql)->result();
		foreach ($result as $key => $value) {
			$sql_child = "select b.nama_lengkap as nama_barang, dr.jumlah, dr.ed, dr.alasan 
					    from sm_detur_distribusi dr 
					    join sm_barang b on (dr.id_barang = b.id)
					    where dr.id_retur_distribusi = '" . $value->id . "'
					";
			$result[$key]->detail = $this->db->query($sql_child)->result();
		}
		return $result;
	}

	function simpanDataPenerimaanReturDistribusi()
	{
		$this->db->trans_begin();
		$data = array(
			'waktu_diterima' => safe_post('waktu_penerimaan_retur_distribusi') !== '' ? datetime2mysql(safe_post('waktu_penerimaan_retur_distribusi')) : $this->datetime,
			'id_user_penerima' => $this->session->userdata('id_translucent')
		);
		$this->db->where('id', safe_post('no_retur_distribusi'))->update('sm_retur_distribusi', $data);
		if ($this->db->trans_status() === false) :
			$this->db->trans_rollback();
			$result['status'] = false;
		endif;
		$row = $this->db->get_where('sm_stok', ['id_transaksi' => safe_post('no_retur_distribusi'), 'transaksi' => 'Retur Distribusi'])->result();
		foreach ($row as $i => $value) :
			$dataStok = array(
				'waktu' => safe_post('waktu_penerimaan_retur_distribusi') !== '' ? datetime2mysql(safe_post('waktu_penerimaan_retur_distribusi')) : $this->datetime,
				'id_transaksi' => safe_post('no_retur_distribusi'),
				'transaksi' => 'Penerimaan Retur Distribusi',
				'id_barang' => $value->id_barang,
				'ed' => $value->ed,
				'masuk' => $value->keluar,
				'id_unit' => $this->session->userdata('id_unit'),
				'id_users' => $this->session->userdata('id_translucent'),
				'keterangan' => $value->keterangan
			);
			$this->db->insert('sm_stok', $dataStok);
			if ($this->db->trans_status() === false) :
				$this->db->trans_rollback();
				$result['status'] = false;
			endif;
		endforeach;
		if ($this->db->trans_status() === false) :
			$this->db->trans_rollback();
			$result['status'] = false;
			$result['message'] = 'Gagal menyimpan data retur penerimaan distribusi';
		else :
			$this->db->trans_commit();
			$result['status'] = true;
			$result['message'] = 'Berhasil menyimpan data retur penerimaan distribusi';
		endif;
		return $result;
	}
}