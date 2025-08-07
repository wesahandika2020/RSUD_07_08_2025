<!-- Modal Menu -->
<div id="modal_menu" class="modal animated bounceInRight" role="dialog" aria-labelledby="modal_menu_label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal_menu_label"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <?= form_open('', 'role=form class=form-horizontal id=formmenu'); ?>
                <input type="hidden" name="id" id="id">
                <div class="form-group tight">
                    <input type="text" name="id_module" class="select2-input" id="selectModule">
                </div>
                <div class="form-group tight">
                    <input type="text" name="nama" id="nama" class="form-control" placeholder="Nama Menu">
                </div>
                <div class="form-group tight">
                    <input type="text" name="url" id="url" class="form-control" placeholder="Url Menu">
                </div>
                <div class="form-group tight">
                    <input type="text" name="sort" id="sort" class="form-control col-3" placeholder="Sort By">
                </div>
                <div class="form-group tight">
                    <?= form_dropdown('active', ['1' => 'Active', '0' => 'Not Active'], array(), 'class="custom-select col-3" id=status') ?>
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
<!-- End Modal Menu -->