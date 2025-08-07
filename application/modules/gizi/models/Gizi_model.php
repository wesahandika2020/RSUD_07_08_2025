<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Gizi_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
        $this->datetime = date('Y-m-d H:i:s');
    }

    function getJenisDiet()
    {
        return array(
            ''          => 'Pilih Jenis Diet',
            'DM'        => 'DM (Diabetes Melitus)',
            'RG'        => 'RG (Rendah Garam)',
            'RL'        => 'RL (Rendah Lemak)',
            'DJ'        => 'DJ (Diet Jantung)',
            'RS'        => 'RS (Rendah Serat)',
            'DL'        => 'DL (Diet Lambung)',
            'TS'        => 'TS (Tinggi Serat)',
            'DH'        => 'DH (Diet Hati)',
            'TKTP'      => 'TKTP (Tinggi Kalori Tinggi Protein)',
            'T. Kal'    => 'T. Kal (Tinggi Kalium)',
            'R. Kal'    => 'R. Kal (Rendah Kalium)',
            'RP'        => 'RP (Rendah Protein)',
            'R. Pur'    => 'R. Pur (Rendah Purin)',
            'B'         => 'B (Biasa)',
            'SONDE'     => 'SONDE (Sode)',
            'C'         => 'C (Cair)',
            'P'         => 'P (Puasa)',
        );
    }

    function getDiet()
    {
        return array(
            ''              => 'Pilih Diet',
            'Diet Makan'    => 'Diet Makan',
            'Diet Cair'     => 'Diet Cair',
            'Diet Sharing'  => 'Diet Sharing',
        );
    }

    function getRuanganDiet()
    {
        $query = $this->db->get('sm_bangsal')->result();
        $data = array();
        $data[''] = 'Semua';
        foreach ($query as $key => $value) {
            $data[$value->id] = $value->nama; // Menggunakan ID sebagai kunci dan nama sebagai nilai
        }

        return $data;
    }

    function getBentukMakanan()
    {
        return array(
            ''          => 'Pilih Bentuk Makanan',
            'NB' =>  'NB (Nasi Biasa)',
            'NT ' =>  'NT  (Nasi Tim)',
            'BB' =>  'BB (Bubur)',
            'SARING' =>  'SARING (Saring)',
            'MC' =>  'MC (Makanan Cair)',
            'PUASA' =>  'PUASA (Puasa)',
            'SARING BAYI' => 'SARING BABY',
            'TIM BAYI' => 'TIM BABY',
            'TIM DEWASA' => 'TIM DEWASA', 
            'SUMSUM' => 'SUMSUM',


        );
    }

    function getMakanPasien()
    {
        return array(
            ''           => 'Pilih Makan Pasien',
            'M'          =>  'M',
            'C '         =>  'C',
            'MC'         =>  'MC',
            'PINDAH'     =>  'PINDAH',
            'PUASA'      =>  'PUASA',

        
        );
    }

    function getPilihDiet()
    {
        return array(
            '1' =>  'Diet Makan',
            '2' =>  'Diet Cair',
            '3' =>  'Diet Sharing'
        
        );
    }

    function getProfesiGizi($where = array())
    {
        $sql = "select * from sm_profesi_nadis where id = '11' or id = '22' order by nama";
        $profesi = $this->db->query($sql)->result();
        foreach ($profesi as $key => $value) :
            $data[$value->id] = $value->nama;
        endforeach;

        return $data;
    }

    function getTipeDiet($where = array())
    {
        $sql = "select * from sm_diet order by nama";
        $diet = $this->db->query($sql)->result();
        $data = array();
        $data[''] = '- Silakan Pilih Tipe Diet -';
        foreach ($diet as $key => $value) :
            $data[$value->id] = $value->kode.' ('.$value->nama.')';
        endforeach;

        return $data;
    }

    function getKodeDiet($where = array())
    {
        $sql = "select * from sm_diet order by nama";
        $diet = $this->db->query($sql)->result();
        $data = array();
        $data[''] = '- Silakan Pilih Kode Diet -';
        foreach ($diet as $key => $value) :
            $data[$value->id] = $value->kode;
        endforeach;

        return $data;
    }

    private function sqlPermintaanMakanPasien($search)
    {
        $this->db->select("od.*, lp.*, od.id as od_id, od.status as status_order, lp.id_pendaftaran as id_pendaftaran, lp.id as id_layanan_pendaftaran,
                        pd.tanggal_daftar, pd.tanggal_keluar, 
                        pd.id_pasien, pd.no_register,
                        p.nama, p.tanggal_lahir,
                        coalesce(pj.nama, '') as penjamin,
                        coalesce(sp.nama, '') as layanan, 
                        coalesce(pg.nama, '') as dokter,
                        k.nama as kelas_ri, sri.no_ruang as ruang_ri, sri.no_bed as bed_ri,
                        kic.nama as kelas_ic, sic.no_ruang as ruang_ic, sic.no_bed as bed_ic,
                        (select bg.nama from sm_bangsal as bg where bg.id = sri.id_bangsal) as bangsal_ri,
                        (select bg.nama from sm_bangsal as bg where bg.id = sic.id_bangsal) as bangsal_ic", false);

        $this->db->from('sm_order_dpmp as od')
            ->join('sm_layanan_pendaftaran as lp', 'lp.id = od.id_layanan_pendaftaran')
            ->join('sm_pendaftaran as pd', 'pd.id = lp.id_pendaftaran')
            ->join('sm_pasien as p', 'p.id = pd.id_pasien', 'left')
            ->join('sm_rawat_inap as sri', 'lp.id = sri.id_layanan_pendaftaran', 'left')
            ->join('sm_kelas as k', 'k.id = sri.id_kelas', 'left')
            ->join('sm_intensive_care as sic', 'lp.id = sic.id_layanan_pendaftaran', 'left')
            ->join('sm_kelas as kic', 'kic.id = sic.id_kelas', 'left')
            ->join('sm_spesialisasi as sp', 'sp.id = lp.id_unit_layanan', 'left')
            ->join('sm_tenaga_medis as tm', 'tm.id = lp.id_dokter', 'left')
            ->join('sm_pegawai as pg', 'pg.id = tm.id_pegawai', 'left')
            ->join('sm_penjamin as pj', 'pj.id = lp.id_penjamin', 'left')
            ->join('sm_translucent as tr', 'tr.id = lp.id_users_sep', 'left');
        
        if ($search["tanggal_awal"] !== "" & $search["tanggal_akhir"] !== "") :
            $this->db->where("od.waktu_order BETWEEN '" . date2mysql($search['tanggal_awal']) . " 00:00:00' AND '" . date2mysql($search['tanggal_akhir']) . " 23:59:59'");
            // $this->db->get(); echo $this->db->last_query(); exit();
        endif;

        if ($search['no_register'] !== '') :
            $this->db->where('pd.no_register', $search['no_register']);
        endif;

        if ($search['no_rm'] !== '') :
            $this->db->like('p.id', $search['no_rm'], 'before', true);
            // $this->db->like('p.id', $search['no_rm']);
        endif;

        if ($search['nama'] !== '') :
            $this->db->where("p.nama ilike '%" . strtolower($search['nama']) . "%'");
        endif;

        if ($search['id_dokter'] !== '') :
            $this->db->where("pg.nama ilike '%" . strtolower($search['id_dokter']) . "%'");
        endif;

        if ($search['status_pasien'] === 'Belum') {
            $this->db->where('lp.tindak_lanjut', null);
        } else if ($search['status_pasien'] === 'Sudah') {
            $this->db->where('lp.tindak_lanjut is not null');
        }

        if ($search['status'] === '-') :
            $this->db->where('lp.tindak_lanjut', null);
        endif;

        if ($search['status'] !== '') :
            $this->db->where('lp.tindak_lanjut !=', null);
        endif;

        if ($search['bangsal'] !== '' && $search['bed'] !== '') :
            $this->db->group_start();
            $this->db->where('lp.jenis_layanan', 'Rawat Inap');
            $this->db->where('sri.id_bangsal', $search['bangsal'], false);
            $this->db->where('sri.no_bed', $search['bed']);
            $this->db->group_end();
            $this->db->or_group_start();
            $this->db->where('lp.jenis_layanan', 'Intensive Care');
            $this->db->where('sic.id_bangsal', $search['bangsal'], false);
            $this->db->where('sic.no_bed', $search['bed']);
            $this->db->group_end();
            // $this->db->get(); echo $this->db->last_query(); exit();
        endif;

        if ($search['bangsal'] !== ''  && $search['bed'] === '') :
            $this->db->group_start();
            $this->db->where('lp.jenis_layanan', 'Rawat Inap');
            $this->db->where('sri.id_bangsal', $search['bangsal'], false);
            $this->db->group_end();
            $this->db->or_group_start();
            $this->db->where('lp.jenis_layanan', 'Intensive Care');
            $this->db->where('sic.id_bangsal', $search['bangsal'], false);
            $this->db->group_end();
            // $this->db->get(); echo $this->db->last_query(); exit();
        endif;

         if ($search['bangsal'] === ''  && $search['bed'] !== '') :
            $this->db->group_start();
            $this->db->where('sri.no_bed', $search['bed'], false);
            $this->db->group_end();
            $this->db->or_group_start();
            $this->db->where('sic.no_bed', $search['bed'], false);
            $this->db->group_end();
            // $this->db->get(); echo $this->db->last_query(); exit();
        endif;

        return $this->db->order_by('od.id', 'desc');    

    }

    private function _listPermintaanMakanPasien($limit, $start, $search)
    {
        $this->sqlPermintaanMakanPasien($search);
        if ($limit !== 0) :
            $this->db->limit($limit, $start);
        endif;

        return $this->db->get()->result();
        // $this->db->get(); echo $this->db->last_query(); exit();
    }

    function getListPermintaanMakanPasien($limit, $start, $search)
    {
        $result['data'] = $this->_listPermintaanMakanPasien($limit, $start, $search);
        $result['jumlah'] = $this->sqlPermintaanMakanPasien($search)->get()->num_rows();
        return $result;

        $this->db->close();
    }

    function cetak_etiket($tanggal_awal, $tanggal_akhir, $no_rm, $nama, $ruangan_diet, $diet)
    {
        $this->db->select("DISTINCT ON (d.id) d.*, 
            (select bg.nama from sm_bangsal as bg where bg.id = sic.id_bangsal) as bangsal_ic, 
            kic.nama as kelas_ic, 
            sic.no_ruang as ruang_ic, 
            sic.no_bed as bed_ic, 
            (select bg.nama from sm_bangsal as bg where bg.id = sri.id_bangsal) as bangsal_ri, 
            k.nama as kelas_ri, 
            sri.no_ruang as ruang_ri, 
            sri.no_bed as bed_ri, 
            p.id as no_rm, 
            p.nama as nama_pasien, 
            p.tanggal_lahir, 
            p.kelamin, 
            mp.kode as mp_kode, 
            ms.kode as ms_kode, 
            mm.kode as mm_kode, 
            ss.kode as ss_kode, 
            sp.kode as sp_kode, 
            sm.kode as sm_kode, 
            dcmp.keterangan_diet_cair as kdc, 
            dcmp.dpmp_jam_satu, 
            dcmp.dpmp_jam_dua, 
            dcmp.dpmp_jam_tiga, 
            dcmp.dpmp_jam_empat, 
            dcmp.dpmp_jam_lima, 
            dcmp.dpmp_jam_enam, 
            dcmp.dpmp_jam_tujuh, 
            dcmp.dpmp_jam_delapan, 
            dcmp.keterangan_diet_cair, 
            dcmp.dpmp_gram, 
            sid.nama as nama_cair,
            lp.jenis_layanan");

        $this->db->from('sm_dpmp as d')
            ->join('sm_layanan_pendaftaran as lp', 'lp.id = d.id_layanan_pendaftaran', 'left')
            ->join('sm_pendaftaran as pd', 'pd.id = lp.id_pendaftaran', 'left')
            ->join('sm_pasien as p', 'p.id = pd.id_pasien', 'left')
            ->join('sm_diet_cair as dcmp', 'd.id = dcmp.id_dpmp', 'left')
            ->join('sm_item_diet as sid', 'sid.id = dcmp.dpmp_item', 'left')
            ->join('sm_diet as mp', 'mp.id = d.mp_diet_cair', 'left')
            ->join('sm_diet as ms', 'ms.id = d.ms_diet_cair', 'left')
            ->join('sm_diet as mm', 'mm.id = d.mm_diet_cair', 'left')
            ->join('sm_diet as ss', 'ss.id = d.ss_diet_cair', 'left')
            ->join('sm_diet as sp', 'sp.id = d.sp_diet_cair', 'left')
            ->join('sm_diet as sm', 'sm.id = d.sm_diet_cair', 'left')
            ->join('sm_rawat_inap as sri', 'lp.id = sri.id_layanan_pendaftaran', 'left')
            ->join('sm_kelas as k', 'k.id = sri.id_kelas', 'left')
            ->join('sm_intensive_care as sic', 'lp.id = sic.id_layanan_pendaftaran', 'left')
            ->join('sm_kelas as kic', 'kic.id = sic.id_kelas', 'left');

        if ($tanggal_awal !== "" && $tanggal_akhir !== "") {
            $this->db->where("d.waktu_dpmp BETWEEN '" . date2mysql($tanggal_awal) . " 00:00:00' AND '" . date2mysql($tanggal_akhir) . " 23:59:59'");
        }

        if ($no_rm !== '') {
            $this->db->like('p.id', $no_rm, 'before', true);
        }

        if ($nama !== '') {
            $this->db->where("LOWER(p.nama) ILIKE", '%' . strtolower($nama) . '%');
        }

        if ($ruangan_diet !== '') {
            $this->db->where("(sic.id_bangsal = '$ruangan_diet' OR sri.id_bangsal = '$ruangan_diet')");
        }

        if ($diet === 'Diet Cair') {
            $this->db->group_start()
                    ->where("d.dpmp_dm IS NULL")
                    ->where("d.dpmp_rg IS NULL")
                    ->where("d.dpmp_rl IS NULL")
                    ->where("d.dpmp_dj IS NULL")
                    ->where("d.dpmp_rs IS NULL")
                    ->where("d.dpmp_dl IS NULL")
                    ->where("d.dpmp_ts IS NULL")
                    ->where("d.dpmp_dh IS NULL")
                    ->where("d.dpmp_tktp IS NULL")
                    ->where("d.dpmp_tkal IS NULL")
                    ->where("d.dpmp_rkal IS NULL")
                    ->where("d.dpmp_rp IS NULL")
                    ->where("d.dpmp_rpur IS NULL")
                    ->where("d.dpmp_b IS NULL")
                    ->where("d.dpmp_sonde IS NULL")
                    ->where("d.dpmp_c IS NULL")
                    ->where("d.dpmp_p IS NULL")
                    ->where("d.jns_diet_mp IS NULL")
                    ->where("d.jns_diet_sp IS NULL")
                    ->where("d.jns_diet_ms IS NULL")
                    ->where("d.jns_diet_ss IS NULL")
                    ->where("d.jns_diet_mm IS NULL")
                    ->where("d.jns_diet_sm IS NULL")
                    ->where("d.btk_mkn_mp IS NULL")
                    ->where("d.btk_mkn_sp IS NULL")
                    ->where("d.btk_mkn_ms IS NULL")
                    ->where("d.btk_mkn_ss IS NULL")
                    ->where("d.btk_mkn_mm IS NULL")
                    ->where("d.btk_mkn_sm IS NULL")
                    ->group_end();
        } 
        if ($diet === 'Diet Makan') {
            $this->db->group_start()
                    ->where("d.mp_diet_cair IS NULL")
                    ->where("d.ms_diet_cair IS NULL")
                    ->where("d.mm_diet_cair IS NULL")
                    ->where("d.ss_diet_cair IS NULL")
                    ->where("d.sp_diet_cair IS NULL")
                    ->where("d.sm_diet_cair IS NULL")
                    ->group_end();
        }
        if ($diet === 'Diet Sharing') {
            $this->db->group_start()
                        ->group_start()
                            ->where("d.dpmp_dm IS NOT NULL")
                            ->or_where("d.dpmp_rg IS NOT NULL")
                            ->or_where("d.dpmp_rl IS NOT NULL")
                            ->or_where("d.dpmp_dj IS NOT NULL")
                            ->or_where("d.dpmp_rs IS NOT NULL")
                            ->or_where("d.dpmp_dl IS NOT NULL")
                            ->or_where("d.dpmp_ts IS NOT NULL")
                            ->or_where("d.dpmp_dh IS NOT NULL")
                            ->or_where("d.dpmp_tktp IS NOT NULL")
                            ->or_where("d.dpmp_tkal IS NOT NULL")
                            ->or_where("d.dpmp_rkal IS NOT NULL")
                            ->or_where("d.dpmp_rp IS NOT NULL")
                            ->or_where("d.dpmp_rpur IS NOT NULL")
                            ->or_where("d.dpmp_b IS NOT NULL")
                            ->or_where("d.dpmp_sonde IS NOT NULL")
                            ->or_where("d.dpmp_c IS NOT NULL")
                            ->or_where("d.dpmp_p IS NOT NULL")
                            ->or_where("d.jns_diet_mp IS NOT NULL")
                            ->or_where("d.jns_diet_sp IS NOT NULL")
                            ->or_where("d.jns_diet_ms IS NOT NULL")
                            ->or_where("d.jns_diet_ss IS NOT NULL")
                            ->or_where("d.jns_diet_mm IS NOT NULL")
                            ->or_where("d.jns_diet_sm IS NOT NULL")
                            ->or_where("d.btk_mkn_mp IS NOT NULL")
                            ->or_where("d.btk_mkn_sp IS NOT NULL")
                            ->or_where("d.btk_mkn_ms IS NOT NULL")
                            ->or_where("d.btk_mkn_ss IS NOT NULL")
                            ->or_where("d.btk_mkn_mm IS NOT NULL")
                            ->or_where("d.btk_mkn_sm IS NOT NULL")
                        ->group_end()
                        ->group_start()
                            ->or_where("d.mp_diet_cair IS NOT NULL")
                            ->or_where("d.ms_diet_cair IS NOT NULL")
                            ->or_where("d.mm_diet_cair IS NOT NULL")
                            ->or_where("d.ss_diet_cair IS NOT NULL")
                            ->or_where("d.sp_diet_cair IS NOT NULL")
                            ->or_where("d.sm_diet_cair IS NOT NULL")
                        ->group_end()
                    ->group_end();
        }

        $this->db->where('lp.tindak_lanjut', null);
        $this->db->where('lp.jenis_layanan !=', 'Pemulasaran Jenazah');
        $this->db->where('lp.jenis_layanan !=', 'Poliklinik');
        $this->db->where('lp.jenis_layanan !=', 'IGD');
        $this->db->where('lp.jenis_layanan !=', 'Medical Check Up');
        // $this->db->where('lp.jenis_layanan !=', 'Hemodialisa');
        $this->db->where('d.dpmp_print =', '1');

        $this->db->order_by('d.id', 'asc'); 

        $result = $this->db->get()->result();
        return $result;
    }

    function cekPindahRuangPasienRanap($id)
    {
        return $this->db->select("(select bg.nama from sm_bangsal as bg where bg.id = ri.id_bangsal) as bangsal_ri, k.nama as kelas_ri, ri.no_ruang as ruang_ri, ri.no_bed as bed_ri")
                    ->from('sm_order_rawat_inap as ori')
                    ->join('sm_rawat_inap as ri', 'ri.id = ori.id_rawat_inap', 'left')
                    ->join('sm_kelas as k', 'k.id = ri.id_kelas', 'left')
                    ->where('ori.id_layanan_pendaftaran', $id, true)
                    ->order_by('ori.id asc')
                    ->get()
                    ->row();
        $this->db->close();
    }

    function cekPindahRuangPasienIcare($id)
    {
        return $this->db->select("(select bg.nama from sm_bangsal as bg where bg.id = ic.id_bangsal) as bangsal_ic, k.nama as kelas_ic, ic.no_ruang as ruang_ic, ic.no_bed as bed_ic")
                    ->from('sm_order_intensive_care as oic')
                    ->join('sm_intensive_care as ic', 'ic.id = oic.id_intensive_care', 'left')
                    ->join('sm_kelas as k', 'k.id = ic.id_kelas', 'left')
                    ->where('oic.id_layanan_pendaftaran', $id, true)
                    ->order_by('oic.id asc')
                    ->get()
                    ->row();
        $this->db->close();
    }

    function getItemDiet($params, $start, $limit)
    {
        $limit = " limit " . $limit . " offset " . $start;
        $q = '';
        if ($params['jenis'] !== '') :
            $q .= " and sid.id_diet = '" . $params['jenis'] . "' ";
        endif;
        $sql   = "select sid.id as id, sid.nama 
                  from sm_item_diet as sid
                  left join sm_diet as sd on (sd.id = sid.id_diet) 
                  where sid.nama ilike ('%" . $params['q'] . "%') and sd.is_active = '1' " . $q . " order by sid.nama";
        $data['data'] = $this->db->query($sql . $limit)->result();
        $data['total'] = $this->db->query($sql)->num_rows();
        return $data;
    }

    function simpanDataDietCair($data)
    {
        // var_dump($data);die;
        if (is_array($data['dpmp_item'])) :
            foreach ($data['dpmp_item'] as $i => $value) :
                    $data_diet_cair = array(
                        'id_layanan_pendaftaran' => $data['id_layanan_pendaftaran'],
                        'dpmp_diet' => $data['dpmp_diet'][$i],
                        'dpmp_item' => $value,
                        'dpmp_jam_satu' => $data['dpmp_jam_satu'][$i],
                        'dpmp_jam_dua' => $data['dpmp_jam_dua'][$i],
                        'dpmp_jam_tiga' => $data['dpmp_jam_tiga'][$i],
                        'dpmp_jam_empat' => $data['dpmp_jam_empat'][$i],
                        'dpmp_jam_lima' => $data['dpmp_jam_lima'][$i],
                        'dpmp_jam_enam' => $data['dpmp_jam_enam'][$i],
                        'dpmp_jam_tujuh' => $data['dpmp_jam_tujuh'][$i],
                        'dpmp_jam_delapan' => $data['dpmp_jam_delapan'][$i],
                        'keterangan_diet_cair' => $data['keterangan_diet_cair'][$i],
                        'dpmp_gram' => $data['dpmp_gram'][$i],
                        'id_dpmp' => $data['id_dpmp'],
                        'id_users' => $data['id_users'][$i],
                        'created_date' => $data['created_date'][$i],
                    );

                    $this->db->insert('sm_diet_cair', $data_diet_cair);
            endforeach;
        endif;
    }

    function getListDataDPMP($limit, $start, $search)
    {
        $where = "";
        $limitation = "";
        if ($limit !== 0) :
            $limitation = " limit " . $limit . " offset " . $start;
        endif;
         
        if ($search["id_layanan_pendaftaran"] !== "") :
            $where .= " and d.id_layanan_pendaftaran = '" . $search["id_layanan_pendaftaran"] . "' ";
        endif;
         
        if ($search["keyword"] !== "") :
            $where .= " and pg.nama ilike '%" . $search["keyword"] . "%' ";
        endif;

        if ($search["waktu"] !== "") :
            $where .= " and d.waktu_dpmp BETWEEN '" . $search["waktu"] . " 00:00:00' AND '" . $search["waktu"] . " 23:59:59' ";
        endif;

        $sql  = "select d.*, pn.nama as profesi, pg.nama as nadis, pgd.nama as user, pgu.nama as update_user, mp.kode as mp_kode, ms.kode as ms_kode, mm.kode as mm_kode, ss.kode as ss_kode, sp.kode as sp_kode, sm.kode as sm_kode, dcmp.keterangan_diet_cair as kdc, dcmp.dpmp_jam_satu, dcmp.dpmp_jam_dua, dcmp.dpmp_jam_tiga, dcmp.dpmp_jam_empat, dcmp.dpmp_jam_lima, dcmp.dpmp_jam_enam, dcmp.dpmp_jam_tujuh, dcmp.dpmp_jam_delapan, dcmp.dpmp_gram
                from sm_dpmp as d 
                left join sm_profesi_nadis as pn on (pn.id = d.profesi) 
                left join sm_diet as mp on (mp.id = d.mp_diet_cair)
                left join sm_diet_cair as dcmp on (d.id = dcmp.id_dpmp)
                left join sm_diet as ms on (ms.id = d.ms_diet_cair)
                left join sm_diet as mm on (mm.id = d.mm_diet_cair)
                left join sm_diet as ss on (ss.id = d.ss_diet_cair)
                left join sm_diet as sp on (sp.id = d.sp_diet_cair)
                left join sm_diet as sm on (sm.id = d.sm_diet_cair)
                left join sm_pegawai as pg on (pg.id = d.nadis) 
                left join sm_translucent as st on (st.id = d.id_user)
                left join sm_translucent as sta on (sta.id = d.updated_user)
                left join sm_pegawai as pgd on (pgd.id = st.id)
                left join sm_pegawai as pgu on (pgu.id = sta.id) 
                where d.id is not null ";
        $order = "order by d.id desc ";
        $data['data'] = $this->db->query($sql . $where . $order . $limitation)->result();
        $data['jumlah'] = $this->db->query($sql . $where)->num_rows();
        return $data;
        $this->db->close();
    }

    function getDetailDPMP($id_dpmp)
    {
        return $this->db->select("d.*, pn.nama as nama_profesi, pg.nama as petugas")
                    ->from('sm_dpmp as d')
                    ->join('sm_profesi_nadis as pn', 'pn.id = d.profesi', 'left')
                    ->join('sm_pegawai as pg', 'pg.id = d.nadis', 'left')
                    ->where('d.id', $id_dpmp, true)
                    ->order_by('d.id asc')
                    ->get()
                    ->row();
        $this->db->close();
    }

    function cekHasilLab($id_layanan)
    {
        return $this->db->select("idl.*, l.nama as nama_item")
                    ->from('sm_laboratorium as sl')
                    ->join('sm_item_detail_laboratorium as idl', 'idl.id_lab = sl.id', 'left')
                    ->join('sm_layanan as l', 'idl.test_cd = l.test_code', 'left')
                    ->where('sl.id_layanan_pendaftaran', $id_layanan, true)
                    ->order_by('idl.id asc')
                    ->get()
                    ->result();
        $this->db->close();
    }

    function getDataDietCair($id_dpmp)
    {
        return $this->db->select("dc.*, id.nama as nama_item")
                    ->from('sm_diet_cair as dc')
                    ->join('sm_item_diet as id', 'id.id = dc.dpmp_item', 'left')
                    ->where('dc.id_dpmp', $id_dpmp, true)
                    ->order_by('dc.id asc')
                    ->get()
                    ->result();
        $this->db->close();
    }

    function getAutoDetailDPMP($id_layanan_pendaftaran)
    {
        $sql  = "select d.*, pn.nama as nama_profesi, pg.nama as petugas
                from sm_dpmp as d 
                left join sm_profesi_nadis as pn on (pn.id = d.profesi)
                left join sm_pegawai as pg on (pg.id = d.nadis) 
                where d.id_layanan_pendaftaran = ".$id_layanan_pendaftaran." 
                order by d.id desc limit 1
                ";
        $data = $this->db->query($sql)->result();
        return $data;
        $this->db->close();
    }

    function getEditFormDPMP($id)
    {   
        return $this->db->select("d.*, pn.nama as nama_profesi, pg.nama as petugas")
                    ->from('sm_dpmp as d')
                    ->join('sm_profesi_nadis as pn', 'pn.id = d.profesi', 'left')
                    ->join('sm_pegawai as pg', 'pg.id = d.nadis', 'left')
                    ->where('d.id', $id, true)
                    ->order_by('d.id asc')
                    ->get()
                    ->result();
        $this->db->close();
    }

    function getAutoDataDietCair($id_dpmp)
    {   
        return $this->db->select("dc.*, id.nama as nama_item")
                    ->from('sm_diet_cair as dc')
                    ->join('sm_item_diet as id', 'id.id = dc.dpmp_item', 'left')
                    ->where('dc.id_dpmp', $id_dpmp, true)
                    ->order_by('dc.id asc')
                    ->get()
                    ->result();
        $this->db->close();
    }

    function getEditFormDietCair($id_dpmp)
    {   
        return $this->db->select("dc.*, id.nama as nama_item")
                    ->from('sm_diet_cair as dc')
                    ->join('sm_item_diet as id', 'id.id = dc.dpmp_item', 'left')
                    ->where('dc.id_dpmp', $id_dpmp, true)
                    ->order_by('dc.id asc')
                    ->get()
                    ->result();
        $this->db->close();
    }

    function getEditDetailDietCair($id)
    {   
        return $this->db->select("dc.*, id.nama as nama_item")
                    ->from('sm_diet_cair as dc')
                    ->join('sm_item_diet as id', 'id.id = dc.dpmp_item', 'left')
                    ->where('dc.id', $id, true)
                    ->order_by('dc.id asc')
                    ->get()
                    ->result();
        $this->db->close();
    }

    function editDataDietCair($data)
    {

        return $this->db->where('id', $data['id'], true)->update('sm_diet_cair', $data);

    }

    function deleteDietCair($id) 
    {
        return $this->db->where("id", $id)->delete("sm_diet_cair");
    }

    function deleteDPMP($id) 
    {
        return $this->db->where("id", $id)->delete("sm_dpmp");
    }

    function getGiziAnak($id_pendaftaran)
    {
        // var_dump($id_pendaftaran);die;
        $sql  = "
            select g.*, pg.nama as petugas, pd.nama as dokter, us.nama users
            from sm_gizi_anak as g
            left join sm_pegawai as pg on pg.id = g.ga_petugas
            LEFT JOIN sm_tenaga_medis as tm on tm.id = g.ga_dokter
            LEFT JOIN sm_pegawai as pd on pd.id = tm.id_pegawai
            LEFT JOIN sm_pegawai as us on us.id = g.id_users
            where g.id_pendaftaran = '" . $id_pendaftaran . "'
            order by 
            case 
            when g.updated_at is not null then g.updated_at
            else g.created_at
            end desc
        ";
        $data = $this->db->query($sql)->row();
        return $data;
        $this->db->close();
    }

    function getGiziDietetik($id_pendaftaran)
    {
        // var_dump($id_pendaftaran);die;
        $sql  = "
            select d.*, pg.nama as petugas, pd.nama as dokter
            from sm_gizi_dietetik as d
            left join sm_pegawai as pg on pg.id = d.gd_petugas
            LEFT JOIN sm_tenaga_medis as tm on tm.id = d.gd_dokter
            LEFT JOIN sm_pegawai as pd on pd.id = tm.id_pegawai
            where d.id_pendaftaran = '" . $id_pendaftaran . "'
            order by 
            case 
            when d.updated_at is not null then d.updated_at
            else d.created_at
            end desc
        ";
        $data = $this->db->query($sql)->row();
        return $data;
        $this->db->close();
    }

    function getGdByID($id)
    {
        $sql  = "
            select d.*, pg.nama as petugas, pd.nama as dokter
            from sm_gizi_dietetik as d
            left join sm_pegawai as pg on pg.id = d.gd_petugas
            LEFT JOIN sm_tenaga_medis as tm on tm.id = d.gd_dokter
            LEFT JOIN sm_pegawai as pd on pd.id = tm.id_pegawai
            where d.id_gd = '" . $id . "'
            order by 
            case 
                when d.updated_at is not null then d.updated_at
                else d.created_at
            end desc
        ";
        $data = $this->db->query($sql)->row();
        return $data;
        $this->db->close();
    }

    function getKonsulGizi($id_pendaftaran)
    {
        $sql  = "
            select k.*, pg.nama as petugas, pd.nama as dokter, us.nama users
            from sm_konsultasi_gizi as k
            left join sm_pegawai as pg on pg.id = k.kg_petugas
            left join sm_tenaga_medis as tm on tm.id = k.kg_dokter
            left join sm_pegawai as pd on pd.id = tm.id_pegawai
            LEFT JOIN sm_pegawai as us on us.id = k.id_users
            where k.id_pendaftaran = '" . $id_pendaftaran . "'
            order by 
            case 
            when k.updated_at is not null then k.updated_at
            else k.created_at
            end desc
        ";
        $data = $this->db->query($sql)->row();
        return $data;
        $this->db->close();
    }

    function getCetakKonsultasiGizi($id_pendaftaran)
    {
        $sql  = "
            select k.*, pa.*, pg.nama as petugas, p.nama as dokter, pg.tanda_tangan as ttd, p.tanda_tangan as ttd_dokter
            from sm_konsultasi_gizi as k
            join sm_layanan_pendaftaran slp ON k.id_layanan_pendaftaran = slp.id
            join sm_pendaftaran pd ON k.id_pendaftaran = pd.id
            join sm_pasien pa ON pa.id = pd.id_pasien
            left join sm_pegawai as pg on pg.id = k.kg_petugas
            left join sm_tenaga_medis as tm on tm.id = k.kg_dokter
            left join sm_pegawai as p on p.id = tm.id_pegawai
            where k.id_pendaftaran = '" . $id_pendaftaran . "'
            order by 
            case 
            when k.updated_at is not null then k.updated_at
            else k.created_at
            end desc
        ";
        $data = $this->db->query($sql)->row();
        return $data;
        $this->db->close();
    }

    // dpmp New
    function getListDataDPMP2($limit, $start, $search)
    {
        $where = "";
        $limitation = "";
        if ($limit !== 0) :
            $limitation = " limit " . $limit . " offset " . $start;
        endif;
        
        if ($search["id_layanan_pendaftaran"] !== "") :
            $where .= " and d.id_layanan_pendaftaran = '" . $search["id_layanan_pendaftaran"] . "' ";
        endif;
        
        if ($search["keyword"] !== "") :
            $where .= " and pg.nama ilike '%" . $search["keyword"] . "%' ";
        endif;

        if ($search["waktu"] !== "") :
            $where .= " and d.waktu_dpmp BETWEEN '" . $search["waktu"] . " 00:00:00' AND '" . $search["waktu"] . " 23:59:59' ";
        endif;

        $sql  = "SELECT
                -- dpmp
                d.id, d.id_layanan_pendaftaran, d.dpmp_waktu, d.dpmp_profesi, d.dpmp_nadis, d.dpmp_ttd_nadis, d.dpmp_status_ruang, d.dpmp_mp, d.dpmp_sp, d.dpmp_ms, d.dpmp_ss, d.dpmp_mm, d.dpmp_sm, d.dpmp_ket, d.dpmp_pd, d.dpmp_print, d.ceklist,
                -- diet makan
                dm.id as id_dm, dm.dm_biasa, dm.dm_p, dm.dm_rs, dm.dm_cr, dm.dm_rg, dm.dm_sd, dm.dm_dm, dm.dm_rk, dm.dm_tk, dm.dm_dh, dm.dm_rl, dm.dm_tktp, dm.dm_dj, dm.dm_rp, dm.dm_ts, dm.dm_dl, dm.dm_rpn,
                dm.dm_jd_mp ,dm.dm_bm_mp ,dm.dm_jd_sp ,dm.dm_bm_sp ,dm.dm_jd_ms ,dm.dm_bm_ms ,dm.dm_jd_ss ,dm.dm_bm_ss ,dm.dm_jd_mm ,dm.dm_bm_mm ,dm.dm_jd_sm ,dm.dm_bm_sm, 
                -- diet cair
                dc.id as id_dc, dc.dc_diet, dc.dc_item, dc.dc_jam_1, dc.dc_jam_2, dc.dc_jam_3, dc.dc_jam_4, dc.dc_jam_5, dc.dc_jam_6, dc.dc_jam_7, dc.dc_jam_8, dc.dc_keterangan, dc.dc_gram, dc.dc_mp, dc.dc_ms, dc.dc_mm, dc.dc_sp, dc.dc_ss, dc.dc_sm,        
                dc_mp.kode as dc_mp_kode,
                dc_ms.kode as dc_ms_kode,
                dc_mm.kode as dc_mm_kode,
                dc_ss.kode as dc_ss_kode,
                dc_sp.kode as dc_sp_kode,
                dc_sm.kode as dc_sm_kode,
                -- diet sharing
                ds.id as id_ds, ds.ds_biasa, ds.ds_p, ds.ds_rs, ds.ds_cr, ds.ds_rg, ds.ds_sd, ds.ds_dm, ds.ds_rk, ds.ds_tk, ds.ds_dh, ds.ds_rl, ds.ds_tktp, ds.ds_dj, ds.ds_rp, ds.ds_ts, ds.ds_dl, ds.ds_rpn, ds.ds_jd_mp ,ds.ds_bm_mp ,ds.ds_jd_sp ,ds.ds_bm_sp ,ds.ds_jd_ms ,ds.ds_bm_ms ,ds.ds_jd_ss ,ds.ds_bm_ss ,ds.ds_jd_mm ,ds.ds_bm_mm ,ds.ds_jd_sm ,ds.ds_bm_sm, ds.ds_diet, ds.ds_item, ds.ds_jam_1, ds.ds_jam_2, ds.ds_jam_3, ds.ds_jam_4, ds.ds_jam_5, ds.ds_jam_6, ds.ds_jam_7, ds.ds_jam_8, ds.ds_keterangan, ds.ds_gram, ds.ds_mp, ds.ds_ms, ds.ds_mm, ds.ds_sp, ds.ds_ss, ds.ds_sm,
                ds_mp.kode as ds_mp_kode,
                ds_ms.kode as ds_ms_kode,
                ds_mm.kode as ds_mm_kode,
                ds_ss.kode as ds_ss_kode,
                ds_sp.kode as ds_sp_kode,
                ds_sm.kode as ds_sm_kode,
                -- petugas
                pn.nama as nama_profesi,
                pg.nama as nama_nadis,
                pgd.nama as nama_user,
                pgu.nama as nama_user_update

                -- dpmp
                FROM sm_dpmp_2 as d
                -- diet makan
                left join sm_diet_makan as dm on d.id = dm.id_dpmp
                -- diet cair
                left join sm_diet_cair_2 as dc on d.id = dc.id_dpmp
                left join sm_diet as dc_mp on dc_mp.id = dc.dc_mp
                left join sm_diet as dc_ms on dc_ms.id = dc.dc_ms
                left join sm_diet as dc_mm on dc_mm.id = dc.dc_mm
                left join sm_diet as dc_ss on dc_ss.id = dc.dc_ss
                left join sm_diet as dc_sp on dc_sp.id = dc.dc_sp
                left join sm_diet as dc_sm on dc_sm.id = dc.dc_sm
                -- diet Sharing
                left join sm_diet_sharing as ds on d.id = ds.id_dpmp
                left join sm_diet as ds_mp on ds_mp.id = ds.ds_mp
                left join sm_diet as ds_ms on ds_ms.id = ds.ds_ms
                left join sm_diet as ds_mm on ds_mm.id = ds.ds_mm
                left join sm_diet as ds_ss on ds_ss.id = ds.ds_ss
                left join sm_diet as ds_sp on ds_sp.id = ds.ds_sp
                left join sm_diet as ds_sm on ds_sm.id = ds.ds_sm
                -- pegawai
                left join sm_profesi_nadis as pn on pn.id = d.dpmp_profesi
                left join sm_pegawai as pg on pg.id = d.dpmp_nadis
                left join sm_translucent as st on st.id = d.id_user
                left join sm_translucent as sta on sta.id = d.updated_user
                left join sm_pegawai as pgd on pgd.id = st.id
                left join sm_pegawai as pgu on pgu.id = sta.id
                where d.id is not null ";
        $order = "order by d.id desc ";
        $data['data'] = $this->db->query($sql . $where . $order . $limitation)->result();
        $data['jumlah'] = $this->db->query($sql . $where)->num_rows();
        return $data;
        $this->db->close();
    }

    function deleteDPMP2($id) 
    {
        return $this->db->where("id", $id)->delete("sm_dpmp_2");
    }

    function getDetailDPMP2($id_dpmp)
    {
        return $this->db->select("
                            d.id, d.id_layanan_pendaftaran, d.dpmp_waktu, d.dpmp_profesi, d.dpmp_nadis, d.dpmp_ttd_nadis, d.dpmp_status_ruang, d.dpmp_mp, d.dpmp_sp, d.dpmp_ms, d.dpmp_ss, d.dpmp_mm, d.dpmp_sm, d.dpmp_ket, d.dpmp_pd, d.ceklist,
                            
                            dm.id as id_dm, dm.dm_biasa, dm.dm_p, dm.dm_rs, dm.dm_cr, dm.dm_rg, dm.dm_sd, dm.dm_dm, dm.dm_rk, dm.dm_tk, dm.dm_dh, dm.dm_rl, dm.dm_tktp, dm.dm_dj, dm.dm_rp, dm.dm_ts, dm.dm_dl, dm.dm_rpn, dm.dm_jd_mp ,dm.dm_bm_mp ,dm.dm_jd_sp ,dm.dm_bm_sp ,dm.dm_jd_ms ,dm.dm_bm_ms ,dm.dm_jd_ss ,dm.dm_bm_ss ,dm.dm_jd_mm ,dm.dm_bm_mm ,dm.dm_jd_sm ,dm.dm_bm_sm, 
                            
                            dc.id as id_dc, dc.dc_diet, dc.dc_item, dc.dc_jam_1, dc.dc_jam_2, dc.dc_jam_3, dc.dc_jam_4, dc.dc_jam_5, dc.dc_jam_6, dc.dc_jam_7, dc.dc_jam_8, dc.dc_keterangan, dc.dc_gram, dc.dc_mp, dc.dc_ms, dc.dc_mm, dc.dc_sp, dc.dc_ss, dc.dc_sm, sid.nama as dc_nama_item,       
                            dc_mp.kode as dc_mp_kode,
                            dc_ms.kode as dc_ms_kode,
                            dc_mm.kode as dc_mm_kode,
                            dc_ss.kode as dc_ss_kode,
                            dc_sp.kode as dc_sp_kode,
                            dc_sm.kode as dc_sm_kode,
                            
                            ds.id as id_ds, ds.ds_biasa, ds.ds_p, ds.ds_rs, ds.ds_cr, ds.ds_rg, ds.ds_sd, ds.ds_dm, ds.ds_rk, ds.ds_tk, ds.ds_dh, ds.ds_rl, ds.ds_tktp, ds.ds_dj, ds.ds_rp, ds.ds_ts, ds.ds_dl, ds.ds_rpn, ds.ds_jd_mp ,ds.ds_bm_mp ,ds.ds_jd_sp ,ds.ds_bm_sp ,ds.ds_jd_ms ,ds.ds_bm_ms ,ds.ds_jd_ss ,ds.ds_bm_ss ,ds.ds_jd_mm ,ds.ds_bm_mm ,ds.ds_jd_sm ,ds.ds_bm_sm, ds.ds_diet, ds.ds_item, ds.ds_jam_1, ds.ds_jam_2, ds.ds_jam_3, ds.ds_jam_4, ds.ds_jam_5, ds.ds_jam_6, ds.ds_jam_7, ds.ds_jam_8, ds.ds_keterangan, ds.ds_gram, ds.ds_mp, ds.ds_ms, ds.ds_mm, ds.ds_sp, ds.ds_ss, ds.ds_sm, ds_sid.nama as ds_nama_item,
                            ds_mp.kode as ds_mp_kode,
                            ds_ms.kode as ds_ms_kode,
                            ds_mm.kode as ds_mm_kode,
                            ds_ss.kode as ds_ss_kode,
                            ds_sp.kode as ds_sp_kode,
                            ds_sm.kode as ds_sm_kode,
                            
                            pn.nama as nama_profesi,
                            pg.nama as nama_nadis,
                            pgd.nama as nama_user,
                            pgu.nama as nama_user_update
        ")
                    ->from('sm_dpmp_2 as d')
                    
                    ->join('sm_diet_makan as dm', 'd.id = dm.id_dpmp', 'left')

                    ->join('sm_diet_cair_2 as dc', 'd.id = dc.id_dpmp', 'left')
                    ->join('sm_diet as dc_mp', 'dc_mp.id = dc.dc_mp', 'left')
                    ->join('sm_diet as dc_ms', 'dc_ms.id = dc.dc_ms', 'left')
                    ->join('sm_diet as dc_mm', 'dc_mm.id = dc.dc_mm', 'left')
                    ->join('sm_diet as dc_ss', 'dc_ss.id = dc.dc_ss', 'left')
                    ->join('sm_diet as dc_sp', 'dc_sp.id = dc.dc_sp', 'left')
                    ->join('sm_diet as dc_sm', 'dc_sm.id = dc.dc_sm', 'left')
                    ->join('sm_item_diet as sid', 'sid.id = dc.dc_item', 'left')

                    ->join('sm_diet_sharing as ds', 'd.id = ds.id_dpmp', 'left')
                    ->join('sm_diet as ds_mp', 'ds_mp.id = ds.ds_mp', 'left')
                    ->join('sm_diet as ds_ms', 'ds_ms.id = ds.ds_ms', 'left')
                    ->join('sm_diet as ds_mm', 'ds_mm.id = ds.ds_mm', 'left')
                    ->join('sm_diet as ds_ss', 'ds_ss.id = ds.ds_ss', 'left')
                    ->join('sm_diet as ds_sp', 'ds_sp.id = ds.ds_sp', 'left')
                    ->join('sm_diet as ds_sm', 'ds_sm.id = ds.ds_sm', 'left')
                    ->join('sm_item_diet as ds_sid', 'ds_sid.id = ds.ds_item', 'left')


                    ->join('sm_profesi_nadis as pn', 'pn.id = d.dpmp_profesi', 'left')
                    ->join('sm_pegawai as pg', 'pg.id = d.dpmp_nadis', 'left')
                    ->join('sm_translucent as st', 'st.id = d.id_user', 'left')
                    ->join('sm_translucent as sta', 'sta.id = d.updated_user', 'left')
                    ->join('sm_pegawai as pgd', 'pgd.id = st.id', 'left')
                    ->join('sm_pegawai as pgu', 'pgu.id = sta.id', 'left')

                    ->where('d.id', $id_dpmp, true)
                    ->order_by('d.id asc')
                    ->get()
                    ->row();
        $this->db->close();
    }

    function cetak_etiket_2($tanggal_awal, $tanggal_akhir, $no_rm, $nama, $diet, $jam, $ruangan)
    {
        // Seleksi kolom berdasarkan jenis diet
        if ($diet === 'Diet Makan') {
            $this->db->select(
                "DISTINCT ON (d.id) d.*,
                dm.dm_biasa,
                dm.dm_p,
                dm.dm_rs,
                dm.dm_cr,
                dm.dm_rg,
                dm.dm_sd,
                dm.dm_dm,
                dm.dm_rk,
                dm.dm_tk,
                dm.dm_dh,
                dm.dm_rl,
                dm.dm_tktp,
                dm.dm_dj,
                dm.dm_rp,
                dm.dm_ts,
                dm.dm_dl,
                dm.dm_rpn,
                dm.dm_jd_mp,
                dm.dm_bm_mp,
                dm.dm_jd_sp,
                dm.dm_bm_sp,
                dm.dm_jd_ms,
                dm.dm_bm_ms,
                dm.dm_jd_ss,
                dm.dm_bm_ss,
                dm.dm_jd_mm,
                dm.dm_bm_mm,
                dm.dm_jd_sm,
                dm.dm_bm_sm,
                (select bg.nama from sm_bangsal as bg where bg.id = sic.id_bangsal) as bangsal_ic, 
                kic.nama as kelas_ic, 
                sic.no_ruang as ruang_ic, 
                sic.no_bed as bed_ic, 
                (select bg.nama from sm_bangsal as bg where bg.id = sri.id_bangsal) as bangsal_ri, 
                k.nama as kelas_ri, 
                sri.no_ruang as ruang_ri, 
                sri.no_bed as bed_ri,
                lp.jenis_layanan,
                p.id as no_rm, 
                p.nama as nama_pasien, 
                p.tanggal_lahir, 
                p.kelamin
                "
            );
        } elseif ($diet === "Diet Cair") {
            $this->db->select(
                "DISTINCT ON (d.id) d.*,
                dc.dc_diet,
                dc.dc_item,
                dc.dc_jam_1,
                dc.dc_jam_2,
                dc.dc_jam_3,
                dc.dc_jam_4,
                dc.dc_jam_5,
                dc.dc_jam_6,
                dc.dc_jam_7,
                dc.dc_jam_8,
                dc.dc_keterangan,
                dc.dc_gram,
                dc.dc_mp,
                dc.dc_ms,
                dc.dc_mm,
                dc.dc_sp,
                dc.dc_ss,
                dc.dc_sm,
                (select bg.nama from sm_bangsal as bg where bg.id = sic.id_bangsal) as bangsal_ic, 
                kic.nama as kelas_ic, 
                sic.no_ruang as ruang_ic, 
                sic.no_bed as bed_ic, 
                (select bg.nama from sm_bangsal as bg where bg.id = sri.id_bangsal) as bangsal_ri, 
                k.nama as kelas_ri, 
                sri.no_ruang as ruang_ri, 
                sri.no_bed as bed_ri,
                lp.jenis_layanan,
                p.id as no_rm, 
                p.nama as nama_pasien, 
                p.tanggal_lahir, 
                p.kelamin,
                sid.nama as nama_cair
                "
            );
        } else {
            $this->db->select(
                "DISTINCT ON (d.id) d.*,
                ds.ds_biasa,
                ds.ds_p,
                ds.ds_rs,
                ds.ds_cr,
                ds.ds_rg,
                ds.ds_sd,
                ds.ds_dm,
                ds.ds_rk,
                ds.ds_tk,
                ds.ds_dh,
                ds.ds_rl,
                ds.ds_tktp,
                ds.ds_dj,
                ds.ds_rp,
                ds.ds_ts,
                ds.ds_dl,
                ds.ds_rpn,
                ds.ds_jd_mp,
                ds.ds_bm_mp,
                ds.ds_jd_sp,
                ds.ds_bm_sp,
                ds.ds_jd_ms,
                ds.ds_bm_ms,
                ds.ds_jd_ss,
                ds.ds_bm_ss,
                ds.ds_jd_mm,
                ds.ds_bm_mm,
                ds.ds_jd_sm,
                ds.ds_bm_sm,
                ds.ds_diet,
                ds.ds_item,
                ds.ds_jam_1,
                ds.ds_jam_2,
                ds.ds_jam_3,
                ds.ds_jam_4,
                ds.ds_jam_5,
                ds.ds_jam_6,
                ds.ds_jam_7,
                ds.ds_jam_8,
                ds.ds_keterangan,
                ds.ds_gram,
                ds.ds_mp,
                ds.ds_ms,
                ds.ds_mm,
                ds.ds_sp,
                ds.ds_ss,
                ds.ds_sm,
                (select bg.nama from sm_bangsal as bg where bg.id = sic.id_bangsal) as bangsal_ic, 
                kic.nama as kelas_ic, 
                sic.no_ruang as ruang_ic, 
                sic.no_bed as bed_ic, 
                (select bg.nama from sm_bangsal as bg where bg.id = sri.id_bangsal) as bangsal_ri, 
                k.nama as kelas_ri, 
                sri.no_ruang as ruang_ri, 
                sri.no_bed as bed_ri,
                lp.jenis_layanan,
                p.id as no_rm, 
                p.nama as nama_pasien, 
                p.tanggal_lahir, 
                p.kelamin,
                sid2.nama as nama_cair_2
                "
            );
        }

        $this->db->from('sm_dpmp_2 as d')
            ->join('sm_layanan_pendaftaran as lp', 'lp.id = d.id_layanan_pendaftaran', 'left')
            ->join('sm_pendaftaran as pd', 'pd.id = lp.id_pendaftaran', 'left')
            ->join('sm_pasien as p', 'p.id = pd.id_pasien', 'left')
            ->join('sm_diet_makan as dm', 'dm.id_dpmp = d.id', 'left')
            ->join('sm_diet_cair_2 as dc', 'dc.id_dpmp = d.id', 'left')
            ->join('sm_item_diet as sid', 'sid.id = dc.dc_item', 'left')
            ->join('sm_diet_sharing as ds', 'ds.id_dpmp = d.id', 'left')
            ->join('sm_item_diet as sid2', 'sid2.id = ds.ds_item', 'left')
            ->join('sm_rawat_inap as sri', 'lp.id = sri.id_layanan_pendaftaran', 'left')
            ->join('sm_kelas as k', 'k.id = sri.id_kelas', 'left')
            ->join('sm_intensive_care as sic', 'lp.id = sic.id_layanan_pendaftaran', 'left')
            ->join('sm_kelas as kic', 'kic.id = sic.id_kelas', 'left');

        // Klausa WHERE untuk tanggal
        if ($tanggal_awal !== "" && $tanggal_akhir !== "") {
            $this->db->where("d.dpmp_waktu BETWEEN '" . date2mysql($tanggal_awal) . " 00:00:00' AND '" . date2mysql($tanggal_akhir) . " 23:59:59'");
        }

        // Klausa WHERE untuk nomor rekam medis
        if ($no_rm !== '') {
            $this->db->like('p.id', $no_rm, 'before', true);
        }

        // Klausa WHERE untuk nama pasien
        if ($nama !== '') {
            $this->db->where("LOWER(p.nama) ILIKE", '%' . strtolower($nama) . '%');
        }

        // Klausa WHERE untuk ruangan
        if ($ruangan !== '') {
            $this->db->where("(sic.id_bangsal = '$ruangan' OR sri.id_bangsal = '$ruangan')");
        }

        // Klausa WHERE untuk jenis diet
        if ($diet === 'Diet Makan') {
            $this->db->where("d.dpmp_pd = 1");
        } elseif ($diet === 'Diet Cair') {
            $this->db->where("d.dpmp_pd = 2");
        } else {
            $this->db->where("d.dpmp_pd = 3");
        }

        // Klausa WHERE tambahan
        $this->db->where('lp.tindak_lanjut', null);
        $this->db->where('lp.jenis_layanan !=', 'Pemulasaran Jenazah');
        $this->db->where('lp.jenis_layanan !=', 'Poliklinik');
        $this->db->where('lp.jenis_layanan !=', 'IGD');
        $this->db->where('lp.jenis_layanan !=', 'Medical Check Up');
        // $this->db->where('lp.jenis_layanan !=', 'Hemodialisa');
        $this->db->where('d.dpmp_print =', '1');

        // Urutkan hasil berdasarkan ID
        $this->db->order_by('d.id', 'asc'); 

        // Eksekusi query dan kembalikan hasilnya
        $result = $this->db->get()->result();
        return $result;
    }

    function getGaByID($id)
    {
        $sql  = "
            select d.*, pg.nama as petugas, pg.tanda_tangan as ttd, pd.nama as dokter, pd.tanda_tangan as ttd_dokter, us.nama users,
            (SELECT tanggal_lahir FROM sm_pasien WHERE id = (SELECT id_pasien FROM sm_pendaftaran WHERE id=d.id_pendaftaran)) tanggal_lahir_pasien
            from sm_gizi_anak as d
            left join sm_pegawai as pg on pg.id = d.ga_petugas
            LEFT JOIN sm_tenaga_medis as tm on tm.id = d.ga_dokter
            LEFT JOIN sm_pegawai as pd on pd.id = tm.id_pegawai
            LEFT JOIN sm_pegawai as us on us.id = d.id_users
            where d.id_ga = '" . $id . "'
            order by 
            case 
                when d.updated_at is not null then d.updated_at
                else d.created_at
            end desc
        ";
        $data = $this->db->query($sql)->row();
        return $data;
        $this->db->close();
    }

    function getListGiziDietetik($id_pendaftaran)
    {
        // var_dump($id_pendaftaran);die;
        $sql  = "
            select d.*, pg.nama as petugas, pd.nama as dokter, us.nama users
            from sm_gizi_dietetik as d
            left join sm_pegawai as pg on pg.id = d.gd_petugas
            LEFT JOIN sm_tenaga_medis as tm on tm.id = d.gd_dokter
            LEFT JOIN sm_pegawai as pd on pd.id = tm.id_pegawai
            LEFT JOIN sm_pegawai as us on us.id = d.id_users
            where d.id_pendaftaran = '" . $id_pendaftaran . "'
            order by case when d.updated_at is not null then d.updated_at else d.created_at end desc
        ";
        $data = $this->db->query($sql)->result();
        return $data;
        $this->db->close();
    }

    function deleteGiziDietetik($id) 
    {
        $user_log         = $this->session->userdata('id_translucent');
        $created_date_log = $this->datetime;

        $sqlLog = "INSERT INTO sm_gizi_dietetik_log (
                        id_gd_lama,id_pendaftaran,id_layanan_pendaftaran,id_pasien,id_users,created_at,updated_at,gd_medis,gd_risiko,gd_kondisi,gd_alergi,gd_alergi_lainnya,
                        gd_makanan,gd_asuhan,gd_bb,gd_lila,gd_tb,gd_tilut,gd_imt,gd_status_gizi,gd_kesulitan,gd_setengah,gd_tigaperempat,gd_penurunan,gd_perubahan,gd_mual,
                        gd_muntah,gd_gangguan,gd_perlu,gd_sering,gd_masalah,gd_diare,gd_konstipati,gd_pendarahan,gd_bersendawa,gd_intoleransi,gd_diet,gd_ngt,gd_dirawat,
                        gd_tigakg,gd_enamkg,gd_penyakit,gd_penyakit_lainnya,gd_laboratorium,gd_klinis,gd_problem,gd_etiologi,gd_gejala,gd_preskripsi,gd_jenis_makanan,
                        gd_energi,gd_lemak,gd_protein,gd_karbohidrat,gd_cairan,gd_route,gd_cara_makan,gd_frekuensi,gd_monitoring,gd_tgl_petugas,gd_petugas,gd_ttd,
                        gd_lemah,gd_dokter,gd_ttd_dokter,created_date_log,user_log,status_log)
                    SELECT id_gd,id_pendaftaran,id_layanan_pendaftaran,id_pasien,id_users,created_at,updated_at,gd_medis,gd_risiko,gd_kondisi,gd_alergi,gd_alergi_lainnya,
                    gd_makanan,gd_asuhan,gd_bb,gd_lila,gd_tb,gd_tilut,gd_imt,gd_status_gizi,gd_kesulitan,gd_setengah,gd_tigaperempat,gd_penurunan,gd_perubahan,gd_mual,
                    gd_muntah,gd_gangguan,gd_perlu,gd_sering,gd_masalah,gd_diare,gd_konstipati,gd_pendarahan,gd_bersendawa,gd_intoleransi,gd_diet,gd_ngt,gd_dirawat,
                    gd_tigakg,gd_enamkg,gd_penyakit,gd_penyakit_lainnya,gd_laboratorium,gd_klinis,gd_problem,gd_etiologi,gd_gejala,gd_preskripsi,gd_jenis_makanan,
                    gd_energi,gd_lemak,gd_protein,gd_karbohidrat,gd_cairan,gd_route,gd_cara_makan,gd_frekuensi,gd_monitoring,gd_tgl_petugas,gd_petugas,gd_ttd,
                    gd_lemah,gd_dokter,gd_ttd_dokter,'$created_date_log' , '$user_log', 'Hapus' from sm_gizi_dietetik where id_gd = $id ";
        $this->db->query($sqlLog);

        return $this->db->where("id_gd", $id)->delete("sm_gizi_dietetik");
    }

    function getListKonsulGizi($id_pendaftaran)
    {
        $sql  = "
            select k.*, pg.nama as petugas, pd.nama as dokter, us.nama users
            from sm_konsultasi_gizi as k
            left join sm_pegawai as pg on pg.id = k.kg_petugas
            left join sm_tenaga_medis as tm on tm.id = k.kg_dokter
            left join sm_pegawai as pd on pd.id = tm.id_pegawai
            LEFT JOIN sm_pegawai as us on us.id = k.id_users
            where k.id_pendaftaran = '" . $id_pendaftaran . "'
            order by 
            case 
            when k.updated_at is not null then k.updated_at
            else k.created_at
            end desc
        ";
        $data = $this->db->query($sql)->result();
        return $data;
        $this->db->close();
    }

    function getKonsulGiziByID($id)
    {
        $sql  = "
            select k.*, pg.nama as petugas, pd.nama as dokter, us.nama users
            from sm_konsultasi_gizi as k
            left join sm_pegawai as pg on pg.id = k.kg_petugas
            left join sm_tenaga_medis as tm on tm.id = k.kg_dokter
            left join sm_pegawai as pd on pd.id = tm.id_pegawai
            LEFT JOIN sm_pegawai as us on us.id = k.id_users
            where k.id_kg = '" . $id . "'
            order by 
            case 
            when k.updated_at is not null then k.updated_at
            else k.created_at
            end desc
        ";
        $data = $this->db->query($sql)->row();
        return $data;
        $this->db->close();
    }

    function getListGiziAnak($id_pendaftaran)
    {
        // var_dump($id_pendaftaran);die;
        $sql  = "
            select g.*, pg.nama as petugas, pd.nama as dokter, us.nama users
            from sm_gizi_anak as g
            left join sm_pegawai as pg on pg.id = g.ga_petugas
            LEFT JOIN sm_tenaga_medis as tm on tm.id = g.ga_dokter
            LEFT JOIN sm_pegawai as pd on pd.id = tm.id_pegawai
            LEFT JOIN sm_pegawai as us on us.id = g.id_users
            where g.id_pendaftaran = '" . $id_pendaftaran . "'
            order by 
            case 
            when g.updated_at is not null then g.updated_at
            else g.created_at
            end desc
        ";
        $data = $this->db->query($sql)->result();
        return $data;
        $this->db->close();
    }

    function deleteGiziKonsultasi($id) 
    {
        $user_log         = $this->session->userdata('id_translucent');
        $created_date_log = $this->datetime;

        $sqlLog = "INSERT INTO sm_konsultasi_gizi_log (
            id_kg_lama,id_pendaftaran,id_layanan_pendaftaran,id_pasien,id_users,created_at,updated_at,
            kg_bb,kg_lla,kg_pbb,kg_tb,kg_imt,kg_biokimia,kg_klinis,kg_gizi,kg_personal,kg_diagnosis,
            kg_tujuan,kg_intervensi,kg_konseling,kg_evaluasi,kg_tgl_petugas,kg_petugas,kg_ttd,kg_dokter,kg_ttd_dokter,created_date_log,user_log,status_log)    
        SELECT id_kg,id_pendaftaran,id_layanan_pendaftaran,id_pasien,id_users,created_at,updated_at,
            kg_bb,kg_lla,kg_pbb,kg_tb,kg_imt,kg_biokimia,kg_klinis,kg_gizi,kg_personal,kg_diagnosis,
            kg_tujuan,kg_intervensi,kg_konseling,kg_evaluasi,kg_tgl_petugas,kg_petugas,kg_ttd,kg_dokter,kg_ttd_dokter,
            '$created_date_log' , '$user_log', 'Hapus' from sm_konsultasi_gizi where id_kg = " . $id;
        $this->db->query($sqlLog);

        return $this->db->where("id_kg", $id)->delete("sm_konsultasi_gizi");
    }

    function deleteGiziAnak($id) 
    {
        $user_log         = $this->session->userdata('id_translucent');
        $created_date_log = $this->datetime;

        $sqlLog = "INSERT INTO sm_gizi_anak_log (
                        id_ga_lama,id_pendaftaran,id_layanan_pendaftaran,id_pasien,id_users,ga_ruang,ga_tgl_masuk,ga_tgl_skrining,ga_usia,ga_diagnosa_medis,ga_risiko,
                        ga_bb,ga_bbu,ga_kesan,ga_pb,ga_pbu,ga_bbi,ga_bbpb,ga_lla,ga_ha,ga_biokimia,ga_klinis,ga_telur,ga_udang,ga_sapi,ga_ikan,ga_kedelai,ga_almond,
                        ga_gandum,ga_alergi_lainnya,ga_pola_makan,ga_tindak,ga_problem,ga_etiologi,ga_gejala,ga_preskripsi,ga_energi,ga_lemak,ga_protein,ga_karbohidrat,
                        ga_cairan,ga_makanan,ga_route,ga_cara_makan,ga_frekuensi,ga_monitoring,ga_tgl_monev_1,ga_tgl_monev_2,ga_tgl_monev_3,ga_tgl_monev_4,
                        ga_antropometri_1,ga_antropometri_2,ga_antropometri_3,ga_antropometri_4,ga_biokimia_1,ga_biokimia_2,ga_biokimia_3,ga_biokimia_4,
                        ga_klinis_1,ga_klinis_2,ga_klinis_3,ga_klinis_4,ga_asupan_1,ga_asupan_2,ga_asupan_3,ga_asupan_4,ga_monitoring_lain,ga_monitoring_lain_1,
                        ga_monitoring_lain_2,ga_monitoring_lain_3,ga_monitoring_lain_4,ga_tgl_petugas,ga_petugas,ga_ttd,created_at,updated_at,ga_dokter,ga_ttd_dokter,
                        created_date_log,user_log,status_log)
                    SELECT id_ga,id_pendaftaran,id_layanan_pendaftaran,id_pasien,id_users,ga_ruang,ga_tgl_masuk,ga_tgl_skrining,ga_usia,ga_diagnosa_medis,ga_risiko,
                        ga_bb,ga_bbu,ga_kesan,ga_pb,ga_pbu,ga_bbi,ga_bbpb,ga_lla,ga_ha,ga_biokimia,ga_klinis,ga_telur,ga_udang,ga_sapi,ga_ikan,ga_kedelai,ga_almond,
                        ga_gandum,ga_alergi_lainnya,ga_pola_makan,ga_tindak,ga_problem,ga_etiologi,ga_gejala,ga_preskripsi,ga_energi,ga_lemak,ga_protein,ga_karbohidrat,
                        ga_cairan,ga_makanan,ga_route,ga_cara_makan,ga_frekuensi,ga_monitoring,ga_tgl_monev_1,ga_tgl_monev_2,ga_tgl_monev_3,ga_tgl_monev_4,
                        ga_antropometri_1,ga_antropometri_2,ga_antropometri_3,ga_antropometri_4,ga_biokimia_1,ga_biokimia_2,ga_biokimia_3,ga_biokimia_4,
                        ga_klinis_1,ga_klinis_2,ga_klinis_3,ga_klinis_4,ga_asupan_1,ga_asupan_2,ga_asupan_3,ga_asupan_4,ga_monitoring_lain,ga_monitoring_lain_1,
                        ga_monitoring_lain_2,ga_monitoring_lain_3,ga_monitoring_lain_4,ga_tgl_petugas,ga_petugas,ga_ttd,created_at,updated_at,ga_dokter,ga_ttd_dokter,
                        '$created_date_log' , '$user_log', 'Hapus' from sm_gizi_anak where id_ga = $id ";
        $this->db->query($sqlLog);
        return $this->db->where("id_ga", $id)->delete("sm_gizi_anak");
    }

}

/* End of file Gizi_model.php */
