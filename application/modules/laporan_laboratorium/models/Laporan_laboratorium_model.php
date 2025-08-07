<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Laporan_laboratorium_model extends CI_Model
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
            ''      => '-- Pilih Laporan Laboratorium --',
            '1'     => 'Laporan Rekapan Data dan Harga Pemeriksaan Pasien',
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

    function getBulan()
    {
        return array(
            '01'      => 'Januari',
            '02'      => 'Februari',
            '03'      => 'Maret',
            '04'      => 'April',
            '05'      => 'Mei',
            '06'      => 'Juni',
            '07'      => 'Juli',
            '08'      => 'Agustus',
            '09'      => 'September',
            '10'      => 'Oktober',
            '11'      => 'November',
            '12'      => 'Desember',
        );
    }

    function getTempatLayanan()
    {
        return array(
            ''      => '- Semua -',
            'igd'   => 'IGD',
            'poli'  => 'Poliklinik',
            'ranap' => 'Rawat Inap',
            'icu'   => 'Intensive Care',
            'lab'   => 'Pendaftaran Lab',
            'hemo'  => 'Hemodialisa', // Ditambahkan
        );
    }


    private function sqlRekapDataHarga($search)
    {
        $this->db->select("orlab.*, null as data_laboratorium, 
                    pd.id_pasien as no_rm, lp.cara_bayar,
                    pd.no_register, p.nama as pasien,
                    COALESCE(lp.jenis_layanan, '') as layanan_lab, 
                    COALESCE(pj.nama, '') as penjamin,
                    COALESCE(pg.nama, '') as dokter, 
                    COALESCE(bg.nama, '') as bangsal, 
                    COALESCE(bic.nama, '') as bangsal_icare,
                    CONCAT_WS(' ', lp.jenis_layanan, sp.nama) as layanan, 
                    lp.id as id_layanan_pendaftaran, lp.id_pendaftaran, pd.jenis_igd", false);
        $this->db->from("sm_order_laboratorium as orlab");
        $this->db->join("sm_layanan_pendaftaran as lp", "lp.id = orlab.id_layanan_pendaftaran", "left");
        $this->db->join("sm_pendaftaran as pd", "pd.id = lp.id_pendaftaran", "left");
        $this->db->join("sm_pasien as p", "p.id = pd.id_pasien", "left");
        $this->db->join("sm_spesialisasi as sp", "sp.id = lp.id_unit_layanan", "left");
        $this->db->join('sm_penjamin as pj', 'pj.id = lp.id_penjamin', 'left');
        $this->db->join("sm_tenaga_medis as tm", "tm.id = orlab.id_dokter", "left");
        $this->db->join("sm_pegawai as pg", "pg.id = tm.id_pegawai", "left");
        $this->db->join("sm_rawat_inap as ri", "ri.id_layanan_pendaftaran = lp.id", "left");
        $this->db->join("sm_bangsal as bg", "bg.id = ri.id_bangsal", "left");
        $this->db->join("sm_intensive_care as ic", "ic.id_layanan_pendaftaran = lp.id", "left");
        $this->db->join("sm_bangsal as bic", "bic.id = ic.id_bangsal", "left");
        $this->db->where("orlab.status", 'konfirm', true);

        if ($search["penjamin"] !== "") {
            $this->db->where("lp.id_penjamin = '" . $search["penjamin"] . "' ");
        }

        if ($search["tempat_layanan"] !== "") {

            if ($search["tempat_layanan"] === "igd") {

                // Kondisi: tempat_layanan = igd
                $this->db->where("lp.jenis_layanan = 'IGD'");

            } elseif ($search["tempat_layanan"] === "poli") {

                if ($search["jenis_rawat"] === "") {
                    // Kondisi: tempat_layanan = poli dan jenis_rawat kosong
                    $this->db->where("lp.jenis_layanan = 'Poliklinik'");
                } else {
                    // Kondisi: tempat_layanan = poli dan jenis_rawat memiliki nilai
                    $this->db->where("lp.id_unit_layanan = '" . $search["jenis_rawat"] . "'");
                }

            } elseif ($search["tempat_layanan"] === "ranap") {

                if ($search["jenis_rawat"] === "") {
                    // Kondisi: tempat_layanan = ranap dan jenis_rawat kosong
                    $this->db->where("lp.jenis_layanan = 'Rawat Inap'");
                } else {
                    // Kondisi: tempat_layanan = ranap dan jenis_rawat memiliki nilai
                    $this->db->where("bg.id = '" . $search["jenis_rawat"] . "'");
                }

            } elseif ($search["tempat_layanan"] === "icu") {

                if ($search["jenis_rawat"] === "") {
                    // Kondisi: tempat_layanan = icu dan jenis_rawat kosong
                    $this->db->where("lp.jenis_layanan = 'Intensive Care'");
                } else {
                    // Kondisi: tempat_layanan = icu dan jenis_rawat memiliki nilai
                    $this->db->where("bic.id = '" . $search["jenis_rawat"] . "'");
                }

            } elseif ($search["tempat_layanan"] === "lab") {

                // Kondisi: tempat_layanan = lab
                $this->db->where("lp.jenis_layanan = 'Laboratorium'");

            } elseif ($search["tempat_layanan"] === "hemo") {

                // Kondisi: tempat_layanan = hemo (Hemodialisa)
                $this->db->where("lp.jenis_layanan = 'Hemodialisa'");

            }

        } else {
            // Kondisi: tempat_layanan kosong
            $this->db->where("(lp.jenis_layanan='IGD' OR lp.jenis_layanan='Poliklinik' OR lp.jenis_layanan='Intensive Care' OR lp.jenis_layanan='Rawat Inap' OR lp.jenis_layanan='Laboratorium' OR lp.jenis_layanan='Hemodialisa')");
        }


            

        if ($search["periode_laporan"] === "Harian") {
            if ($search["tanggal_harian"] !== "") {
                $this->db->where(" to_char(orlab.waktu_order, 'yyyy-mm-dd') ILIKE '%" . date2mysql($search['tanggal_harian']) . "%' ");
            }
        } elseif ($search["periode_laporan"] === "Bulanan" && $search["bulan"] !== "" && $search["tahun"] !== "") {
            $this->db->where(" to_char(orlab.waktu_order, 'yyyy/mm') = '" . $search["tahun"] . "/" . $search["bulan"] . "' ");
        } elseif ($search["periode_laporan"] === "Rentang Waktu" && $search["tanggal_awal"] !== "" && $search["tanggal_akhir"] !== "") {
            if ($search["tanggal_awal"] !== "" && $search["tanggal_akhir"] !== "") {
                $this->db->where("orlab.waktu_order BETWEEN '" . date2mysql($search['tanggal_awal']) . " 00:00:00' AND '" . date2mysql($search['tanggal_akhir']) . " 23:59:59'");
            }
        }

        return $this->db->order_by('orlab.waktu_order', 'desc');
        
    }

    private function sqlDataLayanan($id)
    {
        
        $this->db->select("tap.total, l.nama");
        $this->db->from("sm_order_laboratorium as orlab");
        $this->db->join("sm_laboratorium as sl", "orlab.id = sl.id_order_laboratorium", "left");
        $this->db->join("sm_detail_laboratorium as sdl", "sdl.id_laboratorium = sl.id", "left");
        $this->db->join("sm_tarif_pelayanan as tap", "tap.id = sdl.id_tarif", "left");
        $this->db->join("sm_layanan as l", "l.id = tap.id_layanan", "left");
        $this->db->where("orlab.id", $id, true);
        
        return $this->db->order_by('orlab.id', 'asc');
        
    }
    //testing

    function getRekapDataHarga($limit, $start, $search)
    {
        $this->sqlRekapDataHarga($search);

        $data = $this->db->get()->result();

        if(!empty($data)){

            foreach ($data as $a => $b) {

                $this->sqlDataLayanan((int)$b->id);

                $dataLayanan = $this->db->get()->result();

                $x[$a] = $dataLayanan;

                $totalHarga = 0;

                foreach ($x[$a] as $c => $d) {

                    $totalHarga += (int)$d->total;


                }

                $y[$a] = $totalHarga;

                $layanan['detail'] = $data[$a];
                $layanan['datalaboratorium'] = $x[$a];
                $layanan['total_harga'] = $y[$a];

                $rekapLayanan[] = $layanan;

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

            $totalData = count($rekapLayanan);

            $allData = range(1, $totalData);

            $xData = array_slice($allData, $start, $limit);
            
            if(!empty($xData)){
                foreach ($xData as $g => $h) {
                    $i = (int)$h - 1;
                    $dataLimit[] = $rekapLayanan[(int)$i];
                }
            } else {

                $dataLimit = $xData;

            }

            $dataX["periode"] = $periode;
            $dataX["data"]    = $dataLimit;
            $dataX["jumlah"]  = count($rekapLayanan);
            
            $this->db->close();

            return $dataX;

        }

    }

    function getExportRekapDataHarga($search)
    {
        $this->sqlRekapDataHarga($search);

        $data = $this->db->get()->result();

        if(!empty($data)){

            foreach ($data as $a => $b) {

                $this->sqlDataLayanan((int)$b->id);

                $dataLayanan = $this->db->get()->result();

                $x[$a] = $dataLayanan;

                $totalHarga = 0;

                foreach ($x[$a] as $c => $d) {

                    $totalHarga += (int)$d->total;


                }

                $y[$a] = $totalHarga;

                $layanan['detail'] = $data[$a];
                $layanan['datalaboratorium'] = $x[$a];
                $layanan['total_harga'] = $y[$a];


                $rekapLayanan[] = $layanan;

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

            $dataX["periode"] = $periode;
            $dataX["data"]    = $rekapLayanan;
            
            $this->db->close();

            return $dataX;

        }

    }

    function getPoliklinik()
    {
        $sql = "SELECT * FROM sm_spesialisasi WHERE is_klinik='1' AND id not in (58) ORDER BY nama ASC ";
        $query = $this->db->query($sql)->result();
        $data =  array();
        $data[''] = '- Semua Poliklinik -';
        foreach ($query as $key => $value) :
            $data[$value->id] = $value->nama;
        endforeach;

        return $data;
    }

    function getBangsalRanap()
    {
        $sql = "SELECT * FROM sm_bangsal where is_active='Ya' and keterangan <> 'Intensive Care' ORDER BY nama ASC ";
        $query = $this->db->query($sql)->result();
        $data =  array();
        $data[''] = '- Semua Bangsal Rawat Inap -';
        foreach ($query as $key => $value) :
            $data[$value->id] = $value->nama;
        endforeach;

        return $data;
    }

    function getBangsalICare()
    {
        $sql = "SELECT * FROM sm_bangsal where is_active='Ya' and keterangan = 'Intensive Care' ORDER BY nama ASC ";
        $query = $this->db->query($sql)->result();
        $data =  array();
        $data[''] = '- Semua Bangsal ICare -';
        foreach ($query as $key => $value) :
            $data[$value->id] = $value->nama;
        endforeach;

        return $data;
    }

}
