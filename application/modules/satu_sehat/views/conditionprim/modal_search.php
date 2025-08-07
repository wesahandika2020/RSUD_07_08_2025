<!-- Modal Search Sudah Integrasi Pasien -->
<div id="modal-search-condition-primary" class="modal fade" role="dialog" aria-labelledby="modal_search_label" aria-hidden="true">
    <div class="modal-dialog" style="max-width: 650px">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-search-label-condition-primary"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <?= form_open('', 'id=form-search-condition-primary role=form class=form-horizontal') ?>
                <div class="form-group row tight">
                    <label for="no_kode_booking" class="col-3 col-form-label">No RM</label>
                    <div class="col">
                        <input type="text" name="id" id="id" class="form-control">
                    </div>
                </div>
                <div class="form-group row tight">
                    <label for="no_antrean" class="col-3 col-form-label">Nama</label>
                    <div class="col">
                        <input type="text" name="nama" id="nama" class="form-control">
                    </div>
                </div>
                <div class="form-group row tight">
                    <label for="poli" class="col-3 col-form-label">Poli</label>
                    <div class="col">
                        <input type="text" name="poli" id="poli" class="form-control">
                    </div>
                </div>
                <?= form_close() ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-window-close"></i> Keluar</button>
                <button type="button" class="btn btn-info waves-effect" onclick="cariDataConditionPrimary()"><i class="fas fa-search"></i> Cari</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- End Modal Search Sudah Integrasi Pasien -->

<!-- Modal Search Kirim Integrasi Pasien -->
<div id="modal-search-integrasi-condition-primary" class="modal fade" role="dialog" aria-labelledby="modal_search_label" aria-hidden="true">
    <div class="modal-dialog" style="max-width: 650px">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-search-integrasi-label-condition-primary"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <?= form_open('', 'id=form-kirim-condition-primary role=form class=form-horizontal') ?>
                <div class="form-group row tight">
                    <label for="no_kode_booking" class="col-3 col-form-label">No RM</label>
                    <div class="col">
                        <input type="text" name="id" id="id" class="form-control">
                    </div>
                </div>
                <div class="form-group row tight">
                    <label for="no_antrean" class="col-3 col-form-label">Nama</label>
                    <div class="col">
                        <input type="text" name="nama" id="nama" class="form-control">
                    </div>
                </div>
                <div class="form-group row tight">
                    <label for="poli" class="col-3 col-form-label">Poli</label>
                    <div class="col">
                        <input type="text" name="poli" id="poli" class="form-control">
                    </div>
                </div>
                <?= form_close() ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-window-close"></i> Keluar</button>
                <button type="button" class="btn btn-info waves-effect" onclick="cariIntegrasiConditionPrimary()"><i class="fas fa-search"></i> Cari</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- End Modal Search Kirim Integrasi Pasien -->
