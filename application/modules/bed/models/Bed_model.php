<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bed_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->table = 'sm_bed as b';
    }

    function getListDataBed($start, $limit, $search)
    {
        $this->db->select('b.*, bg.id as id_bangsal, bg.nama, bg.kode, k.id as id_kelas, k.nama as kelas, ru.no_ruang');
        $this->db->from($this->table);
        $this->db->join('sm_ruang as ru', 'ru.id = b.id_ruang');
        $this->db->join('sm_bangsal as bg', 'bg.id = ru.id_bangsal');
        $this->db->join('sm_kelas as k', 'k.id = ru.id_kelas');
        $this->db->order_by('b.is_active', 'desc');
        $this->db->order_by('bg.nama, k.nama, ru.no_ruang, b.no_bed', 'asc');
        if ($limit !== 0) :
            $this->db->limit($limit, $start);
        endif;
        
        if ($search['keyword'] !== '') :
            $this->db->like('LOWER(bg.nama)', strtolower($search['keyword']));
            $this->db->or_like('LOWER(bg.kode)', strtolower($search['keyword']));
            $this->db->or_like('LOWER(k.nama)', strtolower($search['keyword']));
        endif;

        // $this->db->get(); echo $this->db->last_query(); die;

        $result['data'] = $this->db->get()->result();
        $result['jumlah'] = $this->db->count_all_results($this->table);
        return $result;
    }

    function updateDataBed($data, $jumlah_bed)
    {
        $action = "Update";
        $before = NULL;
        $after = NULL;
        if (!$this->input->post('id')) :
            $action = "Insert";
            $jml = $this->cekNoBed($data["id_ruang"]);
            if ($jumlah_bed !== "") {
                $arr_id = array();
                for ($i = $jml + 1; $i <= $jml + $jumlah_bed; $i++) {
                    $data["no_bed"] = $i;
                    $data["keterangan"] = "Tersedia";
                    $this->db->insert("sm_bed", $data);
                    array_push($arr_id, $this->db->insert_id());
                }
                $after = $this->db->query("select * from sm_bed where id in (" . join($arr_id, ", ") . ")")->result();
            }
            $id = NULL;
        else :
            $id = $this->input->post('id');
            $before = $this->db->where("id", $id)->get("sm_bed")->row();
            $this->db->where("id", $id)->update("sm_bed", $data);
            $after = $this->db->where("id", $id)->get("sm_bed")->row();
        endif;
        return $id;
    }

    private function sqlDataSummaryBed()
    {
        $this->db->select("bg.id as koderuang, bg.nama as namaruang, kls.nama kelas, kkb.nama as namakelas, kkb.kode as kodekelas,
            SUM(CASE WHEN bed.is_active = '1' THEN 1 ELSE 0 END) AS kapasitas,
            SUM(CASE WHEN bed.keterangan = 'Tersedia' AND bed.is_active = '1' THEN 1 ELSE 0 END) AS tersedia,
            SUM(CASE WHEN bed.penghuni = 'L' AND bed.keterangan = 'Tersedia' AND bed.is_active = '1' THEN 1 ELSE 0 END) AS tersediapria,
            SUM(CASE WHEN bed.penghuni = 'P' AND bed.keterangan = 'Tersedia' AND bed.is_active = '1' THEN 1 ELSE 0 END) AS tersediawanita,
            SUM(CASE WHEN bed.penghuni IS NULL AND bed.keterangan = 'Tersedia' AND bed.is_active = '1' THEN 1 ELSE 0 END) AS tersediapriawanita, kbed.update_terakhir,
            CASE WHEN kbed.id IS NULL THEN 'create' ELSE 'update' END AS status");
        $this->db->from('sm_ruang ru');
        $this->db->join('sm_bangsal bg', 'ru.id_bangsal = bg.id');
        $this->db->join('sm_kelas kls', 'ru.id_kelas = kls.id');
        $this->db->join('sm_bed bed', 'ru.id = bed.id_ruang');
        $this->db->join('sm_kode_kelas_bed kkb', 'ru.id_kode_kelas = kkb.id');
        $this->db->join('sm_ketersediaan_bed kbed', 'bg.id = kbed.koderuang AND kkb.kode = kbed.kodekelas', 'left');
        $this->db->group_by('bg.id, bg.nama, kls.nama, kkb.nama, kkb.kode, kbed.id');
        $this->db->order_by('bg.nama, kls.nama');
        
        return $this->db->order_by('bg.nama', 'asc');
    }

    private function _listDataSummaryBed($limit, $start)
    {
        $this->sqlDataSummaryBed();
        if ($limit !== 0) :
            $this->db->limit($limit, $start);
        endif;

        return $this->db->get()->result();
    }

    function getDataSummaryBed($limit, $start)
    {
        $result['data'] = $this->_listDataSummaryBed($limit, $start);
        $result['jumlah_sum'] = $this->sqlDataSummaryBed()->get()->num_rows();
        
        $this->db->close();
        return $result;
    }

    function getDataBedById($id)
    {
        $this->db->select("b.*, bg.nama, bg.kode, ru.id_bangsal, k.id as id_kelas, k.nama as kelas, ru.no_ruang, ru.id as id_ruang, concat_ws(' ', bg.nama, k.nama, ru.no_ruang) as ruangan");
        $this->db->from($this->table);
        $this->db->join('sm_ruang as ru', 'ru.id = b.id_ruang');
        $this->db->join('sm_bangsal as bg', 'bg.id = ru.id_bangsal');
        $this->db->join('sm_kelas as k', 'k.id = ru.id_kelas');
        $this->db->where('b.id', $id, true);
        return $this->db->get()->row();
    }

    function deleteDataBed($id)
    {
        $this->db->where('id', $id, true);
        return $this->db->delete($this->table);
    }

    function getNoBed($id_ruang)
    {
        $sql = "select (max(no_bed) + 1) as no
                from sm_bed
                where id_ruang = '" . $id_ruang . "' ";
        $no = $this->db->query($sql)->row()->no;
        if ($no === NULL) :
            $no = 1;
        endif;
        return $no;
    }

    function cekNoBed($id_ruang)
    {
        $sql = "select count(*) as jumlah
                from sm_bed 
                where id_ruang = '" . $id_ruang . "' ";
        $num = $this->db->query($sql)->row()->jumlah;
        return (int) $num;
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

