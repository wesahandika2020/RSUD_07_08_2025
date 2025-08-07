<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pemeriksaan_igd_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
        $this->datetime = date('Y-m-d H:i:s');
    }

    private function sqlPemeriksaanIgd($search)
    {
        $this->db->select("DISTINCT ON (lp.id) lp.*, 
                        pd.tanggal_daftar, pd.tanggal_keluar, lp.id as id_layanan,
                        pd.id_pasien, pd.no_register,
						CONCAT_WS(' ', COALESCE(p.status_pasien, ''), p.nama) as nama, 
                        p.tanggal_lahir, p.telp,
                        pd.jenis_igd, pd.jenis_pendaftaran,
                        r.id as id_resep,
                        coalesce(pj.nama, '') as penjamin,
                        coalesce(sp.nama, '') as layanan, 
                        coalesce(pg.nama, '') as dokter, 
                        lp.no_antrian,
                        sp.kode_bpjs, coalesce(tr.account, '') as user_sep,
                        CASE WHEN (kp.id IS NULL AND pd.jenis_igd = 'IGD') THEN 0 ELSE 1 END AS triase", false);

        $this->db->from('sm_layanan_pendaftaran as lp')
            ->join('sm_pendaftaran as pd', 'pd.id = lp.id_pendaftaran')
            ->join('sm_pasien as p', 'p.id = pd.id_pasien')
            ->join('sm_resep as r', 'r.id_layanan_pendaftaran = lp.id', 'left')
            ->join('sm_spesialisasi as sp', 'sp.id = lp.id_unit_layanan', 'left')
            ->join('sm_tenaga_medis as tm', 'tm.id = lp.id_dokter', 'left')
            ->join('sm_pegawai as pg', 'pg.id = tm.id_pegawai', 'left')
            ->join('sm_penjamin as pj', 'pj.id = lp.id_penjamin', 'left')
            ->join('sm_translucent as tr', 'tr.id = lp.id_users_sep', 'left')
            ->join('sm_kajian_keperawatan_igd kp', 'lp.id=kp.id_layanan_pendaftaran', 'left');

        if (($search['tanggal_awal'] !== '') & ($search['tanggal_akhir'] !== '')) :
            $this->db->where("pd.tanggal_daftar BETWEEN '" . date2mysql($search['tanggal_awal']) . " 00:00:00' AND '" . date2mysql($search['tanggal_akhir']) . " 23:59:59'");
        endif;

        if ($search['jenis_layanan'] !== '') :
            $this->db->where('lp.jenis_layanan', $search['jenis_layanan'], true);
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
            $this->db->where('pd.jenis_igd', $search['layanan']);
        endif;

        return $this->db->order_by('lp.id', 'desc');
    }

    private function _listPemeriksaanIgd($limit, $start, $search)
    {
        $this->sqlPemeriksaanIgd($search);
        if ($limit !== 0) :
            $this->db->limit($limit, $start);
        endif;
        return $this->db->get()->result();
    }

    function getListDataPemeriksaanIgd($limit, $start, $search)
    {
        $result['data'] = $this->_listPemeriksaanIgd($limit, $start, $search);
        $result['jumlah'] = $this->sqlPemeriksaanIgd($search)->get()->num_rows();
        return $result;
    }

    // GABUNGAN
    function simpanPengkajianAwalIGD($data_medis, $data_keperawatan, $data_triase_igd, $data_maternal){
        $this->db->trans_begin();

        $id_kajian_medis = $this->input->post('id_kajian_medis', true);
        $id_kajian_keperawatan = $this->input->post('id_kajian_keperawatan', true);
        $id_kajian_triase = $this->input->post('id_kajian_triase', true); // WH2

        // PIM
        $id_pengkajian_maternal = $this->input->post('id_pengkajian_maternal', true);

        // WH3 PIM
        if ($id_kajian_medis === '' || $id_kajian_keperawatan === '' || $id_kajian_triase === '' || $id_pengkajian_maternal === '') :
            $data_medis['created_date'] = $this->datetime;
            $this->db->insert('sm_kajian_medis_igd', $data_medis);

            $data_keperawatan['created_date'] = $this->datetime;
            $this->db->insert('sm_kajian_keperawatan_igd', $data_keperawatan);

        // WH4
            $data_triase_igd['created_date'] = $this->datetime;
            $this->db->insert('sm_kajian_triase_igd', $data_triase_igd);

        // PIM
            $data_maternal['created_date'] = $this->datetime;
            $this->db->insert('sm_maternal_igd', $data_maternal);

            if ($this->db->trans_status() === false) :
                $this->db->trans_rollback();
                return ['status' => false, 'message' => 'Gagal menyimpan data pengkajian awal'];
            else :
                $this->db->trans_commit();
                return ['status' => true, 'message' => 'Berhasil menyimpan data pengkajian awal'];
            endif;
        else :
            // ambil data kajian medis sebelumnya
            $data_before_medis = $this->db->select("*, '' as id_user, '' as tanggal_ubah")->from('sm_kajian_medis_igd')->where('id', $id_kajian_medis)->get()->row();
            unset($data_before_medis->id);
            $data_before_medis->id_user = $this->session->userdata('id_translucent');
            $data_before_medis->tanggal_ubah = $this->datetime;

            // store ke sm_kajian_medis_igd_logs sebelum ada perubahan
            $this->db->insert('sm_kajian_medis_igd_logs', $data_before_medis);

            // ambil data kajian keperawatan sebelumnya
            $data_before_keperawatan = $this->db->select("*, '' as id_user, '' as tanggal_ubah")->from('sm_kajian_keperawatan_igd')->where('id', $id_kajian_keperawatan)->get()->row();
            unset($data_before_keperawatan->id);
            $data_before_keperawatan->id_user = $this->session->userdata('id_translucent');
            $data_before_keperawatan->tanggal_ubah = $this->datetime;
            $this->db->insert('sm_kajian_keperawatan_igd_logs', $data_before_keperawatan);

            // WH5
            $data_before_triase = $this->db->select("*, '' as id_user, '' as tanggal_ubah")->from('sm_kajian_triase_igd')->where('id', $id_kajian_triase)->get()->row();
            unset($data_before_triase->id); 
            $data_before_triase->id_user = $this->session->userdata('id_translucent');
            $data_before_triase->tanggal_ubah = $this->datetime;
            $this->db->insert('sm_kajian_triase_igd_logs', $data_before_triase);

            // PIM
            $data_before_PIM = $this->db->select("*, '' as id_user_maternal, '' as tanggal_ubah_maternal")->from('sm_maternal_igd')->where('id', $id_pengkajian_maternal)->get()->row();
            unset($data_before_PIM->id); 
            $data_before_PIM->id_user_maternal = $this->session->userdata('id_translucent');
            $data_before_PIM->tanggal_ubah_maternal = $this->datetime;
            $this->db->insert('sm_maternal_igd_logs', $data_before_PIM);

            unset($data_medis['waktu']);
            unset($data_medis['drawpad']);
            $data_medis['updated_date'] = $this->datetime;
            $this->db->where('id', $id_kajian_medis, true)->update('sm_kajian_medis_igd', $data_medis);

            $data_keperawatan['updated_date'] = $this->datetime;
            $this->db->where('id', $id_kajian_keperawatan, true)->update('sm_kajian_keperawatan_igd', $data_keperawatan);

            // WH6
            $data_triase_igd['updated_date'] = $this->datetime;       
            $this->db->where('id', $id_kajian_triase, true)->update('sm_kajian_triase_igd', $data_triase_igd);

            // PIM
            $data_maternal['updated_date'] = $this->datetime;       
            $this->db->where('id', $id_pengkajian_maternal, true)->update('sm_maternal_igd', $data_maternal);

            // record logs
            $this->load->model('logs/Logs_model', 'm_logs');
            $this->m_logs->recordAdminLogs($data_medis['id_layanan_pendaftaran'], 'Ubah Pengkajian Awal IGD');

            if ($this->db->trans_status() === false) :
                $this->db->trans_rollback();
                return ['status' => false, 'message' => 'Gagal mengubah data pengkajian awal'];
            else :
                $this->db->trans_commit();
                return ['status' => true, 'message' => 'Berhasil mengubah data pengkajian awal'];
            endif;
        endif;
    }

    function getKajianMedis($id_pendaftaran)
    {
        return $this->db->select('kmigd.*, pgd.nama as dokter_igd, pgdp.nama as verifikasi_dpjp, bgl.nama as bangsal')
            ->from('sm_kajian_medis_igd as kmigd')
            ->join('sm_layanan_pendaftaran as lp', 'lp.id = kmigd.id_layanan_pendaftaran')
            ->join('sm_tenaga_medis as tmd', 'tmd.id = kmigd.id_dokter_igd', 'left')
            ->join('sm_pegawai as pgd', 'pgd.id = tmd.id_pegawai', 'left')
            ->join('sm_tenaga_medis as tmdp', 'tmdp.id = kmigd.id_dokter_dpjp', 'left')
            ->join('sm_pegawai as pgdp', 'pgdp.id = tmdp.id_pegawai', 'left')
            ->join('sm_bangsal as bgl', 'bgl.id = kmigd.id_bangsal', 'left')
            ->where('lp.id_pendaftaran', $id_pendaftaran, true)
            ->get()
            ->row();
    }

    function getKajianKeperawatan($id_pendaftaran)
    {
        return $this->db->select('kpigd.*, pgp.nama as perawat, pgdp.nama as verifikasi_dpjp')
            ->from('sm_kajian_keperawatan_igd as kpigd')
            ->join('sm_layanan_pendaftaran as lp', 'lp.id = kpigd.id_layanan_pendaftaran')
            ->join('sm_tenaga_medis as tmp', 'tmp.id = kpigd.id_perawat_igd', 'left')
            ->join('sm_pegawai as pgp', 'pgp.id = tmp.id_pegawai', 'left')
            ->join('sm_tenaga_medis as tmdp', 'tmdp.id = kpigd.id_dokter_dpjp', 'left')
            ->join('sm_pegawai as pgdp', 'pgdp.id = tmdp.id_pegawai', 'left')
            ->where('lp.id_pendaftaran', $id_pendaftaran, true)
            ->get()
            ->row();
    }

    // TPIGD
    function getKajianTriase($id_pendaftaran){
        return $this->db->select('ktigd.*, 
                                pgp.nama as perawat, 
                                pgp.tanda_tangan as ttd_perawat_triase,
                                pgdp.tanda_tangan as ttd_dokter_triase,
                                pgdp.nama as verifikasi_dpjp ')
        ->from('sm_kajian_triase_igd as ktigd')
        ->join('sm_layanan_pendaftaran as lp', 'lp.id = ktigd.id_layanan_pendaftaran')
        ->join('sm_tenaga_medis as tmp', 'tmp.id = ktigd.id_perawatt_igd', 'left')
        ->join('sm_pegawai as pgp', 'pgp.id = tmp.id_pegawai', 'left')
        ->join('sm_tenaga_medis as tmdp', 'tmdp.id = ktigd.id_dokterr_igd', 'left')
        ->join('sm_pegawai as pgdp', 'pgdp.id = tmdp.id_pegawai', 'left')
        ->where('lp.id_pendaftaran', $id_pendaftaran, true)
        ->get()
        ->row();
    }
    
    // PIM
    function getMaternal($id_pendaftaran ,$id_layanan_pendaftaran){
        return $this->db->select('smi.*, pgd.nama as nama_bidan, pgdp.nama as nama_dpjp')
        ->from('sm_maternal_igd as smi')
        ->join('sm_layanan_pendaftaran as lp', 'smi.id_layanan_pendaftaran = lp.id')
        ->join('sm_pendaftaran as pd', 'pd.id = lp.id_pendaftaran')
        ->join('sm_tenaga_medis as tmd', 'tmd.id = smi.pm_bidan', 'left')
        ->join('sm_pegawai as pgd', 'pgd.id = tmd.id_pegawai', 'left')
        ->join('sm_tenaga_medis as tmdp', 'tmdp.id = smi.pm_dpjp', 'left')
        ->join('sm_pegawai as pgdp', 'pgdp.id = tmdp.id_pegawai', 'left')
        ->where('pd.id', $id_pendaftaran, true)
        ->get()
        ->row();
    }

    function getDataSignatureKajianMedis($id_layanan_pendaftaran)
    {
        return $this->db->select('signature_dokter_igd, signature_dokter_dpjp')->from('sm_kajian_medis_igd')->where('id_layanan_pendaftaran', $id_layanan_pendaftaran, true)->get()->row();
    }

    function getDataSignatureKajianKeperawatan($id_layanan_pendaftaran)
    {
        return $this->db->select('signature_perawat_igd, signature_dokter_dpjp')->from('sm_kajian_keperawatan_igd')->where('id_layanan_pendaftaran', $id_layanan_pendaftaran, true)->get()->row();
    }

    // WH8
    function getDataTriaseIgd($id_layanan_pendaftaran)
    {
        return $this->db->select('ttd_perawat_igd, ttd_dokter_igd')->from('sm_kajian_triase_igd')->where('id_layanan_pendaftaran', $id_layanan_pendaftaran, true)->get()->row();
    }

    // PIM
    function getDataMaternalIgd($id_layanan_pendaftaran){
        return $this->db->select('pm_paraf_bidan, pm_paraf_dpjp')->from('sm_maternal_igd')->where('id_layanan_pendaftaran', $id_layanan_pendaftaran, true)->get()->row();
    }

	function pembatalanIGD($id_pendaftaran, $id_layanan_pendaftaran){

        $this->db->trans_begin();
        $layanan_pendaftaran = array(
            'status_terlayani' => 'Batal',
            'tindak_lanjut'    => 'Batal',
        );
        $this->db->where("id", $id_layanan_pendaftaran)->update("sm_layanan_pendaftaran", $layanan_pendaftaran);

        $sqlJmlKunj = "SELECT count(*) jml FROM sm_layanan_pendaftaran lp
                   JOIN sm_pendaftaran pd ON lp.id_pendaftaran = pd.id where pd.id = '" . $id_pendaftaran . "'";
        $jmlKunj = $this->db->query($sqlJmlKunj)->row()->jml;

        if($jmlKunj ==' 2'){
            $sqlIdPoli = "SELECT lp.id FROM sm_layanan_pendaftaran lp JOIN sm_pendaftaran pd ON lp.id_pendaftaran = pd.id
                          where pd.id = '" . $id_pendaftaran . "' and jenis_layanan = 'Poliklinik' ";
            $idPoli = $this->db->query($sqlIdPoli)->row()->id;

            if($idPoli != NULL){
                $updatePoliklinik = array('tindak_lanjut' => NULL);
                $this->db->where("id", $idPoli)->update("sm_layanan_pendaftaran", $updatePoliklinik);
            }
        }

        // record logs
        if ($this->db->trans_status() === false) :
            $this->db->trans_rollback();
            return ['status' => false, 'message' => 'Gagal melakukan Pembatalan IGD'];
        else :
            $this->db->trans_commit();
            return ['status' => true, 'message' => 'Berhasil melakukan Pembatalan IGD'];
        endif;
    }

}