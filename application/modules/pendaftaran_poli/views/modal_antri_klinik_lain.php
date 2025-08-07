<!-- Modal Antri Klinik Lain -->
<div id="modal_antri_klinik" class="modal fade" role="dialog" aria-labelledby="modal_antri_klinik_label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal_antri_klinik_label"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <?= form_open('', 'id=form_antri_klinik role=form class=form-horizontal') ?>
                <input type="hidden" name="no_antrian" id="antrian_lain" />
                <input type="hidden" name="id_pendaftaran" id="id_pendaftaran_antri" />
                <div class="form-group row tight">
                    <label for="no_rujukan_edit" class="col-4 col-form-label">No. Rujukan<span class="text-red">*</span></label>
                    <div class="col-8">
                        <input type="text" name="layanan" id="layanan_antri" class="select2-input validate-input">
                    </div>
                </div>
                <div class="form-group row tight">
                    <label for="antrian" class="col-3 col-form-label">Antrian Klinik Ke -</label>
                    <div class="col">
                        <div id="no_antrian_lain"></div>
                    </div>
                </div>
                <?= form_close() ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-window-close"></i> Batal</button>
                <button type="button" class="btn btn-info waves-effect" onclick="antriPoliklinik()"><i class="fas fa-plus"></i> Antri</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- End Modal Antri Klinik Lain -->