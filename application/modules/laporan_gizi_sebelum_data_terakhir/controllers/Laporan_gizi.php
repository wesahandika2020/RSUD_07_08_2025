<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Laporan_gizi extends SYAM_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('App_model', 'm_default');
        $this->load->model('Masterdata_model', 'm_masterdata');
        $this->load->model('Laporan_gizi_model', 'm_gizi');
    }

    public function index()
    {
        $data['active']  = 'Laporan Gizi';
        $data['modules'] = $this->m_default->getDataModules($this->session->userdata('id_account_group'));
        $is_login        = $this->session->userdata('is_login');

        if ($is_login === true) :
            $data['hospital'] = $this->m_default->getDataHospital();
            $this->load->view('layouts/index', $data);
        else :
            redirect('/');
        endif;
    }

    public function page_lap_gizi()
    {
        $data['jenis_laporan']    = $this->m_gizi->getJenisLaporan();
        $data['jenis_diet']       = $this->m_gizi->getJenisDiet();
        $data['tempat_layanan']   = $this->m_gizi->getTempatLayanan();
        $data['ruangan_ranap']    = $this->m_gizi->getRuangRanap();
        $data['ruangan_ic']       = $this->m_gizi->getRuangIc();
        $data['periode_laporan']  = $this->m_masterdata->getPeriodeLaporan();
        $data['bulan']            = $this->m_masterdata->getBulan();
        $data['jenis_rawat']      = $this->m_masterdata->getJenisLayananLaporan();
        $this->load->view('index', $data);
    }

    function export_laporan_01() {

		$search = [
			'jenis_laporan'   => safe_get('jenis_laporan'),
			'periode_laporan' => safe_get('periode_laporan'),
			'tanggal_harian'  => safe_get('tanggal_harian'),
			'bulan'           => safe_get('bulan'),
			'tahun'           => safe_get('tahun'),
			'tanggal_awal'    => safe_get('tanggal_awal'),
			'tanggal_akhir'   => safe_get('tanggal_akhir'),
			'jenis_diet'      => safe_get('jenis_diet'),
			'tempat_layanan'  => safe_get('tempat_layanan'),
			'ruangan_ranap'   => safe_get('ruangan_ranap'),
			'ruangan_ic'      => safe_get('ruangan_ic'),
		];	

        $data     = $this->m_gizi->getListLaporanGizi01(0,0, $search);
		$this->load->view( 'export/export_laporan_01.php', $data );
	}

    function export_laporan_02() {

		$search = [
			'jenis_laporan'   => safe_get('jenis_laporan'),
			'periode_laporan' => safe_get('periode_laporan'),
			'tanggal_harian'  => safe_get('tanggal_harian'),
			'bulan'           => safe_get('bulan'),
			'tahun'           => safe_get('tahun'),
			'tanggal_awal'    => safe_get('tanggal_awal'),
			'tanggal_akhir'   => safe_get('tanggal_akhir'),
			'jenis_diet'      => safe_get('jenis_diet'),
			'tempat_layanan'  => safe_get('tempat_layanan'),
			'ruangan_ranap'   => safe_get('ruangan_ranap'),
			'ruangan_ic'      => safe_get('ruangan_ic'),
		];	

        $data     = $this->m_gizi->getListLaporanGizi02(0,0, $search);
		$this->load->view( 'export/export_laporan_02.php', $data );
	}

	function export_laporan_03() {

		$search = [
			'jenis_laporan'   => safe_get('jenis_laporan'),
			'periode_laporan' => safe_get('periode_laporan'),
			'tanggal_harian'  => safe_get('tanggal_harian'),
			'bulan'           => safe_get('bulan'),
			'tahun'           => safe_get('tahun'),
			'tanggal_awal'    => safe_get('tanggal_awal'),
			'tanggal_akhir'   => safe_get('tanggal_akhir'),
			'jenis_diet'      => safe_get('jenis_diet'),
			'tempat_layanan'  => safe_get('tempat_layanan'),
			'ruangan_ranap'   => safe_get('ruangan_ranap'),
			'ruangan_ic'      => safe_get('ruangan_ic'),
		];	

        $jenis_diet_map     	= [ '1' => 'Diet Makan', '2' => 'Diet Cair', ];
        $tempat_layanan_map 	= [ '1' => 'Rawat Inap', '2' => 'Intensive Care', ];
		$data['periode'] 		= $this->periode($search);
		$data['jenis_diet'] 	= $jenis_diet_map[$search["jenis_diet"]] ?? '';	
		$data['tempat_layanan'] = $tempat_layanan_map[$search["tempat_layanan"]] ?? '';
		$data['ruangan_ranap']  = $search["ruangan_ranap"] <>'' ? $this->db->select('nama')->from('sm_bangsal')->where('id', $search["ruangan_ranap"])->get()->row()->nama : '';
		$data['ruangan_ic']     = $search["ruangan_ic"] <>'' ? $this->db->select('nama')->from('sm_bangsal')->where('id', $search["ruangan_ic"])->get()->row()->nama : '';
		
		if($search['jenis_diet']=='1'){ // MAKAN
			$data['jenisdiet']['DM']   		= $this->m_gizi->getListLaporanGizi03Makan($search,'jenisdiet','DM');
			$data['jenisdiet']['RG']   		= $this->m_gizi->getListLaporanGizi03Makan($search,'jenisdiet','RG');
			$data['jenisdiet']['RL']   		= $this->m_gizi->getListLaporanGizi03Makan($search,'jenisdiet','RL');
			$data['jenisdiet']['DJ']   		= $this->m_gizi->getListLaporanGizi03Makan($search,'jenisdiet','DJ');
			$data['jenisdiet']['RS']   		= $this->m_gizi->getListLaporanGizi03Makan($search,'jenisdiet','RS');
			$data['jenisdiet']['DL']   		= $this->m_gizi->getListLaporanGizi03Makan($search,'jenisdiet','DL');
			$data['jenisdiet']['TS']   		= $this->m_gizi->getListLaporanGizi03Makan($search,'jenisdiet','TS');
			$data['jenisdiet']['DH']   		= $this->m_gizi->getListLaporanGizi03Makan($search,'jenisdiet','DH');
			$data['jenisdiet']['TKTP']   	= $this->m_gizi->getListLaporanGizi03Makan($search,'jenisdiet','TKTP');
			$data['jenisdiet']['T. Kal']   	= $this->m_gizi->getListLaporanGizi03Makan($search,'jenisdiet','T. Kal');
			$data['jenisdiet']['R. Kal']   	= $this->m_gizi->getListLaporanGizi03Makan($search,'jenisdiet','R. Kal');
			$data['jenisdiet']['RP']   		= $this->m_gizi->getListLaporanGizi03Makan($search,'jenisdiet','RP');
			$data['jenisdiet']['R. Pur']   	= $this->m_gizi->getListLaporanGizi03Makan($search,'jenisdiet','R. Pur');
			$data['jenisdiet']['B (BIASA)']	= $this->m_gizi->getListLaporanGizi03Makan($search,'jenisdiet','B');
			$data['jenisdiet']['SONDE']   	= $this->m_gizi->getListLaporanGizi03Makan($search,'jenisdiet','SONDE');
			$data['jenisdiet']['C (CAIR)']  = $this->m_gizi->getListLaporanGizi03Makan($search,'jenisdiet','C');
			$data['jenisdiet']['P (PUASA)'] = $this->m_gizi->getListLaporanGizi03Makan($search,'jenisdiet','P');	

			$data['bentukmakan']['NB'] 		= $this->m_gizi->getListLaporanGizi03Makan($search,'bentukmakan','NB');
			$data['bentukmakan']['NT'] 		= $this->m_gizi->getListLaporanGizi03Makan($search,'bentukmakan','NT');
			$data['bentukmakan']['BB'] 		= $this->m_gizi->getListLaporanGizi03Makan($search,'bentukmakan','BB');
			$data['bentukmakan']['SARING'] 	= $this->m_gizi->getListLaporanGizi03Makan($search,'bentukmakan','SARING');
			$data['bentukmakan']['MC']		= $this->m_gizi->getListLaporanGizi03Makan($search,'bentukmakan','MC');
			$data['bentukmakan']['PUASA'] 	= $this->m_gizi->getListLaporanGizi03Makan($search,'bentukmakan','PUASA');
		}else{			
			$data['cair']['DM'] 			= $this->m_gizi->getListLaporanGizi03Cair($search,'DM');
			$data['cair']['NEP'] 			= $this->m_gizi->getListLaporanGizi03Cair($search,'NEP');
			$data['cair']['EMX'] 			= $this->m_gizi->getListLaporanGizi03Cair($search,'EMX');
			$data['cair']['ENS'] 			= $this->m_gizi->getListLaporanGizi03Cair($search,'ENS');
			$data['cair']['PROTEN'] 		= $this->m_gizi->getListLaporanGizi03Cair($search,'PROTEN');
			$data['cair']['HEP'] 			= $this->m_gizi->getListLaporanGizi03Cair($search,'HEP');
			$data['cair']['DANCOW'] 		= $this->m_gizi->getListLaporanGizi03Cair($search,'DANCOW');
			$data['cair']['ISOCAL'] 		= $this->m_gizi->getListLaporanGizi03Cair($search,'ISOCAL');
			$data['cair']['NEPD'] 			= $this->m_gizi->getListLaporanGizi03Cair($search,'NEPD');
			$data['cair']['PEP'] 			= $this->m_gizi->getListLaporanGizi03Cair($search,'PEP');
			$data['cair']['LACTOGEN'] 		= $this->m_gizi->getListLaporanGizi03Cair($search,'LACTOGEN');
			$data['cair']['PHPRO'] 			= $this->m_gizi->getListLaporanGizi03Cair($search,'PHPRO');
			$data['cair']['PEPJR'] 			= $this->m_gizi->getListLaporanGizi03Cair($search,'PEPJR');
			$data['cair']['LLM'] 			= $this->m_gizi->getListLaporanGizi03Cair($search,'LLM');
			$data['cair']['SOYA'] 			= $this->m_gizi->getListLaporanGizi03Cair($search,'SOYA');
			$data['cair']['FRS'] 			= $this->m_gizi->getListLaporanGizi03Cair($search,'FRS');
			$data['cair']['PUL'] 			= $this->m_gizi->getListLaporanGizi03Cair($search,'SOYA');
		}

		$this->load->view( 'export/export_laporan_03.php', $data );
	}

    function export_laporan_04() {

		$search = [
			'jenis_laporan'   => safe_get('jenis_laporan'),
			'periode_laporan' => safe_get('periode_laporan'),
			'tanggal_harian'  => safe_get('tanggal_harian'),
			'bulan'           => safe_get('bulan'),
			'tahun'           => safe_get('tahun'),
			'tanggal_awal'    => safe_get('tanggal_awal'),
			'tanggal_akhir'   => safe_get('tanggal_akhir'),
			'jenis_diet'      => safe_get('jenis_diet'),
			'tempat_layanan'  => safe_get('tempat_layanan'),
			'ruangan_ranap'   => safe_get('ruangan_ranap'),
			'ruangan_ic'      => safe_get('ruangan_ic'),
		];	

        $data     = $this->m_gizi->getListLaporanGizi04(0,0, $search);
		$this->load->view( 'export/export_laporan_04.php', $data );
	}

    function export_laporan_05() {

		$search = [
			'jenis_laporan'   => safe_get('jenis_laporan'),
			'periode_laporan' => safe_get('periode_laporan'),
			'tanggal_harian'  => safe_get('tanggal_harian'),
			'bulan'           => safe_get('bulan'),
			'tahun'           => safe_get('tahun'),
			'tanggal_awal'    => safe_get('tanggal_awal'),
			'tanggal_akhir'   => safe_get('tanggal_akhir'),
			'jenis_diet'      => safe_get('jenis_diet'),
			'tempat_layanan'  => safe_get('tempat_layanan'),
			'ruangan_ranap'   => safe_get('ruangan_ranap'),
			'ruangan_ic'      => safe_get('ruangan_ic'),
		];	

        // $data     = $this->m_gizi->getListLaporanGizi05(0,0, $search);

		$jenis_diet_map     = [ '1' => 'Diet Makan', '2' => 'Diet Cair', ];
		$data['periode'] 	= $this->periode($search);
		$data['jenis_diet'] = $jenis_diet_map[$search["jenis_diet"]] ?? '';	
		$data['data'] 		= [];

		$bangsal = $this->db->query("SELECT * FROM sm_bangsal where is_active='Ya' ORDER BY nama ")->result();
		
		foreach ($bangsal as $i => $value){
		$nama_bangsal = str_replace(' ', '_', $value->nama);
			$data['data'][$nama_bangsal]   = $this->db->query($this->m_gizi->getListLaporanGizi05(0,0, $search,1,$value->id))->result();
		}

		$this->load->view( 'export/export_laporan_05.php', $data );
	}

	function export_laporan_06() {

		$search = [
			'jenis_laporan'   => safe_get('jenis_laporan'),
			'periode_laporan' => safe_get('periode_laporan'),
			'tanggal_harian'  => safe_get('tanggal_harian'),
			'bulan'           => safe_get('bulan'),
			'tahun'           => safe_get('tahun'),
			'tanggal_awal'    => safe_get('tanggal_awal'),
			'tanggal_akhir'   => safe_get('tanggal_akhir'),
			'jenis_diet'      => safe_get('jenis_diet'),
			'tempat_layanan'  => safe_get('tempat_layanan'),
			'ruangan_ranap'   => safe_get('ruangan_ranap'),
			'ruangan_ic'      => safe_get('ruangan_ic'),
		];	

        $data     = $this->m_gizi->getListLaporanGizi06(0,0, $search);
		$this->load->view( 'export/export_laporan_06.php', $data );
	}
	
	function periode($search){
		$periode = '';
        if($search["periode_laporan"] == 'Harian'){
			$periode = 'Harian ('.$search["tanggal_harian"].')' ;
		} else if($search["periode_laporan"] == 'Bulanan'){
			if ($search["bulan"] == '01') {
                $periode = "Bulanan (Januari " . $search["tahun"] . ')';
            } elseif ($search["bulan"] == '02') {
                $periode = "Bulanan (Februari " . $search["tahun"] . ')';
            } elseif ($search["bulan"] == '03') {
                $periode = "Bulanan (Maret " . $search["tahun"] . ')';
            } elseif ($search["bulan"] == '04') {
                $periode = "Bulanan (April " . $search["tahun"] . ')';
            } elseif ($search["bulan"] == '05') {
                $periode = "Bulanan (Mei " . $search["tahun"] . ')';
            } elseif ($search["bulan"] == '06') {
                $periode = "Bulanan (Juni " . $search["tahun"] . ')';
            } elseif ($search["bulan"] == '07') {
                $periode = "Bulanan (Juli " . $search["tahun"] . ')';
            } elseif ($search["bulan"] == '08') {
                $periode = "Bulanan (Agustus " . $search["tahun"] . ')';
            } elseif ($search["bulan"] == '09') {
                $periode = "Bulanan (September " . $search["tahun"] . ')';
            } elseif ($search["bulan"] == '10') {
                $periode = "Bulanan (Oktober " . $search["tahun"] . ')';
            } elseif ($search["bulan"] == '11') {
                $periode = "Bulanan (November " . $search["tahun"] . ')';
            } elseif ($search["bulan"] == '12') {
                $periode = "Bulanan (Desember " . $search["tahun"] . ')';
            }
		} else if($search["periode_laporan"] == 'Rentang Waktu'){
			$periode = 'Rentang Waktu ('.$search["tanggal_awal"].' sd '.$search["tanggal_akhir"].')' ;
		}
		return $periode;
	}

}
