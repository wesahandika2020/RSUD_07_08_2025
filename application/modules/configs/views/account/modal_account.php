<!-- Modal Account -->
<div id="modal_account" class="modal animated bounceInRight" role="dialog" aria-labelledby="modal_account_label" aria-hidden="true">
    <div class="modal-dialog" style="max-width: 600px;">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal_account_label"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <?= form_open('', 'role=form class=form-horizontal id=formaccount'); ?>
                <input type="hidden" name="id" id="id">
                <div class="form-group row tight-8">
                    <label for="pegawai_auto" class="col-sm-3 col-form-label">Nama Pegawai</label>
                    <div class="col">
                        <input type="text" name="pegawai" class="select2-input" id="pegawai_auto">
                    </div>
                </div>
                <div class="form-group row tight-8">
                    <label for="account" class="col-sm-3 col-form-label">Username</label>
                    <div class="col">
                        <input type="text" name="account" class="form-control" id="account">
                    </div>
                </div>
                <div class="form-group row tight-8">
                    <label for="account_group_auto" class="col-sm-3 col-form-label">Account Group</label>
                    <div class="col">
                        <input type="text" name="account_group" class="select2-input" id="account_group_auto">
                    </div>
                </div>
                <div class="form-group row tight-8">
                    <label for="unit_auto" class="col-sm-3 col-form-label">Unit</label>
                    <div class="col">
                        <input type="text" name="unit" class="select2-input" id="unit_auto">
                    </div>
                </div>
                <div class="form-group row tight-8 password">
                    <label for="key" class="col-sm-3 col-form-label">Key Default</label>
                    <div class="col-4">
                        <input type="text" name="key" id="key" class="form-control" value="12345" readonly>
                    </div>
                </div>
                <div class="form-group row tight-8 password">
                    <label for="" class="col-sm-3 col-form-label"></label>
                    <div class="col">
                        <h6><b>NB : </b><i style="color: red">Harap segera memberitahukan pegawai agar melakukan pergantian password default!!!</i></h6>
                    </div>
                </div>
                <?= form_close(); ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-window-close"></i> Batal</button>
                <button type="button" class="btn btn-info waves-effect" id="bt_simpan" onclick="simpanData()"><i class="fas fa-save"></i> Simpan</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- End Modal Account -->