<!-- Modal Search -->
<div id="modal-filter-jadwal" class="modal fade" role="dialog" aria-labelledby="modal-search-label" aria-hidden="true">
    <div class="modal-dialog" style="max-width: 650px">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-jadwal-label"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <?= form_open('', 'id=form-jadwal-search role=form class=form-horizontal') ?>
                
                    <div class="form-group row tight">
                        <label for="awal" class="col-3 col-form-label">Tanggal<span class="text-red">*</span></label>
                        <div class="col-4">
                            <input type="text" name="tanggal_jadwal" id="tanggal-jadwal" class="form-control" value="<?= date('d/m/Y') ?>">
                        </div>
                    </div>
                    <div class="form-group row tight">
                        <label for="layanan_auto" class="col-md-3 col-form-label">Klinik <span class="text-red">*</span></label>
                        <div class="col-md-9">
                            <input type="text" name="layanan" id="layanan-auto" class="select2-input" placeholder="Tempat Layanan">
                        </div>
                    </div>
                <?= form_close() ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-window-close"></i> Keluar</button>
                <button type="button" class="btn btn-info waves-effect" onclick="getJadwalDokterRSUD(1)"><i class="fas fa-search"></i> Cari</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- End Modal Search -->