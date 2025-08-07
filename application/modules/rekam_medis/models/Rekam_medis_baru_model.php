<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rekam_medis_baru_model extends CI_Model
{


	function __construct()
	{
		parent::__construct();
		$this->datetime = date('Y-d-m H:i:s');
	}

	function getDataPasienById($id)
    {
        $this->db->select("p.id, p.nama, p.tanggal_lahir, p.kelamin, p.alamat, p.nama_kel, p.nama_kec, p.nama_kab, p.nama_prop ")
            ->from('sm_pasien as p')
            ->where('p.id', $id, true);
        // $this->db->get(); echo $this->db->last_query(); exit();	
        $result = $this->db->get()->row();
        $this->db->close();
        return $result;
    }
	
	function getListDataKunjungan($no_rm)
	{
		$sql = "select pd.id, pd.tanggal_daftar, pd.tanggal_keluar
                from sm_pendaftaran as pd
                where pd.id_pasien = '" . $no_rm . "'
				and pd.status <> 'Batal'
                order by pd.tanggal_daftar desc ";
		return $sql ;
	}
	
	function getListDataKunjunganLab($no_rm)
	{
		$sql = "SELECT DISTINCT pd.id, pd.tanggal_daftar, pd.tanggal_keluar
				FROM sm_pendaftaran as pd
				JOIN sm_layanan_pendaftaran lp ON pd.id = lp.id_pendaftaran
				JOIN sm_laboratorium lb ON lp.id = lb.id_layanan_pendaftaran
				WHERE pd.id_pasien =  '" . $no_rm . "'
				and pd.status <> 'Batal' order by pd.tanggal_daftar desc ";
		return $sql ;
	}

	function getListLayanan($id_pendaftaran)
	{
		$sql = "SELECT lp.id, lp.id_dokter, pg.nama dokter, lp.jenis_layanan,
				case when lp.jenis_layanan = 'Poliklinik' then concat_ws(' ', 'Klinik', sp.nama) when lp.jenis_layanan = 'Rawat Inap' then concat_ws(' ruang ', bg.nama) else jenis_layanan end as ruang
				FROM sm_layanan_pendaftaran lp
				LEFT JOIN sm_tenaga_medis tm ON lp.id_dokter=tm.id
				LEFT JOIN sm_pegawai pg ON tm.id_pegawai=pg.id
				LEFT JOIN sm_spesialisasi as sp ON sp.id = lp.id_unit_layanan
				LEFT JOIN sm_rawat_inap as ri ON ri.id_layanan_pendaftaran = lp.id
				LEFT JOIN sm_bangsal as bg ON bg.id = ri.id_bangsal
				WHERE lp.id_pendaftaran = '" . $id_pendaftaran . "' 
				ORDER BY lp.id ASC";
		// return $this->db->query($sql)->result();
		$data = $this->db->query($sql)->result();
		
		$this->load->model('pelayanan/Pelayanan_model', 'pelayanan');
		foreach ($data as $i => $v) :
			$v->diagnosa     = [];
			$v->diagnosa     = $this->getDiagnosaPemeriksaan($v->id);
			$v->tindakan     = $this->getTarifTindakan($v->id);			
			$v->laboratorium = $this->getPemeriksanLaboratorium($v->id);
			$v->radiologi 	 = $this->getPemeriksanRadiologi($v->id);
			$v->operasi 	 = $this->getOperasi($v->id);
			$v->vk 	 		 = $this->getVK($v->id);
			$v->resep 		 = $this->getResep($v->id);
			$v->soap 		 = $this->getSoap($v->id);
			$v->sbar 		 = $this->getSbar($v->id);
		endforeach;

		return $data;
	}

	function getDiagnosaPemeriksaan($id_layanan_pendaftaran)
    {
        $this->db->select(" dg.id, COALESCE ( pg.nama, '' ) AS dokter, dg.prioritas,
							concat_ws ( ' | ',
									gs.kode_icdx_rinci,
									( SELECT gsa.kode_icdx_rinci FROM sm_golongan_sebab_sakit AS gsa WHERE gsa.ID = dg.id_pengkodean_asterik ),
									( SELECT gss1.nama FROM sm_golongan_sebab_sakit AS gss1 WHERE gss1.ID = dg.id_golongan_sebab_sakit ),
									dg.golongan_sebab_sakit_lain 
							) AS diagnosa ")
            ->from('sm_diagnosa as dg')
            ->join('sm_tenaga_medis as tm', 'tm.id = dg.id_dokter', 'left')
            ->join('sm_pegawai as pg', 'pg.id = tm.id_pegawai', 'left')
            ->join('sm_golongan_sebab_sakit as gs', 'gs.id = dg.id_pengkodean', 'left')
            ->where('dg.id_layanan_pendaftaran', $id_layanan_pendaftaran, true)
            ->order_by('dg.id', 'asc');
			return $this->db->get()->result();
    }

	function getTarifTindakan($id_layanan_pendaftaran, $pendaftaran = null)
	{
		$this->db->select(" l.nama as item");
		$this->db->from('sm_pendaftaran as pd');
		$this->db->join('sm_layanan_pendaftaran as lp', 'lp.id_pendaftaran = pd.id');
		$this->db->join('sm_tarif_tindakan_pasien as ttp', 'ttp.id_layanan_pendaftaran = lp.id');
		$this->db->join('sm_tarif_pelayanan as tp', 'tp.id = ttp.id_tarif_pelayanan');
		$this->db->join('sm_layanan as l', 'l.id = tp.id_layanan');
		$this->db->where('lp.id', $id_layanan_pendaftaran);
		$this->db->group_by('l.id');
		$this->db->order_by('l.id');

		if ($pendaftaran !== null) :
			if ($pendaftaran === 'Ya') :
				$this->db->where('ttp.is_pendaftaran', 'Ya');
			endif;

			if ($pendaftaran === 'Tidak') :
				$this->db->where('ttp.is_pendaftaran', 'Tidak');
			endif;
		endif;

		return $this->db->get()->result();
	}

	function getPemeriksanLaboratorium($id_layanan_pendaftaran)
	{
		$sql = "SELECT lb.id, lb.waktu_konfirm, lb.kode
                FROM sm_laboratorium lb
                JOIN sm_layanan_pendaftaran lp on (lp.id = lb.id_layanan_pendaftaran)
                WHERE lb.id_layanan_pendaftaran = '" . $id_layanan_pendaftaran . "' ";
		$data = $this->db->query($sql)->result();

		foreach ($data as $i => $v) :
			$sql2 = "SELECT ly.nama tindakan
					FROM sm_detail_laboratorium dlb 
					JOIN sm_tarif_pelayanan tp On dlb.id_tarif=tp.id
					JOIN sm_layanan ly ON tp.id_layanan=ly.id
					WHERE dlb.id_laboratorium = '" . $v->id . "' ";
			$v->order = $this->db->query($sql2)->result();
		endforeach;

		return $data;
	}	

	function getPemeriksanRadiologi($id_layanan_pendaftaran)
	{
		$sql = "SELECT rd.id, rd.waktu_konfirm, rd.kode, drd.id id_rad_detail, drd.accessnumber
                FROM sm_radiologi rd  
                JOIN sm_layanan_pendaftaran lp on (lp.id = rd.id_layanan_pendaftaran) 
				JOIN sm_detail_radiologi drd ON rd.id=drd.id_radiologi
                WHERE rd.id_layanan_pendaftaran = '" . $id_layanan_pendaftaran . "' ";
		$data = $this->db->query($sql)->result();

		foreach ($data as $i => $v) :
			$sql2 = "SELECT ly.nama tindakan	
					FROM sm_detail_radiologi drd 
					JOIN sm_tarif_pelayanan tp On drd.id_tarif=tp.id
					JOIN sm_layanan ly ON tp.id_layanan=ly.id
					WHERE drd.id_radiologi = '" . $v->id . "' ";
			$v->order = $this->db->query($sql2)->result();
		endforeach;

		return $data;
	}

	function getResep($id_layanan_pendaftaran)
	{
		$sql = "SELECT pn.id, pn.waktu, pn.waktu_diserahkan, pn.jenis, pn.id_resep, b.nama_lengkap nama_obat, rtd.jumlah_pakai qty, rt.aturan_pakai, concat(rtd.dosis_racik, ' ',  s.nama) dosis
				FROM sm_penjualan pn 
				LEFT JOIN sm_resep_tebus_r rt ON pn.id_resep_tebus = rt.id_resep_tebus
				LEFT JOIN sm_resep_tebus_r_detail rtd ON rt.id = rtd.id_resep_tebus_r
				LEFT JOIN sm_barang b ON rtd.id_barang = b.id
				LEFT JOIN sm_satuan s ON b.satuan_kekuatan = s.id
				WHERE pn.jenis = 'Resep' AND pn.id_layanan_pendaftaran = '" . $id_layanan_pendaftaran . "' ";
		return $this->db->query($sql)->result();
	}

	function getSoap($id_layanan_pendaftaran)
	{
		$sql1 = "SELECT s_soap, o_soap, a_soap, p_soap, usul_tindak_lanjut FROM sm_anamnesa  WHERE id_layanan_pendaftaran = '" . $id_layanan_pendaftaran . "' ";
		$sql2 = "SELECT subject s_soap, objective o_soap, assessment a_soap, plan p_soap, null usul_tindak_lanjut FROM sm_soap WHERE id_layanan_pendaftaran = '" . $id_layanan_pendaftaran . "' ";		
		$result1 = $this->db->query($sql1)->result();
		$result2 = $this->db->query($sql2)->result();
		$data = array_merge($result1, $result2);
		return $data;
	}

	function getSbar($id_layanan_pendaftaran)
	{
		$sql = "SELECT s_sbar, b_sbar, a_sbar, r_sbar FROM sm_anamnesa  WHERE id_layanan_pendaftaran = '" . $id_layanan_pendaftaran . "' ";
		return $this->db->query($sql)->result();
	}

	function getOperasi($id_layanan_pendaftaran)
	{
		$sql = "SELECT ly.nama tindakan FROM sm_jadwal_kamar_operasi jk
				JOIN sm_tarif_operasi top ON jk.id=top.id_operasi
				LEFT JOIN sm_tarif_pelayanan tp ON top.id_tarif=tp.id
				LEFT JOIN sm_layanan ly ON tp.id_layanan=ly.id
				WHERE jk.layanan = 'OK' AND jk.id_layanan_pendaftaran = '" . $id_layanan_pendaftaran . "' ";
		return $this->db->query($sql)->result();
	}

	function getVK($id_layanan_pendaftaran)
	{
		$sql = "SELECT ly.nama tindakan FROM sm_jadwal_kamar_operasi jk
				JOIN sm_tarif_operasi top ON jk.id=top.id_operasi
				LEFT JOIN sm_tarif_pelayanan tp ON top.id_tarif=tp.id
				LEFT JOIN sm_layanan ly ON tp.id_layanan=ly.id
				WHERE jk.layanan = 'VK' AND jk.id_layanan_pendaftaran = '" . $id_layanan_pendaftaran . "' ";
		return $this->db->query($sql)->result();
	}

	function getAnamnesa($id_layanan_pendaftaran)
    {
		$sql = "SELECT * FROM sm_anamnesa WHERE id_layanan_pendaftaran = '" . $id_layanan_pendaftaran . "' ";
		return $this->db->query($sql)->row();
    }
	
}
