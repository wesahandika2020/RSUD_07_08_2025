<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan_rm_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->datetime = date('Y-m-d H:i:s');
	}

	function getStatusKeluar()
	{
		$query = $this->db->select('tindak_lanjut')
			->distinct()
			->from("sm_layanan_pendaftaran")
			->where("tindak_lanjut IS NOT NULL")
			->where("tindak_lanjut != ''")
			->order_by('tindak_lanjut', 'ASC')
			->get()->result();
		$data =  array();
		$data[''] = 'Semua';
		foreach ($query as $key => $value) :
			$data[$value->tindak_lanjut] = $value->tindak_lanjut;
		endforeach;

		return $data;
	}

	function periodeBulan($search)
	{
		$periode = "";
		if ($search["periode_laporan"] === "Bulanan") {
			if ($search["bulan"] == '01') {
				$periode = "Januari " . $search["tahun"];
			} elseif ($search["bulan"] == '02') {
				$periode = "Februari " . $search["tahun"];
			} elseif ($search["bulan"] == '03') {
				$periode = "Maret " . $search["tahun"];
			} elseif ($search["bulan"] == '04') {
				$periode = "April " . $search["tahun"];
			} elseif ($search["bulan"] == '05') {
				$periode = "Mei " . $search["tahun"];
			} elseif ($search["bulan"] == '06') {
				$periode = "Juni " . $search["tahun"];
			} elseif ($search["bulan"] == '07') {
				$periode = "Juli " . $search["tahun"];
			} elseif ($search["bulan"] == '08') {
				$periode = "Agustus " . $search["tahun"];
			} elseif ($search["bulan"] == '09') {
				$periode = "September " . $search["tahun"];
			} elseif ($search["bulan"] == '10') {
				$periode = "Oktober " . $search["tahun"];
			} elseif ($search["bulan"] == '11') {
				$periode = "November " . $search["tahun"];
			} elseif ($search["bulan"] == '12') {
				$periode = "Desember " . $search["tahun"];
			}
		} elseif ($search["periode_laporan"] === "Harian") {
			$periode = get_date_format(date2mysql($search['tanggal_harian']));
		} elseif ($search["periode_laporan"] === "Rentang Waktu") {
			$periode = get_date_format(date2mysql($search['tanggal_awal'])) . " s.d " . get_date_format(date2mysql($search['tanggal_akhir']));
		}

		return $periode;
	}

	function getPeriode($periode_laporan, $tanggal_harian, $bulan, $tahun, $tanggal_awal, $tanggal_akhir)
	{
		$periode = "";
		if ($periode_laporan === "Bulanan") {
			if ($bulan == '01') {
				$periode = "Januari " . $tahun;
			} elseif ($bulan == '02') {
				$periode = "Februari " . $tahun;
			} elseif ($bulan == '03') {
				$periode = "Maret " . $tahun;
			} elseif ($bulan == '04') {
				$periode = "April " . $tahun;
			} elseif ($bulan == '05') {
				$periode = "Mei " . $tahun;
			} elseif ($bulan == '06') {
				$periode = "Juni " . $tahun;
			} elseif ($bulan == '07') {
				$periode = "Juli " . $tahun;
			} elseif ($bulan == '08') {
				$periode = "Agustus " . $tahun;
			} elseif ($bulan == '09') {
				$periode = "September " . $tahun;
			} elseif ($bulan == '10') {
				$periode = "Oktober " . $tahun;
			} elseif ($bulan == '11') {
				$periode = "November " . $tahun;
			} elseif ($bulan == '12') {
				$periode = "Desember " . $tahun;
			}
		} elseif ($periode_laporan === "Harian") {
			$periode = get_date_format(date2mysql($tanggal_harian));
		} elseif ($periode_laporan === "Rentang Waktu") {
			$periode = get_date_format(date2mysql($tanggal_awal)) . " s.d " . get_date_format(date2mysql($tanggal_akhir));
		}

		return $periode;
	}

	function getListDataLaporanRM01($limit, $start, $search)
	{
		$param = "";
		if ($search["periode_laporan"] === "Harian") {
			if ($search["tanggal_harian"] !== "") :
				$param .= " and to_char( pd.tanggal_daftar, 'yyyy-mm-dd' ) ilike '%" . date2mysql($search['tanggal_harian']) . "' ";
			endif;
		} elseif ($search["periode_laporan"] === "Bulanan" & $search["bulan"] !== "" & $search["tahun"] !== "") {
			$param .= " and to_char( pd.tanggal_daftar, 'mm/yyyy' ) ilike '%" . $search["bulan"] . "/" . $search["tahun"] . "' ";
		} elseif ($search["periode_laporan"] === "Rentang Waktu" & $search["tanggal_awal"] !== "" & $search["tanggal_akhir"] !== "") {
			if ($search["tanggal_awal"] !== "" & $search["tanggal_akhir"] !== "") :
				$param .= " and pd.tanggal_daftar BETWEEN '" . date2mysql($search['tanggal_awal']) . " 00:00:00' AND '" . date2mysql($search['tanggal_akhir']) . " 23:59:59'";
			endif;
		}

		if ($search["tempat_layanan_1"] !== "") :
			$param .= " and sp.nama = '" . $search["tempat_layanan_1"] . "' ";
		endif;

		if ($search["tempat_layanan_1"] !== "") :
			$param .= " and sp.nama = '" . $search["tempat_layanan_1"] . "' ";
		endif;

		if ($search["penjamin"] !== "") :
			$param .= " and lp.id_penjamin = '" . $search["penjamin"] . "' ";
		endif;

		if ($search["kunjungan"] !== "") :
			$param .= " and pd.status = '" . $search["kunjungan"] . "' ";
		endif;

		if ($search["jenis_rawat"] === "1") {
			$param .= " and lp.jenis_layanan IN ('Poliklinik', 'Forensik', 'Pemulasaran Jenazah', 'Hemodialisa', 'Medical Check Up') ";
		} elseif ($search["jenis_rawat"] === "2") {
			$param .= " and lp.jenis_layanan IN ('Rawat Inap', 'Intensive Care') ";
		} elseif ($search["jenis_rawat"] === "3") {
			$param .= " and lp.jenis_layanan = 'IGD' ";
		} elseif ($search["jenis_rawat"] === "4") {
			$param .= " and lp.jenis_layanan IN ('Laboratorium', 'Radiologi', 'Hemodialisa') ";
		}

		$query      = "";
		$limitation = "";
		if ($limit !== 0) :
			$limitation = " limit " . $limit . " offset " . $start;
		endif;

		$select = " SELECT * FROM (
		SELECT pd.ID,
			lp.id as id_layanan_pendaftaran,
			pd.status as status_kunjungan,
			pd.tanggal_daftar,
			pd.id_pasien,
			P.nama AS nama_pasien,
			pd.status as kunjungan,
			pj.nama AS penjamin,
			case when sp.nama is null then lp.jenis_layanan else sp.nama end AS unit_pelayanan,
			pg.nama AS nama_dokter,
			P.kelamin,
			concat (
				EXTRACT ( YEAR FROM AGE( P.tanggal_lahir ) ),
				' thn ',
				EXTRACT ( MONTH FROM AGE( P.tanggal_lahir ) ),
				' bln ',
				EXTRACT ( DAY FROM AGE( P.tanggal_lahir ) ),
				' hari'
			) AS umur,
			P.alamat,
			P.nama_kec,
			pd.tanggal_keluar AS tgl_selesai  ";
		$count  = "select count(*) as count from (select pd.id ";
		$sql    = "FROM sm_pasien P
		JOIN sm_pendaftaran AS pd ON ( pd.id_pasien = P.ID )
		LEFT JOIN sm_penjamin AS pj ON ( pj.ID = pd.id_penjamin )
		JOIN sm_layanan_pendaftaran AS lp ON ( lp.id_pendaftaran = pd.ID )
		LEFT JOIN sm_anamnesa as an on (an.id_layanan_pendaftaran = lp.id)
		LEFT JOIN sm_rawat_inap AS ra ON ( ra.id_layanan_pendaftaran = lp.ID )
		LEFT JOIN sm_kelas AS kl ON ( kl.ID = ra.id_kelas )
		LEFT JOIN sm_bangsal AS b ON ( b.ID = ra.id_bangsal )
		LEFT JOIN sm_spesialisasi AS sp ON ( sp.ID = lp.id_unit_layanan )
		LEFT JOIN sm_tenaga_medis AS tm ON ( tm.ID = lp.id_dokter )
		LEFT JOIN sm_pegawai AS pg ON ( pg.ID = tm.id_pegawai )
		
						
		where lp.id is not null AND pd.status != 'Batal' AND lp.status_terlayani = 'Sudah' " . $param . " 
		
						
		GROUP BY pg.nama, pd.status, pd.ID,lp.id,pd.id_pasien,lp.tanggal_layanan,P.nama,pd.status,pj.nama,sp.nama, pd.keterangan,P.kelamin,p.tanggal_lahir,P.alamat,P.nama_kec,pd.tanggal_keluar ) Lap ";

		$order = " ORDER BY tanggal_daftar asc ";

		$query = $this->db->query($select . $sql . $order . $limitation)->result();

		$periode = "";
		if ($search["periode_laporan"] === "Bulanan") {
			if ($search["bulan"] == '01') {
				$periode = "Januari " . $search["tahun"];
			} elseif ($search["bulan"] == '02') {
				$periode = "Februari " . $search["tahun"];
			} elseif ($search["bulan"] == '03') {
				$periode = "Maret " . $search["tahun"];
			} elseif ($search["bulan"] == '04') {
				$periode = "April " . $search["tahun"];
			} elseif ($search["bulan"] == '05') {
				$periode = "Mei " . $search["tahun"];
			} elseif ($search["bulan"] == '06') {
				$periode = "Juni " . $search["tahun"];
			} elseif ($search["bulan"] == '07') {
				$periode = "Juli " . $search["tahun"];
			} elseif ($search["bulan"] == '08') {
				$periode = "Agustus " . $search["tahun"];
			} elseif ($search["bulan"] == '09') {
				$periode = "September " . $search["tahun"];
			} elseif ($search["bulan"] == '10') {
				$periode = "Oktober " . $search["tahun"];
			} elseif ($search["bulan"] == '11') {
				$periode = "November " . $search["tahun"];
			} elseif ($search["bulan"] == '12') {
				$periode = "Desember " . $search["tahun"];
			}
		} elseif ($search["periode_laporan"] === "Harian") {
			$periode = get_date_format(date2mysql($search['tanggal_harian']));
		} elseif ($search["periode_laporan"] === "Rentang Waktu") {
			$periode = get_date_format(date2mysql($search['tanggal_awal'])) . " s.d " . get_date_format(date2mysql($search['tanggal_akhir']));
		}


		foreach ($query as $value) {
			$value->diagnosa_data = $this->getDiagnosaListLaporanByIdLayananPendaftaran($value->id_layanan_pendaftaran);
		}

		$data["periode"] = $periode;
		$data["data"]    = $query;
		$data["jumlah"]  = $this->db->query($count . $sql)->row()->count;
		$this->db->close();

		return $data;
	}

	function getDiagnosaListLaporanByIdLayananPendaftaran($id_layanan_pendaftaran)
	{
		$sql = "select
				concat(concat(case when gs2.kode_icdx_rinci is null then '' else ' [' end, gs2.kode_icdx_rinci, gs3.kode_icdx_rinci, case when gs2.kode_icdx_rinci is null then '' else '] ' end), case when d.id_golongan_sebab_sakit is not null then gs.nama else d.golongan_sebab_sakit_lain end) AS ICDX_diagnosa,
				d.prioritas,
				d.diagnosa_akhir,
				case when d.jenis_kasus = '1' then 'Baru' else 'Lama' end AS kasus, pg.nama as coder
				FROM sm_pasien P
				JOIN sm_pendaftaran AS pd ON ( pd.id_pasien = P.ID )
				JOIN sm_layanan_pendaftaran AS lp ON ( lp.id_pendaftaran = pd.ID )
				LEFT JOIN sm_diagnosa AS d ON ( d.id_layanan_pendaftaran = lp.ID )
				LEFT JOIN sm_golongan_sebab_sakit AS gs ON ( gs.ID = d.id_golongan_sebab_sakit )
				LEFT JOIN sm_golongan_sebab_sakit AS gs2 ON ( gs2.ID = d.id_pengkodean )
				LEFT JOIN sm_golongan_sebab_sakit AS gs3 ON ( gs3.ID = d.id_pengkodean_asterik )
				LEFT JOIN sm_pegawai as pg on ( d.id_coder = pg.id )
				WHERE lp.id = $id_layanan_pendaftaran ORDER BY d.prioritas desc";

		return $this->db->query($sql)->result();
	}

	function getListDataLaporanRM02($limit, $start, $search)
	{
		$param = "";
		if ($search["periode_laporan"] === "Harian") {
			if ($search["tanggal_harian"] !== "") :
				$param .= " and (to_char( ra.waktu_masuk, 'yyyy-mm-dd' ) ilike '%" . date2mysql($search['tanggal_harian']) . "' ";
				$param .= " or to_char( ic.waktu_masuk, 'yyyy-mm-dd' ) ilike '%" . date2mysql($search['tanggal_harian']) . "') ";
			endif;
		} elseif ($search["periode_laporan"] === "Bulanan" & $search["bulan"] !== "" & $search["tahun"] !== "") {
			$param .= " and (to_char( ra.waktu_masuk, 'mm/yyyy' ) ilike '%" . $search["bulan"] . "/" . $search["tahun"] . "' ";
			$param .= " or to_char( ic.waktu_masuk, 'mm/yyyy' ) ilike '%" . $search["bulan"] . "/" . $search["tahun"] . "') ";
		} elseif ($search["periode_laporan"] === "Rentang Waktu" & $search["tanggal_awal"] !== "" & $search["tanggal_akhir"] !== "") {
			if ($search["tanggal_awal"] !== "" & $search["tanggal_akhir"] !== "") :
				$param .= " and (ra.waktu_masuk BETWEEN '" . date2mysql($search['tanggal_awal']) . " 00:00:00' AND '" . date2mysql($search['tanggal_akhir']) . " 23:59:59'";
				$param .= " or ic.waktu_masuk BETWEEN '" . date2mysql($search['tanggal_awal']) . " 00:00:00' AND '" . date2mysql($search['tanggal_akhir']) . " 23:59:59')";
			endif;
		}

		if ($search["tempat_layanan_1"] !== "") :
			$param .= " and sp.nama = '" . $search["tempat_layanan_1"] . "' ";
		endif;

		if ($search["kelas_rawat"] !== "") :
			$param .= " and (kl.id = '" . $search["kelas_rawat"] . "' ";
			$param .= " or kl2.id = '" . $search["kelas_rawat"] . "') ";
		endif;

		if ($search["tempat_layanan_2"] !== "") :
			$param .= " and b.nama = '" . $search["tempat_layanan_2"] . "' ";
			$param .= " or b2.nama = '" . $search["tempat_layanan_2"] . "' ";
		endif;

		if ($search["penjamin"] !== "") :
			$param .= " and lp.id_penjamin = '" . $search["penjamin"] . "' ";
		endif;

		if ($search["kunjungan"] !== "") :
			$param .= " and pd.status = '" . $search["kunjungan"] . "' ";
		endif;

		if ($search["jenis_rawat"] === "1") {
			$param .= " and lp.jenis_layanan IN ('Poliklinik', 'Forensik', 'Pemulasaran Jenazah', 'Hemodialisa', 'Medical Check Up') ";
		} elseif ($search["jenis_rawat"] === "2") {
			$param .= " and lp.jenis_layanan IN ('Rawat Inap', 'Intensive Care') ";
		} elseif ($search["jenis_rawat"] === "3") {
			$param .= " and lp.jenis_layanan = 'IGD' ";
		} elseif ($search["jenis_rawat"] === "4") {
			$param .= " and lp.jenis_layanan IN ('Laboratorium', 'Radiologi', 'Hemodialisa') ";
		}

		if ($search['asal_kunjungan'] === "1") {
			$param .= " and pd.jenis_pendaftaran = 'Poliklinik' ";
		} elseif ($search['asal_kunjungan'] === "2") {
			$param .= " and pd.jenis_pendaftaran = 'IGD' ";
		}

		$query      = "";
		$limitation = "";
		if ($limit !== 0) :
			$limitation = " limit " . $limit . " offset " . $start;
		endif;

		$select = "select distinct ON (pd.id) pd.id,
	    pd.id_pasien,
	    p.alamat,
	    pd.status AS kunjungan,
	    p.nama AS nama_pasien,
	    p.nama_kec,
	    concat(date_part('year'::text, age(p.tanggal_lahir::timestamp with time zone)), ' thn ', date_part('month'::text, age(p.tanggal_lahir::timestamp with time zone)), ' bln ', date_part('day'::text, age(p.tanggal_lahir::timestamp with time zone)), ' hari') AS umur,
	    p.kelamin,
	    pj.nama AS penjamin,
	    coalesce(b2.nama, b.nama) AS ruangan,
		coalesce(kl.nama, kl2.nama) AS kelas,
	    case
          when pd.jenis_pendaftaran = 'Poliklinik' then (select concat_ws(' ', 'Poliklinik', ss.nama)
					from sm_layanan_pendaftaran slp
					join sm_spesialisasi ss on slp.id_unit_layanan = ss.id
					where slp.id < lp.id
					and slp.id_pendaftaran = lp.id_pendaftaran
					and slp.tindak_lanjut = 'Rawat Inap'
					group by ss.nama,slp.tanggal_periksa
					order by slp.tanggal_periksa desc)
          else pd.jenis_pendaftaran 
	    end              as asal_kunjungan,
		case
		  when pd.jenis_pendaftaran = 'IGD'
			  then (select slp.tanggal_layanan
					from sm_pendaftaran spen
							 join sm_layanan_pendaftaran slp on spen.id = slp.id_pendaftaran
					where spen.id = pd.id
					order by slp.id
					limit 1)
		  end as wakut_masuk_igd,
		case
			when pd.jenis_pendaftaran = 'IGD'
					then (select subquery.waktu_masuk
								from (select slp.tanggal_layanan as waktu_masuk,
															ROW_NUMBER() OVER (ORDER BY slp.tanggal_layanan) AS row_num
											from sm_pendaftaran spen
																join sm_layanan_pendaftaran slp on spen.id = slp.id_pendaftaran
											where spen.id = pd.id)
													as subquery
								where subquery.row_num = 2
								limit 1)
			end as wakut_masuk_ranap,
	    coalesce(pg.nama, pg2.nama) AS nama_dokter,
	    pd.jenis_igd ";

		$count = "select count(*) as count from (select DISTINCT ON ( pd.ID ) pd.* ";
		$sql   = " FROM sm_pasien p
	     JOIN sm_pendaftaran pd ON pd.id_pasien::text = p.id::text
	     LEFT JOIN sm_penjamin pj ON pj.id = pd.id_penjamin
	     LEFT JOIN sm_layanan_pendaftaran lp ON lp.id_pendaftaran = pd.id
	     LEFT JOIN sm_spesialisasi spes ON lp.id_unit_layanan = spes.id
	     LEFT JOIN sm_unit un ON un.id = lp.id_unit_layanan
	     LEFT JOIN sm_rawat_inap ra ON ra.id_layanan_pendaftaran = lp.id
	     LEFT JOIN sm_intensive_care ic ON lp.id = ic.id_layanan_pendaftaran
		 LEFT JOIN sm_kelas kl ON kl.id = ra.id_kelas
		 LEFT JOIN sm_kelas kl2 ON kl2.id = ic.id_kelas
	     LEFT JOIN sm_order_rawat_inap ori ON ori.id_pendaftaran = pd.id
	     LEFT JOIN sm_order_intensive_care orc ON orc.id_pendaftaran = pd.id
	     LEFT JOIN sm_tenaga_medis tm ON tm.id = ori.id_dokter_dpjp
	     LEFT JOIN sm_tenaga_medis tm2 ON tm2.id = orc.id_dokter_dpjp
	     LEFT JOIN sm_pegawai pg ON pg.id = tm.id_pegawai
	     LEFT JOIN sm_pegawai pg2 ON pg2.id = tm2.id_pegawai
	     LEFT JOIN sm_bangsal b ON b.id = ra.id_bangsal
	     LEFT JOIN sm_bangsal b2 ON b2.id = ic.id_bangsal
	     LEFT JOIN sm_spesialisasi sp ON sp.id = lp.id_unit_layanan
	     LEFT JOIN sm_diagnosa d ON d.id_layanan_pendaftaran = lp.id
	     LEFT JOIN sm_golongan_sebab_sakit gs ON gs.id = d.id_pengkodean
	     
	     WHERE pd.status <> 'Batal' and pd.jenis_rawat = 'Inap' $param ";

		$order = " ORDER BY pd.id, pd.id_pasien, pd.status, p.nama, p.alamat, (concat(date_part('year'::text, age(p.tanggal_lahir::timestamp with time zone)), ' thn ', date_part('month'::text, age(p.tanggal_lahir::timestamp with time zone)), ' bln ', date_part('day'::text, age(p.tanggal_lahir::timestamp with time zone)), ' hari')), p.kelamin, pj.nama, b.nama, pd.jenis_pendaftaran, pg.nama, pd.jenis_igd, ra.waktu_masuk ";

		$query = $this->db->query($select . $sql . $order . $limitation)->result();

		$periode = "";
		if ($search["periode_laporan"] === "Bulanan") {
			if ($search["bulan"] == '01') {
				$periode = "Januari " . $search["tahun"];
			} elseif ($search["bulan"] == '02') {
				$periode = "Februari " . $search["tahun"];
			} elseif ($search["bulan"] == '03') {
				$periode = "Maret " . $search["tahun"];
			} elseif ($search["bulan"] == '04') {
				$periode = "April " . $search["tahun"];
			} elseif ($search["bulan"] == '05') {
				$periode = "Mei " . $search["tahun"];
			} elseif ($search["bulan"] == '06') {
				$periode = "Juni " . $search["tahun"];
			} elseif ($search["bulan"] == '07') {
				$periode = "Juli " . $search["tahun"];
			} elseif ($search["bulan"] == '08') {
				$periode = "Agustus " . $search["tahun"];
			} elseif ($search["bulan"] == '09') {
				$periode = "September " . $search["tahun"];
			} elseif ($search["bulan"] == '10') {
				$periode = "Oktober " . $search["tahun"];
			} elseif ($search["bulan"] == '11') {
				$periode = "November " . $search["tahun"];
			} elseif ($search["bulan"] == '12') {
				$periode = "Desember " . $search["tahun"];
			}
		} elseif ($search["periode_laporan"] === "Harian") {
			$periode = get_date_format(date2mysql($search['tanggal_harian']));
		} elseif ($search["periode_laporan"] === "Rentang Waktu") {
			$periode = get_date_format(date2mysql($search['tanggal_awal'])) . " s.d " . get_date_format(date2mysql($search['tanggal_akhir']));
		}

		$data["periode"] = $periode;
		$data["data"]    = $query;
		$data["jumlah"]  = $this->db->query($count . $sql . ") as jml")->row()->count;
		$this->db->close();

		return $data;
	}

	function getListDataLaporanRM03($limit, $start, $search)
	{
		$param = "";
		if ($search["periode_laporan"] === "Harian") {
			if ($search["tanggal_harian"] !== "") :
				$param .= " and to_char( ra.waktu_keluar, 'yyyy-mm-dd' ) ilike '%" . date2mysql($search['tanggal_harian']) . "' ";
				$param .= " or to_char( ic.waktu_keluar, 'yyyy-mm-dd' ) ilike '%" . date2mysql($search['tanggal_harian']) . "' ";
			endif;
		} elseif ($search["periode_laporan"] === "Bulanan" & $search["bulan"] !== "" & $search["tahun"] !== "") {
			$param .= " and to_char( ra.waktu_keluar, 'mm/yyyy' ) ilike '%" . $search["bulan"] . "/" . $search["tahun"] . "' ";
			$param .= " or to_char( ic.waktu_keluar, 'mm/yyyy' ) ilike '%" . $search["bulan"] . "/" . $search["tahun"] . "' ";
		} elseif ($search["periode_laporan"] === "Rentang Waktu" & $search["tanggal_awal"] !== "" & $search["tanggal_akhir"] !== "") {
			if ($search["tanggal_awal"] !== "" & $search["tanggal_akhir"] !== "") :
				$param .= " and ra.waktu_keluar BETWEEN '" . date2mysql($search['tanggal_awal']) . " 00:00:00' AND '" . date2mysql($search['tanggal_akhir']) . " 23:59:59'";
				$param .= " or ic.waktu_keluar BETWEEN '" . date2mysql($search['tanggal_awal']) . " 00:00:00' AND '" . date2mysql($search['tanggal_akhir']) . " 23:59:59'";
			endif;
		}

		if ($search["tempat_layanan_1"] !== "") :
			$param .= " and sp.nama = '" . $search["tempat_layanan_1"] . "' ";
		endif;

		if ($search["tempat_layanan_2"] !== "") :
			$param .= " and b.nama = '" . $search["tempat_layanan_2"] . "' ";
			$param .= " or b2.nama = '" . $search["tempat_layanan_2"] . "' ";
		endif;

		if ($search["penjamin"] !== "") :
			$param .= " and lp.id_penjamin = '" . $search["penjamin"] . "' ";
		endif;

		if ($search["kunjungan"] !== "") :
			$param .= " and pd.status = '" . $search["kunjungan"] . "' ";
		endif;

		if ($search["jenis_rawat"] === "1") {
			$param .= " and lp.jenis_layanan IN ('Poliklinik', 'Forensik', 'Pemulasaran Jenazah', 'Hemodialisa', 'Medical Check Up') ";
		} elseif ($search["jenis_rawat"] === "2") {
			$param .= " and lp.jenis_layanan IN ('Rawat Inap', 'Intensive Care') ";
		} elseif ($search["jenis_rawat"] === "3") {
			$param .= " and lp.jenis_layanan = 'IGD' ";
		} elseif ($search["jenis_rawat"] === "4") {
			$param .= " and lp.jenis_layanan IN ('Laboratorium', 'Radiologi', 'Hemodialisa') ";
		}

		$query      = "";
		$limitation = "";
		if ($limit !== 0) :
			$limitation = " limit " . $limit . " offset " . $start;
		endif;

		$select = " select distinct ON (p.id) pd.id,
        lp.id as id_layanan_pendaftaran,
		pd.id_pasien,
		pd.status AS kunjungan,
		P.nama AS nama_pasien,
		P.alamat,
		P.nama_kec,
		concat(date_part('year'::text, age(p.tanggal_lahir::timestamp with time zone)), ' thn ', date_part('month'::text, age(p.tanggal_lahir::timestamp with time zone)), ' bln ', date_part('day'::text, age(p.tanggal_lahir::timestamp with time zone)), ' hari') AS umur,
		P.kelamin,
		pj.nama AS penjamin,
		coalesce(kl.nama, kl2.nama) AS kelas,
		coalesce(b2.nama, b.nama) AS ruangan,
		ori.is_pindah_ruang,
		coalesce(ra.waktu_masuk, ic.waktu_masuk) AS tgl_MRS,
		lp.tindak_lanjut AS cara_keluar,
		coalesce(pg.nama, pg2.nama) AS nama_dokter ";

		$count = "select count(*) as count from (select pd.ID, pd.* ";
		$sql   = "from sm_pasien p
		join sm_pendaftaran as pd on (pd.id_pasien = p.id)
		left join sm_penjamin as pj on (pj.id = pd.id_penjamin)
		join sm_layanan_pendaftaran as lp on (lp.id_pendaftaran = pd.id)
		left join sm_unit as un on (un.id = lp.id_unit_layanan)
		left join sm_rawat_inap as ra on (ra.id_layanan_pendaftaran = lp.id)
		left join sm_intensive_care ic on (lp.id = ic.id_layanan_pendaftaran)
		left join sm_order_rawat_inap as ori on (ori.id_pendaftaran = pd.id)
		left join sm_order_intensive_care orc on (orc.id_pendaftaran = pd.id)
		left join sm_kelas as kl on (kl.id = ra.id_kelas)
		left join sm_kelas as kl2 on (kl2.id = ic.id_kelas)
		left join sm_bangsal as b on (b.id = ra.id_bangsal)
		left join sm_bangsal b2 on (b2.id = ic.id_bangsal)
		left join sm_spesialisasi as sp on (sp.id = lp.id_unit_layanan)
		left join sm_tenaga_medis as tm on (tm.id = ori.id_dokter_dpjp)
		left join sm_tenaga_medis tm2 on tm2.id = orc.id_dokter_dpjp
		left join sm_pegawai as pg on pg.id = tm.id_pegawai
		left join sm_pegawai pg2 on (pg2.id = tm2.id_pegawai)
						
		WHERE pd.status != 'Batal' and pd.jenis_rawat = 'Inap' $param  ";

		$order = " order by p.id, pd.id, pd.id_pasien, kunjungan, nama_pasien, p.alamat, umur, p.kelamin, penjamin, ruangan, nama_dokter, pd.jenis_igd ";

		$query = $this->db->query($select . $sql . $order . $limitation)->result();

		$periode = "";
		if ($search["periode_laporan"] === "Bulanan") {
			if ($search["bulan"] == '01') {
				$periode = "Januari " . $search["tahun"];
			} elseif ($search["bulan"] == '02') {
				$periode = "Februari " . $search["tahun"];
			} elseif ($search["bulan"] == '03') {
				$periode = "Maret " . $search["tahun"];
			} elseif ($search["bulan"] == '04') {
				$periode = "April " . $search["tahun"];
			} elseif ($search["bulan"] == '05') {
				$periode = "Mei " . $search["tahun"];
			} elseif ($search["bulan"] == '06') {
				$periode = "Juni " . $search["tahun"];
			} elseif ($search["bulan"] == '07') {
				$periode = "Juli " . $search["tahun"];
			} elseif ($search["bulan"] == '08') {
				$periode = "Agustus " . $search["tahun"];
			} elseif ($search["bulan"] == '09') {
				$periode = "September " . $search["tahun"];
			} elseif ($search["bulan"] == '10') {
				$periode = "Oktober " . $search["tahun"];
			} elseif ($search["bulan"] == '11') {
				$periode = "November " . $search["tahun"];
			} elseif ($search["bulan"] == '12') {
				$periode = "Desember " . $search["tahun"];
			}
		} elseif ($search["periode_laporan"] === "Harian") {
			$periode = get_date_format(date2mysql($search['tanggal_harian']));
		} elseif ($search["periode_laporan"] === "Rentang Waktu") {
			$periode = get_date_format(date2mysql($search['tanggal_awal'])) . " s.d " . get_date_format(date2mysql($search['tanggal_akhir']));
		}

		// append diagnosa
		foreach ($query as $value) {
			$value->diagnosa_data = $this->getDiagnosaListLaporanByIdLayananPendaftaran($value->id_layanan_pendaftaran);
		}

		$data["periode"] = $periode;
		$data["data"]    = $query;
		$data["jumlah"]  = $this->db->query($count . $sql . ") as jml")->row()->count;
		$this->db->close();

		return $data;
	}

	function getListDataLaporanRM04($limit, $start, $search)
	{
		$param = "";
		if ($search["periode_laporan"] === "Harian") {
			if ($search["tanggal_harian"] !== "") :
				$param .= " and to_char( ra.waktu_masuk, 'yyyy-mm-dd' ) ilike '%" . date2mysql($search['tanggal_harian']) . "' ";
			//				$param .= " or to_char( ic.waktu_masuk, 'yyyy-mm-dd' ) ilike '%" . date2mysql($search['tanggal_harian']) . "' ";
			endif;
		} elseif ($search["periode_laporan"] === "Bulanan" & $search["bulan"] !== "" & $search["tahun"] !== "") {
			$param .= " and to_char( ra.waktu_masuk, 'mm/yyyy' ) ilike '%" . $search["bulan"] . "/" . $search["tahun"] . "' ";
			//			$param .= " or to_char( ic.waktu_masuk, 'mm/yyyy' ) ilike '%" . $search["bulan"] . "/" . $search["tahun"] . "' ";
		} elseif ($search["periode_laporan"] === "Rentang Waktu" & $search["tanggal_awal"] !== "" & $search["tanggal_akhir"] !== "") {
			if ($search["tanggal_awal"] !== "" & $search["tanggal_akhir"] !== "") :
				$param .= " and ra.waktu_masuk BETWEEN '" . date2mysql($search['tanggal_awal']) . " 00:00:00' AND '" . date2mysql($search['tanggal_akhir']) . " 23:59:59'";
			//				$param .= " or ic.waktu_masuk BETWEEN '" . date2mysql($search['tanggal_awal']) . " 00:00:00' AND '" . date2mysql($search['tanggal_akhir']) . " 23:59:59'";
			endif;
		}

		if ($search["tempat_layanan_1"] !== "") :
			$param .= " and sp.nama = '" . $search["tempat_layanan_1"] . "' ";
		endif;

		if ($search["tempat_layanan_2"] !== "") :
			$layanan = $this->db->select('id')->from('sm_bangsal')->where('nama', $search["tempat_layanan_2"])->get()->row();
			$param .= " and ra.id_bangsal = '" . $layanan->id . "' ";
		//			$param .= " and b2.nama = '" . $search["tempat_layanan_2"] . "' ";
		endif;

		if ($search["penjamin"] !== "") :
			$param .= " and lp.id_penjamin = '" . $search["penjamin"] . "' ";
		endif;

		if ($search["kunjungan"] !== "") :
			$param .= " and pd.status = '" . $search["kunjungan"] . "' ";
		endif;

		if ($search["jenis_rawat"] === "1") {
			$param .= " and lp.jenis_layanan IN ('Poliklinik', 'Forensik', 'Pemulasaran Jenazah', 'Hemodialisa', 'Medical Check Up') ";
		} elseif ($search["jenis_rawat"] === "2") {
			//			$param .= " and lp.jenis_layanan = 'Rawat Inap' ";
		} elseif ($search["jenis_rawat"] === "3") {
			$param .= " and lp.jenis_layanan = 'IGD' ";
		} elseif ($search["jenis_rawat"] === "4") {
			$param .= " and lp.jenis_layanan IN ('Laboratorium', 'Radiologi', 'Hemodialisa') ";
		}

		$query      = "";
		$limitation = "";
		if ($limit !== 0) :
			$limitation = " limit " . $limit . " offset " . $start;
		endif;

		$select = " select distinct ON (p.id) pd.id,
        lp.id as id_layanan_pendaftaran,
		pd.id_pasien,
		concat_ws(' ', coalesce(p.status_pasien), p.nama, '') as nama,
		pd.status AS kunjungan,
		P.nama AS nama_pasien,
		P.alamat,
		P.nama_kec,
		concat(date_part('year'::text, age(p.tanggal_lahir::timestamp with time zone)), ' thn ', date_part('month'::text, age(p.tanggal_lahir::timestamp with time zone)), ' bln ', date_part('day'::text, age(p.tanggal_lahir::timestamp with time zone)), ' hari') AS umur,
		P.kelamin,
		pj.nama AS penjamin,
		pd.jenis_pendaftaran as asal_kunjungan,
		kl.nama AS kelas,
		b.nama AS bangsal,
		ra.waktu_masuk AS tgl_MRS,
		lp.tindak_lanjut AS cara_keluar,
		pg.nama AS dokter_dpjp ";

		$count = "select count(*) as count from (select pd.ID, pd.* ";
		$sql   = "from sm_layanan_pendaftaran as lp
		join sm_pendaftaran as pd on (lp.id_pendaftaran = pd.id)
		join sm_pasien as p on (p.id = pd.id_pasien)
		left join sm_penjamin as pj on (pj.id = pd.id_penjamin)
		left join sm_unit as un on (un.id = lp.id_unit_layanan)
		left join sm_rawat_inap as ra on (ra.id_layanan_pendaftaran = lp.id)
		left join sm_order_rawat_inap as ori on (ori.id_pendaftaran = pd.id)
		left join sm_kelas as kl on (kl.id = ra.id_kelas)
		left join sm_bangsal as b on (b.id = ra.id_bangsal)
		left join sm_spesialisasi as sp on (sp.id = lp.id_unit_layanan)
		left join sm_tenaga_medis as tm on (tm.id = ori.id_dokter_dpjp)
		left join sm_pegawai as pg on pg.id = tm.id_pegawai
						
		WHERE lp.jenis_layanan = 'Rawat Inap' 
		 and lp.tindak_lanjut is null $param ";

		$order = " order by p.id, pd.id, pd.id_pasien, kunjungan, nama_pasien, p.alamat, umur, p.kelamin, penjamin, bangsal, dokter_dpjp, pd.jenis_igd ";

		$query = $this->db->query($select . $sql . $order . $limitation)->result();

		$periode = "";
		if ($search["periode_laporan"] === "Bulanan") {
			if ($search["bulan"] == '01') {
				$periode = "Januari " . $search["tahun"];
			} elseif ($search["bulan"] == '02') {
				$periode = "Februari " . $search["tahun"];
			} elseif ($search["bulan"] == '03') {
				$periode = "Maret " . $search["tahun"];
			} elseif ($search["bulan"] == '04') {
				$periode = "April " . $search["tahun"];
			} elseif ($search["bulan"] == '05') {
				$periode = "Mei " . $search["tahun"];
			} elseif ($search["bulan"] == '06') {
				$periode = "Juni " . $search["tahun"];
			} elseif ($search["bulan"] == '07') {
				$periode = "Juli " . $search["tahun"];
			} elseif ($search["bulan"] == '08') {
				$periode = "Agustus " . $search["tahun"];
			} elseif ($search["bulan"] == '09') {
				$periode = "September " . $search["tahun"];
			} elseif ($search["bulan"] == '10') {
				$periode = "Oktober " . $search["tahun"];
			} elseif ($search["bulan"] == '11') {
				$periode = "November " . $search["tahun"];
			} elseif ($search["bulan"] == '12') {
				$periode = "Desember " . $search["tahun"];
			}
		} elseif ($search["periode_laporan"] === "Harian") {
			$periode = get_date_format(date2mysql($search['tanggal_harian']));
		} elseif ($search["periode_laporan"] === "Rentang Waktu") {
			$periode = get_date_format(date2mysql($search['tanggal_awal'])) . " s.d " . get_date_format(date2mysql($search['tanggal_akhir']));
		}

		// append diagnosa
		foreach ($query as $value) {
			$value->diagnosa_data = $this->getDiagnosaListLaporanByIdLayananPendaftaran($value->id);
		}

		$data["periode"] = $periode;
		$data["data"]    = $query;
		$data["jumlah"]  = $this->db->query($count . $sql . ") as jml")->row()->count;
		$this->db->close();

		return $data;
	}

	function getListDataLaporanRM05($limit, $start, $search)
	{
		$param = "";
		if ($search["periode_laporan"] === "Harian") {
			if ($search["tanggal_harian"] !== "") :
				$param .= " and to_char( pd.tanggal_daftar, 'yyyy-mm-dd' ) ilike '%" . date2mysql($search['tanggal_harian']) . "' ";
			endif;
		} elseif ($search["periode_laporan"] === "Bulanan" & $search["bulan"] !== "" & $search["tahun"] !== "") {
			$param .= " and to_char( pd.tanggal_daftar, 'mm/yyyy' ) ilike '%" . $search["bulan"] . "/" . $search["tahun"] . "' ";
		} elseif ($search["periode_laporan"] === "Rentang Waktu" & $search["tanggal_awal"] !== "" & $search["tanggal_akhir"] !== "") {
			if ($search["tanggal_awal"] !== "" & $search["tanggal_akhir"] !== "") :
				$param .= " and pd.tanggal_daftar BETWEEN '" . date2mysql($search['tanggal_awal']) . " 00:00:00' AND '" . date2mysql($search['tanggal_akhir']) . " 23:59:59'";
			endif;
		}

		if ($search["tempat_layanan_1"] !== "") :
			$param .= " and sp.nama = '" . $search["tempat_layanan_1"] . "' ";
		endif;

		if ($search["tempat_layanan_1"] !== "") :
			$param .= " and sp.nama = '" . $search["tempat_layanan_1"] . "' ";
		endif;

		if ($search["penjamin"] !== "") :
			$param .= " and lp.id_penjamin = '" . $search["penjamin"] . "' ";
		endif;

		if ($search["kunjungan"] !== "") :
			$param .= " and pd.status = '" . $search["kunjungan"] . "' ";
		endif;

		if ($search["jenis_rawat"] === "1") {
			$param .= " and lp.jenis_layanan IN ('Poliklinik', 'Forensik', 'Pemulasaran Jenazah', 'Hemodialisa', 'Medical Check Up') ";
		} elseif ($search["jenis_rawat"] === "2") {
			$param .= " and lp.jenis_layanan IN ('Rawat Inap', 'Intensive Care') ";
		} elseif ($search["jenis_rawat"] === "3") {
			$param .= " and lp.jenis_layanan = 'IGD' ";
		} elseif ($search["jenis_rawat"] === "4") {
			$param .= " and lp.jenis_layanan IN ('Laboratorium', 'Radiologi', 'Hemodialisa') ";
		}

		$query      = "";
		$limitation = "";
		if ($limit !== 0) :
			$limitation = " limit " . $limit . " offset " . $start;
		endif;

		$select = " SELECT pd.ID,
        lp.id as id_layanan_pendaftaran,
        pd.status as kunjungan,
		pd.tanggal_daftar,
		pd.id_pasien,
		P.nama AS nama_pasien,
		pj.nama AS penjamin,
		case when sp.nama is null then pd.keterangan else sp.nama end AS unit_pelayanan,
		pg.nama AS nama_dokter,
		P.kelamin,
		concat (
			EXTRACT ( YEAR FROM AGE( P.tanggal_lahir ) ),
			' thn ',
			EXTRACT ( MONTH FROM AGE( P.tanggal_lahir ) ),
			' bln ',
			EXTRACT ( DAY FROM AGE( P.tanggal_lahir ) ),
			' hari' 
		) AS umur,
		P.alamat,
		P.nama_kec,
		pd.tanggal_keluar AS tgl_keluar  ";
		$count  = "select count(*) as count from (select pd.id ";
		$sql    = "FROM sm_pasien P 
		JOIN sm_pendaftaran AS pd ON ( pd.id_pasien = P.ID ) 
		LEFT JOIN sm_penjamin AS pj ON ( pj.ID = pd.id_penjamin )
		JOIN sm_layanan_pendaftaran AS lp ON ( lp.id_pendaftaran = pd.ID )
		LEFT JOIN sm_rawat_inap AS ra ON ( ra.id_layanan_pendaftaran = lp.ID )
		LEFT JOIN sm_kelas AS kl ON ( kl.ID = ra.id_kelas )
		LEFT JOIN sm_bangsal AS b ON ( b.ID = ra.id_bangsal )
		LEFT JOIN sm_spesialisasi AS sp ON ( sp.ID = lp.id_unit_layanan )
		LEFT JOIN sm_tenaga_medis AS tm ON ( tm.ID = lp.id_dokter )
		LEFT JOIN sm_pegawai AS pg ON ( pg.ID = tm.id_pegawai )
		LEFT JOIN sm_diagnosa AS d ON ( d.id_layanan_pendaftaran = lp.ID )
		LEFT JOIN sm_golongan_sebab_sakit AS gs ON ( gs.ID = d.id_golongan_sebab_sakit )

		where lp.id is not null AND pd.status != 'Batal' 
		and gs.kode_icdx_rinci in (
		    'G40.A09',
		    'A09',
		    'A91',
		    'T50.A91',
		    'J18',
		    'J18.9',
		    'E46',
		    'E45',
		    'E44',
		    'E43',
		    'E42',
		    'E41',
		    'E40',
		    'B50',
		    'A15.0'
		)  $param 
		
		GROUP BY lp.id, pd.ID, lp.cara_bayar, pd.id_pasien, pd.tanggal_daftar, p.nama, pj.nama, pd.keterangan, sp.nama, pg.nama, pd.status, P.kelamin, pd.tanggal_keluar, P.tanggal_lahir, P.alamat, P.nama_kec ";

		$order = " order by pd.id desc, pd.id, pd.tanggal_daftar desc ";

		$query = $this->db->query($select . $sql . $order . $limitation)->result();

		$periode = "";
		if ($search["periode_laporan"] === "Bulanan") {
			if ($search["bulan"] == '01') {
				$periode = "Januari " . $search["tahun"];
			} elseif ($search["bulan"] == '02') {
				$periode = "Februari " . $search["tahun"];
			} elseif ($search["bulan"] == '03') {
				$periode = "Maret " . $search["tahun"];
			} elseif ($search["bulan"] == '04') {
				$periode = "April " . $search["tahun"];
			} elseif ($search["bulan"] == '05') {
				$periode = "Mei " . $search["tahun"];
			} elseif ($search["bulan"] == '06') {
				$periode = "Juni " . $search["tahun"];
			} elseif ($search["bulan"] == '07') {
				$periode = "Juli " . $search["tahun"];
			} elseif ($search["bulan"] == '08') {
				$periode = "Agustus " . $search["tahun"];
			} elseif ($search["bulan"] == '09') {
				$periode = "September " . $search["tahun"];
			} elseif ($search["bulan"] == '10') {
				$periode = "Oktober " . $search["tahun"];
			} elseif ($search["bulan"] == '11') {
				$periode = "November " . $search["tahun"];
			} elseif ($search["bulan"] == '12') {
				$periode = "Desember " . $search["tahun"];
			}
		} elseif ($search["periode_laporan"] === "Harian") {
			$periode = get_date_format(date2mysql($search['tanggal_harian']));
		} elseif ($search["periode_laporan"] === "Rentang Waktu") {
			$periode = get_date_format(date2mysql($search['tanggal_awal'])) . " s.d " . get_date_format(date2mysql($search['tanggal_akhir']));
		}

		// append diagnosa
		foreach ($query as $value) {
			$value->diagnosa_data = $this->getDiagnosaListLaporanByIdLayananPendaftaran05($value->id_layanan_pendaftaran);
		}

		$data["periode"] = $periode;
		$data["data"]    = $query;
		$data["jumlah"]  = $this->db->query($count . $sql . ") as jml")->row()->count;
		$this->db->close();

		return $data;
	}

	function getDiagnosaListLaporanByIdLayananPendaftaran05($id_layanan_pendaftaran)
	{
		$sql = "select
				concat(concat(case when gs2.kode_icdx_rinci is null then '' else ' [' end, gs2.kode_icdx_rinci, gs3.kode_icdx_rinci, case when gs2.kode_icdx_rinci is null then '' else '] ' end), case when d.id_golongan_sebab_sakit is not null then gs.nama else d.golongan_sebab_sakit_lain end) AS ICDX_diagnosa,
				d.prioritas,
				d.diagnosa_akhir,
				case when d.jenis_kasus = '1' then 'Baru' else 'Lama' end AS kasus
				FROM sm_pasien P
				JOIN sm_pendaftaran AS pd ON ( pd.id_pasien = P.ID )
				JOIN sm_layanan_pendaftaran AS lp ON ( lp.id_pendaftaran = pd.ID )
				LEFT JOIN sm_diagnosa AS d ON ( d.id_layanan_pendaftaran = lp.ID )
				LEFT JOIN sm_golongan_sebab_sakit AS gs ON ( gs.ID = d.id_golongan_sebab_sakit )
				LEFT JOIN sm_golongan_sebab_sakit AS gs2 ON ( gs2.ID = d.id_pengkodean )
				LEFT JOIN sm_golongan_sebab_sakit AS gs3 ON ( gs3.ID = d.id_pengkodean_asterik )
				WHERE lp.id = $id_layanan_pendaftaran
				and gs.kode_icdx_rinci in (
				    'G40.A09',
				    'A09',
				    'A91',
				    'T50.A91',
				    'J18',
				    'J18.9',
				    'E46',
				    'E45',
				    'E44',
				    'E43',
				    'E42',
				    'E41',
				    'E40',
				    'B50',
				    'A15.0'
				)
				";

		return $this->db->query($sql)->result();
	}

	function getListDataLaporanPerUnitPelayananRM06($search)
	{
		$param = "";
		if ($search["periode_laporan"] === "Harian") {
			if ($search["tanggal_harian"] !== "") :
				$param .= " and to_char( pd.tanggal_daftar, 'yyyy-mm-dd' ) ilike '%" . date2mysql($search['tanggal_harian']) . "' ";
			endif;
		} elseif ($search["periode_laporan"] === "Bulanan" & $search["bulan"] !== "" & $search["tahun"] !== "") {
			$param .= " and to_char( pd.tanggal_daftar, 'mm/yyyy' ) ilike '%" . $search["bulan"] . "/" . $search["tahun"] . "' ";
		} elseif ($search["periode_laporan"] === "Rentang Waktu" & $search["tanggal_awal"] !== "" & $search["tanggal_akhir"] !== "") {
			if ($search["tanggal_awal"] !== "" & $search["tanggal_akhir"] !== "") :
				$param .= " and pd.tanggal_daftar BETWEEN '" . date2mysql($search['tanggal_awal']) . " 00:00:00' AND '" . date2mysql($search['tanggal_akhir']) . " 23:59:59'";
			endif;
		}

		if ($search["tempat_layanan_1"] !== "") :
			$param .= " and sp.nama = '" . $search["tempat_layanan_1"] . "' ";
		endif;

		if ($search["tempat_layanan_2"] !== "") :
			$param .= " and b.nama = '" . $search["tempat_layanan_2"] . "' ";
		endif;

		if ($search["tempat_layanan_3"] !== "") :
			if ($search["tempat_layanan_3"] === 'Patologi Anatomi' || $search["tempat_layanan_3"] === 'Patologi Klinik' || $search["tempat_layanan_3"] === 'Patologi Mikrobiologi') {
				$param .= " and lab.jenis = '" . $search["tempat_layanan_3"] . "' ";
			}
			if ($search["tempat_layanan_3"] === 'Hemodialisa') {
				$param .= " and hd.id is not null ";
			}
			if ($search["tempat_layanan_3"] === 'Radiologi') {
				$param .= " and rad.jenis = '" . $search["tempat_layanan_3"] . "' ";
			}
		endif;

		if ($search["penjamin"] !== "") :
			$param .= " and lp.id_penjamin = '" . $search["penjamin"] . "' ";
		endif;

		if ($search["kunjungan"] !== "") :
			$param .= " and pd.status = '" . $search["kunjungan"] . "' ";
		endif;

		if ($search["jenis_rawat"] === "1") {
			$param .= " and lp.jenis_layanan IN ('Poliklinik', 'Medical Check Up') ";
		} elseif ($search["jenis_rawat"] === "2") {
			$param .= " and lp.jenis_layanan IN ('Rawat Inap', 'Intensive Care') ";
		} elseif ($search["jenis_rawat"] === "3") {
			$param .= " and lp.jenis_layanan = 'IGD' ";
		} elseif ($search["jenis_rawat"] === "4") {
			$param .= " and lp.jenis_layanan IN ('Laboratorium', 'Radiologi', 'Hemodialisa') ";
		}

		$select = " SELECT pj.nama AS penjamin,
        count(pj.nama) as total_penjamin ";
		$count  = "select count(*) as count from (select pj.nama ";
		$sql    = "FROM sm_pasien P 
		JOIN sm_pendaftaran AS pd ON ( pd.id_pasien = P.ID ) 
		JOIN sm_penjamin AS pj ON ( pj.ID = pd.id_penjamin )
		JOIN sm_layanan_pendaftaran AS lp ON ( lp.id_pendaftaran = pd.ID )
		LEFT JOIN sm_spesialisasi AS sp ON ( sp.ID = lp.id_unit_layanan )
		
		where lp.id is not null AND pd.status != 'Batal' " . $param . " 
						
		GROUP BY pj.nama ";

		$order = " order by pj.nama  ";

		$query          = $this->db->query($select . $sql . $order)->result();
		$data["data"]   = $query;
		$data["jumlah"] = $this->db->query($count . $sql . ") as jml")->row()->count;
		$this->db->close();

		return $data;
	}

	function getListDataLaporanPerWilayahRM06($limit, $start, $search)
	{
		$param = "";
		if ($search["periode_laporan"] === "Harian") {
			if ($search["tanggal_harian"] !== "") :
				$param .= " and to_char( pd.tanggal_daftar, 'yyyy-mm-dd' ) ilike '%" . date2mysql($search['tanggal_harian']) . "' ";
			endif;
		} elseif ($search["periode_laporan"] === "Bulanan" & $search["bulan"] !== "" & $search["tahun"] !== "") {
			$param .= " and to_char( pd.tanggal_daftar, 'mm/yyyy' ) ilike '%" . $search["bulan"] . "/" . $search["tahun"] . "' ";
		} elseif ($search["periode_laporan"] === "Rentang Waktu" & $search["tanggal_awal"] !== "" & $search["tanggal_akhir"] !== "") {
			if ($search["tanggal_awal"] !== "" & $search["tanggal_akhir"] !== "") :
				$param .= " and pd.tanggal_daftar BETWEEN '" . date2mysql($search['tanggal_awal']) . " 00:00:00' AND '" . date2mysql($search['tanggal_akhir']) . " 23:59:59'";
			endif;
		}

		if ($search["tempat_layanan_1"] !== "") :
			$param .= " and sp.nama = '" . $search["tempat_layanan_1"] . "' ";
		endif;

		if ($search["tempat_layanan_1"] !== "") :
			$param .= " and sp.nama = '" . $search["tempat_layanan_1"] . "' ";
		endif;

		if ($search["penjamin"] !== "") :
			$param .= " and lp.id_penjamin = '" . $search["penjamin"] . "' ";
		endif;

		if ($search["kunjungan"] !== "") :
			$param .= " and pd.status = '" . $search["kunjungan"] . "' ";
		endif;

		if ($search["jenis_rawat"] === "1") {
			$param .= " and lp.jenis_layanan IN ('Poliklinik', 'Medical Check Up') ";
		} elseif ($search["jenis_rawat"] === "2") {
			$param .= " and lp.jenis_layanan IN ('Rawat Inap', 'Intensive Care') ";
		} elseif ($search["jenis_rawat"] === "3") {
			$param .= " and lp.jenis_layanan = 'IGD' ";
		} elseif ($search["jenis_rawat"] === "4") {
			$param .= " and lp.jenis_layanan IN ('Laboratorium', 'Radiologi', 'Hemodialisa') ";
		}

		$query      = "";
		$limitation = "";
		if ($limit !== 0) :
			$limitation = " limit " . $limit . " offset " . $start;
		endif;

		$select = " SELECT p.nama_kec, count(*) as total_wilayah ";
		$count  = "select count(*) as count from (select p.nama_kec ";
		$sql    = "FROM sm_pasien P 
		JOIN sm_pendaftaran AS pd ON ( pd.id_pasien = P.ID ) 
		JOIN sm_penjamin AS pj ON ( pj.ID = pd.id_penjamin )
		JOIN sm_layanan_pendaftaran AS lp ON ( lp.id_pendaftaran = pd.ID )
		LEFT JOIN sm_spesialisasi AS sp ON ( sp.ID = lp.id_unit_layanan )
		
		where lp.id is not null AND pd.status != 'Batal' AND pd.domisili = 1 " . $param . " 
						
		GROUP BY p.nama_kec ";

		$sqlCountLuarKotaTangerang = "select count(*) as total_wilayah 
									from sm_pendaftaran as pd 
									join sm_layanan_pendaftaran as lp on lp.id_pendaftaran = pd.id
									join sm_penjamin as pj on pj.id = pd.id_penjamin
									LEFT JOIN sm_spesialisasi AS sp ON ( sp.ID = lp.id_unit_layanan )
									where lp.id is not null AND pd.status != 'Batal' AND pd.domisili = 2 $param";

		$order = " order by p.nama_kec  ";

		$query = $this->db->query($select . $sql . $order . $limitation)->result();

		$query[] = $this->db->query($sqlCountLuarKotaTangerang)->row();

		$data["data"]   = $query;
		$data["jumlah"] = $this->db->query($count . $sql . ") as jml")->row()->count;
		$this->db->close();

		return $data;
	}

	function getListDataDokterLaporan06($limit, $start, $search)
	{
		$param1 = "";
		$param2 = "";
		if ($search["periode_laporan"] === "Harian") {
			if ($search["tanggal_harian"] !== "") :
				$param2 .= " and to_char( pd.tanggal_daftar, 'yyyy-mm-dd' ) ilike '%" . date2mysql($search['tanggal_harian']) . "' ";
			endif;
		} elseif ($search["periode_laporan"] === "Bulanan" & $search["bulan"] !== "" & $search["tahun"] !== "") {
			$param2 .= " and to_char(pd.tanggal_daftar, 'YYYY-MM'::text) = '" . $search["tahun"] . "-" . $search["bulan"] . "' ";
		} elseif ($search["periode_laporan"] === "Rentang Waktu" & $search["tanggal_awal"] !== "" & $search["tanggal_akhir"] !== "") {
			if ($search["tanggal_awal"] !== "" & $search["tanggal_akhir"] !== "") :
				$param2 .= " and pd.tanggal_daftar BETWEEN '" . date2mysql($search['tanggal_awal']) . " 00:00:00' AND '" . date2mysql($search['tanggal_akhir']) . " 23:59:59'";
			endif;
		}

		if ($search["tempat_layanan_1"] !== "") :
			$param1 .= " and sp.nama = '" . $search["tempat_layanan_1"] . "' ";
		endif;

		if ($search["penjamin"] !== "") :
			$param2 .= " and lp.id_penjamin = '" . $search["penjamin"] . "' ";
		endif;

		if ($search["kunjungan"] !== "") :
			$param2 .= " and pd.status = '" . $search["kunjungan"] . "' ";
		endif;

		if (!empty($search["dokter_search"])) {
			$param2 .= " and tm.id = '" . $search["dokter_search"] . "' ";
		}

		if ($search["jenis_rawat"] === "1") {
			$param2 .= " and lp.jenis_layanan IN ('Poliklinik', 'Medical Check Up') ";
		} elseif ($search["jenis_rawat"] === "2") {
			$param2 .= " and lp.jenis_layanan IN ('Rawat Inap', 'Intensive Care') ";
		} elseif ($search["jenis_rawat"] === "3") {
			$param2 .= " and lp.jenis_layanan = 'IGD' ";
		} elseif ($search["jenis_rawat"] === "4") {
			$param2 .= " and lp.jenis_layanan IN ('Laboratorium', 'Radiologi', 'Hemodialisa') ";
		}

		$limitation = "";
		if ($limit !== 0) :
			$limitation = " limit " . $limit . " offset " . $start;
		endif;

		$sql = "select query.nama, query.data_dokter
				from (select sp.nama, json_agg(data_penjamin.*) as data_dokter
					   from sm_spesialisasi as sp
                       join (select lp.id_unit_layanan, pg.nama as nama_dokter,
                             count(case when pj.nama = 'BPJS' then pj.nama end)                   as bpjs,
                             count(case when pj.nama = 'BPJS Ketenagakerjaan' then pj.nama end)   as bpjs_ketenagakerjaan,
                             count(case when pj.nama = 'Tunai' then pj.nama end)                  as umum,
                             count(case when pj.nama = 'Jaminan Covid Kemenkes' then pj.nama end) as jaminan_covid_kemenkes,
                             count(case when pj.nama = 'JPKMKT' then pj.nama end)                 as jpkmkt,
                             count(case when pj.nama = 'Jasa Raharja' then pj.nama end)           as jasa_raharja,
                             count(case when pj.nama = 'TASPEN' then pj.nama end)                 as taspen,
                             count(case when pj.nama = 'DP3AP2KB' then pj.nama end)               as dp3ap2kb,
                             count(case when pj.nama = 'Global Fund' then pj.nama end)            as global_fund,
                             count(case when pj.nama = 'Keluarga Karyawan' then pj.nama end)      as keluarga_karyawan,
                             count(case when pj.nama = 'Gratis' then pj.nama end)                 as gratis,
                             count(case when pj.nama = 'Charity Rumah Sakit' then pj.nama end)    as crm,
                             count(case when pj.nama = 'Penunggu Pasien' then pj.nama end)        as penunggu_pasien,
                             count(case when pj.nama = 'Jamkesmas' then pj.nama end)              as jamkesmas,
                             count(case when pj.nama = 'RS BUNDA SEJATI' then pj.nama end)        as rbs,
                             count(case when pj.nama = 'Jaminan Kesehatan RSUD' then pj.nama end) as jkr
	                         from sm_pasien p
	                         JOIN sm_pendaftaran AS pd ON (pd.id_pasien = P.ID)
	                         JOIN sm_layanan_pendaftaran AS lp ON (lp.id_pendaftaran = pd.ID)
	                         JOIN sm_penjamin AS pj ON (pj.ID = pd.id_penjamin)
	                         JOIN sm_tenaga_medis AS tm ON (tm.ID = lp.id_dokter)
	                         JOIN sm_pegawai AS pg ON (pg.ID = tm.id_pegawai)
			                 where pd.status != 'Batal' $param2
							 and lp.jenis_layanan IN ('Poliklinik', 'Medical Check Up') 
			                 group by lp.id_unit_layanan, pg.nama) as data_penjamin
					   on sp.id = data_penjamin.id_unit_layanan
					   and sp.is_klinik = '1' $param1
					   group by sp.nama) as query";


		$data["data"]   = $this->db->query($sql . $limitation)->result();
		$data["jumlah"] = $this->db->query($sql)->num_rows();

		return $data;
	}

	function getListDataTotalDokterLaporan06($limit, $start, $search)
	{
		$param1 = "";
		$param2 = "";
		if ($search["periode_laporan"] === "Harian") {
			if ($search["tanggal_harian"] !== "") :
				$param2 .= " and to_char( pd.tanggal_daftar, 'yyyy-mm-dd' ) ilike '%" . date2mysql($search['tanggal_harian']) . "' ";
			endif;
		} elseif ($search["periode_laporan"] === "Bulanan" & $search["bulan"] !== "" & $search["tahun"] !== "") {
			$param2 .= " and to_char(pd.tanggal_daftar, 'YYYY-MM'::text) = '" . $search["tahun"] . "-" . $search["bulan"] . "' ";
		} elseif ($search["periode_laporan"] === "Rentang Waktu" & $search["tanggal_awal"] !== "" & $search["tanggal_akhir"] !== "") {
			if ($search["tanggal_awal"] !== "" & $search["tanggal_akhir"] !== "") :
				$param2 .= " and pd.tanggal_daftar BETWEEN '" . date2mysql($search['tanggal_awal']) . " 00:00:00' AND '" . date2mysql($search['tanggal_akhir']) . " 23:59:59'";
			endif;
		}

		if ($search["tempat_layanan_1"] !== "") :
			$param1 .= " and sp.nama = '" . $search["tempat_layanan_1"] . "' ";
		endif;

		if ($search["penjamin"] !== "") :
			$param2 .= " and lp.id_penjamin = '" . $search["penjamin"] . "' ";
		endif;

		if ($search["kunjungan"] !== "") :
			$param2 .= " and pd.status = '" . $search["kunjungan"] . "' ";
		endif;

		if (!empty($search["dokter_search"])) {
			$param2 .= " and tm.id = '" . $search["dokter_search"] . "' ";
		}

		if ($search["jenis_rawat"] === "1") {
			$param2 .= " and lp.jenis_layanan IN ('Poliklinik', 'Medical Check Up') ";
		} elseif ($search["jenis_rawat"] === "2") {
			$param2 .= " and lp.jenis_layanan IN ('Rawat Inap', 'Intensive Care') ";
		} elseif ($search["jenis_rawat"] === "3") {
			$param2 .= " and lp.jenis_layanan = 'IGD' ";
		} elseif ($search["jenis_rawat"] === "4") {
			$param2 .= " and lp.jenis_layanan IN ('Laboratorium', 'Radiologi', 'Hemodialisa') ";
		}

		$sql = "
		SELECT sum((e.dokter ->> 'bpjs')::int) as bpjs,
			sum((e.dokter ->> 'bpjs_ketenagakerjaan')::int) as bpjs_ketenagakerjaan,
				sum((e.dokter ->> 'umum')::int) as umum,
				sum((e.dokter ->> 'jaminan_covid_kemenkes')::int) as jaminan_covid_kemenkes,
					sum((e.dokter ->> 'jpkmkt')::int) as jpkmkt,
					sum((e.dokter ->> 'jasa_raharja')::int) as jasa_raharja,
					sum((e.dokter ->> 'taspen')::int) as taspen,
					sum((e.dokter ->> 'dp3ap2kb')::int) as dp3ap2kb,
					sum((e.dokter ->> 'global_fund')::int) as global_fund,
					sum((e.dokter ->> 'keluarga_karyawan')::int) as keluarga_karyawan,
					sum((e.dokter ->> 'gratis')::int) as gratis,
					sum((e.dokter ->> 'crm')::int) as crm,
					sum((e.dokter ->> 'penunggu_pasien')::int) as penunggu_pasien,
					sum((e.dokter ->> 'jamkesmas')::int) as jamkesmas,
					sum((e.dokter ->> 'rbs')::int) as rbs,
					sum((e.dokter ->> 'jkr')::int) as jkr
		FROM (select sp.nama, json_agg(data_penjamin.*) as data_dokter
			from sm_spesialisasi as sp
					join (select lp.id_unit_layanan,
									pg.nama                                                              as nama_dokter,
									count(case when pj.nama = 'BPJS' then pj.nama end)                   as bpjs,
									count(case when pj.nama = 'BPJS Ketenagakerjaan' then pj.nama end)   as bpjs_ketenagakerjaan,
									count(case when pj.nama = 'Tunai' then pj.nama end)                  as umum,
									count(case when pj.nama = 'Jaminan Covid Kemenkes' then pj.nama end) as jaminan_covid_kemenkes,
									count(case when pj.nama = 'JPKMKT' then pj.nama end)                 as jpkmkt,
									count(case when pj.nama = 'Jasa Raharja' then pj.nama end)           as jasa_raharja,
									count(case when pj.nama = 'TASPEN' then pj.nama end)                 as taspen,
									count(case when pj.nama = 'DP3AP2KB' then pj.nama end)               as dp3ap2kb,
									count(case when pj.nama = 'Global Fund' then pj.nama end)            as global_fund,
									count(case when pj.nama = 'Keluarga Karyawan' then pj.nama end)      as keluarga_karyawan,
									count(case when pj.nama = 'Gratis' then pj.nama end)                 as gratis,
									count(case when pj.nama = 'Charity Rumah Sakit' then pj.nama end)    as crm,
									count(case when pj.nama = 'Penunggu Pasien' then pj.nama end)        as penunggu_pasien,
									count(case when pj.nama = 'Jamkesmas' then pj.nama end)              as jamkesmas,
									count(case when pj.nama = 'RS BUNDA SEJATI' then pj.nama end)        as rbs,
									count(case when pj.nama = 'Jaminan Kesehatan RSUD' then pj.nama end) as jkr
							from sm_pasien p
									JOIN sm_pendaftaran AS pd ON (pd.id_pasien = P.ID)
									JOIN sm_layanan_pendaftaran AS lp ON (lp.id_pendaftaran = pd.ID)
									JOIN sm_penjamin AS pj ON (pj.ID = pd.id_penjamin)
									JOIN sm_tenaga_medis AS tm ON (tm.ID = lp.id_dokter)
									JOIN sm_pegawai AS pg ON (pg.ID = tm.id_pegawai)
							where pd.status != 'Batal' $param2
							group by lp.id_unit_layanan, pg.nama) as data_penjamin
							on sp.id = data_penjamin.id_unit_layanan and sp.is_klinik = '1' $param1
			group by sp.nama) as query
		join lateral jsonb_array_elements(query.data_dokter::jsonb) as e(dokter) on true
		";

		return $this->db->query($sql)->row();
	}

	function getListDataLaporanPerSpesialisasiRM07($limit, $start, $search)
	{
		$param = "";
		if ($search["periode_laporan"] === "Harian") {
			if ($search["tanggal_harian"] !== "") :
				$param .= " and to_char( pd.tanggal_daftar, 'yyyy-mm-dd' ) ilike '%" . date2mysql($search['tanggal_harian']) . "' ";
			endif;
		} elseif ($search["periode_laporan"] === "Bulanan" & $search["bulan"] !== "" & $search["tahun"] !== "") {
			$param .= " and to_char( pd.tanggal_daftar, 'mm/yyyy' ) ilike '%" . $search["bulan"] . "/" . $search["tahun"] . "' ";
		} elseif ($search["periode_laporan"] === "Rentang Waktu" & $search["tanggal_awal"] !== "" & $search["tanggal_akhir"] !== "") {
			if ($search["tanggal_awal"] !== "" & $search["tanggal_akhir"] !== "") :
				$param .= " and pd.tanggal_daftar BETWEEN '" . date2mysql($search['tanggal_awal']) . " 00:00:00' AND '" . date2mysql($search['tanggal_akhir']) . " 23:59:59'";
			endif;
		}

		if ($search["tempat_layanan_1"] !== "") :
			$param .= " and sp.nama = '" . $search["tempat_layanan_1"] . "' ";
		endif;

		if ($search["tempat_layanan_1"] !== "") :
			$param .= " and sp.nama = '" . $search["tempat_layanan_1"] . "' ";
		endif;

		if ($search["penjamin"] !== "") :
			$param .= " and lp.id_penjamin = '" . $search["penjamin"] . "' ";
		endif;

		if ($search["kunjungan"] !== "") :
			$param .= " and pd.status = '" . $search["kunjungan"] . "' ";
		endif;

		if ($search["jenis_rawat"] === "1") {
			$param .= " and lp.jenis_layanan IN ('Poliklinik', 'Medical Check Up') ";
		} elseif ($search["jenis_rawat"] === "2") {
			$param .= " and lp.jenis_layanan IN ('Rawat Inap', 'Intensive Care') ";
		} elseif ($search["jenis_rawat"] === "3") {
			$param .= " and lp.jenis_layanan = 'IGD' ";
		} elseif ($search["jenis_rawat"] === "4") {
			$param .= " and lp.jenis_layanan IN ('Laboratorium', 'Radiologi', 'Hemodialisa') ";
		}

		$query      = "";
		$limitation = "";
		if ($limit !== 0) :
			$limitation = " limit " . $limit . " offset " . $start;
		endif;

		$select = " select
	    sp.nama as spesialisasi,
	    count(sp.nama) as total_spesialisasi ";
		$count  = "select count(*) as count from (select sp.nama ";
		$sql    = "FROM sm_pasien P 
		JOIN sm_pendaftaran AS pd ON ( pd.id_pasien = P.ID ) 
		JOIN sm_layanan_pendaftaran AS lp ON ( lp.id_pendaftaran = pd.ID )
		JOIN sm_spesialisasi AS sp ON ( sp.ID = lp.id_unit_layanan )
		
		where lp.id is not null AND pd.status != 'Batal' " . $param . " 
		
		GROUP BY sp.nama ";

		$order = " order by sp.nama  ";

		$query = $this->db->query($select . $sql . $order . $limitation)->result();

		$data["data"]   = $query;
		$data["jumlah"] = $this->db->query($count . $sql . ") as jml")->row()->count;
		$this->db->close();

		return $data;
	}

	function getListDataLaporanPerDokterRM07($limit, $start, $search)
	{
		$param1 = "";
		$param2 = "";
		if ($search["periode_laporan"] === "Harian") {
			if ($search["tanggal_harian"] !== "") :
				$param2 .= " and to_char( pd.tanggal_daftar, 'yyyy-mm-dd' ) ilike '%" . date2mysql($search['tanggal_harian']) . "' ";
			endif;
		} elseif ($search["periode_laporan"] === "Bulanan" & $search["bulan"] !== "" & $search["tahun"] !== "") {
			$param2 .= " and to_char( pd.tanggal_daftar, 'mm/yyyy' ) ilike '%" . $search["bulan"] . "/" . $search["tahun"] . "' ";
		} elseif ($search["periode_laporan"] === "Rentang Waktu" & $search["tanggal_awal"] !== "" & $search["tanggal_akhir"] !== "") {
			if ($search["tanggal_awal"] !== "" & $search["tanggal_akhir"] !== "") :
				$param2 .= " and pd.tanggal_daftar BETWEEN '" . date2mysql($search['tanggal_awal']) . " 00:00:00' AND '" . date2mysql($search['tanggal_akhir']) . " 23:59:59'";
			endif;
		}

		if ($search["tempat_layanan_1"] !== "") :
			$param1 .= " and sp.nama = '" . $search["tempat_layanan_1"] . "' ";
		endif;

		if ($search["tempat_layanan_1"] !== "") :
			$param1 .= " and sp.nama = '" . $search["tempat_layanan_1"] . "' ";
		endif;

		if ($search["penjamin"] !== "") :
			$param2 .= " and lp.id_penjamin = '" . $search["penjamin"] . "' ";
		endif;

		if ($search["kunjungan"] !== "") :
			$param2 .= " and pd.status = '" . $search["kunjungan"] . "' ";
		endif;

		if ($search["jenis_rawat"] === "1") {
			$param2 .= " and lp.jenis_layanan IN ('Poliklinik', 'Medical Check Up') ";
		} elseif ($search["jenis_rawat"] === "2") {
			$param2 .= " and lp.jenis_layanan IN ('Rawat Inap', 'Intensive Care') ";
		} elseif ($search["jenis_rawat"] === "3") {
			$param2 .= " and lp.jenis_layanan = 'IGD' ";
		} elseif ($search["jenis_rawat"] === "4") {
			$param2 .= " and lp.jenis_layanan IN ('Laboratorium', 'Radiologi', 'Hemodialisa') ";
		}

		if (!empty($search["dokter_search"])) {
			$param2 .= " and tm.id = '" . $search["dokter_search"] . "' ";
		}

		$limitation = "";
		if ($limit !== 0) :
			$limitation = " limit " . $limit . " offset " . $start;
		endif;

		$sql          = "SELECT sp.nama, json_agg(json_build_object('nama_dokter', pg.nama, 'total_pasien', total_pasien)) AS data_dokter
						FROM sm_spesialisasi AS sp
						JOIN (
						    SELECT lp.id_unit_layanan, tm.id_pegawai, COUNT(*) AS total_pasien
						    FROM sm_pendaftaran AS pd
						    JOIN sm_layanan_pendaftaran AS lp ON lp.id_pendaftaran = pd.ID
						    JOIN sm_tenaga_medis AS tm ON tm.ID = lp.id_dokter
						    JOIN sm_pegawai AS pg ON pg.ID = tm.id_pegawai
						    WHERE pd.status != 'Batal' $param2
						    GROUP BY lp.id_unit_layanan, tm.id_pegawai
						) AS data_dokter ON sp.id = data_dokter.id_unit_layanan
						JOIN sm_pegawai AS pg ON pg.ID = data_dokter.id_pegawai
						GROUP BY sp.nama";
		$spesialisasi = $this->db->query($sql . $limitation)->result();

		$data["data"]   = $spesialisasi;
		$data["jumlah"] = $this->db->query($sql)->num_rows();

		return $data;
	}

	function getListWabah($search)
	{
		$param = "";
		if ($search["periode_laporan"] === "Harian") {
			if ($search["tanggal_harian"] !== "") :
				$param .= " and to_char( s.tanggal_daftar, 'yyyy-mm-dd' )  ilike '%" . date2mysql($search['tanggal_harian']) . "' ";
			endif;
		} elseif ($search["periode_laporan"] === "Bulanan" & $search["bulan"] !== "" & $search["tahun"] !== "") {
			$param .= " and to_char( s.tanggal_daftar, 'mm/yyyy' ) ilike '%" . $search["bulan"] . "/" . $search["tahun"] . "' ";
		} elseif ($search["periode_laporan"] === "Rentang Waktu" & $search["tanggal_awal"] !== "" & $search["tanggal_akhir"] !== "") {
			if ($search["tanggal_awal"] !== "" & $search["tanggal_akhir"] !== "") :
				$param .= " and s.tanggal_daftar BETWEEN '" . date2mysql($search['tanggal_awal']) . " 00:00:00' AND '" . date2mysql($search['tanggal_akhir']) . " 23:59:59'";
			endif;
		}

		if ($search["tempat_layanan_1"] !== "") :
			$param .= " and sp.nama = '" . $search["tempat_layanan_1"] . "' ";
		endif;

		if ($search["tempat_layanan_2"] !== "") :
			$param .= " and b.nama = '" . $search["tempat_layanan_2"] . "' ";
		endif;

		if ($search["penjamin"] !== "") :
			$param .= " and slp.id_penjamin = '" . $search["penjamin"] . "' ";
		endif;

		if ($search["kunjungan"] !== "") :
			$param .= " and s.status = '" . $search["kunjungan"] . "' ";
		endif;

		if ($search["jenis_rawat"] === "1") {
			$param .= " and slp.jenis_layanan IN ('Poliklinik', 'Forensik', 'Pemulasaran Jenazah', 'Hemodialisa', 'Medical Check Up') ";
		} elseif ($search["jenis_rawat"] === "2") {
			$param .= " and slp.jenis_layanan IN ('Rawat Inap', 'Intensive Care') ";
		} elseif ($search["jenis_rawat"] === "3") {
			$param .= " and lp.jenis_layanan = 'IGD' ";
		} elseif ($search["jenis_rawat"] === "4") {
			$param .= " and lp.jenis_layanan IN ('Laboratorium', 'Radiologi', 'Hemodialisa') ";
		}

		$sql = "select
				    sp.nama_kec,
				    count(
				        case
				            when sgss.kode_icdx_rinci in('G40.A09', 'A09') and EXTRACT ( YEAR FROM AGE( sp.tanggal_lahir ) ) < 5
				            then sgss.kode_icdx_rinci
				        end
				    ) as diare_under_5,
				    count(
				        case
				            when sgss.kode_icdx_rinci in('G40.A09', 'A09') and EXTRACT ( YEAR FROM AGE( sp.tanggal_lahir ) ) > 5
				            then sgss.kode_icdx_rinci
				        end
				    ) as diare_uper_5,
				    count(
				        case
				            when sgss.kode_icdx_rinci in('A91', 'T50.A91')
				            then sgss.kode_icdx_rinci
				        end
				    ) as dbd,
				    count(
				        case
				            when sgss.kode_icdx_rinci in('J18', 'J18.9') and EXTRACT ( YEAR FROM AGE( sp.tanggal_lahir ) ) < 5
				            then sgss.kode_icdx_rinci
				        end
				    ) as pneumonia_under_5,
				    count(
				        case
				            when sgss.kode_icdx_rinci in('J18', 'J18.9') and EXTRACT ( YEAR FROM AGE( sp.tanggal_lahir ) ) > 5
				            then sgss.kode_icdx_rinci
				        end
				    ) as pneumonia_upper_5,
				    count(
				        case
				            when sgss.kode_icdx_rinci in('E46','E45','E44','E43','E42','E41','E40')
				            then sgss.kode_icdx_rinci
				        end
				    ) as gizi_buruk,
				    count(
				        case
				            when sgss.kode_icdx_rinci = 'B05' and EXTRACT ( YEAR FROM AGE( sp.tanggal_lahir ) ) < 5
				            then sgss.kode_icdx_rinci
				        end
				    ) as campak_under_5,
				    count(
				        case
				            when sgss.kode_icdx_rinci = 'B05' and EXTRACT ( YEAR FROM AGE( sp.tanggal_lahir ) ) > 5
				            then sgss.kode_icdx_rinci
				        end
				    ) as campak_upper_5,
				    count(
				        case
				            when sgss.kode_icdx_rinci = 'A15.0'
				            then sgss.kode_icdx_rinci
				        end
				    ) as tb_positif
				from sm_pasien sp
				join sm_pendaftaran s on sp.id = s.id_pasien
				join sm_layanan_pendaftaran slp on s.id = slp.id_pendaftaran
				left join sm_diagnosa sd on slp.id = sd.id_layanan_pendaftaran
				left join sm_golongan_sebab_sakit sgss on sd.id_golongan_sebab_sakit = sgss.id
				left join sm_rawat_inap AS ra on  ra.id_layanan_pendaftaran = slp.id
				left join sm_kelas AS kl on  kl.ID = ra.id_kelas
				left join sm_bangsal AS b on  b.ID = ra.id_bangsal
				left join sm_spesialisasi AS sp2 on  sp2.ID = slp.id_unit_layanan
				where sgss.kode_icdx_rinci in (
				    'G40.A09',
				    'A09',
				    'A91',
				    'T50.A91',
				    'J18',
				    'J18.9',
				    'E46',
				    'E45',
				    'E44',
				    'E43',
				    'E42',
				    'E41',
				    'E40',
				    'B50',
				    'A15.0'
				)
				$param
				group by sp.nama_kec";

		$periode = "";
		if ($search["periode_laporan"] === "Bulanan") {
			if ($search["bulan"] == '01') {
				$periode = "Januari " . $search["tahun"];
			} elseif ($search["bulan"] == '02') {
				$periode = "Februari " . $search["tahun"];
			} elseif ($search["bulan"] == '03') {
				$periode = "Maret " . $search["tahun"];
			} elseif ($search["bulan"] == '04') {
				$periode = "April " . $search["tahun"];
			} elseif ($search["bulan"] == '05') {
				$periode = "Mei " . $search["tahun"];
			} elseif ($search["bulan"] == '06') {
				$periode = "Juni " . $search["tahun"];
			} elseif ($search["bulan"] == '07') {
				$periode = "Juli " . $search["tahun"];
			} elseif ($search["bulan"] == '08') {
				$periode = "Agustus " . $search["tahun"];
			} elseif ($search["bulan"] == '09') {
				$periode = "September " . $search["tahun"];
			} elseif ($search["bulan"] == '10') {
				$periode = "Oktober " . $search["tahun"];
			} elseif ($search["bulan"] == '11') {
				$periode = "November " . $search["tahun"];
			} elseif ($search["bulan"] == '12') {
				$periode = "Desember " . $search["tahun"];
			}
		} elseif ($search["periode_laporan"] === "Harian") {
			$periode = get_date_format(date2mysql($search['tanggal_harian']));
		} elseif ($search["periode_laporan"] === "Rentang Waktu") {
			$periode = get_date_format(date2mysql($search['tanggal_awal'])) . " s.d " . get_date_format(date2mysql($search['tanggal_akhir']));
		}

		$results = $this->db->query($sql)->result();

		$data["periode"]       = $periode;
		$data["laporan_wabah"] = $results;

		return $data;
	}

	function getListDataLaporanRadiologi($limit, $start, $search)
	{
		$param = "";
		if ($search["periode_laporan"] === "Harian") {
			if ($search["tanggal_harian"] !== "") :
				$param .= " and to_char( lp.tanggal_layanan, 'yyyy-mm-dd' ) ilike '%" . date2mysql($search['tanggal_harian']) . "' ";
			endif;
		} elseif ($search["periode_laporan"] === "Bulanan" & $search["bulan"] !== "" & $search["tahun"] !== "") {
			$param .= " and to_char(lp.tanggal_layanan, 'YYYY-MM'::text) = '" . $search["tahun"] . "-" . $search["bulan"] . "' ";
		} elseif ($search["periode_laporan"] === "Rentang Waktu" & $search["tanggal_awal"] !== "" & $search["tanggal_akhir"] !== "") {
			if ($search["tanggal_awal"] !== "" & $search["tanggal_akhir"] !== "") :
				$param .= " and lp.tanggal_layanan BETWEEN '" . date2mysql($search['tanggal_awal']) . " 00:00:00' AND '" . date2mysql($search['tanggal_akhir']) . " 23:59:59'";
			endif;
		}

		$sql = "SELECT l.nama as tindakan, count(l.nama) as total_tindakan
			FROM sm_layanan_pendaftaran as lp
			JOIN sm_tarif_tindakan_pasien as ttp on lp.id = ttp.id_layanan_pendaftaran
			JOIN sm_tarif_pelayanan as tp on ttp.id_tarif_pelayanan = tp.id
			JOIN sm_layanan as l on tp.id_layanan = l.id
			JOIN sm_order_radiologi sor on lp.id = sor.id_layanan_pendaftaran 
			
			where sor.status = 'konfirm'
			and l.id_jenis_pemeriksaan = 13 $param
			group by l.nama";

		$sql2 = "select lp.jenis_layanan, count(*) as total
				from sm_layanan_pendaftaran as lp
				         join sm_order_radiologi sor on lp.id = sor.id_layanan_pendaftaran
				         JOIN sm_tarif_tindakan_pasien as ttp on lp.id = ttp.id_layanan_pendaftaran
				         JOIN sm_tarif_pelayanan as tp on ttp.id_tarif_pelayanan = tp.id
				         JOIN sm_layanan as l on tp.id_layanan = l.id
				  where sor.status = 'konfirm'
				  and l.id_jenis_pemeriksaan = 13 $param
				group by lp.jenis_layanan;";

		$data['data']    = $this->db->query($sql)->result();
		$data['layanan'] = $this->db->query($sql2)->result();

		return $data;
	}

	function getListDataLaporanFarmasi($limit, $start, $search)
	{
		$param = "";
		if ($search["periode_laporan"] === "Harian") {
			if ($search["tanggal_harian"] !== "") :
				$param .= " and to_char( pen.waktu_diserahkan, 'yyyy-mm-dd' ) ilike '%" . date2mysql($search['tanggal_harian']) . "' ";
			endif;
		} elseif ($search["periode_laporan"] === "Bulanan" & $search["bulan"] !== "" & $search["tahun"] !== "") {
			$param .= " and to_char(pen.waktu_diserahkan, 'YYYY-MM'::text) = '" . $search["tahun"] . "-" . $search["bulan"] . "' ";
		} elseif ($search["periode_laporan"] === "Rentang Waktu" & $search["tanggal_awal"] !== "" & $search["tanggal_akhir"] !== "") {
			if ($search["tanggal_awal"] !== "" & $search["tanggal_akhir"] !== "") :
				$param .= " and pen.waktu_diserahkan BETWEEN '" . date2mysql($search['tanggal_awal']) . " 00:00:00' AND '" . date2mysql($search['tanggal_akhir']) . " 23:59:59'";
			endif;
		}

		$limitation = "";
		if ($limit !== 0) :
			$limitation = " limit " . $limit . " offset " . $start;
		endif;

		$sql = "select replace(u.nama, 'Depo Farmasi ', '') as depo, count(*) as total
				from sm_penjualan pen
				         join sm_unit u on pen.id_unit = u.id
				where pen.waktu_diserahkan is not null
				  and u.id in (303, 304, 305, 295) $param
				group by u.nama
				order by u.nama";

		$data["data"]   = $this->db->query($sql . $limitation)->result();
		$data["jumlah"] = $this->db->query($sql)->num_rows();

		return $data;
	}

	function getListDataLaporanLaboratorium($limit, $start, $search)
	{
		$param = "";
		if ($search["periode_laporan"] === "Harian") {
			if ($search["tanggal_harian"] !== "") :
				$param .= " and to_char( lp.tanggal_layanan, 'yyyy-mm-dd' ) ilike '%" . date2mysql($search['tanggal_harian']) . "' ";
			endif;
		} elseif ($search["periode_laporan"] === "Bulanan" & $search["bulan"] !== "" & $search["tahun"] !== "") {
			$param .= " and to_char(lp.tanggal_layanan, 'YYYY-MM'::text) = '" . $search["tahun"] . "-" . $search["bulan"] . "' ";
		} elseif ($search["periode_laporan"] === "Rentang Waktu" & $search["tanggal_awal"] !== "" & $search["tanggal_akhir"] !== "") {
			if ($search["tanggal_awal"] !== "" & $search["tanggal_akhir"] !== "") :
				$param .= " and lp.tanggal_layanan BETWEEN '" . date2mysql($search['tanggal_awal']) . " 00:00:00' AND '" . date2mysql($search['tanggal_akhir']) . " 23:59:59'";
			endif;
		}

		$sql = "SELECT l.nama as tindakan, count(l.nama) as total_tindakan
				FROM sm_layanan_pendaftaran as lp
			         JOIN sm_tarif_tindakan_pasien as ttp on lp.id = ttp.id_layanan_pendaftaran
			         JOIN sm_tarif_pelayanan as tp on ttp.id_tarif_pelayanan = tp.id
			         JOIN sm_layanan as l on tp.id_layanan = l.id
			         JOIN sm_order_laboratorium sol on lp.id = sol.id_layanan_pendaftaran
				where sol.status = 'konfirm'
				  and l.id_jenis_pemeriksaan = 9 $param
				group by l.nama
				order by l.nama";

		$sql2 = "SELECT l.nama                                                           as tindakan,
				       count(l.nama)                                                     as total_tindakan,
				       count(case when lab.hasil_lab = 'Negatif' then lab.hasil_lab end) as negative,
				       count(case when lab.hasil_lab = 'Positif' then lab.hasil_lab end) as positive
				 FROM sm_layanan_pendaftaran as lp
				         JOIN sm_tarif_tindakan_pasien as ttp on lp.id = ttp.id_layanan_pendaftaran
				         JOIN sm_tarif_pelayanan as tp on ttp.id_tarif_pelayanan = tp.id
				         JOIN sm_layanan as l on tp.id_layanan = l.id
				         JOIN sm_order_laboratorium sol on lp.id = sol.id_layanan_pendaftaran
				         join (select trim(regexp_replace(sidl.ref_range, '[^a-zA-Z]', '', 'gi')) as hasil_lab, sl.id_order_laboratorium
				               from sm_laboratorium sl
				                        join sm_item_detail_laboratorium sidl on sl.id = sidl.id_lab
				               where sidl.test_nm ilike '%cov%') as lab on sol.id = lab.id_order_laboratorium
				 where sol.status = 'konfirm'
				  and l.nama ilike '%cov%'
				  and l.id_jenis_pemeriksaan = 9 $param
				 group by l.nama, lab
				 order by l.nama";

		$sql3 = "select lp.jenis_layanan, count(*) as total
				from sm_layanan_pendaftaran as lp
				         join sm_order_laboratorium sor on lp.id = sor.id_layanan_pendaftaran
				         JOIN sm_tarif_tindakan_pasien as ttp on lp.id = ttp.id_layanan_pendaftaran
				         JOIN sm_tarif_pelayanan as tp on ttp.id_tarif_pelayanan = tp.id
				         JOIN sm_layanan as l on tp.id_layanan = l.id
				  where sor.status = 'konfirm'
				  and l.id_jenis_pemeriksaan = 9 $param
				group by lp.jenis_layanan;";

		$data["data"]    = $this->db->query($sql)->result();
		$data["covid"]   = $this->db->query($sql2)->result();
		$data["layanan"] = $this->db->query($sql3)->result();

		return $data;
	}

	function getListDataLaporanRehabMedik($limit, $start, $search)
	{
		$param = "";
		if ($search["periode_laporan"] === "Harian") {
			if ($search["tanggal_harian"] !== "") :
				$param .= " and to_char( lp.tanggal_layanan, 'yyyy-mm-dd' ) ilike '%" . date2mysql($search['tanggal_harian']) . "' ";
			endif;
		} elseif ($search["periode_laporan"] === "Bulanan" & $search["bulan"] !== "" & $search["tahun"] !== "") {
			$param .= " and to_char(lp.tanggal_layanan, 'YYYY-MM'::text) = '" . $search["tahun"] . "-" . $search["bulan"] . "' ";
		} elseif ($search["periode_laporan"] === "Rentang Waktu" & $search["tanggal_awal"] !== "" & $search["tanggal_akhir"] !== "") {
			if ($search["tanggal_awal"] !== "" & $search["tanggal_akhir"] !== "") :
				$param .= " and lp.tanggal_layanan BETWEEN '" . date2mysql($search['tanggal_awal']) . " 00:00:00' AND '" . date2mysql($search['tanggal_akhir']) . " 23:59:59'";
			endif;
		}

		$sql = "select count(*)
				from sm_layanan_pendaftaran lp
				         JOIN sm_tarif_tindakan_pasien as ttp on lp.id = ttp.id_layanan_pendaftaran
				         JOIN sm_tarif_pelayanan as tp on ttp.id_tarif_pelayanan = tp.id
				         JOIN sm_layanan as l on tp.id_layanan = l.id
				where lp.id_unit_layanan = 34 $param";

		$sql1 = "select case when l.nama ilike '%Terapi Wicara%' then 'Terapi Wicara' else l.nama end as tindakan,
				       count(*)                                                                      as total_tindakan
				from sm_layanan_pendaftaran lp
				         JOIN sm_tarif_tindakan_pasien as ttp on lp.id = ttp.id_layanan_pendaftaran
				         JOIN sm_tarif_pelayanan as tp on ttp.id_tarif_pelayanan = tp.id
				         JOIN sm_layanan as l on tp.id_layanan = l.id
				where lp.id_unit_layanan = 34 $param
				    and l.nama ilike '%fisio%'
				   or l.nama = 'Terapi Okupasi'
				   or l.nama ilike '%Terapi Wicara%'
				group by case when l.nama ilike '%Terapi Wicara%' then 'Terapi Wicara' else l.nama end";

		$sql2 = "select sl.nama as tindakan, count(*)
				from sm_layanan_pendaftaran lp
				         join sm_tarif_tindakan_pasien sttp on lp.id = sttp.id_layanan_pendaftaran
				         join sm_tarif_pelayanan as tp on sttp.id_tarif_pelayanan = tp.id
				         join sm_layanan sl on tp.id_layanan = sl.id
				where lp.id_unit_layanan = 34 $param
				group by sl.nama";

		//		$sql3 = "select lp.jenis_layanan, count(*) as total
		//				from sm_layanan_pendaftaran as lp
		//				         join sm_order_laboratorium sor on lp.id = sor.id_layanan_pendaftaran
		//				         JOIN sm_tarif_tindakan_pasien as ttp on lp.id = ttp.id_layanan_pendaftaran
		//				         JOIN sm_tarif_pelayanan as tp on ttp.id_tarif_pelayanan = tp.id
		//				         JOIN sm_layanan as l on tp.id_layanan = l.id
		//				  where sor.status = 'konfirm'
		//				  and l.id_jenis_pemeriksaan = 9 $param
		//				group by lp.jenis_layanan;";

		$data["total"]    = $this->db->query($sql)->row()->count;
		$data["data"]     = $this->db->query($sql1)->result();
		$data["tindakan"] = $this->db->query($sql2)->result();
		//		$data["covid"]   = $this->db->query($sql2)->result();
		//		$data["layanan"] = $this->db->query($sql3)->result();

		return $data;
	}

	function getListDataLaporanRM09($limit, $start, $search)
	{
		$param = "";
		if ($search["periode_laporan"] === "Harian") {
			if ($search["tanggal_harian"] !== "") :
				$param .= " and to_char( sd.waktu, 'yyyy-mm-dd' ) ilike '%" . date2mysql($search['tanggal_harian']) . "' ";
			endif;
		} elseif ($search["periode_laporan"] === "Bulanan" & $search["bulan"] !== "" & $search["tahun"] !== "") {
			$param .= " and to_char( sd.waktu, 'mm/yyyy' ) ilike '%" . $search["bulan"] . "/" . $search["tahun"] . "' ";
		} elseif ($search["periode_laporan"] === "Rentang Waktu" & $search["tanggal_awal"] !== "" & $search["tanggal_akhir"] !== "") {
			if ($search["tanggal_awal"] !== "" & $search["tanggal_akhir"] !== "") :
				$param .= " and sd.waktu BETWEEN '" . date2mysql($search['tanggal_awal']) . " 00:00:00' AND '" . date2mysql($search['tanggal_akhir']) . " 23:59:59'";
			endif;
		}

		if ($search['jenis_kasus'] !== '') {
			$param .= " and jenis_kasus = '" . $search["jenis_kasus"] . "' ";
		}

		if (!empty($search['status_keluar'])) {
			$param .= " and lp.tindak_lanjut = '" . $search['status_keluar'] . "' ";
		}

		$param2 = "";
		if ($search["jenis_rawat"] === "1") {
			$param2 .= " and jenis_layanan IN ('Poliklinik', 'Medical Check Up') ";
		} elseif ($search["jenis_rawat"] === "2") {
			$param2 .= " and jenis_layanan IN ('Rawat Inap', 'Intensive Care') ";
		} elseif ($search["jenis_rawat"] === "3") {
			$param2 .= " and jenis_layanan = 'IGD' ";
		}

		$sql = "SELECT kode_icd, diagnosa, COUNT(*) AS total
				FROM (SELECT TRIM(COALESCE(sgss.kode_icdx_rinci, sgss2.kode_icdx_rinci))         AS kode_icd,
				             TRIM(COALESCE(sgss.nama, sgss2.nama, sd.golongan_sebab_sakit_lain)) AS diagnosa,
				             id_layanan_pendaftaran
				      FROM sm_diagnosa sd
				               JOIN (SELECT id, jenis_layanan, tindak_lanjut
				                     FROM sm_layanan_pendaftaran
				                     WHERE id is not null $param2) AS lp ON lp.id = sd.id_layanan_pendaftaran
				               LEFT JOIN sm_golongan_sebab_sakit sgss ON sd.id_golongan_sebab_sakit = sgss.id
				               LEFT JOIN sm_golongan_sebab_sakit sgss2 ON sd.id_pengkodean = sgss2.id
				        where COALESCE(sgss.kode_icdx_rinci, sgss2.kode_icdx_rinci) IS NOT NULL
						and left(sgss.kode_icdx, 1) not in ('O', 'P', 'R', 'Z') $param) AS subquery
				GROUP BY kode_icd, diagnosa
				ORDER BY total DESC
				LIMIT 10";

		$data["data"] = $this->db->query($sql)->result();

		return $data;
	}

	function getListDataLaporanRM10($limit, $start, $search)
	{
		$param = "";
		$alias = 'olab';
		$join = 'LEFT JOIN sm_order_laboratorium olab ON lp.id = olab.id_layanan_pendaftaran';
		if ($search['tempat_layanan_3'] === 'Radiologi') {
			$alias = 'orad';
			$join = 'LEFT JOIN sm_order_radiologi orad on lp.id=orad.id_layanan_pendaftaran';
		}

		$layanan = 'Semua';
		if (!empty($search['tempat_layanan_3'])) {
			$param .= " and $alias.jenis = '" . $search["tempat_layanan_3"] . "' ";
			$layanan = $search["tempat_layanan_3"];
		}



		if ($search["periode_laporan"] === "Harian") {
			if ($search["tanggal_harian"] !== "") :
				$param .= " and to_char( $alias.waktu_order, 'yyyy-mm-dd' ) ilike '%" . date2mysql($search['tanggal_harian']) . "' ";
			endif;
		} elseif ($search["periode_laporan"] === "Bulanan" & $search["bulan"] !== "" & $search["tahun"] !== "") {
			$param .= " and to_char( $alias.waktu_order, 'mm/yyyy' ) ilike '%" . $search["bulan"] . "/" . $search["tahun"] . "' ";
		} elseif ($search["periode_laporan"] === "Rentang Waktu" & $search["tanggal_awal"] !== "" & $search["tanggal_akhir"] !== "") {
			if ($search["tanggal_awal"] !== "" & $search["tanggal_akhir"] !== "") :
				$param .= " and $alias.waktu_order BETWEEN '" . date2mysql($search['tanggal_awal']) . " 00:00:00' AND '" . date2mysql($search['tanggal_akhir']) . " 23:59:59'";
			endif;
		}

		$sql = "SELECT pj.nama, z.jumlah, '$layanan' as layanan
				FROM sm_penjamin pj
				LEFT JOIN (
				    SELECT
				        CASE
				            WHEN pd.id_penjamin = '1' THEN 'BPJS'
				            WHEN pd.id_penjamin = '6' THEN 'Keluarga Karyawan'
				            WHEN pd.id_penjamin = '7' THEN 'Gratis'
				            WHEN pd.id_penjamin = '9' THEN 'Tunai'
				            WHEN pd.id_penjamin = '10' THEN 'Charity Rumah Sakit'
				            WHEN pd.id_penjamin = '11' THEN 'BPJS Ketenagakerjaan'
				            WHEN pd.id_penjamin = '12' THEN 'Jamkesmas'
				            WHEN pd.id_penjamin = '13' THEN 'Penunggu Pasien'
				            WHEN pd.id_penjamin = '14' THEN 'Jaminan Covid Kemenkes'
				            WHEN pd.id_penjamin = '15' THEN 'TASPEN'
				            WHEN pd.id_penjamin = '16' THEN 'JPKMKT'
				            WHEN pd.id_penjamin = '17' THEN 'Jasa Raharja'
				            WHEN pd.id_penjamin = '18' THEN 'Jaminan Kesehatan RSUD'
				            WHEN pd.id_penjamin = '19' THEN 'Global Fund'
				            WHEN pd.id_penjamin = '23' THEN 'RS BUNDA SEJATI'
				            WHEN pd.id_penjamin = '24' THEN 'DP3AP2KB'
				        END AS nama,
				        COUNT(*) AS jumlah
				    FROM sm_pendaftaran pd
				    LEFT JOIN sm_layanan_pendaftaran lp ON pd.id = lp.id_pendaftaran
				    $join
				    WHERE $alias.status = 'konfirm' $param
				    GROUP BY pd.id_penjamin
				) z ON pj.nama = z.nama
				ORDER BY pj.nama";

		$data["data"] = $this->db->query($sql)->result();

		return $data;
	}

	function getListDataLaporanRM11($limit, $start, $search)
	{
		$param = "";
		$query      = "";

		$limitation = "";
		if ($limit !== 0) :
			$limitation = " limit " . $limit . " offset " . $start;
		endif;

		if (!empty($search['asal_kunjungan_11'])) {
			if ($search['asal_kunjungan_11'] == 'igd') {
				$param .= " and pd.jenis_pendaftaran = 'IGD' and lp.jenis_layanan = 'IGD' and pd.jenis_rawat = 'Jalan' ";
			} else if ($search['asal_kunjungan_11'] == 'ranap') {
				$param .= " and pd.jenis_rawat = 'Inap' and lp.jenis_layanan = 'Rawat Inap' ";
			} else if ($search['asal_kunjungan_11'] == 'icare') {
				$param .= " and pd.jenis_rawat = 'Inap' and lp.jenis_layanan = 'Intensive Care' ";
			} else if ($search['asal_kunjungan_11'] == 'jalan') {
				$param .= " and pd.jenis_pendaftaran = 'Poliklinik' ";
				if ($search['asal_poli'] != '') {
					$param .= " and lp.id_unit_layanan =" . $search['asal_poli'];
				}
			} else {
				$param .= " ";
			}
		}

		if (!empty($search['status_keluar'])) {
			$param .= " and lp.tindak_lanjut = '" . $search['status_keluar'] . "' ";
		}

		if ($search["periode_laporan"] === "Harian") {
			if ($search["tanggal_harian"] !== "") :
				// $param .= " and to_char( pd.tanggal_daftar, 'yyyy-mm-dd' ) ilike '%" . date2mysql($search['tanggal_harian']) . "' ";
				$param .= " and pd.tanggal_daftar BETWEEN '" . date2mysql($search['tanggal_harian']) . " 00:00:00' AND '" . date2mysql($search['tanggal_harian']) . " 23:59:59'";
			endif;
		} elseif ($search["periode_laporan"] === "Bulanan" & $search["bulan"] !== "" & $search["tahun"] !== "") {
			$param .= " and to_char( pd.tanggal_daftar, 'mm/yyyy' ) ilike '%" . $search["bulan"] . "/" . $search["tahun"] . "' ";
		} elseif ($search["periode_laporan"] === "Rentang Waktu" & $search["tanggal_awal"] !== "" & $search["tanggal_akhir"] !== "") {
			if ($search["tanggal_awal"] !== "" & $search["tanggal_akhir"] !== "") :
				$param .= " and pd.tanggal_daftar BETWEEN '" . date2mysql($search['tanggal_awal']) . " 00:00:00' AND '" . date2mysql($search['tanggal_akhir']) . " 23:59:59'";
			endif;
		}
		
		if ($search["shift_poli"] === "") {
			$join_shift_poli = " LEFT JOIN sm_antrian_bpjs ab ON pd.id = ab.id_pendaftaran
								 LEFT JOIN sm_jadwal_dokter jd ON ab.id_jadwal_dokter=jd.id ";
		} else {
			$join_shift_poli = " JOIN sm_antrian_bpjs ab ON pd.id = ab.id_pendaftaran
						   	     JOIN sm_jadwal_dokter jd ON ab.id_jadwal_dokter=jd.id AND jd.shift_poli = '" . $search["shift_poli"] . "' ";
		}

		$select = " SELECT pd.ID, lp.ID AS id_layanan_pendaftaran, pd.tanggal_daftar, 
								pd.tanggal_keluar, pd.id_pasien AS no_rm, P.nama, p.kelamin, p.tanggal_lahir, 
								pd.status as status_kunjungan, p.alamat, p.nama_kec,
								CASE WHEN pd.jenis_pendaftaran = 'IGD' AND pd.jenis_rawat = 'Jalan' THEN 'IGD' 
									WHEN pd.jenis_rawat = 'Inap' AND lp.jenis_layanan = 'Rawat Inap' THEN 'Rawat Inap' 
									WHEN pd.jenis_rawat = 'Inap' AND lp.jenis_layanan = 'Intensive Care' THEN 'Intensive Care' 
									ELSE'Rawat Jalan' END AS jenis_rawat,
								COALESCE ( sp.nama, bgri.nama, bgic.nama, lp.jenis_layanan ) AS unit_poli, 
								pg.nama as dokter_dpjp, lp.tindak_lanjut AS status_keluar, 
								CASE WHEN lp.tindak_lanjut = 'RS Lain' THEN ins.nama ELSE '' END as tujuan_rujukan, 
								CASE WHEN lp.tindak_lanjut = 'RS Lain' THEN pd.keterangan_rujukan ELSE '' END as ket_rujukan, pj.nama as penjamin, jd.shift_poli ";
		$count  = "select count(*) as count from (select pd.id ";
		$sql    = "FROM sm_pendaftaran pd
							JOIN sm_layanan_pendaftaran lp ON pd.id = lp.id_pendaftaran
							JOIN sm_pasien P ON pd.id_pasien = P.id
							LEFT JOIN sm_spesialisasi sp ON lp.id_unit_layanan = sp.id
							LEFT JOIN sm_rawat_inap ri ON lp.id = ri.id_layanan_pendaftaran
							LEFT JOIN sm_bangsal bgri ON ri.id_bangsal = bgri.id 
							LEFT JOIN sm_intensive_care ic ON lp.id = ic.id_layanan_pendaftaran
							LEFT JOIN sm_bangsal bgic ON ic.id_bangsal = bgic.id 
							LEFT JOIN sm_tenaga_medis tm ON lp.id_dokter = tm.id
							LEFT JOIN sm_pegawai pg ON tm.id_pegawai = pg.id
							LEFT JOIN sm_instansi ins ON pd.id_instansi_merujuk = ins.id
							LEFT JOIN sm_penjamin pj ON pd.id_penjamin = pj.id					
							$join_shift_poli							
							where lp.jenis_layanan not in ('Radiologi', 'Pemulasaran Jenazah', 'Hemodialisa', 'Laboratorium')
							and pd.status != 'Batal' " . $param;
		// pd.tanggal_keluar is not null -> dihapus karena ada pasien yang belum keluar

		if (($search['status_keluar'] == 'RS Lain')) {
			$order = " order by ins.nama asc, pd.tanggal_daftar asc ";
		} else {
			$order = " order by pd.tanggal_daftar asc ";
		}
		
		$query = $this->db->query($select . $sql . $order . $limitation)->result();

		$periode = "";
		if ($search["periode_laporan"] === "Bulanan") {
			if ($search["bulan"] == '01') {
				$periode = "Januari " . $search["tahun"];
			} elseif ($search["bulan"] == '02') {
				$periode = "Februari " . $search["tahun"];
			} elseif ($search["bulan"] == '03') {
				$periode = "Maret " . $search["tahun"];
			} elseif ($search["bulan"] == '04') {
				$periode = "April " . $search["tahun"];
			} elseif ($search["bulan"] == '05') {
				$periode = "Mei " . $search["tahun"];
			} elseif ($search["bulan"] == '06') {
				$periode = "Juni " . $search["tahun"];
			} elseif ($search["bulan"] == '07') {
				$periode = "Juli " . $search["tahun"];
			} elseif ($search["bulan"] == '08') {
				$periode = "Agustus " . $search["tahun"];
			} elseif ($search["bulan"] == '09') {
				$periode = "September " . $search["tahun"];
			} elseif ($search["bulan"] == '10') {
				$periode = "Oktober " . $search["tahun"];
			} elseif ($search["bulan"] == '11') {
				$periode = "November " . $search["tahun"];
			} elseif ($search["bulan"] == '12') {
				$periode = "Desember " . $search["tahun"];
			}
		} elseif ($search["periode_laporan"] === "Harian") {
			$periode = get_date_format(date2mysql($search['tanggal_harian']));
		} elseif ($search["periode_laporan"] === "Rentang Waktu") {
			$periode = get_date_format(date2mysql($search['tanggal_awal'])) . " s.d " . get_date_format(date2mysql($search['tanggal_akhir']));
		}

		foreach ($query as $value) {
			$diagnosa_data = $this->getDiagnosaListLaporanByIdLayananPendaftaran($value->id_layanan_pendaftaran);
			$utama_diagnosa = array_filter($diagnosa_data, function ($item) {
				return $item->prioritas == 'Utama';
			});

			if (count($utama_diagnosa) > 1) {
				$utama_terakhir = end($utama_diagnosa);
			} else {
				$utama_terakhir = reset($utama_diagnosa);
			}
			$icdx_utama_terakhir = $utama_terakhir->icdx_diagnosa ?? "";

			$diagnosa_utama = "";
			if ($icdx_utama_terakhir != "") {
				$diagnosa_utama = '<b>' . $icdx_utama_terakhir . '</b><i> (Utama).</i><br>';
			}

			$first_coder = null;
			$diagnosa_sekunder = "";
			foreach ($diagnosa_data as $diagnosa) {
				if (!empty($diagnosa->icdx_diagnosa) && $diagnosa->prioritas !== 'Utama') {
					$diagnosa_sekunder .= $diagnosa->icdx_diagnosa . ".<br>";
				}

				if (!empty($diagnosa->coder)) {
					$first_coder = $diagnosa->coder;
					break;
				}
			}

			if ($first_coder === null) {
				foreach ($diagnosa_data as $item) {
					if ($item->coder !== null) {
						$first_coder = $item->coder;
						break;
					}
				}
			}

			$value->diagnosa = $diagnosa_utama . $diagnosa_sekunder;
			$value->nama_coder = $first_coder ?? '';
			$value->data_diagnosa = $diagnosa_data;
		}

		$data["periode"] = $periode;
		$data["status_keluar"] = $search['status_keluar'];
		$data["data"]    = $query;
		$data["jumlah"]  = $this->db->query($count . $sql . ') as jml')->row()->count;
		$this->db->close();

		return $data;
	}

	function getPoliklinik()
	{
		$query = $this->db->where('is_klinik', '1')->where('id <>', 58)->order_by('nama', 'ASC')->get('sm_spesialisasi')->result();
		$data =  array();
		$data[''] = 'Semua';
		foreach ($query as $key => $value) :
			$data[$value->id] = $value->nama;
		endforeach;

		return $data;
	}

	function getDiagnosaListLaporan12ByIdLayananPendaftaran($id_layanan_pendaftaran)
	{
		$sql = "select
				concat(concat(case when gs2.kode_icdx_rinci is null then '' else ' [' end, gs2.kode_icdx_rinci, gs3.kode_icdx_rinci, case when gs2.kode_icdx_rinci is null then '' else '] ' end), case when d.id_golongan_sebab_sakit is not null then gs.nama else d.golongan_sebab_sakit_lain end) AS ICDX_diagnosa,
				d.prioritas,
				d.diagnosa_akhir,
				case when d.jenis_kasus = '1' then 'Baru' else 'Lama' end AS kasus, pg.nama as coder, gss.kode_icdx
				FROM sm_pasien P
				JOIN sm_pendaftaran AS pd ON ( pd.id_pasien = P.ID )
				JOIN sm_layanan_pendaftaran AS lp ON ( lp.id_pendaftaran = pd.ID )
				LEFT JOIN sm_diagnosa AS d ON ( d.id_layanan_pendaftaran = lp.ID )
				LEFT JOIN sm_golongan_sebab_sakit AS gs ON ( gs.ID = d.id_golongan_sebab_sakit )
				LEFT JOIN sm_golongan_sebab_sakit AS gs2 ON ( gs2.ID = d.id_pengkodean )
				LEFT JOIN sm_golongan_sebab_sakit AS gs3 ON ( gs3.ID = d.id_pengkodean_asterik )
				LEFT JOIN sm_pegawai as pg on ( d.id_coder = pg.id )
				LEFT JOIN sm_golongan_sebab_sakit gss on (d.id_pengkodean = gss.id) 
				WHERE lp.id = $id_layanan_pendaftaran ORDER BY d.prioritas desc";

		return $this->db->query($sql)->result();
	}

	function getListDataLaporanRM12($limit, $start, $search)
	{
		$param = "";
		$query      = "";

		$limitation = "";
		if ($limit !== 0) :
			$limitation = " limit " . $limit . " offset " . $start;
		endif;

		// if (!empty($search['asal_kunjungan'])) {
		// 	if ($search['asal_kunjungan'] == 'igd') {
		// 		$param .= " and pd.jenis_pendaftaran = 'IGD' and lp.jenis_layanan = 'IGD' and pd.jenis_rawat = 'Jalan' ";
		// 	} else {
		// 		$param .= " and pd.jenis_rawat = 'Jalan' and lp.jenis_layanan = 'Poliklinik'";
		// 	}
		// }

		if ($search['asal_kunjungan'] === "1") {
			$param .= " and pd.jenis_pendaftaran = 'Poliklinik' ";
			if (!empty($search['asal_poli'])) {
				$param .= " and lp.id_unit_layanan = '" . $search['asal_poli'] . "' ";
			}
		} elseif ($search['asal_kunjungan'] === "2") {
			$param .= " and pd.jenis_pendaftaran = 'IGD' and lp.jenis_layanan = 'IGD' ";
		} else {
			$param .= " and ((pd.jenis_pendaftaran = 'IGD' AND lp.jenis_layanan = 'IGD' ) or pd.jenis_pendaftaran = 'Poliklinik' ) ";
		}

		if (!empty($search['status_keluar'])) {
			$param .= " and lp.tindak_lanjut = '" . $search['status_keluar'] . "' ";
		}

		if ($search["periode_laporan"] === "Harian") {
			if ($search["tanggal_harian"] !== "") :
				$param .= " and pd.tanggal_daftar BETWEEN '" . date2mysql($search['tanggal_harian']) . " 00:00:00' AND '" . date2mysql($search['tanggal_harian']) . " 23:59:59'";
			endif;
		} elseif ($search["periode_laporan"] === "Bulanan" & $search["bulan"] !== "" & $search["tahun"] !== "") {
			$param .= " and to_char( pd.tanggal_daftar, 'mm/yyyy' ) ilike '%" . $search["bulan"] . "/" . $search["tahun"] . "' ";
		} elseif ($search["periode_laporan"] === "Rentang Waktu" & $search["tanggal_awal"] !== "" & $search["tanggal_akhir"] !== "") {
			if ($search["tanggal_awal"] !== "" & $search["tanggal_akhir"] !== "") :
				$param .= " and pd.tanggal_daftar BETWEEN '" . date2mysql($search['tanggal_awal']) . " 00:00:00' AND '" . date2mysql($search['tanggal_akhir']) . " 23:59:59'";
			endif;
		}

		$select = " SELECT pd.ID, lp.ID AS id_layanan_pendaftaran, pd.tanggal_daftar, 
								pd.tanggal_keluar, pd.id_pasien AS no_rm, P.nama, p.kelamin, p.tanggal_lahir, 
								pd.status as status_kunjungan, p.alamat, p.nama_kec,
								CASE WHEN pd.jenis_pendaftaran = 'IGD' AND pd.jenis_rawat = 'Jalan' THEN 'IGD' 
									WHEN pd.jenis_rawat = 'Inap' AND lp.jenis_layanan = 'Rawat Inap' THEN 'Rawat Inap' 
									WHEN pd.jenis_rawat = 'Inap' AND lp.jenis_layanan = 'Intensive Care' THEN 'Intensive Care' 
									ELSE'Rawat Jalan' END AS jenis_rawat,
								COALESCE ( sp.nama, bgri.nama, bgic.nama, lp.jenis_layanan ) AS unit_poli, 
								pg.nama as dokter_dpjp, lp.tindak_lanjut AS status_keluar, pj.nama penjamin ";
		$count  = "select count(*) as count from (select pd.id ";
		$sql    = "FROM sm_pendaftaran pd
							JOIN sm_layanan_pendaftaran lp ON pd.id = lp.id_pendaftaran
							JOIN sm_pasien P ON pd.id_pasien = P.id
							LEFT JOIN sm_spesialisasi sp ON lp.id_unit_layanan = sp.id
							LEFT JOIN sm_rawat_inap ri ON lp.id = ri.id_layanan_pendaftaran
							LEFT JOIN sm_bangsal bgri ON ri.id_bangsal = bgri.id 
							LEFT JOIN sm_intensive_care ic ON lp.id = ic.id_layanan_pendaftaran
							LEFT JOIN sm_bangsal bgic ON ic.id_bangsal = bgic.id 
							LEFT JOIN sm_tenaga_medis tm ON lp.id_dokter = tm.id
							LEFT JOIN sm_pegawai pg ON tm.id_pegawai = pg.id
							LEFT JOIN sm_penjamin pj ON lp.id_penjamin = pj.id
							
							where pd.tanggal_keluar is not null
							and lp.jenis_layanan not in ('Radiologi', 'Pemulasaran Jenazah', 'Hemodialisa', 'Laboratorium')
							and pd.status != 'Batal' " . $param;

		$order = " order by pd.tanggal_daftar asc ";

		$query = $this->db->query($select . $sql . $order . $limitation)->result();

		$periode = "";
		if ($search["periode_laporan"] === "Bulanan") {
			if ($search["bulan"] == '01') {
				$periode = "Januari " . $search["tahun"];
			} elseif ($search["bulan"] == '02') {
				$periode = "Februari " . $search["tahun"];
			} elseif ($search["bulan"] == '03') {
				$periode = "Maret " . $search["tahun"];
			} elseif ($search["bulan"] == '04') {
				$periode = "April " . $search["tahun"];
			} elseif ($search["bulan"] == '05') {
				$periode = "Mei " . $search["tahun"];
			} elseif ($search["bulan"] == '06') {
				$periode = "Juni " . $search["tahun"];
			} elseif ($search["bulan"] == '07') {
				$periode = "Juli " . $search["tahun"];
			} elseif ($search["bulan"] == '08') {
				$periode = "Agustus " . $search["tahun"];
			} elseif ($search["bulan"] == '09') {
				$periode = "September " . $search["tahun"];
			} elseif ($search["bulan"] == '10') {
				$periode = "Oktober " . $search["tahun"];
			} elseif ($search["bulan"] == '11') {
				$periode = "November " . $search["tahun"];
			} elseif ($search["bulan"] == '12') {
				$periode = "Desember " . $search["tahun"];
			}
		} elseif ($search["periode_laporan"] === "Harian") {
			$periode = get_date_format(date2mysql($search['tanggal_harian']));
		} elseif ($search["periode_laporan"] === "Rentang Waktu") {
			$periode = get_date_format(date2mysql($search['tanggal_awal'])) . " s.d " . get_date_format(date2mysql($search['tanggal_akhir']));
		}

		foreach ($query as $value) {
			$diagnosa_data = $this->getDiagnosaListLaporan12ByIdLayananPendaftaran($value->id_layanan_pendaftaran);
			$utama_diagnosa = array_filter($diagnosa_data, function ($item) {
				return $item->prioritas == 'Utama';
			});

			if (count($utama_diagnosa) > 1) {
				$utama_terakhir = end($utama_diagnosa);
			} else {
				$utama_terakhir = reset($utama_diagnosa);
			}
			$icdx_utama_terakhir = $utama_terakhir->icdx_diagnosa ?? "";

			$diagnosa_utama = "";
			$jenis_kasus = null;
			$kode_icdx 	 = null;
			if ($icdx_utama_terakhir != "") {
				$diagnosa_utama = '<b>' . $icdx_utama_terakhir . '</b><i> (Utama).</i><br>';
				$jenis_kasus = $utama_terakhir->kasus;
				$kode_icdx   = $utama_terakhir->kode_icdx;
			}

			$first_coder = null;
			$diagnosa_sekunder = "";
			foreach ($diagnosa_data as $diagnosa) {
				if (!empty($diagnosa->icdx_diagnosa) && $diagnosa->prioritas !== 'Utama') {
					$diagnosa_sekunder .= $diagnosa->icdx_diagnosa . ".<br>";
				}

				if (!empty($diagnosa->coder)) {
					$first_coder = $diagnosa->coder;
					break;
				}
			}

			if ($first_coder === null) {
				foreach ($diagnosa_data as $item) {
					if ($item->coder !== null) {
						$first_coder = $item->coder;
						break;
					}
				}
			}

			$value->kode_icdx 	= $kode_icdx;
			$value->jenis_kasus = $jenis_kasus;
			$value->diagnosa 	= $diagnosa_utama;
			$value->nama_coder 	= $first_coder ?? '';
			$value->data_diagnosa = $diagnosa_data;
		}

		$data["periode"] = $periode;
		$data["status_keluar"] = $search['status_keluar'];
		$data["data"]    = $query;
		$data["jumlah"]  = $this->db->query($count . $sql . ') as jml')->row()->count;
		$this->db->close();

		return $data;
	}

	function getListDataLaporanRM13($limit, $start, $search)
	{
		$data =  $this->sqlListDataLaporanRM13($search, '')->result();
		if (!empty($data)) {

			foreach ($data as $a => $b) {
				$data[$a]->diagnosa =  $this->sqlListDataLaporanRM13($search, $b->kode_skdr)->result();

				$dataDiagnosa =  $this->sqlListDataLaporanRM13($search, $b->kode_skdr)->result();

				if (!empty($dataDiagnosa)) {
					foreach ($dataDiagnosa as $c => $d) {
						$data[$a]->diagnosa[$c]->pasien =  $this->sqlListDataLaporanDetailRM13($search, $d->kode_icdx_rinci)->result();
					}
				}
			}

			$jenis_rawat_map = [
				'1' => 'Rawat Jalan',
				'2' => 'Rawat Inap',
				'3' => 'IGD',
			];

			$dataX["periode_laporan"] = $search["periode_laporan"];
			$dataX["periode"]     = $this->getPeriode($search["periode_laporan"], $search['tanggal_harian'], $search["bulan"], $search["tahun"], $search['tanggal_awal'], $search['tanggal_akhir']);
			$dataX['jenis_rawat'] = $jenis_rawat_map[$search["jenis_rawat"]] ?? 'SEMUA';
			$dataX['jenis_kasus'] = $search["jenis_kasus"] == '1' ? 'Baru' : 'Lama';
			$dataX['data'] = $data;
			$this->db->close();

			return $dataX;
		}
	}

	function sqlListDataLaporanRM13($search, $kode_skdr)
	{

		$param 				= "";
		$param_skdr_select  = "";
		$param_skdr_where  	= "";
		$param_skdr_group   = "";
		$param_skdr_join   	= " LEFT";

		if ($search["periode_laporan"] === "Harian") {
			if ($search["tanggal_harian"] !== "") :
				$param .= " and to_char( d.waktu, 'yyyy-mm-dd' ) = '" . date2mysql($search['tanggal_harian']) . "' ";
			endif;
		} elseif ($search["periode_laporan"] === "Bulanan" & $search["bulan"] !== "" & $search["tahun"] !== "") {
			$param .= " and to_char( d.waktu, 'mm/yyyy' ) ilike '%" . $search["bulan"] . "/" . $search["tahun"] . "' ";
		} elseif ($search["periode_laporan"] === "Rentang Waktu" & $search["tanggal_awal"] !== "" & $search["tanggal_akhir"] !== "") {
			if ($search["tanggal_awal"] !== "" & $search["tanggal_akhir"] !== "") :
				$param .= " and d.waktu BETWEEN '" . date2mysql($search['tanggal_awal']) . " 00:00:00' AND '" . date2mysql($search['tanggal_akhir']) . " 23:59:59'";
			endif;
		}

		if ($search['jenis_kasus'] !== '') {
			$param .= " and jenis_kasus = '" . $search["jenis_kasus"] . "' ";
		}

		$param2 = "";
		if ($search["jenis_rawat"] === "1") {
			$param2 .= " and lp.jenis_layanan IN ('Poliklinik', 'Medical Check Up') ";
		} elseif ($search["jenis_rawat"] === "2") {
			$param2 .= " and lp.jenis_layanan IN ('Rawat Inap', 'Intensive Care') ";
		} elseif ($search["jenis_rawat"] === "3") {
			$param2 .= " and lp.jenis_layanan = 'IGD' ";
		}

		if ($kode_skdr != '') {
			$param_skdr_select  = " diag.kode_icdx, diag.kode_icdx_rinci, diag.diagnosa, diag.icdx_trim, ";
			$param_skdr_where   = "  AND TRIM ( COALESCE ( gss.kode_skdr, gss2.kode_skdr ) )= '$kode_skdr' ";
			$param_skdr_group   = " ,diag.kode_icdx, diag.kode_icdx_rinci, diag.diagnosa, diag.icdx_trim ";
			$param_skdr_join   = "";
		}
		$select = " SELECT skdr.kode kode_skdr, skdr.nama nama_skdr, $param_skdr_select COUNT (id_layanan_pendaftaran) AS total_kasus, sum(CASE WHEN kondisi_keluar='Meninggal' then 1 else 0 end) total_meninggal, sum(CASE WHEN order_lab ='Ya' then 1 else 0 end) total_lab ";
		$sql1   = " FROM sm_kode_skdr skdr 
					 $param_skdr_join JOIN 
					 (
							SELECT TRIM ( COALESCE ( gss.kode_skdr, gss2.kode_skdr ) ) AS kode_skdr,
								   TRIM ( COALESCE ( gss.kode_icdx, gss2.kode_icdx_rinci ) ) AS kode_icdx,
								   TRIM ( COALESCE ( gss.kode_icdx_rinci, gss2.kode_icdx_rinci ) ) AS kode_icdx_rinci,
								   REPLACE(TRIM ( COALESCE ( gss.kode_icdx_rinci, gss2.kode_icdx_rinci ) ),'.','') AS icdx_trim,
								   TRIM ( COALESCE (  gss.nama,  gss2.nama,  d.golongan_sebab_sakit_lain ) ) AS diagnosa,
								   d.id_layanan_pendaftaran,lp.id_pendaftaran,pd.kondisi_keluar , 
								   case when (select id from sm_order_laboratorium where id_layanan_pendaftaran=d.id_layanan_pendaftaran AND status = 'konfirm' limit 1) is not null  then 'Ya' else 'Tidak' end order_lab
							FROM sm_diagnosa  d 
							LEFT JOIN sm_golongan_sebab_sakit  gss ON  d.id_golongan_sebab_sakit =  gss.ID 
							LEFT JOIN sm_golongan_sebab_sakit  gss2 ON  d.id_pengkodean =  gss2.ID 		
							JOIN sm_layanan_pendaftaran lp on d.id_layanan_pendaftaran=lp.id $param2
							JOIN sm_pendaftaran pd on lp.id_pendaftaran=pd.id
							LEFT JOIN sm_order_laboratorium ol on d.id_layanan_pendaftaran=ol.id_layanan_pendaftaran AND ol.status='konfirm'
							where COALESCE (  gss.kode_icdx_rinci,  gss2.kode_icdx_rinci ) IS NOT NULL  
							AND TRIM ( COALESCE ( gss.kode_skdr, gss2.kode_skdr ) ) is not null 
							AND d.prioritas='Utama'
							$param  $param_skdr_where 
							GROUP BY d.id_layanan_pendaftaran,gss.kode_skdr, gss2.kode_skdr,gss.kode_icdx, gss2.kode_icdx_rinci,gss.kode_icdx_rinci,gss2.kode_icdx_rinci,gss.nama, gss2.nama, d.golongan_sebab_sakit_lain,lp.id_pendaftaran,pd.kondisi_keluar";

		$sql2    = " ) diag on skdr.kode=diag.kode_skdr
						GROUP BY skdr.kode,skdr.id  $param_skdr_group ";

		$order    = " ORDER BY skdr.id ASC ";

		return  $this->db->query($select . $sql1 . $sql2 . $order);
	}

	function sqlListDataLaporanDetailRM13($search, $kode_icdx)
	{

		$param 				= "";
		if ($search["periode_laporan"] === "Harian") {
			if ($search["tanggal_harian"] !== "") :
				$param .= " and to_char( d.waktu, 'yyyy-mm-dd' ) = '" . date2mysql($search['tanggal_harian']) . "' ";
			endif;
		} elseif ($search["periode_laporan"] === "Bulanan" & $search["bulan"] !== "" & $search["tahun"] !== "") {
			$param .= " and to_char( d.waktu, 'mm/yyyy' ) ilike '%" . $search["bulan"] . "/" . $search["tahun"] . "' ";
		} elseif ($search["periode_laporan"] === "Rentang Waktu" & $search["tanggal_awal"] !== "" & $search["tanggal_akhir"] !== "") {
			if ($search["tanggal_awal"] !== "" & $search["tanggal_akhir"] !== "") :
				$param .= " and d.waktu BETWEEN '" . date2mysql($search['tanggal_awal']) . " 00:00:00' AND '" . date2mysql($search['tanggal_akhir']) . " 23:59:59'";
			endif;
		}

		if ($search['jenis_kasus'] !== '') {
			$param .= " and jenis_kasus = '" . $search["jenis_kasus"] . "' ";
		}

		$param2 = "";
		if ($search["jenis_rawat"] === "1") {
			$param2 .= " and lp.jenis_layanan IN ('Poliklinik', 'Medical Check Up') ";
		} elseif ($search["jenis_rawat"] === "2") {
			$param2 .= " and lp.jenis_layanan IN ('Rawat Inap', 'Intensive Care') ";
		} elseif ($search["jenis_rawat"] === "3") {
			$param2 .= " and lp.jenis_layanan = 'IGD' ";
		}

		$select = " SELECT 
							TRIM ( COALESCE ( gss.kode_icdx_rinci, gss2.kode_icdx_rinci ) ) AS kode_icdx_rinci,
							REPLACE(TRIM ( COALESCE ( gss.kode_icdx_rinci, gss2.kode_icdx_rinci ) ),'.','') AS icdx_trim,
							d.id_layanan_pendaftaran, lp.id_pendaftaran, lp.jenis_layanan, pd.tanggal_daftar, pd.id_pasien, ps.nama nama_pasien,
							case when pd.kondisi_keluar = 'Meninggal' then 'Ya' else 'Tidak' end kondisi_keluar,
							case when (select id from sm_order_laboratorium where id_layanan_pendaftaran=d.id_layanan_pendaftaran AND status = 'konfirm' limit 1) is not null  then 'Ya' else 'Tidak' end order_lab,
							(SELECT nama from sm_bangsal where id=(select id_bangsal from sm_rawat_inap where id_layanan_pendaftaran=d.id_layanan_pendaftaran limit 1 ) limit 1 ) bangsal,
							(select nama from sm_spesialisasi where id=lp.id_unit_layanan limit 1) spesialisasi
					FROM
						sm_diagnosa d
						LEFT JOIN sm_golongan_sebab_sakit gss ON d.id_golongan_sebab_sakit = gss.ID 
						LEFT JOIN sm_golongan_sebab_sakit gss2 ON d.id_pengkodean = gss2.ID 
						JOIN sm_layanan_pendaftaran lp ON d.id_layanan_pendaftaran = lp.ID $param2
						JOIN sm_pendaftaran pd ON lp.id_pendaftaran = pd.ID 
						LEFT JOIN sm_pasien ps on pd.id_pasien=ps.id
					WHERE
						COALESCE ( gss.kode_icdx_rinci, gss2.kode_icdx_rinci ) IS NOT NULL 
						AND TRIM ( COALESCE ( gss.kode_skdr, gss2.kode_skdr ) ) IS NOT NULL 
						AND TRIM ( COALESCE ( gss.kode_icdx_rinci, gss2.kode_icdx_rinci ) ) = '$kode_icdx'
						AND d.prioritas='Utama'
						$param  
						GROUP BY d.id_layanan_pendaftaran, lp.id_pendaftaran, pd.tanggal_daftar, pd.id_pasien, ps.nama,gss.kode_icdx_rinci, gss2.kode_icdx_rinci,gss.kode_icdx_rinci, gss2.kode_icdx_rinci,pd.kondisi_keluar,lp.jenis_layanan, lp.id_unit_layanan
						ORDER BY pd.tanggal_daftar ASC ";

		return  $this->db->query($select);
	}

	function getListDataLaporanRM14($search)
	{
		$param = "";
		$query      = "";

		if (!empty($search['tahun_periode'])) {
			$param .= " and to_char( pd.tanggal_daftar, 'YYYY' ) = '" . $search["tahun_periode"] . "' ";
		}

		$sql    = "SELECT TO_CHAR(pd.tanggal_daftar, 'MM') AS angka_bulan,
									TO_CHAR(pd.tanggal_daftar, 'Month') AS bulan,
									SUM(CASE WHEN pb.jenis_peserta = 'PBI' THEN 1 ELSE 0 END) AS pbi,
									SUM(CASE WHEN pb.jenis_peserta != 'PBI' THEN 1 ELSE 0 END) AS non_pbi,
									SUM(CASE WHEN pb.jenis_peserta is null THEN 1 ELSE 0 END) AS kosong, 
									COUNT(*) AS total
							FROM sm_pendaftaran pd
							JOIN sm_pasien p ON pd.id_pasien = p.id
							LEFT JOIN sm_peserta_bpjs pb ON p.id = pb.id
							WHERE pd.id_penjamin = 1
									AND pd.status != 'Batal' " . $param . "
							GROUP BY TO_CHAR(pd.tanggal_daftar, 'Month'), 
									TO_CHAR(pd.tanggal_daftar, 'MM') 
							ORDER BY TO_CHAR(pd.tanggal_daftar, 'MM')::integer ";

		$query = $this->db->query($sql)->result();

		foreach ($query as $i => $val) {
			$bulan_indo = $this->getBulanIndo($val->angka_bulan);
			$val->bulan = $bulan_indo;
		}

		$data["periode"] = $search['tahun_periode'];
		$data["data"]    = $query;

		$this->db->close();

		return $data;
	}

	function getListDataLaporanRM15($search)
	{
		$tanggal = "";
		$param   = "";
		$query   = "";

		if ($search["periode_laporan"] === "Harian") {
			if ($search["tanggal_harian"] !== "") :
				$tanggal .= " and pd.tanggal_daftar BETWEEN '" . date2mysql($search['tanggal_harian']) . " 00:00:00' AND '" . date2mysql($search['tanggal_harian']) . " 23:59:59'";
			endif;
		} elseif ($search["periode_laporan"] === "Bulanan" & $search["bulan"] !== "" & $search["tahun"] !== "") {
			$tanggal .= " and to_char( pd.tanggal_daftar, 'mm/yyyy' ) ilike '%" . $search["bulan"] . "/" . $search["tahun"] . "' ";
		} elseif ($search["periode_laporan"] === "Rentang Waktu" & $search["tanggal_awal"] !== "" & $search["tanggal_akhir"] !== "") {
			if ($search["tanggal_awal"] !== "" & $search["tanggal_akhir"] !== "") :
				$tanggal .= " and pd.tanggal_daftar BETWEEN '" . date2mysql($search['tanggal_awal']) . " 00:00:00' AND '" . date2mysql($search['tanggal_akhir']) . " 23:59:59'";
			endif;
		}

		if ($search['asal_kunjungan'] === "1") { // Poliklinik
			$query = $this->db->query(" SELECT id,nama FROM sm_spesialisasi where is_klinik = '1' order by nama asc ")->result();
		} else { // IGD
			$query = $this->db->query(" SELECT DISTINCT jenis_igd id, jenis_igd nama from sm_pendaftaran WHERE jenis_igd is not null AND jenis_igd <>'' order by jenis_igd ASC ")->result();
		}

		foreach ($query as $key => $value) :
			$id_ruang = $value->id;

			if ($search['asal_kunjungan'] === "1") { // Poliklinik
				$param = " AND pd.jenis_rawat = 'Jalan' AND lp.id_unit_layanan='$id_ruang' ";
			} else { // IGD
				$param = " AND pd.jenis_pendaftaran = 'IGD' AND pd.jenis_igd='$id_ruang' ";
			}

			$value->detail = $this->db->query(
				"   SELECT
					COALESCE(sum(case when ps.no_kab = 71 AND ps.kelamin='L' then 1 else 0 end), 0) kotang_l,
					COALESCE(sum(case when ps.no_kab = 71 AND ps.kelamin='P' then 1 else 0 end), 0) kotang_p,
					COALESCE(sum(case when ps.no_kab <> 71 AND ps.kelamin='L' then 1 else 0 end), 0) lukotang_l,
					COALESCE(sum(case when ps.no_kab <> 71 AND ps.kelamin='P' then 1 else 0 end), 0) lukotang_p,
					COALESCE(sum(case when ps.no_kab is null AND ps.kelamin='L' then 1 else 0 end), 0) total_tdk_diketahui_l,
					COALESCE(sum(case when ps.no_kab is null AND ps.kelamin='P' then 1 else 0 end), 0) total_tdk_diketahui_p,
					COALESCE(count(pd.id), 0) total
					FROM sm_pendaftaran pd 
					JOIN sm_layanan_pendaftaran lp ON pd.id=lp.id_pendaftaran AND lp.konsul=0
					JOIN sm_pasien ps ON pd.id_pasien=ps.id
					WHERE pd.status<>'Batal' $param $tanggal 
				"
			)->row();

		endforeach;

		$data["periode"] = $this->getPeriodeLaporan($search);
		$data["asal_kunjungan"] = $search['asal_kunjungan'] == '1' ? 'Poliklinik' : 'IGD';
		$data["data"]    = $query;
		$this->db->close();

		return $data;
	}

	function getListDataLaporanRM16($search)
	{
		$tanggal_ranap = "";
		$tanggal_rajal = "";

		if ($search["periode_laporan"] === "Harian") {
			if ($search["tanggal_harian"] !== "") :
				$tanggal_ranap .= " and pd.tanggal_keluar BETWEEN '" . date2mysql($search['tanggal_harian']) . " 00:00:00' AND '" . date2mysql($search['tanggal_harian']) . " 23:59:59'";
				$tanggal_rajal .= " and pd.tanggal_daftar BETWEEN '" . date2mysql($search['tanggal_harian']) . " 00:00:00' AND '" . date2mysql($search['tanggal_harian']) . " 23:59:59'";
			endif;
		} elseif ($search["periode_laporan"] === "Bulanan" & $search["bulan"] !== "" & $search["tahun"] !== "") {
			$tanggal_ranap .= " and to_char( pd.tanggal_keluar, 'mm/yyyy' ) ilike '%" . $search["bulan"] . "/" . $search["tahun"] . "' ";
			$tanggal_rajal .= " and to_char( pd.tanggal_daftar, 'mm/yyyy' ) ilike '%" . $search["bulan"] . "/" . $search["tahun"] . "' ";
		} elseif ($search["periode_laporan"] === "Rentang Waktu" & $search["tanggal_awal"] !== "" & $search["tanggal_akhir"] !== "") {
			if ($search["tanggal_awal"] !== "" & $search["tanggal_akhir"] !== "") :
				$tanggal_ranap .= " and pd.tanggal_keluar BETWEEN '" . date2mysql($search['tanggal_awal']) . " 00:00:00' AND '" . date2mysql($search['tanggal_akhir']) . " 23:59:59'";
				$tanggal_rajal .= " and pd.tanggal_daftar BETWEEN '" . date2mysql($search['tanggal_awal']) . " 00:00:00' AND '" . date2mysql($search['tanggal_akhir']) . " 23:59:59'";
			endif;
		}

		$query = $this->db->query(" SELECT p.id, jp.nama jenis_penjamin, p.nama penjamin FROM sm_jenis_penjamin jp
									JOIN sm_penjamin p ON jp.id=p.id_jenis_penjamin WHERE is_active=1 ORDER BY jp.nama, p.nama ASC ")->result();

		$list = $this->db->query("SELECT id , nama jenis_penjamin FROM sm_jenis_penjamin ORDER BY nama ASC ")->result();
		foreach ($list as $k => $val) :
			$id_jenis_penjamin = $val->id;

			$val->detail = $this->db->query(
				" SELECT id, nama penjamin FROM sm_penjamin where id_jenis_penjamin = $id_jenis_penjamin AND is_active = 1 ORDER BY nama ASC "
			)->result();


			foreach ($val->detail as $key => $value) :
				$id_penjamin = $value->id;

				$value->ranap = $this->db->query(
					"   SELECT COALESCE(count(pd.id), 0) pasien_keluar, (COALESCE(sum(ri.total_hari), 0) + COALESCE(sum(ic.total_hari), 0)) total_hari
							FROM sm_pendaftaran pd
							JOIN sm_layanan_pendaftaran lp ON pd.id=lp.id_pendaftaran
							LEFT JOIN sm_rawat_inap ri ON lp.id=ri.id_layanan_pendaftaran
							LEFT JOIN sm_intensive_care ic ON lp.id=ic.id_layanan_pendaftaran
							where pd.status<>'Batal' AND pd.jenis_rawat='Inap' AND pd.id_penjamin = $id_penjamin
							AND lp.jenis_layanan in ('Rawat Inap','Intensive Care') $tanggal_ranap
						"
				)->row();

				$value->rajal = $this->db->query(
					"   SELECT COALESCE(count(pd.id), 0) total,
							COALESCE(sum(case when pd.jenis_pendaftaran = 'IGD' then 1 else 0 end), 0) igd,
							COALESCE(sum(case when pd.jenis_pendaftaran = 'Poliklinik' then 1 else 0 end), 0) poli,
							COALESCE(sum(case when pd.jenis_pendaftaran = 'Laboratorium' then 1 else 0 end), 0) lab,
							COALESCE(sum(case when pd.jenis_pendaftaran = 'Radiologi' then 1 else 0 end), 0) rad,
							COALESCE(sum(case when pd.jenis_pendaftaran = 'Hemodialisa' then 1 else 0 end), 0) hd
							FROM sm_pendaftaran pd
							where pd.status<>'Batal' AND pd.jenis_rawat='Jalan' AND pd.id_penjamin = $id_penjamin
							AND pd.jenis_pendaftaran in ('IGD','Poliklinik','Laboratorium','Radiologi','Hemodialisa') $tanggal_rajal
						"
				)->row();

			endforeach;


		endforeach;


		$data["periode"] = $this->getPeriodeLaporan($search);
		$data["data"]    = $list;
		$this->db->close();

		return $data;
	}

	function getListDataLaporanRM17($limit, $start, $search)
	{
		$param = "";
		if ($search["periode_laporan"] === "Harian") {
			if ($search["tanggal_harian"] !== "") {
				$param .= " and to_char( sd.waktu, 'yyyy-mm-dd' ) ilike '%" . date2mysql($search['tanggal_harian']) . "' ";
			}
		} elseif ($search["periode_laporan"] === "Bulanan" && $search["bulan"] !== "" && $search["tahun"] !== "") {
			$param .= " and to_char( sd.waktu, 'mm/yyyy' ) ilike '%" . $search["bulan"] . "/" . $search["tahun"] . "' ";
		} elseif ($search["periode_laporan"] === "Rentang Waktu" && $search["tanggal_awal"] !== "" && $search["tanggal_akhir"] !== "") {
			$param .= " and sd.waktu BETWEEN '" . date2mysql($search['tanggal_awal']) . " 00:00:00' AND '" . date2mysql($search['tanggal_akhir']) . " 23:59:59'";
		}

		if (!empty($search['status_keluar'])) {
			$param .= " and lp.tindak_lanjut = '" . $search['status_keluar'] . "' ";
		}

		$param2 = " and jenis_layanan IN ('Rawat Inap', 'Intensive Care') ";
		// $param2 = "";
		// if ($search["jenis_rawat"] === "1") {
		// 	$param2 .= " and jenis_layanan IN ('Poliklinik', 'Medical Check Up') ";
		// } elseif ($search["jenis_rawat"] === "2") {
		// 	$param2 .= " and jenis_layanan IN ('Rawat Inap', 'Intensive Care') ";
		// } elseif ($search["jenis_rawat"] === "3") {
		// 	$param2 .= " and jenis_layanan = 'IGD' ";
		// }

		$sql = "SELECT kode_icd, diagnosa,			
			SUM(CASE WHEN kelamin = 'L' AND umur_jam < 1 THEN 1 ELSE 0 END) AS l_jam_1,
			SUM(CASE WHEN kelamin = 'P' AND umur_jam < 1 THEN 1 ELSE 0 END) AS p_jam_1,
			SUM(CASE WHEN kelamin = 'L' AND umur_jam >= 1 AND umur_jam < 24 THEN 1 ELSE 0 END) AS l_jam_1_23,
			SUM(CASE WHEN kelamin = 'P' AND umur_jam >= 1 AND umur_jam < 24 THEN 1 ELSE 0 END) AS p_jam_1_23,
			SUM(CASE WHEN kelamin = 'L' AND umur_hari BETWEEN 1 AND 7 THEN 1 ELSE 0 END) AS l_hari_1_7,
			SUM(CASE WHEN kelamin = 'P' AND umur_hari BETWEEN 1 AND 7 THEN 1 ELSE 0 END) AS p_hari_1_7,
			SUM(CASE WHEN kelamin = 'L' AND umur_hari BETWEEN 8 AND 28 THEN 1 ELSE 0 END) AS l_hari_8_28,
			SUM(CASE WHEN kelamin = 'P' AND umur_hari BETWEEN 8 AND 28 THEN 1 ELSE 0 END) AS p_hari_8_28,
			SUM(CASE WHEN kelamin = 'L' AND umur_hari BETWEEN 29 AND (365*3) THEN 1 ELSE 0 END) AS l_hari_29_bln_3,
			SUM(CASE WHEN kelamin = 'P' AND umur_hari BETWEEN 29 AND (365*3) THEN 1 ELSE 0 END) AS p_hari_29_bln_3,
			SUM(CASE WHEN kelamin = 'L' AND umur_hari > (365*3) AND umur_hari <= (365*6) THEN 1 ELSE 0 END) AS l_bln_3_6,
			SUM(CASE WHEN kelamin = 'P' AND umur_hari > (365*3) AND umur_hari <= (365*6) THEN 1 ELSE 0 END) AS p_bln_3_6,
			SUM(CASE WHEN kelamin = 'L' AND umur_hari > (365*6) AND umur_hari <= (365*11) THEN 1 ELSE 0 END) AS l_bln_6_11,
			SUM(CASE WHEN kelamin = 'P' AND umur_hari > (365*6) AND umur_hari <= (365*11) THEN 1 ELSE 0 END) AS p_bln_6_11,
			SUM(CASE WHEN kelamin = 'L' AND umur_tahun > 1 AND umur_tahun <= 4 THEN 1 ELSE 0 END) AS l_thn_1_4,
			SUM(CASE WHEN kelamin = 'P' AND umur_tahun > 1 AND umur_tahun <= 4 THEN 1 ELSE 0 END) AS p_thn_1_4,
			SUM(CASE WHEN kelamin = 'L' AND umur_tahun > 4 AND umur_tahun <= 9 THEN 1 ELSE 0 END) AS l_thn_5_9,
			SUM(CASE WHEN kelamin = 'P' AND umur_tahun > 4 AND umur_tahun <= 9 THEN 1 ELSE 0 END) AS p_thn_5_9,
			SUM(CASE WHEN kelamin = 'L' AND umur_tahun > 9 AND umur_tahun <= 14 THEN 1 ELSE 0 END) AS l_thn_10_14,
			SUM(CASE WHEN kelamin = 'P' AND umur_tahun > 9 AND umur_tahun <= 14 THEN 1 ELSE 0 END) AS p_thn_10_14,
			SUM(CASE WHEN kelamin = 'L' AND umur_tahun > 14 AND umur_tahun <= 19 THEN 1 ELSE 0 END) AS l_thn_15_19,
			SUM(CASE WHEN kelamin = 'P' AND umur_tahun > 14 AND umur_tahun <= 19 THEN 1 ELSE 0 END) AS p_thn_15_19,
			SUM(CASE WHEN kelamin = 'L' AND umur_tahun > 19 AND umur_tahun <= 24 THEN 1 ELSE 0 END) AS l_thn_20_24,
			SUM(CASE WHEN kelamin = 'P' AND umur_tahun > 19 AND umur_tahun <= 24 THEN 1 ELSE 0 END) AS p_thn_20_24,
			SUM(CASE WHEN kelamin = 'L' AND umur_tahun > 24 AND umur_tahun <= 29 THEN 1 ELSE 0 END) AS l_thn_25_29,
			SUM(CASE WHEN kelamin = 'P' AND umur_tahun > 24 AND umur_tahun <= 29 THEN 1 ELSE 0 END) AS p_thn_25_29,
			SUM(CASE WHEN kelamin = 'L' AND umur_tahun > 29 AND umur_tahun <= 34 THEN 1 ELSE 0 END) AS l_thn_30_34,
			SUM(CASE WHEN kelamin = 'P' AND umur_tahun > 29 AND umur_tahun <= 34 THEN 1 ELSE 0 END) AS p_thn_30_34,
			SUM(CASE WHEN kelamin = 'L' AND umur_tahun > 34 AND umur_tahun <= 39 THEN 1 ELSE 0 END) AS l_thn_35_39,
			SUM(CASE WHEN kelamin = 'P' AND umur_tahun > 34 AND umur_tahun <= 39 THEN 1 ELSE 0 END) AS p_thn_35_39,
			SUM(CASE WHEN kelamin = 'L' AND umur_tahun > 39 AND umur_tahun <= 44 THEN 1 ELSE 0 END) AS l_thn_40_44,
			SUM(CASE WHEN kelamin = 'P' AND umur_tahun > 39 AND umur_tahun <= 44 THEN 1 ELSE 0 END) AS p_thn_40_44,
			SUM(CASE WHEN kelamin = 'L' AND umur_tahun > 44 AND umur_tahun <= 49 THEN 1 ELSE 0 END) AS l_thn_45_49,
			SUM(CASE WHEN kelamin = 'P' AND umur_tahun > 44 AND umur_tahun <= 49 THEN 1 ELSE 0 END) AS p_thn_45_49,
			SUM(CASE WHEN kelamin = 'L' AND umur_tahun > 49 AND umur_tahun <= 54 THEN 1 ELSE 0 END) AS l_thn_50_54,
			SUM(CASE WHEN kelamin = 'P' AND umur_tahun > 49 AND umur_tahun <= 54 THEN 1 ELSE 0 END) AS p_thn_50_54,
			SUM(CASE WHEN kelamin = 'L' AND umur_tahun > 54 AND umur_tahun <= 59 THEN 1 ELSE 0 END) AS l_thn_55_59,
			SUM(CASE WHEN kelamin = 'P' AND umur_tahun > 54 AND umur_tahun <= 59 THEN 1 ELSE 0 END) AS p_thn_55_59,
			SUM(CASE WHEN kelamin = 'L' AND umur_tahun > 59 AND umur_tahun <= 64 THEN 1 ELSE 0 END) AS l_thn_60_64,
			SUM(CASE WHEN kelamin = 'P' AND umur_tahun > 59 AND umur_tahun <= 64 THEN 1 ELSE 0 END) AS p_thn_60_64,
			SUM(CASE WHEN kelamin = 'L' AND umur_tahun > 64 AND umur_tahun <= 69 THEN 1 ELSE 0 END) AS l_thn_65_69,
			SUM(CASE WHEN kelamin = 'P' AND umur_tahun > 64 AND umur_tahun <= 69 THEN 1 ELSE 0 END) AS p_thn_65_69,
			SUM(CASE WHEN kelamin = 'L' AND umur_tahun > 69 AND umur_tahun <= 74 THEN 1 ELSE 0 END) AS l_thn_70_74,
			SUM(CASE WHEN kelamin = 'P' AND umur_tahun > 69 AND umur_tahun <= 74 THEN 1 ELSE 0 END) AS p_thn_70_74,
			SUM(CASE WHEN kelamin = 'L' AND umur_tahun > 74 AND umur_tahun <= 79 THEN 1 ELSE 0 END) AS l_thn_75_79,
			SUM(CASE WHEN kelamin = 'P' AND umur_tahun > 74 AND umur_tahun <= 79 THEN 1 ELSE 0 END) AS p_thn_75_79,
			SUM(CASE WHEN kelamin = 'L' AND umur_tahun > 79 AND umur_tahun <= 84 THEN 1 ELSE 0 END) AS l_thn_80_84,
			SUM(CASE WHEN kelamin = 'P' AND umur_tahun > 79 AND umur_tahun <= 84 THEN 1 ELSE 0 END) AS p_thn_80_84,
			SUM(CASE WHEN kelamin = 'L' AND umur_tahun > 84 THEN 1 ELSE 0 END) AS l_thn_85_plus,
			SUM(CASE WHEN kelamin = 'P' AND umur_tahun > 84 THEN 1 ELSE 0 END) AS p_thn_85_plus,
			SUM ( CASE WHEN kelamin = 'L' AND tindak_lanjut = 'Pemulasaran Jenazah' THEN 1 ELSE 0 END ) AS total_l_meninggal,
			SUM ( CASE WHEN kelamin = 'P' AND tindak_lanjut = 'Pemulasaran Jenazah' THEN 1 ELSE 0 END ) AS total_p_meninggal,
			SUM ( CASE WHEN kelamin = 'L' AND tindak_lanjut != 'Pemulasaran Jenazah' THEN 1 ELSE 0 END ) AS total_l_hidup,
			SUM ( CASE WHEN kelamin = 'P' AND tindak_lanjut != 'Pemulasaran Jenazah' THEN 1 ELSE 0 END ) AS total_p_hidup,
			COUNT(*) AS total
		FROM (
			SELECT
				TRIM(COALESCE(sgss.kode_icdx_rinci, sgss2.kode_icdx_rinci)) AS kode_icd,
				TRIM(COALESCE(sgss.nama, sgss2.nama, sd.golongan_sebab_sakit_lain)) AS diagnosa,
				p.kelamin, lp.tindak_lanjut,
				EXTRACT(EPOCH FROM (pd.tanggal_daftar - p.tanggal_lahir)) / 3600 AS umur_jam,
				EXTRACT(DAY FROM (pd.tanggal_daftar - p.tanggal_lahir)) AS umur_hari,
				EXTRACT(YEAR FROM age(pd.tanggal_daftar, p.tanggal_lahir)) AS umur_tahun
			FROM sm_diagnosa sd
			JOIN (
				SELECT id, id_pendaftaran, jenis_layanan, tindak_lanjut
				FROM sm_layanan_pendaftaran
				WHERE id IS NOT NULL $param2
			) AS lp ON lp.id = sd.id_layanan_pendaftaran
			LEFT JOIN sm_golongan_sebab_sakit sgss ON sd.id_golongan_sebab_sakit = sgss.id
			LEFT JOIN sm_golongan_sebab_sakit sgss2 ON sd.id_pengkodean = sgss2.id
			JOIN sm_pendaftaran pd ON lp.id_pendaftaran = pd.id
			JOIN sm_pasien p ON pd.id_pasien = p.id
			WHERE
				COALESCE(sgss.kode_icdx_rinci, sgss2.kode_icdx_rinci) IS NOT NULL
				AND LEFT(sgss.kode_icdx, 1) NOT IN ('O', 'P', 'R', 'Z')
				$param
		) AS subquery
		GROUP BY kode_icd, diagnosa
		ORDER BY total DESC
		LIMIT 10
		";

		$results = $this->db->query($sql)->result();

		$data["data"] = $results;
		$data["periode"] = $this->getPeriodeLaporan($search);

		return $data;
	}

	function getListDataLaporanRM18($limit, $start, $search)
	{
		$param = "";
		if ($search["periode_laporan"] === "Harian") {
			if ($search["tanggal_harian"] !== "") {
				$param .= " and to_char( sd.waktu, 'yyyy-mm-dd' ) ilike '%" . date2mysql($search['tanggal_harian']) . "' ";
			}
		} elseif ($search["periode_laporan"] === "Bulanan" && $search["bulan"] !== "" && $search["tahun"] !== "") {
			$param .= " and to_char( sd.waktu, 'mm/yyyy' ) ilike '%" . $search["bulan"] . "/" . $search["tahun"] . "' ";
		} elseif ($search["periode_laporan"] === "Rentang Waktu" && $search["tanggal_awal"] !== "" && $search["tanggal_akhir"] !== "") {
			$param .= " and sd.waktu BETWEEN '" . date2mysql($search['tanggal_awal']) . " 00:00:00' AND '" . date2mysql($search['tanggal_akhir']) . " 23:59:59'";
		}

		if (!empty($search['status_keluar'])) {
			$param .= " and lp.tindak_lanjut = '" . $search['status_keluar'] . "' ";
		}


		// if ($search['jenis_kasus'] !== '') {
		// 	$param .= " and jenis_kasus = '" . $search["jenis_kasus"] . "' ";
		// }

		$param2 = " and jenis_layanan IN ('Poliklinik', 'Medical Check Up', 'IGD') ";

		$sql = "SELECT kode_icd, diagnosa,
			SUM(CASE WHEN kelamin = 'L' AND umur_jam < 1 THEN 1 ELSE 0 END) AS l_jam_1,
			SUM(CASE WHEN kelamin = 'P' AND umur_jam < 1 THEN 1 ELSE 0 END) AS p_jam_1,
			SUM(CASE WHEN kelamin = 'L' AND umur_jam >= 1 AND umur_jam < 24 THEN 1 ELSE 0 END) AS l_jam_1_23,
			SUM(CASE WHEN kelamin = 'P' AND umur_jam >= 1 AND umur_jam < 24 THEN 1 ELSE 0 END) AS p_jam_1_23,
			SUM(CASE WHEN kelamin = 'L' AND umur_hari BETWEEN 1 AND 7 THEN 1 ELSE 0 END) AS l_hari_1_7,
			SUM(CASE WHEN kelamin = 'P' AND umur_hari BETWEEN 1 AND 7 THEN 1 ELSE 0 END) AS p_hari_1_7,
			SUM(CASE WHEN kelamin = 'L' AND umur_hari BETWEEN 8 AND 28 THEN 1 ELSE 0 END) AS l_hari_8_28,
			SUM(CASE WHEN kelamin = 'P' AND umur_hari BETWEEN 8 AND 28 THEN 1 ELSE 0 END) AS p_hari_8_28,
			SUM(CASE WHEN kelamin = 'L' AND umur_hari BETWEEN 29 AND (365*3) THEN 1 ELSE 0 END) AS l_hari_29_bln_3,
			SUM(CASE WHEN kelamin = 'P' AND umur_hari BETWEEN 29 AND (365*3) THEN 1 ELSE 0 END) AS p_hari_29_bln_3,
			SUM(CASE WHEN kelamin = 'L' AND umur_hari > (365*3) AND umur_hari <= (365*6) THEN 1 ELSE 0 END) AS l_bln_3_6,
			SUM(CASE WHEN kelamin = 'P' AND umur_hari > (365*3) AND umur_hari <= (365*6) THEN 1 ELSE 0 END) AS p_bln_3_6,
			SUM(CASE WHEN kelamin = 'L' AND umur_hari > (365*6) AND umur_hari <= (365*11) THEN 1 ELSE 0 END) AS l_bln_6_11,
			SUM(CASE WHEN kelamin = 'P' AND umur_hari > (365*6) AND umur_hari <= (365*11) THEN 1 ELSE 0 END) AS p_bln_6_11,
			SUM(CASE WHEN kelamin = 'L' AND umur_tahun > 1 AND umur_tahun <= 4 THEN 1 ELSE 0 END) AS l_thn_1_4,
			SUM(CASE WHEN kelamin = 'P' AND umur_tahun > 1 AND umur_tahun <= 4 THEN 1 ELSE 0 END) AS p_thn_1_4,
			SUM(CASE WHEN kelamin = 'L' AND umur_tahun > 4 AND umur_tahun <= 9 THEN 1 ELSE 0 END) AS l_thn_5_9,
			SUM(CASE WHEN kelamin = 'P' AND umur_tahun > 4 AND umur_tahun <= 9 THEN 1 ELSE 0 END) AS p_thn_5_9,
			SUM(CASE WHEN kelamin = 'L' AND umur_tahun > 9 AND umur_tahun <= 14 THEN 1 ELSE 0 END) AS l_thn_10_14,
			SUM(CASE WHEN kelamin = 'P' AND umur_tahun > 9 AND umur_tahun <= 14 THEN 1 ELSE 0 END) AS p_thn_10_14,
			SUM(CASE WHEN kelamin = 'L' AND umur_tahun > 14 AND umur_tahun <= 19 THEN 1 ELSE 0 END) AS l_thn_15_19,
			SUM(CASE WHEN kelamin = 'P' AND umur_tahun > 14 AND umur_tahun <= 19 THEN 1 ELSE 0 END) AS p_thn_15_19,
			SUM(CASE WHEN kelamin = 'L' AND umur_tahun > 19 AND umur_tahun <= 24 THEN 1 ELSE 0 END) AS l_thn_20_24,
			SUM(CASE WHEN kelamin = 'P' AND umur_tahun > 19 AND umur_tahun <= 24 THEN 1 ELSE 0 END) AS p_thn_20_24,
			SUM(CASE WHEN kelamin = 'L' AND umur_tahun > 24 AND umur_tahun <= 29 THEN 1 ELSE 0 END) AS l_thn_25_29,
			SUM(CASE WHEN kelamin = 'P' AND umur_tahun > 24 AND umur_tahun <= 29 THEN 1 ELSE 0 END) AS p_thn_25_29,
			SUM(CASE WHEN kelamin = 'L' AND umur_tahun > 29 AND umur_tahun <= 34 THEN 1 ELSE 0 END) AS l_thn_30_34,
			SUM(CASE WHEN kelamin = 'P' AND umur_tahun > 29 AND umur_tahun <= 34 THEN 1 ELSE 0 END) AS p_thn_30_34,
			SUM(CASE WHEN kelamin = 'L' AND umur_tahun > 34 AND umur_tahun <= 39 THEN 1 ELSE 0 END) AS l_thn_35_39,
			SUM(CASE WHEN kelamin = 'P' AND umur_tahun > 34 AND umur_tahun <= 39 THEN 1 ELSE 0 END) AS p_thn_35_39,
			SUM(CASE WHEN kelamin = 'L' AND umur_tahun > 39 AND umur_tahun <= 44 THEN 1 ELSE 0 END) AS l_thn_40_44,
			SUM(CASE WHEN kelamin = 'P' AND umur_tahun > 39 AND umur_tahun <= 44 THEN 1 ELSE 0 END) AS p_thn_40_44,
			SUM(CASE WHEN kelamin = 'L' AND umur_tahun > 44 AND umur_tahun <= 49 THEN 1 ELSE 0 END) AS l_thn_45_49,
			SUM(CASE WHEN kelamin = 'P' AND umur_tahun > 44 AND umur_tahun <= 49 THEN 1 ELSE 0 END) AS p_thn_45_49,
			SUM(CASE WHEN kelamin = 'L' AND umur_tahun > 49 AND umur_tahun <= 54 THEN 1 ELSE 0 END) AS l_thn_50_54,
			SUM(CASE WHEN kelamin = 'P' AND umur_tahun > 49 AND umur_tahun <= 54 THEN 1 ELSE 0 END) AS p_thn_50_54,
			SUM(CASE WHEN kelamin = 'L' AND umur_tahun > 54 AND umur_tahun <= 59 THEN 1 ELSE 0 END) AS l_thn_55_59,
			SUM(CASE WHEN kelamin = 'P' AND umur_tahun > 54 AND umur_tahun <= 59 THEN 1 ELSE 0 END) AS p_thn_55_59,
			SUM(CASE WHEN kelamin = 'L' AND umur_tahun > 59 AND umur_tahun <= 64 THEN 1 ELSE 0 END) AS l_thn_60_64,
			SUM(CASE WHEN kelamin = 'P' AND umur_tahun > 59 AND umur_tahun <= 64 THEN 1 ELSE 0 END) AS p_thn_60_64,
			SUM(CASE WHEN kelamin = 'L' AND umur_tahun > 64 AND umur_tahun <= 69 THEN 1 ELSE 0 END) AS l_thn_65_69,
			SUM(CASE WHEN kelamin = 'P' AND umur_tahun > 64 AND umur_tahun <= 69 THEN 1 ELSE 0 END) AS p_thn_65_69,
			SUM(CASE WHEN kelamin = 'L' AND umur_tahun > 69 AND umur_tahun <= 74 THEN 1 ELSE 0 END) AS l_thn_70_74,
			SUM(CASE WHEN kelamin = 'P' AND umur_tahun > 69 AND umur_tahun <= 74 THEN 1 ELSE 0 END) AS p_thn_70_74,
			SUM(CASE WHEN kelamin = 'L' AND umur_tahun > 74 AND umur_tahun <= 79 THEN 1 ELSE 0 END) AS l_thn_75_79,
			SUM(CASE WHEN kelamin = 'P' AND umur_tahun > 74 AND umur_tahun <= 79 THEN 1 ELSE 0 END) AS p_thn_75_79,
			SUM(CASE WHEN kelamin = 'L' AND umur_tahun > 79 AND umur_tahun <= 84 THEN 1 ELSE 0 END) AS l_thn_80_84,
			SUM(CASE WHEN kelamin = 'P' AND umur_tahun > 79 AND umur_tahun <= 84 THEN 1 ELSE 0 END) AS p_thn_80_84,
			SUM(CASE WHEN kelamin = 'L' AND umur_tahun > 84 THEN 1 ELSE 0 END) AS l_thn_85_plus,
			SUM(CASE WHEN kelamin = 'P' AND umur_tahun > 84 THEN 1 ELSE 0 END) AS p_thn_85_plus,
			SUM ( CASE WHEN kelamin = 'L' AND jenis_kasus = '1' THEN 1 ELSE 0 END ) AS total_l_baru,
			SUM ( CASE WHEN kelamin = 'P' AND jenis_kasus = '1' THEN 1 ELSE 0 END ) AS total_p_baru,
			SUM ( CASE WHEN kelamin = 'L' THEN 1 ELSE 0 END ) AS total_l_kunjungan,
			SUM ( CASE WHEN kelamin = 'P' THEN 1 ELSE 0 END ) AS total_p_kunjungan,
			COUNT(*) AS total
		FROM (
			SELECT
				TRIM(COALESCE(sgss.kode_icdx_rinci, sgss2.kode_icdx_rinci)) AS kode_icd,
				TRIM(COALESCE(sgss.nama, sgss2.nama, sd.golongan_sebab_sakit_lain)) AS diagnosa,
				p.kelamin, lp.tindak_lanjut, sd.jenis_kasus,
				EXTRACT(EPOCH FROM (pd.tanggal_daftar - p.tanggal_lahir)) / 3600 AS umur_jam,
				EXTRACT(DAY FROM (pd.tanggal_daftar - p.tanggal_lahir)) AS umur_hari,
				EXTRACT(YEAR FROM age(pd.tanggal_daftar, p.tanggal_lahir)) AS umur_tahun
			FROM sm_diagnosa sd
			JOIN (
				SELECT id, id_pendaftaran, jenis_layanan, tindak_lanjut
				FROM sm_layanan_pendaftaran
				WHERE id IS NOT NULL $param2
			) AS lp ON lp.id = sd.id_layanan_pendaftaran
			LEFT JOIN sm_golongan_sebab_sakit sgss ON sd.id_golongan_sebab_sakit = sgss.id
			LEFT JOIN sm_golongan_sebab_sakit sgss2 ON sd.id_pengkodean = sgss2.id
			JOIN sm_pendaftaran pd ON lp.id_pendaftaran = pd.id
			JOIN sm_pasien p ON pd.id_pasien = p.id
			WHERE
				COALESCE(sgss.kode_icdx_rinci, sgss2.kode_icdx_rinci) IS NOT NULL
				AND LEFT(sgss.kode_icdx, 1) NOT IN ('O', 'P', 'R', 'Z')
				$param
		) AS subquery
		GROUP BY kode_icd, diagnosa
		ORDER BY total DESC
		LIMIT 10
		";

		$results = $this->db->query($sql)->result();

		$data["data"] = $results;
		$data["periode"] = $this->getPeriodeLaporan($search);

		return $data;
	}


	private function getBulanIndo($bulan)
	{
		if (!empty($bulan)) {
			if ($bulan == '01') {
				$bulanIndo = "Januari";
			} elseif ($bulan == '02') {
				$bulanIndo = "Februari";
			} elseif ($bulan == '03') {
				$bulanIndo = "Maret";
			} elseif ($bulan == '04') {
				$bulanIndo = "April";
			} elseif ($bulan == '05') {
				$bulanIndo = "Mei";
			} elseif ($bulan == '06') {
				$bulanIndo = "Juni";
			} elseif ($bulan == '07') {
				$bulanIndo = "Juli";
			} elseif ($bulan == '08') {
				$bulanIndo = "Agustus";
			} elseif ($bulan == '09') {
				$bulanIndo = "September";
			} elseif ($bulan == '10') {
				$bulanIndo = "Oktober";
			} elseif ($bulan == '11') {
				$bulanIndo = "November";
			} elseif ($bulan == '12') {
				$bulanIndo = "Desember";
			}
		}

		return $bulanIndo;
	}

	function getPeriodeLaporan($search)
	{
		if ($search["periode_laporan"] === "Bulanan") {
			$namaBulan = [
				'01' => 'Januari',
				'02' => 'Februari',
				'03' => 'Maret',
				'04' => 'April',
				'05' => 'Mei',
				'06' => 'Juni',
				'07' => 'Juli',
				'08' => 'Agustus',
				'09' => 'September',
				'10' => 'Oktober',
				'11' => 'November',
				'12' => 'Desember',
			];
			$bulan = $search["bulan"];
			$tahun = $search["tahun"];
			$periode = isset($namaBulan[$bulan]) ? $namaBulan[$bulan] . ' ' . $tahun : '';
		} elseif ($search["periode_laporan"] === "Harian") {
			$periode = get_date_format(date2mysql($search['tanggal_harian']));
		} elseif ($search["periode_laporan"] === "Rentang Waktu") {
			$periode = get_date_format(date2mysql($search['tanggal_awal'])) . " s.d " . get_date_format(date2mysql($search['tanggal_akhir']));
		} else {
			$periode = '';
		}

		return $periode;
	}
}
