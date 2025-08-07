<!-- Modal Search -->
<div id="modal_search" class="modal fade" role="dialog" aria-labelledby="modal_search_label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal_search_label"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <?= form_open('','id=form_search role=form class=form-horizontal') ?>
                <input name="id" type="hidden" id="id_layanan_search"/>
                <div class="form-group row tight">
                    <label for="nama_search" class="col col-form-label">Nama Layanan</label>
                    <div class="col-12">
                       <input type="text" name="nama" id="nama_search" class="form-control">
                    </div>
                </div>
                <div class="form-group row tight edit_hide">
                    <label for="jenis_auto_search" class="col-4 col-form-label">Jenis Layanan</label>
                    <div class="col">
                      <input type="text" name="id_jenis_pemeriksaan" id="jenis_pemeriksaan_auto_search" class="select2-input">
                    </div>
                </div>

                <?= form_close() ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-window-close"></i> Keluar</button>
                <button type="button" class="btn btn-info waves-effect" onclick="cariLayanan()"><i class="fas fa-search"></i> Cari</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- End Modal Search -->