<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Hasil_mcu_kirim_online_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->datetime = date('Y-m-d H:i:s');
    }

    function getListDataMcu($search, $start, $limit)
    {
        if ($search["jenis_tanggal"] == "keluar") {
			$tanggal = " pd.tanggal_keluar ";
        } else if ($search["jenis_tanggal"] == "daftar") {
            $tanggal = " pd.tanggal_daftar ";
        } else {
            $tanggal = " lp.tanggal_layanan ";
        }

        $where = "";
        if (!empty($search['tanggal_awal']) && !empty($search['tanggal_akhir'])) {
            $where = "AND $tanggal BETWEEN '" . date2mysql($search['tanggal_awal']) . " 00:00:00' AND '" . date2mysql($search['tanggal_akhir']) . " 23:59:59'";
        }

        $sql = "SELECT DISTINCT pd.id, lp.id id_layanan_pendaftran, mcu.id id_hasil_mcu, pd.no_register,pd.tanggal_daftar, pd.tanggal_keluar, lp.tanggal_layanan, 
                pd.id_pasien, ps.nama, ps.tanggal_lahir, ps.email, pd.id_penjamin, pj.nama penjamin, lp.id_dokter, pg.nama dokter, lp.status_terlayani, lp.tindak_lanjut,
                case when mcu.status_email is null then 'Belum' else mcu.status_email end status_email, mcu.respon_email, mcu.jml_email_berhasil,
				case when dg.diagnosa_manual = '1' then dg.golongan_sebab_sakit_lain else (select nama from sm_golongan_sebab_sakit where id=dg.id_golongan_sebab_sakit limit 1) end diagnosa
                FROM sm_pendaftaran pd
                JOIN sm_pasien ps on pd.id_pasien=ps.id
                JOIN sm_penjamin pj ON pj.id = pd.id_penjamin
                JOIN sm_layanan_pendaftaran lp ON pd.id = lp.id_pendaftaran
                LEFT JOIN sm_tenaga_medis tm ON lp.id_dokter=tm.id	
                LEFT JOIN sm_pegawai pg ON tm.id_pegawai=pg.id
                LEFT JOIN sm_mcu_kirim_online mcu ON pd.id = mcu.id_pendaftaran
				LEFT JOIN sm_diagnosa dg ON lp.id=dg.id_layanan_pendaftaran AND dg.prioritas='Utama'
                WHERE pd.id IS NOT NULL  AND lp.jenis_layanan='Medical Check Up'           
                $where "; // AND lp.status_terlayani != 'Batal'

        !empty($search['no_rm'])          ? $sql .= "AND ps.id ILIKE '%". $search['no_rm'] ."' " : '';
        !empty($search['no_register'])    ? $sql .= "AND pd.no_register = '". $search['no_register'] ."' " : '';
        !empty($search['nama'])           ? $sql .= "AND ps.nama ILIKE '%". $search['nama'] ."%' " : '';
        !empty($search['id_pendaftaran']) ? $sql .= "AND pd.id = '". $search['id_pendaftaran'] ."' " : '';

        $sql .= " ORDER BY pd.no_register, pd.id_pasien ASC ";

        if ($limit > 0) {
            $sql .= " LIMIT $limit OFFSET $start ";
        }        
        return $sql ;
    }

    function getListFileKirim($id_hasil_mcu)
    {
        $sql = "SELECT mcud.id, mcud.id_mcu_kirim, mcud.id_file, mcud.jenis_file, mcud.lokasi_file, mcud.kode_file, mcud.is_ready, mcud.is_kirim,
                case when mcuo.status_email is null then 'Belum' else mcuo.status_email end status_email,
                CASE WHEN TO_CHAR( mcud.tanggal_file, 'HH24:MI' ) = '00:00' THEN TO_CHAR( mcud.tanggal_file, 'DD/MM/YYYY' ) 
                    ELSE TO_CHAR( mcud.tanggal_file, 'DD/MM/YYYY HH24:MI' ) END AS tanggal_file, pg2.nama pegawai_file, mcud.created_at
                FROM sm_mcu_kirim_online_detail mcud
                JOIN sm_mcu_kirim_online mcuo ON mcud.id_mcu_kirim = mcuo.id
		        LEFT JOIN sm_pegawai pg2 ON mcud.id_user = pg2.id
                WHERE mcud.id_mcu_kirim = $id_hasil_mcu 
                ORDER BY mcud.created_at DESC ";
        return $sql ;
    }

    function getfileTerpilih($id_pendaftaran)
    {        
        $sql = "SELECT mcuo.id, mcuo.id_pendaftaran, mcuo.id_pasien, case when mcuo.status_email is null then 'Belum' else mcuo.status_email end status_email,
                mcuo.id_user, string_agg(REPLACE(mcud.lokasi_file, 'https://labrsud.tangerangkota.go.id/rsud/', 'http://10.10.10.11/rsud/'), ', ') AS lokasi_file,    
                string_agg((case when mcud.jenis_file = 'lab' then concat(REPLACE(fmk.nama_file, ' ', '_'),'_',pd.no_register,'_',(select kode from sm_laboratorium where id=mcud.id_file)) 
                                 else concat(REPLACE(fmk.nama_file, ' ', '_'),'_',pd.no_register) end ), ', ') AS nama_file,                            
				string_agg(concat('- ',fmk.nama_file), '<br>') AS jenis_file,
                ps.email, pd.tanggal_daftar tanggal_layanan, ps.nama nama_pasien,lp.id_dokter, pg.nama dokter,                
                case when dg.diagnosa_manual = '1' then dg.golongan_sebab_sakit_lain else (select nama from sm_golongan_sebab_sakit where id=dg.id_golongan_sebab_sakit limit 1) end diagnosa
                FROM sm_mcu_kirim_online mcuo
                JOIN sm_mcu_kirim_online_detail mcud ON mcuo.id=mcud.id_mcu_kirim
                JOIN sm_pendaftaran pd ON mcuo.id_pendaftaran=pd.id
                JOIN sm_layanan_pendaftaran lp ON pd.id = lp.id_pendaftaran
                LEFT JOIN sm_pasien ps ON mcuo.id_pasien=ps.id
                LEFT JOIN sm_diagnosa dg ON lp.id=dg.id_layanan_pendaftaran AND dg.prioritas='Utama'
                LEFT JOIN sm_tenaga_medis tm ON lp.id_dokter=tm.id	
                LEFT JOIN sm_pegawai pg ON tm.id_pegawai=pg.id
                LEFT JOIN sm_jenis_file_mcu_kirim fmk ON mcud.jenis_file=fmk.jenis_file
                WHERE mcuo.id_pendaftaran='".$id_pendaftaran."' AND mcud.is_kirim='1'
                GROUP BY mcuo.id,ps.email,pd.tanggal_daftar,ps.nama,dg.id, lp.id, pg.nama,ps.tanggal_lahir";
        return $sql ;

        // $sql = "SELECT mcuo.id, mcuo.id_pendaftaran, mcuo.id_pasien, case when mcuo.status_email is null then 'Belum' else mcuo.status_email end status_email,
        //         mcuo.id_user, string_agg(REPLACE(mcud.lokasi_file, 'https://labrsud.tangerangkota.go.id/rsud/', 'http://10.10.10.11/rsud/'), ', ') AS lokasi_file,    
        //         string_agg((case when mcud.jenis_file = 'lab' then concat('Hasil_Laboratorium_',pd.no_register,'_',(select kode from sm_laboratorium where id=mcud.id_file)) 
        //                          when mcud.jenis_file = 'ket_sehat' then concat('Surat_Ket_Sehat_',pd.no_register)
        //                          when mcud.jenis_file = 'ket_bebas_narkoba' then concat('Surat_Ket_Bebas_Narkoba_',pd.no_register)
        //                          else mcud.jenis_file end
        //                     ), ', ') AS nama_file,                  
		// 		string_agg((case when mcud.jenis_file = 'lab' then '- Hasil Laboratorium' 
        //                          when mcud.jenis_file = 'ket_sehat' then '- Surat Ket Sehat'
        //                          when mcud.jenis_file = 'ket_bebas_narkoba' then '- Surat Ket Bebas Narkoba'
        //                          else mcud.jenis_file end
        //                     ), '<br>') AS jenis_file,  
        //         ps.email, pd.tanggal_daftar tanggal_layanan, ps.nama nama_pasien,lp.id_dokter, pg.nama dokter,                
        //         case when dg.diagnosa_manual = '1' then dg.golongan_sebab_sakit_lain else (select nama from sm_golongan_sebab_sakit where id=dg.id_golongan_sebab_sakit limit 1) end diagnosa
        //         FROM sm_mcu_kirim_online mcuo
        //         JOIN sm_mcu_kirim_online_detail mcud ON mcuo.id=mcud.id_mcu_kirim
        //         JOIN sm_pendaftaran pd ON mcuo.id_pendaftaran=pd.id
        //         JOIN sm_layanan_pendaftaran lp ON pd.id = lp.id_pendaftaran
        //         LEFT JOIN sm_pasien ps ON mcuo.id_pasien=ps.id
        //         LEFT JOIN sm_diagnosa dg ON lp.id=dg.id_layanan_pendaftaran AND dg.prioritas='Utama'
        //         LEFT JOIN sm_tenaga_medis tm ON lp.id_dokter=tm.id	
        //         LEFT JOIN sm_pegawai pg ON tm.id_pegawai=pg.id
        //         WHERE mcuo.id_pendaftaran='".$id_pendaftaran."' AND mcud.is_kirim='1'
        //         GROUP BY mcuo.id,ps.email,pd.tanggal_daftar,ps.nama,dg.id, lp.id, pg.nama,ps.tanggal_lahir";
        // return $sql ;
    }

    function getDetailKirimMcu($id)
    {    
        $sql = "SELECT mcud.id, mcud.id_mcu_kirim, mcud.jenis_file, mcud.is_kirim, fmk.nama_file
                FROM sm_mcu_kirim_online_detail mcud
                JOIN sm_jenis_file_mcu_kirim fmk ON mcud.jenis_file=fmk.jenis_file
                WHERE mcud.id_mcu_kirim='".$id."' ";
        return $sql ;
    }

    function responEmail($id_pendaftaran, $status, $message)
    {       
        $jml_email_berhasil = $this->db->select('COALESCE(jml_email_berhasil, 0) + 1 AS jml_email_berhasil', false)->from('sm_mcu_kirim_online')->where('id_pendaftaran', $id_pendaftaran)->get()->row()->jml_email_berhasil;
        $data_where = array('id_pendaftaran' => $id_pendaftaran); 

        if ($status == 'true') {
            $data_update= array(
                'id_user'       => $this->session->userdata('id_translucent'),
                'created_email' => $this->datetime,
                'status_email'  => 'Berhasil',
                'respon_email'  => $message,
                'jml_email_berhasil' => $jml_email_berhasil
            ); 
        } else {
            $data_update= array(
                'id_user'       => $this->session->userdata('id_translucent'),
                'created_email' => $this->datetime,
                'status_email'  => 'Gagal',
                'respon_email'  => $message,
            ); 
        }
        
        $this->db->where($data_where)->update("sm_mcu_kirim_online", $data_update);

        if ($this->db->affected_rows() > 0) {
            $response = array("status" => true, "message" => 'Berhasil');
        } else {
            $response = array("status" => false, "message" => 'Gagal');
        }
        return $response;
    }

    function kirimUlang($id_hasil_mcu)
    {       
        $id_petugas  = $this->session->userdata('id_translucent');
        $created_log = $this->datetime;

        $sqlLog = "INSERT INTO sm_mcu_kirim_online_log (id_lama,id_pendaftaran,id_pasien,status_email,id_user,created_email,respon_email,jml_email_berhasil,ket_log,id_petugas,created_log)
                   SELECT id,id_pendaftaran,id_pasien,status_email,id_user,created_email,respon_email,jml_email_berhasil,'Ubah','$id_petugas','$created_log' 
                   FROM sm_mcu_kirim_online where id='$id_hasil_mcu' ";
        $this->db->query($sqlLog);
        
        $this->db->where('id', $id_hasil_mcu)->update('sm_mcu_kirim_online', ['status_email' => 'Ubah']);
        
        if ($this->db->affected_rows() > 0) {
            $response = array("status" => true, "message" => 'Berhasil');
        } else {
            $response = array("status" => false, "message" => 'Gagal');
        }
        return $response;
    }

    function hapusFile($id)
    {
        $user_log = $this->session->userdata('nama');
        $created_date_log = $this->datetime;

        // $sql = "INSERT INTO sm_jadwal_dokter_log (id_dokter, nama_dokter, id_poli, nama_poli, tanggal, shift_poli, time_start, time_end, kuota, jml_kunjung, kode_bpjs_poli, kode_bpjs_dokter, id_lama, created_date_log, user_log, status,created_date,created_user)
        // SELECT id_dokter, nama_dokter, id_poli, nama_poli, tanggal, shift_poli, time_start, time_end, kuota, jml_kunjung, kode_bpjs_poli, kode_bpjs_dokter, id, '$created_date_log' , '$user_log', 'Hapus',created_date,created_user from sm_jadwal_dokter where id = $id ";
        // $this->db->query($sql);

        return $this->db->where("id", $id)->delete("sm_mcu_kirim_online_detail");
    }
    
}
