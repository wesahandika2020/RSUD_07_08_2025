<!-- Modal Layanan -->
<div id="modal_labpk" class="modal fade" role="dialog" aria-labelledby="modal_labpk_label" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal_labpk_label"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <?= form_open('','id=form_layanan role=form class=form-horizontal') ?>
                <input name="id" type="hidden" id="id"/>

                <div class="form-group row tight">
                    <label for="id_spesialisasi" class="col col-form-label">Jenis Laboratorium</label>
                    <div class="col-9">
                        <?= form_dropdown('id_spesialisasi', $id_spesialisasi, array(), 'class="custom-form" style="height:1cm" id=id_spesialisasi') ?>
                    </div>
                </div>
                <div class="form-group row tight">
                    <label for="id_layanan" class="col col-form-label">Tindakan</label>
                    <div class="col-9">
                        <?= form_dropdown('id_layanan', $id_layanan, array(), 'class="custom-form" style="height:1cm" id=id_layanan') ?>
                    </div>
                </div>
                <?= form_close() ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-window-close"></i> Batal</button>
                <button type="button" class="btn btn-info waves-effect" onclick="simpanDataTindLabPK()"><i class="fas fa-save"></i> Simpan</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- End Modal Layanan -->