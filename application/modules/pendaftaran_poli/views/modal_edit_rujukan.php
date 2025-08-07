<!-- Modal Edit No Rujukan Pendaftaran Poliklinik -->
<div id="modal_edit_rujukan" class="modal fade" role="dialog" aria-labelledby="modal_edit_rujukan_label" aria-hidden="true">
    <div class="modal-dialog" style="max-width: 45%">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal_edit_rujukan_label"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <?= form_open('', 'id=form_edit_rujukan role=form class=form-horizontal') ?>
                <input type="hidden" name="id_layanan_pendaftaran" id="id_layanan_pendaftaran_edit" />
                <div class="form-group row tight">
                    <label for="" class="col-4 col-form-label">Klinik Asal</label>
                    <div class="col-8">
                        <h5 id="label_unit_edit" class="m-t-10 bold"></h5>
                    </div>
                </div>
                <div class="form-group row tight">
                    <label for="layanan_edit" class="col-4 col-form-label">Klinik Tujuan<span class="text-red">*</span></label>
                    <div class="col-8">
                        <input type="text" name="layanan" id="layanan_edit" class="select2-input">
                    </div>
                </div>
                <div class="form-group row tight">
                    <label for="dpjp_edit" class="col-4 col-form-label">Dokter Penanggung Jawab</label>
                    <div class="col-8">
                        <input type="text" name="dpjp" id="dpjp_edit" class="select2-input">
                    </div>
                </div>
                <?= form_close() ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-window-close"></i> Keluar</button>
                <button type="button" class="btn btn-info waves-effect" onclick="simpanEditKlinik()"><i class="fas fa-save"></i> Update</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- End Modal Edit No Rujukan Pendaftaran Poliklinik -->