<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Status_keluar_pasien_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->datetime = date('Y-m-d H:i:s');
    }

    function getTempatLayanan($q, $key, $start, $limit)
    {
        $limit  = " limit " . $limit . " offset " . $start;
        $select = "select id, nama ";
        $count  = "select count(id) as count ";
        $sqlRj  = "";

        $q == 'rawat_jalan' ?    $sql = "FROM sm_spesialisasi where is_klinik='1' and nama ilike ('%$key%')" : '';
        $q == 'rawat_jalan' ?    $sqlRj= " union select 0, 'IGD'" : '';
        $q == 'rawat_inap' ?     $sql = "FROM sm_bangsal where is_active='Ya' and nama ilike ('%$key%')" : '';
        $q == 'penunjang' ?      $sql = "FROM sm_bangsal where id is null " : ''; // BELUM SELESAI
        $q == 'ipj' ?      		 $sql = "FROM sm_bangsal where id is null " : ''; // BELUM SELESAI
		
        $order = "order by nama asc";   

        $data['data'] = $this->db->query($select . $sql . $sqlRj . $order . $limit )->result();
        $data['total'] = $this->db->query($count . $sql)->row()->count;
        return $data;
    }

    public function getListPemeriksaan($limit, $start, $search)
    {
        $param = "";

        if ($search["tanggal_awal"] !== "" & $search["tanggal_akhir"] !== "") {
            $param .= " and lpd.tanggal_layanan BETWEEN '" . date2mysql($search['tanggal_awal']) . " 00:00:00' AND '" . date2mysql($search['tanggal_akhir']) . " 23:59:59'";
        }
        $search["no_register"] !== "" ? $param .= " and pd.no_register = '" . $search["no_register"] . "' " : '';
        $search["no_rm"] !== ""       ? $param .= " and p.id ilike '%" . $search["no_rm"] . "' "            : '';
        $search["nik"] !== ""         ? $param .= " and p.no_identitas ilike '%" . $search["nama"] . "%' "  : '';
        $search["nama"] !== ""        ? $param .= " and p.nama ilike '%" . $search["nama"] . "%' "          : '';
        $search["dokter"] !== ""      ? $param .= " and lp.id_dokter = '" . $search["dokter"] . "' "        : '';
        $search["cara_bayar"] !== ""  ? $param .= " and lp.cara_bayar = '" . $search["cara_bayar"] . "' "   : '';
        $search["penjamin"] !== ""    ? $param .= " and lp.id_penjamin = '" . $search["penjamin"] . "' "    : '';
        
        if ($search["tempat_layanan"] !== "") {
            if ($search["tempat_layanan"] == "0") {
                $param .= " and pd.jenis_pendaftaran = 'IGD' ";
            } else {
                $param .= " and lpd.id_unit_layanan = '" . $search["tempat_layanan"] . "' ";
            }
        }   

        if ($search["filter"] !== "") {
                   if ($search["filter"] == "belum") { $param .= " and lpd.tindak_lanjut is null ";
            } else if ($search["filter"] == "sudah") { $param .= " and lpd.tindak_lanjut is not null ";
            } else if ($search["filter"] == "cco")   { $param .= " and lpd.tindak_lanjut ilike ('%cco sementara%') "; }
        }

               if ($search["jenis_layanan"] === "rawat_jalan") { $param .= " and lpd.jenis_layanan in ('Poliklinik','IGD','Medical Check Up') and pd.jenis_rawat='Jalan'";
        } else if ($search["jenis_layanan"] === "rawat_inap") {  $param .= " and lpd.jenis_layanan in ('Rawat Inap','IGD','Intensive Care') and pd.jenis_rawat='Inap'";
        } else if ($search["jenis_layanan"] === "penunjang") {   $param .= " and lpd.jenis_layanan in ('Laboratorium','Radiologi','Hemodialisa') ";		
        } else if ($search["jenis_layanan"] === "ipj") {   $param .= " and lpd.jenis_layanan in ('Pemulasaran Jenazah') ";
        }

        $search_jenis_layanan = $search["jenis_layanan"];
        $search_filter        = $search["filter"];

        $select = " select DISTINCT ON (lpd.id) lpd.id,lpd.id_pendaftaran, '" . $search_jenis_layanan . "' as search_jenis_layanan, '" . $search_filter . "' search_filter,
                    pd.no_register,pd.tanggal_daftar,pd.tanggal_keluar, lpd.tanggal_layanan,   CONCAT_WS(' ', p.nama, COALESCE(p.status_pasien, '')) as nama,
                    p.id as id_pasien,pd.jenis_pendaftaran, lpd.jenis_layanan, (select nama from sm_spesialisasi where id=lpd.id_unit_layanan) nama_layanan,
                    lpd.id_dokter, pg.nama dokter,lpd.cara_bayar, pj.nama penjamin,lpd.status_terlayani, lpd.tindak_lanjut,lpd.id_penjamin  ";

        $count = "select count(*) as count from (select DISTINCT ON (lpd.id ) lpd.id ";

        $sql =" from sm_pendaftaran as pd 
                 left join sm_layanan_pendaftaran lpd on pd.id=lpd.id_pendaftaran
                 left join sm_pasien as p on p.id = pd.id_pasien
                 left join sm_tenaga_medis tm on lpd.id_dokter=tm.id
	             left join sm_pegawai pg on tm.id_pegawai=pg.id
                 left join sm_penjamin pj on lpd.id_penjamin=pj.id
                 where lpd.id is not null " . $param . "  ";

        $limitation = " limit " . $limit . " offset " . $start;
        // echo $select . $sql . $order . $limitation; die;
        
        $result["data"]   = $this->db->query($select . $sql . $limitation)->result();
        $result["jumlah"] = $this->db->query($count . $sql . ") as jml")->row()->count;
        return $result;
    }

}   