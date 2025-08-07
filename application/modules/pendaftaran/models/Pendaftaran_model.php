<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pendaftaran_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
        $this->datetime = date('Y-m-d H:i:s');
        $this->load->model('pelayanan/Pelayanan_model', 'm_pelayanan');
    }


    function getLastNoRm()
    {
        $sql = "select id from sm_pasien
                where id like '0%'
                order by id desc limit 1 offset 0  ";

        $no_max = $this->db->query($sql)->row();

        $no_rm = "";
        if ($no_max) {
            // running kode
            $last = ltrim($no_max->id, 0);
            $last += 1;

            $no_rm = str_pad($last, 8, 0, STR_PAD_LEFT);
        } else {
            // Entri Baru, mulai dari 000001
            $no_rm = "00000001";
        }

        return $no_rm;
    }

    function generateNoRegister()
    {
        $format = date('y') . date('m') . date('d');

        $sql = "select no_register from sm_pendaftaran
                where date(tanggal_daftar) = '" . date('Y-m-d') . "'
                order by id desc limit 1 offset 0 ";

        $query = $this->db->query($sql)->row();
        if ($query) {
            // format 150101xxxx
            $last_no_reg = ltrim(substr($this->db->query($sql)->row()->no_register, 6, 4), 0) + 1;
        } else {
            $last_no_reg = "0001";
        }

        return $format . str_pad($last_no_reg, 4, "0", STR_PAD_LEFT);
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

    function cekStatusKunjunganPasien($id_pasien)
    {
        $status = "Tidak Aktif";
        $query = $this->db->select('tanggal_keluar')
            ->from('sm_pendaftaran')
            ->where('id_pasien', $id_pasien)
            ->order_by('id', 'desc')
            ->limit('1', '0')
            ->get()
            ->row();

        if ($query) :
            if ($query->tanggal_keluar === null) :
                $status = 'Aktif';
            else :
                $status = 'Tidak Aktif';
            endif;
        else :
            $status = 'Tidak Aktif';
        endif;

        return $status;
    }

    function getJenisPendaftaranPasien($id_pasien)
    {
        // return $this->db->query("select keterangan, tanggal_daftar from sm_pendaftaran where id_pasien = '$id_pasien' and tanggal_keluar is null")->row();
        return $this->db->query("select pd.keterangan, pd.tanggal_daftar, lp.status_terlayani
                                from sm_pendaftaran pd 
                                left join sm_layanan_pendaftaran lp ON pd.id=lp.id_pendaftaran
                                where pd.id_pasien = '$id_pasien' 
                                and pd.tanggal_keluar is null
                                order by pd.id desc, lp.id desc")->row();
    }

    function checkPasien($data)
    {
        $this->db->select('id, nama')
            ->from('sm_pasien')
            ->where('id is not null');

        if ($data['nama'] !== '') :
            $this->db->where('nama', $data['nama']);
        endif;

        if ($data['kelamin'] !== '') :
            $this->db->where('kelamin', $data['kelamin']);
        endif;

        if ($data['tanggal_lahir'] !== '') :
            $this->db->where('tanggal_lahir', $data['tanggal_lahir']);
        endif;

        if ($data['no_identitas'] !== '') :
            $this->db->where('no_identitas', $data['no_identitas']);
        endif;

        $query = $this->db->get()->row();

        if ($query) :
            // Pasien sudah terdaftar
            $status = true;
            $message = 'Pasien <b>' . $query->nama . '</b> telah terdaftar dengan No. Rekam Medis <b>' . $query->id . '</b>';
        else :
            $status = false;
            $message = 'Pasien belum terdaftar. Silahkan lanjutkan proses pendaftaran';
        endif;

        return ['status' => $status, 'message' => $message];
    }

    function getStatusPasien($no_rm)
    {
        $data = $this->db->select('count(*) as jumlah')->from('sm_pendaftaran')->where('id_pasien', $no_rm, true)->get()->row();
        $status = 'Baru';

        if ($data !== null) :
            if ($data->jumlah > 0) :
                $status = 'Lama';
            endif;
        endif;

        return $status;
    }

    // Pendaftaran

    function simpanDataPendaftaran($data_pendaftaran)
    {
        $this->db->insert('sm_pendaftaran', $data_pendaftaran);
        $id = $this->db->insert_id();
        $resume = array('id' => $id, 'id_diagnosa' => NULL);
        $this->db->insert('sm_resume_kunjungan', $resume);
        return $id;
    }

    function getConfigBPJSV2()
    {
        return $this->db->where('id', '1')->get('sm_konfigurasi_bpjs_antrean')->row();
    }

    function createHeader($bpjs_config)
    {
        $sign = $this->getSignatureBPJS($bpjs_config);
        return array(
            'X-Cons-ID:' . $bpjs_config->cons_id,
            'X-Timestamp:' . $sign->timestamp,
            'X-Signature:' . $sign->signature,
            'User_Key:' . $bpjs_config->user_key,
            'Content-type: application/json'
        );
    }

    function getAutoBPJSSpesialisasi($id_spesialisasi, $id_dokter)
    {

        $this->db->select("tm.*, pg.nama as dokter, coalesce(sp.nama, '-') as spesialisasi, case when jml.jml_terlayani<>'' then jml.jml_terlayani else '(0/0)' end jml_terlayani")
            ->from('sm_tenaga_medis as tm')
            ->join('sm_pegawai as pg', 'pg.id = tm.id_pegawai')
            ->join('sm_spesialisasi as sp', 'sp.id = tm.id_spesialisasi', 'left')
            ->join(" (select sld.id_dokter,
                    concat('(',count(sld.status_terlayani) FILTER (where sld.status_terlayani='Sudah'),
                    '/',count(sld.status_terlayani),')' ) jml_terlayani
                    from sm_layanan_pendaftaran sld left join sm_spesialisasi ss on (ss.id = sld.id_unit_layanan) where to_char(sld.tanggal_layanan, 'DD-MM-YYYY')=to_char(NOW(), 'DD-MM-YYYY')
                    and sld.konsul=0 and ss.kode_bpjs= '" . $id_spesialisasi . "' and sld.jenis_layanan='Poliklinik'
                    GROUP BY sld.id_dokter, ss.id) as jml", 'jml.id_dokter=tm.id', 'left')
            ->where('sp.kode_bpjs', $id_spesialisasi);

        if (!empty($id_dokter)) {

            $this->db->where('tm.kode_bpjs', $id_dokter);
            $data = $this->db->get()->row();
        } else {

            $data = $id_spesialisasi !== 'KB' ? $this->db->get()->result() : $this->db->get()->row();
        }

        return $data;
    }

    function getPasienAntrian($id)
    {
        $this->db->select("p.*, ab.kode_bpjs_dokter, ab.kode_bpjs_poli, ab.status_jkn, ab.no_kartu, ab.no_referensi,
                            coalesce(pd.nama, '') as pendidikan,    
                            coalesce(pk.nama, '') as pekerjaan")
            ->from('sm_pasien as p')
            ->join('sm_pendidikan as pd', 'pd.id = p.id_pendidikan')
            ->join('sm_pekerjaan as pk', 'pk.id = p.id_pekerjaan', 'left')
            ->join('sm_antrian_bpjs as ab', 'ab.no_rm = p.id', 'left')
            ->where('ab.id', $id, true);
        // $this->db->get(); echo $this->db->last_query(); exit();  
        $result = $this->db->get()->row();
        $this->db->close();
        return $result;
    }

    function getIdAntrean($kode)
    {
        return $this->db->select("ab.*, sp.nama as poli, pg.nama as nama_dokter, ab.status_jkn, ab.no_kartu, ab.no_referensi")
            ->from('sm_antrian_bpjs as ab')
            ->join('sm_spesialisasi as sp', 'sp.id = ab.nama_poli', 'left')
            ->join('sm_translucent as cr', 'cr.id = ab.user_create', 'left')
            ->join('sm_translucent as ur', 'ur.id = ab.user_update', 'left')
            ->join('sm_tenaga_medis as tm', 'tm.id = ab.id_dokter', 'left')
            ->join('sm_pegawai as pg', 'pg.id = tm.id_pegawai', 'left')
            ->where('ab.kode_booking', $kode, true)
            ->get()
            ->row();
        $this->db->close();
    }

    function getKodeBookingPendaftaran($kode)
    {
        return $this->db->select("p.kode_booking, sp.nama")
            ->from('sm_pendaftaran as p')
            ->join('sm_pasien as sp', 'sp.id = p.id_pasien', 'left')
            ->where('p.kode_booking', $kode, true)
            ->get()
            ->row();
        $this->db->close();
    }

    function dateSepPendaftaran($dt)
    {
        $var = explode(" ", $dt);
        $var1 = $var[0];

        return $var1;
    }

    function getNoSep($rm, $tanggal)
    {
        return $this->db->select("sh.no_sep")
            ->from('sm_history_sep as sh')
            ->where('sh.no_rm', $rm, true)
            ->where("sh.tanggal_sep BETWEEN '" . $this->dateSepPendaftaran($tanggal) . " 00:00:00' AND '" . $this->dateSepPendaftaran($tanggal) . " 23:59:59'")
            ->order_by('sh.id', 'desc')
            ->limit('1', '0')
            ->get()
            ->row();
        $this->db->close();
    }

    function getResponseBPJS($kode, $task)
    {
        return $this->db->select("ut.*")
            ->from('sm_update_task_bpjs as ut')
            ->where('ut.kode_booking', $kode, true)
            ->where('ut.nomor_task', $task, true)
            ->get()
            ->row();
        $this->db->close();
    }

    function getSignatureBPJS($config)
    {
        $cid = $config->cons_id;
        $skey = $config->secret_key;

        // get timestamp
        // date_default_timezone_set("Asia/Jakarta");
        // $timestamp = strtotime(date("Y/m/d H:i:s"));

        date_default_timezone_set("UTC");
        $timestamp = strval(time() - strtotime("1970-01-01 00:00:00"));

        // set data value
        $data = $cid . "&" . $timestamp;

        // generate signature
        $signature = hash_hmac('sha256', $data, $skey, true);
        $encodedSignature = base64_encode($signature);

        // urlencode...
        // $encodedSignature = urlencode($encodedSignature);
        $data = array(
            'timestamp' => $timestamp,
            'signature' => $encodedSignature
        );

        return (object)$data;
        //return strtotime(date("Y-m-d H:i:s")) * 1000;
    }

    function simpanDataLayananPendaftaran($params)
    {
        $this->db->insert('sm_layanan_pendaftaran', $params);
        $id = $this->db->insert_id();
        $update = array('id_layanan_pendaftaran' => $id);
        $this->db->where('id', $params['id_pendaftaran'])->update('sm_resume_kunjungan', $update);

        if ($params['jenis_layanan'] === 'IGD' | $params['jenis_layanan'] === 'Rawat Inap' | $params['jenis_layanan'] === 'Intensive Care' | $params['jenis_layanan'] === 'Hemodialisa' | $params['jenis_layanan'] === 'Pemulasaran Jenazah') :
            $pmb = array(
                'jenis_transaksi'        => $params['jenis_layanan'],
                'id_pendaftaran'         => $params['id_pendaftaran'],
                'id_layanan_pendaftaran' => $id,
                'status'                 => 'Tagihan'
            );
            $this->db->insert('sm_pembayaran', $pmb);
        endif;

        if ($params['jenis_layanan'] === 'Rawat Inap') :
            $pd_ri = array('jenis_rawat' => 'Inap', 'keterangan' => 'Rawat Inap');
            $this->db->where('id', $params['id_pendaftaran'])->update('sm_pendaftaran', $pd_ri);
        endif;

        if ($params['jenis_layanan'] === 'Intensive Care') :
            $pd_ri = array('jenis_rawat' => 'Inap', 'keterangan' => 'Intensive Care');
            $this->db->where('id', $params['id_pendaftaran'])->update('sm_pendaftaran', $pd_ri);
        endif;

        if ($params['jenis_layanan'] === 'Hemodialisa') :
            $data_hd = array('id_layanan_pendaftaran' => $id, 'waktu_order' => $this->datetime, 'waktu' => $this->datetime);
            $this->db->insert('sm_hemodialisa', $data_hd);
        endif;

        return $id;
    }

    
    // SPPIP TAMBAHIN date_part('year',age(p.tanggal_lahir)) as umur_pasien,
    function getPendaftaranDetail($id_pendaftaran, $id_layanan_pendaftaran = null)
    {
        // Data Pendaftaran Pasien
        $this->db->select("pd.*,
                            p.id as no_rm, p.rm_lama, p.nama, p.kelamin, p.alamat, p.telp, p.agama,
                            p.no_identitas, p.alergi, p.rm_lama, p.status_kawin,
                            date_part('year',age(p.tanggal_lahir)) as umur_pasien,
                            p.tanggal_lahir, p.tempat_lahir,
                            p.no_rumah, p.no_rt, p.no_rw, p.kode_pos,
                            coalesce(p.nama_prop, '') as provinsi,
                            coalesce(p.nama_kab, '') as kabupaten,
                            coalesce(p.nama_kec, '') as kecamatan,
                            coalesce(p.nama_kel, '') as kelurahan,
                            coalesce(pk.nama, '') as pekerjaan,
                            coalesce(pend.nama, '') as pendidikan,
                            coalesce(pj.nama, '') as penjamin,
                            coalesce(pj.diskon, '0') as diskon,
                            i.nama as instansi_perujuk, pjp.hak_kelas as kelas_rawat,
                            pd.jenis_igd, p.gol_darah,
                            ab.id as id_antrian_bpjs, ab.no_rm id_pasien_antrian_bpjs, ab.kode_booking kode_booking_antrian_bpjs, ab.no_kartu no_kartu_antrian_bpjs, ab.no_referensi, ab.id_jadwal_dokter, 
                            jd.tanggal tanggal_jadwal, jd.nama_poli nama_poli_jadwal, jd.shift_poli, jd.nama_dokter nama_dokter_jadwal ", true)
            ->from('sm_pendaftaran as pd')
            ->join('sm_pasien as p', 'p.id = pd.id_pasien')
            ->join('sm_instansi as i', 'i.id = pd.id_instansi_perujuk', 'left')
            ->join('sm_pekerjaan as pk', 'pk.id = p.id_pekerjaan', 'left')
            ->join('sm_pendidikan as pend', 'pend.id = p.id_pendidikan', 'left')
            ->join('sm_penjamin as pj', 'pj.id = pd.id_penjamin', 'left')
            ->join('sm_penjamin_pasien as pjp', 'pjp.id_pasien = p.id')
            ->join('sm_antrian_bpjs ab', 'pd.id = ab.id_pendaftaran', 'left')
            ->join('sm_jadwal_dokter jd', 'jd.id = ab.id_jadwal_dokter', 'left')
            ->where('pd.id', $id_pendaftaran, true);
		$data_pasien = $this->db->get()->row();

        if ($data_pasien) {
            $data_pasien->cek_kode_booking  = ($data_pasien->kode_booking == $data_pasien->kode_booking_antrian_bpjs);
            $data_pasien->cek_id_pasien  = ($data_pasien->id_pasien == $data_pasien->id_pasien_antrian_bpjs);
            $data_pasien->cek_no_polish  = ($data_pasien->no_polish == $data_pasien->no_kartu_antrian_bpjs);
            $data_pasien->cek_no_rujukan = ($data_pasien->no_rujukan == $data_pasien->no_referensi);
        }
        $data['pasien'] = $data_pasien;

        $this->db->select("lp.*,
                            case when lp.jenis_layanan = 'IGD' then 'IGD' else sp.nama end as layanan,
                            case when lp.cara_bayar = 'Tunai' then 'UMUM' else pj.nama end as status_pasien,
                            coalesce(lp.no_antrian, 0) as no_antrian,
                            coalesce(pj.nama, '') as penjamin,
                            coalesce(pj.diskon, 0) as diskon,
                            coalesce(pg.nama, '') as dokter,
                            pg.tanda_tangan as ttd_dokter,
                            pg.nip as nip_dokter,
                            coalesce(i.nama, '') as instansi_perujuk,
                            coalesce(bg.nama, '') as bangsal,
                            coalesce(bgic.nama, '') as bangsal_ic,
                            coalesce(ri.no_ruang, '') as no_ruang,
                            coalesce(ri.no_bed, 0) as no_bed,
                            coalesce(ic.no_ruang, '') as no_ruang_ic,
                            coalesce(ic.no_bed, 0) as no_bed_ic,
                            bgic.id as id_bangsal_ic,
                            tm.id_profesi, tm.id_pegawai,
                            k.nama as kelas,
                            kic.nama as kelas_icare,
                            ri.waktu_masuk, ri.waktu_keluar, ri.waktu_konfirmasi_ranap, 
                            ic.waktu_masuk as waktu_masuk_ic, ic.waktu_keluar as waktu_keluar_ic, ic.waktu_konfirmasi_icare, 
                            bg.id as id_bangsal,
                            odri.id_dokter_dpjp, odic.id_dokter_dpjp as id_dokter_dpjp_ic, coalesce(pgdpjp.nama, '') as dokter_dpjp, pgdpjp.tanda_tangan as ttd_dokter_dpjp, pgdpjp.nip as nip_dokter_dpjp,
                            coalesce(pgicdpjp.nama, '') as dokter_dpjp_ic, u.id as id_unit, u.nama as unit, pd.no_rujukan, peg.nama as petugas, 
                            ins.nama as instansi_merujuk, pd.keterangan_rujukan,
                            ('') as before")
            ->from('sm_layanan_pendaftaran as lp')
            ->join('sm_pendaftaran as pd', 'pd.id = lp.id_pendaftaran')
            ->join('sm_tenaga_medis as tm', 'tm.id = lp.id_dokter', 'left')
            ->join('sm_pegawai as pg', 'pg.id = tm.id_pegawai', 'left')
            ->join('sm_pegawai as peg', 'peg.id = lp.id_users', 'left')
            ->join('sm_spesialisasi as sp', 'sp.id = lp.id_unit_layanan', 'left')
            ->join('sm_penjamin as pj', 'pj.id = lp.id_penjamin', 'left')
            ->join('sm_instansi as i', 'i.id = pd.id_instansi_perujuk', 'left')
            ->join('sm_unit as u', 'u.id = sp.id_unit', 'left')
            ->join('sm_rawat_inap as ri', 'ri.id_layanan_pendaftaran = lp.id', 'left')
            ->join('sm_order_rawat_inap as odri', 'odri.id_rawat_inap = ri.id', 'left')
            ->join('sm_intensive_care as ic', 'ic.id_layanan_pendaftaran = lp.id', 'left')
            ->join('sm_order_intensive_care as odic', 'odic.id_intensive_care = ic.id', 'left')
            ->join('sm_tenaga_medis as tmdpjp', 'tmdpjp.id = odri.id_dokter_dpjp', 'left')
            ->join('sm_tenaga_medis as icdpjp', 'icdpjp.id = odic.id_dokter_dpjp', 'left')
            ->join('sm_pegawai as pgicdpjp', 'pgicdpjp.id = icdpjp.id_pegawai', 'left')
            ->join('sm_pegawai as pgdpjp', 'pgdpjp.id = tmdpjp.id_pegawai', 'left')
            ->join('sm_bangsal as bg', 'bg.id = ri.id_bangsal', 'left')
            ->join('sm_bangsal as bgic', 'bgic.id = ic.id_bangsal', 'left')
            ->join('sm_kelas as k', 'k.id = ri.id_kelas', 'left')
            ->join('sm_kelas as kic', 'kic.id = ic.id_kelas', 'left')
            ->join('sm_instansi as ins', 'ins.id = pd.id_instansi_merujuk', 'left')
            ->where('lp.id_pendaftaran', $id_pendaftaran, true)
            ->order_by('lp.id', 'asc');

        if ($id_layanan_pendaftaran !== null) :
            $this->db->where('lp.id', $id_layanan_pendaftaran, true);
            $layanan = $this->db->get()->row();
            $layanan->before = $this->m_pelayanan->getLayananSpesialisasiBefore($layanan->id);
        else :
            $layanan = $this->db->get()->result();
        endif;

        $data['layanan'] = $layanan;
        return $data;
        $this->db->close();
    }

    function deletePasienLama($no_rm_lama)
    {
        $this->db->where('id', $no_rm_lama)->delete('sm_pasien_lama');
    }

    function updatePenjaminPasien($data_penjamin)
    {
        // Cek apakah penjamin sudah ada
        $cek_penjamin = [
            'id_pasien'   => $data_penjamin['id_pasien'],
            'id_penjamin' => $data_penjamin['id_penjamin'],
        ];

        $query = $this->db->where($cek_penjamin)->get('sm_penjamin_pasien')->row();
        if ($query) :
            $this->db->where($cek_penjamin)->update('sm_penjamin_pasien', $data_penjamin);
        else :
            $this->db->insert('sm_penjamin_pasien', $data_penjamin);
        endif;
    }

    function batalPendaftaran($id)
    {
        // Cek dulu, apakah pasien sudah diberi tindakan atau belum
        $this->db->select('count(ttp.id) as jumlah', false)->from('sm_tarif_tindakan_pasien as ttp')
            ->join('sm_layanan_pendaftaran as lp', 'lp.id = ttp.id_layanan_pendaftaran')
            ->join('sm_pendaftaran as pd', 'pd.id = lp.id_pendaftaran')
            ->where('pd.id', $id)
            ->where("(ttp.jenis_transaksi = 'Tindakan' or ttp.jenis_transaksi = 'IGD' or ttp.jenis_transaksi = 'Rawat Inap' or ttp.jenis_transaksi = 'Intensive Care' )");
        $query = $this->db->get()->row();
        $check = 0;

        if (count((array) $query) > 0) :
            $check = $query->jumlah;
        endif;

        $status = false;
        $message = '';
        if ($check > 0) :
            // Sudah ada tindakan
            $status = false;
            $message = 'Tidak dapat membatalkan pendaftaran, pasien sudah mendapatkan tindakan';
        else :
            $this->db->trans_begin();
            $this->db->where('id', $id)->update('sm_pendaftaran', ['tanggal_keluar' => $this->datetime, 'status' => 'Batal']);

            $billing = [
                'total' => 0,
                'status' => 'Batal'
            ];

            $this->db->where('id_pendaftaran', $id)->update('sm_pembayaran', $billing);
            $this->db->where('id_pendaftaran', $id)->update('sm_layanan_pendaftaran', ['tindak_lanjut' => 'Batal Berkunjung', 'status_terlayani' => 'Batal']);

            $lp = $this->db->select('id')->where('id_pendaftaran', $id)->get('sm_layanan_pendaftaran')->result();
            $id_lp = null;

            foreach ($lp as $key => $l) :
                $this->hapusTransaksi($l->id);
                $id_lp = $l->id;
            endforeach;

            if ($id_lp !== NULL) :
                $this->load->model('logs/Logs_model', 'logs');
                $this->logs->recordAdminLogs($id_lp, 'Batal Kunjungan');
            endif;

            if ($this->db->trans_status() === FALSE) :
                $this->db->trans_rollback();
                $status = false;
                $message = "Gagal melakukan pembatalan pendaftaran";
            else :
                $this->db->trans_commit();
                $status = true;
                $message = "Berhasil melakukan pembatalan pendaftaran";
            endif;
        endif;

        return array('status' => $status, 'message' => $message);
    }

    function jenisDaftar($id){

        return $this->db->select("pd.jenis_pendaftaran")
                ->from('sm_pendaftaran pd')
                ->where('pd.id', $id, true)
                ->get()
                ->row();
        $this->db->close();

    }

    function batalPendaftaranKet($id, $ketbatal)
    {
        // Cek dulu, apakah pasien sudah diberi tindakan atau belum
        $this->db->select('count(ttp.id) as jumlah', false)->from('sm_tarif_tindakan_pasien as ttp')
            ->join('sm_layanan_pendaftaran as lp', 'lp.id = ttp.id_layanan_pendaftaran')
            ->join('sm_pendaftaran as pd', 'pd.id = lp.id_pendaftaran')
            ->where('pd.id', $id)
            ->where("(ttp.jenis_transaksi = 'Tindakan' or ttp.jenis_transaksi = 'IGD' or ttp.jenis_transaksi = 'Rawat Inap' or ttp.jenis_transaksi = 'Intensive Care' or ttp.jenis_transaksi = 'MCU' )");
        $query = $this->db->get()->row();
        $check = 0;

        if (count((array) $query) > 0) :
            $check = $query->jumlah;
        endif;

        $status = false;
        $message = '';
        if ($check > 0) :
            // Sudah ada tindakan
            $status = false;
            $message = 'Tidak dapat membatalkan pendaftaran, pasien sudah mendapatkan tindakan';
        else :

            /* START Pengurangan Jml Kunjungan Jadwal Dokter */
            $this->db->select("to_char(lp.tanggal_layanan, 'YYYY-mm-dd') tgl,lp.id_unit_layanan id_poli,lp.id_dokter")
                ->from('sm_pendaftaran pd')
                ->join('sm_layanan_pendaftaran lp', 'pd.id=lp.id_pendaftaran')
                ->where('pd.id', $id);
            $list_layanan = $this->db->get()->result();

            foreach ($list_layanan as $key => $value) :
                if (($value->tgl != '') && ($value->id_poli != '') && ($value->id_dokter != '')) {
                    $this->m_pelayanan->batalJadwalDokter($value->tgl, $value->id_poli, $value->id_dokter);
                }
            endforeach;
            /* END Pengurangan Jml Kunjungan Jadwal Dokter */

            $this->db->trans_begin();
            $this->db->where('id', $id)->update('sm_pendaftaran', ['tanggal_keluar' => $this->datetime, 'status' => 'Batal', 'alasan_batal' => $ketbatal]);

            $cekJenisDaftar = $this->jenisDaftar($id);
            if(isset($cekJenisDaftar->jenis_pendaftaran)){

                if($cekJenisDaftar->jenis_pendaftaran === 'Poliklinik'){

                    $this->m_pelayanan->serviceRequestStatus($id, 'batal', 'daftar');                

                }

            }

            $billing = [
                'total' => 0,
                'status' => 'Batal'
            ];

            $this->db->where('id_pendaftaran', $id)->update('sm_pembayaran', $billing);
            $this->db->where('id_pendaftaran', $id)->update('sm_layanan_pendaftaran', ['tindak_lanjut' => 'Batal Berkunjung', 'status_terlayani' => 'Batal']);

            $lp = $this->db->select('id')->where('id_pendaftaran', $id)->get('sm_layanan_pendaftaran')->result();
            $id_lp = null;

            foreach ($lp as $key => $l) :
                $this->hapusTransaksi($l->id);
                $id_lp = $l->id;
            endforeach;

            if ($id_lp !== NULL) :
                $this->load->model('logs/Logs_model', 'logs');
                $this->logs->recordAdminLogs($id_lp, 'Batal Kunjungan');
            endif;

            if ($this->db->trans_status() === FALSE) :
                $this->db->trans_rollback();
                $status = false;
                $message = "Gagal melakukan pembatalan pendaftaran";
            else :
                $this->db->trans_commit();
                $status = true;
                $message = "Berhasil melakukan pembatalan pendaftaran";
            endif;
        endif;

        return array('status' => $status, 'message' => $message);
    }

    function hapusTransaksi($id_layanan_pendaftaran)
    {
        $this->db->where('id_layanan_pendaftaran', $id_layanan_pendaftaran)->delete('sm_tarif_tindakan_pasien');
        // $this->db->where('id_layanan_pendaftaran', $id_layanan_pendaftaran)->delete('sm_laboratorium');
        // $this->db->where('id_layanan_pendaftaran', $id_layanan_pendaftaran)->delete('sm_radiologi');
        // $this->db->where('id_layanan_pendaftaran', $id_layanan_pendaftaran)->delete('sm_fisioterapi');
    }

    function updatePenanggungJawabPasien($id, $data_pjawab)
    {
        return $this->db->where("id", $id)->update("sm_pendaftaran", $data_pjawab);
    }

    // Antrian Pendaftaran
    function getDataAntrianPendaftaran()
    {
        $db_rsudkita = $this->load->database('rsudkita', true);
        $data['settings'] = $db_rsudkita->select('TUNGGU')->get('DK_SETTING')->row();
        $data['sisa_antrian'] = $db_rsudkita->query("select a.TOTALANTRIAN-a.NO_ANTRIAN as sisa from DK_PANGGIL as a
                                                    where date_format(a.tgl, '" . date('Y-m-d') . "') = date_format(sysdate(), '" . date('Y-m-d') . "') 
                                                    and a.ID_JNS_ANTRIAN")->row();
        return $data;
    }

    private function sqlPendaftaran($search, $baru = null, $lama = null, $batal = null)
    {
        $this->db->select("DISTINCT ON(pd.id) pd.*,
                    CONCAT_WS(' ', p.nama, COALESCE(p.status_pasien, '')) as nama, p.kelamin, p.alamat,
                    coalesce(sp.nama, '') as klinik,
                    coalesce(tr.account, '') as user,
                    coalesce(pgu.nama, '') as nama_user,
                    coalesce(pj.nama, '') as penjamin,
                    lp.cara_bayar, lp.id as id_layanan_pendaftaran, sp.kode_bpjs", false);

        $this->db->from('sm_pendaftaran as pd')
            ->join('sm_pasien as p', 'p.id = pd.id_pasien')
            ->join('sm_layanan_pendaftaran as lp', 'lp.id_pendaftaran = pd.id')
            ->join('sm_spesialisasi as sp', 'sp.id = lp.id_unit_layanan', 'left')
            ->join('sm_translucent as tr', 'tr.id = pd.id_users')
            ->join('sm_pegawai as pgu', 'pgu.id = pd.id_users')
            ->join('sm_penjamin as pj', 'pj.id = lp.id_penjamin', 'left')
            ->where('pd.id is not null')
            ->where('lp.konsul', 0);

		if ($search['jenis_pendaftaran'] == 'Laboratorium') :
            $this->db->select(",ol.status status_order", false);
            $this->db->join('sm_order_laboratorium ol', "lp.id=ol.id_layanan_pendaftaran AND ol.status='konfirm'", 'left');
        endif;

        // var_dump($search['tanggal_awal']); die;
        if (($search['tanggal_awal'] !== '') & ($search['tanggal_akhir'] !== '')) :
            $this->db->where("pd.tanggal_daftar BETWEEN '" . date2mysql($search['tanggal_awal']) . " 00:00:00' AND '" . date2mysql($search['tanggal_akhir']) . " 23:59:59'");
        endif;

        if (!empty($search['id'])) :
            $this->db->where('pd.id', $search['id'], true);
        endif;

        if ($search['jenis_pendaftaran'] !== '') :
            $this->db->where('pd.jenis_pendaftaran', $search['jenis_pendaftaran'], true);
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

        if ($baru !== null) :
            $this->db->where('pd.status', 'Baru');
        endif;

        if ($lama !== null) :
            $this->db->where('pd.status', 'Lama');
        endif;

        if ($batal !== null) :
            $this->db->where('pd.status', 'Batal');
        endif;

        if ($search['user'] !== '') :
            $this->db->where("pgu.nama ilike '%" . strtolower($search['user']) . "%'");
        endif;
        
		if ($search['penjamin'] !== '') :
            $this->db->where('pd.id_penjamin', $search['penjamin']);
        endif;
		
        return $this->db->order_by('pd.id, pd.tanggal_daftar', 'desc');
        // return $this->db->group_by('pd.id, p.nama, p.kelamin, p.alamat, sp.nama, tr.account, pj.nama, lp.cara_bayar, lp.no_sep, lp.id, sp.kode_bpjs');
    }

    private function _listPendaftaran($limit, $start, $search)
    {
        $this->sqlPendaftaran($search);
        if ($limit !== 0) :
            $this->db->limit($limit, $start);
        endif;

        return $this->db->get()->result();
    }

    function getListDataPendaftaran($limit, $start, $search)
    {
        $result['data'] = $this->_listPendaftaran($limit, $start, $search);
        $result['jumlah'] = $this->sqlPendaftaran($search)->get()->num_rows();
        $result['pasien_baru'] = $this->sqlPendaftaran($search, $baru = 'Baru', $lama = null, $batal = null)->get()->num_rows();
        $result['pasien_lama'] = $this->sqlPendaftaran($search, $baru = null, $Lama = 'Lama', $batal = null)->get()->num_rows();
        $result['pasien_batal'] = $this->sqlPendaftaran($search, $baru = null, $lama = null, $batal = 'Batal')->get()->num_rows();
        $this->db->close();
        return $result;
    }

    // fungsi untuk mengambil data dari rawat inap untuk bagian pemulasaran jenazah
    function getPendaftaranDetailUntukPemulasaran($id_pendaftaran, $id_layanan_pendaftaran = null)
    {

        $this->db->select("pd.*,
        p.id as no_rm, p.rm_lama, p.nama, p.kelamin, p.alamat, p.telp, p.agama,
        p.no_identitas, p.alergi, p.rm_lama, p.status_kawin,
        p.tanggal_lahir,
        coalesce(p.nama_prop, '') as provinsi,
        coalesce(p.nama_kab, '') as kabupaten,
        coalesce(p.nama_kec, '') as kecamatan,
        coalesce(p.nama_kel, '') as kelurahan,
        coalesce(pk.nama, '') as pekerjaan,
        coalesce(pend.nama, '') as pendidikan,
        coalesce(pj.nama, '') as penjamin,
        coalesce(pj.diskon, '0') as diskon,
        i.nama as instansi_perujuk,
        pd.jenis_igd, p.gol_darah", true)
            ->from('sm_pendaftaran as pd')
            ->join('sm_pasien as p', 'p.id = pd.id_pasien')
            ->join('sm_instansi as i', 'i.id = pd.id_instansi_perujuk', 'left')
            ->join('sm_pekerjaan as pk', 'pk.id = p.id_pekerjaan', 'left')
            ->join('sm_pendidikan as pend', 'pend.id = p.id_pendidikan', 'left')
            ->join('sm_penjamin as pj', 'pj.id = pd.id_penjamin', 'left')
            ->where('pd.id', $id_pendaftaran, true);
        $data['pasien'] = $this->db->get()->row();

        $this->db->select("lp.*,
                            case when lp.jenis_layanan = 'IGD' then 'IGD' else sp.nama end as layanan,
                            case when lp.cara_bayar = 'Tunai' then 'UMUM' else pj.nama end as status_pasien,
                            coalesce(lp.no_antrian, 0) as no_antrian,
                            coalesce(pj.nama, '') as penjamin,
                            coalesce(pj.diskon, 0) as diskon,
                            coalesce(pg.nama, '') as dokter,
                            coalesce(i.nama, '') as instansi_perujuk,
                            coalesce(bg.nama, '') as bangsal,
                            coalesce(ri.no_ruang, '') as no_ruang,
                            coalesce(ri.no_bed, 0) as no_bed,
                            bgic.id as id_bangsal_ic,
                            k.nama as kelas,
                            ri.waktu_masuk, ri.waktu_keluar, ri.waktu_konfirmasi_ranap, bg.id as id_bangsal,
                            odri.id_dokter_dpjp, coalesce(pgdpjp.nama, '') as dokter_dpjp, 
                            u.id as id_unit, u.nama as unit, pd.no_rujukan, peg.nama as petugas, 
                            ins.nama as instansi_merujuk, pd.keterangan_rujukan,
                            ('') as before")
            ->from('sm_layanan_pendaftaran as lp')
            ->join('sm_pendaftaran as pd', 'pd.id = lp.id_pendaftaran')
            ->join('sm_tenaga_medis as tm', 'tm.id = lp.id_dokter', 'left')
            ->join('sm_pegawai as pg', 'pg.id = tm.id_pegawai', 'left')
            ->join('sm_pegawai as peg', 'peg.id = lp.id_users', 'left')
            ->join('sm_spesialisasi as sp', 'sp.id = lp.id_unit_layanan', 'left')
            ->join('sm_penjamin as pj', 'pj.id = lp.id_penjamin', 'left')
            ->join('sm_instansi as i', 'i.id = pd.id_instansi_perujuk', 'left')
            ->join('sm_unit as u', 'u.id = sp.id_unit', 'left')
            ->join('sm_rawat_inap as ri', 'ri.id_layanan_pendaftaran = lp.id', 'left')
            ->join('sm_order_rawat_inap as odri', 'odri.id_rawat_inap = ri.id', 'left')
            ->join('sm_tenaga_medis as tmdpjp', 'tmdpjp.id = odri.id_dokter_dpjp', 'left')
            ->join('sm_pegawai as pgdpjp', 'pgdpjp.id = tmdpjp.id_pegawai', 'left')
            ->join('sm_bangsal as bg', 'bg.id = ri.id_bangsal', 'left')
            ->join('sm_kelas as k', 'k.id = ri.id_kelas', 'left')
            ->join('sm_instansi as ins', 'ins.id = pd.id_instansi_merujuk', 'left')
            ->where('lp.id_pendaftaran', $id_pendaftaran, true)
            ->order_by('lp.id', 'asc');

        if ($id_layanan_pendaftaran !== null) :
            $this->db->where('lp.id_pendaftaran', $id_pendaftaran, true);
            $layanan = $this->db->get()->row();
            $layanan->before = $this->m_pelayanan->getLayananSpesialisasiBefore($layanan->id);
        else :
            $layanan = $this->db->get()->result();
        endif;

        $data['layanan'] = $layanan;
        return $data;
        $this->db->close();
    }
}

/* End of file Pendaftaran_poliklinik_model.php */
