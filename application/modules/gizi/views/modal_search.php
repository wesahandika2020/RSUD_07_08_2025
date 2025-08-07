<!-- Modal Search -->
<div id="modal-search" class="modal fade" role="dialog" aria-labelledby="modal-search-label" aria-hidden="true">
    <div class="modal-dialog" style="max-width: 650px">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-search-label">Form Parameter Pencarian</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <?= form_open('', 'id=form_search_gizi role=form class=form-horizontal') ?>
                <input name="id" type="hidden" id="id-gizi-search" />
                <div class="form-group row tight">
                    <label for="no_register_search" class="col-3 col-form-label">No. Register</label>
                    <div class="col">
                        <input type="text" name="no_register" id="no-register-search" class="form-control">
                    </div>
                </div>
                <div class="form-group row tight">
                    <label class="col-3 col-form-label">Tanggal</label>
                    <div class="col-4">
                        <input type="text" name="tanggal_awal" id="tanggal-awal" class="form-control" value="<?= date('d/m/Y') ?>">
                    </div>
                    <div class="col-1">
                        <h5 class="m-t-10">s/d</h5>
                    </div>
                    <div class="col-4">
                        <input type="text" name="tanggal_akhir" id="tanggal-akhir" class="form-control" value="<?= date('d/m/Y') ?>">
                    </div>
                </div>
                <div class="form-group row tight">
                    <label for="no_rm_search" class="col-3 col-form-label">No. RM</label>
                    <div class="col">
                        <input type="text" name="no_rm" id="no-rm-search" class="form-control">
                    </div>
                </div>
                <div class="form-group row tight">
                    <label for="nama_search" class="col-3 col-form-label">Nama</label>
                    <div class="col">
                        <input type="text" name="nama" id="nama-search" class="form-control">
                    </div>
                </div>
                <div class="form-group row tight">
                    <label for="bed_search" class="col-3 col-form-label">Bed</label>
                    <div class="col">
                        <input type="text" name="bed" id="bed-search" class="form-control">
                    </div>
                </div>
                <div class="form-group row tight">
                    <label for="dokter_search" class="col-3 col-form-label">Dokter</label>
                    <div class="col">
                        <input type="text" name="id_dokter" id="dokter-search" class="form-control">
                    </div>
                </div>
                <div class="form-group row tight">
                    <label for="status_search" class="col-3 col-form-label">Status</label>
                    <div class="col">
                        <input type="text" name="status" id="status-search" class="form-control">
                    </div>
                </div>
                <?= form_close() ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-window-close"></i> Keluar</button>
                <button type="button" class="btn btn-info waves-effect" onclick="getListDaftarPMP(1)"><i class="fas fa-search"></i> Cari</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- End Modal Search -->

