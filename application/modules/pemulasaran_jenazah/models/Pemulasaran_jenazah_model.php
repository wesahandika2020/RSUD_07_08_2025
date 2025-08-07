<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pemulasaran_jenazah_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
        $this->datetime = date('Y-m-d H:i:s');
    }

    private function sqlPemulasaranJenazah($search)
    {
        $this->db->select("DISTINCT ON (lp.id) lp.*, 
        pd.tanggal_daftar, pd.tanggal_keluar, 
        pd.id_pasien, pd.no_register,
        p.nama, p.tanggal_lahir, pj.is_pulang,  lp.tanggal_layanan,
        (SELECT case when (select nama from sm_bangsal where id=ri.id_bangsal)<>'' then 
        CONCAT ( (select nama from sm_bangsal where id=ri.id_bangsal), ' kelas ', (select nama from sm_kelas where id=ri.id_kelas), ' ruang ', 
        ri.no_ruang, ' No. Bed ',ri.no_bed ) 
        when  (select nama from sm_bangsal where id=ic.id_bangsal)<>'' then
        CONCAT ( (select nama from sm_bangsal where id=ic.id_bangsal), ' kelas ', (select nama from sm_kelas where id=ic.id_kelas), ' ruang ', 
        ic.no_ruang, ' No. Bed ',ic.no_bed )
        else lpd.jenis_layanan end bed
        FROM sm_layanan_pendaftaran AS lpd 
        left join sm_rawat_inap AS ri ON lpd.ID = ri.id_layanan_pendaftaran
        left join sm_intensive_care AS ic ON lpd.ID = ic.id_layanan_pendaftaran
        WHERE	lpd.id_pendaftaran =lp.id_pendaftaran AND tindak_lanjut = 'Pemulasaran Jenazah' 
        ORDER BY lpd.ID DESC LIMIT 1 ) as bed", false);

        $this->db->from('sm_layanan_pendaftaran as lp')
            ->join('sm_pendaftaran as pd', 'pd.id = lp.id_pendaftaran')
            ->join('sm_pasien as p', 'p.id = pd.id_pasien')
            ->join('sm_pemulasaran_jenazah as pj', 'pj.id_layanan_pendaftaran = lp.id', "left")
            ->where('lp.jenis_layanan', 'Pemulasaran Jenazah');

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

        return $this->db->order_by('lp.id', 'desc');
    }

    private function _listPemulasaranJenazah($limit, $start, $search)
    {
        $this->sqlPemulasaranJenazah($search);
        if ($limit !== 0) :
            $this->db->limit($limit, $start);
        endif;

        return $this->db->get()->result();
    }

    function getListDataPemulasaranJenazah($limit, $start, $search)
    {
        $result['data'] = $this->_listPemulasaranJenazah($limit, $start, $search);
        $result['jumlah'] = $this->sqlPemulasaranJenazah($search)->get()->num_rows();
        return $result;

        $this->db->close();
    }

    // ===== PEMULASARAN JENAZAH =========

    // get data jenazah
    function get_data_jenazah($idPasien)
    {
        return $this->db->select('pj.*, pe.nama as petugas_ipj, pe.nip as nip_petugas_ipj, peg.nama as sopir_ambulance, pa.nama as nama_pasien, pa.id as id_pasien, pa.tanggal_lahir as tanggal_lahir_pasien, pa.kelamin as jenis_kelamin, p.nik_pjwb as nik_pjwb, p.nama_pjwb as nama_pjwb, p.kelamin_pjwb as kelamin_pjwb, p.alamat_pjwb as alamat_pjwb, p.telp_pjwb as tlp_pjwb')
            ->from('sm_pemulasaran_jenazah as pj')
            ->join('sm_pegawai as pe', 'pe.id = pj.id_staff_ipj', 'left')
            ->join('sm_pegawai as peg', 'peg.id = pj.id_supir_mobil_jenazah', 'left')
            ->join('sm_layanan_pendaftaran as lp', 'lp.id = pj.id_layanan_pendaftaran', 'left')
            ->join('sm_pendaftaran as p', 'p.id = lp.id_pendaftaran', 'left')
            ->join('sm_pasien as pa', 'pa.id = p.id_pasien', 'left')
            ->where('p.id_pasien', $idPasien, true)
            ->get()
            ->row();
    }

    function delete_bukti_pelayanan_jenazah($where)
    {
        $this->db->where($where);
        return $this->db->delete('sm_pemulasaran_jenazah_bukti_pelayanan');
    }

    function getAutoPasien($q, $start, $limit)
    {
        $this->db->select("p.*")
            ->from('sm_pasien as p');

        if ($q !== '') :
            if (is_numeric($q)) :
                $this->db->where("p.id ilike ('%$q')");
            else :
                $this->db->where("p.nama ilike ('$q%')");
            endif;
        endif;

        $this->db->order_by('p.id');
        $this->db->limit($limit, $start);

        $result['data'] = $this->db->get()->result();
        $result['total'] = $this->db->get('sm_pasien')->num_rows();

        return $result;
    }

    function updateDataJenazah($data, $id)
    {
        return $this->db->where('id', $id)
            ->update('sm_pemulasaran_jenazah', $data);
    }

    function countTotalMeninggal()
    {
        return $this->db->from("sm_layanan_pendaftaran")
            ->like('kondisi', 'Meninggal')
            ->count_all_results();
    }

    function countCurrentTotalMeninggal()
    {
        $query = $this->db->query("SELECT COUNT(*)
        FROM sm_layanan_pendaftaran
        WHERE EXTRACT(MONTH FROM tanggal_layanan) = " . date('m') .
            "AND EXTRACT(YEAR FROM tanggal_layanan) = " . date('Y') .
            "AND kondisi ILIKE '%Meninggal%'");

        return $query->result_array();
    }

    function delete_tindakan($id)
    {
        return $this->db->where('id_pemulasaran_jenazah', $id)->delete('sm_pemulasaran_jenazah_tindakan');
    }

    function get_data_jenazah_tindakan($idLayananPendaftaran)
    {
        return $this->db->select('pjt.*, p.nama as petugas_ipj')
            ->from('sm_pemulasaran_jenazah_tindakan as pjt')
            ->join('sm_pemulasaran_jenazah as pj', 'pj.id = pjt.id_pemulasaran_jenazah')
            ->join('sm_pegawai as p', 'p.id = pj.id_staff_ipj')
            ->where('pj.id_layanan_pendaftaran', $idLayananPendaftaran)
            ->get()
            ->result_array();
    }

    function getPemulasaranJenazahByIdLayananPendaftaran($idLayananPendaftaran)
    {
        return $this->db->select('pj.*')
            ->from('sm_pemulasaran_jenazah as pj')
            ->where('pj.id_layanan_pendaftaran', $idLayananPendaftaran)
            ->get()
            ->row();
    }

    function getFormIPJById($id)
    {

        $sql = "select pj.*, pe.nama as petugas_ipj, pe.nip as nip_petugas_ipj, pe.tgl_lahir as tgl_lahir_petugas, peg.nama as sopir_ambulance, pa.nama as nama_pasien, pa.id as id_pasien, pa.tanggal_lahir as tanggal_lahir_pasien, pa.kelamin as jenis_kelamin, pa.agama as agama_pasien, pa.alamat as alamat_pasien, p.id as id_pendaftaran, pw.nama as nama_dokter, p.nama_pjwb as nama_pjwb, p.nik_pjwb as nik_pjwb, p.kelamin_pjwb as kelamin_pjwb, p.telp_pjwb as telp_pjwb, p.alamat_pjwb as alamat_pjwb, pa.tempat_lahir as tempat_lahir_pasien, pa.telp as telp_pasien
        from sm_pemulasaran_jenazah as pj
        left join sm_pegawai as pe on pe.id = pj.id_staff_ipj
        left join sm_pegawai as peg on peg.id = pj.id_supir_mobil_jenazah
        left join sm_layanan_pendaftaran as lp on lp.id = pj.id_layanan_pendaftaran      
        left join sm_pendaftaran as p on p.id = lp.id_pendaftaran
        left join sm_tenaga_medis as tm on tm.id = lp.id_dokter
        left join sm_pegawai as pw on pw.id = tm.id_pegawai
        left join sm_pasien as pa on pa.id = p.id_pasien
        where pj.id = '" . $id . "'";

        return $this->db->query($sql)->row();
    }

    function getFormIPJByIdLayananPendaftaran($id)
    {

        $sql = "select pj.*, pe.nama as petugas_ipj, pe.nip as nip_petugas_ipj, pe.tgl_lahir as tgl_lahir_petugas, peg.nama as sopir_ambulance, pa.nama as nama_pasien, pa.id as id_pasien, pa.tanggal_lahir as tanggal_lahir_pasien, pa.kelamin as jenis_kelamin, pa.agama as agama_pasien, pa.alamat as alamat_pasien, p.id as id_pendaftaran, pw.nama as nama_dokter, p.nama_pjwb as nama_pjwb, p.nik_pjwb as nik_pjwb, p.kelamin_pjwb as kelamin_pjwb, p.telp_pjwb as telp_pjwb, p.alamat_pjwb as alamat_pjwb, pa.tempat_lahir as tempat_lahir_pasien, pa.telp as telp_pasien
        from sm_pemulasaran_jenazah as pj
        left join sm_pegawai as pe on pe.id = pj.id_staff_ipj
        left join sm_pegawai as peg on peg.id = pj.id_supir_mobil_jenazah
        left join sm_layanan_pendaftaran as lp on lp.id = pj.id_layanan_pendaftaran      
        left join sm_pendaftaran as p on p.id = lp.id_pendaftaran
        left join sm_tenaga_medis as tm on tm.id = lp.id_dokter
        left join sm_pegawai as pw on pw.id = tm.id_pegawai
        left join sm_pasien as pa on pa.id = p.id_pasien
        where pj.id_layanan_pendaftaran = '" . $id . "'";

        return $this->db->query($sql)->row();
    }

    function getDataJenazahById($id)
    {
        return $this->db->select('pjt.*, p.nama as petugas_ipj')
            ->from('sm_pemulasaran_jenazah_tindakan as pjt')
            ->join('sm_pemulasaran_jenazah as pj', 'pj.id = pjt.id_pemulasaran_jenazah')
            ->join('sm_pegawai as p', 'p.id = pj.id_staff_ipj')
            ->where('pjt.id', $id)
            ->get()
            ->result_array();
    }

    function updateSelesaiIPJ($data, $id_layanan_pendaftaran)
    {
        return $this->db->where('id_layanan_pendaftaran', $id_layanan_pendaftaran)
            ->update('sm_pemulasaran_jenazah', $data);
    }

    function updateTanggalKeluar($data, $id)
    {
        return $this->db->where('id', $id)
            ->update('sm_pendaftaran', $data);
    }

    private function updateLastLayanan($id_layanan_pendaftaran)
    {
        $lp = $this->db->select(array('id_pendaftaran'))->where('id', $id_layanan_pendaftaran)->get('sm_layanan_pendaftaran')->row();
        $this->db->select('id')
            ->from('sm_layanan_pendaftaran')
            ->where('id_pendaftaran', $lp->id_pendaftaran)
            ->where('status_terlayani !=', 'Batal')
            ->where('id <>', $id_layanan_pendaftaran)
            ->order_by('id', 'desc')
            ->limit(1, 0);
        $last_lp = $this->db->get()->row();

        $data_update = array(
            'kondisi' => 'Hidup',
            'tindak_lanjut' => null
        );
        $this->db->where('id', $last_lp->id)->update('sm_layanan_pendaftaran', $data_update);
    }

    function pembatalanIPJ($id_layanan_pendaftaran)
    {
        $this->db->trans_begin();
        $this->updateLastLayanan($id_layanan_pendaftaran);

        // ubah juga kondisi menjadi hidup, status terlayani dan tindak lanjut nya jadi batal
        $dataUpdateLayananPendaftaran = array(
            'kondisi' => 'Hidup',
            'status_terlayani' => 'Batal',
            'tindak_lanjut' => 'Batal'
        );
        $this->db->where("id", $id_layanan_pendaftaran, true)->update('sm_layanan_pendaftaran', $dataUpdateLayananPendaftaran);

        if ($this->db->trans_status() === false) :
            $this->db->trans_rollback();
            $status = false;
        else :
            $this->db->trans_commit();
            $status = true;
        endif;

        return $status;
    }
}
