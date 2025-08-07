<div id="modal-add" class="modal fade" role="dialog">
	<div class="modal-dialog modal-dialog-scrollable" style="max-width: 40%">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="modal-add-label"></h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			</div>
			<div class="modal-body">
				<?= form_open('', 'role=form class=form-horizontal id=form-icd9'); ?>
				<input type="hidden" id="id-icd9" name="id_icd9">
				<div class="row">
                    <div class="col-lg-12">
						<div class="form-group row tight">
		                    <Tambah for="kode-icd9-add" class="col-3 col-form-label">Kode ICD IX</Tambah>
		                    <div class="col-6">
		                        <input class="form-control" type="text" name="kode_icd9_add" id="kode-icd9-add" placeholder="Kode ICD IX...">
		                    </div>
		                </div>
		                <div class="form-group row tight">
		                    <label for="nama-add" class="col-3 col-form-label">Nama</label>
		                    <div class="col-6">
		                        <input class="form-control" type="text" name="nama_add" id="nama-add" placeholder="Nama...">
		                    </div>
		                </div>
		                <div class="form-group row tight">
		                    <label for="status-add" class="col-3 col-form-label">Status</label>
		                    <div class="col-6">
                                <select name="status_add" id="status-add" class="form-control">
                                    <option selected value="1">Aktif</option>
                                    <option value="0">Tidak Aktif</option>
                                </select>
		                    </div>
		                </div>
					</div>
                </div>
				<?= form_close(); ?>
			</div>
			<div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-times-circle mr-1"></i>Batal</button>
                <button type="button" class="btn btn-info waves-effect" onclick="simpanIcd9()"><i class="fas fa-save mr-1"></i>Simpan</button>
            </div>
		</div>
	</div>
</div>