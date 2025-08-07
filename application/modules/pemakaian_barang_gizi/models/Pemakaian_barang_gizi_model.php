<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Pemakaian_barang_gizi_model extends CI_Model {

	function __construct()
	{
		parent::__construct();
		$this->user = $this->session->userdata('id_translucent');
		$this->unit = $this->session->userdata('id_unit');
		date_default_timezone_set('Asia/Jakarta');
		$this->date = date('Y-m-d');
		$this->datetime = date('Y-m-d H:i:s');
		$this->load->model('inventori_rt/Inventori_rt_model', 'inventori');
	}
	
	private function sqlPemakaianBarangGizi($search)
    {	
    	date_default_timezone_set('Asia/Jakarta');
		$this->db->select("
			s.id, s.id_barang, s.waktu, s.transaksi, s.keluar, s.id_stok, 
			b.nama_lengkap as nama_barang, tr.account as user, coalesce(pgu.nama, '') as nama_user
		");
		$this->db->from('sm_gizi_stok as s');
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

    private function _listPemakaianBarangGizi($limit = 0, $start = 0, $search)
    {
        $this->sqlPemakaianBarangGizi($search);
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

    function getListDataPemakaianBarangGizi($limit = 0, $start = 0, $search)
    {
        $result['data'] = $this->_listPemakaianBarangGizi($limit, $start, $search);
        $result['jumlah'] = $this->sqlPemakaianBarangGizi($search)->get()->num_rows();
        return $result;
        $this->db->close();
    }

	function simpanDataPemakaianBarangGizi()
	{
		$this->db->trans_begin();
		$id_barang = safe_post('id_barang');
		$jumlah = safe_post('jumlah');
		foreach ($id_barang as $i => $val) :
			$this->db->select("DISTINCT ON (id_stok) sum(masuk) - sum(keluar) as sisa, id_stok, id_barang, ed ")->from('sm_gizi_stok');
			$this->db->where('id_barang', $val, true);
			$this->db->where('id_unit', $this->unit, true);
			$this->db->group_by('id_stok, id_barang, ed');
			$this->db->having('sum(masuk) - sum(keluar) > 0');
			$this->db->order_by('id_stok', 'asc');
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
						'id_barang' => (int)$row->id_barang,
						'ed' => isset($row->ed) ? $row->ed : NULL,
						'id_stok' => isset($row->id_stok) ? $row->id_stok : NULL,
						'keluar' => $keluar,
						'keterangan' => $this->session->userdata('unit'),
						'id_unit' => (int)$this->unit,
						'id_users' => (int)$this->user,
					);
					$this->db->insert('sm_gizi_stok', $stok);
					if ($this->db->trans_status() === false) :
						$this->db->trans_rollback();
						$result['status'] = false;
						$result['message'] = 'Gagal menyimpan data pemakaian barang gizi';
					endif;

					if (0 <= $use) :
						break;
					endif;
				endforeach;
				if ($this->db->trans_status() === false) :
					$this->db->trans_rollback();
					$result['status'] = false;
					$result['message'] = 'Gagal menyimpan data pemakaian barang gizi';
				else :
					$this->db->trans_commit();
					$result['status'] = true;
					$result['message'] = 'Berhasil menyimpan data pemakaian barang gizi';
				endif;
			endif;
		endforeach;
		return $result;
	}
	
	function deleteDataPemakaianBarangGizi($id)
	{
		$this->db->trans_begin();
		$this->db->delete('sm_gizi_stok', ['id' => $id]);
		if ($this->db->trans_status() === false) :
			$this->db->trans_rollback();
			$result['status'] = false;
			$result['message'] = 'Gagal menghapus data pemakaian barang gizi';
		else :
			$this->db->trans_commit();
			$result['status'] = true;
			$result['message'] = 'Berhasil menghapus data pemakaian barang gizi';
		endif;
		return $result;
	}

	function getAutoBarangStokGizi($search, $start, $limit)
    {

    	date_default_timezone_set('Asia/Jakarta');
        $q = NULL;
        $having = NULL;
        if ($search["penjamin"] !== "") :
        endif;
        if ($search["cekstok"] !== "") :
        endif;
        if ($search["is_farmasi"] !== "") :
            $q .= " and kb.jenis = 'Farmasi'";
        endif;

        $check = $this->db->query("select id_unit_default from sm_unit where id = '" . $this->session->userdata("id_unit") . "'")->row();
        if ($check->id_unit_default === NULL) :
            $id_unit = $this->session->userdata("id_unit");
        else :
            $id_unit = $check->id_unit_default;
        endif;

        $limitation = " limit " . $limit . " offset " . $start;
        $order = " order by b.nama";
        $select = "select b.*, bu.id_unit, b.nama_lengkap as nama,
                    COALESCE(s.nama,'') as satuan_kekuatan, 
                    (b.hpp+(b.hpp*(b.margin_resep/100))) as harga_jual ";
        $count = "select count(*) as count ";
        $sql = "from sm_barang b
                join sm_barang_unit bu on (bu.id_barang = b.id)
                join sm_kategori_barang kb on (b.id_kategori = kb.id)
                left join sm_satuan s on (b.satuan_kekuatan = s.id)
                join sm_kemasan_barang k on (k.id_barang = b.id)
                join sm_satuan stn on (k.id_kemasan = stn.id)
                left join sm_sediaan sd on (b.id_sediaan = sd.id)
                left join sm_pabrik pb on (b.id_pabrik = pb.id)
                where k.default_kemasan = '1'
                and kb.irt = 2
                and b.is_active = 'Ya'
                and bu.id_unit = " . $id_unit . "
                and b.nama ilike ('" . $search["search"] . "%') " . $q;
        $result = $this->db->query($select . $sql . $order . $limitation)->result();
        foreach ($result as $key => $value) :
            $sql_child = "select COALESCE(SUM(masuk)-SUM(keluar), 0.00) as sisa
                        from sm_gizi_stok
                        where id_barang = '" . $value->id . "'
                        and id_unit = '" . $value->id_unit . "'";
            $result[$key]->sisa = $this->db->query($sql_child)->row()->sisa;
        endforeach;

        $data["data"] = $result;
        $data["total"] = $this->db->query($count . $sql)->row()->count;
        return $data;
    }

    
}
