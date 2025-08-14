<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pelayanan_model extends CI_Model
{


    function __construct()
    {
        parent::__construct();
        $this->date     = date('Y-m-d');
        $this->datetime = date('Y-m-d H:i:s');
    }

    function unit()
    {
        return $this->session->userdata('id_unit');
    }

    function user()
    {
        return $this->session->userdata('id_translucent');
    }

    function pasienName($id_lp)
    {
        return $this->db->query("select ps.nama
                                from sm_layanan_pendaftaran lp
                                join sm_pendaftaran p on (lp.id_pendaftaran = p.id)
                                join sm_pasien ps on (p.id_pasien = ps.id) where lp.id = '" . $id_lp . "'")->row()->nama;
    }

    function getProfilPasien($id_pasien)
    {
        return $this->db->query("select id, 
                    tinggi_badan, berat_badan, 
                    is_died, is_hiv, is_alergi, is_gonorrhea, is_hepatitis, is_kusta, is_tbc, is_potensi_komplain, is_pasien_pejabat, is_pemilik_rs, is_prb,
                    id_master_alergi, keterangan_alergi, id_satset_alergi 
                    from sm_profil_pasien where id_pasien = '" . $id_pasien . "'")->row();
    }

    function getLIS()
    {
        $this->db->select("
            lis.*
        ");
        $this->db->from('sm_akses_lis as lis');
        $this->db->where('lis.id', 1, true);
        return $this->db->get()->row();
    }

    function updateProfilPasien($data, $id)
    {
        $this->db->trans_begin();
        if ($id !== '') :
            $this->db->where('id', $id, true)->update('sm_profil_pasien', $data);
        else :
            $this->db->insert('sm_profil_pasien', $data);
        endif;
        if ($this->db->trans_status() === false) :
            $this->db->trans_rollback();
            return array('status' => false, 'message' => 'Gagal menandai pasien perlakuan khusus');
        else :
            $this->db->trans_commit();
            return array('status' => true, 'message' => 'Berhasil menandai pasien perlakuan khusus');
        endif;
    }

    function generateNoResep()
    {
        $date = substr(date2mysql(safe_get("tanggal")), 0, 7);
        $exp = explode("/", safe_get("tanggal"));
        $row = $this->db->query("select substr(id, 1, 4) as jumlah from sm_resep where date(waktu) = '" . date("Y-m-d") . "' order by waktu desc limit 1")->row();
        if (!isset($row->jumlah)) :
            $str = "0001-" . date("d-m-Y");
        else :
            $str = str_pad((string) ($row->jumlah + 1), 4, "0", STR_PAD_LEFT) . "-" . date("d-m-Y");
        endif;
        return $str;
    }

    function getTindakLanjut()
    {
        return array(
            ""                    => "Pilih",
            "Pulang APS"          => "Pulang Atas Permintaan Sendiri (APS)",
            "Atas Izin Dokter"    => "Atas Izin Dokter",
            "RS Lain"             => "RS Lain / Dirujuk",
            "Melarikan Diri"      => "Melarikan Diri",
            "Rawat Inap"          => "Rawat Inap / MRS",
            "Intensive Care"      => "Intensive Care",
            "IGD"                 => "IGD",
            // "Kebidanan"           => "Kebidanan", 
            "Pemulasaran Jenazah" => "Pemulasaran Jenazah",
        );
    }

    function getAutoNomorPenjualan($q, $start, $limit)
    {
        $limitation = " limit " . $limit . " offset " . $start;
        $count = "select p.id ";
        $select = "select DISTINCT ON (rt.id) p.*, rt.id, p.id as id_penjualan, 
                concat_ws(' ', rt.id, ' - ', ps.id, '', ps.nama) as nama, ps.id as no_rm, 
                r.id_layanan_pendaftaran, lp.jenis_layanan, COALESCE(pj.diskon_barang, '0') as reimburse ";
        $sql = "from sm_penjualan p 
                join sm_resep_tebus rt on (p.id_resep_tebus = rt.id)
                join sm_resep r on (rt.id_resep = r.id)
                left join sm_layanan_pendaftaran lp on (r.id_layanan_pendaftaran = lp.id)
                left join sm_penjamin pj on (lp.id_penjamin = pj.id)
                left join sm_pendaftaran pdf on (lp.id_pendaftaran = pdf.id)
                left join sm_pasien ps on (pdf.id_pasien = ps.id) 
                where rt.id::text ilike ('$q%') or r.id_pasien ilike ('$q%')
                group by r.id, p.id, rt.id, ps.id, ps.nama, r.id_layanan_pendaftaran, lp.jenis_layanan, pj.diskon_barang
                order by rt.id asc";
        $data["data"] = $this->db->query($select . $sql . $limitation)->result();
        $data["total"] = $this->db->query($count . $sql)->num_rows();
        return $data;
    }

    function simpanTindakanPemeriksaan($id_layanan_pendaftaran, $data, $jenis_pelayanan, $user = null)
    {
        $this->db->select('lp.*, pj.diskon')->from('sm_layanan_pendaftaran as lp')->join('sm_penjamin as pj', 'pj.id = lp.id_penjamin', 'left')->where('lp.id', $id_layanan_pendaftaran);
        $layanan_pendaftaran = $this->db->get()->row();
        $id_mcu              = NULL;
        if (!empty($data['id_mcu'])) {
            $id_mcu = $data['id_mcu'];
        }

        if ($layanan_pendaftaran) {
            if (is_array($data['operator'])) {
                foreach ($data['operator'] as $key => $value) {
                    $id_tarif_pelayanan = $data['tindakan'][$key];
                    $id_tindakan_icd9 = $data['tindakan_icd9'][$key] ?? null ;
                    $qty = $data['qty'][$key];
                    if ($id_tarif_pelayanan !== '' || $id_tarif_pelayanan !== null) {
                        $komponen = $this->db->where('id', $id_tarif_pelayanan)->get('sm_tarif_pelayanan')->row();
                        if ($komponen) :
                            // Cek apakah tarif dijamin oleh penjamin ?
                            // Hitung reimburse
                            $penjamin = NULL;
                            if ($layanan_pendaftaran->id_penjamin !== null) :
                                $penjamin = $layanan_pendaftaran->id_penjamin;
                                $reimburse = ((int)$layanan_pendaftaran->diskon / 100) * (int)$komponen->total;
                            else :
                                $reimburse = 0;
                            endif;

                            $update = [
                                'id_layanan_pendaftaran' => $id_layanan_pendaftaran,
                                'tanggal' => $this->datetime,
                                'id_operator'            => ($value !== '') ? $value : NULL,
                                'id_penjamin'            => $penjamin,
                                'no_polish'              => $layanan_pendaftaran->no_polish,
                                'id_tarif_pelayanan'     => $id_tarif_pelayanan,
                                'jasa_klinik'            => $komponen->jasa_klinik,
                                'jasa_medis'             => $komponen->jasa_nadis,
                                'bobot'                  => $komponen->bobot,
                                'bhp'                    => $komponen->bhp,
                                'total'                  => $komponen->total,
                                'reimburse'              => $reimburse,
                                'id_user'                => ($user !== null) ? $user : $this->user()
                            ];

                            if ($jenis_pelayanan == 'Rawat Inap') :
                                $jenis_transaksi = 'Rawat Inap';
                                $update['jenis_transaksi'] = 'Rawat Inap';
                            elseif ($jenis_pelayanan == 'Intensive Care') :
                                $jenis_transaksi = 'Intensive Care';
                                $update['jenis_transaksi'] = 'Intensive Care';
                            elseif ($jenis_pelayanan == 'IGD') :
                                $jenis_transaksi = 'IGD';
                                $update['jenis_transaksi'] = 'IGD';
                            elseif ($jenis_pelayanan == 'Rawat Jalan') :
                                $jenis_transaksi = 'Tindakan';
                                $update['jenis_transaksi'] = 'Tindakan';
                            elseif ($jenis_pelayanan == 'Pemulasaran Jenazah') :
                                $jenis_transaksi = 'Pemulasaran Jenazah';
                                $update['jenis_transaksi'] = 'Pemulasaran Jenazah';
                            elseif ($jenis_pelayanan == 'MCU') :
                                $jenis_transaksi = 'MCU';
                                $update['jenis_transaksi'] = 'MCU';
                            else :
                                // Pendaftaran
                                $jenis_transaksi = 'Pendaftaran';
                                $update['is_pendaftaran'] = 'Ya';
                                $update['jenis_transaksi'] = 'Pendaftaran';
                            endif;

                            $update['id_mcu'] = $id_mcu;
                            if ($id_tindakan_icd9 != '') {
                                $update['id_icd9'] = $id_tindakan_icd9;
                            }
                            for ($i = 0; $i < $qty; $i++) :
                                $this->db->insert('sm_tarif_tindakan_pasien', $update);
                                $this->updateListPembayaranTindakan($layanan_pendaftaran->id_pendaftaran, $id_layanan_pendaftaran, $id_layanan_pendaftaran, $jenis_transaksi, $komponen->total, $reimburse);
                            endfor;
                            $this->setBelumLunas($layanan_pendaftaran->id_pendaftaran);
                        endif;
                    }
                }
            }
            if (!is_array($data['operator'])) {
                $operator = $data['operator'];
                $tindakan = $data['tindakan'];
                $qty = $data['qty'];

                $id_tarif_pelayanan = isset($tindakan) ? $tindakan : null;
                if ($id_tarif_pelayanan !== '') {
                    $qty = isset($qty) ? $qty : null;
                    $komponen = $this->db->where('id', $id_tarif_pelayanan)->get('sm_tarif_pelayanan')->row();
                    if ($komponen) {
                        // Cek apakah tarif dijamin oleh penjamin ?
                        // Hitung reimburse
                        $penjamin = NULL;
                        if ($layanan_pendaftaran->id_penjamin !== null) {
                            $penjamin = $layanan_pendaftaran->id_penjamin;
                            $reimburse = ((int)$layanan_pendaftaran->diskon / 100) * (int)$komponen->total;
                        } else {
                            $reimburse = 0;
                        }

                        $update = [
                            'id_layanan_pendaftaran' => $id_layanan_pendaftaran,
                            'tanggal'                => $this->datetime,
                            'id_operator'            => ($data['operator'] !== '') ? $data['operator'] : NULL,
                            'id_penjamin'            => $penjamin,
                            'no_polish'              => $layanan_pendaftaran->no_polish,
                            'id_tarif_pelayanan'     => $id_tarif_pelayanan,
                            'jasa_klinik'            => $komponen->jasa_klinik,
                            'jasa_medis'             => $komponen->jasa_nadis,
                            'bobot'                  => $komponen->bobot,
                            'bhp'                    => $komponen->bhp,
                            'total'                  => $komponen->total,
                            'reimburse'              => $reimburse,
                            'id_user'                => ($user !== null) ? $user : $this->user()
                        ];
                        if ($jenis_pelayanan == 'Rawat Inap') {
                            $jenis_transaksi = 'Rawat Inap';
                            $update['jenis_transaksi'] = 'Rawat Inap';
                        } elseif ($jenis_pelayanan == 'Intensive Care') {
                            $jenis_transaksi = 'Intensive Care';
                            $update['jenis_transaksi'] = 'Intensive Care';
                        } elseif ($jenis_pelayanan == 'IGD') {
                            $jenis_transaksi = 'IGD';
                            $update['jenis_transaksi'] = 'IGD';
                        } elseif ($jenis_pelayanan == 'Rawat Jalan') {
                            $jenis_transaksi = 'Tindakan';
                            $update['jenis_transaksi'] = 'Tindakan';
                        } elseif ($jenis_pelayanan == 'Pemulasaran Jenazah') {
                            $jenis_transaksi = 'Pemulasaran Jenazah';
                            $update['jenis_transaksi'] = 'Pemulasaran Jenazah';
                        } elseif ($jenis_pelayanan == 'MCU') {
                            $jenis_transaksi = 'MCU';
                            $update['jenis_transaksi'] = 'MCU';
                        } else {
                            // Pendaftaran
                            $jenis_transaksi = 'Pendaftaran';
                            $update['is_pendaftaran'] = 'Ya';
                            $update['jenis_transaksi'] = 'Pendaftaran';
                        }

                        for ($i = 0; $i < $qty; $i++) {
                            $this->db->insert('sm_tarif_tindakan_pasien', $update);
                            $this->updateListPembayaranTindakan($layanan_pendaftaran->id_pendaftaran, $id_layanan_pendaftaran, $id_layanan_pendaftaran, $jenis_transaksi, $komponen->total, $reimburse);
                        }
                        $this->setBelumLunas($layanan_pendaftaran->id_pendaftaran);
                    }
                }
            }
        }
    }

    function updateResumeKeperawatan($resume_keperawatan)
    {
        $this->db->trans_begin();

        $resume_keperawatan['created_date'] = $this->datetime;

        $this->db->insert('sm_resume_keperawatan', $resume_keperawatan);

        if ($this->db->trans_status() === false) :
            $this->db->trans_rollback();
            $status = false;
            $message = 'Gagal menambahkan resume keperawatan pasien';
        else :
            $this->db->trans_commit();
            $status = true;
            $message = 'Berhasil menambahkan resume keperawatan pasien';
        endif;


        return array('status' => $status, 'message' => $message);
    }

    function updatePengkajianLanjutan($pengkajian_lanjutan)
    {
        $this->db->trans_begin();

        $pengkajian_lanjutan['created_date'] = $this->datetime;

        $this->db->insert('sm_spiritual_pasien', $pengkajian_lanjutan);

        if ($this->db->trans_status() === false) :
            $this->db->trans_rollback();
            $status = false;
            $message = 'Gagal menambahkan pengkajian lanjutan spiritual pasien';
        else :
            $this->db->trans_commit();
            $status = true;
            $message = 'Berhasil menambahkan pengkajian lanjutan spiritual pasien';
        endif;


        return array('status' => $status, 'message' => $message);
    }

    function updateSurveilans($surveilans)
    {
        $this->db->trans_begin();

        $surveilans['created_date'] = $this->datetime;

        $this->db->insert('sm_surveilans', $surveilans);

        if ($this->db->trans_status() === false) :
            $this->db->trans_rollback();
            $status = false;
            $message = 'Gagal menambahkan Surveilans pasien';
        else :
            $this->db->trans_commit();
            $status = true;
            $message = 'Berhasil menambahkan Surveilans pasien';
        endif;


        return array('status' => $status, 'message' => $message);
    }

    function updateJadwalKontrolKeperawatan($data)
    {
        if (is_array($data['tanggal'])) :
            foreach ($data['tanggal'] as $i => $value) :
                $data_kontrol = array(
                    'id_layanan_pendaftaran' => $data['id_layanan_pendaftaran'],
                    'tanggal' => $value,
                    'id_ek_nama_dokter' => $data['id_ek_nama_dokter'][$i],
                    'tempat_kontrol' => $data['tempat_kontrol'][$i],
                    'user' => $data['user'][$i],
                    'created_date' => $this->datetime,
                );

                $this->db->insert('sm_jadwal_kontrol_keperawatan', $data_kontrol);
            endforeach;
        endif;
    }


    function updateTerapiPulang($data)
    {
        if (is_array($data['obat'])) :
            foreach ($data['obat'] as $i => $value) :
                $data_terapi = array(
                    'id_layanan_pendaftaran' => $data['id_layanan_pendaftaran'],
                    'obat' => $value,
                    'jumlah_obat' => $data['jumlah_obat'][$i],
                    'dosis' => $data['dosis'][$i],
                    'frekuensi' => $data['frekuensi'][$i],
                    'cara_pemberian' => $data['cara_pemberian'][$i],
                    'ek_jam_pemberian' => $data['ek_jam_pemberian'][$i],
                    'ek_jam_pemberian_satu' => $data['ek_jam_pemberian_satu'][$i],
                    'ek_jam_pemberian_dua' => $data['ek_jam_pemberian_dua'][$i],
                    'ek_jam_pemberian_tiga' => $data['ek_jam_pemberian_tiga'][$i],
                    'ek_jam_pemberian_empat' => $data['ek_jam_pemberian_empat'][$i],
                    'ek_jam_pemberian_lima' => $data['ek_jam_pemberian_lima'][$i],
                    'petunjuk_khusus' => $data['petunjuk_khusus'][$i],
                    'id_users' => $data['id_users'][$i],
                    'created_date' => $data['created_date'][$i],
                );

                $this->db->insert('sm_terapi_pulang', $data_terapi);
            endforeach;
        endif;
    }

   

    function updatePemantauanUlang($data)
    {
        if (is_array($data['tindakan_petugas'])) :
            foreach ($data['tindakan_petugas'] as $i => $value) :
                $data_pemantauan = array(
                    'id_layanan_pendaftaran' => $data['id_layanan_pendaftaran'],
                    'tindakan_petugas' => $value,
                    'skor_nyeri' => $data['skor_nyeri'][$i],
                    'tanggal_pemantauan' => $data['tanggal_pemantauan'][$i],
                    'created_date' => $data['created_date'][$i],
                    'id_users' => $data['id_users'][$i],
                );

                $this->db->insert('sm_pemantauan_nyeri', $data_pemantauan);
            endforeach;
        endif;
    }

    function updateBuktiVisit($data)
    {
        if (is_array($data['id_dokter_visit'])) :
            foreach ($data['id_dokter_visit'] as $i => $value) :
                $data_bukti_vist = array(
                    'id_layanan_pendaftaran' => $data['id_layanan_pendaftaran'],
                    'id_dokter_visit' => $value,
                    'keterangan_visit' => $data['keterangan_visit'][$i],
                    'tanggal_waktu_visit' => $data['tanggal_waktu_visit'][$i],
                    'created_date' => $data['created_date'][$i],
                    'id_users' => $data['id_users'][$i],
                );

                $this->db->insert('sm_bukti_visit_dokter', $data_bukti_vist);
            endforeach;
        endif;
    }

    // function updateCatatanPagi($data)
    // {
    //     if (is_array($data['dpjp_utama_pagi'])) :

    //         foreach ($data['dpjp_utama_pagi'] as $i => $value) :

    //             $catatan_operan_perawat_pagi = array(
    //                 'id_layanan_pendaftaran' => $data['id_layanan_pendaftaran'],
    //                 'operan_diagnosa_keperawatan' => $data['operan_diagnosa_keperawatan'],
    //                 'dpjp_utama_pagi'   => $value,
    //                 'konsulen_pagi'   => $data['konsulen_pagi'][$i] == '' ? NULL : $data['konsulen_pagi'][$i],
    //                 'tanggal_waktu_pagi' => $data['tanggal_waktu_pagi'][$i],
    //                 'diagnosa_keperawatan_pagi' => $data['diagnosa_keperawatan_pagi'],
    //                 'infus_pagi' => $data['infus_pagi'][$i],
    //                 'rencana_tindakan_pagi' => $data['rencana_tindakan_pagi'][$i],
    //                 'perawat_mengover_pagi' => $data['perawat_mengover_pagi'][$i],
    //                 'perawat_menerima_pagi' => $data['perawat_menerima_pagi'][$i],
    //                 'id_users' => $data['id_users'][$i],
    //             );

    //             $this->db->insert('sm_catatan_operan_perawat_pagi', $catatan_operan_perawat_pagi);
    //         endforeach;
    //     endif;
    // }

    // function updateCatatanSore($data)
    // {
    //     if (is_array($data['dokter_dpjp_sore'])) :
    //         foreach ($data['dokter_dpjp_sore'] as $i => $value) :
    //             $catatan_operan_perawat_sore = array(
    //                 'id_layanan_pendaftaran' => $data['id_layanan_pendaftaran'],
    //                 'dokter_dpjp_sore' => $value,
    //                 'konsulen_sore'   => $data['konsulen_sore'][$i] == '' ? NULL : $data['konsulen_sore'][$i],
    //                 'tanggal_waktu_sore' => $data['tanggal_waktu_sore'][$i],
    //                 'diagnosa_keperawatan_sore' => $data['diagnosa_keperawatan_sore'][$i],
    //                 'infus_sore' => $data['infus_sore'][$i],
    //                 'rencana_tindakan_sore' => $data['rencana_tindakan_sore'][$i],
    //                 'perawat_mengover_sore' => $data['perawat_mengover_sore'][$i],
    //                 'perawat_menerima_sore' => $data['perawat_menerima_sore'][$i],
    //                 'id_users' => $data['id_users'][$i],
    //             );


    //             $this->db->insert('sm_catatan_operan_perawat_sore', $catatan_operan_perawat_sore);
    //         endforeach;
    //     endif;
    // }

    // function updateCatatanMalam($data)
    // {
    //     if (is_array($data['dokter_dpjp_malam'])) :

    //         foreach ($data['dokter_dpjp_malam'] as $i => $value) :

    //             $catatan_operan_perawat_malam = array(
    //                 'id_layanan_pendaftaran' => $data['id_layanan_pendaftaran'],
    //                 'dokter_dpjp_malam' => $value,
    //                 'konsulen_malam'   => $data['konsulen_malam'][$i] == '' ? NULL : $data['konsulen_malam'][$i],
    //                 'tanggal_waktu_malam' => $data['tanggal_waktu_malam'][$i],
    //                 'diagnosa_keperawatan_malam' => $data['diagnosa_keperawatan_malam'][$i],
    //                 'infus_malam' => $data['infus_malam'][$i],
    //                 'rencana_tindakan_malam' => $data['rencana_tindakan_malam'][$i],
    //                 'perawat_mengover_malam' => $data['perawat_mengover_malam'][$i],
    //                 'perawat_menerima_malam' => $data['perawat_menerima_malam'][$i],
    //                 'id_users' => $data['id_users'][$i],
    //             );

    //             $this->db->insert('sm_catatan_operan_perawat_malam', $catatan_operan_perawat_malam);
    //         endforeach;
    //     endif;
    // }

 

    function updatePemantauanSholat($data)
    {
        if (is_array($data['tanggal_pemantauan'])) :
            foreach ($data['tanggal_pemantauan'] as $i => $value) :
                $data_pemantauan = array(
                    'id_layanan_pendaftaran' => $data['id_layanan_pendaftaran'],
                    'sholat_subuh' => $data['sholat_subuh'][$i],
                    'sholat_dzuhur' => $data['sholat_dzuhur'][$i],
                    'sholat_ashar' => $data['sholat_ashar'][$i],
                    'sholat_maghrib' => $data['sholat_maghrib'][$i],
                    'sholat_subuh' => $data['sholat_subuh'][$i],
                    'sholat_isya' => $data['sholat_isya'][$i],
                    'petugas_pemantau' => $data['petugas_pemantau'][$i],
                    'tanggal_pemantauan' => $value,
                    'created_date' => $this->datetime,
                    'user_pantau' => $data['user_pantau'][$i],
                );

                $this->db->insert('sm_pemantauan_sholat', $data_pemantauan);
            endforeach;
        endif;
    }

    function updateRuangRawat($data)
    {
        if (is_array($data['ruang_rawat'])) :
            foreach ($data['ruang_rawat'] as $i => $value) :
                $data_ruang = array(
                    'id_layanan_pendaftaran' => $data['id_layanan_pendaftaran'],
                    // 'ruang_rawat' => $value,
                    'ruang_rawat_text' => $value,
                    'tanggal_mulai' => $data['tanggal_mulai'][$i],
                    // 'tanggal_selesai' => $data['tanggal_selesai'][$i],
                    'created_date' => $this->datetime,
                    'user' => $data['user'][$i],
                );

                if (!empty($data['tanggal_selesai'][$i])) {
                    $data_ruang['tanggal_selesai'] = $data['tanggal_selesai'][$i];
                }

                $this->db->insert('sm_ruang_rawat', $data_ruang);
            endforeach;
        endif;
    }

    function updatePemasanganAlat($data)
    {
        if (is_array($data['sirs_tindakan'])) :
            foreach ($data['sirs_tindakan'] as $i => $value) :

                if ($data['sirs_perawat_lepas'][$i] !== '') {

                    $data_ruang['sirs_perawat_lepas'] = $data['sirs_perawat_lepas'][$i];
                }

                $data_ruang = array(
                    'id_layanan_pendaftaran' => $data['id_layanan_pendaftaran'],
                    'sirs_tindakan' => $value,
                    'sirs_tanggal_pasang' => $data['sirs_tanggal_pasang'][$i],
                    'sirs_lokasi' => $data['sirs_lokasi'][$i],
                    'sirs_alasan_pasang' => $data['sirs_alasan_pasang'][$i],
                    'sirs_perawat_pasang' => $data['sirs_perawat_pasang'][$i],
                    // 'sirs_tanggal_lepas' => $data['sirs_tanggal_lepas'][$i],
                    // 'sirs_alasan_lepas' => $data['sirs_alasan_lepas'][$i],
                    // 'sirs_perawat_lepas' => $data['sirs_perawat_lepas'][$i],
                    'created_date' => $this->datetime,
                    'sirs_pemasang_alat' => $data['sirs_pemasang_alat'][$i],
                );

                // Edit perubahan
                if (!empty($data['sirs_tanggal_lepas'][$i])) {
                    $data_ruang['sirs_tanggal_lepas'] = $data['sirs_tanggal_lepas'][$i];
                }
                if (!empty($data['sirs_alasan_lepas'][$i])) {
                    $data_ruang['sirs_alasan_lepas'] = $data['sirs_alasan_lepas'][$i];
                }
                if (!empty($data['sirs_perawat_lepas'][$i])) {
                    $data_ruang['sirs_perawat_lepas'] = $data['sirs_perawat_lepas'][$i];
                }

                $this->db->insert('sm_pemasangan_alat', $data_ruang);
            endforeach;
        endif;
    }

    function updateAntibiotika($data)
    {
        if (is_array($data['sirs_antibiotik'])) :
            foreach ($data['sirs_antibiotik'] as $i => $value) :
                $data_antibiotika = array(
                    'id_layanan_pendaftaran' => $data['id_layanan_pendaftaran'],
                    'sirs_antibiotik' => $value,
                    'sirs_dosis_antibiotik' => $data['sirs_dosis_antibiotik'][$i],
                    'sirs_tanggal_pemberian' => $data['sirs_tanggal_pemberian'][$i],
                    'sirs_tanggal_selesai' => $data['sirs_tanggal_selesai'][$i],
                    'sirs_teknik_antibiotik' => $data['sirs_teknik_antibiotik'][$i],
                    'sirs_petugas_antibiotik' => $data['sirs_petugas_antibiotik'][$i],
                    'created_date' => $this->datetime,
                );

                $this->db->insert('sm_pemakaian_antibiotika', $data_antibiotika);
            endforeach;
        endif;
    }

    function updateListPembayaranTindakan($id_pendaftaran, $id, $id_layanan, $jenis_transaksi, $total, $reimburse)
    {
        // Cek apakah pasien sudah ada data pembayaran
        if ($jenis_transaksi === 'Tindakan') :
            $id_ = 'id_layanan_pendaftaran';
        elseif ($jenis_transaksi === 'IGD') :
            $id_ = 'id_layanan_pendaftaran';
        elseif ($jenis_transaksi === 'Pemulasaran Jenazah') :
            $id_ = 'id_layanan_pendaftaran';
        elseif ($jenis_transaksi === 'MCU') :
            $id_ = 'id_layanan_pendaftaran';
        elseif ($jenis_transaksi === 'Laboratorium') :
            $id_ = 'id_laboratorium';
        elseif ($jenis_transaksi === 'Radiologi') :
            $id_ = 'id_radiologi';
        elseif ($jenis_transaksi === 'Fisioterapi') :
            $id_ = 'id_fisioterapi';
        elseif ($jenis_transaksi === 'Rawat Inap') :
            $id_ = 'id_layanan_pendaftaran';
        elseif ($jenis_transaksi === 'Intensive Care') :
            $id_ = 'id_layanan_pendaftaran';
        elseif ($jenis_transaksi === 'Barang') :
            $id_ = 'id_penjualan';
        elseif ($jenis_transaksi === 'BHP') :
            $id_ = 'id_penjualan';
        elseif ($jenis_transaksi === 'Operasi') :
            $id_ = 'id_operasi';
        elseif ($jenis_transaksi === 'Pendaftaran') :
            $id_ = 'id_layanan_pendaftaran';
        endif;

        $data_pembayaran = $this->db->where([$id_ => $id, 'jenis_transaksi' => $jenis_transaksi])->get('sm_pembayaran')->row();

        if ($data_pembayaran) :
            // Jika ada data update total
            $total_bayar = (int)$data_pembayaran->total;
            $total_bayar += $total;

            $total_reimburse = (int)$data_pembayaran->reimburse;
            $total_reimburse += $reimburse;

            if ($total_bayar > $data_pembayaran->terbayar) :
                $status = 'Tagihan';
            else :
                $status = 'Terbayar';
            endif;

            $update = [
                'total'    => $total_bayar,
                'status'   => $status,
                'reimburse' => $total_reimburse
            ];

            $this->db->where('id', $data_pembayaran->id)->update('sm_pembayaran', $update);
        else :
            // Jika belum ada, entri data pembayaran
            $insert = [
                $id_ => $id,
                'id_pendaftaran'  => $id_pendaftaran,
                'jenis_transaksi' => $jenis_transaksi,
                'total'           => $total,
                'reimburse'        => $reimburse,
            ];

            if ($jenis_transaksi !== 'Tindakan') :
                $insert['id_layanan_pendaftaran'] = $id_layanan;
            endif;

            $this->db->insert('sm_pembayaran', $insert);
        endif;
    }

    function setBelumLunas($id_pendaftaran)
    {
        $update = ['lunas' => 'Belum'];
        $this->db->where('id', $id_pendaftaran)->update('sm_pendaftaran', $update);
    }

    // Anamnesa
    function getAnamnesa($id_layanan_pendaftaran)
    {
        return $this->db->get_where('sm_anamnesa', ['id_layanan_pendaftaran' => $id_layanan_pendaftaran])->result();
        $this->db->close();
    }

    function getAnamnesaOkupasi($id_pendaftaran)
    {
        return $this->db->select("an.*")
            ->from('sm_anamnesa as an')
            ->join('sm_layanan_pendaftaran as lp', 'lp.id = an.id_layanan_pendaftaran')
            ->where('lp.id_pendaftaran', $id_pendaftaran, true)
            ->where('lp.id_unit_layanan', '40')
            ->get()
            ->row();
        $this->db->close();
    }

    function getDataAlergiPasien($id)
    {
        return $this->db->select("pp.*", false)
            ->from('sm_master_alergi as pp')
            ->where('pp.id', (int)$id, true)
            ->get()
            ->row();
        $this->db->close();
    }

    function getAnamnesaMCU($id_pendaftaran)
    {
        return $this->db->select("sa.*")
            ->from('sm_layanan_pendaftaran as lp')
            ->join('sm_pendaftaran as pd', 'pd.id = lp.id_pendaftaran', 'left')
            ->join('sm_anamnesa as sa', 'sa.id_layanan_pendaftaran = lp.id', 'left')
            ->where('pd.id', $id_pendaftaran, true)
            ->where('lp.jenis_layanan', 'Medical Check Up')
            ->order_by('sa.waktu desc')
            ->get()
            ->row();
        $this->db->close();
    }

    function getAnamnesaPoli($id_pendaftaran)
    {
        return $this->db->select("sa.*")
            ->from('sm_layanan_pendaftaran as lp')
            ->join('sm_pendaftaran as pd', 'pd.id = lp.id_pendaftaran', 'left')
            ->join('sm_anamnesa as sa', 'sa.id_layanan_pendaftaran = lp.id', 'left')
            ->where('pd.id', $id_pendaftaran, true)
            ->order_by('sa.waktu desc')
            ->get()
            ->row();
        $this->db->close();
    }

    function getSOAPranap($id_layanan_pendaftaran)
    {
        return $this->db->get_where('sm_soap', ['id_layanan_pendaftaran' => $id_layanan_pendaftaran])->result();
        $this->db->close();
    }

    function getListResumeKeperawatan($limit, $start, $search)
    {
        $where = "";
        $limitation = "";
        if ($limit !== 0) :
            $limitation = " limit " . $limit . " offset " . $start;
        endif;

        if ($search["id_pendaftaran"] !== "") :
            $where .= " and pd.id = '" . $search["id_pendaftaran"] . "' ";
        endif;

        if ($search["keyword"] !== "") :
            $where .= " and lp.jenis_layanan ilike '%" . $search["keyword"] . "%' ";
        endif;

        if ($search["waktu"] !== "") :
            $where .= " and s.waktu BETWEEN '" . $search["waktu"] . " 00:00:00' AND '" . $search["waktu"] . " 23:59:59' ";
        endif;

        $sql  = "select s.*, lp.jenis_layanan, coalesce(bg.nama, '') as bangsal,
                            coalesce(bgic.nama, '') as bangsal_ic,
                            coalesce(ri.no_ruang, '') as no_ruang,
                            coalesce(ri.no_bed, 0) as no_bed,
                            coalesce(ic.no_ruang, '') as no_ruang_ic,
                            coalesce(ic.no_bed, 0) as no_bed_ic, k.nama as kelas,
                            kic.nama as kelas_icare, COALESCE(pg.nama, '') as dokter, COALESCE(ps.nama, '') as perawat_medis
                from sm_resume_keperawatan as s 
                left join sm_layanan_pendaftaran as lp on (lp.id = s.id_layanan_pendaftaran) 
                left join sm_pendaftaran as pd on (pd.id = lp.id_pendaftaran)
                left join sm_rawat_inap as ri on (ri.id_layanan_pendaftaran = lp.id)
                left join sm_intensive_care as ic on (ic.id_layanan_pendaftaran = lp.id)
                left join sm_bangsal as bg on (bg.id = ri.id_bangsal)
                left join sm_bangsal as bgic on (bgic.id = ic.id_bangsal)
                left join sm_kelas as k on (k.id = ri.id_kelas)
                left join sm_kelas as kic on (kic.id = ic.id_kelas)
                left join sm_tenaga_medis as tm on (tm.id = s.id_verifikasi_dokter)
                left join sm_tenaga_medis as tp on (tp.id = s.id_perawat_medis)
                left join sm_pegawai as pg on (pg.id = tm.id_pegawai)
                left join sm_pegawai as ps on (ps.id = tp.id_pegawai)
                where s.id is not null ";
        $order = "order by s.id desc ";
        $data['data'] = $this->db->query($sql . $where . $order . $limitation)->result();
        $data['jumlah'] = $this->db->query($sql . $where)->num_rows();
        return $data;
        $this->db->close();
    }

    function getTrasnferPasien($limit, $start, $search)
    {
        $where = "";
        $limitation = "";
        if ($limit !== 0) :
            $limitation = " limit " . $limit . " offset " . $start;
        endif;

        if ($search["id_pendaftaran"] !== "") :
            $where .= " and pd.id = '" . $search["id_pendaftaran"] . "' ";
        endif;

        if ($search["keyword"] !== "") :
            $where .= " and lp.jenis_layanan ilike '%" . $search["keyword"] . "%' ";
        endif;

        if ($search["waktu"] !== "") :
            $where .= " and tpi.waktu BETWEEN '" . $search["waktu"] . " 00:00:00' AND '" . $search["waktu"] . " 23:59:59' ";
        endif;

        $sql  = "select tpi.*, tpi.id as id_transfer, COALESCE(ga.nama, '') as nama_petugas_transer, COALESCE(ga2.nama, '') as nama_petugas_penerima_transfer, COALESCE(ga3.nama, '') as nama_petugas_transfer_dua, COALESCE(ga4.nama, '') as nama_petugas_penerima_transfer_dua, COALESCE(gadpjp.nama, '') as dpjp
                from sm_transfer_pasien_intra as tpi
                join sm_layanan_pendaftaran as lp on tpi.id_layanan_pendaftaran = lp.id
                left join sm_pendaftaran as pd on pd.id = lp.id_pendaftaran
                left join sm_tenaga_medis as tm on tpi.tpi_kp_petugas_tansfer = tm.id
                left join sm_pegawai as ga on tm.id_pegawai = ga.id
                left join sm_tenaga_medis as tm2 on tpi.tpi_kp_petugas_terima_transfer = tm2.id
                left join sm_pegawai as ga2 on tm2.id_pegawai = ga2.id
                left join sm_tenaga_medis as tm3 on tpi.tpi_st_petugas_tansfer = tm3.id
                left join sm_pegawai as ga3 on tm3.id_pegawai = ga3.id
                left join sm_tenaga_medis as tm4 on tpi.tpi_st_petugas_terima_transfer = tm4.id
                left join sm_pegawai as ga4 on tm4.id_pegawai = ga4.id
                left join sm_tenaga_medis as tmdpjp on tpi.tpi_dpjp = tmdpjp.id
                left join sm_pegawai as gadpjp on tmdpjp.id_pegawai = gadpjp.id
                where tpi.id is not null ";
        $order = "order by tpi.id desc ";
        $data['data'] = $this->db->query($sql . $where . $order . $limitation)->result();
        $data['jumlah'] = $this->db->query($sql . $where)->num_rows();
        return $data;
        $this->db->close();
    }

    function getDetailTrasnferPasien($id)
    {
        // var_dump($id);die;
        $where = "";

        $sql  = "select tpi.*, tpi.id as id_transfer, COALESCE(ga.nama, '') as nama_kp_petugas_tansfer, COALESCE(ga2.nama, '') as nama_kp_petugas_terima_transfer, COALESCE(ga3.nama, '') as nama_st_petugas_tansfer, COALESCE(ga4.nama, '') as nama_st_petugas_terima_transfer, COALESCE(gadpjp.nama, '') as nama_dpjp
                from sm_transfer_pasien_intra as tpi
                join sm_layanan_pendaftaran as lp on tpi.id_layanan_pendaftaran = lp.id
                left join sm_pendaftaran as pd on pd.id = lp.id_pendaftaran
                left join sm_tenaga_medis as tm on tpi.tpi_kp_petugas_tansfer = tm.id
                left join sm_pegawai as ga on tm.id_pegawai = ga.id
                left join sm_tenaga_medis as tm2 on tpi.tpi_kp_petugas_terima_transfer = tm2.id
                left join sm_pegawai as ga2 on tm2.id_pegawai = ga2.id
                left join sm_tenaga_medis as tm3 on tpi.tpi_st_petugas_tansfer = tm3.id
                left join sm_pegawai as ga3 on tm3.id_pegawai = ga3.id
                left join sm_tenaga_medis as tm4 on tpi.tpi_st_petugas_terima_transfer = tm4.id
                left join sm_pegawai as ga4 on tm4.id_pegawai = ga4.id
                left join sm_tenaga_medis as tmdpjp on tpi.tpi_dpjp = tmdpjp.id
                left join sm_pegawai as gadpjp on tmdpjp.id_pegawai = gadpjp.id
                where tpi.id =" . $id;
        $order = "order by tpi.id desc ";
        $data['data'] = $this->db->query($sql . $order)->row();
        $data['jumlah'] = $this->db->query($sql . $where)->num_rows();
        return $data;
        $this->db->close();
    }

    function getResume($id)
    {
        return $this->db->select("s.*, COALESCE(pg.nama, '') as dokter, COALESCE(ps.nama, '') as perawat_medis, lp.tanggal_layanan as tanggal_mrs")
            ->from('sm_resume_keperawatan as s')
            ->join('sm_layanan_pendaftaran as lp', 's.id_layanan_pendaftaran = lp.id', 'left')
            ->join('sm_tenaga_medis as tm', 'tm.id = s.id_verifikasi_dokter', 'left')
            ->join('sm_tenaga_medis as tp', 'tp.id = s.id_perawat_medis', 'left')
            ->join('sm_pegawai as pg', 'pg.id = tm.id_pegawai', 'left')
            ->join('sm_pegawai as ps', 'ps.id = tp.id_pegawai', 'left')
            ->where('s.id', $id, true)
            ->order_by('s.waktu asc')
            ->get()
            ->row();
        $this->db->close();
    }

    function getSpiritualPasien($id_layanan_pendaftaran)
    {
        return $this->db->select("ssp.*, COALESCE(ps.nama, '') as p_terapi")
            ->from('sm_spiritual_pasien as ssp')
            ->join('sm_layanan_pendaftaran as lp', 'ssp.id_layanan_pendaftaran = lp.id')
            ->join('sm_tenaga_medis as tp', 'tp.id = ssp.perawat_terapi', 'left')
            ->join('sm_pegawai as ps', 'ps.id = tp.id_pegawai', 'left')
            ->where('lp.id_pendaftaran', $id_layanan_pendaftaran, true)
            // ->where('ssp.id_layanan_pendaftaran', $id_layanan_pendaftaran, true)
            ->order_by('ssp.plsp_tanggal_ttd_petugas asc')
            ->get()
            ->row();
        $this->db->close();
    }

    function getSurveilansPasien($id_pendaftaran)
    {
        return $this->db->select("svs.*, COALESCE(ps.nama, '') as p_surveilans, COALESCE(psip.nama, '') as ipcn_surveilans")
            ->from('sm_surveilans as svs')
            ->join('sm_layanan_pendaftaran as lp', 'svs.id_layanan_pendaftaran = lp.id')
            ->join('sm_pendaftaran as pd', 'pd.id = lp.id_pendaftaran')
            ->join('sm_tenaga_medis as tp', 'tp.id = svs.sirs_perawat', 'left')
            ->join('sm_tenaga_medis as tpip', 'tpip.id = svs.sirs_ipcn', 'left')
            ->join('sm_pegawai as ps', 'ps.id = tp.id_pegawai', 'left')
            ->join('sm_pegawai as psip', 'psip.id = tpip.id_pegawai', 'left')
            ->where('pd.id', $id_pendaftaran, true)
            // ->where('svs.id_layanan_pendaftaran', $id_layanan_pendaftaran, true)
            ->order_by('svs.created_date asc')
            ->get()
            ->row();
        $this->db->close();
    }

    function getSurveilansPasien2($id_pendaftaran, $id_layanan)
    {
        return $this->db->select("svs.*, COALESCE(ps.nama, '') as p_surveilans, COALESCE(psip.nama, '') as ipcn_surveilans")
            ->from('sm_surveilans as svs')
            ->join('sm_layanan_pendaftaran as lp', 'svs.id_layanan_pendaftaran = lp.id')
            ->join('sm_pendaftaran as pd', 'pd.id = lp.id_pendaftaran')
            ->join('sm_tenaga_medis as tp', 'tp.id = svs.sirs_perawat', 'left')
            ->join('sm_tenaga_medis as tpip', 'tpip.id = svs.sirs_ipcn', 'left')
            ->join('sm_pegawai as ps', 'ps.id = tp.id_pegawai', 'left')
            ->join('sm_pegawai as psip', 'psip.id = tpip.id_pegawai', 'left')
            ->where('pd.id', $id_pendaftaran, true)
            // ->where('svs.id_layanan_pendaftaran', $id_layanan_pendaftaran, true)
            ->order_by('svs.created_date desc')
            ->get()
            ->result();
        $this->db->close();
    }

    function getTerapiPulang($id_layanan_pendaftaran)
    {
        return $this->db->select("stp.*, COALESCE(sb.nama_lengkap, '') as barang_auto, COALESCE(pg.nama, '') as akun_user")
            ->from('sm_resume_medis_terapi_pulang as stp')
            ->join('sm_barang as sb', 'sb.id = stp.obat', 'left')
            ->join('sm_translucent as st', 'st.id = stp.id_users', 'left')
            ->join('sm_pegawai as pg', 'pg.id = st.id', 'left')
            ->where('stp.id_layanan_pendaftaran', $id_layanan_pendaftaran, true)
            ->order_by('stp.created_date asc')
            ->get()
            ->result();
        $this->db->close();
    }

    function deleteTerapiPulang($id)
    {
        return $this->db->where("id", $id)->delete("sm_terapi_pulang");
    }

 

    function deleteBuktiVisitDokter($id)
    {
        return $this->db->where("id", $id)->delete("sm_bukti_visit_dokter");
    }



    // function deleteCatatanOperanPagi($id)
    // {
    //     return $this->db->where("id", $id)->delete("sm_catatan_operan_perawat_pagi");
    // }

    // function deleteCatatanOperanSore($id)
    // {
    //     return $this->db->where("id", $id)->delete("sm_catatan_operan_perawat_sore");
    // }

    // function deleteCatatanOperanMalam($id)
    // {
    //     return $this->db->where("id", $id)->delete("sm_catatan_operan_perawat_malam");
    // }

    function deletePemantauan($id)
    {
        return $this->db->where("id", $id)->delete("sm_pemantauan_nyeri");
    }

    function deleteResumeKeperawatan($id)
    {
        return $this->db->where("id", $id)->delete("sm_resume_keperawatan");
    }

    function deleteResumeTransfer($id)
    {
        return $this->db->where("id", $id)->delete("sm_transfer_pasien_intra");
    }

    function deletePantauanSholat($id)
    {
        return $this->db->where("id", $id)->delete("sm_pemantauan_sholat");
    }

    function deleteRuangRawat($id)
    {
        return $this->db->where("id", $id)->delete("sm_ruang_rawat");
    }

    function deleteDataPasang($id)
    {
        return $this->db->where("id", $id)->delete("sm_pemasangan_alat");
    }

    function deleteDataAntibiotik($id)
    {
        return $this->db->where("id", $id)->delete("sm_pemakaian_antibiotika");
    }

    function deletePemantauanUlangPasieDewasa($id)
    {
        return $this->db->where("id", $id)->delete("sm_pemantauan_resiko_jatuh_dewasa");
    }
    // DELETE PEMANTAUAN PASIEN RESIKO JATUH PASIEN DEWASA AKHIR

    function getTerapiPulangByID($id)
    {
        return $this->db->select("stp.*, COALESCE(sb.nama_lengkap, '') as barang_auto, sb.id as id_barang, COALESCE(pg.nama, '') as akun_user")
            ->from('sm_terapi_pulang as stp')
            ->join('sm_barang as sb', 'sb.id = stp.obat', 'left')
            ->join('sm_translucent as st', 'st.id = stp.id_users', 'left')
            ->join('sm_pegawai as pg', 'pg.id = st.id', 'left')
            ->where('stp.id', $id, true)
            ->order_by('stp.created_date asc')
            ->get()
            ->row();
        $this->db->close();
    }

    function editTerapiPulang($data)
    {

        return $this->db->where('id', $data['id'], true)->update('sm_terapi_pulang', $data);
    }

    function getKontrolKembali($id_layanan_pendaftaran)
    {
        return $this->db->select("sjkk.*, COALESCE(pg.nama, '') as dokter, COALESCE(ga.nama, '') as akun_user,sjkk.tanggal_kontrol as tanggal, CASE
        WHEN to_char(sjkk.tanggal_kontrol, 'd')='2' THEN 'Senin'
        WHEN to_char(sjkk.tanggal_kontrol, 'd')='3' THEN 'Selasa'
        WHEN to_char(sjkk.tanggal_kontrol, 'd')='4' THEN 'Rabu'
        WHEN to_char(sjkk.tanggal_kontrol, 'd')='5' THEN 'Kamis'
        WHEN to_char(sjkk.tanggal_kontrol, 'd')='6' THEN 'Jumat'
        WHEN to_char(sjkk.tanggal_kontrol, 'd')='7' THEN 'Sabtu'
        WHEN to_char(sjkk.tanggal_kontrol, 'd')='1' THEN 'Minggu'
        END as hari")
            ->from('sm_resume_medis_kontrol_ranap as sjkk')
            ->join('sm_tenaga_medis as tm', 'tm.id = sjkk.id_ek_nama_dokter')
            ->join('sm_pegawai as pg', 'pg.id = tm.id_pegawai')
            ->join('sm_translucent as st', 'st.id = sjkk.id_users', 'left')
            ->join('sm_pegawai as ga', 'ga.id = st.id', 'left')
            ->where('sjkk.id_layanan_pendaftaran', $id_layanan_pendaftaran, true)
            ->order_by('sjkk.created_date asc')
            ->get()
            ->result();
        $this->db->close();
    }

    function getKontrolKembaliByID($id)
    {
        return $this->db->select("sjkk.*, COALESCE(pg.nama, '') as dokter, tm.id as id_dokter, COALESCE(ga.nama, '') as akun_user")
            ->from('sm_jadwal_kontrol_keperawatan as sjkk')
            ->join('sm_tenaga_medis as tm', 'tm.id = sjkk.id_ek_nama_dokter')
            ->join('sm_pegawai as pg', 'pg.id = tm.id_pegawai')
            ->join('sm_translucent as st', 'st.id = sjkk.user', 'left')
            ->join('sm_pegawai as ga', 'ga.id = st.id', 'left')
            ->where('sjkk.id', $id, true)
            ->order_by('sjkk.created_date asc')
            ->get()
            ->row();
        $this->db->close();
    }

    function deleteKontrolKembali($id)
    {
        return $this->db->where("id", $id)->delete("sm_jadwal_kontrol_keperawatan");
    }

    function editKontrolKembali($data)
    {
        return $this->db->where('id', $data['id'], true)->update('sm_jadwal_kontrol_keperawatan', $data);
    }

    // RAKX
    function getMasalahRawat($id_layanan_pendaftaran){
        return $this->db->select("sdk.*, COALESCE(smk.nama, '') as masalah_keperawatan, COALESCE(ga.nama, '') as akun_user")
            ->from('sm_diagnosis_keperawatan as sdk')
            ->join('sm_layanan_pendaftaran as lp', 'sdk.id_layanan_pendaftaran = lp.id')
            ->join('sm_masalah_keperawatan as smk', 'smk.id = sdk.masalah_keperawatan')
            ->join('sm_translucent as st', 'st.id = sdk.id_users', 'left')
            ->join('sm_pegawai as ga', 'ga.id = st.id', 'left')
            ->where('lp.id_pendaftaran', $id_layanan_pendaftaran, true)
            // ->where('sdk.id_layanan_pendaftaran', $id_layanan_pendaftaran, true)
            ->order_by('sdk.created_date asc')
            ->get()
            ->result();
        $this->db->close();
    }

    // RAKX
    function getMasalahRawatByID($id){
        return $this->db->select("sdk.*, COALESCE(smk.nama, '') as masalah_keperawatan, sdk.masalah_keperawatan as id_masalah, COALESCE(ga.nama, '') as akun_user")
            ->from('sm_diagnosis_keperawatan as sdk')
            ->join('sm_masalah_keperawatan as smk', 'smk.id = sdk.masalah_keperawatan')
            ->join('sm_translucent as st', 'st.id = sdk.id_users', 'left')
            ->join('sm_pegawai as ga', 'ga.id = st.id', 'left')
            ->where('sdk.id', $id, true)
            ->order_by('sdk.created_date asc')
            ->get()
            ->row();
        $this->db->close();
    }

    // RAKX
    function getRencanaKeperawatan($id_layanan_pendaftaran){
        return $this->db->select("srtr.*, srtk.nama as nama_tindakan, COALESCE(ga.nama, '') as akun_user")
            ->from('sm_rencana_tindakan_rawat as srtr')
            ->join('sm_layanan_pendaftaran as lp', 'srtr.id_layanan_pendaftaran = lp.id')
            ->join('sm_rencana_tindakan_keperawatan as srtk', 'srtk.id = srtr.rencana_tindakan_keperawatan', 'left')
            ->join('sm_translucent as st', 'st.id = srtr.ek_operator_rencana_tindakan', 'left')
            ->join('sm_pegawai as ga', 'ga.id = st.id', 'left')
            ->where('lp.id_pendaftaran', $id_layanan_pendaftaran, true)
            // ->where('srtr.id_layanan_pendaftaran', $id_layanan_pendaftaran, true)
            ->order_by('srtr.created_date asc')
            ->get()
            ->result();
        $this->db->close();
    }

    // RAKX
    function getRencanaTindakanKeperawatan($params, $start, $limit){
        $limit = " limit " . $limit . " offset " . $start;
        $sql   = "select rtk.*
                  from sm_rencana_tindakan_keperawatan as rtk
                  where rtk.nama ilike ('%" . $params . "%') order by rtk.nama";
        $data['data'] = $this->db->query($sql . $limit)->result();
        $data['total'] = $this->db->query($sql)->num_rows();
        return $data;
        // $this->db->query($sql . $limit);
        // echo $this->db->last_query(); die;
    }

    // RAKX
    function updateMasalahKeperawatan($data){
        if (is_array($data['masalah_keperawatan'])) :
            foreach ($data['masalah_keperawatan'] as $i => $value) :
                $data_masalah = array(
                    'id_layanan_pendaftaran' => $data['id_layanan_pendaftaran'],
                    'masalah_keperawatan' => $value,
                    'tanggal_mulai' => $data['tanggal_mulai'][$i],
                    'tanggal_selesai' => $data['tanggal_selesai'][$i],
                    'id_users' => $data['id_users'][$i],
                    'created_date' => $data['created_date'][$i],
                );

                $this->db->insert('sm_diagnosis_keperawatan', $data_masalah);
            endforeach;
        endif;
    }

    // RAKX
    function updateRencanaTindakanKeperawatan($data){
        if (is_array($data['rencana_tindakan_keperawatan'])) :
            foreach ($data['rencana_tindakan_keperawatan'] as $i => $value) :
                $data_rencana = array(
                    // 'id_layanan_pendaftaran' => $data['id_layanan_pendaftaran'],
                    // 'rencana_tindakan_keperawatan' => $value,
                    // 'keterangan' => $data['keterangan'][$i],
                    // 'tanggal_tindakan_satu' => $data['tanggal_tindakan_satu'][$i],
                    // 'ek_tambahan_status' => $data['ek_tambahan_status'][$i],
                    // 'ek_waktu_pagi' => $data['ek_waktu_pagi'][$i],
                    // 'ek_waktu_siang' => $data['ek_waktu_siang'][$i],
                    // 'ek_waktu_malam' => $data['ek_waktu_malam'][$i],
                    // 'tanggal_tindakan_dua' => $data['tanggal_tindakan_dua'][$i],
                    // 'ek_tambahan_status_dua' => $data['ek_tambahan_status_dua'][$i],
                    // 'ek_waktu_pagi_dua' => $data['ek_waktu_pagi_dua'][$i],
                    // 'ek_waktu_siang_dua' => $data['ek_waktu_siang_dua'][$i],
                    // 'ek_waktu_malam_dua' => $data['ek_waktu_malam_dua'][$i],
                    // 'tanggal_tindakan_tiga' => $data['tanggal_tindakan_tiga'][$i],
                    // 'ek_tambahan_status_tiga' => $data['ek_tambahan_status_tiga'][$i],
                    // 'ek_waktu_pagi_tiga' => $data['ek_waktu_pagi_tiga'][$i],
                    // 'ek_waktu_siang_tiga' => $data['ek_waktu_siang_tiga'][$i],
                    // 'ek_waktu_malam_tiga' => $data['ek_waktu_malam_tiga'][$i],
                    // 'ek_operator_rencana_tindakan' => $data['ek_operator_rencana_tindakan'][$i],
                    // 'created_date' => $data['created_date'][$i],




                    'id_layanan_pendaftaran' => $data['id_layanan_pendaftaran'],
                    'tanggal_tindakan_satu' => $data['tanggal_tindakan_satu'][$i],
                    'jam_tindakan' => $data['jam_tindakan'][$i],
                    'rencana_tindakan_keperawatan' => $value,
                    'rencana_tindakan_lainya' => $data['rencana_tindakan_lainya'][$i],
                    'keterangan' => $data['keterangan'][$i],
                    'ek_waktu_pagi' => $data['ek_waktu_pagi'][$i],
                    'ek_waktu_siang' => $data['ek_waktu_siang'][$i],
                    'ek_waktu_malam' => $data['ek_waktu_malam'][$i],

                    // 'ek_tambahan_status' => $data['ek_tambahan_status'][$i],
                    // 'tanggal_tindakan_dua' => $data['tanggal_tindakan_dua'][$i],
                    // 'ek_tambahan_status_dua' => $data['ek_tambahan_status_dua'][$i],
                    // 'ek_waktu_pagi_dua' => $data['ek_waktu_pagi_dua'][$i],
                    // 'ek_waktu_siang_dua' => $data['ek_waktu_siang_dua'][$i],
                    // 'ek_waktu_malam_dua' => $data['ek_waktu_malam_dua'][$i],
                    // 'tanggal_tindakan_tiga' => $data['tanggal_tindakan_tiga'][$i],
                    // 'ek_tambahan_status_tiga' => $data['ek_tambahan_status_tiga'][$i],
                    // 'ek_waktu_pagi_tiga' => $data['ek_waktu_pagi_tiga'][$i],
                    // 'ek_waktu_siang_tiga' => $data['ek_waktu_siang_tiga'][$i],
                    // 'ek_waktu_malam_tiga' => $data['ek_waktu_malam_tiga'][$i],

                    'ek_operator_rencana_tindakan' => $data['ek_operator_rencana_tindakan'][$i],
                    'created_date' => $data['created_date'][$i],

                );

                $this->db->insert('sm_rencana_tindakan_rawat', $data_rencana);
            endforeach;
        endif;
    }

    // RAKX
    function editMasalahKeperawatan($data){
        return $this->db->where('id', $data['id'], true)->update('sm_diagnosis_keperawatan', $data);
    }

    // RAKX
    function deleteMasalahRawat($id){
        return $this->db->where("id", $id)->delete("sm_diagnosis_keperawatan");
    }

    // RAKX
    function deleteRencanaTINDK($id){
        return $this->db->where("id", $id)->delete("sm_rencana_tindakan_rawat");
    }

    // APBT
    function updateAssesmentPraBedah($checkDataAsessmentPraBedah)
    {
        $this->db->trans_begin();
        $checkDataAsessmentPraBedah['created_date'] = $this->datetime;
        if ($checkDataAsessmentPraBedah['id_apbt'] !== '') {
            $id_apbt = $checkDataAsessmentPraBedah['id_apbt'];
            $data_before_apbt = $this->db->get_where('sm_asessmen_pra_bedah', ['id' => $id_apbt])->row();
            unset($checkDataAsessmentPraBedah['id_apbt']);
            unset($data_before_apbt->id);
            $checkDataAsessmentPraBedah['updated_date'] = date('Y-m-d H:i:s');
            $this->db->insert('sm_asessmen_pra_bedah_logs', $data_before_apbt);
            $this->db->where('id', $id_apbt)->update('sm_asessmen_pra_bedah', $checkDataAsessmentPraBedah);
            $message = 'mengupdate Assesmen Pra Bedah';
        } else {
            unset($checkDataAsessmentPraBedah['id_apbt']);
            $this->db->insert('sm_asessmen_pra_bedah', $checkDataAsessmentPraBedah);
            $message = 'menambah Assesmen Pra Bedah';
        }
        if ($this->db->trans_status() === false) :
            $this->db->trans_rollback();
            $status = false;
            $message = "Gagal " . $message;
        else :
            $this->db->trans_commit();
            $status = true;
            $message = "Berhasil " . $message;
        endif;
        return array('status' => $status, 'message' => $message);
    }

    // APBT
    function getAsessmenPraBedah($id_layanan_pendaftaran)
    {
        return $this->db->select("apb.*, COALESCE(ga.nama, '') 
                                        as dpjp_pra_bedah, 
                                        kkr.keluhan_utama as keluhan_utama, 
                                        kkr.rps as rps, 
                                        kkr.rpd as rpd, 
                                        jko.mulai as tanggal_operasi,       
                                        pgu.nama as user")
            ->from('sm_asessmen_pra_bedah as apb')
            ->join('sm_layanan_pendaftaran as lp', 'apb.id_layanan_pendaftaran = lp.id')
            ->join('sm_tenaga_medis as tm', 'apb.id_dokter_dpjp = tm.id', 'left')
            ->join('sm_pegawai as ga', 'tm.id_pegawai = ga.id', 'left')

            // ->join('sm_layanan_pendaftaran as lp', 'apb.id_layanan_pendaftaran = lp.id', 'left')
            ->join('sm_kajian_keperawatan_ranap as kkr', 'kkr.id_layanan_pendaftaran = lp.id', 'left')
            ->join('sm_jadwal_kamar_operasi as jko', 'jko.id_layanan_pendaftaran= lp.id', 'left')

            ->join('sm_translucent as tr', 'tr.id = apb.id_users', 'left')
            ->join('sm_pegawai as pgu', 'pgu.id = tr.id', 'left')
            ->where('lp.id', $id_layanan_pendaftaran, true)
            // ->where('apb.id_layanan_pendaftaran', $id_layanan_pendaftaran, true)
            ->get()
            ->row();
        $this->db->close();
    }




 

    // =================================
    // MONITORING BARU
    function getaGrafikMonitoring($id_pendaftaran){
        return $this->db
            ->select("gm.*, COALESCE(pg.nama, '') as nama_petugas")
            ->from('sm_grafik_monitoring as gm')
            ->join('sm_layanan_pendaftaran as lp', 'gm.id_layanan_pendaftaran = lp.id')
            ->join('sm_pendaftaran as pd', 'lp.id_pendaftaran = pd.id')
            ->join('sm_pegawai as pg', 'gm.id_user = pg.id', 'left')
            ->where('lp.id_pendaftaran', $id_pendaftaran)
            ->order_by('gm.id', 'asc')
            ->get()
            ->result();
        $this->db->close();
    }

    // MONITORING BARU
    function getaGrafikMonitoringByID($id){
        return $this->db
            ->select("gm.*, COALESCE(pg.nama, '') as nama_petugas")
            ->from('sm_grafik_monitoring as gm')
            ->join('sm_layanan_pendaftaran as lp', 'gm.id_layanan_pendaftaran = lp.id')
            ->join('sm_pendaftaran as pd', 'lp.id_pendaftaran = pd.id')
            ->join('sm_pegawai as pg', ' gm.id_user = pg.id', 'left')
            ->where('gm.id', $id)
            ->order_by('gm.id', 'asc')
            ->get()
            ->row();
        $this->db->close();
    }

    // SIMPAN MONITORING // GRVK  // MONITORING BARU
    function insertGrafikMonitoring($data){
        $mp_tgl = str_replace("/", "-", $data['mp_tgl']);
        $mp_tgl = date("Y-m-d", strtotime($mp_tgl));
        $data = array(
                    'id_layanan_pendaftaran'      => $data['id_layanan_pendaftaran'],
                    'id_pendaftaran'      => $data['id_pendaftaran'],
                    'id_user'           => $data['id_user'],
                    'mp_suhu' => $data['mp_suhu'],
                    'mp_rr'   => $data['mp_rr'],
                    'mp_nadi' => $data['mp_nadi'],
                    'mp_jam'  => $data['mp_jam'],
                    'mp_tanggal'  => $mp_tgl,
                    'created_at'  => date('Y-m-d H:i:s'), // Menggunakan timestamp saat ini
                );
        $this->db->insert('sm_grafik_monitoring', $data);
    }

    // MONITORING BARU
    function updateGrafikMonitoring($data){
        return $this->db->where('id', $data['id'], true)->update('sm_grafik_monitoring', $data);
    }

    // MONITORING BARU
    function deleteGrafikMonitoring($id){
        return $this->db->where("id", $id)->delete("sm_grafik_monitoring");
    }

    // GRAFIK MONITORING BARU LOGS
    function insertLogsGrafikMonitoring($data) {
        return $this->db->insert('sm_grafik_monitoring_logs', $data);
    }

    // MP-A // MONITORING 
    function getMonitoringPasien1($id_layanan_pendaftaran) {
        $query = $this->db->select("mp.*, COALESCE(b.nama, '') AS bangsal")        
            ->from('sm_monitoring_pasien_a as mp')
            ->join('sm_layanan_pendaftaran as lp', 'mp.id_layanan_pendaftaran = lp.id')
            ->join('sm_rawat_inap AS ri', 'ri.id_layanan_pendaftaran = lp.id', 'left')
            ->join('sm_bangsal AS b', 'b.id = ri.id_bangsal', 'left') 
            ->where('lp.id_pendaftaran', $id_layanan_pendaftaran)
            ->get();
        $result = $query->row();
        $this->db->close();
        return $result;
    }

    // MPP-C 1  Ada 5 // MONITORING 
    function insertMonitoringPasien2($data){
        foreach ($data['date_created'] as $key => $value) {
            $mpp_tgl = str_replace('/', '-', $data['tgl_mpp'][$key]);
            $mpp_tgl = date("Y-m-d", strtotime($mpp_tgl));
            $data_mpp = array(
                'id_pendaftaran'             => $data['id_pendaftaran'],
                'id_layanan_pendaftaran'     => $data['id_layanan_pendaftaran'],
                'id_user'                    => $data['id_user'][$key],
                'tgl_mpp'                    => $mpp_tgl,
                'oral_mpp'                   => $data['oral_mpp'][$key] !== '' ? $data['oral_mpp'][$key] : null,
                'ngt_mpp'                    => $data['ngt_mpp'][$key] !== '' ? $data['ngt_mpp'][$key] : null,
                'paranteral_mpp'             => $data['paranteral_mpp'][$key] !== '' ? $data['paranteral_mpp'][$key] : null,
                'paranteral_mppp'            => $data['paranteral_mppp'][$key] !== '' ? $data['paranteral_mppp'][$key] : null,
                'produk_mpp'                 => $data['produk_mpp'][$key] !== '' ? $data['produk_mpp'][$key] : null,
                'input_mpp'                  => $data['input_mpp'][$key] !== '' ? $data['input_mpp'][$key] : null,
                'urin_mpp'                   => $data['urin_mpp'][$key] !== '' ? $data['urin_mpp'][$key] : null,
                'bab_mpp'                    => $data['bab_mpp'][$key] !== '' ? $data['bab_mpp'][$key] : null,
                'gastrik_mpp'                => $data['gastrik_mpp'][$key] !== '' ? $data['gastrik_mpp'][$key] : null,
                'wsd_mpp'                    => $data['wsd_mpp'][$key] !== '' ? $data['wsd_mpp'][$key] : null,
                'iwl_mpp'                    => $data['iwl_mpp'][$key] !== '' ? $data['iwl_mpp'][$key] : null,
                'output_mpp'                 => $data['output_mpp'][$key] !== '' ? $data['output_mpp'][$key] : null,
                'blance_cairan_mpp'                 => $data['blance_cairan_mpp'][$key] !== '' ? $data['blance_cairan_mpp'][$key] : null,
                'tdarah_mpp'                  => $data['tdarah_mpp'][$key] !== '' ? $data['tdarah_mpp'][$key] : null,
                'saturasi_mppp'                => $data['saturasi_mppp'][$key] !== '' ? $data['saturasi_mppp'][$key] : null,
                'toksigen_mpp'                => $data['toksigen_mpp'][$key] !== '' ? $data['toksigen_mpp'][$key] : null,
                'skesadaran_mpp'              => $data['skesadaran_mpp'][$key] !== '' ? $data['skesadaran_mpp'][$key] : null,
                'kategori_mpp'                => $data['kategori_mpp'][$key] !== '' ? $data['kategori_mpp'][$key] : null,
                'pengawasan_mpp'              => $data['pengawasan_mpp'][$key] !== '' ? $data['pengawasan_mpp'][$key] : null,
                'diit_mpp'                    => $data['diit_mpp'][$key] !== '' ? $data['diit_mpp'][$key] : null,
                'jam_mpp'                     => $data['jam_mpp'][$key] !== '' ? $data['jam_mpp'][$key] : null,
                'perawat_mpp'                 => $data['perawat_mpp'][$key] !== '' ? $data['perawat_mpp'][$key] : null,
                'created_at'                 => $value,
            );
            //  var_dump($data_wpt);die;              
            $this->db->insert('sm_monitoring_pasien_c', $data_mpp);
        }
    }

    // MPP-C 2 // MONITORING 
    function editMonitoringPasien2($data){
        return $this->db->where('id', $data['id'], true)->update('sm_monitoring_pasien_c', $data);
    }

    // // MPP-C 3 // MONITORING  QUERY BENTUK WILDER
    function getMonitoringPasien2($id_pendaftaran) {
        // Mendefinisikan fungsi dengan parameter $id_pendaftaran
        // var_dump($id_pendaftaran); die; // Debugging untuk menampilkan isi variabel $id_pendaftaran   
        $sql = "SELECT
                    mpp.*, -- Mengambil semua kolom dari tabel sm_monitoring_pasien_c dengan alias mpp
                    COALESCE(wid.nama, '') AS akun_user, -- Mengambil nama dari tabel sm_pegawai dengan alias wid; jika null, kosongkan
                    COALESCE(spp1.nama, '') AS nama_perawat -- Mengambil nama dari tabel sm_pegawai dengan alias spp1; jika null, kosongkan
                FROM
                    sm_monitoring_pasien_c AS mpp -- Tabel utama untuk data monitoring pasien
                    JOIN sm_layanan_pendaftaran AS lp ON mpp.id_layanan_pendaftaran = lp.id -- Bergabung dengan tabel sm_layanan_pendaftaran berdasarkan id_layanan_pendaftaran
                    JOIN sm_pendaftaran AS pd ON lp.id_pendaftaran = pd.id -- Bergabung dengan tabel sm_pendaftaran berdasarkan id_pendaftaran
                    LEFT JOIN sm_translucent sid ON mpp.id_user = sid.id -- Join kiri dengan tabel sm_translucent untuk id_user; semua data mpp tetap ada meski tidak ada kecocokan
                    LEFT JOIN sm_pegawai wid ON mpp.id_user = wid.id -- Join kiri dengan tabel sm_pegawai untuk mendapatkan informasi akun user
                    LEFT JOIN sm_tenaga_medis tmp1 ON mpp.perawat_mpp = tmp1.id -- Join kiri dengan tabel sm_tenaga_medis untuk mendapatkan id perawat terkait
                    LEFT JOIN sm_pegawai spp1 ON spp1.id = tmp1.id_pegawai -- Join kiri dengan sm_pegawai untuk mendapatkan nama perawat berdasarkan id_pegawai dari tmp1
                WHERE pd.id = '$id_pendaftaran' -- Kondisi filter berdasarkan id_pendaftaran yang diberikan sebagai parameter fungsi
                ORDER BY mpp.tgl_mpp ASC"; // Mengurutkan hasil query berdasarkan tanggal mpp dalam urutan menaik (ascending)
        
        return $this->db->query($sql)->result(); // Menjalankan query pada database dan mengembalikan hasil dalam bentuk array objek
    }
    
    // MPP-C 4 // MONITORING 
    function deleteMonitoringPasien2($id){
        return $this->db->where("id", $id)->delete("sm_monitoring_pasien_c");
    }

    //  // MPP-C 5 // MONITORING  QUERY BENTUK BLUDER
    function getMonitoringPasien2ByID($id) {
        return $this->db
            ->select("mpp.*, COALESCE(wid.nama, '') as akun_user, COALESCE(spp1.nama, '') as nama_perawat,") 
            /* Memilih semua kolom dari tabel sm_monitoring_pasien_c dengan alias mpp
               Menggunakan COALESCE untuk memastikan jika wid.nama atau spp1.nama null, maka hasilnya berupa string kosong */
            ->from('sm_monitoring_pasien_c as mpp') // Menentukan tabel utama sm_monitoring_pasien_c dengan alias mpp
            ->join('sm_translucent sid', 'mpp.id_user = sid.id', 'left') /* LEFT JOIN dengan tabel sm_translucent untuk menghubungkan id_user dari tabel mpp dengan id di sid.
               Menggunakan join kiri untuk memastikan data mpp tetap ada meski tidak ada kecocokan di sid */
            ->join('sm_pegawai wid', 'mpp.id_user = wid.id', 'left') // LEFT JOIN dengan tabel sm_pegawai untuk mendapatkan informasi user akun     
            ->join('sm_tenaga_medis tmp1', 'mpp.perawat_mpp = tmp1.id', 'left') // LEFT JOIN dengan tabel sm_tenaga_medis untuk mendapatkan id perawat terkait
            ->join('sm_pegawai spp1', 'spp1.id = tmp1.id_pegawai', 'left') // LEFT JOIN dengan sm_pegawai untuk mendapatkan nama perawat berdasarkan id_pegawai dari tmp1
            ->where('mpp.id', $id) // Filter query berdasarkan id dari tabel sm_monitoring_pasien_c yang sesuai dengan parameter $id
            ->order_by('mpp.tgl_mpp', 'asc') // Mengurutkan hasil berdasarkan tanggal mpp secara ascending
            ->get() // Menjalankan query
            ->row(); // Mengambil satu baris hasil sebagai objek
    }

    // MPP 5 LOGS
	function insertLogsMonitoringPasien2($data) { 
        return $this->db->insert('sm_monitoring_pasien_c_logs', $data);
    }













    // AAAS jangan di hide ini penyebab ketika buka pelayanan eror 
    function getAssesmentAnestesi($id_layanan_pendaftaran)
    {
        return $this->db->select("aaast.*, COALESCE(ga.nama, '') as dokter, pgp.nama as perawat, pgu.nama as user")
            ->from('sm_assesment_anestesi_sedasi as aaast')
            ->join('sm_layanan_pendaftaran as lp', 'aaast.id_layanan_pendaftaran = lp.id')
            ->join('sm_tenaga_medis as tmd', 'aaast.aaast_dokter = tmd.id', 'left')
            ->join('sm_pegawai as ga', 'ga.id = tmd.id_pegawai', 'left')  // Menggunakan alias 'ga' untuk dokter
            ->join('sm_tenaga_medis as tmp', 'tmp.id = aaast.id_perawat_medis', 'left')
            ->join('sm_pegawai as pgp', 'pgp.id = tmp.id_pegawai', 'left')
            ->join('sm_translucent as tr', 'tr.id = aaast.id_users', 'left')
            ->join('sm_pegawai as pgu', 'pgu.id = tr.id', 'left')
            ->where('lp.id_pendaftaran', $id_layanan_pendaftaran, true)  // Menghapus parameter 'true'
            ->get()
            ->row();
        $this->db->close();
    }

    function getTransferPasienRumahSakit($id_layanan_pendaftaran)
    {
        return $this->db->select("tpirs.*, COALESCE(ga.nama, '') as nama_petugas_transer, COALESCE(ga2.nama, '') as nama_petugas_penerima_transfer, COALESCE(ga3.nama, '') as nama_petugas_transfer_dua, COALESCE(ga4.nama, '') as nama_petugas_penerima_transfer_dua, COALESCE(gadpjp.nama, '') as dpjp")

            ->from('sm_transfer_pasien_intra_rumah_sakit as tpirs')
            ->join('sm_layanan_pendaftaran as lp', ' tpirs.id_layanan_pendaftaran = lp.id')

            ->join('sm_tenaga_medis as tm', 'tpirs.id_petugas_transfer = tm.id', 'left')
            ->join('sm_pegawai as ga', 'tm.id_pegawai = ga.id', 'left')

            ->join('sm_tenaga_medis as tm2', 'tpirs.id_petugas_penerima = tm2.id', 'left')
            ->join('sm_pegawai as ga2', 'tm2.id_pegawai = ga2.id', 'left')

            ->join('sm_tenaga_medis as tm3', 'tpirs.id_petugas_transfer_dua = tm3.id', 'left')
            ->join('sm_pegawai as ga3', 'tm3.id_pegawai = ga3.id', 'left')

            ->join('sm_tenaga_medis as tm4', 'tpirs.id_petugas_penerima_dua = tm4.id', 'left')
            ->join('sm_pegawai as ga4', 'tm4.id_pegawai = ga4.id', 'left')

            ->join('sm_tenaga_medis as tmdpjp', 'tpirs.id_petugas_penerima_dua = tmdpjp.id', 'left')
            ->join('sm_pegawai as gadpjp', 'tmdpjp.id_pegawai = gadpjp.id', 'left')

            ->where('lp.id_pendaftaran', $id_layanan_pendaftaran, true)
            // ->where('tpirs.id_layanan_pendaftaran', $id_layanan_pendaftaran, true)
            ->get()
            ->row();
        $this->db->close();
    }

    function getBuktiVisitDokter($id_layanan_pendaftaran)
    {
        return $this->db->select("bvd.*, COALESCE(ga.nama, '') as akun_user, , COALESCE(pv.nama, '') as nama_dokter")
            ->from('sm_bukti_visit_dokter as bvd')
            ->join('sm_layanan_pendaftaran as lp', ' bvd.id_layanan_pendaftaran = lp.id')
            ->join('sm_translucent as st', 'st.id = bvd.id_users', 'left')
            ->join('sm_pegawai as ga', 'ga.id = st.id', 'left')
            ->join('sm_tenaga_medis as tm', 'bvd.id_dokter_visit = tm.id', 'left')
            ->join('sm_pegawai as pv', 'tm.id_pegawai = pv.id', 'left')
            ->where('lp.id_pendaftaran', $id_layanan_pendaftaran, true)
            // ->where('bvd.id_layanan_pendaftaran', $id_layanan_pendaftaran, true)
            ->get()
            ->result();
        $this->db->close();
    }



    // function getCatatanOperanPerawatPagi($id_layanan_pendaftaran)
    // {
    //     return $this->db->select("cop.*, COALESCE(ga.nama, '') as akun_user, COALESCE(pdp.nama, '') as dokter_dpjp_pagi, COALESCE(ppop.nama, '') as petugas_mengover_pagi, COALESCE(ppm .nama, '') as petugas_menerima_pagi,  COALESCE(pkp.nama, '') as konsulen_pagi")
    //         ->from('sm_catatan_operan_perawat_pagi as cop')
    //         ->join('sm_translucent as st', 'st.id = cop.id_users', 'left')
    //         ->join('sm_pegawai as ga', 'ga.id = st.id', 'left') // user

    //         ->join('sm_layanan_pendaftaran as lp', ' cop.id_layanan_pendaftaran = lp.id')

    //         ->join('sm_tenaga_medis as tmdp', 'cop.dpjp_utama_pagi = tmdp.id', 'left')
    //         ->join('sm_pegawai as pdp', 'tmdp.id_pegawai = pdp.id', 'left') //dokter

    //         ->join('sm_tenaga_medis as tmkp', 'cop.konsulen_pagi = tmkp.id', 'left')
    //         ->join('sm_pegawai as pkp', 'tmkp.id_pegawai = pkp.id', 'left') // konsulen

    //         ->join('sm_tenaga_medis as tmpop', 'cop.perawat_mengover_pagi = tmpop.id', 'left')
    //         ->join('sm_pegawai as ppop', 'tmpop.id_pegawai = ppop.id', 'left') // petugas mengover

    //         ->join('sm_tenaga_medis as tmpm', 'cop.perawat_menerima_pagi = tmpm.id', 'left')
    //         ->join('sm_pegawai as ppm', 'tmpm.id_pegawai = ppm.id', 'left') // petugas menerima

    //         ->where('lp.id_pendaftaran', $id_layanan_pendaftaran, true)
    //         // ->where('cop.id_layanan_pendaftaran', $id_layanan_pendaftaran, true)
    //         ->order_by('cop.tanggal_waktu_pagi desc')

    //         ->get()
    //         ->result();
    //     $this->db->close();
    // }

    // function getCatatanOperanPerawatSore($id_layanan_pendaftaran)
    // {
    //     return $this->db->select("cos.*, COALESCE(ga.nama, '') as akun_user, COALESCE(pds.nama, '') as dokter_dpjp_sore, COALESCE(ppos.nama, '') as petugas_mengover_sore, COALESCE(ppms .nama, '') as petugas_menerima_sore,  COALESCE(pks.nama, '') as konsulen_sore")

    //         ->from('sm_catatan_operan_perawat_sore as cos')
    //         ->join('sm_translucent as st', 'st.id = cos.id_users', 'left')
    //         ->join('sm_pegawai as ga', 'ga.id = st.id', 'left') // user

    //         ->join('sm_layanan_pendaftaran as lp', ' cos.id_layanan_pendaftaran = lp.id')

    //         ->join('sm_tenaga_medis as tmds', 'cos.dokter_dpjp_sore = tmds.id', 'left')
    //         ->join('sm_pegawai as pds', 'tmds.id_pegawai = pds.id', 'left') //dokter

    //         ->join('sm_tenaga_medis as tmks', 'cos.konsulen_sore = tmks.id', 'left')
    //         ->join('sm_pegawai as pks', 'tmks.id_pegawai = pks.id', 'left') // konsulen

    //         ->join('sm_tenaga_medis as tmpos', 'cos.perawat_mengover_sore = tmpos.id', 'left')
    //         ->join('sm_pegawai as ppos', 'tmpos.id_pegawai = ppos.id', 'left') // petugas mengover

    //         ->join('sm_tenaga_medis as tmpms', 'cos.perawat_menerima_sore = tmpms.id', 'left')
    //         ->join('sm_pegawai as ppms', 'tmpms.id_pegawai = ppms.id', 'left') // petugas menerima

    //         ->where('lp.id_pendaftaran', $id_layanan_pendaftaran, true)
    //         // ->where('cos.id_layanan_pendaftaran', $id_layanan_pendaftaran, true)
    //         ->order_by('cos.tanggal_waktu_sore desc')

    //         ->get()
    //         ->result();
    //     $this->db->close();
    // }

    // function getCatatanOperanPerawatMalam($id_layanan_pendaftaran)
    // {
    //     return $this->db->select("com.*, COALESCE(ga.nama, '') as akun_user, COALESCE(pdm.nama, '') as dokter_dpjp_malam, COALESCE(ppom.nama, '') as petugas_mengover_malam, COALESCE(ppmm .nama, '') as petugas_menerima_malam,  COALESCE(pkm.nama, '') as konsulen_malam")

    //         ->from('sm_catatan_operan_perawat_malam as com')
    //         ->join('sm_translucent as st', 'st.id = com.id_users', 'left')
    //         ->join('sm_pegawai as ga', 'ga.id = st.id', 'left') // user

    //         ->join('sm_layanan_pendaftaran as lp', ' com.id_layanan_pendaftaran = lp.id')

    //         ->join('sm_tenaga_medis as tmdm', 'com.dokter_dpjp_malam = tmdm.id', 'left')
    //         ->join('sm_pegawai as pdm', 'tmdm.id_pegawai = pdm.id', 'left') //dokter

    //         ->join('sm_tenaga_medis as tmkm', 'com.konsulen_malam = tmkm.id', 'left')
    //         ->join('sm_pegawai as pkm', 'tmkm.id_pegawai = pkm.id', 'left') // konsulen

    //         ->join('sm_tenaga_medis as tmpom', 'com.perawat_mengover_malam = tmpom.id', 'left')
    //         ->join('sm_pegawai as ppom', 'tmpom.id_pegawai = ppom.id', 'left') // petugas mengover

    //         ->join('sm_tenaga_medis as tmpmm', 'com.perawat_menerima_malam = tmpmm.id', 'left')
    //         ->join('sm_pegawai as ppmm', 'tmpmm.id_pegawai = ppmm.id', 'left') // petugas menerima

    //         ->where('lp.id_pendaftaran', $id_layanan_pendaftaran, true)
    //         // ->where('com.id_layanan_pendaftaran', $id_layanan_pendaftaran, true)
    //         ->order_by('com.tanggal_waktu_malam desc')

    //         ->get()
    //         ->result();
    //     $this->db->close();
    // }



    function getPemantauanUlang($id_layanan_pendaftaran)
    {
        return $this->db->select("spn.*, COALESCE(ga.nama, '') as akun_user")
            ->from('sm_pemantauan_nyeri as spn')
            ->join('sm_layanan_pendaftaran as lp', 'spn.id_layanan_pendaftaran = lp.id')
            ->join('sm_translucent as st', 'st.id = spn.id_users', 'left')
            ->join('sm_pegawai as ga', 'ga.id = st.id', 'left')
            ->where('lp.id_pendaftaran', $id_layanan_pendaftaran, true)
            // ->where('spn.id_layanan_pendaftaran', $id_layanan_pendaftaran, true)
            ->order_by('spn.tanggal_pemantauan asc')
            ->get()
            ->result();
        $this->db->close();
    }




    // // CTKN tdk ada perubahan
    // function getCatatanTindakanRawat($id_layanan_pendaftaran){
    //     return $this->db->select("sctr.*, sctk.nama as nama_tindakan, COALESCE(spg.nama, '') as perawat_pagi, COALESCE(spgs.nama, '') as perawat_sore, COALESCE(spgm.nama, '') as perawat_malam, COALESCE(ga.nama, '') as akun_user, COALESCE(gid.nama, '') as akun_gid")
    //         ->from('sm_catatan_tindakan_rawat as sctr')
    //         ->join('sm_layanan_pendaftaran as lp', 'sctr.id_layanan_pendaftaran = lp.id')
    //         ->join('sm_catatan_tindakan_keperawatan as sctk', 'sctk.id = sctr.ek_catatan_tindakan_keperawatan', 'left')
    //         ->join('sm_tenaga_medis as stm', 'stm.id = sctr.ek_perawat_tindakan_pagi', 'left')
    //         ->join('sm_tenaga_medis as stms', 'stms.id = sctr.ek_perawat_tindakan_sore', 'left')
    //         ->join('sm_tenaga_medis as stmm', 'stmm.id = sctr.ek_perawat_tindakan_malam', 'left')
    //         ->join('sm_translucent as st', 'st.id = sctr.ek_operator_catatan_tindakan', 'left')
    //         ->join('sm_translucent as sid', 'sid.id = sctr.id_users', 'left')
    //         ->join('sm_pegawai as ga', 'ga.id = st.id', 'left')
    //         ->join('sm_pegawai as gid', 'gid.id = sid.id', 'left')
    //         ->join('sm_pegawai as spg', 'spg.id = stm.id_pegawai', 'left')
    //         ->join('sm_pegawai as spgs', 'spgs.id = stms.id_pegawai', 'left')
    //         ->join('sm_pegawai as spgm', 'spgm.id = stmm.id_pegawai', 'left')
    //         ->where('lp.id_pendaftaran', $id_layanan_pendaftaran, true)
    //         // ->where('sctr.id_layanan_pendaftaran', $id_layanan_pendaftaran, true)
    //         ->order_by('sctr.created_date desc')
    //         ->get()
    //         ->result();
    //     $this->db->close();
    // }

    // // CTKN tdk ada perubahan
    // function getCatatanTindakanKeperawatanByID($id){
    //     return $this->db->select("sctr.*, sctk.id as id_catatan, COALESCE(sctk.nama, '') as nama_tindakan, spg.id as id_ppagi, COALESCE(spg.nama, '') as perawat_pagi, spgs.id as id_psore, COALESCE(spgs.nama, '') as perawat_sore, spgm.id as id_pmalam, COALESCE(spgm.nama, '') as perawat_malam, COALESCE(ga.nama, '') as akun_user")
    //         ->from('sm_catatan_tindakan_rawat as sctr')
    //         ->join('sm_catatan_tindakan_keperawatan as sctk', 'sctk.id = sctr.ek_catatan_tindakan_keperawatan', 'left')
    //         ->join('sm_tenaga_medis as stm', 'stm.id = sctr.ek_perawat_tindakan_pagi', 'left')
    //         ->join('sm_tenaga_medis as stms', 'stms.id = sctr.ek_perawat_tindakan_sore', 'left')
    //         ->join('sm_tenaga_medis as stmm', 'stmm.id = sctr.ek_perawat_tindakan_malam', 'left')
    //         ->join('sm_translucent as st', 'st.id = sctr.ek_operator_catatan_tindakan', 'left')
    //         ->join('sm_pegawai as ga', 'ga.id = st.id', 'left')
    //         ->join('sm_pegawai as spg', 'spg.id = stm.id_pegawai', 'left')
    //         ->join('sm_pegawai as spgs', 'spgs.id = stms.id_pegawai', 'left')
    //         ->join('sm_pegawai as spgm', 'spgm.id = stmm.id_pegawai', 'left')
    //         ->where('sctr.id', $id, true)
    //         ->order_by('sctr.ek_tanggal_catatan_tindakan asc')
    //         ->get()
    //         ->row();
    //     $this->db->close();
    // }

    // // CTKN tdk ada perubahan
    // function updateCatatanTindakanKeperawatan($data){
    //     if (is_array($data['ek_catatan_tindakan_keperawatan'])) :
    //         foreach ($data['ek_catatan_tindakan_keperawatan'] as $i => $value) :
    //             $data_tindakan = array(
    //                 'id_layanan_pendaftaran' => $data['id_layanan_pendaftaran'],
    //                 'ek_catatan_tindakan_keperawatan' => ($value == "" ? NULL : $value),
    //                 'ek_catatan_tindakan_keperawatan_manual' => ($data['ek_catatan_tindakan_keperawatan_manual'][$i] == "" ? NULL : $data['ek_catatan_tindakan_keperawatan_manual'][$i]),
    //                 'ek_keterangan_catatan' => $data['ek_keterangan_catatan'][$i],
    //                 'ek_tanggal_catatan_tindakan' => $data['ek_tanggal_catatan_tindakan'][$i],
    //                 'ek_bismillah_pagi' => $data['ek_bismillah_pagi'][$i],
    //                 'ek_cek_pagi' => $data['ek_cek_pagi'][$i],
    //                 'ek_jam_pagi' => $data['ek_jam_pagi'][$i],
    //                 'ek_paraf_pagi' => $data['ek_paraf_pagi'][$i],
    //                 'ek_perawat_tindakan_pagi' => $data['ek_perawat_tindakan_pagi'][$i],
    //                 'ek_hamdalah_pagi' => $data['ek_hamdalah_pagi'][$i],
    //                 'ek_bismillah_sore' => $data['ek_bismillah_sore'][$i],
    //                 'ek_cek_sore' => $data['ek_cek_sore'][$i],
    //                 'ek_jam_sore' => $data['ek_jam_sore'][$i],
    //                 'ek_paraf_sore' => $data['ek_paraf_sore'][$i],
    //                 'ek_perawat_tindakan_sore' => $data['ek_perawat_tindakan_sore'][$i],
    //                 'ek_hamdalah_sore' => $data['ek_hamdalah_sore'][$i],
    //                 'ek_bismillah_malam' => $data['ek_bismillah_malam'][$i],
    //                 'ek_cek_malam' => $data['ek_cek_malam'][$i],
    //                 'ek_jam_malam' => $data['ek_jam_malam'][$i],
    //                 'ek_paraf_malam' => $data['ek_paraf_malam'][$i],
    //                 'ek_perawat_tindakan_malam' => $data['ek_perawat_tindakan_malam'][$i],
    //                 'ek_hamdalah_malam' => $data['ek_hamdalah_malam'][$i],
    //                 'ek_operator_catatan_tindakan' => $data['ek_operator_catatan_tindakan'][$i],
    //                 'created_date' => $data['created_date'][$i],
    //             );

    //             $this->db->insert('sm_catatan_tindakan_rawat', $data_tindakan);
    //         endforeach;
    //     endif;
    // }

    // // CTKN tdk ada perubahan
    // function editCatatanTindakanKeperawatan($data){

    //     return $this->db->where('id', $data['id'], true)->update('sm_catatan_tindakan_rawat', $data);
    // }

    // // CTKN tdk ada perubahan
    // function deleteCatatanTindakanKeperawatan($id){
    //     return $this->db->where("id", $id)->delete("sm_catatan_tindakan_rawat");
    // }
 
    // // CTKN tdk ada perubahan
    // function getCatatanTindakanKeperawatan($params, $start, $limit){
    //     $limit = " limit " . $limit . " offset " . $start;
    //     $sql   = "select ctk.*
    //               from sm_catatan_tindakan_keperawatan as ctk
    //               where ctk.nama ilike ('%" . $params . "%') order by ctk.nama";
    //     $data['data'] = $this->db->query($sql . $limit)->result();
    //     $data['total'] = $this->db->query($sql)->num_rows();
    //     return $data;
    //     // $this->db->query($sql . $limit);
    //     // echo $this->db->last_query(); die;
    // }


    // CTKN
    function getCatatanTindakanRawat($id_layanan_pendaftaran){
        return $this->db->select("sctr.*, sctk.nama as nama_tindakan, 
                                        COALESCE(spg.nama, '') as perawat_pagi, 
                                        COALESCE(spgs.nama, '') as perawat_sore, 
                                        COALESCE(spgm.nama, '') as perawat_malam, 
                                        COALESCE(ga.nama, '') as akun_user, 
                                        COALESCE(gid.nama, '') as akun_gid")
            ->from('sm_catatan_tindakan_rawat as sctr')
            ->join('sm_layanan_pendaftaran as lp', 'sctr.id_layanan_pendaftaran = lp.id')
            ->join('sm_catatan_tindakan_keperawatan as sctk', 'sctk.id = sctr.ek_catatan_tindakan_keperawatan', 'left')
            ->join('sm_tenaga_medis as stm', 'stm.id = sctr.ek_perawat_tindakan_pagi', 'left')
            ->join('sm_tenaga_medis as stms', 'stms.id = sctr.ek_perawat_tindakan_sore', 'left')
            ->join('sm_tenaga_medis as stmm', 'stmm.id = sctr.ek_perawat_tindakan_malam', 'left')
            ->join('sm_translucent as st', 'st.id = sctr.ek_operator_catatan_tindakan', 'left')
            ->join('sm_translucent as sid', 'sid.id = sctr.id_users', 'left')
            ->join('sm_pegawai as ga', 'ga.id = st.id', 'left')
            ->join('sm_pegawai as gid', 'gid.id = sid.id', 'left')
            ->join('sm_pegawai as spg', 'spg.id = stm.id_pegawai', 'left')
            ->join('sm_pegawai as spgs', 'spgs.id = stms.id_pegawai', 'left')
            ->join('sm_pegawai as spgm', 'spgm.id = stmm.id_pegawai', 'left')
            ->where('lp.id_pendaftaran', $id_layanan_pendaftaran, true)
            // ->order_by('sctr.created_date desc')
            ->order_by('sctr.ek_tanggal_catatan_tindakan asc')
            ->get()
            ->result();
        $this->db->close();
    }

    // CTKN
    function getCatatanTindakanKeperawatanByID($id){
        return $this->db->select("sctr.*, sctk.id as id_catatan, 
                                        COALESCE(sctk.nama, '') as nama_tindakan, spg.id as id_ppagi, 
                                        COALESCE(spg.nama, '') as perawat_pagi, spgs.id as id_psore, 
                                        COALESCE(spgs.nama, '') as perawat_sore, spgm.id as id_pmalam, 
                                        COALESCE(spgm.nama, '') as perawat_malam, 
                                        COALESCE(ga.nama, '') as akun_user")
            ->from('sm_catatan_tindakan_rawat as sctr')
            ->join('sm_catatan_tindakan_keperawatan as sctk', 'sctk.id = sctr.ek_catatan_tindakan_keperawatan', 'left')
            ->join('sm_tenaga_medis as stm', 'stm.id = sctr.ek_perawat_tindakan_pagi', 'left')
            ->join('sm_tenaga_medis as stms', 'stms.id = sctr.ek_perawat_tindakan_sore', 'left')
            ->join('sm_tenaga_medis as stmm', 'stmm.id = sctr.ek_perawat_tindakan_malam', 'left')
            ->join('sm_translucent as st', 'st.id = sctr.ek_operator_catatan_tindakan', 'left')
            ->join('sm_pegawai as ga', 'ga.id = st.id', 'left')
            ->join('sm_pegawai as spg', 'spg.id = stm.id_pegawai', 'left')
            ->join('sm_pegawai as spgs', 'spgs.id = stms.id_pegawai', 'left')
            ->join('sm_pegawai as spgm', 'spgm.id = stmm.id_pegawai', 'left')
            ->where('sctr.id', $id, true)
            ->order_by('sctr.ek_tanggal_catatan_tindakan asc')
            ->get()
            ->row();
        $this->db->close();
    }
  
    // CTKN
    function insertCatatanTindakanKeperawatan($data) {
        $this->db->insert('sm_catatan_tindakan_rawat', $data);
    }

    // CTKN
    function editCatatanTindakanKeperawatan($data) {
        $id = $data['id'];

        // Simpan log dari data lama
        $row = $this->db->get_where('sm_catatan_tindakan_rawat', ['id' => $id])->row_array();
        if ($row) {
            $log = $row;
            unset($log['id']); // 🔥 Hapus id agar tidak bentrok di tabel logs
            $log['id_upaya']    = $id; // simpan ID aslinya di kolom lain, misalnya `id_upaya`
            $log['updated_date']  = $data['updated_date'];
            $log['updated_by']  = $data['updated_by'] ?? '-';
            $log['aksi']        = 'update';

            $this->db->insert('sm_catatan_tindakan_rawat_logs', $log);
        }

        // Hapus data yang bukan milik tabel utama
        $updateData = $data;
        unset($updateData['aksi'], $updateData['updated_by']);

        // Jalankan update
        $this->db->where('id', $id);
        $update = $this->db->update('sm_catatan_tindakan_rawat', $updateData);

        return $update;
    }

    // CTKN LOGS
    function deleteCatatanTindakanKeperawatan($id, $deleted_by) {
        $row = $this->db->get_where("sm_catatan_tindakan_rawat", ['id' => $id])->row_array();
        if ($row) {
            // Simpan ke log dulu
            $row['deleted_at'] = date('Y-m-d H:i:s');
            $row['deleted_by'] = $deleted_by; // nama user
            $row['aksi']       = 'delete'; // tambahin ini biar jelas di log
            $this->db->insert("sm_catatan_tindakan_rawat_logs", $row);

            // Baru hapus dari tabel utama
            return $this->db->where("id", $id)->delete("sm_catatan_tindakan_rawat");
        }
        return false;
    }

    // CTKN UNTUK DIAGNOSA
    function getCatatanTindakanKeperawatan($params, $start, $limit){
        $limit = " limit " . $limit . " offset " . $start;
        $sql   = "select ctk.*
                  from sm_catatan_tindakan_keperawatan as ctk
                  where ctk.nama ilike ('%" . $params . "%') order by ctk.nama";
        $data['data'] = $this->db->query($sql . $limit)->result();
        $data['total'] = $this->db->query($sql)->num_rows();
        return $data;
        // $this->db->query($sql . $limit);
        // echo $this->db->last_query(); die;
    }
    

    function getPantauSholat($id_layanan_pendaftaran)
    {
        return $this->db->select("sps.*, COALESCE(ga.nama, '') as nama_petugas")
            ->from('sm_pemantauan_sholat as sps')
            ->join('sm_layanan_pendaftaran as lp', 'sps.id_layanan_pendaftaran = lp.id')
            ->join('sm_translucent as st', 'st.id = sps.petugas_pemantau', 'left')
            ->join('sm_pegawai as ga', 'ga.id = st.id', 'left')
            ->where('lp.id_pendaftaran', $id_layanan_pendaftaran, true)
            // ->where('sps.id_layanan_pendaftaran', $id_layanan_pendaftaran, true)
            ->order_by('sps.tanggal_pemantauan asc')
            ->get()
            ->result();
        $this->db->close();
    }

    function getRuangRawat($id_layanan_pendaftaran)
    {
        return $this->db->select("srr.*, COALESCE(ga.nama, '') as nama_petugas, concat_ws(' ruang ' ,concat_ws(' kelas ', bg.nama, k.nama),ru.no_ruang) as nama_ruang")
            ->from('sm_ruang_rawat as srr')
            ->join('sm_layanan_pendaftaran as lp', 'srr.id_layanan_pendaftaran = lp.id')
            ->join('sm_translucent as st', 'st.id = srr.user', 'left')
            ->join('sm_pegawai as ga', 'ga.id = st.id', 'left')
            ->join('sm_ruang as ru', 'ru.id = srr.ruang_rawat', 'left')
            ->join('sm_bangsal as bg', 'ru.id_bangsal = bg.id', 'left')
            ->join('sm_kelas as k', 'ru.id_kelas = k.id', 'left')
            ->where('lp.id_pendaftaran', $id_layanan_pendaftaran, true)
            // ->where('srr.id_layanan_pendaftaran', $id_layanan_pendaftaran, true)
            ->group_by('srr.id, ga.nama, ru.id, bg.nama, k.nama, ru.no_ruang')
            ->order_by('srr.created_date asc')
            ->get()
            ->result();
        $this->db->close();
    }

    function getPemasanganAlat($id_layanan_pendaftaran)
    {
        return $this->db->select("spa.*, COALESCE(sl.nama, '') as tindakan, COALESCE(ga.nama, '') as nama_petugas, COALESCE(pg.nama, '') as perawat_pasang, COALESCE(spg.nama, '') as perawat_lepas")
            ->from('sm_pemasangan_alat as spa')
            ->join('sm_layanan_pendaftaran as lp', 'spa.id_layanan_pendaftaran = lp.id')
            ->join('sm_translucent as st', 'st.id = spa.sirs_pemasang_alat', 'left')
            ->join('sm_pegawai as ga', 'ga.id = st.id', 'left')
            ->join('sm_layanan as sl', 'sl.id = spa.sirs_tindakan', 'left')
            ->join('sm_tenaga_medis as tm', 'tm.id = spa.sirs_perawat_pasang', 'left')
            ->join('sm_pegawai as pg', 'pg.id = tm.id_pegawai', 'left')
            ->join('sm_tenaga_medis as stm', 'stm.id = spa.sirs_perawat_lepas', 'left')
            ->join('sm_pegawai as spg', 'spg.id = stm.id_pegawai', 'left')
            ->where('lp.id_pendaftaran', $id_layanan_pendaftaran, true)
            // ->where('spa.id_layanan_pendaftaran', $id_layanan_pendaftaran, true)
            ->order_by('spa.created_date asc')
            ->get()
            ->result();
        $this->db->close();
    }

    function getPemakaianAntibiotika($id_layanan_pendaftaran)
    {
        return $this->db->select("spa.*, COALESCE(sb.nama_lengkap, '') as nama, COALESCE(ga.nama, '') as nama_petugas")
            ->from('sm_pemakaian_antibiotika as spa')
            ->join('sm_layanan_pendaftaran as lp', 'spa.id_layanan_pendaftaran = lp.id')
            ->join('sm_translucent as st', 'st.id = spa.sirs_petugas_antibiotik', 'left')
            ->join('sm_pegawai as ga', 'ga.id = st.id', 'left')
            ->join('sm_barang as sb', 'sb.id = spa.sirs_antibiotik', 'left')
            ->where('lp.id_pendaftaran', $id_layanan_pendaftaran, true)
            // ->where('spa.id_layanan_pendaftaran', $id_layanan_pendaftaran, true)
            ->order_by('spa.created_date asc')
            ->get()
            ->result();
        $this->db->close();
    }

    function getVisitasiByID($id)
    {
        return $this->db->get_where('sm_anamnesa', ['id' => $id])->row();
        $this->db->close();
    }

    function updateVisitasi($data)
    {
        return $this->db->where('id', $data['id'], true)->update('sm_anamnesa', $data);
    }

    // SOAP
    function getSOAP($id_layanan_pendaftaran)
    {
        $this->db->select("s.*, COALESCE(pg.nama, '') as dokter, '0' log")
            ->from('sm_soap as s')
            ->join('sm_tenaga_medis as tm', 'tm.id = s.id_dokter')
            ->join('sm_pegawai as pg', 'pg.id = tm.id_pegawai')
            ->where('s.id_layanan_pendaftaran', $id_layanan_pendaftaran, true)
            ->order_by('s.waktu asc');
        $query1 = $this->db->get()->result();

        $this->db->select("s.*, COALESCE(pg.nama, '') as dokter, '1' log")
            ->from('sm_soap_log as s')
            ->join('sm_tenaga_medis as tm', 'tm.id = s.id_dokter')
            ->join('sm_pegawai as pg', 'pg.id = tm.id_pegawai')
            ->where('s.id_layanan_pendaftaran', $id_layanan_pendaftaran, true)
            ->where('s.history_edit', null)
            ->order_by('s.waktu asc');
        $query2 = $this->db->get()->result();

        return array_merge($query1, $query2);
    }

    function getSOAPByID($id)
    {
        return $this->db->get_where('sm_soap', ['id' => $id])->row();
        $this->db->close();
    }

    function getHistorySOAPByID($id)
    {
        return $this->db->select("sl.*")
            ->from('sm_soap_log as sl')
            ->where('sl.id_lama', $id, true)
            // ->where('lp.jenis_layanan', 'Rawat Inap')
            ->get()
            ->result();
        $this->db->close();

        // return $this->db->get_where('sm_soap', ['id' => $id])->row();
        // $this->db->close();
    }

    function updateSOAP($data)
    {
        $user_log = $this->session->userdata('nama');
        $created_date_log = $this->datetime;

        $sql = "INSERT INTO sm_soap_log (id_lama, id_layanan_pendaftaran, waktu, id_dokter, jenis, subject, objective, assessment, plan, keterangan, id_users, created_date_log, user_log, history_edit
        ) 
        
        SELECT id, id_layanan_pendaftaran, waktu, id_dokter, jenis, subject, objective, assessment, plan, '" . $data['keterangan'] . "' keterangan, id_users, '$created_date_log' created_date_log, '$user_log' user_log, '1' history_edit
        
        FROM sm_soap where id = " . $data['id'];

        $this->db->query($sql);
        return $this->db->where('id', $data['id'], true)->update('sm_soap', $data);
    }

    // Diagnosa
    function getDiagnosaPemeriksaan($id_layanan_pendaftaran)
    {
        $id_pendaftaran = $this->db->get_where('sm_layanan_pendaftaran', ['id' => $id_layanan_pendaftaran])->row()->id_pendaftaran;

        $this->db->select("dg.*, 
                            coalesce(pg.nama, '') as dokter, 
                            concat_ws(' | ', gs.kode_icdx_rinci, ( SELECT gsa.kode_icdx_rinci FROM sm_golongan_sebab_sakit AS gsa WHERE gsa.ID = dg.id_pengkodean_asterik ), ( SELECT gss1.nama FROM sm_golongan_sebab_sakit AS gss1 WHERE gss1.ID = dg.id_golongan_sebab_sakit ), dg.golongan_sebab_sakit_lain) as golongan_sebab_sakit,
                            concat_ws(' | ', gs.kode_icdx_rinci, ( SELECT gsa.kode_icdx_rinci FROM sm_golongan_sebab_sakit AS gsa WHERE gsa.ID = dg.id_pengkodean_asterik ), ( SELECT gss1.nama FROM sm_golongan_sebab_sakit AS gss1 WHERE gss1.ID = dg.id_golongan_sebab_sakit ), dg.golongan_sebab_sakit_lain) as item, '0' log ")
            ->from('sm_diagnosa as dg')
            ->join('sm_tenaga_medis as tm', 'tm.id = dg.id_dokter', 'left')
            ->join('sm_pegawai as pg', 'pg.id = tm.id_pegawai', 'left')
            ->join('sm_golongan_sebab_sakit as gs', 'gs.id = dg.id_pengkodean', 'left')
            ->where('dg.id_layanan_pendaftaran', $id_layanan_pendaftaran, true)
            ->order_by('dg.id', 'asc');
        $query1 = $this->db->get()->result();

        $this->db->select("dg.*, 
                            coalesce(pg.nama, '') as dokter, 
                            concat_ws(' | ', gs.kode_icdx_rinci, ( SELECT gsa.kode_icdx_rinci FROM sm_golongan_sebab_sakit AS gsa WHERE gsa.ID = dg.id_pengkodean_asterik ), ( SELECT gss1.nama FROM sm_golongan_sebab_sakit AS gss1 WHERE gss1.ID = dg.id_golongan_sebab_sakit ), dg.golongan_sebab_sakit_lain) as golongan_sebab_sakit,
                            concat_ws(' | ', gs.kode_icdx_rinci, ( SELECT gsa.kode_icdx_rinci FROM sm_golongan_sebab_sakit AS gsa WHERE gsa.ID = dg.id_pengkodean_asterik ), ( SELECT gss1.nama FROM sm_golongan_sebab_sakit AS gss1 WHERE gss1.ID = dg.id_golongan_sebab_sakit ), dg.golongan_sebab_sakit_lain) as item, '1' log ")
            ->from('sm_diagnosa_log as dg')
            ->join('sm_tenaga_medis as tm', 'tm.id = dg.id_dokter', 'left')
            ->join('sm_pegawai as pg', 'pg.id = tm.id_pegawai', 'left')
            ->join('sm_golongan_sebab_sakit as gs', 'gs.id = dg.id_pengkodean', 'left')
            ->where('dg.id_layanan_pendaftaran', $id_layanan_pendaftaran, true)
            ->order_by('dg.id', 'asc');
        $query2 = $this->db->get()->result();

        return array_merge($query1, $query2);
        $this->db->close();
    }

    // Diagnosa Ruang Lain
    function getDiagnosaPemeriksaanRuangLain($id_pendaftaran, $id_layanan_pendaftaran)
    {
        $this->db->select("dg.*, 
                        coalesce(pg.nama, '') as dokter, 
                        concat_ws(' | ', gs.kode_icdx_rinci, ( SELECT gsa.kode_icdx_rinci FROM sm_golongan_sebab_sakit AS gsa WHERE gsa.ID = dg.id_pengkodean_asterik ), ( SELECT gss1.nama FROM sm_golongan_sebab_sakit AS gss1 WHERE gss1.ID = dg.id_golongan_sebab_sakit ), dg.golongan_sebab_sakit_lain) as golongan_sebab_sakit,
                        concat_ws(' | ', gs.kode_icdx_rinci, ( SELECT gsa.kode_icdx_rinci FROM sm_golongan_sebab_sakit AS gsa WHERE gsa.ID = dg.id_pengkodean_asterik ), ( SELECT gss1.nama FROM sm_golongan_sebab_sakit AS gss1 WHERE gss1.ID = dg.id_golongan_sebab_sakit ), dg.golongan_sebab_sakit_lain) as item, '0' log, '1' diagnosa_ruang_lain,
                        , case when lp.jenis_layanan = 'IGD' or lp.id_unit_layanan is not null then lp.jenis_layanan else CONCAT(lp.jenis_layanan, ' (', bg.nama, bg2.nama, ')') end diagnosa_asal ")
            ->from('sm_diagnosa as dg')
            ->join('sm_layanan_pendaftaran as lp', 'dg.id_layanan_pendaftaran = lp.id')

            ->join('sm_rawat_inap as ri', 'lp.id = ri.id_layanan_pendaftaran', 'left')
            ->join('sm_intensive_care as ic', 'lp.id = ic.id_layanan_pendaftaran', 'left')
            ->join('sm_bangsal as bg', 'ri.id_bangsal = bg.id', 'left')
            ->join('sm_bangsal as bg2', 'ic.id_bangsal = bg2.id', 'left')

            ->join('sm_tenaga_medis as tm', 'tm.id = dg.id_dokter', 'left')
            ->join('sm_pegawai as pg', 'pg.id = tm.id_pegawai', 'left')
            ->join('sm_golongan_sebab_sakit as gs', 'gs.id = dg.id_pengkodean', 'left')
            ->where('lp.id_pendaftaran', $id_pendaftaran, true)
            ->where('lp.id !=', $id_layanan_pendaftaran, true)
            ->order_by('dg.id', 'asc');
        $query = $this->db->get()->result();

        return $query;
        $this->db->close();
    }

    // Diagnosa untuk dipake di bagian pemulasaran jenazah
    function getDiagnosaPemeriksaanUntukPemulasaran($idPendaftaran)
    {
        return $this->db->select("dg.*, 
                            coalesce(pg.nama, '') as dokter, 
                            concat_ws(' | ', gss.kode_icdx_rinci, gss.nama) as golongan_sebab_sakit, 
                            concat_ws(' | ', gss.kode_icdx_rinci, gss.nama) as item")
            ->from('sm_diagnosa as dg')
            ->join('sm_tenaga_medis as tm', 'tm.id = dg.id_dokter', 'left')
            ->join('sm_pegawai as pg', 'pg.id = tm.id_pegawai', 'left')
            ->join('sm_golongan_sebab_sakit as gss', 'gss.id = dg.id_golongan_sebab_sakit', 'left')
            ->join('sm_layanan_pendaftaran as lp', 'lp.id = dg.id_layanan_pendaftaran', 'left')
            ->where('lp.id_pendaftaran', $idPendaftaran, true)
            // ->where('lp.jenis_layanan', 'Rawat Inap')
            ->get()
            ->result_array();
        $this->db->close();
    }

    function getTindakanPemeriksaan($id_layanan_pendaftaran, $jenis_transaksi = '')
    {
        $this->db->select("ttp.*, coalesce(pg.nama, '') as operator,
                            concat_ws(' kelas ', concat_ws(' ', l.nama, tp.jenis, tp.bobot), k.nama) as layanan,
                            l.id id_layanan_tarif, l.id_parent  id_parent_layanan,
                            tp.keterangan, coalesce(tr.account, '') as users,coalesce(pgu.nama, '') as nama_users, '0' log,
                            case when icd.icd9 <> '' THEN concat('[', icd.icd9, '] ', icd.nama )  else null end icd9  ")
            ->from('sm_tarif_tindakan_pasien as ttp')
            ->join('sm_tenaga_medis as tm', 'tm.id = ttp.id_operator', 'left')
            ->join('sm_pegawai as pg', 'pg.id = tm.id_pegawai', 'left')
            ->join('sm_tarif_pelayanan as tp', 'tp.id = ttp.id_tarif_pelayanan', 'left')
            ->join('sm_kelas as k', 'k.id = tp.id_kelas', 'left')
            ->join('sm_layanan as l', 'l.id = tp.id_layanan', 'left')
            ->join('sm_translucent as tr', 'tr.id = ttp.id_user', 'left')
            ->join('sm_pegawai as pgu', 'pgu.id = ttp.id_user', 'left')
            ->join('sm_icd_ix as icd', 'ttp.id_icd9 = icd.id', 'left')
            ->where('ttp.id_layanan_pendaftaran', $id_layanan_pendaftaran, true)
            ->order_by('ttp.tanggal', 'desc')
            ->order_by('ttp.id', 'desc');

        if ($jenis_transaksi !== '') :
            $this->db->where('ttp.jenis_transaksi', $jenis_transaksi, true);
        endif;
        $query1 = $this->db->get()->result();

        $this->db->select("ttp.*, coalesce(pg.nama, '') as operator,
                            concat_ws(' kelas ', concat_ws(' ', l.nama, tp.jenis, tp.bobot), k.nama) as layanan,
                            l.id id_layanan_tarif, l.id_parent  id_parent_layanan,
                            tp.keterangan, coalesce(tr.account, '') as users,coalesce(pgu.nama, '') as nama_users, '1' log,
                            case when icd.icd9 <> '' THEN concat('[', icd.icd9, '] ', icd.nama )  else null end icd9  ")
            ->from('sm_tindakan_log as ttp')
            ->join('sm_tenaga_medis as tm', 'tm.id = ttp.id_operator', 'left')
            ->join('sm_pegawai as pg', 'pg.id = tm.id_pegawai', 'left')
            ->join('sm_tarif_pelayanan as tp', 'tp.id = ttp.id_tarif_pelayanan', 'left')
            ->join('sm_kelas as k', 'k.id = tp.id_kelas', 'left')
            ->join('sm_layanan as l', 'l.id = tp.id_layanan', 'left')
            ->join('sm_translucent as tr', 'tr.id = ttp.id_user', 'left')
            ->join('sm_pegawai as pgu', 'pgu.id = ttp.id_user', 'left')
            ->join('sm_icd_ix as icd', 'ttp.id_icd9 = icd.id', 'left')
            ->where('ttp.id_layanan_pendaftaran', $id_layanan_pendaftaran, true)
            ->order_by('ttp.tanggal', 'desc')
            ->order_by('ttp.id', 'desc');

        if ($jenis_transaksi !== '') :
            $this->db->where('ttp.jenis_transaksi', $jenis_transaksi, true);
        endif;
        $query2 = $this->db->get()->result();

        return array_merge($query1, $query2);
        $this->db->close();
    }

    function getJadwalTindakanOperasi($id_layanan_pendaftaran)
    {
        $this->db->select("jko.*, lp.id as id_layanan_pendaftaran, 
                        concat_ws(' ', l.nama, '<i>', ll.nama ,'</i>', 'Rp. ', tp.total) as tarif, 
                        tp.total, CONCAT_WS(' ', p.nama, COALESCE(p.status_pasien, '')) as nama, p.alamat, ro.nama as ruang_operasi  
        ")
            ->from('sm_jadwal_kamar_operasi as jko')
            ->join('sm_layanan_pendaftaran as lp', 'lp.id = jko.id_layanan_pendaftaran', 'left')
            ->join('sm_pasien as p', 'p.id = jko.id_pasien', 'left')
            ->join('sm_tarif_pelayanan as tp', 'tp.id = jko.id_tarif', 'left')
            ->join('sm_layanan as l', 'l.id = tp.id_layanan', 'left')
            ->join('sm_layanan as ll', 'll.id = l.id_parent', 'left')
            ->join('sm_ruang_operasi as ro', 'ro.id = jko.id_ruang_operasi', 'left')
            ->where('jko.id_layanan_pendaftaran', $id_layanan_pendaftaran, true);
        return $this->db->get()->row();
    }

    // Cek Sub Spesialis
    function checkSubSpesialis($id_unit_layanan)
    {
        $this->db->where('id_spesialisasi', $id_unit_layanan);
        return $this->db->get('sm_sub_spesialisasi')->result();
    }

    function deleteVisitasi($id)
    {
        return $this->db->where("id", $id)->delete("sm_anamnesa");
    }

    function deleteSOAP($id)
    {
        $user_log = $this->session->userdata('nama');
        $created_date_log = $this->datetime;

        $sql = "INSERT INTO sm_soap_log (id_lama, id_layanan_pendaftaran, waktu, id_dokter, jenis, subject, objective, assessment, plan, keterangan, id_users, created_date_log, user_log
        ) 
        
        SELECT id, id_layanan_pendaftaran, waktu, id_dokter, jenis, subject, objective, assessment, plan, keterangan, id_users, '$created_date_log' created_date_log, '$user_log' user_log
        
        FROM sm_soap where id = $id ";

        $this->db->query($sql);
        return $this->db->where("id", $id)->delete("sm_soap");
    }

    function deleteDiagnosaPemeriksaan($id)
    {
        $user_log = $this->session->userdata('nama');
        $created_date_log = $this->datetime;

        $sql = "INSERT INTO sm_diagnosa_log (id_lama, id_layanan_pendaftaran, waktu, id_dokter, id_golongan_sebab_sakit, diagnosa_manual, golongan_sebab_sakit_lain, diagnosa_klinis, prioritas, diagnosa_akhir, penyebab_kematian, diagnosa_banding, post, checked, id_coder, id_pengkodean, jenis_kasus, id_pengkodean_asterik, created_date_log, user_log
        ) 
        
        SELECT id, id_layanan_pendaftaran, waktu, id_dokter, id_golongan_sebab_sakit, diagnosa_manual, golongan_sebab_sakit_lain, diagnosa_klinis, prioritas, diagnosa_akhir, penyebab_kematian, diagnosa_banding, post, checked, id_coder, id_pengkodean, jenis_kasus, id_pengkodean_asterik, '$created_date_log' created_date_log, '$user_log' user_log
        
        FROM sm_diagnosa where id = $id ";

        $this->db->query($sql);
        return $this->db->where("id", $id)->delete("sm_diagnosa");
    }

    function deleteTindakanPemeriksaan($id, $jenis)
    {
        $user_log = $this->session->userdata('nama');
        $created_date_log = $this->datetime;

        $sql = "INSERT INTO sm_tindakan_log (id_lama, id_layanan_pendaftaran, tanggal, jenis_transaksi, id_mcu, id_operator, id_tarif_pelayanan, id_penjamin, no_polish, jasa_klinik, jasa_medis, bobot, bhp, total, reimburse, inform_consent, id_user, id_history_pembayaran, posted, is_pendaftaran, id_pengkodean, id_coder, updated_date, created_date_log, user_log, id_icd9) 

        SELECT id, id_layanan_pendaftaran, tanggal, jenis_transaksi, id_mcu, id_operator, id_tarif_pelayanan, id_penjamin, no_polish, jasa_klinik, jasa_medis, bobot, bhp, total, reimburse, inform_consent, id_user, id_history_pembayaran, posted, is_pendaftaran, id_pengkodean, id_coder, updated_date, '$created_date_log' created_date_log, '$user_log' user_log, id_icd9
        
        FROM sm_tarif_tindakan_pasien where id = $id ";

        $this->db->query($sql);

        $check = $this->db->select('pd.tanggal_keluar, ttp.id_history_pembayaran', true)
            ->from('sm_tarif_tindakan_pasien as ttp')
            ->join('sm_layanan_pendaftaran as lp', 'lp.id = ttp.id_layanan_pendaftaran', '', true)
            ->join('sm_pendaftaran as pd', 'pd.id = lp.id_pendaftaran', '', true)
            ->where('ttp.id', $id, true)
            ->get()
            ->row();

        $message = '';
        $status = false;
        $catatan = '';

        if (count(array($check)) && $check->id_history_pembayaran === NULL) :
            $this->db->trans_begin();
            $tindakan = $this->db->select("ttp.id, ttp.id_layanan_pendaftaran, ttp.total, 
                                    ttp.reimburse, ttp,jenis_transaksi,
                                    concat_ws(' kelas ', concat_ws(' ', l.nama, tp.jenis, tp.bobot), k.nama) as layanan", true)
                ->from('sm_tarif_tindakan_pasien as ttp')
                ->join('sm_tarif_pelayanan as tp', 'tp.id = ttp.id_tarif_pelayanan', '', true)
                ->join('sm_kelas as k', 'k.id = tp.id_kelas', 'left', true)
                ->join('sm_layanan as l', 'l.id = tp.id_layanan', '', true)
                ->where('ttp.id', $id, true)
                ->get()
                ->row();

            if ($tindakan) :
                if ($tindakan->jenis_transaksi === 'Pendaftaran') :
                    $jenis = 'Pendaftaran';
                endif;

                $catatan = "Tarif : " . $tindakan->layanan;
                $id_pembayaran = $this->deletePembayaran($tindakan->id_layanan_pendaftaran, $tindakan->total, $tindakan->reimburse, $jenis);

                // query hapus tarif tindakan pasien
                $this->db->where('id', $id, true)->delete('sm_tarif_tindakan_pasien');

                $row = $this->db->where('id', $id_pembayaran)->get('sm_pembayaran')->row();
                if ($row && $row->total < 1) :
                    $array = array('id' => $id_pembayaran, 'jenis_transaksi' => $jenis);

                    // query hapus pembayaran
                    $this->db->where($array)->delete('sm_pembayaran');
                endif;
            endif;

            if ($this->db->trans_status() === false) :
                $this->db->trans_rollback();
                $status = false;
                $message = 'Gagal menghapus tindakan, internal server error';
            else :
                $this->db->trans_commit();
                $status = true;
                $message = 'Berhasil menghapus tindakan';

                // record logs
                $this->load->model('logs/Logs_model', 'logs');
                $this->logs->recordAdminLogs($tindakan->id_layanan_pendaftaran, 'Hapus Tindakan', $catatan);
            endif;
        else :
            $status = false;
            $message = 'Gagal menghapus tindakan, transaksi telah dikunci';
        endif;

        return array('status' => $status, 'message' => $message);
    }

    // Pembayaran
    function updatePembayaran($id_pendaftaran, $id, $id_layanan, $jenis_transaksi, $total, $reimburse)
    {
        if ($jenis_transaksi === 'Tindakan') :
            $id_ = 'id_layanan_pendaftaran';
        else :
            if ($jenis_transaksi === 'IGD') :
                $id_ = 'id_layanan_pendaftaran';
            else :
                if ($jenis_transaksi === 'Pemulasaran Jenazah') :
                    $id_ = 'id_layanan_pendaftaran';
                else :
                    if ($jenis_transaksi === 'MCU') :
                        $id_ = 'id_layanan_pendaftaran';
                    else :
                        if ($jenis_transaksi === 'Laboratorium') :
                            $id_ = 'id_laboratorium';
                        else :
                            if ($jenis_transaksi === 'Radiologi') :
                                $id_ = 'id_radiologi';
                            else :
                                if ($jenis_transaksi === 'Fisioterapi') :
                                    $id_ = 'id_fisioterapi';
                                else :
                                    if ($jenis_transaksi === 'Rawat Inap') :
                                        $id_ = 'id_layanan_pendaftaran';
                                    else :
                                        if ($jenis_transaksi === 'Intensive Care') :
                                            $id_ = 'id_layanan_pendaftaran';
                                        else :
                                            if ($jenis_transaksi === 'Barang') :
                                                $id_ = 'id_penjualan';
                                            else :
                                                if ($jenis_transaksi === 'BHP') :
                                                    $id_ = 'id_penjualan';
                                                else :
                                                    if ($jenis_transaksi === 'Operasi') :
                                                        $id_ = 'id_operasi';
                                                    else :
                                                        if ($jenis_transaksi === 'Pendaftaran') :
                                                            $id_ = 'id_layanan_pendaftaran';
                                                        else :
                                                            if ($jenis_transaksi === 'Hemodialisa') :
                                                                $id_ = 'id_layanan_pendaftaran';
                                                            else :
                                                                if ($jenis_transaksi === 'PKRT') :
                                                                    $id_ = 'id_layanan_pendaftaran';
                                                                endif;
                                                            endif;
                                                        endif;
                                                    endif;
                                                endif;
                                            endif;
                                        endif;
                                    endif;
                                endif;
                            endif;
                        endif;
                    endif;
                endif;
            endif;
        endif;

        $bayar = $this->db->where(array($id_ => $id, 'jenis_transaksi' => $jenis_transaksi))->get('sm_pembayaran')->row();
        if ($bayar) :
            $total_bayar = (int) $bayar->total;
            $total_bayar += $total;
            $total_reimburse = (int) $bayar->reimburse;
            $total_reimburse += $reimburse;

            if ($bayar->terbayar < $total_bayar) :
                $status = 'Tagihan';
            else :
                $status = 'Terbayar';
            endif;

            $update = array(
                'total' => $total_bayar,
                'status' => $status,
                'reimburse' => $total_reimburse
            );
            $this->db->where('id', $bayar->id)->update('sm_pembayaran', $update);
        else :
            $insert = array(
                'id_pendaftaran' => $id_pendaftaran,
                $id_ => $id,
                'jenis_transaksi' => $jenis_transaksi,
                'total' => $total,
                'reimburse' => $reimburse
            );
            if ($jenis_transaksi !== 'Tindakan') :
                $insert['id_layanan_pendaftaran'] = $id_layanan;
            endif;
            $this->db->insert('sm_pembayaran', $insert);
        endif;
    }

    function deletePembayaran($id, $total, $reimburse, $jenis_transaksi)
    {
        if ($jenis_transaksi === 'Pendaftaran' | $jenis_transaksi === 'Tindakan' | $jenis_transaksi === 'IGD' | $jenis_transaksi === 'Intensive Care' | $jenis_transaksi === 'Rawat Inap' | $jenis_transaksi === 'Pemulasaran Jenazah') :
            $id_ = 'id_layanan_pendaftaran';
        else :
            if ($jenis_transaksi === 'Laboratorium') :
                $id_ = 'id_laboratorium';
            else :
                if ($jenis_transaksi === 'Radiologi') :
                    $id_ = 'id_radiologi';
                else :
                    if ($jenis_transaksi === 'Fisioterapi') :
                        $id_ = 'id_fisioterapi';
                    else :
                        if ($jenis_transaksi === 'Barang') :
                            $id_ = 'id_penjualan';
                        else :
                            if ($jenis_transaksi === 'Operasi') :
                                $id_ = 'id_operasi';
                            else :
                                if ($jenis_transaksi === 'MCU') :
                                    $id_ = 'id_layanan_pendaftaran';
                                else :
                                    if ($jenis_transaksi === 'Medical Check Up') :
                                        $id_ = 'id_layanan_pendaftaran';
                                    endif;
                                endif;
                            endif;
                        endif;
                    endif;
                endif;
            endif;
        endif;

        $bayar = $this->db->where(array($id_ => $id, 'jenis_transaksi' => $jenis_transaksi))->get('sm_pembayaran')->row();
        if (0 < count((array)$bayar)) :
            $update_bayar = (int) $bayar->total - (int) $total;
            $update_reimburse = (int) $bayar->reimburse - (int) $reimburse;
            $update = array('total' => $update_bayar, 'reimburse' => $update_reimburse);
            $this->db->where('id', $bayar->id)->update('sm_pembayaran', $update);
            if ($this->db->trans_status() === false) :
                $this->db->trans_rollback();
            endif;
        endif;

        return isset($bayar->id) ? $bayar->id : NULL;
    }

    function deletePembayaranRawatInap($id_layanan_pendaftaran, $total, $reimburse)
    {
        $bayar = $this->db->where(array('id_layanan_pendaftaran' => $id_layanan_pendaftaran, 'jenis_transaksi' => 'Rawat Inap'))->get('sm_pembayaran')->row();
        if (0 < count((array)$bayar)) :
            $update_bayar = (int) $bayar->total - (int) $total;
            $update_reimburse = (int) $bayar->reimburse - (int) $reimburse;
            $update = array('total' => $update_bayar, 'reimburse' => $update_reimburse);
            $this->db->where('id', $bayar->id)->update('sm_pembayaran', $update);
        endif;
    }

    function deletePembayaranIntensiveCare($id_layanan_pendaftaran, $total, $reimburse)
    {
        $bayar = $this->db->where(array('id_layanan_pendaftaran' => $id_layanan_pendaftaran, 'jenis_transaksi' => 'Intensive Care'))->get('sm_pembayaran')->row();
        if (0 < count((array)$bayar)) :
            $update_bayar = (int) $bayar->total - (int) $total;
            $update_reimburse = (int) $bayar->reimburse - (int) $reimburse;
            $update = array('total' => $update_bayar, 'reimburse' => $update_reimburse);
            $this->db->where('id', $bayar->id)->update('sm_pembayaran', $update);
        endif;
    }

    function updateAlergiPasien($id_pasien, $alergi)
    {
        $this->db->where("id", $id_pasien)->update("sm_pasien", array("alergi" => $alergi));
        if ($alergi !== '') :
            $this->db->where("id_pasien", $id_pasien)->update("sm_profil_pasien", array("is_alergi" => 'Ya'));
        else :
            $this->db->where("id_pasien", $id_pasien)->update("sm_profil_pasien", array("is_alergi" => NULL));
        endif;
    }

    function updateLayananPendaftaran($data)
    {
        $this->db->where('id', $data['id'])->update('sm_layanan_pendaftaran', $data);
    }

    function insertAnamnesa($data)
    {
        // $this->db->insert('sm_anamnesa', $data);
        if (is_array($data['keluhan_utama'])) :
            foreach ($data['keluhan_utama'] as $i => $value) :
                $data_insert = array(
                    'id_layanan_pendaftaran' => $data['id_layanan_pendaftaran'],
                    'waktu' => $this->datetime,
                    'keluhan_utama' => $value,
                    'tensi_sistolik' => $data['tensi_sistolik'][$i],
                    'tensi_diastolik' => $data['tensi_diastolik'][$i],
                    'nadi' => $data['nadi'][$i],
                    'suhu' => $data['suhu'][$i],
                    'nps' => $data['nps'][$i],
                    'rr' => $data['rr'][$i],
                    'alergi' => $data['alergi'][$i],
                    'urine'  => $data['urine'][$i],
                );

                $this->db->insert('sm_anamnesa', $data_insert);
            endforeach;
        endif;
    }

    function updateAnamnesa($data)
    {

        $nums = $this->db->where('id_layanan_pendaftaran', $data['id_layanan_pendaftaran'])->get('sm_anamnesa')->num_rows();

        if (0 < $nums) :
            $this->db->where('id_layanan_pendaftaran', $data['id_layanan_pendaftaran'])->update('sm_anamnesa', $data);
        else :
            $this->db->insert('sm_anamnesa', $data);
        endif;

        $this->load->model('satu_sehat/Satu_sehat_model', 'sehat');

        $dataLayanan = $this->sehat->getDataLayananPasien((int)$data['id_layanan_pendaftaran']);

        $cekOnOff = $this->sehat->cekSatuSehatOnOff();

        if($cekOnOff->onoff === '1'){

            if (isset($dataLayanan->jenis_layanan)) {

                if ($dataLayanan->jenis_layanan === 'Poliklinik') {

                    $dataGeneral = $this->sehat->cekidLayananPendaftaran((int)$data['id_layanan_pendaftaran']);

                    if (isset($data['tensi_sistolik'])) {

                        if ($data['tensi_sistolik'] !== '' && $data['tensi_sistolik'] !== null) {

                            $a = $this->kirimDataObservasi('sistolik', $data);

                            $arrPeriksa['id_satset_sistolik'] = $a;
                        } else {

                            if ($dataGeneral->id_satset_sistolik !== null && $dataGeneral->id_satset_sistolik !== '') {

                                $b = $this->kirimDataObservasi('sistolik', $data);

                                $arrPeriksa['id_satset_sistolik'] = $b;
                            }
                        }
                    }

                    if (isset($data['tensi_diastolik'])) {

                        if ($data['tensi_diastolik'] !== '' && $data['tensi_diastolik'] !== null) {

                            $c = $this->kirimDataObservasi('diastolik', $data);

                            $arrPeriksa['id_satset_diastolik'] = $c;
                        } else {

                            if ($dataGeneral->id_satset_diastolik !== null && $dataGeneral->id_satset_diastolik !== '') {

                                $d = $this->kirimDataObservasi('diastolik', $data);

                                $arrPeriksa['id_satset_diastolik'] = $d;
                            }
                        }
                    }

                    if (isset($data['nadi'])) {

                        if ($data['nadi'] !== '' && $data['nadi'] !== null) {

                            $e = $this->kirimDataObservasi('nadi', $data);

                            $arrPeriksa['id_satset_nadi'] = $e;
                        } else {

                            if ($dataGeneral->id_satset_nadi !== null && $dataGeneral->id_satset_nadi !== '') {

                                $f = $this->kirimDataObservasi('nadi', $data);

                                $arrPeriksa['id_satset_nadi'] = $f;
                            }
                        }
                    }

                    if (isset($data['rr'])) {

                        if ($data['rr'] !== '' && $data['rr'] !== null) {

                            $g = $this->kirimDataObservasi('rr', $data);

                            $arrPeriksa['id_satset_rr'] = $g;
                        } else {

                            if ($dataGeneral->id_satset_rr !== null && $dataGeneral->id_satset_rr !== '') {

                                $h = $this->kirimDataObservasi('rr', $data);

                                $arrPeriksa['id_satset_rr'] = $h;
                            }
                        }
                    }

                    if (isset($data['suhu'])) {

                        if ($data['suhu'] !== '' && $data['suhu'] !== null) {

                            $i = $this->kirimDataObservasi('suhu', $data);

                            $arrPeriksa['id_satset_suhu'] = $i;
                        }
                    } else {

                        if ($dataGeneral->id_satset_suhu !== null && $dataGeneral->id_satset_suhu !== '') {

                            $j = $this->kirimDataObservasi('suhu', $data);

                            $arrPeriksa['id_satset_suhu'] = $j;
                        }
                    }

                    if (!empty($arrPeriksa)) {

                        $this->db->where('id_layanan_pendaftaran', $data['id_layanan_pendaftaran'])->update('sm_anamnesa', $arrPeriksa);
                    }
                }
            }

        }
    }

    private function kirimDataObservasi($var, $data)
    {

        if (isset($var)) {

            $this->autentikasi_user_post();

            $this->load->model('satu_sehat/Satu_sehat_model', 'sehat');

            $dataGeneral = $this->sehat->cekidLayananPendaftaran((int)$data['id_layanan_pendaftaran']);

            if (isset($dataGeneral->id_encounter)) {

                date_default_timezone_set('Asia/Jakarta');

                $dateString = $dataGeneral->tanggal_periksa;

                $date = new DateTime($dateString);

                $formattedDate = $date->format('Y-m-d\TH:i:s+00:00');

                $xKonfigurasi = $this->sehat->getConfigSatuSehat();

                $idUser = $this->session->userdata('id_translucent');

                $getID = $this->sehat->aksesSatuSehat($idUser);

                $tokenBearer = $getID->token;

                $xKonfigurasi = $this->sehat->getConfigSatuSehat();

                $header = $this->sehat->authBearer($tokenBearer);

                if ($var === 'sistolik') {

                    $code = '8480-6';
                    $display = 'Systolic blood pressure';
                    $periksa = 'Sistolik';
                    $dataUnit = "mm[Hg]";
                    $valueCode = "mm[Hg]";

                    if ($dataGeneral->id_satset_sistolik !== null && $dataGeneral->id_satset_sistolik !== '') {

                        $type = 'update';
                        $idSatset = $dataGeneral->id_satset_sistolik;

                        if ($data['tensi_sistolik'] !== '' && $data['tensi_sistolik'] !== null) {

                            $dataValue = (int)$data['tensi_sistolik'];
                            $status = 'amended';
                        } else {

                            $dataValue = 0;
                            $status = 'cancelled';
                        }
                    } else {

                        $dataValue = (int)$data['tensi_sistolik'];
                        $type = 'new';
                    }
                }

                if ($var === 'diastolik') {

                    $code = '8462-4';
                    $display = 'Diastolic blood pressure';
                    $periksa = 'Diastolik';
                    $dataUnit = "mm[Hg]";
                    $valueCode = "mm[Hg]";

                    if ($dataGeneral->id_satset_diastolik !== null && $dataGeneral->id_satset_diastolik !== '') {

                        $type = 'update';
                        $idSatset = $dataGeneral->id_satset_diastolik;

                        if ($data['tensi_diastolik'] !== '' && $data['tensi_diastolik'] !== null) {

                            $status = 'amended';
                            $dataValue = (int)$data['tensi_diastolik'];
                        } else {

                            $dataValue = 0;

                            $status = 'cancelled';
                        }
                    } else {

                        $dataValue = (int)$data['tensi_diastolik'];
                        $type = 'new';
                    }
                }

                if ($var === 'nadi') {

                    $code = '8867-4';
                    $display = 'Heart rate';
                    $periksa = 'Nadi';
                    $dataUnit = "beats/minute";
                    $valueCode = "/min";

                    if ($dataGeneral->id_satset_nadi !== null && $dataGeneral->id_satset_nadi !== '') {

                        $type = 'update';
                        $idSatset = $dataGeneral->id_satset_nadi;

                        if ($data['nadi'] !== '' && $data['nadi'] !== null) {

                            $status = 'amended';
                            $dataValue = (int)$data['nadi'];
                        } else {

                            $dataValue = 0;
                            $status = 'cancelled';
                        }
                    } else {

                        $type = 'new';
                        $dataValue = (int)$data['nadi'];
                    }
                }

                if ($var === 'rr') {

                    $code = '9279-1';
                    $display = 'Respiratory rate';
                    $periksa = 'Pernafasan';
                    $dataUnit = "breaths/minute";
                    $valueCode = "/min";

                    if ($dataGeneral->id_satset_rr !== null && $dataGeneral->id_satset_rr !== '') {

                        $type = 'update';
                        $idSatset = $dataGeneral->id_satset_rr;

                        if ($data['rr'] !== '' && $data['rr'] !== null) {

                            $status = 'amended';
                            $dataValue = (int)$data['rr'];
                        } else {

                            $dataValue = 0;
                            $status = 'cancelled';
                        }
                    } else {

                        $type = 'new';
                        $dataValue = (int)$data['rr'];
                    }
                }

                if ($var === 'suhu') {

                    $code = '8310-5';
                    $display = 'Body temperature';
                    $periksa = 'Suhu';
                    $dataUnit = "C";
                    $valueCode = "Cel";

                    if ($dataGeneral->id_satset_suhu !== null && $dataGeneral->id_satset_suhu !== '') {

                        $type = 'update';
                        $idSatset = $dataGeneral->id_satset_suhu;

                        if ($data['suhu'] !== '' && $data['suhu'] !== null) {

                            $status = 'amended';
                            $dataValue = (int)$data['suhu'];
                        } else {

                            $dataValue = 0;
                            $status = 'cancelled';
                        }
                    } else {

                        $type = 'new';
                        $dataValue = (int) $data['suhu'];
                    }
                }

                if ($type === 'new') {

                    $url = $xKonfigurasi->apiurl . "Observation";

                    $params = array(
                        "resourceType" => "Observation",
                        "status" => "final",
                        "category" => [
                            array(
                                "coding" => [
                                    array(
                                        "system" =>
                                        "http://terminology.hl7.org/CodeSystem/observation-category",
                                        "code" => "vital-signs",
                                        "display" => "Vital Signs"
                                    )
                                ]
                            )
                        ],
                        "code" => array(
                            "coding" => [
                                array(
                                    "system" => "http://loinc.org",
                                    "code" => $code,
                                    "display" => $display
                                )
                            ]
                        ),
                        "subject" => array(
                            "reference" => "Patient/" . $dataGeneral->ihsn
                        ),
                        "performer" => [
                            array(
                                "reference" => "Practitioner/" . $dataGeneral->ihs_number
                            )
                        ],
                        "encounter" => array(
                            "reference" => "Encounter/" . $dataGeneral->id_encounter,
                            "display" => "Pemeriksaan Fisik " . $periksa . " " . $dataGeneral->nama_pasien . " di hari " . convertDateIndo($dataGeneral->tanggal_periksa)
                        ),
                        "effectiveDateTime" => $formattedDate,
                        "valueQuantity" => array(
                            "value" => $dataValue,
                            "unit" => $dataUnit,
                            "system" => "http://unitsofmeasure.org",
                            "code" => $valueCode
                        )
                    );

                    $data_api = json_encode($params);
                    $output = $this->sehat->postEncounter($url, $data_api, $header);
                } else {

                    $url = $xKonfigurasi->apiurl . "Observation/" . $idSatset;

                    $params = array(
                        "resourceType" => "Observation",
                        "status" => $status,
                        "category" => [
                            array(
                                "coding" => [
                                    array(
                                        "system" =>
                                        "http://terminology.hl7.org/CodeSystem/observation-category",
                                        "code" => "vital-signs",
                                        "display" => "Vital Signs"
                                    )
                                ]
                            )
                        ],
                        "code" => array(
                            "coding" => [
                                array(
                                    "system" => "http://loinc.org",
                                    "code" => $code,
                                    "display" => $display
                                )
                            ]
                        ),
                        "subject" => array(
                            "reference" => "Patient/" . $dataGeneral->ihsn
                        ),
                        "performer" => [
                            array(
                                "reference" => "Practitioner/" . $dataGeneral->ihs_number
                            )
                        ],
                        "encounter" => array(
                            "reference" => "Encounter/" . $dataGeneral->id_encounter,
                            "display" => "Pemeriksaan Fisik " . $periksa . " " . $dataGeneral->nama_pasien . " di hari " . convertDateIndo($dataGeneral->tanggal_periksa)
                        ),
                        "id" => $idSatset,
                        "effectiveDateTime" => $formattedDate,
                        "valueQuantity" => array(
                            "value" => $dataValue,
                            "unit" => $dataUnit,
                            "system" => "http://unitsofmeasure.org",
                            "code" => $valueCode
                        )
                    );

                    $data_api = json_encode($params);
                    $output = $this->sehat->putEncounter($url, $data_api, $header);
                }

                if($output['result'] !== false){

                    if ($output['respon'] === 201) {

                        $result = json_decode($output['result']);

                        date_default_timezone_set('Asia/Jakarta');

                        $xDetailData = ["kategori" => "Observation", "no_rm" => $dataGeneral->no_rm, "message" => json_encode($params), "jenis_data" => 'ok', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama')];

                        $this->db->insert('sm_satu_sehat_log', $xDetailData);
                    } else if ($output['respon'] === 200) {

                        $result = json_decode($output['result']);

                        date_default_timezone_set('Asia/Jakarta');

                        $xDetailData = ["kategori" => "Update Observation", "no_rm" => $dataGeneral->no_rm, "message" => json_encode($params), "jenis_data" => 'ok', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama')];

                        $this->db->insert('sm_satu_sehat_log', $xDetailData);
                    } else {

                        $result = json_decode($output['result']);

                        if (isset($result->issue)) {

                            $issued = $result->issue;
                            $details = $issued[0]->details;
                            date_default_timezone_set('Asia/Jakarta');
                            $xDetailData = ["kategori" => "Observation", "no_rm" => $dataGeneral->no_rm, "message" => json_encode($details), "jenis_data" => 'error', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama')];
                            $this->db->insert('sm_satu_sehat_log', $xDetailData);
                        } else {

                            date_default_timezone_set('Asia/Jakarta');
                            $xDetailData = ["kategori" => "Observation", "no_rm" => $dataGeneral->no_rm, "message" => $output['result'], "jenis_data" => 'error', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama')];
                            $this->db->insert('sm_satu_sehat_log', $xDetailData);
                        }
                    }

                    if (isset($result->id)) {

                        return $result->id;
                    } else {

                        if (isset($result->issue)) {

                            return $issued[0]->details;
                        } else {

                            $x = 'error';
                            return $x;
                        }
                    }

                } else {

                    $x = 'error';
                    return $x;

                }
            }
        }
    }

    private function autentikasi_user_post()
    {

        $this->load->model('satu_sehat/Satu_sehat_model', 'sehat');

        $idUser = $this->session->userdata('id_translucent');

        $dataAkses = $this->sehat->aksesSatuSehat($idUser);

        $xKonfigurasi = $this->sehat->getConfigSatuSehat();

        if(empty($dataAkses)){

            $cekTimeissued = $this->sehat->aksesTimeissued();

            $waktu = (int)$cekTimeissued->timeissued;

            date_default_timezone_set('Asia/Jakarta');
            $tanggalTunggu = (round(microtime(true) * 1000));
            $satuJam = 120000;
            $tglWaktu = (int)$tanggalTunggu - (int)$waktu;

            if((int)$tglWaktu === (int)$satuJam || (int)$tglWaktu > (int)$satuJam){

                $url = $xKonfigurasi->auth."accesstoken?grant_type=client_credentials";

                $header = $this->sehat->authHeader();

                $params=array(
                                "client_id" => $xKonfigurasi->clientid,
                                "client_secret" => $xKonfigurasi->clientsecret
                            );
                
                $data_api = http_build_query($params);

                $output = $this->sehat->postCurl($url, $data_api, $header);

                if($output['result'] !== false){

                    if($output['respon'] === 200){

                        $result = json_decode($output['result']);
                        date_default_timezone_set('Asia/Jakarta');

                        $data_response = array(

                            "userakses"         => (int)$idUser,
                            "nama"              => $this->session->userdata('nama'),
                            "token"             => $result->access_token,
                            "timeissued"        => $result->issued_at,
                            "app_name"          => $result->application_name,
                            "tanggal"           => date('Y-m-d H:i:s')

                        );

                        $this->db->insert('sm_akses_satu_sehat', $data_response);

                    } else {

                        date_default_timezone_set('Asia/Jakarta');

                        $dataResponse = array(

                            "userakses"         => (int)$idUser,
                            "nama"              => $this->session->userdata('nama'),
                            "token"             => $cekTimeissued->token,
                            "timeissued"        => $cekTimeissued->timeissued,
                            "app_name"          => $cekTimeissued->app_name,
                            "tanggal"           => date('Y-m-d H:i:s')

                        );

                        $this->db->insert('sm_akses_satu_sehat', $dataResponse);

                        $xDetailData = ["kategori" => "Autentikasi", "param" => $idUser, "message" => $output['result'], "jenis_data" => 'error', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama'), "respon" => $output['respon'], "function" => 'autentikasi_user_post Pelayanan Model'];
                        $this->db->insert('sm_satu_sehat_log', $xDetailData);

                    }

                } else {

                    date_default_timezone_set('Asia/Jakarta');

                    $dataResponse = array(

                        "userakses"         => (int)$idUser,
                        "nama"              => $this->session->userdata('nama'),
                        "token"             => $cekTimeissued->token,
                        "timeissued"        => $cekTimeissued->timeissued,
                        "app_name"          => $cekTimeissued->app_name,
                        "tanggal"           => date('Y-m-d H:i:s')

                    );

                    $this->db->insert('sm_akses_satu_sehat', $dataResponse);

                    $xDetailData = ["kategori" => "Autentikasi", "param" => $idUser, "message" => 'false', "jenis_data" => 'error', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama'), "function" => 'autentikasi_user_post Pelayanan Model'];
                    $this->db->insert('sm_satu_sehat_log', $xDetailData);

                }

            } else {

                date_default_timezone_set('Asia/Jakarta');

                $dataResponse = array(

                    "userakses"         => (int)$idUser,
                    "nama"              => $this->session->userdata('nama'),
                    "token"             => $cekTimeissued->token,
                    "timeissued"        => $cekTimeissued->timeissued,
                    "app_name"          => $cekTimeissued->app_name,
                    "tanggal"           => date('Y-m-d H:i:s')

                );

                $this->db->insert('sm_akses_satu_sehat', $dataResponse);

            }

        } else {

            $cekTimeissued = $this->sehat->aksesTimeissued();

            if(isset($dataAkses->timeissued) && !is_null($dataAkses->timeissued)){

                $waktu = (int)$cekTimeissued->timeissued;

                date_default_timezone_set('Asia/Jakarta');
                $tanggalTunggu = (round(microtime(true) * 1000));
                $satuJam = 120000;
                $tglWaktu = (int)$tanggalTunggu - (int)$waktu;

                if((int)$tglWaktu === (int)$satuJam || (int)$tglWaktu > (int)$satuJam){

                    $url = $xKonfigurasi->auth."accesstoken?grant_type=client_credentials";

                    $header = $this->sehat->authHeader();

                    $params=array(
                                    "client_id" => $xKonfigurasi->clientid,
                                    "client_secret" => $xKonfigurasi->clientsecret
                                );
                    
                    $data_api = http_build_query($params);

                    $output = $this->sehat->postCurl($url, $data_api, $header);

                    if($output['result'] !== false){

                        if($output['respon'] === 200){

                            $result = json_decode($output['result']);
                            date_default_timezone_set('Asia/Jakarta');

                            $data_response = array(

                                "userakses"         => (int)$idUser,
                                "nama"              => $this->session->userdata('nama'),
                                "token"             => $result->access_token,
                                "timeissued"        => $result->issued_at,
                                "app_name"          => $result->application_name,
                                "tanggal"           => date('Y-m-d H:i:s')

                            );

                            $this->db->insert('sm_akses_satu_sehat', $data_response);

                        } else {

                            date_default_timezone_set('Asia/Jakarta');

                            $dataResponse = array(

                                "userakses"         => (int)$idUser,
                                "nama"              => $this->session->userdata('nama'),
                                "token"             => $cekTimeissued->token,
                                "timeissued"        => $cekTimeissued->timeissued,
                                "app_name"          => $cekTimeissued->app_name,
                                "tanggal"           => date('Y-m-d H:i:s')

                            );

                            $this->db->insert('sm_akses_satu_sehat', $dataResponse);

                            $xDetailData = ["kategori" => "Autentikasi", "param" => $idUser, "message" => $output['result'], "jenis_data" => 'error', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama'), "respon" => $output['respon'], "function" => 'autentikasi_user_post Pelayanan Model'];
                            $this->db->insert('sm_satu_sehat_log', $xDetailData);

                        }

                    } else {

                        date_default_timezone_set('Asia/Jakarta');

                        $dataResponse = array(

                            "userakses"         => (int)$idUser,
                            "nama"              => $this->session->userdata('nama'),
                            "token"             => $cekTimeissued->token,
                            "timeissued"        => $cekTimeissued->timeissued,
                            "app_name"          => $cekTimeissued->app_name,
                            "tanggal"           => date('Y-m-d H:i:s')

                        );

                        $this->db->insert('sm_akses_satu_sehat', $dataResponse);

                        $xDetailData = ["kategori" => "Autentikasi", "param" => $idUser, "message" => $output['result'], "jenis_data" => 'error', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama'), "respon" => $output['respon'], "function" => 'autentikasi_user_post Satu Sehat Model'];
                        $this->db->insert('sm_satu_sehat_log', $xDetailData);

                    }

                } else {

                    date_default_timezone_set('Asia/Jakarta');

                    $update = ["token" => $cekTimeissued->token,"timeissued" => $cekTimeissued->timeissued,"app_name" => $cekTimeissued->app_name,"tanggal" => date('Y-m-d H:i:s')];

                    $id = (int)$idUser;

                    $this->db->where('userakses', $id)->update('sm_akses_satu_sehat', $update);

                    $xDetailData = ["kategori" => "Autentikasi", "param" => $idUser, "message" => 'false', "jenis_data" => 'error', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama'), "function" => 'autentikasi_user_post Satu Sehat Model'];
                    $this->db->insert('sm_satu_sehat_log', $xDetailData);

                }

            } else {

                $cekTimeissued = $this->sehat->aksesTimeissued();

                $url = $xKonfigurasi->auth."accesstoken?grant_type=client_credentials";

                $header = $this->sehat->authHeader();

                $params=array(
                                "client_id" => $xKonfigurasi->clientid,
                                "client_secret" => $xKonfigurasi->clientsecret
                            );
                
                $data_api = http_build_query($params);

                $output = $this->sehat->postCurl($url, $data_api, $header);

                if($output['result'] !== false){

                    if($output['respon'] === 200){

                        $result = json_decode($output['result']);
                        date_default_timezone_set('Asia/Jakarta');

                        $data_response = array(

                            "userakses"         => (int)$idUser,
                            "nama"              => $this->session->userdata('nama'),
                            "token"             => $result->access_token,
                            "timeissued"        => $result->issued_at,
                            "app_name"          => $result->application_name,
                            "tanggal"           => date('Y-m-d H:i:s')

                        );

                        $this->db->insert('sm_akses_satu_sehat', $data_response);

                    } else {

                        date_default_timezone_set('Asia/Jakarta');

                        $dataResponse = array(

                            "userakses"         => (int)$idUser,
                            "nama"              => $this->session->userdata('nama'),
                            "token"             => $cekTimeissued->token,
                            "timeissued"        => $cekTimeissued->timeissued,
                            "app_name"          => $cekTimeissued->app_name,
                            "tanggal"           => date('Y-m-d H:i:s')

                        );

                        $this->db->insert('sm_akses_satu_sehat', $dataResponse);

                        $xDetailData = ["kategori" => "Autentikasi", "param" => $idUser, "message" => $output['result'], "jenis_data" => 'error', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama'), "respon" => $output['respon'], "function" => 'autentikasi_user_post Pelayanan Model'];
                        $this->db->insert('sm_satu_sehat_log', $xDetailData);

                    }

                } else {

                    date_default_timezone_set('Asia/Jakarta');

                    $dataResponse = array(

                        "userakses"         => (int)$idUser,
                        "nama"              => $this->session->userdata('nama'),
                        "token"             => $cekTimeissued->token,
                        "timeissued"        => $cekTimeissued->timeissued,
                        "app_name"          => $cekTimeissued->app_name,
                        "tanggal"           => date('Y-m-d H:i:s')

                    );

                    $this->db->insert('sm_akses_satu_sehat', $dataResponse);

                    $xDetailData = ["kategori" => "Autentikasi", "param" => $idUser, "message" => 'false', "jenis_data" => 'error', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama'), "function" => 'autentikasi_user_post Pelayanan Model'];
                    $this->db->insert('sm_satu_sehat_log', $xDetailData);

                }
                
            }

        }

    }

    function insertSOAP($data)
    {
        if (is_array($data['s_soap'])) :
            foreach ($data['s_soap'] as $i => $value) :
                $data_insert = array(
                    'id_layanan_pendaftaran' => $data['id_layanan_pendaftaran'],
                    'waktu' => $this->datetime,
                    'id_dokter' => $data['id_dokter'],
                    'jenis' => $data['jenis'],
                    'subject' => $value,
                    'objective' => $data['o_soap'][$i],
                    'assessment' => $data['a_soap'][$i],
                    'plan' => $data['p_soap'][$i],
                );

                $this->db->insert('sm_soap', $data_insert);
            endforeach;
        endif;
    }

    function simpanDiagnosaPemeriksaan($id_layanan, $data, $id_pasien = NULL)
    {
        if (is_array($data['id_diag'])) :
            foreach ($data['id_diag'] as $i => $value) :
                $prioritas = $data['prioritas'][$i];
                $is_resume = $data['is_resume'][$i] ?? 1;
                if ($value === '') :
                    if ($data['id_golongan_sebab_sakit'][$i] == '') :
                        $data['id_golongan_sebab_sakit'][$i] = NULL;
                    endif;

                    $insert = array(
                        'id_layanan_pendaftaran'    => $id_layanan,
                        'waktu'                     => $this->datetime,
                        'id_dokter'                 => $data['id_dokter'][$i],
                        'id_golongan_sebab_sakit'   => $data['id_golongan_sebab_sakit'][$i],
                        'diagnosa_manual'           => $data['diagnosa_manual'][$i],
                        // 'diagnosa_manual'           => 0, 
                        'golongan_sebab_sakit_lain' => $data['golongan_sebab_sakit_lain'][$i],
                        // 'diagnosa_klinis'           => $data['diagnosa_klinis'][$i], 
                        'diagnosa_klinis'           => 0,
                        'prioritas'                 => $data['prioritas'][$i],
                        'jenis_kasus'               => @$data['jenis_kasus'][$i],
                        'diagnosa_banding'          => $data['diagnosa_banding'][$i],
                        'diagnosa_akhir'            => $data['diagnosa_akhir'][$i],
                        'penyebab_kematian'         => $data['penyebab_kematian'][$i],
                        'is_resume'                 => $data['is_resume'][$i] ?? 1,
                    );

                    if (isset($data['post'])) :
                        $insert['post'] = $data['post'][0];
                    endif;
                    $this->db->insert('sm_diagnosa', $insert);

                    if ($id_pasien !== NULL) :
                        $cek_profil_pasien = $this->getProfilPasien($id_pasien);
                        if (count((array)$cek_profil_pasien) > 0) :
                            if (isset($data['kode_diagnosa'][$i])) :
                                // update profil pasien is_hiv jika kode diagnosa B20
                                if ($data['kode_diagnosa'][$i] === 'B20') :
                                    $this->db->where('id_pasien', $id_pasien)->update('sm_profil_pasien', array('is_hiv' => 'Ya'));
                                endif;
                                if ($data['kode_diagnosa'][$i] === 'A54') :
                                    $this->db->where('id_pasien', $id_pasien)->update('sm_profil_pasien', array('is_gonorrhea' => 'Ya'));
                                endif;
                                if ($data['kode_diagnosa'][$i] === 'B15' || $data['kode_diagnosa'][$i] === 'B16' || $data['kode_diagnosa'][$i] === 'B17' || $data['kode_diagnosa'][$i] === 'B18' || $data['kode_diagnosa'][$i] === 'B19') :
                                    $this->db->where('id_pasien', $id_pasien)->update('sm_profil_pasien', array('is_hepatitis' => 'Ya'));
                                endif;
                                if ($data['kode_diagnosa'][$i] === 'A30') :
                                    $this->db->where('id_pasien', $id_pasien)->update('sm_profil_pasien', array('is_kusta' => 'Ya'));
                                endif;
                                if ($data['kode_diagnosa'][$i] === 'A16' || $data['kode_diagnosa'][$i] === 'A17' || $data['kode_diagnosa'][$i] === 'A18' || $data['kode_diagnosa'][$i] === 'A19') :
                                    $this->db->where('id_pasien', $id_pasien)->update('sm_profil_pasien', array('is_tbc' => 'Ya'));
                                endif;
                            endif;
                        endif;
                    endif;
                else :
                    $update = array(
                        'prioritas' => $prioritas,
                        'is_resume' => $is_resume
                    );
                    if (isset($data['post'])) :
                        $update['post'] = $data['post'][0];
                    endif;
                    $this->db->where('id', $value, true);
                    $this->db->update('sm_diagnosa', $update);
                endif;
            endforeach;
        endif;
    }

    function updateDokterTindakanKonsultasi($id_layanan, $dokter_dpjp, $status)
    {
        if ($dokter_dpjp !== '' & $dokter_dpjp !== NULL) :
            $sql_konsul = "select ttp.* 
                            from sm_tarif_tindakan_pasien as ttp 
                            where ttp.id_layanan_pendaftaran = '" . $id_layanan . "' 
                            and ttp.id_operator is null 
                            and ttp.id_tarif_pelayanan not in ( '1' ) 
                            order by id 
                            limit 1";
            $konsul = $this->db->query($sql_konsul)->row();

            if (0 < count((array)$konsul)) :
                $tindakan = $this->m_pelayanan->getTindakanDetail($konsul->id);
                $catatan = 'Tindakan : ' . $tindakan->layanan;
                $catatan .= '<br>Sebelum edit : Operator ' . $tindakan->operator;

                // $update = ['id_operator' => $dokter_dpjp];
                // $this->db->where('id', $konsul->id, true)->update('sm_tarif_tindakan_pasien', $update);
                // $sql = "UPDATE sm_tarif_tindakan_pasien SET id_operator = '".$dokter_dpjp."' WHERE id = '".$konsul->id."'";
                // $this->db->query($sql);
                // $this->db->affected_rows();

                $tindakan = $this->m_pelayanan->getTindakanDetail($konsul->id);
                $catatan .= '<br>Setelah edit : Operator ' . $tindakan->operator;

                $this->load->model('logs/Logs_model', 'm_logs');
                $this->m_logs->recordAdminLogs($id_layanan, 'Edit Operator Tindakan', $catatan);
            else :
                if ($status === 'Belum') :
                    $sql_cek = "select pd.no_register, sp.nama as klinik
                                from sm_layanan_pendaftaran as lp
                                join sm_pendaftaran as pd on (pd.id = lp.id_pendaftaran)
                                left join sm_spesialisasi as sp on (sp.id = lp.id_unit_layanan) 
                                where lp.id = '" . $id_layanan . "'";
                    $no_reg = '';
                    $klinik = '';

                    $cek = $this->db->query($sql_cek)->row();
                    if (0 < count((array)$cek)) :
                        $no_reg = $cek->no_register;
                        $klinik = $cek->klinik;
                    endif;

                    $data_logs = array(
                        'waktu'       => $this->datetime,
                        'status'      => 'Query Result Null',
                        'id_dokter'   => $dokter_dpjp,
                        'query'       => $sql_konsul,
                        'no_register' => $no_reg,
                        'klinik'      => $klinik
                    );
                    $this->db->insert('sm_logs_error', $data_logs);
                endif;
            endif;
        else :
            $data_logs = array(
                'waktu'       => $this->datetime,
                'status'      => 'DPJP Null',
                'id_dokter'   => $dokter_dpjp,
                'query'       => '',
                'no_register' => '',
                'klinik'      => ''
            );
            $this->db->insert('sm_logs_error', $data_logs);
        endif;
    }

    function updateWaktuPeriksa($data)
    {
        $lp = $this->db->select('tanggal_periksa', true)
            ->from('sm_layanan_pendaftaran')
            ->where('id', $data['id_layanan_pendaftaran'], true)
            ->get()
            ->row();
        if (0 < count((array)$lp) && $lp->tanggal_periksa === NULL) :
            $this->db->update('sm_layanan_pendaftaran', array('tanggal_periksa' => $data['waktu']), array('id' => $data['id_layanan_pendaftaran']));
        endif;
    }

    // Tindakan
    function getTindakanDetail($id)
    {
        $this->db->select("ttp.id, ttp.tanggal, ttp.id_layanan_pendaftaran, 
                        ttp.jenis_transaksi, ttp.id_operator, ttp.id_tarif_pelayanan,
                        ttp.id_penjamin, ttp.total, ttp.id_user,
                        coalesce(pg.nama, '') as operator,
                        concat_ws(' kelas ', concat_ws(' ', l.nama, ' - ', tp.jenis, tp.bobot), k.nama) as layanan,
                        tp.keterangan,
                        coalesce(tr.account, '') as user", true);
        $this->db->from('sm_tarif_tindakan_pasien as ttp');
        $this->db->join('sm_tarif_pelayanan as tp', 'tp.id = ttp.id_tarif_pelayanan');
        $this->db->join('sm_kelas as k', 'k.id = tp.id_kelas', 'left');
        $this->db->join('sm_layanan as l', 'l.id = tp.id_layanan');
        $this->db->join('sm_tenaga_medis as tm', 'tm.id = ttp.id_operator', 'left');
        $this->db->join('sm_pegawai as pg', 'pg.id = tm.id_pegawai', 'left');
        $this->db->join('sm_translucent as tr', 'tr.id = ttp.id_user');
        $this->db->where('ttp.id', $id, true);

        // $this->db->get(); echo $this->db->last_query(); die;

        return $this->db->get()->row();
    }

    function getLastLayananPendaftaran($id_pendaftaran)
    {
        return $this->db->select('*')
            ->from('sm_layanan_pendaftaran')
            ->where('id_pendaftaran', $id_pendaftaran)
            ->order_by('id', 'asc')
            ->limit('1, 0')
            ->get()
            ->row();
    }

    function updateLastLayanan($id_layanan_pendaftaran, $second_last = false)
    {
        $lp = $this->db->select(array('id_pendaftaran'))->where('id', $id_layanan_pendaftaran)->get('sm_layanan_pendaftaran')->row();
        $this->db->select('id_pendaftaran, jenis_layanan, id_unit_layanan')
            ->from('sm_layanan_pendaftaran')
            ->where('id_pendaftaran', $lp->id_pendaftaran)
            ->where('status_terlayani !=', 'Batal');

        if (!$second_last) :
            $this->db->where('id <', $id_layanan_pendaftaran);
        endif;

        $this->db->order_by('id', 'desc');
        $this->db->limit(1, 0);
        $second_last_lp = $this->db->get()->row();
        $jenis_rawat = 'Jalan';
        $keterangan = '';
        if ($second_last_lp->jenis_layanan === 'Rawat Inap' | $second_last_lp->jenis_layanan === 'Intensive Care') :
            $jenis_rawat = 'Inap';
            $keterangan = $second_last_lp->jenis_layanan;
        else :
            if ($second_last_lp->jenis_layanan === 'Poliklinik') :
                $jenis_rawat = 'Jalan';
                $this->load->model('spesialisasi/Spesialisasi_model', 'sp');
                $spesialisasi = $this->sp->getDataSpesialisasiById($second_last_lp->id_unit_layanan);
                $keterangan = $second_last_lp->jenis_layanan . ' ' . $spesialisasi->nama;
            else :
                $jenis_rawat = 'Jalan';
                $keterangan = $second_last_lp->jenis_layanan;
            endif;
        endif;

        $data_update = array('jenis_rawat' => $jenis_rawat, 'keterangan' => $keterangan);
        $this->db->where('id', $lp->id_pendaftaran)->update('sm_pendaftaran', $data_update);
    }

    private function konversiTanggalParameter($tanggal){

        date_default_timezone_set('Asia/Jakarta');

        $konvTanggal = date("Y-m-d\TH:i:sP", strtotime($tanggal));

        return $konvTanggal;

    }

    function serviceRequestStatus($idLayananPendaftaran, $status, $jenisDaftar, $waktu_estimasi = null, $idLayananRanap = null){

        $this->load->model('satu_sehat/Satu_sehat_model', 'sehat');

        if($idLayananPendaftaran === null){

            date_default_timezone_set('Asia/Jakarta');
            $xDetailData = ["kategori" => "ServiceRequest", "param" => $idLayananPendaftaran, "message" => 'ID Layanan Pendaftaran Tidak ada', "jenis_data" => 'error', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama'), "function" => 'serviceRequestStatus Model Pelayanan'];
            $this->db->insert('sm_satu_sehat_log', $xDetailData);
            return;
        
        }

        if($jenisDaftar === null | $jenisDaftar === ''){

            date_default_timezone_set('Asia/Jakarta');
            $xDetailData = ["kategori" => "ServiceRequest", "param" => $idLayananPendaftaran, "message" => 'Tidak Ada Jenis Daftar', "jenis_data" => 'error', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama'), "function" => 'serviceRequestStatus Model Pelayanan'];
            $this->db->insert('sm_satu_sehat_log', $xDetailData);
            return;
        
        }

        if($jenisDaftar === 'layanan'){
            
            $data = $this->sehat->cekDataLayananPendaftaran((int)$idLayananPendaftaran);

        } else if($jenisDaftar === 'daftar'){

            $data = $this->sehat->cekDataPendaftaran((int)$idLayananPendaftaran);

        }

        $this->autentikasi_user_post();

        if($jenisDaftar === 'layanan'){

            if($status === 'Rawat Inap'){

                $xStatus = 'active';
                $xIntent = 'instance-order';

                if($idLayananRanap === null | $idLayananRanap === ''){

                    date_default_timezone_set('Asia/Jakarta');
                    $xDetailData = ["kategori" => "ServiceRequest", "param" => $data->no_rm, "message" => 'Tidak Ada id Layanan Pendaftaran Rawat Inap', "jenis_data" => 'error', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama'), "function" => 'serviceRequestStatus Model Pelayanan'];
                    $this->db->insert('sm_satu_sehat_log', $xDetailData);
                    return;
                
                }

                $dataRanap = $this->sehat->cekDataLayananPendaftaran((int)$idLayananRanap);
                $waktuEstimasi = $dataRanap->tanggal_layanan;

            } else if($status === 'Atas Izin Dokter'){

                if($data->surat_kontrol === null){

                    $xStatus = 'completed';
                    $xIntent = 'proposal';
                    $waktuEstimasi = $data->daftar_selesai;

                    if($waktuEstimasi === null | $waktuEstimasi === ''){

                        date_default_timezone_set('Asia/Jakarta');
                        $xDetailData = ["kategori" => "ServiceRequest", "param" => $data->no_rm, "message" => 'Tidak Ada Waktu Estimasi', "jenis_data" => 'error', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama'), "function" => 'serviceRequestStatus Model Pelayanan'];
                        $this->db->insert('sm_satu_sehat_log', $xDetailData);
                        return;
                    
                    }

                } else {

                    $xStatus = 'on-hold';
                    $xIntent = 'plan';
                    $waktuEstimasi = $waktu_estimasi;

                    if($waktuEstimasi === null | $waktuEstimasi === ''){

                        date_default_timezone_set('Asia/Jakarta');
                        $xDetailData = ["kategori" => "ServiceRequest", "param" => $data->no_rm, "message" => 'Tidak Ada Waktu Estimasi', "jenis_data" => 'error', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama'), "function" => 'serviceRequestStatus Model Pelayanan'];
                        $this->db->insert('sm_satu_sehat_log', $xDetailData);
                        return;
                    
                    }

                }

            } else if($status === 'IGD'){

                $xStatus = 'active';
                $xIntent = 'order';

                $dataLayanDaftar = $this->sehat->cekDataPendaftaran((int)$data->id_pendaftaran);

                foreach ($dataLayanDaftar as $key => $value) {

                    if($value->jenis_layanan === 'IGD'){

                        $tampungData[] = $value;

                        break;

                    }

                }
                
                $waktuEstimasi = $tampungData[0]->tanggal_layanan;

                if (empty($waktuEstimasi)){

                    date_default_timezone_set('Asia/Jakarta');

                     $xDetailData = ["kategori" => "ServiceRequest", "no_rm" => $data->no_rm, "message" => 'Waktu Estimasi', "jenis_data" => 'error', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama'), "function" => 'serviceRequestStatus pelayanan IGD'];

                    $this->db->insert('sm_satu_sehat_log', $xDetailData);

                    return;
                
                }

                if (empty($xStatus)){

                    date_default_timezone_set('Asia/Jakarta');

                     $xDetailData = ["kategori" => "ServiceRequest", "no_rm" => $data->no_rm, "message" => 'xStatus', "jenis_data" => 'error', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama'), "function" => 'serviceRequestStatus pelayanan IGD'];

                    $this->db->insert('sm_satu_sehat_log', $xDetailData);

                    return;
                 
                 }

                if (empty($xIntent)){

                    date_default_timezone_set('Asia/Jakarta');

                     $xDetailData = ["kategori" => "ServiceRequest", "no_rm" => $data->no_rm, "message" => 'xIntent', "jenis_data" => 'error', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama'), "function" => 'serviceRequestStatus pelayanan IGD'];

                    $this->db->insert('sm_satu_sehat_log', $xDetailData);

                    return;
                }

            } else if($status === 'Pulang APS'){

                $xStatus = 'active';
                $xIntent = 'original-order';
                $waktuEstimasi = $data->daftar_selesai;

                if (empty($waktuEstimasi)){

                    date_default_timezone_set('Asia/Jakarta');

                     $xDetailData = ["kategori" => "ServiceRequest", "no_rm" => $data->no_rm, "message" => 'Waktu Estimasi', "jenis_data" => 'error', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama'), "function" => 'serviceRequestStatus pelayanan Pulang APS'];

                    $this->db->insert('sm_satu_sehat_log', $xDetailData);

                    return;
                }

                if (empty($xStatus)){

                    date_default_timezone_set('Asia/Jakarta');

                     $xDetailData = ["kategori" => "ServiceRequest", "no_rm" => $data->no_rm, "message" => 'xStatus', "jenis_data" => 'error', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama'), "function" => 'serviceRequestStatus pelayanan Pulang APS'];

                    $this->db->insert('sm_satu_sehat_log', $xDetailData);

                    return;
                
                }

                if (empty($xIntent)){

                    date_default_timezone_set('Asia/Jakarta');

                     $xDetailData = ["kategori" => "ServiceRequest", "no_rm" => $data->no_rm, "message" => 'xIntent', "jenis_data" => 'error', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama'), "function" => 'serviceRequestStatus pelayanan Pulang APS'];

                    $this->db->insert('sm_satu_sehat_log', $xDetailData);

                    return;
                
                }

            } else if($status === 'Klinik Lain'){

                $xStatus = 'active';
                $xIntent = 'reflex-order';
                $dataLayanDaftar = $this->sehat->cekDataPendaftaran((int)$data->id_pendaftaran);

                foreach ($dataLayanDaftar as $key => $value) {

                    if($value->jenis_layanan === 'Poliklinik' && $value->tindak_lanjut === NULL){

                        $tampungData[] = $value;

                        break;

                    }

                }

                if(empty($tampungData[0])){

                    date_default_timezone_set('Asia/Jakarta');

                     $xDetailData = ["kategori" => "ServiceRequest", "no_rm" => $data->no_rm, "message" => 'tampungData Tidak Ada', "jenis_data" => 'error', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama'), "function" => 'serviceRequestStatus pelayanan Klinik Lain'];

                    $this->db->insert('sm_satu_sehat_log', $xDetailData);

                    return;
                
                }
                
                $waktuEstimasi = $tampungData[0]->tanggal_layanan;

                if (empty($waktuEstimasi)){

                    date_default_timezone_set('Asia/Jakarta');

                     $xDetailData = ["kategori" => "ServiceRequest", "no_rm" => $data->no_rm, "message" => 'Waktu Estimasi', "jenis_data" => 'error', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama'), "function" => 'serviceRequestStatus pelayanan Klinik Lain'];

                    $this->db->insert('sm_satu_sehat_log', $xDetailData);

                    return;
                
                }

                if (empty($xStatus)){

                    date_default_timezone_set('Asia/Jakarta');

                     $xDetailData = ["kategori" => "ServiceRequest", "no_rm" => $data->no_rm, "message" => 'xStatus', "jenis_data" => 'error', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama'), "function" => 'serviceRequestStatus pelayanan Klinik Lain'];

                    $this->db->insert('sm_satu_sehat_log', $xDetailData);

                    return;
                
                }

                if (empty($xIntent)){

                    date_default_timezone_set('Asia/Jakarta');

                     $xDetailData = ["kategori" => "ServiceRequest", "no_rm" => $data->no_rm, "message" => 'xIntent', "jenis_data" => 'error', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama'), "function" => 'serviceRequestStatus pelayanan Klinik Lain'];

                    $this->db->insert('sm_satu_sehat_log', $xDetailData);

                    return;
                
                }

            }

            if($data->ihs_request !== null && $data->ihs_performer !== null){

                $ihsRequest = $data->ihs_request;
                $ihsPerformer = $data->ihs_performer;
                $dokterRequest = $data->dokter_request;
                $dokterPerformer = $data->dokter_performer;

            } else {

                $ihsRequest = $data->ihs_number;
                $ihsPerformer = $data->ihs_number;
                $dokterRequest = $data->nama_dokter;
                $dokterPerformer = $data->nama_dokter;
                    
            }

            if (empty($waktuEstimasi)){

                date_default_timezone_set('Asia/Jakarta');

                 $xDetailData = ["kategori" => "ServiceRequest", "no_rm" => $data->no_rm, "message" => 'Waktu Estimasi', "jenis_data" => 'error', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama'), "param" => $idLayananPendaftaran, "function" => 'serviceRequestStatus pelayanan model'];

                $this->db->insert('sm_satu_sehat_log', $xDetailData);

                return;
            
            }

            if (empty($xStatus)){

                date_default_timezone_set('Asia/Jakarta');

                 $xDetailData = ["kategori" => "ServiceRequest", "no_rm" => $data->no_rm, "message" => 'xStatus', "jenis_data" => 'error', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama'), "param" => $idLayananPendaftaran, "function" => 'serviceRequestStatus pelayanan model'];

                $this->db->insert('sm_satu_sehat_log', $xDetailData);

                return;
            
            }

            if (empty($xIntent)){

                date_default_timezone_set('Asia/Jakarta');

                 $xDetailData = ["kategori" => "ServiceRequest", "no_rm" => $data->no_rm, "message" => 'xIntent', "jenis_data" => 'error', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama'), "param" => $idLayananPendaftaran, "function" => 'serviceRequestStatus pelayanan model'];

                $this->db->insert('sm_satu_sehat_log', $xDetailData);

                return;
            
            }

            $xKonfigurasi = $this->sehat->getConfigSatuSehat();

            $idUser = $this->session->userdata('id_translucent');

            $idOrganization = $xKonfigurasi->organization;

            $getID = $this->sehat->aksesSatuSehat($idUser);

            $tanggalLayanan = $this->konversiTanggalParameter($waktuEstimasi);

            $tokenBearer = $getID->token;

            $header = $this->sehat->authBearer($tokenBearer);

            if($data->id_service !== null && $data->id_service !== ''){

                $idParams = $data->id_service;

                $url = $xKonfigurasi->apiurl."ServiceRequest/".$idParams;

                $params = array(
                    "resourceType"=> "ServiceRequest",
                    "id"=> $data->id_service,
                    "identifier"=> [
                        array(
                            "system"=> "http://sys-ids.kemkes.go.id/servicerequest/".$idOrganization,
                            "value"=> $data->id
                        )
                    ],
                    "status"=> $xStatus,
                    "intent"=> $xIntent,
                    "code"=> array(
                        "coding"=> [
                            array(
                                "system"=> "http://snomed.info/sct",
                                "code"=> "185389009",
                                "display"=> "Follow-up visit"
                            )
                        ],
                        "text"=> "Kontrol rutin regimen TB bulan ke-2"
                    ),
                    "subject"=> array(
                        "reference"=> "Patient/".$data->ihsn
                    ),
                    "encounter"=> array(
                        "reference"=> "Encounter/".$data->id_encounter,
                        "display"=> "Kunjungan ".$data->nama_pasien . " di hari " . convertDateIndo($data->tanggal_periksa)
                    ),
                    "occurrenceDateTime"=> $tanggalLayanan,
                    "requester"=> array(
                            "reference"=> "Practitioner/".$ihsRequest,
                            "display"=> $dokterRequest
                    ),
                    "performer"=> [
                            array(
                            "reference"=> "Practitioner/".$ihsPerformer,
                            "display"=> $dokterPerformer
                            )
                    ],
                    "locationCode"=> [
                        array(
                            "coding"=> [
                                array(
                                    "system"=> "http://terminology.hl7.org/CodeSystem/v3-RoleCode",
                                    "code"=> "OF",
                                    "display"=> "Outpatient Facility"
                                )
                            ]
                        )
                    ]
                );

                $data_api = json_encode($params);

                $output = $this->sehat->putComposition($url, $data_api, $header);

                if($output['result'] !== false){

                    if($output['respon'] === 200){

                        $result = json_decode($output['result']);

                        $update = ["id_service" => $result->id];

                        $this->db->where('id', (int)$idLayananPendaftaran)->update('sm_layanan_pendaftaran', $update);

                        date_default_timezone_set('Asia/Jakarta');

                         $xDetailData = ["kategori" => "Update ServiceRequest", "no_rm" => $data->no_rm, "message" => json_encode($params), "jenis_data" => 'ok', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama'), "respon" => $output['respon'], "function" => 'serviceRequestStatus pelayanan model'];

                        $this->db->insert('sm_satu_sehat_log', $xDetailData);

                    } else {

                        date_default_timezone_set('Asia/Jakarta');
                        
                        $xDetailData = ["kategori" => "Update ServiceRequest", "no_rm" => $data->no_rm, "message" => $output['result'], "jenis_data" => 'error', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama'), "param" => json_encode($params), "respon" => $output['respon'], "function" => 'serviceRequestStatus pelayanan model'];

                        $this->db->insert('sm_satu_sehat_log', $xDetailData);

                    }

                }

            } else {

                $url = $xKonfigurasi->apiurl."ServiceRequest";

                $params = array(
                    "resourceType"=> "ServiceRequest",
                    "identifier"=> [
                        array(
                            "system"=> "http://sys-ids.kemkes.go.id/servicerequest/".$idOrganization,
                            "value"=> $data->id
                        )
                    ],
                    "status"=> $xStatus,
                    "intent"=> $xIntent,
                    "code"=> array(
                        "coding"=> [
                            array(
                                "system"=> "http://snomed.info/sct",
                                "code"=> "185389009",
                                "display"=> "Follow-up visit"
                            )
                        ],
                        "text"=> "Kontrol rutin regimen TB bulan ke-2"
                    ),
                    "subject"=> array(
                        "reference"=> "Patient/".$data->ihsn
                    ),
                    "encounter"=> array(
                        "reference"=> "Encounter/".$data->id_encounter,
                        "display"=> "Kunjungan ".$data->nama_pasien . " di hari " . convertDateIndo($data->tanggal_periksa)
                    ),
                    "occurrenceDateTime"=> $tanggalLayanan,
                    "requester"=> array(
                            "reference"=> "Practitioner/".$ihsRequest,
                            "display"=> $dokterRequest
                    ),
                    "performer"=> [
                            array(
                            "reference"=> "Practitioner/".$ihsPerformer,
                            "display"=> $dokterPerformer
                            )
                    ],
                    "locationCode"=> [
                        array(
                            "coding"=> [
                                array(
                                    "system"=> "http://terminology.hl7.org/CodeSystem/v3-RoleCode",
                                    "code"=> "OF",
                                    "display"=> "Outpatient Facility"
                                )
                            ]
                        )
                    ]
                );

                $data_api = json_encode($params);

                $output = $this->sehat->postEncounter($url, $data_api, $header);

                if($output['result'] !== false){                

                    if($output['respon'] === 201){

                        $result = json_decode($output['result']);

                        $update = ["id_service" => $result->id];

                        $this->db->where('id', (int)$idLayananPendaftaran)->update('sm_layanan_pendaftaran', $update);

                        date_default_timezone_set('Asia/Jakarta');

                         $xDetailData = ["kategori" => "ServiceRequest", "no_rm" => $data->no_rm, "message" => json_encode($params), "jenis_data" => 'ok', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama'), "respon" => $output['respon'], "function" => 'serviceRequestStatus pelayanan model'];

                        $this->db->insert('sm_satu_sehat_log', $xDetailData);

                    } else {

                        date_default_timezone_set('Asia/Jakarta');
                        
                        $xDetailData = ["kategori" => "ServiceRequest", "no_rm" => $data->no_rm, "message" => $output['result'], "jenis_data" => 'error', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama'), "param" => json_encode($params), "respon" => $output['respon'], "function" => 'serviceRequestStatus pelayanan model'];

                        $this->db->insert('sm_satu_sehat_log', $xDetailData);

                    }

                } 

            }



        } else if($jenisDaftar === 'daftar'){

            foreach ($data as $key => $value) {
                
                $xKonfigurasi = $this->sehat->getConfigSatuSehat();

                $idUser = $this->session->userdata('id_translucent');

                $idOrganization = $xKonfigurasi->organization;

                $getID = $this->sehat->aksesSatuSehat($idUser);

                $tokenBearer = $getID->token;

                $header = $this->sehat->authBearer($tokenBearer);

                $waktuEstimasi = $value->daftar_selesai;

                if($jenisDaftar === 'daftar'){

                    if($status === 'batal'){

                        $xStatus = 'revoked';
                        $xIntent = 'directive';

                    }

                }

                if($value->ihs_request !== null && $value->ihs_performer !== null){

                    $ihsRequest = $value->ihs_request;
                    $ihsPerformer = $value->ihs_performer;
                    $dokterRequest = $value->dokter_request;
                    $dokterPerformer = $value->dokter_performer;

                } else {

                    $ihsRequest = $value->ihs_number;
                    $ihsPerformer = $value->ihs_number;
                    $dokterRequest = $value->nama_dokter;
                    $dokterPerformer = $value->nama_dokter;
                        
                }

                if ($value->daftar_selesai === null) {
                    continue;
                }

                $tanggalLayanan = $this->konversiTanggalParameter($waktuEstimasi);

                if($value->id_service !== null && $value->id_service !== ''){

                    $idParams = $value->id_service;

                    $url = $xKonfigurasi->apiurl."ServiceRequest/".$idParams;

                    $params = array(
                        "resourceType"=> "ServiceRequest",
                        "id"=> $value->id_service,
                        "identifier"=> [
                            array(
                                "system"=> "http://sys-ids.kemkes.go.id/servicerequest/".$idOrganization,
                                "value"=> $value->id
                            )
                        ],
                        "status"=> $xStatus,
                        "intent"=> $xIntent,
                        "priority"=> "routine",
                        "code"=> array(
                            "coding"=> [
                                array(
                                    "system"=> "http://snomed.info/sct",
                                    "code"=> "185389009",
                                    "display"=> "Follow-up visit"
                                )
                            ],
                            "text"=> "Kontrol rutin regimen TB bulan ke-2"
                        ),
                        "subject"=> array(
                            "reference"=> "Patient/".$value->ihsn
                        ),
                        "encounter"=> array(
                            "reference"=> "Encounter/".$value->id_encounter,
                            "display"=> "Kunjungan ".$value->nama_pasien . " di hari " . convertDateIndo($value->tanggal_periksa)
                        ),
                        "occurrenceDateTime"=> $tanggalLayanan,
                        "requester"=> array(
                            "reference"=> "Practitioner/".$ihsRequest,
                            "display"=> $dokterRequest
                        ),
                        "performer"=> [
                                array(
                                "reference"=> "Practitioner/".$ihsPerformer,
                                "display"=> $dokterPerformer
                                )
                        ],
                        "locationCode"=> [
                            array(
                                "coding"=> [
                                    array(
                                        "system"=> "http://terminology.hl7.org/CodeSystem/v3-RoleCode",
                                        "code"=> "OF",
                                        "display"=> "Outpatient Facility"
                                    )
                                ]
                            )
                        ]
                    );

                    $data_api = json_encode($params);

                    $output = $this->sehat->putEncounter($url, $data_api, $header);

                    if($output['result'] !== false){

                        if($output['respon'] === 200){

                            $result = json_decode($output['result']);

                            $update = ["id_service" => $result->id];

                            $this->db->where('id', (int)$idLayananPendaftaran)->update('sm_layanan_pendaftaran', $update);

                            date_default_timezone_set('Asia/Jakarta');

                             $xDetailData = ["kategori" => "ServiceRequest", "no_rm" => $value->no_rm, "message" => json_encode($params), "jenis_data" => 'ok', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama'), "respon" => $output['respon'], "function" => 'serviceRequestStatus pelayanan model'];

                            $this->db->insert('sm_satu_sehat_log', $xDetailData);

                        } else {

                            date_default_timezone_set('Asia/Jakarta');
                            
                            $xDetailData = ["kategori" => "ServiceRequest", "no_rm" => $value->no_rm, "message" => $output['result'], "jenis_data" => 'error', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama'), "param" => json_encode($params), "respon" => $output['respon'], "function" => 'serviceRequestStatus pelayanan model'];

                            $this->db->insert('sm_satu_sehat_log', $xDetailData);

                        }

                    }

                } else {

                    $url = $xKonfigurasi->apiurl."ServiceRequest";

                    $params = array(
                        "resourceType"=> "ServiceRequest",
                        "identifier"=> [
                            array(
                                "system"=> "http://sys-ids.kemkes.go.id/servicerequest/".$idOrganization,
                                "value"=> $value->id
                            )
                        ],
                        "status"=> $xStatus,
                        "intent"=> $xIntent,
                        "priority"=> "routine",
                        "code"=> array(
                            "coding"=> [
                                array(
                                    "system"=> "http://snomed.info/sct",
                                    "code"=> "185389009",
                                    "display"=> "Follow-up visit"
                                )
                            ],
                            "text"=> "Kontrol rutin regimen TB bulan ke-2"
                        ),
                        "subject"=> array(
                            "reference"=> "Patient/".$value->ihsn
                        ),
                        "encounter"=> array(
                            "reference"=> "Encounter/".$value->id_encounter,
                            "display"=> "Kunjungan ".$value->nama_pasien . " di hari " . convertDateIndo($value->tanggal_periksa)
                        ),
                        "occurrenceDateTime"=> $tanggalLayanan,
                        "requester"=> array(
                            "reference"=> "Practitioner/".$value->ihs_request,
                            "display"=> $value->dokter_request
                        ),
                        "performer"=> [
                                array(
                                "reference"=> "Practitioner/".$value->ihs_performer,
                                "display"=> $value->dokter_performer
                                )
                        ],
                        "locationCode"=> [
                            array(
                                "coding"=> [
                                    array(
                                        "system"=> "http://terminology.hl7.org/CodeSystem/v3-RoleCode",
                                        "code"=> "OF",
                                        "display"=> "Outpatient Facility"
                                    )
                                ]
                            )
                        ]
                    );

                    $data_api = json_encode($params);

                    $output = $this->sehat->postEncounter($url, $data_api, $header);

                    if($output['result'] !== false){

                        if($output['respon'] === 201){

                            $result = json_decode($output['result']);

                            $update = ["id_service" => $result->id];

                            $this->db->where('id', (int)$idLayananPendaftaran)->update('sm_layanan_pendaftaran', $update);

                            date_default_timezone_set('Asia/Jakarta');

                             $xDetailData = ["kategori" => "ServiceRequest", "no_rm" => $value->no_rm, "message" => json_encode($params), "jenis_data" => 'ok', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama'), "respon" => $output['respon'], "function" => 'serviceRequestStatus pelayanan model'];

                            $this->db->insert('sm_satu_sehat_log', $xDetailData);

                        } else {

                            date_default_timezone_set('Asia/Jakarta');
                            
                            $xDetailData = ["kategori" => "ServiceRequest", "no_rm" => $value->no_rm, "message" => $output['result'], "jenis_data" => 'error', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama'), "param" => json_encode($params), "respon" => $output['respon'], "function" => 'serviceRequestStatus pelayanan model'];

                            $this->db->insert('sm_satu_sehat_log', $xDetailData);

                        }

                    }

                }

            }

        }
    }

    function conditionStatus($idLayananPendaftaran, $status){

        $this->load->model('satu_sehat/Satu_sehat_model', 'sehat');
        $data = $this->sehat->cekDataLayananPendaftaran((int)$idLayananPendaftaran);

        $this->autentikasi_user_post();

        if($idLayananPendaftaran === null){

            date_default_timezone_set('Asia/Jakarta');
            $xDetailData = ["kategori" => "Condition ServiceRequest", "no_rm" => $data->no_rm, "message" => 'ID Layanan Pendaftaran Tidak ada', "jenis_data" => 'error', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama'), "function" => 'conditionStatus Model Pelayanan'];
            $this->db->insert('sm_satu_sehat_log', $xDetailData);
            return;
        
        }

        if($status === 'IGD'){

            $this->serviceRequestStatus($idLayananPendaftaran, $status, 'layanan');

        } else if($status === 'Atas Izin Dokter'){

            $this->encounterStatus($idLayananPendaftaran, $status);
            $this->serviceRequestStatus($idLayananPendaftaran, $status, 'layanan');

        } else if($status === 'Klinik Lain'){

            $this->serviceRequestStatus($idLayananPendaftaran, $status, 'layanan');

        }

        $xKonfigurasi = $this->sehat->getConfigSatuSehat();

        $tanggalLayanan = $this->konversiTanggalParameter($data->tanggal_layanan);

        $idUser = $this->session->userdata('id_translucent');

        $getID = $this->sehat->aksesSatuSehat($idUser);

        $tokenBearer = $getID->token;

        $xKonfigurasi = $this->sehat->getConfigSatuSehat();

        $header = $this->sehat->authBearer($tokenBearer);

        $cekSuratKontrol = $this->sehat->cekSuratKontrol((int)$data->id_pendaftaran);

        if(isset($cekSuratKontrol->id)){

            $clinicalStatusCode = 'active';
            $clinicalStatusDisplay = 'Active';

        } else {

            $clinicalStatusCode = 'resolved';
            $clinicalStatusDisplay = 'Resolved';

        }

        if(isset($status)){

            if($status === 'Rawat Inap' | $status === 'IGD' | $status === 'Intensive Care' | $status === 'Klinik Lain'){

                $categoryCodingCode = "problem-list-item";
                $categoryCodingDisplay = "Problem List Item";

                if($status === 'Klinik Lain'){
                
                    $codeCodingCode = "MN000003";
                    $codeCodingDisplay = "Perbaikan";
                
                } else {

                    $codeCodingCode = "MN000002";
                    $codeCodingDisplay = "Tidak stabil";

                }

            } else {

                $categoryCodingCode = "encounter-diagnosis";
                $categoryCodingDisplay = "Encounter Diagnosis";
                
                if($status === 'RS Lain'){

                    $codeCodingCode = "MN000003";
                    $codeCodingDisplay = "Perbaikan";

                } else {

                    $codeCodingCode = "MN000001";
                    $codeCodingDisplay = "stabil";

                }

            }

        }

        if($data->id_condition !== null && $data->id_condition !== ''){

            $idParams = $data->id_condition;

            $url = $xKonfigurasi->apiurl."Condition/".$idParams;

            $params=array(

                    "resourceType"=> "Condition",
                    "id" => $idParams,
                    "clinicalStatus"=> array(
                        "coding"=> [
                                    array(
                                       "system"=> "http://terminology.hl7.org/CodeSystem/condition-clinical",
                                       "code"=> $clinicalStatusCode,
                                       "display"=> $clinicalStatusDisplay
                                    )
                        ]
                    ),
                    "category"=> [
                        array(
                            "coding"=> [
                                       array(
                                          "system"=> "http://terminology.hl7.org/CodeSystem/condition-category",
                                          "code"=> $categoryCodingCode,
                                          "display"=> $categoryCodingDisplay
                                       )
                            ]
                        )
                    ],
                    "code"=> array(
                        "coding"=> [
                                    array(
                                       "system"=> "http://terminology.kemkes.go.id/CodeSystem/clinical-term",
                                       "code"=> $codeCodingCode,
                                       "display"=> $codeCodingDisplay
                                    )
                        ]
                    ),
                    "subject"=> array(
                         "reference"=> "Patient/".$data->ihsn,
                         "display"=> $data->nama_pasien
                    ),
                    "encounter"=> array(
                        "reference"=> "Encounter/".$data->id_encounter
                    ),
                    "onsetDateTime"=> $tanggalLayanan,
                    "recordedDate" => $tanggalLayanan
                
                );

            $data_api = json_encode($params);

            $output = $this->sehat->putEncounter($url, $data_api, $header);

            if($output['result'] !== false){

                if($output['respon'] === 200){

                    $result = json_decode($output['result']);

                    $update = ["id_condition" => $result->id];

                    $this->db->where('id', (int)$idLayananPendaftaran)->update('sm_layanan_pendaftaran', $update);

                    date_default_timezone_set('Asia/Jakarta');

                    $xDetailData = ["kategori" => "Condition ServiceRequest", "no_rm" => $data->no_rm, "message" => json_encode($params), "jenis_data" => 'ok', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama'), "respon" => $output['respon'], "function" => 'conditionStatus'];

                    $this->db->insert('sm_satu_sehat_log', $xDetailData);

                } else {

                    $result = json_decode($output['result']);

                    if(isset($result->issue)){
                    
                        date_default_timezone_set('Asia/Jakarta');
                        $xDetailData = ["kategori" => "Condition ServiceRequest", "no_rm" => $data->no_rm, "message" => json_encode($params), "jenis_data" => 'ok', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama'), "respon" => $output['respon'], "function" => 'conditionStatus'];

                        $this->db->insert('sm_satu_sehat_log', $xDetailData);

                    } else {

                        date_default_timezone_set('Asia/Jakarta');
                        $xDetailData = ["kategori" => "Condition ServiceRequest", "no_rm" => $data->no_rm, "message" => json_encode($params), "jenis_data" => 'ok', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama'), "respon" => $output['respon'], "function" => 'conditionStatus'];

                        $this->db->insert('sm_satu_sehat_log', $xDetailData);

                    }

                }

            }


        } else {

            $url = $xKonfigurasi->apiurl."Condition";

            $params=array(
                            "resourceType"=> "Condition",
                            "clinicalStatus"=> array(
                                "coding"=> [
                                            array(
                                               "system"=> "http://terminology.hl7.org/CodeSystem/condition-clinical",
                                               "code"=> $clinicalStatusCode,
                                               "display"=> $clinicalStatusDisplay
                                            )
                                ]
                            ),
                            "category"=> [
                                array(
                                    "coding"=> [
                                               array(
                                                  "system"=> "http://terminology.hl7.org/CodeSystem/condition-category",
                                                  "code"=> $categoryCodingCode,
                                                  "display"=> $categoryCodingDisplay
                                               )
                                    ]
                                )
                            ],
                            "code"=> array(
                                "coding"=> [
                                            array(
                                               "system"=> "http://terminology.kemkes.go.id/CodeSystem/clinical-term",
                                               "code"=> $codeCodingCode,
                                               "display"=> $codeCodingDisplay
                                            )
                                ]
                            ),
                            "subject"=> array(
                                 "reference"=> "Patient/".$data->ihsn,
                                 "display"=> $data->nama_pasien
                            ),
                            "encounter"=> array(
                                "reference"=> "Encounter/".$data->id_encounter
                            ),
                            "onsetDateTime"=> $tanggalLayanan,
                            "recordedDate" => $tanggalLayanan
                                

                );

            $data_api = json_encode($params);

            $output = $this->sehat->postEncounter($url, $data_api, $header);

            if($output['result'] !== false){

                if($output['respon'] === 201){

                    $result = json_decode($output['result']);

                    $update = ["id_condition" => $result->id];

                    $this->db->where('id', (int)$idLayananPendaftaran)->update('sm_layanan_pendaftaran', $update);

                    date_default_timezone_set('Asia/Jakarta');

                    $xDetailData = ["kategori" => "Condition ServiceRequest", "no_rm" => $data->no_rm, "message" => json_encode($params), "jenis_data" => 'ok', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama'), "respon" => $output['respon'], "function" => 'conditionStatus'];

                    $this->db->insert('sm_satu_sehat_log', $xDetailData);

                } else {

                    date_default_timezone_set('Asia/Jakarta');
                    
                    $xDetailData = ["kategori" => "Condition ServiceRequest", "no_rm" => $data->no_rm, "message" => $output['result'], "jenis_data" => 'error', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama'), "param" => json_encode($params), "respon" => $output['respon'], "function" => 'conditionStatus'];

                    $this->db->insert('sm_satu_sehat_log', $xDetailData);

                }

            }

        }

    }

    private function konverTimeStamp($time)
    {

        $estimate = new DateTime($time);
        $nw_est = $estimate->getTimestamp();
        $nw_est_one = $nw_est * 1000;

        return $nw_est_one;
    
    }

    function encounterStatus($idLayananPendaftaran, $status, $kondisi = null){

        $this->load->model('satu_sehat/Satu_sehat_model', 'sehat');
        
        $this->autentikasi_user_post();

        $data = $this->sehat->cekDataLayananPendaftaran((int)$idLayananPendaftaran);

        if(isset($data->id_encounter)){

            if (!empty($status)) {
                // String memiliki nilai
                
                if ($data->id_poli !== null) {

                    $idSpesial = (int)$data->id_poli;

                    $nama = 1;

                    $dataPoli = $this->sehat->cekDataPoli($nama, $idSpesial);

                    if ($dataPoli !== null && $dataPoli !== '') {

                        $lokasi = $dataPoli->integrasi_baru;
                        $nama = $dataPoli->nama;

                    } else {

                        date_default_timezone_set('Asia/Jakarta');

                        $xDetailData = ["kategori" => "Encounter ServiceRequest", "no_rm" => $data->no_rm, "message" => 'Poli Belum di integrasi, Silakan integrasikan ke satu sehat terlebih dahulu', "jenis_data" => 'error', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama'), "function" => 'encounterStatus Model Pelayanan'];
                        
                        $this->db->insert('sm_satu_sehat_log', $xDetailData);

                        return;

                    }

                } else {

                    date_default_timezone_set('Asia/Jakarta');

                    $xDetailData = ["kategori" => "Encounter ServiceRequest", "no_rm" => $data->no_rm, "message" => 'Id Poli Tidak Ada', "jenis_data" => 'error', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama'), "function" => 'encounterStatus Model Pelayanan'];
                        
                    $this->db->insert('sm_satu_sehat_log', $xDetailData);

                    return;
                }

                if ($data->ihsn !== null) {

                    $dataIhsn = $data->ihsn;
                    $namaPasien = $data->nama_pasien;
                } else {

                    date_default_timezone_set('Asia/Jakarta');

                    $xDetailData = ["kategori" => "Encounter ServiceRequest", "no_rm" => $data->no_rm, "message" => 'Silakan Integrasikan Pasien Terlebih Dahulu ke Satu Sehat', "jenis_data" => 'error', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama'), "function" => 'encounterStatus Model Pelayanan'];
                        
                    $this->db->insert('sm_satu_sehat_log', $xDetailData);

                    return;
                }

                if ($data->ihs_number !== null) {

                    $dataIhsDokter = $data->ihs_number;
                    $namaDokter = $data->nama_dokter;
                } else {

                    date_default_timezone_set('Asia/Jakarta');

                    $xDetailData = ["kategori" => "Encounter ServiceRequest", "no_rm" => $data->no_rm, "message" => 'Silakan Integrasikan Dokter Terlebih Dahulu ke Satu Sehat', "jenis_data" => 'error', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama'), "function" => 'encounterStatus Model Pelayanan'];
                        
                    $this->db->insert('sm_satu_sehat_log', $xDetailData);

                    return;
                }

                $xKonfigurasi = $this->sehat->getConfigSatuSehat();

                $idUser = $this->session->userdata('id_translucent');

                $idOrganization = $xKonfigurasi->organization;

                $getID = $this->sehat->aksesSatuSehat($idUser);

                $tokenBearer = $getID->token;

                $idParams = $data->id_encounter;

                $url = $xKonfigurasi->apiurl . "Encounter/" . $idParams;

                $header = $this->sehat->authBearer($tokenBearer);

                $waktuStart = $data->task_tiga;

                $waktuProgress = $data->task_empat;

                $waktuEnd = $data->task_lima;

                $konvTimeStart = $this->konverTimeStamp($waktuStart);

                $konvTimeProgress = $this->konverTimeStamp($waktuProgress);

                $konvTimeEnd = $this->konverTimeStamp($waktuEnd);

                $timeStart = date('c', $konvTimeStart / 1000);

                $timeProgress = date('c', $konvTimeProgress / 1000);

                $timeEnd = date('c', $konvTimeEnd / 1000);

                if($status === 'Pulang APS'){

                    $hospitalizeCode = 'aadvice';

                    $hospitalizeDisplay = 'Left against advice';

                    $this->conditionStatus($idLayananPendaftaran, $status);

                    $this->serviceRequestStatus($idLayananPendaftaran, $status, 'layanan');

                } else if($status === 'RS Lain'){

                    $hospitalizeCode = 'other-hcf';

                    $hospitalizeDisplay = 'Other healthcare facility';

                    $this->conditionStatus($idLayananPendaftaran, $status);

                } else if($status === 'Pemulasaran Jenazah'){

                    $hospitalizeCode = 'exp';

                    $hospitalizeDisplay = 'Expired';

                    $this->conditionStatus($idLayananPendaftaran, $status);

                } else if($status === 'Atas Izin Dokter'){

                    $hospitalizeCode = 'home';

                    $hospitalizeDisplay = 'Home';

                } else {

                    if($status === 'Melarikan Diri'){

                        $hospitalizeCode = 'oth';

                        $hospitalizeDisplay = 'Other';

                    }

                }

                $params = array(

                    "resourceType"    => "Encounter",
                    "id" => $data->id_encounter,
                    "identifier"  => [
                        array(
                            "system"  => "http://sys-ids.kemkes.go.id/encounter/" . $idOrganization,
                            "value"   => $data->kode_booking
                        )
                    ],
                    "status"  => "in-progress",
                    "class"   => array(
                        "system"    => "http://terminology.hl7.org/CodeSystem/v3-ActCode",
                        "code"      => "AMB",
                        "display"   => "ambulatory"
                    ),
                    "subject"     => array(

                        "reference" => "Patient/" . $dataIhsn,
                        "display"   => $namaPasien

                    ),
                    "participant" => [
                        array(
                            "type"    => [
                                array(
                                    "coding"  => [
                                        array(
                                            "system"  => "http://terminology.hl7.org/CodeSystem/v3-ParticipationType",
                                            "code"    => "ATND",
                                            "display" => "attender"
                                        )
                                    ]
                                )
                            ],
                            "individual" => array(
                                "reference" => "Practitioner/" . $dataIhsDokter,
                                "display"   => $namaDokter
                            )
                        )
                    ],
                    "period"  => array(
                        "start" => $timeStart,
                        "end"   => $timeEnd
                    ),
                    "location"  => [array(

                        "location" => array(
                            "reference"  => "Location/" . $lokasi,
                            "display"    => $nama
                        )
                    )],
                    "statusHistory"   => [
                        array(
                            "status"   => "arrived",
                            "period"   => array(
                                "start"   => $timeStart,
                                "end"   => $timeProgress
                            )
                        ),
                        array(
                            "status"   => "in-progress",
                            "period"   => array(
                                "start"   => $timeProgress
                            )
                        )
                    ],
                    "hospitalization"   => array(
                        "dischargeDisposition" => array(
                            "coding" => [
                                array(
                                "system" => "http://terminology.hl7.org/CodeSystem/discharge-disposition",
                                "code" => $hospitalizeCode,
                                "display" => $hospitalizeDisplay
                                )
                            ]
                        )
                    ),

                    "serviceProvider"   => array(
                        "reference" => "Organization/" . $idOrganization
                    )
                );

                $data_api = json_encode($params);

                $output = $this->sehat->putEncounter($url, $data_api, $header);

                if($output['result'] !== false){

                    if ($output['respon'] === 200) {

                        $result = json_decode($output['result']);

                        $update = ["in_progress" => 'OK'];

                        $this->db->where('id', (int)$idLayananPendaftaran)->update('sm_layanan_pendaftaran', $update);

                        date_default_timezone_set('Asia/Jakarta');

                        $xDetailData = ["kategori" => "Encounter ServiceRequest", "no_rm" => $data->no_rm, "message" => json_encode($params), "jenis_data" => 'ok', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama'), "respon" => $output['respon'],"function" => 'encounterStatus Model Pelayanan'];

                        $this->db->insert('sm_satu_sehat_log', $xDetailData);

                    } else {

                        date_default_timezone_set('Asia/Jakarta');

                        $xDetailData = ["kategori" => "Encounter ServiceRequest", "no_rm" => $data->no_rm, "message" => $output['result'], "jenis_data" => 'error', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama'), "respon" => $output['respon'], "param" => json_encode($params), "function" => 'encounterStatus Model Pelayanan'];

                        $this->db->insert('sm_satu_sehat_log', $xDetailData);

                    }

                }

            } else {

                date_default_timezone_set('Asia/Jakarta');
                
                $xDetailData = ["kategori" => "Encounter ServiceRequest", "no_rm" => $data->no_rm, "message" => 'Status Tindak Lanjut Tidak ada', "jenis_data" => 'error', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama'), "respon" => $output['respon'], "function" => 'encounterStatus Model Pelayanan'];
                $this->db->insert('sm_satu_sehat_log', $xDetailData);

            }

        } else {

            date_default_timezone_set('Asia/Jakarta');
            
            $xDetailData = ["kategori" => "Encounter ServiceRequest", "no_rm" => $data->no_rm, "message" => 'Belum Ada id Encounter', "jenis_data" => 'error', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama'), "function" => 'encounterStatus Model Pelayanan'];
            $this->db->insert('sm_satu_sehat_log', $xDetailData);

        }

    }

    function updateTindakLanjut($id_layanan_pendaftaran, $data)
    {
        $this->db->where('id', $id_layanan_pendaftaran)->update('sm_layanan_pendaftaran', $data);
        if ($data['kondisi'] === 'Meninggal' || $data['kondisi'] === 'Meninggal > 48 Jam' || $data['kondisi'] === 'Meninggal < 48 Jam') :
            $pasien = $this->db->select('pd.id_pasien')
                ->from('sm_layanan_pendaftaran lp')
                ->join('sm_pendaftaran pd', 'pd.id = lp.id_pendaftaran')
                ->where('lp.id', $id_layanan_pendaftaran)
                ->get()
                ->row();
            if ($pasien) :
                $this->db->where('id', $pasien->id_pasien)->update('sm_pasien', array('status' => $data['kondisi']));
            endif;
        endif;

    }

    private function integrasi_pasien($idLayanan)
    {
        $this->autentikasi_user_post();

        if ($idLayanan === null) {

            date_default_timezone_set('Asia/Jakarta');

            $xDetailDataRequest = ["kategori" => "integrasi_pasien", "message" => 'id Layanan Tidak Ada', "jenis_data" => 'error', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama'), "function" => 'integrasi_pasien model pelayanan'];

            $this->db->insert('sm_satu_sehat_log', $xDetailDataRequest);
            return;
        }

        $this->load->model('satu_sehat/Satu_sehat_model', 'sehat');

        $data = $this->sehat->cekidLayananPendaftaran($idLayanan);

        $identitas = $data->no_identitas;

        $idRM = $data->no_rm;

        if ($identitas !== "") {

            $idUser = $this->session->userdata('id_translucent');

            $getID = $this->sehat->aksesSatuSehat($idUser);

            $tokenBearer = $getID->token;

            $xKonfigurasi = $this->sehat->getConfigSatuSehat();

            $url = $xKonfigurasi->apiurl . "Patient?identifier=https://fhir.kemkes.go.id/id/nik|" . $identitas;

            $header = $this->sehat->authBearer($tokenBearer);

            $output = $this->sehat->postBearer($url, $header);

            if($output['result'] !== false){

                $entryOutput = json_decode($output['result']);

                if (isset($entryOutput->entry)) {

                    if (!empty($entryOutput->entry)) {

                        $entryId = $entryOutput->entry;

                        $idPasien = $entryId[0]->resource->id;

                        $cekNama = $entryId[0]->resource->name;

                        $namaPasien = strtolower(preg_replace('/\xc2\xa0/', ' ', $cekNama[0]->text));

                        $update = ["ihsn" => $idPasien];

                        $this->db->where('id', $idRM)->update('sm_pasien', $update);

                    } else {

                        date_default_timezone_set('Asia/Jakarta');
                        $xDetailData = ["kategori" => "Patient", "param" => $identitas, "message" => $output['result'], "jenis_data" => 'error', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama'), "function" => 'integrasi_pasien pelayanan model'];
                        $this->db->insert('sm_satu_sehat_log', $xDetailData);

                    }

                } else {

                    date_default_timezone_set('Asia/Jakarta');
                    $xDetailData = ["kategori" => "Patient", "param" => $identitas, "message" => $output['result'], "jenis_data" => 'error', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama'), "function" => 'integrasi_pasien pelayanan model'];
                    $this->db->insert('sm_satu_sehat_log', $xDetailData);

                }

            }

        } else {

            date_default_timezone_set('Asia/Jakarta');
            $xDetailData = ["kategori" => "Patient", "param" => 'NIK Tidak ada, Harap masukkan data NIK terlebih dahulu', "message" => $output['result'], "jenis_data" => 'error', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama'), "function" => 'integrasi_pasien pelayanan model'];
            $this->db->insert('sm_satu_sehat_log', $xDetailData);

        }

    }

    private function integrasi_nakes($idLayanan)
    {
        $this->autentikasi_user_post();

        if ($idLayanan === null) {

            date_default_timezone_set('Asia/Jakarta');

            $xDetailDataRequest = ["kategori" => "integrasi_nakes", "message" => 'id Layanan Tidak Ada', "jenis_data" => 'error', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama'), "function" => 'integrasi_nakes model pelayanan'];

            $this->db->insert('sm_satu_sehat_log', $xDetailDataRequest);
            return;
        }

        $this->load->model('satu_sehat/Satu_sehat_model', 'sehat');

        $data = $this->sehat->cekidLayananPendaftaran($idLayanan);

        $identitas = $data->nik_dokter;

        $idMedis = $data->id_nakes;

        if ($identitas !== null) {

            $idUser = $this->session->userdata('id_translucent');

            $getID = $this->sehat->aksesSatuSehat($idUser);

            $tokenBearer = $getID->token;

            $xKonfigurasi = $this->sehat->getConfigSatuSehat();

            $url = $xKonfigurasi->apiurl . "Practitioner?identifier=https://fhir.kemkes.go.id/id/nik|" . $identitas;

            $header = $this->sehat->authBearer($tokenBearer);

            $output = $this->sehat->postBearer($url, $header);

            if($output['result'] !== false){

                $entryOutput = json_decode($output['result']);

                if (isset($entryOutput->entry)) {

                    if (!empty($entryOutput->entry)) {

                        $entryId = $entryOutput->entry;

                        $idNakes = $entryId[0]->resource->id;

                        $cekNama = $entryId[0]->resource->name;

                        $update = ["ihs_number" => $idNakes];

                        $this->db->where('id', $idMedis)->update('sm_tenaga_medis', $update);

                    } else {

                        date_default_timezone_set('Asia/Jakarta');
                        $xDetailData = ["kategori" => "Practitioner", "param" => $identitas, "message" => $output['result'], "jenis_data" => 'error', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama'), "function" => 'integrasi_nakes pelayanan model'];
                        $this->db->insert('sm_satu_sehat_log', $xDetailData);

                    }

                } else {

                    date_default_timezone_set('Asia/Jakarta');
                    $xDetailData = ["kategori" => "Practitioner", "param" => $identitas, "message" => $output['result'], "jenis_data" => 'error', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama'), "function" => 'integrasi_nakes pelayanan model'];
                    $this->db->insert('sm_satu_sehat_log', $xDetailData);

                }

            }

        } else {

            date_default_timezone_set('Asia/Jakarta');
            $xDetailData = ["kategori" => "Practitioner", "param" => $identitas, "message" => 'NIK Tidak ada, Harap masukkan data NIK terlebih dahulu', "jenis_data" => 'error', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama'), "function" => 'integrasi_nakes pelayanan model'];
            $this->db->insert('sm_satu_sehat_log', $xDetailData);

        }

    }

    private function integrasi_encounter_post($idLayanan)
    {

        $this->autentikasi_user_post();

        if ($idLayanan === null) {

            date_default_timezone_set('Asia/Jakarta');
            $xDetailDataRequest = ["kategori" => "Encounter", "message" => 'id Layanan Tidak Ada', "jenis_data" => 'error', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama'), "function" => 'integrasi_encounter_post pelayanan model'];

            $this->db->insert('sm_satu_sehat_log', $xDetailDataRequest);
            return;
            
        }

        $this->load->model('satu_sehat/Satu_sehat_model', 'sehat');

        $data = $this->sehat->cekidLayananPendaftaran($idLayanan);

        if ($data->id_poli !== null) {

            $idSpesial = (int)$data->id_poli;

            $nama = 1;

            $dataPoli = $this->sehat->cekDataPoli($nama, $idSpesial);

            if ($dataPoli !== null && $dataPoli !== '') {

                $lokasi = $dataPoli->integrasi_baru;
                $nama = $dataPoli->nama;

            } else {

                date_default_timezone_set('Asia/Jakarta');

                $xDetailDataRequest = ["kategori" => "Encounter", "no_rm" => $data->no_rm, "message" => 'Poli Belum di integrasi, Silakan integrasikan ke satu sehat terlebih dahulu', "jenis_data" => 'error', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama'), "function" => 'integrasi_encounter_post pelayanan model '];

                $this->db->insert('sm_satu_sehat_log', $xDetailDataRequest);
                return;
                
            }
        } else {

            date_default_timezone_set('Asia/Jakarta');

            $xDetailDataRequest = ["kategori" => "Encounter", "no_rm" => $data->no_rm, "message" => 'Id Poli Tidak Ada', "jenis_data" => 'error', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama'), "function" => 'integrasi_encounter_post pelayanan model'];

            $this->db->insert('sm_satu_sehat_log', $xDetailDataRequest);
            return;
            
        }

        if ($data->ihsn !== null) {

            $dataIhsn = $data->ihsn;
            $namaPasien = $data->nama_pasien;

        } else {

            $this->integrasi_pasien($idLayanan);

            $dataPasien = $this->sehat->cekidLayananPendaftaran($idLayanan);

            if (isset($dataPasien->ihsn)) {

                $dataIhsn = $dataPasien->ihsn;
                $namaPasien = $dataPasien->nama_pasien;

            } else {

                date_default_timezone_set('Asia/Jakarta');

                $xDetailDataRequest = ["kategori" => "Encounter", "no_rm" => $data->no_rm, "message" => 'Data Pasien tidak ada', "jenis_data" => 'error', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama'), "function" => 'integrasi_encounter_post pelayanan model'];

                $this->db->insert('sm_satu_sehat_log', $xDetailDataRequest);

                return;
                
            }
        }


        if ($data->ihs_number !== null) {

            $dataIhsDokter = $data->ihs_number;
            $namaDokter = $data->nama_dokter;

        } else {

            $this->integrasi_nakes($idLayanan);

            $dataNakes = $this->sehat->cekidLayananPendaftaran($idLayanan);

            if (isset($dataNakes->ihs_number)) {

                $dataIhsDokter = $dataNakes->ihs_number;
                $namaDokter = $dataNakes->nama_dokter;

            } else {

                date_default_timezone_set('Asia/Jakarta');

                $xDetailDataRequest = ["kategori" => "Encounter", "no_rm" => $data->no_rm, "message" => 'Data Nakes tidak ada', "jenis_data" => 'error', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama'), "function" => 'integrasi_encounter_post pelayanan model'];

                $this->db->insert('sm_satu_sehat_log', $xDetailDataRequest);

                return;
                
            }
        }

        $xKonfigurasi = $this->sehat->getConfigSatuSehat();

        $idOrganization = (int)$xKonfigurasi->organization;

        $idUser = $this->session->userdata('id_translucent');

        $getID = $this->sehat->aksesSatuSehat($idUser);

        $tokenBearer = $getID->token;

        $url = $xKonfigurasi->apiurl . "Encounter";

        $header = $this->sehat->authBearer($tokenBearer);

        $waktuStart = $data->task_tiga;

        $waktuEnd = $data->task_empat;

        $konvTimeStart = $this->konverTimeStamp($waktuStart);

        $konvTimeEnd = $this->konverTimeStamp($waktuEnd);

        $timeStart = date('c', $konvTimeStart / 1000);

        $timeEnd = date('c', $konvTimeEnd / 1000);

        $params = array(
            "resourceType"  => "Encounter",
            "identifier"    => [array(

                "system"    => "http://sys-ids.kemkes.go.id/encounter/" . $idOrganization,
                "value"     => $data->kode_booking

            )],
            "status"        => "arrived",
            "class"         => array(

                "system"    => "http://terminology.hl7.org/CodeSystem/v3-ActCode",
                "code"      => "AMB",
                "display"   => "ambulatory"

            ),
            "subject"      => array(

                "reference" => "Patient/" . $dataIhsn,
                "display"   => $namaPasien

            ),
            "participant"   => [array(

                "type"      => [array(

                    "coding" => [array(

                        "system"    => "http://terminology.hl7.org/CodeSystem/v3-ParticipationType",
                        "code"      => "ATND",
                        "display"   => "attender"

                    )]

                )],

                "individual" => array(
                    "reference" => "Practitioner/" . $dataIhsDokter,
                    "display"   => $namaDokter
                )
            )],
            "period"    => array(

                "start" => $timeStart

            ),
            "location"  => [array(

                "location" => array(
                    "reference"  => "Location/" . $lokasi,
                    "display"    => $nama
                )

            )],
            "statusHistory" => [array(

                "status"    => "arrived",
                "period"    => array(

                    "start" => $timeStart,
                    "end" => $timeEnd
                )
            )],
            "serviceProvider" => array(
                "reference" => "Organization/" . $idOrganization
            )

        );

        $data_api = json_encode($params);

        $output = $this->sehat->postEncounter($url, $data_api, $header);

        if($output['result'] !== false){

            if ($output['respon'] === 201) {

                $result = json_decode($output['result']);

                date_default_timezone_set('Asia/Jakarta');

                $xDetailDataRequest = ["kategori" => "Encounter", "no_rm" => $data->no_rm, "message" => json_encode($params), "jenis_data" => 'ok', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama'), "respon" => $output['respon'], "function" => 'integrasi_encounter_post pelayanan model'];

                $this->db->insert('sm_satu_sehat_log', $xDetailDataRequest);

                $update = ["id_encounter" => $result->id];

                $this->db->where('id', $idLayanan)->update('sm_layanan_pendaftaran', $update);

            } else {

                date_default_timezone_set('Asia/Jakarta');

                $xDetailDataRequest = ["kategori" => "Encounter", "no_rm" => $data->no_rm, "message" => $output['result'], "jenis_data" => 'error', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama'), "respon" => $output['respon'], "param" => json_encode($params), "function" => 'integrasi_encounter_post pelayanan model'];

                $this->db->insert('sm_satu_sehat_log', $xDetailDataRequest);

            }

        }
    }


    function integrasiTindakLanjut($idLayananPendaftaran, $data){

        $jenisLayanan = $this->db->select('jenis_layanan')->from('sm_layanan_pendaftaran')->where('id', (int)$idLayananPendaftaran)->get()->row()->jenis_layanan;

        if ($jenisLayanan === 'Poliklinik') {

            if(isset($data['tindak_lanjut'])){

                if (!empty($idLayananPendaftaran)) {

                    $cekEncounter = $this->db->select('id_encounter')->from('sm_layanan_pendaftaran')->where('id', $idLayananPendaftaran)->get()->row()->id_encounter;

                    if (empty($cekEncounter)) {

                        $this->integrasi_encounter_post($idLayananPendaftaran);
                    
                    }

                    if($data['tindak_lanjut'] === 'Atas Izin Dokter' | $data['tindak_lanjut'] === 'Rawat Inap' | $data['tindak_lanjut'] === 'Intensive Care' | $data['tindak_lanjut'] === 'IGD' | $data['tindak_lanjut'] === 'Klinik Lain'){

                        $this->conditionStatus($idLayananPendaftaran, $data['tindak_lanjut']);

                    } else {

                        $this->encounterStatus($idLayananPendaftaran, $data['tindak_lanjut'], $data['kondisi']);

                    }

                }
            }

        }

    }

    // BHP
    function simpanBHP()
    {
        $this->db->trans_begin();
        $id_layanan_pendaftaran = safe_post('id_layanan');
        $keterangan_stok        = $this->pasienName($id_layanan_pendaftaran);
        $id_kemasan             = safe_post('id_kemasan');
        $qty                    = safe_post('jml_bhp');
        $harga_jual             = safe_post('harga_bhp');
        $id_penjamin            = safe_post('id_penjamin');

        if (is_array($id_kemasan)) :

            $reimburse = 0;
            $penjualan_check = $this->db->select('id', true)
                ->from('sm_penjualan')
                ->where('id_layanan_pendaftaran', $id_layanan_pendaftaran, true)
                ->where('jenis', 'BHP')
                ->where('id_operasi is NULL')
                ->get()
                ->row();
            if (!isset($penjualan_check->id)) :
                $data_penjualan = array(
                    'waktu'                  => $this->datetime,
                    'id_layanan_pendaftaran' => $id_layanan_pendaftaran,
                    'jenis'                  => 'BHP',
                    'id_unit'                => $this->unit(),
                    'id_users'               => $this->user()
                );

                $this->db->insert('sm_penjualan', $data_penjualan);
                if ($this->db->trans_status() === false) :
                    $this->db->trans_rollback();
                    $result['status'] = false;
                // $result['token'] = $this->security->get_csrf_hash();
                endif;

                $id_penjualan = $this->db->insert_id();
            else :
                $id_penjualan = $penjualan_check->id;
            endif;

            foreach ($id_kemasan as $i => $data) :
                $barang = $this->db->query("select b.hna, b.id, 
                                            (kb.isi*kb.isi_satuan) as isi 
                                            from sm_barang b 
                                            join sm_kemasan_barang kb on (kb.id_barang = b.id) 
                                            where kb.id = '" . $id_kemasan[$i] . "'")->row();
                if ($id_penjamin !== '') :
                    $get_reimburse = $this->db->get_where("sm_penjamin", array("id" => safe_post("id_penjamin")))->row();
                    $reimburse = currencyToNumber($harga_jual[$i]) * $get_reimburse->diskon_barang / 100;
                endif;

                $data_barang = array(
                    'waktu'        => $this->datetime,
                    "id_penjualan" => $id_penjualan,
                    "id_kemasan"   => $id_kemasan[$i],
                    "qty"          => $qty[$i],
                    "hna"          => isset($barang->hna) ? $barang->hna : "0",
                    "harga_jual"   => currencyToNumber($harga_jual[$i]),
                    "id_asuransi"  => $id_penjamin !== "" ? $id_penjamin : NULL,
                    "reimburse"    => $reimburse,
                    "id_unit"      => $this->unit(),
                    "id_users"     => $this->user()
                );

                $this->db->insert('sm_detail_penjualan', $data_barang);
                if ($this->db->trans_status() === false) :
                    $this->db->trans_rollback();
                    $result['status'] = false;
                // $result['token'] = $this->security->get_csrf_hash();
                endif;

                $barangs = $this->db->query("select sum(masuk)-sum(keluar) as sisa, ed 
                                            from sm_stok 
                                            where id_barang = '" . $barang->id . "' 
                                            and ed > '" . $this->date . "' 
                                            and id_unit = '" . $this->unit() . "' 
                                            group by ed having sum(masuk)-sum(keluar) > 0 
                                            order by ed asc")->result();
                $use = $qty[$i] * $barang->isi;

                foreach ($barangs as $j => $val) :
                    $use = $val->sisa - abs($use);
                    if ($use <= 0) :
                        $keluar = $val->sisa;
                    else :
                        $keluar = abs($use - $val->sisa);
                    endif;

                    $data_stok = array(
                        'waktu'        => $this->datetime,
                        'id_transaksi' => $id_penjualan,
                        'transaksi'    => 'Penjualan',
                        'id_barang'    => $barang->id,
                        'ed'           => isset($val->ed) ? $val->ed : NULL,
                        'keluar'       => $keluar,
                        'keterangan'   => 'BHP ' . $keterangan_stok,
                        'id_unit'      => $this->unit(),
                        'id_users'     => $this->user()
                    );

                    $this->db->insert('sm_stok', $data_stok);
                    if ($this->db->trans_status() === false) :
                        $this->db->trans_rollback();
                        $result['status'] = false;
                    // $result['token'] = $this->security->get_csrf_hash();
                    endif;

                    if (0 <= $use) :
                        break;
                    endif;
                endforeach;
            endforeach;

            $total = $this->db->query("select sum(harga_jual*qty) as penjualan from sm_detail_penjualan where id_penjualan = '" . $id_penjualan . "'")->row();
            $this->db->where("id", $id_penjualan);
            $this->db->update("sm_penjualan", array("total" => $total->penjualan));
            $pendaftaran = $this->db->where("id", $id_layanan_pendaftaran)->select("id_pendaftaran")->get("sm_layanan_pendaftaran")->row();
            if (0 < count((array)$pendaftaran)) :
                $this->setBelumLunas($pendaftaran->id_pendaftaran);
            endif;

            if ($this->db->trans_status() === false) :
                $this->db->trans_rollback();
                $result["status"] = false;
            // $result['token'] = $this->security->get_csrf_hash();
            else :
                $this->db->trans_commit();
                $result["status"] = true;
            endif;
        endif;
    }

    // PKRT
    function simpanPKRT()
    {
        $this->db->trans_begin();
        $id_layanan_pendaftaran = safe_post('id_layanan');
        // $keterangan_stok        = $this->pasienName($id_layanan_pendaftaran);
        $id_tarif_pkrt          = safe_post('id_tarif_pkrt');
        $qty                    = safe_post('jml_pkrt');
        $harga_pkrt             = safe_post('harga_pkrt');
        $tarif                  = safe_post('subtotal_pkrt');
        // $id_penjamin            = safe_post('id_penjamin');

        if (is_array($id_tarif_pkrt)) :

            $reimburse = 0;
            $id_pendaftaran = $this->db->where("id", $id_layanan_pendaftaran)->select("id_pendaftaran")->get("sm_layanan_pendaftaran")->row()->id_pendaftaran;
            $pembayaran_check = $this->db->select('id', true)
                ->from('sm_pembayaran')
                ->where('id_layanan_pendaftaran', $id_layanan_pendaftaran, true)
                ->where('jenis_transaksi', 'PKRT')
                // ->where('id_operasi is NULL')
                ->get()
                ->row();
            if (!isset($pembayaran_check->id)) :
                $data_pembayaran = array(
                    // 'waktu'                  => $this->datetime,
                    'id_pendaftaran'         => $id_pendaftaran,
                    'id_layanan_pendaftaran' => $id_layanan_pendaftaran,
                    'jenis_transaksi'        => 'PKRT',
                    // 'status'                 => "Tagihan",
                    'id_users'               => $this->user()
                );

                $this->db->insert('sm_pembayaran', $data_pembayaran);
                if ($this->db->trans_status() === false) :
                    $this->db->trans_rollback();
                    $result['status'] = false;
                // $result['token'] = $this->security->get_csrf_hash();
                endif;

                $id_pembayaran = $this->db->insert_id();
            else :
                $id_pembayaran = $pembayaran_check->id;
            endif;

            foreach ($id_tarif_pkrt as $i => $data) :
                $data_barang = array(
                    'waktu'                     => $this->datetime,
                    "id_layanan_pendaftaran"    => $id_layanan_pendaftaran,
                    "jenis_transaksi"           => "PKRT",
                    "id_tarif_perbekalan"       => $id_tarif_pkrt[$i],
                    "qty"                       => $qty[$i],
                    "tarif"                     => currencyToNumber($tarif[$i]),
                    "id_users"                  => $this->user(),
                    'created_at'                => $this->datetime,
                    'status'                    => "Tagihan",
                );

                $this->db->insert('sm_pembayaran_perbekalan_kesehatan', $data_barang);
                if ($this->db->trans_status() === false) :
                    $this->db->trans_rollback();
                    $result['status'] = false;
                // $result['token'] = $this->security->get_csrf_hash();
                endif;
            endforeach;

            $total = $this->db->query("select coalesce(sum(tarif::int), 0) as tarif from sm_pembayaran_perbekalan_kesehatan where id_layanan_pendaftaran= '" . $id_layanan_pendaftaran . "'")->row();
            $this->db->where("id", $id_pembayaran);
            $this->db->update("sm_pembayaran", array("total" => $total->tarif));
            $pendaftaran = $this->db->where("id", $id_layanan_pendaftaran)->select("id_pendaftaran")->get("sm_layanan_pendaftaran")->row();
            if (0 < count((array)$pendaftaran)) :
                $this->setBelumLunas($pendaftaran->id_pendaftaran);
            endif;

            if ($this->db->trans_status() === false) :
                $this->db->trans_rollback();
                $result["status"] = false;
            // $result['token'] = $this->security->get_csrf_hash();
            else :
                $this->db->trans_commit();
                $result["status"] = true;
            endif;
        endif;
    }

    // permintaan darah ke bank darah
    function simpanOrderDarah()
    {
        $this->db->trans_begin();
        $id_layanan_pendaftaran = safe_post('id_layanan');
        $keterangan_stok        = $this->pasienName($id_layanan_pendaftaran);
        $id_kemasan             = safe_post('id_kemasan_darah');
        $qty                    = safe_post('jml_darah');
        $harga_jual             = safe_post('harga_darah');
        $id_penjamin            = safe_post('id_penjamin');

        $check = $this->db->select("count(id_layanan_pendaftaran) as jml")->from('sm_order_bank_darah')->where('id_layanan_pendaftaran', $id_layanan_pendaftaran, true)->where('waktu', $this->datetime)->get()->row()->jml;

        if ($check == 0) {
            $data_bank_darah = array(
                'waktu' => $this->datetime,
                'id_pasien' => safe_post('id_pasien'),
                'id_layanan_pendaftaran' => $id_layanan_pendaftaran,
                'diperiksa' => 'Belum',
                'layanan' => 'Bank Darah',
                'id_users' => $this->session->userdata('id_translucent'),
            );

            $this->db->insert('sm_order_bank_darah', $data_bank_darah);
            if ($this->db->trans_status() === false) :
                $this->db->trans_rollback();
                $status = false;
            endif;
        }

        if (is_array($id_kemasan)) :

            $reimburse = 0;
            $penjualan_check = $this->db->select('id', true)
                ->from('sm_penjualan_bank_darah')
                ->where('id_layanan_pendaftaran', $id_layanan_pendaftaran, true)
                ->where('jenis', 'Bank Darah')
                ->where('id_operasi is NULL')
                ->get()
                ->row();
            if (!isset($penjualan_check->id)) :
                $data_penjualan = array(
                    'waktu'                  => $this->datetime,
                    'id_layanan_pendaftaran' => $id_layanan_pendaftaran,
                    'jenis'                  => 'Bank Darah',
                    'id_unit'                => $this->unit(),
                    'id_users'               => $this->user()
                );

                $this->db->insert('sm_penjualan_bank_darah', $data_penjualan);
                if ($this->db->trans_status() === false) :
                    $this->db->trans_rollback();
                    $result['status'] = false;
                // $result['token'] = $this->security->get_csrf_hash();
                endif;

                $id_penjualan = $this->db->insert_id();
            else :
                $id_penjualan = $penjualan_check->id;
            endif;

            foreach ($id_kemasan as $i => $data) :
                $barang = $this->db->query("select b.hna, b.id, 
                                            (kb.isi*kb.isi_satuan) as isi 
                                            from sm_barang b 
                                            join sm_kemasan_barang kb on (kb.id_barang = b.id) 
                                            where kb.id = '" . $id_kemasan[$i] . "'")->row();
                if ($id_penjamin !== '') :
                    $get_reimburse = $this->db->get_where("sm_penjamin", array("id" => safe_post("id_penjamin")))->row();
                    $reimburse = currencyToNumber($harga_jual[$i]) * $get_reimburse->diskon_barang / 100;
                endif;

                $data_barang = array(
                    'waktu'              => $this->datetime,
                    "id_penjualan"       => $id_penjualan,
                    "id_kemasan"         => $id_kemasan[$i],
                    "qty"                => $qty[$i],
                    "hna"                => isset($barang->hna) ? $barang->hna : "0",
                    "harga_jual"         => currencyToNumber($harga_jual[$i]),
                    "id_asuransi"        => $id_penjamin !== "" ? $id_penjamin : NULL,
                    "reimburse"          => $reimburse,
                    "id_unit"            => $this->unit(),
                    "id_users"           => $this->user(),
                    "status_order_darah" => "Request",
                );

                $this->db->insert('sm_detail_penjualan_bank_darah', $data_barang);
                if ($this->db->trans_status() === false) :
                    $this->db->trans_rollback();
                    $result['status'] = false;
                // $result['token'] = $this->security->get_csrf_hash();
                endif;

                // $barangs = $this->db->query("select sum(masuk)-sum(keluar) as sisa, ed 
                //                             from sm_stok 
                //                             where id_barang = '" . $barang->id . "' 
                //                             and ed > '" . $this->date . "' 
                //                             and id_unit = '" . $this->unit() . "' 
                //                             group by ed having sum(masuk)-sum(keluar) > 0 
                //                             order by ed asc")->result();
                $barangs = $this->db->query("select sum(masuk)-sum(keluar) as sisa, ed 
                                            from sm_stok_bank_darah 
                                            where id_barang = '" . $barang->id . "' 
                                            and ed > '" . $this->date . "' 
                                            group by ed having sum(masuk)-sum(keluar) > 0 
                                            order by ed asc")->result();
                // echo $this->db->last_query(); die;
                $use = $qty[$i] * $barang->isi;

                foreach ($barangs as $j => $val) :
                    $use = $val->sisa - abs($use);
                    if ($use <= 0) :
                        $keluar = $val->sisa;
                    else :
                        $keluar = abs($use - $val->sisa);
                    endif;

                    $data_stok = array(
                        'waktu'        => $this->datetime,
                        'id_transaksi' => $id_penjualan,
                        'transaksi'    => 'Penjualan',
                        'id_barang'    => $barang->id,
                        'ed'           => isset($val->ed) ? $val->ed : NULL,
                        'keluar'       => $keluar,
                        'keterangan'   => 'Bank Darah ' . $keterangan_stok,
                        'id_unit'      => $this->unit(),
                        'id_users'     => $this->user(),
                        'is_bank_darah' => 1,
                        'is_confirm_bank_darah' => 'Request',
                    );

                    $this->db->insert('sm_stok_bank_darah', $data_stok);
                    if ($this->db->trans_status() === false) :
                        $this->db->trans_rollback();
                        $result['status'] = false;
                    // $result['token'] = $this->security->get_csrf_hash();
                    endif;

                    if (0 <= $use) :
                        break;
                    endif;
                endforeach;
            endforeach;

            $total = $this->db->query("select sum(harga_jual*qty) as penjualan from sm_detail_penjualan_bank_darah where id_penjualan = '" . $id_penjualan . "'")->row();
            $this->db->where("id", $id_penjualan);
            $this->db->update("sm_penjualan_bank_darah", array("total" => $total->penjualan));
            $pendaftaran = $this->db->where("id", $id_layanan_pendaftaran)->select("id_pendaftaran")->get("sm_layanan_pendaftaran")->row();
            if (0 < count((array)$pendaftaran)) :
                $this->setBelumLunas($pendaftaran->id_pendaftaran);
            endif;

            if ($this->db->trans_status() === false) :
                $this->db->trans_rollback();
                $result["status"] = false;
            // $result['token'] = $this->security->get_csrf_hash();
            else :
                $this->db->trans_commit();
                $result["status"] = true;
            endif;
        endif;
    }

    function getTindakanPemeriksaanBHP($id_layanan_pendaftaran, $jenis = '')
    {
        $where = "";
        if ($jenis !== "") :
            $where = " and ttp.jenis_transaksi = '" . $jenis . "' ";
        endif;

        $sql = "select ttp.*,count(ttp.id) as jumlah, 
                COALESCE(pg.nama, '') as dokter, l.keterangan,
                concat_ws(' kelas ', concat_ws(' ', l.nama, tp.jenis, tp.bobot), k.nama) as layanan,
                COALESCE(tr.account, '') as user
                from sm_tarif_tindakan_pasien as ttp
                left join sm_tenaga_medis as tm on (tm.id = ttp.id_operator) 
                left join sm_pegawai as pg on (pg.id = tm.id_pegawai)
                left join sm_tarif_pelayanan as tp on (tp.id = ttp.id_tarif_pelayanan) 
                left join sm_kelas as k on (k.id = tp.id_kelas) 
                left join sm_layanan as l on (l.id = tp.id_layanan) 
                left join sm_translucent as tr on (tr.id = ttp.id_user) 
                where ttp.id_layanan_pendaftaran = '" . $id_layanan_pendaftaran . "' 
                group by ttp.id, pg.nama,l.keterangan,l.nama,tp.jenis,tp.bobot,k.nama,tr.account";
        $query = $this->db->query($sql . $where)->result();
        $this->db->close();
        return $query;
    }

    function getBHPPemeriksaan($id_lp)
    {
        $sql = "select p.*, date(p.waktu) as tanggal, dp.qty, dp.id_kemasan, b.id as id_barang,
                concat_ws(' ',b.nama, b.kekuatan, stn.nama, COALESCE(sd.nama,''), '<small><i>', COALESCE(pb.nama,''),'</i></small>') as nama_barang,
                st.nama as kemasan, (dp.harga_jual*km.isi*km.isi_satuan) as harga_jual, dp.hna, dp.expired
                from sm_penjualan p
                join sm_detail_penjualan dp on (p.id = dp.id_penjualan)
                join sm_layanan_pendaftaran lp on (p.id_layanan_pendaftaran = lp.id)
                join sm_kemasan_barang km on (km.id = dp.id_kemasan)
                join sm_barang b on (b.id = km.id_barang)
                left join sm_satuan stn on (b.satuan_kekuatan = stn.id)
                join sm_satuan st on (st.id = km.id_kemasan)
                left join sm_sediaan sd on (b.id_sediaan = sd.id)
                left join sm_pabrik pb on (b.id_pabrik = pb.id)
                where lp.id = '" . $id_lp . "' and p.jenis = 'BHP' and p.id_operasi is NULL";
        $query = $this->db->query($sql)->result();
        return $query;
    }

    function getPKRTPemeriksaan($id_lp)
    {
        $sql = "select p.*, date(p.waktu) as tanggal, pk.nama as nama_barang, tpk.nominal as harga_satuan
                from sm_pembayaran_perbekalan_kesehatan p
                join sm_tarif_perbekalan_kesehatan tpk on (p.id_tarif_perbekalan = tpk.id)
                join sm_perbekalan_kesehatan pk on (tpk.id_perbekalan_kesehatan = pk.id)
                where p.id_layanan_pendaftaran = '" . $id_lp . "' ";
        $query = $this->db->query($sql)->result();
        return $query;
    }

    function getOrderDarah($id_lp)
    {
        $sql = "select p.*, date(p.waktu) as tanggal, dp.qty, dp.id_kemasan, b.id as id_barang,
                concat_ws(' ',b.nama, b.kekuatan, stn.nama, COALESCE(sd.nama,''), '<small><i>', COALESCE(pb.nama,''),'</i></small>') as nama_barang,
                st.nama as kemasan, (dp.harga_jual*km.isi*km.isi_satuan) as harga_jual, dp.hna, dp.expired, dp.status_order_darah
                from sm_penjualan_bank_darah p
                join sm_detail_penjualan_bank_darah dp on (p.id = dp.id_penjualan)
                join sm_layanan_pendaftaran lp on (p.id_layanan_pendaftaran = lp.id)
                join sm_kemasan_barang km on (km.id = dp.id_kemasan)
                join sm_barang b on (b.id = km.id_barang)
                left join sm_satuan stn on (b.satuan_kekuatan = stn.id)
                join sm_satuan st on (st.id = km.id_kemasan)
                left join sm_sediaan sd on (b.id_sediaan = sd.id)
                left join sm_pabrik pb on (b.id_pabrik = pb.id)
                where lp.id = '" . $id_lp . "' and p.jenis = 'Bank Darah' and p.id_operasi is NULL";
        $query = $this->db->query($sql)->result();
        return $query;
    }

    function deleteDataBHP($data_bhp)
    {
        $this->db->trans_begin();
        $this->db->delete("sm_detail_penjualan", array("id_penjualan" => $data_bhp["id_penjualan"], "id_kemasan" => $data_bhp["id_kemasan"]));
        if ($this->db->trans_status() === false) :
            $this->db->trans_rollback();
            $result["status"] = false;
        endif;

        $this->db->delete("sm_stok", array("id_transaksi" => $data_bhp["id_penjualan"], "transaksi" => "Penjualan", "id_barang" => $data_bhp["id_barang"]));
        if ($this->db->trans_status() === false) :
            $this->db->trans_rollback();
            $result["status"] = false;
        endif;

        $sql = "select sum(harga_jual*qty) as total from sm_detail_penjualan where id_penjualan = '" . $data_bhp["id_penjualan"] . "'";
        $get_detail = $this->db->query($sql)->row();
        if (isset($get_detail->total)) :
            $this->db->where("id", $data_bhp["id_penjualan"]);
            $this->db->update("sm_penjualan", array("total" => $get_detail->total));
            if ($this->db->trans_status() === false) :
                $this->db->trans_rollback();
                $result["status"] = false;
            else :
                $this->db->trans_commit();
                $result["status"] = true;
            endif;
        else :
            $this->db->delete("sm_penjualan", array("id" => $data_bhp["id_penjualan"]));
            if ($this->db->trans_status() === false) :
                $this->db->trans_rollback();
                $result["status"] = false;
            else :
                $this->db->trans_commit();
                $result["status"] = true;
            endif;
        endif;
        return $result;
    }

    function deleteDataPKRT($data_pkrt)
    {
        $this->db->trans_begin();
        $this->db->delete("sm_pembayaran_perbekalan_kesehatan", array("id" => $data_pkrt["id_pembayaran_pkrt"]));
        if ($this->db->trans_status() === false) :
            $this->db->trans_rollback();
            $result["status"] = false;
        endif;

        $sql = "select sum(tarif::int) as total from sm_pembayaran_perbekalan_kesehatan where id_layanan_pendaftaran = '" . $data_pkrt["id_layanan_pendaftaran"] . "'";
        $get_detail = $this->db->query($sql)->row();
        if (isset($get_detail->total)) :
            $this->db->where("id_layanan_pendaftaran", $data_pkrt["id_layanan_pendaftaran"]);
            $this->db->where("jenis_transaksi", "PKRT");
            $this->db->update("sm_pembayaran", array("total" => $get_detail->total));
            if ($this->db->trans_status() === false) :
                $this->db->trans_rollback();
                $result["status"] = false;
            else :
                $this->db->trans_commit();
                $result["status"] = true;
            endif;
        else :
            $this->db->where("jenis_transaksi", "PKRT");
            $this->db->where("id_layanan_pendaftaran", $data_pkrt["id_layanan_pendaftaran"]);
            $this->db->delete("sm_pembayaran");
            if ($this->db->trans_status() === false) :
                $this->db->trans_rollback();
                $result["status"] = false;
            else :
                $this->db->trans_commit();
                $result["status"] = true;
            endif;
        endif;
        return $result;
    }

    function deleteDataDarah($data_darah)
    {
        $this->db->trans_begin();
        $this->db->delete("sm_detail_penjualan_bank_darah", array("id_penjualan" => $data_darah["id_penjualan"], "id_kemasan" => $data_darah["id_kemasan"]));
        if ($this->db->trans_status() === false) :
            $this->db->trans_rollback();
            $result["status"] = false;
        endif;

        $this->db->delete("sm_stok_bank_darah", array("id_transaksi" => $data_darah["id_penjualan"], "transaksi" => "Penjualan", "id_barang" => $data_darah["id_barang"]));
        if ($this->db->trans_status() === false) :
            $this->db->trans_rollback();
            $result["status"] = false;
        endif;

        $sql = "select sum(harga_jual*qty) as total from sm_detail_penjualan_bank_darah where id_penjualan = '" . $data_darah["id_penjualan"] . "'";
        $get_detail = $this->db->query($sql)->row();
        if (isset($get_detail->total)) :
            $this->db->where("id", $data_darah["id_penjualan"]);
            $this->db->update("sm_penjualan_bank_darah", array("total" => $get_detail->total));
            if ($this->db->trans_status() === false) :
                $this->db->trans_rollback();
                $result["status"] = false;
            else :
                $this->db->trans_commit();
                $result["status"] = true;
            endif;
        else :
            $this->db->delete("sm_penjualan_bank_darah", array("id" => $data_darah["id_penjualan"]));
            if ($this->db->trans_status() === false) :
                $this->db->trans_rollback();
                $result["status"] = false;
            else :
                $this->db->trans_commit();
                $result["status"] = true;
            endif;
        endif;
        return $result;
    }

    // resep
    function getLastResepPasien($id_pasien)
    {
        $sql = "select *, date(waktu) as tanggal, EXTRACT(DAY FROM MAX(NOW())-MIN(date(waktu))) as selisih from sm_resep where id_pasien = '" . $id_pasien . "' group by id order by waktu desc limit 1";
        return $this->db->query($sql)->row();
    }

    function getListResep($param = array())
    {
        $add_sql = "";
        if (array_key_exists("id_layanan_pendaftaran", $param)) :
            $arr_and[] = "p.id_layanan_pendaftaran='" . $param["id_layanan_pendaftaran"] . "'";
        endif;

        if (array_key_exists("id_pasien", $param)) :
            $arr_and[] = "p2.id_pasien='" . $param["id_pasien"] . "'";
        endif;

        if (array_key_exists("q", $param)) :
            $arr_and[] = "CONCAT_WS(' ', 'Resep Tanggal:', DATE_FORMAT(r.waktu, '%d/%m/%Y %H:%i'), '||', 'Total:', rupiah(total)) LIKE '%" . $param["q"] . "%'";
        endif;

        if (!empty($arr_and)) :
            $add_sql = " AND " . implode(" AND ", $arr_and);
        endif;

        $limit = !empty($param["limit"]) ? " LIMIT " . $param["limit"] : "";
        $index = !empty($param["index"]) ? " OFFSET " . $param["index"] : "";
        $sql = "SELECT x.*, CONCAT_WS(' ', x.layanan, '-', x.dokter, '||', 'Resep Tanggal:', to_char(x.waktu_resep, 'dd/mm/YYYY HH:ii'), '||', 'Total:', (x.total)) lb_resep_pasien FROM (select p.id, p.id id_penjualan, p.id_layanan_pendaftaran, SUM(dp.qty*(dp.harga_jual-dp.disc_rp))+p.toeslag as total, r.tanggal_resep, r.waktu waktu_resep, r.id as id_resep, peg.nama as dokter, COALESCE(sps.nama, lp.jenis_layanan) as layanan from sm_penjualan p INNER JOIN sm_layanan_pendaftaran lp ON lp.id=p.id_layanan_pendaftaran LEFT JOIN sm_spesialisasi sps ON sps.id = lp.id_unit_layanan INNER JOIN sm_pendaftaran p2 ON p2.id=lp.id_pendaftaran join sm_detail_penjualan dp on (dp.id_penjualan = p.id) join sm_resep_tebus rt on (p.id_resep_tebus = rt.id) join sm_resep r on (rt.id_resep = r.id) JOIN sm_tenaga_medis tm ON tm.id = r.id_dokter JOIN sm_pegawai peg ON peg.id = tm.id_pegawai  where p.id_resep_tebus IS NOT NULL " . $add_sql . " GROUP BY p.id, r.tanggal_resep, r.waktu, r.id, peg.nama, sps.nama, lp.jenis_layanan order BY p.id DESC) x " . $limit . $index;
        $hasil = $this->db->query($sql);
        return $hasil;
    }

    function getListResepTotal($param = array())
    {
        $add_sql = "";
        if (array_key_exists("id_layanan_pendaftaran", $param)) :
            $arr_and[] = "p.id_layanan_pendaftaran='" . $param["id_layanan_pendaftaran"] . "'";
        endif;

        if (array_key_exists("id_pasien", $param)) :
            $arr_and[] = "p2.id_pasien='" . $param["id_pasien"] . "'";
        endif;

        if (array_key_exists("q", $param)) :
            $arr_and[] = "CONCAT_WS(' ', 'Resep Tanggal:', DATE_FORMAT(r.waktu, '%d/%m/%Y %H:%i'), '||', 'Total:', rupiah(total)) LIKE '%" . $param["q"] . "%'";
        endif;

        if (!empty($arr_and)) :
            $add_sql = " AND " . implode(" AND ", $arr_and);
        endif;

        $sql = "SELECT COUNT(x.id_penjualan) total FROM (select p.id id_penjualan, p.id_layanan_pendaftaran, SUM(dp.qty*(dp.harga_jual-dp.disc_rp))+p.toeslag as total, r.tanggal_resep, r.waktu waktu_resep, r.id as id_resep from sm_penjualan p INNER JOIN sm_layanan_pendaftaran lp ON lp.id=p.id_layanan_pendaftaran INNER JOIN sm_pendaftaran p2 ON p2.id=lp.id_pendaftaran join sm_detail_penjualan dp on (dp.id_penjualan = p.id) join sm_resep_tebus rt on (p.id_resep_tebus = rt.id) join sm_resep r on (rt.id_resep = r.id) where p.id_resep_tebus IS NOT NULL " . $add_sql . " GROUP BY p.id, r.tanggal_resep, r.waktu, r.id) x ";

        $hasil = $this->db->query($sql);
        return $hasil;
    }

    private function sqlHistoryResep($search)
    {
        $this->db->select("r.*, date(r.waktu) as tanggal, 
                            CONCAT_WS(' ',b.nama,b.kekuatan,s.nama, COALESCE(sd.nama,''), '<small><i>', COALESCE(pb.nama,''),'</i></small>') as nama_barang, 
                            pg.nama as dokter, p.nama as pasien, lp.jenis_layanan, p.alamat as alamat_pasien, p.id as no_rm, rrd.jumlah_pakai as jumlah, jko.layanan as layanan_ok,
                            rr.aturan_pakai, rrd.dosis_racik, rr.r_no as no_r, rr.keterangan_resep as ket_resep, s.nama as satuan, sp.nama as nama_poli, sp.nama as nama_poli")
            ->from('sm_resep as r')
            ->join('sm_resep_r as rr', 'rr.id_resep = r.id')
            ->join('sm_resep_r_detail as rrd', 'rrd.id_resep_r = rr.id')
            ->join('sm_barang as b', 'b.id = rrd.id_barang')
            ->join('sm_satuan as s', 's.id = b.satuan_kekuatan', 'left')
            ->join('sm_sediaan as sd', 'sd.id = b.id_sediaan', 'left')
            ->join('sm_pabrik as pb', 'pb.id = b.id_pabrik', 'left')
            ->join('sm_tenaga_medis as d', 'd.id = r.id_dokter')
            ->join('sm_pegawai as pg', 'pg.id = d.id_pegawai')
            ->join('sm_pasien as p', 'p.id = r.id_pasien')
            ->join('sm_layanan_pendaftaran as lp', 'lp.id = r.id_layanan_pendaftaran')
            ->join('sm_spesialisasi sp', 'sp.id = lp.id_unit_layanan', 'left')
            ->join('sm_jadwal_kamar_operasi as jko', 'jko.id_layanan_pendaftaran = lp.id', 'left')
            ->where('r.id is not null');

        if (($search['tanggal_awal'] !== '') & ($search['tanggal_akhir'] !== '')) :
            $this->db->where("r.waktu BETWEEN '" . date2mysql($search['tanggal_awal']) . " 00:00:00' AND '" . date2mysql($search['tanggal_akhir']) . " 23:59:59'");
        endif;
        if ($search['dokter'] !== '') :
            $this->db->where('r.id_dokter', $search['dokter'], true);
        endif;
        if ($search['pasien'] !== '') :
            $this->db->where('r.id_pasien', $search['pasien'], true);
        endif;
        if ($search['barang'] !== '') :
            $this->db->where('rrd.id_barang', $search['barang'], true);
        endif;
        if ($search['nama_barang'] !== '') :
            $this->db->where('rrd.id_barang', $search['nama_barang'], true);
        endif;
        if ($search['sediaan'] !== '') :
            $this->db->where('b.id_sediaan', $search['sediaan'], true);
        endif;
        if ($search['golongan'] !== '') :
            $this->db->where('b.id_golongan in ( ' . $search['golongan'] . ')');
        endif;
        if ($search['ven'] !== '') :
            $this->db->where('b.ven', $search['ven'], true);
        endif;
        if ($search['generik'] !== '') :
            $this->db->where('b.generik', $search['generik'], true);
        endif;
        if ($search['formularium'] !== '') :
            $this->db->where('b.formularium', $search['formularium'], true);
        endif;
        if ($search['fornas'] !== '') :
            $this->db->where('b.fornas', $search['fornas'], true);
        endif;
        if ($search['katastropik'] !== '') :
            $this->db->where('b.katastropik', $search['katastropik'], true);
        endif;
        if ($search['id_lp'] !== '') :
            $this->db->where('r.id_layanan_pendaftaran', $search['id_lp'], true);
        endif;
        if ($search['cara_bayar'] !== '') :
            $this->db->where('lp.cara_bayar', $search['cara_bayar'], true);
            if ($search['penjamin'] !== '') :
                $this->db->where('lp.id_penjamin', $search['penjamin'], true);
            endif;
        endif;

        return $this->db->order_by('r.waktu desc');
    }

    private function _listHistoryResep($limit, $start, $search)
    {
        $this->sqlHistoryResep($search);
        if ($limit !== 0) :
            $this->db->limit($limit, $start);
        endif;

        return $this->db->get()->result();
    }

    function getListDataHistoryResep($limit, $start, $search)
    {
        $result['data'] = $this->_listHistoryResep($limit, $start, $search);
        $result['jumlah'] = $this->sqlHistoryResep($search)->get()->num_rows();
        $this->db->close();
        return $result;
    }

    function integrasiResep($idResep)
    {

        if ($idResep === null) {

            die();
        }

        $dataDetailResep = $this->db->select('r.id, rr.id as id_resep_r, b.id as id_barang, b.nama_lengkap as nama_obat, tm.ihs_number as ihs_dokter, pg.nama as nama_pegawai, r.id as id_resep_item, rs.id as id_resep, rs.id_pasien as no_rm, p.nama as nama_pasien, p.ihsn, rr.keterangan_resep, rr.racik, s.code as code_sediaan, s.display as nama_sediaan, l.id as id_layanan_pendaftaran, l.id_encounter, rr.aturan_pakai, ro.code as roa_code, ro.display as roa_display, r.dosis_racik, r.jumlah_pakai, uom.code as code_ucum')
            ->from('sm_resep_r_detail as r')
            ->join('sm_resep_r as rr', 'rr.id = r.id_resep_r', 'left')
            ->join('sm_resep as rs', 'rs.id = rr.id_resep', 'left')
            ->join('sm_layanan_pendaftaran as l', 'l.id = rs.id_layanan_pendaftaran', 'left')
            ->join('sm_tenaga_medis as tm', 'tm.id = rs.id_dokter', 'left')
            ->join('sm_pegawai as pg', 'pg.id = tm.id_pegawai', 'left')
            ->join('sm_pasien as p', 'p.id = rs.id_pasien', 'left')
            ->join('sm_barang as b', 'b.id = r.id_barang', 'left')
            ->join('sm_satuan as sat', 'sat.id = b.satuan_kekuatan', 'left')
            ->join('sm_unit_of_measure as uom', 'uom.code = sat.code_ucum', 'left')
            ->join('sm_roa as ro', 'ro.roa = b.roa', 'left')
            ->join('sm_sediaan as s', 's.id = b.id_sediaan', 'left')
            ->where('r.id', $idResep, true)
            ->get()
            ->row();

        if(empty($dataDetailResep->id_encounter)){

            $this->integrasi_encounter_post($dataDetailResep->id_layanan_pendaftaran);

        }

        if(empty($dataDetailResep->id_encounter)){

            return;

        }



        if (isset($dataDetailResep->racik)) {

            $this->autentikasi_user_post();

            $this->load->model('satu_sehat/Satu_sehat_model', 'sehat');

            $xKonfigurasi = $this->sehat->getConfigSatuSehat();

            $idUser = $this->session->userdata('id_translucent');

            $getID = $this->sehat->aksesSatuSehat($idUser);

            $tokenBearer = $getID->token;

            $xKonfigurasi = $this->sehat->getConfigSatuSehat();

            $header = $this->sehat->authBearer($tokenBearer);

            $url = $xKonfigurasi->apiurl . "Medication";

            if ($dataDetailResep->racik === '0') {

                $codeExtension = 'NC';
                $displayExtension = 'Non-compound';
            } else {

                if ($dataDetailResep->keterangan_resep !== '' && $dataDetailResep->keterangan_resep !== null) {

                    $codeExtension = 'SD';
                    $displayExtension = 'Gives of such doses';
                } else {

                    $codeExtension = 'EP';
                    $displayExtension = 'Divide into equal parts';
                }
            }

            $params = array(
                "resourceType" => "Medication",
                "meta" => array(
                    "profile" => [
                        "https://fhir.kemkes.go.id/r4/StructureDefinition/Medication"
                    ]
                ),
                "identifier" => [
                    array(
                        "system" => "http://sys-ids.kemkes.go.id/medication/" . $xKonfigurasi->organization,
                        "use" => "official",
                        "value" => $dataDetailResep->id
                    )
                ],
                "status" => "active",
                "form" => array(
                    "coding" => [
                        array(
                            "system" => "http://terminology.kemkes.go.id/CodeSystem/medication-form",
                            "code" => $dataDetailResep->code_sediaan,
                            "display" => $dataDetailResep->nama_sediaan
                        )
                    ]
                ),
                "extension" => [
                    array(
                        "url" => "https://fhir.kemkes.go.id/r4/StructureDefinition/MedicationType",
                        "valueCodeableConcept" => array(
                            "coding" => [
                                array(
                                    "system" => "http://terminology.kemkes.go.id/CodeSystem/medication-type",
                                    "code" => $codeExtension,
                                    "display" => $displayExtension
                                )
                            ]
                        )
                    )
                ]
            );

            $dataApi = json_encode($params);

            $output = $this->sehat->postEncounter($url, $dataApi, $header);

            if($output['result'] !== false){

                if ($output['respon'] === 201) {

                    $result = json_decode($output['result']);

                    date_default_timezone_set('Asia/Jakarta');

                    $update = ["id_integrasi_resep" => $result->id];

                    $this->db->where('id', $idResep)->update('sm_resep_r_detail', $update);

                    $xDetailData = ["kategori" => "Medication", "no_rm" => $dataDetailResep->no_rm, "message" => json_encode($params), "jenis_data" => 'ok', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama'), "respon" => $output['respon'], "function" => 'integrasiResep'];

                    $this->db->insert('sm_satu_sehat_log', $xDetailData);

                    if (isset($result->id)) {

                        $this->autentikasi_user_post();

                        $this->load->model('satu_sehat/Satu_sehat_model', 'sehat');

                        $xKonfigurasiRequest = $this->sehat->getConfigSatuSehat();

                        $idUserRequest = $this->session->userdata('id_translucent');

                        $getIDRequest = $this->sehat->aksesSatuSehat($idUserRequest);

                        $tokenBearerRequest = $getIDRequest->token;

                        $headerRequest = $this->sehat->authBearer($tokenBearerRequest);

                        $urlRequest = $xKonfigurasiRequest->apiurl . "MedicationRequest";

                        if ($dataDetailResep->keterangan_resep !== '' && $dataDetailResep->keterangan_resep !== null) {

                            $intent = 'instance-order';
                        } else {

                            $intent = 'original-order';
                        }

                        $authoredOn = $this->konversiTanggal();

                        $dataAturanPakai = $this->db->select('rr.id, rr.aturan_pakai, rr.sequence')
                            ->from('sm_resep_r as rr')
                            ->join('sm_resep as rs', 'rs.id = rr.id_resep', 'left')
                            ->where('rs.id', $dataDetailResep->id_resep, true)
                            ->get()
                            ->result();


                        if (!empty($dataAturanPakai)) {

                            foreach ($dataAturanPakai as $key => $racik) {
                                $dataRacik[] = $racik->aturan_pakai;
                            }





                            $firstValue = reset($dataRacik); // Fungsi reset mengambil elemen pertama dari array
                            $allSame = true; // Flag untuk menandai apakah semua nilai sama

                            foreach ($dataRacik as $value) {
                                if ($value !== $firstValue) {
                                    $allSame = false;
                                    break; // Keluar dari loop karena sudah ada nilai yang berbeda
                                }
                            }

                            if ($allSame) {

                                $sequence = 1;
                            } else {

                                $dataDetailResepR = $this->db->select('rr.id, rr.aturan_pakai, rr.sequence')
                                    ->from('sm_resep_r as rr')
                                    ->where('rr.id', $dataDetailResep->id_resep_r, true)
                                    ->get()
                                    ->row();

                                if ($dataDetailResepR->sequence !== null && $dataDetailResepR->sequence !== '') {

                                    $sequence = (int)$dataDetailResepR->sequence;
                                } else {

                                    $x = 1;
                                    $currentAturanPakai = null;

                                    foreach ($dataAturanPakai as $index => $item) {

                                        if ($item->aturan_pakai !== $currentAturanPakai) {
                                            // Jika 'aturan_pakai' berbeda dari yang sebelumnya, increment sequence
                                            $currentAturanPakai = $item->aturan_pakai;
                                            $dataAturanPakai[$index]->sequence = $x++;
                                        } else {
                                            // Jika sama, gunakan sequence yang sama
                                            $dataAturanPakai[$index]->sequence = $x - 1;
                                        }
                                    }

                                    foreach ($dataAturanPakai as $x => $y) {

                                        $updateRequest = ["sequence" => (int)$y->sequence];

                                        $this->db->where('id', (int)$y->id)->update('sm_resep_r', $updateRequest);
                                    }

                                    $cekUlangResepR = $this->db->select('rr.id, rr.aturan_pakai, rr.sequence')
                                        ->from('sm_resep_r as rr')
                                        ->where('rr.id', $dataDetailResep->id_resep_r, true)
                                        ->get()
                                        ->row();

                                    if (isset($cekUlangResepR->sequence)) {

                                        $sequence = $cekUlangResepR->sequence;
                                    }
                                }
                            }

                            $cekRelasiAturan = $this->db->select('apo.jml_pemberian')
                                ->from('sm_aturan_pakai_obat as apo')
                                ->where('apo.signa', $dataDetailResep->aturan_pakai, true)
                                ->where('apo.is_active', 1, true)
                                ->get()
                                ->row();

                            if (isset($cekRelasiAturan->jml_pemberian)) {

                                $frequencyPeriod = $cekRelasiAturan->jml_pemberian;
                            } else {

                                date_default_timezone_set('Asia/Jakarta');
                                $xDetailDataRequest = ["kategori" => "MedicationRequest", "no_rm" => $dataDetailResep->no_rm, "message" => 'Tidak Ada data jumlah pemberian di sm resep r', "jenis_data" => 'error', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama'), "param" => $dataDetailResep->id_resep . ' Medication ' . $result->id, "respon" => $output['respon'], "function" => 'integrasiResep'];
                                $this->db->insert('sm_satu_sehat_log', $xDetailDataRequest);

                                return;
                            }
                        } else {

                            date_default_timezone_set('Asia/Jakarta');
                            $xDetailDataRequest = ["kategori" => "MedicationRequest", "no_rm" => $dataDetailResep->no_rm, "message" => 'Tidak Ada Aturan Pakai', "jenis_data" => 'error', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama'), "param" => $dataDetailResep->id_resep . ' Medication ' . $result->id, "respon" => $output['respon'], "function" => 'integrasiResep'];
                            $this->db->insert('sm_satu_sehat_log', $xDetailDataRequest);

                            return;
                        }

                        $paramRequest =  array(
                            "resourceType" => "MedicationRequest",
                            "identifier" => [
                                array(
                                    "system" => "http://sys-ids.kemkes.go.id/prescription/" . $xKonfigurasi->organization,
                                    "use" => "official",
                                    "value" => $dataDetailResep->id_resep
                                ),
                                array(
                                    "system" => "http://sys-ids.kemkes.go.id/prescription-item/" . $xKonfigurasi->organization,
                                    "use" => "official",
                                    "value" => $dataDetailResep->id_resep_item
                                )
                            ],
                            "status" => "active",
                            "intent" => $intent,
                            "category" => [
                                array(
                                    "coding" => [
                                        array(
                                            "system" => "http://terminology.hl7.org/CodeSystem/medicationrequest-category",
                                            "code" => "outpatient",
                                            "display" => "Outpatient"
                                        )
                                    ]
                                )
                            ],
                            "medicationReference" => array(
                                "reference" => "Medication/" . $result->id,
                                "display" => $dataDetailResep->nama_obat
                            ),
                            "subject" => array(
                                "reference" => "Patient/" . $dataDetailResep->ihsn,
                                "display" => $dataDetailResep->nama_pasien
                            ),
                            "encounter" => array(
                                "reference" => "Encounter/" . $dataDetailResep->id_encounter
                            ),
                            "authoredOn" => $authoredOn,
                            "requester" => array(
                                "reference" => "Practitioner/" . $dataDetailResep->ihs_dokter,
                                "display" => $dataDetailResep->nama_pegawai
                            ),
                            "dosageInstruction" => [
                                array(
                                    "sequence" => (int)$sequence,
                                    "timing" => array(
                                        "repeat" => array(
                                            "frequency" => (int)$frequencyPeriod,
                                            "period" => (int)$frequencyPeriod,
                                            "periodUnit" => "d"
                                        )
                                    ),
                                    "route" => array(
                                        "coding" => [
                                            array(
                                                "system" => "http://www.whocc.no/atc",
                                                "code" => $dataDetailResep->roa_code,
                                                "display" => $dataDetailResep->roa_display
                                            )
                                        ]
                                    ),
                                    "doseAndRate" => [
                                        array(
                                            "doseQuantity" => array(
                                                "value" => (int)$dataDetailResep->dosis_racik,
                                                "unit" => $dataDetailResep->code_ucum,
                                                "system" => "http://unitsofmeasure.org",
                                                "code" => $dataDetailResep->code_ucum
                                            )
                                        )
                                    ]
                                )
                            ],
                            "dispenseRequest" => array(
                                "quantity" => array(
                                    "value" => (int)$dataDetailResep->jumlah_pakai,
                                    "unit" => $dataDetailResep->code_ucum,
                                    "system" => "http://unitsofmeasure.org",
                                    "code" => $dataDetailResep->code_ucum
                                ),
                                "performer" => array(
                                    "reference" => "Organization/" . $xKonfigurasi->organization
                                )
                            )
                        );

                        $dataApiRequest = json_encode($paramRequest);

                        $outputRequest = $this->sehat->postEncounter($urlRequest, $dataApiRequest, $headerRequest);

                        if($outputRequest['result'] !== false){

                            if ($outputRequest['respon'] === 201) {

                                $resultRequest = json_decode($outputRequest['result']);

                                date_default_timezone_set('Asia/Jakarta');

                                if (isset($resultRequest->id)) {

                                    $updateRequest = ["id_medication_request" => $resultRequest->id];

                                    $this->db->where('id', $idResep)->update('sm_resep_r_detail', $updateRequest);

                                    if (isset($dataDetailResep->id_barang)) {

                                        $dataObatTebus = $this->db->select('r.id')
                                            ->from('sm_resep_tebus_r_detail as r')
                                            ->join('sm_resep_tebus_r as rr', 'rr.id = r.id_resep_tebus_r', 'left')
                                            ->join('sm_resep_tebus as rs', 'rs.id = rr.id_resep_tebus', 'left')
                                            ->where('r.id_barang', (int)$dataDetailResep->id_barang, true)
                                            ->where('rs.id_resep', (int)$dataDetailResep->id_resep, true)
                                            ->get()
                                            ->row();

                                        if (isset($dataObatTebus->id)) {

                                            $updateObatTebus = ["id_integrasi_resep" => $result->id, "id_medication_request" => $resultRequest->id];

                                            $this->db->where('id', (int)$dataObatTebus->id)->update('sm_resep_tebus_r_detail', $updateObatTebus);
                                        }
                                    }

                                    $xDetailDataRequest = ["kategori" => "MedicationRequest", "no_rm" => $dataDetailResep->no_rm, "message" => json_encode($paramRequest), "jenis_data" => 'ok', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama'), "respon" => $outputRequest['respon'], "function" => 'integrasiResep'];

                                    $this->db->insert('sm_satu_sehat_log', $xDetailDataRequest);
                                } else {

                                    $xDetailDataRequest = ["kategori" => "MedicationRequest", "no_rm" => $dataDetailResep->no_rm, "message" => json_encode($paramRequest), "jenis_data" => 'error', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama'), "respon" => $outputRequest['respon'], "param" => $outputRequest['result'], "function" => 'integrasiResep'];

                                    $this->db->insert('sm_satu_sehat_log', $xDetailDataRequest);
                                }
                            } else {

                                $resultRequest = json_decode($outputRequest['result']);

                                date_default_timezone_set('Asia/Jakarta');
                                $xDetailDataRequest = ["kategori" => "MedicationRequest", "no_rm" => $dataDetailResep->no_rm, "message" => $outputRequest['result'], "jenis_data" => 'error', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama'), "param" => json_encode($paramRequest), "respon" => $outputRequest['respon'], "function" => 'integrasiResep'];
                                $this->db->insert('sm_satu_sehat_log', $xDetailDataRequest);
                            }

                        }

                    }
                } else {

                    $result = json_decode($output['result']);

                    if (isset($result->issue)) {

                        $issued = $result->issue;
                        $details = $issued[0]->details;
                        date_default_timezone_set('Asia/Jakarta');
                        $xDetailData = ["kategori" => "Medication", "no_rm" => $dataDetailResep->no_rm, "message" => $output['result'], "jenis_data" => 'error', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama'), "param" => json_encode($params), "respon" => $output['respon'], "function" => 'integrasiResep'];
                        $this->db->insert('sm_satu_sehat_log', $xDetailData);
                    } else {

                        date_default_timezone_set('Asia/Jakarta');
                        $xDetailData = ["kategori" => "Medication", "no_rm" => $dataDetailResep->no_rm, "message" => $output['result'], "jenis_data" => 'error', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama'), "param" => json_encode($params), "respon" => $output['respon'], "function" => 'integrasiResep'];
                        $this->db->insert('sm_satu_sehat_log', $xDetailData);
                    }
                }

            }
        }
    }

    private function konversiTanggal()
    {

        date_default_timezone_set('Asia/Jakarta');

        $tglSekarang = new DateTime();

        $ubahFormat = $tglSekarang->format('Y-m-d\TH:i:sP');

        return $ubahFormat;
    }

    function cekIdMedicationRequest($idEncounter, $idResepDetail, $idResep, $namaObat){

        $this->load->model('satu_sehat/Satu_sehat_model', 'sehat');

        if(isset($idEncounter)){

            $this->autentikasi_user_post();

            $xKonfigurasi = $this->sehat->getConfigSatuSehat();

            $idUser = $this->session->userdata('id_translucent');

            $getID = $this->sehat->aksesSatuSehat($idUser);

            $tokenBearer = $getID->token;

            $url = $xKonfigurasi->apiurl."MedicationRequest?encounter=".$idEncounter;

            $header = $this->sehat->authBearer($tokenBearer);

            $output = $this->sehat->postBearer($url, $header);

            if($output['result'] !== false){

                $entryOutput = json_decode($output['result']);

                foreach ($entryOutput as $a => $med) {

                    if(isset($med->identifier[0]->value)){

                        if($med->identifier[0]->value === $idResep && $med->identifier[1]->value === $idResepDetail){

                            return $med->id;

                            break;

                        }

                    }

                    if(isset($med->medicationReference->display)){

                        if($med->medicationReference->display === $namaObat){

                            return $med->id;

                            break;

                        }

                    }

                }

            }

        }
    
    }

    function dataDetailResep($idResep){

        return $this->db->select('r.id, rs.id as id_rsp, b.id as id_barang, r.id_integrasi_resep, r.id_medication_request, b.nama_lengkap as nama_obat, tm.ihs_number as ihs_dokter, pg.nama as nama_pegawai, r.id as id_resep_item, rs.id as id_resep, rs.id_pasien as no_rm, rr.id as id_resep_r, p.nama as nama_pasien, p.ihsn, rr.keterangan_resep, l.id as id_layanan_pendaftaran, l.id_encounter, rr.aturan_pakai, rr.racik, s.code as code_sediaan, s.display as nama_sediaan, ro.code as roa_code, ro.display as roa_display, r.dosis_racik, r.jumlah_pakai, uom.code as code_ucum')
            ->from('sm_resep_r_detail as r')
            ->join('sm_resep_r as rr', 'rr.id = r.id_resep_r', 'left')
            ->join('sm_resep as rs', 'rs.id = rr.id_resep', 'left')
            ->join('sm_layanan_pendaftaran as l', 'l.id = rs.id_layanan_pendaftaran', 'left')
            ->join('sm_tenaga_medis as tm', 'tm.id = rs.id_dokter', 'left')
            ->join('sm_pegawai as pg', 'pg.id = tm.id_pegawai', 'left')
            ->join('sm_pasien as p', 'p.id = rs.id_pasien', 'left')
            ->join('sm_barang as b', 'b.id = r.id_barang', 'left')
            ->join('sm_satuan as sat', 'sat.id = b.satuan_kekuatan', 'left')
            ->join('sm_unit_of_measure as uom', 'uom.code = sat.code_ucum', 'left')
            ->join('sm_roa as ro', 'ro.roa = b.roa', 'left')
            ->join('sm_sediaan as s', 's.id = b.id_sediaan', 'left')
            ->where('r.id', $idResep, true)
            ->get()
            ->row();

    }

    function perbaharuiIntegrasiResep($idResep, $x)
    {

        if ($idResep === null) {

            return;
        }

        $dataDetailResep = $this->dataDetailResep($idResep);


        if(empty($dataDetailResep->id_encounter)){

            $this->integrasi_encounter_post($dataDetailResep->id_layanan_pendaftaran);

        }

        $dataDetailResep = $this->dataDetailResep($idResep);

        if(empty($dataDetailResep->id_encounter)){

            return;

        }

        if (isset($dataDetailResep->racik)) {

            $dataBanding = $this->db->select('r.id, r.id_reseprdetaillog, r.id_resep, r.id_integrasi_resep, r.id_medication_request')
                ->from('sm_reseprdetaillog as r')
                ->where('r.id_resep', $dataDetailResep->id_rsp, true)
                ->where('r.id_barang', $dataDetailResep->id_barang, true)
                ->order_by('r.id', 'desc')
                ->limit(1)
                ->get()
                ->row();

            if ($x === 'Edit') {

                if (isset($dataBanding->id_integrasi_resep)) {

                    $update = ["id_integrasi_resep" => $dataBanding->id_integrasi_resep, "id_medication_request" => $dataBanding->id_medication_request];

                    $this->db->where('id', $idResep)->update('sm_resep_r_detail', $update);

                    $idIntegrasiResep = $dataBanding->id_integrasi_resep;
                    $idMedicationRequest = $dataBanding->id_medication_request;

                    if (isset($dataDetailResep->id_barang)) {

                        $dataObatTebus = $this->db->select('r.id, r.id_medication_request')
                            ->from('sm_resep_tebus_r_detail as r')
                            ->join('sm_resep_tebus_r as rr', 'rr.id = r.id_resep_tebus_r', 'left')
                            ->join('sm_resep_tebus as rs', 'rs.id = rr.id_resep_tebus', 'left')
                            ->where('r.id_barang', (int)$dataDetailResep->id_barang, true)
                            ->where('rs.id_resep', (int)$dataDetailResep->id_rsp, true)
                            ->get()
                            ->row();

                        if (isset($dataObatTebus->id)) {

                            $updateObatTebus = ["id_integrasi_resep" => $dataBanding->id_integrasi_resep, "id_medication_request" => $dataBanding->id_medication_request];

                            $this->db->where('id', (int)$dataObatTebus->id)->update('sm_resep_tebus_r_detail', $updateObatTebus);
                        }
                    }

                } else {

                    $this->integrasiResep($idResep);

                    return;
                }

            } else {

                $idIntegrasiResep = $dataDetailResep->id_integrasi_resep;
                $idMedicationRequest = $dataBanding->id_medication_request;
            }

            if(empty($idIntegrasiResep)){

                return;

            }

            if(empty($idMedicationRequest)){

                $idMedicationRequest = $this->cekIdMedicationRequest($dataDetailResep->id_encounter, $dataBanding->id_reseprdetaillog, $dataBanding->id_resep, $dataDetailResep->nama_obat);

                if(isset($idMedicationRequest)){

                    $updateDataBanding = ["id_medication_request" => $idMedicationRequest];

                    $this->db->where('id', $dataBanding->id)->update('sm_reseprdetaillog', $updateDataBanding);

                    if (isset($dataObatTebus->id)) {

                        if(empty($dataObatTebus->id_medication_request)){

                            $updateObatTebusUlang = ["id_medication_request" => $idMedicationRequest];

                            $this->db->where('id', (int)$dataObatTebus->id)->update('sm_resep_tebus_r_detail', $updateObatTebusUlang);

                        }

                    }

                    if (empty($dataDetailResep->id_medication_request)) {

                        $update = ["id_medication_request" => $idMedicationRequest];

                        $this->db->where('id', $idResep)->update('sm_resep_r_detail', $update);

                    }

                }

            }

            if(empty($idMedicationRequest)){

                return;

            }

            $this->autentikasi_user_post();

            $this->load->model('satu_sehat/Satu_sehat_model', 'sehat');

            $xKonfigurasi = $this->sehat->getConfigSatuSehat();

            $idUser = $this->session->userdata('id_translucent');

            $getID = $this->sehat->aksesSatuSehat($idUser);

            $tokenBearer = $getID->token;

            $xKonfigurasi = $this->sehat->getConfigSatuSehat();

            $header = $this->sehat->authBearer($tokenBearer);

            $url = $xKonfigurasi->apiurl . "Medication/" . $dataDetailResep->id_integrasi_resep;

            if ($dataDetailResep->racik === '0') {

                $codeExtension = 'NC';
                $displayExtension = 'Non-compound';
            } else {

                if ($dataDetailResep->keterangan_resep !== '' && $dataDetailResep->keterangan_resep !== null) {

                    $codeExtension = 'SD';
                    $displayExtension = 'Gives of such doses';
                } else {

                    $codeExtension = 'EP';
                    $displayExtension = 'Divide into equal parts';
                }
            }

            if (isset($x)) {

                if ($x === 'Edit') {

                    $tipeEdit = 'active';
                    $tipeMedication = 'active';
                } else {

                    $tipeEdit = 'entered-in-error';
                    $tipeMedication = 'cancelled';
                }
            }

            $params = array(
                "resourceType" => "Medication",
                "id" => $idIntegrasiResep,
                "meta" => array(
                    "profile" => [
                        "https://fhir.kemkes.go.id/r4/StructureDefinition/Medication"
                    ]
                ),
                "identifier" => [
                    array(
                        "system" => "http://sys-ids.kemkes.go.id/medication/" . $xKonfigurasi->organization,
                        "use" => "official",
                        "value" => $dataDetailResep->id
                    )
                ],
                "status" => $tipeEdit,
                "form" => array(
                    "coding" => [
                        array(
                            "system" => "http://terminology.kemkes.go.id/CodeSystem/medication-form",
                            "code" => $dataDetailResep->code_sediaan,
                            "display" => $dataDetailResep->nama_sediaan
                        )
                    ]
                ),
                "extension" => [
                    array(
                        "url" => "https://fhir.kemkes.go.id/r4/StructureDefinition/MedicationType",
                        "valueCodeableConcept" => array(
                            "coding" => [
                                array(
                                    "system" => "http://terminology.kemkes.go.id/CodeSystem/medication-type",
                                    "code" => $codeExtension,
                                    "display" => $displayExtension
                                )
                            ]
                        )
                    )
                ]
            );

            $dataApi = json_encode($params);

            $output = $this->sehat->putEncounter($url, $dataApi, $header);

            if($output['result'] !== false){

                if ($output['respon'] === 200) {

                    $result = json_decode($output['result']);

                    date_default_timezone_set('Asia/Jakarta');

                    $update = ["respon_edit" => 'OK'];

                    $this->db->where('id_reseprdetaillog', $idResep)->update('sm_reseprdetaillog', $update);

                    $xDetailData = ["kategori" => "Update Medication", "no_rm" => $dataDetailResep->no_rm, "message" => json_encode($params), "jenis_data" => 'ok', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama'), "respon" => $output['respon'], "function" => 'perbaharuiIntegrasiResep'];

                    $this->db->insert('sm_satu_sehat_log', $xDetailData);

                    if (isset($result->id)) {

                        $this->autentikasi_user_post();

                        $this->load->model('satu_sehat/Satu_sehat_model', 'sehat');

                        $xKonfigurasiRequest = $this->sehat->getConfigSatuSehat();

                        $idUserRequest = $this->session->userdata('id_translucent');

                        $getIDRequest = $this->sehat->aksesSatuSehat($idUserRequest);

                        $tokenBearerRequest = $getIDRequest->token;

                        $headerRequest = $this->sehat->authBearer($tokenBearerRequest);

                        $urlRequest = $xKonfigurasiRequest->apiurl . "MedicationRequest";

                        if ($dataDetailResep->keterangan_resep !== '' && $dataDetailResep->keterangan_resep !== null) {

                            $intent = 'instance-order';
                        } else {

                            $intent = 'original-order';
                        }

                        $authoredOn = $this->konversiTanggal();

                        $dataAturanPakai = $this->db->select('rr.id, rr.aturan_pakai, rr.sequence')
                            ->from('sm_resep_r as rr')
                            ->join('sm_resep as rs', 'rs.id = rr.id_resep', 'left')
                            ->where('rs.id', $dataDetailResep->id_rsp, true)
                            ->get()
                            ->result();


                        if (!empty($dataAturanPakai)) {

                            foreach ($dataAturanPakai as $key => $racik) {
                                $dataRacik[] = $racik->aturan_pakai;
                                // $dataSequence['sequence'] = $racik->sequence;
                                // $dataSequence['id'] = $racik->id;
                            }


                            $firstValue = reset($dataRacik); // Fungsi reset mengambil elemen pertama dari array
                            $allSame = true; // Flag untuk menandai apakah semua nilai sama

                            foreach ($dataRacik as $value) {
                                if ($value !== $firstValue) {
                                    $allSame = false;
                                    break; // Keluar dari loop karena sudah ada nilai yang berbeda
                                }
                            }

                            if ($allSame) {

                                $sequence = 1;
                            } else {

                                $dataDetailResepR = $this->db->select('rr.id, rr.aturan_pakai, rr.sequence')
                                    ->from('sm_resep_r as rr')
                                    ->where('rr.id', $dataDetailResep->id_resep_r, true)
                                    ->get()
                                    ->row();

                                if ($dataDetailResepR->sequence !== null && $dataDetailResepR->sequence !== '') {

                                    $sequence = (int)$dataDetailResepR->sequence;
                                } else {

                                    $x = 1;
                                    $currentAturanPakai = null;

                                    foreach ($dataAturanPakai as $index => $item) {

                                        if ($item->aturan_pakai !== $currentAturanPakai) {
                                            // Jika 'aturan_pakai' berbeda dari yang sebelumnya, increment sequence
                                            $currentAturanPakai = $item->aturan_pakai;
                                            $dataAturanPakai[$index]->sequence = $x++;
                                        } else {
                                            // Jika sama, gunakan sequence yang sama
                                            $dataAturanPakai[$index]->sequence = $x - 1;
                                        }
                                    }

                                    foreach ($dataAturanPakai as $x => $y) {

                                        $updateRequest = ["sequence" => $y->sequence];

                                        $this->db->where('id', (int)$y->id)->update('sm_resep_r', $updateRequest);
                                    }

                                    $cekUlangResepR = $this->db->select('rr.id, rr.aturan_pakai, rr.sequence')
                                        ->from('sm_resep_r as rr')
                                        ->where('rr.id', $dataDetailResep->id_resep_r, true)
                                        ->get()
                                        ->row();

                                    if (isset($cekUlangResepR->sequence)) {

                                        $sequence = $cekUlangResepR->sequence;
                                    }
                                }
                            }

                            $cekRelasiAturan = $this->db->select('apo.jml_pemberian')
                                ->from('sm_aturan_pakai_obat as apo')
                                ->where('apo.signa', $dataDetailResep->aturan_pakai, true)
                                ->where('apo.is_active', 1, true)
                                ->get()
                                ->row();

                            if (isset($cekRelasiAturan->jml_pemberian)) {

                                $frequencyPeriod = $cekRelasiAturan->jml_pemberian;
                            } else {

                                date_default_timezone_set('Asia/Jakarta');
                                $xDetailDataRequest = ["kategori" => "MedicationRequest", "no_rm" => $dataDetailResep->no_rm, "message" => 'Tidak Ada data jumlah pemberian di sm resep r', "jenis_data" => 'error', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama'), "param" => $dataDetailResep->id_resep . ' Medication ' . $result->id, "respon" => $output['respon'], "function" => 'integrasiResep'];
                                $this->db->insert('sm_satu_sehat_log', $xDetailDataRequest);

                                return;
                            }
                        } else {

                            date_default_timezone_set('Asia/Jakarta');
                            $xDetailDataRequest = ["kategori" => "MedicationRequest", "no_rm" => $dataDetailResep->no_rm, "message" => 'Tidak Ada Aturan Pakai', "jenis_data" => 'error', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama'), "param" => $dataDetailResep->id_resep . ' Medication ' . $result->id, "respon" => $output['respon'], "function" => 'integrasiResep'];
                            $this->db->insert('sm_satu_sehat_log', $xDetailDataRequest);

                            return;
                        }

                        $paramRequest =  array(
                            "resourceType" => "MedicationRequest",
                            "id" => $idMedicationRequest,
                            "identifier" => [
                                array(
                                    "system" => "http://sys-ids.kemkes.go.id/prescription/" . $xKonfigurasi->organization,
                                    "use" => "official",
                                    "value" => $dataDetailResep->id_resep
                                ),
                                array(
                                    "system" => "http://sys-ids.kemkes.go.id/prescription-item/" . $xKonfigurasi->organization,
                                    "use" => "official",
                                    "value" => $dataDetailResep->id_resep_item
                                )
                            ],
                            "status" => $tipeMedication,
                            "intent" => $intent,
                            "category" => [
                                array(
                                    "coding" => [
                                        array(
                                            "system" => "http://terminology.hl7.org/CodeSystem/medicationrequest-category",
                                            "code" => "outpatient",
                                            "display" => "Outpatient"
                                        )
                                    ]
                                )
                            ],
                            "medicationReference" => array(
                                "reference" => "Medication/" . $result->id,
                                "display" => $dataDetailResep->nama_obat
                            ),
                            "subject" => array(
                                "reference" => "Patient/" . $dataDetailResep->ihsn,
                                "display" => $dataDetailResep->nama_pasien
                            ),
                            "encounter" => array(
                                "reference" => "Encounter/" . $dataDetailResep->id_encounter
                            ),
                            "authoredOn" => $authoredOn,
                            "requester" => array(
                                "reference" => "Practitioner/" . $dataDetailResep->ihs_dokter,
                                "display" => $dataDetailResep->nama_pegawai
                            ),
                            "dosageInstruction" => [
                                array(
                                    "sequence" => (int)$sequence,
                                    "timing" => array(
                                        "repeat" => array(
                                            "frequency" => (int)$frequencyPeriod,
                                            "period" => (int)$frequencyPeriod,
                                            "periodUnit" => "d"
                                        )
                                    ),
                                    "route" => array(
                                        "coding" => [
                                            array(
                                                "system" => "http://www.whocc.no/atc",
                                                "code" => $dataDetailResep->roa_code,
                                                "display" => $dataDetailResep->roa_display
                                            )
                                        ]
                                    ),
                                    "doseAndRate" => [
                                        array(
                                            "doseQuantity" => array(
                                                "value" => (int)$dataDetailResep->dosis_racik,
                                                "unit" => $dataDetailResep->code_ucum,
                                                "system" => "http://unitsofmeasure.org",
                                                "code" => $dataDetailResep->code_ucum
                                            )
                                        )
                                    ]
                                )
                            ],
                            "dispenseRequest" => array(
                                "quantity" => array(
                                    "value" => (int)$dataDetailResep->jumlah_pakai,
                                    "unit" => $dataDetailResep->code_ucum,
                                    "system" => "http://unitsofmeasure.org",
                                    "code" => $dataDetailResep->code_ucum
                                ),
                                "performer" => array(
                                    "reference" => "Organization/" . $xKonfigurasiRequest->organization
                                )
                            )
                        );

                        $dataApiRequest = json_encode($paramRequest);

                        $outputRequest = $this->sehat->putEncounter($urlRequest, $dataApiRequest, $headerRequest);

                        if($outputRequest['result'] !== false){

                            if ($outputRequest['respon'] === 201 | $outputRequest['respon'] === 200) {

                                $resultRequest = json_decode($outputRequest['result']);

                                date_default_timezone_set('Asia/Jakarta');

                                $xDetailDataRequest = ["kategori" => "deleteMedicationRequest", "no_rm" => $dataDetailResep->no_rm, "message" => json_encode($paramRequest), "jenis_data" => 'ok', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama'), "respon" => $outputRequest['respon'], "function" => 'perbaharuiIntegrasiResep'];

                                $this->db->insert('sm_satu_sehat_log', $xDetailDataRequest);
                            } else {

                                $resultRequest = json_decode($outputRequest['result']);

                                date_default_timezone_set('Asia/Jakarta');
                                $xDetailDataRequest = ["kategori" => "deleteMedicationRequest", "no_rm" => $dataDetailResep->no_rm, "message" => $outputRequest['result'], "jenis_data" => 'error', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama'), "param" => json_encode($paramRequest), "respon" => $outputRequest['respon'], "function" => 'perbaharuiIntegrasiResep'];
                                $this->db->insert('sm_satu_sehat_log', $xDetailDataRequest);
                            }

                        }
                    }
                } else if ($output['respon'] === 201) {

                    $result = json_decode($output['result']);

                    date_default_timezone_set('Asia/Jakarta');

                    if (isset($dataBanding->id)) {

                        $update = ["respon_edit" => 'OK'];

                        $this->db->where('id', $dataBanding->id)->update('sm_reseprdetaillog', $update);
                    }

                    $xDetailData = ["kategori" => "Update Medication", "no_rm" => $dataDetailResep->no_rm, "message" => json_encode($params), "jenis_data" => 'ok', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama'), "respon" => $output['respon'], "function" => 'perbaharuiIntegrasiResep'];

                    $this->db->insert('sm_satu_sehat_log', $xDetailData);

                    if (isset($result->id)) {

                        $this->autentikasi_user_post();

                        $this->load->model('satu_sehat/Satu_sehat_model', 'sehat');

                        $xKonfigurasiRequest = $this->sehat->getConfigSatuSehat();

                        $idUserRequest = $this->session->userdata('id_translucent');

                        $getIDRequest = $this->sehat->aksesSatuSehat($idUser);

                        $tokenBearerRequest = $getIDRequest->token;

                        $headerRequest = $this->sehat->authBearer($tokenBearerRequest);

                        $urlRequest = $xKonfigurasiRequest->apiurl . "MedicationRequest";

                        if ($dataDetailResep->keterangan_resep !== '' && $dataDetailResep->keterangan_resep !== null) {

                            $intent = 'instance-order';
                        } else {

                            $intent = 'original-order';
                        }

                        $authoredOn = $this->konversiTanggal();

                        $dataAturanPakai = $this->db->select('rr.id, rr.aturan_pakai, rr.sequence')
                            ->from('sm_resep_r as rr')
                            ->join('sm_resep as rs', 'rs.id = rr.id_resep', 'left')
                            ->where('rs.id', $dataDetailResep->id_rsp, true)
                            ->get()
                            ->result();


                        if (!empty($dataAturanPakai)) {

                            foreach ($dataAturanPakai as $key => $racik) {
                                $dataRacik[] = $racik->aturan_pakai;
                                // $dataSequence['sequence'] = $racik->sequence;
                                // $dataSequence['id'] = $racik->id;
                            }


                            $firstValue = reset($dataRacik); // Fungsi reset mengambil elemen pertama dari array
                            $allSame = true; // Flag untuk menandai apakah semua nilai sama

                            foreach ($dataRacik as $value) {
                                if ($value !== $firstValue) {
                                    $allSame = false;
                                    break; // Keluar dari loop karena sudah ada nilai yang berbeda
                                }
                            }

                            if ($allSame) {

                                $sequence = 1;
                            } else {

                                $dataDetailResepR = $this->db->select('rr.id, rr.aturan_pakai, rr.sequence')
                                    ->from('sm_resep_r as rr')
                                    ->where('rr.id', $dataDetailResep->id_resep_r, true)
                                    ->get()
                                    ->row();

                                if ($dataDetailResepR->sequence !== null && $dataDetailResepR->sequence !== '') {

                                    $sequence = (int)$dataDetailResepR->sequence;
                                } else {

                                    $x = 1;
                                    $currentAturanPakai = null;

                                    foreach ($dataAturanPakai as $index => $item) {

                                        if ($item->aturan_pakai !== $currentAturanPakai) {
                                            // Jika 'aturan_pakai' berbeda dari yang sebelumnya, increment sequence
                                            $currentAturanPakai = $item->aturan_pakai;
                                            $dataAturanPakai[$index]->sequence = $x++;
                                        } else {
                                            // Jika sama, gunakan sequence yang sama
                                            $dataAturanPakai[$index]->sequence = $x - 1;
                                        }
                                    }

                                    foreach ($dataAturanPakai as $x => $y) {

                                        $updateRequest = ["sequence" => $y->sequence];

                                        $this->db->where('id', (int)$y->id)->update('sm_resep_r', $updateRequest);
                                    }

                                    $cekUlangResepR = $this->db->select('rr.id, rr.aturan_pakai, rr.sequence')
                                        ->from('sm_resep_r as rr')
                                        ->where('rr.id', $dataDetailResep->id_resep_r, true)
                                        ->get()
                                        ->row();

                                    if (isset($cekUlangResepR->sequence)) {

                                        $sequence = $cekUlangResepR->sequence;
                                    }
                                }
                            }

                            $cekRelasiAturan = $this->db->select('apo.jml_pemberian')
                                ->from('sm_aturan_pakai_obat as apo')
                                ->where('apo.signa', $dataDetailResep->aturan_pakai, true)
                                ->where('apo.is_active', 1, true)
                                ->get()
                                ->row();

                            if (isset($cekRelasiAturan->jml_pemberian)) {

                                $frequencyPeriod = $cekRelasiAturan->jml_pemberian;
                            } else {

                                date_default_timezone_set('Asia/Jakarta');
                                $xDetailDataRequest = ["kategori" => "editMedicationRequest", "no_rm" => $dataDetailResep->no_rm, "message" => 'Tidak Ada data jumlah pemberian di sm resep r', "jenis_data" => 'error', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama'), "param" => $dataDetailResep->id_resep . ' Medication ' . $result->id, "function" => 'perbaharuiIntegrasiResep'];
                                $this->db->insert('sm_satu_sehat_log', $xDetailDataRequest);

                                return;
                            }
                        } else {

                            date_default_timezone_set('Asia/Jakarta');
                            $xDetailDataRequest = ["kategori" => "editMedicationRequest", "no_rm" => $dataDetailResep->no_rm, "message" => 'Tidak Ada Aturan Pakai', "jenis_data" => 'error', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama'), "param" => $dataDetailResep->id_resep . ' Medication ' . $result->id, "function" => 'perbaharuiIntegrasiResep'];
                            $this->db->insert('sm_satu_sehat_log', $xDetailDataRequest);

                            return;
                        }

                        $paramRequest =  array(
                            "resourceType" => "MedicationRequest",
                            "id" => $idMedicationRequest,
                            "identifier" => [
                                array(
                                    "system" => "http://sys-ids.kemkes.go.id/prescription/" . $xKonfigurasiRequest->organization,
                                    "use" => "official",
                                    "value" => $dataDetailResep->id_resep
                                ),
                                array(
                                    "system" => "http://sys-ids.kemkes.go.id/prescription-item/" . $xKonfigurasiRequest->organization,
                                    "use" => "official",
                                    "value" => $dataDetailResep->id_resep_item
                                )
                            ],
                            "status" => $tipeMedication,
                            "intent" => $intent,
                            "category" => [
                                array(
                                    "coding" => [
                                        array(
                                            "system" => "http://terminology.hl7.org/CodeSystem/medicationrequest-category",
                                            "code" => "outpatient",
                                            "display" => "Outpatient"
                                        )
                                    ]
                                )
                            ],
                            "medicationReference" => array(
                                "reference" => "Medication/" . $result->id,
                                "display" => $dataDetailResep->nama_obat
                            ),
                            "subject" => array(
                                "reference" => "Patient/" . $dataDetailResep->ihsn,
                                "display" => $dataDetailResep->nama_pasien
                            ),
                            "encounter" => array(
                                "reference" => "Encounter/" . $dataDetailResep->id_encounter
                            ),
                            "authoredOn" => $authoredOn,
                            "requester" => array(
                                "reference" => "Practitioner/" . $dataDetailResep->ihs_dokter,
                                "display" => $dataDetailResep->nama_pegawai
                            ),
                            "dosageInstruction" => [
                                array(
                                    "sequence" => (int)$sequence,
                                    "timing" => array(
                                        "repeat" => array(
                                            "frequency" => (int)$frequencyPeriod,
                                            "period" => (int)$frequencyPeriod,
                                            "periodUnit" => "d"
                                        )
                                    ),
                                    "route" => array(
                                        "coding" => [
                                            array(
                                                "system" => "http://www.whocc.no/atc",
                                                "code" => $dataDetailResep->roa_code,
                                                "display" => $dataDetailResep->roa_display
                                            )
                                        ]
                                    ),
                                    "doseAndRate" => [
                                        array(
                                            "doseQuantity" => array(
                                                "value" => (int)$dataDetailResep->dosis_racik,
                                                "unit" => $dataDetailResep->code_ucum,
                                                "system" => "http://unitsofmeasure.org",
                                                "code" => $dataDetailResep->code_ucum
                                            )
                                        )
                                    ]
                                )
                            ],
                            "dispenseRequest" => array(
                                "quantity" => array(
                                    "value" => (int)$dataDetailResep->jumlah_pakai,
                                    "unit" => $dataDetailResep->code_ucum,
                                    "system" => "http://unitsofmeasure.org",
                                    "code" => $dataDetailResep->code_ucum
                                ),
                                "performer" => array(
                                    "reference" => "Organization/" . $xKonfigurasiRequest->organization
                                )
                            )
                        );

                        $dataApiRequest = json_encode($paramRequest);

                        $outputRequest = $this->sehat->putEncounter($urlRequest, $dataApiRequest, $headerRequest);

                        if($outputRequest['result'] !== false){

                            if ($outputRequest['respon'] === 201) {

                                $resultRequest = json_decode($outputRequest['result']);

                                date_default_timezone_set('Asia/Jakarta');

                                $xDetailDataRequest = ["kategori" => "editMedicationRequest", "no_rm" => $dataDetailResep->no_rm, "message" => json_encode($paramRequest), "jenis_data" => 'ok', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama'), "respon" => $outputRequest['respon'], "function" => 'perbaharuiIntegrasiResep '.$idResep];

                                $this->db->insert('sm_satu_sehat_log', $xDetailDataRequest);
                            } else {

                                $resultRequest = json_decode($outputRequest['result']);

                                date_default_timezone_set('Asia/Jakarta');
                                $xDetailDataRequest = ["kategori" => "editMedicationRequest", "no_rm" => $dataDetailResep->no_rm, "message" => $outputRequest['result'], "jenis_data" => 'error', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama'), "param" => json_encode($paramRequest), "respon" => $outputRequest['respon'], "function" => 'perbaharuiIntegrasiResep '.$idResep];
                                $this->db->insert('sm_satu_sehat_log', $xDetailDataRequest);
                            }

                        }
                    }
                } else {

                    $result = json_decode($output['result']);

                    if (isset($result->issue)) {

                        $issued = $result->issue;
                        $details = $issued[0]->details;
                        date_default_timezone_set('Asia/Jakarta');
                        $xDetailData = ["kategori" => "Update Medication", "no_rm" => $dataDetailResep->no_rm, "message" => json_encode($details), "jenis_data" => 'error', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama'), "param" => json_encode($params), "respon" => $output['respon'], "function" => 'perbaharuiIntegrasiResep'];
                        $this->db->insert('sm_satu_sehat_log', $xDetailData);
                    } else {

                        date_default_timezone_set('Asia/Jakarta');
                        $xDetailData = ["kategori" => "Update Medication", "no_rm" => $dataDetailResep->no_rm, "message" => $output['result'], "jenis_data" => 'error', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama'), "param" => json_encode($params), "respon" => $output['respon'], "function" => 'perbaharuiIntegrasiResep'];
                        $this->db->insert('sm_satu_sehat_log', $xDetailData);
                    }
                }

            }
        }
    }

    function updateIntegrasiResep($idResep, $x = null)
    {

        $dataResep = $this->db->select('r.*')
            ->from('sm_resep as r')
            ->where('r.id', $idResep, true)
            ->get()
            ->row();

        date_default_timezone_set('Asia/Jakarta');

        $dataResepArr = array(
            "id_resep"   => $dataResep->id,
            "tanggal_resep"             => $dataResep->tanggal_resep,
            "waktu"   => $dataResep->waktu,
            "id_dokter"   => $dataResep->id_dokter,
            "id_pasien"       => $dataResep->id_pasien,
            "id_layanan_pendaftaran"     => $dataResep->id_layanan_pendaftaran,
            "keterangan" => $dataResep->keterangan,
            "id_users"           => $dataResep->id_users,
            "status"   => $dataResep->status,
            "is_prioritas"       => $dataResep->is_prioritas,
            "is_terapi_pulang" => $dataResep->is_terapi_pulang,
            "nama" => $this->session->userdata('nama'),
            "waktu_buat" => date('Y-m-d H:i:s')
        );

        if (isset($dataResep->id_unit_farmasi)) {

            $dataResepArr["id_unit_farmasi"] = $dataResep->id_unit_farmasi;
        }

        $this->db->insert('sm_reseplog', $dataResepArr);

        $dataResepR = $this->db->select('r.*')
            ->from('sm_resep_r as r')
            ->where('r.id_resep', $idResep, true)
            ->get()
            ->result();

        foreach ($dataResepR as $a => $b) {

            $dataResepRArr = array(
                "id_resepr"        => $b->id,
                "id_resep"         => $b->id_resep,
                "r_no"             => (int)$b->r_no,
                "resep_r_jumlah"   => $b->resep_r_jumlah,
                "tebus_r_jumlah"   => $b->tebus_r_jumlah,
                "aturan_pakai"     => $b->aturan_pakai,
                "ket_aturan_pakai" => $b->ket_aturan_pakai,
                "timing"           => $b->timing,
                "iter"             => $b->iter,
                "cara_pembuatan"   => $b->cara_pembuatan,
                "nominal"          => isset($b->nominal) ? $b->nominal : "0",
                "admin_time"       => $b->admin_time,
                "keterangan_resep" => $b->keterangan_resep,
                "racik"            => $b->racik,
                "aturan_pakai_manual"     => $b->aturan_pakai_manual,
                "ket_aturan_pakai_manual" => $b->ket_aturan_pakai_manual,
                "id_sediaan" => $b->id_sediaan,
                'jam_pemberian_1' => $b->jam_pemberian_1,
                'jam_pemberian_2' => $b->jam_pemberian_2,
                'jam_pemberian_3' => $b->jam_pemberian_3,
                'jam_pemberian_4' => $b->jam_pemberian_4,
                'jam_pemberian_5' => $b->jam_pemberian_5,
                'jam_pemberian_6' => $b->jam_pemberian_6,
                "nama" => $this->session->userdata('nama'),
                "waktu_buat" => date('Y-m-d H:i:s')
            );

            $this->db->insert('sm_reseprlog', $dataResepRArr);

            $dataResepRDetail = $this->db->select('r.*')
                ->from('sm_resep_r_detail as r')
                ->where('r.id_resep_r', $b->id, true)
                ->get()
                ->row();


            if (isset($x)) {

                $tipeEdit = $x;
            }


            $dataResepRDetailArr = array(
                "id_reseprdetaillog"     => $dataResepRDetail->id,
                "id_resep_r"   => $dataResepRDetail->id_resep_r,
                "id_barang"    => $dataResepRDetail->id_barang,
                "jual_harga"   => $dataResepRDetail->jual_harga,
                "dosis_racik"  => $dataResepRDetail->dosis_racik,
                "jumlah_pakai" => $dataResepRDetail->jumlah_pakai,
                "formularium"  => $dataResepRDetail->formularium,
                "kronis"       => $dataResepRDetail->kronis,
                "id_integrasi_resep"       => $dataResepRDetail->id_integrasi_resep,
                "nama" => $this->session->userdata('nama'),
                "waktu_buat" => date('Y-m-d H:i:s'),
                "tipe_edit" => $tipeEdit,
                "id_resep"  => $b->id_resep,
                "id_medication_request" => $dataResepRDetail->id_medication_request
            );

            $this->db->insert('sm_reseprdetaillog', $dataResepRDetailArr);

            if ($tipeEdit === 'Delete') {

                $this->perbaharuiIntegrasiResep($dataResepRDetail->id, $tipeEdit);
            }
        }
    }

    function cekSemuaDataResep($idResep)
    {

        $dataResepRDetail = $this->db->select('r.id_barang')
            ->from('sm_resep_r_detail as r')
            ->join('sm_resep_r as rr', 'rr.id = r.id_resep_r', 'left')
            ->where('rr.id_resep', $idResep, true)
            ->get()
            ->result_array();


        $dataResepRDetailLog = $this->db->select('r.id_barang')
            ->from('sm_reseprdetaillog as r')
            ->where('r.id_resep', $idResep, true)
            ->get()
            ->result_array();


        $dataBarangA = array_column($dataResepRDetail, 'id_barang');
        $dataBarangB = array_column($dataResepRDetailLog, 'id_barang');

        $cekDataBanding = array_diff($dataBarangB, $dataBarangA);

        foreach ($cekDataBanding as $a => $b) {

            $cekDataLog = $this->db->select('r.*, b.nama_lengkap as nama_obat, rr.aturan_pakai, rr.racik, rr.keterangan_resep, rs.id_pasien as no_rm, s.code as code_sediaan, s.display as nama_sediaan, rr.id_resepr as id_resep_r_log, p.nama as nama_pasien, p.ihsn, l.id_encounter, tm.ihs_number as ihs_dokter, pg.nama as nama_pegawai, ro.code as roa_code, ro.display as roa_display, r.dosis_racik, r.jumlah_pakai, uom.code as code_ucum')
                ->from('sm_reseprdetaillog as r')
                ->join('sm_barang as b', 'b.id = r.id_barang', 'left')
                ->join('sm_reseprlog as rr', 'rr.id_resepr = r.id_resep_r', 'left')
                ->join('sm_reseplog as rs', 'rs.id_resep = rr.id_resep', 'left')
                ->join('sm_layanan_pendaftaran as l', 'l.id = rs.id_layanan_pendaftaran', 'left')
                ->join('sm_tenaga_medis as tm', 'tm.id = rs.id_dokter', 'left')
                ->join('sm_pegawai as pg', 'pg.id = tm.id_pegawai', 'left')
                ->join('sm_pasien as p', 'p.id = rs.id_pasien', 'left')
                ->join('sm_satuan as sat', 'sat.id = b.satuan_kekuatan', 'left')
                ->join('sm_unit_of_measure as uom', 'uom.code = sat.code_ucum', 'left')
                ->join('sm_roa as ro', 'ro.roa = b.roa', 'left')
                ->join('sm_sediaan as s', 's.id = b.id_sediaan', 'left')
                ->where('r.id_resep', $idResep, true)
                ->where('r.id_barang', $cekDataBanding[$a], true)
                ->order_by('r.id', 'desc')
                ->get()
                ->row();

            if (isset($cekDataLog->id_integrasi_resep)) {

                $idIntegrasiResep = $cekDataLog->id_integrasi_resep;

                $this->autentikasi_user_post();

                $this->load->model('satu_sehat/Satu_sehat_model', 'sehat');

                $xKonfigurasi = $this->sehat->getConfigSatuSehat();

                $idUser = $this->session->userdata('id_translucent');

                $getID = $this->sehat->aksesSatuSehat($idUser);

                $tokenBearer = $getID->token;

                $xKonfigurasi = $this->sehat->getConfigSatuSehat();

                $header = $this->sehat->authBearer($tokenBearer);

                $url = $xKonfigurasi->apiurl . "Medication/" . $cekDataLog->id_integrasi_resep;

                if ($cekDataLog->racik === '0') {

                    $codeExtension = 'NC';
                    $displayExtension = 'Non-compound';
                } else {

                    if ($cekDataLog->keterangan_resep !== '' && $cekDataLog->keterangan_resep !== null) {

                        $codeExtension = 'SD';
                        $displayExtension = 'Gives of such doses';
                    } else {

                        $codeExtension = 'EP';
                        $displayExtension = 'Divide into equal parts';
                    }
                }

                $tipeEdit = 'entered-in-error';

                $params = array(
                    "resourceType" => "Medication",
                    "id" => $idIntegrasiResep,
                    "meta" => array(
                        "profile" => [
                            "https://fhir.kemkes.go.id/r4/StructureDefinition/Medication"
                        ]
                    ),
                    "identifier" => [
                        array(
                            "system" => "http://sys-ids.kemkes.go.id/medication/" . $xKonfigurasi->organization,
                            "use" => "official",
                            "value" => $cekDataLog->id_reseprdetaillog
                        )
                    ],
                    "status" => $tipeEdit,
                    "form" => array(
                        "coding" => [
                            array(
                                "system" => "http://terminology.kemkes.go.id/CodeSystem/medication-form",
                                "code" => $cekDataLog->code_sediaan,
                                "display" => $cekDataLog->nama_sediaan
                            )
                        ]
                    ),
                    "extension" => [
                        array(
                            "url" => "https://fhir.kemkes.go.id/r4/StructureDefinition/MedicationType",
                            "valueCodeableConcept" => array(
                                "coding" => [
                                    array(
                                        "system" => "http://terminology.kemkes.go.id/CodeSystem/medication-type",
                                        "code" => $codeExtension,
                                        "display" => $displayExtension
                                    )
                                ]
                            )
                        )
                    ]
                );

                $dataApi = json_encode($params);

                $output = $this->sehat->putEncounter($url, $dataApi, $header);

                if($output['result'] !== false){

                    if ($output['respon'] === 200) {

                        $result = json_decode($output['result']);

                        date_default_timezone_set('Asia/Jakarta');

                        $update = ["respon_edit" => 'OK'];

                        $this->db->where('id_reseprdetaillog', $cekDataLog->id_reseprdetaillog)->update('sm_reseprdetaillog', $update);

                        $xDetailData = ["kategori" => "Update Medication", "no_rm" => $cekDataLog->no_rm, "message" => json_encode($params), "jenis_data" => 'ok', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama'), "respon" => $output['respon'], "function" => 'cekSemuaDataResep'];

                        $this->db->insert('sm_satu_sehat_log', $xDetailData);

                        if (isset($result->id)) {

                            $this->autentikasi_user_post();

                            $this->load->model('satu_sehat/Satu_sehat_model', 'sehat');

                            $xKonfigurasiRequest = $this->sehat->getConfigSatuSehat();

                            $idUserRequest = $this->session->userdata('id_translucent');

                            $getIDRequest = $this->sehat->aksesSatuSehat($idUser);

                            $tokenBearerRequest = $getIDRequest->token;

                            $headerRequest = $this->sehat->authBearer($tokenBearer);

                            $urlRequest = $xKonfigurasi->apiurl . "MedicationRequest";

                            if ($cekDataLog->keterangan_resep !== '' && $cekDataLog->keterangan_resep !== null) {

                                $intent = 'instance-order';
                            } else {

                                $intent = 'original-order';
                            }

                            $authoredOn = $this->konversiTanggal();

                            $dataAturanPakai = $this->db->select('rr.id_resepr, rr.aturan_pakai, rr.sequence')
                                ->from('sm_reseprlog as rr')
                                ->join('sm_reseplog as rs', 'rs.id_resep = rr.id_resep', 'left')
                                ->where('rs.id_resep', $cekDataLog->id_resep, true)
                                ->get()
                                ->result();

                            if (!empty($dataAturanPakai)) {

                                foreach ($dataAturanPakai as $key => $racik) {
                                    $dataRacik[] = $racik->aturan_pakai;
                                    // $dataSequence['sequence'] = $racik->sequence;
                                    // $dataSequence['id'] = $racik->id;
                                }


                                $firstValue = reset($dataRacik); // Fungsi reset mengambil elemen pertama dari array
                                $allSame = true; // Flag untuk menandai apakah semua nilai sama

                                foreach ($dataRacik as $value) {
                                    if ($value !== $firstValue) {
                                        $allSame = false;
                                        break; // Keluar dari loop karena sudah ada nilai yang berbeda
                                    }
                                }

                                if ($allSame) {

                                    $sequence = 1;
                                } else {

                                    $dataDetailResepR = $this->db->select('rr.id_resepr, rr.aturan_pakai, rr.sequence')
                                        ->from('sm_reseprlog as rr')
                                        ->where('rr.id_resepr', $cekDataLog->id_resep_r_log, true)
                                        ->get()
                                        ->row();

                                    if ($dataDetailResepR->sequence !== null && $dataDetailResepR->sequence !== '') {

                                        $sequence = (int)$dataDetailResepR->sequence;
                                    } else {

                                        $x = 1;
                                        $currentAturanPakai = null;

                                        foreach ($dataAturanPakai as $index => $item) {

                                            if ($item->aturan_pakai !== $currentAturanPakai) {
                                                // Jika 'aturan_pakai' berbeda dari yang sebelumnya, increment sequence
                                                $currentAturanPakai = $item->aturan_pakai;
                                                $dataAturanPakai[$index]->sequence = $x++;
                                            } else {
                                                // Jika sama, gunakan sequence yang sama
                                                $dataAturanPakai[$index]->sequence = $x - 1;
                                            }
                                        }

                                        foreach ($dataAturanPakai as $x => $y) {

                                            $updateRequest = ["sequence" => $y->sequence];

                                            $this->db->where('id_resepr', (int)$y->id_resepr)->update('sm_reseprlog', $updateRequest);
                                        }

                                        $cekUlangResepR = $this->db->select('rr.id_resepr, rr.aturan_pakai, rr.sequence')
                                            ->from('sm_reseprlog as rr')
                                            ->where('rr.id_resepr', $cekDataLog->id_resep_r_log, true)
                                            ->get()
                                            ->row();

                                        if (isset($cekUlangResepR->sequence)) {

                                            $sequence = $cekUlangResepR->sequence;
                                        }
                                    }
                                }

                                $cekRelasiAturan = $this->db->select('apo.jml_pemberian')
                                    ->from('sm_aturan_pakai_obat as apo')
                                    ->where('apo.signa', $cekDataLog->aturan_pakai, true)
                                    ->where('apo.is_active', 1, true)
                                    ->get()
                                    ->row();

                                if (isset($cekRelasiAturan->jml_pemberian)) {

                                    $frequencyPeriod = $cekRelasiAturan->jml_pemberian;
                                } else {

                                    date_default_timezone_set('Asia/Jakarta');
                                    $xDetailDataRequest = ["kategori" => "cancelMedicationRequest", "no_rm" => $cekDataLog->no_rm, "message" => 'Tidak Ada data jumlah pemberian di sm resep r', "jenis_data" => 'error', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama'), "param" => $cekDataLog->id_resep . ' Medication ' . $result->id, "respon" => $output['respon'], "function" => 'cekSemuaDataResep'];
                                    $this->db->insert('sm_satu_sehat_log', $xDetailDataRequest);

                                    return;
                                }
                            } else {

                                date_default_timezone_set('Asia/Jakarta');
                                $xDetailDataRequest = ["kategori" => "cancelMedicationRequest", "no_rm" => $cekDataLog->no_rm, "message" => 'Tidak Ada Aturan Pakai', "jenis_data" => 'error', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama'), "param" => $cekDataLog->id_resep . ' Medication ' . $result->id, "respon" => $output['respon'], "function" => 'cekSemuaDataResep'];
                                $this->db->insert('sm_satu_sehat_log', $xDetailDataRequest);

                                return;
                            }

                            $idMedicationRequest = $cekDataLog->id_medication_request;

                            $paramRequest =  array(
                                "resourceType" => "MedicationRequest",
                                "id" => $idMedicationRequest,
                                "identifier" => [
                                    array(
                                        "system" => "http://sys-ids.kemkes.go.id/prescription/" . $xKonfigurasi->organization,
                                        "use" => "official",
                                        "value" => $cekDataLog->id_resep
                                    ),
                                    array(
                                        "system" => "http://sys-ids.kemkes.go.id/prescription-item/" . $xKonfigurasi->organization,
                                        "use" => "official",
                                        "value" => $cekDataLog->id_reseprdetaillog
                                    )
                                ],
                                "status" => "cancelled",
                                "intent" => $intent,
                                "category" => [
                                    array(
                                        "coding" => [
                                            array(
                                                "system" => "http://terminology.hl7.org/CodeSystem/medicationrequest-category",
                                                "code" => "outpatient",
                                                "display" => "Outpatient"
                                            )
                                        ]
                                    )
                                ],
                                "medicationReference" => array(
                                    "reference" => "Medication/" . $result->id,
                                    "display" => $cekDataLog->nama_obat
                                ),
                                "subject" => array(
                                    "reference" => "Patient/" . $cekDataLog->ihsn,
                                    "display" => $cekDataLog->nama_pasien
                                ),
                                "encounter" => array(
                                    "reference" => "Encounter/" . $cekDataLog->id_encounter
                                ),
                                "authoredOn" => $authoredOn,
                                "requester" => array(
                                    "reference" => "Practitioner/" . $cekDataLog->ihs_dokter,
                                    "display" => $cekDataLog->nama_pegawai
                                ),
                                "dosageInstruction" => [
                                    array(
                                        "sequence" => (int)$sequence,
                                        "timing" => array(
                                            "repeat" => array(
                                                "frequency" => (int)$frequencyPeriod,
                                                "period" => (int)$frequencyPeriod,
                                                "periodUnit" => "d"
                                            )
                                        ),
                                        "route" => array(
                                            "coding" => [
                                                array(
                                                    "system" => "http://www.whocc.no/atc",
                                                    "code" => $cekDataLog->roa_code,
                                                    "display" => $cekDataLog->roa_display
                                                )
                                            ]
                                        ),
                                        "doseAndRate" => [
                                            array(
                                                "doseQuantity" => array(
                                                    "value" => (int)$cekDataLog->dosis_racik,
                                                    "unit" => $cekDataLog->code_ucum,
                                                    "system" => "http://unitsofmeasure.org",
                                                    "code" => $cekDataLog->code_ucum
                                                )
                                            )
                                        ]
                                    )
                                ],
                                "dispenseRequest" => array(
                                    "quantity" => array(
                                        "value" => (int)$cekDataLog->jumlah_pakai,
                                        "unit" => $cekDataLog->code_ucum,
                                        "system" => "http://unitsofmeasure.org",
                                        "code" => $cekDataLog->code_ucum
                                    ),
                                    "performer" => array(
                                        "reference" => "Organization/" . $xKonfigurasi->organization
                                    )
                                )
                            );

                            $dataApiRequest = json_encode($paramRequest);

                            $outputRequest = $this->sehat->putEncounter($urlRequest, $dataApiRequest, $headerRequest);

                            if($output['result'] !== false){

                                if ($output['respon'] === 201 | $output['respon'] === 200) {

                                    $resultRequest = json_decode($outputRequest['result']);

                                    date_default_timezone_set('Asia/Jakarta');

                                    $xDetailDataRequest = ["kategori" => "cancelMedicationRequest", "no_rm" => $cekDataLog->no_rm, "message" => json_encode($paramRequest), "jenis_data" => 'ok', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama'), "respon" => $output['respon'], "function" => 'cekSemuaDataResep'];

                                    $this->db->insert('sm_satu_sehat_log', $xDetailDataRequest);
                                } else {

                                    $resultRequest = json_decode($outputRequest['result']);

                                    date_default_timezone_set('Asia/Jakarta');
                                    $xDetailDataRequest = ["kategori" => "cancelMedicationRequest", "no_rm" => $cekDataLog->no_rm, "message" => $outputRequest['result'], "jenis_data" => 'error', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama'), "param" => json_encode($paramRequest), "respon" => $output['respon'], "function" => 'cekSemuaDataResep'];
                                    $this->db->insert('sm_satu_sehat_log', $xDetailDataRequest);
                                }

                            }
                        }
                    } else {

                        $result = json_decode($output['result']);

                        if (isset($result->issue)) {

                            $issued = $result->issue;
                            $details = $issued[0]->details;
                            date_default_timezone_set('Asia/Jakarta');
                            $xDetailData = ["kategori" => "Update Medication", "no_rm" => $cekDataLog->no_rm, "message" => json_encode($details), "jenis_data" => 'error', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama'), "function" => 'cekSemuaDataResep'];
                            $this->db->insert('sm_satu_sehat_log', $xDetailData);
                        
                        } else {

                            date_default_timezone_set('Asia/Jakarta');
                            $xDetailData = ["kategori" => "Update Medication", "no_rm" => $cekDataLog->no_rm, "message" => $output['result'], "jenis_data" => 'error', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama'), "respon" => $output['respon'], "function" => 'cekSemuaDataResep'];
                            $this->db->insert('sm_satu_sehat_log', $xDetailData);
                        
                        }
                    }
                }
            }
        }
    }

    function simpanDataResep()
    {
        $this->db->trans_begin();

        $id              = safe_post('id');
        $asal_input_resep = safe_post('asal_input_resep');
        $no_resep        = $id;
        $dokter          = safe_post('dokter');
        $pasien          = safe_post('pasien');
        $id_pk           = safe_post('id_pk');
        $tgl_resep       = datetime2mysql(safe_post("tanggal_resep"));
        $id_user         = $this->user();
        $id_unit         = safe_post("unit") !== "" ? safe_post("unit") : NULL;
        $id_penunjang    = safe_post("id_penunjang");
        $jenis_penunjang = safe_post("jenis_penunjang");
        $resepPrioritas  = safe_post("is_resep_prioritas") === '' ? 0 : safe_post("is_resep_prioritas");
        $isTerapiPulang  = safe_post("is_terapi_pulang") === '' ? 0 : safe_post("is_terapi_pulang");

        $pendaftaran     = $this->db->where("id", $id_pk)->select("id_pendaftaran")->get("sm_layanan_pendaftaran")->row();
        if ($pendaftaran) :
            $this->setBelumLunas((int)$pendaftaran->id_pendaftaran);
        endif;
        if ($id === '') :
            $parse_resep = array(
                'waktu'                  => $this->datetime,
                'tanggal_resep'          => $tgl_resep,
                'id_dokter'              => $dokter,
                'id_pasien'              => $pasien,
                'id_layanan_pendaftaran' => $id_pk,
                'id_users'               => $id_user,
                'id_unit_farmasi'        => $id_unit,
                'is_prioritas'           => $resepPrioritas,
                'is_terapi_pulang'       => $isTerapiPulang,
            );
            // insert to table sm_resep
            $this->db->insert('sm_resep', $parse_resep);
            $no_resep = $this->db->insert_id();
            if ($this->db->trans_status() === false) :
                $this->db->trans_rollback();
                $result['status'] = false;
                $result['token']  = $this->security->get_csrf_hash();
            endif;
            // update dokter to table sm_layanan_pendaftaran
            // $this->db->where('id', $id_pk, true)->update('sm_layanan_pendaftaran', array('id_dokter' => $dokter));
            if ($this->db->trans_status() === false) :
                $this->db->trans_rollback();
                $result['status'] = false;
                $result['token']  = $this->security->get_csrf_hash();
            endif;
            $get = $this->db->select('r.id_layanan_pendaftaran as id_pk, l.id_pendaftaran, l.jenis_layanan')
                ->from('sm_resep as r')
                ->join('sm_layanan_pendaftaran as l', 'l.id = r.id_layanan_pendaftaran')
                ->where('r.id', $no_resep, true)
                ->get()
                ->row();
            $layanan_pendaftaran = $this->db->select('lp.*, pj.diskon')
                ->from('sm_layanan_pendaftaran as lp')
                ->join('sm_penjamin as pj', 'pj.id = lp.id_penjamin', 'left')
                ->where('lp.id', $get->id_pk, true)
                ->get()
                ->row();
            $keterangan_stok = $this->pasienName($get->id_pk);
            $ambil = $this->db->select('count(*) as ke')->from('sm_resep_tebus')->where('id_resep', $no_resep)->get()->row();
            $data_tebus = array("id_resep_asal" => $no_resep, "waktu" => $this->datetime, "id_resep" => $no_resep, "id_unit" => $this->unit(), "id_users" => $this->user(), "pengambilan_ke" => $ambil->ke + 1);
            // insert to data tebus resep to table sm_resep_tebus
            $this->db->insert("sm_resep_tebus", $data_tebus);
            $id_resep_tebus = $this->db->insert_id();
            if ($this->db->trans_status() === false) :
                $this->db->trans_rollback();
                $result['status'] = false;
                $result['token']  = $this->security->get_csrf_hash();
            endif;
            $this->addToResepLogs(['resep' => $parse_resep, 'resep_tebus' => $data_tebus], 'Tambah');
            $data = array(
                "tanggal_penjualan"      => substr($tgl_resep, 0, 10),
                "waktu"                  => $this->datetime,
                "id_resep"               => $no_resep,
                "id_layanan_pendaftaran" => $get->id_pk,
                "id_resep_tebus"         => $id_resep_tebus,
                "total"                  => 0,
                "jenis"                  => "Resep",
                "toeslag"                => 0,
                "id_unit"                => $this->unit(),
                "id_users"               => $this->user()
            );
            // insert to data penjualan to table sm_penjualan
            $this->db->insert("sm_penjualan", $data);
            $id_penjualan = $this->db->insert_id();
            if ($this->db->trans_status() === false) :
                $this->db->trans_rollback();
                $result['status'] = false;
                $result['token']  = $this->security->get_csrf_hash();
            endif;
            $jml_no_r = safe_post("jmlnor");
            for ($i = 1; $i <= $jml_no_r; $i++) :
                $nor              = safe_post("no_r" . $i);
                $jp               = safe_post("jp" . $i);
                $jt               = safe_post("jt" . $i);
                $ap               = safe_post("ap" . $i);
                $apm              = safe_post("apm" . $i);
                $isapm            = safe_post("isapm" . $i) === 'true' ? 1 : 0;
                $ap2              = safe_post("ap2" . $i);
                $it               = safe_post("it" . $i);
                $ja               = safe_post("ja" . $i) ? safe_post("ja" . $i) : NULL;
                $cb               = safe_post("cara_buat" . $i);
                $keterangan_resep = safe_post("keterangan_resep" . $i) ? safe_post("keterangan_resep" . $i) : NULL;
                $timing           = safe_post("timing" . $i);
                $id_barang        = safe_post("id_barang" . $i);
                $dosisracik       = safe_post("dosisracik" . $i);
                $jmlpakai         = safe_post("jmlpakai" . $i);
                $obatkronis       = safe_post("obatkronis" . $i);
                $waktu_pemberian  = safe_post("waktu_pemberian" . $i);
                $racik            = safe_post("is_racik" . $i) === 'null' ? 0 : safe_post("is_racik" . $i);
                $sediaan          = safe_post("sediaan" . $i) !== '' ? safe_post("sediaan" . $i) : null;
                $jam_pemberian_1  = safe_post('jam_pemberian_1' . $i) !== '' ? safe_post("jam_pemberian_1" . $i) : null;
                $jam_pemberian_2  = safe_post('jam_pemberian_2' . $i) !== '' ? safe_post("jam_pemberian_2" . $i) : null;
                $jam_pemberian_3  = safe_post('jam_pemberian_3' . $i) !== '' ? safe_post("jam_pemberian_3" . $i) : null;
                $jam_pemberian_4  = safe_post('jam_pemberian_4' . $i) !== '' ? safe_post("jam_pemberian_4" . $i) : null;
                $jam_pemberian_5  = safe_post('jam_pemberian_5' . $i) !== '' ? safe_post("jam_pemberian_5" . $i) : null;
                $jam_pemberian_6  = safe_post('jam_pemberian_6' . $i) !== '' ? safe_post("jam_pemberian_6" . $i) : null;

                // $tuslah_nominal = $this->db->select('nominal')->from('sm_tarif_tuslah')->where('id', $ja)->get()->row();
                $parse_resep_r = array(
                    "id_resep"         => $no_resep,
                    "r_no"             => $nor,
                    "resep_r_jumlah"   => $jp,
                    "tebus_r_jumlah"   => $jt,
                    "aturan_pakai"     => $ap,
                    "ket_aturan_pakai" => $ap2,
                    "timing"           => $timing,
                    "iter"             => $it,
                    "cara_pembuatan"   => $cb,
                    "nominal"          => "0",
                    // "nominal"          => isset($tuslah_nominal->nominal) ? $tuslah_nominal->nominal : "0",
                    "admin_time"       => $waktu_pemberian,
                    "keterangan_resep" => $keterangan_resep,
                    "racik"            => $racik,
                    "aturan_pakai_manual"     => $isapm,
                    "ket_aturan_pakai_manual" => $apm,
                    "id_sediaan" => $sediaan,
                    'jam_pemberian_1' => $jam_pemberian_1,
                    'jam_pemberian_2' => $jam_pemberian_2,
                    'jam_pemberian_3' => $jam_pemberian_3,
                    'jam_pemberian_4' => $jam_pemberian_4,
                    'jam_pemberian_5' => $jam_pemberian_5,
                    'jam_pemberian_6' => $jam_pemberian_6
                );
                // looping insert data resep_r to table sm_resep_r
                $this->db->insert("sm_resep_r", $parse_resep_r);
                $id_resep_r = $this->db->insert_id();
                if ($this->db->trans_status() === false) :
                    $this->db->trans_rollback();
                    $result['status'] = false;
                    $result['token']  = $this->security->get_csrf_hash();
                endif;
                $data_r_tebus = array(
                    "id_resep_tebus"   => $id_resep_tebus,
                    "r_no"             => $nor,
                    "resep_r_jumlah"   => $jp,
                    "tebus_r_jumlah"   => $jt,
                    "sisa_tebus"       => 0,
                    "aturan_pakai"     => $ap,
                    "ket_aturan_pakai" => $ap2,
                    "timing"           => $timing,
                    "iter"             => $it,
                    "cara_pembuatan"   => $cb,
                    "admin_time"       => $waktu_pemberian,
                    "keterangan_resep" => $keterangan_resep,
                    "aturan_pakai_manual"     => $isapm,
                    "ket_aturan_pakai_manual" => $apm,
                    "racik"            => $racik,
                    "id_sediaan" => $sediaan,
                    'jam_pemberian_1' => $jam_pemberian_1,
                    'jam_pemberian_2' => $jam_pemberian_2,
                    'jam_pemberian_3' => $jam_pemberian_3,
                    'jam_pemberian_4' => $jam_pemberian_4,
                    'jam_pemberian_5' => $jam_pemberian_5,
                    'jam_pemberian_6' => $jam_pemberian_6
                );
                // looping insert data resep_tebus_r to table sm_resep_tebus_r
                $this->db->insert("sm_resep_tebus_r", $data_r_tebus);
                $id_detail_tebus_r = $this->db->insert_id();
                if ($this->db->trans_status() === false) :
                    $this->db->trans_rollback();
                    $result['status'] = false;
                    $result['token']  = $this->security->get_csrf_hash();
                endif;
                if (is_array($id_barang)) :
                    $hna_barang = 0;
                    foreach ($id_barang as $key => $data) :
                        $get_brg = $this->db->get_where('sm_barang', ['id' => $data])->row();
                        $harga_jual = $get_brg->hpp + $get_brg->hpp * $get_brg->margin_resep / 100;
                        $margin = $get_brg->margin_resep;
                        $parse_resep_r_detail = array(
                            "id_resep_r"   => $id_resep_r,
                            "id_barang"    => $id_barang[$key],
                            "jual_harga"   => $harga_jual,
                            "dosis_racik"  => $dosisracik[$key],
                            "jumlah_pakai" => $jmlpakai[$key],
                            "formularium"  => $get_brg->formularium,
                            "kronis"       => $obatkronis[$key]
                        );
                        // looping insert data resep detail to table sm_resep_r_detail
                        $this->db->insert("sm_resep_r_detail", $parse_resep_r_detail);
                        $idResepDetail = $this->db->insert_id();

                        if ($this->db->trans_status() === false) :
                            $this->db->trans_rollback();
                            $result['status'] = false;
                            $result['token']  = $this->security->get_csrf_hash();
                        endif;
                        $get_kemasan = $this->db->select('k.id, b.id as id_barang, b.hna, b.hpp, b.hpp+(b.hpp*(b.margin_resep/100)) as harga_jual, (k.isi*k.isi_satuan) as isis')
                            ->from('sm_kemasan_barang as k')
                            ->join('sm_barang as b', 'b.id = k.id_barang')
                            ->where('k.id_barang', $data)
                            ->where('k.default_kemasan', '1')
                            ->get()
                            ->row();
                        $reimburse = 0;
                        $penjamin = $this->db->get_where('sm_penjamin', ['id' => $layanan_pendaftaran->id_penjamin])->row();
                        $harga_jual_tanpa_diskon = $get_brg->hpp + $get_brg->hpp * $get_brg->margin_resep / 100;
                        if (isset($penjamin->id)) :
                            $reimburse = $harga_jual * $penjamin->diskon_barang / 100;
                        endif;
                        $data_detail_jual = array(
                            "waktu"        => $this->datetime,
                            "id_penjualan" => $id_penjualan,
                            "id_kemasan"   => $get_kemasan->id,
                            "qty"          => $jmlpakai[$key],
                            "hna"          => $get_kemasan->hna,
                            "hpp"          => $get_kemasan->hpp,
                            "id_asuransi"  => isset($penjamin->id) ? $penjamin->id : NULL,
                            "reimburse"    => $reimburse,
                            "harga_jual"   => $harga_jual_tanpa_diskon,
                            "kronis"       => $obatkronis[$key]
                        );
                        // looping insert data detail penjualan to table sm_detail_penjualan
                        $this->db->insert("sm_detail_penjualan", $data_detail_jual);
                        $hna_barang = $hna_barang + $get_kemasan->hna * $jmlpakai[$key];
                        if ($this->db->trans_status() === false) :
                            $this->db->trans_rollback();
                            $result['status'] = false;
                            $result['token']  = $this->security->get_csrf_hash();
                        endif;
                        $detail_tebus_r = array(
                            "id_resep_tebus_r" => $id_detail_tebus_r,
                            "id_barang"        => $data,
                            "jual_harga"       => $harga_jual,
                            "dosis_racik"      => $dosisracik[$key],
                            "jumlah_pakai"     => $jmlpakai[$key],
                            "kronis"           => $obatkronis[$key]
                        );
                        $this->db->insert("sm_resep_tebus_r_detail", $detail_tebus_r);

                        $this->load->model('satu_sehat/Satu_sehat_model', 'sehat');

                        $cekOnOff = $this->sehat->cekSatuSehatOnOff();

                        if($cekOnOff->onoff === '1'){
                            if (isset($get->jenis_layanan)) {
                                if ($get->jenis_layanan === 'Poliklinik') {
                                    $this->integrasiResep($idResepDetail);
                                }
                            }
                        }

                        if ($this->db->trans_status() === false) :
                            $this->db->trans_rollback();
                            $result['status'] = false;
                            $result['token']  = $this->security->get_csrf_hash();
                        endif;
                    endforeach;
                endif;
            endfor;

            $get_dp = $this->db->select('sum(harga_jual*qty)-sum(disc_rp*qty) as total')->from('sm_detail_penjualan')->where('id_penjualan', $id_penjualan)->get()->row();
            $this->db->where('id', $id_penjualan)->update('sm_penjualan', array("total" => $get_dp->total));
            $d_barang = $this->db->select('rtrd.id_barang, rtrd.jumlah_pakai')->from('sm_resep_tebus as rt')
                ->join('sm_resep_tebus_r as rtr', 'rtr.id_resep_tebus = rt.id')
                ->join('sm_resep_tebus_r_detail as rtrd', 'rtrd.id_resep_tebus_r = rtr.id')
                ->where('rt.id_resep', $no_resep, true)
                ->get()->result();
            if (is_array($d_barang)) :
                foreach ($d_barang as $i => $val) :
                    $last_barang = $this->db->select('sum(masuk)-sum(keluar) as sisa, ed')->from('sm_stok')->where('id_barang', $val->id_barang)->where('ed >', $this->date)
                        ->where('id_unit', $this->unit())->group_by('ed')->having('sum(masuk)-sum(keluar) >', 0)->order_by('ed', 'asc')->get()->result();
                    $use = $val->jumlah_pakai;
                    foreach ($last_barang as $j => $val2) :
                        $use = $val2->sisa - abs($use);
                        if ($use <= 0) :
                            $keluar = $val2->sisa;
                        else :
                            $keluar = abs($use - $val2->sisa);
                        endif;
                        $data_stok = array(
                            "waktu"        => $this->datetime,
                            "id_transaksi" => $id_penjualan,
                            "transaksi"    => "Penjualan",
                            "id_barang"    => $val->id_barang,
                            "ed"           => isset($val2->ed) ? $val2->ed :  NULL,
                            "keluar"       => $keluar,
                            "keterangan"   => $keterangan_stok,
                            "id_unit"      => $this->unit(),
                            "id_users"     => $this->user()
                        );
                        // insert data stok to table sm_stok
                        $this->db->insert("sm_stok", $data_stok);
                        if ($this->db->trans_status() === false) :
                            $this->db->trans_rollback();
                            $result['status'] = false;
                            $result['token']  = $this->security->get_csrf_hash();
                        endif;
                        if (0 <= $use) :
                            break;
                        endif;
                    endforeach;
                endforeach;
            endif;
            if ($this->db->trans_status() === false) :
                $this->db->trans_rollback();
                $result['status'] = false;
                $result['token']  = $this->security->get_csrf_hash();
            else :
                $this->db->trans_commit();
                $result['status']           = true;
                $result['act']              = 'add';
                $result['asal_input_resep'] = $asal_input_resep;
                $result['id_lp']            = $id_pk;
                $result['token']            = $this->security->get_csrf_hash();
            endif;
        else :
            $id = safe_post('id');
            $penjualan = $this->db->select('*')->from('sm_penjualan')->where('id_resep', $id)->get()->row();
            $getDataResep = $this->db->select('l.jenis_layanan')
                ->from('sm_resep as r')
                ->join('sm_layanan_pendaftaran as l', 'l.id = r.id_layanan_pendaftaran')
                ->where('r.id', $id, true)
                ->get()
                ->row();


            if (isset($getDataResep->jenis_layanan)) {
                if ($getDataResep->jenis_layanan === 'Poliklinik') {
                    $this->updateIntegrasiResep($id, 'Edit');
                }
            }

            $this->addToResepLogs($penjualan, 'Edit');
            $this->db->delete('sm_stok', array('id_transaksi' => $penjualan->id, 'transaksi' => 'Penjualan'));
            if ($this->db->trans_status() === false) :
                $this->db->trans_rollback();
                $result['status'] = false;
                $result['token']  = $this->security->get_csrf_hash();
            endif;
            $parse_resep = array(
                'tanggal_resep'          => $tgl_resep,
                'id_dokter'              => $dokter,
                'id_pasien'              => $pasien,
                'id_layanan_pendaftaran' => $id_pk,
                'id_users'               => $id_user,
                'id_unit_farmasi'        => $id_unit
            );
            // update to table sm_resep
            $this->db->where('id', $id);
            $this->db->update('sm_resep', $parse_resep);
            if ($this->db->trans_status() === false) :
                $this->db->trans_rollback();
                $result['status'] = false;
                $result['token']  = $this->security->get_csrf_hash();
            endif;
            $no_resep = $id;
            $this->db->delete('sm_resep_r', array('id_resep' => $id));
            if ($this->db->trans_status() === false) {
                $this->db->trans_rollback();
                $result['status'] = false;
                $result['token']  = $this->security->get_csrf_hash();
            }
            $this->db->delete("sm_resep_tebus", array("id_resep" => $id));
            if ($this->db->trans_status() === false) :
                $this->db->trans_rollback();
                $result['status'] = false;
                $result['token']  = $this->security->get_csrf_hash();
            endif;
            $this->db->where('id', $id_pk);
            $this->db->update('sm_layanan_pendaftaran', array('id_dokter' => $dokter));
            if ($this->db->trans_status() === false) :
                $this->db->trans_rollback();
                $result["status"] = false;
                $result['token']  = $this->security->get_csrf_hash();
            endif;
            $get = $this->db->select('r.id_layanan_pendaftaran as id_pk, l.id_pendaftaran, l.jenis_layanan')
                ->from('sm_resep as r')
                ->join('sm_layanan_pendaftaran as l', 'l.id = r.id_layanan_pendaftaran')
                ->where('r.id', $no_resep, true)
                ->get()
                ->row();
            $layanan_pendaftaran = $this->db->select('lp.*, pj.diskon')
                ->from('sm_layanan_pendaftaran as lp')
                ->join('sm_penjamin as pj', 'pj.id = lp.id_penjamin', 'left')
                ->where('lp.id', $get->id_pk, true)
                ->get()
                ->row();
            $keterangan_stok = $this->pasienName($get->id_pk);
            $ambil = $this->db->select('count(*) as ke')->from('sm_resep_tebus')->where('id_resep', $no_resep)->get()->row();
            $data_tebus = array("id_resep_asal" => $no_resep, "waktu" => $this->datetime, "id_resep" => $no_resep, "id_unit" => $this->unit(), "id_users" => $this->user(), "pengambilan_ke" => $ambil->ke + 1);
            // insert to data tebus resep to table sm_resep_tebus
            $this->db->insert("sm_resep_tebus", $data_tebus);
            $id_resep_tebus = $this->db->insert_id();
            if ($this->db->trans_status() === false) :
                $this->db->trans_rollback();
                $result['status'] = false;
                $result['token']  = $this->security->get_csrf_hash();
            endif;
            $data = array(
                "tanggal_penjualan"      => substr($tgl_resep, 0, 10),
                "waktu"                  => $this->datetime,
                "id_resep"               => $no_resep,
                "id_layanan_pendaftaran" => $get->id_pk,
                "id_resep_tebus"         => $id_resep_tebus,
                "total"                  => 0,
                "jenis"                  => "Resep",
                "toeslag"                => 0,
                "id_unit"                => $this->unit(),
                "id_users"               => $this->user()
            );
            // insert to data penjualan to table sm_penjualan
            $this->db->insert("sm_penjualan", $data);
            $id_penjualan = $this->db->insert_id();
            if ($this->db->trans_status() === false) :
                $this->db->trans_rollback();
                $result['status'] = false;
                $result['token']  = $this->security->get_csrf_hash();
            endif;
            $jml_no_r = safe_post("jmlnor");
            for ($i = 1; $i <= $jml_no_r; $i++) :
                $nor             = safe_post("no_r" . $i);
                $jp              = safe_post("jp" . $i);
                $jt              = safe_post("jt" . $i);
                $ap              = safe_post("ap" . $i);
                $ap2             = safe_post("ap2" . $i);
                $apm              = safe_post("apm" . $i);
                $isapm            = safe_post("isapm" . $i) === 'true' ? 1 : 0;
                $it              = safe_post("it" . $i);
                $ja              = safe_post("ja" . $i) !== 'null' ? safe_post("ja" . $i) : NULL;
                $keterangan_resep = safe_post("keterangan_resep" . $i) ? safe_post("keterangan_resep" . $i) : NULL;
                $cb              = safe_post("cara_buat" . $i);
                $timing          = safe_post("timing" . $i);
                $id_barang       = safe_post("id_barang" . $i);
                $dosisracik      = safe_post("dosisracik" . $i);
                $jmlpakai        = safe_post("jmlpakai" . $i);
                $obatkronis      = safe_post("obatkronis" . $i);
                $waktu_pemberian = safe_post("waktu_pemberian" . $i);
                $racik            = safe_post("is_racik" . $i) === 'null' ? 0 : safe_post("is_racik" . $i);
                $sediaan          = safe_post("sediaan" . $i) !== '' ? safe_post("sediaan" . $i) : null;
                $jam_pemberian_1  = safe_post('jam_pemberian_1' . $i) !== '' ? safe_post("jam_pemberian_1" . $i) : null;
                $jam_pemberian_2  = safe_post('jam_pemberian_2' . $i) !== '' ? safe_post("jam_pemberian_2" . $i) : null;
                $jam_pemberian_3  = safe_post('jam_pemberian_3' . $i) !== '' ? safe_post("jam_pemberian_3" . $i) : null;
                $jam_pemberian_4  = safe_post('jam_pemberian_4' . $i) !== '' ? safe_post("jam_pemberian_4" . $i) : null;
                $jam_pemberian_5  = safe_post('jam_pemberian_5' . $i) !== '' ? safe_post("jam_pemberian_5" . $i) : null;
                $jam_pemberian_6  = safe_post('jam_pemberian_6' . $i) !== '' ? safe_post("jam_pemberian_6" . $i) : null;

                // $tuslah_nominal = $this->db->query("select nominal from sm_tarif_tuslah where id = '" . $ja . "'")->row();
                $tuslah_nominal = $this->db->select('nominal')->from('sm_tarif_tuslah')->where('id', $ja)->get()->row();
                $parse_resep_r = array(
                    "id_resep"         => $no_resep,
                    "r_no"             => $nor,
                    "resep_r_jumlah"   => $jp,
                    "tebus_r_jumlah"   => $jt,
                    "aturan_pakai"     => $ap,
                    "ket_aturan_pakai" => $ap2,
                    "timing"           => $timing,
                    "iter"             => $it,
                    "cara_pembuatan"   => $cb,
                    "nominal"          => isset($tuslah_nominal->nominal) ? $tuslah_nominal->nominal : "0",
                    "admin_time"       => $waktu_pemberian,
                    "keterangan_resep" => $keterangan_resep,
                    "racik"            => $racik,
                    "aturan_pakai_manual"     => $isapm,
                    "ket_aturan_pakai_manual" => $apm,
                    "id_sediaan" => $sediaan,
                    'jam_pemberian_1' => $jam_pemberian_1,
                    'jam_pemberian_2' => $jam_pemberian_2,
                    'jam_pemberian_3' => $jam_pemberian_3,
                    'jam_pemberian_4' => $jam_pemberian_4,
                    'jam_pemberian_5' => $jam_pemberian_5,
                    'jam_pemberian_6' => $jam_pemberian_6
                );
                // looping insert data resep_r to table sm_resep_r
                $this->db->insert("sm_resep_r", $parse_resep_r);
                $id_resep_r = $this->db->insert_id();
                if ($this->db->trans_status() === false) :
                    $this->db->trans_rollback();
                    $result['status'] = false;
                    $result['token']  = $this->security->get_csrf_hash();
                endif;
                $data_r_tebus = array(
                    "id_resep_tebus"   => $id_resep_tebus,
                    "r_no"             => $nor,
                    "resep_r_jumlah"   => $jp,
                    "tebus_r_jumlah"   => $jt,
                    "sisa_tebus"       => 0,
                    "aturan_pakai"     => $ap,
                    "ket_aturan_pakai" => $ap2,
                    "timing"           => $timing,
                    "iter"             => $it,
                    "cara_pembuatan"   => $cb,
                    "admin_time"       => $waktu_pemberian,
                    "keterangan_resep" => $keterangan_resep,
                    "aturan_pakai_manual"     => $isapm,
                    "ket_aturan_pakai_manual" => $apm,
                    "racik"            => $racik,
                    "id_sediaan" => $sediaan,
                    'jam_pemberian_1' => $jam_pemberian_1,
                    'jam_pemberian_2' => $jam_pemberian_2,
                    'jam_pemberian_3' => $jam_pemberian_3,
                    'jam_pemberian_4' => $jam_pemberian_4,
                    'jam_pemberian_5' => $jam_pemberian_5,
                    'jam_pemberian_6' => $jam_pemberian_6
                );
                // looping insert data resep_tebus_r to table sm_resep_tebus_r
                $this->db->insert("sm_resep_tebus_r", $data_r_tebus);
                $id_detail_tebus_r = $this->db->insert_id();
                if ($this->db->trans_status() === false) :
                    $this->db->trans_rollback();
                    $result['status'] = false;
                    $result['token']  = $this->security->get_csrf_hash();
                endif;
                if (is_array($id_barang)) :
                    $hna_barang = 0;
                    foreach ($id_barang as $key => $data) :
                        $get_brg = $this->db->get_where('sm_barang', ['id' => $data])->row();
                        $harga_jual = $get_brg->hpp + $get_brg->hpp * $get_brg->margin_resep / 100;
                        $margin = $get_brg->margin_resep;
                        $parse_resep_r_detail = array(
                            "id_resep_r"   => $id_resep_r,
                            "id_barang"    => $id_barang[$key],
                            "jual_harga"   => $harga_jual,
                            "dosis_racik"  => $dosisracik[$key],
                            "jumlah_pakai" => $jmlpakai[$key],
                            "formularium"  => $get_brg->formularium,
                            "kronis"       => $obatkronis[$key]
                        );
                        // looping insert data resep detail to table sm_resep_r_detail
                        $this->db->insert("sm_resep_r_detail", $parse_resep_r_detail);
                        $idResepDetail = $this->db->insert_id();
                        if ($this->db->trans_status() === false) :
                            $this->db->trans_rollback();
                            $result['status'] = false;
                            $result['token']  = $this->security->get_csrf_hash();
                        endif;
                        $get_kemasan = $this->db->select('k.id, b.id as id_barang, b.hna, b.hpp, b.hpp+(b.hpp*(b.margin_resep/100)) as harga_jual, (k.isi*k.isi_satuan) as isis')
                            ->from('sm_kemasan_barang as k')
                            ->join('sm_barang as b', 'b.id = k.id_barang')
                            ->where('k.id_barang', $data)
                            ->where('k.default_kemasan', '1')
                            ->get()
                            ->row();
                        $reimburse = 0;
                        $penjamin = $this->db->get_where('sm_penjamin', ['id' => $layanan_pendaftaran->id_penjamin])->row();
                        $harga_jual_tanpa_diskon = $get_brg->hpp + $get_brg->hpp * $get_brg->margin_resep / 100;
                        if (isset($penjamin->id)) :
                            $reimburse = $harga_jual * $penjamin->diskon_barang / 100;
                        endif;
                        $data_detail_jual = array(
                            "waktu"        => $this->datetime,
                            "id_penjualan" => $id_penjualan,
                            "id_kemasan"   => $get_kemasan->id,
                            "qty"          => $jmlpakai[$key],
                            "hna"          => $get_kemasan->hna,
                            "hpp"          => $get_kemasan->hpp,
                            "id_asuransi"  => isset($penjamin->id) ? $penjamin->id : NULL,
                            "reimburse"    => $reimburse,
                            "harga_jual"   => $harga_jual_tanpa_diskon,
                            "kronis"       => $obatkronis[$key]
                        );
                        // looping insert data detail penjualan to table sm_detail_penjualan
                        $this->db->insert("sm_detail_penjualan", $data_detail_jual);
                        $hna_barang = $hna_barang + $get_kemasan->hna * $jmlpakai[$key];
                        if ($this->db->trans_status() === false) :
                            $this->db->trans_rollback();
                            $result['status'] = false;
                            $result['token']  = $this->security->get_csrf_hash();
                        endif;
                        $detail_tebus_r = array(
                            "id_resep_tebus_r" => $id_detail_tebus_r,
                            "id_barang"        => $data,
                            "jual_harga"       => $harga_jual,
                            "dosis_racik"      => $dosisracik[$key],
                            "jumlah_pakai"     => $jmlpakai[$key],
                            "kronis"           => $obatkronis[$key]
                        );
                        $this->db->insert("sm_resep_tebus_r_detail", $detail_tebus_r);
                        $this->load->model('satu_sehat/Satu_sehat_model', 'sehat');
                        $cekOnOff = $this->sehat->cekSatuSehatOnOff();
                        if($cekOnOff->onoff === '1'){
                            if (isset($get->jenis_layanan)) {
                                if ($get->jenis_layanan === 'Poliklinik') {
                                    $this->perbaharuiIntegrasiResep($idResepDetail, 'Edit');
                                }
                            }
                        }

                        if ($this->db->trans_status() === false) :
                            $this->db->trans_rollback();
                            $result['status'] = false;
                            $result['token']  = $this->security->get_csrf_hash();
                        endif;
                    endforeach;
                endif;
            endfor;

            $this->load->model('satu_sehat/Satu_sehat_model', 'sehat');
            $cekOnOff = $this->sehat->cekSatuSehatOnOff();
            if($cekOnOff->onoff === '1'){
                if (isset($get->jenis_layanan)) {
                    if ($get->jenis_layanan === 'Poliklinik') {
                        $this->cekSemuaDataResep($id);
                    }
                }
            }

            $get_dp = $this->db->select('sum(harga_jual*qty)-sum(disc_rp*qty) as total')->from('sm_detail_penjualan')->where('id_penjualan', $id_penjualan)->get()->row();
            $this->db->where('id', $id_penjualan)->update('sm_penjualan', array("total" => $get_dp->total));
            $d_barang = $this->db->select('rtrd.id_barang, rtrd.jumlah_pakai')->from('sm_resep_tebus as rt')
                ->join('sm_resep_tebus_r as rtr', 'rtr.id_resep_tebus = rt.id')
                ->join('sm_resep_tebus_r_detail as rtrd', 'rtrd.id_resep_tebus_r = rtr.id')
                ->where('rt.id_resep', $no_resep, true)
                ->get()->result();
            if (is_array($d_barang)) :
                foreach ($d_barang as $i => $val) :
                    $last_barang = $this->db->select('sum(masuk)-sum(keluar) as sisa, ed')->from('sm_stok')->where('id_barang', $val->id_barang)->where('ed >', $this->date)
                        ->where('id_unit', $this->unit())->group_by('ed')->having('sum(masuk)-sum(keluar) >', 0)->order_by('ed', 'asc')->get()->result();
                    $use = $val->jumlah_pakai;
                    foreach ($last_barang as $j => $val2) :
                        $use = $val2->sisa - abs($use);
                        if ($use <= 0) :
                            $keluar = $val2->sisa;
                        else :
                            $keluar = abs($use - $val2->sisa);
                        endif;
                        $data_stok = array(
                            "waktu"        => $this->datetime,
                            "id_transaksi" => $id_penjualan,
                            "transaksi"    => "Penjualan",
                            "id_barang"    => $val->id_barang,
                            "ed"           => isset($val2->ed) ? $val2->ed :  NULL,
                            "keluar"       => $keluar,
                            "keterangan"   => $keterangan_stok,
                            "id_unit"      => $this->unit(),
                            "id_users"     => $this->user()
                        );
                        // insert data stok to table sm_stok
                        $this->db->insert("sm_stok", $data_stok);
                        if ($this->db->trans_status() === false) :
                            $this->db->trans_rollback();
                            $result['status'] = false;
                            $result['token']  = $this->security->get_csrf_hash();
                        endif;
                        if (0 <= $use) :
                            break;
                        endif;
                    endforeach;
                endforeach;
            endif;
            if ($this->db->trans_status() === false) :
                $this->db->trans_rollback();
                $result['status'] = false;
                $result['token']  = $this->security->get_csrf_hash();
            else :
                $this->db->trans_commit();
                $result['status'] = true;
                $result['act']    = 'edit';
                $result['asal_input_resep'] = $asal_input_resep;
                $result['id_lp']  = $id_pk;
                $result['token']  = $this->security->get_csrf_hash();
            endif;
        endif;

        $result["id"] = $no_resep;
        return $result;
    }

    function getDataResepById($id_resep)
    {
        $this->db->select('r.*, lp.id_penjamin, pjm.nama as penjamin, lp.cara_bayar, date(r.waktu) as tanggal, pjl.id as id_jual_resep,
                            pg.nama as dokter, p.tanggal_lahir, p.nama as pasien, lp.jenis_layanan, p.alamat as alamat_pasien, p.id as no_rm, 
                            p.telp, pjl.toeslag, r.is_terapi_pulang');
        $this->db->from('sm_resep as r');
        $this->db->join('sm_tenaga_medis as tm', 'tm.id = r.id_dokter');
        $this->db->join('sm_pegawai as pg', 'pg.id = tm.id_pegawai', 'left');
        $this->db->join('sm_pasien as p', 'p.id = r.id_pasien');
        $this->db->join('sm_layanan_pendaftaran as lp', 'lp.id = r.id_layanan_pendaftaran');
        $this->db->join('sm_penjamin as pjm', 'pjm.id = lp.id_penjamin', 'left');
        $this->db->join('sm_penjualan as pjl', 'pjl.id_resep = r.id', 'left');
        $this->db->where('r.id', $id_resep, true);
        $this->db->order_by('r.waktu', 'desc');

        $result = $this->db->get()->result();
        foreach ($result as $i => $val) :
            $result2 = $this->resepR($val->id)->result();
            $result[$i]->resep_r = $result2;
            foreach ($result2 as $j => $val2) :
                $result[$i]->resep_r[$j]->resep_r_detail = $this->resepRDetail($val2->id, $val->id)->result();
            endforeach;
        endforeach;

        $data['data'] = $result;
        return $data;
    }

    function resepR($id_resep)
    {
        $check = $this->db->select('count(*) as jml')->from('sm_resep_tebus')->where('id_resep', $id_resep, true)->get()->row();
        if ($check->jml === '0') :
            $this->db->select("rr.*, rr.keterangan_resep, rr.r_no as no_r, tt.nama as tarif, (select count(id) from sm_resep_r where id_resep = rr.id_resep) as jumlah_r, case when rr.aturan_pakai_manual = '0' or rr.aturan_pakai_manual is null then rr.aturan_pakai else rr.ket_aturan_pakai_manual end as aturan_pakai");
            $this->db->from('sm_resep_r as rr');
            $this->db->join('sm_tarif_tuslah as tt', 'rr.id_tarif_tuslah = tt.id');
            $this->db->where('rr.id_resep', $id_resep, true);
            $this->db->order_by('rr.r_no', 'asc');
        else :
            $this->db->select("distinct on (rr.r_no) rr.*, rr.keterangan_resep, rr.r_no as no_r, tt.nama as tarif, 
                            (select count(id) from sm_resep_tebus_r where id_resep_tebus = rr.id_resep_tebus) as jumlah_r, 
                            (select sum(tebus_r_jumlah) from sm_resep_tebus_r where r_no = rr.r_no and id_resep_tebus in  
                            (select id from sm_resep_tebus where id_resep = $id_resep)) as tertebus, rr.racik as is_racik, rr.id_sediaan, sed.nama as nama_sediaan,
                            case when rr.aturan_pakai_manual = '0' or rr.aturan_pakai_manual is null then rr.aturan_pakai else rr.ket_aturan_pakai_manual end as aturan_pakai");
            $this->db->from('sm_resep_tebus_r as rr');
            $this->db->join('sm_tarif_tuslah as tt', 'tt.id = rr.id_tarif_tuslah', 'left');
            $this->db->join('sm_resep_tebus as rt', 'rr.id_resep_tebus = rt.id');
            $this->db->join('sm_sediaan as sed', 'sed.id = rr.id_sediaan', 'left');
            $this->db->where('rr.id_resep_tebus = (select id from sm_resep_tebus where id_resep = ' . $id_resep . ')');
            $this->db->order_by('rr.r_no', 'asc');
        endif;
        return $this->db->get();
    }

    function resepRDetail($id_resep_r, $id_resep)
    {
        $check = $this->db->select('count(*) as jml')->from('sm_resep_tebus')->where('id_resep', $id_resep, true)->get()->row();
        if ($check->jml === '0') :
            $this->db->select("rd.*, sd.nama as sediaan, b.kekuatan, 
                            CONCAT_WS(' ', b.nama, b.kekuatan, s.nama, COALESCE(sd.nama,''), '<small><i>', COALESCE(pb.nama,''), '</i></small>') as nama_barang, 
                            COALESCE(s.nama,'') as satuan_kekuatan,
                            COALESCE((select sum(masuk)-sum(keluar) from sm_stok where id_barang = b.id and ed > '" . date("Y-m-d") . "' and id_unit = '" . $this->unit() . "'), 0) as sisa");
            $this->db->from('sm_resep_r_detail as rd');
            $this->db->join('sm_barang as b', 'b.id = rd.id_barang');
            $this->db->join('sm_satuan as s', 's.id = b.satuan_kekuatan', 'left');
            $this->db->join('sm_sediaan as sd', 'sd.id = b.id_sediaan', 'left');
            $this->db->join('sm_pabrik as pb', 'pb.id = b.id_pabrik', 'left');
            $this->db->where('rd.id_resep_r', $id_resep_r, true);
        else :
            $this->db->select("rd.*, sd.nama as sediaan, b.kekuatan, 
                            CONCAT_WS(' ', b.nama, b.kekuatan, s.nama, COALESCE(sd.nama,''), '<small><i>', COALESCE(pb.nama,''), '</i></small>') as nama_barang, 
                            COALESCE(s.nama,'') as satuan_kekuatan, 
                            COALESCE((select sum(masuk)-sum(keluar) from sm_stok where id_barang = b.id and ed > '" . date("Y-m-d") . "' and id_unit = '" . $this->unit() . "'),0) as sisa");
            $this->db->from('sm_resep_tebus_r_detail as rd');
            $this->db->join('sm_barang as b', 'b.id = rd.id_barang');
            $this->db->join('sm_satuan as s', 's.id = b.satuan_kekuatan', 'left');
            $this->db->join('sm_sediaan as sd', 'sd.id = b.id_sediaan', 'left');
            $this->db->join('sm_pabrik as pb', 'pb.id = b.id_pabrik', 'left');
            $this->db->where('rd.id_resep_tebus_r', $id_resep_r, true);
        endif;

        return $this->db->get();
    }

    function getListDataResepTebus($id_resep_tebus)
    {
        $this->db->select("
            rt.*, lp.id_penjamin, lp.cara_bayar, lp.jenis_layanan, pjn.nama as penjamin, 
            date(r.waktu) as tanggal, pj.id as id_penjualan, pg.nama as dokter, p.tanggal_lahir, 
            p.nama as nama_pasien, p.alamat as alamat_pasien, p.id as id_pasien, af.id as id_antrian_farmasi
        ");
        $this->db->from('sm_resep_tebus as rt');
        $this->db->join('sm_resep as r', 'r.id = rt.id_resep');
        $this->db->join('sm_antrian_farmasi as af', 'af.id_resep = r.id', 'left');
        $this->db->join('sm_tenaga_medis as tm', 'tm.id = r.id_dokter', 'left');
        $this->db->join('sm_pegawai as pg', 'pg.id = tm.id_pegawai', 'left');
        $this->db->join('sm_pasien as p', 'p.id = r.id_pasien');
        $this->db->join('sm_layanan_pendaftaran as lp', 'lp.id = r.id_layanan_pendaftaran');
        $this->db->join('sm_penjamin as pjn', 'pjn.id = lp.id_penjamin', 'left');
        $this->db->join('sm_penjualan as pj', 'pj.id_resep = r.id', 'left');
        $this->db->where('rt.id', $id_resep_tebus, true);
        $this->db->order_by('r.waktu', 'desc');
        $result = $this->db->get()->result();
        foreach ($result as $i => $val) :
            $this->db->select("sm_resep_tebus_r.id,id_resep_tebus,resep_r_jumlah,tebus_r_jumlah,sisa_tebus,aturan_pakai,ket_aturan_pakai,timing,pemberian,jam,tpm,
                              iter,cara_pembuatan,id_tarif_tuslah,nominal,jml_pemberian,jml_tablet,cara_pemberian,awal_pemberian,admin_time,
                              jml_hari_pemberi,, r_no as no_r,
                               case when keterangan_resep is not null then keterangan_resep else '' end keterangan_resep, sm_sediaan.nama as sediaan");
            $this->db->from('sm_resep_tebus_r');
            $this->db->join('sm_sediaan', 'sm_sediaan.id = sm_resep_tebus_r.id_sediaan', 'left');
            $this->db->where('id_resep_tebus', $val->id);
            $result2 = $this->db->get()->result();
            $result[$i]->resep_r = $result2;
            foreach ($result2 as $j => $val2) :
                $admin_time = $this->db->where_in('kode', explode(', ', $val2->admin_time))->get('sm_waktu_pemberian_obat')->result();
                $admin_time = implode(', ', array_map(function ($v) {
                    return $v->timing;
                }, $admin_time));
                $val2->admin_time = !empty($admin_time) ? $admin_time : 'Makan';

                $timing = $this->db->get_where('sm_waktu_pemberian_obat', ['kode' => $val2->timing])->row();
                $val2->timing = $timing ? $timing->timing : $val2->cara_pemberian;

                $this->db->select("rd.*, sd.nama as sediaan, b.kekuatan, b.nama_lengkap as nama_barang");
                $this->db->from('sm_resep_tebus_r_detail as rd');
                $this->db->join('sm_barang as b', 'b.id = rd.id_barang');
                $this->db->join('sm_satuan as s', 's.id = b.satuan_kekuatan', 'left');
                $this->db->join('sm_sediaan as sd', 'sd.id = b.id_sediaan', 'left');
                $this->db->join('sm_pabrik as pb', 'pb.id = b.id_pabrik', 'left');
                $this->db->where('rd.id_resep_tebus_r', $val2->id);
                $result[$i]->resep_r[$j]->resep_r_detail = $this->db->get()->result();
            endforeach;
        endforeach;
        $data['data'] = $result;
        return $data;
    }
    // end resep

    function getListDataResepTebusLog($id_resep_tebus)
    {
        $this->db->select("
            r.*, lp.id_penjamin, lp.cara_bayar, lp.jenis_layanan, pjn.nama as penjamin, 
            date(r.resep->>'waktu') as tanggal, pj.id as id_penjualan, pg.nama as dokter, p.tanggal_lahir, 
            p.nama as nama_pasien, p.alamat as alamat_pasien, p.id as id_pasien, af.id as id_antrian_farmasi
        ");
        $this->db->from('sm_resep_logs as r');
        $this->db->join('sm_antrian_farmasi as af', "af.id_resep = (r.resep->>'id')::int", 'left', false);
        $this->db->join('sm_tenaga_medis as tm', "tm.id = (r.resep->>'id_dokter')::int", 'left', false);
        $this->db->join('sm_pegawai as pg', 'pg.id = tm.id_pegawai', 'left');
        $this->db->join('sm_pasien as p', "p.id = r.resep->>'id_pasien'", '', false);
        $this->db->join('sm_layanan_pendaftaran as lp', "lp.id = (r.resep->>'id_layanan_pendaftaran')::int");
        $this->db->join('sm_penjamin as pjn', 'pjn.id = lp.id_penjamin', 'left');
        $this->db->join('sm_penjualan as pj', "pj.id_resep = (r.resep->>'id')::int", 'left', false);
        $this->db->where("r.resep_tebus->>'id' ='$id_resep_tebus'", '', false);
        $this->db->order_by("r.resep->>'waktu'", 'desc', false);
        $result = $this->db->get()->result();

        foreach ($result as $item) {
            $item->resep_r = json_decode($item->resep_tebus_r);
            foreach ($item->resep_r as $item2) {
                $item2->no_r = $item2->r_no;
                $item2->keterangan_resep = $item2->keterangan_resep ?? '';
                unset($item2->r_no);
                foreach (json_decode($item->resep_tebus_r_detail) as $r_detail) {
                    foreach ($r_detail as $detail) {
                        if ($item2->id == $detail->id_resep_tebus_r) {
                            $barang = $this->db->select("sd.nama as sediaan, b.kekuatan, b.nama_lengkap as nama_barang")
                                ->from('sm_barang as b')
                                ->join('sm_satuan as s', 's.id = b.satuan_kekuatan', 'left')
                                ->join('sm_sediaan as sd', 'sd.id = b.id_sediaan', 'left')
                                ->join('sm_pabrik as pb', 'pb.id = b.id_pabrik', 'left')
                                ->where_in('b.id', $detail->id_barang)
                                ->get()->row();

                            $item2->resep_r_detail[] = array_merge((array) $detail, (array) $barang);
                        }
                    }
                }
            }
        }

        $data['data'] = $result;
        return $data;
    }

    private function updateMedicationDispense($idResep)
    {

        if (!isset($idResep)) {

            date_default_timezone_set('Asia/Jakarta');
            $xDetailDataRequest = ["kategori" => "MedicationDispense", "message" => 'Tidak Ada ID Resep', "jenis_data" => 'error', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama'), "function" => 'updateMedicationDispense'];
            $this->db->insert('sm_satu_sehat_log', $xDetailDataRequest);

            return;
        }



        $dataResepTebus = $this->db->select('r.id')
            ->from('sm_resep_tebus as r')
            ->where('r.id_resep', (int)$idResep, true)
            ->get()
            ->row();

        if (isset($dataResepTebus->id)) {

            $dataResepTebusR = $this->db->select('r.id, r.id_integrasi_resep, r.id_medication_request, r.id_medication_dispense, b.id as id_barang, b.nama_lengkap as nama_obat, r.jumlah_pakai, tm.ihs_number as ihs_dokter, pg.nama as nama_pegawai, r.id as id_resep_item, rr.aturan_pakai, rs.id as id_resep_tebus, rs.id_resep as id_resep, sr.id_pasien as no_rm, p.nama as nama_pasien, p.ihsn, l.id_encounter, ro.code as roa_code, ro.display as roa_display, r.dosis_racik, r.jumlah_pakai, uom.code as code_ucum, s.ingredient')
                ->from('sm_resep_tebus_r_detail as r')
                ->join('sm_resep_tebus_r as rr', 'rr.id = r.id_resep_tebus_r', 'left')
                ->join('sm_resep_tebus as rs', 'rs.id = rr.id_resep_tebus', 'left')
                ->join('sm_resep as sr', 'sr.id = rs.id_resep', 'left')
                ->join('sm_layanan_pendaftaran as l', 'l.id = sr.id_layanan_pendaftaran', 'left')
                ->join('sm_tenaga_medis as tm', 'tm.id = sr.id_dokter', 'left')
                ->join('sm_pegawai as pg', 'pg.id = tm.id_pegawai', 'left')
                ->join('sm_pasien as p', 'p.id = sr.id_pasien', 'left')
                ->join('sm_barang as b', 'b.id = r.id_barang', 'left')
                ->join('sm_satuan as sat', 'sat.id = b.satuan_kekuatan', 'left')
                ->join('sm_unit_of_measure as uom', 'uom.code = sat.code_ucum', 'left')
                ->join('sm_roa as ro', 'ro.roa = b.roa', 'left')
                ->join('sm_sediaan as s', 's.id = b.id_sediaan', 'left')
                ->where('rs.id', (int)$dataResepTebus->id, true)
                ->get()
                ->result();

            foreach ($dataResepTebusR as $a => $b) {

                $lokasi = $this->db->select("integrasi_baru")->from("sm_lokasi")->where("nama", 'Apotek Rawat Jalan', true)->get()->row();

                $cekSequence = $this->db->select('r.id, rr.sequence')
                    ->from('sm_resep_r_detail as r')
                    ->join('sm_resep_r as rr', 'rr.id = r.id_resep_r', 'left')
                    ->join('sm_resep as rs', 'rs.id = rr.id_resep', 'left')
                    ->where('r.id_barang', (int)$b->id_barang, true)
                    ->where('rs.id', (int)$b->id_resep, true)
                    ->get()
                    ->row();

                if (isset($b->id_integrasi_resep) && isset($b->id_medication_request) && isset($b->id_medication_dispense)) {

                    $this->autentikasi_user_post();

                    $this->load->model('satu_sehat/Satu_sehat_model', 'sehat');

                    $xKonfigurasi = $this->sehat->getConfigSatuSehat();

                    $idUser = $this->session->userdata('id_translucent');

                    $getID = $this->sehat->aksesSatuSehat($idUser);

                    $tokenBearer = $getID->token;

                    $xKonfigurasi = $this->sehat->getConfigSatuSehat();

                    $header = $this->sehat->authBearer($tokenBearer);


                    $url = $xKonfigurasi->apiurl . "MedicationDispense";

                    if (isset($cekSequence->sequence)) {

                        $sequence = $cekSequence->sequence;
                    } else {

                        $sequence = 1;
                    }

                    $cekRelasiAturan = $this->db->select('apo.jml_pemberian')
                        ->from('sm_aturan_pakai_obat as apo')
                        ->where('apo.signa', $b->aturan_pakai, true)
                        ->where('apo.is_active', 1, true)
                        ->get()
                        ->row();

                    if (isset($cekRelasiAturan->jml_pemberian)) {

                        $frequencyPeriod = $cekRelasiAturan->jml_pemberian;
                    } else {

                        date_default_timezone_set('Asia/Jakarta');
                        $xDetailDataRequest = ["kategori" => "Update MedicationDispense", "no_rm" => $b->no_rm, "message" => 'Tidak Ada data jumlah pemberian di sm resep r', "jenis_data" => 'error', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama'), "param" => $cekSequence->id . ' id Resep R', "function" => 'updateMedicationDispense'];
                        $this->db->insert('sm_satu_sehat_log', $xDetailDataRequest);

                        return;
                    }

                    $paramDispense = array(
                        "resourceType" => "MedicationDispense",
                        "id" => $b->id_medication_dispense,
                        "identifier" => [
                            array(
                                "system" => "http://sys-ids.kemkes.go.id/prescription/" . $xKonfigurasi->organization,
                                "use" => "official",
                                "value" => $b->id_resep
                            ),
                            array(
                                "system" => "http://sys-ids.kemkes.go.id/prescription-item/" . $xKonfigurasi->organization,
                                "use" => "official",
                                "value" => $b->id
                            )
                        ],
                        "status" => "cancelled",
                        "category" => array(
                            "coding" => [
                                array(
                                    "system" => "http://terminology.hl7.org/fhir/CodeSystem/medicationdispense-category",
                                    "code" => "outpatient",
                                    "display" => "Outpatient"
                                )
                            ]
                        ),
                        "medicationReference" => array(
                            "reference" => "Medication/" . $b->id_integrasi_resep,
                            "display" => $b->nama_obat
                        ),
                        "subject" => array(
                            "reference" => "Patient/" . $b->ihsn,
                            "display" => $b->nama_pasien
                        ),
                        "context" => array(
                            "reference" => "Encounter/" . $b->id_encounter
                        ),
                        "location" => array(
                            "reference" => "Location/" . $lokasi->integrasi_baru,
                            "display" => "Apotek Rawat Jalan"
                        ),
                        "authorizingPrescription" => [
                            array(
                                "reference" => "MedicationRequest/" . $b->id_medication_request
                            )
                        ],
                        "quantity" => array(
                            "system" => "http://terminology.hl7.org/CodeSystem/v3-orderableDrugForm",
                            "code" => $b->ingredient,
                            "value" => (int)$b->jumlah_pakai
                        ),
                        "dosageInstruction" => [
                            array(
                                "sequence" => (int)$sequence,
                                "timing" => array(
                                    "repeat" => array(
                                        "frequency" => (int)$frequencyPeriod,
                                        "period" => (int)$frequencyPeriod,
                                        "periodUnit" => "d"
                                    )
                                ),
                                "doseAndRate" => [
                                    array(
                                        "doseQuantity" => array(
                                            "value" => (int)$b->dosis_racik,
                                            "unit" => $b->code_ucum,
                                            "system" => "http://unitsofmeasure.org",
                                            "code" => $b->code_ucum
                                        )
                                    )
                                ]
                            )
                        ]
                    );

                    $dataApi = json_encode($paramDispense);

                    $output = $this->sehat->putEncounter($url, $dataApi, $header);

                    if($output['result'] !== false){

                        if ($output['respon'] === 201) {

                            date_default_timezone_set('Asia/Jakarta');

                            $xDetailData = ["kategori" => "Update Medication Dispense", "no_rm" => $b->no_rm, "message" => json_encode($paramDispense), "jenis_data" => 'ok', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama'), "respon" => $output['respon'], "function" => 'updateMedicationDispense'];

                            $this->db->insert('sm_satu_sehat_log', $xDetailData);
                        } else {

                            date_default_timezone_set('Asia/Jakarta');
                            $xDetailData = ["kategori" => "Update Medication Dispense", "no_rm" => $b->no_rm, "message" => $output['result'], "jenis_data" => 'error', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama'), "param" => json_encode($paramDispense), "respon" => $output['respon'], "function" => 'updateMedicationDispense'];
                            $this->db->insert('sm_satu_sehat_log', $xDetailData);
                        
                        }

                    }

                } else {

                    if ($b->id_integrasi_resep === null) {

                        date_default_timezone_set('Asia/Jakarta');
                        $xDetailDataRequest = ["kategori" => "Update Medication Dispense", "no_rm" => $b->no_rm, "message" => 'Tidak Ada data id_integrasi_resep', "jenis_data" => 'error', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama'), "param" => $cekSequence->id . ' id Resep R', "function" => 'updateMedicationDispense'];
                        $this->db->insert('sm_satu_sehat_log', $xDetailDataRequest);
                    }

                    if ($b->id_medication_request === null) {

                        date_default_timezone_set('Asia/Jakarta');
                        $xDetailDataRequest = ["kategori" => "Update Medication Dispense", "no_rm" => $b->no_rm, "message" => 'Tidak Ada data id_medication_request', "jenis_data" => 'error', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama'), "param" => $cekSequence->id . ' id Resep R', "function" => 'updateMedicationDispense'];
                        $this->db->insert('sm_satu_sehat_log', $xDetailDataRequest);
                    }

                    if ($b->id_medication_dispense === null) {

                        date_default_timezone_set('Asia/Jakarta');
                        $xDetailDataRequest = ["kategori" => "Update Medication Dispense", "no_rm" => $b->no_rm, "message" => 'Tidak Ada data id_medication_dispense', "jenis_data" => 'error', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama'), "param" => $cekSequence->id . ' id Resep R', "function" => 'updateMedicationDispense'];
                        $this->db->insert('sm_satu_sehat_log', $xDetailDataRequest);
                    }
                }
            }
        }
    }

    function deletePenjualan($id)
    {
        $data = $this->db->select('*')->from('sm_penjualan')->where('id', $id, true)->get()->row();
        $getDataResep = $this->db->select('l.jenis_layanan')
            ->from('sm_resep as r')
            ->join('sm_layanan_pendaftaran as l', 'l.id = r.id_layanan_pendaftaran')
            ->where('r.id', $data->id_resep, true)
            ->get()
            ->row();

        if (isset($getDataResep->jenis_layanan)) {
            if ($getDataResep->jenis_layanan === 'Poliklinik') {
                $this->updateIntegrasiResep($data->id_resep, 'Delete');
                $this->load->model('satu_sehat/Satu_sehat_model', 'sehat');
                $cekOnOff = $this->sehat->cekSatuSehatOnOff();
                if($cekOnOff->onoff === '1'){
                    $this->updateMedicationDispense($data->id_resep);
                }
            }
        }
        $this->addToResepLogs($data, 'Hapus');
        if ($data->id_history_pembayaran !== NULL) :
            $result["status"] = false;
            $result["message"] = "payment";
        else :
            $this->db->trans_begin();
            if ($data->id_resep !== NULL) :
                $this->db->delete("sm_history_cetak_copy_resep", ["resep_id" => $data->id_resep]);
                $this->db->delete("sm_resep", array("id" => $data->id_resep));
                if ($this->db->trans_status() === false) :
                    $this->db->trans_rollback();
                    $result["status"] = false;
                endif;
            endif;
            $this->db->delete("sm_penjualan", array("id" => $id));
            if ($this->db->trans_status() === false) :
                $this->db->trans_rollback();
                $result["status"] = false;
            endif;
            $this->db->delete("sm_stok", array("id_transaksi" => $id, "transaksi" => "Penjualan"));
            if ($this->db->trans_status() === false) :
                $this->db->trans_rollback();
                $result["status"] = false;
                $result["message"] = "";
            else :
                $this->db->trans_commit();
                $result["status"] = true;
            endif;
        endif;
        return $result;
    }

    // CEK
    function cekDiagnosaAkhir($id)
    {
        $jumlah = $this->db->select('count(id) as jumlah')->from('sm_diagnosa')->where('id_layanan_pendaftaran', $id, true)->get()->row()->jumlah;
        $status = false;
        if ($jumlah > 0) :
            $status = true;
        endif;
        return $status;
    }

    function checkStatusBHPOperasi($id_layanan_pendaftaran)
    {
        $result = $this->db->select("id")->from('sm_jadwal_kamar_operasi')->where('id_layanan_pendaftaran', $id_layanan_pendaftaran, true)->get()->result();
        $jumlah_kosong = 0;
        foreach ($result as $i => $value) :
            $jumlah_penjualan = $this->db->select("count(*) as jumlah")->from('sm_penjualan as p')->join('sm_detail_penjualan as dp', 'dp.id_penjualan = p.id')->where('p.id_operasi', $value->id, true)->get()->row()->jumlah;
            if ($jumlah_penjualan === "0") :
                $jumlah_kosong++;
            endif;
            $result[$i]->jumlah = $jumlah_penjualan;
        endforeach;
        if (0 < $jumlah_kosong) :
            $data["message"] = "BHP Operasi untuk pasien ini belum diinputkan, <br><b>lengkapi data sebelum status keluar pasien !</b>";
            $data["status"] = false;
        else :
            $data["status"] = true;
        endif;
    }

    function dischargeToRawatInap($id_layanan_pendaftaran, $out_time = NULL)
    {
        $this->db->trans_begin();
        $waktu_keluar = $this->datetime;

        if ($out_time != NULL) :
            $waktu_keluar = $out_time;
        endif;

        $data_ranap = $this->db->select('ri.*, lp.id_pendaftaran')->from('sm_rawat_inap as ri')
            ->join('sm_layanan_pendaftaran as lp', 'lp.id = ri.id_layanan_pendaftaran')
            ->where('ri.id_layanan_pendaftaran', $id_layanan_pendaftaran, true)->get()->row();
        $durasi = dayBetweenDates($data_ranap->waktu_masuk, $waktu_keluar);
        // Update Waktu Keluar dan Total Hari Rawat Inap
        $update_ranap = array(
            'waktu_keluar' => $waktu_keluar,
            'total_hari' => $durasi,
            'checkout' => '1'
        );

        $this->db->where('id_layanan_pendaftaran', $id_layanan_pendaftaran)->update('sm_rawat_inap', $update_ranap);
        $ranap_total = $durasi * $data_ranap->nominal;
        $ranap_reimburse = $ranap_total * $data_ranap->diskon / 100;
        $this->updatePembayaran($data_ranap->id_pendaftaran, $id_layanan_pendaftaran, $id_layanan_pendaftaran, "Rawat Inap", $ranap_total, $ranap_reimburse);
        $where_bed = array('id' => $data_ranap->id_bed);
        $this->db->where($where_bed)->update('sm_bed', array('keterangan' => 'Waiting', 'penghuni' => NULL));
        $this->setBelumLunas($data_ranap->id_pendaftaran);

        if ($this->db->trans_status() === false) :
            $this->db->trans_rollback();
            $result['status'] = false;
            $result['token']  = $this->security->get_csrf_hash();
        else :
            $this->db->trans_commit();
            $result['status'] = true;
            $result['token']  = $this->security->get_csrf_hash();
        endif;

        return $result;
    }

    function dischargeToIntensiveCare($id_layanan_pendaftaran, $out_time = NULL)
    {
        $this->db->trans_begin();
        $waktu_keluar = $this->datetime;

        if ($out_time != NULL) :
            $waktu_keluar = $out_time;
        endif;

        $data_icare = $this->db->select('ri.*, lp.id_pendaftaran')->from('sm_intensive_care as ri')
            ->join('sm_layanan_pendaftaran as lp', 'lp.id = ri.id_layanan_pendaftaran')
            ->where('ri.id_layanan_pendaftaran', $id_layanan_pendaftaran, true)->get()->row();
        $durasi = dayBetweenDates($data_icare->waktu_masuk, $waktu_keluar);
        // Update Waktu Keluar dan Total Hari Intensive Care
        $update_icare = array(
            'waktu_keluar' => $waktu_keluar,
            'total_hari' => $durasi
        );

        $this->db->where('id_layanan_pendaftaran', $id_layanan_pendaftaran)->update('sm_intensive_care', $update_icare);
        $icare_total = $durasi * $data_icare->nominal;
        $icare_reimburse = $icare_total * $data_icare->diskon / 100;
        $this->updatePembayaran($data_icare->id_pendaftaran, $id_layanan_pendaftaran, $id_layanan_pendaftaran, "Intensive Care", $icare_total, $icare_reimburse);
        $where_bed = array('id' => $data_icare->id_bed);
        $this->db->where($where_bed)->update('sm_bed', array('keterangan' => 'Waiting', 'penghuni' => NULL));
        $this->setBelumLunas($data_icare->id_pendaftaran);

        if ($this->db->trans_status() === false) :
            $this->db->trans_rollback();
            $result['status'] = false;
            $result['token']  = $this->security->get_csrf_hash();
        else :
            $this->db->trans_commit();
            $result['status'] = true;
            $result['token']  = $this->security->get_csrf_hash();
        endif;

        return $result;
    }

    function insertAdministrasiRawatInap($id_pendaftaran, $id_layanan_pendaftaran)
    {
        $this->db->trans_begin();
        $this->load->model('keuangan/Keuangan_model', 'm_keuangan');
        $sql = "select lp.*, pj.diskon, bg.nama as bangsal 
                from sm_layanan_pendaftaran as lp 
                join sm_rawat_inap as ri on (ri.id_layanan_pendaftaran = lp.id) 
                join sm_bangsal as bg on (bg.id = ri.id_bangsal) 
                left join sm_penjamin as pj on (pj.id = lp.id_penjamin) 
                where lp.id = '" . $id_layanan_pendaftaran . "'";
        $data_layanan_pendaftaran = $this->db->query($sql)->row();
        $totalBilling = $this->m_keuangan->getTotalPenagihanTanpaDiskon($id_pendaftaran);
        $administrasi = 5 / 100 * (float) $totalBilling;

        if (1500000 < $administrasi) :
            $administrasi = 1500000;
        endif;
        $administrasi = ceil($administrasi);

        $penjamin = NULL;
        if ($data_layanan_pendaftaran->id_penjamin !== NULL) :
            $penjamin = $data_layanan_pendaftaran->id_penjamin;
            $reimburse = (int) $data_layanan_pendaftaran->diskon / 100 * $administrasi;
        else :
            $reimburse = 0;
        endif;

        // 139 id tarif pelayanan administrasi rawat inap
        $where_administrasi = array('id_layanan_pendaftaran' => $id_layanan_pendaftaran, 'id_tarif_pelayanan' => 139);
        $cek_administrasi = $this->db->where($where_administrasi)->get('sm_tarif_tindakan_pasien')->row();
        if (0 < count((array)$cek_administrasi)) :
            $this->db->where($where_administrasi)->delete('sm_tarif_tindakan_pasien');
            $this->deletePembayaranRawatInap($id_layanan_pendaftaran, $cek_administrasi->total, $cek_administrasi->reimburse);
        endif;

        $no_polish = NULL;
        if ($data_layanan_pendaftaran->no_polish !== '') {
            $no_polish = $data_layanan_pendaftaran->no_polish;
        }

        $data_update = array(
            'id_layanan_pendaftaran' => $id_layanan_pendaftaran,
            'tanggal' => $this->datetime,
            'id_operator' => NULL,
            'id_penjamin' => $penjamin,
            'no_polish' => $no_polish,
            'id_tarif_pelayanan' => 139,
            'jasa_klinik' => $administrasi,
            'jasa_medis' => 0,
            'bobot' => 0,
            'bhp' => 0,
            'total' => $administrasi,
            'reimburse' => $reimburse
        );

        $jenis_transaksi = 'Rawat Inap';
        $this->db->insert('sm_tarif_tindakan_pasien', $data_update);
        $this->updatePembayaran($data_layanan_pendaftaran->id_pendaftaran, $id_layanan_pendaftaran, $id_layanan_pendaftaran, $jenis_transaksi, $administrasi, $reimburse);

        if ($this->db->trans_status() === false) :
            $this->db->trans_rollback();
            $result['status'] = false;
            $result['token']  = $this->security->get_csrf_hash();
        else :
            $this->db->trans_commit();
            $result['status'] = true;
            $result['token']  = $this->security->get_csrf_hash();
        endif;

        return $result;
    }


    function simpanOrderRawatInap($data)
    {
        $count = $this->db->select('count(*) as jumlah')->from('sm_order_rawat_inap')->where('id_pendaftaran', $data['id_pendaftaran'], true)->where('status', 'request')->get()->row()->jumlah;
        $status = false;
        if ($count < 1) :
            $this->db->insert('sm_order_rawat_inap', $data);
            $status = true;
        endif;

        return $status;
    }

    function simpanOrderIntensiveCare($data)
    {
        $count = $this->db->select('count(*) as jumlah')->from('sm_order_intensive_care')->where('id_pendaftaran', $data['id_pendaftaran'], true)->where('status', 'request')->get()->row()->jumlah;
        $status = false;
        if ($count < 1) :
            $this->db->insert('sm_order_intensive_care', $data);
            $status = true;
        endif;

        return $status;
    }

    function insertResumeDiagnosa($id_pendaftaran)
    {
        $query = $this->db->select('dg.id')->from('sm_diagnosa as dg')
            ->join('sm_layanan_pendaftaran as lp', 'lp.id = dg.id_layanan_pendaftaran')
            ->where('lp.id_pendaftaran', $id_pendaftaran, true)
            ->where('dg.prioritas', 'Utama', true)
            ->where('dg.post', '1', true)
            ->order_by('lp.id', 'desc')
            ->limit('1, 0')
            ->get()
            ->row();
        $id_diag = NULL;
        if ($query) :
            $id_diag = $query->id;
        endif;
        $insert = array('id' => $id_pendaftaran, 'id_diagnosa' => $id_diag);
        $this->db->where('id', $id_pendaftaran)->update('sm_resume_kunjungan', $insert);
    }

    function pembatalanStatusKeluar($id_pendaftaran, $id_layanan_pendaftaran)
    {
        $this->db->trans_begin();
        $message = '';
        $layanan_pendaftaran = $this->db->select(array("tindak_lanjut"))->where("id", $id_layanan_pendaftaran)->get("sm_layanan_pendaftaran")->row();
        $pendaftaran = array('tanggal_keluar' => NULL, 'kondisi_keluar' => 'Hidup');
        $this->db->where("id", $id_pendaftaran)->update("sm_pendaftaran", $pendaftaran);
        $data_lanjut = array(
            'tindak_lanjut' => NULL,
            'tindak_lanjut_sementara' => NULL,
            'kondisi' => 'Hidup',
            'tanggal_batal_keluar' => $this->datetime
        );
        $this->updateTindakLanjut($id_layanan_pendaftaran, $data_lanjut);
        $data_ranap = $this->db->where("id_layanan_pendaftaran", $id_layanan_pendaftaran)->get("sm_rawat_inap")->row();
        if ($data_ranap) :
            $pendaftaran = array("waktu_keluar" => NULL, "checkout" => 0);
            $this->db->where("id", $data_ranap->id)->update("sm_rawat_inap", $pendaftaran);
        // masih belum selesai untuk rawat inap
        endif;

        $ranap = $this->db->select("ri.id, ri.id_layanan_pendaftaran, ri.id_bed, p.kelamin")->from("sm_rawat_inap as ri")
            ->join("sm_layanan_pendaftaran as lp", "lp.id = ri.id_layanan_pendaftaran")
            ->join("sm_pendaftaran as pd", "pd.id = lp.id_pendaftaran")
            ->join("sm_pasien as p", "p.id = pd.id_pasien")->where("ri.id_layanan_pendaftaran", $id_layanan_pendaftaran, true)->get()->row();
        if ($ranap) :
            $update = array("keterangan" => "Terpakai", "penghuni" => $ranap->kelamin);
            $this->db->where("id", $ranap->id_bed)->update("sm_bed", $update);
        endif;

        // 139 adalah id tarif pelayanan Administrasi Rawat Inap
        $where_admin = array("id_layanan_pendaftaran" => $id_layanan_pendaftaran, 'id_tarif_pelayanan' => 139);
        $admin = $this->db->where($where_admin)->get("sm_tarif_tindakan_pasien")->row();
        if ($admin) :
            $this->db->where($where_admin)->delete("sm_tarif_tindakan_pasien");
        endif;

        $this->db->where("id_layanan_pendaftaran", $id_layanan_pendaftaran)->delete("sm_order_rawat_inap");
        if ($this->db->trans_status() === false) :
            $this->db->trans_rollback();
            $status = false;
            $message = "Gagal melakukan pembatalkan status keluar";
        else :
            $this->db->trans_commit();
            $status = true;
            $message = "Berhasil melakukan pembatalkan status keluar";
        endif;

        $this->db->where("id_layanan_pendaftaran", $id_layanan_pendaftaran)->delete("sm_order_intensive_care");
        if ($this->db->trans_status() === false) :
            $this->db->trans_rollback();
            $status = false;
            $message = "Gagal melakukan pembatalan status keluar";
        else :
            $this->db->trans_commit();
            $status = true;
            $message = "Berhasil melakukan pembatalan status keluar";
        endif;

        return array("status" => $status, "message" => $message, "tindak_lanjut" => $layanan_pendaftaran->tindak_lanjut);
    }

    function pembatalanStatusKeluarIcare($id_pendaftaran, $id_layanan_pendaftaran)
    {
        $this->db->trans_begin();
        $message = '';
        $layanan_pendaftaran = $this->db->select(array("tindak_lanjut"))->where("id", $id_layanan_pendaftaran)->get("sm_layanan_pendaftaran")->row();
        $pendaftaran = array('tanggal_keluar' => NULL, 'kondisi_keluar' => 'Hidup');
        $this->db->where("id", $id_pendaftaran)->update("sm_pendaftaran", $pendaftaran);
        $data_lanjut = array(
            'tindak_lanjut' => NULL,
            'kondisi' => 'Hidup',
            'tanggal_batal_keluar' => $this->datetime
        );
        $this->updateTindakLanjut($id_layanan_pendaftaran, $data_lanjut);
        $data_icare = $this->db->where("id_layanan_pendaftaran", $id_layanan_pendaftaran)->get("sm_intensive_care")->row();
        if ($data_icare) :
            $pendaftaran = array("waktu_keluar" => NULL, "checkout" => 0);
            $this->db->where("id", $data_icare->id)->update("sm_intensive_care", $pendaftaran);
        // masih belum selesai untuk intensive care
        endif;

        $icare = $this->db->select("ri.id, ri.id_layanan_pendaftaran, ri.id_bed, p.kelamin")->from("sm_intensive_care as ri")
            ->join("sm_layanan_pendaftaran as lp", "lp.id = ri.id_layanan_pendaftaran")
            ->join("sm_pendaftaran as pd", "pd.id = lp.id_pendaftaran")
            ->join("sm_pasien as p", "p.id = pd.id_pasien")->where("ri.id_layanan_pendaftaran", $id_layanan_pendaftaran, true)->get()->row();
        if ($icare) :
            $update = array("keterangan" => "Terpakai", "penghuni" => $icare->kelamin);
            $this->db->where("id", $icare->id_bed)->update("sm_bed", $update);
        endif;

        // 1511 adalah id tarif pelayanan Administrasi Intensive Care
        $where_admin = array("id_layanan_pendaftaran" => $id_layanan_pendaftaran, 'id_tarif_pelayanan' => 1511);
        $admin = $this->db->where($where_admin)->get("sm_tarif_tindakan_pasien")->row();
        if ($admin) :
            $this->db->where($where_admin)->delete("sm_tarif_tindakan_pasien");
        endif;

        $this->db->where("id_layanan_pendaftaran", $id_layanan_pendaftaran)->delete("sm_order_intensive_care");
        if ($this->db->trans_status() === false) :
            $this->db->trans_rollback();
            $status = false;
            $message = "Gagal melakukan pembatalkan status keluar";
        else :
            $this->db->trans_commit();
            $status = true;
            $message = "Berhasil melakukan pembatalkan status keluar";
        endif;

        $this->db->where("id_layanan_pendaftaran", $id_layanan_pendaftaran)->delete("sm_order_intensive_care");
        if ($this->db->trans_status() === false) :
            $this->db->trans_rollback();
            $status = false;
            $message = "Gagal melakukan pembatalan status keluar";
        else :
            $this->db->trans_commit();
            $status = true;
            $message = "Berhasil melakukan pembatalan status keluar";
        endif;

        return array("status" => $status, "message" => $message, "tindak_lanjut" => $layanan_pendaftaran->tindak_lanjut);
    }


    function pembatalanKonsulKlinik($id_pendaftaran, $id_layanan_pendaftaran)
    {
        $this->db->trans_begin();
        $pendaftaran = array(
            'tanggal_keluar' => date('Y-m-d H:i:s'),
            'kondisi_keluar' => 'Hidup',
        );
        $this->db->where("id", $id_pendaftaran)->update("sm_pendaftaran", $pendaftaran);

        $data_lanjut = array(
            'konsul'    => 0,
            'status_terlayani' => 'Batal',
            'tindak_lanjut' => 'Batal Konsul'
        );
        $this->db->where("id", $id_layanan_pendaftaran, true)->update('sm_layanan_pendaftaran', $data_lanjut);

        if ($this->db->trans_status() === false) :
            $this->db->trans_rollback();
            $status = false;
        else :
            $this->db->trans_commit();
            $status = true;
        endif;

        return $status;
    }

    function insertAdministrasiIntensiveCare($id_pendaftaran, $id_layanan_pendaftaran)
    {
        $this->db->trans_begin();
        $this->load->model('keuangan/Keuangan_model', 'm_keuangan');
        $sql = "select lp.*, pj.diskon, bg.nama as bangsal 
                from sm_layanan_pendaftaran as lp 
                join sm_intensive_care as ri on (ri.id_layanan_pendaftaran = lp.id) 
                join sm_bangsal as bg on (bg.id = ri.id_bangsal) 
                left join sm_penjamin as pj on (pj.id = lp.id_penjamin) 
                where lp.id = '" . $id_layanan_pendaftaran . "'";
        $data_layanan_pendaftaran = $this->db->query($sql)->row();
        $totalBilling = $this->m_keuangan->getTotalPenagihanTanpaDiskon($id_pendaftaran);
        $administrasi = 5 / 100 * (float) $totalBilling;

        if (1500000 < $administrasi) :
            $administrasi = 1500000;
        endif;
        $administrasi = ceil($administrasi);

        $penjamin = NULL;
        if ($data_layanan_pendaftaran->id_penjamin !== NULL) :
            $penjamin = $data_layanan_pendaftaran->id_penjamin;
            $reimburse = (int) $data_layanan_pendaftaran->diskon / 100 * $administrasi;
        else :
            $reimburse = 0;
        endif;

        // 1511 id tarif pelayanan administrasi intensive care
        $where_administrasi = array('id_layanan_pendaftaran' => $id_layanan_pendaftaran, 'id_tarif_pelayanan' => 1511);
        $cek_administrasi = $this->db->where($where_administrasi)->get('sm_tarif_tindakan_pasien')->row();
        if (0 < count((array)$cek_administrasi)) :
            $this->db->where($where_administrasi)->delete('sm_tarif_tindakan_pasien');
            $this->deletePembayaranIntensiveCare($id_layanan_pendaftaran, $cek_administrasi->total, $cek_administrasi->reimburse);
        endif;

        $no_polish = NULL;
        if ($data_layanan_pendaftaran->no_polish !== '') {
            $no_polish = $data_layanan_pendaftaran->no_polish;
        }

        $data_update = array(
            'id_layanan_pendaftaran' => $id_layanan_pendaftaran,
            'tanggal' => $this->datetime,
            'id_operator' => NULL,
            'id_penjamin' => $penjamin,
            'no_polish' => $no_polish,
            'id_tarif_pelayanan' => 1511,
            'jasa_klinik' => $administrasi,
            'jasa_medis' => 0,
            'bobot' => 0,
            'bhp' => 0,
            'total' => $administrasi,
            'reimburse' => $reimburse
        );

        $jenis_transaksi = 'Intensive Care';
        $this->db->insert('sm_tarif_tindakan_pasien', $data_update);
        $this->updatePembayaran($data_layanan_pendaftaran->id_pendaftaran, $id_layanan_pendaftaran, $id_layanan_pendaftaran, $jenis_transaksi, $administrasi, $reimburse);

        if ($this->db->trans_status() === false) :
            $this->db->trans_rollback();
            $result['status'] = false;
            $result['token']  = $this->security->get_csrf_hash();
        else :
            $this->db->trans_commit();
            $result['status'] = true;
            $result['token']  = $this->security->get_csrf_hash();
        endif;

        return $result;
    }

    function cekPenjaminanTarif($id_tarif, $id_penjamin)
    {
        $where = '';
        if ($id_penjamin !== NULL) {
            $where = " and tp.id_penjamin = '" . $id_penjamin . "'";
        }

        $sql = "select count(*) as jumlah from sm_tarif_pelayanan kt
                join sm_tarif_penjamin tp on (tp.id_tarif = kt.id)
                where kt.id = '" . $id_tarif . "'" . $where . "";

        return $this->db->query($sql)->row();

        $this->db->close();
    }

    function cek_penjaminan_tarif($id_tarif, $id_penjamin)
    {
        $where = '';
        if ($id_penjamin !== NULL) {
            $where = " and tp.id_penjamin = '" . $id_penjamin . "'";
        }

        $sql = "select count(*) as jumlah from sm_tarif_pelayanan kt
                join sm_tarif_penjamin tp on (tp.id_tarif = kt.id)
                where kt.id = '" . $id_tarif . "'" . $where . "";

        $jumlah = $this->db->query($sql)->row()->jumlah;
        $this->db->close();
        return $jumlah;
    }

    function getKategoriPasien($kelamin, $tanggal_lahir)
    {
        $kategori = $kelamin;
        if (is_anak($tanggal_lahir)) {
            $kategori = "A";
        }
        return $kategori;
    }

    function get_item_laboratorium_by_layanan($id_layanan)
    {
        $data = $this->db->where('id_layanan', $id_layanan)->get('sm_item_laboratorium')->result();
        return $data;
    }

    function getItemPemeriksaanLaboratorium($id_laboratorium)
    {
        $data = array();
        $sql = "select dl.*, l.nama as layanan_laboratorium , l.id as id_layanan 
                from sm_detail_laboratorium dl 
                join sm_tarif_pelayanan kt on (kt.id = dl.id_tarif) 
                join sm_layanan l on (l.id = kt.id_layanan) 
                where dl.id_laboratorium = '" . $id_laboratorium . "' 
                group by dl.id, l.nama, l.id";
        $detail = $this->db->query($sql)->result();
        foreach ($detail as $key => $value) {
            $sql_item = "select idlab.*, 
                        COALESCE(nnl.nilai_normal, '') as nilai_normal,
                        COALESCE(st.nama, '') as satuan 
                        from sm_item_detail_laboratorium as idlab
                        left join sm_nilai_normal_lab as nnl on (nnl.id_item_laboratorium = idlab.id_item_laboratorium)
                        left join sm_satuan as  st on (st.id = idlab.id_satuan) 
                        where idlab.id_detail_laboratorium = " . $value->id . " 
                        group by idlab.id, nnl.nilai_normal, st.nama";
            $data[$key]["id"] = $value->id;
            $data[$key]["layanan"] = $value->layanan_laboratorium;
            $data[$key]["item"] = $this->db->query($sql_item)->result();
        }
        $this->db->close();
        return $data;
    }

    function getAutoTarifPelayanan($q, $jenis_pemeriksaan, $jenis_tindakan, $jenis_lab, $kelas, $start, $limit)
    {
        $limit = " limit " . $limit . " offset " . $start;
        $where = "";
        if ($jenis_pemeriksaan !== "") :
            $where .= " and jp.nama = '" . $jenis_pemeriksaan . "' ";
        endif;
        if ($jenis_tindakan !== "") :
            $where .= " and tp.jenis = '" . $jenis_tindakan . "' ";
        endif;
        if ($jenis_lab !== "") :
            $where .= " and l.jenis_lab = '" . $jenis_lab . "' ";
        endif;
        if ($kelas !== "") :
            $where .= " and (tp.id_kelas = '" . $kelas . "' or tp.id_kelas is null) ";
        endif;

        $select = "select tp.*, CASE WHEN tp.jenis IS NULL THEN ('') ELSE tp.jenis END as jenis, jp.nama as jenis_pemeriksaan,
                case when ll.nama is not null then concat_ws(', ', l.nama, concat_ws('', '<i>',ll.nama,'</i>'), tp.keterangan) else concat_ws(', ', l.nama, tp.keterangan) end as layanan, 
                coalesce(un.nama, '<i>Semua Instalasi</i>') as unit, COALESCE(k.nama, '') as kelas ";
        $count = "select count(tp.id) as count ";
        $sql = "from sm_tarif_pelayanan as tp 
                left join sm_layanan as l on (l.id = tp.id_layanan) 
                left join sm_layanan as ll on (ll.id = l.id_parent) 
                left join sm_jenis_pemeriksaan as jp on (jp.id = l.id_jenis_pemeriksaan) 
                left join sm_unit as un on (un.id = tp.id_unit) 
                left join sm_kelas as k on (k.id = tp.id_kelas) 
                where tp.id is not null " . $where . " and tp.is_active = '1' and l.nama ilike ('%" . $q . "%') ";
        $order = " order by l.nama";
        $data['data'] = $this->db->query($select . $sql . $order . $limit)->result();
        $data['total'] = $this->db->query($count . $sql)->row()->count;
        return $data;
    }



    function add_order_laboratorium($data)
    {
        if ($data) {
            if ($data['jenis'] == "'292'") {
                $data['jenis'] = "'Patologi Klinik'";
            }
            if ($data['jenis'] == "'293'") {
                $data['jenis'] = "'Patologi Anatomi'";
            }
            if ($data['jenis'] == "'298'") {
                $data['jenis'] = "'Mikrobiologi'";
            }
            $this->db->insert('sm_order_laboratorium', $data, false);
        }
    }

    function daftar_order_lab($data)
    {

        $this->db->insert('sm_order_laboratorium', $data, false);
        return $this->db->insert_id();
    }

    function respon_order_lab($data)
    {

        $this->db->insert('sm_jenis_lab', $data, false);
    }

    function update_response_laboratorium($data, $id)
    {
        $this->db->trans_begin();
        if ($id !== '') :
            $this->db->where('id', $id, true)->update('sm_jenis_lab', $data);
        endif;
        if ($this->db->trans_status() === false) :
            $this->db->trans_rollback();
            return array('status' => false, 'message' => 'Gagal update response LIS');
        else :
            $this->db->trans_commit();
            return array('status' => true, 'message' => 'Berhasil memperbaharui response LIS');
        endif;
    }

    function delete_rspn_laboratorium($data)
    {

        $this->db->insert('sm_jenis_lab_delete', $data, false);
    }

    function update_rspn_laboratorium($data, $id)
    {
        $this->db->trans_begin();
        if ($id !== '') :
            $this->db->where('id', $id, true)->update('sm_jenis_lab_delete', $data);
        endif;
        if ($this->db->trans_status() === false) :
            $this->db->trans_rollback();
            return array('status' => false, 'message' => 'Gagal update response LIS');
        else :
            $this->db->trans_commit();
            return array('status' => true, 'message' => 'Berhasil memperbaharui response LIS');
        endif;
    }

    function update_order_laboratorium($data, $id)
    {
        $this->db->trans_begin();
        if ($id !== '') :
            $this->db->where('id', $id, true)->update('sm_order_laboratorium', $data);
        endif;
        if ($this->db->trans_status() === false) :
            $this->db->trans_rollback();
            return array('status' => false, 'message' => 'Gagal memperbaharui nomer ono');
        else :
            $this->db->trans_commit();
            return array('status' => true, 'message' => 'Berhasil memperbaharui nomer ono');
        endif;
    }

    function getAutoTarifPelayananLab($q, $jenis_pemeriksaan, $jenis_tindakan, $kelas, $start, $limit)
    {
        $limit = " limit " . $limit . " offset " . $start;
        $where = "";
        if ($jenis_pemeriksaan !== "") :
            $where .= " and jp.nama = '" . $jenis_pemeriksaan . "' ";
        endif;
        if ($jenis_tindakan !== "") :
            $where .= " and tp.jenis = '" . $jenis_tindakan . "' ";
        endif;
        if ($kelas !== "") :
            $where .= " and (tp.id_kelas = '" . $kelas . "' or tp.id_kelas is null) ";
        endif;

        $select = "select tp.*, CASE WHEN tp.jenis IS NULL THEN ('') ELSE tp.jenis END as jenis, jp.nama as jenis_pemeriksaan,
                case when ll.nama is not null then concat_ws(', ', l.nama, concat_ws('', '<i>',ll.nama,'</i>'), tp.keterangan) else concat_ws(', ', l.nama, tp.keterangan) end as layanan, 
                coalesce(un.nama, '<i>Semua Instalasi</i>') as unit, COALESCE(k.nama, '') as kelas ";
        $count = "select count(tp.id) as count ";
        $sql = "from sm_tarif_pelayanan as tp 
                join sm_layanan as l on (l.id = tp.id_layanan) 
                left join sm_layanan as ll on (ll.id = l.id_parent) 
                left join sm_jenis_pemeriksaan as jp on (jp.id = l.id_jenis_pemeriksaan) 
                left join sm_unit as un on (un.id = tp.id_unit) 
                left join sm_kelas as k on (k.id = tp.id_kelas) 
                where tp.id is not null " . $where . " and tp.is_active = '1' and l.nama ilike ('%" . $q . "%') and l.id_jenis_pemeriksaan = 9 ";
        $order = " order by l.nama";
        $data['data'] = $this->db->query($select . $sql . $order . $limit)->result();
        $data['total'] = $this->db->query($count . $sql)->row()->count;
        return $data;
    }




    function get_pemeriksaan_laboratorium($id, $param)
    {
        $sql = "select lb.* , lp.id_pendaftaran, lp.jenis_layanan,
                null as detail,
                COALESCE(pgal.nama, '') as lab_analis,
                COALESCE(pgdk.nama, '') as dokter,
                COALESCE(pgdpj.nama, '') as dokter_pjwb,
                COALESCE(pgan.nama, '') as analis_lab,
                pgdpj.nip as nip_dokter_pjwb, dpj.no_sip as nomer_sip,
                'konfirm' as status
                from sm_laboratorium lb
                left join sm_layanan_pendaftaran lp on (lp.id = lb.id_layanan_pendaftaran)
                left join sm_pegawai pgal on (pgal.id = lb.analis)
                left join sm_tenaga_medis dk on (dk.id = lb.id_dokter)
                left join sm_pegawai pgdk on (pgdk.id = dk.id_pegawai)
                left join sm_tenaga_medis dpj on (dpj.id = lb.id_dokter_pjwb)
                left join sm_pegawai pgdpj on (pgdpj.id = dpj.id_pegawai)
                left join sm_tenaga_medis an on (an.id = lb.id_analis)
                left join sm_pegawai pgan on (pgan.id = an.id_pegawai)";
        if ($param === "list") {
            $w = " where lb.id_layanan_pendaftaran = '" . $id . "' ";
            return $this->db->query($sql . $w)->result();
        }
        $w = " where lb.id = '" . $id . "' ";
        return $this->db->query($sql . $w)->row();
    }

    function get_pemeriksaan_laboratorium_list($id, $param)
    {
        $sql = "select sl.* , slp.id_pendaftaran, slp.jenis_layanan,
                null as detail,
                COALESCE(sp.nama, '') as lab_analis,
                COALESCE(sp2.nama, '') as dokter,
                COALESCE(sp3.nama, '') as dokter_pjwb,
                COALESCE(sp4.nama, '') as analis_lab,
                sp3.nip as nip_dokter_pjwb, stm2.no_sip as nomer_sip,
                'konfirm' as status
            from sm_laboratorium as sl
            left join sm_layanan_pendaftaran slp on sl.id_layanan_pendaftaran = slp.id
            left join sm_pegawai sp on sl.analis = sp.id
            left join sm_tenaga_medis stm on slp.id_dokter = stm.id
            left join sm_pegawai sp2 on stm.id_pegawai = sp2.id
            left join sm_tenaga_medis stm2 on sl.id_dokter_pjwb = stm2.id
            left join sm_pegawai sp3 on stm2.id_pegawai = sp3.id
            left join sm_tenaga_medis stm3 on sl.id_analis = stm3.id
            left join sm_pegawai sp4 on stm3.id_pegawai = sp4.id
            where slp.id_pendaftaran = $id";
        return $this->db->query($sql)->result();
    }

    function get_pemeriksaan_laboratorium_detail($id_laboratorium)
    {
        $data = array();
        $sql = "select dl.* ,lpr.nama as parent, l.nama as layanan_lab,
        case when lb.waktu_hasil is null then 'Konfirm' else 'Diperiksa' end as konfirmasi
        from sm_detail_laboratorium dl
        join sm_laboratorium lb on (lb.id = dl.id_laboratorium)
        join sm_tarif_pelayanan kt on (kt.id = dl.id_tarif)
        join sm_layanan l on (l.id = kt.id_layanan)
        join sm_layanan lpr on (lpr.id = l.id_parent)
        where dl.id_laboratorium = '" . $id_laboratorium . "'
        order by lpr.id";
        $detail = $this->db->query($sql)->result();
        $this->db->close();
        $parent = "";
        foreach ($detail as $key => $value) {
            if ($key == 0) {
                $parent = $value->parent;
            }
            if ($parent !== $value->parent) {
                $parent = $value->parent;
            }
            $data[$parent][] = $value;
        }
        return $data;
    }

    function get_request_laboratorium($id_layanan_pendaftaran)
    {
        $sql = "select ol.*, jl.status as status_lab, ol.id as no_id_lab, null as waktu_hasil, null as detail,
                COALESCE(pg.nama, '') as dokter, ol.waktu_order as waktu_konfirm, lp.tindak_lanjut,
                '' as analis_lab
                from sm_order_laboratorium ol
                left join sm_layanan_pendaftaran lp on (lp.id = ol.id_layanan_pendaftaran)
                left join sm_jenis_lab jl on (jl.id_lab = ol.id)
                left join sm_tenaga_medis dk on (dk.id = ol.id_dokter)
                left join sm_pegawai pg on (pg.id = dk.id_pegawai)
                where ol.id_layanan_pendaftaran = '" . $id_layanan_pendaftaran . "'
                and ol.status = 'request' ";
        $data = $this->db->query($sql)->result();

        foreach ($data as $k => $order) {
            $item = json_decode($order->item);
            $detail = array();

            foreach ($item as $key => $value) {
                $sql = "select lpr.nama as parent, l.nama as layanan_lab,
                        'Order' as konfirmasi
                        from sm_tarif_pelayanan kt
                        join sm_layanan l on (l.id = kt.id_layanan)
                        left join sm_layanan lpr on (lpr.id = l.id_parent)
                        where kt.id = '" . $value->item . "'
                        order by lpr.id";
                $detail[] = $this->db->query($sql)->row();
            }
            $parent = "";
            $data_order = array();
            foreach ($detail as $key => $value) {
                if (0 < count((array)$value)) {
                    if ($key == 0) {
                        $parent = $value->parent;
                    }
                    if ($parent !== $value->parent) {
                        $parent = $value->parent;
                    }
                    $data_order[$parent][] = $value;
                }
            }
            $order->detail = $data_order;
        }
        $this->db->close();
        return $data;
    }

    function get_request_order_lab($id_layanan_pendaftaran)
    {
        $sql = "select ol.*, ol.id as no_id_lab, null as waktu_hasil, ol.waktu_order as waktu_konfirm, sjl.status as respon_lab
                from sm_order_laboratorium ol
                left join sm_jenis_lab sjl on (sjl.id_lab = ol.id)
                where ol.id_layanan_pendaftaran = '" . $id_layanan_pendaftaran . "' order by ol.id ";
        $data = $this->db->query($sql)->result();

        $this->db->close();
        return $data;
    }

    function get_pemeriksaan_response_laboratorium($id_laboratorium)
    {
        $data = array();
        $sql = "select dl.* ,lpr.nama as parent, l.nama as layanan_lab,
        case when lb.waktu_hasil is null then 'Konfirm' else 'Diperiksa' end as konfirmasi
        from sm_detail_laboratorium dl
        join sm_laboratorium lb on (lb.id = dl.id_laboratorium)
        join sm_tarif_pelayanan kt on (kt.id = dl.id_tarif)
        join sm_layanan l on (l.id = kt.id_layanan)
        join sm_layanan lpr on (lpr.id = l.id_parent)
        where lb.id_order_laboratorium = '" . $id_laboratorium . "'
        order by lpr.id";
        $detail = $this->db->query($sql)->result();
        $this->db->close();
        $parent = "";
        foreach ($detail as $key => $value) {
            if ($key == 0) {
                $parent = $value->parent;
            }
            if ($parent !== $value->parent) {
                $parent = $value->parent;
            }
            $data[$parent][] = $value;
        }
        return $data;
    }

    function get_request_response_laboratorium($id_lab)
    {
        $sql = "select ol.*, jl.status as status_lab, ol.id as no_id_lab, null as waktu_hasil, null as detail,
                COALESCE(pg.nama, '') as dokter, ol.waktu_order as waktu_konfirm,
                '' as analis_lab
                from sm_order_laboratorium ol
                left join sm_jenis_lab jl on (jl.id_lab = ol.id)
                left join sm_tenaga_medis dk on (dk.id = ol.id_dokter)
                left join sm_pegawai pg on (pg.id = dk.id_pegawai)
                where ol.id = '" . $id_lab . "' ";
        $data = $this->db->query($sql)->result();

        foreach ($data as $k => $order) {
            $item = json_decode($order->item);
            $detail = array();

            foreach ($item as $key => $value) {
                $sql = "select lpr.nama as parent, l.nama as layanan_lab,
                        'Order' as konfirmasi
                        from sm_tarif_pelayanan kt
                        join sm_layanan l on (l.id = kt.id_layanan)
                        left join sm_layanan lpr on (lpr.id = l.id_parent)
                        where kt.id = '" . $value->item . "'
                        order by lpr.id";
                $detail[] = $this->db->query($sql)->row();
            }
            $parent = "";
            $data_order = array();
            foreach ($detail as $key => $value) {
                if (0 < count((array)$value)) {
                    if ($key == 0) {
                        $parent = $value->parent;
                    }
                    if ($parent !== $value->parent) {
                        $parent = $value->parent;
                    }
                    $data_order[$parent][] = $value;
                }
            }
            $order->detail = $data_order;
        }
        $this->db->close();
        return $data;
    }

    function get_order_laboratorium($id_lab)
    {
        $sql = "select ol.*, lp.jenis_layanan, sp.nama as nama_dokter
                from sm_order_laboratorium ol
                left join sm_layanan_pendaftaran lp on (lp.id = ol.id_layanan_pendaftaran)
                left join sm_tenaga_medis tm on (tm.id = ol.id_dokter)
                left join sm_pegawai sp on (tm.id_pegawai = sp.id)
                where ol.id = '" . $id_lab . "' ";
        $data = $this->db->query($sql)->row();

        $this->db->close();
        return $data;
    }

    function cetak_pemeriksaan_laboratorium_detail($id_laboratorium)
    {
        $data = array();
        $sql = "select dl.id, null as item_lab,
                CASE WHEN lproot.nama is not null THEN lproot.nama ELSE lpr.nama END as root,
                CASE WHEN lproot.nama is not null THEN lpr.nama ELSE l.nama END as child,
                CASE WHEN lproot.nama is not null THEN l.nama ELSE null END as child2
                from sm_detail_laboratorium dl
                join sm_tarif_pelayanan tp on (tp.id = dl.id_tarif)
                join sm_layanan l on (l.id = tp.id_layanan)
                join sm_layanan lpr on (lpr.id = l.id_parent)
                left join sm_layanan lproot on (lproot.id = lpr.id_parent)
                where dl.id_laboratorium = '" . $id_laboratorium . "'
                order by dl.id";
        $detail = $this->db->query($sql)->result();
        $root = "";
        $child = "";
        $n_child = 0;
        $child2_before = "";
        $item_lab_before = array();
        foreach ($detail as $key => $value) {
            $sql_item = "select idl.*, COALESCE(st.nama, '') as satuan,
                        COALESCE(nr.nilai_normal, '') as nilai_normal
                        from sm_item_detail_laboratorium idl
                        left join sm_item_laboratorium il on (il.id = idl.id_item_laboratorium)
                        left join sm_satuan st on (idl.id_satuan = st.id)
                        left join sm_nilai_normal_lab nr on (nr.id_item_laboratorium = il.id)
                        where idl.id_detail_laboratorium = '" . $value->id . "'
                        group by idl.id, st.nama, nr.nilai_normal";
            if ($key == 0) {
                $root = $value->root;
                $child = $value->child;
            }
            if ($root !== $value->root) {
                $root = $value->root;
            }
            $n_child = $key;
            $child = $value->child;

            if (isset($data[$root][$n_child]->item)) {
                if ($child2_before === $value->child2) {
                    $value->item_lab = $item_lab_before;
                    $buf = $this->db->query($sql_item)->result();
                    foreach ($buf as $k => $bb) {
                        array_push($value->item_lab, $bb);
                    }
                    $item_lab_before = $value->item_lab;
                } else {
                    $value->item_lab = $this->db->query($sql_item)->result();
                    $item_lab_before = $value->item_lab;
                }
                if ($value->child2 === NULL) {
                    $data[$root][$n_child]->item = $value;
                } else {
                    $data[$root][$n_child]->item[$value->child2] = $value;
                }
            } else {
                $detail = NULL;
                if ($value->child2 === NULL) {
                    $item = NULL;
                    $value->item_lab = $this->db->query($sql_item)->result();
                    $item_lab_before = $value->item_lab;
                    $detail = $value;
                } else {
                    $value->item_lab = $this->db->query($sql_item)->result();
                    $item_lab_before = $value->item_lab;
                    $item = array($value->child2 => $value);
                }
                $data[$root][$n_child] = (object) array("layanan" => $child, "item" => $item, "detail" => $detail);
            }
            $child2_before = $value->child2;
        }
        return $data;
    }

    function cetak_pemeriksaan_laboratorium_pa_detail($id_laboratorium)
    {
        $query = $this->db->where("id_laboratorium", $id_laboratorium)->get("sm_hasil_laboratorium_pa")->row();
        $this->db->close();
        return $query;
    }
    // end laboratorium




    // Radiologi
    function add_order_radiologi($data)
    {
        return $this->db->insert('sm_order_radiologi', $data, false);
    }

    function get_pemeriksaan_radiologi($id, $param)
    {
        $sql = "select rd.* , lp.id_pendaftaran,
                null as detail,
                COALESCE(pgdk.nama, '') as dokter,
                COALESCE(pgdpj.nama, '') as dokter_pjwb,
                COALESCE(pgan.nama, '') as radiografer,
                ord.waktu_order,
                pgdpj.nip as nip_dokter_pjwb,
                'konfirm' as status
                from sm_radiologi rd
                join sm_layanan_pendaftaran lp on (lp.id = rd.id_layanan_pendaftaran)
                left join sm_tenaga_medis dk on (dk.id = rd.id_dokter)
                left join sm_pegawai pgdk on (pgdk.id = dk.id_pegawai)
                left join sm_tenaga_medis dpj on (dpj.id = rd.id_dokter_pjwb)
                left join sm_pegawai pgdpj on (pgdpj.id = dpj.id_pegawai)
                left join sm_tenaga_medis an on (an.id = rd.id_radiografer)
                left join sm_pegawai pgan on (pgan.id = an.id_pegawai) 
                left join sm_order_radiologi ord on (ord.id = rd.id_order_radiologi) ";
        if ($param === "list") {
            $w = " where rd.id_layanan_pendaftaran = '" . $id . "' ";
            return $this->db->query($sql . $w)->result();
        }
        $w = " where rd.id = '" . $id . "' ";
        return $this->db->query($sql . $w)->row();
    }

    function get_pemeriksaan_radiologi_detail($id_radiologi)
    {
        $data = array();
        $sql = "select dr.* , rd.kode, lpr.nama as parent, l.nama as layanan_radiologi, lpr.id as id_root,
        coalesce(pgd.nama, '') as dokter,
        coalesce(prad.nama, '') as radiografer,
        case when rd.waktu_hasil is null then 'Konfirm' else 'Diperiksa' end as konfirmasi
        from sm_detail_radiologi dr
        join sm_radiologi rd on (rd.id = dr.id_radiologi)
        join sm_tarif_pelayanan kt on (kt.id = dr.id_tarif)
        join sm_layanan l on (l.id = kt.id_layanan)
        left join sm_layanan lpr on (lpr.id = l.id_parent)
        left join sm_tenaga_medis as tmd on (tmd.id = dr.id_dokter)
        left join sm_pegawai as pgd on (pgd.id = tmd.id_pegawai)
        left join sm_tenaga_medis as tmr on (tmr.id = dr.id_radiografer)
        left join sm_pegawai as pgr on (pgr.id = tmr.id_pegawai)
        left join sm_pegawai as prad on (prad.id = dr.id_radiografer)
        where dr.id_radiologi = '" . $id_radiologi . "'
        order by lpr.id";
        $detail = $this->db->query($sql)->result();
        $this->db->close();
        $parent = "";
        foreach ($detail as $key => $value) {
            if ($key == 0) {
                $parent = $value->parent;
            }
            if ($parent !== $value->parent) {
                $parent = $value->parent;
            }
            $data[$parent][] = $value;
        }
        return $data;
    }

    function get_request_radiologi($id_layanan_pendaftaran)
    {
        $sql = "select ord.*, null as waktu_hasil, null as detail,
                COALESCE(pg.nama, '') as dokter, ord.waktu_order as waktu_konfirm,
                '' as radiografer
                from sm_order_radiologi ord
                left join sm_tenaga_medis dk on (dk.id = ord.id_dokter)
                left join sm_pegawai pg on (pg.id = dk.id_pegawai)
                where ord.id_layanan_pendaftaran = '" . $id_layanan_pendaftaran . "'
                and ord.status = 'request' ";
        $data = $this->db->query($sql)->result();

        foreach ($data as $k => $order) {
            $item = json_decode($order->item);
            $detail = array();

            if ($item !== null) {

                foreach ($item as $key => $value) {
                    $sql = "select lpr.nama as parent, l.nama as layanan_radiologi,
                            'Order' as konfirmasi
                            from sm_tarif_pelayanan kt
                            join sm_layanan l on (l.id = kt.id_layanan)
                            left join sm_layanan lpr on (lpr.id = l.id_parent)
                            where kt.id = '" . $value->item . "'
                            order by lpr.id";
                    $detail[] = $this->db->query($sql)->row();
                }
            }

            $parent = "";
            $data_order = array();
            foreach ($detail as $key => $value) {
                if (0 < count((array)$value)) {
                    if ($key == 0) {
                        $parent = $value->parent;
                    }
                    if ($parent !== $value->parent) {
                        $parent = $value->parent;
                    }
                    $data_order[$parent][] = $value;
                }
            }
            $order->detail = $data_order;
        }
        $this->db->close();
        return $data;
    }

    function getLayananSpesialisasiBefore($id_layanan_pendaftaran)
    {
        $pendaftaran = $this->db->where("id", $id_layanan_pendaftaran)->select(array("id_pendaftaran"))->get("sm_layanan_pendaftaran")->row();
        $sql = "select lp.*, sp.id as id_spesialisasi, sp.nama as spesialisasi 
                from sm_layanan_pendaftaran as lp 
                left join sm_spesialisasi as sp on (sp.id = lp.id_unit_layanan) 
                where lp.id_pendaftaran = '" . $pendaftaran->id_pendaftaran . "' 
                order by lp.id desc ";
        $query = $this->db->query($sql)->result();
        $layanan = NULL;
        $break = false;
        foreach ($query as $i => $value) :
            if ($break) :
                $layanan = $value;
            endif;

            if ($value->id === $id_layanan_pendaftaran) :
                $break = true;
            endif;
        endforeach;

        return $layanan;
    }

    function generateKodePenunjang($table)
    {
        date_default_timezone_set('Asia/Jakarta');
        $format = date("d") . "-" . date("m") . "-" . date("Y");
        $sql = "select kode from " . $table . " where date(waktu_konfirm) = '" . date("Y-m-d") . "' order by id desc limit 1 offset 0";
        $query = $this->db->query($sql)->row();
        if (count((array)$query) < 1) {
            $last_kode = "0001";
        } else {
            $last_kode = ltrim(substr($query->kode, 0, 4), 0) + 1;
        }
        return str_pad($last_kode, 4, "0", STR_PAD_LEFT) . "-" . $format;
    }

    function getDetailRadiologi($id_detail_radiologi)
    {
        $sql = "select dr.*, l.id as id_layanan, l.nama as layanan_radiologi, 
                coalesce(pgd.nama, '') as dokter, 
                coalesce(pgr.nama, '') as radiografer 
                from sm_detail_radiologi as dr 
                join sm_tarif_pelayanan as tp on (tp.id = dr.id_tarif) 
                join sm_layanan as l on (l.id = tp.id_layanan) 
                left join sm_tenaga_medis as tmd on (tmd.id = dr.id_dokter) 
                left join sm_pegawai as pgd on (pgd.id = tmd.id_pegawai) 
                left join sm_tenaga_medis as tmr on (tmr.id = dr.id_radiografer) 
                left join sm_pegawai as pgr on (pgr.id = tmr.id_pegawai) 
                where dr.id =  '" . $id_detail_radiologi . "' ";
        $query = $this->db->query($sql)->row();
        $this->db->close();
        return $query;
    }

    function cetak_pemeriksaan_radiologi_detail($id_radiologi)
    {
        $sql = "select 'general' as tipe, dr.*, l.nama as layanan, 
                COALESCE(pgd.nama, '') as dokter,
                COALESCE(pgr.nama, '') as radiografer, 
                COALESCE(pgd.nip, '') as nip_dokter 
                from sm_detail_radiologi as dr 
                join sm_tarif_pelayanan as tp on (tp.id = dr.id_tarif) 
                join sm_layanan as l on (l.id = tp.id_layanan) 
                left join sm_tenaga_medis as tmd on (tmd.id = dr.id_dokter) 
                left join sm_pegawai as pgd on (pgd.id = tmd.id_pegawai) 
                left join sm_tenaga_medis as tmr on (tmr.id = dr.id_radiografer) 
                left join sm_pegawai as pgr on (pgr.id = tmr.id_pegawai) 
                where dr.id_radiologi = '" . $id_radiologi . "' 
                and l.id_parent not in (1664)
                order by dr.id";
        $detail = $this->db->query($sql)->result();

        $sqlEcho = "select 'echo' as tipe, he.*, pd.id_pasien, pg.nama as tenaga_medis_request, 
                    pga.nama as dokter_penanggung_jawab 
                    from sm_hasil_echo as he 
                    join sm_detail_radiologi dr on (dr.id = he.id_detail_radiologi) 
                    join sm_radiologi as rd on (rd.id = dr.id_radiologi) 
                    join sm_layanan_pendaftaran as lp on (lp.id = rd.id_layanan_pendaftaran)
                    join sm_pendaftaran as pd on (pd.id = lp.id_pendaftaran)
                    left join sm_tenaga_medis as tm on (tm.id = rd.id_dokter) 
                    left join sm_pegawai as pg on (pg.id = tm.id_pegawai) 
                    left join sm_tenaga_medis as tma on (tma.id = rd.id_dokter) 
                    left join sm_pegawai as pga on (pga.id = tma.id_pegawai) 
                    where dr.id_radiologi = '" . $id_radiologi . "'";
        $dataEcho = $this->db->query($sqlEcho)->result();
        $this->db->close();
        foreach ($dataEcho as $data) :
            $row = (object) array(
                'tipe' => $data->tipe,
                'id_detail_radiologi' => $data->id_detail_radiologi,
                'date_tracking' => $data->date_tracking,
                'measurement' => json_decode($data->measurement),
                'finding' => $data->finding,
                'diag_impression' => $data->diag_impression,
                'tenaga_medis_request' => $data->tenaga_medis_request,
                'dokter_penanggung_jawab' => $data->dokter_penanggung_jawab,
                'profil_pasien' => $this->getProfilPasien($data->id_pasien)
            );

            array_push($detail, $row);
        endforeach;

        return $detail;
    }


    // fisioterapi
    function getPemeriksaanFisioterapi($id_layanan_pendaftaran, $param)
    {
        $sql = "select fi.*, lp.id_pendaftaran, 
                (null) as detail, 
                COALESCE(pg.nama, '') as dokter_pjwb, 
                COALESCE(pg.nip, '') as nip_dokter_pjwb, 
                'konfirm' as status 
                from sm_fisioterapi as fi 
                join sm_layanan_pendaftaran as lp on (lp.id = fi.id_layanan_pendaftaran) 
                left join sm_tenaga_medis as tm on (tm.id = fi.id_dokter_pjwb) 
                left join sm_pegawai as pg on (pg.id = tm.id_pegawai) ";
        if ($param === "list") {
            $where = " where fi.id_layanan_pendaftaran = '" . $id_layanan_pendaftaran . "' ";
            return $this->db->query($sql . $where)->result();
        }

        $where = " where fi.id = '" . $id_layanan_pendaftaran . "' ";
        return $this->db->query($sql . $where)->row();
    }

    function getPemeriksaanFisioterapiDetail($id_fisioterapi)
    {
        $data = array();
        $sql = "select df.*, lay.nama as parent, l.nama as layanan_fisio, 
                CASE WHEN fis.waktu_hasil is null THEN 'Konfirm' ELSE 'Diperiksa' END as konfirmasi 
                from sm_detail_fisioterapi as df 
                join sm_fisioterapi as fis on (fis.id = df.id_fisioterapi) 
                join sm_tarif_pelayanan as tp on (tp.id = df.id_tarif) 
                join sm_layanan as l on (l.id = tp.id_layanan) 
                join sm_layanan as lay on (lay.id = l.id_parent) 
                where df.id_fisioterapi = '" . $id_fisioterapi . "' 
                order by lay.id";
        $detail = $this->db->query($sql)->result();
        $parent = "";

        foreach ($detail as $key => $value) {
            if ($key === 0) {
                $parent = $value->parent;
            }

            if ($parent !== $value->parent) {
                $parent = $value->parent;
            }

            $data[$parent][] = $value;
        }

        return $data;
    }

    function getRequestFisioterapi($id_layanan_pendaftaran)
    {
        $sql = "select of.*, 
                (null) as waktu_hasil, 
                (null) as detail, 
                COALESCE(pg.nama, '') as dokter,
                of.waktu_order as waktu_konfirm 
                from sm_order_fisioterapi as of 
                left join sm_tenaga_medis as tm on (tm.id = of.id_dokter) 
                left join sm_pegawai as pg on (pg.id = tm.id_pegawai) 
                where of.id_layanan_pendaftaran = '" . $id_layanan_pendaftaran . "' 
                and of.status = 'request' ";
        $data = $this->db->query($sql)->result();
        foreach ($data as $i => $order) {
            $item = json_decode($order->item);
            $detail = array();
            foreach ($item as $key => $value) {
                $sql = "select lay.nama as parent, l.nama as layanan_fisio, 
                        'Order' as konfirmasi 
                        from sm_tarif_pelayanan as tp 
                        join sm_layanan as l on (l.id = tp.id_layanan) 
                        left join sm_layanan as lay on (lay.id = l.id_parent) 
                        where tp.id = '" . $value->item . "' 
                        order by lay.id";
                $detail[] = $this->db->query($sql)->row();
            }

            $parent = "";
            $dataOrder = array();
            foreach ($detail as $key => $value) {
                if ($key === 0) {
                    $parent = $value->parent;
                }

                if ($parent !== $value->parent) {
                    $parent = $value->parent;
                }

                $dataOrder[$parent][] = $value;
            }

            $order->detail = $dataOrder;
        }

        return $data;
    }

    function simpanOrderFisioterapi($data)
    {
        return $this->db->insert("sm_order_fisioterapi", $data, false);
    }

    function getDetailFisioterapi($id_detail_fisioterapi)
    {
        $sql = "select df.*, l.id as id_layanan, l.nama as layanan_fisio 
                from sm_detail_fisioterapi as df 
                join sm_tarif_pelayanan as tp on (tp.id = df.id_tarif) 
                join sm_layanan as l on (l.id = tp.id_layanan)  
                where df.id =  '" . $id_detail_fisioterapi . "' ";
        $query = $this->db->query($sql)->row();
        $this->db->close();
        return $query;
    }

    function cetakPemeriksaanFisioterapiDetail($id_fisioterapi)
    {
        $data = array();
        $dataDetail = $this->db->select("df.*, l.nama as layanan")->from("sm_detail_fisioterapi as df")->join("sm_tarif_pelayanan as tp", "tp.id = df.id_tarif")->join("sm_layanan as l", "l.id = tp.id_layanan")->where("df.id_fisioterapi", $id_fisioterapi, true)->order_by("df.id")->get()->result();
        $this->db->close();
        return $dataDetail;
    }
    // end fisioterapi

    function getPegawaiNadis($params, $start, $limit)
    {
        $limit = " limit " . $limit . " offset " . $start;
        $q = '';
        if ($params['jenis'] !== '') :
            if ($params['jenis'] === '8') :
                $q .= " and pn.id = '" . $params['jenis'] . "' and pg.id_jabatan = '46' ";
            endif;
            if ($params['jenis'] === '10') :
                $q .= " and pn.id = '" . $params['jenis'] . "' and pg.id_jabatan = '47' ";
            endif;
            if ($params['jenis'] === '11') :
                $q .= " and pn.id = '" . $params['jenis'] . "' and pg.id_jabatan = '51' ";
            endif;
            if ($params['jenis'] === '12') :
                $q .= " and pn.id = '" . $params['jenis'] . "' and pg.id_jabatan = '134' ";
            endif;
            if ($params['jenis'] === '13') :
                $q .= " and pn.id = '" . $params['jenis'] . "' and pg.id_jabatan = '109' ";
            endif;
            if ($params['jenis'] === '14') :
                $q .= " and pn.id = '" . $params['jenis'] . "' and pg.id_jabatan = '133' ";
            endif;
            if ($params['jenis'] === '15') :
                $q .= " and pn.id = '" . $params['jenis'] . "' and pg.id_jabatan = '53' ";
            endif;
            if ($params['jenis'] === '16') :
                $q .= " and pn.id = '" . $params['jenis'] . "' and pg.id_jabatan = '137' ";
            endif;
            if ($params['jenis'] === '18') :
                $q .= " and pn.id = '" . $params['jenis'] . "' and pg.id_jabatan = '54' ";
            endif;
            if ($params['jenis'] === '19') :
                $q .= " and pn.id = '" . $params['jenis'] . "' and pg.id_jabatan = '52' ";
            endif;
            if ($params['jenis'] === '20') :
                $q .= " and pn.id = '" . $params['jenis'] . "' and pg.id_jabatan = '95' ";
            endif;
            if ($params['jenis'] === '21') :
                $q .= " and pn.id = '" . $params['jenis'] . "' and pg.id_jabatan = '103' ";
            endif;
            if ($params['jenis'] === '22') :
                $q .= " and pn.id = '" . $params['jenis'] . "' and pg.id_jabatan = '145' ";
            endif;
        endif;
        $sql   = "select pg.id as id, tm.id as id_medis, pg.nama, coalesce(s.nama, '') as spesialisasi 
                  from sm_pegawai as pg
                  left join sm_jabatan as jbt on (jbt.id = pg.id_jabatan) 
                  left join sm_profesi_nadis as pn on (jbt.id = pn.id_prof)  
                  left join sm_tenaga_medis as tm on (pg.id = tm.id_pegawai) 
                  left join sm_spesialisasi as s on (s.id = tm.id_spesialisasi) 
                  where pg.nama ilike ('%" . $params['q'] . "%') and pg.status = '1' " . $q . " order by pg.nama";
        $data['data'] = $this->db->query($sql . $limit)->result();
        $data['total'] = $this->db->query($sql)->num_rows();
        return $data;
        // $this->db->query($sql . $limit);
        // echo $this->db->last_query(); die;
    }

    // cppt
    function updateCPPT($data)
    {
        $this->db->trans_begin();

        if ($data['id'] === '') :
            unset($data['id']);
            unset($data['history_edit']);
            $data['created_date'] = $this->datetime;
            $this->db->insert('sm_cppt', $data);

            if ($this->db->trans_status() === false) :
                $this->db->trans_rollback();
                $response = array('id_layanan_pendaftaran' => $data['id_layanan_pendaftaran'], 'status' => false, 'message' => 'Gagal Menyimpan Data Catatan Perkembangan Pasien Terintegrasi');
            else :
                $this->db->trans_commit();
                $response = array('id_layanan_pendaftaran' => $data['id_layanan_pendaftaran'], 'status' => true, 'message' => 'Berhasil Menyimpan Data Catatan Perkembangan Pasien Terintegrasi');
            endif;
        else :
            $data['updated_date'] = $this->datetime;
            unset($data['konsul_via_telp']);

            // Query simpan history edit
            $user_log = $this->session->userdata('nama');
            $created_date_log = $this->datetime;

            $sql = "INSERT INTO sm_cppt_log (id_lama, id_layanan_pendaftaran, waktu, id_profesi, subject, objective, assessment, plan, ademi_assesment, id_nadis, ttd_nadis, instruksi_ppa, id_dokter_dpjp, ttd_dokter_dpjp, id_user, created_date, updated_date, waktu_penerima_tbak, id_nadis_tbak, ttd_nadis_tbak, waktu_pemberi_tbak, id_dokter_dpjp_tbak, ttd_dokter_dpjp_tbak, konsul_via_telp, ademi_diag, ademi_interv, ademi_monev, sbar_situation, sbar_background, sbar_assesment, sbar_recommend,created_date_log, user_log, history_edit,konsul) 
            
            SELECT id, id_layanan_pendaftaran, waktu, id_profesi, subject, objective, assessment, plan, ademi_assesment, id_nadis, ttd_nadis, instruksi_ppa, id_dokter_dpjp, ttd_dokter_dpjp, id_user, created_date, updated_date, waktu_penerima_tbak, id_nadis_tbak, ttd_nadis_tbak, waktu_pemberi_tbak, id_dokter_dpjp_tbak, ttd_dokter_dpjp_tbak, konsul_via_telp, ademi_diag, ademi_interv, ademi_monev, sbar_situation, sbar_background, sbar_assesment, sbar_recommend, '$created_date_log' created_date_log, '$user_log' user_log, '1' history_edit,konsul
            
            FROM sm_cppt where id = " . $data['id'];
            $this->db->query($sql);

            $this->db->where('id', $data['id'], true)->update('sm_cppt', $data);
            if ($this->db->trans_status() === false) :
                $this->db->trans_rollback();
                $response = array('id_layanan_pendaftaran' => $data['id_layanan_pendaftaran'], 'status' => false, 'message' => 'Gagal Mengubah Data Catatan Perkembangan Pasien Terintegrasi');
            else :
                $this->db->trans_commit();
                $response = array('id_layanan_pendaftaran' => $data['id_layanan_pendaftaran'], 'status' => true, 'message' => 'Berhasil Mengubah data Data Catatan Perkembangan Pasien Terintegrasi');
            endif;
        endif;

        return $response;
    }

    function getListDataCPPT($limit, $start, $search)
    {
        $where = "";
        $limitation = "";
        if ($limit !== 0) :
            $limitation = " limit " . $limit . " offset " . $start;
        endif;

        // if ($search["id_layanan_pendaftaran"] !== "") :	
        // 	$where .= " and c.id_layanan_pendaftaran = '" . $search["id_layanan_pendaftaran"] . "' ";	
        // endif;

        if ($search["id_pendaftaran"] !== "") :
            $where .= " and lp.id_pendaftaran = '" . $search["id_pendaftaran"] . "' ";
        endif;

        if ($search["keyword"] !== "") :
            $where .= " and c.assessment ilike '%" . $search["keyword"] . "%' ";
            $where .= " or c.ademi_assesment ilike '%" . $search["keyword"] . "%' ";
            $where .= " or c.sbar_assesment ilike '%" . $search["keyword"] . "%' ";
            $where .= " or c.instruksi_ppa ilike '%" . $search["keyword"] . "%' ";
        endif;

        if ($search["waktu"] !== "") :
            $where .= " and c.waktu BETWEEN '" . $search["waktu"] . " 00:00:00' AND '" . $search["waktu"] . " 23:59:59' ";
        endif;

        $sql  = "select c.*, pn.nama as profesi, pg.nama as nadis, pgd.nama as dokter_dpjp, pgu.nama as users, lp.id_pendaftaran, lp.tindak_lanjut, '0' log, pgdt.nama as dokter_dpjp_tbak,
                case when lp.jenis_layanan='Rawat Inap' then (select (select nama from sm_bangsal where id=ri.id_bangsal) from sm_rawat_inap ri where ri.id_layanan_pendaftaran=lp.id)
                else lp.jenis_layanan end ruangan, (select nama from sm_spesialisasi where id=lp.id_unit_layanan) nama_unit,
				case when c.waktu_verif_dpjp-c.waktu > '23:59:59' then 'lebih' else 'kurang' end durasi_dpjp, c.waktu_verif_raber
				from sm_cppt as c 	
                join sm_layanan_pendaftaran lp on c.id_layanan_pendaftaran=lp.id	
				join sm_profesi_nadis as pn on (pn.id = c.id_profesi) 	
				left join sm_pegawai as pg on (pg.id = c.id_nadis) 	
				left join sm_tenaga_medis as tm on (tm.id = c.id_nadis) 	
				left join sm_tenaga_medis as tmd on (tmd.id = c.id_dokter_dpjp)
				left join sm_tenaga_medis as tmdt on (tmdt.id = c.id_dokter_dpjp_tbak) 	 	
				left join sm_pegawai as pgd on (pgd.id = tmd.id_pegawai)	
				left join sm_pegawai as pgu on (pgu.id = c.id_user) 	
				left join sm_pegawai as pgdt on (pgdt.id = tmdt.id_pegawai)	
				where c.id is not null ";

        $sql2  = "select c.*, pn.nama as profesi, pg.nama as nadis, pgd.nama as dokter_dpjp, pgu.nama as users, lp.id_pendaftaran, lp.tindak_lanjut, '1' log, pgdt.nama as dokter_dpjp_tbak,
                case when lp.jenis_layanan='Rawat Inap' then (select (select nama from sm_bangsal where id=ri.id_bangsal) from sm_rawat_inap ri where ri.id_layanan_pendaftaran=lp.id)
                else lp.jenis_layanan end ruangan, (select nama from sm_spesialisasi where id=lp.id_unit_layanan) nama_unit,
				case when c.waktu_verif_dpjp-c.waktu > '23:59:59' then 'lebih' else 'kurang' end durasi_dpjp, c.waktu_verif_raber
				from sm_cppt_log as c 	
                join sm_layanan_pendaftaran lp on c.id_layanan_pendaftaran=lp.id	
				join sm_profesi_nadis as pn on (pn.id = c.id_profesi) 	
				left join sm_pegawai as pg on (pg.id = c.id_nadis) 	
				left join sm_tenaga_medis as tm on (tm.id = c.id_nadis) 	
				left join sm_tenaga_medis as tmd on (tmd.id = c.id_dokter_dpjp) 	
				left join sm_tenaga_medis as tmdt on (tmdt.id = c.id_dokter_dpjp_tbak) 	
				left join sm_pegawai as pgd on (pgd.id = tmd.id_pegawai)	
				left join sm_pegawai as pgu on (pgu.id = c.id_user) 	
				left join sm_pegawai as pgdt on (pgdt.id = tmdt.id_pegawai)	
				where c.id is not null 
				and c.history_edit is null";

        $order = "order by c.waktu desc ";
        $query = $this->db->query($sql . $where . $order . $limitation)->result();
        $query2 = $this->db->query($sql2 . $where . $order . $limitation)->result();
        $marge = array_merge($query, $query2);
        $data['data'] = $marge;
        $data['jumlah'] = $this->db->query($sql . $where)->num_rows() + $this->db->query($sql2 . $where)->num_rows();
        return $data;
        $this->db->close();
    }

    function getCPPT($id)
    {
        $sql = "select c.*, pn.nama as profesi, pg.nama as nadis, pgd.nama as dokter_dpjp, pgu.nama as users
                from sm_cppt as c 
                join sm_profesi_nadis as pn on (pn.id = c.id_profesi) 
                left join sm_tenaga_medis as tm on (tm.id = c.id_nadis) 
                left join sm_pegawai as pg on (pg.id = c.id_nadis) 
                left join sm_tenaga_medis as tmd on (tmd.id = c.id_dokter_dpjp) 
                left join sm_pegawai as pgd on (pgd.id = tmd.id_pegawai)
                left join sm_pegawai as pgu on (pgu.id = c.id_user) 
                where c.id = '" . $id . "'";
        $query = $this->db->query($sql)->row();
        return $query;
        $this->db->close();
    }

    function getHistoryCPPTByID($id)
    {
        return $this->db->select("c.*, pn.nama as profesi, pg.nama as nadis, pgd.nama as dokter_dpjp")
            ->from('sm_cppt_log as c')
            ->join('sm_profesi_nadis as pn', 'pn.id = c.id_profesi')
            ->join('sm_tenaga_medis as tm', 'tm.id = c.id_nadis', 'left')
            ->join('sm_pegawai as pg', 'pg.id = c.id_nadis', 'left')
            ->join('sm_tenaga_medis as tmd', 'tmd.id = c.id_dokter_dpjp', 'left')
            ->join('sm_pegawai as pgd', 'pgd.id = tmd.id_pegawai', 'left')
            ->where('c.id_lama', $id, true)
            ->order_by('created_date_log', 'desc')
            ->get()
            ->result();
        $this->db->close();
    }

    function deleteCPPT($id)
    {
        $user_log = $this->session->userdata('nama');
        $created_date_log = $this->datetime;

        $sql = "INSERT INTO sm_cppt_log (id_lama, id_layanan_pendaftaran, waktu, id_profesi, subject, objective, assessment, plan, ademi_assesment, id_nadis, ttd_nadis, instruksi_ppa, id_dokter_dpjp, ttd_dokter_dpjp, id_user, created_date, updated_date, waktu_penerima_tbak, id_nadis_tbak, ttd_nadis_tbak, waktu_pemberi_tbak, id_dokter_dpjp_tbak, ttd_dokter_dpjp_tbak, konsul_via_telp, ademi_diag, ademi_interv, ademi_monev, sbar_situation, sbar_background, sbar_assesment, sbar_recommend,created_date_log, user_log,konsul) 
        
        SELECT id, id_layanan_pendaftaran, waktu, id_profesi, subject, objective, assessment, plan, ademi_assesment, id_nadis, ttd_nadis, instruksi_ppa, id_dokter_dpjp, ttd_dokter_dpjp, id_user, created_date, updated_date, waktu_penerima_tbak, id_nadis_tbak, ttd_nadis_tbak, waktu_pemberi_tbak, id_dokter_dpjp_tbak, ttd_dokter_dpjp_tbak, konsul_via_telp, ademi_diag, ademi_interv, ademi_monev, sbar_situation, sbar_background, sbar_assesment, sbar_recommend, '$created_date_log' created_date_log, '$user_log' user_log,konsul
        
        FROM sm_cppt where id = $id ";

        $this->db->query($sql);
        return $this->db->where('id', $id, true)->delete('sm_cppt');
    }

    function getVerifiedCPPT($id)
    {
        // $sql = "select c.waktu_penerima_tbak, pgn.nama as nadis_tbak, ttd_nadis_tbak, 
        //         c.waktu_pemberi_tbak, pgd.nama as dokter_dpjp_tbak, ttd_dokter_dpjp_tbak
        //         from sm_cppt as c 
        //         join sm_tenaga_medis as tmn on (tmn.id = c.id_nadis_tbak) 
        //         join sm_pegawai as pgn on (pgn.id = tmn.id_pegawai) 
        //         join sm_tenaga_medis as tmd on (tmd.id = c.id_dokter_dpjp_tbak) 
        //         join sm_pegawai as pgd on (pgd.id = tmd.id_pegawai)";

        $sql = "select c.waktu_penerima_tbak, pgn.nama as nadis_tbak, ttd_nadis_tbak, 
                c.waktu_pemberi_tbak, pgd.nama as dokter_dpjp_tbak, ttd_dokter_dpjp_tbak
                from sm_cppt as c 
                join sm_pegawai as pgn on (pgn.id = c.id_nadis_tbak) 
                join sm_tenaga_medis as tmd on (tmd.id = c.id_dokter_dpjp_tbak) 
                join sm_pegawai as pgd on (pgd.id = tmd.id_pegawai) WHERE c.id = '" . $id . "'";
        $query = $this->db->query($sql)->row();
        if ($query) :
            $response = array('status' => true, 'data' => $query);
        else :
            $response = array('status' => false, 'data' => 'Data tidak ditemukan');
        endif;

        return $response;
    }

    function getVerifiedDpjpCPPT($id)
    {
        $sql = "select c.waktu_verif_dpjp, c.id_dokter_dpjp, pgd.nama as dokter_dpjp, c.ttd_dokter_dpjp
                from sm_cppt as c 
                join sm_tenaga_medis as tmd on (tmd.id = c.id_dokter_dpjp) 
                join sm_pegawai as pgd on (pgd.id = tmd.id_pegawai)
                WHERE c.id=  '" . $id . "'";
        $query = $this->db->query($sql)->row();
        if ($query) :
            $response = array('status' => true, 'data' => $query);
        else :
            $response = array('status' => false, 'data' => 'Data tidak ditemukan');
        endif;

        return $response;
    }
    // end cppt

    // edukasi
    function simpanEdukasi($data)
    {
        $this->db->insert('sm_edukasi', $data);
        return $this->db->insert_id();
    }

    function simpanDetailEdukasi($data_detail, $id_edukasi)
    {
        if (is_array($data_detail['id_edu'])) :
            foreach ($data_detail['id_edu'] as $i => $value) :
                if ($value === '') :
                    $data = array(
                        'id_edukasi' => $id_edukasi,
                        'id_topik_edukasi' => $data_detail['id_topik_edu'][$i],
                        'ket_topik_edukasi' => $data_detail['ket_topik_edu'][$i],
                        'tanggal_edukasi' => $data_detail['tanggal_edu'][$i],
                        'nama_keluarga' => $data_detail['nama_keluarga_edu'][$i],
                        'status_hubungan' => $data_detail['status_hubungan_edu'][$i],
                        'id_edukator' => $data_detail['id_edukator_edu'][$i],
                        'tingkat_pemahaman_awal' => $data_detail['pemahaman_awal_edu'][$i],
                        'metoda_edukasi' => $data_detail['metoda_edu'][$i],
                        'media_edukasi' => $data_detail['media_edu'][$i],
                        'evaluasi' => $data_detail['evaluasi_edu'][$i],
                        'tanggal_re_edukasi' => ($data_detail['tanggal_re_edu'][$i] !== '' ? $data_detail['tanggal_re_edu'][$i] : NULL),
                        'created_date' => $this->datetime,
                        'ttd_keluarga' => $this->saveTtdEdukasi($data_detail['ttd_keluarga_edu'][$i]),
                        'ttd_edukator' => $this->saveTtdEdukasi($data_detail['ttd_edukator_edu'][$i]),
                    );

                    $this->db->insert('sm_detail_edukasi', $data);
                endif;
            endforeach;
        endif;
    }

    private function saveTtdEdukasi($base64String)
    {
        $imageBinary = file_get_contents($base64String);

        if ($imageBinary) {
            // Simpan gambar ke dalam folder public dengan format file PNG
            $filename = 'ttd_keluarga_' . uniqid() . '.png';
            $filepath = FCPATH . 'resources/images/form_epkt/' . $filename;

            // Simpan gambar ke folder public
            file_put_contents($filepath, $imageBinary);

            return $filename;
        }

        return $base64String;
    }

    // FEPDKT
    //  where edu.id_layanan_pendaftaran = '" . $id_layanan_pendaftaran . "'";
    function getEdukasi($id_layanan_pendaftaran)
    {
        $sql = "select edu.*, ('') as detail,
                tr.account as user
                from sm_edukasi as edu
                join sm_layanan_pendaftaran as lp on (edu.id_layanan_pendaftaran = lp.id) 
                join sm_translucent as tr on (tr.id = edu.id_user)
                where lp.id_pendaftaran = '" . $id_layanan_pendaftaran . "'";

        $data = $this->db->query($sql)->row();
        if ($data) :
            $result = array();
            $sql = "select edud.*, topedu.nama as topik_edukasi, topedu.keterangan, pgedu.nama as edukator
                    from sm_detail_edukasi as edud 
                    join sm_topik_edukasi as topedu on (topedu.id = edud.id_topik_edukasi) 
                    left join sm_pegawai as pgedu on (pgedu.id = edud.id_edukator) 
                    where edud.id_edukasi = '" . $data->id . "' 
                    order by edud.created_date asc";
            $result = $this->db->query($sql)->result();
            if ($result) :
                $data->detail = $result;
            endif;
        endif;

        return $data;
    }

    function deleteEdukasi($id)
    {
        return $this->db->where('id', $id)->delete('sm_detail_edukasi');
    }
    // end edukasi

    // surat
    function getAutoNumberSurat($id_layanan_pendaftaran, $jenis_surat)
    {
        $bulan = date('n');
        $bulan = date('m');
        $tahun = date('Y');
        $nomor = "/" . $jenis_surat . "/" . $bulan . "/" . $tahun;
        // membaca kode / nilai tertinggi dari penomoran yang ada didatabase berdasarkan tanggal
        $query = "select max (kode) as maxkode from sm_all_letters where id_layanan_pendaftaran = '" . $id_layanan_pendaftaran . "' and jenis_surat = '" . $jenis_surat . "'";
        // var_dump($query); die;
        $data = $this->db->query($query)->row();

        if ($data->maxkode) :
            $no = $data->maxkode;
            $no = explode('/', $no);
            $noUrut = $no[0] + 1;

            //membuat Nomor Surat Otomatis dengan awalan depan 0 misalnya , 01,02 
            //jika ingin 003 ,tinggal ganti %03
            $kode =  sprintf("%05s", $noUrut);
            $nomorbaru = $kode . $nomor;
            return $nomorbaru;
        else :
            $nomorbaru = '000001' . $nomor;
            return $nomorbaru;
        endif;
    }

    function simpanSurat($data)
    {
        $this->db->trans_begin();
        $id_layanan_pendaftaran = $data['id_layanan_pendaftaran'];
        $type = $data['jenis_surat'];
        if ($data['id'] === '') :
            unset($data['id']);
            $data['created_date'] = $this->datetime;
            $this->db->insert('sm_all_letters', $data);
            $id = $this->db->insert_id();
        else :
            $data['updated_date'] = $this->datetime;
            unset($data['kode']);
            $this->db->where('id', $data['id'])->update('sm_all_letters', $data);
            $id = $data['id'];
        endif;

        if ($this->db->trans_status() === false) :
            $this->db->trans_rollback();
            $response = array('status' => false, 'message' => 'Gagal menyimpan surat');
        else :
            $this->db->trans_commit();
            $response = array('id' => $id, 'id_layanan_pendaftaran' => $id_layanan_pendaftaran, 'type' => $type, 'status' => true, 'message' => 'Berhasil menyimpan surat');
        endif;

        return $response;
    }

    function getDataSurat($id_layanan_pendaftaran)
    {
        $sql = "select s.*, tr.account as user 
                from sm_all_letters as s 
                join sm_translucent as tr on (tr.id = s.id_user) 
                where s.id_layanan_pendaftaran = '" . $id_layanan_pendaftaran . "'";
        return $this->db->query($sql)->row();
    }

    function getDetailSurat($id, $id_layanan_pendaftaran, $type)
    {
        $sql = "select s.*, p.id as no_rm, 
                p.nama as pasien, p.kelamin as kelamin_pasien, 
                p.no_identitas as nik,
                p.tanggal_lahir as tgl_lahir_pasien, 
                pg.nama as dokter_merawat,
                b.nama as bangsal, k.nama as kelas
                from sm_all_letters as s 
                join sm_layanan_pendaftaran as lp on (lp.id = s.id_layanan_pendaftaran)
                join sm_pendaftaran as pd on (pd.id = lp.id_pendaftaran)
                join sm_pasien as p on (p.id = pd.id_pasien)
                join sm_rawat_inap as ri on (ri.id_layanan_pendaftaran = lp.id)
                join sm_bangsal as b on (b.id = ri.id_bangsal)
                join sm_kelas as k on (k.id = ri.id_kelas)
                left join sm_tenaga_medis as tm on (tm.id = lp.id_dokter) 
                left join sm_pegawai as pg on (pg.id = tm.id_pegawai)
                where s.id = '" . $id . "' and s.id_layanan_pendaftaran = '" . $id_layanan_pendaftaran . "' and s.jenis_surat = '" . $type . "'";
        return $this->db->query($sql)->row();
    }
    // end surat

    // operasi
    function simpanJadwalOperasi($data)
    {
        $id_icd9 = $data['icd9_ok'] == 'undefined' ? '' : $data['icd9_ok'];
        $data_operasi = array(
            'waktu' => $this->datetime,
            'id_pasien' => $data['id_pasien'],
            'id_layanan_pendaftaran' => $data['id_layanan_pendaftaran'],
            'id_tarif' => $data['id_tarif'],
            'id_icd9' => $id_icd9 == '' ? null : $id_icd9,
            'timing' => $data['timing'],
            'status' => 'Request',
            'layanan' => 'OK',
            'id_users' => $this->session->userdata('id_translucent'),
        );
        $this->db->insert('sm_jadwal_kamar_operasi', $data_operasi);
        if ($this->db->trans_status() === false) :
            $this->db->trans_rollback();
            $status = false;
        endif;
    }

    function simpanOrderVK($data)
    {
        $data_vk = array(
            'waktu' => $this->datetime,
            'id_pasien' => $data['id_pasien'],
            'id_layanan_pendaftaran' => $data['id_layanan_pendaftaran'],
            'timing' => 'Terjadwal',
            'status' => 'Request',
            'layanan' => 'VK',
            'id_users' => $this->session->userdata('id_translucent'),
        );
        $this->db->insert('sm_jadwal_kamar_operasi', $data_vk);
        if ($this->db->trans_status() === false) :
            $this->db->trans_rollback();
            $status = false;
        endif;
    }

    function simpanDataOrderDPMP($params)
    {

        $this->db->insert('sm_order_dpmp', $params);

        if ($this->db->trans_status() === false) :
            $this->db->trans_rollback();
            $status = false;
        endif;
    }

    function simpanDataDFTRHemodialisis($params)
    {

        $this->db->insert('sm_layanan_pendaftaran', $params);
        $id = $this->db->insert_id();
        $update = array('id_layanan_pendaftaran' => $id);
        $this->db->where('id', $params['id_pendaftaran'])->update('sm_resume_kunjungan', $update);

        $pmb = array(
            'jenis_transaksi'        => $params['jenis_layanan'],
            'id_pendaftaran'         => $params['id_pendaftaran'],
            'id_layanan_pendaftaran' => $id,
            'status'                 => 'Tagihan'
        );

        $this->db->insert('sm_pembayaran', $pmb);

        $data_hd = array('id_layanan_pendaftaran' => $id, 'waktu_order' => $this->datetime, 'waktu' => $this->datetime);
        $this->db->insert('sm_hemodialisa', $data_hd);

        if ($this->db->trans_status() === false) :
            $this->db->trans_rollback();
            $status = false;
        endif;
    }

    function ambilDataHemodialisis($id_daftar, $jenis)
    {
        $this->db->select("lp.*, lp.status_terlayani as status
        ");
        $this->db->from('sm_layanan_pendaftaran as lp');
        $this->db->join('sm_pendaftaran as pd', 'pd.id = lp.id_pendaftaran', 'left');
        $this->db->join('sm_pasien as p', 'p.id = pd.id_pasien', 'left');
        $this->db->join('sm_resep as r', 'r.id_layanan_pendaftaran = lp.id', 'left');
        $this->db->join('sm_spesialisasi as sp', 'sp.id = lp.id_unit_layanan', 'left');
        $this->db->join('sm_tenaga_medis as tm', 'tm.id = lp.id_dokter', 'left');
        $this->db->join('sm_pegawai as pg', 'pg.id = tm.id_pegawai', 'left');
        $this->db->join('sm_penjamin as pj', 'pj.id = lp.id_penjamin', 'left');
        $this->db->join('sm_translucent as tr', 'tr.id = lp.id_users_sep', 'left');
        $this->db->where('pd.id', $id_daftar, true);
        $this->db->where('lp.jenis_layanan', $jenis, true);
        $this->db->order_by('lp.id', 'desc');
        return $this->db->get()->result();
    }

    // start antrian
    function cekBookingPendaftaran($id_daftar)
    {
        $this->db->select("pd.kode_booking");
        $this->db->from('sm_pendaftaran as pd');
        $this->db->where('pd.id', $id_daftar, true);
        $this->db->order_by('pd.id', 'desc');
        return $this->db->get()->row();
        $this->db->close();
    }

    function cekBookingAntrean($id_daftar)
    {
        $this->db->select("ab.id, ab.task_empat, ab.kode_booking", false);
        $this->db->from('sm_antrian_bpjs as ab');
        $this->db->where('ab.id_pendaftaran', $id_daftar, true);
        $this->db->order_by('ab.id', 'desc');
        return $this->db->get()->row();
        $this->db->close();
    }

    function cekBookingTaskEnam($id_daftar)
    {
        $this->db->select("ab.id, ab.task_enam, ab.kode_booking", false);
        $this->db->from('sm_antrian_bpjs as ab');
        $this->db->where('ab.id_pendaftaran', $id_daftar, true);
        $this->db->order_by('ab.id', 'desc');
        return $this->db->get()->row();
        $this->db->close();
    }

    function getConfigBPJSV2()
    {
        return $this->db->where('id', '1')->get('sm_konfigurasi_bpjs_antrean')->row();
    }

    function createHeader($bpjs_config)
    {
        $sign = $this->getSignatureBPJS($bpjs_config);
        return array(
            'X-Cons-ID:' . $bpjs_config->cons_id,
            'X-Timestamp:' . $sign->timestamp,
            'X-Signature:' . $sign->signature,
            'User_Key:' . $bpjs_config->user_key,
            'Content-type: application/json'
        );
    }

    function getIdAntrean($kode)
    {
        return $this->db->select("ab.*, sp.nama as poli, pg.nama as nama_dokter", false)
            ->from('sm_antrian_bpjs as ab')
            ->join('sm_spesialisasi as sp', 'sp.id = ab.nama_poli', 'left')
            ->join('sm_translucent as cr', 'cr.id = ab.user_create', 'left')
            ->join('sm_translucent as ur', 'ur.id = ab.user_update', 'left')
            ->join('sm_tenaga_medis as tm', 'tm.id = ab.id_dokter', 'left')
            ->join('sm_pegawai as pg', 'pg.id = tm.id_pegawai', 'left')
            ->where('ab.kode_booking', $kode, true)
            ->get()
            ->row();
        $this->db->close();
    }

    function getResponseBPJS($kode, $task)
    {
        return $this->db->select("ut.*", false)
            ->from('sm_update_task_bpjs as ut')
            ->where('ut.kode_booking', $kode, true)
            ->where('ut.nomor_task', $task, true)
            ->get()
            ->row();
        $this->db->close();
    }

    function cekBookingAntrian($kode)
    {
        $this->db->select("ab.*", false);
        $this->db->from('sm_antrian_bpjs as ab');
        $this->db->where('ab.kode_booking', $kode, true);
        $this->db->order_by('ab.id', 'asc');
        return $this->db->get()->row();
        $this->db->close();
    }

    function getSignatureBPJS($config)
    {
        $cid = $config->cons_id;
        $skey = $config->secret_key;

        // get timestamp
        // date_default_timezone_set("Asia/Jakarta");
        // $timestamp = strtotime(date("Y/m/d H:i:s"));

        date_default_timezone_set("UTC");
        $timestamp = strval(time() - strtotime("1970-01-01 00:00:00"));

        // set data value
        $data = $cid . "&" . $timestamp;

        // generate signature
        $signature = hash_hmac('sha256', $data, $skey, true);
        $encodedSignature = base64_encode($signature);

        // urlencode...
        // $encodedSignature = urlencode($encodedSignature);
        $data = array(
            'timestamp' => $timestamp,
            'signature' => $encodedSignature
        );

        return (object)$data;
        //return strtotime(date("Y-m-d H:i:s")) * 1000;
    }

    // end antrian

    function ambilDataDPMP($id_daftar)
    {
        $this->db->select("lp.*, od.status as status, od.id as od_id, od.waktu_order as waktu_order
        ");
        $this->db->from('sm_order_dpmp as od');
        $this->db->join('sm_layanan_pendaftaran as lp', 'lp.id = od.id_layanan_pendaftaran', 'left');
        $this->db->join('sm_pendaftaran as pd', 'pd.id = lp.id_pendaftaran', 'left');
        $this->db->join('sm_pasien as p', 'p.id = pd.id_pasien', 'left');
        $this->db->join('sm_spesialisasi as sp', 'sp.id = lp.id_unit_layanan', 'left');
        $this->db->join('sm_tenaga_medis as tm', 'tm.id = lp.id_dokter', 'left');
        $this->db->join('sm_pegawai as pg', 'pg.id = tm.id_pegawai', 'left');
        $this->db->join('sm_penjamin as pj', 'pj.id = lp.id_penjamin', 'left');
        $this->db->join('sm_translucent as tr', 'tr.id = lp.id_users_sep', 'left');
        $this->db->where('od.id_pendaftaran', $id_daftar, true);
        $this->db->order_by('od.id', 'desc');
        return $this->db->get()->result();
    }

    function getLayananPendaftaran($id_layanan_pendaftaran)
    {
        $this->db->select("
            lp.id, pj.nama as penjamin, lp.cara_bayar, lp.no_polish, lp.tindak_lanjut,
            CONCAT_WS(' ', lp.jenis_layanan, sp.nama) as dari, pd.no_register,
            sp.nama as spesialisasi, lp.id_pendaftaran, COALESCE(k.nama, 'III') as kelas, k.id as id_kelas
        ");
        $this->db->from('sm_pendaftaran as pd');
        $this->db->join('sm_layanan_pendaftaran as lp', 'lp.id_pendaftaran = pd.id');
        $this->db->join('sm_spesialisasi as sp', 'sp.id = lp.id_unit_layanan', 'left');
        $this->db->join('sm_penjamin as pj', 'pj.id = lp.id_penjamin', 'left');
        $this->db->join('sm_rawat_inap as ri', 'ri.id_layanan_pendaftaran = lp.id', 'left');
        $this->db->join('sm_kelas as k', 'k.id = ri.id_kelas', 'left');
        $this->db->where('lp.id', $id_layanan_pendaftaran, true);
        return $this->db->get()->row();
    }

    function hapusJadwalOperasi($id, $id_layanan_pendaftaran, $jenis)
    {
		// $count = $this->db->get_where('sm_jadwal_kamar_operasi', ['id' => $id, 'status' => 'Request', 'layanan' => $jenis])->num_rows();
        $count = $this->db->where_in('status', ['Request', 'Canceled'])
                  ->where('id', $id)
                  ->where('layanan', $jenis)
                  ->get('sm_jadwal_kamar_operasi')
                  ->num_rows();
				  
        if ($jenis === "OK") :
            if ($count === 1) :
                $this->db->delete('sm_jadwal_kamar_operasi', ['id' => $id, 'layanan' => $jenis]);
                return true;
            endif;
            return false;
        elseif ($jenis === "VK") :
            if ($count === 1) :
                $this->db->delete('sm_jadwal_kamar_operasi', ['id' => $id, 'layanan' => $jenis]);
                return true;
            endif;
            return false;
        endif;
    }
    // end operasi

    //order bimroh
    function simpanOrderBimroh($data)
    {
        $permintaan_bimroh = array(
            'id_layanan_pendaftaran' => $data['id_layanan_pendaftaran'],
            'id_pasien' => $data['id_pasien'],
            'id_perawat' => $data['id_perawat'],
            'waktu_order' => $this->datetime,
            'jenis' => $data['jenis_order'],
            'kondisi_pasien' => $data['kondisi_pasien'],
            'diagnosa_spiritual' => $data['diagnosa_spiritual'],
            'terapi_tindak_lanjut' => $data['terapi_tindak_lanjut'],
            'status' => 'Request',
            'is_bimroh' => 0
        );

        $this->db->insert('sm_order_bimroh', $permintaan_bimroh);

        if ($this->db->trans_status() === false) :
            $this->db->trans_rollback();
            $status = false;
        endif;
    }

    function hapusOrderBimroh($id, $id_layanan_pendaftaran)
    {
        $count = $this->db->get_where('sm_order_bimroh', ['id' => $id, 'status' => 'Request'])->num_rows();
        if ($count === 1) :
            $this->db->delete('sm_order_bimroh', ['id' => $id]);
            return true;
        endif;
        return false;
    }

    //end order bimroh

    //Order Talqin
    function simpanOrderTalqin($data)
    {
        $permintaan_talqin = array(
            'id_layanan_pendaftaran' => $data['id_layanan_pendaftaran'],
            'id_pasien' => $data['id_pasien'],
            'id_perawat_talqin' => $data['id_perawat_talqin'],
            'waktu_order_talqin' => $this->datetime,
            'kondisi_pasien_talqin' => $data['kondisi_pasien_talqin'],
            'terapi_advice_talqin' => $data['terapi_advice_talqin'],
            'status' => 'Request',
            'is_talqin' => 0
        );

        $this->db->insert('sm_order_talqin', $permintaan_talqin);

        if ($this->db->trans_status() === false) :
            $this->db->trans_rollback();
            $status = false;
        endif;
    }

    function hapusOrderTalqin($id, $id_layanan_pendaftaran)
    {
        $count = $this->db->get_where('sm_order_talqin', ['id' => $id, 'status' => 'Request'])->num_rows();
        if ($count === 1) :
            $this->db->delete('sm_order_talqin', ['id' => $id]);
            return true;
        endif;
        return false;
    }

    //End Order Talqin

    // penjualan 
    function getDetailHargaBarangPenjualan($param)
    {
        $id_unit = $this->session->userdata('id_unit');
        $where = NULL;
        if (isset($param['default'])) :
            $where .= " and kb.default_kemasan = '1'";
        endif;

        $sql = "select b.*, kb.id as id_packing, kb.isi, kb.isi_satuan,
                COALESCE(pb.nama, '') as pabrik, st.nama as nama_kemasan, sed.nama as sediaan,
                (b.hpp + (b.hpp * (b.margin_resep / 100))) * (kb.isi * kb.isi_satuan) as harga_jual,
                (b.hpp + (b.hpp * (b.margin_non_resep / 100))) * (kb.isi * kb.isi_satuan) as harga_jual_nr,
                (select COALESCE(sum(masuk) - sum(keluar), 0.00) 
                    from sm_stok 
                    where id_barang = '" . $param['id_barang'] . "' 
                    and id_unit = '" . $id_unit . "') as sisa,
                (select st.nama 
                    from sm_kemasan_barang as kb
                    join sm_satuan as st on (st.id = kb.id_kemasan) 
                    inner join (
                        select min(isi * isi_satuan) as min_isi, id_barang from sm_kemasan_barang group by id_barang
                    ) as i on (kb.id_barang = i.id_barang and kb.isi = i.min_isi) 
                    where kb.id_barang = '" . $param['id_barang'] . "' limit 1) as kemasan_kecil 
                from sm_kemasan_barang as kb 
                join sm_barang as b on (b.id = kb.id_barang) 
                join sm_satuan as st on (st.id = kb.id_kemasan) 
                left join sm_sediaan as sed on (sed.id = b.id_sediaan)
                left join sm_pabrik as pb on (pb.id = b.id_pabrik) 
                where kb.id_barang = '" . $param['id_barang'] . "' 
                and kb.id_kemasan = '" . $param['id_kemasan'] . "'
                limit 1";
        $query = $this->db->query($sql)->row();
        return $query;
    }


    function getDataPenjualan($id)
    {
        $this->db->select("
            penj.*, COALESCE(penj.id_pasien, '') as id_pasien, dpenj.qty,
            CONCAT_WS(' ', b.nama, b.kekuatan, stn.nama) as nama_barang,
            p.nama as nama_pasien, st.nama as kemasan, dpenj.harga_jual, 
            dpenj.hna, dpenj.disc_pr, dpenj.disc_rp, dpenj.id_kemasan, 
            b.id as id_barang
        ");
        $this->db->from('sm_penjualan as penj');
        $this->db->join('sm_detail_penjualan as dpenj', 'dpenj.id_penjualan = penj.id');
        $this->db->join('sm_kemasan_barang as kb', 'kb.id = dpenj.id_kemasan');
        $this->db->join('sm_barang as b', 'b.id = kb.id_barang');
        $this->db->join('sm_satuan as stn', 'stn.id = b.satuan_kekuatan', 'left');
        $this->db->join('sm_sediaan as sd', 'sd.id = b.id_sediaan', 'left');
        $this->db->join('sm_pabrik as pb', 'pb.id = b.id_pabrik', 'left');
        $this->db->join('sm_satuan as st', 'st.id = kb.id_kemasan');
        $this->db->join('sm_pasien as p', 'p.id = penj.id_pasien', 'left');
        $this->db->where('penj.id', $id, true);
        $this->db->order_by('penj.id', 'desc');
        $query = $this->db->get();
        $data['data'] = $query->result();
        $data['jumlah'] = $query->num_rows();
        return $data;
    }

    function deleteDataPenjualan($id)
    {
        $check = $this->db->select("id_resep, id_history_pembayaran")->from('sm_penjualan')->where('id', $id, true)->get()->row();
        if ($check->id_history_pembayaran !== NULL) :
            $result['status'] = false;
            $result['message'] = "Gagal menghapus data penjualan, karena sudah dilakukan pembayaran";
        else :
            $this->db->trans_begin();
            if ($check->id_resep !== NULL) :
                $this->db->delete('sm_resep', ['id' => $check->id_resep]);
                if ($this->db->trans_status() === false) :
                    $this->db->trans_rollback();
                    $result['status'] = false;
                    $result['message'] = '';
                endif;
            endif;

            $this->db->delete('sm_penjualan', ['id' => $id]);
            if ($this->db->trans_status() === false) :
                $this->db->trans_rollback();
                $result['status'] = false;
                $result['message'] = '';
            endif;

            $this->db->delete('sm_stok', ['id_transaksi' => $id, 'transaksi' => 'Penjualan']);
            if ($this->db->trans_status() === false) :
                $this->db->trans_rollback();
                $result['status'] = false;
                $result['message'] = '';
            endif;
        endif;
        if ($this->db->trans_status() === false) :
            $this->db->trans_rollback();
            $result['status'] = false;
            $result['message'] = 'Gagal menghapus data penjualan';
        else :
            $this->db->trans_commit();
            $result['status'] = true;
            $result['message'] = 'Berhasil menghapus data penjualan';
        endif;
        return $result;
    }

    function getPenjualan($id)
    {
        $this->db->select("
            penj.*, COALESCE(penj.id_pasien, '') as id_pasien, dpenj.qty,
            CONCAT_WS(' ', b.nama, b.kekuatan, stn.nama) as nama_barang,
            p.nama as nama_pasien, st.nama as kemasan, 
            (dpenj.harga_jual * kb.isi * kb.isi_satuan) as harga_jual, 
            dpenj.hna, dpenj.disc_pr, dpenj.disc_rp, dpenj.id_kemasan, 
            b.id as id_barang
        ");
        $this->db->from('sm_penjualan as penj');
        $this->db->join('sm_detail_penjualan as dpenj', 'dpenj.id_penjualan = penj.id');
        $this->db->join('sm_kemasan_barang as kb', 'kb.id = dpenj.id_kemasan');
        $this->db->join('sm_barang as b', 'b.id = kb.id_barang');
        $this->db->join('sm_satuan as stn', 'stn.id = b.satuan_kekuatan', 'left');
        $this->db->join('sm_sediaan as sd', 'sd.id = b.id_sediaan', 'left');
        $this->db->join('sm_pabrik as pb', 'pb.id = b.id_pabrik', 'left');
        $this->db->join('sm_satuan as st', 'st.id = kb.id_kemasan');
        $this->db->join('sm_pasien as p', 'p.id = penj.id_pasien', 'left');
        $this->db->where('penj.id', $id, true);
        $this->db->order_by('penj.id', 'desc');
        return $this->db->get();
    }

    function getDataDetailPenjualan($id)
    {
        $sql = "select p.id, p.total, s.ed, s.keluar, s.id_unit, s.id_barang, 
            CONCAT_WS(' ',b.nama,b.kekuatan,sn.nama, COALESCE(sd.nama,''), '<small><i>', COALESCE(pb.nama,''), '</i></small>') as nama_barang,
            CEIL(b.hpp + (b.hpp * (b.margin_resep / 100))) as harga_jual,
            (select s.nama from sm_kemasan_barang k join sm_satuan s on (k.id_kemasan = s.id)
            where k.id_barang = b.id order by (k.isi*k.isi_satuan) asc limit 1) as kemasan_barang,
            (select k.id from sm_kemasan_barang k join sm_satuan s on (k.id_kemasan = s.id)
            where k.id_barang = b.id order by (k.isi*k.isi_satuan) asc limit 1) as id_kemasan_barang
            from sm_penjualan p 
            join sm_stok s on (p.id = s.id_transaksi)
            join sm_barang b on (s.id_barang = b.id)
            left join sm_sediaan sd on (b.id_sediaan = sd.id)
            left join sm_pabrik pb on (b.id_pabrik = pb.id)
            left join sm_satuan sn on (b.satuan_kekuatan = sn.id)
            where p.id_resep_tebus = '" . $id . "' and s.transaksi = 'Penjualan'";
        return $this->db->query($sql)->result();
    }
    // end penjualan 

    function getLoadDataOperasi($id_layanan, $jenis)
    {
        $this->db->select("DISTINCT ON (jko.id)
			jko.*, tp.total, k.nama as kelas,
			COALESCE(jko.klasifikasi, '') as klasifikasi,
			COALESCE(ro.nama, '') as ruang_operasi,
			p.kelamin, p.tanggal_lahir, p.nama as nama_pasien,
			COALESCE(l.nama, '') as operasi, COALESCE(ll.nama, '') as parent, 
			top.id as id_tim_operasi, case when icd.icd9 <> '' THEN concat('[', icd.icd9, '] ', icd.nama )  else null end icd9
		");
        $this->db->from('sm_jadwal_kamar_operasi as jko');
        $this->db->join('sm_tarif_pelayanan as tp', 'tp.id = jko.id_tarif', 'left');
        $this->db->join('sm_ruang_operasi as ro', 'ro.id = jko.id_ruang_operasi', 'left');
        $this->db->join('sm_kelas as k', 'k.id = tp.id_kelas', 'left');
        $this->db->join('sm_pasien as p', 'p.id = jko.id_pasien', 'left');
        $this->db->join('sm_layanan as l', 'l.id = tp.id_layanan', 'left');
        $this->db->join('sm_layanan as ll', 'll.id = l.id_parent', 'left');
        $this->db->join('sm_tim_operasi as top', 'top.id_jadwal_operasi = jko.id', 'left');
        $this->db->join('sm_icd_ix as icd', 'jko.id_icd9 = icd.id', 'left');
        $this->db->where('jko.id_layanan_pendaftaran', $id_layanan, true);
        $this->db->where('jko.layanan', $jenis, true);
        $this->db->order_by('jko.id', 'desc');
        return $this->db->get();
    }

    //bimroh
    function getOrderBimroh($id_layanan_pendaftaran)
    {
        $this->db->select("gob.*, lp.id as id_layanan_pendaftaran, 
                        p.nama, COALESCE(pv.nama, '') as nama_perawat
        ")
            ->from('sm_order_bimroh as gob')
            ->join('sm_layanan_pendaftaran as lp', 'lp.id = gob.id_layanan_pendaftaran', 'left')
            ->join('sm_pasien as p', 'p.id = gob.id_pasien', 'left')
            ->join('sm_tenaga_medis as tmo', 'gob.id_perawat = tmo.id', 'left')
            ->join('sm_pegawai as pv', 'tmo.id_pegawai = pv.id', 'left')
            ->where('gob.id_layanan_pendaftaran', $id_layanan_pendaftaran, true);
        return $this->db->get()->row();
    }

    function getLoadDataBimroh($id_layanan)
    {
        $this->db->select("DISTINCT ON (ob.id)
            ob.*, p.nama as nama_pasien, COALESCE(pg.nama, '') as nama_perawat      
        ");
        $this->db->from('sm_order_bimroh as ob');
        $this->db->join('sm_pasien as p', 'p.id = ob.id_pasien', 'left');
        $this->db->join('sm_tenaga_medis as tm', 'tm.id = ob.id_perawat', 'left');
        $this->db->join('sm_pegawai as pg', 'pg.id = tm.id_pegawai', 'left');
        $this->db->where('ob.id_layanan_pendaftaran', $id_layanan, true);
        $this->db->order_by('ob.id', 'desc');
        return $this->db->get();
    }
    //end bimroh 

    //talqin
    function getLoadDataTalqin($id_layanan)
    {
        $this->db->select("DISTINCT ON (ot.id)
            ot.*, ps.nama as nama_pasien, COALESCE(pgq.nama, '') as nama_perawat
        ");
        $this->db->from('sm_order_talqin as ot');
        $this->db->join('sm_pasien as ps', 'ps.id = ot.id_pasien', 'left');
        $this->db->join('sm_tenaga_medis as tmq', 'tmq.id = ot.id_perawat_talqin', 'left');
        $this->db->join('sm_pegawai as pgq', 'pgq.id = tmq.id_pegawai', 'left');
        $this->db->where('ot.id_layanan_pendaftaran', $id_layanan, true);
        $this->db->order_by('ot.id', 'desc');
        return $this->db->get();
    }

    function getOrderTalqin($id_layanan_pendaftaran)
    {
        $this->db->select("got.*, lp.id as id_layanan_pendaftaran, 
                        p.nama, COALESCE(pq.nama, '') as nama_perawat
        ")
            ->from('sm_order_talqin as got')
            ->join('sm_layanan_pendaftaran as lp', 'lp.id = got.id_layanan_pendaftaran', 'left')
            ->join('sm_pasien as p', 'p.id = got.id_pasien', 'left')
            ->join('sm_tenaga_medis as tmoq', 'got.id_perawat_talqin = tmoq.id', 'left')
            ->join('sm_pegawai as pq', 'tmoq.id_pegawai = pq.id', 'left')
            ->where('got.id_layanan_pendaftaran', $id_layanan_pendaftaran, true);
        return $this->db->get()->row();
    }

    //end talqin

    function checkHistoryPembayaran($param)
    {
        $this->db->select("id_history_pembayaran")->from($param['table'])->where('id', $param['id']);
        $check = $this->db->get()->row();
        if ($check->id_history_pembayaran === NULL) :
            $result['status'] = true;
            $result['message'] = '';
        else :
            $result['status'] = false;
            $result['message'] = '<b>Transaksi telah dikunci / ditutup karena sudah dilakukan pembayaran</b><br>Perubahan tidak dapat dilakukan';
        endif;
        return $result;
    }

    function getLaporanMorbiditas($param)
    {
        $q = "";
        if ($param["tanggal_awal"] != NULL & $param["tanggal_akhir"] != NULL) :
            $q .= " and date(dg.waktu) between '" . $param["tanggal_awal"] . "' and '" . $param["tanggal_akhir"] . "' ";
        endif;
        if ($param["pelayanan"] != "") :
            $q .= " and lp.jenis_layanan = '" . $param["pelayanan"] . "' ";
        endif;
        $sql = "select count(*) as jumlah, g.nama 
                from sm_diagnosa dg
                join sm_golongan_sebab_sakit g on(g.id = dg.id_golongan_sebab_sakit) 
                join sm_layanan_pendaftaran lp on (lp.id = dg.id_layanan_pendaftaran)
                where dg.id is not null " . $q . " 
                group by g.id order by jumlah desc limit 10";
        return $this->db->query($sql)->result();
    }

    /**
     * @author          Pandu Agung Wijaya
     * @created_at      26-03-2021
     */
    function simpanOrderKebidanan($data)
    {
        $count = $this->db->select('count(*) as jumlah')->from('sm_order_kebidanan')->where('id_pendaftaran', $data['id_pendaftaran'], true)->where('status', 'request')->get()->row()->jumlah;
        $status = false;
        if ($count < 1) :
            $this->db->insert('sm_order_kebidanan', $data);
            $status = true;
        endif;

        return $status;
    }

    // @author Lina
    // @create_date 11-04-2021
    function getAsalRuangan($id_layanan_pendaftaran)
    {
        // $this->db->select("
        //     ri.no_ruang as kamar, ri.no_bed as kasur, k.nama as kelas, bg.nama as bangsal
        // ");
        // $this->db->from('sm_layanan_pendaftaran as lp');
        // $this->db->join('sm_rawat_inap as ri', 'ri.id_layanan_pendaftaran = lp.id');
        // $this->db->join('sm_kelas as k', 'k.id = ri.id_kelas');
        // $this->db->join('sm_bangsal as bg', 'bg.id = ri.id_bangsal');
        // $this->db->where('lp.id_pendaftaran', $id_layanan_pendaftaran, true);  

        $this->db->select("DISTINCT ON (lp.id) lp.*, 
        pd.tanggal_daftar, pd.tanggal_keluar, 
        pd.id_pasien, pd.no_register,
        p.nama, p.tanggal_lahir, pj.is_pulang,  lp.tanggal_layanan,
        (SELECT case when (select nama from sm_bangsal where id=ri.id_bangsal)<>'' then 
        CONCAT ( (select nama from sm_bangsal where id=ri.id_bangsal), ' kelas ', (select nama from sm_kelas where id=ri.id_kelas), ' ruang ', 
        ri.no_ruang, ' No. Bed ',ri.no_bed ) 
        when  (select nama from sm_bangsal where id=ic.id_bangsal)<>'' then
        CONCAT ( (select nama from sm_bangsal where id=ic.id_bangsal), ' kelas ', (select nama from sm_kelas where id=ic.id_kelas), ' ruang ', 
        ic.no_ruang, ' No. Bed ',ic.no_bed )
        else lpd.jenis_layanan end bed
        FROM sm_layanan_pendaftaran AS lpd 
        left join sm_rawat_inap AS ri ON lpd.ID = ri.id_layanan_pendaftaran
        left join sm_intensive_care AS ic ON lpd.ID = ic.id_layanan_pendaftaran
        WHERE	lpd.id_pendaftaran =lp.id_pendaftaran AND tindak_lanjut = 'Pemulasaran Jenazah' 
        ORDER BY lpd.ID DESC LIMIT 1 ) as bed", false);

        $this->db->from('sm_layanan_pendaftaran as lp')
            ->join('sm_pendaftaran as pd', 'pd.id = lp.id_pendaftaran')
            ->join('sm_pasien as p', 'p.id = pd.id_pasien')
            ->join('sm_pemulasaran_jenazah as pj', 'pj.id_layanan_pendaftaran = lp.id', "left")
            ->where('lp.jenis_layanan', 'Pemulasaran Jenazah')
            ->where('lp.id_pendaftaran', $id_layanan_pendaftaran, true);
        return $this->db->get()->row();
    }

    function getCPPTDetail($id_pendaftaran, $id_layanan_pendaftaran)
    {
        $sql = "SELECT C.*, pn.nama AS profesi,	pg.nama AS nadis, pgtbak.nama AS dokter_tbak, pgdpjp.nama AS dokter_dpjp,	
        	    pgu.nama AS users, concat(COALESCE (b.nama, b1.nama),case when c.konsul is not NULL then concat(' - ', c.konsul) end) ruang_rawat, 
                lp.tindak_lanjut, case when c.waktu_verif_dpjp - c.waktu > '23:59:59' then 'lebih' else 'kurang' end durasi_dpjp
				FROM sm_cppt AS C
				JOIN sm_layanan_pendaftaran lp ON ( C.id_layanan_pendaftaran = lp.ID )
				JOIN sm_pendaftaran pd ON ( lp.id_pendaftaran = pd.ID )
				JOIN sm_profesi_nadis AS pn ON ( pn.ID = C.id_profesi )
				LEFT JOIN sm_rawat_inap AS ra ON ( c.id_layanan_pendaftaran = ra.id_layanan_pendaftaran )
				LEFT JOIN sm_intensive_care AS ic ON ( c.id_layanan_pendaftaran = ic.id_layanan_pendaftaran )
				LEFT JOIN sm_bangsal AS b ON ( ra.id_bangsal = b.id ) 
				LEFT JOIN sm_bangsal AS b1 ON ( ic.id_bangsal = b1.id ) 
				LEFT JOIN sm_pegawai AS pg ON ( pg.ID = C.id_nadis )
				LEFT JOIN sm_tenaga_medis AS tm ON ( tm.ID = C.id_nadis )
				LEFT JOIN sm_tenaga_medis AS tmd ON ( tmd.ID = C.id_dokter_dpjp )
				LEFT JOIN sm_tenaga_medis AS tbak ON ( tbak.ID = C.id_dokter_dpjp_tbak )
				LEFT JOIN sm_pegawai AS pgdpjp ON ( pgdpjp.ID = tmd.id_pegawai ) 
				LEFT JOIN sm_pegawai AS pgtbak ON ( pgtbak.ID = tbak.id_pegawai )
				LEFT JOIN sm_pegawai AS pgu ON ( pgu.ID = C.id_user ) 
        
        WHERE PD.ID = $id_pendaftaran 
        ORDER BY lp.id desc, C.waktu ASC";

        return $this->db->query($sql)->result();
    }

    function statusKeluarSementara($id_pendaftaran, $id_layanan_pendaftaran)
    {
        $this->db->trans_begin();
        $message = '';
        $laypen = $this->db->select("tindak_lanjut")
            ->from("sm_layanan_pendaftaran")
            ->where("id", $id_layanan_pendaftaran, true)->get()->row();
        if ($laypen) :
            $update = array(
                "tindak_lanjut" => 'cco sementara',
                "tanggal_batal_keluar" => $this->datetime
            );

            if ($laypen->tindak_lanjut !== 'cco sementara' && $laypen->tindak_lanjut !== 'cco sementara it') {
                $update['tindak_lanjut_sementara'] = $laypen->tindak_lanjut;
            }

            $this->db->where("id", $id_layanan_pendaftaran)
                ->update("sm_layanan_pendaftaran", $update);
        endif;


        if ($this->db->trans_status() === false) :
            $this->db->trans_rollback();
            $status = false;
            $message = "Gagal melakukan status keluar Sementara !";
        else :
            $this->db->trans_commit();
            $status = true;
            $message = "Berhasil melakukan status keluar Sementara !";
        endif;

        return array("status" => $status, "message" => $message, "tindak_lanjut" => 'cco sementara');
    }

    function statusKeluarSementaraMCU($id_pendaftaran, $id_layanan_pendaftaran)
    {
        $this->db->trans_begin();
        $message = '';
        $laypen = $this->db->select("tindak_lanjut")
            ->from("sm_layanan_pendaftaran")
            ->where("id", $id_layanan_pendaftaran, true)->get()->row();
        if ($laypen) :
            $update = array(
                "tindak_lanjut" => 'cco sementara',
                "tanggal_batal_keluar" => $this->datetime
            );

            if ($laypen->tindak_lanjut !== 'cco sementara' && $laypen->tindak_lanjut !== 'cco sementara it') {
                $update['tindak_lanjut_sementara'] = $laypen->tindak_lanjut;
            }

            $this->db->where("id", $id_layanan_pendaftaran)
                ->update("sm_layanan_pendaftaran", $update);
        endif;

        if ($this->db->trans_status() === false) :
            $this->db->trans_rollback();
            $status = false;
            $message = "Gagal melakukan status keluar Sementara !";
        else :
            $this->db->trans_commit();
            $status = true;
            $message = "Berhasil melakukan status keluar Sementara !";
        endif;

        return array("status" => $status, "message" => $message, "tindak_lanjut" => 'cco sementara');
    }

    function statusKeluarSementaraIt($id_pendaftaran, $id_layanan_pendaftaran)
    {
        $this->db->trans_begin();
        $message = '';
        $laypen = $this->db->select("tindak_lanjut")
            ->from("sm_layanan_pendaftaran")
            ->where("id", $id_layanan_pendaftaran, true)->get()->row();
        if ($laypen) :
            $update = array(
                "tindak_lanjut" => 'cco sementara it',
                "tanggal_batal_keluar" => $this->datetime,
                "is_have_cco_it" => 1
            );

            if ($laypen->tindak_lanjut !== 'cco sementara' && $laypen->tindak_lanjut !== 'cco sementara it') {
                $update['tindak_lanjut_sementara'] = $laypen->tindak_lanjut;
            }

            $this->db->where("id", $id_layanan_pendaftaran)->update("sm_layanan_pendaftaran", $update);
        endif;


        if ($this->db->trans_status() === false) :
            $this->db->trans_rollback();
            $status = false;
            $message = "Gagal melakukan status keluar Sementara !";
        else :
            $this->db->trans_commit();
            $status = true;
            $message = "Berhasil melakukan status keluar Sementara !";
        endif;

        return array("status" => $status, "message" => $message, "tindak_lanjut" => 'cco sementara');
    }

    function pembatalanStatusKeluarSementara($id_pendaftaran, $id_layanan_pendaftaran)
    {
        $this->db->trans_begin();
        $message = '';
        $laypen = $this->db->select("tindak_lanjut_sementara")
            ->from("sm_layanan_pendaftaran")
            ->where("id", $id_layanan_pendaftaran, true)->get()->row();
        if ($laypen) :
            $update = array(
                "tindak_lanjut" => $laypen->tindak_lanjut_sementara
            );
            $this->db->where("id", $id_layanan_pendaftaran)->update("sm_layanan_pendaftaran", $update);
        endif;


        if ($this->db->trans_status() === false) :
            $this->db->trans_rollback();
            $status = false;
            $message = "Gagal melakukan pembatalan status keluar Sementara !";
        else :
            $this->db->trans_commit();
            $status = true;
            $message = "Berhasil melakukan pembatalan status keluar Sementara !";
        endif;

        return array("status" => $status, "message" => $message, "tindak_lanjut" => $laypen->tindak_lanjut_sementara);
    }

    function pembatalanStatusKeluarSementaraMCU($id_pendaftaran, $id_layanan_pendaftaran)
    {
        $this->db->trans_begin();
        $message = '';
        $laypen = $this->db->select("tindak_lanjut_sementara")
            ->from("sm_layanan_pendaftaran")
            ->where("id", $id_layanan_pendaftaran, true)->get()->row();
        if ($laypen) :
            $update = array(
                "tindak_lanjut" => $laypen->tindak_lanjut_sementara
            );
            $this->db->where("id", $id_layanan_pendaftaran)->update("sm_layanan_pendaftaran", $update);
        endif;


        if ($this->db->trans_status() === false) :
            $this->db->trans_rollback();
            $status = false;
            $message = "Gagal melakukan pembatalan status keluar Sementara !";
        else :
            $this->db->trans_commit();
            $status = true;
            $message = "Berhasil melakukan pembatalan status keluar Sementara !";
        endif;

        return array("status" => $status, "message" => $message, "tindak_lanjut" => $laypen->tindak_lanjut_sementara);
    }

    function insertPengkajianUlangAnak($data)
    {
        foreach ($data['date_created'] as $key => $value) {
            $tanggal_pengkajian_anak = str_replace('/', '-', $data['tanggal_pengkajian'][$key]);
            $tanggal_pengkajian_anak = date("Y-m-d", strtotime($tanggal_pengkajian_anak));

            $data_terapi = array(
                'id_pendaftaran'             => $data['id_pendaftaran'],
                'id_layanan_pendaftaran'     => $data['id_layanan_pendaftaran'],
                'tanggal_pengkajian'         => $tanggal_pengkajian_anak,
                'jumlah_skor'                => $data['jumlah_skor'][$key],
                'paraf'                      => $data['paraf'][$key],
                'perawat'                    => $data['perawat'][$key],
                'umur'                       => $data['umur'][$key],
                'jenis_kelamin'              => $data['jenis_kelamin'][$key],
                'diagnosis'                  => $data['diagnosis'][$key],
                'gangguan_kognitif'          => $data['gangguan_kognitif'][$key],
                'faktor_lingkungan'          => $data['faktor_lingkungan'][$key],
                'respon_terhadap_pembedahan' => $data['respon_pembedahan'][$key],
                'penggunaan_obat_obatan'     => $data['penggunaan_obat'][$key],
                'date_created'               => $value,
                'id_user'                    => $data['users'][$key],
            );

            $this->db->insert('sm_form_pengkajian_ulang_resiko_jatuh_pasien_anak', $data_terapi);
        }
    }

  

  


  














    function editPengkajianResikoJatuhPasienAnak($data)
    {
        return $this->db->where('id', $data['id'], true)->update('sm_form_pengkajian_ulang_resiko_jatuh_pasien_anak', $data);
    }

 

 

    function getPengkajianUlangResikoJatuhPasienAnak($id_layanan_pendaftaran)
    // function getPengkajianUlangResikoJatuhPasienAnak($id_pendaftaran)
    {
        return $this->db->select("sfpurjpa.*, COALESCE(spg.nama, '') as perawat, COALESCE(gid.nama, '') as akun_user")
            ->from('sm_form_pengkajian_ulang_resiko_jatuh_pasien_anak as sfpurjpa')
            ->join('sm_layanan_pendaftaran as lp', ' sfpurjpa.id_layanan_pendaftaran = lp.id')
            ->join('sm_tenaga_medis stm', 'sfpurjpa.perawat = stm.id', 'left')
            ->join('sm_translucent sid', 'sfpurjpa.id_user = sid.id', 'left')
            ->join('sm_pegawai gid', 'sfpurjpa.id_user = gid.id', 'left')
            ->join('sm_pegawai spg', 'spg.id = stm.id_pegawai', 'left')
            ->where('lp.id_pendaftaran', $id_layanan_pendaftaran, true)
            // ->where('sfpurjpa.id_pendaftaran', $id_pendaftaran)
            ->order_by('sfpurjpa.tanggal_pengkajian')
            ->get()
            ->result();
    }

   

 


   








    function getPengkajianUlangResikoJatuhPasienAnakByID($id)
    {
        return $this->db->select("sfpurjpa.*, COALESCE(spg.nama, '') as nama_perawat, COALESCE(gid.nama, '') as akun_user")
            ->from('sm_form_pengkajian_ulang_resiko_jatuh_pasien_anak as sfpurjpa')
            ->join('sm_tenaga_medis stm', 'sfpurjpa.perawat = stm.id', 'left')
            ->join('sm_translucent sid', 'sfpurjpa.id_user = sid.id', 'left')
            ->join('sm_pegawai gid', 'sfpurjpa.id_user = gid.id', 'left')
            ->join('sm_pegawai spg', 'spg.id = stm.id_pegawai', 'left')
            ->where('sfpurjpa.id', $id)
            ->order_by('sfpurjpa.tanggal_pengkajian')
            ->get()
            ->row();
    }


 

    function deletePengkajianUlangResikoJatuhPasienAnak($id)
    {
        return $this->db->where("id", $id)->delete("sm_form_pengkajian_ulang_resiko_jatuh_pasien_anak");
    }



  


  

 














   

 

 

   

    

    function insertUpayaPencegahanAnak($data)
    {
        foreach ($data['date_created'] as $key => $value) {
            $tanggal_pengkajian_anak = str_replace('/', '-', $data['tanggal_pengkajian'][$key]);
            $tanggal_pengkajian_anak = date("Y-m-d", strtotime($tanggal_pengkajian_anak));

            $data_terapi = array(
                'id_pendaftaran'             => $data['id_pendaftaran'],
                'id_layanan_pendaftaran'     => $data['id_layanan_pendaftaran'],
                'id_perawat_p'               => $data['id_perawat_p'][$key] !== '' ? $data['id_perawat_p'][$key] : null,
                'id_perawat_s'               => $data['id_perawat_s'][$key] !== '' ? $data['id_perawat_s'][$key] : null,
                'id_perawat_m'               => $data['id_perawat_m'][$key] !== '' ? $data['id_perawat_m'][$key] : null,
                'id_user'                    => $data['id_user'][$key],
                'tanggal_pengkajian'         => $tanggal_pengkajian_anak,

                'bel_p_ho' => $data['bel_p_ho'][$key] !== '' ? $data['bel_p_ho'][$key] : null,
                'bel_p_10' => $data['bel_p_10'][$key] !== '' ? $data['bel_p_10'][$key] : null,
                'bel_s_ho' => $data['bel_s_ho'][$key] !== '' ? $data['bel_s_ho'][$key] : null,
                'bel_s_18' => $data['bel_s_18'][$key] !== '' ? $data['bel_s_18'][$key] : null,
                'bel_m_ho' => $data['bel_m_ho'][$key] !== '' ? $data['bel_m_ho'][$key] : null,
                'bel_m_23' => $data['bel_m_23'][$key] !== '' ? $data['bel_m_23'][$key] : null,
                'bel_m_4' => $data['bel_m_4'][$key] !== '' ? $data['bel_m_4'][$key] : null,

                'roda_p_ho' => $data['roda_p_ho'][$key] !== '' ? $data['roda_p_ho'][$key] : null,
                'roda_p_10' => $data['roda_p_10'][$key] !== '' ? $data['roda_p_10'][$key] : null,
                'roda_s_ho' => $data['roda_s_ho'][$key] !== '' ? $data['roda_s_ho'][$key] : null,
                'roda_s_18' => $data['roda_s_18'][$key] !== '' ? $data['roda_s_18'][$key] : null,
                'roda_m_ho' => $data['roda_m_ho'][$key] !== '' ? $data['roda_m_ho'][$key] : null,
                'roda_m_23' => $data['roda_m_23'][$key] !== '' ? $data['roda_m_23'][$key] : null,
                'roda_m_4' => $data['roda_m_4'][$key] !== '' ? $data['roda_m_4'][$key] : null,

                'ptt_p_ho' => $data['ptt_p_ho'][$key] !== '' ? $data['ptt_p_ho'][$key] : null,
                'ptt_p_10' => $data['ptt_p_10'][$key] !== '' ? $data['ptt_p_10'][$key] : null,
                'ptt_s_ho' => $data['ptt_s_ho'][$key] !== '' ? $data['ptt_s_ho'][$key] : null,
                'ptt_s_18' => $data['ptt_s_18'][$key] !== '' ? $data['ptt_s_18'][$key] : null,
                'ptt_m_ho' => $data['ptt_m_ho'][$key] !== '' ? $data['ptt_m_ho'][$key] : null,
                'ptt_m_23' => $data['ptt_m_23'][$key] !== '' ? $data['ptt_m_23'][$key] : null,
                'ptt_m_4' => $data['ptt_m_4'][$key] !== '' ? $data['ptt_m_4'][$key] : null,

                'ppt_p_ho' => $data['ppt_p_ho'][$key] !== '' ? $data['ppt_p_ho'][$key] : null,
                'ppt_p_10' => $data['ppt_p_10'][$key] !== '' ? $data['ppt_p_10'][$key] : null,
                'ppt_s_ho' => $data['ppt_s_ho'][$key] !== '' ? $data['ppt_s_ho'][$key] : null,
                'ppt_s_18' => $data['ppt_s_18'][$key] !== '' ? $data['ppt_s_18'][$key] : null,
                'ppt_m_ho' => $data['ppt_m_ho'][$key] !== '' ? $data['ppt_m_ho'][$key] : null,
                'ppt_m_23' => $data['ppt_m_23'][$key] !== '' ? $data['ppt_m_23'][$key] : null,
                'ppt_m_4' => $data['ppt_m_4'][$key] !== '' ? $data['ppt_m_4'][$key] : null,

                'penerangan_p_ho' => $data['penerangan_p_ho'][$key] !== '' ? $data['penerangan_p_ho'][$key] : null,
                'penerangan_p_10' => $data['penerangan_p_10'][$key] !== '' ? $data['penerangan_p_10'][$key] : null,
                'penerangan_s_ho' => $data['penerangan_s_ho'][$key] !== '' ? $data['penerangan_s_ho'][$key] : null,
                'penerangan_s_18' => $data['penerangan_s_18'][$key] !== '' ? $data['penerangan_s_18'][$key] : null,
                'penerangan_m_ho' => $data['penerangan_m_ho'][$key] !== '' ? $data['penerangan_m_ho'][$key] : null,
                'penerangan_m_23' => $data['penerangan_m_23'][$key] !== '' ? $data['penerangan_m_23'][$key] : null,
                'penerangan_m_4' => $data['penerangan_m_4'][$key] !== '' ? $data['penerangan_m_4'][$key] : null,

                'alas_p_ho' => $data['alas_p_ho'][$key] !== '' ? $data['alas_p_ho'][$key] : null,
                'alas_p_10' => $data['alas_p_10'][$key] !== '' ? $data['alas_p_10'][$key] : null,
                'alas_s_ho' => $data['alas_s_ho'][$key] !== '' ? $data['alas_s_ho'][$key] : null,
                'alas_s_18' => $data['alas_s_18'][$key] !== '' ? $data['alas_s_18'][$key] : null,
                'alas_m_ho' => $data['alas_m_ho'][$key] !== '' ? $data['alas_m_ho'][$key] : null,
                'alas_m_23' => $data['alas_m_23'][$key] !== '' ? $data['alas_m_23'][$key] : null,
                'alas_m_4' => $data['alas_m_4'][$key] !== '' ? $data['alas_m_4'][$key] : null,

                'lantai_p_ho' => $data['lantai_p_ho'][$key] !== '' ? $data['lantai_p_ho'][$key] : null,
                'lantai_p_10' => $data['lantai_p_10'][$key] !== '' ? $data['lantai_p_10'][$key] : null,
                'lantai_s_ho' => $data['lantai_s_ho'][$key] !== '' ? $data['lantai_s_ho'][$key] : null,
                'lantai_s_18' => $data['lantai_s_18'][$key] !== '' ? $data['lantai_s_18'][$key] : null,
                'lantai_m_ho' => $data['lantai_m_ho'][$key] !== '' ? $data['lantai_m_ho'][$key] : null,
                'lantai_m_23' => $data['lantai_m_23'][$key] !== '' ? $data['lantai_m_23'][$key] : null,
                'lantai_m_4' => $data['lantai_m_4'][$key] !== '' ? $data['lantai_m_4'][$key] : null,

                'alat_p_ho' => $data['alat_p_ho'][$key] !== '' ? $data['alat_p_ho'][$key] : null,
                'alat_p_10' => $data['alat_p_10'][$key] !== '' ? $data['alat_p_10'][$key] : null,
                'alat_s_ho' => $data['alat_s_ho'][$key] !== '' ? $data['alat_s_ho'][$key] : null,
                'alat_s_18' => $data['alat_s_18'][$key] !== '' ? $data['alat_s_18'][$key] : null,
                'alat_m_ho' => $data['alat_m_ho'][$key] !== '' ? $data['alat_m_ho'][$key] : null,
                'alat_m_23' => $data['alat_m_23'][$key] !== '' ? $data['alat_m_23'][$key] : null,
                'alat_m_4' => $data['alat_m_4'][$key] !== '' ? $data['alat_m_4'][$key] : null,

                'edukasi_p_ho' => $data['edukasi_p_ho'][$key] !== '' ? $data['edukasi_p_ho'][$key] : null,
                'edukasi_p_10' => $data['edukasi_p_10'][$key] !== '' ? $data['edukasi_p_10'][$key] : null,
                'edukasi_s_ho' => $data['edukasi_s_ho'][$key] !== '' ? $data['edukasi_s_ho'][$key] : null,
                'edukasi_s_18' => $data['edukasi_s_18'][$key] !== '' ? $data['edukasi_s_18'][$key] : null,
                'edukasi_m_ho' => $data['edukasi_m_ho'][$key] !== '' ? $data['edukasi_m_ho'][$key] : null,
                'edukasi_m_23' => $data['edukasi_m_23'][$key] !== '' ? $data['edukasi_m_23'][$key] : null,
                'edukasi_m_4' => $data['edukasi_m_4'][$key] !== '' ? $data['edukasi_m_4'][$key] : null,

                'commode_p_ho' => $data['commode_p_ho'][$key] !== '' ? $data['commode_p_ho'][$key] : null,
                'commode_p_10' => $data['commode_p_10'][$key] !== '' ? $data['commode_p_10'][$key] : null,
                'commode_s_ho' => $data['commode_s_ho'][$key] !== '' ? $data['commode_s_ho'][$key] : null,
                'commode_s_18' => $data['commode_s_18'][$key] !== '' ? $data['commode_s_18'][$key] : null,
                'commode_m_ho' => $data['commode_m_ho'][$key] !== '' ? $data['commode_m_ho'][$key] : null,
                'commode_m_23' => $data['commode_m_23'][$key] !== '' ? $data['commode_m_23'][$key] : null,
                'commode_m_4' => $data['commode_m_4'][$key] !== '' ? $data['commode_m_4'][$key] : null,

                'gelang_p_ho' => $data['gelang_p_ho'][$key] !== '' ? $data['gelang_p_ho'][$key] : null,
                'gelang_p_10' => $data['gelang_p_10'][$key] !== '' ? $data['gelang_p_10'][$key] : null,
                'gelang_s_ho' => $data['gelang_s_ho'][$key] !== '' ? $data['gelang_s_ho'][$key] : null,
                'gelang_s_18' => $data['gelang_s_18'][$key] !== '' ? $data['gelang_s_18'][$key] : null,
                'gelang_m_ho' => $data['gelang_m_ho'][$key] !== '' ? $data['gelang_m_ho'][$key] : null,
                'gelang_m_23' => $data['gelang_m_23'][$key] !== '' ? $data['gelang_m_23'][$key] : null,
                'gelang_m_4' => $data['gelang_m_4'][$key] !== '' ? $data['gelang_m_4'][$key] : null,

                'station_p_ho' => $data['station_p_ho'][$key] !== '' ? $data['station_p_ho'][$key] : null,
                'station_p_10' => $data['station_p_10'][$key] !== '' ? $data['station_p_10'][$key] : null,
                'station_s_ho' => $data['station_s_ho'][$key] !== '' ? $data['station_s_ho'][$key] : null,
                'station_s_18' => $data['station_s_18'][$key] !== '' ? $data['station_s_18'][$key] : null,
                'station_m_ho' => $data['station_m_ho'][$key] !== '' ? $data['station_m_ho'][$key] : null,
                'station_m_23' => $data['station_m_23'][$key] !== '' ? $data['station_m_23'][$key] : null,
                'station_m_4' => $data['station_m_4'][$key] !== '' ? $data['station_m_4'][$key] : null,

                'paraf_p_ho' => $data['paraf_p_ho'][$key] !== '' ? $data['paraf_p_ho'][$key] : null,
                'paraf_p_10' => $data['paraf_p_10'][$key] !== '' ? $data['paraf_p_10'][$key] : null,
                'paraf_s_ho' => $data['paraf_s_ho'][$key] !== '' ? $data['paraf_s_ho'][$key] : null,
                'paraf_s_18' => $data['paraf_s_18'][$key] !== '' ? $data['paraf_s_18'][$key] : null,
                'paraf_m_ho' => $data['paraf_m_ho'][$key] !== '' ? $data['paraf_m_ho'][$key] : null,
                'paraf_m_23' => $data['paraf_m_23'][$key] !== '' ? $data['paraf_m_23'][$key] : null,
                'paraf_m_4' => $data['paraf_m_4'][$key] !== '' ? $data['paraf_m_4'][$key] : null,

                'created_at'                 => $value,
            );

            $this->db->insert('sm_upaya_pencegahan_risiko_jatuh_pasien_anak', $data_terapi);
        }
    }

    // function getUpayaPencegahanPasienAnak($id_pendaftaran)
    function getUpayaPencegahanPasienAnak($id_layanan_pendaftaran)
    {
        return $this->db->select("suprjpa.*, COALESCE(spgp.nama, '') as perawat_p, COALESCE(spgs.nama, '') as perawat_s,COALESCE(spgm.nama, '') as perawat_m, COALESCE(gid.nama, '') as akun_user")
            ->from('sm_upaya_pencegahan_risiko_jatuh_pasien_anak as suprjpa')
            ->join('sm_layanan_pendaftaran as lp', 'suprjpa.id_layanan_pendaftaran = lp.id')
            ->join('sm_tenaga_medis stmp', 'suprjpa.id_perawat_p = stmp.id', 'left')
            ->join('sm_tenaga_medis stms', 'suprjpa.id_perawat_s = stms.id', 'left')
            ->join('sm_tenaga_medis stmm', 'suprjpa.id_perawat_m = stmm.id', 'left')
            ->join('sm_translucent sid', 'suprjpa.id_user = sid.id', 'left')
            ->join('sm_pegawai gid', 'suprjpa.id_user = gid.id', 'left')
            ->join('sm_pegawai spgp', 'spgp.id = stmp.id_pegawai', 'left')
            ->join('sm_pegawai spgs', 'spgs.id = stms.id_pegawai', 'left')
            ->join('sm_pegawai spgm', 'spgm.id = stmm.id_pegawai', 'left')
            ->where('lp.id_pendaftaran', $id_layanan_pendaftaran, true)
            // ->where('suprjpa.id_pendaftaran', $id_pendaftaran)
            ->order_by('suprjpa.tanggal_pengkajian')
            ->get()
            ->result();
    }

    function getUpayaPencegahanResikoJatuhPasienAnakByID($id)
    {
        return $this->db->select("suprjpa.*, COALESCE(spgp.nama, '') as perawat_p, COALESCE(spgs.nama, '') as perawat_s,COALESCE(spgm.nama, '') as perawat_m, COALESCE(gid.nama, '') as akun_user")
            ->from('sm_upaya_pencegahan_risiko_jatuh_pasien_anak as suprjpa')
            ->join('sm_tenaga_medis stmp', 'suprjpa.id_perawat_p = stmp.id', 'left')
            ->join('sm_tenaga_medis stms', 'suprjpa.id_perawat_s = stms.id', 'left')
            ->join('sm_tenaga_medis stmm', 'suprjpa.id_perawat_m = stmm.id', 'left')
            ->join('sm_translucent sid', 'suprjpa.id_user = sid.id', 'left')
            ->join('sm_pegawai gid', 'suprjpa.id_user = gid.id', 'left')
            ->join('sm_pegawai spgp', 'spgp.id = stmp.id_pegawai', 'left')
            ->join('sm_pegawai spgs', 'spgs.id = stms.id_pegawai', 'left')
            ->join('sm_pegawai spgm', 'spgm.id = stmm.id_pegawai', 'left')
            ->where('suprjpa.id', $id)
            ->order_by('suprjpa.tanggal_pengkajian')
            ->get()
            ->row();
    }

    function editUpayaPencegahanRisikoJatuhPasienAnak($data)
    {
        return $this->db->where('id', $data['id'], true)->update('sm_upaya_pencegahan_risiko_jatuh_pasien_anak', $data);
    }

    function deleteUpayaPencegahanRisikoJatuhPasienAnak($id)
    {
        return $this->db->where("id", $id)->delete("sm_upaya_pencegahan_risiko_jatuh_pasien_anak");
    }

    function insertSurgicalSafetyCeklis($data)
    {

        foreach ($data['ssc_tanggal_sign_in'] as $i => $value) :
            $ssc_tanggal_sign_in = null;
            if (!empty($data['ssc_tanggal_sign_in'][$i])) {
                $ssc_tanggal_sign_in = str_replace("/", "-", $data['ssc_tanggal_sign_in'][$i]);
                $ssc_tanggal_sign_in = date("Y-m-d H:i", strtotime($ssc_tanggal_sign_in));
            }

            $ssc_tanggal_time_out = null;
            if (!empty($data['ssc_tanggal_time_out'][$i])) {
                $ssc_tanggal_time_out = str_replace("/", "-", $data['ssc_tanggal_time_out'][$i]);
                $ssc_tanggal_time_out = date("Y-m-d H:i", strtotime($ssc_tanggal_time_out));
            }

            $ssc_tanggal_sign_out = null;
            if (!empty($data['ssc_tanggal_sign_out'][$i])) {
                $ssc_tanggal_sign_out = str_replace("/", "-", $data['ssc_tanggal_sign_out'][$i]);
                $ssc_tanggal_sign_out = date("Y-m-d H:i", strtotime($ssc_tanggal_sign_out));
            }

            $ssc_tanggal_obat = null;
            if (!empty($data['ssc_tanggal_obat'][$i])) {
                $ssc_tanggal_obat = str_replace("/", "-", $data['ssc_tanggal_obat'][$i]);
                $ssc_tanggal_obat = date("Y-m-d H:i", strtotime($ssc_tanggal_obat));
            }


            $data_ssc = array(
                'created_date'                          => $this->datetime,
                'id_layanan_pendaftaran'                => $data['id_layanan_pendaftaran'],
                'id_pendaftaran'                        => $data['id_pendaftaran'],
                'user_surgical_safety_ceklis'           => $data['user_surgical_safety_ceklis'][$i],
                'ssc_tanggal_sign_in'                   => $ssc_tanggal_sign_in,
                'ssc_tanggal_time_out'                  => $ssc_tanggal_time_out,
                'ssc_tanggal_sign_out'                  => $ssc_tanggal_sign_out,
                'ssc_tanggal_obat'                      => $ssc_tanggal_obat,
                'ssc_jam_antibiotik_obat'               => $data['ssc_jam_antibiotik_obat'][$i] !== '' ? $data['ssc_jam_antibiotik_obat'][$i] : null,

                // sign in
                'ssc_gelang'                            => $data['ssc_gelang'][$i],
                'ssc_informed'                          => $data['ssc_informed'][$i],
                'ssc_dokter_bedah'                      => $data['ssc_dokter_bedah'][$i],
                'ssc_anestesi'                          => $data['ssc_anestesi'][$i],
                'ssc_dokter_operator'                   => $data['ssc_dokter_operator'][$i] !== '' ? $data['ssc_dokter_operator'][$i] : null,
                'ssc_dokter_anestesi'                   => $data['ssc_dokter_anestesi'][$i] !== '' ? $data['ssc_dokter_anestesi'][$i] : null,
                'ssc_nama_tindakan'                     => $data['ssc_nama_tindakan'][$i],
                'ssc_lokasi'                            => $data['ssc_lokasi'][$i] !== 'undefined' ? $data['ssc_lokasi'][$i] : null,
                'ssc_mesin_anestesi'                    => $data['ssc_mesin_anestesi'][$i],
                'ssc_obat'                              => $data['ssc_obat'][$i],
                'ssc_oximeter'                          => $data['ssc_oximeter'][$i],
                'ssc_lab'                               => $data['ssc_lab'][$i],
                'ssc_line'                              => $data['ssc_line'][$i],
                'ssc_tekanan_darah'                     => $data['ssc_tekanan_darah'][$i],
                'ssc_nadi'                              => $data['ssc_nadi'][$i],
                'ssc_pernafasan'                        => $data['ssc_pernafasan'][$i],
                'ssc_saturasi'                          => $data['ssc_saturasi'][$i],
                'ssc_suhu'                              => $data['ssc_suhu'][$i],
                'ssc_alergi'                            => $data['ssc_alergi'][$i] !== 'undefined' ? $data['ssc_alergi'][$i] : null,
                'ssc_alergi_ket'                        => $data['ssc_alergi_ket'][$i],
                'ssc_aspirasi'                          => $data['ssc_aspirasi'][$i] !== 'undefined' ? $data['ssc_aspirasi'][$i] : null,
                'ssc_pendarahan'                        => $data['ssc_pendarahan'][$i] !== 'undefined' ? $data['ssc_pendarahan'][$i] : null,
                'ssc_rencana_anestesi'                  => $data['ssc_rencana_anestesi'][$i] !== 'undefined' ? $data['ssc_rencana_anestesi'][$i] : null,
                'ssc_paraf_perawat_sign_in'             => $data['ssc_paraf_perawat_sign_in'][$i],
                'ssc_perawat_sign_in'                   => $data['ssc_perawat_sign_in'][$i] !== '' ? $data['ssc_perawat_sign_in'][$i] : null,
                'ssc_paraf_dokter_anestesi_sign_in'     => $data['ssc_paraf_dokter_anestesi_sign_in'][$i],
                'ssc_dokter_anestesi_sign_in'           => $data['ssc_dokter_anestesi_sign_in'][$i] !== '' ? $data['ssc_dokter_anestesi_sign_in'][$i] : null,

                // time out
                'ssc_lengkap'                           => $data['ssc_lengkap'][$i] !== 'undefined' ? $data['ssc_lengkap'][$i] : null,
                'ssc_alasan'                            => $data['ssc_alasan'][$i],
                'ssc_instrument'                        => $data['ssc_instrument'][$i],
                'ssc_kassa'                             => $data['ssc_kassa'][$i],
                'ssc_jarum'                             => $data['ssc_jarum'][$i],
                'ssc_tanggal_tindakan'                  => $data['ssc_tanggal_tindakan'][$i],
                'ssc_identitas_pasien'                  => $data['ssc_identitas_pasien'][$i],
                'ssc_nama_tindakan_time_out'            => $data['ssc_nama_tindakan_time_out'][$i],
                'ssc_prosedur_tindakan'                 => $data['ssc_prosedur_tindakan'][$i],
                'ssc_lokasi_tindakan'                   => $data['ssc_lokasi_tindakan'][$i],
                'ssc_consent'                           => $data['ssc_consent'][$i],
                'ssc_premedikasi'                       => $data['ssc_premedikasi'][$i] !== 'undefined' ? $data['ssc_premedikasi'][$i] : null,
                'ssc_premedikasi_obat'                  => $data['ssc_premedikasi_obat'][$i] !== '' ? $data['ssc_premedikasi_obat'][$i] : null,
                'ssc_antibiotik'                        => $data['ssc_antibiotik'][$i] !== 'undefined' ? $data['ssc_antibiotik'][$i] : null,
                'ssc_antibiotik_obat'                   => $data['ssc_antibiotik_obat'][$i] !== '' ? $data['ssc_antibiotik_obat'][$i] : null,
                'ssc_antibiotik_dosis'                  => $data['ssc_antibiotik_dosis'][$i],
                'ssc_foto'                              => $data['ssc_foto'][$i] !== 'undefined' ? $data['ssc_foto'][$i] : null,
                'ssc_implant'                           => $data['ssc_implant'][$i] !== 'undefined' ? $data['ssc_implant'][$i] : null,
                'ssc_jenis'                             => $data['ssc_jenis'][$i] !== 'undefined' ? $data['ssc_jenis'][$i] : null,
                'ssc_jenis_ket'                         => $data['ssc_jenis_ket'][$i],
                'ssc_paraf_perawat_time_out'            => $data['ssc_paraf_perawat_time_out'][$i],
                'ssc_perawat_time_out'                  => $data['ssc_perawat_time_out'][$i] !== '' ? $data['ssc_perawat_time_out'][$i] : null,
                'ssc_paraf_dokter_anestesi_time_out'    => $data['ssc_paraf_dokter_anestesi_time_out'][$i],
                'ssc_dokter_anestesi_time_out'          => $data['ssc_dokter_anestesi_time_out'][$i] !== '' ? $data['ssc_dokter_anestesi_time_out'][$i] : null,

                // sign out
                'ssc_nama_tindakan_sign_out'            => $data['ssc_nama_tindakan_sign_out'][$i],
                'ssc_instrument_sign_out'               => $data['ssc_instrument_sign_out'][$i],
                'ssc_kassa_sign_out'                    => $data['ssc_kassa_sign_out'][$i],
                'ssc_jarum_sign_out'                    => $data['ssc_jarum_sign_out'][$i],
                'ssc_preparat'                          => $data['ssc_preparat'][$i] !== 'undefined' ? $data['ssc_preparat'][$i] : null,
                'ssc_preparat_pa'                       => $data['ssc_preparat_pa'][$i],
                'ssc_preparat_kultur'                   => $data['ssc_preparat_kultur'][$i],
                'ssc_preparat_sitologi'                 => $data['ssc_preparat_sitologi'][$i],
                'ssc_formulir_permintaan'               => $data['ssc_formulir_permintaan'][$i] !== 'undefined' ? $data['ssc_formulir_permintaan'][$i] : null,
                'ssc_lengkap_pasien'                    => $data['ssc_lengkap_pasien'][$i] !== 'undefined' ? $data['ssc_lengkap_pasien'][$i] : null,
                'ssc_penjelasan_keluarga'               => $data['ssc_penjelasan_keluarga'][$i] !== 'undefined' ? $data['ssc_penjelasan_keluarga'][$i] : null,
                'ssc_penjelasan_keluarga_ket'           => $data['ssc_penjelasan_keluarga_ket'][$i],
                'ssc_obat_operasi'                      => $data['ssc_obat_operasi'][$i] !== 'undefined' ? $data['ssc_obat_operasi'][$i] : null,
                'ssc_obat_operasi_ya_alasan'            => $data['ssc_obat_operasi_ya_alasan'][$i],
                'ssc_obat_operasi_tidak_alasan'         => $data['ssc_obat_operasi_tidak_alasan'][$i],
                'ssc_kesadaran_sign_out'                => $data['ssc_kesadaran_sign_out'][$i],
                'ssc_tekanan_darah_sign_out'            => $data['ssc_tekanan_darah_sign_out'][$i],
                'ssc_nadi_sign_out'                     => $data['ssc_nadi_sign_out'][$i],
                'ssc_pernafasan_sign_out'               => $data['ssc_pernafasan_sign_out'][$i],
                'ssc_saturasi_sign_out'                 => $data['ssc_saturasi_sign_out'][$i],
                'ssc_suhu_sign_out'                     => $data['ssc_suhu_sign_out'][$i],
                'ssc_skala_nyeri_sign_out'              => $data['ssc_skala_nyeri_sign_out'][$i],
                'ssc_rembesan'                          => $data['ssc_rembesan'][$i] !== 'undefined' ? $data['ssc_rembesan'][$i] : null,
                'ssc_paraf_perawat_sign_out'            => $data['ssc_paraf_perawat_sign_out'][$i],
                'ssc_perawat_sign_out'                  => $data['ssc_perawat_sign_out'][$i] !== '' ? $data['ssc_perawat_sign_out'][$i] : null,
                'ssc_paraf_dokter_anestesi_sign_out'    => $data['ssc_paraf_dokter_anestesi_sign_out'][$i],
                'ssc_dokter_anestesi_sign_out'          => $data['ssc_dokter_anestesi_sign_out'][$i] !== '' ? $data['ssc_dokter_anestesi_sign_out'][$i] : null,
            );
            // untuk cek data yang di kirim
            // var_dump($data_ssc);
            // die();
            $this->db->insert('sm_surgical_safety_ceklis', $data_ssc);
        endforeach;
    }

    // function getSurgicalSafetyCeklis($id_pendaftaran)
    function getSurgicalSafetyCeklis($id_layanan_pendaftaran)
    {
        return $this->db
            ->select("
                        ssc.*,
                        COALESCE(spu.nama, '') as akun_user,
                        COALESCE(spd1.nama, '') as dokter_operator,
                        COALESCE(spd2.nama, '') as dokter_anestesi,
                        COALESCE(spd3.nama, '') as dokter_anestesi_sign_in,
                        COALESCE(spd4.nama, '') as dokter_anestesi_time_out,
                        COALESCE(spd5.nama, '') as dokter_anestesi_sign_out,
                        COALESCE(spp1.nama, '') as perawat_sign_in,
                        COALESCE(spp2.nama, '') as perawat_time_out,
                        COALESCE(spp3.nama, '') as perawat_sign_out,
                        COALESCE(sb1.nama_lengkap, '') as premedikasi_obat,
                        COALESCE(sb2.nama_lengkap, '') as antibiotik_obat,
                        ")
            ->from('sm_surgical_safety_ceklis as ssc')
            ->join('sm_layanan_pendaftaran as lp', ' ssc.id_layanan_pendaftaran = lp.id')
            // user
            ->join('sm_translucent st', 'st.id = ssc.user_surgical_safety_ceklis', 'left')
            ->join('sm_pegawai spu', 'spu.id = st.id', 'left')
            // dokter
            ->join('sm_tenaga_medis tmd1', 'tmd1.id = ssc.ssc_dokter_operator', 'left')
            ->join('sm_tenaga_medis tmd2', 'tmd2.id = ssc.ssc_dokter_anestesi', 'left')
            ->join('sm_tenaga_medis tmd3', 'tmd3.id = ssc.ssc_dokter_anestesi_sign_in', 'left')
            ->join('sm_tenaga_medis tmd4', 'tmd4.id = ssc.ssc_dokter_anestesi_time_out', 'left')
            ->join('sm_tenaga_medis tmd5', 'tmd5.id = ssc.ssc_dokter_anestesi_sign_out', 'left')
            ->join('sm_pegawai spd1', 'spd1.id= tmd1.id_pegawai ', 'left')
            ->join('sm_pegawai spd2', 'spd2.id= tmd2.id_pegawai ', 'left')
            ->join('sm_pegawai spd3', 'spd3.id= tmd3.id_pegawai ', 'left')
            ->join('sm_pegawai spd4', 'spd4.id= tmd4.id_pegawai ', 'left')
            ->join('sm_pegawai spd5', 'spd5.id= tmd5.id_pegawai ', 'left')
            // perawat
            ->join('sm_tenaga_medis tmp1', 'ssc.ssc_perawat_sign_in = tmp1.id', 'left')
            ->join('sm_tenaga_medis tmp2', 'ssc.ssc_perawat_time_out = tmp2.id', 'left')
            ->join('sm_tenaga_medis tmp3', 'ssc.ssc_perawat_sign_out = tmp3.id', 'left')
            ->join('sm_pegawai spp1', 'spp1.id = tmp1.id_pegawai', 'left')
            ->join('sm_pegawai spp2', 'spp2.id = tmp2.id_pegawai', 'left')
            ->join('sm_pegawai spp3', 'spp3.id = tmp3.id_pegawai', 'left')
            // // obat
            ->join('sm_barang sb1', 'sb1.id = ssc.ssc_premedikasi_obat', 'left')
            ->join('sm_barang sb2', 'sb2.id = ssc.ssc_antibiotik_obat', 'left')
            ->where('lp.id_pendaftaran', $id_layanan_pendaftaran, true)
            // ->where('ssc.id_pendaftaran', $id_pendaftaran)
            ->order_by('ssc.created_date')
            ->get()
            ->result();
        $this->db->close();
    }

    function getSurgicalSafetyCeklisByID($id)
    {
        return $this->db
            ->select("
                        ssc.*,
                        COALESCE(spu.nama, '') as akun_user,
                        COALESCE(spd1.nama, '') as dokter_operator,
                        COALESCE(spd2.nama, '') as dokter_anestesi,
                        COALESCE(spd3.nama, '') as dokter_anestesi_sign_in,
                        COALESCE(spd4.nama, '') as dokter_anestesi_time_out,
                        COALESCE(spd5.nama, '') as dokter_anestesi_sign_out,
                        COALESCE(spp1.nama, '') as perawat_sign_in,
                        COALESCE(spp2.nama, '') as perawat_time_out,
                        COALESCE(spp3.nama, '') as perawat_sign_out,
                        COALESCE(sb1.nama_lengkap, '') as premedikasi_obat,
                        COALESCE(sb2.nama_lengkap, '') as antibiotik_obat,
                        ")
            ->from('sm_surgical_safety_ceklis as ssc')
            // user
            ->join('sm_translucent st', 'st.id = ssc.user_surgical_safety_ceklis', 'left')
            ->join('sm_pegawai spu', 'spu.id = st.id', 'left')
            // dokter
            ->join('sm_tenaga_medis tmd1', 'tmd1.id = ssc.ssc_dokter_operator', 'left')
            ->join('sm_tenaga_medis tmd2', 'tmd2.id = ssc.ssc_dokter_anestesi', 'left')
            ->join('sm_tenaga_medis tmd3', 'tmd3.id = ssc.ssc_dokter_anestesi_sign_in', 'left')
            ->join('sm_tenaga_medis tmd4', 'tmd4.id = ssc.ssc_dokter_anestesi_time_out', 'left')
            ->join('sm_tenaga_medis tmd5', 'tmd5.id = ssc.ssc_dokter_anestesi_sign_out', 'left')
            ->join('sm_pegawai spd1', 'spd1.id= tmd1.id_pegawai ', 'left')
            ->join('sm_pegawai spd2', 'spd2.id= tmd2.id_pegawai ', 'left')
            ->join('sm_pegawai spd3', 'spd3.id= tmd3.id_pegawai ', 'left')
            ->join('sm_pegawai spd4', 'spd4.id= tmd4.id_pegawai ', 'left')
            ->join('sm_pegawai spd5', 'spd5.id= tmd5.id_pegawai ', 'left')
            // perawat
            ->join('sm_tenaga_medis tmp1', 'ssc.ssc_perawat_sign_in = tmp1.id', 'left')
            ->join('sm_tenaga_medis tmp2', 'ssc.ssc_perawat_time_out = tmp2.id', 'left')
            ->join('sm_tenaga_medis tmp3', 'ssc.ssc_perawat_sign_out = tmp3.id', 'left')
            ->join('sm_pegawai spp1', 'spp1.id = tmp1.id_pegawai', 'left')
            ->join('sm_pegawai spp2', 'spp2.id = tmp2.id_pegawai', 'left')
            ->join('sm_pegawai spp3', 'spp3.id = tmp3.id_pegawai', 'left')
            // // obat
            ->join('sm_barang sb1', 'sb1.id = ssc.ssc_premedikasi_obat', 'left')
            ->join('sm_barang sb2', 'sb2.id = ssc.ssc_antibiotik_obat', 'left')
            ->where('ssc.id', $id)
            ->order_by('ssc.created_date')
            ->get()
            ->row();
        $this->db->close();
    }

    function deleteSurgicalSafetyCeklis($id)
    {
        return $this->db->where("id", $id)->delete("sm_surgical_safety_ceklis");
    }

    function simpanUpdateSurgicalSafetyCeklis($data)
    {
        return $this->db->where('id', $data['id'], true)->update('sm_surgical_safety_ceklis', $data);
    }

    // surgical luar kamar operasi
    function insertLKO($data)
    {
        foreach ($data['dko_tanggal_verifikasi'] as $i => $value) :
            $dko_tanggal_verifikasi = null;
            if (!empty($data['dko_tanggal_verifikasi'][$i])) {
                $dko_tanggal_verifikasi = str_replace("/", "-", $data['dko_tanggal_verifikasi'][$i]);
                $dko_tanggal_verifikasi = date("Y-m-d", strtotime($dko_tanggal_verifikasi));
            }

            $data_dko = array(
                'created_date'                 => $this->datetime,
                'id_layanan_pendaftaran'       => $data['id_layanan_pendaftaran'][$i],
                'id_pendaftaran'               => $data['id_pendaftaran'][$i],
                'user_dko'                     => $data['user_dko'][$i],
                'dko_tanggal_verifikasi'       => $dko_tanggal_verifikasi,

                // sign in
                'dko_jam_sign_in'              => $data['dko_jam_sign_in'][$i] !== 'null' ? $data['dko_jam_sign_in'][$i] : null,
                'dko_gelang'                   => $data['dko_gelang'][$i] !== 'null' ? $data['dko_gelang'][$i] : null,
                'dko_lokasi'                   => $data['dko_lokasi'][$i] !== 'null' ? $data['dko_lokasi'][$i] : null,
                'dko_prosedur'                 => $data['dko_prosedur'][$i] !== 'null' ? $data['dko_prosedur'][$i] : null,
                'dko_izin'                     => $data['dko_izin'][$i] !== 'null' ? $data['dko_izin'][$i] : null,
                'dko_tanda'                    => $data['dko_tanda'][$i] !== 'null' ? $data['dko_tanda'][$i] : null,
                'dko_obat'                     => $data['dko_obat'][$i] !== 'null' ? $data['dko_obat'][$i] : null,
                'dko_alergi'                   => $data['dko_alergi'][$i] !== 'null' ? $data['dko_alergi'][$i] : null,
                'dko_alergi_ket'               => $data['dko_alergi_ket'][$i] !== 'null' ? $data['dko_alergi_ket'][$i] : null,
                'dko_aspirasi'                 => $data['dko_aspirasi'][$i] !== 'null' ? $data['dko_aspirasi'][$i] : null,
                'dko_darah'                    => $data['dko_darah'][$i] !== 'null' ? $data['dko_darah'][$i] : null,
                'dko_anestesi'                 => $data['dko_anestesi'][$i] !== 'null' ? $data['dko_anestesi'][$i] : null,

                // time out
                'dko_jam_time_out'             => $data['dko_jam_time_out'][$i] !== 'null' ? $data['dko_jam_time_out'][$i] : null,
                'dko_konfirmasi'               => $data['dko_konfirmasi'][$i] !== 'null' ? $data['dko_konfirmasi'][$i] : null,
                'dko_nama'                     => $data['dko_nama'][$i] !== 'null' ? $data['dko_nama'][$i] : null,
                'dko_prosedur_time_out'        => $data['dko_prosedur_time_out'][$i] !== 'null' ? $data['dko_prosedur_time_out'][$i] : null,
                'dko_insisi'                   => $data['dko_insisi'][$i] !== 'null' ? $data['dko_insisi'][$i] : null,
                'dko_profilaksis'              => $data['dko_profilaksis'][$i] !== 'null' ? $data['dko_profilaksis'][$i] : null,
                'dko_dokter_bedah_ket'         => $data['dko_dokter_bedah_ket'][$i] !== 'null' ? $data['dko_dokter_bedah_ket'][$i] : null,
                'dko_dokter_anestesi_ket'      => $data['dko_dokter_anestesi_ket'][$i] !== 'null' ? $data['dko_dokter_anestesi_ket'][$i] : null,
                'dko_perawat_ket'              => $data['dko_perawat_ket'][$i] !== 'null' ? $data['dko_perawat_ket'][$i] : null,
                'dko_foto'                     => $data['dko_foto'][$i] !== 'null' ? $data['dko_foto'][$i] : null,

                // sign out
                'dko_jam_sign_out'             => $data['dko_jam_sign_out'][$i] !== 'null' ? $data['dko_jam_sign_out'][$i] : null,
                'dko_tindakan'                 => $data['dko_tindakan'][$i] !== 'null' ? $data['dko_tindakan'][$i] : null,
                'dko_instrumen'                => $data['dko_instrumen'][$i] !== 'null' ? $data['dko_instrumen'][$i] : null,
                'dko_specimen'                 => $data['dko_specimen'][$i] !== 'null' ? $data['dko_specimen'][$i] : null,
                'dko_masalah'                  => $data['dko_masalah'][$i] !== 'null' ? $data['dko_masalah'][$i] : null,
                'dko_review'                   => $data['dko_review'][$i] !== 'null' ? $data['dko_review'][$i] : null,

                // tanda tangan dokter dan perawat
                'dko_perawat_sign_in'           => $data['dko_perawat_sign_in'][$i] !== 'null' ? $data['dko_perawat_sign_in'][$i] : null,
                'dko_ttd_perawat_sign_in'       => $data['dko_ttd_perawat_sign_in'][$i] !== 'null' ? $data['dko_ttd_perawat_sign_in'][$i] : null,
                'dko_dokter_sign_in'            => $data['dko_dokter_sign_in'][$i] !== 'null' ? $data['dko_dokter_sign_in'][$i] : null,
                'dko_ttd_dokter_sign_in'        => $data['dko_ttd_dokter_sign_in'][$i] !== 'null' ? $data['dko_ttd_dokter_sign_in'][$i] : null,
                'dko_operator_time_out'         => $data['dko_operator_time_out'][$i] !== 'null' ? $data['dko_operator_time_out'][$i] : null,
                'dko_ttd_operator_time_out'     => $data['dko_ttd_operator_time_out'][$i] !== 'null' ? $data['dko_ttd_operator_time_out'][$i] : null,
                'dko_dokter_time_out'           => $data['dko_dokter_time_out'][$i] !== 'null' ? $data['dko_dokter_time_out'][$i] : null,
                'dko_ttd_dokter_time_out'       => $data['dko_ttd_dokter_time_out'][$i] !== 'null' ? $data['dko_ttd_dokter_time_out'][$i] : null,
                'dko_perawat_time_out'          => $data['dko_perawat_time_out'][$i] !== 'null' ? $data['dko_perawat_time_out'][$i] : null,
                'dko_ttd_perawat_time_out'      => $data['dko_ttd_perawat_time_out'][$i] !== 'null' ? $data['dko_ttd_perawat_time_out'][$i] : null,
                'dko_operator_sign_out'         => $data['dko_operator_sign_out'][$i] !== 'null' ? $data['dko_operator_sign_out'][$i] : null,
                'dko_ttd_operator_sign_out'     => $data['dko_ttd_operator_sign_out'][$i] !== 'null' ? $data['dko_ttd_operator_sign_out'][$i] : null,
                'dko_dokter_sign_out'           => $data['dko_dokter_sign_out'][$i] !== 'null' ? $data['dko_dokter_sign_out'][$i] : null,
                'dko_ttd_dokter_sign_out'       => $data['dko_ttd_dokter_sign_out'][$i] !== 'null' ? $data['dko_ttd_dokter_sign_out'][$i] : null,


            );
            // untuk cek data yang di kirim
            // var_dump($data_dko);
            // die();

            $this->db->insert('sm_surgical_luar_kamar_operasi', $data_dko);
        endforeach;
    }

    function getLKO($id_pendaftaran)
    {
        return $this->db
            ->select("
                        dko.*,
                        TO_CHAR(dko.dko_tanggal_verifikasi::date, 'DD/MM/YYYY') AS tanggal_verifikasi,
                        TO_CHAR(dko.dko_jam_sign_in::time, 'HH24:MI') AS jam_sign_in,
                        TO_CHAR(dko.dko_jam_time_out::time, 'HH24:MI') AS jam_time_out,
                        TO_CHAR(dko.dko_jam_sign_out::time, 'HH24:MI') AS jam_sign_out,
                        COALESCE(spu.nama, '') as akun_user,
                        COALESCE(sppsi.nama, '') as perawat_sign_in,
                        COALESCE(spdsi.nama, '') as dokter_sign_in,
                        COALESCE(spoto.nama, '') as operator_time_out,
                        COALESCE(spdto.nama, '') as dokter_time_out,
                        COALESCE(sppto.nama, '') as perawat_time_out,
                        COALESCE(sposo.nama, '') as operator_sign_out,
                        COALESCE(spdso.nama, '') as dokter_sign_out
                    ")
            ->from('sm_surgical_luar_kamar_operasi as dko')
            ->join('sm_layanan_pendaftaran lp', ' lp.id = dko.id_layanan_pendaftaran')
            // petugas
            ->join('sm_translucent st', 'st.id = dko.user_dko', 'left')
            ->join('sm_pegawai spu', 'spu.id = st.id', 'left')
            // perawat sign in
            ->join('sm_tenaga_medis tmpsi', 'tmpsi.id = dko.dko_perawat_sign_in', 'left')
            ->join('sm_pegawai sppsi', 'sppsi.id = tmpsi.id_pegawai', 'left')
            // dokter sign in
            ->join('sm_tenaga_medis tmdsi', 'tmdsi.id = dko.dko_dokter_sign_in', 'left')
            ->join('sm_pegawai spdsi', 'spdsi.id = tmdsi.id_pegawai', 'left')
            // operator time out
            ->join('sm_tenaga_medis tmoto', 'tmoto.id = dko.dko_operator_time_out', 'left')
            ->join('sm_pegawai spoto', 'spoto.id = tmoto.id_pegawai', 'left')
            // dokter time out
            ->join('sm_tenaga_medis tmdto', 'tmdto.id = dko.dko_dokter_time_out', 'left')
            ->join('sm_pegawai spdto', 'spdto.id = tmdto.id_pegawai', 'left')
            // perawat time out
            ->join('sm_tenaga_medis tmpto', 'tmpto.id = dko.dko_perawat_time_out', 'left')
            ->join('sm_pegawai sppto', 'sppto.id = tmpto.id_pegawai', 'left')
            // operator sign out
            ->join('sm_tenaga_medis tmoso', 'tmoso.id = dko.dko_operator_sign_out', 'left')
            ->join('sm_pegawai sposo', 'sposo.id = tmoso.id_pegawai', 'left')
            // dokter sign out
            ->join('sm_tenaga_medis tmdso', 'tmdso.id = dko.dko_dokter_sign_out', 'left')
            ->join('sm_pegawai spdso', 'spdso.id = tmdso.id_pegawai', 'left')

            ->where('lp.id_pendaftaran', $id_pendaftaran, true)
            // ->where('ssc.id_pendaftaran', $id_pendaftaran)
            ->order_by('dko.created_date asc')
            ->get()
            ->result();
        $this->db->close();
    }

    function getLKOByID($id)
    {
        return $this->db
            ->select("
                        dko.*,
                        TO_CHAR(dko.dko_tanggal_verifikasi::date, 'DD/MM/YYYY') AS tanggal_verifikasi,
                        TO_CHAR(dko.dko_jam_sign_in::time, 'HH24:MI') AS jam_sign_in,
                        TO_CHAR(dko.dko_jam_time_out::time, 'HH24:MI') AS jam_time_out,
                        TO_CHAR(dko.dko_jam_sign_out::time, 'HH24:MI') AS jam_sign_out,
                        COALESCE(spu.nama, '') as akun_user,
                        COALESCE(sppsi.nama, '') as perawat_sign_in,
                        COALESCE(spdsi.nama, '') as dokter_sign_in,
                        COALESCE(spoto.nama, '') as operator_time_out,
                        COALESCE(spdto.nama, '') as dokter_time_out,
                        COALESCE(sppto.nama, '') as perawat_time_out,
                        COALESCE(sposo.nama, '') as operator_sign_out,
                        COALESCE(spdso.nama, '') as dokter_sign_out
                    ")
            ->from('sm_surgical_luar_kamar_operasi as dko')
            ->join('sm_layanan_pendaftaran lp', ' lp.id = dko.id_layanan_pendaftaran')
            // petugas
            ->join('sm_translucent st', 'st.id = dko.user_dko', 'left')
            ->join('sm_pegawai spu', 'spu.id = st.id', 'left')
            // perawat sign in
            ->join('sm_tenaga_medis tmpsi', 'tmpsi.id = dko.dko_perawat_sign_in', 'left')
            ->join('sm_pegawai sppsi', 'sppsi.id = tmpsi.id_pegawai', 'left')
            // dokter sign in
            ->join('sm_tenaga_medis tmdsi', 'tmdsi.id = dko.dko_dokter_sign_in', 'left')
            ->join('sm_pegawai spdsi', 'spdsi.id = tmdsi.id_pegawai', 'left')
            // operator time out
            ->join('sm_tenaga_medis tmoto', 'tmoto.id = dko.dko_operator_time_out', 'left')
            ->join('sm_pegawai spoto', 'spoto.id = tmoto.id_pegawai', 'left')
            // dokter time out
            ->join('sm_tenaga_medis tmdto', 'tmdto.id = dko.dko_dokter_time_out', 'left')
            ->join('sm_pegawai spdto', 'spdto.id = tmdto.id_pegawai', 'left')
            // perawat time out
            ->join('sm_tenaga_medis tmpto', 'tmpto.id = dko.dko_perawat_time_out', 'left')
            ->join('sm_pegawai sppto', 'sppto.id = tmpto.id_pegawai', 'left')
            // operator sign out
            ->join('sm_tenaga_medis tmoso', 'tmoso.id = dko.dko_operator_sign_out', 'left')
            ->join('sm_pegawai sposo', 'sposo.id = tmoso.id_pegawai', 'left')
            // dokter sign out
            ->join('sm_tenaga_medis tmdso', 'tmdso.id = dko.dko_dokter_sign_out', 'left')
            ->join('sm_pegawai spdso', 'spdso.id = tmdso.id_pegawai', 'left')

            ->where('dko.id', $id, true)
            // ->where('ssc.id_pendaftaran', $id_pendaftaran)
            ->order_by('dko.created_date asc')
            ->get()
            ->row();
        $this->db->close();
    }

    function simpanUpdateDKO($data)
    {
        return $this->db->where('id', $data['id'], true)->update('sm_surgical_luar_kamar_operasi', $data);
    }

    function deleteDKO($id)
    {
        return $this->db->where("id", $id)->delete("sm_surgical_luar_kamar_operasi");
    }



    private function addToResepLogs($penjualan, $aksi)
    {
        if ($aksi !== 'Tambah') {
            $resep   = $this->db->get_where('sm_resep', ['id' => $penjualan->id_resep])->row();
            $resep_r = $this->db->select("srr.*, json_agg(srrd) as resep_r_detail")
                ->from('sm_resep_r srr')
                ->join('sm_resep_r_detail srrd', 'srr.id = srrd.id_resep_r')
                ->where('srr.id_resep', $resep->id)
                ->group_by('srr.id, id_resep, r_no, resep_r_jumlah, tebus_r_jumlah, aturan_pakai, ket_aturan_pakai, timing, iter, cara_pembuatan, id_tarif_tuslah, nominal, jml_pemberian, jml_tablet, jml_hari_pemberi, admin_time, keterangan_resep, racik, aturan_pakai_manual, ket_aturan_pakai_manual')
                ->get()->result();

            $resep_r_detail = [];
            foreach ($resep_r as $item) {
                $resep_r_detail[] = json_decode($item->resep_r_detail);
                unset($item->resep_r_detail);
            }

            $resep_tebus   = $this->db->get_where('sm_resep_tebus', ['id_resep' => $penjualan->id_resep])->row();
            $resep_tebus_r = $this->db->select("srr.*, json_agg(srrd) as resep_tebus_r_detail")
                ->from('sm_resep_tebus_r srr')
                ->join('sm_resep_tebus_r_detail srrd', 'srr.id = srrd.id_resep_tebus_r')
                ->where('srr.id_resep_tebus', $resep_tebus->id)
                ->group_by('srr.id, id_resep_tebus, r_no, resep_r_jumlah, tebus_r_jumlah, sisa_tebus, aturan_pakai, ket_aturan_pakai, timing, pemberian, jam, tpm, iter, cara_pembuatan, id_tarif_tuslah, nominal, jml_pemberian, jml_tablet, cara_pemberian, awal_pemberian, admin_time, jml_hari_pemberi, keterangan_resep, aturan_pakai_manual, ket_aturan_pakai_manual')
                ->get()->result();

            $resep_tebus_r_detail = [];
            foreach ($resep_tebus_r as $item) {
                $resep_tebus_r_detail[] = json_decode($item->resep_tebus_r_detail);
                unset($item->resep_tebus_r_detail);
            }

            $data = [
                'resep'                => json_encode($resep),
                'resep_r'              => json_encode($resep_r),
                'resep_r_detail'       => json_encode($resep_r_detail),
                'resep_tebus'          => json_encode($resep_tebus),
                'resep_tebus_r'        => json_encode($resep_tebus_r),
                'resep_tebus_r_detail' => json_encode($resep_tebus_r_detail),
                'penjualan'            => json_encode($penjualan),
                'id_user'              => $this->session->userdata('id_translucent'),
                'aksi'                 => $aksi
            ];
        } else {
            $data = [
                'resep'       => json_encode($penjualan['resep']),
                'resep_tebus' => json_encode($penjualan['resep_tebus']),
                'id_user'     => $this->session->userdata('id_translucent'),
                'aksi'        => $aksi
            ];
        }

        $this->db->insert('sm_resep_logs', $data);
    }

	function getJadwalSpesialisasi($id_spesialisasi, $tanggal)
    {
        $this->db->select("tm.id as id, jd.id id_jadwal_dokter, jd.kode_bpjs_dokter, pg.nama as dokter, jd.kuota, jd.shift_poli, 
                            TO_CHAR(jd.time_start, 'HH24:MI') time_start, TO_CHAR(jd.time_end, 'HH24:MI') time_end ")
            ->from('sm_jadwal_dokter as jd')
            ->join('sm_tenaga_medis as tm', 'jd.id_dokter = tm.id', 'left')
            ->join('sm_pegawai as pg', 'pg.id = tm.id_pegawai')
            ->where("to_char(jd.tanggal,'dd/mm/yyyy')", $tanggal, true)
            ->where('jd.id_poli', $id_spesialisasi)
            ->order_by('jd.shift_poli', 'ASC');

        $data = $this->db->get()->result();

        return $data;
    }
	
    function getConfigBPJSVclaim2()
    {
        return $this->db->where('id', '1')->get('sm_konfigurasi_bpjs_v2')->row();
    }

    function getDataSKD($id, $start, $limit)
    {
        $result['data'] = $this->_listDataSkd($id, $start, $limit);
        $result['jumlah'] = $this->sqlDataSkd($id)->get()->num_rows();
        $this->db->close();
        return $result;
    }

    private function _listDataSkd($id, $start, $limit)
    {
        $this->sqlDataSkd($id);
        return $this->db->get()->result();
    }

    private function sqlDataSkd($id)
    {
        $this->db->select("skd.id, skd.id_pendaftaran, skd.jenis, sp2.nama poli_asal, sp.nama poli_tujuan, skd.id_dokter_tujuan, pg.nama dokter_tujuan, to_char(skd.tanggal, 'dd-mm-YYYY') tanggal,
                           skd.alasan_kontrol, skd.rencana_tindak_lanjut, skd.jenis_bantuan, skd.dirawat_dengan, skd.keterangan,
                           case when skd.prb='1' then 'Ya' else 'Tidak' end prb, skd.is_preoperasi, skd.created_date, pg2.nama nama_user,
                           skb.no_surat no_skb, ab.status status_booking, skd.skb_code ,skd.skb_message, 
						   ab.kode_booking, ab2.lokasi_data, ab2.kode_booking kode_booking_bynoreferensi, ab2.status status_booking_bynoreferens,
                           jd.shift_poli,  TO_CHAR(jd.time_start, 'HH24:MI') time_start, TO_CHAR(jd.time_end, 'HH24:MI') time_end ");
        $this->db->from('sm_surat_kontrol skd')
            ->join('sm_spesialisasi sp', 'skd.id_spesialisasi=sp.id', 'left')
            ->join('sm_spesialisasi sp2', 'skd.id_spesialisasi_asal=sp2.id', 'left')
            ->join('sm_tenaga_medis tm', 'skd.id_dokter_tujuan = tm.id', 'left')
            ->join('sm_pegawai pg', 'tm.id_pegawai=pg.id', 'left')
            ->join('sm_pegawai pg2', 'skd.id_user = pg2.id', 'left')
            ->join('sm_surat_kontrol_bpjs skb', 'skb.id = skd.id_skb', 'left')
            ->join('sm_antrian_bpjs ab', 'ab.id_skd = skd.id', 'left')
            ->join('sm_pendaftaran pd', 'skd.id_pendaftaran = pd.id', 'left')
            ->join('sm_antrian_bpjs ab2', 'skb.no_surat = ab2.no_referensi', 'left')
            ->join('sm_jadwal_dokter jd', 'skd.id_jadwal_dokter=jd.id', 'left');
        $this->db->where('id_layanan_pendaftaran', $id);
        return $this->db->order_by('created_date', 'desc');
    }

    function getDataSKDRiwayat($id, $start, $limit)
    {
        $result['data'] = $this->_listDataSkdRiwayat($id, $start, $limit);
        $result['jumlah'] = $this->sqlDataSkdRiwayat($id)->get()->num_rows();
        $this->db->close();
        return $result;
    }

    private function _listDataSkdRiwayat($id, $start, $limit)
    {
        $this->sqlDataSkdRiwayat($id);
        return $this->db->get()->result();
    }

    private function sqlDataSkdRiwayat($id)
    {
        $this->db->select("skd.id_pendaftaran,skd.id, to_char(pd.tanggal_daftar,'dd-mm-YYYY HH24:MI:SS') tanggal_daftar , skd.jenis,
                            to_char( skd.tanggal, 'dd-mm-YYYY' ) tanggal, 
                            spa.nama poli_asal, pga.nama dokter_asal,
                            sp.nama poli_tujuan, pg.nama dokter_tujuan,
                            skd.alasan_kontrol, skd.rencana_tindak_lanjut,
                            skd.jenis_bantuan, skd.dirawat_dengan, skd.keterangan,
                            CASE WHEN skd.prb = '1' THEN 'Ya' ELSE'Tidak' END prb,
                            skd.created_date, pg2.nama nama_user,ski.id id_kontrol_jawab,ski.pemeriksaan ,ski.saran ");
        $this->db->from('sm_surat_kontrol skd')
            ->join('sm_spesialisasi sp', 'skd.id_spesialisasi=sp.id', 'left')
            ->join('sm_spesialisasi spa', 'skd.id_spesialisasi_asal=spa.id', 'left')
            ->join('sm_tenaga_medis tm', 'skd.id_dokter_tujuan = tm.id', 'left')
            ->join('sm_pegawai pg', 'tm.id_pegawai=pg.id', 'left')
            ->join('sm_tenaga_medis tma', 'skd.id_dokter_asal = tma.id', 'left')
            ->join('sm_pegawai pga', 'tma.id_pegawai=pga.id', 'left')
            ->join('sm_pegawai pg2', 'skd.id_user = pg2.id', 'left')
            ->join('sm_pendaftaran pd', 'skd.id_pendaftaran = pd.id', 'left')
            ->join('sm_surat_kontrol_internal ski', 'skd.id=ski.id_sk', 'left');
        $this->db->where('skd.id is not null');
        $this->db->where('skd.id_pasien', $id);
        return $this->db->order_by('pd.tanggal_daftar', 'desc');
    }

    function getSKDById($id)
    {
        $sql = " select skd.* , sp.nama spesialisasi_tujuan, sp.kode_bpjs bpjs_spesialisasi_tujuan, sp2.nama spesialisasi_asal, pg.nama dokter_asal,to_char(pd.tanggal_daftar,'dd-mm-YYYY HH24:MI:SS') tanggal_daftar,
                ski.id id_skd_internal, ski.pemeriksaan, ski.saran,skb.no_surat no_skb
                from sm_surat_kontrol skd
                LEFT JOIN sm_spesialisasi sp ON skd.id_spesialisasi = sp.ID 
                LEFT JOIN sm_spesialisasi sp2 ON skd.id_spesialisasi_asal = sp2.ID 
                LEFT JOIN sm_pendaftaran pd ON skd.id_pendaftaran = pd.id
                LEFT JOIN sm_tenaga_medis tm ON skd.id_dokter_asal = tm.id
                LEFT JOIN sm_pegawai pg ON tm.id_pegawai = pg.id
                LEFT JOIN sm_surat_kontrol_internal ski ON skd.id = ski.id_sk
                LEFT JOIN sm_surat_kontrol_bpjs skb ON skb.id = skd.id_skb
                where skd.id = '" . $id . "'";
        $query = $this->db->query($sql)->row();
        return $query;
        $this->db->close();
    }

    function getDetailPasienSkd($id_pendaftaran, $id_layanan_pendaftaran)
    {
        $sql = "SELECT pd.id id_pendaftaran, lp.id id_layanan_pendaftaran, pd.id_penjamin, pj.nama penjamin, ab.kode_booking, ab.id_poli_rujukan, spab.nama poli_rujukan, lp.id_unit_layanan, sp.nama layanan, 
                pd.id_pasien, ps.nama nama_pasien, ps.tanggal_lahir, lp.id_dokter, pg.nama nama_dokter,ab.id_skd id_kontrol_pengirim,pd.no_sep,sp.kode_bpjs kode_bpjs_poli, lp.tanggal_layanan waktu_layanan,
                case when pjp.no_polish = '' then pjp.no_polish else pd.no_polish end no_polish, pd.no_rujukan, pd.jenis_pendaftaran jenis_layanan
                FROM sm_pendaftaran pd
                join sm_layanan_pendaftaran lp on pd.id=lp.id_pendaftaran
                left join sm_spesialisasi sp on lp.id_unit_layanan=sp.id
                left join sm_pasien ps on pd.id_pasien=ps.id
                left join sm_tenaga_medis tm on lp.id_dokter=tm.id
                left join sm_pegawai pg on tm.id_pegawai = pg.id
                left join sm_penjamin pj on pj.id = pd.id_penjamin
                left join sm_antrian_bpjs ab on ab.id_pendaftaran=pd.id
	            left join sm_spesialisasi spab on spab.id=ab.id_poli_rujukan
                left join sm_penjamin_pasien pjp on pjp.id_pasien = ps.id and pjp.id_penjamin=1
                where pd.id='" . $id_pendaftaran . "' and lp.id='" . $id_layanan_pendaftaran . "' ";
        $query = $this->db->query($sql)->row();
        return $query;
        $this->db->close();
    }

	function getDetailRujukan($id_pendaftaran)
    {
        $sql = "SELECT ab.asal_faskes, ab.kadaluarsa_rujukan, ab.kode_bpjs_poli_rujukan, (SELECT nama FROM sm_spesialisasi WHERE kode_bpjs=ab.kode_bpjs_poli_rujukan Limit 1) bpjs_poli_rujukan
                FROM sm_antrian_bpjs ab 
                where ab.id_pendaftaran='" . $id_pendaftaran . "'  ";
        $query = $this->db->query($sql)->row();
        return $query;
        $this->db->close();
    }
	
    function deleteDataSKD($id)
    {
        $sql = "INSERT INTO sm_surat_kontrol_logs (id_pendaftaran, id_layanan_pendaftaran, tanggal, id_spesialisasi, id_user, jenis, created_date, updated_date, id_spesialisasi_asal, id_pasien, id_penjamin,
                alasan_kontrol, rencana_tindak_lanjut, jenis_bantuan, dirawat_dengan, keterangan, prb, id_dokter_asal, id_dokter_tujuan, id_skd_lama, is_delete)
                SELECT id_pendaftaran, id_layanan_pendaftaran, tanggal, id_spesialisasi, id_user, jenis, created_date, updated_date, id_spesialisasi_asal, id_pasien, id_penjamin,
                alasan_kontrol, rencana_tindak_lanjut, jenis_bantuan, dirawat_dengan, keterangan, prb, id_dokter_asal, id_dokter_tujuan, '$id' , '1' from sm_surat_kontrol where id = $id ";
        $this->db->query($sql);

        return $this->db->where("id", $id)->delete("sm_surat_kontrol");
    }

    function UpdateDataSKD($id)
    {
        $sql = "INSERT INTO sm_surat_kontrol_logs (id_pendaftaran, id_layanan_pendaftaran, tanggal, id_spesialisasi, id_user, jenis, created_date, updated_date, id_spesialisasi_asal, id_pasien, id_penjamin,
                alasan_kontrol, rencana_tindak_lanjut, jenis_bantuan, dirawat_dengan, keterangan, prb, id_dokter_asal, id_dokter_tujuan, id_skd_lama, is_delete)
                SELECT id_pendaftaran, id_layanan_pendaftaran, tanggal, id_spesialisasi, id_user, jenis, created_date, updated_date, id_spesialisasi_asal, id_pasien, id_penjamin,
                alasan_kontrol, rencana_tindak_lanjut, jenis_bantuan, dirawat_dengan, keterangan, prb, id_dokter_asal, id_dokter_tujuan, '$id' , '0' from sm_surat_kontrol where id = $id ";
        return $this->db->query($sql);
    }

    function UpdateDataSKDI($id)
    {
        $sql = "INSERT INTO sm_surat_kontrol_internal_logs (id_sk,pemeriksaan,saran,id_user,created_date,updated_date,id_lama)
                SELECT id_sk,pemeriksaan,saran,id_user,created_date,updated_date, '$id'  from sm_surat_kontrol_internal where id = $id ";
        return $this->db->query($sql);
    }

    function getBPJSDokterById($id)
    {
        $sql = " select tm.kode_bpjs
                from sm_tenaga_medis tm
                where tm.id = '" . $id . "'";
        $query = $this->db->query($sql)->row();
        return $query;
        $this->db->close();
    }

    function SuratKontrolBpjsLogs($noskb)
    {
        $sql = "INSERT INTO sm_surat_kontrol_bpjs_logs (id_pasien, no_surat,jenis,tgl_rencana_kontrol,dokter,id_user,created_date,updated_date,no_kartu,id_antrian,id_pendaftaran_asal,id_layanan_pendaftaran_asal,id_lama)
                SELECT id_pasien,no_surat,jenis,tgl_rencana_kontrol,dokter,id_user,created_date,updated_date,no_kartu,id_antrian,id_pendaftaran_asal,id_layanan_pendaftaran_asal,id from sm_surat_kontrol_bpjs where no_surat = '$noskb' ";
        return $this->db->query($sql);
    }

	// function lama tapi masih ada yg pake jadi blm di hapus. Silahkan ubah ke ubahJadwalDokterById (sesuaikan param nya)
    function ubahJadwalDokter($tgl, $id_poli_lama, $id_dokter_lama, $id_poli_baru, $id_dokter_baru)
    {
        $status = FALSE;
        $jml_jadwal = $this->db->query("select count(*) jml from sm_jadwal_dokter where id_dokter =" . $id_dokter_lama . " and id_poli =" . $id_poli_lama . " and tanggal='" . $tgl . "'")->row()->jml;

        if ($jml_jadwal >= 1) {
            if ($id_dokter_lama == $id_dokter_baru) {
                $status = TRUE;
            } else {
                $this->ubahJadwalDokterKuota('tambah', $tgl, $id_poli_baru, $id_dokter_baru);
                $this->ubahJadwalDokterKuota('kurang', $tgl, $id_poli_lama, $id_dokter_lama);
                $status = TRUE;
            }
        } else {
            $jadwal_dokter = $this->db->query("select DISTINCT jd.id_dokter, jd.nama_dokter, jdl.id_dokter id_dokter_log, jdl.nama_dokter nama_dokter_log
                                                from sm_jadwal_dokter jd join sm_jadwal_dokter_log jdl on jd.id =jdl.id_lama
                                                where jd.id_poli= " . $id_poli_lama . " and jd.tanggal='" . $tgl . "' and jdl.id_dokter= " . $id_dokter_lama . " ")->row();
            if ($jadwal_dokter != null) {
                $this->ubahJadwalDokterKuota('tambah', $tgl, $id_poli_baru, $id_dokter_baru);
                $this->ubahJadwalDokterKuota('kurang', $tgl, $id_poli_lama, $jadwal_dokter->id_dokter);
                $status = TRUE;
            } else {
                $status = true;
            }
        }
        return $status;
    }
	
	function ubahJadwalDokterById($id_jadwal_lama, $id_jadwal_baru)
    {
        $status = FALSE;
        $jml_jadwal = $this->db->query("select count(*) jml from sm_jadwal_dokter where id =" . $id_jadwal_lama )->row()->jml;
        $jadwal_lama = $this->db->query("select * from sm_jadwal_dokter where id =" . $id_jadwal_lama )->row();
        $jadwal_baru = $this->db->query("select * from sm_jadwal_dokter where id =" . $id_jadwal_baru )->row();

        if ($jml_jadwal >= 1) {
            if ($id_dokter_lama == $id_dokter_baru) {
                $status = TRUE;
            } else {
                $this->ubahJadwalDokterKuota('tambah', $tgl, $jadwal_baru->id_poli, $jadwal_baru->id_dokter, $jadwal_baru->shift_poli);
                $this->ubahJadwalDokterKuota('kurang', $tgl, $jadwal_lama->id_poli, $jadwal_lama->id_dokter, $jadwal_lama->shift_poli);
                $status = TRUE;
            }
        } else {
            $jadwal_dokter = $this->db->query("select DISTINCT jd.id_dokter, jd.nama_dokter, jdl.id_dokter id_dokter_log, jdl.nama_dokter nama_dokter_log
                                                from sm_jadwal_dokter jd join sm_jadwal_dokter_log jdl on jd.id =jdl.id_lama
                                                where jd.id_poli= " . $id_poli_lama . " and jd.tanggal='" . $tgl . "' and jdl.id_dokter= " . $id_dokter_lama . " ")->row();
            if ($jadwal_dokter != null) {
                $this->ubahJadwalDokterKuota('tambah', $tgl, $jadwal_baru->id_poli, $jadwal_baru->id_dokter, $jadwal_baru->shift_poli);
                $this->ubahJadwalDokterKuota('kurang', $tgl, $jadwal_lama->id_poli, $jadwal_dokter->id_dokter, $jadwal_lama->shift_poli);
                $status = TRUE;
            } else {
                $status = true;
            }
        }
        return $status;
    }
	
	function ubahJadwalDokterKuota($kondisi, $tgl, $id_poli, $id_dokter, $shift_poli = 'Pagi')
    {
        if ($kondisi == 'tambah') {
            $this->db->query("UPDATE sm_jadwal_dokter 
                            SET jml_kunjung = ( SELECT jml_kunjung FROM sm_jadwal_dokter WHERE id_poli = '" . $id_poli . "' AND id_dokter = '" . $id_dokter . "' AND tanggal = '" . $tgl . "' AND shift_poli = '" . $shift_poli . "' ) + 1 
                            WHERE   id_poli = '" . $id_poli . "' AND id_dokter = '" . $id_dokter . "' AND tanggal = '" . $tgl . "' AND shift_poli = '" . $shift_poli . "' ");
        } elseif ($kondisi == 'kurang') {
            $this->db->query("UPDATE sm_jadwal_dokter 
                            SET jml_kunjung = ( SELECT jml_kunjung FROM sm_jadwal_dokter WHERE id_poli = '" . $id_poli . "' AND id_dokter = '" . $id_dokter . "' AND tanggal = '" . $tgl . "' AND shift_poli = '" . $shift_poli . "' ) - 1 
                            WHERE   id_poli = '" . $id_poli . "' AND id_dokter = '" . $id_dokter . "' AND tanggal = '" . $tgl . "' AND shift_poli = '" . $shift_poli . "' ");
        }
    }

    function batalJadwalDokter($tgl, $id_poli, $id_dokter)
    {
        $status = FALSE;
        $jml_jadwal = $this->db->query("select count(*) jml from sm_jadwal_dokter where id_dokter =" . $id_dokter . " and id_poli =" . $id_poli . " and tanggal='" . $tgl . "'")->row()->jml;

        if ($jml_jadwal >= 1) {
            $this->ubahJadwalDokterKuota('kurang', $tgl, $id_poli, $id_dokter);
            $status = TRUE;
        } else {
            $jadwal_dokter = $this->db->query("select DISTINCT jd.id_dokter, jd.nama_dokter, jdl.id_dokter id_dokter_log, jdl.nama_dokter nama_dokter_log
                                                from sm_jadwal_dokter jd join sm_jadwal_dokter_log jdl on jd.id =jdl.id_lama
                                                where jd.id_poli= " . $id_poli . " and jd.tanggal='" . $tgl . "' and jdl.id_dokter= " . $id_dokter . " ")->row();
            if ($jadwal_dokter->id_dokter != null) {
                $this->ubahJadwalDokterKuota('kurang', $tgl, $id_poli, $jadwal_dokter->id_dokter);
                $status = TRUE;
            } else {
                $status = FALSE;
            }
        }
        return $status;
    }


    public function getPenjaminPasien($id_pasien)
    {
        return $this->db->get_where('sm_penjamin_pasien', [
            'id_pasien' => $id_pasien,
            'id_penjamin' => 1
        ])->row();
    }


   


    // PR 
    function getPengkajianRestrain($id_pendaftaran) {
        return $this->db->select('pr.*, pgp1.nama as perawat_bidan, lp.tanggal_layanan as tanggal, b.nama AS bangsal,  pgp1.tanda_tangan as ttd_dokter')
            ->from('sm_pengkajian_restrain as pr')
            ->join('sm_layanan_pendaftaran as lp', 'lp.id = pr.id_layanan_pendaftaran')      
            ->join('sm_tenaga_medis as tmp1', 'tmp1.id = pr.perawat_bidan_pr', 'left')
            ->join('sm_pegawai as pgp1', 'pgp1.id = tmp1.id_pegawai', 'left')	
            ->join('sm_rawat_inap as ri', 'ri.id_layanan_pendaftaran = lp.id', 'left')
            ->join('sm_bangsal as b', 'b.id = ri.id_bangsal', 'left')
            ->where('lp.id_pendaftaran', $id_pendaftaran)
            ->get()
            ->row();
    }
    

	// PR LOGS + ubah
	function getPengkajianRestrainLogs($id_pendafataran){
		return $this->db->select('pr.*, pgp1.nama as perawat_bidan, pgu.nama as user, lp.tanggal_layanan as tanggal, b.nama AS bangsal, pgp1.tanda_tangan as ttd_dokter')
        ->from('sm_pengkajian_restrain_logs as pr')	
        ->join('sm_layanan_pendaftaran as lp', 'lp.id = pr.id_layanan_pendaftaran')
        ->join('sm_tenaga_medis as tmp1 ', ' tmp1.id = pr.perawat_bidan_pr', 'left')       
        ->join('sm_pegawai as pgp1 ', ' pgp1.id = tmp1.id_pegawai', 'left')   
        ->join('sm_translucent as tr', 'tr.id = pr.id_users', 'left')
        ->join('sm_pegawai as pgu', 'pgu.id = tr.id', 'left')
        ->join('sm_rawat_inap as ri', 'ri.id_layanan_pendaftaran = lp.id', 'left')
        ->join('sm_bangsal as b', 'b.id = ri.id_bangsal', 'left')					
        ->where('lp.id_pendaftaran', $id_pendafataran, true)
		->get()
		->result();
	}


    // PR
    function updatePengkajianRestrian($PengkajianRestrian, $id_pr)
    {
        $datetime = date('Y-m-d H:i:s');
        if ($id_pr === '') {
            $PengkajianRestrian['created_date'] = $datetime;

            $this->db->insert('sm_pengkajian_restrain', $PengkajianRestrian);

            return ['status' => true, 'message' => 'Berhasil Menambahkan Data Pengkajian'];
        } else {
            $data_before_pr = $this->db->select("*, '' as id_users, '' as tanggal_ubah_pr")->from('sm_pengkajian_restrain')->where('id', $id_pr)->get()->row();

            unset($data_before_pr->id);
            $data_before_pr->id_users = $this->session->userdata('id_translucent');
            $data_before_pr->tanggal_ubah_pr = $datetime;

            $PengkajianRestrian['updated_date'] = $datetime;

            $this->db->set($PengkajianRestrian)->where('id', $id_pr)->update('sm_pengkajian_restrain');

            $this->db->insert('sm_pengkajian_restrain_logs', $data_before_pr);

            return ['status' => true, 'message' => 'Berhasil Mengubah Data Pengkajian'];
        }
    }

    // PRR
    function insertPemantauanRestrain($data)
    {
        foreach ($data['date_created'] as $key => $value) {
            $tanggal_pemantauan_pr = str_replace('/', '-', $data['tanggal_pemantauan'][$key]);
            $tanggal_pemantauan_pr = date("Y-m-d", strtotime($tanggal_pemantauan_pr));
            $data_terapi = array(
                'id_pendaftaran'             => $data['id_pendaftaran'],
                'id_layanan_pendaftaran'     => $data['id_layanan_pendaftaran'],
                'inisial_perawat_1'          => $data['inisial_perawat_1'][$key] !== '' ? $data['inisial_perawat_1'][$key] : null,
                'inisial_perawat_2'          => $data['inisial_perawat_2'][$key] !== '' ? $data['inisial_perawat_2'][$key] : null,
                'inisial_perawat_3'          => $data['inisial_perawat_3'][$key] !== '' ? $data['inisial_perawat_3'][$key] : null,
                'id_user'                    => $data['id_user'][$key],
                'tanggal_pemantauan'         => $tanggal_pemantauan_pr,

                'posisi_p_ho' => $data['posisi_p_ho'][$key] !== '' ? $data['posisi_p_ho'][$key] : null,
                'posisi_p_10' => $data['posisi_p_10'][$key] !== '' ? $data['posisi_p_10'][$key] : null,
                'posisi_s_ho' => $data['posisi_s_ho'][$key] !== '' ? $data['posisi_s_ho'][$key] : null,
                'posisi_s_18' => $data['posisi_s_18'][$key] !== '' ? $data['posisi_s_18'][$key] : null,
                'posisi_m_ho' => $data['posisi_m_ho'][$key] !== '' ? $data['posisi_m_ho'][$key] : null,
                'posisi_m_23' => $data['posisi_m_23'][$key] !== '' ? $data['posisi_m_23'][$key] : null,
                'posisi_m_4' => $data['posisi_m_4'][$key] !== '' ? $data['posisi_m_4'][$key] : null,

                'edukasi_p_ho' => $data['edukasi_p_ho'][$key] !== '' ? $data['edukasi_p_ho'][$key] : null,
                'edukasi_p_10' => $data['edukasi_p_10'][$key] !== '' ? $data['edukasi_p_10'][$key] : null,
                'edukasi_s_ho' => $data['edukasi_s_ho'][$key] !== '' ? $data['edukasi_s_ho'][$key] : null,
                'edukasi_s_18' => $data['edukasi_s_18'][$key] !== '' ? $data['edukasi_s_18'][$key] : null,
                'edukasi_m_ho' => $data['edukasi_m_ho'][$key] !== '' ? $data['edukasi_m_ho'][$key] : null,
                'edukasi_m_23' => $data['edukasi_m_23'][$key] !== '' ? $data['edukasi_m_23'][$key] : null,
                'edukasi_m_4' => $data['edukasi_m_4'][$key] !== '' ? $data['edukasi_m_4'][$key] : null,

                'cedera_p_ho' => $data['cedera_p_ho'][$key] !== '' ? $data['cedera_p_ho'][$key] : null,
                'cedera_p_10' => $data['cedera_p_10'][$key] !== '' ? $data['cedera_p_10'][$key] : null,
                'cedera_s_ho' => $data['cedera_s_ho'][$key] !== '' ? $data['cedera_s_ho'][$key] : null,
                'cedera_s_18' => $data['cedera_s_18'][$key] !== '' ? $data['cedera_s_18'][$key] : null,
                'cedera_m_ho' => $data['cedera_m_ho'][$key] !== '' ? $data['cedera_m_ho'][$key] : null,
                'cedera_m_23' => $data['cedera_m_23'][$key] !== '' ? $data['cedera_m_23'][$key] : null,
                'cedera_m_4' => $data['cedera_m_4'][$key] !== '' ? $data['cedera_m_4'][$key] : null,

                'restrain_p_ho' => $data['restrain_p_ho'][$key] !== '' ? $data['restrain_p_ho'][$key] : null,
                'restrain_p_10' => $data['restrain_p_10'][$key] !== '' ? $data['restrain_p_10'][$key] : null,
                'restrain_s_ho' => $data['restrain_s_ho'][$key] !== '' ? $data['restrain_s_ho'][$key] : null,
                'restrain_s_18' => $data['restrain_s_18'][$key] !== '' ? $data['restrain_s_18'][$key] : null,
                'restrain_m_ho' => $data['restrain_m_ho'][$key] !== '' ? $data['restrain_m_ho'][$key] : null,
                'restrain_m_23' => $data['restrain_m_23'][$key] !== '' ? $data['restrain_m_23'][$key] : null,
                'restrain_m_4' => $data['restrain_m_4'][$key] !== '' ? $data['restrain_m_4'][$key] : null,

                'ttd_p_ho' => $data['ttd_p_ho'][$key] !== '' ? $data['ttd_p_ho'][$key] : null,
                'ttd_p_10' => $data['ttd_p_10'][$key] !== '' ? $data['ttd_p_10'][$key] : null,
                'ttd_s_ho' => $data['ttd_s_ho'][$key] !== '' ? $data['ttd_s_ho'][$key] : null,
                'ttd_s_18' => $data['ttd_s_18'][$key] !== '' ? $data['ttd_s_18'][$key] : null,
                'ttd_m_ho' => $data['ttd_m_ho'][$key] !== '' ? $data['ttd_m_ho'][$key] : null,
                'ttd_m_23' => $data['ttd_m_23'][$key] !== '' ? $data['ttd_m_23'][$key] : null,
                'ttd_m_4' => $data['ttd_m_4'][$key] !== '' ? $data['ttd_m_4'][$key] : null,

                'created_at'                 => $value,
            );
            $this->db->insert('sm_pemantauan_restrain', $data_terapi);
        }
    }

    // PRR
    function editPemantauanRestrain($data)
    {
        return $this->db->where('id', $data['id'], true)->update('sm_pemantauan_restrain', $data);
    }

    // PRR + ubah
    function getPemantauanRestrain($id_layanan_pendaftaran)
    {
        return $this->db->select("pr.*, COALESCE(spg1.nama, '') as perawat_1,
                                        COALESCE(spg2.nama, '') as perawat_2,
                                        COALESCE(spg3.nama, '') as perawat_3, 
                                        COALESCE(wid.nama, '') as akun_user")
            ->from('sm_pemantauan_restrain as pr')
            ->join('sm_layanan_pendaftaran as lp', 'pr.id_layanan_pendaftaran = lp.id')
            ->join('sm_tenaga_medis stm1', 'pr.inisial_perawat_1 = stm1.id', 'left')
            ->join('sm_tenaga_medis stm2', 'pr.inisial_perawat_2 = stm2.id', 'left')
            ->join('sm_tenaga_medis stm3', 'pr.inisial_perawat_3 = stm3.id', 'left')
            ->join('sm_pegawai spg1', 'spg1.id = stm1.id_pegawai', 'left')
            ->join('sm_pegawai spg2', 'spg2.id = stm2.id_pegawai', 'left')
            ->join('sm_pegawai spg3', 'spg3.id = stm3.id_pegawai', 'left')
            ->join('sm_translucent sid', 'pr.id_user = sid.id', 'left')
            ->join('sm_pegawai wid', 'pr.id_user = wid.id', 'left')
            ->where('lp.id_pendaftaran', $id_layanan_pendaftaran, true)
            ->order_by('pr.tanggal_pemantauan', 'asc')
            ->get()
            ->result();
    }

    // PRR  + ubah
    function getPemantauanRestrainByID($id)
    {
        return $this->db->select("pr.*, COALESCE(spg1.nama, '') as perawat_1,
                                        COALESCE(spg2.nama, '') as perawat_2,
                                        COALESCE(spg3.nama, '') as perawat_3, 
                                        COALESCE(wid.nama, '') as akun_user")
            ->from('sm_pemantauan_restrain as pr')
            ->join('sm_tenaga_medis stm1', 'pr.inisial_perawat_1 = stm1.id', 'left')
            ->join('sm_tenaga_medis stm2', 'pr.inisial_perawat_2 = stm2.id', 'left')
            ->join('sm_tenaga_medis stm3', 'pr.inisial_perawat_3 = stm3.id', 'left')
            ->join('sm_pegawai spg1', 'spg1.id = stm1.id_pegawai', 'left')
            ->join('sm_pegawai spg2', 'spg2.id = stm2.id_pegawai', 'left')
            ->join('sm_pegawai spg3', 'spg3.id = stm3.id_pegawai', 'left')
            ->join('sm_translucent sid', 'pr.id_user = sid.id', 'left')
            ->join('sm_pegawai wid', 'pr.id_user = wid.id', 'left')
            ->where('pr.id', $id)
            ->order_by('pr.tanggal_pemantauan', 'asc')
            ->get()
            ->row();
    }

    // PRR
    function deletePemantauanRestrain($id)
    {
        return $this->db->where("id", $id)->delete("sm_pemantauan_restrain");
    }

    // PRLTDDP
    function insertPengkajianDekubitus($data)
    {
        foreach ($data['date_created'] as $key => $value) {
            $prltddp_tanggal_pengkajian = str_replace('/', '-', $data['tanggal_jam_prltddp'][$key]);
            $prltddp_tanggal_pengkajian = date("Y-m-d", strtotime($prltddp_tanggal_pengkajian));
            $data_terapi = array(
                'id_pendaftaran'            => $data['id_pendaftaran'],
                'id_layanan_pendaftaran'    => $data['id_layanan_pendaftaran'],
                'id_user'                   => $data['id_user'][$key],
                'tanggal_jam_prltddp'       => $prltddp_tanggal_pengkajian,
                'prltddp_jam'               => $data['prltddp_jam'][$key] !== '' ? $data['prltddp_jam'][$key] : null,
                'ceklis_prltddp'            => $data['ceklis_prltddp'][$key] !== '' ? $data['ceklis_prltddp'][$key] : null,
                'perawat_bidan_prltddp'     => $data['perawat_bidan_prltddp'][$key] !== '' ? $data['perawat_bidan_prltddp'][$key] : null,
                'prd_fisik'                 => $data['prd_fisik'][$key] !== '' ? $data['prd_fisik'][$key] : null,
                'prd_mental'                => $data['prd_mental'][$key] !== '' ? $data['prd_mental'][$key] : null,
                'prd_aktifitas'             => $data['prd_aktifitas'][$key] !== '' ? $data['prd_aktifitas'][$key] : null,
                'prd_mobilitas'             => $data['prd_mobilitas'][$key] !== '' ? $data['prd_mobilitas'][$key] : null,
                'prd_inkontinensia'         => $data['prd_inkontinensia'][$key] !== '' ? $data['prd_inkontinensia'][$key] : null,
                'total_nilai_prd'           => $data['total_nilai_prd'][$key] !== '' ? $data['total_nilai_prd'][$key] : null,
                'luka_rs_1'                 => $data['luka_rs_1'][$key] !== '' ? $data['luka_rs_1'][$key] : null,
                'luka_rs_2'                 => $data['luka_rs_2'][$key] !== '' ? $data['luka_rs_2'][$key] : null,
                'luka_rs_3'                 => $data['luka_rs_3'][$key] !== '' ? $data['luka_rs_3'][$key] : null,
                'etiologi_luka_1'           => $data['etiologi_luka_1'][$key] !== '' ? $data['etiologi_luka_1'][$key] : null,
                'etiologi_luka_2'           => $data['etiologi_luka_2'][$key] !== '' ? $data['etiologi_luka_2'][$key] : null,
                'etiologi_luka_3'           => $data['etiologi_luka_3'][$key] !== '' ? $data['etiologi_luka_3'][$key] : null,
                'etiologi_luka_4'           => $data['etiologi_luka_4'][$key] !== '' ? $data['etiologi_luka_4'][$key] : null,
                'etiologi_luka_5'           => $data['etiologi_luka_5'][$key] !== '' ? $data['etiologi_luka_5'][$key] : null,
                'gambar_klinis_1'           => $data['gambar_klinis_1'][$key] !== '' ? $data['gambar_klinis_1'][$key] : null,
                'gambar_klinis_2'           => $data['gambar_klinis_2'][$key] !== '' ? $data['gambar_klinis_2'][$key] : null,
                'gambar_klinis_3'           => $data['gambar_klinis_3'][$key] !== '' ? $data['gambar_klinis_3'][$key] : null,
                'gambar_klinis_4'           => $data['gambar_klinis_4'][$key] !== '' ? $data['gambar_klinis_4'][$key] : null,
                'eksudat_1'                 => $data['eksudat_1'][$key] !== '' ? $data['eksudat_1'][$key] : null,
                'eksudat_2'                 => $data['eksudat_2'][$key] !== '' ? $data['eksudat_2'][$key] : null,
                'eksudat_3'                 => $data['eksudat_3'][$key] !== '' ? $data['eksudat_3'][$key] : null,
                'eksudat_4'                 => $data['eksudat_4'][$key] !== '' ? $data['eksudat_4'][$key] : null,
                'bau_1'                     => $data['bau_1'][$key] !== '' ? $data['bau_1'][$key] : null,
                'bau_2'                     => $data['bau_2'][$key] !== '' ? $data['bau_2'][$key] : null,
                'bau_3'                     => $data['bau_3'][$key] !== '' ? $data['bau_3'][$key] : null,
                'created_at'                => $value,
            );
            // var_dump( $data_terapi);die;
            $this->db->insert('sm_pengkajian_dekubitus', $data_terapi);
        }
    }

    // PRLTDDP
    function editPengkajianDekubitus($data)
    {
        return $this->db->where('id', $data['id'], true)->update('sm_pengkajian_dekubitus', $data);
    }

    // PRLTDDP
    function getPengkajianDekubitus($id_layanan_pendaftaran)
    {
        return $this->db->select("prltddp.*, COALESCE(spg1.nama, '') as perawat_or_bidan,                                       
                                           COALESCE(wid.nama, '') as akun_user")
            ->from('sm_pengkajian_dekubitus as prltddp')
            ->join('sm_layanan_pendaftaran as lp', 'prltddp.id_layanan_pendaftaran = lp.id')
            ->join('sm_tenaga_medis stm1', 'prltddp.perawat_bidan_prltddp = stm1.id', 'left')
            ->join('sm_pegawai spg1', 'spg1.id = stm1.id_pegawai', 'left')
            ->join('sm_translucent sid', 'prltddp.id_user = sid.id', 'left')
            ->join('sm_pegawai wid', 'prltddp.id_user = wid.id', 'left')
            ->where('lp.id_pendaftaran', $id_layanan_pendaftaran, true)
            ->order_by('prltddp.tanggal_jam_prltddp', 'asc')
            ->get()
            ->result();
    }

    // PRLTDDP
    function getPengkajianDekubitusByID($id)
    {
        return $this->db->select("prltddp.*, COALESCE(spg1.nama, '') as perawat_or_bidan,                                       
                                            COALESCE(wid.nama, '') as akun_user")
            ->from('sm_pengkajian_dekubitus as prltddp')
            ->join('sm_tenaga_medis stm1', 'prltddp.perawat_bidan_prltddp = stm1.id', 'left')
            ->join('sm_pegawai spg1', 'spg1.id = stm1.id_pegawai', 'left')
            ->join('sm_translucent sid', 'prltddp.id_user = sid.id', 'left')
            ->join('sm_pegawai wid', 'prltddp.id_user = wid.id', 'left')
            ->where('prltddp.id', $id)
            ->order_by('prltddp.tanggal_jam_prltddp', 'asc')
            ->get()
            ->row();
    }

    // PPRLT
    function deletePengkajianDekubitus($id)
    {
        return $this->db->where("id", $id)->delete("sm_pengkajian_dekubitus");
    }

    // PPRLT
    function insertPemantauanDekubitus($data)
    {
        foreach ($data['date_created'] as $key => $value) {
            $tanggal_pemantauan_pprlt = str_replace('/', '-', $data['tanggal_pemantauan'][$key]);
            $tanggal_pemantauan_pprlt = date("Y-m-d", strtotime($tanggal_pemantauan_pprlt));
            $data_terapi = array(
                'id_pendaftaran'             => $data['id_pendaftaran'],
                'id_layanan_pendaftaran'     => $data['id_layanan_pendaftaran'],
                'inisialt_perawat_1'          => $data['inisialt_perawat_1'][$key] !== '' ? $data['inisialt_perawat_1'][$key] : null,
                'inisialt_perawat_2'          => $data['inisialt_perawat_2'][$key] !== '' ? $data['inisialt_perawat_2'][$key] : null,
                'inisialt_perawat_3'          => $data['inisialt_perawat_3'][$key] !== '' ? $data['inisialt_perawat_3'][$key] : null,
                'id_user'                    => $data['id_user'][$key],
                'tanggal_pemantauan'         => $tanggal_pemantauan_pprlt,

                'mengecek_p_ho' => $data['mengecek_p_ho'][$key] !== '' ? $data['mengecek_p_ho'][$key] : null,
                'mengecek_p_10' => $data['mengecek_p_10'][$key] !== '' ? $data['mengecek_p_10'][$key] : null,
                'mengecek_s_ho' => $data['mengecek_s_ho'][$key] !== '' ? $data['mengecek_s_ho'][$key] : null,
                'mengecek_s_18' => $data['mengecek_s_18'][$key] !== '' ? $data['mengecek_s_18'][$key] : null,
                'mengecek_m_ho' => $data['mengecek_m_ho'][$key] !== '' ? $data['mengecek_m_ho'][$key] : null,
                'mengecek_m_23' => $data['mengecek_m_23'][$key] !== '' ? $data['mengecek_m_23'][$key] : null,
                'mengecek_m_4' => $data['mengecek_m_4'][$key] !== '' ? $data['mengecek_m_4'][$key] : null,

                'mempertahankan_p_ho' => $data['mempertahankan_p_ho'][$key] !== '' ? $data['mempertahankan_p_ho'][$key] : null,
                'mempertahankan_p_10' => $data['mempertahankan_p_10'][$key] !== '' ? $data['mempertahankan_p_10'][$key] : null,
                'mempertahankan_s_ho' => $data['mempertahankan_s_ho'][$key] !== '' ? $data['mempertahankan_s_ho'][$key] : null,
                'mempertahankan_s_18' => $data['mempertahankan_s_18'][$key] !== '' ? $data['mempertahankan_s_18'][$key] : null,
                'mempertahankan_m_ho' => $data['mempertahankan_m_ho'][$key] !== '' ? $data['mempertahankan_m_ho'][$key] : null,
                'mempertahankan_m_23' => $data['mempertahankan_m_23'][$key] !== '' ? $data['mempertahankan_m_23'][$key] : null,
                'mempertahankan_m_4' => $data['mempertahankan_m_4'][$key] !== '' ? $data['mempertahankan_m_4'][$key] : null,

                'mengubah_p_ho' => $data['mengubah_p_ho'][$key] !== '' ? $data['mengubah_p_ho'][$key] : null,
                'mengubah_p_10' => $data['mengubah_p_10'][$key] !== '' ? $data['mengubah_p_10'][$key] : null,
                'mengubah_s_ho' => $data['mengubah_s_ho'][$key] !== '' ? $data['mengubah_s_ho'][$key] : null,
                'mengubah_s_18' => $data['mengubah_s_18'][$key] !== '' ? $data['mengubah_s_18'][$key] : null,
                'mengubah_m_ho' => $data['mengubah_m_ho'][$key] !== '' ? $data['mengubah_m_ho'][$key] : null,
                'mengubah_m_23' => $data['mengubah_m_23'][$key] !== '' ? $data['mengubah_m_23'][$key] : null,
                'mengubah_m_4' => $data['mengubah_m_4'][$key] !== '' ? $data['mengubah_m_4'][$key] : null,

                'memeriksa_p_ho' => $data['memeriksa_p_ho'][$key] !== '' ? $data['memeriksa_p_ho'][$key] : null,
                'memeriksa_p_10' => $data['memeriksa_p_10'][$key] !== '' ? $data['memeriksa_p_10'][$key] : null,
                'memeriksa_s_ho' => $data['memeriksa_s_ho'][$key] !== '' ? $data['memeriksa_s_ho'][$key] : null,
                'memeriksa_s_18' => $data['memeriksa_s_18'][$key] !== '' ? $data['memeriksa_s_18'][$key] : null,
                'memeriksa_m_ho' => $data['memeriksa_m_ho'][$key] !== '' ? $data['memeriksa_m_ho'][$key] : null,
                'memeriksa_m_23' => $data['memeriksa_m_23'][$key] !== '' ? $data['memeriksa_m_23'][$key] : null,
                'memeriksa_m_4' => $data['memeriksa_m_4'][$key] !== '' ? $data['memeriksa_m_4'][$key] : null,

                'ttdd_p_ho' => $data['ttdd_p_ho'][$key] !== '' ? $data['ttdd_p_ho'][$key] : null,
                'ttdd_p_10' => $data['ttdd_p_10'][$key] !== '' ? $data['ttdd_p_10'][$key] : null,
                'ttdd_s_ho' => $data['ttdd_s_ho'][$key] !== '' ? $data['ttdd_s_ho'][$key] : null,
                'ttdd_s_18' => $data['ttdd_s_18'][$key] !== '' ? $data['ttdd_s_18'][$key] : null,
                'ttdd_m_ho' => $data['ttdd_m_ho'][$key] !== '' ? $data['ttdd_m_ho'][$key] : null,
                'ttdd_m_23' => $data['ttdd_m_23'][$key] !== '' ? $data['ttdd_m_23'][$key] : null,
                'ttdd_m_4' => $data['ttdd_m_4'][$key] !== '' ? $data['ttdd_m_4'][$key] : null,

                'created_at'                 => $value,
            );
            // var_dump( $data_terapi);die;
            $this->db->insert('sm_pemantauan_dekubitus', $data_terapi);
        }
    }

    // PPRLT
    function editPemantauanDekubitus($data)
    {
        return $this->db->where('id', $data['id'], true)->update('sm_pemantauan_dekubitus', $data);
    }

    // PPRLT  + ubah
    function getPemantauanDekubitus($id_layanan_pendaftaran)
    {
        return $this->db->select("pprlt.*, COALESCE(spg1.nama, '') as perawat_1,
                                        COALESCE(spg2.nama, '') as perawat_2,
                                        COALESCE(spg3.nama, '') as perawat_3, 
                                        COALESCE(wid.nama, '') as akun_user")
            ->from('sm_pemantauan_dekubitus as pprlt')
            ->join('sm_layanan_pendaftaran as lp', 'pprlt.id_layanan_pendaftaran = lp.id')
            ->join('sm_tenaga_medis stm1', 'pprlt.inisialt_perawat_1 = stm1.id', 'left')
            ->join('sm_tenaga_medis stm2', 'pprlt.inisialt_perawat_2 = stm2.id', 'left')
            ->join('sm_tenaga_medis stm3', 'pprlt.inisialt_perawat_3 = stm3.id', 'left')
            ->join('sm_pegawai spg1', 'spg1.id = stm1.id_pegawai', 'left')
            ->join('sm_pegawai spg2', 'spg2.id = stm2.id_pegawai', 'left')
            ->join('sm_pegawai spg3', 'spg3.id = stm3.id_pegawai', 'left')
            ->join('sm_translucent sid', 'pprlt.id_user = sid.id', 'left')
            ->join('sm_pegawai wid', 'pprlt.id_user = wid.id', 'left')
            ->where('lp.id_pendaftaran', $id_layanan_pendaftaran, true)
            ->order_by('pprlt.tanggal_pemantauan', 'asc')
            ->get()
            ->result();
    }

    // PPRLT   + ubah
    function getPemantauanDekubitusByID($id)
    {
        return $this->db->select("pprlt.*, COALESCE(spg1.nama, '') as perawat_1,
                                        COALESCE(spg2.nama, '') as perawat_2,
                                        COALESCE(spg3.nama, '') as perawat_3, 
                                        COALESCE(wid.nama, '') as akun_user")
            ->from('sm_pemantauan_dekubitus as pprlt')
            ->join('sm_tenaga_medis stm1', 'pprlt.inisialt_perawat_1 = stm1.id', 'left')
            ->join('sm_tenaga_medis stm2', 'pprlt.inisialt_perawat_2 = stm2.id', 'left')
            ->join('sm_tenaga_medis stm3', 'pprlt.inisialt_perawat_3 = stm3.id', 'left')
            ->join('sm_pegawai spg1', 'spg1.id = stm1.id_pegawai', 'left')
            ->join('sm_pegawai spg2', 'spg2.id = stm2.id_pegawai', 'left')
            ->join('sm_pegawai spg3', 'spg3.id = stm3.id_pegawai', 'left')
            ->join('sm_translucent sid', 'pprlt.id_user = sid.id', 'left')
            ->join('sm_pegawai wid', 'pprlt.id_user = wid.id', 'left')
            ->where('pprlt.id', $id)
            ->order_by('pprlt.tanggal_pemantauan', 'asc')
            ->get()
            ->row();
    }

    // PPRLT
    function deletePemantauanDekubitus($id)
    {
        return $this->db->where("id", $id)->delete("sm_pemantauan_dekubitus");
    }

    // FCB
    function getAutoKamar($q, $start, $limit)
    {
        $limit = " limit " . $limit . " offset " . $start;
        $select = "select id, nama ";
        // $count = "select count(ru.id) as count ";
        $sql = "from sm_bangsal
                where nama ilike ('%" . $q . "%') 
                order by nama";
        $data["data"] = $this->db->query($select . $sql . $limit)->result();
        $data["total"] = $this->db->query($select . $sql)->num_rows();
        $this->db->close();
        return $data;
    }

    // FCB + ubah
    function getCodeBlue($id_pendaftaran)
    {
        return $this->db->select('fcb.*, pgd1.nama as dokter, bgs1.nama as nama_bangsal')
            ->from('sm_code_blue as fcb')
            ->join('sm_layanan_pendaftaran as lp', 'lp.id = fcb.id_layanan_pendaftaran')
            ->join('sm_tenaga_medis as tmd1 ', ' tmd1.id = fcb.dokter_fcb', 'left')
            ->join('sm_pegawai as pgd1 ', ' pgd1.id = tmd1.id_pegawai', 'left')
            ->join('sm_bangsal as bgs1', 'bgs1.id = fcb.bansal_fcb', 'left')
            ->where('lp.id_pendaftaran', $id_pendaftaran, true)
            ->get()
            ->row();
    }

    // FCB LOGS + ubah
    function getCodeBlueLogs($id_pendaftaran)
    {
        return $this->db->select('fcb.*, pgd1.nama as dokter, bgs1.nama as nama_bangsal, pgu.nama as user')
            ->from('sm_code_blue_logs as fcb')
            ->join('sm_layanan_pendaftaran as lp', 'lp.id = fcb.id_layanan_pendaftaran')
            ->join('sm_tenaga_medis as tmd1 ', ' tmd1.id = fcb.dokter_fcb', 'left')
            ->join('sm_pegawai as pgd1 ', ' pgd1.id = tmd1.id_pegawai', 'left')
            ->join('sm_bangsal as bgs1', 'bgs1.id = fcb.bansal_fcb', 'left')
            ->join('sm_translucent as tr', 'tr.id = fcb.id_users', 'left')
            ->join('sm_pegawai as pgu', 'pgu.id = tr.id', 'left')
            ->where('lp.id_pendaftaran', $id_pendaftaran, true)
            ->get()
            ->result();
    }

    // FCB
    function updateCodeBlue($FormCodeBlue, $id_fcb)
    {
        $datetime = date('Y-m-d H:i:s');
        if ($id_fcb === '') {
            $FormCodeBlue['created_date'] = $datetime;

            $this->db->insert('sm_code_blue', $FormCodeBlue);

            return ['status' => true, 'message' => 'Berhasil Menambahkan Data '];
        } else {
            $data_before_fcb = $this->db->select("*, '' as id_users, '' as tanggal_ubah_fcb")->from('sm_code_blue')->where('id', $id_fcb)->get()->row();

            unset($data_before_fcb->id);
            $data_before_fcb->id_users = $this->session->userdata('id_translucent');
            $data_before_fcb->tanggal_ubah_fcb = $datetime;

            $FormCodeBlue['updated_date'] = $datetime;

            $this->db->set($FormCodeBlue)->where('id', $id_fcb)->update('sm_code_blue');

            $this->db->insert('sm_code_blue_logs', $data_before_fcb);

            return ['status' => true, 'message' => 'Berhasil Mengubah Data '];
        }
    }

    // LMDT
    function insertLembarMonitoring($data)
    {
        foreach ($data['date_created'] as $key => $value) {
            $tanggal_lembar_monitoring = str_replace('/', '-', $data['tgl_fcb'][$key]);
            $tanggal_lembar_monitoring = date("Y-m-d", strtotime($tanggal_lembar_monitoring));
            $data_terapi = array(
                'id_pendaftaran'             => $data['id_pendaftaran'],
                'id_layanan_pendaftaran'     => $data['id_layanan_pendaftaran'],
                'id_user'                    => $data['id_user'][$key],
                'tgl_fcb'                    => $tanggal_lembar_monitoring,
                'jam_fcb'                    => $data['jam_fcb'][$key] !== '' ? $data['jam_fcb'][$key] : null,
                'terapi_eva_fcb'             => $data['terapi_eva_fcb'][$key] !== '' ? $data['terapi_eva_fcb'][$key] : null,
                'created_at'                 => $value,
            );
            // var_dump( $data_terapi);die;
            $this->db->insert('sm_lembar_monitoring', $data_terapi);
        }
    }

    // LMDT
    function editLembarMonitoring($data)
    {
        return $this->db->where('id', $data['id'], true)->update('sm_lembar_monitoring', $data);
    }

    // LMDT + ubah
    function getLembarMonitoring($id_layanan_pendaftaran)
    {
        return $this->db->select("lmdt.*, COALESCE(wid.nama, '') as akun_user")
            ->from('sm_lembar_monitoring as lmdt')
            ->join('sm_layanan_pendaftaran as lp', 'lmdt.id_layanan_pendaftaran = lp.id')
            ->join('sm_translucent sid', 'lmdt.id_user = sid.id', 'left')
            ->join('sm_pegawai wid', 'lmdt.id_user = wid.id', 'left')
            ->where('lp.id_pendaftaran', $id_layanan_pendaftaran, true)
            ->order_by('lmdt.tgl_fcb', 'asc')
            ->get()
            ->result();
    }

    // LMDT  + ubah
    function getLembarMonitoringByID($id)
    {
        return $this->db->select("lmdt.*, COALESCE(wid.nama, '') as akun_user")
            ->from('sm_lembar_monitoring as lmdt')
            ->join('sm_translucent sid', 'lmdt.id_user = sid.id', 'left')
            ->join('sm_pegawai wid', 'lmdt.id_user = wid.id', 'left')
            ->where('lmdt.id', $id)
            ->order_by('lmdt.tgl_fcb', 'asc')
            ->get()
            ->row();
    }

    // LMDT
    function deleteLembarMonitoring($id)
    {
        return $this->db->where("id", $id)->delete("sm_lembar_monitoring");
    }

    // PNCS
    function insertPengkajianNyeriComfortScale($data)
    {
        foreach ($data['date_created'] as $key => $value) {
            $tanggal_pengkajian_pncs = str_replace('/', '-', $data['tanggal_pengkajian'][$key]);
            $tanggal_pengkajian_pncs = date("Y-m-d", strtotime($tanggal_pengkajian_pncs));
            $data_terapi = array(
                'id_pendaftaran'            => $data['id_pendaftaran'],
                'id_layanan_pendaftaran'    => $data['id_layanan_pendaftaran'],
                'pncs_jam'                  => $data['pncs_jam'][$key] !== '' ? $data['pncs_jam'][$key] : null,
                'paraf_pncs'                => $data['paraf_pncs'][$key] !== '' ? $data['paraf_pncs'][$key] : null,
                'perawat_pncs'              => $data['perawat_pncs'][$key] !== '' ? $data['perawat_pncs'][$key] : null,
                'id_user'                   => $data['id_user'][$key],
                'tanggal_pengkajian'        => $tanggal_pengkajian_pncs,
                'kewaspadaan_pncs'            => $data['kewaspadaan_pncs'][$key] !== '' ? $data['kewaspadaan_pncs'][$key] : 0,
                'ketenangan_pncs'             => $data['ketenangan_pncs'][$key] !== '' ? $data['ketenangan_pncs'][$key] : 0,
                'distress_pncs'               => $data['distress_pncs'][$key] !== '' ? $data['distress_pncs'][$key] : 0,
                'menangis_pncs'               => $data['menangis_pncs'][$key] !== '' ? $data['menangis_pncs'][$key] : 0,
                'pergerakan_pncs'             => $data['pergerakan_pncs'][$key] !== '' ? $data['pergerakan_pncs'][$key] : 0,
                'tonus_pncs'                  => $data['tonus_pncs'][$key] !== '' ? $data['tonus_pncs'][$key] : 0,
                'tegangan_pncs'               => $data['tegangan_pncs'][$key] !== '' ? $data['tegangan_pncs'][$key] : 0,
                'tekanan_pncs'                => $data['tekanan_pncs'][$key] !== '' ? $data['tekanan_pncs'][$key] : 0,
                'denyut_pncs'                 => $data['denyut_pncs'][$key] !== '' ? $data['denyut_pncs'][$key] : 0,
                'jumlah_skor_pncs'            => $data['jumlah_skor_pncs'][$key],
                'created_at'                 => $value,
                // 'created_at'                 => $data['date_created'][$key],
            );

            $this->db->insert('sm_pengkajian_nyeri_comfort_scale', $data_terapi);
            // var_dump($data_terapi);die;
        }
    }

    // PNCS
    function editPengkajianNyeriComfortScale($data)
    {
        return $this->db->where('id', $data['id'], true)->update('sm_pengkajian_nyeri_comfort_scale', $data);
    }

    // PNCS
    function getPengkajianNyeriComfortScale($id_layanan_pendaftaran)
    {
        return $this->db->select("pncs.*, COALESCE(spg1.nama, '') as nama_perawat,
                                        COALESCE(wid.nama, '') as akun_user")
            ->from('sm_pengkajian_nyeri_comfort_scale as pncs')
            ->join('sm_layanan_pendaftaran as lp', 'pncs.id_layanan_pendaftaran = lp.id')
            ->join('sm_tenaga_medis stm1', 'pncs.perawat_pncs = stm1.id', 'left')
            ->join('sm_pegawai spg1', 'spg1.id = stm1.id_pegawai', 'left')
            ->join('sm_translucent sid', 'pncs.id_user = sid.id', 'left')
            ->join('sm_pegawai wid', 'pncs.id_user = wid.id', 'left')
            ->where('lp.id_pendaftaran', $id_layanan_pendaftaran, true)
            ->order_by('pncs.tanggal_pengkajian', 'asc')
            ->get()
            ->result();
    }

    // PNCS  
    function getPengkajianNyeriComfortScaleByID($id)
    {
        return $this->db->select("pncs.*,COALESCE(spg1.nama, '') as nama_perawat, 
                                         COALESCE(wid.nama, '') as akun_user")
            ->from('sm_pengkajian_nyeri_comfort_scale as pncs')
            ->join('sm_tenaga_medis stm1', 'pncs.perawat_pncs = stm1.id', 'left')
            ->join('sm_pegawai spg1', 'spg1.id = stm1.id_pegawai', 'left')
            ->join('sm_translucent sid', 'pncs.id_user = sid.id', 'left')
            ->join('sm_pegawai wid', 'pncs.id_user = wid.id', 'left')
            ->where('pncs.id', $id)
            ->order_by('pncs.tanggal_pengkajian', 'asc')
            ->get()
            ->row();
    }

    // PNCS
    function deletePengkajiannyericomfortscale($id)
    {
        return $this->db->where("id", $id)->delete("sm_pengkajian_nyeri_comfort_scale");
    }

    // case when fpu.is_pasien = '0' then fpu.no_rt else pa.no_rt::integer end as no_rt, 
    // case when fpu.is_pasien = '0' then fpu.no_rw else pa.no_rw::integer end as no_rw,
    public function getPersetujuanUmumById($id){
        $sql = "select fpu.*, pa.nama as nama_pasien, pd.no_register,
       			to_char(pa.tanggal_lahir, 'DD/MM/YYYY') as tanggal_lahir_pasien, 
       			pa.kelamin as kelamin_pasien, pa.id as no_rm,
       			date_part('year',age(pa.tanggal_lahir)) as umur_pasien,
       			case when fpu.is_pasien = '0' then fpu.nama_keluarga else pa.nama end as nama_keluarga,
       			case when fpu.is_pasien = '0' then fpu.jenis_kelamin::varchar else pa.kelamin::varchar end as jenis_kelamin,
       			case when fpu.is_pasien = '0' then fpu.tanggal_lahir else pa.tanggal_lahir end as tanggal_lahir,
       			case when fpu.is_pasien = '0' then date_part('year',age(fpu.tanggal_lahir)) else date_part('year',age(pa.tanggal_lahir)) end as umur,
       			case when fpu.is_pasien = '0' then fpu.alamat else pa.alamat end as alamat,
                case when fpu.is_pasien = '0' then fpu.no_rt::VARCHAR else COALESCE(NULLIF(pa.no_rt, ''), '')::VARCHAR end as no_rt, 
                case when fpu.is_pasien = '0' then fpu.no_rw::VARCHAR else COALESCE(NULLIF(pa.no_rw, ''), '')::VARCHAR end as no_rw,
       			case when fpu.is_pasien = '0' then fpu.provinsi::varchar else pa.nama_prop::varchar end as provinsi,
       			case when fpu.is_pasien = '0' then fpu.kota::varchar else pa.nama_kab::varchar end as kota,
       			case when fpu.is_pasien = '0' then fpu.kecamatan::varchar else pa.nama_kec::varchar end as kecamatan,
       			case when fpu.is_pasien = '0' then fpu.kelurahan::varchar else pa.nama_kel::varchar end as kelurahan,
				case when fpu.is_pasien = '0' then fpu.no_identitas else pa.no_identitas end as no_identitas,
				case when fpu.is_pasien = '0' then fpu.no_hp else pa.telp end as no_hp, fpu.hubungan_keluarga, peg.nama as nama_petugas,
				kab.\"NAMA_KAB\" as nama_kabupaten, kec.\"NAMA_KEC\" as nama_kecamatan, kel.\"NAMA_KEL\" as nama_kelurahan
				from sm_form_persetujuan_umum fpu 
				join sm_layanan_pendaftaran lp ON fpu.id_layanan_pendaftaran = lp.id
				join sm_pendaftaran pd ON lp.id_pendaftaran = pd.id
				join sm_pasien pa ON pd.id_pasien = pa.id
				join sm_pegawai peg ON fpu.id_user = peg.id
				left join sm_opendata_kabupaten kab on fpu.kota = kab.\"NO_KAB\" and kab.\"NO_KAB\" = fpu.kota and kab.\"NO_PROP\" = fpu.provinsi
				left join sm_opendata_kecamatan kec on fpu.kecamatan = kec.\"NO_KEC\" and kec.\"NO_KEC\" = fpu.kecamatan and kec.\"NO_PROP\" = fpu.provinsi and kec.\"NO_KAB\" = fpu.kota
				left join sm_opendata_kelurahan kel on fpu.kelurahan = kel.\"NO_KEL\" and kel.\"NO_KEL\" = fpu.kelurahan and kel.\"NO_PROP\" = fpu.provinsi and kel.\"NO_KAB\" = fpu.kota and kel.\"NO_KEC\" = fpu.kecamatan
				where lp.id_pendaftaran = '" . $id . "' ";

        return $this->db->query($sql)->row();
    }

    public function getRingkasanRiwayatMasukDanKeluarById($id)
    {
        $data =  $this->db->select("frrmdk.*, peg.nama as user, peg1.nama as nama_dpjp_utama_1, peg2.nama as nama_dpjp_utama_2, peg3.nama as nama_dpjp_utama_3
		, peg4.nama as nama_dpjp_utama_4, peg5.nama as nama_dpjp_tambahan_1, peg6.nama as nama_dpjp_tambahan_2, peg7.nama as nama_dpjp_tambahan_3, peg8.nama as nama_dpjp_tambahan_4,
		p.nama as nama_pasien, p.id as no_rm, to_char(p.tanggal_lahir, 'DD/MM/YYYY') as tanggal_lahir, ri.waktu_masuk as tanggal_masuk, ri.waktu_keluar as tanggal_keluar,
		date_part('year',age(p.tanggal_lahir)) as umur_pasien, concat (EXTRACT(year FROM AGE(p.tanggal_lahir)), ' thn ', EXTRACT(month FROM AGE(p.tanggal_lahir)), ' bln ', EXTRACT(day FROM AGE(p.tanggal_lahir)), ' hari') as umur,
		p.agama, p.tanggal_lahir, p.status_kawin, p.kelamin, bg.nama as bangsal, k.nama as kelas, pj.nama as penjamin, pp.berat_badan, lp.tindak_lanjut as status_pulang,
		concat_ws ('. ', ( SELECT gss.kode_icdx_rinci FROM sm_golongan_sebab_sakit AS gss WHERE gss.id = d.id_pengkodean ), ( SELECT gss.kode_icdx_rinci FROM sm_golongan_sebab_sakit AS gss WHERE gss.id = d.id_pengkodean_asterik ), gss.nama ) AS diag_awal,
		pp.is_died")
            ->from('sm_form_ringkasan_riwayat_masuk_dan_keluar frrmdk')
            ->join('sm_pegawai peg', 'frrmdk.id_user = peg.id')
            ->join('sm_tenaga_medis tm1', 'frrmdk.dpjp_utama_1 = tm1.id', 'left')
            ->join('sm_pegawai peg1', 'tm1.id_pegawai = peg1.id', 'left')
            ->join('sm_tenaga_medis tm2', 'frrmdk.dpjp_utama_2 = tm2.id', 'left')
            ->join('sm_pegawai peg2', 'tm2.id_pegawai = peg2.id', 'left')
            ->join('sm_tenaga_medis tm3', 'frrmdk.dpjp_utama_3 = tm3.id', 'left')
            ->join('sm_pegawai peg3', 'tm3.id_pegawai = peg3.id', 'left')
            ->join('sm_tenaga_medis tm4', 'frrmdk.dpjp_utama_4 = tm4.id', 'left')
            ->join('sm_pegawai peg4', 'tm4.id_pegawai = peg4.id', 'left')
            ->join('sm_tenaga_medis tm5', 'frrmdk.dpjp_tambahan_1 = tm5.id', 'left')
            ->join('sm_pegawai peg5', 'tm5.id_pegawai = peg5.id', 'left')
            ->join('sm_tenaga_medis tm6', 'frrmdk.dpjp_tambahan_2 = tm6.id', 'left')
            ->join('sm_pegawai peg6', 'tm6.id_pegawai = peg6.id', 'left')
            ->join('sm_tenaga_medis tm7', 'frrmdk.dpjp_tambahan_3 = tm7.id', 'left')
            ->join('sm_pegawai peg7', 'tm7.id_pegawai = peg7.id', 'left')
            ->join('sm_tenaga_medis tm8', 'frrmdk.dpjp_tambahan_4 = tm8.id', 'left')
            ->join('sm_pegawai peg8', 'tm8.id_pegawai = peg8.id', 'left')
            ->join('sm_layanan_pendaftaran lp', 'frrmdk.id_layanan_pendaftaran = lp.id')
            ->join('sm_penjamin pj', 'lp.id_penjamin = pj.id')
            ->join('sm_pendaftaran pd', 'lp.id_pendaftaran = pd.id')
            ->join('sm_pasien p', 'pd.id_pasien = p.id')
            ->join('sm_rawat_inap ri', 'lp.id = ri.id_layanan_pendaftaran', 'left')
            ->join('sm_kelas k', 'ri.id_kelas = k.id', 'left')
            ->join('sm_bangsal bg', 'ri.id_bangsal = k.id', 'left')
            ->join('sm_profil_pasien pp', 'p.id = pp.id_pasien', 'left')
            ->join('sm_diagnosa d', 'lp.id = d.id_layanan_pendaftaran', 'left')
            ->join('sm_golongan_sebab_sakit gss', "gss.id = d.id_golongan_sebab_sakit and d.prioritas = 'Utama'", 'left')
            ->where('lp.id_pendaftaran', $id)
            ->get()->row();

        // foreach ($data as $value) {
        if ($data) {
            $data->diagnosa_utama             = $this->getDiagnosaListLaporanByIdLayananPendaftaran($data->id_layanan_pendaftaran, 'Utama');
            $data->diagnosa_sekunder          = $this->getDiagnosaListLaporanByIdLayananPendaftaran($data->id_layanan_pendaftaran, 'Sekunder');
            $data->tindakan_utama             = $this->getODCByIdLayananPendaftaran($data->id_layanan_pendaftaran);
            $data->tindakan_sekunder          = $this->getTindakanOperasiByIdLayananPendaftaran($data->id_layanan_pendaftaran);
            $data->layanan_before             = $this->m_pelayanan->getLayananSpesialisasiBefore($data->id_layanan_pendaftaran);
            $data->diagnosa_penyebab_kematian = [];
            if ($data->is_died !== null && $data->is_died === 'Ya') {
                $data->diagnosa_penyebab_kematian = $this->getListDiagnosaPenyebabKematian($data->id_layanan_pendaftaran);
            }
        }
        // }

        return $data;
    }

    public function getDiagnosaListLaporanByIdLayananPendaftaran($id_layanan_pendaftaran, $prioritas)
    {
        $sql = "select
				concat(concat(case when gs2.kode_icdx_rinci is null then '' else ' [' end, gs2.kode_icdx_rinci, gs3.kode_icdx_rinci, case when gs2.kode_icdx_rinci is null then '' else '] ' end), case when d.id_golongan_sebab_sakit is not null then gs.nama else d.golongan_sebab_sakit_lain end) AS diagnosa
				FROM sm_layanan_pendaftaran AS lp
				LEFT JOIN sm_diagnosa AS d ON ( d.id_layanan_pendaftaran = lp.ID )
				LEFT JOIN sm_golongan_sebab_sakit AS gs ON ( gs.ID = d.id_golongan_sebab_sakit )
				LEFT JOIN sm_golongan_sebab_sakit AS gs2 ON ( gs2.ID = d.id_pengkodean )
				LEFT JOIN sm_golongan_sebab_sakit AS gs3 ON ( gs3.ID = d.id_pengkodean_asterik )
				WHERE lp.id = $id_layanan_pendaftaran ORDER BY d.prioritas desc";

        return $this->db->query($sql)->result();
    }

    public function getODCByIdLayananPendaftaran($id_layanan_pendaftaran)
    {
        return $this->db->select("l.nama as operasi")
            ->from('sm_jadwal_kamar_operasi jko')
            ->join('sm_tarif_pelayanan tp', 'tp.id = jko.id_tarif', 'left')
            ->join('sm_layanan as l', 'l.id = tp.id_layanan', 'left')
            ->where('jko.id_layanan_pendaftaran', $id_layanan_pendaftaran)
            ->where('jko.layanan', 'OK')
            ->get()->result();
    }

    public function getTindakanOperasiByIdLayananPendaftaran($id_layanan_pendaftaran)
    {
        return $this->db->select("l.nama as layanan")
            ->from('sm_tarif_tindakan_pasien ttp')
            ->join('sm_tarif_pelayanan tp', 'tp.id = ttp.id_tarif_pelayanan', 'left')
            ->join('sm_layanan as l', 'l.id = tp.id_layanan', 'left')
            ->where('ttp.id_layanan_pendaftaran', $id_layanan_pendaftaran)
            ->get()->result();
    }

    public function getListDiagnosaPenyebabKematian($id_layanan_pendaftaran)
    {
        $sql = "select
				concat(concat(case when gs2.kode_icdx_rinci is null then '' else ' [' end, gs2.kode_icdx_rinci, gs3.kode_icdx_rinci, case when gs2.kode_icdx_rinci is null then '' else '] ' end), case when d.id_golongan_sebab_sakit is not null then gs.nama else d.golongan_sebab_sakit_lain end) AS diagnosa
				FROM sm_layanan_pendaftaran AS lp
				LEFT JOIN sm_diagnosa AS d ON ( d.id_layanan_pendaftaran = lp.ID )
				LEFT JOIN sm_golongan_sebab_sakit AS gs ON ( gs.ID = d.id_golongan_sebab_sakit )
				LEFT JOIN sm_golongan_sebab_sakit AS gs2 ON ( gs2.ID = d.id_pengkodean )
				LEFT JOIN sm_golongan_sebab_sakit AS gs3 ON ( gs3.ID = d.id_pengkodean_asterik )
				WHERE lp.id = $id_layanan_pendaftaran
				AND d.penyebab_kematian = 'on'
				ORDER BY d.prioritas desc";

        return $this->db->query($sql)->result();
    }

    // pg.nama as nama_petugas_pendaftaran,
    // 



    function getSuratPengantarRawatById($id_pendaftaran){
        $sql = "select spr.*, pa.nama as nama_pasien, pd.id_pasien, 
							   pa.kelamin as kelamin_pasien, pa.id as no_rm, 
							   date_part('year',age(pa.tanggal_lahir)) as umur_pasien, 
							   pa.no_identitas, pa.alamat as alamat_pasien, pa.telp,
							   sp1.nama as nama_dokter_1,
							   sp1.tanda_tangan as ttd_dokter_1,
							   sp2.nama as nama_dokter_2,
							   sp2.tanda_tangan as ttd_dokter_2,
							   tmp.nama as id_users,
							   tmp.tanda_tangan as ttd_users,
                               pg.nama as nama_petugas_pendaftaran,
					           pg.tanda_tangan as ttd_petugas
				from sm_form_surat_pengantar_rawat spr	
				join sm_layanan_pendaftaran lp ON spr.id_layanan_pendaftaran = lp.id
				join sm_pendaftaran pd ON lp.id_pendaftaran = pd.id	
				join sm_pasien pa ON pd.id_pasien = pa.id
				left join sm_tenaga_medis tmd1 ON spr.dokter_spr = tmd1.id
				left join sm_pegawai sp1 ON tmd1.id_pegawai = sp1.id
				left join sm_tenaga_medis tmd2 ON spr.ttd_dokter_spr = tmd2.id
				left join sm_pegawai sp2 ON tmd2.id_pegawai = sp2.id
                left join sm_pegawai pg ON spr.id_petugas_pendaftaran_spr = pg.id
				left join sm_translucent st ON spr.id_users = st.id
				left join sm_pegawai tmp ON tmp.id = pd.id_users
				where pd.id = '" . $id_pendaftaran . "'
				order by 
				case 
				when spr.updated_on is not null then spr.updated_on
				else spr.created_date
				end desc";
        return $this->db->query($sql)->row();
    }

    function getTataTertibById($id)
    {
        $sql = "select ftt.*, pa.nama as nama_pasien, pa.kelamin as kelamin_pasien, pd.id_pasien, pa.tanggal_lahir as tanggal_lahir_pasien, pa.telp, (SELECT CONCAT(bg.nama, ' kelas ', k.nama, ' ruang ', ri.no_ruang, ' No. Bed ', ri.no_bed) FROM sm_rawat_inap as ri JOIN sm_layanan_pendaftaran as lpd ON lpd.id = ri.id_layanan_pendaftaran JOIN sm_bangsal as bg ON bg.id = ri.id_bangsal JOIN sm_kelas as k ON k.id= ri.id_kelas WHERE ri.id_layanan_pendaftaran = '" . $id . "') AS asal_ruangan
				from sm_form_tata_tertib ftt 							
				join sm_layanan_pendaftaran lp ON ftt.id_layanan_pendaftaran = lp.id
				join sm_pendaftaran pd ON lp.id_pendaftaran = pd.id
				join sm_pasien pa ON pd.id_pasien = pa.id
				where lp.id_pendaftaran = '" . $id . "' ";

        $data = $this->db->query($sql)->row();

        $penanggung_jawab = $this->db->select('p.nama_pjwb, p.telp_pjwb, p.alamat_pjwb, p.nik_pjwb, p.kelamin_pjwb, p.tgl_lahir_pjwb, p.hubungan_pjwb')
            ->from('sm_layanan_pendaftaran lp')
            ->join('sm_pendaftaran p', 'p.id = lp.id_pendaftaran')
            ->where('lp.id_pendaftaran', $id)->get()->row();

        return compact('data', 'penanggung_jawab');
    }

    public function getSuratPersetujuanRawatInap($id_pendaftaran, $pendaftaran_detail)
    {
        $data = $this->db->select('spri.*, pg.nama as nama_saksi')
            ->from('sm_form_persetujuan_rawat_inap spri')
            ->join('sm_layanan_pendaftaran lp', 'lp.id = spri.id_layanan_pendaftaran')
            ->join('sm_pegawai pg', 'spri.id_saksi = pg.id', 'left')
            ->where('lp.id_pendaftaran', $id_pendaftaran)
            ->get()->row();

        $pendaftaran = $pendaftaran_detail;

        $penanggung_jawab = $this->db->select('p.nama_pjwb, p.telp_pjwb, p.alamat_pjwb, p.nik_pjwb, p.kelamin_pjwb, p.tgl_lahir_pjwb, p.hubungan_pjwb')
            ->from('sm_layanan_pendaftaran lp')
            ->join('sm_pendaftaran p', 'p.id = lp.id_pendaftaran')
            ->where('lp.id_pendaftaran', $id_pendaftaran)->get()->row();

        return compact('data', 'pendaftaran', 'penanggung_jawab');
    }


    // SSCKO 1 
    function insertSurgicalSafetyCeklisKamarOperasi($data)
    {
        foreach ($data['date_created'] as $key => $value) {
            $tanggal_tindakan_sscko = str_replace('/', '-', $data['tanggal_tindakan'][$key]);
            $tanggal_tindakan_sscko = date("Y-m-d", strtotime($tanggal_tindakan_sscko));
            $data_terapi = array(
                'id_pendaftaran'                        => $data['id_pendaftaran'],
                'id_layanan_pendaftaran'                => $data['id_layanan_pendaftaran'],
                'id_user'                               => $data['id_user'][$key],
                'tanggal_tindakan'                      => $tanggal_tindakan_sscko,
                'sscko_jam_1'                           => $data['sscko_jam_1'][$key] !== '' ? $data['sscko_jam_1'][$key] : null,
                'sscko_jam_2'                           => $data['sscko_jam_2'][$key] !== '' ? $data['sscko_jam_2'][$key] : null,
                'sscko_jam_3'                           => $data['sscko_jam_3'][$key] !== '' ? $data['sscko_jam_3'][$key] : null,
                'sscko_igp'                              => $data['sscko_igp'][$key] !== '' ? $data['sscko_igp'][$key] : null,
                'sscko_lo'                              => $data['sscko_lo'][$key] !== '' ? $data['sscko_lo'][$key] : null,
                'sscko_prosedur'                          => $data['sscko_prosedur'][$key] !== '' ? $data['sscko_prosedur'][$key] : null,
                'sscko_sio'                              => $data['sscko_sio'][$key] !== '' ? $data['sscko_sio'][$key] : null,

                'sscko_tanda'                             => $data['sscko_tanda'][$key] !== '' ? $data['sscko_tanda'][$key] : null,

                'sscko_kemungkinan'                     => $data['sscko_kemungkinan'][$key] !== '' ? $data['sscko_kemungkinan'][$key] : null,

                'sscko_alergi'                              => $data['sscko_alergi'][$key] !== '' ? $data['sscko_alergi'][$key] : null,

                'sscko_resiko'                          => $data['sscko_resiko'][$key] !== '' ? $data['sscko_resiko'][$key] : null,

                'sscko_rencana'                          => $data['sscko_rencana'][$key] !== '' ? $data['sscko_rencana'][$key] : null,

                'sscko_adakah'                          => $data['sscko_adakah'][$key] !== '' ? $data['sscko_adakah'][$key] : null,

                'sscko_foto'                              => $data['sscko_foto'][$key] !== '' ? $data['sscko_foto'][$key] : null,

                'sscko_anastesi'                          => $data['sscko_anastesi'][$key] !== '' ? $data['sscko_anastesi'][$key] : null,

                'sscko_mesin'                              => $data['sscko_mesin'][$key] !== '' ? $data['sscko_mesin'][$key] : null,
                'sscko_monitor'                          => $data['sscko_monitor'][$key] !== '' ? $data['sscko_monitor'][$key] : null,
                'sscko_sebut'                              => $data['sscko_sebut'][$key] !== '' ? $data['sscko_sebut'][$key] : null,
                'sscko_jenis'                              => $data['sscko_jenis'][$key] !== '' ? $data['sscko_jenis'][$key] : null,
                'sscko_paraf_perawat_sign_in'           => $data['sscko_paraf_perawat_sign_in'][$key] !== '' ? $data['sscko_paraf_perawat_sign_in'][$key] : null,
                'sscko_perawat_sign_in'                 => $data['sscko_perawat_sign_in'][$key] !== '' ? $data['sscko_perawat_sign_in'][$key] : null,
                'sscko_paraf_dokter_anestesi_sign_in'   => $data['sscko_paraf_dokter_anestesi_sign_in'][$key] !== '' ? $data['sscko_paraf_dokter_anestesi_sign_in'][$key] : null,
                'sscko_dokter_anestesi_sign_in'         => $data['sscko_dokter_anestesi_sign_in'][$key] !== '' ? $data['sscko_dokter_anestesi_sign_in'][$key] : null,
                'sscko_konfirmasi'                      => $data['sscko_konfirmasi'][$key] !== '' ? $data['sscko_konfirmasi'][$key] : null,
                'sscko_np'                              => $data['sscko_np'][$key] !== '' ? $data['sscko_np'][$key] : null,
                'sscko_prosedurr'                          => $data['sscko_prosedurr'][$key] !== '' ? $data['sscko_prosedurr'][$key] : null,
                'sscko_lokasi'                          => $data['sscko_lokasi'][$key] !== '' ? $data['sscko_lokasi'][$key] : null,
                'sscko_antibiotik'                      => $data['sscko_antibiotik'][$key] !== '' ? $data['sscko_antibiotik'][$key] : null,
                'sscko_bedah'                              => $data['sscko_bedah'][$key] !== '' ? $data['sscko_bedah'][$key] : null,
                'sscko_anastesiii'                      => $data['sscko_anastesiii'][$key] !== '' ? $data['sscko_anastesiii'][$key] : null,
                'sscko_perawat'                          => $data['sscko_perawat'][$key] !== '' ? $data['sscko_perawat'][$key] : null,
                'sscko_paraf_perawat_time_out'          => $data['sscko_paraf_perawat_time_out'][$key] !== '' ? $data['sscko_paraf_perawat_time_out'][$key] : null,
                'sscko_perawat_time_out'                => $data['sscko_perawat_time_out'][$key] !== '' ? $data['sscko_perawat_time_out'][$key] : null,
                'sscko_paraf_dokter_anestesi_time_out'  => $data['sscko_paraf_dokter_anestesi_time_out'][$key] !== '' ? $data['sscko_paraf_dokter_anestesi_time_out'][$key] : null,
                'sscko_dokter_anestesi_time_out'        => $data['sscko_dokter_anestesi_time_out'][$key] !== '' ? $data['sscko_dokter_anestesi_time_out'][$key] : null,
                'sscko_operator_1'                      => $data['sscko_operator_1'][$key] !== '' ? $data['sscko_operator_1'][$key] : null,
                'sscko_npt'                              => $data['sscko_npt'][$key] !== '' ? $data['sscko_npt'][$key] : null,
                'sscko_instrumen'                          => $data['sscko_instrumen'][$key] !== '' ? $data['sscko_instrumen'][$key] : null,
                'sscko_specimen'                          => $data['sscko_specimen'][$key] !== '' ? $data['sscko_specimen'][$key] : null,
                'sscko_operator'                          => $data['sscko_operator'][$key] !== '' ? $data['sscko_operator'][$key] : null,
                'sscko_paraf_operator_2'                => $data['sscko_paraf_operator_2'][$key] !== '' ? $data['sscko_paraf_operator_2'][$key] : null,
                'sscko_operator_2'                      => $data['sscko_operator_2'][$key] !== '' ? $data['sscko_operator_2'][$key] : null,
                'sscko_paraf_dokter_anestesi_sign_out'  => $data['sscko_paraf_dokter_anestesi_sign_out'][$key] !== '' ? $data['sscko_paraf_dokter_anestesi_sign_out'][$key] : null,
                'sscko_dokter_anestesi_sign_out'        => $data['sscko_dokter_anestesi_sign_out'][$key] !== '' ? $data['sscko_dokter_anestesi_sign_out'][$key] : null,
                'sscko_paraf_operator_1'                => $data['sscko_paraf_operator_1'][$key] !== '' ? $data['sscko_paraf_operator_1'][$key] : null,
                'created_at'                             => $value,
            );
            $this->db->insert('sm_surgical_kamar_operasi', $data_terapi);
            // var_dump($data_terapi);die;
        }
    }

    // SSCKO 4
    function editSurgicalSafetyCheklistKamarOperasi($data)
    {
        return $this->db->where('id', $data['id'], true)->update('sm_surgical_kamar_operasi', $data);
    }

    // SSCKO 2
    function getSurgicalSafetyCheklisKamarOperasi($id_pendaftaran)
    {
        return $this->db->select("sscko.*, 	COALESCE(spg1.nama, '') as perawat_1,
											COALESCE(spg2.nama, '') as perawat_2,											
											COALESCE(spd1.nama, '') as dokter_1,
											COALESCE(spd2.nama, '') as dokter_2,
											COALESCE(spd3.nama, '') as dokter_3,
											COALESCE(spd4.nama, '') as operator_1_dokter,
                                            COALESCE(spd5.nama, '') as operator_2_dokter,
											COALESCE(wid.nama, '') as akun_user")

            ->from('sm_surgical_kamar_operasi as sscko')
            ->join('sm_layanan_pendaftaran as lp', 'sscko.id_layanan_pendaftaran = lp.id')
            // perawat
            ->join('sm_tenaga_medis tmp1', 'sscko.sscko_perawat_sign_in = tmp1.id', 'left')
            ->join('sm_tenaga_medis tmp2', 'sscko.sscko_perawat_time_out = tmp2.id', 'left')
            ->join('sm_pegawai spg1', 'spg1.id = tmp1.id_pegawai', 'left')
            ->join('sm_pegawai spg2', 'spg2.id = tmp2.id_pegawai', 'left')
            // dokter
            ->join('sm_tenaga_medis tmd1', 'tmd1.id = sscko.sscko_dokter_anestesi_sign_in', 'left')
            ->join('sm_tenaga_medis tmd2', 'tmd2.id = sscko.sscko_dokter_anestesi_time_out', 'left')
            ->join('sm_tenaga_medis tmd3', 'tmd3.id = sscko.sscko_dokter_anestesi_sign_out', 'left')
            ->join('sm_tenaga_medis tmd4', 'tmd4.id = sscko.sscko_operator_1', 'left')
            ->join('sm_tenaga_medis tmd5', 'tmd5.id = sscko.sscko_operator_2', 'left')
            ->join('sm_pegawai spd1', 'spd1.id= tmd1.id_pegawai ', 'left')
            ->join('sm_pegawai spd2', 'spd2.id= tmd2.id_pegawai ', 'left')
            ->join('sm_pegawai spd3', 'spd3.id= tmd3.id_pegawai ', 'left')
            ->join('sm_pegawai spd4', 'spd4.id= tmd4.id_pegawai ', 'left')
            ->join('sm_pegawai spd5', 'spd5.id = tmd5.id_pegawai', 'left')
            // user
            ->join('sm_translucent sid', 'sscko.id_user = sid.id', 'left')
            ->join('sm_pegawai wid', 'sscko.id_user = wid.id', 'left')
            ->where('lp.id_pendaftaran', $id_pendaftaran, true)
            ->order_by('sscko.tanggal_tindakan', 'asc')
            ->get()
            ->result();
    }

    // SSCKO 3
    function getSurgicalSafetyCheklisKamarOperasiByID($id)
    {
        return $this->db->select("sscko.*, 	COALESCE(spg1.nama, '') as perawat_1,
                                        COALESCE(spg2.nama, '') as perawat_2,                                        
                                        COALESCE(spd1.nama, '') as dokter_1,
                                        COALESCE(spd2.nama, '') as dokter_2,
                                        COALESCE(spd3.nama, '') as dokter_3,
                                        COALESCE(spd4.nama, '') as operator_1_dokter,
                                        COALESCE(spd5.nama, '') as operator_2_dokter,
                                        COALESCE(wid.nama, '') as akun_user")

            ->from('sm_surgical_kamar_operasi as sscko')
            // perawat
            ->join('sm_tenaga_medis tmp1', 'sscko.sscko_perawat_sign_in = tmp1.id', 'left')
            ->join('sm_tenaga_medis tmp2', 'sscko.sscko_perawat_time_out = tmp2.id', 'left')
            ->join('sm_pegawai spg1', 'spg1.id = tmp1.id_pegawai', 'left')
            ->join('sm_pegawai spg2', 'spg2.id = tmp2.id_pegawai', 'left')
            // dokter
            ->join('sm_tenaga_medis tmd1', 'tmd1.id = sscko.sscko_dokter_anestesi_sign_in', 'left')
            ->join('sm_tenaga_medis tmd2', 'tmd2.id = sscko.sscko_dokter_anestesi_time_out', 'left')
            ->join('sm_tenaga_medis tmd3', 'tmd3.id = sscko.sscko_dokter_anestesi_sign_out', 'left')
            ->join('sm_tenaga_medis tmd4', 'tmd4.id = sscko.sscko_operator_1', 'left')
            ->join('sm_tenaga_medis tmd5', 'tmd5.id = sscko.sscko_operator_2', 'left')
            ->join('sm_pegawai spd1', 'spd1.id= tmd1.id_pegawai ', 'left')
            ->join('sm_pegawai spd2', 'spd2.id= tmd2.id_pegawai ', 'left')
            ->join('sm_pegawai spd3', 'spd3.id= tmd3.id_pegawai ', 'left')
            ->join('sm_pegawai spd4', 'spd4.id= tmd4.id_pegawai ', 'left')
            ->join('sm_pegawai spd5', 'spd5.id = tmd5.id_pegawai', 'left')
            // user
            ->join('sm_translucent sid', 'sscko.id_user = sid.id', 'left')
            ->join('sm_pegawai wid', 'sscko.id_user = wid.id', 'left')
            ->where('sscko.id', $id)
            ->order_by('sscko.tanggal_tindakan', 'asc')
            ->get()
            ->row();
    }

    // SSCKO 5
    function deleteSurgicalSafetyCeklisKamarOperasi($id)
    {
        return $this->db->where("id", $id)->delete("sm_surgical_kamar_operasi");
    }

    function getResepByIdLayanan($id_layanan_pendaftaran)
    {
        $this->db->select("r.*, date(r.waktu) as tanggal, 
                            CONCAT_WS(' ',b.nama,b.kekuatan,s.nama, COALESCE(sd.nama,''), '<small><i>', COALESCE(pb.nama,''),'</i></small>') as nama_barang, 
                            pg.nama as dokter, p.nama as pasien, lp.jenis_layanan, p.alamat as alamat_pasien, p.id as no_rm, rrd.jumlah_pakai as jumlah, jko.layanan as layanan_ok,
                            rr.aturan_pakai, rrd.dosis_racik, rr.r_no as no_r, rr.keterangan_resep as ket_resep")
            ->from('sm_resep as r')
            ->join('sm_resep_r as rr', 'rr.id_resep = r.id')
            ->join('sm_resep_r_detail as rrd', 'rrd.id_resep_r = rr.id')
            ->join('sm_barang as b', 'b.id = rrd.id_barang')
            ->join('sm_satuan as s', 's.id = b.satuan_kekuatan', 'left')
            ->join('sm_sediaan as sd', 'sd.id = b.id_sediaan', 'left')
            ->join('sm_pabrik as pb', 'pb.id = b.id_pabrik', 'left')
            ->join('sm_tenaga_medis as d', 'd.id = r.id_dokter')
            ->join('sm_pegawai as pg', 'pg.id = d.id_pegawai')
            ->join('sm_pasien as p', 'p.id = r.id_pasien')
            ->join('sm_layanan_pendaftaran as lp', 'lp.id = r.id_layanan_pendaftaran')
            ->join('sm_jadwal_kamar_operasi as jko', 'jko.id_layanan_pendaftaran = lp.id', 'left')
            ->where('r.id is not null')
            ->where('r.id_layanan_pendaftaran', $id_layanan_pendaftaran, true)
            ->order_by('r.waktu desc');

        return $this->db->get()->result();
    }

    function getMpp($id_pendaftaran)
    {
        return $this->db
            ->select("smpp.*, COALESCE(sp_1.nama, '') as nama_petugas_1, COALESCE(sp_2.nama, '') as nama_petugas_2, COALESCE(sp_3.nama, '') as nama_petugas_3, COALESCE(sp_dokter.nama, '') as nama_dokter")
            ->from('sm_manajer_pelayanan_pasien as smpp')
            ->join('sm_layanan_pendaftaran as lp', 'lp.id = smpp.id_layanan_pendaftaran')
            ->join('sm_pendaftaran as pd', 'pd.id = lp.id_pendaftaran')
            ->join('sm_tenaga_medis as stm_1', 'stm_1.id = smpp.mpp_petugas_1', 'left')
            ->join('sm_pegawai as sp_1', 'sp_1.id = stm_1.id_pegawai', 'left')
            ->join('sm_tenaga_medis as stm_2', 'stm_2.id = smpp.mpp_petugas_2', 'left')
            ->join('sm_pegawai as sp_2', 'sp_2.id = stm_2.id_pegawai', 'left')
            ->join('sm_tenaga_medis as stm_3', 'stm_3.id = smpp.mpp_petugas_3', 'left')
            ->join('sm_pegawai as sp_3', 'sp_3.id = stm_3.id_pegawai', 'left')
            ->join('sm_tenaga_medis as stm_dokter', 'stm_dokter.id = smpp.mpp_dokter', 'left')
            ->join('sm_pegawai as sp_dokter', 'sp_dokter.id = stm_dokter.id_pegawai', 'left')
            ->where('smpp.id_pendaftaran', $id_pendaftaran)
            ->get()
            ->row();
        $this->db->close();
    }

    // SPPIP
    public function getSuratPeryataanPembaharuanIdentitasPasien($id_pendaftaran, $pendaftaran_detail)
    {
        $data = $this->db->from('sm_form_sppip_recall_implant sppip')
            ->join('sm_layanan_pendaftaran lp', 'lp.id = sppip.id_layanan_pendaftaran')
            ->where('lp.id_pendaftaran', $id_pendaftaran)
            ->get()->row();
        $pendaftaran = $pendaftaran_detail;
        $penanggung_jawab = $this->db->select("p.nama_pjwb, p.telp_pjwb, p.alamat_pjwb, p.nik_pjwb, p.kelamin_pjwb, p.tgl_lahir_pjwb, date_part('year', age(p.tgl_lahir_pjwb)) as umur, p.hubungan_pjwb")

            ->from('sm_layanan_pendaftaran lp')
            ->join('sm_pendaftaran p', 'p.id = lp.id_pendaftaran')
            ->where('lp.id_pendaftaran', $id_pendaftaran)->get()->row();
        return compact('data', 'pendaftaran', 'penanggung_jawab');
    }



    // TI 1 
	function insertTerapiInsulasi($data){
        foreach ($data['date_created'] as $key => $value) {
			$tanggal_pengkajian_ti = str_replace('/', '-', $data['tanggal_pengkajian'][$key]);
            $tanggal_pengkajian_ti = date("Y-m-d", strtotime($tanggal_pengkajian_ti));
            $data_terapi = array(
                'id_pendaftaran'                        => $data['id_pendaftaran'],
                'id_layanan_pendaftaran'                => $data['id_layanan_pendaftaran'],
				'id_user'                               => $data['id_user'][$key],			
				'tanggal_pengkajian'                            => $tanggal_pengkajian_ti,				
				'jam_ti'                                => $data['jam_ti'][$key] !== '' ? $data['jam_ti'][$key] : null,
				'jenis_insulin_ti'                      => $data['jenis_insulin_ti'][$key] !== '' ? $data['jenis_insulin_ti'][$key] : null,
				'dosis_ti'                              => $data['dosis_ti'][$key] !== '' ? $data['dosis_ti'][$key] : null,			
                'gula_darah_ti'                  		=> $data['gula_darah_ti'][$key] !== '' ? $data['gula_darah_ti'][$key] : null,
                'reduksi_ti'                  		    => $data['reduksi_ti'][$key] !== '' ? $data['reduksi_ti'][$key] : null,
                'keterangan_ti'                  	    => $data['keterangan_ti'][$key] !== '' ? $data['keterangan_ti'][$key] : null,
                'ttd_ti'                  		        => $data['ttd_ti'][$key] !== '' ? $data['ttd_ti'][$key] : null,
                'dokter_ti'                 		    => $data['dokter_ti'][$key] !== '' ? $data['dokter_ti'][$key] : null,            
                'perawat_ti'                            => $data['perawat_ti'][$key] !== '' ? $data['perawat_ti'][$key] : null,
                'created_at'                 			=> $value,
            );
            // var_dump($data_terapi);die;
            $this->db->insert('sm_terapi_insulin', $data_terapi);          
        }
    }

	// TI 4
	function editTerapiInsulin($data){
		return $this->db->where('id', $data['id'], true)->update('sm_terapi_insulin', $data);
	}

	// TI 2
	function getTerapiInsulin($id_layanan_pendaftaran){
        return $this->db->select("ti.*, 
                                    COALESCE(spg1.nama, '') as perawat,										
									COALESCE(spd1.nama, '') as dokter,
									COALESCE(wid.nama, '') as akun_user")
        ->from('sm_terapi_insulin as ti')
        ->join('sm_layanan_pendaftaran as lp', 'ti.id_layanan_pendaftaran = lp.id')
		// perawat
		->join('sm_tenaga_medis tmp1', 'ti.perawat_ti = tmp1.id', 'left')	
		->join('sm_pegawai spg1', 'spg1.id = tmp1.id_pegawai', 'left')
		 // dokter
        ->join('sm_tenaga_medis tmd1', 'tmd1.id = ti.dokter_ti', 'left')
		->join('sm_pegawai spd1', 'spd1.id= tmd1.id_pegawai ', 'left')
		// user
        ->join('sm_translucent sid', 'ti.id_user = sid.id', 'left')
        ->join('sm_pegawai wid', 'ti.id_user = wid.id', 'left')
        ->where('lp.id_pendaftaran', $id_layanan_pendaftaran, true)
        ->order_by('ti.tanggal_pengkajian', 'asc')
        ->get()
        ->result();
    }

	// TI 3
	function getTerapiInsulinByID($id){
        return $this->db->select("ti.*, 
                                    COALESCE(spg1.nama, '') as perawat,										
                                    COALESCE(spd1.nama, '') as dokter,
                                    COALESCE(wid.nama, '') as akun_user")
        ->from('sm_terapi_insulin as ti')
        // perawat
        ->join('sm_tenaga_medis tmp1', 'ti.perawat_ti = tmp1.id', 'left')	
        ->join('sm_pegawai spg1', 'spg1.id = tmp1.id_pegawai', 'left')
        // dokter
        ->join('sm_tenaga_medis tmd1', 'tmd1.id = ti.dokter_ti', 'left')
        ->join('sm_pegawai spd1', 'spd1.id= tmd1.id_pegawai ', 'left')
        // user
        ->join('sm_translucent sid', 'ti.id_user = sid.id', 'left')
        ->join('sm_pegawai wid', 'ti.id_user = wid.id', 'left')
        ->where('ti.id', $id)
		->order_by('ti.tanggal_pengkajian','asc')
        ->get()
        ->row();
    }

	// TI 5
	function deleteTerapiInsulin($id){
		return $this->db->where("id", $id)->delete("sm_terapi_insulin");
	}

    // TI LOGS
    function insertLogsTerapiInsulasi($data) { 
        return $this->db->insert('sm_terapi_insulin_logs', $data);
    }




    // PRDNR & FORM
    function getSuratPenolakanResusitas($id){
        // var_dump($id, $id_layanan_pendaftaran);die;
        $sql = "select prdnr.*, pa.nama as nama_pasien, pd.id_pasien, 
                    pa.kelamin as kelamin_pasien, pa.id as no_rm, 
                    date_part('year',age(pa.tanggal_lahir)) as umur_pasien, 
                    pa.no_identitas, pa.alamat as alamat_pasien, pa.telp,                 
                    pa.tanggal_lahir as tanggal_lahir_pasien,
                    sp.nama as nama_dokter_1,
                    sp2.nama as nama_dokter_2,                             
                    sp1.nama as dokter,
                    spg1.nama as perawat_1,
                    spg2.nama as perawat_2,
                    tmp.nama as id_user	
        from sm_penolakan_resusitas_dnr prdnr	
        join sm_layanan_pendaftaran lp ON prdnr.id_layanan_pendaftaran = lp.id
        join sm_pendaftaran pd ON lp.id_pendaftaran = pd.id	
        join sm_pasien pa ON pd.id_pasien = pa.id     
		left join sm_tenaga_medis tmd ON prdnr.dokter_pelaksana = tmd.id
		left join sm_pegawai sp ON tmd.id_pegawai = sp.id
		left join sm_tenaga_medis tmd2 ON prdnr.dokter_pemberi = tmd2.id
		left join sm_pegawai sp2 ON tmd2.id_pegawai = sp2.id
        left join sm_tenaga_medis tmd1 ON prdnr.dokter_prdnr = tmd1.id
        left join sm_pegawai sp1 ON tmd1.id_pegawai = sp1.id        
        left join sm_tenaga_medis tmp1 ON prdnr.perawat_prdnr_1 = tmp1.id
        left join sm_pegawai spg1 ON tmp1.id_pegawai = spg1.id
        left join sm_tenaga_medis tmp2 ON prdnr.perawat_prdnr_2 = tmp2.id
        left join sm_pegawai spg2 ON tmp2.id_pegawai = spg2.id
        left join sm_translucent st ON prdnr.id_user = st.id
        left join sm_pegawai tmp ON tmp.id = st.id                          
        where lp.id_pendaftaran = '" . $id . "' ";
        return $this->db->query($sql)->row();
    }

    // PRDNR & FORM
    function getLogSuratPenolakanResusitas($id_layanan_pendaftaran) {   
        $this->db->where('id_layanan_pendaftaran', $id_layanan_pendaftaran); // Menentukan kondisi "WHERE" pada query SQL untuk mengambil data berdasarkan id_layanan_pendaftaran
        $this->db->order_by('created_at', 'desc');  // Mengurutkan hasil berdasarkan kolom 'created_at' dari yang terbaru ke yang lama (descending)
        return $this->db->get('sm_penolakan_resusitas_dnr_logs')->result(); // Mengambil data dari tabel 'sm_penolakan_resusitas_dnr_logs' sesuai kondisi di atas dan mengembalikannya dalam bentuk array objek
    }







    // resep kaca mata
    function getRkm($id_pendaftaran)
    {
        return $this->db
            ->select("rkm.*, COALESCE(sp_dokter.nama, '') as nama_dokter")
            ->from('sm_resep_kaca_mata as rkm')
            ->join('sm_layanan_pendaftaran as lp', 'lp.id = rkm.id_layanan_pendaftaran')
            ->join('sm_pendaftaran as pd', 'pd.id = lp.id_pendaftaran')
            ->join('sm_tenaga_medis as stm_dokter', 'stm_dokter.id = rkm.rkm_dokter', 'left')
            ->join('sm_pegawai as sp_dokter', 'sp_dokter.id = stm_dokter.id_pegawai', 'left')
            ->where('rkm.id_pendaftaran', $id_pendaftaran)
            ->get()
            ->row();
        $this->db->close();
    }

    // get No RM
    function getNoRm($id_pendafataran)
    {
        return $this->db
            ->select("pd.id_pasien as noRM")
            ->from("sm_pendaftaran as pd")
            ->where('pd.id', $id_pendafataran)
            ->get()
            ->row();
        $this->db->close();
    }

    // Length/height-for-age BOYS
    function getGrafikLength($id_pasien)
    {
        $noRM = $id_pasien->noRM;

        $result = $this->db
            ->select("p.tanggal_lahir, sa.tinggi_badan, sa.waktu")
            ->from('sm_pasien AS p')
            ->join('sm_pendaftaran AS pd', 'pd.id_pasien = p.id')
            ->join('sm_layanan_pendaftaran AS lp', 'lp.id_pendaftaran = pd.id')
            ->join('sm_anamnesa AS sa', 'sa.id_layanan_pendaftaran = lp.id', 'left')
            ->where('p.id', $noRM)
            ->where('p.kelamin', 'L')
            ->order_by('sa.waktu asc')
            ->get()
            ->result();

        // Mengonversi format waktu menjadi DateTime
        foreach ($result as $row) {
            $tanggalLahir = new DateTime($row->tanggal_lahir);
            $waktu = new DateTime($row->waktu);

            // Menghitung umur dalam tahun, bulan, dan bulan saja
            $selisih = $waktu->diff($tanggalLahir);
            $row->umur_tahun = $selisih->y;
            $row->umur_bulan = $selisih->m;
            $row->umur_bulan_saja = ($selisih->y * 12) + $selisih->m;
        }

        return $result;
    }

    // head circumference-for-age BOYS
    function getGrafikHead($id_pasien)
    {
        $noRM = $id_pasien->noRM;

        $result = $this->db
            ->select("p.tanggal_lahir, sa.lingkar_kepala, sa.waktu")
            ->from('sm_pasien AS p')
            ->join('sm_pendaftaran AS pd', 'pd.id_pasien = p.id')
            ->join('sm_layanan_pendaftaran AS lp', 'lp.id_pendaftaran = pd.id')
            ->join('sm_anamnesa AS sa', 'sa.id_layanan_pendaftaran = lp.id', 'left')
            ->where('p.id', $noRM)
            ->where('p.kelamin', 'L')
            ->order_by('sa.waktu asc')
            ->get()
            ->result();

        // Mengonversi format waktu menjadi DateTime
        foreach ($result as $row) {
            $tanggalLahir = new DateTime($row->tanggal_lahir);
            $waktu = new DateTime($row->waktu);

            // Menghitung umur dalam tahun, bulan, dan bulan saja
            $selisih = $waktu->diff($tanggalLahir);
            $row->umur_tahun = $selisih->y;
            $row->umur_bulan = $selisih->m;
            $row->umur_bulan_saja = ($selisih->y * 12) + $selisih->m;
        }

        return $result;
    }

    // Weight-for-age BOYS
    function getGrafikWeight($id_pasien)
    {
        $noRM = $id_pasien->noRM;

        $result = $this->db
            ->select("p.tanggal_lahir, sa.berat_badan, sa.waktu")
            ->from('sm_pasien AS p')
            ->join('sm_pendaftaran AS pd', 'pd.id_pasien = p.id')
            ->join('sm_layanan_pendaftaran AS lp', 'lp.id_pendaftaran = pd.id')
            ->join('sm_anamnesa AS sa', 'sa.id_layanan_pendaftaran = lp.id', 'left')
            ->where('p.id', $noRM)
            ->where('p.kelamin', 'L')
            ->order_by('sa.waktu asc')
            ->get()
            ->result();

        // Mengonversi format waktu menjadi DateTime
        foreach ($result as $row) {
            $tanggalLahir = new DateTime($row->tanggal_lahir);
            $waktu = new DateTime($row->waktu);

            // Menghitung umur dalam tahun, bulan, dan bulan saja
            $selisih = $waktu->diff($tanggalLahir);
            $row->umur_tahun = $selisih->y;
            $row->umur_bulan = $selisih->m;
            $row->umur_bulan_saja = ($selisih->y * 12) + $selisih->m;
        }

        return $result;
    }

    // BMI-for-age BOYS
    function getGrafikBmi($id_pasien)
    {
        $noRM = $id_pasien->noRM;

        $result = $this->db
            ->select("p.tanggal_lahir, sa.berat_badan, sa.tinggi_badan, sa.waktu")
            ->from('sm_pasien AS p')
            ->join('sm_pendaftaran AS pd', 'pd.id_pasien = p.id')
            ->join('sm_layanan_pendaftaran AS lp', 'lp.id_pendaftaran = pd.id')
            ->join('sm_anamnesa AS sa', 'sa.id_layanan_pendaftaran = lp.id', 'left')
            ->where('p.id', $noRM)
            ->where('p.kelamin', 'L')
            ->order_by('sa.waktu asc')
            ->get()
            ->result();

        // Mengonversi format waktu menjadi DateTime
        foreach ($result as $row) {
            $tanggalLahir = new DateTime($row->tanggal_lahir);
            $waktu = new DateTime($row->waktu);

            // Menghitung umur dalam tahun, bulan, dan bulan saja
            $selisih = $waktu->diff($tanggalLahir);
            $row->umur_tahun = $selisih->y;
            $row->umur_bulan = $selisih->m;
            $row->umur_bulan_saja = ($selisih->y * 12) + $selisih->m;
        }

        return $result;
    }

    // Weight-for-height BOYS
    function getGrafikWfh($id_pasien)
    {
        $noRM = $id_pasien->noRM;

        $result = $this->db
            ->select("p.tanggal_lahir, sa.berat_badan, sa.tinggi_badan, sa.waktu")
            ->from('sm_pasien AS p')
            ->join('sm_pendaftaran AS pd', 'pd.id_pasien = p.id')
            ->join('sm_layanan_pendaftaran AS lp', 'lp.id_pendaftaran = pd.id')
            ->join('sm_anamnesa AS sa', 'sa.id_layanan_pendaftaran = lp.id', 'left')
            ->where('p.id', $noRM)
            ->where('p.kelamin', 'L')
            ->order_by('sa.waktu asc')
            ->get()
            ->result();

        // Mengonversi format waktu menjadi DateTime
        foreach ($result as $row) {
            $tanggalLahir = new DateTime($row->tanggal_lahir);
            $waktu = new DateTime($row->waktu);

            // Menghitung umur dalam tahun, bulan, dan bulan saja
            $selisih = $waktu->diff($tanggalLahir);
            $row->umur_tahun = $selisih->y;
            $row->umur_bulan = $selisih->m;
            $row->umur_bulan_saja = ($selisih->y * 12) + $selisih->m;
        }

        return $result;
    }

    // Weight-for-length BOYS
    function getGrafikWfl($id_pasien)
    {
        $noRM = $id_pasien->noRM;

        $result = $this->db
            ->select("p.tanggal_lahir, sa.berat_badan, sa.tinggi_badan, sa.waktu")
            ->from('sm_pasien AS p')
            ->join('sm_pendaftaran AS pd', 'pd.id_pasien = p.id')
            ->join('sm_layanan_pendaftaran AS lp', 'lp.id_pendaftaran = pd.id')
            ->join('sm_anamnesa AS sa', 'sa.id_layanan_pendaftaran = lp.id', 'left')
            ->where('p.id', $noRM)
            ->where('p.kelamin', 'L')
            ->order_by('sa.waktu asc')
            ->get()
            ->result();

        // Mengonversi format waktu menjadi DateTime
        foreach ($result as $row) {
            $tanggalLahir = new DateTime($row->tanggal_lahir);
            $waktu = new DateTime($row->waktu);

            // Menghitung umur dalam tahun, bulan, dan bulan saja
            $selisih = $waktu->diff($tanggalLahir);
            $row->umur_tahun = $selisih->y;
            $row->umur_bulan = $selisih->m;
            $row->umur_bulan_saja = ($selisih->y * 12) + $selisih->m;
        }

        return $result;
    }

    // Fenton preterm growth chart - boys
    function getGrafikFpg($id_pasien)
    {
        $noRM = $id_pasien->noRM;

        $result = $this->db
            ->select("p.tanggal_lahir, sa.berat_badan, sa.tinggi_badan, sa.lingkar_kepala, sa.waktu")
            ->from('sm_pasien AS p')
            ->join('sm_pendaftaran AS pd', 'pd.id_pasien = p.id')
            ->join('sm_layanan_pendaftaran AS lp', 'lp.id_pendaftaran = pd.id')
            ->join('sm_anamnesa AS sa', 'sa.id_layanan_pendaftaran = lp.id', 'left')
            ->where('p.id', $noRM)
            ->where('p.kelamin', 'P')
            ->order_by('sa.waktu asc')
            ->get()
            ->result();

        foreach ($result as $row) {
            $tanggalLahir = new DateTime($row->tanggal_lahir);
            $waktu = new DateTime($row->waktu);

            // Menghitung umur dalam tahun, bulan, dan minggu
            $selisih = $waktu->diff($tanggalLahir);
            $totalBulan = ($selisih->y * 12) + $selisih->m;
            $row->umur_tahun = $selisih->y;
            $row->umur_bulan = $selisih->m;
            $row->umur_bulan_saja = $totalBulan;
            $row->umur_minggu = floor($totalBulan * 4.345); // Menghitung jumlah minggu dari total bulan
        }

        return $result;
    }

    // Length/height-for-age GIRL
    function getGrafikLengthGirl($id_pasien)
    {
        $noRM = $id_pasien->noRM;

        $result = $this->db
            ->select("p.tanggal_lahir, sa.tinggi_badan, sa.waktu")
            ->from('sm_pasien AS p')
            ->join('sm_pendaftaran AS pd', 'pd.id_pasien = p.id')
            ->join('sm_layanan_pendaftaran AS lp', 'lp.id_pendaftaran = pd.id')
            ->join('sm_anamnesa AS sa', 'sa.id_layanan_pendaftaran = lp.id', 'left')
            ->where('p.id', $noRM)
            ->where('p.kelamin', 'P')
            ->order_by('sa.waktu asc')
            ->get()
            ->result();

        // Mengonversi format waktu menjadi DateTime
        foreach ($result as $row) {
            $tanggalLahir = new DateTime($row->tanggal_lahir);
            $waktu = new DateTime($row->waktu);

            // Menghitung umur dalam tahun, bulan, dan bulan saja
            $selisih = $waktu->diff($tanggalLahir);
            $row->umur_tahun = $selisih->y;
            $row->umur_bulan = $selisih->m;
            $row->umur_bulan_saja = ($selisih->y * 12) + $selisih->m;
        }

        return $result;
    }

    // head circumference-for-age GIRLS
    function getGrafikHeadGirls($id_pasien)
    {
        $noRM = $id_pasien->noRM;

        $result = $this->db
            ->select("p.tanggal_lahir, sa.lingkar_kepala, sa.waktu")
            ->from('sm_pasien AS p')
            ->join('sm_pendaftaran AS pd', 'pd.id_pasien = p.id')
            ->join('sm_layanan_pendaftaran AS lp', 'lp.id_pendaftaran = pd.id')
            ->join('sm_anamnesa AS sa', 'sa.id_layanan_pendaftaran = lp.id', 'left')
            ->where('p.id', $noRM)
            ->where('p.kelamin', 'P')
            ->order_by('sa.waktu asc')
            ->get()
            ->result();

        // Mengonversi format waktu menjadi DateTime
        foreach ($result as $row) {
            $tanggalLahir = new DateTime($row->tanggal_lahir);
            $waktu = new DateTime($row->waktu);

            // Menghitung umur dalam tahun, bulan, dan bulan saja
            $selisih = $waktu->diff($tanggalLahir);
            $row->umur_tahun = $selisih->y;
            $row->umur_bulan = $selisih->m;
            $row->umur_bulan_saja = ($selisih->y * 12) + $selisih->m;
        }

        return $result;
    }

    // Weight-for-height GIRLS
    function getGrafikWfhg($id_pasien)
    {
        $noRM = $id_pasien->noRM;

        $result = $this->db
            ->select("p.tanggal_lahir, sa.berat_badan, sa.tinggi_badan, sa.waktu")
            ->from('sm_pasien AS p')
            ->join('sm_pendaftaran AS pd', 'pd.id_pasien = p.id')
            ->join('sm_layanan_pendaftaran AS lp', 'lp.id_pendaftaran = pd.id')
            ->join('sm_anamnesa AS sa', 'sa.id_layanan_pendaftaran = lp.id', 'left')
            ->where('p.id', $noRM)
            ->where('p.kelamin', 'P')
            ->order_by('sa.waktu asc')
            ->get()
            ->result();

        // Mengonversi format waktu menjadi DateTime
        foreach ($result as $row) {
            $tanggalLahir = new DateTime($row->tanggal_lahir);
            $waktu = new DateTime($row->waktu);

            // Menghitung umur dalam tahun, bulan, dan bulan saja
            $selisih = $waktu->diff($tanggalLahir);
            $row->umur_tahun = $selisih->y;
            $row->umur_bulan = $selisih->m;
            $row->umur_bulan_saja = ($selisih->y * 12) + $selisih->m;
        }

        return $result;
    }

    // Weight-for-age GIRLS
    function getGrafikWeightGirl($id_pasien)
    {
        $noRM = $id_pasien->noRM;

        $result = $this->db
            ->select("p.tanggal_lahir, sa.berat_badan, sa.waktu")
            ->from('sm_pasien AS p')
            ->join('sm_pendaftaran AS pd', 'pd.id_pasien = p.id')
            ->join('sm_layanan_pendaftaran AS lp', 'lp.id_pendaftaran = pd.id')
            ->join('sm_anamnesa AS sa', 'sa.id_layanan_pendaftaran = lp.id', 'left')
            ->where('p.id', $noRM)
            ->where('p.kelamin', 'P')
            ->order_by('sa.waktu asc')
            ->get()
            ->result();

        // Mengonversi format waktu menjadi DateTime
        foreach ($result as $row) {
            $tanggalLahir = new DateTime($row->tanggal_lahir);
            $waktu = new DateTime($row->waktu);

            // Menghitung umur dalam tahun, bulan, dan bulan saja
            $selisih = $waktu->diff($tanggalLahir);
            $row->umur_tahun = $selisih->y;
            $row->umur_bulan = $selisih->m;
            $row->umur_bulan_saja = ($selisih->y * 12) + $selisih->m;
        }

        return $result;
    }

    // BMI-for-age GIRLS
    function getGrafikBmiGirl($id_pasien)
    {
        $noRM = $id_pasien->noRM;

        $result = $this->db
            ->select("p.tanggal_lahir, sa.berat_badan, sa.tinggi_badan, sa.waktu")
            ->from('sm_pasien AS p')
            ->join('sm_pendaftaran AS pd', 'pd.id_pasien = p.id')
            ->join('sm_layanan_pendaftaran AS lp', 'lp.id_pendaftaran = pd.id')
            ->join('sm_anamnesa AS sa', 'sa.id_layanan_pendaftaran = lp.id', 'left')
            ->where('p.id', $noRM)
            ->where('p.kelamin', 'P')
            ->order_by('sa.waktu asc')
            ->get()
            ->result();

        // Mengonversi format waktu menjadi DateTime
        foreach ($result as $row) {
            $tanggalLahir = new DateTime($row->tanggal_lahir);
            $waktu = new DateTime($row->waktu);

            // Menghitung umur dalam tahun, bulan, dan bulan saja
            $selisih = $waktu->diff($tanggalLahir);
            $row->umur_tahun = $selisih->y;
            $row->umur_bulan = $selisih->m;
            $row->umur_bulan_saja = ($selisih->y * 12) + $selisih->m;
        }

        return $result;
    }

    // Weight-for-height GIRLS
    function getGrafikWflg($id_pasien)
    {
        $noRM = $id_pasien->noRM;

        $result = $this->db
            ->select("p.tanggal_lahir, sa.berat_badan, sa.tinggi_badan, sa.waktu")
            ->from('sm_pasien AS p')
            ->join('sm_pendaftaran AS pd', 'pd.id_pasien = p.id')
            ->join('sm_layanan_pendaftaran AS lp', 'lp.id_pendaftaran = pd.id')
            ->join('sm_anamnesa AS sa', 'sa.id_layanan_pendaftaran = lp.id', 'left')
            ->where('p.id', $noRM)
            ->where('p.kelamin', 'P')
            ->order_by('sa.waktu asc')
            ->get()
            ->result();

        // Mengonversi format waktu menjadi DateTime
        foreach ($result as $row) {
            $tanggalLahir = new DateTime($row->tanggal_lahir);
            $waktu = new DateTime($row->waktu);

            // Menghitung umur dalam tahun, bulan, dan bulan saja
            $selisih = $waktu->diff($tanggalLahir);
            $row->umur_tahun = $selisih->y;
            $row->umur_bulan = $selisih->m;
            $row->umur_bulan_saja = ($selisih->y * 12) + $selisih->m;
        }

        return $result;
    }

    // Fenton preterm growth chart - girls
    function getGrafikFpgg($id_pasien)
    {
        $noRM = $id_pasien->noRM;

        $result = $this->db
            ->select("p.tanggal_lahir, sa.berat_badan, sa.tinggi_badan, sa.lingkar_kepala, sa.waktu")
            ->from('sm_pasien AS p')
            // ->join('sm_growth_girls AS gg', 'gg.id_layanan_pendaftaran = lp.id')
            ->join('sm_pendaftaran AS pd', 'pd.id_pasien = p.id')
            ->join('sm_layanan_pendaftaran AS lp', 'lp.id_pendaftaran = pd.id')
            ->join('sm_anamnesa AS sa', 'sa.id_layanan_pendaftaran = lp.id', 'left')
            ->where('p.id', $noRM)
            ->where('p.kelamin', 'L')
            ->order_by('sa.waktu asc')
            ->get()
            ->result();

        foreach ($result as $row) {
            $tanggalLahir = new DateTime($row->tanggal_lahir);
            $waktu = new DateTime($row->waktu);

            // Menghitung umur dalam tahun, bulan, dan minggu
            $selisih = $waktu->diff($tanggalLahir);
            $totalBulan = ($selisih->y * 12) + $selisih->m;
            $row->umur_tahun = $selisih->y;
            $row->umur_bulan = $selisih->m;
            $row->umur_bulan_saja = $totalBulan;
            $row->umur_minggu = floor($totalBulan * 4.345); // Menghitung jumlah minggu dari total bulan
        }

        return $result;
    }

    // Kelaikan Bekerja
    function getKb($id_layanan)
    {
        return $this->db
            ->select("kb.*")
            ->from('sm_mcu_16_00 as kb')
            ->join('sm_layanan_pendaftaran as lp', 'lp.id = kb.id_layanan_pendaftaran')
            ->join('sm_pendaftaran as pd', 'pd.id = lp.id_pendaftaran')
            ->where('kb.id_layanan_pendaftaran', $id_layanan)
            ->get()
            ->row();
        $this->db->close();
    }

    // Laporan pemeriksaan kesehatan
    function getLpk($id_layanan)
    {
        return $this->db
            ->select("lpk.*, COALESCE(sp.nama, '') as nama_dokter, sp.nip")
            ->from('sm_mcu_18_00 as lpk')
            ->join('sm_layanan_pendaftaran as lp', 'lp.id = lpk.id_layanan_pendaftaran')
            ->join('sm_pendaftaran as pd', 'pd.id = lp.id_pendaftaran')
            ->join('sm_tenaga_medis as stm', 'stm.id = lpk.lpk_dokter', 'left')
            ->join('sm_pegawai as sp', 'sp.id = stm.id_pegawai', 'left')
            ->where('lpk.id_layanan_pendaftaran', $id_layanan)
            ->order_by('lpk.lpk_tanggal desc')
            ->get()
            ->row();
        $this->db->close();
    }


    // TPERS UDAH ADA AU PUNYA SIAPA --> SENGAJA DI HIDE DULU TAKUT BENTROK PAS DI NAIKIN CHARIS -> Yang ini ga usah di buka
    // function getObatTerapiPulang($id){
    //     // var_dump($id);die;
    //  $sql = "select r.*,  COALESCE(sb.nama_lengkap, '') as nama_obat, COALESCE(pg.nama, '') as akun_user,
    //              rr.resep_r_jumlah as jumlah_obat, concat_ws(' ', rrd.dosis_racik, sat.nama) as dosis,
    //              case when rr.aturan_pakai_manual = '1' then rr.ket_aturan_pakai_manual else rr.aturan_pakai end as frekuensi,
    //              sb.roa as cara_pemberian, rr.keterangan_resep as petunjuk_khusus,
    //              rr.jam_pemberian_1 as ek_jam_pemberian, rr.jam_pemberian_2 as ek_jam_pemberian_satu, rr.jam_pemberian_3 as ek_jam_pemberian_dua,
    //              rr.jam_pemberian_4 as ek_jam_pemberian_tiga, rr.jam_pemberian_5 as ek_jam_pemberian_empat, rr.jam_pemberian_6 as ek_jam_pemberian_lima
    //          from sm_resep as r
    //          join sm_resep_r as rr on rr.id_resep = r.id
    //          join sm_resep_r_detail as rrd on rrd.id_resep_r = rr.id
    //          left join sm_barang as sb on sb.id = rrd.id_barang
    //          left join sm_satuan as sat on sat.id = sb.satuan_kekuatan
    //          left join sm_translucent as st on st.id = r.id_users
    //          left join sm_pegawai as pg on pg.id = st.id
    //          where r.id_layanan_pendaftaran = '" . $id . "' 
    //          and r.is_terapi_pulang = 1";
    //  return $this->db->query($sql)->result();
    // }

    function getTransferPasienExstraRS($id)
    {
        // var_dump($id);die;
        $sql = "select tpers.*, pa.nama as nama_pasien, pd.id_pasien, 
                pa.kelamin as kelamin_pasien, pa.id as no_rm, 
                date_part('year',age(pa.tanggal_lahir)) as umur_pasien, 
                pa.no_identitas, pa.alamat as alamat_pasien, pa.telp,                 
                pa.tanggal_lahir as tanggal_lahir_pasien,
                spg17.nama as perawat_1,
                spg18.nama as perawat_2,
                spg19.nama as perawat_3,
                spd1.nama as dokter_1,
                spd2.nama as dokter_2,
                spd3.nama as dokter_3, 
                spg1.nama as nama_perawat_1,
                spg2.nama as nama_perawat_2,
                spg3.nama as nama_perawat_3,
                spg4.nama as nama_perawat_4,
                spg5.nama as nama_perawat_5,
                spg6.nama as nama_perawat_6,
                spg7.nama as nama_perawat_7,
                spg8.nama as nama_perawat_8,
                spg9.nama as nama_perawat_9,
                spg10.nama as nama_perawat_10,
                spg11.nama as nama_perawat_11,
                spg12.nama as nama_perawat_12,
                spg13.nama as nama_perawat_13,
                spg14.nama as nama_perawat_14,
                spg15.nama as nama_perawat_15,
                spg16.nama as nama_perawat_16,
                tmp.nama as id_user
        from sm_form_tpers tpers    
        join sm_layanan_pendaftaran lp ON tpers.id_layanan_pendaftaran = lp.id
        join sm_pendaftaran pd ON lp.id_pendaftaran = pd.id 
        join sm_pasien pa ON pd.id_pasien = pa.id   
        left join sm_tenaga_medis tmp17 ON tpers.nama_tpers = tmp17.id
        left join sm_pegawai spg17 ON tmp17.id_pegawai = spg17.id
        left join sm_tenaga_medis tmp18 ON tpers.perawat_pendamping_tpers = tmp18.id
        left join sm_pegawai spg18 ON tmp18.id_pegawai = spg18.id
        left join sm_tenaga_medis tmp19 ON tpers.pj_shift_tpers = tmp19.id
        left join sm_pegawai spg19 ON tmp19.id_pegawai = spg19.id      
        left join sm_tenaga_medis tmd1 ON tpers.dokter_dpjp_tpers = tmd1.id
        left join sm_pegawai spd1 ON tmd1.id_pegawai = spd1.id
        left join sm_tenaga_medis tmd2 ON tpers.dokter_pendamping_tpers = tmd2.id
        left join sm_pegawai spd2 ON tmd2.id_pegawai = spd2.id
        left join sm_tenaga_medis tmd3 ON tpers.dokter_pem_tpers = tmd3.id
        left join sm_pegawai spd3 ON tmd3.id_pegawai = spd3.id        
        left join sm_tenaga_medis tmp1 ON tpers.petugas_opst_1 = tmp1.id
        left join sm_pegawai spg1 ON tmp1.id_pegawai = spg1.id
        left join sm_tenaga_medis tmp2 ON tpers.petugas_opst_2 = tmp2.id
        left join sm_pegawai spg2 ON tmp2.id_pegawai = spg2.id
        left join sm_tenaga_medis tmp3 ON tpers.petugas_opst_3 = tmp3.id
        left join sm_pegawai spg3 ON tmp3.id_pegawai = spg3.id
        left join sm_tenaga_medis tmp4 ON tpers.petugas_opst_4 = tmp4.id
        left join sm_pegawai spg4 ON tmp4.id_pegawai = spg4.id
        left join sm_tenaga_medis tmp5 ON tpers.petugas_opst_5 = tmp5.id
        left join sm_pegawai spg5 ON tmp5.id_pegawai = spg5.id
        left join sm_tenaga_medis tmp6 ON tpers.petugas_opst_6 = tmp6.id
        left join sm_pegawai spg6 ON tmp6.id_pegawai = spg6.id
        left join sm_tenaga_medis tmp7 ON tpers.petugas_opst_7 = tmp7.id
        left join sm_pegawai spg7 ON tmp7.id_pegawai = spg7.id
        left join sm_tenaga_medis tmp8 ON tpers.petugas_opst_8 = tmp8.id
        left join sm_pegawai spg8 ON tmp8.id_pegawai = spg8.id
        left join sm_tenaga_medis tmp9 ON tpers.petugas_opst_9 = tmp9.id
        left join sm_pegawai spg9 ON tmp9.id_pegawai = spg9.id
        left join sm_tenaga_medis tmp10 ON tpers.petugas_opst_10 = tmp10.id
        left join sm_pegawai spg10 ON tmp10.id_pegawai = spg10.id
        left join sm_tenaga_medis tmp11 ON tpers.petugas_opst_11 = tmp11.id
        left join sm_pegawai spg11 ON tmp11.id_pegawai = spg11.id
        left join sm_tenaga_medis tmp12 ON tpers.petugas_opst_12 = tmp12.id
        left join sm_pegawai spg12 ON tmp12.id_pegawai = spg12.id
        left join sm_tenaga_medis tmp13 ON tpers.petugas_opst_13 = tmp13.id
        left join sm_pegawai spg13 ON tmp13.id_pegawai = spg13.id
        left join sm_tenaga_medis tmp14 ON tpers.petugas_opst_14 = tmp14.id
        left join sm_pegawai spg14 ON tmp14.id_pegawai = spg14.id
        left join sm_tenaga_medis tmp15 ON tpers.petugas_opst_15 = tmp15.id
        left join sm_pegawai spg15 ON tmp15.id_pegawai = spg15.id
        left join sm_tenaga_medis tmp16 ON tpers.petugas_melakukan = tmp16.id
        left join sm_pegawai spg16 ON tmp16.id_pegawai = spg16.id
        left join sm_translucent st ON tpers.id_user = st.id
        left join sm_pegawai tmp ON tmp.id = st.id                          
        where lp.id_pendaftaran = '" . $id . "' ";
        return $this->db->query($sql)->row();
    }

    // TPERS + OPAT 
    function getDiagnosaManualUtama($id_daftar)
    {
        // var_dump($id_daftar);die;
        $sql = " select concat_ws ('. ', ( SELECT gss.kode_icdx_rinci FROM sm_golongan_sebab_sakit AS gss WHERE gss.id = d.id_pengkodean ), ( SELECT gss.kode_icdx_rinci FROM sm_golongan_sebab_sakit AS gss WHERE gss.id = d.id_pengkodean_asterik ), d.golongan_sebab_sakit_lain ) AS nama , lp.id as id_layanan_pendaftaran
            from sm_diagnosa d
            join sm_layanan_pendaftaran lp ON lp.id = d.id_layanan_pendaftaran 
            join sm_pendaftaran pd ON pd.id = lp.id_pendaftaran 
            where lp.id_pendaftaran = '" . $id_daftar . "'
            and lp.jenis_layanan not in('Poliklinik', 'IGD')
            and d.prioritas = 'Utama'
            and d.diagnosa_manual = '1'
            order by lp.id desc limit 1";
        return $this->db->query($sql)->result();
    }

    // TPERS + OPAT 
    function getDiagnosaManualSekunder($id_daftar)
    {
        // var_dump($id_daftar);die;
        $sql = " select distinct concat_ws ('. ', ( SELECT gss.kode_icdx_rinci FROM sm_golongan_sebab_sakit AS gss WHERE gss.ID = d.id_pengkodean ), ( SELECT gss.kode_icdx_rinci FROM sm_golongan_sebab_sakit AS gss WHERE gss.ID = d.id_pengkodean_asterik ), d.golongan_sebab_sakit_lain ) AS nama 
            from sm_diagnosa d
            left join sm_layanan_pendaftaran lp ON lp.id = d.id_layanan_pendaftaran 
            left join sm_pendaftaran pd ON pd.id = lp.id_pendaftaran 
            where lp.id_pendaftaran = '" . $id_daftar . "'       
            and d.prioritas = 'Sekunder'
            and d.diagnosa_manual = '1'";
        return $this->db->query($sql)->result();
    }

    // TPERS + OPAT 
    function getDiagnosaSekunder($id_daftar)
    {
        // var_dump($id_daftar);die;
        $sql = " select distinct concat_ws ('. ', ( SELECT gss.kode_icdx_rinci FROM sm_golongan_sebab_sakit AS gss WHERE gss.ID = d.id_pengkodean ), ( SELECT gss.kode_icdx_rinci FROM sm_golongan_sebab_sakit AS gss WHERE gss.ID = d.id_pengkodean_asterik ), gss.nama ) AS nama 
            from sm_diagnosa d
            left join sm_golongan_sebab_sakit gss ON gss.id = d.id_golongan_sebab_sakit 
            left join sm_layanan_pendaftaran lp ON lp.id = d.id_layanan_pendaftaran 
            left join sm_pendaftaran pd ON pd.id = lp.id_pendaftaran 
            where lp.id_pendaftaran = '" . $id_daftar . "'
            and lp.jenis_layanan not in('Poliklinik', 'IGD')
            and d.prioritas = 'Sekunder'
            and d.diagnosa_manual <> '1'";
        return $this->db->query($sql)->result();
    }

    // TPERS + OPAT 
    function getDiagnosa($id_daftar)
    {
        // var_dump($id_daftar);die;
        $sql = " select d.*, concat_ws ('. ', ( SELECT gss.kode_icdx_rinci FROM sm_golongan_sebab_sakit AS gss WHERE gss.id = d.id_pengkodean ), ( SELECT gss.kode_icdx_rinci FROM sm_golongan_sebab_sakit AS gss WHERE gss.id = d.id_pengkodean_asterik ), gss.nama ) AS nama , lp.id as id_layanan_pendaftaran
            from sm_diagnosa d
            left join sm_golongan_sebab_sakit gss ON gss.id = d.id_golongan_sebab_sakit 
            join sm_layanan_pendaftaran lp ON lp.id = d.id_layanan_pendaftaran 
            join sm_pendaftaran pd ON pd.id = lp.id_pendaftaran 
            where lp.id_pendaftaran = '" . $id_daftar . "' 
            and lp.jenis_layanan not in('Poliklinik', 'IGD')
            and d.prioritas = 'Utama'
            and d.diagnosa_manual <> '1'
            order by lp.id desc limit 1";
        return $this->db->query($sql)->result();
    }

    // TPERS + OPAT 
    function getLogTransferPasienExstraRS($id_layanan_pendaftaran) {   
        $this->db->where('id_layanan_pendaftaran', $id_layanan_pendaftaran); // Menentukan kondisi "WHERE" pada query SQL untuk mengambil data berdasarkan id_layanan_pendaftaran
        $this->db->order_by('created_at', 'desc');  // Mengurutkan hasil berdasarkan kolom 'created_at' dari yang terbaru ke yang lama (descending)
        return $this->db->get('sm_form_tpers_logs')->result(); // Mengambil data dari tabel 'sm_form_tpers_logs' sesuai kondisi di atas dan mengembalikannya dalam bentuk array objek
    }

    // DOA_D_O_A 
    public function getSuratKeteranganDOA($id_pendaftaran, $pendaftaran_detail)
    {
        $data = $this->db->select('sfd.*, spd.nama as nama_dokter,')
            ->from('sm_form_doa sfd')
            ->join('sm_layanan_pendaftaran lp', 'lp.id = sfd.id_layanan_pendaftaran')
            ->join('sm_tenaga_medis tmd', 'sfd.dokter_doa = tmd.id', 'left')
            ->join('sm_pegawai spd', 'tmd.id_pegawai = spd.id', 'left')
            ->where('lp.id_pendaftaran', $id_pendaftaran)
            ->get()->row();
        $pendaftaran = $pendaftaran_detail;
        $penanggung_jawab = $this->db->select("p.nama_pjwb, p.telp_pjwb, p.alamat_pjwb, p.nik_pjwb, p.kelamin_pjwb, p.tgl_lahir_pjwb, date_part('year', age(p.tgl_lahir_pjwb)) as umur, p.hubungan_pjwb")
            ->from('sm_layanan_pendaftaran lp')
            ->join('sm_pendaftaran p', 'p.id = lp.id_pendaftaran')
            ->where('lp.id_pendaftaran', $id_pendaftaran)->get()->row();
        return compact('data', 'pendaftaran', 'penanggung_jawab');
    }

    function getDiagnosaUtamaAwal($id_daftar)
    {
        $sql = " select concat_ws('. ', (SELECT gsa.kode_icdx_rinci
                                             FROM sm_golongan_sebab_sakit AS gsa
                                             WHERE gsa.ID = d.id_pengkodean),
                 (SELECT gss1.nama FROM sm_golongan_sebab_sakit AS gss1 WHERE gss1.ID = d.id_golongan_sebab_sakit),
                 d.golongan_sebab_sakit_lain) AS nama 
            from sm_diagnosa d
            left join sm_golongan_sebab_sakit gss ON gss.id = d.id_golongan_sebab_sakit
            join sm_layanan_pendaftaran lp ON lp.id = d.id_layanan_pendaftaran 
            where lp.id_pendaftaran = '" . $id_daftar . "' 
            and lp.jenis_layanan in('Poliklinik', 'IGD')
            and d.prioritas = 'Utama'
            and d.diagnosa_manual != '1'";
        return $this->db->query($sql)->result();
    }

    function getDiagnosaManualAwal($id_daftar)
    {
        $sql = " select concat_ws('. ', (SELECT gsa.kode_icdx_rinci
                                             FROM sm_golongan_sebab_sakit AS gsa
                                             WHERE gsa.ID = d.id_pengkodean),
                 (SELECT gss1.nama FROM sm_golongan_sebab_sakit AS gss1 WHERE gss1.ID = d.id_golongan_sebab_sakit),
                 d.golongan_sebab_sakit_lain) AS nama 
            from sm_diagnosa d
            left join sm_golongan_sebab_sakit gss ON gss.id = d.id_golongan_sebab_sakit
            join sm_layanan_pendaftaran lp ON lp.id = d.id_layanan_pendaftaran 
            where lp.id_pendaftaran = '" . $id_daftar . "' 
            and lp.jenis_layanan in('Poliklinik', 'IGD')
            and d.prioritas = 'Utama'
            and d.diagnosa_manual = '1'";
        return $this->db->query($sql)->result();
    }

    function getDiagnosaUtamaAkhir($id_daftar)
    {
        $sql = " select d.*, concat_ws ('. ', ( SELECT gss.kode_icdx_rinci FROM sm_golongan_sebab_sakit AS gss WHERE gss.id = d.id_pengkodean ), ( SELECT gss.kode_icdx_rinci FROM sm_golongan_sebab_sakit AS gss WHERE gss.id = d.id_pengkodean_asterik ), gss.nama ) AS nama , lp.id as id_layanan_pendaftaran
            from sm_diagnosa d
            left join sm_golongan_sebab_sakit gss ON gss.id = d.id_golongan_sebab_sakit 
            join sm_layanan_pendaftaran lp ON lp.id = d.id_layanan_pendaftaran 
            join sm_pendaftaran pd ON pd.id = lp.id_pendaftaran 
            where lp.id_pendaftaran = '" . $id_daftar . "' 
            and lp.jenis_layanan not in('Poliklinik', 'IGD')
            and d.prioritas = 'Utama'
            and d.diagnosa_manual <> '1'
            order by lp.id desc limit 1";
        return $this->db->query($sql)->result();
    }

    function getDiagnosaManualAkhir($id_daftar)
    {
        $sql = " select concat_ws ('. ', ( SELECT gss.kode_icdx_rinci FROM sm_golongan_sebab_sakit AS gss WHERE gss.id = d.id_pengkodean ), ( SELECT gss.kode_icdx_rinci FROM sm_golongan_sebab_sakit AS gss WHERE gss.id = d.id_pengkodean_asterik ), d.golongan_sebab_sakit_lain ) AS nama , lp.id as id_layanan_pendaftaran
            from sm_diagnosa d
            join sm_layanan_pendaftaran lp ON lp.id = d.id_layanan_pendaftaran 
            join sm_pendaftaran pd ON pd.id = lp.id_pendaftaran 
            where lp.id_pendaftaran = '" . $id_daftar . "'
            and lp.jenis_layanan not in('Poliklinik', 'IGD')
            and d.prioritas = 'Utama'
            and d.diagnosa_manual = '1'
            order by lp.id desc limit 1";
        return $this->db->query($sql)->result();
    }

    function getObatTerapiPulang($id)
    {
        $sql = "select r.*,  COALESCE(sb.nama_lengkap, '') as nama_obat, COALESCE(pg.nama, '') as akun_user,
                rr.resep_r_jumlah as jumlah_obat, concat_ws(' ', rrd.dosis_racik, sat.nama) as dosis,
                case when rr.aturan_pakai_manual = '1' then rr.ket_aturan_pakai_manual else rr.aturan_pakai end as frekuensi,
                sb.roa as cara_pemberian, rr.keterangan_resep as petunjuk_khusus,
                rr.jam_pemberian_1 as ek_jam_pemberian, rr.jam_pemberian_2 as ek_jam_pemberian_satu, rr.jam_pemberian_3 as ek_jam_pemberian_dua,
                rr.jam_pemberian_4 as ek_jam_pemberian_tiga, rr.jam_pemberian_5 as ek_jam_pemberian_empat, rr.jam_pemberian_6 as ek_jam_pemberian_lima
                from sm_resep as r
                join sm_resep_r as rr on rr.id_resep = r.id
                join sm_resep_r_detail as rrd on rrd.id_resep_r = rr.id
                left join sm_barang as sb on sb.id = rrd.id_barang
                left join sm_satuan as sat on sat.id = sb.satuan_kekuatan
                left join sm_translucent as st on st.id = r.id_users
                left join sm_pegawai as pg on pg.id = st.id
                where r.id_layanan_pendaftaran = '" . $id . "' 
                and r.is_terapi_pulang = 1";
        return $this->db->query($sql)->result();
    }




    // // Lembar Observasi
    // function getLo($id_layanan)
    // {
    //     return $this->db
    //         ->select("lo.*, COALESCE(p.nama, '') as nama_user")
    //         ->from('sm_kep_73_01 as lo')
    //         ->join('sm_layanan_pendaftaran as lp', 'lp.id = lo.id_layanan_pendaftaran')
    //         ->join('sm_pendaftaran as pd', 'pd.id = lp.id_pendaftaran')
    //         ->join('sm_translucent u', 'lo.id_user = u.id', 'left')
    //         ->join('sm_pegawai p', 'lo.id_user = p.id', 'left')
    //         ->where('lo.id_layanan_pendaftaran', $id_layanan)
    //         ->order_by('lo.lo_tgl desc')
    //         ->get()
    //         ->result();
    //     $this->db->close();
    //     // var_dump($id_layanan);die;
    // }

    // // Lembar Observasi
    // function getLoByID($id)
    // {
    //     // var_dump($id);die;
    //     return $this->db
    //         ->select("lo.*, COALESCE(p.nama, '') as nama_user")
    //         ->from('sm_kep_73_01 as lo')
    //         ->join('sm_layanan_pendaftaran as lp', 'lp.id = lo.id_layanan_pendaftaran')
    //         ->join('sm_pendaftaran as pd', 'pd.id = lp.id_pendaftaran')
    //         ->join('sm_translucent u', 'lo.id_user = u.id', 'left')
    //         ->join('sm_pegawai p', 'lo.id_user = p.id', 'left')
    //         ->where('lo.id', $id)
    //         ->get()
    //         ->row();
    //     $this->db->close();
    // }

    // // Lembar Observasi
    // function deleteLo($id)
    // {
    //     return $this->db->where("id", $id)->delete("sm_kep_73_01");
    // }


    
    // Lembar Observasi
    function getLo($id_layanan){
        return $this->db
            ->select("lo.*, COALESCE(p.nama, '') as nama_user")
            ->from('sm_kep_73_01 as lo')
            ->join('sm_layanan_pendaftaran as lp', 'lp.id = lo.id_layanan_pendaftaran')
            ->join('sm_pendaftaran as pd', 'pd.id = lp.id_pendaftaran')
            ->join('sm_translucent u', 'lo.id_user = u.id', 'left')
            ->join('sm_pegawai p', 'lo.id_user = p.id', 'left')
            ->where('lo.id_layanan_pendaftaran', $id_layanan)
            ->order_by('lo.lo_tgl desc')
            ->get()
            ->result();
        $this->db->close();
        // var_dump($id_layanan);die;
    }

    // Lembar Observasi
    function getLoByID($id){
        return $this->db
            ->select("lo.*, COALESCE(p.nama, '') as nama_user")
            ->from('sm_kep_73_01 as lo')
            ->join('sm_layanan_pendaftaran as lp', 'lp.id = lo.id_layanan_pendaftaran')
            ->join('sm_pendaftaran as pd', 'pd.id = lp.id_pendaftaran')
            ->join('sm_translucent u', 'lo.id_user = u.id', 'left')
            ->join('sm_pegawai p', 'lo.id_user = p.id', 'left')
            ->where('lo.id', $id)
            ->get()
            ->row();
        $this->db->close();
    }

    // Lembar Observasi
    function deleteLo($id){
        return $this->db->where("id", $id)->delete("sm_kep_73_01");
    }

    // LEMBAR OBSERVASI
    function logsLo($data, $aksi = 'update', $id_user = null) {
        if (!$data) return false;
        // Hapus kolom yang tidak boleh masuk ke tabel logs
        unset($data['id']);
        unset($data['nama_user']); // Kolom ini udah kamu hapus dari tabel logs
        $log_data = $data;
        $log_data['log_action'] = $aksi;
        $log_data['log_by'] = $id_user;
        $log_data['log_at'] = date('Y-m-d H:i:s');

        return $this->db->insert('sm_kep_73_01_logs', $log_data);
    }





    // ICPMK 
    public function getSuratInformedConsentPMK($id_pendaftaran, $pendaftaran_detail)
    {
        $data = $this->db->select('icpmk.*, spg1.nama as nama_perawat_1,
                                            spg2.nama as nama_perawat_2,
                                            spd.nama as nama_dokter')
            ->from('sm_form_informed_consent_pmk icpmk')
            ->join('sm_layanan_pendaftaran lp', 'lp.id = icpmk.id_layanan_pendaftaran')
            ->join('sm_tenaga_medis tmp1', 'icpmk.perawat_1_icpmk = tmp1.id', 'left')
            ->join('sm_pegawai spg1', 'tmp1.id_pegawai = spg1.id', 'left')
            ->join('sm_tenaga_medis tmp2', 'icpmk.perawat_2_icpmk = tmp2.id', 'left')
            ->join('sm_pegawai spg2', 'tmp2.id_pegawai = spg2.id', 'left')
            ->join('sm_tenaga_medis tmd', 'icpmk.dokter_icpmk = tmd.id', 'left')
            ->join('sm_pegawai spd', 'tmd.id_pegawai = spd.id', 'left')
            ->where('lp.id_pendaftaran', $id_pendaftaran)
            ->get()->row();
        $pendaftaran = $pendaftaran_detail;
        $penanggung_jawab = $this->db->select("p.nama_pjwb, p.telp_pjwb, p.alamat_pjwb, p.nik_pjwb, p.kelamin_pjwb, p.tgl_lahir_pjwb, date_part('year', age(p.tgl_lahir_pjwb)) as umur, p.hubungan_pjwb")
            ->from('sm_layanan_pendaftaran lp')
            ->join('sm_pendaftaran p', 'p.id = lp.id_pendaftaran')
            ->where('lp.id_pendaftaran', $id_pendaftaran)->get()->row();
        return compact('data', 'pendaftaran', 'penanggung_jawab');
    }


    // KPEGD 
    function getDiagnosaManualUtamaKPEGD($id_daftar){
        $sql = " select concat_ws ('. ', ( SELECT gss.kode_icdx_rinci FROM sm_golongan_sebab_sakit AS gss WHERE gss.id = d.id_pengkodean ), ( SELECT gss.kode_icdx_rinci FROM sm_golongan_sebab_sakit AS gss WHERE gss.id = d.id_pengkodean_asterik ), d.golongan_sebab_sakit_lain ) AS nama , lp.id as id_layanan_pendaftaran
            from sm_diagnosa d
            join sm_layanan_pendaftaran lp ON lp.id = d.id_layanan_pendaftaran 
            join sm_pendaftaran pd ON pd.id = lp.id_pendaftaran 
            where lp.id_pendaftaran = '" . $id_daftar . "'
            and lp.jenis_layanan not in('Poliklinik', 'IGD')
            and d.prioritas = 'Utama'
            and d.diagnosa_manual = '1'
            order by lp.id desc limit 1";
        return $this->db->query($sql)->result();
    }

    // KPEGD 
    function getDiagnosaManualSekunderKPEGD($id_daftar){
        $sql = " select distinct concat_ws ('. ', ( SELECT gss.kode_icdx_rinci FROM sm_golongan_sebab_sakit AS gss WHERE gss.ID = d.id_pengkodean ), ( SELECT gss.kode_icdx_rinci FROM sm_golongan_sebab_sakit AS gss WHERE gss.ID = d.id_pengkodean_asterik ), d.golongan_sebab_sakit_lain ) AS nama 
            from sm_diagnosa d
            left join sm_layanan_pendaftaran lp ON lp.id = d.id_layanan_pendaftaran 
            left join sm_pendaftaran pd ON pd.id = lp.id_pendaftaran 
            where lp.id_pendaftaran = '" . $id_daftar . "'       
            and d.prioritas = 'Sekunder'
            and d.diagnosa_manual = '1'";
        return $this->db->query($sql)->result();
    }

    // SKKM 
    function getSuratKeteranganKesediaanMembayar($id) {
        $sql = "SELECT skkm.*, 
                pa.nama AS nama_pasien, 
                pd.id_pasien, 
                pa.kelamin AS kelamin_pasien, 
                pa.id AS no_rm, 
                date_part('year',age(pa.tanggal_lahir)) AS umur_pasien, 
                pa.no_identitas, 
                pa.alamat AS alamat_pasien, 
                pa.telp, 
                pa.tanggal_lahir AS tanggal_lahir_pasien,
                tmp.nama AS id_user,
                p.nama_pjwb AS penanggung_jawab_nama, 
                p.telp_pjwb AS penanggung_jawab_telp, 
                p.alamat_pjwb AS penanggung_jawab_alamat, 
                p.nik_pjwb AS penanggung_jawab_nik, 
                p.kelamin_pjwb AS penanggung_jawab_kelamin, 
                p.tgl_lahir_pjwb AS penanggung_jawab_tgl_lahir, 
                date_part('year', age(p.tgl_lahir_pjwb)) AS penanggung_jawab_umur, 
                p.hubungan_pjwb AS penanggung_jawab_hubungan
        FROM sm_surat_pernyataan_kesediaan_membayar skkm    
        JOIN sm_layanan_pendaftaran lp ON skkm.id_layanan_pendaftaran = lp.id
        JOIN sm_pendaftaran pd ON lp.id_pendaftaran = pd.id 
        JOIN sm_pasien pa ON pd.id_pasien = pa.id   
        LEFT JOIN sm_translucent st ON skkm.id_user = st.id
        LEFT JOIN sm_pegawai tmp ON tmp.id = st.id
        JOIN sm_pendaftaran p ON p.id = lp.id_pendaftaran                        
        WHERE lp.id_pendaftaran = '" . $id . "'";
        return $this->db->query($sql)->row();
    }

    // // SPPPMK
    // function getSuratPernyataanPersetujuanPenolakanMedisKhusus($id) {
    //     $sql = "SELECT spppmk.*, 
    //             pa.nama AS nama_pasien, 
    //             pd.id_pasien, 
    //             pa.kelamin AS kelamin_pasien, 
    //             pa.id AS no_rm, 
    //             date_part('year',age(pa.tanggal_lahir)) AS umur_pasien, 
    //             pa.no_identitas, 
    //             pa.alamat AS alamat_pasien, 
    //             pa.telp, 
    //             pa.tanggal_lahir AS tanggal_lahir_pasien,
    //             tmp.nama AS id_user,
    //             p.nama_pjwb AS penanggung_jawab_nama, 
    //             p.telp_pjwb AS penanggung_jawab_telp, 
    //             p.alamat_pjwb AS penanggung_jawab_alamat, 
    //             p.nik_pjwb AS penanggung_jawab_nik, 
    //             p.kelamin_pjwb AS penanggung_jawab_kelamin, 
    //             p.tgl_lahir_pjwb AS penanggung_jawab_tgl_lahir, 
    //             date_part('year', age(p.tgl_lahir_pjwb)) AS penanggung_jawab_umur, 
    //             spd1.nama as nama_dokter,
    //             p.hubungan_pjwb AS penanggung_jawab_hubungan
    //     FROM sm_surat_pernyataan_persetujuan_pmk spppmk    
    //     JOIN sm_layanan_pendaftaran lp ON spppmk.id_layanan_pendaftaran = lp.id
    //     JOIN sm_pendaftaran pd ON lp.id_pendaftaran = pd.id 
    //     JOIN sm_pasien pa ON pd.id_pasien = pa.id  
    //     LEFT JOIN sm_tenaga_medis tmd1 ON spppmk.dokterspppmk = tmd1.id
    //     LEFT JOIN sm_pegawai spd1 ON tmd1.id_pegawai = spd1.id
    //     LEFT JOIN sm_translucent st ON spppmk.id_user = st.id
    //     LEFT JOIN sm_pegawai tmp ON tmp.id = st.id
    //     JOIN sm_pendaftaran p ON p.id = lp.id_pendaftaran                        
    //     WHERE lp.id_pendaftaran = '" . $id . "'";
    //     return $this->db->query($sql)->row();
    // }

    // Ceklis Harian Akses Sentral
    function getChas($id_layanan)
    {
        return $this->db
            ->select("chas.*, COALESCE(p.nama, '') as nama_user, COALESCE(sp.nama, '') as chas_nama_perawat_pagi, COALESCE(sp1.nama, '') as chas_nama_perawat_sore, COALESCE(sp2.nama, '') as chas_nama_perawat_malam ")
            ->from('sm_kep_126_00 as chas')
            ->join('sm_layanan_pendaftaran as lp', 'lp.id = chas.id_layanan_pendaftaran')
            ->join('sm_pendaftaran as pd', 'pd.id = lp.id_pendaftaran')

            // user
            ->join('sm_translucent u', 'chas.id_user = u.id', 'left')
            ->join('sm_pegawai p', 'chas.id_user = p.id', 'left')

            // chas_perawat_pagi
            ->join('sm_tenaga_medis as stm', 'stm.id = chas.chas_perawat_pagi', 'left')
            ->join('sm_pegawai as sp', 'sp.id = stm.id_pegawai', 'left')

            // chas_perawat_sore
            ->join('sm_tenaga_medis as stm1', 'stm1.id = chas.chas_perawat_sore', 'left')
            ->join('sm_pegawai as sp1', 'sp1.id = stm1.id_pegawai', 'left')

            // chas_perawat_malam
            ->join('sm_tenaga_medis as stm2', 'stm2.id = chas.chas_perawat_malam', 'left')
            ->join('sm_pegawai as sp2', 'sp2.id = stm2.id_pegawai', 'left')

            ->where('chas.id_layanan_pendaftaran', $id_layanan)
            ->order_by('chas.chas_tgl desc')
            ->get()
            ->result();
        $this->db->close();
    }

    // Ceklis Harian Akses Sentral
    function getChasByID($id)
    {
        // var_dump($id);die;
        return $this->db
            ->select("chas.*, COALESCE(p.nama, '') as nama_user, COALESCE(sp.nama, '') as chas_nama_perawat_pagi, COALESCE(sp1.nama, '') as chas_nama_perawat_sore, COALESCE(sp2.nama, '') as chas_nama_perawat_malam ")
            ->from('sm_kep_126_00 as chas')
            ->join('sm_layanan_pendaftaran as lp', 'lp.id = chas.id_layanan_pendaftaran')
            ->join('sm_pendaftaran as pd', 'pd.id = lp.id_pendaftaran')

            // user
            ->join('sm_translucent u', 'chas.id_user = u.id', 'left')
            ->join('sm_pegawai p', 'chas.id_user = p.id', 'left')

            // chas_perawat_pagi
            ->join('sm_tenaga_medis as stm', 'stm.id = chas.chas_perawat_pagi', 'left')
            ->join('sm_pegawai as sp', 'sp.id = stm.id_pegawai', 'left')

            // chas_perawat_sore
            ->join('sm_tenaga_medis as stm1', 'stm1.id = chas.chas_perawat_sore', 'left')
            ->join('sm_pegawai as sp1', 'sp1.id = stm1.id_pegawai', 'left')

            // chas_perawat_malam
            ->join('sm_tenaga_medis as stm2', 'stm2.id = chas.chas_perawat_malam', 'left')
            ->join('sm_pegawai as sp2', 'sp2.id = stm2.id_pegawai', 'left')
            ->where('chas.id', $id)
            ->get()
            ->row();
        $this->db->close();
    }

    // Ceklis Harian Akses Sentral
    function deleteChas($id)
    {
        return $this->db->where("id", $id)->delete("sm_kep_126_00");
    }


    // RAK 1 
    function insertRencanaAsuhanKebidanan($data)
    {
        foreach ($data['date_created'] as $key => $value) {
            $tgl_rak = str_replace('/', '-', $data['tanggal_rak'][$key]);
            $tgl_rak = date("Y-m-d", strtotime($tgl_rak));
            $data_terapi = array(
                'id_pendaftaran'          => $data['id_pendaftaran'],
                'id_layanan_pendaftaran'  => $data['id_layanan_pendaftaran'],
                'id_user'                 => $data['id_user'][$key],
                'tanggal_rak'        => $tgl_rak,
                'g_rak_1'            => $data['g_rak_1'][$key] !== '' ? $data['g_rak_1'][$key] : null,
                'p_rak_1'            => $data['p_rak_1'][$key] !== '' ? $data['p_rak_1'][$key] : null,
                'a_rak_1'            => $data['a_rak_1'][$key] !== '' ? $data['a_rak_1'][$key] : null,

                'losp_rak'           => $data['losp_rak'][$key] !== '' ? $data['losp_rak'][$key] : null,
                'pagi_rak_1'         => $data['pagi_rak_1'][$key] !== '' ? $data['pagi_rak_1'][$key] : null,
                'siang_rak_1'        => $data['siang_rak_1'][$key] !== '' ? $data['siang_rak_1'][$key] : null,
                'malam_rak_1'        => $data['malam_rak_1'][$key] !== '' ? $data['malam_rak_1'][$key] : null,

                'hm_rak_1'           => $data['hm_rak_1'][$key] !== '' ? $data['hm_rak_1'][$key] : null,
                'ds3m_rak'           => $data['ds3m_rak'][$key] !== '' ? $data['ds3m_rak'][$key] : null,
                'pagi_rak_2'         => $data['pagi_rak_2'][$key] !== '' ? $data['pagi_rak_2'][$key] : null,
                'siang_rak_2'        => $data['siang_rak_2'][$key] !== '' ? $data['siang_rak_2'][$key] : null,
                'malam_rak_2'        => $data['malam_rak_2'][$key] !== '' ? $data['malam_rak_2'][$key] : null,

                'pkI_rak'            => $data['pkI_rak'][$key] !== '' ? $data['pkI_rak'][$key] : null,
                'hks3m_rak'          => $data['hks3m_rak'][$key] !== '' ? $data['hks3m_rak'][$key] : null,
                'pagi_rak_3'         => $data['pagi_rak_3'][$key] !== '' ? $data['pagi_rak_3'][$key] : null,
                'siang_rak_3'        => $data['siang_rak_3'][$key] !== '' ? $data['siang_rak_3'][$key] : null,
                'malam_rak_3'        => $data['malam_rak_3'][$key] !== '' ? $data['malam_rak_3'][$key] : null,

                'bI_rak'             => $data['bI_rak'][$key] !== '' ? $data['bI_rak'][$key] : null,
                'ns3m_rak'           => $data['ns3m_rak'][$key] !== '' ? $data['ns3m_rak'][$key] : null,
                'pagi_rak_4'         => $data['pagi_rak_4'][$key] !== '' ? $data['pagi_rak_4'][$key] : null,
                'siang_rak_4'        => $data['siang_rak_4'][$key] !== '' ? $data['siang_rak_4'][$key] : null,
                'malam_rak_4'        => $data['malam_rak_4'][$key] !== '' ? $data['malam_rak_4'][$key] : null,

                'rptm_rak'           => $data['rptm_rak'][$key] !== '' ? $data['rptm_rak'][$key] : null,
                'pss4j_rak'          => $data['pss4j_rak'][$key] !== '' ? $data['pss4j_rak'][$key] : null,
                'pagi_rak_5'         => $data['pagi_rak_5'][$key] !== '' ? $data['pagi_rak_5'][$key] : null,
                'siang_rak_5'        => $data['siang_rak_5'][$key] !== '' ? $data['siang_rak_5'][$key] : null,
                'malam_rak_5'        => $data['malam_rak_5'][$key] !== '' ? $data['malam_rak_5'][$key] : null,

                'cemas_rak'          => $data['cemas_rak'][$key] !== '' ? $data['cemas_rak'][$key] : null,
                'tddss4j_rak'        => $data['tddss4j_rak'][$key] !== '' ? $data['tddss4j_rak'][$key] : null,
                'pagi_rak_6'         => $data['pagi_rak_6'][$key] !== '' ? $data['pagi_rak_6'][$key] : null,
                'siang_rak_6'        => $data['siang_rak_6'][$key] !== '' ? $data['siang_rak_6'][$key] : null,
                'malam_rak_6'        => $data['malam_rak_6'][$key] !== '' ? $data['malam_rak_6'][$key] : null,

                'N_rak'              => $data['N_rak'][$key] !== '' ? $data['N_rak'][$key] : null,
                'pus24j_rak'         => $data['pus24j_rak'][$key] !== '' ? $data['pus24j_rak'][$key] : null,
                'pagi_rak_7'         => $data['pagi_rak_7'][$key] !== '' ? $data['pagi_rak_7'][$key] : null,
                'siang_rak_7'        => $data['siang_rak_7'][$key] !== '' ? $data['siang_rak_7'][$key] : null,
                'malam_rak_7'        => $data['malam_rak_7'][$key] !== '' ? $data['malam_rak_7'][$key] : null,

                'ke_rak'             => $data['ke_rak'][$key] !== '' ? $data['ke_rak'][$key] : null,
                'fiumpp_rak'         => $data['fiumpp_rak'][$key] !== '' ? $data['fiumpp_rak'][$key] : null,
                'pagi_rak_8'         => $data['pagi_rak_8'][$key] !== '' ? $data['pagi_rak_8'][$key] : null,
                'siang_rak_8'        => $data['siang_rak_8'][$key] !== '' ? $data['siang_rak_8'][$key] : null,
                'malam_rak_8'        => $data['malam_rak_8'][$key] !== '' ? $data['malam_rak_8'][$key] : null,

                'fiumdm_rak'         => $data['fiumdm_rak'][$key] !== '' ? $data['fiumdm_rak'][$key] : null,
                'pagi_rak_9'         => $data['pagi_rak_9'][$key] !== '' ? $data['pagi_rak_9'][$key] : null,
                'siang_rak_9'        => $data['siang_rak_9'][$key] !== '' ? $data['siang_rak_9'][$key] : null,
                'malam_rak_9'        => $data['malam_rak_9'][$key] !== '' ? $data['malam_rak_9'][$key] : null,

                'fiub_rak'            => $data['fiub_rak'][$key] !== '' ? $data['fiub_rak'][$key] : null,
                'pagi_rak_10'         => $data['pagi_rak_10'][$key] !== '' ? $data['pagi_rak_10'][$key] : null,
                'siang_rak_10'        => $data['siang_rak_10'][$key] !== '' ? $data['siang_rak_10'][$key] : null,
                'malam_rak_10'        => $data['malam_rak_10'][$key] !== '' ? $data['malam_rak_10'][$key] : null,

                'ajiumk_rak'          => $data['ajiumk_rak'][$key] !== '' ? $data['ajiumk_rak'][$key] : null,
                'pagi_rak_11'         => $data['pagi_rak_11'][$key] !== '' ? $data['pagi_rak_11'][$key] : null,
                'siang_rak_11'        => $data['siang_rak_11'][$key] !== '' ? $data['siang_rak_11'][$key] : null,
                'malam_rak_11'        => $data['malam_rak_11'][$key] !== '' ? $data['malam_rak_11'][$key] : null,

                'atrumn_rak'          => $data['atrumn_rak'][$key] !== '' ? $data['atrumn_rak'][$key] : null,
                'pagi_rak_12'         => $data['pagi_rak_12'][$key] !== '' ? $data['pagi_rak_12'][$key] : null,
                'siang_rak_12'        => $data['siang_rak_12'][$key] !== '' ? $data['siang_rak_12'][$key] : null,
                'malam_rak_12'        => $data['malam_rak_12'][$key] !== '' ? $data['malam_rak_12'][$key] : null,

                'lsppsh_rak'          => $data['lsppsh_rak'][$key] !== '' ? $data['lsppsh_rak'][$key] : null,
                'pagi_rak_13'         => $data['pagi_rak_13'][$key] !== '' ? $data['pagi_rak_13'][$key] : null,
                'siang_rak_13'        => $data['siang_rak_13'][$key] !== '' ? $data['siang_rak_13'][$key] : null,
                'malam_rak_13'        => $data['malam_rak_13'][$key] !== '' ? $data['malam_rak_13'][$key] : null,

                'akumd_rak'           => $data['akumd_rak'][$key] !== '' ? $data['akumd_rak'][$key] : null,
                'pagi_rak_14'         => $data['pagi_rak_14'][$key] !== '' ? $data['pagi_rak_14'][$key] : null,
                'siang_rak_14'        => $data['siang_rak_14'][$key] !== '' ? $data['siang_rak_14'][$key] : null,
                'malam_rak_14'        => $data['malam_rak_14'][$key] !== '' ? $data['malam_rak_14'][$key] : null,

                'bepdkk_rak'          => $data['bepdkk_rak'][$key] !== '' ? $data['bepdkk_rak'][$key] : null,
                'pagi_rak_15'         => $data['pagi_rak_15'][$key] !== '' ? $data['pagi_rak_15'][$key] : null,
                'siang_rak_15'        => $data['siang_rak_15'][$key] !== '' ? $data['siang_rak_15'][$key] : null,
                'malam_rak_15'        => $data['malam_rak_15'][$key] !== '' ? $data['malam_rak_15'][$key] : null,

                'bepp_rak'            => $data['bepp_rak'][$key] !== '' ? $data['bepp_rak'][$key] : null,
                'pagi_rak_16'         => $data['pagi_rak_16'][$key] !== '' ? $data['pagi_rak_16'][$key] : null,
                'siang_rak_16'        => $data['siang_rak_16'][$key] !== '' ? $data['siang_rak_16'][$key] : null,
                'malam_rak_16'        => $data['malam_rak_16'][$key] !== '' ? $data['malam_rak_16'][$key] : null,

                'BetI_rak'            => $data['BetI_rak'][$key] !== '' ? $data['BetI_rak'][$key] : null,
                'pagi_rak_17'         => $data['pagi_rak_17'][$key] !== '' ? $data['pagi_rak_17'][$key] : null,
                'siang_rak_17'        => $data['siang_rak_17'][$key] !== '' ? $data['siang_rak_17'][$key] : null,
                'malam_rak_17'        => $data['malam_rak_17'][$key] !== '' ? $data['malam_rak_17'][$key] : null,

                'Saap_rak'            => $data['Saap_rak'][$key] !== '' ? $data['Saap_rak'][$key] : null,
                'pagi_rak_18'         => $data['pagi_rak_18'][$key] !== '' ? $data['pagi_rak_18'][$key] : null,
                'siang_rak_18'        => $data['siang_rak_18'][$key] !== '' ? $data['siang_rak_18'][$key] : null,
                'malam_rak_18'        => $data['malam_rak_18'][$key] !== '' ? $data['malam_rak_18'][$key] : null,

                'Kddaadpt_rak'        => $data['Kddaadpt_rak'][$key] !== '' ? $data['Kddaadpt_rak'][$key] : null,
                'pagi_rak_19'         => $data['pagi_rak_19'][$key] !== '' ? $data['pagi_rak_19'][$key] : null,
                'siang_rak_19'        => $data['siang_rak_19'][$key] !== '' ? $data['siang_rak_19'][$key] : null,
                'malam_rak_19'        => $data['malam_rak_19'][$key] !== '' ? $data['malam_rak_19'][$key] : null,

                'JP_rak'              => $data['JP_rak'][$key] !== '' ? $data['JP_rak'][$key] : null,
                'LoDdkj_rak'          => $data['LoDdkj_rak'][$key] !== '' ? $data['LoDdkj_rak'][$key] : null,
                'pagi_rak_20'         => $data['pagi_rak_20'][$key] !== '' ? $data['pagi_rak_20'][$key] : null,
                'siang_rak_20'        => $data['siang_rak_20'][$key] !== '' ? $data['siang_rak_20'][$key] : null,
                'malam_rak_20'        => $data['malam_rak_20'][$key] !== '' ? $data['malam_rak_20'][$key] : null,

                'TH_rak'              => $data['TH_rak'][$key] !== '' ? $data['TH_rak'][$key] : null,
                'Logj_rak'            => $data['Logj_rak'][$key] !== '' ? $data['Logj_rak'][$key] : null,
                'pagi_rak_21'         => $data['pagi_rak_21'][$key] !== '' ? $data['pagi_rak_21'][$key] : null,
                'siang_rak_21'        => $data['siang_rak_21'][$key] !== '' ? $data['siang_rak_21'][$key] : null,
                'malam_rak_21'        => $data['malam_rak_21'][$key] !== '' ? $data['malam_rak_21'][$key] : null,

                'kosong_rak'          => $data['kosong_rak'][$key] !== '' ? $data['kosong_rak'][$key] : null,
                'kosoong_rak'         => $data['kosoong_rak'][$key] !== '' ? $data['kosoong_rak'][$key] : null,
                'siapkan_rak'         => $data['siapkan_rak'][$key] !== '' ? $data['siapkan_rak'][$key] : null,
                'pagi_rak_22'         => $data['pagi_rak_22'][$key] !== '' ? $data['pagi_rak_22'][$key] : null,
                'siang_rak_22'        => $data['siang_rak_22'][$key] !== '' ? $data['siang_rak_22'][$key] : null,
                'malam_rak_22'        => $data['malam_rak_22'][$key] !== '' ? $data['malam_rak_22'][$key] : null,

                'Rgj_rak'             => $data['Rgj_rak'][$key] !== '' ? $data['Rgj_rak'][$key] : null,
                'Kddaadp_rak'         => $data['Kddaadp_rak'][$key] !== '' ? $data['Kddaadp_rak'][$key] : null,
                'pagi_rak_23'         => $data['pagi_rak_23'][$key] !== '' ? $data['pagi_rak_23'][$key] : null,
                'siang_rak_23'        => $data['siang_rak_23'][$key] !== '' ? $data['siang_rak_23'][$key] : null,
                'malam_rak_23'        => $data['malam_rak_23'][$key] !== '' ? $data['malam_rak_23'][$key] : null,

                'GG_rak'              => $data['GG_rak'][$key] !== '' ? $data['GG_rak'][$key] : null,
                'PP_rak'              => $data['PP_rak'][$key] !== '' ? $data['PP_rak'][$key] : null,
                'AA_rak'              => $data['AA_rak'][$key] !== '' ? $data['AA_rak'][$key] : null,
                'PtkII_rak'           => $data['PtkII_rak'][$key] !== '' ? $data['PtkII_rak'][$key] : null,
                'pagi_rak_24'         => $data['pagi_rak_24'][$key] !== '' ? $data['pagi_rak_24'][$key] : null,
                'siang_rak_24'        => $data['siang_rak_24'][$key] !== '' ? $data['siang_rak_24'][$key] : null,
                'malam_rak_24'        => $data['malam_rak_24'][$key] !== '' ? $data['malam_rak_24'][$key] : null,

                'Hmm_rak'             => $data['Hmm_rak'][$key] !== '' ? $data['Hmm_rak'][$key] : null,
                'Api_rak'             => $data['Api_rak'][$key] !== '' ? $data['Api_rak'][$key] : null,
                'pagi_rak_25'         => $data['pagi_rak_25'][$key] !== '' ? $data['pagi_rak_25'][$key] : null,
                'siang_rak_25'        => $data['siang_rak_25'][$key] !== '' ? $data['siang_rak_25'][$key] : null,
                'malam_rak_25'        => $data['malam_rak_25'][$key] !== '' ? $data['malam_rak_25'][$key] : null,

                'PkII_rak'            => $data['PkII_rak'][$key] !== '' ? $data['PkII_rak'][$key] : null,
                'pagi_rak_26'         => $data['pagi_rak_26'][$key] !== '' ? $data['pagi_rak_26'][$key] : null,
                'siang_rak_26'        => $data['siang_rak_26'][$key] !== '' ? $data['siang_rak_26'][$key] : null,
                'malam_rak_26'        => $data['malam_rak_26'][$key] !== '' ? $data['malam_rak_26'][$key] : null,

                'Rpm_rak'             => $data['Rpm_rak'][$key] !== '' ? $data['Rpm_rak'][$key] : null,
                'Pmjah_rak'           => $data['Pmjah_rak'][$key] !== '' ? $data['Pmjah_rak'][$key] : null,
                'pagi_rak_27'         => $data['pagi_rak_27'][$key] !== '' ? $data['pagi_rak_27'][$key] : null,
                'siang_rak_27'        => $data['siang_rak_27'][$key] !== '' ? $data['siang_rak_27'][$key] : null,
                'malam_rak_27'        => $data['malam_rak_27'][$key] !== '' ? $data['malam_rak_27'][$key] : null,

                'Raj_rak'             => $data['Raj_rak'][$key] !== '' ? $data['Raj_rak'][$key] : null,
                'oDsm_rak'            => $data['oDsm_rak'][$key] !== '' ? $data['oDsm_rak'][$key] : null,
                'pagi_rak_28'         => $data['pagi_rak_28'][$key] !== '' ? $data['pagi_rak_28'][$key] : null,
                'siang_rak_28'        => $data['siang_rak_28'][$key] !== '' ? $data['siang_rak_28'][$key] : null,
                'malam_rak_28'        => $data['malam_rak_28'][$key] !== '' ? $data['malam_rak_28'][$key] : null,

                'Pk_rak'              => $data['Pk_rak'][$key] !== '' ? $data['Pk_rak'][$key] : null,
                'pagi_rak_29'         => $data['pagi_rak_29'][$key] !== '' ? $data['pagi_rak_29'][$key] : null,
                'siang_rak_29'        => $data['siang_rak_29'][$key] !== '' ? $data['siang_rak_29'][$key] : null,
                'malam_rak_29'        => $data['malam_rak_29'][$key] !== '' ? $data['malam_rak_29'][$key] : null,

                'Lebp_rak'            => $data['Lebp_rak'][$key] !== '' ? $data['Lebp_rak'][$key] : null,
                'pagi_rak_30'         => $data['pagi_rak_30'][$key] !== '' ? $data['pagi_rak_30'][$key] : null,
                'siang_rak_30'        => $data['siang_rak_30'][$key] !== '' ? $data['siang_rak_30'][$key] : null,
                'malam_rak_30'        => $data['malam_rak_30'][$key] !== '' ? $data['malam_rak_30'][$key] : null,

                'Lb_rak'              => $data['Lb_rak'][$key] !== '' ? $data['Lb_rak'][$key] : null,
                'pagi_rak_31'         => $data['pagi_rak_31'][$key] !== '' ? $data['pagi_rak_31'][$key] : null,
                'siang_rak_31'        => $data['siang_rak_31'][$key] !== '' ? $data['siang_rak_31'][$key] : null,
                'malam_rak_31'        => $data['malam_rak_31'][$key] !== '' ? $data['malam_rak_31'][$key] : null,

                'Lbdpi_rak'           => $data['Lbdpi_rak'][$key] !== '' ? $data['Lbdpi_rak'][$key] : null,
                'pagi_rak_32'         => $data['pagi_rak_32'][$key] !== '' ? $data['pagi_rak_32'][$key] : null,
                'siang_rak_32'        => $data['siang_rak_32'][$key] !== '' ? $data['siang_rak_32'][$key] : null,
                'malam_rak_32'        => $data['malam_rak_32'][$key] !== '' ? $data['malam_rak_32'][$key] : null,

                'Bjnb_rak'            => $data['Bjnb_rak'][$key] !== '' ? $data['Bjnb_rak'][$key] : null,
                'pagi_rak_33'         => $data['pagi_rak_33'][$key] !== '' ? $data['pagi_rak_33'][$key] : null,
                'siang_rak_33'        => $data['siang_rak_33'][$key] !== '' ? $data['siang_rak_33'][$key] : null,
                'malam_rak_33'        => $data['malam_rak_33'][$key] !== '' ? $data['malam_rak_33'][$key] : null,

                'Kbslr_rak'           => $data['Kbslr_rak'][$key] !== '' ? $data['Kbslr_rak'][$key] : null,
                'pagi_rak_34'         => $data['pagi_rak_34'][$key] !== '' ? $data['pagi_rak_34'][$key] : null,
                'siang_rak_34'        => $data['siang_rak_34'][$key] !== '' ? $data['siang_rak_34'][$key] : null,
                'malam_rak_34'        => $data['malam_rak_34'][$key] !== '' ? $data['malam_rak_34'][$key] : null,

                'Gkyb_rak'            => $data['Gkyb_rak'][$key] !== '' ? $data['Gkyb_rak'][$key] : null,
                'pagi_rak_35'         => $data['pagi_rak_35'][$key] !== '' ? $data['pagi_rak_35'][$key] : null,
                'siang_rak_35'        => $data['siang_rak_35'][$key] !== '' ? $data['siang_rak_35'][$key] : null,
                'malam_rak_35'        => $data['malam_rak_35'][$key] !== '' ? $data['malam_rak_35'][$key] : null,

                'Nsabm_rak'           => $data['Nsabm_rak'][$key] !== '' ? $data['Nsabm_rak'][$key] : null,
                'pagi_rak_36'         => $data['pagi_rak_36'][$key] !== '' ? $data['pagi_rak_36'][$key] : null,
                'siang_rak_36'        => $data['siang_rak_36'][$key] !== '' ? $data['siang_rak_36'][$key] : null,
                'malam_rak_36'        => $data['malam_rak_36'][$key] !== '' ? $data['malam_rak_36'][$key] : null,

                'Cjk_rak'             => $data['Cjk_rak'][$key] !== '' ? $data['Cjk_rak'][$key] : null,
                'pagi_rak_37'         => $data['pagi_rak_37'][$key] !== '' ? $data['pagi_rak_37'][$key] : null,
                'siang_rak_37'        => $data['siang_rak_37'][$key] !== '' ? $data['siang_rak_37'][$key] : null,
                'malam_rak_37'        => $data['malam_rak_37'][$key] !== '' ? $data['malam_rak_37'][$key] : null,

                'Kddaakp_rak'         => $data['Kddaakp_rak'][$key] !== '' ? $data['Kddaakp_rak'][$key] : null,
                'pagi_rak_38'         => $data['pagi_rak_38'][$key] !== '' ? $data['pagi_rak_38'][$key] : null,
                'siang_rak_38'        => $data['siang_rak_38'][$key] !== '' ? $data['siang_rak_38'][$key] : null,
                'malam_rak_38'        => $data['malam_rak_38'][$key] !== '' ? $data['malam_rak_38'][$key] : null,

                'p2_rak'              => $data['p2_rak'][$key] !== '' ? $data['p2_rak'][$key] : null,
                'a2_rak'              => $data['a2_rak'][$key] !== '' ? $data['a2_rak'][$key] : null,
                'ls1_rak'             => $data['ls1_rak'][$key] !== '' ? $data['ls1_rak'][$key] : null,
                'pagi_rak_39'         => $data['pagi_rak_39'][$key] !== '' ? $data['pagi_rak_39'][$key] : null,
                'siang_rak_39'        => $data['siang_rak_39'][$key] !== '' ? $data['siang_rak_39'][$key] : null,
                'malam_rak_39'        => $data['malam_rak_39'][$key] !== '' ? $data['malam_rak_39'][$key] : null,

                'Jdptp_rak'           => $data['Jdptp_rak'][$key] !== '' ? $data['Jdptp_rak'][$key] : null,
                'pagi_rak_40'         => $data['pagi_rak_40'][$key] !== '' ? $data['pagi_rak_40'][$key] : null,
                'siang_rak_40'        => $data['siang_rak_40'][$key] !== '' ? $data['siang_rak_40'][$key] : null,
                'malam_rak_40'        => $data['malam_rak_40'][$key] !== '' ? $data['malam_rak_40'][$key] : null,


                'Rrp_rak'             => $data['Rrp_rak'][$key] !== '' ? $data['Rrp_rak'][$key] : null,
                'FbuI_rak'            => $data['FbuI_rak'][$key] !== '' ? $data['FbuI_rak'][$key] : null,
                'pagi_rak_41'         => $data['pagi_rak_41'][$key] !== '' ? $data['pagi_rak_41'][$key] : null,
                'siang_rak_41'        => $data['siang_rak_41'][$key] !== '' ? $data['siang_rak_41'][$key] : null,
                'malam_rak_41'        => $data['malam_rak_41'][$key] !== '' ? $data['malam_rak_41'][$key] : null,

                'Bidpp_rak'           => $data['Bidpp_rak'][$key] !== '' ? $data['Bidpp_rak'][$key] : null,
                'pagi_rak_42'         => $data['pagi_rak_42'][$key] !== '' ? $data['pagi_rak_42'][$key] : null,
                'siang_rak_42'        => $data['siang_rak_42'][$key] !== '' ? $data['siang_rak_42'][$key] : null,
                'malam_rak_42'        => $data['malam_rak_42'][$key] !== '' ? $data['malam_rak_42'][$key] : null,

                'Lptpt_rak'           => $data['Lptpt_rak'][$key] !== '' ? $data['Lptpt_rak'][$key] : null,
                'pagi_rak_43'         => $data['pagi_rak_43'][$key] !== '' ? $data['pagi_rak_43'][$key] : null,
                'siang_rak_43'        => $data['siang_rak_43'][$key] !== '' ? $data['siang_rak_43'][$key] : null,
                'malam_rak_43'        => $data['malam_rak_43'][$key] !== '' ? $data['malam_rak_43'][$key] : null,

                'llp_rak'             => $data['llp_rak'][$key] !== '' ? $data['llp_rak'][$key] : null,
                'pagi_rak_44'         => $data['pagi_rak_44'][$key] !== '' ? $data['pagi_rak_44'][$key] : null,
                'siang_rak_44'        => $data['siang_rak_44'][$key] !== '' ? $data['siang_rak_44'][$key] : null,
                'malam_rak_44'        => $data['malam_rak_44'][$key] !== '' ? $data['malam_rak_44'][$key] : null,

                'Mum_rak'             => $data['Mum_rak'][$key] !== '' ? $data['Mum_rak'][$key] : null,
                'pagi_rak_45'         => $data['pagi_rak_45'][$key] !== '' ? $data['pagi_rak_45'][$key] : null,
                'siang_rak_45'        => $data['siang_rak_45'][$key] !== '' ? $data['siang_rak_45'][$key] : null,
                'malam_rak_45'        => $data['malam_rak_45'][$key] !== '' ? $data['malam_rak_45'][$key] : null,

                'Pjl_rak'             => $data['Pjl_rak'][$key] !== '' ? $data['Pjl_rak'][$key] : null,
                'pagi_rak_46'         => $data['pagi_rak_46'][$key] !== '' ? $data['pagi_rak_46'][$key] : null,
                'siang_rak_46'        => $data['siang_rak_46'][$key] !== '' ? $data['siang_rak_46'][$key] : null,
                'malam_rak_46'        => $data['malam_rak_46'][$key] !== '' ? $data['malam_rak_46'][$key] : null,

                'Nkp_rak'             => $data['Nkp_rak'][$key] !== '' ? $data['Nkp_rak'][$key] : null,
                'pagi_rak_47'         => $data['pagi_rak_47'][$key] !== '' ? $data['pagi_rak_47'][$key] : null,
                'siang_rak_47'        => $data['siang_rak_47'][$key] !== '' ? $data['siang_rak_47'][$key] : null,
                'malam_rak_47'        => $data['malam_rak_47'][$key] !== '' ? $data['malam_rak_47'][$key] : null,

                'Kddaakpy_rak'        => $data['Kddaakpy_rak'][$key] !== '' ? $data['Kddaakpy_rak'][$key] : null,
                'pagi_rak_48'         => $data['pagi_rak_48'][$key] !== '' ? $data['pagi_rak_48'][$key] : null,
                'siang_rak_48'        => $data['siang_rak_48'][$key] !== '' ? $data['siang_rak_48'][$key] : null,
                'malam_rak_48'        => $data['malam_rak_48'][$key] !== '' ? $data['malam_rak_48'][$key] : null,

                'PP3_rak'             => $data['PP3_rak'][$key] !== '' ? $data['PP3_rak'][$key] : null,
                'AA3_rak'             => $data['AA3_rak'][$key] !== '' ? $data['AA3_rak'][$key] : null,
                'Lbttv_rak'           => $data['Lbttv_rak'][$key] !== '' ? $data['Lbttv_rak'][$key] : null,
                'pagi_rak_49'         => $data['pagi_rak_49'][$key] !== '' ? $data['pagi_rak_49'][$key] : null,
                'siang_rak_49'        => $data['siang_rak_49'][$key] !== '' ? $data['siang_rak_49'][$key] : null,
                'malam_rak_49'        => $data['malam_rak_49'][$key] !== '' ? $data['malam_rak_49'][$key] : null,

                'Pjll_rak'            => $data['Pjll_rak'][$key] !== '' ? $data['Pjll_rak'][$key] : null,
                'pagi_rak_50'         => $data['pagi_rak_50'][$key] !== '' ? $data['pagi_rak_50'][$key] : null,
                'siang_rak_50'        => $data['siang_rak_50'][$key] !== '' ? $data['siang_rak_50'][$key] : null,
                'malam_rak_50'        => $data['malam_rak_50'][$key] !== '' ? $data['malam_rak_50'][$key] : null,

                'RP_rak'              => $data['RP_rak'][$key] !== '' ? $data['RP_rak'][$key] : null,
                'Gal_rak'             => $data['Gal_rak'][$key] !== '' ? $data['Gal_rak'][$key] : null,
                'pagi_rak_51'         => $data['pagi_rak_51'][$key] !== '' ? $data['pagi_rak_51'][$key] : null,
                'siang_rak_51'        => $data['siang_rak_51'][$key] !== '' ? $data['siang_rak_51'][$key] : null,
                'malam_rak_51'        => $data['malam_rak_51'][$key] !== '' ? $data['malam_rak_51'][$key] : null,

                'Kee_rak'             => $data['Kee_rak'][$key] !== '' ? $data['Kee_rak'][$key] : null,
                'Lhp_rak'             => $data['Lhp_rak'][$key] !== '' ? $data['Lhp_rak'][$key] : null,
                'pagi_rak_52'         => $data['pagi_rak_52'][$key] !== '' ? $data['pagi_rak_52'][$key] : null,
                'siang_rak_52'        => $data['siang_rak_52'][$key] !== '' ? $data['siang_rak_52'][$key] : null,
                'malam_rak_52'        => $data['malam_rak_52'][$key] !== '' ? $data['malam_rak_52'][$key] : null,

                'Kbpdp_rak'           => $data['Kbpdp_rak'][$key] !== '' ? $data['Kbpdp_rak'][$key] : null,
                'pagi_rak_53'         => $data['pagi_rak_53'][$key] !== '' ? $data['pagi_rak_53'][$key] : null,
                'siang_rak_53'        => $data['siang_rak_53'][$key] !== '' ? $data['siang_rak_53'][$key] : null,
                'malam_rak_53'        => $data['malam_rak_53'][$key] !== '' ? $data['malam_rak_53'][$key] : null,

                'Ottv_rak'            => $data['Ottv_rak'][$key] !== '' ? $data['Ottv_rak'][$key] : null,
                'pagi_rak_54'         => $data['pagi_rak_54'][$key] !== '' ? $data['pagi_rak_54'][$key] : null,
                'siang_rak_54'        => $data['siang_rak_54'][$key] !== '' ? $data['siang_rak_54'][$key] : null,
                'malam_rak_54'        => $data['malam_rak_54'][$key] !== '' ? $data['malam_rak_54'][$key] : null,

                'Aium_rak'            => $data['Aium_rak'][$key] !== '' ? $data['Aium_rak'][$key] : null,
                'pagi_rak_55'         => $data['pagi_rak_55'][$key] !== '' ? $data['pagi_rak_55'][$key] : null,
                'siang_rak_55'        => $data['siang_rak_55'][$key] !== '' ? $data['siang_rak_55'][$key] : null,
                'malam_rak_55'        => $data['malam_rak_55'][$key] !== '' ? $data['malam_rak_55'][$key] : null,

                'Becpjp_rak'          => $data['Becpjp_rak'][$key] !== '' ? $data['Becpjp_rak'][$key] : null,
                'pagi_rak_56'         => $data['pagi_rak_56'][$key] !== '' ? $data['pagi_rak_56'][$key] : null,
                'siang_rak_56'        => $data['siang_rak_56'][$key] !== '' ? $data['siang_rak_56'][$key] : null,
                'malam_rak_56'        => $data['malam_rak_56'][$key] !== '' ? $data['malam_rak_56'][$key] : null,


                'Betbpp_rak'          => $data['Betbpp_rak'][$key] !== '' ? $data['Betbpp_rak'][$key] : null,
                'pagi_rak_57'         => $data['pagi_rak_57'][$key] !== '' ? $data['pagi_rak_57'][$key] : null,
                'siang_rak_57'        => $data['siang_rak_57'][$key] !== '' ? $data['siang_rak_57'][$key] : null,
                'malam_rak_57'        => $data['malam_rak_57'][$key] !== '' ? $data['malam_rak_57'][$key] : null,

                'PkRr_rak'            => $data['PkRr_rak'][$key] !== '' ? $data['PkRr_rak'][$key] : null,
                'pagi_rak_58'         => $data['pagi_rak_58'][$key] !== '' ? $data['pagi_rak_58'][$key] : null,
                'siang_rak_58'        => $data['siang_rak_58'][$key] !== '' ? $data['siang_rak_58'][$key] : null,
                'malam_rak_58'        => $data['malam_rak_58'][$key] !== '' ? $data['malam_rak_58'][$key] : null,

                'Kddaa_rak'           => $data['Kddaa_rak'][$key] !== '' ? $data['Kddaa_rak'][$key] : null,
                'pagi_rak_59'         => $data['pagi_rak_59'][$key] !== '' ? $data['pagi_rak_59'][$key] : null,
                'siang_rak_59'        => $data['siang_rak_59'][$key] !== '' ? $data['siang_rak_59'][$key] : null,
                'malam_rak_59'        => $data['malam_rak_59'][$key] !== '' ? $data['malam_rak_59'][$key] : null,
                'lain_rak'            => $data['lain_rak'][$key] !== '' ? $data['lain_rak'][$key] : null,
                'created_at'          => $value,
            );
            // var_dump($data_terapi);die;
            $this->db->insert('sm_form_kep_104_00', $data_terapi);
        }
    }

    // RAK 4
    function editRencanaAsuhanKebidanan($data)
    {
        return $this->db->where('id', $data['id'], true)->update('sm_form_kep_104_00', $data);
    }

    // RAK 2
    function getRencanaAsuhanKebidanan($id_layanan_pendaftaran)
    {
        return $this->db->select("rak.*, COALESCE(wid.nama, '') as akun_user")
            ->from('sm_form_kep_104_00 as rak')
            ->join('sm_layanan_pendaftaran as lp', 'rak.id_layanan_pendaftaran = lp.id')
            // user
            ->join('sm_translucent sid', 'rak.id_user = sid.id', 'left')
            ->join('sm_pegawai wid', 'rak.id_user = wid.id', 'left')
            ->where('lp.id_pendaftaran', $id_layanan_pendaftaran, true)
            ->order_by('rak.tanggal_rak', 'asc')
            ->get()
            ->result();
    }

    // RAK 3
    function getRencanaAsuhanKebidananTByID($id)
    {
        return $this->db->select("rak.*, COALESCE(wid.nama, '') as akun_user")
            ->from('sm_form_kep_104_00 as rak')
            // user
            ->join('sm_translucent sid', 'rak.id_user = sid.id', 'left')
            ->join('sm_pegawai wid', 'rak.id_user = wid.id', 'left')
            ->where('rak.id', $id)
            ->order_by('rak.tanggal_rak', 'asc')
            ->get()
            ->row();
    }

    // RAK 5
    function deleteRencanaAsuhanKebidanan($id)
    {
        return $this->db->where("id", $id)->delete("sm_form_kep_104_00");
    }

    // SP_WE 
    public function getSuratPernyataan($id_pendaftaran, $pendaftaran_detail)
    {
        $data = $this->db->select('sp.*, spg1.nama as nama_perawat_1,
                                         spg2.nama as nama_perawat_2,
                                         spd.nama as nama_dokter')
            ->from('sm_form_surat_pernyataan_72_01 sp')
            ->join('sm_layanan_pendaftaran lp', 'lp.id = sp.id_layanan_pendaftaran')
            ->join('sm_tenaga_medis tmp1', 'sp.saksi_1_sp = tmp1.id', 'left')
            ->join('sm_pegawai spg1', 'tmp1.id_pegawai = spg1.id', 'left')
            ->join('sm_tenaga_medis tmp2', 'sp.saksi_2_sp = tmp2.id', 'left')
            ->join('sm_pegawai spg2', 'tmp2.id_pegawai = spg2.id', 'left')
            ->join('sm_tenaga_medis tmd', 'sp.dokter_sp = tmd.id', 'left')
            ->join('sm_pegawai spd', 'tmd.id_pegawai = spd.id', 'left')
            ->where('lp.id_pendaftaran', $id_pendaftaran)
            ->get()->row();
        $pendaftaran = $pendaftaran_detail;
        $penanggung_jawab = $this->db->select("p.nama_pjwb, p.telp_pjwb, p.alamat_pjwb, p.nik_pjwb, p.kelamin_pjwb, p.tgl_lahir_pjwb, date_part('year', age(p.tgl_lahir_pjwb)) as umur, p.hubungan_pjwb")
            ->from('sm_layanan_pendaftaran lp')
            ->join('sm_pendaftaran p', 'p.id = lp.id_pendaftaran')
            ->where('lp.id_pendaftaran', $id_pendaftaran)->get()->row();
        return compact('data', 'pendaftaran', 'penanggung_jawab');
    }

    // TPI B
    function getTravellingPatientInformation($id)
    {
        $sql = "select tpi.*, 
                    pa.nama as nama_pasien, 
                    pd.id_pasien, 
                    pa.kelamin as kelamin_pasien, 
                    pa.id as no_rm, 
                    date_part('year', age(pa.tanggal_lahir)) as umur_pasien, 
                    pa.no_identitas, 
                    pa.alamat as alamat_pasien, 
                    pa.telp,                 
                    pa.tanggal_lahir as tanggal_lahir_pasien,
                    spd.nama as dokter,
                    COALESCE(sb1.nama_lengkap, '') as obat_1,
                    COALESCE(sb2.nama_lengkap, '') as obat_2,
                    COALESCE(sb3.nama_lengkap, '') as obat_3,
                    COALESCE(sb4.nama_lengkap, '') as obat_4,
                    COALESCE(sb5.nama_lengkap, '') as obat_5,
                    COALESCE(sb6.nama_lengkap, '') as obat_6,
                    COALESCE(sb7.nama_lengkap, '') as obat_7,
                    COALESCE(sb8.nama_lengkap, '') as obat_8,
                    COALESCE(sb9.nama_lengkap, '') as obat_9,
                    COALESCE(sb10.nama_lengkap, '') as obat_10,
                    COALESCE(sb11.nama_lengkap, '') as obat_11,
                    COALESCE(sb12.nama_lengkap, '') as obat_12,
                    COALESCE(sb13.nama_lengkap, '') as obat_13,
                    COALESCE(sb14.nama_lengkap, '') as obat_14,
                    COALESCE(sb15.nama_lengkap, '') as obat_15,
                    tmp.nama as id_user
                from sm_travelling_patient_information as tpi    
                join sm_layanan_pendaftaran lp ON tpi.id_layanan_pendaftaran = lp.id
                join sm_pendaftaran pd ON lp.id_pendaftaran = pd.id 
                join sm_pasien pa ON pd.id_pasien = pa.id   
                left join sm_tenaga_medis tmd ON tpi.nephrologist_consultant = tmd.id       
                left join sm_pegawai spd ON tmd.id_pegawai = spd.id   
                left join sm_barang sb1 ON sb1.id = tpi.nama_medication_1
                left join sm_barang sb2 ON sb2.id = tpi.nama_medication_2
                left join sm_barang sb3 ON sb3.id = tpi.nama_medication_3
                left join sm_barang sb4 ON sb4.id = tpi.nama_medication_4
                left join sm_barang sb5 ON sb5.id = tpi.nama_medication_5
                left join sm_barang sb6 ON sb6.id = tpi.nama_medication_6
                left join sm_barang sb7 ON sb7.id = tpi.nama_medication_7
                left join sm_barang sb8 ON sb8.id = tpi.nama_medication_8
                left join sm_barang sb9 ON sb9.id = tpi.nama_medication_9
                left join sm_barang sb10 ON sb10.id = tpi.nama_medication_10
                left join sm_barang sb11 ON sb11.id = tpi.nama_medication_11
                left join sm_barang sb12 ON sb12.id = tpi.nama_medication_12
                left join sm_barang sb13 ON sb13.id = tpi.nama_medication_13
                left join sm_barang sb14 ON sb14.id = tpi.nama_medication_14
                left join sm_barang sb15 ON sb15.id = tpi.nama_medication_15
                left join sm_translucent st ON tpi.id_user = st.id
                left join sm_pegawai tmp ON tmp.id = st.id                          
                where lp.id_pendaftaran = '" . $id . "'";
        return $this->db->query($sql)->row();
    }






    // SAFR 1 
    function insertSkriningAdmisi($data){
        foreach ($data['date_created'] as $key => $value) {
            $tgl_safr = str_replace('/', '-', $data['tanggal_safr'][$key]);
            $tgl_safr = date("Y-m-d", strtotime($tgl_safr));
            $data_safr = array(
                'id_pendaftaran'            => $data['id_pendaftaran'],
                'id_layanan_pendaftaran'    => $data['id_layanan_pendaftaran'],
                'id_user'                   => $data['id_user'][$key],
                'tanggal_safr'              => $tgl_safr,
                'jam_safr'                  => $data['jam_safr'][$key] !== '' ? $data['jam_safr'][$key] : null,
                'rendah_safr_1'             => $data['rendah_safr_1'][$key] !== '' ? $data['rendah_safr_1'][$key] : null,
                'medium_safr_1'             => $data['medium_safr_1'][$key] !== '' ? $data['medium_safr_1'][$key] : null,
                'tinggi_safr_1'             => $data['tinggi_safr_1'][$key] !== '' ? $data['tinggi_safr_1'][$key] : null,
                'rendah_safr_2'             => $data['rendah_safr_2'][$key] !== '' ? $data['rendah_safr_2'][$key] : null,
                'medium_safr_2'             => $data['medium_safr_2'][$key] !== '' ? $data['medium_safr_2'][$key] : null,
                'tinggi_safr_2'             => $data['tinggi_safr_2'][$key] !== '' ? $data['tinggi_safr_2'][$key] : null,
                'rendah_safr_3'             => $data['rendah_safr_3'][$key] !== '' ? $data['rendah_safr_3'][$key] : null,
                'medium_safr_3'             => $data['medium_safr_3'][$key] !== '' ? $data['medium_safr_3'][$key] : null,
                'tinggi_safr_3'             => $data['tinggi_safr_3'][$key] !== '' ? $data['tinggi_safr_3'][$key] : null,
                'rendah_safr_4'             => $data['rendah_safr_4'][$key] !== '' ? $data['rendah_safr_4'][$key] : null,
                'medium_safr_4'             => $data['medium_safr_4'][$key] !== '' ? $data['medium_safr_4'][$key] : null,
                'tinggi_safr_4'             => $data['tinggi_safr_4'][$key] !== '' ? $data['tinggi_safr_4'][$key] : null,
                'rendah_safr_5'             => $data['rendah_safr_5'][$key] !== '' ? $data['rendah_safr_5'][$key] : null,
                'medium_safr_5'             => $data['medium_safr_5'][$key] !== '' ? $data['medium_safr_5'][$key] : null,
                'tinggi_safr_5'             => $data['tinggi_safr_5'][$key] !== '' ? $data['tinggi_safr_5'][$key] : null,
                'rendah_safr_6'             => $data['rendah_safr_6'][$key] !== '' ? $data['rendah_safr_6'][$key] : null,
                'medium_safr_6'             => $data['medium_safr_6'][$key] !== '' ? $data['medium_safr_6'][$key] : null,
                'tinggi_safr_6'             => $data['tinggi_safr_6'][$key] !== '' ? $data['tinggi_safr_6'][$key] : null,
                'medium_safr_7'             => $data['medium_safr_7'][$key] !== '' ? $data['medium_safr_7'][$key] : null,
                'tinggi_safr_7'             => $data['tinggi_safr_7'][$key] !== '' ? $data['tinggi_safr_7'][$key] : null,
                'medium_safr_8'             => $data['medium_safr_8'][$key] !== '' ? $data['medium_safr_8'][$key] : null,
                'tinggi_safr_8'             => $data['tinggi_safr_8'][$key] !== '' ? $data['tinggi_safr_8'][$key] : null,
                'medium_safr_9'             => $data['medium_safr_9'][$key] !== '' ? $data['medium_safr_9'][$key] : null,
                'tinggi_safr_9'             => $data['tinggi_safr_9'][$key] !== '' ? $data['tinggi_safr_9'][$key] : null,
                'medium_safr_10'            => $data['medium_safr_10'][$key] !== '' ? $data['medium_safr_10'][$key] : null,
                'tinggi_safr_10'            => $data['tinggi_safr_10'][$key] !== '' ? $data['tinggi_safr_10'][$key] : null,
                'medium_safr_11'            => $data['medium_safr_11'][$key] !== '' ? $data['medium_safr_11'][$key] : null,
                'medium_safr_12'            => $data['medium_safr_12'][$key] !== '' ? $data['medium_safr_12'][$key] : null,
                'rendah_safr_13'            => $data['rendah_safr_13'][$key] !== '' ? $data['rendah_safr_13'][$key] : null,
                'medium_safr_13'            => $data['medium_safr_13'][$key] !== '' ? $data['medium_safr_13'][$key] : null,
                'tinggi_safr_13'            => $data['tinggi_safr_13'][$key] !== '' ? $data['tinggi_safr_13'][$key] : null,
                'medium_safr_14'            => $data['medium_safr_14'][$key] !== '' ? $data['medium_safr_14'][$key] : null,
                'tinggi_safr_14'            => $data['tinggi_safr_14'][$key] !== '' ? $data['tinggi_safr_14'][$key] : null,
                'tinggi_safr_15'            => $data['tinggi_safr_15'][$key] !== '' ? $data['tinggi_safr_15'][$key] : null,
                'perawat_safr'              => $data['perawat_safr'][$key] !== '' ? $data['perawat_safr'][$key] : null,
                'created_at'                => $value,
            );
            // var_dump($data_safr);die;
            $this->db->insert('sm_skrining_admisi_130', $data_safr);
        }
    }

    // SAFR 4
    function editSkriningAdmisi($data){
        return $this->db->where('id', $data['id'], true)->update('sm_skrining_admisi_130', $data);
    }

    // SAFR 2
    function getSkriningAdmisi($id_layanan_pendaftaran){
        return $this->db->select("safr.*, COALESCE(spg.nama, '') as perawat, 
                                          COALESCE(wid.nama, '') as akun_user")
            ->from('sm_skrining_admisi_130 as safr')
            ->join('sm_layanan_pendaftaran as lp', 'safr.id_layanan_pendaftaran = lp.id')
            ->join('sm_tenaga_medis as tmp', 'safr.perawat_safr = tmp.id', 'left')
            ->join('sm_pegawai as spg', 'spg.id = tmp.id_pegawai', 'left')
            // user
            ->join('sm_translucent sid', 'safr.id_user = sid.id', 'left')
            ->join('sm_pegawai wid', 'safr.id_user = wid.id', 'left')
            ->where('lp.id_pendaftaran', $id_layanan_pendaftaran, true)
            ->order_by('safr.tanggal_safr', 'asc')
            ->get()
            ->result();
    }

    // SAFR 3
    function getSkriningAdmisiByID($id){
        return $this->db->select("safr.*, COALESCE(spg.nama, '') as perawat, 
                                          COALESCE(wid.nama, '') as akun_user")
            ->from('sm_skrining_admisi_130 as safr')
            ->join('sm_tenaga_medis as tmp', 'safr.perawat_safr = tmp.id', 'left')
            ->join('sm_pegawai as spg', 'spg.id = tmp.id_pegawai', 'left')
            // user
            ->join('sm_translucent sid', 'safr.id_user = sid.id', 'left')
            ->join('sm_pegawai wid', 'safr.id_user = wid.id', 'left')
            ->where('safr.id', $id)
            ->order_by('safr.tanggal_safr', 'asc')
            ->get()
            ->row();
    }

    // SAFR 5
    function deleteSkriningAdmisi($id){
        return $this->db->where("id", $id)->delete("sm_skrining_admisi_130");
    }

    // SAFR 6
    function insertLogsSkriningAdmisi($data) { 
        return $this->db->insert('sm_skrining_admisi_130_logs', $data);
    }



    
    // PERT 1 
    function insertPreeklampsiaEarly($data){
        foreach ($data['date_created'] as $key => $value) {
            $tgl_pert = str_replace('/', '-', $data['tanggal_pert'][$key]);
            $tgl_pert = date("Y-m-d", strtotime($tgl_pert));
            $data_pert = array(
                'id_pendaftaran'         => $data['id_pendaftaran'],
                'id_layanan_pendaftaran' => $data['id_layanan_pendaftaran'],
                'id_user'                => $data['id_user'][$key],
                'tanggal_pert'           => $tgl_pert,
                'jam_pert'               => $data['jam_pert'][$key] !== '' ? $data['jam_pert'][$key] : null,
                'hijau_1'   => $data['hijau_1'][$key] !== '' ? $data['hijau_1'][$key] : null,
                'kuning_1'  => $data['kuning_1'][$key] !== '' ? $data['kuning_1'][$key] : null,
                'merah_1'   => $data['merah_1'][$key] !== '' ? $data['merah_1'][$key] : null,
                'hijau_2'   => $data['hijau_2'][$key] !== '' ? $data['hijau_2'][$key] : null,
                'kuning_2'  => $data['kuning_2'][$key] !== '' ? $data['kuning_2'][$key] : null,
                'merah_2'   => $data['merah_2'][$key] !== '' ? $data['merah_2'][$key] : null,
                'hijau_3'   => $data['hijau_3'][$key] !== '' ? $data['hijau_3'][$key] : null,
                'kuning_3'  => $data['kuning_3'][$key] !== '' ? $data['kuning_3'][$key] : null,
                'merah_3'   => $data['merah_3'][$key] !== '' ? $data['merah_3'][$key] : null,
                'hijau_4'   => $data['hijau_4'][$key] !== '' ? $data['hijau_4'][$key] : null,
                'kuning_4'  => $data['kuning_4'][$key] !== '' ? $data['kuning_4'][$key] : null,
                'merah_4'   => $data['merah_4'][$key] !== '' ? $data['merah_4'][$key] : null,
                'hijau_5'   => $data['hijau_5'][$key] !== '' ? $data['hijau_5'][$key] : null,
                'kuning_5'  => $data['kuning_5'][$key] !== '' ? $data['kuning_5'][$key] : null,
                'merah_5'   => $data['merah_5'][$key] !== '' ? $data['merah_5'][$key] : null,
                'hijau_6'   => $data['hijau_6'][$key] !== '' ? $data['hijau_6'][$key] : null,
                'kuning_6'  => $data['kuning_6'][$key] !== '' ? $data['kuning_6'][$key] : null,
                'merah_6'   => $data['merah_6'][$key] !== '' ? $data['merah_6'][$key] : null,
                'hijau_7'   => $data['hijau_7'][$key] !== '' ? $data['hijau_7'][$key] : null,
                'kuning_7'  => $data['kuning_7'][$key] !== '' ? $data['kuning_7'][$key] : null,
                'merah_7'   => $data['merah_7'][$key] !== '' ? $data['merah_7'][$key] : null,
                'hijau_8'   => $data['hijau_8'][$key] !== '' ? $data['hijau_8'][$key] : null,
                'kuning_8'  => $data['kuning_8'][$key] !== '' ? $data['kuning_8'][$key] : null,
                'merah_8'   => $data['merah_8'][$key] !== '' ? $data['merah_8'][$key] : null,
                'hijau_9'   => $data['hijau_9'][$key] !== '' ? $data['hijau_9'][$key] : null,
                'kuning_9'  => $data['kuning_9'][$key] !== '' ? $data['kuning_9'][$key] : null,
                'merah_9'   => $data['merah_9'][$key] !== '' ? $data['merah_9'][$key] : null,
                'hijau_10'   => $data['hijau_10'][$key] !== '' ? $data['hijau_10'][$key] : null,
                'kuning_10'  => $data['kuning_10'][$key] !== '' ? $data['kuning_10'][$key] : null,
                'merah_10'   => $data['merah_10'][$key] !== '' ? $data['merah_10'][$key] : null,
                'hijau_11'   => $data['hijau_11'][$key] !== '' ? $data['hijau_11'][$key] : null,
                'kuning_11'  => $data['kuning_11'][$key] !== '' ? $data['kuning_11'][$key] : null,
                'merah_11'   => $data['merah_11'][$key] !== '' ? $data['merah_11'][$key] : null,
                'hijau_12'   => $data['hijau_12'][$key] !== '' ? $data['hijau_12'][$key] : null,
                'kuning_12'  => $data['kuning_12'][$key] !== '' ? $data['kuning_12'][$key] : null,
                'merah_12'   => $data['merah_12'][$key] !== '' ? $data['merah_12'][$key] : null,
                'hijau_13'   => $data['hijau_13'][$key] !== '' ? $data['hijau_13'][$key] : null,
                'kuning_13'  => $data['kuning_13'][$key] !== '' ? $data['kuning_13'][$key] : null,
                'merah_13'   => $data['merah_13'][$key] !== '' ? $data['merah_13'][$key] : null,
                'hijau_14'   => $data['hijau_14'][$key] !== '' ? $data['hijau_14'][$key] : null,
                'kuning_14'  => $data['kuning_14'][$key] !== '' ? $data['kuning_14'][$key] : null,
                'merah_14'   => $data['merah_14'][$key] !== '' ? $data['merah_14'][$key] : null,
                'hijau_15'   => $data['hijau_15'][$key] !== '' ? $data['hijau_15'][$key] : null,
                'kuning_15'  => $data['kuning_15'][$key] !== '' ? $data['kuning_15'][$key] : null,
                'merah_15'   => $data['merah_15'][$key] !== '' ? $data['merah_15'][$key] : null,
                'hijau_16'   => $data['hijau_16'][$key] !== '' ? $data['hijau_16'][$key] : null,
                'kuning_16'  => $data['kuning_16'][$key] !== '' ? $data['kuning_16'][$key] : null,
                'merah_16'   => $data['merah_16'][$key] !== '' ? $data['merah_16'][$key] : null,
                'hijau_17'   => $data['hijau_17'][$key] !== '' ? $data['hijau_17'][$key] : null,
                'kuning_17'  => $data['kuning_17'][$key] !== '' ? $data['kuning_17'][$key] : null,
                'merah_17'   => $data['merah_17'][$key] !== '' ? $data['merah_17'][$key] : null,
                'perawat_pert'   => $data['perawat_pert'][$key] !== '' ? $data['perawat_pert'][$key] : null,
                'created_at'     => $value,
            );
            // var_dump($data_pert);die;
            $this->db->insert('sm_preeklampsia_early', $data_pert);
        }
    }

    // PERT 4
    function editPreeklampsiaEarly($data){
        return $this->db->where('id', $data['id'], true)->update('sm_preeklampsia_early', $data);
    }

    // PERT 5
    function deletePreeklampsiaEarly($id){
        return $this->db->where("id", $id)->delete("sm_preeklampsia_early");
    }

    // PERT 2  INI NLM TAU BENR SALAHYA NNTI LIAT DI CONTOHYA
    function getPreeklampsiaEarly($id_layanan_pendaftaran){
        return $this->db->select("pert.*, COALESCE(spg.nama, '') as perawat, 
                                          COALESCE(wid.nama, '') as akun_user")
            ->from('sm_preeklampsia_early as pert')
            ->join('sm_layanan_pendaftaran as lp', 'pert.id_layanan_pendaftaran = lp.id')
            ->join('sm_tenaga_medis as tmp', 'pert.perawat_pert = tmp.id', 'left')
            ->join('sm_pegawai as spg', 'spg.id = tmp.id_pegawai', 'left')
            // user
            ->join('sm_translucent sid', 'pert.id_user = sid.id', 'left')
            ->join('sm_pegawai wid', 'pert.id_user = wid.id', 'left')
            ->where('lp.id_pendaftaran', $id_layanan_pendaftaran, true)
            ->order_by('pert.tanggal_pert', 'asc')
            ->get()
            ->result();
    }

    // PERT 3 INI NLM TAU BENR SALAHYA NNTI LIAT DI CONTOHYA
    function getPreeklampsiaEarlyByID($id){
        return $this->db->select("pert.*, COALESCE(spg.nama, '') as perawat, 
                                          COALESCE(wid.nama, '') as akun_user")
            ->from('sm_preeklampsia_early as pert')
            ->join('sm_tenaga_medis as tmp', 'pert.perawat_pert = tmp.id', 'left')
            ->join('sm_pegawai as spg', 'spg.id = tmp.id_pegawai', 'left')
            // user
            ->join('sm_translucent sid', 'pert.id_user = sid.id', 'left')
            ->join('sm_pegawai wid', 'pert.id_user = wid.id', 'left')
            ->where('pert.id', $id)
            ->order_by('pert.tanggal_pert', 'asc')
            ->get()
            ->row();
    }

    // PERT 6
    function insertLogsdeletePreeklampsiaEarly($data) { 
        return $this->db->insert('sm_preeklampsia_early_logs', $data);
    }





    // SAUIKR 1 
    function insertSkriningAdmisiUikr($data){
        foreach ($data['date_created'] as $key => $value) {
            $tgl_sauikr = str_replace('/', '-', $data['tanggal_sauikr'][$key]);
            $tgl_sauikr = date("Y-m-d", strtotime($tgl_sauikr));
            $data_sauikr = array(
                'id_pendaftaran'         => $data['id_pendaftaran'],
                'id_layanan_pendaftaran' => $data['id_layanan_pendaftaran'],
                'id_user'                => $data['id_user'][$key],
                'tanggal_sauikr'         => $tgl_sauikr,
                'jam_sauikr'             => $data['jam_sauikr'][$key] !== '' ? $data['jam_sauikr'][$key] : null,
                'diagnosa_sauikr'        => $data['diagnosa_sauikr'][$key] !== '' ? $data['diagnosa_sauikr'][$key] : null,
                'jenispersalinan_sauikr' => $data['jenispersalinan_sauikr'][$key] !== '' ? $data['jenispersalinan_sauikr'][$key] : null,
                'aspekmaternal1'   => $data['aspekmaternal1'][$key] !== '' ? $data['aspekmaternal1'][$key] : null,
                'aspekmaternal2'   => $data['aspekmaternal2'][$key] !== '' ? $data['aspekmaternal2'][$key] : null,
                'aspekmaternal3'   => $data['aspekmaternal3'][$key] !== '' ? $data['aspekmaternal3'][$key] : null,
                'aspekmaternal4'   => $data['aspekmaternal4'][$key] !== '' ? $data['aspekmaternal4'][$key] : null,
                'aspekmaternal5'   => $data['aspekmaternal5'][$key] !== '' ? $data['aspekmaternal5'][$key] : null,
                'aspekmaternal6'   => $data['aspekmaternal6'][$key] !== '' ? $data['aspekmaternal6'][$key] : null,
                'aspekmaternal7'   => $data['aspekmaternal7'][$key] !== '' ? $data['aspekmaternal7'][$key] : null,
                'aspekjanin1'   => $data['aspekjanin1'][$key] !== '' ? $data['aspekjanin1'][$key] : null,
                'aspekjanin2'   => $data['aspekjanin2'][$key] !== '' ? $data['aspekjanin2'][$key] : null,
                'aspekjanin3'   => $data['aspekjanin3'][$key] !== '' ? $data['aspekjanin3'][$key] : null,
                'aspekjanin4'   => $data['aspekjanin4'][$key] !== '' ? $data['aspekjanin4'][$key] : null,
                'aspekjanin5'   => $data['aspekjanin5'][$key] !== '' ? $data['aspekjanin5'][$key] : null,
                'aspekjanin6'   => $data['aspekjanin6'][$key] !== '' ? $data['aspekjanin6'][$key] : null,
                'aspekjanin7'   => $data['aspekjanin7'][$key] !== '' ? $data['aspekjanin7'][$key] : null,
                'aspekjanin8'   => $data['aspekjanin8'][$key] !== '' ? $data['aspekjanin8'][$key] : null,
                'aspekjanin9'   => $data['aspekjanin9'][$key] !== '' ? $data['aspekjanin9'][$key] : null,
                'aspekjanin10'  => $data['aspekjanin10'][$key] !== '' ? $data['aspekjanin10'][$key] : null,
                'aspekpenyulitpersalinan1'   => $data['aspekpenyulitpersalinan1'][$key] !== '' ? $data['aspekpenyulitpersalinan1'][$key] : null,
                'aspekpenyulitpersalinan2'   => $data['aspekpenyulitpersalinan2'][$key] !== '' ? $data['aspekpenyulitpersalinan2'][$key] : null,
                'aspekpenyulitpersalinan3'   => $data['aspekpenyulitpersalinan3'][$key] !== '' ? $data['aspekpenyulitpersalinan3'][$key] : null,
                'aspekpenyulitpersalinan4'   => $data['aspekpenyulitpersalinan4'][$key] !== '' ? $data['aspekpenyulitpersalinan4'][$key] : null,
                'aspekpenyulitpersalinan5'   => $data['aspekpenyulitpersalinan5'][$key] !== '' ? $data['aspekpenyulitpersalinan5'][$key] : null,
                'aspekpenyulitpersalinan6'   => $data['aspekpenyulitpersalinan6'][$key] !== '' ? $data['aspekpenyulitpersalinan6'][$key] : null,
                'aspekpenyulitpersalinan7'   => $data['aspekpenyulitpersalinan7'][$key] !== '' ? $data['aspekpenyulitpersalinan7'][$key] : null,
                'aspekpenyulitpersalinan8'   => $data['aspekpenyulitpersalinan8'][$key] !== '' ? $data['aspekpenyulitpersalinan8'][$key] : null,
                'aspekpenyulitpersalinan9'   => $data['aspekpenyulitpersalinan9'][$key] !== '' ? $data['aspekpenyulitpersalinan9'][$key] : null,
                'aspekpenyulitpersalinan10'  => $data['aspekpenyulitpersalinan10'][$key] !== '' ? $data['aspekpenyulitpersalinan10'][$key] : null,
                'aspekpenyulitpersalinan11'  => $data['aspekpenyulitpersalinan11'][$key] !== '' ? $data['aspekpenyulitpersalinan11'][$key] : null,
                'aspekpenyulitpersalinan12'  => $data['aspekpenyulitpersalinan12'][$key] !== '' ? $data['aspekpenyulitpersalinan12'][$key] : null,
                'aspekpenyulitpersalinan13'  => $data['aspekpenyulitpersalinan13'][$key] !== '' ? $data['aspekpenyulitpersalinan13'][$key] : null,
                'aspekpenyulitpersalinan14'  => $data['aspekpenyulitpersalinan14'][$key] !== '' ? $data['aspekpenyulitpersalinan14'][$key] : null,
                'aspekpenyulitpersalinan15'  => $data['aspekpenyulitpersalinan15'][$key] !== '' ? $data['aspekpenyulitpersalinan15'][$key] : null,
                'aspekpenyulitpersalinan16'  => $data['aspekpenyulitpersalinan16'][$key] !== '' ? $data['aspekpenyulitpersalinan16'][$key] : null,
                'aspekpenyulitpersalinan17'  => $data['aspekpenyulitpersalinan17'][$key] !== '' ? $data['aspekpenyulitpersalinan17'][$key] : null,
                'aspekpenyulitpersalinan18'  => $data['aspekpenyulitpersalinan18'][$key] !== '' ? $data['aspekpenyulitpersalinan18'][$key] : null,
                'aspekpenyulitpersalinan19'  => $data['aspekpenyulitpersalinan19'][$key] !== '' ? $data['aspekpenyulitpersalinan19'][$key] : null,
                'jikaresikorendah1'   => $data['jikaresikorendah1'][$key] !== '' ? $data['jikaresikorendah1'][$key] : null,
                'jikaresikorendah2'   => $data['jikaresikorendah2'][$key] !== '' ? $data['jikaresikorendah2'][$key] : null,
                'jikaresikosedang1'   => $data['jikaresikosedang1'][$key] !== '' ? $data['jikaresikosedang1'][$key] : null,
                'jikaresikosedang2'   => $data['jikaresikosedang2'][$key] !== '' ? $data['jikaresikosedang2'][$key] : null,
                'jikaresikotinggi1'   => $data['jikaresikotinggi1'][$key] !== '' ? $data['jikaresikotinggi1'][$key] : null,
                'jikaresikotinggi2'   => $data['jikaresikotinggi2'][$key] !== '' ? $data['jikaresikotinggi2'][$key] : null,
                'jikaresikorendah3'   => $data['jikaresikorendah3'][$key] !== '' ? $data['jikaresikorendah3'][$key] : null,
                'jikaresikorendah4'   => $data['jikaresikorendah4'][$key] !== '' ? $data['jikaresikorendah4'][$key] : null,
                'perawatsauikr'       => $data['perawatsauikr'][$key] !== '' ? $data['perawatsauikr'][$key] : null,
                'created_at'          => $value,
            );
            // var_dump($data_pert);die;
            $this->db->insert('sm_skrining_admisi_uikr', $data_sauikr);
        }
    }

    // SAUIKR 4
    function editSkriningAdmisiUikr($data){
        return $this->db->where('id', $data['id'], true)->update('sm_skrining_admisi_uikr', $data);
    }

    // SAUIKR 2
    function getSkriningAdmisiUikr($id_layanan_pendaftaran){
        return $this->db->select("sauikr.*, COALESCE(spg.nama, '') as perawat, 
                                          COALESCE(wid.nama, '') as akun_user")
            ->from('sm_skrining_admisi_uikr as sauikr')
            ->join('sm_layanan_pendaftaran as lp', 'sauikr.id_layanan_pendaftaran = lp.id')
            ->join('sm_tenaga_medis as tmp', 'sauikr.perawatsauikr = tmp.id', 'left')
            ->join('sm_pegawai as spg', 'spg.id = tmp.id_pegawai', 'left')
            // user
            ->join('sm_translucent sid', 'sauikr.id_user = sid.id', 'left')
            ->join('sm_pegawai wid', 'sauikr.id_user = wid.id', 'left')
            ->where('lp.id_pendaftaran', $id_layanan_pendaftaran, true)
            ->order_by('sauikr.tanggal_sauikr', 'asc')
            ->get()
            ->result();
    }

    // SAUIKR 3
    function getSkriningAdmisiUikrByID($id){
        return $this->db->select("sauikr.*, COALESCE(spg.nama, '') as perawat, 
                                          COALESCE(wid.nama, '') as akun_user")
            ->from('sm_skrining_admisi_uikr as sauikr')
            ->join('sm_tenaga_medis as tmp', 'sauikr.perawatsauikr = tmp.id', 'left')
            ->join('sm_pegawai as spg', 'spg.id = tmp.id_pegawai', 'left')
            // user
            ->join('sm_translucent sid', 'sauikr.id_user = sid.id', 'left')
            ->join('sm_pegawai wid', 'sauikr.id_user = wid.id', 'left')
            ->where('sauikr.id', $id)
            ->order_by('sauikr.tanggal_sauikr', 'asc')
            ->get()
            ->row();
    }

    // SAUIKR 5
    function deleteSkriningAdmisiUikr($id){
        return $this->db->where("id", $id)->delete("sm_skrining_admisi_uikr");
    }

    // SAUIKR 6
    function insertLogsSkriningAdmisiUikr($data) { 
        return $this->db->insert('sm_skrining_admisi_uikr_logs', $data);
    }
    












    function setPascaRanap($id)
    {
        $update = ['is_kontrol_pasca_ranap' => '0'];
        return $this->db->where('kode_booking', $id)->update('sm_antrian_bpjs', $update);
    }








    // GRAFIK PARTOLOGI // PARTOGRAF
    function insertGrafikPartograf($data){
        $data = array(
            'id_layanan_pendaftaran' => $data['id_layanan_pendaftaran'],
            'id_pendaftaran'         => $data['id_pendaftaran'],
            'id_user'                => $data['id_user'],
            'denyut_partograf'       => $data['denyut_partograf'],
            'created_at'             => date('Y-m-d H:i:s'), // Menggunakan timestamp saat ini
        );
        $this->db->insert('sm_grafik_partograf', $data);
    }

    // GRAFIK PARTOLOGI
    function getGrafikPartograf($id_pendaftaran){
        return $this->db
            ->select("prt.*, COALESCE(pg.nama, '') as nama_petugas")
            ->from('sm_grafik_partograf as prt')
            ->join('sm_layanan_pendaftaran as lp', 'prt.id_layanan_pendaftaran = lp.id')
            ->join('sm_pendaftaran as pd', 'lp.id_pendaftaran = pd.id')
            ->join('sm_pegawai as pg', 'prt.id_user = pg.id', 'left')
            ->where('lp.id_pendaftaran', $id_pendaftaran)
            ->order_by('prt.id', 'asc')
            ->get()
            ->result();
        $this->db->close();
    }

    // GRAFIK PARTOLOGI
    function updateGrafikPartograf($data){
        return $this->db->where('id', $data['id'], true)->update('sm_grafik_partograf', $data);
    }    

    // GRAFIK PARTOLOGI
    function deleteGrafikPartograf($id){
        return $this->db->where("id", $id)->delete("sm_grafik_partograf");
    }

    // GRAFIK PARTOLOGI
    function getGrafikPartografByID($id){
        return $this->db
            ->select("prt.*, COALESCE(pg.nama, '') as nama_petugas")
            ->from('sm_grafik_partograf as prt')
            ->join('sm_layanan_pendaftaran as lp', 'prt.id_layanan_pendaftaran = lp.id')
            ->join('sm_pendaftaran as pd', 'lp.id_pendaftaran = pd.id')
            ->join('sm_pegawai as pg', ' prt.id_user = pg.id', 'left')
            ->where('prt.id', $id)
            ->order_by('prt.id', 'asc')
            ->get()
            ->row();
        $this->db->close();
    }

    // GRAFIK PARTOLOGI LOGS
    function insertLogGrafikPartograf($data) {
        return $this->db->insert('sm_grafik_partograf_logs', $data);
    }

    // GRAFIK SERVIKS
    function insertGrafikServiks($data){
        $data = array(
            'id_layanan_pendaftaran'    => $data['id_layanan_pendaftaran'],
            'id_pendaftaran'            => $data['id_pendaftaran'],
            'id_user'                   => $data['id_user'],
            'number_serviks'            => $data['number_serviks'],
            'pembukaan_serviks'         => $data['pembukaan_serviks'],
            'kepala_serviks'            => $data['kepala_serviks'],
            'created_at'                => date('Y-m-d H:i:s'), // Menggunakan timestamp saat ini
        );
        $this->db->insert('sm_grafik_serviks', $data);
    }

    // GRAFIK SERVIKS
    function getGrafikServiks($id_pendaftaran){
        return $this->db
            ->select("svk.*, COALESCE(pg.nama, '') as nama_petugas")
            ->from('sm_grafik_serviks as svk')
            ->join('sm_layanan_pendaftaran as lp', 'svk.id_layanan_pendaftaran = lp.id')
            ->join('sm_pendaftaran as pd', 'lp.id_pendaftaran = pd.id')
            ->join('sm_pegawai as pg', 'svk.id_user = pg.id', 'left')
            ->where('lp.id_pendaftaran', $id_pendaftaran)
            ->order_by('svk.id', 'asc')
            ->get()
            ->result();
        $this->db->close();
    }

    // GRAFIK SERVIKS
    function updateGrafikServiks($data){
        return $this->db->where('id', $data['id'], true)->update('sm_grafik_serviks', $data);
    }

    // GRAFIK SERVIKS
    function deleteGrafikServiks($id){
        return $this->db->where("id", $id)->delete("sm_grafik_serviks");
    }

    // GRAFIK SERVIKS
    function getGrafikServiksByID($id){
        return $this->db
            ->select("svk.*, COALESCE(pg.nama, '') as nama_petugas")
            ->from('sm_grafik_serviks as svk')
            ->join('sm_layanan_pendaftaran as lp', 'svk.id_layanan_pendaftaran = lp.id')
            ->join('sm_pendaftaran as pd', 'lp.id_pendaftaran = pd.id')
            ->join('sm_pegawai as pg', ' svk.id_user = pg.id', 'left')
            ->where('svk.id', $id)
            ->order_by('svk.id', 'asc')
            ->get()
            ->row();
        $this->db->close();
    }

    // GRAFIK SERVIKS LOGS
    function insertLogGrafikServiks($data) {
        return $this->db->insert('sm_grafik_serviks_logs', $data);
    }

    // GRAFIK NT
    function insertGrafikNT($data){     
        $data = array(
            'id_layanan_pendaftaran'    => $data['id_layanan_pendaftaran'],
            'id_pendaftaran'            => $data['id_pendaftaran'],
            'id_user'                   => $data['id_user'],
            'number_nt'                 => $data['number_nt'],
            'atas_nt'                   => $data['atas_nt'],
            'nadi_nt'                   => $data['nadi_nt'],
            'tekanan_nt'                => $data['tekanan_nt'],
            'tekanan_nt_3'              => $data['tekanan_nt_3'],
            'tekanan_nt_4'              => $data['tekanan_nt_4'],
            'tekanan_nt_5'              => $data['tekanan_nt_5'],
            'tekanan_nt_6'              => $data['tekanan_nt_6'],
            'tekanan_nt_7'              => $data['tekanan_nt_7'],
            'tekanan_nt_8'              => $data['tekanan_nt_8'],
            'created_at'                => date('Y-m-d H:i:s'), // Menggunakan timestamp saat ini
        );
        $this->db->insert('sm_grafik_nt', $data);
    }

    // GRAFIK NT
    function getGrafikNT($id_pendaftaran){
        return $this->db
            ->select("nt.*, COALESCE(pg.nama, '') as nama_petugas")
            ->from('sm_grafik_nt as nt')
            ->join('sm_layanan_pendaftaran as lp', 'nt.id_layanan_pendaftaran = lp.id')
            ->join('sm_pendaftaran as pd', 'lp.id_pendaftaran = pd.id')
            ->join('sm_pegawai as pg', 'nt.id_user = pg.id', 'left')
            ->where('lp.id_pendaftaran', $id_pendaftaran)
            ->order_by('nt.id', 'asc')
            ->get()
            ->result();
        $this->db->close();
    }

    // GRAFIK NT
    function updateGrafikNT($data){
        return $this->db->where('id', $data['id'], true)->update('sm_grafik_nt', $data);
    }

    // GRAFIK NT
    function deleteGrafikNT($id){
        return $this->db->where("id", $id)->delete("sm_grafik_nt");
    }

    // GRAFIK NT
    function getGrafikNTByID($id){
        return $this->db
            ->select("nt.*, COALESCE(pg.nama, '') as nama_petugas")
            ->from('sm_grafik_nt as nt')
            ->join('sm_layanan_pendaftaran as lp', 'nt.id_layanan_pendaftaran = lp.id')
            ->join('sm_pendaftaran as pd', 'lp.id_pendaftaran = pd.id')
            ->join('sm_pegawai as pg', ' nt.id_user = pg.id', 'left')
            ->where('nt.id', $id)
            ->order_by('nt.id', 'asc')
            ->get()
            ->row();
        $this->db->close();
    }

    // GRAFIK NT LOGS
    function insertLogGrafikNt($data) {
        return $this->db->insert('sm_grafik_nt_logs', $data);
    }

    // CP
    function getCatatanPersalinan($id_pendaftaran){
        return $this->db->select('cp.*, pbd.nama as bidan, pa.nama_ayah AS nama_ayah')
        ->from('sm_catatan_persalinan as cp')	      
        ->join('sm_layanan_pendaftaran as lp', 'lp.id = cp.id_layanan_pendaftaran')
        ->join('sm_pendaftaran as pd', 'pd.id = cp.id_pendaftaran')
        ->join('sm_pasien as pa', 'pa.id = pd.id_pasien')
        ->join('sm_tenaga_medis as tmb', 'tmb.id = cp.bidan_cp', 'left')
        ->join('sm_pegawai as pbd', 'pbd.id = tmb.id_pegawai', 'left')	
        ->where('lp.id_pendaftaran', $id_pendaftaran)
        ->get()
        ->row();
    }
    
	// CP LOGS 
	function getCatatanPersalinanLogs($id_pendaftaran){
		return $this->db->select('cp.*, pbd.nama as dokter, pgu.nama as user, pa.nama_ayah AS nama_ayah')
        ->from('sm_catatan_persalinan_logs as cp')	
        ->join('sm_layanan_pendaftaran as lp', 'lp.id = cp.id_layanan_pendaftaran')
        ->join('sm_pendaftaran as pd', 'pd.id = cp.id_pendaftaran')
        ->join('sm_pasien as pa', 'pa.id = pd.id_pasien')
        ->join('sm_tenaga_medis as tmb ', ' tmb.id = cp.bidan_cp', 'left')
        ->join('sm_pegawai as pbd ', ' pbd.id = tmb.id_pegawai', 'left')	
        ->join('sm_translucent as tr', 'tr.id = cp.id_users', 'left')
        ->join('sm_pegawai as pgu', 'pgu.id = tr.id', 'left')	
        ->where('lp.id_pendaftaran', $id_pendaftaran, true)
		->get()
		->result();
	}

    // CP
	function updateCatatanPersalinan($data_cp, $id_partograf){
		$datetime = date('Y-m-d H:i:s');	
		if ($id_partograf === '') {
			$data_cp['created_date'] = $datetime;
			$this->db->insert('sm_catatan_persalinan', $data_cp);				
			return ['status' => true, 'message' => 'Berhasil Menambahkan Data '];				
		} else {
			$data_before_cp = $this->db->select("*, '' as id_users, '' as tanggal_ubah_cp")->from('sm_catatan_persalinan')->where('id', $id_partograf)->get()->row();	
			unset($data_before_cp->id);
			$data_before_cp->id_users = $this->session->userdata('id_translucent');
			$data_before_cp->tanggal_ubah_cp = $datetime;	
			$data_cp['updated_date'] = $datetime;	
			$this->db->set($data_cp)->where('id', $id_partograf)->update('sm_catatan_persalinan');	
			$this->db->insert('sm_catatan_persalinan_logs', $data_before_cp);	
			return ['status' => true, 'message' => 'Berhasil Mengubah Data '];				
		}				
	}



            
   







    


 





    function getPendaftaranById($id)
    {
        $this->db->select(" *,(SELECT id FROM sm_layanan_pendaftaran where id_pendaftaran='" . $id . "' and konsul=0 ORDER BY id ASC limit 1) id_layanan_pendaftaran ", true);
        $this->db->from('sm_pendaftaran');
        $this->db->where('id', $id, true);
        return $this->db->get()->row();
    }

    function getVerifiedRaber($id)
    {
        $update = array('waktu_verif_raber' => $this->datetime);
        return $this->db->where('id', $id, true)->update('sm_cppt', $update);
    }




    // FMPP
    function getFmpp($id_pendaftaran, $id_layanan){
        // Menulis query SQL secara manual
        $sql = "
            SELECT
                f.*, pa.nama AS nama_nadis_a, pb.nama AS nama_nadis_b
            FROM
                sm_fmpp AS f
            JOIN
                sm_layanan_pendaftaran AS lp ON lp.ID = f.id_layanan_pendaftaran
            JOIN
                sm_pendaftaran AS pd ON pd.ID = f.id_pendaftaran
            LEFT JOIN
                sm_tenaga_medis AS tma ON tma.ID = f.fmpp_petugas_a
            LEFT JOIN
                sm_pegawai AS pa ON pa.ID = tma.id_pegawai
            LEFT JOIN
                sm_tenaga_medis AS tmb ON tmb.ID = f.fmpp_petugas_b
            LEFT JOIN
                sm_pegawai AS pb ON pb.ID = tmb.id_pegawai
            WHERE
                lp.ID = ?
            ORDER BY
                GREATEST(f.fmpp_tanggal_a, f.fmpp_tanggal_b) DESC
        ";

        // Menjalankan query dengan parameter yang aman
        $query = $this->db->query($sql, array($id_layanan));

        // Mendapatkan hasilnya
        return $query->result(); // Mengembalikan hasil query
    }

    // FMPP
    function getFmppByID($id){
        // Menulis query SQL secara manual
        $sql = "
            SELECT
                f.*, pa.nama AS nama_nadis_a, pb.nama AS nama_nadis_b
            FROM
                sm_fmpp AS f
            JOIN
                sm_layanan_pendaftaran AS lp ON lp.ID = f.id_layanan_pendaftaran
            JOIN
                sm_pendaftaran AS pd ON pd.ID = f.id_pendaftaran
            LEFT JOIN
                sm_tenaga_medis AS tma ON tma.ID = f.fmpp_petugas_a
            LEFT JOIN
                sm_pegawai AS pa ON pa.ID = tma.id_pegawai
            LEFT JOIN
                sm_tenaga_medis AS tmb ON tmb.ID = f.fmpp_petugas_b
            LEFT JOIN
                sm_pegawai AS pb ON pb.ID = tmb.id_pegawai
            WHERE
                f.ID = ?
        ";

        // Menjalankan query dengan parameter yang aman
        $query = $this->db->query($sql, array($id));

        // Mengembalikan satu baris hasil query
        return $query->row(); 
    }

    // FMPP LOGS
    function deleteFmpp($id) { 
        // Ambil data lama
        $data_lama = $this->db->get_where('sm_fmpp', ['id' => $id])->row_array();   
        if ($data_lama) {
            // Simpan log sebelum hapus
            $log = $data_lama;
            unset($log['id']); // Hilangkan ID agar tidak konflik
            $log['updated_date'] = date('Y-m-d H:i:s'); // waktu penghapusan
            $log['created_date'] = date('Y-m-d H:i:s');
            
            $this->insertLogFmpp($log);
        }
        // Hapus data utama
        return $this->db->where("id", $id)->delete("sm_fmpp");
    }

    // FMPP
    function insertLogFmpp($data) {
        return $this->db->insert('sm_fmpp_logs', $data);
    }





    // FLISUB
    function getFli($id_pendaftaran, $id_layanan){
        // Menulis query SQL secara manual
        $sql = "
            SELECT
                f.*,
                pa.nama AS nama_nadis_pelapor,
                pb.nama AS nama_nadis_penerima 
            FROM
                sm_kep_08_01 AS f
            JOIN
                sm_layanan_pendaftaran AS lp ON lp.ID = f.id_layanan_pendaftaran
            JOIN
                sm_pendaftaran AS pd ON pd.ID = f.id_pendaftaran
            LEFT JOIN
                sm_tenaga_medis AS tma ON tma.ID = f.fli_pelapor
            LEFT JOIN
                sm_pegawai AS pa ON pa.ID = tma.id_pegawai
            LEFT JOIN
                sm_tenaga_medis AS tmb ON tmb.ID = f.fli_penerima
            LEFT JOIN
                sm_pegawai AS pb ON pb.ID = tmb.id_pegawai
            WHERE
                lp.ID = ?
            ORDER BY
                fli_tanggal_insiden DESC
        ";

        // Menjalankan query dengan parameter yang aman
        $query = $this->db->query($sql, array($id_layanan));

        // Mendapatkan hasilnya
        return $query->row(); // Mengembalikan hasil query
    }

    // FLISUB LOGS
    function getFliLogs($id_fli) {
        $sql = "
            SELECT 
                l.*,
                pa.nama AS nama_nadis_pelapor,
                pb.nama AS nama_nadis_penerima 
            FROM 
                sm_kep_08_01_logs AS l
            LEFT JOIN
                sm_tenaga_medis AS tma ON tma.ID = l.fli_pelapor
            LEFT JOIN
                sm_pegawai AS pa ON pa.ID = tma.id_pegawai
            LEFT JOIN
                sm_tenaga_medis AS tmb ON tmb.ID = l.fli_penerima
            LEFT JOIN
                sm_pegawai AS pb ON pb.ID = tmb.id_pegawai
            WHERE 
                l.id_fli = ?
            ORDER BY 
                l.log_created_at DESC
        ";
    
        $query = $this->db->query($sql, array($id_fli));
        return $query->result(); // hasilnya array of logs
    }


    // PENGKAJIAN LANSIA
    function getPengkajianUlangResikoJatuhPasienLansia($id_layanan_pendaftaran){
        return $this->db->select("sfpurjpa.*, COALESCE(spg.nama, '') as perawat, COALESCE(gid.nama, '') as akun_user")
            ->from('sm_form_pengkajian_ulang_risiko_jatuh_pasien_lansia as sfpurjpa')
            ->join('sm_layanan_pendaftaran as lp',' sfpurjpa.id_layanan_pendaftaran = lp.id')
            ->join('sm_tenaga_medis stm', 'sfpurjpa.id_perawat = stm.id', 'left')
            ->join('sm_translucent sid', 'sfpurjpa.id_user = sid.id', 'left')
            ->join('sm_pegawai gid', 'sfpurjpa.id_user = gid.id', 'left')
            ->join('sm_pegawai spg', 'spg.id = stm.id_pegawai', 'left')
            ->where('lp.id_pendaftaran', $id_layanan_pendaftaran, true)
            ->order_by('sfpurjpa.tanggal_pengkajian')
            ->get()
            ->result();
    }

    // PENGKAJIAN LANSIA
    function getPengkajianUlangResikoJatuhPasienLansiaByID($id){
        return $this->db->select("sfpurjpa.*, COALESCE(spg.nama, '') as nama_perawat, COALESCE(gid.nama, '') as akun_user")
            ->from('sm_form_pengkajian_ulang_risiko_jatuh_pasien_lansia as sfpurjpa')
            ->join('sm_tenaga_medis stm', 'sfpurjpa.id_perawat = stm.id', 'left')
            ->join('sm_translucent sid', 'sfpurjpa.id_user = sid.id', 'left')
            ->join('sm_pegawai gid', 'sfpurjpa.id_user = gid.id', 'left')
            ->join('sm_pegawai spg', 'spg.id = stm.id_pegawai', 'left')
            ->where('sfpurjpa.id', $id)
            ->order_by('sfpurjpa.tanggal_pengkajian')
            ->get()
            ->row();
    }

    // PENGKAJIAN LANSIA
    function insertPengkajianUlangLansia($data){
        foreach ($data['date_created'] as $key => $value) {
			$tanggal_pengkajian_anak = str_replace('/', '-', $data['tanggal_pengkajian'][$key]);
			$tanggal_pengkajian_anak = date("Y-m-d", strtotime($tanggal_pengkajian_anak));
            $data_terapi = array(
                'id_pendaftaran'             => $data['id_pendaftaran'],
                'id_layanan_pendaftaran'     => $data['id_layanan_pendaftaran'],
                'id_perawat'                 => $data['id_perawat'][$key],
                'id_user'                    => $data['id_user'][$key],
                'tanggal_pengkajian'         => $tanggal_pengkajian_anak,
                'jumlah_skor'                => $data['jumlah_skor'][$key],
                'paraf'                      => $data['paraf'][$key],
                'pasien_datang_karena_jatuh' => $data['pasien_datang_karena_jatuh'][$key] !== '' ? $data['pasien_datang_karena_jatuh'][$key] : 0,
                'jatuh_dua_bulan_terakhir'   => $data['jatuh_dua_bulan_terakhir'][$key] !== '' ? $data['jatuh_dua_bulan_terakhir'][$key] : 0,
                'delirium'                   => $data['delirium'][$key] !== '' ? $data['delirium'][$key] : 0,
                'disorientasi'               => $data['disorientasi'][$key] !== '' ? $data['disorientasi'][$key] : 0,
                'agitasi'                    => $data['agitasi'][$key] !== '' ? $data['agitasi'][$key] : 0,
                'kacamata'                   => $data['kacamata'][$key] !== '' ? $data['kacamata'][$key] : 0,
                'buram'                      => $data['buram'][$key] !== '' ? $data['buram'][$key] : 0,
                'galukoma'                   => $data['galukoma'][$key] !== '' ? $data['galukoma'][$key] : 0,
                'berkemih'                   => $data['berkemih'][$key] !== '' ? $data['berkemih'][$key] : 0,
                'purjpl_pasien_mandirit'     => $data['purjpl_pasien_mandirit'][$key] !== '' ? $data['purjpl_pasien_mandirit'][$key] : 0,
                'purjpl_pasien_m_mandiri'    => $data['purjpl_pasien_m_mandiri'][$key] !== '' ? $data['purjpl_pasien_m_mandiri'][$key] : 0,

                // 'mandiri'                    => $data['mandiri'][$key] !== '' ? $data['mandiri'][$key] : null,
                // 'sedikit_bantuan'            => $data['sedikit_bantuan'][$key] !== '' ? $data['sedikit_bantuan'][$key] : null,
                // 'bantuan_nyata'              => $data['bantuan_nyata'][$key] !== '' ? $data['bantuan_nyata'][$key] : null,
                // 'bantuan_total'              => $data['bantuan_total'][$key] !== '' ? $data['bantuan_total'][$key] : null,

                // 'm_mandiri'                  => $data['m_mandiri'][$key] !== '' ? $data['m_mandiri'][$key] : null,
                // 'm_sedikit_bantuan'          => $data['m_sedikit_bantuan'][$key] !== '' ? $data['m_sedikit_bantuan'][$key] : null,
                // 'kursi_roda'                 => $data['kursi_roda'][$key] !== '' ? $data['kursi_roda'][$key] : null,
                // 'imobilisasi'                => $data['imobilisasi'][$key] !== '' ? $data['imobilisasi'][$key] : null,
                'created_at'                 => $data['date_created'][$key],
            );         
            $this->db->insert('sm_form_pengkajian_ulang_risiko_jatuh_pasien_lansia', $data_terapi);          
            // var_dump($data_terapi);die;
        }
    }

    // PENGKAJIAN LANSIA
    function editPengkajianRisikoJatuhPasienLansia($data){
        return $this->db->where('id', $data['id'], true)->update('sm_form_pengkajian_ulang_risiko_jatuh_pasien_lansia', $data);
    }

    // PENGKAJIAN LANSIA
    function deletePengkajianUlangRisikoJatuhPasienLansia($id){
        return $this->db->where("id", $id)->delete("sm_form_pengkajian_ulang_risiko_jatuh_pasien_lansia");
    }



    // UPAYA LANSIA
    function getUpayaPencegahanPasienLansia($id_layanan_pendaftaran){
        return $this->db->select("sfpurjpa.*, COALESCE(spgp.nama, '') as perawat_p, COALESCE(spgs.nama, '') as perawat_s,COALESCE(spgm.nama, '') as perawat_m, COALESCE(gid.nama, '') as akun_user")
            ->from('sm_form_upaya_pencegahan_risiko_jatuh_pasien_lansia as sfpurjpa')
            ->join('sm_layanan_pendaftaran as lp', 'sfpurjpa.id_layanan_pendaftaran = lp.id')
            ->join('sm_tenaga_medis stmp', 'sfpurjpa.id_perawat_p = stmp.id', 'left')
            ->join('sm_tenaga_medis stms', 'sfpurjpa.id_perawat_s = stms.id', 'left')
            ->join('sm_tenaga_medis stmm', 'sfpurjpa.id_perawat_m = stmm.id', 'left')
            ->join('sm_translucent sid', 'sfpurjpa.id_user = sid.id', 'left')
            ->join('sm_pegawai gid', 'sfpurjpa.id_user = gid.id', 'left')
            ->join('sm_pegawai spgp', 'spgp.id = stmp.id_pegawai', 'left')
            ->join('sm_pegawai spgs', 'spgs.id = stms.id_pegawai', 'left')
            ->join('sm_pegawai spgm', 'spgm.id = stmm.id_pegawai', 'left')
            ->where('lp.id_pendaftaran', $id_layanan_pendaftaran, true)
            ->order_by('sfpurjpa.tanggal_pengkajian')
            ->get()
            ->result();
    }

    // UPAYA LANSIA
    function getUpayaPencegahanResikoJatuhPasienLansiaByID($id){
        return $this->db->select("sfpurjpa.*, COALESCE(spgp.nama, '') as perawat_p, COALESCE(spgs.nama, '') as perawat_s,COALESCE(spgm.nama, '') as perawat_m, COALESCE(gid.nama, '') as akun_user")
            ->from('sm_form_upaya_pencegahan_risiko_jatuh_pasien_lansia as sfpurjpa')
            ->join('sm_tenaga_medis stmp', 'sfpurjpa.id_perawat_p = stmp.id', 'left')
            ->join('sm_tenaga_medis stms', 'sfpurjpa.id_perawat_s = stms.id', 'left')
            ->join('sm_tenaga_medis stmm', 'sfpurjpa.id_perawat_m = stmm.id', 'left')
            ->join('sm_translucent sid', 'sfpurjpa.id_user = sid.id', 'left')
            ->join('sm_pegawai gid', 'sfpurjpa.id_user = gid.id', 'left')
            ->join('sm_pegawai spgp', 'spgp.id = stmp.id_pegawai', 'left')
            ->join('sm_pegawai spgs', 'spgs.id = stms.id_pegawai', 'left')
            ->join('sm_pegawai spgm', 'spgm.id = stmm.id_pegawai', 'left')
            ->where('sfpurjpa.id', $id)
            ->order_by('sfpurjpa.tanggal_pengkajian')
            ->get()
            ->row();
    }

    // UPAYA LANSIA
    function insertUpayaPencegahanLansia($data){
        foreach ($data['date_created'] as $key => $value) {
            $tanggal_pengkajian_anak = str_replace('/', '-', $data['tanggal_pengkajian'][$key]);
            $tanggal_pengkajian_anak = date("Y-m-d", strtotime($tanggal_pengkajian_anak));

            $data_terapi = array(
                'id_pendaftaran'             => $data['id_pendaftaran'],
                'id_layanan_pendaftaran'     => $data['id_layanan_pendaftaran'],
                'id_perawat_p'                 => $data['id_perawat_p'][$key] !== '' ? $data['id_perawat_p'][$key] : null,
                'id_perawat_s'                 => $data['id_perawat_s'][$key] !== '' ? $data['id_perawat_s'][$key] : null,
                'id_perawat_m'                 => $data['id_perawat_m'][$key] !== '' ? $data['id_perawat_m'][$key] : null,
                'id_user'                    => $data['id_user'][$key],
                'tanggal_pengkajian'         => $tanggal_pengkajian_anak,

                'bel_p_ho' => $data['bel_p_ho'][$key] !== '' ? $data['bel_p_ho'][$key] : null,
                'bel_p_10' => $data['bel_p_10'][$key] !== '' ? $data['bel_p_10'][$key] : null,
                'bel_s_ho' => $data['bel_s_ho'][$key] !== '' ? $data['bel_s_ho'][$key] : null,
                'bel_s_18' => $data['bel_s_18'][$key] !== '' ? $data['bel_s_18'][$key] : null,
                'bel_m_ho' => $data['bel_m_ho'][$key] !== '' ? $data['bel_m_ho'][$key] : null,
                'bel_m_23' => $data['bel_m_23'][$key] !== '' ? $data['bel_m_23'][$key] : null,
                'bel_m_4' => $data['bel_m_4'][$key] !== '' ? $data['bel_m_4'][$key] : null,

                'roda_p_ho' => $data['roda_p_ho'][$key] !== '' ? $data['roda_p_ho'][$key] : null,
                'roda_p_10' => $data['roda_p_10'][$key] !== '' ? $data['roda_p_10'][$key] : null,
                'roda_s_ho' => $data['roda_s_ho'][$key] !== '' ? $data['roda_s_ho'][$key] : null,
                'roda_s_18' => $data['roda_s_18'][$key] !== '' ? $data['roda_s_18'][$key] : null,
                'roda_m_ho' => $data['roda_m_ho'][$key] !== '' ? $data['roda_m_ho'][$key] : null,
                'roda_m_23' => $data['roda_m_23'][$key] !== '' ? $data['roda_m_23'][$key] : null,
                'roda_m_4' => $data['roda_m_4'][$key] !== '' ? $data['roda_m_4'][$key] : null,

                'ptt_p_ho' => $data['ptt_p_ho'][$key] !== '' ? $data['ptt_p_ho'][$key] : null,
                'ptt_p_10' => $data['ptt_p_10'][$key] !== '' ? $data['ptt_p_10'][$key] : null,
                'ptt_s_ho' => $data['ptt_s_ho'][$key] !== '' ? $data['ptt_s_ho'][$key] : null,
                'ptt_s_18' => $data['ptt_s_18'][$key] !== '' ? $data['ptt_s_18'][$key] : null,
                'ptt_m_ho' => $data['ptt_m_ho'][$key] !== '' ? $data['ptt_m_ho'][$key] : null,
                'ptt_m_23' => $data['ptt_m_23'][$key] !== '' ? $data['ptt_m_23'][$key] : null,
                'ptt_m_4' => $data['ptt_m_4'][$key] !== '' ? $data['ptt_m_4'][$key] : null,

                'ppt_p_ho' => $data['ppt_p_ho'][$key] !== '' ? $data['ppt_p_ho'][$key] : null,
                'ppt_p_10' => $data['ppt_p_10'][$key] !== '' ? $data['ppt_p_10'][$key] : null,
                'ppt_s_ho' => $data['ppt_s_ho'][$key] !== '' ? $data['ppt_s_ho'][$key] : null,
                'ppt_s_18' => $data['ppt_s_18'][$key] !== '' ? $data['ppt_s_18'][$key] : null,
                'ppt_m_ho' => $data['ppt_m_ho'][$key] !== '' ? $data['ppt_m_ho'][$key] : null,
                'ppt_m_23' => $data['ppt_m_23'][$key] !== '' ? $data['ppt_m_23'][$key] : null,
                'ppt_m_4' => $data['ppt_m_4'][$key] !== '' ? $data['ppt_m_4'][$key] : null,

                'penerangan_p_ho' => $data['penerangan_p_ho'][$key] !== '' ? $data['penerangan_p_ho'][$key] : null,
                'penerangan_p_10' => $data['penerangan_p_10'][$key] !== '' ? $data['penerangan_p_10'][$key] : null,
                'penerangan_s_ho' => $data['penerangan_s_ho'][$key] !== '' ? $data['penerangan_s_ho'][$key] : null,
                'penerangan_s_18' => $data['penerangan_s_18'][$key] !== '' ? $data['penerangan_s_18'][$key] : null,
                'penerangan_m_ho' => $data['penerangan_m_ho'][$key] !== '' ? $data['penerangan_m_ho'][$key] : null,
                'penerangan_m_23' => $data['penerangan_m_23'][$key] !== '' ? $data['penerangan_m_23'][$key] : null,
                'penerangan_m_4' => $data['penerangan_m_4'][$key] !== '' ? $data['penerangan_m_4'][$key] : null,

                'alas_p_ho' => $data['alas_p_ho'][$key] !== '' ? $data['alas_p_ho'][$key] : null,
                'alas_p_10' => $data['alas_p_10'][$key] !== '' ? $data['alas_p_10'][$key] : null,
                'alas_s_ho' => $data['alas_s_ho'][$key] !== '' ? $data['alas_s_ho'][$key] : null,
                'alas_s_18' => $data['alas_s_18'][$key] !== '' ? $data['alas_s_18'][$key] : null,
                'alas_m_ho' => $data['alas_m_ho'][$key] !== '' ? $data['alas_m_ho'][$key] : null,
                'alas_m_23' => $data['alas_m_23'][$key] !== '' ? $data['alas_m_23'][$key] : null,
                'alas_m_4' => $data['alas_m_4'][$key] !== '' ? $data['alas_m_4'][$key] : null,

                'lantai_p_ho' => $data['lantai_p_ho'][$key] !== '' ? $data['lantai_p_ho'][$key] : null,
                'lantai_p_10' => $data['lantai_p_10'][$key] !== '' ? $data['lantai_p_10'][$key] : null,
                'lantai_s_ho' => $data['lantai_s_ho'][$key] !== '' ? $data['lantai_s_ho'][$key] : null,
                'lantai_s_18' => $data['lantai_s_18'][$key] !== '' ? $data['lantai_s_18'][$key] : null,
                'lantai_m_ho' => $data['lantai_m_ho'][$key] !== '' ? $data['lantai_m_ho'][$key] : null,
                'lantai_m_23' => $data['lantai_m_23'][$key] !== '' ? $data['lantai_m_23'][$key] : null,
                'lantai_m_4' => $data['lantai_m_4'][$key] !== '' ? $data['lantai_m_4'][$key] : null,

                'alat_p_ho' => $data['alat_p_ho'][$key] !== '' ? $data['alat_p_ho'][$key] : null,
                'alat_p_10' => $data['alat_p_10'][$key] !== '' ? $data['alat_p_10'][$key] : null,
                'alat_s_ho' => $data['alat_s_ho'][$key] !== '' ? $data['alat_s_ho'][$key] : null,
                'alat_s_18' => $data['alat_s_18'][$key] !== '' ? $data['alat_s_18'][$key] : null,
                'alat_m_ho' => $data['alat_m_ho'][$key] !== '' ? $data['alat_m_ho'][$key] : null,
                'alat_m_23' => $data['alat_m_23'][$key] !== '' ? $data['alat_m_23'][$key] : null,
                'alat_m_4' => $data['alat_m_4'][$key] !== '' ? $data['alat_m_4'][$key] : null,

                'edukasi_p_ho' => $data['edukasi_p_ho'][$key] !== '' ? $data['edukasi_p_ho'][$key] : null,
                'edukasi_p_10' => $data['edukasi_p_10'][$key] !== '' ? $data['edukasi_p_10'][$key] : null,
                'edukasi_s_ho' => $data['edukasi_s_ho'][$key] !== '' ? $data['edukasi_s_ho'][$key] : null,
                'edukasi_s_18' => $data['edukasi_s_18'][$key] !== '' ? $data['edukasi_s_18'][$key] : null,
                'edukasi_m_ho' => $data['edukasi_m_ho'][$key] !== '' ? $data['edukasi_m_ho'][$key] : null,
                'edukasi_m_23' => $data['edukasi_m_23'][$key] !== '' ? $data['edukasi_m_23'][$key] : null,
                'edukasi_m_4' => $data['edukasi_m_4'][$key] !== '' ? $data['edukasi_m_4'][$key] : null,

                'commode_p_ho' => $data['commode_p_ho'][$key] !== '' ? $data['commode_p_ho'][$key] : null,
                'commode_p_10' => $data['commode_p_10'][$key] !== '' ? $data['commode_p_10'][$key] : null,
                'commode_s_ho' => $data['commode_s_ho'][$key] !== '' ? $data['commode_s_ho'][$key] : null,
                'commode_s_18' => $data['commode_s_18'][$key] !== '' ? $data['commode_s_18'][$key] : null,
                'commode_m_ho' => $data['commode_m_ho'][$key] !== '' ? $data['commode_m_ho'][$key] : null,
                'commode_m_23' => $data['commode_m_23'][$key] !== '' ? $data['commode_m_23'][$key] : null,
                'commode_m_4' => $data['commode_m_4'][$key] !== '' ? $data['commode_m_4'][$key] : null,

                'gelang_p_ho' => $data['gelang_p_ho'][$key] !== '' ? $data['gelang_p_ho'][$key] : null,
                'gelang_p_10' => $data['gelang_p_10'][$key] !== '' ? $data['gelang_p_10'][$key] : null,
                'gelang_s_ho' => $data['gelang_s_ho'][$key] !== '' ? $data['gelang_s_ho'][$key] : null,
                'gelang_s_18' => $data['gelang_s_18'][$key] !== '' ? $data['gelang_s_18'][$key] : null,
                'gelang_m_ho' => $data['gelang_m_ho'][$key] !== '' ? $data['gelang_m_ho'][$key] : null,
                'gelang_m_23' => $data['gelang_m_23'][$key] !== '' ? $data['gelang_m_23'][$key] : null,
                'gelang_m_4' => $data['gelang_m_4'][$key] !== '' ? $data['gelang_m_4'][$key] : null,

                'station_p_ho' => $data['station_p_ho'][$key] !== '' ? $data['station_p_ho'][$key] : null,
                'station_p_10' => $data['station_p_10'][$key] !== '' ? $data['station_p_10'][$key] : null,
                'station_s_ho' => $data['station_s_ho'][$key] !== '' ? $data['station_s_ho'][$key] : null,
                'station_s_18' => $data['station_s_18'][$key] !== '' ? $data['station_s_18'][$key] : null,
                'station_m_ho' => $data['station_m_ho'][$key] !== '' ? $data['station_m_ho'][$key] : null,
                'station_m_23' => $data['station_m_23'][$key] !== '' ? $data['station_m_23'][$key] : null,
                'station_m_4' => $data['station_m_4'][$key] !== '' ? $data['station_m_4'][$key] : null,

                'paraf_p_ho' => $data['paraf_p_ho'][$key] !== '' ? $data['paraf_p_ho'][$key] : null,
                'paraf_p_10' => $data['paraf_p_10'][$key] !== '' ? $data['paraf_p_10'][$key] : null,
                'paraf_s_ho' => $data['paraf_s_ho'][$key] !== '' ? $data['paraf_s_ho'][$key] : null,
                'paraf_s_18' => $data['paraf_s_18'][$key] !== '' ? $data['paraf_s_18'][$key] : null,
                'paraf_m_ho' => $data['paraf_m_ho'][$key] !== '' ? $data['paraf_m_ho'][$key] : null,
                'paraf_m_23' => $data['paraf_m_23'][$key] !== '' ? $data['paraf_m_23'][$key] : null,
                'paraf_m_4' => $data['paraf_m_4'][$key] !== '' ? $data['paraf_m_4'][$key] : null,

                'created_at' => $value,
            );

            $this->db->insert('sm_form_upaya_pencegahan_risiko_jatuh_pasien_lansia', $data_terapi);
        }
    }

    // UPAYA LANSIA
    function editUpayaPencegahanRisikoJatuhPasienLansia($data){
        return $this->db->where('id', $data['id'], true)->update('sm_form_upaya_pencegahan_risiko_jatuh_pasien_lansia', $data);
    }

    // UPAYA LANSIA
    function deleteUpayaPencegahanRisikoJatuhPasienLansia($id){
        return $this->db->where("id", $id)->delete("sm_form_upaya_pencegahan_risiko_jatuh_pasien_lansia");
    }

	function getTandaVital($id_layanan_pendaftaran)
    {
        $sql = "SELECT an.waktu, an.tensi_sistolik, an.tensi_diastolik, an.nadi, an.suhu, an.nps, an.rr, an.urine,
                pd.no_register, pd.tanggal_daftar, pd.tanggal_keluar, 
                case when lp.jenis_layanan = 'Rawat Inap' then concat(lp.jenis_layanan, ' (', bs.nama, ' kelas ', kl.nama, ' ruang ', ri.no_ruang, ' No. Bed ', ri.no_bed, ')')
                else lp.jenis_layanan end ruangan, lp.tanggal_layanan, lp.tindak_lanjut

                FROM sm_anamnesa AS an 
                JOIN sm_layanan_pendaftaran lp ON an.id_layanan_pendaftaran=lp.id
                JOIN sm_pendaftaran pd on lp.id_pendaftaran=pd.id
                LEFT JOIN sm_rawat_inap ri ON lp.id=ri.id_layanan_pendaftaran
                LEFT JOIN sm_bangsal bs ON ri.id_bangsal=bs.id
                LEFT JOIN sm_kelas kl ON ri.id_kelas=kl.id
                WHERE an.id_layanan_pendaftaran = $id_layanan_pendaftaran
                ORDER BY an.waktu DESC ";
        return $this->db->query($sql)->result();
    }





    // MCOP PAGI
    function getCatatanOperanPerawatPagi($id_layanan_pendaftaran){
        return $this->db->select("cop.*, COALESCE(ga.nama, '') as akun_user, COALESCE(pdp.nama, '') as dokter_dpjp_pagi, COALESCE(ppop.nama, '') as petugas_mengover_pagi, COALESCE(ppm .nama, '') as petugas_menerima_pagi,  COALESCE(pkp.nama, '') as konsulen_pagi_g")
            ->from('sm_catatan_operan_perawat_pagi as cop')
            ->join('sm_translucent as st', 'st.id = cop.id_users', 'left')
            ->join('sm_pegawai as ga', 'ga.id = st.id', 'left') // user
            ->join('sm_layanan_pendaftaran as lp',' cop.id_layanan_pendaftaran = lp.id')
            ->join('sm_tenaga_medis as tmdp', 'cop.dpjp_utama_pagi = tmdp.id', 'left')
            ->join('sm_pegawai as pdp', 'tmdp.id_pegawai = pdp.id', 'left') //dokter
            ->join('sm_tenaga_medis as tmkp', 'cop.konsulen_pagi = tmkp.id', 'left')
            ->join('sm_pegawai as pkp', 'tmkp.id_pegawai = pkp.id', 'left') // konsulen
            ->join('sm_tenaga_medis as tmpop', 'cop.perawat_mengover_pagi = tmpop.id', 'left')
            ->join('sm_pegawai as ppop', 'tmpop.id_pegawai = ppop.id', 'left') // petugas mengover
            ->join('sm_tenaga_medis as tmpm', 'cop.perawat_menerima_pagi = tmpm.id', 'left')
            ->join('sm_pegawai as ppm', 'tmpm.id_pegawai = ppm.id', 'left') // petugas menerima
            ->where('lp.id_pendaftaran', $id_layanan_pendaftaran, true)
            // ->where('cop.id_layanan_pendaftaran', $id_layanan_pendaftaran, true)
            ->order_by('cop.tanggal_waktu_pagi desc')
            ->get()
            ->result();
        $this->db->close();
    }

    // MCOP PAGI
    function getCatatanOperanPerawatPagiByID($id){
        return $this->db->select("cop.*, COALESCE(ga.nama, '') as akun_user, COALESCE(pdp.nama, '') as dokter_dpjp_pagi, COALESCE(ppop.nama, '') as petugas_mengover_pagi, COALESCE(ppm .nama, '') as petugas_menerima_pagi,  COALESCE(pkp.nama, '') as konsulen_pagi_g")
            ->from('sm_catatan_operan_perawat_pagi as cop')
            ->join('sm_translucent as st', 'st.id = cop.id_users', 'left')
            ->join('sm_pegawai as ga', 'ga.id = st.id', 'left') // user

            // ->join('sm_layanan_pendaftaran as lp',' cop.id_layanan_pendaftaran = lp.id')

            ->join('sm_tenaga_medis as tmdp', 'cop.dpjp_utama_pagi = tmdp.id', 'left')
            ->join('sm_pegawai as pdp', 'tmdp.id_pegawai = pdp.id', 'left') //dokter

            ->join('sm_tenaga_medis as tmkp', 'cop.konsulen_pagi = tmkp.id', 'left')
            ->join('sm_pegawai as pkp', 'tmkp.id_pegawai = pkp.id', 'left') // konsulen

            ->join('sm_tenaga_medis as tmpop', 'cop.perawat_mengover_pagi = tmpop.id', 'left')
            ->join('sm_pegawai as ppop', 'tmpop.id_pegawai = ppop.id', 'left') // petugas mengover

            ->join('sm_tenaga_medis as tmpm', 'cop.perawat_menerima_pagi = tmpm.id', 'left')
            ->join('sm_pegawai as ppm', 'tmpm.id_pegawai = ppm.id', 'left') // petugas menerima

        //     ->where('lp.id_pendaftaran', $id_layanan_pendaftaran, true)
        //     // ->where('cop.id_layanan_pendaftaran', $id_layanan_pendaftaran, true)
        //     ->order_by('cop.tanggal_waktu_pagi desc')

        //     ->get()
        //     ->result();
        // $this->db->close();

        ->where('cop.id', $id) // Filter query berdasarkan id dari tabel sm_monitoring_pasien_c yang sesuai dengan parameter $id
        ->order_by('cop.tanggal_waktu_pagi', 'asc') // Mengurutkan hasil berdasarkan tanggal mpp secara ascending
        ->get() // Menjalankan query
        ->row(); // Mengambil satu baris hasil sebagai objek
    }

    // MCOP PAGI
    function editCatatanOperanRencanaPagi($data){
        return $this->db->where('id', $data['id'], true)->update('sm_catatan_operan_perawat_pagi', $data);
    }

    // MCOP PAGI
    function updateCatatanPagi($data){
        if (is_array($data['dpjp_utama_pagi'])) :
            foreach ($data['dpjp_utama_pagi'] as $i => $value) :
                $catatan_operan_perawat_pagi = array(
                    'id_pendaftaran'               => isset($data['id_pendaftaran']) ? $data['id_pendaftaran'] : null, // ✅ Tambahan
                    'id_layanan_pendaftaran'       => $data['id_layanan_pendaftaran'],
                    'operan_diagnosa_keperawatan'  => $data['operan_diagnosa_keperawatan'],
                    'dpjp_utama_pagi'              => $value,
                    'konsulen_pagi'                => $data['konsulen_pagi'][$i] == '' ? NULL : $data['konsulen_pagi'][$i],
                    'tanggal_waktu_pagi'           => $data['tanggal_waktu_pagi'][$i],
                    'diagnosa_keperawatan_pagi'    => $data['diagnosa_keperawatan_pagi'],
                    'infus_pagi'                   => $data['infus_pagi'][$i],
                    'rencana_tindakan_pagi'        => $data['rencana_tindakan_pagi'][$i],
                    'perawat_mengover_pagi'        => $data['perawat_mengover_pagi'][$i],
                    'perawat_menerima_pagi'        => $data['perawat_menerima_pagi'][$i],
                    'id_users'                     => $data['id_users'][$i],
                );
                $this->db->insert('sm_catatan_operan_perawat_pagi', $catatan_operan_perawat_pagi);
            endforeach;
        endif;
    }

    // MCOP PAGI
    function deleteCatatanOperanPagi($id){
        return $this->db->where("id", $id)->delete("sm_catatan_operan_perawat_pagi");
    }

    // MCOP SORE
    function getCatatanOperanPerawatSore($id_layanan_pendaftaran){
        return $this->db->select("cos.*, COALESCE(ga.nama, '') as akun_user, COALESCE(pds.nama, '') as dpjp_utama_sore, COALESCE(ppos.nama, '') as petugas_mengover_sore, COALESCE(ppms .nama, '') as petugas_menerima_sore,  COALESCE(pks.nama, '') as konsulen_sore_g")
            ->from('sm_catatan_operan_perawat_sore as cos')
            ->join('sm_translucent as st', 'st.id = cos.id_users', 'left')
            ->join('sm_pegawai as ga', 'ga.id = st.id', 'left') // user
            ->join('sm_layanan_pendaftaran as lp',' cos.id_layanan_pendaftaran = lp.id')
            ->join('sm_tenaga_medis as tmds', 'cos.dokter_dpjp_sore = tmds.id', 'left')
            ->join('sm_pegawai as pds', 'tmds.id_pegawai = pds.id', 'left') //dokter
            ->join('sm_tenaga_medis as tmks', 'cos.konsulen_sore = tmks.id', 'left')
            ->join('sm_pegawai as pks', 'tmks.id_pegawai = pks.id', 'left') // konsulen
            ->join('sm_tenaga_medis as tmpos', 'cos.perawat_mengover_sore = tmpos.id', 'left')
            ->join('sm_pegawai as ppos', 'tmpos.id_pegawai = ppos.id', 'left') // petugas mengover
            ->join('sm_tenaga_medis as tmpms', 'cos.perawat_menerima_sore = tmpms.id', 'left')
            ->join('sm_pegawai as ppms', 'tmpms.id_pegawai = ppms.id', 'left') // petugas menerima
            ->where('lp.id_pendaftaran', $id_layanan_pendaftaran, true)
            ->order_by('cos.tanggal_waktu_sore desc')
            ->get()
            ->result();
        $this->db->close();
    }

    // MCOP SORE
    function getCatatanOperanPerawatSoreByID($id){
        return $this->db->select("cos.*, COALESCE(ga.nama, '') as akun_user, COALESCE(pds.nama, '') as dpjp_utama_sore, COALESCE(ppos.nama, '') as petugas_mengover_sore, COALESCE(ppms .nama, '') as petugas_menerima_sore,  COALESCE(pks.nama, '') as konsulen_sore_g")
        ->from('sm_catatan_operan_perawat_sore as cos')
        ->join('sm_translucent as st', 'st.id = cos.id_users', 'left')
        ->join('sm_pegawai as ga', 'ga.id = st.id', 'left') // user
        ->join('sm_tenaga_medis as tmds', 'cos.dokter_dpjp_sore = tmds.id', 'left')
        ->join('sm_pegawai as pds', 'tmds.id_pegawai = pds.id', 'left') //dokter
        ->join('sm_tenaga_medis as tmks', 'cos.konsulen_sore = tmks.id', 'left')
        ->join('sm_pegawai as pks', 'tmks.id_pegawai = pks.id', 'left') // konsulen
        ->join('sm_tenaga_medis as tmpos', 'cos.perawat_mengover_sore = tmpos.id', 'left')
        ->join('sm_pegawai as ppos', 'tmpos.id_pegawai = ppos.id', 'left') // petugas mengover
        ->join('sm_tenaga_medis as tmpms', 'cos.perawat_menerima_sore = tmpms.id', 'left')
        ->join('sm_pegawai as ppms', 'tmpms.id_pegawai = ppms.id', 'left') // petugas menerima
        ->where('cos.id', $id) // Filter query berdasarkan id dari tabel sm_monitoring_pasien_c yang sesuai dengan parameter $id
        ->order_by('cos.tanggal_waktu_sore', 'asc') // Mengurutkan hasil berdasarkan tanggal mpp secara ascending
        ->get() // Menjalankan query
        ->row(); // Mengambil satu baris hasil sebagai objek
    }

    // MCOP SORE
    function editCatatanOperanRencanaSore($data){
        return $this->db->where('id', $data['id'], true)->update('sm_catatan_operan_perawat_sore', $data);
    }

    // MCOP SORE
    function updateCatatanSore($data){
        if (is_array($data['dokter_dpjp_sore'])) :
            foreach ($data['dokter_dpjp_sore'] as $i => $value) :
                $catatan_operan_perawat_sore = array(
                    'id_pendaftaran'               => isset($data['id_pendaftaran']) ? $data['id_pendaftaran'] : null, // ✅ Tambahan
                    'id_layanan_pendaftaran' => $data['id_layanan_pendaftaran'],
                    'dokter_dpjp_sore' => $value,
                    'konsulen_sore'   => $data['konsulen_sore'][$i] == '' ? NULL : $data['konsulen_sore'][$i],
                    'tanggal_waktu_sore' => $data['tanggal_waktu_sore'][$i],
                    'diagnosa_keperawatan_sore' => $data['diagnosa_keperawatan_sore'][$i],
                    'infus_sore' => $data['infus_sore'][$i],
                    'rencana_tindakan_sore' => $data['rencana_tindakan_sore'][$i],
                    'perawat_mengover_sore' => $data['perawat_mengover_sore'][$i],
                    'perawat_menerima_sore' => $data['perawat_menerima_sore'][$i],
                    'id_users' => $data['id_users'][$i],
                );
                $this->db->insert('sm_catatan_operan_perawat_sore', $catatan_operan_perawat_sore);
            endforeach;
        endif;
    }

    // MCOP SORE
    function deleteCatatanOperanSore($id){
        return $this->db->where("id", $id)->delete("sm_catatan_operan_perawat_sore");
    }

    // MCOP MALAM
    function getCatatanOperanPerawatMalam($id_layanan_pendaftaran){
        return $this->db->select("com.*, COALESCE(ga.nama, '') as akun_user, COALESCE(pdm.nama, '') as dpjp_utama_malam, COALESCE(ppom.nama, '') as petugas_mengover_malam, COALESCE(ppmm .nama, '') as petugas_menerima_malam,  COALESCE(pkm.nama, '') as konsulen_malam_g")
            ->from('sm_catatan_operan_perawat_malam as com')
            ->join('sm_translucent as st', 'st.id = com.id_users', 'left')
            ->join('sm_pegawai as ga', 'ga.id = st.id', 'left') // user
            ->join('sm_layanan_pendaftaran as lp',' com.id_layanan_pendaftaran = lp.id')
            ->join('sm_tenaga_medis as tmdm', 'com.dokter_dpjp_malam = tmdm.id', 'left')
            ->join('sm_pegawai as pdm', 'tmdm.id_pegawai = pdm.id', 'left') //dokter
            ->join('sm_tenaga_medis as tmkm', 'com.konsulen_malam = tmkm.id', 'left')
            ->join('sm_pegawai as pkm', 'tmkm.id_pegawai = pkm.id', 'left') // konsulen
            ->join('sm_tenaga_medis as tmpom', 'com.perawat_mengover_malam = tmpom.id', 'left')
            ->join('sm_pegawai as ppom', 'tmpom.id_pegawai = ppom.id', 'left') // petugas mengover
            ->join('sm_tenaga_medis as tmpmm', 'com.perawat_menerima_malam = tmpmm.id', 'left')
            ->join('sm_pegawai as ppmm', 'tmpmm.id_pegawai = ppmm.id', 'left') // petugas menerima
            ->where('lp.id_pendaftaran', $id_layanan_pendaftaran, true)
            // ->where('com.id_layanan_pendaftaran', $id_layanan_pendaftaran, true)
            ->order_by('com.tanggal_waktu_malam desc')
            ->get()
            ->result();
        $this->db->close();
    }

    // MCOP MALAM
    function getCatatanOperanPerawatMalamByID($id){
        return $this->db->select("com.*, COALESCE(ga.nama, '') as akun_user, COALESCE(pdm.nama, '') as dpjp_utama_malam, COALESCE(ppom.nama, '') as petugas_mengover_malam, COALESCE(ppmm .nama, '') as petugas_menerima_malam,  COALESCE(pkm.nama, '') as konsulen_malam_g")
            ->from('sm_catatan_operan_perawat_malam as com')
            ->join('sm_translucent as st', 'st.id = com.id_users', 'left')
            ->join('sm_pegawai as ga', 'ga.id = st.id', 'left') // user
            ->join('sm_tenaga_medis as tmdm', 'com.dokter_dpjp_malam = tmdm.id', 'left')
            ->join('sm_pegawai as pdm', 'tmdm.id_pegawai = pdm.id', 'left') //dokter
            ->join('sm_tenaga_medis as tmkm', 'com.konsulen_malam = tmkm.id', 'left')
            ->join('sm_pegawai as pkm', 'tmkm.id_pegawai = pkm.id', 'left') // konsulen
            ->join('sm_tenaga_medis as tmpom', 'com.perawat_mengover_malam = tmpom.id', 'left')
            ->join('sm_pegawai as ppom', 'tmpom.id_pegawai = ppom.id', 'left') // petugas mengover
            ->join('sm_tenaga_medis as tmpmm', 'com.perawat_menerima_malam = tmpmm.id', 'left')
            ->join('sm_pegawai as ppmm', 'tmpmm.id_pegawai = ppmm.id', 'left') // petugas menerima
        ->where('com.id', $id) // Filter query berdasarkan id dari tabel sm_monitoring_pasien_c yang sesuai dengan parameter $id
        ->order_by('com.tanggal_waktu_malam', 'asc') // Mengurutkan hasil berdasarkan tanggal mpp secara ascending
        ->get() // Menjalankan query
        ->row(); // Mengambil satu baris hasil sebagai objek
    }

    // MCOP MALAM
    function editCatatanOperanRencanaMalam($data){
        return $this->db->where('id', $data['id'], true)->update('sm_catatan_operan_perawat_malam', $data);
    }
   
    // MCOP MALAM
    function updateCatatanMalam($data){
        if (is_array($data['dokter_dpjp_malam'])) :
            foreach ($data['dokter_dpjp_malam'] as $i => $value) :
                $catatan_operan_perawat_malam = array(
                    'id_pendaftaran'               => isset($data['id_pendaftaran']) ? $data['id_pendaftaran'] : null, // ✅ Tambahan
                    'id_layanan_pendaftaran' => $data['id_layanan_pendaftaran'],
                    'dokter_dpjp_malam' => $value,
                    'konsulen_malam'   => $data['konsulen_malam'][$i] == '' ? NULL : $data['konsulen_malam'][$i],
                    'tanggal_waktu_malam' => $data['tanggal_waktu_malam'][$i],
                    'diagnosa_keperawatan_malam' => $data['diagnosa_keperawatan_malam'][$i],
                    'infus_malam' => $data['infus_malam'][$i],
                    'rencana_tindakan_malam' => $data['rencana_tindakan_malam'][$i],
                    'perawat_mengover_malam' => $data['perawat_mengover_malam'][$i],
                    'perawat_menerima_malam' => $data['perawat_menerima_malam'][$i],
                    'id_users' => $data['id_users'][$i],
                );
                $this->db->insert('sm_catatan_operan_perawat_malam', $catatan_operan_perawat_malam);
            endforeach;
        endif;
    }

    // MCOP MALAM
    function deleteCatatanOperanMalam($id){
        return $this->db->where("id", $id)->delete("sm_catatan_operan_perawat_malam");
    }






    

    // DOKTER ICC                                    
    function getIDokter($id_pendaftaran) {
        return $this->db->select('gicch.*, dtr1.nama as dokter_1')
        ->from('sm_dokter_icc as gicch')
        ->join('sm_layanan_pendaftaran as lp', 'lp.id = gicch.id_layanan_pendaftaran')
        ->join('sm_tenaga_medis as tmd1', 'tmd1.id = gicch.dokterdpjpicc', 'left')
        ->join('sm_pegawai as dtr1', 'dtr1.id = tmd1.id_pegawai', 'left')
        ->where('lp.id_pendaftaran', $id_pendaftaran)
        ->get()
        ->result();
    }

    // DOKTER ICC 
    function hapus_dokter_bedah_by_id($id){
        return $this->db->where('id', $id)->delete('sm_dokter_icc');
    }

    // ICC ICC 
	function getItensiveCareChart($id_pendaftaran){
		return $this->db->select('icc.*, dtr2.nama as dokter_2, lp.tanggal_layanan as tanggal')
        ->from('sm_intensive_care_chart as icc')	  
        ->join('sm_layanan_pendaftaran as lp', 'lp.id = icc.id_layanan_pendaftaran')
        ->join('sm_tenaga_medis as tmd2 ', ' tmd2.id = icc.dokterdpjptambahicc', 'left')
        ->join('sm_pegawai as dtr2 ', ' dtr2.id = tmd2.id_pegawai', 'left')
        ->where('lp.id_pendaftaran', $id_pendaftaran, true)
        ->get()
        ->row();
	}

	// ICC LOGS 
	function getItensiveCareChartLogs($id_pendaftaran){ 
        return $this->db->select('icc.*, dtr2.nama as dokter_2')
        ->from('sm_intensive_care_chart as icc')	  
        ->join('sm_layanan_pendaftaran as lp', 'lp.id = icc.id_layanan_pendaftaran')
        ->join('sm_tenaga_medis as tmd2 ', ' tmd2.id = icc.dokterdpjptambahicc', 'left')
        ->join('sm_pegawai as dtr2 ', ' dtr2.id = tmd2.id_pegawai', 'left')
        ->where('lp.id_pendaftaran', $id_pendaftaran, true)
		->get()
		->result();
	}

    // ICC
	function updateItensiveCareChart($data_icc, $id_icc){
		$datetime = date('Y-m-d H:i:s');	
		if ($id_icc === '') {
			$data_icc['created_date'] = $datetime;
			$this->db->insert('sm_intensive_care_chart', $data_icc);				
			return ['status' => true, 'message' => 'Berhasil Menambahkan Data '];				
		} else {
			$data_before_icc = $this->db->select("*, '' as id_users, '' as tanggal_ubah_icc")->from('sm_intensive_care_chart')->where('id', $id_icc)->get()->row();	
			unset($data_before_icc->id);
			$data_before_icc->id_users = $this->session->userdata('id_translucent');
			$data_before_icc->tanggal_ubah_icc = $datetime;	
			$data_icc['updated_date'] = $datetime;	
			$this->db->set($data_icc)->where('id', $id_icc)->update('sm_intensive_care_chart');	
			$this->db->insert('sm_intensive_care_chart_logs', $data_before_icc);	
			return ['status' => true, 'message' => 'Berhasil Mengubah Data '];				
		}				
	}

    // CATATANPERAWAT
    function insertCatatanPerawatIcc($data){
        foreach ($data['date_created'] as $key => $value) {
            $data_cpicc = array(
                'id_pendaftaran'             => $data['id_pendaftaran'],
                'id_layanan_pendaftaran'     => $data['id_layanan_pendaftaran'],
                'id_user'                    => $data['id_user'][$key],
                'jampagiicc'                 => $data['jampagiicc'][$key] !== '' ? $data['jampagiicc'][$key] : null,
                'dinaspagiicc'               => $data['dinaspagiicc'][$key] !== '' ? $data['dinaspagiicc'][$key] : null,
                'parafpagiicc'               => $data['parafpagiicc'][$key] !== '' ? $data['parafpagiicc'][$key] : null,
                'perawatpagiicc'             => $data['perawatpagiicc'][$key] !== '' ? $data['perawatpagiicc'][$key] : null,
                'jamsoreicc'                 => $data['jamsoreicc'][$key] !== '' ? $data['jamsoreicc'][$key] : null,
                'dinassoreicc'               => $data['dinassoreicc'][$key] !== '' ? $data['dinassoreicc'][$key] : null,
                'parafsoreicc'               => $data['parafsoreicc'][$key] !== '' ? $data['parafsoreicc'][$key] : null,
                'perawatsoreicc'             => $data['perawatsoreicc'][$key] !== '' ? $data['perawatsoreicc'][$key] : null,
                'jammalamicc'                => $data['jammalamicc'][$key] !== '' ? $data['jammalamicc'][$key] : null,
                'dinasmalamicc'              => $data['dinasmalamicc'][$key] !== '' ? $data['dinasmalamicc'][$key] : null,
                'parafmalamicc'              => $data['parafmalamicc'][$key] !== '' ? $data['parafmalamicc'][$key] : null,
                'perawatmalamicc'            => $data['perawatmalamicc'][$key] !== '' ? $data['perawatmalamicc'][$key] : null,
                'created_at'                 => $value,
            );           
            $this->db->insert('sm_catatan_perawat_icc', $data_cpicc);
        }
    }

    // CATATANPERAWAT 
    function editcatatanperawatIcc($data){
        return $this->db->where('id', $data['id'], true)->update('sm_catatan_perawat_icc', $data);
    }

    // CATATANPERAWAT
    function deleteCatatanPerawatIc($id){
        return $this->db->where("id", $id)->delete("sm_catatan_perawat_icc");
    }

    // CATATANPERAWAT
    function getCatatanPerawatIcc($id_pendaftaran){
        return $this->db
            ->select("cpicc.*, COALESCE(spg1.nama, '') as nama_perawat_pagi,
                               COALESCE(spg2.nama, '') as nama_perawat_sore,
                               COALESCE(spg3.nama, '') as nama_perawat_malam,
                               COALESCE(pg.nama, '') as akun_user")
            ->from('sm_catatan_perawat_icc as cpicc')
            ->join('sm_layanan_pendaftaran as lp', 'cpicc.id_layanan_pendaftaran = lp.id')
            ->join('sm_pendaftaran as pd', 'lp.id_pendaftaran = pd.id')
            ->join('sm_tenaga_medis as tmp1', 'cpicc.perawatpagiicc = tmp1.id', 'left')
            ->join('sm_pegawai as spg1', 'spg1.id = tmp1.id_pegawai', 'left')
            ->join('sm_tenaga_medis as tmp2', 'cpicc.perawatsoreicc = tmp2.id', 'left')
            ->join('sm_pegawai as spg2', 'spg2.id = tmp2.id_pegawai', 'left')
            ->join('sm_tenaga_medis as tmp3', 'cpicc.perawatmalamicc = tmp3.id', 'left')
            ->join('sm_pegawai as spg3', 'spg3.id = tmp3.id_pegawai', 'left')
            ->join('sm_pegawai as pg', 'cpicc.id_user = pg.id', 'left')
            ->where('lp.id_pendaftaran', $id_pendaftaran)
            ->order_by('cpicc.id', 'asc')
            ->get()
            ->result();
        $this->db->close();
    }

    // CATATANPERAWAT
    function getCatatanPerawatIccByID($id){
        return $this->db
            ->select("cpicc.*, COALESCE(spg1.nama, '') as nama_perawat_pagi,
                            COALESCE(spg2.nama, '') as nama_perawat_sore,
                            COALESCE(spg3.nama, '') as nama_perawat_malam,
                            COALESCE(pg.nama, '') as akun_user")
            ->from('sm_catatan_perawat_icc as cpicc')
            ->join('sm_layanan_pendaftaran as lp', 'cpicc.id_layanan_pendaftaran = lp.id')
            ->join('sm_pendaftaran as pd', 'lp.id_pendaftaran = pd.id')
            ->join('sm_tenaga_medis as tmp1', 'cpicc.perawatpagiicc = tmp1.id', 'left')
            ->join('sm_pegawai as spg1', 'spg1.id = tmp1.id_pegawai', 'left')
            ->join('sm_tenaga_medis as tmp2', 'cpicc.perawatsoreicc = tmp2.id', 'left')
            ->join('sm_pegawai as spg2', 'spg2.id = tmp2.id_pegawai', 'left')
            ->join('sm_tenaga_medis as tmp3', 'cpicc.perawatmalamicc = tmp3.id', 'left')
            ->join('sm_pegawai as spg3', 'spg3.id = tmp3.id_pegawai', 'left')
            ->join('sm_pegawai as pg', 'cpicc.id_user = pg.id', 'left')
            ->where('cpicc.id', $id)
            ->order_by('cpicc.id', 'asc')
            ->get()
            ->row();
        $this->db->close();
    }

    // CATATANPERAWAT LOGS INI UDAH BISA JADI ID YANG NGEDIT KUTAUAN
    function insertLogcatatanperawatIcc($data) { 
        return $this->db->insert('sm_catatan_perawat_icc_logs', $data);
    }

    



   



    // CPDPO
    function insertRiwayatPemakaianObat($data){
        foreach ($data['date_created'] as $key => $value) {
    
            // Kalau kosong, kasih null aja
            $tanggal_pengkajian_rpo = !empty($data['tanggal_rpo'][$key]) 
                ? date("Y-m-d", strtotime(str_replace('/', '-', $data['tanggal_rpo'][$key]))) 
                : null;
    
            $tangggal_pengkajian_rpo = !empty($data['tangggal_rpo'][$key]) 
                ? date("Y-m-d", strtotime(str_replace('/', '-', $data['tangggal_rpo'][$key]))) 
                : null;
    
            $data_rpo = array(
                'id_pendaftaran'            => $data['id_pendaftaran'],
                'id_layanan_pendaftaran'    => $data['id_layanan_pendaftaran'],
                'id_user'                   => $data['id_user'][$key],
                'tanggal_rpo'               => $tanggal_pengkajian_rpo,
                'tangggal_rpo'              => $tangggal_pengkajian_rpo,
                'nama_obat_rpo'             => $data['nama_obat_rpo'][$key] !== '' ? $data['nama_obat_rpo'][$key] : null,
                'dokter_1_rpo'              => $data['dokter_1_rpo'][$key] !== '' ? $data['dokter_1_rpo'][$key] : null,
                'dokter_2_rpo'              => $data['dokter_2_rpo'][$key] !== '' ? $data['dokter_2_rpo'][$key] : null,
                'rute_rpo'                  => $data['rute_rpo'][$key] !== '' ? $data['rute_rpo'][$key] : null,
                'dosis_rpo'                 => $data['dosis_rpo'][$key] !== '' ? $data['dosis_rpo'][$key] : null,
                'frekuensi_rpo'             => $data['frekuensi_rpo'][$key] !== '' ? $data['frekuensi_rpo'][$key] : null,
                'eso_rpo'                   => $data['eso_rpo'][$key] !== '' ? $data['eso_rpo'][$key] : null,
                'r_farmasi_rpo'             => $data['r_farmasi_rpo'][$key] !== '' ? $data['r_farmasi_rpo'][$key] : null,
                'alergii_ob'                => $data['alergii_ob'][$key] !== '' ? $data['alergii_ob'][$key] : null,
                'alergii'                   => $data['alergii'][$key] !== '' ? $data['alergii'][$key] : null,
                'created_at'                => $value,
            );
    
            $this->db->insert('sm_catatan_pemberian_dan_pemantauan_obat_rpo', $data_rpo);
        }
    }
    
    // CPDPO
    function editRiwayatPemakaianObat($data){
        return $this->db->where('id', $data['id'], true)->update('sm_catatan_pemberian_dan_pemantauan_obat_rpo', $data);
    }

    // CPDPO
    function deleteRiwayatPemakaianObat($id){
        return $this->db->where("id", $id)->delete("sm_catatan_pemberian_dan_pemantauan_obat_rpo");
    }

    // CPDPO
    function getRiwayatPemakaianObat($id_layanan_pendaftaran){
        return $this->db->select("scpdpor.*,
                                    COALESCE(wid.nama, '') as akun_user,                                        
                                    COALESCE(spd1.nama, '') as nama_dokter_1,
                                    COALESCE(spd2.nama, '') as nama_dokter_2,                                           
                                    COALESCE(sb1.nama_lengkap, '') as nama_obat_1,")
        ->from('sm_catatan_pemberian_dan_pemantauan_obat_rpo as scpdpor')
        ->join('sm_layanan_pendaftaran as lp', 'scpdpor.id_layanan_pendaftaran = lp.id')
        ->join('sm_translucent sid', 'scpdpor.id_user = sid.id', 'left')
        ->join('sm_pegawai wid', 'scpdpor.id_user = wid.id', 'left')
        ->join('sm_tenaga_medis tmd1', 'tmd1.id = scpdpor.dokter_1_rpo', 'left')
        ->join('sm_tenaga_medis tmd2', 'tmd2.id = scpdpor.dokter_2_rpo', 'left')
        ->join('sm_pegawai spd1', 'spd1.id= tmd1.id_pegawai ', 'left')
        ->join('sm_pegawai spd2', 'spd2.id= tmd2.id_pegawai ', 'left')
        ->join('sm_barang sb1', 'sb1.id = scpdpor.nama_obat_rpo', 'left')
        ->where('lp.id_pendaftaran', $id_layanan_pendaftaran, true)
        ->order_by('scpdpor.tanggal_rpo')
        ->get()
        ->result();
    }

    // CPDPO
    function getRiwayatPemakaianObatByID($id){
        return $this->db->select("scpdpor.*,
                                        COALESCE(wid.nama, '') as akun_user,                                        
                                        COALESCE(spd1.nama, '') as nama_dokter_1,
                                        COALESCE(spd2.nama, '') as nama_dokter_2,                                           
                                        COALESCE(sb1.nama_lengkap, '') as nama_obat_1,")
        ->from('sm_catatan_pemberian_dan_pemantauan_obat_rpo as scpdpor')
        ->join('sm_translucent sid', 'scpdpor.id_user = sid.id', 'left')
        ->join('sm_pegawai wid', 'scpdpor.id_user = wid.id', 'left')
        ->join('sm_tenaga_medis tmd1', 'tmd1.id = scpdpor.dokter_1_rpo', 'left')
        ->join('sm_tenaga_medis tmd2', 'tmd2.id = scpdpor.dokter_2_rpo', 'left')
        ->join('sm_pegawai spd1', 'spd1.id= tmd1.id_pegawai ', 'left')
        ->join('sm_pegawai spd2', 'spd2.id= tmd2.id_pegawai ', 'left')
        ->join('sm_barang sb1', 'sb1.id = scpdpor.nama_obat_rpo', 'left')
        ->where('scpdpor.id', $id)
        ->order_by('scpdpor.tanggal_rpo')
        ->get()
        ->row();
    }
    

    // ILLIS
    function insertRiwayatPemakaianObatInfus($data){
        foreach ($data['date_created'] as $key => $value) {

            // Kalau kosong, kasih null aja
            $tanggal_pengkajian_rpoo = !empty($data['tanggal_rpoo'][$key]) 
            ? date("Y-m-d", strtotime(str_replace('/', '-', $data['tanggal_rpoo'][$key]))) 
            : null;

            $tanggal_pengkajian_rpoto = !empty($data['tangggal_rpoo'][$key]) 
            ? date("Y-m-d", strtotime(str_replace('/', '-', $data['tangggal_rpoo'][$key]))) 
            : null;

            $data_rpo_infus = array(
                'id_pendaftaran'            => $data['id_pendaftaran'],
                'id_layanan_pendaftaran'    => $data['id_layanan_pendaftaran'],
                'id_user'                   => $data['id_user'][$key],
                'tanggal_rpoo'              => $tanggal_pengkajian_rpoo,
                'tangggal_rpoo'             => $tanggal_pengkajian_rpoto,
                'nama_obat_rpoo'            => $data['nama_obat_rpoo'][$key] !== '' ? $data['nama_obat_rpoo'][$key] : null,
                'dokter_1_rpoo'             => $data['dokter_1_rpoo'][$key] !== '' ? $data['dokter_1_rpoo'][$key] : null,
                'dokter_2_rpoo'             => $data['dokter_2_rpoo'][$key] !== '' ? $data['dokter_2_rpoo'][$key] : null,
                'rute_rpoo'                 => $data['rute_rpoo'][$key] !== '' ? $data['rute_rpoo'][$key] : null,
                'dosis_rpoo'                => $data['dosis_rpoo'][$key] !== '' ? $data['dosis_rpoo'][$key] : null,
                'frekuensi_rpoo'            => $data['frekuensi_rpoo'][$key] !== '' ? $data['frekuensi_rpoo'][$key] : null,
                'eso_rpoo'                  => $data['eso_rpoo'][$key] !== '' ? $data['eso_rpoo'][$key] : null,
                'r_farmasi_rpoo'            => $data['r_farmasi_rpoo'][$key] !== '' ? $data['r_farmasi_rpoo'][$key] : null,
                'alergiii'                  => $data['alergiii'][$key] !== '' ? $data['alergiii'][$key] : null,
                'alergii_obb'               => $data['alergii_obb'][$key] !== '' ? $data['alergii_obb'][$key] : null,
                'created_at'                => $value,
            );
            $this->db->insert('sm_catatan_pemberian_dan_pemantauan_obat_rpo_infus', $data_rpo_infus);
        }
    }

    // ILLIS
    function editRiwayatPemakaianObatInfus($data){
        return $this->db->where('id', $data['id'], true)->update('sm_catatan_pemberian_dan_pemantauan_obat_rpo_infus', $data);
    }

    // ILLIS
    function deleteRiwayatPemakaianObatInfus($id){
        return $this->db->where("id", $id)->delete("sm_catatan_pemberian_dan_pemantauan_obat_rpo_infus");
    }

    // ILLIS
    function getRiwayatPemakaianObatInfus($id_layanan_pendaftaran){
        return $this->db->select("scpdpori.*,
                                    COALESCE(wid.nama, '') as akun_user,                                                                                   
                                    COALESCE(spd3.nama, '') as nama_dokter_3,
                                    COALESCE(spd4.nama, '') as nama_dokter_4,
                                    COALESCE(sb2.nama_lengkap, '') as nama_obat_2,")
        ->from('sm_catatan_pemberian_dan_pemantauan_obat_rpo_infus as scpdpori')
        ->join('sm_layanan_pendaftaran as lp', 'scpdpori.id_layanan_pendaftaran = lp.id')
        ->join('sm_translucent sid', 'scpdpori.id_user = sid.id', 'left')
        ->join('sm_pegawai wid', 'scpdpori.id_user = wid.id', 'left')
        ->join('sm_tenaga_medis tmd3', 'tmd3.id = scpdpori.dokter_1_rpoo', 'left')
        ->join('sm_tenaga_medis tmd4', 'tmd4.id = scpdpori.dokter_2_rpoo', 'left')
        ->join('sm_pegawai spd3', 'spd3.id= tmd3.id_pegawai ', 'left')
        ->join('sm_pegawai spd4', 'spd4.id= tmd4.id_pegawai ', 'left')
        ->join('sm_barang sb2', 'sb2.id = scpdpori.nama_obat_rpoo', 'left')
        ->where('lp.id_pendaftaran', $id_layanan_pendaftaran, true)
        ->order_by('scpdpori.tanggal_rpoo')
        ->get()
        ->result();
    }

    // ILLIS
    function getRiwayatPemakaianObatInfusByID($id){
        return $this->db->select("scpdpori.*,
                                    COALESCE(wid.nama, '') as akun_user,                                                                                   
                                    COALESCE(spd3.nama, '') as nama_dokter_3,
                                    COALESCE(spd4.nama, '') as nama_dokter_4,,
                                    COALESCE(sb2.nama_lengkap, '') as nama_obat_2,")
        ->from('sm_catatan_pemberian_dan_pemantauan_obat_rpo_infus as scpdpori')
        ->join('sm_translucent sid', 'scpdpori.id_user = sid.id', 'left')
        ->join('sm_pegawai wid', 'scpdpori.id_user = wid.id', 'left')
        ->join('sm_tenaga_medis tmd3', 'tmd3.id = scpdpori.dokter_1_rpoo', 'left')
        ->join('sm_tenaga_medis tmd4', 'tmd4.id = scpdpori.dokter_2_rpoo', 'left')
        ->join('sm_pegawai spd3', 'spd3.id= tmd3.id_pegawai ', 'left')
        ->join('sm_pegawai spd4', 'spd4.id= tmd4.id_pegawai ', 'left')
        ->join('sm_barang sb2', 'sb2.id = scpdpori.nama_obat_rpoo', 'left')
        ->where('scpdpori.id', $id)
        ->order_by('scpdpori.tanggal_rpoo')
        ->get()
        ->row();
    }



    // WPT
    function deleteWaktuPemberianTanggal($id){
        return $this->db->where("id", $id)->delete("sm_catatan_pemberian_dan_pemantauan_obat_wpt");
    }

    // WPT
    function insertWaktuPemberianTanggal($data){
        foreach ($data['date_created'] as $key => $value) {
            $tanggal_pengkajian_wpt = !empty($data['tanggal_wpt'][$key]) 
            ? date("Y-m-d", strtotime(str_replace('/', '-', $data['tanggal_wpt'][$key]))) 
            : null;
            $data_wpt = array(
                'id_pendaftaran'             => $data['id_pendaftaran'],
                'id_layanan_pendaftaran'     => $data['id_layanan_pendaftaran'],
                'id_user'                    => $data['id_user'][$key],
                'tanggal_wpt'                => $tanggal_pengkajian_wpt,
                'perawat_1_wpt'              => $data['perawat_1_wpt'][$key] !== '' ? $data['perawat_1_wpt'][$key] : null,
                'hari_wpt'                   => $data['hari_wpt'][$key] !== '' ? $data['hari_wpt'][$key] : null,
                'jam_wpt'                    => $data['jam_wpt'][$key] !== '' ? $data['jam_wpt'][$key] : null,
                'pasien_keluarga_wpt'        => $data['pasien_keluarga_wpt'][$key] !== '' ? $data['pasien_keluarga_wpt'][$key] : null,
                'pagi_wpt'                   => $data['pagi_wpt'][$key] !== '' ? $data['pagi_wpt'][$key] : null,
                'siang_wpt'                  => $data['siang_wpt'][$key] !== '' ? $data['siang_wpt'][$key] : null,
                'sore_wpt'                   => $data['sore_wpt'][$key] !== '' ? $data['sore_wpt'][$key] : null,
                'malam_wpt'                  => $data['malam_wpt'][$key] !== '' ? $data['malam_wpt'][$key] : null,
                'created_at'                 => $value,
            );
            $this->db->insert('sm_catatan_pemberian_dan_pemantauan_obat_wpt', $data_wpt);
        }
    }

    // WPT
    function editWaktuPemberianTanggal($data){
        return $this->db->where('id', $data['id'], true)->update('sm_catatan_pemberian_dan_pemantauan_obat_wpt', $data);
    }

    // WPT
    function getWaktuPemberianTanggal($id_layanan_pendaftaran){
        return $this->db->select("scpdpow.*,
                                COALESCE(wid.nama, '') as akun_user,                                        
                                COALESCE(spp1.nama, '') as nama_perawat_1,")
        ->from('sm_catatan_pemberian_dan_pemantauan_obat_wpt as scpdpow')
        ->join('sm_layanan_pendaftaran as lp', 'scpdpow.id_layanan_pendaftaran = lp.id')
        ->join('sm_translucent sid', 'scpdpow.id_user = sid.id', 'left')
        ->join('sm_pegawai wid', 'scpdpow.id_user = wid.id', 'left')
        ->join('sm_tenaga_medis tmp1', 'scpdpow.perawat_1_wpt = tmp1.id', 'left')
        ->join('sm_pegawai spp1', 'spp1.id = tmp1.id_pegawai', 'left')
        ->where('lp.id_pendaftaran', $id_layanan_pendaftaran, true)
        ->order_by('scpdpow.tanggal_wpt')
        ->get()
        ->result();
    }

    // WPT
    function getWaktuPemberianTanggalByID($id){
        return $this->db->select("scpdpow.*,
                                    COALESCE(wid.nama, '') as akun_user,                                        
                                    COALESCE(spp1.nama, '') as nama_perawat_1,")
        ->from('sm_catatan_pemberian_dan_pemantauan_obat_wpt as scpdpow')
        ->join('sm_translucent sid', 'scpdpow.id_user = sid.id', 'left')
        ->join('sm_pegawai wid', 'scpdpow.id_user = wid.id', 'left')
        ->join('sm_tenaga_medis tmp1', 'scpdpow.perawat_1_wpt = tmp1.id', 'left')
        ->join('sm_pegawai spp1', 'spp1.id = tmp1.id_pegawai', 'left')
        ->where('scpdpow.id', $id)
        ->order_by('scpdpow.tanggal_wpt')
        ->get()
        ->row();
    }


    // IWPT
    function insertWaktuPemberianTanggalInfus($data){
        foreach ($data['date_created'] as $key => $value) {
            $tanggal_pengkajian_wptt = !empty($data['tanggal_wptt'][$key]) 
            ? date("Y-m-d", strtotime(str_replace('/', '-', $data['tanggal_wptt'][$key]))) 
            : null;
            $data_wpt_infus = array(
                'id_pendaftaran'             => $data['id_pendaftaran'],
                'id_layanan_pendaftaran'     => $data['id_layanan_pendaftaran'],
                'id_user'                    => $data['id_user'][$key],
                'tanggal_wptt'               => $tanggal_pengkajian_wptt,
                'perawat_2_wptt'             => $data['perawat_2_wptt'][$key] !== '' ? $data['perawat_2_wptt'][$key] : null,
                'hari_wptt'                  => $data['hari_wptt'][$key] !== '' ? $data['hari_wptt'][$key] : null,
                'jam_wptt'                   => $data['jam_wptt'][$key] !== '' ? $data['jam_wptt'][$key] : null,
                'pasien_keluarga_wptt'       => $data['pasien_keluarga_wptt'][$key] !== '' ? $data['pasien_keluarga_wptt'][$key] : null,
                'pagi_wptt'                  => $data['pagi_wptt'][$key] !== '' ? $data['pagi_wptt'][$key] : null,
                'siang_wptt'                 => $data['siang_wptt'][$key] !== '' ? $data['siang_wptt'][$key] : null,
                'sore_wptt'                  => $data['sore_wptt'][$key] !== '' ? $data['sore_wptt'][$key] : null,
                'malam_wptt'                 => $data['malam_wptt'][$key] !== '' ? $data['malam_wptt'][$key] : null,
                'created_at'                 => $value,
            );
            $this->db->insert('sm_catatan_pemberian_dan_pemantauan_obat_wpt_infus', $data_wpt_infus);
        }
    }

    // IWPT
    function editWaktuPemberianTanggalInfus($data){
        return $this->db->where('id', $data['id'], true)->update('sm_catatan_pemberian_dan_pemantauan_obat_wpt_infus', $data);
    }

    // IWPT
    function deleteWaktuPemberianTanggalInfus($id){
        return $this->db->where("id", $id)->delete("sm_catatan_pemberian_dan_pemantauan_obat_wpt_infus");
    }

    // IWPT
    function getWaktuPemberianTanggalInfus($id_layanan_pendaftaran){
        return $this->db->select("scpdpowi.*,
                                COALESCE(wid.nama, '') as akun_user,
                                COALESCE(spp2.nama, '') as nama_perawat_2,")
        ->from('sm_catatan_pemberian_dan_pemantauan_obat_wpt_infus as scpdpowi')
        ->join('sm_layanan_pendaftaran as lp', 'scpdpowi.id_layanan_pendaftaran = lp.id')
        ->join('sm_translucent sid', 'scpdpowi.id_user = sid.id', 'left')
        ->join('sm_pegawai wid', 'scpdpowi.id_user = wid.id', 'left')
        ->join('sm_tenaga_medis tmp2', 'scpdpowi.perawat_2_wptt = tmp2.id', 'left')
        ->join('sm_pegawai spp2', 'spp2.id = tmp2.id_pegawai', 'left')
        ->where('lp.id_pendaftaran', $id_layanan_pendaftaran, true)
        ->order_by('scpdpowi.tanggal_wptt')
        ->get()
        ->result();
    }

    // IWPT
    function getWaktuPemberianTanggalInfusByID($id){
        return $this->db->select("scpdpowi.*,
                            COALESCE(wid.nama, '') as akun_user,                                        
                            COALESCE(spp2.nama, '') as nama_perawat_2,")
        ->from('sm_catatan_pemberian_dan_pemantauan_obat_wpt_infus as scpdpowi')
        ->join('sm_translucent sid', 'scpdpowi.id_user = sid.id', 'left')
        ->join('sm_pegawai wid', 'scpdpowi.id_user = wid.id', 'left')
        ->join('sm_tenaga_medis tmp2', 'scpdpowi.perawat_2_wptt = tmp2.id', 'left')
        ->join('sm_pegawai spp2', 'spp2.id = tmp2.id_pegawai', 'left')
        ->where('scpdpowi.id', $id)
        ->order_by('scpdpowi.tanggal_wptt')
        ->get()
        ->row();
    }


    
    // // PKN 1  Ada 5
    // function insertPengawasanKhususNeonatus($data)
    // {
    //     foreach ($data['date_created'] as $key => $value) {
    //         $tanggal_pengkajian_pkn = str_replace('/', '-', $data['tgl_pkn'][$key]);
    //         $tanggal_pengkajian_pkn = date("Y-m-d", strtotime($tanggal_pengkajian_pkn));
    //         $data_pkn = array(
    //             'id_pendaftaran'           => $data['id_pendaftaran'],
    //             'id_layanan_pendaftaran'   => $data['id_layanan_pendaftaran'],
    //             'id_user'                  => $data['id_user'][$key],
    //             'tgl_pkn'                  => $tanggal_pengkajian_pkn,
    //             'jam_pkn'                  => $data['jam_pkn'][$key] !== '' ? $data['jam_pkn'][$key] : null,
    //             'bb_pkn'                   => $data['bb_pkn'][$key] !== '' ? $data['bb_pkn'][$key] : null,
    //             'lp_pkn'                   => $data['lp_pkn'][$key] !== '' ? $data['lp_pkn'][$key] : null,
    //             'kesadaran_pkn'            => $data['kesadaran_pkn'][$key] !== '' ? $data['kesadaran_pkn'][$key] : null,
    //             'pasien_pkn'               => $data['pasien_pkn'][$key] !== '' ? $data['pasien_pkn'][$key] : null,
    //             'inkubator_pkn'            => $data['inkubator_pkn'][$key] !== '' ? $data['inkubator_pkn'][$key] : null,
    //             'nadi_pkn'                 => $data['nadi_pkn'][$key] !== '' ? $data['nadi_pkn'][$key] : null,
    //             'rr_pkn'                   => $data['rr_pkn'][$key] !== '' ? $data['rr_pkn'][$key] : null,
    //             'modus_pkn'                => $data['modus_pkn'][$key] !== '' ? $data['modus_pkn'][$key] : null,
    //             'peep_pkn'                 => $data['peep_pkn'][$key] !== '' ? $data['peep_pkn'][$key] : null,
    //             'buble_pkn'                => $data['buble_pkn'][$key] !== '' ? $data['buble_pkn'][$key] : null,
    //             'fio2_pkn'                 => $data['fio2_pkn'][$key] !== '' ? $data['fio2_pkn'][$key] : null,
    //             'spo2_pkn'                 => $data['spo2_pkn'][$key] !== '' ? $data['spo2_pkn'][$key] : null,
    //             'flow_pkn'                 => $data['flow_pkn'][$key] !== '' ? $data['flow_pkn'][$key] : null,
    //             'air_pkn'                  => $data['air_pkn'][$key] !== '' ? $data['air_pkn'][$key] : null,
    //             'suhu_pkn'                 => $data['suhu_pkn'][$key] !== '' ? $data['suhu_pkn'][$key] : null,
    //             'line1_pkn'                => $data['line1_pkn'][$key] !== '' ? $data['line1_pkn'][$key] : null,
    //             'line2_pkn'                => $data['line2_pkn'][$key] !== '' ? $data['line2_pkn'][$key] : null,
    //             'plebitis_pkn'             => $data['plebitis_pkn'][$key] !== '' ? $data['plebitis_pkn'][$key] : null,
    //             'oral_pkn'                 => $data['oral_pkn'][$key] !== '' ? $data['oral_pkn'][$key] : null,
    //             'jml_pkn'                  => $data['jml_pkn'][$key] !== '' ? $data['jml_pkn'][$key] : null,
    //             'muntah_pkn'               => $data['muntah_pkn'][$key] !== '' ? $data['muntah_pkn'][$key] : null,
    //             'residu_pkn'               => $data['residu_pkn'][$key] !== '' ? $data['residu_pkn'][$key] : null,
    //             'bak_pkn'                  => $data['bak_pkn'][$key] !== '' ? $data['bak_pkn'][$key] : null,
    //             'bab_pkn'                  => $data['bab_pkn'][$key] !== '' ? $data['bab_pkn'][$key] : null,
    //             'foto_therapy_pkn'         => $data['foto_therapy_pkn'][$key] !== '' ? $data['foto_therapy_pkn'][$key] : null,
    //             'obat_pkn'                 => $data['obat_pkn'][$key] !== '' ? $data['obat_pkn'][$key] : null,
    //             'perawat_pkn'              => $data['perawat_pkn'][$key] !== '' ? $data['perawat_pkn'][$key] : null,
    //             'created_at'               => $value,
    //         );
    //         //  var_dump($data_wpt);die;              
    //         $this->db->insert('sm_pengawasan_khusus_neonatus', $data_pkn);
    //     }
    // }

    // // PKN 2
    // function editPengawasanKhususNeonatus($data)
    // {
    //     return $this->db->where('id', $data['id'], true)->update('sm_pengawasan_khusus_neonatus', $data);
    // }

    // // PKN 3 
    // // function getPengawasanKhususNeonatus($id_pendaftaran)
    // function getPengawasanKhususNeonatus($id_layanan_pendaftaran)
    // {
    //     return $this->db->select("pkn.*,
    //                                      COALESCE(wid.nama, '') as akun_user,
    //                                      COALESCE(sb1.nama_lengkap, '') as nama_obat,
    //                                      COALESCE(spp1.nama, '') as nama_perawat,")
    //         ->from('sm_pengawasan_khusus_neonatus as pkn')
    //         ->join('sm_layanan_pendaftaran as lp', 'pkn.id_layanan_pendaftaran = lp.id')
    //         // user
    //         ->join('sm_translucent sid', 'pkn.id_user = sid.id', 'left')
    //         ->join('sm_pegawai wid', 'pkn.id_user = wid.id', 'left')
    //         // obat
    //         ->join('sm_barang sb1', 'sb1.id = pkn.obat_pkn', 'left')
    //         // perawat
    //         ->join('sm_tenaga_medis tmp1', 'pkn.perawat_pkn = tmp1.id', 'left')
    //         ->join('sm_pegawai spp1', 'spp1.id = tmp1.id_pegawai', 'left')
    //         ->where('lp.id_pendaftaran', $id_layanan_pendaftaran, true)
    //         // ->where('pkn.id_pendaftaran', $id_pendaftaran)
    //         ->order_by('pkn.tgl_pkn')
    //         ->get()
    //         ->result();
    // }
    
    // // PKN 4
    // function deletePengawasanKhususNeonatus($id)
    // {
    //     return $this->db->where("id", $id)->delete("sm_pengawasan_khusus_neonatus");
    // }
    // // PKN 5
    // function getPengawasanKhususNeonatusByID($id)
    // {
    //     return $this->db->select("pkn.*,  
    //                                     COALESCE(wid.nama, '') as akun_user,
    //                                     COALESCE(sb1.nama_lengkap, '') as nama_obat,
    //                                     COALESCE(spp1.nama, '') as nama_perawat,")
    //         ->from('sm_pengawasan_khusus_neonatus as pkn')
    //         // user
    //         ->join('sm_translucent sid', 'pkn.id_user = sid.id', 'left')
    //         ->join('sm_pegawai wid', 'pkn.id_user = wid.id', 'left')
    //         // obat
    //         ->join('sm_barang sb1', 'sb1.id = pkn.obat_pkn', 'left')
    //         // perawat
    //         ->join('sm_tenaga_medis tmp1', 'pkn.perawat_pkn = tmp1.id', 'left')
    //         ->join('sm_pegawai spp1', 'spp1.id = tmp1.id_pegawai', 'left')
    //         ->where('pkn.id', $id)
    //         ->order_by('pkn.tgl_pkn')
    //         ->get()
    //         ->row();
    // }


    // PKN
    function insertPengawasanKhususNeonatus($data){
        foreach ($data['date_created'] as $key => $value) {
            $tanggal_pengkajian_pkn = str_replace('/', '-', $data['tgl_pkn'][$key]);
            $tanggal_pengkajian_pkn = date("Y-m-d", strtotime($tanggal_pengkajian_pkn));
            $data_pkn = array(
                'id_pendaftaran'           => $data['id_pendaftaran'],
                'id_layanan_pendaftaran'   => $data['id_layanan_pendaftaran'],
                'id_user'                  => $data['id_user'][$key],
                'tgl_pkn'                  => $tanggal_pengkajian_pkn,
                'jam_pkn'                  => $data['jam_pkn'][$key] !== '' ? $data['jam_pkn'][$key] : null,
                'bb_pkn'                   => $data['bb_pkn'][$key] !== '' ? $data['bb_pkn'][$key] : null,
                'lp_pkn'                   => $data['lp_pkn'][$key] !== '' ? $data['lp_pkn'][$key] : null,
                'kesadaran_pkn'            => $data['kesadaran_pkn'][$key] !== '' ? $data['kesadaran_pkn'][$key] : null,
                'pasien_pkn'               => $data['pasien_pkn'][$key] !== '' ? $data['pasien_pkn'][$key] : null,
                'inkubator_pkn'            => $data['inkubator_pkn'][$key] !== '' ? $data['inkubator_pkn'][$key] : null,
                'nadi_pkn'                 => $data['nadi_pkn'][$key] !== '' ? $data['nadi_pkn'][$key] : null,
                'rr_pkn'                   => $data['rr_pkn'][$key] !== '' ? $data['rr_pkn'][$key] : null,
                'modus_pkn'                => $data['modus_pkn'][$key] !== '' ? $data['modus_pkn'][$key] : null,
                'peep_pkn'                 => $data['peep_pkn'][$key] !== '' ? $data['peep_pkn'][$key] : null,
                'buble_pkn'                => $data['buble_pkn'][$key] !== '' ? $data['buble_pkn'][$key] : null,
                'fio2_pkn'                 => $data['fio2_pkn'][$key] !== '' ? $data['fio2_pkn'][$key] : null,
                'spo2_pkn'                 => $data['spo2_pkn'][$key] !== '' ? $data['spo2_pkn'][$key] : null,
                'flow_pkn'                 => $data['flow_pkn'][$key] !== '' ? $data['flow_pkn'][$key] : null,
                'air_pkn'                  => $data['air_pkn'][$key] !== '' ? $data['air_pkn'][$key] : null,
                'suhu_pkn'                 => $data['suhu_pkn'][$key] !== '' ? $data['suhu_pkn'][$key] : null,
                'line1_pkn'                => $data['line1_pkn'][$key] !== '' ? $data['line1_pkn'][$key] : null,
                'line2_pkn'                => $data['line2_pkn'][$key] !== '' ? $data['line2_pkn'][$key] : null,
                'plebitis_pkn'             => $data['plebitis_pkn'][$key] !== '' ? $data['plebitis_pkn'][$key] : null,
                'oral_pkn'                 => $data['oral_pkn'][$key] !== '' ? $data['oral_pkn'][$key] : null,
                'jml_pkn'                  => $data['jml_pkn'][$key] !== '' ? $data['jml_pkn'][$key] : null,
                'muntah_pkn'               => $data['muntah_pkn'][$key] !== '' ? $data['muntah_pkn'][$key] : null,
                'residu_pkn'               => $data['residu_pkn'][$key] !== '' ? $data['residu_pkn'][$key] : null,
                'bak_pkn'                  => $data['bak_pkn'][$key] !== '' ? $data['bak_pkn'][$key] : null,
                'bab_pkn'                  => $data['bab_pkn'][$key] !== '' ? $data['bab_pkn'][$key] : null,
                'foto_therapy_pkn'         => $data['foto_therapy_pkn'][$key] !== '' ? $data['foto_therapy_pkn'][$key] : null,
                'obat_pkn'                 => $data['obat_pkn'][$key] !== '' ? $data['obat_pkn'][$key] : null,
                'perawat_pkn'              => $data['perawat_pkn'][$key] !== '' ? $data['perawat_pkn'][$key] : null,
                'created_at'               => $value,
            );
            $this->db->insert('sm_pengawasan_khusus_neonatus', $data_pkn);
        }
    }

    // PKN
    function editPengawasanKhususNeonatus($data){
        return $this->db->where('id', $data['id'], true)->update('sm_pengawasan_khusus_neonatus', $data);
    }
                 
    // PKN
    function deletePengawasanKhususNeonatus($id){
        return $this->db->where("id", $id)->delete("sm_pengawasan_khusus_neonatus");
    }
        
    // PKN
    function getPengawasanKhususNeonatus($id_layanan_pendaftaran){
        return $this->db->select("pkn.*,
                                COALESCE(wid.nama, '') as akun_user,
                                COALESCE(sb1.nama_lengkap, '') as nama_obat,
                                COALESCE(spp1.nama, '') as nama_perawat,")
        ->from('sm_pengawasan_khusus_neonatus as pkn')
        ->join('sm_layanan_pendaftaran as lp', 'pkn.id_layanan_pendaftaran = lp.id')
        ->join('sm_translucent sid', 'pkn.id_user = sid.id', 'left')
        ->join('sm_pegawai wid', 'pkn.id_user = wid.id', 'left')
        ->join('sm_barang sb1', 'sb1.id = pkn.obat_pkn', 'left')
        ->join('sm_tenaga_medis tmp1', 'pkn.perawat_pkn = tmp1.id', 'left')
        ->join('sm_pegawai spp1', 'spp1.id = tmp1.id_pegawai', 'left')
        ->where('lp.id_pendaftaran', $id_layanan_pendaftaran, true)
        ->order_by('pkn.tgl_pkn')
        ->get()
        ->result();
    }
   
    // PKN
    function getPengawasanKhususNeonatusByID($id){
        return $this->db->select("pkn.*,  
                                COALESCE(wid.nama, '') as akun_user,
                                COALESCE(sb1.nama_lengkap, '') as nama_obat,
                                COALESCE(spp1.nama, '') as nama_perawat,")
        ->from('sm_pengawasan_khusus_neonatus as pkn')
        ->join('sm_translucent sid', 'pkn.id_user = sid.id', 'left')
        ->join('sm_pegawai wid', 'pkn.id_user = wid.id', 'left')
        ->join('sm_barang sb1', 'sb1.id = pkn.obat_pkn', 'left')
        ->join('sm_tenaga_medis tmp1', 'pkn.perawat_pkn = tmp1.id', 'left')
        ->join('sm_pegawai spp1', 'spp1.id = tmp1.id_pegawai', 'left')
        ->where('pkn.id', $id)
        ->order_by('pkn.tgl_pkn')
        ->get()
        ->row();
    }






    // UPRJPN
    function insertUpayaPencegahanResikoJatuhPadaNeonatus($data){
        foreach ($data['date_created'] as $key => $value) {
            $tanggal_pengkajian_neonatus = str_replace('/', '-', $data['tanggal_pengkajian'][$key]);
            $tanggal_pengkajian_neonatus = date("Y-m-d", strtotime($tanggal_pengkajian_neonatus));
            $data_terapi = array(
                'id_pendaftaran'             => $data['id_pendaftaran'],
                'id_layanan_pendaftaran'     => $data['id_layanan_pendaftaran'],
                'id_perawat_1'                 => $data['id_perawat_1'][$key] !== '' ? $data['id_perawat_1'][$key] : null,
                'id_perawat_2'                 => $data['id_perawat_2'][$key] !== '' ? $data['id_perawat_2'][$key] : null,
                'id_perawat_3'                 => $data['id_perawat_3'][$key] !== '' ? $data['id_perawat_3'][$key] : null,
                'id_user'                    => $data['id_user'][$key],
                'tanggal_pengkajian'         => $tanggal_pengkajian_neonatus,

                'terpasang_p_ho' => $data['terpasang_p_ho'][$key] !== '' ? $data['terpasang_p_ho'][$key] : null,
                'terpasang_p_10' => $data['terpasang_p_10'][$key] !== '' ? $data['terpasang_p_10'][$key] : null,
                'terpasang_s_ho' => $data['terpasang_s_ho'][$key] !== '' ? $data['terpasang_s_ho'][$key] : null,
                'terpasang_s_18' => $data['terpasang_s_18'][$key] !== '' ? $data['terpasang_s_18'][$key] : null,
                'terpasang_m_ho' => $data['terpasang_m_ho'][$key] !== '' ? $data['terpasang_m_ho'][$key] : null,
                'terpasang_m_23' => $data['terpasang_m_23'][$key] !== '' ? $data['terpasang_m_23'][$key] : null,
                'terpasang_m_4' => $data['terpasang_m_4'][$key] !== '' ? $data['terpasang_m_4'][$key] : null,

                'terkunci_p_ho' => $data['terkunci_p_ho'][$key] !== '' ? $data['terkunci_p_ho'][$key] : null,
                'terkunci_p_10' => $data['terkunci_p_10'][$key] !== '' ? $data['terkunci_p_10'][$key] : null,
                'terkunci_s_ho' => $data['terkunci_s_ho'][$key] !== '' ? $data['terkunci_s_ho'][$key] : null,
                'terkunci_s_18' => $data['terkunci_s_18'][$key] !== '' ? $data['terkunci_s_18'][$key] : null,
                'terkunci_m_ho' => $data['terkunci_m_ho'][$key] !== '' ? $data['terkunci_m_ho'][$key] : null,
                'terkunci_m_23' => $data['terkunci_m_23'][$key] !== '' ? $data['terkunci_m_23'][$key] : null,
                'terkunci_m_4' => $data['terkunci_m_4'][$key] !== '' ? $data['terkunci_m_4'][$key] : null,

                'tindakan_p_ho' => $data['tindakan_p_ho'][$key] !== '' ? $data['tindakan_p_ho'][$key] : null,
                'tindakan_p_10' => $data['tindakan_p_10'][$key] !== '' ? $data['tindakan_p_10'][$key] : null,
                'tindakan_s_ho' => $data['tindakan_s_ho'][$key] !== '' ? $data['tindakan_s_ho'][$key] : null,
                'tindakan_s_18' => $data['tindakan_s_18'][$key] !== '' ? $data['tindakan_s_18'][$key] : null,
                'tindakan_m_ho' => $data['tindakan_m_ho'][$key] !== '' ? $data['tindakan_m_ho'][$key] : null,
                'tindakan_m_23' => $data['tindakan_m_23'][$key] !== '' ? $data['tindakan_m_23'][$key] : null,
                'tindakan_m_4' => $data['tindakan_m_4'][$key] !== '' ? $data['tindakan_m_4'][$key] : null,

                'paraff_p_ho' => $data['paraff_p_ho'][$key] !== '' ? $data['paraff_p_ho'][$key] : null,
                'paraff_p_10' => $data['paraff_p_10'][$key] !== '' ? $data['paraff_p_10'][$key] : null,
                'paraff_s_ho' => $data['paraff_s_ho'][$key] !== '' ? $data['paraff_s_ho'][$key] : null,
                'paraff_s_18' => $data['paraff_s_18'][$key] !== '' ? $data['paraff_s_18'][$key] : null,
                'paraff_m_ho' => $data['paraff_m_ho'][$key] !== '' ? $data['paraff_m_ho'][$key] : null,
                'paraff_m_23' => $data['paraff_m_23'][$key] !== '' ? $data['paraff_m_23'][$key] : null,
                'paraff_m_4' => $data['paraff_m_4'][$key] !== '' ? $data['paraff_m_4'][$key] : null,
                'created_at'                 => $value,
            );
            $this->db->insert('sm_form_upaya_pencegahan_risiko_jatuh_pada_neonatus', $data_terapi);
        }
    }

    // UPRJPN
    function editUpayaPencegahanRisikoJatuhPadaNeonatus($data){
        return $this->db->where('id', $data['id'], true)->update('sm_form_upaya_pencegahan_risiko_jatuh_pada_neonatus', $data);
    }

    // UPRJPN
    function deleteUpayaPencegahanRisikoJatuhPadaNeonatus($id){
        return $this->db->where("id", $id)->delete("sm_form_upaya_pencegahan_risiko_jatuh_pada_neonatus");
    }
        
    // UPRJPN
    function getUpayaPencegahanResikoJatuhPadaNeonatus($id_layanan_pendaftaran){
        return $this->db->select("sfuprjpn.*, COALESCE(spg1.nama, '') as perawat_1,
                                              COALESCE(spg2.nama, '') as perawat_2,
                                              COALESCE(spg3.nama, '') as perawat_3, 
                                              COALESCE(wid.nama, '') as akun_user")
        ->from('sm_form_upaya_pencegahan_risiko_jatuh_pada_neonatus as sfuprjpn')
        ->join('sm_layanan_pendaftaran as lp', 'sfuprjpn.id_layanan_pendaftaran = lp.id')
        ->join('sm_tenaga_medis stm1', 'sfuprjpn.id_perawat_1 = stm1.id', 'left')
        ->join('sm_tenaga_medis stm2', 'sfuprjpn.id_perawat_2 = stm2.id', 'left')
        ->join('sm_tenaga_medis stm3', 'sfuprjpn.id_perawat_3 = stm3.id', 'left')
        ->join('sm_pegawai spg1', 'spg1.id = stm1.id_pegawai', 'left')
        ->join('sm_pegawai spg2', 'spg2.id = stm2.id_pegawai', 'left')
        ->join('sm_pegawai spg3', 'spg3.id = stm3.id_pegawai', 'left')
        ->join('sm_translucent sid', 'sfuprjpn.id_user = sid.id', 'left')
        ->join('sm_pegawai wid', 'sfuprjpn.id_user = wid.id', 'left')
        ->where('lp.id_pendaftaran', $id_layanan_pendaftaran, true)
        ->order_by('sfuprjpn.tanggal_pengkajian')
        ->get()
        ->result();
    }

    // UPRJPN
    function getUpayaPencegahanResikoJatuhPadaNeonatusByID($id){
        return $this->db->select("sfuprjpn.*, COALESCE(spg1.nama, '') as perawat_1,
                                              COALESCE(spg2.nama, '') as perawat_2,
                                              COALESCE(spg3.nama, '') as perawat_3, 
                                              COALESCE(wid.nama, '') as akun_user")
        ->from('sm_form_upaya_pencegahan_risiko_jatuh_pada_neonatus as sfuprjpn')
        ->join('sm_tenaga_medis stm1', 'sfuprjpn.id_perawat_1 = stm1.id', 'left')
        ->join('sm_tenaga_medis stm2', 'sfuprjpn.id_perawat_2 = stm2.id', 'left')
        ->join('sm_tenaga_medis stm3', 'sfuprjpn.id_perawat_3 = stm3.id', 'left')
        ->join('sm_pegawai spg1', 'spg1.id = stm1.id_pegawai', 'left')
        ->join('sm_pegawai spg2', 'spg2.id = stm2.id_pegawai', 'left')
        ->join('sm_pegawai spg3', 'spg3.id = stm3.id_pegawai', 'left')
        ->join('sm_translucent sid', 'sfuprjpn.id_user = sid.id', 'left')
        ->join('sm_pegawai wid', 'sfuprjpn.id_user = wid.id', 'left')
        ->where('sfuprjpn.id', $id)
        ->order_by('sfuprjpn.tanggal_pengkajian')
        ->get()
        ->row();
    }

    // DPJP
    function insertDaftarDPJP($data) {
        // Cari panjang array dari salah satu input (misal 'id_users')
        $jumlah_data = isset($data['id_users']) ? count($data['id_users']) : 0;

        for ($key = 0; $key < $jumlah_data; $key++) {
            $dpjp_tanggal_awal = date("Y-m-d", strtotime(str_replace('/', '-', $data['tanggal_awal_dpjp'][$key] ?? '')));
            $dpjp_tanggal_akhir = date("Y-m-d", strtotime(str_replace('/', '-', $data['tanggal_akhir_dpjp'][$key] ?? '')));
            $dpjp_tanggal_awal_utama = date("Y-m-d", strtotime(str_replace('/', '-', $data['tanggal_awal_dpjp_utama'][$key] ?? '')));
            $dpjp_tanggal_akhir_utama = date("Y-m-d", strtotime(str_replace('/', '-', $data['tanggal_akhir_dpjp_utama'][$key] ?? '')));

            $data_daftar_dpjp = array(
                'id_pendaftaran'             => $data['id_pendaftaran'] ?? null,
                'id_layanan_pendaftaran'     => $data['id_layanan_pendaftaran'] ?? null,
                'id_users'                   => $data['id_users'][$key] ?? null,
                'tanggal_awal_dpjp'          => $dpjp_tanggal_awal,
                'tanggal_akhir_dpjp'         => $dpjp_tanggal_akhir,
                'tanggal_awal_dpjp_utama'    => $dpjp_tanggal_awal_utama,
                'tanggal_akhir_dpjp_utama'   => $dpjp_tanggal_akhir_utama,
                'diagnosis_dokter'           => !empty($data['diagnosis_dokter'][$key]) ? $data['diagnosis_dokter'][$key] : null,
                'keterangan_dpjp'            => !empty($data['keterangan_dpjp'][$key]) ? $data['keterangan_dpjp'][$key] : null,
                'id_dokter_dpjp'             => !empty($data['id_dokter_dpjp'][$key]) ? $data['id_dokter_dpjp'][$key] : null,
                'id_dokter_dpjp_utama'       => !empty($data['id_dokter_dpjp_utama'][$key]) ? $data['id_dokter_dpjp_utama'][$key] : null,
                'created_date'               => $this->datetime,
            );

            $this->db->insert('sm_daftar_dokter_dpjp', $data_daftar_dpjp);
        }
    }

    // DPJP
    function getDaftarDokterDPJP($id_pendaftaran) {
        $sql = "SELECT
                    ddd.*, 
                    COALESCE(ga_peg.nama, '') AS akun_user, 
                    COALESCE(tmdp.nama, '') AS nama_dokter_dpjp,
                    COALESCE(tmdpjput.nama, '') AS nama_dokter_dpjp_utama
                FROM
                    sm_daftar_dokter_dpjp AS ddd 
                    JOIN sm_layanan_pendaftaran AS lp ON ddd.id_layanan_pendaftaran = lp.id 
                    JOIN sm_pendaftaran AS pd ON lp.id_pendaftaran = pd.id 
                    LEFT JOIN sm_translucent ga_trans ON ddd.id_users = ga_trans.id 
                    LEFT JOIN sm_pegawai ga_peg ON ddd.id_users = ga_peg.id 

                    LEFT JOIN sm_tenaga_medis pdp ON ddd.id_dokter_dpjp = pdp.id 
                    LEFT JOIN sm_pegawai tmdp ON tmdp.id = pdp.id_pegawai 

                    LEFT JOIN sm_tenaga_medis pegdpjp ON ddd.id_dokter_dpjp_utama = pegdpjp.id 
                    LEFT JOIN sm_pegawai tmdpjput ON tmdpjput.id = pegdpjp.id_pegawai 

                WHERE pd.id = '$id_pendaftaran' 
                ORDER BY 
                    ddd.tanggal_awal_dpjp ASC, 
                    ddd.tanggal_akhir_dpjp ASC, 
                    ddd.tanggal_awal_dpjp_utama ASC, 
                    ddd.tanggal_akhir_dpjp_utama ASC";

        return $this->db->query($sql)->result();
    }

    // DPJP
    function getDaftarDokterDPJPByID($id) {
        return $this->db
            ->select("
                ddd.*,
                COALESCE(ga_peg.nama, '') AS akun_user,
                COALESCE(tmdp.nama, '') AS nama_dokter_dpjp,
                COALESCE(tmdpjput.nama, '') AS nama_dokter_dpjp_utama
            ")
            ->from('sm_daftar_dokter_dpjp AS ddd')
            ->join('sm_translucent AS ga_trans', 'ddd.id_users = ga_trans.id', 'left')
            ->join('sm_pegawai AS ga_peg', 'ddd.id_users = ga_peg.id', 'left')

            ->join('sm_tenaga_medis AS pdp', 'ddd.id_dokter_dpjp = pdp.id', 'left')
            ->join('sm_pegawai AS tmdp', 'tmdp.id = pdp.id_pegawai', 'left')

            ->join('sm_tenaga_medis AS pegdpjp', 'ddd.id_dokter_dpjp_utama = pegdpjp.id', 'left')
            ->join('sm_pegawai AS tmdpjput', 'tmdpjput.id = pegdpjp.id_pegawai', 'left')

            ->where('ddd.id', $id)
            ->order_by('ddd.tanggal_awal_dpjp ASC, ddd.tanggal_akhir_dpjp ASC, ddd.tanggal_awal_dpjp_utama ASC, ddd.tanggal_akhir_dpjp_utama ASC')
            ->get()
            ->row();
    }
    
    // DPJP
    function deleteDaftarDokterDPJP($id){
        return $this->db->where("id", $id)->delete("sm_daftar_dokter_dpjp");
    }

    // DPJP LOGS
	function insertLogsDaftarDpjp($data) { 
        return $this->db->insert('sm_daftar_dokter_dpjp_logs', $data);
    }












    // function getDaftarDokterDPJP($id_layanan_pendaftaran)
    // {
    //     return $this->db->select("ddd.*, COALESCE(ga.nama, '') as akun_user, COALESCE(pdp.nama, '') as nama_dokter_dpjp, COALESCE(pegdpjp.nama, '') as nama_dokter_dpjp_utama")
    //         ->from('sm_daftar_dokter_dpjp as ddd')
    //         ->join('sm_layanan_pendaftaran as lp', ' ddd.id_layanan_pendaftaran = lp.id')
    //         ->join('sm_translucent as st', 'st.id = ddd.id_users', 'left')
    //         ->join('sm_pegawai as ga', 'ga.id = st.id', 'left')
    //         ->join('sm_tenaga_medis as tmdp', 'ddd.id_dokter_dpjp = tmdp.id', 'left')
    //         ->join('sm_pegawai as pdp', 'tmdp.id_pegawai = pdp.id', 'left')
    //         ->join('sm_tenaga_medis as tmdpjput', 'ddd.id_dokter_dpjp_utama = tmdpjput.id', 'left')
    //         ->join('sm_pegawai as pegdpjp', 'tmdpjput.id_pegawai = pegdpjp.id', 'left')
    //         ->where('lp.id_pendaftaran', $id_layanan_pendaftaran, true)
    //         // ->where('ddd.id_layanan_pendaftaran', $id_layanan_pendaftaran, true)
    //         ->get()
    //         ->result();
    //     $this->db->close();
    // }

    // function updateDaftarDPJP($data)
    // {
    //     if (is_array($data['diagnosis_dokter'])) :
    //         foreach ($data['diagnosis_dokter'] as $i => $value) :
    //             $daftar_dokter_dpjp = array(
    //                 'id_layanan_pendaftaran' => $data['id_layanan_pendaftaran'],
    //                 'diagnosis_dokter' => $value,
    //                 'keterangan_dpjp' => $data['keterangan_dpjp'][$i],
    //                 'id_dokter_dpjp' => $data['id_dokter_dpjp'][$i],
    //                 'id_dokter_dpjp_utama' => $data['id_dokter_dpjp_utama'][$i],
    //                 'tanggal_awal_dpjp' => $data['tanggal_awal_dpjp'][$i],
    //                 'tanggal_awal_dpjp_utama' => $data['tanggal_awal_dpjp_utama'][$i],
    //                 'tanggal_akhir_dpjp' => $data['tanggal_akhir_dpjp'][$i],
    //                 'tanggal_akhir_dpjp_utama' => $data['tanggal_akhir_dpjp_utama'][$i],
    //                 'created_date' => $data['created_date'],
    //                 'id_users' => $data['id_users'][$i],
    //             );

    //             $this->db->insert('sm_daftar_dokter_dpjp', $daftar_dokter_dpjp);
    //         endforeach;
    //     endif;
    // }

    // function deleteDaftarDokterDPJP($id)
    // {
    //     return $this->db->where("id", $id)->delete("sm_daftar_dokter_dpjp");
    // }

	function cekTanggalBooking($id_pasien, $tgl_tujuan, $tgl_sebelum = null)
    {
        $query = "SELECT ab.id, ab.tanggal_kunjungan, ab.kode_bpjs_poli, sp.id AS id_poli, sp.nama AS nama_poli, 
                        ABS(('$tgl_tujuan'::DATE - ab.tanggal_kunjungan::DATE)) selisih
                  FROM sm_antrian_bpjs ab
                  LEFT JOIN sm_spesialisasi sp ON ab.nama_poli = sp.id
                  WHERE ab.status <> 'Batal'
                  AND ab.jenis_penjamin = '1'
                  AND ab.kode_bpjs_poli = ab.kode_bpjs_poli_rujukan
                  AND ab.no_rm = '$id_pasien'
                  AND ABS(('$tgl_tujuan'::DATE - ab.tanggal_kunjungan::DATE)) <= 8";

        if(!empty($tgl_sebelum)) {
            $query .= " AND ab.tanggal_kunjungan <> '$tgl_sebelum'";
        }

        $query .= " ORDER BY ab.tanggal_kunjungan DESC LIMIT 1";

        return $this->db->query($query)->row();
    }

    function cekTanggalKontrolDokter($id_pasien, $tgl_tujuan, $tgl_sebelum = null)
    {
        $query = "SELECT skk.id, skk.tanggal AS tanggal_kunjungan, sp.id AS id_poli, sp.nama AS nama_poli, 
                        ABS(('$tgl_tujuan'::DATE - skk.tanggal::DATE)) AS selisih
                  FROM sm_surat_kontrol skk
                  LEFT JOIN sm_spesialisasi sp ON skk.id_spesialisasi = sp.id
                  LEFT JOIN (
                      SELECT id_skd FROM sm_antrian_bpjs
                      WHERE status <> 'Batal' AND jenis_penjamin = '1' AND kode_bpjs_poli = kode_bpjs_poli_rujukan
                      AND no_rm = '$id_pasien' LIMIT 5
                  ) ab ON skk.id = ab.id_skd
                  WHERE skk.id_pasien = '$id_pasien'
                  AND skk.jenis = 'Surat Kontrol' 
                  AND skk.id_penjamin = '1' 
                  AND skk.id_spesialisasi NOT IN (34, 59) 
                  AND ab.id_skd IS NULL 
                  AND ABS(('$tgl_tujuan'::DATE - skk.tanggal::DATE)) <= 8 ";

        if(!empty($tgl_sebelum)) {
            $query .= " AND skk.tanggal <> '$tgl_sebelum'";
        }

        $query .= " ORDER BY skk.tanggal DESC LIMIT 1";

        return $this->db->query($query)->row();
    }





    // function getPengkajianUlang($id_layanan_pendaftaran)
    // {
    //     return $this->db->select("spu.*, COALESCE(ga.nama, '') as akun_user")
    //         ->from('sm_pengkajian_ulang as spu')
    //         ->join('sm_layanan_pendaftaran as lp', ' spu.id_layanan_pendaftaran = lp.id')
    //         ->join('sm_translucent as st', 'st.id = spu.id_users', 'left')
    //         ->join('sm_pegawai as ga', 'ga.id = st.id', 'left')
    //         ->where('lp.id_pendaftaran', $id_layanan_pendaftaran, true)
    //         // ->where('spu.id_layanan_pendaftaran', $id_layanan_pendaftaran, true)
    //         ->order_by('spu.tanggal_pengkajian asc')
    //         ->get()
    //         ->result();
    //     $this->db->close();
    // }

    // function updatePengkajianUlang($data)
    // {
    //     if (is_array($data['tanggal_pengkajian'])) :
    //         foreach ($data['tanggal_pengkajian'] as $i => $value) :
    //             $data_terapi = array(
    //                 'id_layanan_pendaftaran' => $data['id_layanan_pendaftaran'],
    //                 'tanggal_pengkajian' => $value,
    //                 'jumlah_skor' => $data['jumlah_skor'][$i],
    //                 'riwayat_jatuh' => $data['riwayat_jatuh'][$i],
    //                 'diagnosis_sekunder' => $data['diagnosis_sekunder'][$i],
    //                 'alat_bantu_dua' => $data['alat_bantu_dua'][$i],
    //                 'infus' => $data['infus'][$i],
    //                 'cara_berjalan' => $data['cara_berjalan'][$i],
    //                 'status_mental' => $data['status_mental'][$i],
    //                 'created_date' => $data['date_created'][$i],
    //                 'id_users' => $data['users'][$i],
    //             );

    //             $this->db->insert('sm_pengkajian_ulang', $data_terapi);
    //         endforeach;
    //     endif;
    // }

    // function deleteKajiUlang($id)
    // {
    //     return $this->db->where("id", $id)->delete("sm_pengkajian_ulang");
    // }

    // function getUpayaPencegahanPasienDewasa($id_layanan_pendaftaran)
    // {
    //     return $this->db->select("suprjpd.*, COALESCE(spgp.nama, '') as perawat_p, COALESCE(spgs.nama, '') as perawat_s,COALESCE(spgm.nama, '') as perawat_m, COALESCE(gid.nama, '') as akun_user")
    //         ->from('sm_upaya_pencegahan_risiko_jatuh_pasien_dewasa as suprjpd')
    //         ->join('sm_layanan_pendaftaran as lp', ' suprjpd.id_layanan_pendaftaran = lp.id')
    //         ->join('sm_tenaga_medis stmp', 'suprjpd.id_perawat_p = stmp.id', 'left')
    //         ->join('sm_tenaga_medis stms', 'suprjpd.id_perawat_s = stms.id', 'left')
    //         ->join('sm_tenaga_medis stmm', 'suprjpd.id_perawat_m = stmm.id', 'left')
    //         ->join('sm_translucent sid', 'suprjpd.id_user = sid.id', 'left')
    //         ->join('sm_pegawai gid', 'suprjpd.id_user = gid.id', 'left')
    //         ->join('sm_pegawai spgp', 'spgp.id = stmp.id_pegawai', 'left')
    //         ->join('sm_pegawai spgs', 'spgs.id = stms.id_pegawai', 'left')
    //         ->join('sm_pegawai spgm', 'spgm.id = stmm.id_pegawai', 'left')
    //         ->where('lp.id_pendaftaran', $id_layanan_pendaftaran, true)
    //         // ->where('suprjpd.id_pendaftaran', $id_pendaftaran)
    //         ->order_by('suprjpd.tanggal_pengkajian')
    //         ->get()
    //         ->result();
    // }

    // function getUpayaPencegahanResikoJatuhPasienDewasaByID($id)
    // {
    //     return $this->db->select("suprjpd.*, COALESCE(spgp.nama, '') as perawat_p, COALESCE(spgs.nama, '') as perawat_s,COALESCE(spgm.nama, '') as perawat_m, COALESCE(gid.nama, '') as akun_user")
    //         ->from('sm_upaya_pencegahan_risiko_jatuh_pasien_dewasa as suprjpd')
    //         ->join('sm_tenaga_medis stmp', 'suprjpd.id_perawat_p = stmp.id', 'left')
    //         ->join('sm_tenaga_medis stms', 'suprjpd.id_perawat_s = stms.id', 'left')
    //         ->join('sm_tenaga_medis stmm', 'suprjpd.id_perawat_m = stmm.id', 'left')
    //         ->join('sm_translucent sid', 'suprjpd.id_user = sid.id', 'left')
    //         ->join('sm_pegawai gid', 'suprjpd.id_user = gid.id', 'left')
    //         ->join('sm_pegawai spgp', 'spgp.id = stmp.id_pegawai', 'left')
    //         ->join('sm_pegawai spgs', 'spgs.id = stms.id_pegawai', 'left')
    //         ->join('sm_pegawai spgm', 'spgm.id = stmm.id_pegawai', 'left')
    //         ->where('suprjpd.id', $id)
    //         ->order_by('suprjpd.tanggal_pengkajian')
    //         ->get()
    //         ->row();
    // }

    // function insertUpayaPencegahanDewasa($data)
    // {
    //     foreach ($data['date_created'] as $key => $value) {
    //         $tanggal_pengkajian_dewasa = str_replace('/', '-', $data['tanggal_pengkajian'][$key]);
    //         $tanggal_pengkajian_dewasa = date("Y-m-d", strtotime($tanggal_pengkajian_dewasa));

    //         $data_terapi = array(
    //             'id_pendaftaran'             => $data['id_pendaftaran'],
    //             'id_layanan_pendaftaran'     => $data['id_layanan_pendaftaran'],
    //             'id_perawat_p'               => $data['id_perawat_p'][$key] !== '' ? $data['id_perawat_p'][$key] : null,
    //             'id_perawat_s'               => $data['id_perawat_s'][$key] !== '' ? $data['id_perawat_s'][$key] : null,
    //             'id_perawat_m'               => $data['id_perawat_m'][$key] !== '' ? $data['id_perawat_m'][$key] : null,
    //             'id_user'                    => $data['id_user'][$key],
    //             'tanggal_pengkajian'         => $tanggal_pengkajian_dewasa,

    //             'bel_p_ho' => $data['bel_p_ho'][$key] !== '' ? $data['bel_p_ho'][$key] : null,
    //             'bel_p_10' => $data['bel_p_10'][$key] !== '' ? $data['bel_p_10'][$key] : null,
    //             'bel_s_ho' => $data['bel_s_ho'][$key] !== '' ? $data['bel_s_ho'][$key] : null,
    //             'bel_s_18' => $data['bel_s_18'][$key] !== '' ? $data['bel_s_18'][$key] : null,
    //             'bel_m_ho' => $data['bel_m_ho'][$key] !== '' ? $data['bel_m_ho'][$key] : null,
    //             'bel_m_23' => $data['bel_m_23'][$key] !== '' ? $data['bel_m_23'][$key] : null,
    //             'bel_m_4' => $data['bel_m_4'][$key] !== '' ? $data['bel_m_4'][$key] : null,

    //             'roda_p_ho' => $data['roda_p_ho'][$key] !== '' ? $data['roda_p_ho'][$key] : null,
    //             'roda_p_10' => $data['roda_p_10'][$key] !== '' ? $data['roda_p_10'][$key] : null,
    //             'roda_s_ho' => $data['roda_s_ho'][$key] !== '' ? $data['roda_s_ho'][$key] : null,
    //             'roda_s_18' => $data['roda_s_18'][$key] !== '' ? $data['roda_s_18'][$key] : null,
    //             'roda_m_ho' => $data['roda_m_ho'][$key] !== '' ? $data['roda_m_ho'][$key] : null,
    //             'roda_m_23' => $data['roda_m_23'][$key] !== '' ? $data['roda_m_23'][$key] : null,
    //             'roda_m_4' => $data['roda_m_4'][$key] !== '' ? $data['roda_m_4'][$key] : null,

    //             'ptt_p_ho' => $data['ptt_p_ho'][$key] !== '' ? $data['ptt_p_ho'][$key] : null,
    //             'ptt_p_10' => $data['ptt_p_10'][$key] !== '' ? $data['ptt_p_10'][$key] : null,
    //             'ptt_s_ho' => $data['ptt_s_ho'][$key] !== '' ? $data['ptt_s_ho'][$key] : null,
    //             'ptt_s_18' => $data['ptt_s_18'][$key] !== '' ? $data['ptt_s_18'][$key] : null,
    //             'ptt_m_ho' => $data['ptt_m_ho'][$key] !== '' ? $data['ptt_m_ho'][$key] : null,
    //             'ptt_m_23' => $data['ptt_m_23'][$key] !== '' ? $data['ptt_m_23'][$key] : null,
    //             'ptt_m_4' => $data['ptt_m_4'][$key] !== '' ? $data['ptt_m_4'][$key] : null,

    //             'ppt_p_ho' => $data['ppt_p_ho'][$key] !== '' ? $data['ppt_p_ho'][$key] : null,
    //             'ppt_p_10' => $data['ppt_p_10'][$key] !== '' ? $data['ppt_p_10'][$key] : null,
    //             'ppt_s_ho' => $data['ppt_s_ho'][$key] !== '' ? $data['ppt_s_ho'][$key] : null,
    //             'ppt_s_18' => $data['ppt_s_18'][$key] !== '' ? $data['ppt_s_18'][$key] : null,
    //             'ppt_m_ho' => $data['ppt_m_ho'][$key] !== '' ? $data['ppt_m_ho'][$key] : null,
    //             'ppt_m_23' => $data['ppt_m_23'][$key] !== '' ? $data['ppt_m_23'][$key] : null,
    //             'ppt_m_4' => $data['ppt_m_4'][$key] !== '' ? $data['ppt_m_4'][$key] : null,

    //             'penerangan_p_ho' => $data['penerangan_p_ho'][$key] !== '' ? $data['penerangan_p_ho'][$key] : null,
    //             'penerangan_p_10' => $data['penerangan_p_10'][$key] !== '' ? $data['penerangan_p_10'][$key] : null,
    //             'penerangan_s_ho' => $data['penerangan_s_ho'][$key] !== '' ? $data['penerangan_s_ho'][$key] : null,
    //             'penerangan_s_18' => $data['penerangan_s_18'][$key] !== '' ? $data['penerangan_s_18'][$key] : null,
    //             'penerangan_m_ho' => $data['penerangan_m_ho'][$key] !== '' ? $data['penerangan_m_ho'][$key] : null,
    //             'penerangan_m_23' => $data['penerangan_m_23'][$key] !== '' ? $data['penerangan_m_23'][$key] : null,
    //             'penerangan_m_4' => $data['penerangan_m_4'][$key] !== '' ? $data['penerangan_m_4'][$key] : null,

    //             'alas_p_ho' => $data['alas_p_ho'][$key] !== '' ? $data['alas_p_ho'][$key] : null,
    //             'alas_p_10' => $data['alas_p_10'][$key] !== '' ? $data['alas_p_10'][$key] : null,
    //             'alas_s_ho' => $data['alas_s_ho'][$key] !== '' ? $data['alas_s_ho'][$key] : null,
    //             'alas_s_18' => $data['alas_s_18'][$key] !== '' ? $data['alas_s_18'][$key] : null,
    //             'alas_m_ho' => $data['alas_m_ho'][$key] !== '' ? $data['alas_m_ho'][$key] : null,
    //             'alas_m_23' => $data['alas_m_23'][$key] !== '' ? $data['alas_m_23'][$key] : null,
    //             'alas_m_4' => $data['alas_m_4'][$key] !== '' ? $data['alas_m_4'][$key] : null,

    //             'lantai_p_ho' => $data['lantai_p_ho'][$key] !== '' ? $data['lantai_p_ho'][$key] : null,
    //             'lantai_p_10' => $data['lantai_p_10'][$key] !== '' ? $data['lantai_p_10'][$key] : null,
    //             'lantai_s_ho' => $data['lantai_s_ho'][$key] !== '' ? $data['lantai_s_ho'][$key] : null,
    //             'lantai_s_18' => $data['lantai_s_18'][$key] !== '' ? $data['lantai_s_18'][$key] : null,
    //             'lantai_m_ho' => $data['lantai_m_ho'][$key] !== '' ? $data['lantai_m_ho'][$key] : null,
    //             'lantai_m_23' => $data['lantai_m_23'][$key] !== '' ? $data['lantai_m_23'][$key] : null,
    //             'lantai_m_4' => $data['lantai_m_4'][$key] !== '' ? $data['lantai_m_4'][$key] : null,

    //             'alat_p_ho' => $data['alat_p_ho'][$key] !== '' ? $data['alat_p_ho'][$key] : null,
    //             'alat_p_10' => $data['alat_p_10'][$key] !== '' ? $data['alat_p_10'][$key] : null,
    //             'alat_s_ho' => $data['alat_s_ho'][$key] !== '' ? $data['alat_s_ho'][$key] : null,
    //             'alat_s_18' => $data['alat_s_18'][$key] !== '' ? $data['alat_s_18'][$key] : null,
    //             'alat_m_ho' => $data['alat_m_ho'][$key] !== '' ? $data['alat_m_ho'][$key] : null,
    //             'alat_m_23' => $data['alat_m_23'][$key] !== '' ? $data['alat_m_23'][$key] : null,
    //             'alat_m_4' => $data['alat_m_4'][$key] !== '' ? $data['alat_m_4'][$key] : null,

    //             'edukasi_p_ho' => $data['edukasi_p_ho'][$key] !== '' ? $data['edukasi_p_ho'][$key] : null,
    //             'edukasi_p_10' => $data['edukasi_p_10'][$key] !== '' ? $data['edukasi_p_10'][$key] : null,
    //             'edukasi_s_ho' => $data['edukasi_s_ho'][$key] !== '' ? $data['edukasi_s_ho'][$key] : null,
    //             'edukasi_s_18' => $data['edukasi_s_18'][$key] !== '' ? $data['edukasi_s_18'][$key] : null,
    //             'edukasi_m_ho' => $data['edukasi_m_ho'][$key] !== '' ? $data['edukasi_m_ho'][$key] : null,
    //             'edukasi_m_23' => $data['edukasi_m_23'][$key] !== '' ? $data['edukasi_m_23'][$key] : null,
    //             'edukasi_m_4' => $data['edukasi_m_4'][$key] !== '' ? $data['edukasi_m_4'][$key] : null,

    //             'commode_p_ho' => $data['commode_p_ho'][$key] !== '' ? $data['commode_p_ho'][$key] : null,
    //             'commode_p_10' => $data['commode_p_10'][$key] !== '' ? $data['commode_p_10'][$key] : null,
    //             'commode_s_ho' => $data['commode_s_ho'][$key] !== '' ? $data['commode_s_ho'][$key] : null,
    //             'commode_s_18' => $data['commode_s_18'][$key] !== '' ? $data['commode_s_18'][$key] : null,
    //             'commode_m_ho' => $data['commode_m_ho'][$key] !== '' ? $data['commode_m_ho'][$key] : null,
    //             'commode_m_23' => $data['commode_m_23'][$key] !== '' ? $data['commode_m_23'][$key] : null,
    //             'commode_m_4' => $data['commode_m_4'][$key] !== '' ? $data['commode_m_4'][$key] : null,

    //             'gelang_p_ho' => $data['gelang_p_ho'][$key] !== '' ? $data['gelang_p_ho'][$key] : null,
    //             'gelang_p_10' => $data['gelang_p_10'][$key] !== '' ? $data['gelang_p_10'][$key] : null,
    //             'gelang_s_ho' => $data['gelang_s_ho'][$key] !== '' ? $data['gelang_s_ho'][$key] : null,
    //             'gelang_s_18' => $data['gelang_s_18'][$key] !== '' ? $data['gelang_s_18'][$key] : null,
    //             'gelang_m_ho' => $data['gelang_m_ho'][$key] !== '' ? $data['gelang_m_ho'][$key] : null,
    //             'gelang_m_23' => $data['gelang_m_23'][$key] !== '' ? $data['gelang_m_23'][$key] : null,
    //             'gelang_m_4' => $data['gelang_m_4'][$key] !== '' ? $data['gelang_m_4'][$key] : null,

    //             'station_p_ho' => $data['station_p_ho'][$key] !== '' ? $data['station_p_ho'][$key] : null,
    //             'station_p_10' => $data['station_p_10'][$key] !== '' ? $data['station_p_10'][$key] : null,
    //             'station_s_ho' => $data['station_s_ho'][$key] !== '' ? $data['station_s_ho'][$key] : null,
    //             'station_s_18' => $data['station_s_18'][$key] !== '' ? $data['station_s_18'][$key] : null,
    //             'station_m_ho' => $data['station_m_ho'][$key] !== '' ? $data['station_m_ho'][$key] : null,
    //             'station_m_23' => $data['station_m_23'][$key] !== '' ? $data['station_m_23'][$key] : null,
    //             'station_m_4' => $data['station_m_4'][$key] !== '' ? $data['station_m_4'][$key] : null,

    //             'paraf_p_ho' => $data['paraf_p_ho'][$key] !== '' ? $data['paraf_p_ho'][$key] : null,
    //             'paraf_p_10' => $data['paraf_p_10'][$key] !== '' ? $data['paraf_p_10'][$key] : null,
    //             'paraf_s_ho' => $data['paraf_s_ho'][$key] !== '' ? $data['paraf_s_ho'][$key] : null,
    //             'paraf_s_18' => $data['paraf_s_18'][$key] !== '' ? $data['paraf_s_18'][$key] : null,
    //             'paraf_m_ho' => $data['paraf_m_ho'][$key] !== '' ? $data['paraf_m_ho'][$key] : null,
    //             'paraf_m_23' => $data['paraf_m_23'][$key] !== '' ? $data['paraf_m_23'][$key] : null,
    //             'paraf_m_4' => $data['paraf_m_4'][$key] !== '' ? $data['paraf_m_4'][$key] : null,

    //             'created_at'                 => $value,
    //         );

    //         $this->db->insert('sm_upaya_pencegahan_risiko_jatuh_pasien_dewasa', $data_terapi);
    //     }
    // }

    // function editUpayaPencegahanRisikoJatuhPasienDewasa($data)
    // {
    //     return $this->db->where('id', $data['id'], true)->update('sm_upaya_pencegahan_risiko_jatuh_pasien_dewasa', $data);
    // }

    // function deleteUpayaPencegahanRisikoJatuhPasienDewasa($id)
    // {
    //     return $this->db->where("id", $id)->delete("sm_upaya_pencegahan_risiko_jatuh_pasien_dewasa");
    // }





    // PURJPD 
    function getPengkajianUlang($id_layanan_pendaftaran){
        return $this->db->select("spu.*, COALESCE(sp.nama, '') as perawat, COALESCE(ga.nama, '') as akun_user")
            ->from('sm_pengkajian_ulang as spu')
            ->join('sm_layanan_pendaftaran as lp',' spu.id_layanan_pendaftaran = lp.id')
            ->join('sm_tenaga_medis stp', 'spu.perawat_purjpd = stp.id', 'left')
            ->join('sm_pegawai sp', 'sp.id = stp.id_pegawai', 'left')
            ->join('sm_translucent as st', 'st.id = spu.id_users', 'left')
            ->join('sm_pegawai as ga', 'ga.id = st.id', 'left')
            ->where('lp.id_pendaftaran', $id_layanan_pendaftaran, true)
            ->order_by('spu.tanggal_pengkajian asc')
            ->get()
            ->result();
        $this->db->close();
    }

    // PURJPD 
    function updatePengkajianUlang($data){
        if (is_array($data['tanggal_pengkajian'])) :
            foreach ($data['tanggal_pengkajian'] as $i => $value) :
                $data_terapi = array(
                    'id_pendaftaran' => $data['id_pendaftaran'],
                    'id_layanan_pendaftaran' => $data['id_layanan_pendaftaran'],
                    'tanggal_pengkajian' => $value,
                    'jumlah_skor' => $data['jumlah_skor'][$i],
                    'perawat_purjpd' => $data['perawat_purjpd'][$i],
                    'riwayat_jatuh' => $data['riwayat_jatuh'][$i],
                    'diagnosis_sekunder' => $data['diagnosis_sekunder'][$i],
                    'alat_bantu_dua' => $data['alat_bantu_dua'][$i],
                    'infus' => $data['infus'][$i],
                    'cara_berjalan' => $data['cara_berjalan'][$i],
                    'status_mental' => $data['status_mental'][$i],
                    'created_date' => $data['date_created'][$i],
                    'id_users' => $data['users'][$i],
                );
                $this->db->insert('sm_pengkajian_ulang', $data_terapi);
            endforeach;
        endif;
    }

    // PURJPD LOGS
    function deleteKajiUlang($id, $deleted_by) {
        $row = $this->db->get_where("sm_pengkajian_ulang", ['id' => $id])->row_array();
        if ($row) {
            $row['deleted_at'] = date('Y-m-d H:i:s');
            $row['deleted_by'] = $deleted_by; // nama, bukan angka
            $this->db->insert("sm_pengkajian_ulang_logs", $row);
            return $this->db->where("id", $id)->delete("sm_pengkajian_ulang");
        }
        return false;
    }
    
    // UPRJPD
    function getUpayaPencegahanPasienDewasa($id_layanan_pendaftaran){
        return $this->db->select("suprjpd.*, COALESCE(spgp.nama, '') as perawat_p, COALESCE(spgs.nama, '') as perawat_s,COALESCE(spgm.nama, '') as perawat_m, COALESCE(gid.nama, '') as akun_user")
        ->from('sm_upaya_pencegahan_risiko_jatuh_pasien_dewasa as suprjpd')
        ->join('sm_layanan_pendaftaran as lp',' suprjpd.id_layanan_pendaftaran = lp.id')
        ->join('sm_tenaga_medis stmp', 'suprjpd.id_perawat_p = stmp.id', 'left')
        ->join('sm_tenaga_medis stms', 'suprjpd.id_perawat_s = stms.id', 'left')
        ->join('sm_tenaga_medis stmm', 'suprjpd.id_perawat_m = stmm.id', 'left')
        ->join('sm_translucent sid', 'suprjpd.id_user = sid.id', 'left')
        ->join('sm_pegawai gid', 'suprjpd.id_user = gid.id', 'left')
        ->join('sm_pegawai spgp', 'spgp.id = stmp.id_pegawai', 'left')
        ->join('sm_pegawai spgs', 'spgs.id = stms.id_pegawai', 'left')
        ->join('sm_pegawai spgm', 'spgm.id = stmm.id_pegawai', 'left')
        ->where('lp.id_pendaftaran', $id_layanan_pendaftaran, true)
        ->order_by('suprjpd.tanggal_pengkajian')
        ->get()
        ->result();
    }

    // UPRJPD
    function getUpayaPencegahanResikoJatuhPasienDewasaByID($id){
        return $this->db->select("suprjpd.*, COALESCE(spgp.nama, '') as perawat_p, COALESCE(spgs.nama, '') as perawat_s,COALESCE(spgm.nama, '') as perawat_m, COALESCE(gid.nama, '') as akun_user")
            ->from('sm_upaya_pencegahan_risiko_jatuh_pasien_dewasa as suprjpd')
            ->join('sm_tenaga_medis stmp', 'suprjpd.id_perawat_p = stmp.id', 'left')
            ->join('sm_tenaga_medis stms', 'suprjpd.id_perawat_s = stms.id', 'left')
            ->join('sm_tenaga_medis stmm', 'suprjpd.id_perawat_m = stmm.id', 'left')
            ->join('sm_translucent sid', 'suprjpd.id_user = sid.id', 'left')
            ->join('sm_pegawai gid', 'suprjpd.id_user = gid.id', 'left')
            ->join('sm_pegawai spgp', 'spgp.id = stmp.id_pegawai', 'left')
            ->join('sm_pegawai spgs', 'spgs.id = stms.id_pegawai', 'left')
            ->join('sm_pegawai spgm', 'spgm.id = stmm.id_pegawai', 'left')
            ->where('suprjpd.id', $id)
            ->order_by('suprjpd.tanggal_pengkajian')
            ->get()
            ->row();
    }

    // UPRJPD
    function insertUpayaPencegahanDewasa($data) {
        // Daftar nama field checkbox (yang diulang-ulang)
        $fields = [
            'bel', 'roda', 'ptt', 'ppt', 'penerangan', 'alas', 'lantai',
            'alat', 'edukasi', 'commode', 'gelang', 'station', 'paraf'
        ];
        $usia = ['p_ho', 'p_10', 's_ho', 's_18', 'm_ho', 'm_23', 'm_4'];

        foreach ($data['date_created'] as $key => $value) {
            $tanggal_pengkajian = str_replace('/', '-', $data['tanggal_pengkajian'][$key]);
            $tanggal_pengkajian = date("Y-m-d", strtotime($tanggal_pengkajian));

            $data_terapi = [
                'id_pendaftaran'         => $data['id_pendaftaran'],
                'id_layanan_pendaftaran' => $data['id_layanan_pendaftaran'],
                'id_perawat_p'           => $data['id_perawat_p'][$key] ?: null,
                'id_perawat_s'           => $data['id_perawat_s'][$key] ?: null,
                'id_perawat_m'           => $data['id_perawat_m'][$key] ?: null,
                'id_user'                => $data['id_user'][$key],
                'tanggal_pengkajian'     => $tanggal_pengkajian,
                'created_at'             => $value,

            ];

            // Tambahkan semua nilai checkbox
            foreach ($fields as $f) {
                foreach ($usia as $u) {
                    $field_name = "{$f}_{$u}";
                    $data_terapi[$field_name] = isset($data[$field_name][$key]) && $data[$field_name][$key] !== ''
                        ? $data[$field_name][$key] : null;
                }
            }

            $this->db->insert('sm_upaya_pencegahan_risiko_jatuh_pasien_dewasa', $data_terapi);
        }
    }
 
    // UPRJPD
    function editUpayaPencegahanRisikoJatuhPasienDewasa($data) {
        $id = $data['id'];

        // Simpan log dari data lama
        $row = $this->db->get_where('sm_upaya_pencegahan_risiko_jatuh_pasien_dewasa', ['id' => $id])->row_array();
        if ($row) {
            $log = $row;
            unset($log['id']); // 🔥 Hapus id agar tidak bentrok di tabel logs
            $log['id_upaya']    = $id; // simpan ID aslinya di kolom lain, misalnya `id_upaya`
            $log['updated_at']  = $data['updated_at'];
            $log['updated_by']  = $data['updated_by'] ?? '-';
            $log['aksi']        = 'update';

            $this->db->insert('sm_upaya_pencegahan_risiko_jatuh_pasien_dewasa_logs', $log);
        }

        // Hapus data yang bukan milik tabel utama
        $updateData = $data;
        unset($updateData['aksi'], $updateData['updated_by']);

        // Jalankan update
        $this->db->where('id', $id);
        $update = $this->db->update('sm_upaya_pencegahan_risiko_jatuh_pasien_dewasa', $updateData);

        return $update;
    }

    // UPRJPD LOGS
    function deleteUpayaPencegahanRisikoJatuhPasienDewasa($id, $deleted_by) {
        $row = $this->db->get_where("sm_upaya_pencegahan_risiko_jatuh_pasien_dewasa", ['id' => $id])->row_array();
        if ($row) {
            // Simpan ke log dulu
            $row['deleted_at'] = date('Y-m-d H:i:s');
            $row['deleted_by'] = $deleted_by; // nama user
            $row['aksi']       = 'delete'; // tambahin ini biar jelas di log
            $this->db->insert("sm_upaya_pencegahan_risiko_jatuh_pasien_dewasa_logs", $row);

            // Baru hapus dari tabel utama
            return $this->db->where("id", $id)->delete("sm_upaya_pencegahan_risiko_jatuh_pasien_dewasa");
        }
        return false;
    }




    // CPTDI
	function getCheklistPersiapanTindakanDiagnostikInvasif($id_pendaftaran){
		return $this->db->select('cptdi.*, 
                                        prw1.nama as perawat_1, 
                                        prw1.tanda_tangan as ttd_perawat_1, 
                                        prw2.nama as perawat_2, 
                                        prw2.tanda_tangan as ttd_perawat_2, 
                                        lp.tanggal_layanan as tanggal')
        ->from('sm_cheklist_persiapan_tindakan_diagnostik_invasif as cptdi')	  
        ->join('sm_layanan_pendaftaran as lp', 'lp.id = cptdi.id_layanan_pendaftaran')
        ->join('sm_tenaga_medis as tmp1 ', ' tmp1.id = cptdi.perawat_cptdi', 'left')
        ->join('sm_pegawai as prw1 ', ' prw1.id = tmp1.id_pegawai', 'left')
        ->join('sm_tenaga_medis as tmp2 ', ' tmp2.id = cptdi.perawatobsser_cptdi', 'left')
        ->join('sm_pegawai as prw2 ', ' prw2.id = tmp2.id_pegawai', 'left')
        ->where('lp.id_pendaftaran', $id_pendaftaran, true)
        ->get()
        ->row();
	}

	// CPTDI LOGS 
	function getCheklistPersiapanTindakanDiagnostikInvasifLogs($id_pendaftaran){ 
        return $this->db->select('cptdi.*, prw1.nama as perawat_1, prw2.nama as perawat_2')
        ->from('sm_cheklist_persiapan_tindakan_diagnostik_invasif as cptdi')	  
        ->join('sm_layanan_pendaftaran as lp', 'lp.id = cptdi.id_layanan_pendaftaran')
        ->join('sm_tenaga_medis as tmp1 ', ' tmp1.id = cptdi.perawat_cptdi', 'left')
        ->join('sm_pegawai as prw1 ', ' prw1.id = tmp1.id_pegawai', 'left')
        ->join('sm_tenaga_medis as tmp2 ', ' tmp2.id = cptdi.perawatobsser_cptdi', 'left')
        ->join('sm_pegawai as prw2 ', ' prw2.id = tmp2.id_pegawai', 'left')
        ->where('lp.id_pendaftaran', $id_pendaftaran, true)
		->get()
		->result();
	}

    // CPTDI
    function updateCheklisPersiapanTindakanDiagnostikInvasif($data, $id_cptdi, $edited_by = null) {
        $this->db->trans_begin();

        if (!empty($id_cptdi)) {
            $sebelumnya = $this->db->get_where('sm_cheklist_persiapan_tindakan_diagnostik_invasif', ['id' => $id_cptdi])->row_array();

            if ($sebelumnya) {
                $sebelumnya['id_cptdi_ref'] = $sebelumnya['id'];
                unset($sebelumnya['id']);

                $sebelumnya['edited_by'] = $edited_by;
                $sebelumnya['tanggal_ubah_cptdi'] = date('Y-m-d H:i:s');

                $this->db->insert('sm_cheklist_persiapan_tindakan_diagnostik_invasif_logs', $sebelumnya);
            }

            // Simpan waktu update ke tabel utama
            $data['updated_date'] = date('Y-m-d H:i:s');

            $this->db->where('id', $id_cptdi);
            $this->db->update('sm_cheklist_persiapan_tindakan_diagnostik_invasif', $data);
        } else {
            $data['created_date'] = date('Y-m-d H:i:s');
            $this->db->insert('sm_cheklist_persiapan_tindakan_diagnostik_invasif', $data);
            $id_cptdi = $this->db->insert_id();
        }

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return $id_cptdi;
        }
    }

    // GRAFIK OBSERVASI
    function getGrafikObservasiInvasif($id_pendaftaran){
        return $this->db
            ->select("goi.*") // nama_petugas sudah dihapus dari sini
            ->from('sm_grafik_observasi_intra as goi')
            ->join('sm_layanan_pendaftaran as lp', 'goi.id_layanan_pendaftaran = lp.id')
            ->join('sm_pendaftaran as pd', 'lp.id_pendaftaran = pd.id')
            ->join('sm_pegawai as pg', 'goi.id_user = pg.id', 'left')
            ->where('lp.id_pendaftaran', $id_pendaftaran)
            ->order_by('goi.id', 'asc')
            ->get()
            ->result();
        $this->db->close();
    }

    // GRAFIK OBSERVASI
    function getGrafikObservasiInvasifByID($id){
        return $this->db
            ->select("goi.*") // nama_petugas sudah dihapus dari sini
            ->from('sm_grafik_observasi_intra as goi')
            ->join('sm_layanan_pendaftaran as lp', 'goi.id_layanan_pendaftaran = lp.id')
            ->join('sm_pendaftaran as pd', 'lp.id_pendaftaran = pd.id')
            ->join('sm_pegawai as pg', ' goi.id_user = pg.id', 'left')
            ->where('goi.id', $id)
            ->order_by('goi.id', 'asc')
            ->get()
            ->row();
        $this->db->close();
    }

    // SIMPAN GRAFIK OBSERVASI
    function insertGrafikObservasiInvasif($data){
        $cptdi_tglgo = str_replace("/", "-", $data['tglgo_cptdi']);
        $cptdi_tglgo = date("Y-m-d", strtotime($cptdi_tglgo));
        $data = array(
                    'id_layanan_pendaftaran'    => $data['id_layanan_pendaftaran'],
                    'id_pendaftaran'            => $data['id_pendaftaran'],
                    'id_user'                   => $data['id_user'],
                    'bloodpressure_cptdi'       => $data['bloodpressure_cptdi'],
                    'nadipulse_cptdi'           => $data['nadipulse_cptdi'],
                    'pernafasan_cptdi'          => $data['pernafasan_cptdi'],
                    'suhu_cptdi'                => $data['suhu_cptdi'],
                    'jamgo_cptdi'               => $data['jamgo_cptdi'],
                    'tglgo_cptdi'               => $cptdi_tglgo,
                    'created_at'                => date('Y-m-d H:i:s'), // Menggunakan timestamp saat ini
                );
        $this->db->insert('sm_grafik_observasi_intra', $data);
    }

    // GRAFIK OBSERVASI
    function updateGrafikObservasiInvasif($data){
        return $this->db->where('id', $data['id'], true)->update('sm_grafik_observasi_intra', $data);
    }

    // GRAFIK OBSERVASI
    function deleteGrafikObservasiInvasif($id){
        return $this->db->where("id", $id)->delete("sm_grafik_observasi_intra");
    }

    // GRAFIK GRAFIK OBSERVASI LOGS
    function insertLogsGrafikObservasiInvasif($data) {
        return $this->db->insert('sm_grafik_observasi_intra_logs', $data);
    }










    
}
