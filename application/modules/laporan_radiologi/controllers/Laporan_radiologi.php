<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Laporan_radiologi extends SYAM_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('App_model', 'm_default');
        $this->load->model('Masterdata_model', 'm_masterdata');
        $this->load->model('Laporan_radiologi_model', 'm_radiologi');
    }

    public function index()
    {
        $data['active']  = 'Laporan Raiologi';
        $data['modules'] = $this->m_default->getDataModules($this->session->userdata('id_account_group'));
        $is_login        = $this->session->userdata('is_login');

        if ($is_login === true) :

            $data['hospital'] = $this->m_default->getDataHospital();
            $this->load->view('layouts/index', $data);

        else :

            redirect('/');

        endif;
    }

    public function page_lap_radiologi()
    {
        $data['jenis_laporan']    = $this->m_radiologi->getJenisLaporan();
        $data['jenis_pasien']     = $this->m_radiologi->getJenisPasien();
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
			'tanggal_akhir'   => safe_get('tanggal_akhir')
		];

		
        $data['data'] = $this->m_radiologi->getListDataLaporanRadiologi(0, 0, $search);
		

		$periode = "";
		if ( $search["periode_laporan"] === "Bulanan" ) {
			if ( $search["bulan"] == '01' ) {
				$periode = "Januari " . $search["tahun"];
			} elseif ( $search["bulan"] == '02' ) {
				$periode = "Februari " . $search["tahun"];
			} elseif ( $search["bulan"] == '03' ) {
				$periode = "Maret " . $search["tahun"];
			} elseif ( $search["bulan"] == '04' ) {
				$periode = "April " . $search["tahun"];
			} elseif ( $search["bulan"] == '05' ) {
				$periode = "Mei " . $search["tahun"];
			} elseif ( $search["bulan"] == '06' ) {
				$periode = "Juni " . $search["tahun"];
			} elseif ( $search["bulan"] == '07' ) {
				$periode = "Juli " . $search["tahun"];
			} elseif ( $search["bulan"] == '08' ) {
				$periode = "Agustus " . $search["tahun"];
			} elseif ( $search["bulan"] == '09' ) {
				$periode = "September " . $search["tahun"];
			} elseif ( $search["bulan"] == '10' ) {
				$periode = "Oktober " . $search["tahun"];
			} elseif ( $search["bulan"] == '11' ) {
				$periode = "November " . $search["tahun"];
			} elseif ( $search["bulan"] == '12' ) {
				$periode = "Desember " . $search["tahun"];
			}
		} elseif ( $search["periode_laporan"] === "Harian" ) {
			$periode = get_date_format( date2mysql( $search['tanggal_harian'] ) );
		} elseif ( $search["periode_laporan"] === "Rentang Waktu" ) {
			$periode = get_date_format( date2mysql( $search['tanggal_awal'] ) ) . " s.d " . get_date_format( date2mysql( $search['tanggal_akhir'] ) );
		}
		$data['parameter'] = $search;
		$data['periode']   = $periode;

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
			'tanggal_akhir'   => safe_get('tanggal_akhir')
		];

		
        $data['data'] = $this->m_radiologi->getListDataLaporanRadiologiByPenjamin(0, 0, $search);
		

		$periode = "";
		if ( $search["periode_laporan"] === "Bulanan" ) {
			if ( $search["bulan"] == '01' ) {
				$periode = "Januari " . $search["tahun"];
			} elseif ( $search["bulan"] == '02' ) {
				$periode = "Februari " . $search["tahun"];
			} elseif ( $search["bulan"] == '03' ) {
				$periode = "Maret " . $search["tahun"];
			} elseif ( $search["bulan"] == '04' ) {
				$periode = "April " . $search["tahun"];
			} elseif ( $search["bulan"] == '05' ) {
				$periode = "Mei " . $search["tahun"];
			} elseif ( $search["bulan"] == '06' ) {
				$periode = "Juni " . $search["tahun"];
			} elseif ( $search["bulan"] == '07' ) {
				$periode = "Juli " . $search["tahun"];
			} elseif ( $search["bulan"] == '08' ) {
				$periode = "Agustus " . $search["tahun"];
			} elseif ( $search["bulan"] == '09' ) {
				$periode = "September " . $search["tahun"];
			} elseif ( $search["bulan"] == '10' ) {
				$periode = "Oktober " . $search["tahun"];
			} elseif ( $search["bulan"] == '11' ) {
				$periode = "November " . $search["tahun"];
			} elseif ( $search["bulan"] == '12' ) {
				$periode = "Desember " . $search["tahun"];
			}
		} elseif ( $search["periode_laporan"] === "Harian" ) {
			$periode = get_date_format( date2mysql( $search['tanggal_harian'] ) );
		} elseif ( $search["periode_laporan"] === "Rentang Waktu" ) {
			$periode = get_date_format( date2mysql( $search['tanggal_awal'] ) ) . " s.d " . get_date_format( date2mysql( $search['tanggal_akhir'] ) );
		}
		$data['parameter'] = $search;
		$data['periode']   = $periode;

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
			'tanggal_akhir'   => safe_get('tanggal_akhir')
		];

		
		$data['periode'] = safe_get('tahun').'-'.safe_get('bulan');
		$data['tahun']   = safe_get('tahun');
		$data['bulan']   = safe_get('bulan');
		$data['data'] = $this->m_radiologi->getDataDokterExpertise(0,0, $search);

		foreach($data['data'] as $i => $val){
			$data['hasil'][$val->nama_dokter] = $this->m_radiologi->getDataExpertise(0,0, $search, $val->id_dokter);
		}

		$periode = "";
		if ( $search["bulan"] == '01' ) {
			$periode = "Januari " . $search["tahun"];
		} elseif ( $search["bulan"] == '02' ) {
			$periode = "Februari " . $search["tahun"];
		} elseif ( $search["bulan"] == '03' ) {
			$periode = "Maret " . $search["tahun"];
		} elseif ( $search["bulan"] == '04' ) {
			$periode = "April " . $search["tahun"];
		} elseif ( $search["bulan"] == '05' ) {
			$periode = "Mei " . $search["tahun"];
		} elseif ( $search["bulan"] == '06' ) {
			$periode = "Juni " . $search["tahun"];
		} elseif ( $search["bulan"] == '07' ) {
			$periode = "Juli " . $search["tahun"];
		} elseif ( $search["bulan"] == '08' ) {
			$periode = "Agustus " . $search["tahun"];
		} elseif ( $search["bulan"] == '09' ) {
			$periode = "September " . $search["tahun"];
		} elseif ( $search["bulan"] == '10' ) {
			$periode = "Oktober " . $search["tahun"];
		} elseif ( $search["bulan"] == '11' ) {
			$periode = "November " . $search["tahun"];
		} elseif ( $search["bulan"] == '12' ) {
			$periode = "Desember " . $search["tahun"];
		}
		$data['parameter'] = $search;
		$data['periode']   = $periode;

		$this->load->view( 'export/export_laporan_03.php', $data );
	}


}
