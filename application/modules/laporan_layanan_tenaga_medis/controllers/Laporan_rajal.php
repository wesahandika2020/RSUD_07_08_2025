<?php

defined('BASEPATH') or exit('No direct script access allowed');

// require('./application/third_party/phpoffice/vendor/autoload.php');

class Laporan_rajal extends SYAM_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('App_model', 'm_default');
        $this->load->model('Masterdata_model', 'm_masterdata');
        $this->load->model('Laporan_rajal_model', 'm_laporan');
		$this->load->model('laporan_rm/Laporan_rm_model', 'm_laporan_rm');
	}

    public function index()
    {
        $data['active']  = 'Laporan Rajal';
        $data['modules'] = $this->m_default->getDataModules($this->session->userdata('id_account_group'));
        $is_login        = $this->session->userdata('is_login');

        if ($is_login === true) :
            $data['hospital'] = $this->m_default->getDataHospital();
            $this->load->view('layouts/index', $data);

        else :
            redirect('/');

        endif;
    }

    public function page_lap_rajal()
    {
        $data['bulan']              = $this->m_masterdata->getBulan();
        $data['jenis_laporan']      = $this->m_laporan->list_laporan();
        $data['periode_laporan']    = $this->m_laporan->getPeriodeLaporan();
        $data['unit']               = $this->m_laporan->getUnitDepo();
        $data['unit_all']           = $this->m_laporan->getUnitDepoAll();
        $data['jenis_pasien']       = $this->m_laporan->getJenisPasien();
        $data['cara_bayar']         = $this->m_masterdata->getCaraBayar(true);
        $data['tempat_layanan']     = $this->m_masterdata->getTempatLayananRajal();
		$data['status_keluar']    	= $this->m_laporan_rm->getStatusKeluar();
		$data['asal_kunjungan_status_keluar'] = [
			'' 			=> 'Semua',
			'jalan' => 'Poliklinik',
			'igd' 	=> 'IGD',
			'ranap' => 'Rawat Inap',
			'icare' => 'Intensive Care',
		];
        $this->load->view('index', $data);
    }

    // laporan waktu tunggu
    public function export_laporan_01()
    {
        $this->load->model('Laporan_rajal_model', 'm_laporan_rajal');
        $search = [
            'periode_laporan' 	=> safe_get('periode_laporan'),
			'tanggal_harian'  	=> safe_get('tanggal_harian'),
			'bulan'           	=> safe_get('bulan'),
			'tahun'           	=> safe_get('tahun'),
			'tanggal_awal'	  	=> safe_get('tanggal_awal'),
			'tanggal_akhir'   	=> safe_get('tanggal_akhir'),
			'id_dokter'       	=> safe_get('id_dokter'),
			'jenis_pasien'	 	=> safe_get('jenis_pasien'),
			'penjamin'			=> safe_get('penjamin'),
			'tempat_layanan'	=> safe_get('tempat_layanan'),
        ];

        $param = "";
        if ($search["id_dokter"] !== "") {
            $param .= " AND lp.id_dokter = '" . $search["id_dokter"] . "' ";
        }
        if ($search["penjamin"] !== "") {
            $param .= " AND lp.id_penjamin = '" . $search["penjamin"] . "' ";
        }
        if ($search["periode_laporan"] === "Harian") {
            if ($search["tanggal_harian"] !== "") :
                $param .= " and to_char( lp.tanggal_layanan, 'yyyy-mm-dd' ) ilike '%" . date2mysql($search['tanggal_harian']) . "' ";
            endif;
        } elseif ($search["periode_laporan"] === "Bulanan" & $search["bulan"] !== "" & $search["tahun"] !== "") {
            $param .= " and to_char( lp.tanggal_layanan, 'yyyy/mm' ) = '" . $search["tahun"] . "/" . $search["bulan"] . "' ";
        } elseif ($search["periode_laporan"] === "Rentang Waktu" & $search["tanggal_awal"] !== "" & $search["tanggal_akhir"] !== "") {
            if ($search["tanggal_awal"] !== "" & $search["tanggal_akhir"] !== "") :
                $param .= " and lp.tanggal_layanan BETWEEN '" . date2mysql($search['tanggal_awal']) . " 00:00:00' AND '" . date2mysql($search['tanggal_akhir']) . " 23:59:59'";
            endif;
        }
        if ($search["tempat_layanan"] !== "") :
			$param .= " and sp.nama = '".$search["tempat_layanan"]."' ";
		endif;

        $totalWaktu = "SELECT SUM(tanggal_keluar - tanggal_daftar) AS total_waktu_tunggu
                        FROM sm_pendaftaran as pd
                        JOIN sm_layanan_pendaftaran AS lp ON lp.id_pendaftaran = pd.id
                        JOIN sm_tenaga_medis AS tm ON tm.id = lp.id_dokter
                        JOIN sm_penjamin AS pj ON pj.id = lp.id_penjamin
                        JOIN sm_pegawai AS pg ON tm.id_pegawai = pg.id
                        JOIN sm_profesi_nadis AS pn ON tm.id_profesi = pn.id
                        JOIN sm_jabatan AS jb ON pg.id_jabatan = jb.id
                        JOIN sm_spesialisasi AS sp ON sp.id = lp.id_unit_layanan
                        WHERE tanggal_keluar IS NOT NULL" . $param ;

        $totalData = "SELECT COUNT(*) AS total
                        FROM sm_pendaftaran as pd
                        JOIN sm_layanan_pendaftaran AS lp ON lp.id_pendaftaran = pd.id
                        JOIN sm_tenaga_medis AS tm ON tm.id = lp.id_dokter
                        JOIN sm_penjamin AS pj ON pj.id = lp.id_penjamin
                        JOIN sm_pegawai AS pg ON tm.id_pegawai = pg.id
                        JOIN sm_profesi_nadis AS pn ON tm.id_profesi = pn.id
                        JOIN sm_jabatan AS jb ON pg.id_jabatan = jb.id
                        JOIN sm_spesialisasi AS sp ON sp.id = lp.id_unit_layanan
                        WHERE tanggal_keluar IS NOT NULL" . $param;

        // hitung waktu tunggu
        $queryTotalWaktu = $this->db->query($totalWaktu)->row()->total_waktu_tunggu;
        $queryTotalData = $this->db->query($totalData)->row()->total;
        $matches = array();
        preg_match('/(\d+):(\d+):(\d+)/', $queryTotalWaktu, $matches);
        if (count($matches) >= 4) {
            $hours = intval($matches[1]);
            $minutes = intval($matches[2]);
            $seconds = intval($matches[3]);
            $days = 0;
            // Hitung total waktu dalam detik
            $totalSeconds = ((($days * 24 + $hours) * 60 + $minutes) * 60 + $seconds);

            $data["total_waktu"] = $totalSeconds;
            $data["total_data"] = $queryTotalData;
            $data['rata_waktu'] = $totalSeconds / $queryTotalData;
        } else {
            // Handle jika format waktu tidak sesuai
            $data["total_waktu"] = null;
            $data["total_data"] = $queryTotalData;
            $data['rata_waktu'] = null;
        }

        $queryWaktuKurang  = "SELECT ROUND((COUNT(*) FILTER (WHERE (tanggal_keluar - tanggal_daftar) < INTERVAL '1 hour') * 100.0 / COUNT(*)), 2) AS persentase
                        FROM sm_pendaftaran as pd
                        JOIN sm_layanan_pendaftaran AS lp ON lp.id_pendaftaran = pd.id
                        JOIN sm_tenaga_medis AS tm ON tm.id = lp.id_dokter
                        JOIN sm_penjamin AS pj ON pj.id = lp.id_penjamin
                        JOIN sm_pegawai AS pg ON tm.id_pegawai = pg.id
                        JOIN sm_profesi_nadis AS pn ON tm.id_profesi = pn.id
                        JOIN sm_jabatan AS jb ON pg.id_jabatan = jb.id
                        JOIN sm_spesialisasi AS sp ON sp.id = lp.id_unit_layanan
                        WHERE tanggal_keluar IS NOT NULL" . $param;
        
        $waktuKurang = $this->db->query($queryWaktuKurang)->row()->persentase;

        $queryTotalWaktuKurang  = "SELECT COUNT(*) AS total_waktu_kurang
                        FROM sm_pendaftaran as pd
                        JOIN sm_layanan_pendaftaran AS lp ON lp.id_pendaftaran = pd.id
                        JOIN sm_tenaga_medis AS tm ON tm.id = lp.id_dokter
                        JOIN sm_penjamin AS pj ON pj.id = lp.id_penjamin
                        JOIN sm_pegawai AS pg ON tm.id_pegawai = pg.id
                        JOIN sm_profesi_nadis AS pn ON tm.id_profesi = pn.id
                        JOIN sm_jabatan AS jb ON pg.id_jabatan = jb.id
                        JOIN sm_spesialisasi AS sp ON sp.id = lp.id_unit_layanan
                        WHERE tanggal_keluar - tanggal_daftar < INTERVAL '1 hour'" . $param;
        
        $totalWaktuKurang = $this->db->query($queryTotalWaktuKurang)->row()->total_waktu_kurang;
        // var_dump($totalWaktuKurang);die;




        $data['get_date_format']    = $this->m_masterdata->get_date_format();
        $data                       = $this->m_laporan_rajal->getListDataLaporanWaktuTunggu(0, 0, $search);
        $data['parameter']          = $search;
        $data['tempat_dilayani'] = $search["tempat_layanan"] !== "" ? $search["tempat_layanan"] : "Semua";
        $data["total_waktu_kurang"] = $totalWaktuKurang;
        $data["waktu_kurang"] = $waktuKurang;
        // var_dump($data["tempat_dilayani"]);die;

        $this->load->view('lap_waktu_tunggu/export.php', $data);
    }

    // laporan tindakan dokter
    public function export_laporan_02()
    {
        $this->load->model('Laporan_rajal_model', 'm_laporan_rajal');
        $search = [
            'periode_laporan' 	=> safe_get('periode_laporan'),
			'tanggal_harian'  	=> safe_get('tanggal_harian'),
			'bulan'           	=> safe_get('bulan'),
			'tahun'           	=> safe_get('tahun'),
			'tanggal_awal'	  	=> safe_get('tanggal_awal'),
			'tanggal_akhir'   	=> safe_get('tanggal_akhir'),
			'id_dokter'       	=> safe_get('id_dokter'),
			'jenis_pasien'	 	=> safe_get('jenis_pasien'),
			'penjamin'			=> safe_get('penjamin'),
			'tempat_layanan'	=> safe_get('tempat_layanan'),
        ];


        $data['get_date_format']    = $this->m_masterdata->get_date_format();
        $data                       = $this->m_laporan_rajal->getListDataLaporanPemeriksaan(0, 0, $search);
        $data['parameter']          = $search;
        $data['tempat_dilayani']    = $search["tempat_layanan"] !== "" ? $search["tempat_layanan"] : "";
        // $data["total_waktu_kurang"] = $totalWaktuKurang;
        // $data["waktu_kurang"]       = $waktuKurang;
        // var_dump($data["tempat_dilayani"]);die;

        $this->load->view('lap_pemeriksaan/export.php', $data);
    }

    // laporan tempat layanan
    public function export_laporan_03()
    {
        $this->load->model('Laporan_rajal_model', 'm_laporan_rajal');
        $search = [
            'periode_laporan' 	=> safe_get('periode_laporan'),
			'tanggal_harian'  	=> safe_get('tanggal_harian'),
			'bulan'           	=> safe_get('bulan'),
			'tahun'           	=> safe_get('tahun'),
			'tanggal_awal'	  	=> safe_get('tanggal_awal'),
			'tanggal_akhir'   	=> safe_get('tanggal_akhir'),
			'id_dokter'       	=> safe_get('id_dokter'),
			'jenis_pasien'	 	=> safe_get('jenis_pasien'),
			'penjamin'			=> safe_get('penjamin'),
			'tempat_layanan'	=> safe_get('tempat_layanan'),
        ];


        $data['get_date_format']    = $this->m_masterdata->get_date_format();
        $data                       = $this->m_laporan_rajal->getListDataLaporanKunjungan(0, 0, $search);
        $data['parameter']          = $search;
        $data['tempat_dilayani']    = $search["tempat_layanan"] !== "" ? $search["tempat_layanan"] : "";
        // $data["total_waktu_kurang"] = $totalWaktuKurang;
        // $data["waktu_kurang"]       = $waktuKurang;
        // var_dump($data["tempat_dilayani"]);die;

        $this->load->view('lap_kunjungan/export.php', $data);
    }

    public function export_laporan_mrs()
    {
        $this->load->model('Laporan_rajal_model', 'm_laporan_rajal');
        $search = [
            'periode_laporan'   => safe_get('periode_laporan'),
            'tanggal_harian'    => safe_get('tanggal_harian'),
            'bulan'             => safe_get('bulan'),
            'tahun'             => safe_get('tahun'),
            'tanggal_awal'      => safe_get('tanggal_awal'),
            'tanggal_akhir'     => safe_get('tanggal_akhir'),
            'penjamin'          => safe_get('penjamin'),
            'tempat_layanan'    => safe_get('tempat_layanan'),
        ];


        $data['get_date_format']    = $this->m_masterdata->get_date_format();
        $data                       = $this->m_laporan_rajal->getExportLaporan($search);
        $data['parameter']          = $search;
        $data['tempat_dilayani']    = $search["tempat_layanan"] !== "" ? $search["tempat_layanan"] : "";
        

        // var_dump($data);
        $this->load->view('lap_mrs/export.php', $data);
    }

    public function export_laporan_diagnosa()
    {
        $this->load->model('Laporan_rajal_model', 'm_laporan_rajal');
        $search = [
            'periode_laporan'   => safe_get('periode_laporan'),
            'tanggal_harian'    => safe_get('tanggal_harian'),
            'bulan'             => safe_get('bulan'),
            'tahun'             => safe_get('tahun'),
            'tanggal_awal'      => safe_get('tanggal_awal'),
            'tanggal_akhir'     => safe_get('tanggal_akhir'),
            'tempat_layanan'    => safe_get('tempat_layanan'),
        ];


        $data['get_date_format']    = $this->m_masterdata->get_date_format();
        $data                       = $this->m_laporan_rajal->getExportLaporanDiagnosa($search);
        $data['parameter']          = $search;
        $data['tempat_dilayani']    = $search["tempat_layanan"] !== "" ? $search["tempat_layanan"] : "";
        

        // var_dump($data);
        $this->load->view('lap_diagnosa/export.php', $data);
    }

    public function export_laporan_diagnosa_pp()
    {
        $this->load->model('Laporan_rajal_model', 'm_laporan_rajal');
        $search = [
            'periode_laporan'   => safe_get('periode_laporan'),
            'tanggal_harian'    => safe_get('tanggal_harian'),
            'bulan'             => safe_get('bulan'),
            'tahun'             => safe_get('tahun'),
            'tanggal_awal'      => safe_get('tanggal_awal'),
            'tanggal_akhir'     => safe_get('tanggal_akhir'),
            'tempat_layanan'    => safe_get('tempat_layanan'),
        ];
        
        
        $data['get_date_format']    = $this->m_masterdata->get_date_format();
        $data                       = $this->m_laporan_rajal->getExportDataLaporanDiagnosaPp($search);
        $data['parameter']          = $search;
        $data['tempat_dilayani']    = $search["tempat_layanan"] !== "" ? $search["tempat_layanan"] : "";
        

        $this->load->view('lap_diagnosa_pp/export.php', $data);
    }

	function export_laporan_11()
	{
		$search = [
			'jenis_laporan'   	=> safe_get('jenis_laporan'),
			'periode_laporan' 	=> safe_get('periode_laporan'),
			'tanggal_harian'  	=> safe_get('tanggal_harian'),
			'bulan'           	=> safe_get('bulan'),
			'tahun'           	=> safe_get('tahun'),
			'tanggal_awal'    	=> safe_get('tanggal_awal'),
			'tanggal_akhir'   	=> safe_get('tanggal_akhir'),
			'asal_kunjungan_11'	=> safe_get('asal_kunjungan_11'),
			'status_keluar'		=> safe_get('status_keluar'),
		];

		$data['get_date_format'] 	= $this->m_masterdata->get_date_format();
		$data          						= $this->m_laporan_rm->getListDataLaporanRM11(0, 0, $search);
		$data['parameter']       	= $search;

		// var_dump($data['parameter']); die;

		$this->load->view('lap_status_keluar/export.php', $data);
	}
}
