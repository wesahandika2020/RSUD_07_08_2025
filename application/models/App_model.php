<?php
defined('BASEPATH') or exit('No direct script access allowed');

class App_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
        $this->datetime = date("Y-m-d H:i:s");
    }

    function getDataModules($id_account_group)
    {
        $this->db->select('m.*');
        $this->db->from('sm_module as m');
        $this->db->join('sm_menu as mn', 'm.id = mn.id_module');
        $this->db->join('sm_grant_access as ga', 'mn.id = ga.id_menu');
        $this->db->where('ga.id_account_group', $id_account_group, true);
        $this->db->where('mn.active', '1', true);
        $this->db->group_by('m.id');
        $this->db->order_by('m.sort');
        return $this->db->get()->result();
    }

    function getDataMenus($id_account_group, $id_module)
    {
        $this->db->select('mn.*');
        $this->db->from('sm_menu as mn');
        $this->db->join('sm_grant_access as ga', 'mn.id = ga.id_menu');
        $this->db->where('ga.id_account_group', $id_account_group, true);
        $this->db->where('mn.id_module', $id_module, true);
        $this->db->where('mn.active', '1', true);
        $this->db->order_by('mn.sort', 'asc');
        $this->db->order_by('mn.nama', 'asc');
        return $this->db->get()->result();
    }

    function getDataHospital()
    {
        $this->db->select('hs.*, kl.nama as kelurahan, kk.nama as kabupaten_kota, p.nama as provinsi');
        $this->db->from('sm_hospital as hs');
        $this->db->join('sm_kelurahan as kl', 'hs.id_kelurahan = kl.id', 'left');
        $this->db->join('sm_kecamatan as kc', 'kl.id_kecamatan = kc.id', 'left');
        $this->db->join('sm_kota_kabupaten as kk', 'kc.id_kota_kabupaten = kk.id', 'left');
        $this->db->join('sm_provinsi as p', 'kk.id_provinsi = p.id', 'left');
        $this->db->where('hs.active', 1, true);
        return $this->db->get()->row();
    }

    function getConfigBPJS()
    {
        return $this->db->where('id', '1')->get('sm_konfigurasi_bpjs')->row();
    }

    function getConfigBPJSV2()
    {
        return $this->db->where('id', '1')->get('sm_konfigurasi_bpjs_v2')->row();
    }

    function getConfigAntrianBPJS()
    {
        return $this->db->where('id', '1')->get('sm_konfigurasi_bpjs_antrean')->row();
    }

    // function getConfigEclaim()
    // {
    //     return $this->db->where('id', '1')->get('sm_konfigurasi_eclaim')->row();
    // }
    function getConfigEklaim()
    {
        return $this->db->where('id', '1')->get('sm_konfigurasi_eklaim')->row();
    }

    function getConfigAplicares()
    {
        return $this->db->where('id', '1')->get('sm_konfigurasi_aplicares_bpjs')->row();
    }

    // konfigurasi hclab lis sysmex
    function getConfigHCLAB()
    {
        return $this->db->where('id', '1')->get('sm_konfigurasi_hclab')->row();
    }
    
    // konfigurasi Apotek Online BPJS
    function getConfigApotekBPJS()
    {
        return $this->db->where('id', '3')->get('sm_konfigurasi_apotek_bpjs')->row();
    }

    function getInformasi($param = NULL)
    {
        if ($param !== NULL) :
            return $this->db->where('status', $param)->get('sm_informasi')->row();
        else :
            return $this->db->get('sm_informasi')->row();
        endif;
    }

    function getDataUserInstalasi($id_unit)
    {
        return $this->db->select("i.nama")->from('sm_unit as u')->join('sm_instalasi as i', 'i.id = u.id_instalasi')->where('u.id', $id_unit, true)->get();
    }

    function  getNotificationDistribusi($id_unit)
    {
        return $this->db->select("count(*) as jumlah")->from('sm_distribusi')->where('id_unit_tujuan', $id_unit, true)->where('tanggal_dikirim is NULL')->get()->row()->jumlah;
    }

    function  getNotificationPenerimaanDistribusi($id_unit)
    {
        if ($id_unit) :
            $sql = "SELECT count(*) as jumlah 
                    FROM sm_distribusi 
                    WHERE id_unit_asal = '" . $id_unit . "' 
                    AND tanggal_dikirim IS NOT NULL 
                    AND id NOT IN (SELECT id_distribusi FROM sm_penerimaan_distribusi)";
            return $this->db->query($sql)->row()->jumlah;
        endif;
    }

    function notifDistribusiLogistik($id_unit)
    {
        return $this->db->select("count(*) as jumlah")->from('sm_invrt_distribusi')->where('id_unit_tujuan', $id_unit, true)->where('tanggal_dikirim is NULL')->get()->row()->jumlah;
    }

    function notifPenerimaanDistribuasi($id_unit)
    {
        if ($id_unit) :
            $sql = "SELECT count(*) as jumlah 
                    FROM sm_invrt_distribusi 
                    WHERE id_unit_asal = '" . $id_unit . "' 
                    AND tanggal_dikirim IS NOT NULL 
                    AND id NOT IN (SELECT id_distribusi FROM sm_penerimaan_distribusi_logistik)";
            return $this->db->query($sql)->row()->jumlah;
        endif;
    }

    function getAllDataPasienStatus($param)
    {
        $addSQL = "";
        $andSQL = array();

        if (isset($param["tanggal_daftar"])) :
            if (is_array($param["tanggal_daftar"])) :
                $tanggalStart = $param["tanggal_daftar"][0];
                $tanggalEnd = !empty($param["tanggal_daftar"][1]) ? $param["tanggal_daftar"][1] : $this->datetime;
                $andSQL[] = "tanggal_daftar BETWEEN '" . $tanggalStart . "' AND '" . $tanggalEnd . "'";

            else :
                $andSQL[] = "tanggal_daftar = '" . $param["tanggal_daftar"] . "'";
            endif;
        endif;

        if (isset($param["status"])) :
            $andSQL[] = "status = '" . $param["status"] . "'";
        endif;

        if (!empty($andSQL)) :
            $addSQL = " AND " . implode(" AND ", $andSQL);
        endif;

        $query = "select waktu_daftar, count(waktu_daftar) as jumlah from (select date(tanggal_daftar) as waktu_daftar from sm_pendaftaran where pendaftaran_langsung = 0 " . $addSQL . ") as x group by waktu_daftar";
        return $this->db->query($query);
        $this->db->close();
    }

    function getLastDataExistPendaftaran()
    {
        return $this->db->select("date(tanggal_daftar) as tanggal")->from("sm_pendaftaran")->order_by("id desc")->limit("1")->get();
    }

    function getDataTopTenDiagnosis($tanggalStart, $tanggalEnd)
    {
        $this->db->select("count(*) as jumlah, g.nama")
            ->from("sm_diagnosa as diag")
            ->join("sm_golongan_sebab_sakit as g", "g.id = diag.id_golongan_sebab_sakit")
            ->where("date(diag.waktu) between '" . $tanggalStart . "' and '" . $tanggalEnd . "'")
            ->where("diag.post", "1")
            ->group_by("g.id")
            ->order_by("jumlah desc")
            ->limit("10", "0");
        return $this->db->get()->result();
    }

    function getDataPasienPerUnit($param = "")
    {
        $addSQL = "";
        $andSQL = array();

        if (isset($param["tanggal_daftar"])) :
            if (is_array($param["tanggal_daftar"])) :
                $tanggalStart = $param["tanggal_daftar"][0];
                $tanggalEnd = !empty($param["tanggal_daftar"][1]) ? $param["tanggal_daftar"][1] : $this->datetime;
                $andSQL[] = "tanggal_layanan BETWEEN '" . $tanggalStart . "' AND '" . $tanggalEnd . "'";

            else :
                $andSQL[] = "tanggal_daftar = '" . $param["tanggal_daftar"] . "'";
            endif;
        endif;

        if (isset($param["id_unit_layanan"])) :
            $andSQL[] = "id_unit_layanan = '" . $param["id_unit_layanan"] . "'";
        endif;

        if (!empty($andSQL)) :
            $addSQL = " AND " . implode(" AND ", $andSQL);
        endif;

        $query = "select waktu_daftar, count(waktu_daftar) as jumlah from (select date(tanggal_layanan) as waktu_daftar from sm_layanan_pendaftaran where id_pendaftaran is not null and jenis_layanan != 'Rawat Inap' " . $addSQL . ") as x group by waktu_daftar";
        return $this->db->query($query);
        $this->db->close();
    }
	
	function getAllDataPasienStatusRajal($param)
    {
        $addSQL = "";
        $andSQL = array();
        if (isset($param["tanggal_daftar"])) :
            if (is_array($param["tanggal_daftar"])) :
                $tanggalStart = $param["tanggal_daftar"][0];
                $tanggalEnd = !empty($param["tanggal_daftar"][1]) ? $param["tanggal_daftar"][1] : $this->datetime;
                $andSQL[] = "tanggal_daftar BETWEEN '" . $tanggalStart . "' AND '" . $tanggalEnd . "'";
            else :
                $andSQL[] = "tanggal_daftar = '" . $param["tanggal_daftar"] . "'";
            endif;
        endif;
        if (isset($param["status"])) :
            $andSQL[] = "status = '" . $param["status"] . "'";
        endif;
        if (!empty($andSQL)) :
            $addSQL = " AND " . implode(" AND ", $andSQL);
        endif;
        $query = "select waktu_daftar, count(waktu_daftar) as jumlah from (select date(tanggal_daftar) as waktu_daftar from sm_pendaftaran where pendaftaran_langsung = 0 and jenis_rawat='Jalan' and jenis_pendaftaran in ('IGD','Poliklinik') " . $addSQL . ") as x group by waktu_daftar";
        return $this->db->query($query);
        $this->db->close();
    }
    function getAllDataPasienStatusRanap($param)
    {
        $addSQL = "";
        $andSQL = array();
        if (isset($param["tanggal_daftar"])) :
            if (is_array($param["tanggal_daftar"])) :
                $tanggalStart = $param["tanggal_daftar"][0];
                $tanggalEnd = !empty($param["tanggal_daftar"][1]) ? $param["tanggal_daftar"][1] : $this->datetime;
                $andSQL[] = "tanggal_daftar BETWEEN '" . $tanggalStart . "' AND '" . $tanggalEnd . "'";
            else :
                $andSQL[] = "tanggal_daftar = '" . $param["tanggal_daftar"] . "'";
            endif;
        endif;
        if (isset($param["status"])) :
            $andSQL[] = "status = '" . $param["status"] . "'";
        endif;
        if (!empty($andSQL)) :
            $addSQL = " AND " . implode(" AND ", $andSQL);
        endif;
        $query = "select waktu_daftar, count(waktu_daftar) as jumlah from (select date(tanggal_daftar) as waktu_daftar from sm_pendaftaran where pendaftaran_langsung = 0 and jenis_rawat='Inap' and jenis_pendaftaran in ('IGD','Poliklinik') " . $addSQL . ") as x group by waktu_daftar";
        return $this->db->query($query);
        $this->db->close();
    }
    function getAllDataPasienStatusPenunjang($param)
    {
        $addSQL = "";
        $andSQL = array();
        if (isset($param["tanggal_daftar"])) :
            if (is_array($param["tanggal_daftar"])) :
                $tanggalStart = $param["tanggal_daftar"][0];
                $tanggalEnd = !empty($param["tanggal_daftar"][1]) ? $param["tanggal_daftar"][1] : $this->datetime;
                $andSQL[] = "tanggal_daftar BETWEEN '" . $tanggalStart . "' AND '" . $tanggalEnd . "'";
            else :
                $andSQL[] = "tanggal_daftar = '" . $param["tanggal_daftar"] . "'";
            endif;
        endif;
        if (isset($param["status"])) :
            $andSQL[] = "status = '" . $param["status"] . "'";
        endif;
        if (!empty($andSQL)) :
            $addSQL = " AND " . implode(" AND ", $andSQL);
        endif;
        $query = "select waktu_daftar, count(waktu_daftar) as jumlah from (select date(tanggal_daftar) as waktu_daftar from sm_pendaftaran where pendaftaran_langsung = 0 and jenis_pendaftaran in ('Hemodialisa','Laboratorium','Radiologi') " . $addSQL . ") as x group by waktu_daftar";
        return $this->db->query($query);
        $this->db->close();
    }
}
