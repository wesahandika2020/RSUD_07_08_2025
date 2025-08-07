<!-- Modal Spesialisasi -->
<div id="modal_spesialisasi" class="modal fade" role="dialog" aria-labelledby="modal_spesialisasi_label" aria-hidden="true">
    <div class="modal-dialog" style="max-width: 800px">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal_spesialisasi_label"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <?= form_open('', 'role=form class=form-horizontal id=form_spesialisasi'); ?>
                <input type="hidden" name="id" id="id">
                <div class="form-group row tight">
                    <label for="kode" class="col-3 col-form-label">Kode</label>
                    <div class="col-4">
                        <input class="form-control" type="text" name="kode" id="kode" placeholder="Kode Spesialisasi">
                    </div>
                </div>
                <div class="form-group row tight">
                    <label for="nama" class="col-3 col-form-label">Kode BPJS</label>
                    <div class="col-4">
                        <input class="form-control" type="text" name="kode_bpjs" id="kode_bpjs" placeholder="Kode BPJS">
                    </div>
                </div>
                <div class="form-group row tight">
                    <label for="nama" class="col col-form-label">Nama Spesialisasi</label>
                    <div class="col-9">
                        <input class="form-control" type="text" name="nama" id="nama" placeholder="Nama">
                    </div>
                </div>
                <div class="form-group row tight">
                    <label for="smf" class="col col-form-label">Staf Medis Fungsional</label>
                    <div class="col-9">
                        <?= form_dropdown('smf', $smf, array(), 'class="custom-select" id=smf') ?>
                    </div>
                </div>
                <div class="form-group row tight">
                    <label for="unit" class="col col-form-label">Unit</label>
                    <div class="col-9">
                        <input class="select2-input" type="text" name="unit" id="unit">
                    </div>
                </div>
                <div class="form-group row tight">
                    <label for="kode_rekening" class="col col-form-label">Kode Rekening</label>
                    <div class="col-9">
                        <input class="select2-input" type="text" name="kode_rekening" id="kode_rekening">
                    </div>
                </div>
                <div class="form-group row tight">
                    <label for="tarif" class="col col-form-label">Tarif Konsultasi</label>
                    <div class="col-9">
                        <input class="select2-input" type="text" name="tarif" id="tarif">
                    </div>
                </div>
                <div class="form-group row tight">
                    <label for="smf" class="col-3 col-form-label">Is Klinik?</label>
                    <div class="col-2">
                        <?= form_dropdown('is_klinik', $opsi, array(), 'class="custom-select" id=is_klinik') ?>
                    </div>
                </div>
                <?= form_close(); ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-window-close"></i> Batal</button>
                <button type="button" class="btn btn-info waves-effect" onclick="simpanDataSpesialisasi()"><i class="fas fa-save"></i> Simpan</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- End Modal Spesialisasi -->