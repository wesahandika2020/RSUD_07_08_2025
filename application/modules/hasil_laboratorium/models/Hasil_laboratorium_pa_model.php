<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hasil_laboratorium_pa_model extends CI_Model {

	function updateHasilLaboratoriumPA($data)
	{
		$this->db->trans_begin();
		$count = $this->db->where("id_laboratorium", $data["id_laboratorium"])->get("sm_hasil_laboratorium_pa")->num_rows();
		if (0 < $count) :
            $this->db->where("id_laboratorium", $data["id_laboratorium"])->update("sm_hasil_laboratorium_pa", $data);
        else :
            $this->db->insert("sm_hasil_laboratorium_pa", $data);
        endif;

        $waktu_hasil = array("waktu_hasil" => date("Y-m-d H:i:s"));
        $this->db->where("id", $data["id_laboratorium"])->update("sm_laboratorium", $waktu_hasil);
        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            $status = false;
        } else {
            $this->db->trans_commit();
            $status = true;
        }
        return $status;
	}

    function jenisHasilPemeriksaan()
    {
        return array(
            ''          => 'Pilih Hasil Pemeriksaan',
            'PS'        => 'PAP SMEAR',
            'HP'        => 'HISTOPATOLOGI',
            'FN'        => 'FNAB',
            'ST'        => 'SITOLOGI',
            );
    }

}
