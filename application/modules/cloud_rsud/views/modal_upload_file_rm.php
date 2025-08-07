<link href="<?= resource_url() ?>assets/node_modules/Magnific-Popup-master/dist/magnific-popup.css" rel="stylesheet">
<link href="<?= resource_url() ?>hospital/dist/css/pages/user-card.css" rel="stylesheet">

<style>
    .v-center-cloud {
        display: flex;
        align-items: center;
        justify-content: flex-end;
    }
</style>

<!-- Modal upload-file -->
<div id="modal-upload-file" class="modal fade" role="dialog" data-backdrop="static" aria-labelledby="modal-upload-file-label" aria-hidden="true" style="padding-left: 17px;">
    <div class="modal-dialog modal-dialog-scrollable" style="max-width: 95%">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-upload-file-label"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body el-element-overlay">

                <div class="row">
                    <div class="col-lg-12">

                        <h5 class="center"><b>UPLOAD FILE REKAM MEDIS PASIEN</b></h5><br>
                        <table class="table table-sm table-detail table-striped" width="50%">
                            <tr>
                                <td width="150px"><b>Pasien</b></td>
                                <td width="1px">:</td>
                                <td><span id="ufrm-nama-pasien"></span></td>
                            </tr>
                            <tr>
                                <td>Jenis Kelamin</td>
                                <td>:</td>
                                <td><span id="ufrm-kelamin"></span></td>
                            </tr>
                            <tr>
                                <td>Layanan</td>
                                <td>:</td>
                                <td><span id="ufrm-layanan"></span></td>
                            </tr>
                        </table>

                        <hr>
                        <!-- ?= var_dump($_SESSION) ? -->
                        <div class="data-upload-kosong">
                            <table class="table table-sm table-detail table-striped" width="50%">
                                <tr>
                                    <td class="center">
                                        <h4 style="color: red;">TIDAK ADA DATA FILE UPLOAD REKAM MEDIS</h4>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="upload-sitb">
                            <?= form_open('', 'id=form-upload-file role=form class="form-horizontal form-custom"') ?>
                            <!-- Input Hidden Form -->
                            <input type="hidden" name="id_pendaftaran_sitb" id="id-pendaftaran-sitb">
                            <input type="hidden" name="id_layanan_sitb" id="id-layanan-sitb">
                            <input type="hidden" name="id_pasien_sitb" id="id-pasien-sitb">
                            <input type="hidden" name="id_user_sitb" id="id-user-sitb">
                            <input type="hidden" name="aplikasi_sitb" id="aplikasi-sitb">
                            <input type="hidden" name="kategori_sitb" id="kategori-sitb">
                            <input type="hidden" name="id_cloud_sitb" id="id-cloud-sitb">
                            <input type="hidden" name="created_at_sitb" id="created-at-sitb">

                            <h6><b>File Tuberkulosis (PARU)</b></h6>
                            <button class="btn btn-info btn-xxs" type="button" data-toggle="collapse" data-target="#file-tuberkulosis" aria-expanded="false" aria-controls="file-tuberkulosis">
                                <i class="fas fa-expand m-r-5"></i>Open File Tuberkulosis
                            </button>
                            <div class="collapse" id="file-tuberkulosis">
                                <div class="row" style="padding: 20px;">
                                    <div class="col-lg-4 col-md-6 mt-3">
                                        <div class="card">
                                            <div class="el-card-item">
                                                <div class="el-card-avatar el-overlay-1" style="padding: 10px;"> <img id="image-sitb" src="<?= base_url() ?>resources/images/avatars/ava_1263.jpg" alt="user" />
                                                    <div class="el-overlay">
                                                        <ul class="el-info">
                                                            <li><a id="href-image-sitb" class="btn default btn-outline image-popup-vertical-fit" href="<?= base_url() ?>resources/images/avatars/ava_1263.jpg"><i class="icon-magnifier"></i></a></li>
                                                            <li><a id="download-sitb" title="Download gambar" class="btn default btn-outline" href="javascript:void(0);"><i class="icon-cloud-download"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="el-card-content">
                                                    <h6 id="card-label-sitb" class="box-title"></h6>
                                                    <!-- <h4 id="card-label-sitb" class="box-title">Genelia Deshmukh</h4> -->
                                                    <!-- <small id="card-keterangan-sitb" >Age: 24 years</small> -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-8 mt-3">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group row">
                                                    <label for="no-reg-sitb" class="v-center-cloud control-label text-right col-md-3">No. Regristasi SITB<span class="text-red">*</span></label>
                                                    <div class="col-md-9">
                                                        <input type="text" id="no-reg-sitb" name="no_reg_sitb" placeholder="Masukan Nomor Regristasi SITB" class="form-control-sm">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12 file-upload-sitb">
                                                <div class="form-group row">
                                                    <label for="file_upload_sitb" class="v-center-cloud control-label text-right col-md-3">File Upload<span class="text-red">*</span></label>
                                                    <div class="col-md-9">
                                                        <input type="file" id="file_upload_sitb" accept=".jpg, .jpeg, .png" name="file_upload_sitb" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group row">
                                                    <label for="keterangan-sitb" class="v-center-cloud control-label text-right col-md-3">Keterangan</label>
                                                    <div class="col-md-9">
                                                        <input type="text" id="keterangan-sitb" name="keterangan_sitb" placeholder="Masukan keterangan jika diperlukan" class="form-control-sm">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12 btn-save-sitb">
                                                <div class="form-group row">
                                                    <div class="col-md-3"></div>
                                                    <div class="ml-2">
                                                        <button id="btn-save-sitb" type="button" class="btn waves-effect mr-1"></button>
                                                    </div>
                                                    <div id="div-delete-sitb"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <?= form_close() ?>
                        </div>
                        <div class="file-upload-pasien"></div>
                        <div class="upload-hasil-lainnya">
                            <?= form_open('', 'id=form-hasil-lainnya role=form class="form-horizontal form-custom"') ?>
                            <!-- Input Hidden Form -->
                            <input type="hidden" name="id_pendaftaran_fhl" id="id-pendaftaran-fhl">
                            <input type="hidden" name="id_layanan_fhl" id="id-layanan-fhl">
                            <input type="hidden" name="id_pasien_fhl" id="id-pasien-fhl">
                            <input type="hidden" name="id_user_fhl" id="id-user-fhl">
                            <input type="hidden" name="id_cloud_fhl" id="id-cloud-fhl">
                            <input type="hidden" name="created_at_fhl" id="created-at-fhl">
                            <input type="hidden" name="nama_pasien" id="nama-pasien-fhl">

                            <h6><b>File Hasil Pemeriksaan Lainnya</b></h6>
                            <button class="btn btn-info btn-xxs" type="button" data-toggle="collapse" data-target="#file-hasil-lainnnya" aria-expanded="false" aria-controls="file-hasil-lainnnya">
                                <i class="fas fa-expand m-r-5"></i>Open Tambah Pemeriksaan Lainnya
                            </button>
                            <div class="collapse" id="file-hasil-lainnnya">
                                <div class="row" style="padding: 20px;">

                                    <div class="col-lg-6 mt-3">
                                        <table id="table-list-file-lain" class="table table-hover table-striped table-sm color-table info-table">
                                            <thead>
                                                <tr>
                                                    <th class="center">No.</th>
                                                    <th class="center for-case">Tanggal Kunjungan</th>
                                                    <th class="center">Nama Jenis File</th>
                                                    <th class="center">Tanggal Upload</th>
                                                    <th class="center">Petugas Upload</th>
                                                    <th class="center">Keterangan</th>
                                                    <th class="right"></th>
                                                </tr>
                                            </thead>
                                            <tbody></tbody>
                                        </table>
                                    </div>
                                    <div class="col-lg-6 mt-3">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group row">
                                                    <label for="no-reg-sitb" class="v-center-cloud control-label text-right col-md-3">Pilih Jenis File<span class="text-red">*</span></label>
                                                    <div class="col-md-9">
                                                        <input type="hidden" name="list_kode_file_lainnya" id="list-kode-file-lainnya">
                                                        <input type="text" name="kode_file_lainnya" id="kode-file-lainnya" class="select2c-input">
                                                        <!-- <input type="text" id="no-reg-fhl" name="no_reg_fhl" placeholder="Masukan Nomor Regristasi SITB" class="form-control-sm"> -->
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12 file-upload-fhl">
                                                <div class="form-group row">
                                                    <label for="file_upload_fhl" class="v-center-cloud control-label text-right col-md-3">File Upload<span class="text-red">*</span></label>
                                                    <div class="col-md-9">
                                                        <input type="file" id="file_upload_fhl" accept=".pdf" name="file_upload_fhl" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group row">
                                                    <label for="keterangan-fhl" class="v-center-cloud control-label text-right col-md-3">Keterangan</label>
                                                    <div class="col-md-9">
                                                        <input type="text" id="keterangan-fhl" name="keterangan_fhl" placeholder="Masukan keterangan jika diperlukan" class="form-control-sm">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12 btn-save-fhl">
                                                <div class="form-group row">
                                                    <div class="col-md-3"></div>
                                                    <div class="ml-2">
                                                        <button id="btn-save-fhl" type="button" class="btn waves-effect mr-1 btn-info"><i class="fas fa-save mr-1"></i> Simpan</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <?= form_close() ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-window-close"></i> Keluar</button>
                <!-- <button type="button" class="btn btn-info waves-effect" onclick="konfirmasiSimpan()"><i class="fas fa-save"></i> Simpan</button> -->
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<!-- End Modal upload-file -->

<script src="<?= resource_url() ?>assets/node_modules/Magnific-Popup-master/dist/jquery.magnific-popup.min.js"></script>
<script src="<?= resource_url() ?>assets/node_modules/Magnific-Popup-master/dist/jquery.magnific-popup-init.js"></script>