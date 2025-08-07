<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Upload_csv_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->datetime = date('Y-m-d H:i:s');
    }

    public function cekDataTarifINACBG($sep)
    {
        $this->db->select('*');
        $this->db->from('sm_tarif_inacbg');
        $this->db->where('sep', $sep);

        return  $this->db->get()->row()->sep ?? null;
    }

    public function cekDataTarifPendingINACBG($sep)
    {
        $this->db->select('*');
        $this->db->from('sm_tarif_pending_inacbg');
        $this->db->where('sep', $sep);

        return  $this->db->get()->row()->sep ?? null;
    }

    public function insertTarifINACBG($data)
    {
        $this->db->insert('sm_tarif_inacbg', $data);
    }

    public function insertTarifPendingINACBG($data)
    {
        $this->db->insert('sm_tarif_pending_inacbg', $data);
    }

    public function getListTarifINACBG($limit, $start, $search)
    {
        $param = "";
        // $lunas  = "";
        // if ($search["jenis_data_search"] !== "" & $search["tanggal_akhir"] !== "") :
        //     $param .= " and pd.tanggal_daftar BETWEEN '" . date2mysql($search['tanggal_awal']) . " 00:00:00' AND '" . date2mysql($search['tanggal_akhir']) . " 23:59:59'";
        // endif;
        // if ($search["keyword"] !== "") :
        //     $param .= " and (p.nama ilike '%" . $search["keyword"] . "%' or p.id ilike '%" . $search["keyword"] . "%') ";
        // endif;
        // if ($search["nama"] !== "") :
        //     $param .= " and p.nama ilike '%" . $search["nama"] . "%' ";
        // endif;
        // if ($search["no_register"] !== "") :
        //     $param .= " and pd.no_register = '" . $search["no_register"] . "' ";
        // endif;
        // if ($search["no_rm"] !== "") :
        //     $param .= " and p.id ilike '%" . $search["no_rm"] . "' ";
        // endif;
        // if ($search["status_bayar"] === "Belum") :
        //     $param .= " and (select count(id) from sm_pembayaran where id_pendaftaran = pd.id and status = 'Tagihan') > 0 ";
        // else :
        //     if ($search["status_bayar"] === 'Sudah') :
        //         $param .= " and (select count(id) from sm_pembayaran where id_pendaftaran = pd.id and status = 'Tagihan') < 1 ";
        //     endif;
        // endif;
        // if ($search["tempat_layanan"] !== "") :
        //     $param .= " and sp.nama = '" . $search["tempat_layanan"] . "' ";
        // endif;
        // if ($search["cara_bayar"] !== "") :
        //     $param .= " and lp.cara_bayar = '" . $search["cara_bayar"] . "' ";
        // endif;
        // if ($search["penjamin"] !== "") :
        //     $param .= " and lp.id_penjamin = '" . $search["penjamin"] . "' ";
        // endif;
        // if ($search["dokter"] !== "") :
        //     $param .= " and lp.id_dokter = '" . $search["dokter"] . "' ";
        // endif;

        // if ($this->session->userdata('id_translucent') == "1874") :
        //     $param .= " and pj.id = '1' ";
        // endif;
        // if ($search["jeni"] === "intensive_care") {
        //     $param .= " and lp.jenis_layanan == 'Intensive Care' ";
        // } else if ()

        if ($search["jenis_data_search"] == "01") :
            $table = "sm_tarif_inacbg";
            $order = " order by discharge_date desc ";
        elseif ($search["jenis_data_search"] == "02") :
            $table = "sm_tarif_pending_inacbg";
            $order = " order by tgl_pulang desc ";
        endif;

        $limitation = " limit " . $limit . " offset " . $start;
        $select = " select * ";
        $count = "select count(*) as count ";

        $sql = "from $table 
                where sep is not null" . $param;

        $query = $this->db->query($select . $sql . $order . $limitation)->result();

        $result["data"] = $query;
        $result["jumlah"] = $this->db->query($count . $sql)->row()->count;
        return $result;
    }
}
