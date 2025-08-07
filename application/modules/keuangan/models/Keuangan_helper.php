<?php  
defined('BASEPATH') OR exit('No direct script access allowed');

class Keuangan_helper extends CI_Model {

	function __construct()
	{
		parent::__construct();

	}
	
	function sumTagihan($id_pendaftaran)
	{
		$param = "";
		$sql = "select lp.*, COALESCE(pj.diskon, 0) as diskon 
				from sm_layanan_pendaftaran as lp 
				left join sm_penjamin as pj on (pj.id = lp.id_penjamin) 
				where lp.id_pendaftaran = '" . $id_pendaftaran . "' ";
		$query = $this->db->query($sql . $param)->result();
		$bill = 0;
		$total = 0;
		$grandTotal = 0;
		foreach ($query as $i => $value) :
			$bill = $this->sumTotalTindakan($value->id);
			$total += $bill["total"];
			
			$grandTotal += $total;
			$total = 0;
		endforeach;

		return round($grandTotal);
	}

	function sumTotalTindakan($id_layanan_pendaftaran, $pendaftaran = NULL, $id_history_pembayaran = NULL)
	{
		$param = "";
		if ($pendaftaran !== NULL) :
			$param = " and ttp.is_pendaftaran = '".$pendaftaran."' ";
		endif;
		if ($id_history_pembayaran !== "") :
			if ($id_history_pembayaran === NULL) :
				$param .= " and ttp.id_history_pembayaran IS NULL";
			else :
				$param .= " ttp.id_history_pembayaran = '".$id_history_pembayaran."' ";
			endif;
		endif;
		$sql = "select sum(ttp.total) as total, sum(ttp.reimburse) as reimburse 
				from sm_tarif_tindakan_pasien as ttp 
				where ttp.id_layanan_pendaftaran = '".$id_layanan_pendaftaran."' ".$param." 
				and ttp.id_tarif_pelayanan != '139' ";	
		$query = $this->db->query($sql)->row();
		$total = $query->total;
		if ($total === NULL) :
			$total = 0;
		endif;
		$reimburse = $query->reimburse;
		if ($reimburse === NULL) :
			$reimburse = 0;
		endif;
		$status = true;
		if ($total <= 0 & $reimburse <= 0) :
			$status = false;
		endif;
		return array("total" => (double) $total, "reimbuse" => (double) $reimburse, "status" => $status);
		
	}
	
	 

}
