<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Miscellaneous_model extends CI_Model {

    
    function __construct()
    {
        parent::__construct();
        $this->now = date('Y-m-d');
    }
    
    function cekLastNoRujukan($no_rm)
    {
        // cek last rujukan asli
        $asli = $this->db->select("LPAD(no_rujukan, 6, '0') as no_rujukan, daterange_subdiff(tanggal_terbit, '" . $this->now . "') as selisih")
                        ->from('sm_rujukan')
                        ->where('id_pasien', $no_rm)
                        ->where('jenis', 'asli')
                        ->order_by('id', 'desc')
                        ->limit(1, 0)->get()->row();

        $status  = true;
        $message = '';
        $data    = NULL;

        if (0 < count((array)$asli) && 90 < (Int)$asli->selisih) :
            $status = false;
            $message = 'Rujukan Asli terakhir <b>' . $asli->no_rujukan . '</b> telah kadaluarsa';
        else :
            $status = true;
            $tipe = array('spk', 'interna', 'penunjang', 'resume_inap');
            $data = array();
            $rule = '';

            foreach ($tipe as $key => $value) :
                $this->db->select("id, tanggal_terbit, id_pasien, jenis, used, LPAD(no_rujukan, 6, '0') as no_rujukan, dokter, kode_dokter")
                    ->from('sm_rujukan')
                    ->where('id_pasien', $no_rm)
                    ->where('jenis', $value);

                if ($value === 'penunjang') :
                    $rule = $this->db->where("daterange_subdiff(tanggal_terbit, '" . $this->now . "') <= '30'");
                else : 
                    if ($value === 'resume_inap') :
                        $rule = $this->db->where("((daterange_subdiff(tanggal_terbit, '" . $this->now . "') <= '30') AND (used != '2'))");
                    else :
                        $rule = $this->db->where('used', 0);
                    endif;
                endif;
                
                $this->db->order_by('id', 'desc')->limit(1, 0);
                $query = $this->db->get()->row();
                // echo $this->db->last_query(); return false;
                if (0 < count((array)$query)) :
                    array_push($data, $query);
                endif;
            endforeach;

            $message = "List History Rujukan";
        endif;
        
        return array(
            'status'  => $status,
            'message' => $message,
            'data'    => $data
        ); 
    }

    function generateSKDP($id_pasien, $jenis, $id_layanan_pendaftaran)
    {
        $this->db->select('count(id) as jumlah')
                ->from('sm_rujukan')
                ->where('tanggal_terbit', date('Y-m-d'))
                ->where('id_pasien', $id_pasien)
                ->where('jenis', $jenis);
        
        $cek = $this->db->get()->row();
        $status = true;

        if ($cek->jumlah > 0) :
            $status  = false;
            $message = 'Tidak dapat membuat nomor rujukan karena sudah membuat nomor rujukan hari ini';
        else :
            $this->db->select('no_rujukan')
                    ->from('sm_rujukan')
                    ->where('jenis !=', 'asli')
                    ->order_by('id', 'desc')
                    ->limit(1, 0);
            $no_rujukan = 0;
            $rujukan = $this->db->get()->row();

            if ($rujukan) :
                $no_rujukan = (Int)$rujukan->no_rujukan + 1;
            else :
                $no_rujukan = 1;
            endif;

            $this->db->select('n.kode_bpjs, pg.nama as dokter')
                    ->from('sm_layanan_pendaftaran as lp')
                    ->join('sm_tenaga_medis as n', 'n.id = lp.id_dokter')
                    ->join('sm_pegawai as pg', 'pg.id = n.id_pegawai');

            if ($id_layanan_pendaftaran != '') :
                $this->db->where('lp.id', $id_layanan_pendaftaran); 
            else : 
                $this->db->where('lp.id is null'); 
            endif;
            
            $dokter_data = $this->db->get()->row();
            $kode_dokter = '';
            $dokter = '';
            
            if (0 < count((array)$dokter_data) && $dokter_data->kode_bpjs !== NULL) :
                $kode_dokter = $dokter_data->kode_bpjs;
                $dokter      = $dokter_data->dokter;
            endif;

            // Tambahan Wahyu:
            $this->load->model('vclaim_bpjs/Vclaim_v2_model', 'm_vclaim');
            $dataRujukan = $this->m_vclaim->get_rujukan_rs($no_rujukan);
            $cek_lp = $this->db->where('id', $id_layanan_pendaftaran)->get('sm_layanan_pendaftaran')->row();
            $kodePerujuk = $dataRujukan->response->rujukan->provPerujuk->kode ?? NULL;
            $namaPerujuk = $dataRujukan->response->rujukan->provPerujuk->nama ?? NULL;
            // END

            $insert = array(
                "tanggal_terbit" => date('Y-m-d'),
                "id_pasien"      => $id_pasien,
                "no_rujukan"     => $no_rujukan,
                "jenis"          => $jenis,
                "kode_dokter"    => $kode_dokter,
                "dokter"         => $dokter,
                // Tambahan Wahyu:
                'id_pendaftaran' => isset($cek_lp->id_pendaftaran) ? $cek_lp->id_pendaftaran : null,
                'kode_perujuk' => $kodePerujuk ?? NULL,
                'nama_perujuk' => $namaPerujuk ?? NULL
                // END
            );

            $this->db->insert('sm_rujukan', $insert);

            $status = true;
            $message = "Nomor rujukan " . $jenis . " adalah " . str_pad((string)$no_rujukan, 6, '0', STR_PAD_LEFT);
        endif;

        return array(
            'status'  => $status,
            'message' => $message,
        );
    }

}

/* End of file Miscellaneous_model.php */
