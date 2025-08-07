<!-- Modal Edit No Rujukan Pendaftaran Poliklinik -->
<div id="modal_edit_no_rujukan" class="modal fade" role="dialog" aria-labelledby="modal_edit_no_rujukan_label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal_edit_no_rujukan_label"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <?= form_open('', 'id=form_edit_no_rujukan role=form class=form-horizontal') ?>
                <input type="hidden" name="id_pendaftaran" id="id_pendaftaran_edit" />
                <div class="form-group row tight">
                    <div class="col-12 row tight m-r-0 m-l-0">
                        <div class="col-3" style="padding-right: 0px;display: flex;align-items: center;">
                            <label for="no_rujukan_edit" class="col-form-label">No. Rujukan<span class="text-red">*</span></label>
                        </div>
                        <div class="col-6" style="padding-right: 0px;">
                            <input type="text" name="no_rujukan" id="no_rujukan_edit" class="form-control reset-field">
                        </div>
                        <div class="col-3" style="padding-right: 0px;display: flex;align-items: stretch;">
                            <button type="button" class="btn btn-info btn-xxs m-l-5" onclick="cekRujukan()"><i class="fas fa-file-alt m-r-5"></i> Cek Rujukan</button>
                        </div>
                    </div>
                    <div class="col-12 row tight m-r-0 m-l-0">
                        <div class="col-3" style="padding-right: 0px;display: flex;align-items: center;"></div>
                        <div class="col-9" style="padding-right: 0px;">
                            <small><i>* Tombol Simpan akan tampil setelah "Cek Rujukan"</i></small>
                        </div>                       
                    </div>

                    <div class="col-12"><hr><h4><b>Data Rujukan - Bridging BPJS</b></h4></div>
                    <div class="col-12 row tight m-r-0 m-l-0">
                        <div class="col-3" style="padding-right: 0px;display: flex;align-items: center;">
                            <label for="id_pasien_edit" class="col-form-label">No Identitas</label>
                        </div>
                        <div class="col-4" style="padding-right: 0px;">
                            <input type="text" name="id_pasien" id="id_pasien_edit" class="form-control form-control-sm" readonly>
                        </div><div class="col-5" style="padding-right: 0px;">
                            <input type="text" name="no_kartu" id="no_kartu_edit" class="form-control form-control-sm" readonly>
                        </div>
                    </div>
                    <div class="col-12 row tight m-r-0 m-l-0">
                        <div class="col-3" style="padding-right: 0px;display: flex;align-items: center;">
                            <label for="nama_pasien_edit" class="col-form-label">Nama</label>
                        </div>
                        <div class="col-9" style="padding-right: 0px;">
                            <input type="text" name="nama_pasien" id="nama_pasien_edit" class="form-control form-control-sm" readonly>
                        </div>
                    </div>
                    <div class="col-12 row tight m-r-0 m-l-0">
                        <div class="col-3" style="padding-right: 0px;display: flex;align-items: center;">
                            <label for="asal_faskes_edit" class="col-form-label">Asal Faskes</label>
                        </div>
                        <div class="col-9" style="padding-right: 0px;">
                            <input type="text" name="asal_faskes" id="asal_faskes_edit" class="form-control form-control-sm" readonly>
                        </div>
                    </div>
                    <div class="col-12 row tight m-r-0 m-l-0">
                        <div class="col-3" style="padding-right: 0px;display: flex;align-items: center;">
                            <label class="col-form-label">Tanggal Rujukan</label>
                        </div>
                        <div class="col-4" style="padding-right: 0px;">
                            <input type="text" name="tgl_rujukan" id="tgl_rujukan_edit" class="form-control form-control-sm" readonly>
                        </div>
                        <div class="col-1" style="padding-right: 0px;">
                            <label class="col-form-label">exp.</label>
                        </div>
                        <div class="col-4" style="padding-right: 0px;">
                            <input type="text" name="tgl_rujukan_exp" id="tgl_rujukan_exp_edit" class="form-control form-control-sm" readonly>
                        </div>
                    </div>
                    <div class="col-12 row tight m-r-0 m-l-0">
                        <div class="col-3" style="padding-right: 0px;display: flex;align-items: center;">
                            <label for="poli_rujukan_edit" class="col-form-label">Kode Poli Rujukan</label>
                        </div>
                        <div class="col-4" style="padding-right: 0px;">
                            <input type="text" name="kode_poli_rujukan" id="kode_poli_rujukan_edit" class="form-control form-control-sm" readonly>
                        </div>
                        <div class="col-5" style="padding-right: 0px;">
                            <input type="text" name="poli_rujukan" id="poli_rujukan_edit" class="form-control form-control-sm" readonly>
                        </div>
                    </div>
                </div>
                <?= form_close() ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-window-close"></i> Keluar</button>
                <span id="btn_simpan_rujukan"></span>
                <!-- <button type="button" class="btn btn-info waves-effect" onclick="simpanEditNoRujukan()"><i class="fas fa-save"></i> Update</button> -->
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- End Modal Edit No Rujukan Pendaftaran Poliklinik -->