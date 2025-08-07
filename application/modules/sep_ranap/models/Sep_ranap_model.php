<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Sep_ranap_model extends CI_Model {

    
    function __construct()
    {
        parent::__construct();

    }

    private function sqlSepRanap($search)
    {
        $this->db->select("lp.*, pd.tanggal_daftar, pd.id_pasien, pd.no_register, CONCAT_WS(' ', p.nama, COALESCE(p.status_pasien, '')) as nama, sp.nama as klinik, sp.kode_bpjs, coalesce(pj.nama, '') as penjamin, tr.account as username,", false);

        $this->db->from('sm_layanan_pendaftaran as lp')
            ->join('sm_pendaftaran as pd', 'pd.id = lp.id_pendaftaran')
            ->join('sm_pasien as p', 'p.id = pd.id_pasien')
            ->join('sm_spesialisasi as sp', 'sp.id = lp.id_unit_layanan')
            ->join('sm_translucent as tr', 'tr.id = lp.id_users_sep', 'left')
            ->join('sm_penjamin as pj', 'pj.id = lp.id_penjamin', 'left')
            ->where('lp.id is not null')
            ->where('lp.id_penjamin', 1)
            ->where('lp.jenis_layanan', 'Rawat Inap');

        // var_dump($search['tanggal_awal']); die;
        if (($search['tanggal_awal'] !== '') & ($search['tanggal_akhir'] !== '')) :
            $this->db->where("pd.tanggal_daftar BETWEEN '" . date2mysql($search['tanggal_awal']) . " 00:00:00' AND '" . date2mysql($search['tanggal_akhir']) . " 23:59:59'");
        endif;

        if ($search['no_register'] !== '') :
            $this->db->where('pd.no_register', $search['no_register'], true);
        endif;

        if ($search['no_rm'] !== '') :
            $this->db->like('p.id', $search['no_rm'], 'before', true);
        endif;

        if ($search['nama'] !== '') :
            $this->db->where("p.nama ilike '%" . strtolower($search['nama']) . "%'");
        endif;

        if ($search['no_sep'] !== '') :
            $this->db->where('lp.no_sep', $search['no_sep'], true);
        endif;

        if ($search['layanan'] !== '') :
            $this->db->where('lp.id_unit_layanan', $search['layanan']);
        endif;

        return $this->db->order_by('lp.id', 'desc');

    }

    private function _listSepRanap($limit, $start, $search)
    {
        $this->sqlSepRanap($search);
        if ($limit !== 0) :
            $this->db->limit($limit, $start);
        endif;

        return $this->db->get()->result();
    }

    function getListDataSepRanap($limit, $start, $search)
    {
        $result['data'] = $this->_listSepRanap($limit, $start, $search);
        $result['jumlah'] = $this->sqlSepRanap($search)->get()->num_rows();
        return $result;

        $this->db->close();
    }
    
	public function getSuratPersetujuanRawatInap($id_layanan_pendaftaran)
	{
		return $this->db->from('sm_form_persetujuan_rawat_inap')->where('id_layanan_pendaftaran', $id_layanan_pendaftaran)->get()->result();
	}
	
	public function getDataSepAsal($id_pendaftaran)
	{
		return $this->db->from('sm_asal_sep')->where('id_pendaftaran', $id_pendaftaran)->get()->result();
	}

	function ubahDataSep($id_pendaftaran, $id_user)
    {
		$this->db->query("insert into sm_asal_sep_logs (id_lama, id_pendaftaran,is_rajal,is_ranap,id_user,created_date,id_user_logs,created_date_logs)
							select id, id_pendaftaran,is_rajal,is_ranap,id_user,created_date,'". $id_user ."', NOW()
							from sm_asal_sep where id_pendaftaran='". $id_pendaftaran ."'");                
    }

    function ubahNoSepRanap($id_pendaftaran,$id_layanan_pendaftaran, $nosep)
    {
        // var_dump($id_pendaftaran.'=='.$nosep);
        $data = array('no_sep' => $nosep);
		$this->db->where("id", $id_pendaftaran, true)->update("sm_pendaftaran", $data);  
        $this->db->where("id", $id_layanan_pendaftaran, true)->update("sm_layanan_pendaftaran", $data);    
    }

}

/* End of file Sep_poli_model.php */
