<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Protokol_terapi_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
        $this->datetime = date('Y-m-d H:i:s');
    }

    function sqlProtokolTrapi($idpasien)
    {
        $this->db->select("id_lay_pend, array_to_string(array_agg(nama_tind), ', ')  nama_tind,tgl,dokter
                        from 
                        (SELECT ps.id,ps.nama ,pn.id id_pend,lpn.id id_lay_pend, l.nama nama_tind,
                        to_char(lpn.tanggal_periksa, 'DD-MM-YYYY') tgl,
                        (select nama from sm_pegawai where 
                        id=(select id_pegawai from sm_tenaga_medis where id=lpn.id_dokter)) dokter
                        FROM sm_pasien ps
                        inner join sm_pendaftaran pn on ps.id=pn.id_pasien
                        left join sm_layanan_pendaftaran lpn on pn.id=lpn.id_pendaftaran
                        left join sm_tarif_tindakan_pasien ttp on lpn.id=ttp.id_layanan_pendaftaran
                        left join sm_tarif_pelayanan as tp ON tp.id = ttp.id_tarif_pelayanan
                        left join sm_layanan as l ON l.id = tp.id_layanan
                        where ps.id='$idpasien' 
                        ) z GROUP BY id_lay_pend,tgl,dokter order by tgl desc ", false); 

       $result['data'] = $this->db->get()->result();
       return $result;
    }

    function simpan_rehab($data){

        $this->db->insert('sm_rehab_medik', $data);

    }

    function simpan_kunjungan($data){

        $this->db->insert('sm_rehab_medik_kunjungan', $data);

    }

    function getTerapiProtokol($id_layanan_pendaftaran)
    {
        $this->db->select("srm.catatan, srm.catatan_dokter, coalesce(pg.nama, '') as operator")
                    ->from('sm_rehab_medik as srm')
                    ->join('sm_tenaga_medis as tm', 'tm.id = srm.id_operator', 'left')
                    ->join('sm_pegawai as pg', 'pg.id = tm.id_pegawai', 'left')
                    ->where('srm.id_layanan_pendaftaran', $id_layanan_pendaftaran, true);
        
        return $this->db->get()->result();
        $this->db->close();
    }

    function getDiagnosaTerapi($id_pasien)
    {
        return $this->db->select("ps.*, gss.nama as item")
                        ->from('sm_pasien as ps')
                        ->join('sm_pendaftaran as pdf', 'ps.id = pdf.id_pasien', 'left')
                        ->join('sm_layanan_pendaftaran as slp', 'pdf.id = slp.id_pendaftaran', 'left')
                        ->join('sm_diagnosa as dg', 'slp.id = dg.id_layanan_pendaftaran', 'left')
                        ->join('sm_golongan_sebab_sakit as gss', 'gss.id = dg.id_golongan_sebab_sakit', 'left')
                        ->where('ps.id', $id_pasien, true)
                        ->order_by('dg.id', 'asc')
                        ->get()
                        ->result();
        $this->db->close();
    } 

    function getTerapiKunjungan($id_kunjungan)
    {
            return $this->db->select("srmk.id as idk, srmk.status, srmk.tanggal, srmk.tanggal_stop, srmk.total_kunjungan as total")
                    ->from('sm_rehab_medik_kunjungan as srmk')
                    ->where('srmk.id', $id_kunjungan, true)
                    ->order_by('srmk.id', 'desc')
                    ->limit(1)
                    ->get()
                    ->result();
        $this->db->close();
    }

    function getDiagnosa($id_layanan_pendaftaran)
    {
        return $this->db->select("dg.id_golongan_sebab_sakit, gss.nama as item")
                        ->from('sm_diagnosa as dg')
                        ->join('sm_golongan_sebab_sakit as gss', 'gss.id = dg.id_golongan_sebab_sakit', 'left')
                        ->where('dg.id_layanan_pendaftaran', $id_layanan_pendaftaran, true)
                        ->limit(1)
                        ->get()
                        ->result();
        $this->db->close();
    } 

    function getListDataKunjungan($no_rm)
    {
        return $this->db->select("srmk.id, date(srmk.tanggal) as tanggal_kunjungan, srmk.total_kunjungan as total")
                        ->from('sm_rehab_medik_kunjungan as srmk')
                        ->where('srmk.id_pasien', $no_rm, true)
                        ->order_by('srmk.id', 'desc')
                        ->get()
                        ->result();
        $this->db->close();
    }

    function getFirstDataKunjungan($no_rm)
    {
        return $this->db->select("srmk.id, date(srmk.tanggal) as tanggal_kunjungan, srmk.total_kunjungan as total")
                        ->from('sm_rehab_medik_kunjungan as srmk')
                        ->where('srmk.id_pasien', $no_rm, true)
                        ->order_by('srmk.id', 'desc')
                        ->limit(1,0)
                        ->get()
                        ->row();
        $this->db->close();
    }

    function getDataKunjungan($id_kunjungan) {
        return $this->db->select("srmk.id, date(srmk.tanggal) as tanggal_kunjungan, p.nama, srmk.status, srmk.total_kunjungan as total")
                        ->from('sm_rehab_medik_kunjungan as srmk')
                        ->join('sm_pasien as p', 'p.id = srmk.id_pasien', 'left')
                        ->where('srmk.id', $id_kunjungan, true)
                        ->get()
                        ->row();
        $this->db->close();
    }

    function getLayananKunjungan($id_kunjungan)
    {
        
        $this->db->select("srmk.id, date(srmk.tanggal) as tanggal_kunjungan, srmk.total_kunjungan as total,
                            (null) as tindakan", true);
        $this->db->from('sm_rehab_medik_kunjungan as srmk');
        $this->db->where('srmk.id', $id_kunjungan, true);
        $this->db->order_by('srmk.id');

        $data = $this->db->get()->result();
        foreach ($data as $i => $v) :
            $v->tindakan = $this->getTarifTindakan($v->id);
        endforeach;

        return $data;
    }

    function getTarifTindakan($id_kunjungan)
    {
        $this->db->select("srms.tanggal, l.nama as item,
                            srms.id_operator as operator, srms.keterangan, srm.catatan_dokter, srm.catatan");
        $this->db->from("sm_rehab_medik_status as srms");
        $this->db->join("sm_tarif_tindakan_pasien as ttp", "ttp.id = srms.id_tindakan", "left");
        $this->db->join("sm_rehab_medik as srm", "srm.id = srms.id_rehab_medik", "left");
        $this->db->join("sm_tarif_pelayanan as tp", "tp.id = ttp.id_tarif_pelayanan", "left");
        $this->db->join("sm_layanan as l", "l.id = tp.id_layanan", "left");
        $this->db->join("sm_layanan_pendaftaran as lp", "lp.id = ttp.id_layanan_pendaftaran", "left");
        $this->db->where('srms.id_kunjungan', $id_kunjungan);
        $this->db->order_by('srms.tanggal');
        return $this->db->get()->result();
    }

    function getDataPasienKunjungan($id_kunjungan)
    {       
        $this->db->select('p.id, p.nama, p.tanggal_lahir, p.kelamin, srmk.total_kunjungan as total, gss.nama as item')
            ->from('sm_rehab_medik_kunjungan as srmk')
            ->join('sm_layanan_pendaftaran as lp', 'lp.id = srmk.id_layanan_pendaftaran', 'left')
            ->join('sm_pendaftaran as pdf', 'pdf.id = lp.id_pendaftaran', 'left')
            ->join('sm_pasien as p', 'p.id = pdf.id_pasien', 'left')
            ->join('sm_diagnosa as dg', 'dg.id_layanan_pendaftaran = srmk.id_layanan_pendaftaran', 'left')
            ->join('sm_golongan_sebab_sakit as gss', 'gss.id = dg.id_golongan_sebab_sakit', 'left')
            ->where('srmk.id', $id_kunjungan, true);
        return $this->db->get()->row();
    }

    function getDataRiwayatKunjungan($id_kunjungan)
    {       
        $this->db->select('lp.tanggal_periksa as tanggal, l.nama as item')
            ->from('sm_rehab_medik_status as srms')
            ->join('sm_tarif_tindakan_pasien as ttp', 'ttp.id = srms.id_tindakan', 'left')
            ->join("sm_tarif_pelayanan as tp", "tp.id = ttp.id_tarif_pelayanan", "left")
            ->join("sm_layanan as l", "l.id = tp.id_layanan", "left")
            ->join('sm_layanan_pendaftaran as lp', 'lp.id = ttp.id_layanan_pendaftaran', 'left')
            ->where('srms.id_kunjungan', $id_kunjungan);
        return $this->db->get()->result();
    }

    function getDoctorName($id_layanan_pendaftaran)
    {
        $this->db->select("pg.nama as operator")
                    ->from('sm_rehab_medik as srm')
                    ->join('sm_tenaga_medis as tm', 'tm.id = srm.id_operator', 'left')
                    ->join('sm_pegawai as pg', 'pg.id = tm.id_pegawai', 'left')
                    ->where('srm.id_layanan_pendaftaran', $id_layanan_pendaftaran, true);
        
        return $this->db->get()->row();
        
    }
    
    function getDataPasienById($id)
    {       
        $this->table = 'sm_pasien as p';
         $this->db->select("p.*,
                            coalesce(pd.nama, '') as pendidikan,
                            coalesce(pk.nama, '') as pekerjaan")
            ->from($this->table)
            ->join('sm_pendidikan as pd', 'pd.id = p.id_pendidikan')
            ->join('sm_pekerjaan as pk', 'pk.id = p.id_pekerjaan', 'left')
            ->where('p.id', $id, true);

        return $this->db->get()->row();
    }

    function dataAwalRehabMedik($id)
	{
        $sql1 = "with data as (
                    SELECT 
                    ROW_NUMBER() over( order by pd.id) as num,
                        max(pd.id) over () as max_pd_id,
                        pa.id AS no_rm,
                        slp.id AS id_layanan_pendaftaran,
                        pd.id AS id_pendaftaran,
                        rmf.id_rmf AS id_rmf,
                        rmf.rmf_status,
                        pd.tanggal_daftar AS tanggal_pelayanan,
                        pa.nama AS nama,
                        pa.telp AS telp,
                        sa.id AS id_anamnesa,
                        sa.keluhan_utama,
                        sa.keadaan_umum,
                        sa.kesadaran,
                        sa.gcs,
                        sa.rr,
                        sa.tensi_sistolik,
                        sa.tensi_diastolik,
                        sa.suhu,
                        sa.nadi,
                        sa.nps,
                        sa.tinggi_badan,
                        sa.berat_badan,
                        sa.kepala,
                        sa.leher,
                        sa.thorax,
                        sa.pulmo,
                        sa.cor,
                        sa.abdomen,
                        sa.genitalia,
                        sa.ekstrimitas,
                        sa.pemeriksaan_penunjang,
                        sa.prognosis,
                        sa.status_mentalis,
                        sa.lingkar_kepala,
                        sa.status_gizi,
                        sa.telinga,
                        sa.hidung,
                        sa.tenggorok,
                        sa.mata,
                        sa.kulit_kelamin,
                        sa.usul_tindak_lanjut
                    FROM sm_pasien pa
                    JOIN sm_pendaftaran pd ON pa.id = pd.id_pasien
                    JOIN sm_layanan_pendaftaran slp ON pd.id = slp.id_pendaftaran
                    LEFT JOIN sm_rehab_medik_form rmf ON pd.id = rmf.id_pendaftaran
                    JOIN sm_anamnesa sa ON slp.id = sa.id_layanan_pendaftaran
                    WHERE pa.id = '" . $id . "'
                    ORDER BY pd.id asc
                    ), baris as (
                    select case when rmf_status = 1 then num+1 else num end as num from data where ( rmf_status = 1 or num = 1) order by rmf_status limit 1
                    )
                    select * from data d
                    join baris b on d.num = b.num 

                ";
        return $this->db->query($sql1)->row();

	}

    function getJadwalProgram($id, $no_rm)
    {
        $sql = "WITH RankedData AS (
                    SELECT 
                        pd.id AS id_pendaftaran,
                        lp.id AS id_layanan_pendaftaran,
                        pa.id AS id_pasien,
                        pd.tanggal_daftar AS tanggal_daftar,
                        st.tanggal AS tanggal_tindakan,
                        STRING_AGG(sl.nama, ', ') AS nama_tindakan,
                        rmf.rmf_status,
                        CASE 
                            WHEN rmf.rmf_status = 1 THEN 1
                            ELSE 0
                        END AS is_rmf_status_1,
                        ROW_NUMBER() OVER (ORDER BY pd.id DESC) AS rn
                    FROM 
                        sm_pendaftaran pd
                    JOIN 
                        sm_layanan_pendaftaran lp ON lp.id_pendaftaran = pd.id
                    JOIN 
                        sm_pasien pa ON pa.id = pd.id_pasien
                    JOIN (
                        SELECT 
                            st.id_layanan_pendaftaran,
                            st.id_tarif_pelayanan,
                            CAST(st.tanggal AS date) AS tanggal 
                        FROM 
                            sm_tarif_tindakan_pasien st
                    ) st ON st.id_layanan_pendaftaran = lp.id
                    JOIN 
                        sm_tarif_pelayanan tp ON tp.id = st.id_tarif_pelayanan
                    JOIN 
                        sm_layanan sl ON sl.id = tp.id_layanan
                    LEFT JOIN 
                        sm_rehab_medik_form rmf ON rmf.id_pendaftaran = pd.id
                    WHERE 
                        pd.id_pasien = '" . $no_rm . "'
                    AND pd.id <= (
                        SELECT pd2.id
                        FROM sm_pendaftaran pd2
                        WHERE pd2.id = '" . $id . "'
                    )
                    GROUP BY 
                        pd.id, lp.id, pa.id, st.tanggal, rmf.rmf_status
                    )
                    SELECT 
                        id_pendaftaran, 
                        id_layanan_pendaftaran, 
                        id_pasien, 
                        tanggal_daftar, 
                        tanggal_tindakan, 
                        nama_tindakan, 
                        rmf_status
                    FROM 
                        RankedData
                        
                    WHERE 
                        (
                            (is_rmf_status_1 = 0 OR is_rmf_status_1 IS NULL) 
                            AND rn <= (
                                SELECT 
                                    MIN(rn)
                                FROM 
                                    RankedData
                                WHERE 
                                    is_rmf_status_1 = 1
                            )
                        )
                    OR NOT EXISTS (
                        SELECT 1
                        FROM RankedData
                        WHERE is_rmf_status_1 = 1
                    )
                    ORDER BY tanggal_daftar asc
                    limit 10;

                ";
		return $this->db->query($sql)->result();
	}
    
    function getDiagnosaSekunder($id)
	{
        // var_dump($id);die;
		$sql = "select pd.id as id_pendaftaran, slp.id, sd.prioritas as prioritas, sgs.nama as sebab_sakit, sd.golongan_sebab_sakit_lain as sebab_sakit_lain
                from sm_layanan_pendaftaran slp
                join sm_pendaftaran pd ON pd.id = slp.id_pendaftaran
                join sm_diagnosa sd ON sd.id_layanan_pendaftaran = slp.id
                join sm_golongan_sebab_sakit sgs ON sgs.id = sd.id_golongan_sebab_sakit
                where pd.id  = '" . $id . "'
                and prioritas = 'Sekunder'
                ";
		return $this->db->query($sql)->result();
	}

    function getDataMedik($id)
	{
        // var_dump($id);die;
		$sql = "SELECT rmf.*, pd.id, slp.id, p.nama AS nama_dokter_frm
                FROM sm_rehab_medik_form rmf
                LEFT JOIN sm_layanan_pendaftaran slp ON rmf.id_layanan_pendaftaran = slp.id		
                LEFT JOIN sm_pendaftaran pd ON slp.id_pendaftaran = pd.id
                LEFT JOIN sm_tenaga_medis tm ON rmf.rmf_dokter = tm.id
                LEFT JOIN sm_pegawai p ON tm.id_pegawai = p.id
                LEFT JOIN sm_translucent st ON rmf.id_users = st.id
                WHERE pd.id = '" . $id . "'
                AND slp.id_unit_layanan = '34'
                ";

		return $this->db->query($sql)->row();
	}

    function getCetakFormRehabMedik($id)
	{
        // var_dump($id);die;
        $sql = "
                select rmf.*, p.nama as nama_dokter_frm, pa.id as no_rm, pa.nama as nama, pa.tanggal_lahir as tanggal_lahir, pa.alamat as alamat, pa.telp as telp
                from sm_rehab_medik_form rmf
                join sm_layanan_pendaftaran slp ON rmf.id_layanan_pendaftaran = slp.id
                join sm_pendaftaran pd ON slp.id_pendaftaran = pd.id
                join sm_pasien pa ON pa.id = pd.id_pasien
                left join sm_tenaga_medis tm ON rmf.rmf_dokter = tm.id
                left join sm_pegawai p ON tm.id_pegawai = p.id
                left join sm_translucent st ON rmf.id_users = st.id
                where pd.id  = '" . $id . "'
                ";
                

		return $this->db->query($sql)->result();
	}

    function getHistoryRehabMedik($id)
	{
        // var_dump($id);die;
        $sql = "
                select rmfl.*, p.nama as nama_dokter_frm, pa.id as no_rm, pa.nama as nama, pa.tanggal_lahir as tanggal_lahir, pa.alamat as alamat, pa.telp as telp, st.account as nama_user
                from sm_rehab_medik_form_log rmfl
                join sm_layanan_pendaftaran slp ON rmfl.id_layanan_pendaftaran = slp.id
                join sm_pendaftaran pd ON slp.id_pendaftaran = pd.id
                join sm_pasien pa ON pa.id = pd.id_pasien
                left join sm_tenaga_medis tm ON rmfl.rmf_dokter = tm.id
                left join sm_pegawai p ON tm.id_pegawai = p.id
                left join sm_translucent st ON rmfl.id_users = st.id
                where pa.id  = '" . $id . "'
                ";
                
		return $this->db->query($sql)->result();
	}

    function getDetailHistoryRehabMedik($id)
	{
        // var_dump($id);die;
        $sql = "
                select rmfl.*, p.nama as nama_dokter_frm, pa.id as no_rm, pa.nama as nama, pa.tanggal_lahir as tanggal_lahir, pa.alamat as alamat, pa.telp as telp, st.account as nama_user
                from sm_rehab_medik_form_log rmfl
                join sm_layanan_pendaftaran slp ON rmfl.id_layanan_pendaftaran = slp.id
                join sm_pendaftaran pd ON slp.id_pendaftaran = pd.id
                join sm_pasien pa ON pa.id = pd.id_pasien
                left join sm_tenaga_medis tm ON rmfl.rmf_dokter = tm.id
                left join sm_pegawai p ON tm.id_pegawai = p.id
                left join sm_translucent st ON rmfl.id_users = st.id
                where rmfl.id_rmf_log  = '" . $id . "'
                ";
                
		return $this->db->query($sql)->row();
	}

    function getCetakDetailHistoryRehabMedik($id)
	{
        // var_dump($id);die;
        $sql = "
                select rmfl.*, p.nama as nama_dokter_frm, pa.id as no_rm, pa.nama as nama, pa.tanggal_lahir as tanggal_lahir, pa.alamat as alamat, pa.telp as telp, st.account as nama_user
                from sm_rehab_medik_form_log rmfl
                join sm_layanan_pendaftaran slp ON rmfl.id_layanan_pendaftaran = slp.id
                join sm_pendaftaran pd ON slp.id_pendaftaran = pd.id
                join sm_pasien pa ON pa.id = pd.id_pasien
                left join sm_tenaga_medis tm ON rmfl.rmf_dokter = tm.id
                left join sm_pegawai p ON tm.id_pegawai = p.id
                left join sm_translucent st ON rmfl.id_users = st.id
                where rmfl.id_rmf_log  = '" . $id . "'
                ";
                
		return $this->db->query($sql)->result();
	}

}

/* End of file Protokol_terapi_model.php */

