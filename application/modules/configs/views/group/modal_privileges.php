<!-- Modal Modul -->
<div id="modal_privileges" class="modal animated bounceInRight" tabindex="-1" role="dialog" aria-labelledby="modal_privileges_label" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal_privileges_label"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <div class="float-left mb-2">
                    <button type="button" class="btn btn-secondary" onclick="checkAll()"><i class="fas fa-list-alt"></i>&nbsp;Check All</button>
                    <button type="button" class="btn btn-secondary" onclick="unCheckAll()"><i class="far fa-list-alt"></i>&nbsp;Uncheck All</button>
                </div>
                <?= form_open('', 'id=formprivileges role=form class=form-horizontal') ?>
                <input type="hidden" name="id" id="id_privileges">
                <table class="table table-hover table-bordered table-striped table-sm color-table info-table" id="table_privileges">
                    <thead>
                        <tr>
                            <th class="text-center" width="5%">No</th>
                            <th width="20%">Module</th>
                            <th width="65%">Menu</th>
                            <th class="text-center" width="10%"></th>
                        </tr>

                    </thead>

                    <tbody></tbody>
                </table>
                <?= form_close() ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-window-close"></i> Batal</button>
                <button type="button" class="btn btn-info waves-effect" onclick="simpanPrivileges()"><i class="fas fa-save"></i> Simpan</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- End Modal Modul -->