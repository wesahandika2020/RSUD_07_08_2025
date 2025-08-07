<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Account_model extends CI_Model {

    
    function __construct()
    {
        parent::__construct();
        $this->table = 'sm_translucent as tr';
    }
    

    function accountSimilarityCheck($account)
    {
        $query = $this->db->where('account', $account)->get($this->table)->row();
        $similar = false;
        if ($query) {
            $similar = true;
        }

        return $similar;
    }

    function updateDataAccount($data, $tipe)
    {
        if ($tipe == 'insert') :
            $this->db->insert($this->table, $data);
            return $this->db->insert_id();
        else :
            $this->db->where('id', $data['id'])->update($this->table, $data);
        endif;
    }

    private function sqlAccount($search)
    {
        $this->db->select("tr.id, tr.account, 
            tr.id_unit, tr.id_account_group, tr.is_active, p.nama,
            COALESCE(NULLIF(jb.nama, ''), '') as jabatan, 
            COALESCE(NULLIF(un.nama, ''), '') as unit, 
            ag.name as account_group");
        $this->db->from($this->table)
            ->join('sm_pegawai as p', 'p.id = tr.id')
            ->join('sm_account_group as ag', 'ag.id = tr.id_account_group')
            ->join('sm_unit as un', 'un.id = tr.id_unit', 'left')
            ->join('sm_jabatan as jb', 'jb.id = p.id_jabatan', 'left')
            ->where('tr.id is not null');
        if ($search['keyword'] !== '') :
            $this->db->like('LOWER(p.nama)', strtolower($search['keyword']));
            $this->db->or_like('LOWER(tr.account)', strtolower($search['keyword']));
            $this->db->or_like('LOWER(ag.name)', strtolower($search['keyword']));
            $this->db->or_like('LOWER(un.nama)', strtolower($search['keyword']));
        endif;
        // $this->db->order_by('tr.is_active', 'desc');
        return $this->db->order_by('tr.account', 'asc');
    }

    private function _listAccount($start, $limit, $search)
    {
        $this->sqlAccount($search);
        if ($limit !== 0) :
            $this->db->limit($limit, $start);
        endif;
        return $this->db->get()->result();
    }

    function getListDataAccount($start, $limit, $search)
    {
        $result['data'] = $this->_listAccount($start, $limit, $search);
        $result['jumlah'] = $this->sqlAccount($search)->get()->num_rows();
        $this->db->close();
        return $result;
    }

    function getDataAccountById($id)
    {
        $this->db->select("tr.id, tr.account, 
                        tr.id_unit, tr.id_account_group, tr.is_active, p.nama,
                        COALESCE(NULLIF(jb.nama, ''), '') as jabatan, 
                        COALESCE(NULLIF(un.nama, ''), '') as unit, 
                        ag.name as account_group");
        $this->db->from($this->table)
                ->join('sm_pegawai as p', 'p.id = tr.id')
                ->join('sm_account_group as ag', 'ag.id = tr.id_account_group')
                ->join('sm_unit as un', 'un.id = tr.id_unit', 'left')
                ->join('sm_jabatan as jb', 'jb.id = p.id_jabatan', 'left')
                ->where('tr.id', $id, true);
        return $this->db->get()->row();
    }

    function deleteAccount($id)
    {
        return $this->db->where('id', $id, true)->delete($this->table);
    }

    function resetKeyAccount($id)
    {
        $data = ['key' => convert_hash('12345')];
        return $this->db->where('id', $id, true)->update($this->table, $data);
    }

    function updateStatus($data)
	{
		if ($data['status'] == 1) {
			$this->db->where('id', $data['id'], true);
			$this->db->update($this->table, ['is_active' => 0]);
		} else if ($data['status'] == 0) {
			$this->db->where('id', $data['id'], true);
			$this->db->update($this->table, ['is_active' => 1]);
		}
		return $this->db->affected_rows();
	}
}

/* End of file Account_model.php */
