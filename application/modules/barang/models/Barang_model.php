<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
        
    }
    
    function simpanDataBarang()
    {
        $id = safe_post('id');
        $pabrik = safe_post("pabrik") !== "" ? safe_post("pabrik") : NULL;
        $nama = safe_post("nama");
        $barcode = safe_post("barcode");
        $rak = safe_post("rak");
        $formularium = safe_post("formularium") !== "" ? safe_post("formularium") : NULL;
        $kekuatan = safe_post("kekuatan") !== "" ? safe_post("kekuatan") : NULL;
        $golongan = safe_post("golongan") !== "" ? safe_post("golongan") : NULL;
        $satuan_kekuatan = safe_post("satuan_kekuatan") !== "" ? safe_post("satuan_kekuatan") : NULL;
        $sediaan = safe_post("sediaan") !== "" ? safe_post("sediaan") : NULL;
        $roa = safe_post('roa') !== "" ? safe_post('roa') : NULL;
        $generik = safe_post("generik") !== "" ? safe_post("generik") : NULL;
        $katastropik = safe_post("katastropik") !== "" ? safe_post("katastropik") : NULL;
        $fornas = safe_post("fornas") !== "" ? safe_post("fornas") : NULL;
        $obatkronis = safe_post("obatkronis");
        $ekatalog = safe_post("ekatalog");
        $highalert = safe_post("highalert") !== "" ? safe_post("highalert") : NULL;
        $ven = safe_post("ven") !== "" ? safe_post("ven") : NULL;
        $kemo = safe_post("obatkemo") === "Ya" ? "1" : "0";
        $atdps = safe_post("atdps") !== "" ? safe_post("atdps") : NULL;
        $antibiotik = safe_post("antibiotik") !== "" ? safe_post("antibiotik") : NULL;
        $bahan_baku = safe_post("bahan_baku") !== "" ? safe_post("bahan_baku") : NULL;
        $indikasi = strip_tags(safe_post("indikasi"));
        $dosis = strip_tags(safe_post("dosis"));
        $kandungan = strip_tags(safe_post("kandungan"));
        $perhatian = strip_tags(safe_post("perhatian"));
        $kontra_ind = strip_tags(safe_post("kontra_indikasi"));
        $efek_samping = strip_tags(safe_post("efek_samping"));
        $asal = safe_post("asal");
        $stok_min = safe_post("stok_min") !== "" ? safe_post("stok_min") : 0;
        $margin_nr = safe_post("margin_non_resep_pr");
        $margin_r = safe_post("margin_resep_pr");
        $hna = currencyToNumber(safe_post("hna"));
        $hpp = currencyToNumber(safe_post("hpp"));
        $aturan_pki = safe_post("aturan_pakai");
        $kls_terapi = safe_post("kls_terapi") && safe_post("kls_terapi") !== "" ? safe_post("kls_terapi") : NULL;
        $kategori = safe_post("kategori_barang");
        $id_kandungan = safe_post("id_kandungan");
        $kandungan_array = safe_post("kandungans");
        $harga_dasar = currencyToNumber(safe_post("harga_dasar"));

        $this->db->trans_begin();
        $nama_lengkap = $nama;
        if ($kekuatan !== NULL) :
            $nama_lengkap .= " " . $kekuatan;
        endif;

        if ($satuan_kekuatan !== NULL) :
            $get_satuan_kekuatan = $this->db->query("select nama from sm_satuan where id = '" . $satuan_kekuatan . "'")->row();
            $nama_lengkap .= " " . $get_satuan_kekuatan->nama;
        endif;

        if ($sediaan) :
            $get_sediaan = $this->db->query("select nama from sm_sediaan where id = '" . $sediaan . "'")->row();
            $nama_lengkap .= " " . $get_sediaan->nama;
        endif;

        if ($pabrik) :
            $get_pabrik = $this->db->query("select nama from sm_pabrik where id = '" . $pabrik . "'")->row();
            $nama_lengkap .= " <i>" . $get_pabrik->nama . "</i>";
        endif;

        if ($id === "") :
            $data = array(
                "barcode" => $barcode, 
                "nama" => $nama, 
                "nama_lengkap" => $nama_lengkap, 
                "id_pabrik" => $pabrik, 
                "id_golongan" => $golongan, 
                "rak" => $rak, 
                "kekuatan" => $kekuatan, 
                "satuan_kekuatan" => $satuan_kekuatan, 
                "id_sediaan" => $sediaan, 
                "roa" => $roa, 
                "generik" => $generik, 
                "antibiotik" => $antibiotik, 
                "bahan_baku" => $bahan_baku, 
                "katastropik" => $katastropik, 
                "indikasi" => $indikasi, 
                "dosis" => $dosis, 
                "kandungan" => $kandungan, 
                "perhatian" => $perhatian, 
                "kontra_indikasi" => $kontra_ind, 
                "efek_samping" => $efek_samping, 
                "formularium" => $formularium, 
                "fornas" => $fornas, 
                "ven" => $ven, 
                "kemo" => $kemo, 
                "atdps" => $atdps, 
                "is_obat_kronis" => $obatkronis,
                "ekatalog" => $ekatalog, 
                "high_alert" => $highalert, 
                "aturan_pakai" => $aturan_pki, 
                "id_farmako_terapi" => $kls_terapi, 
                "stok_minimal" => $stok_min, 
                "margin_non_resep" => $margin_nr, 
                "margin_resep" => $margin_r, 
                "hna" => $hna, 
                "hpp" => $hpp, 
                "jenis" => "Farmasi", 
                "status" => $asal, 
                "id_kategori" => $kategori,
                "harga_dasar" => $harga_dasar
            );

            $this->db->insert('sm_barang', $data);
            if ($this->db->trans_status() === false) :
                $this->db->trans_rollback();
                $result["status"] = false;
            endif;

            $result["id"] = $this->db->insert_id();
            if (is_array($kandungan_array)) :
                foreach ($kandungan_array as $val_kandungan) :
                    $this->db->insert('sm_kandungan_obat', array("id_barang" => $result["id"], "nama_kandungan" => $val_kandungan));
                endforeach;
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
            $get = $this->db->query("select id, (isi*isi_satuan) as jml from sm_kemasan_barang where id_barang = '" . $result["id"] . "' order by jml asc limit 1")->row();            
            $this->db->where("id", $get->id)->update("sm_kemasan_barang", array("default_kemasan" => "0"));
            $update = "update sm_kemasan_barang set default_kemasan = '1' where id = '" . $get->id . "'";
            $this->db->query($update);
        else :
            $data = array(
                "barcode" => $barcode, 
                "nama" => $nama, 
                "nama_lengkap" => $nama_lengkap, 
                "id_pabrik" => $pabrik, 
                "id_golongan" => $golongan, 
                "rak" => $rak, 
                "kekuatan" => $kekuatan, 
                "satuan_kekuatan" => $satuan_kekuatan, 
                "id_sediaan" => $sediaan, 
                "roa" => $roa, 
                "generik" => $generik, 
                "antibiotik" => $antibiotik, 
                "bahan_baku" => $bahan_baku, 
                "katastropik" => $katastropik, 
                "indikasi" => $indikasi, 
                "dosis" => $dosis, 
                "kandungan" => $kandungan, 
                "perhatian" => $perhatian, 
                "kontra_indikasi" => $kontra_ind, 
                "efek_samping" => $efek_samping, 
                "formularium" => $formularium, 
                "fornas" => $fornas, 
                "ven" => $ven, 
                "kemo" => $kemo, 
                "atdps" => $atdps, 
                "is_obat_kronis" => $obatkronis,
                "ekatalog" => $ekatalog, 
                "high_alert" => $highalert, 
                "aturan_pakai" => $aturan_pki, 
                "id_farmako_terapi" => $kls_terapi, 
                "stok_minimal" => $stok_min, 
                "margin_non_resep" => $margin_nr, 
                "margin_resep" => $margin_r, 
                "hna" => $hna, 
                "hpp" => $hpp, 
                "jenis" => "Farmasi", 
                "status" => $asal, 
                "id_kategori" => $kategori,
                "harga_dasar" => $harga_dasar
            );

            $this->db->where("id", $id);
            $this->db->update("sm_barang", $data);
            $result["id"] = $id;

            if (is_array($id_kandungan)) :
                foreach ($id_kandungan as $key => $value) :
                    if ($value !== "") :
                        $this->db->where("id", $value);
                        $this->db->update("sm_kandungan_obat", array("nama_kandungan" => $kandungan_array[$key]));
                    else :
                        $this->db->insert("sm_kandungan_obat", array("id_barang" => $result["id"], "nama_kandungan" => $kandungan_array[$key]));
                    endif;
                endforeach;
            endif;

            if (isset($_POST['jumlah'])) :
                $jumlah = $_POST['jumlah'];
                if (isset($jumlah)) :
                    for ($i = 0; $i <= $jumlah; $i++) :
                        $id_kemasan = $_POST["id_kemasan" . $i];
                        $barcode = $_POST["barcode" . $i];
                        $kemasan = $_POST["kemasan" . $i];
                        $isi = $_POST["isi" . $i];
                        $satuan = $_POST["satuan" . $i];
                        $isi_satuan = $_POST["isi_kecil" . $i];
                        $default = isset($_POST['default' . $i]);
                        
                        $dataquery = array(
                            'id_barang' => $result['id'],
                            'barcode' => $barcode,
                            'id_kemasan' => $kemasan,
                            'isi' => $isi,
                            'id_satuan' => $satuan,
                            'isi_satuan' => $isi_satuan,
                            'default_kemasan' => $default ? '1' : '0'
                        );

                        if ($id_kemasan !== '') {
                            $this->db->where('id', $id_kemasan, true)->update('sm_kemasan_barang', $dataquery);
                        } else {
                            $this->db->insert('sm_kemasan_barang', $dataquery);
                        }
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
			
        endif;

        return $result;
    }

    function deleteDataBarang($id)
    {
        return $this->db->where("id", $id)->delete("sm_barang");
    }

    function getDataBarangById($id)
    {
        $sql = "select b.*, COALESCE(p.nama,'') as pabrik, g.nama as perundangan,
                f.nama as farmakoterapi, COALESCE(st.nama,'') as satuan, COALESCE(sd.nama,'') as sediaan 
                from sm_barang b
                left join sm_pabrik p on (b.id_pabrik = p.id)
                left join sm_satuan st on (b.satuan_kekuatan = st.id)
                left join sm_farmakoterapi f on (f.id = b.id_farmako_terapi)
                left join sm_golongan g on (b.id_golongan = g.id)
                left join sm_sediaan sd on (b.id_sediaan = sd.id) where b.id = '" . $id . "'
                ";
        $result = $this->db->query($sql)->result();
        foreach ($result as $key => $value) :
            $sql_kemasan = "select k.*, s.nama, (b.hna*k.isi*k.isi_satuan) as hna, (k.isi*k.isi_satuan) as isi_kemasan, sd.nama as sediaan 
                            from sm_kemasan_barang k
                            join sm_barang b on (k.id_barang = b.id)
                            join sm_satuan s on (k.id_kemasan = s.id)
                            left join sm_sediaan sd on (b.id_sediaan = sd.id)
                            where k.id_barang = '" . $value->id . "'";
            $result[$key]->kemasan = $this->db->query($sql_kemasan)->result();
            $sql_child = "select bo.nama as nama_kandungan, k.id
                        from sm_kandungan_obat k
                        join sm_bahan_obat bo on (k.id_bahan_obat = bo.id)
                        join sm_barang b on (k.id_barang = b.id)
                        where k.id_barang = '" . $value->id . "'";
            $result[$key]->kandungans = $this->db->query($sql_child)->result();
        endforeach;
        return $result;
    }

    function aktivatingBarang($param)
    {
        if ($param["value"] === "off") :
            $status = "Tidak";
        else :
            $status = "Ya";
        endif;

        $this->db->where("id", $param["id"]);
        $this->db->update("sm_barang", array("is_active" => $status));
        return true;
    }

    function getDataAlokasiBarangUnit($id_barang)
    {
        $sql = "select * from sm_unit order by nama asc ";
        $result = $this->db->query($sql)->result();
        foreach ($result as $key => $value) {
            $sql_child = "select count(*) as jml from sm_barang_unit where id_barang = '" . $id_barang . "' and id_unit = '" . $value->id . "'";
            $result[$key]->count = $this->db->query($sql_child)->row()->jml;
        }
        $data["data"] = $result;
        $data["nama_barang"] = $this->db->query("select nama_lengkap from sm_barang where id = '" . $id_barang . "'")->row()->nama_lengkap;
        return $data;
    }

    function simpanDataAlokasiBarangUnit()
    {
        $this->db->trans_begin();
        $id_barang = safe_post("id_barang");
        $id_unit = safe_post("id_unit");
        $this->db->delete("sm_barang_unit", array("id_barang" => $id_barang));
        if ($this->db->trans_status() === false) :
            $this->db->trans_rollback();
            $result["status"] = false;
            $result['token'] = $this->security->get_csrf_hash();
        endif;
        foreach ($id_unit as $key => $value) :
            $data_bu = array("id_barang" => $id_barang, "id_unit" => $value);
            $this->db->insert("sm_barang_unit", $data_bu);
            if ($this->db->trans_status() === false) :
                $this->db->trans_rollback();
                $result["status"] = false;
                $result['token'] = $this->security->get_csrf_hash();
            endif;
        endforeach;
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

    function getListDataBarangUnit($limit, $start, $param)
    {
        $q = NULL;
        if ($param["keywords"] !== "") :
            $q .= " and b.nama ilike ('" . $param["keywords"] . "%')";
        endif;
        $limitation = "";
        if ($limit !== NULL) :
            $limitation = " limit " . $limit . " offset " . $start;
        endif;
        $select = "select bu.*, b.hna, b.hpp, 
                    COALESCE(p.nama,'') as pabrik, 
                    COALESCE(g.nama,'') as perundangan, 
                    kt.nama as kategori,
                    f.id as id_farmakoterapi, 
                    COALESCE(st.nama,'') as satuan, 
                    COALESCE(sd.nama,'') as sediaan, 
                    COALESCE(b.kekuatan, '') as kekuatan,
                    concat_ws(' ',b.nama, CASE WHEN b.kekuatan = '' THEN NULL ELSE b.kekuatan END, 
                    COALESCE(st.nama,''), COALESCE(sd.nama,''), 
                    CASE WHEN b.is_active = 'Tidak' THEN '<b>TIDAK DIPAKAI LAGI</b>' ELSE ' ' END, 
                    '<small><i>', COALESCE(p.nama,''), '</i></small>') as nama";
        $count = "select count(*) as count ";
        $sql = " from sm_barang_unit bu 
                join sm_barang b on (bu.id_barang = b.id)
                join sm_kategori_barang kt on (b.id_kategori = kt.id)
                left join sm_pabrik p on (b.id_pabrik = p.id)
                left join sm_satuan st on (b.satuan_kekuatan = st.id)
                left join sm_farmakoterapi f on (f.id = b.id_farmako_terapi)
                left join sm_golongan g on (b.id_golongan = g.id)
                left join sm_sediaan sd on (b.id_sediaan = sd.id) 
                where b.id is not NULL " . $q . "
                and bu.id_unit = '" . $param["id_unit"] . "'";
        $order = " order by bu.id desc ";
        $result = $this->db->query($select . $sql . $order . $limitation)->result();
        foreach ($result as $key => $value) :
            $sql_child = "select kb.isi, s.nama as kemasan, st.nama as satuan from sm_kemasan_barang kb
                        join sm_satuan s on (kb.id_kemasan = s.id)
                        join sm_satuan st on (kb.id_satuan = st.id)
                        where kb.id_barang = '" . $value->id . "'";
            $result[$key]->kemasan = $this->db->query($sql_child)->result();
        endforeach;
        $result["data"] = $result;
        $result["jumlah"] = $this->db->query($count . $sql . $q)->row()->count;
        return $result;
    }

    function simpanBarangUnit()
    {
        $unit = safe_post("unit");
        $barang = safe_post("barang");
        foreach ($barang as $data) :
            $array = array("id_unit" => $unit, "id_barang" => $data);
            $cek = $this->db->get_where("sm_barang_unit", $array)->num_rows();
            if ($cek === 0) :
                $this->db->insert("sm_barang_unit", $array);
            endif;
        endforeach;

        $result['status'] = true;
        $result['token'] = $this->security->get_csrf_hash();
        return $result;
    }

    function kemasanLoadData($data, $asc = NULL)
    {
        $q = NULL;
        if ($data["kemasan"] === "get_smallest") :
            $q = " asc limit 1";
        else :
            $q = " desc";
        endif;

        if ($asc !== NULL) :
            $q = "asc";
        endif;

        $sql = "select k.*, s.nama, 
                (b.hna*k.isi*k.isi_satuan) as hna, 
                k.isi*k.isi_satuan as isi_kemasan
                from sm_kemasan_barang k
                join sm_satuan s on (k.id_kemasan = s.id) 
                join sm_barang b on (k.id_barang = b.id)
                where k.id_barang = '" . $data["id"] . "' 
                order by (k.isi*k.isi_satuan) " . $q;
        return $this->db->query($sql);
    }

    function getEdBarang($id_barang)
    {
        $sql = "select sum(masuk) - sum(keluar) as sisa, ed 
                from sm_stok
                where id_barang = '".$id_barang."'
                and id_unit = '".$this->session->userdata('id_unit')."'
                group by id_barang, ed 
                having sum(masuk) - sum(keluar) != 0";
        $query = $this->db->query($sql);
        $this->db->close();
        return $query;
    }

}