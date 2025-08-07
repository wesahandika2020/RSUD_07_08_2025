<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Icd_ix_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
        $this->datetime = date('Y-m-d H:i:s');
        $this->idUser   = $this->session->userdata('id_translucent');
        $this->table = 'sm_icd_ix as icd_ix';
    }

    function listIcdIx($start, $limit, $search)
    {
        $param  = "";   
		if ($search['status'] == '1') {
            $param .=" AND icd_ix.is_aktif = 1 ";
        } else if ($search['status'] == '0') {
            $param .=" AND (icd_ix.is_aktif = 0 OR  icd_ix.is_aktif is null)";
        }

        if ($search['keyword'] !== '') {
            $param .=" AND (LOWER(icd_ix.nama) LIKE '%" . $search['keyword'] ."%' OR LOWER(icd_ix.icd9) LIKE '%" . $search['keyword'] ."%')";
        }    

        $sql    = " SELECT icd_ix.* FROM sm_icd_ix as icd_ix WHERE icd_ix.id is not null $param ";
        $order  =" ORDER BY icd_ix.icd9 ASC";

        $limitation ='';
        if ($limit !== 0) {
            $limitation = " LIMIT " . $limit . " OFFSET " . $start;
        }

        $result['data']     =  $this->db->query($sql.$order.$limitation)->result(); 
        $result['jumlah']   =  $this->db->query($sql.$order)->num_rows();
        return $result;
    }

    function updateStatus($data)
	{
        $before = json_encode($this->db->select('id,icd9,nama,is_aktif')->from('sm_icd_ix')->where('id', $data['id'])->get()->row());
		if ($data['status'] == 1) {
			$this->db->where('id', $data['id'], true);
			$this->db->update('sm_icd_ix', ['is_aktif' => 0]);
		} else if ($data['status'] == 0) {
			$this->db->where('id', $data['id'], true);
			$this->db->update('sm_icd_ix', ['is_aktif' => 1]);
		}
        $result = $this->db->affected_rows();

        $after = json_encode($this->db->select('id,icd9,nama,is_aktif')->from('sm_icd_ix')->where('id', $data['id'])->get()->row());

        // Insert ICD9 Log
        if($result){            
            $this->db->insert('sm_icd_ix_log', array('type' => 'Ubah Status', 'id_icd09' => $data['id'], 'before' => $before, 'after' => $after, 'waktu' => $this->datetime, 'id_user' => $this->idUser));
        }

		return $result;
	}
   
    function simpanIcd9($kode_icd9,$nama,$is_aktif)
    {
        $query = $this->db->query('SELECT ID FROM sm_icd_ix ORDER BY ID desc LIMIT 1');
        $result = $query->row();
        $nextId = $result->id + 1;
        
        $data = array(
            "id"        => $nextId,
            "icd9"      => $kode_icd9,
            "nama"      => $nama,       
            "is_aktif"  => $is_aktif        
        );                
        $this->db->insert('sm_icd_ix', $data);

        $query    = $this->db->query('SELECT ID FROM sm_icd_ix ORDER BY ID desc LIMIT 1');
        $id_icd09 = $query->row()->id;

        if($id_icd09 !== NULL){
            $dataLog = array(
                "type"          => 'Simpan',
                "id_icd09"      => $id_icd09,
                "before"        => json_encode($this->db->select('id,icd9,nama,is_aktif')->from('sm_icd_ix')->where('id', $id_icd09)->get()->row()),
                "waktu"         => $this->datetime,
                "id_user"       => $this->idUser                
            );    
            $this->db->insert('sm_icd_ix_log', $dataLog);
        }

        return $id_icd09;
    }

    function ubahIcd9($id,$kode_icd9,$nama,$is_aktif)
    {

        $data = array(
            "id"        => $id,
            "icd9"      => $kode_icd9,
            "nama"      => $nama,       
            "is_aktif"  => $is_aktif        
        );
        
        $dataLog = array(
            "type"          => 'Edit',
            "id_icd09"      => $id,
            "after"         => json_encode($data),
            "before"        => json_encode($this->db->select('id,icd9,nama,is_aktif')->from('sm_icd_ix')->where('id', $id)->get()->row()),
            "waktu"         => $this->datetime,
            "id_user"       => $this->idUser                
        );   

        $this->db->insert('sm_icd_ix_log', $dataLog);
        $result = $this->db->where("id", $id)->update("sm_icd_ix", $data);
        return $result;
    }


    function deleteIcd9($id)
    {   
        $dataLog = array(
            "type"          => 'Delete',
            "id_icd09"      => $id,
            "before"        => json_encode($this->db->select('id,icd9,nama,is_aktif')->from('sm_icd_ix')->where('id', $id)->get()->row()),
            "waktu"         => $this->datetime,
            "id_user"       => $this->idUser                
        );   

        $this->db->insert('sm_icd_ix_log', $dataLog);
        $result = $this->db->where('id', $id)->delete('sm_icd_ix'); 
        return $result;
    }
    
}
