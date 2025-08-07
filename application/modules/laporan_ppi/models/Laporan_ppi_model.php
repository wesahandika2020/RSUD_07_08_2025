<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Laporan_ppi_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->datetime = date('Y-m-d H:i:s');
    }

    public function list_laporan()
    {
        return array(
            ''      => '-- Pilih Laporan Bulanan PPI --',
            '1'     => 'Laporan Bulanan Data Pemakaian Alat dan Infeksi',
            '2'     => 'Rekapan Bulanan Data Pemakaian Kultur',
            '3'     => 'Rekapan Bulanan Data Pemakaian Antibiotik',
        );
    }

    public function getDataDropdownBangsal()
    {
        // $id_unit = "";
        if ($_SESSION['account_group'] == "Admin PPI" || $_SESSION['account_group'] == "Admin") {
            $id_unit = NULL;
        } else {
            $id_unit = $this->session->userdata("id_unit");
        }

        $where = " where is_active = 'Ya' ";
        if ($id_unit !== NULL) {
            if ($_SESSION['account_group'] == "Intensive Care") {
                $where .= " and keterangan = 'Intensive Care' ";
                // $where .= " and keterangan IN ('Intensive Care' , 'ISOLASI Covid 19') ";
            } else {
                $where .= " and id_unit = '" . $id_unit . "' ";
            }
        }

        $sql = "select id, nama from sm_bangsal " . $where . " order by nama";

        $bangsal = $this->db->query($sql)->result();
        if ($_SESSION['account_group'] == "Admin PPI" || $_SESSION['account_group'] == "Admin") {
            $data[""] = "Semua Bangsal...";
            foreach ($bangsal as $key => $value) {
                $data[$value->id] = $value->nama;
            }
        } else {
            foreach ($bangsal as $key => $value) {
                $data[$value->id] = $value->nama;
            }
        }

        return $data;
    }

    public function getDataPasienKeluar()
    {
        return array(
            ''          => '-- Semua Pasien --',
            'Sudah'     => 'Pasien Sudah Pulang',
            'Belum'     => 'Pasien Belum Pulang',
        );
    }

    public function getDataDropdownKultur()
    {
        $sql = "SELECT *
		FROM sm_kultur_ppi
        where id != '0'";

        $query = $this->db->query($sql)->result();
        $data =  array();
        $data[''] = '-- Semua Kultur --';
        foreach ($query as $key => $value) :
            $data[$value->id] = $value->nama;
        endforeach;

        return $data;
    }

    public function getDataDropdownAntiobika()
    {
        $sql = "SELECT *
		FROM sm_antiobika_ppi
        where id != '0'";

        $query = $this->db->query($sql)->result();
        $data =  array();
        $data[''] = '-- Semua Antiobika --';
        foreach ($query as $key => $value) :
            $data[$value->id] = $value->nama;
        endforeach;

        return $data;
    }

    private function get_periode_indo($bulan, $tahun)
    {
        if ($bulan == '01') {
            $periode = "Januari " . $tahun;
        } elseif ($bulan == '02') {
            $periode = "Februari " . $tahun;
        } elseif ($bulan == '03') {
            $periode = "Maret " . $tahun;
        } elseif ($bulan == '04') {
            $periode = "April " . $tahun;
        } elseif ($bulan == '05') {
            $periode = "Mei " . $tahun;
        } elseif ($bulan == '06') {
            $periode = "Juni " . $tahun;
        } elseif ($bulan == '07') {
            $periode = "Juli " . $tahun;
        } elseif ($bulan == '08') {
            $periode = "Agustus " . $tahun;
        } elseif ($bulan == '09') {
            $periode = "September " . $tahun;
        } elseif ($bulan == '10') {
            $periode = "Oktober " . $tahun;
        } elseif ($bulan == '11') {
            $periode = "November " . $tahun;
        } elseif ($bulan == '12') {
            $periode = "Desember " . $tahun;
        }

        return $periode;
    }

    public function getListDataLaporanBulanPPI($limit, $start, $search)
    {
        $param = "";

        if ($search["status_pasien"] === "Sudah") {
            $param .= " and pd.tanggal_keluar is not null ";
        } else if ($search["status_pasien"] === "Belum") {
            $param .= " and pd.tanggal_keluar is null ";
        }

        $search["bulan"] && $search["tahun"] !== null ? $param .= " and to_char(ppi.tanggal_input, 'yyyy-mm') = '" . $search["tahun"] . "-" . $search["bulan"] . "' " : "";

        $search["keyword"] !== "" ? $param .= " and (p.nama ilike '%" . $search["keyword"] . "%' or p.id ilike '%" . $search["keyword"] . "%') " : "";
        $search["kultur"] !== "" ? $param .= " and ppi.id_kultur = '" . $search["kultur"] . "' " : "";
        $search["antiobika"] !== "" ? $param .= " and ppi.id_antiobika = '" . $search["antiobika"] . "' " : "";
        $search["bangsal_search"] !== "" ? $param .= " and ppi.id_bangsal = '" . $search["bangsal_search"] . "' " : "";

        $limitation = "";
        if ($limit !== 0) :
            $limitation = " limit " . $limit . " offset " . $start;
        // $marge = array_slice($marge, $start, $limit);
        endif;

        $select = "select ppi.tanggal_input tanggal, count (ppi.id) jumlah_pasien, sum(ppi.ett::INT) sum_ett, 
                sum(ppi.cvl::INT) sum_cvl, sum(ppi.ivl::INT) sum_ivl, sum(ppi.uc::INT) sum_uc, 
                sum(ppi.tirah_baring::INT) sum_tirah_baring, sum(ppi.vap::INT) sum_vap, sum(ppi.iadp::INT) sum_iadp, 
                sum(ppi.isk::INT) sum_isk, sum(ppi.dekubitus::INT) sum_dekubitus, sum(ppi.plebitis::INT) sum_plebitis, 
                sum(ppi.operasi::INT) sum_operasi, sum(ppi.ido::INT) sum_ido ";

        $count  = "select count(*) as count from ( " . $select;
        $sql    = "FROM sm_form_ppi as ppi
                JOIN sm_layanan_pendaftaran as lp on ppi.id_layanan_pendaftaran = lp.id
                JOIN sm_pendaftaran as pd on lp.id_pendaftaran = pd.id
                JOIN sm_pasien as p on pd.id_pasien = p.id 
                WHERE ppi.id is not null " . $param;

        $group_by = " group by ppi.tanggal_input ";
        $order = " order by ppi.tanggal_input asc ";

        // if ($limit !== 0) :
        //     $limitation = " limit " . $limit . " offset " . $start;
        // // $marge = array_slice($marge, $start, $limit);
        // endif;

        $result = $this->db->query($select . $sql . $group_by . $order . $limitation)->result();
        foreach ($result as $i => $val) :
            $select_kultur = "select count(dppi.id) as count ";
            $select_antiobika = "select count(dppi.id) as count ";

            $query = "FROM sm_detail_form_ppi dppi
            JOIN sm_form_ppi ppi ON dppi.id_ppi = ppi.ID 
            JOIN sm_layanan_pendaftaran as lp on ppi.id_layanan_pendaftaran = lp.id
            JOIN sm_pendaftaran as pd on lp.id_pendaftaran = pd.id
            JOIN sm_pasien as p on pd.id_pasien = p.id 

            WHERE ppi.tanggal_input = '" . $val->tanggal . "' " . $param;

            $result[$i]->count_kultur = $this->db->query($select_kultur . $query . " AND dppi.id_kultur is not null ")->row()->count;
            $result[$i]->count_antiobika = $this->db->query($select_antiobika . $query . " AND dppi.id_antiobika is not null ")->row()->count;
        endforeach;

        $search["bangsal_search"] !== "" ? $unit = $this->db->where('id', $search['bangsal_search'], true)->select('nama')->get('sm_bangsal')->row()->nama :  $unit = "Semua Unit";

        $data["unit"]       = $unit;
        $data["periode"]    = $this->get_periode_indo($search["bulan"], $search["tahun"]);
        $data["data"]       = $result;
        $data["jumlah"]     = $this->db->query($count . $sql . $group_by . ") as jml")->row()->count;
        $this->db->close();

        return $data;
    }

    public function getListDataLaporanKultur($limit, $start, $search)
    {
        $param = "";

        if ($search["status_pasien"] === "Sudah") {
            $param .= " and pd.tanggal_keluar is not null ";
        } else if ($search["status_pasien"] === "Belum") {
            $param .= " and pd.tanggal_keluar is null ";
        }

        $search["bulan"] && $search["tahun"] !== null ? $param .= " and to_char(ppi.tanggal_input, 'yyyy-mm') = '" . $search["tahun"] . "-" . $search["bulan"] . "' " : "";

        $search["keyword"] !== "" ? $param .= " and (p.nama ilike '%" . $search["keyword"] . "%' or p.id ilike '%" . $search["keyword"] . "%') " : "";
        // $search["kultur"] !== "" ? $param .= " and dppi.id_kultur = '" . $search["kultur"] . "' " : "";
        // $search["antiobika"] !== "" ? $param .= " and ppi.id_antiobika = '" . $search["antiobika"] . "' " : "";
        $search["bangsal_search"] !== "" ? $param .= " and ppi.id_bangsal = '" . $search["bangsal_search"] . "' " : "";

        $limitation = "";
        if ($limit !== 0) :
            $limitation = " limit " . $limit . " offset " . $start;
        // $marge = array_slice($marge, $start, $limit);
        endif;

        $select = "select ppi.tanggal_input as tanggal, count(ppi.id) jumlah_pasien ";
        $count  = "select count(*) as count from ( " . $select;

        $sql    = "from sm_form_ppi ppi
                join sm_layanan_pendaftaran as lp on ppi.id_layanan_pendaftaran = lp.id
                join sm_pendaftaran as pd on lp.id_pendaftaran = pd.id
                join sm_pasien as p on pd.id_pasien = p.id
                where ppi.id is not null " . $param;

        $group_by = " group by ppi.tanggal_input ";
        $order = " order by ppi.tanggal_input asc ";

        $result = $this->db->query($select . $sql . $group_by . $order . $limitation)->result();
        $kultur = $this->db->select(' id, nama')->from('sm_kultur_ppi')->order_by('id', 'asc')->get()->result();
        $param = "";
        foreach ($result as $i => $val) :

            if ($search["status_pasien"] === "Sudah") {
                $param .= " and pd.tanggal_keluar is not null ";
            } else if ($search["status_pasien"] === "Belum") {
                $param .= " and pd.tanggal_keluar is null ";
            }
    
            $search["bulan"] && $search["tahun"] !== null ? $param .= " and to_char(ppi.tanggal_input, 'yyyy-mm') = '" . $search["tahun"] . "-" . $search["bulan"] . "' " : "";
    
            $search["keyword"] !== "" ? $param .= " and (p.nama ilike '%" . $search["keyword"] . "%' or p.id ilike '%" . $search["keyword"] . "%') " : "";
            $search["kultur"] !== "" ? $param .= " and dppi.id_kultur = '" . $search["kultur"] . "' " : "";
            $search["bangsal_search"] !== "" ? $param .= " and ppi.id_bangsal = '" . $search["bangsal_search"] . "' " : "";
            
            $query_count = "SELECT COUNT ( dppi.id_kultur ) count_kultur
                        FROM sm_detail_form_ppi dppi
                        JOIN sm_form_ppi ppi ON dppi.id_ppi = ppi.
                        ID JOIN sm_layanan_pendaftaran AS lp ON ppi.id_layanan_pendaftaran = lp.
                        ID JOIN sm_pendaftaran AS pd ON lp.id_pendaftaran = pd.
                        ID JOIN sm_pasien AS P ON pd.id_pasien = P.ID 
                        WHERE dppi.id_kultur IS NOT NULL 
                        AND to_char( ppi.tanggal_input, 'yyyy-mm-dd' ) = '$val->tanggal' " . $param;

            foreach ($kultur as $value) :
                $count_kultur = $this->db->query($query_count . "AND dppi.id_kultur = '" . $value->id . "' ")->row()->count_kultur;
                $result[$i]->{'kultur_' . $value->id} = $count_kultur;
            endforeach;
        endforeach;

        $array_header = array(
            "tanggal"       => "Tanggal",
            "jumlah_pasien" => "Jumlah Pasien",
        );

        $kultur = $this->db->select(' id, nama')->from('sm_kultur_ppi')->order_by('id', 'asc')->get()->result();
        $param = "";
        foreach ($kultur as $i => $row) :
            $array_header["kultur_" . $row->id] = $row->nama;
            
            if ($search["status_pasien"] === "Sudah") {
                $param .= " and pd.tanggal_keluar is not null ";
            } else if ($search["status_pasien"] === "Belum") {
                $param .= " and pd.tanggal_keluar is null ";
            }
    
            $search["bulan"] && $search["tahun"] !== null ? $param .= " and to_char(ppi.tanggal_input, 'yyyy-mm') = '" . $search["tahun"] . "-" . $search["bulan"] . "' " : "";
    
            $search["keyword"] !== "" ? $param .= " and (p.nama ilike '%" . $search["keyword"] . "%' or p.id ilike '%" . $search["keyword"] . "%') " : "";
            $search["kultur"] !== "" ? $param .= " and dppi.id_kultur = '" . $search["kultur"] . "' " : "";
            $search["bangsal_search"] !== "" ? $param .= " and ppi.id_bangsal = '" . $search["bangsal_search"] . "' " : "";

            $select_grafik = "select count(dppi.id_kultur) jumlah
                        from sm_detail_form_ppi dppi 
                        join sm_form_ppi ppi on dppi.id_ppi = ppi.id 
                        join sm_layanan_pendaftaran as lp on ppi.id_layanan_pendaftaran = lp.id
                        join sm_pendaftaran as pd on lp.id_pendaftaran = pd.id
                        join sm_pasien as p on pd.id_pasien = p.id 
                        
                        where dppi.id_kultur is not null  
                        and dppi.id_kultur = '" . $row->id . "' " . $param;
            $kultur[$i]->jumlah = $this->db->query($select_grafik)->row()->jumlah;
        endforeach;


        $search["bangsal_search"] !== "" ? $unit = $this->db->where('id', $search['bangsal_search'], true)->select('nama')->get('sm_bangsal')->row()->nama :  $unit = "Semua Unit";

        $data["unit"]       = $unit;
        $data["periode"]    = $this->get_periode_indo($search["bulan"], $search["tahun"]);
        $data["header"]     = $array_header;
        $data["detail"]     = $result;
        $data["kultur"]     = $kultur;
        $data["jumlah"]     = $this->db->query($count . $sql . $group_by . ") as jml")->row()->count;
        $this->db->close();

        return $data;
    }

    public function getListDataLaporanAntiobika($limit, $start, $search)
    {
        $param = "";

        if ($search["status_pasien"] === "Sudah") {
            $param .= " and pd.tanggal_keluar is not null ";
        } else if ($search["status_pasien"] === "Belum") {
            $param .= " and pd.tanggal_keluar is null ";
        }

        $search["bulan"] && $search["tahun"] !== null ? $param .= " and to_char(ppi.tanggal_input, 'yyyy-mm') = '" . $search["tahun"] . "-" . $search["bulan"] . "' " : "";

        $search["keyword"] !== "" ? $param .= " and (p.nama ilike '%" . $search["keyword"] . "%' or p.id ilike '%" . $search["keyword"] . "%') " : "";
        // $search["antiobika"] !== "" ? $param .= " and dppi.id_antiobika = '" . $search["antiobika"] . "' " : "";
        // $search["antiobika"] !== "" ? $param .= " and ppi.id_antiobika = '" . $search["antiobika"] . "' " : "";
        $search["bangsal_search"] !== "" ? $param .= " and ppi.id_bangsal = '" . $search["bangsal_search"] . "' " : "";

        $limitation = "";
        if ($limit !== 0) :
            $limitation = " limit " . $limit . " offset " . $start;
        // $marge = array_slice($marge, $start, $limit);
        endif;

        $select = "select ppi.tanggal_input as tanggal, count(ppi.id) jumlah_pasien ";
        $count  = "select count(*) as count from ( " . $select;

        $sql    = "from sm_form_ppi ppi
                join sm_layanan_pendaftaran as lp on ppi.id_layanan_pendaftaran = lp.id
                join sm_pendaftaran as pd on lp.id_pendaftaran = pd.id
                join sm_pasien as p on pd.id_pasien = p.id
                where ppi.id is not null " . $param;

        $group_by = " group by ppi.tanggal_input ";
        $order = " order by ppi.tanggal_input asc ";

        $result = $this->db->query($select . $sql . $group_by . $order . $limitation)->result();
        $antiobika = $this->db->select(' id, nama')->from('sm_antiobika_ppi')->order_by('id', 'asc')->get()->result();
        $param = "";
        foreach ($result as $i => $val) :

            if ($search["status_pasien"] === "Sudah") {
                $param .= " and pd.tanggal_keluar is not null ";
            } else if ($search["status_pasien"] === "Belum") {
                $param .= " and pd.tanggal_keluar is null ";
            }
    
            $search["bulan"] && $search["tahun"] !== null ? $param .= " and to_char(ppi.tanggal_input, 'yyyy-mm') = '" . $search["tahun"] . "-" . $search["bulan"] . "' " : "";
    
            $search["keyword"] !== "" ? $param .= " and (p.nama ilike '%" . $search["keyword"] . "%' or p.id ilike '%" . $search["keyword"] . "%') " : "";
            $search["antiobika"] !== "" ? $param .= " and dppi.id_antiobika = '" . $search["antiobika"] . "' " : "";
            $search["bangsal_search"] !== "" ? $param .= " and ppi.id_bangsal = '" . $search["bangsal_search"] . "' " : "";
            
            $query_count = "SELECT COUNT ( dppi.id_antiobika ) count_antiobika
                        FROM sm_detail_form_ppi dppi
                        JOIN sm_form_ppi ppi ON dppi.id_ppi = ppi.
                        ID JOIN sm_layanan_pendaftaran AS lp ON ppi.id_layanan_pendaftaran = lp.
                        ID JOIN sm_pendaftaran AS pd ON lp.id_pendaftaran = pd.
                        ID JOIN sm_pasien AS P ON pd.id_pasien = P.ID 
                        WHERE dppi.id_antiobika IS NOT NULL 
                        AND to_char( ppi.tanggal_input, 'yyyy-mm-dd' ) = '$val->tanggal' " . $param;

            foreach ($antiobika as $value) :
                $count_antiobika = $this->db->query($query_count . "AND dppi.id_antiobika = '" . $value->id . "' ")->row()->count_antiobika;
                $result[$i]->{'antiobika_' . $value->id} = $count_antiobika;
            endforeach;
        endforeach;

        $array_header = array(
            "tanggal"       => "Tanggal",
            "jumlah_pasien" => "Jumlah Pasien",
        );

        $antiobika = $this->db->select(' id, nama')->from('sm_antiobika_ppi')->order_by('id', 'asc')->get()->result();
        $param = "";
        foreach ($antiobika as $i => $row) :
            $array_header["antiobika_" . $row->id] = $row->nama;
            
            if ($search["status_pasien"] === "Sudah") {
                $param .= " and pd.tanggal_keluar is not null ";
            } else if ($search["status_pasien"] === "Belum") {
                $param .= " and pd.tanggal_keluar is null ";
            }
    
            $search["bulan"] && $search["tahun"] !== null ? $param .= " and to_char(ppi.tanggal_input, 'yyyy-mm') = '" . $search["tahun"] . "-" . $search["bulan"] . "' " : "";
    
            $search["keyword"] !== "" ? $param .= " and (p.nama ilike '%" . $search["keyword"] . "%' or p.id ilike '%" . $search["keyword"] . "%') " : "";
            $search["antiobika"] !== "" ? $param .= " and dppi.id_antiobika = '" . $search["antiobika"] . "' " : "";
            $search["bangsal_search"] !== "" ? $param .= " and ppi.id_bangsal = '" . $search["bangsal_search"] . "' " : "";

            $select_grafik = "select count(dppi.id_antiobika) jumlah
                        from sm_detail_form_ppi dppi 
                        join sm_form_ppi ppi on dppi.id_ppi = ppi.id 
                        join sm_layanan_pendaftaran as lp on ppi.id_layanan_pendaftaran = lp.id
                        join sm_pendaftaran as pd on lp.id_pendaftaran = pd.id
                        join sm_pasien as p on pd.id_pasien = p.id 
                        
                        where dppi.id_antiobika is not null  
                        and dppi.id_antiobika = '" . $row->id . "' " . $param;
            $antiobika[$i]->jumlah = $this->db->query($select_grafik)->row()->jumlah;
        endforeach;


        $search["bangsal_search"] !== "" ? $unit = $this->db->where('id', $search['bangsal_search'], true)->select('nama')->get('sm_bangsal')->row()->nama :  $unit = "Semua Unit";

        $data["unit"]       = $unit;
        $data["periode"]    = $this->get_periode_indo($search["bulan"], $search["tahun"]);
        $data["header"]     = $array_header;
        $data["detail"]     = $result;
        $data["antiobika"]     = $antiobika;
        $data["jumlah"]     = $this->db->query($count . $sql . $group_by . ") as jml")->row()->count;
        $this->db->close();

        return $data;
    }
}
