<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Medical_certificate_model extends CI_Model
{

	function __construct()
	{
		parent::__construct();
		$this->datetime = date('Y-m-d H:i:s');
		$this->table = 'sm_medical_certificate as mc';
	}

	function getListDataMedicalCertificate($start, $limit, $data)
	{
		$this->db->select("mc.*, p.nama as pasien, p.id as no_rm, 
						p.kelamin, p.alamat, p.tanggal_lahir, pg.nama as user, 
						date_part('day', age(mc.tanggal_end, mc.tanggal_start)) as hari");
		$this->db->from($this->table);
		$this->db->join('sm_pasien as p', 'p.id = mc.id_pasien');
		$this->db->join('sm_pegawai as pg', 'pg.id = mc.id_user', 'left');
		$this->db->where('mc.id IS NOT NULL');
		$this->db->order_by('mc.tanggal_visite', 'desc');
		$this->db->limit($limit, $start);

		if ($data['search'] !== '') :
			$this->db->like('LOWER(p.nama)', strtolower($data['search']));
			$this->db->or_like('LOWER(p.id)', strtolower($data['search']));
		endif;

		$result['data'] = $this->db->get()->result();
		$result['jumlah'] = $this->db->count_all_results($this->table);
		return $result;
	}

	function getDataMedicalCertificateById($id)
	{
		$this->db->select("mc.*, p.nama as pasien, p.id as no_rm, 
						p.kelamin, p.alamat, p.tanggal_lahir, pg.nama as user, 
						date_part('day', age(mc.tanggal_end, mc.tanggal_start))+1 as hari,
						date_part('day', age(mc.tanggal_end_istirahat, mc.tanggal_start_istirahat))+1 as hari_istirahat,
						date_part('day', age(mc.tanggal_end_dirawat, mc.tanggal_start_dirawat))+1 as hari_dirawat,
						date_part('day', age(mc.tanggal_end_persalinan, mc.tanggal_start_persalinan))+1 as hari_persalinan");
		$this->db->from($this->table);
		$this->db->join('sm_pasien as p', 'p.id = mc.id_pasien');
		$this->db->join('sm_pegawai as pg', 'pg.id = mc.id_user', 'left');
		$this->db->where('mc.id', $id, true);

		$result = $this->db->get()->row();
		return $result;
	}

	function simpanDataMedicalCertificate($data)
	{
		$id = safe_post('id');
		$this->db->trans_begin();
		if (!$id) :
			$data['created_date'] = $this->datetime;
			$this->db->insert($this->table, $data);
			$id = $this->db->insert_id();

			if ($this->db->trans_status() === false) :
				$this->db->trans_rollback();
				$response = array('status' => false, 'message' => 'Gagal menambahkan data');
			else :
				$this->db->trans_commit();
				$response = array('id' => $id, 'status' => true, 'message' => 'Berhasil menambahkan data');
			endif;
			return $response;
		else :
			$data['updated_date'] = $this->datetime;
			$this->db->where('id', $id, true)->update($this->table, $data);
			$id = $id;
			if ($this->db->trans_status() === false) :
				$this->db->trans_rollback();
				$response = array('status' => false, 'message' => 'Gagal mengubah data');
			else :
				$this->db->trans_commit();
				$response = array('id' => $id, 'status' => true, 'message' => 'Berhasil mengubah data');
			endif;
			return $response;
		endif;
	}
}
