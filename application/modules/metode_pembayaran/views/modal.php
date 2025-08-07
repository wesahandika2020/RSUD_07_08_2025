<!-- Modal Kelas -->
<div id="modal-data" class="modal fade" role="dialog" aria-labelledby="modal-data-label" aria-hidden="true">
    <div class="modal-dialog" style="max-width: 550px">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-data-label"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <?= form_open('', 'role=form class=form-horizontal id=form-data'); ?>
                <input type="hidden" name="id" id="id">
                <div class="form-group row tight">
                    <label for="nama" class="col col-form-label">Nama</label>
                    <div class="col-9">
                        <input class="form-control" type="text" name="nama" id="nama" placeholder="Nama">
                    </div>
                </div>
                <div class="form-group row tight">
                    <label for="keterangan" class="col col-form-label">Keterangan</label>
                    <div class="col-9">
                        <textarea class="form-control" name="keterangan" id="keterangan" placeholder="Keterangan"></textarea>
                    </div>
                </div>
                <?= form_close(); ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-times-circle mr-1"></i>Batal</button>
                <button type="button" class="btn btn-info waves-effect" onclick="simpanData()"><i class="fas fa-save mr-1"></i>Simpan</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- End Modal Kelas -->