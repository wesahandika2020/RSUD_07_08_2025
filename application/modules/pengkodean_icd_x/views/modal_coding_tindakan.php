<!-- Modal Koding Tindakan -->
<div id="modal-koding-tindakan" data-backdrop="static" class="modal fade" role="dialog" aria-hidden="true">
	<div class="modal-dialog" style="max-width: 550px">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			</div>
			<div class="modal-body">
				<?= form_open('', 'id=form-koding-tindakan role=form class=form-horizontal') ?>
				<div class="row">
					<div class="col-lg-12">
						<input type="hidden" name="id-tarif-tindakan-pasien" id="id-tarif-tindakan-pasien">
						<input type="hidden" name="id-golongan-sebab-before-tindakan" id="id-golongan-sebab-before-tindakan">
						<input type="hidden" name="id-layanan-pendaftaran-history-tindakan" id="id-layanan-pendaftaran-history-tindakan">
						<input type="hidden" name="id-unit-tindakan" id="id-unit-tindakan">
						<div class="form-group row tight ranap icare">
							<label class="col-3 col-form-label">ICD-9CM</label>
							<div class="col">
								<input name="code-tindakan" id="code-tindakan" class="select2c-input">
							</div>
						</div>
					</div>
				</div>
				<?= form_close() ?>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i
						class="fas fa-times-circle"></i> Batal</button>
				<button type="button" class="btn btn-info waves-effect" onclick="simpanKodingTindakan()"><i
						class="fas fa-plus-circle"></i> Simpan</button>
			</div>
		</div>
	</div>
</div>
<!-- End Modal Koding Tindakan -->
