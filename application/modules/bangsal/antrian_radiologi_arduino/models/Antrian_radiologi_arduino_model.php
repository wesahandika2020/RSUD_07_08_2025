<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Antrian_radiologi_arduino_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->datetime = date('Y-m-d H:i:s');
        $this->date     = date('Y-m-d');
    }

    function getCallArduino($ruang,$user)
    {
        $sqlJmlTunda = "SELECT count(*) jml FROM sm_tunda_panggilan_radiologi where status_panggil='1' and jenis_panggil='Call'
                        and to_char(waktu_panggil,'YYYY-MM-DD')='".date('Y-m-d')."' and id_ruang_radiologi='".$ruang."' ";
        $jmlTunda    = $this->db->query($sqlJmlTunda)->row()->jml;

        //Cek Jml > 6
        if($jmlTunda > 6){
            $respon = False;

        } else {  
            $respon = False;
            // get id antrian terlama (awal)
            $sqlUrutan  = "SELECT id id_antrian FROM sm_antrian_radiologi where to_char(tanggal_kunjungan,'YYYY-MM-DD')='".date('Y-m-d')."' and id_ruang_radiologi='".$ruang."' and (jumlah_panggil is null or jumlah_panggil=0)  order by urutan asc limit 1"; 
            $id_antrian =  $this->db->query($sqlUrutan)->row()->id_antrian ?? NULL;
            
            if($id_antrian != NULL){
                //cek sudah pernah di panggil
                $sqlCekAda = "SELECT count(*) jml FROM sm_tunda_panggilan_radiologi where status_panggil='1' and to_char(waktu_panggil,'YYYY-MM-DD')='".date('Y-m-d')."' and id_ruang_radiologi='".$ruang."' and id_antrian='".$id_antrian."' ";
                $cekAda    =  $this->db->query($sqlCekAda)->row()->jml;
                
                if($cekAda>=1){
                    $respon = False;
    
                } else {
                    $respon    = True;
                    $sqlInsert = "INSERT INTO sm_tunda_panggilan_radiologi (id_antrian, id_ruang_radiologi, waktu_panggil, jenis_panggil, status_panggil,nama_user,created_date)        
                                  SELECT '".$id_antrian."', '".$ruang."', '".$this->datetime."', 'Call', '1' ,'".$user."','".$this->datetime."' ";
                    $this->db->query($sqlInsert);
                }
            }
        }
        return $respon;
    }
    
    function getReCallArduino($ruang,$user)
    {
        //cek sudah pernah di panggil
        $sqlCekAda  = "SELECT id_antrian FROM sm_tunda_panggilan_radiologi where status_panggil='0'
                       and to_char(waktu_panggil,'YYYY-MM-DD')='".date('Y-m-d')."' and id_ruang_radiologi='".$ruang."' order by id_antrian desc limit 1 ";
        $id_antrian =  $this->db->query($sqlCekAda)->row()->id_antrian ?? NULL;

        $sqlCekAktif = "SELECT count(*) jml FROM sm_tunda_panggilan_radiologi where status_panggil='1' and to_char(waktu_panggil,'YYYY-MM-DD')='".date('Y-m-d')."' and id_ruang_radiologi='".$ruang."' ";
        $CekAktif    =  $this->db->query($sqlCekAktif)->row()->jml;

        if($CekAktif>=1){
            $respon = False;
        } else {
            if($id_antrian != NULL){
                $respon    = True;
                $update    = array( 'status_panggil' => '1', 
                                    'jenis_panggil'  => 'ReCall', 
                                    'nama_user'      => $user, 
                                    'created_date'   => $this->datetime);
                $this->db->where('id_antrian', $id_antrian)->update('sm_tunda_panggilan_radiologi', $update);
            } else {
                $respon = False;
            }
        }

        return $respon;
    }

    function getTundaPanggilan($ruang)
    {
        // $this->db->trans_begin();
        $sql = "INSERT INTO sm_tunda_panggilan_radiologi (id_antrian, waktu_panggil, status_panggil,created_date)        
                select id,'".$this->datetime."','1','".$this->datetime."' from sm_antrian_radiologi 
                where to_char(tanggal_kunjungan,'YYYY-MM-DD')=to_char(NOW(),'YYYY-MM-DD')
                and jumlah_panggil is null and id_ruang_radiologi='" . $ruang . "' 
                order by kode_ruangan asc, urutan asc limit 1";

                return $this->db->query($sql);

        // if ($this->db->trans_status() === false) :
        //     return $this->db->trans_rollback();
        // else :
        //     return $this->db->trans_commit();
        // endif;
    }
}
