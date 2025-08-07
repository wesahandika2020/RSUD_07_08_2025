<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Hasil_fisioterapi_model extends CI_Model {

	function __construct()
	{
		parent::__construct();
		$this->datetime = date('Y-m-d H:i:s');
	}
	
	private function sqlHasilFisioterapi($search)
    {
		$this->db->select("fis.*, pd.id_pasien, 
                            CONCAT_WS(' ', p.nama, COALESCE(p.status_pasien, '')) as nama,
							COALESCE(sp.nama, '') as layanan, 
							COALESCE(pg.nama, '') as dokter_penanggung_jawab, 
							lp.no_antrian, lp.jenis_layanan, lp.id as id_layanan_pendaftaran, 
							lp.id_pendaftaran");
        $this->db->from("sm_fisioterapi as fis");
        $this->db->join("sm_layanan_pendaftaran as lp", "lp.id = fis.id_layanan_pendaftaran");
        $this->db->join("sm_pendaftaran as pd", "pd.id = lp.id_pendaftaran");
        $this->db->join("sm_pasien as p", "p.id = pd.id_pasien");
        $this->db->join("sm_spesialisasi as sp", "sp.id = lp.id_unit_layanan", "left");
        $this->db->join("sm_tenaga_medis as tm", "tm.id = fis.id_dokter_pjwb", "left");
        $this->db->join("sm_pegawai as pg", "pg.id = tm.id_pegawai", "left");

        if (($search['tanggal_awal'] !== '') & ($search['tanggal_akhir'] !== '')) :
            $this->db->where("fis.waktu_konfirm BETWEEN '" . date2mysql($search['tanggal_awal']) . " 00:00:00' AND '" . date2mysql($search['tanggal_akhir']) . " 23:59:59'");
        endif;

        if ($search['no_register'] !== '') :
            $this->db->where('pd.no_register', $search['no_register'], true);
        endif;

        if ($search['no_rm'] !== '') :
            $this->db->like('p.id', $search['no_rm'], 'before', true);
        endif;

        if ($search['status_hasil'] === "Sudah") :
			$this->db->where("fis.waktu_hasil is not null");
		elseif ($search["status_hasil"] === "Belum") :
			$this->db->where("fis.waktu_hasil is null");
		endif;

        if ($search['jenis_layanan'] !== '') :
            $this->db->where('lp.jenis_layanan', $search['jenis_layanan']);
		endif;

        if ($search['nama'] !== '') :
            $this->db->where("p.nama ilike '%" . strtolower($search['nama']) . "%'");
        endif;

        return $this->db->order_by('fis.waktu_konfirm', 'desc');    
    }

    private function _listHasilFisioterapi($limit, $start, $search)
    {
        $this->sqlHasilFisioterapi($search);
		if ($limit !== 0) :
			$this->db->limit($limit, $start);
        endif;

        // $this->db->get(); echo $this->db->last_query(); exit();
        return $this->db->get()->result();
    }

    function getListDataHasilFisioterapi($limit, $start, $search)
    {
        $result['data'] = $this->_listHasilFisioterapi($limit, $start, $search);
        $result['jumlah'] = $this->sqlHasilFisioterapi($search)->get()->num_rows();
        $this->db->close();
        return $result;
    }

    function updateHasilFisioterapi($dataFisioterapi, $dataHasilFisioterapi) 
    {
        $this->db->where('id', $dataFisioterapi['id'], true)->update('sm_fisioterapi', $dataFisioterapi);
        $this->db->where('id', $dataHasilFisioterapi['id'], true)->update('sm_detail_fisioterapi', $dataHasilFisioterapi);
    }

    function deletePemeriksaanFisioterapiDetail($id) {
        $this->load->model('pelayanan/Pelayanan_model', 'm_pelayanan');
        $sqlCheck = "select pd.tanggal_keluar, fi.id_history_pembayaran 
                    from sm_detail_fisioterapi as df 
                    join sm_fisioterapi as fi on (fi.id = df.id_fisioterapi) 
                    join sm_layanan_pendaftaran as lp on (lp.id = fi.id_layanan_pendaftaran) 
                    join sm_pendaftaran as pd on (pd.id = lp.id_pendaftaran) 
                    where df.id = '".$id."'";
        $dataCheck = $this->db->query($sqlCheck)->row();
        $status = false;
        $message = "Gagal menghapus item pemeriksaan Fisioterapi";
        if ($dataCheck && $dataCheck->id_history_pembayaran === NULL) :
            $this->db->trans_begin();
            $sql = "select df.*, lp.jenis_layanan, lp.id as id_layanan_pendaftaran
                    from sm_detail_fisioterapi as df 
                    join sm_fisioterapi as fi on (fi.id = df.id_fisioterapi) 
                    join sm_layanan_pendaftaran as lp on (lp.id = fi.id_layanan_pendaftaran) 
                    where df.id = '".$id."'";
            $dataDetailFisioterapi = $this->db->query($sql)->row();
            // var_dump($dataDetailFisioterapi); die;
            $id_fisioterapi = $dataDetailFisioterapi->id_fisioterapi;
            $id_posting = NULL;
            $total = $dataDetailFisioterapi->total;
            $reimburse = $dataDetailFisioterapi->reimburse;
            $jenis = $dataDetailFisioterapi->jenis_layanan;

            if ($jenis === 'Poliklinik' | $jenis === 'Fisioterapi') :
                $jenis = 'Fisioterapi';
                $id_posting = $dataDetailFisioterapi->id_fisioterapi;
            else :
                $id_posting = $dataDetailFisioterapi->id_layanan_pendaftaran;
            endif;

            if ($dataDetailFisioterapi->status === 'Belum') :
                $status = true;
                $this->m_pelayanan->deletePembayaran($id_posting, $total, $reimburse, $jenis);
                $this->db->where('id', $id)->delete('sm_detail_fisioterapi');
                $dataRow = $this->db->where('id_fisioterapi', $id_fisioterapi, true)->get('sm_detail_fisioterapi')->num_rows();
                if ($dataRow < 1) {
                    $this->deletePemeriksaanFisioterapi($id_fisioterapi);
                }

                $message = 'Berhasil hapus item pemeriksaan Fisioterapi';
            else :
                $status = false;
                $message = 'Gagal hapus item pemeriksaan Fisioterapi karena pemeriksaan sudah dilakukan';
            endif;

            if ($this->db->trans_status() === false) :
                $this->db->trans_rollback();
                $status = false;
                $message = 'Gagal hapus item pemeriksaan Fisioterapi, kesalahan terjadi pada transaksi di database';
            else :
                $this->db->trans_commit();
                $status = true;
                $this->load->model('logs/Logs_model', 'm_logs');
                $this->m_logs->recordAdminLogs($dataDetailFisioterapi->id_layanan_pendaftaran, 'Hapus Tindakan');
            endif;
        else :
            $status = false;
            $message = "Gagal menghapus item pemeriksaan Fisioterapi, transaksi telah dikunci";
        endif;

        return array('status' => $status, 'message' => $message);
    }

    function deletePemeriksaanFisioterapi($id_fisioterapi) 
    {
        $sqlCheck = "select pd.tanggal_keluar, fi.id_history_pembayaran 
                    from sm_fisioterapi as fi 
                    join sm_layanan_pendaftaran as lp on (lp.id = fi.id_layanan_pendaftaran) 
                    join sm_pendaftaran as pd on (pd.id = lp.id_pendaftaran) 
                    where fi.id = '".$id_fisioterapi."'";
        $dataCheck = $this->db->query($sqlCheck)->row();
        $status = false;
        $message = "Gagal menghapus pemeriksaan Fisioterapi";
        if ($dataCheck && $dataCheck->id_history_pembayaran === NULL) :
            $this->db->trans_begin();
            $this->db->where('id_fisioterapi', $id_fisioterapi, true)->delete('sm_detail_fisioterapi');
            $this->db->where('id_fisioterapi', $id_fisioterapi, true)->delete('sm_pembayaran');
            $this->db->where('id', $id_fisioterapi, true)->delete('sm_fisioterapi');

            if ($this->db->trans_status() === false) :
                $this->db->trans_rollback();
                $status = false;
                $message = 'Gagal menghapus pemeriksaan Fisioterapi, internal server error';
            else :
                $this->db->trans_commit();
                $status = true;
                $message = 'Berhasil menghapus pemeriksaan Fisioterapi';
            endif;
        else :
            $status = false;
            $message = 'Gagal menghapus pemeriksaan Fisioterapi, transaksi telah dikunci';
        endif;

        return array('status' => $status, 'message' => $message);
    }
}
