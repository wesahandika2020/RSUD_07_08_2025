<?php

class Antrian_farmasi extends SYAM_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Antrian_farmasi_model', 'antrian');
	}

	public function index()
	{
		$data     = [
			'active'  => 'Antrian Farmasi',
			'modules' => $this->m_default->getDataModules($this->session->userdata('id_account_group')),
		];
		$is_login = $this->session->userdata('is_login');

		if ($is_login === TRUE) {
			$data['hospital'] = $this->m_default->getDataHospital();
			$this->load->view('layouts/index', $data);
		} else {
			redirect('/');
		}
	}

	public function cron_testing($token)
	{
		if ($this->db->select('token')->from('ini_cron')->where('id', 1)->get()->row()->token == $token) {
			$this->db->where('id', 1)->update('ini_cron', ['ok' => time()]);
		} else {
			echo 'Anda tidak punya akses ke halaman ini';
		}
	}

	public function page_antrian_farmasi()
	{
		$data['status_antrean']     = $this->antrian->getStatusAntrean();
		$this->load->view('index', $data);
	}

	public function page_panggil_pasien()
	{
		$data['status_antrean']     = $this->antrian->getStatusAntrean();
		$this->load->view('call_recall_pasien.php', $data);
	}

	public function page_monitor_antrian()
	{
		$this->load->view('monitor_antrian.php');
	}

	public function cetak_antrian($id)
	{
		if ($id !== null) {
			$data['title'] = 'Cetak Nomor Antrian';
			$data['admisi'] = $this->antrian->getDataBooking($id);
			$data['hospital'] = $this->default->getDataHospital();
			$this->load->view('antrian_farmasi/printing/tiket_antrian', $data);
		}
	}

	public function cetak_copy_resep($id_resep, $id_antrian, $pengambilan_ke)
	{
		$this->load->model('resep/Resep_model', 'm_resep');

		$resep_tebus = $this->db->select('*')
							->from('sm_resep_tebus')
							->where('id_resep', $id_resep)
							->get()->row();

		$resep_tebus->cetakan_ke = $resep_tebus->cetakan_ke == null ? 0 : $resep_tebus->cetakan_ke;
		$tambah_cetakan = $resep_tebus->cetakan_ke + 1;

		$this->db->where('id', $resep_tebus->id)->update('sm_resep_tebus', ['cetakan_ke' => $tambah_cetakan]);

		$this->db->insert('sm_history_cetak_copy_resep', [
			'resep_id' => $id_resep,
			'user_id' => $this->session->userdata('id_translucent'),
			'tercetak_ke' => $tambah_cetakan
		]);

		$data['title'] = 'RUMAH SAKIT UMUM KOTA TANGERANG';
		$data['hospital'] = $this->default->getDataHospital();
		$data['rows'] = $this->m_resep->getListDataCopyResep($id_resep, $pengambilan_ke)->row();
		$data['detail'] = $this->m_resep->getListDataResepR($id_resep, NULL, $pengambilan_ke)->result();
		foreach ($data['detail'] as $item){
			$timing = $this->db->get_where('sm_waktu_pemberian_obat', ['kode' => $item->timing])->row();
			$item->timing = $timing ? $timing->timing : $item->cara_pemberian . ' Makan';

			$admin_time = $this->db->where_in('kode', explode(', ', $item->admin_time))->get('sm_waktu_pemberian_obat')->result();
			$admin_time = implode(', ', array_map(function ($v) {
				return $v->timing;
			}, $admin_time));
			$item->admin_time    = !empty($admin_time) ? $admin_time : $item->admin_time;
		}
		$data['admisi'] = $this->antrian->getDataBooking($id_antrian);
		$this->load->view('antrian_farmasi/printing/cetak_copy_resep', $data);
	}

	public function export_antrian()
	{
		$search = [
			'tanggal_awal'    => safe_get('tanggal_awal'),
			'tanggal_akhir'   => safe_get('tanggal_akhir'),
			'no_kode_booking' => safe_get('no_kode_booking'),
			'no_antrean'      => safe_get('no_antrean'),
			'no_rm'           => safe_get('no_rm'),
			'nm_poli'         => safe_get('nm_poli'),
			'nm_dokter'       => safe_get('nm_dokter'),
			'status_antrean'  => safe_get('status_antrean'),
			'status_resep'    => safe_get('status-resep'),
		];


		$data = $this->antrian->dataAntrianFarmasi(0, 0, $search);
		$data['periode'] = date2mysql($search['tanggal_awal']) . ' - ' . date2mysql($search['tanggal_akhir']);

		$this->load->view( 'printing/export_antrian.php', $data );
	}
}
