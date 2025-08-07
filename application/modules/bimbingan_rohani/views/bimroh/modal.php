<!-- Modal Search -->
<div id="modal-search2" class="modal fade" role="dialog">
	<div class="modal-dialog" style="max-width:600px">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="modal-search-label">Form Parameter Pencarian</h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			</div>
			<div class="modal-body">
				<?= form_open('', 'id=form-search2 role=form class=form-horizontal') ?>
				<div class="form-group row tight">
					<label for="awal" class="col-3 col-form-label">Tanggal</label>
					<div class="col-4">
						<input type="text" name="tanggal_awal" id="tanggal-awal" class="form-control"
							value="">
					</div>
					<div class="col-1">
						<h5 class="m-t-10">s/d</h5>
					</div>
					<div class="col-4">
						<input type="text" name="tanggal_akhir" id="tanggal-akhir" class="form-control"
							value="<?= date('d/m/Y') ?>">
					</div>
				</div>
				<div class="form-group row tight">
					<label for="no_rm_search2" class="col-3 col-form-label">No. RM</label>
					<div class="col">
						<input type="text" name="no_rm" id="no-rm-search2" class="form-control">
					</div>
				</div>
				<div class="form-group row tight">
					<label for="nama_search" class="col-3 col-form-label">Nama</label>
					<div class="col">
						<input type="text" name="nama" id="nama-search2" class="form-control">
					</div>
				</div>
				<?= form_close() ?>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i
						class="fas fa-window-close"></i> Keluar</button>
				<button type="button" class="btn btn-info waves-effect" onclick="getListDataBimroh(1)"><i
						class="fas fa-search"></i> Cari</button>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- End Modal Search -->


<!-- Modal Form Bimroh Pasien Baru -->
<div class="modal fade" id="modal_form_bimroh_pasien_baru" data-backdrop="static">
	<div class="modal-dialog modal-dialog-scrollable" style="max-width: 90%;">
		<div class="modal-content">
			<div class="modal-header">
				<div class="title">
					<h5 id="modal-form-bimroh-pasien-baru-title"></h5>
				</div>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true" style="font-size: 16pt;">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<?= form_open('', 'id=form-bimroh-pasien-baru class="form-horizontal"') ?>
				<input type="hidden" name="id_layanan_pendaftaran" id="id-layanan-pendaftaran-bimroh-baru">

				<!-- content -->
				<div class="row">
					<div class="col-lg-12">
						<div class="widget-body">
							<div id="wizard_form_ranap">
								<div class="form-bimroh-pasien-baru">
									<table class="table table-no-border table-sm table-striped">										
                                        <tr>
											<td class="bold" width="50%">Nama Pasien</td>
											<td class="bold" width="1%">:</td>
											<td width="48%">
												<input type="text" name="nama_pasien_baru" class="custom-form col-lg-6"
													id="nama-pasien-baru" disabled>
											</td>
										</tr>
										<tr>
											<td class="bold" width="50%">Tanggal Lahir</td>
											<td class="bold" width="1%">:</td>
											<td width="48%">
												<input type="text" name="tanggal_lahir_pasien_baru" class="custom-form col-lg-6"
													id="tanggal-lahir-pasien-baru" disabled>
											</td>
										</tr>
										<tr>
											<td class="bold" width="50%">Jenis Kelamin</td>
											<td class="bold" width="1%">:</td>
											<td width="48%">
												<input type="text" name="jenis_kelamin_pasien_baru" class="custom-form col-lg-6"
													id="jenis-kelamin-pasien-baru" disabled>
											</td>
										</tr>
                                        <tr>
											<td class="bold" width="50%">Agama</td>
											<td class="bold" width="1%">:</td>
											<td width="48%">
												<input type="text" name="agama_apsien_baru" class="custom-form col-lg-6"
													id="agama-pasien-baru" disabled>
											</td>
										</tr>
										
                                        <tr>
											<td class="bold" width="50%">Alamat</td>
											<td class="bold" width="1%">:</td>
											<td width="48%">
												<input type="text" name="alamat_pasien_baru" class="custom-form col-lg-6"
													id="alamat-pasien-baru" disabled>
											</td>
										</tr>
                                        <tr>
											<td class="bold" width="50%">Kondisi Pasien</td>
											<td class="bold" width="1%">:</td>
											<td width="48%">
												<input type="text" name="kondisi_pasien_baru" class="custom-form col-lg-6"
													id="kondisi-pasien-baru">
											</td>
										</tr>
                                        <tr>
                                            <td class="bold" width="50%">Diagnosa Spiritual</td>
                                            <td class="bold" width="1%">:</td>
                                            <td width="48%">
                                                <input type="text" name="diagnosa_pasien_baru" id="diagnosa-pasien-baru" class="custom-form col-lg-6">
                                            </td>
                                        </tr>
										<tr>
                                            <td class="bold" width="50%">Terapi/Tindak Lanjut</td>
                                            <td class="bold" width="1%">:</td>
                                            <td width="48%">
                                                <input type="text" name="terapi_pasien_baru" id="terapi-pasien-baru" class="custom-form col-lg-6">
                                            </td>
                                        </tr>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- end content -->
				<?= form_close() ?>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal"><i
						class="fas fa-fw fa-times-circle mr-1"></i>Keluar</button>
				<button type="button" class="btn btn-info" onclick="simpanFormBimrohPasienBaru()"
					id="btn_simpan"><i class="fas fa-fw fa-save mr-1"></i>Cetak</button>
			</div>
		</div>
	</div>
</div>
<!-- End Modal Form Bimroh Pasien Baru -->

<!-- Modal Form Bimroh Pasien Khusus -->
<div class="modal fade" id="modal_form_bimroh_pasien_khusus" data-backdrop="static">
	<div class="modal-dialog modal-dialog-scrollable" style="max-width: 90%;">
		<div class="modal-content">
			<div class="modal-header">
				<div class="title">
					<h5 id="modal-form-bimroh-pasien-khusus-title"></h5>
				</div>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true" style="font-size: 16pt;">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<?= form_open('', 'id=form-bimroh-pasien-khusus class="form-horizontal"') ?>
				<input type="hidden" name="id_layanan_pendaftaran" id="id-layanan-pendaftaran-bimroh-khusus">

				<!-- content -->
				<div class="row">
					<div class="col-lg-12">
						<div class="widget-body">
							<div id="wizard_form_ranap">
								<div class="form-bimroh-pasien-khusus">
									<table class="table table-no-border table-sm table-striped">										
                                        <tr>
											<td class="bold" width="50%">Nama Pasien</td>
											<td class="bold" width="1%">:</td>
											<td width="48%">
												<input type="text" name="nama_pasien_khusus" class="custom-form col-lg-6"
													id="nama-pasien-khusus" disabled>
											</td>
										</tr>
										<tr>
											<td class="bold" width="50%">Tanggal Lahir</td>
											<td class="bold" width="1%">:</td>
											<td width="48%">
												<input type="text" name="tanggal_lahir_pasien_khusus" class="custom-form col-lg-6"
													id="tanggal-lahir-pasien-khusus" disabled>
											</td>
										</tr>
										<tr>
											<td class="bold" width="50%">Jenis Kelamin</td>
											<td class="bold" width="1%">:</td>
											<td width="48%">
												<input type="text" name="jenis_kelamin_pasien_khusus" class="custom-form col-lg-6"
													id="jenis-kelamin-pasien-khusus" disabled>
											</td>
										</tr>
                                        <tr>
											<td class="bold" width="50%">Agama</td>
											<td class="bold" width="1%">:</td>
											<td width="48%">
												<input type="text" name="agama_apsien_khusus" class="custom-form col-lg-6"
													id="agama-pasien-khusus" disabled>
											</td>
										</tr>
										
                                        <tr>
											<td class="bold" width="50%">Alamat</td>
											<td class="bold" width="1%">:</td>
											<td width="48%">
												<input type="text" name="alamat_pasien_khusus" class="custom-form col-lg-6"
													id="alamat-pasien-khusus" disabled>
											</td>
										</tr>
                                        <tr>
											<td class="bold" width="50%">Kondisi Pasien</td>
											<td class="bold" width="1%">:</td>
											<td width="48%">
												<input type="text" name="kondisi_pasien_khusus" class="custom-form col-lg-6"
													id="kondisi-pasien-khusus">
											</td>
										</tr>
                                        <tr>
                                            <td class="bold" width="50%">Diagnosa Spiritual</td>
                                            <td class="bold" width="1%">:</td>
                                            <td width="48%">
                                                <input type="text" name="diagnosa_pasien_khusus" id="diagnosa-pasien-khusus" class="custom-form col-lg-6">
                                            </td>
                                        </tr>
										<tr>
                                            <td class="bold" width="50%">Terapi/Tindak Lanjut</td>
                                            <td class="bold" width="1%">:</td>
                                            <td width="48%">
                                                <input type="text" name="terapi_pasien_khusus" id="terapi-pasien-khusus" class="custom-form col-lg-6">
                                            </td>
                                        </tr>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- end content -->
				<?= form_close() ?>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal"><i
						class="fas fa-fw fa-times-circle mr-1"></i>Keluar</button>
				<button type="button" class="btn btn-info" onclick="simpanFormBimrohPasienKhusus()"
					id="btn_simpan"><i class="fas fa-fw fa-save mr-1"></i>Cetak</button>
			</div>
		</div>
	</div>
</div>
<!-- End Modal Form Bimroh Pasien Khusus -->


