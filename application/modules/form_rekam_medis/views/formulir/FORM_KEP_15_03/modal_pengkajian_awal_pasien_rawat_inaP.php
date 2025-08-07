<!-- Modal -->
<!-- Rawat Inap -->
<div class="modal fade" id="modal_pengkajian_awal_pasien_rawat_inaP" data-backdrop="static">
	<div class="modal-dialog modal-dialog-scrollable" style="max-width: 90%;">
		<div class="modal-content">
			<div class="modal-header">
				<div class="title">
					<h5 class="modal-title bold" id="modal_pengkajian_awal_pasien_rawat_inaP">FORM PENGKAJIAN AWAL PASIEN RAWAT INAP</h5>
					<h6 class="modal-title text-muted"><small>(Dilengkapi dalam waktu 24 jam pertama pasien masuk ruang rawat inap)</small></h6>
				</div>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true" style="font-size: 16pt;">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<?= form_open('', 'id=form_pengkajian_awal class="form-horizontal"') ?>
					<input type="hidden" name="id_pendaftaran" id="id_pendaftaran">
					<input type="hidden" name="id_layanan_pendaftaran" id="id_layanan_pendaftaran">
					<input type="hidden" name="id_pasien" id="id_pasien">
					<input type="hidden" name="id_kajian_keperawatan" id="id_kajian_keperawatan">
					<input type="hidden" name="id_kajian_medis" id="id_kajian_medis">
					<!-- header -->
					<div class="row">
						<div class="col-lg-6">
							<div class="table-responsive">
								<table class="table table-sm table-striped">
									<tr>
										<td width="20%" class="bold">Nama Pasien</td>
										<td wdith="80%">: <span id="pa_pasien_nama"></span></td>
									</tr>
									<tr>
										<td class="bold">No. RM</td>
										<td>: <span id="pa_pasien_no_rm"></span></td>
									</tr>
									<tr>
										<td class="bold">Tanggal Lahir</td>
										<td>: <span id="pa_pasien_tanggal_lahir"></span></td>
									</tr>
									<tr>
										<td class="bold">Jenis Kelamin</td>
										<td>: <span id="pa_pasien_jenis_kelamin"></span></td>
									</tr>
								</table>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="table-responsive">
								<table class="table table-sm table-striped">
									<tr>
										<td width="30%" class="bold">Ruang Rawat/Unit Kerja</td>
										<td wdith="70%">: <span id="pa_bed"></span></td>
									</tr>
									<tr>
										<td width="30%" class="bold">Pengkajian Awal IGD</td>
										<td>: 
											<button type="button" class="btn btn-secondary btn-xxs" onclick="riwayatPengkajianMedisIGD()"><i class="fas fa-eye m-r-5"></i>Pengkajian Medis dan Keperawatan IGD</button>
										</td>
									</tr>
									<tr>
										<td colspan="2">
											<div class="logo-pasien-alergi">
												<img src="<?= resource_url() ?>images/diagnosa/alergi.jpg" alt="logo-pasien-alergi" class="img-thumbnail rounded" width="20%">
												<!-- logo pasien alergi -->
											</div>
										</td>
									</tr>
								</table>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-lg-12">
							<div class="widget-body">
								<div id="wizard_form_pengkajian_awal_ranap">
									<ol>
										<li>Pengkajian Keperawatan <i class="bold"><small>(Diisi Oleh Perawat)</small></i></li>
										<li>Pengkajian Medis <i class="bold"><small>(Diisi Oleh Dokter)</small></i></li>
									</ol>

									<!-- Data bwizard -->
									<!-- Data Pengkajian Perawat-->
									<div class="form-data-pengkajian-perawat">
										<table class="table table-no-border table-sm table-striped">
											<tr>
												<td colspan="3">
													<button class="btn btn-info btn-xs mr-1 float-left" type="button" id="btn_expand_all"><i class="fas fa-fw fa-expand mr-1"></i>Expand All</button>
													<button class="btn btn-warning btn-xs mr-1 float-left" type="button" id="btn_collapse_all"><i class="fas fa-fw fa-compress mr-1"></i>Collapse All</button>
													<span id="desclaimer_history" style="color:red; font-style:italic;"></span><button class="btn btn-success btn-xs mr-1 float-left" type="button" id="btn_history_logs"><i class="fas fa-fw fa-history mr-1"></i>Show History Logs</button>
												</td>
											</tr>
											<tr>
												<td width="20%" class="bold">Tanggal / Jam Masuk</td>
												<td wdith="1%" class="bold">:</td>
												<td width="79%"><input type="text" name="waktu_masuk" id="waktu_masuk_ranap" class="custom-form clear-input col-lg-2" readonly></td>
											</tr>
											<tr>
												<td class="bold">Tanggal / Jam Pengkajian</td>
												<td class="bold">:</td>
												<td>
													<input type="text" name="waktu_pengkajian" id="waktu_kajian_perawat" class="custom-form clear-input col-lg-2" value="<?= date('d/m/Y H:i') ?>">
												</td>
											</tr>
											<tr>
												<td class="bold">Agama</td>
												<td class="bold">:</td>
												<td>
													<input type="checkbox" name="agama_islam" id="agama_islam" value="1" class="mr-1" disabled>Islam
													<input type="checkbox" name="agama_kristen" id="agama_kristen" value="1" class="mr-1 ml-2" disabled>Kristen
													<input type="checkbox" name="agama_hindu" id="agama_hindu" value="1" class="mr-1 ml-2" disabled>Hindu
													<input type="checkbox" name="agama_katholik" id="agama_katholik" value="1" class="mr-1 ml-2" disabled>Katholik
													<input type="checkbox" name="agama_buddha" id="agama_buddha" value="1" class="mr-1 ml-2" disabled>Buddha
													<input type="checkbox" name="agama_lain" id="agama_lain" value="1" class="mr-1 ml-2" disabled>
													<input type="text" name="agama_lain_input" id="agama_lain_input" class="custom-form clear-input d-inline-block col-lg-4" placeholder="Masukkan agama lain" disabled>
												</td>
											</tr>
											<tr>
												<td class="bold">Pendidikan</td>
												<td class="bold">:</td>
												<td><input type="text" name="pendidikan" id="pendidikan_pasien" class="custom-form clear-input col-lg-3" placeholder="Masukkan pendidikan" readonly></td>
											</tr>
											<tr>
												<td class="bold">Cara Masuk RS</td>
												<td class="bold">:</td>
												<td>
													<input type="checkbox" name="cara_masuk_irj" id="cara_masuk_irj" value="1" class="mr-1" disabled>IRJ
													<input type="checkbox" name="cara_masuk_igd" id="cara_masuk_igd" value="1" class="mr-1 ml-2" disabled>IGD
													<input type="checkbox" name="cara_masuk_lain" id="cara_masuk_lain" value="1" class="mr-1 ml-2" disabled>Lain-lain
													<input type="text" name="cara_masuk_lain_input" id="cara_masuk_lain_input" class="custom-form clear-input d-inline-block col-lg-4" placeholder="Masukkan cara masuk RS" disabled>
												</td>
											</tr>
											<tr>
												<td class="bold">Tiba Diruangan Rawat dengan Cara</td>
												<td class="bold">:</td>
												<td>
													<input type="radio" name="cara_tiba_diruangan" id="cara_tiba_diruangan_jalan" value="Jalan" class="mr-1">Jalan
													<input type="radio" name="cara_tiba_diruangan" id="cara_tiba_diruangan_brankar" value="Brankar" class="mr-1 ml-2">Brankar
													<input type="radio" name="cara_tiba_diruangan" id="cara_tiba_diruangan_kursi_roda" value="Kursi Roda" class="mr-1 ml-2">Kursi Roda
												</td>
											</tr>
										</table>

										<!-- Row Data Kesehatan -->
										<table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
											<tr>
												<td colspan="3" class="center bold td-dark">
													<button class="btn btn-info btn-xs mr-1 float-left" type="button" data-toggle="collapse" data-target="#data-kesehatan-pasien"><i class="fas fa-expand mr-1"></i>Expand</button>DATA KESEHATAN PASIEN
												</td>
											</tr>
										</table>
										<div class="collapse multi-collapse mt-2" id="data-kesehatan-pasien">
											<table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
												<tr>
													<td width="20%" class="bold">Informasi Diperoleh dari</td>
													<td wdith="1%" class="bold">:</td>
													<td width="79%">
														<input type="checkbox" name="informasi_dari_pasien" id="informasi_dari_pasien" value="1" class="mr-1">Pasien
														<input type="checkbox" name="informasi_dari_keluarga" id="informasi_dari_keluarga" value="1" class="mr-1 ml-2">Keluarga
														<input type="checkbox" name="informasi_dari_lain" id="informasi_dari_lain" value="1" class="mr-1 ml-2">Lain-lain
														<input type="text" name="informasi_dari_lain_input" id="informasi_dari_lain_input" class="custom-form clear-input d-inline-block col-lg-4 disabled" placeholder="Masukkan informasi lain">
													</td>
												</tr>
												<tr>
													<td class="bold">Keluhan Utama</td>
													<td class="bold">:</td>
													<td><input type="text" name="keluhan_utama" id="keluhan_utama_pengkajian_awal" class="custom-form clear-input col-lg-6" placeholder="Masukkan keluhan utama"></td>
												</tr>
												<tr>
													<td class="bold">Mulai Timbul Keluhan</td>
													<td class="bold">:</td>
													<td>
														<input type="text" name="mulai_timbul_keluhan" id="mulai_timbul_keluhan" class="custom-form clear-input col-lg-3 d-inline-block" placeholder="Masukkan mulai timbul keluhan">
														<span class="bold ml-2">Lama Keluhan : </span><input type="text" name="lama_keluhan" id="lama_keluhan" class="custom-form clear-input col-lg-3 d-inline-block" placeholder="Masukkan lama keluhan">
													</td>
												</tr>
												<tr>
													<td class="bold">Faktor Pencetus</td>
													<td class="bold">:</td>
													<td>
														<input type="checkbox" name="faktor_pencetus_infeksi" id="faktor_pencetus_infeksi" value="1" class="mr-1">Infeksi
														<input type="checkbox" name="faktor_pencetus_lain" id="faktor_pencetus_lain" value="1" class="mr-1 ml-2">Lain-lain
														<input type="text" name="faktor_pencetus_lain_input" id="faktor_pencetus_lain_input" class="custom-form clear-input d-inline-block col-lg-4 disabled" placeholder="Masukkan faktor pencetus lain">
													</td>
												</tr>
												<tr>
													<td class="bold">Sifat Keluhan</td>
													<td class="bold">:</td>
													<td>
														<input type="radio" name="sifat_keluhan" id="sifat_keluhan_akut" value="Akut" class="mr-1">Akut
														<input type="radio" name="sifat_keluhan" id="sifat_keluhan_kronik" value="Kronik" class="mr-1 ml-2">Kronik
													</td>
												</tr>
												<tr><td colspan="3"></td></tr>
												<tr>
													<td class="bold">Riwayat Penyakit Sekarang</td>
													<td class="bold">:</td>
													<td><input type="text" name="riwayat_penyakit_sekarang" id="riwayat_penyakit_sekarang_pengkajian_awal" class="custom-form clear-input col-lg-6" placeholder="Masukkan riwayat penyakit sekarang"></td>
												</tr>
												<tr>
													<td class="bold">Riwayat Penyakit Terdahulu</td>
													<td class="bold">:</td>
													<td>
														<input type="checkbox" name="rpt_asma" id="rpt_asma" value="1" class="mr-1">Asma
														<input type="checkbox" name="rpt_hipertensi" id="rpt_hipertensi" value="1" class="mr-1 ml-2">Hipertensi
														<input type="checkbox" name="rpt_jantung" id="rpt_jantung" value="1" class="mr-1 ml-2">Jantung
														<input type="checkbox" name="rpt_diabetes" id="rpt_diabetes" value="1" class="mr-1 ml-2">Diabetes
														<input type="checkbox" name="rpt_hepatitis" id="rpt_hepatitis" value="1" class="mr-1 ml-2">Hepatitis
														<input type="checkbox" name="rpt_lain" id="rpt_lain" value="1" class="mr-1 ml-2">Lain-lain
														<input type="text" name="rpt_lain_input" id="rpt_lain_input" class="custom-form clear-input d-inline-block col-lg-4 disabled" placeholder="Masukkan riwayat penyakit terdahulu lain">
													</td>
												</tr>
												<tr>
													<td class="bold">Riwayat Penyakit Keluarga</td>
													<td class="bold">:</td>
													<td>
														<input type="checkbox" name="rpk_asma" id="rpk_asma" value="1" class="mr-1">Asma
														<input type="checkbox" name="rpk_hipertensi" id="rpk_hipertensi" value="1" class="mr-1 ml-2">Hipertensi
														<input type="checkbox" name="rpk_jantung" id="rpk_jantung" value="1" class="mr-1 ml-2">Jantung
														<input type="checkbox" name="rpk_diabetes" id="rpk_diabetes" value="1" class="mr-1 ml-2">Diabetes
														<input type="checkbox" name="rpk_hepatitis" id="rpk_hepatitis" value="1" class="mr-1 ml-2">Hepatitis
														<input type="checkbox" name="rpk_lain" id="rpk_lain" value="1" class="mr-1 ml-2">Lain-lain
														<input type="text" name="rpk_lain_input" id="rpk_lain_input" class="custom-form clear-input d-inline-block col-lg-4 disabled" placeholder="Masukkan riwayat penyakit keluarga lain">
													</td>
												</tr>
												<tr>
													<td class="bold">Pernah Dirawat</td>
													<td class="bold">:</td>
													<td>
														<input type="radio" name="pernah_dirawat" id="pernah_dirawat_tidak" value="0" class="mr-1" checked>Tidak
														<input type="radio" name="pernah_dirawat" id="pernah_dirawat_ya" value="1" class="mr-1 ml-2">Ya, Kapan
														<input type="text" name="pernah_dirawat_kapan" id="pernah_dirawat_kapan" class="custom-form clear-input d-inline-block col-lg-4 disabled" placeholder="Masukkan kapan pernah dirawat">
														<span class="ml-2 mr-1">Dimana</span><input type="text" name="pernah_dirawat_dimana" id="pernah_dirawat_dimana" class="custom-form clear-input d-inline-block col-lg-4 disabled" placeholder="Masukkan pernah dirawat dimana">
													</td>
												</tr>
												<tr>
													<td class="bold">Kebiasaan</td>
													<td class="bold">:</td>
													<td>
														<span class="bold mr-1">Merokok :</span>
														<input type="radio" name="kebiasaan_merokok" id="kebiasaan_merokok_tidak" value="0" class="mr-1" checked>Tidak
														<input type="radio" name="kebiasaan_merokok" id="kebiasaan_merokok_ya" value="1" class="mr-1 ml-2">Ya,
														<input type="text" name="kebiasaan_merokok_input" id="kebiasaan_merokok_input" class="custom-form clear-input d-inline-block col-lg-2 disabled" placeholder="Batang/hari">
													</td>
												</tr>
												<tr>
													<td class="bold"></td>
													<td class="bold"></td>
													<td>
														<span class="bold mr-1">Alkohol :</span>
														<input type="radio" name="kebiasaan_alkohol" id="kebiasaan_alkohol_tidak" value="0" class="mr-1" checked>Tidak
														<input type="radio" name="kebiasaan_alkohol" id="kebiasaan_alkohol_ya" value="1" class="mr-1 ml-2">Ya,
														<input type="text" name="kebiasaan_alkohol_input" id="kebiasaan_alkohol_input" class="custom-form clear-input d-inline-block col-lg-2 disabled" placeholder="Gelas/hari">
													</td>
												</tr>
												<tr>
													<td class="bold"></td>
													<td class="bold"></td>
													<td>
														<span class="bold mr-1">Obat Tidur / Narkoba :</span>
														<input type="radio" name="kebiasaan_narkoba" id="kebiasaan_narkoba_tidak" value="0" class="mr-1" checked>Tidak
														<input type="radio" name="kebiasaan_narkoba" id="kebiasaan_narkoba_ya" value="1" class="mr-1 ml-2">Ya
													</td>
												</tr>
												<tr>
													<td class="bold"></td>
													<td class="bold"></td>
													<td>
														<span class="bold mr-1">Olahraga :</span>
														<input type="radio" name="kebiasaan_olahraga" id="kebiasaan_olahraga_tidak" value="0" class="mr-1" checked>Tidak
														<input type="radio" name="kebiasaan_olahraga" id="kebiasaan_olahraga_ya" value="1" class="mr-1 ml-2">Ya
													</td>
												</tr>
												<tr>
													<td class="bold">Riwayat Operasi</td>
													<td class="bold">:</td>
													<td>
														<input type="radio" name="riwayat_operasi" id="riwayat_operasi_tidak" value="0" class="mr-1" checked>Tidak
														<input type="radio" name="riwayat_operasi" id="riwayat_operasi_ya" value="1" class="mr-1 ml-2">Ya, Kapan
														<input type="text" name="riwayat_operasi_kapan" id="riwayat_operasi_kapan" class="custom-form clear-input d-inline-block col-lg-4 disabled" placeholder="Masukkan kapan pernah dioperasi">
														<span class="ml-2 mr-1">Dimana</span><input type="text" name="riwayat_operasi_dimana" id="riwayat_operasi_dimana" class="custom-form clear-input d-inline-block col-lg-4 disabled" placeholder="Masukkan pernah dioperasi dimana">
													</td>
												</tr>
												<tr>
													<td class="bold">Membawa Obat dari Luar</td>
													<td class="bold">:</td>
													<td>
														<input type="radio" name="obat_luar" id="obat_luar_tidak" value="0" class="mr-1" checked>Tidak
														<input type="radio" name="obat_luar" id="obat_luar_ya" value="1" class="mr-1 ml-2">Ya <i>(Jika ya, lapor farmasi untuk rekonsiliasi obat)</i>
													</td>
												</tr>
											</table>
										</div>

										<!-- Row Data Riwayat Alergi -->
										<table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
											<tr>
												<td colspan="3" class="center bold td-dark">
													<button class="btn btn-info btn-xs mr-1 float-left" type="button" data-toggle="collapse" data-target="#data-riwayat-alergi"><i class="fas fa-expand mr-1"></i>Expand</button>RIWAYAT ALERGI
												</td>
											</tr>
										</table>
										<div class="collapse multi-collapse mt-2" id="data-riwayat-alergi">
											<table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
												<tr>
													<td width="20%" class="bold">Alergi</td>
													<td wdith="1%" class="bold">:</td>
													<td width="79%">
														<input type="radio" name="alergi" id="alergi_tidak" value="0" class="mr-1" checked>Tidak
														<input type="radio" name="alergi" id="alergi_tidak_tahu" value="2" class="mr-1 ml-2">Tidak Tahu
														<input type="radio" name="alergi" id="alergi_ya" value="1" class="mr-1 ml-2">Ya, Bila Ya
													</td>
												</tr>
												<tr>
													<td class="bold">Alergi Obat</td>
													<td class="bold">:</td>
													<td>
														<input type="text" name="alergi_obat" id="alergi_obat" class="custom-form clear-input d-inline-block col-lg-4" placeholder="Sebutkan alergi obat">
														<input type="text" name="alergi_obat_reaksi" id="alergi_obat_reaksi" class="custom-form clear-input d-inline-block col-lg-4" placeholder="Reaksi alergi obat">
													</td>
												</tr>
												<tr>
													<td class="bold">Alergi Makanan</td>
													<td class="bold">:</td>
													<td>
														<input type="text" name="alergi_makanan" id="alergi_makanan" class="custom-form clear-input d-inline-block col-lg-4" placeholder="Sebutkan alergi makanan">
														<input type="text" name="alergi_makanan_reaksi" id="alergi_makanan_reaksi" class="custom-form clear-input d-inline-block col-lg-4" placeholder="Reaksi alergi makanan">
													</td>
												</tr>
												<tr>
													<td colspan="3" class="bold"><i>(Bila ada alergi segera pasang gelang merah dan tulis nama obat/makanan)</i></td>
												</tr>
											</table>
										</div>

										<!-- Row Data Riwayat Kehamilan -->
										<table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
											<tr>
												<td colspan="3" class="center bold td-dark">
													<button class="btn btn-info btn-xs mr-1 float-left" type="button" data-toggle="collapse" data-target="#data-riwayat-kehamilan"><i class="fas fa-expand mr-1"></i>Expand</button>RIWAYAT KEHAMILAN
												</td>
											</tr>
										</table>
										<div class="collapse multi-collapse mt-2" id="data-riwayat-kehamilan">
											<table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
												<tr>
													<td width="20%" class="bold">Apakah Dalam Keadaan Hamil</td>
													<td wdith="1%" class="bold">:</td>
													<td width="79%">
														<input type="radio" name="hamil" id="hamil_tidak" value="0" class="mr-1" checked>Tidak
														<input type="radio" name="hamil" id="hamil_ya" value="1" class="mr-1 ml-2">Ya
													</td>
												</tr>
												<tr>
													<td class="bold">Apakah sedang Menyusui</td>
													<td class="bold">:</td>
													<td>
														<input type="radio" name="menyusui" id="menyusui_tidak" value="0" class="mr-1" checked>Tidak
														<input type="radio" name="menyusui" id="menyusui_ya" value="1" class="mr-1 ml-2">Ya
													</td>
												</tr>
												<tr>
													<td class="bold">Riwayat Kelahiraan</td>
													<td class="bold">:</td>
													<td>
														<input type="radio" name="riwayat_kelahiran" id="riwayat_kelahiran_spontan" value="Spontan" class="mr-1">Spontan
														<input type="radio" name="riwayat_kelahiran" id="riwayat_kelahiran_operasi" value="Operasi" class="mr-1 ml-2">Operasi
														<input type="radio" name="riwayat_kelahiran" id="riwayat_kelahiran_cukup_bulan" value="Cukup Bulan" class="mr-1 ml-2">Cukup Bulan
														<input type="radio" name="riwayat_kelahiran" id="riwayat_kelahiran_kurang_bulan" value="Kurang Bulan" class="mr-1 ml-2">Kurang Bulan
													</td>
												</tr>
											</table>
										</div>

										<!-- Row Data Riwayat Kehamilan -->
										<table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
											<tr>
												<td colspan="3" class="center bold td-dark">
													<button class="btn btn-info btn-xs mr-1 float-left" type="button" data-toggle="collapse" data-target="#data-vital-sign"><i class="fas fa-expand mr-1"></i>Expand</button>PEMERIKSAAN FISIK DAN TANDA-TANDA VITAL
												</td>
											</tr>
										</table>
										<div class="collapse multi-collapse mt-2" id="data-vital-sign">
											<table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
												<tr>
													<td width="20%" class="bold">Kesadaran</td>
													<td wdith="1%" class="bold">:</td>
													<td width="39%">
														<input type="checkbox" name="composmentis" id="composmentis" value="1" class="mr-1">Composmentis
														<input type="checkbox" name="apatis" id="apatis" value="1" class="mr-1 ml-2">Apatis
														<input type="checkbox" name="samnolen" id="samnolen" value="1" class="mr-1 ml-2">Samnolen
														<input type="checkbox" name="sopor" id="sopor" value="1" class="mr-1 ml-2">Sopor
														<input type="checkbox" name="koma" id="koma" value="1" class="mr-1 ml-2">Koma
													</td>
													<td></td>
													<td width="15%"></td>
													<td width="1%"></td>
													<td width="39%"></td>
												</tr>
												<tr>
													<td></td>
													<td></td>
													<td>
														<span class="bold">GCS : 
															E <input type="text" name="gcs_e" id="gcs_e" class="custom-form clear-input d-inline-block col-lg-1" placeholder="" onkeypress="return hanyaAngka(event)">
															M <input typevent="text" name="gcs_m" id="gcs_m" class="custom-form clear-input d-inline-block col-lg-1" placeholder="" onkeypress="return hanyaAngka(event)">
															V <input type="teventxt" name="gcs_v" id="gcs_v" class="custom-form clear-input d-inline-block col-lg-1" placeholder="" onkeypress="return hanyaAngka(event)">
														</span>
													</td>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
												</tr>
												<tr>
													<td class="bold">Tekanan Darah</td>
													<td class="bold">:</td>
													<td>
														<div class="input-group">
															<input type="text" name="tensi_sis" id="pa_tensi_sis" class="custom-form clear-input d-inline-block col-lg-2" placeholder="Sistolik" onkeypress="return hanyaAngka(event)">
															<span>/</span>
															<input type="text" name="tensi_dis" id="pa_tensi_dis" class="custom-form clear-input d-inline-block col-lg-2" placeholder="Diastolik" onkeypress="return hanyaAngka(event)">
															<div class="input-group-append">
																<span class="input-group-custom">mmHg</span>
															</div>
														</div>
													</td>
													<td></td>
													<td class="bold">Suhu</td>
													<td class="bold">:</td>
													<td>
														<div class="input-group">
															<input type="text" name="suhu_pa" id="pa_suhu" class="custom-form clear-input d-inline-block col-lg-3" placeholder="Suhu" onkeypress="return hanyaAngka(event)">
															<div class="input-group-append">
																<span class="input-group-custom">&#8451;</span>
															</div>
														</div>
													</td>
												</tr>
												<tr>
													<td class="bold">Frekuensi Nadi</td>
													<td class="bold">:</td>
													<td>
														<div class="input-group">
															<input type="text" name="nadi_pa" id="pa_nadi" class="custom-form clear-input d-inline-block col-lg-2" placeholder="Nadi" onkeypress="return hanyaAngka(event)">
															<div class="input-group-append">
																<span class="input-group-custom">x/mnt</span>
															</div>
														</div>
													</td>
													<td></td>
													<td class="bold">Frekuensi Nafas</td>
													<td class="bold">:</td>
													<td>
														<div class="input-group">
															<input type="text" name="nafas_pa" id="pa_nafas" class="custom-form clear-input d-inline-block col-lg-3" placeholder="Nafas" onkeypress="return hanyaAngka(event)">
															<div class="input-group-append">
																<span class="input-group-custom">x/mnt</span>
															</div>
														</div>
													</td>
												</tr>
												<tr>
													<td class="bold">Tinggi Badan</td>
													<td class="bold">:</td>
													<td>
														<div class="input-group">
															<input type="text" name="tinggi_badan" id="pa_tinggi_badan" class="custom-form clear-input d-inline-block col-lg-3" placeholder="Tinggi Badan" onkeypress="return hanyaAngka(event)">
															<div class="input-group-append">
																<span class="input-group-custom">Cm</span>
															</div>
														</div>
													</td>
													<td></td>
													<td class="bold">Berat Badan</td>
													<td class="bold">:</td>
													<td>
														<div class="input-group">
															<input type="text" name="berat_badan" id="pa_berat_badan" class="custom-form clear-input d-inline-block col-lg-4" placeholder="Berat Badan" onkeypress="return hanyaAngka(event)">
															<div class="input-group-append">
																<span class="input-group-custom">Kg</span>
															</div>
														</div>
													</td>
												</tr>
											</table>
											<hr>
											<table class="table table-no-border table-sm table-striped">
												<tr>
													<td colspan="3" class="bold">Sistem Pernafasan</td>
												</tr>
												<tr>
													<td width="20%"><span class="ml-4">Suara Nafas</span></td>
													<td wdith="1%">:</td>
													<td width="79%">
														<input type="checkbox" name="sf_vesikuler" id="sf_vesikuler" value="1" class="mr-1">Vesikuler
														<input type="checkbox" name="sf_wheezing" id="sf_wheezing" value="1" class="mr-1 ml-2">Wheezing
														<input type="checkbox" name="sf_ronchi" id="sf_ronchi" value="1" class="mr-1 ml-2">Ronchi
														<input type="checkbox" name="sf_dispnoe" id="sf_dispnoe" value="1" class="mr-1 ml-2">Dispnoe
														<input type="checkbox" name="sf_stridor" id="sf_stridor" value="1" class="mr-1 ml-2">Stridor
													</td>
												</tr>
												<tr>
													<td><span class="ml-4">Pola Nafas</span></td>
													<td>:</td>
													<td>
														<input type="checkbox" name="pn_normal" id="pn_normal" value="1" class="mr-1">Normal
														<input type="checkbox" name="pn_bradipnea" id="pn_bradipnea" value="1" class="mr-1 ml-2">Bradipnea
														<input type="checkbox" name="pn_tachipnea" id="pn_tachipnea" value="1" class="mr-1 ml-2">Tachipnea
													</td>
												</tr>
												<tr>
													<td><span class="ml-4">Jenis Pernafasan</span></td>
													<td>:</td>
													<td>
														<input type="checkbox" name="jp_dada" id="jp_dada" value="1" class="mr-1">Pernafasan Dada
														<input type="checkbox" name="jp_perut" id="jp_perut" value="1" class="mr-1 ml-2">Pernafasan Perut
														<input type="checkbox" name="jp_cuping_hidung" id="jp_cuping_hidung" value="1" class="mr-1 ml-2">Cuping Hidung
													</td>
												</tr>
												<tr>
													<td><span class="ml-4">Otot Bantu Nafas</span></td>
													<td>:</td>
													<td>
														<input type="radio" name="otot_bantu_nafas" id="otot_bantu_nafas_tidak" value="0" class="mr-1" checked>Tidak
														<input type="radio" name="otot_bantu_nafas" id="otot_bantu_nafas_ya" value="1" class="mr-1 ml-2">Ya
													</td>
												</tr>
												<tr><td colspan="3"></td></tr>
												<tr>
													<td><span class="ml-4">Irama Nafas</span></td>
													<td>:</td>
													<td>
														<input type="radio" name="irama_nafas" id="irama_nafas_ya" value="1" class="mr-1" checked>Teratur
														<input type="radio" name="irama_nafas" id="irama_nafas_tidak" value="0" class="mr-1 ml-2">Tidak Teratur
													</td>
												</tr>
												<tr>
													<td><span class="ml-4">Batuk dan Sekresi</span></td>
													<td>:</td>
													<td>
														<input type="radio" name="batuk_sekresi" id="batuk_sekresi_tidak" value="0" class="mr-1" checked>Tidak
														<input type="radio" name="batuk_sekresi" id="batuk_sekresi_ya" value="1" class="mr-1 ml-2">Ya
														<span class="ml-5">: </span><input type="checkbox" name="bs_produktif" id="bs_produktif" value="1" class="mr-1">Produktif
														<input type="checkbox" name="bs_non_produktif" id="bs_non_produktif" value="1" class="mr-1 ml-2">Non Produktif
														<input type="checkbox" name="bs_hemaptoe" id="bs_hemaptoe" value="1" class="mr-1 ml-2">Hemaptoe
														<input type="checkbox" name="bs_lain" id="bs_lain" value="1" class="mr-1 ml-2">Lain-lain
														<input type="text" name="bs_lain_input" id="bs_lain_input" class="custom-form clear-input d-inline-block col-lg-4 disabled" placeholder="Masukkan lain - lain">
													</td>
												</tr>
											</table>
											<hr>
											<table class="table table-no-border table-sm table-striped">
												<tr>
													<td colspan="3" class="bold">Sistem Kardio-vaskuler</td>
												</tr>
												<tr>
													<td width="20%"><span class="ml-4">Warna Kulit</span></td>
													<td wdith="1%">:</td>
													<td width="79%">
														<input type="checkbox" name="wk_normal" id="wk_normal" value="1" class="mr-1">Normal
														<input type="checkbox" name="wk_kemerahan" id="wk_kemerahan" value="1" class="mr-1 ml-2">Kemerahan
														<input type="checkbox" name="wk_sianosis" id="wk_sianosis" value="1" class="mr-1 ml-2">Sianosis
														<input type="checkbox" name="wk_pucat" id="wk_pucat" value="1" class="mr-1 ml-2">Pucat
														<input type="checkbox" name="wk_lain" id="wk_lain" value="1" class="mr-1 ml-2">Lain-lain
														<input type="text" name="wk_lain_input" id="wk_lain_input" class="custom-form clear-input d-inline-block col-lg-4 disabled" placeholder="Masukkan lain - lain">
													</td>
												</tr>
												<tr>
													<td><span class="ml-4">Nyeri Dada</span></td>
													<td>:</td>
													<td>
														<input type="radio" name="nyeri_dada" id="nyeri_dada_tidak" value="0" class="mr-1" checked>Tidak
														<input type="radio" name="nyeri_dada" id="nyeri_dada_ya" value="1" class="mr-1 ml-2">Ya,
														<input type="text" name="nyeri_dada_input" id="nyeri_dada_input" class="custom-form clear-input d-inline-block col-lg-2 disabled" placeholder="Sebutkan">
													</td>
												</tr>
												<tr>
													<td><span class="ml-4">Denyut Nadi</span></td>
													<td>:</td>
													<td>
														<input type="radio" name="denyut_nadi" id="denyut_nadi_ya" value="1" class="mr-1" checked>Teratur
														<input type="radio" name="denyut_nadi" id="denyut_nadi_tidak" value="0" class="mr-1 ml-2">Tidak Teratur
													</td>
												</tr>
												<tr>
													<td><span class="ml-4">Sirkulasi</span></td>
													<td>:</td>
													<td>
														<input type="checkbox" name="s_akral_hangat" id="s_akral_hangat" value="1" class="mr-1">Akral Hangat
														<input type="checkbox" name="s_akral_dingin" id="s_akral_dingin" value="1" class="mr-1 ml-2">Akral Dingin
														<input type="checkbox" name="s_rasa_bebas" id="s_rasa_bebas" value="1" class="mr-1 ml-2">Rasa Kebas
														<input type="checkbox" name="s_palpitasi" id="s_palpitasi" value="1" class="mr-1 ml-2">Palpitasi
														<input type="checkbox" name="s_edema" id="s_edema" value="1" class="mr-1 ml-2">Edema, Lokasi
														<input type="text" name="s_edema_input" id="s_edema_input" class="custom-form clear-input d-inline-block col-lg-4 disabled" placeholder="Masukkan lokasi">
													</td>
												</tr>
												<tr>
													<td><span class="ml-4">Pulsasi</span></td>
													<td>:</td>
													<td>
														<input type="checkbox" name="pulsasi_kuat" id="pulsasi_kuat" value="1" class="mr-1">Kuat
														<input type="checkbox" name="pulsasi_lemah" id="pulsasi_lemah" value="1" class="mr-1 ml-2">Lemah
														<input type="checkbox" name="pulsasi_lain" id="pulsasi_lain" value="1" class="mr-1 ml-2">Lain - lain
														<input type="text" name="pulsasi_lain_input" id="pulsasi_lain_input" class="custom-form clear-input d-inline-block col-lg-4 disabled" placeholder="Masukkan lain-lain">
													</td>
												</tr>
											</table>
											<hr>
											<table class="table table-no-border table-sm table-striped">
												<tr>
													<td colspan="3" class="bold">Sistem Pencernaan</td>
												</tr>
												<tr>
													<td width="20%"><span class="ml-4">Mulut</span></td>
													<td wdith="1%">:</td>
													<td width="79%">
														<input type="checkbox" name="mulut_tidak_ada_kelainan" id="mulut_tidak_ada_kelainan" value="1" class="mr-1">Tidak Ada Kelainan
														<input type="checkbox" name="mulut_simetris" id="mulut_simetris" value="1" class="mr-1 ml-2">Simetris
														<input type="checkbox" name="mulut_asimetris" id="mulut_asimetris" value="1" class="mr-1 ml-2">Asimetris
														<input type="checkbox" name="mulut_mukosa" id="mulut_mukosa" value="1" class="mr-1 ml-2">Mukosa Mulut Kering
														<input type="checkbox" name="mulut_bibir_pucat" id="mulut_bibir_pucat" value="1" class="mr-1 ml-2">Bibir Pucat
														<input type="checkbox" name="mulut_lain" id="mulut_lain" value="1" class="mr-1 ml-2">Lain-lain
														<input type="text" name="mulut_lain_input" id="mulut_lain_input" class="custom-form clear-input d-inline-block col-lg-4 disabled" placeholder="Masukkan lain - lain">
													</td>
												</tr>
												<tr>
													<td><span class="ml-4">Gigi</span></td>
													<td>:</td>
													<td>
														<input type="checkbox" name="gigi_tidak_ada_kelainan" id="gigi_tidak_ada_kelainan" value="1" class="mr-1">Tidak Ada Kelainan
														<input type="checkbox" name="gigi_caries" id="gigi_caries" value="1" class="mr-1 ml-2">Caries
														<input type="checkbox" name="gigi_goyang" id="gigi_goyang" value="1" class="mr-1 ml-2">Goyang
														<input type="checkbox" name="gigi_palsu" id="gigi_palsu" value="1" class="mr-1 ml-2">Gigi Palsu
														<input type="checkbox" name="gigi_lain" id="gigi_lain" value="1" class="mr-1 ml-2">Lain-lain
														<input type="text" name="gigi_lain_input" id="gigi_lain_input" class="custom-form clear-input d-inline-block col-lg-4 disabled" placeholder="Masukkan lain - lain">
													</td>
												</tr>
												<tr>
													<td><span class="ml-4">Lidah</span></td>
													<td>:</td>
													<td>
														<input type="checkbox" name="lidah_tidak_ada_kelainan" id="lidah_tidak_ada_kelainan" value="1" class="mr-1">Tidak Ada Kelainan
														<input type="checkbox" name="lidah_kotor" id="lidah_kotor" value="1" class="mr-1 ml-2">Kotor
														<input type="checkbox" name="lidah_gerakan_asimetris" id="lidah_gerakan_asimetris" value="1" class="mr-1 ml-2">Gerakan Asimetris
														<input type="checkbox" name="lidah_lain" id="lidah_lain" value="1" class="mr-1 ml-2">Lain-lain
														<input type="text" name="lidah_lain_input" id="lidah_lain_input" class="custom-form clear-input d-inline-block col-lg-4 disabled" placeholder="Masukkan lain - lain">
													</td>
												</tr>
												<tr>
													<td><span class="ml-4">Tenggorokan</span></td>
													<td>:</td>
													<td>
														<input type="checkbox" name="teng_gangguan_menelan" id="teng_gangguan_menelan" value="1" class="mr-1">Gangguan Menelan
														<input type="checkbox" name="teng_sakit_menelan" id="teng_sakit_menelan" value="1" class="mr-1 ml-2">Sakit Menelan
														<input type="checkbox" name="teng_lain" id="teng_lain" value="1" class="mr-1 ml-2">Lain-lain
														<input type="text" name="teng_lain_input" id="teng_lain_input" class="custom-form clear-input d-inline-block col-lg-4 disabled" placeholder="Masukkan lain - lain">
													</td>
												</tr>
												<tr>
													<td><span class="ml-4">Abdomen</span></td>
													<td>:</td>
													<td>
														<input type="checkbox" name="abdomen_asites" id="abdomen_asites" value="1" class="mr-1">Asites
														<input type="checkbox" name="abdomen_tegang" id="abdomen_tegang" value="1" class="mr-1 ml-2">Tegang
														<input type="checkbox" name="abdomen_supel" id="abdomen_supel" value="1" class="mr-1 ml-2">Supel
														<input type="checkbox" name="abdomen_lain" id="abdomen_lain" value="1" class="mr-1 ml-2">Lain-lain
														<input type="text" name="abdomen_lain_input" id="abdomen_lain_input" class="custom-form clear-input d-inline-block col-lg-4 disabled" placeholder="Masukkan lain - lain">
													</td>
												</tr>
												<tr>
													<td><span class="ml-4">Nafsu Makan</span></td>
													<td>:</td>
													<td>
														<input type="radio" name="nafsu_makan" id="nafsu_makan_tetap" value="Tetap" class="mr-1">Tetap
														<input type="radio" name="nafsu_makan" id="nafsu_makan_naik" value="Naik" class="mr-1 ml-2">Naik
														<input type="radio" name="nafsu_makan" id="nafsu_makan_turun" value="Turun" class="mr-1 ml-2">Turun
													</td>
												</tr>
												<tr>
													<td><span class="ml-4">Mual</span></td>
													<td>:</td>
													<td>
														<input type="radio" name="mual" id="mual_ya" value="1" class="mr-1">Ada
														<input type="radio" name="mual" id="mual_tidak" value="0" class="mr-1 ml-2" checked>Tidak
													</td>
												</tr>
												<tr>
													<td><span class="ml-4">Muntah</span></td>
													<td>:</td>
													<td>
														<input type="radio" name="muntah" id="muntah_ya" value="1" class="mr-1">Ada
														<input type="radio" name="muntah" id="muntah_tidak" value="0" class="mr-1 ml-2" checked>Tidak
													</td>
												</tr>
												<tr>
													<td><span class="ml-4">Kesulitan Menelan</span></td>
													<td>:</td>
													<td>
														<input type="radio" name="kesulitan_menelan" id="kesulitan_menelan_ya" value="1" class="mr-1">Ada
														<input type="radio" name="kesulitan_menelan" id="kesulitan_menelan_tidak" value="0" class="mr-1 ml-2" checked>Tidak
													</td>
												</tr>
											</table>
											<hr>
											<table class="table table-no-border table-sm table-striped">
												<tr>
													<td colspan="3" class="bold">Eliminasi</td>
												</tr>
												<tr>
													<td width="20%"><span class="ml-4">BAB</span></td>
													<td wdith="1%">:</td>
													<td width="79%">
														<div class="input-group v-center">
															<input type="checkbox" name="bab_normal" id="bab_normal" value="1" class="mr-1">Normal
															<input type="checkbox" name="bab_konstipasi" id="bab_konstipasi" value="1" class="mr-1 ml-2">Konstipasi
															<input type="checkbox" name="bab_melena" id="bab_melena" value="1" class="mr-1 ml-2">Melena
															<input type="checkbox" name="bab_inkontinensia_alvi" id="bab_inkontinensia_alvi" value="1" class="mr-1 ml-2">Inkontinensia Alvi
															<input type="checkbox" name="bab_colostomy" id="bab_colostomy" value="1" class="mr-1 ml-2">Colostomy
															<input type="checkbox" name="bab_diare" id="bab_diare" value="1" class="mr-1 ml-2">Diare
															<input type="text" name="bab_diare_input" id="bab_diare_input" class="custom-form clear-input col-lg-2 ml-2 disabled" placeholder="Masukkan diare" onkeypress="return hanyaAngka(event)">
															<div class="input-group-append">
																<span class="input-group-custom">x/hr</span>
															</div>
														</div>
													</td>
												</tr>
												<tr>
													<td><span class="ml-4">BAK</span></td>
													<td>:</td>
													<td>
														<input type="checkbox" name="bak_normal" id="bak_normal" value="1" class="mr-1">Normal
														<input type="checkbox" name="bak_hematuri" id="bak_hematuri" value="1" class="mr-1 ml-2">Hematuri
														<input type="checkbox" name="bak_nokturia" id="bak_nokturia" value="1" class="mr-1 ml-2">Nokturia
														<input type="checkbox" name="bak_inkontinensia_uri" id="bak_inkontinensia_uri" value="1" class="mr-1 ml-2">Inkontinensia Uri
														<input type="checkbox" name="bak_urostomi" id="bak_urostomi" value="1" class="mr-1 ml-2">Urostomi
														<input type="checkbox" name="bak_urin_menetes" id="bak_urin_menetes" value="1" class="mr-1 ml-2">Urin Menetes
														<input type="checkbox" name="bak_kateter_warna" id="bak_kateter_warna" value="1" class="mr-1 ml-2">Kateter Warna
														<input type="text" name="bak_kateter_warna_input" id="bak_kateter_warna_input" class="custom-form clear-input d-inline-block col-lg-3 disabled" placeholder="Masukkan kateter warna">
													</td>
												</tr>
												<tr>
													<td><span class="ml-4"></span></td>
													<td></td>
													<td>
														<input type="checkbox" name="bak_kandung_kemih" id="bak_kandung_kemih" value="1" class="mr-1">Distensi Kandung Kemih
														<input type="checkbox" name="bak_lain" id="bak_lain" value="1" class="mr-1 ml-2">Lain - lain
														<input type="text" name="bak_lain_input" id="bak_lain_input" class="custom-form clear-input d-inline-block col-lg-4 disabled" placeholder="Masukkan lain - lain">
													</td>
												</tr>
											</table>
											<hr>
											<table class="table table-no-border table-sm table-striped">
												<tr>
													<td colspan="3" class="bold">Sistem Muskuloskeletal</td>
												</tr>
												<tr>
													<td width="20%"><span class="ml-4">Tulang</span></td>
													<td wdith="1%">:</td>
													<td width="79%">
														<input type="checkbox" name="sm_tulang_fraktur_terbuka" id="sm_tulang_fraktur_terbuka" value="1" class="mr-1">Fraktur Terbuka, lokasi
														<input type="text" name="sm_tulang_fraktur_terbuka_lokasi" id="sm_tulang_fraktur_terbuka_lokasi" class="custom-form clear-input d-inline-block col-lg-3 ml-2 disabled" placeholder="Masukkan lokasi fraktur terbuka">
														<input type="checkbox" name="sm_tulang_fraktur_tertutup" id="sm_tulang_fraktur_tertutup" value="1" class="mr-1 ml-5">Fraktur Tertutup, lokasi
														<input type="text" name="sm_tulang_fraktur_tertutup_lokasi" id="sm_tulang_fraktur_tertutup_lokasi" class="custom-form clear-input d-inline-block col-lg-3 ml-2 disabled" placeholder="Masukkan lokasi fraktur tertutup">

													</td>
												</tr>
												<tr>
													<td><span class="ml-4"></span></td>
													<td></td>
													<td>
														<input type="checkbox" name="sm_tulang_amputasi" id="sm_tulang_amputasi" value="1" class="mr-1">Amputasi
														<input type="checkbox" name="sm_tulang_tumor_tulang" id="sm_tulang_tumor_tulang" value="1" class="mr-1 ml-2">Tumor Tulang
														<input type="checkbox" name="sm_tulang_nyeri_tulang" id="sm_tulang_nyeri_tulang" value="1" class="mr-1 ml-2">Nyeri Tulang
													</td>
												</tr>
												<tr>
													<td><span class="ml-4">Sendi</span></td>
													<td>:</td>
													<td>
														<input type="checkbox" name="sm_sendi_dislokasi" id="sm_sendi_dislokasi" value="1" class="mr-1">Dislokasi
														<input type="checkbox" name="sm_sendi_infeksi" id="sm_sendi_infeksi" value="1" class="mr-1 ml-2">Infeksi
														<input type="checkbox" name="sm_sendi_nyeri" id="sm_sendi_nyeri" value="1" class="mr-1 ml-2">Nyeri
														<input type="checkbox" name="sm_sendi_oedema" id="sm_sendi_oedema" value="1" class="mr-1 ml-2">Oedema
														<input type="checkbox" name="sm_sendi_lain" id="sm_sendi_lain" value="1" class="mr-1 ml-2">Lain-lain
														<input type="text" name="sm_sendi_lain_input" id="sm_sendi_lain_input" class="custom-form clear-input d-inline-block col-lg-4 disabled" placeholder="Masukkan lain - lain">
													</td>
												</tr>
											</table>
											<hr>
											<table class="table table-no-border table-sm table-striped">
												<tr>
													<td colspan="3" class="bold">Sistem Integumen</td>
												</tr>
												<tr>
													<td width="20%"><span class="ml-4">Warna</span></td>
													<td wdith="1%">:</td>
													<td width="79%">
														<input type="checkbox" name="si_warna_pucat" id="si_warna_pucat" value="1" class="mr-1">Pucat
														<input type="checkbox" name="si_warna_sianosis" id="si_warna_sianosis" value="1" class="mr-1 ml-2">Sianosis
														<input type="checkbox" name="si_warna_normal" id="si_warna_normal" value="1" class="mr-1 ml-2">Normal
														<input type="checkbox" name="si_warna_lain" id="si_warna_lain" value="1" class="mr-1 ml-2">Lain-lain
														<input type="text" name="si_warna_lain_input" id="si_warna_lain_input" class="custom-form clear-input d-inline-block col-lg-3 ml-2 disabled" placeholder="Masukkan lain - lain">

													</td>
												</tr>
												<tr>
													<td><span class="ml-4">Turgor</span></td>
													<td>:</td>
													<td>
														<input type="checkbox" name="si_turgor_baik" id="si_turgor_baik" value="1" class="mr-1">Baik
														<input type="checkbox" name="si_turgor_sedang" id="si_turgor_sedang" value="1" class="mr-1 ml-2">Sedang
														<input type="checkbox" name="si_turgor_buruk" id="si_turgor_buruk" value="1" class="mr-1 ml-2">Buruk
													</td>
												</tr>
												<tr>
													<td><span class="ml-4">Kulit</span></td>
													<td>:</td>
													<td>
														<input type="checkbox" name="si_kulit_normal" id="si_kulit_normal" value="1" class="mr-1">Normal
														<input type="checkbox" name="si_kulit_kemerahan" id="si_kulit_kemerahan" value="1" class="mr-1 ml-2">Kemerahan
														<input type="checkbox" name="si_kulit_lesi" id="si_kulit_lesi" value="1" class="mr-1 ml-2">Lesi
														<input type="checkbox" name="si_kulit_luka" id="si_kulit_luka" value="1" class="mr-1 ml-2">Luka
														<input type="checkbox" name="si_kulit_memar" id="si_kulit_memar" value="1" class="mr-1 ml-2">Memar
														<input type="checkbox" name="si_kulit_petechie" id="si_kulit_petechie" value="1" class="mr-1 ml-2">Petechie
														<input type="checkbox" name="si_kulit_bulae" id="si_kulit_bulae" value="1" class="mr-1 ml-2">Bulae
														<input type="checkbox" name="si_kulit_lain" id="si_kulit_lain" value="1" class="mr-1 ml-2">Lain-lain
														<input type="text" name="si_kulit_lain_input" id="si_kulit_lain_input" class="custom-form clear-input d-inline-block col-lg-3 ml-2 disabled" placeholder="Masukkan lain - lain">
													</td>
												</tr>
											</table>
											<hr>
											<table class="table table-no-border table-sm table-striped">
												<tr>
													<td colspan="3" class="bold">Sistem Indera</td>
												</tr>
												<tr>
													<td width="20%"><span class="ml-4">Penglihatan</span></td>
													<td wdith="1%">:</td>
													<td width="79%">
														<input type="checkbox" name="sin_penglihatan_baik" id="sin_penglihatan_baik" value="1" class="mr-1">Baik
														<input type="checkbox" name="sin_penglihatan_buram" id="sin_penglihatan_buram" value="1" class="mr-1 ml-2">Buram
														<input type="checkbox" name="sin_penglihatan_tidak_bisa_melihat" id="sin_penglihatan_tidak_bisa_melihat" value="1" class="mr-1 ml-2">Tidak Bisa Melihat
														<input type="checkbox" name="sin_penglihatan_pakai_alat_bantu" id="sin_penglihatan_pakai_alat_bantu" value="1" class="mr-1 ml-2">Pakai Alat Bantu
														<input type="checkbox" name="sin_penglihatan_hypema" id="sin_penglihatan_hypema" value="1" class="mr-1 ml-2">Hypema
													</td>
												</tr>
												<tr>
													<td><span class="ml-4">Penciuman</span></td>
													<td>:</td>
													<td>
														<input type="checkbox" name="sin_penciuman_sekresi" id="sin_penciuman_sekresi" value="1" class="mr-1">Sekresi
														<input type="checkbox" name="sin_penciuman_polip" id="sin_penciuman_polip" value="1" class="mr-1 ml-2">Polip
														<input type="checkbox" name="sin_penciuman_gangguan" id="sin_penciuman_gangguan" value="1" class="mr-1 ml-2">Gangguan Fungsi Penciuman
													</td>
												</tr>
												<tr>
													<td><span class="ml-4">Pendengaran</span></td>
													<td>:</td>
													<td>
														<input type="checkbox" name="sin_pendengaran_kurang_jelas" id="sin_pendengaran_kurang_jelas" value="1" class="mr-1">Kurang Jelas
														<input type="checkbox" name="sin_pendengaran_baik" id="sin_pendengaran_baik" value="1" class="mr-1 ml-2">Baik
														<input type="checkbox" name="sin_pendengaran_tidak_bisa_dengar" id="sin_pendengaran_tidak_bisa_dengar" value="1" class="mr-1 ml-2">Tidak Bisa Mendengar
														<input type="checkbox" name="sin_pendengaran_pakai_alat_bantu" id="sin_pendengaran_pakai_alat_bantu" value="1" class="mr-1 ml-2">Pakai Alat Bantu
														<input type="checkbox" name="sin_pendengaran_nyeri_telinga" id="sin_pendengaran_nyeri_telinga" value="1" class="mr-1 ml-2">Nyeri Telinga
													</td>
												</tr>
												<tr>
													<td><span class="ml-4">Pengecap</span></td>
													<td>:</td>
													<td>
														<input type="checkbox" name="sin_pengecap_tidak_ada_kelainan" id="sin_pengecap_tidak_ada_kelainan" value="1" class="mr-1">Tidak Ada Kelainan
														<input type="checkbox" name="sin_pengecap_gangguan_fungsi" id="sin_pengecap_gangguan_fungsi" value="1" class="mr-1 ml-2">Gangguan Fungsi
														<input type="checkbox" name="sin_pengecap_lain" id="sin_pengecap_lain" value="1" class="mr-1 ml-2">Lain-lain
														<input type="text" name="sin_pengecap_lain_input" id="sin_pengecap_lain_input" class="custom-form clear-input d-inline-block col-lg-3 ml-2 disabled" placeholder="Masukkan lain - lain">
													</td>
												</tr>
											</table>
											<hr>
											<table class="table table-no-border table-sm table-striped">
												<tr>
													<td colspan="3" class="bold">Sistem Persyaratan</td>
												</tr>
												<tr>
													<td width="20%"><span class="ml-4"></span></td>
													<td wdith="1%">:</td>
													<td width="79%">
														<input type="checkbox" name="sp_kesemutan" id="sp_kesemutan" value="1" class="mr-1">Kesemutan
														<input type="checkbox" name="sp_kelumpuhan" id="sp_kelumpuhan" value="1" class="mr-1 ml-2">Kelumpuhan
														<input type="text" name="sp_kelumpuhan_lokasi" id="sp_kelumpuhan_lokasi" class="custom-form clear-input d-inline-block col-lg-3 ml-2 disabled" placeholder="Masukkan lokasi kelumpuhan">
														<input type="checkbox" name="sp_kejang" id="sp_kejang" value="1" class="mr-1 ml-2">Kejang
													</td>
												</tr>
												<tr>
													<td></td>
													<td></td>
													<td>
														<input type="checkbox" name="sp_pusing" id="sp_pusing" value="1" class="mr-1">Pusing
														<input type="checkbox" name="sp_muntah" id="sp_muntah" value="1" class="mr-1 ml-2">Muntah Proyektil
														<input type="checkbox" name="sp_kaku_kuduk" id="sp_kaku_kuduk" value="1" class="mr-1 ml-2">Kaku Kuduk
														<input type="checkbox" name="sp_hemiparese" id="sp_hemiparese" value="1" class="mr-1 ml-2">Hemiparese
														<input type="checkbox" name="sp_alasia" id="sp_alasia" value="1" class="mr-1 ml-2">Alasia
														<input type="checkbox" name="sp_tremor" id="sp_tremor" value="1" class="mr-1 ml-2">Tremor
														<input type="checkbox" name="sp_lain" id="sp_lain" value="1" class="mr-1 ml-2">Lain-lain
														<input type="text" name="sp_lain_input" id="sp_lain_input" class="custom-form clear-input d-inline-block col-lg-3 ml-2 disabled" placeholder="Masukkan lain - lain">
													</td>
												</tr>
											</table>
											<hr>
											<table class="table table-no-border table-sm table-striped">
												<tr>
													<td colspan="3" class="bold">Sistem Reproduksi</td>
												</tr>
												<tr>
													<td width="20%"><span class="ml-4">Alat Genital</span></td>
													<td wdith="1%">:</td>
													<td width="79%">
														<input type="radio" name="sr_alat" id="sr_alat_oedema" value="Oedema" class="mr-1">Oedema
														<input type="radio" name="sr_alat" id="sr_alat_varices" value="Varices" class="mr-1 ml-2">Varices
														<input type="radio" name="sr_alat" id="sr_alat_hygiene" value="Hygiene" class="mr-1 ml-2">Hygiene(Bersih/Kotor)*
													</td>
												</tr>
												<tr>
													<td><span class="ml-4"></span></td>
													<td></td>
													<td>
														<input type="radio" name="sr_alat" id="sr_genital_hemoroid" value="Hemoroid" class="mr-1">Hemoroid
														<input type="radio" name="sr_alat" id="sr_genital_hipospadia" value="Hipospadia" class="mr-1 ml-2">Hipospadia
														<input type="radio" name="sr_alat" id="sr_genital_masalah_prostat" value="Masalah Prostat" class="mr-1 ml-2">Masalah Prostat
														<input type="radio" name="sr_alat" id="sr_genital_simetris" value="Simetris" class="mr-1 ml-2">Simetris
														<input type="radio" name="sr_alat" id="sr_genital_asimetris" value="Asimetris" class="mr-1 ml-2">Asimetris
														<input type="radio" name="sr_alat" id="sr_genital_inflamasi" value="Inflamasi" class="mr-1 ml-2">Inflamasi
														<input type="radio" name="sr_alat" id="sr_genital_nyeri" value="Nyeri" class="mr-1 ml-2">Nyeri
													</td>
												</tr>
												<tr>
													<td><span class="ml-4"></span>Payudara</td>
													<td>:</td>
													<td>
														<input type="radio" name="sr_payudara" id="sr_payudara_massa" value="Massa" class="mr-1">Massa
														<input type="radio" name="sr_payudara" id="sr_payudara_lesi" value="Lesi" class="mr-1 ml-2">Lesi/Lecet
														<input type="radio" name="sr_payudara" id="sr_payudara_lain" value="Lain" class="mr-1 ml-2">Lain-lain
														<input type="text" name="sr_payudara_lain_input" id="sr_payudara_lain_input" class="custom-form clear-input d-inline-block col-lg-4 disabled" placeholder="Masukkan lain - lain">
													</td>
												</tr>
											</table>

										</div>
										
										<!-- Row Data Psikososial, Ekonomi, Dan Spriritual -->
										<table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
											<tr>
												<td colspan="3" class="center bold td-dark">
													<button class="btn btn-info btn-xs mr-1 float-left" type="button" data-toggle="collapse" data-target="#data-psikososial-ekonomi-spiritual"><i class="fas fa-expand mr-1"></i>Expand</button>PSIKOSOSIAL, EKONOMI DAN SPIRITUAL
												</td>
											</tr>
										</table>
										<div class="collapse multi-collapse mt-2" id="data-psikososial-ekonomi-spiritual">
											<table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
												<tr>
													<td width="20%" class="bold">Status Psikologis</td>
													<td wdith="1%" class="bold">:</td>
													<td width="79%">
														<input type="checkbox" name="sps_cemas" id="sps_cemas" value="1" class="mr-1">Cemas
														<input type="checkbox" name="sps_takut" id="sps_takut" value="1" class="mr-1 ml-2">Takut
														<input type="checkbox" name="sps_marah" id="sps_marah" value="1" class="mr-1 ml-2">Marah
														<input type="checkbox" name="sps_sedih" id="sps_sedih" value="1" class="mr-1 ml-2">Sedih
														<input type="checkbox" name="sps_bunuh_diri" id="sps_bunuh_diri" value="1" class="mr-1 ml-2">Kecendrungan Bunuh Diri
														<input type="checkbox" name="sps_lain" id="sps_lain" value="1" class="mr-1 ml-2">Lain-lain
														<input type="text" name="sps_lain_input" id="sps_lain_input" class="custom-form clear-input d-inline-block col-lg-4 disabled" placeholder="Masukkan lain - lain">
													</td>
												</tr>
												<tr>
													<td class="bold">Status Mental</td>
													<td class="bold">:</td>
													<td>
														<input type="checkbox" name="smen_sadar" id="smen_sadar" value="1" class="mr-1">Sadar dan Orientasi Baik
													</td>
												</tr>
												<tr>
													<td class="bold"></td>
													<td class="bold"></td>
													<td>
														<input type="checkbox" name="smen_ada_masalah" id="smen_ada_masalah" value="1" class="mr-1">Ada Masalah Perilaku, Sebutkan
														<input type="text" name="smen_ada_masalah_input" id="smen_ada_masalah_input" class="custom-form clear-input d-inline-block col-lg-4 disabled" placeholder="Sebutkan">
													</td>
												</tr>
												<tr>
													<td class="bold"></td>
													<td class="bold"></td>
													<td>
														<input type="checkbox" name="smen_perilaku_kekerasan" id="smen_perilaku_kekerasan" value="1" class="mr-1">Perilaku Kekerasan yang dialami pasien sebelumnya
													</td>
												</tr>
											</table>
											<hr>
											<table class="table table-no-border table-sm table-striped">
												<tr>
													<td colspan="3" class="bold">Kebutuhan Sosial</td>
												</tr>
												<tr>
													<td width="20%"><span class="ml-4">Status Pernikahan</span></td>
													<td wdith="1%">:</td>
													<td width="79%">
														<input type="radio" name="status_pernikahan" id="sper_menikah" value="1" class="mr-1">Menikah
														<input type="radio" name="status_pernikahan" id="sper_belum_menikah" value="1" class="mr-1 ml-2">Belum Menikah
														<input type="radio" name="status_pernikahan" id="sper_duda" value="1" class="mr-1 ml-2">Duda
														<input type="radio" name="status_pernikahan" id="sper_janda" value="1" class="mr-1 ml-2">Janda
														<input type="radio" name="status_pernikahan" id="sper_cerai_mati" value="1" class="mr-1 ml-2">Cerai Mati
													</td>
												</tr>
												<tr>
													<td><span class="ml-4">Keluarga</span></td>
													<td>:</td>
													<td>
														<input type="radio" name="kel_tinggal" id="kel_tinggal_serumah" value="Serumah" class="mr-1" checked>Tinggal Serumah
														<input type="radio" name="kel_tinggal" id="kel_tinggal_sendiri" value="Sendiri" class="mr-1 ml-2">Tinggal Sendiri
														<input type="radio" name="kel_tinggal" id="kel_tinggal_lain" value="Lain" class="mr-1 ml-2">Lain-lain
														<input type="text" name="kel_tinggal_lain_input" id="kel_tinggal_lain_input" class="custom-form clear-input d-inline-block col-lg-4 disabled" placeholder="Masukkan lain - lain">
													</td>
												</tr>
												<tr><td colspan="3"></td></tr>
												<tr>
													<td><span class="ml-4">Hubungan Pasien dengan Keluarga</span></td>
													<td>:</td>
													<td>
														<input type="radio" name="hubungan_dengan_keluarga" id="hubungan_dengan_keluarga_baik" value="1" class="mr-1" checked>Baik
														<input type="radio" name="hubungan_dengan_keluarga" id="hubungan_dengan_keluarga_tidak_baik" value="0" class="mr-1 ml-2">Tidak Baik
													</td>
												</tr>
												<tr>
													<td><span class="ml-4">Tempat Tingal</span></td>
													<td>:</td>
													<td>
														<input type="radio" name="tempat_tinggal" id="tempat_tinggal_rumah" value="Rumah" class="mr-1" checked>Rumah
														<input type="radio" name="tempat_tinggal" id="tempat_tinggal_apart" value="Apartemen" class="mr-1 ml-2">Apartemen
														<input type="radio" name="tempat_tinggal" id="tempat_tinggal_panti" value="Panti" class="mr-1 ml-2">Panti
														<input type="radio" name="tempat_tinggal" id="tempat_tinggal_lain" value="Lain" class="mr-1 ml-2">Lainnya
														<input type="text" name="tempat_tinggal_lain_input" id="tempat_tinggal_lain_input" class="custom-form clear-input d-inline-block col-lg-4 disabled" placeholder="Masukkan tempat tinggal lain">
													</td>
												</tr>
											</table>
											<hr>
											<table class="table table-no-border table-sm table-striped">
												<tr>
													<td colspan="3" class="bold">Status Ekonomi dan Sosial</td>
												</tr>
												<tr>
													<td width="20%"><span class="ml-4">Pekerjaan</span></td>
													<td wdith="1%">:</td>
													<td width="79%"><input type="text" name="pekerjaan" id="pekerjaan_pasien" class="custom-form clear-input col-lg-3" placeholder="Masukkan pekerjaan" readonly></td>
												</tr>
												<tr>
													<td><span class="ml-4">Cara Bayar</span></td>
													<td>:</td>
													<td>
														<input type="text" name="cara_bayar" id="cara_bayar_pasien" class="custom-form clear-input col-lg-3" placeholder="Masukkan cara bayar" readonly>
													</td>
												</tr>
											</table>
											<hr>
											<table class="table table-no-border table-sm table-striped">
												<tr>
													<td colspan="3" class="bold">Status Nilai - Nilai Kepercayaan</td>
												</tr>
												<tr>
													<td width="20%"><span class="ml-4">Keyakinan</span></td>
													<td wdith="1%">:</td>
													<td width="79%">
														<input type="radio" name="snk_keyakinan" id="snk_keyakinan_tidak" value="0" class="mr-1" checked>Tidak Ada
														<input type="radio" name="snk_keyakinan" id="snk_keyakinan_ya" value="1" class="mr-1 ml-2">Ada, Sebutkan
														<input type="text" name="snk_keyakinan_ya_input" id="snk_keyakinan_ya_input" class="custom-form clear-input d-inline-block col-lg-4 disabled" placeholder="Sebutkan">
													</td>
												</tr>
												<tr>
													<td><span class="ml-4">Nilai - Nilai Kepercayaan</span></td>
													<td>:</td>
													<td>
														<input type="radio" name="snk_nilai_kepercayaan" id="snk_nilai_kepercayaan_tidak" value="0" class="mr-1" checked>Tidak Ada
														<input type="radio" name="snk_nilai_kepercayaan" id="snk_nilai_kepercayaan_ya" value="1" class="mr-1 ml-2">Ada, Sebutkan
														<input type="text" name="snk_nilai_kepercayaan_ya_input" id="snk_nilai_kepercayaan_ya_input" class="custom-form clear-input d-inline-block col-lg-4 disabled" placeholder="Sebutkan">
													</td>
												</tr>
												<tr>
													<td><span class="ml-4">Kegiatan Keagamaan</span></td>
													<td>:</td>
													<td>
														<input type="text" name="snk_kebiasaan_keagamaan" id="snk_kebiasaan_keagamaan" class="custom-form clear-input d-inline-block col-lg-6" placeholder="Masukkan kegiatan keagamaan yang biasa dilakukan">
													</td>
												</tr>
											</table>
											<hr>
											<table class="table table-no-border table-sm table-striped">
												<tr>
													<td colspan="3" class="bold">Pengkajian Spiritual</td>
												</tr>
												<tr>
													<td width="20%"><span class="ml-4">Wajib Ibadah</span></td>
													<td wdith="1%">:</td>
													<td width="79%">
														<input type="radio" name="wajib_ibadah" id="wajib_ibadah_baligh" value="Baligh" class="mr-1">Baligh
														<input type="radio" name="wajib_ibadah" id="wajib_ibadah_belum" value="Belum Baligh" class="mr-1 ml-2">Belum Baligh
														<input type="radio" name="wajib_ibadah" id="wajib_ibadah_halangan" value="Halangan" class="mr-1 ml-2">Halangan Lain
														<input type="text" name="wajib_ibadah_halangan_input" id="wajib_ibadah_halangan_input" class="custom-form clear-input d-inline-block col-lg-4" placeholder="Masukkan halangan lain">
													</td>
												</tr>
												<tr>
													<td><span class="ml-4">Thaharoh</span></td>
													<td>:</td>
													<td>
														<input type="radio" name="thaharoh" id="thaharoh_berwudhu" value="Berwudhu" class="mr-1">Berwudhu
														<input type="radio" name="thaharoh" id="thaharoh_tayamum" value="Tayamum" class="mr-1 ml-2">Tayamum
													</td>
												</tr>
												<tr>
													<td><span class="ml-4">Sholat</span></td>
													<td>:</td>
													<td>
														<input type="radio" name="sholat" id="sholat_berdiri" value="Berdiri" class="mr-1">Berdiri
														<input type="radio" name="sholat" id="sholat_duduk" value="Duduk" class="mr-1 ml-2">Duduk
														<input type="radio" name="sholat" id="sholat_berbaring" value="Berbaring" class="mr-1 ml-2">Berbaring
													</td>
												</tr>
											</table>
										</div>

										<!-- Row Data Budaya -->
										<table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
											<tr>
												<td colspan="3" class="center bold td-dark">
													<button class="btn btn-info btn-xs mr-1 float-left" type="button" data-toggle="collapse" data-target="#data-budaya"><i class="fas fa-expand mr-1"></i>Expand</button>BUDAYA
												</td>
											</tr>
										</table>
										<div class="collapse multi-collapse mt-2" id="data-budaya">
											<table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
												<tr>
													<td colspan="3" class="bold">Nilai Budaya Yang dimiliki Terkait Dengan Penyebab Penyakit/Masalah Kesehatan adalah :</td>
												</tr>
												<tr>
													<td colspan="3">
														<input type="radio" name="nilai_budaya" id="nb_hukuman" value="Hukuman" class="mr-1">Hukuman
														<input type="radio" name="nilai_budaya" id="nb_ujian" value="Ujian" class="mr-1 ml-2">Ujian
														<input type="radio" name="nilai_budaya" id="nb_kesalahan" value="Kesalahan" class="mr-1 ml-2">Kesalahan
														<input type="radio" name="nilai_budaya" id="nb_takdir" value="Takdir" class="mr-1 ml-2">Takdir
														<input type="radio" name="nilai_budaya" id="nb_buatan_orang" value="Buatan Orang Lain" class="mr-1 ml-2">Buatan Orang Lain
														<input type="radio" name="nilai_budaya" id="nb_lain" value="Lain" class="mr-1 ml-2">Lain-lain
														<input type="text" name="nb_lain_input" id="nb_lain_input" class="custom-form clear-input d-inline-block col-lg-4 disabled" placeholder="Masukkan lain - lain">
													</td>
												</tr>
												<tr>
													<td colspan="3" class="bold">Kebiasaan Pasien Saat Sakit (Pola Aktivitas dan Istirahat) : 
													<input type="text" name="budaya_pola_aktivitas" id="nb_pola_aktivitas" class="custom-form clear-input d-inline-block col-lg-5" placeholder="Masukkan Pola Aktivitas dan Istirahat"></td>
												</tr>
												<tr>
													<td width="20%" class="bold">Pola Komunikasi</td>
													<td wdith="1%" class="bold">:</td>
													<td width="79%">
														<input type="radio" name="pola_komunikasi" id="pk_normal" value="Normal" class="mr-1" checked>Normal
														<input type="radio" name="pola_komunikasi" id="pk_introvert" value="Introvert" class="mr-1 ml-2">Introvert
														<input type="radio" name="pola_komunikasi" id="pk_extrovert" value="Extrovert" class="mr-1 ml-2">Extrovert
														<input type="radio" name="pola_komunikasi" id="pk_lain" value="Lain" class="mr-1 ml-2">Lain-lain
														<input type="text" name="pk_lain_input" id="pk_lain_input" class="custom-form clear-input d-inline-block col-lg-4 disabled" placeholder="Masukkan lain - lain">
													</td>
												</tr>
												<tr>
													<td class="bold">Pola Makan</td>
													<td class="bold">:</td>
													<td>
														<input type="radio" name="pola_makan" id="pm_sehat" value="Sehat" class="mr-1" checked>Sehat
														<input type="radio" name="pola_makan" id="pm_tidak_sehat" value="Tidak Sehat" class="mr-1 ml-2">Tidak Sehat
														<span class="ml-5 bold">Makanan Pokok : </span>
														<input type="radio" name="makanan_pokok" id="mp_nasi" value="Nasi" class="mr-1 ml-2" checked>Nasi
														<input type="radio" name="makanan_pokok" id="mp_selain" value="Selain Nasi" class="mr-1 ml-2">Selain Nasi
														<input type="text" name="mp_selain_nasi_input" id="mp_selain_nasi_input" class="custom-form clear-input d-inline-block col-lg-4 disabled" placeholder="Masukkan makanan pokok selain nasi">
													</td>
												</tr>
												<tr>
													<td class="bold">Pantang Makanan</td>
													<td class="bold">:</td>
													<td>
														<input type="radio" name="pantang_makanan" id="pantang_makanan_tidak" value="0" class="mr-1" checked>Tidak
														<input type="radio" name="pantang_makanan" id="pantang_makanan_ya" value="1" class="mr-1 ml-2">Ya, Sebutkan
														<input type="text" name="pantang_makanan_ya_input" id="pantang_makanan_ya_input" class="custom-form clear-input d-inline-block col-lg-4 disabled" placeholder="Sebutkan">
													</td>
												</tr>
												<tr>
													<td class="bold">Konsumsi Makanan dari Luar</td>
													<td class="bold">:</td>
													<td>
														<input type="radio" name="konsumsi_makanan_luar" id="konsumsi_makanan_luar_tidak" value="0" class="mr-1" checked>Tidak
														<input type="radio" name="konsumsi_makanan_luar" id="konsumsi_makanan_luar_ya" value="1" class="mr-1 ml-2">Ya, Sebutkan
														<input type="text" name="konsumsi_makanan_luar_ya_input" id="konsumsi_makanan_luar_ya_input" class="custom-form clear-input d-inline-block col-lg-4 disabled" placeholder="Sebutkan">
													</td>
												</tr>
												<tr>
													<td colspan="3" class="bold">Mempunyai pengaruh kepercayaan yang di anut terhadap penyakit :</td>
												</tr>
												<tr>
													<td colspan="3">
														<input type="radio" name="kepercayaan_penyakit" id="kepercayaan_penyakit_tidak" value="0" class="mr-1" checked>Tidak
														<input type="radio" name="kepercayaan_penyakit" id="kepercayaan_penyakit_ya" value="1" class="mr-1 ml-2">Ya 
														<input type="text" name="kepercayaan_penyakit_ya_input" id="kepercayaan_penyakit_ya_input" class="custom-form clear-input d-inline-block col-lg-4 disabled" placeholder="Sebutkan">
													</td>
												</tr>
											</table>
										</div>

										<!-- Row Data Identifikasi Kebutuhan Komunikasi, Edukasi -->
										<table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
											<tr>
												<td colspan="3" class="center bold td-dark">
													<button class="btn btn-info btn-xs mr-1 float-left" type="button" data-toggle="collapse" data-target="#data-kebutuhan-komunikasi-edukasi"><i class="fas fa-expand mr-1"></i>Expand</button>IDENTIFIKASI KEBUTUHAN KOMUNIKASI, BELAJAR/EDUKASI
												</td>
											</tr>
										</table>
										<div class="collapse multi-collapse mt-2" id="data-kebutuhan-komunikasi-edukasi">
											<table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
												<tr>
													<td width="15%" class="bold">Kewarganegaraan</td>
													<td wdith="1%" class="bold">:</td>
													<td width="39%">
														<input type="radio" name="kewarganegaraan" id="kewarganegaraan_wni" value="WNI" class="mr-1" checked>WNI
														<input type="radio" name="kewarganegaraan" id="kewarganegaraan_wna" value="WNA" class="mr-1 ml-2">WNA
													</td>
													<td></td>
													<td width="30%">Pemahaman tetang penyakit dan perawatan</td>
													<td width="1%"></td>
													<td width="19%">
														<input type="radio" name="pt_penyakit_perawatan" id="pt_penyakit_perawatan_tidak" value="0" class="mr-1" checked>Tidak
														<input type="radio" name="pt_penyakit_perawatan" id="pt_penyakit_perawatan_ya" value="1" class="mr-1 ml-2">Ya
													</td>
												</tr>
												<tr>
													<td class="bold">Suku Bangsa</td>
													<td class="bold">:</td>
													<td>
														<input type="text" name="suku_bangsa" id="suku_bangsa" class="custom-form clear-input" placeholder="Masukkan suku bangsa">
													</td>
													<td></td>
													<td>Pemahaman tentang pengobatan</td>
													<td></td>
													<td>
														<input type="radio" name="pt_pengobatan" id="pt_pengobatan_tidak" value="0" class="mr-1" checked>Tidak
														<input type="radio" name="pt_pengobatan" id="pt_pengobatan_ya" value="1" class="mr-1 ml-2">Ya
													</td>
												</tr>
												<tr>
													<td class="bold">Bicara</td>
													<td class="bold">:</td>
													<td>
														<input type="radio" name="bicara" id="bicara_normal" value="Normal" class="mr-1" checked>Normal
														<input type="radio" name="bicara" id="bicara_gangguan" value="Gangguan Bicara" class="mr-1 ml-2">Gangguan Bicara, Jelaskan
														<input type="text" name="bicara_input" id="bicara_input" class="custom-form clear-input d-inline-block col-lg-5 disabled" placeholder="Jelaskan">
													</td>
													<td></td>
													<td>Pemahaman tentang nutrisi diet/gizi</td>
													<td></td>
													<td>
														<input type="radio" name="pt_nutrisi_diet" id="pt_nutrisi_diet_tidak" value="0" class="mr-1" checked>Tidak
														<input type="radio" name="pt_nutrisi_diet" id="pt_nutrisi_diet_ya" value="1" class="mr-1 ml-2">Ya
													</td>
												</tr>
												<tr>
													<td class="bold">Perlu Penterjemah</td>
													<td class="bold">:</td>
													<td>
														<input type="radio" name="perlu_penterjemah" id="perlu_penterjemah_tidak" value="0" class="mr-1" checked>Tidak
														<input type="radio" name="perlu_penterjemah" id="perlu_penterjemah_ya" value="1" class="mr-1 ml-2">Ya, Bahasa
														<input type="text" name="perlu_penterjemah_input" id="perlu_penterjemah_input" class="custom-form clear-input d-inline-block col-lg-5 disabled" placeholder="Masukkan Bahasa">
													</td>
													<td></td>
													<td>Pemahaman tentang spiritual</td>
													<td></td>
													<td>
														<input type="radio" name="pt_spiritual" id="pt_spiritual_tidak" value="0" class="mr-1" checked>Tidak
														<input type="radio" name="pt_spiritual" id="pt_spiritual_ya" value="1" class="mr-1 ml-2">Ya
													</td>
												</tr>
												<tr>
													<td class="bold">Bahasa Isyarat</td>
													<td class="bold">:</td>
													<td>
														<input type="radio" name="bahasa_isyarat" id="bahasa_isyarat_tidak" value="0" class="mr-1" checked>Tidak
														<input type="radio" name="bahasa_isyarat" id="bahasa_isyarat_ya" value="1" class="mr-1 ml-2">Ya
													</td>
													<td></td>
													<td>Pemahaman tentang peralatan medis</td>
													<td></td>
													<td>
														<input type="radio" name="pt_peralatan_medis" id="pt_peralatan_medis_tidak" value="0" class="mr-1" checked>Tidak
														<input type="radio" name="pt_peralatan_medis" id="pt_peralatan_medis_ya" value="1" class="mr-1 ml-2">Ya
													</td>
												</tr>
												<tr>
													<td class="bold"></td>
													<td class="bold"></td>
													<td></td>
													<td></td>
													<td>Pemahaman tentang rehab medik</td>
													<td></td>
													<td>
														<input type="radio" name="pt_rehab_medik" id="pt_rehab_medik_tidak" value="0" class="mr-1" checked>Tidak
														<input type="radio" name="pt_rehab_medik" id="pt_rehab_medik_ya" value="1" class="mr-1 ml-2">Ya
													</td>
												</tr>
												<tr>
													<td class="bold"></td>
													<td class="bold"></td>
													<td></td>
													<td></td>
													<td>Pemahaman tentang manajemen nyeri</td>
													<td></td>
													<td>
														<input type="radio" name="pt_manajemen_nyeri" id="pt_manajemen_nyeri_tidak" value="0" class="mr-1" checked>Tidak
														<input type="radio" name="pt_manajemen_nyeri" id="pt_manajemen_nyeri_ya" value="1" class="mr-1 ml-2">Ya
													</td>
												</tr>
											</table>
										</div>

										<!-- Row Data Hambatan Untuk Menerima Edukasi -->
										<table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
											<tr>
												<td colspan="3" class="center bold td-dark">
													<button class="btn btn-info btn-xs mr-1 float-left" type="button" data-toggle="collapse" data-target="#data-hambatan-menerima-edukasi"><i class="fas fa-expand mr-1"></i>Expand</button>HAMBATAN UNTUK MENERIMA EDUKASI
												</td>
											</tr>
										</table>
										<div class="collapse multi-collapse mt-2" id="data-hambatan-menerima-edukasi">
											<table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
												<tr>
													<td width="50%"><input type="checkbox" name="hambatan_edukasi_1" id="hambatan_edukasi_1" value="1" class="mr-1">Tidak Ada</td>
													<td width="50%"><input type="checkbox" name="hambatan_edukasi_6" id="hambatan_edukasi_6" value="1" class="mr-1">Ada Gangguan Pendengaran</td>
												</tr>
												<tr>
													<td><input type="checkbox" name="hambatan_edukasi_2" id="hambatan_edukasi_2" value="1" class="mr-1">Ada Gangguan Emosi</td>
													<td><input type="checkbox" name="hambatan_edukasi_7" id="hambatan_edukasi_7" value="1" class="mr-1">Buta Huruf</td>
												</tr>
												<tr>
													<td><input type="checkbox" name="hambatan_edukasi_3" id="hambatan_edukasi_3" value="1" class="mr-1">Ada Keterbatasan Dalam Hal Budaya/Spiritual/Agama</td>
													<td><input type="checkbox" name="hambatan_edukasi_8" id="hambatan_edukasi_8" value="1" class="mr-1">Ada Gangguan Kognitif</td>
												</tr>
												<tr>
													<td><input type="checkbox" name="hambatan_edukasi_4" id="hambatan_edukasi_4" value="1" class="mr-1">Ada Gangguan Penglihatan</td>
													<td><input type="checkbox" name="hambatan_edukasi_9" id="hambatan_edukasi_9" value="1" class="mr-1">Keterbatasan Motivasi</td>
												</tr>
												<tr>
													<td><input type="checkbox" name="hambatan_edukasi_5" id="hambatan_edukasi_5" value="1" class="mr-1">Ada Gangguan Fisik</td>
													<td><input type="checkbox" name="hambatan_edukasi_10" id="hambatan_edukasi_10" value="1" class="mr-1">Ada Keterbatasan Dalam Berbahasa</td>
												</tr>
											</table>
										</div>

										<!-- Row Data Skrining Nutrisi -->
										<table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
											<tr>
												<td colspan="3" class="center bold td-dark">
													<button class="btn btn-info btn-xs mr-1 float-left" type="button" data-toggle="collapse" data-target="#data-skrining-nutrisi"><i class="fas fa-expand mr-1"></i>Expand</button>SKRINING NUTRISI <i>(Mainutrition Screening Tool Modifikasi)</i>
												</td>
											</tr>
										</table>
										<div class="collapse multi-collapse mt-2" id="data-skrining-nutrisi">
											<table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
												<tr>
													<td class="center bold">Indikator Penilaian Nutrisi</td>
													<td class="center bold">Penilaian</td>
												</tr>
												<tr>
													<td colspan="2" class="bold">Apakah pasien mengalami penurunan berat badan yang tidak direncanakan / tidak disengaja dalam 6 bulan terakhir</td>
												</tr>
												<tr>
													<td width="90%"><input type="radio" name="sn_penurunan_bb" id="sn_tidak" class="mr-1" value="1" onchange="calcscore()" checked>Tidak</td>
													<td>Skor 0</td>
												</tr>
												<tr>
													<td><input type="radio" name="sn_penurunan_bb" id="sn_tidak_yakin" class="mr-1" value="2" onchange="calcscore()">Tidak Yakin</td>
													<td>Skor 2</td>
												</tr>
												<tr>
													<td><input type="radio" name="sn_penurunan_bb" id="sn_ya" class="mr-1" value="3" onchange="calcscore()">Ya, ada penurunan BB sebanyak</td>
													<td></td>
												</tr>
												<tr class="sn_penurunan_bb_area">
													<td style="padding-left: 20px;"><input type="radio" name="sn_penurunan_bb_on" id="sn_pbb_1" class="mr-1" value="1" onchange="calcscore()">1 - 5 Kg</td>
													<td>Skor 1</td>
												</tr>
												<tr class="sn_penurunan_bb_area">
													<td style="padding-left: 20px;"><input type="radio" name="sn_penurunan_bb_on" id="sn_pbb_2" class="mr-1" value="2" onchange="calcscore()">6 - 10 Kg</td>
													<td>Skor 2</td>
												</tr>
												<tr class="sn_penurunan_bb_area">
													<td style="padding-left: 20px;"><input type="radio" name="sn_penurunan_bb_on" id="sn_pbb_3" class="mr-1" value="3" onchange="calcscore()">11 - 15 Kg</td>
													<td>Skor 3</td>
												</tr>
												<tr class="sn_penurunan_bb_area">
													<td style="padding-left: 20px;"><input type="radio" name="sn_penurunan_bb_on" id="sn_pbb_4" class="mr-1" value="4" onchange="calcscore()">> 15 Kg</td>
													<td>Skor 4</td>
												</tr>
												<tr class="sn_penurunan_bb_area">
													<td style="padding-left: 20px;"><input type="radio" name="sn_penurunan_bb_on" id="sn_pbb_5" class="mr-1" value="5" onchange="calcscore()">Tidak tahu berapa Kg penurunannya</td>
													<td>Skor 2</td>
												</tr>
												<tr style="border-bottom: 1px solid black;">
													<td></td><td></td>
												</tr>
												<tr>
													<td colspan="2" class="bold">Apakah asupan makan pasien berkurang karena penurunan nafsu makan (atau karena kesulitan menerima makanan) ?</td>
												</tr>
												<tr>
													<td><input type="radio" name="sn_asupan_makan" id="sn_asupan_makan_tidak" class="mr-1" value="0" onchange="calcscore()" checked>Tidak</td>
													<td>Skor 0</td>
												</tr>
												<tr>
													<td><input type="radio" name="sn_asupan_makan" id="sn_asupan_makan_ya" class="mr-1" value="1" onchange="calcscore()">Ya</td>
													<td>Skor 1</td>
												</tr>
												<tr style="border-top: 1px solid black; border-bottom: 1px solid black;">
													<td><b>Total Skor Skrining MST (Mainutrition Screening Tool)</b></td>
													<td><input type="number" name="sn_total" id="sn-total" class="custom-form" value="0" readonly></td>
												</tr>
												<tr>
													<td colspan="2">Jika skor ≥ 2 : pasien mengalami resiko gizi kurang, (dilaporkan ke dokter jaga ruangan / DPJP untuk konfirmasi ke dietisin)</td>
												</tr>
												<tr>
													<td colspan="2">Jika skor < 2 dengan jenis penyakit tertentu, (dilaporkan ke dokter jaga ruangan / DPJP untuk konfirmasi ke dietisin)</td>
												</tr>
											</table>
										</div>

										<!-- Row Data Penilaian Kemampuan Fungsional -->
										<table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
											<tr>
												<td colspan="3" class="center bold td-dark">
													<button class="btn btn-info btn-xs mr-1 float-left" type="button" data-toggle="collapse" data-target="#data-penilaian-kemampuan-fungsional"><i class="fas fa-expand mr-1"></i>Expand</button>PENILAIAN KEMAMPUAN FUNGSIONAL <i>(Indeks Barthel)</i>
												</td>
											</tr>
										</table>
										<div class="collapse multi-collapse mt-2" id="data-penilaian-kemampuan-fungsional">
											<table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
												<tr>
													<td width="90%" class="bold center">Aktifitas Yang Dinilai</td>
													<td width="10%" class="bold center">Nilai</td>
												</tr>
												<tr>
													<td>
														<span class="bold">Makan</span><br>
														<input type="radio" name="pkf_makan" id="pkf_makan_1" value="0" class="mr-1 calc_pkf">0 : Tidak Mampu<br>
														<input type="radio" name="pkf_makan" id="pkf_makan_2" value="5" class="mr-1 calc_pkf">5 : Dibantu (makan dipotong-potong dahulu)<br>
														<input type="radio" name="pkf_makan" id="pkf_makan_3" value="10" class="mr-1 calc_pkf">10 : Mandiri<br>
													</td>
													<td><input type="number" name="nilai_pkf_makan" id="nilai_pkf_makan" class="custom-form center clear-input sub_total_nilai_pkf sub_total_nilai_pkf_0" min="0" placeholder="Nilai" readonly></td>
												</tr>
												<tr>
													<td>
														<span class="bold">Mandi</span><br>
														<input type="radio" name="pkf_mandi" id="pkf_mandi_1" value="0" class="mr-1 calc_pkf">0 : Dibantu<br>
														<input type="radio" name="pkf_mandi" id="pkf_mandi_2" value="5" class="mr-1 calc_pkf">5 : Mandiri (menggunakan shower)<br>
													</td>
													<td><input type="number" name="nilai_pkf_mandi" id="nilai_pkf_mandi" class="custom-form center clear-input sub_total_nilai_pkf sub_total_nilai_pkf_1" min="0" placeholder="Nilai" readonly></td>
												</tr>
												<tr>
													<td>
														<span class="bold">Personal Hygiene (Cuci Muka, Menyisir Rambut, Bercukur Jenggot, Gosok Gigi)</span><br>
														<input type="radio" name="pkf_personal" id="pkf_personal_1" value="0" class="mr-1 calc_pkf">0 : Dibantu<br>
														<input type="radio" name="pkf_personal" id="pkf_personal_2" value="5" class="mr-1 calc_pkf">5 : Mandiri<br>
													</td>
													<td><input type="number" name="nilai_pkf_personal" id="nilai_pkf_personal" class="custom-form center clear-input sub_total_nilai_pkf sub_total_nilai_pkf_2" min="0" placeholder="Nilai" readonly></td>
												</tr>
												<tr>
													<td>
														<span class="bold">Berpakaian (Termasuk Mengenakan Sepatu)</span><br>
														<input type="radio" name="pkf_berpakaian" id="pkf_berpakaian_1" value="0" class="mr-1 calc_pkf">0 : Dibantu Seluruhnya<br>
														<input type="radio" name="pkf_berpakaian" id="pkf_berpakaian_2" value="5" class="mr-1 calc_pkf">5 : Dibantu Sebagian<br>
														<input type="radio" name="pkf_berpakaian" id="pkf_berpakaian_3" value="10" class="mr-1 calc_pkf">10 : Mandiri (Termasuk Mengancing Baju, Memakai Tali Sepatu dan Resleting)<br>
													</td>
													<td><input type="number" name="nilai_pkf_berpakaian" id="nilai_pkf_berpakaian" class="custom-form center clear-input sub_total_nilai_pkf sub_total_nilai_pkf_3" min="0" placeholder="Nilai" readonly></td>
												</tr>
												<tr>
													<td>
														<span class="bold">Buang Air Besar (BAB)</span><br>
														<input type="radio" name="pkf_bab" id="pkf_bab_1" value="0" class="mr-1 calc_pkf">0 : Tidak Dapat Mengontrol (perlu diberikan enema)<br>
														<input type="radio" name="pkf_bab" id="pkf_bab_2" value="5" class="mr-1 calc_pkf">5 : Kadang Mengalami Kecelakaan<br>
														<input type="radio" name="pkf_bab" id="pkf_bab_3" value="10" class="mr-1 calc_pkf">10 : Mampu Mengontrol BAB<br>
													</td>
													<td><input type="number" name="nilai_pkf_bab" id="nilai_pkf_bab" class="custom-form center clear-input sub_total_nilai_pkf sub_total_nilai_pkf_4" min="0" placeholder="Nilai" readonly></td>
												</tr>
												<tr>
													<td>
														<span class="bold">Buar Air Kecil (BAK)</span><br>
														<input type="radio" name="pkf_bak" id="pkf_bak_1" value="0" class="mr-1 calc_pkf">0 : Tidak Dapat Mengontrol BAK dan Menggunakan Kateter<br>
														<input type="radio" name="pkf_bak" id="pkf_bak_2" value="5" class="mr-1 calc_pkf">5 : Kadang Mengalami Kecelakaan<br>
														<input type="radio" name="pkf_bak" id="pkf_bak_3" value="10" class="mr-1 calc_pkf">10 : Mampu Mengontrol BAK<br>
													</td>
													<td><input type="number" name="nilai_pkf_bak" id="nilai_pkf_bak" class="custom-form center clear-input sub_total_nilai_pkf sub_total_nilai_pkf_5" min="0" placeholder="Nilai" readonly></td>
												</tr>
												<tr>
													<td>
														<span class="bold">Berpindah (Dari Tempat Tidur ke Kursi dan Sebaliknya)</span><br>
														<input type="radio" name="pkf_berpindah" id="pkf_berpindah_1" value="0" class="mr-1 calc_pkf">0 : Tidak Ada Keseimbangan Untuk Duduk<br>
														<input type="radio" name="pkf_berpindah" id="pkf_berpindah_2" value="5" class="mr-1 calc_pkf">5 : Dibantu Satu atau Dua Orang dan Bisa Duduk<br>
														<input type="radio" name="pkf_berpindah" id="pkf_berpindah_3" value="10" class="mr-1 calc_pkf">10 : Dibantu (Lisan atau Fisik)<br>
														<input type="radio" name="pkf_berpindah" id="pkf_berpindah_4" value="15" class="mr-1 calc_pkf">15 : Mandiri<br>
													</td>
													<td><input type="number" name="nilai_pkf_berpindah" id="nilai_pkf_berpindah" class="custom-form center clear-input sub_total_nilai_pkf sub_total_nilai_pkf_6" min="0" placeholder="Nilai" readonly></td>
												</tr>
												<tr>
													<td>
														<span class="bold">Toiletting (Masuk Keluar Toilet Sendiri)</span><br>
														<input type="radio" name="pkf_toiletting" id="pkf_toiletting_1" value="0" class="mr-1 calc_pkf">0 : Dibantu Seluruhnya<br>
														<input type="radio" name="pkf_toiletting" id="pkf_toiletting_2" value="5" class="mr-1 calc_pkf">5 : Dibantu Sebagian<br>
														<input type="radio" name="pkf_toiletting" id="pkf_toiletting_3" value="10" class="mr-1 calc_pkf">10 : Mandiri (melepas atau memakai pakaian, menyiram WC, membersihkan organ kelamin)<br>
													</td>
													<td><input type="number" name="nilai_pkf_toiletting" id="nilai_pkf_toiletting" class="custom-form center clear-input sub_total_nilai_pkf sub_total_nilai_pkf_7" min="0" placeholder="Nilai" readonly></td>
												</tr>
												<tr>
													<td>
														<span class="bold">Mobilisasi (Berjalan di Permukaan Datar)</span><br>
														<input type="radio" name="pkf_mobilisasi" id="pkf_mobilisasi_1" value="0" class="mr-1 calc_pkf">0 : Tidak Dapat Berjalan<br>
														<input type="radio" name="pkf_mobilisasi" id="pkf_mobilisasi_2" value="5" class="mr-1 calc_pkf">5 : Menggunakan Kursi Roda<br>
														<input type="radio" name="pkf_mobilisasi" id="pkf_mobilisasi_3" value="10" class="mr-1 calc_pkf">10 : Berjalan dengan Bantuan Satu Orang<br>
														<input type="radio" name="pkf_mobilisasi" id="pkf_mobilisasi_4" value="15" class="mr-1 calc_pkf">15 : Mandiri<br>
													</td>
													<td><input type="number" name="nilai_pkf_mobilisasi" id="nilai_pkf_mobilisasi" class="custom-form center clear-input sub_total_nilai_pkf sub_total_nilai_pkf_8" min="0" placeholder="Nilai" readonly></td>
												</tr>
												<tr>
													<td>
														<span class="bold">Naik dan Turun Tangga</span><br>
														<input type="radio" name="pkf_naikturuntangga" id="pkf_naikturuntangga_1" value="0" class="mr-1 calc_pkf">0 : Tidak Mampu<br>
														<input type="radio" name="pkf_naikturuntangga" id="pkf_naikturuntangga_2" value="5" class="mr-1 calc_pkf">5 : Dibantu Menggunakan Tongkat<br>
														<input type="radio" name="pkf_naikturuntangga" id="pkf_naikturuntangga_3" value="10" class="mr-1 calc_pkf">10 : Mandiri<br>
													</td>
													<td><input type="number" name="nilai_pkf_naikturuntangga" id="nilai_pkf_naikturuntangga" class="custom-form center clear-input sub_total_nilai_pkf sub_total_nilai_pkf_9" min="0" placeholder="Nilai" readonly></td>
												</tr>
												<tr>
													<td colspan="2"></td>
												</tr>
												<tr>
													<td class="bold">JUMLAH SKOR</td>
													<td><input type="number" name="total_nilai_pkf" id="total_nilai_pkf" class="custom-form center clear-input" min="0" value="0" placeholder="Nilai" readonly></td>
												</tr>
												<tr><td colspan="2"></td></tr>
												<tr>
													<td colspan="2">
														<span class="bold">Keterangan :</span><br>
														<span class="ml-4">0 - 20 : Ketergantungan Penuh</span><br>
														<span class="ml-4">21 - 62 : Ketergantungan Berat</span><br>
														<span class="ml-4">62 - 90 : Ketergantungan Sedang</span><br>
														<span class="ml-4">91 - 99 : Ketergantungan Ringan</span><br>
														<span class="ml-4">100 : Mandiri</span>
													</td>
												</tr>
											</table>
										</div>

										<!-- Row Data Penilaian Tingkat Nyeri dan Resiko Jatuh Dewasa -->
										<table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
											<tr>
												<td colspan="3" class="center bold td-dark">
													<button class="btn btn-info btn-xs mr-1 float-left" type="button" data-toggle="collapse" data-target="#data-penilaian-tingkat-nyeri-dan-resiko-jatuh-dewasa"><i class="fas fa-expand mr-1"></i>Expand</button>PENILAIAN TINGKAT NYERI DAN RESIKO JATUH DEWASA</i>
												</td>
											</tr>
										</table>
										<div class="collapse multi-collapse mt-2" id="data-penilaian-tingkat-nyeri-dan-resiko-jatuh-dewasa">
											<div class="row">
												<div class="col-lg-6">
													<table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
														<tr>
															<td colspan="3" class="bold center">Penilaian Tingkat Nyeri</td>
														</tr>
														<tr>
															<td colspan="3"><img src="<?= resource_url() ?>images/attributes/pain-measurement-scale-hd.png" alt="Pain Measurement Scale" class="img-fluid mx-auto d-block rounded shadow"></td>
														</tr>
														<tr><td colspan="3"></td></tr>
														<tr><td colspan="3"></td></tr>
														<tr>
															<td width="20%" class="bold">Keterangan</td>
															<td width="1%" class="bold">:</td>
															<td width="69%">
																<input type="radio" name="ptn_keterangan" id="ptn_keterangan_ringan" value="Ringan" class="mr-1">Ringan : 1 - 3 
																<input type="radio" name="ptn_keterangan" id="ptn_keterangan_sedang" value="Sedang" class="mr-1">Sedang : 4 - 6 
																<input type="radio" name="ptn_keterangan" id="ptn_keterangan_berat" value="Berat" class="mr-1">Berat : 7 - 10
															</td>
														</tr>
														<tr>
															<td class="bold">Nyeri Hilang, Bila</td>
															<td class="bold">:</td>
															<td>
																<input type="checkbox" name="ptn_minum_obat" id="ptn_minum_obat" value="1" class="mr-1">Minum Obat
																<input type="checkbox" name="ptn_mendengarkan_musik" id="ptn_mendengarkan_musik" value="1" class="mr-1 ml-2">Mendengarkan Musik
																<input type="checkbox" name="ptn_istirahat" id="ptn_istirahat" value="1" class="mr-1 ml-2">Istirahat
															</td>
														</tr>
														<tr>
															<td></td>
															<td></td>
															<td>
																<input type="checkbox" name="ptn_berubah_posisi" id="ptn_berubah_posisi" value="1" class="mr-1">Berubah Posisi / Tidur
																<input type="checkbox" name="ptn_lain" id="ptn_lain" value="1" class="mr-1 ml-2">Lain-lain
																<input type="text" name="ptn_lain_input" id="ptn_lain_input" class="custom-form clear-input d-inline-block col-lg-4 ml-2 disabled" placeholder="Masukkan lain - lain">
															</td>
														</tr>
													</table>
												</div>
												<div class="col-lg-6">
													<table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
														<tr>
															<td colspan="3" class="bold center">Penilaian Resiko Jatuh Dewasa</td>
														</tr>
													</table>
													<table class="table table-sm table-striped table-bordered" style="margin-top: -15px">
														<thead>
															<tr>
																<th width="60%" class="center"><b>Parameter</b></th>
																<th width="20%" class="center"><b>Nilai</b></th>
																<th width="20%" class="center"><b>Skor</b></th>
															</tr>
														</thead>
														<tbody>
															<tr>
																<td rowspan="2">Riwayat jatuh dalam waktu 3 bulan sebab apapun</td>
																<td><input type="radio" name="prjd_riwayat_jatuh" id="prjd_riwayat_jatuh_ya" value="25" class="mr-1" onchange="calcscorepjda()">Ya</td>
																<td class="center">25</td>
															</tr>
															<tr>
																<td><input type="radio" name="prjd_riwayat_jatuh" id="prjd_riwayat_jatuh_tidak" value="0" class="mr-1" onchange="calcscorepjda()" checked>Tidak</td>
																<td class="center">0</td>
															</tr>
															<tr>
																<td rowspan="2">Diagnosis Sekunder (≥ Diagnosis Medis)</td>
																<td><input type="radio" name="prjd_diagnosis_sekunder" id="prjd_diagnosis_sekunder_ya" value="15" class="mr-1" onchange="calcscorepjda()">Ya</td>
																<td class="center">15</td>
															</tr>
															<tr>
																<td><input type="radio" name="prjd_diagnosis_sekunder" id="prjd_diagnosis_sekunder_tidak" value="0" class="mr-1" onchange="calcscorepjda()" checked>Tidak</td>
																<td class="center">0</td>
															</tr>
															<tr>
																<td colspan="3">Alat Bantu Jalan</td>
															</tr>
															<tr>
																<td><input type="checkbox" name="alat_bantu_jalan_1" id="alat_bantu_jalan_1" value="1" class="mr-1">Tidak Ada / Kursi Roda</td>
																<td><input type="radio" name="alat_bantu_jalan_1_ya" id="alat_bantu_jalan_1_ya" value="0" class="mr-1 disabled" onchange="calcscorepjda()">Ya</td>
																<td class="center">0</td>
															</tr>
															<tr>
																<td><input type="checkbox" name="alat_bantu_jalan_2" id="alat_bantu_jalan_2" value="1" class="mr-1">Kruk / Tongkat / Walker</td>
																<td><input type="radio" name="alat_bantu_jalan_2_ya" id="alat_bantu_jalan_2_ya" value="15" class="mr-1 disabled" onchange="calcscorepjda()">Ya</td>
																<td class="center">15</td>
															</tr>
															<tr>
																<td><input type="checkbox" name="alat_bantu_jalan_3" id="alat_bantu_jalan_3" value="1" class="mr-1">Berpegangan pada benda-benda disekitar / Furniture</td>
																<td><input type="radio" name="alat_bantu_jalan_3_ya" id="alat_bantu_jalan_3_ya" value="30" class="mr-1 disabled" onchange="calcscorepjda()">Ya</td>
																<td class="center">30</td>
															</tr>
															<tr>
																<td rowspan="2">Terpasang Infus / Heparin Lock</td>
																<td><input type="radio" name="prjd_terpasang_infus" id="prjd_terpasang_infus_ya" value="20" class="mr-1" onchange="calcscorepjda()">Ya</td>
																<td class="center">20</td>
															</tr>
															<tr>
																<td><input type="radio" name="prjd_terpasang_infus" id="prjd_terpasang_infus_tidak" value="0" class="mr-1" onchange="calcscorepjda()" checked>Tidak</td>
																<td class="center">0</td>
															</tr>
															<tr>
																<td colspan="3">Cara Berjalan atau Berpindah</td>
															</tr>
															<tr>
																<td><input type="checkbox" name="cara_berjalan_1" id="cara_berjalan_1" value="1" class="mr-1">Normal / Bedrest / Imobilisasi</td>
																<td><input type="radio" name="cara_berjalan_1_ya" id="cara_berjalan_1_ya" value="0" class="mr-1 disabled" onchange="calcscorepjda()">Ya</td>
																<td class="center">0</td>
															</tr>
															<tr>
																<td><input type="checkbox" name="cara_berjalan_2" id="cara_berjalan_2" value="1" class="mr-1">Lemah</td>
																<td><input type="radio" name="cara_berjalan_2_ya" id="cara_berjalan_2_ya" value="10" class="mr-1 disabled" onchange="calcscorepjda()">Ya</td>
																<td class="center">10</td>
															</tr>
															<tr>
																<td><input type="checkbox" name="cara_berjalan_3" id="cara_berjalan_3" value="1" class="mr-1">Terganggu</td>
																<td><input type="radio" name="cara_berjalan_3_ya" id="cara_berjalan_3_ya" value="20" class="mr-1 disabled" onchange="calcscorepjda()">Ya</td>
																<td class="center">20</td>
															</tr>
															<tr>
																<td colspan="3">Status Mental</td>
															</tr>
															<tr>
																<td><input type="checkbox" name="status_mental_1" id="status_mental_1" value="1" class="mr-1">Sadar Akan Kemampuan Diri Sendiri</td>
																<td><input type="radio" name="status_mental_1_ya" id="status_mental_1_ya" value="0" class="mr-1 disabled" onchange="calcscorepjda()">Ya</td>
																<td class="center">0</td>
															</tr>
															<tr>
																<td><input type="checkbox" name="status_mental_2" id="status_mental_2" value="1" class="mr-1">Sering Lupa akan Keterbatasan Yang dimiliki</td>
																<td><input type="radio" name="status_mental_2_ya" id="status_mental_2_ya" value="15" class="mr-1 disabled" onchange="calcscorepjda()">Ya</td>
																<td class="center">15</td>
															</tr>
															<tr>
																<td colspan="2" class="bold">JUMLAH SKOR</td>
																<td class="center"><input type="number" min="0" name="prjd_jumlah_skor" id="prjd_jumlah_skor" class="custom-form clear-input center" placeholder="Jumlah" value="0" readonly></td>
															</tr>
														</tbody>
													</table>
													<table class="table table-no-border table-sm table-striped" style="margin-top:15px">
														<tr>
															<td>
																<span class="bold">Keterangan</span><br>
																<span class="ml-3">Tidak Beresiko : 0 - 24</span><br>
																<span class="ml-3">Resiko Rendah : 25 - 50</span><br>
																<span class="ml-3">Resiko Tinggi : ≥ 51</span>
															</td>
														</tr>
													</table>
												</div>
											</div>
										</div>

										<!-- Row Data Penilaian Resiko Jatuh Lansia (Usia > 60 th) -->
										<table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
											<tr>
												<td colspan="3" class="center bold td-dark">
													<button class="btn btn-info btn-xs mr-1 float-left" type="button" data-toggle="collapse" data-target="#data-penilaian-resiko-jatuh-lansia"><i class="fas fa-expand mr-1"></i>Expand</button>PENILAIAN RESIKO JATUH LANSIA <i>(Usia > 60 th)</i>
												</td>
											</tr>
										</table>
										<div class="collapse multi-collapse mt-2" id="data-penilaian-resiko-jatuh-lansia">
											<table class="table table-sm table-striped table-bordered" style="margin-top: -15px">
												<thead>
													<tr>
														<th class="center" width="5%"><b>No.</b></th>
														<th class="center" width="20%"><b>Parameter</b></th>
														<th class="center" width="45%"><b>Skrining</b></th>
														<th class="center" width="15"><b>Jawaban (Pilih)</b></th>
														<th class="center" width="15%"><b>Keterangan Nilai</b></th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<th rowspan="2" class="center v-center">1.</th>
														<td rowspan="2">Riwayat Jatuh</td>
														<td>Apakah pasien datang ke RS karena jatuh ?</td>
														<td class="center">
															<input type="radio" name="prjl_riwayat_jatuh" id="prjl_riwayat_jatuh_ya" value="6" class="mr-1" onchange="calcscoreprjl()">Ya
															<input type="radio" name="prjl_riwayat_jatuh" id="prjl_riwayat_jatuh_tidak" value="0" class="mr-1 ml-3" checked onchange="calcscoreprjl()">Tidak
														</td>
														<td rowspan="2">Salah satu jawabannya = 6</td>
													</tr>
													<tr>
														<td>Jika Tidak, Apakah pasien mengalami jatuh dalam 2 bulan terakhir ini ?</td>
														<!-- <td class="center">
															<input type="radio" name="prjl_riwayat_jatuh_opt" id="prjl_riwayat_jatuh_opt_ya" value="6" class="mr-1" disabled onchange="calcscoreprjl()">Ya
															<input type="radio" name="prjl_riwayat_jatuh_opt" id="prjl_riwayat_jatuh_opt_tidak" value="0" class="mr-1 ml-3" disabled checked onchange="calcscoreprjl()">Tidak
														</td> -->
														<td class="center">
															<input type="radio" name="prjl_riwayat_jatuh_opt" id="prjl_riwayat_jatuh_opt_ya" value="6" class="mr-1" onchange="calcscoreprjl()">Ya
															<input type="radio" name="prjl_riwayat_jatuh_opt" id="prjl_riwayat_jatuh_opt_tidak" value="0" class="mr-1 ml-3" checked onchange="calcscoreprjl()">Tidak
														</td>
													</tr>
													<tr>
														<th rowspan="3" class="center v-center">2.</th>
														<td rowspan="3">Status Mental</td>
														<td>Apakah pasien delirium ? (Tidak dapat membuat keputusan, pola pikir tidak terorganisir, gangguan daya ingat)</td>
														<td class="center">
															<input type="radio" name="prjl_status_mental" id="prjl_status_mental_ya" value="14" class="mr-1" onchange="calcscoreprjl()">Ya
															<input type="radio" name="prjl_status_mental" id="prjl_status_mental_tidak" value="0" class="mr-1 ml-3" checked onchange="calcscoreprjl()">Tidak
														</td>
														<td rowspan="3">Salah satu jawabannya = 14</td>
													</tr>
													<tr>
														<td>Apakah pasien disorientasi ? (Salah menyebutkan waktu, tempat atau orang)</td>
														<td class="center">
															<input type="radio" name="prjl_status_mental_opt_1" id="prjl_status_mental_opt_1_ya" value="14" class="mr-1" onchange="calcscoreprjl()">Ya
															<input type="radio" name="prjl_status_mental_opt_1" id="prjl_status_mental_opt_1_tidak" value="0" class="mr-1 ml-3" checked onchange="calcscoreprjl()">Tidak
														</td>
													</tr>
													<tr>
														<td>Apakah pasien mengalami agitasi ? (Ketakutan, gelisah dan cemas)</td>
														<td class="center">
															<input type="radio" name="prjl_status_mental_opt_2" id="prjl_status_mental_opt_2_ya" value="14" class="mr-1" onchange="calcscoreprjl()">Ya
															<input type="radio" name="prjl_status_mental_opt_2" id="prjl_status_mental_opt_2_tidak" value="0" class="mr-1 ml-3" checked onchange="calcscoreprjl()">Tidak
														</td>
													</tr>
													<tr>
														<th rowspan="3" class="center v-center">3.</th>
														<td rowspan="3">Penglihatan</td>
														<td>Apakah pasien memakai kacamata ?</td>
														<td class="center">
															<input type="radio" name="prjl_penglihatan" id="prjl_penglihatan_ya" value="1" class="mr-1" onchange="calcscoreprjl()">Ya
															<input type="radio" name="prjl_penglihatan" id="prjl_penglihatan_tidak" value="0" class="mr-1 ml-3" checked onchange="calcscoreprjl()">Tidak
														</td>
														<td rowspan="3">Salah satu jawabannya = 1</td>
													</tr>
													<tr>
														<td>Apakah pasien mengeluh adanya penglihatan buram ?</td>
														<td class="center">
															<input type="radio" name="prjl_penglihatan_opt_1" id="prjl_penglihatan_opt_1_ya" value="1" class="mr-1" onchange="calcscoreprjl()">Ya
															<input type="radio" name="prjl_penglihatan_opt_1" id="prjl_penglihatan_opt_1_tidak" value="0" class="mr-1 ml-3" checked onchange="calcscoreprjl()">Tidak
														</td>
													</tr>
													<tr>
														<td>Apakah pasien mempunyai galukoma ? Katarak / degenarasi makula</td>
														<td class="center">
															<input type="radio" name="prjl_penglihatan_opt_2" id="prjl_penglihatan_opt_2_ya" value="1" class="mr-1" onchange="calcscoreprjl()">Ya
															<input type="radio" name="prjl_penglihatan_opt_2" id="prjl_penglihatan_opt_2_tidak" value="0" class="mr-1 ml-3" checked onchange="calcscoreprjl()">Tidak
														</td>
													</tr>
													<tr>
														<th class="center v-center">4.</th>
														<td>Kebiasaan Berkemih</td>
														<td>Apakah terdapat perubahan perilaku berkemih ? (Frekuensi, urgensi, inkontinensia, nokturia)</td>
														<td class="center">
															<input type="radio" name="prjl_berkemih" id="prjl_berkemih_ya" value="2" class="mr-1" onchange="calcscoreprjl()">Ya
															<input type="radio" name="prjl_berkemih" id="prjl_berkemih_tidak" value="0" class="mr-1 ml-3" checked onchange="calcscoreprjl()">Tidak
														</td>
														<td>Salah satu jawabannya = 2</td>
													</tr>
													<tr>
														<th rowspan="4" class="center v-center">5.</th>
														<td rowspan="4">Transfer dari tempat tidur kekurasi dan kembali lagi ketempat tidur</td>
														<td>Mandiri (Boleh memakai alat bantu jalan)</td>
														<td class="center">
															<input type="radio" name="prjl_transfer" id="prjl_transfer_1" value="0" class="mr-1" checked onchange="calcscoreprjl()">0
														</td>
														<td rowspan="8">Jumlah nilai transfer dan mobilitas jika nilai total 0 - 3 = 0, nilai total 4 - 6 = 7</td>
													</tr>
													<tr>
														<td>Memerlukan sedikit bantuan (1 orang) / dalam pengawasan</td>
														<td class="center">
															<input type="radio" name="prjl_transfer" id="prjl_transfer_2" value="1" class="mr-1" onchange="calcscoreprjl()">1
														</td>
													</tr>
													<tr>
														<td>Memerlukan bantuan yang nyata (2 orang)</td>
														<td class="center">
															<input type="radio" name="prjl_transfer" id="prjl_transfer_3" value="2" class="mr-1" onchange="calcscoreprjl()">2
														</td>
													</tr>
													<tr>
														<td>Tidak dapat duduk dengan seimbang, perlu bantuan total</td>
														<td class="center">
															<input type="radio" name="prjl_transfer" id="prjl_transfer_4" value="3" class="mr-1"  onchange="calcscoreprjl()">3
														</td>
													</tr>

													<tr>
														<th rowspan="4" class="center v-center">6.</th>
														<td rowspan="4">Mobilitas</td>
														<td>Mandiri (Boleh memakai alat bantu jalan)</td>
														<td class="center">
															<input type="radio" name="prjl_mobilitas" id="prjl_mobilitas_1" value="0" class="mr-1" checked onchange="calcscoreprjl()">0
														</td>
													</tr>
													<tr>
														<td>Berjalan dengan bantuan 1 orang (verbal / fisik)</td>
														<td class="center">
															<input type="radio" name="prjl_mobilitas" id="prjl_mobilitas_2" value="1" class="mr-1" onchange="calcscoreprjl()">1
														</td>
													</tr>
													<tr>
														<td>Menggunakan kursi roda</td>
														<td class="center">
															<input type="radio" name="prjl_mobilitas" id="prjl_mobilitas_3" value="2" class="mr-1" onchange="calcscoreprjl()">2
														</td>
													</tr>
													<tr>
														<td>Imobilisasi</td>
														<td class="center">
															<input type="radio" name="prjl_mobilitas" id="prjl_mobilitas_4" value="3" class="mr-1" onchange="calcscoreprjl()">3
														</td>
													</tr>
													<tr>
														<td colspan="3" class="bold center">TOTAL</td>
														<td><input type="number" name="prjl_jumlah" id="prjl_jumlah" class="custom-form clear-input center" placeholder="Jumlah" readonly></td>
														<td></td>
													</tr>
													<tr>
														<td colspan="5">
															<span class="bold">Keterangan : </span><br>
															<span class="ml-3">0 - 5 = Resiko Rendah</span><br>
															<span class="ml-3">6 - 16 = Resiko Sedang</span><br>
															<span class="ml-3">17 - 30 = Resiko Tinggi</span><br>
														</td>
													</tr>
												</tbody>
											</table>
										</div>

										<!-- Row Data Skrining Pasien Akhir Kedidupan -->
										<table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
											<tr>
												<td colspan="3" class="center bold td-dark">
													<button class="btn btn-info btn-xs mr-1 float-left" type="button" data-toggle="collapse" data-target="#data-skrining-pasien-akhir-kehidupan"><i class="fas fa-expand mr-1"></i>Expand</button>SKRINING PASIEN AKHIR KEHIDUPAN
												</td>
											</tr>
										</table>
										<div class="collapse multi-collapse mt-2" id="data-skrining-pasien-akhir-kehidupan">
											<table class="table table-sm table-striped table-bordered" style="margin-top: -15px">
												<thead>
													<tr>
														<th width="5%" class="center"><b>No.</b></th>
														<th width="75%" class="center"><b>Kriteria</b></th>
														<th width="10%" class="center"><b>Ya</b></th>
														<th width="10%" class="center"><b>Tidak</b></th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td class="center">1.</td>
														<td>Usia lebih dari 80 tahun</td>
														<td class="center"><input type="radio" name="spak_1" id="spak_1_ya" value="1"></td>
														<td class="center"><input type="radio" name="spak_1" id="spak_1_tidak" value="0" checked></td>
													</tr>
													<tr>
														<td class="center">2.</td>
														<td>Pasien mengalami gagal nafas</td>
														<td class="center"><input type="radio" name="spak_2" id="spak_2_ya" value="1"></td>
														<td class="center"><input type="radio" name="spak_2" id="spak_2_tidak" value="0" checked></td>
													</tr>
													<tr>
														<td class="center">3.</td>
														<td>Pasien mengalami sepsis</td>
														<td class="center"><input type="radio" name="spak_3" id="spak_3_ya" value="1"></td>
														<td class="center"><input type="radio" name="spak_3" id="spak_3_tidak" value="0" checked></td>
													</tr>
													<tr>
														<td class="center">4.</td>
														<td>Pasien mengalami gagal organ multiple</td>
														<td class="center"><input type="radio" name="spak_4" id="spak_4_ya" value="1"></td>
														<td class="center"><input type="radio" name="spak_4" id="spak_4_tidak" value="0" checked></td>
													</tr>
													<tr>
														<td class="center">5.</td>
														<td>Pasien dengan karsinoma stadium 4</td>
														<td class="center"><input type="radio" name="spak_5" id="spak_5_ya" value="1"></td>
														<td class="center"><input type="radio" name="spak_5" id="spak_5_tidak" value="0" checked></td>
													</tr>
													<tr>
														<td colspan="4">Bila mana pasien memenuhi setidaknya tiga dari kondisi tersebut, maka dilakukan pelayanan pasien akhir kehidupan</td>
													</tr>
												</tbody>
											</table>
										</div>

										<!-- Row Data Populasi Khusus (Isi Sesuai Kebutuhan Pasien) -->
										<table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
											<tr>
												<td colspan="3" class="center bold td-dark">
													<button class="btn btn-info btn-xs mr-1 float-left" type="button" data-toggle="collapse" data-target="#data-populasi-khusus"><i class="fas fa-expand mr-1"></i>Expand</button>POPULASI KHUSUS (ISI SESUAI KEBUTUHAN PASIEN)
												</td>
											</tr>
										</table>
										<div class="collapse multi-collapse mt-2" id="data-populasi-khusus">
											<table class="table table-sm table-striped" style="margin-top: -15px">
												<tr>
													<td width="2%"><b>A.</b></td>
													<td width="55%"><b>Geriatri</b></td>
													<td width="43%"></td>
												</tr>
												<tr>
													<td></td>
													<td>1. Gangguan Penglihatan</td>
													<td>
														<input type="radio" name="pk_geriatri_1" id="pk_geriatri_1_tidak" value="0" checked class="mr-1">Tidak
														<input type="radio" name="pk_geriatri_1" id="pk_geriatri_1_ya" value="1" class="mr-1 ml-4">Ya
														<input type="text" name="pk_geriatri_1_input" id="pk_geriatri_1_input" class="custom-form clear-input d-inline-block col-lg-6 ml-2 disabled" placeholder="">
													</td>
												</tr>
												<tr>
													<td></td>
													<td>2. Gangguan Pendengaran</td>
													<td>
														<input type="radio" name="pk_geriatri_2" id="pk_geriatri_2_tidak" value="0" checked class="mr-1">Tidak
														<input type="radio" name="pk_geriatri_2" id="pk_geriatri_2_ya" value="1" class="mr-1 ml-4">Ya
														<input type="text" name="pk_geriatri_2_input" id="pk_geriatri_2_input" class="custom-form clear-input d-inline-block col-lg-6 ml-2 disabled" placeholder="">
													</td>
												</tr>
												<tr>
													<td></td>
													<td>3. Gangguan Berkemih</td>
													<td>
														<input type="radio" name="pk_geriatri_3" id="pk_geriatri_3_tidak" value="0" checked class="mr-1">Tidak
														<input type="radio" name="pk_geriatri_3" id="pk_geriatri_3_ya" value="1" class="mr-1 ml-4">Ya
														<input type="checkbox" name="pk_geriatri_inkontinensia" id="pk_geriatri_inkontinensia" value="1" class="mr-1 ml-2 disabled">Inkontinensia
														<input type="checkbox" name="pk_geriatri_disuria" id="pk_geriatri_disuria" value="1" class="mr-1 ml-2 disabled">Disuria
														<input type="checkbox" name="pk_geriatri_oliguria" id="pk_geriatri_oliguria" value="1" class="mr-1 ml-2 disabled">Oliguria
														<input type="checkbox" name="pk_geriatri_anuria" id="pk_geriatri_anuria" value="1" class="mr-1 ml-2 disabled">Anuria
													</td>
												</tr>
												<tr>
													<td></td>
													<td>4. Gangguan Daya Ingat</td>
													<td>
														<input type="radio" name="pk_geriatri_4" id="pk_geriatri_4_tidak" value="0" checked class="mr-1">Tidak
														<input type="radio" name="pk_geriatri_4" id="pk_geriatri_4_ya" value="1" class="mr-1 ml-4">Ya
														<input type="text" name="pk_geriatri_4_input" id="pk_geriatri_4_input" class="custom-form clear-input d-inline-block col-lg-6 ml-2 disabled" placeholder="">
													</td>
												</tr>
												<tr>
													<td></td>
													<td>5. Gangguan Bicara</td>
													<td>
														<input type="radio" name="pk_geriatri_5" id="pk_geriatri_5_tidak" value="0" checked class="mr-1">Tidak
														<input type="radio" name="pk_geriatri_5" id="pk_geriatri_5_ya" value="1" class="mr-1 ml-4">Ya
														<input type="text" name="pk_geriatri_5_input" id="pk_geriatri_5_input" class="custom-form clear-input d-inline-block col-lg-6 ml-2 disabled" placeholder="">
													</td>
												</tr>
												<tr>
													<td><b>B.</b></td>
													<td><b>Penyakit Menular</b></td>
													<td></td>
												</tr>
												<tr>
													<td></td>
													<td>1. Pasien mengetahui penyakit saat ini</td>
													<td>
														<input type="radio" name="pk_penyakit_menular_1" id="pk_penyakit_menular_1_ya" value="1" class="mr-1">Tahu
														<input type="radio" name="pk_penyakit_menular_1" id="pk_penyakit_menular_1_tidak" value="0" class="mr-1 ml-4" checked>Tidak
													</td>
												</tr>
												<tr>
													<td></td>
													<td>2. Sumber informasi tentang penyakit diperoleh dari</td>
													<td>
														<input type="checkbox" name="pk_pm_dokter" id="pk_pm_dokter" value="1" class="mr-1">Dokter
														<input type="checkbox" name="pk_pm_perawat" id="pk_pm_perawat" value="1" class="mr-1 ml-2">Perawat
														<input type="checkbox" name="pk_pm_keluarga" id="pk_pm_keluarga" value="1" class="mr-1 ml-2">Keluarga
														<input type="checkbox" name="pk_pm_lain" id="pk_pm_lain" value="1" class="mr-1 ml-2">Lain-lain
														<input type="text" name="pk_pm_lain_input" id="pk_pm_lain_input" class="custom-form clear-input d-inline-block col-lg-4 ml-2 disabled" placeholder="Masukkan lain-lain">
													</td>
												</tr>
												<tr>
													<td></td>
													<td>3. Menerima informasi jangka waktu pengobatan</td>
													<td>
														<input type="radio" name="pk_penyakit_menular_3" id="pk_penyakit_menular_3_ya" value="1" class="mr-1">Ya
														<input type="text" name="pk_penyakit_menular_3_input" id="pk_penyakit_menular_3_input" class="custom-form clear-input d-inline-block col-lg-6 ml-2 disabled" placeholder="Minggu/Bulan/Tahun">
														<input type="radio" name="pk_penyakit_menular_3" id="pk_penyakit_menular_3_tidak" value="0" class="mr-1 ml-4" checked>Tidak
													</td>
												</tr>
												<tr>
													<td></td>
													<td>4. Melakukan pemeriksaan rutin</td>
													<td>
														<input type="radio" name="pk_penyakit_menular_4" id="pk_penyakit_menular_4_tidak" value="0" class="mr-1" checked>Tidak
														<input type="radio" name="pk_penyakit_menular_4" id="pk_penyakit_menular_4_ya" value="1" class="mr-1 ml-4">Ya
														<input type="text" name="pk_penyakit_menular_4_input" id="pk_penyakit_menular_4_input" class="custom-form clear-input d-inline-block col-lg-6 ml-2 disabled" placeholder="">
													</td>
												</tr>
												<tr>
													<td></td>
													<td>5. Cara Penularan</td>
													<td>
														<input type="checkbox" name="pk_pm_airbone" id="pk_pm_airbone" value="1" class="mr-1">Airbone
														<input type="checkbox" name="pk_pm_droplet" id="pk_pm_droplet" value="1" class="mr-1 ml-2">Perawat
														<input type="checkbox" name="pk_pm_kontak_langsung" id="pk_pm_kontak_langsung" value="1" class="mr-1 ml-2">Kontak Langsung
														<input type="checkbox" name="pk_pm_cairan_tubuh" id="pk_pm_cairan_tubuh" value="1" class="mr-1 ml-2">Cairan Tubuh
													</td>
												</tr>
												<tr>
													<td></td>
													<td>6. Penyakit Penyerta</td>
													<td>
														<input type="radio" name="pk_penyakit_menular_6" id="pk_penyakit_menular_6_tidak" value="0" class="mr-1" checked>Tidak
														<input type="radio" name="pk_penyakit_menular_6" id="pk_penyakit_menular_6_ya" value="1" class="mr-1 ml-4">Ya
														<input type="text" name="pk_penyakit_menular_6_input" id="pk_penyakit_menular_6_input" class="custom-form clear-input d-inline-block col-lg-6 ml-2 disabled" placeholder="">
													</td>
												</tr>
												<tr>
													<td><b>C.</b></td>
													<td><b>Penyakit Penurunan Daya Tahan Tubuh</b></td>
													<td></td>
												</tr>
												<tr>
													<td></td>
													<td>1. Pasien mengetahui penyakit saat ini</td>
													<td>
														<input type="radio" name="pk_penyakit_pdtt_1" id="pk_penyakit_pdtt_1_ya" value="1" class="mr-1">Tahu
														<input type="radio" name="pk_penyakit_pdtt_1" id="pk_penyakit_pdtt_1_tidak" value="0" class="mr-1 ml-4" checked>Tidak
													</td>
												</tr>
												<tr>
													<td></td>
													<td>2. Sumber informasi tentang penyakit diperoleh dari</td>
													<td>
														<input type="checkbox" name="pk_pdtt_dokter" id="pk_pdtt_dokter" value="1" class="mr-1">Dokter
														<input type="checkbox" name="pk_pdtt_perawat" id="pk_pdtt_perawat" value="1" class="mr-1 ml-2">Perawat
														<input type="checkbox" name="pk_pdtt_keluarga" id="pk_pdtt_keluarga" value="1" class="mr-1 ml-2">Keluarga
														<input type="checkbox" name="pk_pdtt_lain" id="pk_pdtt_lain" value="1" class="mr-1 ml-2">Lain-lain
														<input type="text" name="pk_pdtt_lain_input" id="pk_pdtt_lain_input" class="custom-form clear-input d-inline-block col-lg-4 ml-2 disabled" placeholder="Masukkan lain-lain">
													</td>
												</tr>
												<tr>
													<td></td>
													<td>3. Menerima informasi jangka waktu pengobatan</td>
													<td>
														<input type="radio" name="pk_penyakit_pdtt_3" id="pk_penyakit_pdtt_3_ya" value="1" class="mr-1">Ya
														<input type="text" name="pk_penyakit_pdtt_3_input" id="pk_penyakit_pdtt_3_input" class="custom-form clear-input d-inline-block col-lg-6 ml-2 disabled" placeholder="Minggu/Bulan/Tahun">
														<input type="radio" name="pk_penyakit_pdtt_3" id="pk_penyakit_pdtt_3_tidak" value="0" class="mr-1 ml-4" checked>Tidak
													</td>
												</tr>
												<tr>
													<td></td>
													<td>4. Melakukan pemeriksaan rutin</td>
													<td>
														<input type="radio" name="pk_penyakit_pdtt_4" id="pk_penyakit_pdtt_4_tidak" value="0" class="mr-1" checked>Tidak
														<input type="radio" name="pk_penyakit_pdtt_4" id="pk_penyakit_pdtt_4_ya" value="1" class="mr-1 ml-4">Ya
														<input type="text" name="pk_penyakit_pdtt_4_input" id="pk_penyakit_pdtt_4_input" class="custom-form clear-input d-inline-block col-lg-6 ml-2 disabled" placeholder="">
													</td>
												</tr>
												<tr>
													<td></td>
													<td>6. Penyakit Penyerta</td>
													<td>
														<input type="radio" name="pk_penyakit_pdtt_5" id="pk_penyakit_pdtt_5_tidak" value="0" class="mr-1" checked>Tidak
														<input type="radio" name="pk_penyakit_pdtt_5" id="pk_penyakit_pdtt_5_ya" value="1" class="mr-1 ml-4">Ya
														<input type="text" name="pk_penyakit_pdtt_5_input" id="pk_penyakit_pdtt_5_input" class="custom-form clear-input d-inline-block col-lg-6 ml-2 disabled" placeholder="">
													</td>
												</tr>
												<tr>
													<td><b>D.</b></td>
													<td><b>Kesehatan Jiwa</b></td>
													<td></td>
												</tr>
												<tr>
													<td></td>
													<td>Pernah mengalami gangguan jiwa sebelumnya</td>
													<td>
														<input type="radio" name="pk_kesehatan_jiwa_1" id="pk_kesehatan_jiwa_1_tidak" value="0" class="mr-1" checked>Tidak
														<input type="radio" name="pk_kesehatan_jiwa_1" id="pk_kesehatan_jiwa_1_ya" value="1" class="mr-1 ml-4">Ya
													</td>
												</tr>
												<tr>
													<td></td>
													<td>Riwayat pengobatan sebelumnya</td>
													<td>
														<input type="radio" name="pk_kesehatan_jiwa_2" id="pk_kesehatan_jiwa_2_tidak" value="0" class="mr-1" checked>Tidak
														<input type="radio" name="pk_kesehatan_jiwa_2" id="pk_kesehatan_jiwa_2_ya" value="1" class="mr-1 ml-4">Ya
													</td>
												</tr>
												<tr>
													<td></td>
													<td>Adakah anggota keluarga yang mengalami gangguan jiwa serupa</td>
													<td>
														<input type="radio" name="pk_kesehatan_jiwa_3" id="pk_kesehatan_jiwa_3_tidak" value="0" class="mr-1" checked>Tidak
														<input type="radio" name="pk_kesehatan_jiwa_3" id="pk_kesehatan_jiwa_3_ya" value="1" class="mr-1 ml-4">Ya
													</td>
												</tr>
												<tr>
													<td></td>
													<td>Apakah pasien bisa merawat dirinya sendiri</td>
													<td>
														<input type="radio" name="pk_kesehatan_jiwa_4" id="pk_kesehatan_jiwa_4_tidak" value="0" class="mr-1" checked>Tidak
														<input type="radio" name="pk_kesehatan_jiwa_4" id="pk_kesehatan_jiwa_4_ya" value="1" class="mr-1 ml-4">Ya
													</td>
												</tr>
												<tr>
													<td></td>
													<td>Apakah pasien dapat berkomunikasi dengan baik</td>
													<td>
														<input type="radio" name="pk_kesehatan_jiwa_5" id="pk_kesehatan_jiwa_5_tidak" value="0" class="mr-1" checked>Tidak
														<input type="radio" name="pk_kesehatan_jiwa_5" id="pk_kesehatan_jiwa_5_ya" value="1" class="mr-1 ml-4">Ya
													</td>
												</tr>
												<tr>
													<td></td>
													<td>Apakah bicara pasien dapat dipahami oleh perawat / dokter</td>
													<td>
														<input type="radio" name="pk_kesehatan_jiwa_6" id="pk_kesehatan_jiwa_6_tidak" value="0" class="mr-1" checked>Tidak
														<input type="radio" name="pk_kesehatan_jiwa_6" id="pk_kesehatan_jiwa_6_ya" value="1" class="mr-1 ml-4">Ya
													</td>
												</tr>
												<tr>
													<td></td>
													<td>Adakah resiko mencederai diri sendiri</td>
													<td>
														<input type="radio" name="pk_kesehatan_jiwa_7" id="pk_kesehatan_jiwa_7_tidak" value="0" class="mr-1" checked>Tidak
														<input type="radio" name="pk_kesehatan_jiwa_7" id="pk_kesehatan_jiwa_7_ya" value="1" class="mr-1 ml-4">Ya
													</td>
												</tr>
												<tr>
													<td></td>
													<td>Adakah resiko mencederai orang lain</td>
													<td>
														<input type="radio" name="pk_kesehatan_jiwa_8" id="pk_kesehatan_jiwa_8_tidak" value="0" class="mr-1" checked>Tidak
														<input type="radio" name="pk_kesehatan_jiwa_8" id="pk_kesehatan_jiwa_8_ya" value="1" class="mr-1 ml-4">Ya
													</td>
												</tr>
												<tr>
													<td></td>
													<td>Apakah pasien dapat memahami instruksi dokter atau perawat dengan baik</td>
													<td>
														<input type="radio" name="pk_kesehatan_jiwa_9" id="pk_kesehatan_jiwa_9_tidak" value="0" class="mr-1" checked>Tidak
														<input type="radio" name="pk_kesehatan_jiwa_9" id="pk_kesehatan_jiwa_9_ya" value="1" class="mr-1 ml-4">Ya
													</td>
												</tr>
												<tr>
													<td><b>E.</b></td>
													<td><b>Pasien Yang Mengalami Kekerasan / Penganiayaan</b></td>
													<td></td>
												</tr>
												<tr>
													<td></td>
													<td>Apakah anda mengalami kekerasan / penganiayaan</td>
													<td>
														<input type="radio" name="pk_pasien_kekerasan_1" id="pk_pasien_kekerasan_1_ya" value="1" class="mr-1">Ya
														<input type="radio" name="pk_pasien_kekerasan_1" id="pk_pasien_kekerasan_1_tidak" value="0" checked class="mr-1 ml-4">Tidak
													</td>
												</tr>
												<tr>
													<td></td>
													<td>Jenis Kekerasan / Penganiayaan Yang dialami</td>
													<td>
														<input type="text" name="pk_pasien_kekerasan_2" id="pk_pasien_kekerasan_2" class="custom-form clear-input d-inline-block col-lg-8" placeholder="">
													</td>
												</tr>
												<tr>
													<td></td>
													<td>Sudah berapa lama mengalami kekerasan / penganiayaan</td>
													<td>
														<input type="text" name="pk_pasien_kekerasan_3" id="pk_pasien_kekerasan_3" class="custom-form clear-input d-inline-block col-lg-8" placeholder="">
													</td>
												</tr>
												<tr>
													<td></td>
													<td>Seberapa sering anda mengalami kekerasan / penganiayaan</td>
													<td>
														<input type="text" name="pk_pasien_kekerasan_4" id="pk_pasien_kekerasan_4" class="custom-form clear-input d-inline-block col-lg-8" placeholder="">
													</td>
												</tr>
												<tr>
													<td></td>
													<td>Siapa yang melakukan kekerasan / penganiayaan</td>
													<td>
														<input type="text" name="pk_pasien_kekerasan_5" id="pk_pasien_kekerasan_5" class="custom-form clear-input d-inline-block col-lg-8" placeholder="">
													</td>
												</tr>
												<tr>
													<td></td>
													<td>Apakah korban memerlukan pendampingan</td>
													<td>
														<input type="radio" name="pk_pasien_kekerasan_6" id="pk_pasien_kekerasan_6_ya" value="1" class="mr-1">Ya
														<input type="radio" name="pk_pasien_kekerasan_6" id="pk_pasien_kekerasan_6_tidak" value="0" checked class="mr-1 ml-4">Tidak
													</td>
												</tr>
												<tr>
													<td><b>F.</b></td>
													<td><b>Pasien Diduga Ketergantungan Obat dan Alkohol</b></td>
													<td>
														<input type="radio" name="pk_pasien_ketergantungan_obat" id="pk_pasien_ketergantungan_obat_ya" value="1" class="mr-1">Ya
														<input type="radio" name="pk_pasien_ketergantungan_obat" id="pk_pasien_ketergantungan_obat_tidak" value="0" checked class="mr-1 ml-4">Tidak
													</td>
												</tr>
												<tr>
													<td></td>
													<td></td>
													<td>
														Jika Ya, Sebutkan<input type="text" name="pk_pasien_ketergantungan_obat_input" id="pk_pasien_ketergantungan_obat_input" class="custom-form clear-input d-inline-block col-lg-6 ml-4 disabled" placeholder="Sebutkan">
													</td>
												</tr>
												<tr>
													<td></td>
													<td></td>
													<td>
														Lama Ketergantungan<input type="text" name="pk_pasien_lama_ketergantungan_obat_input" id="pk_pasien_lama_ketergantungan_obat_input" class="custom-form clear-input d-inline-block col-lg-6 ml-4 disabled" placeholder="Lama Ketergantungan">
													</td>
												</tr>
											</table>
										</div>





										<!-- Row Data Skala Early Warning System (News) -->
										<table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
											<tr>
												<td colspan="3" class="center bold td-dark">
													<button class="btn btn-info btn-xs mr-1 float-left" type="button" data-toggle="collapse" data-target="#data-skala-early-warning-system"><i class="fas fa-expand mr-1"></i>Expand</button>NEWS (DEWASA)
												</td>
											</tr>
										</table>
										<div class="collapse multi-collapse mt-2" id="data-skala-early-warning-system">

											<table class="table table-sm table-striped table-bordered">
												<thead>
													<tr>
														<th class="center" colspan="10" style="background-color: #5F9EA0; color: white;"><b>NEWS (DEWASA)</b></th>
													</tr>
													<tr>
														<th width="20%" class="center" style="background-color: #5F9EA0; color: white;"><b>Parameter</b></th>
														<th width="10%" class="center" style="background-color: #5F9EA0; color: white;"><b>3</b></th>
														<th width="10%" class="center" style="background-color: #5F9EA0; color: white;"><b>2</b></th>
														<th width="10%" class="center" style="background-color: #5F9EA0; color: white;"><b>1</b></th>
														<th width="10%" class="center" style="background-color: #5F9EA0; color: white;"><b>0</b></th>
														<th width="10%" class="center" style="background-color: #5F9EA0; color: white;"><b>1</b></th>
														<th width="10%" class="center" style="background-color: #5F9EA0; color: white;"><b>2</b></th>
														<th width="10%" class="center" style="background-color: #5F9EA0; color: white;"><b>3</b></th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td>Respirasi</td>
														<td class="center"><input type="radio" name="respirasinewst" id="skalanewst_1_1" value="3_1" class="mr-1 skalanewst news_respirasit_1_1">≤8</td>
														<td class="center"></td>
														<td class="center"><input type="radio" name="respirasinewst" id="skalanewst_1_2" value="1_2" class="mr-1 skalanewst news_respirasit_1_2">9-11</td>
														<td class="center"><input type="radio" name="respirasinewst" id="skalanewst_1_3" value="0_3" class="mr-1 skalanewst news_respirasit_1_3">12-20</td>
														<td class="center"></td>
														<td class="center"><input type="radio" name="respirasinewst" id="skalanewst_1_4" value="2_4" class="mr-1 skalanewst news_respirasit_1_4">21-24</td>
														<td class="center"><input type="radio" name="respirasinewst" id="skalanewst_1_5" value="3_5" class="mr-1 skalanewst news_respirasit_1_5">≥25</td>
													</tr>
													<tr>
														<td>SpO2 Skala 1 (Non PPOK)</td>
														<td class="center"><input type="radio" name="spskalat" id="skalanewst_2_1" value="3_1" class="mr-1 skalanewst news_ppokt_2_1">≤91</td>
														<td class="center"><input type="radio" name="spskalat" id="skalanewst_2_2" value="2_2" class="mr-1 skalanewst news_ppokt_2_2">92-93</td>
														<td class="center"><input type="radio" name="spskalat" id="skalanewst_2_3" value="1_3" class="mr-1 skalanewst news_ppokt_2_3">94-95</td>
														<td class="center"><input type="radio" name="spskalat" id="skalanewst_2_4" value="0_4" class="mr-1 skalanewst news_ppokt_2_4">≥96</td>
														<td class="center"></td>
														<td class="center"></td>
														<td class="center"></td>
													</tr>
													<tr>
														<td>SpO2 Skala 2 (PPOK)</td>
														<td class="center"><input type="radio" name="spskalappokt" id="skalanewst_3_1" value="3_1" class="mr-1 skalanewst news_skalat_3_1">≤83</td>
														<td class="center"><input type="radio" name="spskalappokt" id="skalanewst_3_2" value="2_2" class="mr-1 skalanewst news_skalat_3_2">84-85</td>
														<td class="center"><input type="radio" name="spskalappokt" id="skalanewst_3_3" value="1_3" class="mr-1 skalanewst news_skalat_3_3">86-87</td>
														<td class="center"><input type="radio" name="spskalappokt" id="skalanewst_3_4" value="0_4" class="mr-1 skalanewst news_skalat_3_4">88-92 <br> ≥93 RA </td>
														<td class="center"><input type="radio" name="spskalappokt" id="skalanewst_3_5" value="1_5" class="mr-1 skalanewst news_skalat_3_5">93-94 <br> dgn O2 </td>
														<td class="center"><input type="radio" name="spskalappokt" id="skalanewst_3_6" value="2_6" class="mr-1 skalanewst news_skalat_3_6">95-96 <br> dgn O2 </td>
														<td class="center"><input type="radio" name="spskalappokt" id="skalanewst_3_7" value="3_7" class="mr-1 skalanewst news_skalat_3_7">≥97 <br> dgn O2 </td>
													</tr>

													<tr>
														<td>Suplemen O₂ </td>
														<td class="center"></td>
														<td class="center"><input type="radio" name="suplementt" id="skalanewst_4_1" value="2_1" class="mr-1 skalanewst news_skalat_4_1">Ya</td>
														<td class="center"></td>
														<td class="center"><input type="radio" name="suplementt" id="skalanewst_4_2" value="0_2" class="mr-1 skalanewst news_skalat_4_2">Tidak</td>
														<td class="center"></td>
														<td class="center"></td>
														<td class="center"></td>
													</tr>
													<tr>
														<td>TD Sistolik</td>
														<td class="center"><input type="radio" name="tdssistolikt" id="skalanewst_5_1" value="3_1" class="mr-1 skalanewst news_tdst_5_1">≤90</td>
														<td class="center"><input type="radio" name="tdssistolikt" id="skalanewst_5_2" value="2_2" class="mr-1 skalanewst news_tdst_5_2">91-100</td>
														<td class="center"><input type="radio" name="tdssistolikt" id="skalanewst_5_3" value="1_3" class="mr-1 skalanewst news_tdst_5_3">101-110</td>
														<td class="center"><input type="radio" name="tdssistolikt" id="skalanewst_5_4" value="0_4" class="mr-1 skalanewst news_tdst_5_4">111-219</td>
														<td class="center"></td>
														<td class="center"></td>
														<td class="center"><input type="radio" name="tdssistolikt" id="skalanewst_5_5" value="3_5" class="mr-1 skalanewst news_tdst_5_5">≥220</td>
													</tr>
													<tr>
														<td>Nadi</td>
														<td class="center"><input type="radio" name="nadiwst" id="skalanewst_6_1" value="3_1" class="mr-1 skalanewst news_nadiht_6_1">≤40</td>
														<td class="center"></td>
														<td class="center"><input type="radio" name="nadiwst" id="skalanewst_6_2" value="1_2" class="mr-1 skalanewst news_nadiht_6_2">41-50</td>
														<td class="center"><input type="radio" name="nadiwst" id="skalanewst_6_3" value="0_3" class="mr-1 skalanewst news_nadiht_6_3">51-90</td>
														<td class="center"><input type="radio" name="nadiwst" id="skalanewst_6_4" value="1_4" class="mr-1 skalanewst news_nadiht_6_4">91-110</td>
														<td class="center"><input type="radio" name="nadiwst" id="skalanewst_6_5" value="2_5" class="mr-1 skalanewst news_nadiht_6_5">111-130</td>
														<td class="center"><input type="radio" name="nadiwst" id="skalanewst_6_6" value="3_6" class="mr-1 skalanewst news_nadiht_6_6">≥131</td>
													</tr>
													<tr>
														<td>Kesadaran</td>
														<td class="center"></td>
														<td class="center"></td>
														<td class="center"></td>
														<td class="center"><input type="radio" name="kesadaranwst" id="skalanewst_7_1" value="0_1" class="mr-1 skalanewst news_kesadaranyt_7_1">A</td>
														<td class="center"></td>
														<td class="center"></td>
														<td class="center"><input type="radio" name="kesadaranwst" id="skalanewst_7_2" value="3_2" class="mr-1 skalanewst news_kesadaranyt_7_2">CVPU</td>
													</tr>
													<tr>
														<td>Suhu</td>
														<td class="center"><input type="radio" name="suhunewst" id="skalanewst_8_1" value="3_1" class="mr-1 skalanewst news_sihut_8_1">≤35,0</td>
														<td class="center"></td>
														<td class="center"><input type="radio" name="suhunewst" id="skalanewst_8_2" value="1_2" class="mr-1 skalanewst news_sihut_8_2">35,1-36,0</td>
														<td class="center"><input type="radio" name="suhunewst" id="skalanewst_8_3" value="0_3" class="mr-1 skalanewst news_sihut_8_3">36,1-38,0</td>
														<td class="center"><input type="radio" name="suhunewst" id="skalanewst_8_4" value="1_4" class="mr-1 skalanewst news_sihut_8_4">38,1-39,0</td>
														<td class="center"><input type="radio" name="suhunewst" id="skalanewst_8_5" value="2_5" class="mr-1 skalanewst news_sihut_8_5">≥39,1</td>
														<td class="center"></td>
													</tr>
													<tr>
														<td></td>
														<td colspan="7">
															<input type="radio" name="total_skalanewst" id="total_skalanewst_1" class="mr-1 ml-3" value="Putih"><i class="fas fa-fw fa-square" style="color: white"></i><b>Putih(0)</b>
															<input type="radio" name="total_skalanewst" id="total_skalanewst_2" class="mr-1 ml-3" value="Hijau"><i class="fas fa-fw fa-square" style="color: green"></i><b>Hijau (1-4)</b>
															<input type="radio" name="total_skalanewst" id="total_skalanewst_3" class="mr-1 ml-3" value="Kuning"><i class="fas fa-fw fa-square" style="color: yellow"></i><b>Kuning(5-6)</b>
															<input type="radio" name="total_skalanewst" id="total_skalanewst_4" class="mr-1 ml-3" value="Merah"><i class="fas fa-fw fa-square" style="color: red"></i><b> Merah (≥7) </b>
														</td>
													</tr>
												</tbody>
											</table>

											<!-- <table class="table table-sm" style="margin-top: -15px">
												<tr>
													<td width="75%">
														<table class="table table-sm table-striped table-bordered">
															<thead>
																<tr>
																	<th width="5%" class="center"><b>No.</b></th>
																	<th width="15%"><b>Parameter Fisiologis</b></th>
																	<th width="10%" class="center"><b>3</b></th>
																	<th width="10%" class="center"><b>2</b></th>
																	<th width="10%" class="center"><b>1</b></th>
																	<th width="10%" class="center"><b>0</b></th>
																	<th width="10%" class="center"><b>1</b></th>
																	<th width="10%" class="center"><b>2</b></th>
																	<th width="10%" class="center"><b>3</b></th>
																	<th width="10%" class="center"><b>Blue Kriteria</b></th>
																</tr>
															</thead>
															<tbody>
																<tr>
																	<td class="center">1.</td>
																	<td>Laju Respirasi /Menit</td>
																	<td class="center"><input type="radio" name="laju_respirasi" id="skala_1_1" value="3_1" class="mr-1 skala">6-8</td>
																	<td class="center"></td>
																	<td class="center"><input type="radio" name="laju_respirasi" id="skala_1_2" value="1_2" class="mr-1 skala">9-11</td>
																	<td class="center"><input type="radio" name="laju_respirasi" id="skala_1_3" value="0_3" class="mr-1 skala">12-20</td>
																	<td class="center"></td>
																	<td class="center"><input type="radio" name="laju_respirasi" id="skala_1_4" value="2_4" class="mr-1 skala">21-24</td>
																	<td class="center"><input type="radio" name="laju_respirasi" id="skala_1_5" value="3_5" class="mr-1 skala">25-34</td>
																	<td class="center"><input type="radio" name="laju_respirasi" id="skala_1_6" value="bk_6" class="mr-1 skala">≤5 / ≥35</td>
																</tr>
																<tr>
																	<td class="center">2.</td>
																	<td>Saturasi O₂ (%)</td>
																	<td class="center"><input type="radio" name="saturasi" id="skala_2_1" value="3_1" class="mr-1 skala">≤91</td>
																	<td class="center"><input type="radio" name="saturasi" id="skala_2_2" value="2_2" class="mr-1 skala">92-93</td>
																	<td class="center"><input type="radio" name="saturasi" id="skala_2_3" value="1_3" class="mr-1 skala">94-95</td>
																	<td class="center"><input type="radio" name="saturasi" id="skala_2_4" value="0_4" class="mr-1 skala">≥96</td>
																	<td class="center"></td>
																	<td class="center"></td>
																	<td class="center"></td>
																	<td class="center"></td>
																</tr>
																<tr>
																	<td class="center">3.</td>
																	<td>Suplemen O₂ (%)</td>
																	<td class="center"></td>
																	<td class="center"><input type="radio" name="suplemen" id="skala_3_1" value="2_1" class="mr-1 skala">Ya</td>
																	<td class="center"></td>
																	<td class="center"><input type="radio" name="suplemen" id="skala_3_2" value="0_2" class="mr-1 skala">Tidak</td>
																	<td class="center"></td>
																	<td class="center"></td>
																	<td class="center"></td>
																	<td class="center"></td>
																</tr>
																<tr>
																	<td class="center">4.</td>
																	<td>Temperatur (°C)</td>
																	<td class="center"><input type="radio" name="temperatur" id="skala_4_1" value="3_1" class="mr-1 skala">≤35</td>
																	<td class="center"></td>
																	<td class="center"><input type="radio" name="temperatur" id="skala_4_2" value="1_2" class="mr-1 skala">35.1-36</td>
																	<td class="center"><input type="radio" name="temperatur" id="skala_4_3" value="0_3" class="mr-1 skala">36.1-38</td>
																	<td class="center"><input type="radio" name="temperatur" id="skala_4_4" value="1_4" class="mr-1 skala">38.1-39</td>
																	<td class="center"><input type="radio" name="temperatur" id="skala_4_5" value="2_5" class="mr-1 skala">≥39</td>
																	<td class="center"></td>
																	<td class="center"></td>
																</tr>
																<tr>
																	<td class="center">5.</td>
																	<td>TDS (mmHg)</td>
																	<td class="center"><input type="radio" name="tds" id="skala_5_1" value="3_1" class="mr-1 skala">71-90</td>
																	<td class="center"><input type="radio" name="tds" id="skala_5_2" value="2_2" class="mr-1 skala">91-100</td>
																	<td class="center"><input type="radio" name="tds" id="skala_5_3" value="1_3" class="mr-1 skala">101-110</td>
																	<td class="center"><input type="radio" name="tds" id="skala_5_4" value="0_4" class="mr-1 skala">111-180</td>
																	<td class="center"><input type="radio" name="tds" id="skala_5_5" value="1_5" class="mr-1 skala">181-220</td>
																	<td class="center"></td>
																	<td class="center"><input type="radio" name="tds" id="skala_5_6" value="3_6" class="mr-1 skala">≥221</td>
																	<td class="center"><input type="radio" name="tds" id="skala_5_7" value="bk_7" class="mr-1 skala">≤70</td>
																</tr>
																<tr>
																	<td class="center">6.</td>
																	<td>Laju Jantung /Menit</td>
																	<td class="center"></td>
																	<td class="center"></td>
																	<td class="center"><input type="radio" name="laju_jantung" id="skala_6_1" value="1_2" class="mr-1 skala">41-50</td>
																	<td class="center"><input type="radio" name="laju_jantung" id="skala_6_2" value="0_2" class="mr-1 skala">51-90</td>
																	<td class="center"><input type="radio" name="laju_jantung" id="skala_6_3" value="1_3" class="mr-1 skala">91-110</td>
																	<td class="center"><input type="radio" name="laju_jantung" id="skala_6_4" value="2_4" class="mr-1 skala">111-130</td>
																	<td class="center"><input type="radio" name="laju_jantung" id="skala_6_5" value="3_5" class="mr-1 skala">131-140</td>
																	<td class="center"><input type="radio" name="laju_jantung" id="skala_6_6" value="bk_8" class="mr-1 skala">≤40 / ≥140</td>
																</tr>
																<tr>
																	<td class="center">7.</td>
																	<td>Kesadaran</td>
																	<td class="center"></td>
																	<td class="center"></td>
																	<td class="center"></td>
																	<td class="center"><input type="radio" name="kesadaran" id="skala_7_1" value="0_1" class="mr-1 skala">A</td>
																	<td class="center"></td>
																	<td class="center"></td>
																	<td class="center"><input type="radio" name="kesadaran" id="skala_7_2" value="3_2" class="mr-1 skala">V & P</td>
																	<td class="center"><input type="radio" name="kesadaran" id="skala_7_3" value="bk_9" class="mr-1 skala">U</td>
																</tr>
																<tr><td colspan="10"></td></tr>
																<tr>
																	<td colspan="2"><b>TOTAL</b></td>
																	<td colspan="8">
																		<input type="radio" name="total_skala" id="total_skala_1" class="mr-1" value="Putih"><i class="fas fa-fw fa-square" style="color: white"></i><b>Putih (0)</b>
																		<input type="radio" name="total_skala" id="total_skala_2" class="mr-1 ml-3" value="Hijau"><i class="fas fa-fw fa-square" style="color: green"></i><b>Hijau (1-4)</b>
																		<input type="radio" name="total_skala" id="total_skala_3" class="mr-1 ml-3" value="Kuning"><i class="fas fa-fw fa-square" style="color: yellow"></i><b>Kuning (5-6)</b>
																		<input type="radio" name="total_skala" id="total_skala_4" class="mr-1 ml-3" value="Merah"><i class="fas fa-fw fa-square" style="color: red"></i><b>Merah (≥7/1 Parameter Blue Kriteria)</b>
																	</td>
																</tr>
															</tbody>
														</table>
													</td>
													<td width="25%" style="vertical-align: top !important;">
														<span class="bold">Keterangan :</span><br>
														<span>A = Alert (Sadar Penuh)</span><br>
														<span>V = Verbal (Respon dengan Rangsang Suara) Somnolen, Dapat Ditenangkan</span><br>
														<span>P = Pain (Respon dengan Rangsang Nyeri) Letargi, Gelisah, Penurunan Respon Nyeri</span><br>
														<span>U = Unrespon</span>
													</td>
												</tr>
											</table> -->

										</div>

										<!-- Row Data Masalah Keperawatan -->
										<table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
											<tr>
												<td colspan="3" class="center bold td-dark">
													<button class="btn btn-info btn-xs mr-1 float-left" type="button" data-toggle="collapse" data-target="#data-masalah-keperawatan"><i class="fas fa-expand mr-1"></i>Expand</button>MASALAH KEPERAWATAN
												</td>
											</tr>
										</table>
										<div class="collapse multi-collapse mt-2" id="data-masalah-keperawatan">
											<table class="table table-sm table-striped" style="margin-top: -15px">
												<tr>
													<td width="33%"><input type="checkbox" name="masalah_keperawatan_1" id="masalah_keperawatan_1" class="mr-1" value="1">Bersihan Jalan Nafas Tidak Efektif</td>
													<td width="33%"><input type="checkbox" name="masalah_keperawatan_2" id="masalah_keperawatan_2" class="mr-1" value="1">Diare</td>
													<td width="33%"><input type="checkbox" name="masalah_keperawatan_3" id="masalah_keperawatan_3" class="mr-1" value="1">Ansietas</td>
												</tr>
												<tr>
													<td><input type="checkbox" name="masalah_keperawatan_4" id="masalah_keperawatan_4" class="mr-1" value="1">Pola Nafas Tidak Efektif</td>
													<td><input type="checkbox" name="masalah_keperawatan_5" id="masalah_keperawatan_5" class="mr-1" value="1">Intoleransi Aktivitas</td>
													<td><input type="checkbox" name="masalah_keperawatan_6" id="masalah_keperawatan_6" class="mr-1" value="1">Berduka</td>
												</tr>
												<tr>
													<td><input type="checkbox" name="masalah_keperawatan_7" id="masalah_keperawatan_7" class="mr-1" value="1">Gangguan Pertukaran Gas</td>
													<td><input type="checkbox" name="masalah_keperawatan_8" id="masalah_keperawatan_8" class="mr-1" value="1">Gangguan Mobilitas Fisik</td>
													<td><input type="checkbox" name="masalah_keperawatan_9" id="masalah_keperawatan_9" class="mr-1" value="1">Gangguan Interaksi Sosial</td>
												</tr>
												<tr>
													<td><input type="checkbox" name="masalah_keperawatan_10" id="masalah_keperawatan_10" class="mr-1" value="1">Gangguan Ventilasi Spontan</td>
													<td><input type="checkbox" name="masalah_keperawatan_11" id="masalah_keperawatan_11" class="mr-1" value="1">Penurunan Kapasitas Adaptif Intrakranial</td>
													<td><input type="checkbox" name="masalah_keperawatan_12" id="masalah_keperawatan_12" class="mr-1" value="1">Risiko Cedera</td>
												</tr>
												<tr>
													<td><input type="checkbox" name="masalah_keperawatan_13" id="masalah_keperawatan_13" class="mr-1" value="1">Penurunan Curah Jantung</td>
													<td><input type="checkbox" name="masalah_keperawatan_14" id="masalah_keperawatan_14" class="mr-1" value="1">Nyeri Akut</td>
													<td><input type="checkbox" name="masalah_keperawatan_15" id="masalah_keperawatan_15" class="mr-1" value="1">Risiko Aspirasi</td>
												</tr>
												<tr>
													<td><input type="checkbox" name="masalah_keperawatan_16" id="masalah_keperawatan_16" class="mr-1" value="1">Perfusi Perifer Tidak Efektif</td>
													<td><input type="checkbox" name="masalah_keperawatan_17" id="masalah_keperawatan_17" class="mr-1" value="1">Nyeri Kronis</td>
													<td><input type="checkbox" name="masalah_keperawatan_18" id="masalah_keperawatan_18" class="mr-1" value="1">Risiko Pendarahan</td>
												</tr>
												<tr>
													<td><input type="checkbox" name="masalah_keperawatan_19" id="masalah_keperawatan_19" class="mr-1" value="1">Nausea</td>
													<td><input type="checkbox" name="masalah_keperawatan_20" id="masalah_keperawatan_20" class="mr-1" value="1">Nyeri Melahirkan</td>
													<td><input type="checkbox" name="masalah_keperawatan_21" id="masalah_keperawatan_21" class="mr-1" value="1">Risiko Syok</td>
												</tr>
												<tr>
													<td><input type="checkbox" name="masalah_keperawatan_22" id="masalah_keperawatan_22" class="mr-1" value="1">Defisit Nutrisi</td>
													<td><input type="checkbox" name="masalah_keperawatan_23" id="masalah_keperawatan_23" class="mr-1" value="1">Defisit Perawatan Diri</td>
													<td><input type="checkbox" name="masalah_keperawatan_24" id="masalah_keperawatan_24" class="mr-1" value="1">Risiko Jatuh</td>
												</tr>
												<tr>
													<td><input type="checkbox" name="masalah_keperawatan_25" id="masalah_keperawatan_25" class="mr-1" value="1">Hipervolemia</td>
													<td><input type="checkbox" name="masalah_keperawatan_26" id="masalah_keperawatan_26" class="mr-1" value="1">Hipertermia</td>
													<td><input type="checkbox" name="masalah_keperawatan_27" id="masalah_keperawatan_27" class="mr-1" value="1">Risiko Luka Tekan</td>
												</tr>
												<tr>
													<td><input type="checkbox" name="masalah_keperawatan_28" id="masalah_keperawatan_28" class="mr-1" value="1">Hipovolemia</td>
													<td><input type="checkbox" name="masalah_keperawatan_29" id="masalah_keperawatan_29" class="mr-1" value="1">Hipertermi</td>
													<td>
														<input type="checkbox" name="masalah_keperawatan_30" id="masalah_keperawatan_30" class="mr-1" value="1">Lain-lain
														<input type="text" name="masalah_keperawatan_lain_input" id="masalah_keperawatan_lain_input" class="custom-form clear-input d-inline-block col-lg-6 disabled" placeholder="Masukkan lain - lain">
													</td>
												</tr>
												<tr>
													<td><input type="checkbox" name="masalah_keperawatan_31" id="masalah_keperawatan_31" class="mr-1" value="1">Ketidakstabilan Kadar Glukosa Darah</td>
													<td><input type="checkbox" name="masalah_keperawatan_32" id="masalah_keperawatan_32" class="mr-1" value="1">Ketegangan Peran Pemberi Asuhan</td>
													<td></td>
												</tr>
												<tr>
													<td><input type="checkbox" name="masalah_keperawatan_33" id="masalah_keperawatan_33" class="mr-1" value="1">Gangguan Eliminasi Urin</td>
													<td><input type="checkbox" name="masalah_keperawatan_34" id="masalah_keperawatan_34" class="mr-1" value="1">Resiko Gangguan Integritas Kulit / Jaringan</td>
													<td></td>
												</tr>
											</table>
										</div>

										<!-- Row Data Perencanaan Pulang -->
										<table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
											<tr>
												<td colspan="3" class="center bold td-dark">
													<button class="btn btn-info btn-xs mr-1 float-left" type="button" data-toggle="collapse" data-target="#data-perencanaan-pulang"><i class="fas fa-expand mr-1"></i>Expand</button>PERENCANAAN PULANG / DISCHARGE PLANNING
												</td>
											</tr>
										</table>
										<div class="collapse multi-collapse mt-2" id="data-perencanaan-pulang">
											<table class="table table-sm table-striped" style="margin-top: -15px">
												<tr>
													<td width="50%"><b>Kriteria Discharge Planning :</b></td>
													<td width="50%"></td>
												</tr>
												<tr>
													<td>1. Umur > 65 Tahun</td>
													<td>
														<input type="radio" name="discharge_planning_1" id="discharge_planning_1_ya" class="mr-1" value="1">Ya
														<input type="radio" name="discharge_planning_1" id="discharge_planning_1_tidak" class="mr-1 ml-2" value="0" checked>Tidak
													</td>
												</tr>
												<tr>
													<td>2. Keterbatasan Mobilitas</td>
													<td>
														<input type="radio" name="discharge_planning_2" id="discharge_planning_2_ya" class="mr-1" value="1">Ya
														<input type="radio" name="discharge_planning_2" id="discharge_planning_2_tidak" class="mr-1 ml-2" value="0" checked>Tidak
													</td>
												</tr>
												<tr>
													<td>3. Perawatan / Pengobatan Lanjutan</td>
													<td>
														<input type="radio" name="discharge_planning_3" id="discharge_planning_3_ya" class="mr-1" value="1">Ya
														<input type="radio" name="discharge_planning_3" id="discharge_planning_3_tidak" class="mr-1 ml-2" value="0" checked>Tidak
													</td>
												</tr>
												<tr>
													<td>4. Bantuan Untuk Melanjutkan Aktifitas Sehari-hari</td>
													<td>
														<input type="radio" name="discharge_planning_4" id="discharge_planning_4_ya" class="mr-1" value="1">Ya
														<input type="radio" name="discharge_planning_4" id="discharge_planning_4_tidak" class="mr-1 ml-2" value="0" checked>Tidak
													</td>
												</tr>
												<tr>
													<td colspan="2">Bila salah satu jawaban "Ya" dari kriteria perencanaan pulang diatas, maka akan dilanjutkan dengan perencanaan pulang sebagai berikut :</td>
												</tr>
												<tr>
													<td><input type="checkbox" name="kriteria_discharge_1" id="kriteria_discharge_1" class="mr-1" value="1">Perawatan Diri (Mandi, BAB, BAK)</td>
													<td><input type="checkbox" name="kriteria_discharge_2" id="kriteria_discharge_2" class="mr-1" value="1">Bantuan Medis / Perawatan Diruamh (Homescare)</td>
												</tr>
												<tr>
													<td><input type="checkbox" name="kriteria_discharge_3" id="kriteria_discharge_3" class="mr-1" value="1">Pemantauan Pemberian Obat</td>
													<td><input type="checkbox" name="kriteria_discharge_4" id="kriteria_discharge_4" class="mr-1" value="1">Latihan Fisik Lanjutan</td>
												</tr>
												<tr>
													<td><input type="checkbox" name="kriteria_discharge_5" id="kriteria_discharge_5" class="mr-1" value="1">Pendampingan Tenaga Khusus Dirumah</td>
													<td><input type="checkbox" name="kriteria_discharge_6" id="kriteria_discharge_6" class="mr-1" value="1">Pemantauan Diet</td>
												</tr>
												<tr>
													<td><input type="checkbox" name="kriteria_discharge_7" id="kriteria_discharge_7" class="mr-1" value="1">Bantuan Untuk Melakukan Aktifitas Fisik</td>
													<td><input type="checkbox" name="kriteria_discharge_8" id="kriteria_discharge_8" class="mr-1" value="1">Perawatan Luka</td>
												</tr>
												<tr>
													<td>(Kursi Roda, Alat Bantu Jalan)</td>
													<td>
														<input type="checkbox" name="kriteria_discharge_9" id="kriteria_discharge_9" class="mr-1" value="1">Lain-lain
														<input type="text" name="kriteria_discharge_lain_input" id="kriteria_discharge_lain_input" class="custom-form clear-input d-inline-block col-lg-6 disabled" placeholder="Masukkan lain - lain">
													</td>
												</tr>
											</table>
										</div>

										<table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
											<tr>
												<td colspan="2" class="center td-dark"></td>
											</tr>
											<tr>
												<td width="50%">
													Tanggal & Jam <input type="text" name="tanggal_ttd_perawat" id="tanggal_ttd_perawat" class="custom-form clear-input d-inline-block col-lg-5 ml-2" value="<?= date('d/m/Y H:i') ?>">
												</td>
												<td width="50%">
													Tanggal & Jam <input type="text" name="tanggal_verifikasi_dokter_dpjp" id="tanggal_verifikasi_dokter_dpjp" class="custom-form clear-input d-inline-block col-lg-5 ml-2" placeholder="dd/mm/yyyy hh:ii">
												</td>
											</tr>
											<tr>
												<td>Perawat <input type="text" name="perawat" id="perawat" class="select2c-input ml-2"></td>
												<td>Verifikasi DPJP <input type="text" name="verifikasi_dokter_dpjp" id="verifikasi_dokter_dpjp" class="select2c-input ml-2"></td>
											</tr>
											<tr>
												<td class="center">
													Tanda Tangan	
												</td>
												<td class="center">
													Verifikasi DPJP
												</td>
											</tr>
											<tr>
												<td class="center">
													<input type="checkbox" name="ttd_perawat" id="ttd_perawat" value="1" class="custom-form col-lg-1 mx-auto">
													<?= digitalSignature('ttd_perawat_verified') ?>
												</td>
												<td class="center">
													<input type="checkbox" name="ttd_verifikasi_dokter_dpjp" id="ttd_verifikasi_dokter_dpjp" value="1" class="custom-form col-lg-1 mx-auto">
													<?= digitalSignature('ttd_verifikasi_dokter_dpjp_verified') ?>
												</td>
											</tr>
										</table>
									</div>
									
									
									<!-- Data Pengkajian Dokter-->
									<div class="form-data-pengkajian-dokter">
										<table class="table table-no-border table-sm table-striped">
											<tr>
												<td width="20%" class="bold">Waktu Pengkajian</td>
												<td width="1%" class="bold">:</td>
												<td width="79%">
													<input type="text" name="waktu_kajian_medis" id="waktu_kajian_medis" class="custom-form clear-input col-lg-2" value="<?= date('d/m/Y H:i') ?>">
												</td>
											</tr>
											<tr>
												<td colspan="3" class="td-dark"><b>ANAMNESIS</b></td>
											</tr>
											<tr>
												<td class="bold">Keluhan Utama</td>
												<td class="bold">:</td>
												<td>
													<textarea name="keluhan_utama_medis" id="keluhan_utama_medis" rows="4" class="form-control clear-input" placeholder="Keluhan Utama"></textarea>
												</td>
											</tr>
											<tr>
												<td class="bold">Riwayat Penyakit Sekarang</td>
												<td class="bold">:</td>
												<td>
													<textarea name="rps_medis" id="rps_medis" rows="4" class="form-control clear-input" placeholder="Riwayat Penyakit Sekarang"></textarea>
												</td>
											</tr>
											<tr>
												<td class="bold">Riwayat Penyakit Terdahulu</td>
												<td class="bold">:</td>
												<td>
													<textarea name="rpt_medis" id="rpt_medis" rows="4" class="form-control clear-input" placeholder="Riwayat Penyakit Terdahulu"></textarea>
												</td>
											</tr>
											<tr>
												<td class="bold">Pengobatan</td>
												<td class="bold">:</td>
												<td>
													<textarea name="pengobatan_medis" id="pengobatan_medis" rows="4" class="form-control clear-input" placeholder="Pengobatan"></textarea>
												</td>
											</tr>
											<tr>
												<td class="bold">Riwayat Alergi</td>
												<td class="bold">:</td>
												<td>
													<textarea name="riwayat_alergi" id="riwayat_alergi" rows="4" class="form-control clear-input" placeholder="Riwayat Alergi"></textarea>
												</td>
											</tr>
											<tr>
												<td class="bold">Riwayat Penyakit Keluarga</td>
												<td class="bold">:</td>
												<td>
													<input type="radio" name="rpk_medis" id="rpk_medis_tidak" value="0" class="mr-1" checked>Tidak
													<input type="radio" name="rpk_medis" id="rpk_medis_ya" value="1" class="mr-1 ml-2">Ya, 
													<input type="checkbox" name="rpk_medis_asma" id="rpk_medis_asma" value="1" class="mr-1 ml-4 disabled">Asma
													<input type="checkbox" name="rpk_medis_dm" id="rpk_medis_dm" value="1" class="mr-1 ml-2 disabled">DM
													<input type="checkbox" name="rpk_medis_cardiovascular" id="rpk_medis_cardiovascular" value="1" class="mr-1 ml-2 disabled">Cardiovascular
													<input type="checkbox" name="rpk_medis_kanker" id="rpk_medis_kanker" value="1" class="mr-1 ml-2 disabled">kanker
													<input type="checkbox" name="rpk_medis_thalasemia" id="rpk_medis_thalasemia" value="1" class="mr-1 ml-2 disabled">Thalasemia
													<input type="checkbox" name="rpk_medis_lain" id="rpk_medis_lain" value="1" class="mr-1 ml-2 disabled">lain
													<input type="text" name="rpk_medis_lain_input" id="rpk_medis_lain_input" class="custom-form clear-input col-lg-4 d-inline-block mr-2 disabled" placeholder="Masukkan lain - lain">
												</td>
											</tr>
											<tr>
												<td class="bold" colspan="3">Riwayat Pekerjaan, Sosial Ekonomi, Kejiwaan dan Kebiasaan :</td>
											</tr>
											<tr>
												<td colspan="3"><i>(termasuk riwayat perkawinan, obstetri, imunisasi tumbuh kembang)</i></td>
											</tr>
											<tr>
												<td colspan="3"><div id="riwayat_field"></div></td>
											</tr>
											<tr>
												<td class="bold td-dark" colspan="3">PEMERIKSAAN FISIK</td>
											</tr>
											<tr>
												<td class="bold">Kesadaran</td>
												<td class="bold">:</td>
												<td>
													<input type="checkbox" name="composmentis_medis" id="composmentis_medis" value="1" class="mr-1">Composmentis
													<input type="checkbox" name="apatis_medis" id="apatis_medis" value="1" class="mr-1 ml-2">Apatis
													<input type="checkbox" name="samnolen_medis" id="samnolen_medis" value="1" class="mr-1 ml-2">Samnolen
													<input type="checkbox" name="sopor_medis" id="sopor_medis" value="1" class="mr-1 ml-2">Sopor
													<input type="checkbox" name="koma_medis" id="koma_medis" value="1" class="mr-1 ml-2">Koma
												</td>
											</tr>
											<tr>
												<td class="bold">Kepala</td>
												<td class="bold">:</td>
												<td>
													<input type="radio" name="pf_kepala" id="pf_kepala_tidak" value="Normal" class="mr-1">Normal
													<input type="radio" name="pf_kepala" id="pf_kepala_ya" value="Abnormal" class="mr-1 ml-2">Abnormal
													<input type="text" name="ket_pf_kepala" id="ket_pf_kepala" class="custom-form clear-input col-lg-6 d-inline-block ml-4" placeholder="Keterangan">
												</td>
											</tr>
											<tr>
												<td class="bold">Mata</td>
												<td class="bold">:</td>
												<td>
													<input type="radio" name="pf_mata" id="pf_mata_tidak" value="Normal" class="mr-1">Normal
													<input type="radio" name="pf_mata" id="pf_mata_ya" value="Abnormal" class="mr-1 ml-2">Abnormal
													<input type="text" name="ket_pf_mata" id="ket_pf_mata" class="custom-form clear-input col-lg-6 d-inline-block ml-4" placeholder="Keterangan">
												</td>
											</tr>
											<tr>
												<td class="bold">Hidung</td>
												<td class="bold">:</td>
												<td>
													<input type="radio" name="pf_hidung" id="pf_hidung_tidak" value="Normal" class="mr-1">Normal
													<input type="radio" name="pf_hidung" id="pf_hidung_ya" value="Abnormal" class="mr-1 ml-2">Abnormal
													<input type="text" name="ket_pf_hidung" id="ket_pf_hidung" class="custom-form clear-input col-lg-6 d-inline-block ml-4" placeholder="Keterangan">
												</td>
											</tr>
											<tr>
												<td class="bold">Gigi dan Mulut</td>
												<td class="bold">:</td>
												<td>
													<input type="radio" name="pf_gigi_mulut" id="pf_gigi_mulut_tidak" value="Normal" class="mr-1">Normal
													<input type="radio" name="pf_gigi_mulut" id="pf_gigi_mulut_ya" value="Abnormal" class="mr-1 ml-2">Abnormal
													<input type="text" name="ket_pf_gigi_mulut" id="ket_pf_gigi_mulut" class="custom-form clear-input col-lg-6 d-inline-block ml-4" placeholder="Keterangan">
												</td>
											</tr>
											<tr>
												<td class="bold">Tenggorokan</td>
												<td class="bold">:</td>
												<td>
													<input type="radio" name="pf_tenggorokan" id="pf_tenggorokan_tidak" value="Normal" class="mr-1">Normal
													<input type="radio" name="pf_tenggorokan" id="pf_tenggorokan_ya" value="Abnormal" class="mr-1 ml-2">Abnormal
													<input type="text" name="ket_pf_tenggorokan" id="ket_pf_tenggorokan" class="custom-form clear-input col-lg-6 d-inline-block ml-4" placeholder="Keterangan">
												</td>
											</tr>
											<tr>
												<td class="bold">Telinga</td>
												<td class="bold">:</td>
												<td>
													<input type="radio" name="pf_telinga" id="pf_telinga_tidak" value="Normal" class="mr-1">Normal
													<input type="radio" name="pf_telinga" id="pf_telinga_ya" value="Abnormal" class="mr-1 ml-2">Abnormal
													<input type="text" name="ket_pf_telinga" id="ket_pf_telinga" class="custom-form clear-input col-lg-6 d-inline-block ml-4" placeholder="Keterangan">
												</td>
											</tr>
											<tr>
												<td class="bold">Leher</td>
												<td class="bold">:</td>
												<td>
													<input type="radio" name="pf_leher" id="pf_leher_tidak" value="Normal" class="mr-1">Normal
													<input type="radio" name="pf_leher" id="pf_leher_ya" value="Abnormal" class="mr-1 ml-2">Abnormal
													<input type="text" name="ket_pf_leher" id="ket_pf_leher" class="custom-form clear-input col-lg-6 d-inline-block ml-4" placeholder="Keterangan">
												</td>
											</tr>
											<tr>
												<td class="bold">Thorax</td>
												<td class="bold">:</td>
												<td>
													<input type="radio" name="pf_thorax" id="pf_thorax_tidak" value="Normal" class="mr-1">Normal
													<input type="radio" name="pf_thorax" id="pf_thorax_ya" value="Abnormal" class="mr-1 ml-2">Abnormal
													<input type="text" name="ket_pf_thorax" id="ket_pf_thorax" class="custom-form clear-input col-lg-6 d-inline-block ml-4" placeholder="Keterangan">
												</td>
											</tr>
											<tr>
												<td class="bold">Jantung</td>
												<td class="bold">:</td>
												<td>
													<input type="radio" name="pf_jantung" id="pf_jantung_tidak" value="Normal" class="mr-1">Normal
													<input type="radio" name="pf_jantung" id="pf_jantung_ya" value="Abnormal" class="mr-1 ml-2">Abnormal
													<input type="text" name="ket_pf_jantung" id="ket_pf_jantung" class="custom-form clear-input col-lg-6 d-inline-block ml-4" placeholder="Keterangan">
												</td>
											</tr>
											<tr>
												<td class="bold">Paru</td>
												<td class="bold">:</td>
												<td>
													<input type="radio" name="pf_paru" id="pf_paru_tidak" value="Normal" class="mr-1">Normal
													<input type="radio" name="pf_paru" id="pf_paru_ya" value="Abnormal" class="mr-1 ml-2">Abnormal
													<input type="text" name="ket_pf_paru" id="ket_pf_paru" class="custom-form clear-input col-lg-6 d-inline-block ml-4" placeholder="Keterangan">
												</td>
											</tr>
											<tr>
												<td class="bold">Abdomen</td>
												<td class="bold">:</td>
												<td>
													<input type="radio" name="pf_abdomen" id="pf_abdomen_tidak" value="Normal" class="mr-1">Normal
													<input type="radio" name="pf_abdomen" id="pf_abdomen_ya" value="Abnormal" class="mr-1 ml-2">Abnormal
													<input type="text" name="ket_pf_abdomen" id="ket_pf_abdomen" class="custom-form clear-input col-lg-6 d-inline-block ml-4" placeholder="Keterangan">
												</td>
											</tr>
											<tr>
												<td class="bold">Genitalia</td>
												<td class="bold">:</td>
												<td>
													<input type="radio" name="pf_genitalia" id="pf_genitalia_tidak" value="Normal" class="mr-1">Normal
													<input type="radio" name="pf_genitalia" id="pf_genitalia_ya" value="Abnormal" class="mr-1 ml-2">Abnormal
													<input type="text" name="ket_pf_genitalia" id="ket_pf_genitalia" class="custom-form clear-input col-lg-6 d-inline-block ml-4" placeholder="Keterangan">
												</td>
											</tr>
											<tr>
												<td class="bold">Ekstermitas</td>
												<td class="bold">:</td>
												<td>
													<input type="radio" name="pf_ekstermitas" id="pf_ekstermitas_tidak" value="Normal" class="mr-1">Normal
													<input type="radio" name="pf_ekstermitas" id="pf_ekstermitas_ya" value="Abnormal" class="mr-1 ml-2">Abnormal
													<input type="text" name="ket_pf_ekstermitas" id="ket_pf_ekstermitas" class="custom-form clear-input col-lg-6 d-inline-block ml-4" placeholder="Keterangan">
												</td>
											</tr>
											<tr>
												<td class="bold">Kulit</td>
												<td class="bold">:</td>
												<td>
													<input type="radio" name="pf_kulit" id="pf_kulit_tidak" value="Normal" class="mr-1">Normal
													<input type="radio" name="pf_kulit" id="pf_kulit_ya" value="Abnormal" class="mr-1 ml-2">Abnormal
													<input type="text" name="ket_pf_kulit" id="ket_pf_kulit" class="custom-form clear-input col-lg-6 d-inline-block ml-4" placeholder="Keterangan">
												</td>
											</tr>
											<tr>
												<td colspan="3" class="bold td-dark">HASIL PEMERIKSAAN PENUNJANG</td>
											</tr>
											<tr>
												<td class="bold">Laboratorium</td>
												<td class="bold">:</td>
												<td><div id="hasil_laboratorium"></div></td>
											</tr>
											<tr>
												<td class="bold">Radiologi</td>
												<td class="bold">:</td>
												<td><div id="hasil_radiologi"></div></td>
											</tr>
											<tr>
												<td class="bold">Penunjang Lain</td>
												<td class="bold">:</td>
												<td><div id="hasil_penunjang_lain"></div></td>
											</tr>
											<tr>
												<td colspan="3" class="bold td-dark">DIAGNOSA AWAL</td>
											</tr>
											<tr>
												<td colspan="3"><div id="diagnosa_awal_medis"></div></td>
											</tr>
											<tr>
												<td colspan="3" class="bold td-dark">TATA LAKSANA</td>
											</tr>
											<tr>
												<td class="bold">1. Rencana Edukasi</td>
												<td class="bold">:</td>
												<td>
													<textarea name="rencana_edukasi_medis" id="rencana_edukasi_medis" rows="4" class="form-control clear-input" placeholder="Rencana Edukasi"></textarea>
												</td>
											</tr>
											<tr>
												<td class="bold">2. Rencana Pemeriksaan Penunjang</td>
												<td class="bold">:</td>
												<td>
													<textarea name="rencana_pemeriksaan_penunjang" id="rencana_pemeriksaan_penunjang" rows="4" class="form-control clear-input" placeholder="Rencana Pemeriksaan Penunjang"></textarea>
												</td>
											</tr>
											<tr>
												<td class="bold">3. Rencana Terapi</td>
												<td class="bold">:</td>
												<td>
													<textarea name="rencana_terapi" id="rencana_terapi" rows="4" class="form-control clear-input" placeholder="Rencana Terapi"></textarea>
												</td>
											</tr>
											<tr>
												<td class="bold">4. Rencana Konsultasi</td>
												<td class="bold">:</td>
												<td>
													<textarea name="rencana_konsultasi" id="rencana_konsultasi" rows="4" class="form-control clear-input" placeholder="Rencana Konsultasi"></textarea>
												</td>
											</tr>
											<tr>
												<td class="bold">5. Rencana Pulang <i><small>Discharge Planning</small></i></td>
												<td class="bold">:</td>
												<td>
													<b>Perkiraan Lama Rawat : </b><input type="text" name="perkiraan_lama_rawat" id="perkiraan_lama_rawat" class="custom-form col-lg-4 d-inline-block">
													<b class="ml-5">Sudah Bisa Ditetapkan : </b><input type="text" name="ditetapkan_berapa_hari" id="ditetapkan_berapa_hari" class="custom-form col-lg-2 d-inline-block">&nbsp;Hari
												</td>
											</tr>
											<tr>
												<td class="bold"></td>
												<td class="bold"></td>
												<td>
													<b>Belum Bisa Ditetapkan Karena : </b><input type="text" name="alasan_belum_ditetapkan" id="alasan_belum_ditetapkan" class="custom-form col-lg-4 d-inline-block">
													<b class="ml-5">Rencana Tanggal Pulang : </b><input type="text" name="tanggal_rencana_pulang" id="tanggal_rencana_pulang" class="custom-form col-lg-2 d-inline-block">
												</td>
											</tr>
										</table>
										<table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
											<tr>
												<td colspan="2" class="center td-dark"></td>
											</tr>
											<tr>
												<td width="50%">
													Tanggal & Jam <input type="text" name="tanggal_ttd_dokter_dpjp" id="tanggal_ttd_dokter_dpjp" class="custom-form clear-input d-inline-block col-lg-5 ml-2" placeholder="dd/mm/yyyy hh:ii">
												</td>
												<td width="50%">
													Tanggal & Jam <input type="text" name="tanggal_ttd_dokter_pengkajian" id="tanggal_ttd_dokter_pengkajian" class="custom-form clear-input d-inline-block col-lg-5 ml-2" placeholder="dd/mm/yyyy hh:ii">
												</td>
											</tr>
											<tr>
												<td>DPJP <input type="text" name="dokter_dpjp" id="dokter_dpjp" class="select2c-input ml-2"></td>
												<td>Dokter Pengkajian <input type="text" name="dokter_pengkajian" id="dokter_pengkajian" class="select2c-input ml-2"></td>
											</tr>
											<tr>
												<td class="center">
													Tanda Tangan DPJP	
												</td>
												<td class="center">
													Tanda Tangan Dokter Yang Melakukan Pengkajian
												</td>
											</tr>
											<tr>
												<td>
													<div class="center">
														<input type="checkbox" name="ttd_dokter_dpjp" id="ttd_dokter_dpjp" value="1" class="custom-form col-lg-1 mx-auto">
														<?= digitalSignature('ttd_dokter_dpjp_verified') ?>
													</div>
												</td>
												<td>
													<div class="center">
														<input type="checkbox" name="ttd_dokter_pengkajian" id="ttd_dokter_pengkajian" value="1" class="custom-form col-lg-1 mx-auto">
														<?= digitalSignature('ttd_dokter_pengkajian_verified') ?>
													</div>
												</td>
											</tr>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
				<?= form_close() ?>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-fw fa-times-circle mr-1"></i>Keluar</button>
				<button type="button" class="btn btn-info" onclick="konfirmasiSimpanPengkajianAwal()" id="btn-simpan"><i class="fas fa-fw fa-save mr-1"></i>Konfirmasi</button>
			</div>
		</div>
	</div>
</div>
<!-- End Modal -->

<!-- Modal Log History -->
<div class="modal fade" id="modal_history_logs_ranap" tabindex="-1">
	<div class="modal-dialog" style="max-width:90%">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">History Logs Pengkajian Awal Pasien Rawat Inap</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-lg-12">
						<h6><b>Kajian Medis <i>(Dokter)</i></b></h6>
						<div class="table-responsive">
							<table class="table table-striped table-sm table-hover color-table info-table" id="table_kajian_medis_ranap">
								<thead>
									<tr>
										<th class="nowrap">No.</th>
										<th class="nowrap">Tgl Ubah</th>
										<th class="nowrap">User</th>
										<th class="nowrap">Keluhan Utama</th>
										<th class="nowrap">Riwayat Penyakit Sekarang</th>
										<th class="nowrap">Riwayat Penyakit Terdahulu</th>
										<th class="nowrap">Pengobatan</th>
										<th class="nowrap">Riwayat Pekerjaan</th>
										<th class="nowrap">Hasil Lab</th>
										<th class="nowrap">Hasil Rad</th>
										<th class="nowrap">Hasil Pen. Lain</th>
										<th class="nowrap">Diagnosa Awal</th>
										<th class="nowrap">Rencana Edukasi</th>
										<th class="nowrap">Rencana Pemeriksaan Penunjang</th>
										<th class="nowrap">Rencana Terapi</th>
										<th class="nowrap">Rencana Konsultasi</th>
									</tr>
								</thead>
								<tbody></tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times-circle mr-1"></i>Keluar</button>
			</div>
		</div>
	</div>
</div>
<!-- End Modal Log History -->
