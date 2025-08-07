<!-- Modal Supplier -->
<div id="modal_supplier" class="modal fade" role="dialog" aria-labelledby="modal_supplier_label" aria-hidden="true">
    <div class="modal-dialog" style="max-width:50%">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal_supplier_label"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <?= form_open('', 'role=form class=form-horizontal id=form_supplier'); ?>
                <input type="hidden" name="id" id="id">
                <div class="form-group row tight">
                    <label for="nama" class="col col-form-label">Nama</label>
                    <div class="col-9">
                        <input class="form-control" type="text" name="nama" id="nama" placeholder="Nama Supplier...">
                    </div>
                </div>
                <div class="form-group row tight">
                    <label for="npwp" class="col col-form-label">NPWP</label>
                    <div class="col-9">
                        <input class="form-control" type="text" name="npwp" id="npwp" placeholder="NPWP Supplier...">
                    </div>
                </div>
                <div class="form-group row tight">
                    <label for="alamat" class="col col-form-label">Alamat</label>
                    <div class="col-9">
                        <textarea name="alamat" id="alamat" class="form-control" placeholder="Alamat Supplier..."></textarea>
                    </div>
                </div>
                <div class="form-group row tight">
                    <label for="email" class="col col-form-label">Email</label>
                    <div class="col-9">
                        <input class="form-control" type="text" name="email" id="email" placeholder="Email Supplier...">
                    </div>
                </div>
                <div class="form-group row tight">
                    <label for="telp" class="col col-form-label">Telp</label>
                    <div class="col-9">
                        <input class="form-control" type="text" name="telp" id="telp" placeholder="Telp Supplier...">
                    </div>
                </div>
                <div class="form-group row tight">
                    <label for="fax" class="col col-form-label">Fax</label>
                    <div class="col-9">
                        <input class="form-control" type="text" name="fax" id="fax" placeholder="Fax Supplier...">
                    </div>
                </div>
                <?= form_close(); ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-times-circle mr-1"></i>Batal</button>
                <button type="button" class="btn btn-info waves-effect" onclick="simpanDataSupplier()"><i class="fas fa-save mr-1"></i>Simpan</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- End Modal Supplier -->