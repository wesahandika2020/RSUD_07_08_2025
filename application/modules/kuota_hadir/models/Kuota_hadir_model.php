<?php
defined('BASEPATH') or exit('No direct script access allowed');

use \LZCompressor\LZString;

class Kuota_hadir_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('App_model', 'm_default');
        $this->date = date('Y-m-d');
        $this->datetime = date('Y-m-d H:i:s');
    }

    public function queryKuotaHadir($limit, $start, $search)
    {
        $param = "";

        $search["tanggal_awal"] !== "" ? $tanggal_awal = $search["tanggal_awal"] : $tanggal_awal = $this->date;
        $search["tanggal_akhir"] !== "" ? $tanggal_akhir = $search["tanggal_akhir"] : $tanggal_akhir = $this->date;
        $search["poliklinik"] !== "" ? $param .= " and sp.id = '" . $search["poliklinik"] . "' " : '';

        $query      = "";
        $limitation = "";
        if ($limit !== 0) :
            $limitation = " limit " . $limit . " offset " . $start;
        endif;

        $select = "select sp.id, coalesce(sp.nama, '- Tidak Pilih Poli -')nama , coalesce(bpjs.total,0)+coalesce(wa.total,0) total_seluruh, 
                coalesce(bpjs.onsite_checkin,0) antrian_onsite_sudah, 
                coalesce(bpjs.onsite_checkin_batal,0) antrian_onsite_sudah_batal, 
                coalesce(bpjs.onsite_booking,0) antrian_onsite_belum, 
                coalesce(bpjs.onsite,0) antrian_onsite, 
                coalesce(bpjs.mobile_checkin,0) antrian_mobile_sudah, 
                coalesce(bpjs.mobile_checkin_batal,0) antrian_mobile_sudah_batal, 
                coalesce(bpjs.mobile_booking,0) antrian_mobile_belum, 
                coalesce(bpjs.mobile,0) antrian_mobile, 
                coalesce(wa.sudah,0) antrian_wa_sudah, 
                coalesce(wa.belum,0) antrian_wa_belum, 
                coalesce(wa.total,0) antrian_wa ";

        $count  = "select count(*) as count from (select DISTINCT on (sp.nama) sp.* ";
        $sql = "from (select id, nama, is_klinik from sm_spesialisasi union select 0, null, '1' )sp
                left join (select case when ab.nama_poli is null then 0 else ab.nama_poli end nama_poli,
                sum ( case when ab.lokasi_data = 'rsud' then 1 else 0 end ) + sum ( case when ab.lokasi_data = 'mobile' then 1 else 0 end ) total, 
                sum ( case when ab.lokasi_data = 'rsud' then 1 else 0 end ) onsite, 
                sum ( case when ab.lokasi_data = 'mobile' then 1 else 0 end ) mobile, 
                sum ( case when ab.status = 'Booking' and ab.lokasi_data = 'rsud' then 1 else 0 end ) onsite_booking, 
                sum ( case when ab.status = 'Check In' and ab.id_pendaftaran is not null and ab.lokasi_data = 'rsud' then 1 else 0 end ) onsite_checkin,
                sum ( case when ab.status = 'Check In' and ab.id_pendaftaran is null and ab.lokasi_data = 'rsud' then 1 else 0 end ) onsite_checkin_batal,
                sum ( case when ab.status = 'Booking' and ab.lokasi_data = 'mobile' then 1 else 0 end ) mobile_booking,
                sum ( case when ab.status = 'Check In' and ab.id_pendaftaran is not null and ab.lokasi_data = 'mobile' then 1 else 0 end ) mobile_checkin,
                sum ( case when ab.status = 'Check In' and ab.id_pendaftaran is null and ab.lokasi_data = 'mobile' then 1 else 0 end ) mobile_checkin_batal
                from sm_antrian_bpjs ab where ab.status != 'Batal' and ab.tanggal_kunjungan between '" . date("Y/m/d", strtotime(str_replace('/', '-', $tanggal_awal))) . " 00:00:00' and '" . date("Y/m/d", strtotime(str_replace('/', '-', $tanggal_akhir))) . " 23:59:59'
                group by ab.nama_poli) bpjs on sp.id=bpjs.nama_poli
        
                left join (select id_unit_layanan, count(id) total,
                sum ( case when dilayani = 'Sudah' then 1 else 0 end ) sudah,
                sum ( case when dilayani = 'Belum' then 1 else 0 end ) belum
                from sm_pendaftaran_wa where tgl_kunjungan between '" . date("Y/m/d", strtotime(str_replace('/', '-', $tanggal_awal))) . " 00:00:00' and '" . date("Y/m/d", strtotime(str_replace('/', '-', $tanggal_akhir))) . " 23:59:59' GROUP BY id_unit_layanan) wa on sp.id=wa.id_unit_layanan
        
                where sp.is_klinik = '1' " . $param . "
                order by sp.nama asc ";

        $query = $this->db->query($select . $sql . $limitation)->result();

        $result = $query;
        foreach ($result as $i => $val) :

            $jumlah_kuota = "select coalesce(sum(jd.kuota), 0) kuota
                            from sm_jadwal_dokter jd
                            where jd.tanggal between '" . date("Y/m/d", strtotime(str_replace('/', '-', $tanggal_awal))) . " 00:00:00' and '" . date("Y/m/d", strtotime(str_replace('/', '-', $tanggal_akhir))) . " 23:59:59'
                            and jd.id_poli = '" . $val->id . "' ";

            $query_detail = "select pd.id, p.id no_rm, p.nama, 
                            case when lp.cara_bayar = 'Tunai' then lp.cara_bayar else concat(lp.cara_bayar, ' (', pj.nama, ')') end cara_bayar, 
                            pg.nama dokter, lp.tindak_lanjut status_keluar
                            
                            from sm_layanan_pendaftaran lp
                            join sm_pendaftaran pd on lp.id_pendaftaran = pd.id
                            join sm_pasien p on pd.id_pasien = p.id
                            join sm_tenaga_medis tm on lp.id_dokter = tm.id
                            join sm_pegawai pg on tm.id_pegawai = pg.id
                            join sm_penjamin pj on lp.id_penjamin = pj.id
                            
                            where lp.tanggal_layanan between '" . date("Y/m/d", strtotime(str_replace('/', '-', $tanggal_awal))) . " 00:00:00' and '" . date("Y/m/d", strtotime(str_replace('/', '-', $tanggal_akhir))) . " 23:59:59'
                            and lp.id_unit_layanan = '" . $val->id . "'";

            $result[$i]->kuota = $this->db->query($jumlah_kuota)->row()->kuota;
            $result[$i]->detail = $this->db->query($query_detail)->result();
        endforeach;

        $data["data"]       = $result;
        $data["jumlah"]     = $this->db->query($count . $sql . ") as jml")->row()->count;
        $this->db->close();

        return $data;
    }

    public function detailKuotaAntrian($id, $search)
    {
        $search["tanggal_awal"] !== "" ? $tanggal_awal = $search["tanggal_awal"] : $tanggal_awal = $this->date;
        $search["tanggal_akhir"] !== "" ? $tanggal_akhir = $search["tanggal_akhir"] : $tanggal_akhir = $this->date;

        $sql = "select * from sm_spesialisasi
                where id = '" . $id . "' ";

        $result = $this->db->query($sql)->result();
        foreach ($result as $i => $val) :

            $total_antrian = "select case when sp.nama is null then wa.poli else sp.nama end poli, 
                            case when an.jml is null then 0 else an.jml end + case when wa.jml is null then 0 else wa.jml end jml

                            from sm_spesialisasi sp
                            left join (
                            select bpjs.nama_poli,
                            count(lp.id_unit_layanan)  jml
                            from sm_antrian_bpjs bpjs
                            left join sm_pendaftaran pd on bpjs.id_pendaftaran=pd.id
                            join sm_layanan_pendaftaran lp on pd.id=lp.id_pendaftaran 
                            where bpjs.tanggal_kunjungan between '" . date("Y/m/d", strtotime(str_replace('/', '-', $tanggal_awal))) . " 00:00:00' and '" . date("Y/m/d", strtotime(str_replace('/', '-', $tanggal_akhir))) . " 23:59:59' 
                            and bpjs.nama_poli = '" . $val->id . "' 
                            and bpjs.status != 'Batal' and bpjs.id_pendaftaran is not null
                            group by bpjs.nama_poli) an on sp.id = an.nama_poli
                            
                            left join (select wa.id_unit_layanan id_poli, sp.nama poli, count(wa.id_unit_layanan) jml 
                            from sm_pendaftaran_wa wa
                            join sm_spesialisasi sp on wa.id_unit_layanan = sp.id
                            where wa.id_unit_layanan = '" . $val->id . "'
                            and wa.dilayani != 'Belum' and wa.tgl_kunjungan between '" . date("Y/m/d", strtotime(str_replace('/', '-', $tanggal_awal))) . " 00:00:00' and '" . date("Y/m/d", strtotime(str_replace('/', '-', $tanggal_akhir))) . " 23:59:59'
                            group by wa.id_unit_layanan, sp.nama) wa on sp.id = wa.id_poli
                            
                            where sp.id = '" . $val->id . "'";

            $total_layanan = "select (select nama from sm_spesialisasi where id=bpjs.nama_poli) poli,
                            count(lp.id) jml
                            
                            from sm_pendaftaran pd 
                            join sm_layanan_pendaftaran lp on pd.id=lp.id_pendaftaran
                            left join sm_antrian_bpjs bpjs on pd.id=bpjs.id_pendaftaran
                            where pd.tanggal_daftar between '" . date("Y/m/d", strtotime(str_replace('/', '-', $tanggal_awal))) . " 00:00:00' and '" . date("Y/m/d", strtotime(str_replace('/', '-', $tanggal_akhir))) . " 23:59:59'  
                            and lp.id_unit_layanan = '" . $val->id . "' 
                            group by bpjs.nama_poli";

            $result[$i]->list_antrian = $this->db->query($total_antrian)->result();
            $result[$i]->list_layanan = $this->db->query($total_layanan)->result();
        endforeach;

        $data["data"]       = $result;
        $this->db->close();

        return $data;
    }

    public function queryDashboardKuota()
    {
        $query      = "";
        $select = "select sp.nama, case when jd.id_poli is null then '0' else jd.id_poli end id_poli, 
                case when sp.id in ('14', '12', '45', '16', '17', '20', '21', '22', '48', '23', '27', '28', '29', '30', '32', '46', '37') then 'lt-1' when sp.id in ('11','13','56','47','50','55','24','25','44','26','40','31','51','33','34','35','36') then 'lt-4' else '0' end lantai,
                COALESCE(jd.kuota,0) kuota, COALESCE(jd.jml_kunjung,0) total_seluruh, COALESCE(jd.sisa,0) sisa ";

        $sql = "from sm_spesialisasi sp
            left join (select jd.id_poli, sum(jd.kuota) kuota, sum(jd.jml_kunjung) jml_kunjung, 
            sum(jd.kuota) - sum(jd.jml_kunjung) sisa FROM sm_jadwal_dokter jd
            where jd.tanggal='" . $this->date . "' 
            group by jd.id_poli) jd on sp.id=jd.id_poli
            where sp.is_klinik='1' and sp.id not in ('38','39','42','53','17','58')
            order by sp.nama asc ";

        $query = $this->db->query($select . $sql)->result_array();

        $data["data"]       = $query;
        $this->db->close();

        return $data;
    }
}
