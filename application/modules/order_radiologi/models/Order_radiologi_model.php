<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Order_radiologi_model extends CI_Model {

	function __construct()
	{
		parent::__construct();
        $this->datetime = date('Y-m-d H:i:s');
        $this->load->model("pelayanan/Pelayanan_model", "m_pelayanan");
	}

	private function sqlOrderRadiologi($search)
    {
        $this->db->select("odrad.*, pd.id_pasien as no_rm, 
                    pd.no_register, p.nama as pasien, 
                    COALESCE(sp.nama, '') as layanan, 
                    COALESCE(pg.nama, '') as dokter, 
                    COALESCE(bg.nama, '') as bangsal, 
                    CONCAT_WS(' ', lp.jenis_layanan, sp.nama) as layanan, 
                    lp.id as id_layanan_pendaftaran, lp.id_pendaftaran, pd.jenis_igd");
        $this->db->from("sm_order_radiologi as odrad");
        $this->db->join("sm_layanan_pendaftaran as lp", "lp.id = odrad.id_layanan_pendaftaran");
        $this->db->join("sm_pendaftaran as pd", "pd.id = lp.id_pendaftaran");
        $this->db->join("sm_pasien as p", "p.id = pd.id_pasien");
        $this->db->join("sm_spesialisasi as sp", "sp.id = lp.id_unit_layanan", "left");
        $this->db->join("sm_tenaga_medis as tm", "tm.id = odrad.id_dokter", "left");
        $this->db->join("sm_pegawai as pg", "pg.id = tm.id_pegawai", "left");
        $this->db->join("sm_rawat_inap as ri", "ri.id_layanan_pendaftaran = lp.id", "left");
        $this->db->join("sm_bangsal as bg", "bg.id = ri.id_bangsal", "left");

        if (($search['tanggal_awal'] !== '') & ($search['tanggal_akhir'] !== '')) :
            $this->db->where("odrad.waktu_order BETWEEN '" . date2mysql($search['tanggal_awal']) . " 00:00:00' AND '" . date2mysql($search['tanggal_akhir']) . " 23:59:59'");
        endif;

        if ($search['no_register'] !== '') :
            $this->db->where('pd.no_register', $search['no_register'], true);
        endif;

        if ($search['no_rm'] !== '') :
            $this->db->like('p.id', $search['no_rm'], 'before', true);
        endif;

        if ($search['dokter'] !== '') :
            $this->db->where('odrad.id_dokter', $search['dokter']);
        endif;

        if ($search['jenis'] !== '') :
            $this->db->where('odrad.jenis', $search['jenis']);
        endif;

        if ($search['nama'] !== '') :
            $this->db->where("p.nama ilike '%" . strtolower($search['nama']) . "%'");
        endif;
        
        if ($search['status_konfirmasi'] == '2') :
            $this->db->where('odrad.status', 'konfirm');
        endif;

        if ($search['status_konfirmasi'] == '3') :
            $this->db->where('odrad.status', 'request');
        endif;

        return $this->db->order_by('odrad.waktu_order', 'desc');    
    }

    private function _listOrderRadiologi($limit = 0, $start = 0, $search)
    {
        $this->sqlOrderRadiologi($search);
		if ($limit !== 0) :
			$this->db->limit($limit, $start);
        endif;

        return $this->db->get()->result();
        // $this->db->get(); echo $this->db->last_query(); exit();
    }

    function getListDataOrderRadiologi($limit = 0, $start = 0, $search)
    {
        $result['data'] = $this->_listOrderRadiologi($limit, $start, $search);
        $result['jumlah'] = $this->sqlOrderRadiologi($search)->get()->num_rows();
        $this->db->close();
        return $result;
    }

    function getConfigPacs()
    {
        return $this->db->where('id', '1')->get('sm_konfigurasi_pacs')->row();
    }

    function getConfigPostPacs()
    {
        return $this->db->where('id', '2')->get('sm_konfigurasi_pacs')->row();
    }

    function aksesPacs($id)
    {
        return $this->db->select("ss.*, sp.nama as nama_user")
            ->from('sm_akses_pacs as ss')
            ->join('sm_translucent as tr', 'tr.id = ss.userakses', 'left')
            ->join('sm_pegawai as sp', 'tr.id = sp.id', 'left')
            ->where('ss.userakses', $id, true)
            ->get()
            ->row();
        $this->db->close();
    }

    function postCurl($url, $data, $header = null)
    {   
        $this->load->library('Curl');

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US; rv:1.9.1.2) Gecko/20090729 Firefox/3.5.2 GTB5');
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        if ($header !== null) {
            curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        }
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $output['result'] = curl_exec($ch);
        $output['respon'] = curl_getinfo($ch, CURLINFO_RESPONSE_CODE);
        curl_close($ch);

        return $output;
    }

    function authHeader()
    {
        return array (
            'Content-Type: multipart/form-data'
        );
    }

    function authBearer($token)
    {
        return array (
            'Content-Type: multipart/form-data',
            'Authorization: Bearer '. $token .'');
    }

    function getDataOrder($idOrder)
    {
        $this->db->select("ord.*", false);

        $this->db->from('sm_order_radiologi as ord')
            ->where('ord.id', $idOrder);

            return $this->db->get()->row();

        $this->db->close();
    }

    function getDataBbPasienRanap($idLayanan)
    {
        $this->db->select("pp.id, pp.berat_badan, pd.id_pasien", false);

        $this->db->from('sm_layanan_pendaftaran as lp')
            ->join('sm_pendaftaran as pd', 'pd.id = lp.id_pendaftaran', 'left')
            ->join('sm_profil_pasien as pp', 'pp.id_pasien = pd.id_pasien', 'left')
            ->where('lp.id', $idLayanan, true);

            return $this->db->get()->row();

        $this->db->close();
    }

    function getDataBbPasienRajal($idLayanan)
    {
        $this->db->select("an.berat_badan", false);

        $this->db->from('sm_anamnesa as an')
            ->where('an.id_layanan_pendaftaran', $idLayanan, true);

            return $this->db->get()->row();

        $this->db->close();
    }

    function cekIdRuang($idRuang)
    {
        $this->db->select("rr.id, rr.nama_ruangan, am.code_modality, at.aetitle", false);

        $this->db->from('sm_ruang_radiologi as rr')
            ->join('sm_alat_modality as am', 'am.id = rr.id_alat', 'left')
            ->join('sm_ae_title as at', 'at.id = am.id_aetitle', 'left')
            ->where('rr.id', $idRuang);

            return $this->db->get()->row();

        $this->db->close();
    }

    function cekDokterRadiologi($idDokter)
    {
        $this->db->select("g.nama, dr.username", false);

        $this->db->from('sm_tenaga_medis as tm')
            ->join("sm_dokter_radiologi as dr", "dr.id_dokter = tm.id", 'left')
            ->join("sm_pegawai as g", "g.id = tm.id_pegawai", 'left')
            ->where('tm.id', $idDokter);

            return $this->db->get()->row();

        $this->db->close();
    }

    function cekNamaLayanan($idTarif)
    {
        $this->db->select("l.id, l.nama", false);

        $this->db->from('sm_tarif_pelayanan as tp')
            ->join("sm_layanan as l", "l.id = tp.id_layanan", 'left')
            ->where('tp.id', $idTarif);

            return $this->db->get()->row();

        $this->db->close();
    }

    function updatePembatalanOrderRadiologi($id_order, $data)
    {
        $this->db->trans_begin();
        $this->db->where("id", $id_order)->update("sm_order_radiologi", $data);
        if ($this->db->trans_status() === false) :
			$this->db->trans_rollback();
			$status = false;
			$message = 'Gagal melakukan pembatalan order radiologi';
		else :
			$this->db->trans_commit();
			$status = true;
			$message = 'Berhasil melakukan pembatalan order radiologi';
		endif;

		return array('status' => $status, 'message' => $message);
    }

    function ruangSembilan($q, $start, $limit)
    {
        $limit = " limit " . $limit . " offset " . $start;
        $w = " (am.name_modality ilike ('%$q%') or rr.nama_ruangan ilike ('%$q%')) ";
        $sql = "select rr.*, am.name_modality
                from sm_ruang_radiologi rr
                left join sm_alat_modality am on am.id = rr.id_alat
                where (rr.id_layanan = '99' or rr.id_layanan = '4947') and $w order by rr.nama_ruangan ";

        $data['data'] = $this->db->query($sql . $limit)->result();
        $data['total'] = $this->db->query($sql)->num_rows();
        return $data;
    }

    function dataOrderRadiologi($idorder)
    {
        $this->db->select("count(id_order_radiologi) as total");

        $this->db->from('sm_radiologi')
            ->where('id_order_radiologi', $idorder)
            ->group_by('id');

            return $this->db->get()->num_rows();

        $this->db->close();
    }

    function dataResponRadiologi($idorder)
    {
        $this->db->select("count(id_order_radiologi) as total");

        $this->db->from('sm_radiologi as sr')
            ->join("sm_detail_radiologi as dr", "dr.id_radiologi = sr.id", 'left')
            ->where('sr.id_order_radiologi', $idorder)
            ->where('dr.respon', '201')
            ->group_by('sr.id');

            return $this->db->get()->num_rows();

        $this->db->close();
    }

    function getDataDetailOrderRadiologi($id_order) 
    {
        $sql = "select odrad.*, p.id as no_rm, p.nama as pasien,
                (null) as item_pemeriksaan, pd.id as id_pendaftaran,
                pd.jenis_pendaftaran, COALESCE(sp.nama, '') as layanan, 
                COALESCE(pg.nama, '') as dokter, p.tanggal_lahir, p.kelamin, 
                lp.jenis_layanan, pj.nama as penjamin
                from sm_order_radiologi as odrad 
                join sm_layanan_pendaftaran as lp on (lp.id = odrad.id_layanan_pendaftaran) 
                join sm_pendaftaran as pd on (pd.id = lp.id_pendaftaran) 
                join sm_pasien as p on (p.id = pd.id_pasien) 
                left join sm_spesialisasi as sp on (sp.id = lp.id_unit_layanan) 
                left join sm_tenaga_medis as tm on (tm.id = odrad.id_dokter) 
                left join sm_pegawai as pg on (pg.id = tm.id_pegawai)
                left join sm_penjamin as pj on (lp.id_penjamin = pj.id) 
                where odrad.id = '".$id_order."'";
        $data = $this->db->query($sql)->row();

        if ($data){
            
            if($data->item !== null && $data->item !== ''){
                $dataTarif = json_decode($data->item);
                $item = array();
                foreach ($dataTarif as $tarif){
                    $this->db->select("tp.id, l.id_parent, l.nama as layanan, '' as penjamin, 'tidak' as cito, tp.jenis, COALESCE(k.nama, '') as kelas, tp.total");
                    $this->db->from("sm_tarif_pelayanan as tp");
                    $this->db->join("sm_layanan as l", "l.id = tp.id_layanan");
                    $this->db->join("sm_kelas as k", "k.id = tp.id_kelas");
                    $this->db->where("tp.id", $tarif->item);
                    $order = $this->db->get()->row();

                    $this->db->select("dr.id, rr.nama_ruangan, am.name_modality, p.nama as nama_pegawai, sr.id_dokter_pjwb as id_dpjp, dr.respon");
                    $this->db->from("sm_detail_radiologi as dr");
                    $this->db->join("sm_radiologi as sr", "sr.id = dr.id_radiologi", 'left');
                    $this->db->join("sm_order_radiologi as odrad", "odrad.id = sr.id_order_radiologi", 'left');
                    $this->db->join("sm_tenaga_medis as tm", "tm.id = sr.id_dokter_pjwb", 'left');
                    $this->db->join("sm_pegawai as p", "p.id = tm.id_pegawai", 'left');
                    $this->db->join("sm_ruang_radiologi as rr", "rr.id = dr.ruangan", 'left');
                    $this->db->join("sm_alat_modality as am", "am.id = rr.id_alat", 'left');
                    $this->db->where("dr.id_tarif", $tarif->item);
                    $this->db->where("odrad.id", $data->id);
                    $konfirmOrder = $this->db->get()->row();

                    if($konfirmOrder !== null){

                        $idKonfirm = $konfirmOrder->id;
                        $namaRuangan = $konfirmOrder->nama_ruangan.' - '.$konfirmOrder->name_modality;
                        $namaPegawai = $konfirmOrder->nama_pegawai;
                        $respon = $konfirmOrder->respon;
                        $idRuang = null;

                    } else {

                        $idKonfirm = null;
                        if($order->id_parent !== 99 && $order->id_parent !== 4947){

                            $this->db->select("rr.id, rr.nama_ruangan");
                            $this->db->from("sm_tarif_pelayanan as tp");
                            $this->db->join("sm_layanan as l", "l.id = tp.id_layanan", "left");
                            $this->db->join("sm_ruang_radiologi as rr", "l.id_parent = rr.id_layanan", "left");
                            $this->db->where("tp.id", $tarif->item);
                            $namaRuang = $this->db->get()->row();

                            $namaRuangan = $namaRuang->nama_ruangan;
                            $idRuang = $namaRuang->id;

                        } else {

                            $namaRuangan = null;
                            $idRuang = null;

                        }
                        
                        $namaPegawai = null;
                        $respon = null;

                    }

                    if ($tarif->penjamin !== "0") :
                        $dataPenjamin = $this->db->where("id", $tarif->penjamin)->get("sm_penjamin")->row();
                        if ($dataPenjamin) :
                            $order->penjamin = $dataPenjamin->nama;
                        endif;
                    endif;

                    $order->cito = $tarif->cito;
                    if(isset($tarif->berat_badan)){

                        $order->berat_badan = $tarif->berat_badan;

                    } else {

                        $order->berat_badan = null;

                    }
                    
                    $order->keterangan = $tarif->keterangan; // tambahan lina radiologi
                    $order->konfirm = $idKonfirm;
                    $order->ruang = $namaRuangan;
                    $order->dpjp = $namaPegawai;
                    $order->respon = $respon;
                    $order->id_ruang = $idRuang;
                    $item[] = $order;
                }
                $data->item_pemeriksaan = $item;
            }
        }

        $this->db->close();

        if(isset($data->item_pemeriksaan[0]->berat_badan)){

            if($data->item_pemeriksaan[0]->berat_badan === null){

                $data = false;

                return $data;

            } else {

                return $data;

            }
        
        } else {

            if($data->berat_badan !== null && $data->berat_badan !== ''){
        
                return $data;

            } else {

                if($data->jenis_layanan === 'Rawat Inap' || $data->jenis_layanan === 'Intensive Care'){

                    $dataLayananPendaftaran = (int)$data->id_layanan_pendaftaran;
                    $cekBb = $this->getDataBbPasienRanap($dataLayananPendaftaran);

                    if($cekBb->berat_badan === null){

                        $data = 'Rawat Inap';

                        return $data;

                    } else {

                        return $data;
                    }

                } else if($data->jenis_layanan === 'Poliklinik'){

                    $dataLayananPendaftaran = (int)$data->id_layanan_pendaftaran;
                    $cekBb = $this->getDataBbPasienRajal($dataLayananPendaftaran);

                    if($cekBb->berat_badan === null){

                        $data = 'Poliklinik';

                        return $data;

                    } else {

                        return $data;
                        
                    }

                } else {

                    $data = false;

                    return $data;

                }

            }

        }
        
    }

    private function sqlDataTindakan($id)
    {
        
        date_default_timezone_set('Asia/Jakarta');

        $this->db->select("sdr.id_dokter", false);
        $this->db->from('sm_detail_radiologi as sdr')
            ->join('sm_radiologi as sr', 'sr.id = sdr.id_radiologi', 'left');
        $this->db->where('sdr.id_dokter', $id, true);
        $this->db->where("sr.waktu_konfirm BETWEEN '" . date('Y-m-d') . " 00:00:00' AND '" . date('Y-m-d') . " 23:59:59'");
        $this->db->order_by('sdr.id_dokter', 'asc');

        return $this->db->get()->result();

    }

    function getAutoDokter($q, $start, $limit)
    {
        $limit = " limit " . $limit . " offset " . $start;
        $select = "select n.*,pg.id as id_pegawai, null as tindakan, pg.nama, COALESCE(s.nama , '') as spesialisasi ";
        $count = "select count(n.id) as count ";
        $sql = "from sm_tenaga_medis n
                join sm_pegawai pg on (pg.id = n.id_pegawai)
                left join sm_spesialisasi s on (s.id = n.id_spesialisasi)
                left join sm_profesi_nadis prn on (prn.id = n.id_profesi)
                left join sm_dokter_radiologi dr on (dr.id_dokter = n.id)
                where pg.nama ilike ('%$q%')
                and (prn.nama = 'Dokter Umum' or prn.nama = 'Dokter Spesialis' or prn.nama = 'Dokter')
                and dr.id is not null
                and pg.status = '1'";

        // echo $select . $sql; die;
        $data['data'] = $this->db->query($select . $sql . $limit)->result();
        $data['total'] = $this->db->query($count . $sql)->row()->count;

        foreach($data['data'] as $key => $value){

            $dataTindakan = $this->sqlDataTindakan((int)$value->id);

            $data['data'][$key]->tindakan = count($dataTindakan);

        }
        
        return $data;
    }

    function getDokterPerujuk($q, $start, $limit)
    {
        $limit = " limit " . $limit . " offset " . $start;
        $select = "select n.*,pg.id as id_pegawai, pg.nama, COALESCE(s.nama , '') as spesialisasi ";
        $count = "select count(n.id) as count ";
        $sql = "from sm_tenaga_medis n
                join sm_pegawai pg on (pg.id = n.id_pegawai)
                left join sm_spesialisasi s on (s.id = n.id_spesialisasi)
                left join sm_profesi_nadis prn on (prn.id = n.id_profesi)
                where pg.nama ilike ('%$q%')
                and (prn.nama = 'Dokter Umum' or prn.nama = 'Dokter Spesialis' or prn.nama = 'Dokter')
                and pg.status = '1'";

        // echo $select . $sql; die;
        $data['data'] = $this->db->query($select . $sql . $limit)->result();
        $data['total'] = $this->db->query($count . $sql)->row()->count;
        return $data;
    }

    function generateKodePenunjang($id)
    {
        date_default_timezone_set('Asia/Jakarta');
        $format = date("d") . "" . date("m") . "" . date("Y");
        $kodeGenerate = $id . "" . $format;
        $update = array('kode' => $kodeGenerate);
        $this->db->where('id', $id)->update('sm_radiologi', $update);

        return $kodeGenerate;
        
    }

    function simpanDataRadiologi($dataRadiologi, $tindakanRadiologi)
    {
        if ($tindakanRadiologi !== null) :
            $dataLayananPendaftaran = $this->db->where("id", $dataRadiologi['id_layanan_pendaftaran'])->get('sm_layanan_pendaftaran')->row();
            $this->db->insert("sm_radiologi", $dataRadiologi);
            $id = $this->db->insert_id();
        else :
            $id = NULL;
        endif;

        return $id;
    }

    function cekPenjaminanTarif($id_tarif, $id_penjamin)
    {
        $where = '';
        if ($id_penjamin !== NULL) {
            $where = " and tp.id_penjamin = '" . $id_penjamin . "'";
        }

        $sql = "select count(*) as jumlah from sm_tarif_pelayanan kt
                join sm_tarif_penjamin tp on (tp.id_tarif = kt.id)
                where kt.id = '" . $id_tarif . "'" . $where . "";

        return $this->db->query($sql)->row();

        $this->db->close();
        
    }

    function simpanDataDetailRadiologi($id_layanan_pendaftaran, $dataDetailRadiologi, $jenis)
    {
        $dataLayananPendaftaran = $this->db->select("lp.*, pj.diskon")->from("sm_layanan_pendaftaran as lp")->join("sm_penjamin as pj", "pj.id = lp.id_penjamin", "left")->where("lp.id", $id_layanan_pendaftaran, true)->get()->row();
        if ($dataLayananPendaftaran){
            $caraBayar = $dataLayananPendaftaran->cara_bayar;
            $jenisLayanan = $dataLayananPendaftaran->jenis_layanan;
            $valueTindakan = $dataDetailRadiologi["tindakan_radiologi"];
            $dataTarifPelayanan = $this->db->where("id", $valueTindakan)->get("sm_tarif_pelayanan")->row();

            $totalBiaya = $dataTarifPelayanan->total;
            $cito = NULL;
            $beaCito = 0;
            if ($dataDetailRadiologi["cito"] === 'ya') :
                (String)$cito = "Cito";
                if ($dataTarifPelayanan->id_kelas == 1) :
                    $renum = 0;
                    // $renum = 25;
                else :
                    $renum = 0;
                    // $renum = 20;
                endif;

                $beaCito = $renum / 100 * $dataTarifPelayanan->total;
                $totalBiaya = $beaCito + $dataTarifPelayanan->total;
            endif;

            $penjamin = NULL;
            if ($dataLayananPendaftaran->id_penjamin !== NULL) :
                $cek = $this->cekPenjaminanTarif($valueTindakan, $dataLayananPendaftaran->id_penjamin);
                $angkaCek = (int)$cek->jumlah;
                if (0 < $angkaCek) :
                    $penjamin = (int) $dataLayananPendaftaran->id_penjamin;
                    $reimburse = (int) $dataLayananPendaftaran->diskon / 100 * $totalBiaya;
                else :
                    $penjamin = NULL;
                    $reimburse = 0;
                endif;
            else :
                $reimburse = 0;
            endif;
            
            $dataDetail = array(
                "id_radiologi" => (int) $dataDetailRadiologi["id_radiologi"],
                "id_tarif" => (int) $valueTindakan,
                "id_dokter" => $dataDetailRadiologi["dokter"] != "" || $dataDetailRadiologi["dokter"] != 0 ? (int)$dataDetailRadiologi["dokter"] : NULL,
                "jasa_klinik" => floatval($dataTarifPelayanan->jasa_klinik),
                "jasa_nadis" => floatval($dataTarifPelayanan->jasa_nadis),
                "bhp" => floatval($dataTarifPelayanan->bhp),
                "cito" => $cito,
                "keterangan_klinis" => $dataDetailRadiologi["keterangan_klinis"],
                "bea_cito" => floatval($beaCito),
                "total" => floatval($totalBiaya),
                "id_penjamin" => $penjamin,
                "reimburse" => floatval($reimburse),
                "berat_badan" => $dataDetailRadiologi["berat_badan"],
                "ruangan" => (int) $dataDetailRadiologi["ruangan"],
                "accessnumber" => $dataDetailRadiologi["accessnumber"],
            );

            if ($dataDetailRadiologi["instansi"] !== "") :
                $dataDetail["id_instansi_rujuk"] = (int) $dataDetailRadiologi["instansi"];
            endif;
            
            $this->db->insert("sm_detail_radiologi", $dataDetail);

            $id = $this->db->insert_id();

            if($id !== null){

                if ($jenis === "Rawat Inap") :
                    $jenisTransaksi = "Rawat Inap";
                    $id_posting = $id_layanan_pendaftaran;
                else :
                    if ($jenis = "IGD") :
                        $jenisTransaksi = "IGD";
                        $id_posting = $id_layanan_pendaftaran;
                    else :
                        if ($jenis === "MCU") :
                            $jenisTransaksi = "MCU";
                            $id_posting = $id_layanan_pendaftaran;
                        else :
                            $jenisTransaksi = "Radiologi";
                            $id_posting = $dataDetailRadiologi["id_radiologi"];
                        endif;
                    endif;
                endif;

                $this->m_pelayanan->updatePembayaran($dataLayananPendaftaran->id_pendaftaran, $id_posting, $id_layanan_pendaftaran, $jenisTransaksi, $totalBiaya, $reimburse);
                if ($caraBayar !== "Tunai") :
                    if ($penjamin === NULL) :
                        
                    endif;
                endif;

                $decode = ["metaData" => ["code" => 201, "message" => $id]];
                    
                return $decode;

            } else {

                return 'Gagal';

            }

            
        } else {
            
            return 'Gagal';

        }
    }

    function simpanResponPacs($data)
    {
        return $this->db->insert("sm_respon_pacs", $data, false);
    }	
	
	function getAntrianTerakhir($id_order) 
    {
        $sql = "SELECT concat(STRING_AGG(nomor_antrian_terbaru::TEXT, ','),' (',to_char( tanggal_kunjungan, 'dd-mm-yyyy' ),')') nomor_antrian_terbaru
                FROM ( SELECT kode_ruangan, MAX(nomor_antrian) AS nomor_antrian_terbaru, MAX(created_date) AS created_date_terbaru, tanggal_kunjungan
                      FROM sm_antrian_radiologi WHERE id_order_radiologi = '".$id_order."' 
                        GROUP BY kode_ruangan, tanggal_kunjungan
                ) AS subquery GROUP BY tanggal_kunjungan";
        $data = $this->db->query($sql)->row();

        return $data;        
    }

}
