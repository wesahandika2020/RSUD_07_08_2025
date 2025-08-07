<!-- Modal Search -->
<div id="modal-search" class="modal fade" role="dialog">
    <div class="modal-dialog" style="max-width: 45%">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Parameter Pencarian</h4>
                <button type="button" class="close" data-dismiss="modal">×</button>
            </div>
            <div class="modal-body">
                <?= form_open('', 'role=form class=form-horizontal id=form-search'); ?>
                <div class="form-group row tight">
                    <label class="col-3 col-form-label">Tanggal</label>
                    <div class="col-4">
                        <input type="text" name="tanggal_awal" id="tanggal-awal" class="form-control" value="">
                    </div>
                    <div class="col-1">
                        <h5 class="m-t-10">s/d</h5>
                    </div>
                    <div class="col-4">
                        <input type="text" name="tanggal_akhir" id="tanggal-akhir" class="form-control" value="<?= date('d/m/Y') ?>">
                    </div>
                </div>
                <div class="form-group row tight">
                    <label class="col col-form-label">No. RM</label>
                    <div class="col-9">
                        <input class="form-control" type="text" name="no_rm" onkeypress="return hanyaAngka(event)" id="no-rm-search" placeholder="No. RM">
                    </div>
                </div>
                <div class="form-group row tight">
                    <label class="col col-form-label">No. Register</label>
                    <div class="col-9">
                        <input class="form-control" type="text" name="no_register" onkeypress="return hanyaAngka(event)" id="no-register-search" placeholder="No. Register">
                    </div>
                </div>
                <div class="form-group row tight">
                    <label class="col col-form-label">Nama</label>
                    <div class="col-9">
                        <input name="nama" id="nama-search" class="form-control" placeholder="Nama Pasien">
                    </div>
                </div>
                <div class="form-group row tight">
                    <label class="col col-form-label">Jenis Layanan</label>
                    <div class="col-9">
                        <?= form_dropdown('jenis_layanan', $jenis_layanan, array(), 'id=jenis-layanan-search class=form-control') ?>
                    </div>
                </div>
                <div class="form-group row tight">
                    <label class="col col-form-label">Status Hasil</label>
                    <div class="col-9">
                        <?= form_dropdown('status_hasil', $status_hasil, array(), 'id=status-hasil-search class=form-control') ?>
                    </div>
                </div>

                <?= form_close(); ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-times-circle mr-1"></i>Tutup</button>
                <button type="button" class="btn btn-info waves-effect" onclick="getListDataHasilFisioterapi(1)"><i class="fas fa-search mr-1"></i>Cari</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- End Modal Search -->

<!-- Modal Pemeriksaan -->
<div id="modal-detail-pemeriksaan" class="modal fade">
    <div class="modal-dialog modal-dialog-scrollable" style="max-width:80%">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Form Hasil Pemeriksaan Fisioterapi</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <?= form_open('', 'id=form-detail-pemeriksaan role=form class=form-horizontal') ?>
                <input type="hidden" name="id_layanan_pendaftaran" id="id-layanan-pendaftaran">
                <div class="accordion" id="accordionExample">
                    <div class="card">
                        <div class="card-header" id="headingOne">
                            <h2 class="mb-0">
                                <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    <i class="fas fa-user mr-1"></i>Data Pasien
                                </button>
                            </h2>
                        </div>

                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <table class="table table-sm table-striped">
                                            <tbody>
                                                <tr>
                                                    <td width="30%">No. Fisioterapi</td>
                                                    <td width="1%">:</td>
                                                    <td width="69%"><b><span id="no-fisioterapi-detail"></span></b></td>
                                                </tr>
                                                <tr>
                                                    <td>No. RM</td>
                                                    <td>:</td>
                                                    <td><b><span id="no-rm-detail"></span></b></td>
                                                </tr>
                                                <tr>
                                                    <td>No. Register</td>
                                                    <td>:</td>
                                                    <td><b><span id="no-register-detail"></span></b></td>
                                                </tr>
                                                <tr>
                                                    <td>Nama</td>
                                                    <td>:</td>
                                                    <td><b><span id="nama-detail"></span></b></td>
                                                </tr>
                                                <tr>
                                                    <td>Alamat</td>
                                                    <td>:</td>
                                                    <td><b><span id="alamat-detail"></span></b></td>
                                                </tr>
                                                <tr>
                                                    <td>Kelamin</td>
                                                    <td>:</td>
                                                    <td><b><span id="kelamin-detail"></span></b></td>
                                                </tr>
                                                <tr>
                                                    <td>Umur / Tgl. Lahir</td>
                                                    <td>:</td>
                                                    <td><b><span id="umur-detail"></span></b></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col-lg-6">
                                        <table class="table table-sm table-striped">
                                            <tbody>
                                                <tr>
                                                    <td width="30%">Nama P. Jawab</td>
                                                    <td width="1%">:</td>
                                                    <td width="69%"><b><span id="nama-pjwb-detail"></span></b></td>
                                                </tr>
                                                <tr>
                                                    <td>Alamat P. Jawab</td>
                                                    <td>:</td>
                                                    <td><b><span id="alaamt-pjwb-detail"></span></b></td>
                                                </tr>
                                                <tr>
                                                    <td>Telp. P. Jawab</td>
                                                    <td>:</td>
                                                    <td><b><span id="telp-pjwb-detail"></span></b></td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td>&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td>Instansi Perujuk</td>
                                                    <td>:</td>
                                                    <td><b><span id="instansi-perujuk-detail"></span></b></td>
                                                </tr>
                                                <tr>
                                                    <td>Tenaga Medis Perujuk</td>
                                                    <td>:</td>
                                                    <td><b><span id="tenaga-medis-perujuk-detail"></span></b></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="headingTwo">
                            <h2 class="mb-0">
                                <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    <i class="fas fa-list mr-1"></i>Entri Hasil Fisioterapi
                                </button>
                            </h2>
                        </div>
                        <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordionExample">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="box-well">
                                            <input type="hidden" name="id_fisioterapi" id="id-fisioterapi">
                                            <button type="button" onclick="requestFisioterapi()" id="btn-tambah-item" class="btn btn-info"><i class="fas fa-plus-circle mr-1"></i>Tambah Item Pemeriksan</button>
                                            <button type="button" class="btn btn-success" id="btn-print-hasil" onclick="cetakHasilFisioterapi()"><i class="fas fa-print mr-1"></i>Print Hasil fisioterapi</button>

                                            <div id="hasil-pemeriksaan-fisioterapi"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?= form_close() ?>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times-circle mr-1"></i>Close</button>
            </div>
        </div>
    </div>
</div>
<!-- End Modal Pemeriksaan -->


<!-- Modal Hasil Fisioterapi -->
<div id="modal-hasil-fisioterapi" class="modal fade">
    <div class="modal-dialog modal-dialog-scrollable" style="max-width:70%">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Hasil Pemeriksaan Fisioterapi</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
            </div>
            <div class="modal-body">
                <?= form_open('', 'id=form-hasil-fisioterapi role=form class=form-horizontal') ?>
                <input type="hidden" name="id_detail_fisioterapi" id="id-detail-fisioterapi">
                <input type="hidden" name="id_layanan" id="id-layanan-fisioterapi">

                <h5 class="center">Layanan : <b><span id="layanan-edit"></span></b></h5>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group row tight">
                            <label class="col-lg-2 col-form-label text-right">Hasil</label>
                            <div class="col-lg-10">
                                <div id="hasil-field"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <?= form_close() ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times-circle mr-1"></i>Batal</button>
                <button type="button" class="btn btn-info" onclick="konfirmasiSimpanHasil()"><i class="fas fa-save mr-1"></i>Simpan</button>
            </div>
        </div>
    </div>
</div>
<!-- End Modal Hasil Fisioterapi -->
