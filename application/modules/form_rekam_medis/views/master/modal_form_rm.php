<!-- Modal Layanan -->
<div id="modal_form_rm" class="modal fade" role="dialog" aria-labelledby="modal_form_rm_label" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal_form_rm_label"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <?= form_open('','id=form_rekam_medis_pasien role=form class=form-horizontal') ?>
                <input name="id" type="hidden" id="id"/>

                <div class="form-group row tight edit_hide">
                    <label for="form_auto" class="col col-form-label">Formulir Parent</label>
                    <div class="col-9">
                        <input type="text" name="id_parent" id="form_auto" class="select2-input">
                    </div>
                </div>
                <div class="form-group row tight edit_hide">
                    <label for="jenis_formulir_auto" class="col col-form-label">Jenis Formulir</label>
                    <div class="col-9">
                        <input type="text" name="id_jenis_formulir" id="jenis_formulir_auto" class="select2-input">
                    </div>
                </div>

                <div class="form-group row tight">
                    <label for="nama_formulir" class="col-3 col-form-label">Nama Formulir</label>
                    <div class="col-9">
                        <input type="text" name="nama_formulir" class="form-control" id="nama_formulir" placeholder="Nama Formulir">
                    </div>
                </div>
                <div class="form-group row tight">
                    <label for="no_formulir" class="col-3 col-form-label">No. Formulir</label>
                    <div class="col-9">
                        <input type="text" name="no_formulir" class="form-control" id="no_formulir" placeholder="No. Formulir">
                    </div>
                </div>
                <div class="form-group row tight">
                    <label for="test_group" class="col-3 col-form-label">kategori Formulir</label>
                    <div class="col-9">
                        <input type="text" name="kategori_formulir" class="form-control" id="kategori_formulir" placeholder="Kategori Formulir">
                    </div>
                </div>
                <div class="form-group row tight">
                    <label for="test_group" class="col-3 col-form-label">Nama Tabel Formulir</label>
                    <div class="col-9">
                        <textarea type="text" name="table_name_formulir" class="form-control" id="table_name_formulir" placeholder="Nama Tabel pada formulir"></textarea>
                    </div>
                </div>
                
                <?= form_close() ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-window-close"></i> Batal</button>
                <button type="button" class="btn btn-info waves-effect" onclick="simpanDataFormulir()"><i class="fas fa-save"></i> Simpan</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- End Modal Layanan -->