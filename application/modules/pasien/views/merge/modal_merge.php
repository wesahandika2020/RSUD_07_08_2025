<!-- Modal Merge Pasien -->
<div id="modal_merge" class="modal fade" role="dialog" aria-labelledby="modal_merge_label" aria-hidden="true">
    <div class="modal-dialog" style="max-width: 80%">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal_merge_label"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <?= form_open('', 'role=form class=form-horizontal id=form_merge'); ?>
                <div class="alert alert-info">
                    <h4 class="text-light"><b><i class="fa fa-exclamation-circle"></i> Information</h4></b> Form ini digunakan untuk menggabungkan pasien yang mempunyai nomor rekam medis lebih dari satu.
                </div>

                <div class="row">
                    <div class="col-12">
                        <table class="table table-sm table-striped table-detail">
                            <tr>
                                <td colspan="2">
                                    <h5 class="m-t-5"><strong>No. RM Utama</strong></h5>
                                </td>
                            </tr>
                            <!--<tr>
                                <td width="50%">
                                    <div class="form-group row tight">
                                        <label for="pasien_utama" class="col-1 col-form-label">Pasien</label>
                                        <div class="col-5">
                                            <input class="select2-input" type="text" name="pasien_utama" id="pasien_utama">
                                        </div>
                                    </div>
                                </td>
                            </tr>-->

                            <tr>
                                <td width="10%" class="bold">Pasien</td>
                                <td width="90%">
                                    <div class="col-5" style="padding-left: 0px;">
                                        <input class="select2-input" type="text" name="pasien_utama" id="pasien_utama">
                                    </div>
                                </td>
                            </tr>   
                            <tr>
                                <td class="bold">NIK  </td>
                                <td> <span id="nik_gabung"></span></td>
                            </tr>    
                            <tr>
                                <td class="bold">Umur  </td>
                                <td> <span id="tgllahir_gabung"></span></td>
                            </tr>   
                            <tr>
                                <td class="bold">Alamat</td>
                                <td> <span id="alamat_gabung"></span></td>
                            </tr>   
                        </table>
                    </div>
                </div>
                <div class="d-flex justify-content-center">
                    <h1 class=""><i class="fas fa-link"></i></h1>
                </div>
                <table class="table table-sm table-striped table-detail">
                    <div class="row">
                        <div class="col-12">
                            <tr>
                                <td>
                                    <h5 class="m-t-5"><strong>No. RM Yang Akan Digabung</strong></h5>
                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td width="50%">
                                    <div class="form-group row tight">
                                        <label for="pasien_gabung" class="col-1 col-form-label">Pasien</label>
                                        <div class="col">
                                            <input class="select2-input" type="text" name="pasien_gabung" id="pasien_gabung">
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <button type="button" class="waves-effect btn btn-info m-t-5" onclick="pilihPasienMerge()"><i class="fas fa-plus-circle m-r-5"></i>Pilih Pasien</button>
                                    <button type="button" class="waves-effect btn btn-secondary m-t-5" onclick="resetPasienMerge()"><i class="fas fa-history m-r-5"></i>Reset</button>
                                </td>
                            </tr>
                        </div>
                    </div>
                </table>
                <div class="table-responsive">
                    <table id="table_merge" class="table table-hover table-striped table-sm color-table info-table m-t-5">
                        <thead>
                            <tr>
                                <th class="text-center">No. RM</th>
                                <th>NIK</th>
                                <th>Nama</th>
                                <th>Kelamin</th>
                                <th>Tanggal Lahir</th>
                                <th>Alamat</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>

                <?= form_close(); ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-window-close"></i> Batal</button>
                <button type="button" class="btn btn-info waves-effect" onclick="prosesMerge()"><i class="fas fa-random"></i> Proses</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- End Modal Merge Pasien -->

<!-- Modal Merge Pasien LOG -->
<div id="modal_merge_log" class="modal fade" role="dialog" aria-labelledby="modal_merge_log_label" aria-hidden="true">
    <div class="modal-dialog" style="max-width: 80%">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal_merge_log_label"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">

                <table class="table table-sm table-striped table-pasien-log">
                    <div class="row">
                        <div class="col-12">
                            <tr>
                                <td width="50%">
                                    <div class="form-group row tight">
                                        <label for="pasien_gabung" class="col-1 col-form-label"><h5><strong>No RM</strong></h5> </label>
                                        <div class="col">
                                            <input class="form-control" type="text" name="pasien_log" onkeypress="return hanyaAngka(event)" id="pasien_log" placeholder="No. RM">
                                        </div>
                                        <button type="button" class="waves-effect btn btn-info" onclick="getMergeHistory()"><i class="fas fa-search m-r-5"></i>Cari</button>
                                    </div>
                                </td>
                                <td></td>
                                <td></td>
                            </tr>
                        </div>
                    </div>
                </table>

                <h5 class="m-t-5"><strong>Data Utama</strong></h5>
                <div class="table-responsive">
                    <table id="table_utama_log" class="table table-hover table-striped table-sm color-table info-table m-t-5">
                        <thead>
                            <tr>
                                <th class="text-center">No. RM</th>
                                <th>NIK</th>
                                <th>No BPJS</th>
                                <th>Nama</th>
                                <th>Kelamin</th>
                                <th>Tanggal Lahir</th>
                                <th>Alamat</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
                <br>

                <h5 class="m-t-5"><strong>Data Gabungan (History) </strong></h5>
                <div class="table-responsive">
                    <table id="table_gabungan_log" class="table table-hover table-striped table-sm color-table info-table m-t-5">
                        <thead>
                            <tr>
                                <th class="text-center">No. RM</th>
                                <th>NIK</th>
                                <th>No BPJS</th>
                                <th>Nama</th>
                                <th>Kelamin</th>
                                <th>Tanggal Lahir</th>
                                <th>Alamat</th>
                                <th>Petugas</th>
                                <th>Waktu Ubah</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>

                <?= form_close(); ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-window-close"></i> Batal</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- End Modal Merge Pasien LOG -->

<?php $this->load->view('merge/js'); ?>