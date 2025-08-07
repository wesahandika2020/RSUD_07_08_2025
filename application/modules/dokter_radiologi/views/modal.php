<div id="modal-add" class="modal fade" role="dialog">
	<div class="modal-dialog modal-dialog-scrollable" style="max-width: 40%">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="modal-add-label"></h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			</div>
			<div class="modal-body">
				<?= form_open('', 'role=form class=form-horizontal id=form-user-dokter'); ?>
				<input type="hidden" id="id-username" name="id_username">
				<div class="row">
                    <div class="col-lg-12">
						<div class="form-group row tight">
		                    <label for="dokter_radiologi" class="col-3 col-form-label">Dokter Radiologi</label>
		                    <div class="col-6">
		                        <input type="text" name="dokter_radiologi" id="dokter-radiologi" class="select2-input" placeholder="Dokter Radiologi">
		                    </div>
		                </div>
		                <div class="form-group row tight">
		                    <label for="username" class="col-3 col-form-label">Userame</label>
		                    <div class="col-6">
		                        <input class="form-control" type="text" name="username" id="username" placeholder="Username...">
		                    </div>
		                </div>
		            </div>
                </div>
				<?= form_close(); ?>
			</div>
			<div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-times-circle mr-1"></i>Batal</button>
                <button type="button" class="btn btn-info waves-effect" onclick="simpanUsername()"><i class="fas fa-save mr-1"></i>Simpan</button>
            </div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>