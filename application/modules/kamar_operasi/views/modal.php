<!-- Modal Kamar Operasi-->
<div id="modal-kamar-operasi" class="modal fade" role="dialog">
    <div class="modal-dialog" style="max-width: 550px">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-kamar-operasi-label"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <?= form_open('', 'role=form class=form-horizontal id=form-kamar-operasi'); ?>
                <input type="hidden" name="id" id="id">
                <div class="form-group row tight">
                    <label for="nama" class="col col-form-label">Nama O.K</label>
                    <div class="col-9">
                        <input class="form-control" type="text" name="nama" id="nama" placeholder="Nama O.K">
                    </div>
                </div>
                <div class="form-group row tight">
                    <label for="keterangan" class="col col-form-label">Keterangan</label>
                    <div class="col-9">
                        <input class="form-control" type="text" name="keterangan" id="keterangan" placeholder="Kode">
                    </div>
                </div>
                <?= form_close(); ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-times-circle mr-1"></i>Batal</button>
                <button type="button" class="btn btn-info waves-effect" onclick="simpanDataKamarOperasi()"><i class="fas fa-save mr-1"></i>Simpan</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- End Modal Kamar Operasi-->