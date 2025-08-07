<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Koreksi_stok_gizi_model extends CI_Model {

	function __construct()
	{
		parent::__construct();
		$this->unit = (int)$this->session->userdata('id_unit');
	}

	private function sqlKoreksiStokGizi($search)
	{
		date_default_timezone_set('Asia/Jakarta');
		$this->db->select("
			s.id, s.id_barang, s.waktu, s.ed, s.masuk, s.keluar, b.nama_lengkap as nama_barang, tr.account, coalesce(pgu.nama, '') as nama_account, s.keterangan
		");
		$this->db->from('sm_gizi_stok as s');
		$this->db->join('sm_barang as b', 'b.id = s.id_barang');
		$this->db->join('sm_translucent as tr', 'tr.id = s.id_users', 'left');
		$this->db->join('sm_pegawai as pgu', 'pgu.id = s.id_users', 'left');
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

	private function _listKoreksiStokGizi($limit = 0, $start = 0, $search)
	{
		$this->sqlKoreksiStokGizi($search);
		if ($limit !== 0) :
			$this->db->limit($limit, $start);
		endif;
		
		$result = $this->db->get()->result();
		foreach ($result as $i => $val) :
			$sql_child = "select s.nama from sm_kemasan_barang as kb
			join sm_satuan as s on (kb.id_kemasan = s.id) 
			where kb.id_barang = '".$val->id_barang."' 
			and kb.default_kemasan = '1'";
			$child = $this->db->query($sql_child)->row_array();
			$result[$i]->kemasan = $child['nama'];
		endforeach;
		return $result;
		
	}

	function getListKoreksiStokGizi($limit = 0, $start = 0, $search)
	{
		$result['data'] = $this->_listKoreksiStokGizi((int)$limit, (int)$start, $search);
		$result['jumlah'] = $this->sqlKoreksiStokGizi($search)->get()->num_rows();
		$this->db->close();
		return $result;
	}

	function cekStok($id, $waktu)
    {
        return $this->db->query("select id, waktu from sm_gizi_stok where id_barang = '" . $id . "' and id_stok = '" . $waktu . "'")->row();
    }

    function cekExpired($id)
    {
        return $this->db->query("select ed from sm_gizi_stok where id = '" . $id . "'")->row();
    }
		
 	function simpanKoreksiStokGizi()
	{
		$idBarang = safe_post('id_barang');
		$ed = safe_post('ed');
		$expired = safe_post('tgl_expired');
		$penyesuaian = safe_post('penyesuaian');
		$alasan = safe_post('alasan');
		$idUnit = (int)$this->session->userdata('id_unit');
		$idUser = (int)$this->session->userdata('id_translucent');

		date_default_timezone_set('Asia/Jakarta');

		if (is_array($idBarang)) {
			foreach ($idBarang as $i => $value) {
				$this->db->trans_begin();
				if (0 < $penyesuaian[$i]) {
					$data = array(
						'transaksi' => 'Koreksi Stok',
						'id_barang' => (int)$value,
						'waktu' => date('Y-m-d H:i:s'),
						'masuk' => abs($penyesuaian[$i]),
						'id_unit' => (int)$idUnit,
						'id_users' => (int)$idUser,
						'keterangan' => $alasan[$i],
						'id_stok' => $ed[$i],
					);

					if($expired[$i] !== 'null'){

						$data['ed'] = $expired[$i];

					}

					$this->db->insert('sm_gizi_stok', $data);

				} else {
					$data = array(
						'transaksi' => 'Koreksi Stok',
						'id_barang' => (int)$value,
						'waktu' => date('Y-m-d H:i:s'),
						'keluar' => abs($penyesuaian[$i]),
						'id_unit' => $idUnit,
						'id_users' => $idUser,
						'keterangan' => $alasan[$i],
						'id_stok' => $ed[$i],
					);

					if($expired[$i] !== 'null'){

						$data['ed'] = $expired[$i];
						
					}

					$this->db->insert('sm_gizi_stok', $data);
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

	function getKoreksiStokGizi($id)
	{
		$this->db->select("b.id, b.hna, b.hpp, b.nama_lengkap as nama_barang, bu.id_unit, kb.nama as kategori_barang");
		$this->db->from('sm_barang as b');
		$this->db->join('sm_barang_unit as bu', 'bu.id_barang = b.id');
		$this->db->join('sm_kategori_barang as kb', 'kb.id = b.id_kategori');
		$this->db->where('bu.id_unit', (int)$this->session->userdata('id_unit'), true);
		
		if ($id !== NULL) :
			$this->db->where('b.id_kategori', (int)$id, true);
		endif;
		$this->db->order_by('b.id_kategori, b.nama', 'asc');
		$result = $this->db->get()->result();
		foreach ($result as $i => $value) :
			$this->db->select("count(*), coalesce(sum(masuk) - sum(keluar), '0.00') as sisa");
			$this->db->from('sm_gizi_stok');
			$this->db->where('id_barang', (int)$value->id, true);
			$this->db->where('id_unit', (int)$value->id_unit, true);
			$result[$i]->sisa = $this->db->get()->row()->sisa;
		endforeach;
		$data['data'] = $result;
		return $data;
	}
}