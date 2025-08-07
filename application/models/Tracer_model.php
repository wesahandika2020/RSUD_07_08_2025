<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Tracer_model extends CI_Model {

    
    function __construct()
    {
        parent::__construct();
        $this->datetime = date('Y-m-d H:i:s');    
    }
    
    function insertTracer($id_layanan_pendaftaran)
    {
        $visitation = $this->visitation($id_layanan_pendaftaran);
        $tracer_new = array(
            'no_register' => $visitation->no_register,
            'no_rm' => $visitation->no_rm,
            'nama_pasien' => $visitation->nama,
            'status_pasien' => $visitation->status_pasien,
            'id_klinik' => $visitation->id_klinik,
            'status' => 'order',
            'waktu_order' => $this->datetime,
            'position' => $visitation->posisi,
            'destination' => $visitation->tujuan,
            'tipe_pembayaran' => $visitation->cara_bayar
        );

        $data = $this->db->insert('sm_tracer', $tracer_new);
        return $data;
    }

    function visitation($id)
    {
        $this->db->select("
                pd.no_register, 
                p.id as no_rm, 
                p.nama, 
                p.status_pasien, 
                'Rekam Medik' as posisi, 
                case when lp.jenis_layanan = 'Poliklinik' then sp.id 
                     when lp.jenis_layanan = 'IGD' then 100 else 0 end as id_klinik,
                case when lp.jenis_layanan = 'Poliklinik' then concat_ws(' ', 'Klinik', sp.nama)
                     when lp.jenis_layanan = 'IGD' then 'IGD' 
                     when lp.jenis_layanan = 'Laboratorium' then 'Laboratorium'
                     when lp.jenis_layanan = 'Radiologi' then 'Radiologi'
                     when lp.jenis_layanan = 'Fisioterapi' then 'Fisioterapi'
                     when lp.jenis_layanan = 'Hemodialisa' then 'Hemodialisa'
                     else concat_ws(' kelas ', bg.nama, k.nama) end as tujuan,
                case when lp.cara_bayar = 'Tunai' 
                     then lp.cara_bayar 
                     else concat_ws(' ', lp.cara_bayar, coalesce(pj.nama, '')) end as cara_bayar
        ", true);

        $this->db->from('sm_layanan_pendaftaran as lp');
        $this->db->join('sm_pendaftaran as pd', 'pd.id = lp.id_pendaftaran');
        $this->db->join('sm_pasien as p', 'p.id = pd.id_pasien');
        $this->db->join('sm_spesialisasi as sp', 'sp.id = lp.id_unit_layanan', 'left');
        $this->db->join('sm_penjamin  as pj', 'pj.id = lp.id_penjamin', 'left');
        $this->db->join('sm_rawat_inap  as ri', 'ri.id_layanan_pendaftaran = lp.id', 'left');
        $this->db->join('sm_kelas  as k', 'k.id = ri.id_kelas', 'left');
        $this->db->join('sm_bangsal  as bg', 'bg.id = ri.id_bangsal', 'left');
        $this->db->where('lp.id', $id, true);

        // $this->db->get();
        // echo $this->db->last_query(); die;
        $visitation = $this->db->get()->row();
        return $visitation;
    }

    function updateStatusBerkas($id_layanan_pendaftaran)
    {
        $this->db->select("
                    pd.no_register, lp.jenis_layanan,
                    case when lp.jenis_layanan = 'Poliklinik' then concat_ws(' ', 'Klinik', sp.nama)
                        when lp.jenis_layanan = 'IGD' then 'IGD' 
                        when lp.jenis_layanan = 'Laboratorium' then 'Laboratorium'
                        when lp.jenis_layanan = 'Radiologi' then 'Radiologi'
                        when lp.jenis_layanan = 'Fisioterapi' then 'Fisioterapi'
                        when lp.jenis_layanan = 'Hemodialisa' then 'Hemodialisa'
                        else concat_ws(' kelas ', bg.nama, k.nama) end as posisi               
        ", true);

        $this->db->from('sm_layanan_pendaftaran as lp');
        $this->db->join('sm_pendaftaran as pd', 'pd.id = lp.id_pendaftaran');
        $this->db->join('sm_spesialisasi as sp', 'sp.id = lp.id_unit_layanan', 'left');
        $this->db->join('sm_rawat_inap  as ri', 'ri.id_layanan_pendaftaran = lp.id', 'left');
        $this->db->join('sm_kelas  as k', 'k.id = ri.id_kelas', 'left');
        $this->db->join('sm_bangsal  as bg', 'bg.id = ri.id_bangsal', 'left');
        $this->db->where('lp.id', $id_layanan_pendaftaran, true);
        // $this->db->get(); echo $this->db->last_query(); die;
        $lp = $this->db->get()->row();

        if (0 < count((array)$lp)) :
            $data_tracer = $this->db->where('no_register', $lp->no_register)->get('sm_tracer')->row();
            if (0 < count((array)$data_tracer)) :
                $update = array('status'   => 'distributed', 'position' => $lp->posisi);
                if ($lp->jenis_layanan === 'Rawat Inap') :
                    $update['inpatient'] = 'yes';
                endif;

                if ($data_tracer->waktu_distribusi === NULL) :
                    $update['waktu_distribusi'] = $this->datetime;
                endif;

                $this->db->where('id', $data_tracer->id)->update('sm_tracer', $update);
            endif;
        endif;
    }
}
