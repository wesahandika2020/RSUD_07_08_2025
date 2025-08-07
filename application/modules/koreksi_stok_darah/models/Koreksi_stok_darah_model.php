<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Koreksi_stok_darah_model extends CI_Model
{

	function __construct()
	{
		parent::__construct();
		$this->unit = $this->session->userdata('id_unit');
		$this->user = $this->session->userdata('id_translucent');
		$this->datetime = date('Y-m-d H:i:s');
	}

	function getEdBarang($id_barang)
	{
		$sql = "select sum(masuk) - sum(keluar) as sisa, ed 
						from sm_stok_bank_darah
						where id_barang = '" . $id_barang . "'
						and ed > '" . $this->datetime . "' and id_unit = '" . $this->session->userdata('id_unit') . "'
						group by id_barang, ed 
						having sum(masuk) - sum(keluar) != 0";
		$query = $this->db->query($sql);
		$this->db->close();
		return $query;
	}

	// koreksi stok
	function getSisaBarangKoreksiStok($param)
	{
		$id_unit = $this->session->userdata('id_unit');
		$this->db->select("COALESCE(sum(masuk) - sum(keluar), '0') as sisa");
		$this->db->from('sm_stok_bank_darah');
		$this->db->where('id_barang', $param['id_barang'], true);
		// $this->db->where('ed >', $this->datetime, true);

		if ($param['ed'] !== '') {
			$this->db->where('ed', $param['ed']);
		}

		$this->db->where('id_unit', $this->session->userdata('id_unit'), true);

		return $this->db->get();
	}
	// end koreksi stok

	private function sqlKoreksiStokDarah($search)
	{
		$this->db->select(" s.id, s.id_barang, s.waktu, s.ed, s.masuk, s.keluar, b.nama_lengkap as nama_barang, tr.account
		");
		$this->db->from('sm_stok_bank_darah as s');
		$this->db->join('sm_barang as b', 'b.id = s.id_barang');
		$this->db->join('sm_translucent as tr', 'tr.id = s.id_users', 'left');
		$this->db->where('s.transaksi', 'Koreksi Stok', true);
		$this->db->where('s.id_unit', $this->unit, true);

		if (($search['tanggal_awal'] !== '') & ($search['tanggal_akhir'] !== '')) :
			$this->db->where("s.waktu BETWEEN '" . date2mysql($search['tanggal_awal']) . " 00:00:00' AND '" . date2mysql($search['tanggal_akhir']) . " 23:59:59'");
		endif;
		if ($search['id_barang'] !== '') :
			$this->db->where('b.id', $search['id_barang'], true);
		endif;

		return $this->db->order_by('s.id', 'desc');
	}

	private function _listKoreksiStokDarah($limit = 0, $start = 0, $search)
	{
		$this->sqlKoreksiStokDarah($search);
		if ($limit !== 0) :
			$this->db->limit($limit, $start);
		endif;

		$result = $this->db->get()->result();
		foreach ($result as $i => $val) :
			$sql_child = "select s.nama from sm_kemasan_barang as kb
			join sm_satuan as s on (kb.id_kemasan = s.id) 
			where kb.id_barang = '" . $val->id_barang . "' 
			and kb.default_kemasan = '1'";
			$child = $this->db->query($sql_child)->row_array();
			$result[$i]->kemasan = $child['nama'];
		endforeach;
		return $result;
	}

	function getListDataKoreksiStokDarah($limit = 0, $start = 0, $search)
	{
		$result['data'] = $this->_listKoreksiStokDarah($limit, $start, $search);
		$result['jumlah'] = $this->sqlKoreksiStokDarah($search)->get()->num_rows();
		$this->db->close();
		return $result;
	}

	function simpanDataKoreksiStokDarah()
	{
		$id_barang = safe_post('id_barang');
		$ed = safe_post('ed');
		$penyesuaian = safe_post('penyesuaian');
		$alasan = safe_post('alasan');
		$id_unit = $this->session->userdata('id_unit');
		$id_user = $this->session->userdata('id_translucent');

		if (is_array($id_barang)) {
			foreach ($id_barang as $i => $value) {
				$this->db->trans_begin();
				if (0 < $penyesuaian[$i]) {
					$data = array(
						'waktu' 								=> date('Y-m-d H:i:s'),
						'transaksi' 						=> 'Koreksi Stok',
						'id_barang' 						=> $value,
						'ed' 										=> $ed[$i],
						'masuk' 								=> abs($penyesuaian[$i]),
						'id_unit' 							=> $id_unit,
						'id_users' 							=> $id_user,
						'keterangan' 						=> $alasan[$i],
						'is_bank_darah' 				=> '1',
						'is_confirm_bank_darah' => 'Confirmed'
					);
					$this->db->insert('sm_stok_bank_darah', $data);
				} else {
					$data = array(
						'waktu' => date('Y-m-d H:i:s'),
						'transaksi' => 'Koreksi Stok',
						'id_barang' => $value,
						'ed' => $ed[$i],
						'keluar' => abs($penyesuaian[$i]),
						'id_unit' => $id_unit,
						'id_users' => $id_user,
						'keterangan' => $alasan[$i],
						'is_bank_darah' 				=> '1',
						'is_confirm_bank_darah' => 'Confirmed'
					);
					$this->db->insert('sm_stok_bank_darah', $data);
				}
				if ($this->db->trans_status() === false) :
					$this->db->trans_rollback();
					$result['status'] = false;
					$result['message'] = "Gagal menyimpan data koreksi stok";
				else :
					$this->db->trans_commit();
					$result['status'] = true;
					$result['message'] = "Berhasil menyimpan data koreksi stok";
				endif;
			}
		} else {
			$result['status'] = false;
			$result['message'] = "Data Barang bukan Array";
		}

		return $result;
	}

	function getKoreksiStokDarah($id)
	{
		$this->db->select("b.id, b.hna, b.hpp, b.nama_lengkap as nama_barang, bu.id_unit, kb.nama as kategori_barang");
		$this->db->from('sm_barang as b');
		$this->db->join('sm_barang_unit as bu', 'bu.id_barang = b.id');
		$this->db->join('sm_kategori_barang as kb', 'kb.id = b.id_kategori');
		$this->db->where('bu.id_unit', $this->session->userdata('id_unit'), true);

		if ($id !== NULL) :
			$this->db->where('b.id_kategori', $id, true);
		endif;
		$this->db->order_by('b.id_kategori, b.nama', 'asc');
		// $this->db->get(); echo $this->db->last_query(); die;
		$result = $this->db->get()->result();
		foreach ($result as $i => $value) :
			$this->db->select("count(*), coalesce(sum(masuk) - sum(keluar), '0.00') as sisa");
			$this->db->from('sm_stok_bank_darah');
			$this->db->where('id_barang', $value->id, true);
			$this->db->where('id_unit', $value->id_unit, true);
			$result[$i]->sisa = $this->db->get()->row()->sisa;
		endforeach;
		$data['data'] = $result;
		return $data;
	}
}
