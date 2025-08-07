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
                    <label class="col col-form-label">No. Lab</label>
                    <div class="col-9">
                        <input class="form-control" type="text" name="no_lab" id="no-lab-search" placeholder="No. Laboratorium">
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
                <button type="button" class="btn btn-info waves-effect" onclick="getListDataHasilLaboratorium(1)"><i class="fas fa-search mr-1"></i>Cari</button>
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
                <h4 class="modal-title">Form Hasil Pemeriksaan Laboratorium</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <?= form_open('', 'id=form-detail-pemeriksaan role=form class=form-horizontal') ?>
                <input type="hidden" name="id_layanan_pendaftaran" id="id-layanan-pendaftaran">
                <input type="hidden" name="id_daftar" id="id-daftar">
                <input type="hidden" name="id_pasien" id="id-pasien">
                <input type="hidden" id="no-ono">

                <div class="accordion" id="accordionExample">
                    <div class="card">
                        <div class="card-header" id="headingOne">
                            <h2 class="mb-0">
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
                                                    <td width="30%">No. Laboratorium</td>
                                                    <td width="1%">:</td>
                                                    <td width="69%"><span id="no-laboratorium-detail"></span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>No. RM</td>
                                                    <td>:</td>
                                                    <td><b><span id="no-rm-detail"></span></b></td>
                                                </tr>
                                                <tr>
                                                    <td>No. Register</td>
                                                    <td>:</td>
                                                    <td><span id="no-register-detail"></span></td>
                                                </tr>
                                                <tr>
                                                    <td>No.KTP</td>
                                                    <td>:</td>
                                                    <td><span id="ktp-detail"></span></td>
                                                </tr>
                                                <tr>
                                                    <td>Nama</td>
                                                    <td>:</td>
                                                    <td><span id="nama-detail"></span></td>
                                                </tr>
                                                <tr>
                                                    <td>Alamat</td>
                                                    <td>:</td>
                                                    <td><span id="alamat-detail"></span></td>
                                                </tr>
                                                </tr><tr>
                                                    <td>No.Telepon</td>
                                                    <td>:</td>
													<td><b>
                                                        <span id="telp-detail"></span>
                                                        <span><button hidden type="button" class="btn btn-warning btn-xs" onclick="editNoTelp()" style="margin-left: 5px;"><i class="fas fa-edit m-r-5" style="color: black;"></i><span style="color: black;">Edit</span></button></span>
                                                    </b></td>
                                                </tr>
                                                <tr>
                                                    <td>Kelamin</td>
                                                    <td>:</td>
                                                    <td><span id="kelamin-detail"></span></td>
                                                </tr>
                                                <tr>
                                                    <td>Umur / Tgl. Lahir</td>
                                                    <td>:</td>
                                                    <td><span id="umur-detail"></span></td>
                                                </tr>
                                                <tr>
                                                    <td>Dokter Perujuk</td>
                                                    <td>:</td>
                                                    <td><span id="dokter-rujuk"></span></td>
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
                                                    <td width="69%"><span id="nama-pjwb-detail"></span></td>
                                                </tr>
                                                <tr>
                                                    <td>Alamat P. Jawab</td>
                                                    <td>:</td>
                                                    <td><span id="alaamt-pjwb-detail"></span></td>
                                                </tr>
                                                <tr>
                                                    <td>Telp. P. Jawab</td>
                                                    <td>:</td>
                                                    <td><span id="telp-pjwb-detail"></span></td>
                                                </tr>
                                                <tr>
                                                    <td>Instansi Perujuk</td>
                                                    <td>:</td>
                                                    <td><span id="instansi-perujuk-detail"></span></td>
                                                </tr>
                                                <tr>
                                                    <td>Tenaga Medis Perujuk</td>
                                                    <td>:</td>
                                                    <td><span id="tenaga-medis-perujuk-detail"></span></td>
                                                </tr>
                                                <tr>
                                                    <td>Sinkronisasi LIS</td>
                                                    <td>:</td>
                                                    <td><b><span id="sinkronisasi-lis"></span></b></td>
                                                </tr>
                                                <tr>
                                                    <td>Diagnosis Pasien</td>
                                                    <td>:</td>
                                                    <td><span><button type="button" title="Klik untuk melihat diagnosis pasien" class="btn btn-secondary btn-xxs" onclick="riwayatDiagnosis()"><i class="fas fa-eye m-r-5"></i>Lihat Diagnosis
                                                                Pasien</button></span></td>
                                                </tr>
                                                <tr>
                                                    <td>Riwayat Rekam Medis <i>(Baru)</i></td>
                                                    <td>:</td>
                                                    <td>
                                                        <button type="button" class="btn btn-secondary btn-xxs" onclick="riwayatRekamMedisPasienBaru(1)"><i class="fas fa-eye m-r-5"></i>Lihat Riwayat Rekam Medis Pasien <i>(Baru)</i></button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Riwayat Rekam Medis</td>
                                                    <td>:</td>
                                                    <td>
                                                        <button type="button" title="Klik untuk melihat riwayat rekam medis pasien" class="btn btn-secondary btn-xxs" onclick="riwayatRekamMedisPasien()"><i class="fas fa-eye m-r-5"></i>Lihat Riwayat Rekam Medis
                                                            Pasien</button> <!-- tambahan lina -->
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Riwayat Data Pasien</td>
                                                    <td>:</td>
                                                    <td><span><button type="button" title="Klik untuk melihat Riwayat Data Pasien" class="btn btn-secondary btn-xxs" onclick="riwayatDataPasien()"><i class="fas fa-eye m-r-5"></i>Lihat Riwayat Data
                                                                Pasien</button></span></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <h5><b>Tenaga Laboratorium</b></h5>
                                        <table class="table table-sm table-striped">
                                            <tbody>
                                                <tr>
                                                    <td width="30%">Dokter P. Jawab</td>
                                                    <td width="1%">:</td>
                                                    <td width="69%">
                                                        <input type="text" name="dokter_pjwb" class="select2c-input" id="dokter-pjwb-auto">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Analis</td>
                                                    <td>:</td>
                                                    <td><b><span id="analis-detail"></span></b></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col-lg-6">
                                        <h5><b>Dokumen Cetak</b></h5>
                                        <table class="table table-sm table-striped">
                                            <tbody>
                                                <tr id="row-pk">
                                                    <td width="30%">Hasil Laboratorium</td>
                                                    <td width="1%">:</td>
                                                    <td width="69%" class="right">
                                                        <button type="button" title="Cetak Hasil Laboratorium" class="btn btn-success btn-xs" onclick="cetakHasilLaboratoriumHALAB()"><i class="fas fa-print mr-1"></i>Print Hasil</button>
                                                        <button type="button" title="Cetak PDF" class="btn btn-success btn-xs" onclick="cetakHasilPDF()"><i class="fas fa-print mr-1 "></i>Print PDF</button>
                                                    </td>
                                                </tr>
                                                <tr id="row-pa">
                                                    <td>Hasil Laboratorium PA</td>
                                                    <td>:</td>
                                                    <td class="right">
                                                        <button type="button" title="Edit Hasil Laboratorium PA" class="btn btn-info btn-xs" onclick="editHasilLaboratoriumPA()"><i class="fas fa-edit mr-1"></i>Edit Hasil Lab PA</button>
                                                        <button type="button" title="Cetak dari Input Manual Edit Hasil Lab PA" class="btn btn-success btn-xs" onclick="cetakHasilLaboratoriumHALABPA()"><i class="fas fa-print mr-1"></i>Print Hasil
                                                            Manual</button>
                                                        <button type="button" title="Cetak PDF" class="btn btn-success btn-xs" onclick="cetakHasilPDF()"><i class="fas fa-print mr-1"></i>Print PDF</button>
                                                        <button type="button" title="Cetak Hasil Laboratorium dari LIS" class="btn btn-success btn-xs" onclick="cetakHasilLaboratoriumHALAB()"><i class="fas fa-print mr-1"></i>Print Hasil LIS</button>

                                                    </td>
                                                </tr>
                                                <tr id="row-mb">
                                                    <td>Hasil Laboratorium MB</td>
                                                    <td>:</td>
                                                    <td class="right">
                                                        <button type="button" title="Cetak PDF" class="btn btn-success btn-xs" onclick="cetakHasilPDF()"><i class="fas fa-print mr-1"></i>Print PDF</button>
                                                        <button type="button" title="Cetak Hasil Laboratorium MB" class="btn btn-success btn-xs" onclick="cetakHasilLaboratoriumHALABMB()"><i class="fas fa-print mr-1"></i>Print Hasil</button>
                                                    </td>
                                                </tr>
												<tr hidden>
                                                    <td>Kirim Hasil Lab</td>
                                                    <td>:</td>
                                                    <td id="kirim-lab-wa"></td>
                                                </tr>
                                                <tr id="order-lab">
													<td>Order Lab</td>
                                                    <td>:</td>
                                                    <td><button type="button" class="btn btn-info" onclick="request_lab()"><i class="fa fa-paper-plane mr-1"></i>Order Laboratorium</button></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="list-order-lab"></div>
                    <div class="card">
                        <div class="card-header" id="headingThree">
                            <h2 class="mb-0">
                                <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    <i class="fas fa-list mr-1"></i>Entri Hasil Laboratorium
                                </button>
                            </h2>
                        </div>
                        <div id="collapseThree" class="collapse show" aria-labelledby="headingThree" data-parent="#accordionExample">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="box-well">
                                            <input type="hidden" name="id_laboratorium" id="id-laboratorium">
                                            <!--<button type="button" onclick="tambahRequestLaboratorium()" id="btn-tambah-item" class="btn btn-info"><i class="fas fa-plus-circle mr-1"></i>Tambah Item Pemeriksan</button>-->
                                            <div id="hasil-pemeriksaan-laboratorium"></div>
                                            <br>
                                            <hr>
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <label><b>Catatan</b></label>
                                                        <div id="catatan-field"></div>
                                                    </div>
                                                </div>
                                            </div>
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
                <button type="button" class="btn btn-info" onclick="konfirmasiSimpanHasil()"><i class="fas fa-save mr-1"></i>Simpan</button>
            </div>
        </div>
    </div>
</div>
<!-- End Modal Pemeriksaan -->

<!-- Modal Edit Tindakan -->
<div id="modal-edit-tindakan" class="modal fade" role="dialog">
    <div class="modal-dialog" style="max-width:80%">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Konfirmasi Hapus Tindakan</h4>
                <button type="button" class="close" data-dismiss="modal">×</button>
            </div>
            <div class="modal-body">
                <?= form_open('', 'role=form class=form-horizontal id=form-order-laboratorium'); ?>
                <div class="row">
                    <div class="col-lg-6">
                        <table class="table table-sm table-striped">
                            <tbody>
                                <tr>
                                    <td width="20%">ID. Order</td>
                                    <td width="1%">:</td>
                                    <td wdith="79%"><b><span id="id-order-detail"></span></b></td>
                                    <td width="20%">ONO</td>
                                    <td width="1%">:</td>
                                    <td wdith="79%"><b><span id="id-ono"></span></b></td>
                                </tr>
                                <tr>
                                    <td>Waktu Order</td>
                                    <td>:</td>
                                    <td><b><span id="waktu-order-detail"></span></b></td>
                                    <td width="20%">Status LIS</td>
                                    <td width="1%">:</td>
                                    <td wdith="79%"><b><span id="id-status-lis"></span></b></td>
                                </tr>
                                <tr>
                                    <td>Dokter Pemesan</td>
                                    <td>:</td>
                                    <td><b><span id="dokter-order-detail"></span></b></td>
                                    <td width="20%"></td>
                                    <td width="1%"></td>
                                    <td wdith="79%"></td>
                                </tr>
                                <tr>
                                    <td>Layanan</td>
                                    <td>:</td>
                                    <td><b><span id="layanan-detail"></span></b></td>
                                    <td width="20%"></td>
                                    <td width="1%"></td>
                                    <td wdith="79%"></td>
                                </tr>
                                <tr>
                                    <td>Dokter P. Jawab</td>
                                    <td>:</td>
                                    <td><b><span id="dokter-lab-pasien"></span></b></td>
                                    <td width="20%"></td>
                                    <td width="1%"></td>
                                    <td wdith="79%"></td>
                                </tr>
                                <tr>
                                    <td>Analis. Lab</td>
                                    <td>:</td>
                                    <td><b><span id="analis-pasien"></span></b></td>
                                    <td width="20%"></td>
                                    <td width="1%"></td>
                                    <td wdith="79%"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-lg-6">
                        <table class="table table-sm table-striped">
                            <tbody>
                                <tr>
                                    <td width="20%">No. RM</td>
                                    <td width="1%">:</td>
                                    <td wdith="79%"><b><span id="no-rm-pasien"></span></b></td>
                                </tr>
                                <tr>
                                    <td>No.KTP</td>
                                    <td>:</td>
                                    <td><b><span id="ktp-pasien"></span></b></td>
                                </tr>
                                <tr>
                                    <td>Nama</td>
                                    <td>:</td>
                                    <td><b><span id="nama-pasien"></span></b></td>
                                </tr>
                                <tr>
                                    <td>Kelamin</td>
                                    <td>:</td>
                                    <td><b><span id="kelamin-pasien"></span></b></td>
                                </tr>
                                <tr>
                                    <td>Umur</td>
                                    <td>:</td>
                                    <td><b><span id="umur-pasien"></span></b></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">

                        <table id="table-order" class="table table-hover table-striped table-sm color-table info-table">
                            <thead>
                                <tr>
                                    <th width="10%" class="center">No.</th>
                                    <th class="left" width="23%">Layanan Laboratorium</th>
                                    <th class="left" width="10%">Jenis</th>
                                    <th class="center" width="10%">Cito</th>
                                    <th class="left" width="18%">Penjamin</th>
                                    <th class="center" width="7%">Kelas</th>
                                    <th class="right" width="7%">Tarif</th>
                                    <th width="10%" class="center"></th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
                <?= form_close(); ?>
            </div>
        </div>
    </div>
    <!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>
<!-- End Modal Edit Tindakan -->

<!-- Modal Keabnormalan -->
<div id="modal-keabnormalan" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form method="POST" id="form-keabnormalan" onsubmit="updateKeabnormalan($(this)); return false">
                <div class="modal-header">
                    <h4 class="modal-title">Keabnormalan</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div id="modal-keabnormalan-body" class="modal-body"></div>
                <div class="modal-footer">
                    <input type="hidden" name="id" value="">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times-circle"></i> Batal</button>
                    <button type="submit" class="btn btn-info"><i class="fas fa-save"></i> Update</button>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End Modal Keabnormalan -->


<!-- Laboratorium PA -->
<div id="modal-hasil-laboratorium-pa" class="modal fade">
    <div class="modal-dialog" style="max-width: 70%">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Hasil Laboratorium PA</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <?= form_open('', 'id=form-hasil-laboratorium-pa role=form class=form-horizontal') ?>

                <div class="form-group row tight">
                    <label class="col-lg-12 col-form-label">Hasil Pemeriksaan</label>
                    <div class=" col col-lg-6">
                        <?= form_dropdown('jenis_pemeriksaan', $jenis_pemeriksaan, array(), 'id=jns-hasil class="form-control" onchange="clearValidate(this)"') ?>
                    </div>
                </div>
                <div class="form-group row tight">
                    <label class="col-lg-12 col-form-label">No. Laboratorium PA</label>
                    <div class="col col-lg-6">
                        <input type="text" class="form-control" name="no_lab_pa" id="no-lab-pa" placeholder="No. Laboratorium PA" />
                    </div>
                </div>


                <div class="form-group row tight">
                    <label class="col-lg-12 col-form-label">Diagnosis Klinis</label>
                    <div class="col col-lg-12">
                        <div id="diag-field"></div>
                    </div>
                </div>
                <div class="form-group row tight anamnesa">
                    <label class="col-lg-12 col-form-label">Anamnesa</label>
                    <div class="col col-lg-12">
                        <div id="anamnesa-field"></div>
                    </div>
                </div>
                <div class="form-group row tight makros">
                    <label class="col-lg-12 col-form-label">Makroskopik</label>
                    <div class="col col-lg-12">
                        <div id="makro-field"></div>
                    </div>
                </div>
                <div class="form-group row tight mikros">
                    <label class="col-lg-12 col-form-label">Mikroskopik</label>
                    <div class="col col-lg-12">
                        <div id="mikro-field"></div>
                    </div>
                </div>
                <div class="form-group row tight kondisi">
                    <label class="col-lg-12 col-form-label">Kondisi</label>
                    <div class="col col-lg-12">
                        <div id="kondisi-field"></div>
                    </div>
                </div>
                <div class="form-group row tight rincian">
                    <label class="col-lg-12 col-form-label">Rincian</label>
                    <div class="col col-lg-12">
                        <div id="rincian-field"></div>
                    </div>
                </div>
                <div class="form-group row tight">
                    <label class="col-lg-12 col-form-label">Kesimpulan</label>
                    <div class="col col-lg-12">
                        <div id="kesimpulan-field"></div>
                    </div>
                </div>
                <div class="form-group row tight">
                    <label class="col-lg-12 col-form-label">Anjuran</label>
                    <div class="col col-lg-12">
                        <div id="anjuran-field"></div>
                    </div>
                </div>
                <?= form_close() ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times-circle mr-1"></i>Batal</button>
                <button type="button" class="btn btn-info" onclick="konfirmasiSimpanHasilPA()"><i class="fa fa-save mr-1"></i>Simpan</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<!-- END Laboratorium PA -->

<!-- Modal Diagnosis PA Pasien-->
<div id="modal-pa-diagnosis" class="modal bounceInDown animated" role="dialog" data-backdrop="static" aria-labelledby="modal-pa-diagnosis-label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" style="max-width: 98%">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-pa-diagnosis-label"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" style="font-size: 16pt;">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="widget-body">
                            <div id="wizard-form-pa">
                                <!-- Tab bwizard -->
                                <ol>
                                    <li>Diagnosis</li>
                                </ol>

                                <!-- Data bwizard -->

                                <!-- Form diagnosis -->
                                <div class="form-pa-diagnosis">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="col-lg-6">
                                                <table class="table table-sm table-detail table-striped" width="100%">
                                                    <tr>
                                                        <td width="150px"><b>Pasien</b></td>
                                                        <td width="1px">:</td>
                                                        <td><span id="identitas-pasien-pa-diagnosis"></span></td>
                                                    </tr>
                                                </table>
                                            </div>
                                            <table class="table table-hover table-striped table-sm color-table info-table" id="table-pa-diagnosis">
                                                <thead class="thead-theme">
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Dokter</th>
                                                        <th>Diagnosis</th>
                                                        <th>Klinik</th>
                                                        <th>Prioritas</th>
                                                        <th>Diagnosis Banding</th>
                                                        <th>Diagnosis Akhir</th>
                                                        <th>Penyabab Kematian</th>
                                                    </tr>
                                                </thead>
                                                <tbody></tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Form diagnosis -->

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-window-close"></i> Keluar</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<!-- End Modal Diagnosis PA Pasien -->

<!-- Modal Pasien -->
<div id="modal-data-pasien" class="modal fade" role="dialog" aria-labelledby="modal-data-pasien-label" aria-hidden="true">
    <div class="modal-dialog" style="max-width: 80%">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-data-pasien-label"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-6">
                        <div class="form-group row tight">
                            <label for="no_rm" class="col col-form-label">No. RM</label>
                            <div class="col-9">
                                <span id="no-rm"></span>
                            </div>
                        </div>
                        <div class="form-group row tight">
                            <label for="nama" class="col col-form-label">Nama</label>
                            <div class="col-9">
                                <span id="nama"></span>
                            </div>
                        </div>
                        <div class="form-group row tight">
                            <label for="statuspasien" class="col-3 col-form-label">Status Pasien</label>
                            <div class="col">
                                <span id="status-pasien"></span>
                            </div>
                        </div>
                        <div class="form-group row tight">
                            <label for="email" class="col col-form-label">Jenis Kelamin</label>
                            <div class="col-9">
                                <span id="kelamin"></span>
                            </div>
                        </div>
                        <div class="form-group row tight">
                            <label for="text" class="col col-form-label">Tempat Lahir</label>
                            <div class="col-9">
                                <span id="tempat-lahir"></span>
                            </div>
                        </div>
                        <div class="form-group row tight">
                            <label for="text" class="col col-form-label">Tanggal Lahir</label>
                            <div class="col-9">
                                <span id="tanggal-lahir"></span>
                            </div>
                        </div>
                        <div class="form-group row tight">
                            <label for="text" class="col col-form-label">Alamat</label>
                            <div class="col-9">
                                <span id="alamat"></span>
                            </div>
                        </div>
                        <div class="form-group row tight">
                            <label for="no_rw" class="col-3 col-form-label">No. RT / RW</label>
                            <div class="col-2 text-center">
                                <span id="rt"></span> / <span id="rw"></span>
                            </div>
                        </div>
                        <div class="form-group row tight">
                            <label for="no_rw" class="col-3 col-form-label">No. Rumah / Kode POS</label>
                            <div class="col-2 text-center">
                                <span id="no-rumah"></span> / <span id="kode-pos"></span>
                            </div>
                        </div>
                        <div class="form-group row tight">
                            <label for="provinsi" class="col-3 col-form-label">Provinsi</label>
                            <div class="col">
                                <span id="provinsi"></span>
                            </div>
                        </div>
                        <div class="form-group row tight">
                            <label for="kabupaten" class="col-3 col-form-label">Kabupaten</label>
                            <div class="col">
                                <span id="kabupaten"></span>
                            </div>
                        </div>
                        <div class="form-group row tight">
                            <label for="kecamatan" class="col-3 col-form-label">Kecamatan</label>
                            <div class="col">
                                <span id="kecamatan"></span>
                            </div>

                        </div>
                        <div class="form-group row tight">
                            <label for="kelurahan" class="col-3 col-form-label">Kelurahan</label>
                            <div class="col">
                                <span id="kelurahan"></span>
                            </div>

                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group row tight">
                            <label for="agama" class="col col-form-label">Agama</label>
                            <div class="col-9">
                                <span id="agama"></span>
                            </div>
                        </div>
                        <div class="form-group row tight">
                            <label for="gol_darah" class="col col-form-label">Golongan Darah</label>
                            <div class="col-9">
                                <span id="golongan-darah"></span>
                            </div>
                        </div>
                        <div class="form-group row tight">
                            <label for="pendidikan" class="col col-form-label">Pendidikan</label>
                            <div class="col-9">
                                <span id="pendidikan"></span>
                            </div>
                        </div>
                        <div class="form-group row tight">
                            <label for="pekerjaan" class="col col-form-label">Pekerjaan</label>
                            <div class="col-9">
                                <span id="pekerjaan"></span>
                            </div>
                        </div>
                        <div class="form-group row tight">
                            <label for="pernikahan" class="col-3 col-form-label">Status Kawin</label>
                            <div class="col">
                                <span id="status-kawin"></span>
                            </div>
                        </div>
                        <div class="form-group row tight">
                            <label for="ayah" class="col-3 col-form-label">Nama Ayah</label>
                            <div class="col">
                                <span id="nama-ayah"></span>
                            </div>
                        </div>
                        <div class="form-group row tight">
                            <label for="ibu" class="col-3 col-form-label">Nama Ibu</label>
                            <div class="col">
                                <span id="nama-ibu"></span>
                            </div>
                        </div>
                        <div class="form-group row tight">
                            <label for="no_identitas" class="col col-form-label">NIK</label>
                            <div class="col-9">
                                <span id="nik"></span>
                            </div>
                        </div>
                        <div class="form-group row tight">
                            <label for="text" class="col col-form-label">Telepon</label>
                            <div class="col-9">
                                <span id="telepon"></span>
                            </div>
                        </div>
                        <div class="form-group row tight">
                            <label for="etnis" class="col-3 col-form-label">Etnis</label>
                            <div class="col">
                                <span id="etnis"></span>
                            </div>
                        </div>
                        <div class="form-group row tight">
                            <label for="text" class="col col-form-label">Status</label>
                            <div class="col-9">
                                <span id="status"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-window-close"></i> Keluar</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- End Modal Pasien -->

<!-- Modal Edit No Telp -->
<div id="modal_edit_no_telp" class="modal fade" role="dialog" aria-labelledby="modal_edit_no_telp_label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal_edit_no_telp_label"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <?= form_open('', 'id=form_edit_no_telp role=form class=form-horizontal') ?>
                <input type="hidden" name="id_pendaftaran_edit_telp" id="id-pendaftaran-edit-telp" />
                <input type="hidden" name="id_pasien_edit_telp" id="id-pasien-edit-telp" />
                <div class="form-group row tight">
                    <label for="no_telp_edit" class="col-4 col-form-label">No. Telp<span class="text-red">*</span></label>
                    <div class="col-8">
                        <input type="text" name="no_telp_edit_telp" id="no-telp-edit-telp" class="form-control reset-field" onkeypress="return hanyaAngka(event)">
                    </div>
                </div>
                <?= form_close() ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-window-close"></i> Keluar</button>
                <button type="button" class="btn btn-info waves-effect" onclick="simpanNoTelp()"><i class="fas fa-save"></i> Update</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- End Modal Edit No Telp -->
