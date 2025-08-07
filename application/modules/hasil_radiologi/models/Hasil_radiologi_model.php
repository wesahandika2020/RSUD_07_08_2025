<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Hasil_radiologi_model extends CI_Model
{

	function __construct()
	{
		parent::__construct();
		$this->datetime = date('Y-m-d H:i:s');
	}

	function getConfigPacs()
    {
        return $this->db->where('id', '1')->get('sm_konfigurasi_pacs')->row();
    }

    function getConfigGetPacs()
    {
        return $this->db->where('id', '4')->get('sm_konfigurasi_pacs')->row();
    }

    function getHasilPACS($idDetail)
    {
        return $this->db->where('id', $idDetail)->get('sm_detail_radiologi')->row();
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

    function getCurl($url, $header = null)
	{
	    $ch = curl_init();

	    curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US; rv:1.9.1.2) Gecko/20090729 Firefox/3.5.2 GTB5');
	    curl_setopt($ch, CURLOPT_URL, $url);
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	    if ($header !== null) {
	        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
	    }

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
            'Content-Type: application/json',
            'Authorization: Bearer '. $token .'');
    }

	private function sqlHasilRadiologi($search)
	{
		$this->db->select('distinct rad.*', false)
			->from("(select rd.*, rd.jenis as jenis_radiologi, pd.id_pasien, pd.tanggal_keluar, p.tanggal_lahir,
                            CONCAT_WS(' ', p.nama, COALESCE(p.status_pasien, '')) as nama,
							COALESCE(sp.nama, '') as layanan, pj.nama as penjamin,
							COALESCE(pg.nama, '') as dokter_penanggung_jawab, pd.no_register,
							lp.no_antrian, lp.jenis_layanan, lp.id as id_layanan_pendaftaran, pj.id as id_penjamin, p.telp, lp.cara_bayar,
							lp.id_pendaftaran, lp.id_pendaftaran, lp.tindak_lanjut, rd.id_dokter_pjwb, jsonb_agg(rdd.*) as dokter_radiologi
							from sm_radiologi as rd
							join sm_layanan_pendaftaran as lp on lp.id = rd.id_layanan_pendaftaran
							join sm_pendaftaran as pd on pd.id = lp.id_pendaftaran
							join sm_pasien as p on p.id = pd.id_pasien
							left join sm_penjamin as pj on pj.id = lp.id_penjamin
							left join sm_spesialisasi as sp on sp.id = lp.id_unit_layanan
							left join sm_tenaga_medis as tm on tm.id = rd.id_dokter_pjwb
							left join sm_pegawai as pg on pg.id = tm.id_pegawai
							left join (select coalesce(pgd.nama, '-') as dokter, dr.id_radiologi, dr.id_dokter
							           from sm_detail_radiologi dr
							           left join sm_tenaga_medis stm on dr.id_dokter = stm.id
							           left join sm_pegawai pgd on stm.id_pegawai = pgd.id and stm.id_spesialisasi  in (53,33)) as rdd
							           on rdd.id_radiologi = rd.id
							group by rd.id, rd.waktu_konfirm, pd.id_pasien, pd.tanggal_keluar, p.tanggal_lahir, p.nama, p.status_pasien, sp.nama,
							pj.nama, pg.nama, lp.no_antrian, lp.jenis_layanan, lp.id, pj.id, lp.cara_bayar, lp.id_pendaftaran,
							lp.cara_bayar, p.telp, pd.no_register) as rad
							join lateral jsonb_array_elements(rad.dokter_radiologi) as e(dr) ON TRUE");

		if (($search['tanggal_awal'] !== '') & ($search['tanggal_akhir'] !== '')) :
			$this->db->where("rad.waktu_konfirm BETWEEN '" . date2mysql($search['tanggal_awal']) . " 00:00:00' AND '" . date2mysql($search['tanggal_akhir']) . " 23:59:59'");
		endif;

		if ($search['no_register'] !== '') :
			$this->db->where('rad.no_register', $search['no_register'], true);
		endif;

		if ($search['no_rm'] !== '') :
			$this->db->where('rad.id_pasien ilike', '%' . $search['no_rm'] . '%', true);
		endif;

		if ($search['status_hasil'] === "sudah") :
			$this->db->where("rad.waktu_hasil is not null");
		elseif ($search["status_hasil"] === "belum") :
			$this->db->where("rad.waktu_hasil is null");
		endif;

		if ($search['jenis_layanan'] !== '') :
			$this->db->where('rad.jenis_layanan', $search['jenis_layanan']);
		endif;

		if ($search['jenis_radiologi'] !== '') :
			$this->db->where('rad.jenis', $search['jenis_radiologi']);
		endif;

		if ($search['dokter_radiologi'] !== '') :
			$this->db->where("e.dr->'id_dokter' = '{$search['dokter_radiologi']}'", '', false);
		endif;

		if ($search['nama'] !== '') :
			$this->db->where("rad.nama ilike '%" . strtolower($search['nama']) . "%'");
		endif;

		return $this->db->order_by('rad.waktu_konfirm', 'desc');
	}

	private function _listHasilRadiologi($limit, $start, $search)
	{
		$this->sqlHasilRadiologi($search);
		if ($limit !== 0) :
			$this->db->limit($limit, $start);
		endif;

		// $this->db->get(); echo $this->db->last_query(); exit();
		return $this->db->get()->result();
	}

	function getListDataHasilRadiologi($limit, $start, $search)
	{
		$result['data']   = $this->_listHasilRadiologi($limit, $start, $search);
		$result['jumlah'] = $this->sqlHasilRadiologi($search)->get()->num_rows();
		$this->db->close();

		return $result;
	}

	function getDiagnosaRadiologi($id_layanan_pendaftaran)
    {
        $this->db->select("dg.*, 
                            coalesce(pg.nama, '') as dokter, 
                            concat_ws(' | ', gs.kode_icdx_rinci, ( SELECT gsa.kode_icdx_rinci FROM sm_golongan_sebab_sakit AS gsa WHERE gsa.ID = dg.id_pengkodean_asterik ), ( SELECT gss1.nama FROM sm_golongan_sebab_sakit AS gss1 WHERE gss1.ID = dg.id_golongan_sebab_sakit ), dg.golongan_sebab_sakit_lain) as golongan_sebab_sakit,
                            concat_ws(' | ', gs.kode_icdx_rinci, ( SELECT gsa.kode_icdx_rinci FROM sm_golongan_sebab_sakit AS gsa WHERE gsa.ID = dg.id_pengkodean_asterik ), ( SELECT gss1.nama FROM sm_golongan_sebab_sakit AS gss1 WHERE gss1.ID = dg.id_golongan_sebab_sakit ), dg.golongan_sebab_sakit_lain) as item, '0' log ")
            ->from('sm_diagnosa as dg')
            ->join('sm_tenaga_medis as tm', 'tm.id = dg.id_dokter', 'left')
            ->join('sm_pegawai as pg', 'pg.id = tm.id_pegawai', 'left')
            ->join('sm_golongan_sebab_sakit as gs', 'gs.id = dg.id_pengkodean', 'left')
            ->where('dg.id_layanan_pendaftaran', $id_layanan_pendaftaran, true)
            ->where('dg.prioritas', 'Utama', true)
            ->order_by('dg.id', 'asc');
        $query1 = $this->db->get()->result();

        $this->db->select("dg.*, 
                            coalesce(pg.nama, '') as dokter, 
                            concat_ws(' | ', gs.kode_icdx_rinci, ( SELECT gsa.kode_icdx_rinci FROM sm_golongan_sebab_sakit AS gsa WHERE gsa.ID = dg.id_pengkodean_asterik ), ( SELECT gss1.nama FROM sm_golongan_sebab_sakit AS gss1 WHERE gss1.ID = dg.id_golongan_sebab_sakit ), dg.golongan_sebab_sakit_lain) as golongan_sebab_sakit,
                            concat_ws(' | ', gs.kode_icdx_rinci, ( SELECT gsa.kode_icdx_rinci FROM sm_golongan_sebab_sakit AS gsa WHERE gsa.ID = dg.id_pengkodean_asterik ), ( SELECT gss1.nama FROM sm_golongan_sebab_sakit AS gss1 WHERE gss1.ID = dg.id_golongan_sebab_sakit ), dg.golongan_sebab_sakit_lain) as item, '1' log")
            ->from('sm_diagnosa_log as dg')
            ->join('sm_tenaga_medis as tm', 'tm.id = dg.id_dokter', 'left')
            ->join('sm_pegawai as pg', 'pg.id = tm.id_pegawai', 'left')
            ->join('sm_golongan_sebab_sakit as gs', 'gs.id = dg.id_pengkodean', 'left')
            ->where('dg.id_layanan_pendaftaran', $id_layanan_pendaftaran, true)
            ->where('dg.prioritas', 'Utama', true)
            ->order_by('dg.id', 'asc');
        $query2 = $this->db->get()->result();

        return array_merge($query1, $query2);
        $this->db->close();
    }

	function updateHasilRadiologi($dataRadiologi, $dataHasilRadiologi)
	{
		$this->db->where('id', $dataRadiologi['id'], true)->update('sm_radiologi', $dataRadiologi);
		$this->db->where('id', $dataHasilRadiologi['id'], true)->update('sm_detail_radiologi', $dataHasilRadiologi);
	}

	function deletePemeriksaanRadiologiDetail($id)
	{
		$this->load->model('pelayanan/Pelayanan_model', 'm_pelayanan');
		$sqlCheck  = "select pd.tanggal_keluar, rd.id_history_pembayaran 
                    from sm_detail_radiologi as dr 
                    join sm_radiologi as rd on (rd.id = dr.id_radiologi) 
                    join sm_layanan_pendaftaran as lp on (lp.id = rd.id_layanan_pendaftaran) 
                    join sm_pendaftaran as pd on (pd.id = lp.id_pendaftaran) 
                    where dr.id = '" . $id . "'";
		$dataCheck = $this->db->query($sqlCheck)->row();
		$status    = false;
		$message   = "Gagal menghapus item pemeriksaan radiologi";
		if ($dataCheck && $dataCheck->id_history_pembayaran === null) :
			$this->db->trans_begin();
			$sql = "select dr.*, lp.jenis_layanan, lp.id as id_layanan_pendaftaran, rd.kode, rd.id_order_radiologi
                    from sm_detail_radiologi as dr 
                    join sm_radiologi as rd on (rd.id = dr.id_radiologi) 
                    join sm_layanan_pendaftaran as lp on (lp.id = rd.id_layanan_pendaftaran) 
                    where dr.id = '" . $id . "'";
			$dataDetailRadiologi = $this->db->query($sql)->row();
			// var_dump($dataDetailRadiologi); die;
			$id_radiologi = $dataDetailRadiologi->id_radiologi;
			$id_posting   = null;
			$total        = $dataDetailRadiologi->total;
			$reimburse    = $dataDetailRadiologi->reimburse;
			$jenis        = $dataDetailRadiologi->jenis_layanan;

			if ($jenis === 'Poliklinik' | $jenis === 'Radiologi') :
				$jenis      = 'Radiologi';
				$id_posting = $dataDetailRadiologi->id_radiologi;
			else :
				$id_posting = $dataDetailRadiologi->id_layanan_pendaftaran;
			endif;


			if ($dataDetailRadiologi->status === 'Belum') :
				$status = true;
				date_default_timezone_set('Asia/Jakarta');

				$sqlTind = "select rd.nama
                    from sm_tarif_pelayanan as dr 
                    join sm_layanan as rd on (rd.id = dr.id_layanan) 
                    where dr.id = '" . $dataDetailRadiologi->id_tarif . "'";
				$dataTindakan = $this->db->query($sqlTind)->row();
				$sqlPasien = "select pas.id, pas.nama
                    from sm_detail_radiologi as dr 
                    join sm_radiologi as rd on (rd.id = dr.id_radiologi) 
                    join sm_layanan_pendaftaran as lp on (lp.id = rd.id_layanan_pendaftaran) 
                    join sm_pendaftaran as sp on (sp.id = lp.id_pendaftaran)
                    join sm_pasien as pas on (pas.id = sp.id_pasien)
                    where dr.id = '" . $id . "'";
				$dataPasien = $this->db->query($sqlPasien)->row();
				$note = array(
                    'accessnumber' 			=> $dataDetailRadiologi->accessnumber,
                    'id_radiologi'          => (int)$dataDetailRadiologi->id_radiologi,
                    'id_detail_radiologi'   => (int)$dataDetailRadiologi->id,
                    'instance_uid'          => $dataDetailRadiologi->kode,
                    'id_tarif'              => (int)$dataDetailRadiologi->id_tarif,
                    'id_users'              => $this->session->userdata('id_translucent'), 
                    'nama'              	=> $this->session->userdata('nama'),
                    'waktu'                	=> date('Y-m-d H:i:s'), 
                    'id_order_radiologi'    => (int)$dataDetailRadiologi->id_order_radiologi,
                    'tindakan'          	=> $dataTindakan->nama,
                    'no_rm'          		=> $dataPasien->id,
                    'nama_pasien'          	=> $dataPasien->nama,

                );

				$this->db->insert('sm_radiologi_log_delete', $note);
                $this->m_pelayanan->deletePembayaran($id_posting, $total, $reimburse, $jenis);
				$this->db->where('id', $id)->delete('sm_detail_radiologi');
				$dataRow = $this->db->where('id_radiologi', $id_radiologi, true)->get('sm_detail_radiologi')->num_rows();
				if ($dataRow < 1) {
					$this->deletePemeriksaanRadiologi($id_radiologi);
				}

				$message = 'Berhasil hapus item pemeriksaan radiologi';
			else :
				$status  = false;
				$message = 'Gagal hapus item pemeriksaan radiologi karena pemeriksaan sudah dilakukan';
			endif;

			if ($this->db->trans_status() === false) :
				$this->db->trans_rollback();
				$status  = false;
				$message = 'Gagal hapus item pemeriksaan radiologi, kesalahan terjadi pada transaksi di database';
			else :
				$this->db->trans_commit();
				$status = true;
				$this->load->model('logs/Logs_model', 'm_logs');
				$this->m_logs->recordAdminLogs($dataDetailRadiologi->id_layanan_pendaftaran, 'Hapus Tindakan');
			endif;
		else :
			$status  = false;
			$message = "Gagal menghapus item pemeriksaan radiologi, transaksi telah dikunci";
		endif;

		return array('status' => $status, 'message' => $message);
	}

	function cekDataAcc($id)
    {
        return $this->db->select('rd.id_layanan_pendaftaran, sp.id as id_pendaftaran, rd.kode, rd.id_order_radiologi, rd.id as id_radiologi, dr.id as id_detail_radiologi, dr.accessnumber, pas.id, pas.nama')
                    ->from('sm_detail_radiologi as dr')
                    ->join('sm_radiologi as rd', 'rd.id = dr.id_radiologi')
            		->join('sm_layanan_pendaftaran as lp', 'lp.id = rd.id_layanan_pendaftaran')
            		->join('sm_pendaftaran as sp', 'sp.id = lp.id_pendaftaran')
            		->join('sm_pasien as pas', 'pas.id = sp.id_pasien')
                    ->where('dr.id', $id, true)
                    ->get()
                    ->row();
        $this->db->close();
    }

	function deletePemeriksaanRadiologi($id_radiologi)
	{
		$sqlCheck  = "select pd.tanggal_keluar, rd.id_history_pembayaran 
                    from sm_radiologi as rd 
                    join sm_layanan_pendaftaran as lp on (lp.id = rd.id_layanan_pendaftaran) 
                    join sm_pendaftaran as pd on (pd.id = lp.id_pendaftaran) 
                    where rd.id = '" . $id_radiologi . "'";
		$dataCheck = $this->db->query($sqlCheck)->row();
		$status    = false;
		$message   = "Gagal menghapus pemeriksaan radiologi";
		if ($dataCheck && $dataCheck->id_history_pembayaran === null) :
			$this->db->trans_begin();
			$this->db->where('id_radiologi', $id_radiologi, true)->delete('sm_detail_radiologi');
			$this->db->where('id_radiologi', $id_radiologi, true)->delete('sm_pembayaran');
			$this->db->where('id', $id_radiologi, true)->delete('sm_radiologi');

			if ($this->db->trans_status() === false) :
				$this->db->trans_rollback();
				$status  = false;
				$message = 'Gagal menghapus pemeriksaan radiologi, internal server error';
			else :
				$this->db->trans_commit();
				$status  = true;
				$message = 'Berhasil menghapus pemeriksaan radiologi';
			endif;
		else :
			$status  = false;
			$message = 'Gagal menghapus pemeriksaan radiologi, transaksi telah dikunci';
		endif;

		return array('status' => $status, 'message' => $message);
	}

	function simpanHasilEcho($data)
	{
		$this->db->trans_begin();
		$status         = true;
		$dataUpdateEcho = array(
			'id_detail_radiologi' => $data->id_detail_radiologi,
			'date_tracking'       => date2mysql($data->date_tracking),
			'measurement'         => json_encode($data->measurement),
			'finding'             => $data->finding_comment,
			'diag_impression'     => $data->diag_impression
		);

		$checkEcho = $this->db->where('id_detail_radiologi', $data->id_detail_radiologi, true)->get('sm_hasil_echo')->row();
		if ($checkEcho) :
			$this->db->where('id_detail_radiologi', $data->id_detail_radiologi, true)->update('sm_hasil_echo', $dataUpdateEcho);
		else :
			$this->db->insert('sm_hasil_echo', $dataUpdateEcho);
		endif;

		$dataUpdateDetailRadiologi = array(
			'id_dokter'      => $data->dokter !== '' ? $data->dokter : null,
			'id_radiografer' => $data->radiografer !== '' ? $data->radiografer : null,
		);

		// update juga table detail radiologinya
		$this->db->where('id', $data->id_detail_radiologi, true)->update('sm_detail_radiologi', $dataUpdateDetailRadiologi);

		$dataIDRadiologi = $this->db->where('id', $data->id_detail_radiologi, true)->select('id_radiologi')->get('sm_detail_radiologi')->row();
		if ($dataIDRadiologi) :
			$dataUpdateRadiologi = array('waktu_hasil' => $this->datetime);
			// update waktu hasil di table sm_radiologi
			$this->db->where('id', $dataIDRadiologi->id_radiologi, true)->update('sm_radiologi', $dataUpdateRadiologi);
		endif;

		if ($this->db->trans_status() === false) :
			$this->db->trans_rollback();
			$status  = false;
			$message = "Gagal mengupdate hasil echo";
		else :
			$this->db->trans_commit();
			$status  = true;
			$message = "Berhasil mengupdate hasil echo";
		endif;

		return array('status' => $status, 'message' => $message);
	}

	function getDataHasilEcho($id_detail_radiologi)
	{
		$sql      = "select he.*, dr.id_dokter, dr.id_radiografer, 
                COALESCE(pgd.nama, '') as dokter, 
                COALESCE(pgr.nama, '') as radiografer 
                from sm_hasil_echo as he 
                join sm_detail_radiologi as dr on (dr.id = he.id_detail_radiologi) 
                left join sm_tenaga_medis as tmd on (tmd.id = dr.id_dokter) 
                left join sm_pegawai as pgd on (pgd.id = tmd.id_pegawai) 
                left join sm_tenaga_medis as tmr on (tmr.id = dr.id_radiografer) 
                left join sm_pegawai as pgr on (pgr.id = tmr.id_pegawai) 
                where he.id_detail_radiologi = '" . $id_detail_radiologi . "'";
		$data     = $this->db->query($sql)->row();
		$dataEcho = null;
		if ($data) :
			$dataEcho = array(
				'id_detail_radiologi' => $data->id_detail_radiologi,
				'date_tracking'       => $data->date_tracking,
				'measurement'         => json_decode($data->measurement),
				'finding'             => $data->finding,
				'diag_impression'     => $data->diag_impression,
				'id_dokter'           => $data->id_dokter,
				'id_radiografer'      => $data->id_radiografer,
				'dokter'              => $data->dokter,
				'radiografer'         => $data->radiografer,
			);
		endif;

		return $dataEcho;
	}
}
