<?php

// use LDAP\Result;

defined('BASEPATH') or exit('No direct script access allowed');

class Rekonsiliasi_obat_model extends CI_Model
{


    function __construct()
    {
        parent::__construct();
    }

    function getKriteriaAlergi()
    {
        $data = array(
            'R'         => 'R',
            'S'         => 'S',
            'B'         => 'B'
        );

        return $data;
    }

    private function sqlAmbilDataKunjungan($search)
    {
        

        $this->db->select("pd.id, pd.id_pasien, p.nama, pd.tanggal_daftar, pd.tanggal_keluar, 
                   pd.jenis_pendaftaran, pd.jenis_rawat, pd.status as jenis_pasien, COALESCE(pj.nama, '') as penjamin", false);
        $this->db->from("sm_pendaftaran as pd");
        $this->db->join('sm_penjamin as pj', 'pj.id = pd.id_penjamin', 'left');
        $this->db->join("sm_pasien as p", "p.id = pd.id_pasien", "left");
        $this->db->where("pd.status !=", 'Batal', true);

        if($search['tgl_search'] !== ''){
            $this->db->where("pd.id", (int)$search['tgl_search'], true);
        }

        return $this->db->order_by('pd.tanggal_daftar', 'desc');
        
    }


    private function sqlCountDataKunjungan($search)
    {

        $this->db->select("count(pd.id)", false);
        $this->db->from("sm_pendaftaran as pd");
        $this->db->join('sm_penjamin as pj', 'pj.id = pd.id_penjamin', 'left');
        $this->db->join("sm_pasien as p", "p.id = pd.id_pasien", "left");
        $this->db->where("pd.id is not null");
        $this->db->where("pd.status !=", 'Batal', true);

        return $this->db->group_by('pd.id', 'desc');

    }

    private function sqlDataLayanan($id)
    {
        
        $this->db->select("lp.id, lp.id_pendaftaran, pd.id_pasien as no_rm, lp.tanggal_layanan, 
                            case when lp.id_unit_layanan is not null then concat(lp.jenis_layanan, ' (', sp.nama, ') ') else lp.jenis_layanan end as jenis_layanan, 
                            case when ri.id is not null then concat((select nama from sm_bangsal where id=ri.id_bangsal),' Ruang ',ri.no_ruang,' Bed ', ri.no_bed)
                            when ic.id is not null then concat((select nama from sm_bangsal where id=ic.id_bangsal),' Ruang ',ic.no_ruang,' Bed ', ic.no_bed) 
                            else '' end ruangan,
                            pg.nama as nama_dokter, lp.cara_bayar, lp.status_terlayani, lp.tindak_lanjut as status_keluar,							
                            case when (SELECT id FROM sm_rekonsiliasi_obat where id_layanan_pendaftaran=lp.id limit 1) is not null then 1 else 0 end is_rekonsiliasi_obat ", false);
        $this->db->from("sm_layanan_pendaftaran as lp");
        $this->db->join("sm_pendaftaran as pd", "lp.id_pendaftaran = pd.id", "left");
        $this->db->join("sm_spesialisasi as sp", "lp.id_unit_layanan = sp.id", "left");
        $this->db->join("sm_tenaga_medis as tm", "lp.id_dokter = tm.id", "left");
        $this->db->join("sm_pegawai as pg", "tm.id_pegawai = pg.id", "left");
		$this->db->join("sm_rawat_inap ri", "lp.id=ri.id_layanan_pendaftaran", "left");
        $this->db->join("sm_intensive_care ic", "lp.id=ic.id_layanan_pendaftaran", "left");
        $this->db->where("lp.status_terlayani !=", 'Batal', true);
        $this->db->where("lp.id_pendaftaran", $id, true);
        
        return $this->db->order_by('lp.tanggal_layanan', 'asc');
        
    }

    function ambilDataKunjungan($limit, $start, $search)
    {
        
        $this->sqlAmbilDataKunjungan($search);

        if ((int)$limit !== 0) :
            $this->db->limit((int)$limit, (int)$start);
        endif;

        $data = $this->db->get()->result();

        if(!empty($data)){

            foreach ($data as $a => $b) {           
				$data[$a]->rekonsiliasi_obat = 0;
                $this->sqlDataLayanan((int)$b->id);
                $data[$a]->layanan = $this->db->get()->result();
				if (!empty($data[$a]->layanan)) {
                    foreach ($data[$a]->layanan as $layanan) {
                        if ($layanan->is_rekonsiliasi_obat == 1) {
                            $data[$a]->rekonsiliasi_obat += $layanan->is_rekonsiliasi_obat;
                        }
                    }
                }
            }

            $this->sqlCountDataKunjungan($search);

            $countData = $this->db->get()->num_rows();

            $dataX['data'] = $data;
            $dataX['jumlah'] = (int)$countData;

            $this->db->close();

            return $dataX;

        }

    }

    private function sqlAmbilDataLayanan($id)
    {
        
        $this->db->select("lp.id", false);
        $this->db->from("sm_layanan_pendaftaran as lp");
        $this->db->where("lp.status_terlayani !=", 'Batal', true);
        $this->db->where("lp.id_pendaftaran", $id, true);
        
        return $this->db->order_by('lp.tanggal_layanan', 'asc');
        
    }

    private function sqlAmbilDataResep($id, $search)
    {
        
        $this->db->select("r.id, r.tanggal_resep, r.id_layanan_pendaftaran, p.nama as nama_user", false);
        $this->db->from("sm_resep as r");
        $this->db->join("sm_translucent as t", "t.id = r.id_users", "left");
        $this->db->join("sm_pegawai as p", "p.id = t.id", "left");
        $this->db->where("r.id_layanan_pendaftaran", $id, true);

        if ($search["tgl_awal"] !== "" && $search["tgl_akhir"] !== "") {
            $this->db->where("r.tanggal_resep BETWEEN '" . date2mysql($search['tgl_awal']) . " 00:00:00' AND '" . date2mysql($search['tgl_akhir']) . " 23:59:59'");
        }
        
        return $this->db->order_by('r.tanggal_resep', 'asc');
        
    }

    private function sqlAmbilResepR($id)
    {
        
        $this->db->select("r.id", false);
        $this->db->from("sm_resep_r as r");
        $this->db->where("r.id_resep", $id, true);
        
        return $this->db->order_by('r.id', 'asc');
        
    }

    private function sqlAmbilResepRDetail($id)
    {
        
        $this->db->select("r.id, ro.id as id_rekon, b.nama_lengkap, b.kekuatan, s.nama, ro.lama_pakai, ro.alasan_minum, ro.lanjutan, ro.create_user as akun_ro, ro.tanggal_create as tanggal_ro, ro.status_resep,b.id_kategori", false);
        $this->db->from("sm_resep_r_detail as r");
        $this->db->join("sm_rekonsiliasi_obat as ro", "ro.id_detail_resep = r.id", "left");
        $this->db->join("sm_barang as b", "b.id = r.id_barang", "left");
        $this->db->join("sm_satuan as s", "s.id = b.satuan_kekuatan", "left");
        $this->db->where("r.id_resep_r", $id, true);
        $this->db->where("b.id_kategori", 1, true); // Kategori Obat
        $this->db->order_by('r.id', 'asc');


        return $this->db->get()->result();
        
    }

    private function ambilResepLain($id)
    {
        
        $this->db->select("ro.id, ro.id as id_rekon, ro.id_layanan_pendaftaran as id_layanan, ro.tanggal_resep_lain as tanggal_resep, ro.obat_lain as nama_lengkap, ro.dosis_lain as kekuatan, null as nama, ro.lama_pakai, ro.alasan_minum, ro.lanjutan, ro.user_lain as nama_user, ro.tanggal_create as tanggal_ro, ro.status_resep", false);
        $this->db->from("sm_rekonsiliasi_obat as ro");
        $this->db->where("ro.id_layanan_pendaftaran", $id, true);
        $this->db->where("ro.status_resep", 1, true);
        $this->db->group_by('ro.id', 'asc');


        return $this->db->get()->result();
        
    }

    function ambilDataResep($idLayananPendaftaran, $search)
    {

        $this->sqlAmbilDataResep((int)$idLayananPendaftaran, $search);
        $dataResep = $this->db->get()->result();

        if(!empty($dataResep)){

            foreach ($dataResep as $c => $d) {

                $this->sqlAmbilResepR((int)$d->id);

                $dataResepR = $this->db->get()->result();

                foreach ($dataResepR as $e => $f) {

                    $dataResepR[$e]->tanggal_resep = $dataResep[$c]->tanggal_resep;
                    $dataResepR[$e]->id_layanan = $dataResep[$c]->id_layanan_pendaftaran;
                    $dataResepR[$e]->nama_user = $dataResep[$c]->nama_user;
                    $dataResepR[$e]->id_resep = $dataResep[$c]->id;

                    $dataResepDetail = $this->sqlAmbilResepRDetail((int)$f->id);

                    foreach ($dataResepDetail as $g => $h) {


                        $dataResepDetail[$g]->tanggal_resep = $f->tanggal_resep;
                        $dataResepDetail[$g]->id_layanan = $f->id_layanan;
                        $dataResepDetail[$g]->nama_user = $f->nama_user;
                        $dataResepDetail[$g]->id_resep = $f->id_resep;

                        $dataResepLain = $this->ambilResepLain($f->id_layanan);

                        foreach ($dataResepLain as $i => $j) {

                            $allResepLain[] = $j;

                        }

                        $allDataResep[] = $h;

                    }

                }

            }

        } else {


            $dataResepLain = $this->ambilResepLain((int)$idLayananPendaftaran);

            if(!empty($dataResepLain)){

                foreach ($dataResepLain as $i => $j) {

                    $allResepLain[] = $j;

                }

            }

        }

        if(empty($allDataResep)){

            if(!empty($allResepLain)){

                $dataUnik = [];

                foreach ($allResepLain as $item) {
                    $id = $item->id;
                    
                    if (!isset($dataUnik[$id])) {
                        $dataUnik[$id] = $item;
                    }
                }

                $dataX = array_values($dataUnik);

                asort($dataX);

            } else {

                $dataX = null;
            }

        } else {

            if(!empty($allResepLain)){


                $dataUnik = [];

                foreach ($allResepLain as $item) {
                    $id = $item->id;
                    
                    if (!isset($dataUnik[$id])) {
                        $dataUnik[$id] = $item;
                    }
                }

                $dataUnik = array_values($dataUnik);

                asort($dataUnik);

                $dataX = array_merge($allDataResep, $dataUnik);

            } else {

                $dataX = $allDataResep;             

            }

        }

        $this->db->close();

        return $dataX;

    }

    function ambilResepRDetail($id)
    {
        
        $this->db->select("r.id", false);
        $this->db->from("sm_rekonsiliasi_obat as r");
        $this->db->where("r.id_detail_resep", $id, true);
        

        return $this->db->get()->row();
        
    }

    function ambilUserApoteker($id)
    {
        
        $this->db->select("r.id, r.id_apoteker, p.nama", false);
        $this->db->from("sm_rekonsiliasi_user as r");
        $this->db->join("sm_tenaga_medis as t", "t.id = r.id_apoteker", "left");
        $this->db->join("sm_pegawai as p", "p.id = t.id_pegawai", "left");
        $this->db->where("r.id_layanan_pendaftaran", $id, true);
        

        return $this->db->get()->row();
        
    }

    function ambilDataPernahAlergi($id)
    {
        
        $this->db->select("r.id, r.pernah_alergi", false);
        $this->db->from("sm_rekonsiliasi_pernah_alergi as r");
        $this->db->where("r.id_pendaftaran", $id, true);
        

        return $this->db->get()->row();
        
    }

    function getRiwayatAlergi($id)
    {
        return $this->db->select("r.*")
                    ->from('sm_rekonsiliasi_alergi as r')
                    ->where('r.id_pendaftaran', $id, true)
                    ->order_by('r.id', 'asc')
                    ->get()
                    ->result();
        $this->db->close();
    }

    function hapusRiwayatAlergi($id)
    {
        return $this->db->where("id", $id)->delete("sm_rekonsiliasi_alergi");
    }

    function hapusRekonsiliasiObat($id)
    {
        return $this->db->where("id", $id)->delete("sm_rekonsiliasi_obat");
    }
    
}
