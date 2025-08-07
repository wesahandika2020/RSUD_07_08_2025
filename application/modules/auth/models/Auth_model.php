<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_model extends CI_Model {

    function checkWrongLogin($stat, $ip)
    {
        return $this->db->get_where('sm_translucent_log', ['stat' => $stat, 'ip' => $ip]);
    }

    function getVerifiedDataLogin($account)
    {
        $this->db->select("tr.*, ag.name as account_group, p.nama, p.nik, p.alamat, p.nip, p.kelamin, 
                            coalesce(un.nama, '') as unit, 
                            coalesce(pn.nama, '') as profesi_nadis, pn.id as id_profesi_nadis,
                            tm.id_spesialisasi as id_spesialis,
                            sp.id as poli,
                            p.id as id_pegawai, tm.id id_tenaga_medis,
                            j.nama as jabatan,
                            CONCAT_WS('.', p.profil, p.type) as avatar");
        $this->db->from('sm_translucent as tr');
        $this->db->join('sm_account_group as ag', 'tr.id_account_group = ag.id');
        $this->db->join('sm_pegawai as p', 'tr.id = p.id');
        $this->db->join('sm_jabatan as j', 'j.id = p.id_jabatan');
        $this->db->join('sm_tenaga_medis as tm', 'tm.id_pegawai = p.id', 'left');
        $this->db->join('sm_unit as un', 'un.id = tr.id_unit', 'left');
        $this->db->join('sm_spesialisasi as sp', 'sp.id_unit = tr.id_unit', 'left');
        $this->db->join('sm_profesi_nadis as pn', 'pn.id = tm.id_profesi', 'left');
        $this->db->where('tr.account', $account);
        $this->db->where('p.status', '1');
        return $this->db->get();
    }

    function insertWrongLoginAction($data)
    {
        return $this->db->insert('sm_translucent_log', $data);
    }

    function updateLogsTrueLogin($ip, $useragent)
    {
        $this->db->set('stat', 9);
        return $this->db->where(['token' => '', 'ip' => $ip, 'user_agent' => $useragent])->update('sm_translucent_log');
    }

    function insertLogLogin($data)
    {
        return $this->db->insert('sm_translucent_log', $data);
    }

    function getDataLogin($id_translucent)
    {
        $this->db->select("tr.*, ag.name as account_group, p.nama, p.alamat, p.nip, p.kelamin,
                            coalesce(un.nama, '') as unit, 
                            coalesce(pn.nama, '') as profesi_nadis, 
                            tm.id_spesialisasi as id_spesialis, CONCAT_WS('.', p.profil, p.type) as avatar");
        $this->db->from('sm_translucent as tr');
        $this->db->join('sm_account_group as ag', 'tr.id_account_group = ag.id');
        $this->db->join('sm_pegawai as p', 'tr.id = p.id');
        $this->db->join('sm_tenaga_medis as tm', 'tm.id_pegawai = p.id', 'left');
        $this->db->join('sm_unit as un', 'un.id = tr.id_unit', 'left');
        $this->db->join('sm_profesi_nadis as pn', 'pn.id = tm.id_profesi', 'left');
        $this->db->where('tr.id', $id_translucent);
        return $this->db->get();
    }

    function checkMyAccount($id_translucent)
    {
        $sql = "select tr.*
            from sm_translucent tr
            where tr.id = '$id_translucent'";
        return $this->db->query($sql);
    }

    function getListDataLogFail($ip, $stat)
    {
        $this->db->select('id, ip, tgl_action, account');
        $this->db->from('sm_translucent_log');
        $this->db->where('ip', $ip, true);
        $this->db->where('stat', $stat, true);
        $this->db->limit(5);
        $data = $this->db->get()->result();
        $this->db->close();
        return $data;
    }

    function deleteDataAllLogFail($id)
    {
        $response = [];
        if (is_array($id)) :
            $this->db->trans_begin();
            foreach ($id as $i => $value) :
                if ($value !== "") :
                    $this->db->where('id', $value, true)->delete('sm_translucent_log');
                endif;
            endforeach;
            if ($this->db->trans_status() === false) :
                $this->db->trans_rollback();
                $response = [
                    'status' => false,
                    'message' => 'Gagal menghapus data',
                ]; 
            else :
                $this->db->trans_commit();
                $response = [
                    'status' => true,
                    'message' => 'Berasil menghapus data',
                ]; 
            endif;
        endif;
        return $response;
    }
}
