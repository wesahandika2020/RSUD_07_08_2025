<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pendaftaran_poli_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
        $this->datetime = date('Y-m-d H:i:s');
        $this->load->model('masterdata_model');
        $this->load->model('pelayanan/Pelayanan_model', 'pelayanan');
    }

    function getNextNoAntrian($data)
    {
        $query = $this->db->select("max(no_antrian) as no_antrian")
            ->from('sm_layanan_pendaftaran')
            ->where('id_unit_layanan', $data['id_unit'])
            ->where('date(tanggal_layanan)', $data['tanggal'])
            ->get();

        $next_antrian = 0;
        if ($query !== null) :
            $unit = $query->row();
            $next_antrian = $unit->no_antrian + 1;
        else :
            $next_antrian = 1;
        endif;

        return $next_antrian;
    }

    function getDataPasienAntrean($id)
    {
        $this->db->select("p.*, rm.last_update,
                            coalesce(pd.nama, '') as pendidikan,
                            coalesce(pk.nama, '') as pekerjaan")
            ->from('sm_pasien as p')
            ->join('sm_pendidikan as pd', 'pd.id = p.id_pendidikan')
            ->join('sm_pekerjaan as pk', 'pk.id = p.id_pekerjaan', 'left')
            ->join('sm_rekam_medis as rm', 'rm.id = p.id', 'left')
            ->where('p.id', $id, true);
        $data = $this->db->get()->row();
        $this->db->close();
        return $data;
    }

    private function sqlPendaftaranPoliklinik($search, $baru = null, $lama = null, $batal = null)
    {
		if (!empty($search['shifpoli'])) {
            $shifpoli= " AND (jd.shift_poli = '" . $search['shifpoli'] ."' OR jd.id is null)";
        } else {
            $shifpoli= "";
        }
		
        $this->db->select("DISTINCT ON(pd.id) pd.*,
                    CONCAT_WS(' ', COALESCE(p.status_pasien, ''), p.nama) as nama, p.kelamin, p.alamat, p.telp, p.no_identitas,
					coalesce(sp.nama, '') as klinik,
                    coalesce(tr.account, '') as user,
					coalesce(pgu.nama, '') as nama_user,
                    coalesce(pj.nama, '') as penjamin,
                    lp.cara_bayar, lp.id as id_layanan_pendaftaran, 
                    lp.status_terlayani,
                    sp.kode_bpjs, 
                    coalesce(pg.nama, '') as dokter,
                    tm.kode_bpjs as kode_bpjs_dokter,
                    r.id as id_resep,
                    lp.id_dokter,
                    ab.id as id_antrian_bpjs, ab.no_rm id_pasien_antrian_bpjs, ab.kode_booking kode_booking_antrian_bpjs, ab.no_kartu no_kartu_antrian_bpjs, ab.no_referensi, ab.id_jadwal_dokter, 
                    jd.tanggal tanggal_jadwal, jd.nama_poli nama_poli_jadwal, jd.shift_poli, jd.nama_dokter nama_dokter_jadwal ", false);

        $this->db->from('sm_pendaftaran as pd')
            ->join('sm_pasien as p', 'p.id = pd.id_pasien')
            ->join('sm_layanan_pendaftaran as lp', 'lp.id_pendaftaran = pd.id')
            ->join('sm_resep as r', 'r.id_layanan_pendaftaran = lp.id', 'left')
            ->join('sm_spesialisasi as sp', 'sp.id = lp.id_unit_layanan', 'left')
            ->join('sm_translucent as tr', 'tr.id = pd.id_users')
            ->join('sm_pegawai as pgu', 'pgu.id = pd.id_users')
            ->join('sm_penjamin as pj', 'pj.id = lp.id_penjamin', 'left')
            ->join('sm_tenaga_medis as tm', 'tm.id = lp.id_dokter', 'left')
            ->join('sm_pegawai as pg', 'pg.id = tm.id_pegawai', 'left')
            ->join('sm_antrian_bpjs ab', 'pd.id = ab.id_pendaftaran', 'left')
            ->join('sm_jadwal_dokter jd', "jd.id = ab.id_jadwal_dokter", 'left')
            ->where('pd.id is not null '. $shifpoli)
            ->where('lp.konsul', 0);

        // var_dump($search['tanggal_awal']); die;
        if (($search['tanggal_awal'] !== '') & ($search['tanggal_akhir'] !== '')) :
            $this->db->where("pd.tanggal_daftar BETWEEN '" . date2mysql($search['tanggal_awal']) . " 00:00:00' AND '" . date2mysql($search['tanggal_akhir']) . " 23:59:59'");
        endif;

        if (isset($search['id']) && $search['id'] !== '') :
            $this->db->where('pd.id', $search['id'], true);
        endif;

        if ($search['jenis_pendaftaran'] !== '') :
            $this->db->where('pd.jenis_pendaftaran', $search['jenis_pendaftaran'], true);
			
			if($search['jenis_pendaftaran'] === 'Poliklinik') :
                $this->db->where("lp.jenis_layanan in('Poliklinik','Medical Check Up')");

            endif;
        endif;

        if ($search['jenis_igd'] !== '') :
            $this->db->where('pd.jenis_igd', $search['jenis_igd'], true);
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

        if ($search['tanggal_lahir'] !== '') :
            $this->db->where('p.tanggal_lahir', date2mysql($search['tanggal_lahir']), true);
        endif;

        if ($search['alamat'] !== '') :
            $this->db->where("p.alamat ilike '%" . strtolower($search['alamat']) . "%'");
        endif;

        if ($search['layanan'] !== '') :
            $this->db->where('lp.id_unit_layanan', $search['layanan']);
        endif;

        if ($search['status_dilayani'] !== '') :
            $this->db->where('lp.status_terlayani', $search['status_dilayani']);
        endif;

        if ($search['cara_bayar'] !== '') :
            // $this->db->where("lp.cara_bayar ilike '%" . strtolower($search['cara_bayar']) . "%'");
            // $this->db->where("pj.nama ilike '%" . strtolower($search['cara_bayar']) . "%'"); //penjamin

            $this->db->where("(lp.cara_bayar ilike '%" . strtolower($search['cara_bayar']) . "%' OR pj.nama ilike '%" . strtolower($search['cara_bayar']) . "%')");
        endif;

		if ($search['penjamin'] !== '') :
            $this->db->where('pj.id', $search['penjamin']);
        endif;
		
        if ($search['user'] !== '') :
            // $this->db->where('tr.account', $search['user']);
			$this->db->where("pgu.nama ilike '%" . strtolower($search['user']) . "%'");
        endif;

        if ($baru !== null) :
            $this->db->where('pd.status', 'Baru');
        endif;

        if ($lama !== null) :
            $this->db->where('pd.status', 'Lama');
        endif;

        if ($batal !== null) :
            $this->db->where('pd.status', 'Batal');
        endif;

        return $this->db->order_by('pd.id, pd.tanggal_daftar', 'desc');
        // return $this->db->group_by('pd.id, p.nama, p.kelamin, p.alamat, sp.nama, tr.account, pj.nama, lp.cara_bayar, lp.no_sep, lp.id, sp.kode_bpjs');
    }

    private function _listPendaftaranPoliklinik($limit = 0, $start = 0, $search)
    {
        $this->sqlPendaftaranPoliklinik($search);
        if ($limit !== 0) :
            $this->db->limit($limit, $start);
        endif;

        return $this->db->get()->result();
    }

    function getListDataPendaftaranPoliklinik($limit = 0, $start = 0, $search)
    {
		$data_pendaftaran = $this->_listPendaftaranPoliklinik($limit, $start, $search);
        foreach ($data_pendaftaran as $value) {     
            $value->cek_kode_booking = ($value->kode_booking == $value->kode_booking_antrian_bpjs);
            $value->cek_id_pasien    = ($value->id_pasien  == $value->id_pasien_antrian_bpjs ? true : false);
            $value->cek_no_polish    = ($value->no_polish == $value->no_kartu_antrian_bpjs ? true : false);
            $value->cek_no_rujukan   = ($value->no_rujukan == $value->no_referensi ? true : false);         
        }

        $result['data']   = $data_pendaftaran;
        $result['jumlah'] = $this->sqlPendaftaranPoliklinik($search)->get()->num_rows();
        $result['pasien_baru'] = $this->sqlPendaftaranPoliklinik($search, $baru = 'Baru', $lama = null, $batal = null)->get()->num_rows();
        $result['pasien_lama'] = $this->sqlPendaftaranPoliklinik($search, $baru = null, $Lama = 'Lama', $batal = null)->get()->num_rows();
        $result['pasien_batal'] = $this->sqlPendaftaranPoliklinik($search, $baru = null, $lama = null, $batal = 'Batal')->get()->num_rows();
        return $result;

        $this->db->close();
    }


    function simpanEditKlinik($id_layanan_pendaftaran, $update)
    {
        // update id_jadwal_dokter
		$id_jadawal_dokter = safe_post('id_jadwal_dokter');
		$id_antrian_bpjs = $this->db->query("select sab.id
											from sm_layanan_pendaftaran as slp
											join sm_pendaftaran as sp on sp.id = slp.id_pendaftaran
											join sm_antrian_bpjs as sab on sab.id_pendaftaran = sp.id
											where slp.id = $id_layanan_pendaftaran")->row()->id;
		$this->db->where('id', $id_antrian_bpjs)->update('sm_antrian_bpjs', ['id_jadwal_dokter' => $id_jadawal_dokter]);

        $status = true;
        $this->db->trans_begin();
        $lp = $this->db->select('id_unit_layanan, id_dokter, id_unit_layanan')->where('id', $id_layanan_pendaftaran)->get('sm_layanan_pendaftaran')->row();
        $klinik_before = $this->masterdata_model->getSpesialisasi($update['id_unit_layanan']);
        $catatan = "Sebelum edit : Klinik " . $klinik_before->nama;
        $this->db->where('id', $id_layanan_pendaftaran)->update('sm_layanan_pendaftaran', $update);
        $klinik_after = $this->masterdata_model->getSpesialisasi($update['id_unit_layanan']);
        $catatan .= "<br>Setelah edit : Klinik " . $klinik_after->nama;
        $layanan_konsul = $this->db->get('sm_tarif_konsul_pasien')->result();
        $array_layanan_konsul = [];
        foreach ($layanan_konsul as $key => $value) :
            array_push($array_layanan_konsul, $value->id_layanan);
        endforeach;

        /*
        // update jadwal dokter
        $jadwal_dokter = $this->db->get_where('sm_jadwal_dokter', [
            'id_dokter' => $update['id_dokter'],
            'id_poli'   => $update['id_unit_layanan'],
            'tanggal'   => date('Y-m-d')
        ])->row();

        $jadwal_dokter_lama = $this->db->get_where('sm_jadwal_dokter', [
            'id_dokter' => $lp->id_dokter,
            'id_poli'   => $lp->id_unit_layanan,
            'tanggal'   => date('Y-m-d')
        ])->row();

        $this->db->where('id_dokter', $update['id_dokter'])
            ->where('id_poli', $update['id_unit_layanan'])
            ->where('tanggal', date('Y-m-d'))
            ->update('sm_jadwal_dokter', ['jml_kunjung' => $jadwal_dokter->jml_kunjung + 1]);

        $this->db->where('id_dokter', $lp->id_dokter)
            ->where('id_poli', $lp->id_unit_layanan)
            ->where('tanggal', date('Y-m-d'))
            ->update('sm_jadwal_dokter', ['jml_kunjung' => $jadwal_dokter_lama->jml_kunjung - 1]);

        $this->db->select('ttp.id')
            ->from('sm_tarif_tindakan_pasien as ttp')
            ->join('sm_tarif_pelayanan as tp', 'tp.id = ttp.id_tarif_pelayanan')
            ->where('ttp.id_layanan_pendaftaran', $id_layanan_pendaftaran)
            ->where('tp.id_layanan in (' . implode(",", $array_layanan_konsul) . ')');
        $tarif = $this->db->get()->result();

        $update_dpjp = ['id_operator' => $update['id_dokter']];
        foreach ($tarif as $key => $value) :
            $this->db->where('id', $value->id)->update('sm_tarif_tindakan_pasien', $update_dpjp);
        endforeach;

        if ($this->db->trans_status() === FALSE) :
            $this->db->trans_rollback();
            $status = false;
        else :
            $this->db->trans_commit();
            $status = true;
            $this->load->model('logs/Logs_model', 'm_logs');
            $this->m_logs->recordAdminLogs($id_layanan_pendaftaran, 'Edit Klinik', $catatan);
        endif;
        return $status;*/

        $tgl            = date('Y-m-d');
        $id_poli_lama   = $lp->id_unit_layanan;
        $id_dokter_lama = $lp->id_dokter;
        $id_poli_baru   = $update['id_unit_layanan'];
        $id_dokter_baru = $update['id_dokter'];

        $ubahJadwal = $this->pelayanan->ubahJadwalDokter($tgl, $id_poli_lama, $id_dokter_lama, $id_poli_baru, $id_dokter_baru);

        if ($ubahJadwal) {
            $this->db->select('ttp.id')
                ->from('sm_tarif_tindakan_pasien as ttp')
                ->join('sm_tarif_pelayanan as tp', 'tp.id = ttp.id_tarif_pelayanan')
                ->where('ttp.id_layanan_pendaftaran', $id_layanan_pendaftaran)
                ->where('tp.id_layanan in (' . implode(",", $array_layanan_konsul) . ')');
            $tarif = $this->db->get()->result();

            $update_dpjp = ['id_operator' => $update['id_dokter']];
            foreach ($tarif as $key => $value) :
                $this->db->where('id', $value->id)->update('sm_tarif_tindakan_pasien', $update_dpjp);
            endforeach;

            if ($this->db->trans_status() === FALSE) :
                $this->db->trans_rollback();
                $status = false;
            else :
                $this->db->trans_commit();
                $status = true;
                $this->load->model('logs/Logs_model', 'm_logs');
                $this->m_logs->recordAdminLogs($id_layanan_pendaftaran, 'Edit Klinik', $catatan);
            endif;
        } else {
            $status = false;
        }

        return $status;
    }

    function dataJenisPenjamin($id)
    {
        $this->db->select("sp.nama")
            ->from('sm_penjamin as sp')
            ->where('sp.id', $id, true);
        $result = $this->db->get()->row();
        $this->db->close();
        return $result;
    }

    function getAutoDokterSpesialisasi($q, $id_dokter, $start, $limit)
    {
        $where  = '';
        $limit  = " limit " . $limit . " offset " . $start;
        $select = "select jd.nama_dokter as nama, s.nama as spesialisasi, jd.id_dokter as id,jd.kode_bpjs_dokter, jd.kuota, jd.jml_kunjung, jd.id as id_jadwal_dokter, jd.shift_poli ";
        $count  = "select count(jd.id) as count ";
        $sql    = "from sm_jadwal_dokter as jd
                join sm_spesialisasi as s on jd.id_poli = s.id
                where jd.nama_dokter ilike ('%$q%') and date(tanggal)='" . date('Y-m-d') . "'";

        if ($id_dokter !== '') {
            $where = ' and jd.id_poli =' . $id_dokter;
        }

        $order = ' order by jd.nama_dokter asc';

        // echo $select . $sql . $where . $order . $limit; die;

        $data['data']  = $this->db->query($select . $sql . $where . $order . $limit)->result();
        foreach ($data['data'] as $item) {
            if (abs($item->kuota - $item->jml_kunjung) === 0) {
                $item->disabled = true;
            }
        }
        $data['total'] = $this->db->query($count . $sql . $where)->row()->count;

        return $data;
    }

    public function getSuratPersetujuanRawatInap($id_layanan_pendaftaran)
    {
        return $this->db->from('sm_form_persetujuan_rawat_inap')->where('id_layanan_pendaftaran', $id_layanan_pendaftaran)->get()->row();
    }


    public function getIdentitasPasien($id_pendaftaran)
    {
        return $this->db->select("p.no_identitas as no_ktp,
	       p.nama,
	       p.id as no_rm,
	       case when p.kelamin = 'P' then 'Perempuan' else 'Laki-laki' end as kelamin,
	       p.tempat_lahir,
	       to_char(p.tanggal_lahir, 'DD/MM/YYYY') as tanggal_lahir,
	       p.agama,
	       p.telp      as no_telp,
	       pk.nama     as pekerjaan,
	       p.alamat,
	       p.nama_prop as provinsi,
	       p.nama_kab  as kabupaten,
	       p.nama_kec  as kecamatan,
	       p.nama_kel  as kelurahan,
	       pend.nama   as pendidikan,
	       p.no_rt,
	       p.no_rw,
	       pj.nama     as penjamin,
	       p.status_kawin,
	       sp.jenis_pendaftaran as jenis_pendaftaran,
	       coalesce(p.nama_ibu, p.nama_ayah) as nama_keluarga
	       ")
            ->from('sm_pasien p')
            ->join('sm_pendaftaran sp', 'p.id = sp.id_pasien')
            ->join('sm_pekerjaan pk', 'p.id_pekerjaan = pk.id')
            ->join('sm_pendidikan pend', 'p.id_pendidikan = pend.id')
            ->join('sm_penjamin pj', 'sp.id_penjamin = pj.id')
            ->where('sp.id', $id_pendaftaran)
            ->get()->row();
    }

    // case when fpu.is_pasien = '0' then fpu.no_rt else pa.no_rt::integer end as no_rt, 
    // case when fpu.is_pasien = '0' then fpu.no_rw else pa.no_rw::integer end as no_rw,
    public function getPersetujuanUmumById($id){
        $sql = "select fpu.*, pa.nama as nama_pasien, pd.no_register,
       			to_char(pa.tanggal_lahir, 'DD/MM/YYYY') as tanggal_lahir_pasien, 
       			pa.kelamin as kelamin_pasien, pa.id as no_rm,
       			date_part('year',age(pa.tanggal_lahir)) as umur_pasien,
       			case when fpu.is_pasien = '0' then fpu.nama_keluarga else pa.nama end as nama_keluarga,
       			case when fpu.is_pasien = '0' then fpu.jenis_kelamin::varchar else pa.kelamin::varchar end as jenis_kelamin,
       			case when fpu.is_pasien = '0' then fpu.tanggal_lahir else pa.tanggal_lahir end as tanggal_lahir,
       			case when fpu.is_pasien = '0' then date_part('year',age(fpu.tanggal_lahir)) else date_part('year',age(pa.tanggal_lahir)) end as umur,
       			case when fpu.is_pasien = '0' then fpu.alamat else pa.alamat end as alamat,
                case when fpu.is_pasien = '0' then fpu.no_rt::VARCHAR else COALESCE(NULLIF(pa.no_rt, ''), '')::VARCHAR end as no_rt, 
                case when fpu.is_pasien = '0' then fpu.no_rw::VARCHAR else COALESCE(NULLIF(pa.no_rw, ''), '')::VARCHAR end as no_rw,
       			case when fpu.is_pasien = '0' then fpu.provinsi::varchar else pa.nama_prop::varchar end as provinsi,
       			case when fpu.is_pasien = '0' then fpu.kota::varchar else pa.nama_kab::varchar end as kota,
       			case when fpu.is_pasien = '0' then fpu.kecamatan::varchar else pa.nama_kec::varchar end as kecamatan,
       			case when fpu.is_pasien = '0' then fpu.kelurahan::varchar else pa.nama_kel::varchar end as kelurahan,
				case when fpu.is_pasien = '0' then fpu.no_identitas else pa.no_identitas end as no_identitas,
				case when fpu.is_pasien = '0' then fpu.no_hp else pa.telp end as no_hp, fpu.hubungan_keluarga, peg.nama as nama_petugas,
				kab.\"NAMA_KAB\" as nama_kabupaten, kec.\"NAMA_KEC\" as nama_kecamatan, kel.\"NAMA_KEL\" as nama_kelurahan
				from sm_form_persetujuan_umum fpu 
				join sm_layanan_pendaftaran lp ON fpu.id_layanan_pendaftaran = lp.id
				join sm_pendaftaran pd ON lp.id_pendaftaran = pd.id
				join sm_pasien pa ON pd.id_pasien = pa.id
				join sm_pegawai peg ON fpu.id_user = peg.id
				left join sm_opendata_kabupaten kab on fpu.kota = kab.\"NO_KAB\" and kab.\"NO_KAB\" = fpu.kota and kab.\"NO_PROP\" = fpu.provinsi
				left join sm_opendata_kecamatan kec on fpu.kecamatan = kec.\"NO_KEC\" and kec.\"NO_KEC\" = fpu.kecamatan and kec.\"NO_PROP\" = fpu.provinsi and kec.\"NO_KAB\" = fpu.kota
				left join sm_opendata_kelurahan kel on fpu.kelurahan = kel.\"NO_KEL\" and kel.\"NO_KEL\" = fpu.kelurahan and kel.\"NO_PROP\" = fpu.provinsi and kel.\"NO_KAB\" = fpu.kota and kel.\"NO_KEC\" = fpu.kecamatan
				where fpu.id_layanan_pendaftaran = '" . $id . "' ";

        return $this->db->query($sql)->row();
    }

    public function getRingkasanRiwayatMasukDanKeluarById($id)
    {
        $data =  $this->db->select("frrmdk.*, peg.nama as user, peg1.nama as nama_dpjp_utama_1, peg2.nama as nama_dpjp_utama_2, peg3.nama as nama_dpjp_utama_3
		, peg4.nama as nama_dpjp_utama_4, peg5.nama as nama_dpjp_tambahan_1, peg6.nama as nama_dpjp_tambahan_2, peg7.nama as nama_dpjp_tambahan_3, peg8.nama as nama_dpjp_tambahan_4,
		p.nama as nama_pasien, p.id as no_rm, to_char(p.tanggal_lahir, 'DD/MM/YYYY') as tanggal_lahir, ri.waktu_masuk as tanggal_masuk, ri.waktu_keluar as tanggal_keluar,
		date_part('year',age(p.tanggal_lahir)) as umur_pasien, concat (EXTRACT(year FROM AGE(p.tanggal_lahir)), ' thn ', EXTRACT(month FROM AGE(p.tanggal_lahir)), ' bln ', EXTRACT(day FROM AGE(p.tanggal_lahir)), ' hari') as umur,
		p.agama, p.tanggal_lahir, p.status_kawin, p.kelamin, bg.nama as bangsal, k.nama as kelas, pj.nama as penjamin, pp.berat_badan, lp.tindak_lanjut as status_pulang,
		concat_ws ('. ', ( SELECT gss.kode_icdx_rinci FROM sm_golongan_sebab_sakit AS gss WHERE gss.id = d.id_pengkodean ), ( SELECT gss.kode_icdx_rinci FROM sm_golongan_sebab_sakit AS gss WHERE gss.id = d.id_pengkodean_asterik ), gss.nama ) AS diag_awal,
		pp.is_died")
            ->from('sm_form_ringkasan_riwayat_masuk_dan_keluar frrmdk')
            ->join('sm_pegawai peg', 'frrmdk.id_user = peg.id')
            ->join('sm_tenaga_medis tm1', 'frrmdk.dpjp_utama_1 = tm1.id', 'left')
            ->join('sm_pegawai peg1', 'tm1.id_pegawai = peg1.id', 'left')
            ->join('sm_tenaga_medis tm2', 'frrmdk.dpjp_utama_2 = tm2.id', 'left')
            ->join('sm_pegawai peg2', 'tm2.id_pegawai = peg2.id', 'left')
            ->join('sm_tenaga_medis tm3', 'frrmdk.dpjp_utama_3 = tm3.id', 'left')
            ->join('sm_pegawai peg3', 'tm3.id_pegawai = peg3.id', 'left')
            ->join('sm_tenaga_medis tm4', 'frrmdk.dpjp_utama_4 = tm4.id', 'left')
            ->join('sm_pegawai peg4', 'tm4.id_pegawai = peg4.id', 'left')
            ->join('sm_tenaga_medis tm5', 'frrmdk.dpjp_tambahan_1 = tm5.id', 'left')
            ->join('sm_pegawai peg5', 'tm5.id_pegawai = peg5.id', 'left')
            ->join('sm_tenaga_medis tm6', 'frrmdk.dpjp_tambahan_2 = tm6.id', 'left')
            ->join('sm_pegawai peg6', 'tm6.id_pegawai = peg6.id', 'left')
            ->join('sm_tenaga_medis tm7', 'frrmdk.dpjp_tambahan_3 = tm7.id', 'left')
            ->join('sm_pegawai peg7', 'tm7.id_pegawai = peg7.id', 'left')
            ->join('sm_tenaga_medis tm8', 'frrmdk.dpjp_tambahan_4 = tm8.id', 'left')
            ->join('sm_pegawai peg8', 'tm8.id_pegawai = peg8.id', 'left')
            ->join('sm_layanan_pendaftaran lp', 'frrmdk.id_layanan_pendaftaran = lp.id')
            ->join('sm_penjamin pj', 'lp.id_penjamin = pj.id', 'left')
            ->join('sm_pendaftaran pd', 'lp.id_pendaftaran = pd.id')
            ->join('sm_pasien p', 'pd.id_pasien = p.id')
            ->join('sm_rawat_inap ri', 'lp.id = ri.id_layanan_pendaftaran', 'left')
            ->join('sm_kelas k', 'ri.id_kelas = k.id', 'left')
            ->join('sm_bangsal bg', 'ri.id_bangsal = k.id', 'left')
            ->join('sm_profil_pasien pp', 'p.id = pp.id_pasien', 'left')
            ->join('sm_diagnosa d', 'lp.id = d.id_layanan_pendaftaran', 'left')
            ->join('sm_golongan_sebab_sakit gss', "gss.id = d.id_golongan_sebab_sakit and d.prioritas = 'Utama'", 'left')
            ->where('frrmdk.id_layanan_pendaftaran', $id)
            ->get()->result();

        foreach ($data as $value) {
            $value->diagnosa_utama             = $this->getDiagnosaListLaporanByIdLayananPendaftaran($value->id_layanan_pendaftaran, 'Utama');
            $value->diagnosa_sekunder          = $this->getDiagnosaListLaporanByIdLayananPendaftaran($value->id_layanan_pendaftaran, 'Sekunder');
            $value->tindakan_utama             = $this->getODCByIdLayananPendaftaran($value->id_layanan_pendaftaran);
            $value->tindakan_sekunder          = $this->getTindakanOperasiByIdLayananPendaftaran($value->id_layanan_pendaftaran);
            $value->layanan_before             = $this->m_pelayanan->getLayananSpesialisasiBefore($value->id_layanan_pendaftaran);
            $value->diagnosa_penyebab_kematian = [];
            if ($value->is_died !== null && $value->is_died === 'Ya') {
                $value->diagnosa_penyebab_kematian = $this->getListDiagnosaPenyebabKematian($value->id_layanan_pendaftaran);
            }
        }

        return $data;
    }

    public function getDiagnosaListLaporanByIdLayananPendaftaran($id_layanan_pendaftaran, $prioritas)
    {
        $sql = "select
				concat(concat(case when gs2.kode_icdx_rinci is null then '' else ' [' end, gs2.kode_icdx_rinci, gs3.kode_icdx_rinci, case when gs2.kode_icdx_rinci is null then '' else '] ' end), case when d.id_golongan_sebab_sakit is not null then gs.nama else d.golongan_sebab_sakit_lain end) AS diagnosa
				FROM sm_layanan_pendaftaran AS lp
				LEFT JOIN sm_diagnosa AS d ON ( d.id_layanan_pendaftaran = lp.ID )
				LEFT JOIN sm_golongan_sebab_sakit AS gs ON ( gs.ID = d.id_golongan_sebab_sakit )
				LEFT JOIN sm_golongan_sebab_sakit AS gs2 ON ( gs2.ID = d.id_pengkodean )
				LEFT JOIN sm_golongan_sebab_sakit AS gs3 ON ( gs3.ID = d.id_pengkodean_asterik )
				WHERE lp.id = $id_layanan_pendaftaran ORDER BY d.prioritas desc";

        return $this->db->query($sql)->result();
    }

    public function getODCByIdLayananPendaftaran($id_layanan_pendaftaran)
    {
        return $this->db->select("l.nama as operasi")
            ->from('sm_jadwal_kamar_operasi jko')
            ->join('sm_tarif_pelayanan tp', 'tp.id = jko.id_tarif', 'left')
            ->join('sm_layanan as l', 'l.id = tp.id_layanan', 'left')
            ->where('jko.id_layanan_pendaftaran', $id_layanan_pendaftaran)
            ->where('jko.layanan', 'OK')
            ->get()->result();
    }

    public function getTindakanOperasiByIdLayananPendaftaran($id_layanan_pendaftaran)
    {
        return $this->db->select("l.nama as layanan")
            ->from('sm_tarif_tindakan_pasien ttp')
            ->join('sm_tarif_pelayanan tp', 'tp.id = ttp.id_tarif_pelayanan', 'left')
            ->join('sm_layanan as l', 'l.id = tp.id_layanan', 'left')
            ->where('ttp.id_layanan_pendaftaran', $id_layanan_pendaftaran)
            ->get()->result();
    }

    function getTataTertibById($id)
    {
        $sql = "select ftt.*, pa.nama as nama_pasien, pa.kelamin as kelamin_pasien, pd.id_pasien, pa.tanggal_lahir as tanggal_lahir_pasien, pa.telp, (SELECT CONCAT(bg.nama, ' kelas ', k.nama, ' ruang ', ri.no_ruang, ' No. Bed ', ri.no_bed) FROM sm_rawat_inap as ri JOIN sm_layanan_pendaftaran as lpd ON lpd.id = ri.id_layanan_pendaftaran JOIN sm_bangsal as bg ON bg.id = ri.id_bangsal JOIN sm_kelas as k ON k.id= ri.id_kelas WHERE ri.id_layanan_pendaftaran = '" . $id . "') AS asal_ruangan
				from sm_form_tata_tertib ftt 							
				join sm_layanan_pendaftaran lp ON ftt.id_layanan_pendaftaran = lp.id
				join sm_pendaftaran pd ON lp.id_pendaftaran = pd.id
				join sm_pasien pa ON pd.id_pasien = pa.id
				where ftt.id_layanan_pendaftaran = '" . $id . "' ";

        return $this->db->query($sql)->row();
    }

    function getEdukasi($id_layanan_pendaftaran)
    {
        $sql = "select edu.*, ('') as detail,
                tr.account as user
                from sm_edukasi as edu
                join sm_layanan_pendaftaran as lp on (edu.id_layanan_pendaftaran = lp.id) 
                join sm_translucent as tr on (tr.id = edu.id_user)
                where lp.id_pendaftaran = '" . $id_layanan_pendaftaran . "'";

        //	    left join sm_tenaga_medis as tm on (tm.id = edud.id_edukator)

        $data = $this->db->query($sql)->row();
        if ($data) :
            $result = array();
            $sql = "select edud.*, topedu.nama as topik_edukasi, topedu.keterangan, pgedu.nama as edukator
                    from sm_detail_edukasi as edud 
                    join sm_topik_edukasi as topedu on (topedu.id = edud.id_topik_edukasi) 
                    left join sm_pegawai as pgedu on (pgedu.id = edud.id_edukator) 
                    where edud.id_edukasi = '" . $data->id . "' 
                    order by edud.created_date asc";
            $result = $this->db->query($sql)->result();
            if ($result) :
                $data->detail = $result;
            endif;
        endif;

        return $data;
    }
}

/* End of file Pendaftaran_poliklinik_model.php */
