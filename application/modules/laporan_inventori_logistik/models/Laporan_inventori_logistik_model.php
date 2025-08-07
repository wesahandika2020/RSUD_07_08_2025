<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Laporan_inventori_logistik_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->datetime = date('Y-m-d H:i:s');
    }

    public function list_laporan()
    {
        return array(
            ''      => '-- Pilih Laporan Inventori --',
            '1'     => 'Laporan Persediaan / Sisa Stok',
            '2'     => 'Laporan Pengeluaran Logistik',
            '3'     => 'Laporan Pembelian Logistik',
            '4'     => 'Laporan Permintaan Logistik',
            '5'     => 'Laporan Pemakaian Logistik',
        );
    }

    public function getPeriodeLaporan()
    {
        return array(
            'Bulanan'       => 'Bulanan',
            'Rentang Waktu' => 'Rentang Waktu',
            'Harian'        => 'Harian',
        );
    }


    public function getJenis()
    {
        $sql = "SELECT DISTINCT b.jenis
		FROM sm_barang b";

        $query = $this->db->query($sql)->result();
        $data =  array();
        $data[''] = 'Semua Jenis';
        foreach ($query as $key => $value) :
            $data[$value->jenis] = $value->jenis;
        endforeach;

        return $data;
    }

    public function getKategori()
    {
        $sql = "SELECT DISTINCT b.id_kategori as id , kb.nama
		FROM sm_barang b
		JOIN sm_kategori_barang kb on b.id_kategori = kb.id
        WHERE kb.irt = 1
		ORDER BY b.id_kategori";

        $query = $this->db->query($sql)->result();
        $data =  array();
        $data[''] = 'Semua Kategori';
        foreach ($query as $key => $value) :
            $data[$value->id] = $value->nama;
        endforeach;

        return $data;
    }

    public function getPembayaranBarang()
    {
        return array(
            ''          => 'Semua Pembayaran',
            'APBD'      => 'APBD',
            'BLUD'      => 'BLUD',
        );
    }

    public function getKategoriWithValue()
    {
        $sql = "SELECT DISTINCT b.id_kategori as id , kb.nama
        FROM sm_barang b
        JOIN sm_kategori_barang kb on b.id_kategori = kb.id
        WHERE kb.irt = 1
        ORDER BY b.id_kategori";

        $data = $this->db->query($sql)->result();

        return $data;
    }

    public function getUnitDepo()
    {
        $sql = "SELECT id, nama FROM sm_unit
		WHERE id IN ('303','304','305','295', '259')
		ORDER BY nama asc";

        $query = $this->db->query($sql)->result();
        $data =  array();
        // $data[''] = 'Semua Unit...';
        foreach ($query as $key => $value) :
            $data[$value->id] = $value->nama;
        endforeach;

        return $data;
    }

    public function getUnitDepoAll()
    {
        $sql = "SELECT id, nama FROM sm_unit
		WHERE id_instalasi = '32' AND is_gudang IS NULL
		ORDER BY nama asc";

        $query = $this->db->query($sql)->result();
        $data =  array();
        $data[''] = 'Semua Unit...';
        foreach ($query as $key => $value) :
            $data[$value->id] = $value->nama;
        endforeach;

        return $data;
    }

    function getAutoBarangPembelian($search, $start, $limit)
    {
        $q = NULL;

        $data["data"] = '';
        $data["total"] = 0;

        if ($search["jenissppb"] !== "") {
            $q .= " and b.id_kategori = '" . $search["jenissppb"] . "'";

            if ($search["jenis_barang"] !== "") {
                $q .= " and kb.jenis = '" . $search["jenis_barang"] . "'";
            }
            if ($search["aktif"] !== "") {
                $q .= " and b.aktif = '" . $search["aktif"] . "'";
            }

            $limitation = " limit " . $limit . " offset " . $start;
            $select = "select b.*, b.nama_lengkap as nama,
                        COALESCE(s.nama,'') as satuan_kekuatan, b.nama as nama_barang, sd.nama as sediaan ";
            $count = "select count(*) as count ";
            $sql = "from sm_barang b
                    join sm_kategori_barang kb on (b.id_kategori = kb.id)
                    left join sm_satuan s on (b.satuan_kekuatan = s.id)
                    left join sm_barang_penjamin bp on (bp.id_barang = b.id)
                    left join sm_sediaan sd on (b.id_sediaan = sd.id)
                    left join sm_pabrik pb on (b.id_pabrik = pb.id)
                    where (b.nama_lengkap ilike '%" . $search["search"] . "%' or b.nama ilike '%" . $search["search"] . "%' ) " . $q . " and kb.irt = 1
                    ";

            $order = " order by b.nama ";
            $data["data"] = $this->db->query($select . $sql . $order . $limitation)->result();
            $data["total"] = $this->db->query($count . $sql)->row()->count;
        }

        return $data;
    }

    function getAutoBarangNonKategori($search, $start, $limit)
    {
        $q = NULL;

        $data["data"] = '';
        $data["total"] = 0;


        if ($search["jenis_barang"] !== "") {
            $q .= " and kb.jenis = '" . $search["jenis_barang"] . "'";
        }
        if ($search["aktif"] !== "") {
            $q .= " and b.aktif = '" . $search["aktif"] . "'";
        }

        $limitation = " limit " . $limit . " offset " . $start;
        $select = "select b.*, b.nama_lengkap as nama,
                    COALESCE(s.nama,'') as satuan_kekuatan, b.nama as nama_barang, sd.nama as sediaan ";
        $count = "select count(*) as count ";
        $sql = "from sm_barang b
                join sm_kategori_barang kb on (b.id_kategori = kb.id)
                left join sm_satuan s on (b.satuan_kekuatan = s.id)
                left join sm_barang_penjamin bp on (bp.id_barang = b.id)
                left join sm_sediaan sd on (b.id_sediaan = sd.id)
                left join sm_pabrik pb on (b.id_pabrik = pb.id)
                where (b.nama_lengkap ilike '%" . $search["search"] . "%' or b.nama ilike '%" . $search["search"] . "%' ) " . $q . " and kb.irt = 1
                ";

        $order = " order by b.nama ";
        $data["data"] = $this->db->query($select . $sql . $order . $limitation)->result();
        $data["total"] = $this->db->query($count . $sql)->row()->count;



        return $data;
    }

    public function getListDataMutasiLogistik($limit, $start, $search)
    {
        $param = "";
        date_default_timezone_set('Asia/Jakarta');

        $search["unit"] !== "" ? $param .= " and bu.id_unit = '" . $search["unit"] . "' " : $param .= "and bu.id_unit = '" . $this->session->userdata('id_unit') . "' ";
        $search["kategori"] !== "" ? $param .= " and b.id_kategori = '" . $search["kategori"] . "' " : '';
        $search["pembayaran"] !== "" ? $param .= " and b.pembayaran = '" . $search["pembayaran"] . "' " : '';
        $query      = "";
        $limitation = "";
        if ($limit !== 0) :
            $limitation = " limit " . $limit . " offset " . $start;
        endif;

        $select = " select b.id as id_barang, bu.id_unit, b.nama_lengkap as nama_barang, b.hpp as harga_satuan, b.id_golongan, 
                    kb.jenis, kb.nama as kategori, b.pembayaran ,
                    (SELECT nama FROM sm_satuan WHERE id = (SELECT id_kemasan FROM sm_kemasan_barang kb WHERE kb.id_barang=b.id AND kb.default_kemasan=1 LIMIT 1)) satuan  ";

        $count  = "select count(*) as count from (select DISTINCT on (b.id) b.* ";
        $sql    = "FROM sm_barang b
				JOIN sm_barang_unit bu ON b.id = bu.id_barang
				JOIN sm_kategori_barang kb ON b.id_kategori = kb.id
				WHERE b.id is not null and kb.irt = 1 " . $param;

        // $group_by = " GROUP BY b.id, b.id_golongan, b.nama_lengkap, b.harga_satuan, b.kategori ";
        $order = " ORDER BY b.nama_lengkap asc ";

        $query = $this->db->query($select . $sql . $order . $limitation)->result();

        $periode = "";
        if ($search["periode_laporan"] === "Bulanan") {
            if ($search["bulan"] == '01') {
                $periode = "Januari " . $search["tahun"];
            } elseif ($search["bulan"] == '02') {
                $periode = "Februari " . $search["tahun"];
            } elseif ($search["bulan"] == '03') {
                $periode = "Maret " . $search["tahun"];
            } elseif ($search["bulan"] == '04') {
                $periode = "April " . $search["tahun"];
            } elseif ($search["bulan"] == '05') {
                $periode = "Mei " . $search["tahun"];
            } elseif ($search["bulan"] == '06') {
                $periode = "Juni " . $search["tahun"];
            } elseif ($search["bulan"] == '07') {
                $periode = "Juli " . $search["tahun"];
            } elseif ($search["bulan"] == '08') {
                $periode = "Agustus " . $search["tahun"];
            } elseif ($search["bulan"] == '09') {
                $periode = "September " . $search["tahun"];
            } elseif ($search["bulan"] == '10') {
                $periode = "Oktober " . $search["tahun"];
            } elseif ($search["bulan"] == '11') {
                $periode = "November " . $search["tahun"];
            } elseif ($search["bulan"] == '12') {
                $periode = "Desember " . $search["tahun"];
            }
        } elseif ($search["periode_laporan"] === "Harian") {
            $periode = get_date_format(date2mysql($search['tanggal_harian']));
        } elseif ($search["periode_laporan"] === "Rentang Waktu") {
            $periode = get_date_format(date2mysql($search['tanggal_awal'])) . " s.d " . get_date_format(date2mysql($search['tanggal_akhir']));
        }

        $result = $query;
        foreach ($result as $i => $val) :
            $param_new = "";
            $search["unit"] !== "" ? $param_new .= " and b.id_unit = '" . $search["unit"] . "' " : $param .= "and b.id_unit = '" . $this->session->userdata('id_unit') . "' ";
            $search["kategori"] !== "" ? $param_new .= " and br.id_kategori = '" . $search["kategori"] . "' " : '';
            $search["pembayaran"] !== "" ? $param .= " and br.pembayaran = '" . $search["pembayaran"] . "' " : '';

            $query_masuk = "SELECT COALESCE(sum(b.masuk), 0) masuk,  COALESCE(sum(b.keluar), 0) keluar, COALESCE(sum(b.masuk) - sum(b.keluar), 0) awal
							FROM sm_invrt_stok b
							JOIN sm_barang br ON b.id_barang = br.id
							WHERE b.id_barang is not null
							and b.id_barang = '" . $val->id_barang . "' " . $param_new;

            $param_stok_awal = "";
            if ($search["periode_laporan"] === "Harian") {
                if ($search["tanggal_harian"] !== "") :
                    $param_stok_awal .= " and to_char( b.waktu, 'yyyy-mm-dd' ) <'" . date2mysql($search['tanggal_harian']) . "' ";
                endif;
            } elseif ($search["periode_laporan"] === "Bulanan" & $search["bulan"] !== "" & $search["tahun"] !== "") {
                // $tgl_akhir = date('Y-m-t', strtotime($search["tahun"] . "-" . $search["bulan"] . "-01"));
                $param_stok_awal .= " and to_char(b.waktu, 'yyyy-mm') < '" . $search["tahun"] . "-" . $search["bulan"] . "' ";
            } elseif ($search["periode_laporan"] === "Rentang Waktu" & $search["tanggal_awal"] !== "" & $search["tanggal_akhir"] !== "") {
                if ($search["tanggal_awal"] !== "" & $search["tanggal_akhir"] !== "") :
                    $param_stok_awal .= " and b.waktu < '" . date2mysql($search['tanggal_akhir']) . " 00:00:00' ";
                endif;
            }

            $param_stok = "";
            if ($search["periode_laporan"] === "Harian") {
                if ($search["tanggal_harian"] !== "") :
                    $param_stok .= " and to_char( b.waktu, 'yyyy-mm-dd' ) ilike '%" . date2mysql($search['tanggal_harian']) . "' ";
                endif;
            } elseif ($search["periode_laporan"] === "Bulanan" & $search["bulan"] !== "" & $search["tahun"] !== "") {
                $param_stok .= " and to_char( b.waktu, 'mm/yyyy' ) = '" . $search["bulan"] . "/" . $search["tahun"] . "' ";
            } elseif ($search["periode_laporan"] === "Rentang Waktu" & $search["tanggal_awal"] !== "" & $search["tanggal_akhir"] !== "") {
                if ($search["tanggal_awal"] !== "" & $search["tanggal_akhir"] !== "") :
                    $param_stok .= " and b.waktu BETWEEN '" . date2mysql($search['tanggal_awal']) . " 00:00:00' AND '" . date2mysql($search['tanggal_akhir']) . " 23:59:59'";
                endif;
            }

            $result[$i]->masuk = $this->db->query($query_masuk . $param_stok)->row()->masuk;
            $result[$i]->keluar = $this->db->query($query_masuk . $param_stok)->row()->keluar;

            $result[$i]->masuk_pbf = $this->db->query($query_masuk . "and b.transaksi IN ('Penerimaan')" . $param_stok)->row()->masuk;
            $result[$i]->masuk_unit = $this->db->query($query_masuk . "and b.transaksi IN ('Penerimaan Distribusi', 'Stok Opname')" . $param_stok)->row()->masuk;
            $result[$i]->masuk_koreksi = $this->db->query($query_masuk . "and b.transaksi IN ('Koreksi Stok')" . $param_stok)->row()->masuk;

            $result[$i]->keluar_jual = $this->db->query($query_masuk . "and b.transaksi IN ('Penjualan')" . $param_stok)->row()->keluar;
            $result[$i]->keluar_unit = $this->db->query($query_masuk . "and b.transaksi IN ('Distribusi')" . $param_stok)->row()->keluar;
            $result[$i]->keluar_hapus = $this->db->query($query_masuk . "and b.transaksi IN ('Pemusnahan')" . $param_stok)->row()->keluar;
            $result[$i]->keluar_koreksi = $this->db->query($query_masuk . "and b.transaksi IN ('Koreksi Stok')" . $param_stok)->row()->keluar;

            $result[$i]->adj_koreksi = $result[$i]->masuk_koreksi - $result[$i]->keluar_koreksi;
            $result[$i]->awal = $this->db->query($query_masuk . $param_stok_awal)->row()->awal;
            $result[$i]->sisa = $result[$i]->awal + $result[$i]->masuk - $result[$i]->keluar;

        endforeach;

        $data["periode"] = $periode;
        $data["data"]    = $result;
        $data["jumlah"]  = $this->db->query($count . $sql . ") as jml")->row()->count;
        $this->db->close();

        return $data;
    }

    public function getListLaporanPengeluaran($limit, $start, $search)
    {
        $param = "";
        date_default_timezone_set('Asia/Jakarta');

        $search["barang_search"] !== "" ? $param .= " and kb.id_barang = '" . $search["barang_search"] . "' " : '';
        $search["unit_depo"] !== "" ? $param .= " and d.id_unit_tujuan = '" . $search["unit_depo"] . "' " : '';
        $search["pembayaran"] !== "" ? $param .= " and b.pembayaran = '" . $search["pembayaran"] . "' " : '';

        if ($search["periode_laporan"] === "Harian") {
            if ($search["tanggal_harian"] !== "") :
                $param .= " and to_char( d.tanggal_dikirim, 'dd/mm/yyyy') = '" . $search['tanggal_harian'] . "' ";
            endif;
        } elseif ($search["periode_laporan"] === "Bulanan" & $search["bulan"] !== "" & $search["tahun"] !== "") {
            $param .= " and to_char( d.tanggal_dikirim, 'yyyy/mm' ) = '" . $search["tahun"] . "/" . $search["bulan"] . "' ";
        } elseif ($search["periode_laporan"] === "Rentang Waktu" & $search["tanggal_awal"] !== "" & $search["tanggal_akhir"] !== "") {
            if ($search["tanggal_awal"] !== "" & $search["tanggal_akhir"] !== "") :
                $param .= " and d.tanggal_dikirim BETWEEN '" . date2mysql($search['tanggal_awal']) . "' AND '" . date2mysql($search['tanggal_akhir']) . "'";
            endif;
        }

        $query      = "";
        $limitation = "";
        if ($limit !== 0) :
            $limitation = " limit " . $limit . " offset " . $start;
        endif;

        $select = " select d.id id_distribusi, to_char(d.tanggal_dikirim, 'dd-mm-yyyy') tanggal_dikirim, d.kode_dikirim no_kirim, u.nama unit, su.nama unit_asal, 
                lpad(b.id::VARCHAR, 8, '0') kode, b.nama_lengkap logistik, skb.nama as kategori_barang, dd.jumlah_dikirim qty, 
                dd.jumlah_dikirim*b.hpp total, b.pembayaran, b.hpp as harga_satuan,
                (SELECT nama FROM sm_satuan WHERE id = (SELECT id_kemasan FROM sm_kemasan_barang kb WHERE kb.id_barang=b.id AND kb.default_kemasan=1 LIMIT 1)) satuan ";

        $count  = "select count(*) as count from (select d.* ";
        $sql    = "from sm_invrt_distribusi d
                left join sm_invrt_detail_distribusi dd on d.id = dd.id_distribusi
                left join sm_kemasan_barang kb on dd.id_kemasan_barang = kb.id
                left join sm_barang b on kb.id_barang = b.id
                left join sm_kategori_barang skb ON b.id_kategori = skb.id
                left join sm_unit u on d.id_unit_tujuan = u.id
                left join sm_unit su on d.id_unit_asal = su.id
                
                where d.tanggal_dikirim is not null " . $param;

        $order = " order by d.id asc ";

        $result = $this->db->query($select . $sql . $order . $limitation)->result();
        $sub_total = $this->db->query('select sum(dd.jumlah_dikirim*b.hpp) jml ' . $sql)->row()->jml;

        $periode = "";
        if ($search["periode_laporan"] === "Bulanan") {
            if ($search["bulan"] == '01') {
                $periode = "Januari " . $search["tahun"];
            } elseif ($search["bulan"] == '02') {
                $periode = "Februari " . $search["tahun"];
            } elseif ($search["bulan"] == '03') {
                $periode = "Maret " . $search["tahun"];
            } elseif ($search["bulan"] == '04') {
                $periode = "April " . $search["tahun"];
            } elseif ($search["bulan"] == '05') {
                $periode = "Mei " . $search["tahun"];
            } elseif ($search["bulan"] == '06') {
                $periode = "Juni " . $search["tahun"];
            } elseif ($search["bulan"] == '07') {
                $periode = "Juli " . $search["tahun"];
            } elseif ($search["bulan"] == '08') {
                $periode = "Agustus " . $search["tahun"];
            } elseif ($search["bulan"] == '09') {
                $periode = "September " . $search["tahun"];
            } elseif ($search["bulan"] == '10') {
                $periode = "Oktober " . $search["tahun"];
            } elseif ($search["bulan"] == '11') {
                $periode = "November " . $search["tahun"];
            } elseif ($search["bulan"] == '12') {
                $periode = "Desember " . $search["tahun"];
            }
        } elseif ($search["periode_laporan"] === "Harian") {
            $periode = get_date_format(date2mysql($search['tanggal_harian']));
        } elseif ($search["periode_laporan"] === "Rentang Waktu") {
            $periode = get_date_format(date2mysql($search['tanggal_awal'])) . " s.d " . get_date_format(date2mysql($search['tanggal_akhir']));
        }

        $data["periode"]    = $periode;
        $data["data"]       = $result;
        $data["sub_total"]  = $sub_total;
        $data["jumlah"]     = $this->db->query($count . $sql . ") as jml")->row()->count;
        $this->db->close();

        return $data;
    }

    private function sqlDataKategori($search)
    {

        $this->db->select("kb.id, kb.nama", false);
        $this->db->from('sm_kategori_barang as kb');
        $this->db->where('kb.irt', 1, true);
        if ($search["kategori"] !== "") {

            $this->db->where('kb.id', (int)$search["kategori"], true);
        }

        $this->db->order_by('kb.nama', 'asc');
    }

    private function sqlDataBarang($search, $id)
    {

        $this->db->select("b.id", false);
        $this->db->from('sm_barang as b');
        $this->db->where('b.id_kategori', $id, true);
        if ($search["barang"] !== "") {

            $this->db->where('b.id', (int)$search["barang"], true);
        }
        $this->db->order_by('b.nama', 'asc');
    }

    private function sqlDataStokBarang($search, $id)
    {

        $this->db->select("s.*, b.nama_lengkap as nama_barang, kb.isi, kb.isi_satuan, s.keterangan as keterangan_pembayaran,
                         (SELECT nama FROM sm_satuan WHERE id = (SELECT id_kemasan FROM sm_kemasan_barang WHERE id_barang=b.id AND default_kemasan=1 LIMIT 1)) satuan ", false);
        $this->db->from("sm_invrt_detail_penerimaan as s");
        $this->db->join("sm_invrt_penerimaan as ip", "ip.id = s.id_penerimaan", "left");
        $this->db->join("sm_barang as b", "b.id = s.id_barang", "left");
        $this->db->join("sm_kemasan_barang as kb", "kb.id = s.id_kemasan_barang", "left");
        $this->db->where('s.id_barang', $id, true);

        if ($search["unit"] !== "") {

            $this->db->where('ip.id_unit', (int)$search["unit"], true);
        }

        if ($search["periode_laporan"] === "Harian") {
            if ($search["tanggal_harian"] !== "") {
                $this->db->where(" to_char(ip.tanggal, 'yyyy-mm-dd') ILIKE '%" . date2mysql($search['tanggal_harian']) . "%' ");
            }
        } elseif ($search["periode_laporan"] === "Bulanan" && $search["bulan"] !== "" && $search["tahun"] !== "") {
            $this->db->where(" to_char(ip.tanggal, 'yyyy/mm') = '" . $search["tahun"] . "/" . $search["bulan"] . "' ");
        } elseif ($search["periode_laporan"] === "Rentang Waktu" && $search["tanggal_awal"] !== "" && $search["tanggal_akhir"] !== "") {
            if ($search["tanggal_awal"] !== "" && $search["tanggal_akhir"] !== "") {
                $this->db->where("ip.tanggal BETWEEN '" . date2mysql($search['tanggal_awal']) . " 00:00:00' AND '" . date2mysql($search['tanggal_akhir']) . " 23:59:59'");
            }
        }
    }

    public function getListLaporanPembelianLogistik($limit, $start, $search)
    {

        $this->sqlDataKategori($search);
        $dataKategori = $this->db->get()->result();

        foreach ($dataKategori as $a => $b) {

            $this->sqlDataBarang($search, (int)$b->id);
            $dataBarang = $this->db->get()->result();

            if (!empty($dataBarang)) {

                foreach ($dataBarang as $c => $d) {


                    $d->kategori = $dataKategori[$a]->nama;
                    $this->sqlDataStokBarang($search, (int)$d->id);

                    $dataStok = $this->db->get()->result();

                    foreach ($dataStok as $e => $f) {

                        $f->kategori = $d->kategori;

                        if (!isset($totalPembayaranPerKategoriPembayaran[$f->kategori][$f->pembayaran])) {
                            $totalPembayaranPerKategoriPembayaran[$f->kategori][$f->pembayaran] = 0;
                        }
                        if (!isset($totalKategori[$f->kategori])) {
                            $totalKategori[$f->kategori] = 0;
                        }

                        if (!isset($totalSemua[$f->pembayaran])) {
                            $totalSemua[$f->pembayaran] = 0;
                        }

                        if (!isset($allInOne)) {
                            $allInOne = 0;
                        }

                        $hitung = ($f->harga * $f->isi * $f->isi_satuan) * $f->jumlah;

                        $totalPembayaranPerKategoriPembayaran[$f->kategori][$f->pembayaran] += $hitung;
                        $totalKategori[$f->kategori] += $hitung;
                        $totalSemua[$f->pembayaran] += $hitung;
                        $allInOne += $hitung;

                        $result[] = $f;
                    }
                }
            }
        }

        $periode = "";
        if ($search["periode_laporan"] === "Bulanan") {
            if ($search["bulan"] == '01') {
                $periode = "Januari " . $search["tahun"];
            } elseif ($search["bulan"] == '02') {
                $periode = "Februari " . $search["tahun"];
            } elseif ($search["bulan"] == '03') {
                $periode = "Maret " . $search["tahun"];
            } elseif ($search["bulan"] == '04') {
                $periode = "April " . $search["tahun"];
            } elseif ($search["bulan"] == '05') {
                $periode = "Mei " . $search["tahun"];
            } elseif ($search["bulan"] == '06') {
                $periode = "Juni " . $search["tahun"];
            } elseif ($search["bulan"] == '07') {
                $periode = "Juli " . $search["tahun"];
            } elseif ($search["bulan"] == '08') {
                $periode = "Agustus " . $search["tahun"];
            } elseif ($search["bulan"] == '09') {
                $periode = "September " . $search["tahun"];
            } elseif ($search["bulan"] == '10') {
                $periode = "Oktober " . $search["tahun"];
            } elseif ($search["bulan"] == '11') {
                $periode = "November " . $search["tahun"];
            } elseif ($search["bulan"] == '12') {
                $periode = "Desember " . $search["tahun"];
            }
        } elseif ($search["periode_laporan"] === "Harian") {
            $periode = get_date_format(date2mysql($search['tanggal_harian']));
        } elseif ($search["periode_laporan"] === "Rentang Waktu") {
            $periode = get_date_format(date2mysql($search['tanggal_awal'])) . " s.d " . get_date_format(date2mysql($search['tanggal_akhir']));
        }

        if (isset($result)) {

            $totalData = count($result);

            $allData = range(1, $totalData);


            $xData = array_slice($allData, $start, $limit);

            if (!empty($xData)) {
                foreach ($xData as $g => $h) {
                    $i = (int)$h - 1;
                    $dataLimit[] = $result[(int)$i];
                }
            } else {

                $dataLimit = $xData;
            }

            $data["periode"]    = $periode;
            $data["data"]       = $dataLimit;
            $data["kategori"]   = $totalPembayaranPerKategoriPembayaran;
            $data["subtotal"]   = $totalKategori;
            $data["total"]      = $totalSemua;
            $data["all"]        = $allInOne;
            $data["totaldata"]  = $totalData;
            $data["jumlah"]     = count($result);
            $this->db->close();
        } else {

            $data["data"] = null;
        }

        return $data;
    }


    public function getListLaporanPembelian($limit, $start, $search)
    {

        $this->sqlDataKategori($search);
        $dataKategori = $this->db->get()->result();

        foreach ($dataKategori as $a => $b) {

            $this->sqlDataBarang($search, (int)$b->id);
            $dataBarang = $this->db->get()->result();

            if (!empty($dataBarang)) {

                foreach ($dataBarang as $c => $d) {


                    $d->kategori = $dataKategori[$a]->nama;
                    $this->sqlDataStokBarang($search, (int)$d->id);

                    $dataStok = $this->db->get()->result();

                    foreach ($dataStok as $e => $f) {

                        $f->kategori = $d->kategori;

                        if (!isset($totalPembayaranPerKategoriPembayaran[$f->kategori][$f->pembayaran])) {
                            $totalPembayaranPerKategoriPembayaran[$f->kategori][$f->pembayaran] = 0;
                        }
                        if (!isset($totalKategori[$f->kategori])) {
                            $totalKategori[$f->kategori] = 0;
                        }

                        if (!isset($totalSemua[$f->pembayaran])) {
                            $totalSemua[$f->pembayaran] = 0;
                        }

                        if (!isset($allInOne)) {
                            $allInOne = 0;
                        }

                        $hitung = ($f->harga * $f->isi * $f->isi_satuan) * $f->jumlah;

                        $totalPembayaranPerKategoriPembayaran[$f->kategori][$f->pembayaran] += $hitung;
                        $totalKategori[$f->kategori] += $hitung;
                        $totalSemua[$f->pembayaran] += $hitung;
                        $allInOne += $hitung;

                        $result[] = $f;
                    }
                }
            }
        }

        $periode = "";
        if ($search["periode_laporan"] === "Bulanan") {
            if ($search["bulan"] == '01') {
                $periode = "Januari " . $search["tahun"];
            } elseif ($search["bulan"] == '02') {
                $periode = "Februari " . $search["tahun"];
            } elseif ($search["bulan"] == '03') {
                $periode = "Maret " . $search["tahun"];
            } elseif ($search["bulan"] == '04') {
                $periode = "April " . $search["tahun"];
            } elseif ($search["bulan"] == '05') {
                $periode = "Mei " . $search["tahun"];
            } elseif ($search["bulan"] == '06') {
                $periode = "Juni " . $search["tahun"];
            } elseif ($search["bulan"] == '07') {
                $periode = "Juli " . $search["tahun"];
            } elseif ($search["bulan"] == '08') {
                $periode = "Agustus " . $search["tahun"];
            } elseif ($search["bulan"] == '09') {
                $periode = "September " . $search["tahun"];
            } elseif ($search["bulan"] == '10') {
                $periode = "Oktober " . $search["tahun"];
            } elseif ($search["bulan"] == '11') {
                $periode = "November " . $search["tahun"];
            } elseif ($search["bulan"] == '12') {
                $periode = "Desember " . $search["tahun"];
            }
        } elseif ($search["periode_laporan"] === "Harian") {
            $periode = get_date_format(date2mysql($search['tanggal_harian']));
        } elseif ($search["periode_laporan"] === "Rentang Waktu") {
            $periode = get_date_format(date2mysql($search['tanggal_awal'])) . " s.d " . get_date_format(date2mysql($search['tanggal_akhir']));
        }

        if (isset($result)) {

            $data["periode"]    = $periode;
            $data["data"]       = $result;
            $data["kategori"]   = $totalPembayaranPerKategoriPembayaran;
            $data["subtotal"]   = $totalKategori;
            $data["total"]      = $totalSemua;
            $data["all"]        = $allInOne;
            $this->db->close();
        } else {

            $data["data"] = null;
        }

        return $data;
    }

    public function getListLaporanPermintaanLogistik($limit, $start, $search)
    {
        $param = "";

        $search["barang"] !== "" ? $param .= " and kb.id_barang = '" . $search["barang"] . "' " : '';
        $search["unit"] !== "" ? $param .= " and d.id_unit_asal = '" . $search["unit"] . "' " : '';
        $search["pembayaran"] !== "" ? $param .= " and b.pembayaran = '" . $search["pembayaran"] . "' " : '';

        if ($search["periode_laporan"] === "Harian") {
            if ($search["tanggal_harian"] !== "") :
                $param .= " and to_char( d.tanggal_permintaan, 'dd/mm/yyyy') = '" . $search['tanggal_harian'] . "' ";
            endif;
        } elseif ($search["periode_laporan"] === "Bulanan" & $search["bulan"] !== "" & $search["tahun"] !== "") {
            $param .= " and to_char( d.tanggal_permintaan, 'yyyy/mm' ) = '" . $search["tahun"] . "/" . $search["bulan"] . "' ";
        } elseif ($search["periode_laporan"] === "Rentang Waktu" & $search["tanggal_awal"] !== "" & $search["tanggal_akhir"] !== "") {
            if ($search["tanggal_awal"] !== "" & $search["tanggal_akhir"] !== "") :
                $param .= " and d.tanggal_permintaan BETWEEN '" . date2mysql($search['tanggal_awal']) . "' AND '" . date2mysql($search['tanggal_akhir']) . "'";
            endif;
        }

        $limitation = "";
        if ($limit !== 0) :
            $limitation = " limit " . $limit . " offset " . $start;
        endif;

        $select = "select u.nama unit, lpad(b.id::VARCHAR, 8, '0') as kode, b.nama_lengkap nama_barang, s.nama satuan, b.pembayaran, skb.nama as kategori, 
                sum(dd.jumlah) qty_minta, sum(dd.jumlah_dikirim) qty_kirim, b.hpp harga_satuan, sum(dd.jumlah_dikirim*b.hpp) total ";
        $select_sum = "select sum(dd.jumlah_dikirim*b.hpp) jml ";

        $count  = "select count(*) as count from ( " . $select;
        $sql    = "from sm_invrt_distribusi d
        left join sm_invrt_detail_distribusi dd on d.id = dd.id_distribusi
        left join sm_kategori_barang skb on skb.id = d.id_kategori_barang
        left join sm_kemasan_barang kb on dd.id_kemasan_barang = kb.id
        left join sm_satuan s on kb.id_satuan = s.id
        left join sm_barang b on kb.id_barang = b.id
        left join sm_unit u on d.id_unit_asal = u.id
        
        where d.tanggal_dikirim is not null and d.id_unit_tujuan = '" . $this->session->userdata('id_unit') . "' " . $param;

        $group_by = " group by b.id, skb.nama, u.nama, s.nama ";
        $order = " order by b.nama_lengkap asc ";

        $result = $this->db->query($select . $sql . $group_by . $order . $limitation)->result();
        // $sub_total = $this->db->query($select_sum . $sql . $limitation)->row()->jml;

        $periode = "";
        if ($search["periode_laporan"] === "Bulanan") {
            if ($search["bulan"] == '01') {
                $periode = "Januari " . $search["tahun"];
            } elseif ($search["bulan"] == '02') {
                $periode = "Februari " . $search["tahun"];
            } elseif ($search["bulan"] == '03') {
                $periode = "Maret " . $search["tahun"];
            } elseif ($search["bulan"] == '04') {
                $periode = "April " . $search["tahun"];
            } elseif ($search["bulan"] == '05') {
                $periode = "Mei " . $search["tahun"];
            } elseif ($search["bulan"] == '06') {
                $periode = "Juni " . $search["tahun"];
            } elseif ($search["bulan"] == '07') {
                $periode = "Juli " . $search["tahun"];
            } elseif ($search["bulan"] == '08') {
                $periode = "Agustus " . $search["tahun"];
            } elseif ($search["bulan"] == '09') {
                $periode = "September " . $search["tahun"];
            } elseif ($search["bulan"] == '10') {
                $periode = "Oktober " . $search["tahun"];
            } elseif ($search["bulan"] == '11') {
                $periode = "November " . $search["tahun"];
            } elseif ($search["bulan"] == '12') {
                $periode = "Desember " . $search["tahun"];
            }
        } elseif ($search["periode_laporan"] === "Harian") {
            $periode = get_date_format(date2mysql($search['tanggal_harian']));
        } elseif ($search["periode_laporan"] === "Rentang Waktu") {
            $periode = get_date_format(date2mysql($search['tanggal_awal'])) . " s.d " . get_date_format(date2mysql($search['tanggal_akhir']));
        }

        $data["periode"]    = $periode;
        $data["data"]       = $result;
        // $data["sub_total"]  = $sub_total;
        $data["jumlah"]     = $this->db->query($count . $sql . $group_by . ") as jml")->row()->count;
        $this->db->close();

        return $data;
    }

    public function getListLaporanPemakaianLogistik($limit, $start, $search)
    {
        $param = "";

        $search["barang"] !== "" ? $param .= " and kb.id_barang = '" . $search["barang"] . "' " : '';
        $search["unit"] !== "" ? $param .= " and d.id_unit_asal = '" . $search["unit"] . "' " : '';
        $search["pembayaran"] !== "" ? $param .= " and b.pembayaran = '" . $search["pembayaran"] . "' " : '';

        if ($search["periode_laporan"] === "Harian") {
            if ($search["tanggal_harian"] !== "") :
                $param .= " and to_char( d.tanggal_permintaan, 'dd/mm/yyyy') = '" . $search['tanggal_harian'] . "' ";
            endif;
        } elseif ($search["periode_laporan"] === "Bulanan" & $search["bulan"] !== "" & $search["tahun"] !== "") {
            $param .= " and to_char( d.tanggal_permintaan, 'yyyy/mm' ) = '" . $search["tahun"] . "/" . $search["bulan"] . "' ";
        } elseif ($search["periode_laporan"] === "Rentang Waktu" & $search["tanggal_awal"] !== "" & $search["tanggal_akhir"] !== "") {
            if ($search["tanggal_awal"] !== "" & $search["tanggal_akhir"] !== "") :
                $param .= " and d.tanggal_permintaan BETWEEN '" . date2mysql($search['tanggal_awal']) . "' AND '" . date2mysql($search['tanggal_akhir']) . "'";
            endif;
        }

        $limitation = "";
        if ($limit !== 0) :
            $limitation = " limit " . $limit . " offset " . $start;
        endif;

        $select = "select u.nama unit, lpad(b.id::VARCHAR, 8, '0') as kode, b.nama_lengkap nama_barang, s.nama satuan, skb.nama as kategori, 
                sum(dd.jumlah) qty_minta, sum(dd.jumlah_dikirim) qty_kirim, b.hpp harga_satuan, sum(dd.jumlah_dikirim*b.hpp) total, b.pembayaran ";
        $select_sum = "select sum(dd.jumlah_dikirim*b.hpp) jml ";

        $count  = "select count(*) as count from ( " . $select;
        $sql    = "from sm_invrt_distribusi d
        left join sm_invrt_detail_distribusi dd on d.id = dd.id_distribusi
        left join sm_kategori_barang skb on skb.id = d.id_kategori_barang
        left join sm_kemasan_barang kb on dd.id_kemasan_barang = kb.id
        left join sm_satuan s on kb.id_satuan = s.id
        left join sm_barang b on kb.id_barang = b.id
        left join sm_unit u on d.id_unit_asal = u.id
        
        where d.tanggal_dikirim is not null and d.id_unit_tujuan = '" . $this->session->userdata('id_unit') . "' " . $param;

        $group_by = " group by b.id, skb.nama, u.nama, s.nama ";
        $order = " order by b.nama_lengkap asc ";

        $result = $this->db->query($select . $sql . $group_by . $order . $limitation)->result();
        // $sub_total = $this->db->query($select_sum . $sql . $limitation)->row()->jml;

        $periode = "";
        if ($search["periode_laporan"] === "Bulanan") {
            if ($search["bulan"] == '01') {
                $periode = "Januari " . $search["tahun"];
            } elseif ($search["bulan"] == '02') {
                $periode = "Februari " . $search["tahun"];
            } elseif ($search["bulan"] == '03') {
                $periode = "Maret " . $search["tahun"];
            } elseif ($search["bulan"] == '04') {
                $periode = "April " . $search["tahun"];
            } elseif ($search["bulan"] == '05') {
                $periode = "Mei " . $search["tahun"];
            } elseif ($search["bulan"] == '06') {
                $periode = "Juni " . $search["tahun"];
            } elseif ($search["bulan"] == '07') {
                $periode = "Juli " . $search["tahun"];
            } elseif ($search["bulan"] == '08') {
                $periode = "Agustus " . $search["tahun"];
            } elseif ($search["bulan"] == '09') {
                $periode = "September " . $search["tahun"];
            } elseif ($search["bulan"] == '10') {
                $periode = "Oktober " . $search["tahun"];
            } elseif ($search["bulan"] == '11') {
                $periode = "November " . $search["tahun"];
            } elseif ($search["bulan"] == '12') {
                $periode = "Desember " . $search["tahun"];
            }
        } elseif ($search["periode_laporan"] === "Harian") {
            $periode = get_date_format(date2mysql($search['tanggal_harian']));
        } elseif ($search["periode_laporan"] === "Rentang Waktu") {
            $periode = get_date_format(date2mysql($search['tanggal_awal'])) . " s.d " . get_date_format(date2mysql($search['tanggal_akhir']));
        }

        $data["periode"]    = $periode;
        $data["data"]       = $result;
        // $data["sub_total"]  = $sub_total;
        $data["jumlah"]     = $this->db->query($count . $sql . $group_by . ") as jml")->row()->count;
        $this->db->close();

        return $data;
    }
}
