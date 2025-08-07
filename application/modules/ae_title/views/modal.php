<div id="modal-add" class="modal fade" role="dialog">
	<div class="modal-dialog modal-dialog-scrollable" style="max-width: 40%">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="modal-add-label"></h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			</div>
			<div class="modal-body">
				<?= form_open('', 'role=form class=form-horizontal id=form-aetitle'); ?>
				<input type="hidden" id="id-aetitle" name="id_aetitle">
				<div class="row">
                    <div class="col-lg-12">
						<div class="form-group row tight">
		                    <label for="id_ae" class="col-3 col-form-label">ID Ae</label>
		                    <div class="col-6">
		                        <input class="form-control" type="text" name="id_ae" id="id-ae" placeholder="id Ae...">
		                    </div>
		                </div>
		                <div class="form-group row tight">
		                    <label for="nama_aetitle" class="col-3 col-form-label">Nama Aetitle</label>
		                    <div class="col-6">
		                        <input class="form-control" type="text" name="nama_aetitle" id="nama-aetitle" placeholder="Nama Aetitle...">
		                    </div>
		                </div>
		                <div class="form-group row tight">
		                    <label for="ip_address" class="col-3 col-form-label">IP</label>
		                    <div class="col-6">
		                        <input class="form-control" type="text" name="ip_address" id="ip-address" placeholder="IP Address...">
		                    </div>
		                </div>
					</div>
                </div>
				<?= form_close(); ?>
			</div>
			<div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-times-circle mr-1"></i>Batal</button>
                <button type="button" class="btn btn-info waves-effect" onclick="simpanAeTitle()"><i class="fas fa-save mr-1"></i>Simpan</button>
            </div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>