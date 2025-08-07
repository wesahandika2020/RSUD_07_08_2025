<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Order_intensive_care_model extends CI_Model
{

	function __construct()
	{
		parent::__construct();
		$this->datetime = date('Y-m-d H:i:s');
	}

	private function sqlOrderIntensiveCare($search)
	{
		$this->db->select("odr.*, p.id as no_rm, p.nama as pasien, p.kelamin, 
							pd.no_register, pd.jenis_igd,
							COALESCE(pg.nama, '') as dokter, 
							COALESCE(bgt.nama, '') as bangsal_tujuan, 
							COALESCE(lp.jenis_layanan, '') as jenis_layanan, 
							COALESCE(bga.nama, '') as bangsal_asal, 
							COALESCE(sp.nama, '') as spesialisasi, 
							ri2.id_layanan_pendaftaran as id_layanan_pendaftaran_icare");
		$this->db->from('sm_order_intensive_care as odr')
			->join('sm_pendaftaran as pd', 'pd.id = odr.id_pendaftaran')
			->join('sm_layanan_pendaftaran as lp', 'lp.id = odr.id_layanan_pendaftaran', 'left')
			->join('sm_spesialisasi as sp', 'sp.id = lp.id_unit_layanan', 'left')
			->join('sm_pasien as p', 'p.id = pd.id_pasien', 'left')
			->join('sm_bangsal as bgt', 'bgt.id = odr.id_bangsal_tujuan', 'left')
			->join('sm_tenaga_medis as tm', 'tm.id = odr.id_dokter', 'left')
			->join('sm_pegawai as pg', 'pg.id = tm.id_pegawai', 'left')
			->join('sm_intensive_care as ri', 'ri.id_layanan_pendaftaran = lp.id', 'left')
			->join('sm_bangsal as bga', 'bga.id = ri.id_bangsal', 'left')
			->join('sm_intensive_care as ri2', 'ri2.id = odr.id_intensive_care', 'left');

		if (($search['tanggal_awal'] !== '') & ($search['tanggal_akhir'] !== '')) :
			$this->db->where("pd.tanggal_daftar BETWEEN '" . date2mysql($search['tanggal_awal']) . " 00:00:00' AND '" . date2mysql($search['tanggal_akhir']) . " 23:59:59'");
		endif;

		if ($search['no_register'] !== '') :
			$this->db->where('pd.no_register', $search['no_register'], true);
		endif;

		if ($search['no_rm'] !== '') :
			$this->db->like('p.id', $search['no_rm'], 'before', true);
		endif;

		if ($search['dokter'] !== '') :
			$this->db->where('odr.id_dokter', $search['dokter']);
		endif;

		if ($search['status'] !== '') :
			$this->db->where('odr.status', $search['status']);
		endif;

		if ($search['nama'] !== '') :
			$this->db->where("p.nama ilike '%" . strtolower($search['nama']) . "%'");
		endif;

		$excluded_groups = [
			'Admin',
			'Intensive Care',
			'Supervisor Medical Record',
			'Admin ICU',
			'Maternal dan Neotanal'
		];

		if ($search['unit'] !== '' && !in_array($this->session->userdata('account_group'), $excluded_groups)) {
			$this->db->where('bgt.id_unit', $search['unit']);
		}

		return $this->db->order_by('odr.waktu', 'desc');
	}

	private function _listOrderIntensiveCare($limit = 0, $start = 0, $search)
	{
		$this->sqlOrderIntensiveCare($search);
		if ($limit !== 0) :
			if ($search['status'] !== 'request') :
				$this->db->limit($limit, $start);
			endif;
		endif;

		return $this->db->get()->result();
		$this->db->get();
		echo $this->db->last_query();
		exit();
	}

	function getListDataOrderIntensiveCare($limit = 0, $start = 0, $search)
	{
		$result['data'] = $this->_listOrderIntensiveCare($limit, $start, $search);
		$result['jumlah'] = $this->sqlOrderIntensiveCare($search)->get()->num_rows();
		return $result;

		$this->db->close();
	}

	function updatePembatalanOrderIntensiveCare($id_order, $keterangan)
	{
		$this->db->trans_begin();
		$sql = "select odr.*, lp.jenis_layanan 
				from sm_order_intensive_care as odr 
				join sm_layanan_pendaftaran as lp on (lp.id = odr.id_layanan_pendaftaran) 
				where odr.id = '" . $id_order . "'";
		$dataOrder = $this->db->query($sql)->row();
		$data = array('status' => 'batal', 'keterangan' => $keterangan);
		$this->db->where('id', $id_order)->update('sm_order_intensive_care', $data);

		$this->load->model('pelayanan/Pelayanan_model', 'm_pelayanan');
		$dataTindakLanjut = array('tindak_lanjut' => 'Pulang', 'kondisi' => 'Hidup');
		$this->m_pelayanan->updateTindakLanjut($dataOrder->id_layanan_pendaftaran, $dataTindakLanjut);
		$dataPendaftaran = array('kondisi_keluar' => 'Hidup', 'tanggal_keluar' => $this->datetime);
		$this->db->where('id', $dataOrder->id_pendaftaran)->update('sm_pendaftaran', $dataPendaftaran);
		if ($this->db->trans_status() === false) :
			$this->db->trans_rollback();
			$status = false;
			$message = 'Gagal melakukan pembatalan order intensive care';
		else :
			$this->db->trans_commit();
			$status = true;
			$message = 'Berhasil melakukan pembatalan order intensive care';
		endif;

		$this->load->model('logs/Logs_model', 'm_logs');
		$this->m_logs->recordAdminLogs($dataOrder->id_layanan_pendaftaran, 'Batal Order Intensive Care');
		return array('status' => $status, 'message' => $message);
	}

	function checkBookingStatus($no_rm)
	{
		$result = $this->db->where(array('id_pasien' => $no_rm, 'status' => 'request'))->get('sm_bed_booking')->row();
		return $result;
	}

	function getDataBedBooking($id_booking)
	{
		$sql = "select bb.*, p.nama, p.telp, p.alamat, 
				bg.nama as bangsal, k.nama as kelas, b.no_bed, 
				tr.account as user, ru.no_ruang
				from sm_bed_booking as bb 
				join sm_pasien as p on (p.id = bb.id_pasien) 
				join sm_translucent as tr on (tr.id = bb.id_users) 
				join sm_bed as b on (b.id = bb.id_bed) 
				join sm_ruang as ru on (ru.id = b.id_ruang) 
				join sm_kelas as k on (k.id = ru.id_kelas) 
				join sm_bangsal as bg on (bg.id = ru.id_bangsal) 
				where bb.id = '" . $id_booking . "'";
		return $this->db->query($sql)->row();
		$this->db->close();
	}

	function getDataDetailOrderIntensiveCare($id_order)
	{
		$sql = "select odr.*, p.id as no_rm, p.kelamin, p.nama as pasien,
				COALESCE(pg.nama, '') as dokter,
				CONCAT_WS(' ', lp.jenis_layanan, COALESCE(sp.nama, '')) as layanan, 
				lp.cara_bayar, pj.nama as penjamin, lp.id_penjamin, lp.no_polish,
				COALESCE(bgt.nama, '') as bangsal_tujuan, pd.hak_kelas 
				from sm_order_intensive_care as odr 
				join sm_pendaftaran as pd on (pd.id = odr.id_pendaftaran) 
				join sm_layanan_pendaftaran as lp on (lp.id = odr.id_layanan_pendaftaran) 
				left join sm_spesialisasi as sp on (sp.id = lp.id_unit_layanan) 
				left join sm_penjamin as pj on (pj.id = lp.id_penjamin) 
				left join sm_bangsal as bgt on (bgt.id = odr.id_bangsal_tujuan) 
				join sm_pasien as p on (p.id = pd.id_pasien) 
				left join sm_tenaga_medis as tm on (tm.id = odr.id_dokter) 
				left join sm_pegawai as pg on (pg.id = tm.id_pegawai) 
				where odr.id = '" . $id_order . "'";
		$query = $this->db->query($sql)->row();
		return $query;
		$this->db->close();
	}

	function getDataAvailableBed($id_bangsal, $keterangan)
	{
		$query = "";
		if ($keterangan !== "") :
			$query .= " and (bg.keterangan ilike '%" . $keterangan . "%' 
						or bg.nama ilike '%" . $keterangan . "%')";
		endif;

		// id = 1 => III, 2 => Non Kelas, 3 => I, 4 => II, 5 => VIP
		// $kelas = array("1" => NULL, "2" => NULL, "3" => NULL, "4" => NULL, "5" => NULL);
		
		$list_kelas = $this->db->distinct()->select('nama')->from('sm_kelas')->get()->result();
		$kelas = array();
		
		foreach ($list_kelas as $val) {
			$kelas[$val->nama] = NULL;
		}
		// $kelas = array("III" => NULL, "Non Kelas" => NULL, "I" => NULL, "II" => NULL, "VIP" => NULL);

		$selectBangsalSQL = "select DISTINCT ON (bg.nama) bg.id, 
							CASE WHEN bg.keterangan != '' THEN CONCAT_WS(' | ', bg.nama, bg.keterangan) ELSE bg.nama END as bangsal, 
							(null) as kelas ";
		$orderBangsalSQL = " order by bg.nama";
		$selectBedSQL = "select DISTINCT ru.no_ruang, ru.id_kelas, 
						k.nama as kelas, 
						b.*, bg.nama as bangsal,
						CASE 
							WHEN b.keterangan = 'Tersedia' THEN 'bed-image-available' 
							WHEN b.keterangan = 'Siap Dipakai' THEN 'bed-image-waiting-confirmation' 
							WHEN b.keterangan = 'Waiting' THEN 'bed-image-waiting'
							WHEN b.keterangan = 'Dipesan' THEN 'bed-image-reserved' 
							WHEN b.penghuni = 'L' THEN 'bed-image-male-used' 
							ELSE 'bed-image-female-used' 
						END as bed ";
		$sql = "from sm_bed as b
				join sm_ruang as ru on (ru.id = b.id_ruang) 
				join sm_bangsal as bg on (bg.id = ru.id_bangsal) 
				join sm_kelas as k ON (k.id = ru.id_kelas)
				join sm_tarif_kamar_ranap as tkr on (tkr.id_bangsal = ru.id_bangsal) 
				where ru.id_kelas = tkr.id_kelas and bg.id = '" . $id_bangsal . "'
				and b.is_active = '1' ";
		// run SQL
		$dataBangsal = $this->db->query($selectBangsalSQL . $sql . $query . $orderBangsalSQL)
			->row();
		if ($dataBangsal) :
			$queryBedSQL = " and bg.id = '" . $dataBangsal->id . "' order by b.id_ruang, ru.no_ruang, b.no_bed";
			$dataBangsal->kelas = $kelas;
			$ruangKelas = array();
			$dataKelas = array();
			foreach ($dataBangsal->kelas as $kelas => $valueKelas) :
				// run SQL
				$ruang = $this->db->query($selectBedSQL . $sql . " and k.nama = '" . $kelas . "'" . $queryBedSQL)->result();
				if ($ruang) :
					$noRuang = 0;
					foreach ($ruang as $i => $bed) :
						if ($i === 0) :
							$noRuang = $bed->no_ruang;
							$ruangKelas[$bed->no_ruang] = array($bed);
						else :
							if ($noRuang !== $bed->no_ruang) :
								$ruangKelas[$bed->no_ruang] = array($bed);
								$noRuang = $bed->no_ruang;
							else :
								array_push($ruangKelas[$noRuang], $bed);
							endif;
						endif;
					endforeach;
					$dataBangsal->kelas[$bed->kelas] = $ruangKelas;
				else :
					unset($dataBangsal->kelas[$kelas]);
				endif;
			endforeach;
		endif;

		return $dataBangsal;
		$this->db->close();
	}

	// POST Intensive Care
	function simpanDataIntensiveCare($data)
	{
		$this->db->insert('sm_intensive_care', $data);
		$id = $this->db->insert_id();
		return $id;
	}

	// Ubah status bed
	function setStatusBed($id_bed, $kelamin, $keterangan = 'Terpakai')
	{
		if ($kelamin === '') :
			$kelamin = NULL;
		endif;

		$data = array('keterangan' => $keterangan, 'penghuni' => $kelamin);
		$this->db->where('id', $id_bed, true)->update('sm_bed', $data);
	}

	function setOrderIntensiveCare($id_order, $id_intensive_care)
	{
		$data = array('status' => 'dirawat', 'id_intensive_care' => $id_intensive_care);
		$this->db->where('id', $id_order, true)->update('sm_order_intensive_care', $data);
	}
}
