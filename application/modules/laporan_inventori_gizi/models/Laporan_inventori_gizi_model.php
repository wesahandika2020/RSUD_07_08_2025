<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Laporan_inventori_gizi_model extends CI_Model
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
            '1'     => 'Laporan Persediaan / Sisa Stok Gizi',
            // '2'     => 'Laporan Pengeluaran Gizi',
            // '3'     => 'Laporan Pembelian Gizi',
            // '4'     => 'Laporan Permintaan Gizi',
            // '5'     => 'Laporan Pemakaian Gizi',
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
        WHERE kb.irt = 2
		ORDER BY b.id_kategori";

        $query = $this->db->query($sql)->result();
        $data =  array();
        $data[''] = 'Semua Kategori';
        foreach ($query as $key => $value) :
            $data[$value->id] = $value->nama;
        endforeach;

        return $data;
    }

    public function getKategoriWithValue()
    {
        $sql = "SELECT DISTINCT b.id_kategori as id , kb.nama
        FROM sm_barang b
        JOIN sm_kategori_barang kb on b.id_kategori = kb.id
        WHERE kb.irt = 2
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
                    where (b.nama_lengkap ilike '%" . $search["search"] . "%' or b.nama ilike '%" . $search["search"] . "%' ) " . $q . " and kb.irt = 2
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
                where (b.nama_lengkap ilike '%" . $search["search"] . "%' or b.nama ilike '%" . $search["search"] . "%' ) " . $q . " and kb.irt = 2
                ";

        $order = " order by b.nama ";
        $data["data"] = $this->db->query($select . $sql . $order . $limitation)->result();
        $data["total"] = $this->db->query($count . $sql)->row()->count;



        return $data;
    }

    public function getListDataMutasiGizi($limit, $start, $search)
    {
        // Atur timezone
        date_default_timezone_set('Asia/Jakarta');

        // Parameter unit dan kategori
        $unit_condition = $search["unit"] !== "" ? " AND bu.id_unit = ?" : " AND bu.id_unit = ?";
        $unit_value = $search["unit"] !== "" ? $search["unit"] : $this->session->userdata('id_unit');

        $kategori_condition = $search["kategori"] !== "" ? " AND b.id_kategori = ?" : "";
        $kategori_value = $search["kategori"] !== "" ? $search["kategori"] : null;

        // Query utama
        $sql = "
            SELECT DISTINCT
                b.id AS id_barang,
                kb.nama AS kategori, 
                b.code AS kode_barang,
                b.nama_lengkap AS nama_barang,
                s.nama AS satuan,
                sgdp.harga AS harga_satuan,
                '' AS unit,
                0 AS saldo_awal_unit,
                0 AS saldo_awal_rp,
                0 AS penerimaan_unit,
                0 AS penerimaan_rp,
                0 AS pengeluaran_unit,
                0 AS pengeluaran_rp,
                0 AS saldo_akhir_unit,
                0 AS saldo_akhir_rp,
                '' AS keterangan
            FROM sm_gizi_detail_penerimaan AS sgdp
            LEFT JOIN sm_gizi_penerimaan AS sgp ON sgp.id = sgdp.id_penerimaan
            LEFT JOIN sm_barang AS b ON b.id = sgdp.id_barang
            LEFT JOIN sm_satuan AS s ON s.id = b.satuan_kekuatan
            LEFT JOIN sm_kategori_barang AS kb ON b.id_kategori = kb.id
            LEFT JOIN sm_barang_unit bu ON b.id = bu.id_barang
            WHERE b.id IS NOT NULL
            $unit_condition
            $kategori_condition
            GROUP BY b.id, kb.nama, b.code, b.nama_lengkap, s.nama, sgdp.harga
        ";

        if ($limit !== 0) {
            $sql .= " LIMIT $limit OFFSET $start";
        }

        // Bind parameter
        $params = [$unit_value];
        if ($kategori_value) {
            $params[] = $kategori_value;
        }

        // Eksekusi query utama
        $result = $this->db->query($sql, $params)->result();

        // Perhitungan stok dan parameter sinkronisasi
        $periode_param = $this->generatePeriodeParam($search);

        foreach ($result as $i => $val) {
            // Perhitungan stok awal
            $stok_awal = $this->calculateStock($val->id_barang, $periode_param['stok_awal'], $search['unit']);
            $result[$i]->saldo_awal_unit = $stok_awal;
            $result[$i]->saldo_awal_rp = $stok_awal * $val->harga_satuan;

            // Perhitungan penerimaan dan pengeluaran
            $stok = $this->calculateStock($val->id_barang, $periode_param['stok'], $search['unit'], true);
            $result[$i]->penerimaan_unit = $stok['masuk'];
            $result[$i]->penerimaan_rp = $stok['masuk'] * $val->harga_satuan;
            $result[$i]->pengeluaran_unit = $stok['keluar'];
            $result[$i]->pengeluaran_rp = $stok['keluar'] * $val->harga_satuan;

            // Hitung saldo akhir
            $result[$i]->saldo_akhir_unit = $stok_awal + $stok['masuk'] - $stok['keluar'];
            $result[$i]->saldo_akhir_rp = $result[$i]->saldo_akhir_unit * $val->harga_satuan;
        }

        // Logika periode laporan
        $periode = "";
        if ($search["periode_laporan"] === "Bulanan") {
            $bulan_map = [
                '01' => 'Januari', '02' => 'Februari', '03' => 'Maret',
                '04' => 'April', '05' => 'Mei', '06' => 'Juni',
                '07' => 'Juli', '08' => 'Agustus', '09' => 'September',
                '10' => 'Oktober', '11' => 'November', '12' => 'Desember'
            ];
            $periode = $bulan_map[$search["bulan"]] . " " . $search["tahun"];
        } elseif ($search["periode_laporan"] === "Harian") {
            $periode = get_date_format(date2mysql($search['tanggal_harian']));
        } elseif ($search["periode_laporan"] === "Rentang Waktu") {
            $periode = get_date_format(date2mysql($search['tanggal_awal'])) . " s.d " . get_date_format(date2mysql($search['tanggal_akhir']));
        }

        // Persiapkan hasil akhir
        $data["periode"] = $periode;
        $data["data"] = $result;
        $data["jumlah"] = count($result);

        return $data;
    }


    // Fungsi baru query laporan gizi
    public function getListDataMutasiGiziNEW($limit, $start, $search)
    {
        $param = "";
        $unit = $search["unit"] !== "" ? $search["unit"] : $this->session->userdata('id_unit');
        $param .= " AND bu.id_unit = '{$unit}' ";
        $param .= " AND kb.jenis = 'Gizi' ";
        // $param .= $search["golongan"] !== "" ? " AND b.id_golongan = '{$search["golongan"]}' " : '';
        // $param .= $search["jenis"] !== "" ? " AND kb.jenis = '{$search["jenis"]}' " : '';
        // $param .= $search["kategori"] !== "" ? " AND b.id_kategori = '{$search["kategori"]}' " : '';
        // $param .= $search["fornas"] !== "" ? " AND b.fornas = '{$search["fornas"]}' " : '';
        // $param .= $search["generik"] !== "" ? " AND b.generik = '{$search["generik"]}' " : '';

        $limitation = ($limit !== 0) ? " LIMIT {$limit} OFFSET {$start} " : "";

        $select = "SELECT b.id AS id_barang, bu.id_unit, b.nama_lengkap AS nama_barang, 
                  b.hpp AS harga_satuan, b.id_golongan, kb.jenis, b.code AS kode_barang, kb.nama AS kategori, b.fornas ";
        $from = "FROM sm_barang b
             JOIN sm_barang_unit bu ON b.id = bu.id_barang
             JOIN sm_kategori_barang kb ON b.id_kategori = kb.id
             WHERE b.id IS NOT NULL {$param} ";
        $order = "ORDER BY b.nama_lengkap ASC";

        $result = $this->db->query($select . $from . $order . $limitation)->result();

        // Periode
        $periode = "";
        $bulanNama = [
            '01' => 'Januari', '02' => 'Februari', '03' => 'Maret', '04' => 'April',
            '05' => 'Mei', '06' => 'Juni', '07' => 'Juli', '08' => 'Agustus',
            '09' => 'September', '10' => 'Oktober', '11' => 'November', '12' => 'Desember'
        ];

        if ($search["periode_laporan"] === "Bulanan" && isset($bulanNama[$search["bulan"]])) {
            $periode = $bulanNama[$search["bulan"]] . " " . $search["tahun"];
        } elseif ($search["periode_laporan"] === "Harian") {
            $periode = get_date_format(date2mysql($search['tanggal_harian']));
        } elseif ($search["periode_laporan"] === "Rentang Waktu") {
            $periode = get_date_format(date2mysql($search['tanggal_awal'])) . " s.d " . get_date_format(date2mysql($search['tanggal_akhir']));
        }

        foreach ($result as $i => $val) {
            // Filter tambahan stok
            $param_new = " AND b.id_unit = '{$unit}' ";
            // $param_new = " AND br.jenis = 'Gizi' ";
            // $param_new .= $search["golongan"] !== "" ? " AND br.id_golongan = '{$search["golongan"]}' " : '';
            // $param_new .= $search["jenis"] !== "" ? " AND br.jenis = '{$search["jenis"]}' " : '';
            // $param_new .= $search["kategori"] !== "" ? " AND br.id_kategori = '{$search["kategori"]}' " : '';
            // $param_new .= $search["fornas"] !== "" ? " AND br.fornas = '{$search["fornas"]}' " : '';
            // $param_new .= $search["generik"] !== "" ? " AND br.generik = '{$search["generik"]}' " : '';

            // Filter waktu stok
            $param_stok = "";
            $param_stok_awal = "";

            if ($search["periode_laporan"] === "Harian" && $search["tanggal_harian"] !== "") {
                $tgl = date2mysql($search['tanggal_harian']);
                $param_stok = " AND TO_CHAR(b.waktu, 'yyyy-mm-dd') = '{$tgl}' ";
                $param_stok_awal = " AND TO_CHAR(b.waktu, 'yyyy-mm-dd') < '{$tgl}' ";
            } elseif ($search["periode_laporan"] === "Bulanan" && $search["bulan"] !== "" && $search["tahun"] !== "") {
                $param_stok = " AND TO_CHAR(b.waktu, 'mm/yyyy') = '{$search["bulan"]}/{$search["tahun"]}' ";
                $param_stok_awal = " AND TO_CHAR(b.waktu, 'yyyy-mm') < '{$search["tahun"]}-{$search["bulan"]}' ";
            } elseif ($search["periode_laporan"] === "Rentang Waktu" && $search["tanggal_awal"] !== "" && $search["tanggal_akhir"] !== "") {
                $tgl_awal = date2mysql($search['tanggal_awal']);
                $tgl_akhir = date2mysql($search['tanggal_akhir']);
                $param_stok = " AND b.waktu BETWEEN '{$tgl_awal} 00:00:00' AND '{$tgl_akhir} 23:59:59' ";
                $param_stok_awal = " AND b.waktu < '{$tgl_akhir} 00:00:00' ";
            }

            // Query utama stok
            $stok_query = "
                SELECT transaksi, SUM(masuk) AS total_masuk, SUM(keluar) AS total_keluar
                FROM sm_gizi_stok b
                JOIN sm_barang br ON b.id_barang = br.id
                WHERE b.id_barang = '{$val->id_barang}' {$param_new} {$param_stok}
                GROUP BY transaksi
            ";
            $stok_data = $this->db->query($stok_query)->result();
            $mapMasuk = $mapKeluar = [];

            foreach ($stok_data as $row) {
                $mapMasuk[$row->transaksi] = $row->total_masuk;
                $mapKeluar[$row->transaksi] = $row->total_keluar;
            }

            // Isi data ke objek
            $val->masuk  = array_sum($mapMasuk);
            $val->keluar = array_sum($mapKeluar);

            $val->masuk_pbf      = $mapMasuk['Penerimaan'] ?? 0;
            $val->masuk_unit     = ($mapMasuk['Penerimaan Distribusi'] ?? 0) + ($mapMasuk['Stok Opname'] ?? 0);
            $val->masuk_retur    = ($mapMasuk['Penerimaan Retur Distribusi'] ?? 0) + ($mapMasuk['Retur Penjualan'] ?? 0);
            $val->masuk_koreksi  = $mapMasuk['Koreksi Stok'] ?? 0;

            $val->keluar_jual    = $mapKeluar['Penjualan'] ?? 0;
            $val->keluar_unit    = $mapKeluar['Distribusi'] ?? 0;
            $val->keluar_retur   = $mapKeluar['Retur Penerimaan'] ?? 0;
            $val->keluar_hapus   = $mapKeluar['Pemusnahan'] ?? 0;
            $val->keluar_koreksi = $mapKeluar['Koreksi Stok'] ?? 0;

            $val->adj_koreksi = $val->masuk_koreksi - $val->keluar_koreksi;

            // Stok awal
            $stok_awal_query = "
                SELECT COALESCE(SUM(masuk) - SUM(keluar), 0) AS awal
                FROM sm_gizi_stok b
                JOIN sm_barang br ON b.id_barang = br.id
                WHERE b.id_barang = '{$val->id_barang}' {$param_new} {$param_stok_awal}
            ";
            $val->awal = $this->db->query($stok_awal_query)->row()->awal ?? 0;

            $val->sisa = $val->awal + $val->masuk - $val->keluar;

            $keterangan_query = "
                SELECT b.keterangan
                FROM sm_gizi_stok b
                JOIN sm_barang br ON b.id_barang = br.id
                WHERE b.id_barang = '{$val->id_barang}' {$param_new} {$param_stok_awal}
                order by b.waktu DESC
            ";
            $val->keterangan = $this->db->query($keterangan_query)->row()->keterangan ?? '-';
        }

        $jumlah = $this->db->query("SELECT COUNT(*) as count FROM (SELECT DISTINCT ON (b.id) b.* {$from}) AS jml")->row()->count;

        $this->db->close();

        return [
            "periode" => $periode,
            "data" => $result,
            "jumlah" => $jumlah
        ];
    }

    // Fungsi tambahan untuk menghitung stok
    private function calculateStock($id_barang, $param_stok, $unit, $is_total = false)
    {
        $unit_condition = $unit ? " AND id_unit = '$unit'" : " AND id_unit = '" . $this->session->userdata('id_unit') . "'";
        $stok_query = "
            SELECT 
                COALESCE(SUM(masuk), 0) AS masuk,
                COALESCE(SUM(keluar), 0) AS keluar
            FROM sm_gizi_stok
            WHERE id_barang = ?
            $unit_condition
            $param_stok
        ";
        $stok_data = $this->db->query($stok_query, [$id_barang])->row();
        return $is_total ? ['masuk' => $stok_data->masuk, 'keluar' => $stok_data->keluar] : ($stok_data->masuk - $stok_data->keluar);
    }

    // Fungsi tambahan untuk menghasilkan parameter periode
    private function generatePeriodeParam($search)
    {
        $param_stok_awal = "";
        $param_stok = "";

        if ($search["periode_laporan"] === "Harian" && $search["tanggal_harian"] !== "") {
            $date = date2mysql($search['tanggal_harian']);
            $param_stok_awal = " AND to_char(waktu, 'yyyy-mm-dd') < '$date'";
            $param_stok = " AND to_char(waktu, 'yyyy-mm-dd') = '$date'";
        } elseif ($search["periode_laporan"] === "Bulanan" && $search["bulan"] !== "" && $search["tahun"] !== "") {
            $month_year = $search["tahun"] . "-" . $search["bulan"];
            $param_stok_awal = " AND to_char(waktu, 'yyyy-mm') < '$month_year'";
            $param_stok = " AND to_char(waktu, 'yyyy-mm') = '$month_year'";
        } elseif ($search["periode_laporan"] === "Rentang Waktu" && $search["tanggal_awal"] !== "" && $search["tanggal_akhir"] !== "") {
            $start_date = date2mysql($search['tanggal_awal']);
            $end_date = date2mysql($search['tanggal_akhir']);
            $param_stok_awal = " AND waktu < '$start_date 00:00:00'";
            $param_stok = " AND waktu BETWEEN '$start_date 00:00:00' AND '$end_date 23:59:59'";
        }

        return ['stok_awal' => $param_stok_awal, 'stok' => $param_stok];
    }

    public function getListLaporanPengeluaran($limit, $start, $search)
    {
        $param = "";
        date_default_timezone_set('Asia/Jakarta');

        $search["barang_search"] !== "" ? $param .= " and kb.id_barang = '" . $search["barang_search"] . "' " : '';
        $search["unit_depo"] !== "" ? $param .= " and d.id_unit_tujuan = '" . $search["unit_depo"] . "' " : '';

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
                lpad(b.id::VARCHAR, 8, '0') kode, b.nama_lengkap gizi, skb.nama as kategori_barang, dd.jumlah_dikirim qty, 
                dd.jumlah_dikirim*b.hpp total ";

        $count  = "select count(*) as count from (select d.* ";
        $sql    = "from sm_gizi_distribusi d
                left join sm_gizi_detail_distribusi dd on d.id = dd.id_distribusi
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
        $this->db->where('kb.irt', 2, true);
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

        $this->db->select("s.*, b.nama_lengkap as nama_barang, kb.isi, kb.isi_satuan, s.keterangan as keterangan_pembayaran", false);
        $this->db->from("sm_gizi_detail_penerimaan as s");
        $this->db->join("sm_gizi_penerimaan as ip", "ip.id = s.id_penerimaan", "left");
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

    public function getListLaporanPembelianGizi($limit, $start, $search)
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

    public function getListLaporanPermintaanGizi($limit, $start, $search)
    {
        $param = "";

        $search["barang"] !== "" ? $param .= " and kb.id_barang = '" . $search["barang"] . "' " : '';
        $search["unit"] !== "" ? $param .= " and d.id_unit_asal = '" . $search["unit"] . "' " : '';

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
                sum(dd.jumlah) qty_minta, sum(dd.jumlah_dikirim) qty_kirim, b.hpp harga_satuan, sum(dd.jumlah_dikirim*b.hpp) total ";
        $select_sum = "select sum(dd.jumlah_dikirim*b.hpp) jml ";

        $count  = "select count(*) as count from ( " . $select;
        $sql    = "from sm_gizi_distribusi d
        left join sm_gizi_detail_distribusi dd on d.id = dd.id_distribusi
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

    public function getListLaporanPemakaianGizi($limit, $start, $search)
    {
        $param = "";

        $search["barang"] !== "" ? $param .= " and kb.id_barang = '" . $search["barang"] . "' " : '';
        $search["unit"] !== "" ? $param .= " and d.id_unit_asal = '" . $search["unit"] . "' " : '';

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
                sum(dd.jumlah) qty_minta, sum(dd.jumlah_dikirim) qty_kirim, b.hpp harga_satuan, sum(dd.jumlah_dikirim*b.hpp) total ";
        $select_sum = "select sum(dd.jumlah_dikirim*b.hpp) jml ";

        $count  = "select count(*) as count from ( " . $select;
        $sql    = "from sm_gizi_distribusi d
        left join sm_gizi_detail_distribusi dd on d.id = dd.id_distribusi
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
