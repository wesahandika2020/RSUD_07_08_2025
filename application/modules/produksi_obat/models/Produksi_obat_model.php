<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Produksi_obat_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
	}

	function getAutoBarangStok2($search, $start, $limit)
	{
		$q      = null;
		$having = null;
		if ($search["penjamin"] !== "") :
		endif;
		if ($search["cekstok"] !== "") :
		endif;
		if ($search["is_farmasi"] !== "") :
			$q .= " and kb.jenis = 'Farmasi'";
		endif;


		$limitation = " limit ".$limit." offset ".$start;
		$order      = " order by b.nama";
		$select     = "select b.*, 
                    bu.id_unit, b.nama_lengkap as nama,
                    COALESCE(s.nama,'') as satuan_kekuatan, 
                    (b.hpp+(b.hpp*(b.margin_resep/100))) as harga_jual ";
		$count      = "select count(*) as count ";
		$sql        = "from sm_barang b
                join sm_barang_unit bu on (bu.id_barang = b.id)
                join sm_kategori_barang kb on (b.id_kategori = kb.id)
                left join sm_satuan s on (b.satuan_kekuatan = s.id)
                where b.is_active = 'Ya'
                and b.id_kategori != '7'
                and b.nama ilike ('%".$search["search"]."%') ".$q;
		$result     = $this->db->query($select.$sql.$order.$limitation)->result();
		// echo $this->db->last_query(); die;
		foreach ($result as $key => $value) :
			$sql_child             = "select COALESCE(SUM(masuk)-SUM(keluar),0) as sisa
                        from sm_stok 
                        where id_barang = '".$value->id."'
                        and ed > '".date("Y-m-d")."'
                        and id_unit = '".$value->id_unit."'";
			$query                 = $this->db->query($sql_child)->row();
			$result[$key]->sisa    = $query->sisa ?? 0;
			$result[$key]->id_stok = $query->id ?? 0;
		endforeach;

		$hasil = array();
		foreach ($result as $i => $val) :
			if (0 < (double) $val->sisa && $val->sisa !== "") :
				$hasil[] = $val;
			endif;
		endforeach;

		$data["data"]  = $hasil;
		$data["total"] = count($hasil);

		return $data;
	}

	function getAutoBarangStok3($search, $start, $limit)
	{
		$q      = null;
		$having = null;
		if ($search["penjamin"] !== "") :
		endif;
		if ($search["cekstok"] !== "") :
		endif;
		if ($search["is_farmasi"] !== "") :
			$q .= " and kb.jenis = 'Farmasi'";
		endif;
		$check = $this->db->query("select id_unit_default from sm_unit where id = '".$this->session->userdata("id_unit")."'")->row();
		if ($check->id_unit_default === null) :
			$id_unit = $this->session->userdata("id_unit");
		else :
			$id_unit = $check->id_unit_default;
		endif;

		$limitation = " limit ".$limit." offset ".$start;
		$order      = " order by b.nama";
		$select     = "select b.*, 
                    bu.id_unit, b.nama_lengkap as nama,
                    COALESCE(s.nama,'') as satuan_kekuatan, 
                    (b.hpp+(b.hpp*(b.margin_resep/100))) as harga_jual ";
		$count      = "select count(*) as count ";
		$sql        = "from sm_barang b
                join sm_barang_unit bu on (bu.id_barang = b.id)
                join sm_kategori_barang kb on (b.id_kategori = kb.id)
                left join sm_satuan s on (b.satuan_kekuatan = s.id)
                where b.is_active = 'Ya'
                and b.id_kategori != '7'
                and bu.id_unit = '".$id_unit."'
                and b.nama ilike ('%".$search["search"]."%') ".$q;
		$result     = $this->db->query($select.$sql.$order.$limitation)->result();
//		 echo $this->db->last_query(); die;
		foreach ($result as $key => $value) :
			$sql_child             = "select COALESCE(SUM(a.masuk)-SUM(a.keluar),0) as sisa
			from sm_stok a 
			where a.id_barang = '".$value->id."'
			and a.ed > '".date("Y-m-d")."'
			and a.id_unit = '".$value->id_unit."'
			having COALESCE(SUM(a.masuk)-SUM(a.keluar),0) > 0";
			$query                 = $this->db->query($sql_child)->row();
			$result[$key]->sisa    = $query->sisa ?? 0;
			$result[$key]->id_stok = $query->id ?? 0;
		endforeach;

		$hasil = array();
		foreach ($result as $i => $val) :
			if (0 < (double) $val->sisa && $val->sisa !== "") :
				$hasil[] = $val;
			endif;
		endforeach;

		$data["data"]  = $hasil;
		$data["total"] = count($hasil);

		return $data;
	}

	function simpanProduksiObat($produksi)
	{
		$this->db->trans_begin();

		$check = $this->db->query("select id_unit_default from sm_unit where id = '".$this->session->userdata("id_unit")."'")->row();
		if ($check->id_unit_default === null) :
			$id_unit = $this->session->userdata("id_unit");
		else :
			$id_unit = $check->id_unit_default;
		endif;

		$bahanProduksi = [];
		foreach ($produksi['bahan_produksi'] as $key => $bahan_produksi) {
			$ed = $this->db->select('ed')
				->from('sm_stok')
				->where('id_barang', $bahan_produksi)
				->where('id_unit', $id_unit)
				->order_by('ed', 'desc')
				->limit(1)
				->get()->row();

			$dataStok = [
				'waktu'      => date('Y-m-d H:i:s'),
				'transaksi'  => 'Bahan Produksi Obat',
				'id_barang'  => $bahan_produksi,
				'ed'         => $ed->ed,
				'keluar'     => $produksi['qty_bahan'][$key],
				'keterangan' => 'Produksi Farmasi',
				'id_unit'    => $this->session->userdata('id_unit'),
				'id_users'   => $this->session->userdata('id_translucent'),
			];

			$this->db->insert('sm_stok', $dataStok);

			$bahanProduksi[] = [
				'id_barang' => (int) $bahan_produksi,
				'qty'       => (int) $produksi['qty_bahan'][$key]
			];
		}

		$hasilProduksi = [];
		foreach ($produksi['hasil_produksi'] as $key => $hasil_produksi) {
			$ed = $this->db->select('ed')
				->from('sm_stok')
				->where('id_barang', $hasil_produksi)
				->order_by('ed', 'desc')
				->limit(1)
				->get()->row();

			// insert hasil produksi ke stok
			$dataStok = [
				'waktu'      => date('Y-m-d H:i:s'),
				'transaksi'  => 'Produksi Obat',
				'id_barang'  => $hasil_produksi,
				'ed'         => $ed->ed,
				'masuk'      => $produksi['qty_hasil'][$key],
				'keterangan' => 'Produksi Farmasi',
				'id_unit'    => $this->session->userdata('id_unit'),
				'id_users'   => $this->session->userdata('id_translucent'),
			];

			$this->db->insert('sm_stok', $dataStok);

			$hasilProduksi[] = [
				'id_barang' => (int) $hasil_produksi,
				'qty'       => (int) $produksi['qty_hasil'][$key]
			];
		}

		// insert data produksi ke sm_produksi
		$dataProduksi = [
			'hasil_produksi' => json_encode($hasilProduksi),
			'bahan_produksi' => json_encode($bahanProduksi),
			'kode'           => $this->generateKodeProduksi(),
			'id_user'        => $this->session->userdata('id_translucent'),
			'created_at'     => date('Y-m-d H:i:s'),
			'updated_at'     => date('Y-m-d H:i:s'),
		];

		$this->db->insert('sm_produksi', $dataProduksi);


		if ($this->db->trans_status() === false) {
			$this->db->trans_rollback();
			$result['status']  = false;
			$result['message'] = "Gagal menyimpan data produksi";
		} else {
			$this->db->trans_commit();
			$result['status']  = true;
			$result['message'] = "Berhasil menyimpan data produksi";
		}

		return $result;
	}

	function generateKodeProduksi()
	{
		$tahun = date('Y');
		$bulan = date('m');
		$row   = $this->db->query("select kode from sm_produksi where date_part('month', created_at) = ".$bulan." and date_part('year', created_at) = ".$tahun." and kode is not NULL order by kode desc limit 1")->row();
		if ($row) :
			$kode     = explode('/', $row->kode);
			$get_kode = $kode[3];
		endif;
		if ( ! isset($get_kode)) {
			$auto = "0001";
		} else {
			$auto = str_pad((string) ($get_kode + 1), 4, "0", STR_PAD_LEFT);
		}
		$result = "PR/PR/".$tahun."-".$bulan."/".$auto;

		return $result;
	}

	public function getListProduksi($limit, $start, $search)
	{
		$limitation = " limit ".$limit." offset ".$start;

		$param = "";
		if ($search["periode_laporan"] === "Harian") {
			if ($search["tanggal_harian"] !== "") :
				$param = " and to_char( prod.created_at, 'yyyy-mm-dd' ) ='" . date2mysql($search['tanggal_harian']) . "' ";
			endif;
		} elseif ($search["periode_laporan"] === "Bulanan" & $search["bulan"] !== "" & $search["tahun"] !== "") {
			$param = " and to_char( prod.created_at, 'YYYY-MM' ) = '" . $search["tahun"] . "-" . $search["bulan"] . "' ";
		} elseif ($search["periode_laporan"] === "Rentang Waktu" & $search["tanggal_awal"] !== "" & $search["tanggal_akhir"] !== "") {
			if ($search["tanggal_awal"] !== "" & $search["tanggal_akhir"] !== "") :
				$param = " and prod.created_at BETWEEN '".date2mysql($search['tanggal_awal'])." 00:00:00' AND '".date2mysql($search['tanggal_akhir'])." 23:59:59' ";
			endif;
		}
		if (isset($search['no_produksi']) && $search['no_produksi'] !== '') {
			$param .= " and prod.kode = '{$search['no_produksi']}' ";
		}

		$select1 = " select prod.id, date(prod.created_at), prod.kode,
        to_char(sum(b.hpp*(e.bahan->'qty')::text::int), 'FM999999999.00') as total_bahan_produksi ";

		$select2 = " select to_char(sum(b.hpp*(e.hasil->'qty')::text::int), 'FM999999999.00') as total_hasil_produksi ";

		$count = "select count(*) as count from (select DISTINCT on (prod.id) prod.* ";
		$sql1  = "from sm_produksi prod
		join lateral JSONB_ARRAY_ELEMENTS(prod.bahan_produksi) AS e(bahan) ON TRUE
		join sm_barang b on (e.bahan->'id_barang')::text::int = b.id where prod.id is not null ".$param;

		$sql2 = "from sm_produksi prod
		join lateral JSONB_ARRAY_ELEMENTS(prod.hasil_produksi) AS e(hasil) ON TRUE
		join sm_barang b on (e.hasil->'id_barang')::text::int = b.id where prod.id is not null ".$param;

		$groupBy = " group by prod.kode, prod.created_at, prod.id";
		$orderBy = " order by prod.id desc";

		$query1 = $this->db->query($select1.$sql1.$groupBy.$orderBy.$limitation)->result();
		$query2 = $this->db->query($select2.$sql2.$groupBy.$orderBy.$limitation)->result();

		foreach ($query1 as $i => $q){
			$q->total_hasil_produksi = $query2[$i]->total_hasil_produksi;
		}

		$data["data"]   = $query1;
		$data["jumlah"] = (int) $this->db->query($count.$sql1.") as jml")->row()->count;

		return $data;
	}

	public function getDetailBahanProduksiObat($id)
	{
		return $this->db->query("
		select b.nama,
		       (e.bahan->'qty')::text::int as qty ,
		       b.hpp as harga_satuan,
		       b.hpp*(e.bahan->'qty')::text::int as subtotal,
		       COALESCE(s.nama,'') as satuan
		from sm_produksi prod
		join lateral JSONB_ARRAY_ELEMENTS(prod.bahan_produksi) AS e(bahan) ON TRUE
		join sm_barang b on (e.bahan->'id_barang')::text::int = b.id
		left join sm_kemasan_barang kb on b.id = kb.id_barang
		left join sm_satuan s on kb.id_satuan = s.id
		where prod.id = {$id}
		group by b.hpp, b.nama, e.bahan, s.nama
		")->result();
	}

	public function getDetailHasilProduksiObat($id)
	{
		return $this->db->query("
		select b.nama,
		       (e.bahan->'qty')::text::int as qty ,
		       b.hpp as harga_satuan,
		       b.hpp*(e.bahan->'qty')::text::int as subtotal,
		       COALESCE(s.nama,'') as satuan
		from sm_produksi prod
		join lateral JSONB_ARRAY_ELEMENTS(prod.hasil_produksi) AS e(bahan) ON TRUE
		join sm_barang b on (e.bahan->'id_barang')::text::int = b.id
		left join sm_kemasan_barang kb on b.id = kb.id_barang
		left join sm_satuan s on kb.id_satuan = s.id
		where prod.id = {$id}
		group by b.hpp, b.nama, e.bahan, s.nama
		")->result();
	}

	function getPeriodeLaporan()
	{
		return array(
			'Harian'        => 'Harian',
			'Bulanan'       => 'Bulanan',
			'Rentang Waktu' => 'Rentang Waktu',
		);
	}
}
