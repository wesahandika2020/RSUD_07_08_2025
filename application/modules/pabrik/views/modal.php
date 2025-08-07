<!-- Modal Pabrik -->
<div id="modal_pabrik" class="modal fade" role="dialog" aria-labelledby="modal_pabrik_label" aria-hidden="true">
    <div class="modal-dialog" style="max-width:50%">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal_pabrik_label"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <?= form_open('', 'role=form class=form-horizontal id=form_pabrik'); ?>
                <input type="hidden" name="id" id="id">
                <div class="form-group row tight">
                    <label for="nama" class="col col-form-label">Nama</label>
                    <div class="col-9">
                        <input class="form-control" type="text" name="nama" id="nama" placeholder="Nama Pabrik...">
                    </div>
                </div>
                <div class="form-group row tight">
                    <label for="alamat" class="col col-form-label">Alamat</label>
                    <div class="col-9">
                        <textarea name="alamat" id="alamat" class="form-control" placeholder="Alamat Pabrik..."></textarea>
                    </div>
                </div>
                <div class="form-group row tight">
                    <label for="email" class="col col-form-label">Email</label>
                    <div class="col-9">
                        <input class="form-control" type="text" name="email" id="email" placeholder="Email Pabrik...">
                    </div>
                </div>
                <div class="form-group row tight">
                    <label for="telp" class="col col-form-label">Telp</label>
                    <div class="col-9">
                        <input class="form-control" type="text" name="telp" id="telp" placeholder="Telp Pabrik...">
                    </div>
                </div>
                <?= form_close(); ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-window-close"></i> Batal</button>
                <button type="button" class="btn btn-info waves-effect" onclick="simpanDataPabrik()"><i class="fas fa-save"></i> Simpan</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- End Modal Pabrik -->