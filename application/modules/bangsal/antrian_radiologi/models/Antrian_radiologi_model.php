<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Antrian_radiologi_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->datetime = date('Y-m-d H:i:s');
        $this->date     = date('Y-m-d');
    }
  
    function getDetailAntrianPasien($id_pendaftaran,$id_layanana_pendaftaran,$id_order) 
    {
        $sql = "select odrad.id, pd.id as id_pendaftaran, odrad.id_layanan_pendaftaran, odrad.waktu_order,
                odrad.jenis,  odrad.item, p.id as no_rm, p.nama as pasien, p.kelamin, p.tanggal_lahir,
                COALESCE(sp.nama, '') as layanan, COALESCE(pg.nama, '') as dokter, lp.jenis_layanan, 
                (null) as ruang_radiologi, (null) as item_pemeriksaan
                from sm_order_radiologi as odrad 
                join sm_layanan_pendaftaran as lp on (lp.id = odrad.id_layanan_pendaftaran) 
                join sm_pendaftaran as pd on (pd.id = lp.id_pendaftaran) 
                join sm_pasien as p on (p.id = pd.id_pasien) 
                left join sm_spesialisasi as sp on (sp.id = lp.id_unit_layanan) 
                left join sm_tenaga_medis as tm on (tm.id = odrad.id_dokter) 
                left join sm_pegawai as pg on (pg.id = tm.id_pegawai)
                where odrad.id = '".$id_order."'";
        $data = $this->db->query($sql)->row();

        $this->db->select("'' ruangan");
        $sm_ruang_radiologi = $this->db->get()->row();

        $sm_ruang_radiologi->id_ruang_1 ='Tidak';
        $sm_ruang_radiologi->id_ruang_2A='Tidak';
        $sm_ruang_radiologi->id_ruang_2B='Tidak';
        $sm_ruang_radiologi->id_ruang_3 ='Tidak';
        $sm_ruang_radiologi->id_ruang_4 ='Tidak';
        $sm_ruang_radiologi->id_ruang_5 ='Tidak';

        if ($data){
            if($data->item !== null && $data->item !== ''){
                $dataTarif = json_decode($data->item);
                $item = array();
                foreach ($dataTarif as $tarif){
                    $this->db->select("tp.id, l.id_parent, l.nama as layanan, '' as penjamin, 'tidak' as cito, tp.jenis, COALESCE(k.nama, '') as kelas, tp.total");
                    $this->db->from("sm_tarif_pelayanan as tp");
                    $this->db->join("sm_layanan as l", "l.id = tp.id_layanan");
                    $this->db->join("sm_kelas as k", "k.id = tp.id_kelas");
                    $this->db->where("tp.id", $tarif->item);
                    $order = $this->db->get()->row();

                    $this->db->select("dr.id,rr.id id_ruang_radiologi, rr.nama_ruangan, am.name_modality, p.nama as nama_pegawai, sr.id_dokter_pjwb as id_dpjp, dr.respon");
                    $this->db->from("sm_detail_radiologi as dr");
                    $this->db->join("sm_radiologi as sr", "sr.id = dr.id_radiologi", 'left');
                    $this->db->join("sm_order_radiologi as odrad", "odrad.id = sr.id_order_radiologi", 'left');
                    $this->db->join("sm_tenaga_medis as tm", "tm.id = sr.id_dokter_pjwb", 'left');
                    $this->db->join("sm_pegawai as p", "p.id = tm.id_pegawai", 'left');
                    $this->db->join("sm_ruang_radiologi as rr", "rr.id = dr.ruangan", 'left');
                    $this->db->join("sm_alat_modality as am", "am.id = rr.id_alat", 'left');
                    $this->db->where("dr.id_tarif", $tarif->item);
                    $this->db->where("odrad.id", $data->id);
                    $konfirmOrder = $this->db->get()->row();
    
                    if($konfirmOrder !== null){
                        $idKonfirm = $konfirmOrder->id;
                        $namaRuangan = $konfirmOrder->nama_ruangan.' - '.$konfirmOrder->name_modality;
                        $namaPegawai = $konfirmOrder->nama_pegawai;
                        $respon = $konfirmOrder->respon;
                        $idRuang = null;
                        $idRuangRadiologi = $konfirmOrder->id_ruang_radiologi;
                    } else {
                        $idKonfirm = null;
                        if($order->id_parent !== 99 && $order->id_parent !== 4947){
                            $this->db->select("rr.id, rr.nama_ruangan");
                            $this->db->from("sm_tarif_pelayanan as tp");
                            $this->db->join("sm_layanan as l", "l.id = tp.id_layanan", "left");
                            $this->db->join("sm_ruang_radiologi as rr", "l.id_parent = rr.id_layanan", "left");
                            $this->db->where("tp.id", $tarif->item);
                            $namaRuang = $this->db->get()->row();

                            $namaRuangan = $namaRuang->nama_ruangan;
                            $idRuang = $namaRuang->id;
                            $idRuangRadiologi = $namaRuang->id;

                        } else {
                            $namaRuangan = null;
                            $idRuang = null;
                            $idRuangRadiologi = null;
                        }
                        $namaPegawai = null;
                        $respon = null;
                    }

                    
                    $order->konfirm = $idKonfirm;
                    $order->ruang = $namaRuangan;
                    $order->dpjp = $namaPegawai;
                    $order->respon = $respon;
                    $order->id_ruang = $idRuang;
                    $order->id_ruang_radiologi = $idRuangRadiologi;
                    $item[] = $order;

                         if($idRuangRadiologi=== "5" && $idKonfirm!= null){ $sm_ruang_radiologi->id_ruang_1 ='Ya'; }
                    else if($idRuangRadiologi=== "7" && $idKonfirm!= null){ $sm_ruang_radiologi->id_ruang_2A='Ya'; }
                    else if($idRuangRadiologi=== "1" && $idKonfirm!= null){ $sm_ruang_radiologi->id_ruang_2B='Ya'; }
                    else if($idRuangRadiologi=== "4" && $idKonfirm!= null){ $sm_ruang_radiologi->id_ruang_3 ='Ya'; }
                    else if($idRuangRadiologi=== "8" && $idKonfirm!= null){ $sm_ruang_radiologi->id_ruang_4 ='Ya'; }
                    else if($idRuangRadiologi=== "3" && $idKonfirm!= null){ $sm_ruang_radiologi->id_ruang_5 ='Ya'; }
                }   
                $data->item_pemeriksaan = $item;

                $item_ruang_radiologi[] = $sm_ruang_radiologi;
                $data->ruang_radiologi = $item_ruang_radiologi;
            }
        }

        $this->db->close();
        return $data;
    }
    
    public function cekAntrianRadiologi( $tanggal, $kode_ruangan ) {
		$query = $this->db->select( "max(urutan) as urutan" )
		                  ->from( 'sm_antrian_radiologi' )
		                  ->where( 'tanggal_kunjungan', $tanggal )
		                  ->where( 'kode_ruangan', $kode_ruangan )
		                  ->get();

		if ( $query !== NULL )
		{
			$unit         = $query->row();
			$next_antrian = $unit->urutan + 1;
		} else
		{
			$next_antrian = 1;
		}

		return $next_antrian;
	}   

    function getListDetailAntrianRad($start, $limit, $search)
    {
        $result['data'] = $this->_listDetailAntrianRad($start, $limit, $search);
        $result['jumlah'] = $this->sqlListDetailAntrianRad($search)->get()->num_rows();
        $this->db->close();
        return $result;
    }

    private function _listDetailAntrianRad($start, $limit, $search)
    {
        $this->sqlListDetailAntrianRad($search);
        if ($limit !== 0) :
            $this->db->limit($limit, $start);
        endif;
        return $this->db->get()->result();
    }

    function getCekAntrianByRuangan($id_pendaftaran,$id_layanana_pendaftaran,$id_order_radiologi,$id_ruangan_rad)
    {
        $data = $this->db->select(" anrad.id, anrad.id_pendaftaran, anrad.id_layanan_pendaftaran, anrad.id_order_radiologi, anrad.id_ruang_radiologi, anrad.ruang_radiologi, anrad.tanggal_kunjungan,
                                    anrad.kode_ruangan, anrad.urutan, anrad.nomor_antrian, anrad.status_antrian, anrad.waktu_panggil, anrad.jumlah_panggil, anrad.cetak, anrad.created_date, anrad.id_user,
                                    anrad.keterangan_batal, anrad.cancel_date, pg.nama user_cancel ")
                    ->from('sm_antrian_radiologi anrad')
                    ->join('sm_pegawai pg', 'anrad.id_user_cancel=pg.id', 'left')
                    ->where('anrad.id_pendaftaran', $id_pendaftaran)
                    ->where('anrad.id_layanan_pendaftaran', $id_layanana_pendaftaran)
                    ->where('anrad.id_order_radiologi', $id_order_radiologi)
                    ->where('anrad.id_ruang_radiologi', $id_ruangan_rad)
                    ->where("anrad.status_antrian != 'Batal' ")
                    ->get()
                    ->row();
        $this->db->close();

        if (0 < count((array)$data)) :
            $status          = true;
            $ruang_radiologi = $data->ruang_radiologi;
            $nomor_antrian   = $data->nomor_antrian;
        else :
            $status          = false;
            $ruang_radiologi = '';
            $nomor_antrian   = '';
        endif;

        return array('status' => $status, 'ruang_radiologi' => $ruang_radiologi, 'nomor_antrian' => $nomor_antrian);
    }

    private function sqlListDetailAntrianRad($search)
    {

        $this->db->select(" anrad.id, anrad.id_pendaftaran, anrad.id_layanan_pendaftaran, anrad.id_order_radiologi, anrad.id_ruang_radiologi, anrad.ruang_radiologi, anrad.tanggal_kunjungan,
                            anrad.kode_ruangan, anrad.urutan, anrad.nomor_antrian, anrad.status_antrian, anrad.waktu_panggil, anrad.jumlah_panggil, anrad.cetak, anrad.created_date, anrad.id_user,
                            anrad.keterangan_batal, anrad.cancel_date, pg.nama user_cancel ");
        $this->db->from('sm_antrian_radiologi anrad')
                 ->join('sm_pegawai pg', 'anrad.id_user_cancel=pg.id', 'left');

        if ($search['id_pendaftaran'] !== '' && isset($search['id_pendaftaran'])) :
            $this->db->where('anrad.id_pendaftaran', $search['id_pendaftaran']);
        endif;

        if ($search['id_layanan_pendaftaran'] !== '' && isset($search['id_layanan_pendaftaran'])) :
            $this->db->where('anrad.id_layanan_pendaftaran', $search['id_layanan_pendaftaran']);
        endif;

        if ($search['id_order_radiologi'] !== '' && isset($search['id_order_radiologi'])) :
            $this->db->where('anrad.id_order_radiologi', $search['id_order_radiologi']);
        endif;     
        
        $this->db->where('anrad.tanggal_kunjungan', $this->date);
        
        return $this->db->order_by('anrad.created_date', 'desc');
    }
    
    function antrianRadiologiById($id)
    {
        return $this->db->select(" anrad.id, anrad.id_pendaftaran, anrad.id_layanan_pendaftaran, anrad.id_order_radiologi, anrad.id_ruang_radiologi,  rrad.no_ruangan, anrad.ruang_radiologi, anrad.tanggal_kunjungan,
                                    anrad.kode_ruangan, anrad.urutan, anrad.nomor_antrian, anrad.status_antrian, anrad.waktu_panggil, anrad.jumlah_panggil, anrad.cetak, anrad.created_date, anrad.id_user, 
                                    to_char(anrad.created_date, 'DD/MM/YYYY HH:MM:SS') created_date2, ps.id id_pasien, ps.nama nama_pasien")
                    ->from('sm_antrian_radiologi anrad')
                    ->join('sm_pendaftaran pd', 'anrad.id_pendaftaran=pd.id', 'left')
                    ->join('sm_pasien ps', 'pd.id_pasien=ps.id', 'left')
                    ->join('sm_ruang_radiologi rrad', 'anrad.id_ruang_radiologi=rrad.id', 'left')
                    ->where('anrad.id', $id)
                    ->get()
                    ->row();
        $this->db->close();
    }

    function tambahCetakAntrianRadiologi($id = 0) 
    {
        $print_number = 0;
        $data = $this->db->where('id', $id, true)->select('cetak')->get('sm_antrian_radiologi')->row();
        if (0 < count((array)$data)) :
            $status = true;
            $print_number = $data->cetak + 1;
            $data_update = array('cetak' => $print_number);
            $this->db->where('id', $id, true)->update('sm_antrian_radiologi', $data_update);
        else :
            $status = false;
        endif;

        return array('status' => $status, 'cetakan' => $print_number);
    }

    function pembatalanAntrianRadiologi($id_antrian, $data)
    {
        $this->db->trans_begin();
        $this->db->where("id", $id_antrian)->update("sm_antrian_radiologi", $data);
        if ($this->db->trans_status() === false) :
			$this->db->trans_rollback();
			$status = false;
			$message = 'Gagal melakukan pembatalan antrian radiologi';
		else :
			$this->db->trans_commit();
			$status = true;
			$message = 'Berhasil melakukan pembatalan antrian radiologi';
		endif;

		return array('status' => $status, 'message' => $message);
    }

    function getListAntrianRadiologi($start, $limit, $search)
    {
        $result['data'] = $this->_listAntrianRadiologi($start, $limit, $search);
        $result['jumlah'] = $this->sqlListAntrianRadiologi($search)->get()->num_rows();
        $this->db->close();
        return $result;
    }

    private function _listAntrianRadiologi($start, $limit, $search)
    {
        $this->sqlListAntrianRadiologi($search);
        if ($limit !== 0) :
            $this->db->limit($limit, $start);
        endif;
        return $this->db->get()->result();
    }
    
    private function sqlListAntrianRadiologi($search)
    {
        $this->db->select(" anrad.id, anrad.id_pendaftaran, anrad.id_layanan_pendaftaran, anrad.id_order_radiologi, anrad.id_ruang_radiologi, anrad.ruang_radiologi, 
                            anrad.tanggal_kunjungan, anrad.kode_ruangan, anrad.urutan, anrad.nomor_antrian, anrad.status_antrian, anrad.waktu_panggil, anrad.jumlah_panggil,
                            anrad.created_date, pg.nama nama_user, anrad.cetak, anrad.keterangan_batal, anrad.cancel_date, pgc.nama user_cancel,
                            ps.id id_pasien, ps.nama nama_pasien, orad.waktu_order, 
                            lp.id_unit_layanan, CONCAT_WS(' ', lp.jenis_layanan, sp.nama) as layanan, pd.jenis_igd, COALESCE(bg.nama, '') as bangsal ");

        $this->db->from('sm_antrian_radiologi anrad')
                 ->join('sm_pendaftaran pd', 'anrad.id_pendaftaran=pd.id', 'left')
                 ->join('sm_layanan_pendaftaran lp', 'anrad.id_layanan_pendaftaran=lp.id', 'left')
                 ->join('sm_pasien ps', 'pd.id_pasien=ps.id', 'left')
                 ->join('sm_order_radiologi orad', 'anrad.id_order_radiologi=orad.id', 'left')
                 ->join('sm_pegawai pg', 'anrad.id_user=pg.id', 'left')
                 ->join('sm_pegawai pgc', 'anrad.id_user_cancel=pgc.id', 'left')
                 ->join('sm_rawat_inap ri', 'ri.id_layanan_pendaftaran = lp.id', 'left')
                 ->join('sm_bangsal as bg', 'bg.id = ri.id_bangsal', 'left')
                 ->join('sm_spesialisasi as sp', 'sp.id = lp.id_unit_layanan', 'left');

        $this->db->where('anrad.id is not null');

        if ($search['tanggal'] !== '' && isset($search['tanggal'])) :        
            $this->db->where(" anrad.tanggal_kunjungan " , date2mysql($search['tanggal']));
        endif;

        if ($search['ruang_radiologi'] !== '' && isset($search['ruang_radiologi'])) :        
            $this->db->where(" anrad.id_ruang_radiologi " , $search['ruang_radiologi']);
        endif;

        if ($search['filter_panggil'] !== '' && isset($search['filter_panggil'])) :
            $search['filter_panggil'] == '1' ? $this->db->where('(anrad.jumlah_panggil <= 0 or anrad.jumlah_panggil is null)') : '' ; //Belum dipanggil
            $search['filter_panggil'] == '2' ? $this->db->where('anrad.jumlah_panggil >= 1') : '' ;  //Sudah dipanggil     
        endif;

        if ($search['status_antrian'] !== '' && isset($search['status_antrian'])) :
            $search['status_antrian'] == '1' ? $this->db->where("(anrad.status_antrian = 'Belum'  or anrad.status_antrian is null)") : '' ; //Belum
            $search['status_antrian'] == '2' ? $this->db->where("anrad.status_antrian = 'Sudah' ") : '' ;  //Sudah          
            $search['status_antrian'] == '3' ? $this->db->where("anrad.status_antrian = 'Batal' ") : '' ;  //Batal        
        endif;

        if ($search['keyword'] !== '' && isset($search['keyword'])) :
			if (is_numeric($search['keyword'])) :
				$this->db->where("ps.id ilike ('%" . $search["keyword"] . "')");
			else :
				$this->db->where("ps.nama ilike ('%" . $search["keyword"] . "%')");
			endif;

        endif;
	
        $this->db->order_by('orad.waktu_order', 'asc');
        $this->db->order_by('anrad.ruang_radiologi', 'asc');
        return $this->db->order_by('ps.nama', 'asc');
    }

    function getDetailOrderRadiologi($id,$type)
    {

        if($type=='id_order_radiologi'){
            $where= " orad.id='".$id."' ";
        } else {
            $where= " ps.id='".$id."' "; //id_pasien
        }

        $sql = "select orad.id, orad.waktu_order, UPPER(orad.status) status,
                pd.id id_pendaftaran, lp.id id_layanan_pendaftaran,
                case WHEN CONCAT_WS(' ', lp.jenis_layanan, sp.nama) = 'Rawat Inap' then concat('Rawat Inap ',COALESCE(bg.nama, '')) 
                when CONCAT_WS(' ', lp.jenis_layanan, sp.nama) = 'IGD' then concat('IGD ',pd.jenis_igd) 
                else CONCAT_WS(' ', lp.jenis_layanan, sp.nama) end jenis_layanan
                from sm_order_radiologi orad
                join sm_layanan_pendaftaran lp on orad.id_layanan_pendaftaran=lp.id
                join sm_pendaftaran pd on lp.id_pendaftaran=pd.id
                join sm_pasien ps on pd.id_pasien=ps.id
                left join sm_rawat_inap ri on ri.id_layanan_pendaftaran = lp.id
                left join sm_bangsal as bg on bg.id = ri.id_bangsal
                left join sm_spesialisasi as sp on sp.id = lp.id_unit_layanan	
                where ".$where."     
                GROUP BY orad.id, lp.id, jenis_layanan, sp.nama, bg.nama,pd.jenis_igd, pd.id, lp.id
                ORDER BY orad.waktu_order DESC ";
        $query = $this->db->query($sql);
        $this->db->close();
        return $query;
    }

    function dataDelayPanggilan($waktu_sekarang) {
		return $this->db->select( "waktu_panggil, '".$waktu_sekarang."' waktu_sekarang,
                                   ROUND(EXTRACT(EPOCH FROM ('".$waktu_sekarang."'-waktu_panggil)) )AS selisih_detik" )
		                ->from('sm_panggil_pasien_radiologi' )
		                ->order_by('id', 'desc')
                        ->limit(1)
		                ->get()->row();
	}   

    function dataPanggilAntrian() {
		return $this->db->select( "arad.id, arad.nomor_antrian, arad.ruang_radiologi,trad.jenis_panggil " )
		                ->from( 'sm_antrian_radiologi arad' )
		                ->join( 'sm_tunda_panggilan_radiologi trad', 'arad.id =trad.id_antrian', 'left' )
		                ->where( "trad.waktu_panggil BETWEEN '" . $this->date . " 00:00:00' AND '" . $this->date . " 23:59:59'" )
		                ->where( 'trad.id is not null' )
		                ->where( 'trad.status_panggil','1' )
		                ->where( 'arad.status_antrian !=','Batal' )
		                ->order_by( 'trad.created_date', 'ASC' )
		                ->limit( 1 )->get()->row();
	}

    function dataPanggilAntrianAktif() {
		return $this->db->select( "arad.id, arad.nomor_antrian, arad.ruang_radiologi,trad.jenis_panggil " )
		                ->from( 'sm_antrian_radiologi arad' )
		                ->join( 'sm_tunda_panggilan_radiologi trad', 'arad.id =trad.id_antrian', 'left' )
		                ->where( "trad.waktu_panggil BETWEEN '" . $this->date . " 00:00:00' AND '" . $this->date . " 23:59:59'" )
		                ->where( 'trad.id is not null' )
		                ->where( 'trad.status_panggil','0' )
		                ->where( 'arad.status_antrian !=','Batal' )
		                ->order_by( 'trad.created_date', 'DESC' )
		                ->limit( 1 )->get()->row();
	}

    function dataPanggilPerRuang($ruang,$type) {
		$this->db->select( "arad.id, arad.nomor_antrian " )
                 ->from( 'sm_antrian_radiologi arad' )
                 ->join( 'sm_tunda_panggilan_radiologi trad', 'arad.id =trad.id_antrian', 'left' )
                 ->where( "trad.waktu_panggil BETWEEN '" . $this->date . " 00:00:00' AND '" . $this->date . " 23:59:59'" )
                 ->where( 'trad.id is not null' )
                 ->where( 'arad.id_ruang_radiologi', $ruang );

        if($type=='panggil'){
            $this->db->where( 'trad.status_panggil', '0' );
            $this->db->order_by( 'arad.id', 'desc' );
        } else {
            $this->db->where( 'trad.status_panggil', '1' );
            $this->db->order_by( 'arad.id', 'asc' );
        }            

		return  $this->db->limit( 1 )->get()->row();
	}

    function getStatusPanggil() {   
        $sql = "SELECT count(id) jml FROM sm_tunda_panggilan_radiologi
                where to_char(waktu_panggil, 'YYYY-MM-DD') = to_char(NOW(), 'YYYY-MM-DD') and status_panggil='1' order by id asc limit 1";
        $query = $this->db->query($sql);
        $this->db->close();
        return $query;
    }

    function getAntrianCall($ruang) {
		return $this->db->select( "arad.nomor_antrian " )
		                ->from( 'sm_antrian_radiologi arad' )
		                ->where( 'arad.id_ruang_radiologi',$ruang )
		                ->where( "to_char(NOW(),'yyyy-mm-dd') = to_char(arad.tanggal_kunjungan,'yyyy-mm-dd')" )
		                ->where( 'arad.jumlah_panggil is null' )
		                ->order_by( 'arad.created_date', 'ASC' )
		                ->limit( 1 )->get()->row();
	}

    function getAntrianReCall($ruang) {
		return $this->db->select( "arad.nomor_antrian " )
		                ->from( 'sm_antrian_radiologi arad' )
		                ->where( 'arad.id_ruang_radiologi',$ruang )
		                ->where( "to_char(NOW(),'yyyy-mm-dd') = to_char(arad.tanggal_kunjungan,'yyyy-mm-dd')" )
		                ->where( 'arad.jumlah_panggil is not null' )
		                ->order_by( 'arad.created_date', 'DESC' )
		                ->limit( 1 )->get()->row();
	}

    function getAntrianSisa($ruang) {
		return $this->db->select( "count(*) jumlah " )
		                ->from( 'sm_antrian_radiologi arad' )
		                ->where( 'arad.id_ruang_radiologi',$ruang )
		                ->where( "to_char(NOW(),'yyyy-mm-dd') = to_char(arad.tanggal_kunjungan,'yyyy-mm-dd')" )
		                ->where( 'arad.jumlah_panggil is null' )
		                ->get()->row();
	}
    
}
