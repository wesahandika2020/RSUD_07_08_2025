<!-- Modal Expertise -->
<div id="modal-expertise" class="modal fade" role="dialog" data-backdrop="static">
    <div class="modal-dialog" style="max-width:50%">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-expertise-title"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <?= form_open('', 'role=form class=form-horizontal id=form-expertise'); ?>
                <input type="hidden" name="id" id="id">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group row tight">
                            <label class="col-lg-2 col-form-label">Nama Layanan</label>
                            <div class="col-lg-10">
                                <input type="text" name="layanan" id="layanan-auto" class="select2-input">
                            </div>
                        </div>
                        <div class="form-group row tight">
                            <label class="col-lg-2 col-form-label">Nama Dokter</label>
                            <div class="col-lg-10">
                                <input type="text" name="dokter" id="dokter-auto" class="select2-input">
                            </div>
                        </div>
                        <div class="form-group row tight">
                            <label class="col-lg-2 col-form-label">Keterangan</label>
                            <div class="col-lg-10">
                                <textarea name="keterangan" id="keterangan" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="form-group row tight">
                            <label class="col-lg-2 col-form-label">Expertise</label>
                            <div class="col-lg-10">
                                <div id="editor"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <?= form_close(); ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-times-circle mr-1"></i>Batal</button>
                <button type="button" class="btn btn-info waves-effect" onclick="konfirmasiDataExpertise()"><i class="fas fa-save mr-1"></i>Simpan</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- End Modal Expertise -->

<!-- Modal Detail -->
<div id="modal-detail" class="modal fade" role="dialog" data-backdrop="static">
    <div class="modal-dialog" style="max-width:40%">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Expertise</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <div id="isi"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-times-circle mr-1"></i>Keluar</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- End Modal Detail -->