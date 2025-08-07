<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Order_laboratorium_model extends CI_Model {

	function __construct()
	{
		parent::__construct();
        $this->datetime = date('Y-m-d H:i:s');
        $this->load->model("pelayanan/Pelayanan_model", "m_pelayanan");
	}

	private function sqlOrderLaboratorium($search)
    {
        $this->db->select("orlab.*, 
                    pd.id_pasien as no_rm, lp.cara_bayar,
                    pd.no_register, p.nama as pasien,
                    COALESCE(lp.jenis_layanan, '') as layanan_lab, 
                    COALESCE(pj.nama, '') as penjamin,
                    COALESCE(pg.nama, '') as dokter, 
                    COALESCE(bg.nama, '') as bangsal, 
                    CONCAT_WS(' ', lp.jenis_layanan, sp.nama) as layanan, 
                    lp.id as id_layanan_pendaftaran, lp.id_pendaftaran, pd.jenis_igd");
        $this->db->from("sm_order_laboratorium as orlab");
        $this->db->join("sm_layanan_pendaftaran as lp", "lp.id = orlab.id_layanan_pendaftaran");
        $this->db->join("sm_pendaftaran as pd", "pd.id = lp.id_pendaftaran");
        $this->db->join("sm_pasien as p", "p.id = pd.id_pasien");
        $this->db->join("sm_spesialisasi as sp", "sp.id = lp.id_unit_layanan", "left");
        $this->db->join('sm_penjamin as pj', 'pj.id = lp.id_penjamin', 'left');
        $this->db->join("sm_tenaga_medis as tm", "tm.id = orlab.id_dokter", "left");
        $this->db->join("sm_pegawai as pg", "pg.id = tm.id_pegawai", "left");
        $this->db->join("sm_rawat_inap as ri", "ri.id_layanan_pendaftaran = lp.id", "left");
        $this->db->join("sm_bangsal as bg", "bg.id = ri.id_bangsal", "left");

        if (($search['tanggal_awal'] !== '') & ($search['tanggal_akhir'] !== '')) :
            $this->db->where("orlab.waktu_order BETWEEN '" . date2mysql($search['tanggal_awal']) . " 00:00:00' AND '" . date2mysql($search['tanggal_akhir']) . " 23:59:59'");
        endif;

        if ($search['no_register'] !== '') :
            $this->db->where('pd.no_register', $search['no_register'], true);
        endif;

        if ($search['no_rm'] !== '') :
            $this->db->like('p.id', $search['no_rm'], 'before', true);
        endif;

        if ($search['dokter'] !== '') :
            $this->db->where('orlab.id_dokter', $search['dokter']);
        endif;

        if ($search['jenis'] !== '') :
            $this->db->where('orlab.jenis', $search['jenis']);
        endif;

        if ($search['nama'] !== '') :
            $this->db->where("p.nama ilike '%" . strtolower($search['nama']) . "%'");
        endif;

        return $this->db->order_by('orlab.waktu_order', 'desc');    
    }

    private function _listOrderLaboratorium($limit = 0, $start = 0, $search)
    {
        $this->sqlOrderLaboratorium($search);
		if ($limit !== 0) :
			$this->db->limit($limit, $start);
        endif;

        return $this->db->get()->result();
        // $this->db->get(); echo $this->db->last_query(); exit();
    }

    function getListDataOrderLaboratorium($limit = 0, $start = 0, $search)
    {
        $result['data'] = $this->_listOrderLaboratorium($limit, $start, $search);
        $result['jumlah'] = $this->sqlOrderLaboratorium($search)->get()->num_rows();
        $this->db->close();
        return $result;
    }

    function getDokterPenanggungJawab($q, $start, $limit)
    {
        $limit = " limit " . $limit . " offset " . $start;
        $select = "select n.*,pg.id as id_pegawai, pg.nama, COALESCE(s.nama , '') as spesialisasi ";
        $count = "select count(n.id) as count ";
        $sql = "from sm_tenaga_medis n
                join sm_pegawai pg on (pg.id = n.id_pegawai)
                left join sm_spesialisasi s on (s.id = n.id_spesialisasi)
                left join sm_profesi_nadis prn on (prn.id = n.id_profesi)
                where pg.nama ilike ('%$q%')
                and (prn.nama = 'Dokter Umum' or prn.nama = 'Dokter Spesialis' or prn.nama = 'Dokter')
                and pg.status = '1'";

        // echo $select . $sql; die;
        $data['data'] = $this->db->query($select . $sql . $limit)->result();
        $data['total'] = $this->db->query($count . $sql)->row()->count;
        return $data;
    }

    function getPegawaiLab($params, $start, $limit)
    {
        $limit = " limit " . $limit . " offset " . $start;
        $q = '';
        if ($params['jenis'] !== '') :
            if ($params['jenis'] === '12') :
                $q .= " and pn.id = '" . $params['jenis'] . "' and pg.id_jabatan = '134' ";
            endif;
        endif;
        $sql   = "select pg.id as id, tm.id as id_medis, pg.nama, coalesce(s.nama, '') as spesialisasi 
                  from sm_pegawai as pg
                  left join sm_jabatan as jbt on (jbt.id = pg.id_jabatan) 
                  left join sm_profesi_nadis as pn on (jbt.id = pn.id_prof)  
                  left join sm_tenaga_medis as tm on (pg.id = tm.id_pegawai) 
                  left join sm_spesialisasi as s on (s.id = tm.id_spesialisasi) 
                  where pg.nama ilike ('%" . $params['q'] . "%') and pg.status = '1' " . $q . " order by pg.nama";
        $data['data'] = $this->db->query($sql . $limit)->result();
        $data['total'] = $this->db->query($sql)->num_rows();
        return $data;
    
    }

    function updatePembatalanOrderLaboratorium($id_order, $data)
    {
        $this->db->trans_begin();
        $this->db->where("id", $id_order)->update("sm_order_laboratorium", $data);
        if ($this->db->trans_status() === false) :
            $this->db->trans_rollback();
            $status = false;
            $message = 'Gagal melakukan pembatalan order laboratorium';
        else :
            $this->db->trans_commit();
            $status = true;
            $message = 'Berhasil melakukan pembatalan order laboratorium';
        endif;

        return array('status' => $status, 'message' => $message);
    }

    function getDataDetailDaftarLAB($id_order) 
    {
        $sql = "select orlab.*, p.id as no_rm, jl.status as status_lis, p.nama as pasien,
                p.tanggal_lahir, p.kelamin,  p.no_identitas as no_identitas,
                (null) as item_pemeriksaan, pd.id as id_pendaftaran,
                pd.jenis_pendaftaran, COALESCE(sp.nama, '') as layanan, 
                COALESCE(pg.nama, '') as dokter 
                from sm_order_laboratorium as orlab 
                join sm_layanan_pendaftaran as lp on (lp.id = orlab.id_layanan_pendaftaran) 
                join sm_pendaftaran as pd on (pd.id = lp.id_pendaftaran) 
                join sm_pasien as p on (p.id = pd.id_pasien) 
                left join sm_jenis_lab jl on (jl.id_lab = orlab.id)
                left join sm_spesialisasi as sp on (sp.id = lp.id_unit_layanan) 
                left join sm_tenaga_medis as tm on (tm.id = orlab.id_dokter) 
                left join sm_pegawai as pg on (pg.id = tm.id_pegawai) 
                where orlab.id = '".$id_order."'";
        $data = $this->db->query($sql)->row();
        if ($data) :
            $dataTarif = json_decode($data->item);
            $item = array();

            if($dataTarif !== null){
                foreach ($dataTarif as $tarif) :
                    $this->db->select("tp.id, l.nama as layanan, '' as penjamin, 'tidak' as cito, (null) as item_lab, '' as item_lab_label, tp.jenis, COALESCE(k.nama, '') as kelas, tp.total");
                    $this->db->from("sm_tarif_pelayanan as tp");
                    $this->db->join("sm_layanan as l", "l.id = tp.id_layanan");
                    $this->db->join("sm_kelas as k", "k.id = tp.id_kelas");
                    $this->db->where("tp.id", $tarif->item);
                    $order = $this->db->get()->row();
                    if ($tarif->penjamin !== "0") :
                        $dataPenjamin = $this->db->where("id", $tarif->penjamin)->get("sm_penjamin")->row();
                        if ($dataPenjamin) :
                            $order->penjamin = $dataPenjamin->nama;
                        endif;
                    endif;

                    
                    if (isset($tarif->item_lab)) :
                        $order->item_lab = array();
                        $order->item_lab = $tarif->item_lab;
                    endif;

                    if (isset($tarif->item_lab)) :
                        $order->item_lab_label = $tarif->item_lab_label;
                    endif;

                    $order->cito = $tarif->cito;
                    $item[] = $order;
                endforeach;
            }
            
            $data->item_pemeriksaan = $item;
        endif;

        $this->db->close();
        return $data;
    }

    function getDataDetailOrderLaboratorium($id_order) 
    {
        $sql = "select orlab.*, p.id as no_rm, jl.status as status_lis, p.nama as pasien,
                p.tanggal_lahir, p.kelamin, p.no_identitas as no_identitas,
                (null) as item_pemeriksaan, pd.id as id_pendaftaran, COALESCE(bg.nama, '') as bangsal,
                pd.jenis_pendaftaran, CONCAT_WS(' ', lp.jenis_layanan, sp.nama) as layanan, 
                COALESCE(pg.nama, '') as dokter, pd.jenis_igd
                from sm_order_laboratorium as orlab 
                join sm_layanan_pendaftaran as lp on (lp.id = orlab.id_layanan_pendaftaran) 
                join sm_pendaftaran as pd on (pd.id = lp.id_pendaftaran) 
                join sm_pasien as p on (p.id = pd.id_pasien) 
                left join sm_jenis_lab jl on (jl.id_lab = orlab.id)
                left join sm_spesialisasi as sp on (sp.id = lp.id_unit_layanan) 
                left join sm_tenaga_medis as tm on (tm.id = orlab.id_dokter) 
                left join sm_pegawai as pg on (pg.id = tm.id_pegawai) 
                left join sm_rawat_inap as ri on ri.id_layanan_pendaftaran = lp.id
                left join sm_bangsal as bg on bg.id = ri.id_bangsal
                where orlab.id = '".$id_order."'";
        $data = $this->db->query($sql)->row();
        if ($data) :
            $dataTarif = json_decode($data->item);
            $item = array();
            foreach ($dataTarif as $tarif) :
                $this->db->select("tp.id, l.nama as layanan, '' as penjamin, 'tidak' as cito, (null) as item_lab, '' as item_lab_label, tp.jenis, COALESCE(k.nama, '') as kelas, tp.total");
                $this->db->from("sm_tarif_pelayanan as tp");
                $this->db->join("sm_layanan as l", "l.id = tp.id_layanan");
                $this->db->join("sm_kelas as k", "k.id = tp.id_kelas");
                $this->db->where("tp.id", $tarif->item);
                $order = $this->db->get()->row();
                if ($tarif->penjamin !== "0") :
                    $dataPenjamin = $this->db->where("id", $tarif->penjamin)->get("sm_penjamin")->row();
                    if ($dataPenjamin) :
                        $order->penjamin = $dataPenjamin->nama;
                    endif;
                endif;

                
                if (isset($tarif->item_lab)) :
                    $order->item_lab = array();
                    $order->item_lab = $tarif->item_lab;
                endif;

                if (isset($tarif->item_lab)) :
                    $order->item_lab_label = $tarif->item_lab_label;
                endif;

                $order->cito = $tarif->cito;
                $order->keterangan = $tarif->keterangan; // tambahan lina lab
                $item[] = $order;
            endforeach;
            $data->item_pemeriksaan = $item;
        endif;

        $this->db->close();
        return $data;
    }

	function getExportDataDetailOrderLaboratorium($id_order)
	{
		$sql = "select orlab.*, p.id as no_rm, jl.status as status_lis, p.nama as pasien,
                p.tanggal_lahir, p.kelamin, p.no_identitas as no_identitas, p.telp,
                (null) as item_pemeriksaan, pd.id as id_pendaftaran, COALESCE(bg.nama, '') as bangsal,
                pd.jenis_pendaftaran, CONCAT_WS(' ', lp.jenis_layanan, sp.nama) as layanan, 
                COALESCE(pg.nama, '') as dokter, pd.jenis_igd,
                sd.golongan_sebab_sakit_lain,
                concat_ws(' | ', gs.kode_icdx_rinci, ( SELECT gsa.kode_icdx_rinci FROM sm_golongan_sebab_sakit AS gsa WHERE gsa.ID = sd.id_pengkodean_asterik ), ( SELECT gss1.nama FROM sm_golongan_sebab_sakit AS gss1 WHERE gss1.ID = sd.id_golongan_sebab_sakit ), sd.golongan_sebab_sakit_lain) as golongan_sebab_sakit
                from sm_order_laboratorium as orlab 
                join sm_layanan_pendaftaran as lp on (lp.id = orlab.id_layanan_pendaftaran) 
                join sm_pendaftaran as pd on (pd.id = lp.id_pendaftaran) 
                join sm_pasien as p on (p.id = pd.id_pasien) 
                left join sm_jenis_lab jl on (jl.id_lab = orlab.id)
                left join sm_spesialisasi as sp on (sp.id = lp.id_unit_layanan) 
                left join sm_tenaga_medis as tm on (tm.id = orlab.id_dokter) 
                left join sm_pegawai as pg on (pg.id = tm.id_pegawai) 
                left join sm_rawat_inap as ri on ri.id_layanan_pendaftaran = lp.id
                left join sm_bangsal as bg on bg.id = ri.id_bangsal
                left join sm_diagnosa as sd on sd.id_layanan_pendaftaran = lp.id and sd.prioritas = 'Utama'
                left join sm_golongan_sebab_sakit as gs on gs.id = sd.id_pengkodean
                where orlab.id = '".$id_order."'";
		$data = $this->db->query($sql)->row();
		if ($data) :
			$dataTarif = json_decode($data->item);
			$item = array();
			foreach ($dataTarif as $tarif) :
				$this->db->select("tp.id, l.nama as layanan, '' as penjamin, 'tidak' as cito, (null) as item_lab, '' as item_lab_label, tp.jenis, COALESCE(k.nama, '') as kelas, tp.total");
				$this->db->from("sm_tarif_pelayanan as tp");
				$this->db->join("sm_layanan as l", "l.id = tp.id_layanan");
				$this->db->join("sm_kelas as k", "k.id = tp.id_kelas");
				$this->db->where("tp.id", $tarif->item);
				$order = $this->db->get()->row();
				if ($tarif->penjamin !== "0") :
					$dataPenjamin = $this->db->where("id", $tarif->penjamin)->get("sm_penjamin")->row();
					if ($dataPenjamin) :
						$order->penjamin = $dataPenjamin->nama;
					endif;
				endif;


				if (isset($tarif->item_lab)) :
					$order->item_lab = array();
					$order->item_lab = $tarif->item_lab;
				endif;

				if (isset($tarif->item_lab)) :
					$order->item_lab_label = $tarif->item_lab_label;
				endif;

				$order->cito = $tarif->cito;
				$order->keterangan = $tarif->keterangan; // tambahan lina lab
				$item[] = $order;
			endforeach;
			$data->item_pemeriksaan = $item;
		endif;

		$this->db->close();
		return $data;
	}

    function simpanDataLaboratorium($dataLaboratorium, $tindakanLaboratorium)
    {
        if (is_array($tindakanLaboratorium) && 0 < count($tindakanLaboratorium)) :
            $dataLayananPendaftaran = $this->db->where("id", $dataLaboratorium['id_layanan_pendaftaran'])->get('sm_layanan_pendaftaran')->row();
            $this->db->insert("sm_laboratorium", $dataLaboratorium);
            $id = $this->db->insert_id();
        else :
            $id = NULL;
        endif;

        return $id;
    }

    function simpanDataDetailLaboratorium($id_layanan_pendaftaran, $dataDetailLaboratorium, $jenis)
    {
        $dataLayananPendaftaran = $this->db->select("lp.*, pj.diskon")->from("sm_layanan_pendaftaran as lp")->join("sm_penjamin as pj", "pj.id = lp.id_penjamin", "left")->where("lp.id", $id_layanan_pendaftaran, true)->get()->row();
        if ($dataLayananPendaftaran) :
            $caraBayar = $dataLayananPendaftaran->cara_bayar;
            $jenisLayanan = $dataLayananPendaftaran->jenis_layanan;
            if (is_array($dataDetailLaboratorium["tindakan_laboratorium"])) :
                foreach ($dataDetailLaboratorium["tindakan_laboratorium"] as $i => $value) :
                    $dataTarifPelayanan = $this->db->where("id", $value)->get("sm_tarif_pelayanan")->row();

                    $cito = NULL;
                    $totalBiaya = $dataTarifPelayanan->total;
                    $beaCito = 0;
                    if ($dataDetailLaboratorium["cito"][$i] === 'ya') :
                        (string) $cito = "Cito";
                        if ($dataTarifPelayanan->id_kelas == 1) :
                            $renum = 0;
                            // $renum = 25;
                        else :
                            $renum = 0;
                            // $renum = 20;
                        endif;

                        $beaCito = $renum / 100 * $dataTarifPelayanan->total;
                        $totalBiaya = $beaCito + $dataTarifPelayanan->total;
                    endif;

                    $penjamin = NULL;
                    if ($dataLayananPendaftaran->id_penjamin !== NULL) :
                        $cek = $this->m_pelayanan->cek_penjaminan_tarif($value, $dataLayananPendaftaran->id_penjamin);
                        if (0 < $cek) :
                            $penjamin = (int) $dataLayananPendaftaran->id_penjamin;
                            $reimburse = (int) $dataLayananPendaftaran->diskon / 100 * $totalBiaya;
                        else :
                            $penjamin = NULL;
                            $reimburse = 0;
                        endif;
                    else :
                        $reimburse = 0;
                    endif;

                    $dataDetail = array(
                        "id_laboratorium" => (int) $dataDetailLaboratorium["id_laboratorium"],
                        "id_tarif" => (int) $value,
                        "jasa_klinik" => floatval($dataTarifPelayanan->jasa_klinik),
                        "jasa_nadis" => floatval($dataTarifPelayanan->jasa_nadis),
                        "bhp" => floatval($dataTarifPelayanan->bhp),
                        "cito" => $cito == "Cito" ? 1 : NULL,
                        "bea_cito" => floatval($beaCito),
                        "total" => floatval($totalBiaya),
                        "id_penjamin" => $penjamin !== '' ? $penjamin : NULL,
                        "reimburse" => floatval($reimburse),
                    );

                    if (is_array($dataDetailLaboratorium["rujuk"]) && in_array($value, $dataDetailLaboratorium["rujuk"]) && $dataDetailLaboratorium["instansi"] !== "") :
                        $dataDetail["id_instansi_rujuk"] = (int) $dataDetailLaboratorium["instansi"];
                    endif;

                    // var_dump($dataDetail); exit();

                    $this->db->insert("sm_detail_laboratorium", $dataDetail);
                    $this->insertItemLaboratorium($this->db->insert_id(), $dataDetail["id_tarif"], $dataDetailLaboratorium["item_lab"][$i]);
                    if ($jenis === "Rawat Inap") :
                        $jenisTransaksi = "Rawat Inap";
                        $id_posting = $id_layanan_pendaftaran;
                    else :
                        if ($jenis = "IGD") :
                            $jenisTransaksi = "IGD";
                            $id_posting = $id_layanan_pendaftaran;
                        else :
                            if ($jenis === "MCU") :
                                $jenisTransaksi = "MCU";
                                $id_posting = $id_layanan_pendaftaran;
                            else :
                                $jenisTransaksi = "Laboratorium";
                                $id_posting = $dataDetailLaboratorium["id_laboratorium"];
                            endif;
                        endif;
                    endif;

                    $this->m_pelayanan->updatePembayaran($dataLayananPendaftaran->id_pendaftaran, $id_posting, $id_layanan_pendaftaran, $jenisTransaksi, $totalBiaya, $reimburse);
                    if ($caraBayar !== "Tunai") :
                        if ($penjamin === NULL) :
                            
                        endif;
                    endif;
                endforeach;
            endif;
        endif;
    }

    function insertItemLaboratorium($id_detail_laboratorium, $id_tarif, $item_laboratorium)
    {
        $itemLaboratorium = json_decode($item_laboratorium);
        $dataTarif = $this->db->where("id", $id_tarif)->select("id_layanan")->get("sm_tarif_pelayanan")->row();
        $id_layanan = $dataTarif->id_layanan;
        $itemLab = $this->db->where("id_layanan", $id_layanan)->get("sm_item_laboratorium")->result();
        if (0 < count((array)$itemLaboratorium)) {
            foreach ($itemLab as $i => $value) {
                if (in_array($value->id, $itemLaboratorium)) {
                    $update = array(
                        'id_detail_laboratorium' => $id_detail_laboratorium,
                        'id_item_laboratorium' => $value->id,
                        'item_laboratorium' => $value->item,
                        'id_satuan' => $value->id_satuan
                    );

                    $this->db->insert('sm_item_detail_laboratorium', $update);
                }
            }
        } else {
            foreach ($itemLab as $i => $value) {
                $update = array(
                    'id_detail_laboratorium' => $id_detail_laboratorium,
                    'id_item_laboratorium' => $value->id,
                    'item_laboratorium' => $value->item,
                    'id_satuan' => $value->id_satuan
                );

                $this->db->insert('sm_item_detail_laboratorium', $update);
            }
        }
    }

    // CPT DK DCT
    function getDataCatatanKantung($id) {
        $this->db
            ->select('dct.*, cpt.*, pgd.nama as dokter, pgu.nama as user')
            ->from('sm_data_catatan_tranfusi as dct')
            ->join('sm_catatan_pelaksanaan_tranfusit as cpt', 'dct.id = cpt.id_data_catatan_tranfusi')
            ->join('sm_tenaga_medis as tmd ', ' tmd.id = cpt.dokter_cpt', 'left')
            ->join('sm_pegawai as pgd ', ' pgd.id = tmd.id_pegawai', 'left')
            ->join('sm_translucent as tr', 'tr.id = cpt.id_users', 'left')
            ->join('sm_pegawai as pgu', 'pgu.id = tr.id', 'left')
            ->where('dct.id', $id);   
        $query = $this->db->get(); // Eksekusi query  
        $data = array(); // Inisialisasi array data   
        if ($query->num_rows() > 0) {
            $data['data'] = $query->row(); // Dapatkan baris pertama
            $data['jumlah'] = $query->num_rows(); // Dapatkan jumlah baris
        } else {
            $data['data'] = null;
            $data['jumlah'] = 0;
        }   
        return $data;
    }

    // CPT 
    function getCatatanPelaksanaanTranfusi($id_pendaftaran){
		return $this->db->select('cpt.*, pgd.nama as dokter')     
        ->from('sm_catatan_pelaksanaan_tranfusit as cpt')	     
		->join('sm_layanan_pendaftaran as lp', 'lp.id = cpt.id_layanan_pendaftaran')  
        ->join('sm_tenaga_medis as tmd ', ' tmd.id = cpt.dokter_cpt', 'left')
        ->join('sm_pegawai as pgd ', ' pgd.id = tmd.id_pegawai', 'left')       
		->where('lp.id_pendaftaran', $id_pendaftaran, true)
        ->get()
        ->row();
	}

    // CPT DK DCT
    function updateCatatanPelaksanaanTransfusi($CatatanPelaksanaanTransfusi, $id_pendaftaran, $id_data_catatan_tranfusi){
        $checkData = $this->getCatatanPelaksanaanTranfusi(safe_post('id_pendaftaran'));
        $datetime = date('Y-m-d H:i:s');   
            // Periksa apakah $id_data_catatan_tranfusi ada
        if ($id_data_catatan_tranfusi) {
        // var_dump($CatatanPelaksanaanTransfusi);die;
            // Perbarui data yang ada
            $this->db->where('id_data_catatan_tranfusi', $id_data_catatan_tranfusi);
            $this->db->update('sm_catatan_pelaksanaan_tranfusit', $CatatanPelaksanaanTransfusi);
            return ['status' => true, 'message' => 'Berhasil Memperbarui Data !!!'];
        } else {
            // Masukkan data baru
            $CatatanPelaksanaanTransfusi['created_date'] = $datetime;
            $this->db->insert('sm_catatan_pelaksanaan_tranfusit', $CatatanPelaksanaanTransfusi);				
            return ['status' => true, 'message' => 'Berhasil Menambahkan Data !!!'];
        }			
    }

    // DK
    function insertKantung($data){
        foreach ($data['date_created'] as $key => $value) {
            $tanggal_pengkajian_cpt = str_replace('/', '-', $data['tanggal_pengkajian'][$key]);
            $tanggal_pengkajian_cpt = date("Y-m-d", strtotime($tanggal_pengkajian_cpt));
            $data_terapi = array(
                'id_pendaftaran'                        => $data['id_pendaftaran'],
                'id_layanan_pendaftaran'                => $data['id_layanan_pendaftaran'],
                'id_user'                               => $data['id_user'][$key],
                'tanggal_pengkajian'                    => $tanggal_pengkajian_cpt,
                'id_data_catatan_tranfusi'              => $data['id_data_catatan_tranfusi'],   
                'nomor_for_cpt'                         => $data['nomor_for_cpt'][$key] !== '' ? $data['nomor_for_cpt'][$key] : null,
                'nomor_stok_cpt'                        => $data['nomor_stok_cpt'][$key] !== '' ? $data['nomor_stok_cpt'][$key] : null,
                'asal_kantong_cpt_1'                    => $data['asal_kantong_cpt_1'][$key] !== '' ? $data['asal_kantong_cpt_1'][$key] : null,
                'asal_kantong_cpt_2'                    => $data['asal_kantong_cpt_2'][$key] !== '' ? $data['asal_kantong_cpt_2'][$key] : null,
                'hasil_cross_cpt_1'                     => $data['hasil_cross_cpt_1'][$key] !== '' ? $data['hasil_cross_cpt_1'][$key] : null,
                'hasil_cross_cpt_2'                     => $data['hasil_cross_cpt_2'][$key] !== '' ? $data['hasil_cross_cpt_2'][$key] : null,
                'hasil_cross_cpt_3'                     => $data['hasil_cross_cpt_3'][$key] !== '' ? $data['hasil_cross_cpt_3'][$key] : null,
                'hasil_cross_cpt_4'                     => $data['hasil_cross_cpt_4'][$key] !== '' ? $data['hasil_cross_cpt_4'][$key] : null,
                'jk_cpt_1'                              => $data['jk_cpt_1'][$key] !== '' ? $data['jk_cpt_1'][$key] : null,
                'jk_cpt_2'                              => $data['jk_cpt_2'][$key] !== '' ? $data['jk_cpt_2'][$key] : null,
                'jk_cpt_3'                              => $data['jk_cpt_3'][$key] !== '' ? $data['jk_cpt_3'][$key] : null,
                'jk_cpt_4'                              => $data['jk_cpt_4'][$key] !== '' ? $data['jk_cpt_4'][$key] : null,
                'jk_cpt_5'                              => $data['jk_cpt_5'][$key] !== '' ? $data['jk_cpt_5'][$key] : null,
                'jk_cpt_6'                              => $data['jk_cpt_6'][$key] !== '' ? $data['jk_cpt_6'][$key] : null,
                'golongan_cpt_1'                        => $data['golongan_cpt_1'][$key] !== '' ? $data['golongan_cpt_1'][$key] : null,
                'golongan_cpt_2'                        => $data['golongan_cpt_2'][$key] !== '' ? $data['golongan_cpt_2'][$key] : null,
                'golongan_cpt_3'                        => $data['golongan_cpt_3'][$key] !== '' ? $data['golongan_cpt_3'][$key] : null,
                'golongan_cpt_4'                        => $data['golongan_cpt_4'][$key] !== '' ? $data['golongan_cpt_4'][$key] : null,
                'rh_cpt_1'                              => $data['rh_cpt_1'][$key] !== '' ? $data['rh_cpt_1'][$key] : null,
                'rh_cpt_2'                              => $data['rh_cpt_2'][$key] !== '' ? $data['rh_cpt_2'][$key] : null,
                'volume_cpt'                            => $data['volume_cpt'][$key] !== '' ? $data['volume_cpt'][$key] : null,
                'jam_keluar_utd'                        => $data['jam_keluar_utd'][$key] !== '' ? $data['jam_keluar_utd'][$key] : null,
                'identifikasi_kantung_cpt_1'            => $data['identifikasi_kantung_cpt_1'][$key] !== '' ? $data['identifikasi_kantung_cpt_1'][$key] : null,
                'identifikasi_kantung_cpt_2'            => $data['identifikasi_kantung_cpt_2'][$key] !== '' ? $data['identifikasi_kantung_cpt_2'][$key] : null,
                'identifikasi_pasien_cpt_1'             => $data['identifikasi_pasien_cpt_1'][$key] !== '' ? $data['identifikasi_pasien_cpt_1'][$key] : null,
                'identifikasi_pasien_cpt_2'             => $data['identifikasi_pasien_cpt_2'][$key] !== '' ? $data['identifikasi_pasien_cpt_2'][$key] : null,
                'keadaan_kantung_cpt_1'                 => $data['keadaan_kantung_cpt_1'][$key] !== '' ? $data['keadaan_kantung_cpt_1'][$key] : null,
                'keadaan_kantung_cpt_2'                 => $data['keadaan_kantung_cpt_2'][$key] !== '' ? $data['keadaan_kantung_cpt_2'][$key] : null,
                'jam_ruangan_cpt'                       => $data['jam_ruangan_cpt'][$key] !== '' ? $data['jam_ruangan_cpt'][$key] : null,
                'waktu_mulai_cpt'                       => $data['waktu_mulai_cpt'][$key] !== '' ? $data['waktu_mulai_cpt'][$key] : null,
                'waktu_selesai_cpt'                     => $data['waktu_selesai_cpt'][$key] !== '' ? $data['waktu_selesai_cpt'][$key] : null,
                'jam_ob_1'                              => $data['jam_ob_1'][$key] !== '' ? $data['jam_ob_1'][$key] : null,
                'jam_ob_2'                              => $data['jam_ob_2'][$key] !== '' ? $data['jam_ob_2'][$key] : null,
                'jam_ob_3'                              => $data['jam_ob_3'][$key] !== '' ? $data['jam_ob_3'][$key] : null,
                'jam_ob_4'                              => $data['jam_ob_4'][$key] !== '' ? $data['jam_ob_4'][$key] : null,

                'tensi_cpt_1'                           => $data['tensi_cpt_1'][$key] !== '' ? $data['tensi_cpt_1'][$key] : null,
                'tensi_cpt_2'                           => $data['tensi_cpt_2'][$key] !== '' ? $data['tensi_cpt_2'][$key] : null,
                'tensi_cpt_3'                           => $data['tensi_cpt_3'][$key] !== '' ? $data['tensi_cpt_3'][$key] : null,
                'tensi_cpt_4'                           => $data['tensi_cpt_4'][$key] !== '' ? $data['tensi_cpt_4'][$key] : null,
                
                'rr_cpt_1'                              => $data['rr_cpt_1'][$key] !== '' ? $data['rr_cpt_1'][$key] : null,
                'rr_cpt_2'                              => $data['rr_cpt_2'][$key] !== '' ? $data['rr_cpt_2'][$key] : null,
                'rr_cpt_3'                              => $data['rr_cpt_3'][$key] !== '' ? $data['rr_cpt_3'][$key] : null,
                'rr_cpt_4'                              => $data['rr_cpt_4'][$key] !== '' ? $data['rr_cpt_4'][$key] : null,

                'suhu_cpt_1'                            => $data['suhu_cpt_1'][$key] !== '' ? $data['suhu_cpt_1'][$key] : null,
                'suhu_cpt_2'                            => $data['suhu_cpt_2'][$key] !== '' ? $data['suhu_cpt_2'][$key] : null,
                'suhu_cpt_3'                            => $data['suhu_cpt_3'][$key] !== '' ? $data['suhu_cpt_3'][$key] : null,
                'suhu_cpt_4'                            => $data['suhu_cpt_4'][$key] !== '' ? $data['suhu_cpt_4'][$key] : null,

                'nadi_cpt_1'                            => $data['nadi_cpt_1'][$key] !== '' ? $data['nadi_cpt_1'][$key] : null,
                'nadi_cpt_2'                            => $data['nadi_cpt_2'][$key] !== '' ? $data['nadi_cpt_2'][$key] : null,
                'nadi_cpt_3'                            => $data['nadi_cpt_3'][$key] !== '' ? $data['nadi_cpt_3'][$key] : null,
                'nadi_cpt_4'                            => $data['nadi_cpt_4'][$key] !== '' ? $data['nadi_cpt_4'][$key] : null,

                'reaksi_cpt_1'                          => $data['reaksi_cpt_1'][$key] !== '' ? $data['reaksi_cpt_1'][$key] : null,
                'reaksi_cpt_2'                          => $data['reaksi_cpt_2'][$key] !== '' ? $data['reaksi_cpt_2'][$key] : null,
                'reaksi_cpt_3'                          => $data['reaksi_cpt_3'][$key] !== '' ? $data['reaksi_cpt_3'][$key] : null,
                'reaksi_cpt_4'                          => $data['reaksi_cpt_4'][$key] !== '' ? $data['reaksi_cpt_4'][$key] : null,

                'petugas_cpt_1'                         => $data['petugas_cpt_1'][$key] !== '' ? $data['petugas_cpt_1'][$key] : null,
                'petugas_cpt_2'                         => $data['petugas_cpt_2'][$key] !== '' ? $data['petugas_cpt_2'][$key] : null,
                'petugas_cpt_3'                         => $data['petugas_cpt_3'][$key] !== '' ? $data['petugas_cpt_3'][$key] : null,
                'petugas_cpt_4'                         => $data['petugas_cpt_4'][$key] !== '' ? $data['petugas_cpt_4'][$key] : null,
                'petugas_tambah_I'                         => $data['petugas_tambah_I'][$key] !== '' ? $data['petugas_tambah_I'][$key] : null,
                'petugas_tambah_II'                         => $data['petugas_tambah_II'][$key] !== '' ? $data['petugas_tambah_II'][$key] : null,
                'created_at'                 => $value,
            );
            // var_dump( $data_terapi);die;
            $this->db->insert('sm_catatan_kantung', $data_terapi);
        }
    }

    // DK
    function editKantung($data){
        return $this->db->where('id', $data['id'], true)->update('sm_catatan_kantung', $data);
    }

    // DK
    function getKantung($id_layanan_pendaftaran){
        return $this->db->select("dk.*, COALESCE(spg1.nama, '') as perawat_1,
                                        COALESCE(spg2.nama, '') as perawat_2,
                                        COALESCE(spg3.nama, '') as perawat_3, 
                                        COALESCE(spg4.nama, '') as perawat_4, 
                                        COALESCE(spg5.nama, '') as perawat_5, 
                                        COALESCE(spg6.nama, '') as perawat_6, 
                                        COALESCE(wid.nama, '') as akun_user")
        ->from('sm_catatan_kantung as dk')
        ->join('sm_layanan_pendaftaran as lp', 'dk.id_layanan_pendaftaran = lp.id')
        ->join('sm_tenaga_medis stm1', 'dk.petugas_cpt_1 = stm1.id', 'left')
        ->join('sm_tenaga_medis stm2', 'dk.petugas_cpt_2 = stm2.id', 'left')
        ->join('sm_tenaga_medis stm3', 'dk.petugas_cpt_3 = stm3.id', 'left')
        ->join('sm_tenaga_medis stm4', 'dk.petugas_cpt_4 = stm4.id', 'left')
        ->join('sm_tenaga_medis stm5', 'dk.petugas_tambah_I = stm5.id', 'left')
        ->join('sm_tenaga_medis stm6', 'dk.petugas_tambah_II = stm6.id', 'left')
        ->join('sm_pegawai spg1', 'spg1.id = stm1.id_pegawai', 'left')
        ->join('sm_pegawai spg2', 'spg2.id = stm2.id_pegawai', 'left')
        ->join('sm_pegawai spg3', 'spg3.id = stm3.id_pegawai', 'left')
        ->join('sm_pegawai spg4', 'spg4.id = stm4.id_pegawai', 'left')
        ->join('sm_pegawai spg5', 'spg5.id = stm5.id_pegawai', 'left')
        ->join('sm_pegawai spg6', 'spg6.id = stm6.id_pegawai', 'left')
        ->join('sm_translucent sid', 'dk.id_user = sid.id', 'left')
        ->join('sm_pegawai wid', 'dk.id_user = wid.id', 'left')
        ->where('lp.id_pendaftaran', $id_layanan_pendaftaran, true)
        ->order_by('dk.tanggal_pengkajian', 'asc')
        ->get()
        ->result();
    }

    // DK
    function getKantungByID($id){      
        return $this->db->select("dk.*, COALESCE(spg1.nama, '') as perawat_1,
                                        COALESCE(spg2.nama, '') as perawat_2,
                                        COALESCE(spg3.nama, '') as perawat_3, 
                                        COALESCE(spg4.nama, '') as perawat_4, 
                                        COALESCE(spg5.nama, '') as perawat_5, 
                                        COALESCE(spg6.nama, '') as perawat_6, 
                                        COALESCE(wid.nama, '') as akun_user")
        ->from('sm_catatan_kantung as dk')
        ->join('sm_tenaga_medis stm1', 'dk.petugas_cpt_1 = stm1.id', 'left')
        ->join('sm_tenaga_medis stm2', 'dk.petugas_cpt_2 = stm2.id', 'left')
        ->join('sm_tenaga_medis stm3', 'dk.petugas_cpt_3 = stm3.id', 'left')
        ->join('sm_tenaga_medis stm4', 'dk.petugas_cpt_4 = stm4.id', 'left')
        ->join('sm_tenaga_medis stm5', 'dk.petugas_tambah_I = stm5.id', 'left')
        ->join('sm_tenaga_medis stm6', 'dk.petugas_tambah_II = stm6.id', 'left')
        ->join('sm_pegawai spg1', 'spg1.id = stm1.id_pegawai', 'left')
        ->join('sm_pegawai spg2', 'spg2.id = stm2.id_pegawai', 'left')
        ->join('sm_pegawai spg3', 'spg3.id = stm3.id_pegawai', 'left')
        ->join('sm_pegawai spg4', 'spg4.id = stm4.id_pegawai', 'left')
        ->join('sm_pegawai spg5', 'spg5.id = stm5.id_pegawai', 'left')
        ->join('sm_pegawai spg6', 'spg6.id = stm6.id_pegawai', 'left')
        ->join('sm_translucent sid', 'dk.id_user = sid.id', 'left')
        ->join('sm_pegawai wid', 'dk.id_user = wid.id', 'left')
        ->where('dk.id', $id)
        ->order_by('dk.tanggal_pengkajian', 'asc')
        ->get()
        ->row();
    }

    // DK
    function deleteKantung($id){
        return $this->db->where("id", $id)->delete("sm_catatan_kantung");
    } 

    // CPT DK DCT
    function updateDataCatatanTransfusi($data_catatan, $id_pendaftaran, $id_data_catatan_tranfusi) {
        // Periksa apakah $id_data_catatan_tranfusi ada
        if ($id_data_catatan_tranfusi) {
        // var_dump($data_catatan);die;

            // Perbarui data yang ada
            $this->db->where('id', $id_data_catatan_tranfusi);
            $this->db->update('sm_data_catatan_tranfusi', $data_catatan);
            return $id_data_catatan_tranfusi; // Kembalikan ID yang sama
        } else {          
            // Masukkan data baru
            $this->db->insert('sm_data_catatan_tranfusi', $data_catatan);
            return $this->db->insert_id(); // Mengembalikan ID yang dimasukkan
        }
    }

    // CPT DK DCT
    function getListDataCatatanKantungbaru($id){
        // var_dump('tod');die;
        $this->db
            ->select('dct.*, cpt.*, pgd.nama as dokter, pgu.nama as user')
            ->from('sm_data_catatan_tranfusi as dct')
            ->join('sm_catatan_pelaksanaan_tranfusit as cpt', 'dct.id = cpt.id_data_catatan_tranfusi')
            ->join('sm_tenaga_medis as tmd ', ' tmd.id = cpt.dokter_cpt', 'left')
            ->join('sm_pegawai as pgd ', ' pgd.id = tmd.id_pegawai', 'left')
            ->join('sm_translucent as tr', 'tr.id = cpt.id_users', 'left')
            ->join('sm_pegawai as pgu', 'pgu.id = tr.id', 'left')
            ->where('dct.id_pendaftaran', $id);
        $query = $this->db->get();
        return $query->result();
    }

    // CPT DK DCT
    function getEditDataCatatanKantung($id) {
        $this->db
            ->select('dct.*, cpt.*, pgd.nama as dokter, pgu.nama as user')
            ->from('sm_data_catatan_tranfusi as dct')
            ->join('sm_catatan_pelaksanaan_tranfusit as cpt', 'dct.id = cpt.id_data_catatan_tranfusi')
            ->join('sm_tenaga_medis as tmd ', ' tmd.id = cpt.dokter_cpt', 'left')
            ->join('sm_pegawai as pgd ', ' pgd.id = tmd.id_pegawai', 'left')
            ->join('sm_translucent as tr', 'tr.id = cpt.id_users', 'left')
            ->join('sm_pegawai as pgu', 'pgu.id = tr.id', 'left')
            ->where('dct.id', $id);   
        $query = $this->db->get(); // Eksekusi query    
        $data = array(); // Inisialisasi array data   
        if ($query->num_rows() > 0) {
            $data['data'] = $query->row(); // Dapatkan baris pertama
            $data['jumlah'] = $query->num_rows(); // Dapatkan jumlah baris
        } else {
            $data['data'] = null;
            $data['jumlah'] = 0;
        }   
        return $data;
    }

    // CPT DK DCT
    function deleteCatatanKantung($id){
        // Hapus dari tabel sm_catatan_pelaksanaan_tranfusi
        $this->db->where("id_data_catatan_tranfusi", $id);
        $this->db->delete("sm_catatan_pelaksanaan_tranfusit"); 
    
        // Hapus terlebih dahulu dari tabel sm_catatan_kantung yang memiliki kunci asing yang merujuk ke sm_data_catatan_tranfusi
        $this->db->where("id_data_catatan_tranfusi", $id);
        $this->db->delete("sm_catatan_kantung");
    
        // Hapus dari tabel sm_data_catatan_tranfusi
        $this->db->where("id", $id);
        $this->db->delete("sm_data_catatan_tranfusi");

        // Mengembalikan nilai untuk menandakan berhasil atau gagalnya operasi hapus.
        return $this->db->affected_rows() > 0;
    }

    // CPT DK DCT
    function getKantungData($id) {
        $this->db->select(" dk.*, COALESCE(spg1.nama, '') as perawat_1,
                          COALESCE(spg2.nama, '') as perawat_2,
                          COALESCE(spg3.nama, '') as perawat_3, 
                          COALESCE(spg4.nama, '') as perawat_4, 
                          COALESCE(spg5.nama, '') as perawat_5, 
                          COALESCE(spg6.nama, '') as perawat_6,
                          COALESCE(wid.nama, '') as akun_user")
                 ->from('sm_data_catatan_tranfusi as dct')
                 ->join('sm_catatan_kantung as dk', 'dct.id = dk.id_data_catatan_tranfusi')
                 ->join('sm_layanan_pendaftaran as lp', 'dk.id_layanan_pendaftaran = lp.id')
                 ->join('sm_tenaga_medis stm1', 'dk.petugas_cpt_1 = stm1.id', 'left')
                 ->join('sm_tenaga_medis stm2', 'dk.petugas_cpt_2 = stm2.id', 'left')
                 ->join('sm_tenaga_medis stm3', 'dk.petugas_cpt_3 = stm3.id', 'left')
                 ->join('sm_tenaga_medis stm4', 'dk.petugas_cpt_4 = stm4.id', 'left')
                 ->join('sm_tenaga_medis stm5', 'dk.petugas_tambah_I = stm5.id', 'left')
                 ->join('sm_tenaga_medis stm6', 'dk.petugas_tambah_II = stm6.id', 'left')
                 ->join('sm_pegawai spg1', 'spg1.id = stm1.id_pegawai', 'left')
                 ->join('sm_pegawai spg2', 'spg2.id = stm2.id_pegawai', 'left')
                 ->join('sm_pegawai spg3', 'spg3.id = stm3.id_pegawai', 'left')
                 ->join('sm_pegawai spg4', 'spg4.id = stm4.id_pegawai', 'left')
                 ->join('sm_pegawai spg5', 'spg5.id = stm5.id_pegawai', 'left')
                 ->join('sm_pegawai spg6', 'spg6.id = stm6.id_pegawai', 'left')
                 ->join('sm_translucent sid', 'dk.id_user = sid.id', 'left')
                 ->join('sm_pegawai wid', 'dk.id_user = wid.id', 'left')
                 ->where('dk.id_data_catatan_tranfusi', $id)
                 ->order_by('dk.tanggal_pengkajian', 'asc');  
        $query = $this->db->get();       
        $data = array(); // Initialize data array           
        if ($query->num_rows() > 0) {
            $data['data'] = $query->result(); // Get the first row
            $data['jumlah'] = $query->num_rows(); // Get the row count
        } else {
            $data['data'] = null;
            $data['jumlah'] = 0;
        } 
        return $data;
    }

}
