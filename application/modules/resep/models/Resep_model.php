<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Resep_model extends CI_Model
{


	function __construct()
	{
		parent::__construct();
		$this->date     = date('Y-m-d');
		$this->datetime = date('Y-m-d H: i: s');
		$this->unit     = $this->session->userdata('id_unit');
		$this->user     = $this->session->userdata('id_translucent');
	}

	function getListDataResep($id_resep, $pengambilan_ke)
	{
		$this->db->select('r.*, rt.id, lp.id_penjamin, pjm.nama as penjamin, lp.cara_bayar, 
                            date(r.waktu) as tanggal, pj.id as id_jual_resep, pg.nama as dokter, 
                            p.tanggal_lahir, p.nama as pasien, lp.jenis_layanan, p.alamat as alamat_pasien, 
                            p.id as no_rm, u.nama as depo, pj.waktu');
		$this->db->from('sm_resep as r');
		$this->db->join('sm_resep_tebus as rt', 'rt.id_resep = r.id');
		$this->db->join('sm_pasien as p', 'p.id = r.id_pasien');
		$this->db->join('sm_layanan_pendaftaran as lp', 'lp.id = r.id_layanan_pendaftaran');
		$this->db->join('sm_tenaga_medis as d', 'd.id = lp.id_dokter', 'left');
		$this->db->join('sm_pegawai as pg', 'pg.id = d.id_pegawai', 'left');
		$this->db->join('sm_penjamin as pjm', 'pjm.id = lp.id_penjamin', 'left');
		$this->db->join('sm_penjualan as pj', 'pj.id_resep = r.id', 'left');
		$this->db->join('sm_unit as u', 'u.id = rt.id_unit', 'left');
		$this->db->where('rt.id_resep', $id_resep, true);
		$this->db->where('rt.pengambilan_ke', $pengambilan_ke, true);
		$this->db->order_by('r.waktu', 'desc');

		$query = $this->db->get();

		return $query;
	}

	function getListDataResepBukti($id_resep, $pengambilan_ke)
	{
		$this->db->select("concat_ws(' ',b.nama, b.kekuatan, st.nama, sd.nama) as nama_barang, dp.qty as jumlah_pakai, dp.harga_jual, p.total");
		$this->db->from('sm_penjualan as p');
		$this->db->join('sm_resep_tebus as rt', 'rt.id = p.id_resep_tebus');
		$this->db->join('sm_detail_penjualan as dp', 'dp.id_penjualan = p.id');
		$this->db->join('sm_kemasan_barang as km', 'km.id = dp.id_kemasan');
		$this->db->join('sm_barang as b', 'b.id = km.id_barang');
		$this->db->join('sm_satuan as st', 'st.id = b.satuan_kekuatan', 'left');
		$this->db->join('sm_sediaan as sd', 'sd.id = b.id_sediaan', 'left');
		$this->db->where('rt.id_resep', $id_resep, true);
		$this->db->where('rt.pengambilan_ke', $pengambilan_ke, true);

		$query = $this->db->get();

		return $query;
	}

	function getListDataResepTebusR($id_resep_tebus, $id_r)
	{
		$this->db->select("rr.id, rr.r_no, rr.ket_aturan_pakai, rr.aturan_pakai, rb.waktu, lp.id_penjamin, 
                        pjm.nama as penjamin, lp.cara_bayar, date(r.waktu) as tanggal, 
                        pj.id as id_jual_resep, pg.nama as dokter, p.tanggal_lahir, p.nama as pasien, 
                        lp.jenis_layanan, p.alamat as alamat_pasien, p.id as no_rm, rb.id_resep,rr.keterangan_resep,
                        case when rr.aturan_pakai_manual = '0' then rr.aturan_pakai else rr.ket_aturan_pakai_manual end as aturan_pakai");
		$this->db->from('sm_resep_tebus_r as rr');
		$this->db->join('sm_resep_tebus as rb', 'rb.id = rr.id_resep_tebus');
		$this->db->join('sm_resep as r', 'r.id = rb.id_resep');
		$this->db->join('sm_tenaga_medis as tm', 'tm.id = r.id_dokter');
		$this->db->join('sm_pegawai as pg', 'pg.id = tm.id_pegawai', 'left');
		$this->db->join('sm_pasien as p', 'p.id = r.id_pasien');
		$this->db->join('sm_layanan_pendaftaran as lp', 'lp.id = r.id_layanan_pendaftaran');
		$this->db->join('sm_penjamin as pjm', 'pjm.id = lp.id_penjamin', 'left');
		$this->db->join('sm_penjualan as pj', 'pj.id_resep = r.id', 'left');
		$this->db->where('rb.id', $id_resep_tebus, true);

		if ($id_r !== null) :
			$this->db->where('rr.id', $id_r, true);
		endif;

		$result = $this->db->get()->result();
		foreach ($result as $i => $data) :

			$this->db->select('count(*) jml');
			$this->db->from('sm_resep_tebus_r_detail as rtrd');
			$this->db->join('sm_barang as b', 'b.id = rtrd.id_barang');
			$this->db->join('sm_satuan as s', 's.id = b.satuan_kekuatan', 'left');
			$this->db->where('rtrd.id_resep_tebus_r', $data->id);
			$result[$i]->jml_racik = $this->db->get()->result();

			foreach ($result[$i]->jml_racik as $j => $racik) :
				$data->racik = $racik->jml;

				if ($data->racik === '1') :
					$data->racik .= $j;
					$this->db->select('b.nama, b.kekuatan, s.nama as satuan_kekuatan, rtrd.jumlah_pakai');
					$this->db->from('sm_resep_tebus_r_detail as rtrd');
					$this->db->join('sm_barang as b', 'b.id = rtrd.id_barang');
					$this->db->join('sm_satuan as s', 's.id = b.satuan_kekuatan', 'left');
					$this->db->where('rtrd.id_resep_tebus_r', $data->id);
				else :
					$this->db->select(" 'Obat Racik' nama, '' kekuatan, '' satuan_kekuatan, '' jumlah_pakai");
				endif;
			endforeach;

			$data->detail_barang = $this->db->get()->result();
			$get                       = $this->db->select('timing, admin_time')->from('sm_resep_r')->where(array('id_resep' => $data->id_resep, 'r_no' => $data->r_no))->get()->row();
			$timing = $this->db->get_where('sm_waktu_pemberian_obat', ['kode' => $get->timing])->row();
			$data->timing        = $timing ? $timing->timing : $get->timing . ' Makan';
			$admin_time = $this->db->where_in('kode', explode(', ', $get->admin_time))->get('sm_waktu_pemberian_obat')->result();
			$admin_time = implode(', ', array_map(function ($v) {
				return $v->timing;
			}, $admin_time));
			$data->admin_time    = !empty($admin_time) ? $admin_time : $get->admin_time;
		endforeach;

		return $result;
	}

	function getListDataCopyResep($id, $pengambilan_ke = null)
	{
		$check = $this->db->select("count(*) as jumlah")->from('sm_resep_tebus')->where('id_resep', $id)->get()->row();
		if ($check->jumlah === '0') :
			$this->db->select("
                r.*, lp.id_penjamin, pjn.nama as penjamin, lp.cara_bayar, date(r.waktu) as tanggal, 
                pj.id as id_jual_resep, pg.nama as dokter, p.tanggal_lahir, p.nama as pasien, 
                p.telp as telp_pasien, lp.no_polish, p.alergi, pp.berat_badan, pp.tinggi_badan,
                lp.jenis_layanan, p.alamat as alamat_pasien, p.id as no_rm, pjn.nama as penjamin, sp.nama as spesialisasi,
				(select no_sep from sm_pendaftaran where id = lp.id_pendaftaran) as no_sep
            ");
			$this->db->from('sm_resep as r');
			$this->db->join('sm_layanan_pendaftaran as lp', 'lp.id = r.id_layanan_pendaftaran');
			$this->db->join('sm_spesialisasi as sp', 'sp.id = lp.id_unit_layanan', 'left');
			$this->db->join('sm_tenaga_medis as tm', 'tm.id = lp.id_dokter', 'left');
			$this->db->join('sm_pegawai as pg', 'pg.id = tm.id_pegawai', 'left');
			$this->db->join('sm_pasien as p', 'p.id = r.id_pasien');
			$this->db->join('sm_profil_pasien as pp', 'pp.id_pasien = p.id', 'left');
			$this->db->join('sm_penjamin as pjn', 'pjn.id = lp.id_penjamin', 'left');
			$this->db->join('sm_penjualan as pj', 'pj.id_resep = r.id', 'left');
			$this->db->where('r.id', $id, true);
			$this->db->order_by('r.waktu', 'desc');
		else :
			$this->db->select("
                r.*, rt.id, lp.id_penjamin, pjn.nama as penjamin, lp.cara_bayar, date(r.waktu) as tanggal, 
                pj.id as id_jual_resep, pg.nama as dokter, p.tanggal_lahir, p.nama as pasien, 
                p.telp as telp_pasien, lp.no_polish, p.alergi, pp.berat_badan, pp.tinggi_badan,
                lp.jenis_layanan, p.alamat as alamat_pasien, p.id as no_rm, pjn.nama as penjamin, sp.nama as spesialisasi,
				(select no_sep from sm_pendaftaran where id = lp.id_pendaftaran) as no_sep
            ");
			$this->db->from('sm_resep as r');
			$this->db->join('sm_resep_tebus as rt', 'rt.id_resep = r.id', 'left');
			$this->db->join('sm_layanan_pendaftaran as lp', 'lp.id = r.id_layanan_pendaftaran');
			$this->db->join('sm_spesialisasi as sp', 'sp.id = lp.id_unit_layanan', 'left');
			$this->db->join('sm_tenaga_medis as tm', 'tm.id = lp.id_dokter', 'left');
			$this->db->join('sm_pegawai as pg', 'pg.id = tm.id_pegawai', 'left');
			$this->db->join('sm_pasien as p', 'p.id = r.id_pasien');
			$this->db->join('sm_profil_pasien as pp', 'pp.id_pasien = p.id', 'left');
			$this->db->join('sm_penjamin as pjn', 'pjn.id = lp.id_penjamin', 'left');
			$this->db->join('sm_penjualan as pj', 'pj.id_resep = r.id', 'left');
			$this->db->where('rt.id_resep', $id, true);
			$this->db->where('rt.pengambilan_ke', $pengambilan_ke, true);
			$this->db->order_by('r.waktu', 'desc');
		endif;

		return $this->db->get();
	}

	function getListDataCopyResepLog($id)
	{
		$resep = $this->db->select(" rl.*,
            (rl.resep->>'id')::int as id, (rl.resep_tebus->>'id')::int as id_resep_tebus, lp.id_penjamin, pjn.nama as penjamin, lp.cara_bayar, date(rl.resep->>'waktu') as tanggal, 
            pj.id as id_jual_resep, pg.nama as dokter, p.tanggal_lahir, p.nama as pasien,  date(rl.resep->>'waktu') as waktu,
            p.telp as telp_pasien, lp.no_polish, p.alergi, pp.berat_badan, pp.tinggi_badan,
            lp.jenis_layanan, p.alamat as alamat_pasien, p.id as no_rm, pjn.nama as penjamin, sp.nama as spesialisasi
        ")
			->from('sm_resep_logs as rl')
			->join('sm_layanan_pendaftaran as lp', "lp.id = (rl.resep->>'id_layanan_pendaftaran')::int")
			->join('sm_spesialisasi as sp', 'sp.id = lp.id_unit_layanan', 'left')
			->join('sm_tenaga_medis as tm', 'tm.id = lp.id_dokter', 'left')
			->join('sm_pegawai as pg', 'pg.id = tm.id_pegawai', 'left')
			->join('sm_pasien as p', "p.id = rl.resep->>'id_pasien'")
			->join('sm_profil_pasien as pp', 'pp.id_pasien = p.id', 'left')
			->join('sm_penjamin as pjn', 'pjn.id = lp.id_penjamin', 'left')
			->join('sm_penjualan as pj', "pj.id_resep = (rl.resep->>'id')::int", 'left')
			->where('rl.id', $id)
			->get()->row();

		$resep->resep   = json_decode($resep->resep);
		$resep->resep_r = json_decode($resep->resep_r);
		foreach ($resep->resep_r as $resep_r) {
			$resep_r->keterangan_resep    = $resep_r->keterangan_resep ?? '';
			$resep_r->aturan_pakai_manual = $resep_r->aturan_pakai_manual == 0 ? $resep_r->aturan_pakai : $resep_r->aturan_pakai_manual;
			foreach (json_decode($resep->resep_r_detail) as $resep_r_detail) {
				foreach ($resep_r_detail as $detail) {
					if ($detail->id_resep_r == $resep_r->id) {
						$barang = $this->db->select("sd.nama as sediaan, b.kekuatan, b.nama_lengkap as nama_barang")
							->from('sm_barang as b')
							->join('sm_satuan as s', 's.id = b.satuan_kekuatan', 'left')
							->join('sm_sediaan as sd', 'sd.id = b.id_sediaan', 'left')
							->join('sm_pabrik as pb', 'pb.id = b.id_pabrik', 'left')
							->where_in('b.id', $detail->id_barang)
							->get()->row();

						$resep_r->resep_r_detail[] = array_merge((array) $detail, (array) $barang);
					}
				}
			}
		}
		unset($resep->resep_r_detail);

		$resep->resep_tebus   = json_decode($resep->resep_tebus);
		$resep->resep_tebus_r = json_decode($resep->resep_tebus_r);
		foreach ($resep->resep_tebus_r as $resep_tebus_r) {
			$resep_tebus_r->keterangan_resep    = $resep_tebus_r->keterangan_resep ?? '';
			$resep_tebus_r->aturan_pakai_manual = $resep_tebus_r->aturan_pakai_manual == 0 ? $resep_tebus_r->aturan_pakai : $resep_tebus_r->aturan_pakai_manual;
			foreach (json_decode($resep->resep_tebus_r_detail) as $resep_tebus_r_detail) {
				foreach ($resep_tebus_r_detail as $detail) {
					if ($detail->id_resep_tebus_r == $resep_tebus_r->id) {
						$barang = $this->db->select("sd.nama as sediaan, b.kekuatan, CONCAT_WS(' ', b.nama, b.kekuatan, st.nama, sd.nama) as nama_barang")
							->from('sm_barang as b')
							->join('sm_satuan as st', 'st.id = b.satuan_kekuatan', 'left')
							->join('sm_sediaan as sd', 'sd.id = b.id_sediaan', 'left')
							->join('sm_pabrik as pb', 'pb.id = b.id_pabrik', 'left')
							->where_in('b.id', $detail->id_barang)
							->get()->row();

						$resep_tebus_r->resep_tebus_r_detail[] = array_merge((array) $detail, (array) $barang);
					}
				}
			}
		}
		unset($resep->resep_tebus_r_detail);
		unset($resep->penjualan);

		return $resep;
	}

	function getListDataResepR($id_resep, $no_r = null, $pengambilan_ke = null)
	{
		$check = $this->db->select("count(*) as jumlah")->from('sm_resep_tebus')->where('id_resep', $id_resep)->get()->row();
		if ($check->jumlah === '0') :
			$this->db->select("
                r.id as id_resep, rr.id as id_resep_r,
                rr.cara_pembuatan, rr.cara_pemberian, rr.ket_aturan_pakai, 
                rr.resep_r_jumlah, rr.tebus_r_jumlah, rr.r_no, rr.timing, rr.admin_time,
                case when rr.aturan_pakai_manual = 0 then rr.aturan_pakai else rr.ket_aturan_pakai_manual end as aturan_pakai
            ", false);
			$this->db->from('sm_resep as r');
			$this->db->join('sm_resep_r as rr', 'rr.id_resep = r.id');

			$this->db->join('sm_resep_r_detail as rrd', 'rrd.id_resep_r = rr.id', 'left'); //hanya obat
			$this->db->join('sm_barang as b', 'b.id = rrd.id_barang', 'left'); //hanya obat
			$this->db->where('b.id_kategori', '1', true); //hanya obat

			$this->db->where('r.id', $id_resep, true);
			if ($no_r !== null) :
				$this->db->where('rr.r_no', $no_r, true);
			endif;
		else :
			$this->db->select("
                r.id_resep, rr.id as id_resep_r,
                rr.cara_pembuatan, rr.cara_pemberian, rr.ket_aturan_pakai,
                rr.resep_r_jumlah, rr.tebus_r_jumlah, rr.r_no, rr.timing, rr.admin_time,
                case when rr.aturan_pakai != '' then rr.aturan_pakai else rr.ket_aturan_pakai_manual end as aturan_pakai,
                (
                    select sum(xx.tebus_r_jumlah)
                    from sm_resep_tebus_r as xx
                    join sm_resep_tebus as x on (x.id = xx.id_resep_tebus)
                    where x.id_resep = " . $id_resep . " and xx.r_no = rr.r_no and x.pengambilan_ke <= '" . $pengambilan_ke . "'
                ) as tebus_r_jumlah
            ", false);
			$this->db->from('sm_resep_tebus as r');
			$this->db->join('sm_resep_tebus_r as rr', 'rr.id_resep_tebus = r.id');
			$this->db->join('sm_resep_tebus_r_detail as rrd', 'rr.id = rrd.id_resep_tebus_r '); //hanya obat
			$this->db->join('sm_barang as b', 'rrd.id_barang=b.id'); //hanya obat
			// $this->db->where('b.id_kategori', '1', true);//hanya obat

			$this->db->where('r.id_resep', $id_resep, true);
			if ($no_r !== null) :
				$this->db->where('rr.r_no', $no_r, true);
			endif;
			if ($pengambilan_ke !== null) :
				$this->db->where('r.pengambilan_ke', $pengambilan_ke, true);
			endif;
			$this->db->group_by('r.id_resep,rr.id'); //hanya obat

		endif;

		return $this->db->get();
	}

	function getListDataResepDetail($id_resep_r, $id_resep)
	{
		$check = $this->db->select("count(*) as jumlah")->from('sm_resep_tebus')->where('id_resep', $id_resep)->get()->row();
		if ($check->jumlah === '0') :
			$this->db->select("
                CONCAT_WS(' ', b.nama, b.kekuatan, st.nama, sd.nama) as nama_barang,
                rrd.jumlah_pakai as jumlah, rr.resep_r_jumlah, rr.tebus_r_jumlah, rr.r_no,
                rr.cara_pembuatan, r.id as id_resep,
                (
                    select min(ed) from sm_stok where id_barang = rrd.id_barang and ed > '" . date('Y-m-d') . "'
                ) as ed, rr.keterangan_resep
            ");
			$this->db->from('sm_resep as r');
			$this->db->join('sm_resep_r as rr', 'rr.id_resep = r.id');
			$this->db->join('sm_resep_r_detail as rrd', 'rrd.id_resep_r = rr.id');
			$this->db->join('sm_barang as b', 'b.id = rrd.id_barang');
			$this->db->join('sm_satuan as st', 'st.id = b.satuan_kekuatan', 'left');
			$this->db->join('sm_sediaan as sd', 'sd.id = b.id_sediaan', 'left');
			$this->db->where('rrd.id_resep_r', $id_resep_r, true);
		else :
			$this->db->select("
                CONCAT_WS(' ', b.nama, b.kekuatan, st.nama, sd.nama) as nama_barang,
                rrd.jumlah_pakai as jumlah, rr.resep_r_jumlah, rr.tebus_r_jumlah, rr.r_no,
                rr.cara_pembuatan, r.id as id_resep,
                (
                    select min(ed) from sm_stok where id_barang = rrd.id_barang and ed > '" . date('Y-m-d') . "'
                ) as ed, rr.keterangan_resep,rrd.dosis_racik
            ");
			$this->db->from('sm_resep_tebus as r');
			$this->db->join('sm_resep_tebus_r as rr', 'rr.id_resep_tebus = r.id');
			$this->db->join('sm_resep_tebus_r_detail as rrd', 'rrd.id_resep_tebus_r = rr.id');
			$this->db->join('sm_barang as b', 'b.id = rrd.id_barang');
			$this->db->join('sm_satuan as st', 'st.id = b.satuan_kekuatan', 'left');
			$this->db->join('sm_sediaan as sd', 'sd.id = b.id_sediaan', 'left');
			$this->db->where('rrd.id_resep_tebus_r', $id_resep_r, true);
		endif;

		return $this->db->get();
	}
}
