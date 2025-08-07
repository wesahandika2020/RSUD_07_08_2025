<div id="modal-del-acc" class="modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-scrollable" style="max-width: 40%">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-del-acc-label"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <?= form_open('', 'role=form class=form-horizontal id=form-cari-log'); ?>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group row tight">
                            <label for="acc_numb" class="col-3 col-form-label">Accession Number</label>
                            <div class="col-6">
                                <input class="form-control" type="text" name="acc_numb" id="acc_numb" placeholder="Accession Number...">
                            </div>
                        </div>
                        <div class="form-group row tight">
                            <label for="no_rm" class="col-3 col-form-label">Nomor RM</label>
                            <div class="col-6">
                                <input class="form-control" type="text" name="no_rm" id="no-rm" placeholder="Nomer RM...">
                            </div>
                        </div>
                    </div>
                </div>
                <?= form_close(); ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-times-circle mr-1"></i>Batal</button>
                <button type="button" class="btn btn-info waves-effect" onclick="cariDataLogDel()"><i class="fas fa-save mr-1"></i>Cari</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<div id="modal-cari-acc" class="modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-scrollable" style="max-width: 40%">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-cari-acc-label"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <?= form_open('', 'role=form class=form-horizontal id=form-cari-acc'); ?>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group row tight">
                            <label for="acc_numb" class="col-3 col-form-label">Accession Number</label>
                            <div class="col-6">
                                <input class="form-control" type="text" name="acc_numb" id="acc_numb" placeholder="Accession Number...">
                            </div>
                        </div>
                        <div class="form-group row tight">
                            <label for="no_rm" class="col-3 col-form-label">Nomor RM</label>
                            <div class="col-6">
                                <input class="form-control" type="text" name="no_rm" id="no-rm" placeholder="Nomer RM...">
                            </div>
                        </div>
                    </div>
                </div>
                <?= form_close(); ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-times-circle mr-1"></i>Batal</button>
                <button type="button" class="btn btn-info waves-effect" onclick="cariDataLogAcc()"><i class="fas fa-save mr-1"></i>Cari</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>