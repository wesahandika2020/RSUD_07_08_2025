<!-- Modal Tenaga Medis -->
<div id="modal_tenaga_medis" class="modal fade" role="dialog" aria-labelledby="modal_tenaga_medis_label" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal_tenaga_medis_label"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <?= form_open('', 'role=form class=form-horizontal id=formnadis'); ?>
                <div class="row">
                    <div class="col-6">
                        <input type="hidden" name="id" id="id_tenaga_medis">
                        <div class="form-group row">
                            <label for="pegawai_auto" class="col-3 control-label">Nama Pegawai</label>
                            <div class="col-8">
                                <input type="text" name="pegawai" class="select2-input" id="pegawai_auto">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="profesi_auto" class="col-3 control-label">Profesi</label>
                            <div class="col-8">
                                <input type="text" name="profesi" class="select2-input" id="profesi_auto">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="spesialisasi_auto" class="col-3 control-label">Spesialisasi</label>
                            <div class="col-8">
                                <input type="text" name="spesialisasi" class="select2-input" id="spesialisasi_auto">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tgl_mulai_praktek" class="col-3 control-label">Tgl Mulai Praktek</label>
                            <div class="col-8">
                                <input type="text" name="tgl_mulai_praktek" id="tgl_mulai_praktek" class="form-control col-6" placeholder="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="kode_bpjs" class="col-3 control-label">Kode BPJS</label>
                            <div class="col-8">
                                <input type="text" name="kode_bpjs" id="kode_bpjs" class="form-control col-6" placeholder="">
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group row">
                            <label for="no_str" class="col-4 control-label">No. STR</label>
                            <div class="col-8">
                                <input type="text" name="no_str" class="form-control" id="no_str" placeholder="No. STR">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="ed_no_str" class="col-4 control-label">Masa Berlaku No. STR</label>
                            <div class="col-8">
                                <input type="text" name="ed_no_str" id="ed_no_str" class="form-control col-6" placeholder="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="no_sip" class="col-4 control-label">No. SIP</label>
                            <div class="col-8">
                                <input type="text" name="no_sip" class="form-control" id="no_sip" placeholder="No. SIP">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="ed_no_sip" class="col-4 control-label">Masa Berlaku No. SIP</label>
                            <div class="col-8">
                                <input type="text" name="ed_no_sip" id="ed_no_sip" class="form-control col-6" placeholder="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="no_sik" class="col-4 control-label">No. SIK</label>
                            <div class="col-8">
                                <input type="number" name="no_sik" class="form-control" id="no_sik" placeholder="No. SIK">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="ed_no_sik" class="col-4 control-label">Masa Berlaku No. SIK</label>
                            <div class="col-8">
                                <input type="text" name="ed_no_sik" id="ed_no_sik" class="form-control col-6" placeholder="">
                            </div>
                        </div>
                    </div>
                </div>
                <?= form_close(); ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" id="batal_tenaga_medis" data-dismiss="modal"><i class="fas fa-window-close"></i> Batal</button>
                <button type="button" class="btn btn-info waves-effect" onclick="simpanDataTenagaMedis()"><i class="fas fa-save"></i> Simpan</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- End Modal Tenaga Medis -->