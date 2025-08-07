<!-- Modal Edit Jenis Kasus -->
<div id="modal-edit-jenis-kasus-diagnosa" data-backdrop="static" class="modal fade" role="dialog" aria-hidden="true">
	<div class="modal-dialog" style="max-width: 550px">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			</div>
			<div class="modal-body">
				<?= form_open('', 'id=form-edit-jenis-kasus-diagnosa role=form class=form-horizontal') ?>
				<div class="row">
					<div class="col-lg-12">
						<input type="hidden" name="id_diagnosa" id="id-diagnosa-jk">
						<div class="form-group row tight ranap icare">
							<label class="col-3 col-form-label">Jenis Kasus</label>
							<div class="col">
								<select name="jenis_kasus" id="jenis-kasus" class="form-control validasi-input">
									<option value="1">Kasus Baru</option>
									<option value="0">Kasus Lama</option>
								</select>
							</div>
						</div>
					</div>
				</div>
				<?= form_close() ?>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i
						class="fas fa-times-circle"></i> Batal</button>
				<button type="button" class="btn btn-info waves-effect" onclick="simpanJenisKasusDiagnosa()"><i
						class="fas fa-plus-circle"></i> Simpan</button>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- End Modal Edit Jenis Kasus -->
