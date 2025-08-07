<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Golongan_sebab_sakit_model extends CI_Model {

    
    function __construct()
    {
        parent::__construct();
        $this->table = 'sm_golongan_sebab_sakit as gss';   
        $this->datetime = date('Y-m-d H:i:s');
        $this->idUser   = $this->session->userdata('id_translucent'); 
    }

    function getListDataGolonganSebabSakit($start, $limit, $search)
    {
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->where('id IS NOT NULL');
        $this->db->order_by('kode_icdx_rinci', 'asc');
        $this->db->limit($limit, $start);

        if ($search['keyword'] !== '') :
            $this->db->like('LOWER(nama)', strtolower($search['keyword']));
            $this->db->or_like('LOWER(no_dtd)', strtolower($search['keyword']));
            $this->db->or_like('LOWER(kode_icdx)', strtolower($search['keyword']));
            $this->db->or_like('LOWER(kode_icdx_rinci)', strtolower($search['keyword']));
            $this->db->or_like('LOWER(menular)', strtolower($search['keyword']));
        endif;

        $result['data'] = $this->db->get()->result();
        $result['jumlah'] = $this->db->count_all_results($this->table);
        return $result;
    }

    function getDataGolonganSebabSakitById($id)
    {
        return $this->db->get_where($this->table, ['id' => $id])->row();
    }

    function simpanDataGolonganSebabSakit($data)
    {
        return $this->db->insert($this->table, $data);
    }

    function updateDataGolonganSebabSakit($data, $id)
    {
        $this->db->where('id', $id, true)->update($this->table, $data);
        return convert_hash($id);
    }

    function deleteDataGolonganSebabSakit($id)
    {
        $this->db->where('id', $id, true);
        return $this->db->delete($this->table);
    }
	
	function updateStatus($data)
	{
        $before = json_encode($this->db->select('id,kode_icdx,nama,is_aktif')->from('sm_golongan_sebab_sakit')->where('id', $data['id'])->get()->row());
		if ($data['status'] == 1) {
			$this->db->where('id', $data['id'], true);
			$this->db->update('sm_golongan_sebab_sakit', ['is_aktif' => 0]);
		} else if ($data['status'] == 0) {
			$this->db->where('id', $data['id'], true);
			$this->db->update('sm_golongan_sebab_sakit', ['is_aktif' => 1]);
		}
        $result = $this->db->affected_rows();
		
        $after = json_encode($this->db->select('id,kode_icdx,nama,is_aktif')->from('sm_golongan_sebab_sakit')->where('id', $data['id'])->get()->row());

        if($result){            
            $this->db->insert('sm_golongan_sebab_sakit_log', array('type' => 'Ubah Status', 'id_icd10' => $data['id'], 'before' => $before, 'after' => $after, 'waktu' => $this->datetime, 'id_user' => $this->idUser));
        }
		
		return $result;
	}

}

/* End of file Golongan_sebab_sakit.php */
