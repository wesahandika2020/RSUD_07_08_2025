<!-- Modal Rekening -->
<div id="modal_rekening" class="modal fade" role="dialog" aria-labelledby="modal_rekening_label" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal_rekening_label"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <?= form_open('', 'id=form_rekening role=form class=form-horizontal') ?>
                <input name="id" type="hidden" id="id">

                <div class="form-group row tight edit_hide">
                    <label for="rekening_auto" class="col-3 col-form-label">Rekening Parent</label>
                    <div class="col-8">
                        <input type="text" name="id_parent" id="rekening_auto" class="select2-input">
                    </div>
                </div>
                <div class="form-group row tight">
                    <label for="kode" class="col-3 col-form-label">Kode</label>
                    <div class="col-8">
                        <input type="text" name="kode" class="form-control" id="kode" placeholder="Kode Rekening">
                    </div>
                </div>
                <div class="form-group row tight">
                    <label for="rekening" class="col-3 col-form-label">Nama</label>
                    <div class="col-8">
                        <input type="text" name="rekening" class="form-control" id="rekening" placeholder="Nama Rekening">
                    </div>
                </div>

                <?= form_close() ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-window-close"></i> Batal</button>
                <button type="button" class="btn btn-info waves-effect" onclick="simpanDataRekening()"><i class="fas fa-save"></i> Simpan</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- End Modal Rekening -->