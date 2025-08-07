<!-- Modal Search Sudah Integrasi Pasien -->
<div id="modal-search-nakes" class="modal fade" role="dialog" aria-labelledby="modal_search_label" aria-hidden="true">
    <div class="modal-dialog" style="max-width: 650px">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-search-nakes-label"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <?= form_open('', 'id=form-search-nakes role=form class=form-horizontal') ?>
                <div class="form-group row tight">
                    <label for="no_antrean" class="col-3 col-form-label">Nama</label>
                    <div class="col">
                        <input type="text" name="nama" id="nama" class="form-control">
                    </div>
                </div>
                <div class="form-group row tight">
                    <label for="no_antrean" class="col-3 col-form-label">NIK</label>
                    <div class="col">
                        <input type="text" name="nik" id="nik" class="form-control">
                    </div>
                </div>
                <?= form_close() ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-window-close"></i> Keluar</button>
                <button type="button" class="btn btn-info waves-effect" onclick="cariDataNakes()"><i class="fas fa-search"></i> Cari</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- End Modal Search Sudah Integrasi Pasien -->

<!-- Modal Search Kirim Integrasi Pasien -->
<div id="modal-search-integrasi-nakes" class="modal fade" role="dialog" aria-labelledby="modal_search_label" aria-hidden="true">
    <div class="modal-dialog" style="max-width: 650px">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-search-integrasi-nakes-label"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <?= form_open('', 'id=form-kirim-nakes role=form class=form-horizontal') ?>
                <div class="form-group row tight">
                    <label for="no_antrean" class="col-3 col-form-label">Nama</label>
                    <div class="col">
                        <input type="text" name="nama" id="nama" class="form-control">
                    </div>
                </div>
                <div class="form-group row tight">
                    <label for="no_antrean" class="col-3 col-form-label">NIK</label>
                    <div class="col">
                        <input type="text" name="nik" id="nik" class="form-control">
                    </div>
                </div>
                <?= form_close() ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-window-close"></i> Keluar</button>
                <button type="button" class="btn btn-info waves-effect" onclick="cariDataIntegrasiNakes()"><i class="fas fa-search"></i> Cari</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- End Modal Search Kirim Integrasi Pasien -->
