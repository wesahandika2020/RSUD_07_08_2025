<?php $this->load->view('asuhan_keperawatan/js') ?>
<!-- Modal -->
<div class="modal fade" id="modal-asuhan-keperawatan" data-backdrop="static">
	<div class="modal-dialog" style="max-width:85%">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="modal-asuhan-keperawatan-label">Fom Asuhan Keperawatan Pasien Hemodialisa</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<?php echo form_open('', 'id=form-asuhan-keperawatan class=form-horizontal') ?>
				<input type="hidden" name="id_pendaftaran" id="id-pendaftaran">
				<input type="hidden" name="id_asuhan_keperawatan" id="id-asuhan-keperawatan">
				<div class="row">
					<div class="col-lg-6">
						<table class="table table-striped table-hover table-sm">
							<tbody>
								<tr>
									<td width="30%">Tanggal/Jam</td>
									<td width="1%">:</td>
									<td width="69%"><input type="text" name="waktu_asuhan" id="waktu-asuhan" class="custom-form col-lg-5" value="<?php echo date('d/m/Y H:i') ?>"></td>
								</tr>
								<tr>
									<td>No. Mesin</td>
									<td>:</td>
									<td><input type="number" name="no_mesin" id="no-mesin" min="1" class="custom-form col-lg-6 clear-input" placeholder="No. Mesin"></td>
								</tr>
								<tr>
									<td>Diagnosa Medis</td>
									<td>:</td>
									<td><input type="text" name="dx_medis" id="dx-medis" class="custom-form col-lg clear-input" placeholder="Diagnosa Medis"></td>
								</tr>
								<tr>
									<td>Hemodialisa ke</td>
									<td>:</td>
									<td><input type="text" name="hemodialisa_ke" id="hemodialisa-ke" class="custom-form col-lg-4 clear-input" placeholder="Hemodialisa ke"></td>
								</tr>
							</tbody>
						</table>
					</div>
					<div class="col-lg-6">
						<table class="table table-striped table-hover table-sm">
							<tbody>
								<tr>
									<td width="30%">No. RM</td>
									<td width="1%">:</td>
									<td width="69%"><b><span id="pasien-no-rm"></span></b></td>
								</tr>
								<tr>
									<td>Nama Pasien</td>
									<td>:</td>
									<td><b><span id="pasien-nama"></span></b></td>
								</tr>
								<tr>
									<td width="30%">NIK</td>
									<td width="1%">:</td>
									<td width="69%"><b><span id="pasien-nik"></span></b></td>
								</tr>
								<tr>
									<td>Tanggal Lahir</td>
									<td>:</td>
									<td><b><span id="pasien-tanggal-lahir"></span></b></td>
								</tr>
								<tr>
									<td>Agama</td>
									<td>:</td>
									<td><b><span id="pasien-agama"></span></b></td>
								</tr>
								<tr>
									<td>No. Telepon</td>
									<td>:</td>
									<td><b><span id="pasien-telp"></span></b></td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
				<!-- Form -->
				<nav>
					<div class="nav nav-tabs" id="nav-tab" role="tablist">
						<a class="nav-item nav-link active" data-toggle="tab" id="tab-1" href="#tab1" role="tab">Pengkajian Keperawatan</a>
						<a class="nav-item nav-link" data-toggle="tab" id="tab-2" href="#tab2" role="tab">Diagnosa dan Intervensi Keperawatan</a>
						<a class="nav-item nav-link" data-toggle="tab" id="tab-3" href="#tab3" role="tab">Tindakan dan Evaluasi Keperawatan</a>
					</div>
				</nav>
				<div class="tab-content" id="nav-tabContent">
					<div class="tab-pane fade show active" id="tab1" role="tabpanel">
						<div class="row mt-2" style="font-size: 12px">
							<div class="col-lg-12">
								<div class="box-well" style="overflow-y: auto; height: 400px;">
									<!-- content pengkajian keperawatan -->
									<button class="btn btn-info btn-xs" type="button" data-toggle="collapse" data-target="#pengkajian-keperawatan"><i class="fas fa-expand mr-1"></i>Pengkajian Keperawatan</button><hr>
									<div class="collapse multi-collapse show mt-2" id="pengkajian-keperawatan">
										<div class="form-group row tight">
											<label class="col-lg-3 label-custom-form right">Keluhan Utama :</label>
											<div class="col-lg-9">
												<input type="checkbox" name="ku_sesak_nafas" id="ku-sesak-nafas" class="mr-1" value="1">Sesak Nafas
												<input type="checkbox" name="ku_mual" id="ku-mual" class="mr-1 ml-2" value="1">Mual
												<input type="checkbox" name="ku_muntah" id="ku-muntah" class="mr-1 ml-2" value="1">Muntah
												<input type="checkbox" name="ku_gatal" id="ku-gatal" class="mr-1 ml-2" value="1">Gatal
												<input type="checkbox" name="ku_lain_lain" id="ku-lain-lain" class="mr-1 ml-2" value="1">Lain - lain
												<input type="text" name="ku_lain_lain_input" id="ku-lain-lain-input" class="custom-form col-lg-4 clear-input ml-2" placeholder="Masukkan Lain - lain">
											</div>
										</div>
										<div class="form-group row tight">
											<label class="col-lg-3 label-custom-form right">Riwayat Penyakit Sekarang :</label>
											<div class="col-lg-9">
												<input type="text" name="penyakit_sekarang" id="penyakit-sekarang" class="custom-form col-lg-4 clear-input" placeholder="Masukkan Riwayat Penyakit Sekarang">
											</div>
										</div>
										<div class="form-group row tight">
											<label class="col-lg-3 label-custom-form right">Riwayat Penyakit Dahulu :</label>
											<div class="col-lg-9">
												<input type="checkbox" name="rpd_asma" id="rpd-asma" class="mr-1" value="1">Asma
												<input type="checkbox" name="rpd_hipertensi" id="rpd-hipertensi" class="mr-1 ml-2" value="1">Hipertensi
												<input type="checkbox" name="rpd_jantung" id="rpd-jantung" class="mr-1 ml-2" value="1">Jantung
												<input type="checkbox" name="rpd_diabetes" id="rpd-diabetes" class="mr-1 ml-2" value="1">Diabetes
												<input type="checkbox" name="rpd_lain_lain" id="rpd-lain-lain" class="mr-1 ml-2" value="1">Lain - lain
												<input type="text" name="rpd_lain_lain_input" id="rpd-lain-lain-input" class="custom-form col-lg-4 clear-input ml-2" placeholder="Masukkan Lain - lain">
											</div>
										</div>
										<div class="form-group row tight">
											<label class="col-lg-3 label-custom-form right">Riwayat Penyakit Keluarga :</label>
											<div class="col-lg-9">
												<input type="checkbox" name="rpk_asma" id="rpk-asma" class="mr-1" value="1">Asma
												<input type="checkbox" name="rpk_hipertensi" id="rpk-hipertensi" class="mr-1 ml-2" value="1">Hipertensi
												<input type="checkbox" name="rpk_jantung" id="rpk-jantung" class="mr-1 ml-2" value="1">Jantung
												<input type="checkbox" name="rpk_diabetes" id="rpk-diabetes" class="mr-1 ml-2" value="1">Diabetes
												<input type="checkbox" name="rpk_lain_lain" id="rpk-lain-lain" class="mr-1 ml-2" value="1">Lain - lain
												<input type="text" name="rpk_lain_lain_input" id="rpk-lain-lain-input" class="custom-form col-lg-4 clear-input ml-2" placeholder="Masukkan Lain - lain">
											</div>
										</div>
										<div class="form-group row tight">
											<label class="col-lg-3 label-custom-form right">Kebiasaan :</label>
											<div class="col-lg-9">
												<label class="col-lg-2 pl-0">Merokok</label>
												<input type="radio" name="kebiasaan_merokok" id="kebiasaan-merokok-tidak" class="mr-1" value="0" checked="checked">Tidak
												<input type="radio" name="kebiasaan_merokok" id="kebiasaan-merokok-ya" class="mr-1 ml-2" value="1">Ya
												<input type="text" name="kebiasaan_merokok_ya_lain_lain" id="kebiasaan-merokok-ya-lain-lain" class="custom-form col-lg-4 clear-input mr-1 ml-2" placeholder="Batang/Hari">
											</div>
										</div>
										<div class="form-group row tight">
											<label class="col-lg-3 label-custom-form right"></label>
											<div class="col-lg-9">
												<label class="col-lg-2 pl-0">Obat Tidur/Narkoba</label>
												<input type="radio" name="kebiasaan_narkoba" id="kebiasaan-narkoba-tidak" class="mr-1" value="0" checked="checked">Tidak
												<input type="radio" name="kebiasaan_narkoba" id="kebiasaan-narkoba-ya" class="mr-1 ml-2" value="1">Ya
												<input type="text" name="kebiasaan_narkoba_ya_lain_lain" id="kebiasaan-narkoba-ya-lain-lain" class="custom-form col-lg-4 clear-input mr-1 ml-2" placeholder="">
											</div>
										</div>
										<div class="form-group row tight">
											<label class="col-lg-3 label-custom-form right"></label>
											<div class="col-lg-9">
												<label class="col-lg-2 pl-0">Alkohol</label>
												<input type="radio" name="kebiasaan_alkohol" id="kebiasaan-alkohol-tidak" class="mr-1" value="0" checked="checked">Tidak
												<input type="radio" name="kebiasaan_alkohol" id="kebiasaan-alkohol-ya" class="mr-1 ml-2" value="1">Ya
												<input type="text" name="kebiasaan_alkohol_ya_lain_lain" id="kebiasaan-alkohol-ya-lain-lain" class="custom-form col-lg-4 clear-input mr-1 ml-2" placeholder="Gelas/Hari">
											</div>
										</div>
										<div class="form-group row tight">
											<label class="col-lg-3 label-custom-form right">Alergi :</label>
											<div class="col-lg-9">
												<input type="radio" name="alergi" id="alergi-tidak" class="mr-1" value="Tidak" checked="checked">Tidak
												<input type="radio" name="alergi" id="alergi-tidak-tahu" class="mr-1 ml-2" value="Tidak Tahu">Tidak Tahu
												<input type="radio" name="alergi" id="alergi-ya" class="mr-1 ml-2" value="Ya">Ya
												<input type="text" name="alergi_ya_lain_lain" id="alergi-ya-lain-lain" class="custom-form col-lg-4 clear-input ml-2" placeholder="Sebutkan">
											</div>
										</div>
									</div>
									<hr>
			
									<!-- content riwayat psikososial -->
									<button class="btn btn-info btn-xs" type="button" data-toggle="collapse" data-target="#riwayat-psikososial"><i class="fas fa-expand mr-1"></i>Riwayat Psikososial</button><hr>
									<div class="collapse multi-collapse show mt-2" id="riwayat-psikososial">
										<div class="form-group row tight">
											<label class="col-lg-3 label-custom-form right">Hubungan pasien dengan keluarga :</label>
											<div class="col-lg-9">
												<input type="radio" name="hubungan_keluarga" id="hubungan-keluarga-baik" class="mr-1" value="Baik" checked="checked">Baik
												<input type="radio" name="hubungan_keluarga" id="hubungan-keluarga-tidak" class="mr-1 ml-2" value="Tidak Baik">Tidak Baik
											</div>
										</div>
										<div class="form-group row tight">
											<label class="col-lg-3 label-custom-form right">Status Psikologis :</label>
											<div class="col-lg-9">
												<input type="checkbox" name="sp_tenang" id="sp-tenang" class="mr-1" value="1">Tenang
												<input type="checkbox" name="sp_cemas" id="sp-cemas" class="mr-1 ml-2" value="1">Cemas
												<input type="checkbox" name="sp_takut" id="sp-takut" class="mr-1 ml-2" value="1">Takut
												<input type="checkbox" name="sp_marah" id="sp-marah" class="mr-1 ml-2" value="1">Marah
												<input type="checkbox" name="sp_sedih" id="sp-sedih" class="mr-1 ml-2" value="1">Sedih
												<input type="checkbox" name="sp_bunuh_diri" id="sp-bunuh-diri" class="mr-1 ml-2" value="1">Kecenderungan Bunuh Diri
												<input type="checkbox" name="sp_lain_lain" id="sp-lain-lain" class="mr-1 ml-2" value="1">Lain - lain
												<input type="text" name="sp_lain_lain_input" id="sp-lain-lain-input" class="custom-form col-lg-3 clear-input ml-2" placeholder="Sebutkan">
											</div>
										</div>
									</div>
									<hr>
			
									<!-- content pengkajian spriritual -->
									<button class="btn btn-info btn-xs" type="button" data-toggle="collapse" data-target="#pengkajian-spiritual"><i class="fas fa-expand mr-1"></i>Pengkajian Spiritual</button><hr>
									<div class="collapse multi-collapse show mt-2" id="pengkajian-spiritual">
										<div class="form-group row tight">
											<label class="col-lg-4 label-custom-form right">Kegiatan keagamaan yang biasa dilakukan :</label>
											<div class="col-lg-8">
												<input type="text" name="kebiasaan_keagamaan" id="kebiasaan-keagamaan" class="custom-form col-lg-4 clear-input" placeholder="Masukkan Kebiasaan Keagamaan">
											</div>
										</div>
										<div class="form-group row tight">
											<label class="col-lg-4 label-custom-form right">Kemampuan Beribadah (Khusus Muslim)</label>
											<div class="col-lg-8"></div>
										</div>
										<div class="form-group row tight">
											<label class="col-lg-3 label-custom-form right">Wajib Ibadah :</label>
											<div class="col-lg-9">
												<input type="radio" name="wajib_ibadah" id="baligh" class="mr-1" value="Baligh" checked="checked">Baligh
												<input type="radio" name="wajib_ibadah" id="belum-baligh" class="mr-1 ml-2" value="Belum Baligh">Belum Baligh
												<input type="radio" name="wajib_ibadah" id="halangan-lain" class="mr-1 ml-2" value="Halangan Lain">Halangan Lain
												<input type="text" name="halangan_lain_input" id="halangan-lain-input" class="custom-form col-lg-3 clear-input ml-2" placeholder="Sebutkan">
											</div>
										</div>
										<div class="form-group row tight">
											<label class="col-lg-3 label-custom-form right">Thaharoh :</label>
											<div class="col-lg-9">
												<input type="radio" name="thaharoh" id="berwudhu" class="mr-1" value="Berwudhu" checked="checked">Berwudhu
												<input type="radio" name="thaharoh" id="tayamum" class="mr-1 ml-2" value="Tayamum">Tayamum
											</div>
										</div>
										<div class="form-group row tight">
											<label class="col-lg-3 label-custom-form right">Shalat :</label>
											<div class="col-lg-9">
												<input type="radio" name="shalat" id="berdiri" class="mr-1" value="Berdiri" checked="checked">Berdiri
												<input type="radio" name="shalat" id="duduk" class="mr-1 ml-2" value="Duduk">Duduk
												<input type="radio" name="shalat" id="berbaring" class="mr-1 ml-2" value="Berbaring">Berbaring
											</div>
										</div>
									</div>
									<hr>

									<!-- content pemeriksaan fisik -->
									<button class="btn btn-info btn-xs" type="button" data-toggle="collapse" data-target="#pemeriksaan-fisik"><i class="fas fa-expand mr-1"></i>Pemeriksaan Fisik</button><hr>
									<div class="collapse multi-collapse show mt-2" id="pemeriksaan-fisik">
										<div class="form-group row tight">
											<label class="col-lg-3 label-custom-form right">Kesadaran :</label>
											<div class="col-lg-9">
												<input type="checkbox" name="composmentis" id="composmentis" class="mr-1" value="1">Composmentis
												<input type="checkbox" name="apatis" id="apatis" class="mr-1 ml-2" value="1">Apatis
												<input type="checkbox" name="delirium" id="delirium" class="mr-1 ml-2" value="1">Delirium
												<input type="checkbox" name="samnolen" id="samnolen" class="mr-1 ml-2" value="1">Samnolen
												<input type="checkbox" name="sopor" id="sopor" class="mr-1 ml-2" value="1">Sopor
												<input type="checkbox" name="coma" id="coma" class="mr-1 ml-2" value="1">Coma
												<input type="checkbox" name="kesadaran_lain" id="kesadaran-lain" class="mr-1 ml-2" value="1">Kesadaran Lain
												<input type="text" name="kesadaran_lain_input" id="kesadaran-lain-input" class="custom-form col-lg-3 clear-input ml-2" placeholder="Sebutkan">
											</div>
										</div>
										<div class="form-group row tight">
											<label class="col-lg-3 label-custom-form right">Tensi Darah :</label>
											<div class="col-lg-3">
												<div class="input-group">
													<input type="text" name="pf_td_sistolik" id="pf-td-sistolik" class="custom-form col-lg clear-input" placeholder="Sistolik">/
													<input type="text" name="pf_td_diastolik" id="pf-td-diastolik" class="custom-form col-lg clear-input" placeholder="Diastolik">
													<div class="input-group-append">
														<span class="input-group-custom">mmHg</span>
													</div>
												</div>
											</div>
											<label class="col-lg-1 label-custom-form right">Nadi :</label>
											<div class="col-lg-3">
												<div class="input-group">
													<input type="text" name="pf_nadi" id="pf-nadi" class="custom-form col-lg clear-input" placeholder="Nadi">
													<div class="input-group-append">
														<span class="input-group-custom">x/menit</span>
													</div>
												</div>
											</div>
										</div>
										<div class="form-group row tight">
											<label class="col-lg-3 label-custom-form right">Pernafasan :</label>
											<div class="col-lg-3">
												<div class="input-group">
													<input type="text" name="pf_pernafasan" id="pf-pernafasan" class="custom-form col-lg clear-input" placeholder="Pernafasan">
													<div class="input-group-append">
														<span class="input-group-custom">x/menit</span>
													</div>
												</div>
											</div>
											<label class="col-lg-1 label-custom-form right">Suhu :</label>
											<div class="col-lg-3">
												<div class="input-group">
													<input type="text" name="pf_suhu" id="pf-suhu" class="custom-form col-lg clear-input" placeholder="Suhu">
													<div class="input-group-append">
														<span class="input-group-custom">&#8451;</span>
													</div>
												</div>
											</div>
										</div>
										<div class="form-group row tight">
											<label class="col-lg-3 label-custom-form right">Konjung tiva :</label>
											<div class="col-lg-9">
												<input type="radio" name="konjungtiva" id="konjungtiva-ya" class="mr-1" value="1">Anemis
												<input type="radio" name="konjungtiva" id="konjungtiva-tidak" class="mr-1 ml-2" value="0" checked="checked">Tidak Anemis
											</div>
										</div>
										<div class="form-group row tight">
											<label class="col-lg-3 label-custom-form right">Ekstermitas :</label>
											<div class="col-lg-9">
												<input type="checkbox" name="tidak_edema" id="tidak-edema" class="mr-1" value="1">Tidak edema/tidak dehidrasi
												<input type="checkbox" name="dehidrasi" id="dehidrasi" class="mr-1 ml-2" value="1">Dehidrasi
												<input type="checkbox" name="edema" id="edema" class="mr-1 ml-2" value="1">Edema
												<input type="checkbox" name="edema_anasarka" id="edema-anasarka" class="mr-1 ml-2" value="1">Edema Anasarka
												<input type="checkbox" name="pucat_dingin" id="pucat-dingin" class="mr-1 ml-2" value="1">Pucat Dingin
											</div>
										</div>
										<div class="form-group row tight">
											<label class="col-lg-3 label-custom-form right">Berat Badan :</label>
											<div class="col-lg-2">
												<div class="input-group">
													<span class="mr-1">Pre HD</span><input type="text" name="bb_pre_hd" id="bb-pre-hd" class="custom-form col-lg clear-input" placeholder="">
													<div class="input-group-append">
														<span class="input-group-custom">Kg</span>
													</div>
												</div>
											</div>
											<div class="col-lg-2">
												<div class="input-group">
													<span class="mr-1">BBK</span><input type="text" name="bb_bbk" id="bb-bbk" class="custom-form col-lg clear-input" placeholder="">
													<div class="input-group-append">
														<span class="input-group-custom">Kg</span>
													</div>
												</div>
											</div>
											<div class="col-lg-3">
												<div class="input-group">
													<span class="mr-1">Post HD yang lalu</span><input type="text" name="bb_post_hd_lalu" id="bb-post-hd-lalu" class="custom-form col-lg clear-input" placeholder="">
													<div class="input-group-append">
														<span class="input-group-custom">Kg</span>
													</div>
												</div>
											</div>
											<div class="col-lg-2">
												<div class="input-group">
													<span class="mr-1">BB Post HD</span><input type="text" name="bb_post_hd" id="bb-post-hd" class="custom-form col-lg clear-input" placeholder="">
													<div class="input-group-append">
														<span class="input-group-custom">Kg</span>
													</div>
												</div>
											</div>
										</div>
										<div class="form-group row tight">
											<label class="col-lg-3 label-custom-form right">Akses Vaskuler :</label>
											<div class="col-lg-5">
												<input type="checkbox" name="av_fistula" id="av-fistula" class="mr-1" value="1">AV-Fistula
												<input type="checkbox" name="hd_kateter" id="hd-kateter" class="mr-1 ml-2" value="1">HD Kateter
												<input type="checkbox" name="subciavia" id="subciavia" class="mr-1 ml-2" value="1">Subciavia
												<input type="checkbox" name="jugular" id="jugular" class="mr-1 ml-2" value="1">Jugular
												<input type="checkbox" name="femoral" id="femoral" class="mr-1 ml-2" value="1">Femoral
											</div>
											<label class="col-lg-1 label-custom-form right">Lokasi :</label>
											<div class="col-lg">
												<input type="checkbox" name="lokasi_kanan" id="lokasi-kanan" class="mr-1" value="1">Kanan
												<input type="checkbox" name="lokasi_kiri" id="lokasi-kiri" class="mr-1" value="1">Kiri
											</div>
										</div>
									</div>
									<hr>

									<div class="row">
										<!-- content penialian tingkat nyeri -->
										<div class="col-lg-6">
											<button class="btn btn-info btn-xs" type="button" data-toggle="collapse" data-target="#penilaian-tingkat-nyeri"><i class="fas fa-expand mr-1"></i>Penilaian Tingkat Nyeri</button><hr>
											<div class="collapse multi-collapse show mt-2" id="penilaian-tingkat-nyeri">
												<div class="form-group row tight">
													<div class="col-lg-12 mb-3">
														<img src="<?= resource_url() ?>images/attributes/pain-measurement-scale.jpg" alt="Pain Measurement Scale" class="img-fluid mx-auto d-block rounded shadow">
													</div>
												</div>
												<div class="form-group row tight">
													<label class="col-lg-4 label-custom-form right">Penilaian Tingkat Nyeri :</label>
													<div class="col-lg-8">
														<!-- PTN = Penilaian Tingkat Nyeri -->
														<input type="radio" name="measurement_scale" id="measurement-scale-tidak" class="mr-1" value="Tidak Nyeri" checked="checked">Tidak Nyeri
														<input type="radio" name="measurement_scale" id="measurement-scale-kronis" class="mr-1 ml-2" value="Nyeri Kronis">Nyeri Kronis
														<input type="radio" name="measurement_scale" id="measurement-scale-akut" class="mr-1 ml-2" value="Nyeri Akut">Nyeri Akut
													</div>
												</div>
												<div class="form-group row tight">
													<label class="col-lg-4 label-custom-form right">Skala Nyeri :</label>
													<div class="col-lg-3">
														<input type="text" name="skala_nyeri" id="skala-nyeri" class="custom-form col-lg clear-input" placeholder="Skala Nyeri">
													</div>
													<label class="col-lg-2 label-custom-form right">Lokasi :</label>
													<div class="col-lg-3">
														<input type="text" name="skala_nyeri_lokasi" id="skala-nyeri-lokasi" class="custom-form col-lg clear-input" placeholder="Lokasi">
													</div>
												</div>
												<div class="form-group row tight">
													<label class="col-lg-4 label-custom-form right">Keterangan :</label>
													<div class="col-lg-8">
														<input type="radio" name="ket_tingkat_nyeri" id="ket-tingkat-myeri-ringan" class="mr-1" value="1" checked="checked">Ringan : 0 - 3
														<input type="radio" name="ket_tingkat_nyeri" id="ket-tingkat-myeri-sedang" class="mr-1 ml-2" value="2">Sedang : 4 - 6
														<input type="radio" name="ket_tingkat_nyeri" id="ket-tingkat-myeri-berat" class="mr-1 ml-2" value="3">Berat : 7 - 10
													</div>
												</div>
											</div>
										</div>
										<div class="col-lg-6">
											<button class="btn btn-info btn-xs" type="button" data-toggle="collapse" data-target="#skrining-nutrisi"><i class="fas fa-expand mr-1"></i>Skrining Nutrisi (Mainutrition Screening Tool Modifikasi)</button><hr>
											<div class="collapse multi-collapse show mt-2" id="skrining-nutrisi">
												<table width="100%" style="border-collapse: collapse; border: 0;">
													<tr>
														<td colspan="2">Apakah pasien mengalami penurunan berat badan yang tidak direncanakan / tidak disengaja dalam 6 bulan terakhir</td>
													</tr>
													<tr>
														<td width="90%"><input type="radio" name="sn_penurunan_bb" id="sn-tidak" class="mr-1" value="1" onchange="calcscore()" checked="checked">Tidak</td>
														<td>Skor 0</td>
													</tr>
													<tr>
														<td><input type="radio" name="sn_penurunan_bb" id="sn-tidak-yakin" class="mr-1" value="2" onchange="calcscore()">Tidak Yakin</td>
														<td>Skor 2</td>
													</tr>
													<tr>
														<td><input type="radio" name="sn_penurunan_bb" id="sn-ya" class="mr-1" value="3" onchange="calcscore()">Ya, ada penurunan BB sebanyak</td>
														<td></td>
													</tr>
													<tr class="sn-penurunan-bb-area">
														<td style="padding-left: 20px;"><input type="radio" name="sn_penurunan_bb_on" id="sn-pbb-1" class="mr-1" value="1" onchange="calcscore()">1 - 5 Kg</td>
														<td>Skor 1</td>
													</tr>
													<tr class="sn-penurunan-bb-area">
														<td style="padding-left: 20px;"><input type="radio" name="sn_penurunan_bb_on" id="sn-pbb-2" class="mr-1" value="2" onchange="calcscore()">6 - 10 Kg</td>
														<td>Skor 2</td>
													</tr>
													<tr class="sn-penurunan-bb-area">
														<td style="padding-left: 20px;"><input type="radio" name="sn_penurunan_bb_on" id="sn-pbb-3" class="mr-1" value="3" onchange="calcscore()">11 - 15 Kg</td>
														<td>Skor 3</td>
													</tr>
													<tr class="sn-penurunan-bb-area">
														<td style="padding-left: 20px;"><input type="radio" name="sn_penurunan_bb_on" id="sn-pbb-4" class="mr-1" value="4" onchange="calcscore()">> 15 Kg</td>
														<td>Skor 4</td>
													</tr>
													<tr class="sn-penurunan-bb-area">
														<td style="padding-left: 20px;"><input type="radio" name="sn_penurunan_bb_on" id="sn-pbb-5" class="mr-1" value="5" onchange="calcscore()">Tidak tahu berapa Kg penurunannya</td>
														<td>Skor 2</td>
													</tr>
													<tr style="border-bottom: 1px solid black;">
														<td></td><td></td>
													</tr>
													<tr>
														<td colspan="2">Apakah asupan makan pasien berkurang karena penurunan nafsu makan (atau karena kesulitan menerima makanan) ?</td>
													</tr>
													<tr>
														<td><input type="radio" name="sn_asupan_makan" id="sn-asupan-makan-tidak" class="mr-1" value="0" onchange="calcscore()" checked="checked">Tidak</td>
														<td>Skor 0</td>
													</tr>
													<tr>
														<td><input type="radio" name="sn_asupan_makan" id="sn-asupan-makan-ya" class="mr-1" value="1" onchange="calcscore()">Ya</td>
														<td>Skor 1</td>
													</tr>
													<tr style="border-top: 1px solid black; border-bottom: 1px solid black;">
														<td><b>Total</b></td>
														<td><input type="number" name="sn_total" id="sn-total" class="custom-form" value="0" readonly></td>
													</tr>
													<tr>
														<td colspan="2">Jika skor ≥ 2 : pasien mengalami resiko gizi kurang</td>
													</tr>
													<tr>
														<td colspan="2">Jika skor < 2 dengan jenis penyakit tertentu</td>
													</tr>
													<tr>
														<td colspan="2">(dilaporkan ke dokter jaga ruangan / DPJP untuk konfirmasi ke dietisin)</td>
													</tr>
												</table>
											</div>
										</div>
									</div>
									<hr>

									<!-- content status fungsional -->
									<button class="btn btn-info btn-xs" type="button" data-toggle="collapse" data-target="#status-fungsional"><i class="fas fa-expand mr-1"></i>Status Fungsional</button><hr>
									<div class="collapse multi-collapse show mt-2" id="status-fungsional">
										<div class="form-group row tight">
											<label class="col-lg-2 label-custom-form right">Status Fungsional :</label>
											<div class="col-lg-10">
												<input type="radio" name="status_fungsional" id="sf-mandiri" class="mr-1" value="1" checked="checked">Mandiri
											</div>
										</div>
										<div class="form-group row tight">
											<label class="col-lg-2 label-custom-form right"></label>
											<div class="col-lg-10">
												<input type="radio" name="status_fungsional" id="sf-perlu-bantuan" class="mr-1" value="2">Perlu Bantuan
												<input type="text" name="sf_perlu_bantuan" id="sf-perlu-bantuan-input" class="custom-form col-lg-3 d-inline-block clear-input ml-2" placeholder="Sebutkan">
											</div>
										</div>
										<div class="form-group row tight">
											<label class="col-lg-2 label-custom-form right"></label>
											<div class="col-lg-10">
												<input type="radio" name="status_fungsional" id="sf-ketergantungan" class="mr-1" value="3">Ketergantungan total, dilaporkan dokter pukul 
												<input type="text" name="sf_ketergantungan" id="sf-ketergantungan-input" class="custom-form col-lg-1 d-inline-block clear-input ml-2" placeholder="<?= date('H:i:s') ?>">
											</div>
										</div>
									</div>
									<hr>

									<!-- content skrining resiko cedera / jatuh -->
									<button class="btn btn-info btn-xs" type="button" data-toggle="collapse" data-target="#skrining-resikko-cedera"><i class="fas fa-expand mr-1"></i>Skrining Resiko Cedera / Jatuh</button><hr>
									<div class="collapse multi-collapse show mt-2" id="skrining-resikko-cedera">
										<div class="form-group row tight">
											<label class="col-lg-10 label-custom-form">a. Perhatikan cara berjalan pasien saat akan duduk di kursi. Apakah pasien tampak seimbang (sempoyongan/limbung) ?</label>
											<div class="col-lg-2">
												<input type="radio" name="src_a" id="src-a-ya" class="mr-1" value="1">Ya
												<input type="radio" name="src_a" id="src-a-tidak" class="mr-1 ml-2" value="0" checked="checked">Tidak
											</div>
										</div>
										<div class="form-group row tight">
											<label class="col-lg-10 label-custom-form">b. Apakah pasien memegang pinggiran kursi atau meja atau beda lain sebagai penopang saat akan duduk ?</label>
											<div class="col-lg-2">
												<input type="radio" name="src_b" id="src-b-ya" class="mr-1" value="1">Ya
												<input type="radio" name="src_b" id="src-b-tidak" class="mr-1 ml-2" value="0" checked="checked">Tidak
											</div>
										</div>
										<div class="form-group row tight">
											<label class="col-lg-1 label-custom-form">Hasil :</label>
											<div class="col-lg-11">
												<input type="radio" name="src_hasil" id="src-hasil-1" class="mr-1" value="1" checked="checked">Tidak Beresiko (tidak ditemukan a dan b)
												<input type="radio" name="src_hasil" id="src-hasil-2" class="mr-1 ml-2" value="2">Resiko Rendah (ditemukan a atau b)
												<input type="radio" name="src_hasil" id="src-hasil-3" class="mr-1 ml-2" value="3">Resiko Tinggi (ditemukan a dan b)
											</div>
										</div>
										<hr>
										<div class="form-group row tight">
											<label class="col-lg-4 label-custom-form">Pemeriksaan Penunjang (Lab, Rx, Lain - lain) :</label>
											<div class="col-lg-4">
												<input type="text" name="pemeriksaan_penunjang" id="pemeriksaan-penunjang-input" class="custom-form d-inline-block clear-input ml-2" placeholder="Masukkan Pemeriksaan Penunjang">
											</div>
										</div>
									</div>
									<hr>									
								</div>
							</div>
						</div>
					</div>
					<div class="tab-pane fade" id="tab2" role="tabpanel">
						<div class="row mt-2" style="font-size: 12px">
							<div class="col-lg-12">
								<div class="box-well" style="overflow-y: auto; height: 400px;">
									<!-- content diagnosa keperawatan -->
									<button class="btn btn-info btn-xs" type="button" data-toggle="collapse" data-target="#diagnosa-keperawatan"><i class="fas fa-expand mr-1"></i>Diagnosa Keperawatan</button><hr>
									<div class="collapse multi-collapse show mt-2" id="diagnosa-keperawatan">
										<div class="form-group row tight">
											<div class="col-lg-12">
												<div class="row">
													<div class="col-lg-4">
														<input type="checkbox" name="diag_keperawatan_1" id="diag-keperawatan-1" class="mr-1" value="1">1. Kelebihan Volume Cairan
													</div>
													<div class="col-lg-4">
														<input type="checkbox" name="diag_keperawatan_4" id="diag-keperawatan-4" class="mr-1 ml-2" value="1">4. Penurunan Curah Jantung
													</div>
													<div class="col-lg-4">
														<input type="checkbox" name="diag_keperawatan_7" id="diag-keperawatan-7" class="mr-1 ml-2" value="1">7. Gangguan Keseimbangan Asam Basa
													</div>
												</div>
											</div>
										</div>
										<div class="form-group row tight">
											<div class="col-lg-12">
												<div class="row">
													<div class="col-lg-4">
														<input type="checkbox" name="diag_keperawatan_2" id="diag-keperawatan-2" class="mr-1" value="1">2. Gangguan Perfusi Jaringan
													</div>
													<div class="col-lg-4">
														<input type="checkbox" name="diag_keperawatan_5" id="diag-keperawatan-5" class="mr-1 ml-2" value="1">5. Nutrisi Kurang dari Kebutuhan Tubuh
													</div>
													<div class="col-lg-4">
														<input type="checkbox" name="diag_keperawatan_8" id="diag-keperawatan-8" class="mr-1 ml-2" value="1">8. Gangguan Rasa Nyaman : Nyeri
													</div>
												</div>
											</div>
										</div>
										<div class="form-group row tight">
											<div class="col-lg-12">
												<div class="row">
													<div class="col-lg-4">
														<input type="checkbox" name="diag_keperawatan_3" id="diag-keperawatan-3" class="mr-1" value="1">3. Gangguan Keseimbangan Elektrolit
													</div>
													<div class="col-lg-4">
														<input type="checkbox" name="diag_keperawatan_6" id="diag-keperawatan-6" class="mr-1 ml-2" value="1">6. Ketidakpatuhan Terhadap Diit
													</div>
													<div class="col-lg-4">
														<input type="checkbox" name="diag_keperawatan_9" id="diag-keperawatan-9" class="mr-1 ml-2" value="1">9. Lain - lain
														<input type="text" name="diag_keperawatan_lain" id="diag-keperawatan-lain-input" class="custom-form col-lg-8 clear-input ml-2" placeholder="Masukkan Lain - lain">
													</div>
												</div>
											</div>
										</div>
									</div>
									<hr>

									<!-- content intervensi keperawatan -->
									<button class="btn btn-info btn-xs" type="button" data-toggle="collapse" data-target="#intervensi-keperawatan"><i class="fas fa-expand mr-1"></i>Intervensi Keperawatan (Rekapitulasi pre, intra dan post HD)</button><hr>
									<div class="collapse multi-collapse show mt-2" id="intervensi-keperawatan">
										<div class="form-group row tight">
											<div class="col-lg-12">
												<div class="row">
													<div class="col-lg-6">
														<input type="checkbox" name="intervensi_keperawatan_1" id="intervensi-keperawatan-1" class="mr-1" value="1">Monitor Berat Badan, Intake Output
													</div>
													<div class="col-lg-6">
														<input type="checkbox" name="intervensi_keperawatan_2" id="intervensi-keperawatan-2" class="mr-1" value="1">Monitor Tanda dan Gejala Infeksi (Lokal dan Sistemik)
													</div>
												</div>
											</div>
										</div>
										<div class="form-group row tight">
											<div class="col-lg-12">
												<div class="row">
													<div class="col-lg-6">
														<input type="checkbox" name="intervensi_keperawatan_3" id="intervensi-keperawatan-3" class="mr-1" value="1">Atur Posisi Pasien agar Ventilasi Adekuat
													</div>
													<div class="col-lg-6">
														<input type="checkbox" name="intervensi_keperawatan_4" id="intervensi-keperawatan-4" class="mr-1" value="1">Ganti Balutan Luka sesuai dengan Prosedur
													</div>
												</div>
											</div>
										</div>
										<div class="form-group row tight">
											<div class="col-lg-12">
												<div class="row">
													<div class="col-lg-6">
														<input type="checkbox" name="intervensi_keperawatan_5" id="intervensi-keperawatan-5" class="mr-1" value="1">Berikan Terapi Oksigen Sesuai Kebutuhan
													</div>
													<div class="col-lg-6">
														<input type="checkbox" name="intervensi_keperawatan_6" id="intervensi-keperawatan-6" class="mr-1" value="1">Monitor Tanda dan Gejala Hipoglikemi
													</div>
												</div>
											</div>
										</div>
										<div class="form-group row tight">
											<div class="col-lg-12">
												<div class="row">
													<div class="col-lg-6">
														<input type="checkbox" name="intervensi_keperawatan_7" id="intervensi-keperawatan-7" class="mr-1" value="1">Observasi Pasien (Monitor Vital Sign) dan Mesin
													</div>
													<div class="col-lg-6">
														<input type="checkbox" name="intervensi_keperawatan_8" id="intervensi-keperawatan-8" class="mr-1" value="1">Lakukan Teknik Distraksi, Relaksasi
													</div>
												</div>
											</div>
										</div>
										<div class="form-group row tight">
											<div class="col-lg-12">
												<div class="row">
													<div class="col-lg-6">
														<input type="checkbox" name="intervensi_keperawatan_9" id="intervensi-keperawatan-9" class="mr-1" value="1">Hentikan HD Sesuai Indikasi
													</div>
													<div class="col-lg-6">
														<input type="checkbox" name="intervensi_keperawatan_10" id="intervensi-keperawatan-10" class="mr-1" value="1">Bila Pasien mulai Hipotensi (mual, muntah, keringan dingin, pusing, kram, hipoglikemi berikan cairan sesuai SPO)
													</div>
												</div>
											</div>
										</div>
										<div class="form-group row tight">
											<div class="col-lg-12">
												<div class="row">
													<div class="col-lg-6">
														<input type="checkbox" name="intervensi_keperawatan_11" id="intervensi-keperawatan-11" class="mr-1" value="1">Kaji Kemampuan Pasien Mendapatkan Nutrisi yang Dibutuhkan
													</div>
													<div class="col-lg-6">
														<input type="checkbox" name="intervensi_keperawatan_12" id="intervensi-keperawatan-12" class="mr-1" value="1">PENKES : Diit, AV-Shunt
														<input type="text" name="intervensi_keperawatan_av_shunt" id="intervensi-keperawatan-av-shunt" class="custom-form col-lg-4 clear-input ml-2" placeholder="Masukkan AV-Shunt">
													</div>
												</div>
											</div>
											<div class="col-lg-12">
												<div class="row">
													<div class="col-lg-6">
														<input type="checkbox" name="intervensi_keperawatan_13" id="intervensi-keperawatan-13" class="mr-1" value="1">Poisikan Supinasi dengan Elevasi Kepala 30&deg; dan Elevasi Kaki
													</div>
													<div class="col-lg-6">
														<input type="checkbox" name="intervensi_keperawatan_14" id="intervensi-keperawatan-14" class="mr-1" value="1">Lain - lain
														<input type="text" name="intervensi_keperawatan_lain" id="invtervensi-keperawatan-lain-input" class="custom-form col-lg-6 clear-input ml-2" placeholder="Masukkan Lain - lain">
													</div>
												</div>
											</div>
										</div>
									</div>
									<hr>

									<!-- content intervensi kolaborasi -->
									<button class="btn btn-info btn-xs" type="button" data-toggle="collapse" data-target="#intervensi-kolaborasi"><i class="fas fa-expand mr-1"></i>Intervensi Kolaborasi</button><hr>
									<div class="collapse multi-collapse show mt-2" id="intervensi-kolaborasi">
										<div class="form-group row tight">
											<div class="col-lg-12">
												<div class="row">
													<div class="col-lg-2">
														<input type="checkbox" name="inv_program_hd" id="inv-program-hd" class="mr-1" value="1">Program HD
													</div>
													<div class="col-lg-2">
														<input type="checkbox" name="inv_transfusi_darah" id="inv-transfusi-darah" class="mr-1" value="1">Transfusi Darah
													</div>
													<div class="col-lg-2">
														<input type="checkbox" name="inv_kolaborasi_diit" id="inv-kolaborasi-diit" class="mr-1" value="1">Kolaborasi Diit
													</div>
													<div class="col-lg-2">
														<input type="checkbox" name="inv_pemberian_ga_glueonas" id="inv-pemberian-ca-glueonas" class="mr-1" value="1">Pemberian Ca Glueonas
													</div>
													<div class="col-lg-2">
														<input type="checkbox" name="inv_pemberian_antipiretik" id="inv-pemberian-antipiretik" class="mr-1" value="1">Pemberian Antipiretik
													</div>
												</div>
												<div class="row">
													<div class="col-lg-2">
														<input type="checkbox" name="inv_pemberian_analgetik" id="inv-pemberian-analgetik" class="mr-1" value="1">Pemberian Analgetik
													</div>
													<div class="col-lg-2">
														<input type="checkbox" name="inv_pemberian_erytropoetin" id="inv-pemberian-erytropoetin" class="mr-1" value="1">Pemberian Erytropoetin
													</div>
													<div class="col-lg-2">
														<input type="checkbox" name="inv_pemberian_preparat_besi" id="inv-preparat-besi" class="mr-1" value="1">Pemberian Preparat Besi
													</div>
													<div class="col-lg-2">
														<input type="checkbox" name="inv_obat_obat_emergensi" id="inv-obat-obat-emergensi" class="mr-1" value="1">Obat Obat Emergensi
													</div>
													<div class="col-lg">
														<input type="checkbox" name="inv_pemberian_antibiotik" id="inv-pemberian-antibiotik" class="mr-1" value="1">Pemberian Antibiotik
														<input type="text" name="inv_antibiotik" id="inv-antibiotik-input" class="custom-form col-lg-6 clear-input ml-2" placeholder="Masukkan Antibiotik">
													</div>
												</div>
											</div>
										</div>
									</div>
									<hr>

									<!-- content intruksi medik -->
									<button class="btn btn-info btn-xs" type="button" data-toggle="collapse" data-target="#intruksi-medik"><i class="fas fa-expand mr-1"></i>Intruksi Medik</button><hr>
									<div class="collapse multi-collapse show mt-2" id="intruksi-medik">
										<div class="row">
											<div class="col-lg-8">
												<div class="form-group row tight">
													<label class="col-lg-2 label-custom-form right">Intruksi Medik :</label>
													<div class="col-lg-10">
														<input type="checkbox" name="im_inisiasi" id="im-inisiasi" class="mr-1" value="1">Inisiasi
														<input type="checkbox" name="im_akut" id="im-akut" class="mr-1 ml-2" value="1">Akut
														<input type="checkbox" name="im_rutin" id="im-rutin" class="mr-1 ml-2" value="1">Rutin
														<input type="checkbox" name="im_pre_op" id="im-pre-op" class="mr-1 ml-2" value="1">Pre Op
														<input type="checkbox" name="im_sled" id="im-sled" class="mr-1 ml-2" value="1">Sled
													</div>
												</div>
												<div class="form-group row tight">
													<label class="col-lg-2 label-custom-form right"></label>
													<div class="col-lg-10">
														<div class="row">
															<div class="col-lg-3">
																<input type="checkbox" name="im_time" id="im-time" class="mr-1" value="1">Time
																<input type="text" name="im_time_input" id="im-time-input" class="custom-form col-lg-7 d-inline-block clear-input ml-1" value="<?= date('H:i:s') ?>">
															</div>
															<div class="col-lg-3">
																<div class="input-group">
																	<span class="mr-1">QB :</span><input type="text" name="im_qb" id="im-qb" class="custom-form col-lg clear-input">
																	<div class="input-group-append">
																		<span class="input-group-custom">ml/mnt</span>
																	</div>
																</div>
															</div>
															<div class="col-lg-3">
																<div class="input-group">
																	<span class="mr-1">QD :</span><input type="text" name="im_qd" id="im-qd" class="custom-form col-lg clear-input">
																	<div class="input-group-append">
																		<span class="input-group-custom">ml/mnt</span>
																	</div>
																</div>
															</div>
															<div class="col-lg-3">
																<div class="input-group">
																	<span class="mr-1">UF Goal :</span><input type="text" name="im_uf_goal" id="im-uf-goal" class="custom-form col-lg clear-input">
																	<div class="input-group-append">
																		<span class="input-group-custom">ml</span>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
												<div class="form-group row tight">
													<label class="col-lg-2 label-custom-form right"></label>
													<div class="col-lg-10">
														<input type="checkbox" name="im_profile_hd" id="im-profile-hd" class="mr-1" value="1">Profile HD :
														<input type="text" name="im_profile_hd_input" id="im-profile-hd-input" class="custom-form col-lg-6 clear-input" placeholder="Masukkan Profile HD">
													</div>
												</div>
											</div>
											<div class="col-lg-4">
												<div class="form-group row tight">
													<label class="col-lg-4 label-custom-form right">Dialisat :</label>
													<div class="col-lg-8">
														<input type="checkbox" name="dialisat_bicarbonat" id="dialisat-bicarbonat" class="mr-1" value="1">Bicarbonat
													</div>
												</div>
												<div class="form-group row tight">
													<label class="col-lg-4 label-custom-form right"></label>
													<div class="col-lg-8">
														<input type="checkbox" name="dialisat_condusctivity" id="dialisat-condusctivity" class="mr-1" value="1">Condusctivity
													</div>
												</div>
												<div class="form-group row tight">
													<label class="col-lg-4 label-custom-form right"></label>
													<div class="col-lg-8">
														<input type="checkbox" name="dialisat_temperatur" id="dialisat-temperatur" class="mr-1" value="1">Temperatur
													</div>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-lg-8">
												<div class="row">
													<div class="col-lg-6">
														<div class="form-group row tight">
															<label class="col-lg-3 label-custom-form right">Heparin :</label>
															<div class="col-lg-9">
																<input type="radio" name="heparin" id="heparin-free" class="mr-1" value="1" checked="checked">Free Heparin
															</div>
														</div>
														<div class="form-group row tight">
															<label class="col-lg-3 label-custom-form right"></label>
															<div class="col-lg-9">
																<input type="radio" name="heparin" id="heparin-reguler" class="mr-1" value="2">Reguler Heparin
															</div>
														</div>
														<div class="form-group row tight">
															<label class="col-lg-3 label-custom-form right"></label>
															<div class="col-lg-9">
																<input type="radio" name="heparin" id="heparin-minimal" class="mr-1" value="3">Minimal Heparin
															</div>
														</div>
													</div>
													<div class="col-lg-6">
														<div class="form-group row tight">
															<label class="col-lg-7 label-custom-form">Heparin Dosis Awal :</label>
															<div class="col-lg-5">
																<div class="input-group-append">
																	<input type="text" name="heparin_dosis_awal" id="heparin-dosis-awal" class="custom-form d-inline-block clear-input">
																	<span class="input-group-custom">iu</span>
																</div>
															</div>
														</div>
														<div class="form-group row tight">
															<label class="col-lg-7 label-custom-form">Dosis  Sirkulasi :</label>
															<div class="col-lg-5">
																<div class="input-group-append">
																	<input type="text" name="heparin_dosis_sirkulasi" id="heparin-dosis-sirkulasi" class="custom-form d-inline-block clear-input">
																	<span class="input-group-custom">iu</span>
																</div>
															</div>
														</div>
														<div class="form-group row tight">
															<label class="col-lg-7 label-custom-form">Dosis  Maintenance :</label>
															<div class="col-lg-5">
																<div class="input-group-append">
																	<input type="text" name="heparin_dosis_maintenance" id="heparin-dosis-maintenance" class="custom-form d-inline-block clear-input">
																	<span class="input-group-custom">iu</span>
																</div>
															</div>
														</div>
														<div class="form-group row tight">
															<label class="col-lg-7 label-custom-form">Total :</label>
															<div class="col-lg-5">
																<div class="input-group-append">
																	<input type="text" name="heparin_total" id="heparin-total" class="custom-form d-inline-block clear-input" readonly>
																	<span class="input-group-custom">iu</span>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="col-lg-4">
												<div class="form-group row tight">
													<label class="col-lg-4 label-custom-form right">Dialiser :</label>
													<div class="col-lg-8">
														<input type="radio" name="im_dialiser" id="im-dialiser-baru" class="mr-1" value="Baru" checked="checked">Baru
													</div>
												</div>
												<div class="form-group row tight">
													<label class="col-lg-4 label-custom-form right"></label>
													<div class="col-lg-8">
														<input type="radio" name="im_dialiser" id="im-dialiser-reuse" class="mr-1" value="Reuse">Reuse Ke
														<input type="text" name="im_dialiser_reuse_input" id="im-dialiser-input" class="custom-form col-lg-4 d-inline-block clear-input ml-2">
													</div>
												</div>
												<div class="form-group row tight">
													<label class="col-lg-4 label-custom-form right"></label>
													<div class="col-lg-8">
														<input type="radio" name="im_dialiser" id="im-dialiser-tcv" class="mr-1" value="TCV">TCV
														<input type="text" name="im_dialiser_tcv_input" id="im-dialiser-tcv-input" class="custom-form col-lg-8 d-inline-block clear-input ml-2">
													</div>
												</div>
												<div class="form-group row tight">
													<label class="col-lg-4 label-custom-form right">Tipe Dialiser</label>
													<div class="col-lg-8">
														<input type="radio" name="im_dialiser_tipe" id="im-dialiser-tipe-high-flux" class="mr-1" value="High Flux">High Flux
														<input type="radio" name="im_dialiser_tipe" id="im-dialiser-tipe-low-flux" class="mr-1" value="Low Flux" checked="checked">Low Flux
													</div>
												</div>
											</div>
										</div>
									</div>
									<hr>
								</div>
							</div>
						</div>
					</div>
					<div class="tab-pane fade" id="tab3" role="tabpanel">
						<div class="row mt-2" style="font-size: 12px">
							<div class="col-lg-12">
								<div class="box-well" style="overflow-y: auto; height: 400px;">
									<!-- content tindakan keperawatan -->
									<button class="btn btn-info btn-xs" type="button" data-toggle="collapse" data-target="#tindakan-keperawatan"><i class="fas fa-expand mr-1"></i>Tindakan Keperawatan</button><hr>
									<div class="collapse multi-collapse show mt-2" id="tindakan-keperawatan">
										<div class="row">
											<div class="col-lg-12">
												<div class="table-responsive">
													<table class="table table-sm" style="border: 0;" id="table-tindakan-keperawatan">
														<thead class="thead-light">
															<tr>
																<th class="center v-center" rowspan="2" width="10%">Observasi</th>
																<th class="center v-center" rowspan="2" width="10%">Jam</th>
																<th class="center v-center" rowspan="2" width="5%">QB</th>
																<th class="center v-center" rowspan="2" width="5%">UFR</th>
																<th class="center v-center" rowspan="10" width="8%">TD</th>
																<th class="center v-center" rowspan="2" width="5%">N</th>
																<th class="center v-center" rowspan="2" width="5%">RR</th>
																<th class="center v-center" rowspan="2" width="5%">Suhu</th>
																<th class="center v-center" colspan="4" width="5%">Inake (ml)</th>
																<th class="center v-center" colspan="2" width="5%">Output</th>
																<th class="center v-center" rowspan="2" width="15%">Keterangan Lain</th>
																<th class="center v-center" rowspan="2" width="5%">Paraf</th>
																<th class="center v-center" rowspan="2" width="5%"></th>
															</tr>
															<tr>
																<th class="center v-center" width="8%">Nacl<br>0,9%</th>
																<th class="center v-center" width="8%">Dextrose<br>40%</th>
																<th class="center v-center" width="8%">Makan<br>Minum</th>
																<th class="center v-center" width="8%">Lain-<br>lain</th>
																<th class="center v-center" width="8%">UF<br>Tercapai</th>
																<th class="center v-center" width="8%">Lain-<br>lain</th>
															</tr>
														</thead>
														<tbody id="tbody-pre-hd">
															<tr>
																<th class="center v-center" width="10%"><input type="hidden" name="pre_jenis_observasi" value="Pre HD">Pre HD</th>
																<td class="center v-center" widht="7%"><input type="text" name="pre_observasi_jam" id="pre-observasi-jam" class="custom-form col-lg clear-input center" value="<?= date('H:i:s') ?>" placeholder="hh:ii:ss"></td>
																<td class="center v-center" widht="5%"><input type="text" name="pre_observasi_qb" id="pre-observasi-qb" class="custom-form col-lg clear-input center"></td>
																<td class="center v-center" widht="5%"><input type="text" name="pre_observasi_ufr" id="pre-observasi-ufr" class="custom-form col-lg clear-input center"></td>
																<td class="center v-center" widht="8%"><input type="text" name="pre_observasi_td" id="pre-observasi-td" class="custom-form col-lg clear-input center"></td>
																<td class="center v-center" widht="5%"><input type="text" name="pre_observasi_n" id="pre-observasi-n" class="custom-form col-lg clear-input center"></td>
																<td class="center v-center" widht="5%"><input type="text" name="pre_observasi_rr" id="pre-observasi-rr" class="custom-form col-lg clear-input center"></td>
																<td class="center v-center" widht="5%"><input type="text" name="pre_observasi_suhu" id="pre-observasi-suhu" class="custom-form col-lg clear-input center"></td>
																<td class="center v-center" widht="8%"><input type="text" name="pre_intake_nacl" id="pre-intake-nacl" class="custom-form col-lg clear-input center"></td>
																<td class="center v-center" widht="8%"><input type="text" name="pre_intake_dextrose" id="pre-intake-dextrose" class="custom-form col-lg clear-input center"></td>
																<td class="center v-center" widht="8%"><input type="text" name="pre_intake_makan_minum" id="pre-intake-makan-minum" class="custom-form col-lg clear-input center"></td>
																<td class="center v-center" widht="8%"><input type="text" name="pre_intake_lain_lain" id="pre-intake-lain-lain" class="custom-form col-lg clear-input center"></td>
																<td class="center v-center" widht="8%"><input type="text" name="pre_output_uf_tercapai" id="pre-output-uf-tercapai" class="custom-form col-lg clear-input center"></td>
																<td class="center v-center" widht="8%"><input type="text" name="pre_output_lain_lain" id="pre-output-lain-lain" class="custom-form col-lg clear-input center"></td>
																<td class="center v-center" widht="15%"><input type="text" name="pre_keterangan_lain_subject" id="pre-keterangan-lain-subject" class="custom-form col-lg clear-input" placeholder="Subject"></td>
																<td class="center v-center" widht="8%"><input type="checkbox" name="pre_paraf" id="pre-paraf" class="v-center" value="1"></td>
																<td class="center v-center" widht="5%">&nbsp;</td>
															</tr>
															<tr>
																<td colspan="14"></td>
																<td class="center v-center" widht="15%"><input type="text" name="pre_keterangan_lain_objective" id="pre-keterangan-lain-objective" class="custom-form col-lg clear-input" placeholder="Objective"></td>
																<td colspan="2"></td>
															</tr>
															<tr>
																<td colspan="14"></td>
																<td class="center v-center" widht="15%"><input type="text" name="pre_keterangan_lain_assessment" id="pre-keterangan-lain-assessment" class="custom-form col-lg clear-input" placeholder="Assessment"></td>
																<td colspan="2"></td>
															</tr>
															<tr>
																<td colspan="14"></td>
																<td class="center v-center" widht="15%"><input type="text" name="pre_keterangan_lain_plan" id="pre-keterangan-lain-plan" class="custom-form col-lg clear-input" placeholder="Plan"></td>
																<td colspan="2"></td>
															</tr>
														</tbody>
														<tbody id="tbody-intra-hd">
															
														</tbody>
														<tbody id="tbody-post-hd">
															<tr>
																<th class="center v-center" rowspan="2" width="10%"><input type="hidden" name="post_jenis_observasi" value="Post HD">Post HD</th>
																<td class="center v-center" widht="7%"><input type="text" name="post_observasi_jam" id="post-observasi-jam" class="custom-form col-lg clear-input center" value="<?= date('H:i:s') ?>" placeholder="hh:ii:ss"></td>
																<td class="center v-center" widht="5%"><input type="text" name="post_observasi_qb" id="post-observasi-qb" class="custom-form col-lg clear-input center"></td>
																<td class="center v-center" widht="5%"><input type="text" name="post_observasi_ufr" id="post-observasi-ufr" class="custom-form col-lg clear-input center"></td>
																<td class="center v-center" widht="8%"><input type="text" name="post_observasi_td" id="post-observasi-td" class="custom-form col-lg clear-input center"></td>
																<td class="center v-center" widht="5%"><input type="text" name="post_observasi_n" id="post-observasi-n" class="custom-form col-lg clear-input center"></td>
																<td class="center v-center" widht="5%"><input type="text" name="post_observasi_rr" id="post-observasi-rr" class="custom-form col-lg clear-input center"></td>
																<td class="center v-center" widht="5%"><input type="text" name="post_observasi_suhu" id="post-observasi-suhu" class="custom-form col-lg clear-input center"></td>
																<td class="center v-center" widht="8%"><input type="text" name="post_intake_nacl" id="post-intake-nacl" class="custom-form col-lg clear-input center"></td>
																<td class="center v-center" widht="8%"><input type="text" name="post_intake_dextrose" id="post-intake-dextrose" class="custom-form col-lg clear-input center"></td>
																<td class="center v-center" widht="8%"><input type="text" name="post_intake_makan_minum" id="post-intake-makan-minum" class="custom-form col-lg clear-input center"></td>
																<td class="center v-center" widht="8%"><input type="text" name="post_intake_lain_lain" id="post-intake-lain-lain" class="custom-form col-lg clear-input center"></td>
																<td class="center v-center" widht="8%"><input type="text" name="post_output_uf_tercapai" id="post-output-uf-tercapai" class="custom-form col-lg clear-input center"></td>
																<td class="center v-center" widht="8%"><input type="text" name="post_output_lain_lain" id="post-output-lain-lain" class="custom-form col-lg clear-input center"></td>
																<td class="center v-center" widht="15%"><input type="text" name="post_keterangan_lain" id="post-keterangan-lain" class="custom-form col-lg clear-input center" placeholder="Kt/V"></td>
																<td class="center v-center" widht="8%"><input type="checkbox" name="post_paraf" id="post-paraf" class="v-center" value="1"></td>
																<td class="center v-center" widht="5%">&nbsp;</td>
															</tr>
															<tr>
																<th class="right v-center" colspan="7">Jumlah :</th>
																<td class="center v-center" colspan="4"><input type="text" name="jumlah_intake" id="jumlah-intake" class="custom-form col-lg clear-input center"></td>
																<td class="center v-center" colspan="2"><input type="text" name="jumlah_output" id="jumlah-output" class="custom-form col-lg clear-input center"></td>
																<td class="center v-center"><input type="text" name="balance" id="balance" class="custom-form col-lg clear-input center" placeholder="Balance"></td>
															</tr>
														</tbody>
													</table>
												</div>
											</div>
										</div>
									</div>
									<hr>

									<!-- content penyakit selama hd -->
									<button class="btn btn-info btn-xs" type="button" data-toggle="collapse" data-target="#penyakit-selama-hd"><i class="fas fa-expand mr-1"></i>Penyakit Selama HD</button><hr>
									<div class="collapse multi-collapse show mt-2" id="penyakit-selama-hd">
										<div class="row">
											<div class="col-lg-2">
												<input type="checkbox" name="ps_masalah_akses" id="ps-masalah-akses" class="mr-1" value="1">Masalah Akses
											</div>
											<div class="col-lg-2">
												<input type="checkbox" name="ps_pendarahan" id="ps-pendarahan" class="mr-1" value="1">Pendarahan
											</div>
											<div class="col-lg-2">
												<input type="checkbox" name="ps_first_use_syndrom" id="ps-use-syndrom" class="mr-1" value="1">Fist Use Syndrom
											</div>
											<div class="col-lg-2">
												<input type="checkbox" name="ps_sakit_kepala" id="ps-sakit-kepala" class="mr-1" value="1">Sakit Kepala
											</div>
											<div class="col-lg-2">
												<input type="checkbox" name="ps_mual_muntah" id="ps-mual-muntah" class="mr-1" value="1">Mual Muntah
											</div>
										</div>
										<div class="row">
											<div class="col-lg-2">
												<input type="checkbox" name="ps_kram_otot" id="ps-kram-otot" class="mr-1" value="1">Kram Otot
											</div>
											<div class="col-lg-2">
												<input type="checkbox" name="ps_hiperkalemia" id="ps-hiperkalemia" class="mr-1" value="1">Hiperkalemia
											</div>
											<div class="col-lg-2">
												<input type="checkbox" name="ps_hipotensi" id="ps-hipotensi" class="mr-1" value="1">Hipotensi
											</div>
											<div class="col-lg-2">
												<input type="checkbox" name="ps_hipertensi" id="ps-hipertensi" class="mr-1" value="1">Hipertensi
											</div>
											<div class="col-lg-2">
												<input type="checkbox" name="ps_nyeri_dada" id="ps-nyeri-dada" class="mr-1" value="1">Nyeri Dada
											</div>
										</div>
										<div class="row">
											<div class="col-lg-2">
												<input type="checkbox" name="ps_aritmia" id="ps-aritmia" class="mr-1" value="1">Aritmia
											</div>
											<div class="col-lg-2">
												<input type="checkbox" name="ps_gatal_gatal" id="ps-gatal-gatal" class="mr-1" value="1">Gatal - gatal
											</div>
											<div class="col-lg-2">
												<input type="checkbox" name="ps_demam" id="ps-demam" class="mr-1" value="1">Demam
											</div>
											<div class="col-lg-2">
												<input type="checkbox" name="ps_menggigil" id="ps-menggigil" class="mr-1" value="1">Menggigi/dingin
											</div>
											<div class="col-lg-4">
												<input type="checkbox" name="ps_lain_lain" id="ps-lain-lain" class="mr-1" value="1">Lain - lain
												<input type="text" name="ps_lain_lain_input" id="ps-lain-lain-input" class="custom-form col-lg-9 clear-input ml-2" placeholder="Masukkan Lain - lain Penyakit Selama HD">
											</div>
										</div>
									</div>
									<hr>

									<div class="form-group row tight">
										<label class="col-lg-2 label-custom-form right">EVALUASI KEPERAWATAN :</label>
										<div class="col-lg-10">
											<div class="row">
												<div class="col-lg-6">
													<textarea name="ek_subject" id="ek-subject" rows="3" class="custom-textarea clear-input" placeholder="Subject"></textarea>
												</div>
												<div class="col-lg-6">
													<textarea name="ek_assessment" id="ek-assessment" rows="3" class="custom-textarea clear-input" placeholder="Assessment"></textarea>
												</div>
											</div>
										</div>
									</div>
									<div class="form-group row tight">
										<label class="col-lg-2 label-custom-form right"></label>
										<div class="col-lg-10">
											<div class="row">
												<div class="col-lg-6">
													<textarea name="ek_objective" id="ek-objective" rows="3" class="custom-textarea clear-input" placeholder="Objective"></textarea>
												</div>
												<div class="col-lg-6">
													<textarea name="ek_plan" id="ek-plan" rows="3" class="custom-textarea clear-input" placeholder="Plan"></textarea>
												</div>
											</div>
										</div>
									</div>
									<div class="form-group row tight">
										<label class="col-lg-2 label-custom-form right">DISCHART PLANNING :</label>
										<div class="col-lg-10">
											<textarea name="dischart_planning" id="dischart-planning" class="custom-textarea clear-input" rows="5" placeholder="Dischart Planning"></textarea>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- End Form -->

				<div class="row">
					<div class="col-lg-12">
						<table class="table table-sm table-striped table-hover color-table info-table" id="table-asuhan-keperawatan">
							<thead>
								<tr>
									<th class="center" width="10%">Tanggal/Jam</th>
									<th class="center" width="10%">No. Mesin</th>
									<th class="left" width="40%">Diagnosa Medis</th>
									<th class="center" width="5%">Hemodialisa Ke</th>
									<th class="center" width="5%"></th>
								</tr>
							</thead>
							<tbody></tbody>
						</table>
					</div>
				</div>
				<?php echo form_close() ?>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times-circle mr-1"></i>Batal</button>
				<button type="button" class="btn btn-info" onclick="konfirmasiSimpanAsuhanKeperawatan()"><i class="fas fa-save mr-1"></i>Simpan</button>
			</div>
		</div>
	</div>
</div>