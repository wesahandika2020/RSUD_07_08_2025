<?php

defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

/**
 * @package         CodeIgniter
 * @subpackage      Rest Server
 * @category        Controller
 * @author          Muhamad Wahyudin
 * @license         Syams Corporation
 */
class Upload_csv extends REST_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->limit = 10;
		$this->datetime = date('Y-m-d H:i:s');
		$this->load->model('Upload_csv_model', 'm_upload');

		$id_translucent = $this->session->userdata('id_translucent');
		if (empty($id_translucent)) :
			$this->response(array('error' => 'Anda belum login'), REST_Controller::HTTP_UNAUTHORIZED);
			exit();
		endif;
	}

	function get_list_tarif_inacbg_get()
	{
		if (!$this->get('page')) :
			$this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
		endif;
		if ($this->get('jenis_data_search', true)) :
			$search['jenis_data_search'] = $this->get('jenis_data_search', true);
		endif;

		$start          = ($this->get('page') - 1) * $this->limit;
		$search         = [
			'jenis_data_search'  => $this->get('jenis_data_search'),
			// 'tanggal_awal'  => safe_get('tanggal_awal'),
			// 'tanggal_akhir' => safe_get('tanggal_akhir'),
			// 'no_register'   => safe_get('no_register'),
			// 'no_rm'         => safe_get('no_rm'),
			// 'nama'          => safe_get('nama'),
			// 'nik'           => safe_get('nik'),
			// 'dokter'        => safe_get('dokter'),
			// 'status_bayar'  => safe_get('status_bayar'),
			// 'jenis'					=> '',
			// 'cara_bayar'		=> safe_get('cara_bayar'),
			// 'penjamin'			=> safe_get('penjamin'),
			// 'tempat_layanan' => safe_get('tempat_layanan'),
			// "keyword"				=> safe_get("keyword")
		];

		$data = $this->m_upload->getListTarifINACBG($this->limit, $start, $search);
		$data['page']    = (int) $this->get('page');
		$data['limit']   = $this->limit;

		if ($data) :
			$this->response($data, REST_Controller::HTTP_OK); // (200)
		else :
			$this->response(array('error' => 'Data is Not Found'), REST_Controller::HTTP_NOT_FOUND);
		endif;
	}

	private function dateFormatted($dateString)
	{
		$timestamp = strtotime(str_replace('/', '-', $dateString));
		$formattedDate = date('Y-m-d', $timestamp);

		return $formattedDate;
	}

	private function clean_string($string)
	{
		return preg_replace('/\xA0/', ' ', $string);
	}

	public function upload_file_tarif_ekalim_post()
	{
		$jenis_data = safe_post('jenis_data');

		if (!empty($_FILES['csv_file']['name'])) {
			// Load library upload
			$patch_upload = FCPATH . 'resources/tarif_rs_csv/';
			$config['upload_path']   = $patch_upload;
			$config['allowed_types'] = 'csv';
			$config['file_name'] = $_FILES['csv_file']['name'];
			$this->load->library('upload', $config);

			if ($this->upload->do_upload('csv_file')) {
				// File berhasil diupload, lanjutkan dengan proses parsing
				$file_data = $this->upload->data();
				$file_path = $patch_upload . $file_data['file_name'];

				// Baca file CSV
				if (($handle = fopen($file_path, "r")) !== FALSE) {
					fgetcsv($handle); // Lewati header
					while (($row = fgetcsv($handle, 10000, ",")) !== FALSE) {

						if ($jenis_data == '01') {

							if (!empty($row[50])) {
								$sep = $row[50];
								$cekDataTarifINACBG = $this->m_upload->cekDataTarifINACBG($sep);

								if ($sep !== $cekDataTarifINACBG) {
									$data = array(
										'admission_date' => $this->dateFormatted($row[5]),
										'discharge_date' => $this->dateFormatted($row[6]),
										'diaglist' => $row[11],
										'proclist' => $row[12],
										'inacbg' => $row[19],
										'deskripsi_inacbg' => $row[26],
										'total_tarif' => $row[38],
										'tarif_rs' => $row[39],
										'nama_pasien' => $this->clean_string($row[45]),
										'dpjp' => $this->clean_string($row[49]),
										'sep' => $sep,
										'id_users' => $this->session->userdata('id_translucent'),
										'created_at' => $this->datetime,
									);

									// Input data ke database
									$this->m_upload->insertTarifINACBG($data);
								}
							}
						} else if ($jenis_data == '02') {

							if (!empty($row[3])) {
								$sep = $row[3];
								$cekDataTarifPendingINACBG = $this->m_upload->cekDataTarifPendingINACBG($sep);

								if ($sep !== $cekDataTarifPendingINACBG) {
									$data = array(
										'noreg' 							=> $row[2],
										'sep' 								=> $row[3],
										'tgl_sep' 						=> $row[4],
										'tgl_pulang' 					=> $row[5],
										'jenis_layanan' 			=> $row[6],
										'no_kartu' 						=> $row[7],
										'nama_peserta' 				=> $this->clean_string($row[8]),
										'kode_inacbg' 				=> $row[10],
										'jenis_pending' 			=> $row[12],
										'tarif_pengajuan' 		=> $row[11],
										'jenis_dispute' 			=> $row[13],
										'keterangan_pending' 	=> $this->clean_string($row[14]),
										'keterangan_jawaban' 	=> $this->clean_string($row[15]),
										'status'							=> $row[1],
										'id_users' 						=> $this->session->userdata('id_translucent'),
										'created_at' 					=> $this->datetime,
									);

									// Input data ke database
									$this->m_upload->insertTarifPendingINACBG($data);
								}
							}
						}
					}
					fclose($handle);

					// Hapus file setelah diproses
					if (file_exists($file_path)) {
						if (unlink($file_path)) {
							$data = ["metadata" => ["code" => 200, "message" => "Berhasil. Data tersimpan ke database dan file dihapus."]];
						} else {
							$data = ["metadata" => ["code" => 200, "message" => "Berhasil. Data tersimpan ke database, namun file tidak bisa dihapus."]];
						}
					} else {
						$data = ["metadata" => ["code" => 200, "message" => "Berhasil. Data tersimpan ke database, namun file tidak ditemukan."]];
					}
				} else {
					$data = ["metadata" => ["code" => 400, "message" => "Gagal membaca file CSV."]];
				}
			} else {
				$data = ["metadata" => ["code" => 400, "message" => "Upload Gagal. Silahkan coba lagi."]];
			}
		} else {
			$data = ["metadata" => ["code" => 400, "message" => "Harap pilih file untuk diupload"]];
		}


		$this->response($data, REST_Controller::HTTP_OK);
		return;
	}

	public function upload_gform_csv_mcu_post()
	{
		$tanggal_kunjungan = safe_post('tanggal_kunjungan');

		if (!empty($_FILES['csv_file']['name'])) {
			// Load library upload
			$patch_upload = FCPATH . 'resources/tarif_rs_csv/';
			$config['upload_path']   = $patch_upload;
			$config['allowed_types'] = 'csv';
			$config['file_name'] = $_FILES['csv_file']['name'];
			$this->load->library('upload', $config);

			if ($this->upload->do_upload('csv_file')) {
				// File berhasil diupload, lanjutkan dengan proses parsing
				$file_data = $this->upload->data();
				$file_path = $patch_upload . $file_data['file_name'];

				// Mulai transaksi
				$this->db->trans_begin();

				// Baca file CSV
				if (($handle = fopen($file_path, "r")) !== FALSE) {
					fgetcsv($handle); // Lewati header


					while (($row = fgetcsv($handle, 10000, ",")) !== FALSE) {


						if (!empty($row[17]) && !empty($row[1])) {

							$cekData = $this->db->get_where('sm_master_identitas_mcu', array('nik' => $row[1], 'tanggal_kedatangan_mcu'	=> convertDateFormatDMYYYY($row[17])))->row();
							$cekUpdate = $this->db->get_where('sm_master_identitas_mcu', array('nik' => $row[1]))->row();
							$RtRw = splitRtRw($row[7]);

							// Insert sm_master_identitas_mcu
							$identitas_mcu = [
								'nik' 										=> $row[1],
								'nama_lengkap' 						=> capitalizeWords($row[2]),
								'tempat_lahir' 						=> capitalizeWords($row[3]),
								'tanggal_lahir' 					=> convertDateFormatDMYYYY($row[4]),
								'jenis_kelamin' 					=> $row[5],
								'alamat' 									=> $row[6],
								'rt' 											=> $row[7],
								'rw' 											=> $row[8],
								'kelurahan' 							=> $row[9],
								'kecamatan' 							=> $row[10],
								'agama' 									=> $row[11],
								'status_perkawinan' 			=> $row[12],
								'pekerjaan' 							=> $row[13],
								'kewarganegaraan' 				=> $row[14],
								'pendidikan' 							=> $row[15],
								'no_tlp' 									=> $row[16],
								'keperluan_mcu' 					=> $row[17],
								'tanggal_kedatangan_mcu'	=> convertDateFormatDMYYYY($row[18]),
								'nama_pjwb' 							=> $row[19],
								'hubungan_pjwb' 					=> $row[20],
								'no_pjwb' 								=> $row[21],
								'dokter_keluarga' 				=> $row[22],
								'nama_notlp_dokter' 			=> $row[23],
								'faskes' 									=> $row[24],
								'asuransi' 								=> $row[25],
								'jenis_asuransi' 					=> $row[26],
								'nama_asuransi' 					=> $row[27],
								'no_asuransi' 						=> $row[28],
								'gol_darah' 							=> $row[29],
								'rhesus' 									=> $row[30],
								// 'id_pendaftaran' 					=> $row[11],
								'created_at' 							=> $this->datetime,
								'users_id' 								=> $this->session->userdata('id_translucent'),
							];

							// Insert sm_riwayat_penyakit_mcu
							$data_rp_mcu = [
								// 'id_master_identitas' 				=> $id_faktor_klinis,
								'riwayat_keluhan_saat_ini' 		=>  capitalizeWords($row[31]),
								'rss_radang_selaput' 					=> convertAnswerCSV($row[32]),
								'rss_lumpuh' 									=> convertAnswerCSV($row[33]),
								'rss_polio' 									=> convertAnswerCSV($row[34]),
								'rss_ayan' 										=> convertAnswerCSV($row[35]),
								'rss_stroke' 									=> convertAnswerCSV($row[36]),
								'rj_serangan_jantung' 				=> convertAnswerCSV($row[37]),
								'rj_nyeri_dada' 							=> convertAnswerCSV($row[38]),
								'rj_rasa_berdebar' 						=> convertAnswerCSV($row[39]),
								'rj_rtekanan_darting' 				=> convertAnswerCSV($row[40]),
								'rp_difteri' 									=> convertAnswerCSV($row[41]),
								'rp_sinusitis' 								=> convertAnswerCSV($row[42]),
								'rp_bronkitis' 								=> convertAnswerCSV($row[43]),
								'rp_batuk_darah' 							=> convertAnswerCSV($row[44]),
								'rp_tbc' 											=> convertAnswerCSV($row[45]),
								'rp_radang_paru' 							=> convertAnswerCSV($row[46]),
								'rp_asma' 										=> convertAnswerCSV($row[47]),
								'rp_sesak_nafas' 							=> convertAnswerCSV($row[48]),
								'rgsk_sulit_bak' 							=> convertAnswerCSV($row[49]),
								'rgsk_radang_saluran_kemih' 	=> convertAnswerCSV($row[50]),
								'rgsk_penyakit_ginjal' 				=> convertAnswerCSV($row[51]),
								'rgsk_kencing_batu' 					=> convertAnswerCSV($row[52]),
								'rgsk_sulit_menahan_kemih' 		=> convertAnswerCSV($row[53]),
								'rkk_cacar_air' 							=> convertAnswerCSV($row[54]),
								'rkk_jamur_kulit' 						=> convertAnswerCSV($row[55]),
								'rkk_penyakit_kelamin' 				=> convertAnswerCSV($row[56]),
								'rkk_tbc_kulit' 							=> convertAnswerCSV($row[57]),
								'rkk_campak' 									=> convertAnswerCSV($row[58]),
								'rsc_tifoid' 									=> convertAnswerCSV($row[59]),
								'rsc_muntah_darah' 						=> convertAnswerCSV($row[60]),
								'rsc_sulit_bab' 							=> convertAnswerCSV($row[61]),
								'rsc_maag' 										=> convertAnswerCSV($row[62]),
								'rsc_penyakit_kuning' 				=> convertAnswerCSV($row[63]),
								'rsc_penyakit_empedu' 				=> convertAnswerCSV($row[64]),
								'rsc_sulit_menahan_bab' 			=> convertAnswerCSV($row[65]),
								'rsc_gangguan_menelan' 				=> convertAnswerCSV($row[66]),
								'rst_reumatik' 								=> convertAnswerCSV($row[67]),
								'rst_tbc_tulang' 							=> convertAnswerCSV($row[68]),
								'rl_malaria' 									=> convertAnswerCSV($row[69]),
								'rl_gangguan_tidur' 					=> convertAnswerCSV($row[70]),
								'rl_penyakit_jiwa' 						=> convertAnswerCSV($row[71]),
								'rl_kanker' 									=> convertAnswerCSV($row[72]),
								'rl_gangguan_pendengaran' 		=> convertAnswerCSV($row[73]),
								'rl_gangguan_penglihatan' 		=> convertAnswerCSV($row[74]),
								'rl_sulit_konsentrasi' 				=> convertAnswerCSV($row[75]),
								'rpd_tuberkulosis' 						=> convertAnswerCSV($row[76]),
								'rpd_sakit_kuning' 						=> convertAnswerCSV($row[77]),
								'rpd_asma' 										=> convertAnswerCSV($row[78]),
								'rpd_artritis' 								=> convertAnswerCSV($row[79]),
								'rpd_serangan_jantung' 				=> convertAnswerCSV($row[80]),
								'rpd_asam_urat' 							=> convertAnswerCSV($row[81]),
								'rpd_kateterisasi' 						=> convertAnswerCSV($row[82]),
								'rpd_kelainan_darah' 					=> convertAnswerCSV($row[83]),
								'rpd_patah_tulang' 						=> convertAnswerCSV($row[84]),
								'rpd_wasir' 									=> convertAnswerCSV($row[85]),
								'rpd_darting' 								=> convertAnswerCSV($row[86]),
								'rpd_diabetes_melitus' 				=> convertAnswerCSV($row[87]),
								'rpd_gondok' 									=> convertAnswerCSV($row[88]),
								'rpd_tranfusi_darah' 					=> convertAnswerCSV($row[89]),
								'rpd_nyeri_tulang_belakang' 	=> convertAnswerCSV($row[90]),
								'rpd_diabetes' 								=> convertAnswerCSV($row[91]),
								'rpd_demam_berdarah' 					=> convertAnswerCSV($row[92]),
								'rpd_stres' 									=> convertAnswerCSV($row[93]),
								'rpd_penyakit_ginjal' 				=> convertAnswerCSV($row[94]),
								'rpd_nfeksi_menular_seksual' 	=> convertAnswerCSV($row[95]),
								'rpd_stroke' 									=> convertAnswerCSV($row[96]),
								'rpd_epilepsi' 								=> convertAnswerCSV($row[97]),
								'rpd_vertigo' 								=> convertAnswerCSV($row[98]),
								'rpd_demam_tifoid' 						=> convertAnswerCSV($row[99]),
								'rpd_infeksi_hiv' 						=> convertAnswerCSV($row[100]),
								'rpd_kelainan_jantung_bawaan'	=> convertAnswerCSV($row[101]),
								'rpd_malaria' 								=> convertAnswerCSV($row[102]),
								'rpd_covid' 									=> convertAnswerCSV($row[103]),
								'rpd_dirawat_rs' 							=> convertAnswerCSV($row[104]),
								'rpd_tumor' 									=> convertAnswerCSV($row[105]),
								'rpd_operasi' 								=> convertAnswerCSV($row[106]),
								'riwayat_lain' 								=>  capitalizeWords($row[107]),
								'riwayat_alergi' 							=>  capitalizeWords($row[108]),
								'rpk_hipertensi' 							=> convertAnswerCSV($row[109]),
								'rpk_tumor' 									=> convertAnswerCSV($row[110]),
								'rpk_asma' 										=> convertAnswerCSV($row[111]),
								'rpk_hemoroid' 								=> convertAnswerCSV($row[112]),
								'rpk_alergi' 									=> convertAnswerCSV($row[113]),
								'rpk_tb' 											=> convertAnswerCSV($row[114]),
								'rpk_stroke' 									=> convertAnswerCSV($row[115]),
								'rpk_diabetes' 								=> convertAnswerCSV($row[116]),
								'rpk_gangguan_jiwa' 					=> convertAnswerCSV($row[117]),
								'rpk_sakit_kuning' 						=> convertAnswerCSV($row[118]),
								'rpk_kelainan_darah' 					=> convertAnswerCSV($row[119]),
								'rpk_penyakit_jantung' 				=> convertAnswerCSV($row[120]),
								'rpk_riwayat_lainnya' 				=> convertAnswerCSV($row[121]),
								'ri_difteri' 									=> convertAnswerCSV($row[122]),
								'ri_hepatitis_b' 							=> convertAnswerCSV($row[123]),
								'ri_hpv' 											=> convertAnswerCSV($row[124]),
								'ri_bcg' 											=> convertAnswerCSV($row[125]),
								'ri_pneumonia' 								=> convertAnswerCSV($row[126]),
								'ri_tetanus' 									=> convertAnswerCSV($row[127]),
								'ri_cacar_air' 								=> convertAnswerCSV($row[128]),
								'ri_mengitis' 								=> convertAnswerCSV($row[129]),
								'ri_polio' 										=> convertAnswerCSV($row[130]),
								'ri_rotavirus' 								=> convertAnswerCSV($row[131]),
								'ri_influenza' 								=> convertAnswerCSV($row[132]),
								'ri_thypoid' 									=> convertAnswerCSV($row[133]),
								'ri_mmr' 											=> convertAnswerCSV($row[134]),
								'ri_campak' 									=> convertAnswerCSV($row[135]),
								'ri_covid' 										=> convertAnswerCSV($row[136])
							];

							// Insert sm_gaya_hidup_mcu
							$gaya_hidup_mcu = [
								// 'id_master_identitas' 	=> $id_faktor_klinis,
								'status_merokok'				=> capitalizeWords($row[137]),
								'status_minum_alkohol'	=> capitalizeWords($row[138]),
								'zat_adiktif_obat'			=> capitalizeWords($row[139]),
								'obat_obatan'						=> $row[140],
								'olahraga'							=> $row[141],
								'pekerjaan_divisi'			=> $row[142],
								'uraian_kerja'					=> $row[143],
								'keluhan_pekerjaan'			=> $row[144],
								'masa_kerja'						=> $row[145],
								'lama_kerja'						=> $row[146]
							];

							// Insert sm_resiko_kerja_mcu
							$resiko_kerja_mcu = [
								// 'id_master_identitas' 						=> $id_faktor_klinis,
								'rkf_bising'											=> convertAnswerCSV($row[147]),
								'rkf_ketinggian'									=> convertAnswerCSV($row[148]),
								'rkf_getaran_tubuh'								=> convertAnswerCSV($row[149]),
								'rkf_getaran_tangan'							=> convertAnswerCSV($row[150]),
								'rkf_suhu_panas_dingin'						=> convertAnswerCSV($row[151]),
								'rkf_radiasi'											=> convertAnswerCSV($row[152]),
								'rkf_lain_lainnya'								=> convertAnswerCSV($row[153]),
								'rkk_debu'												=> convertAnswerCSV($row[154]),
								'rkk_zat_kimia'										=> convertAnswerCSV($row[155]),
								'rkk_pestisida'										=> convertAnswerCSV($row[156]),
								'rkk_asap'												=> convertAnswerCSV($row[157]),
								'rkk_lainnya'											=> convertAnswerCSV($row[158]),
								'rkb_bakteri'											=> convertAnswerCSV($row[159]),
								'rkb_virus'												=> convertAnswerCSV($row[160]),
								'rkb_parasit'											=> convertAnswerCSV($row[161]),
								'rkb_jamur'												=> convertAnswerCSV($row[162]),
								'rkb_lainnya'											=> convertAnswerCSV($row[163]),
								'rke_gerakan_berulang'						=> convertAnswerCSV($row[164]),
								'rke_angkut_berat'								=> convertAnswerCSV($row[165]),
								'rke_berdiri_lebih_4_jam'					=> convertAnswerCSV($row[166]),
								'rke_duduk_lebih_4_jam'						=> convertAnswerCSV($row[167]),
								'rke_posisi_tubuh_janggal'				=> convertAnswerCSV($row[168]),
								'rke_pencahayaan_tidak_sesuai'		=> convertAnswerCSV($row[169]),
								'rke_bekerja_monitor_lebih_4_jam'	=> convertAnswerCSV($row[170]),
								'rke_lainnya'											=> convertAnswerCSV($row[171]),
								'rkp_beban_tidak_sesuai'					=> convertAnswerCSV($row[172]),
								'rkp_shift'												=> convertAnswerCSV($row[173]),
								'rkp_ketidak_jelasan_tugas'				=> convertAnswerCSV($row[174]),
								'rkp_pekerjaan_monoton'						=> convertAnswerCSV($row[175]),
								'rkp_konflik_tempat_kerja'				=> convertAnswerCSV($row[176]),
								'rkp_tuntutan_kerja_tinggi'				=> convertAnswerCSV($row[177]),
								'rkp_lainnya'											=> convertAnswerCSV($row[178])
							];

							// Insert sm_srq29_mcu
							$data_srq29_mcu = [
								// 'id_master_identitas' 																=> $id_faktor_klinis,
								'sering_sakit_kepala'																	=> convertAnswerCSV($row[179]),
								'kehilangan_nafsu_makan'															=> convertAnswerCSV($row[180]),
								'tidur_tidak_nyenyak'																	=> convertAnswerCSV($row[181]),
								'mudah_merasa_takut'																	=> convertAnswerCSV($row[182]),
								'cemas_tegang_khawatir'																=> convertAnswerCSV($row[183]),
								'tangan_gemetar'																			=> convertAnswerCSV($row[184]),
								'gangguan_pencernaan'																	=> convertAnswerCSV($row[185]),
								'sulit_berpikir_jernih'																=> convertAnswerCSV($row[186]),
								'merasa_tidak_bahagia'																=> convertAnswerCSV($row[187]),
								'sering_menangis'																			=> convertAnswerCSV($row[188]),
								'sulit_untuk_menikmati_hidup'													=> convertAnswerCSV($row[189]),
								'sulit_mengambil_keputusan'														=> convertAnswerCSV($row[190]),
								'aktifitas_terbengkalai'															=> convertAnswerCSV($row[191]),
								'tidak_mampu_berperan_dalam_hidup'										=> convertAnswerCSV($row[192]),
								'kehilangan_minat_banyak_hal'													=> convertAnswerCSV($row[193]),
								'mersa_tidak_dihargai'																=> convertAnswerCSV($row[194]),
								'mengakhiri_hidup'																		=> convertAnswerCSV($row[195]),
								'merasa_lelah_sepanjang_waktu'												=> convertAnswerCSV($row[196]),
								'merasa_tidak_enak_perut'															=> convertAnswerCSV($row[197]),
								'mudah_lelah'																					=> convertAnswerCSV($row[198]),
								'alkohol_dan_narkoba'																	=> convertAnswerCSV($row[199]),
								'orang_lain_berusaha_mencelakai'											=> convertAnswerCSV($row[200]),
								'hal_mengganggu_pada_pikiran'													=> convertAnswerCSV($row[201]),
								'mendengar_suara_yang_tidak_didengar_orang_lain'			=> convertAnswerCSV($row[202]),
								'mimpi_buruk'																					=> convertAnswerCSV($row[203]),
								'menghidari_kegiatan_dan_aktifitas'										=> convertAnswerCSV($row[204]),
								'kehilangan_minat_berteman_dan_aktifitas'							=> convertAnswerCSV($row[205]),
								'merasa_terganggung_jika_berada_pada_posisi_tertentu'	=> convertAnswerCSV($row[206]),
								'kesulitan_mengekspresikan_diri'											=> convertAnswerCSV($row[207])
							];

							// Insert sm_sds_mcu
							$data_sds_mcu = [
								// 'id_master_identitas' 										=> $id_faktor_klinis,
								'tujuan_dan_tugas_tidak_jelas'						=> convertAnswerCSV($row[208]),
								'proyek_tugas_tidak_perlu'								=> convertAnswerCSV($row[209]),
								'membawa_pekerjaan_pulang'								=> convertAnswerCSV($row[210]),
								'tuntutan_mutu_keterlaluan'								=> convertAnswerCSV($row[211]),
								'tidak_ada_kesempatan_maju_organisasi'		=> convertAnswerCSV($row[212]),
								'bertanggungjawab_pengembangan_karyawan'	=> convertAnswerCSV($row[213]),
								'lapor_dan_melapor'												=> convertAnswerCSV($row[214]),
								'atasan_bawahan'													=> convertAnswerCSV($row[215]),
								'menghabiskan_waktu_tidak_penting'				=> convertAnswerCSV($row[216]),
								'tugas_terlalu_sulit'											=> convertAnswerCSV($row[217]),
								'pekerjaan_lain_untuk_naik_pangkat'				=> convertAnswerCSV($row[218]),
								'bimbing_bawahan'													=> convertAnswerCSV($row[219]),
								'tanggung_jawab_pekerjaan'								=> convertAnswerCSV($row[220]),
								'perintah_tidak_dipatuhi'									=> convertAnswerCSV($row[221]),
								'tanggungjawab_proyek_pekerjaan'					=> convertAnswerCSV($row[222]),
								'tugas_kompleks'													=> convertAnswerCSV($row[223]),
								'karier_kemajuan_rugi'										=> convertAnswerCSV($row[224]),
								'keputusan_kesejahteraan_orang'						=> convertAnswerCSV($row[225]),
								'tidak_tahu_harapan_saya'									=> convertAnswerCSV($row[226]),
								'pekerjaan_diterima_orang_lain'						=> convertAnswerCSV($row[227]),
								'pekerjaan_lebih_banyak'									=> convertAnswerCSV($row[228]),
								'keterampilan_kemampuan_organisasi'				=> convertAnswerCSV($row[229]),
								'sedikit_kesempatan_berkembang'						=> convertAnswerCSV($row[230]),
								'tanggungjawab_terhadap_orang'						=> convertAnswerCSV($row[231]),
								'tidak_mengerti_peran_dalam_pekerjaan'		=> convertAnswerCSV($row[232]),
								'permintaan_bertentangan'									=> convertAnswerCSV($row[233]),
								'tidak_ada_waktu_beristirahat'						=> convertAnswerCSV($row[234]),
								'kurang_terlatih_dan_berpengalaman'				=> convertAnswerCSV($row[235]),
								'mandeg_dalam_karir'											=> convertAnswerCSV($row[236]),
								'bertanggungjawab_karier'									=> convertAnswerCSV($row[237])
							];


							if ($cekData == null || ($row['1'] === $cekUpdate->nik && convertDateFormatDMYYYY($row['17']) !== $cekUpdate->tanggal_kedatangan_mcu)) {

								$this->db->insert('sm_master_identitas_mcu', $identitas_mcu);
								$id_master_identitas = $this->db->insert_id();

								$data_rp_mcu['id_master_identitas'] = $id_master_identitas;
								$this->db->insert('sm_riwayat_penyakit_mcu', $data_rp_mcu);

								$gaya_hidup_mcu['id_master_identitas'] = $id_master_identitas;
								$this->db->insert('sm_gaya_hidup_mcu', $gaya_hidup_mcu);

								$resiko_kerja_mcu['id_master_identitas'] = $id_master_identitas;
								$this->db->insert('sm_resiko_kerja_mcu', $resiko_kerja_mcu);

								$data_srq29_mcu['id_master_identitas'] = $id_master_identitas;
								$this->db->insert('sm_srq29_mcu', $data_srq29_mcu);

								$data_sds_mcu['id_master_identitas'] = $id_master_identitas;
								$this->db->insert('sm_sds_mcu', $data_sds_mcu);
								// Insert Baru
							} else if ($row['1'] === $cekUpdate->nik && convertDateFormatDMYYYY($row['17']) === $cekUpdate->tanggal_kedatangan_mcu) {
								$this->db->where('id', $cekData->id)->update('sm_master_identitas_mcu', $identitas_mcu);
								$this->db->where('id_master_identitas', $cekData->id)->update('sm_riwayat_penyakit_mcu', $data_rp_mcu);
								$this->db->where('id_master_identitas', $cekData->id)->update('sm_gaya_hidup_mcu', $gaya_hidup_mcu);
								$this->db->where('id_master_identitas', $cekData->id)->update('sm_resiko_kerja_mcu', $resiko_kerja_mcu);
								$this->db->where('id_master_identitas', $cekData->id)->update('sm_srq29_mcu', $data_srq29_mcu);
								$this->db->where('id_master_identitas', $cekData->id)->update('sm_sds_mcu', $data_sds_mcu);
							}
						}
					}
					fclose($handle);

					// Hapus file setelah diproses
					if (file_exists($file_path)) {
						unlink($file_path);
					}

					// Check if all queries are successful
					if ($this->db->trans_status() === FALSE) {
						$this->db->trans_rollback();
						$data = ["metadata" => ["code" => 500, "message" => "Gagal menyimpan data. Terjadi kesalahan dalam proses transaksi."]];
					} else {
						$this->db->trans_commit();
						$data = ["metadata" => ["code" => 200, "message" => "Berhasil. Data tersimpan ke database dan file dihapus."]];
					}
				} else {
					$data = ["metadata" => ["code" => 400, "message" => "Gagal membaca file CSV."]];
				}
			} else {
				$data = ["metadata" => ["code" => 400, "message" => "Upload Gagal. Silahkan coba lagi."]];
			}
		} else {
			$data = ["metadata" => ["code" => 400, "message" => "Harap pilih file untuk diupload"]];
		}


		$this->response($data, REST_Controller::HTTP_OK);
		return;
	}
}
