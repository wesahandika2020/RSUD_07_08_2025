<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Penjualan_non_resep_model extends CI_Model {
	
	function __construct()
	{
		parent::__construct();
		$this->date = date('Y-m-d');
		$this->datetime = date('Y-m-d H:i:s');
	}

	private function sqlPenjualan($search)
    {
		$this->db->select("penj.*, penj.id_pasien,
			(penj.total + penj.toeslag) as total2
		");
		$this->db->from('sm_penjualan as penj');
		$this->db->where('penj.jenis', 'Bebas', true);
		
		if (isset($search['id']) && $search['id'] !== '') :
			$this->db->where('penj.id', $search['id'], true);
		endif;
		if (($search['tanggal_awal'] !== '') & ($search['tanggal_akhir'] !== '')) :
            $this->db->where("penj.waktu BETWEEN '" . date2mysql($search['tanggal_awal']) . " 00:00:00' AND '" . date2mysql($search['tanggal_akhir']) . " 23:59:59'");
		endif;
		if (isset($search['no_rm']) && $search['no_rm'] !== '') :
			$this->db->where('penj.id_pasien', $search['no_rm'], true);
		endif;
		if (isset($search['pembeli']) && $search['pembeli'] !== '') :
			$this->db->where('penj.pembeli ilike "%'.$search['nama'].'%"');
		endif;
		if (isset($search['barang']) && $search['barang'] !== '') :
			$this->db->join('sm_detail_penjualan as dpenj', 'dpenj.id_penjualan = penj.id');
			$this->db->join('sm_kemasan_barang as kb', 'kb.id = dpenj.id_kemasan');
			$this->db->join('sm_barang as b', 'b.id = kb.id_barang');
			$this->db->join('sm_satuan as stn', 'stn.id = b.satuan_kekuatan', 'left');
			$this->db->join('sm_sediaan as sd', 'sd.id = b.id_sediaan', 'left');
			$this->db->join('sm_pabrik as pb', 'pb.id = b.id_pabrik', 'left');
			$this->db->join('sm_satuan as st', 'st.id = kb.id_kemasan');

			$this->db->where('b.id', $search['barang'], true);
		endif;

		if (isset($search['status']) && $search['status'] !== '') {
			if ($search['status'] === 'Belum') :
				$this->db->where('penj.bayar !=', 0);
			endif;
			if ($search['status'] === 'Sudah') :
				$this->db->where('penj.bayar !=', 0);
			endif;
		}

		return $this->db->order_by('penj.waktu', 'desc');
    }

    private function _listPenjualan($limit = 0, $start = 0, $search)
    {
        $this->sqlPenjualan($search);
        if ($limit !== 0) :
            $this->db->limit($limit, $start);
        endif;

		$result = $this->db->get()->result();
		foreach ($result as $i => $val) :
			$this->db->select("
				dpenj.qty, stn.nama as kemasan, dpenj.harga_jual, dpenj.hna, dpenj.disc_rp, dpenj.disc_pr,
				CONCAT_WS(' ', b.nama, b.kekuatan, stn.nama, COALESCE(sd.nama, ''), '<small><i>', COALESCE(pb.nama, ''), '</i></small>') as nama_barang,
				CONCAT_WS(' ', b.nama, b.kekuatan, stn.nama, COALESCE(sd.nama, '')) as nama_barang2,
				(dpenj.qty * (dpenj.harga_jual - dpenj.disc_rp)) as subtotal
			");
			$this->db->from('sm_detail_penjualan as dpenj');
			$this->db->join('sm_kemasan_barang as kb', 'kb.id = dpenj.id_kemasan');
			$this->db->join('sm_barang as b', 'b.id = kb.id_barang');
			$this->db->join('sm_satuan as stn', 'stn.id = b.satuan_kekuatan', 'left');
			$this->db->join('sm_sediaan as sd', 'sd.id = b.id_sediaan', 'left');
			$this->db->join('sm_pabrik as pb', 'pb.id = b.id_pabrik', 'left');
			$this->db->join('sm_satuan as st', 'st.id = kb.id_kemasan');
			$this->db->where('dpenj.id_penjualan', $val->id);
			$this->db->order_by('dpenj.id', 'asc');
			$detail = $this->db->get()->result();

			$data = [];
			foreach ($detail as $row) :
				$data[] = $row->nama_barang2;
			endforeach;
			$result[$i]->nama_group = implode(', ', $data);
			$result[$i]->detail_obat = $detail;

			$this->db->select("COALESCE(sum(dpenj.qty * dpenj.disc_rp), 0) as total_diskon");
			$this->db->from('sm_detail_penjualan as dpenj');
			$this->db->join('sm_kemasan_barang as kb', 'kb.id = dpenj.id_kemasan');
			$this->db->join('sm_barang as b', 'b.id = kb.id_barang');
			$this->db->join('sm_satuan as stn', 'stn.id = b.satuan_kekuatan', 'left');
			$this->db->join('sm_sediaan as sd', 'sd.id = b.id_sediaan', 'left');
			$this->db->join('sm_pabrik as pb', 'pb.id = b.id_pabrik', 'left');
			$this->db->join('sm_satuan as st', 'st.id = kb.id_kemasan');
			$this->db->where('dpenj.id_penjualan', $val->id);
			$this->db->group_by('dpenj.id');
			$this->db->order_by('dpenj.id', 'asc');
			$diskon = $this->db->get()->row_array();
			$result[$i]->diskon = $diskon['total_diskon'];

			$this->db->select("count(*) as jumlah")->from('sm_pembayaran_penjualan_non_resep')->where('id_penjualan', $val->id, true);
			$result[$i]->status_pembayaran = $this->db->get()->row()->jumlah;
		endforeach;
		return $result;
    }

    function getListDataPenjualan($limit = 0, $start = 0, $search)
    {
        $result['data'] = $this->_listPenjualan($limit, $start, $search);
        $result['jumlah'] = $this->sqlPenjualan($search)->get()->num_rows();
        return $result;

        $this->db->close();
    }
	
	function simpanDataPenjualan()
	{
		$this->db->trans_begin();
		$id = safe_post('id');
		if ($id === '') :
			$diskon_pr = 0;
			$diskon_rp = 0;
			// insert data penjualan non resep
			$data = array(
				'tanggal_penjualan' => safe_post('tanggal_penjualan'),
				'waktu' => $this->datetime,
				'id_pasien' => safe_post('no_rm') !== '' ? safe_post('no_rm') : NULL,
				'diskon_persen' => $diskon_pr,
				'diskon_rupiah' => $diskon_rp,
				'total' => safe_post('total'),
				'pembeli' => safe_post('pembeli'),
				'jenis' => 'Bebas',
				'toeslag' => currencyToNumber(safe_post('jasa_farmasi')),
				'id_unit' => $this->session->userdata('id_unit'),
				'id_users' => $this->session->userdata('id_translucent'),
			);
			$this->db->insert('sm_penjualan', $data);
			$id_penjualan = $this->db->insert_id();
			if ($this->db->trans_status() === false) :
				$this->db->trans_rollback();
			endif;
			
			// insert data detail penjualan non resep
			$id_barang = safe_post('id_barang');
			$id_kemasan = safe_post('kemasan');
			$jumlah = safe_post('jumlah');
			$hja = safe_post('harga_jual');
			$diskon_pr = safe_post('diskon_pr');
			$diskon_rp = safe_post('diskon_rp');
			$persediaan = 0;
			$piutang = 0;
			foreach ($id_kemasan as $i => $kemasan) :
				$this->db->select("
					(b.hna * kb.isi * kb.isi_satuan) as hna, b.hpp,
					((b.hpp + (b.hpp * (b.margin_non_resep / 100))) * (kb.isi * kb.isi_satuan)) as harga_jual
				");
				$this->db->from('sm_kemasan_barang as kb');
				$this->db->join('sm_barang as b', 'b.id = kb.id_barang');
				$this->db->where('kb.id', $kemasan, true);
				// query ngambil kemasan barang
				$get_data = $this->db->get()->row();
				
				$data_detail = array(
					'id_penjualan' => $id_penjualan,
					'waktu' => $this->datetime,
					'id_kemasan' => $kemasan,
					'qty' => $jumlah[$i],
					'hna' => $get_data->hna,
					'hpp' => $get_data->hpp,
					'harga_jual' => currencyToNumber($hja[$i]),
					'disc_pr' => isset($diskon_pr[$i]) ? $diskon_pr[$i] : '0',
					'disc_rp' => isset($diskon_rp[$i]) ? currencyToNumber($diskon_rp[$i]) : '0'
				);				
				$this->db->insert('sm_detail_penjualan', $data_detail);
				if ($this->db->trans_status() === false) :
					$this->db->trans_rollback();
				endif;

				$persediaan += $get_data->hpp * $jumlah[$i];
				$piutang += $get_data->harga_jual * $jumlah[$i];
				$isi = $this->db->select("(isi * isi_satuan) as isi")->from('sm_kemasan_barang')->where('id', $kemasan, true)->get()->row()->isi;
				$stok = $this->db->select('sum(masuk)-sum(keluar) as sisa, ed')->from('sm_stok')->where('id_barang', $id_barang[$i])->where('ed >', $this->date)
											->where('id_unit', $this->session->userdata('id_unit'))->group_by('ed')->having('sum(masuk)-sum(keluar) >', 0)->order_by('ed', 'asc')->get()->result();
				$use = $jumlah[$i] * $isi;
				foreach ($stok as $i => $val) :
					$use = $val->sisa - abs($use);
					if ($use <= 0) :
						$keluar = $val->sisa;
					else :
						$keluar = abs($use - $val->sisa);
					endif;
					$data_stok = array(
						"waktu"        => $this->datetime, 
						"id_transaksi" => $id_penjualan, 
						"transaksi"    => "Penjualan", 
						"id_barang"    => $id_barang[$i], 
						"ed"           => isset($val->ed) ? $val->ed:  NULL, 
						"keluar"       => $keluar, 
						"keterangan"   => safe_post('pembeli'), 
						"id_unit"      => $this->session->userdata('id_unit'), 
						"id_users"     => $this->session->userdata('id_translucent'),
					);
					// insert data stok to table sm_stok
					$this->db->insert("sm_stok", $data_stok);
					if ($this->db->trans_status() === false) :
						$this->db->trans_rollback();
					endif;
					if (0 <= $use) :
						break;
					endif;
				endforeach;
			endforeach;
			$result['action'] = 'add';
		else :
			$diskon_pr = 0;
			$diskon_rp = 0;
			// insert data penjualan non resep
			$data = array(
				// 'tanggal_penjualan' => date2mysql(safe_post('tanggal_penjualan')),
				'waktu' => $this->datetime,
				'id_pasien' => safe_post('no_rm') !== '' ? safe_post('no_rm') : NULL,
				'diskon_persen' => $diskon_pr,
				'diskon_rupiah' => $diskon_rp,
				'total' => safe_post('total'),
				'pembeli' => safe_post('pembeli'),
				'jenis' => 'Bebas',
				'toeslag' => currencyToNumber(safe_post('jasa_farmasi')),
				'id_unit' => $this->session->userdata('id_unit'),
				'id_users' => $this->session->userdata('id_translucent'),
			);
			$this->db->where('id', $id, true)->update('sm_penjualan', $data);
			$id_penjualan = $id;
			if ($this->db->trans_status() === false) :
				$this->db->trans_rollback();
			endif;

			// hapus dulu semua data dengan id penjualan diatas
			$this->db->where('id_penjualan', $id_penjualan)->delete('sm_detail_penjualan');
			if ($this->db->trans_status() === false) :
				$this->db->trans_rollback();
			endif;
			// hapus juga stok nya dengan id_transaksi = id_penjualan
			$this->db->where(['id_transaksi' => $id_penjualan, 'transaksi' => 'Penjualan'])->delete('sm_stok');
			if ($this->db->trans_status() === false) :
				$this->db->trans_rollback();
			endif;

			// baru insert lagi data detail penjualan non resep
			$id_barang = safe_post('id_barang');
			$id_kemasan = safe_post('kemasan');
			$jumlah = safe_post('jumlah');
			$hja = safe_post('harga_jual');
			$diskon_pr = safe_post('diskon_pr');
			$diskon_rp = safe_post('diskon_rp');
			$persediaan = 0;
			$piutang = 0;
			foreach ($id_kemasan as $i => $kemasan) :
				$this->db->select("
					(b.hna * kb.isi * kb.isi_satuan) as hna, b.hpp,
					((b.hpp + (b.hpp * (b.margin_non_resep / 100))) * (kb.isi * kb.isi_satuan)) as harga_jual
				");
				$this->db->from('sm_kemasan_barang as kb');
				$this->db->join('sm_barang as b', 'b.id = kb.id_barang');
				$this->db->where('kb.id', $kemasan, true);
				// query ngambil kemasan barang
				$get_data = $this->db->get()->row();
				
				$data_detail = array(
					'id_penjualan' => $id_penjualan,
					'waktu' => $this->datetime,
					'id_kemasan' => $kemasan,
					'qty' => $jumlah[$i],
					'hna' => $get_data->hna,
					'hpp' => $get_data->hpp,
					'harga_jual' => currencyToNumber($hja[$i]),
					'disc_pr' => isset($diskon_pr[$i]) ? $diskon_pr[$i] : '0',
					'disc_rp' => isset($diskon_rp[$i]) ? currencyToNumber($diskon_rp[$i]) : '0'
				);				
				$this->db->insert('sm_detail_penjualan', $data_detail);
				if ($this->db->trans_status() === false) :
					$this->db->trans_rollback();
				endif;

				$persediaan += $get_data->hpp * $jumlah[$i];
				$piutang += $get_data->harga_jual * $jumlah[$i];
				$isi = $this->db->select("(isi * isi_satuan) as isi")->from('sm_kemasan_barang')->where('id', $kemasan, true)->get()->row()->isi;
				$stok = $this->db->select('sum(masuk)-sum(keluar) as sisa, ed')->from('sm_stok')->where('id_barang', $id_barang[$i])->where('ed >', $this->date)
											->where('id_unit', $this->session->userdata('id_unit'))->group_by('ed')->having('sum(masuk)-sum(keluar) >', 0)->order_by('ed', 'asc')->get()->result();
				$use = $jumlah[$i] * $isi;
				foreach ($stok as $i => $val) :
					$use = $val->sisa - abs($use);
					if ($use <= 0) :
						$keluar = $val->sisa;
					else :
						$keluar = abs($use - $val->sisa);
					endif;
					$data_stok = array(
						"waktu"        => $this->datetime, 
						"id_transaksi" => $id_penjualan, 
						"transaksi"    => "Penjualan", 
						"id_barang"    => $id_barang[$i], 
						"ed"           => isset($val->ed) ? $val->ed:  NULL, 
						"keluar"       => $keluar, 
						"keterangan"   => safe_post('pembeli'), 
						"id_unit"      => $this->session->userdata('id_unit'), 
						"id_users"     => $this->session->userdata('id_translucent'),
					);
					// insert data stok to table sm_stok
					$this->db->insert("sm_stok", $data_stok);
					if ($this->db->trans_status() === false) :
						$this->db->trans_rollback();
					endif;
					if (0 <= $use) :
						break;
					endif;
				endforeach;
			endforeach;
			$result['action'] = 'update';
		endif;
		if ($this->db->trans_status() === false) :
			$this->db->trans_rollback();
			$result['status'] = false;
			if ($result['action'] === 'add') :
				$result['message'] = "Gagal menyimpan data penjualan non resep!";
			else :
				$result['message'] = "Gagal mengupdate data penjualan non resep!";
			endif;
		else :
			$this->db->trans_commit();
			$result['status'] = true;
			if ($result['action'] === 'add') :
				$result['message'] = "Berhasil menyimpan data penjualan non resep!";
			else :
				$result['message'] = "Berhasil mengupdate data penjualan non resep!";
			endif;
			$result['id_penjualan'] = $id_penjualan;
		endif;
		return $result;
	}
	

}
