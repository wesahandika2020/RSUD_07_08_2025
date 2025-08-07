<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Surat_ket_kontrol_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->datetime = date('Y-m-d H:i:s');
    }
  
    private function _listDataSKK($start, $limit, $search)
    {
        $this->sqlListDataSKK($search);
        if ($limit !== 0) :
            $this->db->limit($limit, $start);
        endif;
        return $this->db->get()->result();
    }

    function getListDataSKD($start, $limit, $search)
    {
        $result['data'] = $this->_listDataSKK($start, $limit, $search);
        $result['jumlah'] = $this->sqlListDataSKK($search)->get()->num_rows();
        $this->db->close();
        return $result;
    }

    private function sqlListDataSKK($search)
    {

        $tanggal = '';
        if ($search['tanggal_awal'] !== '' && $search['tanggal_akhir'] !== '') {
            if($search['filtertgl'] == '1'){  
                $tanggal = " (skk.tanggal BETWEEN '" . date2mysql($search['tanggal_awal']) . " 00:00:00' AND '" . date2mysql($search['tanggal_akhir']) . " 23:59:59' )";
            } else {
                $tanggal = " (skk.created_date BETWEEN '" . date2mysql($search['tanggal_awal']) . " 00:00:00' AND '" . date2mysql($search['tanggal_akhir']) . " 23:59:59' )";
            }
        }

        $this->db->select(" skk.id_pendaftaran,skk.id_layanan_pendaftaran,skk.id, ps.id id_pasien,ps.nama nama_pasien,pd.no_polish,
                            to_char(pd.tanggal_daftar,'dd-mm-YYYY HH24:MI:SS') tanggal_daftar , skk.jenis,
                            to_char( skk.tanggal, 'dd-mm-YYYY' ) tanggal, 
                            skk.id_spesialisasi_asal, spa.nama poli_asal, pga.nama dokter_asal,
                            skk.id_spesialisasi, sp.nama poli_tujuan, pg.nama dokter_tujuan,
                            skk.alasan_kontrol, skk.rencana_tindak_lanjut,
                            skk.jenis_bantuan, skk.dirawat_dengan, skk.keterangan,
                            CASE WHEN skk.prb = '1' THEN 'Ya' ELSE'Tidak' END prb,
                            skk.created_date, pg2.nama nama_user,ski.id id_kontrol_jawab,ski.pemeriksaan ,ski.saran,
                            CASE WHEN ab.id is null THEN 'Belum' ELSE 'Sudah' END booking, skb.no_surat no_surat_bpjs, ab.kode_booking, ab.status,ab.id id_antrian,skk.skb_code, skk.skb_message ");

        $this->db->from('sm_surat_kontrol skk')
                 ->join('sm_spesialisasi sp', 'skk.id_spesialisasi=sp.id', 'left')
                 ->join('sm_spesialisasi spa', 'skk.id_spesialisasi_asal=spa.id', 'left')
                 ->join('sm_tenaga_medis tm', 'skk.id_dokter_tujuan = tm.id', 'left')
                 ->join('sm_pegawai pg', 'tm.id_pegawai=pg.id', 'left')
                 ->join('sm_tenaga_medis tma', 'skk.id_dokter_asal = tma.id', 'left')
                 ->join('sm_pegawai pga', 'tma.id_pegawai=pga.id', 'left')
                 ->join('sm_pegawai pg2', 'skk.id_user = pg2.id', 'left')
                 ->join('sm_pendaftaran pd', 'skk.id_pendaftaran = pd.id', 'left')
                 ->join('sm_surat_kontrol_internal ski', 'skk.id=ski.id_sk', 'left')
                 ->join('sm_antrian_bpjs ab', 'skk.id = ab.id_skd', 'left')
                 ->join('sm_pasien ps', 'skk.id_pasien = ps.id', 'left')
                 ->join('sm_surat_kontrol_bpjs skb', 'skb.id = skk.id_skb', 'left');

        $this->db->where('skk.id is not null');

        if ($search['tanggal_awal'] !== '' && $search['tanggal_akhir'] !== '') :
            $this->db->where($tanggal);
        endif;

        if ($search['layanan'] !== '' && isset($search['layanan'])) :
            $this->db->where('skk.id_spesialisasi', $search['layanan']);
        endif;

        if ($search['keyword'] !== '' && isset($search['keyword'])) :
			if (is_numeric($search['keyword'])) :
				$this->db->where("ps.id ilike ('%" . $search["keyword"] . "')");
			else :
				$this->db->where("ps.nama ilike ('%" . $search["keyword"] . "%')");
			endif;
		
		
            //$this->db->where("ps.nama ilike ('%" . $search["keyword"] . "%')");
        endif;
	
        if($search['kategori'] == '2'){ //SKK dengan Dokter
            $this->db->where(" (pg.id is not null or pg.nama<>'') ");
        }

        if($search['kategori'] == '3'){ //SKK tanpa Dokter
            $this->db->where(" (pg.id is null or pg.nama='') ");
        }

        if($search['kategori'] == '4'){ //Jadwal Tidak Sesuai
			$this->db->where(" skk.id_dokter_tujuan not in ( select jd.id_dokter from sm_jadwal_dokter jd WHERE jd.id_poli = skk.id_spesialisasi AND jd.tanggal = skk.tanggal ) ");
        }

        //$this->db->order_by('pd.tanggal_daftar', 'desc');
        return $this->db->order_by('skk.tanggal', 'asc');
    }

    function getDataKetKontrol($id, $id_pendaftaran, $id_layanan_pendaftaran)
	{
		$data['surat'] = $this->db->select("sk.*, sp.nama as poli, to_char(sk.created_date, 'YYYY-MM-DD') created_date_set, pg.nama dokter_asal")
			->from('sm_surat_kontrol as sk')
			->join('sm_spesialisasi as sp', 'sp.id = sk.id_spesialisasi', 'left')
			->join('sm_tenaga_medis as tm', 'sk.id_dokter_asal = tm.id', 'left')
			->join('sm_pegawai as pg', 'tm.id_pegawai = pg.id', 'left')
			// ->where('sk.id_pendaftaran', $id_pendaftaran, true)
			// ->where('sk.id_layanan_pendaftaran', $id_layanan_pendaftaran, true)
			->where('sk.id', $id, true)
			->get()
			->row();
		$data['pasien'] = $this->db->select("p.id, p.nama, p.tanggal_lahir, p.alamat, p.kelamin")
			->from('sm_pasien as p')
			->join('sm_pendaftaran as pd', 'pd.id_pasien = p.id')
			->where('pd.id', $id_pendaftaran, true)
			->get()
			->row();
		$this->load->model('pelayanan/Pelayanan_model', 'm_pelayanan');
		$this->load->model('rekam_medis/Rekam_medis_model', 'm_rekam_medis');
		$data['diagnosa'] = $this->m_pelayanan->getDiagnosaPemeriksaan($id_layanan_pendaftaran);

		$penjualan = $this->m_rekam_medis->getObat($id_layanan_pendaftaran);
		//$data['tes'] = $this->m_rekam_medis->getObat($id_layanan_pendaftaran);
		
		if (count((array)$penjualan) > 0) :
			
			foreach ($penjualan as $val){
				$data['obat'][] = $this->m_rekam_medis->getDetailObat($val->id, 0);
			}
			// $data['obat'] = $this->m_rekam_medis->getDetailObat($penjualan->id);
			//$data['obat'] = $this->m_rekam_medis->getDetailObat('512');			
			
		endif;
		return $data;
	}

    function getDataKetKontrolInternal($id, $id_pendaftaran, $id_layanan_pendaftaran)
	{
        
        // to_char(ski.created_date, 'YYYY/MM/DD') created_date_set,
		$data['surat'] = $this->db->select("sk.*, sk.jenis_bantuan::json->>'konsul' jb_konsul, sk.jenis_bantuan::json->>'raber' jb_raber,
                                            sk.jenis_bantuan::json->>'alih' jb_alih, sp.nama as poli, pg.nama dokter_pegirim, pg2.nama dokter_penerima,
                                            to_char(sk.created_date, 'YYYY-MM-DD') created_date_set,
                                            case when ski.pemeriksaan !='' then ski.pemeriksaan else '<i>(Belum ada jawaban)</i>' end pemeriksaan,
                                            case when ski.saran !='' then ski.saran else '<i>(Belum ada jawaban)</i>' end saran")
			->from('sm_surat_kontrol as sk')
			->join('sm_spesialisasi as sp', 'sp.id = sk.id_spesialisasi', 'left')
			->join('sm_surat_kontrol_internal ski', 'sk.id=ski.id_sk', 'left')
			->join('sm_pegawai pg', 'sk.id_user = pg.id', 'left')
			->join('sm_pegawai pg2', 'ski.id_user = pg2.id', 'left')
			->where('sk.id', $id, true)
			->get()
			->row();
		$data['pasien'] = $this->db->select("p.id, p.nama, p.tanggal_lahir, p.alamat, p.kelamin")
			->from('sm_pasien as p')
			->join('sm_pendaftaran as pd', 'pd.id_pasien = p.id')
			->where('pd.id', $id_pendaftaran, true)
			->get()
			->row();
		$this->load->model('pelayanan/Pelayanan_model', 'm_pelayanan');
		$this->load->model('rekam_medis/Rekam_medis_model', 'm_rekam_medis');
		$data['diagnosa'] = $this->m_pelayanan->getDiagnosaPemeriksaan($id_layanan_pendaftaran);

		$penjualan = $this->m_rekam_medis->getObat($id_layanan_pendaftaran);
		//$data['tes'] = $this->m_rekam_medis->getObat($id_layanan_pendaftaran);
		
		if (count((array)$penjualan) > 0) :
			
			foreach ($penjualan as $val){
				$data['obat'][] = $this->m_rekam_medis->getDetailObat($val->id, 0);
			}
			// $data['obat'] = $this->m_rekam_medis->getDetailObat($penjualan->id);
			//$data['obat'] = $this->m_rekam_medis->getDetailObat('512');			
			
		endif;
		return $data;
	}

    function getTglKunjungan($idpasien)
    {
        $sql = "SELECT lp.id , to_char(p.tanggal_daftar, 'DD-MM-YYYY' ) tanggal, p.tanggal_keluar,
                case when s.nama is null then p.jenis_pendaftaran else concat( p.jenis_pendaftaran, ' (', s.nama ,')') end jenis_pendaftaran
                FROM sm_pendaftaran p
                join sm_layanan_pendaftaran lp on p.id=lp.id_pendaftaran
                left join sm_spesialisasi s on lp.id_unit_layanan=s.id
                WHERE p.id_pasien = '".$idpasien."' 
                GROUP BY p.ID, lp.id, tanggal, s.nama ORDER BY p.tanggal_daftar DESC ";
        $query = $this->db->query($sql);
        $this->db->close();
        return $query;
    }

    function getDetailKunjungan($id_layanan_pendaftaran)
    {
        $sql = "SELECT p.ID ,lp.id id_layanan_pendaftran, to_char(p.tanggal_daftar, 'DD-MM-YYYY' ) tanggal, p.tanggal_keluar,
                case when s.nama is null then p.jenis_pendaftaran else concat( p.jenis_pendaftaran, ' (', s.nama ,')') end jenis_pendaftaran,lp.status_terlayani
                FROM sm_pendaftaran p
                join sm_layanan_pendaftaran lp on p.id=lp.id_pendaftaran
                left join sm_spesialisasi s on lp.id_unit_layanan=s.id
                WHERE lp.id = '".$id_layanan_pendaftaran."' 
                GROUP BY p.ID, lp.id, tanggal, s.nama ORDER BY p.tanggal_daftar DESC ";
        $query = $this->db->query($sql);
        $this->db->close();
        return $query;
    }

    function simpanSKB($data)
    {
        $this->db->insert('sm_surat_kontrol_bpjs', $data);
        $id = $this->db->insert_id();
        return $id;
    }
}
