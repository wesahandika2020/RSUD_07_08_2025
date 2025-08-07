<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Distribusi_barang_produksi_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->date = date('Y-m-d');
		$this->datetime = date('Y-m-d H:i:s');
		$this->unit = 327;
		$this->user = $this->session->userdata('id_translucent');
		$this->load->model('inventory/Inventory_model', 'm_inventory');
	}

	function simpanDataDistribusi()
	{
		$this->db->trans_begin();
		$id_distribusi = safe_post('id');
		$unit_kirim = $this->db->select('id_unit_asal')->from('sm_distribusi')->where('id', $id_distribusi)->get()->row();
		$ket_unit = $this->m_inventory->namaUnit($unit_kirim->id_unit_asal);
		$kode_distribusi = $this->generateKodeDistribusi();

		$data = array(
			'kode_dikirim' => $kode_distribusi,
			'tanggal_dikirim' => $this->date,
			'id_users' => $this->user,
			'updated_date' => $this->datetime,
		);
		$this->db->where('id', $id_distribusi, true)->update('sm_distribusi', $data);
		if ($this->db->trans_status() === false) :
			$this->db->trans_rollback();
			$result['status'] = false;
		endif;
		$id_detail_distribusi = safe_post('id_detail_distribusi');
		$id_kemasan = safe_post('id_kemasan');
		$id_barang = safe_post('id_barang');
		$jumlah_dikirim = safe_post('jumlah');
		foreach ($id_detail_distribusi as $i => $data) :
			$barang = $this->db->query("select hna, hpp from sm_barang where id = '".$id_barang[$i]."'")->row();
			$data_detail = array(
				'jumlah_dikirim' => $jumlah_dikirim[$i],
				'hna' => $barang->hna,
				'hpp' => $barang->hpp,
			);
			$this->db->where('id', $data, true)->update('sm_detail_distribusi', $data_detail);

			// hitung stok keluar
			$kemasan = $this->db->query("select (isi * isi_satuan) as isi, id_barang from sm_kemasan_barang where id_barang = '".$id_barang[$i]."' and id = '".$id_kemasan[$i]."'")->row();
			$stok = $this->db->query("select sum(masuk) - sum(keluar) as sisa, ed, id_barang from sm_stok where id_barang = '".$id_barang[$i]."' and ed > '".$this->date."' and id_unit = '".$this->unit."' group by ed, id_barang having sum(masuk) - sum(keluar) > 0 order by ed asc")->result();
			$use = $jumlah_dikirim[$i] * $kemasan->isi;
			if (is_array($stok)) :
				foreach ($stok as $i => $val) :
					$use = $val->sisa - abs($use);
					if ($use <= 0) :
						$keluar = $val->sisa;
					else :
						$keluar = abs($use - $val->sisa);
					endif;

					$data_stok = array(
						'waktu'        => $this->datetime,
						'id_transaksi' => $id_distribusi,
						'transaksi'    => 'Distribusi',
						'id_barang'    => $val->id_barang,
						'ed'           => isset($val->ed) ? $val->ed : NULL,
						'keluar'       => $keluar,
						'keterangan'   => $ket_unit,
						'id_unit'      => $this->unit,
						'id_users'     => $this->user
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
			endif;
		endforeach;
		if ($this->db->trans_status() === false) :
			$this->db->trans_rollback();
			$result['status'] = false;
		else :
			$this->db->trans_commit();
			$result['id'] = $id_distribusi;
			$result['status'] = true;
		endif;
		return $result;
	}

	function getListDataDistribusi($limit = 0, $start = 0, $search)
	{
		$result['data'] = $this->_listDistribusi($limit, $start, $search);
		$result['jumlah'] = $this->sqlDistribusi($search)->get()->num_rows();
		return $result;
	}

	private function _listDistribusi($limit, $start, $search)
	{
		$this->sqlDistribusi($search);
		if ($limit !== 0) :
			$this->db->limit($limit, $start);
		endif;

		$result = $this->db->get()->result();
		foreach ($result as $i => $value) :
			$this->db->select("sum(kb.isi * kb.isi_satuan * dd.hpp * dd.jumlah_dikirim) as total");
			$this->db->from('sm_detail_distribusi as dd');
			$this->db->join('sm_kemasan_barang as kb', 'kb.id = dd.id_kemasan_barang');
			$this->db->where('dd.id_distribusi', $value->id, true);
			$result[$i]->total = $this->db->get()->row()->total;
		endforeach;
		return $result;
	}

	private function sqlDistribusi($search)
	{
		$this->db->select("DISTINCT ON (d.id)
			d.*, u.nama as unit_asal, un.nama as unit_tujuan
		");
		$this->db->from('sm_distribusi as d');
		$this->db->join('sm_unit as u', 'u.id = d.id_unit_asal');
		$this->db->join('sm_unit as un', 'un.id = d.id_unit_tujuan');
		$this->db->join('sm_translucent as tr', 'tr.id = d.id_users', 'left');
		$this->db->where('d.id_unit_tujuan', 327, true);
		if (isset($search['tanggal_awal_minta']) && isset($search['tanggal_akhir_minta'])) :
			if (($search['tanggal_awal_minta'] !== '') & ($search['tanggal_akhir_minta'] !== '')) :
				$this->db->where("d.tanggal_permintaan BETWEEN '" . date2mysql($search['tanggal_awal_minta']) . "' AND '" . date2mysql($search['tanggal_akhir_minta']) . "'");
			endif;
		endif;
		if (isset($search['tanggal_awal_kirim']) && isset($search['tanggal_akhir_kirim'])) :
			if (($search['tanggal_awal_kirim'] !== '') & ($search['tanggal_akhir_kirim'] !== '')) :
				$this->db->where("d.tanggal_kirim BETWEEN '" . date2mysql($search['tanggal_awal_kirim']) . "' AND '" . date2mysql($search['tanggal_akhir_kirim']) . "'");
			endif;
		endif;
		if (isset($search['kategori_barang']) && $search['kategori_barang'] !== '') :
			$this->db->where('b.id_kategori', $search['kategori_barang'], true);
			$this->db->join('sm_detail_distribusi as dd', 'dd.id_distribusi = d.id');
			$this->db->join('sm_kemasan_barang as kb', 'kb.id = dd.id_kemasan_barang');
			$this->db->join('sm_barang as b', 'b.id = kb.id_barang');
		endif;
		if (isset($search['status']) && $search['status'] !== '') :
			if ($search['status'] === 'Belum') :
				$this->db->where('d.tanggal_dikirim is NULL');
			endif;
			if ($search['status'] === 'Sudah') :
				$this->db->where('d.tanggal_dikirim is NOT NULL');
			endif;
		endif;
		if (isset($search['unit']) && $search['unit'] !== '') :
			$this->db->where('d.id_unit_asal', $search['unit'], true);
		endif;
		if (isset($search['no_distribusi']) && $search['no_distribusi'] !== '') :
			$this->db->where("d.kode ilike '%" . $search["no_distribusi"] . "%'");
		endif;

		return $this->db->order_by('d.id', 'desc');
	}

	function generateKodeDistribusi()
	{
		$tahun = date('Y');
		$bulan = date('m');
		$row = $this->db->query("select kode_dikirim from sm_distribusi where date_part('month', tanggal_dikirim) = ".$bulan." and date_part('year', tanggal_dikirim) = ".$tahun." and kode_dikirim is not NULL order by kode_dikirim desc limit 1")->row();
		if ($row) :
			$kode = explode('/', $row->kode_dikirim);
			$get_kode = $kode[3];
		endif;
		if (!isset($get_kode)) {
			$auto = "0001";
		} else {
			$auto = str_pad((string) ($get_kode + 1), 4, "0", STR_PAD_LEFT);
		}
		$result = "GD/MU/" . $tahun . "-" . $bulan . "/" . $auto;
		return $result;
	}

	function getDataDistribusi($id)
	{
		$sql = "select d.*, dd.jumlah, dd.jumlah_dikirim,
				CONCAT_WS(' ', b.nama, b.kekuatan, s.nama, COALESCE(sd.nama, ''), '<small><i>', COALESCE(pb.nama, ''),'</i></small>') as nama_barang, st.nama as kemasan,
				u.nama as unit_asal, un.nama as unit_tujuan
				from sm_distribusi as d
				join sm_detail_distribusi as dd on (dd.id_distribusi = d.id)
				join sm_unit as u on (u.id = d.id_unit_asal)
				join sm_unit as un on (un.id = d.id_unit_tujuan)
				join sm_kemasan_barang as kb on (kb.id = dd.id_kemasan_barang)
				join sm_barang as b on (b.id = kb.id_barang)
				left join sm_sediaan as sd on (sd.id = b.id_sediaan)
				left join sm_satuan as s on (s.id = b.satuan_kekuatan)
				left join sm_satuan as st on (st.id = kb.id_kemasan)
				left join sm_pabrik as pb on (pb.id = b.id_pabrik)
				where d.id = '".$id."' 
				group by d.id, dd.jumlah, dd.jumlah_dikirim, b.nama, b.kekuatan, s.nama, st.nama, sd.nama, pb.nama, u.nama, un.nama, b.id
				order by d.id desc";
		return $this->db->query($sql)->result();
	}

	function getDataDistribusiCetak($id)
	{
		$sql = "select d.*, sum(dd.jumlah_dikirim) as jumlah,
				CONCAT_WS(' ', b.nama, b.kekuatan, s.nama, COALESCE(sd.nama, ''), '<small><i>', COALESCE(pb.nama, ''),'</i></small>') as nama_barang,
				u.nama as unit_asal, un.nama as unit_tujuan, kbg.nama as kategori_barang,
				kb.isi, kb.isi_satuan, dd.hna, dd.hpp,
				(
					select s.nama 
					from sm_kemasan_barang as k 
					join sm_satuan as s on (s.id = k.id_kemasan) 
					where k.id_barang = b.id order by (k.isi * k.isi_satuan) asc limit 1
				) as kemasan
				from sm_distribusi as d
				join sm_detail_distribusi as dd on (dd.id_distribusi = d.id)
				join sm_unit as u on (u.id = d.id_unit_asal)
				join sm_unit as un on (un.id = d.id_unit_tujuan)
				join sm_kemasan_barang as kb on (kb.id = dd.id_kemasan_barang)
				join sm_barang as b on (b.id = kb.id_barang)
				left join sm_kategori_barang as kbg on (kbg.id = b.id_kategori)
				left join sm_sediaan as sd on (sd.id = b.id_sediaan)
				left join sm_satuan as s on (s.id = b.satuan_kekuatan)
				left join sm_pabrik as pb on (pb.id = b.id_pabrik)
				where d.id = '".$id."' 
				group by d.id, b.nama, b.kekuatan, s.nama, sd.nama, pb.nama, u.nama, un.nama, kbg.nama, kb.isi, kb.isi_satuan, dd.hna, dd.hpp, b.id
				order by d.id desc";
		return $this->db->query($sql)->result();
	}
}
