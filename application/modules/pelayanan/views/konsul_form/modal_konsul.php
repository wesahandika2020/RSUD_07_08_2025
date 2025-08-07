<!-- Modal Konsul Klinik Lain -->
<div id="modal-konsul" class="modal fade" role="dialog" aria-labelledby="modal-konsul-label" aria-hidden="true">
    <div class="modal-dialog" style="min-width:50%">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-konsul-label">Form Konsul Klinik Lain</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <?= form_open('', 'id=form-konsul role=form class=form-horizontal') ?>
                <input type="hidden" id="id-unit-layanan-konsul">
                <input type="hidden" name="id_pendaftaran" id="id-pendaftaran-konsul">
                <input type="hidden" name="id_layanan_pendaftaran" id="id-layanan-pendaftaran-konsul">
                <div class="form-group row tight">
                    <label class="col-md-3 col-form-label">Klinik <span class="text-red">*</span></label>
                    <div class="col-md-9">
                        <input type="text" name="layanan_antri" id="layanan-antri" class="select2-input">
                    </div>
                </div>
                <div class="form-group row tight">
                    <label for="dokter" class="col-md-3 col-form-label">Dokter <span class="text-red">*</span></label>
                    <div class="col-md-9">
                        <select name="dokter_konsul" class="custom-select reset-select" id="dokter-konsul">
                            <option value="">Pilih Dokter</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row tight">
                    <label class="col-md-3 col-form-label">Keterangan</label>
                    <div class="col-md-9">
                        <input type="text" name="keterangan" id="keterangan" class="form-control">
                    </div>
                </div>
                <div class="form-group row tight">
                    <label class="col-md-3 col-form-label"></label>
                    <div class="col-md-9">
                        <button type="button" class="btn btn-info" onclick="addKonsul()"><i class="fas fa-plus-circle mr-2"></i>Tambah</button>
                    </div>
                </div>

                <table class="table table-striped table-hover table-sm color-table info-table" id="table-konsul">
                    <thead>
                    <tr>
                            <th class="center" width="5%">No.</th>
                            <th class="left" width="30%">Klinik</th>
                            <th class="left" width="30%">Dokter</th>
                            <th class="left" width="30%">Keterangan</th>
                            <th class="center" width="5%"></th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
                <?= form_close() ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-times-circle"></i> Batal</button>
                <button type="button" class="btn btn-info waves-effect" onclick="entriKonsul()"><i class="fas fa-plus-circle"></i> Entri</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- End Modal Konsul Klinik Lain -->

<?php $this->load->view('pelayanan/konsul_form/js') ?>