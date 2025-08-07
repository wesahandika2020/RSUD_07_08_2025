<!-- Modal Search -->
<div id="modal-dashboard-tanggal" class="modal fade" role="dialog" aria-labelledby="modal-search-label" aria-hidden="true">
    <div class="modal-dialog" style="max-width: 650px">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-dashboard-tanggal-label"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <?= form_open('', 'id=form-modal-dashboard-tanggal role=form class=form-horizontal') ?>
                
                    <div class="form-group row tight">
                        <label for="awal" class="col-3 col-form-label">Tanggal<span class="text-red">*</span></label>
                        <div class="col-4">
                            <input type="text" name="tanggal_dashboard_tanggal" id="tanggal-dashboard" class="form-control" value="<?= date('d/m/Y') ?>">
                        </div>
                    </div>
                    <div class="form-group row tight">
                        <label for="waktu_dashboard" class="col-md-3 col-form-label">Waktu <span class="text-red">*</span></label>
                        <div class="col-md-9">
                            <?= form_dropdown('jenis_waktu', $jenis_waktu, array(), 'class="custom-select" id=jenis-waktu') ?>
                        </div>
                    </div>
                <?= form_close() ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-window-close"></i> Keluar</button>
                <button type="button" class="btn btn-info waves-effect" onclick="getDashboardPerTanggal()"><i class="fas fa-search"></i> Filter</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- End Modal Search -->