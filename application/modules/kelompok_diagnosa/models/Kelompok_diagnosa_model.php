<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Kelompok_diagnosa_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->datetime = date('Y-m-d H:i:s');
    }

    public function getJenisLaporan()
    {
        return array(
            ''      => '-- Pilih Kelompok diagnosa --',
            '1'     => 'Kode SKDR (Sistem Kewaspadaan Dini dan Respon)',
        );
    }

    public function getKodeSkdr()
    {
        $sql = " SELECT id, kode, nama, concat(kode,' - ',nama) skdr from sm_kode_skdr order by kode asc";
        $query = $this->db->query($sql)->result();
        $data =  array();
        $data[''] = '- Semua Kode SKDR -';
        foreach ($query as $key => $value) :
            $data[$value->kode] = $value->skdr;
        endforeach;

        return $data;
    }

    function getKlpDiagnosa01($search)
	{
        $param = "";
        if ($search["kode_skdr"] != "") {
            $param .= " AND skdr.kode = '" . $search["kode_skdr"] . "' ";
        }

        $sql = " SELECT skdr.id, skdr.kode, skdr.nama skdr, gss.kode_icdx_rinci, gss.nama diagnosa
                    from sm_kode_skdr skdr
                    left join sm_golongan_sebab_sakit gss on skdr.kode = gss.kode_skdr  WHERE gss.status='active' $param
                    ORDER BY skdr.kode, gss.kode_icdx_rinci, gss.nama";
            
		$data['data']      = $this->db->query($sql)->result();
		$data['jml_data']  = $this->db->query($sql)->num_rows();
		$data['kode_skdr'] = $search["kode_skdr"] <>'' ? $this->db->select("concat(kode,' - ',nama) skdr")->from('sm_kode_skdr')->where('kode', $search["kode_skdr"])->get()->row()->skdr : '';   
		
		return $data;
	}

    

}
