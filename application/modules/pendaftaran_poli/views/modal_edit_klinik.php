<!-- Modal Edit Klinik Pendaftaran Poliklinik -->
<div id="modal_edit_klinik" class="modal fade" role="dialog" aria-labelledby="modal_edit_klinik_label" aria-hidden="true">
    <div class="modal-dialog" style="max-width: 45%">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal_edit_klinik_label"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <?= form_open('', 'id=form_edit_klinik role=form class=form-horizontal') ?>
                <input type="hidden" name="id_layanan_pendaftaran" id="id_layanan_pendaftaran_edit" />
                <input type="hidden" id="id-poli-edit">
                <input type="hidden" name="id_jadwal_dokter" id="id-jadwal-dokter">
                <div class="form-group row tight">
                    <label for="" class="col-4 col-form-label">Klinik Asal</label>
                    <div class="col-8">
                        <h5 id="label_unit_edit" class="m-t-10 bold"></h5>
                    </div>
                </div>
                <div class="form-group row tight">
                    <label for="layanan_edit" class="col-4 col-form-label">Klinik Tujuan<span class="text-red">*</span></label>
                    <div class="col">
                        <input type="text" name="layanan" id="layanan_edit" class="select2-input">
                    </div>
                    <div class="col-md-2" style="display: flex; align-items: center; margin-left: 20px">
                        <input type="checkbox" class="form-check-input" checked="" id="unitkerja-edit">Unit Kerja
                    </div>
                </div>
                <div class="form-group row tight">
                    <label for="dpjp_edit" class="col-4 col-form-label">Dokter Penanggung Jawab</label>
                    <div class="col-8">
                        <input type="text" name="dpjp" id="dpjp_edit" class="select2-input">
                    </div>
                </div>
                <?= form_close() ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-window-close"></i> Keluar</button>
                <button type="button" class="btn btn-info waves-effect" onclick="simpanEditKlinik()"><i class="fas fa-save"></i> Update</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- End Modal Edit Klinik Pendaftaran Poliklinik -->

<!-- Modal Antri Klinik Lain -->
<div id="modal_antri_klinik" class="modal fade" role="dialog" aria-labelledby="modal_antri_klinik_label" aria-hidden="true">
    <div class="modal-dialog" style="max-width: 45%">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal_antri_klinik_label"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <?= form_open('', 'id=form_antri_klinik role=form class=form-horizontal') ?>
                <input type="hidden" name="no_antrian" id="no_antrian_lain" />
                <input type="hidden" name="id_pendaftaran" id="id_pendaftaran_antri" />
                <div class="form-group row tight">
                    <label for="layanan_antri" class="col-3 col-form-label">Klinik<span class="text-red">*</span></label>
                    <div class="col-8">
                        <input type="text" name="layanan_antri" id="layanan_antri" class="select2-input validate-input">
                    </div>
                </div>
                <div class="form-group row tight">
                    <label for="dokter_antri" class="col-3 col-form-label">Dokter <span class="text-red">*</span></label>
                    <div class="col-8">
                        <select name="dokter_antri" class="custom-select reset-select" id="dokter_antri">
                            <option value="">Pilih Dokter</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row tight">
                    <label for="antrian" class="col-3 col-form-label">Antrian Klinik Ke -</label>
                    <div class="col-8">
                        <div id="antrian_lain"></div>
                    </div>
                </div>
                <?= form_close() ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-window-close"></i> Batal</button>
                <button type="button" class="btn btn-info waves-effect" onclick="antriPoliklinik()"><i class="fas fa-plus"></i> Antri</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- End Modal Antri Klinik Lain -->