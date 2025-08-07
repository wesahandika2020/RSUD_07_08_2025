<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Retur_penerimaan_model extends CI_Model {

	function __construct()
	{
		parent::__construct();
		$this->user = $this->session->userdata('id_translucent');
		$this->unit = $this->session->userdata('id_unit');
		$this->date = date('Y-m-d');
		$this->datetime = date('Y-m-d H:i:s');
	}

	private function sqlReturPenerimaan($search)
    {
		$this->db->select("
			rp.*, pn.no_faktur, dp.no_batch, dp.expired, dp.jumlah, dp.diskon_rp, dp.diskon_pr, dp.hpp, dp.keterangan,
			CONCAT_WS(' ', b.nama, b.kekuatan, st.nama, COALESCE(sd.nama,''), '<small><i>', COALESCE(pb.nama,''),'</i></small>') as nama_barang, 
			COALESCE(s.nama,'-') as supplier, stn.nama as kemasan 
		");
        $this->db->from('sm_retur_penerimaan as rp');
		$this->db->join('sm_penerimaan as pn', 'pn.id = rp.id_penerimaan');
		$this->db->join('sm_detur_penerimaan as dp', 'dp.id_retur_penerimaan = rp.id');
		$this->db->join('sm_kemasan_barang as kb', 'kb.id = dp.id_kemasan_barang');
		$this->db->join('sm_barang as b', 'b.id = kb.id_barang');
		$this->db->join('sm_sediaan as sd', 'sd.id = b.id_sediaan', 'left');
		$this->db->join('sm_pabrik as pb', 'pb.id = b.id_pabrik', 'left');
		$this->db->join('sm_satuan as st', 'st.id = b.satuan_kekuatan', 'left');
		$this->db->join('sm_satuan as stn', 'stn.id = kb.id_kemasan', 'left');
		$this->db->join('sm_supplier as s', 's.id = rp.id_supplier', 'left');
		$this->db->join('sm_translucent as tr', 'tr.id = rp.id_users', 'left');

        if (($search['tanggal_awal'] !== '') & ($search['tanggal_akhir'] !== '')) :
            $this->db->where("rp.tanggal BETWEEN '" . date2mysql($search['tanggal_awal']) . "' AND '" . date2mysql($search['tanggal_akhir']) . "'");
		endif;
        if ($search['no_faktur'] !== '') :
            $this->db->where('pn.no_faktur', $search['no_faktur'], true);
        endif;
        if ($search['id_barang'] !== '') :
            $this->db->where('b.id', $search['id_barang'], true);
        endif;
        if ($search['supplier'] !== '') :
            $this->db->where('rp.id_supplier', $search['supplier'], true);
        endif;
		
		return $this->db->order_by('rp.id', 'desc');

    }

    private function _listReturPenerimaan($limit = 0, $start = 0, $search)
    {
        $this->sqlReturPenerimaan($search);
        if ($limit !== 0) :
            $this->db->limit($limit, $start);
        endif;

		return $this->db->get()->result();
        // $this->db->get(); echo $this->db->last_query(); exit();
    }

    function getListDataReturPenerimaan($limit = 0, $start = 0, $search)
    {
        $result['data'] = $this->_listReturPenerimaan($limit, $start, $search);
        $result['jumlah'] = $this->sqlReturPenerimaan($search)->get()->num_rows();
        return $result;

        $this->db->close();
    }
		
	function simpanDataReturPenerimaan()
	{
		$this->db->trans_begin();
		$tanggal_return = safe_post('tanggal_retur') !== '' ? date2mysql(safe_post('tanggal_retur')) : $this->date;
		$id_supplier = safe_post('id_supplier');
		$id_penerimaan = safe_post('id_penerimaan');
		$nama_supplier = safe_post('supplier');
		$id_barang = safe_post('id_barang');
		$id_kemasan = safe_post('id_kemasan');
		$no_batch = safe_post('nobatch');
		$ed = safe_post('ed');
		$jml = safe_post('jml');
		$hpp = safe_post('hpp');
		$diskon_pr = safe_post('diskon_pr');
		$diskon_rp = safe_post('diskon_rp');
		$keterangan = safe_post('keterangan');
		
		$data_retur = array(
			'id_penerimaan' => $id_penerimaan,
			'tanggal' => $tanggal_return,
			'id_supplier' => $id_supplier,
			'id_users' => $this->user,	
		);
		$this->db->insert('sm_retur_penerimaan', $data_retur);
		$id_retur_penerimaan = $this->db->insert_id();
		if ($this->db->trans_status() === false) :
			$this->db->trans_rollback();
			$resutl['status'] = false;
		endif;
		$total_hpp = 0;
		if (is_array($id_barang)) :
			foreach ($id_barang as $i => $val) :
				$data_detail = array(
					'id_retur_penerimaan' => $id_retur_penerimaan,
					// 'id_barang' => $id_barang[$i],
					'id_kemasan_barang' => $id_kemasan[$i],
					'no_batch' => $no_batch[$i],
					'expired' => date2mysql($ed[$i]),
					'jumlah' => $jml[$i],
					'diskon_pr' => $diskon_pr[$i],
					'diskon_rp' => currencyToNumber($diskon_rp[$i]),
					'hpp' => currencyToNumber($hpp[$i]),
					'keterangan' => $keterangan[$i],
				);

				$this->db->insert('sm_detur_penerimaan', $data_detail);
				$total = currencyToNumber($hpp[$i]) * $jml[$i];
				$total_hpp = $total_hpp + currencyToNumber($hpp[$i]) * $jml[$i];
				if ($this->db->trans_status() === false) :
					$this->db->trans_rollback();
					$resutl['status'] = false;
				endif;

				// insert ke history stok
				$kemasan_barang = $this->db->query("select * from sm_kemasan_barang where id = '" . $id_kemasan[$i] . "'")->row();
				$data_stok = array(
                    'waktu' => $tanggal_return . ' ' . date('H:i:s'), 
                    'id_transaksi' => $id_retur_penerimaan, 
                    'transaksi' => 'Retur Penerimaan', 
                    'no_batch' => $no_batch[$i], 
                    'id_barang' => $val, 
                    'ed' => date2mysql($ed[$i]), 
                    'masuk' => 0,
                    'keluar' => $jml[$i] * $kemasan_barang->isi * $kemasan_barang->isi_satuan,
                    'keterangan' => $nama_supplier,
                    'id_unit' => $this->unit, 
                    'id_users' => $this->user, 
                );
                $this->db->insert('sm_stok', $data_stok);
                if ($this->db->trans_status() === false) :
                    $this->db->trans_rollback();
                    $result['status'] = false;
                endif;
			endforeach;
		endif;
		if ($this->db->trans_status() === false) :
			$this->db->trans_rollback();
			$result['status'] = false;
		else :
			$this->db->trans_commit();
			$result['status'] = true;
		endif;
		return $result;
	}

	function deleteDataReturPenerimaan($id)
	{
		$this->db->trans_begin();
		$this->db->delete("sm_retur_penerimaan", array("id" => $id));
        $this->db->delete("sm_stok", array("id_transaksi" => $id, "transaksi" => "Retur Penerimaan"));
		if ($this->db->trans_status() === false) :
			$this->db->trans_rollback();
			$result['status'] = false;
		else :
			$this->db->trans_commit();
			$result['status'] = true;
		endif;
		return $result;
	}

	function getDataReturPenerimaanCetak($id)
	{
		$this->db->select("
			rp.*, pn.no_faktur, dp.no_batch, dp.expired, dp.jumlah, dp.diskon_rp, dp.diskon_pr, dp.hpp, dp.keterangan,
			CONCAT_WS(' ', b.nama, b.kekuatan, st.nama, COALESCE(sd.nama,''), '<small><i>', COALESCE(pb.nama,''),'</i></small>') as nama_barang, 
			COALESCE(s.nama,'-') as supplier, stn.nama as kemasan 
		");
        $this->db->from('sm_retur_penerimaan as rp');
		$this->db->join('sm_penerimaan as pn', 'pn.id = rp.id_penerimaan');
		$this->db->join('sm_detur_penerimaan as dp', 'dp.id_retur_penerimaan = rp.id');
		$this->db->join('sm_kemasan_barang as kb', 'kb.id = dp.id_kemasan_barang');
		$this->db->join('sm_barang as b', 'b.id = kb.id_barang');
		$this->db->join('sm_sediaan as sd', 'sd.id = b.id_sediaan', 'left');
		$this->db->join('sm_pabrik as pb', 'pb.id = b.id_pabrik', 'left');
		$this->db->join('sm_satuan as st', 'st.id = b.satuan_kekuatan', 'left');
		$this->db->join('sm_satuan as stn', 'stn.id = kb.id_kemasan', 'left');
		$this->db->join('sm_supplier as s', 's.id = rp.id_supplier', 'left');
		$this->db->join('sm_translucent as tr', 'tr.id = rp.id_users', 'left');
		$this->db->where('rp.id', $id, true);
		return $this->db->get()->result();
	}
}
