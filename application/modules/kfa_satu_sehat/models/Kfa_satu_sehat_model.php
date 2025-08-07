<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kfa_satu_sehat_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->table = 'sm_barang as b';
    }

    function getListDataKFA($start, $limit, $search)
    {
        $param = "";
        if ($search['pencarian_kfa'] !== '') :
            $param .= " and nama_lengkap ilike ('%" . $search['pencarian_kfa'] . "%') ";
        endif;

        $limit = " limit " . $limit . " offset " . $start;
        $sql   = "select * from sm_barang
                  where id is not null 
                  and id_kategori = '1' " . $param . "order by nama_lengkap ";

        $result['data'] = $this->db->query($sql . $limit)->result();
        $result['jumlah'] = $this->db->query($sql)->num_rows();

        return $result;
    }

    function getListDataSatuSehat($start, $limit, $search)
    {
        $param = "";
        if ($search['keyword_obat'] !== '') {
            $keywords = explode(' ', $search['keyword_obat']);
            foreach ($keywords as $keyword) {
                $param .= " and nama ilike ('%" . $keyword . "%') ";
            }
        }

        $limit = " limit " . $limit . " offset " . $start;
        $sql   = "select distinct on (code_kfa) * from sm_kfa_satu_sehat
                  where code_kfa is not null " . $param . " 
                  order by code_kfa, no_urut, id ";

        $result['data'] = $this->db->query($sql . $limit)->result();
        $result['jumlah'] = $this->db->query($sql)->num_rows();

        return $result;
    }

    function updateCodeBarang($data)
    {
        $this->db->where('id', $data['id_barang'], true);
        $this->db->update('sm_barang', ['code' => $data['code_kfa']]);

        return $this->db->affected_rows();
    }
}
