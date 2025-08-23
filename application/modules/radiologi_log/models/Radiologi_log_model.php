<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Radiologi_log_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        
    }


    private function sqlDataRadiologiDelete($search)
    {
        $this->db->select("r.*", false);

        $this->db->from('sm_radiologi_log_delete as r');

        if ($search['acc_numb'] !== '') :
            $this->db->where('r.accessnumber', $search['acc_numb'], true);
        endif;

        if ($search['no_rm'] !== '') :
            $this->db->like('r.no_rm', $search['no_rm'], true);
        endif;
            
        return $this->db->order_by('r.id', 'desc');
        
    }

    private function _listDataRadiologiDelete($limit, $start, $search)
    {
        $this->sqlDataRadiologiDelete($search);
        if ((int)$limit !== 0) :
            $this->db->limit((int)$limit, (int)$start);
        endif;

        return $this->db->get()->result();
    }

    function dataRadiologiDelete($limit, $start, $search)
    {
        $result['data'] = $this->_listDataRadiologiDelete((int)$limit, (int)$start, $search);
        $result['jumlah'] = $this->sqlDataRadiologiDelete($search)->get()->num_rows();

        $this->db->close();
        
        return $result;
    }

    private function sqlDataRadiologiLogAcc($search)
    {
        $this->db->select("r.*", false);

        $this->db->from('sm_radiologi_log_accnumber as r');

        if ($search['acc_numb'] !== '') :
            $this->db->where('r.accessnumber', $search['acc_numb'], true);
        endif;

        if ($search['no_rm'] !== '') :
            $this->db->like('r.no_rm', $search['no_rm'], true);
        endif;
            
        return $this->db->order_by('r.id', 'desc');
        
    }

    private function _listDataRadiologiLogAcc($limit, $start, $search)
    {
        $this->sqlDataRadiologiLogAcc($search);
        if ((int)$limit !== 0) :
            $this->db->limit((int)$limit, (int)$start);
        endif;

        return $this->db->get()->result();
    }

    function dataRadiologiLogAcc($limit, $start, $search)
    {
        $result['data'] = $this->_listDataRadiologiLogAcc((int)$limit, (int)$start, $search);
        $result['jumlah'] = $this->sqlDataRadiologiLogAcc($search)->get()->num_rows();

        $this->db->close();
        
        return $result;
    }

  

    // PPDRAD Untuk Ambil data
    function getPendaftaranDetailTindakanRadiologi($id_pendaftaran, $id_layanan_pendaftaran = null){
        // Data Pendaftaran Pasien
        $this->db->select("pd.*,
                            p.id as no_rm, p.rm_lama, p.nama, p.kelamin, p.alamat, p.telp, p.agama,
                            p.no_identitas, p.alergi, p.rm_lama, p.status_kawin,
                            p.tanggal_lahir, p.tempat_lahir,
                            p.no_rumah, p.no_rt, p.no_rw, p.kode_pos,
                            coalesce(p.nama_prop, '') as provinsi,
                            coalesce(p.nama_kab, '') as kabupaten,
                            coalesce(p.nama_kec, '') as kecamatan,
                            coalesce(p.nama_kel, '') as kelurahan,
                            coalesce(pk.nama, '') as pekerjaan,
                            coalesce(pend.nama, '') as pendidikan,
                            coalesce(pj.nama, '') as penjamin,
                            coalesce(pj.diskon, '0') as diskon,
                            i.nama as instansi_perujuk, pjp.hak_kelas as kelas_rawat,
                            pd.jenis_igd, p.gol_darah", true)
            ->from('sm_pendaftaran as pd')
            ->join('sm_pasien as p', 'p.id = pd.id_pasien')
            ->join('sm_instansi as i', 'i.id = pd.id_instansi_perujuk', 'left')
            ->join('sm_pekerjaan as pk', 'pk.id = p.id_pekerjaan', 'left')
            ->join('sm_pendidikan as pend', 'pend.id = p.id_pendidikan', 'left')
            ->join('sm_penjamin as pj', 'pj.id = pd.id_penjamin', 'left')
            ->join('sm_penjamin_pasien as pjp', 'pjp.id_pasien = p.id')
            ->where('pd.id', $id_pendaftaran, true);
        $data['pasien_tindakan'] = $this->db->get()->row();

        $this->db->select("lp.*,
                            case when lp.jenis_layanan = 'IGD' then 'IGD' else sp.nama end as layanan,
                            case when lp.cara_bayar = 'Tunai' then 'UMUM' else pj.nama end as status_pasien,
                            coalesce(lp.no_antrian, 0) as no_antrian,
                            coalesce(pj.nama, '') as penjamin,
                            coalesce(pj.diskon, 0) as diskon,
                            coalesce(pg.nama, '') as dokter,
                            pg.tanda_tangan as ttd_dokter,
                            coalesce(i.nama, '') as instansi_perujuk,
                            coalesce(bg.nama, '') as bangsal,
                            coalesce(bgic.nama, '') as bangsal_ic,
                            coalesce(ri.no_ruang, '') as no_ruang,
                            coalesce(ri.no_bed, 0) as no_bed,
                            coalesce(ic.no_ruang, '') as no_ruang_ic,
                            coalesce(ic.no_bed, 0) as no_bed_ic,
                            bgic.id as id_bangsal_ic,
                            tm.id_profesi,
                            k.nama as kelas,
                            kic.nama as kelas_icare,
                            ri.waktu_masuk, ri.waktu_keluar, ri.waktu_konfirmasi_ranap, 
                            ic.waktu_masuk as waktu_masuk_ic, ic.waktu_keluar as waktu_keluar_ic, ic.waktu_konfirmasi_icare, 
                            bg.id as id_bangsal,
                            odri.id_dokter_dpjp, odic.id_dokter_dpjp as id_dokter_dpjp_ic, coalesce(pgdpjp.nama, '') as dokter_dpjp, pgdpjp.tanda_tangan as ttd_dokter_dpjp, 
                            coalesce(pgicdpjp.nama, '') as dokter_dpjp_ic, u.id as id_unit, u.nama as unit, pd.no_rujukan, peg.nama as petugas, 
                            ins.nama as instansi_merujuk, pd.keterangan_rujukan,
                            ('') as before")
            ->from('sm_layanan_pendaftaran as lp')
            ->join('sm_pendaftaran as pd', 'pd.id = lp.id_pendaftaran')
            ->join('sm_tenaga_medis as tm', 'tm.id = lp.id_dokter', 'left')
            ->join('sm_pegawai as pg', 'pg.id = tm.id_pegawai', 'left')
            ->join('sm_pegawai as peg', 'peg.id = lp.id_users', 'left')
            ->join('sm_spesialisasi as sp', 'sp.id = lp.id_unit_layanan', 'left')
            ->join('sm_penjamin as pj', 'pj.id = lp.id_penjamin', 'left')
            ->join('sm_instansi as i', 'i.id = pd.id_instansi_perujuk', 'left')
            ->join('sm_unit as u', 'u.id = sp.id_unit', 'left')
            ->join('sm_rawat_inap as ri', 'ri.id_layanan_pendaftaran = lp.id', 'left')
            ->join('sm_order_rawat_inap as odri', 'odri.id_rawat_inap = ri.id', 'left')
            ->join('sm_intensive_care as ic', 'ic.id_layanan_pendaftaran = lp.id', 'left')
            ->join('sm_order_intensive_care as odic', 'odic.id_intensive_care = ic.id', 'left')
            ->join('sm_tenaga_medis as tmdpjp', 'tmdpjp.id = odri.id_dokter_dpjp', 'left')
            ->join('sm_tenaga_medis as icdpjp', 'icdpjp.id = odic.id_dokter_dpjp', 'left')
            ->join('sm_pegawai as pgicdpjp', 'pgicdpjp.id = icdpjp.id_pegawai', 'left')
            ->join('sm_pegawai as pgdpjp', 'pgdpjp.id = tmdpjp.id_pegawai', 'left')
            ->join('sm_bangsal as bg', 'bg.id = ri.id_bangsal', 'left')
            ->join('sm_bangsal as bgic', 'bgic.id = ic.id_bangsal', 'left')
            ->join('sm_kelas as k', 'k.id = ri.id_kelas', 'left')
            ->join('sm_kelas as kic', 'kic.id = ic.id_kelas', 'left')
            ->join('sm_instansi as ins', 'ins.id = pd.id_instansi_merujuk', 'left')
            ->where('lp.id_pendaftaran', $id_pendaftaran, true)
            ->order_by('lp.id', 'asc');

        if ($id_layanan_pendaftaran !== null) :
            $this->db->where('lp.id', $id_layanan_pendaftaran, true);
            $layanan = $this->db->get()->row();
            $layanan->before = $this->m_pelayanan->getLayananSpesialisasiBefore($layanan->id);
        else :
            $layanan = $this->db->get()->result();
        endif;

        $data['layanan'] = $layanan;
        return $data;
        $this->db->close();
    }

    // PPDRAD Untuk Ambil data // PPPDJ
    function getPendaftaranDetailRadiologi($id_layanan_pendaftaran){
		// Data Pendaftaran Pasien
		$this->db->select("pd.*,
                            p.id as no_rm, p.rm_lama, p.nama, p.kelamin, p.alamat, p.telp, p.agama,
                            p.no_rt, p.no_rw,
                            p.no_identitas, p.alergi, p.rm_lama, p.status_kawin, p.nama_ayah, p.nama_ibu,
                            p.tanggal_lahir, p.tempat_lahir,
                            coalesce(p.nama_prop, '') as provinsi,
                            coalesce(p.nama_kab, '') as kabupaten,
                            coalesce(p.nama_kec, '') as kecamatan,
                            coalesce(p.nama_kel, '') as kelurahan,
                            coalesce(pk.nama, '') as pekerjaan,
                            coalesce(pend.nama, '') as pendidikan,
                            coalesce(pj.nama, '') as penjamin,
                            coalesce(pj.diskon, '0') as diskon,
                            i.nama as instansi_perujuk,
                            pd.jenis_igd, p.gol_darah", true)
			->from('sm_pendaftaran as pd')
			->join('sm_layanan_pendaftaran as lp', 'pd.id = lp.id_pendaftaran')
			->join('sm_pasien as p', 'p.id = pd.id_pasien')
			->join('sm_instansi as i', 'i.id = pd.id_instansi_perujuk', 'left')
			->join('sm_pekerjaan as pk', 'pk.id = p.id_pekerjaan', 'left')
			->join('sm_pendidikan as pend', 'pend.id = p.id_pendidikan', 'left')
			->join('sm_penjamin as pj', 'pj.id = pd.id_penjamin', 'left')
			->where('lp.id', $id_layanan_pendaftaran, true);
		$data['pasien'] = $this->db->get()->row();

		$this->db->select("lp.*,
                            case when lp.jenis_layanan = 'IGD' then 'IGD' else sp.nama end as layanan,
                            case when lp.cara_bayar = 'Tunai' then 'UMUM' else pj.nama end as status_pasien,
                            coalesce(lp.no_antrian, 0) as no_antrian,
                            coalesce(pj.nama, '') as penjamin,
                            coalesce(pj.diskon, 0) as diskon,
                            coalesce(pg.nama, '') as dokter,
                            coalesce(i.nama, '') as instansi_perujuk,
                            coalesce(bg.nama, '') as bangsal,
                            coalesce(bgic.nama, '') as bangsal_ic,
                            coalesce(ri.no_ruang, '') as no_ruang,
                            coalesce(ri.no_bed, 0) as no_bed,
                            coalesce(ic.no_ruang, '') as no_ruang_ic,
                            coalesce(ic.no_bed, 0) as no_bed_ic,
                            tm.id_profesi,
                            k.nama as kelas,
                            kic.nama as kelas_icare,
                            ri.waktu_masuk, ri.waktu_keluar, ri.waktu_konfirmasi_ranap, 
                            ic.waktu_masuk as waktu_masuk_ic, ic.waktu_keluar as waktu_keluar_ic, ic.waktu_konfirmasi_icare, 
                            bg.id as id_bangsal,
                            odri.id_dokter_dpjp, odic.id_dokter_dpjp as id_dokter_dpjp_ic, coalesce(pgdpjp.nama, '') as dokter_dpjp, 
                            coalesce(pgicdpjp.nama, '') as dokter_dpjp_ic, u.id as id_unit, u.nama as unit, pd.no_rujukan, peg.nama as petugas, 
                            ins.nama as instansi_merujuk, pd.keterangan_rujukan,
                            ('') as before")
			->from('sm_layanan_pendaftaran as lp')
			->join('sm_pendaftaran as pd', 'pd.id = lp.id_pendaftaran')
			->join('sm_tenaga_medis as tm', 'tm.id = lp.id_dokter', 'left')
			->join('sm_pegawai as pg', 'pg.id = tm.id_pegawai', 'left')
			->join('sm_pegawai as peg', 'peg.id = lp.id_users', 'left')
			->join('sm_spesialisasi as sp', 'sp.id = lp.id_unit_layanan', 'left')
			->join('sm_penjamin as pj', 'pj.id = lp.id_penjamin', 'left')
			->join('sm_instansi as i', 'i.id = pd.id_instansi_perujuk', 'left')
			->join('sm_unit as u', 'u.id = sp.id_unit', 'left')
			->join('sm_rawat_inap as ri', 'ri.id_layanan_pendaftaran = lp.id', 'left')
			->join('sm_order_rawat_inap as odri', 'odri.id_rawat_inap = ri.id', 'left')
			->join('sm_intensive_care as ic', 'ic.id_layanan_pendaftaran = lp.id', 'left')
			->join('sm_order_intensive_care as odic', 'odic.id_intensive_care = ic.id', 'left')
			->join('sm_tenaga_medis as tmdpjp', 'tmdpjp.id = odri.id_dokter_dpjp', 'left')
			->join('sm_tenaga_medis as icdpjp', 'icdpjp.id = odic.id_dokter_dpjp', 'left')
			->join('sm_pegawai as pgicdpjp', 'pgicdpjp.id = icdpjp.id_pegawai', 'left')
			->join('sm_pegawai as pgdpjp', 'pgdpjp.id = tmdpjp.id_pegawai', 'left')
			->join('sm_bangsal as bg', 'bg.id = ri.id_bangsal', 'left')
			->join('sm_bangsal as bgic', 'bgic.id = ic.id_bangsal', 'left')
			->join('sm_kelas as k', 'k.id = ri.id_kelas', 'left')
			->join('sm_kelas as kic', 'kic.id = ic.id_kelas', 'left')
			->join('sm_instansi as ins', 'ins.id = pd.id_instansi_merujuk', 'left')
			->where('lp.id', $id_layanan_pendaftaran, true)
			->order_by('lp.id', 'asc');

		if ($id_layanan_pendaftaran !== null) :
			$this->db->where('lp.id', $id_layanan_pendaftaran, true);
			$layanan = $this->db->get()->row();
			$layanan->before = $this->m_pelayanan->getLayananSpesialisasiBefore($layanan->id);
		else :
			$layanan = $this->db->get()->result();
		endif;

		$data['layanan'] = $layanan;
		return $data;
		$this->db->close();
	}

    // PPDRAD
	function getPermintaanPemeriksaanDiagnostik($id_pendaftaran){
		$sql = "select ppd.*, pt.nama as nama_user, p.nama as nama_dokter_ppd
				from sm_permintaan_pemeriksaan_diagnostik ppd				
				join sm_layanan_pendaftaran lp ON ppd.id_layanan_pendaftaran = lp.id
				join sm_tenaga_medis tm ON ppd.dokter_pengirim_ppd = tm.id
				join sm_pegawai p ON tm.id_pegawai = p.id
				join sm_translucent as st on st.id = ppd.id_users
				join sm_pegawai as pt on pt.id = st.id
				where lp.id_pendaftaran = '" . $id_pendaftaran . "'
				order by ppd.tanggal_ppd asc";
		return $this->db->query($sql)->result();
	}

	// PPDRAD
	function getPermintaanPemeriksaanDiagnostikByID($id_dpp){
		$sql = "select ppd.*, pa.nama as nama_pasien, pd.no_register, pa.telp, p.nama as nama_dokter, p.tanda_tangan, tm.no_sip, pt.nama as nama_user
				from sm_permintaan_pemeriksaan_diagnostik ppd				
				join sm_layanan_pendaftaran lp ON ppd.id_layanan_pendaftaran = lp.id
				join sm_pendaftaran pd ON lp.id_pendaftaran = pd.id
				join sm_pasien pa ON pd.id_pasien = pa.id
				left join sm_tenaga_medis tm ON ppd.dokter_pengirim_ppd = tm.id
				left join sm_pegawai p ON tm.id_pegawai = p.id		
				left join sm_translucent as st on st.id = ppd.id_users
				left join sm_pegawai as pt on pt.id = st.id
				where ppd.id = '" . $id_dpp . "'";
		return $this->db->query($sql)->row();
	}

    // PPDRAD LOGS
    function getPermintaanPemeriksaanDiagnostikLogs($id_pendaftaran) { 
		$this->db->where('id_pendaftaran', $id_pendaftaran); 
		$this->db->order_by('created_date', 'desc');
		return $this->db->get('sm_permintaan_pemeriksaan_diagnostik_logs')->result();
	}







	// LHOPI
	function getLembarHandOverPasienIGD($id_pendaftaran){
		$sql = "select lhopi.*, pt.nama as nama_user_h, pdk.nama as nama_dokter_lhopi, pp1.nama as mengoverkan, pp2.nama as menerima
				from sm_lembar_hand_over_pasien_igd lhopi				
				join sm_layanan_pendaftaran lp ON lhopi.id_layanan_pendaftaran = lp.id
				join sm_tenaga_medis tmd ON lhopi.dpjp_lhopi = tmd.id
				join sm_pegawai pdk ON tmd.id_pegawai = pdk.id
				join sm_tenaga_medis tmp1 ON lhopi.mengoverkan_lhopi = tmp1.id
				join sm_pegawai pp1 ON tmp1.id_pegawai = pp1.id
				join sm_tenaga_medis tmp2 ON lhopi.menerima_lhopi = tmp2.id
				join sm_pegawai pp2 ON tmp2.id_pegawai = pp2.id
				join sm_translucent as st on st.id = lhopi.id_users
				join sm_pegawai as pt on pt.id = st.id
				where lp.id_pendaftaran = '" . $id_pendaftaran . "'
				order by lhopi.tanggal_lhopi asc";
		return $this->db->query($sql)->result();
	}

	// LHOPI
	function getLembarHandOverPasienIGDByID($id_ipohl){
		$sql = "select lhopi.*, pa.nama as nama_pasien, pd.no_register, pa.telp, pdk.nama as nama_dokter, pp1.nama as nama_mengoverkan, pp2.nama as nama_menerima, pdk.tanda_tangan, tmd.no_sip, pt.nama as nama_user_h
				from sm_lembar_hand_over_pasien_igd lhopi	
				join sm_layanan_pendaftaran lp ON lhopi.id_layanan_pendaftaran = lp.id
				join sm_pendaftaran pd ON lp.id_pendaftaran = pd.id
				join sm_pasien pa ON pd.id_pasien = pa.id
				join sm_tenaga_medis tmd ON lhopi.dpjp_lhopi = tmd.id
				join sm_pegawai pdk ON tmd.id_pegawai = pdk.id
				join sm_tenaga_medis tmp1 ON lhopi.mengoverkan_lhopi = tmp1.id
				join sm_pegawai pp1 ON tmp1.id_pegawai = pp1.id
				join sm_tenaga_medis tmp2 ON lhopi.menerima_lhopi = tmp2.id
				join sm_pegawai pp2 ON tmp2.id_pegawai = pp2.id	               
				left join sm_translucent as st on st.id = lhopi.id_users
				left join sm_pegawai as pt on pt.id = st.id
				where lhopi.id = '" . $id_ipohl . "'";
		return $this->db->query($sql)->row();
	}

    // LHOPI LOGS
    function getLembarHandOverPasienIGDLogs($id_pendaftaran) { 
		$this->db->where('id_pendaftaran', $id_pendaftaran); 
		$this->db->order_by('created_date', 'desc');
		return $this->db->get('sm_lembar_hand_over_pasien_igd_logs')->result();
	}


    // RPRDL
	function getRencanaRujukanPasienDariLuarIGD($id_pendaftaran){
		$sql = "select rprdl.*, pt.nama as nama_user
				from sm_rencana_pasien_rujukan_dari_luar rprdl				
				join sm_layanan_pendaftaran lp ON rprdl.id_layanan_pendaftaran = lp.id
				join sm_translucent as st on st.id = rprdl.id_users
				join sm_pegawai as pt on pt.id = st.id
				where lp.id_pendaftaran = '" . $id_pendaftaran . "'
				order by rprdl.tanggal_jam_rprdl asc";
		return $this->db->query($sql)->result();
	}

	// RPRDL
	function getRencanaRujukanPasienDariLuarIGDByID($id_rrpdr){
		$sql = "select rprdl.*, pa.nama as nama_pasien, pd.no_register, pa.telp, pt.nama as nama_user
				from sm_rencana_pasien_rujukan_dari_luar rprdl	
				join sm_layanan_pendaftaran lp ON rprdl.id_layanan_pendaftaran = lp.id
				join sm_pendaftaran pd ON lp.id_pendaftaran = pd.id
				join sm_pasien pa ON pd.id_pasien = pa.id              
				left join sm_translucent as st on st.id = rprdl.id_users
				left join sm_pegawai as pt on pt.id = st.id
				where rprdl.id = '" . $id_rrpdr . "'";
		return $this->db->query($sql)->row();
	}

	// RPRDL LOGS
    function getRencanaRujukanPasienDariLuarIGDLogs($id_pendaftaran) { 
		$this->db->where('id_pendaftaran', $id_pendaftaran); 
		$this->db->order_by('created_date', 'desc');
		return $this->db->get('sm_rencana_pasien_rujukan_dari_luar_logs')->result();
	}









    // PPPDJ 
	function getPppDiagnostikJanTung($id_pendaftaran){
		$sql = "select pppdj.*, pt.nama as nama_user, sd.nama as dokter_pemeriksa
				from sm_ppp_diagnostik_jantung pppdj				
				join sm_layanan_pendaftaran lp ON pppdj.id_layanan_pendaftaran = lp.id
				join sm_translucent as st on st.id = pppdj.id_users
				left join sm_tenaga_medis tmd ON pppdj.dokter_pemeriksa_pppdj  = tmd.id
				left join sm_pegawai sd ON tmd.id_pegawai = sd.id
				join sm_pegawai as pt on pt.id = st.id
				where lp.id_pendaftaran = '" . $id_pendaftaran . "'
				order by pppdj.tanggal_pppdj asc";
		return $this->db->query($sql)->result();
	}

	// PPPDJ  <!-- INI JANGAN DI HAPUS UDAH BENER ADA TANDA TANGANYA -->
	function getPppDiagnostikJanTungById($id_jdppp){
		$sql = "select pppdj.*, pa.nama as nama_pasien, pd.no_register, pa.telp, pt.nama as nama_user, sd.tanda_tangan, lp.tanggal_layanan AS tanggal, sd.nama as dokter_pemeriksa, b.nama AS bangsal
				from sm_ppp_diagnostik_jantung pppdj				
				join sm_layanan_pendaftaran lp ON pppdj.id_layanan_pendaftaran = lp.id
				join sm_pendaftaran pd ON lp.id_pendaftaran = pd.id
				join sm_pasien pa ON pd.id_pasien = pa.id
				LEFT JOIN sm_rawat_inap AS ri ON ri.id_layanan_pendaftaran = lp.ID
				LEFT JOIN sm_bangsal AS b ON b.id = ri.id_bangsal
				left join sm_tenaga_medis tmd ON pppdj.dokter_pemeriksa_pppdj  = tmd.id
				left join sm_pegawai sd ON tmd.id_pegawai = sd.id
				left join sm_translucent as st on st.id = pppdj.id_users
				left join sm_pegawai as pt on pt.id = st.id
				where pppdj.id = '" . $id_jdppp . "'";
		return $this->db->query($sql)->row();
	}

	// PPPDJ  INI LOGS YANG DIBIKIN 
	function getPppDiagnostikJanTungLogs($id_pendaftaran) { 
		$this->db->where('id_pendaftaran', $id_pendaftaran); 
		$this->db->order_by('created_date', 'desc');
		return $this->db->get('sm_ppp_diagnostik_jantung_logs')->result();
	}

	

    // CPTD 
	function getCheklistPostTindakanDiagnostik($id_pendaftaran){
		$sql = "select cptd.*, pt.nama as nama_user, sp1.nama as perawat_1, sp2.nama as perawat_2
				from sm_cheklist_post_tindakan_diagnostik cptd				
				join sm_layanan_pendaftaran lp ON cptd.id_layanan_pendaftaran = lp.id
				join sm_translucent as st on st.id = cptd.id_users
				left join sm_tenaga_medis tmp1 ON cptd.perawatcathlab_cptd  = tmp1.id
				left join sm_pegawai sp1 ON tmp1.id_pegawai = sp1.id
				left join sm_tenaga_medis tmp2 ON cptd.perawatruangan_cptd  = tmp2.id
				left join sm_pegawai sp2 ON tmp2.id_pegawai = sp2.id
				join sm_pegawai as pt on pt.id = st.id
				where lp.id_pendaftaran = '" . $id_pendaftaran . "'
				order by cptd.tanggal_cptd asc";
		return $this->db->query($sql)->result();
	}

	// CPTD  <!-- INI JANGAN DI HAPUS UDAH BENER ADA TANDA TANGANYA -->
	function getCheklistPostTindakanDiagnostikById($id_dtpc){
		$sql = "select cptd.*, pa.nama as nama_pasien, pd.no_register, 
							   pa.telp, 
							   pt.nama as nama_user, 
							   sp1.tanda_tangan, 
							   lp.tanggal_layanan AS tanggal, 
							   sp1.nama as perawat_1, 
							   sp2.nama as perawat_2, 
							   b.nama AS bangsal,
							   kls.nama AS nama_kelas,
							   ri.no_ruang AS no_ruang,
							   ri.no_bed AS no_bed
				from sm_cheklist_post_tindakan_diagnostik cptd				
				join sm_layanan_pendaftaran lp ON cptd.id_layanan_pendaftaran = lp.id
				join sm_pendaftaran pd ON lp.id_pendaftaran = pd.id
				join sm_pasien pa ON pd.id_pasien = pa.id
				LEFT JOIN sm_rawat_inap AS ri ON ri.id_layanan_pendaftaran = lp.ID
				LEFT JOIN sm_bangsal AS b ON b.id = ri.id_bangsal
				LEFT JOIN sm_kelas AS kls ON kls.id = ri.id_kelas
				left join sm_tenaga_medis tmp1 ON cptd.perawatcathlab_cptd  = tmp1.id
				left join sm_pegawai sp1 ON tmp1.id_pegawai = sp1.id
				left join sm_tenaga_medis tmp2 ON cptd.perawatruangan_cptd  = tmp2.id
				left join sm_pegawai sp2 ON tmp2.id_pegawai = sp2.id
				left join sm_translucent as st on st.id = cptd.id_users
				left join sm_pegawai as pt on pt.id = st.id
				where cptd.id = '" . $id_dtpc . "'";
		return $this->db->query($sql)->row();
	}

	// CPTD  INI LOGS YANG DIBIKIN 
	function getCheklistPostTindakanDiagnostikLogs($id_pendaftaran) { 
		$this->db->where('id_pendaftaran', $id_pendaftaran); 
		$this->db->order_by('created_date', 'desc');
		return $this->db->get('sm_cheklist_post_tindakan_diagnostik_logs')->result();
	}

	

    // AAKC 
	function getAsesmenAwalKeperawatanCathlab($id_pendaftaran){
		$sql = "select aakc.*, pt.nama as nama_user, 
							   spd1.nama as nama_operator, 
							   spd2.nama as dokter_1, 
							   spd3.nama as dokter_2, 
							   sp.nama as perawat
				from sm_cheklis_kes_pasien_tdk_inter_bedah aakc				
				join sm_layanan_pendaftaran lp ON aakc.id_layanan_pendaftaran = lp.id
				join sm_translucent as st on st.id = aakc.id_users
				left join sm_tenaga_medis tmd1 ON aakc.dokteroperator1_aakc  = tmd1.id
				left join sm_pegawai spd1 ON tmd1.id_pegawai = spd1.id
				left join sm_tenaga_medis tmd2 ON aakc.dokteroperator2_aakc  = tmd2.id
				left join sm_pegawai spd2 ON tmd2.id_pegawai = spd2.id
				left join sm_tenaga_medis tmd3 ON aakc.dokteroperator3_aakc  = tmd3.id
				left join sm_pegawai spd3 ON tmd3.id_pegawai = spd3.id
				left join sm_tenaga_medis tmp ON aakc.perawat_aakc  = tmp.id
				left join sm_pegawai sp ON tmp.id_pegawai = sp.id
				join sm_pegawai as pt on pt.id = st.id
				where lp.id_pendaftaran = '" . $id_pendaftaran . "'
				order by aakc.tanggal_aakc asc";
		return $this->db->query($sql)->result();
	}

	// AAKC  <!-- INI JANGAN DI HAPUS UDAH BENER ADA TANDA TANGANYA -->
	function getAsesmenAwalKeperawatanCathlabById($id_ckaa){
		$sql = "select aakc.*, pa.nama as nama_pasien, pd.no_register, 
							   pa.telp, 
							   pt.nama as nama_user, 
							   spd1.tanda_tangan, 
							   lp.tanggal_layanan AS tanggal, 
							   spd1.nama as nama_operator, 
							   spd2.nama as dokter_1, 
							   spd3.nama as dokter_2, 
							   sp.nama as perawat,
							   b.nama AS bangsal,
							   kls.nama AS nama_kelas,
							   ri.no_ruang AS no_ruang,
							   ri.no_bed AS no_bed
				from sm_cheklis_kes_pasien_tdk_inter_bedah aakc				
				join sm_layanan_pendaftaran lp ON aakc.id_layanan_pendaftaran = lp.id
				join sm_pendaftaran pd ON lp.id_pendaftaran = pd.id
				join sm_pasien pa ON pd.id_pasien = pa.id
				LEFT JOIN sm_rawat_inap AS ri ON ri.id_layanan_pendaftaran = lp.ID
				LEFT JOIN sm_bangsal AS b ON b.id = ri.id_bangsal
				LEFT JOIN sm_kelas AS kls ON kls.id = ri.id_kelas
				left join sm_tenaga_medis tmd1 ON aakc.dokteroperator1_aakc  = tmd1.id
				left join sm_pegawai spd1 ON tmd1.id_pegawai = spd1.id
				left join sm_tenaga_medis tmd2 ON aakc.dokteroperator2_aakc  = tmd2.id
				left join sm_pegawai spd2 ON tmd2.id_pegawai = spd2.id
				left join sm_tenaga_medis tmd3 ON aakc.dokteroperator3_aakc  = tmd3.id
				left join sm_pegawai spd3 ON tmd3.id_pegawai = spd3.id
				left join sm_tenaga_medis tmp ON aakc.perawat_aakc  = tmp.id
				left join sm_pegawai sp ON tmp.id_pegawai = sp.id
				left join sm_translucent as st on st.id = aakc.id_users
				left join sm_pegawai as pt on pt.id = st.id
				where aakc.id = '" . $id_ckaa . "'";
		return $this->db->query($sql)->row();
	}

	// AAKC  INI LOGS YANG DIBIKIN 
	function getAsesmenAwalKeperawatanCathlabLogs($id_pendaftaran) { 
		$this->db->where('id_pendaftaran', $id_pendaftaran); 
		$this->db->order_by('created_date', 'desc');
		return $this->db->get('sm_cheklis_kes_pasien_tdk_inter_bedah_logs')->result();
	}


            
	// QCPTD  
	function getCheklistPersiapanTindakanDiagnostik($id_pendaftaran){
		$sql = "select cptdq.*, pt.nama as nama_user, sp1.nama as perawat_1, sp2.nama as perawat_2, spd.nama as dokter
				from sm_cheklis_persiapan_tindakan_diagnostik cptdq				
				join sm_layanan_pendaftaran lp ON cptdq.id_layanan_pendaftaran = lp.id
				join sm_translucent as st on st.id = cptdq.id_users
				left join sm_tenaga_medis tmp1 ON cptdq.perawatcathlab_cptdq  = tmp1.id
				left join sm_pegawai sp1 ON tmp1.id_pegawai = sp1.id

				left join sm_tenaga_medis tmp2 ON cptdq.perawatruangan_cptdq  = tmp2.id
				left join sm_pegawai sp2 ON tmp2.id_pegawai = sp2.id

				left join sm_tenaga_medis tmd ON cptdq.dpjptb_cptdq  = tmd.id
				left join sm_pegawai spd ON tmd.id_pegawai = spd.id

				join sm_pegawai as pt on pt.id = st.id
				where lp.id_pendaftaran = '" . $id_pendaftaran . "'
				order by cptdq.tanggal_cptdq asc";
		return $this->db->query($sql)->result();
	}

	// QCPTD   <!-- INI JANGAN DI HAPUS UDAH BENER ADA TANDA TANGANYA -->
	function getCheklistPersiapanTindakanDiagnostikById($id_qdtpc){
		$sql = "select cptdq.*, pa.nama as nama_pasien, pd.no_register, 
							   pa.telp, 
							   pt.nama as nama_user, 
							   sp1.tanda_tangan, 
							   lp.tanggal_layanan AS tanggal, 
							   sp1.nama as perawat_1, 
							   sp2.nama as perawat_2, 
							   spd.nama as dokter,
							   b.nama AS bangsal,
							   kls.nama AS nama_kelas,
							   ri.no_ruang AS no_ruang,
							   ri.no_bed AS no_bed
				from sm_cheklis_persiapan_tindakan_diagnostik cptdq				
				join sm_layanan_pendaftaran lp ON cptdq.id_layanan_pendaftaran = lp.id
				join sm_pendaftaran pd ON lp.id_pendaftaran = pd.id
				join sm_pasien pa ON pd.id_pasien = pa.id
				LEFT JOIN sm_rawat_inap AS ri ON ri.id_layanan_pendaftaran = lp.ID
				LEFT JOIN sm_bangsal AS b ON b.id = ri.id_bangsal
				LEFT JOIN sm_kelas AS kls ON kls.id = ri.id_kelas
				left join sm_tenaga_medis tmp1 ON cptdq.perawatcathlab_cptdq  = tmp1.id
				left join sm_pegawai sp1 ON tmp1.id_pegawai = sp1.id
				left join sm_tenaga_medis tmp2 ON cptdq.perawatruangan_cptdq  = tmp2.id
				left join sm_pegawai sp2 ON tmp2.id_pegawai = sp2.id

				left join sm_tenaga_medis tmd ON cptdq.dpjptb_cptdq  = tmd.id
				left join sm_pegawai spd ON tmd.id_pegawai = spd.id

				left join sm_translucent as st on st.id = cptdq.id_users
				left join sm_pegawai as pt on pt.id = st.id
				where cptdq.id = '" . $id_qdtpc . "'";
		return $this->db->query($sql)->row();
	}

	// QCPTD   INI LOGS YANG DIBIKIN 
	function getCheklistPersiapanTindakanDiagnostikLogs($id_pendaftaran) { 
		$this->db->where('id_pendaftaran', $id_pendaftaran); 
		$this->db->order_by('created_date', 'desc');
		return $this->db->get('sm_cheklis_persiapan_tindakan_diagnostik_logs')->result();
	}







}

