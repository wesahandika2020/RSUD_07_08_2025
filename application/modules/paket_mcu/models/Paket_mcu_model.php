<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Paket_mcu_model extends CI_Model {

    
    function __construct()
    {
        parent::__construct();		
		$this->table = 'sm_paket as p';
	}

	function getList($start, $limit, $search)
    {
        $this->db->select('p.*');
        $this->db->from($this->table);
        $this->db->order_by('p.nama', 'asc');
        $this->db->limit($limit, $start);

        if ($search['keyword'] !== '') {
			$this->db->like('LOWER(p.nama)', strtolower($search['keyword']));
		}                    

        $result['data'] = $this->db->get()->result();
        $result['jumlah'] = $this->db->count_all_results($this->table);
        return $result;
    }

	function getDetailByIdPaket($id)
	{
		return $this->db->select('pt.*, p.nama as nama_paket, p.harga as harga_paket, l.nama as nama_tindakan, u.nama as nama_unit, k.nama as nama_kelas, jp.nama as nama_jenis_pemeriksaan')
			->from('sm_paket_tindakan as pt')
			->join('sm_paket as p', 'pt.id_paket = p.id')
			->join('sm_tarif_pelayanan as tp', 'pt.id_tindakan = tp.id')
			->join('sm_layanan as l', 'tp.id_layanan = l.id')
			->join('sm_unit as u', 'tp.id_unit = u.id')
			->join('sm_kelas as k', 'tp.id_kelas = k.id')
			->join('sm_jenis_pemeriksaan as jp', 'l.id_jenis_pemeriksaan = jp.id')
			->where('pt.id_paket', $id, true)
			->order_by('l.nama', 'asc')
			->get()
			->result();
	}

	function getPaketByIdPaketIdTindakan($idPaket, $idTindakan)
	{
		return $this->db->select('pt.*')
			->from('sm_paket_tindakan as pt')			
			->where('pt.id_paket', $idPaket, true)
			->where('pt.id_tindakan', $idTindakan, true)
			->get()
			->row();
	}	
}
