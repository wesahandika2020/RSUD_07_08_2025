<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kirim_data_online_model extends CI_Model
{

  function __construct()
  {
    parent::__construct();
    $this->datetime = date('Y-m-d H:i:s');
  }

  function getSummaryDataKlaim($search)
  {
    $param = "";

    if ($search["jenis_rawat"] !== "3") :
      $jenis_rawat = $search['jenis_rawat'];
      if ($jenis_rawat == "1") {
        $param .= " and ek.jenis_rawat = '1' ";
      } else if ($jenis_rawat == "2") {
        $param .= " and ek.jenis_rawat != '1' ";
      }
    endif;
    if ($search["jenis_tanggal"] !== "" && $search["tanggal_seacrh"] !== "") :
      if ($search["jenis_tanggal"] == "tgl_pulang") {
        $param .= " and pd.tanggal_keluar BETWEEN '" . date2mysql($search['tanggal_seacrh']) . " 00:00:00' AND '" . date2mysql($search['tanggal_seacrh']) . " 23:59:59'";
      } else if ($search["jenis_tanggal"] == "tgl_grouping") {
        $param .= " and ek.created_at BETWEEN '" . date2mysql($search['tanggal_seacrh']) . " 00:00:00' AND '" . date2mysql($search['tanggal_seacrh']) . " 23:59:59'";
      }
    endif;

    $select = " SELECT 
                COALESCE(SUM(CASE WHEN ek.status_bridging = 'final' THEN 1 ELSE 0 END), 0) AS belum_kirim,
                COALESCE(SUM(CASE WHEN ek.status_bridging = 'terkirim' THEN 1 ELSE 0 END), 0) AS terkirim,
                COALESCE(SUM(CASE WHEN ek.status_bridging = 'final' and ek.jenis_rawat = '1' THEN 1 ELSE 0 END), 0) AS ranap_final,
                COALESCE(SUM(CASE WHEN ek.status_bridging = 'final' and ek.jenis_rawat != '1' THEN 1 ELSE 0 END), 0) AS rajal_final,
                COALESCE(SUM(CASE WHEN ek.status_bridging = 'terkirim' and ek.jenis_rawat = '1' THEN 1 ELSE 0 END), 0) AS ranap_terkirim,
                COALESCE(SUM(CASE WHEN ek.status_bridging = 'terkirim' and ek.jenis_rawat != '1' THEN 1 ELSE 0 END), 0) AS rajal_terkirim ";

    $sql = "FROM sm_eklaim ek
            JOIN sm_pendaftaran pd ON ek.id_pendaftaran = pd.id
						WHERE pd.no_sep is not null " . $param;

    $query = $this->db->query($select . $sql)->row();
    $query->total_data = $query->belum_kirim + $query->terkirim;
    $query->total_ranap = $query->ranap_final + $query->ranap_terkirim;
    $query->total_rajal = $query->rajal_final + $query->rajal_terkirim;

    $result["data"] = $query;

    return $query;
  }

  function getListDataKlaim($limit, $start, $search)
  {
    $param = "";

    if ($search["jenis_rawat"] !== "3") :
      $jenis_rawat = $search['jenis_rawat'];
      if ($jenis_rawat == "1") {
        $param .= " and ek.jenis_rawat = '1' ";
      } else if ($jenis_rawat == "2") {
        $param .= " and ek.jenis_rawat != '1' ";
      }
    endif;
    if ($search["jenis_tanggal"] !== "" && $search["tanggal_seacrh"] !== "") :
      if ($search["jenis_tanggal"] == "tgl_pulang") {
        $param .= " and pd.tanggal_keluar BETWEEN '" . date2mysql($search['tanggal_seacrh']) . " 00:00:00' AND '" . date2mysql($search['tanggal_seacrh']) . " 23:59:59'";
      } else if ($search["jenis_tanggal"] == "tgl_grouping") {
        $param .= " and ek.created_at BETWEEN '" . date2mysql($search['tanggal_seacrh']) . " 00:00:00' AND '" . date2mysql($search['tanggal_seacrh']) . " 23:59:59'";
      }
    endif;

    $limitation = " limit " . $limit . " offset " . $start;
    $select = " SELECT ek.id, ek.id_pendaftaran, ek.jenis_rawat, to_char(pd.tanggal_daftar, 'YYYY-MM-DD') tgl_masuk,
                ek.nomor_sep, ek.nama_pasien, ek.nomor_rm, ge.cbg_code AS cbg, cmg->>'code' as special_cmg, 
                (prosedur_non_bedah + prosedur_bedah + konsultasi + tenaga_ahli + keperawatan + penunjang + radiologi + 
                laboratorium + pelayanan_darah + rehabilitasi + kamar + rawat_intensif + obat + obat_kronis + 
                obat_kemoterapi + alkes + bmhp + sewa_alat) as tarif_rs, ge.cbg_tarif AS tarif_klaim, 
                CASE WHEN ek.status_bridging = 'terkirim' THEN 'Terkirim' ELSE '-' END as status_klaim ";
    $count = "select count(*) ";

    $sql = "FROM sm_eklaim ek
            JOIN sm_pendaftaran pd ON ek.id_pendaftaran = pd.id
            LEFT JOIN sm_grouper_eklaim ge on ek.id = ge.id_eklaim
            LEFT JOIN LATERAL jsonb_array_elements(ge.special_cmg) AS cmg ON true

            WHERE pd.no_sep is not null
            AND ek.status_bridging in ('final','terkirim') " . $param;

    $order = " order by ek.tgl_masuk asc ";

    $query = $this->db->query($select . $sql . $order . $limitation)->result();

    $total_tarif_klaim = 0;
    $total_tarif_rs = 0;

    foreach ($query as $i => $value) :
      $total_tarif_klaim += $value->tarif_klaim;
      $total_tarif_rs += $value->tarif_rs;
    endforeach;

    $result["data"] = $query;
    $result["total_tarif_klaim"] = $total_tarif_klaim;
    $result["total_tarif_rs"] = $total_tarif_rs;
    $result["jumlah"] = $this->db->query($count . $sql)->row()->count;
    return $result;
  }
}
