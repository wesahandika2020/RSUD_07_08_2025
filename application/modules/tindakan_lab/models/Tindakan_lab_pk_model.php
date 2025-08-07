<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tindakan_lab_pk_model extends CI_Model {

    
    function __construct()
    {
        parent::__construct();
        $this->table        = 'sm_layanan as l';
        $this->tableLabPK   = 'sm_layanan_tindakan_lab ';
        $this->tableNilaiPK = 'sm_nilai_lab ';
    }
    
    private function getChild($params)
    {
        $sql = "select *, 
                (null) as child, 
                COALESCE(NULLIF(icd_ix, ''), '') as icd_ix, 
                '' as jenis_pemeriksaan, 
                replace(kode, '.', '') as coding 
                from " . $this->table . " 
                where id_parent='" . $params . "' 
                order by cast(kode as varchar)";
        return $this->db->query($sql)->result();
    }


    function getListDataTindLabPK($limit=null, $start=null)
    {
        $q = '';

        if ($limit != null) :
            $limit = " limit " . $limit . " offset " . $start;
        else :
            $limit = '';
        endif;
           
         $sql_jenis_pemeriksaan = "select l.*, 
                                (null) as child, 
                                COALESCE(NULLIF(l.icd_ix, ''), '') as icd_ix, 
                                COALESCE(NULLIF(jp.nama, ''), '') as jenis_pemeriksaan 
                                from sm_layanan as l 
                                inner join sm_layanan_tindakan_lab lt ON lt.id_layanan=l.id
                                join sm_jenis_pemeriksaan jp on (jp.id = l.id_jenis_pemeriksaan) 
                                where l.id_parent is null 
                                and l.id_jenis_pemeriksaan = 9 and lt.id_spesialisasi=38
                                order by cast(kode as numeric)";
        $root = $this->db->query($sql_jenis_pemeriksaan . $limit)->result();
        
        foreach ($root as $key => $val) :

            $sql_root = "select *, 
                        (null) as child, 
                        COALESCE(NULLIF(icd_ix, ''), '') as icd_ix, 
                        '' as jenis_pemeriksaan, 
                        replace(kode, '.', '') as coding 
                        from sm_layanan as l  
                        where id_parent='" . $val->id . "'
                        order by cast(kode as varchar)";
            $child0 = $this->db->query($sql_root)->result();

            if (count($child0) > 0) :
                $root[$key]->child = $child0;
                foreach ($child0 as $key1 => $val1) :
                    $child = $this->getChild($val1->id);

                    if (count($child) > 0) :
                        $root[$key]->child[$key1]->child = $child;
                        foreach ($child as $key2 => $val2) :
                            $child2 = $this->getChild($val2->id);

                            if (count($child2) > 0) :
                                $root[$key]->child[$key1]->child[$key2]->child = $child2; 
                                foreach ($child2 as $key3 => $val3) :
                                    $child3 = $this->getChild($val3->id);

                                    if (count($child3) > 0) :
                                        $root[$key]->child[$key1]->child[$key2]->child[$key3]->child = $child3; 
                                    endif;

                                endforeach;
                            endif;

                        endforeach;
                    endif;

                endforeach;
            endif;
        endforeach;

        // echo json_encode($root); die;
        $result['data'] = $root;
        $result['jumlah'] = $this->db->query($sql_jenis_pemeriksaan)->num_rows();
        return $result;
    }

    function getListDataTindLabPKSearch($limit, $start, $search)
    {
        $q = '';

        if ($search['nama'] !== '') {
            $q .= " and l.nama ilike '%" . $search['nama'] . "%' ";
        }

        if ($search['jenis_pemeriksaan'] !== '') {
            $q .= " and jp.id = '" . $search['jenis_pemeriksaan'] . "' ";
        }

        $limit = " limit " . $limit . " offset " . $start;

        $select = "select l.*, 
                    NULLIF(ll.nama, '') as parent, 
                    jp.nama as jenis_pemeriksaan ";
        $count = "select count(*) as count ";
        $sql = "from " . $this->table . "
                left join sm_layanan ll on (ll.id = l.id_parent) 
                join sm_jenis_pemeriksaan jp on (jp.id = l.id_jenis_pemeriksaan)
                where l.id is not null $q";
        $order = " order by l.kode ";
        $query = $this->db->query($select . $sql . $order . $limit);
        $result['data'] = $query->result();
        $result['jumlah'] = $this->db->query($count . $sql . $q)->row()->count;
        return $result;
    }

    function simpanDataTindLabPK($data)
    {
        return $this->db->insert($this->tableLabPK, $data);    
    }

    function updateDataTindLabPK($data)
    {
        // update
        $id = $data['id'];
        return $this->db->where('id', $id, true)->update($this->tableLabPK, $data);
    }

    function getDataTindLabPKById($id)
    {
        $this->db->select("l.*, NULLIF(jp.nama, '') as jenis_pemeriksaan, NULLIF(lp.nama, '') as parent");
        $this->db->from($this->table);
        $this->db->join('sm_jenis_pemeriksaan as jp', 'jp.id = l.id_jenis_pemeriksaan', 'left');
        $this->db->join('sm_layanan as lp', 'lp.id = l.id_parent', 'left');
        $this->db->where('l.id', $id);
        return $this->db->get()->row();
    }


    //QUERY NILAI
    function getDataNilaiLabPKById($id)
    {
        $this->db->select("l.id id_lay,l.nama, nl.id id_nilai,nl.id_satuan,s.nama nama_satuan,nl.metode,nl.kategori,nl.nilai_awal,nl.simbol,nl.nilai_akhir ");
        $this->db->from('sm_nilai_lab nl');
        $this->db->join('sm_satuan s', 's.id=nl.id_satuan');
        $this->db->join('sm_layanan l', 'nl.id_layanan=l.id','right');
        $this->db->where('l.id', $id);
        return $this->db->get()->row();
    }

    function simpanNilaiLabPK($data)
    {
        return $this->db->insert($this->tableNilaiPK, $data);    
    }

    function updateNilaiLabPK($data)
    {
        // update
        $id = $data['id'];
        return $this->db->where('id', $id, true)->update($this->tableNilaiPK, $data);
    }

    private function sqlNilaiLabPK($baru = null, $lama = null, $batal = null)
    {
        $this->db->select("l.id id_lay,l.nama, nl.id id_nilai,nl.id_satuan,s.nama nama_satuan,nl.metode,nl.kategori,nl.nilai_awal,nl.simbol,nl.nilai_akhir ");
        $this->db->from('sm_nilai_lab nl');
        $this->db->join('sm_satuan s', 's.id=nl.id_satuan');
        $this->db->join('sm_layanan l', 'nl.id_layanan=l.id','right');
        return $this->db->order_by('l.id', 'desc');

        //$this->db->group_by('lp.id,  pd.tanggal_daftar, pd.tanggal_keluar, pd.id_pasien, pd.no_register, p.nama, p.tanggal_lahir, pj.nama, sp.nama, pg.nama, tr.account, sp.kode_bpjs');
    }

    private function _listNilaiLabPK($limit = 0, $start = 0)
    {
        $this->sqlNilaiLabPK();
        if ($limit !== 0) :
            $this->db->limit($limit, $start);
        endif;

        return $this->db->get()->result();
    }

    function getListNilaiLabPK($limit=null, $start=null)
    {
        $result['data'] = $this->_listNilaiLabPK($limit, $start);
        $result['jumlah'] = $this->sqlNilaiLabPK()->get()->num_rows();
        return $result;

        $this->db->close();
        // $this->db->select("l.id,l.nama, nl.id,nl.id_satuan,s.nama nama_satuan,nl.metode,nl.kategori,nl.nilai_awal,nl.simbol,nl.nilai_akhir ");
        // $this->db->from('sm_nilai_lab nl');
        // $this->db->join('sm_satuan s', 's.id=nl.id_satuan');
        // $this->db->join('sm_layanan l', 'nl.id_layanan=l.id','right');
        // return $this->db->order_by('l.id', 'desc');

        //$this->db->group_by('lp.id,  pd.tanggal_daftar, pd.tanggal_keluar, pd.id_pasien, pd.no_register, p.nama, p.tanggal_lahir, pj.nama, sp.nama, pg.nama, tr.account, sp.kode_bpjs');
    }


    //NILAI PK DETAIL
    private function sqlNilaiLabPKDetail($search, $baru = null, $lama = null, $batal = null)
    {
        //DISTINCT ON (lp.id) lp.*, 
        $this->db->select("l.id_parent,l.id id_lay,l.nama nama_tindakan, nl.id id_nilai,
                           nl.id_satuan, nl.metode,nl.kategori,nl.nilai_awal,nl.simbol,nl.nilai_akhir", false); //,s.nama nama_satuan
        $this->db->from('sm_layanan l')
                 ->join('sm_nilai_lab nl', 'l.id=nl.id_layanan', 'left');
                 //->join('sm_satuan s', 'nl.id_satuan=s.id', 'left');

        if ($search['id_lay'] !== '') :
            $this->db->where('l.id', $search['id_lay']);
        endif;

        // if ($search['kategori'] !== '') :
        //     $this->db->where('nl.kategori', $search['kategori']);
        // endif;

        return $this->db->order_by('l.nama', 'asc');
    }

    private function _listNilaiLabPKDetail($limit = 0, $start = 0, $search)
    {
        $this->sqlNilaiLabPKDetail($search);
        if ($limit !== 0) :
            $this->db->limit($limit, $start);
        endif;

        return $this->db->get()->result();
    }

    function getListNilaiLabPKDetail($limit = 0, $start = 0, $search)
    {
        
        $result['data'] = $this->_listNilaiLabPKDetail($limit, $start, $search);
        $result['jumlah'] = $this->sqlNilaiLabPKDetail($search)->get()->num_rows();
        return $result;

        $this->db->close();
    }
}
