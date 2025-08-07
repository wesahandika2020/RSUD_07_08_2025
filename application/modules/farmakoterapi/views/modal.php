<!-- Modal Farmakoterapi -->
<div id="modal_farmakoterapi" class="modal fade" role="dialog" aria-labelledby="modal_farmakoterapi_label" aria-hidden="true">
    <div class="modal-dialog" style="max-width:50%">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal_farmakoterapi_label"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <?= form_open('', 'role=form class=form-horizontal id=form_farmakoterapi'); ?>
                <input type="hidden" name="id" id="id">
                <div class="form-group row tight edit-hide">
                    <label for="farmakoterapi-auto" class="col col-form-label">Parent</label>
                    <div class="col-9">
                        <input class="select2-input" type="text" name="id_parent" id="farmakoterapi-auto">
                    </div>
                </div>
                <div class="form-group row tight">
                    <label for="nama" class="col col-form-label">Nama</label>
                    <div class="col-9">
                        <input class="form-control" type="text" name="nama" id="nama" placeholder="Nama ...">
                    </div>
                </div>
                
                <?= form_close(); ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-window-close"></i> Batal</button>
                <button type="button" class="btn btn-info waves-effect" onclick="simpanDataFarmakoterapi()"><i class="fas fa-save"></i> Simpan</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- End Modal Farmakoterapi -->