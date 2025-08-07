<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Laporan_inventory_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->datetime = date('Y-m-d H:i:s');
    }

    public function list_laporan()
    {
        return array(
            ''      => '-- Pilih Laporan Inventory --',
            '1'     => 'Laporan Mutasi Obat',
            '2'     => 'Laporan Buku Penjualan',
            '3'     => 'Laporan Penjualan Unit',
            '4'     => 'Laporan Pemakaian Obat/Alkes (Unit)',
            '5'     => 'Laporan Pemakaian Obat/Alkes (All Unit)',
            '6'     => 'Laporan Pengeluaran Obat',
            '7'     => 'Laporan Permintaan Obat',
            '8'     => 'Laporan Permintaan Unit Ke Gudang',
            '9'     => 'Laporan Permintaan Obat Tak Terlayani',
            '10'    => 'Stok Opname',
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

    public function getJenisPasien()
    {
        return array(
            ''              => 'Semua Pasien',
            'Rawat Inap'    => 'Rawat Inap',
            'Rawat Jalan'   => 'Rawat Jalan',
            'IGD'           => 'IGD',
            'Hemodialisa'   => 'Hemodialisa',
        );
    }

    public function getJaminan()
    {
        return array(
            ''              => 'Semua Jaminan',
            'Asuransi'      => 'Asuransi',
            'Perusahaan'    => 'Perusahaan',
            'Karyawan'      => 'Karyawan',
            'Gratis'        => 'Gratis',
            'Tunai'         => 'Tunai',
        );
    }

    public function getGolongan()
    {
        $sql = "SELECT DISTINCT b.id_golongan as id , g.nama
		FROM sm_barang b
		JOIN sm_golongan g on b.id_golongan = g.id
		ORDER BY b.id_golongan";

        $query = $this->db->query($sql)->result();
        $data =  array();
        $data[''] = 'Semua Golongan';
        foreach ($query as $key => $value) :
            $data[$value->id] = $value->nama;
        endforeach;

        return $data;
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
		ORDER BY b.id_kategori";

        $query = $this->db->query($sql)->result();
        $data =  array();
        $data[''] = 'Semua Kategori';
        foreach ($query as $key => $value) :
            $data[$value->id] = $value->nama;
        endforeach;

        return $data;
    }

    public function getFornas()
    {
        $sql = "SELECT DISTINCT b.fornas
		FROM sm_barang b
		WHERE b.fornas IS NOT NULL 
		ORDER BY b.fornas DESC";

        $query = $this->db->query($sql)->result();
        $data =  array();
        $data[''] = 'Semua...';
        foreach ($query as $key => $value) :
            $data[$value->fornas] = $value->fornas;
        endforeach;

        return $data;
    }

    public function getGenerik()
    {
        $sql = "SELECT DISTINCT b.generik
		FROM sm_barang b
		WHERE b.generik IS NOT NULL 
		ORDER BY b.generik DESC";

        $query = $this->db->query($sql)->result();
        $data =  array();
        $data[''] = 'Semua...';
        foreach ($query as $key => $value) :
            $data[$value->generik] = $value->generik;
        endforeach;

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

    public function getListDataLaporanMutasiObat($limit, $start, $search)
    {
        $param = "";

        $search["unit"] !== "" ? $param .= " and bu.id_unit = '" . $search["unit"] . "' " : $param .= "and bu.id_unit = '" . $this->session->userdata('id_unit') . "' ";
        $search["golongan"] !== "" ? $param .= " and b.id_golongan = '" . $search["golongan"] . "' " : '';
        $search["jenis"] !== "" ? $param .= " and kb.jenis = '" . $search["jenis"] . "' " : '';
        $search["kategori"] !== "" ? $param .= " and b.id_kategori = '" . $search["kategori"] . "' " : '';
        $search["fornas"] !== "" ? $param .= " and b.fornas = '" . $search["fornas"] . "' " : '';
        $search["generik"] !== "" ? $param .= " and b.generik = '" . $search["generik"] . "' " : '';

        $query      = "";
        $limitation = "";
        if ($limit !== 0) :
            $limitation = " limit " . $limit . " offset " . $start;
        endif;

        $select = " select b.id as id_barang, bu.id_unit, b.nama_lengkap as nama_barang, b.hpp as harga_satuan, b.id_golongan, kb.jenis, kb.nama as kategori, b.fornas ";

        $count  = "select count(*) as count from (select DISTINCT on (b.id) b.* ";
        $sql    = "FROM sm_barang b
				JOIN sm_barang_unit bu ON b.id = bu.id_barang
				JOIN sm_kategori_barang kb ON b.id_kategori = kb.id
				WHERE b.id is not null " . $param;

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
            $search["golongan"] !== "" ? $param_new .= " and br.id_golongan = '" . $search["golongan"] . "' " : '';
            $search["jenis"] !== "" ? $param_new .= " and br.jenis = '" . $search["jenis"] . "' " : '';
            $search["kategori"] !== "" ? $param_new .= " and br.id_kategori = '" . $search["kategori"] . "' " : '';
            $search["fornas"] !== "" ? $param_new .= " and br.fornas = '" . $search["fornas"] . "' " : '';
            $search["generik"] !== "" ? $param_new .= " and br.generik = '" . $search["generik"] . "' " : '';

            $query_masuk = "SELECT COALESCE(sum(b.masuk), 0) masuk,  COALESCE(sum(b.keluar), 0) keluar, COALESCE(sum(b.masuk) - sum(b.keluar), 0) awal
							FROM sm_stok b
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
            $result[$i]->masuk_retur = $this->db->query($query_masuk . "and b.transaksi IN ('Penerimaan Retur Distribusi', 'Retur Penjualan')" . $param_stok)->row()->masuk;
            $result[$i]->masuk_koreksi = $this->db->query($query_masuk . "and b.transaksi IN ('Koreksi Stok')" . $param_stok)->row()->masuk;

            $result[$i]->keluar_jual = $this->db->query($query_masuk . "and b.transaksi IN ('Penjualan')" . $param_stok)->row()->keluar;
            $result[$i]->keluar_unit = $this->db->query($query_masuk . "and b.transaksi IN ('Distribusi')" . $param_stok)->row()->keluar;
            $result[$i]->keluar_retur = $this->db->query($query_masuk . "and b.transaksi IN ('Retur Penerimaan')" . $param_stok)->row()->keluar;
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

    public function getListLaporanBukuPenjualan($limit, $start, $search)
    {
        $param = "";
        $param_new = "";

        if ($search["unit_depo"] !== "" && $search["unit_depo"] !== "259") {
            $param .= " and rt.id_unit = '" . $search["unit_depo"] . "' ";
        }
        if ($search["unit_depo"] == "259") {
            $param .= " and rt.id_unit = '295' ";
            $param .= " and pd.jenis_rawat = 'Jalan' and lp.jenis_layanan = 'Hemodialisa' ";
        }

        if ($search["jenis_pasien"] !== "") :
            if ($search["jenis_pasien"] == "Rawat Inap") :
                $param .= " and pd.jenis_rawat = 'Inap' ";
            elseif ($search["jenis_pasien"] == "Rawat Jalan") :
                $param .= " and pd.jenis_rawat = 'Jalan' and lp.jenis_layanan != 'IGD' ";
            elseif ($search["jenis_pasien"] == "IGD") :
                $param .= " and pd.jenis_rawat = 'Jalan' and lp.jenis_layanan = 'IGD' ";
            endif;
        endif;

        if ($search["periode_laporan"] === "Harian") {
            if ($search["tanggal_harian"] !== "") :
                $param .= " and to_char( pn.waktu_diserahkan, 'yyyy-mm-dd' ) ilike '%" . date2mysql($search['tanggal_harian']) . "' ";
            endif;
        } elseif ($search["periode_laporan"] === "Bulanan" & $search["bulan"] !== "" & $search["tahun"] !== "") {
            $param .= " and to_char( pn.waktu_diserahkan, 'yyyy/mm' ) = '" . $search["tahun"] . "/" . $search["bulan"] . "' ";
        } elseif ($search["periode_laporan"] === "Rentang Waktu" & $search["tanggal_awal"] !== "" & $search["tanggal_akhir"] !== "") {
            if ($search["tanggal_awal"] !== "" & $search["tanggal_akhir"] !== "") :
                $param .= " and pn.waktu_diserahkan BETWEEN '" . date2mysql($search['tanggal_awal']) . " 00:00:00' AND '" . date2mysql($search['tanggal_akhir']) . " 23:59:59'";
            endif;
        }

        if ($search["pasien_search"] !== "") :
            $param .= " and p.id= '" . $search["pasien_search"] . "' ";
        endif;

        $search["kategori"] !== "" ? $param_new .= " and b.id_kategori = '" . $search["kategori"] . "' " : '';
        $search["barang_search"] !== "" ? $param .= " and b.id = '" . $search["barang_search"] . "' " : '';
        $search["ruangan_rajal"] !== "" ? $param .= " and sp.id = '" . $search["ruangan_rajal"] . "' " : '';
        $search["ruangan_ranap"] !== "" ? $param .= " and bg.id = '" . $search["ruangan_ranap"] . "' " : '';
        $search["dokter_search"] !== "" ? $param .= " and d.id = '" . $search["dokter_search"] . "' " : '';
        $search["fornas"] !== "" ? $param .= " and b.fornas = '" . $search["fornas"] . "' " : '';
        $search["generik"] !== "" ? $param .= " and b.generik = '" . $search["generik"] . "' " : '';

        $query      = "";
        $limitation = "";
        if ($limit !== 0) :
            $limitation = " limit " . $limit . " offset " . $start;
        endif;

        $select = " SELECT * FROM (SELECT r.id, pn.waktu_diserahkan as tanggal_act, rt.id as no_penjualan,p.id as no_rm, P.nama AS pasien, DATE ( r.waktu ) AS tanggal, lp.jenis_layanan, pd.jenis_rawat, rt.id_unit, lp.id_unit_layanan, b.nama_lengkap as nama_obat, kb.nama as kategori, rrd.jumlah_pakai as qty, rrd.jual_harga * rrd.jumlah_pakai as harga, COALESCE(sp.nama, bg.nama, bg2.nama)ruang, pg.nama AS dokter ";

        $count  = "select count(*) as count from (select DISTINCT on (pn.id) pn.* ";
        $sql    = "from sm_penjualan pn
					join sm_resep as r on pn.id_resep = r.id 
					join sm_resep_r as rr on rr.id_resep = r.id 
					join sm_resep_r_detail as rrd on rrd.id_resep_r = rr.id 
					join sm_resep_tebus as rt on r.id = rt.id_resep 
					join sm_pasien as p on p.id = r.id_pasien 
					join sm_unit as u on rt.id_unit = u.id 
					join sm_barang as b on b.id = rrd.id_barang 
					join sm_kategori_barang as kb on b.id_kategori = kb.id
					join sm_tenaga_medis as d on d.id = r.id_dokter 
					join sm_pegawai as pg on pg.id = d.id_pegawai 
					join sm_layanan_pendaftaran as lp on lp.id = r.id_layanan_pendaftaran 
					join sm_pendaftaran as pd on lp.id_pendaftaran = pd.id 
					left join sm_spesialisasi as sp on lp.id_unit_layanan = sp.id
					left join sm_rawat_inap as ri on lp.id = ri.id_layanan_pendaftaran
					left join sm_bangsal as bg on ri.id_bangsal = bg.id 
					left join sm_intensive_care as ic on lp.id = ic.id_layanan_pendaftaran
					left join sm_bangsal as bg2 on ic.id_bangsal = bg2.id 
					where r.id is not null
					and pn.waktu_diserahkan is not null" . $param;

        // $group_by = " GROUP BY b.id, b.id_golongan, b.nama_lengkap, b.harga_satuan, b.kategori ";
        $order = " ) DATA ORDER BY tanggal_act asc, nama_obat asc ";

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

        $data["periode"] = $periode;
        $data["data"]    = $query;
        $data["jumlah"]  = $this->db->query($count . $sql . ") as jml")->row()->count;
        $this->db->close();

        return $data;
    }

    public function getListLaporanPenjualanObat($limit, $start, $search)
    {
        $param = "";

        if ($search["unit_depo"] !== "") :
            $param .= " and rt.id_unit = '" . $search["unit_depo"] . "' ";
        endif;

        // if ($search["kategori"] !== "") :
        // 	$param .= " and b.id_kategori = '" . $search["kategori"] . "' ";
        // endif;

        if ($search["jenis_pasien"] !== "") :
            if ($search["jenis_pasien"] == "Rawat Inap") :
                $param .= " and pd.jenis_rawat = 'Inap' ";
            elseif ($search["jenis_pasien"] == "Rawat Jalan") :
                $param .= " and pd.jenis_rawat = 'Jalan' and lp.jenis_layanan != 'IGD' ";
            elseif ($search["jenis_pasien"] == "IGD") :
                $param .= " and pd.jenis_rawat = 'Jalan' and lp.jenis_layanan = 'IGD' ";
            endif;
        endif;

        if ($search["jaminan"] !== "") :
            if ($search["jaminan"] == "Asuransi") :
                $param .= " and jp.nama = 'Asuransi' ";
            elseif ($search["jaminan"] == "Perusahaan") :
                $param .= " and jp.nama = 'Perusahaan' ";
            elseif ($search["jaminan"] == "Karyawan") :
                $param .= " and jp.nama = 'Karyawan'";
            elseif ($search["jaminan"] == "Gratis") :
                $param .= " and jp.nama = 'Gratis'";
            elseif ($search["jaminan"] == "Tunai") :
                $param .= " and jp.nama = 'Tunai'";
            endif;
        endif;

        if ($search["periode_laporan"] === "Harian") {
            if ($search["tanggal_harian"] !== "") :
                $param .= " and to_char( pn.waktu_diserahkan, 'yyyy-mm-dd' ) ilike '%" . date2mysql($search['tanggal_harian']) . "' ";
            endif;
        } elseif ($search["periode_laporan"] === "Bulanan" & $search["bulan"] !== "" & $search["tahun"] !== "") {
            $param .= " and to_char( pn.waktu_diserahkan, 'yyyy/mm' ) = '" . $search["tahun"] . "/" . $search["bulan"] . "' ";
        } elseif ($search["periode_laporan"] === "Rentang Waktu" & $search["tanggal_awal"] !== "" & $search["tanggal_akhir"] !== "") {
            if ($search["tanggal_awal"] !== "" & $search["tanggal_akhir"] !== "") :
                $param .= " and pn.waktu_diserahkan BETWEEN '" . date2mysql($search['tanggal_awal']) . " 00:00:00' AND '" . date2mysql($search['tanggal_akhir']) . " 23:59:59'";
            endif;
        }

        $query      = "";
        $limitation = "";
        if ($limit !== 0) :
            $limitation = " limit " . $limit . " offset " . $start;
        endif;

        $select = " SELECT * FROM (SELECT DISTINCT on (r.id) r.id, pn.waktu_diserahkan as tanggal_transaksi, rt.id as no_penjualan, P.nama AS pasien, DATE ( r.waktu ) AS tanggal, lp.jenis_layanan, pd.jenis_rawat, rt.id_unit, lp.id_unit_layanan ";

        $count  = "select count(*) as count from (select DISTINCT on (pn.id) pn.* ";
        $sql    = "from sm_penjualan pn
							join sm_resep as r on pn.id_resep = r.id 
							join sm_resep_tebus as rt on r.id = rt.id_resep 
							join sm_pasien as p on p.id = r.id_pasien 
							join sm_layanan_pendaftaran as lp on lp.id = pn.id_layanan_pendaftaran 
							join sm_pendaftaran as pd on lp.id_pendaftaran = pd.id 
							join sm_penjamin as spn on spn.id = pd.id_penjamin
							join sm_jenis_penjamin as jp on jp.id = spn.id_jenis_penjamin
							where r.id is not null
							and pn.waktu_diserahkan is not null" . $param;

        // $group_by = " GROUP BY b.id, b.id_golongan, b.nama_lengkap, b.harga_satuan, b.kategori ";
        $order = " ) DATA ORDER BY tanggal_transaksi asc ";

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
            if ($search["kategori"] !== "") :
                $param_new .= " and sb.id_kategori = '" . $search["kategori"] . "' ";
            endif;

            $query_masuk = " SELECT pn.tanggal_penjualan as tanggal_transaksi, rt.id as nomor_penjualan, r.id as no_resep, p.id as no_rm, p.nama as nama_pasien, jp.nama as cara_bayar, spn.nama as kso, COALESCE(sp.nama, bg.nama, bg2.nama)ruangan, sum(hpp) as netto, pn.total as total

			from sm_penjualan pn
			join sm_resep as r on r.id = pn.id_resep
			join sm_resep_tebus as rt on r.id = rt.id_resep
			join sm_resep_r as rr on rr.id_resep = r.id
			join sm_resep_r_detail as rrd on rrd.id_resep_r = rr.id
			join sm_barang as sb on sb.id = rrd.id_barang
			join sm_kategori_barang as kb on sb.id_kategori = kb.id
			join sm_pasien as p on p.id = r.id_pasien 
			join sm_layanan_pendaftaran as lp on lp.id = pn.id_layanan_pendaftaran 
			join sm_pendaftaran as pd on lp.id_pendaftaran = pd.id
			join sm_penjamin as spn on spn.id = pd.id_penjamin
			join sm_jenis_penjamin as jp on jp.id = spn.id_jenis_penjamin
			left join sm_spesialisasi as sp on lp.id_unit_layanan = sp.id
			left join sm_rawat_inap as ri on lp.id = ri.id_layanan_pendaftaran
			left join sm_bangsal as bg on ri.id_bangsal = bg.id 
			left join sm_intensive_care as ci on lp.id = ci.id_layanan_pendaftaran
			left join sm_bangsal as bg2 on ci.id_bangsal = bg2.id 
			where rt.id = '" . $val->no_penjualan . "' " . $param_new . "
			GROUP BY r.id, pn.tanggal_penjualan, rt.id, p.id, p.nama, jp.nama, spn.nama, sp.nama, bg.nama, bg2.nama, pn.total
			order by rt.id asc";

            $result[$i]->resep = $this->db->query($query_masuk)->result();

        endforeach;

        $data["periode"] = $periode;
        $data["data"]    = $result;
        $data["jumlah"]  = $this->db->query($count . $sql . ") as jml")->row()->count;
        $this->db->close();

        return $data;
    }

    public function getExportLaporanPenjualanObat($search)
    {
        $param = "";

        if ($search["unit_depo"] !== "") :
            $param .= " and rt.id_unit = '" . $search["unit_depo"] . "' ";
        endif;

        if ($search["kategori"] !== "") :
            $param .= " and sb.id_kategori = '" . $search["kategori"] . "' ";
        endif;

        if ($search["jenis_pasien"] !== "") :
            if ($search["jenis_pasien"] == "Rawat Inap") :
                $param .= " and pd.jenis_rawat = 'Inap' ";
            elseif ($search["jenis_pasien"] == "Rawat Jalan") :
                $param .= " and pd.jenis_rawat = 'Jalan' and lp.jenis_layanan != 'IGD' ";
            elseif ($search["jenis_pasien"] == "IGD") :
                $param .= " and pd.jenis_rawat = 'Jalan' and lp.jenis_layanan = 'IGD' ";
            endif;
        endif;

        if ($search["jaminan"] !== "") :
            if ($search["jaminan"] == "Asuransi") :
                $param .= " and jp.nama = 'Asuransi' ";
            elseif ($search["jaminan"] == "Perusahaan") :
                $param .= " and jp.nama = 'Perusahaan' ";
            elseif ($search["jaminan"] == "Karyawan") :
                $param .= " and jp.nama = 'Karyawan'";
            elseif ($search["jaminan"] == "Gratis") :
                $param .= " and jp.nama = 'Gratis'";
            elseif ($search["jaminan"] == "Tunai") :
                $param .= " and jp.nama = 'Tunai'";
            endif;
        endif;

        if ($search["periode_laporan"] === "Harian") {
            if ($search["tanggal_harian"] !== "") :
                $param .= " and to_char( pn.waktu_diserahkan, 'yyyy-mm-dd' ) ilike '%" . date2mysql($search['tanggal_harian']) . "' ";
            endif;
        } elseif ($search["periode_laporan"] === "Bulanan" & $search["bulan"] !== "" & $search["tahun"] !== "") {
            $param .= " and to_char( pn.waktu_diserahkan, 'yyyy/mm' ) = '" . $search["tahun"] . "/" . $search["bulan"] . "' ";
        } elseif ($search["periode_laporan"] === "Rentang Waktu" & $search["tanggal_awal"] !== "" & $search["tanggal_akhir"] !== "") {
            if ($search["tanggal_awal"] !== "" & $search["tanggal_akhir"] !== "") :
                $param .= " and pn.waktu_diserahkan BETWEEN '" . date2mysql($search['tanggal_awal']) . " 00:00:00' AND '" . date2mysql($search['tanggal_akhir']) . " 23:59:59'";
            endif;
        }

        // $query      = "";
        // $limitation = "";
        // if ($limit !== 0) :
        // 	$limitation = " limit " . $limit . " offset " . $start;
        // endif;

        $select = " SELECT pn.tanggal_penjualan as tanggal_transaksi, rt.id as nomor_penjualan, rt.id as no_resep, p.id as no_rm, p.nama as nama_pasien, jp.nama as cara_bayar, spn.nama as kso, COALESCE(sp.nama, bg.nama)ruangan, sum(hpp) as netto, pn.total as total
		";

        // $count  = "select count(*) as count from (select DISTINCT on (pn.id) pn.* ";
        $sql    = "from sm_penjualan pn
					join sm_resep as r on r.id = pn.id_resep
					join sm_resep_tebus as rt on r.id = rt.id_resep
					join sm_resep_r as rr on rr.id_resep = r.id
					join sm_resep_r_detail as rrd on rrd.id_resep_r = rr.id
					join sm_barang as sb on sb.id = rrd.id_barang
					join sm_kategori_barang as kb on sb.id_kategori = kb.id
					join sm_pasien as p on p.id = r.id_pasien 
					join sm_layanan_pendaftaran as lp on lp.id = pn.id_layanan_pendaftaran 
					join sm_pendaftaran as pd on lp.id_pendaftaran = pd.id
					join sm_penjamin as spn on spn.id = pd.id_penjamin
					join sm_jenis_penjamin as jp on jp.id = spn.id_jenis_penjamin
					left join sm_spesialisasi as sp on lp.id_unit_layanan = sp.id
					left join sm_rawat_inap as ri on lp.id = ri.id_layanan_pendaftaran
					left join sm_bangsal as bg on ri.id_bangsal = bg.id 
					where rt.id is not null " . $param;
        $group_by = " GROUP BY rt.id, pn.tanggal_penjualan, rt.id, p.id, p.nama, jp.nama, spn.nama, sp.nama, bg.nama, pn.total";
        $order = " ORDER BY pn.tanggal_penjualan ASC";

        // $query = $this->db->query($select . $sql . $order . $limitation)->result();
        $query = $this->db->query($select . $sql . $group_by . $order)->result();

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

        $data["periode"] = $periode;
        $data["data"]    = $query;
        // $data["jumlah"]  = $this->db->query($count . $sql . ") as jml")->row()->count;
        $this->db->close();

        return $data;
    }

    public function getListLaporanPemakaianObat($limit, $start, $search)
    {
        $param = "";

        $search["unit_depo"] !== "" ? $param .= " and u.id = '" . $search["unit_depo"] . "' " : '';
        $search["barang_search"] !== "" ? $param .= " and b.id = '" . $search["barang_search"] . "' " : '';
        $search["kategori"] !== "" ? $param .= " and b.id_kategori = '" . $search["kategori"] . "' " : '';
        $search["golongan"] !== "" ? $param .= " and b.id_golongan = '" . $search["golongan"] . "' " : '';
        $search["jenis"] !== "" ? $param .= " and kb.jenis = '" . $search["jenis"] . "' " : '';
        $search["fornas"] !== "" ? $param .= " and b.fornas = '" . $search["fornas"] . "' " : '';
        $search["generik"] !== "" ? $param .= " and b.generik = '" . $search["generik"] . "' " : '';

        if ($search["periode_laporan"] === "Harian") {
            if ($search["tanggal_harian"] !== "") :
                $param .= " and to_char( pn.waktu_diserahkan, 'dd/mm/yyyy') = '" . $search['tanggal_harian'] . "' ";
            endif;
        } elseif ($search["periode_laporan"] === "Bulanan" & $search["bulan"] !== "" & $search["tahun"] !== "") {
            $param .= " and to_char( pn.waktu_diserahkan, 'yyyy/mm' ) = '" . $search["tahun"] . "/" . $search["bulan"] . "' ";
        } elseif ($search["periode_laporan"] === "Rentang Waktu" & $search["tanggal_awal"] !== "" & $search["tanggal_akhir"] !== "") {
            if ($search["tanggal_awal"] !== "" & $search["tanggal_akhir"] !== "") :
                $param .= " and pn.waktu_diserahkan BETWEEN '" . date2mysql($search['tanggal_awal']) . " 00:00:00' AND '" . date2mysql($search['tanggal_akhir']) . " 23:59:59'";
            endif;
        }

        $query      = "";
        $limitation = "";
        if ($limit !== 0) :
            $limitation = " limit " . $limit . " offset " . $start;
        endif;

        $select = " select distinct on (b.nama_lengkap) b.id as id_barang, concat('''', lpad(b.id::VARCHAR, 8, '0')) kode_barang, b.nama_lengkap as nama_barang, 'JPKMKT' kepemilikan, sum(rrd.jumlah_pakai) as qty ";

        $select_total = " select sum(rrd.jumlah_pakai) total_qty, sum(rrd.jual_harga*rrd.jumlah_pakai) total_nilai ";
        $count  = "select count(*) as count from (select DISTINCT on (b.id) b.* ";
        $sql    = "from sm_penjualan pn
                join sm_resep as r on pn.id_resep = r.id 
                join sm_resep_r as rr on rr.id_resep = r.id 
                join sm_resep_r_detail as rrd on rrd.id_resep_r = rr.id 
                join sm_resep_tebus as rt on r.id = rt.id_resep
                join sm_unit as u on rt.id_unit = u.id 
                join sm_barang as b on b.id = rrd.id_barang
                join sm_kategori_barang as kb on b.id_kategori = kb.id 
                where r.id is not null 
                and pn.waktu_diserahkan is not null " . $param;

        $group_by = " group by b.id ";
        $order = " order by b.nama_lengkap asc ";

        $query = $this->db->query($select . $sql . $group_by . $order . $limitation)->result();

        $result = $query;
        foreach ($result as $i => $val) :

            $query_sum = "select sum(rrd.jumlah_pakai) qty, rrd.jual_harga as harga_satuan, sum(rrd.jual_harga*rrd.jumlah_pakai) nilai ";
            $where_sum = "and rrd.id_barang = '" . $val->id_barang . "' ";
            $group_by_sum = " group by rrd.jual_harga ";

            $result[$i]->harga_satuan = $this->db->query($query_sum . $sql . $where_sum . $group_by_sum)->row()->harga_satuan;
            $result[$i]->nilai = $this->db->query($query_sum . $sql . $where_sum .  $group_by_sum)->row()->nilai;
        endforeach;

        $query_total = $this->db->query($select . $sql . $group_by . $order)->result();
        $total_qty = 0;
        $total_nilai = 0;
        foreach ($query_total as $i => $val) :
            $total_qty += $val->qty;

            $sum_nilai = "select sum(rrd.jumlah_pakai) qty, rrd.jual_harga as harga_satuan, sum(rrd.jual_harga*rrd.jumlah_pakai) nilai " . $sql . " and rrd.id_barang = '" . $val->id_barang . "'  group by rrd.jual_harga ";

            $total_nilai += $this->db->query($sum_nilai)->row()->nilai;

        endforeach;

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
        $data["qty_total"]  = $total_qty;
        $data["nilai_total"]  = $total_nilai;
        $data["jumlah"]     = $this->db->query($count . $sql . ") as jml")->row()->count;
        $this->db->close();

        return $data;
    }

    public function getListLaporanPemakaianObatAllUnit($limit, $start, $search)
    {
        $param = "";

        $search["barang_search"] !== "" ? $param .= " and b.id = '" . $search["barang_search"] . "' " : '';
        $search["kategori"] !== "" ? $param .= " and b.id_kategori = '" . $search["kategori"] . "' " : '';
        $search["golongan"] !== "" ? $param .= " and b.id_golongan = '" . $search["golongan"] . "' " : '';
        $search["jenis"] !== "" ? $param .= " and kb.jenis = '" . $search["jenis"] . "' " : '';
        $search["fornas"] !== "" ? $param .= " and b.fornas = '" . $search["fornas"] . "' " : '';
        $search["generik"] !== "" ? $param .= " and b.generik = '" . $search["generik"] . "' " : '';

        if ($search["periode_laporan"] === "Harian") {
            if ($search["tanggal_harian"] !== "") :
                $param .= " and to_char( pn.waktu_diserahkan, 'dd/mm/yyyy') = '" . $search['tanggal_harian'] . "' ";
            endif;
        } elseif ($search["periode_laporan"] === "Bulanan" & $search["bulan"] !== "" & $search["tahun"] !== "") {
            $param .= " and to_char( pn.waktu_diserahkan, 'yyyy/mm' ) = '" . $search["tahun"] . "/" . $search["bulan"] . "' ";
        } elseif ($search["periode_laporan"] === "Rentang Waktu" & $search["tanggal_awal"] !== "" & $search["tanggal_akhir"] !== "") {
            if ($search["tanggal_awal"] !== "" & $search["tanggal_akhir"] !== "") :
                $param .= " and pn.waktu_diserahkan BETWEEN '" . date2mysql($search['tanggal_awal']) . " 00:00:00' AND '" . date2mysql($search['tanggal_akhir']) . " 23:59:59'";
            endif;
        }

        $query      = "";
        $limitation = "";
        if ($limit !== 0) :
            $limitation = " limit " . $limit . " offset " . $start;
        endif;

        $select = " select distinct on (b.nama_lengkap) b.id as id_barang, concat('''', lpad(b.id::VARCHAR, 8, '0')) kode_barang, b.nama_lengkap as nama_barang, 'JPKMKT' kepemilikan, sum(rrd.jumlah_pakai) as total ";

        $count  = "select count(*) as count from (select DISTINCT on (b.id) b.* ";
        $sql    = "from sm_penjualan pn
                join sm_resep as r on pn.id_resep = r.id 
                join sm_resep_r as rr on rr.id_resep = r.id 
                join sm_resep_r_detail as rrd on rrd.id_resep_r = rr.id 
                join sm_resep_tebus as rt on r.id = rt.id_resep
                join sm_unit as u on rt.id_unit = u.id 
                join sm_barang as b on b.id = rrd.id_barang
                join sm_kategori_barang as kb on b.id_kategori = kb.id 
                where r.id is not null 
                and pn.waktu_diserahkan is not null " . $param;

        $group_by = " group by b.id ";
        $order = " order by b.nama_lengkap asc ";

        $query = $this->db->query($select . $sql . $group_by . $order . $limitation)->result();

        $param_allunit = "";
        $search["barang_search"] !== "" ? $param_allunit .= " and id_barang = '" . $search["barang_search"] . "' " : '';
        $search["kategori"] !== "" ? $param_allunit .= " and id_kategori = '" . $search["kategori"] . "' " : '';
        $search["golongan"] !== "" ? $param_allunit .= " and id_golongan = '" . $search["golongan"] . "' " : '';
        $search["jenis"] !== "" ? $param_allunit .= " and jenis = '" . $search["jenis"] . "' " : '';
        $search["fornas"] !== "" ? $param_allunit .= " and fornas = '" . $search["fornas"] . "' " : '';
        $search["generik"] !== "" ? $param_allunit .= " and generik = '" . $search["generik"] . "' " : '';

        if ($search["periode_laporan"] === "Harian") {
            if ($search["tanggal_harian"] !== "") :
                $param_allunit .= " and to_char( waktu_diserahkan, 'dd/mm/yyyy') = '" . $search['tanggal_harian'] . "' ";
            endif;
        } elseif ($search["periode_laporan"] === "Bulanan" & $search["bulan"] !== "" & $search["tahun"] !== "") {
            $param_allunit .= " and to_char( waktu_diserahkan, 'yyyy/mm' ) = '" . $search["tahun"] . "/" . $search["bulan"] . "' ";
        } elseif ($search["periode_laporan"] === "Rentang Waktu" & $search["tanggal_awal"] !== "" & $search["tanggal_akhir"] !== "") {
            if ($search["tanggal_awal"] !== "" & $search["tanggal_akhir"] !== "") :
                $param_allunit .= " and waktu_diserahkan BETWEEN '" . date2mysql($search['tanggal_awal']) . " 00:00:00' AND '" . date2mysql($search['tanggal_akhir']) . " 23:59:59'";
            endif;
        }

        $result = $query;
        foreach ($result as $i => $val) :

            $query_sum = "select b.id id_barang, sum(rrd.jumlah_pakai) qty, rrd.jual_harga as harga_satuan, sum(rrd.jual_harga*rrd.jumlah_pakai) nilai ";
            $where_sum = " and rrd.id_barang = '" . $val->id_barang . "' ";
            $group_by_sum = " group by b.id, rrd.jual_harga ";

            $igd = "select case when sum(igd) is null then 0 else sum(igd) end qty FROM vm_pemakaian_obat where id_barang = '" . $val->id_barang . "' and id_unit = '304' ";
            $ok = "select case when sum(ok) is null then 0 else sum(ok) end qty FROM vm_pemakaian_obat where id_barang = '" . $val->id_barang . "' and id_unit = '305' ";
            $rj = "select case when sum(rj) is null then 0 else sum(rj) end qty FROM vm_pemakaian_obat where id_barang = '" . $val->id_barang . "' and id_unit = '295' ";
            $ri = "select case when sum(ri) is null then 0 else sum(ri) end qty FROM vm_pemakaian_obat where id_barang = '" . $val->id_barang . "' and id_unit = '303' ";

            $result[$i]->igd = $this->db->query($igd . $param_allunit)->row()->qty;
            $result[$i]->ok = $this->db->query($ok . $param_allunit)->row()->qty;
            $result[$i]->rj = $this->db->query($rj . $param_allunit)->row()->qty;
            $result[$i]->ri = $this->db->query($ri . $param_allunit)->row()->qty;

            $result[$i]->nilai = $this->db->query($query_sum . $sql . $where_sum .  $group_by_sum)->row()->nilai;
        endforeach;

        $query_total = $this->db->query($select . $sql . $group_by . $order)->result();
        $total_qty = 0;
        $total_nilai = 0;
        foreach ($query_total as $i => $val) :
            $total_qty += $val->total;

            $sum_nilai = "select sum(rrd.jumlah_pakai) qty, rrd.jual_harga as harga_satuan, sum(rrd.jual_harga*rrd.jumlah_pakai) nilai " . $sql . " and rrd.id_barang = '" . $val->id_barang . "'  group by rrd.jual_harga ";

            $total_nilai += $this->db->query($sum_nilai)->row()->nilai;

        endforeach;

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
        $data["qty_total"]  = $total_qty;
        $data["nilai_total"]  = $total_nilai;
        $data["jumlah"]     = $this->db->query($count . $sql . ") as jml")->row()->count;
        $this->db->close();

        return $data;
    }

    public function getListLaporanPengeluaranObat($limit, $start, $search)
    {
        $param = "";

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
                $param .= " and d.tanggal_dikirim BETWEEN '" . date2mysql($search['tanggal_awal']) . " 00:00:00' AND '" . date2mysql($search['tanggal_akhir']) . " 23:59:59'";
            endif;
        }

        $query      = "";
        $limitation = "";
        if ($limit !== 0) :
            $limitation = " limit " . $limit . " offset " . $start;
        endif;

        $select = " select d.id id_distribusi, to_char(d.tanggal_dikirim, 'dd-mm-yyyy') tanggal_dikirim, d.kode_dikirim no_kirim, u.nama unit, su.nama unit_asal, 
                concat('''', lpad(b.id::VARCHAR, 8, '0')) kode, b.nama_lengkap obat, 'JPKMKT' kepemilikan, dd.jumlah_dikirim qty, 
                dd.jumlah_dikirim*b.hpp total ";

        $count  = "select count(*) as count from (select d.* ";
        $sql    = "from sm_distribusi d
                left join sm_detail_distribusi dd on d.id = dd.id_distribusi
                left join sm_kemasan_barang kb on dd.id_kemasan_barang = kb.id
                left join sm_barang b on kb.id_barang = b.id
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

    public function getListLaporanPermintaanObat($limit, $start, $search)
    {
        $param = "";

        $search["barang_search"] !== "" ? $param .= " and kb.id_barang = '" . $search["barang_search"] . "' " : '';
        $search["unit_depo"] !== "" ? $param .= " and d.id_unit_asal = '" . $search["unit_depo"] . "' " : '';

        if ($search["periode_laporan"] === "Harian") {
            if ($search["tanggal_harian"] !== "") :
                $param .= " and to_char( d.tanggal_permintaan, 'dd/mm/yyyy') = '" . $search['tanggal_harian'] . "' ";
            endif;
        } elseif ($search["periode_laporan"] === "Bulanan" & $search["bulan"] !== "" & $search["tahun"] !== "") {
            $param .= " and to_char( d.tanggal_permintaan, 'yyyy/mm' ) = '" . $search["tahun"] . "/" . $search["bulan"] . "' ";
        } elseif ($search["periode_laporan"] === "Rentang Waktu" & $search["tanggal_awal"] !== "" & $search["tanggal_akhir"] !== "") {
            if ($search["tanggal_awal"] !== "" & $search["tanggal_akhir"] !== "") :
                $param .= " and d.tanggal_permintaan BETWEEN '" . date2mysql($search['tanggal_awal']) . " 00:00:00' AND '" . date2mysql($search['tanggal_akhir']) . " 23:59:59'";
            endif;
        }

        $limitation = "";
        if ($limit !== 0) :
            $limitation = " limit " . $limit . " offset " . $start;
        endif;

        $select = "select d.id id_distribusi, pdi.id, to_char(d.tanggal_permintaan, 'dd-mm-yyyy') tanggal, 
                to_char(d.tanggal_dikirim, 'dd-mm-yyyy')tanggal_dikirim, d.kode no_bukti, 'JPKMKT' kepemilikan, u.nama unit, 
                b.nama_lengkap obat, dd.jumlah qty, case when pdi.id is null and d.tanggal_dikirim is null then 'Menunggu' when pdi.id is null and d.tanggal_dikirim is not null then 'Dikirim' else 'Diterima' end status ";

        $count  = "select count(*) as count from (select d.* ";
        $sql    = "from sm_penerimaan_distribusi pdi
        right join sm_distribusi d on pdi.id_distribusi = d.id
        left join sm_detail_distribusi dd on d.id = dd.id_distribusi 
        left join sm_kemasan_barang kb on dd.id_kemasan_barang = kb.id 
        left join sm_barang b on kb.id_barang = b.id 
        left join sm_unit u on d.id_unit_asal = u.id 
        where d.id is not null " . $param;

        $order = " order by d.id asc, d.tanggal_permintaan asc";

        $result = $this->db->query($select . $sql . $order . $limitation)->result();

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
        $data["jumlah"]     = $this->db->query($count . $sql . ") as jml")->row()->count;
        $this->db->close();

        return $data;
    }

    public function getListLaporanPermintaanUnitkeGudang($limit, $start, $search)
    {
        $param = "";

        $search["barang_search"] !== "" ? $param .= " and kb.id_barang = '" . $search["barang_search"] . "' " : '';
        $search["unit_depo"] !== "" ? $param .= " and u.id = '" . $search["unit_depo"] . "' " : '';

        if ($search["periode_laporan"] === "Harian") {
            if ($search["tanggal_harian"] !== "") :
                $param .= " and to_char( d.tanggal_permintaan, 'dd/mm/yyyy') = '" . $search['tanggal_harian'] . "' ";
            endif;
        } elseif ($search["periode_laporan"] === "Bulanan" & $search["bulan"] !== "" & $search["tahun"] !== "") {
            $param .= " and to_char( d.tanggal_permintaan, 'yyyy/mm' ) = '" . $search["tahun"] . "/" . $search["bulan"] . "' ";
        } elseif ($search["periode_laporan"] === "Rentang Waktu" & $search["tanggal_awal"] !== "" & $search["tanggal_akhir"] !== "") {
            if ($search["tanggal_awal"] !== "" & $search["tanggal_akhir"] !== "") :
                $param .= " and d.tanggal_permintaan BETWEEN '" . date2mysql($search['tanggal_awal']) . " 00:00:00' AND '" . date2mysql($search['tanggal_akhir']) . " 23:59:59'";
            endif;
        }

        $limitation = "";
        if ($limit !== 0) :
            $limitation = " limit " . $limit . " offset " . $start;
        endif;

        $select = "select u.nama unit, concat('''', lpad(b.id::VARCHAR, 8, '0'))kode, b.nama_lengkap obat, s.nama satuan, 'JPKMKT' kepemilikan, 
                sum(dd.jumlah) qty_minta, sum(dd.jumlah_dikirim) qty_kirim, b.hpp harga_satuan, sum(dd.jumlah_dikirim*b.hpp) total ";
        $select_sum = "select sum(dd.jumlah_dikirim*b.hpp) jml ";

        $count  = "select count(*) as count from ( " . $select;
        $sql    = "from sm_distribusi d
        left join sm_detail_distribusi dd on d.id = dd.id_distribusi
        left join sm_kemasan_barang kb on dd.id_kemasan_barang = kb.id
        left join sm_satuan s on kb.id_satuan = s.id
        left join sm_barang b on kb.id_barang = b.id
        left join sm_unit u on d.id_unit_asal = u.id
        
        where d.tanggal_dikirim is not null and d.id_unit_tujuan = '306' " . $param;

        $group_by = " group by b.id, u.nama, s.nama ";
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

    public function getListLaporanPermintaanTakTerlayani($limit, $start, $search)
    {
        $param = "";

        $search["barang_search"] !== "" ? $param .= " and kb.id_barang = '" . $search["barang_search"] . "' " : '';
        $search["unit_tujuan"] !== "" ? $param .= " and d.id_unit_tujuan = '" . $search["unit_tujuan"] . "' " : '';
        $search["dari_unit"] !== "" ? $param .= " and d.id_unit_asal = '" . $search["dari_unit"] . "' " : '';

        if ($search["periode_laporan"] === "Harian") {
            if ($search["tanggal_harian"] !== "") :
                $param .= " and to_char( d.tanggal_permintaan, 'dd/mm/yyyy') = '" . $search['tanggal_harian'] . "' ";
            endif;
        } elseif ($search["periode_laporan"] === "Bulanan" & $search["bulan"] !== "" & $search["tahun"] !== "") {
            $param .= " and to_char( d.tanggal_permintaan, 'yyyy/mm' ) = '" . $search["tahun"] . "/" . $search["bulan"] . "' ";
        } elseif ($search["periode_laporan"] === "Rentang Waktu" & $search["tanggal_awal"] !== "" & $search["tanggal_akhir"] !== "") {
            if ($search["tanggal_awal"] !== "" & $search["tanggal_akhir"] !== "") :
                $param .= " and d.tanggal_permintaan BETWEEN '" . date2mysql($search['tanggal_awal']) . " 00:00:00' AND '" . date2mysql($search['tanggal_akhir']) . " 23:59:59'";
            endif;
        }

        $limitation = "";
        if ($limit !== 0) :
            $limitation = " limit " . $limit . " offset " . $start;
        endif;

        $select = "select d.id id_distribusi, to_char(d.tanggal_permintaan, 'dd-mm-yyyy') tanggal, 
                to_char(d.tanggal_dikirim, 'dd-mm-yyyy')tanggal_dikirim, d.kode no_permintaan, 
                u.nama unit, concat('''', lpad(b.id::VARCHAR, 8, '0')) kode_obat, b.nama_lengkap nama_obat, 'JPKMKT' kepemilikan, 
                dd.jumlah qty_minta, dd.jumlah_dikirim qty_terima, (dd.jumlah - dd.jumlah_dikirim) qty_sisa, 
                case when pdi.id is null and d.tanggal_dikirim is null then 'Belum Dikirim' when pdi.id is null and d.tanggal_dikirim is not null then 'Dikirim' else 'Diterima (-)' end status ";

        $count  = "select count(*) as count from (select d.* ";
        $sql    = "from sm_penerimaan_distribusi pdi 
        right join sm_distribusi d on pdi.id_distribusi = d.id 
        left join sm_detail_distribusi dd on d.id = dd.id_distribusi 
        left join sm_kemasan_barang kb on dd.id_kemasan_barang = kb.id 
        left join sm_barang b on kb.id_barang = b.id 
        left join sm_unit u on d.id_unit_asal = u.id 
        
        where d.id is not null and dd.jumlah != dd. jumlah_dikirim " . $param;

        $order = " order by d.id asc, d.tanggal_permintaan asc";

        $result = $this->db->query($select . $sql . $order . $limitation)->result();

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

        $search['unit_tujuan'] !== '' ? $unit_tujuan = $this->db->where('id', $search['unit_tujuan'], true)->select('nama')->get('sm_unit')->row()->nama : $unit_tujuan = "Semua Unit";
        $search['dari_unit'] !== '' ? $dari_unit = $this->db->where('id', $search['dari_unit'], true)->select('nama')->get('sm_unit')->row()->nama : $dari_unit = "Semua Unit";

        $data["periode"]        = $periode;
        $data["unit_tujuan"]    = $unit_tujuan;
        $data["dari_unit"]      = $dari_unit;
        $data["data"]           = $result;
        $data["jumlah"]         = $this->db->query($count . $sql . ") as jml")->row()->count;
        $this->db->close();

        return $data;
    }

    public function getListLaporanStokOpname($limit, $start, $search)
    {
        $param = "";

        $search["barang_search"] !== "" ? $param .= " and kb.id_barang = '" . $search["barang_search"] . "' " : '';
        $search["unit_depo"] !== "" ? $param .= " and u.id = '" . $search["unit_depo"] . "' " : '';

        if ($search["periode_laporan"] === "Harian") {
            if ($search["tanggal_harian"] !== "") :
                $param .= " and to_char( st.waktu, 'dd/mm/yyyy') = '" . $search['tanggal_harian'] . "' ";
            endif;
        } elseif ($search["periode_laporan"] === "Bulanan" & $search["bulan"] !== "" & $search["tahun"] !== "") {
            $param .= " and to_char( st.waktu, 'yyyy/mm' ) = '" . $search["tahun"] . "/" . $search["bulan"] . "' ";
        } elseif ($search["periode_laporan"] === "Rentang Waktu" & $search["tanggal_awal"] !== "" & $search["tanggal_akhir"] !== "") {
            if ($search["tanggal_awal"] !== "" & $search["tanggal_akhir"] !== "") :
                $param .= " and st.waktu BETWEEN '" . date2mysql($search['tanggal_awal']) . " 00:00:00' AND '" . date2mysql($search['tanggal_akhir']) . " 23:59:59'";
            endif;
        }

        $limitation = "";
        if ($limit !== 0) :
            $limitation = " limit " . $limit . " offset " . $start;
        endif;

        $select = "select st.id_barang, u.nama, b.nama_lengkap obat, 'JPKMKT' kepemilikan, sum(st.masuk) - sum(st.keluar) qty, 
                (sum(st.masuk) - sum(st.keluar)) * b.hpp total ";

        $count  = "select count(*) as count from (" . $select ;
        $sql    = "from sm_stok st
        join sm_barang b on st.id_barang = b.id
        join sm_unit u on st.id_unit = u.id
        where st.transaksi = 'Stok Opname' " . $param;

        $group_by = " group by st.id_barang, b.nama_lengkap, u.nama, st.id_unit,  b.hpp ";
        $order = " order by b.nama_lengkap asc";

        $result = $this->db->query($select . $sql . $group_by . $order . $limitation)->result();
        
        $sub_total = 0;
        foreach ($result as $i => $val) :
            $sub_total += $val->total;
        endforeach;

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

        $search['unit_depo'] !== '' ? $unit_depo = $this->db->where('id', $search['unit_depo'], true)->select('nama')->get('sm_unit')->row()->nama : $unit_depo = "Semua Unit";

        $data["periode"]        = $periode;
        $data["unit_depo"]      = $unit_depo;
        $data["sub_total"]      = $sub_total;
        $data["data"]           = $result;
        $data["jumlah"]         = $this->db->query($count . $sql . $group_by . $order . ") as jml")->row()->count;
        $this->db->close();

        return $data;
    }
}
