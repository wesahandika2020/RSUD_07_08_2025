<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Lap_kasir_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->datetime = date('Y-m-d H:i:s');
        $this->load->model('keuangan/Keuangan_ver2_model', 'm_keuangan_ver2');
        $this->load->model('keuangan/Keuangan_model', 'm_keuangan');

    }

    public function getPeriodeLaporan()
    {
        return array(
            'Bulanan'       => 'Bulanan',
            'Rentang Waktu' => 'Rentang Waktu',
            'Harian'        => 'Harian',
        );
    }

    public function getAccountKasir($q, $start, $limit)
    {

        $limit = " limit " . $limit . " offset " . $start;
        $select = "select tr.id, p.nama, coalesce ( nullif ( jb.nama, '' ), '' ) as jabatan, 
                coalesce ( nullif ( un.nama, '' ), '' ) as unit, ag.name as account_group ";
        $count = "select count(tr.id) as count ";
        $sql = "from sm_translucent tr
                join sm_pegawai as p on p.id = tr.id
                join sm_account_group as ag on ag.id = tr.id_account_group
                left join sm_unit as un on un.id = tr.id_unit
                left join sm_jabatan as jb on jb.id = p.id_jabatan
                where p.nama ilike ('%$q%') and tr.id is not null
                and un.nama = 'Kasir'";

        // echo $select . $sql; die;
        // $data[''] = 'Semua Dokter / Pegawai';
        $data['data'] = $this->db->query($select . $sql . $limit)->result();
        $data['total'] = $this->db->query($count . $sql)->row()->count;
        return $data;
    }

    public function getLap01($limit, $start, $search)
    {
        $param = "";
        $query      = "";
        $limitation = "";
        
        $search["nama_pasien"] !== "" ? $param .= " AND p.id = '" . $search["nama_pasien"] . "' " : "";
        $search["id_dokter"] !== "" ? $param .= " AND lp.id_dokter = '" . $search["id_dokter"] . "' " : "";

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

        if ($search["jenis_pasien"] === "Rawat Jalan") {
            $param .= " AND (lp.jenis_layanan IN ('Poliklinik', 'Forensik', 'Pemulasaran Jenazah', 'Hemodialisa', 'Medical Check Up')) ";
        } elseif ($search["jenis_pasien"] === "Rawat Inap") {
            $param .= " AND (lp.jenis_layanan IN ('Rawat Inap', 'Intensive Care')) ";
        } elseif ($search["jenis_pasien"] === "Langsung") {
            $param .= " AND (lp.jenis_layanan IN ('Laboratorium', 'Radiologi', 'Fisioterapi')) ";
        } elseif ($search["jenis_pasien"] === "IGD") {
            $param .= " AND (lp.jenis_layanan = 'IGD') ";
        }

        if ($search["cara_bayar"] !== "") {
            $param .= " AND lp.cara_bayar = '" . $search["cara_bayar"] . "' ";
        }
        if ($search["penjamin"] !== "") {
            $param .= " AND lp.id_penjamin = '" . $search["penjamin"] . "' ";
        }
        if (($search["jenis_tunai"]) !== "") {
            $param .= " AND hpb.id_metode_pembayaran = '" . $search["jenis_tunai"] . "' ";
        }

        if ($search["ruangan_rajal"] !== "") {
            $param .= " AND sp.id = '" . $search['ruangan_rajal'] . "' ";
        }

        if ($search['ruangan_ranap'] !== "") {
            if (in_array($search['ruangan_ranap'], array(10, 11, 32, 30, 12, 26, 13))) {
                $param .= " AND ic.id_bangsal = '" . $search['ruangan_ranap'] . "' ";
            } else {
                $param .= " AND ri.id_bangsal = '" . $search['ruangan_ranap'] . "' ";
            }
        }
		
		if ($search["shift_poli"] === "") {
			$join_shift_poli = " LEFT JOIN sm_antrian_bpjs ab ON pd.id = ab.id_pendaftaran
								 LEFT JOIN sm_jadwal_dokter jd ON ab.id_jadwal_dokter=jd.id ";
		} else {
			$join_shift_poli = " JOIN sm_antrian_bpjs ab ON pd.id = ab.id_pendaftaran
						   	     JOIN sm_jadwal_dokter jd ON ab.id_jadwal_dokter=jd.id AND jd.shift_poli = '" . $search["shift_poli"] . "' ";
		}
        
        if ($limit !== 0) {
            $limitation = " LIMIT " . $limit . " OFFSET " . $start;
        }

        $select = "
                SELECT DISTINCT ON (pd.id) pd.*,
                CONCAT_WS(' ', p.nama, COALESCE(p.status_pasien, '')) as nama,
                p.id as no_rm, p.kelamin, p.alamat,
                lp.jenis_layanan, bgri.nama as ruang_ranap,
                bgic.nama as ruang_icare, lp.cara_bayar, 
                COALESCE(pj.diskon, 0) as diskon_asuransi, 
                COALESCE(pj.nama, '') as penjamin,
                COALESCE(sp.nama, '') as spesialist,
                0 as tagihan,
                SUM(pmb.total) as total,
                lp.status_terlayani,
                (SELECT COUNT(id) FROM sm_pembayaran WHERE id_pendaftaran = pd.id AND status = 'Tagihan') as status_tagihan,
                CASE WHEN pd.tanggal_keluar IS NULL THEN 'Aktif' ELSE 'Pulang' END as status_kunjungan, 
                COALESCE(pd.keterangan, pd.jenis_pendaftaran) as keterangan ,
                pg.nama as nama_dokter,
                lp.id_dokter as id_dokter, mpb.nama as jenis_tunai, jd.shift_poli
            ";

            $sql = "
                FROM sm_pendaftaran as pd 
                JOIN sm_pasien as p on p.id = pd.id_pasien 
                JOIN sm_layanan_pendaftaran as lp on lp.id_pendaftaran = pd.id
                LEFT JOIN sm_pembayaran as pmb on pmb.id_pendaftaran = pd.id 
                left JOIN sm_spesialisasi as sp on sp.id = lp.id_unit_layanan
                LEFT JOIN sm_rawat_inap AS ri ON lp.id = ri.id_layanan_pendaftaran
	            LEFT JOIN sm_bangsal AS bgri ON ri.id_bangsal = bgri.id
	            LEFT JOIN sm_intensive_care AS ic ON lp.id = ic.id_layanan_pendaftaran
	            LEFT JOIN sm_bangsal AS bgic ON ic.id_bangsal = bgic.id
                LEFT JOIN sm_tenaga_medis as tm on tm.id = lp.id_dokter
                LEFT JOIN sm_penjamin as pj on pj.id = lp.id_penjamin 
                LEFT JOIN sm_pegawai as pg on tm.id_pegawai = pg.id
                LEFT JOIN sm_profesi_nadis as pn on tm.id_profesi = pn.id
                LEFT JOIN sm_jabatan as jb on pg.id_jabatan = jb.id
                LEFT JOIN sm_history_pembayaran as hpb on pd.id = hpb.id_pendaftaran
	            LEFT JOIN sm_metode_pembayaran as mpb on hpb.id_metode_pembayaran = mpb.id
                " . $join_shift_poli . " WHERE pd.id IS NOT NULL " . $param . "
                GROUP BY pd.id, pd.id, p.nama, p.status_pasien, p.id, p.kelamin, p.alamat, lp.jenis_layanan, bgri.nama, bgic.nama, lp.cara_bayar, sp.nama, pj.diskon, pj.nama, pmb.total, lp.status_terlayani, lp.id_dokter, pg.nama, mpb.nama, jd.shift_poli
            ";

        $order = " ORDER BY pd.id DESC, pd.tanggal_daftar DESC ";

        $count = "SELECT COUNT(*) as count FROM (SELECT DISTINCT ON (pd.id) pd.* ";

        $total_pasien = "SELECT COUNT(*) as count FROM (SELECT DISTINCT ON (pd.id) pd.* ";

        $query = $this->db->query($select . $sql . $order . $limitation)->result();
        // var_dump($query);die;

        $tagihan = [];
        
        foreach ($query as $i => $value) {
            $tagihan[] = $this->m_keuangan_ver2->hitungTagihan($value->id);
            $value->tagihan = end($tagihan);

            $value->total_billing = $this->getTotalBilling($value->id);
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

        $data["periode"] 	= $periode;
        $data["shift_poli"] = $search['shift_poli'];
        $data["data"]    	= $query;
        $data["jumlah_total"]  = $this->db->query($total_pasien . $sql . ") as jml")->row()->count;
        $data["jumlah"]  = $this->db->query($count . $sql . ") as jml")->row()->count;
        $data["total_tagihan"] = array_sum($tagihan);

        // var_dump($data["total_tagihan"]);die;


        $this->db->close();
        return $data;

    }

    public function getLap02($limit, $start, $search)
    {
        $param = "";
        $limitation = "";
        
        if ($search["periode_laporan"] === "Harian") {
            if ($search["tanggal_harian"] !== "") :
                $param .= " and to_char( tanggal_keluar, 'yyyy-mm-dd' ) ilike '%" . date2mysql($search['tanggal_harian']) . "' ";
            endif;
        } elseif ($search["periode_laporan"] === "Bulanan" & $search["bulan"] !== "" & $search["tahun"] !== "") {
            $param .= " and to_char( tanggal_keluar, 'yyyy/mm' ) = '" . $search["tahun"] . "/" . $search["bulan"] . "' ";
        } elseif ($search["periode_laporan"] === "Rentang Waktu" & $search["tanggal_awal"] !== "" & $search["tanggal_akhir"] !== "") {
            if ($search["tanggal_awal"] !== "" & $search["tanggal_akhir"] !== "") :
                $param .= " and tanggal_keluar BETWEEN '" . date2mysql($search['tanggal_awal']) . " 00:00:00' AND '" . date2mysql($search['tanggal_akhir']) . " 23:59:59'";
            endif;
        }

        if($search['kelas_rawat'] !== ''){
            $param .= " and id_kelas = ".$search['kelas_rawat'];
        }

        if($search['bangsal_search'] !== ''){
            $param .= " and id_bangsal = ".$search['bangsal_search'];
        }

        if($search['nama_pasien']!== ''){
        	$param .= " and id_pasien = '".$search['nama_pasien']."' ";
        }

        if($search['diagnosa_awal']!== ''){
        	$param .= " and id_diagnosa_awal = '".$search['diagnosa_awal']."' ";
        }

        if($search['diagnosa_akhir']!== ''){
        	$param .= " and id_diagnosa_akhir = '".$search['diagnosa_akhir']."' ";
        }

        if ($limit !== 0) {
            $limitation = " LIMIT " . $limit . " OFFSET " . $start;
        }
        $select = "SELECT no_rm,
                    nama,
                    id_pasien as no_rm,
                    kelas,
                    bangsal,
                    lama_rawat,
                    icdx_diagnosa_awal,
                    icdx_diagnosa_akhir,
                    tindakan_operasi,
                    total_billing";
        $count = "select count(*) as count from (SELECT id_pendaftaran ";
        $sql = " FROM mv_laporan_tarif_bedasarkan_diagnosa
                    where id_pendaftaran IS NOT NULL $param ";

            $order = " ORDER BY id_pendaftaran, tanggal_keluar DESC ";

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

    public function getLap03($limit, $start, $search)
    {
        $param = "";
        $query      = "";
        $limitation = "";

        $search["nama_pasien"] !== "" ? $param .= " AND p.id = '" . $search["nama_pasien"] . "' " : "";
        $search["id_dokter"] !== "" ? $param .= " AND lp.id_dokter = '" . $search["id_dokter"] . "' " : "";

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

        if ($search["jenis_pasien"] === "Rawat Jalan") {
            $param .= " AND (lp.jenis_layanan IN ('Poliklinik', 'Forensik', 'Pemulasaran Jenazah', 'Hemodialisa', 'Medical Check Up')) ";
        } elseif ($search["jenis_pasien"] === "Rawat Inap") {
            $param .= " AND (lp.jenis_layanan IN ('Rawat Inap', 'Intensive Care')) ";
        } elseif ($search["jenis_pasien"] === "Langsung") {
            $param .= " AND (lp.jenis_layanan IN ('Laboratorium', 'Radiologi', 'Fisioterapi')) ";
        } elseif ($search["jenis_pasien"] === "IGD") {
            $param .= " AND (lp.jenis_layanan = 'IGD') ";
        }

        if ($search["cara_bayar"] !== "") {
            $param .= " AND lp.cara_bayar = '" . $search["cara_bayar"] . "' ";
        }
        if ($search["penjamin"] !== "") {
            $param .= " AND lp.id_penjamin = '" . $search["penjamin"] . "' ";
        }
        if (($search["jenis_tunai"]) !== "") {
            $param .= " AND hpb.id_metode_pembayaran = '" . $search["jenis_tunai"] . "' ";
        }

        if ($search["ruangan_rajal"] !== "") {
            $param .= " AND sp.id = '" . $search['ruangan_rajal'] . "' ";
        }

        if ($search['ruangan_ranap'] !== "") {
            if (in_array($search['ruangan_ranap'], array(10, 11, 32, 30, 12, 26, 13))) {
                $param .= " AND ic.id_bangsal = '" . $search['ruangan_ranap'] . "' ";
            } else {
                $param .= " AND ri.id_bangsal = '" . $search['ruangan_ranap'] . "' ";
            }
        }

        if ($limit !== 0) {
            $limitation = " LIMIT " . $limit . " OFFSET " . $start;
        }

        $select = "
                SELECT DISTINCT ON (pd.id) pd.*,
                CONCAT_WS(' ', p.nama, COALESCE(p.status_pasien, '')) as nama,
                p.id as no_rm, p.kelamin, p.alamat,
                lp.jenis_layanan, bgri.nama as ruang_ranap,
                bgic.nama as ruang_icare, lp.cara_bayar, 
                COALESCE(pj.diskon, 0) as diskon_asuransi, 
                COALESCE(pj.nama, '') as penjamin,
                COALESCE(sp.nama, '') as spesialist,
                0 as tagihan,
                SUM(pmb.total) as total,
                lp.status_terlayani,
                (SELECT COUNT(id) FROM sm_pembayaran WHERE id_pendaftaran = pd.id AND status = 'Tagihan') as status_tagihan,
                CASE WHEN pd.tanggal_keluar IS NULL THEN 'Aktif' ELSE 'Pulang' END as status_kunjungan, 
                COALESCE(pd.keterangan, pd.jenis_pendaftaran) as keterangan ,
                pg.nama as nama_dokter,
                lp.id_dokter as id_dokter, mpb.nama as jenis_tunai
            ";

        $sql = "
                FROM sm_pendaftaran as pd 
                JOIN sm_pasien as p on p.id = pd.id_pasien 
                JOIN sm_layanan_pendaftaran as lp on lp.id_pendaftaran = pd.id
                LEFT JOIN sm_pembayaran as pmb on pmb.id_pendaftaran = pd.id 
                left JOIN sm_spesialisasi as sp on sp.id = lp.id_unit_layanan
                LEFT JOIN sm_rawat_inap AS ri ON lp.id = ri.id_layanan_pendaftaran
	            LEFT JOIN sm_bangsal AS bgri ON ri.id_bangsal = bgri.id
	            LEFT JOIN sm_intensive_care AS ic ON lp.id = ic.id_layanan_pendaftaran
	            LEFT JOIN sm_bangsal AS bgic ON ic.id_bangsal = bgic.id
                LEFT JOIN sm_tenaga_medis as tm on tm.id = lp.id_dokter
                LEFT JOIN sm_penjamin as pj on pj.id = lp.id_penjamin 
                LEFT JOIN sm_pegawai as pg on tm.id_pegawai = pg.id
                LEFT JOIN sm_profesi_nadis as pn on tm.id_profesi = pn.id
                LEFT JOIN sm_jabatan as jb on pg.id_jabatan = jb.id
                LEFT JOIN sm_history_pembayaran as hpb on pd.id = hpb.id_pendaftaran
	            LEFT JOIN sm_metode_pembayaran as mpb on hpb.id_metode_pembayaran = mpb.id
                WHERE pd.id IS NOT NULL" . $param .
            " GROUP BY pd.id, pd.id, p.nama, p.status_pasien, p.id, p.kelamin, p.alamat, lp.jenis_layanan, bgri.nama, bgic.nama, lp.cara_bayar, sp.nama, pj.diskon, pj.nama, pmb.total, lp.status_terlayani, lp.id_dokter, pg.nama, mpb.nama
            ";

        $order = " ORDER BY pd.id DESC, pd.tanggal_daftar DESC ";

        $count = "SELECT COUNT(*) as count FROM (SELECT DISTINCT ON (pd.id) pd.* ";

        $total_pasien = "SELECT COUNT(*) as count FROM (SELECT DISTINCT ON (pd.id) pd.* ";

        $query = $this->db->query($select . $sql . $order . $limitation)->result();
        // var_dump($query);die;

        $tagihan = [];

        foreach ($query as $i => $value) {
            $tagihan[] = $this->m_keuangan_ver2->hitungTagihan($value->id);
            $value->tagihan = end($tagihan);

            $value->total_billing = $this->getTotalBilling($value->id);
            $value->total_obat = $this->getTotalObat($value->id);
            $value->total_tindakan = $this->getTotalTindakan($value->id);
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
        $data["data"]    = $query;
        $data["jumlah_total"]  = $this->db->query($total_pasien . $sql . ") as jml")->row()->count;
        $data["jumlah"]  = $this->db->query($count . $sql . ") as jml")->row()->count;
        $data["total_tagihan"] = array_sum($tagihan);

        // var_dump($data["total_tagihan"]);die;


        $this->db->close();
        return $data;
    }

    private function getTotalBilling($id)
    {
        $sql = "SELECT COALESCE((SELECT COALESCE(sum(drad.total), 0) total
            FROM sm_pendaftaran pd
            JOIN sm_layanan_pendaftaran as lp ON (pd.id=lp.id_pendaftaran)
            JOIN sm_order_radiologi as orad ON (lp.id = orad.id_layanan_pendaftaran)
            JOIN sm_radiologi as rad ON (orad.id = rad.id_order_radiologi)
            JOIN sm_detail_radiologi as drad ON (rad.id=drad.id_radiologi)
            WHERE pd.id = '$id' AND orad.status='konfirm' ) + 
            
            (SELECT COALESCE(sum(dlab.total), 0) total
            FROM sm_pendaftaran pd
            JOIN sm_layanan_pendaftaran as lp ON (pd.id=lp.id_pendaftaran)
            JOIN sm_order_laboratorium as olab ON (lp.id = olab.id_layanan_pendaftaran)
            JOIN sm_laboratorium as lab ON (olab.id = lab.id_order_laboratorium)
            JOIN sm_detail_laboratorium as dlab ON (lab.id=dlab.id_laboratorium)
            WHERE pd.id = '$id' AND olab.status='konfirm' ) +
            
            (SELECT COALESCE(sum(ri.total_hari*ri.nominal), 0) as tarif_rawat
            FROM sm_pendaftaran pd
            JOIN sm_layanan_pendaftaran as lp ON (pd.id=lp.id_pendaftaran)
            JOIN sm_rawat_inap as ri ON (lp.id=ri.id_layanan_pendaftaran)
            WHERE pd.id = '$id') +
            
            (SELECT COALESCE(sum(ic.total_hari*ic.nominal), 0) as tarif_rawat
            FROM sm_pendaftaran pd
            JOIN sm_layanan_pendaftaran as lp ON (pd.id=lp.id_pendaftaran)
            JOIN sm_intensive_care as ic ON (lp.id=ic.id_layanan_pendaftaran)
            WHERE pd.id = '$id') +
            
            (SELECT COALESCE(sum(bd.total), 0) as tarif_pelayanan_darah
            FROM sm_pendaftaran pd
            JOIN sm_layanan_pendaftaran as lp ON (pd.id=lp.id_pendaftaran)
            JOIN sm_order_bank_darah as obd ON (lp.id=obd.id_layanan_pendaftaran)
            JOIN sm_tarif_bank_darah as bd ON (obd.id=bd.id_order_bank_darah)
            WHERE pd.id = '$id' AND obd.diperiksa = 'Sudah') +
            
            (SELECT COALESCE(sum(ttp.total), 0) as tarif_pelayanan
            FROM sm_pendaftaran pd
            JOIN sm_layanan_pendaftaran as lp ON (pd.id=lp.id_pendaftaran)
            JOIN sm_tarif_tindakan_pasien as ttp ON (lp.id=ttp.id_layanan_pendaftaran)
            JOIN sm_tarif_pelayanan as tp ON (ttp.id_tarif_pelayanan=tp.id)
            JOIN sm_layanan as l ON (tp.id_layanan=l.id)
            WHERE pd.id = '$id' AND l.nama != 'Administrasi Pasien Rawat Inap') +
            
            (SELECT COALESCE(sum(tto.total), 0) as tarif_bedah_ok
            FROM sm_pendaftaran pd
            JOIN sm_layanan_pendaftaran as lp ON (pd.id=lp.id_pendaftaran)
            JOIN sm_jadwal_kamar_operasi as jko ON (lp.id=jko.id_layanan_pendaftaran)
            JOIN sm_tarif_operasi as tto ON (jko.id=tto.id_operasi)
            WHERE pd.id = '$id' ) +
            
            (SELECT COALESCE(sum(dpnj.qty*ceil(dpnj.harga_jual)), 0) total_jumlah
            FROM sm_pendaftaran pd
            JOIN sm_layanan_pendaftaran as lp ON (pd.id=lp.id_pendaftaran)
            JOIN sm_penjualan as pnj ON (lp.id=pnj.id_layanan_pendaftaran)
            JOIN sm_detail_penjualan as dpnj ON (pnj.id=dpnj.id_penjualan)
            JOIN sm_kemasan_barang as kb ON (dpnj.id_kemasan=kb.id)
            JOIN sm_barang as br ON (kb.id_barang=br.id)
            WHERE pd.id = '$id' 
            AND dpnj.qty > 0) - 
            
            (SELECT COALESCE(SUM(rp.total), 0) as total_retur
            FROM sm_pendaftaran pd
            JOIN sm_layanan_pendaftaran as lp ON (pd.id=lp.id_pendaftaran)
            JOIN sm_penjualan as pnj ON (lp.id=pnj.id_layanan_pendaftaran)
            JOIN sm_retur_penjualan as rp ON (pnj.id = rp.id_penjualan)
            WHERE pd.id = '$id'), 0) total
            
            FROM sm_pendaftaran as pd
            WHERE pd.id = '$id'";

        $total_billing = $this->db->query($sql)->row()->total;

        return $total_billing;
    }

    private function getTotalObat($id)
    {
        $sql = "SELECT COALESCE(
            (SELECT COALESCE(sum(dpnj.qty*ceil(dpnj.harga_jual)), 0) total_jumlah
            FROM sm_pendaftaran pd
            JOIN sm_layanan_pendaftaran as lp ON (pd.id=lp.id_pendaftaran)
            JOIN sm_penjualan as pnj ON (lp.id=pnj.id_layanan_pendaftaran)
            JOIN sm_detail_penjualan as dpnj ON (pnj.id=dpnj.id_penjualan)
            JOIN sm_kemasan_barang as kb ON (dpnj.id_kemasan=kb.id)
            JOIN sm_barang as br ON (kb.id_barang=br.id)
            WHERE pd.id = '$id' 
            AND dpnj.qty > 0) - 
            
            (SELECT COALESCE(SUM(rp.total), 0) as total_retur
            FROM sm_pendaftaran pd
            JOIN sm_layanan_pendaftaran as lp ON (pd.id=lp.id_pendaftaran)
            JOIN sm_penjualan as pnj ON (lp.id=pnj.id_layanan_pendaftaran)
            JOIN sm_retur_penjualan as rp ON (pnj.id = rp.id_penjualan)
            WHERE pd.id = '$id'), 0) total
            
            FROM sm_pendaftaran as pd
            WHERE pd.id = '$id'";

        $total_billing = $this->db->query($sql)->row()->total;

        return $total_billing;
    }

    private function getTotalTindakan($id)
    {
        $sql = "SELECT COALESCE(
            (SELECT COALESCE(sum(drad.total), 0) total
            FROM sm_pendaftaran pd
            JOIN sm_layanan_pendaftaran as lp ON (pd.id=lp.id_pendaftaran)
            JOIN sm_order_radiologi as orad ON (lp.id = orad.id_layanan_pendaftaran)
            JOIN sm_radiologi as rad ON (orad.id = rad.id_order_radiologi)
            JOIN sm_detail_radiologi as drad ON (rad.id=drad.id_radiologi)
            WHERE pd.id = '$id' AND orad.status='konfirm' ) + 
            
            (SELECT COALESCE(sum(dlab.total), 0) total
            FROM sm_pendaftaran pd
            JOIN sm_layanan_pendaftaran as lp ON (pd.id=lp.id_pendaftaran)
            JOIN sm_order_laboratorium as olab ON (lp.id = olab.id_layanan_pendaftaran)
            JOIN sm_laboratorium as lab ON (olab.id = lab.id_order_laboratorium)
            JOIN sm_detail_laboratorium as dlab ON (lab.id=dlab.id_laboratorium)
            WHERE pd.id = '$id' AND olab.status='konfirm' ) +
            
            (SELECT COALESCE(sum(ri.total_hari*ri.nominal), 0) as tarif_rawat
            FROM sm_pendaftaran pd
            JOIN sm_layanan_pendaftaran as lp ON (pd.id=lp.id_pendaftaran)
            JOIN sm_rawat_inap as ri ON (lp.id=ri.id_layanan_pendaftaran)
            WHERE pd.id = '$id') +
            
            (SELECT COALESCE(sum(ic.total_hari*ic.nominal), 0) as tarif_rawat
            FROM sm_pendaftaran pd
            JOIN sm_layanan_pendaftaran as lp ON (pd.id=lp.id_pendaftaran)
            JOIN sm_intensive_care as ic ON (lp.id=ic.id_layanan_pendaftaran)
            WHERE pd.id = '$id') +
            
            (SELECT COALESCE(sum(bd.total), 0) as tarif_pelayanan_darah
            FROM sm_pendaftaran pd
            JOIN sm_layanan_pendaftaran as lp ON (pd.id=lp.id_pendaftaran)
            JOIN sm_order_bank_darah as obd ON (lp.id=obd.id_layanan_pendaftaran)
            JOIN sm_tarif_bank_darah as bd ON (obd.id=bd.id_order_bank_darah)
            WHERE pd.id = '$id' AND obd.diperiksa = 'Sudah') +
            
            (SELECT COALESCE(sum(ttp.total), 0) as tarif_pelayanan
            FROM sm_pendaftaran pd
            JOIN sm_layanan_pendaftaran as lp ON (pd.id=lp.id_pendaftaran)
            JOIN sm_tarif_tindakan_pasien as ttp ON (lp.id=ttp.id_layanan_pendaftaran)
            JOIN sm_tarif_pelayanan as tp ON (ttp.id_tarif_pelayanan=tp.id)
            JOIN sm_layanan as l ON (tp.id_layanan=l.id)
            WHERE pd.id = '$id' AND l.nama != 'Administrasi Pasien Rawat Inap') +
            
            (SELECT COALESCE(sum(tto.total), 0) as tarif_bedah_ok
            FROM sm_pendaftaran pd
            JOIN sm_layanan_pendaftaran as lp ON (pd.id=lp.id_pendaftaran)
            JOIN sm_jadwal_kamar_operasi as jko ON (lp.id=jko.id_layanan_pendaftaran)
            JOIN sm_tarif_operasi as tto ON (jko.id=tto.id_operasi)
            WHERE pd.id = '$id' ), 0) total
            
            FROM sm_pendaftaran as pd
            WHERE pd.id = '$id'";

        $total_billing = $this->db->query($sql)->row()->total;

        return $total_billing;
    }

    public function getJenisPasien()
    {
        return array(
            ''              => 'Semua Pasien',
            'Langsung'      => 'Langsung',
            'Rawat Inap'    => 'Rawat Inap',
            'Rawat Jalan'   => 'Rawat Jalan',
            'IGD'           => 'IGD',
        );
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

	function getPendaftaranDetail($id_pendaftaran, $id_layanan_pendaftaran = NULL, $justpoli = NULL)
	{
		$param = "";
		$sql = "select pd.*, CONCAT_WS(' ', p.nama, COALESCE(p.status_pasien, '')) as nama, p.kelamin, p.alamat, 
				p.telp, p.agama, p.tanggal_lahir, 
				coalesce(p.nama_prop, '') as provinsi,
				coalesce(p.nama_kab, '') as kabupaten,
				coalesce(p.nama_kec, '') as kecamatan,
				coalesce(p.nama_kel, '') as kelurahan,
				coalesce(pk.nama, '') as pekerjaan, 
				coalesce(pj.nama, '') as penjamin, 
				coalesce(pj.diskon, 0) as diskon, 
				ins.nama as instansi_perujuk, 
				(null) as tagihan_pendaftaran 
				from sm_pendaftaran as pd 
				join sm_pasien as p on (p.id = pd.id_pasien) 
				left join sm_instansi as ins on (ins.id = pd.id_instansi_perujuk) 
				left join sm_pekerjaan as pk on (pk.id = pd.id_penjamin) 
				left join sm_penjamin as pj on (pj.id = pd.id_penjamin) 
				where pd.id = '" . $id_pendaftaran . "'";
		$data["pasien"] = $this->db->query($sql)->row();
		$sqlLayanan = "select lp.*, 
					coalesce(sp.nama, '') as layanan, 
					coalesce(pj.nama, '') as penjamin, 
					coalesce(pj.diskon, 0) as diskon, 
					(null) as id_pembayaran, 
					(null) as billing,
					(null) as tindakan, 
					(null) as laboratorium, 
					(null) as radiologi, 
					(null) as fisioterapi, 
					(null) as rawat_inap, 
					(null) as intensive_care,
					(null) as barang, 
					(null) as barang_operasi, 
					(null) as operasi, 
					(0) as total_bayar, 
					(0) as total_tagihan, 
					(0) as item_billing, 
					CASE WHEN 
						ri.id is null
					THEN 
						'Tidak Rawat Inap' 
					ELSE 
						CASE WHEN 
							ri.waktu_keluar is null
						THEN 
							'Masih Dirawat' 
						ELSE 
							'Sudah Keluar'
						END
					END as status_rawat, 
					CASE WHEN 
						ic.id is null
					THEN 
						'Tidak Intensive Care' 
					ELSE 
						CASE WHEN 
							ic.waktu_keluar is null
						THEN 
							'Masih Dirawat' 
						ELSE 
							'Sudah Keluar'
						END
					END as status_rawat_icare,
					coalesce(pg.nama, '') as dokter 
					from sm_layanan_pendaftaran as lp 
					left join sm_spesialisasi as sp on (sp.id = lp.id_unit_layanan) 
					left join sm_penjamin as pj on (pj.id = lp.id_penjamin) 
					left join sm_rawat_inap as ri on (ri.id_layanan_pendaftaran = lp.id) 
					left join sm_intensive_care as ic on (ic.id_layanan_pendaftaran = lp.id)
					left join sm_tenaga_medis as tm on (tm.id = lp.id_dokter) 
					left join sm_pegawai as pg on (pg.id = tm.id_pegawai) 
					where lp.id_pendaftaran = '" . $id_pendaftaran . "' ";
		if ($justpoli === 'poli') :
			$sqlLayanan .= "and (lp.jenis_layanan != 'Rawat Inap' and lp.jenis_layanan != 'IGD' and lp.jenis_layanan != 'Intensive Care') ";
		else :
			if ($justpoli === 'inap') :
				$sqlLayanan .= "and (lp.jenis_layanan = 'Rawat Inap' or lp.jenis_Layanan = 'IGD' or lp.jenis_Layanan = 'Intensive Care') ";
			endif;
		endif;

		if ($id_layanan_pendaftaran !== NULL) :
			$param = "and lp.id = '" . $id_layanan_pendaftaran . "'";
			$dataLayanan = $this->db->query($sqlLayanan . $param)->result();
		else :
			$dataLayanan = $this->db->query($sqlLayanan)->result();
		endif;

		$data["layanan"] = $dataLayanan;
		return $data;
	}

    function getDiagnosa($id_pendaftaran)
	{
		$this->db->select(" concat (d.golongan_sebab_sakit_lain, gss.nama ) AS nama ")
			->from('sm_diagnosa as d')
			->join('sm_layanan_pendaftaran as lp', 'lp.id = d.id_layanan_pendaftaran', 'left')
			->join('sm_golongan_sebab_sakit as gss', 'gss.id = d.id_golongan_sebab_sakit', 'left')
			->where('lp.id_pendaftaran', $id_pendaftaran, true)
			->order_by('d.prioritas', 'desc');

		return $this->db->get()->result();
	}
}
