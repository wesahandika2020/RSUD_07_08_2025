<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Pemusnahan_barang_model extends CI_Model {

	function __construct()
	{
		parent::__construct();
		$this->user = $this->session->userdata('id_translucent');
		$this->unit = $this->session->userdata('id_unit');
		$this->date = date('Y-m-d');
		$this->datetime = date('Y-m-d H:i:s');
		$this->load->model('inventory/Inventory_model', 'm_inventory');
	}

	private function sqlObatED($search)
    {
		$this->db->select("
			s.*,
			concat_ws(' ',b.nama, b.kekuatan, st.nama, coalesce(sd.nama,''), '<small><i>', coalesce(pb.nama,''),'</i></small>') as nama_barang, 
            (sum(s.masuk) - sum(s.keluar)) as sisa, b.hpp, u.nama as unit, kb.id as id_kemasan, stn.nama as nama_kemasan
		");

		$this->db->from('sm_stok as s');
		$this->db->join('sm_barang as b', 'b.id = s.id_barang');
		$this->db->join('sm_kemasan_barang as kb', 'kb.id_barang = b.id');
		$this->db->join('sm_satuan as stn', 'stn.id = kb.id_kemasan');
		$this->db->join('sm_sediaan as sd', 'sd.id = b.id_sediaan', 'left');
		$this->db->join('sm_satuan as st', 'st.id = b.satuan_kekuatan', 'left');
		$this->db->join('sm_pabrik as pb', 'pb.id = b.id_pabrik', 'left');
		$this->db->join('sm_unit as u', 'u.id = s.id_unit');
		$this->db->where('kb.default_kemasan', '1', true);
		$this->db->where("s.ed < '" . $this->date . "'");
        if ($search['barang'] !== '') :
            $this->db->where("b.nama ilike ('" . $search["barang"] . "%')");
        endif;
		if ($this->unit !== '') :
			$this->db->where('s.id_unit', $this->unit, true);
		endif;
		$this->db->group_by('
			s.id_barang, s.id, s.ed, s.id_unit, b.nama, b.kekuatan, stn.nama, st.nama,
			sd.nama, pb.nama, b.hpp, u.nama, kb.id
		');
		$this->db->having('sum(s.masuk) - sum(s.keluar) > 0');
		return $this->db->order_by('b.nama', 'asc');
    }

    private function _listObatED($limit = 0, $start = 0, $search)
    {
        $this->sqlObatED($search);
        if ($limit !== 0) :
            $this->db->limit($limit, $start);
        endif;
		return $this->db->get()->result();
        // $this->db->get(); echo $this->db->last_query(); exit();
    }

    function getListDataObatED($limit = 0, $start = 0, $search)
    {
        $result['data'] = $this->_listObatED($limit, $start, $search);
        $result['jumlah'] = $this->sqlObatED($search)->get()->num_rows();
        return $result;
        $this->db->close();
    }
	
	private function sqlPemusnahanBarang($search)
    {
		$this->db->select("
			p.*, u.nama as unit, tr.account as user, coalesce(pgu.nama, '') as nama_user
		");
		$this->db->from('sm_pemusnahan as p');
		$this->db->join('sm_detail_pemusnahan as dp', 'dp.id_pemusnahan = p.id');
		$this->db->join('sm_kemasan_barang as kb', 'kb.id = dp.id_kemasan_barang');
		$this->db->join('sm_barang as b', 'b.id = kb.id_barang');
		$this->db->join('sm_unit as u', 'u.id = p.id_unit');
		$this->db->join('sm_translucent as tr', 'tr.id = p.id_users');
		$this->db->join('sm_pegawai as pgu', 'pgu.id = p.id_users', 'left');
		if (($search['tanggal_awal'] !== '') & ($search['tanggal_akhir'] !== '')) :
            $this->db->where("p.tanggal BETWEEN '" . date2mysql($search['tanggal_awal']) . " 00:00:00' AND '" . date2mysql($search['tanggal_akhir']) . " 23:59:59'");
        endif;
		if ($search['barang'] !== '') :
			$this->db->where('b.id', $search['barang'], true);
		endif;
		return $this->db->order_by('p.id, p.tanggal', 'desc');
    }

    private function _listPemusnahanBarang($limit = 0, $start = 0, $search)
    {
        $this->sqlPemusnahanBarang($search);
        if ($limit !== 0) :
            $this->db->limit($limit, $start);
        endif;
		return $this->db->get()->result();
    }

    function getListDataPemusnahanBarang($limit = 0, $start = 0, $search)
    {
        $result['data'] = $this->_listPemusnahanBarang($limit, $start, $search);
        $result['jumlah'] = $this->sqlPemusnahanBarang($search)->get()->num_rows();
        return $result;
        $this->db->close();
    }

	function generateKodePemusnahanBarang()
    {
        $tahun = date('Y');
        $bulan = date('m');
        $row = $this->db->query("select kode from sm_pemusnahan where date_part('month', tanggal) = ".$bulan." and date_part('year', tanggal) = ".$tahun." and kode is not NULL order by kode desc limit 1")->row();
        if ($row) :
            $kode = explode('/', $row->kode);
            $get_kode = $kode[3];
        endif;
        if (!isset($get_kode)) {
            $auto = "0001";
        } else {
            $auto = str_pad((string) ($get_kode + 1), 4, "0", STR_PAD_LEFT);
        }
        $result = "GD/HPS/" . $tahun . "-" . $bulan . "/" . $auto;
        return $result;
    }

	function simpanDataPemusnahanBarang()
	{
		$this->db->trans_begin();
		$status = false;
		$message = "Gagal menyimpan data pemusnahan barang";
		$id_barang = safe_post('id_barang');
		$ed = safe_post('ed');
		$jumlah = safe_post('jumlah');

		if (is_array($id_barang)) :
			$this->db->insert('sm_pemusnahan', [
				'tanggal' => $this->datetime,
				'kode' => $this->generateKodePemusnahanBarang(),
				'id_unit' => $this->unit,
				'id_users' => $this->user
			]);
			$id_pemusnahan = $this->db->insert_id();
			if ($this->db->trans_status() === false) :
				$this->db->trans_rollback();
				$result['status'] = $status;
				$result['message'] = $message;
			endif;
			foreach ($id_barang as $i => $data) :
				$barang = $this->db->query("
					select b.hpp, kb.id as id_kemasan_barang
					from sm_barang as b 
					join sm_kemasan_barang as kb on (kb.id_barang = b.id) 
					where kb.id_barang = '" . $data . "' and kb.default_kemasan = '1'")->row();
				$detail = [
					'id_pemusnahan' => $id_pemusnahan,
					'id_kemasan_barang' => $barang->id_kemasan_barang,
					'ed' => $ed[$i],
					'jumlah' => $jumlah[$i],
					'hpp' => $barang->hpp
				];
				$this->db->insert('sm_detail_pemusnahan', $detail);
				if ($this->db->trans_status() === false) :
					$this->db->trans_rollback();
					$result['status'] = $status;
					$result['message'] = $message;
				endif;
				$stok = [
					'waktu' => $this->datetime,
					'id_transaksi' => $id_pemusnahan,
					'transaksi' => 'Pemusnahan',
					'id_barang' => $data,
					'ed' => $ed[$i],
					'keluar' => $jumlah[$i],
					'keterangan' => $this->m_inventory->namaUnit($this->unit),
					'id_unit' => $this->unit,
					'id_users' => $this->user
				];
				$this->db->insert('sm_stok', $stok);
				if ($this->db->trans_status() === false) :
					$this->db->trans_rollback();
					$result['status'] = $status;
					$result['message'] = $message;
				endif;
			endforeach;
			if ($this->db->trans_status() === false) :
				$this->db->trans_rollback();
				$result['status'] = $status;
				$result['message'] = $message;
			else :
				$this->db->trans_commit();
				$status = true;
				$message = "Berhasil menyimpan data pemusnahan barang";
				$result['status'] = $status;
				$result['message'] = $message;
			endif;
		else :
			$this->db->trans_rollback();
			$result['status'] = $status;
			$result['message'] = $message;
		endif;
		return $result;
	}

	function deleteDataPemusnahanBarang($id)
	{
		$this->db->trans_begin();
		$message = "Gagal menghapus data pemusnahan barang";
		$this->db->delete("sm_pemusnahan", array("id" => $id));
		$this->db->delete("sm_detail_pemusnahan", array("id_pemusnahan" => $id));
        $this->db->delete("sm_stok", array("id_transaksi" => $id, "transaksi" => "Pemusnahan"));
		if ($this->db->trans_status() === false) :
			$this->db->trans_rollback();
			$result['status'] = false;
		else :
			$this->db->trans_commit();
			$result['status'] = true;
			$result['message'] = "Berhasil menghapus data pemusnahan barang";
		endif;

		$result['message'] = $message;
		return $result;
	}

	function getDataPemusnahanBarang($id_pemusnahan)
    {
        $sql = "select p.*, 
                concat_ws(' ',b.nama, b.kekuatan, st.nama, coalesce(sd.nama, ''), '<small><i>', coalesce(pb.nama,''), '</i></small>') as nama_barang, 
                dp.jumlah, stn.nama as kemasan, dp.ed 
                from sm_pemusnahan p 
                join sm_detail_pemusnahan dp on (dp.id_pemusnahan = p.id) 
                join sm_kemasan_barang kb on (dp.id_kemasan_barang = kb.id) 
                join sm_barang b on (kb.id_barang = b.id) 
                join sm_satuan stn on (kb.id_kemasan = stn.id) 
                left join sm_satuan st on (b.satuan_kekuatan = st.id) 
                left join sm_sediaan sd on (b.id_sediaan = sd.id) 
                left join sm_pabrik pb on (b.id_pabrik = pb.id) 
                where p.id = '" . $id_pemusnahan . "'";
        return $this->db->query($sql);
    }
}
