<?php defined('BASEPATH') or exit('No direct script access allowed');

use \LZCompressor\LZString;

class Pasien_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->datetime = date('Y-m-d H:i:s');
        $this->table = 'sm_pasien as p';
        $this->timestamp = strval(time());
        $this->bpjs_config = $this->getConfigBPJSV2();
    }

    private function sqlPasien($search)
    {
        $this->db->select("p.*, pp.no_polish,
                            CONCAT_WS(' ', p.nama, COALESCE(p.status_pasien, '')) as nama,
                            coalesce(pd.nama, '') as pendidikan,
                            coalesce(pk.nama, '') as pekerjaan,
                            CONCAT_WS(', ', p.nama_kel, p.nama_kec, p.nama_kab, p.nama_prop) as wilayah")
            ->from($this->table)
            ->join('sm_pendidikan as pd', 'pd.id = p.id_pendidikan')
            ->join('sm_pekerjaan as pk', 'pk.id = p.id_pekerjaan', 'left')
            ->join('sm_penjamin_pasien pp', 'p.id = pp.id_pasien AND pp.id_penjamin = 1 AND pp.no_polish IS NOT NULL AND pp.no_polish <> \'\'', 'left')
            ->where('pd.id is not null');

        if ($search['id'] !== '') :
            $this->db->like('p.id', $search['id'], 'before');
        endif;

        if (isset($search['nik']) && $search['nik'] !== '') :
            $this->db->where('p.no_identitas', $search['nik']);
        endif;

        if (isset($search['tanggal_lahir']) && $search['tanggal_lahir'] !== '') :
            $this->db->where('p.tanggal_lahir', $search['tanggal_lahir']);
        endif;

        if ($search['nama'] !== '') :
            $this->db->where("p.nama ilike '%" . strtolower($search['nama']) . "%'");
        endif;

        if ($search['kelamin'] !== '') :
            $this->db->where('p.kelamin', $search['kelamin']);
        endif;

        if ($search['umur'] !== '') :
            $year_now = date('Y');
            $selisih = $year_now - $search['umur'];
            $new_param = $selisih . '-' . date('m') . '-' . date('d');
            $last_param = ($selisih - 1) . '-' . date('m') . '-' . date('d');
            $this->db->where("p.tanggal_lahir between '$last_param' and '$new_param'");
        endif;

        if ($search['alamat'] !== '') :
            $this->db->where("p.alamat ilike '%" . strtolower($search['alamat']) . "%'");
        endif;

        if ($search['telp'] !== '') :
            $this->db->like('p.telp', $search['telp'], 'after');
        endif;

        if ($search['status'] !== '') :
            $this->db->where('p.status', $search['status']);
        endif;
        
        if (isset($search['nik']) && $search['nik'] !== '') :
            $this->db->where('p.no_identitas', $search['nik']);
        endif;

        if ($search['nobpjs'] !== '') :
            $this->db->where('pp.no_polish', $search['nobpjs']);
        endif;
		
        return $this->db->order_by('p.id');
    }

    private function _listPasien($start, $limit, $search)
    {
        $this->sqlPasien($search);
        if ($limit !== 0) :
            $this->db->limit($limit, $start);
        endif;

        return $this->db->get()->result();
    }

    function getListDataPasien($start, $limit, $search)
    {
        $data['data'] = $this->_listPasien($start, $limit, $search);
        $data['jumlah'] = $this->sqlPasien($search)->get()->num_rows();
        $this->db->close();
        return $data;
    }

    //Wa Security
    function getListKodeDaftar($start, $limit, $search)
    {
        $data['data'] = $this->_listKodeDaftar($start, $limit, $search);
        $data['jumlah'] = $this->sqlKodeDaftar($search)->get()->num_rows();
        $this->db->close();
        return $data;
    }

    private function _listKodeDaftar($start, $limit, $search)
    {
        $this->sqlKodeDaftar($search);
        if ($limit !== 0) :
            $this->db->limit($limit, $start);
        endif;
        return $this->db->get()->result();
    }

    private function sqlKodeDaftar($search)
    {
        $this->date = date('Y-m-d');
        $this->db->select("pw.*, s.nama nama_unit, pg.nama nama_dokter")
            ->from('sm_pendaftaran_wa as pw')
            ->join('sm_spesialisasi s', 'pw.id_unit_layanan=s.id', 'left')
            ->join('sm_tenaga_medis tm', 'pw.id_dokter=tm.id', 'left')
            ->join('sm_pegawai pg', 'tm.id_pegawai = pg.id', 'left')
            ->where('pw.tgl_kunjungan', $this->date);

        if ($search['id'] !== '') :
            $this->db->like('pw.id', $search['id']);
        endif;

        if ($search['id_pasien'] !== '') :
            $this->db->like('pw.id_pasien', $search['id_pasien']);
        endif;

        if ($search['nik'] !== '') :
            $this->db->where('pw.nik', $search['nik']);
        endif;

        if ($search['nama'] !== '') :
            $this->db->where("pw.nama ilike '%" . strtolower($search['nama']) . "%'");
        endif;

        return $this->db->order_by('pw.id');
    }

    //Wa Security
    function getDataPasienById($id)
    {
        $this->db->select("p.*,	coalesce(pd.nama, '') as pendidikan, coalesce(pk.nama, '') as pekerjaan,coalesce(et.nama, '') as etnis, 
                            ps.is_died, ps.is_hiv, ps.is_alergi, ps.is_gonorrhea, ps.is_hepatitis, ps.is_kusta, ps.is_tbc, ps.is_potensi_komplain, 
                            ps.is_pasien_pejabat, ps.is_pemilik_rs, ps.is_covid, pp.no_polish")
            ->from($this->table)
            ->join('sm_pendidikan as pd', 'pd.id = p.id_pendidikan')
            ->join('sm_pekerjaan as pk', 'pk.id = p.id_pekerjaan', 'left')
            ->join('sm_etnis as et', 'et.id = p.id_etnis', 'left')
            ->join('sm_profil_pasien as ps', 'p.id = ps.id_pasien', 'left')
            ->join('sm_penjamin_pasien as pp', 'p.id = pp.id_pasien and pp.id_penjamin = 1', 'left')
            ->where('p.id', $id, true);
        // $this->db->get(); echo $this->db->last_query(); exit();	
        $result = $this->db->get()->row();
        $this->db->close();
        return $result;
    }

    //Wa Security
    function getDataPasienWaLama($id, $id_wa)
    {
        $this->db->select("p.*, pw.id as id_wa, pw.id_unit_layanan, pw.id_dokter, pw.id_penjamin, pw.cara_bayar, pw.no_rujukan, pw.status as status_rm_pasien, sp.nama as nama_layanan, spg.nama as nama_dokter, sp.id as id_spesialis,	
                            coalesce(pd.nama, '') as pendidikan,	
                            coalesce(pk.nama, '') as pekerjaan")
            ->from($this->table)
            ->join('sm_pendidikan as pd', 'pd.id = p.id_pendidikan')
            ->join('sm_pekerjaan as pk', 'pk.id = p.id_pekerjaan', 'left')
            ->join('sm_pendaftaran_wa as pw', 'p.id = pw.id_pasien', 'left')
            ->join('sm_spesialisasi as sp', 'sp.id = pw.id_unit_layanan', 'left')
            ->join('sm_penjamin as pj', 'pj.id = pw.id_penjamin', 'left')
            ->join('sm_tenaga_medis as stm', 'stm.id = pw.id_dokter', 'left')
            ->join('sm_pegawai as spg', 'spg.id = stm.id_pegawai', 'left')
            ->where('pw.id', $id_wa, true)
            ->where('p.id', $id, true);
        // $this->db->get(); echo $this->db->last_query(); exit();	
        $result = $this->db->get()->row();
        $this->db->close();
        return $result;
    }

    //Wa Security
    function getDataPasienWaBaru($id, $id_wa)
    {
        $this->db->select("spw.*, pw.id as id_wa, pw.id_unit_layanan, pw.id_dokter, pw.id_penjamin, pw.cara_bayar, pw.no_rujukan, pw.status as status_rm_pasien, sp.nama as nama_layanan, spg.nama as nama_dokter, sp.id as id_spesialis,	
                            coalesce(pd.nama, '') as pendidikan,	
                            coalesce(pk.nama, '') as pekerjaan")
            ->from('sm_pasien_wa as spw')
            ->join('sm_pendidikan as pd', 'pd.id = spw.id_pendidikan', 'left')
            ->join('sm_pekerjaan as pk', 'pk.id = spw.id_pekerjaan', 'left')
            ->join('sm_pendaftaran_wa as pw', 'spw.no_identitas = pw.nik', 'left')
            ->join('sm_spesialisasi as sp', 'sp.id = pw.id_unit_layanan', 'left')
            ->join('sm_penjamin as pj', 'pj.id = pw.id_penjamin', 'left')
            ->join('sm_tenaga_medis as stm', 'stm.id = pw.id_dokter', 'left')
            ->join('sm_pegawai as spg', 'spg.id = stm.id_pegawai', 'left')
            ->where('pw.id', $id_wa, true)
            ->where('spw.no_identitas', $id, true);
        // $this->db->get(); echo $this->db->last_query(); exit();	
        $result = $this->db->get()->row();
        $this->db->close();
        return $result;
    }

    function getDataPasienWithRM($id)
    {
        $this->db->select("p.*, rm.last_update,
                            coalesce(pd.nama, '') as pendidikan,
                            coalesce(pk.nama, '') as pekerjaan")
            ->from($this->table)
            ->join('sm_pendidikan as pd', 'pd.id = p.id_pendidikan')
            ->join('sm_pekerjaan as pk', 'pk.id = p.id_pekerjaan', 'left')
            ->join('sm_rekam_medis as rm', 'rm.id = p.id', 'left')
            ->where('p.id', $id, true);
        $data = $this->db->get()->row();
        $this->db->close();
        return $data;
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

    function updateDataPasien($data, $update_last_active = false)
    {
        if ($data['id'] == false) :
            // Insert
            $data['id'] = $this->getLastNoRm();
            $data['last_active'] = $this->datetime;
            $this->db->insert('sm_pasien', $data);
            $id = $data['id'];
            $rekam_medis_pasien = array(
                'id' => $id,
                'history' => NULL,
                'last_update' => $this->datetime,
            );
            $count = $this->db->where('id', $id)->get('sm_rekam_medis')->num_rows();
            if ($count < 1) :
                $this->db->insert('sm_rekam_medis', $rekam_medis_pasien);
            endif;
        else :
            // Update
            $id = $data['id'];
            if ($update_last_active) :
                $data['last_active'] = $this->datetime;
            endif;
            $select = array(
                'p.nama',
                'p.kelamin',
                'p.tempat_lahir',
                'p.alamat',
                'p.nama_prop',
                'p.nama_kab',
                'p.nama_kec',
                'p.nama_kel',
                'p.agama',
                'p.gol_darah',
                'p.id_pendidikan',
                'p.id_pekerjaan',
                'p.status_kawin',
                'p.telp',
                'p.no_identitas',
                'p.alergi',
                'p.is_pegawai_rsud',
                'p.email',
                'pp.no_polish',
            );
            // $before = json_encode($this->db->select($select)->where('id', $data['id'])->get('sm_pasien')->row());
			$before = json_encode(
					 $this->db->select($select)
					 ->from('sm_pasien p')
					 ->join('sm_penjamin_pasien pp', 'p.id = pp.id_pasien AND pp.id_penjamin = 1', 'left')
					 ->where('p.id', $data['id'])->get()->row());


            $this->db->where('id', $id)->update('sm_pasien', $data);
            // $after = json_encode($this->db->select($select)->where('id', $data['id'])->get('sm_pasien')->row());
			$after = json_encode(
					 $this->db->select($select)
					 ->from('sm_pasien p')
					 ->join('sm_penjamin_pasien pp', 'p.id = pp.id_pasien AND pp.id_penjamin = 1', 'left')
					 ->where('p.id', $data['id'])->get()->row());
					 
            if ($before !== $after) :
                $this->load->model('logs/Logs_model', 'logs');
                $this->logs->pasienUpdateLog($id, $before, $after);
            endif;
            $id = $data['id'];
        endif;
        return $id;
    }

    // Penjamin Pasien
    function getDataPenjaminPasien($no_rm)
    {
        $this->db->select("pp.*, pj.nama as penjamin")
            ->from('sm_penjamin_pasien as pp')
            ->join('sm_penjamin as pj', 'pj.id = pp.id_penjamin')
            ->where('pp.id_pasien', $no_rm, true);
        $result = $this->db->get()->result();
        $this->db->close();
        return $result;
    }

    function simpanPenjaminPasien($data)
    {
        $status = $this->db->insert('sm_penjamin_pasien', $data);
        return $status;
    }

    function deletePenjaminPasien($id)
    {
        $status = $this->db->where('id', $id)->delete('sm_penjamin_pasien');
        return $status;
    }

    function getNoPolishPasien($no_rm, $id_penjamin)
    {
        $data = array(
            'id_pasien'   => $no_rm,
            'id_penjamin' => $id_penjamin
        );
        $data = $this->db->get_where('sm_penjamin_pasien', $data)->row();
        $this->db->close();
        $no_polish = '';
        if ($data) :
            $no_polish = $data->no_polish;
        endif;
        return $no_polish;
    }

    // Merge Pasien
    function mergePasien($params)
    {
        $message = '';
        foreach ($params['pasien_merge'] as $value) :
            $update  = array('id_pasien' => $params['pasien_utama']);
            $update2 = array('no_rm'     => $params['pasien_utama']);
            $update3 = array('id'        => $params['pasien_utama']);

            $id_baru = $params['pasien_utama'];
            $id_user = $this->session->userdata('id_translucent');
            $created_date = $this->datetime;
            $sql = "insert into sm_pasien_merge (id_lama,id_baru,rm_lama,inc,tanggal_daftar,no_identitas,nama,status_pasien,kelamin,tempat_lahir,tanggal_lahir,
                  alamat,no_prop,nama_prop,no_kab,nama_kab,no_kec,nama_kec,no_kel,nama_kel,agama,gol_darah,id_pendidikan,id_pekerjaan,status_kawin,nama_ayah,nama_ibu,
                  telp,id_etnis,hamkom,alergi,status,disabilitas,etnis_lainnya,hamkom_lainnya,last_active,no_rw,no_rt,no_rumah,kode_pos,id_user,created_date) 
                  SELECT id,'$id_baru',rm_lama,inc,tanggal_daftar,no_identitas,nama,status_pasien,kelamin,tempat_lahir,tanggal_lahir,
                  alamat,no_prop,nama_prop,no_kab,nama_kab,no_kec,nama_kec,no_kel,nama_kel,agama,gol_darah,id_pendidikan,id_pekerjaan,status_kawin,nama_ayah,nama_ibu,
                  telp,id_etnis,hamkom,alergi,status,disabilitas,etnis_lainnya,hamkom_lainnya,last_active,no_rw,no_rt,no_rumah,kode_pos,'$id_user','$created_date' from sm_pasien where id='$value' ";
            $this->db->query($sql);

            $sql_pendaftaran = "INSERT INTO sm_pendaftaran_merge (id_pasien_lama,id_pasien_baru,id_pendaftran,id_user,created_date)
							  SELECT '$value','$id_baru',pd.id,'$id_user','$created_date' FROM sm_pendaftaran pd where pd.id_pasien='$value' ";
            $this->db->query($sql_pendaftaran);

            $this->db->where('id_pasien', $value)->update('sm_all_letters', $update);
            $this->db->where('no_rm', $value)->update('sm_antrian_farmasi', $update2);
            $this->db->where('id_pasien', $value)->update('sm_bed_booking', $update);
            $this->db->where('id_pasien', $value)->update('sm_booking_antrian', $update);
            $this->db->where('id_pasien', $value)->update('sm_deposit', $update);
            $this->db->where('id_pasien', $value)->update('sm_jadwal_kamar_operasi', $update);
            $this->db->where('id_pasien', $value)->update('sm_medical_certificate', $update);
            $this->db->where('id_pasien', $value)->update('sm_order_bank_darah', $update);
            $this->db->where('id_pasien', $value)->update('sm_order_bimroh', $update);
            $this->db->where('id_pasien', $value)->update('sm_order_talqin', $update);
            $this->db->where('id_pasien', $value)->update('sm_pendaftaran', $update);
            $this->db->where('id_pasien', $value)->update('sm_pendaftaran_wa', $update);
            $this->db->where('id_pasien', $value)->update('sm_penjamin_pasien', $update);
            $this->db->where('id_pasien', $value)->update('sm_penjualan', $update);
            $this->db->where('id_pasien', $value)->update('sm_penjualan_bank_darah', $update);
            $this->db->where('id', $value)->update('sm_peserta_bpjs', $update3);
            $this->db->where('id_pasien', $value)->update('sm_profil_pasien', $update);
            $this->db->where('id_pasien', $value)->update('sm_resep', $update);
            $this->db->where('id_pasien', $value)->update('sm_retur_penjualan', $update);
            $this->db->where('id_pasien', $value)->update('sm_rujukan', $update);
            $this->db->where('no_rm', $value)->update('sm_tracer', $update2);

			$cek_rekam_medis = $this->db->where('id', $params['pasien_utama'] , true)->select('id')->get('sm_rekam_medis')->row()->id ?? NULL;
            if($cek_rekam_medis != NULL){
                $this->db->where('id', $value)->delete('sm_rekam_medis');
            } else {
                $this->db->where('id', $value)->update('sm_rekam_medis', $update3);
            }
			
            $this->db->where('id_pasien', $value)->delete('sm_penjamin_pasien');
            $this->db->where('id', $value)->delete('sm_pasien');
            $update = $this->db->affected_rows();
        endforeach;
        if ($update) :
            $status = true;
            $message = 'Berhasil menggabungkan pasien';
        else :
            $status = false;
            $message = 'Gagal menggabungkan pasien';
        endif;
        $data = [
            'status' => $status,
            'message' => $message,
        ];
        return $data;
    }

    function getDataPasienFinger($id)
    {
        $this->db->select("p.*, pk.no_polish")
            ->from($this->table)
            ->join('sm_penjamin_pasien as pk', 'pk.id_pasien = p.id', 'left')
            ->where('p.id', $id);
        return $this->db->get()->row();
        $this->db->close();
    }

    function getConfigBPJSV2()
    {
        return $this->db->where('id', 1)->get('sm_konfigurasi_bpjs_antrean')->row();
    }

    function getConfigAntrianBPJSTesting()
    {
        return $this->db->where('id', 2)->get('sm_konfigurasi_bpjs_antrean')->row();
    }

    function decryptResponseTesting($string)
    {

        $this->bpjs_testing = $this->getConfigAntrianBPJSTesting();
        $key = $this->bpjs_testing->cons_id . $this->bpjs_testing->secret_key . $this->timestamp;

        $encryptMethod = 'AES-256-CBC';
        // hash
        $keyHash = hex2bin(hash('sha256', $key));
        // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
        $iv = substr(hex2bin(hash('sha256', $key)), 0, 16);
        $output = openssl_decrypt(base64_decode($string), $encryptMethod, $keyHash, OPENSSL_RAW_DATA, $iv);
        $output = LZString::decompressFromEncodedURIComponent($output);
        $output = json_decode($output);
        return $output;
    }

    function decryptResponse($string)
    {
        $key = $this->bpjs_config->cons_id . $this->bpjs_config->secret_key . $this->timestamp;

        $encryptMethod = 'AES-256-CBC';
        // hash
        $keyHash = hex2bin(hash('sha256', $key));
        // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
        $iv = substr(hex2bin(hash('sha256', $key)), 0, 16);
        $output = openssl_decrypt(base64_decode($string), $encryptMethod, $keyHash, OPENSSL_RAW_DATA, $iv);
        $output = LZString::decompressFromEncodedURIComponent($output);
        $output = json_decode($output);
        return $output;
    }

    function getSignatureBPJS($config)
    {
        $cid = $config->cons_id;
        $skey = $config->secret_key;

        // get timestamp
        // date_default_timezone_set("Asia/Jakarta");
        // $timestamp = strtotime(date("Y/m/d H:i:s"));

        date_default_timezone_set("UTC");
        $timestamp = $this->timestamp;

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
	
	function getPasienUtama($id_pasien)
    {
        $this->db->select("ps.*, (select no_polish from sm_penjamin_pasien where id_pasien= ps.id and no_polish <>'' limit 1 ) no_polish,
                        concat(
                            case when ps.alamat <> '' then ps.alamat else '' end,
                            case when ps.no_rumah <> '' then concat(' NO ',ps.no_rumah) else '' end,
                            case when ps.no_rt <> '' then concat(' RT ',ps.no_rt) else '' end,
                            case when ps.no_rw <> '' then concat(' RW ',ps.no_rw) else '' end,
                            case when ps.nama_kel <> '' then concat(', ',ps.nama_kel) else '' end,
                            case when ps.nama_kec <> '' then concat(', ',ps.nama_kec) else '' end,
                            case when ps.nama_kab <> '' then concat(', ',ps.nama_kab) else '' end,
                            case when ps.nama_prop <> '' then concat(', ',ps.nama_prop) else '' end
                            ) alamat_lengkap ")
             ->from('sm_pasien ps')
             ->where("ps.id = lpad('" . $id_pasien . "'::VARCHAR, 8, '0')");
			 
			 // ->where("ps.id ilike ('%" . $id_pasien . "')");
			 
        return $this->db->get()->result();
    }

    function getPasienUtamaLog($id_pasien)
    {
        $this->db->select("psm.*, (select no_polish from sm_penjamin_pasien where id_pasien= psm.id_baru and no_polish <>'' limit 1 ) no_polish, pg.nama petugas,
                        concat(
                            case when psm.alamat <> '' then psm.alamat else '' end,
                            case when psm.no_rumah <> '' then concat(' NO ',psm.no_rumah) else '' end,
                            case when psm.no_rt <> '' then concat(' RT ',psm.no_rt) else '' end,
                            case when psm.no_rw <> '' then concat(' RW ',psm.no_rw) else '' end,
                            case when psm.nama_kel <> '' then concat(', ',psm.nama_kel) else '' end,
                            case when psm.nama_kec <> '' then concat(', ',psm.nama_kec) else '' end,
                            case when psm.nama_kab <> '' then concat(', ',psm.nama_kab) else '' end,
                            case when psm.nama_prop <> '' then concat(', ',psm.nama_prop) else '' end
                            ) alamat_lengkap")
             ->from('sm_pasien_merge psm')
             ->join('sm_pegawai pg', 'psm.id_user=pg.id', 'left')
             ->where("psm.id_baru = lpad('" . $id_pasien . "'::VARCHAR, 8, '0')");
			 
             //->where("psm.id_baru ilike ('%" . $id_pasien . "')");
        return $this->db->get()->result();
    }

    function getConfigIcareBPJS()
    {
        return $this->db->where('id', '1')->get('sm_konfigurasi_bpjs_icare')->row();
    }

    function dataParamIcare($id)
    {
        
        $this->db->select("pd.no_polish, spp.no_polish as no_polish_penjamin, tm.kode_bpjs", false)
            ->from('sm_layanan_pendaftaran as lp')
            ->join('sm_pendaftaran as pd', 'pd.id = lp.id_pendaftaran', 'left')
            ->join('sm_pasien as sp', 'sp.id = pd.id_pasien', 'left')
            ->join('sm_tenaga_medis as tm', 'tm.id = lp.id_dokter', 'left')
            ->join('sm_penjamin_pasien as spp', 'spp.id_pasien = sp.id', 'left')
            ->where('lp.id', $id, true);

            return $this->db->get()->row();

        $this->db->close();
            
        
    }

    function kodeBpjsDokter($id)
    {
        $this->db->select("tm.kode_bpjs")
                 ->from('sm_tenaga_medis tm')
                 ->where('tm.id', $id, true);

        return $this->db->get()->row();

        $this->db->close();

    }
    
	function addDataPasien($data)
    {
        $data['id'] = $this->getLastNoRm();
        $data['last_active'] = $this->datetime;
        $this->db->insert('sm_pasien', $data);        
        $id = $data['id'];
        return $id;
    }
	
	function getListDataPasienAdd($search)
    {
        $data['data'] = $this->sqlPasienAdd($search)->limit(5, 0)->get()->result();
        $data['jumlah'] = $this->sqlPasienAdd($search)->get()->num_rows();
        $this->db->close();
        return $data;
    }
    
    private function sqlPasienAdd($search)
    {
        $this->db->select("p.*, pp.no_polish,
                            CONCAT_WS(' ', p.nama, COALESCE(p.status_pasien, '')) as nama,
                            coalesce(pd.nama, '') as pendidikan,
                            coalesce(pk.nama, '') as pekerjaan,
                            CONCAT_WS(', ', p.nama_kel, p.nama_kec, p.nama_kab, p.nama_prop) as wilayah")
            ->from('sm_pasien as p')
            ->join('sm_pendidikan as pd', 'pd.id = p.id_pendidikan')
            ->join('sm_pekerjaan as pk', 'pk.id = p.id_pekerjaan', 'left')
            ->join('sm_penjamin_pasien pp', 'p.id = pp.id_pasien AND pp.id_penjamin = 1 AND pp.no_polish IS NOT NULL AND pp.no_polish <> \'\'', 'left')
            ->where('pd.id is not null');

        if ($search['nama'] !== '') :
            $this->db->where("p.nama ilike '%" . strtolower($search['nama']) . "%'");
        endif;
        
        if (isset($search['ktp']) && $search['ktp'] !== '') :
            $this->db->where('p.no_identitas', $search['ktp']);
        endif;
        return$this->db->order_by('p.id','desc');
    }
}
