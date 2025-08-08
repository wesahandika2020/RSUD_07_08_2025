
<!-- Modal Riwayat Pasien -->
<div id="modal-riwayat" class="modal fade" role="dialog" aria-labelledby="modal-riwayat-label" aria-hidden="true">
	<div class="modal-dialog" style="min-width: 98%">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="modal-riwayat-label">Riwayat Rekam Medis Pasien | <span id="judul-riwayat"></span></h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-lg-10" role="main" id="riwayat-scroll">
						<input type="hidden" id="id-pendaftaran-rm">
						<input type="hidden" id="id-x-pasien">
						<ul class="nav nav-pills justify-content-end" id="tabRiwayat">
							<li class="nav-item" id="pasien-tab">


								<!-- logo pasien meninggal // TAMBAHAN WH-->
								<!-- <img id="logo-pasien-alergi" src="<?= resource_url() ?>images/diagnosa/alergi.jpg" alt="logo-pasien-alergi" title="ALERGI" class="img-thumbnail rounded hide" width="100px" style="margin-right: 1rem; padding: 0; border:0"> -->
								<img id="logo-pasien-alergi" src="<?= resource_url() ?>images/diagnosa/alergi.jpg" alt="logo-pasien-alergi" title="" class="img-thumbnail rounded logo-pasien-alergi hide" width="100px" style="margin-right: 1rem; padding: 0; border:0">
								<!-- <span id="alergi-coba"></span> gunakan nanti ketika data alergi disuruh menampilkan -->



								<img id="logo-pasien-meninggal" src="<?= resource_url() ?>images/diagnosa/died.jpg" alt="logo-pasien-meninggal" title="Meninggal" class="img-thumbnail rounded hide" width="60px" style="margin-right: 1rem; padding: 0; border:0">
								<img id="logo-pasien-hiv" src="<?= resource_url() ?>images/diagnosa/hiv-aids.jpg" alt="logo-pasien-hiv" title="HIV" class="img-thumbnail rounded hide" width="60px" style="margin-right: 1rem; padding: 0; border:0">
								<img id="logo-pasien-gonorrhea" src="<?= resource_url() ?>images/diagnosa/gonorrhea.jpg" alt="logo-pasien-gonorrhea" title="Gonorrhea" class="img-thumbnail rounded hide" width="60px" style="margin-right: 1rem; padding: 0; border:0">
								<img id="logo-pasien-hepatitis" src="<?= resource_url() ?>images/diagnosa/hepatitis.jpg" alt="logo-pasien-hepatitis" title="Hepatitis" class="img-thumbnail rounded hide" width="60px" style="margin-right: 1rem; padding: 0; border:0">
								<img id="logo-pasien-kusta" src="<?= resource_url() ?>images/diagnosa/kusta-lepra.jpg" alt="logo-pasien-kusta" title="Kusta" class="img-thumbnail rounded hide" width="60px" style="margin-right: 1rem; padding: 0; border:0">
								<img id="logo-pasien-tbc" src="<?= resource_url() ?>images/diagnosa/tbc-kp.jpg" alt="logo-pasien-tbc" title="TBC" class="img-thumbnail rounded hide" width="60px" style="margin-right: 1rem; padding: 0; border:0">
								<img id="logo-pasien-covid" src="<?= resource_url() ?>images/diagnosa/covid.jpg" alt="logo-pasien-covid" title="Covid" class="img-thumbnail rounded hide" width="60px" style="margin-right: 1rem; padding: 0; border:0">
								<img id="logo-pasien-komplain" src="<?= resource_url() ?>images/diagnosa/pasien-potensi-komplain.jpg" alt="logo-pasien-komplain" title="Potensi Komplain" class="img-thumbnail rounded hide" width="60px" style="margin-right: 1rem; padding: 0; border:0">
								<img id="logo-pasien-pejabat" src="<?= resource_url() ?>images/diagnosa/pasien-pejabat.jpg" alt="logo-pasien-pejabat" title="Pejabat" class="img-thumbnail rounded hide" width="60px" style="margin-right: 1rem; padding: 0; border:0">
								<img id="logo-pasien-pemilik" src="<?= resource_url() ?>images/diagnosa/pasien-pemilik-rs.jpg" alt="logo-pasien-pemilik" title="Pemilik RS" class="img-thumbnail rounded hide" width="60px" style="margin-right: 1rem; padding: 0; border:0">
							</li>
							<li class="nav-item" id="icare-tab">
							    <a href="#tab-icare-jkn" class="nav-link" data-toggle="tab" onclick="clearRiwayatAndKunjungan()">I-CARE</a>
							</li>


							<li class="nav-item" id="riwayat-tab">
							    <a href="#tab-detail-riwayat" class="nav-link" data-toggle="tab" onclick="restoreKunjungan()">Data Riwayat</a>
							</li>

						</ul>
						<hr>
						<div class="tab-content">
							<div id="tab-pasien" class="tab-pane active">
								<div class="row">
								</div>
							</div>
							<div id="tab-detail-riwayat" class="tab-pane">
								<div id="riwayat-area"></div>
								
							</div>
						</div>
					</div>
					<div class="col-lg-2" id="klik-hidden">
						<div class="bs-docs-sidebar hidden-print" role="complementary">
							<span class="title_nav_side">Tanggal Kunjungan</span>
							<div id="kunjungan-scroll">
								<ul class="nav bs-docs-sidenav" id="list-kunjungan">

								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-times-circle mr-2"></i>Close</button>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- End Modal Riwayat Pasien -->

<div id="modal-riwayat-obat-rm" class="modal fade">
	<div class="modal-dialog modal-dialog-scrollable" style="max-width: 50%">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Detail Obat</h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-lg-12">
						<table width="100%" id="table-obat-rm" class="table table-sm table-striped table-hover color-table info-table">
							<thead>
							<tr>
									<th class="center">No.R</th>
									<th class="center">Nama Obat</th>
									<th class="center">Dosis</th>
									<th class="center">QTY</th>
									<th class="center">Aturan Pakai</th>
									<th class="center">Keterangan</th>
									<th class="center">Sediaan</th>
							</tr>
							<thead>
							<tbody></tbody>
						</table>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-info" data-dismiss="modal"><i class="fas fa-check-cricle mr-1"></i>OK</button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- Modal Anamnesa Pasien-->
<div id="modal-detail-anamnesa" class="modal bounceInDown animated" role="dialog" data-backdrop="static" aria-labelledby="modal-diagnosis-label" aria-hidden="true">
	<div class="modal-dialog modal-dialog-scrollable" style="max-width: 98%">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="modal-detail-anamnesa-label"></h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true" style="font-size: 16pt;">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-lg-12">
						<div class="widget-body">
							<div id="wizard-form">

								<!-- Form Anamnesa  -->
								<div class="table-detail-anamnesa">
									<div class="row">
										<div class="col-lg-12">
											<h5 class="center"><b>ANAMNESA & PEMERIKSAAN FISIK</b></h5>
											<hr>
											<table class="table table-sm table-detail table-striped" width="100%">
												<tr>
													<td width="150px"><b>Pasien</b></td>
													<td width="1px">:</td>
													<td><span id="identitas-pasien-anamnesa"></span></td>
												</tr>

											</table>
											<br>

											<h6><b>I. ANAMNESA</b></h6>
											<button class="btn btn-info btn-xxs" type="button" data-toggle="collapse" data-target="#anamnesa" aria-expanded="false" aria-controls="anamnesa">
												<i class="fas fa-expand m-r-5"></i>Open Input Anamnesa
											</button>
											<div class="collapse" id="anamnesa">
												<div class="row">
													<div class="col-lg-4">
														<div class="form-group tight">
															<label>Keluhan Utama</label>
															<textarea readonly name="rm_keluhan_utama" id="rm-keluhan-utama" class="custom-textarea" rows="4"></textarea>
														</div>
														<div class="form-group tight">
															<label>Riwayat Penyakit Keluarga</label>
															<textarea readonly name="rm_riwayat_penyakit_keluarga" id="rm-riwayat-penyakit-keluarga" class="custom-textarea" rows="4"></textarea>
														</div>
													</div>
													<div class="col-lg-4">
														<div class="form-group tight">
															<label>Riwayat Penyakit Sekarang</label>
															<textarea readonly name="rm_riwayat_penyakit_sekarang" id="rm-riwayat-penyakit-sekarang" class="custom-textarea" rows="4"></textarea>
														</div>
														<div class="form-group tight">
															<label>Anamnesa Sosial</label>
															<textarea readonly name="rm_anamnesa_sosial" id="rm-anamnesa-sosial" class="custom-textarea" rows="4"></textarea>
														</div>
													</div>
													<div class="col-lg-4">
														<div class="form-group tight">
															<label>Riwayat Penyakit Dahulu</label>
															<textarea readonly name="rm_riwayat_penyakit_dahulu" id="rm-riwayat-penyakit-dahulu" class="custom-textarea" rows="4"></textarea>
														</div>
													</div>
												</div>
											</div>
											<hr>

											<h6><b>II. PEMERIKSAAN FISIK</b></h6>
											<button class="btn btn-info btn-xxs" type="button" data-toggle="collapse" data-target="#pemeriksaanFisik" aria-expanded="false"
													aria-controls="pemeriksaanFisik">
												<i class="fas fa-expand m-r-5"></i>Open Input Pemeriksaan Fisik
											</button>
											<div class="collapse" id="pemeriksaanFisik">
												<div class="row">
													<div class="col-lg-3">
														<div class="form-group tight">
															<label>Keadaan Umum</label>
															<input readonly type="text" name="rm_keadaan_umum" id="rm-keadaan-umum" class="custom-form">
														</div>
														<div class="form-group tight">
															<label>Kesadaran</label>
															<input readonly type="text" name="rm_kesadaran" id="rm-kesadaran" class="custom-form">
														</div>
													</div>
													<div class="col-lg-3">
														<div class="form-group tight">
															<label>GCS</label>
															<input readonly type="text" name="rm_gcs" id="rm-gcs" class="custom-form">
														</div>
														<div class="form-group tight">
															<label>Alergi</label>
															<input readonly type="text" name="rm_alergi" id="rm-alergi" class="custom-form">
														</div>
													</div>
													<div class="col-lg-6">
														<div class="row">
															<div class="col-lg-3">
																<div class="form-group tight">
																	<label>Sistolik</label>
																	<div class="input-group">
																		<input readonly type="text" name="rm_tensi_sistolik" id="rm-tensi-sistolik" class="custom-form">
																		<div class="input-group-append">
																			<span class="input-group-custom">mmHg</span>
																		</div>
																	</div>
																</div>
																<div class="form-group tight">
																	<label>Diastolik</label>
																	<div class="input-group">
																		<input readonly type="text" name="rm_tensi_diastolik" id="rm-tensi-diastolik" class="custom-form">
																		<div class="input-group-append">
																			<span class="input-group-custom">mmHg</span>
																		</div>
																	</div>
																</div>
															</div>
															<div class="col-lg-3">
																<div class="form-group tight">
																	<label>Suhu</label>
																	<div class="input-group">
																		<input readonly type="text" name="rm_suhu" id="rm-suhu" class="custom-form">
																		<div class="input-group-append">
																			<span class="input-group-custom">&#8451;</span>
																		</div>
																	</div>
																</div>
																<div class="form-group tight">
																	<label>Nadi</label>
																	<div class="input-group">
																		<input readonly type="text" name="rm_nadi" id="rm-nadi" class="custom-form">
																		<div class="input-group-append">
																			<span class="input-group-custom">/Mnt</span>
																		</div>
																	</div>
																</div>

															</div>
															<div class="col-lg-3">
																<div class="form-group tight">
																	<label>Respirasi Rate</label>
																	<div class="input-group">
																		<input readonly type="text" name="rm_rr" id="rm-rr" class="custom-form">
																		<div class="input-group-append">
																			<span class="input-group-custom">/Mnt</span>
																		</div>
																	</div>
																</div>
																<div class="form-group tight">
																	<label>Tinggi Badan</label>
																	<div class="input-group">
																		<input readonly type="text" name="rm_tinggi_badan" id="rm-tinggi-badan" class="custom-form">
																		<div class="input-group-append">
																			<span class="input-group-custom">cm</span>
																		</div>
																	</div>
																</div>

															</div>
															<div class="col-lg-3">
																<div class="form-group tight">
																	<label>Berat Badan</label>
																	<div class="input-group">
																		<input readonly type="text" name="rm_berat_badan" id="rm-berat-badan" class="custom-form">
																		<div class="input-group-append">
																			<span class="input-group-custom">Kg</span>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-lg-6">
														<div class="form-group row tight">
															<label class="col-lg-4 col-form-label-custom">Kepala</label>
															<div class="col-lg-8">
																<textarea readonly name="rm_kepala" id="rm-kepala" class="custom-textarea" rows="4"></textarea>
															</div>
														</div>
														<div class="form-group row tight">
															<label class="col-lg-4 col-form-label-custom">Thorax</label>
															<div class="col-lg-8">
																<textarea readonly name="rm_thorax" id="rm-thorax" class="custom-textarea" rows="4"></textarea>
															</div>
														</div>
														<div class="form-group row tight">
															<label class="col-lg-4 col-form-label-custom">Cor</label>
															<div class="col-lg-8">
																<textarea readonly name="rm_cor" id="rm-cor" class="custom-textarea" rows="4"></textarea>
															</div>
														</div>
														<div class="form-group row tight">
															<label class="col-lg-4 col-form-label-custom">Genitalia</label>
															<div class="col-lg-8">
																<textarea readonly name="rm_genitalia" id="rm-genitalia" class="custom-textarea" rows="4"></textarea>
															</div>
														</div>
														<div class="form-group row tight">
															<label class="col-lg-4 col-form-label-custom">Pemeriksaan Penunjang</label>
															<div class="col-lg-8">
																<textarea readonly name="rm_pemeriksaan_penunjang" id="rm-pemeriksaan-penunjang" class="custom-textarea" rows="4"></textarea>
															</div>
														</div>
														<div class="form-group row tight">
															<label class="col-lg-4 col-form-label-custom">Status Mentalis</label>
															<div class="col-lg-8">
																<textarea readonly name="rm_status_mentalis" id="rm-status-mentalis" class="custom-textarea" rows="4"></textarea>
															</div>
														</div>
														<div class="form-group row tight">
															<label class="col-lg-4 col-form-label-custom">Status Gizi</label>
															<div class="col-lg-8">
																<input readonly type="text" name="rm_status_gizi" id="rm-status-gizi" class="custom-form mb-2" rows="4">
															</div>
														</div>
														<div class="form-group row tight">
															<label class="col-lg-4 col-form-label-custom">Hidung</label>
															<div class="col-lg-8">
																<textarea readonly name="rm_hidung" id="rm-hidung" class="custom-textarea" rows="4"></textarea>
															</div>
														</div>
														<div class="form-group row tight">
															<label class="col-lg-4 col-form-label-custom">Mata</label>
															<div class="col-lg-8">
																<textarea readonly name="rm_mata" id="rm-mata" class="custom-textarea" rows="4"></textarea>
															</div>
														</div>
														<div class="form-group row tight">
															<label class="col-lg-4 col-form-label-custom">Rencana Tindak Lanjut</label>
															<div class="col-lg-8">
																<textarea readonly name="rm_usul_tindak_lanjut" id="rm-usul-tindak-lanjut" class="custom-textarea" rows="4"></textarea>
															</div>
														</div>
													</div>
													<div class="col-lg-6">
														<div class="form-group row tight">
															<label class="col-lg-4 col-form-label-custom">Leher</label>
															<div class="col-lg-8">
																<textarea readonly name="rm_leher" id="rm-leher" class="custom-textarea" rows="4"></textarea>
															</div>
														</div>
														<div class="form-group row tight">
															<label class="col-lg-4 col-form-label-custom">Pulmo</label>
															<div class="col-lg-8">
																<textarea readonly name="rm_pulmo" id="rm-pulmo" class="custom-textarea" rows="4"></textarea>
															</div>
														</div>
														<div class="form-group row tight">
															<label class="col-lg-4 col-form-label-custom">Abdomen</label>
															<div class="col-lg-8">
																<textarea readonly name="rm_abdomen" id="rm-abdomen" class="custom-textarea" rows="4"></textarea>
															</div>
														</div>
														<div class="form-group row tight">
															<label class="col-lg-4 col-form-label-custom">Ekstrimitas</label>
															<div class="col-lg-8">
																<textarea readonly name="rm_ekstrimitas" id="rm-ekstrimitas" class="custom-textarea" rows="4"></textarea>
															</div>
														</div>
														<div class="form-group row tight">
															<label class="col-lg-4 col-form-label-custom">Prognosis</label>
															<div class="col-lg-8">
																<textarea readonly name="rm_prognosis" id="rm-prognosis" class="custom-textarea" rows="4"></textarea>
															</div>
														</div>
														<div class="form-group row tight">
															<label class="col-lg-4 col-form-label-custom">Lingkar Kepala</label>
															<div class="col-lg-8">
																<textarea readonly name="rm_lingkar_kepala" id="rm-lingkar-kepala" class="custom-textarea" rows="4"></textarea>
															</div>
														</div>
														<div class="form-group row tight">
															<label class="col-lg-4 col-form-label-custom">Telinga</label>
															<div class="col-lg-8">
																<textarea readonly name="rm_telinga" id="rm-telinga" class="custom-textarea" rows="4"></textarea>
															</div>
														</div>
														<div class="form-group row tight">
															<label class="col-lg-4 col-form-label-custom">Tenggorok</label>
															<div class="col-lg-8">
																<textarea readonly name="rm_tenggorok" id="rm-tenggorok" class="custom-textarea" rows="4"></textarea>
															</div>
														</div>
														<div class="form-group row tight">
															<label class="col-lg-4 col-form-label-custom">Kulit Kelamin</label>
															<div class="col-lg-8">
																<textarea readonly name="rm_kulit_kelamin" id="rm-kulit-kelamin" class="custom-textarea" rows="4"></textarea>
															</div>
														</div>
													</div>
												</div>
											</div>
											<hr>

											<h6><b>III. PEMERIKSAAN NEUROLOGI</b></h6>
											<button class="btn btn-info btn-xxs" type="button" data-toggle="collapse" data-target="#pemeriksaanNeurologi" aria-expanded="false"
													aria-controls="pemeriksaanNeurologi">
												<i class="fas fa-expand m-r-5"></i>Open Input Pemeriksaan Neurologi
											</button>
											<div class="collapse" id="pemeriksaanNeurologi">
												<div class="row mt-2">
													<div class="col-lg-6">
														<div class="form-group row tight mb-2">
															<label class="col-lg-4 col-form-label-custom">Pupil</label>
															<div class="col-lg-8">
																<textarea readonly name="rm_pupil" id="rm-pupil" class="custom-textarea" rows="4"></textarea>
															</div>
														</div>
														<div class="form-group row tight mb-2">
															<label class="col-lg-4 col-form-label-custom">Nervi Cranialis</label>
															<div class="col-lg-8">
																<textarea readonly name="rm_nervi_cranialis" id="rm-nervi-cranialis" class="custom-textarea" rows="4"></textarea>
															</div>
														</div>
														<div class="form-group row tight">
															<label class="col-lg-4 col-form-label-custom">Reflek Fisiologi</label>
															<div class="col-lg-8">
																<textarea readonly name="rm_reflek_fisiologi" id="rm-reflek-fisiologi" class="custom-textarea" rows="4"></textarea>
															</div>
														</div>
														<div class="form-group row tight mb-2">
															<label class="col-lg-4 col-form-label-custom">Sensorik</label>
															<div class="col-lg-8">
																<textarea readonly name="rm_sensorik" id="rm-sensorik" class="custom-textarea" rows="4"></textarea>
															</div>
														</div>
														<div class="form-group row tight">
															<label class="col-lg-4 col-form-label-custom">Pemeriksaan Khusus</label>
															<div class="col-lg-8">
																<textarea readonly name="rm_pemeriksaan_khusus" id="rm-pemeriksaan-khusus" class="custom-textarea" rows="4"></textarea>
															</div>
														</div>
													</div>
													<div class="col-lg-6">
														<div class="form-group row tight mb-2">
															<label class="col-lg-4 col-form-label-custom">Tanda Rangsang Meningeal</label>
															<div class="col-lg-8">
																<textarea readonly name="rm_trm" id="rm-trm" class="custom-textarea" rows="4"></textarea>
															</div>
														</div>
														<div class="form-group row tight">
															<label class="col-lg-4 col-form-label-custom">Motorik</label>
															<div class="col-lg-8">
																<textarea readonly name="rm_motorik" id="rm-motorik" class="custom-textarea" rows="4"></textarea>
															</div>
														</div>
														<div class="form-group row tight">
															<label class="col-lg-4 col-form-label-custom">Reflek Patologis</span></label>
															<div class="col-lg-8">
																<textarea readonly name="rm_reflek_patologis" id="rm-reflek-patologis" class="custom-textarea" rows="4"></textarea>
															</div>
														</div>
														<div class="form-group row tight">
															<label class="col-lg-4 col-form-label-custom">Otonom</span></label>
															<div class="col-lg-8">
																<textarea readonly name="rm_otonom" id="rm-otonom" class="custom-textarea" rows="4"></textarea>
															</div>
														</div>
													</div>
												</div>
											</div>
											<hr>

											<h6><b>IV. PEMERIKSAAN ANAK</b></h6>
											<button class="btn btn-info btn-xxs" type="button" data-toggle="collapse" data-target="#pemeriksaanAnak" aria-expanded="false"
													aria-controls="pemeriksaanAnak">
												<i class="fas fa-expand m-r-5"></i>Open Input Pemeriksaan Anak
											</button>
											<div class="collapse" id="pemeriksaanAnak">
												<div class="row mt-2">
													<div class="col-lg-6">
														<div class="form-group row tight">
															<label class="col-lg-4 col-form-label-custom">Riwayat Kelahiran</label>
															<div class="col-lg-8">
																<textarea readonly name="rm_riwayat_kelahiran" id="rm-riwayat-kelahiran" class="custom-textarea" rows="4"></textarea>
															</div>
														</div>
														<div class="form-group row tight">
															<label class="col-lg-4 col-form-label-custom">Riwayat Nutrisi</label>
															<div class="col-lg-8">
																<textarea readonly name="rm_riwayat_nutrisi" id="rm-riwayat-nutrisi" class="custom-textarea" rows="4"></textarea>
															</div>
														</div>
													</div>
													<div class="col-lg-6">
														<div class="form-group row tight">
															<label class="col-lg-4 col-form-label-custom">Riwayat Imunisasi</label>
															<div class="col-lg-8">
																<textarea readonly name="rm_riwayat_imunisasi" id="rm-riwayat-imunisasi" class="custom-textarea" rows="4"></textarea>
															</div>
														</div>
														<div class="form-group row tight">
															<label class="col-lg-4 col-form-label-custom">Riwayat Tumbuh Kembang</label>
															<div class="col-lg-8">
																<textarea readonly name="rm_riwayat_tumbuh_kembang" id="rm-riwayat-tumbuh-kembang" class="custom-textarea" rows="4"></textarea>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<!-- End Form Anamnesa -->

							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-window-close"></i> Keluar</button>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>

<?php $this->load->view( 'pasien/riwayat/js' ); ?>
