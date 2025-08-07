<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Tarif_pelayanan_model extends CI_Model {

    
    function __construct()
    {
        parent::__construct();
        $this->table = 'sm_tarif_pelayanan as tp';    
    }

    private function sqlTarifPelayanan($search)
    {
        $query = $this->db->select("tp.*,
                        case when ly.nama is not null then concat_ws(', ', l.nama, concat_ws('', '<i><b>', ly.nama, '</b></i>'), tp.keterangan) else concat_ws(', ', l.nama, tp.keterangan) end as layanan,
                        coalesce(un.nama, '<i>Semua Instalasi</i>') as instalasi, 
                        coalesce(k.nama, '') as kelas")
                ->from($this->table)
                ->join('sm_layanan as l', 'l.id = tp.id_layanan')
                ->join('sm_layanan as ly', 'ly.id = l.id_parent', 'left')
                ->join('sm_unit as un', 'un.id = tp.id_unit', 'left')
                ->join('sm_kelas as k', 'k.id = tp.id_kelas', 'left')
                ->where('tp.id is not null');

        if ($search['nama'] !== '') :
            $this->db->like('LOWER(l.nama)', strtolower($search['nama']), 'after');
        endif;

        if ($search['id_layanan'] !== '') :
            $this->db->group_start();
            $this->db->where('l.id_parent', $search['id_layanan'], true);
            $this->db->or_where('tp.id_layanan', $search['id_layanan'], true);
            $this->db->group_end();
        endif;

        if ($search['id_jenis_pemeriksaan'] !== '') :
            $this->db->where('l.id_jenis_pemeriksaan', $search['id_jenis_pemeriksaan'], true);
            
        endif;

        if ($search['id_unit'] !== '') :
            $this->db->where('tp.id_unit', $search['id_unit'], true);
        endif;

        if ($search['kelas'] !== '') :
            $this->db->where('tp.id_kelas', $search['id_kelas'], true);
        endif;

        if ($search['jenis'] !== '') :
            $this->db->where('tp.jenis', $search['jenis'], true);
        endif;

        return $this->db->order_by('tp.is_active desc')->order_by('l.nama asc');
    }

    private function _listTarifPelayanan($limit = 0, $start = 0, $search)
    {
        $this->sqlTarifPelayanan($search);
        if ($limit !== 0) :
            $this->db->limit($limit, $start);
        endif;

        return $this->db->get()->result();
        // $this->db->get(); echo $this->db->last_query(); exit();
    }

    function getListDataTarifPelayanan($limit, $start, $search)
    {
        $result['data'] = $this->_listTarifPelayanan($limit, $start, $search);
        $result['jumlah'] = $this->sqlTarifPelayanan($search)->get()->num_rows();
        $this->db->close();
        return $result;

    }

    function getDataTarifPelayananById($id)
    {
        $this->db->select("tp.*,
                        case when ly.nama is not null then concat_ws(', ', l.nama, concat_ws('', '<i><b>', ly.nama, '</b></i>'), tp.keterangan) else concat_ws(', ', l.nama, tp.keterangan) end as layanan,
                        jp.nama as jenis_pemeriksaan,
                        coalesce(un.nama, '<i>Semua Instalasi</i>') as instalasi, 
                        coalesce(k.nama, '') as kelas")
                ->from($this->table)
                ->join('sm_layanan as l', 'l.id = tp.id_layanan')
                ->join('sm_layanan as ly', 'ly.id = l.id_parent', 'left')
                ->join('sm_unit as un', 'un.id = tp.id_unit', 'left')
                ->join('sm_kelas as k', 'k.id = tp.id_kelas', 'left')
                ->join('sm_jenis_pemeriksaan as jp', 'l.id_jenis_pemeriksaan = jp.id', 'left')
                ->where('tp.id', $id);
        return $this->db->get()->row();
        // echo $this->db->last_query(); die;
    }

    function simpanDataTarifPelayanan($data)
    {
        $before = null;
        $this->db->insert($this->table, $data);
        $id = $this->db->insert_id();
        $action = 'Insert';

        $after = $this->db->where('id', $id)->get('sm_tarif_pelayanan')->row();
        $this->load->model('logs/Logs_model', 'logs');
        $this->logs->recordMasterdataLogs('1', $id, $this->session->userdata('id_translucent'), $action, json_encode($after), json_encode($before));
        return $id;
    }

    function updateDataTarifPelayanan($data, $id)
    {
        $action = "Update";
        $before = $this->db->where('id', $id)->get('sm_tarif_pelayanan')->row();
        $this->db->where('id', $id, true)->update($this->table, $data);
        $after = $this->db->where('id', $id)->get('sm_tarif_pelayanan')->row();
        $this->load->model('logs/Logs_model', 'logs');
        $this->logs->recordMasterdataLogs('1', $id, $this->session->userdata('id_translucent'), $action, json_encode($after), json_encode($before));
        return $id;
    }

    function deleteDataTarifPelayanan($id)
    {
        $data = $this->db->where('id', $id)->get('sm_tarif_pelayanan')->row();
        $query = $this->db->where('id', $id)->delete($this->table);
        $this->load->model('logs/Logs_model', 'logs');
        $this->logs->recordMasterdataLogs('1', $id, $this->session->userdata('id_translucent'), 'Delete', json_encode($data));
    }
}

/* End of file Tarif_pelayanan_model.php */
