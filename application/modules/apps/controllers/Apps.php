<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Apps extends SYAM_Controller {
    
    function __construct()
    {
        parent::__construct();
        $this->load->model('App_model', 'default');
        date_default_timezone_set('Asia/Jakarta');
        if (appLock()) {
            $this->load->view('lock');
            $this->output->_display();
            exit;
        }
    }
    
    function index()
    {
        $data['active'] = '';
        $data['modules'] = $this->default->getDataModules($this->session->userdata('id_account_group'));
        $is_login = $this->session->userdata('is_login');

        if ($is_login === true) :
            $data['hospital'] = $this->default->getDataHospital();
            $this->load->view('layouts/index', $data);
        else :
            redirect('auth');
        endif;
    }

    function page_dashboard()
    {
        $this->load->view('apps/dashboard');
    }

    function get_all_data_pasien_status()
    {
        $totalDays = 6;
        $tanggalDefinition = date('Y-m-d');
        $tanggalEnd = $tanggalDefinition . " 23:59:59";
        $tanggalStart = date("Y-m-d", strtotime($tanggalDefinition . " - " . $totalDays . " days")) . " 00:00:00";

        $param["tanggal_daftar"][] = $tanggalStart;
        $param["tanggal_keluar"][] = $tanggalEnd;
        
        // pasien baru
        $param["status"] = "Baru";
        $pasienBaru = $this->default->getAllDataPasienStatus($param)->result_array();       
        // pasien lama
        $param["status"] = "Lama";
        $pasienLama = $this->default->getAllDataPasienStatus($param)->result_array(); 
        // pasien batal
        $param["status"] = "Batal";
        $pasienBatal = $this->default->getAllDataPasienStatus($param)->result_array();

        $result["raw"]["pasienbaru"]  = $pasienBaru;
        $result["raw"]["pasienlama"]  = $pasienLama;
        $result["raw"]["pasienbatal"] = $pasienBatal;

        $tanggalBaru = array();
        if (!empty($pasienBaru)) :
            foreach ($pasienBaru as $key => $value) :
                $tanggalBaru[$value["waktu_daftar"]] = array("tanggal" => $value["waktu_daftar"], "jumlah" => (int) $value["jumlah"]);
            endforeach;
        endif;

        $tanggalLama = array();
        if (!empty($pasienLama)) :
            foreach ($pasienLama as $key => $value) :
                $tanggalLama[$value["waktu_daftar"]] = array("tanggal" => $value["waktu_daftar"], "jumlah" => (int) $value["jumlah"]);
            endforeach;
        endif;

        $tanggalBatal = array();
        if (!empty($pasienBatal)) :
            foreach ($pasienBatal as $key => $value) :
                $tanggalBatal[$value["waktu_daftar"]] = array("tanggal" => $value["waktu_daftar"], "jumlah" => (int) $value["jumlah"]);
            endforeach;
        endif;

        $dataPasienBaru  = array();
        $dataPasienLama  = array();
        $dataPasienBatal = array();

        for ($i = $totalDays; 0 <= $i; $i--) :
            $date = date("Y-m-d", strtotime($tanggalDefinition . " - " . $i . " days"));
            if (!empty($tanggalBaru[$date]["jumlah"])) :
                $dataPasienBaru[] = $tanggalBaru[$date]["jumlah"];
            else :
                $dataPasienBaru[] = 0;
            endif;

            if (!empty($tanggalLama[$date]["jumlah"])) :
                $dataPasienLama[] = $tanggalLama[$date]["jumlah"];
            else :
                $dataPasienLama[] = 0;
            endif;

            if (!empty($tanggalBatal[$date]["jumlah"])) :
                $dataPasienBatal[] = $tanggalBatal[$date]["jumlah"];
            else :
                $dataPasienBatal[] = 0;
            endif;

            $result["tanggal"][] = indo_tgl_graph($date);
        endfor;

        $result["title"] = "Grafik Status Kunjungan Pasien";
        $result["subtitle"] = "Tahun " . date('Y');
        $result["data"][] = array("type" => "spline", "name" => "Pasien Baru", "color" => "#02A8F3",  "data" => $dataPasienBaru);
        $result["data"][] = array("type" => "spline", "name" => "Pasien Lama", "color" => "#00C292", "data" => $dataPasienLama);
        $result["data"][] = array("type" => "spline", "name" => "Pasien Batal", "color" => "#E46A76", "data" => $dataPasienBatal);
        echo json_encode($result);
    }

    function get_top_data_diagnosis()
    {
        $dataExist = $this->default->getLastDataExistPendaftaran()->row();
        if ($dataExist !== NULL) :
            $dateExplode = explode("-", $dataExist->tanggal);
            $bulan = $dateExplode[1];
    
            $tanggalStart = date("Y-" . $bulan . "-01");
            $tanggalEnd = date("Y-" . $bulan . "-d");
    
            $data = $this->default->getDataTopTenDiagnosis($tanggalStart, $tanggalEnd);
            $result["title"] = "Data 10 Penyakit yang Diderita Pasien Dalam 1 Bulan";
            
            if (0 < count((array)$data)) :
                foreach ($data as $key => $value) :
                    $result["series"]["data"][] = array("name" => $value->nama, "y" => (int) $value->jumlah);
                endforeach;
                $result["series"]["data"][0] += array("sliced" => true, "selected" => true);
            else :
                $result['series']['data'][] = array("name" => "", "y" => 0);
            endif;
        else :
            $result['series']['data'][] = array("name" => "", "y" => 0);    
        endif;
        echo json_encode($result);
    }

    function get_all_data_pasien_unit()
    {
        $totalDays = 6;
        $tanggalDefinition = date('Y-m-d');
        $tanggalEnd = $tanggalDefinition . " 23:59:59";
        $tanggalStart = date("Y-m-d", strtotime($tanggalDefinition . " - " . $totalDays . " days")) . " 00:00:00";

        $param["tanggal_daftar"][] = $tanggalStart;
        $param["tanggal_keluar"][] = $tanggalEnd;

        $result["data"] = array();
        $result["title"] = " Grafik Kunjungan Pasien Per Unit";
        $dataUnit = $this->db->select("sp.id, sp.nama")->from("sm_layanan_pendaftaran as lp")
                            ->join("sm_spesialisasi as sp", "sp.id = lp.id_unit_layanan")
                            ->where("lp.id_pendaftaran is not null")
                            ->where("date(lp.tanggal_layanan) between '".$tanggalStart."' and '".$tanggalEnd."'")
                            ->group_by("sp.id")
                            ->order_by("sp.nama asc")
                            ->get()->result_array();
        if (0 < count((array)$dataUnit)) :
            foreach ($dataUnit as $key => $value) :
                $param["id_unit_layanan"] = $value["id"];
                $dataSpesialisasi = $this->default->getDataPasienPerUnit($param)->result_array();
                $tmpTanggal = array();
                if (!empty($dataSpesialisasi)) :
                    foreach ($dataSpesialisasi as $i => $val) :
                        $tmpTanggal[$val["waktu_daftar"]] = array("tanggal" => $val["waktu_daftar"], "jumlah" => (int) $val["jumlah"]);
                    endforeach;
                endif;
    
                $dataArray = array();
                $result["tanggal"] = array();
    
                for ($i = $totalDays; 0 <= $i; $i--) :
                    $date = date("Y-m-d", strtotime($tanggalDefinition . " - " . $i . " days"));
    
                    if (!empty($tmpTanggal[$date])) :
                        $dataArray[] = $tmpTanggal[$date]["jumlah"];
                    else :
                        $dataArray[] = 0;
                    endif;
    
                    $result["tanggal"][] = indo_tgl_graph($date);
                endfor;
    
                $result["data"][] = array("name" => $value["nama"],  "data" => $dataArray);
            endforeach;
        else :
            $result["data"][] = array("name" => '',  "data" => []);
        endif;

        echo json_encode($result);
    }

    function get_all_data_pasien_status_rajal()
    {
        $totalDays = 6;
        $tanggalDefinition = date('Y-m-d');
        $tanggalEnd = $tanggalDefinition . " 23:59:59";
        $tanggalStart = date("Y-m-d", strtotime($tanggalDefinition . " - " . $totalDays . " days")) . " 00:00:00";

        $param["tanggal_daftar"][] = $tanggalStart;
        $param["tanggal_keluar"][] = $tanggalEnd;
        
        // pasien baru
        $param["status"] = "Baru";
        $pasienBaru = $this->default->getAllDataPasienStatusRajal($param)->result_array();       
        // pasien lama
        $param["status"] = "Lama";
        $pasienLama = $this->default->getAllDataPasienStatusRajal($param)->result_array(); 
        // pasien batal
        $param["status"] = "Batal";
        $pasienBatal = $this->default->getAllDataPasienStatusRajal($param)->result_array();

        $result["raw"]["pasienbaru"]  = $pasienBaru;
        $result["raw"]["pasienlama"]  = $pasienLama;
        $result["raw"]["pasienbatal"] = $pasienBatal;

        $tanggalBaru = array();
        if (!empty($pasienBaru)) :
            foreach ($pasienBaru as $key => $value) :
                $tanggalBaru[$value["waktu_daftar"]] = array("tanggal" => $value["waktu_daftar"], "jumlah" => (int) $value["jumlah"]);
            endforeach;
        endif;

        $tanggalLama = array();
        if (!empty($pasienLama)) :
            foreach ($pasienLama as $key => $value) :
                $tanggalLama[$value["waktu_daftar"]] = array("tanggal" => $value["waktu_daftar"], "jumlah" => (int) $value["jumlah"]);
            endforeach;
        endif;

        $tanggalBatal = array();
        if (!empty($pasienBatal)) :
            foreach ($pasienBatal as $key => $value) :
                $tanggalBatal[$value["waktu_daftar"]] = array("tanggal" => $value["waktu_daftar"], "jumlah" => (int) $value["jumlah"]);
            endforeach;
        endif;

        $dataPasienBaru  = array();
        $dataPasienLama  = array();
        $dataPasienBatal = array();

        for ($i = $totalDays; 0 <= $i; $i--) :
            $date = date("Y-m-d", strtotime($tanggalDefinition . " - " . $i . " days"));
            if (!empty($tanggalBaru[$date]["jumlah"])) :
                $dataPasienBaru[] = $tanggalBaru[$date]["jumlah"];
            else :
                $dataPasienBaru[] = 0;
            endif;

            if (!empty($tanggalLama[$date]["jumlah"])) :
                $dataPasienLama[] = $tanggalLama[$date]["jumlah"];
            else :
                $dataPasienLama[] = 0;
            endif;

            if (!empty($tanggalBatal[$date]["jumlah"])) :
                $dataPasienBatal[] = $tanggalBatal[$date]["jumlah"];
            else :
                $dataPasienBatal[] = 0;
            endif;

            $result["tanggal"][] = indo_tgl_graph($date);
        endfor;

        $result["title"] = "Grafik Status Kunjungan Pasien Rawat Jalan";
        $result["subtitle"] = "Tahun " . date('Y');
        $result["data"][] = array("type" => "spline", "name" => "Pasien Baru", "color" => "#02A8F3",  "data" => $dataPasienBaru);
        $result["data"][] = array("type" => "spline", "name" => "Pasien Lama", "color" => "#00C292", "data" => $dataPasienLama);
        $result["data"][] = array("type" => "spline", "name" => "Pasien Batal", "color" => "#E46A76", "data" => $dataPasienBatal);
        echo json_encode($result);
    }

    function get_all_data_pasien_status_ranap()
    {
        $totalDays = 6;
        $tanggalDefinition = date('Y-m-d');
        $tanggalEnd = $tanggalDefinition . " 23:59:59";
        $tanggalStart = date("Y-m-d", strtotime($tanggalDefinition . " - " . $totalDays . " days")) . " 00:00:00";

        $param["tanggal_daftar"][] = $tanggalStart;
        $param["tanggal_keluar"][] = $tanggalEnd;
        
        // pasien baru
        $param["status"] = "Baru";
        $pasienBaru = $this->default->getAllDataPasienStatusRanap($param)->result_array();       
        // pasien lama
        $param["status"] = "Lama";
        $pasienLama = $this->default->getAllDataPasienStatusRanap($param)->result_array(); 
        // pasien batal
        $param["status"] = "Batal";
        $pasienBatal = $this->default->getAllDataPasienStatusRanap($param)->result_array();

        $result["raw"]["pasienbaru"]  = $pasienBaru;
        $result["raw"]["pasienlama"]  = $pasienLama;
        $result["raw"]["pasienbatal"] = $pasienBatal;

        $tanggalBaru = array();
        if (!empty($pasienBaru)) :
            foreach ($pasienBaru as $key => $value) :
                $tanggalBaru[$value["waktu_daftar"]] = array("tanggal" => $value["waktu_daftar"], "jumlah" => (int) $value["jumlah"]);
            endforeach;
        endif;

        $tanggalLama = array();
        if (!empty($pasienLama)) :
            foreach ($pasienLama as $key => $value) :
                $tanggalLama[$value["waktu_daftar"]] = array("tanggal" => $value["waktu_daftar"], "jumlah" => (int) $value["jumlah"]);
            endforeach;
        endif;

        $tanggalBatal = array();
        if (!empty($pasienBatal)) :
            foreach ($pasienBatal as $key => $value) :
                $tanggalBatal[$value["waktu_daftar"]] = array("tanggal" => $value["waktu_daftar"], "jumlah" => (int) $value["jumlah"]);
            endforeach;
        endif;

        $dataPasienBaru  = array();
        $dataPasienLama  = array();
        $dataPasienBatal = array();

        for ($i = $totalDays; 0 <= $i; $i--) :
            $date = date("Y-m-d", strtotime($tanggalDefinition . " - " . $i . " days"));
            if (!empty($tanggalBaru[$date]["jumlah"])) :
                $dataPasienBaru[] = $tanggalBaru[$date]["jumlah"];
            else :
                $dataPasienBaru[] = 0;
            endif;

            if (!empty($tanggalLama[$date]["jumlah"])) :
                $dataPasienLama[] = $tanggalLama[$date]["jumlah"];
            else :
                $dataPasienLama[] = 0;
            endif;

            if (!empty($tanggalBatal[$date]["jumlah"])) :
                $dataPasienBatal[] = $tanggalBatal[$date]["jumlah"];
            else :
                $dataPasienBatal[] = 0;
            endif;

            $result["tanggal"][] = indo_tgl_graph($date);
        endfor;

        $result["title"] = "Grafik Status Kunjungan Pasien Rawat Inap";
        $result["subtitle"] = "Tahun " . date('Y');
        $result["data"][] = array("type" => "spline", "name" => "Pasien Baru", "color" => "#02A8F3",  "data" => $dataPasienBaru);
        $result["data"][] = array("type" => "spline", "name" => "Pasien Lama", "color" => "#00C292", "data" => $dataPasienLama);
        $result["data"][] = array("type" => "spline", "name" => "Pasien Batal", "color" => "#E46A76", "data" => $dataPasienBatal);
        echo json_encode($result);
    }

    function get_all_data_pasien_status_penunjang()
    {
        $totalDays = 6;
        $tanggalDefinition = date('Y-m-d');
        $tanggalEnd = $tanggalDefinition . " 23:59:59";
        $tanggalStart = date("Y-m-d", strtotime($tanggalDefinition . " - " . $totalDays . " days")) . " 00:00:00";

        $param["tanggal_daftar"][] = $tanggalStart;
        $param["tanggal_keluar"][] = $tanggalEnd;
        
        // pasien baru
        $param["status"] = "Baru";
        $pasienBaru = $this->default->getAllDataPasienStatusPenunjang($param)->result_array();       
        // pasien lama
        $param["status"] = "Lama";
        $pasienLama = $this->default->getAllDataPasienStatusPenunjang($param)->result_array(); 
        // pasien batal
        $param["status"] = "Batal";
        $pasienBatal = $this->default->getAllDataPasienStatusPenunjang($param)->result_array();

        $result["raw"]["pasienbaru"]  = $pasienBaru;
        $result["raw"]["pasienlama"]  = $pasienLama;
        $result["raw"]["pasienbatal"] = $pasienBatal;

        $tanggalBaru = array();
        if (!empty($pasienBaru)) :
            foreach ($pasienBaru as $key => $value) :
                $tanggalBaru[$value["waktu_daftar"]] = array("tanggal" => $value["waktu_daftar"], "jumlah" => (int) $value["jumlah"]);
            endforeach;
        endif;

        $tanggalLama = array();
        if (!empty($pasienLama)) :
            foreach ($pasienLama as $key => $value) :
                $tanggalLama[$value["waktu_daftar"]] = array("tanggal" => $value["waktu_daftar"], "jumlah" => (int) $value["jumlah"]);
            endforeach;
        endif;

        $tanggalBatal = array();
        if (!empty($pasienBatal)) :
            foreach ($pasienBatal as $key => $value) :
                $tanggalBatal[$value["waktu_daftar"]] = array("tanggal" => $value["waktu_daftar"], "jumlah" => (int) $value["jumlah"]);
            endforeach;
        endif;

        $dataPasienBaru  = array();
        $dataPasienLama  = array();
        $dataPasienBatal = array();

        for ($i = $totalDays; 0 <= $i; $i--) :
            $date = date("Y-m-d", strtotime($tanggalDefinition . " - " . $i . " days"));
            if (!empty($tanggalBaru[$date]["jumlah"])) :
                $dataPasienBaru[] = $tanggalBaru[$date]["jumlah"];
            else :
                $dataPasienBaru[] = 0;
            endif;

            if (!empty($tanggalLama[$date]["jumlah"])) :
                $dataPasienLama[] = $tanggalLama[$date]["jumlah"];
            else :
                $dataPasienLama[] = 0;
            endif;

            if (!empty($tanggalBatal[$date]["jumlah"])) :
                $dataPasienBatal[] = $tanggalBatal[$date]["jumlah"];
            else :
                $dataPasienBatal[] = 0;
            endif;

            $result["tanggal"][] = indo_tgl_graph($date);
        endfor;

        $result["title"] = "Grafik Status Kunjungan Pasien Penunjang (Rajal dan Ranap)";
        $result["subtitle"] = "Tahun " . date('Y');
        $result["data"][] = array("type" => "spline", "name" => "Pasien Baru", "color" => "#02A8F3",  "data" => $dataPasienBaru);
        $result["data"][] = array("type" => "spline", "name" => "Pasien Lama", "color" => "#00C292", "data" => $dataPasienLama);
        $result["data"][] = array("type" => "spline", "name" => "Pasien Batal", "color" => "#E46A76", "data" => $dataPasienBatal);
        echo json_encode($result);
    }
}
















