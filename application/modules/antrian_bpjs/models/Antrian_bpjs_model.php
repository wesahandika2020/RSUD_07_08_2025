<?php
defined('BASEPATH') or exit('No direct script access allowed');
use \LZCompressor\LZString;

class Antrian_bpjs_model extends CI_Model
{
    private $timestamp;

    function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('App_model', 'm_default');
        $this->bpjs_config = $this->getConfigBPJSV2();
        $this->timestamp = strval(time());
        $this->datetime = date('Y-m-d H:i:s');
    }


    private function sqlPendaftaranAntrean($search)
    {
        date_default_timezone_set('Asia/Jakarta');

        $this->db->select("ab.*, sp.nama as poli, pg.nama as nama_dokter", false);

        $this->db->from('sm_antrian_bpjs as ab')
            ->join('sm_spesialisasi as sp', 'sp.id = ab.nama_poli', 'left')
            ->join('sm_translucent as cr', 'cr.id = ab.user_create', 'left')
            ->join('sm_translucent as ur', 'ur.id = ab.user_update', 'left')
            ->join('sm_tenaga_medis as tm', 'tm.id = ab.id_dokter', 'left')
            ->join('sm_pegawai as pg', 'pg.id = tm.id_pegawai', 'left');
            
        
        if ($search['kode_booking_bpjs'] !== '') :
            $this->db->where('ab.kode_booking', $search['kode_booking_bpjs'], true);
        endif;

        if ($search['no_antrean_bpjs'] !== '') :
            $this->db->where('ab.nomor_antrean', $search['no_antrean_bpjs'], true);
        endif;

        if ($search['loket'] !== '' && $search['loket'] !== 'undefined') :
            $this->db->where('ab.huruf_antrean', $search['loket'], true);
        endif;

        if ($search['nik_bpjs'] !== '') :
            $this->db->where('ab.nik', $search['nik_bpjs'], true);
        endif;


        $this->db->where('ab.tanggal_kunjungan', date('Y-m-d'), true);
        $this->db->where('ab.pasien_hadir', 'Hadir');
        $this->db->where('ab.status !=', 'Batal');
        $this->db->where('ab.id_pendaftaran', null);

        return $this->db->order_by('ab.id', 'asc');
    }

    private function _listPendaftaranAntrean($limit, $start, $search)
    {
        $this->sqlPendaftaranAntrean($search);
        if ((int)$limit !== 0) :
            $this->db->limit((int)$limit, (int)$start);
        endif;

        return $this->db->get()->result();
    }

    function getAntreanListData($limit, $start, $search)
    {
        $data['data'] = $this->_listPendaftaranAntrean((int)$limit, (int)$start, $search);
        $data['jumlah'] = $this->sqlPendaftaranAntrean($search)->get()->num_rows();

        $this->db->close();
        
        return $data;
        
    }

    function getListBookingPasien($kodebooking)
    {
        $this->db->select("ab.*, sp.nama as nama, sp.tanggal_lahir as tgllahir, sp.alamat, ss.nama as poli, pg.nama as pegawai", false);

        $this->db->from('sm_antrian_bpjs as ab')
            ->join('sm_pasien as sp', 'sp.id = ab.no_rm', 'left')
            ->join('sm_pendaftaran as pd', 'pd.id = ab.id_pendaftaran', 'left')
            ->join('sm_spesialisasi as ss', 'ss.id = ab.nama_poli', 'left')
            ->join('sm_tenaga_medis as tm', 'tm.id = ab.id_dokter', 'left')
            ->join('sm_pegawai as pg', 'pg.id = tm.id_pegawai', 'left')
            ->join('sm_surat_kontrol as sk', 'sk.id = ab.id_skd', 'left')
            ->join('sm_translucent as st', 'st.id = ab.user_create', 'left')
            ->where('ab.kode_booking', $kodebooking);

            return $this->db->get()->row();

        $this->db->close();
    }

    function getDataPasien($kodebooking)
    {
        $this->db->select("sp.id, sp.status_finger, sp.tgl_bridging", false);

        $this->db->from('sm_antrian_bpjs as ab')
            ->join('sm_pasien as sp', 'sp.id = ab.no_rm', 'left')
            ->where('ab.kode_booking', $kodebooking);

            return $this->db->get()->row();

        $this->db->close();
    }

    function getDaftarBookingPasien($kodebooking)
    {
        date_default_timezone_set('Asia/Jakarta');
        $this->db->select("ab.*, sp.nama as nama, sp.tanggal_lahir as tgllahir, sp.alamat, ss.nama as poli, pg.nama as pegawai", false);

        $this->db->from('sm_antrian_bpjs as ab')
            ->join('sm_pasien as sp', 'sp.id = ab.no_rm', 'left')
            ->join('sm_pendaftaran as pd', 'pd.id = ab.id_pendaftaran', 'left')
            ->join('sm_spesialisasi as ss', 'ss.id = ab.nama_poli', 'left')
            ->join('sm_tenaga_medis as tm', 'tm.id = ab.id_dokter', 'left')
            ->join('sm_pegawai as pg', 'pg.id = tm.id_pegawai', 'left')
            ->join('sm_surat_kontrol as sk', 'sk.id = ab.id_skd', 'left')
            ->join('sm_translucent as st', 'st.id = ab.user_create', 'left')
            ->where('ab.kode_booking', $kodebooking);

            $this->db->where('ab.tanggal_kunjungan', date('Y-m-d'));

            return $this->db->get()->row();

        $this->db->close();
    }

    function checkId($id)
    {
        
        $this->db->select("ab.id, ab.id_skd, ab.id_pendaftaran, ab.status_jkn, ab.jenis_bayar, skt.id_pendaftaran as iddaftarasal, ab.no_kartu, ab.kode_bpjs_dokter, ab.huruf_antrean, ab.kode_bpjs_poli, ab.no_sep_asal, ab.no_rm, ab.nama_poli, ab.id_poli_asal, ab.tanggal_kunjungan, ab.no_referensi, ab.rujukanawal, ab.nama_dokter, spj.nama as penjamin, ab.id_poli_rujukan, ab.is_kontrol_pasca_ranap, skt.id_skb, jd.shift_poli", false)
            ->from('sm_antrian_bpjs as ab')
            ->join('sm_penjamin as spj', 'spj.id = ab.id_penjamin', 'left')
            ->join('sm_surat_kontrol as skt', 'skt.id = ab.id_skd', 'left')
            ->join('sm_jadwal_dokter as jd', 'jd.id = ab.id_jadwal_dokter', 'left')
            ->where('ab.id', $id);

            return $this->db->get()->row();

        $this->db->close();
            
        
    }

    function cekSuratKontrolBpjs($id)
    {
        
        $this->db->select("ssb.no_surat", false)
            ->from('sm_surat_kontrol_bpjs as ssb')
            ->where('ssb.id', $id);

            return $this->db->get()->row();

        $this->db->close();
            
    }

    function cekDiagnosaKontrol($id)
    {
        
        $this->db->select("sd.*, gss.kode_icdx as diag_auto, gsatu.kode_icdx as diag_manual", false)
            ->from('sm_surat_kontrol as sk')
            ->join('sm_diagnosa as sd', 'sd.id_layanan_pendaftaran = sk.id_layanan_pendaftaran', 'left')
            ->join('sm_golongan_sebab_sakit as gss', 'gss.id = sd.id_golongan_sebab_sakit', 'left')
            ->join('sm_golongan_sebab_sakit as gsatu', 'gss.id = sd.id_pengkodean', 'left')
            ->where('sd.prioritas', 'Utama')
            ->where('sk.id', $id);

            return $this->db->get()->row();

        $this->db->close();
            
    }

    function cekDataSuratKontrol($nosurat)
    {
        
        $this->db->select("ssk.id", false)
            ->from('sm_surat_kontrol as ssk')
            ->join('sm_surat_kontrol_bpjs as ssb', 'ssb.id_pendaftaran_asal = ssk.id_pendaftaran', 'left')
            ->where('ssb.no_surat', $nosurat);

            return $this->db->get()->row();

        $this->db->close();
            
    }

    function cekHistorySep($id_pendaftaran)
    {
        
        $this->db->select("hs.*")
            ->from('sm_history_sep as hs')
            ->where('hs.id_pendaftaran', $id_pendaftaran);

            return $this->db->get()->row();

        $this->db->close();
            
        
    }

    function checkJadwal($nama, $tanggal)
    {
        $this->db->select("jd.nama_dokter")
            ->from('sm_jadwal_dokter as jd')
            ->where('jd.nama_dokter', $nama);

            $this->db->where('jd.tanggal', $tanggal, true);
            
            return $this->db->get()->row();

        $this->db->close();
            
        
    }

    function dataPasien($id)
    {
        
        $this->db->select("ab.*, sso.kode_bpjs, sp.tanggal_lahir as tgllahir, sp.telp, sp.no_identitas as nik_pasien, sp.no_kab, pd.nik_pjwb, pd.nama_pjwb, pd.kelamin_pjwb, pd.telp_pjwb, pd.alamat_pjwb, pd.nik_pjwb_finansial, pd.nama_pjwb_finansial, pd.kelamin_pjwb_finansial, pd.telp_pjwb_finansial, pd.alamat_pjwb_finansial, sp.rm_lama, sp.nama as nama, ss.nama as poli, pg.nama as pegawai, spp.no_polish, spj.nama as penjamin", false)
            ->from('sm_antrian_bpjs as ab')
            ->join('sm_pasien as sp', 'sp.id = ab.no_rm', 'left')
            // ->join('sm_layanan_pendaftaran as lp', 'lp.id = sb.id_layanan_pendaftaran', 'left')
            ->join('sm_pendaftaran as pd', 'pd.id = ab.id_pendaftaran', 'left')
            ->join('sm_spesialisasi as ss', 'ss.id = ab.nama_poli', 'left')
            ->join('sm_spesialisasi as sso', 'sso.id = ab.nama_poli', 'left')
            ->join('sm_tenaga_medis as tm', 'tm.id = ab.id_dokter', 'left')
            ->join('sm_pegawai as pg', 'pg.id = tm.id_pegawai', 'left')
            ->join('sm_penjamin as spj', 'spj.id = ab.id_penjamin', 'left')
            ->join('sm_penjamin_pasien as spp', 'spp.id_pasien = ab.no_rm', 'left')
            ->join('sm_surat_kontrol as sk', 'sk.id = ab.id_skd', 'left')
            ->join('sm_translucent as st', 'st.id = ab.user_create', 'left')
            ->where('ab.id', $id);

            return $this->db->get()->row();

        $this->db->close();
            
        
    }

    function tambahCetakAntrean($id = 0) 
    {
        $print_number = 0;
        $data = $this->db->where('id', $id, true)->select('cetak')->get('sm_antrian_bpjs')->row();
        if (0 < count((array)$data)) :
            $status = true;
            $print_number = $data->cetak + 1;
            $data_update = array('cetak' => $print_number);
            $this->db->where('id', $id, true)->update('sm_antrian_bpjs', $data_update);
        else :
            $status = false;
        endif;

        return array('status' => $status, 'cetakan' => $print_number);
    }

    private function sqlDataAntrianBPJS($search)
    {
        $this->db->select("ab.*, sp.nama as poli, pg.nama as nama_dokter", false);

        $this->db->from('sm_antrian_bpjs as ab')
            ->join('sm_spesialisasi as sp', 'sp.id = ab.nama_poli', 'left')
            ->join('sm_translucent as cr', 'cr.id = ab.user_create', 'left')
            ->join('sm_translucent as ur', 'ur.id = ab.user_update', 'left')
            ->join('sm_tenaga_medis as tm', 'tm.id = ab.id_dokter', 'left')
            ->join('sm_pegawai as pg', 'pg.id = tm.id_pegawai', 'left')
            ->where('ab.id is not null');
            
        
        if (($search['tanggal_awal'] !== '') & ($search['tanggal_akhir'] !== '')) :
            $this->db->where("ab.tanggal_kunjungan BETWEEN '" . date2mysql($search['tanggal_awal']) . " 00:00:00' AND '" . date2mysql($search['tanggal_akhir']) . " 23:59:59'");
        endif;

        if ($search['no_kode_booking'] !== '') :
            $this->db->where('ab.kode_booking', $search['no_kode_booking'], true);
        endif;

        if ($search['no_antrean'] !== '') :
            $this->db->like('ab.nomor_antrean', $search['no_antrean'], true);
        endif;

        if ($search['nm_poli'] !== '') :
            $this->db->where('ab.nama_poli', $search['nm_poli'], true);
        endif;

        if ($search['nm_dokter'] !== '') :
            $this->db->like('ab.id_dokter', $search['nm_dokter'], true);
        endif;

        if ($search['status_antrean'] !== '') :
            $this->db->where('ab.status', $search['status_antrean'], true);
        endif;

        if ($search['no_kartu'] !== '') :
            $this->db->where('ab.no_kartu', $search['no_kartu'], true);
        endif;

        if ($search['filter'] !== '') :
            $this->db->where('ab.lokasi_data', $search['filter'], true);
        endif;

        return $this->db->order_by('ab.id', 'desc');
        
    }

    private function _listDataAntrianBPJS($limit, $start, $search)
    {
        $this->sqlDataAntrianBPJS($search);
        if ((int)$limit !== 0) :
            $this->db->limit((int)$limit, (int)$start);
        endif;

        return $this->db->get()->result();
    }

    function getAutoSpesialisasi($id_spesialisasi, $tanggal)
    {   

        $this->db->select("tm.id as id_tm, jd.kode_bpjs_dokter, pg.nama as dokter, coalesce(sp.nama, '-') as spesialisasi, jd.jml_kunjung, jd.kuota, jd.id as id_jadwal_dokter, jd.shift_poli")
        ->from('sm_jadwal_dokter as jd')
        ->join('sm_tenaga_medis as tm', 'jd.kode_bpjs_dokter = tm.kode_bpjs', 'left')
        ->join('sm_pegawai as pg', 'pg.id = tm.id_pegawai', 'left')
        ->join('sm_spesialisasi as sp', 'sp.id = tm.id_spesialisasi', 'left')
        ->where('jd.kode_bpjs_dokter IS NOT NULL')
        ->where("jd.kode_bpjs_dokter !=", '')
        ->where('jd.tanggal', $tanggal, true)
        ->where('jd.id_poli', $id_spesialisasi, true);
        
        $data = $this->db->get()->result();

        return $data;
    }

    function dataAntrianBPJS($limit, $start, $search)
    {
        $result['data'] = $this->_listDataAntrianBPJS((int)$limit, (int)$start, $search);
        $result['jumlah'] = $this->sqlDataAntrianBPJS($search)->get()->num_rows();

        $this->db->close();
        
        return $result;
    }

    function cekResponse($kode, $message, $id)
    {
        return $this->db->select("ut.*")
                    ->from('sm_update_task_bpjs as ut')
                    ->where('ut.id_antrian', $id)
                    ->where('ut.response', $kode)
                    ->where('ut.keterangan_respon', $message)
                    ->get()
                    ->row();
        $this->db->close();
    }
    
    function getSignatureBPJS($config)
    {
        $cid = $config->cons_id;
        $skey = $config->secret_key;

        // get timestamp
        // date_default_timezone_set("Asia/Jakarta");
        // $timestamp = strtotime(date("Y/m/d H:i:s"));

        date_default_timezone_set("UTC");
        $timestamp = $this->timestamp;

        // set data value
        $data = $cid."&".$timestamp;

        // generate signature
        $signature = hash_hmac('sha256', $data, $skey, true);
        $encodedSignature = base64_encode($signature);

        // urlencode...
        // $encodedSignature = urlencode($encodedSignature);
        $data = array(
            'timestamp' => $timestamp,
            'signature' => $encodedSignature
        );

        return (Object)$data;
         //return strtotime(date("Y-m-d H:i:s")) * 1000;
    }

    function createHeader($bpjs_config)
    {
        $sign = $this->getSignatureBPJS($bpjs_config);
        return array (
            'X-Cons-ID:' . $bpjs_config->cons_id,
            'X-Timestamp:' . $sign->timestamp,
            'X-Signature:' . $sign->signature,
            'User_Key:' . $bpjs_config->user_key,
            'Content-type: application/json'
        );
    }

    function decryptResponse($string)
    {   
        $key = $this->bpjs_config->cons_id.$this->bpjs_config->secret_key.$this->timestamp;
        
        $encryptMethod = 'AES-256-CBC';
        // hash
        $keyHash = hex2bin(hash('sha256', $key));
        // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
        $iv = substr(hex2bin(hash('sha256', $key)), 0, 16);
        $output = openssl_decrypt(base64_decode($string), $encryptMethod, $keyHash, OPENSSL_RAW_DATA, $iv);
        $output = LZString::decompressFromEncodedURIComponent($output);
        $output = json_decode($output);
        return $output;
    }

    function getConfigBPJSV2()
    {
        return $this->db->where('id', '1')->get('sm_konfigurasi_bpjs_antrean')->row();
    }

    //QUERY PARAMATER KLO SUDAH SELESAI HARUS DIBALIKIN KE DEV
    
    function getConfigVclaim2()
    {
        return $this->db->where('id', '1')->get('sm_konfigurasi_bpjs_v2')->row();
    }

    function decryptResponseVclaim2($string)
    {   
        $this->bpjs_vclaim2 = $this->getConfigVclaim2();

        $key = $this->bpjs_vclaim2->cons_id.$this->bpjs_vclaim2->secret_key.$this->timestamp;
        $encryptMethod = 'AES-256-CBC';
        // hash
        $keyHash = hex2bin(hash('sha256', $key));
        // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
        $iv = substr(hex2bin(hash('sha256', $key)), 0, 16);
        $aOutput = openssl_decrypt(base64_decode($string), $encryptMethod, $keyHash, OPENSSL_RAW_DATA, $iv);
        $bOutput = LZString::decompressFromEncodedURIComponent($aOutput);
        $cOutput = json_decode($bOutput);
        return $cOutput;
    }

    function getJenisKunjungan()
    {
        return array(
            '1' => 'Rujukan FKTP',
            '2' => 'Rujukan Internal',
            '3' => 'Kontrol',
            '4' => 'Rujukan Antar RS'
        );
    }

    function getJenisPasien()
    {
        return array(
            'JKN' => 'JKN',
            'NON JKN' => 'NON JKN'
        );
    }

    function hasilCariDataRM($limit, $start, $search)
    {
        $where = "";
        $limitation = "";
        
        if ($limit !== 0) :
            $limitation = " limit " . $limit . " offset " . $start;
        endif;

        if ($search["nik"] !== "") :
            $where .= " and p.no_identitas ilike '%" . $search["nik"] . "%' ";
        endif;

        if ($search["tanggal_lahir"] !== "") :
            $where .= " and p.tanggal_lahir::date = '" . $search["tanggal_lahir"] . "' ";
        endif;

        $sql  = "select p.id, p.nama, p.no_identitas, p.tanggal_lahir
                from sm_pasien as p where p.id is not null ";
        $order = "order by p.id asc ";
        $data['data'] = $this->db->query($sql . $where . $order . $limitation)->result();
        $data['jumlah'] = $this->db->query($sql . $where)->num_rows();
        
        $this->db->close();
        
        return $data;
    }

    function getStatusAntrean()
    {
        return array(
            '' => 'Silakan Pilih',
            'Booking' => 'Booking',
            'Check In' => 'Check In',
            'Batal' => 'Batal',
            'Gagal' => 'Gagal'
        );
    }

    function getKebutuhanKhusus()
    {
        return array(
            'Tidak' => 'Tidak',
            'Ya' => 'Ya'
        );
    }

    function getJenisLoket()
    {
        return array(
            '' => 'Silakan Pilih',
            'Prioritas' => 'A',
            'Asuransi' => 'B',
            'Tunai' => 'C',
            'Informasi' => 'D',
            'PK' => 'E',
            'ltempat' => 'F',
            'Paru' => 'G',
            'JKN' => 'H'
        );
    }

    function getFilterOnsite()
    {
        return array(
            ''  => '- Pilih Lokasi -',
            'rsud' => 'Onsite',
            'mobile' => 'Mobile JKN'
        );
    }

    function getPasienBaru()
    {
        return array(
            '0' => 'Tidak',
            '1' => 'Ya'
        );
    }

    function getKodeBPJS($q, $start, $limit)
    {
        $limit = " limit " . $limit . " offset " . $start;
        $w = " (nama ilike ('%$q%') or kode ilike ('%$q%')) ";
        $sql = "select *, coalesce(kode, '') as kode 
                from sm_spesialisasi 
                where $w and kode_bpjs != '' order by nama";


        $data['data'] = $this->db->query($sql . $limit)->result();
        $data['total'] = $this->db->query($sql)->num_rows();
        return $data;
    }

    function hitungAntrean($tanggal_periksa, $usia, $kodebooking)
    {
        return $this->db->select("count(ab.id) as sisa_antrean")
                    ->from('sm_antrian_bpjs as ab')
                    ->where('ab.tanggal_kunjungan', $tanggal_periksa, true)
                    ->where('ab.usia_pasien', $usia, true)
                    ->where('ab.status', 'Check In')
                    ->where('ab.pasien_hadir', null)
                    ->where('ab.kode_booking <=', $kodebooking, true)
                    ->group_by('ab.id')
                    ->get()
                    ->num_rows();

        $this->db->close();

    }

    function cekAntrianBPJS($usia, $tanggal)
    {
        $query = $this->db->select("max(urutan) as urutan")
            ->from('sm_antrian_bpjs')
            ->where('usia_pasien', $usia)
            ->where('tanggal_kunjungan', $tanggal)
            ->get();

        $next_antrian = 0;
        if ($query !== null) :
            $unit = $query->row();
            $next_antrian = $unit->urutan + 1;
        else :
            $next_antrian = 1;
        endif;

        return $next_antrian;
    }

    function cekKuota($tanggal, $id)
    {
        return $this->db->select("sum(jd.kuota)")
                    ->from('sm_jadwal_dokter as jd')
                    ->where('jd.id_poli', $id, true)
                    ->where('jd.tanggal', $tanggal, true)
                    ->group_by('jd.id_poli')
                    ->get()
                    ->result();
        $this->db->close();
    }

    function pakaiKuota($tanggal, $id)
    {
        return $this->db->select("sum(jd.jml_kunjung)")
                    ->from('sm_jadwal_dokter as jd')
                    ->where('jd.id_poli', $id, true)
                    ->where('jd.tanggal', $tanggal, true)
                    ->group_by('jd.id_poli')
                    ->get()
                    ->result();
        $this->db->close();
    }

    function cekAdaKuota($tanggal, $id)
    {
        return $this->db->select("jd.id, jd.id_dokter, jd.id_poli, jd.nama_dokter, tm.kode_bpjs as bpjs, (jd.kuota - jd.jml_kunjung) as hasil")
                    ->from('sm_jadwal_dokter as jd')
                    ->join('sm_tenaga_medis as tm', 'tm.id = jd.id_dokter', 'left')
                    ->where('jd.id_poli', $id, true)
                    ->where('jd.tanggal', $tanggal, true)
                    ->order_by('jd.id asc')
                    ->get()
                    ->result();
        $this->db->close();
    }

    function cekNomorRujukan($noRujuk)
    {
        return $this->db->select("sp.*")
                    ->from('sm_pendaftaran as sp')
                    ->where('sp.no_rujukan', $noRujuk, true)
                    ->order_by('sp.id desc')
                    ->get()
                    ->row();
        $this->db->close();
    }

    function cekDataPendaftaranPasien($noRM)
    {
        date_default_timezone_set('Asia/Jakarta');
        return $this->db->select("sp.*")
                    ->from('sm_pendaftaran as sp')
                    ->where('sp.id_pasien', $noRM, true)
                    ->where('sp.jenis_pendaftaran', 'Poliklinik', true)
                    ->where("sp.tanggal_daftar BETWEEN '" . date('Y-m-d') . " 00:00:00' AND '" . date('Y-m-d') . " 23:59:59'")
                    ->limit(1)
                    ->get()
                    ->row();
        $this->db->close();
    }

    function cekPendaftaranPasien($noRM)
    {
        date_default_timezone_set('Asia/Jakarta');
        return $this->db->select("x.nama, sp.*")
                    ->from('sm_pendaftaran as sp')
                    ->join('sm_penjamin as x', 'sp.id_penjamin = x.id', 'left')
                    ->where('sp.id_pasien', $noRM, true)
                    ->where('sp.jenis_pendaftaran', 'Poliklinik', true)
                    ->where("sp.tanggal_daftar BETWEEN '" . date('Y-m-d') . " 00:00:00' AND '" . date('Y-m-d') . " 23:59:59'")
                    ->get()
                    ->result();
        $this->db->close();
    }

    function cekValidasiDataPasien($noRM, $tanggal)
    {
        date_default_timezone_set('Asia/Jakarta');
        return $this->db->select("x.nama, sp.status")
                    ->from('sm_pendaftaran as sp')
                    ->join('sm_penjamin as x', 'sp.id_penjamin = x.id', 'left')
                    ->where('sp.id_pasien', $noRM, true)
                    ->where("sp.tanggal_daftar BETWEEN '" . $tanggal . " 00:00:00' AND '" . $tanggal . " 23:59:59'")
                    ->get()
                    ->result();
        $this->db->close();
    }

    function checkUlangId($kodebooking)
    {
        return $this->db->select("ab.*", false)
                    ->from('sm_antrian_bpjs as ab')
                    ->where('ab.kode_booking', $kodebooking, true)
                    ->get()
                    ->row();
        $this->db->close();
    }

    function cekJadwalDokter($tanggal, $id)
    {
        return $this->db->select("jd.*")
                    ->from('sm_jadwal_dokter as jd')
                    ->where('jd.id_dokter', $id, true)
                    ->where('jd.tanggal', $tanggal, true)
                    ->order_by('jd.id asc')
                    ->get()
                    ->row();
        $this->db->close();
    }

    function cekShiftDokter($tanggal, $jadwal)
    {
        return $this->db->select("jd.*")
                    ->from('sm_jadwal_dokter as jd')
                    ->where('jd.id', $jadwal, true)
                    ->where('jd.tanggal', $tanggal, true)
                    ->order_by('jd.id asc')
                    ->get()
                    ->row();
        $this->db->close();
    }

    function dataIdentitasWA($nik, $tanggal)
    {
        return $this->db->select("spw.*")
                    ->from('sm_pasien_wa as spw')
                    ->where('spw.no_identitas', $nik, true)
                    ->where('spw.tanggal_lahir', $tanggal, true)
                    ->order_by('spw.inc desc')
                    ->get()
                    ->result();
        $this->db->close();
    }

    function getLastNoRm()
    {
        $sql = "select id from sm_pasien
                where id like '0%'
                order by id desc limit 1 offset 0  ";
        $no_max = $this->db->query($sql)->row();
        $no_rm = "";
        if ($no_max) {
            // running kode
            $last = ltrim($no_max->id, 0);
            $last += 1;
            $no_rm = str_pad($last, 8, 0, STR_PAD_LEFT);
        } else {
            // Entri Baru, mulai dari 000001
            $no_rm = "00000001";
        }
        return $no_rm;
    }

    function updateDataPasien($data)
    {

        $data['id'] = $this->getLastNoRm();
        $data['last_active'] = $this->datetime;
        $this->db->insert('sm_pasien', $data);
        $id = $data['id'];
        $rekam_medis_pasien = array(
            'id' => $id,
            'history' => NULL,
            'last_update' => $this->datetime,
        );
        $count = $this->db->where('id', $id)->get('sm_rekam_medis')->num_rows();
        if ($count < 1) :
            $this->db->insert('sm_rekam_medis', $rekam_medis_pasien);
        endif;

        return $id;
        
    }

    function checkPasien($data)
    {
        $this->db->select('sm_pasien.*')
            ->from('sm_pasien')
            ->where('id is not null');

        if ($data['nama'] !== '') :
            $this->db->where('nama', $data['nama']);
        endif;

        if ($data['kelamin'] !== '') :
            $this->db->where('kelamin', $data['kelamin']);
        endif;

        if ($data['tanggal_lahir'] !== '') :
            $this->db->where('tanggal_lahir', $data['tanggal_lahir']);
        endif;

        $query = $this->db->get()->row();

        if ($query) :
            $status = true;
            $statusrm = 2;
        else :
            $status = false;
            $statusrm = null;
        endif;

        return ['status' => $status, 'message' => $query, 'statusrm' => $statusrm];
    }

    function nikIdentitas($id)
    {
        return $this->db->select("p.*")
                    ->from('sm_pasien as p')
                    ->where('p.no_identitas', $id, true)
                    ->get()
                    ->row();
        $this->db->close();
    }

    function simpanDataAntrian($params)
    {
        
        $this->db->insert('sm_antrian_bpjs', $params);
        $id = $this->db->insert_id();

        if(isset($params['id_skd'])){

            if($params['id_skd'] !== null && $params['id_skd'] !== ''){
                
                $skk = $this->db->get_where('sm_surat_kontrol', ['id' => (int)$params['id_skd']])->row();
                
                if($params['lokasi_data'] !== null && $params['lokasi_data'] !== ''){

                    if($params['lokasi_data'] === 'APM'){
                        
                        if(isset($skk->id_layanan_pendaftaran)){

                            $lp = $this->db->select('lp.*')->from('sm_layanan_pendaftaran as lp')->where('lp.id', (int)$skk->id_layanan_pendaftaran)->get()->row();

                            if(isset($lp->jenis_layanan)){

                                if($lp->jenis_layanan === 'Poliklinik'){

                                    $this->load->model('pelayanan/Pelayanan_model', 'pelayanan');
                                    $this->pelayanan->serviceRequestStatus($skk->id_layanan_pendaftaran, $lp->tindak_lanjut, 'layanan', $params['waktu_estimasi']);

                                }

                            }

                        }

                    }

                }
            }

        }

        return $id;
    
    }

    function getJenisPendaftaranPasien($id_pasien){
        return $this->db->query("select keterangan, tanggal_daftar, kode_booking from sm_pendaftaran where id_pasien = '$id_pasien' and tanggal_keluar is null")->row();
    }

    function simpanDataSuratKontrol($params)
    {
        $this->db->insert('sm_surat_kontrol_bpjs', $params);
        $id = $this->db->insert_id();

        return $id;

    }

    function getSEPSpesialis($id_spesialisasi, $id_dokter)
    {   

            $this->db->select("tm.*, pg.nama as dokter, coalesce(sp.nama, '-') as spesialisasi, case when jml.jml_terlayani<>'' then jml.jml_terlayani else '(0/0)' end jml_terlayani")
            ->from('sm_tenaga_medis as tm')
            ->join('sm_pegawai as pg', 'pg.id = tm.id_pegawai')
            ->join('sm_spesialisasi as sp', 'sp.id = tm.id_spesialisasi', 'left')
            ->join(" (select sld.id_dokter,
                    concat('(',count(sld.status_terlayani) FILTER (where sld.status_terlayani='Sudah'),
                    '/',count(sld.status_terlayani),')' ) jml_terlayani
                    from sm_layanan_pendaftaran sld left join sm_spesialisasi ss on (ss.id = sld.id_unit_layanan) where to_char(sld.tanggal_layanan, 'DD-MM-YYYY')=to_char(NOW(), 'DD-MM-YYYY')
                    and sld.konsul=0 and ss.kode_bpjs= '".$id_spesialisasi."' and sld.jenis_layanan='Poliklinik'
                    GROUP BY sld.id_dokter, ss.id) as jml", 'jml.id_dokter=tm.id', 'left')
            ->where('sp.kode_bpjs', $id_spesialisasi);
        
        if($id_dokter !== 'null'){

            $this->db->where('tm.kode_bpjs', $id_dokter);
            $data = $this->db->get()->row();

        } else {

            $data = $this->db->get()->result();

        }
        
        return $data;
    }

    function cekStatusTanggal($id)
    {
        return $this->db->select("ab.*, sp.nama as poli, pg.nama as nama_dokter, ps.tanggal_lahir as lahir_pasien, jd.shift_poli")
                    ->from('sm_antrian_bpjs as ab')
                    ->join('sm_spesialisasi as sp', 'sp.id = ab.nama_poli', 'left')
                    ->join('sm_tenaga_medis as tm', 'tm.id = ab.id_dokter', 'left')
                    ->join('sm_pegawai as pg', 'pg.id = tm.id_pegawai', 'left')
                    ->join('sm_pasien as ps', 'ps.id = ab.no_rm', 'left')
                    ->join('sm_jadwal_dokter as jd', 'jd.id = ab.id_jadwal_dokter', 'left')
                    ->where('ab.id', $id, true)
                    ->get()
                    ->row();
        $this->db->close();
    }

    function cekDataPasien($noRM) {
        
        $where = "where ";
        $where .= "p.id = '".$noRM."' ";
            
        $select = "select p.*, 
                pd.nama as pendidikan, 
                pk.nama as pekerjaan, 
                et.nama as etnis,
                pp.is_died, 
                pp.is_hiv, 
                pp.is_alergi, 
                pp.is_gonorrhea, 
                pp.is_hepatitis, 
                pp.is_kusta,
                pp.is_tbc, 
                pp.is_potensi_komplain, 
                pp.is_pasien_pejabat, 
                pp.is_pemilik_rs ";
        $sql = "from sm_pasien as p 
                left join sm_pendidikan as pd on pd.id = p.id_pendidikan
                left join sm_pekerjaan as pk on pk.id = p.id_pekerjaan 
                left join sm_etnis as et on et.id = p.id_etnis 
                left join sm_profil_pasien as pp on pp.id_pasien = p.id
                $where ";
        $order = " order by p.id";

        $data = $this->db->query($select.$sql.$order)->row();
        return $data;
    }

    function getNoAntrian($data)
    {
        $query = $this->db->select("max(no_antrian) as no_antrian")
            ->from('sm_layanan_pendaftaran')
            ->where('id_unit_layanan', $data['id_unit'])
            ->where('date(tanggal_layanan)', $data['tanggal'])
            ->get();

        $next_antrian = 0;
        if ($query !== null) :
            $unit = $query->row();
            $next_antrian = $unit->no_antrian + 1;
        else :
            $next_antrian = 1;
        endif;

        return $next_antrian;
    }

    function updateKunjunganDokter($data, $tanggal, $id) 
    {
        $this->db->trans_begin();
        if ($id !== '') :
            $this->db->where('id', $id, true)->where('tanggal', $tanggal, true)->update('sm_jadwal_dokter', $data);
        else : 
            return array('status' => false, 'message' => 'Gagal Booking Kunjungan');
        endif;
        if ($this->db->trans_status() === false) :
            $this->db->trans_rollback();
            return array('status' => false, 'message' => 'Gagal Booking Kunjungan');
        else :
            $this->db->trans_commit();
            return array('status' => true, 'message' => 'Berhasil Booking Kunjungan');
        endif;
    }

    function batalKunjunganDokter($data, $id) 
    {
        $this->db->trans_begin();
        if ($id !== '') :
            $this->db->where('id', $id, true)->update('sm_jadwal_dokter', $data);
        else : 
            return array('status' => false, 'message' => 'Gagal Batal Kunjungan');
        endif;
        if ($this->db->trans_status() === false) :
            $this->db->trans_rollback();
            return array('status' => false, 'message' => 'Gagal Batal Kunjungan');
        else :
            $this->db->trans_commit();
            return array('status' => true, 'message' => 'Berhasil Batal Kunjungan');
        endif;
    }

    function cekTerdaftar($nik, $poli, $tanggal)
    {
        return $this->db->select("ab.*, sp.nama as poli")
                    ->from('sm_antrian_bpjs as ab')
                    ->join('sm_spesialisasi as sp', 'sp.id = ab.nama_poli', 'left')
                    ->where('ab.nik', $nik, true)
                    ->where('ab.nama_poli', $poli, true)
                    ->where('ab.tanggal_kunjungan', $tanggal, true)
                    ->get()
                    ->row();
        $this->db->close();
    }

    function cekStatusAntrian($id)
    {
        return $this->db->select("ab.id, ab.status, ab.huruf_antrean, ab.tanggal_kunjungan, ab.id_pendaftaran, ab.task_empat")
                    ->from('sm_antrian_bpjs as ab')
                    ->where('ab.id', $id, true)
                    ->order_by('ab.id asc')
                    ->get()
                    ->row();
        $this->db->close();
    }

    function getDataBooking($id)
    {
        return $this->db->select("ab.*, sp.nama as poli, pg.nama as nama_dokter", false)
            ->from('sm_antrian_bpjs as ab')
            ->join('sm_spesialisasi as sp', 'sp.id = ab.nama_poli', 'left')
            ->join('sm_translucent as cr', 'cr.id = ab.user_create', 'left')
            ->join('sm_translucent as ur', 'ur.id = ab.user_update', 'left')
            ->join('sm_tenaga_medis as tm', 'tm.id = ab.id_dokter', 'left')
            ->join('sm_pegawai as pg', 'pg.id = tm.id_pegawai', 'left')
            ->where('ab.id', $id, true)
            ->get()
            ->row();
        $this->db->close();
        
    }
    
    function cekNoka($noka, $poli, $tanggal)
    {
        return $this->db->select("ab.*, sp.nama as poli")
                    ->from('sm_antrian_bpjs as ab')
                    ->join('sm_spesialisasi as sp', 'sp.id = ab.nama_poli', 'left')
                    ->where('ab.no_kartu', $noka, true)
                    ->where('ab.nama_poli', $poli, true)
                    ->where('ab.tanggal_kunjungan', $tanggal, true)
                    ->get()
                    ->row();
        $this->db->close();
    }

}

