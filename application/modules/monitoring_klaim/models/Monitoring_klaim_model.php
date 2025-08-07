<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Monitoring_klaim_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->datetime = date('Y-m-d H:i:s');
    }

    function downloadKlaim($data)
    {
        if($data['nosep'] != NULL){	
            $data['peserta_nama'] = str_replace("'", '"', $data['peserta_nama']);
            $sql = "INSERT INTO sm_monitoring_klaim (nosep,tgl_sep,tgl_pulang,jenis_pelayanan,status,status_klaim,kelas_rawat,nofpk,poli,
                            peserta_norm,peserta_nama,peserta_nokartu,inacbg_kode,inacbg_nama,biaya_pengajuan,biaya_setujui,biaya_tarif_gruper,biaya_tarif_rs,biaya_topup,created_date) 
                            VALUES ('".$data['nosep']."','".$data['tgl_sep']."','".$data['tgl_pulang']."','".$data['jenis_pelayanan']."','".$data['status']."','".$data['status_klaim']."','".$data['kelas_rawat']."','".$data['nofpk']."',
                            '".$data['poli']."','".$data['peserta_norm']."','".$data['peserta_nama']."','".$data['peserta_nokartu']."','".$data['inacbg_kode']."','".$data['inacbg_nama']."','".$data['biaya_pengajuan']."',
                            '".$data['biaya_setujui']."','".$data['biaya_tarif_gruper']."','".$data['biaya_tarif_rs']."','".$data['biaya_topup']."','".$this->datetime."')
                        ON CONFLICT (nosep) DO UPDATE 
                            SET nosep = '".$data['nosep']."',tgl_sep = '".$data['tgl_sep']."',tgl_pulang = '".$data['tgl_pulang']."',jenis_pelayanan = '".$data['jenis_pelayanan']."',status = '".$data['status']."',
                            status_klaim = '".$data['status_klaim']."',kelas_rawat = '".$data['kelas_rawat']."',nofpk = '".$data['nofpk']."',poli = '".$data['poli']."',peserta_norm = '".$data['peserta_norm']."',
                            peserta_nama = '".$data['peserta_nama']."',peserta_nokartu = '".$data['peserta_nokartu']."',inacbg_kode = '".$data['inacbg_kode']."',inacbg_nama = '".$data['inacbg_nama']."',biaya_pengajuan = '".$data['biaya_pengajuan']."',
                            biaya_setujui = '".$data['biaya_setujui']."',biaya_tarif_gruper = '".$data['biaya_tarif_gruper']."',biaya_tarif_rs = '".$data['biaya_tarif_rs']."',biaya_topup = '".$data['biaya_topup']."',updated_date = '".$this->datetime."' ";
            $status = $this->db->query($sql);
            $message = 'Berhasil Download Monitoring Klaim';	
        } else {
            $status  = false;
            $message = 'Tidak ada data Monitoring Klaim';
        }
        return array('status' => $status, 'tanggal' => $data['tanggal'], 'jenis_pelayanan' => $data['jenis_pelayanan'], 'status_klaim' => $data['status_klaim'], 'message' => $message);
    }

    function getListMonitoringKlaim($search)
    {
		
		$this->db->select(" *",false);
        $this->db->from('sm_monitoring_klaim');
        
        if ($search['tanggal'] !== '') :
            $this->db->where('tgl_pulang', $search['tanggal']);
        endif;

        if ($search['jenis_pelayanan'] !== '') :
            $this->db->where('jenis_pelayanan', $search['jenis_pelayanan']);
        endif;

        if ($search['status_klaim'] !== '') :
            $this->db->where('status_klaim', $search['status_klaim']);
        endif;
        return $this->db->get()->result();
        
    }
}