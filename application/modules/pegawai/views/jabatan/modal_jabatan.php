<!-- Modal Jabatan -->
<div id="modal_jabatan" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal_jabatan_label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal_jabatan_label"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <?= form_open('', 'role=form class=form-horizontal id=formjabatan'); ?>
                <input type="hidden" name="id" id="id_jabatan">
                <div class="form-group tight">
                    <input type="text" name="nama_jabatan" id="nama_jabatan" class="form-control" placeholder="Nama Jabatan">
                </div>
                <?= form_close(); ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-window-close"></i> Batal</button>
                <button type="button" class="btn btn-info waves-effect" onclick="simpanDataJabatan()"><i class="fas fa-save"></i> Simpan</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- End Modal Jabatan -->