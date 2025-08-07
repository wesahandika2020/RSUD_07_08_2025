<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pemeriksaan_poli_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
        $this->datetime = date('Y-m-d H:i:s');
    }

    private function sqlPemeriksaanPoliklinik($search)
    {
        $groupDokter = false;
		if($search['id_dokter'] !== '')
		{
			$groupDokter = $this->db->select('tr.id')->from('sm_translucent tr')
			                        ->join('sm_account_group sg', 'sg.id = tr.id_account_group')
			                        ->where('tr.id', $search['id_dokter'])
			                        ->where('sg.id', 93)
			                        ->get()->row();
		}
		
		if (!empty($search['shifpoli'])) {
            $shifpoli= " (jd.shift_poli = '" . $search['shifpoli'] ."' OR jd.id is null)";
        } else {
            $shifpoli= "";
        }

        $this->db->select("DISTINCT ON (lp.id) lp.*, 
                        pd.tanggal_daftar, pd.tanggal_keluar, 
                        pd.id_pasien, pd.no_register,
						CONCAT_WS(' ', COALESCE(p.status_pasien, ''), p.nama) as nama, 
                        p.tanggal_lahir, p.telp,
                        r.id as id_resep,
                        coalesce(pj.nama, '') as penjamin,
                        coalesce(sp.nama, '') as layanan, 
                        coalesce(pg.nama, '') as dokter, 
                        lp.no_antrian, ab.task_empat, ab.task_lima, pd.keterangan_antrean,
                        sp.kode_bpjs, coalesce(tr.account, '') as user_sep, skk.id id_skk,
                        pd.kode_booking,
                        ab.id as id_antrian_bpjs, ab.no_rm id_pasien_antrian_bpjs, ab.kode_booking kode_booking_antrian_bpjs, ab.no_kartu no_kartu_antrian_bpjs, ab.no_referensi, ab.id_jadwal_dokter, 
                        jd.tanggal tanggal_jadwal, jd.nama_poli nama_poli_jadwal, jd.shift_poli, jd.nama_dokter nama_dokter_jadwal", false);

        $this->db->from('sm_layanan_pendaftaran as lp')
            ->join('sm_pendaftaran as pd', 'pd.id = lp.id_pendaftaran')
            ->join('sm_pasien as p', 'p.id = pd.id_pasien')
            ->join('sm_resep as r', 'r.id_layanan_pendaftaran = lp.id', 'left')
            ->join('sm_antrian_bpjs as ab', 'pd.id = ab.id_pendaftaran', 'left')
            ->join('sm_spesialisasi as sp', 'sp.id = lp.id_unit_layanan', 'left')
            ->join('sm_tenaga_medis as tm', 'tm.id = lp.id_dokter', 'left')
            ->join('sm_pegawai as pg', 'pg.id = tm.id_pegawai', 'left')
            ->join('sm_penjamin as pj', 'pj.id = lp.id_penjamin', 'left')
            ->join('sm_translucent as tr', 'tr.id = lp.id_users_sep', 'left')
            ->join('sm_surat_kontrol as skk', 'skk.id_layanan_pendaftaran=lp.id', 'left')
            ->join('sm_jadwal_dokter jd', "jd.id = ab.id_jadwal_dokter", 'left');

        if (($search['tanggal_awal'] !== '') & ($search['tanggal_akhir'] !== '')) :
            $this->db->where("pd.tanggal_daftar BETWEEN '" . date2mysql($search['tanggal_awal']) . " 00:00:00' AND '" . date2mysql($search['tanggal_akhir']) . " 23:59:59'");
        endif;

		if (($search['tanggal_awal_layanan'] !== '') & ($search['tanggal_akhir_layanan'] !== '')) :
            $this->db->where("lp.tanggal_layanan BETWEEN '" . date2mysql($search['tanggal_awal_layanan']) . " 00:00:00' AND '" . date2mysql($search['tanggal_akhir_layanan']) . " 23:59:59'");
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

        if ($search['id_dokter'] !== '' && !$groupDokter) :
            $this->db->where('pg.id', $search['id_dokter']);
        endif;
		
		if ($shifpoli !== '') :
            $this->db->where($shifpoli);
        endif; 
		
        return $this->db->order_by('lp.id', 'desc');    

        // return $this->db->group_by('lp.id, r.id, pd.tanggal_daftar, pd.tanggal_keluar, pd.id_pasien, pd.no_register, p.nama, p.tanggal_lahir, pj.nama, sp.nama, pg.nama, tr.account, sp.kode_bpjs');
    }

    private function _listPemeriksaanPoliklinik($limit, $start, $search)
    {
        $this->sqlPemeriksaanPoliklinik($search);
        if ($limit !== 0) :
            $this->db->limit($limit, $start);
        endif;

        return $this->db->get()->result();
        // $this->db->get(); echo $this->db->last_query(); exit();
    }

    function getListDataPemeriksaanPoliklinik($limit, $start, $search)
    {
        $data_pemeriksaan = $this->_listPemeriksaanPoliklinik($limit, $start, $search);
        foreach ($data_pemeriksaan as $value) {     
            $value->cek_kode_booking = ($value->kode_booking == $value->kode_booking_antrian_bpjs);
            $value->cek_id_pasien    = ($value->id_pasien  == $value->id_pasien_antrian_bpjs ? true : false);
            $value->cek_no_polish    = ($value->no_polish == $value->no_kartu_antrian_bpjs ? true : false);
            $value->cek_no_rujukan   = ($value->no_rujukan == $value->no_referensi ? true : false);         
        }

        $result['data']   = $data_pemeriksaan;
        $result['jumlah'] = $this->sqlPemeriksaanPoliklinik($search)->get()->num_rows();
        $this->db->close();
        return $result;
    }

    function getDataProfilPasien($id) 
    {   
        $this->db->select("p.*, 
                            concat (EXTRACT(year FROM AGE(p.tanggal_lahir)), ' thn ', EXTRACT(month FROM AGE(p.tanggal_lahir)), ' bln ', EXTRACT(day FROM AGE(p.tanggal_lahir)), ' hari') as umur,
                            coalesce(pd.nama, '') as pendidikan,    
                            coalesce(pk.nama, '') as pekerjaan")    
            ->from('sm_pasien as p')    
            ->join('sm_pendidikan as pd', 'pd.id = p.id_pendidikan')    
            ->join('sm_pekerjaan as pk', 'pk.id = p.id_pekerjaan', 'left')  
            ->where('p.id', $id, true); 
        // $this->db->get(); echo $this->db->last_query(); exit();  
        $result = $this->db->get()->row();  
        $this->db->close(); 
        return $result; 
    }   

    function getListKedatangan($no_rm) {
        $sql = "select pd.id, date(pd.tanggal_daftar) as tanggal_kunjungan
                from sm_pendaftaran as pd
                join sm_layanan_pendaftaran lp on pd.id = lp.id_pendaftaran
                where pd.id_pasien = '" . $no_rm . "'
                and lp.jenis_layanan = 'Poliklinik'
                order by pd.tanggal_daftar desc";

        return $this->db->query($sql)->result();
    }

    function getLayananProfilPasien($no_rm) {
        $this->load->model('pelayanan/Pelayanan_model', 'pelayanan');
        $this->db->select( "lp.jenis_layanan,
            case 
                when lp.jenis_layanan = 'Poliklinik'
                    then concat_ws(' ', 'Klinik', sp.nama)
                else jenis_layanan 
            end as ruang" );
        $this->db->from('sm_layanan_pendaftaran as lp');
        $this->db->join( 'sm_spesialisasi as sp', 'sp.id = lp.id_unit_layanan', 'left', true);
        $this->db->where( 'id_pendaftaran', $no_rm, true );
        $this->db->order_by( 'lp.id' );

        return $this->db->get()->result();
    }

    function ambilDataKedatangan($id_pendaftaran) {
        $this->db->select("pd.id, pd.no_register, date(pd.tanggal_daftar) as tanggal_kunjungan,
                           pd.tanggal_daftar, pd.tanggal_keluar,
                           case when pd.jenis_pendaftaran = 'IGD' 
                                then concat_ws(' ', pd.jenis_pendaftaran, pd.jenis_igd) 
                                else pd.jenis_pendaftaran 
                                end as jenis_pendaftaran,
                           pd.kondisi_keluar, pd.nama_pjwb, pd.telp_pjwb, pd.alamat_pjwb,
                           pd.nama_pjwb_finansial, pd.telp_pjwb_finansial, pd.alamat_pjwb_finansial,
                           pd.status, tr.account as petugas_pendaftaran, (null) as layanan");
        $this->db->from('sm_pendaftaran as pd', true);
        $this->db->join('sm_translucent as tr', 'tr.id = pd.id_users', 'left', true);
        $this->db->where('pd.id', $id_pendaftaran, true );

        return $this->db->get()->row();
    }

    function ambilLayananKedatangan($id_pendaftaran) {
        $this->load->model('pelayanan/Pelayanan_model', 'pelayanan');
        $this->db->select("lp.id, lp.jenis_layanan, lp.tanggal_layanan,
                            coalesce(pg.nama, '') as dokter,
                            case when lp.jenis_layanan = 'Poliklinik'
                                 then concat_ws(' ', 'Klinik', sp.nama)
                                 else lp.jenis_layanan 
                                 end as ruang,
                            case when lp.cara_bayar = 'Tunai'
                                 then lp.cara_bayar
                                 else concat_ws(' ', lp.cara_bayar, pj.nama)
                                 end as cara_bayar,
                            lp.no_sep,  
                            coalesce(lp.tindak_lanjut, '') as tindak_lanjut,
                            (null) as anamnesa", true);
        $this->db->from('sm_layanan_pendaftaran as lp');
        $this->db->join('sm_spesialisasi as sp', 'sp.id = lp.id_unit_layanan', 'left', true);
        $this->db->join('sm_tenaga_medis as tm', 'tm.id = lp.id_dokter', 'left', true);
        $this->db->join('sm_pegawai as pg', 'pg.id = tm.id_pegawai', 'left', true);
        $this->db->join('sm_penjamin as pj', 'pj.id = lp.id_penjamin', 'left', true);
        $this->db->where('lp.id_pendaftaran', $id_pendaftaran, true);
        $this->db->order_by('lp.id');

        $data = $this->db->get()->result();
        foreach ($data as $i => $v) :
            $v->anamnesa     = [];
            $v->diagnosis    = [];
            $v->anamnesa     = $this->pelayanan->getAnamnesa($v->id);
            $v->diagnosis    = $this->pelayanan->getDiagnosaPemeriksaan($v->id);
        endforeach;

        return $data;
    }

    function ambilDetailProfilAnamnesa($id) {
        $sql = "select *
        from sm_anamnesa an where an.id = '" . $id . "' ";

        return $this->db->query($sql)->row();

    }

	function ambilDataKedatanganPRMRJ($no_rm) {
		$this->load->model('pelayanan/Pelayanan_model', 'pelayanan');
		$this->db->select("pd.id,lp.id as id_layanan_pendaftaran, pd.no_register, date(pd.tanggal_daftar) as tanggal_kunjungan,
                           pd.tanggal_daftar, pd.tanggal_keluar,
                           case when pd.jenis_pendaftaran = 'IGD' 
                                then concat_ws(' ', pd.jenis_pendaftaran, pd.jenis_igd) 
                                else pd.jenis_pendaftaran 
                                end as jenis_pendaftaran,
                           pd.kondisi_keluar, pd.nama_pjwb, pd.telp_pjwb, pd.alamat_pjwb,
                           pd.nama_pjwb_finansial, pd.telp_pjwb_finansial, pd.alamat_pjwb_finansial,
                           pd.status, tr.account as petugas_pendaftaran,
                           coalesce(pg.nama, '') as dokter,
                            case when lp.jenis_layanan = 'Poliklinik'
                                 then concat_ws(' ', 'Klinik', sp.nama)
                                 else lp.jenis_layanan 
                                 end as ruang,
                            case when lp.cara_bayar = 'Tunai'
                                 then lp.cara_bayar
                                 else concat_ws(' ', lp.cara_bayar, pj.nama)
                                 end as cara_bayar,
                            lp.no_sep,  
                            coalesce(lp.tindak_lanjut, '') as tindak_lanjut,
                            (null) as anamnesa
                           ");
		$this->db->from('sm_pendaftaran as pd', true);
		$this->db->join('sm_layanan_pendaftaran as lp', 'lp.id_pendaftaran = pd.id');
		$this->db->join('sm_translucent as tr', 'tr.id = pd.id_users', 'left', true);
		$this->db->join('sm_spesialisasi as sp', 'sp.id = lp.id_unit_layanan', 'left', true);
		$this->db->join('sm_tenaga_medis as tm', 'tm.id = lp.id_dokter', 'left', true);
		$this->db->join('sm_pegawai as pg', 'pg.id = tm.id_pegawai', 'left', true);
		$this->db->join('sm_penjamin as pj', 'pj.id = lp.id_penjamin', 'left', true);
		$this->db->where("pd.id_pasien = '$no_rm'");
		$this->db->where("lp.jenis_layanan = 'Poliklinik'");
		$this->db->order_by('lp.id');

		$data = $this->db->get()->result();
		foreach ($data as $i => $v) :
			$v->anamnesa     = [];
			$v->diagnosis    = [];
			$v->anamnesa     = $this->pelayanan->getAnamnesa($v->id_layanan_pendaftaran);
			$v->diagnosis    = $this->pelayanan->getDiagnosaPemeriksaan($v->id_layanan_pendaftaran);
		endforeach;

		return $data;
	}

	function ambilLayananKedatanganPRMRJ($id_pendaftaran) {
		$this->load->model('pelayanan/Pelayanan_model', 'pelayanan');
		$this->db->select("lp.id, lp.jenis_layanan, lp.tanggal_layanan,
                            coalesce(pg.nama, '') as dokter,
                            case when lp.jenis_layanan = 'Poliklinik'
                                 then concat_ws(' ', 'Klinik', sp.nama)
                                 else lp.jenis_layanan 
                                 end as ruang,
                            case when lp.cara_bayar = 'Tunai'
                                 then lp.cara_bayar
                                 else concat_ws(' ', lp.cara_bayar, pj.nama)
                                 end as cara_bayar,
                            lp.no_sep,  
                            coalesce(lp.tindak_lanjut, '') as tindak_lanjut,
                            (null) as anamnesa", true);
		$this->db->from('sm_layanan_pendaftaran as lp');
		$this->db->join('sm_spesialisasi as sp', 'sp.id = lp.id_unit_layanan', 'left', true);
		$this->db->join('sm_tenaga_medis as tm', 'tm.id = lp.id_dokter', 'left', true);
		$this->db->join('sm_pegawai as pg', 'pg.id = tm.id_pegawai', 'left', true);
		$this->db->join('sm_penjamin as pj', 'pj.id = lp.id_penjamin', 'left', true);
		$this->db->where('lp.id_pendaftaran', $id_pendaftaran, true);
		$this->db->order_by('lp.id');

		$data = $this->db->get()->result();
		foreach ($data as $i => $v) :
			$v->anamnesa     = [];
			$v->diagnosis    = [];
			$v->anamnesa     = $this->pelayanan->getAnamnesa($v->id);
			$v->diagnosis    = $this->pelayanan->getDiagnosaPemeriksaan($v->id);
		endforeach;

		return $data;
	}

    // PDIRJRJ
    // function getPendaftaranDetailRM($id_layanan_pendaftaran) 
    // {
    //     return $this->db
    //     ->select('slp.id, pa.*')
    //     ->from('sm_layanan_pendaftaran as slp')
    //     ->join('sm_pendaftaran pd', 'slp.id_pendaftaran = pd.id')
    //     ->join('sm_pasien pa', 'pa.id = pd.id_pasien')
    //     ->where('slp.id', $id_layanan_pendaftaran)
    //     ->get()
    //     ->row();
    // }

    // PDIRJRJ + + 
	function getPengkajianDanIntervensiResikoJatuhRawatJalan($id_pendaftaran){

		return $this->db->select('pdirjrj.*, pgp1.nama as nama_perawat_1, 
                                            pgp2.nama as nama_perawat_2, 
                                            pgp3.nama as nama_perawat_3')
        ->from('sm_pengkajian_dan_intervensi_resiko_jatuh_rajal as pdirjrj')	
        ->join('sm_layanan_pendaftaran as lp', 'lp.id = pdirjrj.id_layanan_pendaftaran')
        ->join('sm_tenaga_medis as tmp1 ', ' tmp1.id = pdirjrj.perawat_pdirjrj_1', 'left')
        ->join('sm_tenaga_medis as tmp2 ', ' tmp2.id = pdirjrj.perawat_pdirjrj_2', 'left')
        ->join('sm_tenaga_medis as tmp3 ', ' tmp3.id = pdirjrj.perawat_pdirjrj_3', 'left')
        ->join('sm_pegawai as pgp1 ', ' pgp1.id = tmp1.id_pegawai', 'left')
        ->join('sm_pegawai as pgp2 ', ' pgp2.id = tmp2.id_pegawai', 'left')
        ->join('sm_pegawai as pgp3 ', ' pgp3.id = tmp3.id_pegawai', 'left')       				
        ->where('lp.id_pendaftaran', $id_pendaftaran, true)
        ->get()
        ->row();
	}

    // PDIRJRJ LOGS +  +
	function getPengkajianDanIntervensiResikoJatuhRawatJalanLogs($id_pendaftaran){
		return $this->db->select('pdirjrj.*, pgp1.nama as nama_perawat_1, 
                                            pgp2.nama as nama_perawat_2, 
                                            pgp3.nama as nama_perawat_3,                                          
                                            pgu.nama as user')
        ->from('sm_pengkajian_dan_intervensi_resiko_jatuh_rajal_logs as pdirjrj')	
        ->join('sm_layanan_pendaftaran as lp', 'lp.id = pdirjrj.id_layanan_pendaftaran')
        ->join('sm_tenaga_medis as tmp1 ', ' tmp1.id = pdirjrj.perawat_pdirjrj_1', 'left')
        ->join('sm_tenaga_medis as tmp2 ', ' tmp2.id = pdirjrj.perawat_pdirjrj_2', 'left')
        ->join('sm_tenaga_medis as tmp3 ', ' tmp3.id = pdirjrj.perawat_pdirjrj_3', 'left')
        ->join('sm_pegawai as pgp1 ', ' pgp1.id = tmp1.id_pegawai', 'left')
        ->join('sm_pegawai as pgp2 ', ' pgp2.id = tmp2.id_pegawai', 'left')
        ->join('sm_pegawai as pgp3 ', ' pgp3.id = tmp3.id_pegawai', 'left')       
        ->join('sm_translucent as tr', 'tr.id = pdirjrj.id_users', 'left')
        ->join('sm_pegawai as pgu', 'pgu.id = tr.id', 'left')					
        ->where('lp.id_pendaftaran', $id_pendaftaran, true)
		->get()
		->result();
	}
 

    // PDIRJRJ +
	function updatePengkajianDanIntervensiResikoJatuhRawatJalan($pengkajianDanIntervensiResikoJatuhRawatJalan, $id_efrm){
		$datetime = date('Y-m-d H:i:s');	
		if ($id_efrm === '') {
			$pengkajianDanIntervensiResikoJatuhRawatJalan['created_date'] = $datetime;

			$this->db->insert('sm_pengkajian_dan_intervensi_resiko_jatuh_rajal', $pengkajianDanIntervensiResikoJatuhRawatJalan);
				
			return ['status' => true, 'message' => 'Berhasil Menambahkan Data'];				
		} else {
			$data_before_efrm = $this->db->select("*, '' as id_users, '' as tanggal_ubah_pdirjrj")->from('sm_pengkajian_dan_intervensi_resiko_jatuh_rajal')->where('id', $id_efrm)->get()->row();
	
			unset($data_before_efrm->id);
			$data_before_efrm->id_users = $this->session->userdata('id_translucent');
			$data_before_efrm->tanggal_ubah_pdirjrj = $datetime;
	
			$pengkajianDanIntervensiResikoJatuhRawatJalan['updated_date'] = $datetime;
	
			$this->db->set($pengkajianDanIntervensiResikoJatuhRawatJalan)->where('id', $id_efrm)->update('sm_pengkajian_dan_intervensi_resiko_jatuh_rajal');
	
			$this->db->insert('sm_pengkajian_dan_intervensi_resiko_jatuh_rajal_logs', $data_before_efrm);
	
			return ['status' => true, 'message' => 'Berhasil Mengubah Data'];				
		}				
	}


    // PAKARJ + ubah
    function getPengkajianAwalKeperawatanAnakRawatJalan($id_pendaftaran){
        return $this->db->select('pakarj.*, pgp1.nama as perawat, pgd1.nama as dokter')
          ->from('sm_pengkajian_awal_keperawatan_anak_rawat_jalan as pakarj')	
          ->join('sm_layanan_pendaftaran as lp', 'lp.id = pakarj.id_layanan_pendaftaran')
          ->join('sm_tenaga_medis as tmp1 ', ' tmp1.id = pakarj.perawat_anak', 'left')
          ->join('sm_tenaga_medis as tmd1 ', ' tmd1.id = pakarj.dokter_anak', 'left')
          ->join('sm_pegawai as pgp1 ', ' pgp1.id = tmp1.id_pegawai', 'left')
          ->join('sm_pegawai as pgd1 ', ' pgd1.id = tmd1.id_pegawai', 'left')
          ->where('lp.id_pendaftaran', $id_pendaftaran, true)
          ->get()
          ->row();
    }


    //  PAKARJ + ubah
	function getPengkajianAwalKeperawatanAnakRawatJalanLogs($id_pendaftaran){
        return $this->db->select('pakarj.*, pgp1.nama as perawat, pgd1.nama as dokter, pgu.nama as user')
          ->from('sm_pengkajian_awal_keperawatan_anak_rawat_jalan_logs as pakarj')   
  
          ->join('sm_layanan_pendaftaran as lp', 'lp.id = pakarj.id_layanan_pendaftaran')
  
          ->join('sm_tenaga_medis as tmp1 ', ' tmp1.id = pakarj.perawat_anak', 'left')
          ->join('sm_tenaga_medis as tmd1 ', ' tmd1.id = pakarj.dokter_anak', 'left')
  
          ->join('sm_pegawai as pgp1 ', ' pgp1.id = tmp1.id_pegawai', 'left')
          ->join('sm_pegawai as pgd1 ', ' pgd1.id = tmd1.id_pegawai', 'left')
  
          ->join('sm_translucent as tr', 'tr.id = pakarj.id_users', 'left')
          ->join('sm_pegawai as pgu', 'pgu.id = tr.id', 'left')					
          ->where('lp.id_pendaftaran', $id_pendaftaran, true)
          ->get()
          ->result();
    }
  

    // PAKARJ + ubah
	function updatePengkajianAwalKeperawatanAnakRawatJalan($pengkajianAwalKeperawatanAnakRawatJalan, $id_pakarj){
		$datetime = date('Y-m-d H:i:s');	
		if ($id_pakarj === '') {
			$pengkajianAwalKeperawatanAnakRawatJalan['created_date'] = $datetime;

			$this->db->insert('sm_pengkajian_awal_keperawatan_anak_rawat_jalan', $pengkajianAwalKeperawatanAnakRawatJalan);
				
			return ['status' => true, 'message' => 'Berhasil Menambahkan Data Keperawatan Rawat Jalan Anak'];				
		} else {
			$data_before_pakarj = $this->db->select("*, '' as id_users, '' as tanggal_ubah_pakarj")->from('sm_pengkajian_awal_keperawatan_anak_rawat_jalan')->where('id', $id_pakarj)->get()->row();
	
			unset($data_before_pakarj->id);
			$data_before_pakarj->id_users = $this->session->userdata('id_translucent');
			$data_before_pakarj->tanggal_ubah_pakarj = $datetime;
	
			$pengkajianAwalKeperawatanAnakRawatJalan['updated_date'] = $datetime;
	
			$this->db->set($pengkajianAwalKeperawatanAnakRawatJalan)->where('id', $id_pakarj)->update('sm_pengkajian_awal_keperawatan_anak_rawat_jalan');
	
			$this->db->insert('sm_pengkajian_awal_keperawatan_anak_rawat_jalan_logs', $data_before_pakarj);
	
			return ['status' => true, 'message' => 'Berhasil Mengubah Data Keperawatan Rawat Jalan Anak'];				
		}				
	}
  


    



	function getJmlOrderLab($id) 
    {   
        $this->db->select("count(id) jml")    
            ->from('sm_order_laboratorium')    
            ->where("status <> 'batal'")
            ->where('id_layanan_pendaftaran='.$id); 
        $result = $this->db->get()->row();  
        return $result; 
    }   

    function getJmlOrderRadiologi($id) 
    {   
        $this->db->select("count(id) jml")    
            ->from('sm_order_radiologi')    
            ->where("status <> 'batal'")
            ->where('id_layanan_pendaftaran='.$id); 
        $result = $this->db->get()->row();  
        return $result; 
    }   
	
	function kuotaPoliByLayanan($search) 
    {	
        if(($search['tanggal_awal'] !== '')  & ($search['tanggal_akhir'] !== '') & ($search['layanan'] !== '') ){           
            
            if ($search['id_profesi'] == '10'){ // Dokter Spesialis			
				$this->db->select("sum(kuota) kuota, sum(jml_kunjung) jml_kunjung, jml_checkin, (sum(jml_kunjung) - jml_checkin) jml_booking, string_agg(DISTINCT nama_dokter, ' & ') nama_dokter")
                         ->from(" ( select jd.id, jd.id_dokter, jd.nama_dokter, jd.kuota,  jd.jml_kunjung, kd.jml_checkin, jd.jml_kunjung-kd.jml_checkin jml_booking
                                    from sm_jadwal_dokter jd 
                                    left join (select lp.id_dokter, count(lp.id_dokter) jml_checkin
                                                from sm_layanan_pendaftaran lp
                                                where lp.tanggal_layanan between '" . date2mysql($search['tanggal_awal']) . " 00:00:00' and '" . date2mysql($search['tanggal_akhir']) . " 23:59:59'
                                                and lp.id_unit_layanan=".$search['layanan']." and lp.status_terlayani!='Batal' AND lp.id_dokter = '".$search['id_dokter']."' 
                                                GROUP BY lp.id_dokter) kd on jd.id_dokter=kd.id_dokter
                                    where jd.id_poli=".$search['layanan']." AND jd.id_dokter = '".$search['id_dokter']."'  
											and jd.tanggal between '" . date2mysql($search['tanggal_awal']) . "' and '" . date2mysql($search['tanggal_akhir']) . "' 
                                    ) kuota GROUP BY jml_checkin", true);
            } else {
                $this->db->select("SUM(kuota) AS kuota, SUM(jml_kunjung) AS jml_kunjung, SUM(jml_checkin) AS jml_checkin, SUM(jml_kunjung) - SUM(jml_checkin) AS jml_booking, STRING_AGG(DISTINCT nama_dokter, ' & ') AS nama_dokter")
                         ->from(" ( select jd.id_dokter, jd.nama_dokter, SUM(jd.kuota) AS kuota, SUM(jd.jml_kunjung) AS jml_kunjung, COALESCE(kd.jml_checkin, 0) AS jml_checkin
                                    from sm_jadwal_dokter jd 
                                    left join (select lp.id_dokter, count(lp.id_dokter) jml_checkin
                                                from sm_layanan_pendaftaran lp
                                                where lp.tanggal_layanan between '" . date2mysql($search['tanggal_awal']) . " 00:00:00' and '" . date2mysql($search['tanggal_akhir']) . " 23:59:59'
                                                and lp.id_unit_layanan=".$search['layanan']." and lp.status_terlayani!='Batal'
                                                GROUP BY lp.id_dokter) kd on jd.id_dokter=kd.id_dokter
                                    where jd.id_poli=".$search['layanan']." and jd.tanggal between '" . date2mysql($search['tanggal_awal']) . "' and '" . date2mysql($search['tanggal_akhir']) . "'
									GROUP BY jd.id_dokter, jd.nama_dokter, kd.jml_checkin
                                    ) kuota ");
            }
            return $this->db->get()->row();
        }                
        return NULL;
    }
    
    // PKRJ + ubah
	function getPengkajianKeperawatanRajal($id_pendaftaran){
		return $this->db->select('pkrj.*, pgp1.nama as perawat, pgd1.nama as dokter')
        ->from('sm_pengkajian_keperawatan_rajal as pkrj')	
		->join('sm_layanan_pendaftaran as lp', 'lp.id = pkrj.id_layanan_pendaftaran')
        ->join('sm_tenaga_medis as tmp1 ', ' tmp1.id = pkrj.perawat_pkrj', 'left')
        ->join('sm_tenaga_medis as tmd1 ', ' tmd1.id = pkrj.dokter_pkrj', 'left')
        ->join('sm_pegawai as pgp1 ', ' pgp1.id = tmp1.id_pegawai', 'left')
        ->join('sm_pegawai as pgd1 ', ' pgd1.id = tmd1.id_pegawai', 'left')				
		->where('lp.id_pendaftaran', $id_pendaftaran, true)
        ->get()
        ->row();
	}

	// PKRJ LOGS + ubah
	function getPengkajianKeperawatanRajalLogs($id_pendaftaran){
		return $this->db->select('pkrj.*, pgp1.nama as perawat, pgd1.nama as dokter, pgu.nama as user')
        ->from('sm_pengkajian_keperawatan_rajal_logs as pkrj')      
		->join('sm_layanan_pendaftaran as lp', 'lp.id = pkrj.id_layanan_pendaftaran')
        ->join('sm_tenaga_medis as tmp1 ', ' tmp1.id = pkrj.perawat_pkrj', 'left')
        ->join('sm_tenaga_medis as tmd1 ', ' tmd1.id = pkrj.dokter_pkrj', 'left')
        ->join('sm_pegawai as pgp1 ', ' pgp1.id = tmp1.id_pegawai', 'left')
        ->join('sm_pegawai as pgd1 ', ' pgd1.id = tmd1.id_pegawai', 'left')    
        ->join('sm_translucent as tr', 'tr.id = pkrj.id_users', 'left')
        ->join('sm_pegawai as pgu', 'pgu.id = tr.id', 'left')					
		->where('lp.id_pendaftaran', $id_pendaftaran, true)
		->get()
		->result();
	}


    // PKRJ
	function updatepengkajianKeperawatanRajal($pengkajianKeperawatanRajal, $id_pkrj){
		$datetime = date('Y-m-d H:i:s');	
		if ($id_pkrj === '') {
			$pengkajianKeperawatanRajal['created_date'] = $datetime;

			$this->db->insert('sm_pengkajian_keperawatan_rajal', $pengkajianKeperawatanRajal);
				
			return ['status' => true, 'message' => 'Berhasil Menambahkan Data Keperawatan Rajal'];				
		} else {
			$data_before_pkrj = $this->db->select("*, '' as id_users, '' as tanggal_ubah_pkrj")->from('sm_pengkajian_keperawatan_rajal')->where('id', $id_pkrj)->get()->row();
	
			unset($data_before_pkrj->id);
			$data_before_pkrj->id_users = $this->session->userdata('id_translucent');
			$data_before_pkrj->tanggal_ubah_pkrj = $datetime;
	
			$pengkajianKeperawatanRajal['updated_date'] = $datetime;
	
			$this->db->set($pengkajianKeperawatanRajal)->where('id', $id_pkrj)->update('sm_pengkajian_keperawatan_rajal');
	
			$this->db->insert('sm_pengkajian_keperawatan_rajal_logs', $data_before_pkrj);
	
			return ['status' => true, 'message' => 'Berhasil Mengubah Data Keperawatan Rajal'];				
		}				
	}

    // PRJODG + ubah
	function getPengkajianRajalObstetriGinekologi($id_pendaftaran){
		return $this->db->select('prjogd.*, pgb.nama as bidan, pgd.nama as dokter')
        ->from('sm_pengkajian_rajal_obstetri_ginekologi as prjogd')	
		->join('sm_layanan_pendaftaran as lp', 'lp.id = prjogd.id_layanan_pendaftaran')
        ->join('sm_tenaga_medis as tmb ', ' tmb.id = prjogd.bidan_prjogd', 'left')
        ->join('sm_tenaga_medis as tmd ', ' tmd.id = prjogd.dokter_prjogd', 'left')
        ->join('sm_pegawai as pgb ', ' pgb.id = tmb.id_pegawai', 'left')
        ->join('sm_pegawai as pgd ', ' pgd.id = tmd.id_pegawai', 'left')				
		->where('lp.id_pendaftaran', $id_pendaftaran, true)
        ->get()
        ->row();
	}

	// PRJODG LOGS + ubah
	function getPengkajianRajalObstetriGinekologiLogs($id_pendaftaran){
		return $this->db->select('prjogd.*, pgb.nama as bidan, pgd.nama as dokter, pgu.nama as user')
        ->from('sm_pengkajian_rajal_obstetri_ginekologi_logs as prjogd')       
		->join('sm_layanan_pendaftaran as lp', 'lp.id = prjogd.id_layanan_pendaftaran')        
        ->join('sm_tenaga_medis as tmb ', ' tmb.id = prjogd.bidan_prjogd', 'left')
        ->join('sm_tenaga_medis as tmd ', ' tmd.id = prjogd.dokter_prjogd', 'left')
        ->join('sm_pegawai as pgb ', ' pgb.id = tmb.id_pegawai', 'left')
        ->join('sm_pegawai as pgd ', ' pgd.id = tmd.id_pegawai', 'left')    
        ->join('sm_translucent as tr', 'tr.id = prjogd.id_users', 'left')
        ->join('sm_pegawai as pgu', 'pgu.id = tr.id', 'left')					
        ->where('lp.id_pendaftaran', $id_pendaftaran, true)
		->get()
		->result();
	}

    // PRJODG
	function updatepengkajianRajalObstetriGinekologi($pengkajianRajalObstetriGinekologi, $id_prjogd){
		$datetime = date('Y-m-d H:i:s');	
		if ($id_prjogd === '') {
			$pengkajianRajalObstetriGinekologi['created_date'] = $datetime;

			$this->db->insert('sm_pengkajian_rajal_obstetri_ginekologi', $pengkajianRajalObstetriGinekologi);
				
			return ['status' => true, 'message' => 'Berhasil Menambahkan Data Pengkajian Rawat Jalan'];				
		} else {
			$data_before_prjogd = $this->db->select("*, '' as id_users, '' as tanggal_ubah_prjogd")->from('sm_pengkajian_rajal_obstetri_ginekologi')->where('id', $id_prjogd)->get()->row();
	
			unset($data_before_prjogd->id);
			$data_before_prjogd->id_users = $this->session->userdata('id_translucent');
			$data_before_prjogd->tanggal_ubah_prjogd = $datetime;
	
			$pengkajianRajalObstetriGinekologi['updated_date'] = $datetime;
	
			$this->db->set($pengkajianRajalObstetriGinekologi)->where('id', $id_prjogd)->update('sm_pengkajian_rajal_obstetri_ginekologi');
	
			$this->db->insert('sm_pengkajian_rajal_obstetri_ginekologi_logs', $data_before_prjogd);
	
			return ['status' => true, 'message' => 'Berhasil Mengubah Data Pengkajian Rawat Jalan'];				
		}				
	}



    // PAPAK + ubah
	function getPengkajianAwalPasienAkhirKehidupan($id_pendaftaran){
		return $this->db->select('papak.*, pgp1.nama as perawat')
        ->from('sm_pengkajian_awal_pasien_akhir_kehidupan as papak')	
		->join('sm_layanan_pendaftaran as lp', 'lp.id = papak.id_layanan_pendaftaran')
        ->join('sm_tenaga_medis as tmp1 ', ' tmp1.id = papak.perawat_papak', 'left')
        ->join('sm_pegawai as pgp1 ', ' pgp1.id = tmp1.id_pegawai', 'left')	
        ->where('lp.id_pendaftaran', $id_pendaftaran, true)
        ->get()
        ->row();
	}

	// PAPAK LOGS + ubah
	function getPengkajianAwalPasienAkhirKehidupanLogs($id_pendaftaran){
		return $this->db->select('papak.*, pgp1.nama as perawat, pgu.nama as user')
        ->from('sm_pengkajian_awal_pasien_akhir_kehidupan_logs as papak')	
		->join('sm_layanan_pendaftaran as lp', 'lp.id = papak.id_layanan_pendaftaran')
        ->join('sm_tenaga_medis as tmp1 ', ' tmp1.id = papak.perawat_papak', 'left')       
        ->join('sm_pegawai as pgp1 ', ' pgp1.id = tmp1.id_pegawai', 'left')   
        ->join('sm_translucent as tr', 'tr.id = papak.id_users', 'left')
        ->join('sm_pegawai as pgu', 'pgu.id = tr.id', 'left')					
        ->where('lp.id_pendaftaran', $id_pendaftaran, true)
		->get()
		->result();
	}

    // PAPAK
	function updatepengkajianAwalPasienAkhirKehidupan($pengkajianAwalPasienAkhirKehidupan, $id_papak){
		$datetime = date('Y-m-d H:i:s');	
		if ($id_papak === '') {
			$pengkajianAwalPasienAkhirKehidupan['created_date'] = $datetime;

			$this->db->insert('sm_pengkajian_awal_pasien_akhir_kehidupan', $pengkajianAwalPasienAkhirKehidupan);
				
			return ['status' => true, 'message' => 'Berhasil Menambahkan Data Pengkajian'];				
		} else {
			$data_before_papak = $this->db->select("*, '' as id_users, '' as tanggal_ubah_papak")->from('sm_pengkajian_awal_pasien_akhir_kehidupan')->where('id', $id_papak)->get()->row();
	
			unset($data_before_papak->id);
			$data_before_papak->id_users = $this->session->userdata('id_translucent');
			$data_before_papak->tanggal_ubah_papak = $datetime;
	
			$pengkajianAwalPasienAkhirKehidupan['updated_date'] = $datetime;
	
			$this->db->set($pengkajianAwalPasienAkhirKehidupan)->where('id', $id_papak)->update('sm_pengkajian_awal_pasien_akhir_kehidupan');
	
			$this->db->insert('sm_pengkajian_awal_pasien_akhir_kehidupan_logs', $data_before_papak);
	
			return ['status' => true, 'message' => 'Berhasil Mengubah Data Pengkajian'];				
		}				
	}

	public function getSuratPengantarRawat($id_pendaftaran)
	{
		return $this->db->select('spr.*')
			->from('sm_form_surat_pengantar_rawat as spr')
			->join('sm_layanan_pendaftaran as lp', 'spr.id_layanan_pendaftaran = lp.id')
			->where('lp.id_pendaftaran', $id_pendaftaran)
			->order_by('created_date','desc')
            ->limit(1)
			->get()->row();
	}


    function getAlergiAuto($group, $q, $start, $limit) {
        $limit = " LIMIT " . (int)$limit . " OFFSET " . (int)$start;
        $sql = "SELECT id, TRIM(TRAILING ':' FROM name) AS name FROM sm_master_alergi WHERE \"group\" = ? AND name ILIKE ? ORDER BY name";
        
        $data['data'] = $this->db->query($sql . $limit, array($group, "%$q%"))->result();
        $data['total'] = $this->db->query($sql, array($group, "%$q%"))->num_rows();

        return $data;
    }

}
