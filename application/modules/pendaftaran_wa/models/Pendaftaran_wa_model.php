<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pendaftaran_wa_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    private function sqlPendaftaranWa($search)
    {
        $this->db->select("DISTINCT pwa.id, to_char(pwa.tgl_kunjungan, 'DD-MM-YYYY') tgl_kunjungan, pwa.id no_bukti_daftar, pwa.nik,pwa.id_pasien no_rm_wa, pwa.nama, ps.telp, pswa.telp telp_wa, s.nama tujuan_poli, pg.nama dokter,
                            case when pwa.cara_bayar='Asuransi' then concat(pwa.cara_bayar,' (',pj.nama,')') when pwa.cara_bayar='Tunai' then pwa.cara_bayar else pwa.cara_bayar end penjamin,
                            pwa.status , case when ab.status IS NULL THEN 'Belum' WHEN ab.status='Check In' Then 'Sudah' ELSE ab.status END checkin", false);
        $this->db->from('sm_pendaftaran_wa pwa');
        $this->db->join('sm_spesialisasi s',    'pwa.id_unit_layanan = s.id', 'left');
        $this->db->join('sm_tenaga_medis tm',   'pwa.id_dokter=tm.id', 'left');
        $this->db->join('sm_pegawai pg',        'tm.id_pegawai = pg.id', 'left');
        $this->db->join('sm_penjamin pj',       'pwa.id_penjamin=pj.id', 'left');
        $this->db->join('sm_pasien ps',         'pwa.id_pasien=ps.id', 'left');
        $this->db->join('sm_pasien_wa pswa',    'pwa.nik=pswa.no_identitas', 'left');
        $this->db->join('sm_antrian_bpjs ab',    'pwa.id=ab.id_wa', 'left');
        $this->db->where('pwa.id IS NOT NULL');

        if ($search['keyword'] !== '') :
            $this->db->like('LOWER(pwa.nama)', strtolower($search['keyword']));		
            $this->db->or_like('pwa.id_pasien', strtolower($search['keyword']));		
        endif;

        if ($search['layanan'] !== '' && isset($search['layanan'])) :
            $this->db->where('pwa.id_unit_layanan', $search['layanan']);
        endif;

        if ($search['tanggal'] !== '') :
            // $this->db->where("pwa.tgl_kunjungan BETWEEN '" . date2mysql($search['tanggal']) . " 00:00:00' AND '" . date2mysql($search['tanggal']) . " 23:59:59'");
            $this->db->where("pwa.tgl_kunjungan",date2mysql($search['tanggal']));
        endif;
        //print_r($this->db->last_query());  
        return $this->db->order_by('no_bukti_daftar', 'asc');
        
    }

    private function _listPendaftaranWa($start, $limit, $search)
    {
        $this->sqlPendaftaranWa($search);
        if ($limit !== 0) :
            $this->db->limit($limit, $start);
        endif;
        return $this->db->get()->result();
    }

    function getListDataPendaftaranWa($start, $limit, $search)
    {
        $result['data'] = $this->_listPendaftaranWa($start, $limit, $search);
        $result['jumlah'] = $this->sqlPendaftaranWa($search)->get()->num_rows();
        $this->db->close();
        return $result;
    }

    function updateStatusPasien($id, $data)
    {
        return $this->db->where("id", $id)->update("sm_pendaftaran_wa", $data);
    }

    
}
