<!-- Modal Layanan -->
<div id="modal_layanan" class="modal fade" role="dialog" aria-labelledby="modal_layanan_label" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal_layanan_label"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <?= form_open('','id=form_layanan role=form class=form-horizontal') ?>
                <input name="id" type="hidden" id="id"/>

                <div class="form-group row tight edit_hide">
                    <label for="layanan_auto" class="col col-form-label">Layanan Parent</label>
                    <div class="col-9">
                        <input type="text" name="id_parent" id="layanan_auto" class="select2-input">
                    </div>
                </div>
                <div class="form-group row tight edit_hide">
                    <label for="jenis_pemeriksaan_auto" class="col col-form-label">Jenis Layanan</label>
                    <div class="col-9">
                        <input type="text" name="id_jenis_pemeriksaan" id="jenis_pemeriksaan_auto" class="select2-input">
                    </div>
                </div>

                <div class="form-group row tight">
                    <label for="layanan" class="col-3 col-form-label">Layanan</label>
                    <div class="col-6">
                        <input type="text" name="nama_layanan" class="form-control" id="nama_layanan" placeholder="Nama layanan">
                    </div>
                </div>
                <div class="form-group row tight">
                    <label for="test_code" class="col-3 col-form-label">Test Code</label>
                    <div class="col-6">
                        <input type="text" name="test_code" class="form-control" id="test_code" placeholder="Test Code LIS">
                    </div>
                </div>
                <div class="form-group row tight">
                    <label for="test_group" class="col-3 col-form-label">Test Group</label>
                    <div class="col-6">
                        <input type="text" name="test_group" class="form-control" id="test_group" placeholder="Test Group LIS">
                    </div>
                </div>
                <div class="form-group row tight">
                    <label for="layanan" class="col-3 col-form-label">Kode ICD IX</label>
                    <div class="col-6">
                        <input type="text" name="icd_ix" class="form-control" id="icd_ix" placeholder="Kode ICD IX">
                    </div>
                </div>

                <?= form_close() ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-window-close"></i> Batal</button>
                <button type="button" class="btn btn-info waves-effect" onclick="simpanDataLayanan()"><i class="fas fa-save"></i> Simpan</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- End Modal Layanan -->