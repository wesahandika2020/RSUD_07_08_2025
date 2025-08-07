<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mapping_dpho_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->table = 'sm_barang as b';
    }

    function getListDataObatKronis($start, $limit, $search)
    {
        $param = "";
        if ($search['pencarian_dpho'] !== '') :
            $param .= " and nama_obat ilike ('%" . $search['pencarian_dpho'] . "%') ";
        endif;

        $limit = " limit " . $limit . " offset " . $start;
        $sql   = "select dpho.*, (SELECT COUNT(*) AS total FROM sm_barang WHERE kode_apotek = dpho.kode_obat) total_mapping 
                  from sm_referensi_dpho as dpho
                  where dpho.id is not null " . $param . "order by dpho.nama_obat ";

        $result['data'] = $this->db->query($sql . $limit)->result();
        $result['jumlah'] = $this->db->query($sql)->num_rows();

        return $result;
    }

    function getListReferensiDPHO($start, $limit, $search)
    {
        $param = "";
        if ($search['keyword_obat'] !== '') {
            $keywords = explode(' ', $search['keyword_obat']);
            foreach ($keywords as $keyword) {
                $param .= " and nama ilike ('%" . $keyword . "%') ";
            }
        }

        $limit = " limit " . $limit . " offset " . $start;
        $sql   = "select * from sm_barang
                  where id is not null " . $param . " 
                  order by nama ASC ";

        $result['data'] = $this->db->query($sql . $limit)->result();
        $result['jumlah'] = $this->db->query($sql)->num_rows();

        return $result;
    }

    function updateMappingBarang($data)
    {
        $id_barang = $data['id_barang'];
        $kode_apotek = $data['kode_apotek'];
        $id_dpho = $data['id_dpho'];

        // Update kode_apotek di tabel sm_barang
        $this->db->where('id', $id_barang)->update('sm_barang', [
            'kode_apotek' => $kode_apotek
        ]);

        // Update id_barang di tabel sm_referensi_dpho
        $this->db->where('id', $id_dpho)->update('sm_referensi_dpho', [
            'id_barang' => $id_barang
        ]);

        return $this->db->affected_rows(); // jumlah total baris yang terpengaruh dari kedua query
    }

    function deleteMappingBarang($data)
    {
        $id_barang = $data['id_barang'];
        $id_dpho = $data['id_dpho'];

        $this->db->trans_start();

        // Set kode_apotek pada sm_barang menjadi null
        $this->db->where('id', $id_barang)
            ->update('sm_barang', ['kode_apotek' => null]);
        $affected_barang = $this->db->affected_rows();

        // Cek dan update sm_referensi_dpho hanya jika ada yang cocok
        $this->db->from('sm_referensi_dpho')
            ->where('id_barang', $id_barang);
        if ($this->db->count_all_results() > 0) {
            $this->db->where('id_barang', $id_barang)
                ->update('sm_referensi_dpho', ['id_barang' => null]);
        }
        $affected_dpho = $this->db->affected_rows();

        $this->db->trans_complete();

        if ($this->db->trans_status() === false) {
            return false; // terjadi error dalam transaksi
        }

        return ($affected_barang + $affected_dpho) > 0;
    }
}
