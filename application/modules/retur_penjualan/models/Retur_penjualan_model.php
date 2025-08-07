<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Retur_penjualan_model extends CI_Model {

	function __construct()
	{
		parent::__construct();
		$this->user = $this->session->userdata('id_translucent');
		$this->unit = $this->session->userdata('id_unit');
		$this->date = date('Y-m-d');
		$this->datetime = date('Y-m-d H:i:s');
		$this->load->model('pelayanan/Pelayanan_model', 'm_pelayanan');
	}

	private function sqlReturPenjualan($search)
    {
		$this->db->select("
			rp.id, rp.total, date(rp.waktu) as tanggal, ps.id as no_rm, ps.nama as nama_pasien, 
			dp.expired, dp.qty, dp.harga_jual, 
			CONCAT_WS(' ', b.nama, b.kekuatan, st.nama, COALESCE(sd.nama,''), '<small><i>', COALESCE(pb.nama,''),'</i></small>') as nama_barang, 
			stn.nama as kemasan, lp.jenis_layanan
		");
        $this->db->from('sm_retur_penjualan as rp');
		$this->db->join('sm_penjualan as pn', 'pn.id = rp.id_penjualan');
		$this->db->join('sm_detur_penjualan as dp', 'dp.id_retur_penjualan = rp.id');
		$this->db->join('sm_resep_tebus as rt', 'rt.id = pn.id_resep_tebus');
		$this->db->join('sm_resep as r', 'r.id = rt.id_resep');
		$this->db->join('sm_pasien as ps', 'ps.id = r.id_pasien');
		$this->db->join('sm_layanan_pendaftaran as lp', 'lp.id = r.id_layanan_pendaftaran');
		$this->db->join('sm_kemasan_barang as kb', 'kb.id = dp.id_kemasan_barang');
		$this->db->join('sm_barang as b', 'b.id = kb.id_barang');
		$this->db->join('sm_sediaan as sd', 'sd.id = b.id_sediaan', 'left');
		$this->db->join('sm_pabrik as pb', 'pb.id = b.id_pabrik', 'left');
		$this->db->join('sm_satuan as st', 'st.id = b.satuan_kekuatan', 'left');
		$this->db->join('sm_satuan as stn', 'stn.id = kb.id_kemasan', 'left');
		$this->db->join('sm_translucent as tr', 'tr.id = rp.id_users', 'left');

        if (($search['tanggal_awal'] !== '') & ($search['tanggal_akhir'] !== '')) :
            $this->db->where("date(rp.waktu) BETWEEN '" . date2mysql($search['tanggal_awal']) . "' AND '" . date2mysql($search['tanggal_akhir']) . "'");
		endif;
        if ($search['no_rm'] !== '') :
            $this->db->where('ps.id', $search['no_rm'], true);
        endif;
        if ($search['pasien'] !== '') :
            $this->db->where("ps.nama ilike ('" . $search["pasien"] . "%')");
        endif;
        if ($search['id_barang'] !== '') :
            $this->db->where('b.id', $search['id_barang'], true);
        endif;
		
		return $this->db->order_by('rp.id', 'desc');

    }

    private function _listReturPenjualan($limit = 0, $start = 0, $search)
    {
        $this->sqlReturPenjualan($search);
        if ($limit !== 0) :
            $this->db->limit($limit, $start);
        endif;

		return $this->db->get()->result();
        // $this->db->get(); echo $this->db->last_query(); exit();
    }

    function getListDataReturPenjualan($limit = 0, $start = 0, $search)
    {
        $result['data'] = $this->_listReturPenjualan($limit, $start, $search);
        $result['jumlah'] = $this->sqlReturPenjualan($search)->get()->num_rows();
        return $result;

        $this->db->close();
    }
		
	function simpanDataReturPenjualan()
	{
		$id_barang = safe_post('id_barang');
		if (0 < count($id_barang)) :
			$this->db->trans_begin();
			$id_penjualan = safe_post('id_penjualan');
			$id_pasien = safe_post('id_pasien');
			$id_kemasan = safe_post('id_kemasan_barang');
			$ed = safe_post('ed');
			$jumlah = safe_post("jumlah");
            $total = safe_post("total");
            $harga_jual = safe_post("harga_jual");
            $id_layanan = safe_post("id_layanan_pendaftaran");
            $jenis = safe_post("jenis");
            $reimburse = safe_post("reimburse");
            $keterangan_stok = $this->m_pelayanan->pasienName($id_layanan);

			$data_retur = array(
				'waktu' => $this->datetime,
				'id_penjualan' => $id_penjualan,
				'total' => $total,
				'id_unit' => $this->unit,
				'id_users' => $this->user,
				'id_pasien' => $id_pasien,
			);

			$this->db->insert('sm_retur_penjualan', $data_retur);
            $id_retur = $this->db->insert_id();
            if ($this->db->trans_status() === false) :
                $this->db->trans_rollback();
                $result['status'] = false;
			endif;
			$ditanggung = (int)$total * (int)$reimburse / 100;
			if ($jenis === "Poliklinik") :
                $jenis_trx = "Barang";
                $this->m_pelayanan->deletePembayaran($id_penjualan, $total, $ditanggung, $jenis_trx);
            else :
                if ($jenis === "Rawat Inap") :
                    $jenis_trx = "Rawat Inap";
                else :
                    if ($jenis === "IGD") :
                        $jenis_trx = "igd";
					endif;
                endif;
            endif;
			foreach ($id_barang as $key => $data) :
                $data_detail = array(
					'id_retur_penjualan' => $id_retur, 
					'id_kemasan_barang' => $id_kemasan[$key], 
					'expired' => $ed[$key], 
					'qty' => $jumlah[$key], 
					'harga_jual' => currencyToNumber($harga_jual[$key])
				);
                $this->db->insert('sm_detur_penjualan', $data_detail);
                if ($this->db->trans_status() === false) :
                    $this->db->trans_rollback();
                    $result['status'] = false;
				endif;
                $data_stok = array(
					'waktu' => $this->datetime, 
					'id_transaksi' => $id_retur, 
					'transaksi' => 'Retur Penjualan', 
					'id_barang' => $data, 
					'ed' => $ed[$key], 
					'masuk' => $jumlah[$key], 
					'keterangan' => $keterangan_stok, 
					'id_unit' => $this->unit, 
					'id_users' => $this->user
				);
                $this->db->insert('sm_stok', $data_stok);
				if ($this->db->trans_status() === false) :
                    $this->db->trans_rollback();
                    $result['status'] = false;
				endif;
            endforeach;
			if ($this->db->trans_status() === false) :
				$this->db->trans_rollback();
				$result['status'] = false;
			else :
				$this->db->trans_commit();
				$result['status'] = true;
			endif;
			return $result;
		endif;
	}

	function deleteDataReturPenjualan($id)
	{
		$this->db->trans_begin();
		$this->db->delete("sm_retur_penjualan", array("id" => $id));
        $this->db->delete("sm_stok", array("id_transaksi" => $id, "transaksi" => "Retur Penjualan"));
		if ($this->db->trans_status() === false) :
			$this->db->trans_rollback();
			$result['status'] = false;
		else :
			$this->db->trans_commit();
			$result['status'] = true;
		endif;
		return $result;
	}
}
