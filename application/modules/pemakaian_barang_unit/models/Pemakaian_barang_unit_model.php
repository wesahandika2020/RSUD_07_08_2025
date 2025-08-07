<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Pemakaian_barang_unit_model extends CI_Model {

	function __construct()
	{
		parent::__construct();
		$this->user = $this->session->userdata('id_translucent');
		$this->unit = $this->session->userdata('id_unit');
		$this->date = date('Y-m-d');
		$this->datetime = date('Y-m-d H:i:s');
		$this->load->model('inventory/Inventory_model', 'm_inventory');
	}
	
	private function sqlPemakaianBarangUnit($search)
    {
		$this->db->select("
			s.id, s.id_barang, s.waktu, s.transaksi, s.keluar, s.ed, 
			b.nama_lengkap as nama_barang, tr.account as user, coalesce(pgu.nama, '') as nama_user
		");
		$this->db->from('sm_stok as s');
		$this->db->join('sm_barang as b', 'b.id = s.id_barang');
		$this->db->join('sm_translucent as tr', 'tr.id = s.id_users');
		$this->db->join('sm_pegawai as pgu', 'pgu.id = s.id_users', 'left');
		$this->db->where('s.transaksi', 'Pemakaian Unit', true);
		$this->db->where('s.id_unit', $this->unit);
		if (($search['tanggal_awal'] !== '') & ($search['tanggal_akhir'] !== '')) :
            $this->db->where("s.waktu BETWEEN '" . date2mysql($search['tanggal_awal']) . " 00:00:00' AND '" . date2mysql($search['tanggal_akhir']) . " 23:59:59'");
        endif;
		if ($search['barang'] !== '') :
			$this->db->where('b.id', $search['barang'], true);
		endif;
		return $this->db->order_by('s.id', 'desc');
    }

    private function _listPemakaianBarangUnit($limit = 0, $start = 0, $search)
    {
        $this->sqlPemakaianBarangUnit($search);
        if ($limit !== 0) :
            $this->db->limit($limit, $start);
        endif;
		$result = $this->db->get()->result();
		foreach ($result as $i => $val) :
			$this->db->select('s.nama')->from('sm_kemasan_barang as kb')->join('sm_satuan as s', 's.id = kb.id_kemasan')->where('kb.id_barang', $val->id_barang, true)->where('kb.default_kemasan', '1', true);
			$result[$i]->satuan = $this->db->get()->row()->nama;
		endforeach;
		return $result;
    }

    function getListDataPemakaianBarangUnit($limit = 0, $start = 0, $search)
    {
        $result['data'] = $this->_listPemakaianBarangUnit($limit, $start, $search);
        $result['jumlah'] = $this->sqlPemakaianBarangUnit($search)->get()->num_rows();
        return $result;
        $this->db->close();
    }

	function simpanDataPemakaianBarangUnit()
	{
		$this->db->trans_begin();
		$id_barang = safe_post('id_barang');
		$jumlah = safe_post('jumlah');
		foreach ($id_barang as $i => $val) :
			$this->db->select("DISTINCT ON (ed) sum(masuk) - sum(keluar) as sisa, ed, id_barang")->from('sm_stok');
			$this->db->where('id_barang', $val, true);
			$this->db->where('id_unit', $this->unit, true);
			$this->db->where('ed >', $this->date, true);
			$this->db->group_by('ed, id_barang');
			$this->db->having('sum(masuk) - sum(keluar) > 0');
			$this->db->order_by('ed', 'asc');
			$barang = $this->db->get()->result();
			$use = $jumlah[$i];
			if (is_array($barang)) :
				foreach ($barang as $j => $row) :
					$use = $row->sisa - abs($use);
					if ($use <= 0) :
						$keluar = $row->sisa;
					else :
						$keluar = abs($use - $row->sisa);
					endif;

					$stok = array(
						'waktu' => $this->datetime,
						'transaksi' => 'Pemakaian Unit',
						'id_barang' => $row->id_barang,
						'ed' => isset($row->ed) ? $row->ed : NULL,
						'keluar' => $keluar,
						'keterangan' => $this->session->userdata('unit'),
						'id_unit' => $this->unit,
						'id_users' => $this->user,
					);
					$this->db->insert('sm_stok', $stok);
					if ($this->db->trans_status() === false) :
						$this->db->trans_rollback();
						$result['status'] = false;
						$result['message'] = 'Gagal menyimpan data pemakaian barang unit';
					endif;

					if (0 <= $use) :
						break;
					endif;
				endforeach;
				if ($this->db->trans_status() === false) :
					$this->db->trans_rollback();
					$result['status'] = false;
					$result['message'] = 'Gagal menyimpan data pemakaian barang unit';
				else :
					$this->db->trans_commit();
					$result['status'] = true;
					$result['message'] = 'Berhasil menyimpan data pemakaian barang unit';
				endif;
			endif;
		endforeach;
		return $result;
	}
	
	function deleteDataPemakaianBarangUnit($id)
	{
		$this->db->trans_begin();
		$this->db->delete('sm_stok', ['id' => $id]);
		if ($this->db->trans_status() === false) :
			$this->db->trans_rollback();
			$result['status'] = false;
			$result['message'] = 'Gagal menghapus data pemakaian barang unit';
		else :
			$this->db->trans_commit();
			$result['status'] = true;
			$result['message'] = 'Berhasil menghapus data pemakaian barang unit';
		endif;
		return $result;
	}
}
