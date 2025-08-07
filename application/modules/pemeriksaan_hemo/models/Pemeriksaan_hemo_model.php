<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pemeriksaan_hemo_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
        $this->datetime = date('Y-m-d H:i:s');
    }

    private function sqlPemeriksaanHemodialisa($search)
    {
        $this->db->select("DISTINCT ON (lp.id) lp.*, lp.id as id_layanan_pendaftaran,
                            pd.tanggal_daftar, pd.tanggal_keluar, p.telp,
                            pd.id_pasien, pd.no_register,
                            CONCAT_WS(' ', p.nama, COALESCE(p.status_pasien, '')) as nama, p.tanggal_lahir,
                            r.id as id_resep,
                            coalesce(pj.nama, '') as penjamin,
                            coalesce(sp.nama, '') as layanan, 
                            coalesce(pg.nama, '') as dokter, 
                            lp.no_antrian,
                            sp.kode_bpjs, coalesce(tr.account, '') as user_sep, skk.id id_skk", false);

        $this->db->from('sm_layanan_pendaftaran as lp')
            ->join('sm_pendaftaran as pd', 'pd.id = lp.id_pendaftaran')
            ->join('sm_pasien as p', 'p.id = pd.id_pasien')
            ->join('sm_resep as r', 'r.id_layanan_pendaftaran = lp.id', 'left')
            ->join('sm_spesialisasi as sp', 'sp.id = lp.id_unit_layanan', 'left')
            ->join('sm_tenaga_medis as tm', 'tm.id = lp.id_dokter', 'left')
            ->join('sm_pegawai as pg', 'pg.id = tm.id_pegawai', 'left')
            ->join('sm_penjamin as pj', 'pj.id = lp.id_penjamin', 'left')
            ->join('sm_translucent as tr', 'tr.id = lp.id_users_sep', 'left')
            ->join('sm_surat_kontrol as skk', 'skk.id_layanan_pendaftaran=lp.id', 'left');


        if (($search['tanggal_awal'] !== '') & ($search['tanggal_akhir'] !== '')) :
            $this->db->where("lp.tanggal_layanan BETWEEN '" . date2mysql($search['tanggal_awal']) . " 00:00:00' AND '" . date2mysql($search['tanggal_akhir']) . " 23:59:59'");
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

        // if ($search['layanan'] !== '' ) :
        //     $this->db->where('lp.id_unit_layanan', $search['layanan']);
        // endif;

        return $this->db->order_by('lp.id', 'desc');

        // return $this->db->group_by('lp.id, r.id, pd.tanggal_daftar, pd.tanggal_keluar, pd.id_pasien, pd.no_register, p.nama, p.tanggal_lahir, pj.nama, sp.nama, pg.nama, tr.account, sp.kode_bpjs');
    }

    private function _listPemeriksaanHemodialisa($limit, $start, $search)
    {
        $this->sqlPemeriksaanHemodialisa($search);
        if ($limit !== 0) :
            $this->db->limit($limit, $start);
        endif;

        return $this->db->get()->result();
        // $this->db->get(); echo $this->db->last_query(); exit();
    }

    function getListDataPemeriksaanHemodialisa($limit, $start, $search)
    {
        $result['data'] = $this->_listPemeriksaanHemodialisa($limit, $start, $search);
        $result['jumlah'] = $this->sqlPemeriksaanHemodialisa($search)->get()->num_rows();
        return $result;

        $this->db->close();
    }

    function getCountHemodialisa($id_layanan_pendaftaran)
    {
        return $this->db->get_where('sm_asuhan_keperawatan_hd', array('id_layanan_pendaftaran' => $id_layanan_pendaftaran))->num_rows();
    }

    function getDetailAsuhanKeperawatan($id_pendaftaran)
    {
        $sql = "select ak.id, ak.id_layanan_pendaftaran, ak.waktu, ak.no_mesin, ak.dx_medis, ak.hemodialisa_ke 
                from sm_asuhan_keperawatan_hd as ak
                join sm_layanan_pendaftaran lp on ak.id_layanan_pendaftaran = lp.id
                where lp.id_pendaftaran = '" . $id_pendaftaran . "' 
                order by ak.waktu ASC";
        $result['data'] = $this->db->query($sql)->result();
        $result['jumlah'] = $this->db->query($sql)->num_rows();
        $this->db->close();
        return $result;
    }

    function updateAsuhanKeperawatan($data, $id_asuhan_keperawatan = NULL)
    {
        if ($id_asuhan_keperawatan == NULL) :
            $this->db->insert('sm_asuhan_keperawatan_hd', $data);
            $id = $this->db->insert_id();
        else :
            $this->db->where('id', $id_asuhan_keperawatan);
            $this->db->update('sm_asuhan_keperawatan_hd', $data);
            $id = $id_asuhan_keperawatan;
        endif;

        return $id;
    }

    function updateTindakanKeperawatan($data_pre_hd, $data_intra_hd, $data_post_hd, $id_asuhan_keperawatan = NULL)
    {
        $this->db->trans_begin();
        $cek_tindakan_keperawatan = $this->db->get_where('sm_tindakan_keperawatan_hd', array('id_asuhan_keperawatan' => $id_asuhan_keperawatan))->num_rows();

        if (($cek_tindakan_keperawatan == 0 & $id_asuhan_keperawatan == NULL) | ($cek_tindakan_keperawatan == 0 & $id_asuhan_keperawatan !== NULL)) :
            // echo 'insert'; die;
            $tipe = 'insert';
            $this->db->insert('sm_tindakan_keperawatan_hd', $data_pre_hd);
            $this->db->insert('sm_tindakan_keperawatan_hd', $data_post_hd);
            if (is_array($data_intra_hd['intra_observasi_qb'])) :
                foreach ($data_intra_hd['intra_observasi_qb'] as $i => $value) :
                    $data = array(
                        'id_asuhan_keperawatan' => $data_intra_hd['id_asuhan_keperawatan'],
                        'jenis_observasi' => $data_intra_hd['jenis_observasi'],
                        'observasi_jam' => $data_intra_hd['intra_observasi_jam'][$i],
                        'observasi_qb' => $value,
                        'observasi_ufr' => $data_intra_hd['intra_observasi_ufr'][$i],
                        'observasi_td' => $data_intra_hd['intra_observasi_td'][$i],
                        'observasi_n' => $data_intra_hd['intra_observasi_n'][$i],
                        'observasi_rr' => $data_intra_hd['intra_observasi_rr'][$i],
                        'observasi_suhu' => $data_intra_hd['intra_observasi_suhu'][$i],
                        'intake_nacl' => $data_intra_hd['intra_intake_nacl'][$i],
                        'intake_dextrose' => $data_intra_hd['intra_intake_dextrose'][$i],
                        'intake_makan_minum' => $data_intra_hd['intra_intake_makan_minum'][$i],
                        'intake_lain_lain' => $data_intra_hd['intra_intake_lain_lain'][$i],
                        'output_uf_tercapai' => $data_intra_hd['intra_output_uf_tercapai'][$i],
                        'output_lain_lain' => $data_intra_hd['intra_output_lain_lain'][$i],
                        'keterangan_lain' => $data_intra_hd['intra_keterangan_lain'][$i],
                        'paraf' => $data_intra_hd['intra_paraf'][$i],
                        'nama_paraf' => $this->session->userdata('nama'),
                        'waktu' => $this->datetime,
                    );

                    $this->db->insert('sm_tindakan_keperawatan_hd', $data);
                endforeach;
            endif;
        else :
            // echo 'update'; die;
            $tipe = 'edit';
            unset($data_pre_hd['waktu']);
            unset($data_post_hd['waktu']);
            $this->db->where(array('id_asuhan_keperawatan' => $id_asuhan_keperawatan, 'jenis_observasi' => 'Pre HD'))->update('sm_tindakan_keperawatan_hd', $data_pre_hd);
            $this->db->where(array('id_asuhan_keperawatan' => $id_asuhan_keperawatan, 'jenis_observasi' => 'Post HD'))->update('sm_tindakan_keperawatan_hd', $data_post_hd);

            if (is_array($data_intra_hd['intra_observasi_jam'])) :
                // $data = array();
                foreach ($data_intra_hd['intra_observasi_jam'] as $i => $value) :
                    $data = array(
                        'id_asuhan_keperawatan' => $data_intra_hd['id_asuhan_keperawatan'],
                        'jenis_observasi' => 'Intra HD',
                        'observasi_jam' => $value,
                        'observasi_qb' => $data_intra_hd['intra_observasi_qb'][$i],
                        'observasi_ufr' => $data_intra_hd['intra_observasi_ufr'][$i],
                        'observasi_td' => $data_intra_hd['intra_observasi_td'][$i],
                        'observasi_n' => $data_intra_hd['intra_observasi_n'][$i],
                        'observasi_rr' => $data_intra_hd['intra_observasi_rr'][$i],
                        'observasi_suhu' => $data_intra_hd['intra_observasi_suhu'][$i],
                        'intake_nacl' => $data_intra_hd['intra_intake_nacl'][$i],
                        'intake_dextrose' => $data_intra_hd['intra_intake_dextrose'][$i],
                        'intake_makan_minum' => $data_intra_hd['intra_intake_makan_minum'][$i],
                        'intake_lain_lain' => $data_intra_hd['intra_intake_lain_lain'][$i],
                        'output_uf_tercapai' => $data_intra_hd['intra_output_uf_tercapai'][$i],
                        'output_lain_lain' => $data_intra_hd['intra_output_lain_lain'][$i],
                        'keterangan_lain' => $data_intra_hd['intra_keterangan_lain'][$i],
                        'paraf' => $data_intra_hd['intra_paraf'][$i],
                        'nama_paraf' => $this->session->userdata('nama'),
                        'waktu' => $this->datetime,
                    );

                    if ($data_intra_hd['id_tindakan_keperawatan'][$i] !== '') :
                        unset($data['waktu']);
                        $this->db->where(array('id' => $data_intra_hd['id_tindakan_keperawatan'][$i]))->update('sm_tindakan_keperawatan_hd', $data);
                    else :
                        $this->db->insert('sm_tindakan_keperawatan_hd', $data);
                    endif;
                endforeach;
            endif;
        endif;

        if ($this->db->trans_status() === false) :
            $this->db->trans_rollback();
            $status = false;
        else :
            $this->db->trans_commit();
            $status = true;
        endif;

        return $tipe;
    }

    function deleteAsuhanKeperawatan($id)
    {
        return $this->db->where('id', $id, true)->delete('sm_asuhan_keperawatan_hd');
    }

    function deleteLaporanHD($id)
    {
        return $this->db->where('id', $id, true)->delete('sm_laporan_hd');
    }

    function getAsuhanKeperawatanById($id)
    {
        $sql = "select ak.*, 
                '' as pre_hd,
                '' as intra_hd,
                '' as post_hd
                from sm_asuhan_keperawatan_hd as ak 
                where id = '" . $id . "'";
        $data = $this->db->query($sql)->row();

        $data_pre_hd = $this->db->get_where('sm_tindakan_keperawatan_hd', array('id_asuhan_keperawatan' => $id, 'jenis_observasi' => 'Pre HD'))->row();
        $data_intra_hd = $this->db->order_by('observasi_jam', 'ASC')->get_where('sm_tindakan_keperawatan_hd', array('id_asuhan_keperawatan' => $id, 'jenis_observasi' => 'Intra HD'))->result();
        $data_post_hd = $this->db->get_where('sm_tindakan_keperawatan_hd', array('id_asuhan_keperawatan' => $id, 'jenis_observasi' => 'Post HD'))->row();

        $data->pre_hd = $data_pre_hd;
        $data->intra_hd = $data_intra_hd;
        $data->post_hd = $data_post_hd;

        return $data;
    }

    function updateLaporanHD($data)
    {
        $this->db->trans_begin();
        $id_laporan_hd = $this->input->post('id_laporan_hd');
        if ($id_laporan_hd === '') :
            $this->db->insert('sm_laporan_hd', $data);
            if ($this->db->trans_status() === false) :
                $this->db->trans_rollback();
                $response = array('status' => false, 'message' => 'Gagal menambahkan data laporan hemodialisa');
            else :
                $this->db->trans_commit();
                $response = array('status' => true, 'message' => 'Berhasil menambahkan data laporan hemodialisa');
            endif;
        else :
            $this->db->where('id', $id_laporan_hd, true)->update('sm_laporan_hd', $data);
            if ($this->db->trans_status() === false) :
                $this->db->trans_rollback();
                $response = array('status' => false, 'message' => 'Gagal mengubah data laporan hemodialisa');
            else :
                $this->db->trans_commit();
                $response = array('status' => true, 'message' => 'Berhasil mengubah data laporan hemodialisa');
            endif;
        endif;

        return $response;
    }

    function getLaporanHDDetail($id_pendaftaran)
    {
        $sql = "select lh.*, 
                coalesce('', pgd.nama) as dokter_jaga,
                coalesce('', pgph.nama) as perawat_hd, 
                coalesce('', pgpr.nama) as perawat_ruangan
                from sm_laporan_hd as lh 
                join sm_layanan_pendaftaran as lp on (lh.id_layanan_pendaftaran = lp.id)
                left join sm_tenaga_medis as tmd on (tmd.id = lh.id_dokter)
                left join sm_pegawai as pgd on (pgd.id = tmd.id_pegawai)
                left join sm_tenaga_medis as tmph on (tmph.id = lh.id_perawat_hd)
                left join sm_pegawai as pgph on (pgph.id = tmph.id_pegawai)
                left join sm_tenaga_medis as tmpr on (tmpr.id = lh.id_perawat_ruangan)
                left join sm_pegawai as pgpr on (pgpr.id = tmd.id_pegawai)
                where lp.id_pendaftaran = '" . $id_pendaftaran . "'";
        return $this->db->query($sql)->result();
    }

    function getLaporanHDById($id)
    {
        $sql = "select lh.*, 
                coalesce(pgd.nama, '') as dokter_jaga,
                coalesce(pgph.nama, '') as perawat_hd, 
                coalesce(pgpr.nama, '') as perawat_ruangan,
                pgd.tanda_tangan as ttd_dokter,
                pgph.tanda_tangan as ttd_perawat_hd,
                pgpr.tanda_tangan as ttd_perawat_ruangan
                from sm_laporan_hd as lh 
                left join sm_tenaga_medis as tmd on (tmd.id = lh.id_dokter)
                left join sm_pegawai as pgd on (pgd.id = tmd.id_pegawai)
                left join sm_tenaga_medis as tmph on (tmph.id = lh.id_perawat_hd)
                left join sm_pegawai as pgph on (pgph.id = tmph.id_pegawai)
                left join sm_tenaga_medis as tmpr on (tmpr.id = lh.id_perawat_ruangan)
                left join sm_pegawai as pgpr on (pgpr.id = tmpr.id_pegawai)
                where lh.id = '" . $id . "'";

        // echo $sql; die;
        return $this->db->query($sql)->row();
    }

    function getCountIdPendaftran($id_pendaftaran)
    {
        return $this->db->get_where('sm_layanan_pendaftaran', array('id_pendaftaran' => $id_pendaftaran))->num_rows();
    }
}
