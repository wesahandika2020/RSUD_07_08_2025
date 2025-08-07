<!-- Modal Search -->
<div id="modal-kode-booking" class="modal fade" role="dialog" aria-labelledby="modal-search-label" aria-hidden="true">
    <div class="modal-dialog" style="max-width: 650px">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-kode-label"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <?= form_open('', 'id=form-kode-search role=form class=form-horizontal') ?>
                
                    <div class="form-group row tight">
                        <label for="kode_boking" class="col-md-3 col-form-label">Kode Booking <span class="text-red">*</span></label>
                        <div class="col-md-9">
                            <input type="text" name="kode_booking" id="lw-kode-booking" class="form-control" placeholder="Masukkan Kode Booking" data-maxzpsw="0">
                        </div>
                    </div>
                <?= form_close() ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-window-close"></i> Keluar</button>
                <button type="button" class="btn btn-info waves-effect" onclick="getListWaktuTask()"><i class="fas fa-search"></i> Cari</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- End Modal Search -->