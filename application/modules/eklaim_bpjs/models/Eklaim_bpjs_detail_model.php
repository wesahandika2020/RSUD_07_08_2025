<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Eklaim_bpjs_detail_model extends CI_Model
{

	function __construct()
	{
		parent::__construct();
		$this->eklaim_config = $this->default->getConfigEklaim();
		$this->load->model('eklaim_bpjs/Eklaim_bpjs_model', 'eklaim_bpjs');
		$this->load->model('eklaim_bpjs/Eklaim_bpjs_auto_model', 'm_auto_eklaim');
		$this->datetime = date('Y-m-d H:i:s');
	}

	function getDetailEkalim($id_pendaftaran)
	{
		$query = "SELECT lp.id, pd.ID AS id_pendaftaran, P.no_identitas, P.nama AS nama_pasien, pd.id_pasien AS nomor_rm, 
					pd.no_sep AS nomor_sep, pd.no_polish AS nomor_kartu, pd.tanggal_daftar AS tgl_masuk, pd.tanggal_keluar AS tgl_pulang, 
					pd.jenis_pendaftaran, CASE WHEN pd.jenis_rawat = 'Inap' THEN '1' ELSE'2' END jenis_rawat,
					CASE WHEN pd.hak_kelas = 'KELAS I' THEN '1' WHEN pd.hak_kelas = 'KELAS II' THEN '2' WHEN pd.hak_kelas = 'KELAS III' 
					THEN '3' ELSE'3' END kelas_rawat, P.tanggal_lahir AS tgl_lahir, pj.nama as nama_penjamin,
					EXTRACT ( EPOCH FROM pd.tanggal_keluar - pd.tanggal_daftar ) AS selisih, 
					EXTRACT ( MINUTE FROM pd.tanggal_keluar - pd.tanggal_daftar ) AS selisih_menit,
					CASE WHEN P.kelamin = 'P' THEN '2' ELSE'1' END gender, 

					null AS waktu_ranap, null AS keluar_ranap, 
					null AS waktu_icu, null AS keluar_icu, 
					null AS total_hari, null AS icu_los, 
					
					'0' berat_badan_lahir,
					(pd.tanggal_keluar::date - pd.tanggal_daftar::date) + 1 AS selisih_hari,
					concat ('(', FLOOR(EXTRACT(EPOCH FROM (pd.tanggal_keluar - pd.tanggal_daftar)) / 3600) , ':', 
					lpad( EXTRACT ( MINUTE FROM ( pd.tanggal_keluar - pd.tanggal_daftar ) ) :: VARCHAR, 2, '0' ),') jam') AS selisih_waktu,
					FLOOR(EXTRACT(EPOCH FROM (pd.tanggal_keluar - pd.tanggal_daftar)) / 3600) AS jumlah_jam, 
					lpad( EXTRACT ( MINUTE FROM ( pd.tanggal_keluar - pd.tanggal_daftar ) ) :: VARCHAR, 2, '0' ) jumlah_menit,
					pe.nama AS nama_dokter, s.nama AS spesialisasi, lp.tindak_lanjut

					FROM sm_pendaftaran pd
					JOIN fn_layanan_pendaftaran_terakhir ( pd.ID :: INTEGER ) as fn_lp ON TRUE 
					JOIN sm_layanan_pendaftaran lp on fn_lp.id = lp.id

					JOIN sm_pasien as p on pd.id_pasien = p.id
					JOIN sm_penjamin as pj on lp.id_penjamin = pj.id
					JOIN sm_tenaga_medis tm on tm.id = lp.id_dokter
					join sm_pegawai as pe on pe.id = tm.id_pegawai
					left join sm_spesialisasi as s on s.id = lp.id_unit_layanan 
						
					WHERE pd.ID = '$id_pendaftaran' ";
		$data = $this->db->query($query)->row();

		$cekQueryRanap = $this->db->query("SELECT * FROM fn_ranap_by($id_pendaftaran::INTEGER)")->row()->id ?? null;
		if (!empty($cekQueryRanap)) {
			$queryRanap = "SELECT ri.waktu_masuk AS waktu_ranap, ri.waktu_keluar AS keluar_ranap, ri.total_hari
										FROM fn_ranap_by ($id_pendaftaran::INTEGER) as fn_ri 
										JOIN sm_rawat_inap ri on fn_ri.id = ri.id";
			$ranap = $this->db->query($queryRanap)->row();

			$data->waktu_ranap = $ranap->waktu_ranap;
			$data->keluar_ranap = $ranap->keluar_ranap;
			$data->total_hari = $ranap->total_hari;
		}

		$cekQueryIcare = $this->db->query("SELECT * FROM fn_icare_by_($id_pendaftaran::INTEGER)")->row()->id ?? null;
		if (!empty($cekQueryIcare)) {
			$queryICare = "SELECT ic.waktu_masuk AS waktu_icu, ic.waktu_keluar AS keluar_icu, ic.total_hari AS icu_los				
										FROM fn_icare_by_ ( $id_pendaftaran :: INTEGER ) fn_ic 
										JOIN sm_intensive_care ic ON fn_ic.ID = ic.ID ";
			$icare = $this->db->query($queryICare)->row();

			$data->waktu_icu = $icare->waktu_icu;
			$data->keluar_icu = $icare->keluar_icu;
			$data->icu_los = $icare->icu_los;
		}

		$data->tarif_radiologi = $this->getTarifRadiologi($id_pendaftaran);
		$data->tarif_laboratorium = $this->getTarifLaboratorium($id_pendaftaran);
		$data->tarif_hemodialisa = $this->getTarifHemodialisa($id_pendaftaran);
		$data->tarif_akomodasi = $this->getTarifAkomodasi($id_pendaftaran);
		$data->tarif_kamar = $this->getTarifKamar($id_pendaftaran);
		$data->tarif_intensive_care = $this->getTarifIntensiveCare($id_pendaftaran);
		$data->tarif_pelayanan_darah = $this->getTarifPelayananDarah($id_pendaftaran);
		$data->tarif_konsultasi = $this->getTarifKonsultasi($id_pendaftaran);
		$data->tarif_keperawatan = $this->getTarifKeperawatan($id_pendaftaran);
		$data->tarif_tenaga_ahli = $this->getTarifTenagaAhli($id_pendaftaran);
		$data->tarif_rehabilitas = $this->getTarifRehabilitas($id_pendaftaran);
		$data->tarif_bedah_ok = $this->getTarifBedahOK($id_pendaftaran);
		$data->tarif_non_bedah_vk = $this->getTarifNonBedahVK($id_pendaftaran);
		$data->tarif_obat = $this->getTarifObat($id_pendaftaran);
		$data->tarif_bhp = $this->getTarifBHP($id_pendaftaran);
		$data->tarif_obat_kronis = $this->getTarifObatKronis($id_pendaftaran);
		$data->tarif_obat_kemoterapi = $this->getTarifObatKemoterapi($id_pendaftaran);
		$data->tarif_alkes = $this->getTarifAlkes($id_pendaftaran);
		$data->tarif_sewa_alat = $this->getTarifSewaAlat($id_pendaftaran);

		$data->status_klaim = null;
		$data->method_status = null;

		$statusKlaim = $this->getStatusKlaim($id_pendaftaran);

		if (!empty($statusKlaim)) {
			$data->status_klaim = capitalizeWords($statusKlaim->status_bridging);
			$data->method_status = $statusKlaim->method_status;
		}


		return $data;
	}

	function getTarifRadiologi($id_pendaftaran)
	{
		$sql = "SELECT sum(drad.total) total
						FROM sm_pendaftaran pd
						JOIN sm_layanan_pendaftaran as lp ON (pd.id=lp.id_pendaftaran)
						JOIN sm_order_radiologi as orad ON (lp.id = orad.id_layanan_pendaftaran)
						JOIN sm_radiologi as rad ON (orad.id = rad.id_order_radiologi)
						JOIN sm_detail_radiologi as drad ON (rad.id=drad.id_radiologi)
						WHERE pd.id = '$id_pendaftaran' AND orad.status='konfirm' 
						GROUP BY pd.id ";

		$data = $this->db->query($sql)->row()->total ?? null;
		return $data;
	}

	function getTarifLaboratorium($id_pendaftaran)
	{
		$sql = "SELECT sum(dlab.total) total
		FROM sm_pendaftaran pd
		JOIN sm_layanan_pendaftaran as lp ON (pd.id=lp.id_pendaftaran)
		JOIN sm_order_laboratorium as olab ON (lp.id = olab.id_layanan_pendaftaran)
		JOIN sm_laboratorium as lab ON (olab.id = lab.id_order_laboratorium)
		JOIN sm_detail_laboratorium as dlab ON (lab.id=dlab.id_laboratorium)
		WHERE pd.id = '$id_pendaftaran' AND olab.status='konfirm' 
		GROUP BY pd.id ";

		$data = $this->db->query($sql)->row()->total ?? null;
		return $data;
	}

	function getTarifHemodialisa($id_pendaftaran)
	{
		$sql = "SELECT sum(ttp.total) as total
		FROM sm_pendaftaran pd
		JOIN sm_layanan_pendaftaran as lp ON (pd.id=lp.id_pendaftaran)
		JOIN sm_tarif_tindakan_pasien as ttp ON (lp.id=ttp.id_layanan_pendaftaran)
		JOIN sm_tarif_pelayanan as tp ON (ttp.id_tarif_pelayanan=tp.id)
		JOIN sm_layanan as l ON (tp.id_layanan=l.id)
		WHERE pd.id = '$id_pendaftaran' 
		AND lp.jenis_layanan='Hemodialisa'
		AND l.nama NOT IN ('Pemeriksaan/Konsultasi Dr Spesialis', 'Pemeriksaan Dokter Spesialis')
		AND l.id_jenis_pemeriksaan NOT IN ('19','14','21')
		AND l.id_jenis_pemeriksaan != '15'
		GROUP BY pd.id ";

		$data = $this->db->query($sql)->row()->total ?? null;
		return $data;
	}

	function getTarifAkomodasi($id_pendaftaran)
	{
		$sql = "SELECT sum(ttp.total) as total
		FROM sm_pendaftaran pd
		JOIN sm_layanan_pendaftaran as lp ON (pd.id=lp.id_pendaftaran)
		JOIN sm_tarif_tindakan_pasien as ttp ON (lp.id=ttp.id_layanan_pendaftaran)
		JOIN sm_tarif_pelayanan as tp ON (ttp.id_tarif_pelayanan=tp.id)
		JOIN sm_layanan as l ON (tp.id_layanan=l.id)
		WHERE pd.id = '$id_pendaftaran' 
		AND lp.jenis_layanan != 'Hemodialisa'
		AND l.id_jenis_pemeriksaan != 16
		AND l.id_jenis_pemeriksaan NOT IN ('19','14','21')
		AND l.id_jenis_pemeriksaan != '15'
		GROUP BY pd.id ";

		$data = $this->db->query($sql)->row()->total ?? null;
		return $data;
	}

	function getTarifKamar($id_pendaftaran)
	{
		$sql = "SELECT sum(ri.total_hari*ri.nominal) as total
		FROM sm_pendaftaran pd
		JOIN sm_layanan_pendaftaran as lp ON (pd.id=lp.id_pendaftaran)
		JOIN sm_rawat_inap as ri ON (lp.id=ri.id_layanan_pendaftaran)
		WHERE pd.id = '$id_pendaftaran'
		GROUP BY pd.id ";

		$data = $this->db->query($sql)->row()->total ?? null;
		return $data;
	}

	function getTarifIntensiveCare($id_pendaftaran)
	{
		$sql = "SELECT sum(ic.total_hari*ic.nominal) as total
		FROM sm_pendaftaran pd
		JOIN sm_layanan_pendaftaran as lp ON (pd.id=lp.id_pendaftaran)
		JOIN sm_intensive_care as ic ON (lp.id=ic.id_layanan_pendaftaran)
		WHERE pd.id = '$id_pendaftaran'
		GROUP BY pd.id ";

		$data = $this->db->query($sql)->row()->total ?? null;
		return $data;
	}

	function getTarifPelayananDarah($id_pendaftaran)
	{
		$sql = "SELECT sum(bd.total) as total
		FROM sm_pendaftaran pd
		JOIN sm_layanan_pendaftaran as lp ON (pd.id=lp.id_pendaftaran)
		JOIN sm_order_bank_darah as obd ON (lp.id=obd.id_layanan_pendaftaran)
		JOIN sm_tarif_bank_darah as bd ON (obd.id=bd.id_order_bank_darah)
		WHERE pd.id = '$id_pendaftaran' AND obd.diperiksa = 'Sudah'
		GROUP BY pd.id ";

		$data = $this->db->query($sql)->row()->total ?? null;
		return $data;
	}

	function getTarifKonsultasi($id_pendaftaran)
	{
		$sql = "SELECT sum(ttp.total) as total
		FROM sm_pendaftaran pd
		JOIN sm_layanan_pendaftaran as lp ON (pd.id=lp.id_pendaftaran)
		JOIN sm_tarif_tindakan_pasien as ttp ON (lp.id=ttp.id_layanan_pendaftaran)
		JOIN sm_tarif_pelayanan as tp ON (ttp.id_tarif_pelayanan=tp.id)
		JOIN sm_layanan as l ON (tp.id_layanan=l.id)
		WHERE pd.id = '$id_pendaftaran' 
		AND l.id_jenis_pemeriksaan = 16
		GROUP BY pd.id ";

		$data = $this->db->query($sql)->row()->total ?? null;
		return $data;
	}

	function getTarifKeperawatan($id_pendaftaran)
	{
		$sql = "SELECT sum(ttp.total) as total
		FROM sm_pendaftaran pd
		JOIN sm_layanan_pendaftaran as lp ON (pd.id=lp.id_pendaftaran)
		JOIN sm_tarif_tindakan_pasien as ttp ON (lp.id=ttp.id_layanan_pendaftaran)
		JOIN sm_tarif_pelayanan as tp ON (ttp.id_tarif_pelayanan=tp.id)
		JOIN sm_layanan as l ON (tp.id_layanan=l.id)
		WHERE pd.id = '$id_pendaftaran' 
		AND l.id_jenis_pemeriksaan IN ('19','14','21')
		AND l.nama != 'Administrasi Pasien Rawat Inap'
		GROUP BY pd.id ";

		$data = $this->db->query($sql)->row()->total ?? null;
		return $data;
	}

	function getTarifTenagaAhli($id_pendaftaran)
	{
		$sql = "SELECT sum(ttp.total) as total
		FROM sm_pendaftaran pd
		JOIN sm_layanan_pendaftaran as lp ON (pd.id=lp.id_pendaftaran)
		JOIN sm_tarif_tindakan_pasien as ttp ON (lp.id=ttp.id_layanan_pendaftaran)
		JOIN sm_tarif_pelayanan as tp ON (ttp.id_tarif_pelayanan=tp.id)
		JOIN sm_layanan as l ON (tp.id_layanan=l.id)
		WHERE pd.id = '$id_pendaftaran' 
		AND tp.id_eklaim = 'Tenaga Ahli'
		AND l.id_jenis_pemeriksaan IN ('19','14','21')
		GROUP BY pd.id ";

		$data = $this->db->query($sql)->row()->total ?? null;
		return $data;
	}

	function getTarifRehabilitas($id_pendaftaran)
	{
		$sql = "SELECT sum(ttp.total) as total
		FROM sm_pendaftaran pd
		JOIN sm_layanan_pendaftaran as lp ON (pd.id=lp.id_pendaftaran)
		JOIN sm_tarif_tindakan_pasien as ttp ON (lp.id=ttp.id_layanan_pendaftaran)
		JOIN sm_tarif_pelayanan as tp ON (ttp.id_tarif_pelayanan=tp.id)
		JOIN sm_layanan as l ON (tp.id_layanan=l.id)
		WHERE pd.id = '$id_pendaftaran' 
		AND l.id_jenis_pemeriksaan = '15'
		GROUP BY pd.id ";

		$data = $this->db->query($sql)->row()->total ?? null;
		return $data;
	}

	function getTarifBedahOK($id_pendaftaran)
	{
		$sql = "SELECT sum(tto.total) as total
		FROM sm_pendaftaran pd
		JOIN sm_layanan_pendaftaran as lp ON (pd.id=lp.id_pendaftaran)
		JOIN sm_jadwal_kamar_operasi as jko ON (lp.id=jko.id_layanan_pendaftaran)
		JOIN sm_tarif_operasi as tto ON (jko.id=tto.id_operasi)
		WHERE pd.id = '$id_pendaftaran' 
		AND tto.is_operasi = 'Ya'
		GROUP BY pd.id ";

		$data = $this->db->query($sql)->row()->total ?? null;
		return $data;
	}

	function getTarifNonBedahVK($id_pendaftaran)
	{
		$sql = "SELECT sum(tto.total) as total
		FROM sm_pendaftaran pd
		JOIN sm_layanan_pendaftaran as lp ON (pd.id=lp.id_pendaftaran)
		JOIN sm_jadwal_kamar_operasi as jko ON (lp.id=jko.id_layanan_pendaftaran)
		JOIN sm_tarif_operasi as tto ON (jko.id=tto.id_operasi)
		WHERE pd.id = '$id_pendaftaran' 
		AND tto.is_operasi != 'Ya'
		GROUP BY pd.id ";

		$data = $this->db->query($sql)->row()->total ?? null;
		return $data;
	}

	function getTarifObat($id_pendaftaran)
	{
		$sql = "SELECT (COALESCE(total_jumlah, 0) - COALESCE(total_retur, 0)) AS total
		FROM ( SELECT SUM(dpnj.qty * CEIL(dpnj.harga_jual)) AS total_jumlah
			FROM sm_pendaftaran pd
			JOIN sm_layanan_pendaftaran lp ON pd.id = lp.id_pendaftaran
			JOIN sm_penjualan pnj ON lp.id = pnj.id_layanan_pendaftaran
			JOIN sm_detail_penjualan dpnj ON pnj.id = dpnj.id_penjualan
			JOIN sm_kemasan_barang kb ON dpnj.id_kemasan = kb.id
			JOIN sm_barang br ON kb.id_barang = br.id
			WHERE pd.id = '$id_pendaftaran'
			AND dpnj.qty > 0
			AND pnj.jenis = 'Resep'
			AND br.is_obat_kronis = 0 ) AS penjualan
		CROSS JOIN ( SELECT COALESCE(SUM(rp.total), 0) AS total_retur
			FROM sm_pendaftaran pd
			JOIN sm_layanan_pendaftaran lp ON pd.id = lp.id_pendaftaran
			JOIN sm_penjualan pnj ON lp.id = pnj.id_layanan_pendaftaran
			JOIN sm_retur_penjualan rp ON pnj.id = rp.id_penjualan
			WHERE pd.id = '$id_pendaftaran' ) AS retur ";

		$data = $this->db->query($sql)->row()->total ?? null;
		return $data;
	}

	function getTarifBHP($id_pendaftaran)
	{
		$sql = "SELECT sum(dpnj.qty*ceil(dpnj.harga_jual)) total
		FROM sm_pendaftaran pd
		JOIN sm_layanan_pendaftaran as lp ON (pd.id=lp.id_pendaftaran)
		JOIN sm_penjualan as pnj ON (lp.id=pnj.id_layanan_pendaftaran)
		JOIN sm_detail_penjualan as dpnj ON (pnj.id=dpnj.id_penjualan)
		JOIN sm_kemasan_barang as kb ON (dpnj.id_kemasan=kb.id)
		JOIN sm_barang as br ON (kb.id_barang=br.id)
		WHERE pd.id = '$id_pendaftaran' 
		AND dpnj.qty > 0
		AND pnj.jenis = 'BHP'
		GROUP BY pd.id ";

		$data = $this->db->query($sql)->row()->total ?? null;
		return $data;
	}

	function getTarifObatKronis($id_pendaftaran)
	{
		$sql = "SELECT sum(dpnj.qty*ceil(dpnj.harga_jual)) total
		FROM sm_pendaftaran pd
		JOIN sm_layanan_pendaftaran as lp ON (pd.id=lp.id_pendaftaran)
		JOIN sm_penjualan as pnj ON (lp.id=pnj.id_layanan_pendaftaran)
		JOIN sm_detail_penjualan as dpnj ON (pnj.id=dpnj.id_penjualan)
		JOIN sm_kemasan_barang as kb ON (dpnj.id_kemasan=kb.id)
		JOIN sm_barang as br ON (kb.id_barang=br.id)
		WHERE pd.id = '$id_pendaftaran' 
		AND dpnj.qty > 0
		AND pnj.jenis = 'Resep'
		AND br.is_obat_kronis = 1
		GROUP BY pd.id ";

		$data = $this->db->query($sql)->row()->total ?? null;
		return $data;
	}

	function getTarifObatKemoterapi($id_pendaftaran)
	{
		$sql = "SELECT sum(dpnj.qty*dpnj.harga_jual) total
		FROM sm_pendaftaran pd
		JOIN sm_layanan_pendaftaran as lp ON (pd.id=lp.id_pendaftaran)
		JOIN sm_penjualan as pnj ON (lp.id=pnj.id_layanan_pendaftaran)
		JOIN sm_detail_penjualan as dpnj ON (pnj.id=dpnj.id_penjualan)
		JOIN sm_kemasan_barang as kb ON (dpnj.id_kemasan=kb.id)
		JOIN sm_barang as br ON (kb.id_barang=br.id)
		WHERE pd.id = '$id_pendaftaran' 
		AND dpnj.qty > 0
		AND br.id_eklaim = 'Obat Kemoterapi'
		GROUP BY pd.id ";

		$data = $this->db->query($sql)->row()->total ?? null;
		return $data;
	}

	function getTarifAlkes($id_pendaftaran)
	{
		$sql = "SELECT sum(dpnj.qty*dpnj.harga_jual) total
		FROM sm_pendaftaran pd
		JOIN sm_layanan_pendaftaran as lp ON (pd.id=lp.id_pendaftaran)
		JOIN sm_penjualan as pnj ON (lp.id=pnj.id_layanan_pendaftaran)
		JOIN sm_detail_penjualan as dpnj ON (pnj.id=dpnj.id_penjualan)
		JOIN sm_kemasan_barang as kb ON (dpnj.id_kemasan=kb.id)
		JOIN sm_barang as br ON (kb.id_barang=br.id)
		WHERE pd.id = '$id_pendaftaran' 
		AND dpnj.qty > 0
		AND br.id_eklaim = 'Alkes'
		GROUP BY pd.id ";

		$data = $this->db->query($sql)->row()->total ?? null;
		return $data;
	}

	function getTarifSewaAlat($id_pendaftaran)
	{
		$sql = "SELECT sum(dpnj.qty*dpnj.harga_jual) total
		FROM sm_pendaftaran pd
		JOIN sm_layanan_pendaftaran as lp ON (pd.id=lp.id_pendaftaran)
		JOIN sm_penjualan as pnj ON (lp.id=pnj.id_layanan_pendaftaran)
		JOIN sm_detail_penjualan as dpnj ON (pnj.id=dpnj.id_penjualan)
		JOIN sm_kemasan_barang as kb ON (dpnj.id_kemasan=kb.id)
		JOIN sm_barang as br ON (kb.id_barang=br.id)
		WHERE pd.id = '$id_pendaftaran' 
		AND dpnj.qty > 0
		AND br.id_eklaim = 'Sewa Alat'
		GROUP BY pd.id ";

		$data = $this->db->query($sql)->row()->total ?? null;
		return $data;
	}

	function getStatusKlaim($id_pendaftaran)
	{
		$sql = "SELECT ek.*
		FROM sm_eklaim ek
		JOIN sm_pendaftaran pd ON (ek.id_pendaftaran=pd.id)
		WHERE ek.id_pendaftaran = '$id_pendaftaran' ";

		$data = $this->db->query($sql)->row();
		return $data;
	}


	function getPendaftaranByIdPendaftaran($idPendaftaran)
	{
		$query = "SELECT lp.*, p.no_identitas, p.nama AS nama_pasien, pd.id_pasien, pd.tanggal_daftar, pd.tanggal_keluar, 
							pd.jenis_rawat, pe.nama AS nama_dokter, pd.no_sep, '' AS asal_rawat, s.nama AS spesialisasi, p.tanggal_lahir,
							CASE WHEN P.kelamin = 'P' THEN 'Perempuan' ELSE'Laki-Laki' END kelamin,
							case when lp.tindak_lanjut = 'Atas Izin Dokter' then '1'
							when lp.tindak_lanjut in ('Rs Lain','RS Lain') then '2'
							when lp.tindak_lanjut = 'Pulang APS' then '3'
							when lp.tindak_lanjut in ('Pemulasaran Jenazah','Pulang') then '4'
							else '5' end as kode_tindak_lanjut,
							( SELECT bg.nama FROM sm_bangsal AS bg WHERE bg.ID = ri.id_bangsal ) AS bangsal, ri.no_ruang, ri.no_bed,
							(pd.tanggal_keluar::date - pd.tanggal_daftar::date) + 1 AS selisih_hari, 
							concat (FLOOR(EXTRACT(EPOCH FROM (pd.tanggal_keluar - pd.tanggal_daftar)) / 3600) , ':', 
							lpad( EXTRACT ( MINUTE FROM ( pd.tanggal_keluar - pd.tanggal_daftar ) ) :: VARCHAR, 2, '0' )) AS selisih_waktu,
							(SELECT rd.id FROM sm_radiologi rd JOIN sm_layanan_pendaftaran lp3 on rd.id_layanan_pendaftaran = lp3.id WHERE lp3.id_pendaftaran = lp.id_pendaftaran LIMIT 1) as id_radiologi,
							(SELECT lb.id FROM sm_laboratorium lb JOIN sm_layanan_pendaftaran lp2 on lb.id_layanan_pendaftaran = lp2.id WHERE lp2.id_pendaftaran = lp.id_pendaftaran and lb.status_hasil != 'Batal' LIMIT 1) as id_laboratorium
							
							FROM sm_pendaftaran AS pd
							JOIN fn_layanan_pendaftaran_terakhir ( pd.ID :: INTEGER ) as fn_lp ON TRUE 
							JOIN sm_layanan_pendaftaran AS lp ON fn_lp.id = lp.id
							JOIN sm_pasien AS p ON p.id = pd.id_pasien
							JOIN sm_tenaga_medis AS tm ON tm.id = lp.id_dokter
							JOIN sm_pegawai AS pe ON pe.id = tm.id_pegawai
							LEFT JOIN sm_spesialisasi AS s ON s.id = lp.id_unit_layanan
							LEFT JOIN sm_rawat_inap AS ri ON ri.id_layanan_pendaftaran = lp.id 
							WHERE pd.id = '$idPendaftaran' ";

		return $this->db->query($query)->row();
	}

	function getEklaim($id_pendaftaran)
	{
		$sql = "select ek.*, pg. nama as coder_nama,
						(pd.tanggal_keluar::date - pd.tanggal_daftar::date) + 1 AS selisih_hari, 
						concat (FLOOR(EXTRACT(EPOCH FROM (ek.tgl_pulang - ek.tgl_masuk)) / 3600) , ':', 
						lpad( EXTRACT ( MINUTE FROM ( ek.tgl_pulang - ek.tgl_masuk ) ) :: VARCHAR, 2, '0' )) AS selisih_waktu
				from sm_eklaim ek				
				join sm_pendaftaran pd ON ek.id_pendaftaran = pd.id 
				join sm_layanan_pendaftaran lp ON ek.id_layanan_pendaftaran = lp.id
				left join sm_pegawai pg ON ek.coder_nik = pg.nik
				where ek.id_pendaftaran = '" . $id_pendaftaran . "'";
		return $this->db->query($sql)->row();
	}

	function getDataGrouper($id_pendaftaran)
	{
		$sql = "select ge.*
				from sm_grouper_eklaim ge				
				where ge.id_pendaftaran = '" . $id_pendaftaran . "'";
		$return = $this->db->query($sql)->row();

		if (!empty($return)) {
			$return->cbg = ($return->cbg !== null ? json_decode($return->cbg) : null);
			$return->sub_acute = ($return->sub_acute !== null ? json_decode($return->sub_acute) : null);
			$return->chronic = ($return->chronic !== null ? json_decode($return->chronic) : null);
			$return->special_procedure = ($return->special_procedure !== null ? json_decode($return->special_procedure) : null);
			$return->special_prosthesis = ($return->special_prosthesis !== null ? json_decode($return->special_prosthesis) : null);
			$return->special_investigation = ($return->special_investigation !== null ? json_decode($return->special_investigation) : null);
			$return->special_drug = ($return->special_drug !== null ? json_decode($return->special_drug) : null);
			$return->covid19_data = ($return->covid19_data !== null ? json_decode($return->covid19_data) : null);
			$return->response_inagrouper = ($return->response_inagrouper !== null ? json_decode($return->response_inagrouper) : null);
			$return->special_cmg_option = ($return->special_cmg_option !== null ? json_decode($return->special_cmg_option) : null);
			$return->tarif_alt = ($return->tarif_alt !== null ? json_decode($return->tarif_alt) : null);
			$return->special_cmg = ($return->special_cmg !== null ? json_decode($return->special_cmg) : null);
		}

		return $return;
	}

	function getDiagnosa($id)
	{
		$diagnosa =  $this->db->select("d.id, concat_ws('. ', gss.kode_icdx_rinci, ( SELECT gss.kode_icdx_rinci FROM sm_golongan_sebab_sakit AS gss WHERE gss.ID = d.id_pengkodean_asterik )) as code, concat_ws('. ', ( SELECT gss1.nama FROM sm_golongan_sebab_sakit AS gss1 WHERE gss1.ID = d.id_golongan_sebab_sakit ),
		 d.golongan_sebab_sakit_lain) as nama, d.prioritas ")
			->from('sm_diagnosa as d')
			->join('sm_golongan_sebab_sakit as gss', 'gss.id = d.id_pengkodean')
			->join('sm_layanan_pendaftaran as lp', 'lp.id = d.id_layanan_pendaftaran')
			->join('sm_pendaftaran as pd', 'pd.id = lp.id_pendaftaran')
			->where('pd.id', $id, true)
			// ->where('prioritas', 'Utama')
			->order_by('d.prioritas', 'desc')
			->order_by('lp.jenis_layanan', 'desc')
			// ->where('lp.jenis_layanan', 'Rawat Inap', true)
			->get()
			->result();

		if (!empty($diagnosa)) {
			$data = $diagnosa;
		} else {
			$data = [];
		}

		return $data;
	}

	// function getDiagnosaEklaim($id)
	// {
	// 	$data_eklaim = $this->getEklaim($id);
	// 	$diagnosa = $data_eklaim->diagnosa;
	// 	$diagnosa = $diagnosa = str_replace('*', '', $diagnosa);

	// 	$result = [];
	// 	if (!empty($diagnosa)) {
	// 		$codes = explode('#', $diagnosa);
	// 		$uniqueCodes = array_unique($codes);

	// 		foreach ($uniqueCodes as $index => $code) {
	// 			$cleanCode = str_replace(['*', '+', ' '], '', $code);
	// 			$param = ['keyword' => $cleanCode];
	// 			$searchDiag = $this->m_auto_eklaim->searchDiagnosis($param);
	// 			$namaDiagnosa = $searchDiag['response']['data'][0][0];

	// 			if ($searchDiag['response']['data'] !== 'EMPTY') {
	// 				$result[] = [
	// 					"id" => "UNU" . ($index + 1), // ID custom (bisa disesuaikan)
	// 					"code" => $code,
	// 					"nama" => $namaDiagnosa // Nama bisa disesuaikan
	// 				];
	// 			}
	// 		}
	// 	} else {
	// 		$result = [];
	// 	}
	// 	// $data_eklaim = $this->db->get_where('sm_eklaim', ['id_pendaftaran' => $id])->row();

	// 	return $result;
	// }

	// function getDiagnosaEklaimINA($id)
	// {
	// 	$data_eklaim = $this->getEklaim($id);
	// 	$diagnosa = $data_eklaim->diagnosa_inagrouper;
	// 	$diagnosa = $diagnosa = str_replace('*', '', $diagnosa);

	// 	$result = [];
	// 	if (!empty($diagnosa)) {
	// 		$codes = explode('#', $diagnosa);
	// 		$uniqueCodes = array_unique($codes);

	// 		foreach ($uniqueCodes as $index => $code) {
	// 			$cleanCode = str_replace(['*', '+', ' '], '', $code);
	// 			$param = ['keyword' => $cleanCode];
	// 			$searchDiag = $this->m_auto_eklaim->searchDiagnosis($param);

	// 			if ($searchDiag['response']['data'] !== 'EMPTY') {
	// 				$namaDiagnosa = $searchDiag['response']['data'][0][0];
	// 			} else {
	// 				// Jika kosong, coba pakai pencarian alternatif
	// 				$searchDiagINA = $this->m_auto_eklaim->searchDiagnosisINA($param);
	// 				$namaDiagnosa = !empty($searchDiagINA['response']['data'][0]['description']) ? $searchDiagINA['response']['data'][0]['description'] : '-';
	// 			}

	// 			$result[] = [
	// 				"id" => "INA" . ($index + 1), // ID custom (bisa disesuaikan)
	// 				"code" => $code,
	// 				"nama" => $namaDiagnosa // Nama bisa disesuaikan
	// 			];
	// 		}
	// 	} else {
	// 		$result = [];
	// 	}
	// 	// $data_eklaim = $this->db->get_where('sm_eklaim', ['id_pendaftaran' => $id])->row();

	// 	return $result;
	// }

	private $cachedDiagnosaUNU = [];
	private $cachedDiagnosaINA = [];

	private function resolveNamaDiagnosa($code, $tipe = 'unu')
	{
		$this->load->model('m_auto_eklaim');
		$cleanCode = str_replace(['*', '+', ' '], '', $code);
		$param = ['keyword' => $cleanCode];

		$cacheArray = ($tipe === 'ina') ? $this->cachedDiagnosaINA : $this->cachedDiagnosaUNU;
		if (isset($cacheArray[$cleanCode])) {
			return $cacheArray[$cleanCode];
		}

		$searchDiag = $this->m_auto_eklaim->searchDiagnosis($param);
		if (!empty($searchDiag['response']['data']) && $searchDiag['response']['data'] !== 'EMPTY') {
			$nama = $searchDiag['response']['data'][0][0];
		} else {
			$searchINA = $this->m_auto_eklaim->searchDiagnosisINA($param);
			$nama = !empty($searchINA['response']['data'][0]['description']) ? $searchINA['response']['data'][0]['description'] : '-';
		}

		if ($tipe === 'ina') {
			$this->cachedDiagnosaINA[$cleanCode] = $nama;
		} else {
			$this->cachedDiagnosaUNU[$cleanCode] = $nama;
		}

		return $nama;
	}

	public function getDiagnosaEklaim($id)
	{
		$this->load->driver('cache');
		$cacheKey = 'diagnosa_eklaim_unu_' . $id;

		if (($cached = $this->cache->get($cacheKey)) !== false) {
			return $cached;
		}

		$data_eklaim = $this->getEklaim($id);
		$diagnosa = str_replace('*', '', $data_eklaim->diagnosa);

		$result = [];

		if (!empty($diagnosa)) {
			$codes = array_unique(explode('#', $diagnosa));
			foreach ($codes as $index => $code) {
				$nama = $this->resolveNamaDiagnosa($code, 'unu');
				if ($nama !== '-') {
					$result[] = [
						'id' => 'UNU' . ($index + 1),
						'code' => $code,
						'nama' => $nama,
					];
				}
			}
		}

		$this->cache->save($cacheKey, $result, 3600);
		return $result;
	}

	public function getDiagnosaEklaimINA($id)
	{
		$this->load->driver('cache');
		$cacheKey = 'diagnosa_eklaim_ina_' . $id;

		if (($cached = $this->cache->get($cacheKey)) !== false) {
			return $cached;
		}

		$data_eklaim = $this->getEklaim($id);
		$diagnosa = str_replace('*', '', $data_eklaim->diagnosa_inagrouper);

		$result = [];

		if (!empty($diagnosa)) {
			$codes = array_unique(explode('#', $diagnosa));
			foreach ($codes as $index => $code) {
				$nama = $this->resolveNamaDiagnosa($code, 'ina');
				if ($nama !== '-') {
					$result[] = [
						'id' => 'INA' . ($index + 1),
						'code' => $code,
						'nama' => $nama,
					];
				}
			}
		}

		$this->cache->save($cacheKey, $result, 3600);
		return $result;
	}

	function getProsedur($id)
	{
		$prosedur = $this->db->select(" tp.icd9 as code, pl.nama ")
			->from('sm_tarif_tindakan_pasien as ttp')
			->join('sm_icd_ix as tp', 'tp.id = ttp.id_pengkodean')
			->join('sm_tarif_pelayanan as tpl', 'tpl.id = ttp.id_tarif_pelayanan')
			->join('sm_layanan as pl', 'pl.id = tpl.id_layanan')
			->join('sm_layanan_pendaftaran as lp', 'lp.id = ttp.id_layanan_pendaftaran')
			->join('sm_pendaftaran as pd', 'pd.id = lp.id_pendaftaran')
			->where('pd.id', $id, true)
			->order_by('lp.jenis_layanan', 'desc')
			// ->where('lp.jenis_layanan', 'Rawat Inap', true)
			->get()
			->result();

		if (!empty($prosedur)) {
			$data = $prosedur;
		} else {
			$data = [];
		}

		return $data;
	}

	// function getProsedurEklaim($id)
	// {
	// 	$data_eklaim = $this->getEklaim($id);
	// 	$procedure = $data_eklaim->procedure;
	// 	$procedure = str_replace('*', '', $procedure);

	// 	$result = [];
	// 	if (!empty($procedure)) {
	// 		$codes = explode('#', $procedure);
	// 		$uniqueCodes = array_unique($codes);

	// 		foreach ($uniqueCodes as $index => $code) {
	// 			$cleanCode = str_replace(['*', '+', ' '], '', $code);
	// 			$param = ['keyword' => $cleanCode];
	// 			$searchProc = $this->m_auto_eklaim->searchProcedures($param);
	// 			$namaProcedure = $searchProc['response']['data'][0][0];

	// 			if ($searchProc['response']['data'] !== 'EMPTY') {
	// 				$result[] = [
	// 					"id" => "UNU" . ($index + 1), // ID custom (bisa disesuaikan)
	// 					"code" => $code,
	// 					"nama" => $namaProcedure // Nama bisa disesuaikan
	// 				];
	// 			}
	// 		}
	// 	} else {
	// 		$result = [];
	// 	}
	// 	// var_dump(($result)); die;
	// 	// $data_eklaim = $this->db->get_where('sm_eklaim', ['id_pendaftaran' => $id])->row();

	// 	return $result;
	// }

	// function getProsedurEklaimINA($id)
	// {
	// 	$data_eklaim = $this->getEklaim($id);
	// 	$procedure = $data_eklaim->procedure_inagrouper;
	// 	$procedure = str_replace('*', '', $procedure);

	// 	$result = [];
	// 	if (!empty($procedure)) {
	// 		$codes = explode('#', $procedure);
	// 		$uniqueCodes = array_unique($codes);

	// 		foreach ($uniqueCodes as $index => $code) {
	// 			$cleanCode = str_replace(['*', '+', ' '], '', $code);
	// 			$param = ['keyword' => $cleanCode];
	// 			$searchProc = $this->m_auto_eklaim->searchProcedures($param);

	// 			if ($searchProc['response']['data'] !== 'EMPTY') {
	// 				$namaProcedure = $searchProc['response']['data'][0][0];
	// 			} else {
	// 				// Jika kosong, coba pakai pencarian alternatif
	// 				$searchProcINA = $this->m_auto_eklaim->searchProceduresINA($param);
	// 				$namaProcedure = !empty($searchProcINA['response']['data'][0]['description']) ? $searchProcINA['response']['data'][0]['description'] : '-';
	// 			}

	// 			$result[] = [
	// 				"id" => "INA" . ($index + 1), // ID custom (bisa disesuaikan)
	// 				"code" => $code,
	// 				"nama" => $namaProcedure // Nama bisa disesuaikan
	// 			];
	// 		}
	// 	} else {
	// 		$result = [];
	// 	}
	// 	// var_dump(($result)); die;
	// 	// $data_eklaim = $this->db->get_where('sm_eklaim', ['id_pendaftaran' => $id])->row();

	// 	return $result;
	// }

	private $cachedProsedurUNU = [];
	private $cachedProsedurINA = [];

	private function resolveNamaProsedur($code, $tipe = 'unu')
	{
		$this->load->model('m_auto_eklaim');
		$cleanCode = str_replace(['*', '+', ' '], '', $code);
		$param = ['keyword' => $cleanCode];

		// Cek cache lokal
		$cacheArray = ($tipe === 'ina') ? $this->cachedProsedurINA : $this->cachedProsedurUNU;
		if (isset($cacheArray[$cleanCode])) {
			return $cacheArray[$cleanCode];
		}

		// Cari prosedur utama
		$searchProc = $this->m_auto_eklaim->searchProcedures($param);

		if (!empty($searchProc['response']['data']) && $searchProc['response']['data'] !== 'EMPTY') {
			$nama = $searchProc['response']['data'][0][0];
		} else {
			// Alternatif (untuk INA)
			$searchProcINA = $this->m_auto_eklaim->searchProceduresINA($param);
			$nama = !empty($searchProcINA['response']['data'][0]['description']) ? $searchProcINA['response']['data'][0]['description'] : '-';
		}

		// Simpan ke cache lokal
		if ($tipe === 'ina') {
			$this->cachedProsedurINA[$cleanCode] = $nama;
		} else {
			$this->cachedProsedurUNU[$cleanCode] = $nama;
		}

		return $nama;
	}

	public function getProsedurEklaim($id)
	{
		$this->load->driver('cache');
		$cacheKey = 'prosedur_eklaim_unu_' . $id;

		$cached = $this->cache->get($cacheKey);
		if ($cached !== false) {
			return $cached;
		}

		$data_eklaim = $this->getEklaim($id);
		$procedure = str_replace('*', '', $data_eklaim->procedure);

		$result = [];

		if (!empty($procedure)) {
			$codes = array_unique(explode('#', $procedure));
			foreach ($codes as $index => $code) {
				$namaProcedure = $this->resolveNamaProsedur($code, 'unu');
				if ($namaProcedure !== '-') {
					$result[] = [
						'id' => 'UNU' . ($index + 1),
						'code' => $code,
						'nama' => $namaProcedure
					];
				}
			}
		}

		$this->cache->save($cacheKey, $result, 3600); // cache 1 jam
		return $result;
	}

	public function getProsedurEklaimINA($id)
	{
		$this->load->driver('cache');
		$cacheKey = 'prosedur_eklaim_ina_' . $id;

		$cached = $this->cache->get($cacheKey);
		if ($cached !== false) {
			return $cached;
		}

		$data_eklaim = $this->getEklaim($id);
		$procedure = str_replace('*', '', $data_eklaim->procedure_inagrouper);

		$result = [];

		if (!empty($procedure)) {
			$codes = array_unique(explode('#', $procedure));
			foreach ($codes as $index => $code) {
				$namaProcedure = $this->resolveNamaProsedur($code, 'ina');
				if ($namaProcedure !== '-') {
					$result[] = [
						'id' => 'INA' . ($index + 1),
						'code' => $code,
						'nama' => $namaProcedure
					];
				}
			}
		}

		$this->cache->save($cacheKey, $result, 3600);
		return $result;
	}

	function simpanDataEklaim($data)
	{
		$icu_indikator = $data['icu_indikator'] ?? NULL;
		$use_ind = $data['use_ind'] ?? NULL;
		$upgrade_class_ind = $data['upgrade_class_ind'] ?? NULL;
		$executive_class_ind = $data['executive_class_ind'] ?? NULL;

		$insert = array_merge(
			[
				'id_pendaftaran'        	=> $data['id_pendaftaran'] ?? NULL,
				'id_layanan_pendaftaran'	=> $data['id_layanan_pendaftaran'] ?? NULL,
				'nomor_kartu'           	=> $data['nomor_kartu'] ?? NULL,
				'nomor_sep'             	=> $data['nomor_sep'] ?? NULL,
				'nomor_rm'              	=> $data['nomor_rm'] ?? NULL,
				'nama_pasien'           	=> $data['nama_pasien'] ?? NULL,
				'tgl_lahir'             	=> $data['tgl_lahir'] ?? NULL,
				'gender'                	=> $data['gender'] ?? NULL,
				'tgl_masuk'             	=> $data['tgl_masuk'] ?? NULL,
				'tgl_pulang'            	=> $data['tgl_pulang'] ?? NULL,
				'cara_masuk'            	=> $data['cara_masuk'] ?? NULL, // new update
				'jenis_rawat'           	=> $data['jenis_rawat'] ?? NULL,
				'kelas_rawat'           	=> $data['kelas_rawat'] ?? NULL,
				'adl_sub_acute'         	=> $data['adl_sub_acute'] ?? NULL,
				'adl_chronic'           	=> $data['adl_chronic'] ?? NULL,
				'sistole'               	=> $data['sistole'] ?? NULL, // new update
				'diastole'              	=> $data['diastole'] ?? NULL, // new update
				'icu_indikator'         	=> $data['icu_indikator'] ?? NULL,
				'icu_los'               	=> $data['icu_los'] ?? NULL,
				'ventilator_hour'       	=> $data['ventilator_hour'] ?? NULL,
				// 'is_pasien_tb'            => $data['is_pasien_tb'] ?? NULL, // new update
				// 'jkn_sitb_noreg'          => $data['jkn_sitb_noreg'] ?? NULL, // new update
				'is_pasien_covid'         => $data['is_pasien_covid'] ?? NULL, // new update
				'covid19_no_sep'          => $data['covid19_no_sep'] ?? NULL, // new update
			],

			$executive_class_ind === '1' ? [
				"executive_class_ind" => $data['executive_class_ind'] ?? NULL, // new update
				"billing_amount_pex" 	=> $data['billing_amount_pex'] ?? NULL // new update
			] : [],

			$icu_indikator === '1' && $use_ind === '1' ? [
				"use_ind" => $data['use_ind'] ?? NULL, // new update					
				"start_dttm" => $data['start_dttm'] ?? NULL, // new update
				"stop_dttm" => $data['stop_dttm'] ?? NULL, // new update
			] : [],

			$upgrade_class_ind === '1' ? [
				"upgrade_class_ind" 		=> $data['upgrade_class_ind'] ?? NULL, // new update
				"upgrade_class_class" 	=> $data['upgrade_class_class'] ?? NULL, // new update
				"upgrade_class_los" 		=> $data['upgrade_class_los'] ?? NULL, // new update
				"upgrade_class_payor" 	=> $data['upgrade_class_payor'] ?? NULL, // new update
				"add_payment_pct" 			=> $data['add_payment_pct'] ?? NULL, // new update
			] : [],

			[
				'birth_weight'          	=> $data['birth_weight'] ?? NULL,
				'discharge_status'      	=> $data['discharge_status'] ?? NULL,
				'diagnosa'              	=> $data['diagnosa'] ?? NULL,
				'procedure'             	=> $data['procedure'] ?? NULL,
				'diagnosa_inagrouper'     => $data['diagnosa_inagrouper'], // new update
				'procedure_inagrouper'    => $data['procedure_inagrouper'], // new update
				'prosedur_non_bedah'    	=> $data['prosedur_non_bedah'] ?? NULL,
				'prosedur_bedah'        	=> $data['prosedur_bedah'] ?? NULL,
				'konsultasi'            	=> $data['konsultasi'] ?? NULL,
				'tenaga_ahli'           	=> $data['tenaga_ahli'] ?? NULL,
				'keperawatan'           	=> $data['keperawatan'] ?? NULL,
				'penunjang'             	=> $data['penunjang'] ?? NULL,
				'radiologi'             	=> $data['radiologi'] ?? NULL,
				'laboratorium'          	=> $data['laboratorium'] ?? NULL,
				'pelayanan_darah'       	=> $data['pelayanan_darah'] ?? NULL,
				'rehabilitasi'          	=> $data['rehabilitasi'] ?? NULL,
				'kamar'                 	=> $data['kamar'] ?? NULL,
				'rawat_intensif'        	=> $data['rawat_intensif'] ?? NULL,
				'obat'                  	=> $data['obat'] ?? NULL,
				'obat_kronis'           	=> $data['obat_kronis'] ?? NULL,
				'obat_kemoterapi'       	=> $data['obat_kemoterapi'] ?? NULL,
				'alkes'                 	=> $data['alkes'] ?? NULL,
				'bmhp'                  	=> $data['bmhp'] ?? NULL,
				'sewa_alat'             	=> $data['sewa_alat'] ?? NULL,
				'nama_dokter'           	=> $data['nama_dokter'] ?? NULL,
				'kode_tarif'            	=> $data['kode_tarif'] ?? NULL,
				'payor_id'              	=> $data['payor_id'] ?? NULL,
				'payor_cd'              	=> $data['payor_cd'] ?? NULL,
				'coder_nik'             	=> $data['coder_nik'] ?? NULL,
				'created_at'            	=> $data['created_at'] ?? NULL,
				'status_bridging'        	=> 'normal',
				'is_persalinan'        		=> $data['is_persalinan'], // new update
				'is_apgar'        				=> $data['is_apgar'], // new update
				"is_hd" 									=> $data['is_hd'] ?? NULL, // new update
				"cob" 										=> $data['cob_cd'] ?? NULL, // new update
				"dializer_single_use"			=> $data['dializer_single_use'] ?? NULL, // new update
				"kantong_darah" 					=> $data['kantong_darah'] ?? NULL, // new update
				'method_status'        		=> 'set_claim_data',
			]
		);

		return $this->db->insert('sm_eklaim', $insert);
	}

	function updateDataEklaim($data, $id)
	{
		$icu_indikator = $data['icu_indikator'] ?? NULL;
		$use_ind = $data['use_ind'] ?? NULL;
		$upgrade_class_ind = $data['upgrade_class_ind'] ?? NULL;
		$executive_class_ind = $data['executive_class_ind'] ?? NULL;

		$insert = array_merge(
			[
				'id_pendaftaran'        	=> $data['id_pendaftaran'] ?? NULL,
				'id_layanan_pendaftaran'	=> $data['id_layanan_pendaftaran'] ?? NULL,
				'nomor_kartu'           	=> $data['nomor_kartu'] ?? NULL,
				'nomor_sep'             	=> $data['nomor_sep'] ?? NULL,
				'nomor_rm'              	=> $data['nomor_rm'] ?? NULL,
				'nama_pasien'           	=> $data['nama_pasien'] ?? NULL,
				'tgl_lahir'             	=> $data['tgl_lahir'] ?? NULL,
				'gender'                	=> $data['gender'] ?? NULL,
				'tgl_masuk'             	=> $data['tgl_masuk'] ?? NULL,
				'tgl_pulang'            	=> $data['tgl_pulang'] ?? NULL,
				'cara_masuk'            	=> $data['cara_masuk'] ?? NULL, // new update
				'jenis_rawat'           	=> $data['jenis_rawat'] ?? NULL,
				'kelas_rawat'           	=> $data['kelas_rawat'] ?? NULL,
				'adl_sub_acute'         	=> $data['adl_sub_acute'] ?? NULL,
				'adl_chronic'           	=> $data['adl_chronic'] ?? NULL,
				'sistole'               	=> $data['sistole'] ?? NULL, // new update
				'diastole'              	=> $data['diastole'] ?? NULL, // new update
				'icu_indikator'         	=> $data['icu_indikator'] ?? NULL,
				'icu_los'               	=> $data['icu_los'] ?? NULL,
				'ventilator_hour'       	=> $data['ventilator_hour'] ?? NULL,
				// 'is_pasien_tb'            => $data['is_pasien_tb'] ?? NULL, // new update
				// 'jkn_sitb_noreg'          => $data['jkn_sitb_noreg'] ?? NULL, // new update
				'is_pasien_covid'         => $data['is_pasien_covid'] ?? NULL, // new update
				'covid19_no_sep'          => $data['covid19_no_sep'] ?? NULL, // new update
			],

			$executive_class_ind === '1' ? [
				"executive_class_ind" => $data['executive_class_ind'] ?? NULL, // new update
				"billing_amount_pex" 	=> $data['billing_amount_pex'] ?? NULL // new update
			] : [
				"executive_class_ind" => NULL, // new update
				"billing_amount_pex" 	=> NULL // new update
			],

			$icu_indikator === '1' && $use_ind === '1' ? [
				"use_ind" => $data['use_ind'] ?? NULL, // new update					
				"start_dttm" => $data['start_dttm'] ?? NULL, // new update
				"stop_dttm" => $data['stop_dttm'] ?? NULL, // new update
			] : [
				"use_ind" => NULL, // new update					
				"start_dttm" =>  NULL, // new update
				"stop_dttm" => NULL, // new update
			],

			$upgrade_class_ind === '1' ? [
				"upgrade_class_ind" 		=> $data['upgrade_class_ind'] ?? NULL, // new update
				"upgrade_class_class" 	=> $data['upgrade_class_class'] ?? NULL, // new update
				"upgrade_class_los" 		=> $data['upgrade_class_los'] ?? NULL, // new update
				"upgrade_class_payor" 	=> $data['upgrade_class_payor'] ?? NULL, // new update
				"add_payment_pct" 			=> $data['add_payment_pct'] ?? NULL, // new update
			] : [
				"upgrade_class_ind" 		=> NULL, // new update
				"upgrade_class_class" 	=> NULL, // new update
				"upgrade_class_los" 		=> NULL, // new update
				"upgrade_class_payor" 	=> NULL, // new update
				"add_payment_pct" 			=> NULL, // new update
			],

			[
				'birth_weight'          	=> $data['birth_weight'] ?? NULL,
				'discharge_status'      	=> $data['discharge_status'] ?? NULL,
				'diagnosa'              	=> $data['diagnosa'] ?? NULL,
				'procedure'             	=> $data['procedure'] ?? NULL,
				'diagnosa_inagrouper'     => $data['diagnosa_inagrouper'], // new update
				'procedure_inagrouper'    => $data['procedure_inagrouper'], // new update
				'prosedur_non_bedah'    	=> $data['prosedur_non_bedah'] ?? NULL,
				'prosedur_bedah'        	=> $data['prosedur_bedah'] ?? NULL,
				'konsultasi'            	=> $data['konsultasi'] ?? NULL,
				'tenaga_ahli'           	=> $data['tenaga_ahli'] ?? NULL,
				'keperawatan'           	=> $data['keperawatan'] ?? NULL,
				'penunjang'             	=> $data['penunjang'] ?? NULL,
				'radiologi'             	=> $data['radiologi'] ?? NULL,
				'laboratorium'          	=> $data['laboratorium'] ?? NULL,
				'pelayanan_darah'       	=> $data['pelayanan_darah'] ?? NULL,
				'rehabilitasi'          	=> $data['rehabilitasi'] ?? NULL,
				'kamar'                 	=> $data['kamar'] ?? NULL,
				'rawat_intensif'        	=> $data['rawat_intensif'] ?? NULL,
				'obat'                  	=> $data['obat'] ?? NULL,
				'obat_kronis'           	=> $data['obat_kronis'] ?? NULL,
				'obat_kemoterapi'       	=> $data['obat_kemoterapi'] ?? NULL,
				'alkes'                 	=> $data['alkes'] ?? NULL,
				'bmhp'                  	=> $data['bmhp'] ?? NULL,
				'sewa_alat'             	=> $data['sewa_alat'] ?? NULL,
				'nama_dokter'           	=> $data['nama_dokter'] ?? NULL,
				'kode_tarif'            	=> $data['kode_tarif'] ?? NULL,
				'payor_id'              	=> $data['payor_id'] ?? NULL,
				'payor_cd'              	=> $data['payor_cd'] ?? NULL,
				'coder_nik'             	=> $data['coder_nik'] ?? NULL,
				'created_at'            	=> $data['created_at'] ?? NULL,
				'status_bridging'        	=> 'normal',
				'is_persalinan'        		=> $data['is_persalinan'], // new update
				'is_apgar'        				=> $data['is_apgar'], // new update
				"is_hd" 									=> $data['is_hd'] ?? NULL, // new update
				"cob" 										=> $data['cob_cd'] ?? NULL, // new update
				"dializer_single_use"			=> $data['dializer_single_use'] ?? NULL, // new update
				"kantong_darah" 					=> $data['kantong_darah'] ?? NULL, // new update
				'method_status'        		=> 'set_claim_data',
			]
		);

		$this->db->where('id_pendaftaran', $id, true)->update('sm_eklaim', $insert);

		return $id;
	}

	function simpanDataPersalinan($data, $id_eklaim)
	{
		$cekPersalinan = $this->db->get_where('sm_kelahiran_eklaim', ['id_eklaim' => $id_eklaim])->row();
		$kelahiranData = [
			'id_eklaim' 			=> $id_eklaim,
			'id_pendaftaran' 	=> $data['id_pendaftaran'],
			'usia_kehamilan' 	=> $data['usia_kehamilan'],
			'gravida' 				=> $data['gravida'],
			'partus' 					=> $data['partus'],
			'abortus' 				=> $data['abortus'],
			'onset_kontraksi'	=> $data['onset_kontraksi'],
			'created_at' 			=> $this->datetime,
			'id_user' 				=> $this->session->userdata('id_translucent'),
		];

		if (empty($cekPersalinan)) {
			$this->db->insert('sm_kelahiran_eklaim', $kelahiranData);
			$id_kelahiran = $this->db->insert_id();
		} else {
			$this->db->where('id', $cekPersalinan->id)->update('sm_kelahiran_eklaim', $kelahiranData);
			$id_kelahiran = $cekPersalinan->id;
		}

		if (!empty($data['deliveryData'])) {
			foreach ($data['deliveryData'] as $key => $value) {
				$detailKelahiranData = [
					'id_kelahiran_eklaim'		=> $id_kelahiran,
					'delivery_sequence'			=> $value['delivery_sequence'],
					'delivery_dttm'					=> $value['delivery_dttm'],
					'delivery_method'				=> $value['delivery_method'],
					'use_manual'						=> ($value['delivery_method'] == 'vaginal' ? $value['use_manual'] : 0),
					'use_forcep'						=> ($value['delivery_method'] == 'vaginal' ? $value['use_forcep'] : 0),
					'use_vacuum'						=> ($value['delivery_method'] == 'vaginal' ? $value['use_vacuum'] : 0),
					'letak_janin'						=> $value['letak_janin'],
					'kondisi'								=> $value['kondisi'],
					'shk_spesimen_ambil'		=> $value['shk_spesimen_ambil'],
					'shk_lokasi'						=> ($value['shk_spesimen_ambil'] === 'ya' ? $value['shk_lokasi'] : NULL),
					'shk_spesimen_dttm'			=> ($value['shk_spesimen_ambil'] === 'ya' ? $value['shk_spesimen_dttm'] : NULL),
					'shk_alasan'						=> ($value['shk_spesimen_ambil'] === 'tidak' ? $value['shk_alasan'] : NULL),
					'created_at'						=> $this->datetime,
					'id_user'								=> $this->session->userdata('id_translucent'),
				];

				if (!empty($value['id_detail_kelahiran'])) {
					$this->db->where('id', $value['id_detail_kelahiran'])->update('sm_detail_kelahiran_eklaim', $detailKelahiranData);
				} else {
					$this->db->insert('sm_detail_kelahiran_eklaim', $detailKelahiranData);
				}
			}
		}
	}

	function getKelahiranEklaim($id_pendaftaran)
	{
		$data_kelahiran = $this->db->get_where('sm_kelahiran_eklaim', ['id_pendaftaran' => $id_pendaftaran])->row();

		if ($data_kelahiran) {
			$detail_kelahiran = $this->db->get_where('sm_detail_kelahiran_eklaim', ['id_kelahiran_eklaim' => $data_kelahiran->id])->result() ?? [];
			$data_kelahiran->detail_kelahiran = $detail_kelahiran;
		}

		return $data_kelahiran;
	}


	function getJumlahKantongDarah($idPendaftaran)
	{
		$query = "SELECT COALESCE(SUM(dpbd.qty), 0) AS qty
              FROM sm_penjualan_bank_darah pbd
              JOIN sm_layanan_pendaftaran lp ON pbd.id_layanan_pendaftaran = lp.id
              JOIN sm_detail_penjualan_bank_darah dpbd ON dpbd.id_penjualan = pbd.id
              WHERE lp.id_pendaftaran = ?";

		$result = $this->db->query($query, [$idPendaftaran])->row();

		return $result ? $result->qty : 0;
	}
}
