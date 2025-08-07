<!-- Modal Profil Ringkas Medis Rawat Jalan Pasien -->
<style type="text/css">
	#profil-ringkas-scroll {
    max-height: 600px;
    min-height: 500px;
    overflow-y: auto;
    overflow-x: none;
}
</style>
<div id="modal-profil-ringkas" class="modal fade" role="dialog" aria-labelledby="modal-profil-ringkas-label" aria-hidden="true">
	<div class="modal-dialog" style="min-width: 98%">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="modal-profil-ringkas-label">Profil Ringkas Medis Rawat Jalan Pasien | <span id="judul-profil"></span></h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-lg-10" role="main" id="profil-ringkas-scroll">
						<input type="hidden" id="id-profil-rm">
						<input type="hidden" id="no-rm">
						<div style="display: flex; justify-content: flex-end; gap: 1rem">
							<button class="btn btn-secondary" id="btn-cetak-prmrj">
								<i class="fas fa-print mr-1"></i>
								Cetak PRMRJ
							</button>
							<ul class="nav nav-pills justify-content-end" id="tabProfilRingkas">
								<li class="nav-item" id="pasien-tab">
									<!-- <a href="#tab-pasien" class="nav-link active" data-toggle="tab">Data Pasien</a> -->
								</li>
								<li class="nav-item" id="profil-tab">
									<a href="#tab-detail-profil-ringkas" class="nav-link" data-toggle="tab">Data Profil</a>
								</li>
							</ul>
						</div>
						<hr>
						<div class="tab-content">
							<div id="tab-pasien" class="tab-pane active">
								<div class="row">
								</div>
							</div>
							<div id="tab-detail-profil-ringkas" class="tab-pane">
								<div id="profil-ringkas-area"></div>
							</div>
						</div>
					</div>
					<div class="col-lg-2">
						<div class="bs-docs-sidebar hidden-print" role="complementary">
							<span class="title_nav_side">Tanggal Kunjungan</span>
							<div id="profil-ringkas-scroll">
								<ul class="nav bs-docs-sidenav" id="list-profil-ringkas">

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
<!-- End Modal profil ringkas Pasien -->

<!-- Modal Anamnesa Pasien-->
<div id="modal-detail-catatan-penting" class="modal bounceInDown animated" role="dialog" data-backdrop="static" aria-labelledby="modal-detail-catatan-label" aria-hidden="true">
	<div class="modal-dialog modal-dialog-scrollable" style="max-width: 98%">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="modal-detail-catatan-penting-label"></h4>
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
								<div class="table-catatan-penting-anamnesa">
									<div class="row">
										<div class="col-lg-12">
											<h5 class="center"><b>DETAIL CATATAN</b></h5>
											<hr>
											<table class="table table-sm table-detail table-striped" width="100%">
												<tr>
													<td width="150px"><b>Pasien</b></td>
													<td width="1px">:</td>
													<td><span id="dprof-id-pasien"></span></td>
												</tr>
											</table>
											<br>

											<h6><b>I. Catatan Penting</b></h6>
											<button class="btn btn-info btn-xxs" type="button" data-toggle="collapse" data-target="#catatanPenting" aria-expanded="false"
													aria-controls="catatanPenting">
												<i class="fas fa-expand m-r-5"></i>Buka Catatan
											</button>
											<div class="collapse" id="catatanPenting">
												<div class="row">
													<div class="col-lg-6">
														<div class="form-group row tight">
															<label class="col-lg-4 col-form-label-custom">Keadaan Umum</label>
															<div class="col-lg-8">
																<textarea readonly id="dprof-keadaan-umum" class="custom-textarea" rows="4"></textarea>
															</div>
														</div>
														<div class="form-group row tight">
															<label class="col-lg-4 col-form-label-custom">Kesadaran</label>
															<div class="col-lg-8">
																<textarea readonly id="dprof-kesadaran" class="custom-textarea" rows="4"></textarea>
															</div>
														</div>
														<div class="form-group row tight">
															<label class="col-lg-4 col-form-label-custom">GCS</label>
															<div class="col-lg-8">
																<textarea readonly id="dprof-gcs" class="custom-textarea" rows="4"></textarea>
															</div>
														</div>
														<div class="form-group row tight">
															<label class="col-lg-4 col-form-label-custom">Kepala</label>
															<div class="col-lg-8">
																<textarea readonly id="dprof-kepala" class="custom-textarea" rows="4"></textarea>
															</div>
														</div>
														<div class="form-group row tight">
															<label class="col-lg-4 col-form-label-custom">Thorax</label>
															<div class="col-lg-8">
																<textarea readonly id="dprof-thorax" class="custom-textarea" rows="4"></textarea>
															</div>
														</div>
														<div class="form-group row tight">
															<label class="col-lg-4 col-form-label-custom">Cor</label>
															<div class="col-lg-8">
																<textarea readonly id="dprof-cor" class="custom-textarea" rows="4"></textarea>
															</div>
														</div>
														<div class="form-group row tight">
															<label class="col-lg-4 col-form-label-custom">Genitalia</label>
															<div class="col-lg-8">
																<textarea readonly id="dprof-genitalia" class="custom-textarea" rows="4"></textarea>
															</div>
														</div>
														<div class="form-group row tight">
															<label class="col-lg-4 col-form-label-custom">Pemeriksaan Penunjang</label>
															<div class="col-lg-8">
																<textarea readonly id="dprof-pemeriksaan-penunjang" class="custom-textarea" rows="4"></textarea>
															</div>
														</div>
														<div class="form-group row tight">
															<label class="col-lg-4 col-form-label-custom">Status Mentalis</label>
															<div class="col-lg-8">
																<textarea readonly id="dprof-status-mentalis" class="custom-textarea" rows="4"></textarea>
															</div>
														</div>
														<div class="form-group row tight">
															<label class="col-lg-4 col-form-label-custom">Status Gizi</label>
															<div class="col-lg-8">
																<textarea readonly id="dprof-status-gizi" class="custom-textarea" rows="4"></textarea>
															</div>
														</div>
														<div class="form-group row tight">
															<label class="col-lg-4 col-form-label-custom">Hidung</label>
															<div class="col-lg-8">
																<textarea readonly id="dprof-hidung" class="custom-textarea" rows="4"></textarea>
															</div>
														</div>
														<div class="form-group row tight">
															<label class="col-lg-4 col-form-label-custom">Mata</label>
															<div class="col-lg-8">
																<textarea readonly id="dprof-mata" class="custom-textarea" rows="4"></textarea>
															</div>
														</div>
													</div>
													<div class="col-lg-6">
														<div class="form-group row tight">
															<label class="col-lg-4 col-form-label-custom">Alergi</label>
															<div class="col-lg-8">
																<textarea readonly id="dprof-alergi" class="custom-textarea" rows="4"></textarea>
															</div>
														</div>
														<div class="form-group row tight">
															<label class="col-lg-4 col-form-label-custom">Respirasi Rate</label>
															<div class="col-lg-8">
																<textarea readonly id="dprof-rr" class="custom-textarea" rows="4"></textarea>
															</div>
														</div>
														<div class="form-group row tight">
															<label class="col-lg-4 col-form-label-custom">Leher</label>
															<div class="col-lg-8">
																<textarea readonly id="dprof-leher" class="custom-textarea" rows="4"></textarea>
															</div>
														</div>
														<div class="form-group row tight">
															<label class="col-lg-4 col-form-label-custom">Pulmo</label>
															<div class="col-lg-8">
																<textarea readonly id="dprof-pulmo" class="custom-textarea" rows="4"></textarea>
															</div>
														</div>
														<div class="form-group row tight">
															<label class="col-lg-4 col-form-label-custom">Abdomen</label>
															<div class="col-lg-8">
																<textarea readonly id="dprof-abdomen" class="custom-textarea" rows="4"></textarea>
															</div>
														</div>
														<div class="form-group row tight">
															<label class="col-lg-4 col-form-label-custom">Ekstrimitas</label>
															<div class="col-lg-8">
																<textarea readonly id="dprof-ekstrimitas" class="custom-textarea" rows="4"></textarea>
															</div>
														</div>
														<div class="form-group row tight">
															<label class="col-lg-4 col-form-label-custom">Prognosis</label>
															<div class="col-lg-8">
																<textarea readonly id="dprof-prognosis" class="custom-textarea" rows="4"></textarea>
															</div>
														</div>
														<div class="form-group row tight">
															<label class="col-lg-4 col-form-label-custom">Lingkar Kepala</label>
															<div class="col-lg-8">
																<textarea readonly id="dprof-lingkar-kepala" class="custom-textarea" rows="4"></textarea>
															</div>
														</div>
														<div class="form-group row tight">
															<label class="col-lg-4 col-form-label-custom">Telinga</label>
															<div class="col-lg-8">
																<textarea readonly id="dprof-telinga" class="custom-textarea" rows="4"></textarea>
															</div>
														</div>
														<div class="form-group row tight">
															<label class="col-lg-4 col-form-label-custom">Tenggorok</label>
															<div class="col-lg-8">
																<textarea readonly id="dprof-tenggorok" class="custom-textarea" rows="4"></textarea>
															</div>
														</div>
														<div class="form-group row tight">
															<label class="col-lg-4 col-form-label-custom">Kulit Kelamin</label>
															<div class="col-lg-8">
																<textarea readonly id="dprof-kulit-kelamin" class="custom-textarea" rows="4"></textarea>
															</div>
														</div>
													</div>
												</div>
											</div>
											<hr>
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
				<button type="button" class="btn btn-secondary waves-effect" id="dprof-modal"><i class="fas fa-window-close"></i> Keluar</button>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>





<?php $this->load->view('pemeriksaan_poli/profil/js'); ?>
