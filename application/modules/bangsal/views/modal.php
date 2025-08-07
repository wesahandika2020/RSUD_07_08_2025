<!-- Modal Bangsal -->
<div id="modal-bangsal" class="modal fade" role="dialog" aria-labelledby="modal-bangsal-label" aria-hidden="true">
    <div class="modal-dialog" style="max-width: 550px">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-bangsal-label"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <?= form_open('', 'role=form class=form-horizontal id=form-bangsal'); ?>
                <input type="hidden" name="id" id="id">
                <div class="form-group row tight">
                    <label for="bangsal" class="col col-form-label">Bangsal</label>
                    <div class="col-9">
                        <input class="form-control" type="text" name="bangsal" id="bangsal" placeholder="Nama Bangsal">
                    </div>
                </div>
                <div class="form-group row tight">
                    <label for="kode" class="col col-form-label">Kode</label>
                    <div class="col-9">
                        <input class="form-control" type="text" name="kode" id="kode" placeholder="Kode">
                    </div>
                </div>
                <div class="form-group row tight">
                    <label for="unit" class="col col-form-label">Unit</label>
                    <div class="col-9">
                        <input class="select2-input" type="text" name="unit" id="unit" placeholder="Unit">
                    </div>
                </div>
                <div class="form-group row tight kode-kelas-bed">
                    <label for="kode-kelas-bed" class="col col-form-label">Kode Kelas</label>
                    <div class="col-9">
                        <?= form_dropdown('kode_kelas_bed', $kode_kelas_bed, array(), 'class=form-control id=kode-kelas-bed') ?>
                    </div>
                </div>
                <div class="form-group row tight">
                    <label for="keterangan" class="col col-form-label">Keterangan</label>
                    <div class="col-9">
                        <textarea class="form-control" name="keterangan" id="keterangan" placeholder="Keterangan"></textarea>
                    </div>
                </div>
				<div class="form-group row tight">
                    <label for="is_for_woman" class="col col-form-label">Is For Woman</label>
                    <div class="col-9">
                        <select class="form-control" name="is_for_woman" id="is_for_woman">
                            <option value="Ya">Ya</option>
                            <option value="Tidak">Tidak</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row tight">
                    <label for="status" class="col col-form-label">Is Active</label>
                    <div class="col-9">
                        <select class="form-control" name="status" id="status">
                            <option value="Ya">Ya</option>
                            <option value="Tidak">Tidak</option>
                        </select>
                    </div>
                </div>
                <?= form_close(); ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-times-circle mr-1"></i>Batal</button>
                <button type="button" class="btn btn-info waves-effect" onclick="simpanDataBangsal()"><i class="fas fa-save mr-1"></i>Simpan</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- End Modal Bangsal -->
