<!-- Modal Koding Diagnosa -->
<div id="modal-koding-diagnosa" data-backdrop="static" class="modal fade" role="dialog" aria-hidden="true">
	<div class="modal-dialog" style="max-width: 550px">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			</div>
			<div class="modal-body">
				<?= form_open('', 'id=form-koding-diagnosa role=form class=form-horizontal') ?>
				<div class="row">
					<div class="col-lg-12">
						<input type="hidden" name="id-diagnosa" id="id-diagnosa">
						<input type="hidden" name="id-golongan-sebab-before-diagnosa" id="id-golongan-sebab-before-diagnosa">
						<input type="hidden" name="id-layanan-pendaftaran-coding-diagnosa" id="id-layanan-pendaftaran-coding-diagnosa">
						<input type="hidden" name="jenis-kode-diagnosa" id="jenis-kode-diagnosa">
						<input type="hidden" name="id-diagnosa-asterik" id="id-diagnosa-asterik">
						<div class="form-group row tight ranap icare">
							<label class="col-3 col-form-label">ICD-10[RM]</label>
							<div class="col">
								<input name="code-diagnosa" id="code-diagnosa" class="select2c-input">
							</div>
						</div>
						<div class="form-group row tight ranap icare">
							<label class="col-3 col-form-label">ICD-10[RM] Asterik</label>
							<div class="col">
								<input name="code-diagnosa-asterik" id="code-diagnosa-asterik" class="select2c-input">
							</div>
						</div>
					</div>
				</div>
				<?= form_close() ?>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i
						class="fas fa-times-circle"></i> Batal</button>
				<button type="button" class="btn btn-info waves-effect" onclick="simpanKodingDiagnosa()"><i
						class="fas fa-plus-circle"></i> Simpan</button>
			</div>
		</div>
	</div>
</div>
<!-- End Modal Koding Diagnosa -->
