<!-- Modal Tarif Kamar Operasi -->
<div id="modal-tarif-pkrt" class="modal fade" role="dialog" data-backdrop="static">
    <div class="modal-dialog" style="max-width: 40%">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-tarif-pkrt-label"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <?= form_open('', 'role=form class=form-horizontal id=form-tarif-pkrt'); ?>
                <input type="hidden" name="id" id="id-tarif-pkrt">
                <div class="row">
                    <div class="col-lg-12">
						<div class="form-group row tight">
                            <label for="barang" class="col-lg-3 col-form-label">Nama Barang</label>
                            <div class="col-lg-9">
								<?= form_dropdown('barang', $list_pkrt, array(), 'id=barang-tarif-pkrt class=form-control') ?>	
                            </div>
						</div>
						<div class="form-group row tight">
							<label for="kelas-tarif-pkrt" class="col-lg-3 control-label">Kelas</label>
							<div class="col-lg-9">
								<?= form_dropdown('kelas', $kelas, array(), 'id=kelas-tarif-pkrt class=form-control') ?>
							</div>
						</div>
						<div class="form-group row tight">
							<label for="nominal-tarif-pkrt" class="col-lg-3 control-label">Nominal</label>
							<div class="col-lg-9">
								<input type="text" name="nominal" id="nominal-tarif-pkrt" class="form-control" value="0" onkeypress="return hanyaAngka(event)">
							</div>
						</div>
						<div class="form-group row tight">
							<label for="keterangan-tarif-pkrt" class="col-lg-3 control-label">Keterangan</label>
							<div class="col-lg-9">
								<textarea name="keterangan" id="keterangan-tarif-pkrt" class="form-control"></textarea>
							</div>
						</div>
					</div>
                </div>
                <?= form_close(); ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-times-circle mr-1"></i>Batal</button>
                <button type="button" class="btn btn-info waves-effect" onclick="simpanDataTarifPKRT()"><i class="fas fa-save mr-1"></i>Simpan</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- End Modal Tarif Kamar Operasi -->