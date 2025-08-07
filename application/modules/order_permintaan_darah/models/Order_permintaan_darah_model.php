<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Order_permintaan_darah_model extends CI_Model {

	
	public function __construct()
	{
		parent::__construct();
		$this->datetime = date('Y-m-d H:i:s');
		$this->user = $this->session->userdata('id_translucent');
		$this->unit = $this->session->userdata('id_unit');
	}
	
	private function sqlOrder($search)
    {
		$this->db->select("DISTINCT ON (obd.id) 
			obd.*, lp.jenis_layanan,
			p.kelamin, p.tanggal_lahir, p.nama as nama_pasien
		");
		$this->db->from('sm_order_bank_darah as obd');
		$this->db->join('sm_layanan_pendaftaran as lp', 'lp.id = obd.id_layanan_pendaftaran');
		$this->db->join('sm_pasien as p', 'p.id = obd.id_pasien');
		$this->db->where('obd.layanan', 'Bank Darah', true);

        if (($search['tanggal_awal'] !== '') && ($search['tanggal_akhir'] !== '')) :
            $this->db->where("obd.waktu BETWEEN '" . date2mysql($search['tanggal_awal']) . " 00:00:00' AND '" . date2mysql($search['tanggal_akhir']) . " 23:59:59'");
        endif;
        if (isset($search['status']) && $search['status'] !== '') :
            $this->db->where('obd.diperiksa', $search['status'], true);
        endif;
        if (isset($search['pasien']) && $search['pasien'] !== '') :
            $this->db->where('p.id', $search['pasien'], true);
        endif;

		$this->db->order_by('obd.id', 'desc');
		return $this->db->order_by('obd.waktu', 'desc');
    }

    private function _listOrder($limit, $start, $search)
    {
        $this->sqlOrder($search);
        if ($limit !== 0) :
            $this->db->limit($limit, $start);
        endif;
		$result = $this->db->get()->result();
		return $result;
    }

    function getListData($limit = 0, $start = 0, $search)
    {
        $result['data'] = $this->_listOrder($limit, $start, $search);
        $result['jumlah'] = $this->sqlOrder($search)->get()->num_rows();
        return $result;
        $this->db->close();
    }

	function simpanPelayanan()
	{
		$this->db->trans_begin();
		$this->load->model('pelayanan/Pelayanan_model', 'm_pelayanan');
		$id_pendaftaran = safe_post('id_pendaftaran');
		$id_order_bank_darah = safe_post('id_order_bank_darah');
		$id_layanan_pendaftaran = safe_post('id_layanan_pendaftaran');
		$id_user = $this->session->userdata('id_translucent');
		$id_unit = $this->session->userdata('id_unit');
		$operator = safe_post('id_operator');
        $tindakan = safe_post('id_tindakan');
        $id_odb = safe_post('id_odb');
        $total = 0;
        $reimburse = 0;

		// update table sm_order_bank_darah
		$this->db->where('id', $id_order_bank_darah, true);
		$this->db->update('sm_order_bank_darah', [
			'id_layanan_pendaftaran' => $id_layanan_pendaftaran,
			'diperiksa' => 'Sudah',
		]);
		if ($this->db->trans_status() === false) :
			$this->db->trans_rollback();
			$response['status']	= false;
		endif;

        // area tindakan
        $tarif = $this->db->get_where('sm_layanan_pendaftaran', ['id' => $id_layanan_pendaftaran])->row();
		if ($tindakan) :
			if ($this->db->trans_status() === false) :
				$this->db->trans_rollback();
				$response['status'] = false;
			endif;
			foreach ($tindakan as $i => $value) :
                $tarif_tindakan = $this->db->get_where('sm_tarif_pelayanan', ['id' => $value])->row();
                if ($id_odb[$i] === "") :
                    $this->db->insert('sm_tarif_bank_darah', array(
                        'waktu' => $this->datetime,
                        'id_order_bank_darah' => $id_order_bank_darah,
                        'id_nadis' => $operator[$i],
                        'jasa_nadis' => $tarif_tindakan->jasa_nadis,
                        'jasa_klinik' => $tarif_tindakan->jasa_klinik,
                        'total' => $tarif_tindakan->total,
                        'id_tarif' => $tarif_tindakan->id,
                        'id_penjamin'=> $tarif->id_penjamin !== NULL ? $tarif->id_penjamin : NULL,
                        'no_polish' => isset($tarif->no_polish) ? $tarif->no_polish : '',
                        'reimburse' => 0,
                    ));
                    $result['log'][] = array('key' => $i, 'tindakan' => $value, 'status' => true); 
                else :
                    $result['log'][] = array('key' => $i, 'tindakan' => $value, 'status' => false); 
                endif;
				if ($this->db->trans_status() === false) :
					$this->db->trans_rollback();
					$response['status'] = false;
				endif;
				$total = $total + $tarif_tindakan->total;
				// $reimburse = $reimburse + $tarif->reimburse / 100 * $tarif_tindakan->total;
			endforeach;
		endif;
		// end area tindakan

		$this->m_pelayanan->setBelumLunas($id_pendaftaran);
		if ($this->db->trans_status() === false) :
			$this->db->trans_rollback();
			$response['status'] = false;
		else :
			$this->db->trans_commit();
			$response['status'] = true;
		endif;
		return $response;
	}

	function simpanPelayananONO()
	{
		$this->db->trans_begin();
		$this->load->model('pelayanan/Pelayanan_model', 'm_pelayanan');
		$id_pendaftaran = safe_post('id_pendaftaran');
		$id_order_bank_darah = safe_post('id_order_bank_darah');
		$id_layanan_pendaftaran = safe_post('id_layanan_pendaftaran');
		$id_user = $this->session->userdata('id_translucent');
		$id_unit = $this->session->userdata('id_unit');
		$operator = safe_post('id_operator');
        $tindakan = safe_post('id_tindakan');
        $id_odb = safe_post('id_odb');
        $total = 0;
        $reimburse = 0;

        // update table sm_order_bank_darah
		$this->db->where('id', $id_order_bank_darah, true);
		$this->db->update('sm_order_bank_darah', [
			'id_layanan_pendaftaran' => $id_layanan_pendaftaran,
			'diperiksa' => 'Sudah',
		]);

		if ($this->db->trans_status() === false) :
			$this->db->trans_rollback();
			$response['status']	= false;
		endif;

        // area tindakan
        $tarif = $this->db->get_where('sm_layanan_pendaftaran', ['id' => $id_layanan_pendaftaran])->row();
		if ($tindakan) :
			if ($this->db->trans_status() === false) :
				$this->db->trans_rollback();
				$response['status'] = false;
			endif;
			foreach ($tindakan as $i => $value) :
                $tarif_tindakan = $this->db->get_where('sm_tarif_pelayanan', ['id' => $value])->row();
                $get_lab = $this->db->get_where('sm_order_bank_darah', ['id' => $id_order_bank_darah])->row();
        		if ($id_odb[$i] === "") :
                    $this->db->insert('sm_tarif_bank_darah', array(
                        'waktu' => $this->datetime,
                        'id_order_bank_darah' => $id_order_bank_darah,
                        'id_nadis' => $operator[$i],
                        'jasa_nadis' => $tarif_tindakan->jasa_nadis,
                        'jasa_klinik' => $tarif_tindakan->jasa_klinik,
                        'total' => $tarif_tindakan->total,
                        'id_tarif' => $tarif_tindakan->id,
                        'id_penjamin'=> $tarif->id_penjamin !== NULL ? $tarif->id_penjamin : NULL,
                        'no_polish' => isset($tarif->no_polish) ? $tarif->no_polish : '',
                    	'reimburse' => 0,
                    ));

                    $id_ono = $this->db->insert_id();

                    $nomer_urut = 'BD'.$get_lab->id_pasien.''.$id_ono;

                    // update table sm_tarif_bank_darah
					$this->db->where('id', $id_ono, true);
					$this->db->update('sm_tarif_bank_darah', [
						'kode_ono' => $nomer_urut,
					]);


                    $result['log'][] = array('key' => $i, 'tindakan' => $value, 'status' => true); 
                else :
                    $result['log'][] = array('key' => $i, 'tindakan' => $value, 'status' => false); 
                endif;
				if ($this->db->trans_status() === false) :
					$this->db->trans_rollback();
					$response['status'] = false;
				endif;
				$total = $total + $tarif_tindakan->total;
				// $reimburse = $reimburse + $tarif->reimburse / 100 * $tarif_tindakan->total;
			endforeach;
		endif;
		// end area tindakan

		$this->m_pelayanan->setBelumLunas($id_pendaftaran);
		if ($this->db->trans_status() === false) :
			$this->db->trans_rollback();
			$response['status'] = false;
		else :
			$this->db->trans_commit();
			$response['status'] = true;
		endif;
		return $response;
	}

	function get_order_darah($kode_ono)
    {   
        $this->db->select("tbd.*, pg.nama as nama_dokter, pg.nip")
            ->from('sm_tarif_bank_darah as tbd')
            ->join('sm_tarif_pelayanan as tp', 'tp.id = tbd.id_tarif')
            ->join('sm_layanan as l', 'l.id = tp.id_layanan', 'left')
            ->join('sm_tenaga_medis as tm', 'tm.id = tbd.id_nadis', 'left')
            ->join('sm_pegawai as pg', 'pg.id = tm.id_pegawai', 'left')
            ->where('tbd.kode_ono', $kode_ono, true)
            ->order_by('tbd.id', 'asc');

        $layanan = $this->db->get()->result();
        
        $data = $layanan;

        $this->db->close();
        return $data;
    }

    function hapusOrderTindakan($id_tarif_darah) 
    {
        return $this->db->where("id", $id_tarif_darah)->delete("sm_tarif_bank_darah");
    }

	function getDataTindakanTambahan($id_order_bank_darah)
	{
		$this->db->select("
			tp.*, tbd.kode_ono, sobd.id_layanan_pendaftaran, pg.nama as nadis, srbd.status as status_lis, 
			tbd.id_nadis, tbd.id_tarif, l.nama as nama_tarif, 
			tbd.waktu as waktu_tindakan, tbd.id as id_tarif_bank_darah
		");
		$this->db->from('sm_tarif_bank_darah as tbd');
		$this->db->join('sm_order_bank_darah as sobd', 'sobd.id = tbd.id_order_bank_darah');
		$this->db->join('sm_respon_bank_darah as srbd', 'tbd.kode_ono = srbd.kode', 'left');
		$this->db->join('sm_tarif_pelayanan as tp', 'tp.id = tbd.id_tarif');
		$this->db->join('sm_tenaga_medis as n', 'n.id = tbd.id_nadis');
		$this->db->join('sm_pegawai as pg', 'pg.id = n.id_pegawai');
		$this->db->join('sm_layanan as l', 'l.id = tp.id_layanan');
		$this->db->where('tbd.id_order_bank_darah', $id_order_bank_darah, true);
		return $this->db->get();
	}

	function getDataDarahTambahan($id_layanan_pendaftaran)
	{
		$id_unit = $this->session->userdata('id_unit');
		$sql = "SELECT penj.*, dpenj.id as id_detail_penjualan,
				DATE(penj.waktu) as tanggal, dpenj.qty,
				CONCAT_WS(' ', b.nama, b.kekuatan, stn.nama, COALESCE(sed.nama, ''), '<small><i>', COALESCE(pb.nama, ''), '</i></small>') as nama_barang, 
				st.nama as kemasan, kb.id_barang, kb.id_kemasan, 
				(dpenj.harga_jual * kb.isi * kb.isi_satuan) as harga_jual, dpenj.hna, dpenj.disc_rp,  dpenj.status_order_darah,
				COALESCE((SELECT SUM(masuk) - SUM(keluar) FROM sm_stok WHERE id_barang = b.id AND id_unit = '".$id_unit."'), 0.00) as sisa, 
				(SELECT st.nama FROM sm_kemasan_barang as k JOIN sm_satuan as st ON (st.id = k.id_kemasan) WHERE k.id_barang = b.id ORDER BY (k.isi * k.isi_satuan) ASC LIMIT 1) as kemasan_sisa 
				FROM sm_penjualan_bank_darah as penj 
				JOIN sm_detail_penjualan_bank_darah as dpenj ON (dpenj.id_penjualan = penj.id) 
				JOIN sm_kemasan_barang as kb ON (kb.id = dpenj.id_kemasan) 
				JOIN sm_barang as b ON (b.id = kb.id_barang) 
				LEFT JOIN sm_satuan as stn ON (stn.id = b.satuan_kekuatan) 
				LEFT JOIN sm_sediaan as sed ON (sed.id = b.id_sediaan) 
				LEFT JOIN sm_pabrik as pb ON (pb.id = b.id_pabrik) 
				LEFT JOIN sm_satuan as st ON (st.id = kb.id_kemasan)
				WHERE penj.id_layanan_pendaftaran = '".$id_layanan_pendaftaran."' 
				ORDER BY id DESC";
		return $this->db->query($sql);
	}

	function update_response_order_darah($data, $id) 
    {
        $this->db->trans_begin();
        if ($id !== '') :
            $this->db->where('id', $id, true)->update('sm_respon_bank_darah', $data);
        endif;
        if ($this->db->trans_status() === false) :
            $this->db->trans_rollback();
            return array('status' => false, 'message' => 'Gagal update response LIS');
        else :
            $this->db->trans_commit();
            return array('status' => true, 'message' => 'Berhasil memperbaharui response LIS');
        endif;
    }

    function respon_order_darah($data)
    {
        
            $this->db->insert('sm_respon_bank_darah', $data, false);
            
    }

	function konfirmasiPermintaanDarah($id_detail_penjualan, $id_layanan_pendaftaran, $id_barang, $id_kemasan)
	{
		$this->db->trans_begin();
		$penjualan = $this->db->get_where('sm_penjualan_bank_darah', ['id_layanan_pendaftaran' => $id_layanan_pendaftaran])->row();
		$this->db->where('id_layanan_pendaftaran', $id_layanan_pendaftaran)->update('sm_penjualan_bank_darah', [
			'status_bank_darah' => '1'
		]);
		$this->db->where('id', $id_detail_penjualan)->update('sm_detail_penjualan_bank_darah', [
			'status_order_darah' => 'Confirmed'
		]);
		$this->db->where('id_transaksi', $penjualan->id)->update('sm_stok_bank_darah', [
			'is_confirm_bank_darah' => 'Confirmed'
		]);
		
		$this->db->affected_rows();
		if ($this->db->trans_status() === false) :
			$this->db->trans_rollback();
			$result['status'] = false;
			$result['message'] = 'Gagal mengkonfirmasi permintaan darah';
		else :
			$this->db->trans_commit();
			$result['status'] = true;
			$result['id_layanan_pendaftaran'] = $id_layanan_pendaftaran;
			$result['message'] = 'Berhasil mengkonfirmasi permintaan darah';
		endif;
		return $result;
	}

	function getDarahLIS()
    {
        $this->db->select("
            lis.*
        ");
        $this->db->from('sm_akses_lis as lis');
        $this->db->where('lis.id', 1, true);
        return $this->db->get()->row();
    }

}
