<!-- Modal Kelurahan -->
<div id="modal_kelurahan" class="modal fade" role="dialog" aria-labelledby="modal_kelurahan_label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal_kelurahan_label"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <?= form_open('', 'role=form class=form-horizontal id=formkelurahan'); ?>
                <input type="hidden" name="id" id="id_kelurahan">
                <div class="form-group tight">
                    <input type="text" name="id_kecamatan" id="kecamatan" class="select2-input">
                </div>
                <div class="form-group tight">
                    <input type="text" name="nama_kelurahan" id="nama_kelurahan" class="form-control" placeholder="Nama Kelurahan">
                </div>
                <?= form_close(); ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-window-close"></i> Batal</button>
                <button type="button" class="btn btn-info waves-effect" onclick="simpanDataKelurahan()"><i class="fas fa-save"></i> Simpan</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- End Modal Kelurahan -->