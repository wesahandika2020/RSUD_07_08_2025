<div id="modal-add" class="modal fade" role="dialog">
	<div class="modal-dialog modal-dialog-scrollable" style="max-width: 40%">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="modal-add-label"></h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			</div>
			<div class="modal-body">
				<?= form_open('', 'role=form class=form-horizontal id=form-modality'); ?>
				<input type="hidden" id="id-modality" name="id_modality">
				<div class="row">
                    <div class="col-lg-12">
						<div class="form-group row tight">
		                    <label for="id_modal" class="col-3 col-form-label">ID Modality</label>
		                    <div class="col-6">
		                        <input class="form-control" type="text" name="id_modal" id="id-modal" placeholder="ID Modality...">
		                    </div>
		                </div>
		                <div class="form-group row tight">
		                    <label for="kode_modality" class="col-3 col-form-label">Kode Modality</label>
		                    <div class="col-6">
		                        <input class="form-control" type="text" name="kode_modality" id="kode-modality" placeholder="Kode Modality...">
		                    </div>
		                </div>
		                <div class="form-group row tight">
		                    <label for="nama_modality" class="col-3 col-form-label">Nama Modality</label>
		                    <div class="col-6">
		                        <input class="form-control" type="text" name="nama_modality" id="nama-modality" placeholder="Nama Modality...">
		                    </div>
		                </div>
		                <div class="form-group row tight">
		                    <label for="id_aetitle" class="col-3 col-form-label">Aetitle</label>
		                    <div class="col-6">
		                        <input type="text" name="id_aetitle" id="id-aetitle" class="select2-input" placeholder="Aetitle">
		                    </div>
		                </div>
					</div>
                </div>
				<?= form_close(); ?>
			</div>
			<div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-times-circle mr-1"></i>Batal</button>
                <button type="button" class="btn btn-info waves-effect" onclick="simpanModality()"><i class="fas fa-save mr-1"></i>Simpan</button>
            </div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>