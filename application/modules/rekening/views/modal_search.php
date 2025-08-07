<!-- Modal Search -->
<div id="modal_search" class="modal fade" role="dialog" aria-labelledby="modal_search_label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal_search_label"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <?= form_open('', 'id=form_search role=form class=form-horizontal') ?>
                <input name="id" type="hidden" id="id_rekening_search" />
                <div class="form-group row tight">
                    <label for="kode" class="col col-form-label">Kode</label>
                    <div class="col-12">
                        <input type="text" name="kode" id="kode-search" class="form-control" placeholder="Kode Rekening" />
                    </div>
                </div>
                <div class="form-group row tight edit_hide">
                    <label for="rekening" class="col col-form-label">Nama</label>
                    <div class="col-12">
                        <input type="text" name="rekening" id="rekening-search" class="form-control" placeholder="Nama Rekening" />
                    </div>
                </div>

                <?= form_close() ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-window-close"></i> Keluar</button>
                <button type="button" class="btn btn-info waves-effect" onclick="getAllListRekening(1)"><i class="fas fa-search"></i> Cari</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- End Modal Search -->