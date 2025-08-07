<div id="modal_search" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Parameter Pencarian Data</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <?= form_open('', 'id=form_search role=form class=form-horizontal') ?>
            <div class="modal-body">
                <div class="form-group">
                    <label class="col-lg-3 control-label">Tanggal</label>
                    <div class="col-lg-9">
                        <input type="text" name="tanggal_awal" value="<?= date('1/m/Y') ?>" class="form-control" id="tanggal_awal" placeholder="Tanggal Awal" style="width:145px; float:left; margin-right:10px;">
                        <input type="text" name="tanggal_akhir" value="<?= date('d/m/Y') ?>" class="form-control" id="tanggal_akhir" placeholder="Tanggal Akhir" style="width:145px;">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Masterdata</label>
                    <div class="col">
                        <?= form_dropdown('masterdata', $masterdata, array(), 'class="form-control" id=masterdata') ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Action</label>
                    <div class="col">
                        <?= form_dropdown('action', $action, array(), 'class="form-control" id=action') ?>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-refresh"></i> Keluar</button>
                <button type="button" onclick="getListMasterdataLogs(1)" class="btn btn-info"><i class="fas fa-search"></i> Cari</button>
            </div>
            <?= form_close() ?>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

