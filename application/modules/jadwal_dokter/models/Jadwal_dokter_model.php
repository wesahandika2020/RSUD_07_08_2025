<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jadwal_dokter_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->datetime = date('Y-m-d H:i:s');
    }

    private function sqlJadwalDokter($search)
    {

        $tanggal = '';
        if ($search['tanggal_awal'] !== '' && $search['tanggal_akhir'] !== '') :
            $tanggal = " and (jd.tanggal BETWEEN '" . date2mysql($search['tanggal_awal']) . " 00:00:00' AND '" . date2mysql($search['tanggal_akhir']) . " 23:59:59' )";
        endif;
		
		$this->db->select(" DISTINCT jd.id, poli.nama poli,  jd.kode_bpjs_poli,jd.kode_bpjs_dokter, jd.id, case
                        when to_char(jd.tanggal, 'Day')='Monday   ' then 'Senin' 
                        when to_char(jd.tanggal, 'Day')='Tuesday  ' then 'Selasa' 
                        when to_char(jd.tanggal, 'Day')='Wednesday' then 'Rabu'  
                        when to_char(jd.tanggal, 'Day')='Thursday ' then 'Kamis' 
                        when to_char(jd.tanggal, 'Day')='Friday   ' then 'Jumat' 
                        when to_char(jd.tanggal, 'Day')='Saturday ' then 'Sabtu' 
                        when to_char(jd.tanggal, 'Day')='Sunday   ' then 'Minggu' 
                        else '-' end hari, jd.tanggal, pg.nama dokter,  jd.kuota, jd.jml_kunjung,
                        jd.id_poli,jd.id_dokter, sp2.nama unit_kerja, jd.logs, jd.created_user, jd.created_date,
                        (coalesce(jjd.jml_dr_ck,0)+coalesce(jjd.jml_drlog_ck,0)+coalesce(jjd.jml_wa,0)+coalesce(jjd.jml_konsul,0)) ab_checkin,
                        jd.jml_kunjung- (coalesce(jjd.jml_dr_ck,0)+coalesce(jjd.jml_drlog_ck,0)+coalesce(jjd.jml_wa,0)+coalesce(jjd.jml_konsul,0)) ab_booking,
                        jd.shift_poli, TO_CHAR(jd.time_start, 'HH24:MI') time_start, TO_CHAR(jd.time_end, 'HH24:MI') time_end ",false);
        $this->db->from('sm_spesialisasi poli');
        $this->db->join('sm_jadwal_dokter jd', 'poli.id=jd.id_poli '.$tanggal, 'left');
        $this->db->join('sm_spesialisasi sp', 'jd.id_poli= sp.id ', 'left');
        $this->db->join('sm_tenaga_medis tm', 'jd.id_dokter=tm.id ', 'left');
        $this->db->join('sm_pegawai pg', 'tm.id_pegawai=pg.id', 'left');
        $this->db->join('sm_spesialisasi sp2', 'tm.id_spesialisasi= sp2.id ', 'left');
        $this->db->join('vm_jml_jadwal_dokter_2shift jjd', 'jd.id=jjd.id ', 'left');
		
        //$this->db->where("poli.is_klinik='1'");
        $this->db->where("poli.id not in ('43','57','15')"); //IGD,INFORMASI,Gigi
        
        if ($search['keyword'] !== '') :
            $this->db->like('LOWER(jd.nama_dokter)', strtolower($search['keyword']));
        endif;

        if ($search['layanan'] !== '' && isset($search['layanan'])) :
            $this->db->where('jd.id_poli', $search['layanan']);
        endif;

        if ($search['shift_poli'] !== '' && isset($search['shift_poli'])) :
            if ($search['shift_poli'] == 'Kosong') :
                $this->db->where("jd.shift_poli is null AND jd.id is not null ");
            else : 
                $this->db->where("(jd.shift_poli = '".$search['shift_poli']."' OR jd.id IS NULL OR jd.shift_poli IS NULL )");
                // $this->db->where_or('jd.id IS NULL');   
            endif;
        endif;

        // if ($search['shift_poli'] !== '' && isset($search['shift_poli'])) :
        //     if ($search['shift_poli'] == 'Kosong') :
        //         $this->db->where("jd.shift_poli is null AND jd.id is not null ");
        //     elseif ($search['shift_poli'] == 'Pagi') : 
        //         $this->db->where('jd.shift_poli != ', 'Sore');
        //     elseif ($search['shift_poli'] == 'Sore') : 
        //         $this->db->where('jd.shift_poli != ', 'Pagi');	
        //     endif;
        // endif;
        
        // print_r($this->db->last_query());  
        // return $this->db->order_by('poli.nama,jd.tanggal, pg.nama', 'asc');
        return $this->db->order_by('poli.nama,jd.tanggal, jd.id, pg.nama', 'asc');
        
    }

    private function history_jadwal ($id, $tanggal){
        $sql = "select pg.nama, count(*) jumlah,
                sum(case when ab.status='Booking' then 1 else 0 end) jumlah_booking,
                sum(case when ab.status='Check In' then 1 else 0 end) jumlah_chickin
                from sm_antrian_bpjs ab
                LEFT JOIN sm_tenaga_medis tm on ab.id_dokter=tm.id LEFT JOIN sm_pegawai pg on tm.id_pegawai =pg.id
                where ab.id_dokter in (SELECT id_dokter from sm_jadwal_dokter WHERE id='".$id."') AND ab.tanggal_kunjungan='".$tanggal."' group by pg.nama
                UNION
                select pg.nama, count(*) jumlah,
                sum(case when ab.status='Booking' then 1 else 0 end) jumlah_booking,
                sum(case when ab.status='Check In' then 1 else 0 end) jumlah_chickin from sm_antrian_bpjs ab
                LEFT JOIN sm_tenaga_medis tm on ab.id_dokter=tm.id LEFT JOIN sm_pegawai pg on tm.id_pegawai =pg.id
                where ab.id_dokter in (SELECT jdl.id_dokter FROM sm_jadwal_dokter jd 
                LEFT JOIN sm_jadwal_dokter_log jdl on jd.id=jdl.id_lama WHERE jd.id='".$id."') AND ab.tanggal_kunjungan='".$tanggal."' group by pg.nama" ;
        return $this->db->query($sql)->result(); 
    }

    private function _listJadwalDokter($start, $limit, $search)
    {
        $this->sqlJadwalDokter($search);
        if ($limit !== 0) :
            $this->db->limit($limit, $start);
        endif;
        $query = $this->db->get()->result();
        
        foreach ($query as $i => $v){
            $history = [];
            if( !empty($v->id) ){
                $history = $this->history_jadwal($v->id,$v->tanggal);
            }
            $v->history = $history;
        }      
        return $query;
    }

    
    function getListDataJadwalDokter($start, $limit, $search)
    {
        $result['data'] = $this->_listJadwalDokter($start, $limit, $search);
        $result['jumlah'] = $this->sqlJadwalDokter($search)->get()->num_rows();
        $this->db->close();
        return $result;
    }

    public function getListKunjunganDokter($tanggal,$shift_poli)
    {
		$query = "SELECT jd.id_poli,  jd.tanggal, jd.nama_poli,jd.shift_poli, array_to_string((string_to_array(jd.nama_dokter, ' '))[1:2], ' ') AS nama_dokter, 
                jd.kuota, jd.jml_kunjung jadwal_jml, vm_jd.jumlah_kunjungan real_kunjungan
                FROM sm_jadwal_dokter jd
                LEFT JOIN vm_jml_jadwal_dokter_2shift vm_jd ON vm_jd.id = jd.id
                WHERE jd.tanggal='".$tanggal."' AND jd.shift_poli='".$shift_poli."'
                ORDER BY jd.nama_poli";			
        $data["data"]       = $this->db->query($query)->result_array();
        // $this->db->close();

        return $data;
    }

    function updateJmlKunjunganDokter($tanggal,$shift_poli)
    {
		return $this->db->query("UPDATE sm_jadwal_dokter jd
                                SET jml_kunjung = vm_jd.jumlah_kunjungan
                                FROM vm_jml_jadwal_dokter_2shift vm_jd
                                WHERE jd.id = vm_jd.id
                                    AND vm_jd.tanggal = '".$tanggal."'
                                    AND vm_jd.shift_poli = '".$shift_poli."'
                                    AND vm_jd.set_update = 1;");
    }

    function updateJadwalDokter($id, $data)
    {
        $user_log = $this->session->userdata('nama');
        $created_date_log = $this->datetime;

        $sqlLog = "INSERT INTO sm_jadwal_dokter_log (id_dokter, nama_dokter, id_poli, nama_poli, tanggal, shift_poli, time_start, time_end, kuota, jml_kunjung, kode_bpjs_poli, kode_bpjs_dokter, id_lama, created_date_log, user_log, status,created_date,created_user)
        SELECT id_dokter, nama_dokter, id_poli, nama_poli, tanggal, shift_poli, time_start, time_end, kuota, jml_kunjung, kode_bpjs_poli, kode_bpjs_dokter, id, '$created_date_log' , '$user_log', 'Edit',created_date,created_user from sm_jadwal_dokter where id = $id ";
        $this->db->query($sqlLog);

        return $this->db->where("id", $id)->update("sm_jadwal_dokter", $data);
    }

    function cekJadwalDOkter($id, $tanggal, $poli, $dokter, $shift_poli)
    {
        $this->db->select('*');
        $this->db->from('sm_jadwal_dokter');
        $this->db->where('tanggal',$tanggal);
        $this->db->where('id_poli',$poli);
        $this->db->where('id_dokter',$dokter);
        $this->db->where('id <>',$id);
        $this->db->where('shift_poli',$shift_poli);
        return $this->db->get()->row();
    }

    function getDataJadwalDokterById($id)
    {
        $this->db->select('*');
        $this->db->from('sm_jadwal_dokter');
        $this->db->where(['id' => $id]);
        return $this->db->get()->row();
    }

    function deleteJadwalDokter($id)
    {
        $user_log = $this->session->userdata('nama');
        $created_date_log = $this->datetime;

        $sql = "INSERT INTO sm_jadwal_dokter_log (id_dokter, nama_dokter, id_poli, nama_poli, tanggal, shift_poli, time_start, time_end, kuota, jml_kunjung, kode_bpjs_poli, kode_bpjs_dokter, id_lama, created_date_log, user_log, status,created_date,created_user)
        SELECT id_dokter, nama_dokter, id_poli, nama_poli, tanggal, shift_poli, time_start, time_end, kuota, jml_kunjung, kode_bpjs_poli, kode_bpjs_dokter, id, '$created_date_log' , '$user_log', 'Hapus',created_date,created_user from sm_jadwal_dokter where id = $id ";
        $this->db->query($sql);

        return $this->db->where("id", $id)->delete("sm_jadwal_dokter");
    }

    function getAutoDokterSpesialisasi($q, $id_dokter, $start, $limit)
    {
        $where = '';
        $limit = " limit " . $limit . " offset " . $start;
        $select = "select pg.nama, coalesce(sp.nama, '-') as spesialisasi, tm.id ,tm.kode_bpjs ";
        $count = "select count(pg.id) as count ";
        $sql = "from sm_tenaga_medis as tm
                join sm_pegawai as pg on pg.id = tm.id_pegawai
                left join sm_spesialisasi as sp on sp.id = tm.id_spesialisasi
                where pg.nama ilike ('%$q%') and pg.id_jabatan in ('46','47','53')";

        if ($id_dokter !== '') {	
            $where =' and tm.id_spesialisasi ='.$id_dokter;
        }        
        
        $order =' order by pg.nama asc';

        // echo $select . $sql . $where . $order . $limit; die;

        $data['data'] = $this->db->query($select . $sql . $where . $order . $limit)->result();
        $data['total'] = $this->db->query($count . $sql . $where)->row()->count;
        return $data;
    }

    function getPoli($q, $start, $limit)
    {
		// is_klinik='1' and 
        $where = '';
        $limit = " limit " . $limit . " offset " . $start;
        $select = "select id,nama,kode_bpjs ";
        $count = "select count(id) as count ";
        $sql = "from sm_spesialisasi 
                where nama ilike ('%$q%') and id not in ('43','57')";     
        
        $order =' order by nama asc';

        // echo $select . $sql . $where . $order . $limit; die;

        $data['data'] = $this->db->query($select . $sql . $where . $order . $limit)->result();
        $data['total'] = $this->db->query($count . $sql . $where)->row()->count;
        return $data;
    }

    function simpanJadwalDokter($data)
    {
        $status ='';
        $created_user = $this->session->userdata('nama');
        $created_date = $this->datetime;

        if (is_array($data['id_dokter'])) :
            foreach ($data['id_dokter'] as $i => $value) :
				$ceksql = "select count(id) count from sm_jadwal_dokter ";				
                $cekwhere= "where tanggal='" . $data['tanggal'][$i] . "' and id_poli='" . $data['id_poli'][$i] . "' and id_dokter='" . $data['id_dokter'][$i]. "' and shift_poli='" . $data['shift_poli'][$i]. "'";  
				$jmljadwal = $this->db->query($ceksql . $cekwhere)->row()->count;

				if ($jmljadwal=='0'){
					$insert = array(
						'tanggal'          => $data['tanggal'][$i],
						'nama_dokter'      => $data['nama_dokter'][$i],
						'id_dokter'        => $data['id_dokter'][$i],
						'kode_bpjs_dokter' => $data['kode_bpjs_dokter'][$i],
						'nama_poli'        => $data['nama_poli'][$i],
						'id_poli'          => $data['id_poli'][$i],
						'kode_bpjs_poli'   => $data['kode_bpjs_poli'][$i],
						'shift_poli'       => $data['shift_poli'][$i],
						'time_start'       => $data['time_start'][$i],
						'time_end'         => $data['time_end'][$i],
						'kuota'            => $data['kuota'][$i],
						'created_date'     => $created_date,
						'created_user'     => $created_user,
					); 
					
					if (isset($data['post'])) :
						$insert['post'] = $data['post'][0];
					endif;
					$this->db->insert('sm_jadwal_dokter', $insert);
					$status = 'Success';
				} else {
					$status = 'Info';
				}
            endforeach;
        endif;
        return $status;
    }

    function getHistoryJadwalDokter($id,$start, $limit)
    {
        $result['data'] = $this->_listHistoryJadwalDokter($id,$start, $limit);
        $result['jumlah'] = $this->sqlHistoryJadwalDokter($id)->get()->num_rows();
        $this->db->close();
        return $result;
    }

    private function _listHistoryJadwalDokter($id,$start, $limit)
    {
        $this->sqlHistoryJadwalDokter($id);
        // if ($limit !== 0) :
        //     $this->db->limit($limit, $start);
        // endif;
        return $this->db->get()->result();
    }

    private function sqlHistoryJadwalDokter($id)
    {
        $this->db->select("id, id_dokter, nama_dokter, kode_bpjs_dokter, id_poli, nama_poli, kode_bpjs_poli,
                            tanggal, kuota, jml_kunjung, id_lama, created_date_log, user_log, status, created_date,
                            created_user, shift_poli, TO_CHAR(time_start, 'HH24:MI') time_start, TO_CHAR(time_end, 'HH24:MI') time_end");
        $this->db->from('sm_jadwal_dokter_log');
        $this->db->where('id_lama', $id);
        return $this->db->order_by('created_date_log', 'desc');
        
    }
	
	function getDataJadwalMinus()
    {
        $sql = "select vmjd.tanggal,vmjd.nama_poli,vmjd.nama_dokter,jd.nama_dokter nama_dokter_log_double
                FROM vm_jadwal_dokter_ubah_dokter vmjd
                join sm_jadwal_dokter jd on vmjd.tanggal=jd.tanggal AND vmjd.id_dokter_log=jd.id_dokter  
                AND to_char(vmjd.tanggal, 'YYYY-mm-dd') >= to_char(NOW(), 'YYYY-mm-dd') ";
        return $this->db->query($sql)->result();
    }

    function getDataJadwalDouble()
    {
        $sql = "SELECT jd.id,jd.tanggal,jd.nama_poli,jd.nama_dokter, x.banyak_dokter_berubah FROM (
                    SELECT z.id_lama, COUNT(z.nama_dokter) AS banyak_dokter_berubah
                    FROM (
                            SELECT DISTINCT jdl.id_lama, jdl.tanggal, jdl.nama_poli, jdl.nama_dokter
                            FROM sm_jadwal_dokter_log jdl
                            WHERE to_char(jdl.tanggal, 'YYYY-mm-dd') >= to_char(NOW(), 'YYYY-mm-dd')
                            ORDER BY jdl.tanggal, jdl.nama_poli
                    ) z
                    GROUP BY z.id_lama
                HAVING COUNT(z.nama_dokter) > 2
                ) x
                JOIN sm_jadwal_dokter jd on x.id_lama=jd.id";
        return $this->db->query($sql)->result();
    }

    function getDataJadwalHistory()
    {
        $sql = "SELECT jd.tanggal,jd.nama_poli,jd.nama_dokter,jdl.nama_dokter nama_dokter_log,jd.id,jdl.id id_log FROM sm_jadwal_dokter_log jdl 
                join sm_jadwal_dokter jd on jdl.id_dokter=jd.id_dokter and jdl.tanggal=jd.tanggal and jdl.id_lama <> jd.id
                where to_char(jdl.tanggal, 'YYYY-mm-dd') >=  to_char(NOW(), 'YYYY-mm-dd')";
        return $this->db->query($sql)->result();
    }
	
	function getDataJadwalDuplicate()
    {
        $sql = "SELECT tanggal,nama_poli,nama_dokter,jml FROM (
                SELECT jd.nama_dokter,jd.tanggal,jd.nama_poli, count(*) jml from sm_jadwal_dokter jd
                where to_char(jd.tanggal, 'YYYY-mm-dd') >=  to_char(NOW(), 'YYYY-mm-dd')
                GROUP BY jd.nama_dokter,jd.tanggal,jd.nama_poli)z
                where jml>1";
        return $this->db->query($sql)->result();
    }
}
