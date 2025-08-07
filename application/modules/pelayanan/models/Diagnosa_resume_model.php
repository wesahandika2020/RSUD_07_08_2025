<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Diagnosa_resume_model extends CI_Model
{


    function __construct()
    {
        parent::__construct();
        $this->date     = date('Y-m-d');
        $this->datetime = date('Y-m-d H:i:s');
    }

    // Diagnosa
    function getDiagnosaPemeriksaan($id_pendaftaran)
    {
        // $id_pendaftaran = $this->db->get_where('sm_layanan_pendaftaran', ['id' => $id_layanan_pendaftaran])->row()->id_pendaftaran;

        $this->db->select("dg.*, 
                            coalesce(pg.nama, '') as dokter, 
                            concat_ws(' | ', gs.kode_icdx_rinci, ( SELECT gsa.kode_icdx_rinci FROM sm_golongan_sebab_sakit AS gsa WHERE gsa.ID = dg.id_pengkodean_asterik ), ( SELECT gss1.nama FROM sm_golongan_sebab_sakit AS gss1 WHERE gss1.ID = dg.id_golongan_sebab_sakit ), dg.golongan_sebab_sakit_lain) as golongan_sebab_sakit,
                            concat_ws(' | ', gs.kode_icdx_rinci, ( SELECT gsa.kode_icdx_rinci FROM sm_golongan_sebab_sakit AS gsa WHERE gsa.ID = dg.id_pengkodean_asterik ), ( SELECT gss1.nama FROM sm_golongan_sebab_sakit AS gss1 WHERE gss1.ID = dg.id_golongan_sebab_sakit ), dg.golongan_sebab_sakit_lain) as item, '0' log ")
            ->from('sm_diagnosa as dg')
            ->join('sm_layanan_pendaftaran as lp', 'lp.id= dg.id_layanan_pendaftaran', 'left')
            ->join('sm_tenaga_medis as tm', 'tm.id = dg.id_dokter', 'left')
            ->join('sm_pegawai as pg', 'pg.id = tm.id_pegawai', 'left')
            ->join('sm_golongan_sebab_sakit as gs', 'gs.id = dg.id_pengkodean', 'left')
            ->where('lp.id_pendaftaran', $id_pendaftaran, true)
            ->group_start() // Membuka grup kondisi
                ->where('dg.prioritas !=', 'Utama') // Kondisi prioritas bukan "utama"
                ->or_where_not_in('lp.jenis_layanan', ['Poliklinik', 'IGD']) // Kondisi layanan bukan "Poliklinik" atau "IGD"
            ->group_end() // Menutup grup kondisi
            ->order_by('dg.id', 'asc');
        $query1 = $this->db->get()->result();

        $this->db->select("dg.*, 
                            coalesce(pg.nama, '') as dokter, 
                            concat_ws(' | ', gs.kode_icdx_rinci, ( SELECT gsa.kode_icdx_rinci FROM sm_golongan_sebab_sakit AS gsa WHERE gsa.ID = dg.id_pengkodean_asterik ), ( SELECT gss1.nama FROM sm_golongan_sebab_sakit AS gss1 WHERE gss1.ID = dg.id_golongan_sebab_sakit ), dg.golongan_sebab_sakit_lain) as golongan_sebab_sakit,
                            concat_ws(' | ', gs.kode_icdx_rinci, ( SELECT gsa.kode_icdx_rinci FROM sm_golongan_sebab_sakit AS gsa WHERE gsa.ID = dg.id_pengkodean_asterik ), ( SELECT gss1.nama FROM sm_golongan_sebab_sakit AS gss1 WHERE gss1.ID = dg.id_golongan_sebab_sakit ), dg.golongan_sebab_sakit_lain) as item, '1' log ")
            ->from('sm_diagnosa_log as dg')
            ->join('sm_layanan_pendaftaran as lp', 'lp.id= dg.id_layanan_pendaftaran', 'left')
            ->join('sm_tenaga_medis as tm', 'tm.id = dg.id_dokter', 'left')
            ->join('sm_pegawai as pg', 'pg.id = tm.id_pegawai', 'left')
            ->join('sm_golongan_sebab_sakit as gs', 'gs.id = dg.id_pengkodean', 'left')
            ->where('lp.id_pendaftaran', $id_pendaftaran, true)
            ->group_start() // Membuka grup kondisi
                ->where('dg.prioritas !=', 'Utama') // Kondisi prioritas bukan "utama"
                ->or_where_not_in('lp.jenis_layanan', ['Poliklinik', 'IGD']) // Kondisi layanan bukan "Poliklinik" atau "IGD"
            ->group_end() // Menutup grup kondisi
            ->order_by('dg.id', 'asc');
        $query2 = $this->db->get()->result();

        return array_merge($query1, $query2);
        $this->db->close();
    }
}
