<!-- Modal Integrasi Antrian -->
<div id="modal-validasi-integra" class="modal fade" role="dialog" aria-labelledby="modal_kirim_label" aria-hidden="true">
    <div class="modal-dialog" style="max-width: 650px">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-kirim-label"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
            <?= form_open('', 'id=form-integrasi role=form class=form-horizontal') ?>
                <div class="form-group row tight">
                    <label for="awal" class="col-3 col-form-label">Tanggal</label>
                    <div class="col-4">
                        <input type="text" name="tanggal_integrasi" id="tanggal-integrasi" class="form-control" value="<?= date('d/m/Y') ?>">
                    </div>
                </div>
                <div class="form-group row tight">
                    <label for="no_antrean" class="col-3 col-form-label">Task</label>
                    <div class="col">
                        <?= form_dropdown('task', $task, array(), 'class="custom-select form-control" id=task') ?>
                    </div>
                </div>
                <div class="form-group row tight">
                    <label for="status_task" class="col-3 col-form-label">Status Task</label>
                    <div class="col-9">
                        <?= form_dropdown('status_task', $status_task, array(), 'class="custom-select" id=status-task') ?>
                    </div>
                </div>
            <?= form_close() ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-window-close"></i> Keluar</button>
                <button type="button" class="btn btn-info waves-effect" onclick="validTask()"><i class="fas fa-save"></i> Kirim</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- End Modal Search Pendaftaran Poliklinik -->