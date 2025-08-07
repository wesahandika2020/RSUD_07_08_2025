<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Penerimaan_distribusi_gizi_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->datetime = date('Y-m-d H:i:s');
		$this->load->model('inventori_gizi/Inventori_gizi_model', 'inventori');	
	}

	private function sqlPenerimaanDistribusi($search)
    {
		$this->db->select("pd.*, pd.waktu, d.kode_dikirim, dd.jumlah, dd.jumlah_dikirim,
			b.nama_lengkap as nama_barang, st.nama as kemasan, tr.account, coalesce(pgu.nama, '') as nama_account, 
			un.nama as unit_tujuan
		");
		$this->db->from('sm_penerimaan_distribusi_gizi as pd');
		$this->db->join('sm_gizi_distribusi as d', 'd.id = pd.id_distribusi');
		$this->db->join('sm_gizi_detail_distribusi as dd', 'dd.id_distribusi = d.id', 'left');
		$this->db->join('sm_unit as un', 'un.id = d.id_unit_tujuan');
		$this->db->join('sm_kemasan_barang as kb', 'kb.id = dd.id_kemasan_barang');
		$this->db->join('sm_barang as b', 'b.id = kb.id_barang');
		$this->db->join('sm_satuan as st', 'st.id = kb.id_kemasan', 'left');
		$this->db->join('sm_translucent as tr', 'tr.id = pd.id_users', 'left');
		$this->db->join('sm_pegawai as pgu', 'pgu.id = pd.id_users', 'left');
		$this->db->where('d.id_unit_asal', $this->session->userdata('id_unit'), true);
		if (($search['tanggal_awal'] !== '') & ($search['tanggal_akhir'] !== '')) :
            $this->db->where("pd.waktu BETWEEN '" . date2mysql($search['tanggal_awal']) . " 00:00:00' AND '" . date2mysql($search['tanggal_akhir']) . " 23:59:59'");
		endif;
		if (isset($search['no_distribusi']) && $search['no_distribusi'] !== '') :
			$this->db->where('d.id', $search['no_distribusi'], true);
		endif;
		if (isset($search['barang']) && $search['barang'] !== '') :
			$this->db->where('b.id', $search['barang'], true);
		endif;
		if (isset($search['id']) && $search['id'] !== '') :
			$this->db->where('d.id', $search['id'], true);
		endif;

		return $this->db->order_by('pd.id', 'desc');
    }

    private function _listPenerimaanDistribusi($limit = 0, $start = 0, $search)
    {
        $this->sqlPenerimaanDistribusi($search);
        if ($limit !== 0) :
            $this->db->limit($limit, $start);
        endif;

        return $this->db->get()->result();
    }

    function getListDataPenerimaanDistribusi($limit = 0, $start = 0, $search)
    {
        $result['data'] = $this->_listPenerimaanDistribusi($limit, $start, $search);
        $result['jumlah'] = $this->sqlPenerimaanDistribusi($search)->get()->num_rows();
        return $result;

        $this->db->close();
    }
		
	function simpanDataPenerimaanDistribusi() 
	{
		$this->db->trans_begin();
		$data = array(
			'id_distribusi' => safe_post('no_distribusi'),
			'waktu' => safe_post('waktu_penerimaan') !== '' ? datetime2mysql(safe_post('waktu_penerimaan')) : $this->datetime,
			'id_users' => $this->session->userdata('id_translucent')
		);
		$this->db->insert('sm_penerimaan_distribusi_gizi', $data);
		$id = $this->db->insert_id();
		if ($this->db->trans_status() === false) :
			$this->db->trans_rollback();
			$result['status'] = false;
		endif;
		$stoks = $this->db->query("SELECT
			id_barang, id_unit, ed, keluar
			FROM sm_gizi_stok 
			WHERE id_transaksi = ".safe_post('no_distribusi')."
			AND transaksi = 'Distribusi'
		")->result();
		if (is_array($stoks)) :
			foreach ($stoks as $data) :
				$ket_unit = $this->inventori->namaUnit($data->id_unit);
				$data_stok = array(
					'waktu' => safe_post('waktu_penerimaan') !== '' ? datetime2mysql(safe_post('waktu_penerimaan')) : $this->datetime,
					'id_transaksi' => $id,
					'transaksi' => 'Penerimaan Distribusi',
					'id_barang' => $data->id_barang,
					'ed'		=> $data->ed,
					'masuk' => $data->keluar,
					'keterangan' => $ket_unit,
					'id_unit' => $this->session->userdata('id_unit'),
					'id_users' => $this->session->userdata('id_translucent'),
				);
				$this->db->insert('sm_gizi_stok', $data_stok);

				$idStok = $this->db->insert_id();

                $updateDataStok['id_stok'] = (int)$idStok;

                $this->db->where('id', (int)$idStok);
                $this->db->update('sm_gizi_stok', $updateDataStok);

				if ($this->db->trans_status() === false) :
					$this->db->trans_rollback();
					$result['status'] = false;
				endif;
			endforeach;
		endif;
		if ($this->db->trans_status() === false) :
			$this->db->trans_rollback();
			$result['status'] = false;
			$result['message'] = "Gagal menyimpan data penerimaan distribusi";
		else :
			$this->db->trans_commit();
			$result['status'] = true;
			$result['message'] = "Berhasil menyimpan data penerimaan distribusi";
		endif;
		return $result;
	}

	function deleteDataPenerimaanDistribusi($id)
	{
		$this->db->trans_begin();
		$this->db->where(['id' => $id])->delete('sm_penerimaan_distribusi_gizi');
		$this->db->where(['id_transaksi' => $id, 'transaksi' => 'Penerimaan Distribusi'])->delete('sm_gizi_stok');
		if ($this->db->trans_status() === false) :
			$this->db->trans_rollback();
			$result['status'] = false;
			$result['messasge'] = 'Gagal menghapus penerimaan distribusi!';
		else :
			$this->db->trans_commit();
			$result['status'] = true;
			$result['messasge'] = 'Berhasil menghapus penerimaan distribusi!';
		endif;
		return $result;
	}
}
