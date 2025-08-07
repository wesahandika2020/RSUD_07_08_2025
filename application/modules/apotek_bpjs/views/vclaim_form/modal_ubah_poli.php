<!-- Modal Ubah Poli -->
<div id="modal_ubah_poli" class="modal fade" role="dialog" aria-labelledby="modal_ubah_poli_label" aria-hidden="true">
    <div class="modal-dialog" style="max-width: 50%">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal_ubah_poli_label">Ubah Poli / Sub. Spesialis</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <?= form_open('', 'id=form_ubah_poli role=form class=form-horizontal') ?>
                <div class="form-group row tight">
                    <label class="col-4 col-form-label">Poli/Sub Spesialis</label>
                    <div class="col-8">
                        <input type="text" name="" id="poli_bpjs_auto" class="select2-input">
                    </div>
                </div>
                <?= form_close() ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-window-close"></i> Batal</button>
                <button type="button" class="btn btn-info waves-effect" onclick="updateUbahPoliSub()"><i class="fas fa-save"></i> Simpan</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- End Modal Ubah Poli -->