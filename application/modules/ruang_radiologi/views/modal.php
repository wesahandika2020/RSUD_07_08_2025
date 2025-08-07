<div id="modal-add" class="modal fade" role="dialog">
	<div class="modal-dialog modal-dialog-scrollable" style="max-width: 40%">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="modal-add-label"></h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			</div>
			<div class="modal-body">
				<?= form_open('', 'role=form class=form-horizontal id=form-ruang-radiologi'); ?>
				<input type="hidden" id="id-ruang" name="id_ruang">
				<div class="row">
                    <div class="col-lg-12">
						<div class="form-group row tight">
		                    <label for="id_alat" class="col-3 col-form-label">Alat Modality</label>
		                    <div class="col-6">
		                        <input class="select2-input" type="text" name="id_alat" id="id-alat" placeholder="Alat Modality...">
		                    </div>
		                </div>
		                <div class="form-group row tight">
		                    <label for="nama_ruangan" class="col-3 col-form-label">Nama Ruangan</label>
		                    <div class="col-6">
		                        <input class="form-control" type="text" name="nama_ruangan" id="nama-ruangan" placeholder="Nama Ruangan...">
		                    </div>
		                </div>
		                <div class="form-group row tight">
		                    <label for="nama_layanan" class="col-3 col-form-label">Nama Layanan</label>
		                    <div class="col-6">
		                        <input class="select2-input" type="text" name="nama_layanan" id="nama-layanan" placeholder="Nama Layanan...">
		                    </div>
		                </div>
		            </div>
                </div>
				<?= form_close(); ?>
			</div>
			<div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-times-circle mr-1"></i>Batal</button>
                <button type="button" class="btn btn-info waves-effect" onclick="simpanRuangan()"><i class="fas fa-save mr-1"></i>Simpan</button>
            </div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>