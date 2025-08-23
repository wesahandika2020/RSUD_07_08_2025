<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rekam_medis_model extends CI_Model
{


	function __construct()
	{
		parent::__construct();
		$this->datetime = date('Y-d-m H:i:s');
	}

	function getListDataKunjungan($no_rm)
	{
		$sql = "select pd.id, date(pd.tanggal_daftar) as tanggal_kunjungan
                from sm_pendaftaran as pd
                where pd.id_pasien = '" . $no_rm . "'
				and pd.status <> 'Batal'
                order by pd.tanggal_daftar desc";

		return $this->db->query($sql)->result();
	}

	function getDataKunjungan($id_pendaftaran)
	{
		$this->db->select("pd.id, pd.no_register, date(pd.tanggal_daftar) as tanggal_kunjungan,
                           pd.tanggal_daftar, pd.tanggal_keluar,
                           case when pd.jenis_pendaftaran = 'IGD' 
                                then concat_ws(' ', pd.jenis_pendaftaran, pd.jenis_igd) 
                                else pd.jenis_pendaftaran 
                                end as jenis_pendaftaran,
                           pd.kondisi_keluar, pd.nama_pjwb, pd.telp_pjwb, pd.alamat_pjwb,
                           pd.nama_pjwb_finansial, pd.telp_pjwb_finansial, pd.alamat_pjwb_finansial,
                           pd.status, tr.account as petugas_pendaftaran, (null) as layanan");
		$this->db->from('sm_pendaftaran as pd', true);
		$this->db->join('sm_translucent as tr', 'tr.id = pd.id_users', 'left', true);
		$this->db->where('pd.id', $id_pendaftaran, true);

		return $this->db->get()->row();
	}

	function getLayananKunjungan($id_pendaftaran)
	{
		$this->load->model('pelayanan/Pelayanan_model', 'pelayanan');
		$this->db->select("lp.id, lp.jenis_layanan, lp.tanggal_layanan,
                            coalesce(pg.nama, '') as dokter,
                            case when lp.jenis_layanan = 'Poliklinik'
                                 then concat_ws(' ', 'Klinik', sp.nama)
                                 when lp.jenis_layanan = 'Rawat Inap'
                                 then concat_ws(' ruang ', concat_ws(' kelas ', bg.nama, k.nama), ri.no_ruang) 
                                 else lp.jenis_layanan 
                                 end as ruang,
                            case when lp.cara_bayar = 'Tunai'
                                 then lp.cara_bayar
                                 else concat_ws(' ', lp.cara_bayar, pj.nama)
                                 end as cara_bayar,
                            lp.no_sep,  
                            coalesce(lp.tindak_lanjut, '') as tindak_lanjut,
                            (null) as anamnesa,
                            (null) as tindakan,
                            (null) as laboratorium,
                            (null) as radiologi,
                            (null) as obat,
                            (null) as operasi", true);
		$this->db->from('sm_layanan_pendaftaran as lp');
		$this->db->join('sm_spesialisasi as sp', 'sp.id = lp.id_unit_layanan', 'left', true);
		$this->db->join('sm_tenaga_medis as tm', 'tm.id = lp.id_dokter', 'left', true);
		$this->db->join('sm_pegawai as pg', 'pg.id = tm.id_pegawai', 'left', true);
		$this->db->join('sm_rawat_inap as ri', 'ri.id_layanan_pendaftaran = lp.id', 'left', true);
		$this->db->join('sm_kelas as k', 'k.id = ri.id_kelas', 'left', true);
		$this->db->join('sm_bangsal as bg', 'bg.id = ri.id_bangsal', 'left', true);
		$this->db->join('sm_penjamin as pj', 'pj.id = lp.id_penjamin', 'left', true);
		$this->db->where('lp.id_pendaftaran', $id_pendaftaran, true);
		$this->db->order_by('lp.id');

		$data = $this->db->get()->result();
		foreach ($data as $i => $v) :
			$v->anamnesa     = [];
			$v->diagnosis    = [];
			$v->anamnesa     = $this->pelayanan->getAnamnesa($v->id);
			$v->diagnosis    = $this->pelayanan->getDiagnosaPemeriksaan($v->id);
			$v->soap_ranap   = $this->pelayanan->getSOAPranap($v->id);
			$v->tindakan     = $this->getTarifTindakan($v->id);
			$v->operasi      = $this->getTarifOperasi($v->id);
			$v->laboratorium = $this->getPemeriksanLaboratorium($v->id);
			foreach ($v->laboratorium as $j => $val) :
				$listItem = $this->getListItemLaboratorium($val->id);
				foreach ($listItem as $l => $value) :
					$val->detail .= $value->item;
					if ($l < count((array) $listItem) - 1) :
						$val->detail .= ", ";
					endif;
				endforeach;
			endforeach;

			$v->radiologi = $this->getPemeriksanRadiologi($v->id);
			foreach ($v->radiologi as $j => $val) :
				$listItem = $this->getListItemRadiologi($val->id);
				foreach ($listItem as $l => $value) :
					$val->detail .= $value->item;
					if ($l < count((array) $listItem) - 1) :
						$val->detail .= ", ";
					endif;
				endforeach;
			endforeach;

			$v->fisioterapi = $this->getPemeriksanFisioterapi($v->id);
			foreach ($v->fisioterapi as $j => $val) :
				$listItem = $this->getListItemFisioterapi($val->id);
				foreach ($listItem as $l => $value) :
					$val->detail .= $value->item;
					if ($l < count((array) $listItem) - 1) :
						$val->detail .= ", ";
					endif;
				endforeach;
			endforeach;

			$v->obat = $this->getObat($v->id);
		endforeach;

		return $data;
	}

	function getLayananRuangan($no_rm)
	{
		$this->load->model('pelayanan/Pelayanan_model', 'pelayanan');
		$this->db->select("lp.jenis_layanan, lp.id_pendaftaran,
			case 
				when lp.jenis_layanan = 'Poliklinik'
                    then concat_ws(' ', 'Klinik', sp.nama)
                when lp.jenis_layanan = 'Rawat Inap'
                    then concat_ws(' ruang ', bg.nama) 
                else jenis_layanan 
            end as ruang");
		$this->db->from('sm_layanan_pendaftaran as lp');
		$this->db->join('sm_spesialisasi as sp', 'sp.id = lp.id_unit_layanan', 'left', true);
		$this->db->join('sm_rawat_inap as ri', 'ri.id_layanan_pendaftaran = lp.id', 'left', true);
		$this->db->join('sm_kelas as k', 'k.id = ri.id_kelas', 'left', true);
		$this->db->join('sm_bangsal as bg', 'bg.id = ri.id_bangsal', 'left', true);
		$this->db->where('id_pendaftaran', $no_rm, true);
		$this->db->order_by('lp.id');

		return $this->db->get()->result();
	}

	public function getDokterDPJP($id_pendaftaran)
	{
		$this->db->select("pg.nama");
		$this->db->from('sm_layanan_pendaftaran as lp');
		$this->db->join('sm_tenaga_medis as tm', 'tm.id = lp.id_dokter', 'left', true);
		$this->db->join('sm_pegawai as pg', 'pg.id = tm.id_pegawai', 'left', true);
		$this->db->where('lp.id_pendaftaran', $id_pendaftaran, true);
		$this->db->order_by('lp.id', 'desc');
		$this->db->limit(1);

		return $this->db->get()->row();
	}

	function getTarifTindakan($id_layanan_pendaftaran, $pendaftaran = null)
	{
		$this->db->select("ttp.tanggal, l.nama as item,
                            coalesce(pg.nama, '') as operator,
                            count(*) as frekuensi");
		$this->db->from('sm_pendaftaran as pd');
		$this->db->join('sm_layanan_pendaftaran as lp', 'lp.id_pendaftaran = pd.id');
		$this->db->join('sm_tarif_tindakan_pasien as ttp', 'ttp.id_layanan_pendaftaran = lp.id');
		$this->db->join('sm_tarif_pelayanan as tp', 'tp.id = ttp.id_tarif_pelayanan');
		$this->db->join('sm_layanan as l', 'l.id = tp.id_layanan');
		$this->db->join('sm_tenaga_medis as tm', 'tm.id = ttp.id_operator', 'left');
		$this->db->join('sm_pegawai as pg', 'pg.id = tm.id_pegawai', 'left');
		$this->db->join('sm_profesi_nadis as pn', 'pn.id = tm.id_profesi', 'left');
		$this->db->where('lp.id', $id_layanan_pendaftaran);
		$this->db->group_by('ttp.tanggal, l.nama, pg.nama, pn.nama, l.id');
		$this->db->order_by('pn.nama, l.id');

		if ($pendaftaran !== null) :
			if ($pendaftaran === 'Ya') :
				$this->db->where('ttp.is_pendaftaran', 'Ya');
			endif;

			if ($pendaftaran === 'Tidak') :
				$this->db->where('ttp.is_pendaftaran', 'Tidak');
			endif;
		endif;

		return $this->db->get()->result();
	}

	function getObat($id)
	{
		$sql1 = "select pn.id, pn.waktu, pn.waktu_diserahkan, pn.jenis, pn.id_resep, '0' as is_delete from sm_penjualan pn where pn.id_layanan_pendaftaran = '" . $id . "' ";
		$sql2 = "select penjualan->>'id' as id, penjualan->>'waktu' as waktu, penjualan->>'waktu_diserahkan' as waktu_diserahkan, penjualan->>'jenis' as jenis, penjualan->>'id_resep' as id_resep, '1' as is_delete
		from sm_resep_logs
		where penjualan->>'id_layanan_pendaftaran' = '{$id}'
		and aksi = 'Hapus'";

		$result1 = $this->db->query($sql1)->result();
		$result2 = $this->db->query($sql2)->result();

		$data = array_merge($result1, $result2);

		return $data;
	}

	function getDetailAnamnesa($id)
	{
		$sql = "select *
        from sm_anamnesa an  where an.id = '" . $id . "' ";

		return $this->db->query($sql)->row();
	}

	// function getDetailObat( $id_penjualan ) {
	// 	$sql = "select distinct concat_ws(' ',b.nama, b.kekuatan, stn.nama, sd.nama, '<small><i>', COALESCE(pb.nama,''), '</i></small>') as nama_barang,
	// 			pjd.qty,b.kekuatan,stn.nama as jenis_dosis,srr.aturan_pakai,sr.keterangan,srr.r_no
	// 			from sm_detail_penjualan pjd
	// 			join sm_penjualan p on (pjd.id_penjualan = p.id)
	// 			join sm_kemasan_barang kb on (kb.id = pjd.id_kemasan)
	// 			join sm_barang b on (b.id = kb.id_barang)
	// 			left join sm_resep sr on p.id_resep = sr.id
	// 			left join sm_resep_r srr on sr.id = srr.id_resep
	// 			left join sm_resep_r_detail srrd on srr.id = srrd.id_resep_r
	// 			left join sm_pabrik pb on (b.id_pabrik = pb.id)
	// 			left join sm_sediaan sd on (b.id_sediaan = sd.id)
	// 			left join sm_satuan stn on (b.satuan_kekuatan = stn.id)
	//             where pjd.id_penjualan = '" . $id_penjualan . "' and qty > 0";

	// 	return $this->db->query( $sql )->result();
	// }

	function getDetailObat($id_penjualan, $log)
	{
		if ($log != 1) {
			$sql = "select r.id ,rr.r_no,
	        CONCAT_WS(' ',b.nama,b.kekuatan,s.nama, COALESCE(sd.nama,''), COALESCE(pb.nama,'')) as nama_barang, 
	        concat_ws ( ' ', rrd.dosis_racik, s.nama ) AS dosis_obat,
	        rr.aturan_pakai,
	            rr.keterangan_resep,
	            rrd.jumlah_pakai as jumlah            
	        from sm_resep as r 
	        join sm_resep_r as rr   on rr.id_resep = r.id  
	        join sm_resep_r_detail as rrd   on rrd.id_resep_r = rr.id  
	        join sm_barang as b   on b.id = rrd.id_barang  
	        left join sm_satuan as s   on s.id = b.satuan_kekuatan        
	        left join sm_sediaan as sd   on sd.id = b.id_sediaan        
	        left join sm_pabrik as pb   on pb.id = b.id_pabrik
	        join sm_penjualan as pj on pj.id_resep= r.id
	        
	                 
	        join sm_layanan_pendaftaran as lp   on lp.id = r.id_layanan_pendaftaran  
	        where r.id is not null
	        and pj.id = '" . $id_penjualan . "'";
		} else {
			$sql = "with cte as (select * from sm_resep_logs where penjualan ->> 'id' = '342391')
			select distinct on (rrrd.resep_r_detail ->> 'id') 
								t1.resep ->> 'id'                                             as id,
								rr.resep_r ->> 'r_no'                                         as r_no,
								CONCAT_WS(' ', b.nama, b.kekuatan, s.nama, sd.nama, pb.nama)  as nama_barang,
								concat_ws(' ', rrrd.resep_r_detail ->> 'dosis_racik', s.nama) AS dosis_obat,
								rr.resep_r ->> 'aturan_pakai'                                 as aturan_pakai,
								rr.resep_r ->> 'keterangan_resep'                             as keterangan_resep,
								rrrd.resep_r_detail ->> 'jumlah_pakai'                        as jumlah
			from cte t1
			         join lateral JSONB_ARRAY_ELEMENTS(t1.resep_r) AS rr(resep_r) ON TRUE
			         join lateral JSONB_ARRAY_ELEMENTS(t1.resep_r_detail) AS rrd(resep_r_detail) ON TRUE
			         join lateral JSONB_ARRAY_ELEMENTS(rrd.resep_r_detail) AS rrrd(resep_r_detail) ON TRUE
			         join cte t2 on t1.resep ->> 'id' = rr.resep_r ->> 'id_resep'
			         join sm_barang b on b.id = (rrrd.resep_r_detail ->> 'id_barang')::int
			         left join sm_satuan as s on s.id = b.satuan_kekuatan
			         left join sm_sediaan as sd on sd.id = b.id_sediaan
			         left join sm_pabrik as pb on pb.id = b.id_pabrik
			 ";
		}

		return $this->db->query($sql)->result();
	}

	public function getDetailObatRM($id_penjualan, $log = 0)
	{
		if ($log != 1) {
		$sql = "WITH list_obat AS (SELECT rrd.id_resep_r,
                          concat_ws(' ', b.nama, b.kekuatan, s.nama, COALESCE(sd.nama, ''),
                                    COALESCE(pb.nama, ''))        AS nama_barang,
                          concat_ws(' ', rrd.dosis_racik, s.nama) AS dosis_obat,
                          rrd.jumlah_pakai                        AS jumlah
                   FROM sm_resep_r_detail rrd
                            JOIN sm_barang b ON b.id = rrd.id_barang
                            LEFT JOIN sm_satuan s ON s.id = b.satuan_kekuatan
                            LEFT JOIN sm_sediaan sd ON sd.id = b.id_sediaan
                            LEFT JOIN sm_pabrik pb ON pb.id = b.id_pabrik)

					SELECT rr.racik,
						rr.r_no,
						COALESCE(sd.nama, '-') AS sediaan,
						JSON_AGG(list_obat)    AS list_obat,
						rr.aturan_pakai,
						rr.keterangan_resep,
						rr.id,
						rr.resep_r_jumlah      AS permintaan
					FROM sm_resep r
							JOIN sm_resep_r rr ON rr.id_resep = r.id
							JOIN sm_penjualan pj ON pj.id_resep = r.id
							JOIN sm_layanan_pendaftaran lp ON lp.id = r.id_layanan_pendaftaran
							JOIN list_obat ON list_obat.id_resep_r = rr.id
							LEFT JOIN sm_sediaan sd ON sd.id = rr.id_sediaan
					WHERE pj.id = {$id_penjualan}
					GROUP BY rr.r_no,
							rr.racik,
							sd.nama,
							rr.aturan_pakai,
							rr.keterangan_resep,
							rr.id
					ORDER BY rr.r_no";
		} else {
			$sql = "WITH cte as (select * from sm_resep_logs where penjualan ->> 'id' = '{$id_penjualan}'),
							list_obat as (select rrrd.resep_r_detail ->> 'id_resep_r'                          as id_resep_r,
												concat_ws(' ', b.nama, b.kekuatan, s.nama, sd.nama, pb.nama)  as nama_barang,
												concat_ws(' ', rrrd.resep_r_detail ->> 'dosis_racik', s.nama) as dosis_obat,
												rrrd.resep_r_detail ->> 'jumlah_pakai'                        as jumlah
										from sm_resep_logs rl
												join lateral JSONB_ARRAY_ELEMENTS(rl.resep_r_detail) AS rrd(resep_r_detail) ON TRUE
												join lateral JSONB_ARRAY_ELEMENTS(rrd.resep_r_detail) AS rrrd(resep_r_detail) ON TRUE
												JOIN sm_barang b on b.id = (rrrd.resep_r_detail ->> 'id_barang')::int
												LEFT JOIN sm_satuan as s on s.id = b.satuan_kekuatan
												LEFT JOIN sm_sediaan as sd on sd.id = b.id_sediaan
												LEFT JOIN sm_pabrik as pb on pb.id = b.id_pabrik)
					select rr.resep_r ->> 'racik'            as racik,
							rr.resep_r ->> 'r_no'             as r_no,
							json_agg(list_obat)               as list_obat,
							rr.resep_r ->> 'aturan_pakai'     as aturan_pakai,
							rr.resep_r ->> 'keterangan_resep' as keterangan_resep,
							rr.resep_r ->> 'id'               as id,
							rr.resep_r ->> 'resep_r_jumlah'   AS permintaan,
							coalesce(sd.nama, '-')            as sediaan
					from cte
								join lateral JSONB_ARRAY_ELEMENTS(cte.resep_r) AS rr(resep_r) on TRUE
								join list_obat on list_obat.id_resep_r = rr.resep_r ->> 'id'
								left join sm_sediaan sd on sd.id = (rr.resep_r -> 'id_sediaan')::int
					group by rr.resep_r, sd.nama
					order by rr.resep_r ->> 'r_no'
			 ";
		}

		$reseult = $this->db->query($sql)->result();

		return array_map(function ($item) {
			$item->list_obat = json_decode($item->list_obat);
			return $item;
		}, $reseult);
	}

	function getPemeriksanLaboratorium($id_layanan_pendaftaran)
	{
		$sql = "select lb.id, lb.waktu_konfirm, lb.waktu_hasil, lb.kode,
                null as detail, orl.jenis as jenis_lab,
                COALESCE(pgdpj.nama, '') as dokter_pjwb
                from sm_laboratorium lb
                join sm_layanan_pendaftaran lp on (lp.id = lb.id_layanan_pendaftaran)
                left join sm_order_laboratorium orl on (orl.id = lb.id_order_laboratorium)
                left join sm_tenaga_medis dpj on (dpj.id = lb.id_dokter_pjwb)
                left join sm_pegawai pgdpj on (pgdpj.id = dpj.id_pegawai)
                where lb.id_layanan_pendaftaran = '" . $id_layanan_pendaftaran . "' 
				and lb.status_hasil != 'Batal' ";

		return $this->db->query($sql)->result();
	}

	function getListItemLaboratorium($id_laboratorium)
	{
		$sql = "select l.nama as item
                from sm_detail_laboratorium dl
                join sm_tarif_pelayanan kt on (kt.id = dl.id_tarif)
                join sm_layanan l on (l.id = kt.id_layanan)
                where dl.id_laboratorium = '" . $id_laboratorium . "' ";

		return $this->db->query($sql)->result();
	}

	function getPemeriksanRadiologi($id_layanan_pendaftaran)
	{
		$sql = "select rd.id, rd.waktu_konfirm, rd.waktu_hasil, rd.kode, sdr.url, sdr.id as id_detail_r, sdr.accessnumber,
                null as detail,  
                COALESCE(pgdpj.nama, '') as dokter_pjwb 
                from sm_radiologi rd  
                join sm_layanan_pendaftaran lp on (lp.id = rd.id_layanan_pendaftaran) 
                left join sm_detail_radiologi sdr on (sdr.id_radiologi = rd.id)  
                left join sm_tenaga_medis dpj on (dpj.id = rd.id_dokter_pjwb)  
                left join sm_pegawai pgdpj on (pgdpj.id = dpj.id_pegawai)   
                where rd.id_layanan_pendaftaran = '" . $id_layanan_pendaftaran . "' ";

		return $this->db->query($sql)->result();
	}

	function getListItemRadiologi($id_radiologi)
	{
		$sql = "select l.nama as item  
                from sm_detail_radiologi dr  
                join sm_tarif_pelayanan kt on (kt.id = dr.id_tarif)  
                join sm_layanan l on (l.id = kt.id_layanan)  
                where dr.id_radiologi = '" . $id_radiologi . "' ";

		return $this->db->query($sql)->result();
	}

	function getPemeriksanFisioterapi($id_layanan_pendaftaran)
	{
		$sql = "select fi.id, fi.waktu_konfirm, fi.waktu_hasil, fi.kode, 
                null as detail,  
                COALESCE(pgdk.nama, '') as dokter_pjwb 
                from sm_fisioterapi fi  
                join sm_layanan_pendaftaran lp on (lp.id = fi.id_layanan_pendaftaran) 
                left join sm_tenaga_medis dk on (dk.id = fi.id_dokter_pjwb)  
                left join sm_pegawai pgdk on (pgdk.id = dk.id_pegawai)  
                where fi.id_layanan_pendaftaran = '" . $id_layanan_pendaftaran . "' ";

		return $this->db->query($sql)->result();
	}

	function getListItemFisioterapi($id_fisioterapi)
	{
		$sql = "select l.nama as item  
                from sm_detail_fisioterapi df  
                join sm_tarif_pelayanan kt on (kt.id = df.id_tarif)  
                join sm_layanan l on (l.id = kt.id_layanan)  
                where df.id_fisioterapi = '" . $id_fisioterapi . "' ";

		return $this->db->query($sql)->result();
	}

	function getTarifOperasi($id_layanan_pendaftaran)
	{
		$sql = "SELECT top.id, top.waktu, l.nama as item,
                count(*) as frekuensi, 
                CASE WHEN top.is_operasi = 'Ya' 
                    THEN (SELECT COALESCE(pg.nama, '') as operator 
                        FROM sm_tim_operasi as tim 
                        JOIN sm_tenaga_medis as tk ON (tk.id = tim.id_nadis) 
                        JOIN sm_pegawai as pg ON(pg.id = tk.id_pegawai)
                        WHERE tim.id_jadwal_operasi = jko.id 
                        AND tim.status = 'Dokter Operator' LIMIT 1)
                    ELSE COALESCE(pg.nama, '') 
                END as operator,
                (
                    SELECT COALESCE(pg.nama, '') as operator 
                    FROM sm_tim_operasi as tim 
                    JOIN sm_tenaga_medis as tk ON (tk.id = tim.id_nadis) 
                    JOIN sm_pegawai as pg ON(pg.id = tk.id_pegawai)
                    WHERE tim.id_jadwal_operasi = jko.id 
                    AND tim.status = 'Dokter Anesthesi' LIMIT 1 
                ) as operator_anesthesi
                FROM sm_pendaftaran as pd
                JOIN sm_layanan_pendaftaran as lp ON (lp.id_pendaftaran = pd.id)
                JOIN sm_jadwal_kamar_operasi as jko ON (jko.id_layanan_pendaftaran = lp.id)
                JOIN sm_tarif_operasi as top ON (top.id_operasi = jko.id)
                JOIN sm_tarif_pelayanan as tp ON (tp.id = top.id_tarif)
                JOIN sm_layanan as l ON (l.id = tp.id_layanan)
                LEFT JOIN sm_tenaga_medis as tm ON (tm.id = top.id_nadis)
                LEFT JOIN sm_pegawai as pg ON (pg.id = tm.id_pegawai)
                LEFT JOIN sm_penjamin as pj ON (pj.id = top.id_penjamin)
                WHERE lp.id = '" . $id_layanan_pendaftaran . "' 
                GROUP BY tp.id, tp.ID, top.ID, l.nama, jko.id, pg.nama
                ";

		return $this->db->query($sql)->result();
	}

















	// FPTD
	function getPenolakanTindakanKedokteranById($id){
		$sql = "select fptk.*, p1.nama as nama_saksi_1, p2.nama as nama_saksi_2, pa.id as id_pasien, pa.nama as nama_pasien, pd.no_register, pa.telp, pa.tanggal_lahir as tanggal_lahir_pasien, pa.kelamin as kelamin_pasien, pa.alamat as alamat_pasien
				from sm_form_penolakan_tindakan_kedokteran fptk 
				join sm_tenaga_medis tm1 ON fptk.id_saksi_1 = tm1.id 
				join sm_pegawai p1 ON tm1.id_pegawai = p1.id
				join sm_tenaga_medis tm2 ON fptk.id_saksi_2 = tm2.id 
				join sm_pegawai p2 ON tm2.id_pegawai = p2.id
				join sm_layanan_pendaftaran lp ON fptk.id_layanan_pendaftaran = lp.id
				join sm_pendaftaran pd ON lp.id_pendaftaran = pd.id
				join sm_pasien pa ON pd.id_pasien = pa.id
				where fptk.id_layanan_pendaftaran  = '" . $id . "' ";

		return $this->db->query($sql)->result();
	}















	function getPersetujuanTindakanAnestesiById($id)
	{
		$sql = "select fpta.*, p1.nama as nama_saksi_1, p2.nama as nama_saksi_2, pa.nama as nama_pasien, pa.id as id_pasien, pd.no_register, pa.telp, pa.tanggal_lahir as tanggal_lahir_pasien, pa.kelamin as kelamin_pasien, pa.alamat as alamat_pasien
				from sm_form_persetujuan_tindakan_anestesi fpta 
				join sm_tenaga_medis tm1 ON fpta.id_saksi_1 = tm1.id 
				join sm_pegawai p1 ON tm1.id_pegawai = p1.id
				join sm_tenaga_medis tm2 ON fpta.id_saksi_2 = tm2.id 
				join sm_pegawai p2 ON tm2.id_pegawai = p2.id
				join sm_layanan_pendaftaran lp ON fpta.id_layanan_pendaftaran = lp.id
				join sm_pendaftaran pd ON lp.id_pendaftaran = pd.id
				join sm_pasien pa ON pd.id_pasien = pa.id
				where fpta.id_layanan_pendaftaran = '" . $id . "' ";

		return $this->db->query($sql)->result();
	}

	function getChecklistPenerimaanPasienRawatInapById($id)
	{
		$sql = "select fcpri.*, pa.nama as nama_pasien, pa.kelamin as kelamin_pasien, pd.id_pasien, pa.tanggal_lahir as tanggal_lahir_pasien, pa.telp, (SELECT CONCAT(bg.nama, ' kelas ', k.nama, ' ruang ', ri.no_ruang, ' No. Bed ', ri.no_bed) FROM sm_rawat_inap as ri JOIN sm_layanan_pendaftaran as lpd ON lpd.id = ri.id_layanan_pendaftaran JOIN sm_bangsal as bg ON bg.id = ri.id_bangsal JOIN sm_kelas as k ON k.id= ri.id_kelas WHERE ri.id_layanan_pendaftaran = '" . $id . "') AS asal_ruangan
				from sm_form_checklist_penerimaan_pasien_rawat_inap fcpri 							
				join sm_layanan_pendaftaran lp ON fcpri.id_layanan_pendaftaran = lp.id
				join sm_pendaftaran pd ON lp.id_pendaftaran = pd.id
				join sm_pasien pa ON pd.id_pasien = pa.id
				where fcpri.id_layanan_pendaftaran = '" . $id . "' ";

		return $this->db->query($sql)->result();
	}


	// PWHI Untuk Ambil data
	function getPendaftaranDetailTindakan($id_pendaftaran, $id_layanan_pendaftaran = null){
		// Data Pendaftaran Pasien
		$this->db->select("pd.*,
							p.id as no_rm, p.rm_lama, p.nama, p.kelamin, p.alamat, p.telp, p.agama,
							p.no_identitas, p.alergi, p.rm_lama, p.status_kawin, 
							p.tanggal_lahir, p.tempat_lahir, 
							p.no_rumah, p.no_rt, p.no_rw, p.kode_pos,
							coalesce(p.nama_prop, '') as provinsi,
							coalesce(p.nama_kab, '') as kabupaten,
							coalesce(p.nama_kec, '') as kecamatan,
							coalesce(p.nama_kel, '') as kelurahan,
							coalesce(pk.nama, '') as pekerjaan,
							coalesce(pend.nama, '') as pendidikan,
							coalesce(pj.nama, '') as penjamin,
							coalesce(pj.diskon, '0') as diskon,
							i.nama as instansi_perujuk, pjp.hak_kelas as kelas_rawat,
							pd.jenis_igd, p.gol_darah", true)
			->from('sm_pendaftaran as pd')
			->join('sm_pasien as p', 'p.id = pd.id_pasien')
			->join('sm_instansi as i', 'i.id = pd.id_instansi_perujuk', 'left')
			->join('sm_pekerjaan as pk', 'pk.id = p.id_pekerjaan', 'left')
			->join('sm_pendidikan as pend', 'pend.id = p.id_pendidikan', 'left')
			->join('sm_penjamin as pj', 'pj.id = pd.id_penjamin', 'left')
			->join('sm_penjamin_pasien as pjp', 'pjp.id_pasien = p.id')
			->where('pd.id', $id_pendaftaran, true);
		$data['pasien_tindakan'] = $this->db->get()->row();

		$this->db->select("lp.*,
							case when lp.jenis_layanan = 'IGD' then 'IGD' else sp.nama end as layanan,
							case when lp.cara_bayar = 'Tunai' then 'UMUM' else pj.nama end as status_pasien,
							coalesce(lp.no_antrian, 0) as no_antrian,
							coalesce(pj.nama, '') as penjamin,
							coalesce(pj.diskon, 0) as diskon,
							coalesce(pg.nama, '') as dokter,
							pg.tanda_tangan as ttd_dokter,
							coalesce(i.nama, '') as instansi_perujuk,
							coalesce(bg.nama, '') as bangsal,
							coalesce(bgic.nama, '') as bangsal_ic,
							coalesce(ri.no_ruang, '') as no_ruang,
							coalesce(ri.no_bed, 0) as no_bed,
							coalesce(ic.no_ruang, '') as no_ruang_ic,
							coalesce(ic.no_bed, 0) as no_bed_ic,
							bgic.id as id_bangsal_ic,
							tm.id_profesi,
							k.nama as kelas,
							kic.nama as kelas_icare,
							ri.waktu_masuk, ri.waktu_keluar, ri.waktu_konfirmasi_ranap, 
							ic.waktu_masuk as waktu_masuk_ic, ic.waktu_keluar as waktu_keluar_ic, ic.waktu_konfirmasi_icare, 
							bg.id as id_bangsal,
							odri.id_dokter_dpjp, odic.id_dokter_dpjp as id_dokter_dpjp_ic, coalesce(pgdpjp.nama, '') as dokter_dpjp, pgdpjp.tanda_tangan as ttd_dokter_dpjp, 
							coalesce(pgicdpjp.nama, '') as dokter_dpjp_ic, u.id as id_unit, u.nama as unit, pd.no_rujukan, peg.nama as petugas, 
							ins.nama as instansi_merujuk, pd.keterangan_rujukan,
							('') as before")
			->from('sm_layanan_pendaftaran as lp')
			->join('sm_pendaftaran as pd', 'pd.id = lp.id_pendaftaran')
			->join('sm_tenaga_medis as tm', 'tm.id = lp.id_dokter', 'left')
			->join('sm_pegawai as pg', 'pg.id = tm.id_pegawai', 'left')
			->join('sm_pegawai as peg', 'peg.id = lp.id_users', 'left')
			->join('sm_spesialisasi as sp', 'sp.id = lp.id_unit_layanan', 'left')
			->join('sm_penjamin as pj', 'pj.id = lp.id_penjamin', 'left')
			->join('sm_instansi as i', 'i.id = pd.id_instansi_perujuk', 'left')
			->join('sm_unit as u', 'u.id = sp.id_unit', 'left')
			->join('sm_rawat_inap as ri', 'ri.id_layanan_pendaftaran = lp.id', 'left')
			->join('sm_order_rawat_inap as odri', 'odri.id_rawat_inap = ri.id', 'left')
			->join('sm_intensive_care as ic', 'ic.id_layanan_pendaftaran = lp.id', 'left')
			->join('sm_order_intensive_care as odic', 'odic.id_intensive_care = ic.id', 'left')
			->join('sm_tenaga_medis as tmdpjp', 'tmdpjp.id = odri.id_dokter_dpjp', 'left')
			->join('sm_tenaga_medis as icdpjp', 'icdpjp.id = odic.id_dokter_dpjp', 'left')
			->join('sm_pegawai as pgicdpjp', 'pgicdpjp.id = icdpjp.id_pegawai', 'left')
			->join('sm_pegawai as pgdpjp', 'pgdpjp.id = tmdpjp.id_pegawai', 'left')
			->join('sm_bangsal as bg', 'bg.id = ri.id_bangsal', 'left')
			->join('sm_bangsal as bgic', 'bgic.id = ic.id_bangsal', 'left')
			->join('sm_kelas as k', 'k.id = ri.id_kelas', 'left')
			->join('sm_kelas as kic', 'kic.id = ic.id_kelas', 'left')
			->join('sm_instansi as ins', 'ins.id = pd.id_instansi_merujuk', 'left')
			->where('lp.id_pendaftaran', $id_pendaftaran, true)
			->order_by('lp.id', 'asc');

		if ($id_layanan_pendaftaran !== null) :
			$this->db->where('lp.id', $id_layanan_pendaftaran, true);
			$layanan = $this->db->get()->row();
			$layanan->before = $this->m_pelayanan->getLayananSpesialisasiBefore($layanan->id);
		else :
			$layanan = $this->db->get()->result();
		endif;

		$data['layanan'] = $layanan;
		return $data;
		$this->db->close();
	}

	// PWHI Untuk Ambil data     // STBSP
	function getPendaftaranDetailRekamMedis($id_layanan_pendaftaran){
		// Data Pendaftaran Pasien
		$this->db->select("pd.*,
							p.id as no_rm, p.rm_lama, p.nama, p.kelamin, p.alamat, p.telp, p.agama,
							p.no_identitas, p.alergi, p.rm_lama, p.status_kawin, p.nama_ayah, p.nama_ibu,
							p.no_rt, p.no_rw,
							p.tanggal_lahir, p.tempat_lahir,
							coalesce(p.nama_prop, '') as provinsi,
							coalesce(p.nama_kab, '') as kabupaten,
							coalesce(p.nama_kec, '') as kecamatan,
							coalesce(p.nama_kel, '') as kelurahan,
							coalesce(pk.nama, '') as pekerjaan,
							coalesce(pend.nama, '') as pendidikan,
							coalesce(pj.nama, '') as penjamin,
							coalesce(pj.diskon, '0') as diskon,
							i.nama as instansi_perujuk,
							pd.jenis_igd, p.gol_darah", true)
			->from('sm_pendaftaran as pd')
			->join('sm_layanan_pendaftaran as lp', 'pd.id = lp.id_pendaftaran')
			->join('sm_pasien as p', 'p.id = pd.id_pasien')
			->join('sm_instansi as i', 'i.id = pd.id_instansi_perujuk', 'left')
			->join('sm_pekerjaan as pk', 'pk.id = p.id_pekerjaan', 'left')
			->join('sm_pendidikan as pend', 'pend.id = p.id_pendidikan', 'left')
			->join('sm_penjamin as pj', 'pj.id = pd.id_penjamin', 'left')
			->where('lp.id', $id_layanan_pendaftaran, true);
		$data['pasien'] = $this->db->get()->row();

		$this->db->select("lp.*,
							case when lp.jenis_layanan = 'IGD' then 'IGD' else sp.nama end as layanan,
							case when lp.cara_bayar = 'Tunai' then 'UMUM' else pj.nama end as status_pasien,
							coalesce(lp.no_antrian, 0) as no_antrian,
							coalesce(pj.nama, '') as penjamin,
							coalesce(pj.diskon, 0) as diskon,
							coalesce(pg.nama, '') as dokter,
							coalesce(i.nama, '') as instansi_perujuk,
							coalesce(bg.nama, '') as bangsal,
							coalesce(bgic.nama, '') as bangsal_ic,
							coalesce(ri.no_ruang, '') as no_ruang,
							coalesce(ri.no_bed, 0) as no_bed,
							coalesce(ic.no_ruang, '') as no_ruang_ic,
							coalesce(ic.no_bed, 0) as no_bed_ic,
							tm.id_profesi,
							k.nama as kelas,
							kic.nama as kelas_icare,
							ri.waktu_masuk, ri.waktu_keluar, ri.waktu_konfirmasi_ranap, 
							ic.waktu_masuk as waktu_masuk_ic, ic.waktu_keluar as waktu_keluar_ic, ic.waktu_konfirmasi_icare, 
							bg.id as id_bangsal,
							odri.id_dokter_dpjp, odic.id_dokter_dpjp as id_dokter_dpjp_ic, coalesce(pgdpjp.nama, '') as dokter_dpjp, 
							coalesce(pgicdpjp.nama, '') as dokter_dpjp_ic, u.id as id_unit, u.nama as unit, pd.no_rujukan, peg.nama as petugas, 
							ins.nama as instansi_merujuk, pd.keterangan_rujukan,
							('') as before")
			->from('sm_layanan_pendaftaran as lp')
			->join('sm_pendaftaran as pd', 'pd.id = lp.id_pendaftaran')
			->join('sm_tenaga_medis as tm', 'tm.id = lp.id_dokter', 'left')
			->join('sm_pegawai as pg', 'pg.id = tm.id_pegawai', 'left')
			->join('sm_pegawai as peg', 'peg.id = lp.id_users', 'left')
			->join('sm_spesialisasi as sp', 'sp.id = lp.id_unit_layanan', 'left')
			->join('sm_penjamin as pj', 'pj.id = lp.id_penjamin', 'left')
			->join('sm_instansi as i', 'i.id = pd.id_instansi_perujuk', 'left')
			->join('sm_unit as u', 'u.id = sp.id_unit', 'left')
			->join('sm_rawat_inap as ri', 'ri.id_layanan_pendaftaran = lp.id', 'left')
			->join('sm_order_rawat_inap as odri', 'odri.id_rawat_inap = ri.id', 'left')
			->join('sm_intensive_care as ic', 'ic.id_layanan_pendaftaran = lp.id', 'left')
			->join('sm_order_intensive_care as odic', 'odic.id_intensive_care = ic.id', 'left')
			->join('sm_tenaga_medis as tmdpjp', 'tmdpjp.id = odri.id_dokter_dpjp', 'left')
			->join('sm_tenaga_medis as icdpjp', 'icdpjp.id = odic.id_dokter_dpjp', 'left')
			->join('sm_pegawai as pgicdpjp', 'pgicdpjp.id = icdpjp.id_pegawai', 'left')
			->join('sm_pegawai as pgdpjp', 'pgdpjp.id = tmdpjp.id_pegawai', 'left')
			->join('sm_bangsal as bg', 'bg.id = ri.id_bangsal', 'left')
			->join('sm_bangsal as bgic', 'bgic.id = ic.id_bangsal', 'left')
			->join('sm_kelas as k', 'k.id = ri.id_kelas', 'left')
			->join('sm_kelas as kic', 'kic.id = ic.id_kelas', 'left')
			->join('sm_instansi as ins', 'ins.id = pd.id_instansi_merujuk', 'left')
			->where('lp.id', $id_layanan_pendaftaran, true)
			->order_by('lp.id', 'asc');

		if ($id_layanan_pendaftaran !== null) :
			$this->db->where('lp.id', $id_layanan_pendaftaran, true);
			$layanan = $this->db->get()->row();
			$layanan->before = $this->m_pelayanan->getLayananSpesialisasiBefore($layanan->id);
		else :
			$layanan = $this->db->get()->result();
		endif;

		$data['layanan'] = $layanan;
		return $data;
		$this->db->close();
	}

	// PWHI   KALAU MAU NGECEK ID_PENDAFTARAN DAN ID_LAYANANYA BEDA ERORIN AJAH QUERINYA CONTOH
	// SELECTDI KASIH , . ATAU ANGKA 
	function getPemberianInformasi($id_pendaftaran, $id_layanan_pendaftaran){
		// var_dump($id_pendaftaran, $id_layanan_pendaftaran);die;
		$sql = "SELECT fpi.*, pa.nama AS nama_pasien, pt.nama AS nama_user, pd.no_register, pa.telp, 
						p.nama AS nama_dokter_pi, pd.id_pasien, pa.tanggal_lahir, pa.kelamin
				FROM sm_form_pemberian_informasi fpi
				JOIN sm_layanan_pendaftaran lp ON fpi.id_layanan_pendaftaran = lp.id        
				JOIN sm_pendaftaran pd ON lp.id_pendaftaran = pd.id
				JOIN sm_pasien pa ON pd.id_pasien = pa.id
				LEFT JOIN sm_tenaga_medis tm ON fpi.id_dokter_pelaksana_tindakan = tm.id
				LEFT JOIN sm_pegawai p ON tm.id_pegawai = p.id
				LEFT JOIN sm_translucent AS st ON st.id = fpi.id_users
				LEFT JOIN sm_pegawai AS pt ON pt.id = st.id
				WHERE fpi.id_layanan_pendaftaran = '" . $id_layanan_pendaftaran . "' 
				AND pd.id = '" . $id_pendaftaran . "'
				ORDER BY fpi.tanggal_jam_pi ASC";
		return $this->db->query($sql)->result();
	}

	// PWHI 
	function getPemberianInformasiById($id_ip){
		$sql = "select fpi.*, pa.nama as nama_pasien, pd.no_register, pa.telp, p.nama as nama_dokter_pelaksana, p.tanda_tangan, tm.no_sip, pt.nama as nama_user
				from sm_form_pemberian_informasi fpi				
				join sm_layanan_pendaftaran lp ON fpi.id_layanan_pendaftaran = lp.id
				join sm_pendaftaran pd ON lp.id_pendaftaran = pd.id
				join sm_pasien pa ON pd.id_pasien = pa.id
				left join sm_tenaga_medis tm ON fpi.id_dokter_pelaksana_tindakan = tm.id
				left join sm_pegawai p ON tm.id_pegawai = p.id		
				left join sm_translucent as st on st.id = fpi.id_users
				left join sm_pegawai as pt on pt.id = st.id
				where fpi.id = '" . $id_ip . "'";
		return $this->db->query($sql)->row();
	}

	// PWHI LOGS
	function getPemberianInformasiLogs($id_pendaftaran) { 
		$this->db->where('id_pendaftaran', $id_pendaftaran); 
		$this->db->order_by('created_date', 'desc');
		return $this->db->get('sm_form_pemberian_informasi_logs')->result();
	}




	function getSkriningResikoJatuhRajalById($id)
	{
		$sql = "select srjr.*, pa.nama as nama_pasien, pd.no_register, pa.telp, p.nama as nama_petugas, pd.id_pasien, pa.tanggal_lahir, pa.kelamin
                from sm_skrining_resiko_jatuh_rajal srjr
                join sm_layanan_pendaftaran slp ON srjr.id_layanan_pendaftaran = slp.id		
                join sm_pendaftaran pd ON slp.id_pendaftaran = pd.id
				join sm_pasien pa ON pd.id_pasien = pa.id
                left join sm_tenaga_medis tm ON srjr.id_petugas = tm.id
                left join sm_translucent st ON srjr.id_users = st.id
                left join sm_pegawai p ON tm.id_pegawai = p.id
				where srjr.id_layanan_pendaftaran  = '" . $id . "' ";

		return $this->db->query($sql)->result();
	}

	// function getPersetujuanTindakanKedokteranById($id)
	// {
	// 	$sql = "select fptk.*, p1.nama as nama_saksi_1, p2.nama as nama_saksi_2, pa.id as id_pasien, pa.nama as nama_pasien, pd.no_register, pa.telp, pa.tanggal_lahir as tanggal_lahir_pasien, pa.kelamin as kelamin_pasien, pa.alamat as alamat_pasien
	// 			from sm_form_persetujuan_tindakan_kedokteran fptk 
	// 			join sm_tenaga_medis tm1 ON fptk.id_saksi_1 = tm1.id 
	// 			join sm_pegawai p1 ON tm1.id_pegawai = p1.id
	// 			join sm_tenaga_medis tm2 ON fptk.id_saksi_2 = tm2.id 
	// 			join sm_pegawai p2 ON tm2.id_pegawai = p2.id
	// 			join sm_layanan_pendaftaran lp ON fptk.id_layanan_pendaftaran = lp.id
	// 			join sm_pendaftaran pd ON lp.id_pendaftaran = pd.id
	// 			join sm_pasien pa ON pd.id_pasien = pa.id
	// 			where fptk.id_layanan_pendaftaran  = '" . $id . "' ";

	// 	return $this->db->query($sql)->result();
	// }

	// PTK BARU
	function getPersetujuanTindakanKedokteranById($id){
		$sql = "select fptk.*, p1.nama as nama_saksi_1, pa.id as id_pasien, pa.nama as nama_pasien, pd.no_register, pa.telp, pa.tanggal_lahir as tanggal_lahir_pasien, pa.kelamin as kelamin_pasien, pa.alamat as alamat_pasien
				from sm_form_persetujuan_tindakan_kedokteran fptk 
				join sm_tenaga_medis tm1 ON fptk.id_saksi_1 = tm1.id 
				join sm_pegawai p1 ON tm1.id_pegawai = p1.id				
				join sm_layanan_pendaftaran lp ON fptk.id_layanan_pendaftaran = lp.id
				join sm_pendaftaran pd ON lp.id_pendaftaran = pd.id
				join sm_pasien pa ON pd.id_pasien = pa.id
				where fptk.id_layanan_pendaftaran  = '" . $id . "' ";
		return $this->db->query($sql)->result();
	}

	// PTO +
	function getPersetujuanTindakanOperasiById($id)
	{
		$sql = "select fpto.*, p1.nama as nama_saksi_1, p2.nama as nama_saksi_2, pa.id as id_pasien, pa.nama as nama_pasien, pd.no_register, pa.telp, pa.tanggal_lahir as tanggal_lahir_pasien, pa.kelamin as kelamin_pasien, pa.alamat as alamat_pasien
				from sm_form_persetujuan_tindakan_operasi fpto 
				join sm_tenaga_medis tm1 ON fpto.id_saksi_1 = tm1.id 
				join sm_pegawai p1 ON tm1.id_pegawai = p1.id
				join sm_tenaga_medis tm2 ON fpto.id_saksi_2 = tm2.id 
				join sm_pegawai p2 ON tm2.id_pegawai = p2.id
				join sm_layanan_pendaftaran lp ON fpto.id_layanan_pendaftaran = lp.id
				join sm_pendaftaran pd ON lp.id_pendaftaran = pd.id
				join sm_pasien pa ON pd.id_pasien = pa.id
				where fpto.id_layanan_pendaftaran = '" . $id . "' ";

		return $this->db->query($sql)->result();
	}


	function getTataTertibById($id)
	{
		$sql = "select ftt.*, pa.nama as nama_pasien, pa.kelamin as kelamin_pasien, pd.id_pasien, pa.tanggal_lahir as tanggal_lahir_pasien, pa.telp, (SELECT CONCAT(bg.nama, ' kelas ', k.nama, ' ruang ', ri.no_ruang, ' No. Bed ', ri.no_bed) FROM sm_rawat_inap as ri JOIN sm_layanan_pendaftaran as lpd ON lpd.id = ri.id_layanan_pendaftaran JOIN sm_bangsal as bg ON bg.id = ri.id_bangsal JOIN sm_kelas as k ON k.id= ri.id_kelas WHERE ri.id_layanan_pendaftaran = '" . $id . "') AS asal_ruangan
				from sm_form_tata_tertib ftt 							
				join sm_layanan_pendaftaran lp ON ftt.id_layanan_pendaftaran = lp.id
				join sm_pendaftaran pd ON lp.id_pendaftaran = pd.id
				join sm_pasien pa ON pd.id_pasien = pa.id
				where ftt.id_layanan_pendaftaran = '" . $id . "' ";

		return $this->db->query($sql)->result();
	}

	function getSuratKeteranganKematianById($id)
	{
		$sql = "select skk.*, p.nama as nama_pemeriksa, pa.nama as nama_pasien, pd.no_register, pa.telp, pa.id as no_rm
				from sm_form_surat_keterangan_kematian skk 
				join sm_tenaga_medis tm ON skk.id_pemeriksa = tm.id 
				join sm_pegawai p ON tm.id_pegawai = p.id				
				join sm_layanan_pendaftaran lp ON skk.id_layanan_pendaftaran = lp.id
				join sm_pendaftaran pd ON lp.id_pendaftaran = pd.id
				join sm_pasien pa ON pd.id_pasien = pa.id
				where lp.id_pendaftaran = '" . $id . "' ";

		return $this->db->query($sql)->row();
	}

	function getVisumEtRepertumById($id)
	{
		$sql = "select fver.*, pa.nama as nama_pasien, pd.no_register, pa.telp, p.nama as nama_dokter_jaga_igd, p.nip as nip_dokter_jaga_igd
				from sm_form_visum_et_repertum fver 				
				join sm_pendaftaran pd ON fver.id_pendaftaran = pd.id
				join sm_pasien pa ON pd.id_pasien = pa.id
				join sm_tenaga_medis tm ON fver.id_dokter_igd = tm.id 
				join sm_pegawai p ON tm.id_pegawai = p.id
				where fver.id_pendaftaran = '" . $id . "' ";

		return $this->db->query($sql)->result();
	}

	function getProfilRingkasMedisRawatJalan($id)
	{
		$sql = "select fver.*, pa.nama as nama_pasien, pd.no_register, pa.telp, p.nama as nama_dokter_jaga_igd, p.nip as nip_dokter_jaga_igd
				from sm_form_visum_et_repertum fver 				
				join sm_pendaftaran pd ON fver.id_pendaftaran = pd.id
				join sm_pasien pa ON pd.id_pasien = pa.id
				join sm_tenaga_medis tm ON fver.id_dokter_igd = tm.id 
				join sm_pegawai p ON tm.id_pegawai = p.id
				where fver.id_pendaftaran = '" . $id . "' ";

		return $this->db->query($sql)->result();
	}


	function getPasienSimrsLama($noRm, $nama, $umur)
	{
		$simrsLamaDb = $this->load->database('oldsimrs', true);

		$sql = "select * from b_ms_pasien
        where         
        (no_rm = '" . $noRm . "' and nama = '" . $nama . "') or 
        (nama = '" . $nama . "' and tgl_lahir = '" . $umur . "')";

		return $simrsLamaDb->query($sql)->result();
	}


	// SSCRJ 
	function getSurgicalSafetyCeklistRawatJalanById($id)
	{
		$sql = "select sscrj.*,
		 					sp1.nama as nama_dokter_1,
							sp2.nama as nama_dokter_2, 
							sp3.nama as nama_dokter_3, 
							sp4.nama as nama_dokter_4, 
							sp5.nama as nama_dokter_5, 
							sp6.nama as nama_perawat_1,
							sp7.nama as nama_perawat_2,
							sp8.nama as nama_perawat_3,
							sb1.nama as nama_obat,
							tmp8.nama as id_users					
				from sm_surgical_safety_ceklist_rawat_jalan sscrj	 
				left join sm_tenaga_medis tmd1 ON sscrj.sscrj_nama_operator = tmd1.id 
				left join sm_tenaga_medis tmd2 ON sscrj.sscrj_nama_anastesi = tmd2.id 
				left join sm_tenaga_medis tmd3 ON sscrj.sscrj_dokter_operator_sign_in = tmd3.id 
				left join sm_tenaga_medis tmd4 ON sscrj.sscrj_dokter_operator_time_out = tmd4.id 
				left join sm_tenaga_medis tmd5 ON sscrj.sscrj_dokter_operator_sign_out = tmd5.id 
				left join sm_pegawai sp1 ON tmd1.id_pegawai = sp1.id
				left join sm_pegawai sp2 ON tmd2.id_pegawai = sp2.id
				left join sm_pegawai sp3 ON tmd3.id_pegawai = sp3.id
				left join sm_pegawai sp4 ON tmd4.id_pegawai = sp4.id
				left join sm_pegawai sp5 ON tmd5.id_pegawai = sp5.id

				left join sm_tenaga_medis tmp1 ON sscrj.sscrj_perawat_sign_in = tmp1.id 
				left join sm_tenaga_medis tmp2 ON sscrj.sscrj_perawat_time_out = tmp2.id 
				left join sm_tenaga_medis tmp3 ON sscrj.sscrj_perawat_sign_out = tmp3.id 
				left join sm_pegawai sp6 ON tmp1.id_pegawai = sp6.id
				left join sm_pegawai sp7 ON tmp2.id_pegawai = sp7.id
				left join sm_pegawai sp8 ON tmp3.id_pegawai = sp8.id

				left join sm_barang sb1 ON sscrj.sscrj_nama_obat = sb1.id 
				left join sm_translucent st ON sscrj.id_users = st.id
				left join sm_pegawai tmp8 ON tmp8.id = st.id
				
				join sm_layanan_pendaftaran lp ON sscrj.id_layanan_pendaftaran = lp.id			
				join sm_pendaftaran pd ON lp.id_pendaftaran = pd.id	
				where sscrj.id_layanan_pendaftaran = '" . $id . "' ";

		return $this->db->query($sql)->result();
	}

	// pg.nama as nama_petugas_pendaftaran,
	// 



	// SPR PENAMBAHAN BARU
	function getSuratPengantarRawatById($id_pendaftaran){
		// var_dump($id_pendaftaran);die;
		$sql = "
				select 
					spr.*, pa.nama as nama_pasien, pd.id_pasien, 
					pa.kelamin as kelamin_pasien, pa.id as no_rm, 
					date_part('year',age(pa.tanggal_lahir)) as umur_pasien, 
					pa.no_identitas, pa.alamat as alamat_pasien, pa.telp,
					sp1.nama as nama_dokter_1,
					sp1.tanda_tangan as ttd_dokter_1,
					sp2.nama as nama_dokter_2,
					sp2.tanda_tangan as ttd_dokter_2,
					tmp.nama as id_users,
					tmp.tanda_tangan as ttd_users,
					pg.nama as nama_petugas_pendaftaran,
					pg.tanda_tangan as ttd_petugas
				from sm_form_surat_pengantar_rawat spr	
				join sm_layanan_pendaftaran lp ON spr.id_layanan_pendaftaran = lp.id
				join sm_pendaftaran pd ON lp.id_pendaftaran = pd.id	
				join sm_pasien pa ON pd.id_pasien = pa.id
				left join sm_tenaga_medis tmd1 ON spr.dokter_spr = tmd1.id
				left join sm_pegawai sp1 ON tmd1.id_pegawai = sp1.id
				left join sm_tenaga_medis tmd2 ON spr.ttd_dokter_spr = tmd2.id
				left join sm_pegawai sp2 ON tmd2.id_pegawai = sp2.id
				left join sm_pegawai pg ON spr.id_petugas_pendaftaran_spr = pg.id
				left join sm_translucent st ON spr.id_users = st.id
				left join sm_pegawai tmp ON tmp.id = st.id
				where pd.id = '" . $id_pendaftaran . "' 
				order by 
				case 
				when spr.updated_on is not null then spr.updated_on
				else spr.created_date
				end desc
			";				
		return $this->db->query($sql)->result();
	}



	// SKPM
	function getSuratKeteranganPemeriksaanMataById($id)
	{
		$sql = "select skpm.*, pa.nama as nama_pasien, pd.id_pasien, 
							   pa.kelamin as kelamin_pasien, pa.id as no_rm, 
							   date_part('year',age(pa.tanggal_lahir)) as umur_pasien, 
							   pa.no_identitas, pa.alamat as alamat_pasien, pa.telp,
							   sp1.nama as nama_dokter_1,
							   tmp8.nama as id_users												
				from sm_surat_keterangan_pemeriksaan_mata skpm	
				join sm_layanan_pendaftaran lp ON skpm.id_layanan_pendaftaran = lp.id
				join sm_pendaftaran pd ON lp.id_pendaftaran = pd.id	
				join sm_pasien pa ON pd.id_pasien = pa.id			
				left join sm_tenaga_medis tmd1 ON skpm.ttd_dokter_skpm = tmd1.id
				left join sm_pegawai sp1 ON tmd1.id_pegawai = sp1.id
				left join sm_translucent st ON skpm.id_users = st.id
				left join sm_pegawai tmp8 ON tmp8.id = st.id
				where skpm.id_layanan_pendaftaran = '" . $id . "' ";
		return $this->db->query($sql)->result();
	}


	// SPPPMK PERBAIKAN
	function getSuratPernyataanPersetujuanPenolakanMedisKhusus($id_pendaftaran){
		$sql = "select spppmk.*, pt.nama as nama_user, p.nama as nama_dokter
				from sm_surat_pernyataan_persetujuan_pmk spppmk				
				join sm_layanan_pendaftaran lp ON spppmk.id_layanan_pendaftaran = lp.id
				join sm_tenaga_medis tm ON spppmk.dokterspppmk = tm.id
				join sm_pegawai p ON tm.id_pegawai = p.id
				join sm_translucent as st on st.id = spppmk.id_user
				join sm_pegawai as pt on pt.id = st.id
				where lp.id_pendaftaran = '" . $id_pendaftaran . "'
				order by spppmk.tanggalspppmk asc";
		return $this->db->query($sql)->result();
	}

	// SPPPMK PERBAIKAN
	function getSuratPernyataanPersetujuanPenolakanMedisKhususById($id_kmppps){
		$sql = "select spppmk.*, pa.nama as nama_pasien, pd.no_register, pa.telp, p.nama as nama_dokter, p.tanda_tangan, tm.no_sip, pt.nama as nama_user, lp.tanggal_layanan AS tanggal
				from sm_surat_pernyataan_persetujuan_pmk spppmk				
				join sm_layanan_pendaftaran lp ON spppmk.id_layanan_pendaftaran = lp.id
				join sm_pendaftaran pd ON lp.id_pendaftaran = pd.id
				join sm_pasien pa ON pd.id_pasien = pa.id
				join sm_tenaga_medis tm ON spppmk.dokterspppmk = tm.id
				join sm_pegawai p ON tm.id_pegawai = p.id	
				left join sm_translucent as st on st.id = spppmk.id_user
				left join sm_pegawai as pt on pt.id = st.id
				where spppmk.id = '" . $id_kmppps . "'";
		return $this->db->query($sql)->row();
	}

	// SPPPMK LOGS PERBAIKAN
	function getSuratPernyataanPersetujuanPenolakanMedisKhususLogs($id_pendaftaran) { 
		$this->db->where('id_pendaftaran', $id_pendaftaran); 
		$this->db->order_by('created_at', 'desc');
		return $this->db->get('sm_surat_pernyataan_persetujuan_pmk_logs')->result();
	}

	// KPEGD PERBAIKAN
	function getSuratKeteranganPasienEmergency($id_pendaftaran){
		$sql = "select kpegd.*, pt.nama as nama_user, p.nama as nama_dokter
				from sm_keterangan_pasien_emergency kpegd				
				join sm_layanan_pendaftaran lp ON kpegd.id_layanan_pendaftaran = lp.id
				join sm_tenaga_medis tm ON kpegd.doktertriasekpegd = tm.id
				join sm_pegawai p ON tm.id_pegawai = p.id
				join sm_translucent as st on st.id = kpegd.id_user
				join sm_pegawai as pt on pt.id = st.id
				where lp.id_pendaftaran = '" . $id_pendaftaran . "'
				order by kpegd.tanggalkpegd asc";
		return $this->db->query($sql)->result();
	}

	// KPEGD PERBAIKAN
	function getSuratKeteranganPasienEmergencyById($id_dgepk){
		$sql = "select kpegd.*, pa.nama as nama_pasien, pd.no_register, pa.telp, p.nama as nama_dokter, p.tanda_tangan, tm.no_sip, pt.nama as nama_user, lp.tanggal_layanan AS tanggal
				from sm_keterangan_pasien_emergency kpegd				
				join sm_layanan_pendaftaran lp ON kpegd.id_layanan_pendaftaran = lp.id
				join sm_pendaftaran pd ON lp.id_pendaftaran = pd.id
				join sm_pasien pa ON pd.id_pasien = pa.id
				join sm_tenaga_medis tm ON kpegd.doktertriasekpegd = tm.id
				join sm_pegawai p ON tm.id_pegawai = p.id	
				left join sm_translucent as st on st.id = kpegd.id_user
				left join sm_pegawai as pt on pt.id = st.id
				where kpegd.id = '" . $id_dgepk . "'";
		return $this->db->query($sql)->row();
	}

	// KPEGD LOGS PERBAIKAN
	function getSuratKeteranganPasienEmergencyLogs($id_pendaftaran) { 
		$this->db->where('id_pendaftaran', $id_pendaftaran); 
		$this->db->order_by('created_at', 'desc');
		return $this->db->get('sm_keterangan_pasien_emergency_logs')->result();
	}







}
