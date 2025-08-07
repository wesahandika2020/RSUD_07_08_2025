<?php  
defined('BASEPATH') OR exit('No direct script access allowed');

class Bimbingan_rohani_model extends CI_Model {

	function __construct()
    {
        parent::__construct();
        $this->datetime = date('Y-m-d H:i:s');
    }

    private function sqlPermintaanBimbinganRohani($search)
    {
        $this->db->select("DISTINCT ON (br.id) br.*, 
                        p.nama as nama_pasien, p.kelamin, p.tanggal_lahir, COALESCE(pe.nama, '') as nama_perawat, 
                        (SELECT CONCAT((SELECT nama from sm_bangsal where id = ri.id_bangsal) , ' kelas ', (SELECT nama from sm_kelas where id = ri.id_kelas) , ' ruang ', ri.no_ruang, ' No. Bed ', ri.no_bed) 
                        FROM sm_layanan_pendaftaran as lpd
                        LEFT JOIN sm_rawat_inap as ri ON lpd.id = ri.id_layanan_pendaftaran 
                        left JOIN sm_intensive_care as ic ON lpd.id = ic.id_layanan_pendaftaran
                        WHERE lpd.id = br.id_layanan_pendaftaran and (ri.id_bangsal is not null)
                        UNION
                        SELECT CONCAT((SELECT nama from sm_bangsal where id = ic.id_bangsal) , ' kelas ', (SELECT nama from sm_kelas where id = ic.id_kelas) , ' ruang ', ic.no_ruang, ' No. Bed ', ic.no_bed) 
                        FROM sm_layanan_pendaftaran as lpd
                        LEFT JOIN sm_rawat_inap as ri ON lpd.id = ri.id_layanan_pendaftaran 
                        left JOIN sm_intensive_care as ic ON lpd.id = ic.id_layanan_pendaftaran
                        WHERE lpd.id = br.id_layanan_pendaftaran and (ic.id_bangsal is not null) ) AS bed", false);
        $this->db->from('sm_order_bimroh as br')
            ->join('sm_layanan_pendaftaran as lp', 'lp.id = br.id_layanan_pendaftaran')
			->join('sm_pendaftaran as pd', 'pd.id = lp.id_pendaftaran')
            ->join('sm_pasien as p', 'p.id = br.id_pasien')
            ->join('sm_tenaga_medis as tm', 'tm.id = br.id_perawat', 'left')
            ->join('sm_pegawai as pe', 'pe.id = tm.id_pegawai');     
            
            if (($search['tanggal_awal'] !== '') & ($search['tanggal_akhir'] !== '')) :
                $this->db->where("pd.tanggal_daftar BETWEEN '" . date2mysql($search['tanggal_awal']) . " 00:00:00' AND '" . date2mysql($search['tanggal_akhir']) . " 23:59:59'");
            endif;
                

            if ($search['no_register'] !== '') :
                $this->db->where('pd.no_register', $search['no_register'], true);
            endif;
    
            if ($search['no_rm'] !== '') :
                $this->db->like('p.id', $search['no_rm'], 'before', true);
            endif;
    
            if ($search['nik'] !== '') :
                $this->db->where('p.no_identitas', $search['nik']);
            endif;
    
            if ($search['nama'] !== '') :
                $this->db->where("p.nama ilike '%" . strtolower($search['nama']) . "%'");
            endif;
    
            if ($search['layanan'] !== '') :
                $this->db->where('br.jenis', $search['layanan']);
            endif;

        return $this->db->order_by('br.id', 'desc');   

    }

    private function _listPermintaanBimroh($limit = 0, $start = 0, $search)
    {
        $this->sqlPermintaanBimbinganRohani($search);
        if ($limit !== 0) :
            $this->db->limit($limit, $start);
        endif;

        return $this->db->get()->result();
    }

    function getListDataPermintaanBimroh($limit = 0, $start = 0, $search)
    {
        $result['data'] = $this->_listPermintaanBimroh($limit, $start, $search);
        $result['jumlah'] = $this->sqlPermintaanBimbinganRohani($search)->get()->num_rows();
        return $result;

        $this->db->close();
    }

	function updateBimroh($data, $id)
    {
        return $this->db->where('id', $id)        
        ->update('sm_order_bimroh', $data);
        
    }   

    function simpanKonfirmasiBimroh()
	{
        $this->db->trans_begin();
		$id = safe_post('id_order_bimroh');
		$status = safe_post('status_permintaan');
		$alasan_pembatalan = safe_post('alasan');
		if ($status === 'Confirmed') :
			
			$data = array(
                'alasan_pembatalan' => $alasan_pembatalan,
				'status'            => $status,
                'waktu_konfirmasi'  => $this->datetime,
                'is_bimroh'         => 1				
			);
		else :
			$data = array(
                'alasan_pembatalan' => $alasan_pembatalan,
                'status'            => $status,
                'waktu_konfirmasi' => $this->datetime,                
            );
		endif;
		$this->db->where('id', safe_post('id_layanan_pendaftaran'), true)->update('sm_order_bimroh', $data);
		if ($this->db->trans_status() === false) :
			$this->db->trans_rollback();
			$response['status'] = false;
			$response['message'] = 'Gagal mengkonfirmasi permintaan bimroh!';
		else :
			$this->db->trans_commit();
			$response['status'] = true;
			$response['message'] = 'Permintaan Bimroh telah berhasil dikonfirmasi!';
		endif;
		return $response;
	}

    function updateDataBimroh($data, $id)
    {
        return $this->db->where('id', $id)        
        ->update('sm_order_bimroh', $data);
    }

    function getFormBimrohById($id)
    {
        $sql = "select br.*, 
                pd.id_pasien, pd.no_register, pd.id as id_pendaftaran, p.nama, p.kelamin, p.tanggal_lahir, 
                p.agama, p.alamat, pe.nama as petugas_bimroh,pd.tanggal_daftar as waktu_panggilan, pe.nip as nip_petugas_bimroh, pe.kelamin as jk_petugas_bimroh, pj.waktu_panggilan as waktu_panggil
                from sm_bimbingan_rohani as br
                left join sm_pemulasaran_jenazah as pj on pj.id = br.id_pemulasaran_jenazah
                left join sm_pegawai as pe on pe.id = pj.id_staff_ipj
                left join sm_layanan_pendaftaran as lp on lp.id = pj.id_layanan_pendaftaran
                left join sm_pendaftaran as pd on pd.id = lp.id_pendaftaran
                left join sm_pasien as p on p.id = pd.id_pasien
                where br.id = '".$id."'";

        // echo $sql; die;
        return $this->db->query($sql)->row();
        
    }

    function pembatalanOrderBimroh($id){
        $this->db->where('id', $id, true);
		$this->db->update('sm_bimbingan_rohani', ['status' => 'Canceled']);
		if ($this->db->trans_status() === false) :
			$this->db->trans_rollback();
			$result['status'] = false;
			$result['message'] = 'Gagal melakukan pembatalan bimbingan rohani';
		else :
			$this->db->trans_commit();
			$result['status'] = true;
			$result['message'] = 'Berhasil melakukan pembatalan bimbingan rohani';
		endif;
		return $result;
    }

    private function sqlDataBimbinganRohani($search)
    {
        $this->db->select("DISTINCT ON (ob.id) ob.*, COALESCE(peb.nama, '') as nama_perawat, pb.nama,  
                        (SELECT CONCAT(
                            (SELECT nama from sm_bangsal where id = rid.id_bangsal) , ' kelas ', 
                            (SELECT nama from sm_kelas where id = rid.id_kelas) , ' ruang ', rid.no_ruang, ' No. Bed ', rid.no_bed) 
                            FROM sm_layanan_pendaftaran as lpb
                            LEFT JOIN sm_rawat_inap as rid ON lpb.id = rid.id_layanan_pendaftaran 
                            left JOIN sm_intensive_care as icd ON lpb.id = icd.id_layanan_pendaftaran
                            WHERE lpb.id = ob.id_layanan_pendaftaran and (rid.id_bangsal is not null)
                            UNION
                            SELECT CONCAT((SELECT nama from sm_bangsal where id = icd.id_bangsal) , ' kelas ', 
                            (SELECT nama from sm_kelas where id = icd.id_kelas) , ' ruang ', icd.no_ruang, ' No. Bed ', icd.no_bed) 
                            FROM sm_layanan_pendaftaran as lpb
                            LEFT JOIN sm_rawat_inap as rid ON lpb.id = rid.id_layanan_pendaftaran 
                            left JOIN sm_intensive_care as icd ON lpb.id = icd.id_layanan_pendaftaran
                            WHERE lpb.id = ob.id_layanan_pendaftaran and (icd.id_bangsal is not null) ) AS bed", false);
        $this->db->from('sm_order_bimroh as ob')
            ->join('sm_layanan_pendaftaran as lpb', 'lpb.id = ob.id_layanan_pendaftaran')
			->join('sm_pendaftaran as pdb', 'pdb.id = lpb.id_pendaftaran')
			->join('sm_pasien as pb', 'pb.id = pdb.id_pasien')    
            ->join('sm_tenaga_medis as tmb', 'tmb.id = ob.id_perawat', 'left')     
            ->join('sm_pegawai as peb', 'peb.id = tmb.id_pegawai')
            ->where('ob.status', 'Confirmed');

            if (($search['tanggal_awal'] !== '') & ($search['tanggal_akhir'] !== '')) :
                $this->db->where("pdb.tanggal_daftar BETWEEN '" . date2mysql($search['tanggal_awal']) . " 00:00:00' AND '" . date2mysql($search['tanggal_akhir']) . " 23:59:59'");
            endif;
                

            if ($search['no_register'] !== '') :
                $this->db->where('pdb.no_register', $search['no_register'], true);
            endif;
    
            if ($search['no_rm'] !== '') :
                $this->db->like('pb.id', $search['no_rm'], 'before', true);
            endif;
    
            if ($search['nik'] !== '') :
                $this->db->where('pb.no_identitas', $search['nik']);
            endif;
    
            if ($search['nama'] !== '') :
                $this->db->where("pb.nama ilike '%" . strtolower($search['nama']) . "%'");
            endif;
    
            if ($search['layanan'] !== '') :
                $this->db->where('ob.jenis', $search['layanan']);
            endif;

        return $this->db->order_by('ob.id', 'desc');   

    }

    private function _listDataBimroh($limit = 0, $start = 0, $search)
    {
        $this->sqlDataBimbinganRohani($search);
        if ($limit !== 0) :
            $this->db->limit($limit, $start);
        endif;

        return $this->db->get()->result();
    }

    function getListDataBimroh($limit = 0, $start = 0, $search)
    {
        $result['data'] = $this->_listDataBimroh($limit, $start, $search);
        $result['jumlah'] = $this->sqlDataBimbinganRohani($search)->get()->num_rows();
        return $result;

        $this->db->close();
    }

    function getFormBimrohPasienBaru($id){
        $sql = "select fob.*, pob.nama as nama_pasien, pdob.no_register, pob.telp as telepon, pob.tanggal_lahir as tanggal_lahir, pob.kelamin as jenis_kelamin, pob.agama, pob.alamat as alamat_pasien, COALESCE(ppb.nama, '') as nama_perawat
        from sm_order_bimroh fob				
        join sm_layanan_pendaftaran lpob ON fob.id_layanan_pendaftaran = lpob.id
        join sm_pendaftaran pdob ON lpob.id_pendaftaran = pdob.id
        join sm_pasien pob ON pdob.id_pasien = pob.id
        join sm_tenaga_medis tmpb ON tmpb.id = fob.id_perawat
        join sm_pegawai ppb ON ppb.id = tmpb.id_pegawai
        where fob.id_layanan_pendaftaran = '" . $id . "'";
        // var_dump($id);exit(1);
        return $this->db->query($sql)->row();
    }

    function getFormBimrohPasienKhusus($id){
        $sql = "select fok.*, pok.nama as nama_pasien, pdok.no_register, pok.telp as telepon, pok.tanggal_lahir as tanggal_lahir, pok.kelamin as jenis_kelamin, pok.agama, pok.alamat as alamat_pasien,COALESCE(pgok.nama, '') as nama_perawat
        from sm_order_bimroh fok				
        join sm_layanan_pendaftaran lpok ON fok.id_layanan_pendaftaran = lpok.id
        join sm_pendaftaran pdok ON lpok.id_pendaftaran = pdok.id
        join sm_pasien pok ON pdok.id_pasien = pok.id	
        join sm_tenaga_medis tpok ON tpok.id = fok.id_perawat
        join sm_pegawai pgok ON pgok.id = tpok.id_pegawai
        where fok.id_layanan_pendaftaran = '" . $id . "'";
    return $this->db->query($sql)->row();
    }
   
}
