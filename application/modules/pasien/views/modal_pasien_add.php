<!-- Modal Pasien -->
<div id="modal_pasien_add" class="modal fade" role="dialog" aria-labelledby="modal_pasien_add_label" aria-hidden="true">
    <div class="modal-dialog" style="max-width: 80%">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal_pasien_add_label"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <div>
                    <h3><b>Cek Data Pasien</b></h3>
                    <div class="row">
                        <div class="col-lg-10 d-flex justify-content-start" >
                            <div class="col-lg-4" style="padding-left: 0px; padding-right: 0px;">
                                <table class="table" style="border: 0; margin-bottom: 0px;">
                                    <tr>
                                        <td style="margin-bottom:0;padding-top: 10px;padding-bottom: 10px;"><b>Nama</b></td>
                                        <td style="padding-bottom: 0px;padding-top: 0px;">
                                            <input type="text" class="form-control" id="pencarian_nama_add" placeholder="Pencarian Nama Pasien ..">
                                        </td>
                                    </tr>                         
                                </table>
                            </div>
                            <div class="col-lg-4" style="padding-left: 0px; padding-right: 0px;">
                                <table class="table" style="border: 0; margin-bottom: 0px;">
                                    <tr>
                                        <td style="margin-bottom:0;padding-top: 10px;padding-bottom: 10px;"><b>No KTP</b></td>
                                        <td style="padding-bottom: 0px;padding-top: 0px;">
                                            <input type="text" class="form-control" id="pencarian_ktp_add" placeholder="Pencarian No KTP Pasien ..">
                                        </td>
                                    </tr>                            
                                </table>
                            </div>
                            <div class="col-lg-4" style="padding-left: 0px; padding-right: 0px;">
                                <h6 style="padding-top: 10px;" id="pencarian_total_add"></h6>
                            </div>
                        </div>
                        <div class="col-lg-2 d-flex justify-content-end">
                            <?= form_button('search', '<i class="fas fa-search"></i> Search', 'id=bt_search_tbl_add class="btn btn-info waves-effect m-r-5"') ?>&nbsp;
                            <?= form_button('reset', '<i class="fas fa-history"></i> Reset', 'id=bt_reset_tbl_add class="btn btn-secondary waves-effect"') ?>&nbsp;
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table id="table_pasien_add" class="table table-hover table-striped table-sm color-table info-table m-t-5">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-center">No. RM</th>
                                    <th class="text-center">NIK</th>
                                    <th class="text-center">Nama</th>
                                    <th class="text-center">Kelamin</th>
                                    <th class="text-center">Tgl Lahir</th>
                                    <th class="text-center">No. Telp</th>
                                    <th class="text-center">Alamat</th>
                                    <th class="text-center">Wilayah</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                    <!-- <hr style="height: 5px; background-color: #45B1FF; border: none;"> -->
                </div>
                <div id='form-tambah-pasien'>                    
                    <h3 style="margin-top: 15px;"><b>Tambah Data Pasien</b></h3>
                    <?= form_open('', 'role=form class=form-horizontal id=form_pasien_add'); ?>
                    <input type="hidden" name="id" id="id">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group row tight">
                                <label for="nama" class="col col-form-label">Nama</label>
                                <div class="col-9">
                                    <input name="nama_add" id="nama_add" class="form-control" placeholder="Nama Pasien">
                                </div>
                            </div>
                            <div class="form-group row tight">
                                <label for="kelamin_add" class="col col-form-label">Jenis Kelamin</label>
                                <div class="col-9">
                                    <?= form_dropdown('kelamin_add', $kelamin, array(), 'class="custom-select col-5" id=kelamin_add') ?>
                                </div>
                            </div>
                            <div class="form-group row tight">
                                <label for="tanggal_lahir_add" class="col col-form-label">Tanggal Lahir</label>
                                <div class="col-9">
                                    <input class="form-control" type="text" name="tanggal_lahir_add" id="tanggal_lahir_add" placeholder="Tanggal Lahir">
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group row tight">
                                <label for="agama_add" class="col col-form-label">Agama</label>
                                <div class="col-9">
                                    <?= form_dropdown('agama_add', $agama, array(), 'class="custom-select" id=agama_add') ?>
                                </div>
                            </div>
                            <div class="form-group row tight">
                                <label for="pendidikan_add" class="col col-form-label">Pendidikan</label>
                                <div class="col-9">
                                    <?= form_dropdown('pendidikan_add', $pendidikan, array(), 'class="custom-select" id=pendidikan_add') ?>
                                </div>
                            </div>
                            <div class="form-group row tight">
                                <label for="no_identitas_add" class="col col-form-label">NIK</label>
                                <div class="col-9">
                                    <input class="form-control" type="text" name="no_identitas_add" onkeypress="return hanyaAngka(event)" id="no_identitas_add" maxlength="16" placeholder="NIK">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-window-close"></i> Batal</button>
                                <button type="button" class="btn btn-info waves-effect" onclick="addDataPasien()"><i class="fas fa-save"></i> Simpan</button>
                            </div>
                        </div>
                    </div>
                </div>
                <?= form_close(); ?>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- End Modal Pasien -->