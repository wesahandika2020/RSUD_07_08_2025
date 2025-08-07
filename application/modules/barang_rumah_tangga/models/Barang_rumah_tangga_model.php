<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang_rumah_tangga_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
        $this->datetime = date('Y-m-d H:i:s');    
    }
    
    function deleteDataKemasanBarang($id_kemasan)
    {
        return $this->db->where("id", $id_kemasan)->delete("sm_kemasan_barang");
    }

    private function sql($param)
    {
        $this->db->select("b.*, 
                            COALESCE(p.nama,'') as pabrik, 
                            COALESCE(g.nama,'') as perundangan, 
                            COALESCE(bd.nama,'-') as bidang,
                            f.id as id_farmakoterapi, 
                            kt.nama as kategori,
                            COALESCE(st.nama,'') as satuan, 
                            COALESCE(sd.nama,'') as sediaan,
        ");
        $this->db->from('sm_barang as b');
        $this->db->join('sm_bidang as bd', 'bd.id = b.id_bidang');
        $this->db->join('sm_kategori_barang as kt', 'kt.id = b.id_kategori');
        $this->db->join('sm_pabrik as p', 'p.id = b.id_pabrik', 'left');
        $this->db->join('sm_satuan as st', 'st.id = b.satuan_kekuatan', 'left');
        $this->db->join('sm_farmakoterapi as f', 'f.id = b.id_farmako_terapi', 'left');
        $this->db->join('sm_sediaan as sd', 'sd.id = b.id_sediaan', 'left');
        $this->db->join('sm_golongan as g', 'g.id = b.id_golongan', 'left');
        $this->db->where("b.id is not NULL");
        $this->db->where('b.jenis !=', 'Farmasi', true);
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
        if ($param["pencarian"] !== "") :
            $this->db->where("b.nama ilike ('%" . $param["pencarian"] . "%')");
        endif;

        return $this->db->order_by('b.nama');
    }

    private function _list($limit, $start, $search)
    {
        $this->sql($search);
        if ($limit !== 0) :
            $this->db->limit($limit, $start);
        endif;

        return $this->db->get()->result();
    }
    
    function getListData($start, $limit, $search)
    {
        $result = $this->_list($limit, $start, $search);
        foreach ($result as $key => $value) :
            $sql_child = "select kb.isi, s.nama as kemasan, st.nama as satuan from sm_kemasan_barang kb
                        join sm_satuan s on (kb.id_kemasan = s.id)
                        join sm_satuan st on (kb.id_satuan = st.id)
                        where kb.id_barang = '" . $value->id . "'";
            $result[$key]->kemasan = $this->db->query($sql_child)->result();
        endforeach;
        $result['data'] = $result;
        $result['jumlah'] = $this->sql($search)->get()->num_rows();

        $this->db->close();
        return $result;
    }

    function simpanDataBarang()
    {   

        $id = safe_post('id');
        $pabrik = safe_post("pabrik") !== "" ? safe_post("pabrik") : NULL;
        $bidang = safe_post("bidang") !== "" ? safe_post("bidang") : NULL;
        $code = safe_post("kode");
        $nama = safe_post("nama");
        $barcode = safe_post("barcode");
        // $rak = safe_post("rak");
        // $highalert = safe_post("highalert") !== "" ? safe_post("highalert") : NULL;
        $stok_min = safe_post("stok_min");
        $margin_nr = safe_post("margin_non_resep_pr") !== "" ? safe_post("margin_non_resep_pr") : 0;
        $margin_r = safe_post("margin_resep_pr") !== "" ? safe_post("margin_resep_pr") : 0;
        $hna = (float)currencyToNumber(safe_post("hpp")) / 110 * 100;
        $hpp = (float)currencyToNumber(safe_post("hpp"));
        $kategori = safe_post("kategori_barang");
        $pembayaran = safe_post("pembayaran");

        $this->db->trans_begin();
        if ($id === "") :
            $data = array(
                "barcode" => $barcode, 
                "nama" => $nama, 
                "nama_lengkap" => $nama, 
                "pembayaran" => $pembayaran,
                "code" => $code,
                "id_pabrik" => $pabrik, 
                // "rak" => $rak, 
                // "high_alert" => $highalert, 
                "stok_minimal" => $stok_min, 
                // "margin_non_resep" => $margin_nr, 
                // "margin_resep" => $margin_r, 
                "hna" => $hna, 
                "hpp" => $hpp, 
                "jenis" => "Non Farmasi", 
                "id_kategori" => $kategori,
                "id_bidang" => $bidang
            );

            // var_dump($data); die;

            $this->db->insert('sm_barang', $data);
            $result["id"] = $this->db->insert_id();
            if ($this->db->trans_status() === false) :
                $this->db->trans_rollback();
                $result["status"] = false;
            endif;
            if (isset($_POST['jumlah'])) :
                $jumlah = $_POST['jumlah'];
                if (isset($jumlah)) :
                    for ($i = 0; $i <= $jumlah; $i++) :
                        $barcode = $_POST["barcode" . $i];
                        $kemasan = $_POST["kemasan" . $i];
                        $isi = $_POST["isi" . $i];
                        $satuan = $_POST["satuan" . $i];
                        $isi_satuan = $_POST["isi_kecil" . $i];
                        
                        $dataquery = array(
                            'id_barang' => $result['id'],
                            'barcode' => $barcode,
                            'id_kemasan' => $kemasan,
                            'isi' => $isi,
                            'id_satuan' => $satuan,
                            'isi_satuan' => $isi_satuan
                        );
                        
                        $this->db->insert('sm_kemasan_barang', $dataquery);
                    endfor;

                    if ($this->db->trans_status() === false) :
                        $this->db->trans_rollback();
                        $result["status"] = false;
                    else :
                        $this->db->trans_commit();
                        $result["status"] = true;
                    endif;
                endif;
            endif;

            $this->db->where("id_barang", $result["id"]);
            $this->db->update("sm_kemasan_barang", array("default_kemasan" => "0"));
            $get = $this->db->query("select id, (isi*isi_satuan) as jml from sm_kemasan_barang where id_barang = '" . $result["id"] . "' order by jml asc limit 1")->row();
            $update = "update sm_kemasan_barang set default_kemasan = '1' where id = '" . $get->id . "'";
            $this->db->query($update);
        else :
            $data = array(
                "barcode" => $barcode, 
                "nama" => $nama, 
                "nama_lengkap" => $nama, 
                "pembayaran" => $pembayaran,
                "code" => $code,
                "id_pabrik" => $pabrik, 
                // "rak" => $rak, 
                // "high_alert" => $highalert, 
                "stok_minimal" => $stok_min, 
                // "margin_non_resep" => $margin_nr, 
                // "margin_resep" => $margin_r, 
                "hna" => $hna, 
                "hpp" => $hpp, 
                "jenis" => "Non Farmasi", 
                "id_kategori" => $kategori,
                "id_bidang" => $bidang
            );

            $this->db->where("id", $id);
            $this->db->update("sm_barang", $data);
            $result["id"] = $id;
            if ($this->db->trans_status() === false) :
                $this->db->trans_rollback();
                $result["status"] = false;
            endif;

            

            if (isset($_POST['jumlah'])) :
                $jumlah = $_POST['jumlah'];
                for ($i = 0; $i <= $jumlah; $i++) :

                    $id_kemasan = $_POST["id_kemasan" . $i];
                    $barcode = $_POST["barcode" . $i];
                    $kemasan = $_POST["kemasan" . $i];
                    $isi = $_POST["isi" . $i];
                    $satuan = $_POST["satuan" . $i];
                    $isi_satuan = $_POST["isi_kecil" . $i];

                    if ($id_kemasan !== "") :
                        $dataquery = array(
                            'id_barang' => $id,
                            'barcode' => $barcode,
                            'id_kemasan' => $kemasan,
                            'isi' => $isi,
                            'id_satuan' => $satuan,
                            'isi_satuan' => $isi_satuan
                        );

                        if(isset($_POST["default".$i])){

                            $dataquery['default_kemasan'] = 1;

                        } else {

                            $dataquery['default_kemasan'] = 0;

                        }

                        $this->db->where('id', $id_kemasan, true);
                        $this->db->update('sm_kemasan_barang', $dataquery);
                    else :
                        $dataquery = array(
                            'id_barang' => $id,
                            'barcode' => $barcode,
                            'id_kemasan' => $kemasan,
                            'isi' => $isi,
                            'id_satuan' => $satuan,
                            'isi_satuan' => $isi_satuan
                        );

                        if(isset($_POST["default".$i])){

                            $dataquery['default_kemasan'] = 1;

                        } else {

                            $dataquery['default_kemasan'] = 0;

                        }
                        $this->db->insert('sm_kemasan_barang', $dataquery);
                    endif;

                endfor;

                if ($this->db->trans_status() === false) :
                    $this->db->trans_rollback();
                    $result["status"] = false;
                else :
                    $this->db->trans_commit();
                    $result["status"] = true;
                endif;
            endif;
        endif;

        if ($this->db->trans_status() === false) :
            $this->db->trans_rollback();
            $result["status"] = false;
            $result['token'] = $this->security->get_csrf_hash();
        else :
            $this->db->trans_commit();
            $result["status"] = true;
            $result['token'] = $this->security->get_csrf_hash();
        endif;

        return $result;
    }
}