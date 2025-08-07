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

<!-- Modal Tambah Antrian Lab -->
<div id="modal-tambah-antrian-lab" class="modal fade" role="dialog" aria-labelledby="modal-search-label" aria-hidden="true">
	<div class="modal-dialog modal-fullscreen">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="modal-tambah-antrian-lab-label"></h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			</div>
			<div class="modal-body bg-default">
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

<!-- Modal List Poli -->
<div id="modal-list-poli" class="modal fade" role="dialog" aria-labelledby="modal-search-label" aria-hidden="true">
	<div class="modal-dialog" style="max-width: 50%">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="modal-list-poli-label"></h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			</div>
			<div class="modal-body bg-default">
				<?= form_open('', 'id=form-list-poli role=form class=form-horizontal') ?>
				<table id="table-list-poli" class="table table-hover table-striped table-sm color-table info-table">
					<thead>
						<tr>
							<th class="center">No</th>
							<th class="center">Poliklinik</th>
							<th>Dokter</th>
							<th class="center">Cito</th>
							<th class="center">Prioritas</th>
							<th class="center">Penjamin</th>
							<th class="center">No Antrian</th>
							<th></th>
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
<!-- End Modal List Poli -->

<!-- Modal List Hasil -->
<div id="modal-list-hasil" class="modal fade" role="dialog" aria-labelledby="modal-search-label" aria-hidden="true">
	<div class="modal-dialog" style="max-width: 50%">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="modal-list-hasil-label"></h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			</div>
			<div class="modal-body bg-default">
				<?= form_open('', 'id=form-list-hasil role=form class=form-horizontal') ?>
				<table id="table-list-hasil" class="table table-hover table-striped table-sm color-table info-table">
					<thead>
						<tr>
							<th class="center">No</th>
							<th class="center">Tanggal Ambil Antrian</th>
							<th class="center">No Antrian Sebelumnya</th>
							<th class="center">Tanggal Pulang Kunjungan</th>
							<th></th>
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
<!-- End Modal List Hasil -->

<!-- Modal Batal Antrian Laboratorium -->
<div id="modal-batal-antrian-lab" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Pembatalan Antrian Laboratorium</h4>
                <button type="button" class="close" data-dismiss="modal">×</button>
            </div>
            <div class="modal-body">
				<?= form_open('', 'role=form class=form-horizontal id=form-batal-antrian-lab'); ?>
				<div class="form-group tight">
					<input type="hidden" name="id_antrian" id="id-antrian">
					<input type="hidden" name="id_layanan_pendaftaran" id="id-layanan-pendaftaran">
                    <label class="col col-form-label">Keterangan Pembatalan</label>
                    <div class="col-lg-12">
                        <textarea name="keterangan" id="keterangan" class="form-control" placeholder="Masukkan keterangan pembatalan"></textarea>
                    </div>
                </div>
                <?= form_close(); ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-times-circle mr-1"></i>Keluar</button>
                <button type="button" class="btn btn-info waves-effect" onclick="simpanPembatalanAntrianLab()"><i class="fas fa-check-circle mr-1"></i>Batalkan Antrian</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- End Modal Batal Antrian Laboratorium -->

<!-- Modal Edit Waktu Refresh -->
<div id="modal-edit-waktu-refresh" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Waktu Refresh</h4>
                <button type="button" class="close" data-dismiss="modal">×</button>
            </div>
            <div class="modal-body">
				<?= form_open('', 'role=form class=form-horizontal id=form-edit-waktu-refresh'); ?>
				<div class="form-group tight">
                    <label class="col col-form-label">Waktu Refresh Otomatis (detik)</label>
                    <div class="col-lg-12">
                        <textarea id="edit-waktu-refresh" class="form-control" placeholder="(detik)"></textarea>
                    </div>
                </div>
                <?= form_close(); ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-times-circle mr-1"></i>Batal</button>
                <button type="button" class="btn btn-info waves-effect" onclick="simpanEditWaktuRefresh()"><i class="fas fa-check-circle mr-1"></i>Simpan</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- End Modal Edit Waktu Refresh -->

<!-- Modal Konfirmasi Antrian Laboratorium -->
<div id="modal-konfirmasi" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="modal-konfirmasi-label"></h3>
                <button type="button" class="close" data-dismiss="modal">×</button>
            </div>
            <div class="modal-body">
				<?= form_open('', 'role=form class=form-horizontal id=form-konfirmasi-lab'); ?>
				<div class="form-group tight">
					<input type="hidden" id="konfrim-nama-ruangan">
					<input type="hidden" id="konfrim-kode-antrian">
					<input type="hidden" id="konfrim-type">
                	<h4>Apakah anda yakin ingin memanggil pasien ??</h4>
					<div class="btn-call-container">
						<button type="button" class="btn btn-info bold waves-effect waves-light" onclick="btnKonfirmasi()"><i class="fas fa-check-circle mr-1" id="btn-konfirmasi"></i> </button>
					</div>
                </div>
                <?= form_close(); ?>
            </div>
            <!-- <div class="modal-footer">
				
            </div> -->
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- End Modal Konfirmasi Antrian Laboratorium -->

<style>
	.btn-call-container {
		display: flex;
		flex-direction: column;
		gap: 1rem;
		margin: 2rem 0;
	}

	.btn-call-container button {
		font-size: 20px;
		border-radius: 10px;
	}
</style>