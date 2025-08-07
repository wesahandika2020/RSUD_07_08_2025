<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Inventory_model extends CI_Model {
	
	function __construct()
	{
		parent::__construct();
		$this->datetime = date('Y-m-d H:i:s');
	}

	function getJenisPenerimaan()
    {
        return array("" => "Pilih ...", "Langsung" => "Langsung", "Konsinyasi" => "Konsinyasi");
    }

    function namaUnit($id)
    {
        return $this->db->query("select nama from sm_unit where id = '" . $id . "'")->row()->nama;
    }

    function namaSupplier($id)
    {
        return $this->db->query("select nama from sm_supplier where id = '" . $id . "'")->row()->nama;
    }

    function getUnit()
    {
        return $this->db->or_where(['is_farmasi' => '1', 'is_gudang' => '1'])->get('sm_unit')->result();
    }

    function getAutoNoFakturPenerimaan($q, $start, $limit)
    {
        $limit = " limit " . $limit . " offset " . $start;
        $sql   = "select p.*, p.id as id_penerimaan, s.nama as supplier 
                from sm_penerimaan as p 
                join sm_supplier as s on (s.id = p.id_supplier)
                where p.no_faktur ilike ('%$q%') 
                and p.id_unit = '".$this->session->userdata('id_unit')."' 
                order by position('$q' in p.no_faktur)";
        $data['data'] = $this->db->query($sql . $limit)->result();
        $data['total'] = $this->db->query($sql)->num_rows();
        return $data;
    }

    function getAutoNoDistribusi($param, $start, $limit)
    { 
        $limit = " limit " . $limit . " offset " . $start;
        $where = " and d.id not in (select id_distribusi from sm_penerimaan_distribusi)";
        if ($param["status"] !== '') :
            $where = "";
        endif;
        $select   = "select EXTRACT(DAY FROM MAX(NOW())-MIN(date(tanggal_dikirim))) as selisih, 
                d.*, date(d.tanggal_permintaan) as tanggal, u.nama as unit, un.nama as unit_kirim ";
        $count = "select count(*) as count ";
        $sql = "from sm_distribusi as d 
                join sm_unit as u on (u.id = d.id_unit_asal)
                join sm_unit as un on (un.id = d.id_unit_tujuan)
                where d.kode ilike ('".$param["q"]."%') ".$where."
                and d.id_unit_asal = '".$this->session->userdata('id_unit')."' 
                group by d.id, un.nama, u.nama ";
        $order = "order by position('".$param["q"]."' in d.kode)";
        $data['data'] = $this->db->query($select . $sql . $order . $limit)->result();
        $data['total'] = $this->db->query($count . $sql)->num_rows();
        return $data;
    }

    function getAutoNoReturDistribusi($param, $start, $limit)
    { 
        $limit = " limit " . $limit . " offset " . $start;
        $select   = "select rd.*, u.nama as unit_retur ";
        $count = "select count(*) as count ";
        $sql = "from sm_retur_distribusi as rd 
                join sm_unit as u on (u.id = rd.id_unit_retur)
                where rd.id_unit_penerima = '".$this->session->userdata('id_unit')."'
                group by rd.id, u.nama ";
        $order = "order by waktu desc";
        $data['data'] = $this->db->query($select . $sql . $order . $limit)->result();
        $data['total'] = $this->db->query($count . $sql)->num_rows();
        return $data;
    }

	private function sqlPenerimaan($search)
    {
		$this->db->select("DISTINCT ON (pen.id)
			pen.*, pen.id as id_sppb, COALESCE(pen.id_pemesanan, '') as id_pemesanan,
			COALESCE(sup.nama, '-') as supplier, (pen.total * (pen.ppn / 100)) + pen.total as total_baru,
			CONCAT_WS(' ', b.nama, b.kekuatan, st.nama) as nama_barang, dpen.jumlah, k.isi, dpen.harga,
			dpen.diskon_persen, dpen.diskon_rupiah, kb.kode_penerimaan
		");
        $this->db->from('sm_penerimaan as pen');
		$this->db->join('sm_detail_penerimaan as dpen', 'dpen.id_penerimaan = pen.id');
		$this->db->join('sm_kategori_barang as kb', 'kb.id = pen.id_kategori_barang', 'left');
		$this->db->join('sm_kemasan_barang as k', 'k.id = dpen.id_kemasan_barang');
		$this->db->join('sm_barang as b', 'b.id = k.id_barang');
		$this->db->join('sm_satuan as st', 'st.id = b.satuan_kekuatan', 'left');
		$this->db->join('sm_supplier as sup', 'sup.id = pen.id_supplier', 'left');
		$this->db->join('sm_translucent as tr', 'tr.id = pen.id_users', 'left');


        if (($search['tanggal_awal'] !== '') & ($search['tanggal_akhir'] !== '')) :
            $this->db->where("pen.tanggal BETWEEN '" . date2mysql($search['tanggal_awal']) . " 00:00:00' AND '" . date2mysql($search['tanggal_akhir']) . " 23:59:59'");
        endif;
        if ($search['kategori_barang'] !== '') :
            $this->db->where('pen.id_kategori_barang', $search['kategori_barang'], true);
		endif;
        if ($search['no_penerimaan'] !== '') :
            $this->db->where('pen.no_penerimaan', $search['no_penerimaan'], true);
        endif;
        if ($search['no_faktur'] !== '') :
            $this->db->where('pen.no_faktur', $search['no_faktur'], true);
        endif;
        if ($search['supplier'] !== '') :
            $this->db->where('pen.id_supplier', $search['supplier'], true);
        endif;
        if ($search['barang'] !== '') :
            $this->db->where('b.id', $search['barang'], true);
        endif;
        if ($search['jenis_barang'] !== '') :
            $this->db->where('kb.jenis', $search['jenis_barang'], true);
		endif;
		if ($search['list'] === "Perfaktur") :
            $this->db->group_by('pen.id, sup.nama, b.nama, b.kekuatan, st.nama, dpen.jumlah, k.isi, dpen.harga, dpen.diskon_persen, dpen.diskon_rupiah, kb.kode_penerimaan');
        endif;

        return $this->db->order_by('pen.id', 'desc');    
    }

    private function _listPenerimaan($limit = 0, $start = 0, $search)
    {
        $this->sqlPenerimaan($search);
        if ($limit !== 0 && $search['list'] === 'Perfaktur') :
            $this->db->limit($limit, $start);
        endif;

		return $this->db->get()->result();
        // $this->db->get(); echo $this->db->last_query(); exit();
    }

    function getListDataPenerimaan($limit = 0, $start = 0, $search)
    {
        $result['data'] = $this->_listPenerimaan($limit, $start, $search);
        $result['jumlah'] = $this->sqlPenerimaan($search)->get()->num_rows();
        return $result;

        $this->db->close();
    }

	private function sqlPenerimaanBankDarah($search)
    {
		$this->db->select("DISTINCT ON (pen.id)
			pen.*, pen.id as id_sppb, COALESCE(pen.id_pemesanan, '') as id_pemesanan,
			COALESCE(sup.nama, '-') as supplier, (pen.total * (pen.ppn / 100)) + pen.total as total_baru,
			CONCAT_WS(' ', b.nama, b.kekuatan, st.nama) as nama_barang, dpen.jumlah, k.isi, dpen.harga,
			dpen.diskon_persen, dpen.diskon_rupiah, kb.kode_penerimaan
		");
        $this->db->from('sm_penerimaan_bank_darah as pen');
		$this->db->join('sm_detail_penerimaan_bank_darah as dpen', 'dpen.id_penerimaan = pen.id');
		$this->db->join('sm_kategori_barang as kb', 'kb.id = pen.id_kategori_barang', 'left');
		$this->db->join('sm_kemasan_barang as k', 'k.id = dpen.id_kemasan_barang');
		$this->db->join('sm_barang as b', 'b.id = k.id_barang');
		$this->db->join('sm_satuan as st', 'st.id = b.satuan_kekuatan', 'left');
		$this->db->join('sm_supplier as sup', 'sup.id = pen.id_supplier', 'left');
		$this->db->join('sm_translucent as tr', 'tr.id = pen.id_users', 'left');


        if (($search['tanggal_awal'] !== '') & ($search['tanggal_akhir'] !== '')) :
            $this->db->where("pen.tanggal BETWEEN '" . date2mysql($search['tanggal_awal']) . " 00:00:00' AND '" . date2mysql($search['tanggal_akhir']) . " 23:59:59'");
        endif;
        if ($search['kategori_barang'] !== '') :
            $this->db->where('pen.id_kategori_barang', $search['kategori_barang'], true);
		endif;
        if ($search['no_penerimaan'] !== '') :
            $this->db->where('pen.no_penerimaan', $search['no_penerimaan'], true);
        endif;
        if ($search['no_faktur'] !== '') :
            $this->db->where('pen.no_faktur', $search['no_faktur'], true);
        endif;
        if ($search['supplier'] !== '') :
            $this->db->where('pen.id_supplier', $search['supplier'], true);
        endif;
        if ($search['barang'] !== '') :
            $this->db->where('b.id', $search['barang'], true);
        endif;
        if ($search['jenis_barang'] !== '') :
            $this->db->where('kb.jenis', $search['jenis_barang'], true);
		endif;
		if ($search['list'] === "Perfaktur") :
            $this->db->group_by('pen.id, sup.nama, b.nama, b.kekuatan, st.nama, dpen.jumlah, k.isi, dpen.harga, dpen.diskon_persen, dpen.diskon_rupiah, kb.kode_penerimaan');
        endif;

        return $this->db->order_by('pen.id', 'desc');    
    }

    private function _listPenerimaanBankDarah($limit = 0, $start = 0, $search)
    {
        $this->sqlPenerimaanBankDarah($search);
        if ($limit !== 0 && $search['list'] === 'Perfaktur') :
            $this->db->limit($limit, $start);
        endif;

		return $this->db->get()->result();
        // $this->db->get(); echo $this->db->last_query(); exit();
    }

    function getListDataPenerimaanBankDarah($limit = 0, $start = 0, $search)
    {
        $result['data'] = $this->_listPenerimaanBankDarah($limit, $start, $search);
        $result['jumlah'] = $this->sqlPenerimaanBankDarah($search)->get()->num_rows();
        return $result;

        $this->db->close();
    }
    
    function generateNoUrutPenerimaan($jenis = '')
    {
        $length = 4;
        $tahun = date('Y');
        $bulan = date('m');
        $row = $this->db->query("select no_penerimaan from sm_penerimaan where date_part('month', tanggal) = ".$bulan." and date_part('year', tanggal) = ".$tahun." and no_penerimaan is not NULL order by no_penerimaan desc limit 1")->row();
        if ($row) :
            $kode = explode('/', $row->no_penerimaan);
            $get_kode = $kode[3];
        endif;
        if (!isset($get_kode)) {
            $auto = "0001";
        } else {
            $auto = str_pad((string) ($get_kode + 1), 4, "0", STR_PAD_LEFT);
        }
        $result = "GD/RCV/" . $tahun . "-" . $bulan . "/" . $auto;
        return $result;
    }

    function generateNoUrutPenerimaanDarah($jenis = '')
    {
        $length = 4;
        $tahun = date('Y');
        $bulan = date('m');
        $row = $this->db->query("select no_penerimaan from sm_penerimaan_bank_darah where date_part('month', tanggal) = ".$bulan." and date_part('year', tanggal) = ".$tahun." and no_penerimaan is not NULL and jenis_penerimaan = 'Bank Darah' order by no_penerimaan desc limit 1")->row();
        if ($row) :
            $kode = explode('/', $row->no_penerimaan);
            $get_kode = $kode[3];
        endif;
        if (!isset($get_kode)) {
            $auto = "0001";
        } else {
            $auto = str_pad((string) ($get_kode + 1), 4, "0", STR_PAD_LEFT);
        }
        $result = "BD/RCV/" . $tahun . "-" . $bulan . "/" . $auto;
        return $result;
    }

    function getDetailHargaBarangPemesanan()
    {
        $id = $_GET['id'];
        $id_kemasan = $_GET['id_kemasan'];
        $query = "select b.*, COALESCE((b.hna*k.isi*k.isi_satuan), 0) as hna, (b.hna*k.isi_satuan*k.isi) as esti, 
                k.id as id_packing, k.id_kemasan from sm_barang b
                join sm_kemasan_barang k on (b.id = k.id_barang)
                where k.id_barang = '" . $id . "' and k.id_kemasan = '" . $id_kemasan . "'";
        return $this->db->query($query);
    }
	
    function simpanDataPenerimaan() 
    {
        $id_penerimaan = safe_post('id');
        $jenis = safe_post('jenis');
        // $no_penerimaan = safe_post('no_penerimaan');
        if ($jenis === 'Bank Darah') {
            $no_penerimaan = $this->generateNoUrutPenerimaanDarah();
        } else {
            $no_penerimaan = $this->generateNoUrutPenerimaan();
        }
        $tanggal = datetime2mysql(safe_post('tanggal')) . ':' . date('s');
        $jenis_penerimaan = safe_post('jenis_penerimaan');
        $id_supplier = safe_post('supplier');
        $nama_supplier = $this->namaSupplier($id_supplier);
        $no_faktur = safe_post('no_faktur');
        $jatuh_tempo = date2mysql(safe_post('jatuh_tempo'));
        $id_kategori_barang = safe_post('kategori_barang');
        $id_user = $this->session->userdata('id_translucent');
        $id_unit = $this->session->userdata('id_unit');
        $ppn = safe_post('ppn');
        $materai = safe_post('materai') !== '' ? currencyToNumber(safe_post('materai')) : 0;
        $disc_pr = safe_post('disc_pr');
        $disc_rp = currencyToNumber(safe_post('disc_rp'));
        $total = currencyToNumber(safe_post('total'));
        $diterima_semua = safe_post('diterima_semua');
        // jika id penerimaan kosong
        if ($id_penerimaan === '') :
            $this->db->trans_begin();
            $data = array(
                'no_penerimaan' => $no_penerimaan,
                'no_faktur' => $no_faktur,
                'tanggal' => $tanggal,
                'id_supplier' => $id_supplier,
                'id_kategori_barang' => $id_kategori_barang,
                'ppn' => $ppn,
                'materai' => $materai,
                'tanggal_jatuh_tempo' => $jatuh_tempo,
                'id_users' => $id_user,
                'diskon_persen' => $disc_pr,
                'diskon_rupiah' => $disc_rp,
                'total' => $total,
                'status' => $jenis_penerimaan,
                'id_unit' => $id_unit,
                'status_penerimaan' => 'Belum',
                'diterima_semua' => $diterima_semua,
                'jenis_penerimaan' => $jenis,
            );
            $this->db->insert('sm_penerimaan', $data);
            $id = $this->db->insert_id();
            if ($this->db->trans_status() === false) :
                $this->db->trans_rollback();
                $result['status'] = false;
            endif;
            $id_barang = safe_post('id_barang');
            $id_kemasan = safe_post('id_kemasan');
            $no_batch = safe_post('nobatch');
            $ed = safe_post('ed');
            $jumlah = safe_post('jml');
            $harga = safe_post('hna');
            $diskon_pr = safe_post('diskon_pr');
            $diskon_rp = safe_post('diskon_rp');
            $id_pemesanan = safe_post('id_pemesanan');
            $subtotal = safe_post('subtotal');
            $total_bonus = 0;
            $auto = $this->db->query("select max(penerimaan_ke) as penerimaan_ke from sm_detail_penerimaan where id_penerimaan = '" . $id . "' GROUP BY penerimaan_ke")->row();
            foreach ($id_barang as $key => $value) :
                $kemasan_barang = $this->db->query("select * from sm_kemasan_barang where id = '" . $id_kemasan[$key] . "'")->row();
                $harga_a = currencyToNumber($harga[$key]) / ($kemasan_barang->isi * $kemasan_barang->isi_satuan);
                $base_hpp = $harga_a - $harga_a * $diskon_pr[$key] / 100;
                $hpp_ppn = $harga_a * $ppn / 100;
                $hpp = $harga_a + $hpp_ppn;
                $penerimaan_ke = isset($auto->penerimaan_ke) ? $auto->penerimaan_ke : 1;
                $data_detail = array(
                    // 'id_pemesanan' => $id_pemesanan[$key] !== '' ? $id_pemesanan[$key] : NULL, 
                    'id_penerimaan' => $id, 
                    'id_kemasan_barang' => $kemasan_barang->id, 
                    'no_batch' => $no_batch[$key], 
                    'expired' => date2mysql($ed[$key]), 
                    'harga' => $harga_a, 
                    'jumlah' => $jumlah[$key], 
                    'diskon_persen' => $diskon_pr[$key], 
                    'diskon_rupiah' => currencyToNumber($diskon_rp[$key]), 
                    'hpp' => $hpp, 
                    'tanggal_terima' => date('Y-m-d'), 
                    'penerimaan_ke' => $penerimaan_ke + 1,
                );
                $this->db->insert('sm_detail_penerimaan', $data_detail);
                $hna_terkecil = currencyToNumber($harga[$key]) / ($kemasan_barang->isi * $kemasan_barang->isi_satuan);
                $new_hna = $hna_terkecil + $hna_terkecil * $ppn / 100;
                $this->db->query("update sm_barang set harga_dasar = '" . $harga_a . "', hna = '" . $base_hpp . "', hpp = '" . $hpp . "' where id = '" . $value . "'");
                if ($diskon_pr[$key] === "100") :
                    $total_bonus = $total_bonus + $harga_a * $jumlah[$key];
                endif;
                if (0 < $diskon_pr[$key] && $diskon_pr[$key] < 100) :
                    $total_bonus = $total_bonus + $harga_a * $jumlah[$key];
                endif;
                // masuk ke data stok
                $data_stok = array(
                    'waktu' => datetime2mysql(safe_post('tanggal')) . ':' . date('s'), 
                    'id_transaksi' => $id, 
                    'transaksi' => 'Penerimaan', 
                    'no_batch' => $no_batch[$key], 
                    'id_barang' => $value, 
                    'ed' => date2mysql($ed[$key]), 
                    'masuk' => $jumlah[$key] * $kemasan_barang->isi * $kemasan_barang->isi_satuan, 
                    'keluar' => 0,
                    'keterangan' => $nama_supplier,
                    'id_unit' => $id_unit, 
                    'id_users' => $id_user, 
                );

                if ($jenis === 'Bank Darah') {
                    $data_stok['is_bank_darah'] = 1;
                    $data_stok['is_confirm_bank_darah'] = 'Confirmed';
                }
                $this->db->insert('sm_stok', $data_stok);
                if ($this->db->trans_status() === false) :
                    $this->db->trans_rollback();
                    $result['status'] = false;
                endif;
            endforeach;
            if ($this->db->trans_status() === false) :
                $this->db->trans_rollback();
                $result['status'] = false;
                $result['message'] = 'Gagal menyimpan data penerimaan.';
            else :
                $this->db->trans_commit();
                $result['status'] = true;
                $result['message'] = 'Berhasil menyimpan data penerimaan.';
            endif;
            $result['action'] = 'add';
        else :
            $this->db->trans_begin();
            // data penerimaan update
            $data = array(
                'no_faktur' => $no_faktur,
                'tanggal' => $tanggal,
                'id_supplier' => $id_supplier,
                'id_kategori_barang' => $id_kategori_barang,
                'ppn' => $ppn,
                'materai' => $materai,
                'tanggal_jatuh_tempo' => $jatuh_tempo,
                'id_users' => $id_user,
                'diskon_persen' => $disc_pr,
                'diskon_rupiah' => $disc_rp,
                'total' => $total,
                'status' => $jenis_penerimaan,
                'id_unit' => $id_unit,
                'diterima_semua' => $diterima_semua,
            );
            $this->db->where('id', $id_penerimaan);
            $this->db->update('sm_penerimaan', $data);
            if ($this->db->trans_status() === false) :
                $this->db->trans_rollback();
                $result['status'] = false;
            endif;
            $id = $id_penerimaan;
            $this->db->where(['id_penerimaan' => $id_penerimaan])->delete('sm_detail_penerimaan');
            $this->db->where(['id_transaksi' => $id, 'transaksi' => 'Penerimaan'])->delete('sm_stok');
            // data detail penerimaan update
            $id_barang = safe_post('id_barang');
            $id_kemasan = safe_post('id_kemasan');
            $no_batch = safe_post('nobatch');
            $ed = safe_post('ed');
            $jumlah = safe_post('jml');
            $harga = safe_post('hna');
            $diskon_pr = safe_post('diskon_pr');
            $diskon_rp = safe_post('diskon_rp');
            $id_pemesanan = safe_post('id_pemesanan');
            $subtotal = safe_post('subtotal');
            $total_bonus = 0;

            foreach ($id_barang as $key => $value) :
                $kemasan_barang = $this->db->query("select * from sm_kemasan_barang where id = '" . $id_kemasan[$key] . "'")->row();
                $harga_a = currencyToNumber($harga[$key]) / ($kemasan_barang->isi * $kemasan_barang->isi_satuan);
                $base_hpp = $harga_a - $harga_a * $diskon_pr[$key] / 100;
                $hpp_ppn = $harga_a * $ppn / 100;
                $hpp = $harga_a + $hpp_ppn;
                $data_detail = array(
                    // 'id_pemesanan' => $id_pemesanan[$key] !== '' ? $id_pemesanan[$key] : NULL, 
                    'id_penerimaan' => $id, 
                    'id_kemasan_barang' => $kemasan_barang->id, 
                    'no_batch' => $no_batch[$key], 
                    'expired' => date2mysql($ed[$key]), 
                    'harga' => $harga_a, 
                    'jumlah' => $jumlah[$key], 
                    'diskon_persen' => $diskon_pr[$key], 
                    'diskon_rupiah' => currencyToNumber($diskon_rp[$key]), 
                    'hpp' => $hpp, 
                    'tanggal_terima' => date('Y-m-d'), 
                );
                $this->db->insert('sm_detail_penerimaan', $data_detail);
                if ($this->db->trans_status() === false) :
                    $this->db->trans_rollback();
                    $result['status'] = false;
                endif;
                $hna_terkecil = currencyToNumber($harga[$key]) / ($kemasan_barang->isi * $kemasan_barang->isi_satuan);
                $new_hna = $hna_terkecil + $hna_terkecil * $ppn / 100;
                $this->db->query("update sm_barang set harga_dasar = '" . $harga_a . "', hna = '" . $base_hpp . "', hpp = '" . $hpp . "' where id = '" . $value . "'");
                if ($this->db->trans_status() === false) :
                    $this->db->trans_rollback();
                    $result['status'] = false;
                endif;
                // masuk ke data stok
                $data_stok = array(
                    'waktu' => datetime2mysql(safe_post('tanggal')) . ':' . date('s'), 
                    'id_transaksi' => $id, 
                    'transaksi' => 'Penerimaan', 
                    'no_batch' => $no_batch[$key], 
                    'id_barang' => $value, 
                    'ed' => date2mysql($ed[$key]), 
                    'masuk' => $jumlah[$key] * $kemasan_barang->isi * $kemasan_barang->isi_satuan, 
                    'keluar' => 0,
                    'keterangan' => $nama_supplier,
                    'id_unit' => $id_unit, 
                    'id_users' => $id_user, 
                );
                $this->db->insert('sm_stok', $data_stok);
                if ($this->db->trans_status() === false) :
                    $this->db->trans_rollback();
                    $result['status'] = false;
                endif;
                if ($diskon_pr[$key] === "100") :
                    $total_bonus = $total_bonus + $harga_a * $jumlah[$key];
                endif;
            endforeach;
            if ($this->db->trans_status() === false) :
                $this->db->trans_rollback();
                $result['status'] = false;
                $result['message'] = 'Gagal mengubah data penerimaan.';
            else :
                $this->db->trans_commit();
                $result['status'] = true;
                $result['message'] = 'Berhasil mengubah data penerimaan.';
            endif;
            $result['action'] = 'update';
        endif;
        $result['id_penerimaan'] = $id;
        return $result;
    }

    function simpanDataPenerimaanBankDarah() 
    {
        $id_penerimaan = safe_post('id');
        $jenis = safe_post('jenis');
        // $no_penerimaan = safe_post('no_penerimaan');
        $no_penerimaan = $this->generateNoUrutPenerimaanDarah();
        $tanggal = datetime2mysql(safe_post('tanggal')) . ':' . date('s');
        $jenis_penerimaan = safe_post('jenis_penerimaan');
        $id_supplier = safe_post('supplier');
        $nama_supplier = $this->namaSupplier($id_supplier);
        $no_faktur = safe_post('no_faktur');
        $jatuh_tempo = date2mysql(safe_post('jatuh_tempo'));
        $id_kategori_barang = safe_post('kategori_barang');
        $id_user = $this->session->userdata('id_translucent');
        $id_unit = $this->session->userdata('id_unit');
        $ppn = safe_post('ppn');
        $materai = safe_post('materai') !== '' ? currencyToNumber(safe_post('materai')) : 0;
        $disc_pr = safe_post('disc_pr');
        $disc_rp = currencyToNumber(safe_post('disc_rp'));
        $total = currencyToNumber(safe_post('total'));
        $diterima_semua = safe_post('diterima_semua');
        // jika id penerimaan kosong
        if ($id_penerimaan === '') :
            $this->db->trans_begin();
            $data = array(
                'no_penerimaan' => $no_penerimaan,
                'no_faktur' => $no_faktur,
                'tanggal' => $tanggal,
                'id_supplier' => $id_supplier,
                'id_kategori_barang' => $id_kategori_barang,
                'ppn' => $ppn,
                'materai' => $materai,
                'tanggal_jatuh_tempo' => $jatuh_tempo,
                'id_users' => $id_user,
                'diskon_persen' => $disc_pr,
                'diskon_rupiah' => $disc_rp,
                'total' => $total,
                'status' => $jenis_penerimaan,
                'id_unit' => $id_unit,
                'status_penerimaan' => 'Belum',
                'diterima_semua' => $diterima_semua,
                'jenis_penerimaan' => $jenis,
            );
            $this->db->insert('sm_penerimaan_bank_darah', $data);
            $id = $this->db->insert_id();
            if ($this->db->trans_status() === false) :
                $this->db->trans_rollback();
                $result['status'] = false;
            endif;
            $id_barang = safe_post('id_barang');
            $id_kemasan = safe_post('id_kemasan');
            $no_batch = safe_post('nobatch');
            $ed = safe_post('ed');
            $jumlah = safe_post('jml');
            $harga = safe_post('hna');
            $diskon_pr = safe_post('diskon_pr');
            $diskon_rp = safe_post('diskon_rp');
            $id_pemesanan = safe_post('id_pemesanan');
            $subtotal = safe_post('subtotal');
            $total_bonus = 0;
            $auto = $this->db->query("select max(penerimaan_ke) as penerimaan_ke from sm_detail_penerimaan_bank_darah where id_penerimaan = '" . $id . "' GROUP BY penerimaan_ke")->row();
            foreach ($id_barang as $key => $value) :
                $kemasan_barang = $this->db->query("select * from sm_kemasan_barang where id = '" . $id_kemasan[$key] . "'")->row();
                $harga_a = currencyToNumber($harga[$key]) / ($kemasan_barang->isi * $kemasan_barang->isi_satuan);
                $base_hpp = $harga_a - $harga_a * $diskon_pr[$key] / 100;
                $hpp_ppn = $base_hpp * $ppn / 100;
                $hpp = $base_hpp + $hpp_ppn;
                $penerimaan_ke = isset($auto->penerimaan_ke) ? $auto->penerimaan_ke : 1;
                $data_detail = array(
                    // 'id_pemesanan' => $id_pemesanan[$key] !== '' ? $id_pemesanan[$key] : NULL, 
                    'id_penerimaan' => $id, 
                    'id_kemasan_barang' => $kemasan_barang->id, 
                    'no_batch' => $no_batch[$key], 
                    'expired' => date2mysql($ed[$key]), 
                    'harga' => $harga_a, 
                    'jumlah' => $jumlah[$key], 
                    'diskon_persen' => $diskon_pr[$key], 
                    'diskon_rupiah' => currencyToNumber($diskon_rp[$key]), 
                    'hpp' => $hpp, 
                    'tanggal_terima' => date('Y-m-d'), 
                    'penerimaan_ke' => $penerimaan_ke + 1,
                );
                $this->db->insert('sm_detail_penerimaan_bank_darah', $data_detail);
                $hna_terkecil = currencyToNumber($harga[$key]) / ($kemasan_barang->isi * $kemasan_barang->isi_satuan);
                $new_hna = $hna_terkecil + $hna_terkecil * $ppn / 100;
                $this->db->query("update sm_barang set hna = '" . $base_hpp . "', hpp = '" . $hpp . "' where id = '" . $value . "'");
                if ($diskon_pr[$key] === "100") :
                    $total_bonus = $total_bonus + $harga_a * $jumlah[$key];
                endif;
                if (0 < $diskon_pr[$key] && $diskon_pr[$key] < 100) :
                    $total_bonus = $total_bonus + $harga_a * $jumlah[$key];
                endif;
                // masuk ke data stok
                $data_stok = array(
                    'waktu' => datetime2mysql(safe_post('tanggal')) . ':' . date('s'), 
                    'id_transaksi' => $id, 
                    'transaksi' => 'Penerimaan', 
                    'no_batch' => $no_batch[$key], 
                    'id_barang' => $value, 
                    'ed' => date2mysql($ed[$key]), 
                    'masuk' => $jumlah[$key] * $kemasan_barang->isi * $kemasan_barang->isi_satuan, 
                    'keluar' => 0,
                    'keterangan' => $nama_supplier,
                    'id_unit' => $id_unit, 
                    'id_users' => $id_user, 
                );

                $data_stok['is_bank_darah'] = 1;
                $data_stok['is_confirm_bank_darah'] = 'Confirmed';

                $this->db->insert('sm_stok_bank_darah', $data_stok);
                if ($this->db->trans_status() === false) :
                    $this->db->trans_rollback();
                    $result['status'] = false;
                endif;
            endforeach;
            if ($this->db->trans_status() === false) :
                $this->db->trans_rollback();
                $result['status'] = false;
                $result['message'] = 'Gagal menyimpan data penerimaan.';
            else :
                $this->db->trans_commit();
                $result['status'] = true;
                $result['message'] = 'Berhasil menyimpan data penerimaan.';
            endif;
            $result['action'] = 'add';
        else :
            $this->db->trans_begin();
            // data penerimaan update
            $data = array(
                'no_faktur' => $no_faktur,
                'tanggal' => $tanggal,
                'id_supplier' => $id_supplier,
                'id_kategori_barang' => $id_kategori_barang,
                'ppn' => $ppn,
                'materai' => $materai,
                'tanggal_jatuh_tempo' => $jatuh_tempo,
                'id_users' => $id_user,
                'diskon_persen' => $disc_pr,
                'diskon_rupiah' => $disc_rp,
                'total' => $total,
                'status' => $jenis_penerimaan,
                'id_unit' => $id_unit,
                'diterima_semua' => $diterima_semua,
            );
            $this->db->where('id', $id_penerimaan);
            $this->db->update('sm_penerimaan_bank_darah', $data);
            if ($this->db->trans_status() === false) :
                $this->db->trans_rollback();
                $result['status'] = false;
            endif;
            $id = $id_penerimaan;
            $this->db->where(['id_penerimaan' => $id_penerimaan])->delete('sm_detail_penerimaan');
            $this->db->where(['id_transaksi' => $id, 'transaksi' => 'Penerimaan'])->delete('sm_stok');
            // data detail penerimaan update
            $id_barang = safe_post('id_barang');
            $id_kemasan = safe_post('id_kemasan');
            $no_batch = safe_post('nobatch');
            $ed = safe_post('ed');
            $jumlah = safe_post('jml');
            $harga = safe_post('hna');
            $diskon_pr = safe_post('diskon_pr');
            $diskon_rp = safe_post('diskon_rp');
            $id_pemesanan = safe_post('id_pemesanan');
            $subtotal = safe_post('subtotal');
            $total_bonus = 0;

            foreach ($id_barang as $key => $value) :
                $kemasan_barang = $this->db->query("select * from sm_kemasan_barang where id = '" . $id_kemasan[$key] . "'")->row();
                $harga_a = currencyToNumber($harga[$key]) / ($kemasan_barang->isi * $kemasan_barang->isi_satuan);
                $base_hpp = $harga_a - $harga_a * $diskon_pr[$key] / 100;
                $hpp_ppn = $base_hpp * $ppn / 100;
                $hpp = $base_hpp + $hpp_ppn;
                $data_detail = array(
                    // 'id_pemesanan' => $id_pemesanan[$key] !== '' ? $id_pemesanan[$key] : NULL, 
                    'id_penerimaan' => $id, 
                    'id_kemasan_barang' => $kemasan_barang->id, 
                    'no_batch' => $no_batch[$key], 
                    'expired' => date2mysql($ed[$key]), 
                    'harga' => $harga_a, 
                    'jumlah' => $jumlah[$key], 
                    'diskon_persen' => $diskon_pr[$key], 
                    'diskon_rupiah' => currencyToNumber($diskon_rp[$key]), 
                    'hpp' => $hpp, 
                    'tanggal_terima' => date('Y-m-d'), 
                );
                $this->db->insert('sm_detail_penerimaan_bank_darah', $data_detail);
                if ($this->db->trans_status() === false) :
                    $this->db->trans_rollback();
                    $result['status'] = false;
                endif;
                $hna_terkecil = currencyToNumber($harga[$key]) / ($kemasan_barang->isi * $kemasan_barang->isi_satuan);
                $new_hna = $hna_terkecil + $hna_terkecil * $ppn / 100;
                $this->db->query("update sm_barang set hna = '" . $base_hpp . "', hpp = '" . $hpp . "' where id = '" . $value . "'");
                if ($this->db->trans_status() === false) :
                    $this->db->trans_rollback();
                    $result['status'] = false;
                endif;
                // masuk ke data stok
                $data_stok = array(
                    'waktu' => datetime2mysql(safe_post('tanggal')) . ':' . date('s'), 
                    'id_transaksi' => $id, 
                    'transaksi' => 'Penerimaan', 
                    'no_batch' => $no_batch[$key], 
                    'id_barang' => $value, 
                    'ed' => date2mysql($ed[$key]), 
                    'masuk' => $jumlah[$key] * $kemasan_barang->isi * $kemasan_barang->isi_satuan, 
                    'keluar' => 0,
                    'keterangan' => $nama_supplier,
                    'id_unit' => $id_unit, 
                    'id_users' => $id_user, 
                );

                $data_stok['is_bank_darah'] = 1;
                $data_stok['is_confirm_bank_darah'] = 'Confirmed';
                
                $this->db->insert('sm_stok_bank_darah', $data_stok);
                if ($this->db->trans_status() === false) :
                    $this->db->trans_rollback();
                    $result['status'] = false;
                endif;
                if ($diskon_pr[$key] === "100") :
                    $total_bonus = $total_bonus + $harga_a * $jumlah[$key];
                endif;
            endforeach;
            if ($this->db->trans_status() === false) :
                $this->db->trans_rollback();
                $result['status'] = false;
                $result['message'] = 'Gagal mengubah data penerimaan.';
            else :
                $this->db->trans_commit();
                $result['status'] = true;
                $result['message'] = 'Berhasil mengubah data penerimaan.';
            endif;
            $result['action'] = 'update';
        endif;
        $result['id_penerimaan'] = $id;
        return $result;
    }

    function getDetailDataPenerimaan($id_penerimaan)
    {
        $sql = "select b.*, p.id_kategori_barang as jenis_penerimaan, 
                CONCAT_WS(' ',b.nama, b.kekuatan, st.nama, COALESCE(sd.nama,''), '<small><i>', COALESCE(pb.nama,''),'</i></small>') as nama_barang,
                b.id as id_barang, stn.nama as kemasan, k.id as id_kemasan, dp.expired, COALESCE(dp.id_pemesanan,'') as id_pemesanan,
                (dp.harga * k.isi_satuan * k.isi) as harga, dp.jumlah, dp.hpp, dp.no_batch, dp.diskon_persen, dp.diskon_rupiah
                from sm_penerimaan p
                join sm_detail_penerimaan dp on (p.id = dp.id_penerimaan)
                join sm_kemasan_barang k on (dp.id_kemasan_barang = k.id)
                join sm_barang b on (k.id_barang = b.id)
                left join sm_satuan st on (b.satuan_kekuatan = st.id)
                left join sm_satuan stn on (k.id_kemasan = stn.id)
                left join sm_sediaan sd on (b.id_sediaan = sd.id)
                left join sm_pabrik pb on (b.id_pabrik = pb.id)
                left join sm_supplier s on (p.id_supplier = s.id)
                left join sm_translucent tr on (p.id_users = tr.id)
                where p.id = '" . $id_penerimaan . "' order by p.id desc";
        return $this->db->query($sql)->result();
    }

    function getDetailDataPenerimaanBankDarah($id_penerimaan)
    {
        $sql = "select b.*, p.id_kategori_barang as jenis_penerimaan, 
                CONCAT_WS(' ',b.nama, b.kekuatan, st.nama, COALESCE(sd.nama,''), '<small><i>', COALESCE(pb.nama,''),'</i></small>') as nama_barang,
                b.id as id_barang, stn.nama as kemasan, k.id as id_kemasan, dp.expired, COALESCE(dp.id_pemesanan,'') as id_pemesanan,
                (dp.harga * k.isi_satuan * k.isi) as harga, dp.jumlah, dp.hpp, dp.no_batch, dp.diskon_persen, dp.diskon_rupiah
                from sm_penerimaan_bank_darah p
                join sm_detail_penerimaan_bank_darah dp on (p.id = dp.id_penerimaan)
                join sm_kemasan_barang k on (dp.id_kemasan_barang = k.id)
                join sm_barang b on (k.id_barang = b.id)
                left join sm_satuan st on (b.satuan_kekuatan = st.id)
                left join sm_satuan stn on (k.id_kemasan = stn.id)
                left join sm_sediaan sd on (b.id_sediaan = sd.id)
                left join sm_pabrik pb on (b.id_pabrik = pb.id)
                left join sm_supplier s on (p.id_supplier = s.id)
                left join sm_translucent tr on (p.id_users = tr.id)
                where p.id = '" . $id_penerimaan . "' order by p.id desc";
        return $this->db->query($sql)->result();
    }

    function getListDataFakturPenerimaan($id_penerimaan)
    {
        $sql = "select b.*, CONCAT_WS(' ',b.nama, b.kekuatan, st.nama, COALESCE(sd.nama,'')) as nama_barang, 
                p.*, s.nama as supplier, b.id as id_barang, stn.nama as kemasan, k.id_kemasan, 
                dp.expired, dp.jumlah, dp.hpp, dp.no_batch, (dp.harga*k.isi_satuan*k.isi) as harga, 
                dp.diskon_persen, dp.diskon_rupiah, kb.kode_penerimaan, (dp.harga*dp.jumlah*k.isi*k.isi_satuan) as subtotal, 
                kb.nama as jenis_sppb, kb.jenis
                from sm_penerimaan p
                join sm_detail_penerimaan dp on (p.id = dp.id_penerimaan)
                left join sm_kategori_barang kb on (p.id_kategori_barang = kb.id)
                join sm_kemasan_barang k on (dp.id_kemasan_barang = k.id)
                join sm_barang b on (k.id_barang = b.id)
                left join sm_sediaan sd on (b.id_sediaan = sd.id)
                left join sm_pabrik pb on (b.id_pabrik = pb.id)
                left join sm_satuan st on (b.satuan_kekuatan = st.id)
                left join sm_satuan stn on (k.id_kemasan = stn.id)
                left join sm_supplier s on (p.id_supplier = s.id)
                left join sm_translucent u on (p.id_users = u.id)
                where p.id = '" . $id_penerimaan . "' order by p.id desc";
        return $this->db->query($sql);
    }

    function getListDataFakturPenerimaanBankDarah($id_penerimaan)
    {
        $sql = "select b.*, CONCAT_WS(' ',b.nama, b.kekuatan, st.nama, COALESCE(sd.nama,'')) as nama_barang, 
                p.*, s.nama as supplier, b.id as id_barang, stn.nama as kemasan, k.id_kemasan, 
                dp.expired, dp.jumlah, dp.hpp, dp.no_batch, (dp.harga*k.isi_satuan*k.isi) as harga, 
                dp.diskon_persen, dp.diskon_rupiah, kb.kode_penerimaan, (dp.harga*dp.jumlah*k.isi*k.isi_satuan) as subtotal, 
                kb.nama as jenis_sppb, kb.jenis
                from sm_penerimaan_bank_darah p
                join sm_detail_penerimaan_bank_darah dp on (p.id = dp.id_penerimaan)
                left join sm_kategori_barang kb on (p.id_kategori_barang = kb.id)
                join sm_kemasan_barang k on (dp.id_kemasan_barang = k.id)
                join sm_barang b on (k.id_barang = b.id)
                left join sm_sediaan sd on (b.id_sediaan = sd.id)
                left join sm_pabrik pb on (b.id_pabrik = pb.id)
                left join sm_satuan st on (b.satuan_kekuatan = st.id)
                left join sm_satuan stn on (k.id_kemasan = stn.id)
                left join sm_supplier s on (p.id_supplier = s.id)
                left join sm_translucent u on (p.id_users = u.id)
                where p.id = '" . $id_penerimaan . "' order by p.id desc";
        return $this->db->query($sql);
    }

    function deleteDataPenerimaan($id)
    {
        $this->db->trans_begin();
        $this->db->where('id', $id, true)->delete('sm_penerimaan');
        if ($this->db->trans_status() === false) :
            $this->db->trans_rollback();
            $result['status'] = false;
        endif;
        $this->db->where('id_transaksi', $id, true)->where('transaksi', 'Penerimaan')->delete('sm_stok');
        if ($this->db->trans_status() === false) :
            $this->db->trans_rollback();
            $result['status'] = false;
            $result['message'] = 'Gagal menghapus data penerimaan!';
        else :
            $this->db->trans_commit();
            $result['status'] = true;
            $result['message'] = 'Berhasil menghapus data penerimaan!'; 
        endif;
        return $result;
    }

    function deleteDataPenerimaanBankDarah($id)
    {
        $this->db->trans_begin();
        $this->db->where('id', $id, true)->delete('sm_penerimaan_bank_darah');
        if ($this->db->trans_status() === false) :
            $this->db->trans_rollback();
            $result['status'] = false;
        endif;
        $this->db->where('id_transaksi', $id, true)->where('transaksi', 'Penerimaan')->delete('sm_stok_bank_darah');
        if ($this->db->trans_status() === false) :
            $this->db->trans_rollback();
            $result['status'] = false;
            $result['message'] = 'Gagal menghapus data penerimaan!';
        else :
            $this->db->trans_commit();
            $result['status'] = true;
            $result['message'] = 'Berhasil menghapus data penerimaan!'; 
        endif;
        return $result;
    }

    // koreksi stok
    function getSisaBarangKoreksiStok($param)
    {
        $id_unit = $this->session->userdata('id_unit');
        $this->db->select("COALESCE(sum(masuk) - sum(keluar), '0') as sisa");
        $this->db->from('sm_stok');
        $this->db->where('id_barang', $param['id_barang'], true);

        if ($param['ed'] !== '') {
            $this->db->where('ed', $param['ed']);
        }
		
		$this->db->where('id_unit', $this->session->userdata('id_unit'), true);
		
        // $this->db->get();
        // echo $this->db->last_query();
        return $this->db->get();
    }
    // end koreksi stok
}