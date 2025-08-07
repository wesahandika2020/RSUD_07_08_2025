<!-- Modal Penjamin -->
<div id="modal_penjamin" class="modal fade" role="dialog" aria-labelledby="modal_penjamin_label" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal_penjamin_label"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <?= form_open('', 'id=form_penjamin role=form class=form-horizontal') ?>
                <input name="id" type="hidden" id="id">
                <input name="kode_rekening" type="hidden" id="kode_rekening" />

                <div class="form-group row tight edit_hide">
                    <label for="jenis_penjamin" class="col-3 col-form-label">Jenis Penjamin</label>
                    <div class="col-4">
                        <?= form_dropdown('jenis_penjamin', $jenis_penjamin, array(), 'class="custom-select" id=jenis_penjamin') ?>
                    </div>
                </div>
                <div class="form-group row tight">
                    <label for="kode" class="col-3 control-label">Kode</label>
                    <div class="col-4">
                        <input type="text" name="kode" class="form-control" id="kode" placeholder="Kode">
                    </div>
                </div>
                <div class="form-group row tight">
                    <label for="nama" class="col-3 control-label">Nama</label>
                    <div class="col-8">
                        <input type="text" name="nama" class="form-control" id="nama" placeholder="Nama Penjamin">
                    </div>
                </div>
                <div class="form-group row tight">
                    <label for="reimbuse" class="col-3 col-form-label">Reimbuse</label>
                    <div class="col-4">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">%</span>
                            </div>
                            <input type="number" name="reimbuse" id="reimbuse" class="form-control" placeholder="Reimbuse">
                        </div>
                    </div>
                </div>
                <div class="form-group row tight">
                    <label for="reimbuse_barang" class="col-3 col-form-label">Reimbuse Barang</label>
                    <div class="col-4">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">%</span>
                            </div>
                            <input type="number" name="reimbuse_barang" id="reimbuse_barang" class="form-control" placeholder="Reimbuse Barang">
                        </div>
                    </div>
                </div>
                <div class="form-group row tight">
                    <label for="rekening_auto" class="col-3 control-label">Rekening</label>
                    <div class="col-8">
                        <input type="text" name="rekening_auto" id="rekening_auto" class="select2-input">
                    </div>
                </div>

                <?= form_close() ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-window-close"></i> Batal</button>
                <button type="button" class="btn btn-info waves-effect" onclick="simpanDataPenjamin()"><i class="fas fa-save"></i> Simpan</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- End Modal Penjamin -->