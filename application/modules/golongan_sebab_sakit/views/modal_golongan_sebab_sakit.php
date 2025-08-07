<!-- Modal Golongan Sebab Sakit -->
<div id="modal_golongan_sebab_sakit" class="modal fade" role="dialog" aria-labelledby="modal_golongan_sebab_sakit_label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal_golongan_sebab_sakit_label"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <?= form_open('', 'role=form class=form-horizontal id=form_golongan_sebab_sakit'); ?>
                <input type="hidden" name="id" id="id">
                <div class="form-group row tight">
                    <label for="no_dtd" class="col col-form-label">No. DTD</label>
                    <div class="col-9">
                        <input class="form-control" type="text" name="no_dtd" id="no_dtd" placeholder="No. DTD">
                    </div>
                </div>
                <div class="form-group row tight">
                    <label for="kode_icdx" class="col col-form-label">Kode ICD X</label>
                    <div class="col-9">
                        <input class="form-control" type="text" name="kode_icdx" id="kode_icdx" placeholder="Kode ICD X">
                    </div>
                </div>
                <div class="form-group row tight">
                    <label for="nama" class="col col-form-label">Nama</label>
                    <div class="col-9">
                        <input class="form-control" type="text" name="nama" id="nama" placeholder="Nama">
                    </div>
                </div>
                <div class="form-group row tight">
                    <label for="menular" class="col col-form-label">Menular</label>
                    <div class="col-9">
                        <?= form_dropdown('menular', $opsi, array(), 'class="custom-select" id=menular') ?>
                    </div>
                </div>
                <?= form_close(); ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-window-close"></i> Batal</button>
                <button type="button" class="btn btn-info waves-effect" onclick="simpanDataGolonganSebabSakit()"><i class="fas fa-save"></i> Simpan</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- End Modal Golongan Sebab Sakit -->