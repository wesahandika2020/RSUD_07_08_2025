<!-- Modal Add Diagnosa -->
<div id="modal-add-diagnosa" data-backdrop="static" class="modal fade" role="dialog" aria-hidden="true" aria-labelledby="modal-add-diagnosa-label">
	<div class="modal-dialog modal-dialog-scrollable" style="max-width: 95%">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="modal-add-diagnosa-label"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			</div>
			<div class="modal-body">
				<?= form_open('', 'id=form-add-diagnosa role=form class=form-horizontal') ?>
				<div class="row">
					<div class="col-lg-12">
						<div class="col-lg-6">							
							<div class="form-group row tight">
								<label for="diagnosa-manual" class="col-lg-4 col-form-label"></label>
								<div class="col-lg-8">
									<div class="form-check">
										<input type="checkbox" name="diagnosa_manual" class="form-check-input"
											id="diagnosa-manual">
										<label class="form-check-label" for="diagnosa-manual">Diagnosis Manual</label>
									</div>
								</div>
							</div>
							<div class="form-group row tight golongan-sebab-sakit">
								<label for="golongan-sebab-sakit"
									class="col-lg-4 col-form-label-custom">Diagnosis</label>
								<div class="col-lg-8">
									<input type="text" name="golongan_sebab_sakit" id="golongan-sebab-sakit"
										class="select2c-input">
								</div>
							</div>
							<div class="form-group row tight golongan-sebab-sakit-lain">
								<label for="golongan-sebab-sakit-lain"
									class="col-lg-4 col-form-label-custom">Diagnosis</label>
								<div class="col-lg-8">
									<input type="text" name="golongan_sebab_sakit_lain" id="golongan-sebab-sakit-lain"
										class="custom-form validasi-input">
								</div>
							</div>

							<div class="form-group row tight">
								<label for="prioritas" class="col-lg-4 col-form-label-custom">Prioritas</label>
								<div class="col-lg-4">
									<?= form_dropdown('prioritas', array('Utama' => 'Utama', 'Sekunder' => 'Sekunder'), array(), 'id=prioritas class=custom-form') ?>
								</div>
							</div>

							<div class="form-group row tight">
								<label for="diagnosa-akhir" class="col-lg-4 col-form-label-custom">Diagnosis
									Akhir</label>
								<div class="col-lg-8">
									<div class="form-check">
										<input type="checkbox" name="diagnosa_akhir" class="form-check-input"
											id="diagnosa-akhir">
										<label class="form-check-label" for="diagnosa-akhir">Ya</label>
									</div>
								</div>
							</div>
							<div class="form-group row tight">
								<label for="penyebab-kemation" class="col-lg-4 col-form-label-custom">Penyebab
									Kematian</label>
								<div class="col-lg-8">
									<div class="form-check">
										<input type="checkbox" name="penyebab_kematian" class="form-check-input"
											id="penyebab-kematian">
										<label class="form-check-label" for="penyebab-kematian">Ya</label>
									</div>
								</div>
							</div>
							<div class="form-group row tight">
								<label class="col-lg-4 col-form-label-custom"></label>
								<div class="col-lg-8">
									<button type="button" onclick="addDiagnosa()" class="btn btn-info"><i
											class="fas fa-arrow-circle-down mr-2"></i>Tambah Diagnosis</button>
								</div>
							</div>
						</div>
						<table class="table table-hover table-striped table-sm color-table info-table"
							id="table-diagnosa">
							<thead class="thead-theme">
								<tr>
									<th>No</th>
									<th>Dokter</th>
									<th>Diagnosis</th>
									<th>Klinik</th>
									<th>Prioritas</th>
									<th>Diagnosis Banding</th>
									<th>Diagnosis Akhir</th>
									<th>Penyebab Kematian</th>
									<th></th>
								</tr>
							</thead>
							<tbody></tbody>
						</table>
					</div>
				</div>
				<?= form_close() ?>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i
						class="fas fa-times-circle"></i> Batal</button>
				<button type="button" class="btn btn-info waves-effect" onclick="saveNewDiagnosa()"><i
						class="fas fa-plus-circle"></i> Simpan</button>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- End Modal Add Diagnosa -->
