<?php

defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Hasil_mcu_kirim_online extends REST_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->limit = 10;
        $this->load->model('Hasil_mcu_kirim_online_model', 'm_hmcu');        
        $this->load->model('medical_check_up/Medical_check_up_model', 'm_mcu');
        $this->load->model('cloud_rsud/Cloud_rsud_model', 'cloud_rsud');
        $this->datetime = date('Y-m-d H:i:s');
        $this->datetime_file = date('YmdHis');
        $this->id_translucent = $this->session->userdata('id_translucent');
        $this->server_esign = '';
        if (empty( $this->id_translucent)) :
            $this->response(array('error' => 'Anda belum login'), REST_Controller::HTTP_UNAUTHORIZED);
            exit();
        endif;

        $this->cloud_config = (object) [
            'server'     => 'http://192.168.77.101/api/file-upload/',
            'user_key'   => '80d402801bf7653318ee305235880de8'
        ];
		
		//development / production_testing / production / prod_testing
		$this->status_esign = 'development';
    }

    function get_list_mcu_get()
    {
        $page = $this->get('page');
        if (!$page) {
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // 400
            return;
        }

        $start = ($page - 1) * $this->limit;
        $search = [            
			'jenis_tanggal' => safe_get('jenis_tanggal'),
            'tanggal_awal'  => safe_get('tanggal_awal'),
            'tanggal_akhir' => safe_get('tanggal_akhir'),
            'no_rm'         => safe_get('no_rm'),
            'no_register'   => safe_get('no_register'),
            'nama'          => safe_get('nama'),
            'status_kirim'  => safe_get('status_kirim')
        ];    
        
        $data = $this->db->query($this->m_hmcu->getListDataMcu($search, $start, $this->limit))->result();
        foreach ($data as $value) {
            $data_detail = [];
            if (!empty($value->id_hasil_mcu)) {
                $data_detail = $this->db->query($this->m_hmcu->getDetailKirimMcu($value->id_hasil_mcu))->result();
            }
            $value->data_detail  = $data_detail;

        }
        $response = [
            'jumlah'=> $this->db->query($this->m_hmcu->getListDataMcu($search, 0, 0))->num_rows(), 
            'data'  => $data,
            'page'  => (int) $page,
            'limit' => $this->limit,            
        ];

        $this->response($response, REST_Controller::HTTP_OK);
    }

    function get_data_hasil_mcu_get()
    {
        $page = $this->get('page');
    }

    function add_data_hasil_mcu_get()
    {
        $id_pendaftaran = $this->get('id');
        $id_pasien      = $this->get('id_pasien');

        $cek_id_mcu_kirim = $this->db->select("*")->from('sm_mcu_kirim_online')->where('id_pendaftaran', $id_pendaftaran, true)->get()->row();
        $id_mcu_kirim = $cek_id_mcu_kirim ? $cek_id_mcu_kirim->id : null;

        if($id_mcu_kirim !== null){
            $status  = TRUE;
            $message = 'Data detail MCU sudah ada';
            $id_hasil_mcu = $id_mcu_kirim; 
        } else {
            $insert = array(
                'id_pendaftaran' => $id_pendaftaran,
                'id_pasien'      => $id_pasien, 
            );
            $this->db->insert('sm_mcu_kirim_online', $insert);
            $id_hasil_mcu = $this->db->insert_id();
            
            if ($this->db->trans_status() === FALSE) :
                $this->db->trans_rollback();
                $status  = FALSE;
                $message = 'Gagal menambahkan data hasil MCU';
                $id_hasil_mcu = null;
            else :
                $this->db->trans_commit();
                $status  = TRUE;
                $message = 'Berhasil menambahkan data hasil MCU';
                $id_hasil_mcu = $id_hasil_mcu;
            endif;
        }
        
        $this->response(array('status' => $status, 'message' => $message, 'id_hasil_mcu' => $id_hasil_mcu), REST_Controller::HTTP_OK);            
    }

    function get_data_kirim_email_get()
    {
        $id_pendaftaran   = $this->get('id');
        $cek_id_mcu_kirim = $this->db->select("mcuo.id, mcuo.id_pendaftaran, mcuo.id_pasien, case when mcuo.status_email is null then 'Belum' else mcuo.status_email end status_email,  
                                               mcuo.jml_email_berhasil, mcuo.respon_email,  mcuo.id_user, pg.nama AS pegawai, mcuo.created_email")
                                     ->from('sm_mcu_kirim_online mcuo')
                                     ->join('sm_pegawai pg', 'mcuo.id_user = pg.id', 'left')
                                     ->where('mcuo.id_pendaftaran', $id_pendaftaran)->get()->row();
        $id_mcu_kirim = $cek_id_mcu_kirim ? $cek_id_mcu_kirim->id : null;

        if($id_mcu_kirim !== null){
            $respon = ['status'       => TRUE,
                       'status_email' => $cek_id_mcu_kirim->status_email,
                       'jml_email_berhasil' => $cek_id_mcu_kirim->jml_email_berhasil,
                       'respon_email' => $cek_id_mcu_kirim->respon_email,
                       'pegawai'      => $cek_id_mcu_kirim->pegawai,
                       'created_email'=> $cek_id_mcu_kirim->created_email];
        } else {
            $respon = ['status' => FALSE, 'status_email' => null, 'jml_email_berhasil' => null, 'respon_email' => null, 'pegawai' => null, 'created_email'  => null];
        }
        
        $this->response($respon, REST_Controller::HTTP_OK);            
    }

    function createdDomPDF($html, $upload_path, $nama_dokumen)
    {
        $this->load->library('download_pdf');
        $this->download_pdf->generatePdf($html, $upload_path, $nama_dokumen);
        return true;
    }

    // http://localhost/simrs.tangerangkota.go.id.site_prod/hasil_mcu_kirim_online/api/hasil_mcu_kirim_online/get_all_file?id_pendaftaran=676881
    // http://localhost/simrs.tangerangkota.go.id.site_prod/hasil_mcu_kirim_online/api/hasil_mcu_kirim_online/get_all_file?id_pendaftaran=626803
    function get_all_file_get()
    {
        $id_pendaftaran   = $this->get('id_pendaftaran_detail');
        $data = $this->db->select('*')->from('sm_jenis_file_mcu_kirim')->where('is_aktif', '1')->order_by('id', 'asc')->get()->result();
        $result_data = [];

        foreach ($data as $value) {
            $jenis_file      = $this->db->escape_str($value->jenis_file);
            $table           = $this->db->escape_str($value->nama_tabel);
            $field_id_dokter = $this->db->escape_str($value->field_id_dokter);
            $field_tgl_form  = $this->db->escape_str($value->field_tgl_form);
            $field_id        = $this->db->escape_str($value->field_id);
            $nama_file       = $this->db->escape_str($value->nama_file);
            $is_esign        = $this->db->escape_str($value->is_esign);

            if($is_esign != '1'){

                if($field_id == 'id_pendaftaran'){
                    $sql = "SELECT '{$jenis_file}' AS jenis_form, '{$nama_file}' AS nama_file, '{$is_esign}' AS is_file_esign,  '' id_dokter, '' nama_dokter, '' id_pegawai, '' nik, '' tgl_form, mcuk.*
                            FROM {$table} fm
                            LEFT JOIN (SELECT mcuo.id_pendaftaran, mcud.*, pg.nama AS pegawai_file
                                        FROM sm_mcu_kirim_online mcuo 
                                        LEFT JOIN sm_mcu_kirim_online_detail mcud ON mcud.id_mcu_kirim=mcuo.id
                                        LEFT JOIN sm_pegawai pg ON mcud.id_user = pg.id WHERE mcuo.id_pendaftaran=$id_pendaftaran
                                    ) mcuk ON (mcuk.id_pendaftaran=fm.id_pendaftaran AND mcuk.jenis_file='{$jenis_file}')
                            WHERE fm.id_pendaftaran = $id_pendaftaran ";
                } else {                
                    $sql = "SELECT '{$jenis_file}' AS jenis_form, '{$nama_file}' AS nama_file, '{$is_esign}' AS is_file_esign, '' id_dokter, '' nama_dokter, '' id_pegawai, '' nik, '' tgl_form, mcuk.*
                            FROM {$table} fm
                            JOIN sm_layanan_pendaftaran lp ON fm.id_layanan_pendaftaran=lp.id
                            JOIN sm_pendaftaran pd ON lp.id_pendaftaran=pd.id
                            LEFT JOIN (SELECT mcuo.id_pendaftaran, mcud.*, pg.nama AS pegawai_file
                                        FROM sm_mcu_kirim_online mcuo 
                                        LEFT JOIN sm_mcu_kirim_online_detail mcud ON mcud.id_mcu_kirim=mcuo.id
                                        LEFT JOIN sm_pegawai pg ON mcud.id_user = pg.id WHERE mcuo.id_pendaftaran=$id_pendaftaran
                                    ) mcuk ON (mcuk.id_pendaftaran=pd.id AND mcuk.jenis_file='{$jenis_file}')
                            WHERE pd.id = $id_pendaftaran ";
                }

            } else {            
                if($field_id == 'id_pendaftaran'){
                    $sql = "SELECT '{$jenis_file}' AS jenis_form, '{$nama_file}' AS nama_file, '{$is_esign}' AS is_file_esign,  fm.{$field_id_dokter} AS id_dokter, pg.nama nama_dokter, pg.id id_pegawai, pg.nik, fm.{$field_tgl_form} AS tgl_form, mcuk.*
                            FROM {$table} fm
                            JOIN sm_tenaga_medis tm ON fm.{$field_id_dokter} = tm.id
                            JOIN sm_pegawai pg ON tm.id_pegawai = pg.id
                            LEFT JOIN (SELECT mcuo.id_pendaftaran, mcud.*, pg.nama AS pegawai_file
                                        FROM sm_mcu_kirim_online mcuo 
                                        LEFT JOIN sm_mcu_kirim_online_detail mcud ON mcud.id_mcu_kirim=mcuo.id
                                        LEFT JOIN sm_pegawai pg ON mcud.id_user = pg.id WHERE mcuo.id_pendaftaran=$id_pendaftaran
                                    ) mcuk ON (mcuk.id_pendaftaran=fm.id_pendaftaran AND mcuk.jenis_file='{$jenis_file}')
                            WHERE fm.id_pendaftaran = $id_pendaftaran ";
                } else {                
                    $sql = "SELECT '{$jenis_file}' AS jenis_form, '{$nama_file}' AS nama_file, '{$is_esign}' AS is_file_esign, fm.{$field_id_dokter} AS id_dokter, pg.nama nama_dokter, pg.id id_pegawai, pg.nik, fm.{$field_tgl_form} AS tgl_form, mcuk.*
                            FROM {$table} fm
                            JOIN sm_layanan_pendaftaran lp ON fm.id_layanan_pendaftaran=lp.id
                            JOIN sm_pendaftaran pd ON lp.id_pendaftaran=pd.id
                            JOIN sm_tenaga_medis tm ON fm.{$field_id_dokter} = tm.id
                            JOIN sm_pegawai pg ON tm.id_pegawai = pg.id
                            LEFT JOIN (SELECT mcuo.id_pendaftaran, mcud.*, pg.nama AS pegawai_file
                                        FROM sm_mcu_kirim_online mcuo 
                                        LEFT JOIN sm_mcu_kirim_online_detail mcud ON mcud.id_mcu_kirim=mcuo.id
                                        LEFT JOIN sm_pegawai pg ON mcud.id_user = pg.id WHERE mcuo.id_pendaftaran=$id_pendaftaran
                                    ) mcuk ON (mcuk.id_pendaftaran=pd.id AND mcuk.jenis_file='{$jenis_file}')
                            WHERE pd.id = $id_pendaftaran ";
                }
            }

            $query = $this->db->query($sql);

            foreach ($query->result() as $row) {
                $result_data[] = $row;
            }
        }

        $response = [
            'jumlah'=> count($result_data), 
            'data'  => $result_data           
        ];
        $this->response($response, REST_Controller::HTTP_OK);



    }

    function get_mcu_detail_get()
    {
        $get_file       = false;
        $jenis_file     = $this->get('jenis_file');
        $id_pendaftaran = safe_get('id_pendaftaran_detail');
        $id_layanan_pendaftaran = safe_get('id_layanan_pendaftaran_detail');
        $id_dokter      = null;
        $nama_dokter    = null;
        $nik_dokter     = null;
        $tgl_form       = null;
        $cek_form = $this->db->select('mcud.jenis_file')
                             ->from('sm_mcu_kirim_online mcuo')
                             ->join('sm_mcu_kirim_online_detail mcud', 'mcuo.id = mcud.id_mcu_kirim')
                             ->where(['mcuo.id_pendaftaran' => $id_pendaftaran,'mcud.jenis_file' => $jenis_file])->get()->row();

        // 2.Surat Keterangan Pengujian Kesehatan  
        if($jenis_file == 'ket_uji_sehat'){
            $get_file = $this->db->select("fm.id_dokter id_dokter, pg.nama, pg.nik, fm.tanggal_diperiksa_skpk tgl_form")
                                ->from('sm_form_skpk fm')
                                ->join('sm_tenaga_medis tm', 'fm.id_dokter = tm.id')
                                ->join('sm_pegawai pg', 'tm.id_pegawai = pg.id')
                                ->where('fm.id_pendaftaran', $id_pendaftaran)->get()->row();  

        // 3.Keterangan Sehat   
        } else if($jenis_file == 'ket_sehat'){
            $get_file = $this->db->select("sks.id_dokter_sks id_dokter, pg.nama, pg.nik, sks.tanggal_periksa_sks tgl_form")
                                ->from('sm_form_sks sks')
                                ->join('sm_layanan_pendaftaran lp', 'sks.id_layanan_pendaftaran=lp.id')
                                ->join('sm_pendaftaran pd', 'lp.id_pendaftaran=pd.id')
                                ->join('sm_tenaga_medis tm', 'sks.id_dokter_sks = tm.id')
                                ->join('sm_pegawai pg', 'tm.id_pegawai = pg.id')
                                ->where('pd.id', $id_pendaftaran)->get()->row();            

        // 4.Keterangan Bebas Narkoba  
        } else if($jenis_file == 'ket_bebas_narkoba'){
            $get_file = $this->db->select("sn.id_dokter_narkoba id_dokter, pg.nama, pg.nik, sn.tanggal_pemeriksaan tgl_form")
                                ->from('sm_surat_narkoba sn')
                                ->join('sm_layanan_pendaftaran lp', 'sn.id_layanan_pendaftaran=lp.id')
                                ->join('sm_pendaftaran pd', 'lp.id_pendaftaran=pd.id')
                                ->join('sm_tenaga_medis tm', 'sn.id_dokter_narkoba = tm.id')
                                ->join('sm_pegawai pg', 'tm.id_pegawai = pg.id')
                                ->where('pd.id', $id_pendaftaran)->get()->row();        
                       
        // 5.Resume Medis Pasien  
        } else if($jenis_file == 'resum_medis'){
            $get_file = $this->db->select("fm.mcu_dokter id_dokter, pg.nama, pg.nik, fm.mcu_tanggal_surat tgl_form")
                                ->from('sm_resume_medis fm')
                                ->join('sm_tenaga_medis tm', 'fm.mcu_dokter = tm.id')
                                ->join('sm_pegawai pg', 'tm.id_pegawai = pg.id')
                                ->where('fm.id_layanan_pendaftaran', $id_layanan_pendaftaran)->get()->row();   

        // 6.Surat Keterangan Kesehatan Jiwa Tipe 1  
        } else if($jenis_file == 'ket_kesehatan_jiwa1'){
            $get_file = $this->db->select("fm.dokter_skkj_1 id_dokter, pg.nama, pg.nik, fm.tanggal_skkj_1 tgl_form")
                                ->from('sm_form_skkj_1 fm')
                                ->join('sm_tenaga_medis tm', 'fm.dokter_skkj_1 = tm.id')
                                ->join('sm_pegawai pg', 'tm.id_pegawai = pg.id')
                                ->where('fm.id_layanan_pendaftaran', $id_layanan_pendaftaran)->get()->row();   

        // 7.Surat Keterangan Kesehatan Jiwa Tipe 2  
        } else if($jenis_file == 'ket_kesehatan_jiwa2'){
            $get_file = $this->db->select("fm.dokter_skkj_2 id_dokter, pg.nama, pg.nik, fm.tanggal_skkj_2 tgl_form")
                                ->from('sm_form_skkj_2 fm')
                                ->join('sm_tenaga_medis tm', 'fm.dokter_skkj_2 = tm.id')
                                ->join('sm_pegawai pg', 'tm.id_pegawai = pg.id')
                                ->where('fm.id_layanan_pendaftaran', $id_layanan_pendaftaran)->get()->row();         

        // 8.Surat Keterangan Kesehatan Jiwa Tipe 3 
        } else if($jenis_file == 'ket_kesehatan_jiwa3'){
            $get_file = $this->db->select("fm.dokter_skkj_3 id_dokter, pg.nama, pg.nik, fm.tanggal_skkj_3 tgl_form")
                                ->from('sm_form_skkj_3 fm')
                                ->join('sm_tenaga_medis tm', 'fm.dokter_skkj_3 = tm.id')
                                ->join('sm_pegawai pg', 'tm.id_pegawai = pg.id')
                                ->where('fm.id_layanan_pendaftaran', $id_layanan_pendaftaran)->get()->row();      
                                
        // 9.Sertifikat Kelaikan Bekerja
        } else if($jenis_file == 'kelaikan_berkerja'){    
            $get_file = $this->db->select("fm.dokter_sepesialis_skb id_dokter, pg.nama, pg.nik, fm.kb_tanggal tgl_form")
                                ->from('sm_mcu_16_00 fm')
                                ->join('sm_tenaga_medis tm', 'fm.dokter_sepesialis_skb = tm.id')
                                ->join('sm_pegawai pg', 'tm.id_pegawai = pg.id')
                                ->where('fm.id_layanan_pendaftaran', $id_layanan_pendaftaran)->get()->row();    

        // 10.Laporan Pemeriksaan Kesehatan
        } else if($jenis_file == 'pemeriksaaan_kesehatan'){    
            $get_file = $this->db->select("fm.lpk_dokter id_dokter, pg.nama, pg.nik, fm.lpk_tanggal tgl_form")
                                ->from('sm_mcu_18_00 fm')
                                ->join('sm_tenaga_medis tm', 'fm.lpk_dokter = tm.id')
                                ->join('sm_pegawai pg', 'tm.id_pegawai = pg.id')
                                ->where('fm.id_layanan_pendaftaran', $id_layanan_pendaftaran)->get()->row();         

        //11.Surat Keterangan Medis
        } else if($jenis_file == 'ket_medis'){   
            $get_file = $this->db->select("fm.dokter_skm id_dokter, pg.nama, pg.nik, fm.tanggal_skm tgl_form")
                                ->from('sm_form_skm fm')
                                ->join('sm_tenaga_medis tm', 'fm.dokter_skm = tm.id')
                                ->join('sm_pegawai pg', 'tm.id_pegawai = pg.id')
                                ->where('fm.id_layanan_pendaftaran', $id_layanan_pendaftaran)->get()->row();     
        
        //12.Surat Keterangan Disabilitas
        } else if($jenis_file == 'ket_disabilitas'){    
            $get_file = $this->db->select("fm.dokterskd id_dokter, pg.nama, pg.nik, fm.tanggalskd tgl_form")
                                ->from('sm_surat_keterangan_disabilitas fm')
                                ->join('sm_tenaga_medis tm', 'fm.dokterskd = tm.id')
                                ->join('sm_pegawai pg', 'tm.id_pegawai = pg.id')
                                ->where('fm.id_layanan_pendaftaran', $id_layanan_pendaftaran)->get()->row();   


        //13.Surat Keterangan Tidak Disabilitas
        } else if($jenis_file == 'ket_tidak_disabilitas'){  
            $get_file = $this->db->select("fm.doktersktd id_dokter, pg.nama, pg.nik, fm.tanggalsktd tgl_form")
            ->from('sm_surat_keterangan_tidak_disabilitas fm')
            ->join('sm_tenaga_medis tm', 'fm.doktersktd = tm.id')
            ->join('sm_pegawai pg', 'tm.id_pegawai = pg.id')
            ->where('fm.id_layanan_pendaftaran', $id_layanan_pendaftaran)->get()->row(); 

        //14.Hasil Pemeriksaan Dokter Okupasi
        } else if($jenis_file == 'hasil_okupasi'){  
            $get_file = $this->db->select("fm.dokter_hpdo id_dokter, pg.nama, pg.nik, fm.tanggal_hpdo tgl_form")
                                ->from('sm_hasil_pemeriksaan_dokter_okupasih fm')
                                ->join('sm_tenaga_medis tm', 'fm.dokter_hpdo = tm.id')
                                ->join('sm_pegawai pg', 'tm.id_pegawai = pg.id')
                                ->where('fm.id_layanan_pendaftaran', $id_layanan_pendaftaran)->get()->row();  
        }

        if ($get_file) {
            $id_dokter   = $get_file->id_dokter;
            $nama_dokter = $get_file->nama;
            $nik_dokter  = $get_file->nik;
            $tgl_form    = $get_file->tgl_form;
        }

        $response = [
            'status'      => (bool) $cek_form,
            'message'     => $cek_form ? 'Form sudah ada' : 'Form belum ada',
            'id_dokter'   => $id_dokter,
            'nama_dokter' => $nama_dokter,
            'nik_dokter'  => $nik_dokter,
            'tgl_form'    => $tgl_form,
        ];
    
        $this->response($response, REST_Controller::HTTP_OK);
            
    }

    

    function tambah_file_get()
    {
        $createdDomPDF  = false;
        $jenis_file     = $this->get('jenis_file');
        $nik            = $this->get('nik');
        $tglform        = $this->get('tglform');
        $passphrase     = safe_get('passphrase_detail');
        $id_hasil_mcu   = safe_get('id_hasil_mcu_detail');
        $id_pendaftaran = safe_get('id_pendaftaran_detail');
        $id_layanan_pendaftaran = safe_get('id_layanan_pendaftaran_detail');

        if($jenis_file !== 'lab'){
            // $data['pasien'] = $this->db->select("lp.*, pd.id_pasien, (p.nama) as nama_pasien, p.kelamin, p.tempat_lahir, p.tanggal_lahir, p.telp,
            //                                         p.alamat, p.no_rt as rt, p.no_rw as rw, p.no_rumah as norumah, 
            //                                         p.nama_kec as kec, p.nama_kel as kel, p.nama_kab as kab, p.nama_prop as prop, pd.no_register", true)
            //                                         ->from('sm_layanan_pendaftaran as lp')
            //                                         ->join('sm_pendaftaran as pd', 'pd.id = lp.id_pendaftaran')
            //                                         ->join('sm_pasien as p', 'p.id = pd.id_pasien')
            //                                         ->where('lp.id', $id_layanan_pendaftaran, true)->get()->row();
            $data['pasien'] = $this->db->select("pd.id_pasien, (p.nama) as nama_pasien, p.kelamin, p.tempat_lahir, p.tanggal_lahir, p.telp,
                                                    p.alamat, p.no_rt as rt, p.no_rw as rw, p.no_rumah as norumah, 
                                                    p.nama_kec as kec, p.nama_kel as kel, p.nama_kab as kab, p.nama_prop as prop, pd.no_register", true)
                                                    ->from('sm_pasien as p')
                                                    ->join('sm_pendaftaran as pd', 'p.id = pd.id_pasien')
                                                    ->where('pd.id', $id_pendaftaran, true)->get()->row();
            $data['pasien']->kelamin == 'P' ? $data['pasien']->kelamin = 'PEREMPUAN' : $data['pasien']->kelamin = 'LAKI-LAKI';
            $no_register = $data['pasien']->no_register;
            $data['pasien']->cekbarcode = 'esign';
        }

        if($jenis_file == 'lab'){
            $sqlInsert  = " INSERT INTO sm_mcu_kirim_online_detail (id_mcu_kirim, jenis_file, id_file, tanggal_file, lokasi_file, kode_file)
            SELECT $id_hasil_mcu, '$jenis_file', lab.id, lab.waktu_konfirm,
                CONCAT('https://labrsud.tangerangkota.go.id/rsud/', pd.id_pasien, '_', lab.kode, '.pdf') AS lokasi_file, 
                CONCAT(CASE WHEN lab.jenis = 'Bank Darah' THEN 'BD' 
                            WHEN lab.jenis = 'Patologi Anatomi' THEN 'PA' 
                            WHEN lab.jenis = 'Patologi Klinik' THEN 'PK' 
                            WHEN lab.jenis = 'Mikrobiologi' THEN 'MB' 
                            ELSE '-' END, ' - ', lab.kode, ' - ', lab.status_hasil) AS kode_file
            FROM sm_laboratorium lab    
            JOIN sm_layanan_pendaftaran lp ON lp.id = lab.id_layanan_pendaftaran
            JOIN sm_pendaftaran pd ON pd.id = lp.id_pendaftaran
            WHERE pd.id = $id_pendaftaran AND lab.status_hasil <> 'Batal' 
            AND NOT EXISTS (
                SELECT 1 FROM sm_mcu_kirim_online_detail 
                WHERE id_file = lab.id AND id_mcu_kirim = $id_hasil_mcu ) " ;
            $this->db->query($sqlInsert); 

            if ($this->db->trans_status() === FALSE) :
                $this->db->trans_rollback();
                $response = array('status'  => FALSE,
                                  'message' => 'Gagal Menambahkan File Laboratorium');
            else :
                $this->db->trans_commit();
                $response = array('status'  => TRUE,
                                  'message' => 'Berhasil Menambahkan File Laboratorium');
            endif;
            

        } else {
            
            // 2.Surat Keterangan Pengujian Kesehatan  
            if($jenis_file == 'ket_uji_sehat'){ 
                $data['data_form'] = $this->m_mcu->getFormSKPK($id_pendaftaran);
                $html              = $this->load->view('hasil_mcu_kirim_online/download/cetak_form_02_skpk', $data, true);   

            // 3.Keterangan Sehat     
            } else if($jenis_file == 'ket_sehat'){ 
                $data['data_form'] = $this->m_mcu->getSKSehat($id_layanan_pendaftaran);                   
                $html              = $this->load->view('hasil_mcu_kirim_online/download/cetak_form_03_sk_sehat', $data, true);      

            // 4.Keterangan Bebas Narkoba  
            } else if($jenis_file == 'ket_bebas_narkoba'){                  
                $data['data_form'] = $this->m_mcu->getSBN($id_layanan_pendaftaran);                  
                $html              = $this->load->view('hasil_mcu_kirim_online/download/cetak_form_04_surat_narkoba', $data, true); 

            // 5.Resume Medis Pasien  
            } else if($jenis_file == 'resum_medis'){                 
                $data['data_form'] = $this->m_mcu->getMCU($id_layanan_pendaftaran);               
                $html              = $this->load->view('hasil_mcu_kirim_online/download/cetak_form_05_resum_medis', $data, true); 
                
            // 6.Surat Keterangan Kesehatan Jiwa Tipe 1  
            } else if($jenis_file == 'ket_kesehatan_jiwa1'){               
                $data['data_form'] = $this->m_mcu->getSKKJsatu($id_layanan_pendaftaran);               
                $html              = $this->load->view('hasil_mcu_kirim_online/download/cetak_form_06_skkj_1', $data, true); 
                
            // 7.Surat Keterangan Kesehatan Jiwa Tipe 2   
            } else if($jenis_file == 'ket_kesehatan_jiwa2'){              
                $data['data_form'] = $this->m_mcu->getSKKJdua($id_layanan_pendaftaran);               
                $html              = $this->load->view('hasil_mcu_kirim_online/download/cetak_form_07_skkj_2', $data, true); 
                
            // 8.Surat Keterangan Kesehatan Jiwa Tipe 3   
            } else if($jenis_file == 'ket_kesehatan_jiwa3'){           
                $data['data_form'] = $this->m_mcu->getSKKJtiga($id_layanan_pendaftaran);               
                $html              = $this->load->view('hasil_mcu_kirim_online/download/cetak_form_08_skkj_3', $data, true); 

            // 9.Sertifikat Kelaikan Bekerja
            } else if($jenis_file == 'kelaikan_berkerja'){     
                $data ['data_form'] = $this->m_mcu->getKelaikanBekerja($id_layanan_pendaftaran);          
                $html               = $this->load->view('hasil_mcu_kirim_online/download/cetak_form_09_kelaikan_bekerja', $data, true); 

            // 10.Laporan Pemeriksaan Kesehatan
            } else if($jenis_file == 'pemeriksaaan_kesehatan'){           
                $data['data_form'] = $this->m_mcu->getLpkByLayPendaftaran($id_layanan_pendaftaran);         
                $html              = $this->load->view('hasil_mcu_kirim_online/download/cetak_form_10_lpk', $data, true); 
 
            //11.Surat Keterangan Medis
            } else if($jenis_file == 'ket_medis'){       
                $this->load->model('pelayanan/Pelayanan_model', 'm_pelayanan');
                $data['data_form'] = $this->m_mcu->getSKM($id_layanan_pendaftaran);
                $data['anamnesa']  = $this->m_pelayanan->getAnamnesa($id_layanan_pendaftaran);     
                $html              = $this->load->view('hasil_mcu_kirim_online/download/cetak_form_11_skm', $data, true); 
            
            //12.Surat Keterangan Disabilitas
            } else if($jenis_file == 'ket_disabilitas'){    
                $data['data_form'] = $this->m_mcu->getSuratKeteranganDisabilitas($id_layanan_pendaftaran);             
                $html              = $this->load->view('hasil_mcu_kirim_online/download/cetak_form_12_ket_disabilitas', $data, true);

            //13.Surat Keterangan Tidak Disabilitas
            } else if($jenis_file == 'ket_tidak_disabilitas'){  
                $data['data_form'] = $this->m_mcu->getSuratKeteranganTidakDisabilitas($id_layanan_pendaftaran);    
                $html              = $this->load->view('hasil_mcu_kirim_online/download/cetak_form_13_ket_tidak_disabilitas', $data, true);

            //14.Hasil Pemeriksaan Dokter Okupasi
            } else if($jenis_file == 'hasil_okupasi'){  
                $data['data_form'] = $this->m_mcu->getHasilPemeriksaanDokterOkupasi($id_layanan_pendaftaran);
                $html              = $this->load->view('hasil_mcu_kirim_online/download/cetak_form_14_hasil_okupasi', $data, true);

            }
    
            $file_name     = 'mcu_' . $jenis_file . '_' . $no_register . '_' . $this->datetime_file;
            $upload_path   = FCPATH . 'resources/pdf_mcu/';                
            $createdDomPDF = $this->createdDomPDF($html, $upload_path, $file_name);
            if($createdDomPDF){
                $response = $this->get_esign($upload_path, $file_name, $nik, $passphrase);
                if($response['status'] == TRUE){
                    $this->upload_file_cloud($id_hasil_mcu, $jenis_file, $data['data_form']->id, $upload_path, $file_name, $no_register, $tglform);
					$history_esign = [
                        'id_mcu_kirim'=> $id_hasil_mcu,
                        'jenis_file'  => $jenis_file,
                        'message'     => 'Berhasil',
                        'id_user'     => $this->session->userdata('id_translucent'),
                        'created_at'  => $this->datetime
                    ];
				} else {
                    $response = $response;
					$history_esign = [
                        'id_mcu_kirim'=> $id_hasil_mcu,
                        'jenis_file'  => $jenis_file,
                        'message'     => $response['message'],
                        'id_user'     => $this->session->userdata('id_translucent'),
                        'created_at'  => $this->datetime
                    ];
                } 
				$this->db->insert('sm_mcu_kirim_online_history', $history_esign);
            } else {    
                $response = ['status'  => TRUE, 'message' => 'Gagal Menambahkan File'];
            }         
        
        }        

        $this->response($response, REST_Controller::HTTP_OK);         
    }

    function get_esign($upload_path, $file_name, $nik = null, $passphrase = null)
    {   
        $this->load->library('curl');

		$konfigurasi_esign = $this->db->get_where('sm_konfigurasi_esign', ['status' => $this->status_esign])->row();
        $url        = $konfigurasi_esign->server . '/api/sign/pdf';
        $username   = $konfigurasi_esign->user;
        $password   = $konfigurasi_esign->pass;

		if($this->status_esign != 'production'){
			$nik 		    = $konfigurasi_esign->nik;
			$get_passphrase = $konfigurasi_esign->passphrase;
			$passphrase 	= ($passphrase=='123' ? $get_passphrase : $passphrase);
		}

        $filePath   = $upload_path . $file_name . '.pdf';
        $imagePath  = FCPATH . 'resources/images/esign/esign_pemda_500px.png';        
        $outputFile = $upload_path . 'esign_' .$file_name . '.pdf';
    
        if (!file_exists($filePath)) {
            return ['status'  => FALSE , 'message' => 'File PDF tidak ditemukan!'];
        }
    
        if (!file_exists($imagePath)) {
            return ['status'  => FALSE , 'message' => 'File tanda tangan tidak ditemukan!'];
        }
    
        $authHeader = 'Authorization: Basic ' . base64_encode("$username:$password");    
        $postData = [
            'file'          => new CURLFile($filePath, 'application/pdf', 'contoh_ettd.pdf'),
            'imageTTD'      => new CURLFile($imagePath, 'image/png', 'key.png'),
            'nik'           => $nik,
            'passphrase'    => $passphrase,
            'tampilan'      => 'invisible' 
        ];
        
        $curl = curl_init();    
        curl_setopt_array($curl, [
            CURLOPT_URL            => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING       => '',
            CURLOPT_MAXREDIRS      => 10,
            CURLOPT_TIMEOUT        => 120,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION   => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST  => 'POST',
            CURLOPT_POSTFIELDS     => $postData,
            CURLOPT_HTTPHEADER     => [
                $authHeader,
                'Content-Type: multipart/form-data'
            ],
        ]);
    
        $response = curl_exec($curl);
        $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        curl_close($curl);
    
        if ($httpCode == 200 && !empty($response)) {
            file_put_contents($outputFile, $response);              
            file_exists($filePath) ? unlink($filePath) : '';
            return ['status'  => TRUE, 'status_esign' => $this->status_esign, 'message' => 'Berhasil Membuat eSign  '];
        } else {
            if (file_exists($filePath)) { unlink($filePath); } // hapus file jika gagal
            $responseData = json_decode($response, true); // decode ke array
            $cleanResponse = preg_replace('/"(\w+)":"?([^"]+)"?/', '$1:$2', $response);

            $code = $responseData['status_code'] ?? null;
            $errorMessage = $responseData['error'] ?? $cleanResponse;

            return [
                'status'       => false,
                'status_esign' => $this->status_esign,
                'code'         => (string)$code,
                'message'      => $errorMessage,
                'nik'          => $nik,
                'passphrase'   => $passphrase
            ];

            // file_exists($filePath) ? unlink($filePath) : '';
            // $cleanResponse = preg_replace('/"(\w+)":"?([^"]+)"?/', '$1:$2', $response);
            // // return ['status'  => FALSE, 'message' => 'Gagal Membuat eSign  . <br>Response Bridging: ' . $cleanResponse];
            // return ['status'  => FALSE, 'message' => 'Gagal Membuat eSign  . <br>Response Bridging: ' . $cleanResponse,'nik'  => $nik, 'passphrase' => $passphrase];
        }
    }

    public function upload_file_cloud($id_hasil_mcu, $jenis_file, $id_file, $upload_path, $file_name, $no_register, $tanggal_file)
    {
        $filePath  = $upload_path . 'esign_'.$file_name . '.pdf';
        $curlFile  = new CURLFile($filePath, mime_content_type($filePath), basename($filePath));
        $kode_file = $jenis_file;
 
        $dataUpload = [
            'nama_file'   => $curlFile,
            'aplikasi'    => 'SIMRS',
            'kategori'    => $kode_file,
            'no_register' => $no_register,
        ];


        if ($rscloud = $this->addDataCloudLain($dataUpload)) {
            if ($rscloud->metadata->success !== true) {         
                $validated = $rscloud->data->nama_file[0] ?? '';
                $msg_validated = !empty($validated) ? "<br>" . $validated : '';
                $status = ['status'  => $rscloud->metadata->success, 'message' => $rscloud->metadata->message . $msg_validated];
            } else {
                $timestamp = strtotime($rscloud->data->updated_at);
                $created_at = date('Y-m-d H:i:s', $timestamp);

                if(strlen($tanggal_file) <= 10){
                    $tanggal_file = $tanggal_file . ' 00:00:00';
                } else {
                    $tanggal_file = $tanggal_file;
                }

                $insert = [
                    'id_mcu_kirim'=> $id_hasil_mcu,
                    'jenis_file'  => $jenis_file,
                    'id_file'     => $id_file,
                    'tanggal_file'=> $tanggal_file,
                    'lokasi_file' => 'http://192.168.77.101/storage/file_pdf/'.$rscloud->data->nama_file,
                    'id_cloud'    => $rscloud->data->id,
                    'id_user'     => $this->session->userdata('id_translucent'),
                    'created_at'  => $created_at,
                ];
                $this->db->insert('sm_mcu_kirim_online_detail', $insert);
                $status = ['status'  => $rscloud->metadata->success, 'message' => $rscloud->metadata->message];
            }           
            
            file_exists($filePath) ? unlink($filePath) : '';
            return $status;
        } else {
            file_exists($filePath) ? unlink($filePath) : '';
            $status = ['status'  => FALSE, 'message' => 'Gagal Uplod Cloud File'];
            return $status;
        }
        
    }

    public function addDataCloudLain($data)
    {
        $url = $this->cloud_config->server . 'addFilePDF';
        $output = postCurl($url, $data);
        $output = json_decode($output);
        return $output;
    }

    function get_list_file_kirim_get()
    {
        $id_hasil_mcu = safe_get('id_hasil_mcu_detail');
        $data = $this->db->query($this->m_hmcu->getListFileKirim($id_hasil_mcu))->result();        
        $response = [
            'jumlah'=> $this->db->query($this->m_hmcu->getListFileKirim($id_hasil_mcu))->num_rows(), 
            'data'  => $data           
        ];
        $this->response($response, REST_Controller::HTTP_OK);
    }

    function cek_file_get()
    {
        $id          = $this->get('id');
        $lokasi_file = base64_decode($this->get('lokasi_file'));        
        $lokasi_file = str_replace("labrsud.tangerangkota.go.id", "10.10.10.11", $lokasi_file);

        $ch = curl_init($lokasi_file);
        curl_setopt($ch, CURLOPT_NOBODY, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_exec($ch); 
        $statusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $response = curl_exec($ch);
        if (curl_errno($ch)) {
            $error_message = curl_error($ch);
            log_message('error', 'cURL Error: ' . $error_message);
        }
        curl_close($ch);
        
        $update = $statusCode !== 200 ? array( 'is_ready' => '0' ) : $update = array( 'is_ready' => '1' );
        $this->db->where('id', $id);
		$this->db->update('sm_mcu_kirim_online_detail', $update);

        if ($statusCode == 200) {
            $this->response(['status' => true, 'message' => 'File ada', 'lokasi_file' => $lokasi_file], REST_Controller::HTTP_OK);
        } else {
            $this->response(['status' => false, 'message' => 'File tidak ada. '. 'Error: ' . $error_message , 'lokasi_file' => $lokasi_file], REST_Controller::HTTP_OK);
        }
    }

    function update_kirim_file_post()
    {
        $id        = safe_post('id');
        $is_kirim  = safe_post('is_kirim');
        $update    = ['is_kirim' => ($is_kirim == '1' ? '0' : '1')];

        $this->db->where('id', $id);
        $this->db->update('sm_mcu_kirim_online_detail', $update);

        if ($this->db->affected_rows() > 0) {
            $this->response(['status' => true, 'message' => 'Berhasil mengubah status kirim.'], REST_Controller::HTTP_OK);
        } else {
            $this->response(['status' => false, 'message' => 'Gagal mengubah status kirim atau tidak ada perubahan data.'], REST_Controller::HTTP_OK);
        }
    }

    function get_file_terpilih_get()
    {
        $id_pendaftaran = $this->get('id_pendaftaran');
        $response = [
            'jumlah'=> $this->db->query($this->m_hmcu->getfileTerpilih($id_pendaftaran))->num_rows(), 
            'data'  => $this->db->query($this->m_hmcu->getfileTerpilih($id_pendaftaran))->row(),
        ];
        $this->response($response, REST_Controller::HTTP_OK);
    }

    function respon_email_get()
    {
        $id_pendaftaran = $this->get('id_pendaftaran');
        $status       = $this->get('status');
        $message      = $this->get('message');
        $response     = $this->m_hmcu->responEmail($id_pendaftaran, $status, $message);
        $this->response($response, 200);
    }

    function tindakan_lab_get()
    {
        $id = $this->get('id');
        $response = $this->db->select("dlab.id_laboratorium, lab.kode, concat('<b>',lab.jenis,' ',lab.kode,'</b><br><br>',string_agg(concat('- ',ly.nama), '<br>')) tindakan_lab")
                                 ->from('sm_detail_laboratorium dlab')
                                 ->join('sm_laboratorium lab', 'dlab.id_laboratorium=lab.id')
                                 ->join('sm_tarif_pelayanan tp', 'dlab.id_tarif=tp.id')
                                 ->join('sm_layanan ly', 'tp.id_layanan = ly."id"')
                                 ->where(' dlab.id_laboratorium', $id, true)
                                 ->group_by('dlab.id_laboratorium, lab.kode, lab.jenis')->get()->row();


        // if($cek_form){
              
        //         $response = ['status'  => TRUE, 'data' => $cek_form->tindakan_lab];
        // } else {
        //     $response = ['status'  => FALSE, 'data' => $cek_form->tindakan_lab];
        // }

        $this->response($response, REST_Controller::HTTP_OK);
    }

    function kirim_ulang_get()
    {
        $id_hasil_mcu = $this->get('id_hasil_mcu');
        $response = $this->m_hmcu->kirimUlang($id_hasil_mcu);
        $this->response($response, 200);
    }

    function hapus_file_delete()
    {
        $id = $this->get('id', true);
        if ($id <= 0) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
        endif;

        $this->m_hmcu->hapusFile($id);
        $message = [
            'message' => 'Data telah berhasil terhapus'
        ];
        $this->set_response($message, REST_Controller::HTTP_NO_CONTENT); // (204)
    }
    
}