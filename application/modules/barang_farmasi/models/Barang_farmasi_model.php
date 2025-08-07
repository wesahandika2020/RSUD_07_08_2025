<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang_farmasi_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
        $this->datetime = date('Y-m-d H:i:s');    
    }
    
    function deleteDataKemasanBarang($id_kemasan)
    {
        return $this->db->where("id", $id_kemasan)->delete("sm_kemasan_barang");
    }

    private function sqlBarangFarmasi($param)
    {
        $this->db->select("b.*, 
                            (b.hpp+(b.hpp*(b.margin_resep/100))) as harga_jual,
                            COALESCE(p.nama,'') as pabrik, 
                            COALESCE(g.nama,'') as perundangan, 
                            kt.nama as kategori,
                            f.id as id_farmakoterapi, 
                            COALESCE(st.nama,'') as satuan, 
                            COALESCE(sd.nama,'') as sediaan, 
                            COALESCE(b.kekuatan, '') as kekuatan
        ");
        $this->db->from('sm_barang as b');
        $this->db->join('sm_kategori_barang as kt', 'kt.id = b.id_kategori');
        $this->db->join('sm_pabrik as p', 'p.id = b.id_pabrik', 'left');
        $this->db->join('sm_satuan as st', 'st.id = b.satuan_kekuatan', 'left');
        $this->db->join('sm_farmakoterapi as f', 'f.id = b.id_farmako_terapi', 'left');
        $this->db->join('sm_sediaan as sd', 'sd.id = b.id_sediaan', 'left');
        $this->db->join('sm_golongan as g', 'g.id = b.id_golongan', 'left');
        $this->db->where("b.id is not NULL");
        
        if ($param["id"] !== NULL) :
            $this->db->where("b.id", $param["id"]);
        endif;
        if ($param["jenis_kategori"] !== "") :
            $this->db->where("kt.jenis", $param["jenis_kategori"]);
        endif;
        if ($param["nama"] !== "") :
            $this->db->where("b.nama ilike ('%" . $param["nama"] . "%')");
        endif;
        if ($param["kategori_barang"] !== "") :
            $this->db->where("b.id_kategori", $param["kategori_barang"]);
        endif;
        if ($param["roa"] !== "") :
            $this->db->where("b.roa", $param["roa"]);
        endif;
        if ($param["formularium"] !== "") :
            $this->db->where("b.formularium", $param["formularium"]);
        endif;
        if ($param["fornas"] !== "") :
            $this->db->where("b.fornas", $param["fornas"]);
        endif;
        if ($param["generik"] !== "") :
            $this->db->where("b.generik", $param["generik"]);
        endif;
        if ($param["katastropik"] !== "") :
            $this->db->where("b.katastropik", $param["katastropik"]);
        endif;
        if ($param["ven"] !== "") :
            $this->db->where("b.ven", $param["ven"]);
        endif;
        if ($param["sediaan"] !== "") :
            $this->db->where("b.id_sediaan", $param["sediaan"]);
        endif;
        if ($param["asalperolehan"] !== "") :
            $this->db->where("b.status", $param["asalperolehan"]);
        endif;
        if ($param["statusaktif"] !== "") :
            $this->db->where("b.is_active", $param["statusaktif"]);
        endif;
        if ($param["pencarian"] !== "") :
            $this->db->where("b.nama ilike ('%" . $param["pencarian"] . "%')");
        endif;
        if ($param["obatkronis"] !== "") :
            $this->db->where("b.is_obat_kronis=" . $param["obatkronis"]);
        endif;


        // return $this->db->order_by('b.nama');
        return $this->db->order_by('b.id');
    }

    private function _listBarangFarmasi($limit, $start, $search)
    {
        $this->sqlBarangFarmasi($search);
        if ($limit !== 0) :
            $this->db->limit($limit, $start);
        endif;

        return $this->db->get()->result();
    }
    
    function getListDataBarangFarmasi($start, $limit, $search)
    {
        $result = $this->_listBarangFarmasi($limit, $start, $search);
        foreach ($result as $key => $value) :
            $sql_child = "select kb.isi, s.nama as kemasan, st.nama as satuan from sm_kemasan_barang kb
                        join sm_satuan s on (kb.id_kemasan = s.id)
                        join sm_satuan st on (kb.id_satuan = st.id)
                        where kb.id_barang = '" . $value->id . "'";
            $result[$key]->kemasan = $this->db->query($sql_child)->result();
        endforeach;
        $result['data'] = $result;
        $result['jumlah'] = $this->sqlBarangFarmasi($search)->get()->num_rows();
        return $result;

        $this->db->close();
    }
}
