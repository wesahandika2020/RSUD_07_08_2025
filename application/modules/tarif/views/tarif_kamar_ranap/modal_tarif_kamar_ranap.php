<!-- Modal Tarif Kamar Ranap -->
<div id="modal-tarif-kamar-ranap" class="modal fade" role="dialog" data-backdrop="static">
    <div class="modal-dialog" style="max-width: 40%">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-tarif-kamar-ranap-label"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <?= form_open('', 'role=form class=form-horizontal id=form-tarif-kamar-ranap'); ?>
                <input type="hidden" name="id" id="id-tarif-kamar-ranap">
                <div class="row">
                    <div class="col-lg-12">
						<div class="form-group row tight">
                            <label for="bangsal-auto" class="col-lg-3 col-form-label">Bangsal</label>
                            <div class="col-lg-9">
                                <input type="text" name="bangsal" id="bangsal-auto" class="select2-input">
                            </div>
						</div>
						<div class="form-group row tight">
							<label for="kelas-tarif-kamar-ranap" class="col-lg-3 control-label">Kelas</label>
							<div class="col-lg-9">
								<?= form_dropdown('kelas', $kelas, array(), 'id=kelas-tarif-kamar-ranap class=form-control') ?>
							</div>
						</div>
						<div class="form-group row tight">
							<label for="nominal-tarif-kamar-ranap" class="col-lg-3 control-label">Nominal</label>
							<div class="col-lg-9">
								<input type="text" name="nominal" id="nominal-tarif-kamar-ranap" class="form-control" value="0" onkeypress="return hanyaAngka(event)">
							</div>
						</div>
						<div class="form-group row tight">
							<label for="keterangan-tarif-kamar-ranap" class="col-lg-3 control-label">Keterangan</label>
							<div class="col-lg-9">
								<textarea name="keterangan" id="keterangan-tarif-kamar-ranap" class="form-control"></textarea>
							</div>
						</div>
					</div>
                </div>
                <?= form_close(); ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-times-circle mr-1"></i>Batal</button>
                <button type="button" class="btn btn-info waves-effect" onclick="simpanDataTarifKamarRanap()"><i class="fas fa-save mr-1"></i>Simpan</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- End Modal Tarif Kamar Ranap -->