<?php
defined('BASEPATH') or exit('No direct script access allowed');
use \LZCompressor\LZString;

class Satu_sehat_model extends CI_Model
{

    function __construct()
    {
        
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('App_model');
        $this->date = date('Y-m-d');
        $this->table = 'sm_pasien as p';
    
    }

    private function sqlAmbilDataPasien($search)
    {
        $this->db->select("p.id, p.no_identitas, p.nama, p.ihsn")
            ->from($this->table);

        if ($search['id'] !== '') :
            $this->db->where('p.id', $search['id']);
        endif;

        if ($search['nik'] !== '') :
            $this->db->where('p.no_identitas', $search['nik']);
        endif;

        if ($search['nama'] !== '') :
            $this->db->where("p.nama ilike '%" . strtolower($search['nama']) . "%'");
        endif;

        $this->db->where('p.ihsn is not null');
        $this->db->where('p.ihsn !=', "");

        return $this->db->order_by('p.id');
        
    }

    private function _listAmbilDataPasien($limit, $start, $search)
    {
        $this->sqlAmbilDataPasien($search);
        if ($limit !== 0) :
            $this->db->limit($limit, $start);
        endif;

        return $this->db->get()->result();
    }

    function ambilDataPasien($limit, $start, $search)
    {
        $result['data'] = $this->_listAmbilDataPasien($limit, $start, $search);
        $result['jumlah'] = $this->sqlAmbilDataPasien($search)->get()->num_rows();
        return $result;

        $this->db->close();
    }

    private function sqldataIntegrasiPasien($search)
    {
        $this->db->select("p.id, p.no_identitas, p.nama, p.ihsn")
            ->from($this->table);

        if ($search['id'] !== '') :
            $this->db->where('p.id', $search['id']);
        endif;

        if ($search['nik'] !== '') :
            $this->db->where('p.no_identitas', $search['nik']);
        endif;

        if ($search['nama'] !== '') :
            $this->db->where("p.nama ilike '%" . strtolower($search['nama']) . "%'");
        endif;

        $this->db->where('p.ihsn', null);
        
        return $this->db->order_by('p.id');
        
    }

    private function _listdataIntegrasiPasien($limit, $start, $search)
    {
        $this->sqldataIntegrasiPasien($search);
        if ($limit !== 0) :
            $this->db->limit($limit, $start);
        endif;

        return $this->db->get()->result();
    }

    function dataIntegrasiPasien($limit, $start, $search)
    {
        $result['data'] = $this->_listdataIntegrasiPasien($limit, $start, $search);
        $result['jumlah'] = $this->sqldataIntegrasiPasien($search)->get()->num_rows();
        return $result;

        $this->db->close();
    }

    function authHeader()
    {
        return array (
            'Content-Type: application/x-www-form-urlencoded'
        );
    }

    function getConfigSatuSehat()
    {
        return $this->db->where('id', '1')->get('sm_konfigurasi_satu_sehat')->row();
    }

    function aksesSatuSehat($id)
    {
        return $this->db->select("ss.*, sp.nama as nama_user")
            ->from('sm_akses_satu_sehat as ss')
            ->join('sm_translucent as tr', 'tr.id = ss.userakses', 'left')
            ->join('sm_pegawai as sp', 'tr.id = sp.id', 'left')
            ->where('ss.userakses', $id, true)
            ->order_by('ss.timeissued', 'desc')
            ->limit(1)
            ->get()
            ->row();
        $this->db->close();
    }

    function aksesTimeissued()
    {
        return $this->db->select("ss.timeissued, ss.token, ss.app_name")
            ->from('sm_akses_satu_sehat as ss')
            ->order_by('ss.timeissued', 'desc')
            ->limit(1)
            ->get()
            ->row();
        $this->db->close();
    }

    function postCurl($url, $data, $header = null)
    {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)');
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 3);
        curl_setopt($ch, CURLOPT_TIMEOUT, 3);

        if ($header !== null) {
            curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        }

        $output['result'] = curl_exec($ch);
        $output['respon'] = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        if (curl_errno($ch)) {
            $output['error'] = curl_error($ch);
            $output['result'] = false;
            $output['respon'] = 408;
        }

        curl_close($ch);

        return $output;
    }

    function authBearer($token)
    {
        return array (
            "Accept: application/json",
            "Content-Type: application/json",
            "Authorization: Bearer ". $token ."");
    }

    function postBearer($url, $header, $method = 'GET')
    {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0');
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
        curl_setopt($ch, CURLOPT_ENCODING, "");
        curl_setopt($ch, CURLOPT_MAXREDIRS, 10);
        curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);

        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);

        $output['result'] = curl_exec($ch);
        $output['respon'] = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        if (curl_errno($ch)) {
            $output['error'] = curl_error($ch);
            $output['result'] = false;
            $output['respon'] = 408;
        }

        curl_close($ch);
        return $output;
    }

    function integrasiPasien($nik)
    {
        return $this->db->select("p.*")
            ->from($this->table)
            ->where('p.no_identitas', $nik, true)
            ->get()
            ->row();
        $this->db->close();
    }

    function cekInformPasien($id)
    {
        return $this->db->select("p.consentid, p.ihsn")
            ->from($this->table)
            ->where('p.id', $id, true)
            ->get()
            ->row();
        $this->db->close();
    }

    private function sqlAmbilDataNakes($search)
    {
        $this->db->select("tm.*, p.nama, p.nik, sp.nama as spesialisasi")
            ->from('sm_tenaga_medis as tm')
            ->join('sm_pegawai as p', 'tm.id_pegawai = p.id', 'left')
            ->join('sm_spesialisasi as sp', 'sp.id = tm.id_spesialisasi', 'left');

        if ($search['nik'] !== '') :
            $this->db->where('p.nik', $search['nik']);
        endif;

        if ($search['nama'] !== '') :
            $this->db->where("p.nama ilike '%" . strtolower($search['nama']) . "%'");
        endif;

        // $this->db->where('tm.ihs_number !=', "");
        // $this->db->where('tm.id_profesi', 8);
        // $this->db->or_where('tm.id_profesi', 10);
        $this->db->where('tm.ihs_number is not null');

        return $this->db->order_by('tm.id');
        
    }

    private function _listAmbilDataNakes($limit, $start, $search)
    {
        $this->sqlAmbilDataNakes($search);
        if ($limit !== 0) :
            $this->db->limit($limit, $start);
        endif;

        return $this->db->get()->result();
    }

    function ambilDataNakes($limit, $start, $search)
    {
        $result['data'] = $this->_listAmbilDataNakes($limit, $start, $search);
        $result['jumlah'] = $this->sqlAmbilDataNakes($search)->get()->num_rows();
        return $result;

        $this->db->close();
    }

    private function sqldataIntegrasiNakes($search)
    {
        $this->db->select("tm.*, p.nama, p.nik, sp.nama as spesialisasi")
            ->from('sm_tenaga_medis as tm')
            ->join('sm_pegawai as p', 'tm.id_pegawai = p.id', 'left')
            ->join('sm_spesialisasi as sp', 'sp.id = tm.id_spesialisasi', 'left');

        if ($search['nik'] !== '') :
            $this->db->where('p.nik', $search['nik']);
        endif;

        if ($search['nama'] !== '') :
            $this->db->where("p.nama ilike '%" . strtolower($search['nama']) . "%'");
        endif;

        $this->db->where('tm.ihs_number', null);

        return $this->db->order_by('tm.id');
        
    }

    private function _listdataIntegrasiNakes($limit, $start, $search)
    {
        $this->sqldataIntegrasiNakes($search);
        if ($limit !== 0) :
            $this->db->limit($limit, $start);
        endif;

        return $this->db->get()->result();
    }

    function dataIntegrasiNakes($limit, $start, $search)
    {
        $result['data'] = $this->_listdataIntegrasiNakes($limit, $start, $search);
        $result['jumlah'] = $this->sqldataIntegrasiNakes($search)->get()->num_rows();
        return $result;

        $this->db->close();
    }


    private function sqlambilDataEncounter($search)
    {
        $this->db->select("lp.*, ss.nama as nama_poli, p.nama as nama_pasien, p.no_identitas, p.id as no_rm, ab.kode_booking")
            ->from('sm_layanan_pendaftaran as lp')
            ->join('sm_pendaftaran as pd', 'lp.id_pendaftaran = pd.id')
            ->join('sm_pasien as p', 'pd.id_pasien = p.id', 'left')
            ->join('sm_spesialisasi as ss', 'ss.id = lp.id_unit_layanan', 'left')
            ->join('sm_antrian_bpjs as ab', 'ab.id_pendaftaran = pd.id', 'left');

        if (($search['tanggal_awal'] !== '') & ($search['tanggal_akhir'] !== '')) :
            $this->db->where("lp.tanggal_layanan BETWEEN '" . date2mysql($search['tanggal_awal']) . " 00:00:00' AND '" . date2mysql($search['tanggal_akhir']) . " 23:59:59'");
        endif;

        if ($search['id'] !== '') :
            $this->db->where('p.id', $search['id']);
        endif;

        if ($search['nama'] !== '') :
            $this->db->where("p.nama ilike '%" . strtolower($search['nama']) . "%'");
        endif;

        if ($search['poli'] !== '') :
            $this->db->where("ss.nama ilike '%" . strtolower($search['poli']) . "%'");
        endif;

        $this->db->where('lp.id_encounter is not null');
        $this->db->where('lp.id_encounter !=', "");
        $this->db->where('lp.jenis_layanan', 'Poliklinik');

        return $this->db->order_by('lp.id', 'desc');
        
    }

    private function _listambilDataEncounter($limit, $start, $search)
    {
        $this->sqlambilDataEncounter($search);
        if ($limit !== 0) :
            $this->db->limit($limit, $start);
        endif;

        return $this->db->get()->result();
    }

    function ambilDataEncounter($limit, $start, $search)
    {
        $result['data'] = $this->_listambilDataEncounter($limit, $start, $search);
        $result['jumlah'] = $this->sqlambilDataEncounter($search)->get()->num_rows();
        return $result;

        $this->db->close();
    }

    private function sqlambilConditionPrimary($search)
    {
        $this->db->select("d.id as id_diagnosis, g.kode_icdx, lp.tanggal_layanan, lp.id, g.nama as nama_diagnosis, ss.nama as nama_poli, p.nama as nama_pasien, p.id as no_rm, ab.kode_booking")
            ->from('sm_diagnosa as d')
            ->join('sm_golongan_sebab_sakit as g', 'g.id = d.id_pengkodean')
            ->join('sm_layanan_pendaftaran as lp', 'lp.id = d.id_layanan_pendaftaran')
            ->join('sm_pendaftaran as pd', 'lp.id_pendaftaran = pd.id')
            ->join('sm_pasien as p', 'pd.id_pasien = p.id', 'left')
            ->join('sm_spesialisasi as ss', 'ss.id = lp.id_unit_layanan', 'left')
            ->join('sm_antrian_bpjs as ab', 'ab.id_pendaftaran = pd.id', 'left');

        if ($search['id'] !== '') :
            $this->db->where('p.id', $search['id']);
        endif;

        if ($search['nama'] !== '') :
            $this->db->where("p.nama ilike '%" . strtolower($search['nama']) . "%'");
        endif;

        if ($search['poli'] !== '') :
            $this->db->where("ss.nama ilike '%" . strtolower($search['poli']) . "%'");
        endif;

        $this->db->where('d.prioritas', 'Utama');
        $this->db->where('d.id_kondisi is not null');
        $this->db->where('d.id_kondisi !=', "");
        $this->db->where('lp.jenis_layanan', 'Poliklinik');

        return $this->db->order_by('lp.id', 'desc');
        
    }

    private function _listambilConditionPrimary($limit, $start, $search)
    {
        $this->sqlambilConditionPrimary($search);
        if ($limit !== 0) :
            $this->db->limit($limit, $start);
        endif;

        return $this->db->get()->result();
    }

    function ambilConditionPrimary($limit, $start, $search)
    {
        $result['data'] = $this->_listambilConditionPrimary($limit, $start, $search);
        $result['jumlah'] = $this->sqlambilConditionPrimary($search)->get()->num_rows();
        return $result;

        $this->db->close();
    }

    private function sqlambilConditionSecondary($search)
    {
        $this->db->select("d.id as id_diagnosis, g.kode_icdx, lp.tanggal_layanan, lp.id, g.nama as nama_diagnosis, ss.nama as nama_poli, p.nama as nama_pasien, p.id as no_rm, ab.kode_booking")
            ->from('sm_diagnosa as d')
            ->join('sm_golongan_sebab_sakit as g', 'g.id = d.id_pengkodean')
            ->join('sm_layanan_pendaftaran as lp', 'lp.id = d.id_layanan_pendaftaran')
            ->join('sm_pendaftaran as pd', 'lp.id_pendaftaran = pd.id')
            ->join('sm_pasien as p', 'pd.id_pasien = p.id', 'left')
            ->join('sm_spesialisasi as ss', 'ss.id = lp.id_unit_layanan', 'left')
            ->join('sm_antrian_bpjs as ab', 'ab.id_pendaftaran = pd.id', 'left');

        if ($search['id'] !== '') :
            $this->db->where('p.id', $search['id']);
        endif;

        if ($search['nama'] !== '') :
            $this->db->where("p.nama ilike '%" . strtolower($search['nama']) . "%'");
        endif;

        if ($search['poli'] !== '') :
            $this->db->where("ss.nama ilike '%" . strtolower($search['poli']) . "%'");
        endif;

        $this->db->where('d.prioritas', 'Sekunder');
        $this->db->where('d.id_kondisi is not null');
        $this->db->where('d.id_kondisi !=', "");
        $this->db->where('lp.jenis_layanan', 'Poliklinik');

        return $this->db->order_by('lp.id', 'desc');
        
    }

    private function _listambilConditionSecondary($limit, $start, $search)
    {
        $this->sqlambilConditionSecondary($search);
        if ($limit !== 0) :
            $this->db->limit($limit, $start);
        endif;

        return $this->db->get()->result();
    }

    function ambilConditionSecondary($limit, $start, $search)
    {
        $result['data'] = $this->_listambilConditionSecondary($limit, $start, $search);
        $result['jumlah'] = $this->sqlambilConditionSecondary($search)->get()->num_rows();
        return $result;

        $this->db->close();
    }

    private function sqlintegrasiConditionSecondary($search)
    {
        $this->db->select("d.id as id_diagnosis, g.kode_icdx, lp.tanggal_layanan, lp.id, g.nama as nama_diagnosis, ss.nama as nama_poli, p.nama as nama_pasien, p.id as no_rm, ab.kode_booking")
            ->from('sm_diagnosa as d')
            ->join('sm_golongan_sebab_sakit as g', 'g.id = d.id_pengkodean')
            ->join('sm_layanan_pendaftaran as lp', 'lp.id = d.id_layanan_pendaftaran')
            ->join('sm_pendaftaran as pd', 'lp.id_pendaftaran = pd.id')
            ->join('sm_pasien as p', 'pd.id_pasien = p.id', 'left')
            ->join('sm_spesialisasi as ss', 'ss.id = lp.id_unit_layanan', 'left')
            ->join('sm_antrian_bpjs as ab', 'ab.id_pendaftaran = pd.id', 'left');

        if ($search['id'] !== '') :
            $this->db->where('p.id', $search['id']);
        endif;

        if ($search['nama'] !== '') :
            $this->db->where("p.nama ilike '%" . strtolower($search['nama']) . "%'");
        endif;

        if ($search['poli'] !== '') :
            $this->db->where("ss.nama ilike '%" . strtolower($search['poli']) . "%'");
        endif;

        $this->db->where('d.prioritas', 'Sekunder');
        $this->db->where('d.id_kondisi', null);
        $this->db->where('lp.jenis_layanan', 'Poliklinik');

        return $this->db->order_by('lp.id', 'desc');
        
    }

    private function _listintegrasiConditionSecondary($limit, $start, $search)
    {
        $this->sqlintegrasiConditionSecondary($search);
        if ($limit !== 0) :
            $this->db->limit($limit, $start);
        endif;

        return $this->db->get()->result();
    }

    function integrasiConditionSecondary($limit, $start, $search)
    {
        $result['data'] = $this->_listintegrasiConditionSecondary($limit, $start, $search);
        $result['jumlah'] = $this->sqlintegrasiConditionSecondary($search)->get()->num_rows();
        return $result;

        $this->db->close();
    }

    private function sqlintegrasiConditionPrimary($search)
    {
        $this->db->select("d.id as id_diagnosis, g.kode_icdx, lp.tanggal_layanan, lp.id, g.nama as nama_diagnosis, ss.nama as nama_poli, p.nama as nama_pasien, p.id as no_rm, ab.kode_booking")
            ->from('sm_diagnosa as d')
            ->join('sm_golongan_sebab_sakit as g', 'g.id = d.id_pengkodean')
            ->join('sm_layanan_pendaftaran as lp', 'lp.id = d.id_layanan_pendaftaran')
            ->join('sm_pendaftaran as pd', 'lp.id_pendaftaran = pd.id')
            ->join('sm_pasien as p', 'pd.id_pasien = p.id', 'left')
            ->join('sm_spesialisasi as ss', 'ss.id = lp.id_unit_layanan', 'left')
            ->join('sm_antrian_bpjs as ab', 'ab.id_pendaftaran = pd.id', 'left');

        if ($search['id'] !== '') :
            $this->db->where('p.id', $search['id']);
        endif;

        if ($search['nama'] !== '') :
            $this->db->where("p.nama ilike '%" . strtolower($search['nama']) . "%'");
        endif;

        if ($search['poli'] !== '') :
            $this->db->where("ss.nama ilike '%" . strtolower($search['poli']) . "%'");
        endif;

        $this->db->where('d.prioritas', 'Utama');
        $this->db->where('d.id_kondisi', null);
        $this->db->where('lp.jenis_layanan', 'Poliklinik');

        return $this->db->order_by('lp.id', 'desc');
        
    }

    private function _listintegrasiConditionPrimary($limit, $start, $search)
    {
        $this->sqlintegrasiConditionPrimary($search);
        if ($limit !== 0) :
            $this->db->limit($limit, $start);
        endif;

        return $this->db->get()->result();
    }

    function integrasiConditionPrimary($limit, $start, $search)
    {
        $result['data'] = $this->_listintegrasiConditionPrimary($limit, $start, $search);
        $result['jumlah'] = $this->sqlintegrasiConditionPrimary($search)->get()->num_rows();
        return $result;

        $this->db->close();
    }

    private function sqldataIntegrasiEncounter($search)
    {
        $this->db->select("lp.*, ss.nama as nama_poli, p.nama as nama_pasien, p.no_identitas, p.id as no_rm, ab.kode_booking")
            ->from('sm_layanan_pendaftaran as lp')
            ->join('sm_pendaftaran as pd', 'lp.id_pendaftaran = pd.id')
            ->join('sm_pasien as p', 'pd.id_pasien = p.id', 'left')
            ->join('sm_spesialisasi as ss', 'ss.id = lp.id_unit_layanan', 'left')
            ->join('sm_antrian_bpjs as ab', 'ab.id_pendaftaran = pd.id', 'left');

        if (($search['tanggal_awal'] !== '') & ($search['tanggal_akhir'] !== '')) :
            $this->db->where("lp.tanggal_layanan BETWEEN '" . date2mysql($search['tanggal_awal']) . " 00:00:00' AND '" . date2mysql($search['tanggal_akhir']) . " 23:59:59'");
        endif;

        if ($search['id'] !== '') :
            $this->db->where('p.id', $search['id']);
        endif;

        if ($search['nama'] !== '') :
            $this->db->where("p.nama ilike '%" . strtolower($search['nama']) . "%'");
        endif;

        if ($search['poli'] !== '') :
            $this->db->where("ss.nama ilike '%" . strtolower($search['poli']) . "%'");
        endif;

        $this->db->where('lp.id_encounter', null); 
        $this->db->where('lp.jenis_layanan', 'Poliklinik');
        
        
        return $this->db->order_by('lp.id', 'desc');
        
    }

    private function _listdataIntegrasiEncounter($limit, $start, $search)
    {
        $this->sqldataIntegrasiEncounter($search);
        if ($limit !== 0) :
            $this->db->limit($limit, $start);
        endif;

        return $this->db->get()->result();
    }

    function dataIntegrasiEncounter($limit, $start, $search)
    {
        $result['data'] = $this->_listdataIntegrasiEncounter($limit, $start, $search);
        $result['jumlah'] = $this->sqldataIntegrasiEncounter($search)->get()->num_rows();
        return $result;

        $this->db->close();
    }

    private function sqlambilProcedure($search)
    {
        $this->db->select("ttp.id as id_tindakan, ix.icd9, lp.tanggal_layanan, lp.id, ix.nama as nama_tindakan, sl.nama as nama_layanan, ss.nama as nama_poli, p.nama as nama_pasien, p.id as no_rm, ab.kode_booking")
            ->from('sm_tarif_tindakan_pasien as ttp')
            ->join('sm_tarif_pelayanan as stp', 'stp.id = ttp.id_tarif_pelayanan', 'left')
            ->join('sm_layanan as sl', 'sl.id = stp.id_layanan', 'left')
            ->join('sm_icd_ix as ix', 'ix.id = ttp.id_pengkodean', 'left')
            ->join('sm_layanan_pendaftaran as lp', 'lp.id = ttp.id_layanan_pendaftaran', 'left')
            ->join('sm_pendaftaran as pd', 'lp.id_pendaftaran = pd.id', 'left')
            ->join('sm_pasien as p', 'pd.id_pasien = p.id', 'left')
            ->join('sm_spesialisasi as ss', 'ss.id = lp.id_unit_layanan', 'left')
            ->join('sm_antrian_bpjs as ab', 'ab.id_pendaftaran = pd.id', 'left');

        if ($search['id'] !== '') :
            $this->db->where('p.id', $search['id']);
        endif;

        if ($search['nama'] !== '') :
            $this->db->where("p.nama ilike '%" . strtolower($search['nama']) . "%'");
        endif;

        if ($search['poli'] !== '') :
            $this->db->where("ss.nama ilike '%" . strtolower($search['poli']) . "%'");
        endif;

        $this->db->where('ttp.id_tindakan_satset is not null');
        $this->db->where('ttp.id_tindakan_satset !=', "");
        $this->db->where('lp.jenis_layanan', 'Poliklinik');

        return $this->db->order_by('lp.id', 'desc');
        
    }

    private function _listambilProcedure($limit, $start, $search)
    {
        $this->sqlambilProcedure($search);
        if ($limit !== 0) :
            $this->db->limit($limit, $start);
        endif;

        return $this->db->get()->result();
    }

    function ambilProcedure($limit, $start, $search)
    {
        $result['data'] = $this->_listambilProcedure($limit, $start, $search);
        $result['jumlah'] = $this->sqlambilProcedure($search)->get()->num_rows();
        return $result;

        $this->db->close();
    }

    private function sqlintegrasiProcedure($search)
    {
        $this->db->select("ttp.id as id_tindakan, ix.icd9, lp.tanggal_layanan, lp.id, ix.nama as nama_tindakan, sl.nama as nama_layanan, ss.nama as nama_poli, p.nama as nama_pasien, p.id as no_rm, ab.kode_booking")
            ->from('sm_tarif_tindakan_pasien as ttp')
            ->join('sm_tarif_pelayanan as stp', 'stp.id = ttp.id_tarif_pelayanan', 'left')
            ->join('sm_layanan as sl', 'sl.id = stp.id_layanan', 'left')
            ->join('sm_icd_ix as ix', 'ix.id = ttp.id_pengkodean', 'left')
            ->join('sm_layanan_pendaftaran as lp', 'lp.id = ttp.id_layanan_pendaftaran', 'left')
            ->join('sm_pendaftaran as pd', 'lp.id_pendaftaran = pd.id', 'left')
            ->join('sm_pasien as p', 'pd.id_pasien = p.id', 'left')
            ->join('sm_spesialisasi as ss', 'ss.id = lp.id_unit_layanan', 'left')
            ->join('sm_antrian_bpjs as ab', 'ab.id_pendaftaran = pd.id', 'left');

        if ($search['id'] !== '') :
            $this->db->where('p.id', $search['id']);
        endif;

        if ($search['nama'] !== '') :
            $this->db->where("p.nama ilike '%" . strtolower($search['nama']) . "%'");
        endif;

        if ($search['poli'] !== '') :
            $this->db->where("ss.nama ilike '%" . strtolower($search['poli']) . "%'");
        endif;

        $this->db->where('ttp.id_tindakan_satset', null);
        $this->db->where('lp.jenis_layanan', 'Poliklinik');

        return $this->db->order_by('lp.id', 'desc');
        
    }

    private function _listintegrasiProcedure($limit, $start, $search)
    {
        $this->sqlintegrasiProcedure($search);
        if ($limit !== 0) :
            $this->db->limit($limit, $start);
        endif;

        return $this->db->get()->result();
    }

    function integrasiProcedure($limit, $start, $search)
    {
        $result['data'] = $this->_listintegrasiProcedure($limit, $start, $search);
        $result['jumlah'] = $this->sqlintegrasiProcedure($search)->get()->num_rows();
        return $result;

        $this->db->close();
    }

    private function sqlambilObservasi($search)
    {
        $this->db->select("a.id as id_tindakan, a.id_satset_sistolik, a.id_satset_diastolik, a.id_satset_nadi, a.id_satset_rr, a.id_satset_suhu, lp.tanggal_layanan, lp.id, ss.nama as nama_poli, p.nama as nama_pasien, p.id as no_rm")
            ->from('sm_anamnesa as a')
            ->join('sm_layanan_pendaftaran as lp', 'lp.id = a.id_layanan_pendaftaran', 'left')
            ->join('sm_pendaftaran as pd', 'lp.id_pendaftaran = pd.id', 'left')
            ->join('sm_pasien as p', 'pd.id_pasien = p.id', 'left')
            ->join('sm_spesialisasi as ss', 'ss.id = lp.id_unit_layanan', 'left');

        if ($search['id'] !== '') :
            $this->db->where('p.id', $search['id']);
        endif;

        if ($search['nama'] !== '') :
            $this->db->where("p.nama ilike '%" . strtolower($search['nama']) . "%'");
        endif;

        if ($search['poli'] !== '') :
            $this->db->where("ss.nama ilike '%" . strtolower($search['poli']) . "%'");
        endif;

        $this->db->where('a.id_satset_sistolik is not null');
        $this->db->where('a.id_satset_sistolik !=', "");
        $this->db->where('a.id_satset_diastolik is not null');
        $this->db->where('a.id_satset_diastolik !=', "");
        $this->db->where('a.id_satset_nadi is not null');
        $this->db->where('a.id_satset_nadi !=', "");
        $this->db->where('a.id_satset_rr is not null');
        $this->db->where('a.id_satset_rr !=', "");
        $this->db->where('a.id_satset_suhu is not null');
        $this->db->where('a.id_satset_suhu !=', "");
        $this->db->where('lp.jenis_layanan', 'Poliklinik');

        return $this->db->order_by('lp.id', 'desc');
        
    }

    private function _listambilObservasi($limit, $start, $search)
    {
        $this->sqlambilObservasi($search);
        if ($limit !== 0) :
            $this->db->limit($limit, $start);
        endif;

        return $this->db->get()->result();
    }

    function ambilObservasi($limit, $start, $search)
    {
        $result['data'] = $this->_listambilObservasi($limit, $start, $search);
        $result['jumlah'] = $this->sqlambilObservasi($search)->get()->num_rows();
        return $result;

        $this->db->close();
    }

    function cekDataAnamnesa($id)
    {
        return $this->db->select("a.id as id_anamnesa, a.waktu, a.rr, tm.ihs_number, a.tensi_sistolik, a.tensi_diastolik, a.suhu, a.nadi, a.id_satset_sistolik, a.id_satset_diastolik, a.id_satset_nadi, a.id_satset_rr, a.id_satset_suhu, lp.tanggal_layanan, lp.id, ss.nama as nama_poli, p.nama as nama_pasien, p.id as no_rm, p.ihsn, lp.id_encounter")
            ->from('sm_anamnesa as a')
            ->join('sm_layanan_pendaftaran as lp', 'lp.id = a.id_layanan_pendaftaran', 'left')
            ->join('sm_pendaftaran as pd', 'lp.id_pendaftaran = pd.id', 'left')
            ->join('sm_pasien as p', 'pd.id_pasien = p.id', 'left')
            ->join('sm_spesialisasi as ss', 'ss.id = lp.id_unit_layanan', 'left')
            ->join('sm_tenaga_medis as tm', 'lp.id_dokter = tm.id', 'left')
            ->where('a.id', $id)
            ->get()
            ->row();
        
        $this->db->close();
        
    }

    private function sqlintegrasiObservasi($search)
    {
        $this->db->select("a.id as id_tindakan, a.id_satset_sistolik, a.id_satset_diastolik, a.id_satset_nadi, a.id_satset_rr, a.id_satset_suhu, lp.tanggal_layanan, lp.id, ss.nama as nama_poli, p.nama as nama_pasien, p.id as no_rm")
            ->from('sm_anamnesa as a')
            ->join('sm_layanan_pendaftaran as lp', 'lp.id = a.id_layanan_pendaftaran', 'left')
            ->join('sm_pendaftaran as pd', 'lp.id_pendaftaran = pd.id', 'left')
            ->join('sm_pasien as p', 'pd.id_pasien = p.id', 'left')
            ->join('sm_spesialisasi as ss', 'ss.id = lp.id_unit_layanan', 'left')
            ->where('id_satset_sistolik IS NULL', null, false)
            ->or_where('id_satset_diastolik IS NULL', null, false)
            ->or_where('id_satset_nadi IS NULL', null, false)
            ->or_where('id_satset_rr IS NULL', null, false)
            ->or_where('id_satset_suhu IS NULL', null, false);

        if ($search['id'] !== '') :
            $this->db->where('p.id', $search['id']);
        endif;

        if ($search['nama'] !== '') :
            $this->db->where("p.nama ilike '%" . strtolower($search['nama']) . "%'");
        endif;

        if ($search['poli'] !== '') :
            $this->db->where("ss.nama ilike '%" . strtolower($search['poli']) . "%'");
        endif;

        $this->db->where('lp.jenis_layanan', 'Poliklinik');

        return $this->db->order_by('lp.id', 'desc');
        
    }

    private function _listintegrasiObservasi($limit, $start, $search)
    {
        $this->sqlintegrasiObservasi($search);
        if ($limit !== 0) :
            $this->db->limit($limit, $start);
        endif;

        return $this->db->get()->result();
    }

    function integrasiObservasi($limit, $start, $search)
    {
        $result['data'] = $this->_listintegrasiObservasi($limit, $start, $search);
        $result['jumlah'] = $this->sqlintegrasiObservasi($search)->get()->num_rows();
        return $result;

        $this->db->close();
    }

    function cekidLayananPendaftaran($id)
    {
        return $this->db->select("lp.*, as.id_satset_sistolik, as.id_satset_diastolik, as.id_satset_nadi, as.id_satset_rr, as.id_satset_suhu, sp.nama as nama_dokter, sp.nik as nik_dokter, tm.ihs_number, tm.id as id_nakes, ss.id as id_poli, p.ihsn, p.nama as nama_pasien, p.no_identitas, p.id as no_rm, ab.kode_booking, ab.task_tiga, ab.task_empat, ab.task_lima, p.consentid, ps.id as id_profil_pasien, ps.id_satset_alergi, as.id_satset_clinicalimpression, as.id as id_anamnesa, as.prognosis")
            ->from('sm_layanan_pendaftaran as lp')
            ->join('sm_pendaftaran as pd', 'lp.id_pendaftaran = pd.id', 'left')
            ->join('sm_pasien as p', 'pd.id_pasien = p.id', 'left')
            ->join('sm_profil_pasien as ps', 'pd.id_pasien = ps.id_pasien', 'left')
            ->join('sm_spesialisasi as ss', 'ss.id = lp.id_unit_layanan', 'left')
            ->join('sm_anamnesa as as', 'as.id_layanan_pendaftaran = lp.id', 'left')
            ->join('sm_unit as su', 'su.id = ss.id_unit', 'left')
            ->join('sm_antrian_bpjs as ab', 'ab.id_pendaftaran = pd.id', 'left')
            ->join('sm_tenaga_medis as tm', 'lp.id_dokter = tm.id', 'left')
            ->join('sm_pegawai as sp', 'tm.id_pegawai = sp.id', 'left')
            ->where('lp.id', $id)
            ->get()
            ->row();
        
        $this->db->close();
        
    }

    function cekDataLayananPendaftaran($id)
    {
        return $this->db->select("lp.*, pd.tanggal_keluar as daftar_selesai, sp.nama as nama_dokter, sp.nik as nik_dokter, skk.id as surat_kontrol, skk.tanggal as tanggal_kontrol, tmx.ihs_number as ihs_request, spx.nama as dokter_request, tmy.ihs_number as ihs_performer, spy.nama as dokter_performer, tm.ihs_number, tm.id as id_nakes, ss.id as id_poli, p.ihsn, p.nama as nama_pasien, p.no_identitas, p.id as no_rm, ab.kode_booking, ab.task_tiga, ab.task_empat, ab.task_lima, abx.waktu_estimasi")
            ->from('sm_layanan_pendaftaran as lp')
            ->join('sm_pendaftaran as pd', 'lp.id_pendaftaran = pd.id')
            ->join('sm_surat_kontrol as skk', 'skk.id_layanan_pendaftaran = lp.id', 'left')
            ->join('sm_pasien as p', 'pd.id_pasien = p.id', 'left')
            ->join('sm_spesialisasi as ss', 'ss.id = lp.id_unit_layanan', 'left')
            ->join('sm_unit as su', 'su.id = ss.id_unit', 'left')
            ->join('sm_antrian_bpjs as ab', 'ab.id_pendaftaran = pd.id', 'left')
            ->join('sm_tenaga_medis as tm', 'lp.id_dokter = tm.id', 'left')
            ->join('sm_pegawai as sp', 'tm.id_pegawai = sp.id', 'left')
            ->join('sm_tenaga_medis as tmx', 'skk.id_dokter_asal = tmx.id', 'left')
            ->join('sm_pegawai as spx', 'tmx.id_pegawai = spx.id', 'left')
            ->join('sm_tenaga_medis as tmy', 'skk.id_dokter_tujuan = tmy.id', 'left')
            ->join('sm_pegawai as spy', 'tmy.id_pegawai = spy.id', 'left')
            ->join('sm_antrian_bpjs as abx', 'abx.id_skd = skk.id', 'left')
            ->where('lp.id', $id)
            ->get()
            ->row();
        
        $this->db->close();
        
    }

    function cekLayananGizi($id)
    {
        return $this->db->select("kg.*, lp.jenis_layanan, ss.id as id_poli, p.ihsn, p.nama as nama_pasien, p.no_identitas, p.id as no_rm")
            ->from('sm_konsultasi_gizi as kg')
            ->join('sm_layanan_pendaftaran as lp', 'kg.id_layanan_pendaftaran = lp.id', 'left')
            ->join('sm_pendaftaran as pd', 'lp.id_pendaftaran = pd.id', 'left')
            ->join('sm_pasien as p', 'pd.id_pasien = p.id', 'left')
            ->join('sm_spesialisasi as ss', 'ss.id = lp.id_unit_layanan', 'left')
            ->where('kg.id_layanan_pendaftaran', $id)
            ->order_by('kg.id_kg', 'asc')
            ->limit(1)
            ->get()
            ->row();
        
        $this->db->close();
        
    }

    function cekDataGizi($id)
    {
        return $this->db->select("kg.*, lp.id_encounter, tm.id as id_tenaga_medis, sp.nama as nama_petugas, sp.nik as nik_dokter, tm.ihs_number, p.ihsn, p.nama as nama_pasien, p.no_identitas, p.id as no_rm")
            ->from('sm_konsultasi_gizi as kg')
            ->join('sm_layanan_pendaftaran as lp', 'kg.id_layanan_pendaftaran = lp.id', 'left')
            ->join('sm_pendaftaran as pd', 'lp.id_pendaftaran = pd.id', 'left')
            ->join('sm_pasien as p', 'pd.id_pasien = p.id', 'left')
            ->join('sm_translucent as tr', 'kg.kg_petugas = tr.id', 'left')
            ->join('sm_tenaga_medis as tm', 'kg.kg_petugas = tm.id_pegawai', 'left')
            ->join('sm_pegawai as sp', 'tr.id = sp.id', 'left')
            ->where('kg.id_kg', $id)
            ->get()
            ->row();
        
        $this->db->close();
        
    }

    function cekDataPendaftaran($id)
    {
        return $this->db->select("lp.*, pd.tanggal_keluar as daftar_selesai, sp.nama as nama_dokter, sp.nik as nik_dokter, skk.id as surat_kontrol, skk.tanggal as tanggal_kontrol, tmx.ihs_number as ihs_request, spx.nama as dokter_request, tmy.ihs_number  as ihs_performer, spy.nama as dokter_performer, tm.ihs_number, tm.id as id_nakes, ss.id as id_poli, p.ihsn, p.nama as nama_pasien, p.no_identitas, p.id as no_rm, ab.kode_booking, ab.task_tiga, ab.task_empat, ab.task_lima, abx.waktu_estimasi")
            ->from('sm_layanan_pendaftaran as lp')
            ->join('sm_pendaftaran as pd', 'lp.id_pendaftaran = pd.id')
            ->join('sm_surat_kontrol as skk', 'skk.id_layanan_pendaftaran = lp.id', 'left')
            ->join('sm_pasien as p', 'pd.id_pasien = p.id', 'left')
            ->join('sm_spesialisasi as ss', 'ss.id = lp.id_unit_layanan', 'left')
            ->join('sm_unit as su', 'su.id = ss.id_unit', 'left')
            ->join('sm_antrian_bpjs as ab', 'ab.id_pendaftaran = pd.id', 'left')
            ->join('sm_tenaga_medis as tm', 'lp.id_dokter = tm.id', 'left')
            ->join('sm_pegawai as sp', 'tm.id_pegawai = sp.id', 'left')
            ->join('sm_tenaga_medis as tmx', 'skk.id_dokter_asal = tmx.id', 'left')
            ->join('sm_pegawai as spx', 'tmx.id_pegawai = spx.id', 'left')
            ->join('sm_tenaga_medis as tmy', 'skk.id_dokter_tujuan = tmy.id', 'left')
            ->join('sm_pegawai as spy', 'tmy.id_pegawai = spy.id', 'left')
            ->join('sm_antrian_bpjs as abx', 'abx.id_skd = skk.id', 'left')
            ->where('pd.id', $id, true)
            ->order_by('lp.id', 'desc')
            ->get()
            ->result();
        
        $this->db->close();
        
    }

    function cekDataOrganisasi($id)
    {
        return $this->db->select("so.*, kss.organization as kode_organisasi")
            ->from('sm_organisasi as so')
            ->join('sm_konfigurasi_satu_sehat as kss', 'kss.id = so.id_organisasi')
            ->where('so.id', $id)
            ->get()
            ->row();
        
        $this->db->close();
        
    }

    function cekDataLokasi($id)
    {
        $query      = "";
        $select = "select sl.id, sl.nama, sl.status, sl.integrasi_baru, sl.id_organisasi, sl.id_parent, sl.kode_fisik, sl2.integrasi_baru as integrasi_induk, sl2.id as id_induk1, sl2.nama as nama_induk1, sl3.id as id_induk2, sl3.nama as nama_induk2, sl4.id as id_induk3, sl4.nama as nama_induk3 ";

        $sql = "    from sm_lokasi as sl 
                    left join sm_lokasi as sl2 on sl.id_parent = sl2.id
                    left join sm_lokasi as sl3 on sl2.id_parent = sl3.id
                    left join sm_lokasi as sl4 on sl3.id_parent = sl4.id
                    left join sm_konfigurasi_satu_sehat as kss on kss.id = sl.id_konfigurasi where sl.id = '" . $id . "'
                    ";

        $data = $this->db->query($select . $sql)->row();

        return $data;

        $this->db->close();
        
    }

    function dataOrganisasi($id)
    {
        return $this->db->select("so.integrasi_baru")
            ->from('sm_organisasi as so')
            ->where('so.id', $id)
            ->get()
            ->row();
        
        $this->db->close();
        
    }

    function kodeFisik($id)
    {
        return $this->db->select("slt.code, slt.display")
            ->from('sm_lokasi_tipe_fisik as slt')
            ->where('slt.id', $id)
            ->get()
            ->row();
        
        $this->db->close();
        
    }

    function cekDataPoli($nama, $idhub)
    {
        return $this->db->select("sl.integrasi_baru, sl.nama")
            ->from('sm_lokasi as sl')
            ->where('sl.nama_tabel', $nama)
            ->where('sl.id_penghubung', $idhub)
            ->get()
            ->row();
        
        $this->db->close();
        
    }

    function cekParentOrganisasi($id)
    {
        return $this->db->select("so.*, kss.organization as kode_organisasi")
            ->from('sm_organisasi as so')
            ->join('sm_konfigurasi_satu_sehat as kss', 'kss.id = so.id_organisasi')
            ->where('so.id_parent', $id)
            ->get()
            ->result();
        
        $this->db->close();
        
    }

    function cekParentLokasi($id)
    {
        return $this->db->select("sl.*")
            ->from('sm_lokasi as sl')
            ->where('sl.id_parent', $id)
            ->get()
            ->result();
        
        $this->db->close();
        
    }

    function cekSuratKontrol($id)
    {
        return $this->db->select("sk.id")
            ->from('sm_surat_kontrol as sk')
            ->where('sk.id_pendaftaran', $id, true)
            ->get()
            ->row();
        
        $this->db->close();
        
    }

    function cekPrimaryCondition($id)
    {
        return $this->db->select("d.id as id_diagnosis, d.id_kondisi, g.kode_icdx, lp.tanggal_layanan, g.nama as nama_diagnosis, ss.nama as nama_poli, p.nama as nama_pasien, p.id as no_rm, p.ihsn, p.consentid, lp.id_encounter, lp.tindak_lanjut, pd.id as id_pendaftaran")
            ->from('sm_diagnosa as d')
            ->join('sm_golongan_sebab_sakit as g', 'g.id = d.id_pengkodean', 'left')
            ->join('sm_layanan_pendaftaran as lp', 'lp.id = d.id_layanan_pendaftaran', 'left')
            ->join('sm_pendaftaran as pd', 'lp.id_pendaftaran = pd.id', 'left')
            ->join('sm_pasien as p', 'pd.id_pasien = p.id', 'left')
            ->join('sm_spesialisasi as ss', 'ss.id = lp.id_unit_layanan', 'left')
            ->where('d.id', $id, true)
            ->where('d.prioritas', 'Utama')
            ->get()
            ->row();
        
        $this->db->close();
        
    }

    function cekTindakanPasien($id)
    {
        return $this->db->select("ttp.id as id_tindakan, ttp.id_pengkodean, ttp.id_tindakan_satset, l.nama, icd.nama as nama_icd, icd.icd9, lp.tanggal_layanan, p.nama as nama_pasien, p.id as no_rm, p.ihsn, lp.id_encounter")
            ->from('sm_tarif_tindakan_pasien as ttp')
            ->join('sm_tarif_pelayanan as tp', 'tp.id = ttp.id_tarif_pelayanan', 'left')
            ->join('sm_layanan as l', 'l.id = tp.id_layanan', 'left')
            ->join('sm_icd_ix as icd', 'icd.id = ttp.id_pengkodean', 'left')
            ->join('sm_layanan_pendaftaran as lp', 'lp.id = ttp.id_layanan_pendaftaran', 'left')
            ->join('sm_pendaftaran as pd', 'lp.id_pendaftaran = pd.id', 'left')
            ->join('sm_pasien as p', 'pd.id_pasien = p.id', 'left')
            ->where('ttp.id', $id, true)
            ->get()
            ->row();
        
        $this->db->close();
        
    }

    function getDataLayananPasien($idLayanan)
    {
        return $this->db->select("lp.jenis_layanan", false)
            ->from('sm_layanan_pendaftaran as lp')
            ->where('lp.id', $idLayanan, true)
            ->get()
            ->row();
    }

    function cekSecondaryCondition($id)
    {
        return $this->db->select("d.id as id_diagnosis, d.id_kondisi, g.kode_icdx, lp.tanggal_layanan, g.nama as nama_diagnosis, ss.nama as nama_poli, p.nama as nama_pasien, p.id as no_rm, p.ihsn, p.consentid, lp.id_encounter")
            ->from('sm_diagnosa as d')
            ->join('sm_golongan_sebab_sakit as g', 'g.id = d.id_pengkodean', 'left')
            ->join('sm_layanan_pendaftaran as lp', 'lp.id = d.id_layanan_pendaftaran', 'left')
            ->join('sm_pendaftaran as pd', 'lp.id_pendaftaran = pd.id', 'left')
            ->join('sm_pasien as p', 'pd.id_pasien = p.id', 'left')
            ->join('sm_spesialisasi as ss', 'ss.id = lp.id_unit_layanan', 'left')
            ->where('d.id', $id, true)
            ->where('d.prioritas', 'Sekunder')
            ->get()
            ->row();
        
        $this->db->close();
        
    }

    function cekDiagnosisEncounter($id)
    {
        return $this->db->select("d.id as id_diagnosis, d.id_kondisi, g.kode_icdx, lp.tanggal_layanan, g.nama as nama_diagnosis, ss.nama as nama_poli, p.nama as nama_pasien, p.id as no_rm, p.ihsn, lp.id_encounter, d.prioritas")
            ->from('sm_diagnosa as d')
            ->join('sm_golongan_sebab_sakit as g', 'g.id = d.id_pengkodean', 'left')
            ->join('sm_layanan_pendaftaran as lp', 'lp.id = d.id_layanan_pendaftaran', 'left')
            ->join('sm_pendaftaran as pd', 'lp.id_pendaftaran = pd.id', 'left')
            ->join('sm_pasien as p', 'pd.id_pasien = p.id', 'left')
            ->join('sm_spesialisasi as ss', 'ss.id = lp.id_unit_layanan', 'left')
            ->where('lp.id', $id, true)
            ->order_by('d.id')
            ->get()
            ->result();
        
        $this->db->close();
        
    }

    function cekIhsnPasien($id)
    {
        return $this->db->select("p.ihsn")
            ->from('sm_pasien as p')
            ->where('p.id', $id, true)
            ->get()
            ->row();
        
        $this->db->close();
        
    }

    function postEncounter($url, $data, $header)
    {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US; rv:1.9.1.2) Gecko/20090729 Firefox/3.5.2 GTB5');
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 4);
        curl_setopt($ch, CURLOPT_TIMEOUT, 4);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        if ($header !== null) {
            curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        }
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $output['result'] = curl_exec($ch);
        $output['respon'] = curl_getinfo($ch, CURLINFO_RESPONSE_CODE);
        if (curl_errno($ch)) {
            $output['error'] = curl_error($ch);
            $output['result'] = false;
            $output['respon'] = 408;
        }
        curl_close($ch);

        return $output;
    }

    function putEncounter($url, $data, $header)
    {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)');
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT'); // method PUT
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 4);
        curl_setopt($ch, CURLOPT_TIMEOUT, 4);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data); // bisa berupa JSON string
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        if ($header !== null) {
            curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        }

        $output['result'] = curl_exec($ch);
        $output['respon'] = curl_getinfo($ch, CURLINFO_HTTP_CODE); // lebih umum & kompatibel
        if (curl_errno($ch)) {
            $output['error'] = curl_error($ch);
            $output['result'] = false;
            $output['respon'] = 408;
        }
        curl_close($ch);

        return $output;
    }

    function putComposition($url, $data, $header = [])
    {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0');
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 4);
        curl_setopt($ch, CURLOPT_TIMEOUT, 4);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);

        // Tambahkan header jika ada
        if (!empty($header)) {
            curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        }

        // Eksekusi cURL
        $result = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        // Tangkap error jika ada
        if (curl_errno($ch)) {
            $error_msg = curl_error($ch);
        } else {
            $error_msg = null;
        }

        curl_close($ch);

        return [
            'result' => $result,
            'respon' => $httpCode,
            'error' => $error_msg
        ];
    }

    private function ambilEkor($params)
    {
        $sql = "select *, 
                (null) as ekor, 
                '' as organisasi
                from sm_organisasi as so 
                where id_parent='" . $params . "'
                order by CAST(REPLACE(so.kode, '.', '') AS INTEGER)";
                // order by cast(kode as varchar)";
        return $this->db->query($sql)->result();
    }

    function getDaftarOrganisasi($limit=null, $start=null)
    {
        $q = '';

        if ($limit != null) :
            $limit = " limit " . $limit . " offset " . $start;
        else :
            $limit = '';
        endif;

        $sql_organisasi = "select *, 
                        '' as kode, (null) as ekor, 
                        '' as induk_organisasi 
                        from sm_konfigurasi_satu_sehat kss
                        where kss.id is not null order by kss.nama";
        $root = $this->db->query($sql_organisasi . $limit)->result();
        
        foreach ($root as $key => $val) :

            $sql_root = "select so.*, 
                        (null) as ekor, 
                        COALESCE(kss.nama, '') as induk_organisasi 
                        from sm_organisasi so 
                        join sm_konfigurasi_satu_sehat kss on (kss.id = so.id_organisasi) 
                        where so.id_parent is null $q 
                        and so.id_organisasi = '" . $val->id . "' 
                        order by cast(so.kode as int4)";
            $ekor0 = $this->db->query($sql_root)->result();
            
            if (count($ekor0) > 0) :
                $root[$key]->ekor = $ekor0;
                foreach ($ekor0 as $key1 => $val1) :
                    $ekor = $this->ambilEkor($val1->id);

                    if (count($ekor) > 0) :
                        $root[$key]->ekor[$key1]->ekor = $ekor;
                        foreach ($ekor as $key2 => $val2) :
                            $ekor2 = $this->ambilEkor($val2->id);

                            if (count($ekor2) > 0) :
                                $root[$key]->ekor[$key1]->ekor[$key2]->ekor = $ekor2; 
                                foreach ($ekor2 as $key3 => $val3) :
                                    $ekor3 = $this->ambilEkor($val3->id);

                                    if (count($ekor3) > 0) :
                                        $root[$key]->ekor[$key1]->ekor[$key2]->ekor[$key3]->ekor = $ekor3; 
                                        foreach ($ekor3 as $key4 => $val4) :
                                            $ekor4 = $this->ambilEkor($val4->id);

                                            if (count($ekor4) > 0) :
                                                $root[$key]->ekor[$key1]->ekor[$key2]->ekor[$key3]->ekor[$key4]->ekor = $ekor4;
                                                foreach ($ekor4 as $key5 => $val5) :
                                                    $ekor5 = $this->ambilEkor($val5->id);

                                                    if (count($ekor5) > 0) :
                                                        $root[$key]->ekor[$key1]->ekor[$key2]->ekor[$key3]->ekor[$key4]->ekor[$key5]->ekor = $ekor5;
                                                        foreach ($ekor5 as $key6 => $val6) :
                                                            $ekor6 = $this->ambilEkor($val6->id);

                                                            if (count($ekor6) > 0) :
                                                                $root[$key]->ekor[$key1]->ekor[$key2]->ekor[$key3]->ekor[$key4]->ekor[$key5]->ekor[$key6]->ekor = $ekor6;
                                                            endif;

                                                        endforeach;
                                                    endif;

                                                endforeach;
                                            endif;

                                        endforeach;
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
        $result['jumlah'] = $this->db->query($sql_organisasi)->num_rows();
        return $result;
    }

    private function ambilEkorLokas($params)
    {
        $sql = "select *, 
                (null) as ekor, 
                '' as lokasi, 
                replace(kode, '.', '') as kode_oto
                from sm_lokasi as so 
                where id_parent='" . $params . "'
                order by CAST(REPLACE(so.kode, '.', '') AS INTEGER)";
                // order by cast(kode as varchar)";
        return $this->db->query($sql)->result();
    }

    function getDaftarLokasi($limit=null, $start=null)
    {
        $q = '';

        if ($limit != null) :
            $limit = " limit " . $limit . " offset " . $start;
        else :
            $limit = '';
        endif;

        $sql_lokasi = "select *, 
                        '' as kode, (null) as ekor, 
                        '' as induk_lokasi 
                        from sm_konfigurasi_satu_sehat so
                        where id is not null order by nama";
        $root = $this->db->query($sql_lokasi . $limit)->result();
        
        foreach ($root as $key => $val) :

            $sql_root = "select sl.*, 
                        (null) as ekor, 
                        COALESCE(kss.nama, '') as induk_lokasi 
                        from sm_lokasi sl 
                        join sm_konfigurasi_satu_sehat kss on (kss.id = sl.id_konfigurasi) 
                        where sl.id_parent is null $q 
                        and sl.id_konfigurasi = '" . $val->id . "' 
                        order by cast(kode as int4)";
            $ekor0 = $this->db->query($sql_root)->result();

            if (count($ekor0) > 0) :
                $root[$key]->ekor = $ekor0;
                foreach ($ekor0 as $key1 => $val1) :
                    $ekor = $this->ambilEkorLokas($val1->id);

                    if (count($ekor) > 0) :
                        $root[$key]->ekor[$key1]->ekor = $ekor;
                        foreach ($ekor as $key2 => $val2) :
                            $ekor2 = $this->ambilEkorLokas($val2->id);

                            if (count($ekor2) > 0) :
                                $root[$key]->ekor[$key1]->ekor[$key2]->ekor = $ekor2; 
                                foreach ($ekor2 as $key3 => $val3) :
                                    $ekor3 = $this->ambilEkorLokas($val3->id);

                                    if (count($ekor3) > 0) :
                                        $root[$key]->ekor[$key1]->ekor[$key2]->ekor[$key3]->ekor = $ekor3; 
                                        foreach ($ekor3 as $key4 => $val4) :
                                            $ekor4 = $this->ambilEkorLokas($val4->id);

                                            if (count($ekor4) > 0) :
                                                $root[$key]->ekor[$key1]->ekor[$key2]->ekor[$key3]->ekor[$key4]->ekor = $ekor4;
                                                foreach ($ekor4 as $key5 => $val5) :
                                                    $ekor5 = $this->ambilEkorLokas($val5->id);

                                                    if (count($ekor5) > 0) :
                                                        $root[$key]->ekor[$key1]->ekor[$key2]->ekor[$key3]->ekor[$key4]->ekor[$key5]->ekor = $ekor5;
                                                        foreach ($ekor5 as $key6 => $val6) :
                                                            $ekor6 = $this->ambilEkorLokas($val6->id);

                                                            if (count($ekor6) > 0) :
                                                                $root[$key]->ekor[$key1]->ekor[$key2]->ekor[$key3]->ekor[$key4]->ekor[$key5]->ekor[$key6]->ekor = $ekor6;
                                                            endif;

                                                        endforeach;
                                                    endif;

                                                endforeach;
                                            endif;

                                        endforeach;
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
        $result['jumlah'] = $this->db->query($sql_lokasi)->num_rows();
        return $result;
    }

    function getDaftarCariLokasi($limit, $start, $search)
    {
        $q = '';

        if ($search['nama'] !== '') {
            $q .= " and so.nama ilike '%" . $search['nama'] . "%' ";
        }

        if ($search['id_organisasi'] !== '') {
            $q .= " and kss.id = '" . $search['id_organisasi'] . "' ";
        }

        $limit = " limit " . $limit . " offset " . $start;

        $select = "select so.*, 
                    COALESCE(sos.nama, '') as induk, 
                    kss.nama as induk_organisasi ";
        $count = "select count(*) as count ";
        $sql = "from sm_lokasi so
                left join sm_lokasi sos on (sos.id = so.id_parent) 
                join sm_konfigurasi_satu_sehat kss on (kss.id = so.id_organisasi)
                where so.id is not null $q";
        $order = " order by so.kode";
        $query = $this->db->query($select . $sql . $order . $limit);
        $result['data'] = $query->result();
        $result['jumlah'] = $this->db->query($count . $sql . $q)->row()->count;
        return $result;
    }

    function getDaftarCariOrganisasi($limit, $start, $search)
    {
        $q = '';

        if ($search['nama'] !== '') {
            $q .= " and so.nama ilike '%" . $search['nama'] . "%' ";
        }

        if ($search['id_organisasi'] !== '') {
            $q .= " and kss.id = '" . $search['id_organisasi'] . "' ";
        }

        $limit = " limit " . $limit . " offset " . $start;

        $select = "select so.*, 
                    COALESCE(sos.nama, '') as induk, 
                    kss.nama as induk_organisasi ";
        $count = "select count(*) as count ";
        $sql = "from sm_organisasi so
                left join sm_organisasi sos on (sos.id = so.id_parent) 
                join sm_konfigurasi_satu_sehat kss on (kss.id = so.id_organisasi)
                where so.id is not null $q";
        $order = " order by so.kode";
        $query = $this->db->query($select . $sql . $order . $limit);
        $result['data'] = $query->result();
        $result['jumlah'] = $this->db->query($count . $sql . $q)->row()->count;
        return $result;
    }

    function ambilIndukOrganisasi($q, $start, $limit)
    {
        $limit = " limit " . $limit . " offset " . $start;
        $sql   = "select * from sm_konfigurasi_satu_sehat
                  where nama ilike ('%$q%')  order by nama ";
        $data['data'] = $this->db->query($sql . $limit)->result();
        $data['total'] = $this->db->query($sql)->num_rows();
        return $data;
    }

    function ambilTipeFisik($q, $start, $limit)
    {
        $limit = " limit " . $limit . " offset " . $start;
        $sql   = "select * from sm_lokasi_tipe_fisik
                  where display ilike ('%$q%')  order by display ";
        $data['data'] = $this->db->query($sql . $limit)->result();
        $data['total'] = $this->db->query($sql)->num_rows();
        return $data;
    }

    function ambilKategori($q, $start, $limit)
    {
        $limit = " limit " . $limit . " offset " . $start;
        $sql   = "select * from sm_lokasi_tabel
                  where nama ilike ('%$q%')  order by nama ";
        $data['data'] = $this->db->query($sql . $limit)->result();
        $data['total'] = $this->db->query($sql)->num_rows();
        return $data;
    }

    function getLokasiSistem($nama, $q, $start, $limit)
    {   

        $limit = " limit " . $limit . " offset " . $start;

        if($nama === 'sm_bed'){

            $sql   = "select tb.id, tb.no_bed, sr.no_ruang, sb.nama from sm_bed tb left join sm_ruang sr on (tb.id_ruang = sr.id) left join sm_bangsal sb on (sr.id_bangsal = sb.id)
                      where sb.nama ilike ('%$q%')  order by sb.nama,sr.no_ruang,tb.no_bed ";
        }

        if($nama === 'sm_ruang'){

            $sql   = "select sr.id, sr.no_ruang, sb.nama from sm_ruang sr left join sm_bangsal sb on (sr.id_bangsal = sb.id)
                      where sb.nama ilike ('%$q%')  order by sb.nama,sr.no_ruang ";
        }

        if($nama === 'sm_spesialisasi'){

            $sql   = "select sp.id, sp.nama from sm_spesialisasi sp
                      where sp.nama ilike ('%$q%')  order by sp.nama ";
        }

        if($nama === 'sm_unit'){

            $sql   = "select sp.id, sp.nama from sm_unit sp
                      where sp.nama ilike ('%$q%')  order by sp.nama ";
        }

        $data['data'] = $this->db->query($sql . $limit)->result();
        $data['total'] = $this->db->query($sql)->num_rows();

        return $data;
        

    }

    function getPilihInduk($q, $id_jenis, $jenis, $start, $limit)
    {
        $w = "";
        if ($id_jenis !== '') :
            $w .= " and kss.id = '" . $id_jenis . "' ";
        endif;

        if ($jenis !== '') :
            $w .= " and kss.nama ilike '%" . $jenis . "%' ";
        endif;

        $limit = " limit " . $limit . " offset " . $start;

        $sql = "select so.*, 
                coalesce(sos.nama, '<i>Tidak ada induk organisasi</i>') as induk_organisasi, 
                coalesce(sos.nama,'') as induk, 
                coalesce(kss.nama,'') as nama_induk_organisasi 
                from sm_organisasi so
                left join sm_organisasi sos on (so.id_parent = sos.id)
                left join sm_konfigurasi_satu_sehat kss on (sos.id_organisasi = kss.id or so.id_organisasi = kss.id)
                where (so.nama ilike ('%$q%') or so.kode ilike ('$q%')) $w 
                order by so.kode ";
        $data['data'] = $this->db->query($sql . $limit)->result();
        $data['total'] = $this->db->query($sql)->num_rows();
        return $data;
    }

    function getPilihLokasi($q, $id_jenis, $jenis, $start, $limit)
    {
        $w = "";
        if ($id_jenis !== '') :
            $w .= " and kss.id = '" . $id_jenis . "' ";
        endif;

        if ($jenis !== '') :
            $w .= " and kss.nama ilike '%" . $jenis . "%' ";
        endif;

        $limit = " limit " . $limit . " offset " . $start;

        $sql = "select lo.*, 
                coalesce(lok.nama, '<i>Tidak ada induk organisasi</i>') as induk_organisasi, 
                coalesce(lok.nama,'') as induk, 
                coalesce(kss.nama,'') as nama_induk_organisasi 
                from sm_lokasi lo
                left join sm_lokasi lok on (lo.id_parent = lok.id)
                left join sm_konfigurasi_satu_sehat kss on (lok.id_organisasi = kss.id or lo.id_organisasi = kss.id)
                where (lo.nama ilike ('%$q%') or lo.kode ilike ('$q%')) $w 
                order by lo.kode ";
        $data['data'] = $this->db->query($sql . $limit)->result();
        $data['total'] = $this->db->query($sql)->num_rows();
        return $data;
    }

    function organisasiCode($tabel, $induk, $maksimum)
    {
        $sql = "select kode from " . $tabel . "
                where id_parent = '" . $induk . "' 
                order by id desc limit 1 offset 0";
        $query = $this->db->query($sql)->row();

        if ($query) :
            $kode = $query->kode;
        else :
            $kode = null;
        endif;

        $new_kode = '';
        if ($kode === null) :
            // first child
            $kode = $this->db->where('id', $induk)
                ->get($tabel)
                ->row()
                ->kode;
            $kode_split = explode('.', $kode);
            $size = count($kode_split);

            if ($size >= $maksimum) :
                $new_kode = null;
            else :
                $new_kode = $kode . ".1";
            endif;

        else :
            $kode_split = explode('.', $kode);
            $size = count($kode_split) - 1;
            $last_kode = (int) $kode_split[$size];

            $temp_kode = '';
            for ($i = 0; $i < $size; $i++) :
                $temp_kode .= $kode_split[$i] . '.';
            endfor;

            $last_kode++;
            $new_kode = $temp_kode . $last_kode;
        endif;

        return $new_kode;
    }

    function execIndukCode($tabel)
    {
        $this->db->select('kode')
            ->from($tabel)
            ->where('id_parent is null')
            ->order_by('id', 'desc')
            ->limit(1, 0);
        $row = $this->db->get()->row();

        if ($row) :
            $new_kode = $row->kode;
            $new_kode++;
        else :
            $new_kode = '1';
        endif;

        return $new_kode;
    }

    function perbaruiDataOrganisasi($data)
    {
        $id = $data['id'];
        return $this->db->where('id', $id, true)->update('sm_organisasi as so', $data);
    }

    function simpanDataOrganisasi($data)
    {
        if ($data['id_parent'] !== null) :
            $jenis = $this->db->where('id', $data['id_parent'], true)
                ->get('sm_organisasi as so')
                ->row();
            if ((!empty($jenis)) & ($data['id_organisasi'] === null)) :
                $data['id_organisasi'] = $jenis->id_organisasi;
            endif;
        endif;

        return $this->db->insert('sm_organisasi as so', $data);
        
    }

    function simpanDataLokasi($data)
    {
        if ($data['id_parent'] !== null) :
            $jenis = $this->db->where('id', $data['id_parent'], true)
                ->get('sm_lokasi as sl')
                ->row();
            if ((!empty($jenis)) & ($data['id_konfigurasi'] === null)) :
                $data['id_konfigurasi'] = $jenis->id_konfigurasi;
            endif;
        endif;

        $this->db->insert('sm_lokasi', $data);

        $id = $this->db->insert_id();

        return $id;
        
    }

    function perbaruiDataLokasi($data)
    {
        $id = $data['id'];
        return $this->db->where('id', $id, true)->update('sm_lokasi', $data);
    }

    function getStatusOrganisasi()
    {
        return array(
            1 => 'Aktif',
            0 => 'Non Aktif'
        );
    }

    function getStatusLokasi()
    {
        return array(
            1 => 'Aktif',
            0 => 'Non Aktif'
        );
    }

    function getDataOrganisasi($id)
    {
        return $this->db->select("so.nama, so.status")
            ->from('sm_organisasi as so')
            ->where('so.id', $id)
            ->get()
            ->row();
        
        $this->db->close();
        
    }

    function getDataLokasi($id)
    {
        return $this->db->select("sl.nama, sl.status")
            ->from('sm_lokasi as sl')
            ->where('sl.id', $id)
            ->get()
            ->row();
        
        $this->db->close();
        
    }

    private function sqlambilMedication($search)
    {
        // Membuat query dasar dengan alias untuk nama tabel
        $this->db->select("DISTINCT ON (rrd.id)
            rrd.id, rrd.id_resep_r, rrd.id_barang, rrd.jual_harga, 
            rrd.dosis_racik, rrd.jumlah_pakai, rrd.formularium, rrd.kronis, 
            rrd.id_integrasi_resep, rrd.id_medication_request, 
            p.nama AS nama_pasien, p.id no_rm, r.tanggal_resep,
            sp.nama AS nama_poli,
            sb.nama AS nama_barang
        ");
        
        $this->db->from('sm_resep_r_detail rrd');
        
        // Menggunakan LEFT JOIN untuk mengambil semua data dari sm_resep_r_detail
        $this->db->join('sm_resep_r rr', 'rrd.id_resep_r = rr.id', 'left');
        $this->db->join('sm_resep r', 'rr.id_resep = r.id', 'left');
        $this->db->join('sm_layanan_pendaftaran lp', 'r.id_layanan_pendaftaran = lp.id', 'left');
        $this->db->join('sm_pendaftaran pd', 'lp.id_pendaftaran = pd.id', 'left');
        $this->db->join('sm_pasien p', 'pd.id_pasien = p.id', 'left');
        $this->db->join('sm_spesialisasi sp', 'lp.id_unit_layanan = sp.id', 'left');
        $this->db->join('sm_barang sb', 'rrd.id_barang = sb.id', 'left');  // Menambahkan join ke tabel sm_barang

        // Menambahkan kondisi pencarian berdasarkan parameter yang diberikan
        if (($search['tanggal_awal'] !== '') & ($search['tanggal_akhir'] !== '')) :
            $this->db->where("pd.tanggal_daftar BETWEEN '" . date2mysql($search['tanggal_awal']) . " 00:00:00' AND '" . date2mysql($search['tanggal_akhir']) . " 23:59:59'");
        endif;
        
        if (!empty($search['id'])) {
            $this->db->where('p.id', $search['id']);  // Pencocokan exact match untuk ID
        }

        if (!empty($search['nama'])) {
            $this->db->where("LOWER(p.nama) LIKE '%" . strtolower($search['nama']) . "%'");  // Pencocokan sebagian (LIKE) untuk nama
        }

        if (!empty($search['poli'])) {
            $this->db->where("LOWER(sp.nama) LIKE '%" . strtolower($search['poli']) . "%'");  // Pencocokan sebagian (LIKE) untuk poli
        }

        // Kondisi untuk id_integrasi_resep tidak NULL dan tidak kosong
        $this->db->where('rrd.id_integrasi_resep IS NOT NULL');
        $this->db->where('rrd.id_integrasi_resep !=', '');
        $this->db->where('lp.jenis_layanan', 'Poliklinik', true);

        return $this->db->order_by('rrd.id', 'desc'); // Mengurutkan berdasarkan rrd.id untuk DISTINCT ON
    }

    private function _listambilMedication($limit, $start, $search)
    {
        $this->sqlambilMedication($search);  // Membangun query dasar
        if ($limit !== 0) :
            $this->db->limit($limit, $start);  // Menambahkan batasan dan offset untuk pagination
        endif;

        return $this->db->get()->result();  // Mengembalikan hasil query
    }

    function ambilMedication($limit, $start, $search)
    {
        $result['data'] = $this->_listambilMedication($limit, $start, $search);  // Mendapatkan data dengan batasan dan offset
        $result['jumlah'] = $this->sqlambilMedication($search)->get()->num_rows();  // Mendapatkan jumlah total data sesuai kondisi pencarian
        return $result;

        $this->db->close();  // Menutup koneksi database
    }


    private function sqlIntegrasiMedication($search)
    {
        // Membuat query dasar dengan alias untuk nama tabel
        $this->db->select("DISTINCT ON (rrd.id)
            rrd.id, rrd.id_resep_r, rrd.id_barang, rrd.jual_harga, 
            rrd.dosis_racik, rrd.jumlah_pakai, rrd.formularium, rrd.kronis, 
            rrd.id_integrasi_resep, rrd.id_medication_request, 
            p.nama AS nama_pasien, p.id no_rm, r.tanggal_resep,
            sp.nama AS nama_poli,
            sb.nama AS nama_barang
        ");
        $this->db->from('sm_resep_r_detail rrd');
        
        // Menggunakan LEFT JOIN untuk mengambil semua data dari sm_resep_r_detail
        $this->db->join('sm_resep_r rr', 'rrd.id_resep_r = rr.id', 'left');
        $this->db->join('sm_resep r', 'rr.id_resep = r.id', 'left');
        $this->db->join('sm_layanan_pendaftaran lp', 'r.id_layanan_pendaftaran = lp.id', 'left');
        $this->db->join('sm_pendaftaran pd', 'lp.id_pendaftaran = pd.id', 'left');
        $this->db->join('sm_pasien p', 'pd.id_pasien = p.id', 'left');
        $this->db->join('sm_spesialisasi sp', 'lp.id_unit_layanan = sp.id', 'left');
        $this->db->join('sm_barang sb', 'rrd.id_barang = sb.id', 'left');  // Menambahkan join ke tabel sm_barang

        // Menambahkan kondisi pencarian berdasarkan parameter yang diberikan
        if (($search['tanggal_awal'] !== '') & ($search['tanggal_akhir'] !== '')) :
            $this->db->where("pd.tanggal_daftar BETWEEN '" . date2mysql($search['tanggal_awal']) . " 00:00:00' AND '" . date2mysql($search['tanggal_akhir']) . " 23:59:59'");
        endif;
        
        if (!empty($search['id'])) {
            $this->db->where('p.id', $search['id']);  // Pencocokan exact match untuk ID
        }

        if (!empty($search['nama'])) {
            $this->db->where("LOWER(p.nama) LIKE '%" . strtolower($search['nama']) . "%'");  // Pencocokan sebagian (LIKE) untuk nama
        }

        if (!empty($search['poli'])) {
            $this->db->where("LOWER(sp.nama) LIKE '%" . strtolower($search['poli']) . "%'");  // Pencocokan sebagian (LIKE) untuk poli
        }

        // Kondisi untuk id_integrasi_resep bernilai NULL atau kosong
        $this->db->where('(rrd.id_integrasi_resep IS NULL OR rrd.id_integrasi_resep = \'\')');
        $this->db->where('lp.jenis_layanan', 'Poliklinik', true);

        return $this->db->order_by('rrd.id', 'desc'); // Mengurutkan berdasarkan rrd.id untuk DISTINCT ON
    }

    private function _listIntegrasiMedication($limit, $start, $search)
    {
        $this->sqlIntegrasiMedication($search);  // Membangun query dasar
        if ($limit !== 0) :
            $this->db->limit($limit, $start);  // Menambahkan batasan dan offset untuk pagination
        endif;

        return $this->db->get()->result();  // Mengembalikan hasil query
    }

    function integrasiMedication($limit, $start, $search)
    {
        $result['data'] = $this->_listIntegrasiMedication($limit, $start, $search);  // Mendapatkan data dengan batasan dan offset
        $result['jumlah'] = $this->sqlIntegrasiMedication($search)->get()->num_rows();  // Mendapatkan jumlah total data sesuai kondisi pencarian
        return $result;

        $this->db->close();  // Menutup koneksi database
    }


    private function sqlambilMedicationDispense($search)
    {
        // Membuat query dasar dengan alias untuk nama tabel
        $this->db->select("DISTINCT ON (rrd.id)
            rrd.id, rrd.id_resep_tebus_r, rrd.id_barang, rrd.jual_harga, 
            rrd.dosis_racik, rrd.jumlah_pakai, rrd.formularium, rrd.kronis, 
            rrd.id_integrasi_resep, rrd.id_medication_request, 
            p.nama AS nama_pasien, p.id no_rm, r.waktu,
            sp.nama AS nama_poli,
            sb.nama AS nama_barang
        ");
        
        $this->db->from('sm_resep_tebus_r_detail rrd');
        
        // Menggunakan LEFT JOIN untuk mengambil semua data dari sm_resep_r_detail
        $this->db->join('sm_resep_tebus_r rr', 'rrd.id_resep_tebus_r = rr.id', 'left');
        $this->db->join('sm_resep_tebus r', 'rr.id_resep_tebus = r.id', 'left');
        $this->db->join('sm_resep rsp', 'r.id_resep = rsp.id', 'left');
        $this->db->join('sm_layanan_pendaftaran lp', 'rsp.id_layanan_pendaftaran = lp.id', 'left');
        $this->db->join('sm_pendaftaran pd', 'lp.id_pendaftaran = pd.id', 'left');
        $this->db->join('sm_pasien p', 'pd.id_pasien = p.id', 'left');
        $this->db->join('sm_spesialisasi sp', 'lp.id_unit_layanan = sp.id', 'left');
        $this->db->join('sm_barang sb', 'rrd.id_barang = sb.id', 'left');  // Menambahkan join ke tabel sm_barang

        // Menambahkan kondisi pencarian berdasarkan parameter yang diberikan
        if (($search['tanggal_awal'] !== '') & ($search['tanggal_akhir'] !== '')) :
            $this->db->where("pd.tanggal_daftar BETWEEN '" . date2mysql($search['tanggal_awal']) . " 00:00:00' AND '" . date2mysql($search['tanggal_akhir']) . " 23:59:59'");
        endif;
        
        if (!empty($search['id'])) {
            $this->db->where('p.id', $search['id']);  // Pencocokan exact match untuk ID
        }

        if (!empty($search['nama'])) {
            $this->db->where("LOWER(p.nama) LIKE '%" . strtolower($search['nama']) . "%'");  // Pencocokan sebagian (LIKE) untuk nama
        }

        if (!empty($search['poli'])) {
            $this->db->where("LOWER(sp.nama) LIKE '%" . strtolower($search['poli']) . "%'");  // Pencocokan sebagian (LIKE) untuk poli
        }

        // Kondisi untuk id_integrasi_resep tidak NULL dan tidak kosong
        $this->db->where('rrd.id_medication_dispense IS NOT NULL');
        $this->db->where('rrd.id_medication_dispense !=', '');
        $this->db->where('lp.jenis_layanan', 'Poliklinik', true);

        return $this->db->order_by('rrd.id', 'desc'); // Mengurutkan berdasarkan rrd.id untuk DISTINCT ON
    }

    private function _listambilMedicationDispense($limit, $start, $search)
    {
        $this->sqlambilMedicationDispense($search);  // Membangun query dasar
        if ($limit !== 0) :
            $this->db->limit($limit, $start);  // Menambahkan batasan dan offset untuk pagination
        endif;

        return $this->db->get()->result();  // Mengembalikan hasil query
    }

    function ambilMedicationDispense($limit, $start, $search)
    {
        $result['data'] = $this->_listambilMedicationDispense($limit, $start, $search);  // Mendapatkan data dengan batasan dan offset
        $result['jumlah'] = $this->sqlambilMedicationDispense($search)->get()->num_rows();  // Mendapatkan jumlah total data sesuai kondisi pencarian
        return $result;

        $this->db->close();  // Menutup koneksi database
    }


    private function sqlIntegrasiMedicationDispense($search)
    {
        // Membuat query dasar dengan alias untuk nama tabel
        $this->db->select("DISTINCT ON (rrd.id)
            rrd.id, rrd.id_resep_tebus_r, rrd.id_barang, rrd.jual_harga, 
            rrd.dosis_racik, rrd.jumlah_pakai, rrd.formularium, rrd.kronis, 
            rrd.id_integrasi_resep, rrd.id_medication_request, 
            p.nama AS nama_pasien, p.id no_rm, r.waktu,
            sp.nama AS nama_poli,
            sb.nama AS nama_barang
        ");
        $this->db->from('sm_resep_tebus_r_detail rrd');
        
        // Menggunakan LEFT JOIN untuk mengambil semua data dari sm_resep_r_detail
        $this->db->join('sm_resep_tebus_r rr', 'rrd.id_resep_tebus_r = rr.id', 'left');
        $this->db->join('sm_resep_tebus r', 'rr.id_resep_tebus = r.id', 'left');
        $this->db->join('sm_resep rsp', 'r.id_resep = rsp.id', 'left');
        $this->db->join('sm_layanan_pendaftaran lp', 'rsp.id_layanan_pendaftaran = lp.id', 'left');
        $this->db->join('sm_pendaftaran pd', 'lp.id_pendaftaran = pd.id', 'left');
        $this->db->join('sm_pasien p', 'pd.id_pasien = p.id', 'left');
        $this->db->join('sm_spesialisasi sp', 'lp.id_unit_layanan = sp.id', 'left');
        $this->db->join('sm_barang sb', 'rrd.id_barang = sb.id', 'left');  // Menambahkan join ke tabel sm_barang

        // Menambahkan kondisi pencarian berdasarkan parameter yang diberikan
        if (($search['tanggal_awal'] !== '') & ($search['tanggal_akhir'] !== '')) :
            $this->db->where("pd.tanggal_daftar BETWEEN '" . date2mysql($search['tanggal_awal']) . " 00:00:00' AND '" . date2mysql($search['tanggal_akhir']) . " 23:59:59'");
        endif;
        
        if (!empty($search['id'])) {
            $this->db->where('p.id', $search['id']);  // Pencocokan exact match untuk ID
        }

        if (!empty($search['nama'])) {
            $this->db->where("LOWER(p.nama) LIKE '%" . strtolower($search['nama']) . "%'");  // Pencocokan sebagian (LIKE) untuk nama
        }

        if (!empty($search['poli'])) {
            $this->db->where("LOWER(sp.nama) LIKE '%" . strtolower($search['poli']) . "%'");  // Pencocokan sebagian (LIKE) untuk poli
        }

        // Kondisi untuk id_integrasi_resep bernilai NULL atau kosong
        $this->db->where('(rrd.id_medication_dispense IS NULL OR rrd.id_medication_dispense = \'\')');
        $this->db->where('lp.jenis_layanan', 'Poliklinik', true);

        return $this->db->order_by('rrd.id', 'desc'); // Mengurutkan berdasarkan rrd.id untuk DISTINCT ON
    }

    private function _listIntegrasiMedicationDispense($limit, $start, $search)
    {
        $this->sqlIntegrasiMedicationDispense($search);  // Membangun query dasar
        if ($limit !== 0) :
            $this->db->limit($limit, $start);  // Menambahkan batasan dan offset untuk pagination
        endif;

        return $this->db->get()->result();  // Mengembalikan hasil query
    }

    function integrasiMedicationDispense($limit, $start, $search)
    {
        $result['data'] = $this->_listIntegrasiMedicationDispense($limit, $start, $search);  // Mendapatkan data dengan batasan dan offset
        $result['jumlah'] = $this->sqlIntegrasiMedicationDispense($search)->get()->num_rows();  // Mendapatkan jumlah total data sesuai kondisi pencarian
        return $result;

        $this->db->close();  // Menutup koneksi database
    }

    public function autentikasi_user_post()
    {

        $idUser = $this->session->userdata('id_translucent');

        $xKonfigurasi = $this->getConfigSatuSehat();

        $cekTimeissued = $this->aksesTimeissued();

        $waktu = (int)$cekTimeissued->timeissued;

        date_default_timezone_set('Asia/Jakarta');
        $tanggalTunggu = (round(microtime(true) * 1000));
        $satuJam = 120000;
        $tglWaktu = (int)$tanggalTunggu - (int)$waktu;

        if((int)$tglWaktu === (int)$satuJam || (int)$tglWaktu > (int)$satuJam){

            $url = $xKonfigurasi->auth."accesstoken?grant_type=client_credentials";

            $header = $this->authHeader();

            $params=array(
                            "client_id" => $xKonfigurasi->clientid,
                            "client_secret" => $xKonfigurasi->clientsecret
                        );
            
            $data_api = http_build_query($params);

            $output = $this->postCurl($url, $data_api, $header);

            if($output['result'] !== false){

                if($output['respon'] === 200){

                    $result = json_decode($output['result']);
                    date_default_timezone_set('Asia/Jakarta');

                    $data_response = array(

                        "userakses"         => (int)$idUser,
                        "nama"              => $this->session->userdata('nama'),
                        "token"             => $result->access_token,
                        "timeissued"        => $result->issued_at,
                        "app_name"          => $result->application_name,
                        "tanggal"           => date('Y-m-d H:i:s')

                    );

                    $this->db->insert('sm_akses_satu_sehat', $data_response);

                } else {

                    date_default_timezone_set('Asia/Jakarta');

                    $dataResponse = array(

                        "userakses"         => (int)$idUser,
                        "nama"              => $this->session->userdata('nama'),
                        "token"             => $cekTimeissued->token,
                        "timeissued"        => $cekTimeissued->timeissued,
                        "app_name"          => $cekTimeissued->app_name,
                        "tanggal"           => date('Y-m-d H:i:s')

                    );

                    $this->db->insert('sm_akses_satu_sehat', $dataResponse);

                    $xDetailData = ["kategori" => "Autentikasi", "param" => $idUser, "message" => $output['error'], "jenis_data" => 'error', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama'), "respon" => $output['respon'], "function" => 'autentikasi_user_post Satu Sehat Model'];
                        $this->db->insert('sm_satu_sehat_log', $xDetailData);

                }

            } else {

                date_default_timezone_set('Asia/Jakarta');

                $dataResponse = array(

                    "userakses"         => (int)$idUser,
                    "nama"              => $this->session->userdata('nama'),
                    "token"             => $cekTimeissued->token,
                    "timeissued"        => $cekTimeissued->timeissued,
                    "app_name"          => $cekTimeissued->app_name,
                    "tanggal"           => date('Y-m-d H:i:s')

                );

                $this->db->insert('sm_akses_satu_sehat', $dataResponse);

                $xDetailData = ["kategori" => "Autentikasi", "param" => $idUser, "message" => $output['error'], "jenis_data" => 'error', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama'), "respon" => $output['respon'], "function" => 'autentikasi_user_post Satu Sehat Model'];
                $this->db->insert('sm_satu_sehat_log', $xDetailData);

            }

        } else {

            date_default_timezone_set('Asia/Jakarta');

            $dataResponse = array(

                "userakses"         => (int)$idUser,
                "nama"              => $this->session->userdata('nama'),
                "token"             => $cekTimeissued->token,
                "timeissued"        => $cekTimeissued->timeissued,
                "app_name"          => $cekTimeissued->app_name,
                "tanggal"           => date('Y-m-d H:i:s')

            );

            $this->db->insert('sm_akses_satu_sehat', $dataResponse);

        }

    }

    private function konversiTanggalParameter($tanggal){

        date_default_timezone_set('Asia/Jakarta');

        $konvTanggal = date("Y-m-d\TH:i:sP", strtotime($tanggal));

        return $konvTanggal;

    }

    function authBearerCompose($token, $contentType = "application/json")
    {
        return [
            "Accept: application/json",
            "Content-Type: $contentType",
            "Authorization: Bearer " . trim($token)
        ];
    }

    private function integrasi_pasien($idLayanan)
    {
        $this->autentikasi_user_post();

        if ($idLayanan === null) {

            $cdecode = ["metaData" => ["code" => 201, "message" => 'ID Layanan Tidak ada, harap refresh kembali']];
            return $cdecode;
            die();
        }

        $data = $this->cekidLayananPendaftaran($idLayanan);

        $identitas = $data->no_identitas;

        $idRM = $data->no_rm;

        if ($identitas !== "") {

            $idUser = $this->session->userdata('id_translucent');

            $getID = $this->aksesSatuSehat($idUser);

            $tokenBearer = $getID->token;

            $xKonfigurasi = $this->getConfigSatuSehat();

            $url = $xKonfigurasi->apiurl . "Patient?identifier=https://fhir.kemkes.go.id/id/nik|" . $identitas;

            $header = $this->authBearer($tokenBearer);

            $output = $this->postBearer($url, $header);

            if($output['result'] !== false){

                $entryOutput = json_decode($output['result']);

                if (isset($entryOutput->entry)) {

                    if (!empty($entryOutput->entry)) {

                        $entryId = $entryOutput->entry;

                        $idPasien = $entryId[0]->resource->id;

                        $cekNama = $entryId[0]->resource->name;

                        $update = ["ihsn" => $idPasien];

                        $data = $this->db->where('id', $idRM)->update('sm_pasien', $update);

                        $decode = ["metaData" => ["code" => 200, "message" => "IHSN Berhasil disimpan"]];

                    } else {

                        date_default_timezone_set('Asia/Jakarta');
                        $xDetailData = ["kategori" => "Patient", "param" => $identitas, "message" => $output['result'], "jenis_data" => 'error', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama'), "function" => 'integrasi_pasien Satu Sehat'];
                        $this->db->insert('sm_satu_sehat_log', $xDetailData);

                        $decode = ["metaData" => ["code" => 201, "message" => "Tidak ada data Satu Sehat untuk NIK Tersebut"]];
                    }
                } else {

                    date_default_timezone_set('Asia/Jakarta');
                    $xDetailData = ["kategori" => "Patient", "param" => $identitas, "message" => $output['result'], "jenis_data" => 'error', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama'), "function" => 'integrasi_pasien Satu Sehat'];
                    $this->db->insert('sm_satu_sehat_log', $xDetailData);

                    $decode = ["metaData" => ["code" => 201, "message" => "Tidak ada data Satu Sehat untuk NIK Tersebut"]];
                }

            }

        } else {

            date_default_timezone_set('Asia/Jakarta');
            $xDetailData = ["kategori" => "Patient", "param" => 'NIK Tidak ada, Harap masukkan data NIK terlebih dahulu', "message" => $output['result'], "jenis_data" => 'error', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama'), "function" => 'integrasi_pasien Satu Sehat'];
            $this->db->insert('sm_satu_sehat_log', $xDetailData);

            $decode = ["metaData" => ["code" => 201, "message" => "NIK Tidak ada, Harap masukkan data NIK terlebih dahulu"]];
        }

    }

    private function integrasi_nakes($id, $nik)
    {
        $this->autentikasi_user_post();

        if ($nik === null) {

            return;
            
        }

        $identitas = $nik;

        $idMedis = $id;

        if ($identitas !== null) {

            $idUser = $this->session->userdata('id_translucent');

            $getID = $this->aksesSatuSehat($idUser);

            $tokenBearer = $getID->token;

            $xKonfigurasi = $this->getConfigSatuSehat();

            $url = $xKonfigurasi->apiurl . "Practitioner?identifier=https://fhir.kemkes.go.id/id/nik|" . $identitas;

            $header = $this->authBearer($tokenBearer);

            $output = $this->postBearer($url, $header);

            if($output['result'] !== false){

                $entryOutput = json_decode($output['result']);

                if (isset($entryOutput->entry)) {

                    if (!empty($entryOutput->entry)) {

                        $entryId = $entryOutput->entry;

                        $idNakes = $entryId[0]->resource->id;

                        $cekNama = $entryId[0]->resource->name;

                        $update = ["ihs_number" => $idNakes];

                        $data = $this->db->where('id', $idMedis)->update('sm_tenaga_medis', $update);

                        $decode = ["metaData" => ["code" => 200, "message" => "IHSN Berhasil disimpan"]];
                    } else {

                        date_default_timezone_set('Asia/Jakarta');
                        $xDetailData = ["kategori" => "Practitioner", "param" => $identitas, "message" => $output['result'], "jenis_data" => 'error', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama'), "function" => 'integrasi_nakes Satu Sehat'];
                        $this->db->insert('sm_satu_sehat_log', $xDetailData);

                        $decode = ["metaData" => ["code" => 201, "message" => "Tidak ada data Satu Sehat untuk NIK Nakes Tersebut"]];
                    }
                } else {

                    date_default_timezone_set('Asia/Jakarta');
                    $xDetailData = ["kategori" => "Practitioner", "param" => $identitas, "message" => $output['result'], "jenis_data" => 'error', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama'), "function" => 'integrasi_nakes Satu Sehat'];
                    $this->db->insert('sm_satu_sehat_log', $xDetailData);

                    $decode = ["metaData" => ["code" => 201, "message" => "Tidak ada data Satu Sehat untuk NIK Tersebut"]];
                }

            }

        } else {

            date_default_timezone_set('Asia/Jakarta');
            $xDetailData = ["kategori" => "Practitioner", "param" => $identitas, "message" => 'NIK Tidak ada, Harap masukkan data NIK terlebih dahulu', "jenis_data" => 'error', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama'), "function" => 'integrasi_nakes Satu Sehat'];
            $this->db->insert('sm_satu_sehat_log', $xDetailData);

            $decode = ["metaData" => ["code" => 201, "message" => "NIK Tidak ada, Harap masukkan data NIK terlebih dahulu"]];
        }

    }

    function cekMasterAlergi($id){

        return $this->db->select("m.*")
            ->from('sm_master_alergi as m')
            ->where('m.id', $id)
            ->get()
            ->row();
        
        $this->db->close();

    }

    public function cekSatuSehatOnOff(){

        return $this->db->select("s.onoff")
            ->from('sm_satusehat_onoff as s')
            ->where('s.id', 1)
            ->get()
            ->row();
        
        $this->db->close();

    }

    private function konverTimeStamp($time)
    {

        $estimate = new DateTime($time);
        $nw_est = $estimate->getTimestamp();
        $nw_est_one = $nw_est * 1000;

        return $nw_est_one;
    }

    private function integrasi_encounter_post($idLayanan)
    {

        $this->autentikasi_user_post();

        if ($idLayanan === null) {

            date_default_timezone_set('Asia/Jakarta');

            $xDetailDataRequest = ["kategori" => "Encounter", "message" => 'ID Layanan Tidak ada', "jenis_data" => 'error', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama'), "function" => 'integrasi_encounter_post satu sehat model'];

            $this->db->insert('sm_satu_sehat_log', $xDetailDataRequest);

            return;
        }

        $data = $this->cekidLayananPendaftaran($idLayanan);

        if ($data->id_poli !== null) {

            $idSpesial = (int)$data->id_poli;

            $nama = 1;

            $dataPoli = $this->cekDataPoli($nama, $idSpesial);

            if ($dataPoli !== null && $dataPoli !== '') {

                $lokasi = $dataPoli->integrasi_baru;
                $nama = $dataPoli->nama;
            } else {

                date_default_timezone_set('Asia/Jakarta');

                $xDetailDataRequest = ["kategori" => "Encounter", "no_rm" => $data->no_rm, "message" => 'Poli Belum di integrasi, Silakan integrasikan ke satu sehat terlebih dahulu', "jenis_data" => 'error', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama'), "function" => 'integrasi_encounter_post Satu Sehat'];

                $this->db->insert('sm_satu_sehat_log', $xDetailDataRequest);
                return;
            
            }

        } else {

            date_default_timezone_set('Asia/Jakarta');

            $xDetailDataRequest = ["kategori" => "Encounter", "no_rm" => $data->no_rm, "message" => 'Id Poli Tidak Ada', "jenis_data" => 'error', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama'), "function" => 'integrasi_encounter_post Satu Sehat'];

            $this->db->insert('sm_satu_sehat_log', $xDetailDataRequest);
            return;
        }

        if ($data->ihsn !== null) {

            $dataIhsn = $data->ihsn;
            $namaPasien = $data->nama_pasien;
        } else {


            $this->integrasi_pasien($idLayanan);

            $dataPasien = $this->cekidLayananPendaftaran($idLayanan);

            if(isset($dataPasien->ihsn)) {

                $dataIhsn = $dataPasien->ihsn;
                $namaPasien = $dataPasien->nama_pasien;

            } else {

                date_default_timezone_set('Asia/Jakarta');

                $xDetailDataRequest = ["kategori" => "Encounter", "no_rm" => $data->no_rm, "message" => 'Data Pasien tidak ada', "jenis_data" => 'error', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama'), "function" => 'integrasi_encounter_post Satu Sehat'];

                $this->db->insert('sm_satu_sehat_log', $xDetailDataRequest);

                return;

            }

        }


        if ($data->ihs_number !== null) {

            $dataIhsDokter = $data->ihs_number;
            $namaDokter = $data->nama_dokter;

        } else {

            $this->integrasi_nakes($data->id_nakes, $data->nik_dokter);

            $dataNakes = $this->cekidLayananPendaftaran($idLayanan);

            if (isset($dataNakes->ihs_number)) {

                $dataIhsDokter = $dataNakes->ihs_number;
                $namaDokter = $dataNakes->nama_dokter;

            } else {

                $cdecode = ["metaData" => ["code" => 201, "message" => 'Data Nakes tidak ada']];

                date_default_timezone_set('Asia/Jakarta');

                $xDetailDataRequest = ["kategori" => "Encounter", "no_rm" => $data->no_rm, "message" => 'Data Nakes tidak ada', "jenis_data" => 'error', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama'), "function" => 'integrasi_encounter_post Satu Sehat'];

                $this->db->insert('sm_satu_sehat_log', $xDetailDataRequest);

                return;

            }
        }

        $xKonfigurasi = $this->getConfigSatuSehat();

        $idOrganization = $xKonfigurasi->organization;

        $idUser = $this->session->userdata('id_translucent');

        $getID = $this->aksesSatuSehat($idUser);

        $tokenBearer = $getID->token;

        $url = $xKonfigurasi->apiurl . "Encounter";

        $header = $this->authBearer($tokenBearer);

        $waktuStart = $data->task_tiga;

        $waktuEnd = $data->task_empat;

        $konvTimeStart = $this->konverTimeStamp($waktuStart);

        $konvTimeEnd = $this->konverTimeStamp($waktuEnd);

        $timeStart = date('c', $konvTimeStart / 1000);

        $timeEnd = date('c', $konvTimeEnd / 1000);

        $params = array(
            "resourceType"  => "Encounter",
            "identifier"    => [array(

                "system"    => "http://sys-ids.kemkes.go.id/encounter/" . $idOrganization,
                "value"     => $data->kode_booking

            )],
            "status"        => "arrived",
            "class"         => array(

                "system"    => "http://terminology.hl7.org/CodeSystem/v3-ActCode",
                "code"      => "AMB",
                "display"   => "ambulatory"

            ),
            "subject"      => array(

                "reference" => "Patient/" . $dataIhsn,
                "display"   => $namaPasien

            ),
            "participant"   => [array(

                "type"      => [array(

                    "coding" => [array(

                        "system"    => "http://terminology.hl7.org/CodeSystem/v3-ParticipationType",
                        "code"      => "ATND",
                        "display"   => "attender"

                    )]

                )],

                "individual" => array(
                    "reference" => "Practitioner/" . $dataIhsDokter,
                    "display"   => $namaDokter
                )
            )],
            "period"    => array(

                "start" => $timeStart

            ),
            "location"  => [array(

                "location" => array(
                    "reference"  => "Location/" . $lokasi,
                    "display"    => $nama
                )

            )],
            "statusHistory" => [array(

                "status"    => "arrived",
                "period"    => array(

                    "start" => $timeStart,
                    "end" => $timeEnd
                )
            )],
            "serviceProvider" => array(
                "reference" => "Organization/" . $idOrganization
            )

        );

        $data_api = json_encode($params);

        $output = $this->postEncounter($url, $data_api, $header);

        if($output['result'] !== false){

            if ($output['respon'] === 201) {

                $result = json_decode($output['result']);

                date_default_timezone_set('Asia/Jakarta');

                $xDetailDataRequest = ["kategori" => "Encounter", "no_rm" => $data->no_rm, "message" => json_encode($params), "jenis_data" => 'ok', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama'), "respon" => $output['respon'], "function" => 'integrasi_encounter_post Satu Sehat'];

                $this->db->insert('sm_satu_sehat_log', $xDetailDataRequest);

                $update = ["id_encounter" => $result->id];

                $data = $this->db->where('id', $idLayanan)->update('sm_layanan_pendaftaran', $update);

            } else {

                date_default_timezone_set('Asia/Jakarta');

                $xDetailDataRequest = ["kategori" => "Encounter", "no_rm" => $data->no_rm, "message" => $output['result'], "jenis_data" => 'error', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama'), "respon" => $output['respon'], "param" => json_encode($params), "function" => 'integrasi_encounter_post Satu Sehat'];

                $this->db->insert('sm_satu_sehat_log', $xDetailDataRequest);

                return;
            
            }

        }
    }

    function integrasiClinicalImpression($text, $idLayanan){

        $this->autentikasi_user_post();

        $dataLayanan = $this->cekidLayananPendaftaran((int)$idLayanan);

        $xKonfigurasi = $this->getConfigSatuSehat();

        $idOrganization = $xKonfigurasi->organization;

        $idUser = $this->session->userdata('id_translucent');

        $getID = $this->aksesSatuSehat($idUser);

        $tokenBearer = $getID->token;

        $header = $this->authBearerCompose($tokenBearer);

        $tanggalPeriksa = $this->konversiTanggalParameter($dataLayanan->tanggal_periksa);
        $tanggalLayanan = $this->konversiTanggalParameter($dataLayanan->tanggal_layanan);

        if(empty($dataLayanan->ihs_number)){

            if(empty($dataLayanan->nik_dokter)){

                date_default_timezone_set('Asia/Jakarta');
                $xDetailDataRequest = ["kategori" => "integrasiClinicalImpression", "no_rm" => $dataLayanan->no_rm, "message" => 'Data NIK Dokter Tidak ada', "jenis_data" => 'error', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama'), "param" => $idLayanan, "function" => 'integrasiAllergyIntoleran model satu sehat'];
                $this->db->insert('sm_satu_sehat_log', $xDetailDataRequest);

                return;

            }

            $this->integrasi_nakes($dataLayanan->id_nakes, $dataLayanan->nik_dokter);

        }

        $dataLayanan = $this->cekidLayananPendaftaran((int)$idLayanan);

        if(empty($dataLayanan->ihs_number)){

            return;

        }

        if(empty($dataLayanan->ihsn)){

            $this->integrasi_pasien($idLayanan);

        }

        $dataLayanan = $this->cekidLayananPendaftaran((int)$idLayanan);

        if(empty($dataLayanan->ihsn)){

            return;

        }

        if(empty($dataLayanan->id_encounter)){

            $this->integrasi_encounter_post($idLayanan);

        }

        $dataLayanan = $this->cekidLayananPendaftaran((int)$idLayanan);

        if(empty($dataLayanan->id_encounter)){

            return;

        }

        if(isset($dataLayanan->prognosis)){

            if($dataLayanan->prognosis === 'Baik'){

                $codePrognosis = '170968001';
                $displayPrognosis = 'Prognosis good';

            } else if($dataLayanan->prognosis === 'Dubia Et Bonam'){

                $codePrognosis = '65872000';
                $displayPrognosis = 'Fair prognosis';

            } else if($dataLayanan->prognosis === 'Dubia Et Malam'){

                $codePrognosis = '67334001';
                $displayPrognosis = 'Guarded prognosis';

            } else if($dataLayanan->prognosis === 'Tidak Baik'){

                $codePrognosis = '170969009';
                $displayPrognosis = 'Prognosis bad';

            }

            if(isset($dataLayanan->id_satset_clinicalimpression)){

                $url = $xKonfigurasi->apiurl . "ClinicalImpression/" . $dataLayanan->id_satset_clinicalimpression;

                $params = array(
                            "resourceType"=> "ClinicalImpression",
                            "id" => $dataLayanan->id_satset_clinicalimpression,
                            "identifier"=> [
                                array(
                                    "system"=> "http://sys-ids.kemkes.go.id/clinicalimpression/".$idOrganization,
                                    "use"=> "official",
                                    "value"=> $dataLayanan->id_anamnesa
                                )
                            ],
                            "status"=> "completed",
                            "description"=> $text,
                            "subject"=> array(
                                "reference"=> "Patient/".$dataLayanan->ihsn,
                                "display"=> $dataLayanan->nama_pasien
                            ),
                            "encounter"=> array(
                                "reference"=> "Encounter/".$dataLayanan->id_encounter,
                                "display"=> "Kunjungan ".$dataLayanan->nama_pasien . " di hari " . convertDateIndo($dataLayanan->tanggal_layanan)
                            ),
                            "effectiveDateTime"=> $tanggalPeriksa,
                            "date"=> $tanggalLayanan,
                            "assessor"=> array(
                                "reference"=> "Practitioner/".$dataLayanan->ihs_number
                            ),
                            "prognosisCodeableConcept"=> [
                                array(
                                    "coding"=> [
                                        array(
                                            "system"=> "http://snomed.info/sct",
                                            "code"=> $codePrognosis,
                                            "display"=> $displayPrognosis
                                        )
                                    ]
                                )
                            ]
                        );

                $dataApi = json_encode($params);

                $output = $this->putComposition($url, $dataApi, $header);

                if($output['result'] !== false){

                    if($output['respon'] === 200){

                        $result = json_decode($output['result']);

                        date_default_timezone_set('Asia/Jakarta');

                        $xDetailDataRequest = ["kategori" => "Update ClinicalImpression", "no_rm" => $dataLayanan->no_rm, "message" => json_encode($params), "jenis_data" => 'ok', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama'), "respon" => $output['respon'], "function" => 'ClinicalImpression Satu Sehat Model'];

                        $this->db->insert('sm_satu_sehat_log', $xDetailDataRequest);

                        $update = ["id_satset_clinicalimpression" => $result->id];

                        $data = $this->db->where('id', $dataLayanan->id_anamnesa)->update('sm_anamnesa', $update);

                    } else {

                        date_default_timezone_set('Asia/Jakarta');

                        $xDetailDataRequest = ["kategori" => "Update ClinicalImpression", "no_rm" => $dataLayanan->no_rm, "message" => $output['result'], "jenis_data" => 'error', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama'), "respon" => $output['respon'], "param" => json_encode($params), "function" => 'ClinicalImpression Satu Sehat Model'];

                        $this->db->insert('sm_satu_sehat_log', $xDetailDataRequest);

                    }

                }

            } else {

                $url = $xKonfigurasi->apiurl . "ClinicalImpression";

                $params = array(
                            "resourceType"=> "ClinicalImpression",
                            "identifier"=> [
                                array(
                                    "system"=> "http://sys-ids.kemkes.go.id/clinicalimpression/".$idOrganization,
                                    "use"=> "official",
                                    "value"=> $dataLayanan->id_anamnesa
                                )
                            ],
                            "status"=> "completed",
                            "description"=> $text,
                            "subject"=> array(
                                "reference"=> "Patient/".$dataLayanan->ihsn,
                                "display"=> $dataLayanan->nama_pasien
                            ),
                            "encounter"=> array(
                                "reference"=> "Encounter/".$dataLayanan->id_encounter,
                                "display"=> "Kunjungan ".$dataLayanan->nama_pasien . " di hari " . convertDateIndo($dataLayanan->tanggal_layanan)
                            ),
                            "effectiveDateTime"=> $tanggalPeriksa,
                            "date"=> $tanggalLayanan,
                            "assessor"=> array(
                                "reference"=> "Practitioner/".$dataLayanan->ihs_number
                            ),
                            "prognosisCodeableConcept"=> [
                                array(
                                    "coding"=> [
                                        array(
                                            "system"=> "http://snomed.info/sct",
                                            "code"=> $codePrognosis,
                                            "display"=> $displayPrognosis
                                        )
                                    ]
                                )
                            ]
                        );

                $data_api = json_encode($params);

                $output = $this->postEncounter($url, $data_api, $header);

                if($output['result'] !== false){

                    if ($output['respon'] === 201) {

                        $result = json_decode($output['result']);

                        date_default_timezone_set('Asia/Jakarta');

                        $xDetailDataRequest = ["kategori" => "ClinicalImpression", "no_rm" => $dataLayanan->no_rm, "message" => json_encode($params), "jenis_data" => 'ok', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama'), "respon" => $output['respon'], "function" => 'clinicalImpression Satu Sehat Model'];

                        $this->db->insert('sm_satu_sehat_log', $xDetailDataRequest);

                        $update = ["id_satset_clinicalimpression" => $result->id];

                        $data = $this->db->where('id', $dataLayanan->id_anamnesa)->update('sm_anamnesa', $update);

                    } else {

                        date_default_timezone_set('Asia/Jakarta');

                        $xDetailDataRequest = ["kategori" => "clinicalImpression", "no_rm" => $dataLayanan->no_rm, "message" => $output['result'], "jenis_data" => 'error', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama'), "respon" => $output['respon'], "param" => json_encode($params), "function" => 'clinicalImpression Satu Sehat Model'];

                        $this->db->insert('sm_satu_sehat_log', $xDetailDataRequest);

                    }

                }

            }

        }

    }

    function integrasiAllergyIntoleran($text, $opt, $idLayanan, $pilihan){

        $this->autentikasi_user_post();

        $dataLayanan = $this->cekidLayananPendaftaran((int)$idLayanan);

        $masterAlergi = $this->cekMasterAlergi((int)$opt);

        $xKonfigurasi = $this->getConfigSatuSehat();

        $idOrganization = $xKonfigurasi->organization;

        $idUser = $this->session->userdata('id_translucent');

        $getID = $this->aksesSatuSehat($idUser);

        $tokenBearer = $getID->token;

        $header = $this->authBearerCompose($tokenBearer);

        $tanggalPeriksa = $this->konversiTanggalParameter($dataLayanan->tanggal_periksa);

        if(empty($dataLayanan->ihs_number)){

            if(empty($dataLayanan->nik_dokter)){

                date_default_timezone_set('Asia/Jakarta');
                $xDetailDataRequest = ["kategori" => "AllergyIntolerance", "no_rm" => $dataLayanan->no_rm, "message" => 'Data NIK Dokter Tidak ada', "jenis_data" => 'error', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama'), "param" => $idLayanan, "function" => 'integrasiAllergyIntoleran model satu sehat'];
                $this->db->insert('sm_satu_sehat_log', $xDetailDataRequest);

                return;

            }

            $this->integrasi_nakes($dataLayanan->id_nakes, $dataLayanan->nik_dokter);

        }

        $dataLayanan = $this->cekidLayananPendaftaran((int)$idLayanan);

        if(empty($dataLayanan->ihs_number)){

            return;

        }

        if(empty($dataLayanan->ihsn)){

            $this->integrasi_pasien($idLayanan);

        }

        $dataLayanan = $this->cekidLayananPendaftaran((int)$idLayanan);

        if(empty($dataLayanan->ihsn)){

            return;

        }

        if(empty($dataLayanan->id_encounter)){

            $this->integrasi_encounter_post($idLayanan);

        }

        $dataLayanan = $this->cekidLayananPendaftaran((int)$idLayanan);

        if(empty($dataLayanan->id_encounter)){

            return;

        }

        if($pilihan){

            if($pilihan === 'tidak'){

                $allergyCode = '716186003';

                $allergyName = 'No known allergy';

                $allergyid = '370';

            } else {

                $allergyCode = $masterAlergi->kode;

                $allergyName = $masterAlergi->name;

                $allergyid = $masterAlergi->id;

            }

            if(isset($dataLayanan->id_satset_alergi)){

                $url = $xKonfigurasi->apiurl . "AllergyIntolerance/" . $dataLayanan->id_satset_alergi;

                $params = array(
                    "resourceType"=> "AllergyIntolerance",
                    "id"=> $dataLayanan->id_satset_alergi,
                    "identifier"=> [
                        array(
                            "system"=> "http://sys-ids.kemkes.go.id/allergy/".$idOrganization,
                            "use"=> "official",
                            "value"=> $dataLayanan->id_profil_pasien
                        )
                    ],
                    "clinicalStatus"=> array(
                        "coding"=> [
                            array(
                                "system"=> "http://terminology.hl7.org/CodeSystem/allergyintolerance-clinical",
                                "code"=> "active",
                                "display"=> "Active"
                            )
                        ]
                    ),
                    "verificationStatus"=> array(
                        "coding"=> [
                            array(
                                "system"=> "http://terminology.hl7.org/CodeSystem/allergyintolerance-verification",
                                "code"=> "confirmed",
                                "display"=> "Confirmed"
                            )
                        ]
                    ),
                    "category"=> [
                        "food"
                    ],
                    "code"=> array(
                        "coding"=> [
                            array(
                                "system"=> "http://snomed.info/sct",
                                "code"=> $allergyCode,
                                "display"=> $allergyName
                            )
                        ],
                        "text"=> $text
                    ),
                    "patient"=> array(
                        "reference"=> "Patient/".$dataLayanan->ihsn,
                        "display"=> $dataLayanan->nama_pasien
                    ),
                    "encounter"=> array(
                        "reference"=> "Encounter/".$dataLayanan->id_encounter,
                        "display"=> "Kunjungan ".$dataLayanan->nama_pasien . " di hari " . convertDateIndo($dataLayanan->tanggal_layanan)
                    ),
                    "recordedDate"=> $tanggalPeriksa,
                    "recorder"=> array(
                        "reference"=> "Practitioner/".$dataLayanan->ihs_number
                    )
                );

                $dataApi = json_encode($params);

                $output = $this->putComposition($url, $dataApi, $header);

                if($output['result'] !== false){

                    if($output['respon'] === 200){

                        $result = json_decode($output['result']);

                        date_default_timezone_set('Asia/Jakarta');

                        $xDetailDataRequest = ["kategori" => "Update AllergyIntolerance", "no_rm" => $dataLayanan->no_rm, "message" => json_encode($params), "jenis_data" => 'ok', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama'), "respon" => $output['respon'], "function" => 'integrasiAllergyIntoleran Satu Sehat Model'];

                        $this->db->insert('sm_satu_sehat_log', $xDetailDataRequest);

                        $update = ["id_satset_alergi" => $result->id, "id_master_alergi" => $allergyid];

                        $data = $this->db->where('id_pasien', $dataLayanan->no_rm)->update('sm_profil_pasien', $update);

                    } else {

                        date_default_timezone_set('Asia/Jakarta');

                        $xDetailDataRequest = ["kategori" => "AllergyIntolerance", "no_rm" => $dataLayanan->no_rm, "message" => $output['result'], "jenis_data" => 'error', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama'), "respon" => $output['respon'], "param" => json_encode($params), "function" => 'AllergyIntolerance Satu Sehat Model'];

                        $this->db->insert('sm_satu_sehat_log', $xDetailDataRequest);

                    }

                }

            } else {

                if($pilihan === 'ya'){

                    $url = $xKonfigurasi->apiurl . "AllergyIntolerance";

                    $params = array(
                        "resourceType"=> "AllergyIntolerance",
                        "identifier"=> [
                            array(
                                "system"=> "http://sys-ids.kemkes.go.id/allergy/".$idOrganization,
                                "use"=> "official",
                                "value"=> $dataLayanan->id_profil_pasien
                            )
                        ],
                        "clinicalStatus"=> array(
                            "coding"=> [
                                array(
                                    "system"=> "http://terminology.hl7.org/CodeSystem/allergyintolerance-clinical",
                                    "code"=> "active",
                                    "display"=> "Active"
                                )
                            ]
                        ),
                        "verificationStatus"=> array(
                            "coding"=> [
                                array(
                                    "system"=> "http://terminology.hl7.org/CodeSystem/allergyintolerance-verification",
                                    "code"=> "confirmed",
                                    "display"=> "Confirmed"
                                )
                            ]
                        ),
                        "category"=> [
                            "food"
                        ],
                        "code"=> array(
                            "coding"=> [
                                array(
                                    "system"=> "http://snomed.info/sct",
                                    "code"=> $masterAlergi->kode,
                                    "display"=> $masterAlergi->name
                                )
                            ],
                            "text"=> $text
                        ),
                        "patient"=> array(
                            "reference"=> "Patient/".$dataLayanan->ihsn,
                            "display"=> $dataLayanan->nama_pasien
                        ),
                        "encounter"=> array(
                            "reference"=> "Encounter/".$dataLayanan->id_encounter,
                            "display"=> "Kunjungan ".$dataLayanan->nama_pasien . " di hari " . convertDateIndo($dataLayanan->tanggal_layanan)
                        ),
                        "recordedDate"=> $tanggalPeriksa,
                        "recorder"=> array(
                            "reference"=> "Practitioner/".$dataLayanan->ihs_number
                        )
                    );

                    $data_api = json_encode($params);

                    $output = $this->postEncounter($url, $data_api, $header);

                    if($output['result'] !== false){

                        if ($output['respon'] === 201) {

                            $result = json_decode($output['result']);

                            date_default_timezone_set('Asia/Jakarta');

                            $xDetailDataRequest = ["kategori" => "AllergyIntolerance", "no_rm" => $dataLayanan->no_rm, "message" => json_encode($params), "jenis_data" => 'ok', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama'), "respon" => $output['respon'], "function" => 'integrasiAllergyIntoleran Satu Sehat Model'];

                            $this->db->insert('sm_satu_sehat_log', $xDetailDataRequest);

                            $update = ["id_satset_alergi" => $result->id, "id_master_alergi" => $masterAlergi->id];

                            $data = $this->db->where('id_pasien', $dataLayanan->no_rm)->update('sm_profil_pasien', $update);

                        } else {

                            date_default_timezone_set('Asia/Jakarta');

                            $xDetailDataRequest = ["kategori" => "AllergyIntolerance", "no_rm" => $dataLayanan->no_rm, "message" => $output['result'], "jenis_data" => 'error', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama'), "respon" => $output['respon'], "param" => json_encode($params), "function" => 'AllergyIntolerance Satu Sehat Model'];

                            $this->db->insert('sm_satu_sehat_log', $xDetailDataRequest);

                        }

                    }

                }

            }

        } else {

            date_default_timezone_set('Asia/Jakarta');
            $xDetailDataRequest = ["kategori" => "AllergyIntolerance", "no_rm" => $dataLayanan->no_rm, "message" => 'Tidak ada Pilihan ya atau tidak pada alergi', "jenis_data" => 'error', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama'), "param" => $idLayanan, "function" => 'integrasiAllergyIntoleran model satu sehat'];
            $this->db->insert('sm_satu_sehat_log', $xDetailDataRequest);

            return;

        }

    }

    function integrasiComposition($idGizi, $tipe = null)
    {

        $this->autentikasi_user_post();

        if ($idGizi === null) {

            date_default_timezone_set('Asia/Jakarta');
            $xDetailDataRequest = ["kategori" => "Composition", "message" => 'ID Gizi Tidak ada', "jenis_data" => 'error', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama'), "function" => 'integrasiComposition model satu sehat'];
            $this->db->insert('sm_satu_sehat_log', $xDetailDataRequest);

            $cdecode = ["metaData" => ["code" => 201, "message" => 'ID Gizi Tidak ada']];
            return $cdecode;
            die();
        }

        $data = $this->cekDataGizi((int)$idGizi);

        $xKonfigurasi = $this->getConfigSatuSehat();

        $idOrganization = $xKonfigurasi->organization;

        $idUser = $this->session->userdata('id_translucent');

        $getID = $this->aksesSatuSehat($idUser);

        $tokenBearer = $getID->token;

        $url = $xKonfigurasi->apiurl . "Composition";

        $header = $this->authBearerCompose($tokenBearer);

        $tanggalLayanan = $this->konversiTanggalParameter($data->created_at);

        $cekOrganisasi = $this->cekDataOrganisasi(22);

        if(empty($data->ihs_number)){

            if(empty($data->nik_dokter)){

                date_default_timezone_set('Asia/Jakarta');
                $xDetailDataRequest = ["kategori" => "Composition", "no_rm" => $data->no_rm, "message" => 'Data NIK Petugas Gizi Tidak ada', "jenis_data" => 'error', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama'), "param" => $idGizi, "function" => 'integrasiComposition model satu sehat'];
                $this->db->insert('sm_satu_sehat_log', $xDetailDataRequest);

                return;

            }

            $this->integrasi_nakes($data->id_tenaga_medis, $data->nik_dokter);

        }

        $data = $this->cekDataGizi((int)$idGizi);

        if(empty($data->ihs_number)){

            return;

        }

        if(empty($data->ihsn)){

            $this->integrasi_pasien($data->id_layanan_pendaftaran);

        }

        $data = $this->cekDataGizi((int)$idGizi);

        if(empty($data->ihsn)){

            return;

        }

        if(empty($data->id_gizi_satset)){

            if(empty($data->kg_intervensi)){

                date_default_timezone_set('Asia/Jakarta');
                $xDetailDataRequest = ["kategori" => "Composition", "no_rm" => $data->no_rm, "message" => 'keterangan intervensi tidak ada', "jenis_data" => 'error', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama'), "param" => $idGizi, "function" => 'tambah integrasiComposition model satu sehat'];
                $this->db->insert('sm_satu_sehat_log', $xDetailDataRequest);

                $cdecode = ["metaData" => ["code" => 201, "message" => 'ID Gizi Tidak ada']];
                return $cdecode;
                die();

            } else {

                $intervensi = $data->kg_intervensi;

            }

            if(isset($data->updated_at) && isset($data->kg_ttd_dokter)){

                $status = 'amended';

            } else if(isset($data->kg_ttd_dokter) && isset($data->kg_dokter)){

                $status = 'final';

            } else if(empty($data->kg_ttd_dokter)){

                $status = 'preliminary';

            } else {

                date_default_timezone_set('Asia/Jakarta');
                $xDetailDataRequest = ["kategori" => "Composition", "no_rm" => $data->no_rm, "message" => 'Status tidak terdefinisasi', "jenis_data" => 'error', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama'), "param" => $idGizi, "function" => 'tambah integrasiComposition model satu sehat'];
                $this->db->insert('sm_satu_sehat_log', $xDetailDataRequest);

                $cdecode = ["metaData" => ["code" => 201, "message" => 'ID Gizi Tidak ada']];
                return $cdecode;
                die();

            }

            $params = array(
                "resourceType" => "Composition",
                "identifier" => array(
                    "system" => "http://sys-ids.kemkes.go.id/composition/".$idOrganization,
                    "value" => $idGizi
                ),
                "status" => $status,
                "type" => array(
                    "coding" => [
                        array(
                            "system" => "http://loinc.org",
                            "code" => "18842-5",
                            "display" => "Discharge summary"
                        )
                    ]
                ),
                "subject" => array(
                    "reference" => "Patient/".$data->ihsn,
                    "display" => $data->nama_pasien
                ),
                "encounter" => array(
                    "reference" => "Encounter/".$data->id_encounter,
                    "display" => "Kunjungan ".$data->nama_pasien . " di hari " . convertDateIndo($data->created_at)
                ),
                "date" => $tanggalLayanan,
                "author" => [
                    array(
                        "reference" => "Practitioner/".$data->ihs_number,
                        "display" => $data->nama_petugas
                    )
                ],
                "title" => "Formulir Konsultasi Gizi",
                "custodian" => array(
                    "reference" => "Organization/".$cekOrganisasi->integrasi_baru
                ),
                "section" => [
                    array(
                        "code" => array(
                            "coding" => [
                                array(
                                    "system" => "http://loinc.org",
                                    "code" => "42344-2",
                                    "display" => "Discharge diet (narrative)"
                                )
                            ]
                        ),
                        "text" => array(
                            "status" => "additional",
                            "div" => $intervensi
                        )
                    )
                ]
            );

            $data_api = json_encode($params);

            $output = $this->postEncounter($url, $data_api, $header);

            if($output['result'] !== false){

                if ($output['respon'] === 201) {

                    $result = json_decode($output['result']);

                    date_default_timezone_set('Asia/Jakarta');

                    $xDetailDataRequest = ["kategori" => "Composition", "no_rm" => $data->no_rm, "message" => json_encode($params), "jenis_data" => 'ok', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama'), "respon" => $output['respon'], "function" => 'tambah integrasiComposition Satu Sehat Model'];

                    $this->db->insert('sm_satu_sehat_log', $xDetailDataRequest);

                    $update = ["id_gizi_satset" => $result->id];

                    $data = $this->db->where('id_kg', (int)$idGizi)->update('sm_konsultasi_gizi', $update);

                    $decode = ["metaData" => ["code" => 200, "message" => 'Integrasi Composition Berhasil']];

                    return $decode;

                } else {

                    date_default_timezone_set('Asia/Jakarta');

                    $xDetailDataRequest = ["kategori" => "Composition", "no_rm" => $data->no_rm, "message" => $output['result'], "jenis_data" => 'error', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama'), "respon" => $output['respon'], "param" => json_encode($params), "function" => 'tambah integrasiComposition Satu Sehat Model'];

                    $this->db->insert('sm_satu_sehat_log', $xDetailDataRequest);

                    $result = json_decode($output['result']);
                    $decode = ["metaData" => ["code" => 202, "message" => $output['result']]];

                    return $decode;

                }

            }

        } else {

            if(empty($data->kg_intervensi)){

                date_default_timezone_set('Asia/Jakarta');
                $xDetailDataRequest = ["kategori" => "Composition", "no_rm" => $data->no_rm, "message" => 'keterangan intervensi tidak ada', "jenis_data" => 'error', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama'), "param" => $idGizi, "function" => 'update integrasiComposition model satu sehat'];
                $this->db->insert('sm_satu_sehat_log', $xDetailDataRequest);

                $cdecode = ["metaData" => ["code" => 201, "message" => 'ID Gizi Tidak ada']];
                return $cdecode;
                die();

            } else {

                $intervensi = $data->kg_intervensi;

            }

            if($tipe !== null && $tipe === 'hapus'){

                $status = 'entered-in-error';
                
            } else if(isset($data->updated_at) && isset($data->kg_ttd_dokter)){

                $status = "amended";

            } else if(isset($data->kg_ttd_dokter) && isset($data->kg_dokter)){

                $status = "final";

            } else if(empty($data->kg_ttd_dokter)){

                $status = "preliminary";

            } else {

                date_default_timezone_set('Asia/Jakarta');
                $xDetailDataRequest = ["kategori" => "Composition", "no_rm" => $data->no_rm, "message" => 'Status tidak terdefinisasi', "jenis_data" => 'error', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama'), "param" => $idGizi, "function" => 'update integrasiComposition model satu sehat'];
                $this->db->insert('sm_satu_sehat_log', $xDetailDataRequest);

                $cdecode = ["metaData" => ["code" => 201, "message" => 'ID Gizi Tidak ada']];
                return $cdecode;
                die();

            }

            $params = array(
                "resourceType"  => "Composition",
                "id"    => $data->id_gizi_satset,
                "identifier"    => [
                    array(
                        "system"    => "http://sys-ids.kemkes.go.id/Composition/".$idOrganization,
                        "use"=> "official",
                        "value" => $idGizi
                )],
                "status"    => "final",
                "type"  => array(
                    "coding"    => [
                        array(
                            "system" => "http://loinc.org",
                            "code" => "18842-5",
                            "display" => "Discharge summary"
                        )
                    ]
                ),
                "category"=> [
                    array(
                      "coding"=> [
                        array(
                          "system"=> "http://loinc.org",
                          "code"=> "LP173421-1",
                          "display"=> "Report"
                        )
                      ]
                    )
                ],
                "subject" => array(
                    "reference" => "Patient/".$data->ihsn,
                    "display" => $data->nama_pasien
                ),
                "encounter" => array(
                    "reference" => "Encounter/".$data->id_encounter,
                    "display" => "Kunjungan ".$data->nama_pasien . " di hari " . convertDateIndo($data->created_at)
                ),
                "date" => $tanggalLayanan,
                "author" => [
                    array(
                        "reference" => "Practitioner/".$data->ihs_number,
                        "display" => $data->nama_petugas
                    )
                ],
                "title" => "Formulir Konsultasi Gizi",
                "custodian" => array(
                    "reference" => "Organization/".$cekOrganisasi->integrasi_baru
                ),
                "section" => [
                    array(
                        "code" => array(
                            "coding" => [
                                array(
                                    "system" => "http://loinc.org",
                                    "code" => "42344-2",
                                    "display" => "Discharge diet (narrative)"
                                )
                            ]
                        ),
                        "text" => array(
                            "status" => "additional",
                            "div" => $intervensi
                        )
                    )
                ]
            );

            $dataApi = json_encode($params);

            $idParams = $data->id_gizi_satset;

            $urlEdit = $xKonfigurasi->apiurl . "Composition/" . $idParams;

            $output = $this->putComposition($urlEdit, $dataApi, $header);

            if($output['result'] !== false){

                if($output['respon'] === 200){

                    $result = json_decode($output['result']);

                    date_default_timezone_set('Asia/Jakarta');

                    $xDetailDataRequest = ["kategori" => "Composition", "no_rm" => $data->no_rm, "message" => json_encode($params), "jenis_data" => 'ok', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama'), "respon" => $output['respon'], "function" => 'update integrasiComposition Satu Sehat Model'];

                    $this->db->insert('sm_satu_sehat_log', $xDetailDataRequest);

                    $update = ["id_gizi_satset" => $result->id];

                    $data = $this->db->where('id_kg', (int)$idGizi)->update('sm_konsultasi_gizi', $update);

                    $decode = ["metaData" => ["code" => 200, "message" => 'Integrasi Composition Berhasil']];

                    return $decode;

                } else {

                    date_default_timezone_set('Asia/Jakarta');

                    $xDetailDataRequest = ["kategori" => "Composition", "no_rm" => $data->no_rm, "message" => $output['result'], "jenis_data" => 'error', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama'), "respon" => $output['respon'], "param" => json_encode($params), "function" => 'update integrasiComposition Satu Sehat Model'];

                    $this->db->insert('sm_satu_sehat_log', $xDetailDataRequest);

                    $result = json_decode($output['result']);
                    $decode = ["metaData" => ["code" => 202, "message" => $output['result']]];

                    return $decode;

                }

            }

        }
    }
}

