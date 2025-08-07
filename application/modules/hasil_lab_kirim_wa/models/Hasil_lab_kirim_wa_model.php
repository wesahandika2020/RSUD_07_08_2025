<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Hasil_lab_kirim_wa_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->datetime = date('Y-m-d H:i:s');
    }

    function getListDataHasilLab($search, $start, $limit)
    {
        if ($search["jenis_tanggal"] == "keluar") {
			$tanggal = " pd.tanggal_keluar ";
        }else {            
			$tanggal = " pd.tanggal_daftar ";
        }

        $where = "";
        if (!empty($search['tanggal_awal']) && !empty($search['tanggal_akhir'])) {
            $where = "AND $tanggal BETWEEN '" . date2mysql($search['tanggal_awal']) . " 00:00:00' AND '" . date2mysql($search['tanggal_akhir']) . " 23:59:59'";
        }

        $sql = "SELECT DISTINCT pd.id, pd.no_register, pd.tanggal_daftar, pd.tanggal_keluar, pd.id_pasien, ps.nama, ps.telp, ps.email, ps.tanggal_lahir, to_char(ps.tanggal_lahir, 'DDMMYYYY') pass,
                pd.jenis_rawat, pd.jenis_pendaftaran, pd.keterangan, pd.id_penjamin, pj.nama penjamin, wa.waktu_respon , wa.waktu_kirim, wa.respon, wa.status, wa.jml_wa_berhasil,                
                wa.status_email,wa.jml_email_berhasil, pg.nama nama_user
                FROM sm_pendaftaran pd
                JOIN sm_layanan_pendaftaran lp ON pd.id = lp.id_pendaftaran
                JOIN sm_pasien ps ON pd.id_pasien = ps.id
                JOIN sm_penjamin pj ON pd.id_penjamin = pj.id
                JOIN sm_order_laboratorium olab ON (lp.id = olab.id_layanan_pendaftaran AND olab.status='konfirm')
                LEFT JOIN sm_lab_kirim_wa wa ON pd.id=wa.id_pendaftaran
	            LEFT JOIN sm_pegawai pg ON wa.id_user = pg.id
                WHERE pd.id IS NOT NULL $where ";

        !empty($search['no_rm'])          ? $sql .= "AND ps.id ILIKE '%". $search['no_rm'] ."' " : '';
        !empty($search['no_register'])    ? $sql .= "AND pd.no_register = '". $search['no_register'] ."' " : '';
        !empty($search['nama'])           ? $sql .= "AND ps.nama ILIKE '%". $search['nama'] ."%' " : '';
        !empty($search['notlp'])           ? $sql .= "AND ps.telp ILIKE '%". $search['notlp'] ."%' " : '';
        !empty($search['id_pendaftaran']) ? $sql .= "AND pd.id = '". $search['id_pendaftaran'] ."' " : '';

        !empty($search['jenis_rawat'])       ? $sql .= "AND pd.jenis_rawat = '". $search['jenis_rawat'] ."' " : '';
        !empty($search['jenis_pendaftaran']) ? $sql .= "AND pd.jenis_pendaftaran = '". $search['jenis_pendaftaran'] ."' " : '';

        if($search['status_wa'] == 'berhasil'){
            $sql .= "AND wa.status = 'Berhasil' ";
        } else if($search['status_wa'] == 'gagal'){
            $sql .= "AND wa.status = 'Gagal' ";
        } else if($search['status_wa'] == 'belum'){

            $sql .= "AND wa.status IS NULL ";
        }

        $sql .= " GROUP BY pd.id, ps.nama, ps.telp, pj.nama, ps.tanggal_lahir, wa.waktu_respon , wa.waktu_kirim, wa.respon, wa.status, pg.nama,ps.email , wa.jml_wa_berhasil,wa.status_email,wa.jml_email_berhasil
                  ORDER BY pd.no_register, pd.id_pasien ASC ";

        if ($limit > 0) {
            $sql .= " LIMIT $limit OFFSET $start ";
        }        
        return $sql ;
    }

    function getHasilLabById($id)
    {
        $sql = "SELECT DISTINCT pd.id, pd.no_register, pd.tanggal_daftar, pd.tanggal_keluar, pd.id_pasien, ps.nama, ps.telp,  ps.tanggal_lahir, to_char(ps.tanggal_lahir, 'DDMMYYYY') pass,
                pd.jenis_rawat, pd.jenis_pendaftaran, pd.id_penjamin, pj.nama penjamin
                FROM sm_pendaftaran pd
                JOIN sm_layanan_pendaftaran lp ON pd.id = lp.id_pendaftaran
                JOIN sm_pasien ps ON pd.id_pasien = ps.id
                JOIN sm_penjamin pj ON pd.id_penjamin = pj.id
                JOIN sm_order_laboratorium olab ON lp.id = olab.id_layanan_pendaftaran AND olab.status='konfirm'
                WHERE pd.id = '". $id ."' 
                GROUP BY pd.id, ps.nama, ps.telp, pj.nama, ps.tanggal_lahir ORDER BY pd.no_register, pd.id_pasien ASC ";
        return $sql ;
    }


    function getLayananLab($id){
        $sql = "SELECT lp.id, pd.id_pasien, ps.telp, ps.nama nama_pasien, pd.tanggal_daftar, lp.tanggal_layanan, lp.tanggal_periksa, ps.tanggal_lahir, to_char(ps.tanggal_lahir, 'DDMMYYYY') pass,
                CASE WHEN lp.jenis_layanan = 'Intensive Care' THEN 
                    (SELECT concat('Intensive Care ( ',bs.nama,' )') FROM sm_intensive_care ic JOIN sm_bangsal bs ON ic.id_bangsal=bs.id WHERE ic.id_layanan_pendaftaran=lp.id) 
                ELSE lp.jenis_layanan END ruangan,
                lab.waktu_konfirm, olab.jenis, olab.status, lab.status_hasil, lab.kode, olab.item, wad.id_lab_wa, wad.id id_labdt_wa, COALESCE (wad.is_exist, '0' ) is_exist, COALESCE (wad.is_kirim, '0' ) is_kirim,
                (SELECT CASE WHEN elem->>'cito' = 'ya' THEN 1 ELSE 0 END AS is_cito FROM sm_order_laboratorium, jsonb_array_elements(item::jsonb) AS elem where elem->>'cito' = 'ya' AND id = olab.id limit 1) is_cito
                FROM sm_order_laboratorium olab 
                JOIN sm_layanan_pendaftaran lp ON olab.id_layanan_pendaftaran=lp.id
                LEFT JOIN sm_laboratorium lab ON olab.id = lab.id_order_laboratorium 
                JOIN sm_pendaftaran pd ON pd.id = lp.id_pendaftaran
                JOIN sm_pasien ps ON pd.id_pasien = ps.id
                LEFT JOIN sm_lab_kirim_wa_detail wad ON wad.kode = lab.kode 
                WHERE lp.id_pendaftaran = '".$id."' ORDER BY lab.waktu_konfirm DESC " ;
                // olab.status != 'batal' AND lab.status_hasil != 'Batal' AND 
        return $sql;
    }

    function getPendaftaranById($id)
    {
        $this->db->select(" *,(SELECT id FROM sm_layanan_pendaftaran where id_pendaftaran='" . $id . "' and konsul=0 ORDER BY id ASC limit 1) id_layanan_pendaftaran,
                              (SELECT ps.telp FROM sm_pendaftaran pd JOIN sm_pasien ps ON pd.id_pasien=ps.id  where pd.id='" . $id . "' ORDER BY ps.id ASC limit 1) telp ", true);
        $this->db->from('sm_pendaftaran');
        $this->db->where('id', $id, true);
        return $this->db->get()->row();
    }

    public function getLabWaByIdPend($id_pendaftaran)
	{
		return $this->db->from('sm_lab_kirim_wa')->where('id_pendaftaran', $id_pendaftaran)->get()->row();
	}

    public function getLabWaByIdPendBerhasil($id_pendaftaran)
    {
        return $this->db->from('sm_lab_kirim_wa')->where('id_pendaftaran', $id_pendaftaran)->where('status', 'Berhasil')->get()->row();
    }

    public function getFileDetailById($id_lab_wa)
	{
		return $this->db->from('sm_lab_kirim_wa_detail')->where('id_lab_wa', $id_lab_wa)->get()->result();
	}

    function getfileTerpilih($id_pendaftran)
    {
    
        $sql = "SELECT lwd.*, pd.no_register, pd.id_pasien, ps.telp, ps.nama nama_pasien, pd.tanggal_daftar, ps.tanggal_lahir, to_char(ps.tanggal_lahir, 'DDMMYYYY') pass
                FROM sm_lab_kirim_wa_detail lwd
                JOIN sm_lab_kirim_wa lw ON lwd.id_lab_wa=lw.id
                JOIN sm_pendaftaran pd ON pd.id = lw.id_pendaftaran
                JOIN sm_pasien ps ON pd.id_pasien = ps.id
                WHERE lwd.is_kirim='1' AND lw.id_pendaftaran = '".$id_pendaftran."' ";
        return $sql ;
    }

    function responKirimLabWa($id_pendaftaran, $status, $respon)
    {       
        $jml_wa_berhasil = $this->db->select('COALESCE(jml_wa_berhasil, 0) + 1 AS jml_wa_berhasil', false)->from('sm_lab_kirim_wa')->where('id_pendaftaran', $id_pendaftaran)->get()->row()->jml_wa_berhasil;

        $data_where = array(
            'id_pendaftaran' => $id_pendaftaran,
        ); 
        $data_update= array(
            'waktu_respon' => $this->datetime,
            'status'       => $status == 'true' ? 'Berhasil' : 'Gagal',
            'respon'       => $respon,
            'jml_wa_berhasil' => $jml_wa_berhasil
        ); 
        $this->db->where($data_where)->update("sm_lab_kirim_wa", $data_update);

        if ($this->db->affected_rows() > 0) {
            $response = array("status" => true, "message" => 'Berhasil');
        } else {
            $response = array("status" => false, "message" => 'Gagal');
        }
        return $response;
    }

    function responKirimLabEmail($id_pendaftaran, $status_email, $respon_email)
    {       
        $jml_email_berhasil = $this->db->select('COALESCE(jml_email_berhasil, 0) + 1 AS jml_email_berhasil', false)->from('sm_lab_kirim_wa')
                            ->where('id_pendaftaran', $id_pendaftaran)->get()->row()->jml_email_berhasil;

        $data_where = array(
            'id_pendaftaran' => $id_pendaftaran,
        ); 
        $data_update= array(
            'waktu_respon_email' => $this->datetime,
            'status_email' => $status_email == 'true' ? 'Berhasil' : 'Gagal',
            'respon_email' => $respon_email,
            'jml_email_berhasil' => $jml_email_berhasil
        ); 
        $this->db->where($data_where)->update("sm_lab_kirim_wa", $data_update);

        if ($this->db->affected_rows() > 0) {
            $response = array("status" => true, "message" => 'Berhasil');
        } else {
            $response = array("status" => false, "message" => 'Gagal');
        }
        return $response;
    }

    function updateKirimFile($data)

	{

        $sqlLog = "INSERT INTO sm_lab_kirim_wa_detail_log (id_lama, id_lab_wa, id_pasien, kode, is_exist, is_kirim, id_user, waktu)
                    SELECT id, id_lab_wa, id_pasien, kode, is_exist, is_kirim, id_user, waktu FROM sm_lab_kirim_wa_detail where id = " . $data['id_labdt_wa'] ;
                    $this->db->query($sqlLog); 

		if ($data['is_kirim'] == 1) {
			$this->db->where('id', $data['id_labdt_wa'], true);
			$this->db->update('sm_lab_kirim_wa_detail', ['is_kirim' => 0]);
		} else if ($data['is_kirim'] == 0) {
			$this->db->where('id', $data['id_labdt_wa'], true);
			$this->db->update('sm_lab_kirim_wa_detail', ['is_kirim' => 1]);
		}
		return $this->db->affected_rows();
	}

	// 'http://10.10.10.11/rsud/'.$val->id_pasien.'_'.$val->kode.'.pdf';
    // https://labrsud.tangerangkota.go.id/rsud/
	
    function dataKirimById($id){
        $sql = "SELECT ps.email, pd.tanggal_daftar tanggal_layanan, ps.nama nama_pasien, ps.id id_pasien,
                       string_agg(concat('http://10.10.10.11/rsud/',labd.id_pasien,'_',labd.kode,'.pdf'), ', ') AS lokasi_file,
                       pd.no_register, to_char(ps.tanggal_lahir, 'DDMMYYYY') tanggal_lahir
                FROM sm_lab_kirim_wa_detail labd
                JOIN sm_lab_kirim_wa lab ON labd.id_lab_wa=lab.id
                JOIN sm_pendaftaran pd ON pd.id=lab.id_pendaftaran
                JOIN sm_pasien ps ON pd.id_pasien=ps.id
                WHERE lab.id_pendaftaran = $id AND labd.is_kirim = '1'
                GROUP BY ps.email, pd.tanggal_daftar, ps.nama, ps.id, pd.no_register, ps.tanggal_lahir " ;
        return $sql;
    }
}
