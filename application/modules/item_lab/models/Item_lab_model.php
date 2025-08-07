<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Item_lab_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
        
    }
    
    function get_operator()
    {
        return array("-" => "-", ">" => ">", "<" => "<", ">=" => ">=", "<=" => "<=", "Positif" => "Positif", "Negatif" => "Negatif");
    }
    
    function get_kelamin_kategori()
    {
        return array("" => "Semua", "L" => "Laki-laki", "P" => "Perempuan", "A" => "Anak - Anak");
    }

    function getListDataItemLaboratorium($start, $limit, $search) 
    {
        $where = '';
        $limit = " limit " . $limit . " offset " . $start;
        if ($search['keyword'] !== '') :
            $where .= " and l.nama ilike '%" . $search['keyword'] . "%' ";
        endif;

        $sql = "select DISTINCT ON (l.id) l.*, 
                concat_ws(', ', l.nama, ll.nama) as layanan, 
                (null) as item
                from sm_layanan as l
                left join sm_layanan as ll on (ll.id = l.id_parent) 
                join sm_tarif_pelayanan as tp on (tp.id_layanan = l.id) 
                join sm_jenis_pemeriksaan as jp on (jp.id = l.id_jenis_pemeriksaan) 
                where jp.nama = 'Pelayanan Laboratorium' ";
        $order = " order by l.id, l.nama ";
        $query = $this->db->query($sql . $where . $order . $limit);
        $data = $query->result();
        foreach ($data as $key => $value) :
            $sql_item = "select il.*, 
                        COALESCE(st.nama, '') as satuan,
                        COALESCE(il.kode_lis, '') as kode_lis 
                        from sm_item_laboratorium as il 
                        left join sm_satuan as st on (st.id = il.id_satuan) 
                        where il.id_layanan = '" . $value->id . "' ";
            $value->item = $this->db->query($sql_item)->result();
        endforeach;

        $result['data'] = $data;
        $result['jumlah'] = $this->db->query($sql . $where)->num_rows();
        return $result;
    }
    
    function update_data_item_laboratorium($add)
    {
        $this->db->trans_begin();
        $status = true;
        if (is_array($add['item'])) {
            foreach ($add['item'] as $key => $value) {
                $ins = array(
                    'id_layanan' => $add['id_layanan'],
                    'item' => "$value"
                );
                $this->db->insert('sm_item_laboratorium', $ins);
            }
        }
        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            $status = false;
        } else {
            $this->db->trans_commit();
            $status = true;
        }
        return $status;
    }
    
    function get_nilai_normal($id_item_laboratorium)
    {
        $data = $this->db->where('id_item_laboratorium', $id_item_laboratorium)->get('sm_nilai_normal_lab')->result();
        if (sizeof($data) < 1) {
            $data = NULL;
        }
        return $data;
    }
    
    function get_item_laboratorium($id)
    {
        $sql_item = "select il.* , COALESCE(st.nama, '') as satuan
                    from sm_item_laboratorium il
                    left join sm_satuan st on (st.id = il.id_satuan)
                    where il.id = '" . $id . "' ";
        return $this->db->query($sql_item)->row();
    }
    
    function update_nilai_normal_laboratorium($data, $id_satuan)
    {
        $cek = $this->db->where('id_item_laboratorium', $data['id_item_laboratorium'])->get('sm_nilai_normal_lab')->num_rows();
        if (is_array($data['kategori'])) {
            if ((int) $cek + sizeof($data['kategori']) <= 3) {
                foreach ($data['kategori'] as $key => $value) {
                    $nilai_normal = array('id_item_laboratorium' => $data['id_item_laboratorium'], 'kategori' => $data['kategori'][$key] !== '' ? $data['kategori'][$key] : NULL, 'operator' => $data['operator'][$key]);
                    if ($nilai_normal['operator'] === 'Positif' | $nilai_normal['operator'] === 'Negatif') {
                        $nilai_normal['awal'] = $data['awal'][$key] !== '' ? $data['awal'][$key] : NULL;
                        $nilai_normal['akhir'] = $data['akhir'][$key] !== '' ? $data['akhir'][$key] : NULL;
                    } else {
                        $nilai_normal['awal'] = $data['awal'][$key] !== '' ? $data['awal'][$key] : 0;
                        $nilai_normal['akhir'] = $data['akhir'][$key] !== '' ? $data['akhir'][$key] : 0;
                    }
                    $this->db->insert('sm_nilai_normal_lab', $nilai_normal);
                }
                $status = true;
            } else {
                $status = false;
            }
        } else {
            $status = false;
        }
        $this->db->where('id', $data['id_item_laboratorium'])->update('sm_item_laboratorium', $id_satuan);
        $this->reset_nilai_normal($data['id_item_laboratorium']);
        return $status;
    }
    
    function reset_nilai_normal($id_item_laboratorium)
    {
        $query = $this->db->where('id_item_laboratorium', $id_item_laboratorium)->get('sm_nilai_normal_lab')->result();
        $str = '';
        $kategori = '';
        foreach ($query as $key => $value) {
            if ($value->kategori === 'L') {
                $kategori = 'Laki-laki : ';
            } else {
                if ($value->kategori === 'P') {
                    $kategori = 'Perempuan : ';
                } else {
                    if ($value->kategori === 'A') {
                        $kategori = 'Anak-anak : ';
                    } else {
                        $kategori = '';
                    }
                }
            }
            $str .= $kategori . $value->awal . ' ' . $value->operator . ' ' . $value->akhir . '<br/>';
        }
        $this->db->where('id_item_laboratorium', $id_item_laboratorium)->update('sm_nilai_normal_lab', array('nilai_normal' => $str));
    }

    function delete_data_nilai_normal_laboratorium($id)
    {
        $nilai_normal = $this->db->where("id", $id)->get("sm_nilai_normal_lab")->row();
        $this->db->where("id", $id)->delete("sm_nilai_normal_lab");
        $this->reset_nilai_normal($nilai_normal->id_item_laboratorium);
    }

}