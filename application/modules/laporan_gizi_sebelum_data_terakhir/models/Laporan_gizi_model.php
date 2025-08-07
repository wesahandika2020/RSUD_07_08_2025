<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Laporan_gizi_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->datetime = date('Y-m-d H:i:s');
    }

    public function getJenisLaporan()
    {
        return array(
            ''      => '-- Pilih Laporan Gizi --',
            '1'     => 'Daftar Permintaan Makan Pasien (DPMP) Ahli Gizi Ruangan',
            '2'     => 'Daftar Permintaan Makan Pasien (DPMP) Dapur',
            '3'     => 'Rekapitulasi Diet',
            '4'     => 'Check List Makanan Cair',
            '5'     => 'Daftar Diet Pasien untuk Pramusaji',
            '6'     => 'Daftar Permintaan Makan Pasien (Order Diet)',
        );
    }

    public function getJenisDiet()
    {
        return array(
            ''      => '- Semua Jenis Diet -',
            '1'     => 'Diet Makan',
            '2'     => 'Diet Cair',
        );
    }

    public function getTempatLayanan()
    {
        return array(
            ''      => '- Semua Tempat Layanan -',
            '1'     => 'Rawat Inap',
            '2'     => 'Intensive Care',
        );
    }

    function getRuangRanap()
    {
        $query = $this->db->where('is_active', 'Ya')->where('keterangan<>', 'Intensive Care')->order_by('nama', 'ASC')->get('sm_bangsal')->result();
        $data =  array();
        $data[''] = '- Semua Ruangan -';
        foreach ($query as $key => $value) :
            $data[$value->id] = $value->nama;
        endforeach;

        return $data;
    }

    function getRuangIc()
    {
        $query = $this->db->where('is_active', 'Ya')->where('keterangan', 'Intensive Care')->order_by('nama', 'ASC')->get('sm_bangsal')->result();
        $data =  array();
        $data[''] = '- Semua Ruangan -';
        foreach ($query as $key => $value) :
            $data[$value->id] = $value->nama;
        endforeach;

        return $data;
    }

    function periode($search){
        $periode = '';
        if($search["periode_laporan"] == 'Harian'){
			$periode = 'Harian ('.$search["tanggal_harian"].')' ;
		} else if($search["periode_laporan"] == 'Bulanan'){
			if ($search["bulan"] == '01') {
                $periode = "Bulanan (Januari " . $search["tahun"] . ')';
            } elseif ($search["bulan"] == '02') {
                $periode = "Bulanan (Februari " . $search["tahun"] . ')';
            } elseif ($search["bulan"] == '03') {
                $periode = "Bulanan (Maret " . $search["tahun"] . ')';
            } elseif ($search["bulan"] == '04') {
                $periode = "Bulanan (April " . $search["tahun"] . ')';
            } elseif ($search["bulan"] == '05') {
                $periode = "Bulanan (Mei " . $search["tahun"] . ')';
            } elseif ($search["bulan"] == '06') {
                $periode = "Bulanan (Juni " . $search["tahun"] . ')';
            } elseif ($search["bulan"] == '07') {
                $periode = "Bulanan (Juli " . $search["tahun"] . ')';
            } elseif ($search["bulan"] == '08') {
                $periode = "Bulanan (Agustus " . $search["tahun"] . ')';
            } elseif ($search["bulan"] == '09') {
                $periode = "Bulanan (September " . $search["tahun"] . ')';
            } elseif ($search["bulan"] == '10') {
                $periode = "Bulanan (Oktober " . $search["tahun"] . ')';
            } elseif ($search["bulan"] == '11') {
                $periode = "Bulanan (November " . $search["tahun"] . ')';
            } elseif ($search["bulan"] == '12') {
                $periode = "Bulanan (Desember " . $search["tahun"] . ')';
            }
		} else if($search["periode_laporan"] == 'Rentang Waktu'){
			$periode = 'Rentang Waktu ('.$search["tanggal_awal"].' sd '.$search["tanggal_akhir"].')' ;
		}
        return $periode;
    }
    
    function getListLaporanGizi01($limit, $start, $search)
	{
        $param = "";     

		if ($search["periode_laporan"] === "Harian") {
			if ($search["tanggal_harian"] !== "") :
				$param .= " and to_char(dm.waktu_dpmp, 'yyyy-mm-dd' ) = '" . date2mysql($search['tanggal_harian']) . "' ";
			endif;
		} elseif ($search["periode_laporan"] === "Bulanan" & $search["bulan"] !== "" & $search["tahun"] !== "") {
			$param .= " and to_char(dm.waktu_dpmp, 'YYYY-MM'::text) = '" . $search["tahun"] . "-" . $search["bulan"] . "' ";
		} elseif ($search["periode_laporan"] === "Rentang Waktu" & $search["tanggal_awal"] !== "" & $search["tanggal_akhir"] !== "") {
			if ($search["tanggal_awal"] !== "" & $search["tanggal_akhir"] !== "") :
				$param .= " and dm.waktu_dpmp BETWEEN '" . date2mysql($search['tanggal_awal']) . " 00:00:00' AND '" . date2mysql($search['tanggal_akhir']) . " 23:59:59'";
			endif;
		}

        $sql = " SELECT pd.id, lp.id id_layanan_pendaftaran, lp.tanggal_layanan, dm.waktu_dpmp, ri.id id_ranap, ri.id_bangsal id_bangsal_ranap, ic.id id_ic, ic.id_bangsal id_bangsal_ic,
                case when ri.id is not null then concat((select nama from sm_bangsal where id=ri.id_bangsal),' Ruang ',ri.no_ruang,' Bed ', ri.no_bed)
                when ic.id is not null then concat((select nama from sm_bangsal where id=ic.id_bangsal),' Ruang ',ic.no_ruang,' Bed ', ic.no_bed) 
                when lp.jenis_layanan = 'Hemodialisa' then 'Hemodialisa' else '' end ruangan,
                pd.id_pasien, ps.nama, ps.tanggal_lahir,ps.kelamin,
                case when d.id_golongan_sebab_sakit is not null then (select nama from sm_golongan_sebab_sakit where id=d.id_golongan_sebab_sakit) else d.golongan_sebab_sakit_lain end diagnosa,
                (select nama from sm_pegawai where id=(select id_pegawai from sm_tenaga_medis where id=lp.id_dokter)) dokter,
                dm.id id_diet_makan, dm.jns_diet_mp, dm.jns_diet_sp, dm.jns_diet_ms, dm.jns_diet_ss, dm.jns_diet_mm, dm.jns_diet_sm,
                dm.btk_mkn_mp, dm.btk_mkn_sp, dm.btk_mkn_ms, dm.btk_mkn_ss, dm.btk_mkn_mm, dm.btk_mkn_sm,
                mp.kode as mp_kode,ms.kode as ms_kode, mm.kode as mm_kode, ss.kode as ss_kode, sp.kode as sp_kode, sm.kode as sm_kode,
                dc.id id_diet_cair, dc.keterangan_diet_cair as kdc,
                dc.dpmp_jam_satu, dc.dpmp_jam_dua, dc.dpmp_jam_tiga, dc.dpmp_jam_empat, dc.dpmp_jam_lima, dc.dpmp_jam_enam, dc.dpmp_jam_tujuh, dc.dpmp_jam_delapan
                ";

        $tabel = " FROM sm_pendaftaran pd
                    JOIN sm_pasien ps on pd.id_pasien=ps.id
                    JOIN sm_layanan_pendaftaran lp on pd.id = lp.id_pendaftaran
                    LEFT JOIN sm_rawat_inap ri on lp.id=ri.id_layanan_pendaftaran
                    LEFT JOIN sm_intensive_care ic on lp.id=ic.id_layanan_pendaftaran
                    LEFT JOIN sm_diagnosa d on lp.id=d.id_layanan_pendaftaran and d.prioritas='Utama'

                    LEFT JOIN sm_dpmp dm on lp.id = dm.id_layanan_pendaftaran
                    LEFT JOIN sm_diet_cair dc on dm.id = dc.id_dpmp     

                    LEFT JOIN sm_diet as mp on mp.id = dm.mp_diet_cair                     
                    LEFT JOIN sm_diet as ms on ms.id = dm.ms_diet_cair
                    LEFT JOIN sm_diet as mm on mm.id = dm.mm_diet_cair
                    LEFT JOIN sm_diet as ss on ss.id = dm.ss_diet_cair
                    LEFT JOIN sm_diet as sp on sp.id = dm.sp_diet_cair
                    LEFT JOIN sm_diet as sm on sm.id = dm.sm_diet_cair
                
                ";
        $where  =" WHERE lp.status_terlayani<>'Batal' AND lp.tindak_lanjut is null ";

             if ($search["jenis_diet"] === "1") { $where  .=" AND dc.id is null"; }
        else if ($search["jenis_diet"] === "2") { $where  .=" AND dc.id is not null"; }

        if ($search["tempat_layanan"] === "1") { 
            $where  .=" AND ri.id is not null"; 
            $search["ruangan_ranap"] !== "" ? $where  .=" AND ri.id_bangsal =".$search["ruangan_ranap"] : ''; 
        } else if ($search["tempat_layanan"] === "2") {
            $where  .=" AND ic.id is not null"; 
            $search["ruangan_ic"] !== "" ? $where  .=" AND ic.id_bangsal =".$search["ruangan_ic"] : ''; 
        }

		$order  = " ORDER BY dm.waktu_dpmp DESC, ps.id ASC  ";

        $limitation ='';
        if ($limit !== 0) {
            $limitation = " LIMIT " . $limit . " OFFSET " . $start;
        }

        $jenis_diet_map     = [ '1' => 'Diet Makan', '2' => 'Diet Cair', ];
        $tempat_layanan_map = [ '1' => 'Rawat Inap', '2' => 'Intensive Care', ];

		$data["data"]           = $this->db->query($sql.$tabel.$where.$param.$order.$limitation)->result();
		$data['jml_data']       = $this->db->query($sql.$tabel.$where.$param.$order)->num_rows();
        $data['periode']        = $this->periode($search) ;
		$data['jenis_diet']     = $jenis_diet_map[$search["jenis_diet"]] ?? '';
		$data['tempat_layanan'] = $tempat_layanan_map[$search["tempat_layanan"]] ?? '';
		$data['ruangan_ranap']  = $search["ruangan_ranap"] <>'' ? $this->db->select('nama')->from('sm_bangsal')->where('id', $search["ruangan_ranap"])->get()->row()->nama : '';
		$data['ruangan_ic']     = $search["ruangan_ic"] <>'' ? $this->db->select('nama')->from('sm_bangsal')->where('id', $search["ruangan_ic"])->get()->row()->nama : '';   
		return $data;
	}

    function getListLaporanGizi02($limit, $start, $search)
	{
        $param = "";     

		if ($search["periode_laporan"] === "Harian") {
			if ($search["tanggal_harian"] !== "") :
				$param .= " and to_char(dm.waktu_dpmp, 'yyyy-mm-dd' ) = '" . date2mysql($search['tanggal_harian']) . "' ";
			endif;
		} elseif ($search["periode_laporan"] === "Bulanan" & $search["bulan"] !== "" & $search["tahun"] !== "") {
			$param .= " and to_char(dm.waktu_dpmp, 'YYYY-MM'::text) = '" . $search["tahun"] . "-" . $search["bulan"] . "' ";
		} elseif ($search["periode_laporan"] === "Rentang Waktu" & $search["tanggal_awal"] !== "" & $search["tanggal_akhir"] !== "") {
			if ($search["tanggal_awal"] !== "" & $search["tanggal_akhir"] !== "") :
				$param .= " and dm.waktu_dpmp BETWEEN '" . date2mysql($search['tanggal_awal']) . " 00:00:00' AND '" . date2mysql($search['tanggal_akhir']) . " 23:59:59'";
			endif;
		}

        $sql = " SELECT pd.id, lp.id id_layanan_pendaftaran, lp.tanggal_layanan, dm.waktu_dpmp, ri.id id_ranap, ri.id_bangsal id_bangsal_ranap, ic.id id_ic, ic.id_bangsal id_bangsal_ic,
                case when ri.id is not null then concat((select nama from sm_bangsal where id=ri.id_bangsal),' Ruang ',ri.no_ruang,' Bed ', ri.no_bed)
                when ic.id is not null then concat((select nama from sm_bangsal where id=ic.id_bangsal),' Ruang ',ic.no_ruang,' Bed ', ic.no_bed) 
                when lp.jenis_layanan = 'Hemodialisa' then 'Hemodialisa' else '' end ruangan,
                pd.id_pasien, ps.nama, ps.tanggal_lahir,ps.kelamin,
                case when d.id_golongan_sebab_sakit is not null then (select nama from sm_golongan_sebab_sakit where id=d.id_golongan_sebab_sakit) else d.golongan_sebab_sakit_lain end diagnosa,
                (select nama from sm_pegawai where id=(select id_pegawai from sm_tenaga_medis where id=lp.id_dokter)) dokter,
                dm.id id_diet_makan, dm.jns_diet_mp, dm.jns_diet_sp, dm.jns_diet_ms, dm.jns_diet_ss, dm.jns_diet_mm, dm.jns_diet_sm,
                dm.btk_mkn_mp, dm.btk_mkn_sp, dm.btk_mkn_ms, dm.btk_mkn_ss, dm.btk_mkn_mm, dm.btk_mkn_sm,
                mp.kode as mp_kode,ms.kode as ms_kode, mm.kode as mm_kode, ss.kode as ss_kode, sp.kode as sp_kode, sm.kode as sm_kode,
                dm.mp_makan_pasien, dm.sp_makan_pasien, dm.ms_makan_pasien, dm.ss_makan_pasien, dm.mm_makan_pasien, dm.sm_makan_pasien, dm.ket_makan_pasien,
                dc.id id_diet_cair, dc.keterangan_diet_cair as kdc,
                dc.dpmp_jam_satu, dc.dpmp_jam_dua, dc.dpmp_jam_tiga, dc.dpmp_jam_empat, dc.dpmp_jam_lima, dc.dpmp_jam_enam, dc.dpmp_jam_tujuh, dc.dpmp_jam_delapan ";

        $tabel = " FROM sm_pendaftaran pd
                    JOIN sm_pasien ps on pd.id_pasien=ps.id
                    JOIN sm_layanan_pendaftaran lp on pd.id = lp.id_pendaftaran
                    LEFT JOIN sm_rawat_inap ri on lp.id=ri.id_layanan_pendaftaran
                    LEFT JOIN sm_intensive_care ic on lp.id=ic.id_layanan_pendaftaran
                    LEFT JOIN sm_diagnosa d on lp.id=d.id_layanan_pendaftaran and d.prioritas='Utama'

                    LEFT JOIN sm_dpmp dm on lp.id = dm.id_layanan_pendaftaran
                    LEFT JOIN sm_diet_cair dc on dm.id = dc.id_dpmp    

                    LEFT JOIN sm_diet as mp on mp.id = dm.mp_diet_cair                     
                    LEFT JOIN sm_diet as ms on ms.id = dm.ms_diet_cair
                    LEFT JOIN sm_diet as mm on mm.id = dm.mm_diet_cair
                    LEFT JOIN sm_diet as ss on ss.id = dm.ss_diet_cair
                    LEFT JOIN sm_diet as sp on sp.id = dm.sp_diet_cair
                    LEFT JOIN sm_diet as sm on sm.id = dm.sm_diet_cair
                
                    WHERE lp.status_terlayani<>'Batal' AND lp.tindak_lanjut is null 
                ";
        $where  =" ";

             if ($search["jenis_diet"] === "1") { $where  .=" AND dc.id is null"; }
        else if ($search["jenis_diet"] === "2") { $where  .=" AND dc.id is not null"; }

        if ($search["tempat_layanan"] === "1") { 
            $where  .=" AND ri.id is not null"; 
            $search["ruangan_ranap"] !== "" ? $where  .=" AND ri.id_bangsal =".$search["ruangan_ranap"] : ''; 
        } else if ($search["tempat_layanan"] === "2") {
            $where  .=" AND ic.id is not null"; 
            $search["ruangan_ic"] !== "" ? $where  .=" AND ic.id_bangsal =".$search["ruangan_ic"] : ''; 
        }

		$order  = " ORDER BY dm.waktu_dpmp DESC, ps.id ASC  ";

        $limitation ='';
        if ($limit !== 0) {
            $limitation = " LIMIT " . $limit . " OFFSET " . $start;
        }

        $jenis_diet_map     = [ '1' => 'Diet Makan', '2' => 'Diet Cair', ];
        $tempat_layanan_map = [ '1' => 'Rawat Inap', '2' => 'Intensive Care', ];

		$data["data"]           = $this->db->query($sql.$tabel.$where.$param.$order.$limitation)->result();
		$data['jml_data']       = $this->db->query($sql.$tabel.$where.$param.$order)->num_rows();
		$data['jml_data_all']   = $this->db->query($sql.$tabel.$param.$order)->num_rows();
        $data['periode']        = $this->periode($search) ;
		$data['jenis_diet']     = $jenis_diet_map[$search["jenis_diet"]] ?? '';
		$data['tempat_layanan'] = $tempat_layanan_map[$search["tempat_layanan"]] ?? '';
		$data['ruangan_ranap']  = $search["ruangan_ranap"] <>'' ? $this->db->select('nama')->from('sm_bangsal')->where('id', $search["ruangan_ranap"])->get()->row()->nama : '';
		$data['ruangan_ic']     = $search["ruangan_ic"] <>'' ? $this->db->select('nama')->from('sm_bangsal')->where('id', $search["ruangan_ic"])->get()->row()->nama : ''; 
		return $data;
	}

    function getListLaporanGizi03Makan($search,$type,$field)
	{
        $param =" ";
        $where =" ";

		if ($search["periode_laporan"] === "Harian") {
			if ($search["tanggal_harian"] !== "") :
				$param .= " and to_char(dm.waktu_dpmp, 'yyyy-mm-dd' ) = '" . date2mysql($search['tanggal_harian']) . "' ";
			endif;
		} elseif ($search["periode_laporan"] === "Bulanan" & $search["bulan"] !== "" & $search["tahun"] !== "") {
			$param .= " and to_char(dm.waktu_dpmp, 'YYYY-MM'::text) = '" . $search["tahun"] . "-" . $search["bulan"] . "' ";
		} elseif ($search["periode_laporan"] === "Rentang Waktu" & $search["tanggal_awal"] !== "" & $search["tanggal_akhir"] !== "") {
			if ($search["tanggal_awal"] !== "" & $search["tanggal_akhir"] !== "") :
				$param .= " and dm.waktu_dpmp BETWEEN '" . date2mysql($search['tanggal_awal']) . " 00:00:00' AND '" . date2mysql($search['tanggal_akhir']) . " 23:59:59'";
			endif;
		}
        if($type == 'jenisdiet'){
            $sql = " SELECT SUM(CASE WHEN dm.jns_diet_mp = '$field' THEN 1 ELSE 0 END) AS mp,
                            SUM(CASE WHEN dm.jns_diet_sp = '$field' THEN 1 ELSE 0 END) AS sp,
                            SUM(CASE WHEN dm.jns_diet_ms = '$field' THEN 1 ELSE 0 END) AS ms,
                            SUM(CASE WHEN dm.jns_diet_ss = '$field' THEN 1 ELSE 0 END) AS ss,
                            SUM(CASE WHEN dm.jns_diet_mm = '$field' THEN 1 ELSE 0 END) AS mm,
                            SUM(CASE WHEN dm.jns_diet_sm = '$field' THEN 1 ELSE 0 END) AS sm,
                            (SUM(CASE WHEN dm.jns_diet_mp = '$field' THEN 1 ELSE 0 END) +
                            SUM(CASE WHEN dm.jns_diet_sp = '$field' THEN 1 ELSE 0 END) +
                            SUM(CASE WHEN dm.jns_diet_ms = '$field' THEN 1 ELSE 0 END) +
                            SUM(CASE WHEN dm.jns_diet_ss = '$field' THEN 1 ELSE 0 END) +
                            SUM(CASE WHEN dm.jns_diet_mm = '$field' THEN 1 ELSE 0 END) +
                            SUM(CASE WHEN dm.jns_diet_sm = '$field' THEN 1 ELSE 0 END) ) total";
        }
        if($type == 'bentukmakan'){
            $sql = " SELECT SUM(CASE WHEN dm.btk_mkn_mp = '$field' THEN 1 ELSE 0 END) AS mp,
                            SUM(CASE WHEN dm.btk_mkn_sp = '$field' THEN 1 ELSE 0 END) AS sp,
                            SUM(CASE WHEN dm.btk_mkn_ms = '$field' THEN 1 ELSE 0 END) AS ms,
                            SUM(CASE WHEN dm.btk_mkn_ss = '$field' THEN 1 ELSE 0 END) AS ss,
                            SUM(CASE WHEN dm.btk_mkn_mm = '$field' THEN 1 ELSE 0 END) AS mm,
                            SUM(CASE WHEN dm.btk_mkn_sm = '$field' THEN 1 ELSE 0 END) AS sm,
                            (SUM(CASE WHEN dm.btk_mkn_mp = '$field' THEN 1 ELSE 0 END) +
                            SUM(CASE WHEN dm.btk_mkn_sp = '$field' THEN 1 ELSE 0 END) +
                            SUM(CASE WHEN dm.btk_mkn_ms = '$field' THEN 1 ELSE 0 END) +
                            SUM(CASE WHEN dm.btk_mkn_ss = '$field' THEN 1 ELSE 0 END) +
                            SUM(CASE WHEN dm.btk_mkn_mm = '$field' THEN 1 ELSE 0 END) +
                            SUM(CASE WHEN dm.btk_mkn_sm = '$field' THEN 1 ELSE 0 END) ) total";
        }

        $tabel = " FROM sm_pendaftaran pd
                    JOIN sm_pasien ps ON pd.id_pasien = ps.id
                    JOIN sm_layanan_pendaftaran lp ON pd.id = lp.id_pendaftaran
                    LEFT JOIN sm_dpmp dm ON lp.id = dm.id_layanan_pendaftaran
                    LEFT JOIN sm_rawat_inap ri on lp.id=ri.id_layanan_pendaftaran
                    LEFT JOIN sm_intensive_care ic on lp.id=ic.id_layanan_pendaftaran
                    WHERE 
                        lp.status_terlayani <> 'Batal'
                        AND lp.tindak_lanjut IS NULL
                        $param
                        AND dm.waktu_dpmp = (
                            SELECT MAX(dm2.waktu_dpmp)
                            FROM sm_dpmp dm2
                            JOIN sm_layanan_pendaftaran lp2 ON dm2.id_layanan_pendaftaran = lp2.id
                            WHERE 
                                lp2.id_pendaftaran = lp.id_pendaftaran
                                AND TO_CHAR(dm2.waktu_dpmp, 'yyyy-mm-dd') = TO_CHAR(dm.waktu_dpmp, 'yyyy-mm-dd')
                        )
                ";

        if ($search["tempat_layanan"] === "1") { 
            $where  .=" AND ri.id is not null"; 
            $search["ruangan_ranap"] !== "" ? $where  .=" AND ri.id_bangsal =".$search["ruangan_ranap"] : ''; 
        } else if ($search["tempat_layanan"] === "2") {
            $where  .=" AND ic.id is not null"; 
            $search["ruangan_ic"] !== "" ? $where  .=" AND ic.id_bangsal =".$search["ruangan_ic"] : ''; 
        }
		return $this->db->query($sql.$tabel.$where)->row();
	}

    function getListLaporanGizi03Cair($search,$field)
	{
        $param =" ";
        $where =" ";
        $getIdDiet = "(select id from sm_diet where kode='$field' AND is_active=1) ";

		if ($search["periode_laporan"] === "Harian") {
			if ($search["tanggal_harian"] !== "") :
				$param .= " and to_char(dm.waktu_dpmp, 'yyyy-mm-dd' ) = '" . date2mysql($search['tanggal_harian']) . "' ";
			endif;
		} elseif ($search["periode_laporan"] === "Bulanan" & $search["bulan"] !== "" & $search["tahun"] !== "") {
			$param .= " and to_char(dm.waktu_dpmp, 'YYYY-MM'::text) = '" . $search["tahun"] . "-" . $search["bulan"] . "' ";
		} elseif ($search["periode_laporan"] === "Rentang Waktu" & $search["tanggal_awal"] !== "" & $search["tanggal_akhir"] !== "") {
			if ($search["tanggal_awal"] !== "" & $search["tanggal_akhir"] !== "") :
				$param .= " and dm.waktu_dpmp BETWEEN '" . date2mysql($search['tanggal_awal']) . " 00:00:00' AND '" . date2mysql($search['tanggal_akhir']) . " 23:59:59'";
			endif;
		}
        $sql = " SELECT (select nama from sm_diet where id=$getIdDiet) jenis_susu,
                        SUM(CASE WHEN dm.mp_diet_cair = $getIdDiet THEN 1 ELSE 0 END) AS mp,
                        SUM(CASE WHEN dm.sp_diet_cair = $getIdDiet THEN 1 ELSE 0 END) AS sp,
                        SUM(CASE WHEN dm.ms_diet_cair = $getIdDiet THEN 1 ELSE 0 END) AS ms,
                        SUM(CASE WHEN dm.ss_diet_cair = $getIdDiet THEN 1 ELSE 0 END) AS ss,
                        SUM(CASE WHEN dm.mm_diet_cair = $getIdDiet THEN 1 ELSE 0 END) AS mm,
                        SUM(CASE WHEN dm.sm_diet_cair = $getIdDiet THEN 1 ELSE 0 END) AS sm,
                        (SUM(CASE WHEN dm.mp_diet_cair = $getIdDiet THEN 1 ELSE 0 END) +
                        SUM(CASE WHEN dm.sp_diet_cair = $getIdDiet THEN 1 ELSE 0 END) +
                        SUM(CASE WHEN dm.ms_diet_cair = $getIdDiet THEN 1 ELSE 0 END) +
                        SUM(CASE WHEN dm.ss_diet_cair = $getIdDiet THEN 1 ELSE 0 END) +
                        SUM(CASE WHEN dm.mm_diet_cair = $getIdDiet THEN 1 ELSE 0 END) +
                        SUM(CASE WHEN dm.sm_diet_cair = $getIdDiet THEN 1 ELSE 0 END) ) total";
        
        $tabel = " FROM sm_pendaftaran pd
                    JOIN sm_pasien ps ON pd.id_pasien = ps.id
                    JOIN sm_layanan_pendaftaran lp ON pd.id = lp.id_pendaftaran
                    LEFT JOIN sm_dpmp dm ON lp.id = dm.id_layanan_pendaftaran
                    LEFT JOIN sm_rawat_inap ri on lp.id=ri.id_layanan_pendaftaran
                    LEFT JOIN sm_intensive_care ic on lp.id=ic.id_layanan_pendaftaran
                    WHERE 
                        lp.status_terlayani <> 'Batal'
                        AND lp.tindak_lanjut IS NULL
                        $param
                        AND dm.waktu_dpmp = (
                            SELECT MAX(dm2.waktu_dpmp)
                            FROM sm_dpmp dm2
                            JOIN sm_layanan_pendaftaran lp2 ON dm2.id_layanan_pendaftaran = lp2.id
                            WHERE 
                                lp2.id_pendaftaran = lp.id_pendaftaran
                                AND TO_CHAR(dm2.waktu_dpmp, 'yyyy-mm-dd') = TO_CHAR(dm.waktu_dpmp, 'yyyy-mm-dd')
                        )
                ";

        if ($search["tempat_layanan"] === "1") { 
            $where  .=" AND ri.id is not null"; 
            $search["ruangan_ranap"] !== "" ? $where  .=" AND ri.id_bangsal =".$search["ruangan_ranap"] : ''; 
        } else if ($search["tempat_layanan"] === "2") {
            $where  .=" AND ic.id is not null"; 
            $search["ruangan_ic"] !== "" ? $where  .=" AND ic.id_bangsal =".$search["ruangan_ic"] : ''; 
        }
		return $this->db->query($sql.$tabel.$where)->row();
	}

    function getListLaporanGizi04($limit, $start, $search)
	{
        $param = "";     

		if ($search["periode_laporan"] === "Harian") {
			if ($search["tanggal_harian"] !== "") :
				$param .= " and to_char(dm.waktu_dpmp, 'yyyy-mm-dd' ) = '" . date2mysql($search['tanggal_harian']) . "' ";
			endif;
		} elseif ($search["periode_laporan"] === "Bulanan" & $search["bulan"] !== "" & $search["tahun"] !== "") {
			$param .= " and to_char(dm.waktu_dpmp, 'YYYY-MM'::text) = '" . $search["tahun"] . "-" . $search["bulan"] . "' ";
		} elseif ($search["periode_laporan"] === "Rentang Waktu" & $search["tanggal_awal"] !== "" & $search["tanggal_akhir"] !== "") {
			if ($search["tanggal_awal"] !== "" & $search["tanggal_akhir"] !== "") :
				$param .= " and dm.waktu_dpmp BETWEEN '" . date2mysql($search['tanggal_awal']) . " 00:00:00' AND '" . date2mysql($search['tanggal_akhir']) . " 23:59:59'";
			endif;
		}

        $sql = " SELECT pd.id, lp.id id_layanan_pendaftaran, lp.tanggal_layanan, dm.waktu_dpmp, ri.id id_ranap, ri.id_bangsal id_bangsal_ranap, ic.id id_ic, ic.id_bangsal id_bangsal_ic,
                case when ri.id is not null then concat((select nama from sm_bangsal where id=ri.id_bangsal),' Ruang ',ri.no_ruang,' Bed ', ri.no_bed)
                when ic.id is not null then concat((select nama from sm_bangsal where id=ic.id_bangsal),' Ruang ',ic.no_ruang,' Bed ', ic.no_bed) 
                when lp.jenis_layanan = 'Hemodialisa' then 'Hemodialisa' else '' end ruangan,
                pd.id_pasien, ps.nama,
                dm.id id_diet_makan, dm.jns_diet_mp, dm.jns_diet_sp, dm.jns_diet_ms, dm.jns_diet_ss, dm.jns_diet_mm, dm.jns_diet_sm,
                dm.btk_mkn_mp, dm.btk_mkn_sp, dm.btk_mkn_ms, dm.btk_mkn_ss, dm.btk_mkn_mm, dm.btk_mkn_sm,
                dm.mp_makan_pasien, dm.sp_makan_pasien, dm.ms_makan_pasien, dm.ss_makan_pasien, dm.mm_makan_pasien, dm.sm_makan_pasien, dm.ket_makan_pasien,
                mp.kode as mp_kode,ms.kode as ms_kode, mm.kode as mm_kode, ss.kode as ss_kode, sp.kode as sp_kode, sm.kode as sm_kode,
                dc.id id_diet_cair, dc.keterangan_diet_cair as kdc, dc.dpmp_gram,
                to_char(dc.dpmp_jam_satu, 'HH24' ) dpmp_jam_satu, to_char(dc.dpmp_jam_dua, 'HH24' ) dpmp_jam_dua, to_char(dc.dpmp_jam_tiga, 'HH24' ) dpmp_jam_tiga, to_char(dc.dpmp_jam_empat, 'HH24' ) dpmp_jam_empat, 
                to_char(dc.dpmp_jam_lima, 'HH24' ) dpmp_jam_lima, to_char(dc.dpmp_jam_enam, 'HH24' ) dpmp_jam_enam, to_char(dc.dpmp_jam_tujuh, 'HH24' ) dpmp_jam_tujuh, to_char(dc.dpmp_jam_delapan, 'HH24' ) dpmp_jam_delapan ,
                ((CASE WHEN dc.dpmp_jam_satu IS NOT NULL THEN 1 ELSE 0 END) +(CASE WHEN dc.dpmp_jam_dua IS NOT NULL THEN 1 ELSE 0 END) +(CASE WHEN dc.dpmp_jam_tiga IS NOT NULL THEN 1 ELSE 0 END) +
                (CASE WHEN dc.dpmp_jam_empat IS NOT NULL THEN 1 ELSE 0 END) +(CASE WHEN dc.dpmp_jam_lima IS NOT NULL THEN 1 ELSE 0 END) +(CASE WHEN dc.dpmp_jam_enam IS NOT NULL THEN 1 ELSE 0 END) +
                (CASE WHEN dc.dpmp_jam_tujuh IS NOT NULL THEN 1 ELSE 0 END) +(CASE WHEN dc.dpmp_jam_delapan IS NOT NULL THEN 1 ELSE 0 END) ) AS freq ";

        $tabel = " FROM sm_pendaftaran pd
                    JOIN sm_pasien ps on pd.id_pasien=ps.id
                    JOIN sm_layanan_pendaftaran lp on pd.id = lp.id_pendaftaran
                    LEFT JOIN sm_rawat_inap ri on lp.id=ri.id_layanan_pendaftaran
                    LEFT JOIN sm_intensive_care ic on lp.id=ic.id_layanan_pendaftaran
                    LEFT JOIN sm_diagnosa d on lp.id=d.id_layanan_pendaftaran and d.prioritas='Utama'

                    LEFT JOIN sm_dpmp dm on lp.id = dm.id_layanan_pendaftaran
                    LEFT JOIN sm_diet_cair dc on dm.id = dc.id_dpmp     

                    LEFT JOIN sm_diet as mp on mp.id = dm.mp_diet_cair
                    LEFT JOIN sm_diet as ms on ms.id = dm.ms_diet_cair
                    LEFT JOIN sm_diet as mm on mm.id = dm.mm_diet_cair
                    LEFT JOIN sm_diet as ss on ss.id = dm.ss_diet_cair
                    LEFT JOIN sm_diet as sp on sp.id = dm.sp_diet_cair
                    LEFT JOIN sm_diet as sm on sm.id = dm.sm_diet_cair
                ";
        $where  =" WHERE lp.status_terlayani<>'Batal'  AND lp.tindak_lanjut is null AND dc.id is not null";

        if ($search["tempat_layanan"] === "1") { 
            $where  .=" AND ri.id is not null"; 
            $search["ruangan_ranap"] !== "" ? $where  .=" AND ri.id_bangsal =".$search["ruangan_ranap"] : ''; 
        } else if ($search["tempat_layanan"] === "2") {
            $where  .=" AND ic.id is not null"; 
            $search["ruangan_ic"] !== "" ? $where  .=" AND ic.id_bangsal =".$search["ruangan_ic"] : ''; 
        }

		$order  = " ORDER BY dm.waktu_dpmp DESC, ps.id ASC  ";

        $limitation ='';
        if ($limit !== 0) {
            $limitation = " LIMIT " . $limit . " OFFSET " . $start;
        }

        $jenis_diet_map     = [ '1' => 'Diet Makan', '2' => 'Diet Cair', ];
        $tempat_layanan_map = [ '1' => 'Rawat Inap', '2' => 'Intensive Care', ];

		$data["data"]           = $this->db->query($sql.$tabel.$where.$param.$order.$limitation)->result();
		$data['jml_data']       = $this->db->query($sql.$tabel.$where.$param.$order)->num_rows();
        $data['periode']        = $this->periode($search) ;
		$data['jenis_diet']     = $jenis_diet_map[$search["jenis_diet"]] ?? '';
		$data['tempat_layanan'] = $tempat_layanan_map[$search["tempat_layanan"]] ?? '';
		$data['ruangan_ranap']  = $search["ruangan_ranap"] <>'' ? $this->db->select('nama')->from('sm_bangsal')->where('id', $search["ruangan_ranap"])->get()->row()->nama : '';
		$data['ruangan_ic']     = $search["ruangan_ic"] <>'' ? $this->db->select('nama')->from('sm_bangsal')->where('id', $search["ruangan_ic"])->get()->row()->nama : '';
		return $data;
	}

    function getListLaporanGizi05($limit, $start, $search, $tempat_layanan, $bangsal)
	{
        $param = "";     

		if ($search["periode_laporan"] === "Harian") {
			if ($search["tanggal_harian"] !== "") :
				$param .= " and to_char(dm.waktu_dpmp, 'yyyy-mm-dd' ) = '" . date2mysql($search['tanggal_harian']) . "' ";
			endif;
		} elseif ($search["periode_laporan"] === "Bulanan" & $search["bulan"] !== "" & $search["tahun"] !== "") {
			$param .= " and to_char(dm.waktu_dpmp, 'YYYY-MM'::text) = '" . $search["tahun"] . "-" . $search["bulan"] . "' ";
		} elseif ($search["periode_laporan"] === "Rentang Waktu" & $search["tanggal_awal"] !== "" & $search["tanggal_akhir"] !== "") {
			if ($search["tanggal_awal"] !== "" & $search["tanggal_akhir"] !== "") :
				$param .= " and dm.waktu_dpmp BETWEEN '" . date2mysql($search['tanggal_awal']) . " 00:00:00' AND '" . date2mysql($search['tanggal_akhir']) . " 23:59:59'";
			endif;
		}

        $sql = " SELECT pd.id, lp.id id_layanan_pendaftaran, lp.tanggal_layanan, dm.waktu_dpmp, ri.id id_ranap, ri.id_bangsal id_bangsal_ranap, ic.id id_ic, ic.id_bangsal id_bangsal_ic,
                case when ri.id is not null then concat('R.',ri.no_ruang,' - B.', ri.no_bed)
                when ic.id is not null then concat('R.',ic.no_ruang,' - B.', ic.no_bed) 
                when lp.jenis_layanan = 'Hemodialisa' then 'Hemodialisa' else '' end ruangan,
                pd.id_pasien, ps.nama, ps.tanggal_lahir,
                dm.id id_diet_makan, dm.jns_diet_mp, dm.jns_diet_sp, dm.jns_diet_ms, dm.jns_diet_ss, dm.jns_diet_mm, dm.jns_diet_sm,
                dm.btk_mkn_mp, dm.btk_mkn_sp, dm.btk_mkn_ms, dm.btk_mkn_ss, dm.btk_mkn_mm, dm.btk_mkn_sm,
                dm.mp_makan_pasien, dm.sp_makan_pasien, dm.ms_makan_pasien, dm.ss_makan_pasien, dm.mm_makan_pasien, dm.sm_makan_pasien, dm.ket_makan_pasien,
                mp.kode as mp_kode,ms.kode as ms_kode, mm.kode as mm_kode, ss.kode as ss_kode, sp.kode as sp_kode, sm.kode as sm_kode,
                dc.id id_diet_cair, dc.keterangan_diet_cair as kdc,
                dc.dpmp_jam_satu, dc.dpmp_jam_dua, dc.dpmp_jam_tiga, dc.dpmp_jam_empat, dc.dpmp_jam_lima, dc.dpmp_jam_enam, dc.dpmp_jam_tujuh, dc.dpmp_jam_delapan ";

        $tabel = " FROM sm_pendaftaran pd
                    JOIN sm_pasien ps on pd.id_pasien=ps.id
                    JOIN sm_layanan_pendaftaran lp on pd.id = lp.id_pendaftaran
                    LEFT JOIN sm_rawat_inap ri on lp.id=ri.id_layanan_pendaftaran   
                    LEFT JOIN sm_intensive_care ic on lp.id=ic.id_layanan_pendaftaran
                    LEFT JOIN sm_diagnosa d on lp.id=d.id_layanan_pendaftaran and d.prioritas='Utama'

                    LEFT JOIN sm_dpmp dm on lp.id = dm.id_layanan_pendaftaran
                    LEFT JOIN sm_diet_cair dc on dm.id = dc.id_dpmp

                    LEFT JOIN sm_diet as mp on mp.id = dm.mp_diet_cair
                    LEFT JOIN sm_diet as ms on ms.id = dm.ms_diet_cair
                    LEFT JOIN sm_diet as mm on mm.id = dm.mm_diet_cair
                    LEFT JOIN sm_diet as ss on ss.id = dm.ss_diet_cair
                    LEFT JOIN sm_diet as sp on sp.id = dm.sp_diet_cair
                    LEFT JOIN sm_diet as sm on sm.id = dm.sm_diet_cair
                ";
        $where  =" WHERE lp.status_terlayani<>'Batal'  AND lp.tindak_lanjut is null ";

        if($bangsal == 'Hemodialisa'){
            $where  .=" AND lp.jenis_layanan = 'Hemodialisa' "; 
        } else {
            if ($tempat_layanan === 1) { 
                $where  .=" AND ri.id is not null AND ri.id_bangsal = ".$bangsal; 
            } else if ($tempat_layanan === 2) {
                $where  .=" AND ic.id is not null AND ic.id_bangsal =".$bangsal; 
            }
        }

		$order  = " ORDER BY dm.waktu_dpmp DESC, ps.id ASC  ";

        $limitation ='';
        if ($limit !== 0) {
            $limitation = " LIMIT " . $limit . " OFFSET " . $start;
        }        

		$data = $sql.$tabel.$where.$param.$order.$limitation;
        
        
		// $data["data"]           = $this->db->query($sql.$tabel.$where.$param.$order.$limitation)->result();
		return $data;
	}

    function getListLaporanGizi06($limit, $start, $search)
	{
        $param = "";     

		if ($search["periode_laporan"] === "Harian") {
			if ($search["tanggal_harian"] !== "") :
				$param .= " and to_char(dm.waktu_dpmp, 'yyyy-mm-dd' ) = '" . date2mysql($search['tanggal_harian']) . "' ";
			endif;
		} elseif ($search["periode_laporan"] === "Bulanan" & $search["bulan"] !== "" & $search["tahun"] !== "") {
			$param .= " and to_char(dm.waktu_dpmp, 'YYYY-MM'::text) = '" . $search["tahun"] . "-" . $search["bulan"] . "' ";
		} elseif ($search["periode_laporan"] === "Rentang Waktu" & $search["tanggal_awal"] !== "" & $search["tanggal_akhir"] !== "") {
			if ($search["tanggal_awal"] !== "" & $search["tanggal_akhir"] !== "") :
				$param .= " and dm.waktu_dpmp BETWEEN '" . date2mysql($search['tanggal_awal']) . " 00:00:00' AND '" . date2mysql($search['tanggal_akhir']) . " 23:59:59'";
			endif;
		}

        $sql = " SELECT pd.id, lp.id id_layanan_pendaftaran, lp.tanggal_layanan, dm.waktu_dpmp, ri.id id_ranap, ri.id_bangsal id_bangsal_ranap, ic.id id_ic, ic.id_bangsal id_bangsal_ic,
                case when ri.id is not null then concat((select nama from sm_bangsal where id=ri.id_bangsal),' Ruang ',ri.no_ruang,' Bed ', ri.no_bed)
                when ic.id is not null then concat((select nama from sm_bangsal where id=ic.id_bangsal),' Ruang ',ic.no_ruang,' Bed ', ic.no_bed) 
                when lp.jenis_layanan = 'Hemodialisa' then 'Hemodialisa' else '' end ruangan,
                pd.id_pasien, ps.nama, ps.tanggal_lahir,ps.kelamin,
                dm.id id_diet_makan, dm.jns_diet_mp, dm.jns_diet_sp, dm.jns_diet_ms, dm.jns_diet_ss, dm.jns_diet_mm, dm.jns_diet_sm, dm.ket_makan_pasien,
                dm.btk_mkn_mp, dm.btk_mkn_sp, dm.btk_mkn_ms, dm.btk_mkn_ss, dm.btk_mkn_mm, dm.btk_mkn_sm,
                mp.kode as mp_kode,ms.kode as ms_kode, mm.kode as mm_kode, ss.kode as ss_kode, sp.kode as sp_kode, sm.kode as sm_kode,
                dc.id id_diet_cair, dc.keterangan_diet_cair as kdc,
                dc.dpmp_jam_satu, dc.dpmp_jam_dua, dc.dpmp_jam_tiga, dc.dpmp_jam_empat, dc.dpmp_jam_lima, dc.dpmp_jam_enam, dc.dpmp_jam_tujuh, dc.dpmp_jam_delapan
                ";

        $tabel = " FROM sm_pendaftaran pd
                    JOIN sm_pasien ps on pd.id_pasien=ps.id
                    JOIN sm_layanan_pendaftaran lp on pd.id = lp.id_pendaftaran
                    LEFT JOIN sm_rawat_inap ri on lp.id=ri.id_layanan_pendaftaran
                    LEFT JOIN sm_intensive_care ic on lp.id=ic.id_layanan_pendaftaran

                    LEFT JOIN sm_dpmp dm on lp.id = dm.id_layanan_pendaftaran
                    LEFT JOIN sm_diet_cair dc on dm.id = dc.id_dpmp     

                    LEFT JOIN sm_diet as mp on mp.id = dm.mp_diet_cair                     
                    LEFT JOIN sm_diet as ms on ms.id = dm.ms_diet_cair
                    LEFT JOIN sm_diet as mm on mm.id = dm.mm_diet_cair
                    LEFT JOIN sm_diet as ss on ss.id = dm.ss_diet_cair
                    LEFT JOIN sm_diet as sp on sp.id = dm.sp_diet_cair
                    LEFT JOIN sm_diet as sm on sm.id = dm.sm_diet_cair
                    WHERE dm.waktu_dpmp = (
                            SELECT MAX(dm2.waktu_dpmp)
                            FROM sm_dpmp dm2
                            JOIN sm_layanan_pendaftaran lp2 ON dm2.id_layanan_pendaftaran = lp2.id
                            WHERE 
                                lp2.id_pendaftaran = lp.id_pendaftaran
                                AND TO_CHAR(dm2.waktu_dpmp, 'yyyy-mm-dd') = TO_CHAR(dm.waktu_dpmp, 'yyyy-mm-dd')
                        )

                
                ";
        $where  =" AND lp.status_terlayani<>'Batal' AND lp.tindak_lanjut is null ";

             if ($search["jenis_diet"] === "1") { $where  .=" AND dc.id is null"; }
        else if ($search["jenis_diet"] === "2") { $where  .=" AND dc.id is not null"; }

        if ($search["tempat_layanan"] === "1") { 
            $where  .=" AND ri.id is not null"; 
            $search["ruangan_ranap"] !== "" ? $where  .=" AND ri.id_bangsal =".$search["ruangan_ranap"] : ''; 
        } else if ($search["tempat_layanan"] === "2") {
            $where  .=" AND ic.id is not null"; 
            $search["ruangan_ic"] !== "" ? $where  .=" AND ic.id_bangsal =".$search["ruangan_ic"] : ''; 
        } 


		$order  = " ORDER BY dm.waktu_dpmp DESC, ps.id ASC  ";

        $limitation ='';
        if ($limit !== 0) {
            $limitation = " LIMIT " . $limit . " OFFSET " . $start;
        }

        $jenis_diet_map     = [ '1' => 'Diet Makan', '2' => 'Diet Cair', ];
        $tempat_layanan_map = [ '1' => 'Rawat Inap', '2' => 'Intensive Care', ];

		$data["data"]           = $this->db->query($sql.$tabel.$where.$param.$order.$limitation)->result();
		$data['jml_data']       = $this->db->query($sql.$tabel.$where.$param.$order)->num_rows();
        $data['periode']        = $this->periode($search) ;
		$data['jenis_diet']     = $jenis_diet_map[$search["jenis_diet"]] ?? '';
		$data['tempat_layanan'] = $tempat_layanan_map[$search["tempat_layanan"]] ?? '';
		$data['ruangan_ranap']  = $search["ruangan_ranap"] <>'' ? $this->db->select('nama')->from('sm_bangsal')->where('id', $search["ruangan_ranap"])->get()->row()->nama : '';
		$data['ruangan_ic']     = $search["ruangan_ic"] <>'' ? $this->db->select('nama')->from('sm_bangsal')->where('id', $search["ruangan_ic"])->get()->row()->nama : '';   
		return $data;
	}

}
