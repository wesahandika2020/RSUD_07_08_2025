<!-- Modal Modul -->
<div id="modal_module" class="modal animated bounceInRight" tabindex="-1" role="dialog" aria-labelledby="modal_module_label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal_module_label"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <?= form_open('', 'role=form class=form-horizontal id=formmodule'); ?>
                <input type="hidden" name="id" id="id">
                <div class="form-group tight">
                    <input type="text" name="nama" id="nama" class="form-control" placeholder="Nama Modul">
                </div>
                <div class="form-group tight">
                    <textarea name="keterangan" class="form-control" id="keterangan" cols="10" placeholder="Keterangan"></textarea>
                </div>
                <div class="form-group tight">
                    <input type="text" name="icon" id="icon" class="form-control" placeholder="Icon Modul">
                </div>
                <div class="form-group tight">
                    <input type="text" name="sort" id="sort" class="form-control col-4" placeholder="Sort By">
                </div>
                <?= form_close(); ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-window-close"></i> Batal</button>
                <button type="button" class="btn btn-info waves-effect" onclick="konfirmasiSimpan()"><i class="fas fa-save"></i> Simpan</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- End Modal Modul -->