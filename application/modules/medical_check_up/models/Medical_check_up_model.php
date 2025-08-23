<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Medical_check_up_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
        $this->datetime = date('Y-m-d H:i:s');
    }

    private function sqlPemeriksaanMcu($search)
    {
        $this->db->select("DISTINCT ON (lp.id) lp.*, 
                        pd.tanggal_daftar, pd.tanggal_keluar, 
                        pd.id_pasien, pd.no_register,
                        CONCAT_WS(' ', p.nama, COALESCE(p.status_pasien, '')) as nama, 
                        p.tanggal_lahir, p.telp,
                        r.id as id_resep,
                        coalesce(pj.nama, '') as penjamin,
                        coalesce(sp.nama, '') as layanan, 
                        coalesce(pg.nama, '') as dokter, 
                        lp.no_antrian,
                        sp.kode_bpjs, coalesce(tr.account, '') as user_sep", false);

        $this->db->from('sm_layanan_pendaftaran as lp')
            ->join('sm_pendaftaran as pd', 'pd.id = lp.id_pendaftaran')
            ->join('sm_pasien as p', 'p.id = pd.id_pasien')
            ->join('sm_resep as r', 'r.id_layanan_pendaftaran = lp.id', 'left')
            ->join('sm_spesialisasi as sp', 'sp.id = lp.id_unit_layanan')
            ->join('sm_tenaga_medis as tm', 'tm.id = lp.id_dokter', 'left')
            ->join('sm_pegawai as pg', 'pg.id = tm.id_pegawai', 'left')
            ->join('sm_penjamin as pj', 'pj.id = lp.id_penjamin', 'left')
            ->join('sm_translucent as tr', 'tr.id = lp.id_users_sep', 'left');

        if (($search['tanggal_awal'] !== '') & ($search['tanggal_akhir'] !== '')) :
            $this->db->where("pd.tanggal_daftar BETWEEN '" . date2mysql($search['tanggal_awal']) . " 00:00:00' AND '" . date2mysql($search['tanggal_akhir']) . " 23:59:59'");
        endif;

        if ($search['jenis_layanan'] !== '') :
            $this->db->where('lp.jenis_layanan', $search['jenis_layanan'], true);
        endif;

        if ($search['no_register'] !== '') :
            $this->db->where('pd.no_register', $search['no_register'], true);
        endif;

        if ($search['no_rm'] !== '') :
            $this->db->like('p.id', $search['no_rm'], 'before', true);
        endif;

        if ($search['nik'] !== '') :
            $this->db->where('p.no_identitas', $search['nik']);
        endif;

        if ($search['nama'] !== '') :
            $this->db->where("p.nama ilike '%" . strtolower($search['nama']) . "%'");
        endif;

        if ($search['layanan'] !== '' && isset($search['layanan'])) :
            $this->db->where('lp.id_unit_layanan', $search['layanan']);
        endif;

        if ($search['id_dokter'] !== '' && $search['id_dokter'] !== '811') :
            $this->db->where('pg.id', $search['id_dokter']);
        endif;

        return $this->db->order_by('lp.id', 'desc');

        // return $this->db->group_by('lp.id, r.id, pd.tanggal_daftar, pd.tanggal_keluar, pd.id_pasien, pd.no_register, p.nama, p.tanggal_lahir, pj.nama, sp.nama, pg.nama, tr.account, sp.kode_bpjs');
    }

    private function _listPemeriksaanMcu($limit, $start, $search)
    {
        $this->sqlPemeriksaanMcu($search);
        if ($limit !== 0) :
            $this->db->limit($limit, $start);
        endif;

        return $this->db->get()->result();
        // $this->db->get(); echo $this->db->last_query(); exit();
    }

    function getListDataPemeriksaanMcu($limit, $start, $search)
    {
        $result['data'] = $this->_listPemeriksaanMcu($limit, $start, $search);
        $result['jumlah'] = $this->sqlPemeriksaanMcu($search)->get()->num_rows();
        return $result;

        $this->db->close();
    }

    function getByIdPaketIdLayananPendaftaran($idLayananPendaftaran, $idPaket)
    {
        return $this->db->select('lpp.*')
            ->from('sm_layanan_pendaftaran_paket as lpp')
            ->where('lpp.id_layanan_pendaftaran', $idLayananPendaftaran, true)
            ->where('lpp.id_paket', $idPaket, true)
            ->get()
            ->row();
    }

    function getLayananPendaftaranByIdLayananPendaftaran($idLayananPendaftaran)
    {
        return $this->db->select('lpp.*')
            ->from('sm_layanan_pendaftaran_paket as lpp')
            ->where('lpp.id_layanan_pendaftaran', $idLayananPendaftaran)
            ->get()
            ->row();
    }

    function getLayananByIdLayananTarif($idLayananTarif)
    {
        // return $this->db->select('l.id, l.nama')
        // ->from('sm_layanan as l')				
        // ->where('l.id_parent', $idLayananTarif)		
        // ->get()
        // ->row();	

        $this->db->select('l.id, l.nama', false);
        $this->db->from('sm_layanan as l');
        $this->db->where('l.id_parent', $idLayananTarif);
        $this->db->order_by('l.id', 'asc');

        return $this->db->get()->result();
        $this->db->close();
    }

    function getFormSKPK($idPendaftaran)
    {

        $sql = "select fs.*, ps.nama as nama_pasien, ps.alamat as alamat_pasien, pk.nama as nama_pekerjaan, pg.nama as nama_dokter, COALESCE(pg.nip, '') as nip_dokter 
                from sm_form_skpk as fs
                join sm_pendaftaran p on fs.id_pendaftaran = p.id
                join sm_pasien ps on p.id_pasien = ps.id
                join sm_pekerjaan pk on ps.id_pekerjaan = pk.id
                join sm_tenaga_medis tm on tm.id = fs.id_dokter
                join sm_pegawai pg on pg.id = tm.id_pegawai
                where fs.id_pendaftaran = '" . $idPendaftaran . "'";

        return $this->db->query($sql)->row();
    }

    function getSKDinkes($idPendaftaran)
    {

        $sql = "select sd.*, ps.nama as nama_pasien, ps.alamat as alamat_pasien, pk.nama as nama_pekerjaan, pg.nama as nama_dokter, COALESCE(pg.nip, '') as nip_dokter 
                from sm_skpk_dinkes as sd
                join sm_pendaftaran p on sd.id_pendaftaran = p.id
                join sm_pasien ps on p.id_pasien = ps.id
                join sm_pekerjaan pk on ps.id_pekerjaan = pk.id
                join sm_tenaga_medis tm on tm.id = sd.id_dokter_dinkes
                join sm_pegawai pg on pg.id = tm.id_pegawai
                where sd.id_pendaftaran = '" . $idPendaftaran . "'";

        return $this->db->query($sql)->row();
    }

    function getSKSehat($id)
    {

        $sql = "select upper(ps.nama) as nama_pasien, ps.alamat as alamat_pasien, ps.tanggal_lahir as tanggal_lahir, pk.nama as nama_pekerjaan, an.tinggi_badan, an.berat_badan, ps.kelamin, an.tensi_sistolik, an.tensi_diastolik, dg.golongan_sebab_sakit_lain as keterangan, an.nadi,an.rr, sks.*, pg.nama as nama_dokter, COALESCE(pg.nip, '') as nip_dokter
        from sm_anamnesa as an
        join sm_layanan_pendaftaran lp on lp.id = an.id_layanan_pendaftaran
        left join sm_diagnosa dg on dg.id_layanan_pendaftaran = lp.id
        left join sm_form_sks sks on sks.id_layanan_pendaftaran = lp.id
        join sm_pendaftaran p on lp.id_pendaftaran = p.id 
        join sm_pasien ps on p.id_pasien = ps.id
        join sm_pekerjaan pk on ps.id_pekerjaan = pk.id
        left join sm_tenaga_medis tm on tm.id = sks.id_dokter_sks
        left join sm_pegawai pg on pg.id = tm.id_pegawai                                                       
        where lp.id = '" . $id . "'";

        return $this->db->query($sql)->row();
    }

    function getHPMcu()
    {
        return array(
            ''                              => 'Pilih Jenis Pemeriksaan',
            'SEHAT JASMANI'                 => 'SEHAT JASMANI',
            'TIDAK SEHAT JASMANI'           => 'TIDAK SEHAT JASMANI',
            'SEHAT DENGAN CATATAN MEDIS'    => 'SEHAT DENGAN CATATAN MEDIS',
            'TIDAK LAYAK BEKERJA SEMENTARA' => 'TIDAK LAYAK BEKERJA SEMENTARA',

        );
    }

    function getSBN($id)
    {

        $sql = "select ps.nama as nama_pasien, ps.alamat as alamat_pasien, ps.tanggal_lahir as tanggal_lahir, pk.nama as nama_pekerjaan,  sbn.*, pg.nama as nama_dokter, COALESCE(pg.nip, '') as nip_dokter       
        from sm_layanan_pendaftaran as lp 
        left join sm_surat_narkoba sbn on sbn.id_layanan_pendaftaran = lp.id
        join sm_pendaftaran p on lp.id_pendaftaran = p.id 
        join sm_pasien ps on p.id_pasien = ps.id
        join sm_pekerjaan pk on ps.id_pekerjaan = pk.id
        left join sm_tenaga_medis tm on tm.id = sbn.id_dokter_narkoba
        left join sm_pegawai pg on pg.id = tm.id_pegawai                         
        where lp.id = '" . $id . "'";

        return $this->db->query($sql)->row();
    }












    // MRM
    function getMCU($id){
        $sql = "select 
        sa.*,
        mcu.*,
        ps.*,
        lp.*,
        case when ps.kelamin = 'L' then 'Laki-Laki' else 'Perempuan' end jenis_kelamin,
        sd.golongan_sebab_sakit_lain as keperluan,
        ps.id as no_rm,
        ps.nama as nama_pasien, 
        ps.alamat as alamat_pasien, 
        ps.tanggal_lahir as tanggal_lahir, 
        pk.nama as nama_pekerjaan, 
        pg.nama as nama_dokter, 
        COALESCE(pg.nip, '') as nip_dokter, 
        sd.golongan_sebab_sakit_lain as keperluan

        from sm_layanan_pendaftaran as lp 
        left join sm_resume_medis mcu on mcu.id_layanan_pendaftaran = lp.id
        left join sm_diagnosa sd on sd.id_layanan_pendaftaran = lp.id
        left join sm_anamnesa sa on sa.id_layanan_pendaftaran = lp.id
        left join sm_pendaftaran p on lp.id_pendaftaran = p.id 
        left join sm_pasien ps on p.id_pasien = ps.id
        left join sm_pekerjaan pk on ps.id_pekerjaan = pk.id
        left join sm_tenaga_medis tm on tm.id = mcu.mcu_dokter
        left join sm_pegawai pg on pg.id = tm.id_pegawai                         
        where lp.id = '" . $id . "'";

        return $this->db->query($sql)->row();
    }

    
    // function getMCU($id){
    //     $sql = "
    //         select 
    //             sa.keluhan,
    //             mcu.tanggal as tanggal_mcu,
    //             mcu.mcu_dokter,
    //             ps.id as no_rm,
    //             ps.nama as nama_pasien, 
    //             ps.alamat as alamat_pasien, 
    //             ps.tanggal_lahir, 
    //             case when ps.kelamin = 'L' then 'Laki-Laki' else 'Perempuan' end as jenis_kelamin,
    //             pk.nama as nama_pekerjaan, 
    //             pg.nama as nama_dokter, 
    //             COALESCE(pg.nip, '') as nip_dokter, 
    //             sd.golongan_sebab_sakit_lain as keperluan,
    //             lp.id as id_layanan_pendaftaran,
    //             lp.id_pendaftaran
    //         from sm_layanan_pendaftaran as lp 
    //         left join sm_resume_medis mcu on mcu.id_layanan_pendaftaran = lp.id
    //         left join sm_diagnosa sd on sd.id_layanan_pendaftaran = lp.id
    //         left join sm_anamnesa sa on sa.id_layanan_pendaftaran = lp.id
    //         left join sm_pendaftaran p on lp.id_pendaftaran = p.id 
    //         left join sm_pasien ps on p.id_pasien = ps.id
    //         left join sm_pekerjaan pk on ps.id_pekerjaan = pk.id
    //         left join sm_tenaga_medis tm on tm.id = mcu.mcu_dokter
    //         left join sm_pegawai pg on pg.id = tm.id_pegawai                         
    //         where lp.id = ?
    //     ";

    //     return $this->db->query($sql, [$id])->row();
    // }









    // SKKJ1 RUBAH
    function getSKKJsatu($id){
        $sql = "select 
        skkj1.*,
        ps.*,
        lp.*,
        case when ps.kelamin = 'L' then 'Laki-Laki' else 'Perempuan' end jenis_kelamin,        
        ps.id as no_rm,
        ps.nama as nama_pasien, 
        ps.alamat as alamat_pasien, 
        ps.tanggal_lahir as tanggal_lahir,       
        pg.nama as nama_dokter, 
        dg.golongan_sebab_sakit_lain as keterangan,
        COALESCE(pg.nip, '') as nip_dokter
        from sm_layanan_pendaftaran as lp 
        left join sm_diagnosa dg on dg.id_layanan_pendaftaran = lp.id
        left join sm_form_skkj_1 skkj1 on skkj1.id_layanan_pendaftaran = lp.id     
        left join sm_pendaftaran p on lp.id_pendaftaran = p.id 
        left join sm_pasien ps on p.id_pasien = ps.id
        left join sm_tenaga_medis tm on tm.id = skkj1.dokter_skkj_1
        left join sm_pegawai pg on pg.id = tm.id_pegawai   
        where lp.id = '" . $id . "'";
        return $this->db->query($sql)->row();
    } 
    
    // SKKJ2
    function getSKKJdua($id){
        $sql = "select 
        skkj2.*,
        ps.*,
        lp.*,
        case when ps.kelamin = 'L' then 'Laki-Laki' else 'Perempuan' end jenis_kelamin,        
        ps.id as no_rm,
        ps.nama as nama_pasien, 
        ps.alamat as alamat_pasien, 
        ps.tanggal_lahir as tanggal_lahir,       
        pg.nama as nama_dokter, 
        dg.golongan_sebab_sakit_lain as keterangan,
        COALESCE(pg.nip, '') as nip_dokter
        from sm_layanan_pendaftaran as lp
        left join sm_diagnosa dg on dg.id_layanan_pendaftaran = lp.id 
        left join sm_form_skkj_2 skkj2 on skkj2.id_layanan_pendaftaran = lp.id     
        left join sm_pendaftaran p on lp.id_pendaftaran = p.id 
        left join sm_pasien ps on p.id_pasien = ps.id
        left join sm_tenaga_medis tm on tm.id = skkj2.dokter_skkj_2
        left join sm_pegawai pg on pg.id = tm.id_pegawai   
        where lp.id = '" . $id . "'";
        return $this->db->query($sql)->row();
    }
    
    // SKKJ3
    function getSKKJtiga($id){
        $sql = "select 
        skkj3.*,
        ps.*,
        lp.*,
        case when ps.kelamin = 'L' then 'Laki-Laki' else 'Perempuan' end jenis_kelamin,        
        ps.id as no_rm,
        ps.nama as nama_pasien, 
        ps.alamat as alamat_pasien, 
        ps.tanggal_lahir as tanggal_lahir,       
        pg.nama as nama_dokter, 
        dg.golongan_sebab_sakit_lain as keterangan,
        COALESCE(pg.nip, '') as nip_dokter
        from sm_layanan_pendaftaran as lp 
        left join sm_diagnosa dg on dg.id_layanan_pendaftaran = lp.id
        left join sm_form_skkj_3 skkj3 on skkj3.id_layanan_pendaftaran = lp.id     
        left join sm_pendaftaran p on lp.id_pendaftaran = p.id 
        left join sm_pasien ps on p.id_pasien = ps.id
        left join sm_tenaga_medis tm on tm.id = skkj3.dokter_skkj_3
        left join sm_pegawai pg on pg.id = tm.id_pegawai   
        where lp.id = '" . $id . "'";
        return $this->db->query($sql)->row();
    }

    // SKB
    function getKelaikanBekerja($id_layanan_pendaftaran) {
        $sql = "SELECT 
                skb.*,
                ps.*,
                lp.*,
                CASE WHEN ps.kelamin = 'L' THEN 'Laki-Laki' ELSE 'Perempuan' END AS jenis_kelamin,        
                ps.id AS no_rm,
                ps.nama AS nama_pasien, 
                ps.alamat AS alamat_pasien, 
                ps.tanggal_lahir AS tanggal_lahir,  
                pk.nama AS nama_pekerjaan, 
                an.tinggi_badan, 
                an.berat_badan, 
                an.tensi_sistolik, 
                an.tensi_diastolik, 
                an.nadi,
                an.rr,
                pg1.nama AS nama_dokter,
                pg1.tanda_tangan AS consentid,
                tmd.no_sip AS sip_dokter,
                dg.golongan_sebab_sakit_lain AS keterangan,
                COALESCE(pg1.nip, '') AS nip_dokter
            FROM sm_layanan_pendaftaran AS lp 
            LEFT JOIN sm_mcu_16_00 skb ON skb.id_layanan_pendaftaran = lp.id     
            LEFT JOIN sm_pendaftaran p ON lp.id_pendaftaran = p.id 
            LEFT JOIN sm_diagnosa dg ON dg.id_layanan_pendaftaran = lp.id AND dg.prioritas = 'Utama'
            LEFT JOIN sm_pasien ps ON p.id_pasien = ps.id
            LEFT JOIN sm_pekerjaan pk ON ps.id_pekerjaan = pk.id
            LEFT JOIN sm_anamnesa an on an.id_layanan_pendaftaran = lp.id
            LEFT JOIN sm_tenaga_medis tmd ON tmd.id = skb.dokter_sepesialis_skb  
            LEFT JOIN sm_pegawai pg1 ON pg1.id = tmd.id_pegawai 
            WHERE lp.id = '" . $id_layanan_pendaftaran . "'";
        return $this->db->query($sql)->row();
    }

    // Laporan pemeriksaan kesehatan
    function getLpkByID($id)
    {
        // var_dump($id);die;
        return $this->db
            ->select("lpk.*, COALESCE(sp.nama, '') as nama_dokter, sp.nip")
            ->from('sm_mcu_18_00 as lpk')
            ->join('sm_layanan_pendaftaran as lp', 'lp.id = lpk.id_layanan_pendaftaran')
            ->join('sm_pendaftaran as pd', 'pd.id = lp.id_pendaftaran')
            ->join('sm_tenaga_medis as stm', 'stm.id = lpk.lpk_dokter', 'left')
            ->join('sm_pegawai as sp', 'sp.id = stm.id_pegawai', 'left')
            ->where('lpk.id', $id)
            ->order_by('lpk.lpk_tanggal desc')
            ->get()
            ->row();
        $this->db->close();
    }

	function getLpkByLayPendaftaran($id_layanan_pendaftaran)
    {
        return $this->db
            ->select("lpk.*, COALESCE(sp.nama, '') as nama_dokter, sp.nip")
            ->from('sm_mcu_18_00 as lpk')
            ->join('sm_layanan_pendaftaran as lp', 'lp.id = lpk.id_layanan_pendaftaran')
            ->join('sm_pendaftaran as pd', 'pd.id = lp.id_pendaftaran')
            ->join('sm_tenaga_medis as stm', 'stm.id = lpk.lpk_dokter', 'left')
            ->join('sm_pegawai as sp', 'sp.id = stm.id_pegawai', 'left')
            ->where('lpk.id_layanan_pendaftaran', $id_layanan_pendaftaran)
            ->order_by('lpk.lpk_tanggal desc')
            ->get()
            ->row();
        $this->db->close();
    }
	
    // SKM ini nama dokter ada yang narik data 
    function getSKM($id_layanan_pendaftaran){
        $sql = "select 
            skm.*,
            ps.*,
            lp.*,
            case when ps.kelamin = 'L' then 'Laki-Laki' else 'Perempuan' end jenis_kelamin,        
            ps.id as no_rm,
            ps.nama as nama_pasien, 
            ps.alamat as alamat_pasien, 
            ps.tanggal_lahir as tanggal_lahir,  
            pk.nama as nama_pekerjaan,         
            pg.nama as nama_dokter, 
            pg1.nama as dokter_nama, 
            sj1.nama as jabatan,
            dg.golongan_sebab_sakit_lain as keterangan,
            COALESCE(pg.nip, '') as nip_dokter
        from sm_layanan_pendaftaran as lp 
        left join sm_form_skm skm on skm.id_layanan_pendaftaran = lp.id     
        left join sm_pendaftaran p on lp.id_pendaftaran = p.id 
        left join sm_diagnosa dg on dg.id_layanan_pendaftaran = lp.id
        left join sm_pasien ps on p.id_pasien = ps.id
        left join sm_pekerjaan pk on ps.id_pekerjaan = pk.id
        left join sm_tenaga_medis tm on tm.id = skm.dokter_skm
        left join sm_pegawai pg on pg.id = tm.id_pegawai       
        left join sm_tenaga_medis tm1 on tm1.id = lp.id_dokter
        left join sm_pegawai pg1 on pg1.id = tm1.id_pegawai
        left join sm_jabatan sj1 on sj1.id = pg1.id_jabatan  
        where lp.id = '" . $id_layanan_pendaftaran .  "' and dg.prioritas = 'Utama'";
        return $this->db->query($sql)->row();
    }

    // SKD 
    // function getSuratKeteranganDisabilitas($id_layanan_pendaftaran){
    //     // var_dump($id_layanan_pendaftaran);die;
    //     $sql = "select 
    //         skd.*,
    //         ps.*,
    //         lp.*,
    //         case when ps.kelamin = 'L' then 'Laki-Laki' else 'Perempuan' end jenis_kelamin,        
    //         ps.id as no_rm,
    //         ps.nama as nama_pasien, 
    //         ps.alamat as alamat_pasien, 
    //         ps.tanggal_lahir as tanggal_lahir,  
    //         pk.nama as nama_pekerjaan, 
    //         pg.nama as nama_dokter,
    //         pg.tanda_tangan as consentid,  
    //         dg.golongan_sebab_sakit_lain as keterangan,
    //         COALESCE(pg.nip, '') as nip_dokter
    //     from sm_layanan_pendaftaran as lp 
    //     left join sm_surat_keterangan_disabilitas skd on skd.id_layanan_pendaftaran = lp.id     
    //     left join sm_pendaftaran p on lp.id_pendaftaran = p.id 
    //     left join sm_diagnosa dg on dg.id_layanan_pendaftaran = lp.id
    //     left join sm_pasien ps on p.id_pasien = ps.id
    //     left join sm_pekerjaan pk on ps.id_pekerjaan = pk.id
    //     left join sm_tenaga_medis tm on tm.id = skd.dokterskd
    //     left join sm_pegawai pg on pg.id = tm.id_pegawai 
    //     where lp.id = '" . $id_layanan_pendaftaran .  "' and dg.prioritas = 'Utama'";
    //     return $this->db->query($sql)->row();
    // }

    // SKTD
    // function getSuratKeteranganTidakDisabilitas($id_layanan_pendaftaran){
    //     // var_dump($id_layanan_pendaftaran);die;
    //     $sql = "select 
    //         sktd.*,
    //         ps.*,
    //         lp.*,
    //         case when ps.kelamin = 'L' then 'Laki-Laki' else 'Perempuan' end jenis_kelamin,        
    //         ps.id as no_rm,
    //         ps.nama as nama_pasien, 
    //         ps.alamat as alamat_pasien, 
    //         ps.tanggal_lahir as tanggal_lahir,  
    //         pk.nama as nama_pekerjaan, 
    //         pg.nama as nama_dokter,
    //         pg.tanda_tangan as consentid,  
    //         dg.golongan_sebab_sakit_lain as keterangan,
    //         COALESCE(pg.nip, '') as nip_dokter
    //     from sm_layanan_pendaftaran as lp 
    //     left join sm_surat_keterangan_tidak_disabilitas sktd on sktd.id_layanan_pendaftaran = lp.id     
    //     left join sm_pendaftaran p on lp.id_pendaftaran = p.id 
    //     left join sm_diagnosa dg on dg.id_layanan_pendaftaran = lp.id
    //     left join sm_pasien ps on p.id_pasien = ps.id
    //     left join sm_pekerjaan pk on ps.id_pekerjaan = pk.id
    //     left join sm_tenaga_medis tm on tm.id = sktd.doktersktd
    //     left join sm_pegawai pg on pg.id = tm.id_pegawai 
    //     where lp.id = '" . $id_layanan_pendaftaran .  "' and dg.prioritas = 'Utama'";
    //     return $this->db->query($sql)->row();
    // }

    // SKD BARU
    function getSuratKeteranganDisabilitas($id_layanan_pendaftaran) {
        $sql = "SELECT 
                skd.*,
                ps.*,
                lp.*,
                CASE WHEN ps.kelamin = 'L' THEN 'Laki-Laki' ELSE 'Perempuan' END AS jenis_kelamin,        
                ps.id AS no_rm,
                ps.nama AS nama_pasien, 
                ps.alamat AS alamat_pasien, 
                ps.tanggal_lahir AS tanggal_lahir,  
                pk.nama AS nama_pekerjaan, 
                pg.nama AS nama_dokter,
                tm.no_sip AS sip_dokter,
                pg.tanda_tangan AS consentid,  
                dg.golongan_sebab_sakit_lain AS keterangan,
                COALESCE(pg.nip, '') AS nip_dokter
            FROM sm_layanan_pendaftaran AS lp 
            LEFT JOIN sm_surat_keterangan_disabilitas skd ON skd.id_layanan_pendaftaran = lp.id     
            LEFT JOIN sm_pendaftaran p ON lp.id_pendaftaran = p.id 
            LEFT JOIN sm_diagnosa dg ON dg.id_layanan_pendaftaran = lp.id AND dg.prioritas = 'Utama'
            LEFT JOIN sm_pasien ps ON p.id_pasien = ps.id
            LEFT JOIN sm_pekerjaan pk ON ps.id_pekerjaan = pk.id
            LEFT JOIN sm_tenaga_medis tm ON tm.id = skd.dokterskd
            LEFT JOIN sm_pegawai pg ON pg.id = tm.id_pegawai 
            WHERE lp.id = '" . $id_layanan_pendaftaran . "'";
        return $this->db->query($sql)->row();
    }

    // SKTD BARU
    function getSuratKeteranganTidakDisabilitas($id_layanan_pendaftaran) {
        $sql = "SELECT 
                sktd.*,
                ps.*,
                lp.*,
                CASE WHEN ps.kelamin = 'L' THEN 'Laki-Laki' ELSE 'Perempuan' END AS jenis_kelamin,        
                ps.id AS no_rm,
                ps.nama AS nama_pasien, 
                ps.alamat AS alamat_pasien, 
                ps.tanggal_lahir AS tanggal_lahir,  
                pk.nama AS nama_pekerjaan, 
                pg.nama AS nama_dokter,
                tm.no_sip AS sip_dokter,
                pg.tanda_tangan AS consentid,  
                dg.golongan_sebab_sakit_lain AS keterangan,
                COALESCE(pg.nip, '') AS nip_dokter
            FROM sm_layanan_pendaftaran AS lp 
            LEFT JOIN sm_surat_keterangan_tidak_disabilitas sktd ON sktd.id_layanan_pendaftaran = lp.id     
            LEFT JOIN sm_pendaftaran p ON lp.id_pendaftaran = p.id 
            LEFT JOIN sm_diagnosa dg ON dg.id_layanan_pendaftaran = lp.id AND dg.prioritas = 'Utama'
            LEFT JOIN sm_pasien ps ON p.id_pasien = ps.id
            LEFT JOIN sm_pekerjaan pk ON ps.id_pekerjaan = pk.id
            LEFT JOIN sm_tenaga_medis tm ON tm.id = sktd.doktersktd
            LEFT JOIN sm_pegawai pg ON pg.id = tm.id_pegawai 
            WHERE lp.id = '" . $id_layanan_pendaftaran . "'";
        return $this->db->query($sql)->row();
    }
    
          
    // HPDO BARU
    function getHasilPemeriksaanDokterOkupasi($id_layanan_pendaftaran) {
        $sql = "SELECT hpdo.*, pg.nama as nama_dokter, pg.nip, pg.tanda_tangan as consentid, pg.nama as petugas
        FROM sm_hasil_pemeriksaan_dokter_okupasih as hpdo
        JOIN sm_tenaga_medis tm ON tm.ID = hpdo.dokter_hpdo
        JOIN sm_pegawai pg ON pg.ID = tm.id_pegawai
        join sm_translucent st ON hpdo.id_user = st.id      
        WHERE id_layanan_pendaftaran = '" . $id_layanan_pendaftaran . "'";       
        return $this->db->query($sql)->row();
    }

    // HPDO BARU LOGS
    function insertHasilPemeriksaanDokterOkupasiLog($oldData){
        $log = array(
            'id_layanan_pendaftaran'    => $oldData->id_layanan_pendaftaran,
            'id_user'                   => $oldData->id_user,
            'id_pendaftaran'            => $oldData->id_pendaftaran,
            'pekerjaany_hpdo'           => $oldData->pekerjaany_hpdo,
            'uraian_hpdo'               => $oldData->uraian_hpdo,
            'masakerja_hpdo'            => $oldData->masakerja_hpdo,
            'keterangan_hpdo'           => $oldData->keterangan_hpdo,
            'keluhan_hpdo'              => $oldData->keluhan_hpdo,
            'bising_hpdo'               => $oldData->bising_hpdo,
            'ketinggian_hpdo'           => $oldData->ketinggian_hpdo,
            'gtubuh_hpdo'               => $oldData->gtubuh_hpdo,
            'gtangan_hpdo'              => $oldData->gtangan_hpdo,
            'suhu_hpdo'                 => $oldData->suhu_hpdo,
            'radiasi_hpdo'              => $oldData->radiasi_hpdo,
            'lain_hpdo'                 => $oldData->lain_hpdo,
            'debu_hpdo'                 => $oldData->debu_hpdo,
            'zatkimia_hpdo'             => $oldData->zatkimia_hpdo,
            'pestisida_hpdo'            => $oldData->pestisida_hpdo,
            'asap_hpdo'                 => $oldData->asap_hpdo,
            'lainn_hpdo'                => $oldData->lainn_hpdo,
            'bakteri_hpdo'              => $oldData->bakteri_hpdo,
            'virus_hpdo'                => $oldData->virus_hpdo,
            'parasit_hpdo'              => $oldData->parasit_hpdo,
            'jamur_hpdo'                => $oldData->jamur_hpdo,
            'lainnya_hpdo'              => $oldData->lainnya_hpdo,
            'gberulang_hpdo'            => $oldData->gberulang_hpdo,
            'angkat_hpdo'               => $oldData->angkat_hpdo,
            'berdiri_hpdo'              => $oldData->berdiri_hpdo,
            'duduk_hpdo'                => $oldData->duduk_hpdo,
            'posisi_hpdo'               => $oldData->posisi_hpdo,
            'pencahayaan_hpdo'          => $oldData->pencahayaan_hpdo,
            'bekerja_hpdo'              => $oldData->bekerja_hpdo,
            'laint_hpdo'                => $oldData->laint_hpdo,
            'bebankerja_hpdo'           => $oldData->bebankerja_hpdo,
            'kerjagilir_hpdo'           => $oldData->kerjagilir_hpdo,
            'ketidakjelasan_hpdo'       => $oldData->ketidakjelasan_hpdo,
            'pekerjaan_monoton_hpdo'    => $oldData->pekerjaan_monoton_hpdo,
            'konflik_kerja_hpdo'        => $oldData->konflik_kerja_hpdo,
            'tuntutan_hpdo'             => $oldData->tuntutan_hpdo,
            'ketaksaan'                 => $oldData->ketaksaan,
            'konflikk'                  => $oldData->konflikk,
            'kuantitatif'               => $oldData->kuantitatif,
            'kualitatif'                => $oldData->kualitatif,
            'pengembang'                => $oldData->pengembang,
            'tanggungjewab'             => $oldData->tanggungjewab,
            'kesimpulanhpdo'            => $oldData->kesimpulanhpdo,
            'saranhpdo'                 => $oldData->saranhpdo,
            'tanggal_hpdo'              => $oldData->tanggal_hpdo,
            'dokter_hpdo'               => $oldData->dokter_hpdo,            
            'created_at'                => $oldData->created_at, // Ini yang benar
            'updated_on'                => $oldData->updated_on,
            'log_created_at'            => date('Y-m-d H:i:s') // Ini waktu log dicatat
        );
        $this->db->insert('sm_hasil_pemeriksaan_dokter_okupasih_logs', $log);
    }



}

/* End of file Pendaftaran_poliklinik_model.php */