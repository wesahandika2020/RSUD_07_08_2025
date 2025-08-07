<!-- Modal Satuan -->
<div id="modal_satuan" class="modal fade" role="dialog" aria-labelledby="modal_satuan_label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal_satuan_label"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <?= form_open('', 'role=form class=form-horizontal id=form_satuan'); ?>
                <input type="hidden" name="id" id="id">
                <div class="form-group row tight">
                    <label for="nama" class="col col-form-label">Nama</label>
                    <div class="col-9">
                        <input class="form-control" type="text" name="nama" id="nama" placeholder="Nama Satuan">
                    </div>
                </div>
                <div class="form-group row tight">
                    <label for="jenis" class="col col-form-label">Jenis</label>
                    <div class="col-9">
                        <?= form_dropdown('jenis', array('' => 'Pilih ...','Inventory' => 'Inventory','Pemeriksaan' => 'Pemeriksaan', 'Keuangan' => 'Keuangan', 'Bank Darah' => 'Bank Darah'), 'Inventory', 'class="form-control" id="view_on"') ?>
                    </div>
                </div>
                <?= form_close(); ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-window-close"></i> Batal</button>
                <button type="button" class="btn btn-info waves-effect" onclick="simpanDataSatuan()"><i class="fas fa-save"></i> Simpan</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- End Modal Satuan -->