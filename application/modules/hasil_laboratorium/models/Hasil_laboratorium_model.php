<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Hasil_laboratorium_model extends CI_Model {

	function __construct()
	{
		parent::__construct();
		$this->datetime = date('Y-m-d H:i:s');
	}
	
	private function sqlHasilLaboratorium($search)
    {
		$this->db->select("lb.*, lb.jenis as jenis_laboratorium, pd.id_pasien, pd.lunas as tagihan,
                            CONCAT_WS(' ', p.nama, COALESCE(p.status_pasien, '')) as nama,
                            COALESCE(sp.nama, '') as layanan, 
                            COALESCE(pg.nama, '') as dokter_penanggung_jawab, 
                            lp.no_antrian, lp.jenis_layanan, lp.id as id_layanan_pendaftaran, 
                            lp.id_pendaftaran, lp.tindak_lanjut,ol.waktu_order, pd.no_register");
        $this->db->from("sm_laboratorium as lb");
        $this->db->join("sm_layanan_pendaftaran as lp", "lp.id = lb.id_layanan_pendaftaran");
        $this->db->join("sm_pendaftaran as pd", "pd.id = lp.id_pendaftaran");
        $this->db->join("sm_pasien as p", "p.id = pd.id_pasien");
        $this->db->join("sm_spesialisasi as sp", "sp.id = lp.id_unit_layanan", "left");
        $this->db->join("sm_tenaga_medis as tm", "tm.id = lb.id_dokter_pjwb", "left");
        $this->db->join("sm_pegawai as pg", "pg.id = tm.id_pegawai", "left");
        $this->db->join("sm_order_laboratorium as ol", "lb.id_order_laboratorium=ol.id", "left");

        if (($search['tanggal_awal'] !== '') & ($search['tanggal_akhir'] !== '')) :
            $this->db->where("lb.waktu_konfirm BETWEEN '" . date2mysql($search['tanggal_awal']) . " 00:00:00' AND '" . date2mysql($search['tanggal_akhir']) . " 23:59:59'");
        endif;

        if ($search['no_register'] !== '') :
            $this->db->where('pd.no_register', $search['no_register'], true);
        endif;

        if ($search['no_rm'] !== '') :
            $this->db->like('p.id', $search['no_rm'], 'before', true);
        endif;

        if ($search['status_hasil'] === "Sudah") :
			$this->db->where("lb.waktu_hasil is not null");
		elseif ($search["status_hasil"] === "Belum") :
			$this->db->where("lb.waktu_hasil is null");
		endif;

        if ($search['jenis_layanan'] !== '') :
            $this->db->where('lp.jenis_layanan', $search['jenis_layanan']);
		endif;
		
        if ($search['jenis_laboratorium'] !== '') :
            $this->db->where('lb.jenis', $search['jenis_laboratorium']);
        endif;

        if ($search['kode'] !== '') :
            $this->db->where("lb.kode ilike '%" . strtolower($search['kode']) . "%'");
        endif;

        if ($search['nama'] !== '') :
            $this->db->where("p.nama ilike '%" . strtolower($search['nama']) . "%'");
        endif;

        return $this->db->order_by('lb.waktu_konfirm', 'desc');    
    }

    private function _listHasilLaboratorium($limit, $start, $search)
    {
        $this->sqlHasilLaboratorium($search);
		if ($limit !== 0) :
			$this->db->limit($limit, $start);
        endif;

        // $this->db->get(); echo $this->db->last_query(); exit();
        return $this->db->get()->result();
    }

    function getListDataHasilLaboratorium($limit, $start, $search)
    {
        $result['data'] = $this->_listHasilLaboratorium($limit, $start, $search);
        $result['jumlah'] = $this->sqlHasilLaboratorium($search)->get()->num_rows();
        $this->db->close();
        return $result;
    }

    function deletePemeriksaanLaboratoriumDetail($id) {
        $this->load->model('pelayanan/Pelayanan_model', 'm_pelayanan');
        $sqlCheck = "select pd.tanggal_keluar, rd.id_history_pembayaran 
                    from sm_detail_laboratorium as dl 
                    join sm_laboratorium as rd on (rd.id = dl.id_laboratorium) 
                    join sm_layanan_pendaftaran as lp on (lp.id = rd.id_layanan_pendaftaran) 
                    join sm_pendaftaran as pd on (pd.id = lp.id_pendaftaran) 
                    where dl.id = '".$id."'";
        $dataCheck = $this->db->query($sqlCheck)->row();
        $status = false;
        $message = "Gagal menghapus item pemeriksaan Laboratorium";
        if ($dataCheck && $dataCheck->id_history_pembayaran === NULL) :
            $this->db->trans_begin();
            $sql = "select dl.*, lp.jenis_layanan, lp.id as id_layanan_pendaftaran
                    from sm_detail_laboratorium as dl 
                    join sm_laboratorium as rd on (rd.id = dl.id_laboratorium) 
                    join sm_layanan_pendaftaran as lp on (lp.id = rd.id_layanan_pendaftaran) 
                    where dl.id = '".$id."'";
            $dataDetailLaboratorium = $this->db->query($sql)->row();
            // var_dump($dataDetailLaboratorium); die;
            $id_laboratorium = $dataDetailLaboratorium->id_laboratorium;
            $id_posting = NULL;
            $total = $dataDetailLaboratorium->total;
            $reimburse = $dataDetailLaboratorium->reimburse;
            $jenis = $dataDetailLaboratorium->jenis_layanan;

            if ($jenis === 'Poliklinik' | $jenis === 'Laboratorium') :
                $jenis = 'Laboratorium';
                $id_posting = $dataDetailLaboratorium->id_laboratorium;
            else :
                $id_posting = $dataDetailLaboratorium->id_layanan_pendaftaran;
            endif;

            if ($dataDetailLaboratorium->status === 'Belum') :
                $status = true;
                $this->m_pelayanan->deletePembayaran($id_posting, $total, $reimburse, $jenis);
                $this->db->where('id', $id)->delete('sm_detail_laboratorium');
                $dataRow = $this->db->where('id_laboratorium', $id_laboratorium, true)->get('sm_detail_laboratorium')->num_rows();
                if ($dataRow < 1) {
                    $this->deletePemeriksaanLaboratorium($id_laboratorium);
                }

                $message = 'Berhasil hapus item pemeriksaan Laboratorium';
            else :
                $status = false;
                $message = 'Gagal hapus item pemeriksaan Laboratorium karena pemeriksaan sudah dilakukan';
            endif;

            if ($this->db->trans_status() === false) :
                $this->db->trans_rollback();
                $status = false;
                $message = 'Gagal hapus item pemeriksaan Laboratorium, kesalahan terjadi pada transaksi di database';
            else :
                $this->db->trans_commit();
                $status = true;
                $this->load->model('logs/Logs_model', 'm_logs');
                $this->m_logs->recordAdminLogs($dataDetailLaboratorium->id_layanan_pendaftaran, 'Hapus Tindakan');
            endif;
        else :
            $status = false;
            $message = "Gagal menghapus item pemeriksaan Laboratorium, transaksi telah dikunci";
        endif;

        return array('status' => $status, 'message' => $message);
    }

    function hapusTindakanLaboratorium($id_tarif, $id_lab) 
    {
        return $this->db->where("id_tarif", $id_tarif)->where("id_laboratorium", $id_lab)->delete("sm_detail_laboratorium");
    }

    function batalHasilLab($id_lab) 
    {
        return $this->db->where("id_laboratorium", $id_lab)->delete("sm_detail_laboratorium");
    }

    function diagnosisLab($id_layanan_pendaftaran) 
    {

        $n_diagnosis = "select pas.*, concat_ws(' ', pas.no_rumah, concat('Rt.', pas.no_rt, '/', pas.no_rw), pas.nama_kel, pas.nama_kec, pas.nama_kab, pas.nama_prop, pas.kode_pos) as alamat_tambahan, sp.nama as dokt_name, lp.jenis_layanan, p.jenis_rawat, p.id_pasien as rm_pasien, gss.nama as diagnosis, pj.nama as penjamin, dg.golongan_sebab_sakit_lain as sebab_sakit, lp.cara_bayar
            from sm_layanan_pendaftaran lp
            left join sm_pendaftaran p on (p.id = lp.id_pendaftaran) 
            left join sm_penjamin pj on (pj.id = lp.id_penjamin) 
            left join sm_diagnosa dg on (dg.id_layanan_pendaftaran = lp.id)
            left join sm_golongan_sebab_sakit as gss on (gss.id = dg.id_golongan_sebab_sakit)
            left join sm_tenaga_medis tm on (tm.id = lp.id_dokter) 
            left join sm_pegawai sp on (sp.id = tm.id_pegawai) 
            left join sm_pasien pas on (p.id_pasien = pas.id) 
            where lp.id = '" . $id_layanan_pendaftaran . "' ";
        $diagnosis = $this->db->query($n_diagnosis)->row();
        $this->db->close();
        return $diagnosis;

    }

    function getDataOrderLaboratorium($id_lab) 
    {
        $sql = "select orlab.id as id_order_laboratorium, orlab.waktu_order as waktu_order, orlab.ono as ono, p.id as no_rm, pgan.nama as analis, pgdp.nama as dokter_pj, jl.status as status_lis, p.nama as pasien,
                p.tanggal_lahir, p.kelamin, p.no_identitas as no_identitas, sl.id as id_lab,
                (null) as item_pemeriksaan, pd.id as id_pendaftaran,
                pd.jenis_pendaftaran, COALESCE(sp.nama, '') as layanan, 
                COALESCE(pg.nama, '') as dokter 
                from sm_laboratorium sl
                left join sm_order_laboratorium orlab on (orlab.id = sl.id_order_laboratorium)
                join sm_layanan_pendaftaran as lp on (lp.id = orlab.id_layanan_pendaftaran) 
                join sm_pendaftaran as pd on (pd.id = lp.id_pendaftaran) 
                join sm_pasien as p on (p.id = pd.id_pasien)
                left join sm_jenis_lab jl on (jl.id_lab = orlab.id)
                left join sm_spesialisasi as sp on (sp.id = lp.id_unit_layanan) 
                left join sm_tenaga_medis as tm on (tm.id = orlab.id_dokter) 
                left join sm_tenaga_medis as tmlab on (tmlab.id = sl.id_dokter_pjwb) 
                left join sm_pegawai as pg on (pg.id = tm.id_pegawai) 
                left join sm_pegawai as pgdp on (pgdp.id = tmlab.id_pegawai)
                left join sm_pegawai as pgan on (pgan.id = sl.analis)
                where sl.id = '".$id_lab."'";
        $data = $this->db->query($sql)->row();

        $this->db->close();
        return $data;

    }

    function getOrderLaboratorium($id_lab) 
    {
        $sql = "select sdl.*, l.nama as layanan, '' as penjamin, tp.jenis, COALESCE(k.nama, '') as kelas
                from sm_detail_laboratorium as sdl 
                left join sm_tarif_pelayanan as tp on (tp.id = sdl.id_tarif)
                left join sm_kelas as k on (k.id = tp.id_kelas)
                left join sm_layanan as l on (l.id = tp.id_layanan)
                left join sm_laboratorium as sl on (sl.id = sdl.id_laboratorium)
                where sdl.id_laboratorium = '".$id_lab."'";
        $data = $this->db->query($sql)->result();
        
        $this->db->close();
        return $data;
    }

    function deletePemeriksaanLaboratorium($id_laboratorium) 
    {
        $sqlCheck = "select pd.tanggal_keluar, lb.id_history_pembayaran 
                    from sm_laboratorium as lb 
                    join sm_layanan_pendaftaran as lp on (lp.id = lb.id_layanan_pendaftaran) 
                    join sm_pendaftaran as pd on (pd.id = lp.id_pendaftaran) 
                    where lb.id = '".$id_laboratorium."'";
        $dataCheck = $this->db->query($sqlCheck)->row();
        $status = false;
        $message = "Gagal menghapus pemeriksaan laboratorium";
        if ($dataCheck && $dataCheck->id_history_pembayaran === NULL) :
            $this->db->trans_begin();
            $this->db->where('id_laboratorium', $id_laboratorium, true)->delete('sm_detail_laboratorium');
            $this->db->where('id_laboratorium', $id_laboratorium, true)->delete('sm_pembayaran');
            $this->db->where('id', $id_laboratorium, true)->delete('sm_laboratorium');

            if ($this->db->trans_status() === false) :
                $this->db->trans_rollback();
                $status = false;
                $message = 'Gagal menghapus pemeriksaan laboratorium, internal server error';
            else :
                $this->db->trans_commit();
                $status = true;
                $message = 'Berhasil menghapus pemeriksaan laboratorium';
            endif;
        else :
            $status = false;
            $message = 'Gagal menghapus pemeriksaan laboratorium, transaksi telah dikunci';
        endif;

        return array('status' => $status, 'message' => $message);
    }

    function updateHasilLaboratorium($data)
    {
        $dataLaboratorium = array(
            'waktu_hasil' => $data['waktu_hasil'],
            'id_dokter_pjwb' => safe_post('dokter_pjwb') !== '' ? safe_post('dokter_pjwb') : NULL,
            'catatan' => safe_post('catatan_global'),
        );

        $this->db->where('id', safe_post('id_laboratorium'))->update('sm_laboratorium', $dataLaboratorium);
        if (is_array($data['hasil'])) :
            foreach ($data['hasil'] as $i => $value) :
                if ($value !== '') :
                    $abnormal = $this->getAbnormalitas($data['id_item_detail_lab'][$i], (double) $value);
                    $dataDetail = array(
                        'hasil' => $value,
                        'abnormal' => $abnormal,
                        'catatan' => $data['catatan'][$i]
                    );

                    $this->db->where('id', $data['id_item_detail_lab'][$i])->update('sm_item_detail_laboratorium', $dataDetail);
                endif;
            endforeach;
        endif;
    }

    function getAbnormalitas($id_item_detail_lab, $hasil)
    {
        $dataDetailLaboratorium = $this->getDetailLaboratorium($id_item_detail_lab);
        $abnormal = "Tidak";
        $sqlNormal = "select * from sm_nilai_normal_lab where id_item_laboratorium = '" . $dataDetailLaboratorium->id_item_laboratorium . "'  ";
        $nilaiNormal = $this->db->query($sqlNormal . " and kategori = '" . $dataDetailLaboratorium->kategori . "'")->row();
        
        if (count((array)$nilaiNormal) < 1 && $dataDetailLaboratorium->kategori === "A") :
            $nilaiNormal = $this->db->query($sqlNormal . " and kategori = '" . $dataDetailLaboratorium->kelamin_anak . "'")->row();
        endif;
        
        if (count((array)$nilaiNormal) < 1) :
            $nilaiNormal = $this->db->query($sqlNormal . " and kategori is null")->row();
        endif;

        if (0 < count((array)$nilaiNormal)) :
            $operator = $nilaiNormal->operator;
            $nilai_awal = (double) $nilaiNormal->awal;
            $nilai_akhir = (double) $nilaiNormal->akhir;
            switch ($operator) {
                case "-":
                    if ($nilai_awal <= $hasil & $hasil <= $nilai_akhir) :
                        $abnormal = "Tidak";
                    else :
                        $abnormal = "Ya";
                    endif;
                    break;
                case "<":
                    if ($hasil < $nilai_akhir) :
                        $abnormal = "Tidak";
                    else :
                        $abnormal = "Ya";
                    endif;
                    break;
                case "<=":
                    if ($hasil <= $nilai_akhir) :
                        $abnormal = "Tidak";
                    else :
                        $abnormal = "Ya";
                    endif;
                    break;
                case ">":
                    if ($nilai_akhir < $hasil) :
                        $abnormal = "Tidak";
                    else :
                        $abnormal = "Ya";
                    endif;
                    break;
                case "=>":
                    if ($nilai_akhir < $hasil) :
                        $abnormal = "Tidak";
                    else :
                        $abnormal = "Ya";
                    endif;
                    break;
                case "Positif":
                    if ($hasil === "+") :
                        $abnormal = "Tidak";
                    else :
                        $abnormal = "Ya";
                    endif;
                    break;
                case "Negatif":
                    if ($hasil === "-") :
                        $abnormal = "Tidak";
                    else :
                        $abnormal = "Ya";
                    endif;
                    break;
                default:
                    break;
            }
        endif;
        return $abnormal;
    }

    function getDetailLaboratorium($id_lab)
    {
        $sql = "select lb.status_lis as status_lis, lb.*
                from sm_laboratorium lb
                where lb.id = ".$id_lab." ";
        $query = $this->db->query($sql)->row();
        $this->db->close();
        return $query;
    }

    function getDataItemPemeriksaan($test_code)
    {
        $sql = "select sl.nama
                from sm_layanan sl
                where sl.test_code = '".$test_code."' ";
        $query = $this->db->query($sql)->result();
        $this->db->close();
        return $query;
    }

    function getItemDetailLaboratorium($id_lab)
    {
        $sql = "select idl.*
                from sm_item_detail_laboratorium idl
                where idl.id_lab = ".$id_lab." ";
        $query = $this->db->query($sql)->result();
        $this->db->close();
        return $query;
    }

    function tambahRekapCetak($id_lab = 0) 
    {
        $print_number = 0;
        $data = $this->db->where('id', $id_lab, true)->select('cetakan')->get('sm_laboratorium')->row();
        if (0 < count((array)$data)) :
            $status = true;
            $print_number = $data->cetakan + 1;
            $data_update = array('cetakan' => $print_number);
            $this->db->where('id', $id_lab, true)->update('sm_laboratorium', $data_update);
        else :
            $status = false;
        endif;

        return array('status' => $status, 'cetakan' => $print_number);
    }

    function getCetakanLab($id_lab)
    {
        $this->db->select("lb.*, shpa.*, lp.id as id_layanan_pendaftaran")
                ->from('sm_laboratorium as lb')
                ->join('sm_hasil_laboratorium_pa as shpa', 'lb.id = shpa.id_laboratorium', 'left')
                ->join('sm_layanan_pendaftaran as lp', 'lp.id = lb.id_layanan_pendaftaran', 'left')
                ->join('sm_pendaftaran as pd', 'pd.id = lp.id_pendaftaran')
                ->where('lb.id', $id_lab, true)
                ->order_by('lb.id', 'desc')
                ->limit(1, 0);
        return $this->db->get()->row();
    }

    function getDataRmPasien($kode)
    {
        $this->db->select("p.id_pasien
        ");
        $this->db->from('sm_laboratorium as l');
        $this->db->join('sm_layanan_pendaftaran as lp', 'l.id_layanan_pendaftaran = lp.id');
        $this->db->join('sm_pendaftaran as p', 'p.id = lp.id_pendaftaran', 'left');
        $this->db->where('l.kode', $kode, true);
        return $this->db->get()->row();
    }

	function getDiagnosaByIdLayananPendaftaran($id_layanan_pendaftaran)
	{
        $sql = "SELECT concat('[',d.prioritas,'] ', COALESCE(gss.nama,d.golongan_sebab_sakit_lain)) diagnosa
                FROM sm_diagnosa d
                LEFT JOIN sm_golongan_sebab_sakit gss on d.id_golongan_sebab_sakit=gss.id
                WHERE d.id_layanan_pendaftaran = $id_layanan_pendaftaran  ORDER BY d.prioritas DESC";
		return $this->db->query($sql)->result();
	}
	
	function getKirimLabWa($id_pendaftaran, $id_layanan_pendaftaran, $id_laboratorium, $jenis_laboratorium)
    {
        $sql = "SELECT *
                FROM sm_hasil_laboratorium_wa
                WHERE id_pendaftaran = $id_pendaftaran AND id_layanan_pendaftaran = $id_layanan_pendaftaran
                AND id_laboratorium = $id_laboratorium AND jenis_laboratorium = $jenis_laboratorium ";
        return $this->db->query($sql)->row();
    }

    function simpanKirimLabWa($id_pendaftaran, $id_layanan_pendaftaran, $id_laboratorium, $jenis_laboratorium)
    {
        $sql_cek = "SELECT count(id) count,id FROM sm_hasil_laboratorium_wa  
                    WHERE id_pendaftaran = $id_pendaftaran AND id_layanan_pendaftaran = $id_layanan_pendaftaran
                    AND id_laboratorium = $id_laboratorium AND jenis_laboratorium = $jenis_laboratorium GROUP BY id";  
        $data_cek = $this->db->query($sql_cek)->row();
        $jml_data = $data_cek->count ?? 0;
        $id_data  = $data_cek->id ?? 0;

        $sql = "SELECT ps.nama, ps.telp,olab.waktu_order, to_char(ps.tanggal_lahir, 'ddmmyyyy') pass, pd.id_pasien, lab.kode
                FROM sm_pendaftaran pd
                JOIN sm_layanan_pendaftaran lp on pd.id=lp.id_pendaftaran
                JOIN sm_pasien ps ON pd.id_pasien=ps.id
                JOIN sm_laboratorium lab on lp.id=lab.id_layanan_pendaftaran
                JOIN sm_order_laboratorium olab on lab.id_order_laboratorium=olab.id
                WHERE pd.id = '".$id_pendaftaran."' AND lp.id = '".$id_layanan_pendaftaran."' AND lab.id='".$id_laboratorium."'  ";
        $dataIdentitas  = $this->db->query($sql)->row();
        $no_hp          = $dataIdentitas->telp;
        $nama_pasien    = $dataIdentitas->nama;
        $tgl_layanan    = get_day($dataIdentitas->waktu_order) .", ". get_date_format($dataIdentitas->waktu_order);
        $pass           = $dataIdentitas->pass;
        $nama_file      = $dataIdentitas->id_pasien ."_". $dataIdentitas->kode;
        
        if ($jml_data=='0'){
            $data_insert = array(
                'id_pendaftaran'        => $id_pendaftaran,
                'id_layanan_pendaftaran'=> $id_layanan_pendaftaran,
                'id_laboratorium'       => $id_laboratorium,
                'jenis_laboratorium'    => $jenis_laboratorium,
                'no_hp'                 => $no_hp,
                'nama_pasien'           => $nama_pasien,
                'tgl_layanan'           => $tgl_layanan,
                'pass'                  => $pass,
                'nama_file'             => $nama_file,
                'waktu_kirim'           => $this->datetime,
                'id_user'               => $this->session->userdata('id_translucent'),
            ); 
            $this->db->insert('sm_hasil_laboratorium_wa', $data_insert);
            $message = 'menyimpan';
            
        } else {

            $sqlLog = "INSERT INTO sm_hasil_laboratorium_wa_log (id_lama, id_pendaftaran, id_layanan_pendaftaran, id_laboratorium, jenis_laboratorium, 
                       no_hp, nama_pasien, tgl_layanan, pass, nama_file, waktu_kirim, id_user, waktu_respon, respon, status)
                       SELECT id, id_pendaftaran, id_layanan_pendaftaran, id_laboratorium, jenis_laboratorium, 
                       no_hp, nama_pasien, tgl_layanan, pass, nama_file, waktu_kirim, id_user, waktu_respon, respon, status from sm_hasil_laboratorium_wa where id = $id_data ";
                       $this->db->query($sqlLog);
            $data_where = array(
                'id_pendaftaran'        => $id_pendaftaran,
                'id_layanan_pendaftaran'=> $id_layanan_pendaftaran,
                'id_laboratorium'       => $id_laboratorium,
                'jenis_laboratorium'    => $jenis_laboratorium,
            ); 
            $data_update= array(
                'no_hp'                 => $no_hp,
                'nama_pasien'           => $nama_pasien,
                'tgl_layanan'           => $tgl_layanan,
                'pass'                  => $pass,
                'nama_file'             => $nama_file,
                'waktu_kirim'           => $this->datetime,
                'id_user'               => $this->session->userdata('id_translucent'),
            ); 
            $this->db->where($data_where)->update("sm_hasil_laboratorium_wa", $data_update);
            $message = 'mengubah';
        }

        if ($this->db->affected_rows() > 0) {
            $response = array("status"      => true, 
                              "message"     => 'Berhasil ' . $message, 
                              "no_hp"       => $no_hp, 
                              "nama_pasien" => $nama_pasien, 
                              "tgl_layanan" => $tgl_layanan, 
                              "pass"        => $pass, 
                              "nama_file"   => $nama_file);
        } else {
            $response = array("status"      => false, 
                              "message"     => 'Gagal ' . $message,
                              "no_hp"       => $no_hp, 
                              "nama_pasien" => $nama_pasien, 
                              "tgl_layanan" => $tgl_layanan, 
                              "pass"        => $pass, 
                              "nama_file"   => $nama_file);
        }
        return $response;
    }

    function responKirimLabWa($id_pendaftaran, $id_layanan_pendaftaran, $id_laboratorium, $jenis_laboratorium, $status, $respon)
    {       
            $data_where = array(
                'id_pendaftaran'        => $id_pendaftaran,
                'id_layanan_pendaftaran'=> $id_layanan_pendaftaran,
                'id_laboratorium'       => $id_laboratorium,
                'jenis_laboratorium'    => $jenis_laboratorium,
            ); 
            $data_update= array(
                'waktu_respon' => $this->datetime,
                'status'       => $status == 'true'  ? 'Berhasil' : 'Gagal',
                'respon'       => $respon
            ); 
            $this->db->where($data_where)->update("sm_hasil_laboratorium_wa", $data_update);

        if ($this->db->affected_rows() > 0) {
            $response = array("status" => true, "message" => 'Berhasil');
        } else {
            $response = array("status" => false, "message" => 'Gagal');
        }
        return $response;
    }
}
