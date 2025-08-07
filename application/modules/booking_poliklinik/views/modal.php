<input type="hidden" id="data-booking">

<style>
	.modal-fullscreen {
		width: 100vw;
		max-width: none;
		height: 100%;
		margin: 0;
	}

	.modal-fullscreen .modal-content {
		height: 100%;
		border: 0;
		border-radius: 0;
	}
</style>

<!-- Modal Tambah Booking -->
<div id="modal-tambah-booking" class="modal fade" role="dialog" aria-labelledby="modal-search-label" aria-hidden="true">
	<div class="modal-dialog modal-fullscreen">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="modal-tambah-booking-label"></h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			</div>
			<div class="modal-body bg-default">
				<?= form_open('', 'id=form-tambah-booking role=form class=form-horizontal') ?>
				<input type="hidden" id="jenis-identitas" name="jenis_identitas">
				<input type="hidden" id="penjamin" name="penjamin">
				<div class="row">
					<div class="col">
						<div class="list-group m-b-10">
							<li class="list-group-item bg-theme text-white">
								<i class="far fa-id-card m-r-5"></i>
								<b>Data Pasien Booking</b>
							</li>
							<li class="list-group-item border-theme">
								<div class="row">
									<div class="col-md-8">

										<div class="form-group row" style="margin: 0">
											<label for="" class="col-md-3 col-form-label">&nbsp;</label>
											<div class="col-md-9" style="padding: .3rem">
												<span class="text-red" style="font-size: 12px;"><i>*) Pilih terlebih dahulu pilihan di bawah ini sebelum melanjutkan</i></span>
											</div>
										</div>


										<div class="form-group row tight">
											<label for="tunai" class="col-md-3 col-form-label">Jenis Pejamin</label>
											<div class="col-md-9">
												<div class="custom-control custom-checkbox">
													<div class="row">
														<div class="col-md-4">
															<input type="checkbox" name="chckbx_pnjmin" class="custom-control-input checkbox-penjamin" id="tunai">
															<label class="custom-control-label" for="tunai"><i>Umum</i></label>
														</div>
														<div class="col-md-4">
															<input type="checkbox" name="chckbx_pnjmin" class="custom-control-input checkbox-penjamin" id="bpjs">
															<label class="custom-control-label" for="bpjs"><i>BPJS Kesehatan</i></label>
														</div>
														<div class="col-md-4">
															<input type="checkbox" name="chckbx_pnjmin" class="custom-control-input checkbox-penjamin" id="lainnya">
															<label class="custom-control-label" for="lainnya"><i>Lainnya...</i></label>
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="form-group row tight hide">
											<label for="penjamin-lainnya" class="col-md-3 col-form-label">Penjamin Lainnya</label>
											<?php
											$query = $this->db->query("select id, nama from sm_penjamin where id_jenis_penjamin not in (3,4,5) and id not in (1,9)");
											$dataPenjamin = $query->result();
											?>
											<div class="col-md-9">
												<select name="penjamin_lainnya" id="penjamin-lainnya" class="form-control col-md-8">
													<option value="" selected disabled>Penjamin Lainnya...</option>
													<?php foreach ($dataPenjamin as $penjamin) : ?>
														<option value="<?= $penjamin->id ?>"><?= $penjamin->nama ?></option>
													<?php endforeach; ?>
												</select>
											</div>
										</div>

										<div class="form-group row tight">
											<label for="disabilitas" class="col-md-3 col-form-label">&nbsp;</label>
											<div class="col-md-9">
												<span class="text-red" style="font-size: 12px"><i>*) Pilih terlebih dahulu pilihan di bawah ini, untuk input identitas</i></span>
												<div class="custom-control custom-checkbox m-t-5">
													<div class="row">
														<div class="col-md-3">
															<input type="checkbox" name="chckbx_identitas" class="custom-control-input checkbox-identitas" id="no-rm" disabled>
															<label class="custom-control-label" for="no-rm"><i>No Rm</i></label>
														</div>
														<div class="col-md-3">
															<input type="checkbox" name="chckbx_identitas" class="custom-control-input checkbox-identitas" id="nik" disabled>
															<label class="custom-control-label" for="nik"><i>NIK</i></label>
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="form-group row tight">
											<label for="no-identitas" class="col-md-3 col-form-label">No Identitas</label>
											<div class="col-md-9">
												<input type="text" name="no_identitas" id="no-identitas" class="form-control col-md-8" placeholder="No Identitas" disabled>
											</div>
										</div>

										<!--										<div class="form-group row tight">-->
										<!--											<label for="no-tanggal-lahir" class="col-md-3 col-form-label">Tanggal Lahir</label>-->
										<!--											<div class="col-md-9">-->
										<!--												<input type="text" name="tanggal_lahir" id="no-tanggal-lahir" class="form-control col-md-8" placeholder="08/12/2023" maxlength="10" disabled>-->
										<!--											</div>-->
										<!--										</div>-->

										<div class="form-group row tight hide">
											<label for="nama-pasien" class="col-md-3 col-form-label">Nama Pasien</label>
											<div class="col-md-9">
												<input type="text" name="nama_pasien" id="nama-pasien" class="form-control col-md-8" placeholder="No Identitas" disabled readonly>
											</div>
										</div>

										<div class="form-group row tight hide">
											<label for="tgl-lahir-pasien" class="col-md-3 col-form-label">Tanggal Lahir</label>
											<div class="col-md-9">
												<input type="date" name="tgl_lahir_pasien" id="tgl-lahir-pasien" class="form-control col-md-8" placeholder="No Identitas" disabled readonly>
											</div>
										</div>

										<div class="form-group row tight hide">
											<label for="no-bpjs" class="col-md-3 col-form-label">No BPJS</label>
											<div class="col-md-9">
												<input type="text" name="no_bpjs" id="no-bpjs" class="form-control col-md-8" maxlength="13" disabled readonly>
											</div>
										</div>

										<div class="form-group row tight hide">
											<label for="telp" class="col-md-3 col-form-label">No. HP (Yang memiliki WhatsApp)</label>
											<div class="col-md-9">
												<input type="tel" pattern="^08\d{2}-\d{4}-\d{4}$" name="telp" id="telp" class="form-control col-md-8" placeholder="0812xxxxxxxxx">
											</div>
										</div>

										<div class="form-group row tight hide">
											<label for="etnis" class="col-md-3 col-form-label">Etnis <span class="text-red">*</span></label>
											<div class="col-md-9">
												<select class="custom-select form-control col-md-8" id="etnis" name="etnis">
													<option selected value="">Pilih Etnis</option>
												</select>
											</div>
										</div>

										<div class="form-group row tight hide">
											<label for="etnis_lainnya" class="col-md-3 col-form-label">Etnis Lainnya</label>
											<div class="col-md-9">
												<input type="text" name="etnis_lainnya" id="etnis-lainnya" class="form-control reset-field col-md-8">
											</div>
										</div>
										
										<div class="form-group row hide" style="margin: 0" id="imp-rawat-inap">
											<label for="" class="col-md-3 col-form-label">&nbsp;</label>
											<div class="col-md-9" style="padding: .3rem">
												<span class="text-red" style="font-size: 12px;"><i>*) Pilih jika pasien ingin melakukan kontrol dari Rawat Inap</i></span>
											</div>
										</div>

										<div class="form-group row tight hide">
											<label for="is-kontrol-rawat-inap" class="col-md-3 col-form-label">Apakah Pasien Ingin Kontrol Dari Rawat Inap?</label>
											<div class="col-md-9">
												<div class="custom-control custom-checkbox m-t-5">
													<input type="checkbox" name="is_kontrol_rawat_inap" class="custom-control-input" id="is-kontrol-rawat-inap" value="1" disabled>
													<label class="custom-control-label" for="is-kontrol-rawat-inap"><i>Centang jika pasien kontrol rawat inap</i></label>
												</div>
											</div>
										</div>


										<div class="form-group row tight hide">
											<label for="disabilitas" class="col-md-3 col-form-label">Apakah Pasien Disabilitas?</label>
											<div class="col-md-9">
												<div class="custom-control custom-checkbox m-t-5">
													<input type="checkbox" name="disabilitas" class="custom-control-input" id="disabilitas" value="1" disabled>
													<label class="custom-control-label" for="disabilitas"><i>Centang jika pasien disabilitas</i></label>
												</div>
											</div>
										</div>

										<div class="form-group row tight hide">
											<label for="disabilitas" class="col-md-3 col-form-label">Apakah Pasien Disabilitas?</label>
											<div class="col-md-9">
												<div class="custom-control custom-checkbox m-t-5">
													<input type="checkbox" name="disabilitas" class="custom-control-input" id="disabilitas" value="1" disabled>
													<label class="custom-control-label" for="disabilitas"><i>Centang jika pasien disabilitas</i></label>
												</div>
											</div>
										</div>

										<div class="form-group row tight hide">
											<label for="hamkom" class="col-md-3 col-form-label">Hambatan</label>
											<div class="col-md-9">
												<select name="hamkom" class="custom-select reset-select col-md-8" id="hamkom">
													<option selected disabled>Pilih Hambatan dalam Komunikasi</option>
													<option value="Bahasa">Bahasa</option>
													<option value="Tunarungu">Tunarungu</option>
													<option value="Tunagrahita">Tunagrahita (Keterbelakangan Mental)</option>
													<option value="Lain - lain">Lain - lain</option>
												</select>
											</div>
										</div>

										<div class="form-group row tight hide">
											<label for="hamkom_lainnya" class="col-md-3 col-form-label">Hambatan Lainnya</label>
											<div class="col-md-9">
												<input type="text" name="hamkom_lainnya" id="hamkom-lainnya" class="form-control reset-field col-md-8">
											</div>
										</div>

										<div class="form-group row tight autoshow" id="bt_search_nik" style="">
											<label for="" class="col-md-3 col-form-label"></label>
											<div class="col-md-9">
												<!--												<button class="btn btn-info" type="button" id="btn-cek-data"><i class="fas fa-search"></i>&nbsp;Check identitas</button>-->
												<!--												<button class="btn btn-info hide" type="button" id="btn-process"><i class="fas fa-arrow-right"></i>&nbsp;Process</button>-->
												<!--												<button class="btn btn-warning hide" type="button" id="btn-reset-user-input"><i class="fas fa-undo"></i>&nbsp;Reset</button>-->
												<!--												<button class="btn btn-info hide" type="button" id="btn-cek-rujukan"><i class="fas fa-search"></i>&nbsp;Check Rujukan</button>-->
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
													<button type="button" class="btn btn-outline-dark py-3 btn-numpad-booking btn-lg" value="1" style="font-size: 20px;">1</button>
													<button type="button" class="btn btn-outline-dark py-3 btn-numpad-booking btn-lg" value="2" style="font-size: 20px;">2</button>
													<button type="button" class="btn btn-outline-dark py-3 btn-numpad-booking btn-lg" value="3" style="font-size: 20px;">3</button>
												</div>
												<div class="btn-group">
													<button type="button" class="btn btn-outline-dark py-3 btn-numpad-booking btn-lg" value="4" style="font-size: 20px;">4</button>
													<button type="button" class="btn btn-outline-dark py-3 btn-numpad-booking btn-lg" value="5" style="font-size: 20px;">5</button>
													<button type="button" class="btn btn-outline-dark py-3 btn-numpad-booking btn-lg" value="6" style="font-size: 20px;">6</button>
												</div>
												<div class="btn-group">
													<button type="button" class="btn btn-outline-dark py-3 btn-numpad-booking btn-lg" value="7" style="font-size: 20px;">7</button>
													<button type="button" class="btn btn-outline-dark py-3 btn-numpad-booking btn-lg" value="8" style="font-size: 20px;">8</button>
													<button type="button" class="btn btn-outline-dark py-3 btn-numpad-booking btn-lg" value="9" style="font-size: 20px;">9</button>
												</div>
												<div class="btn-group">
													<button type="button" class="btn btn-outline-dark py-3 btn-numpad-booking btn-lg" value="0" style="font-size: 20px;">0</button>
													<button type="button" class="btn btn-danger py-3 btn-numpad-booking btn-lg" value="clear" style="font-size: 20px;">Hapus</button>
												</div>
												<div class="btn-group" style="margin-top: 1rem;">
													<button type="button" class="btn btn-info py-3 btn-numpad-booking btn-lg" style="font-size: 20px;" id="btn-cek-data-numpad">Check Identitas</button>
													<button type="button" class="btn btn-info py-3 btn-numpad-booking btn-lg hide" style="font-size: 20px;" id="btn-process-numpad"><i class="fas fa-arrow-right"></i>&nbsp;Process</button>
													<button type="button" class="btn btn-warning py-3 btn-numpad-booking btn-lg hide" style="font-size: 20px;" id="btn-reset-user-input-numpad"><i class="fas fa-undo"></i>&nbsp;Reset</button>
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
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-window-close"></i> Keluar</button>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- End Modal Tambah Antrean -->

<!-- Modal Input Manual Pasien UMUM -->
<div id="modal-input-manual-pasien-umum" class="modal fade" role="dialog" aria-labelledby="modal-search-label" aria-hidden="true">
	<div class="modal-dialog" style="max-width: 80%">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="modal-input-manual-pasien-umum-label"></h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			</div>
			<div class="modal-body bg-default">
				<?= form_open('', 'id=form-input-booking-pasien-umum role=form class=form-horizontal') ?>
				<div class="row">
					<div class="col">
						<div class="list-group m-b-10">
							<li class="list-group-item bg-theme text-white">
								<i class="far fa-id-card m-r-5"></i>
								<b>Input Data Booking</b>
							</li>
							<li class="list-group-item border-theme">
								<div class="row">
									<div class="col">

										<div class="form-group row tight">
											<label for="no-identitas" class="col-md-3 col-form-label">Tanggal Booking</label>
											<div class="col-md-9">
												<input type="text" name="tanggal_booking" id="tanggal-booking" class="form-control col-md-8" placeholder="08/12/2023" maxlength="10">
											</div>
										</div>

										<div class="form-group row tight">
											<label for="layanan_auto" class="col-md-3 col-form-label">Klinik <span class="text-red">*</span></label>
											<div class="col-md-9">
												<input type="text" name="layanan" id="layanan_auto" class="select2-input col-md-8" placeholder="Tempat Layanan" style="padding: 0">
											</div>
										</div>

										<div class="form-group row tight">
											<label for="dokter" class="col-md-3 col-form-label">Dokter <span class="text-red">*</span></label>
											<div class="col-md-9">
												<select name="dokter" class="custom-select reset-select col-md-8" id="dokter">
													<option value="">Pilih Dokter</option>
												</select>
											</div>
										</div>

									</div>
								</div>
							</li>
						</div>
					</div>
				</div>
				<?= form_close() ?>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-window-close"></i> Keluar</button>
				<button type="button" class="btn btn-info waves-effect" id="simpan-input-manual-booking"><i class="fas fa-save"></i> Simpan</button>

			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- End Input Manual Pasien UMUM -->

<!-- Modal List Rujukan -->
<div id="modal-list-rujukan" class="modal fade" role="dialog" aria-labelledby="modal-search-label" aria-hidden="true">
	<div class="modal-dialog" style="max-width: 50%">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="modal-list-rujukan-label"></h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			</div>
			<div class="modal-body bg-default">
				<?= form_open('', 'id=form-list-rujukan role=form class=form-horizontal') ?>
				<input type="hidden" id="no-bpjs2" name="no_bpjs">
				<table id="table-list-rujukan" class="table table-hover table-striped table-sm color-table info-table">
					<thead>
						<tr>
							<th>no</th>
							<th>nomor rujukan</th>
							<th>Poliklinik</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
					</tbody>
				</table>

				<?= form_close() ?>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-window-close"></i> Keluar</button>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- End Modal List Rujukan -->

<!-- Modal List SKD -->
<div id="modal-list-skd" class="modal fade" role="dialog" aria-labelledby="modal-search-label" aria-hidden="true">
	<div class="modal-dialog" style="max-width: 50%">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="modal-list-skd-label"></h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			</div>
			<div class="modal-body bg-default">
				<?= form_open('', 'id=form-list-skd role=form class=form-horizontal') ?>
				<input type="hidden" id="no-bpjs2" name="no_bpjs">
				<table id="table-list-skd" class="table table-hover table-striped table-sm color-table info-table">
					<thead>
						<tr>
							<th>no</th>
							<th>Poli</th>
							<th>Dokter</th>
							<th>Tanggal</th>
							<th>Status</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
					</tbody>
				</table>

				<?= form_close() ?>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-window-close"></i> Keluar</button>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- End Modal List SKD -->

<!-- Modal Input kontrol baru -->
<div id="modal-input-kontrol-baru" class="modal fade" role="dialog" aria-labelledby="modal-search-label" aria-hidden="true">
	<div class="modal-dialog" style="max-width: 80%">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="modal-input-kontrol-baru-label"></h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			</div>
			<div class="modal-body bg-default">
				<?= form_open('', 'id=form-input-kontrol-baru role=form class=form-horizontal') ?>
				<input type="hidden" id="code-bpjs-poli">
				<div class="row">
					<div class="col">
						<div class="list-group m-b-10">
							<li class="list-group-item bg-theme text-white">
								<i class="far fa-id-card m-r-5"></i>
								<b>Input Data Kontrol Baru</b>
							</li>
							<li class="list-group-item border-theme">
								<div class="row">
									<div class="col">

										<div class="form-group row tight">
											<label for="tanggal-kontrol-baru" class="col-md-3 col-form-label">Tanggal Kontrol <span class="text-red">*</span></label>
											<div class="col-md-9">
												<input type="text" name="tanggal_kontrol" id="tanggal-kontrol-baru" class="form-control col-md-8" placeholder="08/12/2023" maxlength="10" value="<?= date('d/m/Y') ?>">
											</div>
										</div>

										<div class="form-group row tight">
											<label for="poli-tujuan-baru" class="col-md-3 col-form-label">Poli Tujuan</label>
											<div class="col-md-9">
												<input type="text" name="poli_tujuan" id="poli-tujuan-baru" class="form-control col-md-8" readonly>
											</div>
										</div>

										<div class="form-group row tight">
											<label for="dokter-input-kontrol-baru" class="col-md-3 col-form-label">Dokter <span class="text-red">*</span></label>
											<div class="col-md-9">
												<select name="dokter_input_kontrol" class="custom-select reset-select col-md-8" id="dokter-input-kontrol-baru">
													<option value="">Pilih Dokter</option>
												</select>
											</div>
										</div>

									</div>
								</div>
							</li>
						</div>
					</div>
				</div>
				<?= form_close() ?>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-window-close"></i> Keluar</button>
				<button type="button" class="btn btn-info waves-effect" id="simpan-input-kontrol-baru"><i class="fas fa-save"></i> Simpan</button>

			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- End Input kontrol baru -->

<!-- Modal Input kontrol -->
<div id="modal-input-kontrol" class="modal fade" role="dialog" aria-labelledby="modal-search-label" aria-hidden="true">
	<div class="modal-dialog" style="max-width: 80%">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="modal-input-kontrol-label"></h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			</div>
			<div class="modal-body bg-default">
				<?= form_open('', 'id=form-input-kontrol role=form class=form-horizontal') ?>
				<input type="hidden" id="code-bpjs-poli">
				<div class="row">
					<div class="col">
						<div class="list-group m-b-10">
							<li class="list-group-item bg-theme text-white">
								<i class="far fa-id-card m-r-5"></i>
								<b>Input Data Kontrol</b>
							</li>
							<li class="list-group-item border-theme">
								<div class="row">
									<div class="col">

										<div class="form-group row tight">
											<label for="tanggal-kontrol" class="col-md-3 col-form-label">Tanggal Kontrol</label>
											<div class="col-md-9">
												<input type="text" name="tanggal_kontrol" id="tanggal-kontrol" class="form-control col-md-8" disabled>
											</div>
										</div>

										<div class="form-group row tight">
											<label for="poli-asal" class="col-md-3 col-form-label">Poli Asal </label>
											<div class="col-md-9">
												<input type="text" name="poli_asal" id="poli-asal" class="form-control col-md-8" disabled>
											</div>
										</div>

										<div class="form-group row tight">
											<label for="poli-tujuan" class="col-md-3 col-form-label">Poli Tujuan </label>
											<div class="col-md-9">
												<input type="text" name="poli_tujuan" id="poli-tujuan" class="form-control col-md-8" disabled>
											</div>
										</div>

										<div class="form-group row tight">
											<label for="dokter-input-kontrol" class="col-md-3 col-form-label">Dokter <span class="text-red">*</span></label>
											<div class="col-md-9">
												<select name="dokter_input_kontrol" class="custom-select reset-select col-md-8" id="dokter-input-kontrol">
													<option value="">Pilih Dokter</option>
												</select>
											</div>
										</div>

										<div class="form-group row tight autoshow" id="btn-benar-salah" style="">
											<label for="" class="col-md-3 col-form-label"></label>
											<div class="col-md-9">
												<button class="btn btn-info btn-lg" type="button" id="btn-data-benar"><i class="far fa-thumbs-up"></i> Data Benar</button>
												<?php if ($this->session->userdata('account_group') === 'Admin') : ?>
													<button class="btn btn-danger btn-lg" type="button" id="btn-data-salah-admin"><i class="fas fa-ban"></i> Data Salah</button>
												<?php else : ?>
													<button class="btn btn-danger btn-lg" type="button" id="btn-data-salah"><i class="fas fa-ban"></i> Data Salah</button>
												<?php endif ?>
											</div>
										</div>

									</div>
								</div>
							</li>
						</div>
					</div>
				</div>
				<?= form_close() ?>
			</div>
			<div class="modal-footer">
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- End Input kontrol -->

<!-- Modal Edit kontrol -->
<div id="modal-input-kontrol-edit" class="modal fade" role="dialog" aria-labelledby="modal-search-label" aria-hidden="true">
	<div class="modal-dialog" style="max-width: 80%">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="modal-input-kontrol-edit-label"></h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			</div>
			<div class="modal-body bg-default">
				<?= form_open('', 'id=form-input-kontrol-edit role=form class=form-horizontal') ?>
				<input type="hidden" id="code-bpjs-poli">
				<div class="row">
					<div class="col">
						<div class="list-group m-b-10">
							<li class="list-group-item bg-theme text-white">
								<i class="far fa-id-card m-r-5"></i>
								<b>Input Data Kontrol</b>
							</li>
							<li class="list-group-item border-theme">
								<div class="row">
									<div class="col">

										<div class="form-group row tight">
											<label for="tanggal-kontrol-edit" class="col-md-3 col-form-label">Tanggal Kontrol <span class="text-red">*</span></label>
											<div class="col-md-9">
												<input type="text" name="tanggal_kontrol_edit" id="tanggal-kontrol-edit" class="form-control col-md-8">
											</div>
										</div>

										<div class="form-group row tight">
											<label for="poli-asal-edit" class="col-md-3 col-form-label">Poli Asal <span class="text-red">*</span></label>
											<div class="col-md-9">
												<input type="text" name="poli_asal_edit" id="poli-asal-edit" placeholder="Poli Asal" class="select2-input col-md-8" style="padding: 0">
											</div>
										</div>

										<div class="form-group row tight">
											<label for="poli-tujuan-edit" class="col-md-3 col-form-label">Poli Tujuan <span class="text-red">*</span></label>
											<div class="col-md-9">
												<input type="text" name="poli_tujuan_edit" id="poli-tujuan-edit" placeholder="Poli tujuan" class="select2-input col-md-8" style="padding: 0">
											</div>
										</div>

										<div class="form-group row tight">
											<label for="dokter-input-kontrol-edit" class="col-md-3 col-form-label">Dokter <span class="text-red">*</span></label>
											<div class="col-md-9">
												<select name="dokter_input_kontrol_edit" class="custom-select reset-select col-md-8" id="dokter-input-kontrol-edit">
													<option value="">Pilih Dokter</option>
												</select>
											</div>
										</div>

										<div class="row mt-3" style="margin-left: .1rem; display: flex; flex-direction: column">
											<div style="display: flex; gap: .5rem;align-items: center;">
												<b>Jumlah Pasien Booking :</b> <span class="badge badge-pill badge-success" id="jml-pasien-booking"></span>
											</div>
											<div style="display: flex; gap: .5rem;align-items: center;">
												<b>Jumlah Pasien Booking (Pending) :</b> <span class="badge badge-pill badge-warning" id="jml-pasien-booking-pending"></span>
											</div>
										</div>
									</div>
								</div>
							</li>
						</div>
					</div>
				</div>
				<?= form_close() ?>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-window-close"></i> Keluar</button>
				<button type="button" class="btn btn-info waves-effect" id="simpan-edit-kontrol"><i class="fas fa-save"></i> Simpan</button>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- End Edit kontrol -->

<!-- Modal Check In Pasien -->

<div id="modal-checkin-pasien" class="modal fade" role="dialog" data-backdrop="static" aria-labelledby="modal-checkin-pasien-label" aria-hidden="true">
	<input type="hidden" name="page_checkin_pasien" id="page-checkin">
	<div class="modal-dialog modal-dialog-scrollable" style="max-width: 95%">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="modal-checkin-pasien-label">List Booking Pasien</h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-lg-8">
						<div class="row">
							<div class="col-lg-7">
								<div class="form-group row tight">
									<label class="col-2 col-form-label" for="input-kode">Kode Booking:</label>
									<div class="col-4">
										<input type="text" class="form-control" id="input-kode">
									</div>
									<div class="col-4">
										<!--										<button style="padding: 0.55rem 0.75rem 0.55rem 0.75rem;" type="button" class="btn btn-info waves-effect" onclick="getKodeBookingPasien()"><i class="fas fa-search"></i>-->
										<!--											Cari-->
										<!--										</button>-->
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-12">

								<label style="font-size: 13px;" class="col-12 col-form-label" id="label-data-pasien"></label>

							</div>
						</div>
						<div class="row">
							<div class="col-12">
								<div class="table-responsive">
									<table id="table-checkin-pasien" class="table table-hover table-striped table-sm color-table info-table">
										<thead>
											<tr>
												<th>Kode Booking</th>
												<th>Nama Pasien</th>
												<th>Poli</th>
												<th>Nama Dokter</th>
												<th>Surat Kontrol</th>
												<th>SEP</th>
												<th>Status Daftar</th>
												<th>Tanggal Booking</th>
												<th>Status</th>
												<th></th>
											</tr>
										</thead>
										<tbody></tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<style>
							.btn-group>* {
								font-size: 20px;
								font-weight: bold;
							}
						</style>
						<div style="display: flex;flex-direction: column; height: 100%">
							<div class="btn-group-vertical w-100" role="group" aria-label="Basic example">
								<div class="btn-group">
									<button type="button" class="btn btn-info py-3 btn-numpad-checkin btn-lg" style="border: 1px solid black; font-size: 20px;" value="A">A</button>
									<button type="button" class="btn btn-info py-3 btn-numpad-checkin btn-lg" style="border: 1px solid black; font-size: 20px;" value="B">B</button>
									<button type="button" class="btn btn-info py-3 btn-numpad-checkin btn-lg" style="border: 1px solid black; font-size: 20px;" value="C">C</button>
									<button type="button" class="btn btn-info py-3 btn-numpad-checkin btn-lg" style="border: 1px solid black; font-size: 20px;" value="H">H</button>

								</div>
							</div>
							<div class="btn-group-vertical w-100" role="group" aria-label="Basic example">
								<div class="btn-group">
									<button type="button" class="btn btn-outline-dark py-3 btn-numpad-checkin btn-lg" value="1" style="font-size: 20px;">1</button>
									<button type="button" class="btn btn-outline-dark py-3 btn-numpad-checkin btn-lg" value="2" style="font-size: 20px;">2</button>
									<button type="button" class="btn btn-outline-dark py-3 btn-numpad-checkin btn-lg" value="3" style="font-size: 20px;">3</button>
								</div>
								<div class="btn-group">
									<button type="button" class="btn btn-outline-dark py-3 btn-numpad-checkin btn-lg" value="4" style="font-size: 20px;">4</button>
									<button type="button" class="btn btn-outline-dark py-3 btn-numpad-checkin btn-lg" value="5" style="font-size: 20px;">5</button>
									<button type="button" class="btn btn-outline-dark py-3 btn-numpad-checkin btn-lg" value="6" style="font-size: 20px;">6</button>
								</div>
								<div class="btn-group">
									<button type="button" class="btn btn-outline-dark py-3 btn-numpad-checkin btn-lg" value="7" style="font-size: 20px;">7</button>
									<button type="button" class="btn btn-outline-dark py-3 btn-numpad-checkin btn-lg" value="8" style="font-size: 20px;">8</button>
									<button type="button" class="btn btn-outline-dark py-3 btn-numpad-checkin btn-lg" value="9" style="font-size: 20px;">9</button>
								</div>
								<div class="btn-group">
									<button type="button" class="btn btn-outline-dark py-3 btn-numpad-checkin btn-lg" value="0" style="font-size: 20px;">0</button>
									<button type="button" class="btn btn-danger btn-numpad-checkin" value="clear" style="font-size: 20px;">Hapus</button>
								</div>
								<div class="btn-group">
									<button type="button" class="btn btn-info btn-numpad-checkin btn-lg" style="font-size: 20px;" onclick="getKodeBookingPasien()">Check-In</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">

				<div class="float-left col-11" style="color: red; font-size:1vw;" id="pasien-text"></div>
				<button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-times-circle"></i> Batal</button>

			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>

<!-- End Check In Pasien -->

<!-- Modal Input kontrol SPRI -->
<div id="modal-input-kontrol-spri" class="modal fade" role="dialog" aria-labelledby="modal-search-label" aria-hidden="true">
	<div class="modal-dialog" style="max-width: 80%">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="modal-input-kontrol-spri-label"></h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			</div>
			<div class="modal-body bg-default">
				<?= form_open('', 'id=form-input-kontrol-spri role=form class=form-horizontal') ?>
				<input type="hidden" id="code-bpjs-poli">
				<div class="row">
					<div class="col">
						<div class="list-group m-b-10">
							<li class="list-group-item bg-theme text-white">
								<i class="far fa-id-card m-r-5"></i>
								<b>Input Data Kontrol SPRI</b>
							</li>
							<li class="list-group-item border-theme">
								<div class="row">
									<div class="col">

										<div class="form-group row tight">
											<label for="tanggal-kontrol" class="col-md-3 col-form-label">Tanggal Kontrol</label>
											<div class="col-md-9">
												<input type="text" name="tanggal_kontrol_spri" id="tanggal-kontrol-spri" class="form-control col-md-8" disabled>
											</div>
										</div>

										<div class="form-group row tight">
											<label for="poli-tujuan" class="col-md-3 col-form-label">Poli Tujuan </label>
											<div class="col-md-9">
												<input type="text" name="poli_tujuan_spri" id="poli-tujuan-spri" class="form-control col-md-8" disabled>
											</div>
										</div>

										<div class="form-group row tight">
											<label for="dokter-input-kontrol" class="col-md-3 col-form-label">Dokter <span class="text-red">*</span></label>
											<div class="col-md-9">
												<select name="dokter_input_kontrol_spri" class="custom-select reset-select col-md-8" id="dokter-input-kontrol-spri">
													<option value="">Pilih Dokter</option>
												</select>
											</div>
										</div>

										<div class="form-group row tight autoshow" id="btn-benar-salah" style="">
											<label for="" class="col-md-3 col-form-label"></label>
											<div class="col-md-9">
												<button class="btn btn-info btn-lg" type="button" id="btn-data-benar-spri"><i class="far fa-thumbs-up"></i> Data Benar</button>
												<?php if ($this->session->userdata('account_group') === 'Admin') : ?>
													<button class="btn btn-danger btn-lg" type="button" id="btn-data-salah-admin"><i class="fas fa-ban"></i> Data Salah</button>
												<?php else : ?>
													<button class="btn btn-danger btn-lg" type="button" id="btn-data-salah"><i class="fas fa-ban"></i> Data Salah</button>
												<?php endif ?>
											</div>
										</div>

									</div>
								</div>
							</li>
						</div>
					</div>
				</div>
				<?= form_close() ?>
			</div>
			<div class="modal-footer">
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- End Input kontrol SPRI -->