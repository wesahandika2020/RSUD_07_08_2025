<?php  
defined('BASEPATH') OR exit('No direct script access allowed');

class Bimbingan_talqin_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
        $this->datetime = date('Y-m-d H:i:s');
    }

    private function sqlPermintaanBimbinganTalqin($search)
    {
        $this->db->select("DISTINCT ON (oq.id) oq.*, 
                        pq.nama as nama_pasien, pq.kelamin, pq.tanggal_lahir, COALESCE(peq.nama, '') as nama_perawat, 
                        (SELECT CONCAT((SELECT nama from sm_bangsal where id = riq.id_bangsal) , ' kelas ', (SELECT nama from sm_kelas where id = riq.id_kelas) , ' ruang ', riq.no_ruang, ' No. Bed ', riq.no_bed) 
                        FROM sm_layanan_pendaftaran as lpq
                        LEFT JOIN sm_rawat_inap as riq ON lpq.id = riq.id_layanan_pendaftaran 
                        left JOIN sm_intensive_care as icq ON lpq.id = icq.id_layanan_pendaftaran
                        WHERE lpq.id = oq.id_layanan_pendaftaran and (riq.id_bangsal is not null)
                        UNION
                        SELECT CONCAT((SELECT nama from sm_bangsal where id = icq.id_bangsal) , ' kelas ', (SELECT nama from sm_kelas where id = icq.id_kelas) , ' ruang ', icq.no_ruang, ' No. Bed ', icq.no_bed) 
                        FROM sm_layanan_pendaftaran as lpq
                        LEFT JOIN sm_rawat_inap as riq ON lpq.id = riq.id_layanan_pendaftaran 
                        left JOIN sm_intensive_care as icq ON lpq.id = icq.id_layanan_pendaftaran
                        WHERE lpq.id = oq.id_layanan_pendaftaran and (icq.id_bangsal is not null) ) AS bed", false);
        $this->db->from('sm_order_talqin as oq')
            ->join('sm_layanan_pendaftaran as lpq', 'lpq.id = oq.id_layanan_pendaftaran')
			->join('sm_pendaftaran as pdq', 'pdq.id = lpq.id_pendaftaran')
            ->join('sm_pasien as pq', 'pq.id = oq.id_pasien')
            ->join('sm_tenaga_medis as tmq', 'tmq.id = oq.id_perawat_talqin', 'left')
            ->join('sm_pegawai as peq', 'peq.id = tmq.id_pegawai');

            if (($search['tanggal_awal'] !== '') & ($search['tanggal_akhir'] !== '')) :
                $this->db->where("pdq.tanggal_daftar BETWEEN '" . date2mysql($search['tanggal_awal']) . " 00:00:00' AND '" . date2mysql($search['tanggal_akhir']) . " 23:59:59'");
            endif;
                

            if ($search['no_register'] !== '') :
                $this->db->where('pdq.no_register', $search['no_register'], true);
            endif;
    
            if ($search['no_rm'] !== '') :
                $this->db->like('pq.id', $search['no_rm'], 'before', true);
            endif;
    
            if ($search['nik'] !== '') :
                $this->db->where('pq.no_identitas', $search['nik']);
            endif;
    
            if ($search['nama'] !== '') :
                $this->db->where("pq.nama ilike '%" . strtolower($search['nama']) . "%'");
            endif;
            
        return $this->db->order_by('oq.id', 'desc');   

    }

    private function _listPermintaanTalqin($limit = 0, $start = 0, $search)
    {
        $this->sqlPermintaanBimbinganTalqin($search);
        if ($limit !== 0) :
            $this->db->limit($limit, $start);
        endif;

        return $this->db->get()->result();
    }

    function getListDataPermintaanTalqin($limit = 0, $start = 0, $search)
    {
        $result['data'] = $this->_listPermintaanTalqin($limit, $start, $search);
        $result['jumlah'] = $this->sqlPermintaanBimbinganTalqin($search)->get()->num_rows();
        return $result;

        $this->db->close();
    }

    function simpanKonfirmasiTalqin()
	{
        $this->db->trans_begin();
		$id = safe_post('id_order_talqin');
		$status = safe_post('status_permintaan');
		$alasan_pembatalan_talqin = safe_post('alasan_pembatalan_talqin');
		if ($status === 'Confirmed') :
			
			$data = array(
                'alasan_pembatalan_talqin'  => $alasan_pembatalan_talqin,
				'status'                    => $status,
                'waktu_konfirmasi_talqin'   => $this->datetime,
                'is_talqin'                 => 1				
			);
		else :
			$data = array(
                'alasan_pembatalan_talqin'  => $alasan_pembatalan_talqin,
                'status'                    => $status,
                'waktu_konfirmasi_talqin'   => $this->datetime,                
            );
		endif;
		$this->db->where('id', safe_post('id_layanan_pendaftaran'), true)->update('sm_order_talqin', $data);
		if ($this->db->trans_status() === false) :
			$this->db->trans_rollback();
			$response['status'] = false;
			$response['message'] = 'Gagal mengkonfirmasi permintaan talqin!';
		else :
			$this->db->trans_commit();
			$response['status'] = true;
			$response['message'] = 'Permintaan talqin telah berhasil dikonfirmasi!';
		endif;
		return $response;
	}

    function getListDataTalqin($limit = 0, $start = 0, $search)
    {
        $result['data'] = $this->_listDataTalqin($limit, $start, $search);
        $result['jumlah'] = $this->sqlDataTalqin($search)->get()->num_rows();
        return $result;

        $this->db->close();
    }

	private function _listDataTalqin($limit = 0, $start = 0, $search)
    {
        $this->sqlDataTalqin($search);
        if ($limit !== 0) :
            $this->db->limit($limit, $start);
        endif;

        return $this->db->get()->result();
    }

	private function sqlDataTalqin($search)
    {
        $this->db->select("DISTINCT ON (otd.id) otd.*, COALESCE(pgod.nama, '') as nama_perawat, pbod.nama,  
        (SELECT CONCAT(
        (SELECT nama from sm_bangsal where id = rod.id_bangsal) , ' kelas ', 
        (SELECT nama from sm_kelas where id = rod.id_kelas) , ' ruang ', rod.no_ruang, ' No. Bed ', rod.no_bed) 
        FROM sm_layanan_pendaftaran as lpod
        LEFT JOIN sm_rawat_inap as rod ON lpod.id = rod.id_layanan_pendaftaran 
        left JOIN sm_intensive_care as icod ON lpod.id = icod.id_layanan_pendaftaran
        WHERE lpod.id = otd.id_layanan_pendaftaran and (rod.id_bangsal is not null)
        UNION
        SELECT CONCAT((SELECT nama from sm_bangsal where id = icod.id_bangsal) , ' kelas ', 
        (SELECT nama from sm_kelas where id = icod.id_kelas) , ' ruang ', icod.no_ruang, ' No. Bed ', icod.no_bed) 
        FROM sm_layanan_pendaftaran as lpod
        LEFT JOIN sm_rawat_inap as rod ON lpod.id = rod.id_layanan_pendaftaran 
        left JOIN sm_intensive_care as icod ON lpod.id = icod.id_layanan_pendaftaran
        WHERE lpod.id = otd.id_layanan_pendaftaran and (icod.id_bangsal is not null) ) AS bed", false);

        $this->db->from('sm_order_talqin as otd')
            ->join('sm_layanan_pendaftaran as lpod', 'lpod.id = otd.id_layanan_pendaftaran')
			->join('sm_pendaftaran as pnod', 'pnod.id = lpod.id_pendaftaran')
			->join('sm_pasien as pbod', 'pbod.id = pnod.id_pasien')    
            ->join('sm_tenaga_medis as tmod', 'tmod.id = otd.id_perawat_talqin', 'left')     
            ->join('sm_pegawai as pgod', 'pgod.id = tmod.id_pegawai')
            ->where('otd.status', 'Confirmed');

            if (($search['tanggal_awal'] !== '') & ($search['tanggal_akhir'] !== '')) :
                $this->db->where("pnod.tanggal_daftar BETWEEN '" . date2mysql($search['tanggal_awal']) . " 00:00:00' AND '" . date2mysql($search['tanggal_akhir']) . " 23:59:59'");
            endif;
                

            if ($search['no_register'] !== '') :
                $this->db->where('pnod.no_register', $search['no_register'], true);
            endif;
    
            if ($search['no_rm'] !== '') :
                $this->db->like('pbod.id', $search['no_rm'], 'before', true);
            endif;
    
            if ($search['nik'] !== '') :
                $this->db->where('pbod.no_identitas', $search['nik']);
            endif;
    
            if ($search['nama'] !== '') :
                $this->db->where("pbod.nama ilike '%" . strtolower($search['nama']) . "%'");
            endif;

        return $this->db->order_by('otd.id', 'desc');   

    }

    function getFormTalqin($id){
        $sql = "select fot.*, pfo.nama as nama_pasien, pnfo.no_register, pfo.telp as telepon, pfo.tanggal_lahir as tanggal_lahir, pfo.kelamin as jenis_kelamin, pfo.agama, pfo.alamat as alamat_pasien, COALESCE(pgfo.nama, '') as nama_perawat
        from sm_order_talqin fot				
        join sm_layanan_pendaftaran lpfo ON fot.id_layanan_pendaftaran = lpfo.id
        join sm_pendaftaran pnfo ON lpfo.id_pendaftaran = pnfo.id
        join sm_pasien pfo ON pnfo.id_pasien = pfo.id
        join sm_tenaga_medis tmfo ON tmfo.id = fot.id_perawat_talqin
        join sm_pegawai pgfo ON pgfo.id = tmfo.id_pegawai
        where fot.id_layanan_pendaftaran = '" . $id . "'";
        return $this->db->query($sql)->row();
    }

}