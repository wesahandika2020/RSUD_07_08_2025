<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Laporan_operasi_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->datetime = date('Y-m-d H:i:s');
    }

    public function list_laporan()
    {
        return array(
            ''      => '-- Pilih Laporan Bedah Central --',
            '1'     => 'Laporan Bulanan Operasi Instalasi Bedah Sentral (IBS)',
            '2'     => 'Laporan Kegiatan Pembedahan',
            '3'     => 'Laporan Anastesi Dikamar OK',
            '4'     => 'Rekapitulasi Operasi Pasien Dokter Spesialis',
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

    // public function getJenisPasien()
    // {
    //     return array(
    //         ''              => 'Semua Pasien',
    //         'Rawat Inap'    => 'Rawat Inap',
    //         'Rawat Jalan'   => 'Rawat Jalan',
    //         'IGD'           => 'IGD',
    //         'Hemodialisa'   => 'Hemodialisa',
    //     );
    // }

    // public function getJaminan()
    // {
    //     return array(
    //         ''              => 'Semua Jaminan',
    //         'Asuransi'      => 'Asuransi',
    //         'Perusahaan'    => 'Perusahaan',
    //         'Karyawan'      => 'Karyawan',
    //         'Gratis'        => 'Gratis',
    //         'Tunai'         => 'Tunai',
    //     );
    // }

    // public function getGolongan()
    // {
    //     $sql = "SELECT DISTINCT b.id_golongan as id , g.nama
    // 	FROM sm_barang b
    // 	JOIN sm_golongan g on b.id_golongan = g.id
    // 	ORDER BY b.id_golongan";

    //     $query = $this->db->query($sql)->result();
    //     $data =  array();
    //     $data[''] = 'Semua Golongan';
    //     foreach ($query as $key => $value) :
    //         $data[$value->id] = $value->nama;
    //     endforeach;

    //     return $data;
    // }

    // public function getJenis()
    // {
    //     $sql = "SELECT DISTINCT b.jenis
    // 	FROM sm_barang b";

    //     $query = $this->db->query($sql)->result();
    //     $data =  array();
    //     $data[''] = 'Semua Jenis';
    //     foreach ($query as $key => $value) :
    //         $data[$value->jenis] = $value->jenis;
    //     endforeach;

    //     return $data;
    // }

    // public function getKategori()
    // {
    //     $sql = "SELECT DISTINCT b.id_kategori as id , kb.nama
    // 	FROM sm_barang b
    // 	JOIN sm_kategori_barang kb on b.id_kategori = kb.id
    // 	ORDER BY b.id_kategori";

    //     $query = $this->db->query($sql)->result();
    //     $data =  array();
    //     $data[''] = 'Semua Kategori';
    //     foreach ($query as $key => $value) :
    //         $data[$value->id] = $value->nama;
    //     endforeach;

    //     return $data;
    // }

    // public function getFornas()
    // {
    //     $sql = "SELECT DISTINCT b.fornas
    // 	FROM sm_barang b
    // 	WHERE b.fornas IS NOT NULL 
    // 	ORDER BY b.fornas DESC";

    //     $query = $this->db->query($sql)->result();
    //     $data =  array();
    //     $data[''] = 'Semua...';
    //     foreach ($query as $key => $value) :
    //         $data[$value->fornas] = $value->fornas;
    //     endforeach;

    //     return $data;
    // }

    // public function getGenerik()
    // {
    //     $sql = "SELECT DISTINCT b.generik
    // 	FROM sm_barang b
    // 	WHERE b.generik IS NOT NULL 
    // 	ORDER BY b.generik DESC";

    //     $query = $this->db->query($sql)->result();
    //     $data =  array();
    //     $data[''] = 'Semua...';
    //     foreach ($query as $key => $value) :
    //         $data[$value->generik] = $value->generik;
    //     endforeach;

    //     return $data;
    // }

    // public function getUnitDepo()
    // {
    //     $sql = "SELECT id, nama FROM sm_unit
    // 	WHERE id IN ('303','304','305','295', '259')
    // 	ORDER BY nama asc";

    //     $query = $this->db->query($sql)->result();
    //     $data =  array();
    //     // $data[''] = 'Semua Unit...';
    //     foreach ($query as $key => $value) :
    //         $data[$value->id] = $value->nama;
    //     endforeach;

    //     return $data;
    // }

    // public function getUnitDepoAll()
    // {
    //     $sql = "SELECT id, nama FROM sm_unit
    // 	WHERE id_instalasi = '32' AND is_gudang IS NULL
    // 	ORDER BY nama asc";

    //     $query = $this->db->query($sql)->result();
    //     $data =  array();
    //     $data[''] = 'Semua Unit...';
    //     foreach ($query as $key => $value) :
    //         $data[$value->id] = $value->nama;
    //     endforeach;

    //     return $data;
    // }

    private function formatPeriodeLaporan($search)
    {
        $periode = "";

        if ($search["periode_laporan"] === "Bulanan") {
            $nama_bulan = [
                '01' => 'Januari', '02' => 'Februari', '03' => 'Maret',
                '04' => 'April',   '05' => 'Mei',      '06' => 'Juni',
                '07' => 'Juli',    '08' => 'Agustus',  '09' => 'September',
                '10' => 'Oktober', '11' => 'November', '12' => 'Desember'
            ];

            if (!empty($search["bulan"]) && !empty($search["tahun"])) {
                $periode = ($nama_bulan[$search["bulan"]] ?? '') . ' ' . $search["tahun"];
            }
        } elseif ($search["periode_laporan"] === "Harian") {
            $periode = get_date_format(date2mysql($search['tanggal_harian']));
        } elseif ($search["periode_laporan"] === "Rentang Waktu") {
            $periode = get_date_format(date2mysql($search['tanggal_awal'])) . " s.d " . get_date_format(date2mysql($search['tanggal_akhir']));
        }

        return $periode;
    }

    public function getDataMasteOperasi($search)
    {
        $param = "";

        // $search["unit"] !== "" ? $param .= " and bu.id_unit = '" . $search["unit"] . "' " : $param .= "and bu.id_unit = '" . $this->session->userdata('id_unit') . "' ";
        // $search["golongan"] !== "" ? $param .= " and b.id_golongan = '" . $search["golongan"] . "' " : '';
        // $search["jenis"] !== "" ? $param .= " and kb.jenis = '" . $search["jenis"] . "' " : '';
        // $search["kategori"] !== "" ? $param .= " and b.id_kategori = '" . $search["kategori"] . "' " : '';
        // $search["fornas"] !== "" ? $param .= " and b.fornas = '" . $search["fornas"] . "' " : '';
        // $search["generik"] !== "" ? $param .= " and b.generik = '" . $search["generik"] . "' " : '';

        $query      = "";

        $tanggal_pembanding = '2025-05-01';
        $tanggal_cek = null;
        $param_data = "";
        if ($search["periode_laporan"] === "Harian") {
            if ($search["tanggal_harian"] !== "") :
                $param_data = " and to_char( jko.waktu, 'yyyy-mm-dd' ) ilike '%" . date2mysql($search['tanggal_harian']) . "' ";
                $tanggal_cek = date2mysql($search["tanggal_harian"]);
            endif;
        } elseif ($search["periode_laporan"] === "Bulanan" & $search["bulan"] !== "" & $search["tahun"] !== "") {
            $param_data = " and to_char( jko.waktu, 'mm/yyyy' ) = '" . $search["bulan"] . "/" . $search["tahun"] . "' ";
            $tanggal_cek = $search["tahun"] . '-' . str_pad($search["bulan"], 2, '0', STR_PAD_LEFT) . '-01';
        } elseif ($search["periode_laporan"] === "Rentang Waktu" & $search["tanggal_awal"] !== "" & $search["tanggal_akhir"] !== "") {
            if ($search["tanggal_awal"] !== "" & $search["tanggal_akhir"] !== "") :
                $param_data = " and jko.waktu BETWEEN '" . date2mysql($search['tanggal_awal']) . " 00:00:00' AND '" . date2mysql($search['tanggal_akhir']) . " 23:59:59'";
                $tanggal_cek = date2mysql($search["tanggal_awal"]);
            endif;
        }

        $field_general = "lo.jenis_anestesi";
        if ($tanggal_cek && $tanggal_cek >= $tanggal_pembanding) {
            $field_general = "jko.jenis_anastesi"; // gunakan field baru jika >= Mei 2025
        }

        $select = " SELECT DISTINCT ON (jko.id) jko.id, lp.id_pendaftaran, jko.id_layanan_pendaftaran, 
                to_char(jko.waktu, 'YYYY-MM-DD') as tanggal, to_char(jko.mulai, 'HH24:MI') as rencana_mulai, 
                to_char(jko.selesai, 'HH24:MI') as rencana_selesai, to_char(lo.mulai_waktu_operasi, 'HH24:MI') as mulai, 
                to_char(lo.selesai_waktu_operasi, 'HH24:MI') as selesai, TO_CHAR(lo.selesai_waktu_operasi - INTERVAL '10 minutes', 'HH24:MI') AS sign_out, 
                p.nama as nama_pasien, EXTRACT(YEAR FROM AGE(current_date, p.tanggal_lahir)) AS umur, p.kelamin, p.id as no_rm, 
                '' as ruang, '' as diagnosa, '' as tindakan, 
                case when jko.klasifikasi = 'Minor' then 'KECIL' when jko.klasifikasi = 'Standard' then 'SEDANG' when jko.klasifikasi = 'Mayor' then 'BESAR' when jko.klasifikasi = 'Khusus' then 'KHUSUS' END as klasifikasi, 
                tm.id as id_nadis, pg.nama as operator, pg1.nama as asisten_operator, pg2.nama as instrumen, pg3.nama as sirkuler, 
                
                case when $field_general = 'General' then 'GA' when $field_general = 'Regional' then 'RA' when $field_general = 'Lokal' then 'LA' END as anestesi, 

                case when jko.id_ruang_operasi = '2' then '1' when jko.id_ruang_operasi = '3' then '2' when jko.id_ruang_operasi = '4' then '3' end as ok, 
                case when lo.jenis_operasi = 'Bersih Terkontaminasi' then 'BT' when lo.jenis_operasi = 'Bersih' then 'B' when lo.jenis_operasi = 'Kotor' then 'K' end as kategori_tindakan, 
                pg4.nama as dokter_anesthesi, pg5.nama as asisten_anesthesi, case when jko.timing = 'Emergency' then 'CITO' else 'ELEKTIF' end as jenis_operasi ";

        $count  = " SELECT COUNT(DISTINCT jko.id) as count ";
        $sql    = " FROM sm_jadwal_kamar_operasi jko
                left join sm_tim_operasi top on (jko.id = top.id_jadwal_operasi and top.status = 'Dokter Operator')
                left JOIN sm_tenaga_medis tm ON top.id_nadis = tm.ID  
                left JOIN sm_spesialisasi sp ON tm.id_spesialisasi = sp.id
                left JOIN sm_pegawai pg ON tm.id_pegawai = pg.id
                    
                left join sm_tim_operasi top1 on (jko.id = top1.id_jadwal_operasi and top1.status = 'Asisten Operator')
                left JOIN sm_tenaga_medis tm1 ON top1.id_nadis = tm1.ID
                left JOIN sm_pegawai pg1 ON tm1.id_pegawai = pg1.id
                    
                left join sm_tim_operasi top2 on (jko.id = top2.id_jadwal_operasi and top2.status = 'Instrumental')
                left JOIN sm_tenaga_medis tm2 ON top2.id_nadis = tm2.ID
                left JOIN sm_pegawai pg2 ON tm2.id_pegawai = pg2.id
                    
                left join sm_tim_operasi top3 on (jko.id = top3.id_jadwal_operasi and top3.status = 'Sirkuler')
                left JOIN sm_tenaga_medis tm3 ON top3.id_nadis = tm3.ID
                left JOIN sm_pegawai pg3 ON tm3.id_pegawai = pg3.id
                    
                left join sm_tim_operasi top4 on (jko.id = top4.id_jadwal_operasi and top4.status = 'Dokter Anesthesi')
                left JOIN sm_tenaga_medis tm4 ON top4.id_nadis = tm4.ID
                left JOIN sm_pegawai pg4 ON tm4.id_pegawai = pg4.id
                    
                left join sm_tim_operasi top5 on (jko.id = top5.id_jadwal_operasi and top5.status = 'Perawat Anesthesi')
                left JOIN sm_tenaga_medis tm5 ON top5.id_nadis = tm5.ID
                left JOIN sm_pegawai pg5 ON tm5.id_pegawai = pg5.id
                    
                left JOIN sm_laporan_operasi lo ON jko.id_layanan_pendaftaran = lo.id_layanan_pendaftaran
                JOIN sm_layanan_pendaftaran lp ON jko.id_layanan_pendaftaran = lp.id
                JOIN sm_pendaftaran pd ON lp.id_pendaftaran = pd.id
                JOIN sm_pasien p ON pd.id_pasien = p.id
            
                WHERE jko.status = 'Confirmed' 
                AND jko.layanan != 'VK' $param_data ";
        $order = " ORDER BY jko.id ASC, jko.waktu ASC ";

        $query = [
            'select' => $select,
            'sql'    => $sql,
            'order' => $order,
            'count'  => $count,
        ];

        return $query;
    }

    public function getListDataLaporanBSI($limit, $start, $search)
    {
        $limitation = "";
        // if ($limit !== 0) :
        //     $limitation = " limit " . $limit . " offset " . $start;
        // endif;

        $que = $this->getDataMasteOperasi($search);

        $queryData = $this->db->query($que['select'] . $que['sql'] . $que['order'] . $limitation)->result();
        $jumlah    = $this->db->query($que['count'] . $que['sql'])->row()->count ?? 0;
        $periode   = $this->formatPeriodeLaporan($search);

        foreach ($queryData as $i => $val) :
            $whereIdNadis = "  and top.id_nadis is null ";
            if ($val->id_nadis !== null) {
                $whereIdNadis = " and (top.id_nadis is null or top.id_nadis = '$val->id_nadis') ";
            }

            $queryTindakan = $this->db->query("
                    SELECT top.id, l.nama, top.total, top.reimburse

                    FROM sm_tarif_operasi top
                    JOIN sm_tarif_pelayanan tp ON top.id_tarif = tp.id
                    JOIN sm_layanan l ON tp.id_layanan = l.id

                    WHERE top.id_operasi = '$val->id'
                    $whereIdNadis ")->result();

            $queryRuang = $this->db->query("
                    SELECT COALESCE(sp.nama , bg_ri.nama , bg_ic.nama) as ruang
                    
                    FROM sm_pendaftaran pd
                    JOIN fn_layanan_pendaftaran_terakhir ( pd.ID :: INTEGER ) as fn_lp ON TRUE 
                    JOIN sm_layanan_pendaftaran lp on fn_lp.id = lp.id
                    LEFT JOIN sm_rawat_inap ri ON lp.id = ri.id_layanan_pendaftaran
                    LEFT JOIN sm_bangsal bg_ri ON ri.id_bangsal = bg_ri.id 
                    LEFT JOIN sm_intensive_care ic ON lp.id = ic.id_layanan_pendaftaran
                    LEFT JOIN sm_spesialisasi sp ON lp.id_unit_layanan = sp.id
                    LEFT JOIN sm_bangsal bg_ic ON ic.id_bangsal = bg_ic.id

                    WHERE pd.id = '$val->id_pendaftaran'
                    AND (ri.id is not null OR ic.id is not null or lp.id_unit_layanan is not null)

                    -- ORDER BY lp.id DESC
                    LIMIT 1")->row();

            $queryDiagnosa = $this->db->query("select concat_ws ('. ', ( SELECT gss1.kode_icdx_rinci FROM sm_golongan_sebab_sakit AS gss1 WHERE gss1.ID = d.id_pengkodean ), 
                    ( SELECT gss2.kode_icdx_rinci FROM sm_golongan_sebab_sakit AS gss2 WHERE gss2.ID = d.id_pengkodean_asterik ), gss.nama,
                     d.golongan_sebab_sakit_lain ) AS nama 
                    from sm_pendaftaran as pd
                    JOIN fn_layanan_pendaftaran_terakhir ( pd.ID :: INTEGER ) as fn_lp ON TRUE 
                    JOIN sm_layanan_pendaftaran lp on fn_lp.id = lp.id

                    left join sm_diagnosa as d on lp.id = d.id_layanan_pendaftaran
                    left join sm_golongan_sebab_sakit as gss on gss.id = d.id_golongan_sebab_sakit
                    where pd.id = '$val->id_pendaftaran'
                    and d.prioritas = 'Utama'

                    ORDER BY lp.id DESC 
                    LIMIT 1")->row();


            $queryData[$i]->tindakan = $queryTindakan ?? [];
            $queryData[$i]->ruang = $queryRuang->ruang ?? '-';
            // $queryData[$i]->diagnosa = $queryRuang->diagnosa ?? '-';
            $queryData[$i]->diagnosa = $queryDiagnosa->nama ?? '-';
        endforeach;

        $tindakanBulan = 0;
        $tindakanHari = 0;
        $lastTanggal = null;

        foreach ($queryData as $i => $val) :
            if ($val->tanggal === $lastTanggal) {
                $tindakanHari += 1;
            } else {
                $tindakanHari = 1; // reset jika tanggal berubah
                $lastTanggal = $val->tanggal;
            }

            $tindakanBulan += 1;

            foreach ($val->tindakan as $key => $tindakan) :

                $queryData[$i]->tindakan[$key]->tindakan_bulan = $tindakanBulan;
                $queryData[$i]->tindakan[$key]->tindakan_hari = $tindakanHari;

                if ($key > 0) {
                    $tindakanBulan += 1;
                    $tindakanHari += 1;

                    $queryData[$i]->tindakan[$key]->tindakan_bulan = $tindakanBulan;
                    $queryData[$i]->tindakan[$key]->tindakan_hari = $tindakanHari;
                }
            endforeach;

        endforeach;

        $this->db->close();

        $data =  [
            "periode" => $periode,
            "data"    => $queryData,
            "jumlah"  => $jumlah
        ];

        return $data;
    }

    public function getLaporanKegiatanPembedahan($limit, $start, $search)
    {
        $param = "";
        $query      = "";
        $limitation = "";
        if ($limit !== 0) :
            $limitation = " limit " . $limit . " offset " . $start;
        endif;

        $unit_param = "";
        $unit_param_data = "";
        if ($search["spesialisasi"] !== "") {
            $unit_param = " and id = '" . $search["spesialisasi"] . "' ";
            $unit_param_data = " and sp.id = '" . $search["spesialisasi"] . "' ";
        }

        $select = " SELECT * ";

        $count  = "select count(*) as count ";
        $sql    = "FROM sm_spesialisasi
                   where kode in ('BED', 'BDM', 'BSY', 'MAT', 'OBG', 'ORT', 'THT', 'URO') 
                   $unit_param 
                   group by id, nama
                   order by nama asc";
        // $group_by = " GROUP BY b.id, b.id_golongan, b.nama_lengkap, b.harga_satuan, b.kategori ";
        // $order = " ORDER BY b.nama_lengkap asc ";

        $query = $this->db->query($select . $sql . $limitation)->result();
        $periode = $this->formatPeriodeLaporan($search);

        $filter = "";
        if ($search["periode_laporan"] === "Harian" && !empty($search["tanggal_harian"])) {
            $tanggal = date2mysql($search['tanggal_harian']);
            $filter = " AND to_char(%s.waktu, 'yyyy-mm-dd') ILIKE '%$tanggal%' ";
        } elseif ($search["periode_laporan"] === "Bulanan" && !empty($search["bulan"]) && !empty($search["tahun"])) {
            $filter = " AND to_char(%s.waktu, 'mm/yyyy') = '" . $search["bulan"] . "/" . $search["tahun"] . "' ";
        } elseif ($search["periode_laporan"] === "Rentang Waktu" && !empty($search["tanggal_awal"]) && !empty($search["tanggal_akhir"])) {
            $awal = date2mysql($search['tanggal_awal']);
            $akhir = date2mysql($search['tanggal_akhir']);
            $filter = " AND %s.waktu BETWEEN '$awal 00:00:00' AND '$akhir 23:59:59' ";
        }

        // Bentuk parameter berdasarkan alias
        $param_jko   = sprintf($filter, 'jko');
        $param_jko2  = sprintf($filter, 'jko2');
        $param_jko3  = sprintf($filter, 'jko3');

        $select_data = " select sum(case when jko.timing = 'Terjadwal' then 1 else 0 end) as elektif, 
                    sum(case when jko.timing = 'Emergency' then 1 else 0 end) as cito, 
                    COUNT(*) as total_pasien, COUNT(*) as total_tindakan, ";

        $sub_query_data = " ( SELECT COUNT(*)
                                FROM sm_tarif_operasi trf
                                JOIN sm_jadwal_kamar_operasi jko3 ON trf.id_operasi = jko3.id
                                WHERE jko3.status = 'Confirmed'
                                AND jko3.layanan != 'VK'
                                $param_jko3
                            ) as tindakan_lain, ";

        $from_data = " sum(case when jko.klasifikasi = 'Minor' then 1 else 0 end) as kecil, 
                    sum(case when jko.klasifikasi = 'Standard' then 1 else 0 end) as sedang, 
                    sum(case when jko.klasifikasi = 'Mayor' then 1 else 0 end) as besar, 
                    sum(case when jko.klasifikasi = 'Khusus' then 1 else 0 end) as khusus

                    from sm_jadwal_kamar_operasi jko
                    join sm_tim_operasi top on (jko.id = top.id_jadwal_operasi and top.status = 'Dokter Operator')
                    join sm_tenaga_medis tm on top.id_nadis = tm.id
                    join sm_spesialisasi sp on tm.id_spesialisasi = sp.id

                    where jko.status = 'Confirmed'
                    and jko.layanan != 'VK' 
                    $unit_param_data
                    $param_jko ";
        $query_sum = $this->db->query($select_data . $sub_query_data . $from_data)->row();

        $result = $query;
        $sumTotalTindakan = 0;
        foreach ($result as $i => $val) :
            $sub_query_data_sum = "  
                        ( SELECT COUNT(*)
                            FROM sm_tarif_operasi trf
                            JOIN sm_jadwal_kamar_operasi jko3 ON trf.id_operasi = jko3.id
                            join sm_tim_operasi top on (jko3.id = top.id_jadwal_operasi and top.status = 'Dokter Operator')
                            join sm_tenaga_medis tm on trf.id_nadis = tm.id
                            join sm_spesialisasi sp on tm.id_spesialisasi = sp.id
                            WHERE jko3.status = 'Confirmed'
                            AND jko3.layanan != 'VK'
                            AND sp.id = '$val->id' 
                            $param_jko3
                        ) as tindakan_lain, ";

            $sql_data = $select_data . $sub_query_data_sum . $from_data;
            $query_data = $this->db->query($sql_data . " and sp.id = '" . $val->id . "' ")->row();
            $totalTindakan = $query_data->total_tindakan ?? 0;

            $sumTotalTindakan += $query_data->tindakan_lain ?: 0;

            $result[$i]->elektif = $query_data->elektif ?? 0;
            $result[$i]->cito = $query_data->cito ?? 0;
            $result[$i]->total_pasien = $query_data->total_pasien ?? 0;
            $result[$i]->total_tindakan = $totalTindakan;
            $result[$i]->tindakan_lain = $query_data->tindakan_lain ?: 0;
            $result[$i]->kecil = $query_data->kecil ?? 0;
            $result[$i]->sedang = $query_data->sedang ?? 0;
            $result[$i]->besar = $query_data->besar ?? 0;
            $result[$i]->khusus = $query_data->khusus ?? 0;

        endforeach;
        $query_sum->tindakan_lain = $sumTotalTindakan;

        $data["periode"] = $periode;
        $data["data"]    = $query;
        $data["sum"]    = $query_sum;
        $data["jumlah"]  = $this->db->query($count . $sql)->row()->count ?? 0;
        $this->db->close();

        return $data;
    }

    public function getLaporanAnastesiOK($limit, $start, $search)
    {
        $limitation = "";
        if ($limit !== 0) :
            $limitation = " limit " . $limit . " offset " . $start;
        endif;

        $unit_param = "";
        if ($search["id_dokter"] !== "") {
            $unit_param = " and tm.id = '" . $search["id_dokter"] . "' ";
        }

        $select = " SELECT tm.id, pg.nama ";

        $count  = "select count(*) as count ";
        $sql    = " FROM sm_tenaga_medis tm
                   JOIN sm_pegawai pg on tm.id_pegawai = pg.id
                   JOIN sm_translucent tr on pg.id = tr.id
                   WHERE tr.id_account_group = '93' 
                   $unit_param ";
        $order = " ORDER BY pg.nama asc ";

        $result = $this->db->query($select . $sql . $order . $limitation)->result();
        $periode = $this->formatPeriodeLaporan($search);

        $tanggal_pembanding = '2025-05-01';
        $tanggal_cek = null;
        $param_data = "";
        if ($search["periode_laporan"] === "Harian") {
            if ($search["tanggal_harian"] !== "") :
                $param_data = " and to_char( jko.waktu, 'yyyy-mm-dd' ) ilike '%" . date2mysql($search['tanggal_harian']) . "' ";
                $tanggal_cek = date2mysql($search["tanggal_harian"]);
            endif;
        } elseif ($search["periode_laporan"] === "Bulanan" & $search["bulan"] !== "" & $search["tahun"] !== "") {
            $param_data = " and to_char( jko.waktu, 'mm/yyyy' ) = '" . $search["bulan"] . "/" . $search["tahun"] . "' ";
            $tanggal_cek = $search["tahun"] . '-' . str_pad($search["bulan"], 2, '0', STR_PAD_LEFT) . '-01';
        } elseif ($search["periode_laporan"] === "Rentang Waktu" & $search["tanggal_awal"] !== "" & $search["tanggal_akhir"] !== "") {
            if ($search["tanggal_awal"] !== "" & $search["tanggal_akhir"] !== "") :
                $param_data = " and jko.waktu BETWEEN '" . date2mysql($search['tanggal_awal']) . " 00:00:00' AND '" . date2mysql($search['tanggal_akhir']) . " 23:59:59'";
                $tanggal_cek = date2mysql($search["tanggal_awal"]);
            endif;
        }

        $field_general = "lo.jenis_anestesi";
        if ($tanggal_cek && $tanggal_cek >= $tanggal_pembanding) {
            $field_general = "jko.jenis_anastesi"; // gunakan field baru jika >= Mei 2025
        }

        $sum_general = 0;
        $sum_regional = 0;
        $sum_lokal = 0;
        $sum_total_pasien = 0;
        foreach ($result as $i => $val) :
            $query_sum = " SELECT 
                        SUM ( CASE WHEN $field_general = 'General' THEN 1 ELSE 0 END ) AS general,
                        SUM ( CASE WHEN $field_general = 'Regional' THEN 1 ELSE 0 END ) AS regional,
                        SUM ( CASE WHEN $field_general = 'Lokal' THEN 1 ELSE 0 END ) AS lokal,
                        
                        COUNT ( * ) AS total_pasien
                        
                        FROM sm_jadwal_kamar_operasi jko
                        JOIN sm_tim_operasi top ON jko.ID = top.id_jadwal_operasi
                        JOIN sm_tenaga_medis tm ON top.id_nadis = tm.ID 
                        JOIN sm_laporan_operasi lo ON jko.id_layanan_pendaftaran = lo.id_layanan_pendaftaran
                        
                        WHERE jko.status = 'Confirmed' 
                        AND jko.layanan != 'VK' 
                        $param_data 
                        AND tm.id = '$val->id' ";

            $sql_data = $this->db->query($query_sum)->row();

            $result[$i]->general = $sql_data->general ?? 0;
            $result[$i]->regional = $sql_data->regional ?? 0;
            $result[$i]->lokal = $sql_data->lokal ?? 0;
            $result[$i]->total_pasien = $sql_data->total_pasien ?? 0;

            $sum_general += $sql_data->general ?? 0;
            $sum_regional += $sql_data->regional ?? 0;
            $sum_lokal += $sql_data->lokal ?? 0;
            $sum_total_pasien += $sql_data->total_pasien ?? 0;
        endforeach;

        $arraySum = array(
            'general' => $sum_general,
            'regional' => $sum_regional,
            'lokal' => $sum_lokal,
            'total_pasien' => $sum_total_pasien,
        );

        $data["periode"] = $periode;
        $data["data"]    = $result;
        $data["sum"]    = $arraySum;
        $data["jumlah"]  = $this->db->query($count . $sql)->row()->count ?? 0;
        $this->db->close();

        return $data;
    }

    private function sumTindakan($param_jko3, $id_nadis)
    {
        $query_sum = " SELECT COUNT(*)
                    FROM sm_tarif_operasi trf
                    JOIN sm_jadwal_kamar_operasi jko3 ON trf.id_operasi = jko3.id
                    join sm_tim_operasi top on (jko3.id = top.id_jadwal_operasi and top.status = 'Dokter Operator')
                    join sm_tenaga_medis tm on top.id_nadis = tm.id
                    join sm_spesialisasi sp on tm.id_spesialisasi = sp.id
                    WHERE jko3.status = 'Confirmed'
                    AND jko3.layanan != 'VK'
                    AND trf.id_nadis IS NULL 
                    AND top.id_nadis = '$id_nadis' 
                    $param_jko3 ";

        return $this->db->query($query_sum)->row()->count ?? 0;
    }

    public function getLaporanRekapOperasi($limit, $start, $search)
    {
        $param = "";
        $query      = "";
        $limitation = "";
        if ($limit !== 0) :
            $limitation = " limit " . $limit . " offset " . $start;
        endif;

        $unit_param = "";
        $unit_param_data = "";
        if ($search["spesialisasi"] !== "") {
            $unit_param = " and id = '" . $search["spesialisasi"] . "' ";
            $unit_param_data = " and sp.id = '" . $search["spesialisasi"] . "' ";
        }

        $select_master = "SELECT sp.id, concat('Spesialis ', sp.nama) spesialisasi
                        FROM sm_spesialisasi sp 
                        WHERE sp.kode IN ( 'BED', 'BDM', 'BSY', 'MAT', 'OBG', 'ORT', 'THT', 'URO' )  
                        ORDER BY sp.nama ASC ";

        $select = " SELECT tm.id, tr.id as id_pegawai, sp.id as id_spesialis, pg.nama as nama_dokter, sp.nama spesialisasi ";

        $count  = "select count(*) as count ";
        $sql    = "FROM sm_spesialisasi sp
                JOIN sm_tenaga_medis tm ON sp.id = tm.id_spesialisasi
                JOIN sm_pegawai pg ON tm.id_pegawai = pg.id
                JOIN sm_translucent tr ON pg.id = tr.id

                WHERE sp.kode IN ( 'BED', 'BDM', 'BSY', 'MAT', 'OBG', 'ORT', 'THT', 'URO' )  
                AND tm.id_profesi = '10'
                AND tr.is_active = '1' ";
        // $group_by = " GROUP BY b.id, b.id_golongan, b.nama_lengkap, b.harga_satuan, b.kategori ";
        $order = " ORDER BY sp.nama ASC ";

        $result_master = $this->db->query($select_master)->result();
        $query = $this->db->query($select . $sql . $order . $limitation)->result();
        $periode = $this->formatPeriodeLaporan($search);

        foreach ($result_master as $i => $val) {
            foreach ($query as $value) {
                if ($val->id == $value->id_spesialis) {
                    if (!isset($result_master[$i]->list)) {
                        $result_master[$i]->list = [];
                    }
                    $result_master[$i]->list[] = $value;
                }
            }
        }

        $filter = "";
        if ($search["periode_laporan"] === "Harian" && !empty($search["tanggal_harian"])) {
            $tanggal = date2mysql($search['tanggal_harian']);
            $filter = " AND to_char(%s.waktu, 'yyyy-mm-dd') ILIKE '%$tanggal%' ";
        } elseif ($search["periode_laporan"] === "Bulanan" && !empty($search["bulan"]) && !empty($search["tahun"])) {
            $filter = " AND to_char(%s.waktu, 'mm/yyyy') = '" . $search["bulan"] . "/" . $search["tahun"] . "' ";
        } elseif ($search["periode_laporan"] === "Rentang Waktu" && !empty($search["tanggal_awal"]) && !empty($search["tanggal_akhir"])) {
            $awal = date2mysql($search['tanggal_awal']);
            $akhir = date2mysql($search['tanggal_akhir']);
            $filter = " AND %s.waktu BETWEEN '$awal 00:00:00' AND '$akhir 23:59:59' ";
        }

        // Bentuk parameter berdasarkan alias
        $param_jko   = sprintf($filter, 'jko');
        $param_jko3  = sprintf($filter, 'jko3');

        $select_data = " select sum(case when jko.timing = 'Terjadwal' then 1 else 0 end) as elektif, 
                    sum(case when jko.timing = 'Emergency' then 1 else 0 end) as cito, 
                    COUNT(*) as total_pasien, COUNT(*) as total_tindakan, ";

        $sub_query_data = " ( SELECT COUNT(*)
                                FROM sm_tarif_operasi trf
                                JOIN sm_jadwal_kamar_operasi jko3 ON trf.id_operasi = jko3.id
                                WHERE jko3.status = 'Confirmed'
                                AND jko3.layanan != 'VK'
                                $param_jko3
                            ) as tindakan_lain, ";

        $from_data = " sum(case when jko.klasifikasi = 'Minor' then 1 else 0 end) as kecil, 
                    sum(case when jko.klasifikasi = 'Standard' then 1 else 0 end) as sedang, 
                    sum(case when jko.klasifikasi = 'Mayor' then 1 else 0 end) as besar, 
                    sum(case when jko.klasifikasi = 'Khusus' then 1 else 0 end) as khusus

                    from sm_jadwal_kamar_operasi jko
                    join sm_tim_operasi top on (jko.id = top.id_jadwal_operasi and top.status = 'Dokter Operator')
                    join sm_tenaga_medis tm on top.id_nadis = tm.id
                    join sm_spesialisasi sp on tm.id_spesialisasi = sp.id

                    where jko.status = 'Confirmed'
                    and jko.layanan != 'VK' 
                    $unit_param_data
                    $param_jko ";
        $query_sum = $this->db->query($select_data . $sub_query_data . $from_data)->row();

        // $result = $query;
        $sumTotalTindakan = 0;
        foreach ($result_master as $i => $val) :
            foreach ($val->list as $value) {

                $sub_query_data_sum = "  
                        ( SELECT COUNT(*)
                            FROM sm_tarif_operasi trf
                            JOIN sm_jadwal_kamar_operasi jko3 ON trf.id_operasi = jko3.id
                            join sm_tim_operasi top on (jko3.id = top.id_jadwal_operasi and top.status = 'Dokter Operator')
                            join sm_tenaga_medis tm on top.id_nadis = tm.id
                            join sm_spesialisasi sp on tm.id_spesialisasi = sp.id
                            WHERE jko3.status = 'Confirmed'
                            AND jko3.layanan != 'VK'
                            AND trf.id_nadis = '$value->id' 
                            $param_jko3
                        ) as tindakan_lain, ";

                $sql_data = $select_data . $sub_query_data_sum . $from_data;
                $query_data = $this->db->query($sql_data . " and tm.id = '" . $value->id . "' ")->row();
                // $totalTindakan = $query_data->total_tindakan ?? 0;
                $totalTindakan = $this->sumTindakan($param_jko3, $value->id);

                $sumTotalTindakan += $query_data->tindakan_lain ?: 0;

                $value->elektif = $query_data->elektif ?? 0;
                $value->cito = $query_data->cito ?? 0;
                $value->total_pasien = $query_data->total_pasien ?? 0;
                $value->tindakan_lain = $query_data->tindakan_lain ?: 0;
                $value->kecil = $query_data->kecil ?? 0;
                $value->sedang = $query_data->sedang ?? 0;
                $value->besar = $query_data->besar ?? 0;
                $value->khusus = $query_data->khusus ?? 0;
                $value->total_tindakan = $totalTindakan;
            }
        endforeach;
        $query_sum->tindakan_lain = $sumTotalTindakan;

        $data["periode"] = $periode;
        $data["data"]    = $result_master;
        $data["sum"]    = $query_sum;
        $data["jumlah"]  = $this->db->query($count . $sql)->row()->count ?? 0;
        $this->db->close();

        return $data;
    }
}
