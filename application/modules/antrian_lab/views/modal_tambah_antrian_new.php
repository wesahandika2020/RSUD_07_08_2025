<style>
	.btn-container {
		display: flex;
		flex-direction: column;
		gap: 2rem;
		margin: 2rem 0;
	}

	.btn-container button {
		font-size: 100px;
		border-radius: 20px;
	}
</style>

<div class="card">
	<div class="card-body">
		<!-- <div class="h-100 d-flex justify-content-center align-items-center"> -->
			<!-- <div class="btn-container">
				<button class="btn btn-info bold waves-effect waves-light" id="btn-antrian">Ambil Antrian</button>
				<button class="btn btn-success bold waves-effect waves-light" id="btn-hasil">Ambil Hasil</button>
			</div> -->
            <!-- <div class="modal-body bg-default"> -->
				<?= form_open('', 'id=form-tambah-antrian-lab role=form class=form-horizontal') ?>
				<input type="hidden" id="jenis-identitas" name="jenis_identitas">
				<div class="row">
					<div class="col">
						<div class="list-group m-b-10">
							<li class="list-group-item bg-theme text-white" id="form-header">
								<i class="far fa-id-card m-r-5"></i>
								<b>Data Pasien</b>
							</li>
							<li class="list-group-item border-theme">
								<div class="row">
									<div class="col-md-8">										
									<input type="hidden" id="jenis-tombol">
										<div class="form-group row tight">
											<label for="disabilitas" class="col-md-3 col-form-label">&nbsp;</label>
											<div class="col-md-9">
												<span class="text-red" style="font-size: 12px"><i>*) Pilih terlebih dahulu pilihan di bawah ini, untuk input identitas</i></span>
												<div class="custom-control custom-checkbox m-t-5">
													<div class="row">
														<div class="col-md-3">
															<input type="checkbox" name="chckbx_identitas" class="custom-control-input checkbox-identitas" id="no-rm">
															<label class="custom-control-label" for="no-rm"><i>No Rm</i></label>
														</div>
														<div class="col-md-3">
															<input type="checkbox" name="chckbx_identitas" class="custom-control-input checkbox-identitas" id="nik">
															<label class="custom-control-label" for="nik"><i>NIK</i></label>
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="form-group row tight">
											<label for="no-identitas" class="col-md-3 col-form-label">No Identitas</label>
											<div class="col-md-9">
												<input type="text" name="no_identitas" id="no-identitas" class="form-control col-md-8" placeholder="No Identitas">
											</div>
										</div>

										<!--										<div class="form-group row tight">-->
										<!--											<label for="no-tanggal-lahir" class="col-md-3 col-form-label">Tanggal Lahir</label>-->
										<!--											<div class="col-md-9">-->
										<!--												<input type="text" name="tanggal_lahir" id="no-tanggal-lahir" class="form-control col-md-8" placeholder="08/12/2023" maxlength="10" disabled>-->
										<!--											</div>-->
										<!--										</div>-->

										<div class="form-group row tight hide">
											<label for="norm" class="col-md-3 col-form-label">No Rekam Medis</label>
											<div class="col-md-9">
												<input type="text" name="norm" id="norm" class="form-control col-md-8" placeholder="No Rekam Medis" disabled readonly>
											</div>
										</div>

										<div class="form-group row tight hide">
											<label for="nama-pasien" class="col-md-3 col-form-label">Nama Pasien</label>
											<div class="col-md-9">
												<input type="text" name="nama_pasien" id="nama-pasien" class="form-control col-md-8" placeholder="Nama Pasien" disabled readonly>
											</div>
										</div>

										<div class="form-group row tight hide">
											<label for="kelamin" class="col-md-3 col-form-label">Jenis Kelamin</label>
											<div class="col-md-9">
												<input type="text" name="kelamin" id="kelamin" class="form-control col-md-8" placeholder="Jenis Kelamin" disabled readonly>
											</div>
										</div>

										<div class="form-group row tight hide">
											<label for="tgl-lahir-pasien" class="col-md-3 col-form-label">Tanggal Lahir</label>
											<div class="col-md-9">
												<input type="date" name="tgl_lahir_pasien" id="tgl-lahir-pasien" class="form-control col-md-8" placeholder="Tgl Lahir" disabled readonly>
											</div>
										</div>

										<div class="form-group row tight hide">
											<label for="alamat" class="col-md-3 col-form-label">Alamat</label>
											<div class="col-md-9">
												<textarea name="alamat" id="alamat" class="form-control  col-md-8" placeholder="Alamat" disabled readonly></textarea>
											</div>
										</div>

										<style>
											.blink {
												animation: blink .5s 3;
											}

											@keyframes blink {
												0% {
													color: red;
												}

												20% {
													color: green;
												}

												40% {
													color: yellow;
												}

												60% {
													color: blue;
												}

												80% {
													color: orange;
												}

												100% {
													color: red;
												}
											}
										</style>

										<div style="display: flex; flex-direction:column;" id="warning-alert-pasien">
											<b style="font-size: large; color: red;" class="blink">WARNING!</b>
											<b style="font-size: large; color: red;" class="blink">Layar Sangat Sensitif</b>
											<b style="font-size: large; color: red;" class="blink">Pastikan Hanya Jari Telunjuk Yang Menyentuh Layar</b>
										</div>
									</div>
									<div class="col-md-4">
										<style>
											.btn-group>* {
												font-size: 20px;
												font-weight: bold;
											}
										</style>
										<div style="display: flex; height: 100%">
											<div class="btn-group-vertical w-100" role="group" aria-label="Basic example">
												<div class="btn-group">
													<button type="button" class="btn btn-outline-dark py-3 btn-numpad btn-lg" value="1" style="font-size: 20px;">1</button>
													<button type="button" class="btn btn-outline-dark py-3 btn-numpad btn-lg" value="2" style="font-size: 20px;">2</button>
													<button type="button" class="btn btn-outline-dark py-3 btn-numpad btn-lg" value="3" style="font-size: 20px;">3</button>
												</div>
												<div class="btn-group">
													<button type="button" class="btn btn-outline-dark py-3 btn-numpad btn-lg" value="4" style="font-size: 20px;">4</button>
													<button type="button" class="btn btn-outline-dark py-3 btn-numpad btn-lg" value="5" style="font-size: 20px;">5</button>
													<button type="button" class="btn btn-outline-dark py-3 btn-numpad btn-lg" value="6" style="font-size: 20px;">6</button>
												</div>
												<div class="btn-group">
													<button type="button" class="btn btn-outline-dark py-3 btn-numpad btn-lg" value="7" style="font-size: 20px;">7</button>
													<button type="button" class="btn btn-outline-dark py-3 btn-numpad btn-lg" value="8" style="font-size: 20px;">8</button>
													<button type="button" class="btn btn-outline-dark py-3 btn-numpad btn-lg" value="9" style="font-size: 20px;">9</button>
												</div>
												<div class="btn-group">
													<button type="button" class="btn btn-outline-dark py-3 btn-numpad btn-lg" value="0" style="font-size: 20px;">0</button>
													<button type="button" class="btn btn-danger py-3 btn-numpad btn-lg" value="clear" style="font-size: 20px;">Hapus</button>
												</div>
												<div class="btn-group" style="margin-top: 1rem;">
													<button type="button" class="btn btn-info py-3 btn-numpad btn-lg" style="font-size: 20px;" id="btn-cek-data-numpad">Check Identitas</button>
													<button type="button" class="btn btn-info py-3 btn-numpad btn-lg hide" style="font-size: 20px;" id="btn-process-numpad"><label id="label-btn-process"></label></button>
													<button type="button" class="btn btn-warning py-3 btn-numpad btn-lg hide" style="font-size: 20px;" id="btn-reset-user-input-numpad"><i class="fas fa-undo"></i>&nbsp;Reset</button>
												</div>
											</div>
										</div>
									</div>
								</div>
							</li>
						</div>
					</div>
				</div>
				<?= form_close() ?>
			<!-- </div> -->



		<!-- </div> -->
	</div>
</div>

<?php
$this->load->view('js_tambah');
$this->load->view('js_master');
$this->load->view('modal');
?>
