<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Pemusnahan_logistik_model extends CI_Model {

	function __construct()
	{
		parent::__construct();
		$this->user = $this->session->userdata('id_translucent');
		$this->unit = $this->session->userdata('id_unit');
		date_default_timezone_set('Asia/Jakarta');
		$this->date = date('Y-m-d');
		$this->datetime = date('Y-m-d H:i:s');
		$this->load->model('inventori_rt/Inventori_rt_model', 'inventori');
	}

	private function sqlLogistikED($search)
    {
		$this->db->select("b.id
			
		");

		$this->db->from('sm_barang as b');
		$this->db->join('sm_kategori_barang as s', 's.id = b.id_kategori');
		$this->db->where("s.irt", 1, true);
        if ($search['logistik'] !== '') :
            $this->db->where("b.nama ilike ('" . $search["logistik"] . "%')");
        endif;

		return $this->db->order_by('b.nama', 'asc');
    }

    private function sqlDataStok($id)
    {
        
        $this->db->select("concat_ws(' ',b.nama, b.kekuatan, st.nama, coalesce(sd.nama,''), '<small><i>', coalesce(pb.nama,''),'</i></small>') as nama_logistik, b.hpp, u.nama as unit, kb.id as id_kemasan, stn.nama as nama_kemasan, s.id_barang, (sum(s.masuk) - sum(s.keluar)) as sisa, s.id_stok");
        $this->db->from("sm_invrt_stok as s");
        $this->db->join('sm_barang as b', 'b.id = s.id_barang');
        $this->db->join('sm_kemasan_barang as kb', 'kb.id_barang = b.id');
		$this->db->join('sm_satuan as stn', 'stn.id = kb.id_kemasan');
		$this->db->join('sm_sediaan as sd', 'sd.id = b.id_sediaan', 'left');
		$this->db->join('sm_satuan as st', 'st.id = b.satuan_kekuatan', 'left');
		$this->db->join('sm_pabrik as pb', 'pb.id = b.id_pabrik', 'left');
		$this->db->join('sm_unit as u', 'u.id = s.id_unit');
		$this->db->where('kb.default_kemasan', '1', true);
        $this->db->where("s.id_barang", $id, true);
        $this->db->where('s.id_unit', $this->unit, true);
        
        return $this->db->group_by('s.id_barang, b.nama, b.kekuatan, stn.nama, st.nama, sd.nama, pb.nama, b.hpp, u.nama, kb.id, s.id_stok');
        
    }

    function cekWaktu($id)
    {
        $this->db->select("s.id, s.ed, s.waktu", false);

        $this->db->from('sm_invrt_stok as s')
            ->where('s.id', $id, true);

        return $this->db->get()->row();

        $this->db->close();
    }

    function getListDataLogistikED($limit = 0, $start = 0, $search)
    {
        
    	$this->sqlLogistikED($search);

    	$data = $this->db->get()->result();

    	if(!empty($data)){

            foreach ($data as $a => $b) {

            	$this->sqlDataStok((int)$b->id);

                $dataPemusnahan = $this->db->get()->result();

                if(!empty($dataPemusnahan)){

                	$rekapPemusnahan[] = $dataPemusnahan;

                }

           	}

           	if(!empty($rekapPemusnahan[0])){

           		$totalData = count($rekapPemusnahan[0]);

           		$allData = range(1, $totalData);

            	$xData = array_slice($allData, $start, $limit);

            	if(!empty($xData)){
	                foreach ($xData as $g => $h) {
	                    $i = (int)$h - 1;
	                    $cekWaktu = $this->cekWaktu((int)$rekapPemusnahan[0][(int)$i]->id_stok);
	                    $rekapPemusnahan[0][(int)$i]->waktu = $cekWaktu->waktu;
	                    $rekapPemusnahan[0][(int)$i]->ed = $cekWaktu->ed;
	                    $dataLimit[] = $rekapPemusnahan[0][(int)$i];
	                
	                }
	            } else {

	                $dataLimit = $xData;

	            }

	            $dataX["data"]    = $dataLimit;
            	$dataX["jumlah"]  = count($rekapPemusnahan[0]);

           	}

           	$this->db->close();

           	return $dataX;

        }

    }

    private function sqlPemusnahanLogistik($search)
    {
		$this->db->select("
			p.*, u.nama as unit, tr.account as user, coalesce(pgu.nama, '') as nama_user
		");
		$this->db->from('sm_pemusnahan_logistik as p');
		$this->db->join('sm_detail_pemusnahan_logistik as dp', 'dp.id_pemusnahan = p.id');
		$this->db->join('sm_kemasan_barang as kb', 'kb.id = dp.id_kemasan_barang');
		$this->db->join('sm_barang as b', 'b.id = kb.id_barang');
		$this->db->join('sm_unit as u', 'u.id = p.id_unit');
		$this->db->join('sm_translucent as tr', 'tr.id = p.id_users');
		$this->db->join('sm_pegawai as pgu', 'pgu.id = p.id_users', 'left');
		if (($search['tanggal_awal'] !== '') & ($search['tanggal_akhir'] !== '')) :
            $this->db->where("p.tanggal BETWEEN '" . date2mysql($search['tanggal_awal']) . " 00:00:00' AND '" . date2mysql($search['tanggal_akhir']) . " 23:59:59'");
        endif;
		if ($search['logistik'] !== '') :
			$this->db->where('b.id', $search['logistik'], true);
		endif;
		return $this->db->order_by('p.id, p.tanggal', 'desc');
    }

    private function _listPemusnahanLogistik($limit = 0, $start = 0, $search)
    {
        $this->sqlPemusnahanLogistik($search);
        if ($limit !== 0) :
            $this->db->limit($limit, $start);
        endif;
		return $this->db->get()->result();
    }

    function getListDataPemusnahanLogistik($limit = 0, $start = 0, $search)
    {
        $result['data'] = $this->_listPemusnahanLogistik($limit, $start, $search);
        $result['jumlah'] = $this->sqlPemusnahanLogistik($search)->get()->num_rows();
        return $result;
        $this->db->close();
    }

	function generateKodePemusnahanLogistik()
    {
    	date_default_timezone_set('Asia/Jakarta');
        $tahun = date('Y');
        $bulan = date('m');
        $row = $this->db->query("select kode from sm_pemusnahan_logistik where date_part('month', tanggal) = ".$bulan." and date_part('year', tanggal) = ".$tahun." and kode is not NULL order by kode desc limit 1")->row();
        if ($row) :
            $kode = explode('/', $row->kode);
            $get_kode = $kode[3];
        endif;
        if (!isset($get_kode)) {
            $auto = "0001";
        } else {
            $auto = str_pad((string) ($get_kode + 1), 4, "0", STR_PAD_LEFT);
        }
        $result = "GD/HPS/" . $tahun . "-" . $bulan . "/" . $auto;
        return $result;
    }

	function simpanDataPemusnahanLogistik()
	{
		$this->db->trans_begin();
		$status = false;
		$message = "Gagal menyimpan data pemusnahan logistik";
		$idLogistik = safe_post('id_logistik');
		$ed = safe_post('ed');
		$expired = safe_post('expired');
		$jumlah = safe_post('jumlah');

		if (is_array($idLogistik)) :
			$this->db->insert('sm_pemusnahan_logistik', [
				'tanggal' => $this->datetime,
				'kode' => $this->generateKodePemusnahanLogistik(),
				'id_unit' => $this->unit,
				'id_users' => $this->user
			]);
			$id_pemusnahan = $this->db->insert_id();
			if ($this->db->trans_status() === false) :
				$this->db->trans_rollback();
				$result['status'] = $status;
				$result['message'] = $message;
			endif;
			foreach ($idLogistik as $i => $data) :
				$logistik = $this->db->query("
					select b.hpp, kb.id as id_kemasan_barang
					from sm_barang as b 
					join sm_kemasan_barang as kb on (kb.id_barang = b.id) 
					where kb.id_barang = '" . $data . "' and kb.default_kemasan = '1'")->row();
				$detail = [
					'id_pemusnahan' => $id_pemusnahan,
					'id_kemasan_barang' => $logistik->id_kemasan_barang,
					'jumlah' => $jumlah[$i],
					'hpp' => $logistik->hpp
				];
				$this->db->insert('sm_detail_pemusnahan_logistik', $detail);
				if ($this->db->trans_status() === false) :
					$this->db->trans_rollback();
					$result['status'] = $status;
					$result['message'] = $message;
				endif;
				$stok = [
					'waktu' => $this->datetime,
					'id_transaksi' => $id_pemusnahan,
					'transaksi' => 'Pemusnahan',
					'id_barang' => $data,
					'id_stok' => $ed[$i],
					'ed' => $expired[$i],
					'keluar' => $jumlah[$i],
					'keterangan' => $this->inventori->namaUnit($this->unit),
					'id_unit' => $this->unit,
					'id_users' => $this->user
				];
				$this->db->insert('sm_invrt_stok', $stok);
				if ($this->db->trans_status() === false) :
					$this->db->trans_rollback();
					$result['status'] = $status;
					$result['message'] = $message;
				endif;
			endforeach;
			if ($this->db->trans_status() === false) :
				$this->db->trans_rollback();
				$result['status'] = $status;
				$result['message'] = $message;
			else :
				$this->db->trans_commit();
				$status = true;
				$message = "Berhasil menyimpan data pemusnahan logistik";
				$result['status'] = $status;
				$result['message'] = $message;
			endif;
		else :
			$this->db->trans_rollback();
			$result['status'] = $status;
			$result['message'] = $message;
		endif;
		return $result;
	}

	function deleteDataPemusnahanLogistik($id)
	{
		$this->db->trans_begin();
		$message = "Gagal menghapus data pemusnahan logistik";
		$this->db->delete("sm_pemusnahan_logistik", array("id" => $id));
		$this->db->delete("sm_detail_pemusnahan_logistik", array("id_pemusnahan" => $id));
        $this->db->delete("sm_invrt_stok", array("id_transaksi" => $id, "transaksi" => "Pemusnahan"));
		if ($this->db->trans_status() === false) :
			$this->db->trans_rollback();
			$result['status'] = false;
		else :
			$this->db->trans_commit();
			$result['status'] = true;
			$result['message'] = "Berhasil menghapus data pemusnahan logistik";
		endif;

		$result['message'] = $message;
		return $result;
	}

	function getDataPemusnahanLogistik($idPemusnahan)
    {
        $sql = "select p.*, 
                concat_ws(' ',b.nama, b.kekuatan, st.nama, coalesce(sd.nama, ''), '<small><i>', coalesce(pb.nama,''), '</i></small>') as nama_logistik, 
                dp.jumlah, stn.nama as kemasan, dp.ed 
                from sm_pemusnahan_logistik p 
                join sm_detail_pemusnahan_logistik dp on (dp.id_pemusnahan = p.id) 
                join sm_kemasan_barang kb on (dp.id_kemasan_barang = kb.id) 
                join sm_barang b on (kb.id_barang = b.id) 
                join sm_satuan stn on (kb.id_kemasan = stn.id) 
                left join sm_satuan st on (b.satuan_kekuatan = st.id) 
                left join sm_sediaan sd on (b.id_sediaan = sd.id) 
                left join sm_pabrik pb on (b.id_pabrik = pb.id) 
                where p.id = '" . $idPemusnahan . "'";
        return $this->db->query($sql);
    }
}
