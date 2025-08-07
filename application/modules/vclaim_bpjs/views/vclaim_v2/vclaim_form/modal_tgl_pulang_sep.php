<!-- Modal Update Tgl Pulang SEP -->
<div id="modal_tgl_pulang_sep" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal_tgl_pulang_sep_label"><b>Update Tanggal Pulang Ver. 2.0</b></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <?= form_open('', 'role=form class=form-horizontal id=form_tgl_pulang_sep'); ?>
                <div class="form-group row tight">
                    <label class="col-lg-4 col-form-label right">No. SEP :</label>
                    <div class="col-lg-8">
                        <input type="text" name="no_sep" id="no_sep_update" class="form-control" readonly>
                    </div>
                </div>
                <div class="form-group row tight">
                    <label class="col-lg-4 col-form-label right">Status Pulang :</label>
                    <div class="col-lg-8">
                        <select name="status_pulang" id="status_pulang_update" class="form-control">
                            <option value="1">Atas Persetujuan Dokter</option>
                            <option value="3">Atas Permintaan Sendiri</option>
                            <option value="4">Meninggal</option>
                            <option value="5">Lain-lain</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row tight meninggal_bpjs" style="display:none">
                    <label class="col-lg-4 col-form-label right">No. Surat Meninggal :</label>
                    <div class="col-lg-8">
                        <input type="text" name="no_surat_meninggal" id="no_surat_meninggal_update" class="form-control">
                    </div>
                </div>
                <div class="form-group row tight meninggal_bpjs" style="display:none">
                    <label class="col-lg-4 col-form-label right">Tanggal Meninggal :</label>
                    <div class="col-lg-6">
                        <input type="text" name="tanggal_meninggal" id="tanggal_meninggal_update" class="form-control">
                    </div>
                </div>
                <div class="form-group row tight">
                    <label class="col-lg-4 col-form-label right">Tanggal Pulang :</label>
                    <div class="col-lg-6">
                        <input type="text" name="tanggal_pulang" id="tanggal_pulang_update" class="form-control">
                    </div>
                </div>
                <div class="form-group row tight meninggal_bpjs">
                    <label class="col-lg-4 col-form-label right">No. LP Manual :</label>
                    <div class="col-lg-8">
                        <input type="text" name="no_lp_manual" id="no_lp_manual_update" class="form-control">
                        <span class="text-danger"><small><i>*) Diisi jika SEP nya adalah KLL</i></small></span>
                    </div>
                </div>
                <?= form_close(); ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-window-close"></i> Batal</button>
                <button type="button" class="btn btn-info waves-effect" onclick="doUpdateTglPulang()"><i class="fas fa-save"></i> Update</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- End Modal Update Tgl Pulang SEP -->