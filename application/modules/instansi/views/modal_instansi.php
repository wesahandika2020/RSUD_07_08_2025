<!-- Modal Instansi -->
<div id="modal_instansi" class="modal fade" role="dialog" aria-labelledby="modal_instansi_label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal_instansi_label"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <?= form_open('', 'role=form class=form-horizontal id=form_instansi'); ?>
                <input type="hidden" name="id" id="id">
                <div class="form-group row tight">
                    <label for="nama" class="col col-form-label">Nama</label>
                    <div class="col-9">
                        <input class="form-control" type="text" name="nama"  id="nama" placeholder="Nama instansi">
                    </div>
                </div>
                <div class="form-group row tight">
                    <label for="alamat" class="col col-form-label">Alamat</label>
                    <div class="col-9">
                        <textarea name="alamat" id="alamat" class="form-control" placeholder="Alamat lengkap"></textarea>
                    </div>
                </div>
                <div class="form-group row tight">
                    <label for="email" class="col col-form-label">Email</label>
                    <div class="col-9">
                        <input class="form-control" type="email" name="email"  id="email" placeholder="Email">
                    </div>
                </div>
                <div class="form-group row tight">
                    <label for="text" class="col col-form-label">Telepon</label>
                    <div class="col-9">
                        <input class="form-control" type="text" name="telp"  id="telp" maxlength="13" placeholder="Telepon">
                    </div>
                </div>
                <div class="form-group row tight">
                    <label for="text" class="col col-form-label">Is Pendaftaran</label>
                    <div class="col-9">
                        <?= form_dropdown('ispendaftaran', ['1' => 'Ya', '0' => 'Tidak'], array(), 'class="custom-select col-5" id=ispendaftaran') ?>
                    </div>
                </div>
                <?= form_close(); ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-window-close"></i> Batal</button>
                <button type="button" class="btn btn-info waves-effect" onclick="simpanDataInstansi()"><i class="fas fa-save"></i> Simpan</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- End Modal Instansi -->