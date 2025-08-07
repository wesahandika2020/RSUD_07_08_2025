<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Casemix_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->datetime = date('Y-m-d H:i:s');
    }

    public function getListDataCasemix($limit, $start, $search)
    {
        $param = "";
        $lunas  = "";
        if ($search["tanggal_awal"] !== "" & $search["tanggal_akhir"] !== "") :
            $param .= " and pd.tanggal_daftar BETWEEN '" . date2mysql($search['tanggal_awal']) . " 00:00:00' AND '" . date2mysql($search['tanggal_akhir']) . " 23:59:59'";
        endif;
        if ($search["keyword"] !== "") :
            $param .= " and (p.nama ilike '%" . $search["keyword"] . "%' or p.id ilike '%" . $search["keyword"] . "%') ";
        endif;
        if ($search["nama"] !== "") :
            $param .= " and p.nama ilike '%" . $search["nama"] . "%' ";
        endif;
        if ($search["no_register"] !== "") :
            $param .= " and pd.no_register = '" . $search["no_register"] . "' ";
        endif;
        if ($search["no_rm"] !== "") :
            $param .= " and p.id ilike '%" . $search["no_rm"] . "' ";
        endif;
        // if ($search["jenis"] === "rawat_jalan") :
        //     $param .= " and (lp.jenis_layanan = 'Poliklinik' or lp.jenis_layanan = 'IGD' or lp.jenis_layanan = 'Forensik' or lp.jenis_layanan = 'Pemulasaran Jenazah' or lp.jenis_layanan = 'Hemodialisa'  or lp.jenis_layanan = 'Medical Check Up') ";
        // else :
        //     if($search["jenis"] === "intensive_care") {
        //         $param .= " and lp.jenis_layanan = 'Intensive Care' ";
        //     }
        //     if ($search["jenis"] === "rawat_inap") :
        //         $param .= " and (lp.jenis_layanan = 'Rawat Inap' or lp.jenis_layanan = 'Intensive Care') ";
        //     else :
        //         if ($search["jenis"] === "langsung") :
        //             $param .= " and (lp.jenis_layanan = 'Laboratorium' or lp.jenis_layanan = 'Radiologi' or lp.jenis_layanan = 'Fisioterapi') ";
        //         endif;
        // endif;
        // endif;
        if ($search["status_bayar"] === "Belum") :
            $param .= " and (select count(id) from sm_pembayaran where id_pendaftaran = pd.id and status = 'Tagihan') > 0 ";
        else :
            if ($search["status_bayar"] === 'Sudah') :
                $param .= " and (select count(id) from sm_pembayaran where id_pendaftaran = pd.id and status = 'Tagihan') < 1 ";
            endif;
        endif;
        if ($search["tempat_layanan"] !== "") :
            $param .= " and sp.nama = '" . $search["tempat_layanan"] . "' ";
        endif;
        if ($search["cara_bayar"] !== "") :
            $param .= " and lp.cara_bayar = '" . $search["cara_bayar"] . "' ";
        endif;
        if ($search["penjamin"] !== "") :
            $param .= " and lp.id_penjamin = '" . $search["penjamin"] . "' ";
        endif;
        if ($search["dokter"] !== "") :
            $param .= " and lp.id_dokter = '" . $search["dokter"] . "' ";
        endif;

        if ($this->session->userdata('id_translucent') == "1874") :
            $param .= " and pj.id = '1' ";
        endif;
        // if ($search["jeni"] === "intensive_care") {
        //     $param .= " and lp.jenis_layanan == 'Intensive Care' ";
        // } else if ()

        $limitation = " limit " . $limit . " offset " . $start;
        $select = " select DISTINCT ON (pmb.id_pendaftaran) pd.*, CONCAT_WS(' ', p.nama, COALESCE(p.status_pasien, '')) as nama, p.id as id_pasien, p.kelamin, p.alamat, 
								lp.jenis_layanan, lp.cara_bayar, 
								COALESCE(pj.diskon, 0) as diskon_asuransi, 
								COALESCE(pj.nama, '') as penjamin,
								COALESCE(sp.nama, '') as spesialisasi, 
								COALESCE(pg.nama, '') as dokter,
								0 as tagihan, pd.no_register, pd.tanggal_daftar,
								lp.tindak_lanjut as status,
								p.id as no_rm,
								(SELECT rd.id FROM sm_radiologi rd JOIN sm_layanan_pendaftaran lp3 on rd.id_layanan_pendaftaran = lp3.id WHERE lp3.id_pendaftaran = lp.id_pendaftaran LIMIT 1) as id_radiologi,
								(SELECT lb.id FROM sm_laboratorium lb JOIN sm_layanan_pendaftaran lp2 on lb.id_layanan_pendaftaran = lp2.id WHERE lp2.id_pendaftaran = lp.id_pendaftaran and lb.status_hasil != 'Batal' LIMIT 1) as id_laboratorium,
								lb.jenis as jenis_laboratorium,
								lp.id as id_layanan,
								pd.id as id_pendaftaran,
								pd.tanggal_keluar,
								CASE WHEN pd.tanggal_keluar IS NULL THEN 'Aktif' ELSE 'Pulang' END as status_kunjungan, 
								COALESCE(pd.keterangan, pd.jenis_pendaftaran) as keterangan, ek.id as status_eklaim ";
        $count = "select count(*) as count from (select DISTINCT ON (pmb.id_pendaftaran) pd.* ";


        if ($search["jenis"] === "rawat_inap") {
            $join_idlayanan = " left join sm_pendaftaran as pd on (pd.id = lp.id_pendaftaran and lp.jenis_layanan IN ('Rawat Inap'))";
            $order_ranap = " lp.jenis_layanan desc, ";
        } else if ($search["jenis"] === "intensive_care") {
            $join_idlayanan = " left join sm_pendaftaran as pd on (pd.id = lp.id_pendaftaran and lp.jenis_layanan IN ('Intensive Care'))";
            $param .= " and lp.jenis_layanan = 'Intensive Care' ";
            $order_ranap = " lp.jenis_layanan asc, ";
        } else if ($search["jenis"] === "igd") {
            $join_idlayanan = " left join sm_pendaftaran as pd on (pd.id = lp.id_pendaftaran and lp.jenis_layanan IN ('IGD'))";
            $param .= " and lp.jenis_layanan = 'IGD' ";
            $order_ranap = " lp.jenis_layanan asc, ";
        } else if ($search["jenis"] === "hemodialisa") {
            $join_idlayanan = " left join sm_pendaftaran as pd on (pd.id = lp.id_pendaftaran and lp.jenis_layanan IN ('Hemodialisa'))";
            $param .= " and lp.jenis_layanan = 'Hemodialisa' ";
            $order_ranap = " lp.jenis_layanan asc, ";
        } else if ($search["jenis"] === "radiologi") {
            $join_idlayanan = " left join sm_pendaftaran as pd on (pd.id = lp.id_pendaftaran and lp.jenis_layanan IN ('Radiologi'))";
            $param .= " and lp.jenis_layanan = 'Radiologi' and pd.jenis_rawat = 'Jalan' ";
            $order_ranap = " lp.jenis_layanan asc, ";
        } else if ($search["jenis"] === "laboratorium") {
            $join_idlayanan = " left join sm_pendaftaran as pd on (pd.id = lp.id_pendaftaran and lp.jenis_layanan IN ('Laboratorium'))";
            $param .= " and lp.jenis_layanan = 'Laboratorium' and pd.jenis_rawat = 'Jalan' ";
            $order_ranap = " lp.jenis_layanan asc, ";
        } else {
            $join_idlayanan = " left join sm_pendaftaran as pd on (pd.id = lp.id_pendaftaran)";
            $order_ranap = " lp.jenis_layanan asc, ";
        }

        $sql = "from sm_layanan_pendaftaran as lp " . $join_idlayanan .
            "left join sm_pasien as p on (p.id = pd.id_pasien) 
						join sm_pembayaran as pmb on (pmb.id_pendaftaran = pd.id) 
						left join sm_spesialisasi as sp on (sp.id = lp.id_unit_layanan) 
						left join sm_tenaga_medis as tm on (tm.id = lp. id_dokter)
						left join sm_pegawai as pg on (pg.id = tm.id_pegawai)
						left join sm_penjamin as pj on (pj.id = lp.id_penjamin) 
						left join sm_radiologi as rd on (rd.id_layanan_pendaftaran = lp.id) 
						left join sm_laboratorium as lb on (lb.id_layanan_pendaftaran = lp.id) 
                        left join sm_eklaim as ek on (pd.id = ek.id_pendaftaran)
						where lp.id is not null " . $param . " 
		
						group by pmb.id_pendaftaran, pd.id, p.nama, p.status_pasien, pg.nama, p.id, p.kelamin, p.alamat, lp.jenis_layanan, lp.cara_bayar, pj.diskon, pj.nama, sp.nama, lp.id, lp.tindak_lanjut, p.id, rd.id, lb.id, lb.jenis, ek.id ";

        $order = " order by pmb.id_pendaftaran desc, " . $order_ranap . " lp.id desc, pd.tanggal_daftar desc ";
        // echo $select . $sql . $order . $limitation; die;
        $query = $this->db->query($select . $sql . $order . $limitation)->result();
        foreach ($query as $i => $value) :
            $tagihan = $this->m_keuangan_ver2->hitungTagihan($value->id);
            $value->tagihan = $tagihan;
        endforeach;

        $result["data"] = $query;
        $result["jumlah"] = $this->db->query($count . $sql . ") as jml")->row()->count;
        return $result;
    }

    public function getListTarifTindakan($id_layanan_pendaftaran, $is_pendaftaran = null)
    {
        $this->db->select("
			ttp.*, l.nama as item, l.id as id_layanan,
			COALESCE(pj.nama, '') as penjamin,
			COALESCE(pj.diskon, '0') as diskon,
			COALESCE(pg.nama, '') as operator,
			ttp.total as harga_item, 
			SUM(ttp.total) as total,
			SUM(ttp.reimburse) as reimburse,
			(SUM(ttp.total) - SUM(ttp.reimburse)) as tagihan,
			COUNT(*) as frekuensi,
			COALESCE(prn.nama, '') as profesi,
			tm.id_profesi, lp.jenis_layanan, sp.id_unit
		");
        $this->db->from('sm_pendaftaran as pd');
        $this->db->join('sm_layanan_pendaftaran as lp', 'lp.id_pendaftaran = pd.id');
        $this->db->join('sm_tarif_tindakan_pasien as ttp', 'ttp.id_layanan_pendaftaran = lp.id');
        $this->db->join('sm_tarif_pelayanan as tp', 'tp.id = ttp.id_tarif_pelayanan');
        $this->db->join('sm_layanan as l', 'l.id = tp.id_layanan');
        $this->db->join('sm_tenaga_medis as tm', 'tm.id = ttp.id_operator', 'left');
        $this->db->join('sm_pegawai as pg', 'pg.id = tm.id_pegawai', 'left');
        $this->db->join('sm_penjamin as pj', 'pj.id = ttp.id_penjamin', 'left');
        $this->db->join('sm_profesi_nadis as prn', 'prn.id = tm.id_profesi', 'left');
        $this->db->join('sm_spesialisasi as sp', 'sp.id = lp.id_unit_layanan', 'left');
        $this->db->where('lp.id', $id_layanan_pendaftaran);
        if ($is_pendaftaran !== null) :
            if ($is_pendaftaran === 'Ya') :
                $this->db->where('ttp.is_pendaftaran', 'Ya', true);
            endif;
            if ($is_pendaftaran === 'Tidak') :
                $this->db->where('ttp.is_pendaftaran', 'Tidak', true);
            endif;
        endif;
        $this->db->group_by('
				tp.id, tp.id, ttp.id_operator, ttp.id, l.nama, l.id, 
				pj.nama, pj.diskon, pg.nama, prn.nama, tm.id_profesi, lp.jenis_layanan, sp.id_unit
		');
        $this->db->order_by('ttp.tanggal, prn.nama');
        return $this->db->get()->result();
    }

    public function getListTarifLaboratorium($id_layanan_pendaftaran)
    {
        $this->db->select("
			lb.*, (null) as detail, (0) as total, (0) as tagihan,
			COALESCE(pgdok.nama, '') as dokter,
			COALESCE(pgdok.nama, '') as operator,
			COALESCE(pgpel.nama, '') as pelaksana
		");
        $this->db->from('sm_laboratorium as lb');
        $this->db->join('sm_tenaga_medis as tmdok', 'tmdok.id = lb.id_dokter_pjwb', 'left');
        $this->db->join('sm_pegawai as pgdok', 'pgdok.id = tmdok.id_pegawai', 'left');
        $this->db->join('sm_tenaga_medis as tmpel', 'tmpel.id = lb.id_analis', 'left');
        $this->db->join('sm_pegawai as pgpel', 'pgpel.id = tmpel.id_pegawai', 'left');
        $this->db->where('lb.id_layanan_pendaftaran', $id_layanan_pendaftaran, true);
        $data = $this->db->get()->result();
        foreach ($data as $i => $val) :
            $this->db->select("
				dlb.*, CONCAT_WS(' ', l.nama, dlb.cito) as item,
				COALESCE(pj.nama, '') as penjamin,
				COALESCE(pj.diskon, '0') as diskon,
				tp.id_layanan
			");
            $this->db->from('sm_detail_laboratorium as dlb');
            $this->db->join('sm_tarif_pelayanan as tp', 'tp.id = dlb.id_tarif');
            $this->db->join('sm_layanan as l', 'l.id = tp.id_layanan');
            $this->db->join('sm_penjamin as pj', 'pj.id = dlb.id_penjamin', 'left');
            $this->db->where('dlb.id_laboratorium', $val->id, true);
            $val->detail = $this->db->get()->result();
            foreach ($val->detail as $j => $val2) :
                $val->total += (int) $val2->total;
            endforeach;
            if (isset($val2->diskon)) :
                if ($val2->diskon !== '') :
                    $val->tagihan = $val->total - $val2->reimburse;
                else :
                    $val->tagihan = $val->total;
                endif;
            endif;
        endforeach;
        return $data;
    }

    public function getListTarifLaboratoriumGroup($id_layanan_pendaftaran)
    {
        $this->db->select("
			dl.total as harga_item, concat_ws(' ', l.nama, dl.cito) as item , 
			COALESCE(pgdk.nama, '') as dokter, 
			COALESCE(pgdk.nama, '') as operator, 
			COALESCE(pj.nama, '') as penjamin,
			COALESCE(pj.diskon, 0) as diskon,
			count(*) as frekuensi,
			(count(*) * dl.total) as total,
			lb.waktu_konfirm
		");
        $this->db->from('sm_detail_laboratorium as dl');
        $this->db->join('sm_laboratorium as lb', 'lb.id = dl.id_laboratorium');
        $this->db->join('sm_tarif_pelayanan as tp', 'tp.id = dl.id_tarif');
        $this->db->join('sm_layanan as l', 'l.id = tp.id_layanan');
        $this->db->join('sm_tenaga_medis as dk', 'dk.id = lb.id_dokter_pjwb', 'left');
        $this->db->join('sm_pegawai as pgdk', 'pgdk.id = dk.id_pegawai', 'left');
        $this->db->join('sm_penjamin as pj', 'pj.id = dl.id_penjamin', 'left');
        $this->db->where('lb.id_layanan_pendaftaran', $id_layanan_pendaftaran, true);
        $this->db->group_by('dl.total, pgdk.nama, pj.nama, pj.diskon, tp.id, l.nama, dl.cito, lb.waktu_konfirm');
        return $this->db->get()->result();
    }

    public function getListTarifRadiologi($id_layanan_pendaftaran)
    {
        $this->db->select("
			rd.*, (null) as detail, (0) as total, (0) as tagihan,
			COALESCE(pgdok.nama, '') as dokter,
			COALESCE(pgdok.nama, '') as operator,
			COALESCE(pgpel.nama, '') as pelaksana
		");
        $this->db->from('sm_radiologi as rd');
        $this->db->join('sm_tenaga_medis as tmdok', 'tmdok.id = rd.id_dokter_pjwb', 'left');
        $this->db->join('sm_pegawai as pgdok', 'pgdok.id = tmdok.id_pegawai', 'left');
        $this->db->join('sm_tenaga_medis as tmpel', 'tmpel.id = rd.id_radiografer', 'left');
        $this->db->join('sm_pegawai as pgpel', 'pgpel.id = tmpel.id_pegawai', 'left');
        $this->db->where('rd.id_layanan_pendaftaran', $id_layanan_pendaftaran, true);
        $data = $this->db->get()->result();
        foreach ($data as $i => $val) :
            $this->db->select("
				drd.*, CONCAT_WS(' ', l.nama, drd.cito) as item,
				COALESCE(pj.nama, '') as penjamin,
				COALESCE(pj.diskon, '0') as diskon,
				COALESCE(pgd.nama, '') as dokter,
				COALESCE(pgr.nama, '') as radiografer
			");
            $this->db->from('sm_detail_radiologi as drd');
            $this->db->join('sm_tarif_pelayanan as tp', 'tp.id = drd.id_tarif');
            $this->db->join('sm_layanan as l', 'l.id = tp.id_layanan');
            $this->db->join('sm_penjamin as pj', 'pj.id = drd.id_penjamin', 'left');
            $this->db->join('sm_tenaga_medis as tmd', 'tmd.id = drd.id_dokter', 'left');
            $this->db->join('sm_pegawai as pgd', 'pgd.id = tmd.id_pegawai', 'left');
            $this->db->join('sm_tenaga_medis as tmr', 'tmr.id = drd.id_radiografer', 'left');
            $this->db->join('sm_pegawai as pgr', 'pgr.id = tmr.id_pegawai', 'left');
            $this->db->where('drd.id_radiologi', $val->id, true);
            $val->detail = $this->db->get()->result();
            foreach ($val->detail as $j => $val2) :
                $val->total += (int) $val2->total;
            endforeach;
            if (isset($val2->diskon)) :
                if ($val2->diskon !== '') :
                    $val->tagihan = $val->total - $val2->reimburse;
                else :
                    $val->tagihan = $val->total;
                endif;
            endif;
        endforeach;
        return $data;
    }

    public function getListTarifRadiologiGroup($id_layanan_pendaftaran)
    {
        $this->db->select("
			dl.total as harga_item, concat_ws(' ', l.nama, dl.cito) as item , 
			COALESCE(pgdk.nama, '') as dokter, 
			COALESCE(pgdk.nama, '') as operator, 
			COALESCE(pj.nama, '') as penjamin,
			COALESCE(pj.diskon, 0) as diskon,
			count(*) as frekuensi,
			(count(*) * dl.total) as total,
			lb.waktu_konfirm
		");
        $this->db->from('sm_detail_radiologi as dl');
        $this->db->join('sm_radiologi as lb', 'lb.id = dl.id_radiologi');
        $this->db->join('sm_tarif_pelayanan as tp', 'tp.id = dl.id_tarif');
        $this->db->join('sm_layanan as l', 'l.id = tp.id_layanan');
        $this->db->join('sm_tenaga_medis as dk', 'dk.id = lb.id_dokter_pjwb', 'left');
        $this->db->join('sm_pegawai as pgdk', 'pgdk.id = dk.id_pegawai', 'left');
        $this->db->join('sm_penjamin as pj', 'pj.id = dl.id_penjamin', 'left');
        $this->db->where('lb.id_layanan_pendaftaran', $id_layanan_pendaftaran, true);
        $this->db->group_by('dl.total, pgdk.nama, pj.nama, pj.diskon, tp.id, l.nama, dl.cito, lb.waktu_konfirm');
        return $this->db->get()->result();
    }

    public function getListTarifFisioterapi($id_layanan_pendaftaran)
    {
        $this->db->select("
			fis.*, (null) as detail, (0) as total, (0) as tagihan,
			COALESCE(pgdok.nama, '') as dokter,
			COALESCE(pgdok.nama, '') as operator
		");
        $this->db->from('sm_fisioterapi as fis');
        $this->db->join('sm_tenaga_medis as tmdok', 'tmdok.id = fis.id_dokter_pjwb', 'left');
        $this->db->join('sm_pegawai as pgdok', 'pgdok.id = tmdok.id_pegawai', 'left');
        $this->db->where('fis.id_layanan_pendaftaran', $id_layanan_pendaftaran, true);
        $data = $this->db->get()->result();
        foreach ($data as $i => $val) :
            $this->db->select("
				dfis.*, CONCAT_WS(' ', l.nama, dfis.cito) as item,
				COALESCE(pj.nama, '') as penjamin,
				COALESCE(pj.diskon, '0') as diskon,
			");
            $this->db->from('sm_detail_fisioterapi as dfis');
            $this->db->join('sm_tarif_pelayanan as tp', 'tp.id = dfis.id_tarif');
            $this->db->join('sm_layanan as l', 'l.id = tp.id_layanan');
            $this->db->join('sm_penjamin as pj', 'pj.id = dfis.id_penjamin', 'left');
            $this->db->where('dfis.id_fisioterapi', $val->id, true);
            $val->detail = $this->db->get()->result();
            foreach ($val->detail as $j => $val2) :
                $val->total += (int) $val2->total;
            endforeach;
            if (isset($val2->diskon)) :
                if ($val2->diskon !== '') :
                    $val->tagihan = $val->total - $val2->reimburse;
                else :
                    $val->tagihan = $val->total;
                endif;
            endif;
        endforeach;
        return $data;
    }

    public function getListTarifFisioterapiGroup($id_layanan_pendaftaran)
    {
        $this->db->select("
			dl.total as harga_item, concat_ws(' ', l.nama, dl.cito) as item , 
			COALESCE(pgdk.nama, '') as dokter, 
			COALESCE(pgdk.nama, '') as operator, 
			COALESCE(pj.nama, '') as penjamin,
			COALESCE(pj.diskon, 0) as diskon,
			count(*) as frekuensi,
			(count(*) * dl.total) as total
		");
        $this->db->from('sm_detail_fisioterapi as dl');
        $this->db->join('sm_fisioterapi as lb', 'lb.id = dl.id_fisioterapi');
        $this->db->join('sm_tarif_pelayanan as tp', 'tp.id = dl.id_tarif');
        $this->db->join('sm_layanan as l', 'l.id = tp.id_layanan');
        $this->db->join('sm_tenaga_medis as dk', 'dk.id = lb.id_dokter_pjwb', 'left');
        $this->db->join('sm_pegawai as pgdk', 'pgdk.id = dk.id_pegawai', 'left');
        $this->db->join('sm_penjamin as pj', 'pj.id = dl.id_penjamin', 'left');
        $this->db->where('lb.id_layanan_pendaftaran', $id_layanan_pendaftaran, true);
        $this->db->group_by('dl.total, pgdk.nama, pj.nama, pj.diskon, tp.id, l.nama, dl.cito');
        return $this->db->get()->result();
    }

    public function getListTarifBarang($id_layanan_pendaftaran)
    {
        $this->db->select("
			penj.*, (null) as detail, penj.waktu as waktu_konfirm,
			(penj.total) as tagihan
		");
        $this->db->from('sm_penjualan as penj');
        $this->db->where('penj.id_layanan_pendaftaran', $id_layanan_pendaftaran, true);
        $this->db->where('penj.jenis !=', 'Bank Darah');
        $this->db->order_by('penj.id', 'asc');
        $data = $this->db->get()->result();
        foreach ($data as $i => $val) :
            $this->db->select("
				CONCAT_WS(' ', b.nama, b.kekuatan, stn.nama, sed.nama, '<small><i>', COALESCE(pb.nama, ''), '</i></small>') as item,
				COALESCE(pj.nama, '') as penjamin,
				COALESCE(pj.diskon, '0') as diskon,
				penjd.harga_jual,
				penjd.qty,
				ROUND(
					CAST (
					   (penjd.harga_jual * penjd.qty)
					   as numeric
					), 2) as total,
				penjd.reimburse
			");
            $this->db->from('sm_detail_penjualan as penjd');
            $this->db->join('sm_penjualan as p', 'p.id = penjd.id_penjualan');
            $this->db->join('sm_kemasan_barang as kb', 'kb.id = penjd.id_kemasan');
            $this->db->join('sm_barang as b', 'b.id = kb.id_barang');
            $this->db->join('sm_pabrik as pb', 'pb.id = b.id_pabrik', 'left');
            $this->db->join('sm_sediaan as sed', 'sed.id = b.id_sediaan', 'left');
            $this->db->join('sm_satuan as stn', 'stn.id = b.satuan_kekuatan', 'left');
            $this->db->join('sm_penjamin as pj', 'pj.id = penjd.id_asuransi', 'left');
            $this->db->where('penjd.id_penjualan', $val->id, true);
            $this->db->where('qty > 0');
            $val->detail = $this->db->get()->result();
        endforeach;
        return $data;
    }

    public function getListTarifBarangBankDarah($id_layanan_pendaftaran)
    {
        $this->db->select("
			penj.*, (null) as detail, penj.waktu as waktu_konfirm,
			(penj.total) as tagihan
		");
        $this->db->from('sm_penjualan_bank_darah as penj');
        $this->db->where('penj.id_layanan_pendaftaran', $id_layanan_pendaftaran, true);
        $this->db->where('penj.jenis', 'Bank Darah', true);
        $this->db->where('penj.status_bank_darah !=', 0);
        $data = $this->db->get()->result();
        foreach ($data as $i => $val) :
            $this->db->select("
				CONCAT_WS(' ', b.nama, b.kekuatan, stn.nama, sed.nama, '<small><i>', COALESCE(pb.nama, ''), '</i></small>') as item,
				COALESCE(pj.nama, '') as penjamin,
				COALESCE(pj.diskon, '0') as diskon,
				penjd.harga_jual,
				penjd.qty,
				ROUND(
					CAST (
					   (penjd.harga_jual * penjd.qty)
					   as numeric
					), 2) as total,
				penjd.reimburse
			");
            $this->db->from('sm_detail_penjualan_bank_darah as penjd');
            $this->db->join('sm_penjualan_bank_darah as p', 'p.id = penjd.id_penjualan');
            $this->db->join('sm_kemasan_barang as kb', 'kb.id = penjd.id_kemasan');
            $this->db->join('sm_barang as b', 'b.id = kb.id_barang');
            $this->db->join('sm_pabrik as pb', 'pb.id = b.id_pabrik', 'left');
            $this->db->join('sm_sediaan as sed', 'sed.id = b.id_sediaan', 'left');
            $this->db->join('sm_satuan as stn', 'stn.id = b.satuan_kekuatan', 'left');
            $this->db->join('sm_penjamin as pj', 'pj.id = penjd.id_asuransi', 'left');
            $this->db->where('penjd.id_penjualan', $val->id, true);
            $this->db->where('qty > 0');
            $this->db->where('penjd.status_order_darah', 'Confirmed', true);
            $val->detail = $this->db->get()->result();
        endforeach;
        return $data;
    }

    public function getListTarifBarangOperasi($id_layanan_pendaftaran)
    {
        $this->db->select("
			penj.*, (null) as detail, penj.waktu as waktu_konfirm,
			(penj.total) as tagihan
		");
        $this->db->from('sm_penjualan as penj');
        $this->db->join('sm_jadwal_kamar_operasi as jko', 'jko.id = penj.id_operasi');
        $this->db->where('jko.id_layanan_pendaftaran', $id_layanan_pendaftaran, true);
        $data = $this->db->get()->result();
        foreach ($data as $i => $val) :
            $this->db->select("
				CONCAT_WS(' ', b.nama, b.kekuatan, stn.nama) as item,
				COALESCE(pj.nama, '') as penjamin,
				COALESCE(pj.diskon, '0') as diskon,
				penjd.harga_jual,
				penjd.qty,
				((penjd.harga_jual - penjd.disc_rp) * penjd.qty) as total,
				penjd.reimburse
			");
            $this->db->from('sm_detail_penjualan as penjd');
            $this->db->join('sm_kemasan_barang as kb', 'kb.id = penjd.id_kemasan');
            $this->db->join('sm_barang as b', 'b.id = kb.id_barang');
            $this->db->join('sm_satuan as stn', 'stn.id = b.satuan_kekuatan', 'left');
            $this->db->join('sm_penjamin as pj', 'pj.id = penjd.id_asuransi', 'left');
            $this->db->where('penjd.id_penjualan', $val->id, true);
            $val->detail = $this->db->get()->result();
        endforeach;
        return $data;
    }

    public function getListTarifKamar($id_layanan_pendaftaran)
    {
        $sql = "select concat_ws(' kelas ', bg.nama, k.nama) as bangsal, 
				COALESCE(ri.diskon, '0') as diskon, 
				ri.nominal, lp.tindak_lanjut, 
				CASE WHEN ri.waktu_keluar is null
					THEN CASE WHEN DATE_PART('day', MAX(NOW()) - MIN(waktu_masuk)) = 0 THEN 1 ELSE DATE_PART('day', MAX(NOW()) - MIN(waktu_masuk)) END 
					ELSE total_hari
				END as durasi, 
				(CASE WHEN ri.waktu_keluar is null
					THEN CASE WHEN DATE_PART('day', MAX(NOW()) - MIN(waktu_masuk)) = 0 THEN 1 ELSE DATE_PART('day', MAX(NOW()) - MIN(waktu_masuk)) END 
					ELSE total_hari
				END * ri.nominal) as total, 
				((CASE WHEN ri.waktu_keluar is null
					THEN CASE WHEN DATE_PART('day', MAX(NOW()) - MIN(waktu_masuk)) = 0 THEN 1 ELSE DATE_PART('day', MAX(NOW()) - MIN(waktu_masuk)) END 
					ELSE total_hari
				END * ri.nominal) * COALESCE(ri.diskon, 0) / 100) as reimburse, 
				CASE WHEN ri.waktu_keluar is null THEN 'Masih Dirawat' ELSE 'Sudah Keluar' END as status_rawat, ri.waktu_masuk as tanggal_masuk, ri.waktu_keluar as tanggal_keluar
				from sm_pendaftaran as pd 
				join sm_layanan_pendaftaran as lp on (lp.id_pendaftaran = pd.id) 
				join sm_rawat_inap as ri on (ri.id_layanan_pendaftaran = lp.id) 
				left join sm_kelas as k on (k.id = ri.id_kelas)
				join sm_bangsal as bg on (bg.id = ri.id_bangsal) 
				where lp.id = '" . $id_layanan_pendaftaran . "' 
				group by bg.nama, k.nama, ri.diskon, ri.nominal, lp.tindak_lanjut, ri.waktu_keluar, ri.total_hari, ri.waktu_masuk, ri.waktu_keluar";
        return $this->db->query($sql)->result();
    }

    public function getListTarifKamarIcare($id_layanan_pendaftaran)
    {
        $sql = "select concat_ws(' kelas ', bg.nama, k.nama) as bangsal, 
				COALESCE(ri.diskon, '0') as diskon, 
				ri.nominal, lp.tindak_lanjut, 
				CASE WHEN ri.waktu_keluar is null
					THEN CASE WHEN DATE_PART('day', MAX(NOW()) - MIN(waktu_masuk)) = 0 THEN 1 ELSE DATE_PART('day', MAX(NOW()) - MIN(waktu_masuk)) END 
					ELSE total_hari
				END as durasi, 
				(CASE WHEN ri.waktu_keluar is null
					THEN CASE WHEN DATE_PART('day', MAX(NOW()) - MIN(waktu_masuk)) = 0 THEN 1 ELSE DATE_PART('day', MAX(NOW()) - MIN(waktu_masuk)) END 
					ELSE total_hari
				END * ri.nominal) as total, 
				((CASE WHEN ri.waktu_keluar is null
					THEN CASE WHEN DATE_PART('day', MAX(NOW()) - MIN(waktu_masuk)) = 0 THEN 1 ELSE DATE_PART('day', MAX(NOW()) - MIN(waktu_masuk)) END 
					ELSE total_hari
				END * ri.nominal) * COALESCE(ri.diskon, 0) / 100) as reimburse, 
				CASE WHEN ri.waktu_keluar is null THEN 'Masih Dirawat' ELSE 'Sudah Keluar' END as status_rawat, ri.waktu_masuk as tanggal_masuk, ri.waktu_keluar as tanggal_keluar
				from sm_pendaftaran as pd 
				join sm_layanan_pendaftaran as lp on (lp.id_pendaftaran = pd.id) 
				join sm_intensive_care as ri on (ri.id_layanan_pendaftaran = lp.id) 
				left join sm_kelas as k on (k.id = ri.id_kelas)
				join sm_bangsal as bg on (bg.id = ri.id_bangsal) 
				where lp.id = '" . $id_layanan_pendaftaran . "' 
				group by bg.nama, k.nama, ri.diskon, ri.nominal, lp.tindak_lanjut, ri.waktu_keluar, ri.total_hari, ri.waktu_masuk, ri.waktu_keluar";
        return $this->db->query($sql)->result();
    }

    public function getListTarifOperasi($id_layanan_pendaftaran, $layanan)
    {
        $this->db->select("
			top.*, l.nama as item, jko.id,
			COALESCE(pj.nama, '') as penjamin,
			COALESCE(pj.diskon, '0') as diskon,
			top.total as harga_item,
			(top.total) as total,
			(top.reimburse) as reimburse,
			((top.total) - (top.reimburse)) as tagihan,
			(1) as frekuensi, 
			(null) as operator_list, 
			(null) as anesthesi_list,
			pg.nama as operator,
		");
        $this->db->from('sm_pendaftaran as pd');
        $this->db->join('sm_layanan_pendaftaran as lp', 'lp.id_pendaftaran = pd.id');
        $this->db->join('sm_jadwal_kamar_operasi as jko', 'jko.id_layanan_pendaftaran = lp.id');
        $this->db->join('sm_tarif_operasi as top', 'top.id_operasi = jko.id');
        $this->db->join('sm_tarif_pelayanan as tp', 'tp.id = top.id_tarif');
        $this->db->join('sm_layanan as l', 'l.id = tp.id_layanan');
        $this->db->join('sm_tenaga_medis as tm', 'tm.id = top.id_nadis', 'left');
        $this->db->join('sm_pegawai as pg', 'pg.id = tm.id_pegawai', 'left');
        $this->db->join('sm_penjamin as pj', 'pj.id = top.id_penjamin', 'left');
        $this->db->where('lp.id', $id_layanan_pendaftaran, true);
        $this->db->where('jko.layanan', $layanan, true);
        $data = $this->db->get()->result();
        foreach ($data as $i => $val) :
            if ($val->is_operasi === 'Ya') :
                // dokter operator
                $this->db->select("COALESCE(pg.nama, '') as operator");
                $this->db->from('sm_tim_operasi as tim');
                $this->db->join('sm_tenaga_medis as tm', 'tm.id = tim.id_nadis', 'left');
                $this->db->join('sm_pegawai as pg', 'pg.id = tm.id_pegawai', 'left');
                $this->db->where('tim.id_jadwal_operasi', $val->id, true);
                $this->db->where('tim.status', 'Dokter Operator');
                $data[$i]->operator_list = $this->db->get()->result();
                // dokter anesthesi
                $this->db->select("COALESCE(pg.nama, '') as operator");
                $this->db->from('sm_tim_operasi as tim');
                $this->db->join('sm_tenaga_medis as tm', 'tm.id = tim.id_nadis', 'left');
                $this->db->join('sm_pegawai as pg', 'pg.id = tm.id_pegawai', 'left');
                $this->db->where('tim.id_jadwal_operasi', $val->id, true);
                $this->db->where('tim.status', 'Dokter Anesthesi');
                $data[$i]->anesthesi_list = $this->db->get()->result();
            else :
                $data[$i]->operator_list = [];
                $data[$i]->anesthesi_list = [];
            endif;
        endforeach;
        return $data;
    }

    public function getListTarifBankDarah($id_layanan_pendaftaran)
    {
        $this->db->select("
			tbd.*, l.nama as item, obd.id,
			COALESCE(pj.nama, '') as penjamin,
			COALESCE(pj.diskon, '0') as diskon,
			tbd.total as harga_item,
			(tbd.total) as total,
			(tbd.reimburse) as reimburse,
			((tbd.total) - (tbd.reimburse)) as tagihan,
			(1) as frekuensi, 
			pg.nama as operator,
		");
        $this->db->from('sm_pendaftaran as pd');
        $this->db->join('sm_layanan_pendaftaran as lp', 'lp.id_pendaftaran = pd.id');
        $this->db->join('sm_order_bank_darah as obd', 'obd.id_layanan_pendaftaran = lp.id');
        $this->db->join('sm_tarif_bank_darah as tbd', 'tbd.id_order_bank_darah = obd.id');
        $this->db->join('sm_tarif_pelayanan as tp', 'tp.id = tbd.id_tarif');
        $this->db->join('sm_layanan as l', 'l.id = tp.id_layanan');
        $this->db->join('sm_tenaga_medis as tm', 'tm.id = tbd.id_nadis', 'left');
        $this->db->join('sm_pegawai as pg', 'pg.id = tm.id_pegawai', 'left');
        $this->db->join('sm_penjamin as pj', 'pj.id = tbd.id_penjamin', 'left');
        $this->db->where('lp.id', $id_layanan_pendaftaran, true);
        $this->db->where('obd.layanan', 'Bank Darah', true);
        $data = $this->db->get()->result();
        return $data;
    }

    public function getListReturBarang($id_layanan_pendaftaran)
    {
        $this->db->select("
			rp.*, (null) as detail, penj.waktu as waktu_konfirm,
			(null) as tagihan
		");
        $this->db->from('sm_retur_penjualan as rp');
        $this->db->join('sm_penjualan as penj', 'penj.id = rp.id_penjualan');
        $this->db->where('penj.id_layanan_pendaftaran', $id_layanan_pendaftaran, true);
        $data = $this->db->get()->result();
        foreach ($data as $i => $val) :
            $this->db->select("
				CONCAT_WS(' ', b.nama, b.kekuatan, stn.nama, sed.nama, '<small><i>, COALESCE(pb.nama, ''), </i></small>') as item,
				(null) as penjamin,
				(null) as diskon,
				penjd.harga_jual,
				penjd.qty,
				(penjd.harga_jual * penjd.qty) as total,
				(null) as reimburse
			");
            $this->db->from('sm_detur_penjualan as penjd');
            $this->db->join('sm_kemasan_barang as kb', 'kb.id = penjd.id_kemasan');
            $this->db->join('sm_barang as b', 'b.id = kb.id_barang');
            $this->db->join('sm_pabrik as pb', 'pb.id = b.id_pabrik', 'left');
            $this->db->join('sm_sediaan as sed', 'sed.id = b.id_sediaan', 'left');
            $this->db->join('sm_satuan as stn', 'stn.id = b.satuan_kekuatan', 'left');
            $this->db->where('penjd.id_retur_penjualan', $val->id, true);
            $val->detail = $this->db->get()->result();
        endforeach;
        return $data;
    }

    public function getListTarifHemodialisa($id_layanan_pendaftaran, $id_history_pembayaran = null)
    {
        $where = null;
        if ($id_history_pembayaran !== null) :
            $where .= " and km.id_history_pembayaran = '" . $id_history_pembayaran . "'";
        endif;

        $sql = "select tk.*, l.nama as item, l.id as id_layanan, 
				coalesce(pj.nama, '') as penjamin, 
				coalesce(pj.diskon, 0) as diskon, 
				case when tk.is_hemodialisa = 'Ya' 
					then 'Tim HD' 
					else coalesce(pg.nama, '') 
				end as operator, 
				tk.total as harga_item, 
				sum(tk.total) as total, 
				sum(tk.reimburse) as reimburse, 
				(sum(tk.total) - sum(tk.reimburse)) as tagihan, 
				count(*) as frekuensi, 
				coalesce(prn.nama, '') as profesi, 
				case when tk.is_hemodialisa = 'Ya'
					then (tk.total - tk.jasa_rs) 
					else tk.jasa_operator
				end as jasa_medis,
				tk.jasa_rs as jasa_klinik, 
				tk.jasa_tindakan_reuse as lain_lain, 
				km.id as id_hd, 
				tk.is_hemodialisa 
				from sm_pendaftaran pd 
                join sm_layanan_pendaftaran lp on (lp.id_pendaftaran = pd.id)
                join sm_hemodialisa km on (km.id_layanan_pendaftaran = lp.id)
                join sm_tarif_hemodialisa tk on (tk.id_hemodialisa = km.id)
                join sm_tarif_pelayanan kt on (kt.id = tk.id_tarif)
                join sm_layanan l on (kt.id_layanan = l.id) 
                left join sm_tenaga_medis nk on (tk.id_operator = nk.id) 
                left join sm_pegawai pg on (pg.id = nk.id_pegawai)
                left join sm_penjamin pj on (pj.id = lp.id_penjamin) 
                left join sm_profesi_nadis prn on (prn.id = nk.id_profesi)
                where lp.id = '" . $id_layanan_pendaftaran . "' " . $where . " 
				group by 
					kt.id,
					tk.id_operator, tk.id,
					l.nama, l.id,
					pj.nama, pj.diskon,
					pg.nama,
					prn.nama,
					km.id
                order by prn.nama, l.id";
        $result = $this->db->query($sql)->result();
        foreach ($result as $key => $value) :

        endforeach;
    }

    public function diagnosisLab($id_pendaftaran)
    {
        $n_diagnosis = "select pas.*, concat_ws(' ', pas.no_rumah, concat('Rt.', pas.no_rt, '/', pas.no_rw), pas.nama_kel, pas.nama_kec, pas.nama_kab, pas.nama_prop, pas.kode_pos) as alamat_tambahan, sp.nama as dokt_name, lp.jenis_layanan, p.jenis_rawat, p.id_pasien as rm_pasien, gss.nama as diagnosis, pj.nama as penjamin, dg.golongan_sebab_sakit_lain as sebab_sakit, lp.cara_bayar
            from sm_layanan_pendaftaran lp
            left join sm_pendaftaran p on (p.id = lp.id_pendaftaran) 
            left join sm_penjamin pj on (pj.id = lp.id_penjamin) 
            left join sm_diagnosa dg on (dg.id_layanan_pendaftaran = lp.id)
            left join sm_golongan_sebab_sakit as gss on (gss.id = dg.id_golongan_sebab_sakit)
            left join sm_tenaga_medis tm on (tm.id = lp.id_dokter) 
            left join sm_pegawai sp on (sp.id = tm.id_pegawai) 
            left join sm_pasien pas on (p.id_pasien = pas.id) 
            where p.id = '" . $id_pendaftaran . "' ";
        $diagnosis = $this->db->query($n_diagnosis)->row();
        return $diagnosis;
    }

    public function get_pemeriksaan_laboratorium_list($id, $param)
    {
        $sql = "select lb.* , lp.id_pendaftaran, lp.jenis_layanan,
                null as detail, pd.id_pasien, 
                COALESCE(pgal.nama, '') as lab_analis,
                COALESCE(pgdk.nama, '') as dokter,
                COALESCE(pgdpj.nama, '') as dokter_pjwb,
                COALESCE(pgan.nama, '') as analis_lab,
                pgdpj.nip as nip_dokter_pjwb, dpj.no_sip as nomer_sip,
                'konfirm' as status
                from sm_laboratorium lb
                left join sm_layanan_pendaftaran lp on (lp.id = lb.id_layanan_pendaftaran)
                left join sm_pendaftaran pd on (lp.id_pendaftaran = pd.id)
                left join sm_pegawai pgal on (pgal.id = lb.analis)
                left join sm_tenaga_medis dk on (dk.id = lb.id_dokter)
                left join sm_pegawai pgdk on (pgdk.id = dk.id_pegawai)
                left join sm_tenaga_medis dpj on (dpj.id = lb.id_dokter_pjwb)
                left join sm_pegawai pgdpj on (pgdpj.id = dpj.id_pegawai)
                left join sm_tenaga_medis an on (an.id = lb.id_analis)
                left join sm_pegawai pgan on (pgan.id = an.id_pegawai)                
                where lb.status_hasil != 'Batal' ";

        if ($param === "list") {
            $w = " and lp.id_pendaftaran = '" . $id . "' ";
            return $this->db->query($sql . $w)->result();
        }
        $w = " and lb.id = '" . $id . "' ";
        return $this->db->query($sql . $w)->row();
    }

    // TEST WESA

    function resume_medis_rajal($id_pendaftaran, $id_layanan, $type = NULL){
        // $this->load->model('rawat_inap/Rawat_inap_model', 'm_rawat_inap');

        if (!$id_pendaftaran || !$id_layanan) {
            die();
        }

        $this->db->select('pd.id, lp.id as id_layanan_pendaftaran, lp.jenis_layanan')
            ->from('sm_pendaftaran pd')
            ->join('sm_layanan_pendaftaran lp', 'pd.id = lp.id_pendaftaran')
            ->where('pd.id', $id_pendaftaran)
            ->order_by('lp.id', 'asc');
        $layanan = $this->db->get()->result();
        $last_layanan = end($layanan);

        $id_layanan         = $layanan[0]->id_layanan_pendaftaran;
        $id_layanan_last    = $last_layanan->id_layanan_pendaftaran;

        if ($id_layanan !== null) :
            $data['pemeriksaan_fisik'] = '';
            $data['diagnosa_utama'] = '';
            $data['diagnosa_sekunder'] = '';
            $data['diagnosa_manual_utama'] = '';
            $data['diagnosa_manual_sekunder'] = '';
            $data['pengobatan'] = '';
            $data['s_soap'] = '';
            $data['o_soap'] = '';
            $data['a_soap'] = '';
            $data['p_soap'] = '';
            $data['subject'] = '';
            $data['objective'] = '';
            $data['assessment'] = '';
            $data['plan'] = '';
            $data['keluhan_utama'] = '';
            $data['tindakan'] = '';
            $data['tindakan_ok'] = '';
            $data['tindakan_lab'] = '';
            $data['tindakan_rad'] = '';
            $data['diet'] = '';


            // $data['pasien'] = $this->db->select(" ps.id no_rm, ps.nama nama_pasien,ps.tanggal_lahir, case when ps.kelamin='P' then 'Perempuan' else 'Laki-Laki' end kelamin, pd.tanggal_daftar, pd.tanggal_keluar,pj.nama as penjamin, ps.alergi, sp.nama as ruang_asal, pg.nama dokter_dpjp, pg.tanda_tangan, pd.jenis_rawat, pd.jenis_pendaftaran, (SELECT tindak_lanjut FROM sm_layanan_pendaftaran WHERE id_pendaftaran = '$id_pendaftaran' AND LOWER(lp.tindak_lanjut) IN ('melarikan diri', 'pulang', 'pemulasaran jenazah', 'rs lain', 'pulang aps', 'atas izin dokter') limit 1) tindak_lanjut, lp.jenis_layanan, rms.diagnosa_awal_masuk, rms.hasil_konsultasi, rms.pending_lab ")
            //     ->from('sm_pasien ps')
            //     ->join('sm_pendaftaran pd', 'ps.id=pd.id_pasien')
            //     ->join('sm_layanan_pendaftaran lp', 'pd.id=lp.id_pendaftaran')
            //     ->join('sm_resume_medis_ranap as rms', 'rms.id_layanan_pendaftaran = lp.id', 'left')
            //     ->join('sm_spesialisasi as sp', 'sp.id = lp.id_unit_layanan', 'left')
            //     ->join('sm_penjamin as pj', 'pj.id = pd.id_penjamin', 'left')
            //     ->join('sm_tenaga_medis tm', 'lp.id_dokter = tm.id', 'left')
            //     ->join('sm_pegawai pg', 'tm.id_pegawai = pg.id', 'left')
            //     ->where('lp.id', $id_layanan, true)
            //     ->get()
            //     ->row();

               
            // TAMBAHAN
            $data['pasien'] = $this->db->select("
                ps.id AS no_rm,
                ps.nama AS nama_pasien,
                ps.tanggal_lahir,
                CASE 
                    WHEN ps.kelamin = 'P' THEN 'Perempuan' 
                    ELSE 'Laki-Laki' 
                END AS kelamin,
                pd.tanggal_daftar,
                pd.tanggal_keluar,
                pj.nama AS penjamin,
                ps.alergi,
                sp.nama AS ruang_asal,
                pg.nama AS dokter_dpjp,
                pg.tanda_tangan,
                pd.jenis_rawat,
                pd.jenis_pendaftaran,
                (
                    SELECT 
                        CASE 
                            WHEN LOWER(lp.tindak_lanjut) IN (
                                'melarikan diri', 
                                'pulang', 
                                'pemulasaran jenazah', 
                                'rs lain', 
                                'pulang aps', 
                                'atas izin dokter'
                            ) 
                            THEN NULL 
                            ELSE lyp.tindak_lanjut 
                        END
                    FROM sm_layanan_pendaftaran AS lyp 
                    WHERE lyp.id_pendaftaran = '$id_pendaftaran' 
                    ORDER BY lyp.id DESC 
                    LIMIT 1
                ) AS tindak_lanjut,
                lp.jenis_layanan,
                rms.diagnosa_awal_masuk,
                rms.hasil_konsultasi,
                rms.pending_lab
            ")
            ->from('sm_pasien ps')
            ->join('sm_pendaftaran pd', 'ps.id = pd.id_pasien')
            ->join('sm_layanan_pendaftaran lp', 'pd.id = lp.id_pendaftaran')
            ->join('sm_resume_medis_ranap AS rms', 'rms.id_layanan_pendaftaran = lp.id', 'left')
            ->join('sm_spesialisasi AS sp', 'sp.id = lp.id_unit_layanan', 'left')
            ->join('sm_penjamin AS pj', 'pj.id = pd.id_penjamin', 'left')
            ->join('sm_tenaga_medis tm', 'lp.id_dokter = tm.id', 'left')
            ->join('sm_pegawai pg', 'tm.id_pegawai = pg.id', 'left')
            ->where('lp.id', $id_layanan, true)
            ->get()
            ->row();


            //  INI ARTINYAA KODINGAN DI ATS
            // $data['pasien'] = $this->db->select("
            //     ps.id AS no_rm,                          // Ambil ID pasien sebagai nomor rekam medis
            //     ps.nama AS nama_pasien,                 // Nama pasien
            //     ps.tanggal_lahir,                       // Tanggal lahir pasien
            //     CASE 
            //         WHEN ps.kelamin = 'P' THEN 'Perempuan' 
            //         ELSE 'Laki-Laki' 
            //     END AS kelamin,                         // Jenis kelamin, diubah jadi teks 'Perempuan' atau 'Laki-Laki'
            //     pd.tanggal_daftar,                      // Tanggal pasien mendaftar
            //     pd.tanggal_keluar,                      // Tanggal pasien keluar
            //     pj.nama AS penjamin,                    // Nama penjamin (BPJS, Umum, dll)
            //     ps.alergi,                              // Alergi pasien (jika ada)
            //     sp.nama AS ruang_asal,                 // Nama ruang/unit asal (misalnya poliklinik/UGD)
            //     pg.nama AS dokter_dpjp,                // Nama dokter penanggung jawab pelayanan (DPJP)
            //     pg.tanda_tangan,                        // Tanda tangan dokter (biasanya base64 image)
            //     pd.jenis_rawat,                         // Jenis rawat: Inap / Jalan / dll
            //     pd.jenis_pendaftaran,                   // Jenis pendaftaran: Baru / Lama / Rujukan
            //     (
            //         SELECT 
            //             CASE 
            //                 WHEN LOWER(lp.tindak_lanjut) IN (
            //                     'melarikan diri', 
            //                     'pulang', 
            //                     'pemulasaran jenazah', 
            //                     'rs lain', 
            //                     'pulang aps', 
            //                     'atas izin dokter'
            //                 ) 
            //                 THEN NULL 
            //                 ELSE lyp.tindak_lanjut 
            //             END
            //         FROM sm_layanan_pendaftaran AS lyp 
            //         WHERE lyp.id_pendaftaran = '$id_pendaftaran' 
            //         ORDER BY lyp.id DESC 
            //         LIMIT 1
            //     ) AS tindak_lanjut,                    // Ambil tindak lanjut terakhir (jika bukan yang umum/standar), atau NULL kalau termasuk kategori yang diabaikan
            //     lp.jenis_layanan,                      // Jenis layanan (Poliklinik, UGD, Rawat Inap, dll)
            //     rms.diagnosa_awal_masuk,               // Diagnosa awal pasien saat masuk
            //     rms.hasil_konsultasi,                  // Hasil konsultasi dari dokter
            //     rms.pending_lab                        // Catatan lab yang masih pending
            // ")
            // ->from('sm_pasien ps')                     // Tabel utama pasien
            // ->join('sm_pendaftaran pd', 'ps.id = pd.id_pasien')                      // Join ke pendaftaran, cari data pendaftaran dari pasien tsb
            // ->join('sm_layanan_pendaftaran lp', 'pd.id = lp.id_pendaftaran')         // Join ke layanan, cari data layanan dari pendaftaran
            // ->join('sm_resume_medis_ranap AS rms', 'rms.id_layanan_pendaftaran = lp.id', 'left') // Join ke resume medis ranap (kalau ada)
            // ->join('sm_spesialisasi AS sp', 'sp.id = lp.id_unit_layanan', 'left')   // Join ke tabel spesialisasi, ambil nama ruang/unit
            // ->join('sm_penjamin AS pj', 'pj.id = pd.id_penjamin', 'left')           // Join ke penjamin, ambil nama penjamin
            // ->join('sm_tenaga_medis tm', 'lp.id_dokter = tm.id', 'left')            // Join ke tenaga medis, ambil ID dokter
            // ->join('sm_pegawai pg', 'tm.id_pegawai = pg.id', 'left')                // Join ke pegawai, ambil detail nama & tanda tangan dokter
            // ->where('lp.id', $id_layanan, true)                                     // Filter berdasarkan ID layanan yang dimaksud
            // ->get()
            // ->row();                                                                // Ambil satu baris hasil sebagai object



            $data['intensive_care'] = $this->db->select('ri.*, bg.nama as nama_bangsal, k.nama as nama_kelas, pj.nama as penjamin, pa.nama as nama_pasien, pd.no_register, pa.tanggal_lahir, pa.kelamin, lp.tindak_lanjut as status, lp.kondisi')
                ->from('sm_intensive_care as ri')
                ->join('sm_layanan_pendaftaran as lp', 'lp.id = ri.id_layanan_pendaftaran')
                ->join('sm_pendaftaran as pd', 'pd.id = lp.id_pendaftaran')
                ->join('sm_pasien as pa', 'pa.id = pd.id_pasien')
                ->join('sm_bangsal as bg', 'bg.id = ri.id_bangsal')
                ->join('sm_kelas as k', 'k.id = ri.id_kelas')
                ->join('sm_penjamin as pj', 'pj.id = ri.id_penjamin', 'left')
                ->where('lp.id', $id_layanan, true)
                ->get()
                ->row();

            $data['kajian_ranap'] = $this->db->select('kmr.*, kmr.keluhan_utama, kmr.riwayat_penyakit_sekarang, kmr.riwayat_penyakit_terdahulu, riwayat_penyakit_keluarga, kmr.pengobatan, kmr.riwayat, kmr.hasil_laboratorium, kmr.hasil_radiologi, kmr.hasil_penunjang_lain, kmr.diagnosa_awal ')
                ->from('sm_kajian_medis_ranap as kmr')
                ->join('sm_layanan_pendaftaran as lp', 'lp.id = kmr.id_layanan_pendaftaran')
                ->where('lp.id', $id_layanan, true)
                ->get()
                ->row();

            $data['kajian_icare'] = $this->db->select('kmr.*, kmr.keluhan_utama, kmr.riwayat_penyakit_sekarang, kmr.riwayat_penyakit_terdahulu, riwayat_penyakit_keluarga, kmr.pengobatan, kmr.riwayat, kmr.hasil_laboratorium, kmr.hasil_radiologi, kmr.hasil_penunjang_lain, kmr.diagnosa_awal ')
                ->from('sm_kajian_medis_icare as kmr')
                ->join('sm_layanan_pendaftaran as lp', 'lp.id = kmr.id_layanan_pendaftaran')
                ->where('lp.id', $id_layanan, true)
                ->get()
                ->row();

                // var_dump($data['kajian_icare']);die;


            // $data['anamnesa'] = $this->db->select("keluhan_utama, riwayat_penyakit_sekarang, riwayat_penyakit_dahulu, riwayat_penyakit_keluarga, anamnesa_sosial, pemeriksaan_penunjang, keadaan_umum, kesadaran, gcs, rr, suhu, tensi_sistolik as sistolik, tensi_diastolik as diastolik, nadi, nps, tinggi_badan, berat_badan, kepala, leher, thorax, pulmo, cor, abdomen, genitalia, ekstrimitas, prognosis, status_mentalis, lingkar_kepala, status_gizi, telinga, hidung, tenggorok, mata, kulit_kelamin, usul_tindak_lanjut, s_soap, o_soap, a_soap, p_soap")
            //     ->from('sm_anamnesa an')
            //     ->join('sm_layanan_pendaftaran lp', 'an.id_layanan_pendaftaran=lp.id')
            //     ->join('sm_pendaftaran p', 'p.id=lp.id_pendaftaran', 'left')
            //     ->where('p.id', $id_pendaftaran, true)
            //     ->get()
            //     ->result();

            // if (!empty($data['anamnesa'])) {
            //     $datas = [];
            //     $keys = array_keys((array)$data['anamnesa'][0]);
            //     foreach ($keys as $key) {
            //         $datas[$key] = [];

            //         foreach ($data['anamnesa'] as $item) {
            //             if ($item->$key !== NULL && !in_array($item->$key, $datas[$key])) {
            //                 $datas[$key][] = $item->$key;
            //             }
            //         }
            //     }
            //     $data['anamnesa'] = $datas;
            // }

            $data['anamnesa'] = $this->db->select(" keluhan_utama, riwayat_penyakit_sekarang, riwayat_penyakit_dahulu, riwayat_penyakit_keluarga, anamnesa_sosial, pemeriksaan_penunjang, keadaan_umum, kesadaran, gcs, rr, suhu, tensi_sistolik as sistolik, tensi_diastolik as diastolik, nadi, nps, tinggi_badan, berat_badan, kepala, leher, thorax, pulmo, cor, abdomen, genitalia, ekstrimitas, prognosis, status_mentalis, lingkar_kepala, status_gizi, telinga, hidung, tenggorok, mata, kulit_kelamin, usul_tindak_lanjut, s_soap, o_soap, a_soap, p_soap ")
                ->from('sm_anamnesa an')
                ->join('sm_layanan_pendaftaran lp', 'an.id_layanan_pendaftaran=lp.id')
                ->join('sm_pendaftaran p', 'p.id=lp.id_pendaftaran', 'left')
                ->where('lp.id_pendaftaran', $id_pendaftaran, true)
                ->get()
                ->row();

            if ($data['anamnesa'] != NULL) {
                $anam = $data['anamnesa'];
                $data['s_soap'] = 'S: ' . $anam->s_soap;
                $data['o_soap'] = 'O: ' . $anam->o_soap;
                $data['a_soap'] = 'A: ' . $anam->a_soap;
                $data['p_soap'] = 'P: ' . $anam->p_soap;
            }

            $data['soap'] = $this->db->select(" subject, objective, assessment, plan ")
                ->from('sm_soap so')
                ->join('sm_layanan_pendaftaran lp', 'so.id_layanan_pendaftaran=lp.id')
                ->join('sm_pendaftaran p', 'p.id=lp.id_pendaftaran', 'left')
                ->where('lp.id', $id_layanan, true)
                ->get()
                ->row();

            if ($data['soap'] != NULL) {
                $soap = $data['soap'];
                $data['subject'] = 'S: ' . $soap->subject;
                $data['objective'] = 'O: ' . $soap->objective;
                $data['assessment'] = 'A: ' . $soap->assessment;
                $data['plan'] = 'P: ' . $soap->plan;
            }

            $data['terapi_pulang'] = $this->db->select("tp.*, b.nama as nama_obat")
                ->from('sm_resume_medis_terapi_pulang as tp')
                ->join('sm_barang as b', 'b.id = tp.obat')
                ->where('tp.id_layanan_pendaftaran', $id_layanan, true)
                ->get()
                ->result();

            $data['jadwal_kontrol'] = $this->db->select("kr.*, kr.tanggal_kontrol, 
            CASE
                WHEN to_char(kr.tanggal_kontrol, 'd')='2' THEN 'Senin'
                WHEN to_char(kr.tanggal_kontrol, 'd')='3' THEN 'Selasa'
                WHEN to_char(kr.tanggal_kontrol, 'd')='4' THEN 'Rabu'
                WHEN to_char(kr.tanggal_kontrol, 'd')='5' THEN 'Kamis'
                WHEN to_char(kr.tanggal_kontrol, 'd')='6' THEN 'Jumat'
                WHEN to_char(kr.tanggal_kontrol, 'd')='7' THEN 'Sabtu'
                WHEN to_char(kr.tanggal_kontrol, 'd')='1' THEN 'Minggu'
            END as hari, pg.nama as nama_dokter")
                ->from('sm_resume_medis_kontrol_ranap as kr')
                ->join('sm_tenaga_medis as tm', 'tm.id = kr.id_ek_nama_dokter')
                ->join('sm_pegawai as pg', 'pg.id = tm.id_pegawai')
                ->where('kr.id_layanan_pendaftaran', $id_layanan, true)
                ->get()
                ->result();

            $resume_keperawatan = $this->db->select('rk.diet_khusus')
                ->from('sm_resume_keperawatan as rk')
                ->where('rk.id_layanan_pendaftaran', $id_layanan, true)
                ->get()
                ->row();

            if ($resume_keperawatan != NULL) {
                $encodeDietKhusus = json_decode($resume_keperawatan->diet_khusus);

                $data['diet'] = $encodeDietKhusus->diet_khusus;
            }

            if ($data['pasien']->alergi != NULL) {
                $data['pasien']->alergi == 0 ? $data['pasien']->alergi == 'Tidak Ada' : 'Ada';
            }

            // $diagnosa_utamas = $this->db->select(" concat_ws ('. ', ( SELECT gss.kode_icdx_rinci FROM sm_golongan_sebab_sakit AS gss WHERE gss.ID = d.id_pengkodean ), ( SELECT gss.kode_icdx_rinci FROM sm_golongan_sebab_sakit AS gss WHERE gss.ID = d.id_pengkodean_asterik ), gss.nama, d.golongan_sebab_sakit_lain ) AS nama ")
            //     ->from('sm_diagnosa as d')
            //     ->join('sm_layanan_pendaftaran as lp', 'd.id_layanan_pendaftaran = lp.id')
            //     ->join('sm_golongan_sebab_sakit as gss', 'gss.id = d.id_golongan_sebab_sakit', 'left')
            //     ->where('lp.id_pendaftaran', $id_pendaftaran, true)
            //     ->where('prioritas', 'Utama')
            //     ->order_by('lp.id', 'asc')
            //     ->get()
            //     ->result();

            // $uniqueDiagnosaUtamas = array();
            // $data['diagnosa_utama'] = '';

            // if (!empty($diagnosa_utamas)) {
            //     if (!in_array($diagnosa_utamas[0]->nama, $uniqueDiagnosaUtamas)) {
            //         $uniqueDiagnosaUtamas[] = $diagnosa_utamas[0]->nama;
            //         $data['diagnosa_utama'] .= $diagnosa_utamas[0]->nama . '<br>';
            //     }
            // }

            // $diagnosa_sekunders = $this->db->select(" concat_ws ('. ', ( SELECT gss.kode_icdx_rinci FROM sm_golongan_sebab_sakit AS gss WHERE gss.ID = d.id_pengkodean ), ( SELECT gss.kode_icdx_rinci FROM sm_golongan_sebab_sakit AS gss WHERE gss.ID = d.id_pengkodean_asterik ), gss.nama, d.golongan_sebab_sakit_lain ) AS nama ")
            //     ->from('sm_diagnosa as d')
            //     ->join('sm_layanan_pendaftaran as lp', 'd.id_layanan_pendaftaran = lp.id')
            //     ->join('sm_golongan_sebab_sakit as gss', 'gss.id = d.id_golongan_sebab_sakit', 'left')
            //     ->where('lp.id_pendaftaran', $id_pendaftaran, true)
            //     ->where('prioritas', 'Sekunder')
            //     ->order_by('lp.id', 'asc')
            //     ->get()
            //     ->result();

            // $diagnosa_utamas = array_map('json_decode', array_unique(array_map('json_encode', $diagnosa_utamas)));
            // $marge_diagnosas = array_merge($diagnosa_utamas, $diagnosa_sekunders);

            // $uniqueDiagnosaSekunder = array();
            // $data['diagnosa_sekunder'] = '';

            // foreach ($marge_diagnosas as $key => $diagnosa_sekunder) {
            //     if ($key > 0 && !in_array($diagnosa_sekunder->nama, $uniqueDiagnosaSekunder)) {
            //         $uniqueDiagnosaSekunder[] = $diagnosa_sekunder->nama;
            //         $data['diagnosa_sekunder'] .= $diagnosa_sekunder->nama . '<br>';
            //     }
            // }










            // INI YANG ASLI
            // $diagnosa_utamas = $this->db->select(" concat_ws ('. ', ( SELECT gss.kode_icdx_rinci FROM sm_golongan_sebab_sakit AS gss WHERE gss.ID = d.id_pengkodean ), ( SELECT gss.kode_icdx_rinci FROM sm_golongan_sebab_sakit AS gss WHERE gss.ID = d.id_pengkodean_asterik ), gss.nama ) AS nama ")
            //     ->from('sm_diagnosa as d')
            //     ->join('sm_layanan_pendaftaran as lp', 'd.id_layanan_pendaftaran = lp.id')
            //     ->join('sm_golongan_sebab_sakit as gss', 'gss.id = d.id_golongan_sebab_sakit')
            //     ->where('lp.id_pendaftaran', $id_pendaftaran, true)
            //     ->where('prioritas', 'Utama')
            //     ->get()
            //     ->result();
            // foreach ($diagnosa_utamas as $diagnosa_utama) {
            //     $data['diagnosa_utama'] .= $diagnosa_utama->nama . '. ' . '<br>';
            // }

            
            // $diagnosa_manual_utamas = $this->db->select(" concat_ws ('. ', ( SELECT gss.kode_icdx_rinci FROM sm_golongan_sebab_sakit AS gss WHERE gss.ID = d.id_pengkodean ), ( SELECT gss.kode_icdx_rinci FROM sm_golongan_sebab_sakit AS gss WHERE gss.ID = d.id_pengkodean_asterik ), d.golongan_sebab_sakit_lain ) AS nama ")
            //     ->from('sm_diagnosa as d')
            //     ->join('sm_layanan_pendaftaran as lp', 'd.id_layanan_pendaftaran = lp.id')
            //     ->where('lp.id_pendaftaran', $id_pendaftaran, true)
            //     ->where('prioritas', 'Utama')
            //     ->where('d.diagnosa_manual', '1')
            //     ->get()
            //     ->result();

            // foreach ($diagnosa_manual_utamas as $diagnosa_manual_utama) {
            //     $data['diagnosa_manual_utama'] .= $diagnosa_manual_utama->nama . '. ' . '<br>';
            // }


            // $diagnosa_sekunders = $this->db->select("distinct concat_ws ('. ', ( SELECT gss.kode_icdx_rinci FROM sm_golongan_sebab_sakit AS gss WHERE gss.ID = d.id_pengkodean ), ( SELECT gss.kode_icdx_rinci FROM sm_golongan_sebab_sakit AS gss WHERE gss.ID = d.id_pengkodean_asterik ), gss.nama ) AS nama ")
            //     ->from('sm_diagnosa as d')
            //     ->join('sm_layanan_pendaftaran as lp', 'd.id_layanan_pendaftaran = lp.id')
            //     ->join('sm_golongan_sebab_sakit as gss', 'gss.id = d.id_golongan_sebab_sakit')
            //     ->where('lp.id_pendaftaran', $id_pendaftaran, true)
            //     ->where('prioritas', 'Sekunder')
            //     ->get()
            //     ->result();

            // foreach ($diagnosa_sekunders as $diagnosa_sekunder) {
            //     $data['diagnosa_sekunder'] .= $diagnosa_sekunder->nama . '. ' . '<br>';
            // }

            // $diagnosa_manual_sekunders = $this->db->select("distinct concat_ws ('. ', ( SELECT gss.kode_icdx_rinci FROM sm_golongan_sebab_sakit AS gss WHERE gss.ID = d.id_pengkodean ), ( SELECT gss.kode_icdx_rinci FROM sm_golongan_sebab_sakit AS gss WHERE gss.ID = d.id_pengkodean_asterik ), d.golongan_sebab_sakit_lain ) AS nama ")
            //     ->from('sm_diagnosa as d')
            //     ->join('sm_layanan_pendaftaran as lp', 'd.id_layanan_pendaftaran = lp.id')
            //     ->where('lp.id_pendaftaran', $id_pendaftaran, true)
            //     ->where('prioritas', 'Sekunder')
            //     ->where('d.diagnosa_manual', '1')
            //     ->get()
            //     ->result();

            // foreach ($diagnosa_manual_sekunders as $diagnosa_manual_sekunder) {
            //     $data['diagnosa_manual_sekunder'] .= $diagnosa_manual_sekunder->nama . '. ' . '<br>';
            // }
            //End edited 2023-12-22






            // TAMBAHAN
            $diagnosa_utamas = $this->db->select("concat_ws(
                    '. ',
                    (SELECT gss.kode_icdx_rinci FROM sm_golongan_sebab_sakit AS gss WHERE gss.ID = d.id_pengkodean),
                    (SELECT gss.kode_icdx_rinci FROM sm_golongan_sebab_sakit AS gss WHERE gss.ID = d.id_pengkodean_asterik),
                    gss.nama
                ) AS nama")
                ->from('sm_diagnosa as d')
                ->join('sm_layanan_pendaftaran as lp', 'd.id_layanan_pendaftaran = lp.id')
                ->join('sm_golongan_sebab_sakit as gss', 'gss.id = d.id_golongan_sebab_sakit')
                ->where('lp.id_pendaftaran', $id_pendaftaran)
                ->where('prioritas', 'Utama')
                ->get()
                ->result();

            $data['diagnosa_utama'] = '';
            $seen = [];

            foreach ($diagnosa_utamas as $diagnosa_utama) {
                if (!in_array($diagnosa_utama->nama, $seen)) {
                    $data['diagnosa_utama'] .= $diagnosa_utama->nama . '.<br>';
                    $seen[] = $diagnosa_utama->nama;
                }
            }

            // TAMBAHAN
            $diagnosa_manual_utamas = $this->db->select("concat_ws(
                '. ',
                (SELECT gss1.kode_icdx_rinci FROM sm_golongan_sebab_sakit AS gss1 WHERE gss1.ID = d.id_pengkodean),
                (SELECT gss2.kode_icdx_rinci FROM sm_golongan_sebab_sakit AS gss2 WHERE gss2.ID = d.id_pengkodean_asterik),
                d.golongan_sebab_sakit_lain
            ) AS nama")
            ->from('sm_diagnosa as d')
            ->join('sm_layanan_pendaftaran as lp', 'd.id_layanan_pendaftaran = lp.id')
            ->where('lp.id_pendaftaran', $id_pendaftaran)
            ->where('prioritas', 'Utama')
            ->where('d.diagnosa_manual', '1')
            ->get()
            ->result();

            $data['diagnosa_manual_utama'] = '';
            $seen_manual = [];

            foreach ($diagnosa_manual_utamas as $diagnosa_manual_utama) {
                if (
                    !empty($diagnosa_manual_utama->nama) &&                      // pastikan tidak kosong/null
                    !in_array($diagnosa_manual_utama->nama, $seen_manual)       // hindari duplikat
                ) {
                    $data['diagnosa_manual_utama'] .= $diagnosa_manual_utama->nama . '.<br> ';
                    $seen_manual[] = $diagnosa_manual_utama->nama;
                }
            }

            // TAMBAHAN
            $diagnosa_sekunders = $this->db->select("concat_ws(
                '. ',
                (SELECT gss1.kode_icdx_rinci FROM sm_golongan_sebab_sakit AS gss1 WHERE gss1.ID = d.id_pengkodean),
                (SELECT gss2.kode_icdx_rinci FROM sm_golongan_sebab_sakit AS gss2 WHERE gss2.ID = d.id_pengkodean_asterik),
                gss.nama
            ) AS nama")
            ->from('sm_diagnosa as d')
            ->join('sm_layanan_pendaftaran as lp', 'd.id_layanan_pendaftaran = lp.id')
            ->join('sm_golongan_sebab_sakit as gss', 'gss.id = d.id_golongan_sebab_sakit')
            ->where('lp.id_pendaftaran', $id_pendaftaran)
            ->where('prioritas', 'Sekunder')
            ->get()
            ->result();

            $data['diagnosa_sekunder'] = '';
            $seen_sekunder = [];

            foreach ($diagnosa_sekunders as $diagnosa_sekunder) {
                if (
                    !empty($diagnosa_sekunder->nama) &&
                    !in_array($diagnosa_sekunder->nama, $seen_sekunder)
                ) {
                    $data['diagnosa_sekunder'] .= $diagnosa_sekunder->nama . '.<br> ';
                    $seen_sekunder[] = $diagnosa_sekunder->nama;
                }
            }

            // TAMBAHAN
            $diagnosa_manual_sekunders = $this->db->select("concat_ws(
                '. ',
                (SELECT gss1.kode_icdx_rinci FROM sm_golongan_sebab_sakit AS gss1 WHERE gss1.ID = d.id_pengkodean),
                (SELECT gss2.kode_icdx_rinci FROM sm_golongan_sebab_sakit AS gss2 WHERE gss2.ID = d.id_pengkodean_asterik),
                d.golongan_sebab_sakit_lain
            ) AS nama")
            ->from('sm_diagnosa as d')
            ->join('sm_layanan_pendaftaran as lp', 'd.id_layanan_pendaftaran = lp.id')
            ->where('lp.id_pendaftaran', $id_pendaftaran)
            ->where('prioritas', 'Sekunder')
            ->where('d.diagnosa_manual', '1')
            ->get()
            ->result();

            $data['diagnosa_manual_sekunder'] = '';
            $seen_manual_sekunder = [];

            foreach ($diagnosa_manual_sekunders as $diagnosa_manual_sekunder) {
                if (
                    !empty($diagnosa_manual_sekunder->nama) &&
                    !in_array($diagnosa_manual_sekunder->nama, $seen_manual_sekunder)
                ) {
                    $data['diagnosa_manual_sekunder'] .= $diagnosa_manual_sekunder->nama . '.<br> ';
                    $seen_manual_sekunder[] = $diagnosa_manual_sekunder->nama;
                }
            }








            

          





            $pengobatans = $this->db->select("concat ( br.nama, ' (', rs.aturan_pakai, ')', CASE WHEN rs.keterangan_resep IS NULL THEN '' ELSE concat(' Keterangan Resep: ', rs.keterangan_resep) END ) AS nama")
                ->from('sm_resep_r_detail as rsd')
                ->join('sm_resep_r as rs', 'rs.id = rsd.id_resep_r', 'left')
                ->join('sm_resep as rp', 'rp.id = rs.id_resep', 'left')
                ->join('sm_layanan_pendaftaran as lp', 'rp.id_layanan_pendaftaran = lp.id')
                ->join('sm_barang as br', 'br.id = rsd.id_barang')
                ->where('lp.id_pendaftaran', $id_pendaftaran, true)
                ->where('br.id_kategori', '1')
                ->get()
                ->result();

            foreach ($pengobatans as $pengobatan) {
                $data['pengobatan'] .= $pengobatan->nama . '. ';
            }

            // $tindakans = $this->db->select(" concat( case when ttp.id_pengkodean is null then '' else '[' end, ( SELECT tp.code FROM sm_icd_ix AS tp WHERE tp.ID = ttp.id_pengkodean ), case when ttp.id_pengkodean is null then '' else '] ' end, pl.nama) as nama ")
            //     ->from('sm_tarif_tindakan_pasien as ttp')
            //     ->join('sm_layanan_pendaftaran as lp', 'ttp.id_layanan_pendaftaran = lp.id')
            //     ->join('sm_tarif_pelayanan as tpl', 'tpl.id = ttp.id_tarif_pelayanan')
            //     ->join('sm_layanan as pl', 'pl.id = tpl.id_layanan')
            //     ->where('lp.id_pendaftaran', $id_pendaftaran, true)
            //     ->get()
            //     ->result();

            // $uniqueTindakans = array();
            // $data['tindakan'] = '';

            // foreach ($tindakans as $tindakan) {
            //     if (!in_array($tindakan->nama, $uniqueTindakans)) {
            //         $uniqueTindakans[] = $tindakan->nama;
            //         $data['tindakan'] .= $tindakan->nama . '. ' . '<br>';
            //     }
            // }

















            // INIYANG ASLIIIII
            // $tindakans = $this->db->select(" concat( case when ttp.id_pengkodean is null then '' else '[' end, ( SELECT tp.code FROM sm_icd_ix AS tp WHERE tp.ID = ttp.id_pengkodean ), case when ttp.id_pengkodean is null then '' else '] ' end, pl.nama) as nama")
            //     ->from('sm_tarif_tindakan_pasien as ttp')
            //     ->join('sm_layanan_pendaftaran as lp', 'ttp.id_layanan_pendaftaran = lp.id')
            //     ->join('sm_tarif_pelayanan as tpl', 'tpl.id = ttp.id_tarif_pelayanan')
            //     ->join('sm_layanan as pl', 'pl.id = tpl.id_layanan')
            //     ->where('lp.id_pendaftaran', $id_pendaftaran, true)
            //     ->get()
            //     ->result();

            //     // var_dump($tindakans);die;
            // foreach ($tindakans as $tindakan) {
            //     $data['tindakan'] .= $tindakan->nama . '. ' . '<br>';
            // }


            // TAMBAHAN
            $tindakans = $this->db->select("concat(
                    case when ttp.id_pengkodean is null then '' else '[' end,
                    (SELECT tp.code FROM sm_icd_ix AS tp WHERE tp.ID = ttp.id_pengkodean),
                    case when ttp.id_pengkodean is null then '' else '] ' end,
                    pl.nama
                ) as nama, pl.id")
                ->from('sm_tarif_tindakan_pasien as ttp')
                ->join('sm_layanan_pendaftaran as lp', 'ttp.id_layanan_pendaftaran = lp.id')
                ->join('sm_tarif_pelayanan as tpl', 'tpl.id = ttp.id_tarif_pelayanan')
                ->join('sm_layanan as pl', 'pl.id = tpl.id_layanan')
                ->where('lp.id_pendaftaran', $id_pendaftaran)
                ->get()
                ->result();

                // var_dump($tindakans);die;

            $data['tindakan'] = '';
            $seen = [];

            foreach ($tindakans as $tindakan) {
                if (!in_array($tindakan->nama, $seen)) {
                    $data['tindakan'] .= $tindakan->nama . '.<br>';
                    $seen[] = $tindakan->nama;
                }
            }






            // $tindakans_ok = $this->db->select(" concat( case when too.id_pengkodean is null then '' else '[' end, ( SELECT tp.code FROM sm_icd_ix AS tp WHERE tp.ID = too.id_pengkodean ), case when too.id_pengkodean is null then '' else '] ' end, pl.nama) as nama ")
            //     ->from('sm_tarif_operasi as too')
            //     ->join('sm_jadwal_kamar_operasi as jko', 'jko.id = too.id_operasi')
            //     ->join('sm_layanan_pendaftaran as lp', 'jko.id_layanan_pendaftaran = lp.id')
            //     ->join('sm_tarif_pelayanan as tpl', 'tpl.id = too.id_tarif')
            //     ->join('sm_layanan as pl', 'pl.id = tpl.id_layanan')
            //     ->where('lp.id_pendaftaran', $id_pendaftaran, true)
            //     ->get()
            //     ->result();

            // $uniqueTindakans_ok = array();
            // $data['tindakan_ok'] = '';

            // foreach ($tindakans_ok as $tindakan_ok) {
            //     if (!in_array($tindakan_ok->nama, $uniqueTindakans_ok)) {
            //         $uniqueTindakans_ok[] = $tindakan_ok->nama;
            //         $data['tindakan_ok'] .= '<u>' . $tindakan_ok->nama . '</u>' . '*. ' . '<br>';
            //     }
            // }

            $tindakans_ok = $this->db->select(" concat( case when too.id_pengkodean is null then '' else '[' end, ( SELECT tp.code FROM sm_icd_ix AS tp WHERE tp.ID = too.id_pengkodean ), case when too.id_pengkodean is null then '' else '] ' end, pl.nama) as nama ")
                ->from('sm_tarif_operasi as too')
                ->join('sm_jadwal_kamar_operasi as jko', 'jko.id = too.id_operasi')
                ->join('sm_layanan_pendaftaran as lp', 'jko.id_layanan_pendaftaran = lp.id')
                ->join('sm_tarif_pelayanan as tpl', 'tpl.id = too.id_tarif')
                ->join('sm_layanan as pl', 'pl.id = tpl.id_layanan')
                ->where('lp.id_pendaftaran', $id_pendaftaran, true)
                ->get()
                ->result();
            foreach ($tindakans_ok as $tindakan_ok) {
                $data['tindakan_ok'] .= '<u>' . $tindakan_ok->nama . '</u>' . '*. ' . '<br>';
            }

            $tindakans_lab = $this->db->select(" concat( case when dlab.id_pengkodean is null then '' else '[' end, ( SELECT tp.code FROM sm_icd_ix AS tp WHERE tp.ID = dlab.id_pengkodean ), case when dlab.id_pengkodean is null then '' else '] ' end, pl.nama) as nama ")
                ->from('sm_detail_laboratorium as dlab')
                ->join('sm_laboratorium as lab', 'lab.id = dlab.id_laboratorium')
                ->join('sm_layanan_pendaftaran as lp', 'lab.id_layanan_pendaftaran = lp.id')
                ->join('sm_order_laboratorium as olab', 'olab.id = lab.id_order_laboratorium')
                ->join('sm_tarif_pelayanan as tpl', 'tpl.id = dlab.id_tarif')
                ->join('sm_layanan as pl', 'pl.id = tpl.id_layanan')
                ->where('lp.id_pendaftaran = ', $id_pendaftaran, true)
                ->get()
                ->result();
            foreach ($tindakans_lab as $tindakan_lab) {
                $data['tindakan_lab'] .= '<u>' . $tindakan_lab->nama . '</u>' . '*. ' . '<br>';
            }

            $tindakans_rad = $this->db->select(" concat( case when drad.id_pengkodean is null then '' else '[' end, ( SELECT tp.code FROM sm_icd_ix AS tp WHERE tp.ID = drad.id_pengkodean ), case when drad.id_pengkodean is null then '' else '] ' end, pl.nama) as nama ")
                ->from('sm_detail_radiologi as drad')
                ->join('sm_radiologi as rad', 'rad.id = drad.id_radiologi')
                ->join('sm_layanan_pendaftaran as lp', 'rad.id_layanan_pendaftaran = lp.id')
                ->join('sm_order_radiologi as orad', 'orad.id = rad.id_order_radiologi')
                ->join('sm_tarif_pelayanan as tpl', 'tpl.id = drad.id_tarif')
                ->join('sm_layanan as pl', 'pl.id = tpl.id_layanan')
                ->where('lp.id_pendaftaran', $id_pendaftaran, true)
                ->get()
                ->result();
            foreach ($tindakans_rad as $tindakan_rad) {
                $data['tindakan_rad'] .= '<u>' . $tindakan_rad->nama . '</u>' . '*. ' . '<br>';
            }

            $resume_keperawatan = $this->db->select('rk.diet_khusus')
                ->from('sm_resume_keperawatan as rk')
                ->where('rk.id_layanan_pendaftaran', $id_layanan, true)
                ->get()
                ->row();

            if ($resume_keperawatan != NULL) {
                $encodeDietKhusus = json_decode($resume_keperawatan->diet_khusus);

                $data['diet'] = $encodeDietKhusus->diet_khusus;
            }

        endif;

        return $data;
    }



}
