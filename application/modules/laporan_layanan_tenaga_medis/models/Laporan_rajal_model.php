<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Laporan_rajal_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->datetime = date('Y-m-d H:i:s');
    }

    public function list_laporan()
    {
        return array(
            ''      => '-- Pilih Laporan Rawat Jalan --',
            '1'     => 'Laporan Waktu Tunggu Pasien',
            '2'     => 'Laporan Tindakan Dokter',
            '3'     => 'Laporan Kunjungan Tempat Layanan',
            '4'     => 'Laporan MRS Rawat Jalan',
            '5'     => 'Laporan Diagnosa Rawat Jalan',
            '6'     => 'Daftar Verifikasi Diagnosis PP',
            '7'     => 'Laporan Status Keluar Pasien',
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
		WHERE id IN ('303','304','305','295')
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

    public function getListDataLaporanWaktuTunggu($limit, $start, $search)
    {

        $param = "";
        $query = "";
        $limitation = "";

        if ($search["id_dokter"] !== "") {
            $param .= " AND lp.id_dokter = '" . $search["id_dokter"] . "' ";
        }
        if ($search["penjamin"] !== "") {
            $param .= " AND lp.id_penjamin = '" . $search["penjamin"] . "' ";
        }
        if ($search["periode_laporan"] === "Harian") {
            if ($search["tanggal_harian"] !== "") :
                $param .= " and to_char( lp.tanggal_layanan, 'yyyy-mm-dd' ) ilike '%" . date2mysql($search['tanggal_harian']) . "' ";
            endif;
        } elseif ($search["periode_laporan"] === "Bulanan" & $search["bulan"] !== "" & $search["tahun"] !== "") {
            $param .= " and to_char( lp.tanggal_layanan, 'yyyy/mm' ) = '" . $search["tahun"] . "/" . $search["bulan"] . "' ";
        } elseif ($search["periode_laporan"] === "Rentang Waktu" & $search["tanggal_awal"] !== "" & $search["tanggal_akhir"] !== "") {
            if ($search["tanggal_awal"] !== "" & $search["tanggal_akhir"] !== "") :
                $param .= " and lp.tanggal_layanan BETWEEN '" . date2mysql($search['tanggal_awal']) . " 00:00:00' AND '" . date2mysql($search['tanggal_akhir']) . " 23:59:59'";
            endif;
        }
        if ($search["tempat_layanan"] !== "") :
			$param .= " and sp.nama = '".$search["tempat_layanan"]."' ";
		endif;

        if ($limit !== 0) {
            $limitation = " LIMIT " . $limit . " OFFSET " . $start;
        }

        $select = "SELECT p.id AS no_rm, p.nama AS nama, pd.tanggal_daftar AS tanggal_kunjungan, pd.tanggal_keluar AS tanggal_selesai, pd.tanggal_keluar - pd.tanggal_daftar AS waktu_tunggu, p.kelamin, DATE_PART('year', age(now(), p.tanggal_lahir)) AS umur, p.alamat, pd.status AS kunjungan, pd.jenis_pendaftaran AS asal_pasien, COALESCE(pj.nama, '') AS penjamin, COALESCE(pd.keterangan, pd.jenis_pendaftaran) AS keterangan, pg.nama AS nama_dokter, CASE WHEN sp.nama IS NULL THEN lp.jenis_layanan ELSE sp.nama END AS unit_pelayanan";
        $count = "SELECT COUNT(*) AS count FROM (SELECT DISTINCT ON (pd.id) pd.id, p.id";
        $sql = "
            FROM sm_pendaftaran AS pd
            JOIN sm_pasien AS p ON p.id = pd.id_pasien
            JOIN sm_layanan_pendaftaran AS lp ON lp.id_pendaftaran = pd.id
            JOIN sm_tenaga_medis AS tm ON tm.id = lp.id_dokter
            JOIN sm_penjamin AS pj ON pj.id = lp.id_penjamin
            JOIN sm_pegawai AS pg ON tm.id_pegawai = pg.id
            JOIN sm_profesi_nadis AS pn ON tm.id_profesi = pn.id
            JOIN sm_jabatan AS jb ON pg.id_jabatan = jb.id
            JOIN sm_spesialisasi AS sp ON sp.id = lp.id_unit_layanan
            WHERE pd.id IS NOT NULL" . $param . "
            GROUP BY pd.id, p.id, p.nama, pd.tanggal_daftar, pd.tanggal_keluar, pd.tanggal_keluar - pd.tanggal_daftar, p.kelamin, p.tanggal_lahir, p.alamat, pj.nama, pd.status, pd.jenis_pendaftaran, COALESCE(pj.nama, ''), COALESCE(pd.keterangan, pd.jenis_pendaftaran), pg.nama, sp.nama, lp.jenis_layanan
            ORDER BY pd.id DESC";

        $query = $this->db->query($count . $sql . ") AS b")->row()->count;
        $result = $this->db->query($select . $sql . $limitation)->result();

        $totalWaktu = "SELECT SUM(tanggal_keluar - tanggal_daftar) AS total_waktu_tunggu
                        FROM sm_pendaftaran as pd
                        JOIN sm_layanan_pendaftaran AS lp ON lp.id_pendaftaran = pd.id
                        JOIN sm_tenaga_medis AS tm ON tm.id = lp.id_dokter
                        JOIN sm_penjamin AS pj ON pj.id = lp.id_penjamin
                        JOIN sm_pegawai AS pg ON tm.id_pegawai = pg.id
                        JOIN sm_profesi_nadis AS pn ON tm.id_profesi = pn.id
                        JOIN sm_jabatan AS jb ON pg.id_jabatan = jb.id
                        JOIN sm_spesialisasi AS sp ON sp.id = lp.id_unit_layanan
                        WHERE tanggal_keluar IS NOT NULL" . $param ;

        $totalData = "SELECT COUNT(*) AS total
                        FROM sm_pendaftaran as pd
                        JOIN sm_layanan_pendaftaran AS lp ON lp.id_pendaftaran = pd.id
                        JOIN sm_tenaga_medis AS tm ON tm.id = lp.id_dokter
                        JOIN sm_penjamin AS pj ON pj.id = lp.id_penjamin
                        JOIN sm_pegawai AS pg ON tm.id_pegawai = pg.id
                        JOIN sm_profesi_nadis AS pn ON tm.id_profesi = pn.id
                        JOIN sm_jabatan AS jb ON pg.id_jabatan = jb.id
                        JOIN sm_spesialisasi AS sp ON sp.id = lp.id_unit_layanan
                        WHERE tanggal_keluar IS NOT NULL" . $param;

        // hitung waktu tunggu
        $queryTotalWaktu = $this->db->query($totalWaktu)->row()->total_waktu_tunggu;
        $queryTotalData = $this->db->query($totalData)->row()->total;
        $matches = array();
        preg_match('/(\d+):(\d+):(\d+)/', $queryTotalWaktu, $matches);
        if (count($matches) >= 4) {
            $hours = intval($matches[1]);
            $minutes = intval($matches[2]);
            $seconds = intval($matches[3]);
            $days = 0;
            // Hitung total waktu dalam detik
            $totalSeconds = ((($days * 24 + $hours) * 60 + $minutes) * 60 + $seconds);

            $data["total_waktu"] = $totalSeconds;
            $data["total_data"] = $queryTotalData;
            $data['rata_waktu'] = $totalSeconds / $queryTotalData;
        } else {
            // Handle jika format waktu tidak sesuai
            $data["total_waktu"] = null;
            $data["total_data"] = $queryTotalData;
            $data['rata_waktu'] = null;
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

        $data["periode"] = $periode;
        $data["data"]    = $result;
        $data["jumlah"]  = $query;

        $this->db->close();

        return $data;
    }

    public function getListDataLaporanPemeriksaan($limit, $start, $search)
    {
        
        // var_dump($search);die;

        $param = "";
        $query = "";
        $limitation = "";

        if ($search["id_dokter"] !== "") {
            $param .= " AND tm.id = '" . $search["id_dokter"] . "' ";
        }

        if ($search["penjamin"] !== "") {
            $param .= " AND lp.id_penjamin = '" . $search["penjamin"] . "' ";
        }

        if ($search["periode_laporan"] === "Harian") {
            if ($search["tanggal_harian"] !== "") {
                $param .= " AND to_char(lp.tanggal_layanan, 'yyyy-mm-dd') ILIKE '%" . date2mysql($search['tanggal_harian']) . "%' ";
            }
        } elseif ($search["periode_laporan"] === "Bulanan" && $search["bulan"] !== "" && $search["tahun"] !== "") {
            $param .= " AND to_char(lp.tanggal_layanan, 'yyyy/mm') = '" . $search["tahun"] . "/" . $search["bulan"] . "' ";
        } elseif ($search["periode_laporan"] === "Rentang Waktu" && $search["tanggal_awal"] !== "" && $search["tanggal_akhir"] !== "") {
            if ($search["tanggal_awal"] !== "" && $search["tanggal_akhir"] !== "") {
                $param .= " AND lp.tanggal_layanan BETWEEN '" . date2mysql($search['tanggal_awal']) . " 00:00:00' AND '" . date2mysql($search['tanggal_akhir']) . " 23:59:59' ";
            }
        }

        if ($search["tempat_layanan"] !== "") {
            $param .= " AND sp.nama = '" . $search["tempat_layanan"] . "' ";
        }

        if ($limit !== 0) {
            $limitation = " LIMIT " . $limit . " OFFSET " . $start;
        }
        // var_dump($param);die;

        $select = "SELECT pg.nama AS dokter, l.nama AS tindakan, COUNT(l.nama) AS jumlah_tindakan";
        $count = "SELECT COUNT(*) AS count FROM (SELECT DISTINCT ON (sp.nama, pg.nama, l.nama) sp.nama, pg.nama, l.nama";

        $sql = "
            FROM sm_pendaftaran p
            JOIN sm_layanan_pendaftaran lp ON p.id = lp.id_pendaftaran
            LEFT JOIN sm_spesialisasi sp ON lp.id_unit_layanan = sp.id
            JOIN sm_tarif_tindakan_pasien tp ON lp.id = tp.id_layanan_pendaftaran
            LEFT JOIN sm_tarif_pelayanan tpl ON tp.id_tarif_pelayanan = tpl.id
            LEFT JOIN sm_layanan l ON tpl.id_layanan = l.id
            LEFT JOIN sm_tenaga_medis tm ON tp.id_operator = tm.id
            LEFT JOIN sm_pegawai pg ON tm.id_pegawai = pg.id
            WHERE p.id IS NOT NULL" . $param . "
            GROUP BY sp.nama, pg.nama, l.nama
            ORDER BY sp.nama, pg.nama, l.nama";

        $query = $this->db->query($count . $sql . ") AS b")->row()->count;
        $result = $this->db->query($select . $sql . $limitation)->result();

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
        $data["data"]    = $result;
        $data["jumlah"]  = $query;
        // var_dump($data);die;

        $this->db->close();

        return $data;
    }

    public function getListDataLaporanKunjungan($limit, $start, $search)
    {
        
        // var_dump($search);die;

        $param = "";
        $query = "";
        $limitation = "";

        if ($search["id_dokter"] !== "") {
            $param .= " AND tm.id = '" . $search["id_dokter"] . "' ";
        }

        if ($search["penjamin"] !== "") {
            $param .= " AND lp.id_penjamin = '" . $search["penjamin"] . "' ";
        }

        if ($search["periode_laporan"] === "Harian") {
            if ($search["tanggal_harian"] !== "") {
                $param .= " AND to_char(lp.tanggal_layanan, 'yyyy-mm-dd') ILIKE '%" . date2mysql($search['tanggal_harian']) . "%' ";
            }
        } elseif ($search["periode_laporan"] === "Bulanan" && $search["bulan"] !== "" && $search["tahun"] !== "") {
            $param .= " AND to_char(lp.tanggal_layanan, 'yyyy/mm') = '" . $search["tahun"] . "/" . $search["bulan"] . "' ";
        } elseif ($search["periode_laporan"] === "Rentang Waktu" && $search["tanggal_awal"] !== "" && $search["tanggal_akhir"] !== "") {
            if ($search["tanggal_awal"] !== "" && $search["tanggal_akhir"] !== "") {
                $param .= " AND lp.tanggal_layanan BETWEEN '" . date2mysql($search['tanggal_awal']) . " 00:00:00' AND '" . date2mysql($search['tanggal_akhir']) . " 23:59:59' ";
            }
        }

        if ($search["tempat_layanan"] !== "") {
            $param .= " AND sp.nama = '" . $search["tempat_layanan"] . "' ";
        }

        if ($limit !== 0) {
            $limitation = " LIMIT " . $limit . " OFFSET " . $start;
        }
        // var_dump($param);die;

        $select = "SELECT pd.ID,
                        p.id AS no_rm,
                        P.nama AS nama_pasien,
                        pd.tanggal_daftar AS tanggal_kunjungan,
                        pj.nama AS jaminan,
                        lp.status_terlayani,
                        lp.tindak_lanjut,
                        pg.nama AS nama_dokter";
                    
        $count = "SELECT count(*) as count from (select pd.id" ;

        $sql = "
        FROM sm_pasien P
        JOIN sm_pendaftaran AS pd ON (pd.id_pasien = P.ID)
        LEFT JOIN sm_penjamin AS pj ON (pj.ID = pd.id_penjamin)
        JOIN sm_layanan_pendaftaran AS lp ON (lp.id_pendaftaran = pd.ID)
        LEFT JOIN sm_tenaga_medis AS tm ON (tm.ID = lp.id_dokter)
        LEFT JOIN sm_pegawai AS pg ON (pg.ID = tm.id_pegawai)
        LEFT JOIN sm_spesialisasi sp ON (lp.id_unit_layanan = sp.id)
        WHERE lp.jenis_layanan IN ('Poliklinik', 'Medical Check Up')" . $param . "
        GROUP BY pd.ID, p.id, P.nama, pd.tanggal_daftar, pj.nama, pg.nama, lp.status_terlayani, lp.tindak_lanjut
        ";

        $query = $this->db->query($count . $sql . ") AS b")->row()->count;
        $result = $this->db->query($select . $sql . $limitation)->result();

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
        $data["data"]    = $result;
        $data["jumlah"]  = $query;
        // var_dump($data);die;

        $this->db->close();

        return $data;
    }

    private function sqlDataLayanan($id)
    {
        
        $this->db->select("lp.id", false);
        $this->db->from('sm_layanan_pendaftaran as lp')
            ->join('sm_pendaftaran as p', 'p.id = lp.id_pendaftaran', 'left');
        $this->db->where('lp.id_pendaftaran', $id, true);
        $this->db->where('lp.jenis_layanan', 'Rawat Inap', true);
        $this->db->order_by('lp.id', 'asc');

        return $this->db->get()->result();

    }

    private function sqlDataPoli($id)
    {
        
        $this->db->select("lp.id, ss.nama", false);
        $this->db->from('sm_layanan_pendaftaran as lp')
            ->join('sm_spesialisasi as ss', 'lp.id_unit_layanan = ss.id', 'left')
            ->join('sm_pendaftaran as p', 'p.id = lp.id_pendaftaran', 'left');
        $this->db->where('lp.id_pendaftaran', $id, true);
        $this->db->where('lp.jenis_layanan', 'Poliklinik', true);
        $this->db->order_by('lp.id', 'asc');

        return $this->db->get()->row();

    }

    private function sqlDataLaporanMrs($search)
    {
        
        $this->db->select("p.id", false);
        $this->db->from('sm_pendaftaran as p')
            ->join('sm_layanan_pendaftaran as lp', 'lp.id_pendaftaran = p.id', 'left')
            ->join('sm_spesialisasi as ss', 'lp.id_unit_layanan = ss.id', 'left');
        $this->db->where('p.jenis_pendaftaran', 'Poliklinik', true);
        $this->db->where('p.jenis_rawat', 'Inap', true);
        $this->db->where('lp.tindak_lanjut', 'Rawat Inap', true);

        if ($search["penjamin"] !== "") {
            $this->db->where("lp.id_penjamin = '" . $search["penjamin"] . "' ");
        }

        if ($search["tempat_layanan"] !== "") {
            $this->db->where("ss.nama = '" . $search["tempat_layanan"] . "' ");
        }

        if ($search["periode_laporan"] === "Harian") {
            if ($search["tanggal_harian"] !== "") {
                $this->db->where(" to_char(p.tanggal_daftar, 'yyyy-mm-dd') ILIKE '%" . date2mysql($search['tanggal_harian']) . "%' ");
            }
        } elseif ($search["periode_laporan"] === "Bulanan" && $search["bulan"] !== "" && $search["tahun"] !== "") {
            $this->db->where(" to_char(p.tanggal_daftar, 'yyyy/mm') = '" . $search["tahun"] . "/" . $search["bulan"] . "' ");
        } elseif ($search["periode_laporan"] === "Rentang Waktu" && $search["tanggal_awal"] !== "" && $search["tanggal_akhir"] !== "") {
            if ($search["tanggal_awal"] !== "" && $search["tanggal_akhir"] !== "") {
                $this->db->where("p.tanggal_daftar BETWEEN '" . date2mysql($search['tanggal_awal']) . " 00:00:00' AND '" . date2mysql($search['tanggal_akhir']) . " 23:59:59'");
            }
        }

        return $this->db->order_by('p.id', 'asc');
        
    }

    private function sqlDataDiagnosa($id)
    {
        
        $this->db->select("d.*, gss.nama as diagnosa, null as nama_poli, p.jenis_rawat, ps.nama as nama_pasien, p.id as id_pendaftaran, DATE_PART('year', age(now(), ps.tanggal_lahir)) AS umur, ps.alamat, ps.kelamin, pj.nama as cara_bayar, lp.tindak_lanjut, b.nama as nama_bangsal, ps.id as no_rm", false);
        $this->db->from('sm_diagnosa as d')
            ->join('sm_layanan_pendaftaran as lp', 'd.id_layanan_pendaftaran = lp.id', 'left')
            ->join('sm_golongan_sebab_sakit as gss', 'd.id_golongan_sebab_sakit = gss.id', 'left')
            ->join('sm_pendaftaran as p', 'p.id = lp.id_pendaftaran', 'left')
            ->join('sm_pasien as ps', 'ps.id = p.id_pasien', 'left')
            ->join('sm_rawat_inap as ri', 'ri.id_layanan_pendaftaran = lp.id', 'left')
            ->join('sm_bangsal as b', 'b.id = ri.id_bangsal', 'left')
            ->join('sm_penjamin as pj', 'pj.id = lp.id_penjamin', 'left');
        $this->db->where('d.id_layanan_pendaftaran', $id, true);
        $this->db->where('d.prioritas', 'Utama', true);
        $this->db->where('d.diagnosa_manual !=', '0', true);
        return $this->db->group_by('p.id, d.id, gss.nama, ps.nama, ps.tanggal_lahir, ps.alamat, ps.kelamin, pj.nama, lp.tindak_lanjut, b.nama, ps.id', 'asc');

    }

    //testing

    function getListDataLaporanMrs($limit, $start, $search)
    {
        $this->sqlDataLaporanMrs($search);

        $data = $this->db->get()->result();

        if(!empty($data)){

            foreach ($data as $a => $b) {

                $dataLayanan = $this->sqlDataLayanan((int)$b->id);

                foreach ($dataLayanan as $c => $d) {

                    $this->sqlDataDiagnosa((int)$d->id);

                    $dataY = $this->db->get()->result();

                    if(!empty($dataY)){

                        $dataDiagnosa[] = $dataY[0];
                        
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

            $tempArray = array();

            $i = 0;

            $keyArray = array();

            foreach($dataDiagnosa as $val) {

                if (!in_array($val->id_pendaftaran, $keyArray)) {

                    $keyArray[$i] = $val->id_pendaftaran;

                    $tempArray[$i] = $val;

                }

                $i++;

            }

            $diag = [];

            foreach($tempArray as $e => $f) {

                array_push($diag, $f);
            
            }

            $keys = array_column($diag, 'nama_bangsal');
            array_multisort($keys, SORT_ASC, $diag);

            $totalData = count($diag);

            $allData = range(1, $totalData);

            $xData = array_slice($allData, $start, $limit);
            
            if(!empty($xData)){
                foreach ($xData as $g => $h) {
                    $i = (int)$h - 1;
                    $dataPoli[(int)$i] = $this->sqlDataPoli((int)$diag[(int)$i]->id_pendaftaran);
                    $diag[(int)$i]->nama_poli = $dataPoli[(int)$i]->nama;
                    $dataLimit[] = $diag[(int)$i];
                }
            } else {

                $dataLimit = $xData;

            }

            $dataX["periode"] = $periode;
            $dataX["data"]    = $dataLimit;
            $dataX["jumlah"]  = count($diag);
            
            $this->db->close();

            return $dataX;

        }

    }

    function getExportLaporan($search)
    {
        $this->sqlDataLaporanMrs($search);

        $data = $this->db->get()->result();

        if(!empty($data)){

            foreach ($data as $a => $b) {

                $dataLayanan = $this->sqlDataLayanan((int)$b->id);

                foreach ($dataLayanan as $c => $d) {

                    $this->sqlDataDiagnosa((int)$d->id);

                    $dataY = $this->db->get()->result();

                    if(!empty($dataY)){

                        $dataDiagnosa[] = $dataY[0];

                    }

                }

            }
            
            $tempArray = array();

            $i = 0;

            $keyArray = array();

            foreach($dataDiagnosa as $val) {

                if (!in_array($val->id_pendaftaran, $keyArray)) {

                    $keyArray[$i] = $val->id_pendaftaran;

                    $tempArray[$i] = $val;

                }

                $i++;

            }

            foreach($tempArray as $e => $f) {

                $dataPoli = $this->sqlDataPoli((int)$f->id_pendaftaran);
                $f->nama_poli = $dataPoli->nama;
                $diag[] = $f;

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
            $dataX["data"]    = $diag;

            $this->db->close();

            return $dataX;

        }

    }

    private function sqlDataLaporanDiagnosa($search)
    {
        
        $this->db->select("p.id, p.tanggal_daftar, null as diagnosis, d.id_layanan_pendaftaran, gss.kode_icdx, gss.nama as diagnosa, gs.kode_icdx as kode_manual, gs.nama as diagnosa_manual", false);
        $this->db->from('sm_pendaftaran as p')
            ->join('sm_layanan_pendaftaran as lp', 'lp.id_pendaftaran = p.id', 'left')
            ->join('sm_spesialisasi as ss', 'lp.id_unit_layanan = ss.id', 'left')
            ->join('sm_diagnosa as d', 'd.id_layanan_pendaftaran = lp.id', 'left')
            ->join('sm_golongan_sebab_sakit as gss', 'd.id_golongan_sebab_sakit = gss.id', 'left')
            ->join('sm_golongan_sebab_sakit as gs', 'd.id_pengkodean = gs.id', 'left');


        $this->db->where('p.jenis_pendaftaran', 'Poliklinik', true);
        $this->db->where('d.prioritas', 'Utama', true);
        
        if ($search["tempat_layanan"] !== "") {
            $this->db->where("ss.nama = '" . $search["tempat_layanan"] . "' ");
        }

        if ($search["periode_laporan"] === "Harian") {
            if ($search["tanggal_harian"] !== "") {
                $this->db->where(" to_char(p.tanggal_daftar, 'yyyy-mm-dd') ILIKE '%" . date2mysql($search['tanggal_harian']) . "%' ");
            }
        } elseif ($search["periode_laporan"] === "Bulanan" && $search["bulan"] !== "" && $search["tahun"] !== "") {
            $this->db->where(" to_char(p.tanggal_daftar, 'yyyy/mm') = '" . $search["tahun"] . "/" . $search["bulan"] . "' ");
        } elseif ($search["periode_laporan"] === "Rentang Waktu" && $search["tanggal_awal"] !== "" && $search["tanggal_akhir"] !== "") {
            if ($search["tanggal_awal"] !== "" && $search["tanggal_akhir"] !== "") {
                $this->db->where("p.tanggal_daftar BETWEEN '" . date2mysql($search['tanggal_awal']) . " 00:00:00' AND '" . date2mysql($search['tanggal_akhir']) . " 23:59:59'");
            }
        }

        return $this->db->order_by('p.id', 'asc');
        
    }

    function getListDataLaporanDiagnosa($limit, $start, $search)
    {
        
        $yData = null;
        $xData = null;
        $filteredArray = null;

        $this->sqlDataLaporanDiagnosa($search);

        $data = $this->db->get()->result();

        if(!empty($data)){

            foreach ($data as $a => $b) {

                if($b->kode_icdx !== null){

                    $kode_icdx = $b->kode_icdx;
                    

                } else {

                    $kode_icdx = $b->kode_manual;
                    $diagnosa = $b->diagnosa_manual;

                }

                if (!isset($aggregates[$kode_icdx])) {
                    $aggregates[$kode_icdx] = array(
                        "count" => 0,
                        "diagnosa" => array()
                    );
                }
                
                $aggregates[$kode_icdx]["count"]++;

                if (isset($b->diagnosa) && !is_null($b->diagnosa)) {
                    
                    $diagnosa = $b->diagnosa;

                } else {

                    $diagnosa = $b->diagnosa_manual;

                }

                $aggregates[$kode_icdx]["diagnosa"] = $diagnosa;
                
                
            }

            $filteredArray = array_filter($aggregates, function($value, $key) {
                return $key !== "";
            }, ARRAY_FILTER_USE_BOTH);

            arsort($filteredArray);

            $i = 0;

            foreach($filteredArray as $e => $f) {

                $xData[$i]['icdx'] = $e;
                $xData[$i]['count'] = $f['count'];
                $xData[$i]['diagnosa'] = $f['diagnosa'];

                $i++;

            }



            $totalData = count($filteredArray);

            $allData = range(1, $totalData);

            $yData = array_slice($allData, $start, $limit);

        }

        if(!empty($yData) && isset($yData)){
            foreach ($yData as $g => $h) {


                $y = (int)$h - 1;
                $dataLimit[] = $xData[(int)$y];
            }

        } else {

            $dataLimit = $xData;

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

        if($filteredArray === null){

            $countFilter = null;

        } else {

            $countFilter = count($filteredArray);

        }

        $dataX["periode"] = $periode;
        $dataX["data"]    = $dataLimit;
        $dataX["jumlah"]  = (int)$countFilter;

        $this->db->close();

        return $dataX;

    }

    function getExportLaporanDiagnosa($search)
    {
        $yData = null;
        $xData = null;
        $filteredArray = null;

        $this->sqlDataLaporanDiagnosa($search);

        $data = $this->db->get()->result();

        if(!empty($data)){

            foreach ($data as $a => $b) {

                if($b->kode_icdx !== null){

                    $kode_icdx = $b->kode_icdx;
                    

                } else {

                    $kode_icdx = $b->kode_manual;
                    $diagnosa = $b->diagnosa_manual;

                }

                if (!isset($aggregates[$kode_icdx])) {
                    $aggregates[$kode_icdx] = array(
                        "count" => 0,
                        "diagnosa" => array()
                    );
                }
                
                $aggregates[$kode_icdx]["count"]++;

                if (isset($b->diagnosa) && !is_null($b->diagnosa)) {
                    
                    $diagnosa = $b->diagnosa;

                } else {

                    $diagnosa = $b->diagnosa_manual;

                }

                $aggregates[$kode_icdx]["diagnosa"] = $diagnosa;
                
                
            }

            $filteredArray = array_filter($aggregates, function($value, $key) {
                return $key !== "";
            }, ARRAY_FILTER_USE_BOTH);

            arsort($filteredArray);

            $i = 0;

            foreach($filteredArray as $e => $f) {

                $xData[$i]['icdx'] = $e;
                $xData[$i]['count'] = $f['count'];
                $xData[$i]['diagnosa'] = $f['diagnosa'];

                $i++;

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
            $dataX["data"]    = $xData;

            $this->db->close();

            return $dataX;

        }

    }

    function getListDataLaporanDiagnosaPp($limit, $start, $search)
    {
        $param = "";
		if ($search["periode_laporan"] === "Harian") {
			if ($search["tanggal_harian"] !== "") :
				$param .= " and to_char( pd.tanggal_daftar, 'yyyy-mm-dd' ) ilike '%" . date2mysql($search['tanggal_harian']) . "' ";
			endif;
		} elseif ($search["periode_laporan"] === "Bulanan" & $search["bulan"] !== "" & $search["tahun"] !== "") {
			$param .= " and to_char( pd.tanggal_daftar, 'mm/yyyy' ) ilike '%" . $search["bulan"] . "/" . $search["tahun"] . "' ";
		} elseif ($search["periode_laporan"] === "Rentang Waktu" & $search["tanggal_awal"] !== "" & $search["tanggal_akhir"] !== "") {
			if ($search["tanggal_awal"] !== "" & $search["tanggal_akhir"] !== "") :
				$param .= " and pd.tanggal_daftar BETWEEN '" . date2mysql($search['tanggal_awal']) . " 00:00:00' AND '" . date2mysql($search['tanggal_akhir']) . " 23:59:59'";
			endif;
		}

        if ($search["tempat_layanan"] !== "") {
            $param .= " and sp.nama = '" . $search["tempat_layanan"] . "' ";
        }

        $query      = "";
		$limitation = "";
		if ($limit !== 0) :
			$limitation = " limit " . $limit . " offset " . $start;
		endif;

        $select = " SELECT * FROM (
            SELECT pd.ID,
                lp.id as id_layanan_pendaftaran,
                pd.status as status_kunjungan,
                pd.tanggal_daftar,
                pd.id_pasien,
                P.nama AS nama_pasien,
                pd.status as kunjungan,
                pj.nama AS penjamin,
                case when sp.nama is null then lp.jenis_layanan else sp.nama end AS unit_pelayanan,
                pg.nama AS nama_dokter,
                P.kelamin,
                concat (
                    EXTRACT ( YEAR FROM AGE( P.tanggal_lahir ) ),
                    ' thn ',
                    EXTRACT ( MONTH FROM AGE( P.tanggal_lahir ) ),
                    ' bln ',
                    EXTRACT ( DAY FROM AGE( P.tanggal_lahir ) ),
                    ' hari'
                ) AS umur,
                P.alamat,
                P.nama_kec,
                pd.tanggal_keluar AS tgl_selesai  ";
            $count  = "select count(*) as count from (select pd.id ";
            $sql    = "FROM sm_pasien P
            JOIN sm_pendaftaran AS pd ON ( pd.id_pasien = P.ID )
            LEFT JOIN sm_penjamin AS pj ON ( pj.ID = pd.id_penjamin )
            JOIN sm_layanan_pendaftaran AS lp ON ( lp.id_pendaftaran = pd.ID )
            LEFT JOIN sm_anamnesa as an on (an.id_layanan_pendaftaran = lp.id)
            LEFT JOIN sm_rawat_inap AS ra ON ( ra.id_layanan_pendaftaran = lp.ID )
            LEFT JOIN sm_kelas AS kl ON ( kl.ID = ra.id_kelas )
            LEFT JOIN sm_bangsal AS b ON ( b.ID = ra.id_bangsal )
            LEFT JOIN sm_spesialisasi AS sp ON ( sp.ID = lp.id_unit_layanan )
            LEFT JOIN sm_tenaga_medis AS tm ON ( tm.ID = lp.id_dokter )
            LEFT JOIN sm_pegawai AS pg ON ( pg.ID = tm.id_pegawai )
            
                            
            where lp.id is not null AND pd.status != 'Batal' AND lp.status_terlayani = 'Sudah' 
            and lp.jenis_layanan IN ('Poliklinik', 'Forensik', 'Pemulasaran Jenazah', 'Hemodialisa', 'Medical Check Up') " . $param . " 
            
                            
            GROUP BY pg.nama, pd.status, pd.ID,lp.id,pd.id_pasien,lp.tanggal_layanan,P.nama,pd.status,pj.nama,sp.nama, pd.keterangan,P.kelamin,p.tanggal_lahir,P.alamat,P.nama_kec,pd.tanggal_keluar ) Lap ";
    
        $order = " ORDER BY tanggal_daftar asc ";

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

        foreach ($query as $value) {
			$value->diagnosa_data = $this->getDiagnosaListLaporanByIdLayananPendaftaran($value->id_layanan_pendaftaran);
		}

        $data["periode"] = $periode;
		$data["data"]    = $query;
		$data["jumlah"]  = $this->db->query($count . $sql)->row()->count;

        return $data;
    }

    function getExportDataLaporanDiagnosaPp($search)
    {
        $param = "";
		if ($search["periode_laporan"] === "Harian") {
			if ($search["tanggal_harian"] !== "") :
				$param .= " and to_char( pd.tanggal_daftar, 'yyyy-mm-dd' ) ilike '%" . date2mysql($search['tanggal_harian']) . "' ";
			endif;
		} elseif ($search["periode_laporan"] === "Bulanan" & $search["bulan"] !== "" & $search["tahun"] !== "") {
			$param .= " and to_char( pd.tanggal_daftar, 'mm/yyyy' ) ilike '%" . $search["bulan"] . "/" . $search["tahun"] . "' ";
		} elseif ($search["periode_laporan"] === "Rentang Waktu" & $search["tanggal_awal"] !== "" & $search["tanggal_akhir"] !== "") {
			if ($search["tanggal_awal"] !== "" & $search["tanggal_akhir"] !== "") :
				$param .= " and pd.tanggal_daftar BETWEEN '" . date2mysql($search['tanggal_awal']) . " 00:00:00' AND '" . date2mysql($search['tanggal_akhir']) . " 23:59:59'";
			endif;
		}

        if ($search["tempat_layanan"] !== "") {
            $param .= " and sp.nama = '" . $search["tempat_layanan"] . "' ";
        }

        $query      = "";

        $select = " SELECT * FROM (
            SELECT pd.ID,
                lp.id as id_layanan_pendaftaran,
                pd.status as status_kunjungan,
                pd.tanggal_daftar,
                pd.id_pasien,
                P.nama AS nama_pasien,
                pd.status as kunjungan,
                pj.nama AS penjamin,
                case when sp.nama is null then lp.jenis_layanan else sp.nama end AS unit_pelayanan,
                pg.nama AS nama_dokter,
                P.kelamin,
                concat (
                    EXTRACT ( YEAR FROM AGE( P.tanggal_lahir ) ),
                    ' thn ',
                    EXTRACT ( MONTH FROM AGE( P.tanggal_lahir ) ),
                    ' bln ',
                    EXTRACT ( DAY FROM AGE( P.tanggal_lahir ) ),
                    ' hari'
                ) AS umur,
                P.alamat,
                P.nama_kec,
                pd.tanggal_keluar AS tgl_selesai  ";
            $count  = "select count(*) as count from (select pd.id ";
            $sql    = "FROM sm_pasien P
            JOIN sm_pendaftaran AS pd ON ( pd.id_pasien = P.ID )
            LEFT JOIN sm_penjamin AS pj ON ( pj.ID = pd.id_penjamin )
            JOIN sm_layanan_pendaftaran AS lp ON ( lp.id_pendaftaran = pd.ID )
            LEFT JOIN sm_anamnesa as an on (an.id_layanan_pendaftaran = lp.id)
            LEFT JOIN sm_rawat_inap AS ra ON ( ra.id_layanan_pendaftaran = lp.ID )
            LEFT JOIN sm_kelas AS kl ON ( kl.ID = ra.id_kelas )
            LEFT JOIN sm_bangsal AS b ON ( b.ID = ra.id_bangsal )
            LEFT JOIN sm_spesialisasi AS sp ON ( sp.ID = lp.id_unit_layanan )
            LEFT JOIN sm_tenaga_medis AS tm ON ( tm.ID = lp.id_dokter )
            LEFT JOIN sm_pegawai AS pg ON ( pg.ID = tm.id_pegawai )
            
                            
            where lp.id is not null AND pd.status != 'Batal' AND lp.status_terlayani = 'Sudah' 
            and lp.jenis_layanan IN ('Poliklinik', 'Forensik', 'Pemulasaran Jenazah', 'Hemodialisa', 'Medical Check Up') " . $param . " 
            
                            
            GROUP BY pg.nama, pd.status, pd.ID,lp.id,pd.id_pasien,lp.tanggal_layanan,P.nama,pd.status,pj.nama,sp.nama, pd.keterangan,P.kelamin,p.tanggal_lahir,P.alamat,P.nama_kec,pd.tanggal_keluar ) Lap ";
    
        $order = " ORDER BY tanggal_daftar asc ";

        $query = $this->db->query($select . $sql . $order)->result();

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

        foreach ($query as $value) {
			$value->diagnosa_data = $this->getDiagnosaListLaporanByIdLayananPendaftaran($value->id_layanan_pendaftaran);
		}

        $data["periode"] = $periode;
		$data["data"]    = $query;

        return $data;
    }

    function getDiagnosaListLaporanByIdLayananPendaftaran($id_layanan_pendaftaran)
	{
		$sql = "select
				concat(concat(case when gs2.kode_icdx_rinci is null then '' else ' [' end, gs2.kode_icdx_rinci, gs3.kode_icdx_rinci, case when gs2.kode_icdx_rinci is null then '' else '] ' end), case when d.id_golongan_sebab_sakit is not null then gs.nama else d.golongan_sebab_sakit_lain end) AS ICDX_diagnosa,
				d.prioritas,
				d.diagnosa_akhir,
				case when d.jenis_kasus = '1' then 'Baru' else 'Lama' end AS kasus
				FROM sm_pasien P
				JOIN sm_pendaftaran AS pd ON ( pd.id_pasien = P.ID )
				JOIN sm_layanan_pendaftaran AS lp ON ( lp.id_pendaftaran = pd.ID )
				LEFT JOIN sm_diagnosa AS d ON ( d.id_layanan_pendaftaran = lp.ID )
				LEFT JOIN sm_golongan_sebab_sakit AS gs ON ( gs.ID = d.id_golongan_sebab_sakit )
				LEFT JOIN sm_golongan_sebab_sakit AS gs2 ON ( gs2.ID = d.id_pengkodean )
				LEFT JOIN sm_golongan_sebab_sakit AS gs3 ON ( gs3.ID = d.id_pengkodean_asterik )
				WHERE lp.id = $id_layanan_pendaftaran ORDER BY d.prioritas desc";

		return $this->db->query($sql)->result();
	}
}
