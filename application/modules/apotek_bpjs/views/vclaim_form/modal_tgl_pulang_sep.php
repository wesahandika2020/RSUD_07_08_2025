<!-- Modal Update Tgl Pulang SEP -->
<div id="modal_tgl_pulang_sep" class="modal fade" role="dialog" aria-labelledby="modal_tgl_pulang_sep_label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal_tgl_pulang_sep_label">Update Tanggal Pulang</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <?= form_open('', 'role=form class=form-horizontal id=form_tgl_pulang_sep'); ?>
                <div class="form-group row tight">
                    <label class="col-3 col-form-label">No. SEP</label>
                    <div class="col">
                        <input type="text" name="no_sep" id="no_sep_update" class="form-control" readonly>
                    </div>
                </div>
                <div class="form-group row tight">
                    <label class="col-3 col-form-label">Tanggal</label>
                    <div class="col-4">
                        <input type="text" name="tanggal_pulang" id="tanggal_pulang_update" class="form-control">
                    </div>
                </div>
                <?= form_close(); ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-window-close"></i> Batal</button>
                <button type="button" class="btn btn-info waves-effect" onclick="doUpdateTglPulang()"><i class="fas fa-save"></i> Update</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- End Modal Update Tgl Pulang SEP -->