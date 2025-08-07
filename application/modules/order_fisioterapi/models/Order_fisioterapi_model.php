<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Order_fisioterapi_model extends CI_Model {

	function __construct()
	{
		parent::__construct();
        $this->datetime = date('Y-m-d H:i:s');
        
	}

	function sqlOrderFisioterapi($search)
    {
        $this->db->select("lp.*, srm.id as id_rehab_medik, l.nama, ttp.id as id_tindakan, srms.stop_terapi, srms.keterangan, srmk.id as id_kunjungan, srmk.total_kunjungan, srmk.status, srms.status as sm_status,
                    pd.id_pasien as no_rm, 
                    pd.no_register, p.nama as pasien, 
                    lp.id as id_layanan_pendaftaran, lp.id_pendaftaran");
        $this->db->from("sm_tarif_tindakan_pasien as ttp");
        $this->db->join("sm_rehab_medik_status as srms", "srms.id_tindakan = ttp.id", "left");
        $this->db->join("sm_tarif_pelayanan as tp", "tp.id = ttp.id_tarif_pelayanan", "left");
        $this->db->join("sm_layanan as l", "l.id = tp.id_layanan", "left");
        $this->db->join("sm_layanan_pendaftaran as lp", "lp.id = ttp.id_layanan_pendaftaran", "left");
        $this->db->join("sm_pendaftaran as pd", "pd.id = lp.id_pendaftaran");
        $this->db->join("sm_pasien as p", "p.id = pd.id_pasien");
        $this->db->join("sm_rehab_medik_kunjungan as srmk", "p.id = srmk.id_pasien", "left");
        $this->db->join("sm_rehab_medik as srm", "srm.id_layanan_pendaftaran = lp.id", "left");
        $this->db->join("sm_spesialisasi as sp", "sp.id = lp.id_unit_layanan", "left");
        $this->db->join("sm_tenaga_medis as tm", "tm.id = lp.id_dokter", "left");
        $this->db->join("sm_pegawai as pg", "pg.id = tm.id_pegawai", "left");
        $this->db->where('lp.id_unit_layanan', 34, true);
        $this->db->where('srmk.status', null);
        $this->db->where('srmk.total_kunjungan is NOT NULL', NULL, FALSE);
        $this->db->where('srms.status', null);

        if (($search['tanggal_awal'] !== '') & ($search['tanggal_akhir'] !== '')) :
            $this->db->where("lp.tanggal_layanan BETWEEN '" . date2mysql($search['tanggal_awal']) . " 00:00:00' AND '" . date2mysql($search['tanggal_akhir']) . " 23:59:59'");
        endif;

        if ($search['no_register'] !== '') :
            $this->db->where('pd.no_register', $search['no_register'], true);
        endif;

        if ($search['no_rm'] !== '') :
            $this->db->like('p.id', $search['no_rm'], 'before', true);
        endif;

        if ($search['dokter'] !== '') :
            $this->db->where('lp.id_dokter', $search['dokter']);
        endif;

        if ($search['nama'] !== '') :
            $this->db->where("p.nama ilike '%" . strtolower($search['nama']) . "%'");
        endif;

        return $this->db->order_by('lp.tanggal_layanan', 'desc');    
    }

    private function _listOrderFisioterapi($limit = 0, $start = 0, $search)
    {
        $this->sqlOrderFisioterapi($search);
		if ($limit !== 0) :
			$this->db->limit($limit, $start);
        endif;

        return $this->db->get()->result();
        $this->db->get(); echo $this->db->last_query(); exit();
    }

    function getListDataOrderFisioterapi($limit = 0, $start = 0, $search)
    {
        $result['data'] = $this->_listOrderFisioterapi($limit, $start, $search);
        $result['jumlah'] = $this->sqlOrderFisioterapi($search)->get()->num_rows();
        return $result;
        
        $this->db->close();
        
    }

    function getTerapi($id_pasien)
    {
    return $this->db->select("srmk.id as idk, srmk.status")
                    ->from('sm_rehab_medik_kunjungan as srmk')
                    ->where('srmk.id_pasien', $id_pasien, true)
                    ->where('srmk.status', null)
                    ->order_by('srmk.id', 'desc')
                    ->limit(1)
                    ->get()
                    ->result();
        $this->db->close();
    } 

    function simpan_status($data){

        $this->db->insert('sm_rehab_medik_status', $data);

    }

    function batal_status($data){

        
            return $this->db->where("id", $data)->delete("sm_rehab_medik_status");
      

    }

    function update_henti_status($data, $id) 
    {
        $this->db->trans_begin();
        $this->db->where('id', $id, true)->update('sm_rehab_medik_kunjungan', $data);
        
        if ($this->db->trans_status() === false) :
            $this->db->trans_rollback();
            return array('status' => false, 'message' => 'Gagal menandai pasien perlakuan khusus');
        else :
            $this->db->trans_commit();
            return array('status' => true, 'message' => 'Berhasil menandai pasien perlakuan khusus');
        endif;
    }
   
}
