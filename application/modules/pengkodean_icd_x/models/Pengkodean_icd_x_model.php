<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengkodean_icd_x_model extends CI_Model
{


	function __construct()
	{
		parent::__construct();
		$this->datetime = date('Y-m-d H:i:s');
	}

	private function sqlDataKunjunganPasien($search)
	{
		$this->db->select("DISTINCT ON (pd.id) pd.*, lpd.id as id_layanan, p.nama as nama_pasien, p.alamat as alamat_pasien, pe.nama as nama_penjamin, ek.id as status_klaim,
						spe.nama nama_spesialisasi,
						(select sum(sudah_diagnosa) from v_jumlah_coder where id_pendaftaran=pd.id) sudah_diagnosa,
						(select sum(total_diagnosa) from v_jumlah_coder where id_pendaftaran=pd.id) total_diagnosa,
						
						((select sum(sudah_tindakan)    from v_jumlah_coder where id_pendaftaran=pd.id)+
						(select sum(sudah_tindakan_ok)  from v_jumlah_coder where id_pendaftaran=pd.id)+
						(select sum(sudah_tindakan_lab) from v_jumlah_coder where id_pendaftaran=pd.id)+
						(select sum(sudah_tindakan_rad) from v_jumlah_coder where id_pendaftaran=pd.id)) sudah_tindakan,
						
						((select sum(total_tindakan)    from v_jumlah_coder where id_pendaftaran=pd.id)+
						(select sum(total_tindakan_ok)  from v_jumlah_coder where id_pendaftaran=pd.id)+
						(select sum(total_tindakan_lab) from v_jumlah_coder where id_pendaftaran=pd.id)+
						(select sum(total_tindakan_rad) from v_jumlah_coder where id_pendaftaran=pd.id)) total_tindakan", false);

		$this->db->from('sm_pendaftaran as pd')
			->join('sm_layanan_pendaftaran as lpd', 'pd.id=lpd.id_pendaftaran')
			->join('sm_pasien as p', 'p.id = pd.id_pasien')
			->join('sm_penjamin as pe', 'pe.id = pd.id_penjamin', 'left')
			->join('sm_eklaim as ek', 'pd.id=ek.id_pendaftaran', 'left')
			->join('sm_spesialisasi as spe', 'lpd.id_unit_layanan=spe.id', 'left');

		// if (($search['tanggal'] !== '')) :
		// 	$this->db->where("DATE(pd.tanggal_daftar)", $search['tanggal']);
		// endif;

		if (($search['tgl_masuk_awal'] !== '') & ($search['tgl_masuk_akhir'] !== '')) :
			$this->db->where("pd.tanggal_daftar BETWEEN '" . $search['tgl_masuk_awal'] . " 00:00:00' AND '" . $search['tgl_masuk_akhir'] . " 23:59:59'");
		endif;

		if (($search['tgl_keluar_awal'] !== '') & ($search['tgl_keluar_akhir'] !== '')) :
			$this->db->where("pd.tanggal_keluar BETWEEN '" . $search['tgl_keluar_awal'] . " 00:00:00' AND '" . $search['tgl_keluar_akhir'] . " 23:59:59'");
		endif;

		if ($search['kunjungan'] !== '') :
			$this->db->where('pd.jenis_rawat', $search['kunjungan'], true);
		endif;

		if ($search['no_rm'] !== '') :
			$this->db->like('p.id', $search['no_rm'], 'before', true);
		endif;

		// echo $search['tgl_masuk_awal']; exit(1);
		return $this->db->order_by('pd.id', 'asc');
	}

	private function _listDataKunjunganPasien($limit = 0, $start = 0, $search)
	{
		$this->sqlDataKunjunganPasien($search);
		if ($limit !== 0) :
			$this->db->limit($limit, $start);
		endif;

		return $this->db->get()->result();
		$this->db->get();
		echo $this->db->last_query();
		exit();
	}

	function getListDataKunjunganPasien($limit = 0, $start = 0, $search)
	{
		$result['data'] = $this->_listDataKunjunganPasien($limit, $start, $search);
		$result['jumlah'] = $this->sqlDataKunjunganPasien($search)->get()->num_rows();
		return $result;

		$this->db->close();
	}


	function getListDataLayananPasien($limit = 0, $start = 0, $search)
	{
		$result['hasil']['data']      = $this->_listDataLayananPasien($limit, $start, $search);
		$result['hasil']['ok']        = $this->sqlDataLayananOk($search);
		$result['hasil']['radiologi'] = $this->sqlDataLayananRadiologi($search);
		$result['hasil']['lab']       = $this->sqlDataLayananLab($search);


		$result['jumlah'] = $this->sqlDataLayananPasien($search)->get()->num_rows();
		// $result['jumlahok'] = $this->sqlDataLayananOk($search)->get()->num_rows();
		return $result;

		$this->db->close();
	}

	private function _listDataLayananPasien($limit = 0, $start = 0, $search)
	{
		$result = $this->sqlDataLayananPasien($search);
		if ($limit !== 0) :
			$this->db->limit($limit, $start);
		endif;

		return $this->db->get()->result();
		// $this->db->get();
		// echo $this->db->last_query();
		// exit();
	}

	function jenisLayanan($idLayanan)
    {
        return $this->db->query("select lp.jenis_layanan
                                from sm_layanan_pendaftaran lp
                                where lp.id = '" . $idLayanan . "'")->row()->jenis_layanan;
    }

	private function sqlDataLayananPasien($search)
	{
		// $this->db->select("DISTINCT ON (lp.id) lp.*, pe.nama as nama_dokter, p.jenis_rawat, 
		// 				  (SELECT COUNT(ttp.id) FROM sm_tarif_tindakan_pasien ttp 
		// 				  JOIN sm_layanan_pendaftaran lp ON lp.id = ttp.id_layanan_pendaftaran 
		// 				  WHERE lp.id_pendaftaran = p.id AND ttp.id_pengkodean IS NOT NULL) AS sudah_dikoding, 
		// 				  (SELECT COUNT(ttp.id) FROM sm_tarif_tindakan_pasien ttp 
		// 				  JOIN sm_layanan_pendaftaran lp ON lp.id = ttp.id_layanan_pendaftaran 
		// 				  WHERE lp.id_pendaftaran = p.id) AS total_koding, 
		// 				  p.keterangan as asal_rawat, s.nama as spesialisasi ,
		// 				  s.id id_spesialisasi, p.id_pasien,ps.nama nama_pasien", false);

		// $this->db->from('sm_layanan_pendaftaran as lp')			
		// 	->join('sm_pendaftaran as p', 'p.id = lp.id_pendaftaran')
		// 	->join('sm_tenaga_medis as tm', 'tm.id = lp.id_dokter')
		// 	->join('sm_pegawai as pe', 'pe.id = tm.id_pegawai')
		// 	->join('sm_spesialisasi as s', 's.id = lp.id_unit_layanan', 'left')
		// 	->join('sm_pasien as ps', 'p.id_pasien=ps.id');

		// if ($search['id_pendaftaran'] !== '') :
		// 	$this->db->where('lp.id_pendaftaran', $search['id_pendaftaran'], true);
		// endif;

		$this->db->select("DISTINCT ON (lp.id) lp.*, pn.id id_pendaftran, lp.id id_layanan_pendaftran, '' as asal_rawat,
						case when  lp.jenis_layanan='Poliklinik' then concat('Poliklinik ',(select nama from sm_spesialisasi where id=lp.id_unit_layanan)) else lp.jenis_layanan end spesialisasi,
						lp.id_unit_layanan id_spesialisasi,pe.nama as nama_dokter,pn.id_pasien,ps.nama nama_pasien,lp.status_terlayani, lp.jenis_layanan as nama_layanan,
						(select sum(sudah_diagnosa) from v_jumlah_coder where id_layanan_pendaftaran=lp.id) sudah_diagnosa,
						(select sum(total_diagnosa) from v_jumlah_coder where id_layanan_pendaftaran=lp.id) total_diagnosa,
						(select sum(sudah_tindakan) from v_jumlah_coder where id_layanan_pendaftaran=lp.id) sudah_tindakan,
						(select sum(total_tindakan) from v_jumlah_coder where id_layanan_pendaftaran=lp.id) total_tindakan   ", false);

		$this->db->from('sm_layanan_pendaftaran lp')
			->join('sm_pendaftaran pn', 'pn.id=lp.id_pendaftaran')
			->join('sm_tenaga_medis as tm', 'tm.id = lp.id_dokter')
			->join('sm_pegawai as pe', 'pe.id = tm.id_pegawai')
			->join('sm_pasien as ps', 'pn.id_pasien=ps.id');

		// $this->db->from('sm_pendaftaran pn')			
		// 	    ->join('sm_layanan_pendaftaran lp', 'pn.id=lp.id_pendaftaran')
		// 		->join('sm_tenaga_medis as tm', 'tm.id = lp.id_dokter')
		// 		->join('sm_pegawai as pe', 'pe.id = tm.id_pegawai')
		// 		->join('sm_pasien as ps', 'pn.id_pasien=ps.id');

		if ($search['id_pendaftaran'] !== '' && isset($search['id_pendaftaran'])) :
			$this->db->where('pn.id', $search['id_pendaftaran'], true);
		endif;

		$this->db->group_by('lp.id');
		$this->db->group_by('pn.id');
		$this->db->group_by('pe.nama');
		$this->db->group_by('ps.nama');
		return $this->db->order_by('lp.id', 'asc');
	}

	//Show List Coder Operasi
	function sqlDataLayananOk($search)
	{
		$this->db->select("lp.id as id,lp.id_pendaftaran id_pendaftaran, jko.id id_konsul,
							(SELECT COUNT( ttp.ID ) FROM sm_jadwal_kamar_operasi ttp 
							JOIN sm_tarif_operasi top ON ttp.id=top.id_operasi
							JOIN sm_layanan_pendaftaran lp ON lp.ID = ttp.id_layanan_pendaftaran 
							WHERE	lp.id_pendaftaran = P.ID AND top.id_pengkodean IS NOT NULL  ) AS sudah_dikoding,
							(SELECT COUNT( ttp.ID ) FROM sm_jadwal_kamar_operasi ttp 
							JOIN sm_tarif_operasi top ON ttp.id=top.id_operasi
							JOIN sm_layanan_pendaftaran lp ON lp.ID = ttp.id_layanan_pendaftaran 
							WHERE	lp.id_pendaftaran = P.ID ) AS total_koding,
						    '40' id_spesialisasi,jko.layanan AS spesialisasi, pe.nama AS nama_dokter, '' AS asal_rawat,
						    jko.waktu tanggal_layanan, '' jenis_layanan ,p.id_pasien,ps.nama nama_pasien,
						    jko.id_layanan_pendaftaran,
							'' sudah_diagnosa, '' total_diagnosa,
							(select sum(sudah_tindakan_ok) from v_jumlah_coder where id_layanan_pendaftaran=lp.id) sudah_tindakan,
							(select sum(total_tindakan_ok) from v_jumlah_coder where id_layanan_pendaftaran=lp.id) total_tindakan  ")

			->from('sm_jadwal_kamar_operasi as jko')
			->join('sm_layanan_pendaftaran as lp', 'lp.id = jko.id_layanan_pendaftaran', 'left')
			->join('sm_pendaftaran as p', 'p.id = lp.id_pendaftaran')
			->join('sm_spesialisasi as s', 's.id = lp.id_unit_layanan', 'left')
			->join('sm_tenaga_medis as tm', 'tm.id = lp.id_dokter')
			->join('sm_pegawai as pe', 'pe.id = tm.id_pegawai')
			->join('sm_pasien as ps', 'p.id_pasien=ps.id')
			->where('jko.status', 'Confirmed')
			->where('p.id', $search['id_pendaftaran'], true);
		return $this->db->get()->result();
	}

	// Show List Coder Radiologi
	function sqlDataLayananRadiologi($search)
	{
		$this->db->select("DISTINCT ON (lp.id) lp.id, lp.id_pendaftaran,sr.id id_konsul,
							(SELECT COUNT ( dr.ID ) 
							FROM sm_detail_radiologi dr JOIN sm_radiologi sr on dr.id_radiologi=sr.id
							WHERE sr.id_layanan_pendaftaran = lp.id AND dr.id_pengkodean IS NOT NULL ) AS sudah_dikoding,
							(SELECT COUNT ( dr.ID ) 
							FROM sm_detail_radiologi dr JOIN sm_radiologi sr on dr.id_radiologi=sr.id
							WHERE sr.id_layanan_pendaftaran =  lp.id ) AS total_koding, 
							'41' id_spesialisasi, sr.jenis AS spesialisasi, pe.nama AS nama_dokter, 
							spe.nama AS asal_rawat ,sr.waktu_konfirm tanggal_layanan, '' jenis_layanan ,p.id_pasien,ps.nama nama_pasien,
							sr.id_layanan_pendaftaran,
							'' sudah_diagnosa, '' total_diagnosa,
							(select sum(sudah_tindakan_rad) from v_jumlah_coder where id_layanan_pendaftaran=lp.id) sudah_tindakan,
							(select sum(total_tindakan_rad) from v_jumlah_coder where id_layanan_pendaftaran=lp.id) total_tindakan ")

			->from('sm_order_radiologi odr')
			->join('sm_radiologi sr', 'odr.id=sr.id_order_radiologi')
			->join('sm_detail_radiologi dr', 'sr.id=dr.id_radiologi')
			->join('sm_layanan_pendaftaran as lp', 'lp.id = odr.id_layanan_pendaftaran', 'left')
			->join('sm_spesialisasi as spe', 'lp.id_unit_layanan=spe.id', 'left')
			->join('sm_tenaga_medis as tm', 'tm.id = lp.id_dokter')
			->join('sm_pegawai as pe', 'pe.id = tm.id_pegawai')
			->join('sm_pendaftaran as p', 'p.id = lp.id_pendaftaran')
			->join('sm_pasien as ps', 'p.id_pasien=ps.id')
			->where('odr.status', 'konfirm', true)
			->where('p.id', $search['id_pendaftaran'], true);

		return $this->db->get()->result();
	}

	function sqlDataLayananLab($search)
	{
		$this->db->select("DISTINCT ON (lp.id) lp.id, lp.id_pendaftaran,lab.id id_konsul,
							(SELECT COUNT ( lab.ID ) 
							FROM sm_detail_laboratorium  JOIN sm_laboratorium lab on dlab.id_laboratorium=lab.id
							WHERE lab.id_layanan_pendaftaran = lp.id AND dlab.id_pengkodean IS NOT NULL ) AS sudah_dikoding,
							(SELECT COUNT ( lab.ID ) 
							FROM sm_detail_laboratorium dlab JOIN sm_laboratorium lab on dlab.id_laboratorium=lab.id
							WHERE lab.id_layanan_pendaftaran = lp.id) AS total_koding, 
							'38' id_spesialisasi, lab.jenis AS spesialisasi, pe.nama AS nama_dokter, 
							spe.nama AS asal_rawat ,lab.waktu_konfirm tanggal_layanan, '' jenis_layanan ,
							p.id_pasien,ps.nama nama_pasien,
							'' sudah_diagnosa, '' total_diagnosa,
							(select sum(sudah_tindakan_lab) from v_jumlah_coder where id_layanan_pendaftaran=lp.id) sudah_tindakan,
							(select sum(total_tindakan_lab) from v_jumlah_coder where id_layanan_pendaftaran=lp.id) total_tindakan ")

			->from('sm_order_laboratorium olab')
			->join('sm_laboratorium  lab', 'olab.id=lab.id_order_laboratorium')
			->join('sm_detail_laboratorium dlab', 'lab.id=dlab.id_laboratorium')
			->join('sm_layanan_pendaftaran as lp', 'lp.id = olab.id_layanan_pendaftaran', 'left')
			->join('sm_spesialisasi as spe', 'lp.id_unit_layanan=spe.id', 'left')
			->join('sm_tenaga_medis as tm', 'tm.id = lp.id_dokter')
			->join('sm_pegawai as pe', 'pe.id = tm.id_pegawai')
			->join('sm_pendaftaran as p', 'p.id = lp.id_pendaftaran')
			->join('sm_pasien as ps', 'p.id_pasien=ps.id')
			->where('olab.status', 'konfirm', true)
			->where('p.id', $search['id_pendaftaran'], true);
		return $this->db->get()->result();
	}

	private function sqlDataSOAP($search)
	{
		$this->db->select("DISTINCT ON (s.id) s.*, p.nama AS nama_dokter, lp.jenis_layanan", false);

		$this->db->from('sm_soap as s')
			->join('sm_tenaga_medis as tm', 'tm.id = s.id_dokter')
			->join('sm_pegawai as p', 'p.id = tm.id_pegawai')
			->join('sm_layanan_pendaftaran as lp', 'lp.id = s.id_layanan_pendaftaran');

		$this->db->where('s.id_layanan_pendaftaran', $search['id_layanan_pendaftaran'], true);


		return $this->db->order_by('s.id', 'desc');
	}

	private function _listDataSOAP($limit = 0, $start = 0, $search)
	{
		$this->sqlDataSOAP($search);
		if ($limit !== 0) :
			$this->db->limit($limit, $start);
		endif;

		return $this->db->get()->result();
		$this->db->get();
		echo $this->db->last_query();
		exit();
	}

	function getListDataSOAP($limit = 0, $start = 0, $search)
	{
		$result['data'] = $this->_listDataSOAP($limit, $start, $search);
		$result['jumlah'] = $this->sqlDataSOAP($search)->get()->num_rows();
		return $result;

		$this->db->close();
	}

	function getLayananPendataranById($idLayananPendaftaran)
	{
		return $this->db->select('lp.*')
			->from('sm_layanan_pendaftaran as lp')
			->where('lp.id', $idLayananPendaftaran, true)
			->get()
			->row();
	}

	// START DATA TINDAKAN 

	function getListDataTindakan($limit = 0, $start = 0, $search)
	{
		$result['data'] = $this->_listDataTindakan($limit, $start, $search);

		if ($search['spesialisasi'] === '40') : $result['jumlah'] = $this->sqlDataTindakanOK($search)->get()->num_rows(); //OK
		elseif ($search['spesialisasi'] === '41') : $result['jumlah'] = $this->sqlDataTindakanRadiologi($search)->get()->num_rows(); //Radiologi
		elseif ($search['spesialisasi'] === '38') : $result['jumlah'] = $this->sqlDataTindakanLab($search)->get()->num_rows(); //Lab
		else :
			$result['jumlah'] = $this->sqlDataTindakan($search)->get()->num_rows();
		endif;


		return $result;

		$this->db->close();
	}

	private function _listDataTindakan($limit = 0, $start = 0, $search)
	{
		// $this->sqlDataTindakan($search);
		// if ($limit !== 0) :
		// 	$this->db->limit($limit, $start);
		// endif;

		if ($search['spesialisasi'] === '40') : $this->sqlDataTindakanOK($search); //OK	
		elseif ($search['spesialisasi'] === '41') : $this->sqlDataTindakanRadiologi($search); //Radiologi	
		elseif ($search['spesialisasi'] === '38') : $this->sqlDataTindakanLab($search); //Lab	
		else :
			$this->sqlDataTindakan($search);
		endif;

		if ($limit !== 0) :
			$this->db->limit($limit, $start);
		endif;

		return $this->db->get()->result();
		$this->db->get();
		echo $this->db->last_query();
		exit();
	}

	private function sqlDataTindakan($search)
	{
		$this->db->select("DISTINCT ON (ttp.id) ttp.*, concat_ws(' | ', l.icd_ix, l.nama) as tindakan, k.nama as kelas, 
						   ttp.total as biaya, p.nama as dokter, ix.icd9, p2.nama as coder, l.nama nama_tindakan,
						   concat_ws(' | ', icd.icd9, icd.nama) tindakan_icd9 ", false);

		$this->db->from('sm_tarif_tindakan_pasien as ttp')
			->join('sm_tarif_pelayanan as tp', 'tp.id = ttp.id_tarif_pelayanan')
			->join('sm_layanan as l', 'l.id = tp.id_layanan')
			->join('sm_kelas as k', 'k.id = tp.id_kelas', 'left')
			->join('sm_tenaga_medis as tm', 'tm.id = ttp.id_operator', 'left')
			->join('sm_pegawai as p', 'p.id = tm.id_pegawai', 'left')
			->join('sm_icd_ix as ix', 'ix.id = ttp.id_pengkodean', 'left')
			->join('sm_pegawai as p2', 'p2.id = ttp.id_coder', 'left')
            ->join('sm_icd_ix as icd', 'ttp.id_icd9 = icd.id', 'left');

		$this->db->where('ttp.id_layanan_pendaftaran', $search['id_layanan_pendaftaran'], true);

		if ($search['filterTindakan'] !== '') :
			$this->db->where('l.nama', $search['filterTindakan'], true);
		endif;

		return $this->db->order_by('ttp.id', 'desc');
	}

	private function sqlDataTindakanOK($search)
	{
		$this->db->select("DISTINCT ON (top.id) top.*, top.waktu as tanggal, concat_ws(' | ', l.icd_ix, l.nama) as tindakan, 
						k.nama as kelas, top.total as biaya, p.nama as dokter, ix.icd9, p2.nama as coder,'40' id_unit_layanan,
						jko.id_layanan_pendaftaran , l.nama nama_tindakan,
						concat_ws(' | ', icd.icd9, icd.nama) tindakan_icd9 ", true);

		$this->db->from('sm_tarif_operasi as top')
			->join('sm_tarif_pelayanan as tp', 'tp.id = top.id_tarif')
			->join('sm_jadwal_kamar_operasi as jko', 'top.id_operasi=jko.id')
			->join('sm_layanan as l', 'l.id = tp.id_layanan')
			->join('sm_kelas as k', 'k.id = tp.id_kelas', 'left')
			->join('sm_tenaga_medis as tm', 'tm.id = top.id_nadis', 'left')
			->join('sm_pegawai as p', 'p.id = tm.id_pegawai', 'left')
			->join('sm_icd_ix as ix', 'ix.id = top.id_pengkodean', 'left')
			->join('sm_pegawai as p2', 'p2.id = top.id_coder', 'left')
            ->join('sm_icd_ix as icd', 'top.id_icd9 = icd.id', 'left');

		// $this->db->where('top.id_operasi', $search['id_konsul'], true);
		$this->db->where('jko.id_layanan_pendaftaran', $search['id_layanan_pendaftaran'], true);

		if ($search['filterTindakan'] !== '') :
			// $this->db->where('l.nama', $search['filterTindakan'], true);
			$this->db->where("REPLACE ( l.nama, '+', ' ' )=", $search['filterTindakan']);
		endif;

		return $this->db->order_by('top.id', 'desc');
	}

	private function sqlDataTindakanRadiologi($search)
	{
		$this->db->select("DISTINCT ON (drad.id) drad.*,
							rad.waktu_konfirm as tanggal, concat_ws(' | ', l.icd_ix, l.nama) as tindakan, 
							k.nama as kelas, drad.total as biaya, p.nama as dokter, ix.icd9, p2.nama as coder,'41' id_unit_layanan,
							rad.id_layanan_pendaftaran, l.nama nama_tindakan,
							'' tindakan_icd9 ", true);

		$this->db->from('sm_radiologi rad')
			->join('sm_detail_radiologi drad', 'rad.id=drad.id_radiologi')
			->join('sm_tarif_pelayanan as tp', 'tp.id = drad.id_tarif')
			->join('sm_layanan as l', 'l.id = tp.id_layanan')
			->join('sm_kelas as k', 'k.id = tp.id_kelas', 'left')
			->join('sm_tenaga_medis as tm', 'tm.id = drad.id_dokter', 'left')
			->join('sm_pegawai as p', 'p.id = tm.id_pegawai', 'left')
			->join('sm_icd_ix as ix', 'ix.id = drad.id_pengkodean', 'left')
			->join('sm_pegawai as p2', 'p2.id = drad.id_coder', 'left');
		// $this->db->where('rad.id', $search['id_konsul'], true);
		$this->db->where('rad.id_layanan_pendaftaran', $search['id_layanan_pendaftaran'], true);

		if ($search['filterTindakan'] !== '') :
			$this->db->where('l.nama', $search['filterTindakan'], true);
		endif;

		return $this->db->order_by('drad.id', 'desc');
	}

	private function sqlDataTindakanLab($search)
	{
		$this->db->select("DISTINCT ON ( dlab.id)  dlab.*,
							lab.waktu_konfirm as tanggal, concat_ws(' | ', l.icd_ix, l.nama) as tindakan, 
							k.nama as kelas,  dlab.total as biaya, 
							ix.icd9, p2.nama as coder,'38' id_unit_layanan,
							lab.id_layanan_pendaftaran, '' dokter , l.nama nama_tindakan,
							'' tindakan_icd9 ", true);
		// p.nama as dokter,

		$this->db->from('sm_laboratorium  lab')
			->join('sm_detail_laboratorium  dlab', 'lab.id= dlab.id_laboratorium')
			->join('sm_tarif_pelayanan as tp', 'tp.id = dlab.id_tarif')
			->join('sm_layanan as l', 'l.id = tp.id_layanan')
			->join('sm_kelas as k', 'k.id = tp.id_kelas', 'left')
			// ->join('sm_tenaga_medis as tm', 'tm.id = dlab.id_dokter', 'left')
			// ->join('sm_pegawai as p', 'p.id = tm.id_pegawai', 'left')
			->join('sm_icd_ix as ix', 'ix.id = dlab.id_pengkodean', 'left')
			->join('sm_pegawai as p2', 'p2.id = dlab.id_coder', 'left');
		// $this->db->where('lab.id', $search['id_konsul'], true);
		$this->db->where('lab.id_layanan_pendaftaran', $search['id_layanan_pendaftaran'], true);

		if ($search['filterTindakan'] !== '') :
			$this->db->where('l.nama', $search['filterTindakan'], true);
		endif;

		return $this->db->order_by('dlab.id', 'desc');
	}
	// END DATA TINDAKAN




	// START FILTER TINDAKAN
	function getFilterTindakan($limit = 0, $start = 0, $search)
	{
		$result['data'] = $this->_listFilterTindakan($limit, $start, $search);
		return $result;
		$this->db->close();
	}

	private function _listFilterTindakan($limit = 0, $start = 0, $search)
	{
		if ($search['spesialisasi'] === '40') : $this->sqlFilterTindakanOK($search); //OK	
		elseif ($search['spesialisasi'] === '41') : $this->sqlFilterTindakanRadiologi($search); //Radiologi	
		elseif ($search['spesialisasi'] === '38') : $this->sqlFilterTindakanLab($search); //Lab	
		else :
			$this->sqlFilterTindakan($search);
		endif;

		// if ($limit !== 0) :
		// 	$this->db->limit($limit, $start);
		// endif;

		return $this->db->get()->result();
		$this->db->get();
		echo $this->db->last_query();
		exit();
	}

	private function sqlFilterTindakan($search)
	{
		$this->db->select("DISTINCT ON (l.nama) l.nama as nama_tindakan", false);

		$this->db->from('sm_tarif_tindakan_pasien as ttp')
			->join('sm_tarif_pelayanan as tp', 'tp.id = ttp.id_tarif_pelayanan')
			->join('sm_layanan as l', 'l.id = tp.id_layanan');

		$this->db->where('ttp.id_layanan_pendaftaran', $search['id_layanan_pendaftaran'], true);
		return $this->db->order_by('l.nama', 'asc');
	}

	private function sqlFilterTindakanOK($search)
	{
		$this->db->select('DISTINCT ON (l.nama) l.nama as nama_tindakan', true);

		$this->db->from('sm_tarif_operasi as top')
			->join('sm_tarif_pelayanan as tp', 'tp.id = top.id_tarif')
			->join('sm_jadwal_kamar_operasi as jko', 'top.id_operasi=jko.id')
			->join('sm_layanan as l', 'l.id = tp.id_layanan');
		$this->db->where('jko.id_layanan_pendaftaran', $search['id_layanan_pendaftaran'], true);
		return $this->db->order_by('l.nama', 'asc');
	}

	private function sqlFilterTindakanRadiologi($search)
	{
		$this->db->select("DISTINCT ON (l.nama) l.nama as nama_tindakan", true);

		$this->db->from('sm_radiologi rad')
			->join('sm_detail_radiologi drad', 'rad.id=drad.id_radiologi')
			->join('sm_tarif_pelayanan as tp', 'tp.id = drad.id_tarif')
			->join('sm_layanan as l', 'l.id = tp.id_layanan');
		$this->db->where('rad.id_layanan_pendaftaran', $search['id_layanan_pendaftaran'], true);
		return $this->db->order_by('l.nama', 'asc');
	}

	private function sqlFilterTindakanLab($search)
	{
		$this->db->select("DISTINCT ON (l.nama) l.nama as nama_tindakan", true);
		$this->db->from('sm_laboratorium  lab')
			->join('sm_detail_laboratorium  dlab', 'lab.id= dlab.id_laboratorium')
			->join('sm_tarif_pelayanan as tp', 'tp.id = dlab.id_tarif')
			->join('sm_layanan as l', 'l.id = tp.id_layanan');
		$this->db->where('lab.id_layanan_pendaftaran', $search['id_layanan_pendaftaran'], true);
		return $this->db->order_by('l.nama', 'asc');
	}
	// END FILTER TINDAKAN

	function getAutoCodeIcd($params, $start, $limit)
	{
		$limit = " limit " . $limit . " offset " . $start;

		$sql   = "select gss.*
                  from sm_golongan_sebab_sakit as gss                  
                  where (gss.nama ilike ('%" . $params['q'] . "%') or gss.kode_icdx_rinci ilike ('%" . $params['q'] . "%'))
				  and is_aktif = '1'
				  order by gss.kode_icdx asc";

		$data['data'] = $this->db->query($sql . $limit)->result();
		$data['total'] = $this->db->query($sql)->num_rows();

		return $data;
	}

	function getAutoCodeIcdAsterik($params, $start, $limit)
	{
		$limit = " limit " . $limit . " offset " . $start;

		$sql   = "select gss.*
                  from sm_golongan_sebab_sakit as gss                  
                  where (gss.nama ilike ('%" . $params['q'] . "%') or gss.kode_icdx_rinci ilike ('%" . $params['q'] . "%'))
				  and versi_tahun = '2010' and jenis_kode='asterik'
				  order by gss.kode_icdx asc";

		$data['data'] = $this->db->query($sql . $limit)->result();
		$data['total'] = $this->db->query($sql)->num_rows();

		return $data;
	}

	function getAutoCodeIcd9($params, $start, $limit)
	{
		$limit = " limit " . $limit . " offset " . $start;

		$sql   = "select ix.*
                  from sm_icd_ix as ix                  
                  where ( ix.nama ilike ('%" . $params['q'] . "%') or ix.icd9 ilike ('%" . $params['q'] . "%') ) and ix.icd9 is not null
				  AND is_aktif=1 order by ix.icd9 asc";

		$data['data'] = $this->db->query($sql . $limit)->result();
		$data['total'] = $this->db->query($sql)->num_rows();

		return $data;
	}


	function insertHistoryCodeTindakan($data, $table)
	{
		$this->db->insert($table, $data);
	}

	function insertHistoryCodeDiagnosa($data, $table)
	{
		$this->db->insert($table, $data);
	}

	private function sqlDataDiagnosa($search)
	{
		//concat_ws(' | ', gss.kode_icdx_rinci, gss.nama) as diagnosa,
		$this->db->select("DISTINCT ON (d.id) d.*,  
						   CASE WHEN concat_ws(' | ', gss.kode_icdx_rinci, gss.nama) <>'' THEN concat_ws(' | ', gss.kode_icdx_rinci, gss.nama) ELSE d.golongan_sebab_sakit_lain END as diagnosa,
						   gss2.kode_icdx_rinci, gss2asterik.kode_icdx_rinci kode_icdx_rinci_asterik,p.nama as dokter, p2.nama as coder, CASE WHEN d.jenis_kasus = 1 THEN 'Kasus Baru' WHEN d.jenis_kasus = 0 THEN 'Kasus Lama' ELSE '' END AS jenis_kasus", false);

		$this->db->from('sm_diagnosa as d')
			->join('sm_golongan_sebab_sakit as gss', 'gss.id = d.id_golongan_sebab_sakit', 'left')
			->join('sm_tenaga_medis as tm', 'tm.id = d.id_dokter')
			->join('sm_pegawai as p', 'p.id = tm.id_pegawai')
			->join('sm_pegawai as p2', 'p2.id = d.id_coder', 'left')
			->join('sm_golongan_sebab_sakit as gss2', 'gss2.id = d.id_pengkodean', 'left')
			->join('sm_golongan_sebab_sakit as gss2asterik', 'gss2asterik.id = d.id_pengkodean_asterik', 'left');

		$this->db->where('d.id_layanan_pendaftaran', $search['id_layanan_pendaftaran'], true);

		return $this->db->order_by('d.id', 'desc');
	}

	private function _listDataDiagnosa($limit = 0, $start = 0, $search)
	{
		$this->sqlDataDiagnosa($search);
		if ($limit !== 0) :
			$this->db->limit($limit, $start);
		endif;

		return $this->db->get()->result();
		$this->db->get();
		echo $this->db->last_query();
		exit();
	}

	function getListDataDiagnosa($limit = 0, $start = 0, $search)
	{
		$result['data'] = $this->_listDataDiagnosa($limit, $start, $search);
		$result['jumlah'] = $this->sqlDataDiagnosa($search)->get()->num_rows();
		return $result;

		$this->db->close();
	}

	function getLayananPendaftaranByIdPendaftaran($idPendaftaran)
	{
		return $this->db->select("lp.*")
			->from("sm_layanan_pendaftaran as lp")
			->where("lp.id_pendaftaran", $idPendaftaran)
			->get()
			->result_array();
	}

	function getTarifTindakanPasienByIdlayananPendaftaran($idLayananPendaftaran)
	{
		return $this->db->select('ttp.*')
			->from('sm_tarif_tindakan_pasien as tto')
			->where('lp.id', $idLayananPendaftaran, true)
			->get()
			->row();
	}

	function getTarifTindakanPasien($idTindakan)
	{
		return $this->db->select("lp.jenis_layanan", false)
			->from('sm_tarif_tindakan_pasien as ttp')
			->join('sm_layanan_pendaftaran as lp', 'lp.id = ttp.id_layanan_pendaftaran', 'left')
			->where('ttp.id', $idTindakan, true)
			->get()
			->row();
	}

	function ambilDataDiagnosis($idDiagnosis)
	{
		return $this->db->select("d.prioritas, d.id_kondisi", false)

			->from('sm_diagnosa as d')
			->join('sm_golongan_sebab_sakit as gss', 'gss.id = d.id_golongan_sebab_sakit', 'left')
			->join('sm_tenaga_medis as tm', 'tm.id = d.id_dokter')
			->join('sm_pegawai as p', 'p.id = tm.id_pegawai')
			->join('sm_pegawai as p2', 'p2.id = d.id_coder', 'left')
			->join('sm_golongan_sebab_sakit as gss2', 'gss2.id = d.id_pengkodean', 'left')
			->join('sm_golongan_sebab_sakit as gss2asterik', 'gss2asterik.id = d.id_pengkodean_asterik', 'left')
			->where("d.id", $idDiagnosis, true)
			->get()
			->row();

		$this->db->close();

	}

	function ambilDataLayanan($idLayanan)
	{
		return $this->db->select("d.id, d.id_kondisi", false)

			->from('sm_diagnosa as d')
			->join('sm_golongan_sebab_sakit as gss', 'gss.id = d.id_golongan_sebab_sakit', 'left')
			->join('sm_tenaga_medis as tm', 'tm.id = d.id_dokter')
			->join('sm_pegawai as p', 'p.id = tm.id_pegawai')
			->join('sm_pegawai as p2', 'p2.id = d.id_coder', 'left')
			->join('sm_golongan_sebab_sakit as gss2', 'gss2.id = d.id_pengkodean', 'left')
			->join('sm_golongan_sebab_sakit as gss2asterik', 'gss2asterik.id = d.id_pengkodean_asterik', 'left')
			->where("d.id_layanan_pendaftaran", $idLayanan, true)
			->get()
			->result();

		$this->db->close();

	}

	function countDataTarifTindakanPasien($idLayananPendaftaran)
	{
		return $this->db->where('id_layanan_pendaftaran', $idLayananPendaftaran)->from("sm_tarif_tindakan_pasien")->count_all_results();
	}

	function countAlreadyCodeTindakan($idLayananPendaftaran)
	{
		return $this->db->where([
			'id_layanan_pendaftaran' => $idLayananPendaftaran,
			'id_pengkodean is not NULL' => null
		])->from("sm_tarif_tindakan_pasien")->count_all_results();
	}

	function updateData($where, $data, $table)
	{
		$this->db->where($where);
		$this->db->update($table, $data);
	}

	private function sqlDataAnamnesa($search)
	{
		$this->db->select("DISTINCT ON (a.id) a.*, pe.nama AS nama_dokter", false);

		$this->db->from('sm_anamnesa as a')
			->join('sm_layanan_pendaftaran as lp', 'lp.id = a.id_layanan_pendaftaran')
			->join('sm_tenaga_medis as tm', 'tm.id = lp.id_dokter')
			->join('sm_pegawai as pe', 'pe.id = tm.id_pegawai');

		$this->db->where('a.id_layanan_pendaftaran', $search['id_layanan_pendaftaran'], true);


		return $this->db->order_by('a.id', 'desc');
	}

	private function _listDataAnamnesa($limit = 0, $start = 0, $search)
	{
		$this->sqlDataAnamnesa($search);
		if ($limit !== 0) :
			$this->db->limit($limit, $start);
		endif;

		return $this->db->get()->result();
		$this->db->get();
		echo $this->db->last_query();
		exit();
	}

	function getListDataAnamnesa($limit = 0, $start = 0, $search)
	{
		$result['data'] = $this->_listDataAnamnesa($limit, $start, $search);
		$result['jumlah'] = $this->sqlDataAnamnesa($search)->get()->num_rows();
		return $result;

		$this->db->close();
	}

	function getLayananPendaftaranByIdLayananPendaftaran($idLayananPendaftaran)
	{
		return $this->db->select("lp.*, p.no_identitas, p.nama as nama_pasien, pd.id_pasien, pd.jenis_rawat, pe.nama as nama_dokter, pd.no_sep,
								'' as asal_rawat, s.nama as spesialisasi, p.tanggal_lahir, 
								CASE WHEN p.kelamin='P' THEN 'Perempuan' ELSE 'Laki-Laki' END  kelamin,
								(select bg.nama from sm_bangsal as bg where bg.id = ri.id_bangsal) as bangsal, ri.no_ruang, ri.no_bed")
			->from("sm_layanan_pendaftaran as lp")
			->join("sm_pendaftaran as pd", "pd.id = lp.id_pendaftaran")
			->join("sm_pasien as p", "p.id = pd.id_pasien")
			->join('sm_tenaga_medis as tm', 'tm.id = lp.id_dokter')
			->join('sm_pegawai as pe', 'pe.id = tm.id_pegawai')
			->join('sm_spesialisasi as s', 's.id = lp.id_unit_layanan', 'left')
			->join('sm_rawat_inap as ri', 'ri.id_layanan_pendaftaran = lp.id', 'left')
			->where("lp.id", $idLayananPendaftaran)
			->get()
			->row();
	}

	function getPendaftaranByIdPendaftaran($idPendaftaran)
	{
		return $this->db->select("lp.*, p.no_identitas, p.nama as nama_pasien, pd.id_pasien, pd.jenis_rawat, pe.nama as nama_dokter, pd.no_sep,
								'' as asal_rawat, s.nama as spesialisasi, p.tanggal_lahir, 
								CASE WHEN p.kelamin='P' THEN 'Perempuan' ELSE 'Laki-Laki' END  kelamin,
								(select bg.nama from sm_bangsal as bg where bg.id = ri.id_bangsal) as bangsal, ri.no_ruang, ri.no_bed")
			->from("sm_layanan_pendaftaran as lp")
			->join("sm_pendaftaran as pd", "pd.id = lp.id_pendaftaran")
			->join("sm_pasien as p", "p.id = pd.id_pasien")
			->join('sm_tenaga_medis as tm', 'tm.id = lp.id_dokter')
			->join('sm_pegawai as pe', 'pe.id = tm.id_pegawai')
			->join('sm_spesialisasi as s', 's.id = lp.id_unit_layanan', 'left')
			->join('sm_rawat_inap as ri', 'ri.id_layanan_pendaftaran = lp.id', 'left')
			->where("pd.id", $idPendaftaran)
			->get()
			->row();
	}

	private function sqlPengkodeanDiagnosaHistory($search)
	{
		$this->db->select("DISTINCT ON (hpd.id) hpd.*, p.nama AS coder, gss1.kode_icdx_rinci as code_after, gss2.kode_icdx_rinci as code_before, gss1.nama as nama_code_after, gss2.nama as nama_code_before", false);

		$this->db->from('sm_history_pengkodean_diagnosa as hpd')
			->join('sm_golongan_sebab_sakit as gss1', 'gss1.id = hpd.id_golongan_sebab_sakit_after')
			->join('sm_golongan_sebab_sakit as gss2', 'gss2.id = hpd.id_golongan_sebab_sakit_before', 'left')
			->join('sm_pegawai as p', 'p.id = hpd.id_coder');

		$this->db->where('hpd.id_diagnosa', $search['id_diagnosa'], true);
		// echo $this->db->last_query();
		return $this->db->order_by('hpd.id', 'desc');
	}

	private function _listPengkodeanDiagnosaHistory($limit = 0, $start = 0, $search)
	{
		$this->sqlPengkodeanDiagnosaHistory($search);
		if ($limit !== 0) :
			$this->db->limit($limit, $start);
		endif;

		return $this->db->get()->result();
		$this->db->get();
		echo $this->db->last_query();
		exit();
	}

	function getListPengkodeanDiagnosaHistory($limit = 0, $start = 0, $search)
	{
		$result['data'] = $this->_listPengkodeanDiagnosaHistory($limit, $start, $search);
		$result['jumlah'] = $this->sqlPengkodeanDiagnosaHistory($search)->get()->num_rows();
		return $result;

		$this->db->close();
	}

	private function sqlPengkodeanTindakanHistory($search)
	{
		$tabel = '';

		if ($search['spesialisasi'] == '40') { //OK
			$tabel = 'sm_history_pengkodean_tindakanok';
		} else if ($search['spesialisasi'] == '41') { //radiologi
			$tabel = 'sm_history_pengkodean_tindakanradiologi';
		} else if ($search['spesialisasi'] == '38') { //lab
			$tabel = 'sm_history_pengkodean_tindakanlab';
		} else {
			$tabel = 'sm_history_pengkodean_tindakan';
		}

		$this->db->select("DISTINCT ON (hpd.id) hpd.*, COALESCE(p.nama,'') AS coder, COALESCE(ix1.icd9,'') as code_after, COALESCE(ix1.nama,'') as nama_code_after, COALESCE(ix2.icd9,'') as code_before, COALESCE(ix2.nama,'') as nama_code_before", false);

		$this->db->from($tabel . ' as hpd')
			->join('sm_icd_ix as ix1', 'ix1.id = hpd.id_pengkodean_after')
			->join('sm_icd_ix as ix2', 'ix2.id = hpd.id_pengkodean_before', 'left')
			->join('sm_pegawai as p', 'p.id = hpd.id_coder');

		$this->db->where('hpd.id_tarif_tindakan_pasien', $search['id_tarif_tindakan_pasien'], true);


		return $this->db->order_by('hpd.id', 'desc');
	}

	private function _listPengkodeanTindakanHistory($limit = 0, $start = 0, $search)
	{
		$this->sqlPengkodeanTindakanHistory($search);

		if ($limit !== 0) :
			$this->db->limit($limit, $start);
		endif;

		return $this->db->get()->result();
		$this->db->get();
		echo $this->db->last_query();
		exit();
	}

	function getListPengkodeanTindakanHistory($limit = 0, $start = 0, $search)
	{
		$result['data'] = $this->_listPengkodeanTindakanHistory($limit, $start, $search);
		$result['jumlah'] = $this->sqlPengkodeanTindakanHistory($search)->get()->num_rows();

		return $result;
		$this->db->close();
	}


	function getEklaim($id_pendaftaran)
	{
		$sql = "select ek.*
				from sm_eklaim ek				
				join sm_pendaftaran pd ON ek.id_pendaftaran = pd.id 
				join sm_layanan_pendaftaran lp ON ek.id_layanan_pendaftaran = lp.id
				where ek.id_pendaftaran = '" . $id_pendaftaran . "'";
		return $this->db->query($sql)->result();
	}

	function getLayananPendaftaranByIdLayananPendaftaranEclaim($id, $jenis_rawat)
	{
		$this->db->select("lp.id, pd.id as id_pendaftaran, p.no_identitas, p.nama as nama_pasien, pd.id_pasien as nomor_rm, pd.no_sep as nomor_sep, pd.no_polish as nomor_kartu, pd.tanggal_daftar as tgl_masuk, pd.tanggal_keluar as tgl_pulang, CASE WHEN pd.jenis_rawat='Inap' THEN '1' ELSE '2' END jenis_rawat, CASE WHEN pd.hak_kelas='KELAS I' THEN '1' WHEN pd.hak_kelas='KELAS II' THEN '2' WHEN pd.hak_kelas='KELAS III' THEN '3'ELSE '3' END kelas_rawat, pe.nama as nama_dokter, s.nama as spesialisasi, p.tanggal_lahir as tgl_lahir, pd.jenis_pendaftaran, lp.tindak_lanjut, EXTRACT(EPOCH FROM pd.tanggal_keluar-pd.tanggal_daftar) AS selisih, EXTRACT(MINUTE FROM pd.tanggal_keluar-pd.tanggal_daftar) AS selisih_menit,
		CASE WHEN p.kelamin='P' THEN '2' ELSE '1' END gender,
		(select bg.nama from sm_bangsal as bg where bg.id = ri.id_bangsal) as bangsal, ri.no_ruang, ri.no_bed, ri.waktu_masuk as waktu_ranap, ic.waktu_masuk as waktu_icu,
		pj.nama as nama_penjamin, kls.nama as jenis_kelas, concat_ws(' ', lp.cara_bayar, pj.nama, 'Kelas', kls.nama) as jenis_tarif, concat_ws('. ', gss.kode_icdx_rinci, ( SELECT gss.kode_icdx_rinci FROM sm_golongan_sebab_sakit AS gss WHERE gss.ID = d.id_pengkodean_asterik )) as diagnosa, ri.total_hari, ic.total_hari as icu_los, '0' berat_badan_lahir,
		EXTRACT(day FROM (pd.tanggal_keluar - pd.tanggal_daftar)) AS selisih_hari, concat('(', lpad(EXTRACT(hour FROM (pd.tanggal_keluar - pd.tanggal_daftar))::VARCHAR, 2, '0'), ':', lpad(EXTRACT(minute FROM (pd.tanggal_keluar - pd.tanggal_daftar))::VARCHAR, 2, '0'), ') jam') AS selisih_waktu,

		(SELECT sum(drad.total) total
		FROM sm_pendaftaran pd
		JOIN sm_layanan_pendaftaran as lp ON (pd.id=lp.id_pendaftaran)
		JOIN sm_order_radiologi as orad ON (lp.id = orad.id_layanan_pendaftaran)
		JOIN sm_radiologi as rad ON (orad.id = rad.id_order_radiologi)
		JOIN sm_detail_radiologi as drad ON (rad.id=drad.id_radiologi)
		WHERE pd.id = '$id' AND orad.status='konfirm' 
		GROUP BY pd.id) tarif_radiologi, 
		
		(SELECT sum(dlab.total) total
		FROM sm_pendaftaran pd
		JOIN sm_layanan_pendaftaran as lp ON (pd.id=lp.id_pendaftaran)
		JOIN sm_order_laboratorium as olab ON (lp.id = olab.id_layanan_pendaftaran)
		JOIN sm_laboratorium as lab ON (olab.id = lab.id_order_laboratorium)
		JOIN sm_detail_laboratorium as dlab ON (lab.id=dlab.id_laboratorium)
		WHERE pd.id = '$id' AND olab.status='konfirm' 
		GROUP BY pd.id) tarif_laboratorium,
		
		(SELECT sum(ttp.total) as tarif_hemodialisa
		FROM sm_pendaftaran pd
		JOIN sm_layanan_pendaftaran as lp ON (pd.id=lp.id_pendaftaran)
		JOIN sm_tarif_tindakan_pasien as ttp ON (lp.id=ttp.id_layanan_pendaftaran)
		JOIN sm_tarif_pelayanan as tp ON (ttp.id_tarif_pelayanan=tp.id)
		JOIN sm_layanan as l ON (tp.id_layanan=l.id)
		WHERE pd.id = '$id' 
		AND lp.jenis_layanan='Hemodialisa'
		AND l.nama NOT IN ('Pemeriksaan/Konsultasi Dr Spesialis', 'Pemeriksaan Dokter Spesialis')
		AND l.id_jenis_pemeriksaan NOT IN ('19','14','21')
		AND l.id_jenis_pemeriksaan != '15'
		GROUP BY pd.id) tarif_hemodialisa,

		(SELECT sum(ttp.total) as tarif_akomodasi
		FROM sm_pendaftaran pd
		JOIN sm_layanan_pendaftaran as lp ON (pd.id=lp.id_pendaftaran)
		JOIN sm_tarif_tindakan_pasien as ttp ON (lp.id=ttp.id_layanan_pendaftaran)
		JOIN sm_tarif_pelayanan as tp ON (ttp.id_tarif_pelayanan=tp.id)
		JOIN sm_layanan as l ON (tp.id_layanan=l.id)
		WHERE pd.id = '$id' 
		AND lp.jenis_layanan != 'Hemodialisa'
		AND l.id_jenis_pemeriksaan != 16
		AND l.id_jenis_pemeriksaan NOT IN ('19','14','21')
		AND l.id_jenis_pemeriksaan != '15'
		GROUP BY pd.id) tarif_akomodasi,

		(SELECT sum(ri.total_hari*ri.nominal) as tarif_rawat
		FROM sm_pendaftaran pd
		JOIN sm_layanan_pendaftaran as lp ON (pd.id=lp.id_pendaftaran)
		JOIN sm_rawat_inap as ri ON (lp.id=ri.id_layanan_pendaftaran)
		WHERE pd.id = '$id'
		GROUP BY pd.id) tarif_kamar,

		(SELECT sum(ic.total_hari*ic.nominal) as tarif_rawat
		FROM sm_pendaftaran pd
		JOIN sm_layanan_pendaftaran as lp ON (pd.id=lp.id_pendaftaran)
		JOIN sm_intensive_care as ic ON (lp.id=ic.id_layanan_pendaftaran)
		WHERE pd.id = '$id'
		GROUP BY pd.id) tarif_intensive_care,

		(SELECT sum(bd.total) as tarif_pelayanan_darah
		FROM sm_pendaftaran pd
		JOIN sm_layanan_pendaftaran as lp ON (pd.id=lp.id_pendaftaran)
		JOIN sm_order_bank_darah as obd ON (lp.id=obd.id_layanan_pendaftaran)
		JOIN sm_tarif_bank_darah as bd ON (obd.id=bd.id_order_bank_darah)
		WHERE pd.id = '$id' AND obd.diperiksa = 'Sudah'
		GROUP BY pd.id) tarif_pelayanan_darah,

		(SELECT sum(ttp.total) as tarif_konsultasi
		FROM sm_pendaftaran pd
		JOIN sm_layanan_pendaftaran as lp ON (pd.id=lp.id_pendaftaran)
		JOIN sm_tarif_tindakan_pasien as ttp ON (lp.id=ttp.id_layanan_pendaftaran)
		JOIN sm_tarif_pelayanan as tp ON (ttp.id_tarif_pelayanan=tp.id)
		JOIN sm_layanan as l ON (tp.id_layanan=l.id)
		WHERE pd.id = '$id' 
		AND l.id_jenis_pemeriksaan = 16
		GROUP BY pd.id) tarif_konsultasi,

		(SELECT sum(ttp.total) as tarif_keperawatan
		FROM sm_pendaftaran pd
		JOIN sm_layanan_pendaftaran as lp ON (pd.id=lp.id_pendaftaran)
		JOIN sm_tarif_tindakan_pasien as ttp ON (lp.id=ttp.id_layanan_pendaftaran)
		JOIN sm_tarif_pelayanan as tp ON (ttp.id_tarif_pelayanan=tp.id)
		JOIN sm_layanan as l ON (tp.id_layanan=l.id)
		WHERE pd.id = '$id' 
		AND l.id_jenis_pemeriksaan IN ('19','14','21')
		AND l.nama != 'Administrasi Pasien Rawat Inap'
		GROUP BY pd.id) tarif_keperawatan,

		(SELECT sum(ttp.total) as tarif_tenaga_ahli
		FROM sm_pendaftaran pd
		JOIN sm_layanan_pendaftaran as lp ON (pd.id=lp.id_pendaftaran)
		JOIN sm_tarif_tindakan_pasien as ttp ON (lp.id=ttp.id_layanan_pendaftaran)
		JOIN sm_tarif_pelayanan as tp ON (ttp.id_tarif_pelayanan=tp.id)
		JOIN sm_layanan as l ON (tp.id_layanan=l.id)
		WHERE pd.id = '$id' 
		AND tp.id_eklaim = 'Tenaga Ahli'
		AND l.id_jenis_pemeriksaan IN ('19','14','21')
		GROUP BY pd.id) tarif_tenaga_ahli,

		(SELECT sum(ttp.total) as tarif_rehabilitas
		FROM sm_pendaftaran pd
		JOIN sm_layanan_pendaftaran as lp ON (pd.id=lp.id_pendaftaran)
		JOIN sm_tarif_tindakan_pasien as ttp ON (lp.id=ttp.id_layanan_pendaftaran)
		JOIN sm_tarif_pelayanan as tp ON (ttp.id_tarif_pelayanan=tp.id)
		JOIN sm_layanan as l ON (tp.id_layanan=l.id)
		WHERE pd.id = '$id' 
		AND l.id_jenis_pemeriksaan = '15'
		GROUP BY pd.id) tarif_rehabilitas,

		(SELECT sum(tto.total) as tarif_bedah_ok
		FROM sm_pendaftaran pd
		JOIN sm_layanan_pendaftaran as lp ON (pd.id=lp.id_pendaftaran)
		JOIN sm_jadwal_kamar_operasi as jko ON (lp.id=jko.id_layanan_pendaftaran)
		JOIN sm_tarif_operasi as tto ON (jko.id=tto.id_operasi)
		WHERE pd.id = '$id' 
		AND tto.is_operasi = 'Ya'
		GROUP BY pd.id) tarif_bedah_ok,

		(SELECT sum(tto.total) as tarif_non_bedah_vk
		FROM sm_pendaftaran pd
		JOIN sm_layanan_pendaftaran as lp ON (pd.id=lp.id_pendaftaran)
		JOIN sm_jadwal_kamar_operasi as jko ON (lp.id=jko.id_layanan_pendaftaran)
		JOIN sm_tarif_operasi as tto ON (jko.id=tto.id_operasi)
		WHERE pd.id = '$id' 
		AND tto.is_operasi != 'Ya'
		GROUP BY pd.id) tarif_non_bedah_vk,

		((SELECT sum(dpnj.qty*ceil(dpnj.harga_jual)) total_jumlah
		FROM sm_pendaftaran pd
		JOIN sm_layanan_pendaftaran as lp ON (pd.id=lp.id_pendaftaran)
		JOIN sm_penjualan as pnj ON (lp.id=pnj.id_layanan_pendaftaran)
		JOIN sm_detail_penjualan as dpnj ON (pnj.id=dpnj.id_penjualan)
		JOIN sm_kemasan_barang as kb ON (dpnj.id_kemasan=kb.id)
		JOIN sm_barang as br ON (kb.id_barang=br.id)
		WHERE pd.id = '$id' 
		AND dpnj.qty > 0
		AND pnj.jenis = 'Resep'
		AND br.is_obat_kronis = 0
		GROUP BY pd.id) - (SELECT COALESCE(SUM(rp.total), 0) as total_retur
		FROM sm_pendaftaran pd
		JOIN sm_layanan_pendaftaran as lp ON (pd.id=lp.id_pendaftaran)
		JOIN sm_penjualan as pnj ON (lp.id=pnj.id_layanan_pendaftaran)
		JOIN sm_retur_penjualan as rp ON (pnj.id = rp.id_penjualan)
		WHERE pd.id = '$id')) tarif_obat,

		(SELECT sum(dpnj.qty*ceil(dpnj.harga_jual)) total_jumlah
		FROM sm_pendaftaran pd
		JOIN sm_layanan_pendaftaran as lp ON (pd.id=lp.id_pendaftaran)
		JOIN sm_penjualan as pnj ON (lp.id=pnj.id_layanan_pendaftaran)
		JOIN sm_detail_penjualan as dpnj ON (pnj.id=dpnj.id_penjualan)
		JOIN sm_kemasan_barang as kb ON (dpnj.id_kemasan=kb.id)
		JOIN sm_barang as br ON (kb.id_barang=br.id)
		WHERE pd.id = '$id' 
		AND dpnj.qty > 0
		AND pnj.jenis = 'BHP'
		GROUP BY pd.id) tarif_bhp,

		(SELECT sum(dpnj.qty*ceil(dpnj.harga_jual)) total_jumlah
		FROM sm_pendaftaran pd
		JOIN sm_layanan_pendaftaran as lp ON (pd.id=lp.id_pendaftaran)
		JOIN sm_penjualan as pnj ON (lp.id=pnj.id_layanan_pendaftaran)
		JOIN sm_detail_penjualan as dpnj ON (pnj.id=dpnj.id_penjualan)
		JOIN sm_kemasan_barang as kb ON (dpnj.id_kemasan=kb.id)
		JOIN sm_barang as br ON (kb.id_barang=br.id)
		WHERE pd.id = '$id' 
		AND dpnj.qty > 0
		AND pnj.jenis = 'Resep'
		AND br.is_obat_kronis = 1
		GROUP BY pd.id) tarif_obat_kronis,

		(SELECT sum(dpnj.qty*dpnj.harga_jual) total_jumlah
		FROM sm_pendaftaran pd
		JOIN sm_layanan_pendaftaran as lp ON (pd.id=lp.id_pendaftaran)
		JOIN sm_penjualan as pnj ON (lp.id=pnj.id_layanan_pendaftaran)
		JOIN sm_detail_penjualan as dpnj ON (pnj.id=dpnj.id_penjualan)
		JOIN sm_kemasan_barang as kb ON (dpnj.id_kemasan=kb.id)
		JOIN sm_barang as br ON (kb.id_barang=br.id)
		WHERE pd.id = '$id' 
		AND dpnj.qty > 0
		AND br.id_eklaim = 'Obat Kemoterapi'
		GROUP BY pd.id) tarif_obat_kemoterapi,

		(SELECT sum(dpnj.qty*dpnj.harga_jual) total_jumlah
		FROM sm_pendaftaran pd
		JOIN sm_layanan_pendaftaran as lp ON (pd.id=lp.id_pendaftaran)
		JOIN sm_penjualan as pnj ON (lp.id=pnj.id_layanan_pendaftaran)
		JOIN sm_detail_penjualan as dpnj ON (pnj.id=dpnj.id_penjualan)
		JOIN sm_kemasan_barang as kb ON (dpnj.id_kemasan=kb.id)
		JOIN sm_barang as br ON (kb.id_barang=br.id)
		WHERE pd.id = '$id' 
		AND dpnj.qty > 0
		AND br.id_eklaim = 'Alkes'
		GROUP BY pd.id) tarif_alkes,

		(SELECT sum(dpnj.qty*dpnj.harga_jual) total_jumlah
		FROM sm_pendaftaran pd
		JOIN sm_layanan_pendaftaran as lp ON (pd.id=lp.id_pendaftaran)
		JOIN sm_penjualan as pnj ON (lp.id=pnj.id_layanan_pendaftaran)
		JOIN sm_detail_penjualan as dpnj ON (pnj.id=dpnj.id_penjualan)
		JOIN sm_kemasan_barang as kb ON (dpnj.id_kemasan=kb.id)
		JOIN sm_barang as br ON (kb.id_barang=br.id)
		WHERE pd.id = '$id' 
		AND dpnj.qty > 0
		AND br.id_eklaim = 'Sewa Alat'
		GROUP BY pd.id) tarif_sewa_alat,

		(SELECT ek.id_pendaftaran
		FROM sm_eklaim ek
		JOIN sm_pendaftaran pd ON (ek.id_pendaftaran=pd.id)
		WHERE ek.id_pendaftaran = '$id'
		GROUP BY ek.id_pendaftaran) status_klaim
		")
			->from("sm_layanan_pendaftaran as lp");

		if ($jenis_rawat != 'Inap') {
			$this->db->join("sm_pendaftaran as pd", "pd.id = lp.id_pendaftaran");
		} else {
			$this->db->join("sm_pendaftaran as pd", "pd.id = lp.id_pendaftaran and lp.jenis_layanan IN ('Rawat Inap', 'Intensive Care')");
		}

		$this->db->join("sm_kajian_keperawatan_anak as kka", "lp.id = kka.id_layanan_pendaftaran", "left")
			->join("sm_pasien as p", "p.id = pd.id_pasien")
			->join('sm_tenaga_medis as tm', 'tm.id = lp.id_dokter')
			->join('sm_pegawai as pe', 'pe.id = tm.id_pegawai')
			->join('sm_spesialisasi as s', 's.id = lp.id_unit_layanan', 'left')
			->join('sm_rawat_inap as ri', 'ri.id_layanan_pendaftaran = lp.id', 'left')
			->join('sm_intensive_care as ic', 'lp.id = ic.id_layanan_pendaftaran', 'left')
			->join('sm_penjamin as pj', 'pj.id = lp.id_penjamin', 'left')
			->join('sm_tarif_pelayanan as tp', 'tp.id_layanan = lp.id', 'left')
			->join('sm_kelas as kls', 'kls.id = tp.id_kelas', 'left')
			->join('sm_tarif_tindakan_pasien as ttp', 'ttp.id_layanan_pendaftaran = lp.id', 'left')
			->join('sm_layanan as l', 'l.id = tp.id_layanan', 'left')
			->join('sm_diagnosa as d', 'd.id_layanan_pendaftaran = lp.id')
			->join('sm_golongan_sebab_sakit as gss', 'gss.id = d.id_pengkodean','left')
			->where("pd.id", $id);
		if ($jenis_rawat == 'Inap') {
			$this->db->order_by('lp.jenis_layanan', 'desc');
		};

		return $this->db->get()->row();
	}

	function getDiagnosaUtama($id)
	{
		return $this->db->select(" concat_ws('. ', gss.kode_icdx_rinci, ( SELECT gss.kode_icdx_rinci FROM sm_golongan_sebab_sakit AS gss WHERE gss.ID = d.id_pengkodean_asterik )) as code, concat_ws('. ', ( SELECT gss1.nama FROM sm_golongan_sebab_sakit AS gss1 WHERE gss1.ID = d.id_golongan_sebab_sakit ), d.golongan_sebab_sakit_lain) as nama ")
			->from('sm_diagnosa as d')
			->join('sm_golongan_sebab_sakit as gss', 'gss.id = d.id_pengkodean')
			->join('sm_layanan_pendaftaran as lp', 'lp.id = d.id_layanan_pendaftaran')
			->join('sm_pendaftaran as pd', 'pd.id = lp.id_pendaftaran')
			->where('pd.id', $id, true)
			->where('prioritas', 'Utama')
			->order_by('lp.jenis_layanan', 'desc')
			// ->where('lp.jenis_layanan', 'Rawat Inap', true)
			->get()
			->result();
	}

	function getDiagnosaSekunder($id)
	{
		return $this->db->select(" concat_ws('. ', gss.kode_icdx_rinci, ( SELECT gss.kode_icdx_rinci FROM sm_golongan_sebab_sakit AS gss WHERE gss.ID = d.id_pengkodean_asterik )) as code, concat_ws('. ', ( SELECT gss1.nama FROM sm_golongan_sebab_sakit AS gss1 WHERE gss1.ID = d.id_golongan_sebab_sakit ), d.golongan_sebab_sakit_lain) as nama ")
			->from('sm_diagnosa as d')
			->join('sm_golongan_sebab_sakit as gss', 'gss.id = d.id_pengkodean')
			->join('sm_layanan_pendaftaran as lp', 'lp.id = d.id_layanan_pendaftaran')
			->join('sm_pendaftaran as pd', 'pd.id = lp.id_pendaftaran')
			->where('pd.id', $id, true)
			->where('prioritas', 'Sekunder')
			->order_by('lp.jenis_layanan', 'desc')
			// ->where('lp.jenis_layanan', 'Rawat Inap', true)
			->get()
			->result();
	}

	function getProsedurTindakan($id)
	{
		return $this->db->select(" tp.icd9 as code, pl.nama ")
			->from('sm_tarif_tindakan_pasien as ttp')
			->join('sm_icd_ix as tp', 'tp.id = ttp.id_pengkodean')
			->join('sm_tarif_pelayanan as tpl', 'tpl.id = ttp.id_tarif_pelayanan')
			->join('sm_layanan as pl', 'pl.id = tpl.id_layanan')
			->join('sm_layanan_pendaftaran as lp', 'lp.id = ttp.id_layanan_pendaftaran')
			->join('sm_pendaftaran as pd', 'pd.id = lp.id_pendaftaran')
			->where('pd.id', $id, true)
			->order_by('lp.jenis_layanan', 'desc')
			// ->where('lp.jenis_layanan', 'Rawat Inap', true)
			->get()
			->result();
	}

	function getProsedureTindakanOK($id)
	{
		return $this->db->select(" tp.icd9 as code, pl.nama ")
			->from('sm_tarif_operasi as to')
			->join('sm_icd_ix as tp', 'tp.id = to.id_pengkodean')
			->join('sm_jadwal_kamar_operasi as jko', 'jko.id = to.id_operasi')
			->join('sm_tarif_pelayanan as tpl', 'tpl.id = to.id_tarif')
			->join('sm_layanan as pl', 'pl.id = tpl.id_layanan')
			->join('sm_layanan_pendaftaran as lp', 'jko.id_layanan_pendaftaran = lp.id')
			->where('lp.id_pendaftaran', $id, true)
			->get()
			->result();
	}

	function getProsedureTindakanLab($id)
	{
		return $this->db->select(" tp.icd9 as code, pl.nama ")
			->from('sm_order_laboratorium as olab')
			->join('sm_laboratorium as lab', 'lab.id_order_laboratorium = olab.id')
			->join('sm_detail_laboratorium as dlab', 'dlab.id_laboratorium = lab.id')
			->join('sm_icd_ix as tp', 'tp.id = dlab.id_pengkodean')
			->join('sm_tarif_pelayanan as tpl', 'tpl.id = dlab.id_tarif')
			->join('sm_layanan as pl', 'pl.id = tpl.id_layanan')
			->join('sm_layanan_pendaftaran as lp', 'lab.id_layanan_pendaftaran = lp.id')
			->where('lp.id_pendaftaran', $id, true)
			->get()
			->result();
	}

	function getProsedureTindakanRad($id)
	{
		return $this->db->select(" tp.icd9 as code, pl.nama ")
			->from('sm_order_radiologi as orad')
			->join('sm_radiologi as rad', 'rad.id_order_radiologi = orad.id')
			->join('sm_detail_radiologi as drad', 'drad.id_radiologi = rad.id')
			->join('sm_icd_ix as tp', 'tp.id = drad.id_pengkodean')
			->join('sm_tarif_pelayanan as tpl', 'tpl.id = drad.id_tarif')
			->join('sm_layanan as pl', 'pl.id = tpl.id_layanan')
			->join('sm_layanan_pendaftaran as lp', 'rad.id_layanan_pendaftaran = lp.id')
			->where('lp.id_pendaftaran', $id, true)
			->get()
			->result();
	}

	function simpanDataEklaim($data)
	{
		$insert = [
			'id_pendaftaran'        	=> $data['id_pendaftaran'] ?? NULL,
			'id_layanan_pendaftaran'	=> $data['id_layanan_pendaftaran'] ?? NULL,
			'nomor_kartu'           	=> $data['nomor_kartu'] ?? NULL,
			'nomor_sep'             	=> $data['nomor_sep'] ?? NULL,
			'nomor_rm'              	=> $data['nomor_rm'] ?? NULL,
			'nama_pasien'           	=> $data['nama_pasien'] ?? NULL,
			'tgl_lahir'             	=> $data['tgl_lahir'] ?? NULL,
			'gender'                	=> $data['gender'] ?? NULL,
			'tgl_masuk'             	=> $data['tgl_masuk'] ?? NULL,
			'tgl_pulang'            	=> $data['tgl_pulang'] ?? NULL,
			'cara_masuk'            	=> $data['cara_masuk'] ?? NULL, // new update
			'jenis_rawat'           	=> $data['jenis_rawat'] ?? NULL,
			'kelas_rawat'           	=> $data['kelas_rawat'] ?? NULL,
			'adl_sub_acute'         	=> $data['adl_sub_acute'] ?? NULL,
			'adl_chronic'           	=> $data['adl_chronic'] ?? NULL,
			'sistole'               	=> $data['sistole'] ?? NULL, // new update
			'diastole'              	=> $data['diastole'] ?? NULL, // new update
			'icu_indikator'         	=> $data['icu_indikator'] ?? NULL,
			'icu_los'               	=> $data['icu_los'] ?? NULL,
			'ventilator_hour'       	=> $data['ventilator_hour'] ?? NULL,
			'upgrade_class_ind'     	=> $data['upgrade_class_ind'] ?? NULL,
			'upgrade_class_class'   	=> $data['upgrade_class_class'] ?? NULL,
			'upgrade_class_los'     	=> $data['upgrade_class_los'] ?? NULL,
			'add_payment_pct'       	=> $data['add_payment_pct'] ?? NULL,
			'birth_weight'          	=> $data['birth_weight'] ?? NULL,
			'discharge_status'      	=> $data['discharge_status'] ?? NULL,
			'diagnosa'              	=> $data['diagnosa'] ?? NULL,
			'procedure'             	=> $data['procedure'] ?? NULL,
			'prosedur_non_bedah'    	=> $data['prosedur_non_bedah'] ?? NULL,
			'prosedur_bedah'        	=> $data['prosedur_bedah'] ?? NULL,
			'konsultasi'            	=> $data['konsultasi'] ?? NULL,
			'tenaga_ahli'           	=> $data['tenaga_ahli'] ?? NULL,
			'keperawatan'           	=> $data['keperawatan'] ?? NULL,
			'penunjang'             	=> $data['penunjang'] ?? NULL,
			'radiologi'             	=> $data['radiologi'] ?? NULL,
			'laboratorium'          	=> $data['laboratorium'] ?? NULL,
			'pelayanan_darah'       	=> $data['pelayanan_darah'] ?? NULL,
			'rehabilitasi'          	=> $data['rehabilitasi'] ?? NULL,
			'kamar'                 	=> $data['kamar'] ?? NULL,
			'rawat_intensif'        	=> $data['rawat_intensif'] ?? NULL,
			'obat'                  	=> $data['obat'] ?? NULL,
			'obat_kronis'           	=> $data['obat_kronis'] ?? NULL,
			'obat_kemoterapi'       	=> $data['obat_kemoterapi'] ?? NULL,
			'alkes'                 	=> $data['alkes'] ?? NULL,
			'bmhp'                  	=> $data['bmhp'] ?? NULL,
			'sewa_alat'             	=> $data['sewa_alat'] ?? NULL,
			'nama_dokter'           	=> $data['nama_dokter'] ?? NULL,
			'kode_tarif'            	=> $data['kode_tarif'] ?? NULL,
			'payor_id'              	=> $data['payor_id'] ?? NULL,
			'payor_cd'              	=> $data['payor_cd'] ?? NULL,
			'coder_nik'             	=> $data['coder_nik'] ?? NULL,
			'created_at'            	=> $data['created_at'] ?? NULL,
			'status_bridging'        	=> 'normal',
			'method_status'        		=> 'set_claim_data',
			'diagnosa_inagrouper'    	=> $data['diagnosa'] ?? NULL,
			'procedure_inagrouper'   	=> $data['procedure'] ?? NULL,
		];

		return $this->db->insert('sm_eklaim', $insert);
	}

	function updateDataEklaim($data, $id)
	{
		$insert = [
			'id_pendaftaran'        	=> $data['id_pendaftaran'] ?? NULL,
			'id_layanan_pendaftaran'	=> $data['id_layanan_pendaftaran'] ?? NULL,
			'nomor_kartu'           	=> $data['nomor_kartu'] ?? NULL,
			'nomor_sep'             	=> $data['nomor_sep'] ?? NULL,
			'nomor_rm'              	=> $data['nomor_rm'] ?? NULL,
			'nama_pasien'           	=> $data['nama_pasien'] ?? NULL,
			'tgl_lahir'             	=> $data['tgl_lahir'] ?? NULL,
			'gender'                	=> $data['gender'] ?? NULL,
			'tgl_masuk'             	=> $data['tgl_masuk'] ?? NULL,
			'tgl_pulang'            	=> $data['tgl_pulang'] ?? NULL,
			'cara_masuk'            	=> $data['cara_masuk'] ?? NULL, // new update
			'jenis_rawat'           	=> $data['jenis_rawat'] ?? NULL,
			'kelas_rawat'           	=> $data['kelas_rawat'] ?? NULL,
			'adl_sub_acute'         	=> $data['adl_sub_acute'] ?? NULL,
			'adl_chronic'           	=> $data['adl_chronic'] ?? NULL,
			'sistole'               	=> $data['sistole'] ?? NULL, // new update
			'diastole'              	=> $data['diastole'] ?? NULL, // new update
			'icu_indikator'         	=> $data['icu_indikator'] ?? NULL,
			'icu_los'               	=> $data['icu_los'] ?? NULL,
			'ventilator_hour'       	=> $data['ventilator_hour'] ?? NULL,
			'upgrade_class_ind'     	=> $data['upgrade_class_ind'] ?? NULL,
			'upgrade_class_class'   	=> $data['upgrade_class_class'] ?? NULL,
			'upgrade_class_los'     	=> $data['upgrade_class_los'] ?? NULL,
			'add_payment_pct'       	=> $data['add_payment_pct'] ?? NULL,
			'birth_weight'          	=> $data['birth_weight'] ?? NULL,
			'discharge_status'      	=> $data['discharge_status'] ?? NULL,
			'diagnosa'              	=> $data['diagnosa'] ?? NULL,
			'procedure'             	=> $data['procedure'] ?? NULL,
			'prosedur_non_bedah'    	=> $data['prosedur_non_bedah'] ?? NULL,
			'prosedur_bedah'        	=> $data['prosedur_bedah'] ?? NULL,
			'konsultasi'            	=> $data['konsultasi'] ?? NULL,
			'tenaga_ahli'           	=> $data['tenaga_ahli'] ?? NULL,
			'keperawatan'           	=> $data['keperawatan'] ?? NULL,
			'penunjang'             	=> $data['penunjang'] ?? NULL,
			'radiologi'             	=> $data['radiologi'] ?? NULL,
			'laboratorium'          	=> $data['laboratorium'] ?? NULL,
			'pelayanan_darah'       	=> $data['pelayanan_darah'] ?? NULL,
			'rehabilitasi'          	=> $data['rehabilitasi'] ?? NULL,
			'kamar'                 	=> $data['kamar'] ?? NULL,
			'rawat_intensif'        	=> $data['rawat_intensif'] ?? NULL,
			'obat'                  	=> $data['obat'] ?? NULL,
			'obat_kronis'           	=> $data['obat_kronis'] ?? NULL,
			'obat_kemoterapi'       	=> $data['obat_kemoterapi'] ?? NULL,
			'alkes'                 	=> $data['alkes'] ?? NULL,
			'bmhp'                  	=> $data['bmhp'] ?? NULL,
			'sewa_alat'             	=> $data['sewa_alat'] ?? NULL,
			'nama_dokter'           	=> $data['nama_dokter'] ?? NULL,
			'kode_tarif'            	=> $data['kode_tarif'] ?? NULL,
			'payor_id'              	=> $data['payor_id'] ?? NULL,
			'payor_cd'              	=> $data['payor_cd'] ?? NULL,
			'coder_nik'             	=> $data['coder_nik'] ?? NULL,
			'created_at'            	=> $data['created_at'] ?? NULL,
		];

		$this->db->where('id_pendaftaran', $id, true)->update('sm_eklaim', $insert);

		return $id;
	}
}
